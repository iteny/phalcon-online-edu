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
use Phalcon\Mvc\Model\Transaction\Manager as SwManager;
class SiteController extends Controller
{
    //读取菜单
    public function menuAction(){
        $cacheKey = 'admin-menu.cache';
        $adminMenu   = $this->safeCache->get($cacheKey);
        if($adminMenu === null){
            $sql = "SELECT * FROM Hemacms\Admin\Models\AclResource ORDER BY sort ASC";
            $adminMenu = $this->modelsManager->executeQuery($sql);
            $adminMenu = $this->function->recursive($adminMenu->toArray());
            $this->safeCache->save($cacheKey,$adminMenu,$this->config->admincache->adminmenu);
        }
        $this->view->adminMenu = $adminMenu;
    }
    //添加&&修改菜单
    public function addEditMenuAction(){
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
                            'pattern' => '/^[0-9]\d*$/'
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
                if($this->request->getPost('id')){
                    $menu['id'] = $this->request->getPost('id','int');
                }
                $menu['name'] = $this->request->getPost('name','string');
                $menu['controller'] = $this->request->getPost('controller','string');
                $menu['action'] = $this->request->getPost('action','string');
                $menu['isshow'] = $this->request->getPost('isshow','int');
                $menu['pid'] = $this->request->getPost('pid','int');
                $menu['sort'] = $this->request->getPost('sort','int');
                $menu['icon'] = $this->request->getPost('icon','string');
                if($this->request->getPost('id')){
                    $sql = "UPDATE Hemacms\Admin\Models\AclResource SET name=?0,controller=?1,action=?2,isshow=?3,pid=?4,sort=?5,icon=?6 WHERE id={$menu['id']}";
                    $status = $this->modelsManager->executeQuery($sql,array(
                        0 => $menu['name'],
                        1 => $menu['controller'],
                        2 => $menu['action'],
                        3 => $menu['isshow'],
                        4 => $menu['pid'],
                        5 => $menu['sort'],
                        6 => $menu['icon']
                    ));
                    $msg = $this->function->returnMsg("菜单修改成功","菜单修改失败",$status->success());
                }else{
                    $sql = "INSERT INTO Hemacms\Admin\Models\AclResource (name,controller,action,isshow,pid,sort,icon) VALUES (:name:,:controller:,:action:,:isshow:,:pid:,:sort:,:icon:)";
                    $status = $this->modelsManager->executeQuery($sql,$menu);
                    $msg = $this->function->returnMsg("添加菜单成功","添加菜单失败",$status->success());
                }
                if($status->success()){
                    $this->safeCache->delete('admin-menu.cache');
                    $this->safeCache->delete('admin-select.cache');
                }
                exit(json_encode($msg));

//                if ($menu->save() == false) {
//                    $str = "您好，你在执行添加菜单操作时出现以下问题: ".'<br>';;
//                    foreach ($menu->getMessages() as $message) {
//                        $str .= $message.'!<br>';
//                    }
//                    exit(json_encode(array('info'=>$str)));
//                } else {
//                    $this->safeCache->delete('admin-menu.cache');
//                    $this->safeCache->delete('admin-select.cache');
//                    echo '1';
//                }
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
    //菜单排序
    public function sortMenuAction(){
        $this->view->disable();
        $sortMenu = $this->request->getPost('sort');
        $ids = implode(',', array_keys($sortMenu));
        $sql = "UPDATE Hemacms\Admin\Models\AclResource SET sort = CASE id ";
        foreach ($sortMenu as $id => $sort) {
            $sql .= sprintf("WHEN %d THEN %d ", $id, $sort);
        }
        $sql .= "END WHERE id IN ($ids)";
        $status = $this->modelsManager->executeQuery($sql);
        $msg = $this->function->returnMsg("菜单排序成功","菜单排序失败",$status->success());
        $this->safeCache->delete('admin-menu.cache');
        $this->safeCache->delete('admin-select.cache');
        exit(json_encode($msg));
    }
    // 删除菜单
    public function delMenuAction(){
        $this->view->disable();
        $id = $this->request->getPost('id','int');
        if($this->request->isPost() && $id){
            $sql = "SELECT id,pid FROM Hemacms\Admin\Models\AclResource";
            $menuid = $this->modelsManager->executeQuery($sql);
            $delid = $this->function->getAllChild($menuid->toArray(),$id);
            $delid[] = $id;
            $delid = implode(',',$delid);
            $sql = "DELETE FROM Hemacms\Admin\Models\AclResource WHERE id IN($delid) ";
            $status = $this->modelsManager->executeQuery($sql);
            $msg = $this->function->returnMsg("菜单删除成功","菜单删除失败",$status->success());
            $this->safeCache->delete('admin-menu.cache');
            $this->safeCache->delete('admin-select.cache');
            exit(json_encode($msg));
        }
    }
}