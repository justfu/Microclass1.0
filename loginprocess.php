<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/11/29
 * Time: 10:28
 */
session_start();
require_once 'studentService.class.php';
$sno=$_POST['login'];
$pwd=$_POST['password'];
$checkcode=$_POST['checkCode'];
if($checkcode!=$_SESSION['checkcode']){
    header("location:index.php?error=2");
    exit();
}
$studentService=new StudentService();
$res=$studentService->checkStudent($sno,$pwd);
if(!$res){
    header("location:index.php?error=1");
    exit();
}else{
    session_start();
    $_SESSION['name']=$res[0];
    $_SESSION['sno']=$res[1];
    header("location:index.php");
    exit();
}