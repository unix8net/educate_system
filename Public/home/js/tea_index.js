$(document).ready(function(){
	var welcome=$("#welcome").html();
	$("#welcome").remove();

	var text=
	'<nav class="navbar navbar-inverse navbar-fixed-top ue-docs-nav" role="navigation">'+
	'    <div class="container">'+
	'        <div class="navbar-header">'+
	'            <a href="#" class="navbar-brand">数理学院教务系统</a>'+
	'        </div>'+welcome+
	'    </div>'+
	'</nav>'+
	'<div id="guidebar" class="ue-sidebar hidden-print .navbar-fixed-top" role="complementary">'+
    '    <ul class="ue-sidenav">'+
    '        <li class="category">'+
	'            <a href="#" class="category-i">个人信息</a>'+
    '            <ul class="nav">'+
	'               <li class=""><a href="/educate/index.php/Home/teaInfo/showPerson.html" >个人资料</a></li>'+
    '               <li class="active"><a href="/educate/index.php/Home/teaInfo/alterPassword.html">密码修改</a></li>'+
    '            </ul>'+
    '        </li>'+
    '       <li class="category">'+
    '       	   <a href="javascript:void(0)" class="category-i">课程管理</a>'+
    '           <ul class="nav">  '+
    '                   <li><a href="/educate/index.php/Home/teaCourse/showCurriculum.html">课表查询</a></li>'+
	'	               <li><a href="/educate/index.php/Home/teaCourse/showExam.html">监考信息</a></li>'+
	'	               <li><a href="/educate/index.php/Home/teaCourse/registerScore.html">成绩录入</a></li>'+
	'	               <li><a href="/educate/index.php/Home/teaCourse/finalJudge.html">期末评教结果</a></li>'+
	'			</ul>'+
	'		</li>'+
	'		<li class="category">'+
	'			<a href="javascript:void(0)" class="category-i">公共查询</a>'+
    '           <ul class="nav">'+
	'	               <li><a href="/educate/index.php/Home/PublicInquire/AllCourse.html?who=tea_">全校开课查询</a></li>'+
	'	               <li><a href="/educate/index.php/Home/PublicInquire/ClassInfo.html?who=tea_">班级信息查询</a></li>'+
	'			</ul>'+
	'		</li>'+
	'	</ul>'+
	'</div>'
	$("body").prepend(text);
		$(".category-i").click(function(){
		$(this).siblings().toggle();
	});
});