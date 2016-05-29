/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50623
Source Host           : localhost:3306
Source Database       : hemacms

Target Server Type    : MYSQL
Target Server Version : 50623
File Encoding         : 65001

Date: 2016-05-29 22:35:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hm_acl_group
-- ----------------------------
DROP TABLE IF EXISTS `hm_acl_group`;
CREATE TABLE `hm_acl_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `resource` varchar(255) NOT NULL DEFAULT '' COMMENT '资源的ID组',
  `sort` tinyint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `role` varchar(255) NOT NULL DEFAULT '' COMMENT '角色名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='用户组表';

-- ----------------------------
-- Records of hm_acl_group
-- ----------------------------
INSERT INTO `hm_acl_group` VALUES ('1', '超级管理员', '1', '4,5,6,7,8,9', '1', 'superadmin');
INSERT INTO `hm_acl_group` VALUES ('2', '网络管理', '1', '4,5,6,7,8,9', '3', 'wangluo');
INSERT INTO `hm_acl_group` VALUES ('3', '网站编辑', '1', '4,5,6,7,8,9', '2', 'bianji');
INSERT INTO `hm_acl_group` VALUES ('9', '新建角色', '1', '4,5,6,7,8,9', '11', 'xinjian');

-- ----------------------------
-- Table structure for hm_acl_resource
-- ----------------------------
DROP TABLE IF EXISTS `hm_acl_resource`;
CREATE TABLE `hm_acl_resource` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) DEFAULT '' COMMENT '资源名称',
  `controller` varchar(64) DEFAULT '' COMMENT '控制器',
  `action` varchar(64) DEFAULT '' COMMENT '方法',
  `isshow` tinyint(1) unsigned DEFAULT '1' COMMENT '是否显示菜单',
  `pid` int(8) unsigned DEFAULT '0' COMMENT '父ID',
  `sort` smallint(6) unsigned DEFAULT '0' COMMENT '排序',
  `icon` char(8) DEFAULT '' COMMENT '图标',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hm_acl_resource
-- ----------------------------
INSERT INTO `hm_acl_resource` VALUES ('1', '首页', '1', '1', '1', '0', '1', null);
INSERT INTO `hm_acl_resource` VALUES ('2', '设置', '', '', '1', '0', '2', '');
INSERT INTO `hm_acl_resource` VALUES ('3', '内容', '', '', '1', '0', '3', '');
INSERT INTO `hm_acl_resource` VALUES ('4', '站长设置', 'site', 'zhanset', '1', '2', '1', '');
INSERT INTO `hm_acl_resource` VALUES ('5', '系统配置', 'site', 'set', '1', '4', '1', '');
INSERT INTO `hm_acl_resource` VALUES ('6', '菜单设置', 'site', 'menu', '1', '4', '2', '');
INSERT INTO `hm_acl_resource` VALUES ('7', '数据备份', 'site', 'backup', '1', '4', '3', '');
INSERT INTO `hm_acl_resource` VALUES ('8', '文件备份', 'site', 'fileup', '1', '4', '4', '');
INSERT INTO `hm_acl_resource` VALUES ('9', '用户设置', 'site', 'userset', '1', '2', '2', '');
INSERT INTO `hm_acl_resource` VALUES ('10', '用户管理', 'Site', 'user', '1', '9', '1', '');
INSERT INTO `hm_acl_resource` VALUES ('11', '用户组管理', 'site', 'role', '1', '9', '1', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=186 DEFAULT CHARSET=utf8 COMMENT='后台登陆日志表';

-- ----------------------------
-- Records of hm_login_log
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8;

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

-- ----------------------------
-- Table structure for hm_user
-- ----------------------------
DROP TABLE IF EXISTS `hm_user`;
CREATE TABLE `hm_user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `nickname` varchar(50) NOT NULL DEFAULT '' COMMENT '昵称/姓名',
  `password` char(40) NOT NULL DEFAULT '' COMMENT '密码',
  `last_login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上次登录时间',
  `last_login_ip` varchar(40) NOT NULL DEFAULT '' COMMENT '上次登录IP',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `create_ip` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='后台用户表';

-- ----------------------------
-- Records of hm_user
-- ----------------------------
INSERT INTO `hm_user` VALUES ('1', 'admin', '未知', 'ea42d19ad8d196fbbf861969dd92d5b3a02639ec', '1445494385', '0.0.0.0', 'admin@abc3210.com', '备注信息', '1445067238', '1445067238', '1');
INSERT INTO `hm_user` VALUES ('2', 'iteny', '阿斯蒂芬', 'ea42d19ad8d196fbbf861969dd92d5b3a02639ec', '0', '', 'asdfas@asdf.com', '', '1451132711', '0', '1');
