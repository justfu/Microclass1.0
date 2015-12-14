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
            <li><a name="a" onmouseover="menu()" onmouseout="menu2()" onclick="change('changjianwenti')" href="javascript:;">常见问题</a></li>
            <li><a name="a" onmouseover="menu()" onmouseout="menu2()"  onclick="change('youwenbida')" href="javascript:;">有问必答</a></li>
            <li><a name="a" onmouseover="menu()" onmouseout="menu2()"  onclick="change('zhuantiwenzhang')" href="javascript:;">专题文章</a></li>
            <li><a name="a" onmouseover="menu()" onmouseout="menu2()"  onclick="change('kaoshipingtai')"  href="javascript:;">考试平台</a></li>
        </ul>
    </div>

    <div id="changjianwenti"  class="changjianwenti">
        <h1>   常见问题</h1>

    </div>
    <div class="youwenbida"  style="display: none;margin-left: 250px;margin-top: 100px" id="youwenbida">
        <h1>有问必答   ：留下你的问题必回为你解答</h1>
        <?php
        require_once 'bbs.class.php';
        $bbs=new BBS();
        if(isset($_GET['pagenow'])){
            $pagenow=$_GET['pagenow'];
        }else{
            $pagenow=1;
        }
        $res=$bbs->get_fenye_page($pagenow);
        for($i=0;$i<count($res);$i++){
            $res2[$i]=$bbs->get_img($res[$i][4]);
            if(empty($res2[$i])){
                $res2[$i][0]="5.png";
            }
        }
        for($i=0;$i<count($res);$i++){
            echo "<div style='border: 1px #bebebe solid;width:850px;padding-top:30px;padding-bottom: 30px;float: left;'>";
            echo "<div style='width: 80px;height: 80px;text-align: center'>";
            echo "<img src='./user_img/".$res2[$i][0]."' width='80px' height='80px' style='border:1px #CCCCCC solid'/>";
            echo $res[$i][2]."<br/>";
            echo "</div>";

            echo "<div style='margin-left: 200px;float: left'>";
            echo $res[$i][1]."</br/>";
            echo "</div>";


            echo "<span style='float:right;color: white;font-size: 15px;'>";
            echo "提问时间".$res[$i][3]."<br/>";
            echo "<a onclick=document.getElementById('reply{$i}').style.display='block' style='cursor:pointer;float: right;font-size:20px; color:black;margin-right: 20px;padding-bottom: 20px;'>回复</a>";
            echo "</span>";

            echo "<form action='replyprocess.php' method='post' id='reply{$i}' style='display: none;margin-left: 90px;'>";
            echo "<input type='hidden' name='bbs_id' value='{$res[$i][0]}'>";
            echo "<textarea name='reply_content' cols='100' rows='10'>";
            echo "</textarea>";
            echo "<input style='margin-left: 650px;margin-top: 30px;' type='submit' value='提交' />";
            echo "</form>";


            $reply_arr=$bbs->get_reply($res[$i][0]);
            for($j=0;$j<count($reply_arr);$j++){

                echo "<div style='float: left;margin-top: 50px;'>";

                echo "<div style='float:right;margin-right:0px;width: 80px;height: 80px;text-align: center'>";

                $img=$bbs->get_img($reply_arr[$j][3]);
                if(empty($img)){
                    $img[0]="5.png";
                }
                if(empty($reply_arr[$j][2])){
                    $reply_arr[$j][2]="访客";
                }
                echo "<img src='./user_img/".$img[0]."' width='60px' height='60px' style='border:1px #CCCCCC solid'/>";
                echo "<br/>".$reply_arr[$j][2];
                echo "</div>";


                echo "<div style='margin-left: 200px;float: left'>";
                echo $reply_arr[$j][4]."</br>";
                echo "</div>";

                echo "<span style='float:right;margin-top:50px;margin-right:0px;color: white;font-size: 15px;'>";
                echo "回答时间".$reply_arr[$j][5]."<br/>";
                echo "</span>";
                echo "</div>";
            }
            echo "</div>";


        }
        ?>
        <div style='margin-left: 500px;margin-top: 50px;'>
            <?php
            $pagecount=$bbs->get_counts();
            if($pagenow>1){
                $prepage=$pagenow-1;
                echo "<a  href='interact.php?id=2&pagenow=$prepage'>上一页</a>";

            }
            if($pagenow<$pagecount) {
                $nextpage=$pagenow+1;
                echo "<a href='interact.php?id=2&pagenow=$nextpage'>下一页</a>";
            }
            echo "当前页第{$pagenow}页";
            ?>
        </div>

        <div style="margin-left: 170px;margin-top: 200px;">
            <?php if(isset($_SESSION['sno'])){
                $res3=$bbs->get_img($_SESSION['sno']);
                $name=$_SESSION['name'];
                }else{
                $res3[0]="5.png";
                $name="访客身份";
            }?>
            <div style='width: 80px;height: 80px;text-align: center'>
            <img src='./user_img/<?php echo $res3[0];?>' width='80px' height='80px' style='border:1px #CCCCCC solid'/>
            <?php echo $name;?>
            </div>
                <h2 style="margin-left: 300px;">写下你的问题</h2>
            <form action="bbsprocess.php" method="post">
        <textarea name="tiwen" cols="100" rows="10">
        </textarea>
        <input style="margin-left: 650px;margin-top: 30px;" type="submit" value="提交" />
            </form>
    </div>
        </div>

    <div class="zhuantiwenzhang" style="display: none" id="zhuantiwenzhang">
        <h1>专题文章</h1>
    </div>
    <div class="kaoshipingtai" style="display: none" id="kaoshipingtai">
        <h1>考试平台</h1>
    </div>
