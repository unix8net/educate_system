<?php
namespace Admin\Model;
use Think\Model;
class CoursesonModel extends Model{
	protected $trueTableName = 'tcou_information'; 
	protected $_validate=array(
		array('cou_code','require','课程代码必须'),
		array('cou_number','require','课程序号必须'),
		array('cou_term','require','学年学期必须'),
		array('cou_total','require','总可选人数必须'),
		array('cou_remainder','require','剩余人数必须'),
		array('cou_number','','课程已经存在',0,'unique',1),
		array('tea_idnum','require','老师id必须')
		);
	public function deleteMember()
	{
		$condition['cou_number']=I('cou_number');
		return $this->where($condition)->delete()?0:1;
	}
	public function alterMember()
	{
		$condition['cou_number']=$_POST['cou_number'];
		return $this->where($condition)->save($_POST)? 0:1;
	}
}

?>