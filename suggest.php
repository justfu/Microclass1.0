<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/12/5
 * Time: 21:11
 */
require_once 'navigator.php';

?>
<style type="text/css">
    .elegant-aero {
        margin-left:auto;
        margin-right:auto;
        max-width: 1349px;
        background: #D2E9FF;
        padding: 20px 20px 20px 20px;
        font: 12px Arial, Helvetica, sans-serif;
        color: #666;
        height: 500px;
    }
    .elegant-aero h1 {
        font: 24px "Trebuchet MS", Arial, Helvetica, sans-serif;
        padding: 10px 10px 10px 20px;
        display: block;
        background: #C0E1FF;
        border-bottom: 1px solid #B8DDFF;
        margin: -20px -20px 15px;
    }
    .elegant-aero h1>span {
        display: block;
        font-size: 11px;
    }
    .elegant-aero label>span {
        float: left;
        margin-top: 10px;
        color: #5E5E5E;
    }
    .elegant-aero label {
        display: block;
        margin: 0px 0px 5px;
    }
    .elegant-aero label>span {
        float: left;
        width: 20%;
        text-align: right;
        padding-right: 15px;
        margin-top: 10px;
        font-weight: bold;
    }
    .elegant-aero input[type="text"], .elegant-aero input[type="email"], .elegant-aero textarea, .elegant-aero select {
        color: #888;
        width: 70%;
        padding: 0px 0px 0px 5px;
        border: 1px solid #C5E2FF;
        background: #FBFBFB;
        outline: 0;
        -webkit-box-shadow:inset 0px 1px 6px #ECF3F5;
        box-shadow: inset 0px 1px 6px #ECF3F5;
        font: 200 12px/25px Arial, Helvetica, sans-serif;
        height: 50px;
        line-height:15px;
        margin: 2px 6px 16px 0px;
    }
    .elegant-aero textarea{
        height:150px;
        padding: 5px 0px 0px 5px;
        width: 70%;
    }
    .elegant-aero .button{
        padding: 10px 30px 10px 30px;
        background: #66C1E4;
        border: none;
        color: #FFF;
        box-shadow: 1px 1px 1px #4C6E91;
        -webkit-box-shadow: 1px 1px 1px #4C6E91;
        -moz-box-shadow: 1px 1px 1px #4C6E91;
        text-shadow: 1px 1px 1px #5079A3;
    }
    .elegant-aero .button:hover{
        background: #3EB1DD;
    }
</style>
<form action="" method="post" class="elegant-aero">
    <h1>意见反馈
        <span>请填写需要反馈的信息</span>
    </h1>
    <label>
        <span>用户名:</span>
        <input id="name" type="text" name="name" placeholder="你的用户名" />
    </label>
    <label>
        <span>邮箱:</span>
        <input id="email" type="email" name="email" placeholder="你的邮箱地址" />
    </label>
    <label>
        <span>反馈:</span>
        <textarea id="message" name="message" placeholder="需要给我们的反馈"></textarea>
    </label>
    <label>
        <span>&nbsp;</span>
        <input type="button" class="button" value="提交" />
    </label>

</form>
<?php require_once 'footer.php'?>