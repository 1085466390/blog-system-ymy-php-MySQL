<?php 
include("conn.php"); 
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
$username=$_POST['username'];

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
$uploadfile=$_POST['user_upic'];
}

$user_uid = $_POST['user_uid'];

$sql1 = mysqli_query($conn,"update tb_tk_user set user_uname='$username',user_upic='$uploadfile',user_uword='$uword',user_ucard='$ucard',user_tname='$tname',user_phone='$phone',user_locate='$locate',user_sex='$sex',user_pwq='$pwq',user_pwa='$pwa' where user_uid='$user_uid'");



if($sql1){
	echo "<script>alert('修改个人信息成功！');window.location='personal.php?state=3&uid=$user_uid'</script>";
}else{
	echo "<script>alert('很抱歉，修改个人信息失败，请重试！');history.back();</script>";
}

mysqli_close($conn);
?>
