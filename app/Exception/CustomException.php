<?php
namespace App\Exception;

use \ePHP\Exception\CommonException;

class CustomException extends CommonException
{
    public function __toString()
    {
        $str = "异常信息\n-----------------------------------\n" . $this->getMessage() . "\n"
        . "-----------------------------------\n" . $this->ephpTraceString . "\n-----------------------------------\n";

        // 记录异常信息到文件中
        wlog('ExceptionLog', $str);

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
            && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest" ) {
            echo $str;
        } else {
            // dump('error', $str);
            // 自定义异常输出
            echo "<pre>{$str}</pre>";
        }

        return '';
    }
}
