<?php
namespace Admin\Model;
use Think\Model;
class AdmModel extends Model {
	protected $trueTableName = 'tadm_information'; 

/**
 * 自动验证表单的信息，如何不错在调用add函数后数据将被插入数据库
 * @var array
 */
	protected $_validate=array(
		array('adm_name','require','用户名必须'),
		array('adm_name','','该账号已存在',0,'unique',1),
		array('adm_idcard','','该账号已存在',0,'unique',1),
		array('adm_password','require','密码必须'),
		array('adm_password','6,30','密码长度不够',0,'length'),
		array('adm_permission',array(0,1),'权限设置不在范围内',0,'in'),
		array('repassword','adm_password','确认密码不一致',0,'confirm'),
		array('adm_idcard','require','身份证必须'),
		array('adm_idcard','18','身份证长度不够',0,'length')
	);
	public function checkPermission()
	{
		$condition['adm_name']=session('name');
		$result=$this->where($condition)->field('adm_permission')->find();
		return $result['adm_permission'];
	}

	public function deleteMember()
	{
		$condition['adm_name']=I('adm_name');
		return  $this->where($condition)->delete()?0:1;
	}
}