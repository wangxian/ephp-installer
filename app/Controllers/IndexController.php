<?php
namespace App\Controllers;

class IndexController extends RootController
{

    function index()
    {
        // var_dump($this->model->dbconfig("master")->table("t_test")->findAll());
        // var_dump($this->model_test->dbconfig("master")->findAll());
        // var_dump($this->model_test->dbconfig("master")->getBy(['id >'=>2]));
        // var_dump($this->model_test->sql);

        dump("SERVER内容", $_SERVER);
        dump("系统信息", $_GET, $_POST);

        // 加密cookie
        \ePHP\Http\Cookie::setSecret('name', 'test');
        dump($_COOKIE, \ePHP\Http\Cookie::getSecret('name'));

        // echo time();
        run_info();

        // (new DemoService())->hello();
        // 1 / 0;
        // echo $name;
        // echo 120;

        // var_dump($this->view);
        // dump($this->infos);

        $this->view->infos = $this->infos;
        $this->view->name  = 'ePHP';
        $this->view->render();
    }
}
