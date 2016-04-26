<?php
/**
 * @CreateTime: 2016/4/12 17:51
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */
namespace Hemacms\Admin\Controllers;
use Phalcon\Mvc\Controller;
//use Hemacms\Admin\Models;
class LoginController extends Controller
{
    public function indexAction(){
        $this->assets->addCss('static/admin/css/login.css')
//            ->addCss('css/bootstrap/dashboard.css')
//            ->addCss('css/codemirror/codemirror.css')
            ->collection('css');
//            ->setTargetPath('static/admin/css/login.mini.css')
//            ->setTargetUri('static/admin/css/login.mini.css')
//            ->join(true)
//            ->addFilter(new \Phalcon\Assets\Filters\Cssmin());
        $this->assets->addJs('static/common/js/jquery/jquery-1.12.3.min.js')
                     ->addJs('static/common/js/layer/layer.js')
                     ->addJs('static/admin/js/admin.common.js')
            ->collection('js');
//            ->setTargetPath('static/admin/css/login.mini.css')
//            ->setTargetUri('static/admin/css/login.mini.css')
//            ->join(true)
//            ->addFilter(new \Phalcon\Assets\Filters\Cssmin());

    }
    public function doLoginAction(){
        echo '111';
    }
}