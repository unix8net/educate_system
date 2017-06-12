<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link rel="shortcut icon" href="image/login.ico">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/educate/Public/home/css/<?php echo ($out); ?>index.css">
<script type="text/javascript" src="/educate/Public/home/js/<?php echo ($out); ?>index.js"></script>	

<style type="text/css">
	input{
		width:100px;
	}
</style>
</head>
<body>

	<div class="content">
		<div id="welcome">
		  <ul class="nav nav_right navbar-nav">
		      <li><a href="/educate/index.php/Home/PersonInfo/showPerson.html"  id="welcome">欢迎你：<?php echo ($name); ?></a></li>
		      <li><a href="/educate/index.php/Home/Index/<?php echo ($out); ?>login_out.html" >注销</a></li>
		  </ul>
		</div>

		<form class="search" action="<?php echo U('home/PublicInquire/AllCourse');?>?who=<?php echo ($out); ?>" method="post">
			<span>学年学期</span>
			<select  name='cou_term' > 
				<option value="<?php echo ($get["cou_term"]); ?>"><?php echo ($get["cou_term"]); ?></option> 
				<option value="2017-2018-1">2017-2018-1</option> 
				<option value="2017-2018-2">2017-2018-2</option> 
			</select>
	    	<span>课程代码</span>
	    	<input type="" name="cou_code" value="<?php echo ($get["cou_code"]); ?>">
	    	<span>课程名称</span>
	    	<input type="" name="cou_name" value="<?php echo ($get["cou_name"]); ?>">
	    	<span>任课教师</span>
	    	<input type="" name="tea_name" value="<?php echo ($get["tea_name"]); ?>">
	    	<span>课程类别</span>
	    	<input type="" name="cou_type" value="<?php echo ($get["cou_type"]); ?>">
	    	<button type="submit">查询</button>
		</form>

		<table class="table table-hover table-bordered">
		 <?php echo ($thead); ?>
		  <tbody>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
					<td><?php echo ($vo["cou_number"]); ?></td>
					<td><?php echo ($vo["cou_code"]); ?></td>
					<td><?php echo ($vo["cou_name"]); ?></td>
					<td><?php echo ($vo["cou_interval"]); ?></td>
					<td><?php echo ($vo["cou_place"]); ?></td>
					<td><?php echo ($vo["cou_total"]); ?></td>
					<td><?php echo ($vo["tea_name"]); ?></td>
					<td><?php echo ($vo["pro_academy"]); ?></td>
					<td><?php echo ($vo["cou_type"]); ?></td>
					<td><?php echo ($vo["cou_credit"]); ?></td>
				</tr><?php endforeach; endif; ?>
		  </tbody>
		</table>
		<?php echo ($page); ?>

	</div>

</body>
</html>