<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link rel="shortcut icon" href="image/login.ico">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/educate/Public/home/css/tea_index.css">
	
<script type="text/javascript" src="/educate/Public/home/js/tea_index.js"></script>
<style type="text/css">
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
	
	<div id="welcome">
	  <ul class="nav nav_right navbar-nav">
	      <li><a href="/educate/index.php/Home/teaInfo/showPerson.html"  id="welcome">欢迎你：<?php echo ($name); ?></a></li>
	      <li><a href="/educate/index.php/Home/Index/tea_login_out.html" >注销</a></li>
	  </ul>
	</div>
		
	<div   class="content">


		<form action="<?php echo U('home/teaCourse/finaljudge');?>" method="post" class="form-search">
			<h4 style="display: inline">学年学期：</h4 style="display: inline">
			<select  name='cou_term'> 
				<option value="<?php echo ($cou_term); ?>"><?php echo ($cou_term); ?></option> 
				<option value="2017-2018-1">2017-2018-1</option> 
				<option value="2017-2018-2">2017-2018-2</option> 
			</select>
	 		<button type="submit" class="btn">Search</button>
		</form>
		<h3>评教结果</h3>
		<table class="table table-hover table-bordered">
		 <?php echo ($thead); ?>
		  <tbody>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
					<td><?php echo ($vo["cou_term"]); ?></td>
					<td><?php echo ($vo["cou_name"]); ?></td>
					<td><?php echo ($vo["tea_name"]); ?></td>
					<td><?php echo ($vo["score"]); ?></td>
				</tr><?php endforeach; endif; ?>
		  </tbody>
		</table>
	</div>
   




</body>
</html>