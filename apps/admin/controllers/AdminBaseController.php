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
//    protected function initialize()
    public function aclAction()
    {
        $safeCache = $this->di->get('safeCache',3600);
//        $safeCache->save('acl',111);
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
//                echo $role['role'].'</br>';
                $sql = "SELECT * FROM Hemacms\Admin\Models\AclResource WHERE id IN ($role->resource)";
                $resource = $this->modelsManager->executeQuery($sql);

                foreach($resource as $res){
                    $acl->allow(new Resource($role->role),$res->controller,$res->action);
                }
            }
//            var_dump($resource);
        }
        $safeCache->save('acl',serialize($acl),3600);

//            $roleGuest = new \Phalcon\Acl\Role('guest','for anonymous visitors');
//            $roleMembers = new \Phalcon\Acl\Role('member','for members');
//            $acl->addRole($roleGuest);
//            $acl->addRole($roleMembers,$roleGuest);
//            $aclResource = new \Phalcon\Acl\Resource('acl');
//            $acl->addResource($aclResource,array('index','another','mem','all'));
//            $acl->allow('guest','acl','index');
//            $acl->allow('guest','acl','all');
//            $acl->allow('member','acl','mem');
//            $safeCache->save('acl',serialize($acl),3600);
//        }
//        else
//        {
//            $acl = unserialize($safeCache->get('acl'));
//        }
//        $meController = $this->dispatcher->getControllerName();
//        $meAction = $this->dispatcher->getActionName();
//        $objRole = $this->dispatcher->getParam('user');
//        if($acl->isAllowed('guest',$meController,$meAction))
//        {
//            echo '允许访问';
//        }
//        else
//        {
//            echo '您没有访问权限';
//        }

    }
    public function indexAction()
    {
        echo '111';
        $this->view->disable();
    }
}