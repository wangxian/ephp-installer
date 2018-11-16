--TEST--
使用PHP-QA的.phpt做单元测试 str_replace() function
--FILE--
<?php
/**
 * 使用PHP-QA的.phpt做单元测试
 * 试用方法 pecl run-tests tests/*
 */
$str = 'Hello, all!';
echo(str_replace('all', 'world', $str));
?>
--EXPECT--
Hello, world!
