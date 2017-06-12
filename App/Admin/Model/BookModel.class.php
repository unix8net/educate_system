<?php
namespace Admin\Model;
use Think\Model;
class BookModel extends Model {
	protected $trueTableName = 'tedu_textbook'; 

/**
 * 自动验证表单的信息，如何不错在调用add函数后数据将被插入数据库
 * @var array
 */
	protected $_validate=array(
		array('cou_code','require','课程代码必须'),
		array('cou_code','','只能添加一本书',0,'unique',1),
		array('edu_name','require','书名必须')
	);

	public function deleteMember()
	{
		$condition['cou_code']=I('cou_code');
		return  $this->where($condition)->delete()?0:1;
	}

	public function alterMember()
	{
		$condition['cou_code']=$_POST['cou_code'];
		return $this->where($condition)->save($_POST)? 0:1;
	}
}
