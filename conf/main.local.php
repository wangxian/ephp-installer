<?php
return [
    // 打开选项，dump() 将会在现代浏览器console输出错误信息
    // 请在正式环境，关闭此选项
    'show_dump'     => true,

    // 设置缓存驱动方式
    // 可选：file, memcached, redis
    'cache_driver'  => 'file',

    // 如果缓存驱动为file, 设置文件缓存的目录
    'cache_dir'     => 'cache/',

    // 设置文件日志存储目录
    'log_dir'       => 'logs/',

    // 是否记录SQL执行记录
    // 如果开启此选项，将在记录详细的SQL执行记录，文件名：SQL-Log-{日期}.log
    // 请在正式环境，关闭此选项
    'sql_log'       => true,

    // 是否打印异常信息到logfile中
    'exception_log' => true,

    // 自定义404页面
    // 例如设置：404.html, 对应的文件views/404.html
    // 如果不设置，显示系统默认404界面
    'tpl_404'       => '',

    // 设置 show_success 模板
    // 例如：200.html, 对应的文件views/200.html
    // 留空，使用系统默认设置
    'tpl_success'   => '',

    // 设置 show_error 模板
    // 例如：500.html, 对应的文件views/500.html
    // 留空，使用系统默认设置
    'tpl_error'     => '',

    // memcached 缓存配置
    // 'cache_memcached' => [
    //     ['host'=>'192.168.0.102', 'port'=>11211, 'weight'=>3],
    //     ['host'=>'192.168.0.103', 'port'=>11211, 'weight'=>3],
    //     ['host'=>'192.168.0.106', 'port'=>11211, 'weight'=>4]
    // ],

    // 'cache_redis'   => [
    //     'host'    => '127.0.0.1',
    //     'port'    => '6379',
    //     'timeout' => 2.5,
    //     'auth'    => ''
    // ],

    // 数据库驱动配置，可选：mysqli, mysql, sqlite3, mysqlco
    'dbdriver'      => 'mysqlco',

    // 数据库配置
    'dbconfig'      => [
        // default db
        'default' =>
        [
            'host'      => '127.0.0.1',
            'user'      => 'root',
            'password'  => '111111',
            'dbname'    => 'test',
            'port'      => '3306',
            'tb_prefix' => 't_',
            'charset'   => 'utf8',

            // Max mysql pool size
            // Only support dbdriver mysqlco
            'idle_pool_size' => 5,
            'max_pool_size'  => 10
        ],

        // master
        'master'  =>
        [
            'host'      => '/Users/wangxian/test.db',
            'user'      => 'user',
            'password'  => '',
            'dbname'    => '',
            'port'      => '',
            'tb_prefix' => 't_',
        ],

        // salve
        'slave'   =>
        [
            'host'      => '',
            'user'      => '',
            'password'  => '',
            'dbname'    => '',
            'port'      => '',
            'tb_prefix' => 't_',
        ],
    ],
];
