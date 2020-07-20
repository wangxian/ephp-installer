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
     * @param \Swoole\Server\Task $task
     * @return void
     */
    public function onTask(\Swoole\Server $server, \Swoole\Server\Task $task)
    {
        // Register a task Listener for handle Async Task
        // Backend Task
        // $task->worker_id;              // 来自哪个`Worker`进程
        // $task->id;                     // 任务的编号
        // $task->flags;                  // 任务的类型，taskwait, task, taskCo, taskWaitMulti 可能使用不同的 flags
        // $task->data;                   // 任务的数据
        // co::sleep(0.2);                // 协程 API
        // $task->finish([123, 'hello']); // 完成任务，结束并返回数据

        var_dump("接收到的信息=", $task);
        go(function () use ($task) {
            \co::sleep(5);
            $task->finish('延迟任务执行完毕');
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
        echo "[onFinish]\n";
        var_dump('task_id', $task_id);
        var_dump('data', $data);
    }
}
