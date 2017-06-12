<?php
namespace  Admin\Controller;
class ClassController extends BaseController
{
	public function addClass()
	{
		$this->isLogin();
		$this->assign('pro_code',$_GET['pro_code']);	
		$this->addDate(D('Class'));
		
	}

	public function deleteClass()
	{
		$this->isLogin();
		$this->delete(D('Class'));
	}

	public function alterClass()
	{
		$this->isLogin();
		if(IS_POST)
		{
			$this->alterDate(D('Class'));
		}
		else
		{
			$who['cla_code']=I('cla_code');
			$result=D('Class')->where($who)->find();
			$this->assign('result',$result);
			$this->display();
		}
		
	}
	public function manageClass()
	{
		$this->isLogin();
		$Class=D('Class');
		$thead= '<thead><tr><th>班级代码</th><th>班级名称</th><th>专业代码</th><th>删除</th><th>修改</th></tr></thead>';
  		$field='cla_code,cla_name,pro_code';
  		$order='cla_code';
 		$condition['pro_code']=$_GET['pro_code'];
 		$this->assign('pro_code',$_GET['pro_code']);
  		$this->search($Class,$field,$order,$thead,$condition);	
	}
	public function searchClass()
	{

		$this->isLogin();
		$Class=D('Class');
		$thead= '<thead><tr><th>班级代码</th><th>班级名称</th><th>专业代码</th><th>删除</th><th>修改</th></tr></thead>';
  		$field='cla_code,cla_name,pro_code';
  		$order='cla_code';
 		if(IS_POST)$condition[$_POST["type"]]=$_POST['name'];
  		$this->search($Class,$field,$order,$thead,$condition);
	}
}
