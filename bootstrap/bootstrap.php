<?php

use ePHP\Core\Config;

// Runtime constants
//--------------------------------------------------------------------------
// Optional：local, dev, pre, prod, 默认local
$env = getenv('RUN_ENV');
define('RUN_ENV', $env ? $env : 'local');

// define app directory
define('APP_PATH', realpath('../'));
//--------------------------------------------------------------------------

// Set default timezone
date_default_timezone_set('PRC');

// Load main config file
Config::set('main', include_once APP_PATH . '/conf/main.' . RUN_ENV . '.php');

// Initialize routes
include_once APP_PATH . '/conf/routes.php';
