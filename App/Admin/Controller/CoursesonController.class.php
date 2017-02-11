<?php
namespace Admin\Controller;
class CoursesonController extends BaseController{
	public function addCourseson()
	{
		$this->isLogin();
		$this->addDate(D('Courseson'));
	}
	public function deleteCourseson()
	{
		$this->isLogin();
		$this->delete(D('Courseson'));
	}
	public function alterCourseson()
	{
		$this->isLogin();
		if(IS_POST)
		{
			$this->alterDate(D('Courseson'));
		}
		else
		{
			$who['cou_number']=I('cou_number');
			$result=D('Courseson')->where($who)->find();
			$this->assign('result',$result);
			$this->display();
		}
		
	}	
} 
?>