<?php
/**
 * @CreateTime: 2016/5/1 21:11
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */
namespace Hemacms\Admin\Models;
use Phalcon\Mvc\Model;

class LoginLog extends Model
{
    public $id;
    public $username;
    public $logintime;
    public $loginip;
    public $status;
    public $info;
    public $area;
    public $country;
    public $useragent;

    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param mixed $area
     */
    public function setArea($area)
    {
        $this->area = $area;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
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
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @return mixed
     */
    public function getLoginip()
    {
        return $this->loginip;
    }

    /**
     * @param mixed $loginip
     */
    public function setLoginip($loginip)
    {
        $this->loginip = $loginip;
    }

    /**
     * @return mixed
     */
    public function getLogintime()
    {
        return $this->logintime;
    }

    /**
     * @param mixed $logintime
     */
    public function setLogintime($logintime)
    {
        $this->logintime = $logintime;
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
    public function getUseragent()
    {
        return $this->useragent;
    }

    /**
     * @param mixed $useragent
     */
    public function setUseragent($useragent)
    {
        $this->useragent = $useragent;
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
            'logintime' => 'logintime',
            'loginip' => 'loginip',
            'status' => 'status',
            'info' => 'info',
            'area' => 'area',
            'country' => 'country',
            'useragent' => 'useragent',
        );
    }
    public function getSource()
    {
        return "hm_login_log";
    }
    public function initialize()
    {
        $this->useDynamicUpdate(true);
    }

}