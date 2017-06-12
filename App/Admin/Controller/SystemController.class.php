<?php
namespace Admin\Controller;
class SystemController extends BaseController
{
	public function set_course()
	{
		$this->isLogin();
		$Teacher=D('Courseson');
		$thead= '<thead><tr><th>课程序号</th><th>课程名称</th><th>学年学期</th><th>录入时间</th><th>老师</th>
				<th>开课状态</th><th>向前</th><th>向后</th></tr></thead>';
  		$field='cou_number,cou_place,cou_time,cou_name,cou_term,cou_total,cou_flag,tea_name';
  		$join=array("left join ttea_information ON ttea_information.tea_idnum = tcou_information.tea_idnum",
  					"left join tcou_classification ON tcou_classification.cou_code = tcou_information.cou_code");
  		$order='cou_flag';
 		if($_POST['value']!='')$condition[$_POST["type"]]=$_POST['value'];
  		$this->search($Teacher,$field,$order,$thead,$condition,$join);
	}

	public function inc_flag()
	{
		$this->isLogin();
		if(IS_GET)
		{
			if($_GET[cou_flag]>4)
				echo "不能改变";
			else{
				D("Courseson")->where("cou_number='$_GET[cou_number]'")->setInc('cou_flag',1);
				echo "改变成功";
			}
		}		
	}
	public function dec_flag()
	{
		$this->isLogin();
		if(IS_GET)
		{
			if($_GET[cou_flag]<2)
				echo "不能改变";
			else{
				D("Courseson")->where("cou_number='$_GET[cou_number]'")->setDec('cou_flag',1);
				echo "改变成功";
			}
		}		
	}
}
