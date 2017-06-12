<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link rel="shortcut icon" href="image/login.ico">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/educate/Public/home/css/tea_index.css">
	
<script type="text/javascript" src="/educate/Public/home/js/tea_index.js"></script>
<style>
	.tbody td{
		text-align: center;
	}
	form
	{
		width:400px;
	}		
	select{
    width: 200px;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
	}
</style>

</head>
<body>
	<div id="welcome">
	  <ul class="nav nav_right navbar-nav">
	      <li><a href="/educate/index.php/Home/teaInfo/showPerson.html"  id="welcome">欢迎你：<?php echo ($name); ?></a></li>
	      <li><a href="/educate/index.php/Home/Index/tea_login_out.html" >注销</a></li>
	  </ul>
	</div>
    
	<div   class="content">

		<form action="<?php echo U('home/teaCourse/showCurriculum');?>" method="post" class="form-search">
			<h4 style="display: inline">学年学期：</h4 style="display: inline">
			<select  name='cou_term'> 
				<option value="<?php echo ($cou_term); ?>"><?php echo ($cou_term); ?></option> 
				<option value="2017-2018-1">2017-2018-1</option> 
				<option value="2017-2018-2">2017-2018-2</option> 
			</select>
	 		<button type="submit" class="btn">Search</button>
		</form>
	<h3>课表</h3>

		<table class="table table-condensed table-bordered ">
		<thead   class="">
			<tr>
				<th>节次</th>
				<th>星期一</th>
				<th>星期二</th>
				<th>星期三</th>
				<th>星期四</th>
				<th>星期五</th>
				<th>星期六</th>
				<th>星期日</th>
			</tr>
			
		</thead>
		
		<tbody class="tbody">
			<tr class="active">
				<td>第一节</td>
				<td rowspan="2"><?php echo ($list[7]["cou_name"]); ?></br><?php echo ($list[7]["tea_name"]); ?> <?php echo ($list[7]["cou_place"]); ?></br><?php echo ($list[7]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[4]["cou_name"]); ?></br><?php echo ($list[4]["tea_name"]); ?> <?php echo ($list[4]["cou_place"]); ?></br><?php echo ($list[4]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[6]["cou_name"]); ?></br><?php echo ($list[6]["tea_name"]); ?> <?php echo ($list[6]["cou_place"]); ?></br><?php echo ($list[6]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[2]["cou_name"]); ?></br><?php echo ($list[2]["tea_name"]); ?> <?php echo ($list[2]["cou_place"]); ?></br><?php echo ($list[2]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[9]["cou_name"]); ?></br><?php echo ($list[9]["tea_name"]); ?> <?php echo ($list[9]["cou_place"]); ?></br><?php echo ($list[9]["cou_interval"]); ?></td>
				<td rowspan="2"></td>
				<td rowspan="2"></td>
			
			</tr>
			<tr class="active">
				<td>第二节</td>

			
			</tr>
			<tr>
				<td>第三节</td>
				<td rowspan="2"><?php echo ($list[5]["cou_name"]); ?></br><?php echo ($list[5]["tea_name"]); ?> <?php echo ($list[5]["cou_place"]); ?></br><?php echo ($list[5]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[1]["cou_name"]); ?></br><?php echo ($list[1]["tea_name"]); ?> <?php echo ($list[1]["cou_place"]); ?></br><?php echo ($list[1]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[18]["cou_name"]); ?></br><?php echo ($list[18]["tea_name"]); ?> <?php echo ($list[18]["cou_place"]); ?></br><?php echo ($list[18]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[11]["cou_name"]); ?></br><?php echo ($list[11]["tea_name"]); ?> <?php echo ($list[11]["cou_place"]); ?></br><?php echo ($list[11]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[15]["cou_name"]); ?></br><?php echo ($list[15]["tea_name"]); ?> <?php echo ($list[15]["cou_place"]); ?></br><?php echo ($list[15]["cou_interval"]); ?></td>
				<td rowspan="2"></td>
				<td rowspan="2"></td>
			
			</tr>
			<tr>
				<td>第四节</td>
			
			</tr>
			<tr class="active">
				<td>第五节</td>
				<td rowspan="2"><?php echo ($list[21]["cou_name"]); ?></br><?php echo ($list[21]["tea_name"]); ?> <?php echo ($list[21]["cou_place"]); ?></br><?php echo ($list[21]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[17]["cou_name"]); ?></br><?php echo ($list[17]["tea_name"]); ?> <?php echo ($list[17]["cou_place"]); ?></br><?php echo ($list[17]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[8]["cou_name"]); ?></br><?php echo ($list[8]["tea_name"]); ?> <?php echo ($list[8]["cou_place"]); ?></br><?php echo ($list[8]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[10]["cou_name"]); ?></br><?php echo ($list[10]["tea_name"]); ?> <?php echo ($list[10]["cou_place"]); ?></br><?php echo ($list[10]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[12]["cou_name"]); ?></br><?php echo ($list[12]["tea_name"]); ?> <?php echo ($list[12]["cou_place"]); ?></br><?php echo ($list[12]["cou_interval"]); ?></td>
				<td rowspan="2"></td>
				<td rowspan="2"></td>
			
			</tr>
			<tr class="active">
				<td>第六节</td>
			
			</tr>
			<tr>
				<td>第七节</td>
				<td rowspan="2"><?php echo ($list[13]["cou_name"]); ?></br><?php echo ($list[13]["tea_name"]); ?> <?php echo ($list[13]["cou_place"]); ?></br><?php echo ($list[13]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[0]["cou_name"]); ?></br><?php echo ($list[0]["tea_name"]); ?> <?php echo ($list[0]["cou_place"]); ?></br><?php echo ($list[0]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[23]["cou_name"]); ?></br><?php echo ($list[23]["tea_name"]); ?> <?php echo ($list[23]["cou_place"]); ?></br><?php echo ($list[23]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[24]["cou_name"]); ?></br><?php echo ($list[24]["tea_name"]); ?> <?php echo ($list[24]["cou_place"]); ?></br><?php echo ($list[24]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[16]["cou_name"]); ?></br><?php echo ($list[16]["tea_name"]); ?> <?php echo ($list[16]["cou_place"]); ?></br><?php echo ($list[16]["cou_interval"]); ?></td>
				<td rowspan="2"></td>
				<td rowspan="2"></td>
			</tr>
			<tr>
				<td>第八节</td>
			
			</tr>
			<tr class="active">
				<td>第九节</td>
				<td rowspan="2"><?php echo ($list[20]["cou_name"]); ?></br><?php echo ($list[20]["tea_name"]); ?> <?php echo ($list[20]["cou_place"]); ?></br><?php echo ($list[20]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[14]["cou_name"]); ?></br><?php echo ($list[14]["tea_name"]); ?> <?php echo ($list[14]["cou_place"]); ?></br><?php echo ($list[14]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[19]["cou_name"]); ?></br><?php echo ($list[19]["tea_name"]); ?> <?php echo ($list[19]["cou_place"]); ?></br><?php echo ($list[19]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[3]["cou_name"]); ?></br><?php echo ($list[3]["tea_name"]); ?> <?php echo ($list[3]["cou_place"]); ?></br><?php echo ($list[3]["cou_interval"]); ?></td>
				<td rowspan="2"><?php echo ($list[22]["cou_name"]); ?></br><?php echo ($list[22]["tea_name"]); ?> <?php echo ($list[22]["cou_place"]); ?></br><?php echo ($list[22]["cou_interval"]); ?></td>
				<td rowspan="2"></td>
				<td rowspan="2"></td>
			
			</tr>
			<tr class="active">
				<td>第十节</td>

			</tr>

			
		</tbody>
		</table>
		
		</br>
		</br>
		</br>
	<table class="table table-hover table-bordered">
	 <?php echo ($thead); ?>
	  <tbody>
		<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
				<td><?php echo ($vo["cou_name"]); ?></td>
				<td><?php echo ($vo["tea_name"]); ?></td>
				<td><?php echo ($vo["cou_place"]); ?></td>
				<td><?php echo ($vo["cou_interval"]); ?></td>
				<td><a href="<?php echo U('teaCourse/class_stu');?>?cou_number=<?php echo ($vo["cou_number"]); ?>">学生名单</a></td>
				<td><a href="<?php echo U('exam/addexam');?>?cou_number=<?php echo ($vo["cou_number"]); ?>&cou_name=<?php echo ($vo["cou_name"]); ?>">添加考试</a></td>
			</tr><?php endforeach; endif; ?>
	  </tbody>
	</table>
	<?php echo ($page); ?>
	</div>
   

</body>
</html>