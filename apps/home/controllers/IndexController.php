<?php

namespace Hemacms\Home\Controllers;
use Phalcon\Mvc\Controller;

class IndexController extends Controller
{

    public function indexAction()
    {
        echo '111';


    }
    public function show(){
        echo '404';
        $this->view->disable();
    }

}