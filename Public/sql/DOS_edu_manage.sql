SET FOREIGN_KEY_CHECKS=0;
DROP DATABASE IF EXISTS edu_manage;
CREATE DATABASE IF NOT EXISTS edu_manage;
use edu_manage;

-- ----------------------------
-- Table structure for tpro_academy -- 系院表
-- ----------------------------

DROP TABLE IF EXISTS tpro_academy;
CREATE TABLE tpro_academy (
  pro_academy varchar(20) NOT NULL COMMENT '院系名',
  PRIMARY KEY (pro_academy)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- ----------------------------
-- ----------------------------
-- Records of tpro_academy
-- ----------------------------
INSERT INTO tpro_academy VALUES('数理学院'),
('石油与天然气工程学院'),
('机械与动力工程学院'),
('建筑工程学院'),
('电气与信息工程学院'),
('冶金与材料工程学院'),
('工商管理学院'),
('安全工程学院'),
('化学化工学院'),
('人文艺术学院'),
('外国语学院');


-- ----------------------------
-- Table structure for tpro_academy -- 专业分类表
-- ----------------------------


DROP TABLE IF EXISTS tpro_classification;
CREATE TABLE tpro_classification (
  pro_code varchar(10) NOT NULL UNIQUE COMMENT '专业代码',
  pro_name varchar(20) NOT NULL COMMENT '专业名称',
  pro_academy varchar(20) NOT NULL COMMENT '院系名',
  pro_level tinyint(1) DEFAULT 1 COMMENT '学历层次',
  pro_year tinyint(1) DEFAULT 4 COMMENT '学制',
  pro_type varchar(2) DEFAULT '07' COMMENT '学科门类',
  CONSTRAINT pro_classification_fk1 FOREIGN KEY (pro_academy) REFERENCES tpro_academy (pro_academy) on DELETE CASCADE on UPDATE CASCADE,

  PRIMARY KEY (pro_code)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- ----------------------------
-- 学历层次默认为1==本科，约定0==专科，2=研究生
-- 学制默认为4年
-- 2011年3月，中华人民共和国国务院学位委员会和教育部颁布修订的
-- 《学位授予和人才培养学科目录（2011年）》，
-- 规定我国分为
-- 哲学、经济学、法学、教育学、文学、
-- 历史学、理学、工学、农学、医学、
-- 军事学、管理学、艺术学
-- 13个学科门类。
-- 默认7==理学
-- ----------------------------
-- Records of tpro_classification
-- ----------------------------
/*
INSERT INTO tpro_classification (pro_code,pro_name,pro_academy) VALUES ('210341','应用数学','数理学院'),
('210350','理论与应用力学','数理学院'),
('210351','物理学','数理学院');
*/






-- ----------------------------
-- Table structure for tstu_information -- 学生基本信息表
-- ----------------------------

DROP TABLE IF EXISTS tstu_information;
CREATE TABLE tstu_information (
  stu_idnum int unsigned AUTO_INCREMENT COMMENT '学生学号',
  stu_idcard varchar(18) NOT NULL UNIQUE COMMENT '身份证号',
  stu_name varchar(15) NOT NULL COMMENT '姓名',
  stu_password varchar(20) DEFAULT 123456 COMMENT '登陆密码',
  cla_code varchar(20) NOT NULL COMMENT '班级代码',
  stu_enrol timestamp DEFAULT CURRENT_TIMESTAMP COMMENT '入学注册时间',
  CONSTRAINT stu_information_fk1 FOREIGN KEY (cla_code) REFERENCES tcla_code (cla_code) on DELETE CASCADE on UPDATE CASCADE,
  PRIMARY KEY (stu_idnum)
  ) ENGINE=InnoDB AUTO_INCREMENT=20170000 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tstu_information
-- ----------------------------
INSERT INTO tstu_information (stu_idcard,stu_name,cla_code)
 VALUES ("102221199401010131","周昊","210341201301"),
("500238199610112323","梁玥","210341201301"),
("430328199606241101","陈风木","210341201301"),
("210212199403011132","肖朋","210341201301"),
("240132199501205313","叶灵苏","210341201302"),
("300132199503210563","陆渐","210341201302"),
("53023219950705430X","王公笑","210350201301"),
("120228199411140131","天明","210351201301"),
("132232199504024321","张士诚","210350201301"),
("231232199412303132","刘山","210351201301"),
("231321199602211421","王小江","210341201302"),
("132448199612303443","王霂明","210351201301"),
("543123199609137687","李逸华","210350201302"),
("421321199401114143","郭襄","210350201302"),
("523145199505265476","李格","210351201302"),
("231555199511306576","朱穆","210351201302"),
("512422199508090775","季梦","210350201301"),
("231214199412213676","贾雨村","210351201302"),
("173214199505162322","徐悲鸿","210350201301"),
("385213199408268754","花满楼","210351201301"),
("200321199604036589","上官仪","210341201302");

-- ----------------------------
-- Table structure for tstu_detail -- 学生详细信息表
-- ----------------------------

DROP TABLE IF EXISTS tstu_detail;
CREATE TABLE tstu_detail (
  stu_idnum int unsigned COMMENT '学生学号',
  stu_sex tinyint(1) DEFAULT 0 COMMENT '性别',
  stu_native varchar(10) DEFAULT '' COMMENT '籍贯',
  stu_nation varchar(10) DEFAULT '' COMMENT '民族',
  stu_party varchar(10) DEFAULT '' COMMENT '入团情况',
  stu_birth varchar(6) DEFAULT '' COMMENT '出生年月',
  stu_address varchar(30) DEFAULT '' COMMENT '家庭住址',
  stu_contact varchar(20) DEFAULT '' COMMENT '联系方式',
  CONSTRAINT stu_detail_fk1 FOREIGN KEY (stu_idnum) REFERENCES tstu_information (stu_idnum) on DELETE CASCADE on UPDATE CASCADE,
  PRIMARY KEY (stu_idnum)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tstu_detail
-- ----------------------------
-- INSERT INTO tstu_detail VALUES (


-- ----------------------------
-- Table structure for ttea_information 教师基本信息
-- ----------------------------

DROP TABLE IF EXISTS ttea_information;
CREATE TABLE ttea_information (
  tea_idnum int unsigned NOT NULL AUTO_INCREMENT COMMENT '教师编号',
  tea_idcard varchar(18) NOT NULL UNIQUE COMMENT '身份证号',
  tea_name varchar(15) NOT NULL COMMENT '姓名',
  tea_password varchar(20) DEFAULT 123456 COMMENT '登陆密码',
  pro_code varchar(20) NOT NULL COMMENT '专业代码',
  tea_enrol timestamp DEFAULT CURRENT_TIMESTAMP COMMENT '入职注册时间',
  CONSTRAINT tea_information_fk1 FOREIGN KEY (pro_code) REFERENCES tpro_classification (pro_code) on DELETE CASCADE on UPDATE CASCADE,
  PRIMARY KEY (tea_idnum)
  ) ENGINE=InnoDB AUTO_INCREMENT=10000000 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ttea_information
-- ----------------------------
INSERT INTO ttea_information (tea_idcard,tea_name,pro_code)
VALUES ("652145198212014582","岳灵珊","210341"),
("342765198312141105","朱九真","210341"),
("321235198005050014","高飞","210351"),
("213134198910022320","慕容秋荻","210350"),
("643321197810105524","李慕白","210341"),
("534123198104240554","袁本初","210351"),
("122112198403023152","廖嵩","210351"),
("232643198409308612","木婉清","210350"),
("232145198501053122","何其芳","210350"),
("153214196901088352","张纯如","210341"),
("145984198811243545","郁达夫","210341"),
("333453199010254521","夏侯孜","210351"),
("226222197806028654","纳兰容若","210350");



-- ----------------------------
-- Table structure for ttea_detail 教师详细信息
-- ----------------------------

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

-- ----------------------------
-- Records of ttea_information
-- ----------------------------
--  INSERT INTO ttea_information () VALUES (


-- ----------------------------
-- Table structure for tadm_information 管理员信息表
-- ----------------------------

DROP TABLE IF EXISTS tadm_information;
CREATE TABLE tadm_information (
  adm_name varchar(15) NOT NULL UNIQUE COMMENT '姓名',
  adm_password varchar(20) NOT NULL COMMENT '登陆密码',
  adm_idcard varchar(18) NOT NULL UNIQUE COMMENT '身份证号',
  adm_contact varchar(20) COMMENT '联系方式',
  adm_permission tinyint(1) DEFAULT 0 COMMENT '权限等级',
  PRIMARY KEY (adm_name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tadm_information
-- ----------------------------
INSERT INTO tadm_information VALUES
("long","110404","500238199810022754","18002335548","0");





























-- ----------------------------
-- Table structure for tcou_classification  -- 课程类型表
-- ----------------------------

DROP TABLE IF EXISTS tcou_classification;
CREATE TABLE tcou_classification (
  cou_code varchar(20) NOT NULL COMMENT '课程代码',
  cou_name varchar(20) NOT NULL COMMENT '课程名称',
  pro_academy varchar(20) NOT NULL COMMENT '开课院系',
  cou_type varchar(20) NOT NULL COMMENT '课程类别',
  cou_credit decimal(3,1) NOT NULL COMMENT '课程学分',
  CONSTRAINT cou_classification_fk1 FOREIGN KEY (pro_academy) REFERENCES tpro_academy (pro_academy) on DELETE CASCADE on UPDATE CASCADE,
  PRIMARY KEY (cou_code)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- 课程类型有 通识教育课、学科基础课、专业必修课、专业选修课、任意选修课、实践教学课等

/*
-- txt批量导入
SET  AUTOCOMMIT=0;
SET  UNIQUE_CHECKS=0;
load data local infile 'C:\\Users\\long0816\\Desktop\\41.txt' into table tcou_classification fields terminated by 't';
SET  AUTOCOMMIT=1;
SET  UNIQUE_CHECKS=1;
*/



-- ----------------------------
-- Table structure for tcou_information 课程信息表
-- ----------------------------


DROP TABLE IF EXISTS tcou_information;
CREATE TABLE tcou_information (
  cou_number varchar(30) UNIQUE COMMENT '课程序号',
  cou_code varchar(20) NOT NULL COMMENT '课程代码',
  cou_term varchar(20) NOT NULL COMMENT '学年学期',
  cou_interval varchar(20) COMMENT '教学周区间',
  cou_place varchar(20) COMMENT '教学地点',
  cou_time timestamp DEFAULT CURRENT_TIMESTAMP COMMENT '录入课程时间',
  cou_hour tinyint(2) COMMENT '理论学时',
  cou_total tinyint(3) unsigned NOT NULL COMMENT '总可选人数',
  cou_remainder tinyint(3) unsigned NOT NULL COMMENT '剩余人数',
  cou_remark varchar(300) COMMENT '备注',
  cou_flag tinyint(1) DEFAULT 1 COMMENT '开课状态',
  CONSTRAINT cou_information_fk1 FOREIGN KEY (cou_code) REFERENCES tcou_classification (cou_code) on DELETE CASCADE  on UPDATE CASCADE,
  PRIMARY KEY (cou_number)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tcou_information
-- ----------------------------
-- INSERT INTO tcou_information VALUES (
--


-- ----------------------------
-- Table structure for ttea_curriculum 教师课程表
-- ----------------------------

DROP TABLE IF EXISTS ttea_curriculum;
CREATE TABLE ttea_curriculum (
  cou_number varchar(30) COMMENT '课程序号',
  tea_idnum int unsigned NOT NULL COMMENT '教师编号',
  tea_evaluation decimal(4,1) unsigned COMMENT '教师评测',
  tea_time timestamp DEFAULT CURRENT_TIMESTAMP COMMENT '评测时间',
  tea_remark varchar(300) COMMENT '备注',
  CONSTRAINT tea_curriculum_fk1 FOREIGN KEY (tea_idnum) REFERENCES ttea_information (tea_idnum) on DELETE CASCADE  on UPDATE CASCADE,
  CONSTRAINT tea_curriculum_fk2 FOREIGN KEY (cou_number) REFERENCES tcou_information (cou_number) on DELETE CASCADE  on UPDATE CASCADE,
  PRIMARY KEY (cou_number)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ttea_curriculum
-- ----------------------------
-- INSERT INTO ttea_curriculum VALUES (
--


-- ----------------------------
-- Table structure for tsel_record 学生选课记录表
-- ----------------------------

DROP TABLE IF EXISTS tsel_record;
CREATE TABLE tsel_record (
  cou_number varchar(30) NOT NULL COMMENT '课程序号',
  stu_idnum int unsigned NOT NULL COMMENT '学生学号',
  sel_ip varchar(12) COMMENT 'IP地址',
  sel_time timestamp DEFAULT CURRENT_TIMESTAMP COMMENT '选课时间',
  sel_remark varchar(300) COMMENT '备注',
  sel_flag tinyint(1) DEFAULT 1 COMMENT '确选状态',
  CONSTRAINT sel_record_fk1 FOREIGN KEY (stu_idnum) REFERENCES tstu_information (stu_idnum) on DELETE CASCADE  on UPDATE CASCADE,
  CONSTRAINT sel_record_fk2 FOREIGN KEY (cou_number) REFERENCES tcou_information (cou_number) on DELETE CASCADE  on UPDATE CASCADE,
  PRIMARY KEY (cou_number,stu_idnum)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tsel_record
-- ----------------------------
-- INSERT INTO tsel_record VALUES (
--

-- ----------------------------
-- Table structure for tcou_score 学生科目成绩表
-- ----------------------------

DROP TABLE IF EXISTS tcou_score;
CREATE TABLE tcou_score (
  cou_number varchar(30) NOT NULL COMMENT '课程序号',
  stu_idnum int unsigned NOT NULL COMMENT '学生学号',
  cou_normal decimal(4,1)  COMMENT '平时成绩',
  cou_midterm decimal(4,1) COMMENT '期中成绩',
  cou_end decimal(4,1) COMMENT '期末成绩',
  cou_total decimal(4,1) COMMENT '总评成绩',
  cou_final decimal(4,1) COMMENT '最终成绩',
  cou_point decimal(4,1) COMMENT '绩点',
  CONSTRAINT cou_score_fk1 FOREIGN KEY (stu_idnum) REFERENCES tstu_information (stu_idnum) on DELETE CASCADE  on UPDATE CASCADE,
  CONSTRAINT cou_score_fk2 FOREIGN KEY (cou_number) REFERENCES tcou_information (cou_number) on DELETE CASCADE  on UPDATE CASCADE,
  PRIMARY KEY (cou_number,stu_idnum)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tstu_score
-- ----------------------------
-- INSERT INTO tstu_score VALUES (
--




-- ----------------------------
-- Table structure for tcla_curriculum 班级课程信息表
-- ----------------------------

DROP TABLE IF EXISTS tcla_curriculum;
CREATE TABLE tcla_curriculum (
  cla_id int unsigned AUTO_INCREMENT COMMENT '课程信息表主键',
  cla_code varchar(20) NOT NULL COMMENT '班级代码',
  cou_number varchar(30) NOT NULL COMMENT '课程序号',
  CONSTRAINT cla_curriculum_fk1 FOREIGN KEY (cla_code) REFERENCES tcla_code (cla_code) on DELETE CASCADE on UPDATE CASCADE,
  CONSTRAINT cla_curriculum_fk2 FOREIGN KEY (cou_number) REFERENCES tcou_information (cou_number) on DELETE CASCADE  on UPDATE CASCADE,
  PRIMARY KEY (cla_id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tcla_curriculum
-- ----------------------------
-- INSERT INTO tcla_curriculum VALUES (
--



















-- ----------------------------
-- Table structure for tcla_code -- 行政班级表
-- ----------------------------

DROP TABLE IF EXISTS tcla_code;
CREATE TABLE tcla_code (
  cla_code varchar(20) NOT NULL COMMENT '班级代码',
  cla_name varchar(20) NOT NULL COMMENT '班级名称',
  pro_code varchar(10) NOT NULL COMMENT '专业代码',
  tea_idnum int unsigned DEFAULT 10000000 COMMENT '辅导员',
  CONSTRAINT cla_code_fk1 FOREIGN KEY (pro_code) REFERENCES tpro_classification (pro_code) on DELETE CASCADE on UPDATE CASCADE,
  CONSTRAINT cla_code_fk2 FOREIGN KEY (tea_idnum) REFERENCES ttea_information (tea_idnum) on DELETE CASCADE on UPDATE CASCADE,
  PRIMARY KEY (cla_code)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- 行政班级依专业划分，管理员手动增删查改
-- ----------------------------
-- Records of tcla_code
-- ----------------------------
/*
INSERT INTO tcla_code (cla_code,cla_name,pro_code) VALUES ("210341201301","应数13-1","210341"),
("210341201302","应数13-2","210341"),
("210350201301","力学13-1","210350"),
("210350201302","力学13-2","210350"),
("210351201301","物理13-1","210351"),
("210351201302","物理13-2","210351");
*/



DROP TABLE IF EXISTS exam;
CREATE TABLE exam (
  cou_number varchar(30)  NOT NULL COMMENT '课程编号',
  id int unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  title varchar(1000) NOT NULL DEFAULT '' COMMENT '题目',
  answera varchar(100) NOT NULL DEFAULT '' COMMENT '答案a',
  answerb varchar(100) NOT NULL DEFAULT '' COMMENT '答辩b',
  answerc varchar(100) NOT NULL DEFAULT '' COMMENT '答案c',
  answerd varchar(300) NOT NULL DEFAULT '' COMMENT '答案d',
  answer varchar(20) NOT NULL DEFAULT '' COMMENT '答案',
  CONSTRAINT exam_fk1 FOREIGN KEY (cou_number) REFERENCES tcou_information (cou_number) on DELETE CASCADE on UPDATE CASCADE,
  PRIMARY KEY (id)
  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;




































-- ----------------------------
-- Table structure for tedu_textbook 教材信息表
-- ----------------------------

DROP TABLE IF EXISTS tedu_textbook;
CREATE TABLE tedu_textbook (
  cou_code varchar(20) NOT NULL COMMENT '课程代码',
  edu_name varchar(20) NOT NULL COMMENT '教材名称',
  edu_author varchar(30) COMMENT '教材作者',
  edu_pubishing varchar(20) COMMENT '出版社',
  edu_price decimal(4,2) COMMENT '参考价格',
  edu_remark varchar(300) COMMENT '备注',
  CONSTRAINT edu_textbook_fk1 FOREIGN KEY (cou_code) REFERENCES tcou_classification (cou_code) on DELETE CASCADE  on UPDATE CASCADE,
  PRIMARY KEY (cou_code)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tedu_textbook
-- ----------------------------
-- INSERT INTO tedu_textboook VALUES (
--



-- ----------------------------
-- Table structure for tlog_record 日志表
-- ----------------------------

DROP TABLE IF EXISTS tlog_record;
CREATE TABLE tlog_record (
  log_id int unsigned AUTO_INCREMENT COMMENT '日志记录表主键',
  log_type varchar(3) COMMENT '用户类别',
  log_idnum varchar(15) COMMENT '编号记录',
  log_content varchar(50) NOT NULL COMMENT '操作内容',
  log_time timestamp DEFAULT CURRENT_TIMESTAMP COMMENT '时间',
  log_result tinyint(1) DEFAULT 1 COMMENT '操作结果',
  PRIMARY KEY (log_id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- 用户类别为 学生，、教师、管理员
-- 操作结果默认为1==成功
-- ----------------------------
-- Records of 'tlog_record'
-- ----------------------------
-- INSERT INTO 'tlog_record' VALUES (
--
-- ----------------------------
-- Table structure for tthe_project 论文管理表
-- ----------------------------

DROP TABLE IF EXISTS tthe_project;
CREATE TABLE tthe_project (
  the_id int unsigned AUTO_INCREMENT COMMENT '论文项目表主键',
  the_idnum varchar(20) NOT NULL UNIQUE COMMENT '论文编号',
  the_name varchar(30) NOT NULL COMMENT '论文名称',
  the_starttime timestamp NOT NULL COMMENT '起始时间',
  the_endtime timestamp NOT NULL COMMENT '结束时间',
  the_remark varchar(300) COMMENT '备注',
  PRIMARY KEY (the_id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tthe_project
-- ----------------------------
-- INSERT INTO tthe_project VALUES (
--


