<?php
/**
 * @CreateTime: 2016/4/12 18:01
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */

namespace Hemacms\Admin\Models;
use Phalcon\Mvc\Model;

class User extends Model
{
    public $id;
    public $username;
    public $nickname;
    public $password;
    public $last_login_time;
    public $last_login_ip;
    public $email;
    public $remark;
    public $create_time;
    public $create_ip;
    public $status;
    /**
     * @return mixed
     */
    public function getCreateIp()
    {
        return $this->create_ip;
    }

    /**
     * @param mixed $create_ip
     */
    public function setCreateIp($create_ip)
    {
        $this->create_ip = $create_ip;
    }

    /**
     * @return mixed
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * @param mixed $create_time
     */
    public function setCreateTime($create_time)
    {
        $this->create_time = $create_time;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function getLastLoginIp()
    {
        return $this->last_login_ip;
    }

    /**
     * @param mixed $last_login_ip
     */
    public function setLastLoginIp($last_login_ip)
    {
        $this->last_login_ip = $last_login_ip;
    }

    /**
     * @return mixed
     */
    public function getLastLoginTime()
    {
        return $this->last_login_time;
    }

    /**
     * @param mixed $last_login_time
     */
    public function setLastLoginTime($last_login_time)
    {
        $this->last_login_time = $last_login_time;
    }

    /**
     * @return mixed
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param mixed $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * @param mixed $remark
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }


    public function columnMap()
    {
        return array(
            'id' => 'id',
            'username' => 'username',
            'nickname' => 'nickname',
            'password' => 'password',
            'last_login_time' => 'last_login_time',
            'last_login_ip' => 'last_login_ip',
            'email' => 'email',
            'remark' => 'remark',
            'create_time' => 'create_time',
            'create_ip' => 'create_ip',
            'status' => 'status',
        );
    }
    public function getSource()
    {
        return "hm_user";
    }
    public function initialize()
    {
        $this->useDynamicUpdate(true);
    }
}