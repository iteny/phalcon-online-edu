<?php
/**
 * @CreateTime: 2016/5/14 13:24
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */
namespace Hemacms\Admin\Controllers;
use Phalcon\Mvc\Controller;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\PresenceOf;
use Hemacms\Admin\Models\AclResource;
class SiteController extends Controller
{
    public function menuAction()
    {
        $cacheKey = 'admin-menu.cache';
        $adminMenu   = $this->safeCache->get($cacheKey);
        if($adminMenu === null){
            $adminMenu = AclResource::find(
                array(
                    'order' => 'sort',
                )
            );
            $adminMenu = $this->function->recursive($adminMenu->toArray());
            $this->safeCache->save($cacheKey,$adminMenu,$this->config->admincache->adminmenu);
        }
        $this->view->adminMenu = $adminMenu;
    }
    public function addEditMenuAction()
    {
        if($this->request->isPost() && $this->request->getPost('addEditMenu')){
            $this->view->disable();
            $validation = new Validation();
            $validation->add('name',new PresenceOf(array(
                            'message' => '菜单名称不能为空'
                        )))
                        ->add('name', new Regex(array(
                            'message' => '菜单名称必须是中文',
                            'pattern' => '/^[\x{4e00}-\x{9fa5}]+$/u'
                        )))
                        ->add('controller',new PresenceOf(array(
                            'message' => '控制器名称不能为空'
                        )))
                        ->add('controller', new Regex(array(
                           'message' => '控制器名称必须是英文字符串',
                           'pattern' => '/^[A-Za-z]+$/'
                        )))
                        ->add('action',new PresenceOf(array(
                            'message' => '方法名称不能为空'
                        )))
                        ->add('action', new Regex(array(
                            'message' => '方法名称必须是英文字符串',
                            'pattern' => '/^[A-Za-z]+$/'
                        )))
                        ->add('pid',new PresenceOf(array(
                            'message' => '父ID不能为空'
                        )))
                        ->add('pid', new Regex(array(
                            'message' => '父ID必须是整数',
                            'pattern' => '/^[1-9]\d*$/'
                        )))
                        ->add('sort',new PresenceOf(array(
                            'message' => '排序数不能为空'
                        )))
                        ->add('sort', new Regex(array(
                            'message' => '排序数必须是整数',
                            'pattern' => '/^[1-9]\d*$/'
                        )));
            $messages = $validation->validate($this->request->getPost());
            if (count($messages)) {
                $str = '';
                foreach ($messages as $message) {
                    $str .= $message.'!<br>';
                }
                exit(json_encode(array('info'=>$str)));
            }else{
                $menu       = new AclResource();
                if($this->request->getPost('id')){
                    $menu->id = $this->request->getPost('id','int');
                }
                $menu->name = $this->request->getPost('name','string');
                $menu->controller = $this->request->getPost('controller','string');
                $menu->action = $this->request->getPost('action','string');
                $menu->isshow = $this->request->getPost('isshow','int');
                $menu->pid = $this->request->getPost('pid','int');
                $menu->sort = $this->request->getPost('sort','int');
                $menu->icon = $this->request->getPost('icon','string');
                if ($menu->save() == false) {
                    $str = "您好，你在执行添加菜单操作时出现以下问题: ".'<br>';;
                    foreach ($robot->getMessages() as $message) {
                        $str .= $message.'!<br>';
                    }
                    exit(json_encode(array('info'=>$str)));
                } else {
                    $this->safeCache->delete('admin-menu.cache');
                    $this->safeCache->delete('admin-select.cache');
                    echo '1';
                }
            }
        }else{
            $cacheKey = 'admin-select.cache';
            $adminSelect   = $this->safeCache->get($cacheKey);
            if($adminSelect === null){
                $adminSelect = AclResource::find(
                    array(
                        'order' => 'sort',
                    )
                );
                $adminSelect = $this->function->recursiveTwo($adminSelect->toArray());
                $this->safeCache->save($cacheKey,$adminSelect,$this->config->admincache->adminmenu);
            }
            $this->view->adminSelect = $adminSelect;
            if($this->request->getQuery('id')){
                $id = $this->request->getQuery('id','int');
                $thisMenu = AclResource::findFirst(
                    array(
                        'id = :id:',
                        'bind' => array('id'=>$this->request->getQuery('id')),
                    )
                );
                $this->view->thismenu = $thisMenu->toArray();
                $this->view->pick("Site/editMenu");
            }else{
                $pid = $this->request->getQuery('pid','int');
                $pid = $pid != '' ? $pid : 0;
                $this->view->pid = $pid;
                $this->view->pick("Site/addMenu");
            }
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