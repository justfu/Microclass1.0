<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/12/3
 * Time: 11:14
 */
require_once './conn/SqlHelper.class.php';
class SelectService{
    public function get_question_select($paper_id)
    {
        $sqlHelper = new SqlHelper();
        $sql = "select select_name,select_A,select_B,select_C,select_D,answer from select_question WHERE paper_id=$paper_id";
        $arr = $sqlHelper->res_array_erwei($sql);
        $sqlHelper->close();
        return $arr;
    }

    public function get_question_tiankong($paper_id){
        $sqlHelper=new SqlHelper();
        $sql="select filling_name,filling_code,filling_answer from filling where paper_id='$paper_id'";
        $arr=$sqlHelper->res_array_erwei($sql);
        $sqlHelper->close();
        return $arr;
    }

    public function get_question_gaicuo($paper_id){
        $sqlHelper=new SqlHelper();
        $sql="select correct_name,correct_code,true_code from correct where paper_id='$paper_id'";
        $arr=$sqlHelper->res_array_erwei($sql);
        $sqlHelper->close();
        return $arr;
    }
}
