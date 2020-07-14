<?php
namespace App\Services;

class DemoService
{
    public $pool;
    public $num = 0;

    /**
     * @var string 测试全局变量
     */
    static $string = '';

    public function hello()
    {
        return date('Y-m-d H:i:s');
    }
}
