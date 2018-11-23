<?php
namespace App\Controllers;

class IndexController extends RootController
{
    function index()
    {
        // 高亮打印
        dd($_REQUEST, 1, 2, 3, 4);
        // 浏览器console打印
        ee($_REQUEST, 1, 2, 3, 4);

        // // 高亮打印，并停止
        // ddd($_REQUEST, 1, 2, 3, 4);
        // // 浏览器console打印，并停止
        // eee($_REQUEST, 1, 2, 3, 4);

        // var_dump($client->lrange('apib8-publish-2003', 0, 50));
        // \run_info();

        // \throw_error("throw new exception");

        // show_404();
        // throw new \ePHP\Exception\ExitException('11');
        // dd($this->model->table('mytest')->data(['name'=>time()])->insert());
        // dd($this->model->table('mytest')->where(['id'=>22])->findAll());
        // dd($this->model->query('show tables')->find());
        // echo '123';
        // run_info();

        // return ;
        // 加密cookie
        // (new \ePHP\Http\Cookie())->setSecret('name', 'test');
        // dd($_COOKIE, (new \ePHP\Http\Cookie())->getSecret('name'));

        // 测试 encryptG、decryptG
        // echo $ciphertext = \ePHP\Hash\Encrypt::encryptG('1234567890');
        // echo '<br />';
        // echo \ePHP\Hash\Encrypt::decryptG($ciphertext);
        // $this->stopRun();

        // print_r($this->model->table("t_test")->cache(120)->findObj());
        // return run_info();
        // var_dump($this->model->dbconfig("master")->table("t_test")->findAll());
        // var_dump($this->model_test->dbconfig("master")->findAll());
        // var_dump($this->model_test->dbconfig("master")->getBy(['id >'=>2]));
        // var_dump($this->model_test->sql);

        // $this->cache->set('datetime', date('Y-m-d H:i:s'), 20);
        // dd('Value from redis', $this->cache->get('datetime'));

        // echo \ePHP\Hash\Encrypt::edcode('1', 'encode', 'ephp');
        // echo $h = \ePHP\Hash\Encrypt::edcode('12345678901234567890', 'ENCODE', 'ephp');
        // echo '<br />';
        // echo \ePHP\Hash\Encrypt::edcode($h, 'DECODE', 'ephp');
        // $this->stopRun();

        $this->console->debug("t1");
        $this->console->info("t2");
        $this->console->notice("t3");
        $this->console->warning("t4");
        $this->console->error("t5");
        $this->console->fatal("t6");

        dd("SERVER内容", $_SERVER);
        dd("系统信息", $_GET, $_POST);

        // echo time();
        run_info();

        // (new DemoService())->hello();
        // 1 / 0;
        // echo $name;
        // echo 120;

        $this->view->name  = 'ephp7';
        $this->view->render();
    }

    /**
     * 测试swoole
     */
    function test_swoole()
    {
        // 另一种方式，推荐，该方式兼容swoole
        // $this->cookie->setSecret('name', 'test');
        // dd($_COOKIE, $this->cookie->getSecret('name'));

        // 测试swoole协程
        // go(function () {
        //     $http = new \Co\Http\Client("wangxian.me", 443, true);
        //     $http->set([ 'timeout' => 10]);
        //     $ret = $http->get('/');
        //     echo $http->body;
        // });

        // 获取raw content
        // echo $this->rawContent();
        // $this->stopRun();

        // \throw_error('test');
        // $this->stopRun();

        // 测试 worker stop 继续运行异步任务
        go(function() {
            $host = 'www.kfc.com.cn';
            $host = 'www.bbc.com';
            echo ",,,,,,,,,, Co\Http\client('{$host}') 发起请求中...\n";
            // \co::sleep(5);
            // $http = new \Co\Http\client("a.wboll.com");
            $http = new \Co\Http\client($host);
            $http->set(['timeout'=>15]);
            $http->get('/');
            echo ",,,,,,,,,, Co\Http\client('{$host}') 输出=" . ($http->statusCode < 0 ? '错误了，statusCode='.$http->statusCode : $http->body) . "\n";
        });

        go(function() {
            echo "==== co::gethostbyname('a.wboll.com') 输出=" . \co::gethostbyname('a.wboll.com'). "\n";
            echo date('Y-m-d H:i:s') . ", hello world!\n";
        });

        // 测试swoole exit
        echo 'echo hello before exit.';
        exit;

        // \run_info();

    }

    /**
     * 测试 mysqli pool, 只支持swoole环境
     * http://127.0.0.1:8000/index/test_mysqli_pool
     *
     * @return void
     */
    function test_mysqli_pool()
    {
        var_dump($this->model->dbconfig("default")->table("simple")->findAll());
    }

    /**
     * 测试 mysqli pool
     * http://127.0.0.1:8000/index/mysqli_pool_info
     *
     * @return void
     */
    function mysqli_pool_info()
    {
        echo '<pre>';
        var_dump(\ePHP\Model\DBPool::init('default'));
        echo '</pre>';
    }

    /**
     * 测试 server task
     * https://wiki.swoole.com/wiki/page/134.html
     *
     * http://127.0.0.1:8000/index/test_server_task
     *
     * @return void
     */
    function test_server_task()
    {
        echo 'test async server test...';
        echo '请查看控制台终端输出！';

        $this->server->task('test_server_task');
    }

    /**
     * 测试requestv等
     *
     * @return void
     */
    public function test_requestv()
    {
        dd("requestv('abc', 1, 'intval')", \requestv('abc', 1, 'intval'));
        dd("getv('abc', 1, 'intval')", \getv('abc', 1, 'intval'));
        dd("postv('abc', 1, 'intval')", \postv('abc', 1, 'intval'));
        dd("getp(3, 1, 'intval')", \getp(3, 1, 'intval'));
    }

    /**
     * 测试env
     *
     * @return void
     */
    public function test_env()
    {
        dd( env('APP_PATH') );
    }
}
