<?php

$username="root";
$password="Huangmq123!";
$databaseName="db_ymy";
$host="111.231.211.159:10073";
$conn=mysqli_connect($host,$username,$password,$databaseName) or die("数据库服务器连接错误！".mysqli_error());
//
///*$username="root";
//$databaseName="db_secondhand";
//$host="localhost:3306";
//$conn=mysqli_connect($host,$username) or die("数据库服务器链接错误！".mysqli_error());*/
//
//$conn1=mysqli_select_db($databaseName,$conn) or die("数据库访问错误！".mysqli_error());
////mysqli_query("set names utf8");
?>