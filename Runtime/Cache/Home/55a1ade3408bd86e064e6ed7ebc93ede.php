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
<style>
	.tbody td{
		text-align: center;
	}		
	form
	{
		width:400px;
	}		
	select{
    width: 200px;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
	}
</style>
</head>
<body>


	<div class="content">
		<div id="welcome">
		  <ul class="nav nav_right navbar-nav">
		      <li><a href="/educate/index.php/Home/PersonInfo/showPerson.html"  id="welcome">欢迎你：<?php echo session('stu_name');?></a></li>
		      <li><a href="/educate/index.php/Home/Index/login_out.html" >注销</a></li>
		  </ul>
		</div>


		
		<h3>考试信息</h3>

		<table class="table table-hover table-bordered">
		 <?php echo ($thead); ?>
		  <tbody>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
					<td><?php echo ($vo["cou_name"]); ?></td>
					<td><?php echo ($vo["tea_name"]); ?></td>
					<td><?php echo ($vo["cou_place"]); ?></td>
					<td>暂未发布</td>
				</tr><?php endforeach; endif; ?>
		  </tbody>
		</table>
		<?php echo ($page); ?>
	</div>


</body>
</html>