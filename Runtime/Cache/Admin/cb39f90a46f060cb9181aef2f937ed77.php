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

<form action="<?php echo U('Admin/Course/alterCourse');?>" method="post" class="form-horizontal">
  <div class="control-group">
    <label class="control-label" >课程编号</label>
    <div class="controls">
      <input type="text"  readonly="true" name="cou_code" value="<?php echo ($result["cou_code"]); ?>">
    </div>
  </div>


  <div class="control-group">
    <label class="control-label" >课程名称</label>
    <div class="controls">
      <input type="text"  name="cou_name" value="<?php echo ($result["cou_name"]); ?>">
    </div>
  </div>
  

  <div class="control-group">
    <label class="control-label" >开课学院</label>
    <div class="controls">
      <input type="text"   name="pro_academy" value="<?php echo ($result["pro_academy"]); ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" >学分</label>
    <div class="controls">
      <input type="text"   name="cou_credit" value="<?php echo ($result["cou_credit"]); ?>">
    </div>
  </div>
    <div class="control-group">
    <label class="control-label" >课程类型</label>
    <div class="controls">
      <input type="text"   name="cou_type" value="<?php echo ($result["cou_type"]); ?>">
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