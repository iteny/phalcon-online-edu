<?php
/**
 * @CreateTime: 2016/4/30 17:11
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */
namespace Hemalib;
class Functions{
    /*
     *格式化打印数组
     */
    public function p($arr){
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
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
            \Intendant\Model\RecordModel::record($success,1);
        } else {
            $msg = array(
                "status" => false,
                "info" => $error
            );
            \Intendant\Model\RecordModel::record($error,0);
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

}