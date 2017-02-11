-- ----------------------------
-- Table structure for tstu_information -- 学生基本信息表
-- ----------------------------

DROP TABLE IF EXISTS tstu_information;
CREATE TABLE tstu_information (
  stu_idnum int unsigned AUTO_INCREMENT COMMENT '学生学号',
  stu_password varchar(20) NOT NULL COMMENT '登陆密码',
  stu_name varchar(15) NOT NULL COMMENT '姓名',
  PRIMARY KEY (stu_idnum)
  ) ENGINE=InnoDB AUTO_INCREMENT=20170000 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tstu_information
-- ----------------------------
-- INSERT INTO 'tstu_information' VALUES (
-- 

-- ----------------------------
-- Table structure for tstu_detail -- 学生详细信息表
-- ----------------------------

DROP TABLE IF EXISTS tstu_detail;
CREATE TABLE tstu_detail (
  stu_idnum int unsigned COMMENT '学生学号',
  stu_sex tinyint(1) DEFAULT '0' COMMENT '性别',
  stu_native varchar(10) NOT NULL DEFAULT '' COMMENT '籍贯',
  stu_nation varchar(10) NOT NULL DEFAULT '' COMMENT '民族',
  stu_party varchar(10) NOT NULL DEFAULT '' COMMENT '入团情况',
  stu_birth varchar(6) NOT NULL  DEFAULT '' COMMENT '出生年月',
  stu_idcard varchar(18) NOT NULL UNIQUE COMMENT '身份证号',
  stu_address varchar(30) NOT NULL DEFAULT '' COMMENT '家庭住址',
  stu_contact varchar(20) NOT NULL DEFAULT '' COMMENT '联系方式',
  stu_enrol timestamp NOT NULL COMMENT '入学注册时间',
  CONSTRAINT stu_detail_fk1 FOREIGN KEY (stu_idnum) REFERENCES tstu_information (stu_idnum) on DELETE CASCADE on UPDATE CASCADE,
  PRIMARY KEY (stu_idnum)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tstu_detail
-- ----------------------------
-- INSERT INTO 'tstu_detail' VALUES (
-- 