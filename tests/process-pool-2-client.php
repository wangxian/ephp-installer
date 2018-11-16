<?php
// 进程池，SWOOLE_IPC_SOCKET， process-pool-2 客户端

$fp = stream_socket_client("tcp://127.0.0.1:8089", $errno, $errstr) or die("error: $errstr\n");
$msg = json_encode(['data' => 'hello', 'uid' => 1991]);
fwrite($fp, pack('N', strlen($msg)) . $msg);
sleep(1);

// 将显示 hello world\n
var_dump(fread($fp, 8192));
fclose($fp);
