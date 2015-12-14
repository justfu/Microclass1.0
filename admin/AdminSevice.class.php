<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/10/12
 * Time: 18:46
 */
require_once("../conn/SqlHelper.class.php");
class AdminSevice{

    public function CheckAdmin($id,$password){
        $sqlHelper=new SqlHelper();

        $sql="select password,name from admin where id=$id";

        $res=$sqlHelper->res_array($sql);
            if(md5($password)==$res[0]){

                return $res[1];
                exit();
            }
        $sqlHelper->close();
        return "";
    }
}