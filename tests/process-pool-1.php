<?php
// 进程池管理, 多任务队列
// var_dump(SWOOLE_IPC_MSGQUEUE, SWOOLE_IPC_SOCKET);

$workerNum = 5;
$pool = new Swoole\Process\Pool($workerNum);

$pool->on("WorkerStart", function ($pool, $workerId) {
    $times = mt_rand(1, 8);
    echo "Worker#{$workerId} is started then sleep {$times} seconds\n";
    sleep($times);
});

$pool->on("WorkerStop", function ($pool, $workerId) {
    echo "Worker#{$workerId} is stopped\n";
});

$pool->start();
