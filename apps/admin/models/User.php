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
    public $password;

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
            'password' => 'password',
        );


    }
}