

use edu_manage;
DROP TABLE IF EXISTS tadm_information;
CREATE TABLE tadm_information (
  adm_name varchar(15) NOT NULL COMMENT '姓名',
  adm_password varchar(20) NOT NULL COMMENT '登陆密码',
  adm_idcard varchar(18) NOT NULL DEFAULT '' UNIQUE COMMENT '身份证号',
  adm_contact varchar(20) COMMENT '联系方式',  
  adm_permission tinyint(1) NOT NULL DEFAULT '0' COMMENT '权限等级',
  adm_flag smallint unsigned DEFAULT 0 COMMENT '修改标志',
  PRIMARY KEY (adm_name)
) ENGINE=InnoDB CHARSET=utf8;


DROP TABLE IF EXISTS ttea_information;
CREATE TABLE ttea_information (
  tea_idnum int unsigned NOT NULL AUTO_INCREMENT COMMENT '教师编号',
  tea_idcard varchar(18) NOT NULL DEFAULT '' COMMENT '身份证号',
  tea_name varchar(15) NOT NULL COMMENT '姓名',
  tea_password varchar(20) NOT NULL DEFAULT 123456 COMMENT '登陆密码',
  pro_code varchar(20) NOT NULL COMMENT '专业代码',
  tea_enrol timestamp DEFAULT CURRENT_TIMESTAMP COMMENT '入职注册时间',
  CONSTRAINT tea_information_fk1 FOREIGN KEY (pro_code) REFERENCES tpro_classification (pro_code) on DELETE CASCADE on UPDATE CASCADE,
  PRIMARY KEY (tea_idnum)
  ) ENGINE=InnoDB AUTO_INCREMENT=10000000 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS ttea_detail;
CREATE TABLE ttea_detail (
  tea_idnum int unsigned NOT NULL COMMENT '教师编号',
  tea_sex tinyint(1) DEFAULT 0 COMMENT '性别',
  tea_native varchar(10) NOT NULL DEFAULT '' COMMENT '籍贯',
  tea_nation varchar(10) NOT NULL DEFAULT '' COMMENT '民族',
  tea_party varchar(10) NOT NULL DEFAULT '' COMMENT '入团情况',
  tea_title varchar(10) NOT NULL DEFAULT '' COMMENT '职称',
  tea_address varchar(30) NOT NULL DEFAULT '' COMMENT '家庭住址',
  tea_contact varchar(20) NOT NULL DEFAULT '' COMMENT '联系方式',
  CONSTRAINT tea_detail_fk1 FOREIGN KEY (tea_idnum) REFERENCES ttea_information (tea_idnum) on DELETE CASCADE on UPDATE CASCADE,
  PRIMARY KEY (tea_idnum)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS tpro_classification;
CREATE TABLE tpro_classification (
  pro_code varchar(10) NOT NULL UNIQUE COMMENT '专业代码',
  pro_name varchar(20) NOT NULL COMMENT '专业名称',
  pro_academy varchar(20) NOT NULL COMMENT '院系名',
  pro_level tinyint(1) NOT NULL DEFAULT 1 COMMENT '学历层次',
  pro_year tinyint(1) NOT NULL DEFAULT 4 COMMENT '学制',
  pro_type varchar(2) NOT NULL DEFAULT '07' COMMENT '学科门类',
  PRIMARY KEY (pro_code)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tcla_code;
CREATE TABLE tcla_code (
  cla_code varchar(20) NOT NULL COMMENT '班级代码',
  cla_name varchar(20) NOT NULL COMMENT '班级名称',
  pro_code varchar(10) NOT NULL COMMENT '专业代码',
  CONSTRAINT cla_code_fk1 FOREIGN KEY (pro_code) REFERENCES tpro_classification (pro_code) on DELETE CASCADE on UPDATE CASCADE,
  PRIMARY KEY (cla_code)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS tcou_classification;
CREATE TABLE tcou_classification (
  cou_code varchar(20) NOT NULL COMMENT '课程代码',
  cou_name varchar(20) NOT NULL COMMENT '课程名称',
  pro_academy varchar(20) NOT NULL COMMENT '开课院系',
  cou_credit decimal(3,1) NOT NULL COMMENT '课程学分',
  cou_type tinyint(1) NOT NULL DEFAULT 0 COMMENT '课程类别',
  PRIMARY KEY (cou_code)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- ----------------------------
-- Table structure for tcou_information 课程信息表
-- ----------------------------


DROP TABLE IF EXISTS tcou_information;
CREATE TABLE tcou_information (
  cou_code varchar(20) NOT NULL COMMENT '课程代码', 
  cou_number varchar(30) COMMENT '课程序号',
  cou_term varchar(20) NOT NULL COMMENT '学年学期',
  cou_interval varchar(20) NOT NULL COMMENT '教学周区间',
  cou_place varchar(20) NOT NULL COMMENT '教学地点',
  cla_code varchar(20) NOT NULL COMMENT '班级代码',
  cou_time timestamp  DEFAULT CURRENT_TIMESTAMP COMMENT '录入课程时间',
  cou_total tinyint(3) unsigned NOT NULL COMMENT '总可选人数',
  cou_remainder tinyint(3) unsigned NOT NULL COMMENT '剩余人数',
  cou_remark varchar(300) COMMENT '备注',
  CONSTRAINT cou_information_fk1 FOREIGN KEY (cou_code) REFERENCES tcou_classification (cou_code) on DELETE CASCADE  on UPDATE CASCADE,
  PRIMARY KEY (cou_number)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;