</div>
<div class="foo">
<?php require_once 'footer.php';?>
</div>
<style type="text/css">
    .box{
        margin-top: 0px;
        margin-left: 0px;
        width: 1349px;
        /*min-height: 500px;*/
        /*height: auto;*/
        border: #5DAAD6 solid;
        background-image: url("./img/bg3.gif");
        /*background-color: whitesmoke;*/
        background-repeat: repeat;
        float: left;
    }
    .changjianwenti,.youwenbida,.zhuantiwenzhang,.kaoshipingtai,.zhoukaomonishiti{
        /*position: absolute;*/
        top:300px;
        left: 350px;
        width: 850px;
        background: transparent;
    }
    .kecheng_danye{
        /*position: relative;*/
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
        if(val=="changjianwenti"|| id=="1"){
            $('changjianwenti').style.display="block";
            $('youwenbida').style.display="none";
            $('zhuantiwenzhang').style.display="none";
            $('kaoshipingtai').style.display="none";

        }else if(val=="youwenbida" || id=="2"){
            $('changjianwenti').style.display="none";
            $('youwenbida').style.display="block";
            $('zhuantiwenzhang').style.display="none";
            $('kaoshipingtai').style.display="none";

        }else if(val=="zhuantiwenzhang"||id=="3"){
            $('changjianwenti').style.display="none";
            $('youwenbida').style.display="none";
            $('zhuantiwenzhang').style.display="block";
            $('kaoshipingtai').style.display="none";

        }else if(val=="kaoshipingtai"||id=="4"){
            $('changjianwenti').style.display="none";
            $('youwenbida').style.display="none";
            $('zhuantiwenzhang').style.display="none";
            $('kaoshipingtai').style.display="block";

        }
        id="5";
    }
    function menu(){
        var a=document.getElementsByName("a");
        for(var i=0;i<4;i++){
            a[i].style.width=200+"px";
        }
    }
    function menu2(){
        var a=document.getElementsByName("a");
        for(var i=0;i<4;i++){
            a[i].style.width=55+"px";
        }
    }
    function $(id){
        return document.getElementById(id);
    }
</script>
