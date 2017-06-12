<?php
namespace  Home\Controller;
class teaInfoController extends BaseController
{
	//显示个人信息
	public function showPerson()
	{
		$this->is_tea_login();
		$table="ttea_information";
		$join=array('left join ttea_detail ON ttea_information.tea_idnum = ttea_detail.tea_idnum',
					'left join tpro_classification ON tpro_classification.pro_code = ttea_information.pro_code');

		$condition['ttea_information.tea_idnum']=session('tea_name');

		$field="ttea_information.tea_idnum,tea_qq,tea_idcard,tea_name,pro_name,tea_enrol,tea_sex,tea_native,tea_nation,tea_title,tea_party,tea_birth,tea_address,tea_contact";

		$list=M()->table($table)->join($join)->where($condition)->field($field)->select();
		$this->assign('list',$list);
		$this->display();
	}

	public function updateinfo()
	{
		$this->is_tea_login();
		if(M()->table("ttea_detail")->data($_POST)->where("tea_idnum=".session('tea_name'))->save())
		{
			$this->success("修改成功");
		}
		else
		{
			$this->error("修改失败");
		}

	}

	//修改密码
	public function alterPassword()
	{
		$this->is_tea_login();
		if(IS_POST)
		{
			if($_POST['new_password']==$_POST['repassword']&&$_POST['new_password']!='')
			{
				M()->table("ttea_information")->where("tea_idnum=".session('tea_name'))->field("tea_password")->data("tea_password=".$_POST['new_password'])->save();
				$this->success("修改成功",U('Home/teaInfo/alterPassword'));
			}
		}
		else
		{
			$password=M()->table("ttea_information")->where("tea_idnum=".session('tea_name'))->field("tea_password")->find();
			$this->assign('password',$password['tea_password']);	
			$this->display();		
		}
	}
}