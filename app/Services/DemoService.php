<?php
namespace App\Services;

class DemoService
{
    public $pool;

    public $num = 0;

    /**
     * @var \ePHP\Core\Server
     */
    private static $instance;

    /**
     * Dynamically handle calls to the class.
     *
     * @return \ePHP\Core\Server
     */
    public static function init()
    {
        if (!self::$instance instanceof self)
        {
            self::$instance = new self();
            self::$instance->pool = new \SplQueue();
            return self::$instance;
        }
        return self::$instance;
    }

    public function test()
    {
        $q->setIteratorMode(\SplQueue::IT_MODE_DELETE);
    }

    public function hello()
    {
        return date('Y-m-d H:i:s');
    }
}
