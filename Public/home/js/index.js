$(document).ready(function(){
	var welcome=$("#welcome").html();
	$("#welcome").remove();


	var text='<nav class="navbar navbar-fixed-top navbar-inverse ue-docs-nav" role="navigation">'+
	'    <div class="container">'+
	'        <div class="navbar-header">'+
	'            <a href="#" class="navbar-brand">数理学院教务系统</a>'+
	'        </div>'+
	'        <div>'+welcome+
	'        </div>'+
	'    </div>'+
	'</nav>'+
 '   <div id="guidebar" class="ue-sidebar hidden-print navbar-fixed-top" role="complementary">'+
 '       <ul class="ue-sidenav">'+
 '           <li class="category">'+
	'            <a href="#" class="category-i">个人信息</a>'+
 '               <ul class="nav">'+
	'               <li class=""><a href="/educate/index.php/Home/PersonInfo/showPerson.html" >学籍信息</a></li>'+
 '                  <li class="active"><a href="/educate/index.php/Home/PersonInfo/showCurriculum.html">课表查询</a></li>'+
 '                  <li><a href="/educate/index.php/Home/PersonInfo/showExam.html">考试查询</a></li>'+
 '                  <li><a href="/educate/index.php/Home/PersonInfo/showScore.html">成绩查询</a></li>'+
 '                  <li><a href="/educate/index.php/Home/PersonInfo/alterPassword.html">密码修改</a></li>'+
 '               </ul>'+
 '           </li>'+
 '       '+
 '          <li class="category">'+
 '          	   <a href="javascript:void(0)" class="category-i">课程管理</a>'+
 '              <ul class="nav">  '+
	'	               <li><a href="/educate/index.php/Home/ManageCourse/pri_election.html">选课</a></a></li>'+
	'	               <li><a href="/educate/index.php/Home/ManageCourse/selectBook.html">选购教程</a></li>'+
	'	               <li><a href="/educate/index.php/Home/ManageCourse/judge_edu.html">期末评教</a></li>'+
	'			</ul>'+
	'		</li>'+
	'		<li class="category">'+
	'			<a href="javascript:void(0)" class="category-i">公共查询</a>'+
 '              <ul class="nav">'+
	'	               <li><a href="/educate/index.php/Home/PublicInquire/AllCourse.html">全校开课查询</a></li>'+
	'	               <li><a href="/educate/index.php/Home/PublicInquire/ClassInfo.html">班级信息查询</a></li>'+
	'			</ul>'+
	'		</li>'+
	'	</ul>'+
	'</div>'
	$("body").prepend(text);
	
	$('.category-i').click(function(){
		$(this).siblings().toggle();
	});

});