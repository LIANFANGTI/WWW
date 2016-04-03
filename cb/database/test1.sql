-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 05 月 03 日 14:01
-- 服务器版本: 5.6.21-log
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `test1`
--

-- --------------------------------------------------------

--
-- 表的结构 `stu`
--

CREATE TABLE IF NOT EXISTS `stu` (
  `STU_ID` int(11) NOT NULL,
  `STU_NAME` varchar(20) DEFAULT NULL,
  `STU_SEX` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`STU_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `stu`
--

INSERT INTO `stu` (`STU_ID`, `STU_NAME`, `STU_SEX`) VALUES
(12010205, '练方梯', '男'),
(12010207, '杨敬富', '男'),
(12010208, '李二狗', '男'),
(12010209, '陈狗蛋', '男');

-- --------------------------------------------------------

--
-- 表的结构 `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `trued` varchar(255) NOT NULL,
  `case1` varchar(255) NOT NULL,
  `case2` varchar(255) NOT NULL,
  `case3` varchar(255) NOT NULL,
  `case4` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `ps` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_3` (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- 转存表中的数据 `topic`
--

INSERT INTO `topic` (`id`, `type`, `trued`, `case1`, `case2`, `case3`, `case4`, `content`, `ps`) VALUES
(2, '选择题', 'D', '15858843035', '阿瑟斯', '啊啊as', '草率从事', '操作系统的原理是什么', '第六单元'),
(3, '选择题', '请选择', '文件', '存储', '设备', '作业', '操作系统的五大管理中“按名存取”体现了什么管理', '第一单元'),
(7, '选择题', 'D', '黑色', '白色', '背景色', '透明', 'PS中不能把背景颜色设置为', '第一单元'),
(39, '选择题', 'C', '键盘', '手写笔', '绘图仪', '条形码阅读器', '下列不属于输入设备的是', '第一单元'),
(41, '选择题', 'B', '2', '啊啊225', '22', '22', '拉', '第一单元'),
(42, '选择题', 'B', 'hff', 'y', '8552222', '2222', '喇', '第一单元'),
(43, '选择题', 'C', '文件存储', '阿鲁', '阿拉蕾L', '巴鲁', '五个操作系统的原理', '第六单元');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `name` varchar(8) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `birday` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
