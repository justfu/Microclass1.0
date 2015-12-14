<?php
class  SqlHelper{
    private $host;//
    private $username;
    private $pwd;
    private $link;
    private $db;

    public function __construct(){
        $arr=parse_ini_file("db.ini");
        $this->host=$arr['host'];
        $this->username=$arr['username'];
        $this->pwd=$arr['pwd'];
        $this->db=$arr['db'];
        $this->link=new mysqli($this->host,$this->username,$this->pwd,$this->db) or die('连接数据库失败'.mysql_error());
        $this->link->query("set names utf8");
    }

    public function dql($sql){
        return $this->link->query($sql);
    }

    public function dml($sql){
        $res=$this->link->query($sql);
        if($res){
              if($this->link->affected_rows>0){
                  return 1;//执行成功
              }else{
                  return 0;//没有影响到行
              }
        }else{
            return 2;//执行失败
        }
    }

    public function res_array($sql){
        $arr=array();
        $res=$this->link->query($sql);
        while($row=$res->fetch_row()){
            foreach($row as $key=>$values){
                $arr[]=$values;
            }
        }
        $res->free();
        return $arr;
    }
    public function res_array_erwei($sql){
        $arr=array();
        $a=0;
        $res=$this->link->query($sql);
        while($row=$res->fetch_row()){
            foreach($row as $key=>$values){
                $arr[$a][$key]=$values;
            }
            $a++;
        }
        $res->free();
        return $arr;
    }
    public function close(){
        $this->link->close();
    }
}