<?php
namespace Admin\Model;
use Think\Model;
class TeacherJudgeModel extends Model{
	protected $trueTableName = 'ttea_curriculum'; 
	protected $_validate=array(
		array('tea_idnum','require','课程代码必须'),
		array('cou_number','require','课程序号必须')
		);
	public function deleteMember()
	{
		$condition['cou_number']=I('cou_number');
		return $this->where($condition)->delete()?0:1;
	}
	public function alterMember()
	{
		$condition['cou_number']=$_POST['cou_number'];
		$data['tea_idnum']=$_POST['tea_idnum'];

		return $this->where($condition)->field('tea_idnum')->data($data)->save()? 0:1;
	}
}

?>