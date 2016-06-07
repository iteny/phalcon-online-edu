/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50623
Source Host           : localhost:3306
Source Database       : hemacms

Target Server Type    : MYSQL
Target Server Version : 50623
File Encoding         : 65001

Date: 2016-06-07 21:34:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hm_acl_group
-- ----------------------------
DROP TABLE IF EXISTS `hm_acl_group`;
CREATE TABLE `hm_acl_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `resource` varchar(255) DEFAULT '1' COMMENT '资源的ID组',
  `sort` tinyint(6) unsigned NOT NULL DEFAULT '1' COMMENT '排序',
  `role` varchar(255) NOT NULL DEFAULT '' COMMENT '角色名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='用户组表';

-- ----------------------------
-- Records of hm_acl_group
-- ----------------------------
INSERT INTO `hm_acl_group` VALUES ('1', '超级管理员', '1', '1,2,4,5,6,13,14,15,7,8,9,10,22,23,11,19,20,21,16,17,18,12', '1', 'superadmin');
INSERT INTO `hm_acl_group` VALUES ('2', '网络管理', '1', '1,2,4,5,6,13,14,15,7,8,9,10,11,19,16,17,18,12', '3', 'wangluo');
INSERT INTO `hm_acl_group` VALUES ('3', '网站编辑', '1', '4,5,7,8,9', '2', 'bianji');
INSERT INTO `hm_acl_group` VALUES ('9', '新建角色', '1', '1,2,4,5,6,13,14,15,7,8,9,10,22,23,11,19,20,21,16,17,18,12', '11', 'xinjian');

-- ----------------------------
-- Table structure for hm_acl_resource
-- ----------------------------
DROP TABLE IF EXISTS `hm_acl_resource`;
CREATE TABLE `hm_acl_resource` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL DEFAULT '' COMMENT '资源名称',
  `controller` varchar(64) NOT NULL DEFAULT '' COMMENT '控制器',
  `action` varchar(64) NOT NULL DEFAULT '' COMMENT '方法',
  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示菜单',
  `pid` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `icon` char(8) NOT NULL DEFAULT '' COMMENT '图标',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hm_acl_resource
-- ----------------------------
INSERT INTO `hm_acl_resource` VALUES ('1', '用户中心', 'asdf', 'sdf', '1', '0', '1', '');
INSERT INTO `hm_acl_resource` VALUES ('2', '设置', 'dsfas', 'sdfa', '1', '0', '2', '');
INSERT INTO `hm_acl_resource` VALUES ('4', '站长设置', 'Site', 'zhanset', '1', '2', '1', '');
INSERT INTO `hm_acl_resource` VALUES ('5', '系统配置', 'Site', 'set', '1', '4', '1', '');
INSERT INTO `hm_acl_resource` VALUES ('6', '菜单设置', 'Site', 'menu', '1', '4', '2', '');
INSERT INTO `hm_acl_resource` VALUES ('7', '数据备份', 'Site', 'backup', '1', '4', '3', '');
INSERT INTO `hm_acl_resource` VALUES ('8', '文件备份', 'Site', 'fileup', '1', '4', '4', '');
INSERT INTO `hm_acl_resource` VALUES ('9', '用户设置', 'Site', 'userset', '1', '2', '2', '');
INSERT INTO `hm_acl_resource` VALUES ('10', '用户管理', 'Site', 'user', '1', '9', '1', '');
INSERT INTO `hm_acl_resource` VALUES ('11', '用户组管理', 'Site', 'group', '1', '9', '2', '');
INSERT INTO `hm_acl_resource` VALUES ('12', '内容', 'asdf', 'asdfas', '1', '0', '3', '');
INSERT INTO `hm_acl_resource` VALUES ('13', '添加与修改菜单', 'Site', 'addEditMenu', '1', '6', '1', '');
INSERT INTO `hm_acl_resource` VALUES ('14', '删除菜单', 'Site', 'delMenu', '1', '6', '3', '');
INSERT INTO `hm_acl_resource` VALUES ('15', '菜单排序', 'Site', 'sortMenu', '1', '6', '2', '');
INSERT INTO `hm_acl_resource` VALUES ('16', '日志管理', 'Site', 'manage', '1', '2', '3', '');
INSERT INTO `hm_acl_resource` VALUES ('17', '登录日志', 'Site', 'loginLog', '1', '16', '1', '');
INSERT INTO `hm_acl_resource` VALUES ('18', '操作日志', 'Site', 'operateLog', '1', '16', '2', '');
INSERT INTO `hm_acl_resource` VALUES ('19', '权限设置', 'Site', 'setGroup', '1', '11', '1', '');
INSERT INTO `hm_acl_resource` VALUES ('20', '添加或修改用户组', 'Site', 'addEditGroup', '1', '11', '2', '');
INSERT INTO `hm_acl_resource` VALUES ('21', '删除用户组', 'Site', 'delGroup', '1', '11', '3', '');
INSERT INTO `hm_acl_resource` VALUES ('22', '添加或修改用户', 'Site', 'addEditUser', '1', '10', '1', '');
INSERT INTO `hm_acl_resource` VALUES ('23', '删除用户', 'Site', 'delUser', '1', '10', '2', '');

-- ----------------------------
-- Table structure for hm_acl_user_group
-- ----------------------------
DROP TABLE IF EXISTS `hm_acl_user_group`;
CREATE TABLE `hm_acl_user_group` (
  `uid` smallint(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `with hm_user` FOREIGN KEY (`uid`) REFERENCES `hm_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户组明细表';

