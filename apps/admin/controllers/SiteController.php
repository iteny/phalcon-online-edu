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
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Mvc\Model\Transaction\Failed as TxFailed;
use Phalcon\Mvc\Model\Transaction\Manager as TxManager;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;
use Hemacms\Admin\Models\User;
use Hemacms\Admin\Models\AclUserGroup;
class SiteController extends AdminBaseController
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
                    $keys = $this->safeCache->queryKeys();
                    foreach ($keys as $key) {
                        $this->safeCache->delete($key);
                    }
                }
                exit(json_encode($msg));
            }
        }else{
            $cacheKey = 'admin-select.cache';
            $adminSelect   = $this->safeCache->get($cacheKey);

            if($adminSelect === null){
                $sql = "SELECT * FROM Hemacms\Admin\Models\AclResource ORDER BY sort ASC";
                $adminSelect = $this->modelsManager->executeQuery($sql);
                $adminSelect = $this->function->recursiveTwo($adminSelect->toArray());
                $this->safeCache->save($cacheKey,$adminSelect,$this->config->admincache->adminmenu);
            }
            $this->view->adminSelect = $adminSelect;
            if($this->request->getQuery('id')){
                $id = $this->request->getQuery('id','int');
                $sql = "SELECT * FROM Hemacms\Admin\Models\AclResource WHERE id = :id:";
                $thisMenu = $this->modelsManager->executeQuery($sql,array(
                    'id' => $id
                ))->getFirst();
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
            if($status->success()){
                $keys = $this->safeCache->queryKeys();
                foreach ($keys as $key) {
                    $this->safeCache->delete($key);
                }
            }
            exit(json_encode($msg));
        }
    }
    //用户组管理
    public function groupAction(){
        $sql = "SELECT * FROM Hemacms\Admin\Models\AclGroup ORDER BY sort ASC";
        $group = $this->modelsManager->executeQuery($sql);
        $this->view->group = $group->toArray();
    }
    //用户组权限设置
    public function setGroupAction(){
        if($this->request->getQuery('id') == '1'){
            echo "不允许对超级管理员授权";
            exit;
        }
        if($this->request->isPost() && $this->request->getPost('setGroup')){
            $this->view->disable();
            $resIds = $this->request->getPost('resid');
            $id = $this->request->getPost('id','int');
            $sql = "UPDATE Hemacms\Admin\Models\AclGroup SET resource = ?0 WHERE id = $id";
            $status = $this->modelsManager->executeQuery($sql,array(
                0 => $resIds
            ));
            $msg = $this->function->returnMsg("授权成功","授权失败",$status->success());
            $this->safeCache->delete('acl');
            exit(json_encode($msg));
        }else{
            $id = $this->request->getQuery('id','int');
            $sql = "SELECT id,name,pid FROM Hemacms\Admin\Models\AclResource";
            $resource = $this->modelsManager->executeQuery($sql);
            $resource = $resource->toArray();
            $groupSql = "SELECT id,title,resource FROM Hemacms\Admin\Models\AclGroup WHERE id = :id:";
            $group = $this->modelsManager->executeQuery($groupSql,array(
                'id' => $id
            ))->getFirst();
            $resourceIds = explode(",",$group->resource);
            $data = $this->function->treeRule($resource);
            $data = $this->function->treeState($data,$resourceIds);
            $this->view->resource = json_encode($data);
            $this->view->id = $id;
            $this->view->rolename = $group->title;
        }
    }
    //添加或修改用户组
    public function addEditGroupAction(){
        if($this->request->getQuery('id') == '1'){
            echo "不允许对超级管理员修改";
            exit;
        }
        if($this->request->isPost() && $this->request->getPost('addEditGroup')){
            $this->view->disable();
            $validation = new Validation();
            $validation->add('title',new PresenceOf(array(
                'message' => '用户组名称不能为空'
                )))
                ->add('title', new Regex(array(
                    'message' => '用户组名称必须是中文',
                    'pattern' => '/^[\x{4e00}-\x{9fa5}]+$/u'
                )))
                ->add('role',new PresenceOf(array(
                    'message' => '用户组英文名称不能为空'
                )))
                ->add('role', new Regex(array(
                    'message' => '用户组英文名称必须是英文字符串',
                    'pattern' => '/^[A-Za-z]+$/'
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
                    $group['id'] = $this->request->getPost('id','int');
                }
                $group['title'] = $this->request->getPost('title','string');
                $group['role'] = $this->request->getPost('role','string');
                $group['status'] = $this->request->getPost('status','int');
                $group['sort'] = $this->request->getPost('sort','int');
                if($this->request->getPost('id')){
                    $sql = "UPDATE Hemacms\Admin\Models\AclGroup SET title=?0,role=?1,status=?2,sort=?3 WHERE id={$group['id']}";
                    $status = $this->modelsManager->executeQuery($sql,array(
                        0 => $group['title'],
                        1 => $group['role'],
                        2 => $group['status'],
                        3 => $group['sort']
                    ));
                    $msg = $this->function->returnMsg("修改用户组成功","修改用户组失败",$status->success());
                }else{
                    $sql = "INSERT INTO Hemacms\Admin\Models\AclGroup (title,role,status,sort) VALUES (:title:,:role:,:status:,:sort:)";
                    $status = $this->modelsManager->executeQuery($sql,$group);
                    $msg = $this->function->returnMsg("添加用户组成功","添加用户组失败",$status->success());
                }
                if($status->success()){
                    $this->safeCache->delete('acl');
                }
                exit(json_encode($msg));
            }
        }else{
            if($this->request->getQuery('id')){
                $id = $this->request->getQuery('id','int');
                $sql = "SELECT * FROM Hemacms\Admin\Models\AclGroup WHERE id = :id:";
                $thisGroup = $this->modelsManager->executeQuery($sql,array(
                    'id' => $id
                ))->getFirst();
                $this->view->thisgroup = $thisGroup->toArray();
                $this->view->pick("Site/editGroup");
            }else{
                $this->view->pick("Site/addGroup");
            }
        }
    }
    //删除用户组
    public function delGroupAction(){
        if($this->request->getQuery('id') == '1'){
            echo "不允许删除超级管理员";
            exit;
        }
        $this->view->disable();
        $id = $this->request->getPost('id','int');
        if($this->request->isPost() && $id){
            $sql = "DELETE FROM Hemacms\Admin\Models\AclGroup WHERE id = :id:";
            $status = $this->modelsManager->executeQuery($sql,array(
                'id' => $id
            ));
            $msg = $this->function->returnMsg("用户组删除成功","用户组删除失败",$status->success());
            if($status->success()){
                $this->safeCache->delete('acl');
            }
            exit(json_encode($msg));
        }
    }
    //用户管理
    public function userAction(){
        $user = $this->db->fetchAll("SELECT u.id,u.username,u.create_time,u.create_ip,u.email,u.remark,u.status,ug.uid,g.role,g.title FROM hm_user u JOIN hm_acl_user_group ug JOIN hm_acl_group g WHERE ug.uid = u.id AND ug.group_id = g.id ORDER BY u.id ASC");
        $this->view->user = $user;
    }
    //添加或修改用户
    public function addEditUserAction(){
        if($this->request->getQuery('id') == '1'){
            echo "不允许对超级管理员修改";
            exit;
        }
        if($this->request->isPost() && $this->request->getPost('addEditUser')){
            $this->view->disable();
            $validation = new Validation();
            $validation->add('username',new PresenceOf(array(
                'message' => '用户名不能为空'
                )))
                ->add('username', new Regex(array(
                'message' => '账号以字母开头,5-17 字母、数字、下划线',
                'pattern' => '/^[a-zA-Z][\w]{4,16}$/'
                )))
                ->add('nickname',new PresenceOf(array(
                    'message' => '昵称不能为空'
                )))
                ->add('nickname', new StringLength(array(
                    'max' => 6,
                    'min' => 2,
                    'messageMaximum' => '昵称最长6个中文',
                    'messageMinimum' => '昵称最短2个中文'
                )))
                ->add('nickname', new Regex(array(
                    'message' => '昵称必须是中文',
                    'pattern' => '/^[\x{4e00}-\x{9fa5}]+$/u'
                )))
                ->add('password',new Confirmation(array(
                    'message' => '两次密码不一致',
                    'with' => 'passworded'
                )))
                ->add('email',new Email(array(
                    'message' => 'email格式错误'
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
                    $id = $this->request->getPost('id','int');
                }
                $username = $this->request->getPost('username','string');
                if($this->request->getPost('password','string') == '' || $this->request->getPost('passworded','string') == ''){//当没有修改密码时
                    unset($password);
                }
                else
                {
                    $password = sha1(md5($this->request->getPost('password','string')));
                }
                $nickname = $this->request->getPost('nickname','string');
                $email = $this->request->getPost('email','string');
                $remark = $this->request->getPost('remark','string');
                $group_id = $this->request->getPost('group_id','int');
                $status = $this->request->getPost('status','int');
                if($this->request->getPost('id')){
                    if($this->request->getPost('password','string') == '' || $this->request->getPost('passworded','string') == ''){//当没有修改密码时
                        $sql = "UPDATE hm_user AS a INNER JOIN hm_acl_user_group AS b ON a.id=b.uid Set a.username=?,a.nickname=?,a.email=?,a.remark=?,a.status=?,b.group_id=? where a.id={$id};";
                        $status = $this->db->execute($sql,array($username,$nickname,$email,$remark,$status,$group_id));
                    }
                    else
                    {
                        $sql = "UPDATE hm_user AS a INNER JOIN hm_acl_user_group AS b ON a.id=b.uid Set a.username=?,a.nickname=?,a.email=?,a.remark=?,a.status=?,a.password=?,b.group_id=? where a.id={$id};";
                        $status = $this->db->execute($sql,array($username,$nickname,$email,$remark,$status,$password,$group_id));
                    }
                    if($status){
                        $this->safeCache->delete('acl');
                    }
                    $msg = $this->function->returnMsg("修改用户成功","修改用户失败",$status);
                }else{
                    try {
                        $manager     = new TxManager();
                        $transaction = $manager->get();
                        $user              = new User();
                        $user->setTransaction($transaction);
                        $user->username    = $username;
                        $user->password    = $password;
                        $user->nickname    = $nickname;
                        $user->email       = $email;
                        $user->remark      = $remark;
                        $user->status      = $status;
                        $user->create_time = $_SERVER['REQUEST_TIME'];
                        $user->create_ip   = $this->function->getClientIp();
                        if ($user->save() == false) {
                            $transaction->rollback('插入用户失败');
                        }
                        $usergroup           = new AclUserGroup();
                        $usergroup->setTransaction($transaction);
                        $usergroup->uid      = $user->id;
                        $usergroup->group_id = $group_id;
                        if ($usergroup->save() == false) {
                            $transaction->rollback('插入用户组失败');
                        }
                        $transaction->commit();
                        $this->safeCache->delete('acl');
                        $msg = $this->function->returnMsg("添加用户成功","添加用户失败",true);
                    } catch (TxFailed $e) {
                        $msg = $this->function->returnMsg("添加用户成功",$e->getMessage(),false);
                    }
                }
                exit(json_encode($msg));
            }
        }else{
            $cacheKey = 'admin-group.cache';
            $adminGroup   = $this->safeCache->get($cacheKey);
            if($adminGroup === null){
                $sql = "SELECT * FROM Hemacms\Admin\Models\AclGroup ORDER BY sort ASC";
                $adminGroup = $this->modelsManager->executeQuery($sql);
                $this->safeCache->save($cacheKey,$adminGroup,$this->config->admincache->adminmenu);
            }
            $this->view->adminGroup = $adminGroup;
            if($this->request->getQuery('id')){
                $id = $this->request->getQuery('id','int');
                $meuser = $this->db->fetchOne("SELECT u.id,u.username,u.nickname,u.email,u.remark,u.status,ug.uid,ug.group_id,g.role,g.title FROM hm_user u JOIN hm_acl_user_group ug JOIN hm_acl_group g WHERE ug.uid = u.id AND ug.group_id = g.id AND u.id = {$id} LIMIT 1");
                $this->view->user = $meuser;
                $this->view->pick("Site/editUser");
            }else{
                $this->view->pick("Site/addUser");
            }
        }
    }
    //删除用户
    public function delUserAction(){
        $id = $this->request->getPost('id','int');
        if($id == '1'){
            echo "不允许删除超级管理员";
            exit;
        }
        $this->view->disable();
        if($this->request->isPost() && $id){
            try {
                $manager     = new TxManager();
                $transaction = $manager->get();
                $user              = new User();
                $user->setTransaction($transaction);
                $user->id = $id;
                if ($user->delete() == false) {
                    $transaction->rollback('删除用户失败');
                }
                $transaction->commit();
                $this->safeCache->delete('acl');
                $msg = $this->function->returnMsg("删除用户成功","删除用户失败",true);
            } catch (TxFailed $e) {
                $msg = $this->function->returnMsg("删除用户成功",$e->getMessage(),false);
            }
            exit(json_encode($msg));
        }
    }
    //登录日志
    public function loginLogAction(){
        $pageNum     = $this->request->getQuery( 'page', 'int' );
        $currentPage = $pageNum ?: 1;
        $username = $this->request->getQuery('username','string');
        $start_time = strtotime($this->request->getQuery('start_time','string'));
        $end_time = strtotime($this->request->getQuery('end_time','string'));
        $loginip = $this->request->getQuery('loginip','string');
        $status = $this->request->getQuery('status','int');
        $where = '';
        if (!empty($username) || (!empty($start_time) && !empty($end_time)) || !empty($loginip) || $status != ''){
            $where .= "WHERE ";
        }
        if (!empty($username)) {
            $where .= "username like '%".$username."%' AND ";
        }
        if (!empty($start_time) && !empty($end_time)) {
            $where .= "logintime > ".$start_time." AND logintime < ".$end_time." AND ";
        }
        if (!empty($loginip)) {
            $where .= "loginip LIKE '%".$loginip."%' AND ";
        }
        if ($status != '') {
            $where .= "status = $status AND ";
        }
        $where = rtrim($where,'AND ');
        $cacheKey = 'admin-login-log.cache'.$username.$start_time.$end_time.$loginLog.$status;
        $loginLog   = $this->safeCache->get($cacheKey);
        if($loginLog === null){
            $sql = "SELECT * FROM Hemacms\Admin\Models\LoginLog {$where} ORDER BY id DESC ";
            $loginLog = $this->modelsManager->executeQuery($sql);
            $this->safeCache->save($cacheKey,$loginLog,$this->config->admincache->adminlog);
        }
        $pagination = new PaginatorModel(array(
            'data'  => $loginLog,
            'limit' => 15,
            'page'  => $currentPage
        ));
        $page = $pagination->getPaginate();
        $this->view->page = $page;
        $this->view->username = $username;
        $this->view->start_time = $start_time;
        $this->view->end_time = $end_time;
        $this->view->loginip = $loginip;
        $this->view->status = $status;
    }
    // 删除上月登录日志
    public function delLoginLogAction()
    {
        $where = "WHERE logintime < ".(time() - (86400 * 30))."";
        $sql = "DELETE FROM Hemacms\Admin\Models\LoginLog {$where}";
        $status = $this->modelsManager->executeQuery($sql);
        $msg = $this->function->returnMsg("删除登录日志成功！","删除登录日志失败！",$status->success());
        exit(json_encode($msg));
    }
    //操作日志
    public function operateLogAction(){
        $pageNum     = $this->request->getQuery( 'page', 'int' );
        $currentPage = $pageNum ?: 1;
        $username = $this->request->getQuery('username','string');
        $start_time = strtotime($this->request->getQuery('start_time','string'));
        $end_time = strtotime($this->request->getQuery('end_time','string'));
        $loginip = $this->request->getQuery('loginip','string');
        $status = $this->request->getQuery('status','int');
        $where = '';
        if (!empty($username) || (!empty($start_time) && !empty($end_time)) || !empty($loginip) || $status != ''){
            $where .= "WHERE ";
        }
        if (!empty($username)) {
            $where .= "username like '%".$username."%' AND ";
        }
        if (!empty($start_time) && !empty($end_time)) {
            $where .= "time > ".$start_time." AND time < ".$end_time." AND ";
        }
        if (!empty($loginip)) {
            $where .= "ip LIKE '%".$loginip."%' AND ";
        }
        if ($status != '') {
            $where .= "status = $status AND ";
        }
        $where = rtrim($where,'AND ');
        $cacheKey = 'admin-operate-log.cache'.$username.$start_time.$end_time.$loginLog.$status;
        $operateLog   = $this->safeCache->get($cacheKey);
        if($operateLog === null){
            $sql = "SELECT * FROM Hemacms\Admin\Models\OperateLog {$where} ORDER BY id DESC ";
            $operateLog = $this->modelsManager->executeQuery($sql);
            $this->safeCache->save($cacheKey,$operateLog,$this->config->admincache->adminlog);
        }
        $pagination = new PaginatorModel(array(
            'data'  => $operateLog,
            'limit' => 15,
            'page'  => $currentPage
        ));
        $page = $pagination->getPaginate();
        $this->view->page = $page;
        $this->view->username = $username;
        $this->view->start_time = $start_time;
        $this->view->end_time = $end_time;
        $this->view->loginip = $loginip;
        $this->view->status = $status;
    }
    // 删除上月操作日志
    public function delOperateLogAction()
    {
        $where = "WHERE time < ".(time() - (86400 * 30))."";
        $sql = "DELETE FROM Hemacms\Admin\Models\OperateLog {$where}";
        $status = $this->modelsManager->executeQuery($sql);
        $msg = $this->function->returnMsg("删除操作日志成功！","删除操作日志失败！",$status->success());
        exit(json_encode($msg));
    }
    //系统设置
    public function setAction(){
        if($this->request->isPost()){
            $file = APP_PATH . '/apps/admin/config/set.config.php';
            require $file;
            $settings['application']['debug'] = $this->request->getPost('debug');
            $settings['safecache']['lifetime'] = $this->request->getPost('safecachetime');
            $settings['admincache']['adminmenu'] = $this->request->getPost('adminmenu');;
            $settings['admincache']['adminlog'] = $this->request->getPost('adminlog');;
            $str = "<?php\r\n".'$settings=' . var_export($settings, true) . ";\r\n?>";
            if(file_put_contents($file, $str)){
                $status = true;
                $msg = $this->function->returnMsg("修改系统设置成功","修改系统设置失败",$status);
            }else{
                $status = false;
                $msg = $this->function->returnMsg("修改系统设置成功","修改系统设置失败",$status);
            }
            $this->view->disable();
            exit(json_encode($msg));
        }else{
            $file = APP_PATH . '/apps/admin/config/set.config.php';
            require $file;
            $this->view->debug = $settings['application']['debug'];
            $this->view->safecache = $settings['safecache']['lifetime'];
            $this->view->adminmenu = $settings['admincache']['adminmenu'];
            $this->view->adminlog = $settings['admincache']['adminlog'];
        }

    }
    public function backupAction(){
        $this->view->disable();
//        $t = $this->db->fetchOne("SELECT u.id,ug.uid,g.role,g.title FROM hm_user u JOIN hm_acl_user_group ug JOIN hm_acl_group g WHERE ug.uid = u.id AND ug.group_id = g.id AND u.id = {$id['id']} LIMIT 1");
//        $t = array_coarrlumn($t);
//        var_dump($t);

    }
}