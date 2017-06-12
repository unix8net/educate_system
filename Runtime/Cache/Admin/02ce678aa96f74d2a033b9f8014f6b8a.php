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

<form action="<?php echo U('Admin/Class/alterClass');?>" method="post" class="form-horizontal">
  <div class="control-group">
    <label class="control-label" >专业代码</label>
    <div class="controls">
      <input type="text"  readonly="true" name="pro_code" value="<?php echo ($result["pro_code"]); ?>">
    </div>
  </div>


  <div class="control-group">
    <label class="control-label" >班级代码</label>
    <div class="controls">
      <input type="text"  name="cla_code" value="<?php echo ($result["cla_code"]); ?>">
    </div>
  </div>
  

  <div class="control-group">
    <label class="control-label" >班级名称</label>
    <div class="controls">
      <input type="text"   name="cla_name" value="<?php echo ($result["cla_name"]); ?>">
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