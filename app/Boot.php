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
    public function onStart()
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
