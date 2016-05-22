<?php
/**
 * @CreateTime: 2016/5/22 21:02
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */
namespace Hemacms\Admin\Controllers;
use Phalcon\Mvc\Controller;
use Hemacms\Admin\Models\AclResource;
class SiteComController extends Controller
{
    //添加菜单时验证菜单规则名称
    public function checkAddMnameAction()
    {
        $this->view->disable();
        if($this->request->isPost() && $this->request->getPost('name')){
            $namebind = array(
                'name' => $this->request->getPost('name')
            );
            $count = AclResource::find(
                array(
                    "name = :name:",
                    "bind" => $namebind,
                )
            );
            if(!$count->count()){
                echo 'true';
            } else {
                echo 'false';
            }
            exit;
        }
    }
}