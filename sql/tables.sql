CREATE DATABASE hospital;
use hospital;
//用户基本信息表
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `health_id` int(10) unsigned AUTO_INCREMENT COMMENT '健康管理好',
  `name` varchar(30) DEFAULT '' COMMENT '姓名',
  `sex` tinyint(2) DEFAULT '0' COMMENT '性别,0为男性，1为女性',
  `age` smallint(5) DEFAULT '0' COMMENT '年龄',
  `work` varchar(30) DEFAULT '' COMMENT '职业',
  `tel` varchar(16) DEFAULT '' COMMENT '手机号',
  `province` varchar(16) DEFAULT '' COMMENT '省',
  `city` varchar(16) DEFAULT '' COMMENT '市',
  `country` varchar(16) DEFAULT '' COMMENT '国家',
  `nickname` varchar(32) DEFAULT '' COMMENT '昵称',
  `headimg` varchar(512) DEFAULT '' COMMENT '头像',
  `creat_time` timestamp DEFAULT CURRENT_TIMESTAMP,
  KEY `idx_id` (`health_id`),
  KEY `idx_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
#就诊记录表
DROP TABLE IF EXISTS `record`;
 CREATE TABLE `user_info` (
  `health_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '健康管理好',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '姓名',
  `sex` tinyint(2) NOT NULL DEFAULT '0' COMMENT '性别,0为男性，1为女性',
  `age` smallint(5) NOT NULL DEFAULT '0' COMMENT '年龄',
  `work` varchar(30) NOT NULL DEFAULT '' COMMENT '职业',
  `height` smallint(8) NOT NULL DEFAULT '0' COMMENT '身高',
  `weight` smallint(8) NOT NULL DEFAULT '0' COMMENT '体重',
  `creat_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `identify` varchar(20) NOT NULL DEFAULT '' COMMENT '身份证',
  `tel` varchar(20) NOT NULL DEFAULT '' COMMENT '电话号码',
  `birthday` varchar(30) NOT NULL DEFAULT '' COMMENT '生日',
  PRIMARY KEY (`health_id`),
  KEY `idx_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=1000000010 DEFAULT CHARSET=utf8
//用户帐号信息
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '健康档案号',
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `authKey` varchar(100) NOT NULL DEFAULT '',
  `accessToken` varchar(100) NOT NULL DEFAULT '' ,
  `openid` varchar(64) NOT NULL DEFAULT '' COMMENT 'openid',
  `type` tinyint(2) NOT NULL DEFAULT 0 COMMENT '用户类型',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1000000001  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `check_record`;
