<?php
namespace App\Controllers;

class IndexController extends RootController
{
    function index()
    {
        // var_dump($client->lrange('apib8-publish-2003', 0, 50));
        // \run_info();

        // \throw_error("throw new exception");

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

        // 测试 encryptG、decryptG
        // echo $ciphertext = \ePHP\Hash\Encrypt::encryptG('1234567890');
        // echo '<br />';
        // echo \ePHP\Hash\Encrypt::decryptG($ciphertext);
        // $this->stopRun();

        // 另一种方式，推荐，该方式兼容swoole
        // $this->cookie->setSecret('name', 'test');
        // dump($_COOKIE, $this->cookie->getSecret('name'));

        // print_r($this->model->table("t_test")->cache(120)->findObj());
        // return run_info();
        // var_dump($this->model->dbconfig("master")->table("t_test")->findAll());
        // var_dump($this->model_test->dbconfig("master")->findAll());
        // var_dump($this->model_test->dbconfig("master")->getBy(['id >'=>2]));
        // var_dump($this->model_test->sql);

        // $this->cache->set('datetime', date('Y-m-d H:i:s'), 20);
        // dump('Value from redis', $this->cache->get('datetime'));

        // echo \ePHP\Hash\Encrypt::edcode('1', 'encode', 'ephp');
        // echo $h = \ePHP\Hash\Encrypt::edcode('12345678901234567890', 'ENCODE', 'ephp');
        // echo '<br />';
        // echo \ePHP\Hash\Encrypt::edcode($h, 'DECODE', 'ephp');
        // $this->stopRun();

        // 测试swoole协程
        // go(function () {
        //     $http = new \Co\Http\Client("wangxian.me");
        //     $http->set([ 'timeout' => 10]);
        //     $ret = $http->get('/');
        //     echo $http->body;
        // });

        // 获取raw content
        // echo $this->rawContent();
        // $this->stopRun();

        $this->console->debug("t1");
        $this->console->info("t2");
        $this->console->notice("t3");
        $this->console->warning("t4");
        $this->console->error("t5");
        $this->console->fatal("t6");

        dump("SERVER内容", $_SERVER);
        dump("系统信息", $_GET, $_POST);

        // echo time();
        run_info();

        // (new DemoService())->hello();
        // 1 / 0;
        // echo $name;
        // echo 120;

        $this->view->name  = 'ephp7';
        $this->view->render();
    }
}
