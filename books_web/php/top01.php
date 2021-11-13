<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <div name="top01" class="div-allinline">
        <div name="subdiv-allinline" class="subdiv-allinline">
            <ul>
                <li>
                    <?php
                    $flag = 1;
                    if($flag==1){
                        echo "<a href='../view/login.html'>亲，请登录</a>";
                        echo " "."<a href='../view/register.html'>免费注册</a>";
                    }else{
                        echo "欢迎"."方耀辉"."用户"."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                    }
                    ?>
                </li>
            </ul>
        </div>
        <div name="subdiv-allinline" class="subdiv-allinline">
            <ul>
                <li><a href="#">&nbsp&nbsp&nbsp书店首页</a></li>
                <li><a href="#">&nbsp&nbsp&nbsp<img src="../img/userimg.png" width="15" height="15" style="vertical-align:middle"></img>个人中心</a></li>
                <li><a href="#">&nbsp&nbsp&nbsp<img src="../img/shoppingcar.png" width="15" height="15" style="vertical-align:middle"></img>购物车<?php echo "0";?></a></li>
                <li><a href="#">&nbsp&nbsp&nbsp<img src="../img/favorites.png" width="15" height="15" style="vertical-align:middle"></img>收藏夹</a></li>
            </ul>
        </div>
    </div>
</body>
</html>