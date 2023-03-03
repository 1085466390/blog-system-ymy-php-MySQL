<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>发布话题</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
input[type="text"] {outline: none;font-size: 15px;font-weight: 500;color: #818181;padding: 5px 10px;background: #CACACA;border: 1px solid #ccc;border-radius:25px;width:250px;margin-bottom:20px;}
input[type="submit"] {background: #ff9406;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;}
input[type="reset"] {background: #ff9406;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;}
#banner{height:50px;line-height:50px;padding-left:30px;}
#banner a{text-decoration:none;color:#000;font-size:18px;}
#banner a:hover{color:#ff9406;}
</style>
<script type="text/javascript">
function checkinput(){
	if(document.getElementById("top").value==""){
		alert("请输入话题名！");
		document.getElementById("top").focus();
		return false;
	}
	if(document.getElementById("con").value==""){
		alert("请输入话题导语！");
		document.getElementById("con").focus();
		return false;
	}
	if(document.getElementById("tpclass").value=="-1"){
		alert("请选择话题类别！");
		document.getElementById("tpclass").focus();
		return false;
	}
	return true;
}
</script>
</head>

<body onload='getProvince()'>
<div id="banner"><a href="javascript:history.back();">返回</a></div>

<div id="content" style="text-align:justify;padding-top:40px;padding-bottom:20px;">
<form action="check_sdtopic.php" method="post" id="form_sdtopic">
<div style="width:600px;border:1px #000 dashed;margin-left:300px;padding-top:20px;padding-bottom:20px;padding-left:100px;padding-right:100px;border-radius:20px;background-color:rgba(255,255,255,0.3);">
	<div>话题名：<input type="text" name="top" id="top"></div>
    <div>话题导语：<input type="text" name="con" id="con"></div>
    <div>话题类别：
    <?php
	include("conn.php");
	$sql = mysqli_query($conn,"select * from tb_tk_topicclass");
	?>
    <select id="classid" name="classid">
    	<option value="-1">请选择话题类别</option>
    <?php
        while($info=mysqli_fetch_array($sql)){
			?>
		<option value="<?php echo $info['tpclass_id']; ?>" <?php if(isset($_GET['clid'])){if($_GET['clid']==$info['tpclass_id']){?> selected <?php }} ?>><?php echo $info['tpclass_con']; ?></option>
        <?php
		}
		?>
	</select>
    </div>
</div>
	<div style="width:600px;margin-left:300px;padding-top:20px;padding-bottom:20px;padding-left:100px;padding-right:100px;">
	    <input type="reset" value="重置" name="submit1" style="margin-right:30px;margin-left:100px;">
        <input type="submit" value="发布" name="submit" onClick="return checkinput();">
    </div>
</form>
</div>
<?php mysqli_close($conn); ?>
<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>
</body>
</html>