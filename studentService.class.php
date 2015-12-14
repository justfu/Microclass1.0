<?php
require_once './conn/SqlHelper.class.php';
class StudentService{
    public function checkStudent($sno,$pwd){
        $arr_sno=array();
        $sqlHelper=new SqlHelper();
        $sql="select usernc,pwd,sno from student where sno='$sno'";
        $arr=$sqlHelper->res_array($sql);
        if($arr[1]==md5($pwd)) {
            $arr_sno[0]=$arr[0];
            $arr_sno[1]=$arr[2];
            return $arr_sno;//返回用户名
            exit;
        }
        $sqlHelper->close();
        return "";
    }
}