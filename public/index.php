<?php

/**
 * ePHP - A PHP Framework For Web Developer
 *
 * @package  ePHP
 * @author   WangXian <wo#wangxian.me>
 */

/*
|--------------------------------------------------------------------------
| Register The Composer Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so that we do not have to worry about the
| loading of any our classes "manually". Feels great to relax.
|
 */

require __DIR__ . '/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
 */

$app = require_once __DIR__ . '/../app/bootstrap.php';

// Run application
$app = new \ePHP\Core\Application();
$app->run();
