<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>修改个人信息</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
.chemes_back{margin-left:20px;}
.chemes_back a{text-decoration:none;color: #0066CC;font-size:18px;}
.chemes_back a:hover{color: #006699;}	

.chemes_con{border:2px #999 dashed;margin:0 auto;width:800px;padding:10px;padding-left:40px;padding-bottom:20px;margin-top:20px;border-radius:15px;background-color:rgba(255,255,255,0.3);}
.chemes_con div{margin-top:10px;}
.chemes_con input[type="text"]{border:1px #999 solid;border-radius:5px;padding:5px;background-color:rgba(255,255,255,0);}
.chemes_con .textarea{resize: none;overflow-x: hidden;overflow-y: auto;height: 160px;width:600px;;border-radius: 4px;padding: 0 0 14px;-webkit-transition: 200ms;transition: 200ms;font-size: 12px;color: #333;font-size: 14px;background-color:rgba(0,0,0,0);}
.chemes_con_bottom{width:1160px;text-align:center;margin-top:20px;}
.chemes_con_bottom input[type="reset"], .chemes_con_bottom input[type="submit"]{background: #ff9406;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;}
</style>
</head>

<body>

<?php include("banner.php"); include("conn.php");?>
<?php $uid=$_GET['uid']; ?>

<div class="content" style="margin-bottom:10px;">
	<div class="chemes_back"><a href="personal.php?state=3&uid=<?php echo $uid;?>">返回</a></div>
	<div class="chemes_con">
		<?php
		$user_uid = $_GET['uid'];
		$sql=mysqli_query($conn,"select * from tb_tk_user where user_uid='$uid'");
		$info=mysqli_fetch_array($sql);
		?>
		<div class="chemes_con_top">
			<form action="modify_chemes.php" method="post" enctype="multipart/form-data">
				<input type="hidden" value="<?php echo $uid;?>" name="user_uid" id="user_uid">
			<div>用户名：<input type="text" readonly="" name="username" id="username" style="background-color:rgba(200,200,200,0.7);" value="<?php echo $info['user_uname'];?>"></div>
			<div>
				头像：<img src="<?php echo $info['user_upic'];?>" width=50 alt="">
				<input type="hidden" name="user_upic" id="user_upic" value="<?php echo $info['user_upic'];?>">
				<div>上传头像：<strong></strong><input type="file" name="upfile" id="upfile" size="30"><br>
				<img src="" alt="" title="preview-img" width="50"></div>
				<script>
				    var fileInput = document.querySelector('input[type=file]'),
				    previewImg = document.querySelector('img');
				    fileInput.addEventListener('change', function () {
				        var file = this.files[0];
				        var reader = new FileReader();
				  // 监听reader对象的的onload事件，当图片加载完成时，把base64编码賦值给预览图片
				        reader.addEventListener("load", function () {
				            previewImg.src = reader.result;
				        }, false);
				  // 调用reader.readAsDataURL()方法，把图片转成base64
				        reader.readAsDataURL(file);
				    }, false);
				</script><br>
			</div>
			<div>用户简介：<textarea data-v1ea0b1a="" name="uword" id="uword" maxlength="500" class="textarea" style="height: 60px;"><?php echo $info['user_uword'];?></textarea></div>
			<div>
				性别：
				<input type="radio" name="sex" value="1" <?php if($info['user_sex']==1) echo "checked"; ?>>男 &nbsp;&nbsp; <input type="radio" name="sex" value="2" <?php if($info['user_sex']==2) echo "checked"; ?>>女
			</div>
			<div>电话号码：<input type="text" name="phone" id="phone" value="<?php echo $info['user_phone'];?>"></div>
			<div>身份证：<input type="text" name="uid" id="uid" value="<?php echo $info['user_ucard'];?>"></div>
			<div>真实姓名：<input type="text" name="tname" id="tname" value="<?php echo $info['user_tname'];?>"></div>
			<div>
				所在地：
				<select id="province" name="province" value="2">
					<option value="-1">请选择省</option>
					<option value="0">北京</option>
					<option value="1">上海</option>
					<option value="2">天津</option>
					<option value="3">重庆</option>
					<option value="4">四川</option>
					<option value="5">贵州</option>
					<option value="6">云南</option>
					<option value="7">西藏</option>
					<option value="8">河南</option>
					<option value="9">湖北</option>
					<option value="10">湖南</option>
					<option value="11">广东</option>
					<option value="12">广西</option>
					<option value="13">陕西</option>
					<option value="14">甘肃</option>
					<option value="15">青海</option>
					<option value="16">宁夏</option>
					<option value="17">新疆</option>
					<option value="18">河北</option>
					<option value="19">山西</option>
					<option value="20">内蒙古</option>
					<option value="21">江苏</option>
					<option value="22">浙江</option>
					<option value="23">安徽</option>
					<option value="24">福建</option>
					<option value="25">江西</option>
					<option value="26">山东</option>
					<option value="27">辽宁</option>
					<option value="28">吉林</option>
					<option value="29">黑龙江</option>
					<option value="30">海南</option>
					<option value="31">台湾</option>
					<option value="32">香港</option>
					<option value="33">澳门</option>
					<option value="34">海外</option>
				</select>
			</div>
			<script>
				obj = document.getElementsByTagName("option");
				for(i=0;i<obj.length;i++){
				    if(obj[i].value==<?php echo $info['user_locate'];?>)
				        obj[i].selected = true;
				}
			</script>
			<div>密保问题：<input type="text" name="pwq" id="pwq" value="<?php echo $info['user_pwq'];?>"></div>
			<div>密保答案：<input type="text" name="pwa" id="pwa" value="<?php echo $info['user_pwa'];?>"></div>
		</div>
	</div>
	<div class="chemes_con_bottom">
		<input type="submit" value="修改">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="reset" value="重置">
	</div>
</div>
	</form>
</div>

<?php mysqli_close($conn); ?>
<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>

</body>
</html>