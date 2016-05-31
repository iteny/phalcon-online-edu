<?php

namespace Hemacms\Admin\Controllers;
use Phalcon\Mvc\Controller;
use Hemacms\Admin\Models\AclResource;

class IndexController extends Controller
{
    //后台主页
    public function indexAction()
    {
        $this->assets->addCss('static/admin/css/index-index.css')
            ->addCss('static/common/js/poshytip/src/tip-darkgray/tip-darkgray.css')
            ->collection('css');
//            ->setTargetPath('static/admin/css/login.mini.css')
//            ->setTargetUri('static/admin/css/login.mini.css')
//            ->join(true)
//            ->addFilter(new \Phalcon\Assets\Filters\Cssmin());
//        $this->assets->addJs('static/common/js/jquery/jquery-1.12.3.min.js')
//            ->addJs('static/common/js/layer/layer.js')
//            ->addJs('static/admin/js/admin.common.js')
//            ->addJs('static/admin/js/admin.login.js')
//            ->collection('js')
//            ->setTargetPath('static/admin/js/login.mini.js')
//            ->setTargetUri('static/admin/js/login.mini.js')
//            ->join(true)
//            ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
        $cacheKey = 'admin-onemenu.cache';
        $oneMenu   = $this->safeCache->get($cacheKey);
        if($oneMenu === null){
            $sql = "SELECT id,name FROM Hemacms\Admin\Models\AclResource WHERE pid = :pid: AND isshow = :isshow: ORDER BY sort ASC";
            $oneMenu = $this->modelsManager->executeQuery($sql,array(
                'pid' => 0,
                'isshow' => 1
            ));
            $this->safeCache->save($cacheKey,$oneMenu,$this->config->admincache->adminmenu);
        }
        $this->view->topNav = $oneMenu;
    }
    //获取左侧菜单
    public function getLeftMenuAction()
    {
        if ($this->request->isPost()) {
            $twopid = $this->request->getPost('pid', 'int');
            $cacheTwoKey = 'admin-twomenu.cache.'.$twopid;
            $twoMenu   = $this->safeCache->get($cacheTwoKey);
            if($twoMenu === null){
                $sql = "SELECT id,name,controller,action,sort,icon FROM Hemacms\Admin\Models\AclResource WHERE pid = :pid: AND isshow = :isshow: ORDER BY sort ASC";
                $twoMenu = $this->modelsManager->executeQuery($sql,array(
                    'pid' => $twopid,
                    'isshow' => 1
                ));
                $this->safeCache->save($cacheTwoKey,$twoMenu,$this->config->admincache->adminmenu);
            }
            $twoMenu = $twoMenu->toArray();
            foreach ($twoMenu as $k => $v)
            {
                $cacheThreeKey = 'admin-threemenu.cache.'.$v['id'];
                $threeMenu   = $this->safeCache->get($cacheThreeKey);
                if($threeMenu === null){
                    $sql = "SELECT id,name,controller,action,sort,icon FROM Hemacms\Admin\Models\AclResource WHERE pid = :pid: AND isshow = :isshow: ORDER BY sort ASC";
                    $threeMenu = $this->modelsManager->executeQuery($sql,array(
                        'pid' => $v['id'],
                        'isshow' => 1
                    ));
                    $this->safeCache->save($cacheThreeKey,$threeMenu,$this->config->admincache->adminmenu);
                }
                $threeMenu = $threeMenu->toArray();
                $twoMenu[$k]['children'] = $threeMenu;
            }
            exit(json_encode($twoMenu));
        }
        $this->view->disable();
    }
    //后台首页
    public function homeAction(){
        //系统信息
        $infoKey = 'system-info.cache';
        $info = $this->safeCache->get($infoKey);
        if($info === null) {
            if (function_exists('gd_info')) {
                $gd = gd_info();
                $gd = $gd['GD Version'];
            } else {
                $gd = "不支持";
            }
            $info = array(
                '操作系统' => PHP_OS,
                '主机名IP端口' => $_SERVER['SERVER_NAME'] . ' (' . $_SERVER['SERVER_ADDR'] . ':' . $_SERVER['SERVER_PORT'] . ')',
                '运行环境' => $_SERVER["SERVER_SOFTWARE"],
                'PHP运行方式' => php_sapi_name(),
                '程序目录' => substr(APP_PATH, 1, 24),
                'MYSQL版本' => function_exists("mysql_close") ? substr(mysql_get_client_info(), 0, 14) : '不支持',
                'GD库版本' => $gd,
                '上传附件限制' => ini_get('upload_max_filesize'),
                '执行时间限制' => ini_get('max_execution_time') . "秒",
                '剩余空间' => round((@disk_free_space(".") / (1024 * 1024)), 2) . 'M',
                '服务器时间' => date("Y年n月j日 H:i:s"),
                '北京时间' => gmdate("Y年n月j日 H:i:s", time() + 8 * 3600),
                '采集函数检测' => ini_get('allow_url_fopen') ? '支持' : '不支持',
                'register_globals' => get_cfg_var("register_globals") == "1" ? "ON" : "OFF",
                'magic_quotes_gpc' => (1 === get_magic_quotes_gpc()) ? 'YES' : 'NO',
                'magic_quotes_runtime' => (1 === get_magic_quotes_runtime()) ? 'YES' : 'NO',
            );
            $this->safeCache->save($infoKey,$info,300);
        }
        $loginLogKey = 'login-log.cache';
        $loginLog = $this->safeCache->get($loginLogKey);
        if($loginLog === null) {
            $sql = "SELECT logintime,loginip,country,area FROM Hemacms\Admin\Models\LoginLog WHERE  status = :status: ORDER BY id DESC LIMIT 5";
            $loginLog = $this->modelsManager->executeQuery($sql, array(
                'status' => 1
            ));
            $this->safeCache->save($loginLogKey,$loginLog,300);
        }
        $this->view->systeminfo = $info;
        $this->view->loginlog = $loginLog;
    }

}