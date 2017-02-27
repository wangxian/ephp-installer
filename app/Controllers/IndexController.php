<?php
namespace App\Controllers;

class IndexController extends RootController
{
    function test()
    {
        if (defined('RUN_ENV') && RUN_ENV == 'local')
        {
            // echo time();
            echo '----';
        }
    }

    function index()
    {
        show_404();
        // echo 123;
        // throw new \ePHP\Exception\ExitException('11');
        // dump($this->model->table('mytest')->data(['name'=>time()])->insert());
        // dump($this->model->table('mytest')->where(['id'=>22])->findAll());
        // dump($this->model->query('show tables')->find());
        // echo '123';
        // run_info();
        return false;
        // $q = new \SplQueue();
        // $q->setIteratorMode(\SplQueue::IT_MODE_DELETE);
        // $q[] = time();
        // $q[] = time();
        // $q[] = time();
        // var_dump($q);

        // return false;
        $x = \App\Services\DemoService::init();
        $x->pool->enqueue((object)[$x->num++]);
        var_dump($x->pool);
        // array_push($x->pool, new \mysqli('127.0.0.1', 'root', '111111', 'test'));
        // foreach ($x->pool as $v)
        // {
        //     dump($v->thread_id);
        // }
        // ob_start();
        // $res = (new \ePHP\Model\BaseModel())->table('test')->where(["amount"=>22])->findAll();
        // dump($res);
        // $db = new \mysqli('127.0.0.1', 'root', '111111', 'test');
        // var_dump($db->query('select * from test'));
        // echo '123';
        // $this->response->end(ob_get_clean());
        // echo 'hello';


        // return ;
        // 加密cookie
        // (new \ePHP\Http\Cookie())->setSecret('name', 'test');
        // dump($_COOKIE, (new \ePHP\Http\Cookie())->getSecret('name'));

        // 另一种方式，推荐，该方式兼容swoole
        $this->cookie->setSecret('name', 'test');
        dump($_COOKIE, $this->cookie->getSecret('name'));

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

        // var_dump($this->view);
        // dump($this->infos);

        $this->view->infos = $this->infos;
        $this->view->name  = 'ePHP';
        $this->view->render();
    }
}
