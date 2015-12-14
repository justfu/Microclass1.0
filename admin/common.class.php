<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/10/21
 * Time: 10:45
 */

class common{
    public function getLastTime(){
        if(!empty($_COOKIE['time'])){
            echo "你上次访问的时间为".$_COOKIE['time'];
            setCookie("time",date("Y-m-d : H:i:s"),time()+3600);
        }else{
            echo "你是第一次访问啊,欢迎光临本网站";
            setCookie("time",date("Y-m-d:H-m-s"),time()+3600);
        }
    }

    public function getCookieValue1(){
        if(!empty($_COOKIE['id'])&&!empty($_COOKIE['password'])){
            $arr=array(
              "id" => "{$_COOKIE['id']}",
                "password" => "{$_COOKIE['password']}"
            );
        }else{
            $arr['id']="";
            $arr['password']="";

        }
        return $arr;
    }

    public function getCookieValue($key){
        if(!empty($_COOKIE["$key"])){
            return $_COOKIE["$key"];
        }else{
            return "";
        }
    }

    public function checkUserVal(){
        session_start();
        if(empty($_SESSION['name_admin'])){
            header("location:login.php");
            exit();
        }
    }

    public function getUserName(){
        return $_SESSION['name_admin'];
    }
}