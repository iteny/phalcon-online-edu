<?php
/**
 * @CreateTime: 2016/5/10 20:22
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */
namespace Hemacms\Admin\Controllers;
use Hemacms\Admin\Controllers\AdminBaseController;
class AclController extends AdminBaseController
{
    public function indexAction()
    {
        echo __METHOD__;
        $this->view->disable();
    }
    public function anotherAction()
    {
        echo __METHOD__;
        $this->view->disable();
    }
    public function memAction()
    {
        echo __METHOD__;
        $this->view->disable();
    }
    public function allAction()
    {
        echo __METHOD__;
        $this->view->disable();
    }
}