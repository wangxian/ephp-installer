<?php
// 测试 swoole table
use Swoole\Table;
$table = new \Swoole\Table(112048);

$table->column('id',Table::TYPE_INT, 1);
$table->column('data',Table::TYPE_STRING, 50);
$table->create();

for($i=0; $i<1300; $i++) {
    $table->set("c". $i, ["id"=> $i, "data"=> "ok-". $i]);
}

var_dump($table->get("c5"));
echo 'pid='. getmypid();
sleep(20);
