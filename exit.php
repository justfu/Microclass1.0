<?php
/**
 * Created by PhpStorm.
 * User: 宏
 * Date: 2015/11/29
 * Time: 11:59
 */
session_start();
unset($_SESSION['name']);
unset($_SESSION['sno']);
header("location:index.php");