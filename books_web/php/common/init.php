<?php
//require './library/Db.php';
    date_default_timezone_set('Asia/Shanghai');
    session_set_cookie_params(0,null,null,null,true);
    mb_internal_encoding('UTF-8');
    require 'function.php';
//    require_once './library/Db.php';

    session_start();
    if(!isset($_SESSION['fyh'])){
        $_SESSION = ['fyh' => []]; //为项目统一创建session，统一保存到fang中
    }
?>
