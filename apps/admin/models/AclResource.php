<?php
/**
 * @CreateTime: 2016/5/12 14:01
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */
namespace Hemacms\Admin\Models;
use Phalcon\Mvc\Model;

class AclResource extends Model
{
    public $id;
    public $name;
    public $controller;
    public $action;
    public $isshow;
    public $pid;
    public $sort;
    public $icon;

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIsshow()
    {
        return $this->isshow;
    }

    /**
     * @param mixed $isshow
     */
    public function setIsshow($isshow)
    {
        $this->isshow = $isshow;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * @param mixed $pid
     */
    public function setPid($pid)
    {
        $this->pid = $pid;
    }

    /**
     * @return mixed
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param mixed $sort
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    }
    public function columnMap()
    {
        return array(
            'id' => 'id',
            'name' => 'name',
            'controller' => 'controller',
            'action' => 'action',
            'isshow' => 'isshow',
            'pid' => 'pid',
            'sort' => 'sort',
            'icon' => 'icon',
        );
    }
    public function getSource()
    {
        return "hm_acl_resource";
    }
    public function initialize()
    {
        $this->useDynamicUpdate(true);
    }
}