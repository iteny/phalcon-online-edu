<?php
/**
 * @CreateTime: 2016/5/10 19:35
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */
namespace Hemacms\Admin\Controllers;
use Phalcon\Mvc\Controller;

class AdminBaseController extends Controller
{
    protected function initialize()
    {
        $safeCache = $this->di->get('safeCache',3600);
//        $safeCache->save('acl',111);
        if(!$safeCache->exists('acl'))
        {
            $acl = new \Phalcon\Acl\Adapter\Memory();
            $acl->setDefaultAction(\Phalcon\Acl::DENY);
            $roleGuest = new \Phalcon\Acl\Role('guest','for anonymous visitors');
            $roleMembers = new \Phalcon\Acl\Role('member','for members');
            $acl->addRole($roleGuest);
            $acl->addRole($roleMembers,$roleGuest);
            $aclResource = new \Phalcon\Acl\Resource('acl');
            $acl->addResource($aclResource,array('index','another','mem','all'));
            $acl->allow('guest','acl','index');
            $acl->allow('guest','acl','all');
            $acl->allow('member','acl','mem');
            $safeCache->save('acl',serialize($acl),3600);
        }
        else
        {
            $acl = unserialize($safeCache->get('acl'));
        }
        $meController = $this->dispatcher->getControllerName();
        $meAction = $this->dispatcher->getActionName();
        $objRole = $this->dispatcher->getParam('user');
        if($acl->isAllowed('guest',$meController,$meAction))
        {
            echo '允许访问';
        }
        else
        {
            echo '您没有访问权限';
        }

    }
    public function indexAction()
    {
        echo '111';
        $this->view->disable();
    }
}