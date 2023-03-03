<?php
include("conn.php");
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
if(!session_id()){session_start();}

$uid=$_SESSION['uid'];
$content=$_POST['logcon'];
$time=date('Y-m-d H:i:s');
$top=$_POST['top'];
$state=1;

$count=0;
$uploadfile;
$dest_folder="upimages/"; 
$arr=array();
if(!is_dir($dest_folder)) mkdir($dest_folder,700);

for($t=0;$t<count($_FILES['uploads']['name']);$t++){
	if($_FILES['uploads']['name'][$t]==''){
		continue;
	}       
	$tp=array("image/gif","image/pjpeg","image/jpeg","image/png");
    if(!in_array($_FILES["uploads"]["type"][$t],$tp)){echo "<script>alert('文件类型错误！');history.back();</script>";}
 	$i=1;
	$exname=strtolower(substr($_FILES['uploads']['name'][$t],(strrpos($_FILES['uploads']['name'][$t],'.')+1)));
	while(true){
		if(!is_file($dest_folder.$i.".".$exname)){
			$name=$i.".".$exname;
			break;
		}
		$i++;
	}
	$uploadfile=$dest_folder.$name;	//文件路径
    move_uploaded_file($_FILES['uploads']['tmp_name'][$t], $uploadfile);
    $arr[$count]=$uploadfile;
	$count++;
}

for($i=$count;$i<3;$i++){
	$arr[$i]=NULL;
}

$sql=mysqli_query($conn,"insert into tb_tk_log (log_id,log_uid,log_content,log_pic1,log_pic2,log_pic3,log_time,log_state,log_tag,log_trans,log_com,log_store,log_topid) values (NULL,'$uid','$content','$arr[0]','$arr[1]','$arr[2]','$time','$state',0,0,0,0,'$top')");
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
if($sql){
	if($top!=""){
		$sql2=mysqli_query($conn,"update tb_tk_topic set tp_log=tp_log+1 where tp_id='$top'");
		if($sql2){
		echo "<script>alert('发布成功！');</script>";
		?>
        <script type="text/javascript">window.location="topic_con_detail.php?id=<?php echo $top?>";</script>
        <?php
		}else{
			echo "<script>alert('发布失败，请重试！');history.back();</script>";
		}
	}else{
	    echo "<script>alert('发布成功！');window.location='log.php';</script>";
	}
}else{
	echo "<script>alert('发布失败，请重试！');history.back();</script>";
}

mysqli_close($conn);
?>