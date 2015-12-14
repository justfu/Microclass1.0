<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/11/29
 * Time: 10:24
 */
require_once 'SqlHelper.class.php';
$sqlHelper=new SqlHelper();
$sql="select * from student";
$res=$sqlHelper->res_array($sql);
foreach($res as $key =>$value){
    echo $key."--".$value;
}