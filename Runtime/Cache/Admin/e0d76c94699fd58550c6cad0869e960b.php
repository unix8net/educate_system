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
    select{
      position: absolute;
      width:206px;
    }
	</style>
</head>
<body>

<form action="<?php echo U('Admin/Teacher/addTeacher');?>" method="post" class="form-horizontal">
  <div class="control-group">
    <label class="control-label" >姓名</label>
    <div class="controls">
      <input type="text"   name="tea_name" placeholder="姓名"><span>&nbsp* </span>
    </div>
  </div>


  <div class="control-group">
    <label class="control-label" >身份证号码</label>
    <div class="controls">
      <input type="text"  name="tea_idcard" placeholder="身份证号码"><span>&nbsp* </span>
    </div>
  </div>
  

  <div class="control-group">
    <label class="control-label" >所属专业</label>
    <div class="controls">
      <select class="form-control" name='pro_code' > 
        <?php if(is_array($_pro)): foreach($_pro as $key=>$it): ?><option value="<?php echo ($it["pro_code"]); ?>"><?php echo ($it["pro_name"]); ?></option><?php endforeach; endif; ?>
      </select>
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