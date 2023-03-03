<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>首页</title>
		<link rel="stylesheet" href="css/print.css">
		<link rel="stylesheet" href="css/fram.css">
		<style type="text/css">
			._hotlog {
				margin: 0 auto;
				border-bottom: 1px #CCC solid;
				width: 833px;
				margin-bottom: 20px;
			}

			._hotlog .hotlog-top .left {
				width: 90px;
				display: inline-block;
				vertical-align: top;
			}

			._hotlog .hotlog-top .right {
				width: 730px;
				display: inline-block;
				vertical-align: top;
			}

			._hotlog .hotlog-top .right .collect {
				display: inline-block;
				float: right;
				text-align: center;
				height: 30px;
				margin-right: 20px;
			}

			._hotlog .hotlog-top .right .collect a {
				display: inline-block;
				width: 70px;
				height: 30px;
				line-height: 30px;
				text-decoration: none;
				background-color: #ff9406;
				color: #fff;
				border-radius: 5px;
			}

			._hotlog .hotlog-top .right .content {
				margin-top: 10px;
			}

			._hotlog .hotlog-top .right .content:hover {
				cursor: pointer;
			}

			._hotlog .hotlog-top .right .hotlog-img {
				margin-top: 10px;
			}

			._hotlog .hotlog-top .right .hotlog-img img {
				margin-right: 10px;
			}

			._hotlog .hotlog-topic {
				width: 833px;
				text-align: center;
				color: #36C;
			}

			._hotlog .hotlog-topic a {
				text-decoration: none;
				color: #36C;
			}

			._hotlog .hotlog-bottom {
				width: 833px;
				margin-top: 10px;
			}

			._hotlog .hotlog-bottom .func {
				display: inline-block;
				width: 31%;
				text-align: center;
			}

			._hotlog .hotlog-bottom .func a,
			._hotlog .hotlog-top .right a {
				text-decoration: none;
				color: #000;
			}

			._hotlog span {
				color: #999;
			}

			#banner2 .left .left_index {
				background-color: #0078b6;
				color: #FFF;
				border-radius: 5px;
			}
		</style>
	</head>

	<body>

		<style type="text/css">
			#banner1 {
				width: 1160px;
				height: 50px;
				text-align: right;
				line-height: 50px;
			}

			#banner1 a {
				text-decoration: none;
				color: #000;
				font-size: 20px;
				margin-right: 20px;
			}

			#banner1 a:hover {
				color: #0078b6;
			}

			.black_overlay1 {
				display: none;
				position: absolute;
				top: 0%;
				left: 0%;
				width: 100%;
				height: 100%;
				background-color: #FFFFFF;
				z-index: 1001;
				-moz-opacity: 0.8;
				opacity: .80;
				filter: alpha(opacity=80);
			}

			.white_content1 {
				display: none;
				position: absolute;
				top: 25%;
				left: 25%;
				width: 50%;
				padding: 16px;
				border: 4px dashed #999;
				border-radius: 20px;
				margin: -32px;
				background-color: white;
				z-index: 1002;
				overflow: auto;
			}

			#light1 .button {
				width: 100%;
				text-align: center;
				margin-top: 20px;
			}

			#light1 .button a {
				text-decoration: none;
				color: #000;
				background: #f85d00;
				color: #FFF;
				font-size: 17px;
				font-weight: 400;
				padding: 8px 7px;
				width: 80px;
				display: inline-block;
				cursor: pointer;
				border-radius: 6px;
				margin: 0px 7px 0px 3px;
				outline: none;
				border: none;
				margin-right: 50px;
			}

			input[type="submit"] {
				background: #f85d00;
				color: #FFF;
				font-size: 17px;
				font-weight: 400;
				padding: 8px 7px;
				width: 80px;
				display: inline-block;
				cursor: pointer;
				border-radius: 6px;
				margin: 0px 7px 0px 3px;
				outline: none;
				border: none;
			}

			input[type="text"] {
				width: 600px;
				padding-left: 10px;
				padding-right: 10px;
			}

			#light1 .appl_rea {
				margin-top: 10px;
			}
			
		</style>
		<div id="banner">
			<div id="banner1">
			</div>
			<div id="banner2">
