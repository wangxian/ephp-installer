<?php
$serv = new swoole_http_server("0.0.0.0", 9502);

$serv->on('request', function ($request, $response)
{
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

?>
