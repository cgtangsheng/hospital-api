
#用户饮食和运动
DROP TABLE IF EXISTS `user_eat_info`;
CREATE TABLE `user_eat_info` (
  `health_id` int(10) unsigned NOT NULL COMMENT '用户编号',
  `staple_food` FLOAT (3,2) NOT NULL DEFAULT 0.0 COMMENT '主食',
  `work_type` tinyint(5) NOT NULL DEFAULT 0 COMMENT '劳动强度',
  `vegetables` FLOAT(5,2) DEFAULT 0.0 COMMENT '蔬菜',
  `milk` FLOAT(5,2) DEFAULT 0.0 COMMENT '牛奶',
  `egg` SMALLINT(5) unsigned DEFAULT 0 COMMENT '鸡蛋',
  `meet` FLOAT(5,2) DEFAULT 0.0 COMMENT '肉类',
  `bean` FLOAT(5,2) DEFAULT 0.0 COMMENT '豆类',
  `oil`  FLOAT(5,2) DEFAULT 0.0 COMMENT '油',
  `salt` FLOAT(5,2) DEFAULT 0.0 COMMENT '盐',
  `sports_type` SMALLINT(5) unsigned DEFAULT 0 COMMENT '运动方式',
  `sports_intensity`  SMALLINT(5) unsigned DEFAULT 0 COMMENT '运动强度',
  `sports_time` SMALLINT(8) unsigned DEFAULT 0 COMMENT '运动时长',
  `sports_frequency`  SMALLINT(5) unsigned DEFAULT 0 COMMENT '运动频率',
  `is_smoke` SMALLINT(5) unsigned DEFAULT 0 COMMENT '是否吸烟',
  `smoke_num` SMALLINT(5) unsigned DEFAULT 0 COMMENT '吸烟量',
  `is_drink` SMALLINT(5) unsigned DEFAULT 0 COMMENT '是否饮酒',
  `drink_num` SMALLINT(5) unsigned DEFAULT 0 COMMENT '饮酒量',
  `high_blood_pressure`  SMALLINT(8) unsigned DEFAULT 0 COMMENT '血压高压',
  `low_blood_pressure`  SMALLINT(8) unsigned DEFAULT 0 COMMENT '血压低压',
  `blood_pressure_addr` SMALLINT(5) unsigned DEFAULT 0 COMMENT '血压测量地点',
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
   KEY `idx_id` (`health_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;



#用户bmi
DROP TABLE IF EXISTS `user_bmi`;
CREATE TABLE `user_bmi` (
  `health_id` int(10) unsigned NOT NULL COMMENT '用户编号',
  `height` SMALLINT(5) unsigned DEFAULT 0 COMMENT '是否酮症酸中毒病发症',
  `weight` SMALLINT(5) unsigned DEFAULT 0 COMMENT '酮症酸中毒病发症频率',
  `waist` smallint(8) NOT NULL DEFAULT 0 COMMENT '腰围',
  `hip`  smallint(8) NOT NULL DEFAULT 0 COMMENT '臀围',
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
  KEY `idx_id` (`health_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `dm_info`;
CREATE TABLE `dm_info` (
  `health_id` int(10) unsigned NOT NULL COMMENT '用户编号',
  `is_diabetes` SMALLINT(5) unsigned DEFAULT 0 COMMENT '是否诊断为糖尿病',
  `fasting_blood_glucose` FLOAT(5,2) DEFAULT 0.0 COMMENT '空腹血糖',
  `postprandial_blood_glucose` FLOAT(5,2) DEFAULT 0.0 COMMENT '餐后血糖',
  `anytime_blood_glucose` FLOAT(5,2) DEFAULT 0.0 COMMENT '任意时间血糖',
  `diagnose_hospital` varchar(30) NOT NULL DEFAULT "" COMMENT '确诊医院',
  `diagnose_time` DATE COMMENT '确诊时间',
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
  KEY `idx_id` (`health_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;



