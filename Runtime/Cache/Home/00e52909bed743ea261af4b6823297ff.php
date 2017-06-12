<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css"> 
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/educate/Public/home/css/index.css">
<script type="text/javascript" src="/educate/Public/home/js/index.js"></script>	


</head>
<body>

	<div class="content">
		<div id="welcome">
		  <ul class="nav nav_right navbar-nav">
		      <li><a href="/educate/index.php/Home/PersonInfo/showPerson.html"  id="welcome">欢迎你：<?php echo session('stu_name');?></a></li>
		      <li><a href="/educate/index.php/Home/Index/login_out.html" >注销</a></li>
		  </ul>
		</div>


		<h1>欢迎来到教务系统</h1>
	</div>

</body>
</html>

<!-- <!DOCTYPE html>
<html>
<head>
	<title>首页</title>
</head>
<body>
<h3>首页</h3>
<h3><a href="<?php echo U('Home/index/login_out');?>">注销</a></h3>
<ul>
	<li><a href="<?php echo U('Home/ManageCourse/pri_election');?>">预选报名</a></li>
	<li><a href="<?php echo U('Home/ManageCourse/selectBook');?>">选购教程</a></li>
	<li><a href="<?php echo U('Home/ManageCourse/judge_edu');?>">期末评教</a></li>
	<li><a href="<?php echo U('Home/PersonInfo/showCurriculum');?>">课表查询</a></li>
	<li><a href="<?php echo U('Home/PersonInfo/showScore');?>">成绩查询</a></li>
	<li><a href="<?php echo U('Home/PersonInfo/showPerson');?>">个人信息</a></li>
	
</ul>
</body>
</html>
 -->