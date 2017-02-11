<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title></title>
	
	<link href="/educate/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/educate/Public/css/bootstrap-responsive.min.css" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<style type="text/css">
		body{  
			margin-left:auto;  
			margin-right:auto; 
			margin-top:20PX; 
			width:80%;
			}
		span{
			color:red;
		}
	</style>
</head>
<body>

<form action="<?php echo U('Admin/Teacher/alterTeacher');?>" method="post" class="form-horizontal">
  <div class="control-group">
    <label class="control-label" >姓名</label>
    <div class="controls">
      <input type="text"   name="tea_name" value="<?php echo ($result["tea_name"]); ?> ">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >编号</label>
    <div class="controls">
      <input type="text"  readonly="true" name="tea_idnum" value="<?php echo ($result["tea_idnum"]); ?> ">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >身份证号码</label>
    <div class="controls">
      <input type="text"  name="tea_idcard" value="<?php echo ($result["tea_idcard"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >专业</label>
    <div class="controls">
      <input type="text"  name="pro_code" value="<?php echo ($result["pro_code"]); ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" >密码</label>
    <div class="controls">
      <input type="password"  name="tea_password" value="<?php echo ($result["tea_password"]); ?>">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">修改</button>
    </div>
  </div>
</form>

</body>
</html>