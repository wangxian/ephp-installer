<?php
echo ">>>>>>>> 脚本执行开始...\n";

// Channel 使用
$ch = new chan(5);

// 读取chan
go(function() use ($ch) {
    while ($data = $ch->pop()) {
        echo ">>> 接收到数据=". print_r($data, true) ."\n";
    }
});

// 模拟定时产生chamnel
go(function() use ($ch) {
    while (true) {
        co::sleep(rand(1, 8));
        $ch->push('产生数据:'. date('Y-m-d H:i:s'));
        // $ch->push((object)['产生数据:'. date('Y-m-d H:i:s')]);
    }
});

echo ">>>>>>>> 脚本执行结束...\n";

