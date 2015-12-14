<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/11/29
 * Time: 17:29
 */
require_once 'navigator.php';

?>
<script type="text/javascript" src="menu.js"></script>
<div class="box">
<div id="kecheng" class="kecheng_danye">
    <ul>
        <li><a name="a" onmouseover="menu()" onmouseout="menu2()" onclick="change('kechengjieshao')" href="javascript:;">课程简介</a></li>
        <li><a name="a" onmouseover="menu()" onmouseout="menu2()" onclick="change('jiaoxuedagang')" href="javascript:;">教学大纲</a></li>
        <li><a name="a" onmouseover="menu()" onmouseout="menu2()" onclick="change('shoukejihua')" href="javascript:;">授课计划</a></li>
        <li><a name="a" onmouseover="menu()" onmouseout="menu2()" onclick="change('kaoshidagang')"  href="javascript:;">考试大纲</a></li>
        <li><a name="a" onmouseover="menu()" onmouseout="menu2()" onclick="change('guokaojieshao')" href="javascript:;">国考介绍</a></li>
        <li><a name="a" onmouseover="menu()" onmouseout="menu2()" onclick="change('guokaodagang')" href="javascript:;">国考大纲</a></li>
    </ul>
</div>
    <div id="kechengjieshao"  class="kechengjieshao">
        <h1>　　C语言课程介绍</h1>

    </div>
    <div class="jiaoxuedagang"  style="display: none" id="jiaoxuedagang">
        <h1>教学大纲</h1>
    </div>

    <div class="shoukejihua" style="display: none" id="shoukejihua">
        <h1>授课计划</h1>
    </div>
    <div class="kaoshidagang" style="display: none" id="kaoshidagang">
        <h1>考试大纲</h1>
    </div>
    <div class="guokaojieshao"  style="display: none" id="guokaojieshao">
        <h1>国考介绍</h1>
    </div>
    <div class="guokaodagang" style="display: none"  id="guokaodagang">
        <h1>国考大纲</h1>
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
    .kechengjieshao,.guokaodagang,.jiaoxuedagang,.kaoshidagang,.shoukejihua,.guokaojieshao{
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
        if(val=="kechengjieshao"|| id=="1"){
              $('kechengjieshao').style.display="block";
              $('guokaodagang').style.display="none";
              $('jiaoxuedagang').style.display="none";
              $('kaoshidagang').style.display="none";
              $('shoukejihua').style.display="none";
              $('guokaojieshao').style.display="none";

        }else if(val=="guokaodagang" || id=="6"){
            $('kechengjieshao').style.display="none";
            $('guokaodagang').style.display="block";
            $('jiaoxuedagang').style.display="none";
            $('kaoshidagang').style.display="none";
            $('shoukejihua').style.display="none";
            $('guokaojieshao').style.display="none";

        }else if(val=="jiaoxuedagang"||id=="2"){
            $('kechengjieshao').style.display="none";
            $('guokaodagang').style.display="none";
            $('jiaoxuedagang').style.display="block";
            $('kaoshidagang').style.display="none";
            $('shoukejihua').style.display="none";
            $('guokaojieshao').style.display="none";

        }else if(val=="kaoshidagang"||id=="4"){
            $('kechengjieshao').style.display="none";
            $('guokaodagang').style.display="none";
            $('jiaoxuedagang').style.display="none";
            $('kaoshidagang').style.display="block";
            $('shoukejihua').style.display="none";
            $('guokaojieshao').style.display="none";

        }else if(val=="shoukejihua"||id=="3"){
            $('kechengjieshao').style.display="none";
            $('guokaodagang').style.display="none";
            $('jiaoxuedagang').style.display="none";
            $('kaoshidagang').style.display="none";
            $('shoukejihua').style.display="block";
            $('guokaojieshao').style.display="none";

        }else if(val=="guokaojieshao"||id=="5"){
            $('kechengjieshao').style.display="none";
            $('guokaodagang').style.display="none";
            $('jiaoxuedagang').style.display="none";
            $('kaoshidagang').style.display="none";
            $('shoukejihua').style.display="none";
            $('guokaojieshao').style.display="block";
        }
        id="7";
    }
    function menu(){
        var a=document.getElementsByName("a");
        for(var i=0;i<6;i++){
            a[i].style.width=200+"px";
        }
    }
    function menu2(){
        var a=document.getElementsByName("a");
        for(var i=0;i<6;i++){
            a[i].style.width=55+"px";
        }
    }
    function $(id){
        return document.getElementById(id);
    }
</script>
