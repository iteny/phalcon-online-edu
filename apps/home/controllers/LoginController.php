<?php

namespace Hemacms\Home\Controllers;
use Phalcon\Mvc\Controller;

class LoginController extends Controller
{

    public function indexAction()
    {

        echo '111';
        echo $this->dispatcher->getParam('username');
    }

}