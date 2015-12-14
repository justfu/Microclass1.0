<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/12/13
 * Time: 19:33
 */
session_start();
require_once 'bbs.class.php';
$bbs=new BBS();
$bbs_id=$_POST['bbs_id'];
$reply_user_name="访客";
$reply_user_sno="visit";
$reply_content=$_POST['reply_content'];

if(isset($_SESSION['name'])){
    $reply_user_name=$_SESSION['name'];
}
if(isset($_SESSION['sno'])){
    $reply_user_sno=$_SESSION['sno'];
}

$res=$bbs->insert_reply($bbs_id,$reply_user_name,$reply_user_sno,$reply_content);
if($res==1){
    echo "<script type='text/javascript'>alert('回复成功');history.back();</script>";

}