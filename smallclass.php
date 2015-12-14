<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/11/29
 * Time: 17:29
 */
require_once 'navigator.php';

?>
<script type="text/javascript" src="./syntaxhighlighter/scripts/shCore.js"></script>
<script type="text/javascript" src="./syntaxhighlighter/scripts/shBrushCpp.js"></script>
<link type="text/css" rel="stylesheet" href="./syntaxhighlighter/styles/shCore.css"/>
<script type="text/javascript">SyntaxHighlighter.all();</script>
<div class="box">
    <div id="kecheng" class="kecheng_danye">
        <ul>
            <li><a name="a" onmouseover="menu()" onmouseout="menu2()" onclick="change('weikevideo')" href="javascript:;">微课视频</a></li>
            <li><a name="a" onmouseover="menu()" onmouseout="menu2()"  onclick="change('zhishidianjinjie')" href="javascript:;">知识点精解</a></li>
            <li><a name="a" onmouseover="menu()" onmouseout="menu2()"  onclick="change('zhishidianceshi')" href="javascript:;">知识点测试</a></li>
            <li><a name="a" onmouseover="menu()" onmouseout="menu2()"  onclick="change('mokaomonishiti')"  href="javascript:;">末考模拟试题库</a></li>
            <li><a name="a" onmouseover="menu()" onmouseout="menu2()"  onclick="change('zhoukaomonishiti')" href="javascript:;">周考模拟试题库</a></li>
        </ul>
    </div>

    <div id="weikevideo"  class="weikevideo">
        <h1>   微课视频</h1>
        <video src="../aa.mkv"  width="1000" height="600" controls="controls">
            Your browser does not support the video tag.
        </video>
        <select onchange="javascript:vidio.src=this.value">
            <option value="#">***切换视频***</option>
            <option value="http://player.youku.com/player.php/sid/XNTIyNTY2MjI0/v.swf">第一套试题</option>
            <option value="smallclass.php?id=3&exam=2">第二套试题</option>
            <option value="smallclass.php?id=3&exam=3">第三套试题</option>
            <option value="smallclass.php?id=3&exam=4">第四套试题</option>
            <option value="smallclass.php?id=3&exam=5">第五套试题</option>
            <option value="smallclass.php?id=3&exam=6">第六套试题</option>
            <option value="smallclass.php?id=3&exam=7">第七套试题</option>
            <option value="smallclass.php?id=3&exam=8">第八套试题</option>
            <option value="smallclass.php?id=3&exam=9">第九套试题</option>
            <option value="smallclass.php?id=3&exam=10">第十套试题</option>
        </select>
    </div>
    <div class="zhishidianjinjie"  style="display: none" id="zhishidianjinjie">
        <h1>知识点精解</h1>
    </div>

    <div class="zhishidianceshi" style="display: none" id="zhishidianceshi">
        <h1>知识点测试</h1>
        <div style="position: relative;right: -350px">
        <h2>换套试题再做做</h2><select onchange="javascript:location.href=this.value">
            <option value="#">***换一套题目试试***</option>
            <option value="smallclass.php?id=3&exam=1">第一套试题</option>
            <option value="smallclass.php?id=3&exam=2">第二套试题</option>
            <option value="smallclass.php?id=3&exam=3">第三套试题</option>
            <option value="smallclass.php?id=3&exam=4">第四套试题</option>
            <option value="smallclass.php?id=3&exam=5">第五套试题</option>
            <option value="smallclass.php?id=3&exam=6">第六套试题</option>
            <option value="smallclass.php?id=3&exam=7">第七套试题</option>
            <option value="smallclass.php?id=3&exam=8">第八套试题</option>
            <option value="smallclass.php?id=3&exam=9">第九套试题</option>
            <option value="smallclass.php?id=3&exam=10">第十套试题</option>
        </select>
        </div>
        <?php
        require_once 'selectService.class.php';
        $paper_id=1;
        if(isset($_GET['exam'])){
            $paper_id=$_GET['exam'];
        }

        $selectService=new SelectService();
        $arr=$selectService->get_question_select($paper_id);//选择题
        $arr_tiankong=$selectService->get_question_tiankong($paper_id);//填空题
        $arr_gaicuo=$selectService->get_question_gaicuo($paper_id);//改错题

        ?>
        <div class="question">
            <form method="post" action="check_answer.php">

                <div class='select_question' id="select_question">
            <?php
            $x=1;
            echo "<h2>单项选择题</h2>";
            for($i=0;$i<count($arr);$i++) {
                    echo "<div class='question_name'><h3>"."{$x}".","."{$arr[$i][0]}"."</h3></div>";
                    echo " <div onclick=document.getElementById('select{$i}').innerText='参考答案：{$arr[$i][5]}' style='float: left;width: 100px;height: 100px;background-color:#BEBEBE;position: absolute;right: -200px;'><span style='font-size:30px' id='select{$i}'></span></div>";
                    echo "<div class='select_A'>A:{$arr[$i][1]}</div>";
                    echo "<div class='select_B'>B:{$arr[$i][2]}</div>";
                    echo "<div class='select_C'>C:{$arr[$i][3]}</div>";
                    echo "<div class='select_D'>D:{$arr[$i][4]}</div>";
                    echo "A:　<input type='radio' name='user_answer{$i}'>";
                    echo "　　B:　<input type='radio' name='user_answer{$i}'>";
                    echo "　　C:　<input type='radio' name='user_answer{$i}'>";
                    echo "　　D:　<input type='radio' name='user_answer{$i}'>";
                $x++;
                }
            ?>
                    <div onclick="next('1')"  class="next_button" style="">下一页</div>
                </div>


            <div class="tiankong" id="tiankong">
                <?php
            $y=1;
            echo "<h2>填空题</h2>";
            for($i=0;$i<count($arr_tiankong);$i++) {
                $str=$arr_tiankong[$i][1];
                echo " <div onclick=document.getElementById('tiankong{$i}').innerText='参考答案{$arr_tiankong[$i][2]}' style='float: left;width: 100px;height: 200px;background-color:#BEBEBE;position: absolute;right: -200px;'><span style='font-size:30px' id='tiankong{$i}'></span></div>";
                echo "<div class='question_name'><h3>"."{$y}".","."{$arr_tiankong[$i][0]}"."</h3></div>";
                echo "<pre class='brush: cpp;'>"."$str"."</pre>";
                echo "请输入你的答案:有多行请用;分隔<input type='text' name='user_answer{$i}'>";
                $y++;
            }
            ?>
                <div onclick="zuoleft('2')"  class="next_button" style="">上一页</div>
                <div onclick="next('2')"  class="next_button" style="">下一页</div>
            </div>

                <div class="gaicuo" id="gaicuo">
                    <?php
                    $y=1;
                    echo "<h2>改错题</h2>";
                    for($i=0;$i<count($arr_gaicuo);$i++) {
                        echo "<div class='question_name'><h3>"."{$y}".","."{$arr_gaicuo[$i][0]}"."</h3></div>";
                        echo "<pre class='brush: cpp;'>"."{$arr_gaicuo[$i][1]}"."</pre>";
                        echo "<div id='gaicuo{$i}' style='display:none;position: relative;top:-380px;left: 700px;height:0px;width: 300px'><pre class='brush: cpp;'>"."{$arr_gaicuo[$i][2]}"."</pre></div>";
                        echo "请输入你的答案:有多行请用;分隔<input type='text' name='user_answer{$i}'>";
                        echo "<div  class='show_daan' onclick=gaicuo{$i}.style.display='block'>显示答案</div>";
                        $y++;
                    }
                    ?>
                    <div onclick="zuoleft('1')"  class="next_button" style="">上一页</div>
                </div>


            </form>
        </div>
    </div>
    <div class="mokaomonishiti" style="display: none" id="mokaomonishiti">
        <h1>末考模拟试题库</h1>
    </div>
    <div class="zhoukaomonishiti"  style="display: none" id="zhoukaomonishiti">
        <h1>周考模拟试题库</h1>
    </div>
