<?php
// 进程池，SWOOLE_IPC_SOCKET

$pool = new Swoole\Process\Pool(10, SWOOLE_IPC_SOCKET);

$pool->on("Message", function ($pool, $message) {
    echo "server pid=" . posix_getpid() . " Message: {$message}\n";
    $pool->write(json_encode(["Z", "LU", "中国人"]));
    // $pool->write("hello ");
    // $pool->write("world ");
    // $pool->write("\n");
});

echo ">>> ipc socket listen 127.0.0.1:8089\n";
$pool->listen('127.0.0.1', 8089);
$pool->start();
