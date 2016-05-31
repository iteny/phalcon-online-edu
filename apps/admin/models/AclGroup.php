<?php
/**
 * @CreateTime: 2016/5/29 21:23
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */
namespace Hemacms\Admin\Models;
use Phalcon\Mvc\Model;

class AclGroup extends Model
{
    public $id;
    public $title;
    public $status;
    public $resource;
    public $sort;
    public $role;

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
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @param mixed $resource
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
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

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function columnMap()
    {
        return array(
            'id' => 'id',
            'title' => 'title',
            'status' => 'status',
            'resource' => 'resource',
            'sort' => 'sort',
            'role' => 'role',
        );
    }
    public function getSource()
    {
        return "hm_acl_group";
    }
    public function initialize()
    {
        $this->useDynamicUpdate(true);
//        $this->hasMany('id','Hemacms\Admin\Models\AclUserGroup','group_id',array('alias'=>'aclusergroup');
    }
}