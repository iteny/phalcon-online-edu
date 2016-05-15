<?php
/**
 * @CreateTime: 2016/5/14 13:24
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */
namespace Hemacms\Admin\Controllers;
use Phalcon\Mvc\Controller;
use Hemacms\Admin\Models\AclResource;
class SiteController extends Controller
{
    public function indexAction()
    {
        $adminMenu = AclResource::find(
            array(
//                "columns" => 'id,name,controller,action,sort,icon',
                'order' => 'sort',
                'cache' => ['lifetime' => $this->config->admincache->adminmenu, 'key' => 'admin-menu'],
            )
        );
//        var_dump($this->function->recursive($adminMenu->toArray()));
        $this->view->adminMenu = $this->function->recursive($adminMenu->toArray());
//        $this->view->disable();
    }
    public function addMenuAction()
    {
        echo $this->request->getQuery('pid');
//        $this->view->disable();
    }
}