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
<form action="<?php echo U('Admin/Profess/addProfess');?>" method="post" class="form-horizontal">
  <div class="control-group">
    <label class="control-label" >专业代码</label>
    <div class="controls">
      <input type="text" name="pro_code"><span>&nbsp* </span>
    </div>
  </div>


  <div class="control-group">
    <label class="control-label" >专业名称</label>
    <div class="controls">
      <input type="text"  name="pro_name" ><span>&nbsp* </span>
    </div>
  </div>
  

  <div class="control-group">
    <label class="control-label" >院系名</label>
    <div class="controls">
      <input type="text"   name="pro_academy" ><span>&nbsp* </span>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" >学历层次</label>
    <div class="controls">
      <input type="text"   name="pro_level" ><span>&nbsp* </span>
    </div>
  </div>

    <div class="control-group">
    <label class="control-label" >学制</label>
    <div class="controls">
      <input type="text"   name="pro_year" ><span>&nbsp* </span>
    </div>
  </div>

    <div class="control-group">
    <label class="control-label" >学科类别</label>
    <div class="controls">
      <input type="text"   name="pro_type" ><span>&nbsp* </span>
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