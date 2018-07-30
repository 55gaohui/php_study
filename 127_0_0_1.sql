-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-07-30 08:41:09
-- 服务器版本： 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--
CREATE DATABASE IF NOT EXISTS `cms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- 表的结构 `cms_level`
--

DROP TABLE IF EXISTS `cms_level`;
CREATE TABLE IF NOT EXISTS `cms_level` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '//等级编号',
  `level_name` varchar(20) NOT NULL COMMENT '//等级名称',
  `level_info` varchar(200) DEFAULT NULL COMMENT '//等级说明',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cms_level`
--

INSERT INTO `cms_level` (`id`, `level_name`, `level_info`) VALUES
(1, '超级管理员', '最高权限'),
(2, '普通管理员', '除了删除管理员，其他操作都可以'),
(3, '发帖专员', '只限于发帖，无法进行其他操作'),
(4, '回帖专员', '只限于回帖，无法进行其他操作'),
(6, '后台游客', '只限于查看后台的界面功能'),
(15, '会员专员', '可以参与评论');

-- --------------------------------------------------------

--
-- 表的结构 `cms_manage`
--

DROP TABLE IF EXISTS `cms_manage`;
CREATE TABLE IF NOT EXISTS `cms_manage` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '//编号',
  `admin_user` varchar(20) NOT NULL COMMENT '//管理员账号',
  `admin_pass` char(40) NOT NULL COMMENT '//管理员密码',
  `level` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '//管理员等级',
  `login_count` smallint(5) NOT NULL DEFAULT '0' COMMENT '//管理员登陆次数',
  `last_ip` varchar(20) NOT NULL DEFAULT '000.000.000.000' COMMENT '//最后登录IP',
  `last_time` datetime DEFAULT NULL COMMENT '//最后登录时间',
  `reg_time` datetime NOT NULL COMMENT '//注册时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cms_manage`
--

INSERT INTO `cms_manage` (`id`, `admin_user`, `admin_pass`, `level`, `login_count`, `last_ip`, `last_time`, `reg_time`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 4, '::1', '2018-07-30 08:17:14', '2018-05-23 00:00:00'),
(2, '海关', 'dd5fef9c1c1da1394d6d34b248c51be2ad740840', 3, 0, '000.000.000.000', '2018-05-31 00:00:00', '2018-05-30 00:00:00'),
(3, '你好', 'dd5fef9c1c1da1394d6d34b248c51be2ad740840', 1, 0, '000.000.000.000', '2018-05-31 00:00:00', '2018-05-25 00:00:00'),
(6, '的点点滴滴', '7c4a8d09ca3762af61e59520943dc26494f8941b', 6, 0, '000.000.000.000', '2018-06-01 00:00:00', '2018-06-03 00:00:00'),
(14, '嘎嘎嘎', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 0, '000.000.000.000', NULL, '2018-06-28 11:11:07'),
(9, '干嘛嘛', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 0, '000.000.000.000', NULL, '2018-06-11 08:17:38'),
(17, '快快快', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 0, '000.000.000.000', NULL, '2018-07-05 11:13:32');

-- --------------------------------------------------------

--
-- 表的结构 `cms_nav`
--

DROP TABLE IF EXISTS `cms_nav`;
CREATE TABLE IF NOT EXISTS `cms_nav` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '//ID',
  `nav_name` varchar(20) NOT NULL COMMENT '//导航名称',
  `nav_info` varchar(200) NOT NULL COMMENT '//导航描述',
  `pid` mediumint(8) UNSIGNED NOT NULL DEFAULT '0' COMMENT '//子分类',
  `sort` mediumint(8) UNSIGNED NOT NULL COMMENT '//排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cms_nav`
--

INSERT INTO `cms_nav` (`id`, `nav_name`, `nav_info`, `pid`, `sort`) VALUES
(1, '军事动态', '主要是军事方面的新闻。', 0, 1),
(2, '八卦娱乐', '娱乐界的狗仔新闻。', 0, 2),
(3, '时尚女人', '关于时尚女人方面的新闻。', 0, 3),
(4, '科技频道', '关于科技方面的资讯。', 0, 4),
(5, '智能手机', '关于智能手机方面的资讯。', 0, 5),
(6, '美容护肤', '关于美容护肤的新闻资讯', 0, 5),
(8, '热门汽车', '关于汽车相关的新闻资讯', 0, 6),
(9, '房产家居', '关于房产家居方面的新闻资讯', 0, 9),
(10, '证书教育', '关于证书教育方面的新闻资讯', 0, 10),
(11, '股票基金', '关于股票基金方面的新闻资讯', 0, 11),
(13, 'sdfgsdfg', 'dsfgsdfg', 0, 13),
(16, '日本军事', '关于日本军事的动态', 1, 1),
(17, '朝鲜军事', '关于朝鲜军事的动态', 1, 2),
(18, '越南军事', '关于越南军事的动态\r\n', 1, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;