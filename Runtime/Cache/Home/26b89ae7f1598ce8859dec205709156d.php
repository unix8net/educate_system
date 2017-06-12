<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>登录入口</title>

	<style type="text/css">
		body{
			margin:0;
			padding: 0;
			width: 65%;
			margin:auto;
			padding-top: 30px;
		}
		.book_tag
		{
			width: 224px;
			height: 166px;
			/*background-image:url("../img/1.png");*/
			background-size: 100% 100%;
			box-shadow: 0 0 5px #e4e6e8;
		    font-size: 15px ;
		    line-height: 22px;
			float:left;
			margin:20px;
		}
		.book_tag:hover{
			box-shadow: 0 0 5px #c2c2c2;	
		}
		.book_tag:hover .pull_up
		{
			top:26px;
		}
		.pull_up{
			overflow:hidden;
			width:204px;
			height: 80px;
			background-image:linear-gradient(to bottom, rgba(255, 255, 255, 0.5) 0%, rgba(255, 255, 255, 1) 60% ,rgba(255, 255, 255, 1) 100%); 
			padding:10px;
			position: relative;
			top: 66px;
			word-wrap: break-word;

			transition:top 1s;
			-moz-transition:top 1s; /* Firefox 4 */
			-webkit-transition:top 1s; /* Safari and Chrome */
			-o-transition:top 1s; /* Opera */

		}
		.read_count{
			width:204px;
			height: 30px;
			padding-left: 10px;
			padding-right:10px;
			padding-top: 10px;
			background-color: #fff;
			z-index: 1000;
			position: relative;
			top: 26px;
			font-size: 1em ;
		}
		a{
			text-decoration: none;
			color:#364149;
		}
		.a_float_right{
			float:right;
		}
		.title{
			font-size: 22px;
		}
	</style>
</head>
<body>

<div class="book_tag" style="background-color: #fc6360">
	<a href="<?php echo U('Home/Index/login');?>">
		<div class="pull_up" >
			<span class="title">学生服务系统</span><br>
			&nbsp&nbsp&nbsp&nbsp选课、教材预定、查看课表、成绩查询、期末评教、公共信息查询......
		</div>
		<div class="read_count">学生登录</div>
	</a>
</div>
<div class="book_tag" style="background-color: #f7a550">
	<a href="<?php echo U('Home/Index/tea_login');?>">
		<div class="pull_up" >
			<span class="title">老师服务系统</span><br>
			&nbsp&nbsp&nbsp&nbsp查看课表、成绩录入
		</div>
		<div class="read_count">老师登录</div>
	</a>
</div>
<div class="book_tag" style="background-color: #70ca57">
	<a href="<?php echo U('admin/login/login');?>">
		<div class="pull_up" >
			<span class="title">教务系统后台</span><br>
			&nbsp&nbsp&nbsp&nbsp负责管理老师、学生、课程、班级、专业、选课......
		</div>
		<div class="read_count">管理员登录</div>
	</a>
</div>
<div class="book_tag" style="background-color: #f3cd65">
	<a href="http://192.168.43.239:8080/online_judge/app/main.php">
		<div class="pull_up" >
			<span class="title">在线判题系统</span><br>
			&nbsp&nbsp&nbsp&nbsp一个在线做题、自动判题的服务系统
		</div>
		<div class="read_count">online judge</div>
	</a>
</div>

<div class="book_tag" style="background-color: #6886b0">
	<a href="http://192.168.43.117/forum-system/index.php/Forum/Login/login.html">
		<div class="pull_up" >
			<span class="title">问答专区</span><br>
			&nbsp&nbsp&nbsp&nbsp问答专区
		</div>
		<div class="read_count">问答专区</div>
	</a>
</div>
</body>
</html>