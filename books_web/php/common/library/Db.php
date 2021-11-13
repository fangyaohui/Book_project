<?php
    class Db{
        private static $instance;//保存本类的单例对象
        private static $mysql;//保存连接数据对象
        private function __construct(){
            $config = [
                'db_connect' => ['host' => 'localhost','user' => 'fang','pass'=>'123456','dbname'=>'shopping',
                    'port'=>'3306'],
                'db_charset' => 'utf8',
                'db_prefix' => 'shopping_',
            ];
            $config = $config['db_connect'];
            self::$mysql = new mysqli($config['host'],$config['user'],$config['pass'],
                $config['dbname'],$config['port']);
            if(self::$mysql -> connect_errno){
                exit('数据库连接失败：'.self::$mysql->connect_error);
            }
            self::$mysql -> set_charset("UTF-8");
        }
        private function __clone(){}
        public static function getInstance(){
            return self::$instance?:(self::$instance = new self());
        }
        public function insert($table,$data){
            $sql = 'INSERT INTO '.'`'.$table.'` '.'SET ';
            $j = 0;
            foreach ($data as $k => $i) {
                if ($j == 0){
                    $j+=1;
                    $sql .= '`'.$k.'`'.'="'.$i.'"';
                }else{
                    $sql .= ',`'.$k.'`'.'="'.$i.'"';
                }
            }
            $sql .= ';';
//            echo $sql."\n";
            $flag = mysqli_query(self::$mysql,$sql);
            if (!$flag){
                echo '失败'.mysqli_error(self::$mysql);
            }else{
                echo '插入成功\n';
            }
        }
        public function select($filds,$table,$data,$type='AND'){
            $sql = 'SELECT ';
            $j = 0;
            foreach ($filds as $fild){
                if($j == 0){
                    $j = 1;
                    $sql .= '`'.$fild.'`';
                }else {
                    $sql .= ',`' . $fild . '`';
                }
            }
            $sql .= ' FROM `'.$table.'` ';
            $j = 0;
            foreach ($data as $k => $i){
                if ($j==0){
                    $j = 1;
                    $sql .= 'WHERE `'.$k.'`="'.$i.'"';
                }else{
                    $sql .= ' '.$type.' `'.$k.'`="'.$i.'"';
                }
            }
            $sql .= ';';
            $reslut = mysqli_query(self::$mysql,$sql);
            if(mysqli_num_rows($reslut)==0){
                return false;
            }
            $reslut = mysqli_fetch_all($reslut);
            return $reslut;
        }
        public function update($filds,$table,$data,$type='AND'){
            $sql = 'UPDATE `'.$table.'` SET ';
            $j = 0;
            foreach ($filds as $k=>$i){
                if($j == 0){
                    $j = 1;
                    $sql .= '`'.$k."`='".$i."'";
                }else {
                    $sql .= ',`'.$k."`='".$i."'";
                }
            }
            $sql.=' WHERE ';
            $j = 0;
            foreach ($data as $k => $i){
                if ($j==0){
                    $j = 1;
                    $sql .= '`'.$k."`='".$i."'";
                }else{
                    $sql.= ' '.$type.' `'.$k."`='".$i."'";
                }
            }
            $sql.=';';
            mysqli_query(self::$mysql,$sql);
            $reslut = mysqli_affected_rows(self::$mysql);
            if ($reslut>=0){
                echo '更新成功\n';
            }
            else{
                echo '更新失败\n';
            }
//            echo $sql,$reslut;
        }
        public function delete($table,$where,$type='AND'){
            $sql = 'DELETE FROM `'.$table.'` WHERE ';
            $j = 0;
            foreach ($where as $k=>$i){
                if($j==0){
                    $sql.='`'.$k.'`="'.$i.'"';
                    $j=1;
                }else{
                    $sql.=' '.$type.' '.'`'.$k.'`="'.$i.'"';
                }
            }
            $sql.=';';
            mysqli_query(self::$mysql,$sql);
            $reslut = mysqli_affected_rows(self::$mysql);
            if($reslut>=0){
                echo '删除成功  ';
            }
            else{
                echo '删除失败  ';
            }
        }
    }
    // 测试代码
//    $db = Db::getInstance();
//    $time = date('Y-m-d h:i:s', time()); // 2018-10-3 15:57:05
////    $db->insert('users',['u_id'=>'7','u_username'=>"fang",'u_password'=>'123456',
////    'u_sex'=>"男",'u_mail'=>"2944163240@qq.com",'u_phone'=>'123412344','u_flag'=>'1',
////        'u_role'=>'1','u_code'=>'1234','u_time'=>$time]);
//    $reslut = $db->select(['*'],'users',['u_id'=>'1','u_username'=>'fang'],'OR','1');
//    print_r($reslut);
//    $db->update(['u_password'=>'fangyaohui','u_username'=>'fangyaohui'],'users',['u_username'=>'fangyaohui','u_id'=>'1','u_id'=>'2'],'OR');
//    $db->delete('users',['u_id'=>'1','u_username'=>'fangyaohui'],'AND');
?>