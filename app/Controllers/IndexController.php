<?php
namespace App\Controllers;

class IndexController extends RootController
{
    function index()
    {
        // show_404();
        // throw new \ePHP\Exception\ExitException('11');
        // dump($this->model->table('mytest')->data(['name'=>time()])->insert());
        // dump($this->model->table('mytest')->where(['id'=>22])->findAll());
        // dump($this->model->query('show tables')->find());
        // echo '123';
        // run_info();


        // return ;
        // 加密cookie
        // (new \ePHP\Http\Cookie())->setSecret('name', 'test');
        // dump($_COOKIE, (new \ePHP\Http\Cookie())->getSecret('name'));

        // 另一种方式，推荐，该方式兼容swoole
        // $this->cookie->setSecret('name', 'test');
        // dump($_COOKIE, $this->cookie->getSecret('name'));

        // print_r($this->model->table("t_test")->cache(120)->findObj());
        // return run_info();
        // var_dump($this->model->dbconfig("master")->table("t_test")->findAll());
        // var_dump($this->model_test->dbconfig("master")->findAll());
        // var_dump($this->model_test->dbconfig("master")->getBy(['id >'=>2]));
        // var_dump($this->model_test->sql);

        dump("SERVER内容", $_SERVER);
        dump("系统信息", $_GET, $_POST);

        // echo time();
        run_info();

        // (new DemoService())->hello();
        // 1 / 0;
        // echo $name;
        // echo 120;

        $this->view->name  = 'ePHP';
        $this->view->render();
    }
}
