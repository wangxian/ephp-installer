<?php

namespace App;

/**
 * Swoole mode, Automatically instantiate this class
 */
class Boot
{
    /**
     * Before swoole server started
     *
     * @param \Swoole\Server $server
     * @return void
     */
    public function onBoot(\Swoole\Server $server)
    {
        // 初始化Swoole Table on server boot
        // 全局共享内存，需要在Swoole server启动器初始化
    }

    /**
     * After swoole server started
     *
     * @param \Swoole\Server $server
     * @return void
     */
    public function onStart(\Swoole\Server $server)
    {
    }

    public function onWorkerStart(\Swoole\Server $server, int $workerId)
    {
    }

    public function onWorkerStop(\Swoole\Server $server, int $workerId)
    {
    }

    /**
     * 有新的连接进入时，在 worker 进程中回调。
     *
     * @param \Swoole\Server $server
     * @param int $fd
     * @param int $reactorId
     */
    public function onConnect(\Swoole\Server $server, int $fd, int $reactorId)
    {
    }

    /**
     * TCP 客户端连接关闭后，在 worker 进程中回调此函数。
     *
     * @param \Swoole\Server $server
     * @param int $fd
     * @param int $reactorId
     */
    public function onClose(\Swoole\Server $server, int $fd, int $reactorId)
    {
    }

    public function onWorkerError(\Swoole\Server $server, int $workerId, int $worker_pid, int $exit_code, int $signal)
    {
    }

    public function onShutdown(\Swoole\Server $server)
    {
    }

    /**
     * Listen server async task - onTask
     * Usage: Task::push("some data")
     *
     * @param \Swoole\Server $server
     * @param integer $task_id
     * @param int $src_worker_id
     * @param string $data
     * @return void
     */
    public function onTask(\Swoole\Server $server, int $task_id, int $src_worker_id, $data)
    {
        // Register a task Listener for handle Async Task
        // Backend Task
        print_r("[onTask]receive data=" . $data);
        go(function () {
            \co::sleep(5);
            echo 'finish Coroutine task......';
        });
    }

    /**
     * Listen server async task - onFinish
     *
     * @param \Swoole\Server $server
     * @param integer $task_id
     * @param string $data
     * @return void
     */
    public function onFinish(\Swoole\Server $server, int $task_id, string $data)
    {

    }
}
