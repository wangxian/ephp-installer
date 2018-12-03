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
    public function onBoot($server)
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
    public function onStart($server) { }

    public function onWorkerStart($server) { }

    public function onWorkerStop($server) { }

    public function onWorkerError($server) { }

    public function onShutdown($server) { }

    /**
     * Listen server async task - onTask
     * Usage: Task::push("some data")
     *
     * @param \Swoole\Server $server
     * @param integer $task_id
     * @param string $data
     * @return void
     */
    public function onTask(\Swoole\Server $server, int $task_id, string $data)
    {
        // Register a task Listener for handle Async Task
        // Backend Task
        print_r("[onTask]receive data=". $data);
        go(function() {
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
