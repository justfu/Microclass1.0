<?php require_once 'common.class.php';
$common=new common();
$common->checkUserVal();
?><html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>添加选择题界面</title>
<style type="text/css">
    *{
        margin: 0px;
    }
    .form_aa{
        width: 800px;
        float: left;
    }
    .navi{
        padding-top: 150px;
        width: 200px;
        float: left;
    }
    .navi ul li{
        list-style-type: none;
        margin-top: 30px;

    }
</style>
</head>
<body>

<div style="width: 100%;height: 80px;font-size: 60px;background-color: #0099CC;text-align: center">添加填空题界面
    <span style="position: relative;right: -200px;color: white;font-size: 30px">你的身份：<?php echo $common->getUserName();?></span>
</div>
<div class="form_aa">
<form method="post" action="addprocess.php">
    试卷编号 ：<input type="text" name="paper_id" /><span style="color: red">********注意试卷编号必须指定，且为整形数字,试卷编号即为第几套试题，每套试题10个选择题10个填空题，10个改错题*****</span><br/>
    选择题题目 ：<textarea cols="30" rows="10" name="select_name"></textarea><br/>
    选择题选项A：<textarea cols="40" rows="5" name="select_A"></textarea><br/>
    选择题选项B：<textarea cols="40" rows="5" name="select_B"></textarea><br/>
    选择题选项C：<textarea cols="40" rows="5" name="select_C"></textarea><br/>
    选择题选项D：<textarea cols="40" rows="5" name="select_D"></textarea><br/>
    选择题答案:<input type="text" name="answer" /><br/>
    <input type="hidden" name="form_class" value="select">
    <input type="submit" value="添加" />　　　　　<input type="reset" value="重置" />
</form>
    </div>
<div class="navi">
    <ul>
        <li><a href="addquestion_select.php">去添加选择题</a></li>
        <li><a href="add_tiankong.php"> 去添加填空题</a></li>
        <li><a href="add_correct.php">去添加改错题</a></li>
        <li><a href="admin.php"> 返回管理界面</a></li>
    </ul>
</div>
</body>
</html>　
<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/12/4
 * Time: 12:16
 */
