<?php
namespace App\Exception;

use \ePHP\Exception\CommonException;

class CustomException extends CommonException
{
    public function __toString()
    {
        $str = "异常信息: " . $this->getMessage() . "\n" . $this->ephpTraceString . "\n-----------------------------------";

        $logname = $this->getCode() > 0 ? 'ExceptionLog' : 'NOTICE';

        // 记录异常信息到文件中
        wlog($logname, $str);

        // if ( (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] != "XMLHttpRequest")
        //     || ( isset($_SERVER['HTTP_ACCEPT']) && false !== strpos($_SERVER['HTTP_ACCEPT'], 'application/json') )
        //  ) {
        //     echo $str;
        // } else {
        header("Content-type: application/json; charset=utf-8");
        echo '{"head": {"code": '. $this->getCode() .', "msg": "系统开小差了"}, "body": '. json_encode($str, JSON_UNESCAPED_UNICODE) .'}';
        // }

        return '';
    }
}
