-- ----------------------------
-- 日期：2018-08-13 15:42:30
-- MySQL - 5.5.53-MariaDB : Database - blog
-- ----------------------------

CREATE DATAbase IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 ;

USE `blog`;

-- ----------------------------
-- Table structure for `ll_admin_user`
-- ----------------------------

DROP TABLE IF EXISTS `ll_admin_user`;

CREATE TABLE `ll_admin_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_time` datetime NOT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `last_login_ip` char(15) DEFAULT NULL,
  `group_id` smallint(1) NOT NULL,
  `img` varchar(100) DEFAULT NULL COMMENT '头像',
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  `update_time` datetime DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `ll_admin_user`
-- ----------------------------

INSERT INTO `ll_admin_user` VALUES ('1', '', 'hsadmin', '$2y$10$LkjUJkdHvHl1nLewmbyY4OApnRgun7omUiEHpIo7AXuITsRJYBxbu', '1', '2018-05-27 00:00:00', '2018-08-13 11:44:42', '127.0.0.1', '1', NULL, NULL, '2018-08-13 11:44:42', NULL);
INSERT INTO `ll_admin_user` VALUES ('2', '', 'admin', '$2y$10$fhz2FPk4XTrGobHEbcN/tOsQshwridIqmwSsilCtoYu47lxCLa7zW', '1', '0000-00-00 00:00:00', '2018-06-08 15:00:20', '127.0.0.1', '1', '', NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `ll_admin_user` VALUES ('3', 'dd的', 'adminlzy', '$2y$10$6P/cJZFLlm1z.09ueyY3jOP1l7oW9PbKZrpM3thXLUVZayoUm6QpS', '1', '0000-00-00 00:00:00', NULL, NULL, '1', NULL, '2018-06-11 15:08:27', '2018-06-11 15:08:27', '0000-00-00 00:00:00');
INSERT INTO `ll_admin_user` VALUES ('5', '', 'admincs', '$2y$10$.3X.gHZuVPaRkB/w7nXGDOq9edOotgiO2CDWMD5W2i5NyvaPk9Ttu', '1', '0000-00-00 00:00:00', NULL, NULL, '1', NULL, '2018-06-11 18:08:47', '2018-06-11 18:08:47', '2018-06-11 15:10:20');

-- ----------------------------
-- Table structure for `ll_ads`
-- ----------------------------

DROP TABLE IF EXISTS `ll_ads`;

CREATE TABLE `ll_ads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nid` tinyint(1) NOT NULL COMMENT '分类id',
  `title` varchar(50) NOT NULL COMMENT '名称',
  `content` varchar(255) DEFAULT NULL COMMENT '说明',
  `link` varchar(255) DEFAULT NULL COMMENT '链接',
  `target` varchar(10) NOT NULL COMMENT '打开方式',
  `img_url` varchar(100) DEFAULT NULL,
  `json_arr` text,
  `is_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1显示',
  `sort` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `add_time` datetime NOT NULL,
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='轮播，广告图';

-- ----------------------------
-- Data for the table `ll_ads`
-- ----------------------------

INSERT INTO `ll_ads` VALUES ('1', '1', '回声营销小程序', '建立企业、个人专门名片，提升品牌影响力
全名营销+智能销售+数据化管理等
推进业绩增长实现企业倍收', '', '_self', '/uploads/banner/20180530/f24dcbb8d2be0c8a13dcd1e7180aa377.png', NULL, '1', '0', '2018-05-30 13:45:11', NULL);

-- ----------------------------
-- Table structure for `ll_article`
-- ----------------------------

DROP TABLE IF EXISTS `ll_article`;

CREATE TABLE `ll_article` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) DEFAULT NULL,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `img_url` varchar(200) DEFAULT NULL COMMENT '图片',
  `abstract` varchar(300) DEFAULT NULL COMMENT '文章摘要',
  `content` text COMMENT '文章内容',
  `is_show` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1显示，0隐藏',
  `is_index` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1推荐',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序值',
  `create_time` datetime DEFAULT NULL COMMENT '添加时间',
  `update_time` datetime DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='小程序案例';

-- ----------------------------
-- Data for the table `ll_article`
-- ----------------------------

INSERT INTO `ll_article` VALUES ('1', '7', '测试', '/uploads/images/article/20180725/b4847095719b0ca78c2bd7aa77da72ec.png', '方法方法服务网', 'gefwdwddddddddddddddddddddddddddddddd 
fefffffffffffffffffff
fefe
feffew
dwdq
![多次](https://ws2.sinaimg.cn/large/bfd7fcfcgy1ftl4lfurwoj206q06rdfm.jpg)

dwqdqw
fwf
ghrggrg
ege
', '1', '0', '0', '2018-07-25 15:54:43', '2018-08-09 17:03:54', NULL);
INSERT INTO `ll_article` VALUES ('2', '7', 'vvre', '/uploads/images/article/20180725/d032604caf6aca84543860bd5b63ae8d.png', 'hreeeeegerrrrrrge', '', '1', '0', '0', '2018-07-25 16:37:57', '2018-08-09 17:03:54', NULL);
INSERT INTO `ll_article` VALUES ('3', '15', 'gggggggggggggggg', '/uploads/images/article/20180725/c99dc8d634edcf0a3ecb497064d74381.png', 'ddddddddddddddddddddddddd', 'gefwdwddddddddddddddddddddddddddddddd 
fefffffffffffffffffff
fefe
feffew
dwdq
![多次](https://ws2.sinaimg.cn/large/bfd7fcfcgy1ftl4lfurwoj206q06rdfm.jpg)

dwqdqw
fwf
ghrggrgewfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
egeddwwfffeefgggggggggggggggggggggggggggg
', '1', '0', '0', '2018-07-25 16:39:57', '2018-08-09 17:03:54', '2018-08-09 17:03:54');
INSERT INTO `ll_article` VALUES ('4', '7', '测试', '/uploads/images/article/20180725/b4847095719b0ca78c2bd7aa77da72ec.png', '方法方法服务网', '', '1', '0', '0', '2018-07-27 18:22:24', '2018-08-09 17:03:54', '2018-08-09 17:03:54');
INSERT INTO `ll_article` VALUES ('5', '6', '分为非服个软', '/uploads/images/article/20180730/a95419ee0d97e344ca64ae9de9bcd337.png', '风格', '第五位无无无无访问', '1', '0', '0', '2018-07-27 18:25:55', '2018-08-09 17:03:54', '2018-08-09 17:03:54');
INSERT INTO `ll_article` VALUES ('6', '6', '44', '/uploads/images/article/20180730/648019665c3175546e08e1af3cb5860b.png', 'fgewgffw风格', 'fwewewewewewewewewewe
>fffefesfsf
>gregregreg
>hgrege

fewfw

`dwdawdadavrrrg
fwefewfew`

feffe
```
dwdadddddddddddddddd
gegggggggggggggh

4
fefs
```', '1', '0', '0', '2018-07-30 10:46:14', '2018-08-09 17:03:54', '2018-08-09 17:03:54');

-- ----------------------------
-- Table structure for `ll_auth_group`
-- ----------------------------

DROP TABLE IF EXISTS `ll_auth_group`;

CREATE TABLE `ll_auth_group` (
  `id` smallint(1) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(255) DEFAULT NULL COMMENT '权限规则id',
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `ll_auth_group`
-- ----------------------------

INSERT INTO `ll_auth_group` VALUES ('1', '超级管理组', '1', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_group` VALUES ('2', '管理员', '1', '1,5,8,9,10,6,11,7,12,13,14,2,3,4,15,16,17,18,20,28,29,32,30,31,21,22,23,25,26,27,33,34,35,36', NULL, NULL, '2018-06-29 11:05:51');
INSERT INTO `ll_auth_group` VALUES ('3', '测试组', '1', '1,5,8,9,10,6,11,7,12,13,14,2,3,4,15,16,17,18,20,28,29,32,30,31,21,22,23,25,26,27,33,34,35,36', '2018-06-08 18:25:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `ll_auth_rule`
-- ----------------------------

DROP TABLE IF EXISTS `ll_auth_rule`;

CREATE TABLE `ll_auth_rule` (
  `id` smallint(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1显示',
  `pid` smallint(1) NOT NULL DEFAULT '0',
  `icon` varchar(50) DEFAULT NULL COMMENT '图标',
  `sort` int(1) unsigned NOT NULL DEFAULT '0',
  `condition` varchar(255) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='后台菜单';

-- ----------------------------
-- Data for the table `ll_auth_rule`
-- ----------------------------

INSERT INTO `ll_auth_rule` VALUES ('1', '', '平台', '1', '0', '', '0', NULL, NULL, NULL, '2018-06-21 14:45:17');
INSERT INTO `ll_auth_rule` VALUES ('2', '', '菜单', '1', '0', NULL, '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('3', '', '后台菜单', '1', '2', 'layui-icon-more', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('4', 'sysmenu/index', '菜单管理', '1', '3', NULL, '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('5', '', '系统配置', '1', '1', 'layui-icon-set', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('6', '', '职员管理', '1', '1', 'layui-icon-user', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('7', '', '角色管理', '1', '1', 'layui-icon-group', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('8', 'index/webSite', '站点动态', '1', '5', '', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('9', 'index/siteConfig', '站点配置', '1', '5', '', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('10', 'index/changePassword', '修改密码', '1', '5', '', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('11', 'sysadmin/index', '管理员', '1', '6', '', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('12', 'sysadmin/group_index', '角色列表', '1', '7', '', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('13', 'sysadmin/group_add', '添加角色', '1', '7', '', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('14', 'sysadmin/auth', '授权', '0', '7', '', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('15', 'sysmenu/add', '添加菜单', '1', '3', '', '0', NULL, NULL, NULL, '2018-06-21 15:46:25');
INSERT INTO `ll_auth_rule` VALUES ('16', '', '导航管理', '1', '2', 'layui-icon-menu-fill', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('17', 'webnav/index', '导航列表', '1', '16', '', '0', NULL, NULL, NULL, '2018-06-21 15:46:43');
INSERT INTO `ll_auth_rule` VALUES ('18', 'webnav/add', '添加导航', '1', '16', '', '0', NULL, '2018-07-03 14:56:03', NULL, '2018-07-03 14:56:03');
INSERT INTO `ll_auth_rule` VALUES ('20', '', '内容', '1', '0', '', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('21', '', '扩展', '1', '0', '', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('22', '', '轮播管理', '1', '21', 'layui-icon-carousel', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('23', 'webads/index', '轮播图管理', '1', '22', '', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('25', '', '友情链接', '1', '21', 'layui-icon-link', '0', NULL, NULL, NULL, '2018-06-21 14:54:19');
INSERT INTO `ll_auth_rule` VALUES ('26', 'weblink/index', '友链列表', '1', '25', '', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('27', 'weblink/add', '添加链接', '1', '25', '', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('28', '', '文章管理', '1', '20', '', '0', NULL, NULL, NULL, '2018-07-17 10:46:58');
INSERT INTO `ll_auth_rule` VALUES ('29', 'webarticle/index', '文章列表', '1', '28', '', '0', NULL, NULL, NULL, '2018-07-17 10:49:02');
INSERT INTO `ll_auth_rule` VALUES ('30', '', '常见问题', '1', '20', 'layui-icon-help', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('31', 'webfaq/index', '问题列表', '1', '30', '', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('32', 'webarticle/rb', '文章回收站', '1', '28', '', '0', NULL, NULL, NULL, '2018-07-17 10:50:50');
INSERT INTO `ll_auth_rule` VALUES ('33', '', '网站图片', '1', '21', 'layui-icon-picture-fine', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('34', 'hsimages/index', '网站图片', '1', '33', '', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('35', '', '备份/恢复', '1', '21', 'layui-icon-code-circle', '0', NULL, NULL, NULL, NULL);
INSERT INTO `ll_auth_rule` VALUES ('36', 'database/index', '备份列表', '1', '35', '', '0', NULL, NULL, NULL, '2018-08-09 17:45:12');
INSERT INTO `ll_auth_rule` VALUES ('37', 'webnav/add', '添加导航', '1', '16', '', '0', NULL, NULL, '2018-07-03 15:59:04', '2018-07-16 13:57:22');

-- ----------------------------
-- Table structure for `ll_faq`
-- ----------------------------

DROP TABLE IF EXISTS `ll_faq`;

CREATE TABLE `ll_faq` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL COMMENT '问题类型',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `content` text COMMENT '内容',
  `is_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1显示，0隐藏',
  `sort` int(10) NOT NULL DEFAULT '0',
  `add_time` datetime NOT NULL,
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `ll_faq`
-- ----------------------------

INSERT INTO `ll_faq` VALUES ('1', '1', '怎么注册小程序，能省 300 元！', '但如果你暂时还没有注册小程序，无论你本身是否有公众号，依然都需要在公众平台重新注册小程序帐户，才能拥有自己的小程序。不过，如果你已经拥有一个认证过的公众号，那么微信已为你提供「快速注册小程序」的入口，无需重新进行繁琐申请，同时省去约300 元的认证费用。 那么，公众号如何快速注册、认证小程序？请点击下面链接。', '1', '0', '2018-05-30 19:48:48', NULL);

-- ----------------------------
-- Table structure for `ll_link`
-- ----------------------------

DROP TABLE IF EXISTS `ll_link`;

CREATE TABLE `ll_link` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(1) NOT NULL DEFAULT '0',
  `add_time` datetime NOT NULL,
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='友情链接';

-- ----------------------------
-- Data for the table `ll_link`
-- ----------------------------

-- ----------------------------
-- Table structure for `ll_nav`
-- ----------------------------

DROP TABLE IF EXISTS `ll_nav`;

CREATE TABLE `ll_nav` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `target` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(1) unsigned NOT NULL DEFAULT '0',
  `content` text,
  `nav_cid` tinyint(3) DEFAULT '0',
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='前台导航';

-- ----------------------------
-- Data for the table `ll_nav`
-- ----------------------------

INSERT INTO `ll_nav` VALUES ('1', '0', '网站导航', '', '', '', '_self', '1', '0', '', '0', NULL, NULL, NULL);
INSERT INTO `ll_nav` VALUES ('2', '1', '首页', '', 'index/index', '', '_self', '1', '0', '', '1', NULL, NULL, '2018-07-17 16:10:48');
INSERT INTO `ll_nav` VALUES ('3', '1', '成功案例', '', 'cases/index', '', '_self', '1', '0', '', '1', NULL, NULL, NULL);
INSERT INTO `ll_nav` VALUES ('4', '1', '新闻资讯', '', 'news/index', '', '_self', '1', '0', '', '1', NULL, NULL, NULL);
INSERT INTO `ll_nav` VALUES ('5', '0', '文章分类', '', '', '', '_self', '1', '0', '', '0', NULL, NULL, NULL);
INSERT INTO `ll_nav` VALUES ('6', '5', 'PHP', '', '', '', '_self', '1', '0', '', '5', NULL, NULL, '2018-07-17 11:23:07');
INSERT INTO `ll_nav` VALUES ('7', '5', 'JS', '', '', '', '_self', '1', '0', '', '5', NULL, NULL, '2018-07-17 11:23:37');
INSERT INTO `ll_nav` VALUES ('8', '2', '营销小程序', '', 'fa/yx', '', '_self', '1', '0', '', '1', '2018-07-17 09:50:16', NULL, '2018-07-17 09:50:16');
INSERT INTO `ll_nav` VALUES ('9', '2', '电商小程序', '', 'fa/ds', '', '_self', '1', '0', '', '1', NULL, NULL, '2018-07-17 16:11:18');
INSERT INTO `ll_nav` VALUES ('10', '2', '餐饮小程序', '', 'fa/cy', '', '_self', '1', '0', '', '1', NULL, NULL, NULL);
INSERT INTO `ll_nav` VALUES ('12', '0', '标签', '', '', '', '_self', '1', '0', '', '0', NULL, NULL, NULL);
INSERT INTO `ll_nav` VALUES ('13', '12', 'PHP函数', '', '', '', '_self', '1', '0', '', '12', NULL, NULL, '2018-07-17 11:24:30');
INSERT INTO `ll_nav` VALUES ('14', '12', '浏览器设置', '', '', '', '_self', '1', '0', '', '12', NULL, '2018-07-17 09:49:32', '2018-07-17 11:24:48');
INSERT INTO `ll_nav` VALUES ('15', '5', '浏览器', '', '', '', '_self', '1', '0', '', '5', NULL, '2018-07-17 11:23:57', '2018-07-17 11:23:57');
INSERT INTO `ll_nav` VALUES ('16', '12', '查漏', '', '', '', '_self', '1', '0', '', '12', NULL, '2018-07-17 11:25:20', '2018-07-17 11:25:30');

-- ----------------------------
-- Table structure for `ll_system`
-- ----------------------------

DROP TABLE IF EXISTS `ll_system`;

CREATE TABLE `ll_system` (
  `id` smallint(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Data for the table `ll_system`
-- ----------------------------

INSERT INTO `ll_system` VALUES ('1', 'site_config', 'a:8:{s:10:"site_title";s:30:"回声网络小程序B2C商城";s:9:"seo_title";s:30:"回声网络小程序B2C商城";s:11:"seo_keyword";s:30:"回声网络小程序B2C商城";s:15:"seo_description";s:30:"回声网络小程序B2C商城";s:14:"site_copyright";s:12:"网站版权";s:8:"site_icp";s:22:"ICP备案12038328号-1";s:10:"img_resize";s:2:"on";s:14:"img_resize_opt";s:1:"2";}');
INSERT INTO `ll_system` VALUES ('2', 'email_config', 'a:6:{s:6:"sender";s:0:"";s:4:"smtp";s:0:"";s:9:"loginname";s:0:"";s:8:"password";s:0:"";s:8:"address1";s:0:"";s:8:"address2";s:0:"";}');

