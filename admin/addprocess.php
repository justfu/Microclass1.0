<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/12/4
 * Time: 16:11
 */
require_once 'question.class.php';
$question=new Question();
$class=$_POST['form_class'];
if($class=="select"){
    $paper_id=$_POST['paper_id'];
    $select_name=$_POST['select_name'];
    $select_A=$_POST['select_A'];
    $select_B=$_POST['select_B'];
    $select_C=$_POST['select_C'];
    $select_D=$_POST['select_D'];
    $answer=$_POST['answer'];
    $res=$question->insert_select_question($select_name,$select_A,$select_B,$select_C,$select_D,$answer,$paper_id);
    if($res){
        if($res==1){
            header("location:ok.php");
        exit;}
    }else{
        header("location:error.php");
    }
}else if($class=="filling"){
    $paper_id=$_POST['paper_id'];
    $filling_name=$_POST['filling_name'];
    $filling_code=$_POST['filling_code'];
    $filling_answer=$_POST['filling_answer'];
    $res=$question->insert_filling_question($filling_name,$filling_code,$filling_answer,$paper_id);
    if($res){
        if($res==1){
            header("location:ok.php");
            exit;
        }
    }else{
        header("location:error.php");
    }
}else if($class=="correct"){
    $paper_id=$_POST['paper_id'];
    $correct_name=$_POST['correct_name'];
    $correct_code=$_POST['correct_code'];
    $true_code=$_POST['true_code'];
    $run_answer=$_POST['run_answer'];
    $res=$question->insert_correct_question($correct_name,$correct_code,$true_code,$run_answer,$paper_id);
    if($res){
        if($res==1){
            header("location:ok.php");
            exit;}
    }else{
        header("location:error.php");
    }
}