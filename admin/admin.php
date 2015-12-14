<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>管理系统界面</title>
</head>
<style type="text/css">
    *{
        margin: 0px;
    }
</style>
<body>
<?php
require_once 'common.class.php';
$common=new common();
$common->checkUserVal();
?>
<div style="width: 100%;height: 80px;font-size: 60px;background-color: #0099CC;text-align: center">您已成功登陆
    <span style="position: relative;right: -200px;color: white;font-size: 30px">你的身份：<?php echo $common->getUserName();?></span>
</div>
<a href='login.php'>退出登录</a><br/><br/>
<a href="addquestion_select.php">增加选择题</a><br/><br/>
<a href="add_tiankong.php">增加填空题</a><br/><br/>
<a href="add_correct.php">增加改错题</a><br/>
</body>
</html>
