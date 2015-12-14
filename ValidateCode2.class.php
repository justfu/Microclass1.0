<?php


        session_start();
        $charset = 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789';//随机因子
        $code="";//验证码
        $codelen = 4;//验证码长度
        $width = 130;//宽度
        $height = 50;//高度
        $img;//图形资源句柄
        $font='./font/ELEPHNT.TTF';//指定的字体
        $fontsize = 20;//指定字体大小
        $fontcolor;//指定字体颜色

        $_len = strlen($charset)-1;

        for ($i=0;$i<$codelen;$i++) {
            @$code.= $charset[mt_rand(0,$_len)];
        }
        $_SESSION['checkcode_zhuce']=strtolower($code);



        $img = imagecreatetruecolor($width, $height);

        $color = imagecolorallocate($img, mt_rand(157,255), mt_rand(157,255), mt_rand(157,255));
        imagefilledrectangle($img,0,$height,$width,0,$color);
        $_x = $width / $codelen;
        for ($i=0;$i<$codelen;$i++) {
          $fontcolor = imagecolorallocate($img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
          imagettftext($img,$fontsize,mt_rand(-30,30),$_x*$i+mt_rand(1,5),$height / 1.4,$fontcolor,$font,$code[$i]);
        }


      for ($i=0;$i<6;$i++) {
          $color = imagecolorallocate($img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
           imageline($img,mt_rand(0,$width),mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),$color);
        }
//        //雪花
        for ($i=0;$i<5;$i++) {
          $color = imagecolorallocate($img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
           imagestring($img,mt_rand(1,5),mt_rand(0,$width),mt_rand(0,$height),'*',$color);
       }

        header('Content-type:image/png');

        imagepng($img);

        imagedestroy($img);
