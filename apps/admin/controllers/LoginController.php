<?php
/**
 * @CreateTime: 2016/4/12 17:51
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */
namespace Hemacms\Admin\Controllers;
use Phalcon\Mvc\Controller;
use Hemalib\Verify;
use enums\SystemEnums;
use Hemacms\Admin\Models\User;
class LoginController extends Controller
{
    public function indexAction(){
//        $this->function->p(array('sdf'=>123,'asdfasd'=>12312));

        $this->assets->addCss('static/admin/css/login.css')
//            ->addCss('css/bootstrap/dashboard.css')
//            ->addCss('css/codemirror/codemirror.css')
            ->collection('css');
//            ->setTargetPath('static/admin/css/login.mini.css')
//            ->setTargetUri('static/admin/css/login.mini.css')
//            ->join(true)
//            ->addFilter(new \Phalcon\Assets\Filters\Cssmin());
        $this->assets->addJs('static/common/js/jquery/jquery-1.12.3.min.js')
                     ->addJs('static/common/js/layer/layer.js')
                     ->addJs('static/admin/js/admin.common.js')
            ->collection('js');

//            ->setTargetPath('static/admin/css/login.mini.css')
//            ->setTargetUri('static/admin/css/login.mini.css')
//            ->join(true)
//            ->addFilter(new \Phalcon\Assets\Filters\Cssmin());
//        $this->view->disable();

    }
    public function doLoginAction(){
        $this->view->disable();
//        $this->checkVerify();
        if ($this->request->isPost()) {
            $key = $this->request->getPost( 'key', 'trim' );
            $token = $this->request->getPost( 'token', 'trim' );
            if ($this->security->checkToken($key,$token)) {
                $code = $this->request->getPost( 'verify', 'trim' );
                if($this->checkVerify($code))
                {
                    $username = $this->request->getPost( 'username', 'trim' );
                    $password = sha1(md5($this->request->getPost( 'password', 'trim' )));
//                    echo '111';
//                    $error = $this->safeCache->get('error_' . $username); //判断是否锁定
//                    if( isset( $error[ 'status' ] ) && SystemEnums::USER_STATE_LOCK == $error[ 'status' ] )
//                    {
//                        $ret[ 'status' ] = 1;
//                        $ret[ 'msg' ] = '密码已经锁定，请两个小时后再登录';
//                        $ret[ 'key' ] = $this->security->getTokenKey();
//                        $ret[ 'token' ] = $this->security->getToken();
//                        echo json_encode( $ret );
//                        return false;
//                    }
//                    echo $password;die;

                    $conditions = "username = :username: AND password = :password:";
                    $parameters = array(
                        'username' => $username,
                        'password' => $password
                    );
                    $where = array(
                        $conditions,
                        'bind' => $parameters,
                        'columns' => 'id,username,nickname'
                    );
                    $user = User::findFirst( $where );

                    var_dump($user);
                    if($user){
                        echo '111';
                    }else{
                        $msg['status'] = 7;
                        $msg['info'] = '帐号密码错误';
                        $msg[ 'key' ] = $this->security->getTokenKey();
                        $msg[ 'token' ] = $this->security->getToken();
                        exit(json_encode($msg));
                    }
                }
                else{
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
}