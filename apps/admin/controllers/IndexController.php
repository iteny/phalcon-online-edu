<?php

namespace Hemacms\Admin\Controllers;
use Phalcon\Mvc\Controller;

class IndexController extends Controller
{

    public function indexAction()
    {
        $this->assets->addCss('static/admin/css/index-index.css')
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
    }
    public function loginAction()
    {

    }

}