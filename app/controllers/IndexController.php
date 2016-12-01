<?php
namespace App\Controllers;

use App\Services\DemoService;

class IndexController
{

    function test()
    {
        dump("SERVER内容", $_SERVER);
        dump("系统信息", $_GET, $_POST);

        // echo time();
        run_info();

        (new DemoService())->hello();
        // 1 / 0;
        // echo $name;
        // echo 120;
    }
}
