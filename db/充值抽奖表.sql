/*
Navicat MySQL Data Transfer

Source Server         : www
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : 1yyg

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2016-07-14 17:11:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `go_activity_lottery`
-- ----------------------------
DROP TABLE IF EXISTS `go_activity_lottery`;
CREATE TABLE `go_activity_lottery` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) default NULL,
  `prize` varchar(100) default NULL,
  `money` decimal(10,0) default NULL,
  `time` int(11) default NULL,
  `title` varchar(200) default NULL,
  `desc` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of go_activity_lottery
-- ----------------------------
