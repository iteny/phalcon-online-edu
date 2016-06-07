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
        $name = $this->request->getPost('name');
        if($this->request->isPost() && $name){
            $sql = "SELECT * FROM Hemacms\Admin\Models\AclResource WHERE name = :name:";
            $count = $this->modelsManager->executeQuery($sql,array(
                'name' => $name
            ));
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
        $name = $this->request->getPost('name');
        $id = $this->request->getQuery('id');
        if($this->request->isPost() && $name){
            $sql = "SELECT * FROM Hemacms\Admin\Models\AclResource WHERE name = :name: AND id != :id:";
            $count = $this->modelsManager->executeQuery($sql,array(
                'name' => $name,
                'id' => $id
            ));
            if(!$count->count()){
                echo 'true';
            } else {
                echo 'false';
            }
            exit;
        }
    }
    //添加用户组时验证用户组名称
    public function checkAddGtitleAction()
    {
        $this->view->disable();
        $title = $this->request->getPost('title');
        if($this->request->isPost() && $title){
            $sql = "SELECT * FROM Hemacms\Admin\Models\AclGroup WHERE title = :title:";
            $count = $this->modelsManager->executeQuery($sql,array(
                'title' => $title
            ));
            if(!$count->count()){
                echo 'true';
            } else {
                echo 'false';
            }
            exit;
        }
    }
    //添加用户组时验证用户组英文名称
    public function checkAddGroleAction()
    {
        $this->view->disable();
        $role = $this->request->getPost('role');
        if($this->request->isPost() && $role){
            $sql = "SELECT * FROM Hemacms\Admin\Models\AclGroup WHERE role = :role:";
            $count = $this->modelsManager->executeQuery($sql,array(
                'role' => $role
            ));
            if(!$count->count()){
                echo 'true';
            } else {
                echo 'false';
            }
            exit;
        }
    }
    //修改用户组时验证用户组名称
    public function checkEditGtitleAction()
    {
        $this->view->disable();
        $title = $this->request->getPost('title');
        $id = $this->request->getQuery('id');
        if($this->request->isPost() && $title){
            $sql = "SELECT * FROM Hemacms\Admin\Models\AclGroup WHERE title = :title: AND id != :id:";
            $count = $this->modelsManager->executeQuery($sql,array(
                'title' => $title,
                'id' => $id
            ));
            if(!$count->count()){
                echo 'true';
            } else {
                echo 'false';
            }
            exit;
        }
    }
    //修改用户组时验证用户组英文名称
    public function checkEditGroleAction()
    {
        $this->view->disable();
        $role = $this->request->getPost('role');
        $id = $this->request->getQuery('id');
        if($this->request->isPost() && $role){
            $sql = "SELECT * FROM Hemacms\Admin\Models\AclGroup WHERE role = :role: AND id != :id:";
            $count = $this->modelsManager->executeQuery($sql,array(
                'role' => $role,
                'id' => $id
            ));
            if(!$count->count()){
                echo 'true';
            } else {
                echo 'false';
            }
            exit;
        }
    }
    //添加用户时验证用户名
    public function checkAddUsernameAction()
    {
        $this->view->disable();
        $username = $this->request->getPost('username');
        if($this->request->isPost() && $username){
            $sql = "SELECT * FROM Hemacms\Admin\Models\User WHERE username = :username:";
            $count = $this->modelsManager->executeQuery($sql,array(
                'username' => $username
            ));
            if(!$count->count()){
                echo 'true';
            } else {
                echo 'false';
            }
            exit;
        }
    }
    //添加用户时验证昵称
    public function checkAddNicknameAction()
    {
        $this->view->disable();
        $nickname = $this->request->getPost('nickname');
        if($this->request->isPost() && $nickname){
            $sql = "SELECT * FROM Hemacms\Admin\Models\User WHERE nickname = :nickname:";
            $count = $this->modelsManager->executeQuery($sql,array(
                'nickname' => $nickname
            ));
            if(!$count->count()){
                echo 'true';
            } else {
                echo 'false';
            }
            exit;
        }
    }
    //添加用户时验证email
    public function checkAddEmailAction()
    {
        $this->view->disable();
        $email = $this->request->getPost('email');
        if($this->request->isPost() && $email){
            $sql = "SELECT * FROM Hemacms\Admin\Models\User WHERE email = :email:";
            $count = $this->modelsManager->executeQuery($sql,array(
                'email' => $email
            ));
            if(!$count->count()){
                echo 'true';
            } else {
                echo 'false';
            }
            exit;
        }
    }
    //修改用户时验证用户名
    public function checkEditUsernameAction()
    {
        $this->view->disable();
        $username = $this->request->getPost('username');
        $id = $this->request->getQuery('id');
        if($this->request->isPost() && $username){
            $sql = "SELECT * FROM Hemacms\Admin\Models\User WHERE username = :username: AND id != :id:";
            $count = $this->modelsManager->executeQuery($sql,array(
                'username' => $username,
                'id' => $id
            ));
            if(!$count->count()){
                echo 'true';
            } else {
                echo 'false';
            }
            exit;
        }
    }
    //修改用户时验证昵称
    public function checkEditNicknameAction()
    {
        $this->view->disable();
        $nickname = $this->request->getPost('nickname');
        $id = $this->request->getQuery('id');
        if($this->request->isPost() && $nickname){
            $sql = "SELECT * FROM Hemacms\Admin\Models\User WHERE nickname = :nickname: AND id != :id:";
            $count = $this->modelsManager->executeQuery($sql,array(
                'nickname' => $nickname,
                'id' => $id
            ));
            if(!$count->count()){
                echo 'true';
            } else {
                echo 'false';
            }
            exit;
        }
    }
    //修改用户时验证邮箱
    public function checkEditEmailAction()
    {
        $this->view->disable();
        $email = $this->request->getPost('email');
        $id = $this->request->getQuery('id');
        if($this->request->isPost() && $email){
            $sql = "SELECT * FROM Hemacms\Admin\Models\User WHERE email = :email: AND id != :id:";
            $count = $this->modelsManager->executeQuery($sql,array(
                'email' => $email,
                'id' => $id
            ));
            if(!$count->count()){
                echo 'true';
            } else {
                echo 'false';
            }
            exit;
        }
    }
}