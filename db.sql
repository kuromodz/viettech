-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2016 at 10:49 AM
-- Server version: 5.6.26-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tuanvt_viettech`
--

-- --------------------------------------------------------

--
-- Table structure for table `vt_config`
--

CREATE TABLE IF NOT EXISTS `vt_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `des` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` text NOT NULL,
  `group` text NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` text NOT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `vt_config`
--

INSERT INTO `vt_config` (`id`, `title`, `des`, `name`, `group`, `value`, `type`, `file`) VALUES
(1, 'Hiển thị số điện thoại dưới chân trang', '', 'showPhoneFixed', '', '0', '', 'config'),
(2, 'Giới hạn sản phẩm mỗi trang', '', 'limit', '', '8', 'number', 'config'),
(3, 'Danh mục hình ảnh', '', 'showListImage', '', '', 'img', 'home'),
(4, 'Tự thiết kế template', '', 'customTemplate', 'all', '', '', 'idList'),
(5, 'Chỉ nhập nội dung', '', 'onlyContent', 'only', 'only', '', 'idList'),
(11, 'Có thể thêm danh mục', '', 'showList', '', '', '', 'idList'),
(12, 'Có nhiều cấp danh mục', '', 'multiMenu', '', '1', '', 'idList'),
(13, 'Được chỉnh sửa ảnh danh mục gốc', '', 'showImageMenu', 'all', '', '', 'idList'),
(14, 'Được chỉnh sửa ảnh tất cả danh mục con', '', 'showImage', '', '', '', 'idList'),
(15, 'Chi tiết bài viết có nhiều hình ảnh', '', 'slide', '', '', '', 'idList'),
(16, 'Có thể sắp xếp bài viết', '', 'orderProduct', '', '', '', 'idList'),
(17, 'Field', '', 'listF', '', '', 'add', 'idList'),
(18, 'Nút Check', '', 'listCheck', '', '', 'add', 'idList'),
(19, 'Chi tiết bài viết có thể chia tab', '', 'tab', '', '', '', 'idList'),
(20, 'Html Box Heading', '', 'boxHead', '', '&#60;div class="divider-new"&#62;\r\n    &#60;h2 class="h2-responsive"&#62;', 'codeEditor', 'config'),
(21, 'Html Content Heading', '<i class="fa fa-home"></i> » breadcrumb » breadcrumb » breadcrumb » breadcrumb » breadcrumb » ...', 'contentHead', '', '    &#60;/h2&#62;\r\n&#60;/div&#62;\r\n&#60;section id="best-features"&#62;\r\n	&#60;div class="row"&#62;', 'codeEditor', 'config'),
(22, 'Html Content Footer', 'Nội dung (Có thể là danh sách bài viết hoặc bài viết...)', 'contentFooter', '', '    &#60;/div&#62;\r\n&#60;/section&#62;', 'codeEditor', 'config'),
(23, 'Không có giao diện mobile', '', 'notMobile', '', '0', '', 'config');

-- --------------------------------------------------------

--
-- Table structure for table `vt_counter`
--

