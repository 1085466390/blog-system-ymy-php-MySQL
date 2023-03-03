<?php 
include("conn.php"); 

$username=$_POST['username'];
$pwd=$_POST['pwd'];
$pwq=$_POST['pwq'];
$pwa=$_POST['pwa'];

$uword=($_POST['uword']=='')?NULL:$_POST['uword'];
$tname=($_POST['tname']=='')?NULL:$_POST['tname'];
$sex=($_POST['sex']=='')?0:intval($_POST['sex']);  //男为1，女为2，未知为0
$ucard=($_POST['uid']=='')?0:intval($_POST['uid']);
$phone=($_POST['phone']=='')?0:intval($_POST['phone']);

$locate=$_POST['province'];

if($_FILES['upfile']['name']!=''){
function getname($exname){
	$dir="upimages/";
	$i=1;
	if(!is_dir($dir)){
		mkdir($dir,0777);
	}
	while(true){
		if(!is_file($dir.$i.".".$exname)){
			$name=$i.".".$exname;
			break;
		}
		$i++;
	}
	return $dir.$name;
}

$exname=strtolower(substr($_FILES['upfile']['name'],(strrpos($_FILES['upfile']['name'],'.')+1)));
$uploadfile=getname($exname);	//上传头像地址
move_uploaded_file($_FILES['upfile']['tmp_name'],$uploadfile);
}else{
$uploadfile=NULL;
}

$follow=0;
$follower=0;
$blog=0;
$friend=0;
$state=1;

$bgtime=date('Y-m-d H:i:s');

$sql1=mysqli_query($conn,"insert into tb_tk_user (user_uid,user_uname,user_upic,user_ustate,user_uword,user_ucard,user_pwd,user_tname,user_phone,user_locate,user_sex,user_pwq,user_pwa,user_bgtime,user_follow,user_follower,user_blog,user_friend) values (NULL,'$username','$uploadfile','$state','$uword','$ucard','$pwd','$tname','$phone','$locate','$sex','$pwq','$pwa','$bgtime','$follow','$follower','$blog','$friend')");

if($sql1){
	echo "<script>alert('恭喜您注册成功！');window.location='index.php';</script>";
}else{
	echo "<script>alert('很抱歉，注册失败，请重试！');history.back();</script>";
}

mysqli_close($conn);
?>
