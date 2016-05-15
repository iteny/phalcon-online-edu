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
        $conditions = "pid = :pid: AND isshow = :isshow:";
        $parameters = array(
            'pid' => 0,
            'isshow' => 1
        );
        $where = array(
            $conditions,
            'bind' => $parameters,
            'columns' => 'id,name',
            'order' => 'sort',
            'cache' => ['lifetime' => 10, 'key' => "admin-oneresource"],
        );
        $oneResource = AclResource::find($where);
        $this->view->topNav = $oneResource;
//        var_dump($oneResource->toArray());
//        $this->view->disable();

    }
    public function getLeftMenuAction()
    {
        if ($this->request->isPost()) {
            $twopid = $this->request->getPost('pid', 'int');
            $twobind = array(
                'pid' => $twopid,
                'isshow' => 1
            );
            $twoResource = AclResource::find(
                array(
                    "pid = :pid: AND isshow = :isshow:",
                    "bind" => $twobind,
                    "columns" => 'id,name,controller,action,sort,icon',
                    'order' => 'sort',
                    'cache' => ['lifetime' => 10, 'key' => "admin-tworesource".$twopid],
                )
            );
            $twoResource = $twoResource->toArray();
            foreach ($twoResource as $k => $v)
            {
                $threebind = array(
                    'pid' => $v['id'],
                    'isshow' => 1
                );
                $threeResource = AclResource::find(
                    array(
                        "pid = :pid: AND isshow = :isshow:",
                        "bind" => $threebind,
                        "columns" => 'id,name,controller,action,sort,icon',
                        'order' => 'sort',
                        'cache' => ['lifetime' => 10, 'key' => "admin-threeresource".$v['id']],
                    )
                );
                $threeResource = $threeResource->toArray();
                $twoResource[$k]['children'] = $threeResource;
            }
            exit(json_encode($twoResource));
        }
        $this->view->disable();
    }

}