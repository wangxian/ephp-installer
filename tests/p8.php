<?php
$serv = new swoole_http_server("0.0.0.0", 9502);

$chan = new chan(2);

go(function() use ($chan) {
    while(true) {
        var_dump($chan->pop());
    }
});

$serv->on('request', function ($request, $response) use ($chan)
{
    $chan->push("abc");
    if (PHP_OS === 'Darwin')
    {
        $response->end(file_get_contents(__FILE__));
    }
    else
    {
        $response->sendfile(__FILE__);
    }
});

$serv->start();
