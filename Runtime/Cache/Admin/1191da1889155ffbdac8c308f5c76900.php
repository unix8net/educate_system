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



<form action="<?php echo U('Admin/Course/addbook');?>" method="post" class="form-horizontal">
  <div class="control-group">
    <label class="control-label" >课程代码</label>
    <div class="controls">
      <input type="text"   name="cou_code" readonly="true" value="<?php echo ($cou_code); ?>"><span>&nbsp* </span>
    </div>
  </div>


  <div class="control-group">
    <label class="control-label" >书名</label>
    <div class="controls">
      <input type="text"   name="edu_name" placeholder="书名"><span>&nbsp* </span>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >作者</label>
    <div class="controls">
      <input type="text" name="edu_author" placeholder="作者">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" >出版社</label>
    <div class="controls">
      <input type="text" name="edu_pubishing" placeholder="出版社">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >价格</label>
    <div class="controls">
      <input type="text" name="edu_price" placeholder="价格">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" >备注</label>
    <div class="controls">
      <input type="text" name="edu_remark" placeholder="备注">
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