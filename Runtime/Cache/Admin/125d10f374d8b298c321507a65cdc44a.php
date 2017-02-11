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

<form action="<?php echo U('Admin/Course/addCourse');?>" method="post" class="form-horizontal">
  <div class="control-group">
    <label class="control-label" >课程编号</label>
    <div class="controls">
      <input type="text"   name="cou_code" placeholder="课程编号"><span>&nbsp* </span>
    </div>
  </div>


  <div class="control-group">
    <label class="control-label" >课程名称</label>
    <div class="controls">
      <input type="text"  name="cou_name" placeholder="课程名称"><span>&nbsp* </span>
    </div>
  </div>
  

  <div class="control-group">
    <label class="control-label" >开课学院</label>
    <div class="controls">
      <input type="text"   name="pro_academy" placeholder="开课学院"><span>&nbsp* </span>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" >学分</label>
    <div class="controls">
      <input type="text"   name="cou_credit" placeholder="学分"><span>&nbsp* </span>
    </div>
  </div>
    <div class="control-group">
    <label class="control-label" >课程类型</label>
    <div class="controls">
      <input type="text"   name="cou_type" placeholder="课程类型"><span>&nbsp* </span>
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">添加</button>
    </div>
  </div>
</form>

</body>
</html>