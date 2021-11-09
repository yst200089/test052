<?php
session_start();
/*
連線資料庫用的副程式
*/
$host = 'localhost:8889'; //執行DB Server 的主機
$user = 'root'; //登入DB用的DB 帳號
$pass = 'root'; //登入DB用的DB 密碼
$dbName = 'test'; //使用的資料庫名稱
/* $db 即為未來執行SQL指令所使用的物件 */
$db = mysqli_connect($host, $user, $pass, $dbName) or die('Error with MySQL connection'); //跟MyMSQL連線並登入

mysqli_query($db,"SET NAMES utf8"); //設定編碼為 unicode utf8

// 用身份來表達權限
function checkAccessRole($reqRole){
    if (isset($_SESSION["role"]) && $_SESSION["role"] == $reqRole){
        return True;
    } else {
        return False;
    }
}
// 用數字來表達權限
function checkAccessLevel($reqLevel){
    if (isset($_SESSION["level"]) && $_SESSION["level"] >= $reqLevel){
        return True;
    } else {
        return False;
    }
}
?>