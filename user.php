<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/fram.css">
		<style type="text/css">
			#pintro {
				width: 1160px;
				padding-top: 20px;
				padding-bottom: 20px;
				text-align: center;
			}

			#pintro .focus a {
				text-decoration: none;
				color: #000;
			}

			#pintro .focus a:hover {
				color: #f85d00;
			}

			#pintro .pintro_a {
				margin-top: 10px;
				display: inline-block;
				text-align: center;
				height: 30px;
			}

			#pintro .pintro_a a {
				display: inline-block;
				width: 70px;
				height: 30px;
				line-height: 30px;
				text-decoration: none;
				background-color: #ff9406;
				color: #fff;
				border-radius: 5px;
				margin-right: 10px;
			}

			#_banner {
				width: 1160px;
				height: 40px;
				text-align: center;
				line-height: 40px;
			}

			#_banner a {
				text-decoration: none;
				color: #000;
				padding-left: 20px;
				padding-right: 20px;
			}

			#_banner a:hover {
				padding-bottom: 3px;
				border-bottom: 2px #f85d00 solid;
				transition: 0.5s all;
			}

			#banner2 .left .left_personal {
				background-color: #0078b6;
				color: #FFF;
				border-radius: 5px;
			}
		</style>
		<title>个人中心</title>
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
				<a href="message.php?st=1">我的私信</a>
				<a href="user_bin.php">草稿箱</a>
				
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
		&nbsp;
		<div id="content">
			<style type="text/css">
				.black_overlay {
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

				.white_content {
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

				#light .button {
					width: 100%;
					text-align: center;
					margin-top: 20px;
				}

				#light .button a {
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
			</style>


			<div id="pintro">
				<div><img src="" width=100 alt=""></div>
				<div>11111</div>
				<div>11111</div>
				<div class="focus"><a href="user_friend.php?st=1&uid=18">关注</a> 0 | <a href="user_friend.php?st=2&uid=18">粉丝</a> 0
					| <a href="user_friend.php?st=3&uid=18">互相关注</a> 0</div>
			</div>


		
		  <div id="_banner">
				<a href="personal.php?state=1&uid=18" style='padding-bottom:3px;border-bottom:2px #f85d00 solid;'>博文</a><a href="personal.php?state=2&uid=18">话题</a><a
				 href="personal.php?state=3&uid=18">个人信息</a>
				<a href="message.php?st=1">我的消息</a>
				<a href="user_bin.php">草稿箱</a>
			</div>

			<style type="text/css">
				._hotlog {
					margin: 0 auto;
					border-bottom: 1px #ccc solid;
					width: 1160px;
					margin-bottom: 20px;
					padding-left: 20px;
					padding-top: 10px;
				}

				._hotlog .hotlog-top .left {
					width: 90px;
					display: inline-block;
					vertical-align: top;
					margin-right: 20px;
				}

				._hotlog .hotlog-top .right {
					width: 1000px;
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
					width: 1160px;
					text-align: center;
					color: #36C;
				}

				._hotlog .hotlog-topic a {
					text-decoration: none;
					color: #36C;
				}

				._hotlog .hotlog-bottom {
					width: 1160px;
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

				._hotlog .hotlog-top .right .trans_con {
					background-color: rgba(204, 204, 204, 0.2);
					border-radius: 5px;
					margin-top: 10px;
					padding-left: 10px;
					padding-right: 10px;
					padding-top: 10px;
					padding-bottom: 10px;
				}

				._hotlog .hotlog-top .right .trans_con .trans_left {
					display: inline-block;
					vertical-align: top;
					margin-right: 15px;
				}

				._hotlog .hotlog-top .right .trans_con .trans_right {
					display: inline-block;
					vertical-align: top;
				}

				._hotlog .hotlog-top .right .trans_con .trans_right .title span {
					color: #999;
				}

				._hotlog .hotlog-top .right .trans_con .trans_right .content {}

				._hotlog .hotlog-top .right .trans_con .trans_right .pic {
					margin-top: 10px;
				}

				._hotlog .hotlog-top .right .trans_con .trans_right .pic img {
					margin-right: 10px;
				}

				._hotlog .hotlog-top .right .trans_con .trans_right .topic {
					color: #36C;
					margin-top: 5px;
				}

				._hotlog .hotlog-top .right .trans_con .trans_right .topic a {
					text-decoration: none;
					color: #36C;
				}
			</style>



			<div id="personlog">


			</div>
		</div>


	<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi </div>

	</body>
</html>
