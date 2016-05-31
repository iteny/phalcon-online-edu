<?php
/**
 * @CreateTime: 2016/5/31 21:04
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */
namespace Hemacms\Admin\Models;
use Phalcon\Mvc\Model;

class AclUserGroup extends Model
{
    public $uid;
    public $group_id;

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * @param mixed $group_id
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
    }

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }
    public function columnMap()
    {
        return array(
            'uid' => 'uid',
            'group_id' => 'group_id',
        );
    }
    public function getSource()
    {
        return "hm_acl_user_group";
    }
    public function initialize()
    {
        $this->useDynamicUpdate(true);
//        $this->belongsTo('uid','Hemacms\Admin\Models\User','id',array('alias'=>'user');
//        $this->belongsTo('group_id','Hemacms\Admin\Models\AclGroup','id',array('alias'=>'aclgroup');
    }
}