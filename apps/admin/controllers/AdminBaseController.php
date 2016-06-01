<?php
/**
 * @CreateTime: 2016/5/10 19:35
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */
namespace Hemacms\Admin\Controllers;
use Phalcon\Mvc\Controller;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;
class AdminBaseController extends Controller
{
    protected function initialize()
    {
        $sess = $this->session->get('userInfo');
        if($sess['session_verfiy'] != trim(trim(trim($_SERVER['HTTP_USER_AGENT'])) . trim(md5($_SERVER['SERVER_ADDR']))))
        {
            return $this->response->redirect('admin/login/index');
        }
        $safeCache = $this->di->get('safeCache',3600);
        if(!$safeCache->exists('acl')) {
            $acl = new \Phalcon\Acl\Adapter\Memory();
            $acl->setDefaultAction(\Phalcon\Acl::DENY);
            $sql = "SELECT id,resource,role FROM Hemacms\Admin\Models\AclGroup WHERE status = :status: ORDER BY sort ASC";
            $group = $this->modelsManager->executeQuery($sql, array(
                'status' => 1
            ));
            $resourceSql = "SELECT controller,action FROM Hemacms\Admin\Models\AclResource";
            $allResource = $this->modelsManager->executeQuery($resourceSql);
            foreach($allResource as $res){
                $acl->addResource(new Resource($res->controller),$res->action);
            }
            foreach($group as $role){
                $acl->addRole(new Role($role->role));
                $sql = "SELECT * FROM Hemacms\Admin\Models\AclResource WHERE id IN ($role->resource)";
                $resource = $this->modelsManager->executeQuery($sql);

                foreach($resource as $res){
                    $acl->allow(new Resource($role->role),$res->controller,$res->action);
                }
            }
            $safeCache->save('acl',serialize($acl),3600);
        }else{
            $acl = unserialize($safeCache->get('acl'));
        }
        $meController = $this->dispatcher->getControllerName();
        $meAction = $this->dispatcher->getActionName();
        if($acl->isAllowed('superadmin',$meController,$meAction))
        {
            return true;
        }
        else
        {
            if($this->request->isAjax()){
                exit(json_encode(array(
                    'status' => false,
                    'info' => '对不起，你没有权限执行这个操作'
                )));
            }else if($this->request->isPost()){
                exit(json_encode(array(
                    'status' => false,
                    'info' => '对不起，你没有权限执行这个操作'
                )));
            }else{
                $str = '<body style="background: white;padding:0;margin:0;">';
                $str .= '<div style="width: 100%;">';
                $str .= '<div style="text-align: center;height: 42px;line-height: 42px;color:white;font-size: 18px;font-weight: bold;background: #ff6347;font-family:Microsoft YaHei">对不起，您没有相关的操作权限！。。。</div>';
                $src .= '</div>';
                $str .= '</body>';
                echo $str;
                $this->view->disable();
                exit;
            }
        }
    }
}