
<?php
if(isset($_GET['error'])){
    $error=$_GET['error'];
    if($error==1){
        echo "<script>alert('出现相同的的学号');</script>";
    }elseif($error==3){
        echo "<script>alert('验证码错误');</script>";
    }
}
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>创吧</title>
    <link rel="stylesheet" type="text/css" href="app.css" />
    <link rel="stylesheet" type="text/css" href="form.css"/>
    <script type="text/javascript">
        function $(id){
            return document.getElementById(id);
        }
        function navi(val){
            if(val=="navi1"){
                $('kecheng').style.display="block";
            }
            if(val=="navi2"){
                $('weike').style.display="block";
            }
            if(val=="navi3"){
                $('kaoshi').style.display="block";
            }
            if(val=="navi4"){
                $('hudong').style.display="block";
            }

        }
        function navi2(val){
            if(val=="navi1"){
                $('kecheng').style.display="none";
            }
            if(val=="navi2"){
                $('weike').style.display="none";
            }
            if(val=="navi3"){
                $('kaoshi').style.display="none";
            }
            if(val=="navi4"){
                $('hudong').style.display="none";
            }
        }

        function chkEmail(str)
        {
            return str.search(/[\w\-]{1,}@[\w\-]{1,}\.[\w\-]{1,}/)==0?true:false
        }


        function check_pwd(){
            var pw1=$('pwd1').value;
            var pw2=$('pwd2').value;
            if(pw1!=pw2) {
                $('tishi').style.color="red";
                $('tishi').innerText = "两次密码输入不一样";
            }else{
                $('tishi').style.color="#0099CC";
                $('tishi').innerText = "通过";
            }
        }
        function check_sno(){
            var sno=$('sno').value;
            if(sno.length<12){
                $('tishi_sno').style.color="red";
                $('tishi_sno').innerText = "学号必须为12位";
            }else{
                $('tishi_sno').style.color="#0099CC";
                $('tishi_sno').innerText = "通过";
            }
        }

        function $(id){
            return document.getElementById(id);
        }
    </script>
    <style type=text/css>
        .zhuce{
            background-image: url("./img/login_back.jpg");
            width: 1349px;
            height: 700px;
            position: relative;
            left:0px;
            top:8px;
        }
        .zhuce_form{
            position: relative;
            left: 150px;
        }
        input[type=text]{
            width: 300px;
            height: 27px;

        }
        input[type=text]:focus, input[type=password]:focus {
            border-color: #5DAAD6;
            outline-color: #dceefc;
            outline-offset: 0;
            border: 0.5px solid;
            outline: 2px solid #eff4f7;
        }
        input[type=password]{
            width: 200px;
        }
        input[type=submit],input[type=reset] {
            width: 100px;
            height: 30px;
        }
        .submit{
            position: relative;
            top: 50px;
            left:130px;
        }

    </STYLE>
</head>
<body id="body" >
<div  id="top" style="background-color:black">
    <div class="header">
        <a href="index.php"> <img src="./img/logo5.png" /></a>
        <span id="login_box"><a href="javascript:;"> 注册界面</a></span>
        <div onmouseover='gerenxinxi()' onmouseout='gerenxinxi2()' class="login_box_1" id="login_box_1" style="display:none">
            <ul>
                <li><a href="#" >个人信息</a></li>
                <li><a href="exit.php" >安全退出</a></li>
            </ul>
        </div>
    </div>
    <div class="product_navi">
        <ul>
            <li class="up_navi"><a href="index.php">网站首页</a></li>
            <li class="up_navi">
                <a  onmouseover="navi('navi1')"  onmouseout="navi2('navi1')" href="course.php">课程介绍</a>
                <div onmouseover="navi('navi1')"  onmouseout="navi2('navi1')" id="kecheng" class="kecheng">
                    <ul class="zi_navi">
                        <li><a href="course.php?id=1">课程简介</a></li>
                        <li><a href="course.php?id=2">教学大纲</a></li>
                        <li><a href="course.php?id=3">授课计划</a></li>
                        <li><a href="course.php?id=4">考试大纲</a></li>
                        <li><a href="course.php?id=5">国考介绍</a></li>
                        <li><a href="course.php?id=6">国考大纲</a></li>
                    </ul>
                </div>

            </li>
            <li onmouseover="navi('navi2')"  onmouseout="navi2('navi2')" class="up_navi"><a href="smallclass.php">微课资源</a>

                <div onmouseover="navi('navi2')"  onmouseout="navi2('navi2')"  id="weike" class="weike">
                    <ul class="zi_navi">
                        <li><a href="smallclass.php?id=1">微课视频</a></li>
                        <li><a href="smallclass.php?id=2">知识点精解</a></li>
                        <li><a href="smallclass.php?id=3">知识点测试</a></li>
                        <li><a href="smallclass.php?id=4">末考模拟试题库</a></li>
                        <li><a href="smallclass.php?id=5">周考模拟试题库</a></li>
                    </ul>
                </div>
            </li>
            <li onmouseover="navi('navi3')"  onmouseout="navi2('navi3')" class="up_navi"><a href="exam.php">考试平台</a>

                <div onmouseover="navi('navi3')"  onmouseout="navi2('navi3')" id="kaoshi" class="kaoshi">
                    <ul class="zi_navi">
                        <li><a href="exam.php?id=1">期末考试</a></li>
                        <li><a href="exam.php?id=2">全国计算机等级考试</a></li>
                        <li><a href="exam.php?id=3">大学生程序竞赛平台</a></li>
                    </ul>
                </div>
            </li>
            <li onmouseover="navi('navi4')"  onmouseout="navi2('navi4')"class="up_navi"><a href="interact.php">互动教学</a>

                <div onmouseover="navi('navi4')"  onmouseout="navi2('navi4')"id="hudong" class="hudong">
                    <ul class="zi_navi">
                        <li><a href="interact.php?id=1">常见问题</a></li>
                        <li><a href="interact.php?id=2">有问必答</a></li>
                        <li><a href="interact.php?id=3">专题文章</a></li>
                        <li><a href="interact.php?id=4">考试平台</a></li>
                    </ul>
                </div>
            </li>
            <li class="up_navi"><a href="#link_tip">相关网站</a></li>
        </ul>


    </div>
