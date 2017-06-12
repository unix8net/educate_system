<?php
namespace Admin\Model;
use Think\Model;
class ProfessModel extends Model {
	protected $trueTableName = 'tpro_classification'; 

/**
 * 自动验证表单的信息，如何不错在调用add函数后数据将被插入数据库
 * @var array
 */
	protected $_validate=array(
		array('pro_code','require','专业代码必须'),
		array('pro_name','require','专业名称必须'),
		array('pro_academy','require','院系名必须'),
		array('pro_level','require','学历层次必须'),
		array('pro_year','require','学制必须'),
		array('pro_type','require','学科门类必须'),
		array('pro_code','','该专业代码已存在',0,'unique',1),
		array('pro_name','','专业名称已存在',0,'unique',1),
		array('pro_year',array(2,3,4),'学制不在范围内',0,'in')
	);

	public function deleteMember()
	{
		$condition['pro_code']=I('pro_code');
		return  $this->where($condition)->delete()?0:1;
	}
	public function alterMember()
	{
		$condition['pro_code']=$_POST['pro_code'];
		return $this->where($condition)->save($_POST)? 0:1;
	}
}