CREATE TABLE IF NOT EXISTS `vt_counter` (
  `ip_address` varchar(15) NOT NULL,
  `last_visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `ip_address` (`ip_address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vt_counter`
--

INSERT INTO `vt_counter` (`ip_address`, `last_visit`) VALUES
('::1', '2016-09-09 04:29:29'),
('::1', '2016-09-09 08:41:01'),
('::1', '2016-09-10 04:18:36'),
('::1', '2016-09-10 04:41:25'),
('::1', '2016-09-12 03:46:29'),
('::1', '2016-09-12 04:16:30'),
('::1', '2016-09-15 03:19:19'),
('::1', '2016-09-16 07:07:38'),
('::1', '2016-09-16 07:09:59'),
('::1', '2016-09-16 07:16:08'),
('::1', '2016-09-16 07:29:44'),
('::1', '2016-09-16 07:30:44'),
('::1', '2016-09-16 07:35:00'),
('::1', '2016-09-16 07:36:26'),
('::1', '2016-09-16 07:38:17'),
('::1', '2016-09-16 07:45:45'),
('::1', '2016-09-16 07:47:49'),
('::1', '2016-09-16 07:48:54'),
('::1', '2016-09-16 07:56:40'),
('::1', '2016-09-16 07:59:51'),
('::1', '2016-09-17 01:57:13'),
('::1', '2016-09-17 01:59:55'),
('::1', '2016-09-17 02:00:56'),
('::1', '2016-09-17 02:04:49'),
('::1', '2016-09-17 02:06:04'),
('::1', '2016-09-17 02:07:52'),
('::1', '2016-09-17 02:17:45'),
('::1', '2016-09-17 02:21:02'),
('::1', '2016-09-17 02:22:37'),
('::1', '2016-09-17 02:24:05'),
('::1', '2016-09-17 02:25:26'),
('::1', '2016-09-17 02:27:53'),
('::1', '2016-09-17 02:29:31'),
('::1', '2016-09-17 03:14:58'),
('::1', '2016-09-17 03:16:10'),
('::1', '2016-09-17 03:17:38'),
('::1', '2016-09-17 03:19:36'),
('::1', '2016-09-17 03:20:52'),
('::1', '2016-09-17 03:21:55'),
('::1', '2016-09-17 03:23:05'),
('::1', '2016-09-17 03:24:16'),
('::1', '2016-09-17 03:25:41'),
('::1', '2016-09-17 03:28:08'),
('::1', '2016-09-17 03:29:18'),
('::1', '2016-09-17 03:30:47'),
('::1', '2016-09-17 03:33:27'),
('::1', '2016-09-17 03:35:01'),
('::1', '2016-09-17 03:39:46'),
('::1', '2016-09-17 03:42:06'),
('::1', '2016-09-17 03:45:59'),
('::1', '2016-09-17 03:48:10'),
('::1', '2016-09-17 03:50:27'),
('::1', '2016-09-17 03:53:46'),
('::1', '2016-09-17 03:56:52'),
('::1', '2016-09-19 03:30:59'),
('::1', '2016-09-19 06:01:34'),
('::1', '2016-09-19 06:02:48'),
('::1', '2016-09-19 09:33:12'),
('::1', '2016-09-20 03:51:23'),
('::1', '2016-09-20 08:53:53'),
('::1', '2016-09-20 08:55:24'),
('::1', '2016-09-20 12:32:55'),
('::1', '2016-09-20 12:59:27'),
('::1', '2016-09-20 13:41:07'),
('::1', '2016-09-20 13:54:03'),
('::1', '2016-09-20 14:28:55'),
('::1', '2016-09-20 14:38:01'),
('::1', '2016-09-20 15:09:17'),
('::1', '2016-09-20 15:27:25'),
('::1', '2016-09-20 16:14:52'),
('::1', '2016-09-20 16:21:13'),
('::1', '2016-09-20 16:23:39'),
('::1', '2016-09-20 16:25:14'),
('::1', '2016-09-20 16:27:33'),
('::1', '2016-09-20 16:29:52'),
('::1', '2016-09-20 16:32:16'),
('::1', '2016-09-21 03:07:25'),
('::1', '2016-09-21 04:36:14'),
('::1', '2016-09-21 04:38:06'),
('::1', '2016-09-21 05:35:07'),
('::1', '2016-09-21 06:09:17'),
('::1', '2016-09-21 06:13:06'),
('::1', '2016-09-21 08:25:50'),
('::1', '2016-09-21 08:29:24'),
('::1', '2016-09-21 08:33:46'),
('::1', '2016-09-21 08:35:09'),
('::1', '2016-09-23 04:08:06'),
('::1', '2016-09-23 07:40:38'),
('::1', '2016-09-23 09:02:20'),
('::1', '2016-09-27 04:33:04'),
('::1', '2016-09-28 09:16:10'),
('::1', '2016-09-29 04:26:37'),
('::1', '2016-09-29 05:09:26'),
('::1', '2016-09-29 05:11:13'),
('::1', '2016-09-29 05:13:10'),
('::1', '2016-09-29 05:19:11'),
('::1', '2016-09-29 05:21:05'),
('::1', '2016-09-29 05:22:26'),
('::1', '2016-09-29 05:29:29'),
('::1', '2016-09-29 05:36:17'),
('::1', '2016-09-29 05:37:21'),
('::1', '2016-09-29 05:38:30'),
('::1', '2016-09-29 05:39:50'),
('::1', '2016-09-29 06:03:17'),
('::1', '2016-09-29 06:04:24'),
('::1', '2016-09-29 06:44:18'),
('::1', '2016-09-30 04:37:25'),
('::1', '2016-09-30 04:38:43'),
('::1', '2016-09-30 04:40:31'),
('::1', '2016-09-30 04:41:43'),
('::1', '2016-09-30 04:44:07'),
('::1', '2016-09-30 09:12:09'),
('::1', '2016-09-30 09:15:54'),
('::1', '2016-09-30 09:18:49'),
('::1', '2016-10-04 03:09:14'),
('::1', '2016-10-04 05:07:45'),
('::1', '2016-10-04 05:08:51'),
('::1', '2016-10-04 07:43:49'),
('::1', '2016-10-04 07:46:00'),
('::1', '2016-10-04 09:15:51'),
('::1', '2016-10-04 09:22:04'),
('::1', '2016-10-04 09:26:19'),
('::1', '2016-10-04 09:28:35'),
('::1', '2016-10-04 09:29:46'),
('::1', '2016-10-04 10:11:54'),
('::1', '2016-10-04 10:14:29'),
('::1', '2016-10-04 10:17:26'),
('::1', '2016-10-04 10:21:03'),
('::1', '2016-10-04 10:23:28'),
('::1', '2016-10-04 10:33:11'),
('::1', '2016-10-04 10:49:50'),
('::1', '2016-10-05 02:20:49'),
('::1', '2016-10-05 02:23:33'),
('::1', '2016-10-05 02:24:55'),
('::1', '2016-10-05 02:26:12'),
('::1', '2016-10-05 02:30:39'),
('::1', '2016-10-05 02:33:43'),
('::1', '2016-10-05 02:36:48'),
('::1', '2016-10-05 02:39:06'),
('::1', '2016-10-05 02:40:24'),
('::1', '2016-10-05 02:46:41'),
('::1', '2016-10-05 02:47:59'),
('::1', '2016-10-05 02:49:14'),
('::1', '2016-10-05 02:51:36'),
('::1', '2016-10-05 03:11:15'),
('::1', '2016-10-05 03:12:15'),
('::1', '2016-10-05 03:14:03'),
('::1', '2016-10-05 03:26:45'),
('::1', '2016-10-05 03:28:30'),
('::1', '2016-10-05 03:35:36'),
('::1', '2016-10-05 03:40:46'),
('::1', '2016-10-05 03:42:04'),
('::1', '2016-10-05 03:44:56'),
('::1', '2016-10-05 05:34:44'),
('::1', '2016-10-05 05:36:18'),
('::1', '2016-10-05 08:20:28'),
('::1', '2016-10-05 08:22:08'),
('::1', '2016-10-11 10:24:37'),
('127.0.0.1', '2016-10-14 03:30:09'),
('::1', '2016-10-14 03:30:20'),
('::1', '2016-10-14 03:31:26'),
('::1', '2016-10-14 03:32:58'),
('::1', '2016-10-14 03:36:11'),
('::1', '2016-10-14 03:40:14'),
('::1', '2016-10-15 16:11:22'),
('::1', '2016-10-16 05:47:02'),
('::1', '2016-10-16 08:04:49'),
('127.0.0.1', '2016-10-16 09:42:23'),
('::1', '2016-10-16 09:42:38'),
('::1', '2016-10-17 03:15:23'),
('::1', '2016-10-17 03:31:39'),
('::1', '2016-10-17 10:20:51'),
('::1', '2016-10-19 02:00:35'),
('::1', '2016-10-19 02:18:55'),
('::1', '2016-10-19 02:58:02'),
('::1', '2016-10-19 02:59:14'),
('::1', '2016-10-19 03:02:16'),
('::1', '2016-10-19 03:16:05'),
('::1', '2016-10-19 03:20:37'),
('::1', '2016-10-19 03:21:41'),
('::1', '2016-10-19 03:26:11'),
('::1', '2016-10-19 03:27:43'),
('::1', '2016-10-19 03:30:42'),
('::1', '2016-10-19 03:35:16'),
('::1', '2016-10-19 03:46:11'),
('::1', '2016-10-19 05:00:45'),
('::1', '2016-10-19 08:53:32'),
('::1', '2016-10-19 08:58:53'),
('::1', '2016-10-19 09:13:28'),
('::1', '2016-10-19 09:15:27'),
('::1', '2016-10-19 09:16:40'),
('::1', '2016-10-19 09:17:45'),
('::1', '2016-10-19 09:21:49'),
('::1', '2016-10-19 09:26:14'),
('::1', '2016-10-19 09:32:18'),
('::1', '2016-10-20 05:02:40'),
('::1', '2016-10-20 05:09:17'),
('::1', '2016-10-20 05:13:48'),
('::1', '2016-10-20 06:13:23'),
('::1', '2016-10-20 06:15:13'),
('::1', '2016-10-20 10:10:57'),
('::1', '2016-10-20 10:14:09'),
('::1', '2016-10-20 10:15:54'),
('::1', '2016-10-20 10:18:16'),
('::1', '2016-10-20 10:22:59'),
('::1', '2016-10-20 10:24:29'),
('::1', '2016-10-20 10:25:40'),
('::1', '2016-10-20 10:27:17'),
('::1', '2016-10-21 09:30:59'),
('::1', '2016-10-21 09:32:10'),
('::1', '2016-10-26 06:58:23'),
('::1', '2016-10-26 07:55:21'),
('::1', '2016-10-26 09:37:22'),
('::1', '2016-10-26 12:18:06'),
('::1', '2016-10-26 12:19:43'),
('::1', '2016-10-26 12:27:15'),
('::1', '2016-10-26 12:30:50'),
('::1', '2016-10-26 12:33:18'),
('::1', '2016-10-26 12:38:45'),
('::1', '2016-10-26 12:40:15'),
('::1', '2016-10-26 13:16:03'),
('::1', '2016-10-26 16:54:12'),
('::1', '2016-10-27 18:03:03'),
('::1', '2016-10-28 06:26:22'),
('::1', '2016-10-28 11:56:44'),
('::1', '2016-11-02 09:52:48'),
('::1', '2016-11-03 02:58:28'),
('::1', '2016-11-03 03:15:40'),
('::1', '2016-11-03 03:16:46'),
('::1', '2016-11-03 03:18:35'),
('::1', '2016-11-03 03:35:32'),
('::1', '2016-11-03 04:56:05'),
('::1', '2016-11-08 03:11:23'),
('::1', '2016-11-08 03:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `vt_data`
--

CREATE TABLE IF NOT EXISTS `vt_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hide` tinyint(1) NOT NULL,
  `pos` int(11) NOT NULL,
  `time` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu` int(11) NOT NULL,
  `data_parent` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `type` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tag` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `des` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file` text NOT NULL,
  `lang` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `cart` int(11) NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` text NOT NULL,
  `vip` tinyint(1) NOT NULL,
  `hot` tinyint(1) NOT NULL,
  `f1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f4` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f5` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f6` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f7` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f8` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f9` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f10` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `start` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sale` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vt_data`
--

INSERT INTO `vt_data` (`id`, `hide`, `pos`, `time`, `menu`, `data_parent`, `view`, `type`, `title`, `tag`, `des`, `keywords`, `img`, `content`, `link`, `file`, `lang`, `phone`, `email`, `password`, `count`, `cart`, `address`, `company`, `name`, `vip`, `hot`, `f1`, `f2`, `f3`, `f4`, `f5`, `f6`, `f7`, `f8`, `f9`, `f10`, `price`, `start`, `sale`) VALUES
(1, 0, 0, '04/12/2016 09:25:18', 928, 0, 40, '', 'cac', '', '', '', '2-02-12-2016-12-38-53.png', '', '', '', '', '', '', '', 0, 0, '', '', '', 0, 0, 'icon-googleplus-01-12-2016-17-50-04.png', '', 'icon-phone-01-12-2016-17-57-39.png', '', '', '', '', '', '', '', 0, '', 0),
(2, 0, 0, '02/12/2016 12:38:53', 0, 1, 0, '', '123', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', 0, '', 0),
(3, 0, 0, '02/12/2016 12:38:53', 0, 1, 0, '', 'sdfdsfdsf', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', 0, '', 0),
(4, 0, 0, '04/12/2016 09:24:28', 928, 0, 7, '', 'None', '', '', '', 'test-02-12-2016-12-38-47.png', '', '', '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', 0, '', 0),
(5, 0, 0, '04/12/2016 09:24:23', 928, 0, 12, '', 'None', '', '', '', '1-02-12-2016-12-38-36.jpg', '', '', '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vt_file`
--

CREATE TABLE IF NOT EXISTS `vt_file` (
  `headHtml` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `footerHtml` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file` text NOT NULL,
  `hide` int(11) NOT NULL,
  `type` text NOT NULL,
  `customTemplate` tinyint(1) NOT NULL,
  `customHtml` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `onlyContent` tinyint(1) NOT NULL,
  `showList` tinyint(1) NOT NULL,
  `multiMenu` tinyint(1) NOT NULL,
  `showImage` tinyint(1) NOT NULL,
  `showImageMenu` tinyint(1) NOT NULL,
  `slide` tinyint(1) NOT NULL,
  `orderProduct` tinyint(1) NOT NULL,
  `tab` tinyint(1) NOT NULL,
  `listHtml` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `boxHtml` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `vt_file`
--

INSERT INTO `vt_file` (`headHtml`, `footerHtml`, `id`, `title`, `file`, `hide`, `type`, `customTemplate`, `customHtml`, `onlyContent`, `showList`, `multiMenu`, `showImage`, `showImageMenu`, `slide`, `orderProduct`, `tab`, `listHtml`, `boxHtml`) VALUES
('', '', 1, 'Hiển thị sản phẩm', 'product', 0, '', 0, '', 0, 1, 0, 0, 0, 0, 0, 1, '&#60;?php include(''views/include/contentList.php''); ?&#62;', ''),
('&#60;div class="row"&#62;', '    &#60;/ul&#62;\r\n&#60;/div&#62;', 2, 'Hiển thị tin tức', 'news', 0, '', 0, '', 0, 0, 0, 0, 1, 0, 0, 0, '&#60;div class="col-xs-12 col-sm-4"&#62;\r\n    &#60;div class="news-item"&#62;\r\n        &#60;a class="news-thumbnail" &#60;?=linkId($data,$name)?&#62; &#62;\r\n        	&#60;img class="img-responsive" &#60;?=srcImg($data)?&#62; &#62;\r\n        &#60;/a&#62;\r\n        &#60;h2 class="news-title"&#62;&#60;a &#60;?=linkId($data,$name)?&#62;&#62;&#60;?=$data-&#62;title?&#62;&#60;/a&#62;&#60;/h2&#62;\r\n        &#60;div class="description" style="text-align:justify;"&#62;&#60;?=$data-&#62;des?&#62;&#60;/div&#62;\r\n        &#60;div class="clearfix"&#62;&#60;/div&#62;\r\n    &#60;/div&#62;\r\n&#60;/div&#62;', '&#60;?=$page-&#62;content?&#62;'),
('', '', 3, 'Hiển thị nội dung', 'content', 0, '', 0, '&#225;dsad', 0, 0, 0, 0, 0, 0, 0, 0, '', ''),
('', '', 4, 'Liên hệ', 'contact', 0, 'custom', 1, '&#60;?php\r\n  $boxHead = "?&#62; ".html_entity_decode($config-&#62;boxHead)." &#60;?php ";\r\n  $contentHead = "?&#62; ".html_entity_decode($config-&#62;contentHead)." &#60;?php ";\r\n  $contentFooter = "?&#62; ".html_entity_decode($config-&#62;contentFooter)." &#60;?php ";\r\n  eval($boxHead);\r\n  $db-&#62;breadcrumbMenu($menuPage);\r\n  eval($contentHead);\r\n?&#62;\r\n&#60;div class="col-md-12"&#62;\r\n  &#60;?=$menuPage-&#62;content?&#62;\r\n&#60;/div&#62;\r\n&#60;div class="col-md-6"&#62;\r\n    &#60;iframe frameborder="0" height="450" src="&#60;?=$infoPage-&#62;map?&#62;" style="border:0" width="100%"&#62;&#60;/iframe&#62;\r\n&#60;/div&#62;\r\n&#60;div class="col-md-6"&#62;\r\n  &#60;center&#62;\r\n    &#60;form class="contactAjax" action="contact"&#62;\r\n        &#60;p class="name"&#62;\r\n          &#60;input class="form-control" name="title" type="text" placeholder="H&#7885; t&#234;n" id="name" /&#62;\r\n        &#60;/p&#62;\r\n    \r\n        &#60;p class="email"&#62;\r\n          &#60;input class="form-control" name="email" type="text" id="email" placeholder="Email" /&#62;\r\n        &#60;/p&#62;\r\n        &#60;p class="text"&#62;\r\n          &#60;input class="form-control" name="phone" type="text" placeholder="S&#7889; &#273;i&#7879;n tho&#7841;i" /&#62;\r\n        &#60;/p&#62;\r\n        &#60;p class="text"&#62;\r\n          &#60;input class="form-control" name="address" type="text" placeholder="&#272;&#7883;a ch&#7881; c&#7911;a b&#7841;n" /&#62;\r\n        &#60;/p&#62;\r\n        &#60;p class="text"&#62;\r\n          &#60;textarea class="form-control md-textarea" name="content" placeholder="N&#7897;i dung tin nh&#7855;n"&#62;&#60;/textarea&#62;\r\n        &#60;/p&#62;\r\n        \r\n        &#60;button type="submit" class="btn btn-primary"&#62;\r\n          &#60;i class="fa fa-send"&#62;&#60;/i&#62; G&#7917;i tin nh&#7855;n\r\n        &#60;/button&#62;\r\n        \r\n    &#60;/form&#62;\r\n    &#60;/center&#62;\r\n&#60;/div&#62;\r\n&#60;?php eval($contentFooter); ?&#62;', 0, 1, 0, 0, 0, 0, 0, 0, '0', '0'),
('', '', 5, 'Thư viện', 'picture', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '0', '0'),
('', '', 6, 'Hiển thị video', 'video', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '0', '0'),
('', '', 7, 'Giỏ hàng', 'shop', 0, 'block', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '0', '0'),
('', '', 8, 'Site Map', 'sitemap', 0, 'block', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '0', '0'),
('', '', 9, 'Thành viên', 'user', 0, 'block', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '0', '0'),
('', '', 10, 'Đăng ký', 'register', 1, 'block', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '0', '0'),
('', '', 11, 'Đăng nhập', 'login', 1, 'block', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '0', '0'),
('', '', 12, 'Thiết kế', 'design', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '0', '0'),
('', '', 13, 'Ký gửi', 'post', 0, 'block', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '0', '0'),
('&#60;div class="row"&#62;', '&#60;/div&#62;', 15, 'Download', 'download', 0, '', 0, '', 0, 0, 0, 0, 1, 0, 0, 0, '&#60;div class="col-xs-12 col-sm-4"&#62;\r\n    &#60;div class="news-item"&#62;\r\n        &#60;a class="news-thumbnail" href="upload/&#60;?=$data-&#62;file?&#62;" target="_blank" &#62;\r\n        	&#60;img class="img-responsive" &#60;?=srcImg($data)?&#62; &#62;\r\n        &#60;/a&#62;\r\n        &#60;h2 class="news-title"&#62;&#60;a href="upload/&#60;?=$data-&#62;file?&#62;" target="_blank"&#62;&#60;?=$data-&#62;title?&#62;&#60;/a&#62;&#60;/h2&#62;\r\n        &#60;div class="description" style="text-align:justify;"&#62;&#60;?=$data-&#62;des?&#62;&#60;/div&#62;\r\n        &#60;div class="clearfix"&#62;&#60;/div&#62;\r\n    &#60;/div&#62;\r\n&#60;/div&#62;', ''),
('', '', 16, 'Hiển thị hỗ trợ', 'support', 0, '', 0, '', 0, 1, 0, 0, 0, 0, 0, 0, '&#60;?php include(''views/include/contentList.php''); ?&#62;', ''),
('', '', 17, 'Hiển thị địa điểm', 'map', 0, '', 0, '', 0, 1, 0, 0, 0, 0, 0, 0, '', ''),
('', '', 18, 'Ngôn ngữ', 'lang', 0, 'custom', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '0', '0'),
('', '', 19, 'Trang chủ', 'home', 1, 'custom', 1, '&#60;?php include(''views/include/home.php'') ?&#62;', 0, 0, 0, 0, 0, 0, 0, 0, '0', '0'),
('', '', 21, 'Tìm kiếm', 'search', 1, 'block', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `vt_file_data`
--

CREATE TABLE IF NOT EXISTS `vt_file_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` text NOT NULL,
  `col` text NOT NULL,
  `type` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `group` text NOT NULL,
  `pos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vt_menu`
--

CREATE TABLE IF NOT EXISTS `vt_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_parent` int(11) NOT NULL,
  `hide` tinyint(1) NOT NULL,
  `pos` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `des` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ico` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file` text NOT NULL,
  `href` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` text NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f10` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f9` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f8` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f7` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f6` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f5` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f4` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f3` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f1` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=931 ;

--
-- Dumping data for table `vt_menu`
--

INSERT INTO `vt_menu` (`id`, `menu_parent`, `hide`, `pos`, `title`, `des`, `ico`, `keywords`, `img`, `file`, `href`, `name`, `content`, `f10`, `f9`, `f8`, `f7`, `f6`, `f5`, `f4`, `f3`, `f2`, `f1`, `time`) VALUES
(0, -1, 1, -3, 'Cấu hình', '', '', '', '', 'config', '', 'cau-hinh', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 0, 1, 0, 'Thông tin', '', '', '', '', 'info', '', 'thong-tin', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 0, 1, -1, 'Tìm kiếm', '', '', '', '', 'search', '', 'tim-kiem', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 0, 0, 1, 'Trang chủ', '', 'fa fa-home', '', '', 'home', '.', 'trang-chu', '<p><em>asdlasasdasdasdasd</em></p>\r\n', '', '', '', '', '', '', '111', '29', '123123', '12', ''),
(5, -1, 1, -2, 'Cài đặt Menu', '', '', '', '', 'configMenu', '', 'cai-dat-menu', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 0, 1, 5, 'Liên hệ', '', 'fa fa-phone', '', '', 'contact', '', 'lien-he', '', '', '', '', '', '', '', '', '', '', '', ''),
(914, 0, 0, 4, 'Đăng', '', 'fa fa-send', 'phot, danh sach phot, phốt, danh sách phốt, phot online, phốt online, tập hợp các phốt, phốt việt, phot viet', '', 'post', '', 'dang', '<p>ahihi</p>\r\n', '', '', '', '', '', '', '', '', '', '', ''),
(926, 0, 0, 3, 'Điều khoản', '', 'fa fa-exclamation-circle', '', '', 'content', '', 'dieu-khoan', '', '', '', '', '', '', '', '', '', '', '', ''),
(927, 0, 0, 2, 'Sản phẩm', '', '', '', '', 'product', '', 'san-pham', '', '', '', '', '', '', '', '', '<p>sdfdsfsdf</p>\r\n', '', '', ''),
(928, 927, 0, 0, 'None', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(929, 927, 0, 0, 'None', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(930, 927, 0, 0, 'None', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vt_page`
--

CREATE TABLE IF NOT EXISTS `vt_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `vt_page`
--

INSERT INTO `vt_page` (`id`, `title`, `name`, `type`, `content`) VALUES
(3, 'Mô tả', 'des', 'text', 'Với đội ngũ nhân sự giàu kinh nghiệm, chúng tôi tự tin khẳng định mình có thể cung cấp dịch vụ tốt nhất và uy tín nhất.'),
(4, 'Logo', 'logo', 'img', 'logo-30-07-2016-18-54-31.png'),
(6, 'Địa chỉ', 'address', 'text', '657'),
(7, 'Số điện thoại', 'phone', 'text', '904903432'),
(9, 'Email', 'gmail', 'text', 'kuromodz@gmail.com'),
(11, 'Mật khẩu', 'password', 'text', '@admin'),
(16, 'Link Google Map', 'map', 'text', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.001442963126!2d106.7025501138812!3d10.811200692297929!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752895fdd380f1%3A0x7acc20e62c45831c!2zNjggQ2h1IFbEg24gQW4sIHBoxrDhu51uZyAyNiwgQsOsbmggVGjhuqFuaCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1476957603382'),
(29, 'Facebook', 'facebook', 'text', 'https://www.facebook.com/kuromodz'),
(31, 'Skype', 'skype', 'text', ''),
(35, 'Slogan', 'slogan', 'text', ''),
(36, 'Youtube', 'youtube', 'text', ''),
(37, 'Keywords', 'keywords', 'text', ''),
(38, 'Tên website', 'title', 'text', 'asdsad'),
(39, 'google-site-verification', 'googleVerification', 'text', ''),
(41, 'Google Plus', 'googlePlus', 'text', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
