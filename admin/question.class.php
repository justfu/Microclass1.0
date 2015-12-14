<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/12/4
 * Time: 12:18
 */
require_once '../conn/SqlHelper.class.php';
class Question
{
    public function get_question_select($paper_id)
    {
        $sqlHelper = new SqlHelper();
        $sql = "select select_name,select_A,select_B,select_C,select_D,answer from select_question WHERE paper_id='$paper_id'";
        $arr = $sqlHelper->res_array_erwei($sql);
        $sqlHelper->close();
        return $arr;
    }

    public function get_question_tiankong($paper_id)
    {
        $sqlHelper = new SqlHelper();
        $sql = "select filling_name,filling_code,filling_answer from filling where paper_id='$paper_id'";
        $arr = $sqlHelper->res_array_erwei($sql);
        $sqlHelper->close();
        return $arr;
    }

    public function get_question_gaicuo($paper_id)
    {
        $sqlHelper = new SqlHelper();
        $sql = "select correct_name,correct_code,true_code from correct where paper_id='$paper_id'";
        $arr = $sqlHelper->res_array_erwei($sql);
        $sqlHelper->close();
        return $arr;
    }

    public function insert_select_question($select_name,$select_A,$select_B,$select_C,$select_D,$answer,$paper_id){
        $sqlHelper=new SqlHelper();
        $sql="insert into select_question(select_name,select_A,select_B,select_C,select_D,answer,paper_id) values ('$select_name','$select_A','$select_B','$select_C','$select_D','$answer','$paper_id')";

        $res=$sqlHelper->dml($sql);
        return $res;
    }
    public function insert_filling_question($filling_name,$filling_code,$filling_answer,$paper_id){
        $filling_code=str_replace("<","\"",$filling_code);
        $filling_code=str_replace(">","\"",$filling_code);
        $sqlHelper=new SqlHelper();
        $sql="INSERT INTO `weike`.`filling` (`filling_name`, `filling_code`, `filling_answer`, `paper_id`) VALUES ('$filling_name', '$filling_code', '$filling_answer', '$paper_id')";
        $res=$sqlHelper->dml($sql);
        return $res;
    }
    public function insert_correct_question($correct_name,$correct_code,$true_code,$run_answer,$paper_id){
        $sqlHelper=new SqlHelper();
        $correct_code=str_replace("<","\"",$correct_code);
        $correct_code=str_replace(">","\"",$correct_code);
        $sql="INSERT INTO `weike`.`correct` ( `correct_name`, `correct_code`, `true_code`, `run_answer`, `paper_id`) VALUES ( '$correct_name', '$correct_code', '$true_code', '$run_answer', '$paper_id')";
        $res=$sqlHelper->dml($sql);
        return $res;
    }
}