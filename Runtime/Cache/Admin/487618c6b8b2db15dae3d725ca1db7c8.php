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





<form action="<?php echo U('Admin/Courseson/alterCourseson');?>" method="post" class="form-horizontal">
  <div class="control-group">
    <label class="control-label" >课程代码</label>
    <div class="controls">
      <input type="text"  readonly="true" name="cou_code" value="<?php echo ($result["cou_code"]); ?>"><span>&nbsp* </span>
    </div>
  </div>


  <div class="control-group">
    <label class="control-label" >课程子序号</label>
    <div class="controls">
      <input type="text" readonly="true" name="cou_number" value="<?php echo ($result["cou_number"]); ?>"><span>&nbsp* </span>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" >教学周区间</label>
    <div class="controls">
      <input type="text" name="cou_interval" value="<?php echo ($result["cou_interval"]); ?>"><span>&nbsp* </span>
    </div>
  </div>
    <div class="control-group">
    <label class="control-label" >教学地点</label>
    <div class="controls">
      <input type="text" name="cou_place" value="<?php echo ($result["cou_place"]); ?>"><span>&nbsp* </span>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >学年学期</label>
    <div class="controls">
      <input type="text"   name="cou_term" value="<?php echo ($result["cou_term"]); ?>"><span>&nbsp* </span>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >总可选人数</label>
    <div class="controls">
      <input type="text" name="cou_total" value="<?php echo ($result["cou_total"]); ?>"><span>&nbsp* </span>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" >剩余人数</label>
    <div class="controls">
      <input type="text" name="cou_remainder" value="<?php echo ($result["cou_remainder"]); ?>"><span>&nbsp* </span>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" >备注</label>
    <div class="controls">
      <input type="text" name="cou_remark" value="<?php echo ($result["cou_remark"]); ?>"><span>&nbsp* </span>
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