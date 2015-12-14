<script type="text/javascript">
    function check(){
        // alert($('id').value);
        if($('id').value==""){
            alert("id号没填");
            $('id').value="";
            return false;
        }
        if($('pwd').value==""){
            alert("密码没填");
            $('id').value="";
            return false;
        }
        if($('checkCode').value==""){
            alert("验证码没填呢，大哥");
            $('id').value="";
            return false;
        }
        return true;
    }

    function $(id){
        return document.getElementById(id);
    }

</script>
<?php
if(!empty($_GET['error'])){
    $error=$_GET['error'];
    if($error==1){
        echo "<script>window.alert('用户名或密码错误')</script>";
    }
    elseif($error==2){
        echo "<script>window.alert('验证码错误')</script>";
    }
}
require_once 'common.class.php';
$common=new common();
?>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <script src="js/modernizr.custom.js"></script>
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" type="text/css" href="css/component.css">
    <style>
        body{
            margin: 0px;
            background-image: url("../img/login-background.jpg");

        }
        form{
            position: absolute;
            margin-top: 180px;
            margin-left: 70%;
            border: 1px solid;
            border-color: aqua;
            padding: 20px 20px 20px 20px;
        }

    </style>
</head>
<body>
<form action="loginprocess.php" method="post">
    <table>
        <tr><td>用户号</td><td><input type="text" id="id" name="id" value="<?php echo $common->getCookieValue("id")?>" ""/></td></tr>
        <tr><td>密码</td><td><input type="password" id="pwd" name="password" value="<?php echo $common->getCookieValue("password")?>" /></td></tr>
        <tr><td>是否保存cookie</td><td><input type="checkbox" name="cookie" value="setcookie" /></td></tr>
        <tr><td>验证码<input type="text" id="checkCode" name="checkCode"/></td><td><img src="getCode.php" onclick="this.src='getCode.php?aa='+Math.random()" </td></tr>
        <tr><td><input type="submit" onclick="return check()" value="登陆" class="btn btn-6 btn-6b"/></td><td><input type="reset" value="重置" /></td></tr>
    </table>
</form>
</body>
</html>
