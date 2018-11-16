<?php
// 进程池，SWOOLE_IPC_MSGQUEUE

$pool = new Swoole\Process\Pool(2, SWOOLE_IPC_MSGQUEUE, 0x7000001);

$pool->on("WorkerStart", function ($pool, $workerId) {
    echo "Worker#{$workerId} is started\n";
});

$pool->on("Message", function ($pool, $message) {
    echo "Message: {$message}\n";
});

$pool->start();