<div id="search" class="bar" style="float: left;">
				<form action="search.php" method="get">
					<input type="text" placeholder="搜索博文/话题/用户" name="keywd" style="width:400px;">
					<input type="hidden" value="1" name="ck" id="ck">
					<button type="submit"></button>
	</form></div>
				<div class="left">
					<a href="index.php" class="left_index">首页</a>
					<a href="topic.php" class="left_topic">话题</a>
					<a href="log.php" class="left_log">博文</a>
					<a href=" user_login.php " class="left_personal">个人主页</a>
					<a href="logout.php">▶注销</a>
				</div>
			</div>
		</div>


		<div id="fade1" class="black_overlay1"></div>
		<div id="content">

			<div id="left">
				<div id="login">
					<link type="text/css" rel="styleSheet" href="css/login.css">
					<script type="text/javascript">
						function checkinput() {
							if (document.getElementById("username").value == "用户名") {
								alert("请输入用户名！");
								document.getElementById("username").focus();
								return false;
							}
							if (document.getElementById("pwd").value == "password") {
								alert("请输入密码！");
								document.getElementById("pwd").focus();
								return false;
							}
							return true;
						}
					</script>
					<div class="login">
						<div class="login-top">
							<h2>用户登录</h2>
							<form action="check_login.php" method="post" name="form_log">
								<input type="text" value="用户名" name="username" id="username" onfocus="if(this.value=='用户名'){this.value='';}"
								 onblur="if (this.value == '') {this.value = '用户名';}">
								<input type="password" name="pwd" id="pwd" value="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}">
								<div class="forgot">
									<a href="#">忘记密码</a>
									<input type="submit" value="登录" name="submit" onClick="return checkinput();">
							</form>
						</div>
					</div>
					<div class="login-bottom">
						<h3>新用户&nbsp;&nbsp;<a href="register.php">注册</a></h3>
					</div>
				</div>
			</div>

			<div id="topic" style="margin-top:30px;">
				<div id="topic-top">&nbsp;&nbsp;最新话题</div>
				<div id="topic-bottom">
					<div><a href="topic_con_detail.php?id=10">全民免费接种新冠疫苗</a>&nbsp;&nbsp;&nbsp;&nbsp;<span>10</span></div>
					<div><a href="topic_con_detail.php?id=8">重庆下雪</a>&nbsp;&nbsp;&nbsp;&nbsp;<span>2</span></div>
					<div><a href="topic_con_detail.php?id=13">河北疫情</a>&nbsp;&nbsp;&nbsp;&nbsp;<span>0</span></div>
					<div><a href="topic_con_detail.php?id=7">你真可爱</a>&nbsp;&nbsp;&nbsp;&nbsp;<span>1</span></div>
					<div><a href="topic_con_detail.php?id=9">今晚夜空很美</a>&nbsp;&nbsp;&nbsp;&nbsp;<span>0</span></div>
				</div>
			</div>
		</div>

		<div id="right">
			<p>&nbsp;</p>
			<div class="_hotlog">
				<div class="hotlog-top">
					<div class="left">
						<img src="upimages/2.jpg" width="80px" alt="">
					</div>
					<div class="right">
						<div class="title">
							<div><a href="personal.php?state=1&uid=9">serendipper</a></div>
							<span>2020-12-31 12:31:01 &nbsp;&nbsp; 200&nbsp;收藏</span>
						</div>
						<div class="content" onclick="javascript:window.location='log_con_detail.php?id=';">国务院联防联控机制发布会上，针对新冠疫苗上市后如何定价的问题，及疫苗价格形成机制进行进行详细解释，并表示为全民免费提供新冠疫苗。</div>
						<div class="hotlog-img">
							<img src=" " alt="" width="80px"><img src="" alt="" width="80px"><img src="" alt="" width="80px">
						</div>
					</div>
				</div>
				<div class="hotlog-topic"><a href=""></a></div>
				<div class="hotlog-topic"> <a href="topic_con_detail.php?id=8"> #全民免费接种新冠疫苗# </a></div>
				<div class="hotlog-bottom">
					<div class="func" style="margin-left:10px;"><a href="log_con_detail.php?id=39&state=1">转发</a><span>&nbsp;&nbsp;40</span></div>&nbsp;|
					<div class="func"><a href="log_con_detail.php?id=39&state=2">评论</a><span>&nbsp;&nbsp;120</span></div>&nbsp;|
					<div class="func"><a href="log_con_detail.php?id=39&state=3">点赞</a><span>&nbsp;&nbsp;90</span></div>

				</div>
			</div>
			<div class="_hotlog">
				<div class="hotlog-top">
					<div class="left">
						<img src="upimages/3.jpg" width="80px" alt="">
					</div>
					<div class="right">
						<div class="title">
							<div><a href="personal.php?state=1&uid=9">新浪重庆</a></div>
							<span>2021-01-08 13:25:33 &nbsp;&nbsp; 0&nbsp;收藏</span>
						</div>
						<div class="content" onclick="javascript:window.location='log_con_detail.php?id=';">重庆主城喜迎降雪，缙云山、南山飘起了雪花，地上可见一层薄薄的积雪，重庆主城终于下雪了！</div>
						<div class="hotlog-img">
							<img src="" alt="" width="80px"><img src="" alt="" width="80px"><img src="" alt="" width="80px">
						</div>
					</div>
				</div>
				<div class="hotlog-topic"><a href=""></a></div>
				<div class="hotlog-topic"> <a href="topic_con_detail.php?id=4"> #重庆下雪# </a></div>
				<div class="hotlog-bottom">
					<div class="func" style="margin-left:10px;"><a href="log_con_detail.php?id=38&state=1">转发</a><span>&nbsp;&nbsp;2</span></div>&nbsp;|
					<div class="func"><a href="log_con_detail.php?id=38&state=2">评论</a><span>&nbsp;&nbsp;5</span></div>&nbsp;|
					<div class="func"><a href="log_con_detail.php?id=38&state=3">点赞</a><span>&nbsp;&nbsp;3</span></div>

				</div>
			</div>
			<div class="_hotlog">
				<div class="hotlog-top">
					<div class="left">
						<img src="upimages/6.jpg" width="80px" alt="">
					</div>
					<div class="right">
						<div class="title">
							<div><a href="personal.php?state=1&uid=9">哎呀是鸣鸣呀</a></div>
							<span>2021-01-05 02:21:52 &nbsp;&nbsp; 2&nbsp;收藏</span>
						</div>
						<div class="content" onclick="javascript:window.location='log_con_detail.php?id=';">月遇从花，花遇和风，今晚上的夜空很美</div>
						<div class="hotlog-img">
							<img src="" alt="" width="80px"><img src="" alt="" width="80px"><img src="" alt="" width="80px">
						</div>
					</div>
				</div>
				<div class="hotlog-topic"><a href=""></a></div>
				<div class="hotlog-topic"> <a href="topic_con_detail.php?id=8"> #今晚夜空很美# </a></div>
				<div class="hotlog-bottom">
					<div class="func" style="margin-left:10px;"><a href="log_con_detail.php?id=36&state=1">转发</a><span>&nbsp;&nbsp;2</span></div>&nbsp;|
					<div class="func"><a href="log_con_detail.php?id=36&state=2">评论</a><span>&nbsp;&nbsp;4</span></div>&nbsp;|
					<div class="func"><a href="log_con_detail.php?id=36&state=3">点赞</a><span>&nbsp;&nbsp;0</span></div>

				</div>
			</div>
			<div class="_hotlog">
				<div class="hotlog-top">
					<div class="left">
						<img src="upimages/4.jpg" width="80px" alt="">
					</div>
					<div class="right">
						<div class="title">
							<div><a href="personal.php?state=1&uid=8">ymyymyi</a></div>
							<span>2020-08-13 19:09:09 &nbsp;&nbsp; 1&nbsp;收藏</span>
						</div>
						<div class="content" onclick="javascript:window.location='log_con_detail.php?id=';">你真可爱</div>
						<div class="hotlog-img">
                          <p><img src="upimages/5.jpg" alt="" width="80px"><img src="upimages/8.jpg" alt="" width="80px"><img src="upimages/7.jpg"
							 alt="" width="80px">
                          </p>
						</div>
					</div>
				</div>
				<div class="hotlog-topic"><a href=""></a></div>
				<div class="hotlog-topic"> <a href="topic_con_detail.php?id=8"> #你真可爱# </a></div>
				<div class="hotlog-bottom">
					<div class="func" style="margin-left:10px;"><a href="log_con_detail.php?id=35&state=1">转发</a><span>&nbsp;&nbsp;1</span></div>&nbsp;|
					<div class="func"><a href="log_con_detail.php?id=35&state=2">评论</a><span>&nbsp;&nbsp;0</span></div>&nbsp;|
					<div class="func"><a href="log_con_detail.php?id=35&state=3">点赞</a><span>&nbsp;&nbsp;0</span></div>

				</div>
			</div>
		</div>
		<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi </div>
 
	</body>
</html>
