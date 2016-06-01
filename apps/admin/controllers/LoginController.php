<?php
/**
 * @CreateTime: 2016/4/12 17:51
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */
namespace Hemacms\Admin\Controllers;

use Phalcon\Mvc\Controller;
use Hemalib\Verify;
use Hemalib\IpLocation;
use enums\SystemEnums;
use Hemacms\Admin\Models\User;
use Hemacms\Admin\Models\LoginLog;
class LoginController extends Controller
{
    public function indexAction(){
        $this->assets->addCss('static/admin/css/login.css')
                ->collection('css')
                ->setTargetPath('static/admin/css/login.mini.css')
                ->setTargetUri('static/admin/css/login.mini.css')
                ->join(true)
                ->addFilter(new \Phalcon\Assets\Filters\Cssmin());
        $this->assets->addJs('static/common/js/jquery/jquery-1.12.3.min.js')
                ->addJs('static/common/js/layer/layer.js')
                ->addJs('static/admin/js/admin.common.js')
                ->addJs('static/admin/js/admin.login.js')
                ->collection('js')
                ->setTargetPath('static/admin/js/login.mini.js')
                ->setTargetUri('static/admin/js/login.mini.js')
                ->join(true)
                ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }
    public function doLoginAction(){
        $this->view->disable();
        if ($this->request->isPost()) {
            $key = $this->request->getPost( 'key', 'trim' );
            $token = $this->request->getPost( 'token', 'trim' );
            if ($this->security->checkToken($key,$token)) {
                $code = $this->request->getPost( 'verify', 'trim' );
                if($this->checkVerify($code))
                {
                    $username = $this->request->getPost( 'username', 'trim' );
                    $password = sha1(md5($this->request->getPost( 'password', 'trim' )));
                    $error = $this->safeCache->get('error_' . $username); //判断是否锁定
                    if( isset( $error[ 'status' ] ) && SystemEnums::USER_STATE_LOCK == $error[ 'status' ] )
                    {
                        $this->recordLogin(0,'帐号已锁定');
                        $msg[ 'status' ] = 4;
                        $msg[ 'info' ] = '密码错误6次帐号被锁定，请两个小时后再登录';
                        $msg[ 'key' ] = $this->security->getTokenKey();
                        $msg[ 'token' ] = $this->security->getToken();
                        echo json_encode($msg);
                        return false;
                    }
                    $sql = "SELECT id,username,nickname,status FROM Hemacms\Admin\Models\User WHERE username = :username: AND password = :password:";
                    $user = $this->modelsManager->executeQuery($sql,array(
                        'username' => $username,
                        'password' => $password
                    ))->getFirst();
                    $enableCnt = 6;
                    if($user){
                        $user = $user->toArray();
                        if($user['status']){
                            $this->recordLogin(1,'密码保密');
                            $this->logout();
                            $role = $this->db->fetchOne("SELECT u.id,ug.uid,g.role,g.title FROM hm_user u JOIN hm_acl_user_group ug JOIN hm_acl_group g WHERE ug.uid = u.id AND ug.group_id = g.id AND u.id = {$user['id']} LIMIT 1");
                            $strVerfiy = trim(trim(trim($_SERVER['HTTP_USER_AGENT'])) . trim(md5($_SERVER['SERVER_ADDR'])));
                            $userInfo['session_verfiy'] = $strVerfiy;
                            $userInfo['admin_login_time'] = $_SERVER['REQUEST_TIME'];
                            $userInfo['admin_uid'] = $user['id'];
                            $userInfo['admin_username'] = $user['username'];
                            $userInfo['admin_nickname'] = $user['nickname'];
                            $userInfo['admin_rolename'] = $role['title'];
                            $userInfo['admin_role'] = $role['role'];
                            $this->session->set('userInfo',$userInfo);
                            $msg['status'] = 1;
                            $msg['info'] = '登录成功，3秒后为你跳转';
                            exit(json_encode($msg));
                        }else{
                            $this->recordLogin(0,'帐号暂停使用');
                            $msg['status'] = 5;
                            $msg['info'] = '您的帐号已暂停使用！请联系管理员解禁。';
                            $msg[ 'key' ] = $this->security->getTokenKey();
                            $msg[ 'token' ] = $this->security->getToken();
                            exit(json_encode($msg));
                        }
                    }else{
                        if(!isset($error))
                        {
                            $error['cnt'] = 1;
                        }
                        else
                        {
                            if($error['cnt'] > $enableCnt) //大于设定次数
                            {
                                $error['status'] = SystemEnums::USER_STATE_LOCK;
                            }
                            $error['cnt']++;
                        }
                        $this->safeCache->save( 'error_' . $username, $error, 7200 );
                        $this->recordLogin(0,'帐号密码错误');
                        $msg['status'] = 7;
                        $msg['info'] = '帐号密码错误';
                        $msg[ 'key' ] = $this->security->getTokenKey();
                        $msg[ 'token' ] = $this->security->getToken();
                        exit(json_encode($msg));
                    }
                }
                else{
                    $this->recordLogin(0,'验证码错误');
                    $msg['status'] = 8;
                    $msg['info'] = '验证码错误';
                    $msg[ 'key' ] = $this->security->getTokenKey();
                    $msg[ 'token' ] = $this->security->getToken();
                    exit(json_encode($msg));
                }
            }else{
                $msg['status'] = 9;
                $msg['info'] = '表单令牌出错，请刷新页面！';
                $msg[ 'key' ] = $this->security->getTokenKey();
                $msg[ 'token' ] = $this->security->getToken();
                echo json_encode($msg);

            }
        }
    }
    //登录日志
     function recordLogin($status = '0',$message = '未知'){
         $Ip = new IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
         $area = $Ip->getlocation(); // 获取某个IP地址所在的位置
         $data = array(
            'username' => $this->request->getPost( 'username', 'trim' ),
            'status' => $status,
            'info' => $message,
            'logintime' => $_SERVER['REQUEST_TIME'],
            'loginip' => $area['ip'],
            'area' => $area['area'] == '' ? '对方在服务器本地登录' : $area['area'],
            'country' => $area['country'],
            'useragent' => $_SERVER['HTTP_USER_AGENT']
         );
         $sql = "INSERT INTO Hemacms\Admin\Models\LoginLog (username,status,info,logintime,loginip,area,country,useragent) VALUES (:username:,:status:,:info:,:logintime:,:loginip:,:area:,:country:,:useragent:)";
         $this->modelsManager->executeQuery($sql,$data);
    }
    //输出验证码
    public function verifyAction()
    {
        $Verify = new Verify();
        $Verify->fontttf = '5.ttf'; //字体
        $Verify->fontSize = 30; //验证码字体大小
        $Verify->length   = 4; //验证码位数
        $Verify->useNoise = true; //关闭验证码杂点
        $Verify->entry();
        $this->view->disable();
    }
    //验证验证码
    function checkVerify($code, $id = '')
    {  	$verify = new Verify();
        return $verify->check($code, $id);
    }
    function logout()
    {
        $this->session->remove('userInfo');
    }
}