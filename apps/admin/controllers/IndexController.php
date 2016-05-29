<?php

namespace Hemacms\Admin\Controllers;
use Phalcon\Mvc\Controller;
use Hemacms\Admin\Models\AclResource;

class IndexController extends Controller
{

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

}