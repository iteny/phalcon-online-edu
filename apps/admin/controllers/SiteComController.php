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
    //读取图标
    public function iconsClsAction()
    {
        $this->view->disable();
        if($this->request->isPost()){
            $iconsCls = file_get_contents("./static/admin/font/icons.css");
            $iconsCls = explode('}', $iconsCls);
            $tmp_iconsCls = array();
            foreach($iconsCls as $k => $v){
                if(preg_match("/\.(.+?){/", $v,$m)){
                    $tmp_iconsCls[] = $m[1];
                }
            }
            exit(json_encode($tmp_iconsCls));
        }
    }
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
    //修改菜单时验证菜单规则名称
    public function checkEditMnameAction()
    {
        $this->view->disable();
        if($this->request->isPost() && $this->request->getPost('name')){
            $namebind = array(
                'name' => $this->request->getPost('name'),
                'id' => $this->request->getQuery('id')
            );
            $count = AclResource::find(
                array(
                    "name = :name: AND id != :id:",
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