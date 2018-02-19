<?php
// 使用协程
// for ($i = 0; $i < 100; $i++) {
//     \Swoole\Coroutine::create(function() use ($i) {
//         $sleep = ceil(14/rand(2, 15)*100)/100;
//         \Swoole\Coroutine::sleep($sleep);
//         // sleep($sleep);
//         echo "\$i: {$i} - sleep={$sleep}\n";
//     });
// }

// 使用short api
// for ($i = 0; $i < 100; $i++) {
//     go(function () use ($i) {
//         $sleep = ceil(14/rand(2, 15)*100)/100;
//         co::sleep($sleep);
//         echo "\$i: {$i} - sleep={$sleep}\n";
//     });
// }

// 设置协程参数
Swoole\Coroutine::set(array(
    'max_coroutine' => 14096,
));

// Http Client
// for ($i = 0; $i < 4000; $i++) {
//     go(function () use ($i) {
//         echo "\$i: {$i} - start......................\n";
//         $http = new Co\Http\Client("wangxian.me");
//         $http->set([ 'timeout' => 10]);
//         $ret = $http->get('/');

//         // echo $http->body;
//         echo $http->statusCode;
//         // co::sleep(0.5);
//         echo "\$i: {$i} - finish\n";
//     });
// }

// 使用协程队列
use Swoole\Coroutine as co;
$chan = new co\Channel(1);
co::create(function () use ($chan) {
    for($i = 0; $i < 100000; $i++) {
        co::sleep(1.0);
        $chan->push(['rand' => rand(1000, 9999), 'index' => $i]);
        echo "$i --------------- \n";
    }
});

co::create(function () use ($chan) {
    while(1) {
        $data = $chan->pop();
        var_dump($data);
    }
});
swoole_event::wait();

// // Channel 使用
// $ch = new chan(5);
// go(function () use ($ch) {
//     while(true) {
//         echo "start select.......................\n";
//         $read_list = [$ch];
//         $write_list = null;
//         $result = chan::select($read_list, $write_list, 5);
//         // var_dump($result, $read_list, $write_list);
//         echo "recived:". $ch->pop() ."\n";
//         echo "chan exit.......................\n\n";
//     }
// });

// go(function () use ($ch) {
//     $ch->push(1234);
//     $ch->push(1234.56);
//     $ch->push("hello world");
//     // $ch->push(["hello world"]);

//     $i = 0;
//     while (true) {
//         co::sleep(2);
//         $i++;
//         $ch->push("\$i={$i}");
//     }
// });

echo "完成.....\n";