</div>
<div onclick="javascript:scroll(0,170)" style="width:45px;height:45px;position: fixed;bottom: 50px;right: 50px;cursor: pointer">
<img width="45px" height="45px" src="./img/gototop.png"/>
</div>
<?php require_once 'footer.php';?>

<style type="text/css">
    .show_daan{
        background: none repeat scroll 0 0 white;
        width:80px;
        height:42px;
        border-width: 2px;
        font-size: 17px;
        color: #0000ff;
        font-weight: 500;
        border-radius: 6px;
        cursor:pointer;
        text-align: center;

    }
    .tiankong,.gaicuo{
        display: none;
    }
    input[type=text]{
        width: 200px;
        height: 20px;
    }
    .next_button{
        background: none repeat scroll 0 0 white;
        width:107px;
        height:42px;
        border-width: 2px;
        font-size: 17px;
        color: #0000ff;
        font-weight: 500;
        border-radius: 6px;
        cursor:pointer;
        text-align: center;
        line-height: 35px;
        margin-top: 50px;
    }
    .question{
        float: left;
    }
    .question_name{
        font-size: 16px;
    }
    .question ul{
        font-size: 16px;
    }
    .question ul li{
        margin-top: 20px;
    }
    .box{
        margin-top: 0px;
        margin-left: 0px;
        width: 1349px;
        height: 10000px;
        background-image: url("./img/bg3.gif");
        background-repeat: repeat;
    }
    .weikevideo,.zhishidianjinjie,.zhishidianceshi,.mokaomonishiti,.zhoukaomonishiti{
        position: absolute;
        top:300px;
        left: 350px;
        width: 800px;
        height: 800px;
        background: transparent;
    }
    .weikevideo{
        left: 160px;
    }
    .zhishidianceshi{
        width: 600px;
        position: absolute;
        top:230px;
        left: 300px;
        height:10000px;
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
        background-color:#61BBD2;
    }
