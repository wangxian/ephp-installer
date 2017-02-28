<?php
$t1 = microtime(true);
var_dump(pathinfo('/www/htdocs/img/logo.png', PATHINFO_EXTENSION));

for($i=0; $i<1e5; $i++)
{
    pathinfo('/www/htdocs/img/logo.png', PATHINFO_EXTENSION);
}
echo '耗时:'. (microtime(1) - $t1)*1000 ."ms\n----------------\n";

$t1 = microtime(true);
var_dump( substr('/www/htdocs/img/logo.png', strrpos('/www/htdocs/img/logo.png', '.')+1) );
for($i=0; $i<1e5; $i++)
{
    substr('/www/htdocs/img/logo.png', strrpos('/www/htdocs/img/logo.png', '.')+1);
}
echo '耗时:'. (microtime(1) - $t1)*1000 ."ms\n----------------\n";


$t1 = microtime(true);
var_dump( in_array('name', [1, 2, 3]) );
for($i=0; $i<1e5; $i++)
{
    in_array('name', [1, 2, 3]);
}

echo '耗时:'. (microtime(1) - $t1)*1000 ."ms\n----------------\n";

$t1 = microtime(true);
var_dump( 'name' === 1 || 'name' === 2 || 'name' === 3 );
for($i=0; $i<1e5; $i++)
{
    'name' === 2 ||'name' === 2 ||'name' === 2 ||'name' === 2 ||'name' === 2 ||'name' === 2 ||'name' === 'name' || 'name' === 2 || 'name' === 3;
}

echo '耗时:'. (microtime(1) - $t1)*1000 ."ms\n----------------\n";