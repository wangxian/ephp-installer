<?php
// 测试 websocket和http复用端口
$server = new \Swoole\WebSocket\Server('0.0.0.0', 9501);
$server->set([
    'open_websocket_protocol' => true,
    'open_http_protocol' => true
]);

$server->on('request', function(\Swoole\Http\Request $request, \Swoole\Http\Response $response) {
    echo "[httpserver][onrequest]uri={$request->server['request_uri']}\n";
    var_dump($request->get);
    var_dump($request->post);

    $response->sendfile('client.html');
});

$server->on('open', function (Swoole\WebSocket\Server $server, \Swoole\Http\Request $request) {
    // var_dump($request);
    echo "[websocket][onopen]server: handshake success with fd{$request->fd} url={$request->server['request_uri']}?{$request->server['query_string']}\n";
});

$server->on('message', function (Swoole\WebSocket\Server $server, $frame) {
    echo "[websocket][onmessage]receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
    $server->push($frame->fd, "this is server");
});

$server->on('close', function ($ser, $fd) {
    echo "[websocket][onclose]client {$fd} closed\n";
});


echo "Listening on http://0.0.0.0:9501/\n";
$server->start();