</style>
<script type="text/javascript">
    var id="<?php if(isset($_GET['id'])){
    $id=$_GET['id'];
    echo $id;}?>";
    change();
    function change(val){
        if(val=="weikevideo"|| id=="1"){
            $('weikevideo').style.display="block";
            $('zhishidianjinjie').style.display="none";
            $('zhishidianceshi').style.display="none";
            $('mokaomonishiti').style.display="none";
            $('zhoukaomonishiti').style.display="none";

        }else if(val=="zhishidianjinjie" || id=="2"){
            $('weikevideo').style.display="none";
            $('zhishidianjinjie').style.display="block";
            $('zhishidianceshi').style.display="none";
            $('mokaomonishiti').style.display="none";
            $('zhoukaomonishiti').style.display="none";

        }else if(val=="zhishidianceshi"||id=="3"){
            $('weikevideo').style.display="none";
            $('zhishidianjinjie').style.display="none";
            $('zhishidianceshi').style.display="block";
            $('mokaomonishiti').style.display="none";
            $('zhoukaomonishiti').style.display="none";

        }else if(val=="mokaomonishiti"||id=="4"){
            $('weikevideo').style.display="none";
            $('zhishidianjinjie').style.display="none";
            $('zhishidianceshi').style.display="none";
            $('mokaomonishiti').style.display="block";
            $('zhoukaomonishiti').style.display="none";

        }else if(val=="zhoukaomonishiti"||id=="5"){
            $('weikevideo').style.display="none";
            $('zhishidianjinjie').style.display="none";
            $('zhishidianceshi').style.display="none";
            $('mokaomonishiti').style.display="none";
            $('zhoukaomonishiti').style.display="block";
        }
        id="7";
    }
    function next(val){
        scrollTo(0,0);
        if(val=="1") {
            $('select_question').style.display = "none";
            $('tiankong').style.display = "block";
            $('gaicuo').style.display = "none";
        }
        if(val=="2"){
            $('select_question').style.display = "none";
            $('tiankong').style.display = "none";
            $('gaicuo').style.display = "block";
        }
    }
    function menu(){
        var a=document.getElementsByName("a");
        for(var i=0;i<5;i++){
            a[i].style.width=200+"px";
        }
    }
    function menu2(){
        var a=document.getElementsByName("a");
        for(var i=0;i<5;i++){
            a[i].style.width=55+"px";
        }
    }
    function show_answer(val){
        alert('da');
        if(val==0){
        }
    }
    function zuoleft(val){
        scrollTo(0,0);
        if(val=="1"){
            $('select_question').style.display = "none";
            $('tiankong').style.display = "block";
            $('gaicuo').style.display = "none";
        }
        if(val=="2"){
            $('select_question').style.display = "block";
            $('tiankong').style.display = "none";
            $('gaicuo').style.display = "none";
        }
    }
    function $(id){
        return document.getElementById(id);
    }
</script>

