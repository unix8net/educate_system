<?php
namespace  Home\Controller;
class PublicInquireController extends BaseController
{
	public function AllCourse()
	{
		$this->check();
		$this->All_Course();
	}

	public function ClassInfo()
	{
		$this->check();
		$this->Class_Info();
	}

	//显示某个班上的学生
	public function show_class_stu()
	{
		$this->check();
		$this->show_stu();
	}
	protected function check()
	{
		if($_GET['who']=="tea_")
		{
			$this->assign('name',session('tea_name'));
			$this->assign('out',"tea_");
			$this->is_tea_login();
		}
		else
		{
			$this->assign('name',session('stu_name'));
			$this->is_stu_login();
		}
	}
}





