-- ----------------------------
-- Records of hm_acl_user_group
-- ----------------------------
INSERT INTO `hm_acl_user_group` VALUES ('1', '1');
INSERT INTO `hm_acl_user_group` VALUES ('2', '1');
INSERT INTO `hm_acl_user_group` VALUES ('25', '1');

-- ----------------------------
-- Table structure for hm_login_log
-- ----------------------------
DROP TABLE IF EXISTS `hm_login_log`;
CREATE TABLE `hm_login_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日志ID',
  `username` char(30) NOT NULL DEFAULT '' COMMENT '登录帐号',
  `logintime` int(10) NOT NULL DEFAULT '0' COMMENT '登录时间戳',
  `loginip` char(20) NOT NULL DEFAULT '' COMMENT '登录IP',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态,1为登录成功，0为登录失败',
  `info` varchar(66) NOT NULL DEFAULT '' COMMENT '尝试错误密码',
  `area` varchar(50) NOT NULL DEFAULT '' COMMENT '用户登录网络',
  `country` varchar(50) NOT NULL DEFAULT '' COMMENT '用户登录地区',
  `useragent` text COMMENT '用户浏览器信息',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=194 DEFAULT CHARSET=utf8 COMMENT='后台登陆日志表';

-- ----------------------------
-- Records of hm_login_log
-- ----------------------------
INSERT INTO `hm_login_log` VALUES ('193', 'iteny', '1465277709', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('192', 'iteny', '1465110189', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('191', 'iteny', '1464847976', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('190', 'iteny', '1464789280', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('189', 'iteny', '1464788837', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('188', 'iteny', '1464787369', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('187', 'iteny', '1464786729', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('186', 'iteny', '1464786720', '192.168.0.185', '0', '帐号密码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('185', 'iteny', '1464272158', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('184', 'iteny', '1464091056', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('183', 'iteny', '1464091053', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('182', 'iteny', '1462437243', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('181', 'iteny', '1462282672', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('180', 'iteny', '1462282669', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('179', 'sdfasd', '1462282570', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('178', 'asdf', '1462282563', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('177', 'iteny', '1462282442', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('176', 'iteny', '1462282436', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('175', 'iteny', '1462282421', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('174', 'iteny', '1462282070', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('173', 'iteny', '1462281621', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('172', 'sdf', '1462281613', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('171', 'iteny', '1462281348', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('170', 'iteny', '1462281327', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('169', 'asd', '1462281317', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('168', 'iteny', '1462281298', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('167', 'sadf', '1462281290', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('166', 'sadf', '1462281289', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('165', 'sadf', '1462281288', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('164', 'sadf', '1462281286', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('163', 'sadf', '1462281285', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('162', 'sadf', '1462281284', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('161', 'sadf', '1462281281', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('160', 'asdf', '1462281214', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('159', 'asdf', '1462281156', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('158', 'asdf', '1462281090', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('157', 'asdfasd', '1462281054', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('156', 'iteny', '1462281002', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('155', 'iteny', '1462280928', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('154', 'asdf', '1462280759', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('153', 'iteny', '1462280697', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('152', 'iteny', '1462280638', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('151', 'iteny', '1462280408', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('150', 'iteny', '1462280323', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('149', 'iteny', '1462280261', '192.168.0.185', '1', '密码保密', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('148', 'iteny', '1462110535', '192.168.0.185', '0', '帐号密码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('147', 'iteny', '1462110517', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');

-- ----------------------------
-- Table structure for hm_operate_log
-- ----------------------------
DROP TABLE IF EXISTS `hm_operate_log`;
CREATE TABLE `hm_operate_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(30) NOT NULL DEFAULT '' COMMENT '账户名',
  `ip` char(20) NOT NULL DEFAULT '' COMMENT 'IP地址',
  `time` int(10) unsigned NOT NULL COMMENT '时间',
  `country` varchar(255) NOT NULL DEFAULT '' COMMENT '所在地区',
  `useragent` text NOT NULL COMMENT '用户行为浏览器信息',
  `info` text NOT NULL COMMENT '用户操作信息',
  `get` varchar(255) NOT NULL DEFAULT '' COMMENT 'get数据',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态；0错误；1成功',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=279 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hm_operate_log
