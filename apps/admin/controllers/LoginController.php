<?php
/**
 * @CreateTime: 2016/4/12 17:51
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */
namespace Hemacms\Admin\Controllers;
use Phalcon\Mvc\Controller;
use Hemalib\Verify;
//use Hemacms\Admin\Models;
class LoginController extends Controller
{
    public function indexAction(){
        $this->p('asdfasd');
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
        $this->view->disable();

    }
    public function doLoginAction(){
        $this->view->disable();
//        $this->checkVerify();
        if ($this->request->isPost()) {
            $key = $this->request->getPost( 'key', 'trim' );
            $token = $this->request->getPost( 'token', 'trim' );
            if ($this->security->checkToken($key,$token)) {
                // The token is OK
                $code = $this->request->getPost( 'verify', 'trim' );
                if($this->checkVerify($code))
                {
                    echo '111';
                }
                else{
                    echo '222';
                }
            }else{
                echo '333';
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