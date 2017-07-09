-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?07 �?09 �?12:59
-- 服务器版本: 5.5.53
-- PHP 版本: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `younike`
--

-- --------------------------------------------------------

--
-- 表的结构 `you_captcha`
--

CREATE TABLE IF NOT EXISTS `you_captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=267 ;

--
-- 转存表中的数据 `you_captcha`
--

INSERT INTO `you_captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(265, 1499595452, '127.0.0.1', 'l5dd'),
(266, 1499595463, '127.0.0.1', 'hyjx');

-- --------------------------------------------------------

--
-- 表的结构 `you_category`
--

CREATE TABLE IF NOT EXISTS `you_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `fid` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `type` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `you_category`
--

INSERT INTO `you_category` (`id`, `name`, `fid`, `sort`, `type`) VALUES
(1, '保洁', NULL, 1, 'pro'),
(2, '保姆', NULL, 2, 'pro'),
(3, '月嫂', NULL, 3, 'pro'),
(4, '清洁', NULL, 4, 'pro'),
(5, '其他家庭服务', NULL, 5, 'pro'),
(7, '大东区', NULL, 1, 'area'),
(8, '铁西区', NULL, 2, 'area'),
(9, '浑南新区', NULL, 3, 'area'),
(10, '沈北新区', NULL, 4, 'area'),
(11, '和平区', NULL, 5, 'area');

-- --------------------------------------------------------

--
-- 表的结构 `you_flash`
--

CREATE TABLE IF NOT EXISTS `you_flash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(10) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `sort` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

--
-- 转存表中的数据 `you_flash`
--

INSERT INTO `you_flash` (`id`, `type`, `title`, `img`, `description`, `url`, `sort`) VALUES
(73, 'flash', '第一张', '14995988981933.jpg', NULL, 'http://www.baidu.com/1', 1),
(74, 'flash', '第二章', '14995989419530.jpg', NULL, 'http://www.baidu.com/2', 2),
(75, 'flash', '第三张', '14995989551237.jpg', NULL, 'http://www.baidu.com/3', 3),
(76, 'flash', '第四章', '14995989757020.jpg', NULL, 'http://www.baidu.com/4', 4),
(77, 'flash', '第五章', '14995989899337.jpg', NULL, 'http://www.baidu.com/5', 5),
(78, 'four', '品质保障', '14995991444721.jpg', '服务人员全部经过严格的学习、培训，合格者上岗并对服务客户定期回访。', 'http://www.baidu.com/1', 1),
(79, 'four', '身份认证', '14995991736612.jpg', '服务人员全部通过严格的身份认证及指纹备案。', 'http://www.baidu.com/2', 2),
(80, 'four', '自助选择', '14995991913435.jpg', '百万新老服务人员任你选择,喜欢哪个就用哪个。', 'http://www.baidu.com/3', 3),
(81, 'four', '违约赔付', '14995992088248.jpg', '服务人员未上门服务爽约者，来人到家将提供全额赔付。', 'http://www.baidu.com/4', 4),
(82, 'adv', '广告1', '14995992837252.jpg', NULL, 'http://www.baidu.com/1', 1);

-- --------------------------------------------------------

--
-- 表的结构 `you_group`
--

