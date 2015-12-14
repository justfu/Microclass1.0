<?php session_start();
if(isset($_GET['error'])){
    if($_GET['error']==1){
        echo "<script>alert('用户名或密码错误')</script>";
    }else {
        echo "<script>alert('验证码错误')</script>";

    } }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>C语言微课平台</title>
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
        function login(){
            $('container_loginaa').style.display="block";
            $('top').style.opacity=0.5;
        }
        function clear1() {
            $('container_loginaa').style.display = "none";
            $('top').style.opacity = 1;
        }
        function gerenxinxi(){
            $('login_box_1').style.display="block";
        }
        function gerenxinxi2(){
            $('login_box_1').style.display="none";
        }
    </script>
</head>
<body id="body">
<div  id="top" style="background-color:black">
    <div class="header">
        <a href="index.php"> <img src="./img/logo5.png" /></a>
        <?php if(isset($_SESSION['name'])){
            echo "<span value='1' onmouseover='gerenxinxi()' onmouseout='gerenxinxi2()' id='username'><a href='user_mess.php'> ".$_SESSION['name']."</a></span>";
        }
        ?>

        <span id="login_box"><a style="CURSOR: pointer" onclick="login()">登陆</a><a>|</a><a style="CURSOR: pointer"  href="zhuce.php">注册</a></span>
        <div onmouseover='gerenxinxi()' onmouseout='gerenxinxi2()' class="login_box_1" id="login_box_1" style="display:none">
            <ul>
                <li><a href="personal_information.php" >个人信息</a></li>
                <li><a href="exit.php" >安全退出</a></li>
            </ul>
        </div>
        <script type="text/javascript">
            if($('username')){
                $('login_box').style.display="none";
            }
        </script>
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

<div id="container_loginaa"class="container_loginaa">
    <div class="login">
        <h1>登陆到微课　　　　　　　　　　　　　<a href="javascript:;" style="text-decoration:none;" onclick="clear1()">✘</a></h1>
        <form method="post" action="loginprocess.php">
            <p><input type="text" name="login" value="" placeholder="用户名"></p>
            <p><input type="password" name="password" value="" placeholder="密码"></p>
            <p><input id="checkCode" type="text" name="checkCode" value="" placeholder="验证码">
                <span id="checkCode_error" style="color: red;"></span>
            </p>
            <p><img  src="ValidateCode.class.php" style="CURSOR: pointer" alt="单击更换图片" onclick="this.src='ValidateCode.class.php?aa='+Math.random()"/></p>
            <script type="text/javascript">
                function checkform(){
                    if(document.forms[0].login.value==""){
                        alert("请你填写学号！");
                        return false;
                    }
                    if(document.forms[0].password.value==""){
                        alert("请你填写密码！");
                        return false;
                    }
                    if(document.forms[0].checkCode.value==""){
                        alert("请你填写验证码！");
                        return false;
                    }
                }
            </script>
            <p class="remember_me">
                <label>
                    <input type="checkbox" name="remember_me" id="remember_me">
                    记住我
                </label>
            </p>
            <p class="submit"><input onclick="return checkform()" type="submit" name="commit" value="登陆"></p>
        </form>
    </div>

    <div class="login-help">
        <p>忘记密码? <a href="#">点击此处重置</a>.</p>
    </div>
</div>
