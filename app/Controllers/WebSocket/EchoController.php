<?php
namespace App\Controllers\WebSocket;

use ePHP\View\BaseView;
use \Swoole\Http\Request;
use \Swoole\WebSocket\Frame;

use \App\Controllers\RootController;

/**
 * @property BaseView view
 */
class EchoController extends RootController implements \ePHP\Core\WebSocketInterface
{
    /**
     * 入口
     * http://127.0.0.1:8000/websocket
     */
    public function index()
    {
        $this->view->render('websocket/index.php');
    }

    /**
     * @param \Swoole\WebSocket\Server $server
     * @param Request $request
     * @return void
     */
    public function onOpen(\Swoole\WebSocket\Server $server, Request $request)
    {
        echo "[websocket][onopen]server: handshake success with fd{$request->fd} url={$request->server['request_uri']}?{$request->server['query_string']}\n";
    }

    /**
     * @param \Swoole\WebSocket\Server $server
     * @param Frame $frame
     * @return void
     */
    public function onMessage(\Swoole\WebSocket\Server $server, Frame $frame)
    {
        echo "[websocket][onmessage]receive from fd{$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
        // $server->push($frame->fd, "this is server");
    }

    /**
     * On connection closed
     *
     * @param \Swoole\WebSocket\Server $server
     * @param int $fd
     * @return void
     */
    public function onClose(\Swoole\WebSocket\Server $server, int $fd)
    {
        echo "[websocket][onclose]client fd{$fd} closed\n";
    }

}