CREATE TABLE IF NOT EXISTS `you_group` (
  `id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `title` varchar(50) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0',
  `icon` char(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `you_group`
--

INSERT INTO `you_group` (`id`, `name`, `title`, `create_time`, `update_time`, `status`, `sort`, `icon`) VALUES
(2, 'javascript:;', '应用中心', 1402468914, 0, 1, 0, ' icon-user-md'),
(13, 'javascript:;', '单页信息', 1402472825, 0, 1, 0, ' icon-pencil'),
(7, 'javascript:;', '家庭服务', 1402468840, 0, 1, 0, ' icon-heart'),
(15, 'javascript:;', '活动专区', 1402468914, 0, 1, 0, ' icon-link'),
(12, 'javascript:;', '站点设置', 1402468914, 0, 1, 0, ' icon-cog');

-- --------------------------------------------------------

--
-- 表的结构 `you_news`
--

CREATE TABLE IF NOT EXISTS `you_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `act_date` varchar(255) NOT NULL COMMENT '活动开始结束时间',
  `content` text,
  `click` int(5) NOT NULL COMMENT '点击次数',
  `pubdate` int(11) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=240 ;

--
-- 转存表中的数据 `you_news`
--

INSERT INTO `you_news` (`id`, `type`, `title`, `act_date`, `content`, `click`, `pubdate`, `description`) VALUES
(230, '6', '来人到家2015春节放假公告', '', '<p>尊敬的各位来人客户：<br/> 值此新春佳节即将到来之际，来人全体员工提前祝您新春快乐！<br/> <span style="background-color:;">来人到家春节</span>放假时间公布如下：<br/> 2月18日--2月24日，放假共计7天。 &nbsp;假期您可以正常预约2月26号及之后的服务！亲，我们年后见！</p>', 0, 1499597002, ''),
(231, '6', '转发微信微博下单就有优惠', '', '<p><img src="/ueditor/php/upload/image/20170709/1499597032115979.jpg" alt=""/> </p><p>转发内容：【来人到家】新用户首次约单立享10元优惠！http://www.lairen.com 【来人到家】专业家政，来啦！</p><p>在淘宝约单，和客服联系，转发截图给旺旺客服即可。</p><p><br/></p>', 0, 1499597033, NULL),
(232, '6', '百元大奖等你来拿', '', '<p>&nbsp; &nbsp; \r\n为了感恩回馈客户，来人到家将赠送丰厚大礼。若新用户在来人到家注册，则我们会立即送上1000积分，在注册后就可以参加抽奖活动，奖金金额分200元，300元，500元三个等级，获奖后的金额会以积分的形式赠送到用户的账户，例如：抽中200元，就会送给用户20000积分，积分可直接用于支付。值得注意的是，并不是可以连续抽奖，只有当用户的积分使用到低于100积分时，才可以参加第二次的抽奖。</p>', 0, 1499597048, NULL),
(233, '6', '支付通道：支付宝、微信都已解锁', '', '<p>用户预约服务可以通过支付宝、微信扫描二维码支付了。</p>', 0, 1499597062, NULL),
(234, '7', '旧版的资产是否会消失？', '', '<p>旧版的资产在未完全消耗之前是不会消失的，请您放心，只要旧版有剩余资产，在新版“我的”界面右上角的入口会一直存在。</p>', 0, 1499597104, NULL),
(235, '7', '旧版资产怎样使用？', '', '<p>旧版资产的余额可以在旧版的首页购买相应的服务，仍然可以享受会员的优惠；旧版的未预约订单及礼品卡仍需在旧版内进行预约。</p>', 0, 1499597115, NULL),
(236, '7', '旧版资产能否转入新版？', '', '<p>目前旧版的资产不能转入新版，旧版的资产只能在旧版购买和预约服务。</p>', 0, 1499597127, NULL),
(237, '7', '支付宝不能用，还有什么其它的支付方式？', '', '<p>在用户已安装‘支付宝’的前提下，该问题的产生是支付宝原因，未知 BUG 导致支付宝不能完成调用其支付流程，目前解决办法如下: 1、可选择‘微信’或‘银联’支付，然后尝试再次支付。 2、关注我们的微信公众号“来人到家”，用微信支付下单。</p>', 0, 1499597139, NULL),
(238, '7', '为什么不能用余额支付？', '', '<p>部分活动不支持余额支付，具体可参看每次活动详情，会注明活动是否可使用余额支付。</p>', 0, 1499597149, NULL),
(239, '8', 'iOS开发工程师-北京', '', '<p>职位描述:</p><p><br/> </p><p>从事来人网IOS端的开发。</p><p><br/> </p><p>职位要求：</p><p><br/> </p><p>1.熟悉iOS事件机制, 自定义和扩展iOS UI控件、对Cocoa/UIKit框架及iOS SDK有深入理解. \r\n熟练掌握常用开发框架以及block, gcd等常用技术, 能独立进行应用模块的设计和实现. 熟悉XMPP, \r\nCoreData,AFNetWorking或ASIHTTPRequest,；</p><p><br/> </p><p>2.熟悉iOS系统架构及相关技术，1年以上实际iOS平台开发经验，并有上线作品；</p><p><br/> </p><p>3.思路清晰，思维敏捷，快速的学习能力，良好的英文资料阅读能力；</p><p><br/> </p><p>4.能承担较大工作压力，能够独立完成客户端开发优先，具备良好的沟通能力和团队合作精神。</p><p><br/> </p><p>应聘简历发至: zhangfeng@lairen.com</p><p><br/></p>', 0, 1499597296, NULL),
(229, 'active', '新人专享（三鼎）-包月保洁4次*2小时1', '2017-07-09 - 2017-07-31', '<p><strong class=" f-16 c-666 text-l">新人专享（三鼎）-包月保洁4次*2小时1</strong></p><p><strong class=" f-16 c-666 text-l">新人专享（三鼎）-包月保洁4次*2小时</strong></p><p><img src="/data/attached/20170708/1499528572298769.jpg" title="1499528572298769.jpg" alt="e482c332-d372-458f-9877-6bcadbcb9dc3.jpg"/></p>', 0, 1499528923, '新人专享（三鼎）-包月保洁4次*2小时1');

-- --------------------------------------------------------

--
-- 表的结构 `you_node`
--

CREATE TABLE IF NOT EXISTS `you_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `group_id` tinyint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=120 ;

--
-- 转存表中的数据 `you_node`
--

INSERT INTO `you_node` (`id`, `name`, `title`, `status`, `remark`, `sort`, `pid`, `level`, `type`, `group_id`) VALUES
(30, 'Group/index', '群组管理', 1, '', 2, 1, 2, 0, 2),
(2, 'Node', '节点管理', 1, '', 2, 1, 2, 0, 2),
(112, 'News/index/active', '活动列表', 1, NULL, 1, 0, 0, 0, 15),
(113, 'Page', '单页设置', 1, NULL, 1, 0, 0, 0, 13),
(114, 'Product', '服务列表', 1, NULL, 1, 0, 0, 0, 7),
(115, 'Flash/index/flash', '焦点图', 1, NULL, 1, 0, 0, 0, 12),
(116, 'Flash/index/four', '首页4图', 1, NULL, 2, 0, 0, 0, 12),
(117, 'Flash/index/adv', '右侧广告', 1, NULL, 3, 0, 0, 0, 12),
(118, 'Category/index/pro', '服务分类', 1, NULL, 1, 0, 0, 0, 7),
(119, 'Category/index/area', '服务地区', 1, NULL, 3, 0, 0, 0, 7);

-- --------------------------------------------------------

--
-- 表的结构 `you_page`
--

CREATE TABLE IF NOT EXISTS `you_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `sort` int(2) NOT NULL DEFAULT '99',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `you_page`
--

INSERT INTO `you_page` (`id`, `type`, `title`, `content`, `sort`) VALUES
(5, 'page', '关于优尼客', '<p>来人到家（lairen.com）隶属于北京来人网络科技有限公司，是生活服务行业新一代的O2O网上交易服务平台，来人到家现致力于开创生活服务行业互联网新模式，为传统生活服务行业互联网化订制最佳解决方案，用在线订制服务取代传统的店面、电话模式，推动新的生活消费理念和消费方式。\r\n 来人到家致力于推动 \r\n帮助更多的消费者享用海量的家庭服务，获得更高的生活品质，让生活变的触手可及；通过提供网络销售平台等基础性服务，帮助更多的企业开拓市场、建立品牌，实现产业升级；帮助更多胸怀梦想的人通过网络\r\n 实现创业就业。 \r\n北京来人网络科技有限公司是一家技术驱动的公司，从成立伊始就投入巨资开发完善可靠、能够不断升级、以客户应用服务为核心的自有技术平台。我们将继续增强公司的技术平台实力，以便更好地提升内部运营效率，同时为消费者和服务商提供卓越服务。<br/><br/></p><p>刘敏:来人到家合伙创始人，曾就职于联通设计院，设计《智慧城市调度系统》。10年以上软件开发、架构设计经验。多家软件开发公司研发主导，先后设计研发过《商务总机系统》、《电信生成经营分析系统》、《家政服务网络中心运营管理系统》等。于2014年5月，同<a>三鼎家政集团</a>共同创建《<a href="http://www.lairen.com">北京来人网络科技有限公司</a>》,为传统生活服务行业互联网化订制最佳解决方案。</p><p><br/></p>', 1),
(6, 'list', '优尼客生活', NULL, 2),
(7, 'list', '常见问题', NULL, 3),
(8, 'list', '加入我们', NULL, 4),
(9, 'page', '免责声明', '<p>欢迎访问来人到家www.lairen.com<br/> &nbsp;&nbsp;&nbsp;&nbsp;来人到家提醒您：在使用来人到家平台各项服务前，请您务必仔细阅读并透彻理解本声明。您可以选择不使用来人到家平台服务，但如果您使用来人到家平台服务的，您的使用行为将被视为对本声明全部内容的认可。“来人到家平台”指由北京来人网络科技有限公司（简称“来人”）运营的网络交易平台，域名为\r\n lairen.com。我们以本隐私申明声明对访问者隐私保护的许诺。以下文字公开我站（lairen.com）对信息收集和使用的情况。<br/> &nbsp;&nbsp;&nbsp;&nbsp;本隐私申明正在不断改进中，随着我站服务范围的扩大，我们会随时更新我们的隐私申明。我们欢迎您随时会来查看本申明。在同意来人到家服务协议（“协议”）之时，您已经同意我们按照本隐私申明来使用和披露您的个人信息。本隐私申明的全部条款属于该协议的一部份。<br/> <strong>1.用户名和密码</strong><br/>\r\n &nbsp;&nbsp;&nbsp;&nbsp;当您打算注册成用户后，我们要求您选择一个用户名和密码。您只能通过您的密码来使用您的帐号。如果您泄漏了密码，您可能丢失了您的个人识别信息，并且有可能导致对您不利的司法行为。因此不管任何原因使您的密码安全受到危及，您应该立即和我们取得联系,以便来人到家采取相应措施。<br/> <strong>2.注册信息</strong><br/> &nbsp;&nbsp;&nbsp;&nbsp;当您在注册为用户时，我们要求您填写一张注册表。注册表要求提供您的真实姓名，地址，电话号码。<br/> <strong>3.您的交易行为</strong><br/> &nbsp;&nbsp;&nbsp;&nbsp;我们跟踪IP地址仅仅只是为了安全的必要。如果我们没有发现任何安全问题，我们会及时删除我们收集到的IP地址。我们还跟踪全天的页面访问数据。全天页面访问数据被用来反映网站的流量，以使我们可以为未来的发展制定计划（例如，增加服务器）。<br/> <strong>4.邮件/短信</strong><br/> &nbsp;&nbsp;&nbsp;&nbsp;来人到家保留通过邮件、短信、邮寄会刊的形式，对本网站注册、购物用户发送订单信息、促销活动等告知服务的权利。如果您在来人到家注册、消费，表明您已默示同意接受此项服务。<br/> <strong>5.第三方</strong><br/> &nbsp;&nbsp;&nbsp;&nbsp;我们不会向任何第三方提供，出售，出租，分享和交易用户的个人信息，除非第三方和来人到家一起为网站和用户提供服务，并且在该服务结束后，将被禁止访问包括其以前能够访问的所有这些资料。当我们被法律强制或依照政府要求提供您的信息时我们将善意地披露您的资料。<br/> <strong>6.信息的存储和交换</strong><br/> &nbsp;&nbsp;&nbsp;&nbsp;用户信息和资料被收集和存储在放置于中国的服务器上。只有为了做备份的需要时，我们才可能需要将您的资料传送到别国的服务器上。<br/> <strong>7.外部链接</strong><br/> &nbsp;&nbsp;&nbsp;&nbsp;本站含有到其他网站的链接。来人到家对那些网站的隐私保护措施不负任何责任。我们可能在任何需要的时候增加商业伙伴或共用品牌的网站，但是提供给他们的将仅仅是综合信息，我们将不会公开您的身份。<br/> <strong>8.安全</strong><br/> &nbsp;&nbsp;&nbsp;&nbsp;我们网站有相应的安全措施来确保我们掌握的信息不丢失，不被滥用和变造。这些安全措施包括向其它服务器备份数据和对用户密码加密。尽管我们有这些安全措施，但请注意在因特网上不存在“完善的安全措施”。<br/> <strong>9.修改您的资料</strong><br/> &nbsp;&nbsp;&nbsp;&nbsp;您可以随时在来人到家的网站修改或者更新你的个人信息和密码（在成功登录之后）。<br/> <strong>10.联系我们</strong><br/> &nbsp;&nbsp;&nbsp;&nbsp;如果你对本隐私申明或来人到家的隐私保护措施以及您在使用中的问题有任何意见和建议请和我们联系。<br/> <strong>11.未成年人的特别注意事项</strong><br/> &nbsp;&nbsp;&nbsp;&nbsp;如果您不是具备完全民事权利能力和完全民事行为能力的自然人，您无权使用来人到家平台服务，因此来人到家希望您不要向我们提供任何个人信息。</p>', 5),
(10, 'page', '用户协议', '<p>欢迎您使用来人平台服务！ <br/> <br/> <strong>特别提示：</strong> <br/> &nbsp;&nbsp;&nbsp;&nbsp;在使用来人平台服务之前，您应当认真阅读并遵守《来人服务协议》（以下简称“本协议”），请您务必审慎阅读、充分理解各条款内容，特别是免除或者限制责任的条款、争议解决和法律适用条款。免除或者限制责任的条款可能将以加粗字体显示，您应重点阅读。如您对协议有任何疑问的，应向来人客服咨询。\r\n \r\n当您按照注册页面提示填写信息、阅读并同意本协议且完成全部注册程序后，或您按照激活页面提示填写信息、阅读并同意本协议且完成全部激活程序后，或您以其他来人允许的方式实际使用来人平台服务时，即表示您已充分阅读、理解并接受本协议的全部内容，并与来人平台达成协议。您承诺接受并遵守本协议的约定，\r\n 届时您不应以未阅读本协议的内容或者未获得来人对您问询的解答等理由，主张本协议无效，或要求撤销本协议。 <br/> <strong>一、 协议范围</strong> <br/> 1、本协议由您与来人平台的经营者共同缔结，本协议具有合同效力。 <br/> 来人平台的经营者是指法律认可的经营来人平台网站的责任主体，来人平台网站包括但不限于来人到家（域名为 lairen.com），本协议项下各来人平台的经营者可单称或合称为“来人”。有关来人平台经营者的信息请查看各来人平台首页底部公布的公司信息和证照信息。 <br/> 2、除另行明确声明外，来人平台服务包含任何来人及其关联公司提供的基于互联网以及移动网的相关服务，且均受本协议约束。如果您不同意本协议的约定，您应立即停止注册/激活程序或停止使用来人平台服务。 <br/> 3、本协议内容包括协议正文、 法律声明、《来人规则》及所有来人已经发布或将来可能发布的各类规则、公告或通知（以下合称“来人规则”或“规则”）。所有规则为本协议不可分割的组成部分，与协议正文具有同等法律效力。 <br/>\r\n 4、来人有权根据需要不时地制订、修改本协议及/或各类规则，并以网站公示的方式进行变更公告，无需另行单独通知您。变更后的协议和规则一经在网站公布后，立即或在公告明确的特定时间自动生效。若您在前述变更公告后继续使用来人平台服务的，即表示您已经阅读、理解并接受经修订的协议和规则。若您不同意相关变更，应当立即停止使用来人平台服务。 <br/> <strong>二、 注册与账户</strong> <br/> 1、主体资格 <br/> 您确认，在您完成注册程序或以其他来人允许的方式实际使用来人平台服务时，您应当是具备完全民事行为能权利能力和完全民事力的自然人、法人或其他组织。若您不具备前述主体资格，则您及您的监护人应承担因此而导致的一切后果，且来人有权注销或永久冻结您的账户，并向您及您的监护人索偿相应损失。 <br/> 2、注册和账户 <br/> a）当您按照注册页面提示填写信息、阅读并同意本协议且完成全部注册程序后，或在您按照激活页面提示填写信息、阅读并同意本协议且完成全部激活程序后，或您以其他来人允许的方式实际使用来人平台服务时，您即受本协议约束。您可以使用您提供或确认的邮箱、手机号码或者来人允许的其它方式作为登录手段进入来人平台。 <br/> b）您可以对账户设置来人昵称。您设置的来人昵称不得侵犯或涉嫌侵犯他人合法权益。如您设置的来人昵称涉嫌侵犯他人合法权益，来人有权终止向您提供来人平台服务，注销您的来人昵称。来人昵称被注销后将开放给任意用户注册。 <br/> c）您的登录名、来人昵称和密码不得以任何方式买卖、转让、赠与或继承，除非有法律明确规定或司法裁定，并经来人同意，且需提供来人要求的合格的文件材料并根据来人制定的操作流程办理。 <br/> 3、用户信息 <br/>\r\n a）在注册或激活流程时，您应当依照法律法规要求，按相应页面的提示准确提供您的资料，并于资料信息变更时及时更新，以保证您所提交资料的真实、及时、完整和准确。如有合理理由怀疑您提供的资料错误、不实、过时或不完整的，来人有权向您发出询问及/或要求改正的通知，并有权直接做出删除相应资料的处理，直至中止、终止对您提供部分或全部来人平台服务。来人对此不承担任何责任，您将承担因此产生的任何直接或间接损失及不利后果。 <br/> b）您应当准确填写并及时更新您提供的电子邮件地址、联系电话、联系地址、邮政编码等联系方式，以便来人或其他用户与您进行有效联系，因通过这些联系方式无法与您取得联系，导致您在使用来人平台服务过程中产生任何损失或增加费用的，应由您完全独自承担。您了解并同意，您有义务保持你提供的联系方式的真实性和有效性，如有变更或需要更新的，您应按来人的要求进行操作。 <br/> 4、账户安全 <br/> 您须自行负责对您的来人登录名、来人昵称和密码下发生的所有活动（包括但不限于信息披露、发布信息、网上点击同意或提交各类规则协议、网上续签协议或购买服务等）承担责任。您同意：(a)\r\n 如发现任何人未经授权使用您的来人登录名、来人昵称和密码，或发生违反保密规定的任何其他情况，您会立即通知来人；及 (b) \r\n确保您在每个上网时段结束时，以正确步骤离开网站/服务。来人不能也不会对因您未能遵守本款规定而发生的任何损失负责。您理解来人对您的请求采取行动需要合理时间，来人对在采取行动前已经产生的后果（包括但不限于您的任何损失）不承担任何责任。 <br/> 5、来人登录名注销 <br/> a）如您连续12个月未使用您的邮箱、手机或来人认可的其他方式和密码登录过来人平台，且您的账户下不存在未到期的有效业务，您的来人登录名可能被注销。 <br/> b）您同意并授权来人网站，您如在任意来人网站有欺诈、发布或销售假冒伪劣/侵权商品、侵犯他人合法权益或其他违反法律法规、来人网站规则等行为，该网站在来人网站的范围内对此有权披露，您的来人登录名可能被注销、不能再登录，来人网站服务同时终止。 <br/> <strong>三、 来人平台服务</strong> <br/> 1、通过来人及其关联公司提供的来人平台服务和其它服务，会员可在来人平台上创建店铺、发布交易信息、查询商品和服务信息、达成交易意向并进行交易、对其他会员进行评价、参加来人组织的活动以及使用其它信息服务及技术服务，具体以所开通的平台提供的服务内容为准。 <br/> 2、您在来人平台上交易过程中与其他会员发生交易纠纷时，一旦您或其它会员任一方或双方共同提交来人要求调处，则来人作为独立第三方，有权根据单方判断做出调处决定，您了解并同意接受来人的判断和调处决定。 <br/> 3、您了解并同意，来人有权应政府部门（包括司法及行政部门）的要求，向其提供您向来人提供的用户信息和交易记录等必要信息。如您涉嫌侵犯他人知识产权等合法权益，则来人亦有权在初步判断涉嫌侵权行为存在的情况下，向权利人提供您必要的身份信息。 <br/> 4、您在使用来人平台服务过程中，所产生的应纳税赋，以及一切硬件、软件、服务及其它方面的费用，均由您独自承担。 <br/> <strong>四、来人平台服务使用规范</strong> <br/> 1、在来人平台上使用来人服务过程中，您承诺遵守以下约定： <br/> a)实施的所有行为均遵守国家法律、法规等规范性文件及来人平台各项规则的规定和要求，不违背社会公共利益或公共道德，不损害他人的合法权益，不偷逃应缴税费，不违反本协议及相关规则。 <br/> b)在与其他会员交易过程中，遵守诚实信用原则，不采取不正当竞争行为，不扰乱网上交易的正常秩序，不从事与网上交易无关的行为。 <br/>\r\n c)不发布国家禁止销售的或限制销售的商品或服务信息（除非取得合法且足够的许可），不发布涉嫌侵犯他人知识产权或其它合法权益的商品或服务信息，不发布违背社会公共利益或公共道德或来人认为不适合在来人平台上销售的商品或服务信息，不发布其它涉嫌违法或违反本协议及各类规则的信息。 <br/> d)不以虚构或歪曲事实的方式不当评价其他会员，不采取不正当方式制造或提高自身的信用度，不采取不正当方式制造或提高（降低）其他会员的信用度。 <br/> e)不对来人平台上的任何数据作商业性利用，包括但不限于在未经来人事先书面同意的情况下，以复制、传播等任何方式使用来人平台站上展示的资料。 <br/> f)不使用任何装置、软件或例行程序干预或试图干预来人平台的正常运作或正在来人平台上进行的任何交易、活动。您不得采取任何将导致不合理的庞大数据负载加诸来人平台网络设备的行动。 <br/> 2、您了解并同意： <br/> a)您如果违反前述承诺，产生任何法律后果的，您应以自己的名义独立承担所有的法律责任，并确保来人免于因此产生任何损失或增加费用。 <br/> b)基于维护来人平台交易秩序及交易安全的需要，来人有权在发生恶意购买等扰乱市场正常交易秩序的情形下，执行关闭相应交易订单等操作。 <br/> c)经国家行政或司法机关的生效法律文书确认您存在违法或侵权行为，或者来人根据自身的判断，认为您的行为涉嫌违反法律法规的规定或涉嫌违反本协议和/或规则的条款的，则来人有权在来人平台上公示您的该等涉嫌违法或违约行为及来人已对您采取的措施。 <br/> d)对于您在来人平台上发布的涉嫌违法、涉嫌侵犯他人合法权利或违反本协议和/或规则的信息，来人有权不经通知您即予以删除，且按照规则的规定进行处罚。 <br/>\r\n e)对于您违反本协议项下承诺，或您在来人平台上实施的行为，包括您未在来人平台上实施但已经对来人平台及其用户产生影响的行为，来人有权单方认定您行为的性质及是否构成对本协议和/或规则的违反，并根据单方认定结果适用规则予以处理或终止向您提供服务，且无须征得您的同意或提前通知予您。您应自行保存与您行为有关的全部证据，并应对无法提供充要证据而承担的不利后果。 <br/> f)如您涉嫌违反有关法律或者本协议之规定，使来人遭受任何损失，或受到任何第三方的索赔，或受到任何行政管理部门的处罚，您应当赔偿来人因此造成的损失和/或发生的费用，包括合理的律师费用。 <br/> <strong>五、特别授权</strong> <br/> 您完全理解并不可撤销地授予来人及其关联公司下列权利： <br/>\r\n 1、您完全理解并不可撤销地授权来人或来人授权的第三方或您与来人一致同意的第三方，根据本协议及来人规则的规定，处理您在来人平台上发生的所有交易及可能产生的交易纠纷。您同意接受来人或来人授权的第三方或您与来人一致同意的第三方的判断和调处决定。该决定将对您具有法律约束力。 <br/> 2、一旦您向来人和/或其关联公司作出任何形式的承诺，且相关公司已确认您违反了该承诺，则来人有权立即按您的承诺或协议约定的方式对您的账户采取限制措施，包括中止或终止向您提供服务，并公示相关公司确认的您的违约情况。您了解并同意，来人无须就相关确认与您核对事实，或另行征得您的同意，且来人无须就此限制措施或公示行为向您承担任何的责任。 <br/> 3、一旦您违反本协议，或与来人签订的其他协议的约定，来人有权以任何方式通知来人关联公司，要求其对您的权益采取限制措施，包括但不限于要求来人公司将您账户内的款项支付给来人指定的对象，要求来人和关联公司中止、终止对您提供部分或全部服务，且在其经营或实际控制的任何网站公示您的违约情况。 <br/> 4、对于您提供的资料及数据信息，您授予来人及其关联公司独家的、全球通用的、永久的、免费的许可使用权利 \r\n(并有权在多个层面对该权利进行再授权)。此外，来人及其关联公司有权(全部或部份地) \r\n使用、复制、修订、改写、发布、翻译、分发、执行和展示您的全部资料数据（包括但不限于注册资料、交易行为数据及全部展示于来人平台的各类信息）或制作其派生作品，并以现在已知或日后开发的任何形式、媒体或技术，将上述信息纳入其它作品内。 <br/> 5、为方便您使用来人平台服务或其他组织的服务（以下称其他服务），您同意并授权来人将您在账户注册/激活、使用来人平台服务过程中提供、形成的信息传递给向您提供其他服务的来人网站或其他组织，或从提供其他服务的河南郑州来人网络科技有限公司网站或其他组织获取您在注册/激活、使用其他服务期间提供、形成的信息。您同意不会因此追究来人、北京来人网络科技有限公司旗下网站或产品的责任。 <br/> <strong>六、责任范围和责任限制</strong> <br/> 1、来人负责按&quot;现状&quot;和&quot;可得到&quot;的状态向您提供来人平台服务。但来人对来人平台服务不作任何明示或暗示的保证，包括但不限于来人平台服务的适用性、没有错误或疏漏、持续性、准确性、可靠性、适用于某一特定用途。同时，来人也不对来人平台服务所涉及的技术及信息的有效性、准确性、正确性、可靠性、质量、稳定、完整和及时性作出任何承诺和保证。 <br/> 2、您了解来人平台上的信息系用户自行发布，且可能存在风险和瑕疵。来人平台仅作为交易地点。来人平台仅作为您获取物品或服务信息、物色交易对象、就物品和/或服务的交易进行协商及开展交易的场所，但来人无法控制交易所涉及的物品的质量、安全或合法性，商贸信息的真实性或准确性，以及交易各方履行其在贸易协议中各项义务的能力。您应自行谨慎判断确定相关物品及/或信息的真实性、合法性和有效性，并自行承担因此产生的责任与损失。 <br/> 3、除非法律法规明确要求，或出现以下情况，否则，来人没有义务对所有用户的信息数据、商品和服务信息、交易行为以及与交易有关的其它事项进行事先审查： <br/> a)来人有合理的理由认为特定会员及具体交易事项可能存在重大违法或违约情形。 <br/> b)来人有合理的理由认为用户在来人平台的行为涉嫌违法或不当。 <br/>\r\n 4、来人或来人授权的第三方或您与来人一致同意的第三方有权基于您不可撤销得授权受理您与其他会员因交易产生的争议，并有权单方判断与该争议相关的事实及应适用的规则，进而作出处理决定，包括但不限于调整相关订单的交易状态，来人公司将争议货款的全部或部分支付给交易一方或双方。该处理决定对您有约束力。如您未在限期内执行处理决定的，则来人有权利（但无义务）直接使用您来人账户内的款项，或您向来人及其关联公司交纳的保证金代为支付。您应及时补足保证金并弥补来人及其关联公司的损失，否则来人及其关联公司有权直接抵减您在其它合同项下的权益，并有权继续追偿。您理解并同意，来人或来人授权的第三方或您与来人一致同意的第三方并非司法机构，仅能以普通人的身份对证据进行鉴别，来人或来人授权的第三方或您与来人一致同意的第三方对争议的调处完全是基于您不可撤销得授权，其无法保证争议处理结果符合您的期望，也不对争议调处结论承担任何责任。如您因此遭受损失，您同意自行向受益人索偿。 <br/> 5、您了解并同意，来人不对因下述任一情况而导致您的任何损害赔偿承担责任，包括但不限于利润、商誉、使用、数据等方面的损失或其它无形损失的损害赔偿 (无论来人是否已被告知该等损害赔偿的可能性) ： <br/> a)使用或未能使用来人平台服务。 <br/> b)第三方未经批准的使用您的账户或更改您的数据。 <br/> c)通过来人平台服务购买或获取任何商品、样品、数据、信息或进行交易等行为或替代行为产生的费用及损失。 <br/> d)您对来人平台服务的误解。 <br/> e)任何非因来人的原因而引起的与来人平台服务有关的其它损失。 <br/>\r\n 6、不论在何种情况下，来人均不对由于信息网络正常的设备维护，信息网络连接故障，电脑、通讯或其他系统的故障，电力故障，罢工，劳动争议，暴乱，起义，骚乱，生产力或生产资料不足，火灾，洪水，风暴，爆炸，战争，政府行为，司法行政机关的命令或第三方的不作为而造成的不能服务或延迟服务承担责任。 <br/> <strong>七、协议终止</strong> <br/> 1、您同意，来人有权自行全权决定以任何理由不经事先通知的中止、终止向您提供部分或全部来人平台服务，暂时冻结或永久冻结（注销）您的账户在来人平台的权限，且无须为此向您或任何第三方承担任何责任。 <br/> 2、出现以下情况时，来人有权直接以注销账户的方式终止本协议，并有权永久冻结（注销）您的账户在来人平台的权限和收回账户对应的来人昵称： <br/> a)来人终止向您提供服务后，您涉嫌再一次直接或间接以他人名义注册为来人用户的； <br/> b)您提供的电子邮箱不存在或无法接收电子邮件，且没有其他方式可以与您进行联系，或来人以其它联系方式通知您更改电子邮件信息，而您在来人通知后三个工作日内仍未更改为有效的电子邮箱的。 <br/> c)您提供的用户信息中的主要内容不真实或不准确或不及时或不完整； <br/> d)本协议（含规则）变更时，您明示并通知来人不愿接受新的服务协议的； <br/> e)其它来人认为应当终止服务的情况。 <br/> 3、您的账户服务被终止或者账户在来人平台的权限被永久冻结（注销）后，来人没有义务为您保留或向您披露您账户中的任何信息，也没有义务向您或第三方转发任何您未曾阅读或发送过的信息。 <br/> 4、您同意，您与来人的合同关系终止后，来人仍享有下列权利： <br/> a）继续保存您的用户信息及您使用来人平台服务期间的所有交易信息。 <br/> b)您在使用来人平台服务期间存在违法行为或违反本协议和/或规则的行为的，来人仍可依据本协议向您主张权利。 <br/> 5、来人中止或终止向您提供来人平台服务后，对于您在服务中止或终止之前的交易行为依下列原则处理，您应独力处理并完全承担进行以下处理所产生的任何争议、损失或增加的任何费用，并应确保来人免于因此产生任何损失或承担任何费用： <br/> a)您在服务中止或终止之前已经上传至来人平台的商品或服务尚未交易的，来人有权在中止或终止服务的同时删除此项商品或服务的相关信息； <br/> b)您在服务中止或终止之前已经与其他会员达成买卖合同，但合同尚未实际履行的，来人有权删除该买卖合同及其交易商品或服务的相关信息； <br/> c)您在服务中止或终止之前已经与其他会员达成买卖合同且已部分履行的，来人可以不删除该项交易，但来人有权在中止或终止服务的同时将相关情形通知您的交易对方。 <br/> <strong>八、隐私权政策</strong> <br/> 来人将在来人平台公布并不时修订隐私权政策，隐私权政策构成本协议的有效组成部分。 <br/> <strong>九、法律适用、管辖与其他</strong> <br/> 1、本协议之效力、解释、变更、执行与争议解决均适用中华人民共和国大陆地区法律，如无相关法律规定的，则应参照通用国际商业惯例和/或行业惯例。 <br/> 2、本协议包含了您使用各家来人平台需遵守的一般性规范，您在使用某个来人平台时还需遵守适用于该平台的特殊性规范（具体请参见您与该平台签署的其他协议以及平台规则等内容）。一般性规范如与特殊性规范不一致或有冲突，则特殊性规范具有优先效力。 <br/> 3、因本协议产生之争议需根据您使用的服务归属的平台确定具体的争议对象，例如因您使用来人服务所产生的争议应由来人的经营者与您沟通并处理。一旦产生争议，您与来人平台的经营者均同意以被告住所地人民法院为第一审管辖法院。 <br/> 4、如本协议的中文版本和英文版本内容产生冲突，有其他语言版本，将以中文版本内容为准。本协议以其中文版本为最终生效版本。</p>', 6),
(11, 'page', '联系我们', '<p>联系我们</p>', 7);

-- --------------------------------------------------------

--
-- 表的结构 `you_product`
--

CREATE TABLE IF NOT EXISTS `you_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `litpic` varchar(255) NOT NULL COMMENT '产品小图',
  `price` char(20) DEFAULT NULL,
  `intro` varchar(255) DEFAULT NULL,
  `content` text,
  `sort` int(11) DEFAULT NULL,
  `pubdate` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `you_product`
--

INSERT INTO `you_product` (`id`, `cid`, `name`, `description`, `img`, `litpic`, `price`, `intro`, `content`, `sort`, `pubdate`) VALUES
(1, 1, '宅洁士居家保洁-4小时', '居家保洁、玻璃清洗 ', '1499603653870.jpg', '14996039844137.jpg', '￥199/人', NULL, '<p><span class="detail_item_title">宅洁士 - 介绍</span></p><p style="text-indent:2em;"><span style="color:#333333;font-family:SimSun;font-size:14px;line-height:2;">宅洁士是好慷在家推出的专业家庭保洁服务，为行业带来4小时标准服务制，雇佣式的员工管理、规范化的培训流程、专业的保洁工具为您提供更佳的保洁体验。</span> </p><p style="text-indent:2em;"><br/></p><p><br/></p><p style="text-indent:2em;"><span style="font-size:14px;font-family:SimSun;color:#333333;line-height:2;"></span> </p><p><img src="http://img.homeking365.com/e482c332-d372-458f-9877-6bcadbcb9dc3.jpg" alt=""/> </p><p><br/></p><p><span style="color:#E56600;font-family:SimSun;font-size:14px;line-height:2;">服务费用：<span style="color:#333333;">199元/次</span> </span> </p><p><span style="color:#E56600;font-family:SimSun;font-size:14px;line-height:2;">服务时间：<span style="color:#333333;">4小时/人/次</span></span> </p><p><span style="color:#E56600;font-family:SimSun;font-size:14px;line-height:2;">预约时间：<span style="color:#333333;">上午8:00或下午14:00</span></span> </p><p><span style="color:#E56600;font-family:SimSun;font-size:14px;line-height:2;"><span style="color:#333333;"><span style="color:#E56600;font-family:SimSun;font-size:14px;line-height:28px;">预约有效期：</span><span style="font-family:SimSun;font-size:14px;line-height:28px;color:#333333;">90天</span><br/></span></span> </p><p><span style="color:#E56600;font-family:SimSun;font-size:14px;line-height:2;">适用范围：<span style="color:#333333;">本产品仅适用于日常家庭室内保洁，<span style="color:#E56600;font-family:SimSun;font-size:14px;line-height:2;"><span style="color:#333333;">新房开荒保洁不在服务范围</span></span><span style="color:#333333;font-family:SimSun;font-size:14px;line-height:2;"></span>，</span></span><span style="color:#333333;font-family:SimSun;font-size:14px;line-height:2;">不可用于学校、办公室、商铺\r\n、出租房、新装修房、长期未入住房、集体宿舍楼、自建房等房子类型保洁。</span> </p><p style="text-align:left;"><span style="color:#333333;font-family:SimSun;font-size:14px;line-height:2;">为了让您拥有更好的服务性价比，建议您参考以下标准进行人员预订</span> </p><p><span style="color:#333333;font-family:SimSun;font-size:14px;line-height:2;"><img src="http://img.homeking365.com/980974bf-2d02-44e4-a943-0b4b22a089d5.jpg" alt=""/><br/></span> </p><p><br/></p><p><span class="detail_item_title">宅洁士 - 标准</span></p><p><img src="http://img.homeking365.com/1cea65bf-3dd4-4dfd-bffe-4e16e0b6ef49.jpg" alt=""/><img src="http://img.homeking365.com/f89865be-a386-4d0e-94be-7b5ae0d3b3ee.jpg" alt=""/><img src="http://img.homeking365.com/81e505c0-ad62-4c1d-80bc-8c8c065d2236.jpg" alt=""/><img src="http://img.homeking365.com/4b6d8a23-6e1d-4bbb-ae9d-a4361c76b4cb.jpg" alt=""/><img src="http://img.homeking365.com/203d965e-66dc-4f70-97d5-e68260becd9c.jpg" alt=""/><img src="http://img.homeking365.com/31a75adb-4837-47d5-b5ef-189dd0312046.jpg" alt=""/><img src="http://img.homeking365.com/a6211416-921a-4025-9369-dd8c4642c3f9.jpg" alt=""/><img src="http://img.homeking365.com/d5ab4de6-b5d9-4dcf-9cf6-a7363a7e1ee1.jpg" alt=""/><img src="http://img.homeking365.com/34b15e28-d440-4b0a-8fb8-2cc96bd2e2b2.jpg" alt=""/> </p><p><br/></p><table class="ke-zeroborder" cellspacing="0" cellpadding="20" width="100"><tbody><tr class="firstRow"><td><span style="line-height:2;font-size:14px;color:#E56600;"><strong>注明：</strong></span><br/><p style="text-indent:2em;"><span style="line-height:2;"><span style="font-size:14px;"><span style="font-size:12px;color:#333333;">宅洁士服务仅适用于日常家庭基础保洁，厨柜内部（含内部陈设物品）、窗帘、字画、古董、宗教陈设、易损易碎摆件、天花板及附属品（吊灯、吊顶等）等深度服务项目，不在宅洁士保洁范围之内。如您有以上保洁需求请致电客服热线4008-954-580（家务事，我帮您！）了解相关深度保洁服务。</span> </span></span> \r\n					</p><p style="text-indent:2em;"><span style="line-height:2;"><span style="font-size:14px;"><span style="font-size:12px;color:#333333;">本服务包含擦窗服务，但清洗范围不含纱窗、百叶窗、防护窗及玻璃厚度超过26MM的双层中空超厚玻璃，如需提供以上服务请选择<a href="http://m.homeking365.com/services/360"><span style="color:#003399;">“极净亮”日式精细擦窗</span></a>。<br/></span></span></span> \r\n					</p></td></tr></tbody></table><p><br/></p><p><br/></p><p><span class="detail_item_title">宅洁士 - 工具</span></p><p><img src="http://img.homeking365.com/63c4ac9e-9faa-4028-a1ec-fe55fd40e89d.jpg" alt=""/><img src="http://img.homeking365.com/b5333ee7-4273-475a-b116-db6238ad4cbd.jpg" alt=""/></p><p><br/></p><p><br/></p><p><span class="detail_item_title">宅洁士 - 亮点</span></p><table class="ke-zeroborder" cellspacing="0" cellpadding="2" width="100"><tbody><tr class="firstRow"><td style="vertical-align:top;"><img src="http://img.homeking365.com/46ec1cbf-36f2-4925-ac34-96b094251900.png" alt=""/><br/></td><td><p><span style="color:#666666;line-height:2;font-family:SimSun;font-size:14px;">员工雇佣制 阿姨更稳定</span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;line-height:1.5;">改变传统中介式家政服务好慷</span><span style="color:#999999;font-family:SimSun;line-height:1.5;">保洁阿姨一律合同签约，</span><span style="color:#999999;font-family:SimSun;line-height:1.5;">成为旗下正式员工</span><span style="line-height:1.5;color:#999999;font-family:SimSun;">进行员工制管理；</span> \r\n				</p><p><span style="line-height:1.5;color:#999999;font-family:SimSun;">阿姨享有底薪保障与合理</span><span style="line-height:1.5;color:#999999;font-family:SimSun;">的晋升机制，优秀阿姨不</span><span style="line-height:1.5;color:#999999;font-family:SimSun;">流失，</span><span style="color:#999999;font-family:SimSun;line-height:1.5;">有效维护人员稳定性。</span> \r\n				</p><p><br/></p><p><br/></p></td></tr><tr><td style="vertical-align:top;"><img src="http://img.homeking365.com/36406c9e-1484-425c-bcb4-be21e2e63774.png" alt=""/><br/></td><td><p><span style="color:#666666;line-height:2;font-family:SimSun;font-size:14px;">4小时工作制 全程标准</span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;">4小时定量完成用户</span><span style="color:#999999;font-family:SimSun;line-height:1.5;">家庭保洁所包含的服务</span><span style="color:#999999;font-family:SimSun;line-height:1.5;">项目，不偷懒、不拖时</span><span style="color:#999999;font-family:SimSun;line-height:1.5;">，服务更加规范化。</span> \r\n				</p><p><br/></p><p><br/></p><p><br/></p></td></tr><tr><td style="vertical-align:top;"><img src="http://img.homeking365.com/eb661987-6b61-4714-8649-35c3547f6fca.png" alt=""/><br/></td><td><p><span style="color:#666666;line-height:2;font-family:SimSun;font-size:14px;">七色保洁布 分区使用更卫生</span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;line-height:1.5;">好慷在家为行业带来七色保洁布，规范化分区域使用，不同颜色、不同材质的保洁布适用于</span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;line-height:1.5;">不同区域，干湿分离、避免交叉污染，干净更卫生。</span> \r\n				</p><p><br/></p><p><br/></p></td></tr><tr><td style="text-align:left;"><br/></td><td><p><img src="http://img.homeking365.com/d3eec6d2-2b6a-4237-82d1-04a1b60bc768.png" alt="" width="100%"/> \r\n				</p><p><br/></p></td></tr><tr><td style="vertical-align:top;"><img src="http://img.homeking365.com/43be0873-3c73-4416-8a80-b63c9d126574.png" alt=""/><br/></td><td><p><span style="color:#666666;line-height:2;font-family:SimSun;font-size:14px;">专业工具组 超强清洁无死角</span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;line-height:1.5;">引进日本专业保洁</span><span style="color:#999999;font-family:SimSun;line-height:1.5;">工具组，区域使用划分</span><span style="color:#999999;font-family:SimSun;line-height:1.5;">明晰，应用多项专利技</span><span style="color:#999999;font-family:SimSun;line-height:1.5;">术，实现保洁服务无死角。</span> \r\n				</p><p><br/></p><p><br/></p></td></tr><tr><td colspan="2"><img src="http://img.homeking365.com/c7bbec3d-4b73-4a74-9210-99def00e6792.jpg" alt="" width="100%"/><br/></td></tr><tr><td style="vertical-align:top;"><img src="http://img.homeking365.com/f7bd2f86-bbeb-4540-983c-48f3a4e9cc5b.png" alt=""/><br/></td><td><p><span style="color:#666666;line-height:2;font-family:SimSun;font-size:14px;">测评上市 38万小时全国实测保障</span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;line-height:1.5;">服务体系分别引进日本山崎产业株式会社和日本BEARS家政服务集团，经中国大陆38万小时的实用测试后正式投放市场。</span> \r\n				</p><p><br/></p><p><br/></p></td></tr><tr><td><br/></td><td><img src="http://img.homeking365.com/dcc0f39c-706c-4f1d-82d6-554631312dd3.png" alt=""/><br/></td></tr><tr><td style="vertical-align:top;"><img src="http://img.homeking365.com/7284bf48-61e3-43ca-aaa1-11c66402fe32.png" alt=""/><br/></td><td><p><span style="color:#666666;line-height:2;font-family:SimSun;font-size:14px;">三重认证 人员与服务放心更可靠</span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;font-size:14px;line-height:1.5;"><span style="font-size:12px;">每位保洁人员，必须通过标准审核、三重认证方有机会正式上岗为您提供优质服务</span>。</span> \r\n				</p><p><br/></p><p><br/></p></td></tr><tr><td><br/></td><td><p><img src="http://img.homeking365.com/28ceb4e8-3091-4f03-a8eb-1b835db8012f.png" alt=""/> \r\n				</p><p><br/></p></td></tr><tr><td style="vertical-align:top;"><img src="http://img.homeking365.com/b2a0275e-b9f9-4565-9ed4-3dcd8a51e311.png" alt=""/><br/></td><td><p><span style="color:#666666;line-height:2;font-family:SimSun;font-size:14px;">统一培训 满分上岗更专业</span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;line-height:1.5;">每位员工上岗前经过80课时的培训、实操、考核；</span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;line-height:1.5;">定期为员工进行在岗培训，持续提升服务技能。</span><span style="line-height:1.5;"></span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;line-height:1.5;"><br/></span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;line-height:1.5;"><br/></span> \r\n				</p></td></tr><tr><td style="vertical-align:top;"><img src="http://img.homeking365.com/543b59e0-bb75-40cc-8fb3-6bbc05d6298e.png" alt=""/><br/></td><td><p><span style="color:#666666;font-family:SimSun;font-size:14px;line-height:2;">专注家庭日常保洁 专业水准更放心</span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;line-height:1.5;">为了更好地服务于常住家庭日常保洁，宅洁士产品不适用于新装修房拓荒保洁、公共区域、办公场所、商铺、宿舍等区域，因为专一，所以专业。</span> \r\n				</p><p><br/></p><p><br/></p><p><br/></p></td></tr><tr><td style="vertical-align:top;"><img src="http://img.homeking365.com/e49a47c8-351a-45fb-ae53-da14ed1f2844.png" alt=""/><br/></td><td><p><span style="color:#666666;line-height:2;font-family:SimSun;font-size:14px;">人性化管理 阿姨整体素质更高</span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;line-height:1.5;">一周六天，一天两次的4小时服务时间，好慷用更加人性化的机制保障阿姨休息权益，提高阿姨整体素质，提升阿姨对工作的优越感，吸引更多优秀人才进入家政服务行业。</span> \r\n				</p><p><br/></p><p><br/></p></td></tr></tbody></table><p><br/></p><p><br/></p><p><br/></p><p><span class="detail_item_title">宅洁士 - 保障</span></p><p><img src="http://img.homeking365.com/877a5cf5-9a93-4414-a394-96f077a124ce.jpg" alt=""/><img src="http://img.homeking365.com/9dd03f4a-fe88-4edb-8051-43803a482b1e.jpg" alt=""/><img src="http://img.homeking365.com/5deba2f4-55e5-4e24-bf9d-6c261eaa56be.jpg" alt=""/></p><p><br/></p><p><br/></p><p><span class="detail_item_title">星级家</span></p><p><img src="http://img.homeking365.com/f5266675-9faf-4aae-b16e-1a1173e79a7a.png" alt=""/> </p><p><a href="https://activity.homeking365.com/2017/02/star" target="_blank"><img src="http://img.homeking365.com/0af941e0-b5db-4c7d-84a7-83343e421721.png" alt=""/></a> </p><p><br/></p><p><br/></p><p><span class="detail_item_title">预定需知</span></p><table class="ke-zeroborder" cellspacing="0" cellpadding="0" align="left" width="100"><tbody><tr class="firstRow"><td style="vertical-align:top;"><p><img src="http://img.homeking365.com/68f39373-4a18-470c-b992-3026c5d365ba.png" alt=""/> \r\n				</p><p><br/></p></td><td><p><span style="line-height:1.5;color:#333333;font-family:SimSun;font-size:14px;">预定</span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;font-size:12px;line-height:1.5;">预定成功后，付款选择在线支付，服务订单会为您保留30分钟（从预定成功时间算起），30分钟后如还末付款成功，系统将自动取消该服务订单。</span> \r\n				</p><p><br/></p><p><br/></p><p><br/></p></td></tr><tr><td style="vertical-align:top;"><p><img src="http://img.homeking365.com/bd8c40e7-509d-4ec2-8d82-ea6ef826a54a.png" alt=""/> \r\n				</p><p><br/></p><p><br/></p><p><br/></p></td><td><p><span style="color:#333333;font-family:SimSun;font-size:14px;line-height:2;">更改或取消</span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;font-size:12px;line-height:1.5;">订单服务前2小时更改订单，可在“好慷在家”APP，“好慷在家公众号”个人中心-服务订单-操作更改或取消，如有其他疑问在工作时间拨打4008-954-580电话或联系在线客服。 </span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;font-size:12px;line-height:1.5;"></span> \r\n				</p><p><br/></p><p><br/></p></td></tr><tr><td style="vertical-align:top;"><p><img src="http://img.homeking365.com/9e94335a-acb4-4d8a-9843-be66e1494e7f.png" alt=""/> \r\n				</p><p><br/></p><p><br/></p></td><td><p><span style="color:#333333;font-family:SimSun;font-size:14px;line-height:2;">产生临时退改费</span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;font-size:12px;line-height:1.5;"> 1）订单服务开始前2小时内至服务开始后1小时要求更改服务时间或取消订单的; </span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;font-size:12px;line-height:1.5;">2）停水：如您未在订单服务开始前2小时致电好慷在家或在服务开始后1小时内因突发的停水导致无法服务的; </span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;font-size:12px;line-height:1.5;">3）或因您的原因导致保洁师无法入户服务，保洁师将等待1个小时后离开的。 </span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;font-size:12px;line-height:1.5;"><br/></span> \r\n				</p><p><span style="color:#999999;font-family:SimSun;font-size:12px;line-height:1.5;">以上好慷在家将向您收取50元作为临时退改费，取消您本次保洁次数，并将余款退回。 </span> \r\n				</p></td></tr></tbody></table><p><br/></p>', 1, 1499604092),
(2, 3, '金月子·星级月嫂K6 -40天服务周期', '为新妈妈及宝宝提供放心，专业的服务 ', '14996041771313.jpg', '14996041776914.jpg', '￥2000/次', NULL, '<p><span class="detail_item_title">服务产品介绍</span></p><p style="text-indent:2em;">\r\n	<span style="font-size:14px;font-family:SimSun;color:#333333;line-height:2;">金月子是好慷全新推出的星级月嫂服务，采用最科学的40天服务周期。“金月子”每位月嫂服务前都通过“金月子”首创的【3*3】认证体系考核，严格筛选出服务经验丰富合格的月嫂并首创“月子百宝箱”39件“宝贝”，让月子服务有备无患。为新妈妈及宝宝提供放心，专业的服务。</span> </p><p>\r\n	<span style="font-size:14px;font-family:SimSun;color:#333333;line-height:2;"><img src="http://img.homeking365.com/4a6c30ae-9e38-42d2-9254-8eb3cb03303e.png" alt="金月子.40天服务周期"/><br/></span> </p><p>\r\n								\r\n							\r\n								</p><p>\r\n									<span class="detail_item_title">服务适用范围</span>\r\n									</p><p style="text-indent:2em;">\r\n	<span style="font-family:SimSun;font-size:14px;line-height:2;color:#333333;">金月子分为K6、K7两种</span><span style="color:#333333;font-family:SimSun;font-size:14px;line-height:2;">产品；分别适用于不同的产妇类型。</span> </p><p style="text-indent:2em;">\r\n	<span style="font-family:SimSun;font-size:14px;line-height:2;color:#333333;">该服务属于常规孕妇服务<span style="color:#ff6699;">（不适用于小产或意外流产）<span style="color:#333333;">线上预定需支付2000元的定金（签署合同时退回）。</span></span></span> </p><p>\r\n	<img src="http://img.homeking365.com/6b33cf11-6e40-43d4-a086-d068401abfdb.jpg" alt="为了您得到更好的服务，请你提前预定"/> </p><p style="text-align:center;">\r\n	<img src="https://img.homeking365.com/95c1b23f-246e-4c15-9571-15ad45bca93a.jpg" alt=""/> </p><p>\r\n	<span style="font-family:SimSun;font-size:14px;line-height:2;color:#333333;"><br/></span> </p><p>\r\n								</p><p>\r\n							\r\n								</p><p>\r\n									<span class="detail_item_title">服务优势</span>\r\n									</p><p><img src="http://img.homeking365.com/803823da-0c05-4bda-930a-cbbed9c3737c.jpg" alt="星级月嫂.更专业"/><img src="http://img.homeking365.com/2fdccabe-0daa-4eb7-94c3-9b68e30a1bd9.jpg" alt="40天服务周期.更科学"/><img src="http://img.homeking365.com/3e349f8e-857c-4c24-87c5-708a016f0c7c.jpg" alt="私人定制服务方案.更放心"/><img src="http://img.homeking365.com/46b3a3da-3af5-40fa-a429-e24a822e49b9.jpg" alt="专业乳房护理，更健康"/><img src="http://img.homeking365.com/4a609550-f852-4cff-b373-9e47ca7ce40a.jpg" alt="产前到府服务，更舒心"/><img src="http://img.homeking365.com/9812ab71-b338-4520-90ac-67360e2982c8.jpg" alt="母婴顾问服务，更安心"/><img src="http://img.homeking365.com/b3ab392e-d226-44e9-b0f1-765c4131c104.jpg" alt="月子百宝箱，更周到"/></p><p>\r\n								</p><p>\r\n							\r\n								</p><p>\r\n									<span class="detail_item_title">服务特点</span>\r\n									</p><p><img src="https://img.homeking365.com/87adbeb3-9177-4e74-acae-5a3810af0300.jpg" alt=""/></p><p>\r\n								</p><p>\r\n							\r\n								</p><p>\r\n									<span class="detail_item_title">服务内容</span>\r\n									</p><p><img src="https://img.homeking365.com/76bcc92d-4d31-4f8c-a16a-f24462030fa2.jpg" alt=""/></p><p>\r\n								</p><p>\r\n							\r\n								</p><p>\r\n									<span class="detail_item_title">服务保障</span>\r\n									</p><p><img src="http://img.homeking365.com/12ef6e70-e112-484a-8ba0-5c42c12e9e29.jpg" alt="服务保障"/></p><p>\r\n								</p><p><br/></p>', 2, 1499604177),
(3, 5, '星级家·A6无忧生活 -保洁包年 -套餐', '全年每周一次日式居家保洁 ', '14996042398374.jpg', '14996042398409.jpg', '￥9999/套', NULL, '<p><span class="detail_item_title">星级家 - 套餐</span></p><p>\r\n	<img src="http://img.homeking365.com/ff88e8c6-838e-4f88-8f21-9b8842262fb5.jpg" alt=""/> </p><p>\r\n	<br/></p><p>\r\n	<img src="https://img.homeking365.com/aec6ce53-c48c-4fff-83b5-52ec8b6d3bec.jpg" alt=""/> </p><p>\r\n								\r\n							\r\n								</p><p>\r\n									<span class="detail_item_title">星级家 - 概述</span>\r\n									</p><p><img src="https://img.homeking365.com/c02f9f77-a316-4c7e-859d-8643a200b8f7.jpg" alt=""/> <img src="https://img.homeking365.com/9b0238af-878d-4eca-9903-d10177d459ad.jpg" alt=""/></p><p><br/></p>', 99, 1499604239),
(4, 3, '金月子-星级月嫂K1 -14天服务周期', '小月子也要坐月子、适用于小产或意外流产 ', '14996043163337.jpg', '14996043165834.jpg', '￥1000/次', NULL, '<p><span class="detail_item_title">服务产品介绍</span></p><p style="text-indent:2em;">\r\n	<span style="font-size:14px;font-family:SimSun;color:#333333;line-height:2;">金月子是好慷全新推出的星级月嫂服务，采用最科学的14天服务周期。“金月子”每位月嫂服务前都通过“金月子”首创的【3*3】认证体系考核，严格筛选出服务经验丰富合格的月嫂并首创“月子百宝箱”39件“宝贝”，让月子服务有备无患。为新妈妈提供放心，专业的服务。</span> </p><p>\r\n	<img src="http://img.homeking365.com/af5e9b25-5231-40bf-9348-8752ec72ca59.png" alt=""/> </p><p>\r\n								\r\n							\r\n								</p><p>\r\n									<span class="detail_item_title">服务适用范围</span>\r\n									</p><p style="text-indent:2em;">\r\n	<span style="font-family:SimSun;font-size:14px;line-height:2;color:#333333;">金月子分为K6、K7、K1三种</span><span style="color:#333333;font-family:SimSun;font-size:14px;line-height:2;">产品；分别适用于不同的产妇类型。</span> </p><p style="text-indent:2em;">\r\n	<span style="font-family:SimSun;font-size:14px;line-height:2;">该服务金月子K1服务<span style="color:#333333;font-family:SimSun;font-size:14px;line-height:28px;">小产或意外流产</span><span style="color:#FF6699;"><span style="color:#333333;"></span>（不适用于常规孕妇</span>）<span style="color:#333333;">线上预定需支付1000元定金<span style="color:#333333;font-family:SimSun;font-size:14px;line-height:28px;">（签署合同时退回）</span>。</span></span> </p><p>\r\n	<img src="https://img.homeking365.com/def5f965-e668-4b2c-abb7-18016ebaee22.jpg" alt=""/> </p><p>\r\n								</p><p>\r\n							\r\n								</p><p>\r\n									<span class="detail_item_title">服务优势</span>\r\n									</p><p><img src="http://img.homeking365.com/d9043f66-4d5c-44e9-98ac-2b6677e46c39.jpg" alt="星级月嫂，更专业"/><img src="http://img.homeking365.com/761d0172-f9ab-474e-b858-5361ebf881f3.jpg" alt="14天服务周期.更科学"/><img src="http://img.homeking365.com/cc1f06d3-0bc5-4b3b-b807-f17cf9b84308.jpg" alt="私人制定服务方案.更放心"/><img src="http://img.homeking365.com/877b8859-8d13-438d-90c3-daf75372eed8.jpg" alt="专业乳房护理，更健康"/><img src="http://img.homeking365.com/03aadf68-a948-4fb9-8917-7e6558f241cc.jpg" alt="手术陪护服务.更贴心"/><img src="http://img.homeking365.com/90d1563f-9036-46ad-b64d-e85586ce3a00.jpg" alt="客户隐私保护.更秘密"/><img src="http://img.homeking365.com/8f658613-7a1e-4dd9-817e-67789a2874cd.jpg" alt="月子百宝箱，更周到"/></p><p>\r\n								</p><p>\r\n							\r\n								</p><p>\r\n									<span class="detail_item_title">服务特点</span>\r\n									</p><p><img src="https://img.homeking365.com/307811e4-b245-46f5-9d3d-5becd3a209e2.jpg" alt=""/><br/></p><p>\r\n								</p><p>\r\n							\r\n								</p><p>\r\n									<span class="detail_item_title">服务内容</span>\r\n									</p><p><br/></p><table width="390">\r\n	<tbody>\r\n		<tr class="firstRow">\r\n			<td style="border:0.5000pt solid #000000;" width="96" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;"><strong>手术陪同</strong></span><span style="font-size:10.5000pt;font-family:&#39;Calibri&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="95" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;">医护陪同</span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="328" valign="center">\r\n				<p class="p0">\r\n					<span style="font-size:9pt;font-family:微软雅黑;color:#333333;line-height:2;">根据预约手术时间，全程医院陪护；</span><span style="font-size:9.0000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="border:0.5000pt solid #000000;" width="96" valign="center"><br/></td>\r\n			<td style="border:0.5000pt solid #000000;" width="95" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;">挂号取号</span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="328" valign="center">\r\n				<p class="p0">\r\n					<span style="font-size:9pt;font-family:微软雅黑;color:#333333;line-height:2;">关于医院的一些必要代领资料工作</span><span style="font-size:9.0000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="border:0.5000pt solid #000000;" width="96" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;"><strong>产妇护理</strong></span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="95" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;">擦身</span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="328" valign="center">\r\n				<p class="p0">\r\n					<span style="font-size:9pt;font-family:微软雅黑;color:#333333;line-height:2;">采用科学依据“不能盆浴不用冷水”原则，准备月子水及物品，调节室温为产妇做全身清洁</span><span style="font-size:9.0000pt;font-family:&#39;Calibri&#39;;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="border:0.5000pt solid #000000;" width="96" valign="center"><br/></td>\r\n			<td style="border:0.5000pt solid #000000;" width="95" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;">洗头</span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="328" valign="center">\r\n				<p class="p0">\r\n					<span style="font-size:9pt;font-family:微软雅黑;color:#333333;line-height:2;">以卫生科学的方法，准备月子水及物品，调节室温为产妇做头部清洁</span><span style="font-size:9.0000pt;font-family:&#39;Calibri&#39;;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="border:0.5000pt solid #000000;" width="96" valign="center"><br/></td>\r\n			<td style="border:0.5000pt solid #000000;" width="95" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;">衣物清洗</span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="328" valign="center">\r\n				<p class="p0">\r\n					<span style="font-size:9pt;font-family:微软雅黑;color:#333333;line-height:2;">产妇的衣物洗凉及归类存放</span><span style="font-size:9.0000pt;font-family:&#39;Calibri&#39;;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="border:0.5000pt solid #000000;" width="96" valign="center"><br/></td>\r\n			<td style="border:0.5000pt solid #000000;" width="95" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;">测量体温</span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="328" valign="center">\r\n				<p class="p0">\r\n					<span style="font-size:9pt;font-family:微软雅黑;color:#333333;line-height:2;">熟练掌握各种体温计的使用方法，做到产妇身体异常情况早发现；</span><span style="font-size:9.0000pt;font-family:&#39;Calibri&#39;;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="border:0.5000pt solid #000000;" width="96" valign="center"><br/></td>\r\n			<td style="border:0.5000pt solid #000000;" width="95" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;">会阴冲洗</span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="328" valign="center">\r\n				<p class="p0">\r\n					<span style="font-size:9pt;font-family:微软雅黑;color:#333333;line-height:2;">在恶露及淤血干净前，用正确消毒顺序冲洗会阴部</span><span style="font-size:9.0000pt;font-family:&#39;Calibri&#39;;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="border:0.5000pt solid #000000;" width="96" valign="center"><br/></td>\r\n			<td style="border:0.5000pt solid #000000;" width="95" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;">乳房护理</span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="328" valign="center">\r\n				<p class="p0">\r\n					<span style="font-size:9pt;font-family:微软雅黑;color:#333333;line-height:2;">采用热敷、按摩的方式保持乳腺经络通畅，避免刚开始发育的乳腺突然停止生长所带来的乳房肿块及乳房疼痛</span><span style="font-size:9.0000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="border:0.5000pt solid #000000;" width="96" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;"><strong>月子餐</strong></span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="95" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;">排毒餐</span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="328" valign="center">\r\n				<p class="p0">\r\n					<span style="font-size:9pt;font-family:微软雅黑;color:#333333;line-height:2;">以“生化饮”代谢排毒的配餐，使其恶露及淤血尽早排出；</span><span style="font-size:9.0000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="border:0.5000pt solid #000000;" width="96" valign="center"><br/></td>\r\n			<td style="border:0.5000pt solid #000000;" width="95" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;">调理餐</span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="328" valign="center">\r\n				<p class="p0">\r\n					<span style="font-size:9pt;font-family:微软雅黑;color:#333333;line-height:2;">以温补中气的饮食制作，增强机体对疾病的抵抗力，促进受损器官的早日修复；</span><span style="font-size:9.0000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="border:0.5000pt solid #000000;" width="96" valign="center"><br/></td>\r\n			<td style="border:0.5000pt solid #000000;" width="95" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;">进补餐</span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="328" valign="center">\r\n				<p class="p0">\r\n					<span style="font-size:9pt;font-family:微软雅黑;color:#333333;line-height:2;">以高蛋白及荤素搭配的大补方法，加快身体的康复；</span><span style="font-size:9.0000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="border:0.5000pt solid #000000;" width="96" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;"><strong>24H陪护</strong></span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="95" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;">夜间照顾</span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="328" valign="center">\r\n				<p class="p0">\r\n					<span style="font-size:9pt;font-family:微软雅黑;color:#333333;line-height:2;">异常情况监护，夜间起居照顾；</span><span style="font-size:9.0000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="border:0.5000pt solid #000000;" width="96" valign="center"><br/></td>\r\n			<td style="border:0.5000pt solid #000000;" width="95" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;">散步聊天</span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="328" valign="center">\r\n				<p class="p0">\r\n					<span style="font-size:9pt;font-family:微软雅黑;color:#333333;line-height:2;">保持产妇的心情及必要简单的身体舒展，有利于恢复；</span><span style="font-size:9.0000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="border:0.5000pt solid #000000;" width="96" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;"><strong>环境保洁</strong></span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="95" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;">居家保洁</span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="328" valign="center">\r\n				<p class="p0">\r\n					<span style="font-size:9pt;font-family:微软雅黑;color:#333333;line-height:2;">卧室、卫生间、厨房日常保洁；</span><span style="font-size:9.0000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="border:0.5000pt solid #000000;" width="96" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;"><strong>百宝箱</strong></span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="95" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;">服务用品</span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="328" valign="center">\r\n				<p class="p0">\r\n					<span style="font-size:9pt;font-family:微软雅黑;color:#333333;line-height:2;">金月子服务用品，包含“孕妇用品”、“婴儿用品”；</span><span style="font-size:9.0000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="border:0.5000pt solid #000000;" width="96" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;"><strong>服务保障</strong></span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="95" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;">专业保险</span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="328" valign="center">\r\n				<p class="p0">\r\n					<span style="font-size:9pt;font-family:微软雅黑;color:#333333;line-height:2;">包含“职业责任险”及“雇主责任险”，为全程产妇、月嫂在服务过程中提供必要的安全保障。</span><span style="font-size:9.0000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="border:0.5000pt solid #000000;" width="96" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;"><strong>保密协议</strong></span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="95" valign="center">\r\n				<p class="p0" style="text-align:center;">\r\n					<span style="font-size:10.5pt;font-family:微软雅黑;color:#333333;line-height:2;">保密合同</span><span style="font-size:10.5000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n			<td style="border:0.5000pt solid #000000;" width="328" valign="center">\r\n				<p class="p0">\r\n					<span style="font-size:9pt;font-family:微软雅黑;color:#333333;line-height:2;">我们将用户信息的保密视为服务的最基本要求，绝对尊重客户的任何私人隐私。服务完成删除所有信息。</span><span style="font-size:9.0000pt;font-family:&#39;微软雅黑&#39;;"></span> \r\n				</p>\r\n			</td>\r\n		</tr>\r\n	</tbody></table><p><span style="color:#333333;line-height:2;"></span><br/><br/></p><p>\r\n								</p><p>\r\n							\r\n								</p><p>\r\n									<span class="detail_item_title">服务保障</span>\r\n									</p><p><img src="http://img.homeking365.com/12ef6e70-e112-484a-8ba0-5c42c12e9e29.jpg" alt="服务保障"/></p><p><br/></p>', 99, 1499604316),
(5, 5, '星级家·A4自由生活 -保洁包年 -套餐', '全年两周一次日式居家保洁 ', '14996043847063.jpg', '14996043844975.jpg', '￥5199/套', NULL, '<p><span class="detail_item_title">星级家 - 套餐</span></p><p>\r\n	<img src="http://img.homeking365.com/3574496c-ce65-4fa1-921b-d78215d38e01.jpg" alt=""/> </p><p>\r\n	<img src="https://img.homeking365.com/3877b17c-c86c-4762-bee1-498a2d29c2fe.jpg" alt=""/> </p><p>\r\n	<br/></p><p>\r\n								\r\n							\r\n								</p><p>\r\n									<span class="detail_item_title">星级家 - 概述</span>\r\n									</p><p><img src="https://img.homeking365.com/c02f9f77-a316-4c7e-859d-8643a200b8f7.jpg" alt=""/> <img src="https://img.homeking365.com/9b0238af-878d-4eca-9903-d10177d459ad.jpg" alt=""/></p><p><br/></p>', 99, 1499604384);

-- --------------------------------------------------------

--
-- 表的结构 `you_user`
--

CREATE TABLE IF NOT EXISTS `you_user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(64) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `bind_account` varchar(50) NOT NULL,
  `last_login_time` int(11) unsigned DEFAULT '0',
  `last_login_ip` varchar(40) DEFAULT NULL,
  `login_count` mediumint(8) unsigned DEFAULT '0',
  `verify` varchar(32) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `type_id` tinyint(2) unsigned DEFAULT '0',
  `info` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `you_user`
--

INSERT INTO `you_user` (`id`, `account`, `nickname`, `password`, `bind_account`, `last_login_time`, `last_login_ip`, `login_count`, `verify`, `email`, `remark`, `create_time`, `update_time`, `status`, `type_id`, `info`) VALUES
(1, 'admin', '管理员', '21232f297a57a5a743894a0e4a801fc3', '', 1495029150, NULL, 1355, '8888', 'liu21st@gmail.com', '备注信息', 1222907803, 1326266696, 1, 0, ''),
(35, 'root', 'root', '21232f297a57a5a743894a0e4a801fc3', '', 1487559355, NULL, 4, NULL, '', '', 0, 0, 1, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
