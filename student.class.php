<?php
require_once './conn/SqlHelper.class.php';
class Student{
    public function addstudent($sno,$usernc,$truename,$pwd,$email,$tel,$major){
          $SqlHelper=new SqlHelper();
          $img=rand(1,4).".png";
          $sql="insert into student values ('$sno','$usernc','$truename','$pwd','$email','$tel','$major','$img')";
          $res=$SqlHelper->dml($sql);
          $SqlHelper->close();
          return $res;
    }

    public function checksno($sno){
    	$sqlHelper=new SqlHelper();
    	$sql="select count(*) from student where sno=$sno";
    	$res=$sqlHelper->dql($sql);
        $row=$res->fetch_array();
        $sqlHelper->close();
    	if($row[0]==1){
    		return 0;//检查到数据库已经存在用户
    	}else{
    		return 1;//可以注册
    	}

    }

    public function get_user_info($sno){
        $sqlHelper=new SqlHelper();
        $sql="select sno,usernc,truename,email,tel,major,img from student where sno='$sno'";
        $res=$sqlHelper->res_array($sql);
        $sqlHelper->close();
        return $res;


    }
}