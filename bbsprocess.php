<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/12/8
 * Time: 22:32
 */
session_start();
require_once 'bbs.class.php';
if(isset($_SESSION['name'])){
    $username=$_SESSION['name'];
    $sno=$_SESSION['sno'];
}else{
    $username="访客";
}
$reply=$_POST['tiwen'];
$bbs=new BBS();
$res=$bbs->insert_question($reply,$username,$sno);
if($res==1){
    echo "<script>提问成功</script>";
    header("location:interact.php?id=2");
}

