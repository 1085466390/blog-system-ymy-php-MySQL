<?php
include("conn.php");
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
$username=$_POST['username'];
$pwd=$_POST['pwd'];

$sql = mysqli_query($conn,"select * from tb_tk_user where user_uname='$username'");
$info = mysqli_fetch_array($sql);
$test = "123";
if(!$info){
    echo "<script>alert('$info')</script>";
	echo "<script>alert('该用户名不存在！');history.back();</script>";
}else{
	if($info['user_pwd']==$pwd){
		if(!session_id()){session_start();}
        $_SESSION['uid']=$info['user_uid'];
		$_SESSION['uname']=$info['user_uname'];
		echo "<script>alert('".$username."用户登录成功！');window.location='index.php';</script>";
	}else{
		echo "<script>alert('密码错误！');history.back();</script>";
	}
}

mysqli_close($conn);
?>