<?php
namespace App\Services;

class DemoService
{
    public $pool;
    public $num = 0;

    public function hello()
    {
        return date('Y-m-d H:i:s');
    }
}
