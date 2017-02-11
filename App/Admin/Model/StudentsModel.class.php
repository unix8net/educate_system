<?php 
namespace Admin\Model;
use Think\Model;
class StudentsModel extends Model{

	protected $trueTableName = 'tstu_information'; 

	protected $_validate=array(
		array('stu_name','require','用户名必须'),
		array('stu_idcard','','该账号已存在',0,'unique',1),
		array('stu_idcard','require','身份证必须'),
		array('stu_idcard','18','身份证长度不够',0,'length'),
		array('stu_class','require','班级必须')
		);

	public function alterMember()
	{
		$condition['stu_idnum']=$_POST['stu_idnum'];
		return $this->where($condition)->field('stu_class,stu_name,stu_idcard')->save($_POST)? 0:1;
	}

	/**
	 * 通过学号删除学生
	 * @return int 0表示成功1失败
	 */
	public function deleteMember()
	{
		$condition['stu_idnum']=I('stu_idnum');
		return $this->where($condition)->delete()?0:1;
	}
}

?>