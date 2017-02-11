<?php
namespace Admin\Model;
use Think\Model;
class CourseModel extends Model{

	protected $trueTableName = 'tcou_classification'; 
	protected $_validate=array(
		array('cou_name','require','名字必须'),
		array('cou_code','require','专业必须'),
		array('cou_code','','课程已经存在',0,'unique',1),
		array('cou_name','','存在',0,'unique',1),
		array('pro_academy','require','开课院系必须'),
		array('cou_credit','require','学分必须'),
		array('cou_type','require','类型必须')
		);
	public function deleteMember()
	{
		$condition['cou_code']=I('cou_code');
		return $this->where($condition)->delete()?0:1;
	}
	public function alterMember()
	{
		$condition['cou_code']=$_POST['cou_code'];
		return $this->where($condition)->field('cou_name,pro_academy,cou_type,cou_credit')->save($_POST)? 0:1;
	}
}

?>