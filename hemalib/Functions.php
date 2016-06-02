<?php
/**
 * @CreateTime: 2016/4/30 17:11
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */
namespace Hemalib;
use Hemalib\IpLocation;
use Hemacms\Admin\Models\OperateLog;
use Phalcon\Di\FactoryDefault;
use Phalcon\DiInterface;
use Phalcon\DI\InjectionAwareInterface;
class Functions implements InjectionAwareInterface{
    private $_di = NULL;
    /**
     * 架构方法 设置参数
     * @access public
     * @param  array $config 配置参数
     */
    public function __construct($config=array()){
        $this->config   =   array_merge($this->config, $config);

        $this->NOW_TIME = $_SERVER[ 'REQUEST_TIME' ];
        global $di;
        $this->setDI( $di );
    }
    /**
     * 使用 $this->name 获取配置
     * @access public
     * @param  string $name 配置名称
     * @return multitype    配置值
     */
    public function __get($name) {
        return $this->config[$name];
    }
    /**
     * 设置验证码配置
     * @access public
     * @param  string $name 配置名称
     * @param  string $value 配置值
     * @return void
     */
    public function __set($name,$value){
        if(isset($this->config[$name])) {
            $this->config[$name]    =   $value;
        }
    }
    /**
     * 检查配置
     * @access public
     * @param  string $name 配置名称
     * @return bool
     */
    public function __isset($name){
        return isset($this->config[$name]);
    }
    public function setDI( DiInterface $di )
    {
        $this->_di = $di;
    }

    public function getDI()
    {
        return $this->_di;
    }
    /*
     *格式化打印数组
     */
    public function p($arr){
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }
    //得到该分类下所有分类的ID
    public function getAllChild($array,$id)
    {
        $arr = array();
        foreach($array as $v)
        {
            if($v['pid'] == $id)
            {
                $arr[] =$v['id'];
                $arr = array_merge($arr,$this->getAllChild($array,$v['id']));
            }
        }
        return $arr;
    }
    /**
     * [doReturn 返回前端ajax处理数据结果]
     * @param  string $success [成功信息]
     * @param  string $error   [失败信息]
     * @param  [type] $status  [处理数据结果]
     * @return [type]          [description]
     */
    public function returnMsg($success = '成功',$error = '失败',$status){
        if($status !== false){
            $msg = array(
                "status" => true,
                "info" => $success
            );
            $this->operateLog($success,1);
        } else {
            $msg = array(
                "status" => false,
                "info" => $error
            );
            $this->operateLog($error,0);
        }
        return $msg;
    }
    /**
     * 递归重新排序无限极分类数组
     */
    public function recursive($array,$pid=0,$level=0)
    {
        $arr = array();
        foreach($array as $v)
        {
            if($v['pid'] == $pid)
            {
                if($level < 5){
                    $v['level'] = $level;
                    $v['html'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$level);
                    $arr[] = $v;
                    $arr = array_merge($arr,$this->recursive($array,$v['id'],$level+1));
                }
            }
        }
        return $arr;
    }
    /**
     * 递归重新排序无限极分类数组
     */
    public function recursiveTwo($arr,$pid=0,$level=0)
    {
        $array = array();
        foreach($arr as $v)
        {
            if($v['pid'] == $pid)
            {
                $v['level'] = $level;
                $v['html'] = str_repeat(' ',$level);
                $array[] = $v;
                $array = array_merge($array,$this->recursiveTwo($arr,$v['id'],$level+1));
            }
        }
        return $array;
    }
    //操作日志
    public function operateLog($message = null, $status = 0){
        if($this->getDI()->get('config')->log->operatelogtime == 'true'){
            $fangs = 'GET';
            if ($this->getDI()->get('request')->isAjax()) {
                $fangs = 'Ajax';
            } else if ($this->getDI()->get('request')->isPost()) {
                $fangs = 'POST';
            }
            $uname = $this->getDI()->get('session')->get('userInfo');
            $Ip = new IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
            $area = $Ip->getlocation(); // 获取某个IP地址所在的位置
            $data = array(
                'username' => $uname['admin_username'],
                'ip' => $area['ip'],
                'time' => $_SERVER['REQUEST_TIME'],
                'country' => $area['country'],
                'useragent' => $_SERVER['HTTP_USER_AGENT'],
                'info' => "提示语：{$message}<br/>模块：" . $this->getDI()->get('dispatcher')->getModuleName() . ",控制器：" . $this->getDI()->get('dispatcher')->getControllerName() . ",方法：" . $this->getDI()->get('dispatcher')->getActionName() . "<br/>请求方式：{$fangs}",
                'get' => $_SERVER['HTTP_REFERER'],
                'status' => $status,
            );
            $sql = "INSERT INTO Hemacms\Admin\Models\OperateLog (username,ip,time,country,useragent,info,get,status) VALUES (:username:,:ip:,:time:,:country:,:useragent:,:info:,:get:,:status:)";
            $this->getDI()->get('modelsManager')->executeQuery($sql,$data);
        }
    }
    /**
     * [treeRule 菜单无限极]
     * @param  [type] $data    [菜单数据]
     * @param  string $rule_id [菜单rule_id]
     * @return [type]          [description]
     */
    public function treeRule($data,$pid = '0'){
        $tree = array();
        foreach($data as $v){
            if($v['pid'] == $pid){
                $v['children'] = $this->treeRule($data,$v['id']);
                $tree[] = $v;
            }
        }
        return $tree;
    }
    /**
     * [treeState 树形数据状态收缩]
     * @param  [type] $data  [description]
     * @param  [type] $rules [description]
     * @return [type]        [description]
     */
    public function treeState($data,$rules){//其实主要用与菜单数据，其他的树形数据也可以通用
        foreach($data as $k=>$v){

            if(is_array($v['children']) && count($v['children']) != 0){
                if(isset($rules) && in_array($v['id'],$rules)){//判断是否让数据具有选中效果
                    $data[$k]["checked"] = true;
                }
                $data[$k]["open"] = "true";
                if(isset($rules)){//判断是否让数据具有选中效果
                    $data[$k]["children"] = $this->treeState($data[$k]["children"],$rules);
                } else {
                    $data[$k]["children"] = $this->treeState($data[$k]["children"]);
                }

            } else {
                if(isset($rules) && in_array($v['id'],$rules)){//判断是否让数据具有选中效果
                    $data[$k]["checked"] = true;
                }
            }
        }
        return $data;
    }

}