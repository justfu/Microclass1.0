<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/12/1
 * Time: 22:10
 */
require_once 'student.class.php';
require_once 'navigator.php';
$student=new Student();
$sno=$_SESSION['sno'];
$arr=$student->get_user_info($sno);
?>
<style type="text/css">
.box{
margin-top: 0px;
margin-left: 0px;
width: 1349px;
height: 700px;
border: #5DAAD6 solid;
background-image: url("./img/bg3.gif");
background-repeat: repeat;
}
.person_info ul{
    position: relative;
    left: 200px;
}
    .person_info ul li{
        font-size: 20px;
        color: white;
        font-family: "Microsoft Yahei UI","Microsoft Yahei",Verdana,Simsun,"Segoe UI","Segoe UI Web Regular","Segoe UI Symbol","Helvetica Neue","BBAlpha Sans","S60 Sans",Arial,sans-serif;
        margin-top: 50px;
    }
    .person_info ul li span{
        color: rgb(255, 251, 240);
        margin-left: 50px;
    }
</style>
<div class="box">
    <div class="person_info">
        <ul>
            <li><img width="82px" height="82px" src='./user_img/<?php echo $arr[6];?>'/></li>
            <li>学号　　:<span><?php echo $arr[0];?></span></li>
            <li>用户名　:<span><?php echo $arr[1];?></span></li>
            <li>真实名字:<span><?php echo $arr[2];?></span></li>
            <li>邮箱　　:<span><?php echo $arr[3];?></span></li>
            <li>联系方式:<span><?php echo $arr[4];?></span></li>
            <li>院系　　:<span><?php echo $arr[5];?></span></li>
            <li>测试成绩:<span><?php echo $arr[5];?></span></li>
        </ul>
    </div>
</div>
<?php require_once 'footer.php'?>