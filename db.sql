-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2016 at 10:38 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `viettech`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `vt_config`
--

INSERT INTO `vt_config` (`id`, `title`, `des`, `name`, `group`, `value`, `type`, `file`) VALUES
(1, 'Hiển thị số điện thoại dưới chân trang', '', 'showPhoneFixed', '', '0', '', 'config'),
(2, 'Giới hạn sản phẩm mỗi trang', '', 'limit', '', '9', 'number', 'config'),
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
(20, 'Html Box Heading', '', 'boxHead', '', '\r\n    &#60;?=$_SERVER[''QUERY_STRING'']?&#62;\r\n&#60;br&#62;\r\n&#60;?=md5($_SERVER[''QUERY_STRING'']);?&#62;\r\n&#60;div class="divider-new"&#62;\r\n    &#60;h2 class="h2-responsive"&#62;', 'codeEditor', 'config'),
(21, 'Html Content Heading', '<i class="fa fa-home"></i> » breadcrumb » breadcrumb » breadcrumb » breadcrumb » breadcrumb » ...', 'contentHead', '', '    &#60;/h2&#62;\r\n&#60;/div&#62;\r\n&#60;section id="best-features"&#62;\r\n	&#60;div class="row"&#62;', 'codeEditor', 'config'),
(22, 'Html Content Footer', 'Nội dung (Có thể là danh sách bài viết hoặc bài viết...)', 'contentFooter', '', '    &#60;/div&#62;\r\n&#60;/section&#62;', 'codeEditor', 'config'),
(23, 'Không có giao diện mobile', '', 'notMobile', '', '0', '', 'config'),
(24, 'Chống copy bài viết', '', 'blockCopy', '', '', '', 'config');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
