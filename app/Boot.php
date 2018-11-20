<?php
namespace App;

/**
 * Swoole mode, Automatically instantiate this class
 */
class Boot
{
    public function __construct()
    {
        // Do Something before app start
        // As crontab do some task
        // echo "App Boot started... \n";
    }

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
