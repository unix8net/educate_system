<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
 

<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/educate/Public/home/css/index.css">
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">	
<script type="text/javascript" src="/educate/Public/home/js/index.js"></script>
<style type="text/css">
	form{
		width: 310px;
		margin: auto;
		position: relative;
	}
	input{
		width: 300px;
	}
	button{
		margin-top:20px;
		position: absolute;
		right: 10px;
	}
</style>

</head>
<body>
	<div id="welcome">
	  <ul class="nav nav_right navbar-nav">
	      <li><a href="/educate/index.php/Home/PersonInfo/showPerson.html"  id="welcome">欢迎你：<?php echo session('stu_name');?></a></li>
	      <li><a href="/educate/index.php/Home/Index/<?php echo ($out); ?>login_out.html" >注销</a></li>
	  </ul>
	</div>
    
	<div   class="content">

<form action="/educate/index.php/Home/PersonInfo/alterPassword" method="post" class="form-horizontal">
  <div class="control-group">
    <label class="control-label" >原密码</label>
    <div class="controls">
      <input type="text"   name="password" placeholder="<?php echo ($password); ?>"><span>&nbsp* </span>
    </div>
  </div>


  <div class="control-group">
    <label class="control-label" >新密码</label>
    <div class="controls">
      <input type="text"  name="new_password" placeholder="Password"><span>&nbsp* </span>
    </div>
  </div>


  <div class="control-group">
    <label class="control-label" >确认密码</label>
    <div class="controls">
      <input type="text"  name="repassword" placeholder="rePassword"><span>&nbsp* </span>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">修改</button>
    </div>
  </div>
</form>
 	</div>
</body>
</html>