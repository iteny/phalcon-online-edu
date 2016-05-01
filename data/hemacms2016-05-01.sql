/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50623
Source Host           : localhost:3306
Source Database       : hemacms

Target Server Type    : MYSQL
Target Server Version : 50623
File Encoding         : 65001

Date: 2016-05-01 21:51:27
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=MyISAM AUTO_INCREMENT=149 DEFAULT CHARSET=utf8 COMMENT='后台登陆日志表';

-- ----------------------------
-- Records of hm_login_log
-- ----------------------------
INSERT INTO `hm_login_log` VALUES ('148', 'iteny', '1462110535', '192.168.0.185', '0', '帐号密码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');
INSERT INTO `hm_login_log` VALUES ('147', 'iteny', '1462110517', '192.168.0.185', '0', '验证码错误', '对方和您在同一内部网', '局域网', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2693.2 Safari/537.36');

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
