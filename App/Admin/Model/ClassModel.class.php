<?php
namespace Admin\Model;
use Think\Model;
class ClassModel extends Model {
	protected $trueTableName='tcla_code';
	protected $_validate=array(
		array('cla_code','require','名字必须'),
		array('cla_code','','存在',0,'unique',1),
		array('cla_name','require','名字必须'),
		array('cla_name','require','名字必须'),
		array('pro_name','require','专业代码必须')
		);
	public function deleteMember()
	{
		$condition['cla_code']=I('cla_code');
		return $this->where($condition)->delete()?0:1;
	}
	public function alterMember()
	{
		$condition['cla_code']=$_POST['cla_code'];
		return $this->where($condition)->field('cla_code,cla_name,pro_code')->save($_POST)? 0:1;
	}
}
