<?php
//    require_once './common/function.php';
    require './common/init.php';
    require_once './common/library/Db.php';
    $username = input('post','username','s');
    $password = input('post','password','s');
    $captcha = input('post','captcha','s');
    if(!captcha_check($captcha)){
        $res = alert("登录失败，验证码错误。",'../view/login.html');
        echo $res;
    }
    $db = Db::getInstance();
    $u_name = $db->select(['*'],'users',['u_username'=>$username],'AND',0);
    if($u_name){
        print_r($u_name);
    }else{
        echo '0';
    }
?>