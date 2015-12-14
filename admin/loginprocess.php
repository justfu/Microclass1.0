<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/10/9
 * Time: 16:36
 */   session_start();
      $code=$_POST['checkCode'];

      
      if($_SESSION['checkcode_admin']!=$code){
          header("location:login.php?error=2");
          exit();
      }
      require_once("AdminSevice.class.php");

        $cookie=$_POST['cookie'];
        $id=$_POST['id'];
        $password=$_POST['password'];

        if(empty($id)||empty($password)){
            header("location:login.php?error=1");
            exit();
        }
        if(!empty($cookie)){
            setCookie("id",$id,time()+600000);
            setCookie("password",$password,time()+60000);
        }else{
            if(!empty($_COOKIE['id'])&&!empty($_COOKIE['password'])){
                setCookie("id",$id,time()-600000);
                setCookie("password",$password,time()-60000);
            }
        }
       $AdminSevice=new AdminSevice();

        $res=$AdminSevice->CheckAdmin($id,$password);
        if($res!=""){
                session_start();
                $_SESSION['name_admin']=$res;
                header("location:admin.php");
                exit();
        }
        header("location:login.php?error=1");
        exit();

//if($id==1&&$password=='luohong'){
//    header("location:admin.php");
//    exit();
//}else{
//    header("location:login.php?error=1");
//    exit();
//}