</div>
<div class="zhuce">
    <div class="zhuce_form">
   <form method="post" action="zhuceprocess.php" >
       <span style="color:#FFFFFF;font-size: 22px;">学号　　　:<input id="sno" onkeyup="check_sno()" value="" type="text" name="sno" /><span id="tishi_sno" style="color: red;margin-left: 20px">请填写你的在校学号</span></span><br/><br/>
       <span style="color:#FFFFFF;font-size: 22px;">注册用户名:<input type="text" id="username" value=""name="usernc" /><span id="tishi_name" style="color: #0099CC;margin-left: 20px">用户名要小于5位</span></span><br/><br/>
       <span style="color:#FFFFFF;font-size: 22px;">真实姓名　:<input type="text" name="truename"value="" /></span><br/><br/>
       <span style="color:#FFFFFF;font-size: 22px;">登陆密码　:<input id="pwd1"type="password" value=""name="pwd1" /></span><br/><br/>
       <span  style="color:#FFFFFF;font-size: 22px;">确认密码　:<input onkeyup="check_pwd()" value=""type="password" id="pwd2"name="pwd2" /><span id="tishi" style="color: red;margin-left: 20px"></span></span><br/><br/>
       <span style="color:#FFFFFF;font-size: 22px;">邮箱地址　:<input id="email" onchange="chkEmail()" value=""type="text" name="email" /><span id="tishi_email" style="color: red;margin-left: 20px">请填写真实邮箱</span></span><br/><br/>
       <span style="color:#FFFFFF;font-size: 22px;">联系电话　:<input type="text" value="" name="tel" /></span><br/><br/>
       <span style="color:#FFFFFF;font-size: 22px;">专业班级　:<input type="text" value="" name="major" /></span><br/><br/>
       <span style="color:#FFFFFF;font-size: 22px;">验证码　　:<input type="text" style="width: 60px;" value="" name="checkcode_zhuce" /><img  style="position: relative;top: 20px;left: 20px; " src="ValidateCode2.class.php" style="CURSOR: pointer" alt="单击更换图片" onclick="this.src='ValidateCode2.class.php?aa='+Math.random()"/></span><br/><br/>
       <div class="submit"><input type="submit" onclick="return checkxinxi()" value="注册">　　　<input type="reset" value="重置"></div>

   </form>
    </div>
</div>
<script type="text/javascript">
    function chkEmail()
    {
        var str=$('email').value;
        var res=str.search(/[\w\-]{1,}@[\w\-]{1,}\.[\w\-]{1,}/)==0?true:false;
        if(res){
            $('tishi_email').style.color="#5DAAD6";
            $('tishi_email').innerText="通过";
        }else{
            $('tishi_email').style.color="red";
            $('tishi_email').innerText="邮箱格式不对";
        }
    }
    function checkxinxi(){
        if(document.forms[0].sno.value==""){
            alert("学号不能为空");
            return false;
        }else if(document.forms[0].usernc.value==""){
            alert("注册用户名没有填写");
            return false;
        }else if(document.forms[0].truename.value==""){
            alert("真实姓名没有填写");
            return false;
        }else if(document.forms[0].pwd1.value==""){
            alert("密码没有填写");
            return false;
        }else if(document.forms[0].pwd2.value==""){
            alert("确认密码没有填写");
            return false;
        }else if(document.forms[0].email.value==""){
            alert("专业班级没有填写");
            return false;
        }else if(document.forms[0].major.value==""){
            alert("专业班级没有填写");
            return false;
        }
    }

</script>