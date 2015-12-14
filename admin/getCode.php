<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/10/23
 * Time: 10:45
 */
$str="";
for($i=0;$i<4;$i++){
    $str.= dechex(rand(1,15));
}
session_start();

$_SESSION['checkcode_admin']=$str;

$image=imagecreatetruecolor(90,50);

$white=imagecolorallocate($image,255,255,255);

imagefill($image,0,0,$white);

$red=imagecolorallocate($image,255,0,0);

imagestring($image,5,rand(0,80),rand(0,30),$str, $red);

//画出干扰线
for($i=0;$i<5;$i++){
    imageline($image,rand(0,110),rand(0,30),rand(0,110),rand(0,30),imagecolorallocate($image,rand(0,255),rand(0,255),rand(0,255)));
}

header("content-type:image/png");

imagepng($image);

imagedestroy($image);