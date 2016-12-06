<?php
return [
    // 打开选项，dump() 将会在现代浏览器console输出错误信息
    // 请在正式环境，关闭此选项
    'show_dump'     => true,

    // 是否记录SQL执行记录
    'sql_log'       => true,

    // 配置默认php.ini的配置，时候显示系统错误
    // 如果不显示错误，则可能抑制PHP发出notice级别的错误
    'show_errors'   => true,

    // 是否打印异常信息到logfile中
    'exception_log' => true,

    // 是否启用路由配置
    'url_router'    => false,

    // 默认路由方式
    'url_type'      => 'PATH_INFO',

    // view中可使用STATIC_DIR引用路径，
    // 可自定义项目的位置，是在某一个目录里，还是在根目录
    // 或者用户CDN，自定义URL前缀，如http://cdn.xxx.com/assets/
    'static_dir'    => '',

    // 缓存方式
    'cache_type'    => 'FileCache',

    // 日志目录
    'log_dir'       => 'logs/',

    // 缓存目录
    'cache_dir'     => 'cache/',

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

    // 数据库驱动配置，可选：mysqli, mysql, sqlite3
    'dbdriver'      => 'sqlite3',

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
