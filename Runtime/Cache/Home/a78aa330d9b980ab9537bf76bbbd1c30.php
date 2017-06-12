<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link rel="shortcut icon" href="image/login.ico">
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

		
		<form action="<?php echo U('Home/ManageCourse/judge');?>" method="post">
		<table class="table table-hover table-bordered">
		<h3>评教</h3>
		 <?php echo ($thead); ?>
		  <tbody>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
					<td ><?php echo ($vo["cou_name"]); ?></td>
					<td ><?php echo ($vo["tea_name"]); ?></td>
					<td><input name="<?php echo ($vo["cou_number"]); ?>" value="<?php echo ($vo["score"]); ?>"></td>
				</tr><?php endforeach; endif; ?>
		  </tbody>
		</table>
		<input type="submit">
		</form>
	</div>
</body>
</html>