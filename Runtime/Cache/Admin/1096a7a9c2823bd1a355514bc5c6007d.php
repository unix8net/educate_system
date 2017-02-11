<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>增加管理员</title>
	
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

<form action="<?php echo U('Admin/Adm/changePersonInfo');?>" method="post" class="form-horizontal">
  <div class="control-group">
    <label class="control-label" >用户名 </label>
    <div class="controls">
      <input type="text" readonly="true"  name="adm_name"  value="<?php echo ($result["adm_name"]); ?>">
    </div>
  </div>


  <div class="control-group">
    <label class="control-label" >身份证号码</label>
    <div class="controls">
      <input type="text"  name="adm_idcard" value="<?php echo ($result["adm_idcard"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >联系方式</label>
    <div class="controls">
      <input type="text"   name="adm_contact" value="<?php echo ($result["adm_contact"]); ?>">
    </div>
  </div>


    <div class="control-group">
    <label class="control-label" >权限设置</label>
    <div class="controls">
      <input type="text" readonly="true" name="adm_permission" value="<?php echo ($result["adm_permission"]); ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >密码</label>
    <div class="controls">
      <input type="password"  name="adm_password" value="<?php echo ($result["adm_password"]); ?>">
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