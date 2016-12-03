<?php
namespace App\Controllers;

class IndexController extends RootController
{

    function index()
    {
        dump("SERVER内容", $_SERVER);
        dump("系统信息", $_GET, $_POST);

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