-- ----------------------------
INSERT INTO `hm_operate_log` VALUES ('90', 'asfd', '192.168.0.185', '1464271325', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '12', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('91', 'asfd', '192.168.0.185', '1464271403', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('92', 'asfd', '192.168.0.185', '1464271499', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：,控制器：,方法：<br/>请求方式：', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('93', '', '192.168.0.185', '1464271938', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('94', '', '192.168.0.185', '1464272105', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('95', '', '192.168.0.185', '1464272165', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('96', 'iteny', '192.168.0.185', '1464272239', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('97', '', '192.168.0.185', '1464434974', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('98', '', '192.168.0.185', '1464437419', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('99', '', '192.168.0.185', '1464437457', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('100', '', '192.168.0.185', '1464437556', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('101', '', '192.168.0.185', '1464437591', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('102', '', '192.168.0.185', '1464437654', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('103', '', '192.168.0.185', '1464439924', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单删除成功<br/>模块：admin,控制器：site,方法：delMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('104', '', '192.168.0.185', '1464439959', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('105', '', '192.168.0.185', '1464440021', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单删除成功<br/>模块：admin,控制器：site,方法：delMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('106', '', '192.168.0.185', '1464442757', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu', '1');
INSERT INTO `hm_operate_log` VALUES ('107', '', '192.168.0.185', '1464442820', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu', '1');
INSERT INTO `hm_operate_log` VALUES ('108', '', '192.168.0.185', '1464442843', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单修改成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu/?id=15', '1');
INSERT INTO `hm_operate_log` VALUES ('109', '', '192.168.0.185', '1464443019', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单修改成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu/?id=10', '1');
INSERT INTO `hm_operate_log` VALUES ('110', '', '192.168.0.185', '1464443031', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单修改成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu/?id=16', '1');
INSERT INTO `hm_operate_log` VALUES ('111', '', '192.168.0.185', '1464512989', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu/?pid=16', '1');
INSERT INTO `hm_operate_log` VALUES ('112', '', '192.168.0.185', '1464512999', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单修改成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu/?id=17', '1');
INSERT INTO `hm_operate_log` VALUES ('113', '', '192.168.0.185', '1464513052', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单删除成功<br/>模块：admin,控制器：site,方法：delMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('114', '', '192.168.0.185', '1464513061', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单删除成功<br/>模块：admin,控制器：site,方法：delMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('115', '', '192.168.0.185', '1464513066', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单删除成功<br/>模块：admin,控制器：site,方法：delMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('116', '', '192.168.0.185', '1464513072', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单删除成功<br/>模块：admin,控制器：site,方法：delMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('117', '', '192.168.0.185', '1464513276', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('118', '', '192.168.0.185', '1464513798', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('119', '', '192.168.0.185', '1464513842', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('120', '', '192.168.0.185', '1464513952', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('121', '', '192.168.0.185', '1464514060', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('122', '', '192.168.0.185', '1464514185', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('123', '', '192.168.0.185', '1464514230', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('124', '', '192.168.0.185', '1464514267', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('125', '', '192.168.0.185', '1464514283', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('126', '', '192.168.0.185', '1464514294', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('127', '', '192.168.0.185', '1464514318', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('128', '', '192.168.0.185', '1464514328', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('129', '', '192.168.0.185', '1464514332', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('130', '', '192.168.0.185', '1464514337', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('131', '', '192.168.0.185', '1464514377', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu', '1');
INSERT INTO `hm_operate_log` VALUES ('132', '', '192.168.0.185', '1464514437', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu', '1');
INSERT INTO `hm_operate_log` VALUES ('133', '', '192.168.0.185', '1464514933', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('134', '', '192.168.0.185', '1464515013', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('135', '', '192.168.0.185', '1464515018', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('136', '', '192.168.0.185', '1464515257', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('137', '', '192.168.0.185', '1464515428', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('138', '', '192.168.0.185', '1464515591', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('139', '', '192.168.0.185', '1464517328', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('140', '', '192.168.0.185', '1464517404', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('141', '', '192.168.0.185', '1464517705', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('142', '', '192.168.0.185', '1464517755', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('143', '', '192.168.0.185', '1464517877', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('144', '', '192.168.0.185', '1464517903', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('145', '', '192.168.0.185', '1464518388', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('146', '', '192.168.0.185', '1464518436', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('147', '', '192.168.0.185', '1464518457', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('148', '', '192.168.0.185', '1464518539', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('149', '', '192.168.0.185', '1464518647', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('150', '', '192.168.0.185', '1464518704', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('151', '', '192.168.0.185', '1464518763', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('152', '', '192.168.0.185', '1464518842', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('153', '', '192.168.0.185', '1464518898', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('154', '', '192.168.0.185', '1464518933', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('155', '', '192.168.0.185', '1464519047', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('156', '', '192.168.0.185', '1464519103', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('157', '', '192.168.0.185', '1464519260', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('158', '', '192.168.0.185', '1464519375', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('159', '', '192.168.0.185', '1464519419', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('160', '', '192.168.0.185', '1464519443', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('161', '', '192.168.0.185', '1464519516', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('162', '', '192.168.0.185', '1464519563', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('163', '', '192.168.0.185', '1464519592', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('164', '', '192.168.0.185', '1464519625', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('165', '', '192.168.0.185', '1464519708', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('166', '', '192.168.0.185', '1464519777', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('167', '', '192.168.0.185', '1464519872', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('168', '', '192.168.0.185', '1464520033', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('169', '', '192.168.0.185', '1464520059', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('170', '', '192.168.0.185', '1464520360', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('171', '', '192.168.0.185', '1464520406', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('172', '', '192.168.0.185', '1464520466', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单删除成功<br/>模块：admin,控制器：site,方法：delMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('173', '', '192.168.0.185', '1464520513', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单删除成功<br/>模块：admin,控制器：site,方法：delMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('174', '', '192.168.0.185', '1464521277', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu', '1');
INSERT INTO `hm_operate_log` VALUES ('175', '', '192.168.0.185', '1464522971', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu/?pid=20', '1');
INSERT INTO `hm_operate_log` VALUES ('176', '', '192.168.0.185', '1464523397', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('177', '', '192.168.0.185', '1464523972', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('178', '', '192.168.0.185', '1464524030', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('179', '', '192.168.0.185', '1464524064', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('180', '', '192.168.0.185', '1464524193', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单删除成功<br/>模块：admin,控制器：site,方法：delMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('181', '', '192.168.0.185', '1464524253', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu/?pid=3', '1');
INSERT INTO `hm_operate_log` VALUES ('182', '', '192.168.0.185', '1464524269', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单修改成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu/?id=22', '1');
INSERT INTO `hm_operate_log` VALUES ('183', '', '192.168.0.185', '1464524282', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单删除成功<br/>模块：admin,控制器：site,方法：delMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('184', '', '192.168.0.185', '1464524320', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('185', '', '192.168.0.185', '1464524903', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu/?pid=9', '1');
INSERT INTO `hm_operate_log` VALUES ('186', '', '192.168.0.185', '1464524928', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu/?pid=9', '1');
INSERT INTO `hm_operate_log` VALUES ('187', '', '192.168.0.185', '1464616249', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单删除成功<br/>模块：admin,控制器：site,方法：delMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('188', '', '192.168.0.185', '1464616262', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单删除成功<br/>模块：admin,控制器：site,方法：delMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('189', '', '192.168.0.185', '1464616270', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单删除成功<br/>模块：admin,控制器：site,方法：delMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('190', '', '192.168.0.185', '1464616282', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单删除成功<br/>模块：admin,控制器：site,方法：delMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('191', '', '192.168.0.185', '1464616347', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu', '1');
INSERT INTO `hm_operate_log` VALUES ('192', '', '192.168.0.185', '1464616364', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单删除成功<br/>模块：admin,控制器：site,方法：delMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('193', '', '192.168.0.185', '1464616377', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu', '1');
INSERT INTO `hm_operate_log` VALUES ('194', '', '192.168.0.185', '1464616905', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu/?pid=6', '1');
INSERT INTO `hm_operate_log` VALUES ('195', '', '192.168.0.185', '1464617006', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu/?pid=6', '1');
INSERT INTO `hm_operate_log` VALUES ('196', '', '192.168.0.185', '1464617046', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu/?pid=6', '1');
INSERT INTO `hm_operate_log` VALUES ('197', '', '192.168.0.185', '1464617179', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('198', '', '192.168.0.185', '1464617203', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('199', '', '192.168.0.185', '1464617230', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单修改成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu/?id=13', '1');
INSERT INTO `hm_operate_log` VALUES ('200', '', '192.168.0.185', '1464617255', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单修改成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu/?id=13', '1');
INSERT INTO `hm_operate_log` VALUES ('201', '', '192.168.0.185', '1464617317', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单修改成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu/?id=13', '1');
INSERT INTO `hm_operate_log` VALUES ('202', '', '192.168.0.185', '1464617442', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单修改成功<br/>模块：admin,控制器：site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/site/addEditMenu/?id=6', '1');
INSERT INTO `hm_operate_log` VALUES ('203', '', '192.168.0.185', '1464617824', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单修改成功<br/>模块：admin,控制器：Site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditMenu/?id=13', '1');
INSERT INTO `hm_operate_log` VALUES ('204', '', '192.168.0.185', '1464617864', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：Site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditMenu', '1');
INSERT INTO `hm_operate_log` VALUES ('205', '', '192.168.0.185', '1464617986', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单修改成功<br/>模块：admin,控制器：Site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditMenu/?id=13', '1');
INSERT INTO `hm_operate_log` VALUES ('206', '', '192.168.0.185', '1464783527', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：Site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditMenu/?pid=2', '1');
INSERT INTO `hm_operate_log` VALUES ('207', '', '192.168.0.185', '1464783710', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单修改成功<br/>模块：admin,控制器：Site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditMenu/?id=1', '1');
INSERT INTO `hm_operate_log` VALUES ('208', '', '192.168.0.185', '1464783733', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序失败<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '0');
INSERT INTO `hm_operate_log` VALUES ('209', '', '192.168.0.185', '1464783744', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序失败<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '0');
INSERT INTO `hm_operate_log` VALUES ('210', '', '192.168.0.185', '1464783777', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('211', '', '192.168.0.185', '1464783813', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序失败<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '0');
INSERT INTO `hm_operate_log` VALUES ('212', '', '192.168.0.185', '1464783834', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('213', '', '192.168.0.185', '1464783870', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('214', '', '192.168.0.185', '1464783917', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('215', '', '192.168.0.185', '1464784163', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('216', '', '192.168.0.185', '1464784172', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('217', '', '192.168.0.185', '1464784180', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('218', '', '192.168.0.185', '1464784189', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序失败<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '0');
INSERT INTO `hm_operate_log` VALUES ('219', '', '192.168.0.185', '1464784220', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单修改成功<br/>模块：admin,控制器：Site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditMenu/?id=2', '1');
INSERT INTO `hm_operate_log` VALUES ('220', '', '192.168.0.185', '1464784252', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序失败<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '0');
INSERT INTO `hm_operate_log` VALUES ('221', '', '192.168.0.185', '1464784276', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('222', '', '192.168.0.185', '1464784415', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单删除成功<br/>模块：admin,控制器：Site,方法：delMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('223', '', '192.168.0.185', '1464784511', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：Site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditMenu/?pid=17', '1');
INSERT INTO `hm_operate_log` VALUES ('224', '', '192.168.0.185', '1464784590', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('225', '', '192.168.0.185', '1464784636', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：Site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditMenu/?pid=16', '1');
INSERT INTO `hm_operate_log` VALUES ('226', 'iteny', '192.168.0.185', '1464789930', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('227', 'iteny', '192.168.0.185', '1464790131', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('228', 'iteny', '192.168.0.185', '1464848145', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('229', 'iteny', '192.168.0.185', '1464848175', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单修改成功<br/>模块：admin,控制器：Site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditMenu/?id=12', '1');
INSERT INTO `hm_operate_log` VALUES ('230', 'iteny', '192.168.0.185', '1464848419', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：sortMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/menu', '1');
INSERT INTO `hm_operate_log` VALUES ('231', 'iteny', '192.168.0.185', '1464849683', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单修改成功<br/>模块：admin,控制器：Site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditMenu/?id=11', '1');
INSERT INTO `hm_operate_log` VALUES ('232', 'iteny', '192.168.0.185', '1464852665', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：Site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditMenu/?pid=11', '1');
INSERT INTO `hm_operate_log` VALUES ('233', 'iteny', '192.168.0.185', '1464863571', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：setGroup<br/>请求方式：Ajax', 'http://sina.com/admin/Site/setGroup/?id=9', '1');
INSERT INTO `hm_operate_log` VALUES ('234', 'iteny', '192.168.0.185', '1464863921', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：setGroup<br/>请求方式：Ajax', 'http://sina.com/admin/Site/setGroup/?id=9', '1');
INSERT INTO `hm_operate_log` VALUES ('235', 'iteny', '192.168.0.185', '1464863931', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：setGroup<br/>请求方式：Ajax', 'http://sina.com/admin/Site/setGroup/?id=9', '1');
INSERT INTO `hm_operate_log` VALUES ('236', 'iteny', '192.168.0.185', '1464863958', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：setGroup<br/>请求方式：Ajax', 'http://sina.com/admin/Site/setGroup/?id=2', '1');
INSERT INTO `hm_operate_log` VALUES ('237', 'iteny', '192.168.0.185', '1464864204', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：菜单排序成功<br/>模块：admin,控制器：Site,方法：setGroup<br/>请求方式：Ajax', 'http://sina.com/admin/Site/setGroup/?id=9', '1');
INSERT INTO `hm_operate_log` VALUES ('238', 'iteny', '192.168.0.185', '1464864240', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：授权成功<br/>模块：admin,控制器：Site,方法：setGroup<br/>请求方式：Ajax', 'http://sina.com/admin/Site/setGroup/?id=9', '1');
INSERT INTO `hm_operate_log` VALUES ('239', 'iteny', '192.168.0.185', '1464865126', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：Site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditMenu/?pid=11', '1');
INSERT INTO `hm_operate_log` VALUES ('240', 'iteny', '192.168.0.185', '1464865155', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：Site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditMenu/?pid=11', '1');
INSERT INTO `hm_operate_log` VALUES ('241', 'iteny', '192.168.0.185', '1464865167', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：授权成功<br/>模块：admin,控制器：Site,方法：setGroup<br/>请求方式：Ajax', 'http://sina.com/admin/Site/setGroup/?id=9', '1');
INSERT INTO `hm_operate_log` VALUES ('242', 'iteny', '192.168.0.185', '1464865187', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：授权成功<br/>模块：admin,控制器：Site,方法：setGroup<br/>请求方式：Ajax', 'http://sina.com/admin/Site/setGroup/?id=9', '1');
INSERT INTO `hm_operate_log` VALUES ('243', 'iteny', '192.168.0.185', '1464867250', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加用户组成功<br/>模块：admin,控制器：Site,方法：addEditGroup<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditGroup', '1');
INSERT INTO `hm_operate_log` VALUES ('244', 'iteny', '192.168.0.185', '1464868278', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加用户组成功<br/>模块：admin,控制器：Site,方法：addEditGroup<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditGroup', '1');
INSERT INTO `hm_operate_log` VALUES ('245', 'iteny', '192.168.0.185', '1464869501', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：修改用户组成功<br/>模块：admin,控制器：Site,方法：addEditGroup<br/>请求方式：POST', 'http://sina.com/admin/Site/addEditGroup/?id=14', '1');
INSERT INTO `hm_operate_log` VALUES ('246', 'iteny', '192.168.0.185', '1464869680', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：修改用户组成功<br/>模块：admin,控制器：Site,方法：addEditGroup<br/>请求方式：POST', 'http://sina.com/admin/Site/addEditGroup/?id=14', '1');
INSERT INTO `hm_operate_log` VALUES ('247', 'iteny', '192.168.0.185', '1464870102', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：修改用户组成功<br/>模块：admin,控制器：Site,方法：addEditGroup<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditGroup/?id=14', '1');
INSERT INTO `hm_operate_log` VALUES ('248', 'iteny', '192.168.0.185', '1464870217', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加用户组成功<br/>模块：admin,控制器：Site,方法：addEditGroup<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditGroup', '1');
INSERT INTO `hm_operate_log` VALUES ('249', 'iteny', '192.168.0.185', '1464870453', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：用户组删除成功<br/>模块：admin,控制器：Site,方法：delGroup<br/>请求方式：Ajax', 'http://sina.com/admin/Site/group', '1');
INSERT INTO `hm_operate_log` VALUES ('250', 'iteny', '192.168.0.185', '1464870561', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：修改用户组成功<br/>模块：admin,控制器：Site,方法：addEditGroup<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditGroup/?id=15', '1');
INSERT INTO `hm_operate_log` VALUES ('251', 'iteny', '192.168.0.185', '1464870571', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：用户组删除成功<br/>模块：admin,控制器：Site,方法：delGroup<br/>请求方式：Ajax', 'http://sina.com/admin/Site/group', '1');
INSERT INTO `hm_operate_log` VALUES ('252', 'iteny', '192.168.0.185', '1464870721', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：Site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditMenu/?pid=10', '1');
INSERT INTO `hm_operate_log` VALUES ('253', 'iteny', '192.168.0.185', '1464870754', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加菜单成功<br/>模块：admin,控制器：Site,方法：addEditMenu<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditMenu/?pid=10', '1');
INSERT INTO `hm_operate_log` VALUES ('254', 'iteny', '192.168.0.185', '1464872976', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：授权成功<br/>模块：admin,控制器：Site,方法：setGroup<br/>请求方式：Ajax', 'http://sina.com/admin/Site/setGroup/?id=9', '1');
INSERT INTO `hm_operate_log` VALUES ('255', 'iteny', '192.168.0.185', '1464873022', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：授权成功<br/>模块：admin,控制器：Site,方法：setGroup<br/>请求方式：Ajax', 'http://sina.com/admin/Site/setGroup/?id=9', '1');
INSERT INTO `hm_operate_log` VALUES ('256', 'iteny', '192.168.0.185', '1465285208', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加用户成功<br/>模块：admin,控制器：Site,方法：addEditUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditUser', '1');
INSERT INTO `hm_operate_log` VALUES ('257', 'iteny', '192.168.0.185', '1465285936', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加用户成功<br/>模块：admin,控制器：Site,方法：addEditUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditUser', '1');
INSERT INTO `hm_operate_log` VALUES ('258', 'iteny', '192.168.0.185', '1465287389', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加用户成功<br/>模块：admin,控制器：Site,方法：addEditUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditUser', '1');
INSERT INTO `hm_operate_log` VALUES ('259', 'iteny', '192.168.0.185', '1465287487', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：插入用户组失败<br/>模块：admin,控制器：Site,方法：addEditUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditUser', '0');
INSERT INTO `hm_operate_log` VALUES ('260', 'iteny', '192.168.0.185', '1465287501', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：插入用户组失败<br/>模块：admin,控制器：Site,方法：addEditUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditUser', '0');
INSERT INTO `hm_operate_log` VALUES ('261', 'iteny', '192.168.0.185', '1465287524', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加用户成功<br/>模块：admin,控制器：Site,方法：addEditUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditUser', '1');
INSERT INTO `hm_operate_log` VALUES ('262', 'iteny', '192.168.0.185', '1465295002', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：修改用户组成功<br/>模块：admin,控制器：Site,方法：addEditUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditUser/?id=19', '1');
INSERT INTO `hm_operate_log` VALUES ('263', 'iteny', '192.168.0.185', '1465295230', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：修改用户组成功<br/>模块：admin,控制器：Site,方法：addEditUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditUser/?id=19', '1');
INSERT INTO `hm_operate_log` VALUES ('264', 'iteny', '192.168.0.185', '1465295290', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：修改用户组成功<br/>模块：admin,控制器：Site,方法：addEditUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditUser/?id=19', '1');
INSERT INTO `hm_operate_log` VALUES ('265', 'iteny', '192.168.0.185', '1465295362', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：修改用户组成功<br/>模块：admin,控制器：Site,方法：addEditUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditUser/?id=19', '1');
INSERT INTO `hm_operate_log` VALUES ('266', 'iteny', '192.168.0.185', '1465295477', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：修改用户组成功<br/>模块：admin,控制器：Site,方法：addEditUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditUser/?id=19', '1');
INSERT INTO `hm_operate_log` VALUES ('267', 'iteny', '192.168.0.185', '1465295492', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：修改用户组成功<br/>模块：admin,控制器：Site,方法：addEditUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditUser/?id=19', '1');
INSERT INTO `hm_operate_log` VALUES ('268', 'iteny', '192.168.0.185', '1465295593', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加用户成功<br/>模块：admin,控制器：Site,方法：addEditUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditUser', '1');
INSERT INTO `hm_operate_log` VALUES ('269', 'iteny', '192.168.0.185', '1465296236', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：删除用户成功<br/>模块：admin,控制器：Site,方法：delUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/user', '1');
INSERT INTO `hm_operate_log` VALUES ('270', 'iteny', '192.168.0.185', '1465296336', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：删除用户成功<br/>模块：admin,控制器：Site,方法：delUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/user', '1');
INSERT INTO `hm_operate_log` VALUES ('271', 'iteny', '192.168.0.185', '1465298204', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加用户成功<br/>模块：admin,控制器：Site,方法：addEditUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditUser', '1');
INSERT INTO `hm_operate_log` VALUES ('272', 'iteny', '192.168.0.185', '1465298808', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：插入用户失败<br/>模块：admin,控制器：Site,方法：delUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/user', '0');
INSERT INTO `hm_operate_log` VALUES ('273', 'iteny', '192.168.0.185', '1465298852', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加用户成功<br/>模块：admin,控制器：Site,方法：delUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/user', '1');
INSERT INTO `hm_operate_log` VALUES ('274', 'iteny', '192.168.0.185', '1465298961', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加用户成功<br/>模块：admin,控制器：Site,方法：delUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/user', '1');
INSERT INTO `hm_operate_log` VALUES ('275', 'iteny', '192.168.0.185', '1465299235', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加用户成功<br/>模块：admin,控制器：Site,方法：delUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/user', '1');
INSERT INTO `hm_operate_log` VALUES ('276', 'iteny', '192.168.0.185', '1465301107', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：删除用户成功<br/>模块：admin,控制器：Site,方法：delUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/user', '1');
INSERT INTO `hm_operate_log` VALUES ('277', 'iteny', '192.168.0.185', '1465301240', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：删除用户成功<br/>模块：admin,控制器：Site,方法：delUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/user', '1');
INSERT INTO `hm_operate_log` VALUES ('278', 'iteny', '192.168.0.185', '1465303376', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36', '提示语：添加用户成功<br/>模块：admin,控制器：Site,方法：addEditUser<br/>请求方式：Ajax', 'http://sina.com/admin/Site/addEditUser', '1');

-- ----------------------------
-- Table structure for hm_user
-- ----------------------------
DROP TABLE IF EXISTS `hm_user`;
CREATE TABLE `hm_user` (
  `id` smallint(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `nickname` varchar(50) NOT NULL DEFAULT '' COMMENT '昵称/姓名',
  `password` char(40) NOT NULL DEFAULT '' COMMENT '密码',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `create_time` int(11) unsigned DEFAULT '0' COMMENT '创建时间',
  `create_ip` char(20) DEFAULT '' COMMENT '创建时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`username`),
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='后台用户表';

-- ----------------------------
-- Records of hm_user
-- ----------------------------
INSERT INTO `hm_user` VALUES ('1', 'woshi', '未知', 'ea42d19ad8d196fbbf861969dd92d5b3a02639ec', 'admin@abc3210.com', '备注信息', '1445067238', '192.168.0.1', '1');
INSERT INTO `hm_user` VALUES ('2', 'iteny', '阿斯蒂芬', 'ea42d19ad8d196fbbf861969dd92d5b3a02639ec', 'asdfas@asdf.com', '', '1451132711', '192.168.0.1', '1');
INSERT INTO `hm_user` VALUES ('25', 'nihao', '豆腐干', '76777a6355aee7cb8948e112af7be3f49ace805c', 'asdfas@qq.com', 'dfgsdfv', '1465303376', '192.168.0.185', '1');

-- ----------------------------
-- Table structure for hm_user_kills
-- ----------------------------
DROP TABLE IF EXISTS `hm_user_kills`;
CREATE TABLE `hm_user_kills` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `uid` int(11) unsigned NOT NULL,
  `kills` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hm_user_kills
-- ----------------------------
INSERT INTO `hm_user_kills` VALUES ('1', '2016-06-03 20:16:40', '1', '3');
INSERT INTO `hm_user_kills` VALUES ('2', '2016-06-02 20:17:39', '1', '5');
INSERT INTO `hm_user_kills` VALUES ('3', '2016-06-01 20:18:49', '1', '11');
INSERT INTO `hm_user_kills` VALUES ('4', '2016-06-04 20:19:02', '1', '15');
INSERT INTO `hm_user_kills` VALUES ('5', '2016-06-01 20:19:16', '2', '17');
INSERT INTO `hm_user_kills` VALUES ('6', '2016-06-02 20:19:28', '2', '11');
INSERT INTO `hm_user_kills` VALUES ('7', '2016-06-03 20:19:38', '2', '13');
INSERT INTO `hm_user_kills` VALUES ('8', '2016-06-04 20:19:47', '2', '14');
