<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>登录</title>
	<meta name="renderer" content="webkit">
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="/educate/Public/js/login.js"></script>
	<style type="text/css">
		body{  
			margin-left:auto;  
			margin-right:auto; 
			margin-top:150PX; 
			width:20em; 
			}
		.input-group 
		{
			margin-bottom: 10px;
		}
	</style>
</head>
<body>

<form action="<?php echo U('Admin/Login/login');?>" method="post">
	<div class="input-group">
		 <span class="input-group-addon" id="basic-addon1">@</span>
		<input class="form-control" type="text" name="name" placeholder="用户名" >
	</div>
	<div class="input-group">
		 <span class="input-group-addon" id="basic-addon1">@</span>
		<input class="form-control" type="password" name="password" placeholder="密码" >
	</div>
	
	<div class="input-group">

	<button  class="btn btn-default" type="submit" style="width:280px">登录</button>
	</div>
	<button  class="btn btn-default" id="reset" type="submit" style="width:280px">重置</button>
</form>

</body>
</html>