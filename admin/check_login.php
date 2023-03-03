<?php
include("conn.php");
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
$name=$_POST['name'];
$pwd=$_POST['pwd'];

$sql = mysqli_query("select * from tb_tk_admin where admin_name='$name'",$conn);
$info = mysqli_fetch_array($sql);

if(!$info){
	echo "<script>alert('该用户名不存在！');history.back();</script>";
}else{
	if($info['admin_pwd']==$pwd){
		if(!session_id()){session_start();}
        $_SESSION['adminid']=$info['admin_id'];
		$_SESSION['adminname']=$info['admin_name'];
		echo "<script>alert('".$name."用户登录成功！');window.location='manage.php';</script>";
	}else{
		echo "<script>alert('密码错误！');history.back();</script>";
	}
}

mysqli_close($conn);
?>