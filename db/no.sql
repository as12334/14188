/*
Navicat MySQL Data Transfer

Source Server         : 323
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : no

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2016-11-16 10:13:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `address`
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(11) unsigned zerofill NOT NULL auto_increment,
  `email` varchar(30) collate utf8_unicode_ci NOT NULL,
  `name` varchar(20) collate utf8_unicode_ci NOT NULL,
  `province` varchar(50) collate utf8_unicode_ci NOT NULL,
  `city` varchar(50) collate utf8_unicode_ci NOT NULL,
  `town` varchar(50) collate utf8_unicode_ci NOT NULL,
  `addr` varchar(200) collate utf8_unicode_ci NOT NULL,
  `mobile` varchar(11) collate utf8_unicode_ci NOT NULL,
  `tel` varchar(20) collate utf8_unicode_ci NOT NULL,
  `px` int(11) NOT NULL,
  `pass` varchar(4) collate utf8_unicode_ci NOT NULL,
  `wtime` int(11) NOT NULL,
  `ip` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of address
-- ----------------------------

-- ----------------------------
-- Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL auto_increment,
  `lm` int(11) default NULL,
  `title` varchar(100) collate utf8_unicode_ci default NULL,
  `urls` varchar(200) collate utf8_unicode_ci default NULL,
  `img_sl` varchar(100) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of banner
-- ----------------------------

-- ----------------------------
-- Table structure for `diy`
-- ----------------------------
DROP TABLE IF EXISTS `diy`;
CREATE TABLE `diy` (
  `id` int(11) NOT NULL auto_increment,
  `z_body` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of diy
-- ----------------------------

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

-- ----------------------------
-- Table structure for `go_admin`
-- ----------------------------
DROP TABLE IF EXISTS `go_admin`;
CREATE TABLE `go_admin` (
  `uid` tinyint(3) unsigned NOT NULL auto_increment,
  `mid` tinyint(3) unsigned NOT NULL,
  `username` char(15) NOT NULL,
  `userpass` char(32) NOT NULL,
  `useremail` varchar(100) default NULL,
  `addtime` int(10) unsigned default NULL,
  `logintime` int(10) unsigned default NULL,
  `loginip` varchar(15) default NULL,
  PRIMARY KEY  (`uid`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of go_admin
-- ----------------------------
INSERT INTO `go_admin` VALUES ('1', '0', 'admin', '7fef6171469e80d32c0559f88b377245', '', null, '1470560054', '127.0.0.1');

-- ----------------------------
-- Table structure for `go_ad_area`
-- ----------------------------
DROP TABLE IF EXISTS `go_ad_area`;
CREATE TABLE `go_ad_area` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `width` smallint(6) unsigned default NULL,
  `height` smallint(6) unsigned default NULL,
  `des` varchar(255) default NULL,
  `checked` tinyint(1) default '0' COMMENT '1表示通过',
  PRIMARY KEY  (`id`),
  KEY `checked` (`checked`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='广告位';

-- ----------------------------
-- Records of go_ad_area
-- ----------------------------

-- ----------------------------
-- Table structure for `go_ad_data`
-- ----------------------------
DROP TABLE IF EXISTS `go_ad_data`;
CREATE TABLE `go_ad_data` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `aid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` char(10) default NULL COMMENT 'code,text,img',
  `content` text,
  `url` varchar(100) default NULL,
  `urlMob` varchar(100) default NULL,
  `checked` tinyint(1) default '0' COMMENT '1表示通过',
  `addtime` int(10) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='广告';

-- ----------------------------
-- Records of go_ad_data
-- ----------------------------

-- ----------------------------
-- Table structure for `go_article`
-- ----------------------------
DROP TABLE IF EXISTS `go_article`;
CREATE TABLE `go_article` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '文章id',
  `cateid` char(30) NOT NULL COMMENT '文章父ID',
  `author` char(20) default NULL,
  `title` char(100) NOT NULL COMMENT '标题',
  `title_style` varchar(100) default NULL,
  `thumb` varchar(3) default NULL,
  `picarr` text,
  `keywords` varchar(100) default NULL,
  `description` varchar(255) default NULL,
  `content` mediumtext COMMENT '内容',
  `hit` int(10) unsigned default '0',
  `order` tinyint(3) unsigned default NULL,
  `posttime` int(10) unsigned default NULL COMMENT '添加时间',
  `url` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
  KEY `cateid` (`cateid`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_article
-- ----------------------------
INSERT INTO `go_article` VALUES ('1', '2', '一元微购', '了解网站', '', '', 'a:2:{i:0;s:33:\"photo/20130902/41484375056924.jpg\";i:1;s:33:\"photo/20130902/26578125056924.jpg\";}', '', '', '<p><br/></p><p><br/></p><p><br/></p><p class=\"textindent\" style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; text-indent: 2em; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">1元微购是一种新颖的购物体验方式，只需1元就有可能买到一件商品。1元微购把一件商品平分成若干“等份”出售，每份1元，当一件商品所有“等份”售出后抽出一名幸运者，该幸运者即可获得此商品。</p><h3 style=\"padding: 0px; margin: 30px 0px 0px; font-size: 14px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; line-height: 30px; white-space: normal;\">规则：</h3><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal; height: 10px;\"><br/></p><p>1、每件商品参考市场价平分成相应“等份”，每份1元，1份对应1个微购码。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; height: 10px;\"><br/></p><p>2、同一件商品可以购买多次或一次购买多份。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; height: 10px;\"><br/></p><p>3、当一件商品所有“等份”全部售出后计算出“幸运1元微购码”，拥有“幸运1元微购码”者即可获得此商品。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; height: 10px;\"><br/></p><p>4、1元微购码计算方式：</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; height: 10px;\"><br/></p><p style=\"padding: 0px 0px 0px 36px; margin-top: 0px; margin-bottom: 0px; text-indent: -1em;\">1）取该商品最后购买时间前网站所有商品100条购买时间记录（限时揭晓商品取截止时间前网站所有商品100条购买时间记录）。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; height: 10px;\"><br/></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; text-indent: 1.6em;\">2）时间按时、分、秒、毫秒依次排列组成一组数值。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; height: 10px;\"><br/></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; text-indent: 1.6em;\">3）将这100组数值之和除以商品总需参与人次后取余数，余数加上10,000,001即为“幸运码”。</p><h3 style=\"padding: 0px; margin: 30px 0px 0px; font-size: 14px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; line-height: 30px; white-space: normal;\">流程：</h3><p><strong style=\"padding: 0px; margin: 0px;\">1、挑选商品</strong></p><p style=\"padding: 0px; margin-bottom: 15px;\">分类浏览或直接搜索商品，点击“立即微购”。</p><p><strong style=\"padding: 0px; margin: 0px;\">2、支付1元</strong></p><p style=\"padding: 0px; margin-bottom: 10px;\">通过在线支付平台，支付1元即购买1人次，获得1个“微购码”。同一件商品可购买多次或一次购买多份，购买的“微购码”越多，获得商品的几率越大。</p><p><strong style=\"padding: 0px; margin: 0px;\">3、揭晓获得者</strong></p><p style=\"padding: 0px; margin-bottom: 15px;\">当一件商品达到总参与人次，抽出1名商品获得者，1元微购网会通过手机短信或邮件通知您领取商品。</p><h3 style=\"padding: 0px 0px 0px 22px; margin: 0px; font-size: 14px;\">注：</h3><p style=\"padding: 0px; margin-bottom: 10px; text-indent: 1.6em;\">1）商品揭晓后您可登录&quot;我的微购&quot;查询详情，未获得商品的用户不会收到短信或邮件通知；</p><p style=\"padding: 0px; margin-bottom: 10px; text-indent: 1.6em;\">2）商品揭晓后，请及时登录&quot;我的<span style=\"text-indent: 25.6px;\">微</span>购&quot;完善个人资料，以便我们能够准确无误地为您配送商品。</p><p style=\"padding: 0px; margin-bottom: 10px; text-indent: 1.6em;\">3）所有已揭晓商品均不给予退款</p><p><strong style=\"padding: 0px; margin: 0px;\">4、晒单分享</strong><br style=\"padding: 0px; margin: 0px;\"/></p><p style=\"padding: 0px; margin-bottom: 0px;\">晒出您收到的商品实物图片甚至您的靓照，说出您的微购心得，让大家一起分享您的快乐。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px;\">在您收到商品后，您只需登录网站完成晒单，并通过审核，即可获得400-1500微积分奖励。在您成功晒单后，您的晒单会出现在网站&quot;晒单分享&quot;区，与大家分享喜悦。</p><p><br/></p>', '71', '1', '1451635260', null);
INSERT INTO `go_article` VALUES ('2', '2', '一元微购', '常见问题', '', '', 'a:0:{}', '', '', '<p>	</p><p><br/></p><p><strong><span style=\"color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px;\">1、怎样查看我参与的商品有没有中奖？</span></strong><br/></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">每件商品开奖结果公布之后，登录网站，进入&quot;我的用户中心&quot;，在&quot;我中奖的商品&quot;中即可查询中奖情况。</p><h4 style=\"padding: 0px; margin: 30px 0px 0px; font-size: 14px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; line-height: 30px; white-space: normal;\">2、我获得了商品，我还需要支付其他费用吗？</h4><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">不需要支付其他任何费用。</p><h4 style=\"padding: 0px; margin: 30px 0px 0px; font-size: 14px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; line-height: 30px; white-space: normal;\">3、当我获得商品以后我该做什么？</h4><p class=\"textindent\" style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; text-indent: 2em; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">在您获得商品后您会收到站内信、短信和电子邮件的通知。在这之后，您必须在“我的<span style=\"color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px;\">用户</span>中心”正确填写、真实的收货地址，完善或确认您的个人信息。我们会在您获得商品后3个工作日内通过电话方式与您取得联系。</p><h4 style=\"padding: 0px; margin: 30px 0px 0px; font-size: 14px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; line-height: 30px; white-space: normal;\">4、商品是正品吗？怎么保证？</h4><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">我们承诺，所有商品100%正品，可享受厂家所提供的全国联保服务，享受商品的保修、换货和退货的义务（国家三包政策）。</p><h4 style=\"padding: 0px; margin: 30px 0px 0px; font-size: 14px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; line-height: 30px; white-space: normal;\">5、如何晒单分享？</h4><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">在您收到商品后，登录网站，进入&quot;我的<span style=\"color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px;\">用户</span>中心&quot;，在“晒单分享”区发布晒单信息，通过审核后，您还可获得400-1500微积分奖励。在您成功晒单后，您的晒单会出现在网站“晒单分享”区，与大家分享喜悦。</p><h4 style=\"padding: 0px; margin: 30px 0px 0px; font-size: 14px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; line-height: 30px; white-space: normal;\">6、我收到的商品可以换货或者退货吗？</h4><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">非质量问题，不在三包范围内，不给予退换货。</p><h4 style=\"padding: 0px; margin: 30px 0px 0px; font-size: 14px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; line-height: 30px; white-space: normal;\">7、参与1元微购需要注意什么？</h4><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">请务必正确填写真实有效的联系电话、收货地址以便在您中奖时能及时与您取得联系。</p><h4 style=\"padding: 0px; margin: 30px 0px 0px; font-size: 14px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; line-height: 30px; white-space: normal;\">8、网上银行充值未及时到帐怎么办？</h4><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">网上支付未及时到帐可能有以下几个原因造成：</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">第一，由于网速或者支付接口等问题，支付数据没有及时传送到支付系统造成的；</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">第二，网速过慢，数据传输超时，使银行后台支付信息不能成功对接，导致银行交易成功而支付后台显示失败；</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">第三，在网上支付如果使用某些防火墙软件，有时会屏蔽银行接口的弹出窗口，这时会造成在银行那边被扣费，但在我们网站上显示尚没支付。但请您放心，每天我们都会根据银行系统的帐务明细清单对前一天的订单进行逐笔核对，如遇问题订单，我们会做手工添加。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">建议反馈</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">如您对我们“帮助中心”的说明有任何疑问或建议请<a href=\"http://help.1yyg.com/htm-contactus.html\" style=\"padding: 0px; margin: 0px; text-decoration: none; color: rgb(102, 102, 102); word-break: break-all; outline: none;\">告诉我们</a></p><p><br/></p>', '63', '3', '1451635380', null);
INSERT INTO `go_article` VALUES ('3', '2', '一元微购', '服务协议', '', '', 'a:0:{}', '', '', '<p>	</p><p><br/></p><p><span style=\"font-family: Arial;\">&nbsp;</span></p><p style=\";margin-bottom:0;text-indent:32px;line-height:30px\"><span style=\"font-size:14px;color:#666666\">欢迎您访问并使用充满互动乐趣的购物网站</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">-</span><span style=\"font-size:14px;color:#666666\">1元微购，作为为用户提供全新、有趣购物模式的互联网公司，1元微购通过在线网站为您提供各项相关服务。当使用1元微购的各项具体服务时，您和1元微购都将受到本服务协议所产生的制约，1元微购会不断推出新的服务，因此所有服务都将受此服务条款的制约。请您在注册前务必认真阅读此服务协议的内容并确认，如有任何疑问，应向1元微购咨询。一旦您确认本服务协议后，本服务协议即在用户和1元微购之间产生法律效力。您在注册过程中点击</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">“</span><span style=\"font-size:14px;color:#666666\">同意以下条款提交注册信息</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">”</span><span style=\"font-size:14px;color:#666666\">按钮即表示您完全接受本协议中的全部条款。随后按照页面给予的提示完成全部的注册步骤。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;text-indent: 32px;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">1元微购将可能不定期的修改本服务协议的有关条款，并保留在必要时对此协议中的所有条款进行随时修改的权利。一旦协议内容有所修改，1元微购将会在网站重要页面或社区的醒目位置第一时间给予通知。如果您继续使用1元微购的服务，则视为您受协议的改动内容。如果不同意本站对协议内容所做的修改，1元微购会及时取消您的服务使用权限。本站保留随时修改或中断服务而不需告知用户的权利。本站行使修改或中断服务的权利，不需对用户或第三方负责。</span></p><h4 style=\"margin: 30px 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">一、用户注册</span></h4><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">1</span><span style=\"font-size:14px;color:#666666\">、用户注册是指用户登录1元微购，按要求填写相关信息并确认同意本服务协议的过程。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">2</span><span style=\"font-size:14px;color:#666666\">、1元微购用户必须是具有完全民事行为能力的自然人，或者是具有合法经营资格的实体组织。无民事行为能力人、限制民事行为能力人以及无经营或特定经营资格的组织不得注册为1元微购用户或超过其民事权利或行为能力范围与1元微购进行交易，如与1元微购进行交易的，则服务协议自始无效，1元微购有权立即停止与该用户的交易、注销该用户账户，并有权要求其承担相应法律责任。</span></p><h4 style=\"margin: 30px 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">二、用户的帐号，密码和安全性</span></h4><p style=\"margin: 0 0 0;text-indent: 32px;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">用户一旦注册成功，成为本站的合法用户。用户将对用户名和密码安全负全部责任。此外，每个用户都要对以其用户名进行的所有活动和事件负全责。用户若发现任何非法使用用户帐号或存在安全漏洞的情况，请立即通告本站。</span></p><h4 style=\"margin: 30px 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">三、1元微购原则</span></h4><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">1</span><span style=\"font-size:14px;color:#666666\">、释义</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">微购码：指1元微购网用户成功参与微购之后获得的随机分配编码。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">幸运微购码：指某件商品所有编码售出后，1元微购网根据规则计算出的一个编码，持有该编码的用户即可获得该商品。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">2</span><span style=\"font-size:14px;color:#666666\">、1元微购网承诺遵循以下的原则运营网站，确保所有用户在1元微购网中享受同等的权利与义务。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">平等原则：用户和1元微购在交易过程中具有同等的法律地位。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">自由原则：用户享有自愿向1元微购参与购买商品的权利，任何人不得非法干预。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">公平原则：用户和1元微购行使权利、履行义务应当遵循公平原则。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">诚实信用原则：用户和1元微购行使权利、履行义务应当遵循诚实信用原则。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">履行义务原则：用户向1元微购参与商品分享购买时，用户和1元微购皆有有义务根据本服务协议的约定完成该等交易（法律或本协议禁止的交易除外）</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">3</span><span style=\"font-size:14px;color:#666666\">、用户知悉，除本协议另有约定外，用户无论是否获得商品，参与微购的资金均用于帮助他人，不能退回；用户完全了解参与1元微购存在的风险，1元微购网无法保证用户参与微购一定会获得商品。</span></p><h4 style=\"margin: 30px 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">四、用户的权利和义务</span></h4><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">1</span><span style=\"font-size:14px;color:#666666\">、用户有权拥有其在1元微购的用户名及密码，并用该用户名和密码登录1元微购参与商品购买。用户不得以任何形式转让或授权他人使用自己的1元微购用户名。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">2</span><span style=\"font-size:14px;color:#666666\">、用户有权根据本协议的规定以及1元微购网站上发布的相关规则在1元微购上查询商品信息、发表使用体验、参与商品讨论、邀请关注好友、上传商品图片、参加1元微购的有关活动，以及享受1元微购提供的其它信息服务</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">3</span><span style=\"font-size:14px;color:#666666\">、用户有义务在注册时提供自己的真实资料，并保证诸如电子邮件地址、联系电话、联系地址、邮政编码等内容的有效性及真实性，保证1元微购可以通过上述联系方式与用户本人进行联系。同时，用户也有义务在相关资料发生变更时及时更新有关注册资料。用户保证不以他人资料在1元微购进行注册和参与商品分享购买。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">4</span><span style=\"font-size:14px;color:#666666\">、用户应当保证在1元微购参与商品分享购买时遵守诚实信用原则，不扰乱网上交易的正常秩序。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">5</span><span style=\"font-size:14px;color:#666666\">、用户在成为1元微购的会员后，可按1元微购的微积分规则享受<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微积</span>分获得。累积<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微积</span>分可用于<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微积</span>分商城中的相应<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微积</span>分商品兑换。<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微积</span>分规则连同与该规则相关的条款和条件，构成用户与1元微购之间的完整协议。接受本协议，即表明接受福分规则中的条款和条件。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">6</span><span style=\"font-size:14px;color:#666666\">、用户享有言论自由权利；并拥有适度修改、删除自己发表的文章的权利用户不得在1元微购发表包含以下内容的言论：</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">1) </span><span style=\"font-size:14px;color:#666666\">反对宪法所确定的基本原则，煽动、抗拒、破坏宪法和法律、行政法规实施的；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">2) </span><span style=\"font-size:14px;color:#666666\">煽动颠覆国家政权，推翻社会主义制度，煽动、分裂国家，破坏国家统一的；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">3) </span><span style=\"font-size:14px;color:#666666\">损害国家荣誉和利益的；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">4) </span><span style=\"font-size:14px;color:#666666\">煽动民族仇恨、民族歧视，破坏民族团结的；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">5) </span><span style=\"font-size:14px;color:#666666\">任何包含对种族、性别、宗教、地域内容等歧视的；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">6) </span><span style=\"font-size:14px;color:#666666\">捏造或者歪曲事实，散布谣言，扰乱社会秩序的；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">7) </span><span style=\"font-size:14px;color:#666666\">宣扬封建迷信、邪教、淫秽、色情、赌博、暴力、凶杀、恐怖、教唆犯罪的；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">8) </span><span style=\"font-size:14px;color:#666666\">公然侮辱他人或者捏造事实诽谤他人的，或者进行其他恶意攻击的；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">9) </span><span style=\"font-size:14px;color:#666666\">损害国家机关信誉的；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">10) </span><span style=\"font-size:14px;color:#666666\">其他违反宪法和法律行政法规的。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><br/></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">7</span><span style=\"font-size:14px;color:#666666\">、用户在发表使用体验、讨论图片等，除遵守本条款外，还应遵守该讨论区的相关规定。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">8</span><span style=\"font-size:14px;color:#666666\">、未经1元微购同意，禁止用户在网站发布任何形式的广告。</span></p><h4 style=\"margin: 30px 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">五、1元微购的权利和义务</span></h4><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">1</span><span style=\"font-size:14px;color:#666666\">、1元微购有义务在现有技术上维护整个网上交易平台的正常运行，并努力提升和改进技术，使用户网上交易活动得以顺利进行；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">2</span><span style=\"font-size:14px;color:#666666\">、对用户在注册和使用<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网上交易平台中所遇到的与交易或注册有关的问题及反映的情况，<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>应及时作出回复；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">3</span><span style=\"font-size:14px;color:#666666\">、对于用户在<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网站上作出下列行为的，<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>有权作出删除相关信息、终止提供服务等处理，而无须征得用户的同意：</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">1) </span><span style=\"font-size:14px;color:#666666\"><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>有权对用户的注册信息及购买行为进行查阅，发现注册信息或购买行为中存在任何问题的，有权向用户发出询问及要求改正的通知或者作出删除等处理；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">2) </span><span style=\"font-size:14px;color:#666666\">用户违反本协议规定或有违反法律法规和地方规章的行为的，<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>有权停止传输并删除其信息，禁止用户发言，注销用户账户并按照相关法律规定向相关主管部门进行披露。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">3) </span><span style=\"font-size:14px;color:#666666\">对于用户在<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>进行的下列行为，<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>有权对用户采取删除其信息、禁止用户发言、注销用户账户等限制性措施：包括发布或以电子邮件或以其他方式传送存在恶意、虚假和侵犯他人人身财产权利内容的信息，进行与分享购物无关或不是以分享购物为目的的活动，恶意注册、签到、评论等方式试图扰乱正常购物秩序，将有关干扰、破坏或限制任何计算机软件、硬件或通讯设备功能的软件病毒或其他计算机代码、档案和程序之资料，加以上载、发布、发送电子邮件或以其他方式传送，干扰或破坏<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网站和服务或与<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网站和服务相连的服务器和网络，或发布其他违反公共利益或可能严重损害<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>和其它用户合法利益的信息。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">4</span><span style=\"font-size:14px;color:#666666\">、用户在此免费授予<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>永久性的独家使用权</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">(</span><span style=\"font-size:14px;color:#666666\">并有权对该权利进行再授权</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">)</span><span style=\"font-size:14px;color:#666666\">，使<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>有权在全球范围内</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">(</span><span style=\"font-size:14px;color:#666666\">全部或部分地</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">)</span><span style=\"font-size:14px;color:#666666\">使用、复制、修订、改写、发布、翻译和展示用户公示于<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网站的各类信息，或制作其派生作品，和或以现在已知或日后开发的任何形式、媒体或技术，将上述信息纳入其它作品内。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">5</span><span style=\"font-size:14px;color:#666666\">、对于<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网络平台已上架商品，<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>有权根据市场变动修改商品价格，而无需提前通知客户。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">6</span><span style=\"font-size:14px;color:#666666\">、<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>分享购物模式，秉着双方自愿原则，分享购物存在风险，<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>不对抽取的</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">“微购</span><span style=\"font-size:14px;color:#666666\">编号</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">”</span><span style=\"font-size:14px;color:#666666\">结果承担责任，望所有用户谨慎参与。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">7</span><span style=\"font-size:14px;color:#666666\">、</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">90</span><span style=\"font-size:14px;color:#666666\">天未达到</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">“</span><span style=\"font-size:14px;color:#666666\">总需参与人次</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">”</span><span style=\"font-size:14px;color:#666666\">的商品，用户可通过客服申请退款，所退款项将在</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">3</span><span style=\"font-size:14px;color:#666666\">个工作日内，退还至微购账户中。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><h4 style=\"margin: 30px 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">六、配送及费用</span></h4><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\"><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>将会把产品送到您所指定的送货地址。全国免费配送（港澳台地区除外）。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">请清楚准确地填写您的真实姓名、送货地址及联系方式。因如下情况造成配送延迟或无法配送等，本站将不承担责任：</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">1</span><span style=\"font-size:14px;color:#666666\">、客户提供错误信息和不详细的地址；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">2</span><span style=\"font-size:14px;color:#666666\">、货物送达无人签收，由此造成的重复配送所产生的费用及相关的后果。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">3</span><span style=\"font-size:14px;color:#666666\">、不可抗力，例如：自然灾害、交通戒严、突发战争等。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><h4 style=\"margin: 30px 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">七、商品缺货规则</span></h4><p style=\"margin: 0 0 0;text-indent: 32px;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">由于市场变化及各种以合理商业努力难以控制的因素的影响，<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网无法承诺用户所获得的商品都会有货；用户获得的商品或服务如果发生缺货，协议双方均无权取消该交易，<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网将通过有效方式通知用户进行换货，用户可选择换购本商城同等价位的商品（一件或多件），或选择补差价换购高价位商品。</span></p><p style=\"margin: 0 0 0;text-indent: 32px;line-height: 30px\"><span style=\"font-size:14px;color:#666666\"><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网可对即将上市的商品或服务进行预售登记，<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网会在商品或者服务正式上市之后尽最大努力在最快时间内给商品获得者安排发货，预售登记并不做交易处理，不构成要约。</span></p><h4 style=\"margin: 30px 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">八、责任限制</span></h4><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">1</span><span style=\"font-size:14px;color:#666666\">、用户理解并同意，在使用<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网服务的过程中，可能会遇到不可抗力等风险因素使<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网服务发生中断。不可抗力是指不能预见、不能克服并不能避免且对1方或双方造成重大影响的客观事件，包括但不限于自然灾害如洪水、地震、瘟疫流行和风暴等以及社会事件如战争、动乱、政府行为等。出现上述情况时，<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网将努力在第一时间与相关单位配合，及时进行修复，但是由此给用户造成的损失，<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网将在法律允许的范围内免责。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">2</span><span style=\"font-size:14px;color:#666666\">、用户理解并同意，<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网不能随时预见和防范法律、技术以及其他不可控的风险，对以下情形之一导致的服务中断或受阻，<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网不承担责任：</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">（</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">1</span><span style=\"font-size:14px;color:#666666\">）大规模病毒、木马或其他恶意程序、黑客攻击的破坏；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">（</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">2</span><span style=\"font-size:14px;color:#666666\">）用户或<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网的电脑软件、系统、硬件和通信线路出现故障；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">（</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">3</span><span style=\"font-size:14px;color:#666666\">）用户操作不当；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">（</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">4</span><span style=\"font-size:14px;color:#666666\">）用户通过非<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网授权的方式使用服务；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">（</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">5</span><span style=\"font-size:14px;color:#666666\">）政府管制等原因可能导致的服务中断、数据丢失以及其他的损失和风险。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">（</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">6</span><span style=\"font-size:14px;color:#666666\">）其他<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>网无法控制或合理预见的情形。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">3</span><span style=\"font-size:14px;color:#666666\">、在法律法规所允许的限度内，因使用<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>服务而引起的任何损害或经济损失，<span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">1元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span>承担的全部责任均不超过用户所购买的与该索赔有关的商品价格。这些责任限制条款将在法律所允许的最大限度内适用，并在用户资格被撤销或终止后仍继续有效。</span></p><h4 style=\"margin: 30px 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">九、网络服务内容的所有权</span></h4><p style=\"margin: 0 0 0;text-indent: 32px;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">本站定义的网络服务内容包括：文字、软件、声音、图片、录象、图表、广告中的全部内容；电子邮件的全部内容；本站为用户提供的其他信息。所有这些内容受版权、商标、标签和其它财产所有权法律的保护。所以，用户只能在本站和广告商授权下才能使用这些内容，而不能擅自复制、再造这些内容、或创造与内容有关的派生产品。本站所有的文章版权归原文作者和本站共同所有，任何人需要转载本站的文章，必须征得原文作者或本站授权。</span></p><h4 style=\"margin: 30px 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">十、用户隐私制度</span></h4><p style=\"margin: 0 0 0;text-indent: 32px;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">我们不会向任何第三方提供，出售，出租，分享和交易用户的个人信息。当在以下情况下，用户的个人信息将部分或全部被善意披露：</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">1</span><span style=\"font-size:14px;color:#666666\">、经用户同意，向第三方披露；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">2</span><span style=\"font-size:14px;color:#666666\">、如用户是合资格的知识产权投诉人并已提起投诉，应被投诉人要求，向被投诉人披露，以便双方处理可能的权利纠纷；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">3</span><span style=\"font-size:14px;color:#666666\">、根据法律的有关规定，或者行政或司法机构的要求，向第三方或者行政、司法机构披露；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">4</span><span style=\"font-size:14px;color:#666666\">、如果用户出现违反中国有关法律或者网站政策的情况，需要向第三方披露；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">5</span><span style=\"font-size:14px;color:#666666\">、为提供你所要求的产品和服务，而必须和第三方分享用户的个人信息；</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">6</span><span style=\"font-size:14px;color:#666666\">、其它本站根据法律或者网站政策认为合适的披露。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><h4 style=\"margin: 30px 0 0;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">十一、法律管辖和适用</span></h4><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">1</span><span style=\"font-size:14px;color:#666666\">、本协议的订立、执行和解释及争议的解决均应适用中国法律。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">2</span><span style=\"font-size:14px;color:#666666\">、如发生本站服务条款与中国法律相抵触时，则这些条款将完全按法律规定重新解释，而其它合法条款则依旧保持对用户产生法律效力和影响。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">3</span><span style=\"font-size:14px;color:#666666\">、本协议的规定是可分割的，如本协议任何规定被裁定为无效或不可执行，该规定可被删除而其余条款应予以执行。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">4</span><span style=\"font-size:14px;color:#666666\">、如双方就本协议内容或其执行发生任何争议，双方应尽力友好协商解决；协商不成时，任何一方均可向本站所在地的人民法院提起诉讼。</span></p><p>&nbsp;</p><p><br/></p>', '50', '0', '1451635440', null);
INSERT INTO `go_article` VALUES ('4', '3', '一元微购', '购保障体系', '', '', 'a:0:{}', '', '', '<p>	</p><p><br/></p><h4 class=\"mat0\" style=\"padding: 0px; margin: 0px; font-size: 14px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; line-height: 30px; white-space: normal;\">100%正品保证</h4><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\"><span style=\"font-size:14px;font-family:宋体;color:#666666\"><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">一元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span></span>精心挑选优质服务品牌商家，保障全场商品100%品牌正品。</p><h4 style=\"padding: 0px; margin: 30px 0px 0px; font-size: 14px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; line-height: 30px; white-space: normal;\">100%公平公正</h4><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">整个过程是完全透明，您可以随时查看每件商品参与人数，参与次数，参与名单及中奖信息等记录。</p><h4 style=\"padding: 0px; margin: 30px 0px 0px; font-size: 14px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; line-height: 30px; white-space: normal;\">全国免费快递</h4><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\"><span style=\"font-size:14px;font-family:宋体;color:#666666\"><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">一元</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">微</span><span style=\"color: rgb(102, 102, 102); font-size: 14px; line-height: 30px;\">购</span></span>承诺全场所有商品全国免费快递。（港澳台地区除外）</p><p><br/></p>', '55', '0', '1451635440', null);
INSERT INTO `go_article` VALUES ('5', '3', '一元微购', '正品保障', '', '', 'a:0:{}', '', '', '<p>	</p><p><br/></p><p style=\"margin-top:5px;margin-bottom:5px\"><span style=\"font-family: Arial\"></span></p><p style=\"margin: 0 0 0;text-indent: 32px;line-height: 30px\"><span style=\"font-size:14px;color:#666666\"><span style=\"text-indent: 28px;\">1元微购</span>严格控制供应渠道，全部商品均从品牌官方以及品牌经销商直接采购供货，并取得品牌官方网络销售授权书，如果您认为幸运购的商品是假货，并能提供国家相关质检机构的证明文件，经确认后，在返还商品金额的同时并提供假一赔十服务保障。为了保障您的利益，对幸运购的商品，做如下说明：</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">1</span><span style=\"font-size:14px;color:#666666\">、<span style=\"text-indent: 28px;\">1元微购</span>对所有商品均保证正品行货，正规渠道发货，所有商品都可以享受生产厂家的全国联保服务，按照国家三包政策，针对所售商品履行保修、换货和退货的义务。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">2</span><span style=\"font-size:14px;color:#666666\">、出现国家三包所规定的功能性故障时，经由生产厂家指定或特约售后服务中心检测确认故障属实，您可以选择换货或者维修；超过</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">15</span><span style=\"font-size:14px;color:#666666\">日且在保修期内，您只能在保修期内享受免费维修服务。为了不耽误您使用，缩短故障商品的维修时间，我们建议您直接联系生产厂家售后服务中心进行处理。您也可以直接在商品的保修卡中查找该商品对应的全国各地生产厂家售后服务中心联系处理。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">3</span><span style=\"font-size:14px;color:#666666\">、<span style=\"text-indent: 28px;\">1元微购</span>真诚提醒广大幸运者在您收到商品的时候，请尽量亲自签收并当面拆箱验货，如果有问题</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">(</span><span style=\"font-size:14px;color:#666666\">运输途中的损坏</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">)</span><span style=\"font-size:14px;color:#666666\">请不要签收</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">!</span><span style=\"font-size:14px;color:#666666\">与快递员交涉，拒签，退回</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">!</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">4</span><span style=\"font-size:14px;color:#666666\">、在收到商品后发现有质量问题，请您不要私自处理，妥善保留好原包装，第一时间联系<span style=\"text-indent: 28px;\">1元微购</span>客服人员，由<span style=\"text-indent: 28px;\">1元微购</span>同发货商城协商在</span><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">48</span><span style=\"font-size:14px;color:#666666\">小时内解决。如有破损或丢失，我们将无法为您办理退货。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;text-indent: 32px;line-height: 30px\"><span style=\"font-size:14px;color:#666666\">如对协商处理结果存在异议，请您自行到当地生产厂家售后服务中心进行检测，并开据正规检测报告（对于有些生产厂家售后服务中心无法提供检测报告的，需提供维修检验单据），如果检测报告确认属于质量问题，然后将检测报告、问题商品及完整包装附件，一并返还发货商城办理换货手续，产生的相关费用由<span style=\"text-indent: 28px;\">1元微购</span>追究相关责任方承担。</span></p><p style=\"margin: 0 0 0;line-height: 30px\"><span style=\"font-size:14px;font-family:Tahoma;color:#666666\">&nbsp;</span></p><p style=\"margin: 0 0 0;text-indent: 32px;line-height: 30px\"><span style=\"font-size:14px;color:#666666\"><span style=\"text-indent: 28px;\">1元微购</span>上的电子产品及配件因为生成工艺或仓储物流原因，可能会存在收到或使用过程中出现故障的几率，<span style=\"text-indent: 28px;\">1元微购</span>不能保证所有的商品都没有故障，但我们保证所售商品都是全新正品行货，能够提供正规的售后保障。我们保证商品的正规进货渠道和质量，如果您对收到的商品质量表示怀疑，请提供生产厂家或官方出具的书面鉴定，我们会按照国家法律规定予以处理。但对于任何欺诈性行为，<span style=\"text-indent: 28px;\">1元微购</span>将保留依法追究法律责任的权利。本规则最终解释权由<span style=\"text-indent: 28px;\">1元微购</span>所有。</span></p><p>&nbsp;</p><p><br/></p>', '52', '0', '1451635500', null);
INSERT INTO `go_article` VALUES ('6', '3', '一元微购', '安全支付', '', '', 'a:0:{}', '', '', '<p>	</p><p><br/></p><p><br/></p><p><br/></p><p><span style=\"color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; text-indent: 28px;\"><span style=\"font-size:14px;font-family:宋体;color:#666666\"><span style=\"text-indent: 28px;\">1元微购</span></span>严格遵循网络购物的安全准则，通过支付宝、财付通等安全度高的支付方式，充分保证您在线支付的安全性。</span></p>', '56', '0', '1451635500', null);
INSERT INTO `go_article` VALUES ('7', '4', '一元微购', '商品配送', '', '', 'a:0:{}', '', '', '<p>	</p><p><br/></p><p><br/></p><p class=\"textindent\" style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; text-indent: 2em; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">在您获得商品后，<span style=\"font-size:14px;font-family:宋体;color:#666666\"><span style=\"text-indent: 28px;\">1元微购</span></span>将在第一时间内免费为你寄出，一般采用签约快递，均为服务好，覆盖网点非常广泛的全国性快递公司或者邮政的EMS，以最大限度保证商品安全。如快递公司无法达到的地方，则使用邮政EMS为您寄送商品。</p><p class=\"textindent\" style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; text-indent: 2em; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">若遇商品暂时缺货或者是有其他方面的问题，<span style=\"font-size:14px;font-family:宋体;color:#666666\"><span style=\"text-indent: 28px;\">1元微购</span></span>客服将会及时与您沟通处理。</p><p><br/></p>', '63', '0', '1451635500', null);
INSERT INTO `go_article` VALUES ('8', '4', '一元微购', '配送费用', '', '', 'a:0:{}', '', '', '<p>	</p><p><br/></p><p><br/></p><p><span style=\"color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px;\">所有商品全国免费配送。（港澳地区除外）</span></p>', '51', '0', '1451635500', null);
INSERT INTO `go_article` VALUES ('9', '4', '一元微购', '商品验货与签收', '', '', 'a:0:{}', '', '', '<p>	</p><p><br/></p><p><br/></p><p class=\"bottom-space16px\" style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">1、您在签收商品时请慎重，请尽量不要让人代签，并务必先仔细检查商品（外包装是否被开封、商品是否破损、配件是否缺失、功能是否正常），确保无误后再签收，以免产生不必要的纠纷。若有任何疑问，请及时拨打客服电话反馈信息。若因用户未仔细检查商品即签收后产生的纠纷，<span style=\"font-size:14px;font-family:宋体;color:#666666\">幸运一元购</span>概不负责，仅承担协调处理的义务。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal; height: 10px;\"><br/></p><p class=\"bottom-space16px\" style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">2、若因您的地址填写错误、联系方式填写有误等情况造成商品无法完成投递或被退回，所产生的额外费用及后果由用户负责。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal; height: 10px;\"><br/></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">3、如因不可抗拒的自然原因（地震、洪水等等）所造成的商品配送延迟，<span style=\"font-size:14px;font-family:宋体;color:#666666\"><span style=\"text-indent: 28px;\">1元微购</span></span>不承担责任。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal; height: 10px;\"><br/></p><h4 style=\"padding: 0px; margin: 30px 0px 0px; font-size: 14px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; line-height: 30px; white-space: normal;\">温馨提醒</h4><p class=\"textindent\" style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; text-indent: 2em; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">若您或您的委托人已签收，则说明订单商品正确无误且不存在影响使用的因素，<span style=\"font-size:14px;font-family:宋体;color:#666666\"><span style=\"text-indent: 28px;\">1元微购</span></span>有权不受理因包装或商品破损、商品错漏发、商品表面质量问题、商品附带品及赠品少发为由的换货申请。</p><p><br/></p>', '68', '0', '1451635500', null);
INSERT INTO `go_article` VALUES ('10', '4', '一元微购', '长时间未收到商品', '', '', 'a:0:{}', '', '', '<p>	</p><p><br/></p><p><br/></p><p><br/></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">长时间未收到商品可能出现的问题：</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">1、请您确保您的收货地址、邮编、电话、Email地址等各项信息的准确性，以便商品及时、准确地发出。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px; white-space: normal;\">2、配送过程中如果我们联络您的时间超过7天未得到回复，此商品将被默认为您已经放弃。</p><p><br/></p>', '36', '0', '1451635560', null);
INSERT INTO `go_article` VALUES ('13', '2', '一元微购', '联系我们', '', '', 'a:0:{}', '', '', '<p>	</p><p><br/></p><p><span style=\"color: rgb(102, 102, 102); font-family: Tahoma, Arial, 宋体, Helvetica, sans-serif; font-size: 14px; line-height: 30px;\"></span></p><p>商务合作</p><p>1元微购拥有国内庞大的消费群体及专业高效的电子商务平台，诚意邀请各品牌供应商与我们达成商务合作，共同创造中国电子商务的美好明天。</p><p>市场推广</p><p>随着1元微购发展壮大以及全国各地市场的开拓，欢迎拥有市场推广、广告合作资源的您与我们携手共进，共同发展。 携手共进。</p><p>媒体关注</p><p>随着1元微购的发展，欢迎各类媒体前来沟通指导，同时欢迎各类内容合作策划传播，你们的关注和支持，采访以及报道，将成为1元微购</p><p><br/></p>', '61', '1', '1451652840', null);
INSERT INTO `go_article` VALUES ('14', '3', '一元微购', '购物公益', '', '', 'a:0:{}', '', '', '<p>	</p><p><br/></p><p style=\"text-indent: 28px; \">一、微基金是1元微购创始人发起成立的以公益事业为主要方向的爱心基金。微基金本着“我为人人，人人为我”的社会责任，向需要帮助的困难人们提供爱心捐助。</p><p><br/></p><p>二、每位在1元微购进行分享购物的朋友，您的每次参与都将是为我们的公益事业做出一份贡献。当您每参与1人次微购，将由1元微购出资为幸运基金筹款0.01元，所筹款项将全部用于微基金。</p><p><br/></p><p>三、微基金将会以第1种途径或第2种途径进行使用：<br/>1、1元微购全体员工将组织向身边的公益事业进行捐赠与关怀活动。活动内容包括：资金、所需用品以及探望与协助等，每次捐赠与关怀活动结束后幸运基金将公布活动详情以及基金详细使用报告。<br/>2、微基金通过腾讯公益或壹基金等公益组织进行爱心捐赠。</p><p><br/></p><p>四、包括微购基金的捐赠活动，我们不定期开展内部全体员工对身边更多公益事业或实时公益事业进行爱心捐赠的社会活动。</p><p>&nbsp; &nbsp; 我们还将不定期邀请幸运者参与并见证我们的基金社会活动，共同为我们的社会责任付出一份爱心与力量。当活动启动前我们会将活动进行公告，您可自愿或自行组织参与，组成微购网大家庭，共同开启活动之行。凡参与社会活动的幸运者均能获得1元微购为您精心准备的公益爱心礼品一份。</p><p><br/></p>', '11', '1', '1451599560', null);

-- ----------------------------
-- Table structure for `go_brand`
-- ----------------------------
DROP TABLE IF EXISTS `go_brand`;
CREATE TABLE `go_brand` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `cateid` varchar(255) default NULL COMMENT '所属栏目ID',
  `status` varchar(255) default 'Y' COMMENT '显示隐藏',
  `name` varchar(255) default NULL,
  `order` int(11) default '1',
  `thumb` varchar(255) default NULL,
  `url` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
  KEY `status` (`status`),
  KEY `order` (`order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='品牌表';

-- ----------------------------
-- Records of go_brand
-- ----------------------------

-- ----------------------------
-- Table structure for `go_caches`
-- ----------------------------
DROP TABLE IF EXISTS `go_caches`;
CREATE TABLE `go_caches` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY  (`id`),
  KEY `key` (`key`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_caches
-- ----------------------------
INSERT INTO `go_caches` VALUES ('1', 'member_name_key', 'admin,administrator,一元云购');
INSERT INTO `go_caches` VALUES ('2', 'shopcodes_table', '1');
INSERT INTO `go_caches` VALUES ('3', 'goods_count_num', '81522');
INSERT INTO `go_caches` VALUES ('4', 'template_mobile_reg', '【1元微购】您好,你的注册验证码是:000000如非本人操作，可不用理会！');
INSERT INTO `go_caches` VALUES ('5', 'template_mobile_shop', '恭喜你幸运购购用户！您在幸运一元购网购买的商品已揭晓,获得的幸运码为：00000000 请登陆网站查看详情！请尽快联系管理员发货！');
INSERT INTO `go_caches` VALUES ('6', 'template_email_reg', '<table width=\"600\" cellpadding=\"0\" cellspacing=\"0\" style=\"border: #dddddd 1px solid; padding: 20px 0;\">\n<tbody>\n<tr>\n<td>\n<table width=\"100%\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-bottom: #ff6600 2px solid; padding-bottom: 12px;\">\n<tbody>\n<tr>\n<td style=\"line-height:22px; padding-left:20px;\">\n<a href=\"http://www.xxxx.com/\" target=\"_blank\" style=\" font-size:32px;color:#ff7700; text-decoration:none;\"><b>幸运1元购</b></a></td>\n<td align=\"right\" style=\"font-size: 12px; padding-right: 20px; padding-top: 30px;\">\n<a href=\"http://www.xxxx.com/\" target=\"_blank\" style=\"color: #2AF; text-decoration: none;\">首页</a>\n<b style=\"width: 1px; height: 10px; vertical-align: -1px; font-size: 1px; background: #CACACA; display: inline-block; margin: 0 5px;\"></b>\n<a href=\"http://www.xxxx.com/?/member/home\" target=\"_blank\" style=\"color: #22aaff; text-decoration: none;\">我的幸运1元购</a>\n<b style=\"width: 1px; height: 10px; vertical-align: -1px; font-size: 1px; background: #CACACA; display: inline-block; margin: 0 5px;\"></b>\n<a href=\"http://www.xxxx.com/?/help/1\" target=\"_blank\" style=\"color: #22aaff; text-decoration: none;\">帮助中心</a></td>\n</tr>\n</tbody>\n</table>\n<table width=\"100%\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"padding: 0 20px;\">\n<tbody>\n<tr>\n<td style=\"font-size: 14px; color: #333333; height: 40px; line-height: 40px; padding-top: 10px;\">\n<b style=\"color: #333333; font-family: Arial;\"> </b></td>\n</tr>\n<tr>\n<td style=\"font-size: 12px; color: #333333; line-height: 22px;\">\n<p style=\"text-indent: 2em; padding: 0; margin: 0;\">亲爱的用户您好！感谢您注册幸运1元购。</p></td>\n</tr>\n<tr>\n<td style=\"font-size: 12px; color: #333333; line-height: 22px;\">\n<p style=\"text-indent: 2em; padding: 0; margin: 0;\">请在24小时内激活注册邮件，点击连接激活邮件：</p></td>\n</tr>\n<tr>\n</tr>\n<tr>\n<td width=\"525\" style=\"font-size: 12px; padding-top: 5px; word-break: break-all; word-wrap: break-word;\">\n<a href=\"#\" target=\"_blank\" style=\"font-family: Arial; color: #22aaff;\">{地址}</a></td>\n</tr>\n</tbody>\n</table>\n<table width=\"100%\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin-top: 60px;\">\n<tbody>\n<tr>\n<td style=\"font-size: 12px; color: #777777; line-height: 22px; border-bottom: #22aaff 2px solid; padding-bottom: 8px; padding-left: 20px;\">此邮件由系统自动发出，请勿回复！</td>\n</tr>\n<tr>\n<td style=\"font-size: 12px; color: #333333; line-height: 22px; padding: 8px 20px 0;\">感谢您对幸运1元购（<a href=\"#\" target=\"_blank\" style=\"color: #22aaff; font-family: Arial;\">http://www.xingyun1y.com</a>）的支持，祝您好运！</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n<table cellpadding=\"0\" cellspacing=\"0\" width=\"600\"> <tbody> <tr> <td align=\"center\" style=\"font-size:12px; color:#999; line-height:30px\">Copyright ? 2013 - 2014,?版权所有?xingyun1y.com?黔ICP备15000202号-3</td>\n</tr>\n</tbody>\n</table>');
INSERT INTO `go_caches` VALUES ('7', 'template_email_shop', '恭喜您：{用户名}，你在云购网购买的商品：{商品名称} 已揭晓，揭晓码是:{中奖码}');
INSERT INTO `go_caches` VALUES ('8', 'pay_bank_type', 'yeepay');
INSERT INTO `go_caches` VALUES ('9', 'template_mobile_pwd', '你好,你现在正在找回密码，你的验证码是【000000】。');
INSERT INTO `go_caches` VALUES ('10', 'template_email_pwd', '请在24小时内激活邮件，点击连接激活邮件：{地址}');

-- ----------------------------
-- Table structure for `go_category`
-- ----------------------------
DROP TABLE IF EXISTS `go_category`;
CREATE TABLE `go_category` (
  `cateid` smallint(6) unsigned NOT NULL auto_increment COMMENT '栏目id',
  `parentid` smallint(6) default NULL COMMENT '父ID',
  `channel` tinyint(4) NOT NULL default '0',
  `model` tinyint(1) default NULL COMMENT '栏目模型',
  `name` varchar(255) default NULL COMMENT '栏目名称',
  `catdir` char(20) default NULL COMMENT '英文名',
  `url` varchar(255) default NULL,
  `info` text,
  `order` smallint(6) unsigned default '1' COMMENT '排序',
  `cids` varchar(100) default NULL,
  `html` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`cateid`),
  KEY `name` (`name`),
  KEY `order` (`order`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
-- Records of go_category
-- ----------------------------
INSERT INTO `go_category` VALUES ('1', '0', '0', '2', '帮助', 'help', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";N;s:7:\"content\";N;s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}', '1', null, '0');
INSERT INTO `go_category` VALUES ('2', '1', '0', '2', '新手指南', 'xinshouzhinan', '', 'a:9:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";s:0:\"\";s:7:\"content\";s:0:\"\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";s:13:\"template_list\";s:22:\"article_list.list.html\";s:13:\"template_show\";s:22:\"article_show.help.html\";}', '1', null, '0');
INSERT INTO `go_category` VALUES ('3', '1', '0', '2', '购物保障', 'yunbaozhang', '', 'a:9:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";s:0:\"\";s:7:\"content\";s:0:\"\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";s:13:\"template_list\";s:22:\"article_list.list.html\";s:13:\"template_show\";s:22:\"article_show.help.html\";}', '1', null, '0');
INSERT INTO `go_category` VALUES ('4', '1', '0', '2', '商品配送', 'peisong', '', 'a:9:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";s:0:\"\";s:7:\"content\";s:0:\"\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";s:13:\"template_list\";s:22:\"article_list.list.html\";s:13:\"template_show\";s:22:\"article_show.help.html\";}', '1', null, '0');
INSERT INTO `go_category` VALUES ('7', '0', '0', '-1', '新手指南', 'newbie', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";s:22:\"single_web.newbie.html\";s:7:\"content\";s:0:\"\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}', '1', null, '0');
INSERT INTO `go_category` VALUES ('8', '0', '0', '-1', '合作专区', 'business', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";s:24:\"single_web.business.html\";s:7:\"content\";s:34:\"<p>输入栏目内容...567678</p>\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}', '1', null, '0');
INSERT INTO `go_category` VALUES ('9', '0', '0', '-1', '公益基金', 'fund', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";s:20:\"single_web.fund.html\";s:7:\"content\";s:28:\"<p>输入栏目内容...</p>\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}', '1', null, '0');
INSERT INTO `go_category` VALUES ('10', '0', '0', '-1', '网站QQ群', 'qqgroup', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";s:23:\"single_web.qqgroup.html\";s:7:\"content\";s:40:\"PHA+6L6T5YWl5qCP55uu5YaF5a65Li4uPC9wPg==\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}', '1', null, '0');
INSERT INTO `go_category` VALUES ('11', '0', '0', '-1', '邀请注册', 'pleasereg', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";s:25:\"single_web.pleasereg.html\";s:7:\"content\";s:28:\"<p>输入栏目内容...</p>\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}', '1', null, '0');
INSERT INTO `go_category` VALUES ('36', '2', '0', '2', '会员福分经验值', 'fufen', '', 'a:9:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";s:0:\"\";s:7:\"content\";s:0:\"\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";s:13:\"template_list\";N;s:13:\"template_show\";N;}', '1', null, '0');
INSERT INTO `go_category` VALUES ('50', '0', '0', '1', '四人购买', 'four', '', 'a:9:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";s:0:\"\";s:7:\"content\";s:0:\"\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";s:13:\"template_list\";s:20:\"goods_list.list.html\";s:13:\"template_show\";s:20:\"goods_show.show.html\";}', '1', null, '0');

-- ----------------------------
-- Table structure for `go_config`
-- ----------------------------
DROP TABLE IF EXISTS `go_config`;
CREATE TABLE `go_config` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `value` mediumtext,
  `zhushi` text,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_config
-- ----------------------------
INSERT INTO `go_config` VALUES ('1', 'web_name', '1元微购 - 1元就购了', '网站名');
INSERT INTO `go_config` VALUES ('2', 'web_key', '1元微购', '网站关键字');
INSERT INTO `go_config` VALUES ('3', 'web_des', '1元微购', '网站介绍');
INSERT INTO `go_config` VALUES ('4', 'web_path', '/', '网站地址');
INSERT INTO `go_config` VALUES ('5', 'templates_edit', '1', '是否允许在线编辑模板');
INSERT INTO `go_config` VALUES ('6', 'templates_name', 'v3', '当前模板方案');
INSERT INTO `go_config` VALUES ('7', 'charset', 'utf-8', '网站字符集');
INSERT INTO `go_config` VALUES ('8', 'timezone', 'Asia/Shanghai', '网站时区');
INSERT INTO `go_config` VALUES ('9', 'error', '1', '1、保存错误日志到 cache/error_log.php | 0、在页面直接显示');
INSERT INTO `go_config` VALUES ('10', 'gzip', '0', '是否Gzip压缩后输出,服务器没有gzip请不要启用');
INSERT INTO `go_config` VALUES ('11', 'lang', 'zh-cn', '网站语言包');
INSERT INTO `go_config` VALUES ('12', 'cache', '3600', '默认缓存时间');
INSERT INTO `go_config` VALUES ('13', 'web_off', '1', '网站是否开启');
INSERT INTO `go_config` VALUES ('14', 'web_off_text', '网站关闭。升级中....', '关闭原因');
INSERT INTO `go_config` VALUES ('15', 'tablepre', 'QCNf', null);
INSERT INTO `go_config` VALUES ('16', 'index_name', 'index.php', '隐藏首页文件名');
INSERT INTO `go_config` VALUES ('17', 'expstr', '/', 'url分隔符号');
INSERT INTO `go_config` VALUES ('18', 'admindir', '0admins1314', '后台管理文件夹');
INSERT INTO `go_config` VALUES ('19', 'qq', '921043084', 'qq');
INSERT INTO `go_config` VALUES ('20', 'cell', '80808080', '联系电话');
INSERT INTO `go_config` VALUES ('21', 'web_logo', 'banner/20160706/35431014771394.png', 'logo');
INSERT INTO `go_config` VALUES ('22', 'web_copyright', 'Copyright @ 2011 - 2016, 版权所有 粤ICP备15045441号', '版权');
INSERT INTO `go_config` VALUES ('23', 'web_name_two', '微购', '短网站名');
INSERT INTO `go_config` VALUES ('24', 'qq_qun', '348678790', 'QQ群');
INSERT INTO `go_config` VALUES ('25', 'goods_end_time', '180', '开奖动画秒数(单位秒)');
INSERT INTO `go_config` VALUES ('36', 'mob_logo', 'banner/20160904/19395292919252.png', '手机logo');
INSERT INTO `go_config` VALUES ('37', 'wx', 'banner/20160902/19440982812282.jpg', 'logo');
INSERT INTO `go_config` VALUES ('38', 'code_admin_off', '0', '后台验证码是否开启');
INSERT INTO `go_config` VALUES ('39', 'code_member_off', '0', '前台验证码是否开启');
INSERT INTO `go_config` VALUES ('40', 'web_wx_url', 'm.58woaiduobao.com', '微信登录回调域名');
INSERT INTO `go_config` VALUES ('41', 'code_reg_off', '1', '注册发送验证码是否开启');
INSERT INTO `go_config` VALUES ('42', 'apk_url', 'http://a.app.qq.com/o/simple.jsp?pkgname=org.zywx.wbpalmstar.widgetone.uex11529524', '安卓APP下载');
INSERT INTO `go_config` VALUES ('43', 'ipa_url', 'http://www.58woaiduobao.com/app/1y.ipa', '苹果APP下载');
INSERT INTO `go_config` VALUES ('44', 'wxtitle', null, null);
INSERT INTO `go_config` VALUES ('45', 'wxtext', null, null);
INSERT INTO `go_config` VALUES ('46', 'wximg', null, null);
INSERT INTO `go_config` VALUES ('47', 'wxurl', null, null);

-- ----------------------------
-- Table structure for `go_czk`
-- ----------------------------
DROP TABLE IF EXISTS `go_czk`;
CREATE TABLE `go_czk` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(10) default NULL,
  `czknum` varchar(12) NOT NULL COMMENT '充值卡号码',
  `password` varchar(12) NOT NULL COMMENT '充值卡密码',
  `mianzhi` int(11) NOT NULL COMMENT '面值',
  `status` tinyint(4) NOT NULL default '1' COMMENT '使用状态',
  `type` tinyint(4) NOT NULL default '1' COMMENT '充值类型 1一次性 2永久',
  `time` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_czk
-- ----------------------------

-- ----------------------------
-- Table structure for `go_egglotter_award`
-- ----------------------------
DROP TABLE IF EXISTS `go_egglotter_award`;
CREATE TABLE `go_egglotter_award` (
  `award_id` int(11) NOT NULL auto_increment COMMENT 'id',
  `user_id` int(11) default NULL COMMENT '用户ID',
  `user_name` varchar(11) default NULL COMMENT '用户名字',
  `rule_id` int(11) default NULL COMMENT '活动ID',
  `subtime` int(11) default NULL COMMENT '中奖时间',
  `spoil_id` int(11) default NULL COMMENT '奖品等级',
  PRIMARY KEY  (`award_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_egglotter_award
-- ----------------------------

-- ----------------------------
-- Table structure for `go_egglotter_rule`
-- ----------------------------
DROP TABLE IF EXISTS `go_egglotter_rule`;
CREATE TABLE `go_egglotter_rule` (
  `rule_id` int(11) NOT NULL auto_increment,
  `rule_name` varchar(200) default NULL,
  `starttime` int(11) default NULL COMMENT '活动开始时间',
  `endtime` int(11) default NULL COMMENT '活动结束时间',
  `subtime` int(11) default NULL COMMENT '活动编辑时间',
  `lotterytype` int(11) default NULL COMMENT '抽奖按币分类',
  `lotterjb` int(11) default NULL COMMENT '每一次抽奖使用的金币',
  `ruledesc` text COMMENT '规则介绍',
  `startusing` tinyint(4) default NULL COMMENT '启用',
  PRIMARY KEY  (`rule_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_egglotter_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `go_egglotter_spoil`
-- ----------------------------
DROP TABLE IF EXISTS `go_egglotter_spoil`;
CREATE TABLE `go_egglotter_spoil` (
  `spoil_id` int(11) NOT NULL auto_increment,
  `rule_id` int(11) default NULL,
  `spoil_name` text COMMENT '名称',
  `spoil_jl` int(11) default NULL COMMENT '机率',
  `spoil_dj` int(11) default NULL,
  `urlimg` varchar(200) default NULL,
  `subtime` int(11) default NULL COMMENT '提交时间',
  PRIMARY KEY  (`spoil_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_egglotter_spoil
-- ----------------------------

-- ----------------------------
-- Table structure for `go_fund`
-- ----------------------------
DROP TABLE IF EXISTS `go_fund`;
CREATE TABLE `go_fund` (
  `id` int(10) unsigned NOT NULL,
  `fund_off` tinyint(4) unsigned NOT NULL default '1',
  `fund_money` decimal(10,2) unsigned NOT NULL,
  `fund_count_money` decimal(12,2) default NULL COMMENT '云购基金',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_fund
-- ----------------------------
INSERT INTO `go_fund` VALUES ('1', '1', '0.01', '171.08');

-- ----------------------------
-- Table structure for `go_link`
-- ----------------------------
DROP TABLE IF EXISTS `go_link`;
CREATE TABLE `go_link` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '友情链接ID',
  `type` tinyint(1) unsigned NOT NULL COMMENT '链接类型',
  `name` char(20) NOT NULL COMMENT '名称',
  `logo` varchar(250) NOT NULL COMMENT '图片',
  `url` varchar(50) NOT NULL COMMENT '地址',
  PRIMARY KEY  (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_link
-- ----------------------------
INSERT INTO `go_link` VALUES ('1', '1', 'hll', '', '');

-- ----------------------------
-- Table structure for `go_lp`
-- ----------------------------
DROP TABLE IF EXISTS `go_lp`;
CREATE TABLE `go_lp` (
  `id` int(11) NOT NULL auto_increment,
  `title0` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl0` varchar(100) collate utf8_unicode_ci default NULL,
  `val0` varchar(100) collate utf8_unicode_ci default NULL,
  `type0` varchar(100) collate utf8_unicode_ci default NULL,
  `title1` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl1` varchar(100) collate utf8_unicode_ci default NULL,
  `val1` varchar(100) collate utf8_unicode_ci default NULL,
  `type1` varchar(100) collate utf8_unicode_ci default NULL,
  `title2` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl2` varchar(100) collate utf8_unicode_ci default NULL,
  `val2` varchar(100) collate utf8_unicode_ci default NULL,
  `type2` varchar(100) collate utf8_unicode_ci default NULL,
  `title3` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl3` varchar(100) collate utf8_unicode_ci default NULL,
  `val3` varchar(100) collate utf8_unicode_ci default NULL,
  `type3` varchar(100) collate utf8_unicode_ci default NULL,
  `title4` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl4` varchar(100) collate utf8_unicode_ci default NULL,
  `val4` varchar(100) collate utf8_unicode_ci default NULL,
  `type4` varchar(100) collate utf8_unicode_ci default NULL,
  `title5` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl5` varchar(100) collate utf8_unicode_ci default NULL,
  `val5` varchar(100) collate utf8_unicode_ci default NULL,
  `type5` varchar(100) collate utf8_unicode_ci default NULL,
  `title6` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl6` varchar(100) collate utf8_unicode_ci default NULL,
  `val6` varchar(100) collate utf8_unicode_ci default NULL,
  `type6` varchar(100) collate utf8_unicode_ci default NULL,
  `title7` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl7` varchar(100) collate utf8_unicode_ci default NULL,
  `val7` varchar(100) collate utf8_unicode_ci default NULL,
  `type7` varchar(100) collate utf8_unicode_ci default NULL,
  `title8` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl8` varchar(100) collate utf8_unicode_ci default NULL,
  `val8` varchar(100) collate utf8_unicode_ci default NULL,
  `type8` varchar(100) collate utf8_unicode_ci default NULL,
  `title9` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl9` varchar(100) collate utf8_unicode_ci default NULL,
  `val9` varchar(100) collate utf8_unicode_ci default NULL,
  `type9` varchar(100) collate utf8_unicode_ci default NULL,
  `title10` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl10` varchar(100) collate utf8_unicode_ci default NULL,
  `val10` varchar(100) collate utf8_unicode_ci default NULL,
  `type10` varchar(100) collate utf8_unicode_ci default NULL,
  `title11` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl11` varchar(100) collate utf8_unicode_ci default NULL,
  `val11` varchar(100) collate utf8_unicode_ci default NULL,
  `type11` varchar(100) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of go_lp
-- ----------------------------
INSERT INTO `go_lp` VALUES ('1', '平板电脑', 'banner/20160614/30748923896608.jpg', '1', '1', '苹果6s', 'banner/20160614/34014266896643.jpg', '1', '1', '真好吃', 'banner/20160614/83904774896690.jpg', '1', '1', '泰国香米', 'banner/20160614/44267489896728.jpg', '1', '1', '5元', 'banner/20160614/27592412896905.jpg', '1', '2', '4元', 'banner/20160614/75186042896923.jpg', '3', '2', '3元', 'banner/20160614/47842687896942.jpg', '11', '2', '2元', 'banner/20160614/34626987896952.jpg', '34', '2', '1元', 'banner/20160614/46530072896964.jpg', '23', '2', '20积分', 'banner/20160614/12092366896992.jpg', '43', '微积分', '10积分', 'banner/20160614/71483017897004.jpg', '134', '微积分', '5积分', 'banner/20160614/47998782897019.jpg', '651', '微积分');

-- ----------------------------
-- Table structure for `go_member`
-- ----------------------------
DROP TABLE IF EXISTS `go_member`;
CREATE TABLE `go_member` (
  `uid` int(10) unsigned NOT NULL auto_increment,
  `username` char(20) NOT NULL COMMENT '用户名',
  `email` varchar(50) default NULL COMMENT '用户邮箱',
  `mobile` char(11) default NULL COMMENT '用户手机',
  `password` char(32) default NULL COMMENT '密码',
  `user_ip` varchar(255) default NULL,
  `img` varchar(255) default NULL COMMENT '用户头像',
  `qianming` varchar(255) default NULL COMMENT '用户签名',
  `groupid` tinyint(4) unsigned default '0' COMMENT '用户权限组',
  `addgroup` varchar(255) default NULL COMMENT '用户加入的圈子组1|2|3',
  `money` decimal(10,2) unsigned default '0.00' COMMENT '账户金额',
  `emailcode` char(21) default '-1' COMMENT '邮箱认证码',
  `mobilecode` char(21) default '-1' COMMENT '手机认证码',
  `passcode` char(21) default '-1' COMMENT '找会密码认证码-1,1,码',
  `reg_key` varchar(100) default NULL COMMENT '注册参数',
  `score` int(10) unsigned NOT NULL default '0',
  `jingyan` int(10) unsigned default '0',
  `yaoqing` int(10) unsigned default NULL,
  `band` varchar(255) default NULL,
  `time` int(10) default NULL,
  `login_time` int(10) unsigned default '0',
  `sign_in_time` mediumint(8) NOT NULL default '0' COMMENT '连续签到天数',
  `sign_in_date` char(10) NOT NULL default '' COMMENT '上次签到日期',
  `sign_in_time_all` mediumint(8) NOT NULL default '0' COMMENT '总签到次数',
  `auto_user` tinyint(4) default '0',
  `dealer_pass` varchar(4) default NULL,
  `getType` varchar(10) default NULL COMMENT '识别pc端还是手机端',
  `num` int(11) default NULL,
  `qq` varchar(20) default NULL,
  `LotteryLeave` int(11) default NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Records of go_member
-- ----------------------------
INSERT INTO `go_member` VALUES ('1', '1元微购', '', '18672968131', '96e79218965eb72c92a549dd5a330112', '湖北省 襄樊市', 'photo/member.jpg', '', '1', null, '0.00', '-1', '1', '-1', null, '0', '0', null, null, '1472812559', '0', '0', '', '0', '1', null, null, null, null, null);
INSERT INTO `go_member` VALUES ('2', '', null, null, 'd41d8cd98f00b204e9800998ecf8427e', '', 'photo/member.jpg', null, '0', null, '0.00', '-1', '631930', '1', '', '0', '0', '0', null, '1472910818', '0', '0', '', '0', '0', null, 'pc', '1', null, null);

-- ----------------------------
-- Table structure for `go_membermobcode`
-- ----------------------------
DROP TABLE IF EXISTS `go_membermobcode`;
CREATE TABLE `go_membermobcode` (
  `id` int(11) NOT NULL,
  `account` varchar(40) collate utf8_unicode_ci default NULL,
  `pswd` varchar(40) collate utf8_unicode_ci default NULL,
  `num` int(11) default NULL,
  `pass` varchar(4) collate utf8_unicode_ci default NULL,
  `type` varchar(40) collate utf8_unicode_ci default NULL,
  `url` varchar(100) collate utf8_unicode_ci default NULL,
  `timeout` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of go_membermobcode
-- ----------------------------
INSERT INTO `go_membermobcode` VALUES ('1', 'admin', 'w123456', '4', '1', '巨辰科技', 'http://120.24.167.205/msg/HttpSendSM', '120');

-- ----------------------------
-- Table structure for `go_member_account`
-- ----------------------------
DROP TABLE IF EXISTS `go_member_account`;
CREATE TABLE `go_member_account` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `type` tinyint(1) default NULL COMMENT '充值1/消费-1',
  `pay` char(20) default NULL,
  `content` varchar(255) default NULL COMMENT '详情',
  `money` mediumint(8) NOT NULL default '0' COMMENT '金额',
  `time` char(20) NOT NULL,
  `cnum` varchar(21) default NULL,
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员账户明细';

-- ----------------------------
-- Records of go_member_account
-- ----------------------------

-- ----------------------------
-- Table structure for `go_member_addmoney_record`
-- ----------------------------
DROP TABLE IF EXISTS `go_member_addmoney_record`;
CREATE TABLE `go_member_addmoney_record` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL,
  `code` char(20) NOT NULL,
  `money` decimal(10,2) unsigned NOT NULL,
  `pay_type` char(10) NOT NULL,
  `status` char(20) NOT NULL,
  `time` int(10) NOT NULL,
  `score` int(10) unsigned default NULL,
  `scookies` text COMMENT '购物车cookie',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_member_addmoney_record
-- ----------------------------

-- ----------------------------
-- Table structure for `go_member_band`
-- ----------------------------
DROP TABLE IF EXISTS `go_member_band`;
CREATE TABLE `go_member_band` (
  `b_id` int(10) unsigned NOT NULL auto_increment,
  `b_uid` int(10) default NULL COMMENT '用户ID',
  `b_type` char(10) default NULL COMMENT '绑定登陆类型',
  `b_code` varchar(100) default NULL COMMENT '返回数据1',
  `b_data` varchar(100) default NULL COMMENT '返回数据2',
  `b_time` int(10) default NULL,
  PRIMARY KEY  (`b_id`),
  KEY `b_uid` (`b_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_member_band
-- ----------------------------

-- ----------------------------
-- Table structure for `go_member_cashout`
-- ----------------------------
DROP TABLE IF EXISTS `go_member_cashout`;
CREATE TABLE `go_member_cashout` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `username` varchar(20) NOT NULL COMMENT '开户人',
  `bankname` varchar(255) NOT NULL COMMENT '银行名称',
  `branch` varchar(255) NOT NULL COMMENT '支行',
  `money` decimal(8,0) NOT NULL default '0' COMMENT '申请提现金额',
  `time` char(20) NOT NULL COMMENT '申请时间',
  `banknumber` varchar(50) NOT NULL COMMENT '银行帐号',
  `linkphone` varchar(100) NOT NULL COMMENT '联系电话',
  `auditstatus` tinyint(4) NOT NULL COMMENT '1审核通过',
  `procefees` decimal(8,2) NOT NULL COMMENT '手续费',
  `reviewtime` char(20) NOT NULL COMMENT '审核通过时间',
  `type` char(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`),
  KEY `type` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员账户明细';

-- ----------------------------
-- Records of go_member_cashout
-- ----------------------------

-- ----------------------------
-- Table structure for `go_member_dealer`
-- ----------------------------
DROP TABLE IF EXISTS `go_member_dealer`;
CREATE TABLE `go_member_dealer` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) collate utf8_unicode_ci default NULL,
  `email` varchar(50) collate utf8_unicode_ci default NULL,
  `mobile` char(11) collate utf8_unicode_ci default NULL,
  `shopname` varchar(50) collate utf8_unicode_ci default NULL,
  `shopid` varchar(50) collate utf8_unicode_ci default NULL,
  `shopurl` varchar(200) collate utf8_unicode_ci default NULL,
  `shopbzj` varchar(18) collate utf8_unicode_ci default NULL,
  `shopmiaoshu` varchar(10) collate utf8_unicode_ci default NULL,
  `shopfuwu` varchar(10) collate utf8_unicode_ci default NULL,
  `shopwuliu` varchar(10) collate utf8_unicode_ci default NULL,
  `pass` varchar(4) collate utf8_unicode_ci default NULL,
  `time` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='商家入驻表';

-- ----------------------------
-- Records of go_member_dealer
-- ----------------------------

-- ----------------------------
-- Table structure for `go_member_del`
-- ----------------------------
DROP TABLE IF EXISTS `go_member_del`;
CREATE TABLE `go_member_del` (
  `uid` int(10) unsigned NOT NULL auto_increment,
  `username` char(20) NOT NULL COMMENT '用户名',
  `email` varchar(50) default NULL COMMENT '用户邮箱',
  `mobile` char(11) default NULL COMMENT '用户手机',
  `password` char(32) default NULL COMMENT '密码',
  `user_ip` varchar(255) default NULL,
  `img` varchar(255) default NULL COMMENT '用户头像',
  `qianming` varchar(255) default NULL COMMENT '用户签名',
  `groupid` tinyint(4) unsigned default '0' COMMENT '用户权限组',
  `addgroup` varchar(255) default NULL COMMENT '用户加入的圈子组1|2|3',
  `money` decimal(10,2) unsigned default '0.00' COMMENT '账户金额',
  `emailcode` char(21) default '-1' COMMENT '邮箱认证码',
  `mobilecode` char(21) default '-1' COMMENT '手机认证码',
  `passcode` char(21) default '-1' COMMENT '找会密码认证码-1,1,码',
  `reg_key` varchar(100) default NULL COMMENT '注册参数',
  `score` int(10) unsigned NOT NULL default '0',
  `jingyan` int(10) unsigned default '0',
  `yaoqing` int(10) unsigned default NULL,
  `band` varchar(255) default NULL,
  `time` int(10) default NULL,
  `login_time` int(10) unsigned default '0',
  `sign_in_time` mediumint(8) NOT NULL default '0' COMMENT '连续签到天数',
  `sign_in_date` char(10) NOT NULL default '' COMMENT '上次签到日期',
  `sign_in_time_all` mediumint(8) NOT NULL default '0' COMMENT '总签到次数',
  `auto_user` tinyint(4) default NULL,
  `dealer_pass` varchar(4) default NULL,
  `getType` varchar(10) default NULL,
  `num` int(11) default NULL,
  `qq` varchar(20) default NULL,
  `LotteryLeave` int(11) default NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Records of go_member_del
-- ----------------------------

-- ----------------------------
-- Table structure for `go_member_dizhi`
-- ----------------------------
DROP TABLE IF EXISTS `go_member_dizhi`;
CREATE TABLE `go_member_dizhi` (
  `id` tinyint(4) unsigned NOT NULL auto_increment COMMENT 'id',
  `uid` int(10) NOT NULL COMMENT '用户id',
  `sheng` varchar(15) default NULL COMMENT '省',
  `shi` varchar(15) default NULL COMMENT '市',
  `xian` varchar(15) default NULL COMMENT '县',
  `jiedao` varchar(255) default NULL COMMENT '街道地址',
  `youbian` mediumint(8) default NULL COMMENT '邮编',
  `shouhuoren` varchar(15) default NULL COMMENT '收货人',
  `mobile` char(11) default NULL COMMENT '手机',
  `qq` char(11) default NULL COMMENT 'QQ',
  `tell` varchar(15) default NULL COMMENT '座机号',
  `default` char(1) default 'N' COMMENT '是否默认',
  `time` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员地址表';

-- ----------------------------
-- Records of go_member_dizhi
-- ----------------------------

-- ----------------------------
-- Table structure for `go_member_go_record`
-- ----------------------------
DROP TABLE IF EXISTS `go_member_go_record`;
CREATE TABLE `go_member_go_record` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `code` char(20) default NULL COMMENT '订单号',
  `code_tmp` tinyint(3) unsigned default NULL COMMENT '相同订单',
  `username` varchar(30) NOT NULL,
  `uphoto` varchar(255) default NULL,
  `uid` int(10) unsigned NOT NULL COMMENT '会员id',
  `shopid` int(6) unsigned NOT NULL COMMENT '商品id',
  `shopname` varchar(255) NOT NULL COMMENT '商品名',
  `shopqishu` smallint(6) NOT NULL default '0' COMMENT '期数',
  `gonumber` smallint(5) unsigned default NULL COMMENT '购买次数',
  `goucode` longtext NOT NULL COMMENT '云购码',
  `moneycount` decimal(10,2) NOT NULL,
  `huode` char(50) NOT NULL default '0' COMMENT '中奖码',
  `pay_type` char(10) default NULL COMMENT '付款方式',
  `ip` varchar(255) default NULL,
  `status` char(30) default NULL COMMENT '订单状态',
  `company_money` decimal(10,2) unsigned NOT NULL default '0.00',
  `company_code` char(20) default NULL,
  `company` char(10) default NULL,
  `time` char(21) NOT NULL COMMENT '购买时间',
  `getType` varchar(10) default NULL COMMENT '识别pc端还是手机端',
  `auto_user` smallint(6) default NULL,
  `auto_buy` smallint(6) default NULL COMMENT '是否公开',
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`),
  KEY `shopid` (`shopid`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='云购记录表';

-- ----------------------------
-- Records of go_member_go_record
-- ----------------------------

-- ----------------------------
-- Table structure for `go_member_group`
-- ----------------------------
DROP TABLE IF EXISTS `go_member_group`;
CREATE TABLE `go_member_group` (
  `groupid` tinyint(4) unsigned NOT NULL auto_increment,
  `name` char(15) NOT NULL COMMENT '会员组名',
  `jingyan_start` int(10) unsigned NOT NULL default '0' COMMENT '需要的经验值',
  `jingyan_end` int(10) NOT NULL,
  `icon` varchar(255) default NULL COMMENT '图标',
  `type` char(1) NOT NULL default 'N' COMMENT '是否是系统组',
  PRIMARY KEY  (`groupid`),
  KEY `jingyan` (`jingyan_start`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='会员权限组';

-- ----------------------------
-- Records of go_member_group
-- ----------------------------
INSERT INTO `go_member_group` VALUES ('1', '微购新手', '1', '500', null, 'N');
INSERT INTO `go_member_group` VALUES ('2', '微购小将', '501', '1000', null, 'N');
INSERT INTO `go_member_group` VALUES ('3', '微购中将', '1001', '3000', null, 'N');
INSERT INTO `go_member_group` VALUES ('4', '微购上将', '3001', '6000', null, 'N');
INSERT INTO `go_member_group` VALUES ('5', '微购大将', '6001', '20000', null, 'N');
INSERT INTO `go_member_group` VALUES ('6', '微购将军', '20001', '40000', null, 'N');

-- ----------------------------
-- Table structure for `go_member_lucky`
-- ----------------------------
DROP TABLE IF EXISTS `go_member_lucky`;
CREATE TABLE `go_member_lucky` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) default NULL,
  `type` varchar(10) collate utf8_unicode_ci default NULL,
  `content` varchar(200) collate utf8_unicode_ci default NULL,
  `money` mediumint(8) default NULL,
  `time` char(20) collate utf8_unicode_ci default NULL,
  `pass` varchar(4) collate utf8_unicode_ci default NULL,
  `img` varchar(100) collate utf8_unicode_ci default NULL,
  `company_code` char(30) collate utf8_unicode_ci default NULL,
  `company` char(20) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of go_member_lucky
-- ----------------------------

-- ----------------------------
-- Table structure for `go_member_message`
-- ----------------------------
DROP TABLE IF EXISTS `go_member_message`;
CREATE TABLE `go_member_message` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `type` tinyint(1) default '0' COMMENT '消息来源,0系统,1私信',
  `sendid` int(10) unsigned default '0' COMMENT '发送人ID',
  `sendname` char(20) default NULL COMMENT '发送人名',
  `content` varchar(255) default NULL COMMENT '发送内容',
  `time` int(10) default NULL,
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员消息表';

-- ----------------------------
-- Records of go_member_message
-- ----------------------------

-- ----------------------------
-- Table structure for `go_member_number`
-- ----------------------------
DROP TABLE IF EXISTS `go_member_number`;
CREATE TABLE `go_member_number` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `username` varchar(20) character set utf8 collate utf8_unicode_ci NOT NULL,
  `banknumber` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `linkphone` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='会员提现账号表';

-- ----------------------------
-- Records of go_member_number
-- ----------------------------

-- ----------------------------
-- Table structure for `go_member_recodes`
-- ----------------------------
DROP TABLE IF EXISTS `go_member_recodes`;
CREATE TABLE `go_member_recodes` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `type` tinyint(1) NOT NULL COMMENT '收取1//充值-2/提现-3',
  `content` varchar(255) NOT NULL COMMENT '详情',
  `shopid` int(11) default NULL COMMENT '商品id',
  `money` decimal(8,2) NOT NULL default '0.00' COMMENT '佣金',
  `time` char(20) NOT NULL,
  `ygmoney` decimal(8,2) NOT NULL COMMENT '云购金额',
  `cashoutid` int(11) default NULL COMMENT '申请提现记录表id',
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员账户明细';

-- ----------------------------
-- Records of go_member_recodes
-- ----------------------------

-- ----------------------------
-- Table structure for `go_member_visitors`
-- ----------------------------
DROP TABLE IF EXISTS `go_member_visitors`;
CREATE TABLE `go_member_visitors` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) default NULL,
  `fkid` int(11) default NULL,
  `time` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='会员访客';

-- ----------------------------
-- Records of go_member_visitors
-- ----------------------------

-- ----------------------------
-- Table structure for `go_model`
-- ----------------------------
DROP TABLE IF EXISTS `go_model`;
CREATE TABLE `go_model` (
  `modelid` smallint(5) unsigned NOT NULL auto_increment,
  `name` char(10) NOT NULL,
  `table` char(20) NOT NULL,
  PRIMARY KEY  (`modelid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='模型表';

-- ----------------------------
-- Records of go_model
-- ----------------------------
INSERT INTO `go_model` VALUES ('1', '高级模型', 'shoplist');
INSERT INTO `go_model` VALUES ('2', '文章模型', 'article');

-- ----------------------------
-- Table structure for `go_navigation`
-- ----------------------------
DROP TABLE IF EXISTS `go_navigation`;
CREATE TABLE `go_navigation` (
  `cid` smallint(6) unsigned NOT NULL auto_increment,
  `parentid` smallint(6) unsigned default NULL,
  `name` varchar(255) default NULL,
  `type` char(10) default NULL,
  `url` varchar(255) default NULL,
  `status` char(1) default 'Y' COMMENT '显示/隐藏',
  `order` smallint(6) unsigned default '1',
  PRIMARY KEY  (`cid`),
  KEY `status` (`status`),
  KEY `order` (`order`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_navigation
-- ----------------------------
INSERT INTO `go_navigation` VALUES ('1', '0', '所有商品', 'index', '/goods_list', 'N', '6');
INSERT INTO `go_navigation` VALUES ('2', '0', '新手指南', 'index', '/single/newbie', 'N', '1');
INSERT INTO `go_navigation` VALUES ('3', '0', '圈子社区', 'index', '/group', 'Y', '2');
INSERT INTO `go_navigation` VALUES ('4', '0', '关于我们', 'foot', '/help/1', 'Y', '1');
INSERT INTO `go_navigation` VALUES ('5', '0', '隐私声明', 'foot', '/help/12', 'Y', '1');
INSERT INTO `go_navigation` VALUES ('6', '0', '合作专区', 'foot', '/single/business', 'Y', '1');
INSERT INTO `go_navigation` VALUES ('7', '0', '友情链接', 'foot', '/link', 'Y', '1');
INSERT INTO `go_navigation` VALUES ('8', '0', '联系我们', 'foot', '/help/13', 'Y', '1');
INSERT INTO `go_navigation` VALUES ('10', '0', '晒单分享', 'index', '/go/shaidan/', 'Y', '2');
INSERT INTO `go_navigation` VALUES ('12', '0', '最新揭晓', 'index', '/goods_lottery', 'Y', '5');
INSERT INTO `go_navigation` VALUES ('13', '0', '邀请有奖', 'index', '/single/pleasereg', 'Y', '3');
INSERT INTO `go_navigation` VALUES ('17', null, '免费抽奖', 'index', '/go/lucky', 'Y', '1222');

-- ----------------------------
-- Table structure for `go_pay`
-- ----------------------------
DROP TABLE IF EXISTS `go_pay`;
CREATE TABLE `go_pay` (
  `pay_id` int(11) unsigned NOT NULL auto_increment,
  `pay_name` char(20) NOT NULL,
  `pay_class` char(20) NOT NULL,
  `pay_type` tinyint(3) NOT NULL,
  `pay_thumb` varchar(255) default NULL,
  `pay_des` text,
  `pay_start` tinyint(4) NOT NULL,
  `pay_key` text,
  `pay_mobile` tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_pay
-- ----------------------------
INSERT INTO `go_pay` VALUES ('4', '支付宝', 'alipay', '2', 'photo/20130929/82028078450752.jpg', '支付宝支付 申请接口https://b.alipay.com/', '0', 'a:3:{s:2:\"id\";a:2:{s:4:\"name\";s:19:\"支付宝商户号:\";s:3:\"val\";s:16:\"2088802914990657\";}s:3:\"key\";a:2:{s:4:\"name\";s:16:\"支付宝密钥:\";s:3:\"val\";s:32:\"6ykcwmga9n7ei90otdiz1jkmir3hn3fg\";}s:4:\"user\";a:2:{s:4:\"name\";s:16:\"支付宝账号:\";s:3:\"val\";s:16:\"921043084@qq.com\";}}', '0');
INSERT INTO `go_pay` VALUES ('5', '手机支付宝', 'wapalipay', '1', 'photo/20130929/82028078450752.jpg', '手机支付宝支付\n 申请接口https://b.alipay.com/', '0', 'a:3:{s:2:\"id\";a:2:{s:4:\"name\";s:19:\"支付宝商户号:\";s:3:\"val\";s:15:\"208880291499065\";}s:3:\"key\";a:2:{s:4:\"name\";s:16:\"支付宝密钥:\";s:3:\"val\";s:31:\"6ykcwmga9n7ei90otdiz1jkmir3hn3f\";}s:4:\"user\";a:2:{s:4:\"name\";s:16:\"支付宝账号:\";s:3:\"val\";s:12:\"12390@qq.com\";}}', '1');
INSERT INTO `go_pay` VALUES ('8', '微信支付', 'wxpay_web', '1', 'photo/20160303/13622650938849.png', '微信支付 申请接口https://mp.weixin.qq.com/', '0', 'a:2:{s:2:\"id\";a:2:{s:4:\"name\";s:9:\"商户号\";s:3:\"val\";s:36:\"c5d1cba1-5e3f-4ba0-941d-9b0a371fe719\";}s:3:\"key\";a:2:{s:4:\"name\";s:6:\"密匙\";s:3:\"val\";s:36:\"39a7a518-9ac8-4a9e-87bc-7885f33cf18c\";}}', '1');
INSERT INTO `go_pay` VALUES ('9', '云支付', 'yunpay', '3', 'photo/20160728/86549204642223.png', '云支付 申请接口http://www.cyh.org.cn/', '0', 'a:3:{s:2:\"id\";a:2:{s:4:\"name\";s:19:\"微支付商户号:\";s:3:\"val\";s:16:\"7882146226268740\";}s:3:\"key\";a:2:{s:4:\"name\";s:16:\"微支付密钥:\";s:3:\"val\";s:32:\"nKf9s4L2mJT8ND3Vd9VYx72XkmK2jWjD\";}s:4:\"user\";a:2:{s:4:\"name\";s:16:\"微支付账号:\";s:3:\"val\";s:16:\"921043084@qq.com\";}}', '1');
INSERT INTO `go_pay` VALUES ('10', '聚宝支付', 'jubaopay', '3', 'photo/20160728/83261341642270.jpg', '聚宝支付 申请接口https://www.jubaopay.com/', '0', 'a:2:{s:2:\"id\";a:2:{s:4:\"name\";s:9:\"商户号\";s:3:\"val\";s:20:\"16070606591696747510\";}s:3:\"key\";a:2:{s:4:\"name\";s:6:\"密匙\";s:3:\"val\";s:0:\"\";}}', '1');
INSERT INTO `go_pay` VALUES ('11', '云通付', 'shan', '3', 'photo/20160728/83261341642270.jpg', '云通付 申请接口http://www.passpay.net/', '0', 'a:3:{s:2:\"id\";a:2:{s:4:\"name\";s:3:\"PID\";s:3:\"val\";s:15:\"762879217248501\";}s:3:\"key\";a:2:{s:4:\"name\";s:3:\"KEY\";s:3:\"val\";s:32:\"3qgYqUHRnPRBXBPrBB3UhMYWffKx42Kd\";}s:9:\"seller_id\";a:2:{s:4:\"name\";s:9:\"商户号\";s:3:\"val\";s:6:\"623639\";}}', '1');
INSERT INTO `go_pay` VALUES ('12', '云卡联盟', 'blpay', '3', 'photo/20160728/83261341642270.jpg', '云卡联盟 申请接口http://www.hbblkj.com/', '1', 'a:3:{s:2:\"id\";a:2:{s:4:\"name\";s:19:\"微支付商户号:\";s:3:\"val\";s:6:\"268740\";}s:3:\"key\";a:2:{s:4:\"name\";s:16:\"微支付密钥:\";s:3:\"val\";s:32:\"nKf9s4L2mJT8ND3Vd9VYx72XkmK2jWjD\";}s:4:\"user\";a:2:{s:4:\"name\";s:16:\"微支付账号:\";s:3:\"val\";s:14:\"1043084@qq.com\";}}', '1');

-- ----------------------------
-- Table structure for `go_position`
-- ----------------------------
DROP TABLE IF EXISTS `go_position`;
CREATE TABLE `go_position` (
  `pos_id` int(11) unsigned NOT NULL auto_increment,
  `pos_model` tinyint(3) unsigned NOT NULL,
  `pos_name` varchar(30) NOT NULL,
  `pos_num` tinyint(3) unsigned NOT NULL,
  `pos_maxnum` tinyint(3) unsigned NOT NULL,
  `pos_this_num` tinyint(3) unsigned NOT NULL default '0',
  `pos_time` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`pos_id`),
  KEY `pos_id` (`pos_id`),
  KEY `pos_model` (`pos_model`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_position
-- ----------------------------
INSERT INTO `go_position` VALUES ('1', '1', '测试高级模型推荐', '1', '2', '0', '1471158823');

-- ----------------------------
-- Table structure for `go_position_data`
-- ----------------------------
DROP TABLE IF EXISTS `go_position_data`;
CREATE TABLE `go_position_data` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `con_id` int(10) unsigned NOT NULL,
  `mod_id` tinyint(3) unsigned NOT NULL,
  `mod_name` char(20) NOT NULL,
  `pos_id` int(10) unsigned NOT NULL,
  `pos_data` mediumtext NOT NULL,
  `pos_order` int(10) unsigned NOT NULL default '1',
  `pos_time` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_position_data
-- ----------------------------

-- ----------------------------
-- Table structure for `go_qqset`
-- ----------------------------
DROP TABLE IF EXISTS `go_qqset`;
CREATE TABLE `go_qqset` (
  `id` int(11) NOT NULL auto_increment,
  `qq` varchar(11) default NULL,
  `name` varchar(50) default NULL,
  `type` varchar(20) default NULL,
  `province` varchar(50) default NULL,
  `city` varchar(50) default NULL,
  `county` varchar(50) default NULL,
  `qqurl` varchar(250) default NULL,
  `full` varchar(6) default NULL COMMENT '是否已满',
  `subtime` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_qqset
-- ----------------------------

-- ----------------------------
-- Table structure for `go_quanzi`
-- ----------------------------
DROP TABLE IF EXISTS `go_quanzi`;
CREATE TABLE `go_quanzi` (
  `id` tinyint(3) unsigned NOT NULL auto_increment COMMENT 'ID',
  `title` char(15) NOT NULL COMMENT '标题',
  `img` varchar(255) default NULL COMMENT '图片地址',
  `chengyuan` mediumint(8) unsigned default '0' COMMENT '成员数',
  `tiezi` mediumint(8) unsigned default '0' COMMENT '帖子数',
  `guanli` mediumint(8) unsigned NOT NULL COMMENT '管理员',
  `jinhua` smallint(5) unsigned default NULL COMMENT '精华帖',
  `jianjie` varchar(255) default '暂无介绍' COMMENT '简介',
  `gongao` varchar(255) default '暂无' COMMENT '公告',
  `jiaru` char(1) default 'Y' COMMENT '申请加入',
  `glfatie` char(1) default 'N' COMMENT '发帖权限',
  `time` int(11) NOT NULL COMMENT '时间',
  `huifu` char(1) NOT NULL default 'Y',
  `shenhe` char(1) default 'N',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_quanzi
-- ----------------------------
INSERT INTO `go_quanzi` VALUES ('1', '新手交流', 'quanzi/20160614/28670355898204.jpg', '0', '0', '1', null, '初来乍到，我们会多多关照，有疑问，可随时提出，工作人员会及时进行回复，希望您在这里玩得开心，赢得尽兴！ ', '暂无公告', 'Y', 'Y', '1465898214', 'Y', 'N');
INSERT INTO `go_quanzi` VALUES ('2', '活动专区', 'quanzi/20160614/51186362898284.jpg', '0', '0', '1', null, '官方进行任何活动，都会在此发布，期待大家踊跃参与！同时，大家也可自发组织活动，优秀组织者将会获取奖励哦！', '暂无公告', 'Y', 'Y', '1465898340', 'Y', 'N');
INSERT INTO `go_quanzi` VALUES ('3', '微购公告', 'quanzi/20160614/58045260898395.jpg', '0', '0', '1', null, '在这里，我们会不定期地发布美时美刻购的最新公告和政策，让我们与您同在，与您共同成长。感谢一路上有您的陪伴！ ', '暂无公告', 'Y', 'Y', '1466145307', 'Y', 'N');
INSERT INTO `go_quanzi` VALUES ('4', '意见反馈', 'quanzi/20160614/86593109899051.jpg', '0', '0', '1', null, '如果您对美时美刻购有什么意见或建议，请您在这儿告诉我们，帮助我们', '暂无公告', 'Y', 'Y', '1465899077', 'Y', 'N');
INSERT INTO `go_quanzi` VALUES ('5', '汽车专题', 'quanzi/20160614/45092189899138.jpg', '0', '0', '1', null, '暂无介绍', '暂无公告', 'Y', 'Y', '1465899141', 'Y', 'N');
INSERT INTO `go_quanzi` VALUES ('6', '开心一刻', 'quanzi/20160614/62875870899177.jpg', '0', '0', '1', null, '笑一笑十年少', '暂无公告', 'Y', 'Y', '1465899185', 'Y', 'N');
INSERT INTO `go_quanzi` VALUES ('7', '精彩视频', 'quanzi/20160614/28498542899230.png', '0', '1', '1', null, '精彩视频在线观看', '暂无公告', 'Y', 'Y', '1465899254', 'Y', 'N');
INSERT INTO `go_quanzi` VALUES ('8', '生活视频', 'quanzi/20160614/62295357899293.jpg', '0', '0', '1', null, '最新最快的生活视频，全免费哦', '暂无公告', 'Y', 'Y', '1465899308', 'Y', 'N');

-- ----------------------------
-- Table structure for `go_quanzi_hueifu`
-- ----------------------------
DROP TABLE IF EXISTS `go_quanzi_hueifu`;
CREATE TABLE `go_quanzi_hueifu` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT 'ID',
  `tzid` int(11) default NULL COMMENT '帖子ID匹配',
  `hueifu` text COMMENT '回复内容',
  `hueiyuan` varchar(255) default NULL COMMENT '会员',
  `hftime` int(11) default NULL COMMENT '时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_quanzi_hueifu
-- ----------------------------

-- ----------------------------
-- Table structure for `go_quanzi_tiezi`
-- ----------------------------
DROP TABLE IF EXISTS `go_quanzi_tiezi`;
CREATE TABLE `go_quanzi_tiezi` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT 'ID',
  `qzid` int(10) unsigned default NULL COMMENT '圈子ID匹配',
  `hueiyuan` varchar(255) default NULL COMMENT '会员信息',
  `title` varchar(255) default NULL COMMENT '标题',
  `neirong` text COMMENT '内容',
  `hueifu` smallint(5) unsigned NOT NULL default '0' COMMENT '回复',
  `dianji` int(10) unsigned NOT NULL default '0' COMMENT '点击量',
  `zhiding` varchar(4) default 'N' COMMENT '置顶',
  `jinghua` varchar(4) default 'N' COMMENT '精华',
  `zuihou` varchar(255) default NULL COMMENT '最后回复',
  `time` int(10) unsigned default NULL COMMENT '时间',
  `tiezi` int(10) unsigned NOT NULL default '0',
  `shenhe` char(1) NOT NULL default 'Y',
  `url` varchar(100) default NULL,
  `image` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_quanzi_tiezi
-- ----------------------------
INSERT INTO `go_quanzi_tiezi` VALUES ('12', '7', '1', '40秒破解 iphone密码？怕怕', '<p>	&nbsp; &nbsp;	</p><p><img src=\"http://img.baidu.com/hi/jx2/j_0011.gif\"/></p><p>	&nbsp;	</p>', '0', '2', 'Y', 'Y', '1', '1472812816', '0', 'Y', 'http://v.qq.com/iframe/player.html?vid=x0188hoxfpv&auto=0', 'shopimg/20160616/86397690087695.png');

-- ----------------------------
-- Table structure for `go_recom`
-- ----------------------------
DROP TABLE IF EXISTS `go_recom`;
CREATE TABLE `go_recom` (
  `id` int(10) NOT NULL auto_increment COMMENT '推荐位id',
  `img` varchar(50) default NULL COMMENT '推荐位图片',
  `title` varchar(30) default NULL COMMENT '推荐位标题',
  `link` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_recom
-- ----------------------------

-- ----------------------------
-- Table structure for `go_send`
-- ----------------------------
DROP TABLE IF EXISTS `go_send`;
CREATE TABLE `go_send` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL,
  `gid` int(10) unsigned NOT NULL,
  `username` varchar(30) NOT NULL,
  `shoptitle` varchar(200) NOT NULL,
  `send_type` tinyint(4) NOT NULL,
  `send_time` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`),
  KEY `gid` (`gid`),
  KEY `send_type` (`send_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_send
-- ----------------------------

-- ----------------------------
-- Table structure for `go_shaidan`
-- ----------------------------
DROP TABLE IF EXISTS `go_shaidan`;
CREATE TABLE `go_shaidan` (
  `sd_id` int(10) unsigned NOT NULL auto_increment COMMENT '晒单id',
  `sd_userid` int(10) unsigned default NULL COMMENT '用户ID',
  `sd_shopid` int(10) unsigned default NULL COMMENT '商品ID',
  `sd_qishu` int(10) default NULL COMMENT '商品期数',
  `sd_ip` varchar(255) default NULL,
  `sd_title` varchar(255) default NULL COMMENT '晒单标题',
  `sd_thumbs` varchar(255) default NULL COMMENT '缩略图',
  `sd_content` text COMMENT '晒单内容',
  `sd_photolist` text COMMENT '晒单图片',
  `sd_zhan` int(10) unsigned default '0' COMMENT '点赞',
  `sd_ping` int(10) unsigned default '0' COMMENT '评论',
  `sd_time` int(10) unsigned default NULL COMMENT '晒单时间',
  `sd_shopsid` int(10) unsigned default NULL,
  `sd_read_num` int(11) NOT NULL default '0' COMMENT '阅读',
  `sd_fufen` int(11) NOT NULL default '0' COMMENT '得到的福分',
  `sd_pass` int(11) NOT NULL default '0' COMMENT '审核',
  PRIMARY KEY  (`sd_id`),
  KEY `sd_userid` (`sd_userid`),
  KEY `sd_shopid` (`sd_shopid`),
  KEY `sd_zhan` (`sd_zhan`),
  KEY `sd_ping` (`sd_ping`),
  KEY `sd_time` (`sd_time`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='晒单';

-- ----------------------------
-- Records of go_shaidan
-- ----------------------------

-- ----------------------------
-- Table structure for `go_shaidan_hueifu`
-- ----------------------------
DROP TABLE IF EXISTS `go_shaidan_hueifu`;
CREATE TABLE `go_shaidan_hueifu` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `sdhf_id` int(11) NOT NULL COMMENT '晒单ID',
  `sdhf_userid` int(11) default NULL COMMENT '晒单回复会员ID',
  `sdhf_content` text COMMENT '晒单回复内容',
  `sdhf_time` int(11) default NULL,
  `sdhf_username` char(20) default NULL,
  `sdhf_img` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_shaidan_hueifu
-- ----------------------------

-- ----------------------------
-- Table structure for `go_shopcodes_1`
-- ----------------------------
DROP TABLE IF EXISTS `go_shopcodes_1`;
CREATE TABLE `go_shopcodes_1` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `s_id` int(10) unsigned NOT NULL,
  `s_cid` smallint(5) unsigned NOT NULL,
  `s_len` smallint(5) default NULL,
  `s_codes` text,
  `s_codes_tmp` text,
  PRIMARY KEY  (`id`),
  KEY `s_id` (`s_id`),
  KEY `s_cid` (`s_cid`),
  KEY `s_len` (`s_len`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_shopcodes_1
-- ----------------------------

-- ----------------------------
-- Table structure for `go_shoplist`
-- ----------------------------
DROP TABLE IF EXISTS `go_shoplist`;
CREATE TABLE `go_shoplist` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '商品id',
  `sid` int(10) unsigned NOT NULL COMMENT '同一个商品',
  `cateid` smallint(6) unsigned default NULL COMMENT '所属栏目ID',
  `brandid` smallint(6) unsigned default NULL COMMENT '所属品牌ID',
  `title` varchar(100) default NULL COMMENT '商品标题',
  `title_style` varchar(100) default NULL,
  `title2` varchar(100) default NULL COMMENT '副标题',
  `keywords` varchar(100) default NULL,
  `description` varchar(255) default NULL,
  `money` decimal(10,2) default '0.00' COMMENT '金额',
  `yunjiage` decimal(8,2) unsigned default '1.00' COMMENT '云购人次价格',
  `zongrenshu` int(10) unsigned default '0' COMMENT '总需人数',
  `canyurenshu` int(10) unsigned default '0' COMMENT '已参与人数',
  `shenyurenshu` int(10) unsigned default NULL,
  `def_renshu` int(10) unsigned default '0',
  `qishu` smallint(6) unsigned default '0' COMMENT '期数',
  `maxqishu` smallint(5) unsigned default '1' COMMENT ' 最大期数',
  `thumb` varchar(255) default NULL,
  `picarr` text COMMENT '商品图片',
  `content` mediumtext COMMENT '商品内容详情',
  `codes_table` char(20) default NULL,
  `xsjx_time` int(10) unsigned default NULL,
  `pos` tinyint(4) unsigned default NULL COMMENT '是否推荐',
  `renqi` tinyint(4) unsigned default '0' COMMENT '是否人气商品0否1是',
  `time` int(10) unsigned default NULL COMMENT '时间',
  `order` int(10) unsigned default '1',
  `q_uid` int(10) unsigned default NULL COMMENT '中奖人ID',
  `q_user` text COMMENT '中奖人信息',
  `q_user_code` char(20) default NULL COMMENT '中奖码',
  `q_content` mediumtext COMMENT '揭晓内容',
  `q_counttime` char(20) default NULL COMMENT '总时间相加',
  `q_end_time` char(20) default NULL COMMENT '揭晓时间',
  `q_showtime` char(1) default 'N' COMMENT 'Y/N揭晓动画',
  `renqipos` tinyint(4) unsigned default '0',
  `newpos` tinyint(4) unsigned default NULL,
  `bannershop` tinyint(4) unsigned default NULL,
  `posthumb` varchar(255) default NULL,
  `zhiding` int(11) default NULL,
  `parentid` int(1) default NULL,
  `auto_money` decimal(10,0) default NULL,
  PRIMARY KEY  (`id`),
  KEY `renqi` (`renqi`),
  KEY `order` (`yunjiage`),
  KEY `q_uid` (`q_uid`),
  KEY `sid` (`sid`),
  KEY `shenyurenshu` (`shenyurenshu`),
  KEY `q_showtime` (`q_showtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品表';

-- ----------------------------
-- Records of go_shoplist
-- ----------------------------

-- ----------------------------
-- Table structure for `go_shoplist_del`
-- ----------------------------
DROP TABLE IF EXISTS `go_shoplist_del`;
CREATE TABLE `go_shoplist_del` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `sid` int(10) NOT NULL COMMENT '同一个商品',
  `cateid` smallint(6) unsigned default NULL,
  `brandid` smallint(6) unsigned default NULL,
  `title` varchar(100) default NULL,
  `title_style` varchar(100) default NULL,
  `title2` varchar(100) default NULL,
  `keywords` varchar(100) default NULL,
  `description` varchar(255) default NULL,
  `money` decimal(10,2) default '0.00',
  `yunjiage` decimal(4,2) unsigned default '1.00',
  `zongrenshu` int(10) unsigned default '0',
  `canyurenshu` int(10) unsigned default '0',
  `shenyurenshu` int(10) unsigned default NULL,
  `def_renshu` int(10) unsigned default '0',
  `qishu` smallint(6) unsigned default '0',
  `maxqishu` smallint(5) unsigned default '1',
  `thumb` varchar(255) default NULL,
  `picarr` text,
  `content` mediumtext,
  `codes_table` char(20) default NULL,
  `xsjx_time` int(10) unsigned default NULL,
  `pos` tinyint(4) unsigned default NULL,
  `renqi` tinyint(4) unsigned default '0',
  `time` int(10) unsigned default NULL,
  `order` int(10) unsigned default '1',
  `q_uid` int(10) unsigned default NULL,
  `q_user` text COMMENT '中奖人信息',
  `q_user_code` char(20) default NULL,
  `q_content` mediumtext,
  `q_counttime` char(20) default NULL,
  `q_end_time` char(20) default NULL,
  `q_showtime` char(1) default 'N' COMMENT 'Y/N揭晓动画',
  `renqipos` tinyint(4) default NULL,
  `newpos` tinyint(4) default NULL,
  `bannershop` tinyint(4) default NULL,
  `posthumb` varchar(255) default NULL,
  `zhiding` int(11) default NULL,
  `parentid` int(1) default NULL,
  `auto_money` decimal(10,0) default NULL,
  PRIMARY KEY  (`id`),
  KEY `renqi` (`renqi`),
  KEY `order` (`yunjiage`),
  KEY `q_uid` (`q_uid`),
  KEY `sid` (`sid`),
  KEY `shenyurenshu` (`shenyurenshu`),
  KEY `q_showtime` (`q_showtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_shoplist_del
-- ----------------------------

-- ----------------------------
-- Table structure for `go_slide`
-- ----------------------------
DROP TABLE IF EXISTS `go_slide`;
CREATE TABLE `go_slide` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `img` varchar(50) default NULL COMMENT '幻灯片',
  `title` varchar(30) default NULL,
  `link` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
  KEY `img` (`img`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='幻灯片表';

-- ----------------------------
-- Records of go_slide
-- ----------------------------

-- ----------------------------
-- Table structure for `go_template`
-- ----------------------------
DROP TABLE IF EXISTS `go_template`;
CREATE TABLE `go_template` (
  `id` int(11) NOT NULL auto_increment,
  `template_name` char(255) NOT NULL,
  `template` char(25) NOT NULL,
  `des` varchar(100) default NULL,
  PRIMARY KEY  (`id`),
  KEY `template` (`template`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_template
-- ----------------------------
INSERT INTO `go_template` VALUES ('1', 'cart.cartlist.html', 'yungou', '购物车列表');
INSERT INTO `go_template` VALUES ('2', 'cart.pay.html', 'yungou', '购物车付款');
INSERT INTO `go_template` VALUES ('3', 'cart.paysuccess.html', 'yungou', '购物车支付成功页面');
INSERT INTO `go_template` VALUES ('4', 'group.index.html', 'yungou', '圈子首页');
INSERT INTO `go_template` VALUES ('5', 'group.list.html', 'yungou', '圈子列表页');
INSERT INTO `go_template` VALUES ('6', 'group.nei.html', 'yungou', '圈子内容');
INSERT INTO `go_template` VALUES ('7', 'group.right.html', 'yungou', '圈子右边');
INSERT INTO `go_template` VALUES ('8', 'help.help.html', 'yungou', '帮助页面');
INSERT INTO `go_template` VALUES ('9', 'index.autolottery.html', 'yungou', '限时揭晓');
INSERT INTO `go_template` VALUES ('10', 'index.buyrecord.html', 'yungou', '云购记录');
INSERT INTO `go_template` VALUES ('11', 'index.buyrecordbai.html', 'yungou', '最新云购记录');
INSERT INTO `go_template` VALUES ('12', 'index.dataserver.html', 'yungou', '已揭晓商品');
INSERT INTO `go_template` VALUES ('13', 'index.detail.html', 'yungou', '晒单详情');
INSERT INTO `go_template` VALUES ('14', 'index.footer.html', 'yungou', '底部');
INSERT INTO `go_template` VALUES ('15', 'index.glist.html', 'yungou', '所有商品');
INSERT INTO `go_template` VALUES ('16', 'index.header.html', 'yungou', '头部');
INSERT INTO `go_template` VALUES ('17', 'index.index.html', 'yungou', '首页');
INSERT INTO `go_template` VALUES ('18', 'index.item.html', 'yungou', '商品展示页');
INSERT INTO `go_template` VALUES ('19', 'index.lottery.html', 'yungou', '最新揭晓');
INSERT INTO `go_template` VALUES ('20', 'index.shaidan.html', 'yungou', '晒单页面');
INSERT INTO `go_template` VALUES ('21', 'link.link.html', 'yungou', '友情链接');
INSERT INTO `go_template` VALUES ('22', 'member.address.html', 'yungou', '会员地址添加');
INSERT INTO `go_template` VALUES ('23', 'member.cashout.html', 'yungou', '提现申请');
INSERT INTO `go_template` VALUES ('24', 'member.commissions.html', 'yungou', '佣金明细');
INSERT INTO `go_template` VALUES ('25', 'member.index.html', 'yungou', '会员首页');
INSERT INTO `go_template` VALUES ('26', 'member.invitefriends.html', 'yungou', '邀请好友');
INSERT INTO `go_template` VALUES ('27', 'member.joingroup.html', 'yungou', '加入的圈子');
INSERT INTO `go_template` VALUES ('28', 'member.left.html', 'yungou', '会员中心左边页面');
INSERT INTO `go_template` VALUES ('29', 'member.mailchecking.html', 'yungou', '邮箱认证');
INSERT INTO `go_template` VALUES ('30', 'member.mobilechecking.htm', 'yungou', '手机认证');
INSERT INTO `go_template` VALUES ('31', 'member.mobilesuccess.html', 'yungou', '手机认证成功');
INSERT INTO `go_template` VALUES ('32', 'member.modify.html', 'yungou', '会员');
INSERT INTO `go_template` VALUES ('33', 'member.orderlist.html', 'yungou', '会员资料');
INSERT INTO `go_template` VALUES ('34', 'member.password.html', 'yungou', '会员修改密码');
INSERT INTO `go_template` VALUES ('35', 'member.photo.html', 'yungou', '会员修改头像');
INSERT INTO `go_template` VALUES ('36', 'member.qqclock.html', 'yungou', '会员QQ绑定');
INSERT INTO `go_template` VALUES ('37', 'member.record.html', 'yungou', '提现记录');
INSERT INTO `go_template` VALUES ('38', 'member.sendsuccess.html', 'yungou', '邮箱验证发送');
INSERT INTO `go_template` VALUES ('39', 'member.sendsuccess2.html', 'yungou', '邮箱验证发送2');
INSERT INTO `go_template` VALUES ('40', 'member.shezhi.html', 'yungou', '资料选项卡');
INSERT INTO `go_template` VALUES ('41', 'member.singleinsert.html', 'yungou', '会员添加晒单');
INSERT INTO `go_template` VALUES ('42', 'member.singlelist.html', 'yungou', '会员晒单');
INSERT INTO `go_template` VALUES ('43', 'member.singleupdate.html', 'yungou', '晒单修改');
INSERT INTO `go_template` VALUES ('44', 'member.topic.html', 'yungou', '圈子话题');
INSERT INTO `go_template` VALUES ('45', 'member.userbalance.html', 'yungou', '账户明细');
INSERT INTO `go_template` VALUES ('46', 'member.userbuydetail.html', 'yungou', '云购记录');
INSERT INTO `go_template` VALUES ('47', 'member.userbuylist.html', 'yungou', '云购记录');
INSERT INTO `go_template` VALUES ('48', 'member.userfufen.html', 'yungou', '会员福分');
INSERT INTO `go_template` VALUES ('49', 'member.userrecharge.html', 'yungou', '账户充值');
INSERT INTO `go_template` VALUES ('50', 'search.search.html', 'yungou', '搜索');
INSERT INTO `go_template` VALUES ('51', 'single_web.business.html', 'yungou', '单页_合作专区');
INSERT INTO `go_template` VALUES ('52', 'single_web.fund.html', 'yungou', '单页_云购基金');
INSERT INTO `go_template` VALUES ('53', 'single_web.newbie.html', 'yungou', '单页_新手指南');
INSERT INTO `go_template` VALUES ('54', 'single_web.pleasereg.html', 'yungou', '单页_邀请');
INSERT INTO `go_template` VALUES ('55', 'single_web.qqgroup.html', 'yungou', '单页_QQ');
INSERT INTO `go_template` VALUES ('56', 'system.message.html', 'yungou', '系统消息提示');
INSERT INTO `go_template` VALUES ('57', 'us.index.html', 'yungou', '个人主页');
INSERT INTO `go_template` VALUES ('58', 'us.left.html', 'yungou', '个人主页左边');
INSERT INTO `go_template` VALUES ('59', 'us.tab.html', 'yungou', '个人主页选项');
INSERT INTO `go_template` VALUES ('60', 'us.userbuy.html', 'yungou', '个人主页云购记录');
INSERT INTO `go_template` VALUES ('61', 'us.userpost.html', 'yungou', '个人主页云购记录');
INSERT INTO `go_template` VALUES ('62', 'us.userraffle.html', 'yungou', '个人主页云购记录');
INSERT INTO `go_template` VALUES ('63', 'user.emailcheck.html', 'yungou', '邮箱验证');
INSERT INTO `go_template` VALUES ('64', 'user.emailok.html', 'yungou', '邮箱验证成功');
INSERT INTO `go_template` VALUES ('65', 'user.findemailcheck.html', 'yungou', '找回密码');
INSERT INTO `go_template` VALUES ('66', 'user.finderror.html', 'yungou', '邮箱验证已过期');
INSERT INTO `go_template` VALUES ('67', 'user.findmobilecheck.html', 'yungou', '手机验证');
INSERT INTO `go_template` VALUES ('68', 'user.findok.html', 'yungou', '手机验证成功');
INSERT INTO `go_template` VALUES ('69', 'user.findpassword.html', 'yungou', '重置密码');
INSERT INTO `go_template` VALUES ('70', 'user.login.html', 'yungou', '会员登录');
INSERT INTO `go_template` VALUES ('71', 'user.mobilecheck.html', 'yungou', '手机验证');
INSERT INTO `go_template` VALUES ('72', 'user.register.html', 'yungou', '会员注册');
INSERT INTO `go_template` VALUES ('73', 'vote.show.html', 'yungou', '投票内容页');
INSERT INTO `go_template` VALUES ('74', 'vote.show_total.html', 'yungou', '投票列表');
INSERT INTO `go_template` VALUES ('75', 'vote.vote.html', 'yungou', '投票主页');
INSERT INTO `go_template` VALUES ('76', 'article_list.list.html', 'yungou', '');
INSERT INTO `go_template` VALUES ('77', 'article_show.help.html', 'yungou', '');
INSERT INTO `go_template` VALUES ('78', 'article_show.show.html', 'yungou', '');
INSERT INTO `go_template` VALUES ('79', 'goods_list.list.html', 'yungou', '');
INSERT INTO `go_template` VALUES ('80', 'goods_show.show.html', 'yungou', '');
INSERT INTO `go_template` VALUES ('81', 'index.go_record_ifram.htm', 'yungou', '商品详情购买记录');
INSERT INTO `go_template` VALUES ('82', 'index.item_animation.html', 'yungou', '商品详情开奖');
INSERT INTO `go_template` VALUES ('83', 'index.item_contents.html', 'yungou', '商品详情价格');
INSERT INTO `go_template` VALUES ('84', 'index.itemifram.html', 'yungou', '商品中奖');
INSERT INTO `go_template` VALUES ('85', 'index.qq.html', 'yungou', '');
INSERT INTO `go_template` VALUES ('86', 'index.qualification.html', 'yungou', '');
INSERT INTO `go_template` VALUES ('87', 'member.mobilechecking.html', 'yungou', '');
INSERT INTO `go_template` VALUES ('88', 'member.qiandao.html', 'yungou', '会员签到');
INSERT INTO `go_template` VALUES ('89', 'member.userrecharge.html', 'yungou', '会员充值');
INSERT INTO `go_template` VALUES ('90', 'index.lucky.html', 'yungou', '幸运抽奖');
INSERT INTO `go_template` VALUES ('91', 'member.reg_shop.html', 'yungou', '商家入驻');
INSERT INTO `go_template` VALUES ('92', 'member.czk.html', 'yungou', '卡密充值');
INSERT INTO `go_template` VALUES ('93', 'member.czklist.html', 'yungou', '卡密充值列表');
INSERT INTO `go_template` VALUES ('94', 'user.numberbind.html', 'yungou', '提现账号绑定');
INSERT INTO `go_template` VALUES ('95', 'single_web.desktop.html', 'yungou', '');
INSERT INTO `go_template` VALUES ('96', 'single_web.iPhone.html', 'yungou', '');
INSERT INTO `go_template` VALUES ('97', 'single_web.intro.html', 'yungou', '');
INSERT INTO `go_template` VALUES ('98', 'single_web.pleasereg', 'yungou', '');
INSERT INTO `go_template` VALUES ('99', 'single_web.touch.html', 'yungou', '');
INSERT INTO `go_template` VALUES ('100', 'single_web.weixin.html', 'yungou', '');
INSERT INTO `go_template` VALUES ('101', 'mobile\\index.index.html', 'yungou', '手机版首页');
INSERT INTO `go_template` VALUES ('102', 'mobile\\index.orderlist.html', '', '手机版首页产品列表');
INSERT INTO `go_template` VALUES ('103', 'mobile\\index.footer.html', '', '手机版底部');
INSERT INTO `go_template` VALUES ('104', 'mobile\\index.header.html', '', '手机版头部');
INSERT INTO `go_template` VALUES ('105', 'mobile\\user.login.html', '', '手机版登录');
INSERT INTO `go_template` VALUES ('106', 'mobile\\user.register.html', '', '手机版注册');
INSERT INTO `go_template` VALUES ('107', 'mobile\\user.reg_shop.html', '', '手机版商家入驻');
INSERT INTO `go_template` VALUES ('108', 'mobile\\user.index.html', '', '手机版会员中心');
INSERT INTO `go_template` VALUES ('109', 'mobile\\user.qiandao.html', '', '手机版签到');
INSERT INTO `go_template` VALUES ('110', 'mobile\\user.profile.html', '', '手机版编辑资料');
INSERT INTO `go_template` VALUES ('111', 'mobile\\user.singlelist.html', '', '手机版我的晒单');
INSERT INTO `go_template` VALUES ('112', 'mobile\\index.shaidan.html', '', '手机版晒单');
INSERT INTO `go_template` VALUES ('113', 'mobile\\user.address.html', '', '手机版收货地址');
INSERT INTO `go_template` VALUES ('114', 'mobile\\index.group.html', '', '手机版发现');
INSERT INTO `go_template` VALUES ('115', 'mobile\\index.luckyshow.html', '', '手机版免费抽奖');
INSERT INTO `go_template` VALUES ('116', 'mobile\\index.about.html', '', '手机版新手指南');
INSERT INTO `go_template` VALUES ('117', 'mobile\\index.action.html', '', '手机版活动专区');
INSERT INTO `go_template` VALUES ('118', 'mobile\\invite.friends.html', '', '手机版邀请管理');
INSERT INTO `go_template` VALUES ('119', 'mobile\\user.czklist.html', '', '手机版卡密充值');
INSERT INTO `go_template` VALUES ('120', 'mobile\\user.recharge.html', '', '手机版充值');
INSERT INTO `go_template` VALUES ('121', 'mobile\\user.fufen.html', '', '手机版积分');
INSERT INTO `go_template` VALUES ('122', 'mobile\\user.mobilechecking.html', '', '手机版手机号认证');
INSERT INTO `go_template` VALUES ('123', 'mobile\\invite.recordlist.html', '', '手机版充值提现');
INSERT INTO `go_template` VALUES ('124', 'mobile\\user.orderlist.html', '', '手机版获得商品');
INSERT INTO `go_template` VALUES ('125', 'mobile\\user.userbuylist.html', '', '手机版购买记录');
INSERT INTO `go_template` VALUES ('126', 'mobile\\cart.cartlist.html', '', '手机版购物车列表');
INSERT INTO `go_template` VALUES ('127', 'mobile\\cart.payment.html', '', '手机版购物车付款');
INSERT INTO `go_template` VALUES ('128', 'mobile\\cart.paysuccess.html', '', '手机版购物车支付成功');
INSERT INTO `go_template` VALUES ('129', 'mobile\\index.item.html', '', '手机版商品详情');
INSERT INTO `go_template` VALUES ('130', 'mobile\\index.lottery.html', '', '手机版最新揭晓');
INSERT INTO `go_template` VALUES ('131', 'mobile\\index.lottery_index.html', '', '手机版充值抽奖');
INSERT INTO `go_template` VALUES ('132', 'mobile\\index.glist.html', '', '手机版商品列表');

-- ----------------------------
-- Table structure for `go_vote_activer`
-- ----------------------------
DROP TABLE IF EXISTS `go_vote_activer`;
CREATE TABLE `go_vote_activer` (
  `id` int(11) NOT NULL auto_increment,
  `option_id` int(11) NOT NULL,
  `vote_id` int(11) default NULL,
  `userid` int(11) default NULL,
  `ip` char(20) default NULL,
  `subtime` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_vote_activer
-- ----------------------------

-- ----------------------------
-- Table structure for `go_vote_option`
-- ----------------------------
DROP TABLE IF EXISTS `go_vote_option`;
CREATE TABLE `go_vote_option` (
  `option_id` int(11) NOT NULL auto_increment,
  `vote_id` int(11) default NULL,
  `option_title` varchar(100) default NULL,
  `option_number` int(11) unsigned default '0',
  PRIMARY KEY  (`option_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_vote_option
-- ----------------------------

-- ----------------------------
-- Table structure for `go_vote_subject`
-- ----------------------------
DROP TABLE IF EXISTS `go_vote_subject`;
CREATE TABLE `go_vote_subject` (
  `vote_id` int(11) NOT NULL auto_increment,
  `vote_title` varchar(100) default NULL,
  `vote_starttime` int(11) default NULL,
  `vote_endtime` int(11) default NULL,
  `vote_sendtime` int(11) default NULL,
  `vote_description` text,
  `vote_allowview` tinyint(1) default NULL,
  `vote_allowguest` tinyint(1) default NULL,
  `vote_interval` int(11) default '0',
  `vote_enabled` tinyint(1) default NULL,
  `vote_number` int(11) default NULL,
  PRIMARY KEY  (`vote_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of go_vote_subject
-- ----------------------------

-- ----------------------------
-- Table structure for `go_wap`
-- ----------------------------
DROP TABLE IF EXISTS `go_wap`;
CREATE TABLE `go_wap` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `img` varchar(50) character set utf8 default NULL,
  `title` varchar(30) character set utf8 default NULL,
  `link` varchar(255) character set utf8 default NULL,
  `color` varchar(30) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of go_wap
-- ----------------------------

-- ----------------------------
-- Table structure for `jifen`
-- ----------------------------
DROP TABLE IF EXISTS `jifen`;
CREATE TABLE `jifen` (
  `id` int(11) NOT NULL auto_increment,
  `lm` int(11) default NULL,
  `email` varchar(20) collate utf8_unicode_ci default NULL,
  `title` varchar(200) collate utf8_unicode_ci default NULL,
  `jf` int(11) default NULL,
  `type` varchar(10) collate utf8_unicode_ci default NULL COMMENT '0 注册1 签到2 邀请好友3 完善注册信息4 认证电子邮箱5 认证手机号码6 积分兑换7 幸运抽奖8 好评抽奖',
  `types` varchar(100) collate utf8_unicode_ci default NULL,
  `pass` varchar(4) collate utf8_unicode_ci default NULL,
  `wtime` int(11) default NULL,
  `ttime` int(11) default NULL,
  `ftime` int(11) default NULL,
  `stime` int(11) default NULL,
  `ip` varchar(20) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=270 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of jifen
-- ----------------------------

-- ----------------------------
-- Table structure for `ke_order`
-- ----------------------------
DROP TABLE IF EXISTS `ke_order`;
CREATE TABLE `ke_order` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `out_trade_no` char(30) NOT NULL,
  `statu` tinyint(1) NOT NULL,
  `mktime` char(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ke_order
-- ----------------------------

-- ----------------------------
-- Table structure for `lottery`
-- ----------------------------
DROP TABLE IF EXISTS `lottery`;
CREATE TABLE `lottery` (
  `id` int(11) NOT NULL auto_increment,
  `lm` int(11) unsigned NOT NULL,
  `title` varchar(100) collate utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `jf` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `img_sl` varchar(255) collate utf8_unicode_ci NOT NULL,
  `z_body` text collate utf8_unicode_ci NOT NULL,
  `time` varchar(50) collate utf8_unicode_ci NOT NULL,
  `wtime` varchar(50) collate utf8_unicode_ci NOT NULL,
  `read_num` int(11) NOT NULL,
  `px` int(11) NOT NULL,
  `ip` varchar(20) collate utf8_unicode_ci NOT NULL,
  `pass` varchar(4) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lottery
-- ----------------------------

-- ----------------------------
-- Table structure for `lottery_jl`
-- ----------------------------
DROP TABLE IF EXISTS `lottery_jl`;
CREATE TABLE `lottery_jl` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `lm` int(11) default NULL,
  `user` varchar(50) collate utf8_unicode_ci NOT NULL,
  `wtime` int(11) unsigned NOT NULL,
  `nums` int(11) unsigned NOT NULL,
  `number` int(11) default NULL,
  `pass` varchar(4) collate utf8_unicode_ci NOT NULL,
  `ip` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lottery_jl
-- ----------------------------

-- ----------------------------
-- Table structure for `lottery_lm`
-- ----------------------------
DROP TABLE IF EXISTS `lottery_lm`;
CREATE TABLE `lottery_lm` (
  `id_lm` int(11) unsigned NOT NULL auto_increment,
  `fid` int(11) unsigned NOT NULL,
  `title_lm` varchar(150) collate utf8_unicode_ci NOT NULL,
  `add_xx` varchar(4) collate utf8_unicode_ci NOT NULL,
  `xia` varchar(4) collate utf8_unicode_ci NOT NULL,
  `px` int(11) NOT NULL,
  `ip` varchar(20) collate utf8_unicode_ci NOT NULL,
  `wtime` int(11) NOT NULL,
  PRIMARY KEY  (`id_lm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lottery_lm
-- ----------------------------

-- ----------------------------
-- Table structure for `lp`
-- ----------------------------
DROP TABLE IF EXISTS `lp`;
CREATE TABLE `lp` (
  `id` int(11) NOT NULL auto_increment,
  `title0` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl0` varchar(100) collate utf8_unicode_ci default NULL,
  `title1` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl1` varchar(100) collate utf8_unicode_ci default NULL,
  `title2` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl2` varchar(100) collate utf8_unicode_ci default NULL,
  `title3` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl3` varchar(100) collate utf8_unicode_ci default NULL,
  `title4` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl4` varchar(100) collate utf8_unicode_ci default NULL,
  `title5` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl5` varchar(100) collate utf8_unicode_ci default NULL,
  `title6` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl6` varchar(100) collate utf8_unicode_ci default NULL,
  `title7` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl7` varchar(100) collate utf8_unicode_ci default NULL,
  `title8` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl8` varchar(100) collate utf8_unicode_ci default NULL,
  `title9` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl9` varchar(100) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lp
-- ----------------------------
INSERT INTO `lp` VALUES ('1', '遮瑕膏', 'images/lipin//2015102900203749.png', '折叠便携修眉刀', 'images/lipin//2015110100503172.png', '小金管保湿润唇膏', 'images/lipin//2015110100515041.png', '遮瑕隔离2件套装', 'images/lipin//2015110100521874.png', '10购物券满60元用', 'images/lipin//2015102900201066.jpg', '20购物券满120元用', 'images/lipin//2015102900195530.jpg', '30购物券满180元用', 'images/lipin//2015102900194188.jpg', '5元现金卡', 'images/lipin//2015102900000435.jpg', '10元现金卡', 'images/lipin//2015102823592642.jpg', '', '');

-- ----------------------------
-- Table structure for `lp_address`
-- ----------------------------
DROP TABLE IF EXISTS `lp_address`;
CREATE TABLE `lp_address` (
  `id` int(11) NOT NULL auto_increment,
  `lm` int(11) default NULL,
  `name` varchar(10) collate utf8_unicode_ci default NULL,
  `mob` varchar(20) collate utf8_unicode_ci default NULL,
  `address` varchar(300) collate utf8_unicode_ci default NULL,
  `dh` varchar(100) collate utf8_unicode_ci default NULL,
  `gc` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lp_address
-- ----------------------------

-- ----------------------------
-- Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id_lm` int(11) unsigned NOT NULL auto_increment,
  `fid` int(11) unsigned NOT NULL default '0',
  `title_lm` varchar(150) collate utf8_unicode_ci NOT NULL default '',
  `add_xx` varchar(4) collate utf8_unicode_ci NOT NULL default '',
  `xia` varchar(4) collate utf8_unicode_ci NOT NULL default '',
  `px` int(11) unsigned NOT NULL default '0',
  `ip` varchar(20) collate utf8_unicode_ci NOT NULL default '',
  `wtime` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id_lm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='会员表';

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', '0', '聚优会员', 'yes', 'yes', '100', '127.0.0.1', '1348197589');
INSERT INTO `member` VALUES ('2', '0', '商家会员', 'yes', '', '100', '113.87.104.66', '1430990425');

-- ----------------------------
-- Table structure for `member_co`
-- ----------------------------
DROP TABLE IF EXISTS `member_co`;
CREATE TABLE `member_co` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `lm` int(11) unsigned NOT NULL default '0',
  `email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `user` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `password` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `repass` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `mobile` varchar(11) collate utf8_unicode_ci NOT NULL,
  `img_sl` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `px` int(11) unsigned NOT NULL default '0',
  `pass` varchar(4) collate utf8_unicode_ci NOT NULL default '',
  `haoping` varchar(4) collate utf8_unicode_ci NOT NULL COMMENT '好评返现的',
  `ip` varchar(20) collate utf8_unicode_ci NOT NULL default '',
  `wtime` int(11) unsigned NOT NULL default '0',
  `type` varchar(4) collate utf8_unicode_ci NOT NULL default '0',
  `e_pass` varchar(4) collate utf8_unicode_ci default NULL,
  `m_pass` varchar(4) collate utf8_unicode_ci default NULL,
  `user_admin` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT '管理员',
  `user_member` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT '旺旺号',
  `tburl` varchar(200) collate utf8_unicode_ci NOT NULL COMMENT 'tburl',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='会员信息表';

-- ----------------------------
-- Records of member_co
-- ----------------------------

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL auto_increment,
  `lm` varchar(100) collate utf8_unicode_ci default NULL,
  `email` varchar(30) collate utf8_unicode_ci default NULL,
  `order_num` varchar(30) collate utf8_unicode_ci default NULL,
  `title` varchar(250) collate utf8_unicode_ci default NULL,
  `img_sl` varchar(250) collate utf8_unicode_ci default NULL,
  `style` varchar(250) collate utf8_unicode_ci default NULL,
  `price` varchar(100) collate utf8_unicode_ci default NULL,
  `num` varchar(100) collate utf8_unicode_ci default NULL,
  `c_price` varchar(20) collate utf8_unicode_ci default NULL,
  `act_yh` varchar(20) collate utf8_unicode_ci default NULL,
  `k_yh` varchar(20) collate utf8_unicode_ci default NULL,
  `m_yh` varchar(20) collate utf8_unicode_ci default NULL,
  `paytype` varchar(4) collate utf8_unicode_ci default NULL,
  `pass` varchar(4) collate utf8_unicode_ci default NULL,
  `wtime` int(11) default NULL,
  `ftime` int(11) default NULL,
  `stime` int(11) default NULL,
  `ip` varchar(20) collate utf8_unicode_ci default NULL,
  `nops` varchar(30) collate utf8_unicode_ci default NULL COMMENT '取消订单原因',
  `ps` text collate utf8_unicode_ci COMMENT '商家备注',
  `gc` varchar(10) collate utf8_unicode_ci default NULL,
  `dh` varchar(20) collate utf8_unicode_ci default NULL,
  `type_o` varchar(4) collate utf8_unicode_ci default NULL COMMENT '1为手机单 2为电脑单',
  `name` varchar(20) collate utf8_unicode_ci default NULL,
  `mob` varchar(12) collate utf8_unicode_ci default NULL,
  `jf` varchar(20) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '96,', '756', '20160714001630772', '女短款白色打底衫女外穿工字纯棉修身夏季吊带U背心,', 'shopimg/20160713/27716775423729.jpg,', '黑色L号,', '9,', '1,', '9', '0.00', '0.00', '0.00', '12', '0', '1468426592', '0', '0', '119.129.120.206', '', '', '', '', '1', '圭贤', '13420874524', '18');
INSERT INTO `orders` VALUES ('2', '96,', '756', '20160714005516498', '女短款白色打底衫女外穿工字纯棉修身夏季吊带U背心,', 'shopimg/20160713/27716775423729.jpg,', '黑色L号,', '9,', '1,', '9', '0.00', '0.00', '0.00', '12', '0', '1468428922', '0', '0', '119.129.120.206', '', '', '', '', '1', '木子', '13420874524', '18');
INSERT INTO `orders` VALUES ('3', '96,', '756', '20160724140245173', '女短款白色打底衫女外穿工字纯棉修身夏季吊带U背心,', 'shopimg/20160713/27716775423729.jpg,', '黑色L号,', '9,', '1,', '9', '0.00', '0.00', '0.00', '12', '0', '1469340170', '0', '0', '119.131.106.14', '', '', '', '', '1', '木子', '13420874524', '18');
INSERT INTO `orders` VALUES ('4', '99,', '794', '20160728041926113', '时尚夏季新款女装蝴蝶亮片短袖T恤 半身镂空蓬蓬裙套装,', 'shopimg/20160714/29141726427141.jpg,', '黑色L号,', '40,', '2,', '80', '0.00', '0.00', '0.00', '12', '0', '1469650778', '0', '0', '223.74.250.17', '', '', '', '', '1', '、123', '13456789725', '80');
INSERT INTO `orders` VALUES ('5', '99,', '487', '20160728165741293', '时尚夏季新款女装蝴蝶亮片短袖T恤 半身镂空蓬蓬裙套装,', 'shopimg/20160714/29141726427141.jpg,', '黑色L号,', '40,', '1,', '40', '0.00', '0.00', '0.00', '12', '0', '1469696275', '0', '0', '113.67.226.235', '', '', '', '', '1', 'WWW', '13420842542', '80');

-- ----------------------------
-- Table structure for `order_address`
-- ----------------------------
DROP TABLE IF EXISTS `order_address`;
CREATE TABLE `order_address` (
  `id` int(11) NOT NULL auto_increment,
  `order_num` varchar(30) collate utf8_unicode_ci default NULL,
  `name` varchar(20) collate utf8_unicode_ci default NULL,
  `addr` varchar(255) collate utf8_unicode_ci default NULL,
  `mobile` varchar(20) collate utf8_unicode_ci default NULL,
  `ps` text collate utf8_unicode_ci,
  `gc` varchar(20) collate utf8_unicode_ci default NULL,
  `dh` varchar(30) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of order_address
-- ----------------------------

-- ----------------------------
-- Table structure for `pay_key`
-- ----------------------------
DROP TABLE IF EXISTS `pay_key`;
CREATE TABLE `pay_key` (
  `id` int(11) NOT NULL auto_increment,
  `lm` varchar(50) collate utf8_unicode_ci default NULL,
  `pid` varchar(150) collate utf8_unicode_ci default NULL,
  `key` varchar(150) collate utf8_unicode_ci NOT NULL,
  `user` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of pay_key
-- ----------------------------
INSERT INTO `pay_key` VALUES ('1', '微信支付接口', '9029149906088', 'otdiz1jkmir3hn3fgcwmga9n7ei90', '13420842451');
INSERT INTO `pay_key` VALUES ('2', '支付宝支付接口', '2088802914990657', '6ykcwmga9n7ei90otdiz1jkmir3hn3fg', '921043084@qq.com');

-- ----------------------------
-- Table structure for `prm`
-- ----------------------------
DROP TABLE IF EXISTS `prm`;
CREATE TABLE `prm` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) collate utf8_unicode_ci default NULL,
  `name` varchar(100) collate utf8_unicode_ci default NULL COMMENT '产品名称',
  `zhidi` varchar(100) collate utf8_unicode_ci default NULL COMMENT '质地',
  `skin` varchar(50) collate utf8_unicode_ci default NULL COMMENT '适合肤质',
  `chandi` varchar(50) collate utf8_unicode_ci default '' COMMENT '产地',
  `brand` varchar(50) collate utf8_unicode_ci default '' COMMENT '品牌',
  `gongxiao` varchar(150) collate utf8_unicode_ci default NULL COMMENT '功效',
  `size` varchar(50) collate utf8_unicode_ci default NULL COMMENT '产品规格',
  `type` varchar(50) collate utf8_unicode_ci default NULL COMMENT '类型',
  `netwt` varchar(50) collate utf8_unicode_ci default NULL COMMENT '净含量',
  `baozhiqi` varchar(20) collate utf8_unicode_ci default NULL COMMENT '保质期',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of prm
-- ----------------------------
INSERT INTO `prm` VALUES ('1', '我来了fs.', '我来了fs', '', '', '中国', '天姿雅', '很好', '3年', '', '11', '');
INSERT INTO `prm` VALUES ('2', '美娇时 演员专用遮瑕膏', '演员专用遮瑕膏', '', '', '', '美娇时 ', '', '', '', '11', '');
INSERT INTO `prm` VALUES ('3', '大规模塔城是非得失无可2', '演员专用遮瑕膏', '', '', '', '天姿雅', '', '', '', '', '');
INSERT INTO `prm` VALUES ('4', '规定陪我就吧', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `prm` VALUES ('5', '大哥大城', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `prm` VALUES ('6', '演员专用遮瑕膏演员', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `prm` VALUES ('7', '我真来了', '首页', '', '', '', '美丽', '', '', '', '', '3年');
INSERT INTO `prm` VALUES ('8', '蜗牛色彩调控霜蜗牛cc霜', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `prm` VALUES ('9', '娇俏V脸5件套装组合', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `prm` VALUES ('10', 'rewfsadfds', 'fds', '', '', '', '', '', '', '', '', '');
INSERT INTO `prm` VALUES ('11', 'fs无可奈何在', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `prm` VALUES ('12', '大规模在', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `prm` VALUES ('13', '老王？是你么！', '', '', '', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `pro_co`
-- ----------------------------
DROP TABLE IF EXISTS `pro_co`;
CREATE TABLE `pro_co` (
  `id` int(11) NOT NULL auto_increment,
  `lm` int(11) default NULL,
  `url` varchar(500) collate utf8_unicode_ci default NULL,
  `title` varchar(150) collate utf8_unicode_ci default NULL,
  `pro_can1` varchar(50) collate utf8_unicode_ci default NULL,
  `pro_can2` varchar(55) collate utf8_unicode_ci default NULL,
  `pro_can3` varchar(55) collate utf8_unicode_ci default NULL,
  `pro_can4` varchar(55) collate utf8_unicode_ci default NULL,
  `f_body` text collate utf8_unicode_ci,
  `z_body` text collate utf8_unicode_ci,
  `img_sl0` varchar(50) collate utf8_unicode_ci default NULL,
  `img_sl1` varchar(55) collate utf8_unicode_ci default NULL,
  `img_sl2` varchar(55) collate utf8_unicode_ci default NULL,
  `img_sl3` varchar(55) collate utf8_unicode_ci default NULL,
  `img_sl4` varchar(55) collate utf8_unicode_ci default NULL,
  `img_sl5` varchar(55) collate utf8_unicode_ci default NULL,
  `px` int(11) default NULL,
  `tuijian` varchar(4) collate utf8_unicode_ci default NULL,
  `hot` varchar(4) collate utf8_unicode_ci default NULL,
  `pass` varchar(4) collate utf8_unicode_ci default NULL,
  `read_num` int(11) default NULL,
  `ip` varchar(20) collate utf8_unicode_ci default NULL,
  `wtime` int(11) default NULL,
  `times` varchar(20) collate utf8_unicode_ci default NULL,
  `ttime` varchar(20) collate utf8_unicode_ci default NULL,
  `type` varchar(20) collate utf8_unicode_ci default NULL,
  `user_admin` varchar(20) collate utf8_unicode_ci default NULL,
  `user_member` varchar(50) collate utf8_unicode_ci default NULL,
  `styles` int(11) default NULL,
  `cart_num` varchar(250) collate utf8_unicode_ci default NULL,
  `cart_title` varchar(250) collate utf8_unicode_ci default NULL,
  `cart_img` varchar(250) collate utf8_unicode_ci default NULL,
  `cart_code` varchar(250) collate utf8_unicode_ci default NULL,
  `order_num` varchar(250) collate utf8_unicode_ci default NULL,
  `fhd` varchar(250) collate utf8_unicode_ci default NULL,
  `ems` varchar(250) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of pro_co
-- ----------------------------
INSERT INTO `pro_co` VALUES ('96', '2', '', '女短款白色打底衫女外穿工字纯棉修身夏季吊带U背心', '22', '9', '111', '夏季必备新款，时尚新颖，百搭显瘦，点亮视觉。修身塑形显瘦遮小肚腩，360度完美修身，本活动为一天时间特价，衣衣', 'fds', '<p style=\"white-space: normal;\">&nbsp;&nbsp;</p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; text-align: center; background-color: rgb(255, 255, 255);\"><img src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB2iipkcVXXXXa6XpXXXXXXXXXX_!!2449256674.jpg\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5; width: 914px;\"/><img src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB27dXrcVXXXXXvXpXXXXXXXXXX_!!2449256674.jpg\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5; width: 914px;\"/></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; text-align: center; background-color: rgb(255, 255, 255);\">&nbsp;</p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; text-align: center; background-color: rgb(255, 255, 255);\"><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i3/2449256674/TB2gvFwcVXXXXcxXXXXXXXXXXXX_!!2449256674.jpg\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; width: 914px;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB2e30wcVXXXXbWXXXXXXXXXXXX_!!2449256674.jpg\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; width: 914px;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i3/2449256674/TB2T.XkcVXXXXaYXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; width: 914px;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB2UO8qcVXXXXXfXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; width: 914px;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB2iTNvcVXXXXb2XXXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; width: 914px;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB22ddBcVXXXXXcXXXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; width: 914px;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i3/2449256674/TB2Ht4vcVXXXXcvXXXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; width: 914px;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i2/2449256674/TB27atgcVXXXXcXXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; width: 914px;\"/></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; text-align: center; background-color: rgb(255, 255, 255);\"><img alt=\"\" src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB22XhjcVXXXXa.XpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 10px; padding: 0px; width: 914px;\"/></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; text-align: center; width: 914px; background-color: rgb(255, 255, 255);\"><img alt=\"\" src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB2PaJCcVXXXXXfXXXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 10px; padding: 0px; width: 914px;\"/></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; text-align: center; background-color: rgb(255, 255, 255);\"><img alt=\"\" src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB2SxlocVXXXXX.XpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 10px; padding: 0px; width: 914px;\"/></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; text-align: center; background-color: rgb(255, 255, 255);\"><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB2UgJfcVXXXXb1XpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB2mp0ocVXXXXXZXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB2XgNmcVXXXXalXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i3/2449256674/TB2oGdCcVXXXXXjXXXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB29TNocVXXXXXuXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i3/2449256674/TB2ZK0gcVXXXXbwXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i3/2449256674/TB21M0rcVXXXXXxXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i3/2449256674/TB2D0dscVXXXXXuXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i3/2449256674/TB2GthwcVXXXXbZXXXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB23r0scVXXXXXlXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i2/2449256674/TB2XQFrcVXXXXXoXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i2/2449256674/TB2xDNncVXXXXX8XpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB24BXAcVXXXXXVXXXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i2/2449256674/TB2Q_hpcVXXXXXVXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB2p7VAcVXXXXXVXXXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB24k8hcVXXXXbGXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB2JBxncVXXXXafXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i2/2449256674/TB2BLtscVXXXXXdXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB21OVhcVXXXXbvXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i3/2449256674/TB2hZ8gcVXXXXbUXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB2TfNscVXXXXXAXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB28CRncVXXXXaXXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB2aJlwcVXXXXccXXXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/><img align=\"absMiddle\" src=\"https://img.alicdn.com/imgextra/i3/2449256674/TB2DslkcVXXXXaRXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/></p><p style=\"white-space: normal;\">&nbsp; &nbsp;	&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p><br/></p>', 'shopimg/20160713/27716775423729.jpg', '', '', '', '', '', '100', 'yes', 'no', 'yes', '65', '127.0.0.1', '1457299367', '2016-03-08 10:00:00', '2016-03-09 10:00:00', '特卖', 'kimiwang', 'tb82611665', '0', '960 961 ', '黑色L号 白色L号', '', '', '0', '广东省 广州市', '韵达快递');
INSERT INTO `pro_co` VALUES ('97', '47', '', '夏季韩版高腰显瘦包臀牛仔半身裙女前排扣大码胖mm短裙浅色A字裙', '220', '40', '900', '', '', '<p style=\"white-space: normal;\">&nbsp;&nbsp;</p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\"><img src=\"https://img.alicdn.com/imgextra/i2/2449256674/TB2r3VYpFXXXXXgXFXXXXXXXXXX_!!2449256674.jpg\" style=\"border: 0px; vertical-align: middle; margin: 0px; padding: 0px;\"/><img src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB2R.ispFXXXXcKXXXXXXXXXXXX_!!2449256674.jpg\" style=\"border: 0px; vertical-align: middle; margin: 0px; padding: 0px;\"/></p><p style=\"white-space: normal;\"><strong><span style=\"font-family: lisu;\"><span style=\"font-size: 36px;\">小清新白色</span></span></strong></p><p style=\"white-space: normal;\"><img src=\"https://img.alicdn.com/imgextra/i2/2449256674/TB2pgyopFXXXXXgXpXXXXXXXXXX_!!2449256674.jpg\" style=\"border: 0px; vertical-align: middle; margin: 0px; padding: 0px;\"/><img src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB2wm8VpFXXXXXuXFXXXXXXXXXX_!!2449256674.jpg\" style=\"border: 0px; vertical-align: middle; margin: 0px; padding: 0px;\"/><img src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB2YmqspFXXXXclXXXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: middle; margin: 0px; padding: 0px;\"/><img src=\"https://img.alicdn.com/imgextra/i2/2449256674/TB28C8WpFXXXXbOXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: middle; margin: 0px; padding: 0px;\"/><img src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB2ZzXWpFXXXXXvXFXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: middle; margin: 0px; padding: 0px;\"/></p><p style=\"white-space: normal;\"><span style=\"font-family: lisu;\"><strong><span style=\"font-size: 36px;\">粉色</span></strong></span></p><p style=\"white-space: normal;\"><img src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB2SA1spFXXXXcGXXXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: middle; margin: 0px; padding: 0px;\"/><img src=\"https://img.alicdn.com/imgextra/i2/2449256674/TB2ueKDpFXXXXaHXXXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: middle; margin: 0px; padding: 0px;\"/><img src=\"https://img.alicdn.com/imgextra/i3/2449256674/TB2ftiypFXXXXbGXXXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: middle; margin: 0px; padding: 0px;\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p><br/></p>', 'shopimg/20160714/79064753426986.jpg', '', '', '', '', '', '1', 'yes', 'no', 'yes', '16', '', '1468427003', '', '', '特卖', '', '', '0', '970 971 972 973 ', '黑色L号 白色L号 黑色M号 白色M号', '', '', '', '广东省 广州市', '韵达快递');
INSERT INTO `pro_co` VALUES ('98', '47', '', '2016夏季新款女士韩版短袖修身蕾丝连衣裙 高腰公主裙 中长裙', '80', '50', '900', '', '', '<p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255);\"><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i3/2449256674/TB20h88pFXXXXbxXpXXXXXXXXXX_!!2449256674.jpg\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px; line-height: 1.5;\"/></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255);\"><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i2/2449256674/TB2t1d9pFXXXXbQXpXXXXXXXXXX_!!2449256674.jpg\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i2/2449256674/TB2mVB0pFXXXXbLXpXXXXXXXXXX_!!2449256674.jpg\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB2.YyJpFXXXXXnXXXXXXXXXXXX_!!2449256674.jpg\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i3/2449256674/TB23jylpFXXXXXWXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB20QdVpFXXXXacXFXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i3/2449256674/TB24jJSpFXXXXaFXFXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB2Yzp3pFXXXXbQXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i2/2449256674/TB2SUFUpFXXXXX9XFXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB2xPGJpFXXXXXgXXXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i3/2449256674/TB2b98.pFXXXXbfXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i2/2449256674/TB2wE1gpFXXXXX6XpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB25A5lpFXXXXXzXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB2flhTpFXXXXX9XFXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB2iuCapFXXXXa9XpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB2KUFQpFXXXXXEXFXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p><br/></p>', 'shopimg/20160714/71380009427083.jpg', '', '', '', '', '', '1', 'yes', 'no', 'yes', '19', '', '1468427099', '', '', '特卖', '', '', '0', '980 981 ', '黑色L号 白色L号', '', '', '', '广东省 广州市', '韵达快递');
INSERT INTO `pro_co` VALUES ('99', '47', '', '时尚夏季新款女装蝴蝶亮片短袖T恤+半身镂空蓬蓬裙套装', '220', '40', '900', '', '', '<p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255);\"><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB25qSapFXXXXa3XpXXXXXXXXXX_!!2449256674.jpg\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255);\"><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB2CySGpFXXXXXxXXXXXXXXXXXX_!!2449256674.jpg\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255);\"><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i3/2449256674/TB2mKarpFXXXXcPXXXXXXXXXXXX_!!2449256674.jpg\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255);\"><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i2/2449256674/TB2XOGHpFXXXXXyXXXXXXXXXXXX_!!2449256674.jpg\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255);\"><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i3/2449256674/TB2UY5wpFXXXXb1XXXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255);\"><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i2/2449256674/TB2WmlQpFXXXXblXFXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255);\"><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i2/2449256674/TB2j5t5pFXXXXb2XpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255);\"><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i3/2449256674/TB2RTlVpFXXXXXuXFXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255);\"><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB2EdKlpFXXXXXCXpXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/></p><p style=\"margin-top: 1.12em; margin-bottom: 1.12em; white-space: normal; padding: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255);\"><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i1/2449256674/TB2RsmCpFXXXXa2XXXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i4/2449256674/TB2JcWqpFXXXXc0XXXXXXXXXXXX_!!2449256674.jpg\" class=\"\" style=\"border: 0px; vertical-align: top; margin: 0px; padding: 0px;\"/></p><p style=\"white-space: normal;\"><br/></p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p style=\"white-space: normal;\">&nbsp;</p><p><br/></p>', 'shopimg/20160714/29141726427141.jpg', '', '', '', '', '', '1', 'yes', 'no', 'yes', '23', '', '1468427152', '', '', '特卖', '', '', '0', '990 991 992 ', '黑色L号 白色L号 白色M号', '', '', '', '广东省 广州市', '韵达快递');

-- ----------------------------
-- Table structure for `pro_lm`
-- ----------------------------
DROP TABLE IF EXISTS `pro_lm`;
CREATE TABLE `pro_lm` (
  `id_lm` int(11) unsigned NOT NULL auto_increment,
  `fid` int(11) unsigned NOT NULL default '0',
  `title_lm` varchar(150) collate utf8_unicode_ci NOT NULL default '',
  `add_xx` varchar(4) collate utf8_unicode_ci NOT NULL default '',
  `xia` varchar(4) collate utf8_unicode_ci NOT NULL default '',
  `px` int(11) unsigned NOT NULL default '0',
  `ip` varchar(20) collate utf8_unicode_ci NOT NULL default '',
  `wtime` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id_lm`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of pro_lm
-- ----------------------------
INSERT INTO `pro_lm` VALUES ('1', '0', '美妆折扣', 'yes', 'yes', '100', '127.0.0.1', '1445441148');
INSERT INTO `pro_lm` VALUES ('2', '0', '服装折扣', 'yes', '', '100', '127.0.0.1', '1459146792');

-- ----------------------------
-- Table structure for `seo`
-- ----------------------------
DROP TABLE IF EXISTS `seo`;
CREATE TABLE `seo` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) collate utf8_unicode_ci default NULL,
  `keys` varchar(200) collate utf8_unicode_ci default NULL,
  `description` varchar(300) collate utf8_unicode_ci default NULL,
  `name` varchar(50) collate utf8_unicode_ci default NULL,
  `wwwname` varchar(100) collate utf8_unicode_ci default NULL,
  `gcname` varchar(200) collate utf8_unicode_ci default NULL,
  `icp` varchar(100) collate utf8_unicode_ci default NULL,
  `qq` varchar(12) collate utf8_unicode_ci default NULL,
  `qqs` varchar(14) collate utf8_unicode_ci default NULL,
  `img_sl1` varchar(200) collate utf8_unicode_ci default NULL,
  `img_sl2` varchar(200) collate utf8_unicode_ci default NULL,
  `sina_weibo` varchar(200) collate utf8_unicode_ci default NULL,
  `qq_weibo` varchar(200) collate utf8_unicode_ci default NULL,
  `address` varchar(200) collate utf8_unicode_ci default NULL,
  `tel` varchar(100) collate utf8_unicode_ci default NULL,
  `img_sl3` varchar(200) collate utf8_unicode_ci default NULL,
  `weixin` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of seo
-- ----------------------------
INSERT INTO `seo` VALUES ('1', '微商城 - 专注独家折扣,1折特卖,全场包邮', '微商城折扣,折扣,特卖,打折,9.9元包邮,微商城', '微商城折扣汇聚全网最优质折扣商品', '微商城', 'jvyoumeizhuang.com', '广州技米网络科技有限公司', '粤ICP备1504544号', '54343444', '1234567', 'weixin/2010122300301992.png', 'weixin//2010122300294459.png', 'http://weibo.com/', 'http://t.qq.com/', '广格里A幢422', '020-88888888', 'm/img/kimiblank.gif', '15915773380');
INSERT INTO `seo` VALUES ('2', '微商城 - 专注独家折扣,1折特卖,全场包邮', '微商城折扣,折扣,特卖,打折,9.9元包邮,微商城', '微商城折扣汇聚全网最优质折扣商品', null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `seo` VALUES ('3', '微商城 - 专注独家折扣,1折特卖,全场包邮', '微商城折扣,折扣,特卖,打折,9.9元包邮,微商城', '微商城折扣汇聚全网最优质折扣商品', null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `skin`
-- ----------------------------
DROP TABLE IF EXISTS `skin`;
CREATE TABLE `skin` (
  `id` int(11) NOT NULL auto_increment,
  `randoms` varchar(100) collate utf8_unicode_ci default NULL,
  `skin_type` varchar(4) collate utf8_unicode_ci default NULL COMMENT '皮肤特征',
  `skin_color` varchar(4) collate utf8_unicode_ci default NULL,
  `is_allergy` varchar(4) collate utf8_unicode_ci default NULL,
  `want_type` varchar(100) collate utf8_unicode_ci default NULL,
  `improve_type` varchar(4) collate utf8_unicode_ci default NULL,
  `nurse` varchar(4) collate utf8_unicode_ci default NULL,
  `customer_name` varchar(10) collate utf8_unicode_ci default NULL,
  `gender` varchar(10) collate utf8_unicode_ci default NULL,
  `calendar_type` varchar(10) collate utf8_unicode_ci default NULL,
  `qq` varchar(11) collate utf8_unicode_ci default NULL,
  `handset` varchar(11) collate utf8_unicode_ci default NULL,
  `skin_id` varchar(11) collate utf8_unicode_ci default NULL,
  `ip` varchar(50) collate utf8_unicode_ci default NULL,
  `wtime` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of skin
-- ----------------------------
INSERT INTO `skin` VALUES ('12', '235496267', 'A', 'A', 'A', '黑头/毛孔,皱纹,出油,', 'A', 'A', '一下', '女', '12', '323243', '13222222222', 'A', '127.0.0.1', '1293072668');
INSERT INTO `skin` VALUES ('13', '111867971', 'A', 'A', 'A', '黑头/毛孔,暗黄/斑点,皱纹,出油,', 'G', 'B', '李芳', '女', '23', '34323342', '13232323222', 'A', '127.0.0.1', '1293075144');
INSERT INTO `skin` VALUES ('14', '119002755', 'C', 'D', 'C', '黑头/毛孔,出油,', 'F', 'C', '黄昌', '女', '23', '3233322', '13243434343', 'C', '127.0.0.1', '1293036016');

-- ----------------------------
-- Table structure for `skins`
-- ----------------------------
DROP TABLE IF EXISTS `skins`;
CREATE TABLE `skins` (
  `id` int(11) NOT NULL auto_increment,
  `skin_type` varchar(4) collate utf8_unicode_ci default NULL,
  `title` varchar(20) collate utf8_unicode_ci default NULL,
  `z_body` text collate utf8_unicode_ci,
  `f_body` text collate utf8_unicode_ci,
  `qqs` varchar(13) collate utf8_unicode_ci default NULL,
  `qq` varchar(12) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of skins
-- ----------------------------
INSERT INTO `skins` VALUES ('1', 'A', '中性肌肤', '您好，根据您所提交的相关信息提示，您属于中性肌肤，中性肌肤是健康的理想皮肤，PH值在5-5.6之间，皮脂腺、汗腺的分泌量适中，不油腻不干燥富有弹性，不见毛孔，红润有光泽，不容易老化。', '在保养方面较为轻松，保持日常的基础护理即可，缺乏保养的中性肌肤也会演变成偏干或偏油的肌肤。', '321432', '4323333');
INSERT INTO `skins` VALUES ('2', 'B', '干性肌肤', '您好，根据您所提交的相关信息提示，您属于干性肌肤，干性肌肤皮脂分泌量少，皮肤干燥、白皙、缺少光泽，毛孔细小而不明显，但对外界刺激敏感，容易产生细小皱纹、黯沉发黄以及斑点。', '注重皮肤的深层保养，选用补水保湿的护理产品，坚持隔离防晒，阻止黑色素以及斑点的形成。', '423212', '424234');
INSERT INTO `skins` VALUES ('3', 'C', '混合性肌肤', '您好，根据您所提交的相关信息提示，您属于混合性肌肤，混合性肌肤兼具油性皮肤和干性皮肤两种特点，在面部T区（额头、鼻子两侧、下颌）呈油性，易滋生粉刺、痘痘；U区（两侧脸颊、颧骨、外眼角部位）呈干性，油脂分泌少，容易老化。', '分区护理，偏油的T区采用控油护理产品，而偏干的U区则需要采用保湿护肤品，混合性肌肤容易吸收紫外线，应选用防晒产品进行有效防晒。', '1322333', '2343334');
INSERT INTO `skins` VALUES ('4', 'D', '油性肌肤', '您好，根据您所提交的相关信息提示，您属于油性皮肤，油性肌肤是指油脂分泌旺盛、额头、鼻翼有油光、毛孔粗大、触摸有黑头、皮质厚硬不光滑、外观暗黄，皮肤偏碱性，不易衰老，皮肤易吸收紫外线，同时也易生痘痘、粉刺。', '护理的关键在于清洁控油，只有从控油的源头做起，才能有效抑制粉刺、痘痘黑头生成，让肌肤清爽无油，减少皮肤问题。', '432233', '454554');