CREATE TABLE `check_record`(
  `health_id` int(10) unsigned NOT NULL DEFAULT 0 COMMENT '健康管理好',
  `height` smallint(8) NOT NULL DEFAULT 0 COMMENT '身高',
  `weight` smallint(8) NOT NULL DEFAULT 0 COMMENT '体重',
  `waist` smallint(8) NOT NULL DEFAULT 0 COMMENT '腰围',
  `hip`  smallint(8) NOT NULL DEFAULT 0 COMMENT '臀围',
  `diet` varchar(30) NOT NULL DEFAULT 0 COMMENT '饮食',
  `motion` VARCHAR(30) NOT NULL DEFAULT 0 COMMENT '运动',
   `creat_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `idx_health_id` (`health_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

#糖代谢记录表
DROP TABLE IF EXISTS `dm_record`;
CREATE TABLE `dm_record`(
 `health_id` int(10) unsigned DEFAULT 0 COMMENT '健康管理号',
 `is_diabetes` SMALLINT(5) unsigned DEFAULT 0 COMMENT '是否诊断为糖尿病',
 `fasting_blood_glucose` FLOAT(5,2) DEFAULT 0.0 COMMENT '空腹血糖',
 `postprandial_blood_glucose` FLOAT(5,2) DEFAULT 0.0 COMMENT '餐后血糖',
 `anytime_blood_glucose` FLOAT(5,2) DEFAULT 0.0 COMMENT '任意时间血糖',
 `diabetes_type` SMALLINT(5) unsigned DEFAULT 0 COMMENT '糖尿病类型',
 `is_ketoacidosis` SMALLINT(5) unsigned DEFAULT 0 COMMENT '是否酮症酸中毒病发症',
 `ketoacidosis_frequency` SMALLINT(5) unsigned DEFAULT 0 COMMENT '酮症酸中毒病发症频率',
 `ketoacidosis_reason` VARCHAR(255) DEFAULT "" COMMENT '酮症酸中毒病发症理由',
 `is_hypoglycemia` SMALLINT(5) unsigned DEFAULT 0 COMMENT '是否低血糖',
 `hypoglycemia_frequency` SMALLINT(5) unsigned DEFAULT 0 COMMENT '低血糖发生频率',
 `hypoglycemia_reason` VARCHAR(255) DEFAULT "" COMMENT '低血糖发生原因',
 `hypoglycemia_severity` SMALLINT(5) unsigned DEFAULT 0 COMMENT '低血糖严重程度',
 `is_cerebrovascular` SMALLINT(5) unsigned DEFAULT 0 COMMENT '是否脑血管病变',
 `is_cardiovascular` SMALLINT(5) unsigned DEFAULT 0 COMMENT '是否心血管病变',
 `is_peripheral_vascular` SMALLINT(5) unsigned DEFAULT 0 COMMENT '是否外周血管病变',
 `is_nephrosis` SMALLINT(5) unsigned DEFAULT 0 COMMENT '是否肾病病变',
 `is_fundus_lesions`  SMALLINT(5) unsigned DEFAULT 0 COMMENT '是否眼底病变',
 `is_peripheral_neuropathy` SMALLINT(5) unsigned DEFAULT 0 COMMENT '是否周围神经病变',
 `is_diabetic_foot` SMALLINT(5) unsigned DEFAULT 0 COMMENT '糖尿病足',
 `associated_diseases` VARCHAR(255) DEFAULT '' COMMENT '伴发疾病',
 `high_blood_pressure`  SMALLINT(8) unsigned DEFAULT 0 COMMENT '血压高压',
 `low_blood_pressure`  SMALLINT(8) unsigned DEFAULT 0 COMMENT '血压低压',
 `blood_pressure_addr` SMALLINT(5) unsigned DEFAULT 0 COMMENT '血压测量地点',
 `blood_sugar_2` FLOAT(5,2) DEFAULT 0.0 COMMENT '餐后两小时血糖',
 `hbalc` FLOAT(5,2) DEFAULT 0.0 COMMENT 'hbalc',
 `tg` FLOAT(5,2) DEFAULT 0.0 COMMENT 'tg',
 `ldl_c` FLOAT(5,2) DEFAULT 0.0 COMMENT 'ldl_c',
 `hdl_c` FLOAT(5,2) DEFAULT 0.0 COMMENT 'hdl_c',
  KEY `idx_health_id` (`health_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

#糖代谢记录表
DROP TABLE IF EXISTS `doctor`;
CREATE TABLE `doctor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '医生编号',
  `name` varchar(32) NOT NULL DEFAULT "" COMMENT '医生姓名',
  `hospital` varchar(32) NOT NULL DEFAULT "" COMMENT '所属医院',
  `level` varchar(32) NOT NULL DEFAULT "" COMMENT '级别',
  `tel` varchar(32) NOT NULL DEFAULT "" COMMENT '电话',
  `wx` varchar(32) NOT NULL DEFAULT "" COMMENT '微信',
  `identify` varchar(32) NOT NULL DEFAULT "" COMMENT '身份证号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1000000001  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` varchar(16) NOT NULL DEFAULT '' COMMENT '文章id',
  `title` varchar(256) NOT NULL DEFAULT '' COMMENT '文章标题',
  `source` varchar(64) NOT NULL DEFAULT '' COMMENT '文章来源',
  `content` text COMMENT '文章内容',
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
  `images` text COMMENT '图片列表',
  `classify` varchar(64) NOT NULL DEFAULT '' COMMENT '分类信息',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
