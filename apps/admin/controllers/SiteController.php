<?php
/**
 * @CreateTime: 2016/5/14 13:24
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */
namespace Hemacms\Admin\Controllers;
use Phalcon\Mvc\Controller;
use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;
use Hemacms\Admin\Models\AclResource;
class SiteController extends Controller
{
    public function menuAction()
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
        if($this->request->isPost() && $this->request->getPost('addMenu')){
            $this->view->disable();
//            var_dump($this->request->getPost());die;
            $validation = new Validation();
            $validation->add(
                'name',
                new PresenceOf(
                    array(
                        'message' => '菜单名称不能为空'
                    )
                )
            );
            $messages = $validation->validate($this->request->getPost());
            if (count($messages)) {
                foreach ($messages as $message) {
                    echo $message, '<br>';
                }
                return false;
            }else{
                $menu       = new AclResource();
                $menu->name = $this->request->getPost('name','string');
                $menu->controller = $this->request->getPost('controller','string');
                $menu->action = $this->request->getPost('action','string');
                $menu->isshow = $this->request->getPost('isshow','int');
                $menu->pid = $this->request->getPost('pid','int');
                $menu->sort = $this->request->getPost('sort','int');
                $menu->icon = $this->request->getPost('icon','string');

                if ($menu->save() == false) {
                    echo "Umh, We can't store robots right now: \n";
                    foreach ($robot->getMessages() as $message) {
                        echo $message, "\n";
                    }
                } else {
                    echo '1';
                }
            }
        }else{
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