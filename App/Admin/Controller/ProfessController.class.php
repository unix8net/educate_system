<?php
namespace Admin\Controller;
class ProfessController extends BaseController{

	public function addProfess()
	{
		$this->isLogin();
		$this->addDate(D('Profess'));
	}

	public function deleteProfess()
	{
		$this->isLogin();
		$this->delete(D('Profess'));
	}

	public function alterProfess()
	{
		$this->isLogin();
		if(IS_POST)
		{
			$this->alterDate(D('Profess'));
		}
		else
		{
			$who['pro_code']=I('pro_code');
			$result=D('Profess')->where($who)->find();
			$this->assign('result',$result);
			$this->display();
		}
		
	}
	public function searchProfess()
	{

		$this->isLogin();
		$Profess=D('Profess');
		$thead= '<thead><tr><th>专业代码</th><th>专业名称</th><th>院系</th><th>学历层次</th> <th>学制</th><th>学科类别</th><th>班级管理</th><th>删除</th><th>修改</th> </tr></thead>';
  		$field='pro_code,pro_name,pro_academy,pro_level,pro_year,pro_type';
  		$order='pro_code';
 		if(IS_POST)$condition[$_POST["type"]]=$_POST['name'];
  		$this->search($Profess,$field,$order,$thead,$condition);
	}


}

?>




















