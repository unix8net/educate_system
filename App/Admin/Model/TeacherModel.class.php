<?php 
namespace Admin\Model;
use Think\Model;
class TeacherModel extends Model{

	protected $trueTableName = 'ttea_information'; 
	protected $_validate=array(
		array('tea_name','require','名字必须'),
		array('pro_code','require','专业必须'),
		array('tea_idcard','','身份证已存在',0,'unique',1),
		array('tea_idcard','require','身份证必须'),
		array('tea_idcard','18','身份证长度不够',0,'length')
		);
	public function deleteMember()
	{
		$condition['tea_idnum']=I('tea_idnum');
		return $this->where($condition)->delete()?0:1;
	}
	public function alterDate()
	{
		$condition['tea_idnum']=I('tea_idnum');
		return $this->where($condition)->field('tea_name,tea_idcard,tea_password,pro_code')->save($_POST)? 0:1;
	}
	public function alterMember()
	{
		$condition['tea_idnum']=$_POST['tea_idnum'];
		return $this->where($condition)->field('tea_name,pro_code,tea_idcard,tea_password')->save($_POST)? 0:1;
	}
}
