<?php
    function config(){
        return[
            'db_connect' => ['host' => 'localhost','user' => 'fang','pass'=>'123456','dbname'=>'shopping',
                'port'=>'3306'],
            'db_charset' => 'utf8',
            'db_prefix' => 'shopping_',
        ];
    }
?>