<?php

echo ">>>>>>>> 脚本执行开始...\n";

ini_set("memory_limit", "512M");
co::set(['worker_num' => 10, 'max_coroutine' => 40000]);

// 手工开启协程
Swoole\Runtime::enableCoroutine();

// // 测试是否能用sleep, 是否有hook
// go(function () {
//     sleep(2.5);
//     echo "==== go sleep(2.5) 后输出：hello\n";
// });

// 使用co::sleep()
go(function () {
    co::sleep(5);
    echo "==== go co::sleep(5) 后输出：over\n";
});

// 测试协程httpclient
go(function () {
    // // http\client 完整用法
    // $http = new Co\Http\Client("b.wboll.com", 80);
    // $http->setHeaders(['Host' => "localhost"]);
    // // $ret 返回的是true, false, 标识请求成功或失败
    // $ret = $http->get('/');
    // echo "==== http\client 输出={$http->body}\n";
    // $http->close();

    // 批量协程
    for ($i=0; $i<1000; $i++) {
        go(function() use ($i) {
            // 批量网络请求
            (new Co\Http\client("www.baidu.com"))->get('/');
            echo "==== Http\client $i: 执行完毕\n";

            // 写入文件
            // co::writeFile(__DIR__ . "/coroutine.log", ""); // 清空文件
            // co::writeFile(__DIR__ . "/coroutine.log", "$i: 执行完毕\n", FILE_APPEND);
        });
    }
});

// 测试 co::gethostbyname('a.wboll.com')
// go(function() {
//     echo "==== co::gethostbyname('a.wboll.com') 输出=" . co::gethostbyname('a.wboll.com'). "\n";
//     echo "==== co::gethostbyname('b.wboll.com') 输出=" . co::gethostbyname('b.wboll.com'). "\n";
//     echo "==== co::gethostbyname('c.wboll.com') 输出=" . co::gethostbyname('c.wboll.com'). "\n";
// });

echo ">>>>>>>> 脚本执行结束...\n";
