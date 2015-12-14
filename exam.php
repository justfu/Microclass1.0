<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/11/29
 * Time: 17:29
 */
require_once 'navigator.php';

?>
<div class="box">
    <div id="kecheng" class="kecheng_danye">
        <ul>
            <li><a name="a" onmouseover="menu()" onmouseout="menu2()" onclick="change('qimokaoshi')" href="javascript:;">期末考试</a></li>
            <li><a name="a" onmouseover="menu()" onmouseout="menu2()" onclick="change('jisuanjidengji')" href="javascript:;">全国计算等级考试</a></li>
            <li><a name="a" onmouseover="menu()" onmouseout="menu2()" onclick="change('chengxujingsai')" href="javascript:;">大学生程序竞赛平台</a></li>
        </ul>
    </div>

    <div id="qimokaoshi"  class="qimokaoshi">
        <h1>   期末考试</h1>

    </div>
    <div class="jisuanjidengji"  style="display: none" id="jisuanjidengji">
        <h1>全国计算机等级考试</h1>
    </div>

    <div class="chengxujingsai" style="display: none" id="chengxujingsai">
        <h1>大学生程序竞赛平台</h1>
    </div>
</div>
<?php require_once 'footer.php';?>

<style type="text/css">
    .box{
        margin-top: 0px;
        margin-left: 0px;
        width: 1349px;
        height: 1000px;
        border: #5DAAD6 solid;
        background-image: url("./img/bg3.gif");
        background-repeat: repeat;
    }
    .qimokaoshi,.jisuanjidengji,.chengxujingsai{
        position: absolute;
        top:300px;
        left: 350px;
        width: 800px;
        height: 800px;
        background: transparent;
    }
    .kecheng_danye{
        position: relative;
        top:120px;
        left: 0px;
        float: left;
    }
    .kecheng_danye ul li a:link,.kecheng_danye ul li a:visited{
        display:block;
        font-weight:bold;
        height: 60px;
        text-align: center;
        padding-top: 20px;
        color:#FFFFFF;
        background-color:#bebebe;
        width:55px;
        text-align:center;
        padding:4px;
        text-decoration:none;
        text-transform:uppercase;
    }
    .kecheng_danye ul li a:hover,.kecheng_danye ul li a:active
    {
        background-color:#5DAAD6;
    }
</style>
<script type="text/javascript">
    var id="<?php if(isset($_GET['id'])){
    $id=$_GET['id'];
    echo $id;}?>";
    change();
    function change(val){
        if(val=="qimokaoshi"|| id=="1"){
            $('qimokaoshi').style.display="block";
            $('jisuanjidengji').style.display="none";
            $('chengxujingsai').style.display="none";

        }else if(val=="jisuanjidengji" || id=="2"){
            $('qimokaoshi').style.display="none";
            $('jisuanjidengji').style.display="block";
            $('chengxujingsai').style.display="none";

        }else if(val=="chengxujingsai"||id=="3"){
            $('qimokaoshi').style.display="none";
            $('jisuanjidengji').style.display="none";
            $('chengxujingsai').style.display="block";
        }
        id="4";
    }
    function menu(){
        var a=document.getElementsByName("a");
        for(var i=0;i<3;i++){
            a[i].style.width=200+"px";
        }
    }
    function menu2(){
        var a=document.getElementsByName("a");
        for(var i=0;i<3;i++){
            a[i].style.width=55+"px";
        }
    }
    function $(id){
        return document.getElementById(id);
    }
</script>
