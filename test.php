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
    echo "<div style='border: 1px #bebebe solid;padding-top:30px;padding-bottom: 30px;float: left;'>";
    echo "<div style='width: 80px;height: 80px;text-align: center'>";
    echo "<img src='./user_img/".$res2[$i][0]."' width='80px' height='80px' style='border:1px #CCCCCC solid'/>";
    echo $res[$i][2]."<br/>";
    echo "</div>";

    echo "<div style='margin-left: 200px;float: left'>";
    echo $res[$i][1]."</br/>";
    echo "</div>";


    echo "<span style='float:right;color: white;font-size: 15px;'>";
    echo "提问时间".$res[$i][3]."<br/>";
    echo "<a href='replyprocess.php' style='float: right;margin-right: 20px;padding-bottom: 20px;'>回复</a>";
    echo "</span>";



    $reply_arr=$bbs->get_reply($res[$i][0]);
    for($j=0;$j<count($reply_arr);$j++){

        echo "<div style='float: left;margin-top: 20px;'>";

        echo "<div style='float:right;width: 80px;height: 80px;text-align: center'>";

        $img=$bbs->get_img($reply_arr[$j][3]);
        if(empty($img)){
            $img[0]="5.png";
        }
        if(empty($reply_arr[$j][2])){
            $reply_arr[$j][2]="访客";
        }
        echo "<img src='./user_img/".$img[0]."' width='60px' height='60px' style='border:1px #CCCCCC solid'/>";
        echo $reply_arr[$j][2]."<br/>";
        echo "</div>";


        echo "<div style='margin-left: 200px;float: left'>";
        echo $reply_arr[$j][4]."</br>";
        echo "</div>";

        echo "<span style='float:right;color: white;font-size: 15px;'>";
        echo "提问时间".$reply_arr[$i][5]."<br/>";
        echo "<a href='replyprocess.php' style='float: right;margin-right: 20px;padding-bottom: 20px;'>回复</a>";
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
            echo "<a  href='test.php?pagenow=$prepage'>上一页</a>";

        }
        if($pagenow<$pagecount) {
            $nextpage=$pagenow+1;
            echo "<a href='test.php?pagenow=$nextpage'>下一页</a>";
        }
        echo "当前页第{$pagenow}页";
        ?>
</div>