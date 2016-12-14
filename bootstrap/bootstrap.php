<?php

use ePHP\Core\Config;

// Runtime constants
//--------------------------------------------------------------------------
// 可选：local, dev, pre, prod, 默认local
$env = getenv('RUN_ENV');
define('RUN_ENV', $env ? $env : 'local');

// app directory
define('APP_PATH', realpath('../'));
//--------------------------------------------------------------------------

// 时区设置
date_default_timezone_set('PRC');

// load main config file
Config::set('main', include_once APP_PATH . '/conf/main.' . RUN_ENV . '.php');
