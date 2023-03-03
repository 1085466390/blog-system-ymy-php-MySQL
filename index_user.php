<?php
if(!session_id()){session_start();}
if(!isset($_SESSION['uid'])){
    include("login.php");
}else{
	include("logged.php");
}
?>