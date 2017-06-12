<?php
namespace Admin\Controller;
class TeacherController extends BaseController{
	public function addTeacher(){
		$this->isLogin();
		if(!IS_POST)
			$this->all_pro();
		$this->addDate(D('Teacher'));
	}
	public function searchTeacher()
	{
		$this->isLogin();
		$Teacher=D('Teacher');
		$thead= '<thead><tr><th>姓名</th><th>编号</th><th>专业</th><th>注册时间</th> <th>删除</th><th>修改</th> </tr></thead>';
  		$field='tea_name,tea_idnum,pro_name,tea_enrol';
  		$order='tea_enrol';
  		$join="left join  tpro_classification ON tpro_classification.pro_code = ttea_information.pro_code";
 		if($_POST['name']!='')$condition[$_POST["type"]]=$_POST['name'];
  		$this->search($Teacher,$field,$order,$thead,$condition,$join);
	}

	public function deleteTeacher()
	{
		$this->isLogin();
		$this->delete(D('Teacher'));
	}		

	public function alterTeacher()
	{
		$this->isLogin();
		if(IS_POST)
		{
			$this->alterDate(D('Teacher'));
		}
		else
		{
			$who['tea_idnum']=$_GET['tea_idnum'];//$who=$_GET['tea_idnum'];  之前错误的写法
			$result=D('Teacher')->field('tea_name,tea_idnum,pro_name,ttea_information.pro_code,tea_idcard,tea_password')
			->join(array('left join tpro_classification ON tpro_classification.pro_code = ttea_information.pro_code'))->where($who)->find();
			$this->assign('result',$result);

			$this->all_pro();
			$this->display();
		}
	}

	protected function all_pro()
	{
    	$_class=M()->table("tpro_classification")->field("pro_code,pro_name")->select();
    	$this->assign('_pro',$_class);
	}
}












