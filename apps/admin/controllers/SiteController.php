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
                'order' => 'sort',
                'cache' => ['lifetime' => $this->config->admincache->adminmenu, 'key' => 'admin-menu'],
            )
        );
        $this->view->adminMenu = $this->function->recursive($adminMenu->toArray());
    }
    public function addMenuAction()
    {

        $pid = $this->request->getQuery('pid','int');
        $pid = $pid != '' ? $pid : 0;
        $adminSelect = AclResource::find(
            array(
                'order' => 'sort',
                'cache' => ['lifetime' => $this->config->admincache->adminmenu, 'key' => 'admin-menu'],
            )
        );
        $this->view->pid = $pid;
        $this->view->adminSelect = $this->function->recursiveTwo($adminSelect->toArray());
        if($this->request->isPost() && $this->request->getPost('addMenu')){
//            $rules = array(
//                array('title','require',-1), //菜单名称不能为空
//                array('name','require',-2), //菜单规则不能为空
//                array('title','',-3,0,'unique',1), //菜单名称唯一性
//                array('name','',-4,0,'unique',1), //菜单规则唯一性
//            );
//            $table_AuthRule = M("AuthRule");
//            if($table_AuthRule->validate($rules)->create()){
//                if($id = $table_AuthRule->add())
//                {
//                    $this->ajaxReturn(-20);
//                }
//            }
//            else
//            {
//                $this->ajaxReturn($table_AuthRule->getError());
//            }

        }
    }
    public function iconsClsAction()
    {
        $this->view->disable();
        if($this->request->isPost()){
            $iconsCls = file_get_contents("./static/admin/font/icons.css");
            $iconsCls = explode('}', $iconsCls);
//            var_dump($iconsCls);
            $tmp_iconsCls = array();
            foreach($iconsCls as $k => $v){
                if(preg_match("/\.(.+?){/", $v,$m)){
                    $tmp_iconsCls[] = $m[1];
                }
            }
//            var_dump($tmp_iconsCls);
            exit(json_encode($tmp_iconsCls));
        }
    }
}