<?php

namespace Hemacms\Admin\Controllers;
use Phalcon\Mvc\Controller;
use Hemacms\Admin\Models\User;
use Phalcon\Logger;
use Phalcon\Logger\Adapter\File as FileAdapter;

class UserController extends Controller
{

    public function indexAction()
    {
//        $logger = new FileAdapter(APP_PATH ."/runtime/dblogs/db.log");

// These are the different log levels available:

//        $logger->alert("This is an alert message");

        $conditions = "username = :username: AND password = :password:";

        $parameters = array(
            "username" => "iteny",
            "password" => "asdfas"
        );
        $roles = User::find([
            $conditions,
            "bind" => $parameters,
            "cache" => ["lifetime" => 10, "key" => "my-find-key"],
        ]);
//        foreach($roles->toArray() as $key => $val){
//
//            $name[$key] = $val;
//        }

        $this->view->name = $roles;
//        echo $roles->id . '</br>';
//        echo $roles->username . '</br>';
//        echo $roles->password;
//        echo '111';

//        $this->url->setBaseUri('//my.admin.com');

//        var_dump($this->dispatcher->getParams());
//        $this->response->setContent('sadfa');
//        $this->response->send();

        $this->assets->addCss('css/bootstrap/bootstrap.min.css')
                ->addCss('css/bootstrap/dashboard.css')
                ->addCss('css/codemirror/codemirror.css')
                ->collection('css')->setTargetPath('css/cache/my.min.css')
                ->setTargetUri('css/cache/my.min.css')
                ->join(true)
                ->addFilter(new \Phalcon\Assets\Filters\Cssmin());
//        $this->view->cache(true);
//        $roles->delete();
//          $role = User::find('sdfsa');
//        $user = new User();
//        $user->username = 'iteny';
//        $user->password = 'asdfas';
//        $user->save();
//        echo $user->id;
//        $this->view->disable();
//
//        $this->view->pick();

    }

}