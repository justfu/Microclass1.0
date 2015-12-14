<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/12/8
 * Time: 22:40
 */
require_once './conn/sqlHelper.class.php';
class BBS{
    public function get_question(){
        $sqlHelper=new SqlHelper();
        $sql="select * from bbs limit 0,5";
        $arr=$sqlHelper->res_array_erwei($sql);
        $sqlHelper->close();
        return $arr;
    }

    public function insert_question($content,$username,$sno){
        $sqlHelper=new SqlHelper();
        $content=str_replace("<","\"",$content);
        $content=str_replace(">","\"",$content);
        $time=date('Y-m-d h:m:s');
        $sql="insert into bbs(content,username,date) values ('$content','$username','$time','$sno')";
        $res=$sqlHelper->dml($sql);
        $sqlHelper->close();
        return $res;
    }
    public function get_img($sno){
        $sqlHelper=new SqlHelper();
        $sql="select img from student where sno='$sno'";
        $res=$sqlHelper->res_array($sql);
        $sqlHelper->close();
        return $res;
    }

    public function get_fenye_page($pagenow){
        $sqlHelper=new SqlHelper();
        $sql="select count(*) from bbs";
        $res=$sqlHelper->res_array($sql);
        $rowcounts=$res[0];//获得总行数
        $pagecount=ceil($rowcounts/6);//获得总页面数
        $sql2="select * from bbs ORDER BY id DESC limit ".($pagenow-1)*$pagecount.","."6";
        $res2=$sqlHelper->res_array_erwei($sql2);
        $sqlHelper->close();
        return $res2;

    }
    public function get_counts(){
        $sqlHelper=new SqlHelper();
        $sql="select count(*) from bbs";
        $res=$sqlHelper->res_array($sql);
        $rowcounts=$res[0];//获得总行数
        $pagecount=ceil($rowcounts/6);//获得总页面数
        return $pagecount;
    }

    /*
     * id:要回复内容帖子的id号
     * */
    public function insert_reply($bbs_id,$reply_user_name,$reply_user_sno,$reply_content){//插入回复的内容
         $sqlHelper=new SqlHelper();
         $reply_content=str_replace("<","\"",$reply_content);//除去c语言里面可能带有的会影响显示的符号
         $reply_content=str_replace(">","\"",$reply_content);
         $time=date('Y-m-d h:m:s');
         $sql="insert into reply(bbs_id,reply_user_name,reply_user_sno,reply_content,reply_time) VALUES ('$bbs_id','$reply_user_name','$reply_user_sno','$reply_content','$time')";
        $res=$sqlHelper->dql($sql);
         $sqlHelper->close();
         return $res;
    }

    public function get_reply($bbs_id){
        $sqlHelper=new SqlHelper();
        $sql="select * from reply where bbs_id=$bbs_id";
        $res=$sqlHelper->res_array_erwei($sql);
        $sqlHelper->close();
        return $res;
    }
}