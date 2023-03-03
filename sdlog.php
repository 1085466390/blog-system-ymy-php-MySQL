<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>发布博文</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
input[type="text"] {outline: none;font-size: 15px;font-weight: 500;color: #818181;padding: 5px 10px;background: #CACACA;border: 1px solid #ccc;border-radius:25px;width:250px;margin-bottom:20px;}
input[type="submit"] {background: #ff9406;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;}
input[type="reset"] {background: #ff9406;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;}
input[type="file"] {margin-bottom:10px;}
#banner{height:50px;line-height:50px;padding-left:30px;}
#banner a{text-decoration:none;color:#000;font-size:18px;}
#banner a:hover{color:#ff9406;}
</style>
<script type="text/javascript">
function checkinput(){
	if(document.getElementById("logcon").value==""){
		alert("请输入博文内容！");
		document.getElementById("logcon").focus();
		return false;
	}
	return true;
}
</script>
</head>

<body onload='getProvince()'>
<div id="banner"><a href="javascript:history.back();">返回</a></div>
<?php include("conn.php");
if(!session_id()){session_start();}
$uid=$_SESSION['uid'];
$uname=$_SESSION['uname'];
?>
<div id="content" style="text-align:justify;padding-top:40px;padding-bottom:20px;">
<div style="margin-bottom:20px;width:1160px;text-align:center;">发布人：<?php echo $uname;?></div>
<form action="check_sdlog.php" method="post" id="form_sdlog"  enctype="multipart/form-data">
<div style="width:600px;border:1px #000 dashed;margin-left:300px;padding-top:20px;padding-bottom:20px;padding-left:100px;padding-right:100px;border-radius:20px;background-color:rgba(255,255,255,0.3);">
	<div><?php if(isset($_GET['id'])){echo "讨论";}else{echo "博文";}?>内容：<input type="text" name="logcon" id="logcon"></div>
    <div>话<span style="color:rgb(248,244,221);">一一</span>题：
    	<?php
		if(isset($_GET['id'])&&isset($_GET['name'])){
			echo $_GET['name'];
			?>
            <input type="hidden" name="top" id="top" value="<?php echo $_GET['id'];?>">
            <?php 
		}else{
			?>
        <input type="text" name="top" id="top">
        <?php
		}
		?>
    </div>
    <div>
        上传图片：
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
        <div id="picInput" style="margin-left:30px;margin-top:10px;">
        <input type="file" name="uploads[]">
        </div>
        <input id="addBtn" type="button" onclick="addPic1()" value="继续添加图片" style="margin-left:30px;"><br/><br/>
    </div>
<script>
    function addPic1(){
        var addBtn =  document.getElementById('addBtn');
        var input = document.createElement("input");
        input.type = 'file';
        input.name = 'uploads[]';
        var picInut = document.getElementById('picInput');
        picInut.appendChild(input);
        if(picInut.children.length == 3){
            addBtn.disabled = 'disabled';
        }
    }
</script>
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