-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 12, 2023 at 10:59 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app20000_project_std`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL COMMENT 'รหัสตาราง',
  `submit_project_id` int(11) NOT NULL COMMENT 'รหัสส่งงาน',
  `admin_id` int(11) NOT NULL COMMENT 'รหัสอาจารย์',
  `c_name` varchar(150) NOT NULL COMMENT 'ชื่อผู้ตรวจงาน',
  `cmt_detail` text NOT NULL COMMENT 'รายละเอียดความคิดเห็น',
  `cmt_dates` date NOT NULL COMMENT 'วันที่ทำรายการ',
  `cmt_status` varchar(50) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `submit_project_id`, `admin_id`, `c_name`, `cmt_detail`, `cmt_dates`, `cmt_status`) VALUES
(1, 1, 1, 'aaa', '<p>-sdfsdfsd&nbsp;<span style=\"background-color:rgb(255, 255, 255); color:rgb(121, 85, 72); font-size:18px\">รายละเอียดการตรวจงาน&nbsp;ำดกฟหกฟหกหฟก</span></p>\r\n', '2023-03-08', '1'),
(2, 1, 1, 'aaa', '<p>-sdfsdfsd&nbsp;<span style=\"background-color:rgb(255, 255, 255); color:rgb(121, 85, 72); font-size:18px\">รายละเอียดการตรวจงาน ddddd</span></p>\r\n', '2023-03-08', '1'),
(3, 1, 1, 'aaa', '<p>-sdfsdfsd&nbsp;<span style=\"background-color:rgb(255, 255, 255); color:rgb(121, 85, 72); font-size:18px\">รายละเอียดการตรวจงานdddddddddd</span></p>\r\n', '2023-03-08', '1'),
(4, 1, 1, 'aaa', '<p>-sdsdsdsdsd1</p>\r\n', '2023-03-08', '1'),
(5, 2, 1, 'aaa', '<p>-<span style=\"background-color:rgb(255, 255, 255); color:rgb(121, 85, 72); font-size:18px\">หัวข้องานที่ตรวจ2</span></p>\n', '2023-03-08', '1'),
(6, 3, 1, 'aaa', '<p>-&nbsp;<span style=\"background-color:rgb(255, 255, 255); color:rgb(121, 85, 72); font-size:18px\">หัวข้องานที่ตรวจ&nbsp;</span>ชื่อหัวข้อ111</p>\r\n', '2023-03-09', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

CREATE TABLE `fileupload` (
  `id_fileupload` int(11) NOT NULL COMMENT 'รหัสตาราง',
  `submit_project_id` int(11) NOT NULL COMMENT 'รหัสส่งงาน',
  `comment_id` int(11) NOT NULL COMMENT 'รหัสตารางแสดงความคิดเห็น',
  `f_name` varchar(255) NOT NULL COMMENT 'ชื่อไฟล์',
  `f_file_upoad` varchar(255) NOT NULL COMMENT 'ไฟล์อัพโหลด',
  `f_file_type` varchar(150) NOT NULL COMMENT 'ประเภทไฟล์',
  `f_dates` date NOT NULL COMMENT 'วันที่ทำรายการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางไฟล์อัพโหลดความคืบหน้า';

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`id_fileupload`, `submit_project_id`, `comment_id`, `f_name`, `f_file_upoad`, `f_file_type`, `f_dates`) VALUES
(1, 1, 0, 'การติดตั้ง-Appserv-8.docx', 'upload/การติดตั้ง-Appserv-8-10.docx', 'f_file', '2023-03-08'),
(2, 0, 1, 'Doc1.docx', 'upload/Doc1-10.docx', 'f_file', '2023-03-08'),
(3, 0, 2, 'สอนการใช้งาน-phpMyAdmin-เพื่อจัดการฐานข้อมูล.docx', 'upload/สอนการใช้งาน-phpMyAdmin-เพื่อจัดการฐานข้อมูล-20.docx', 'f_file', '2023-03-08'),
(4, 0, 3, 'การเปิดใช้งาน-mod_rewrite-ของ-Appserv-9.docx', 'upload/การเปิดใช้งาน-mod_rewrite-ของ-Appserv-9-30.docx', 'f_file', '2023-03-08'),
(5, 0, 3, 'การเปิดใช้งาน-mod_rewrite-ของ-Appserv-9.docx', 'upload/การเปิดใช้งาน-mod_rewrite-ของ-Appserv-9-30.docx', 'f_file', '2023-03-08'),
(7, 0, 4, 'สอนการใช้งาน-phpMyAdmin-เพื่อจัดการฐานข้อมูล.docx', 'upload/สอนการใช้งาน-phpMyAdmin-เพื่อจัดการฐานข้อมูล-40.docx', 'f_file', '2023-03-08'),
(8, 0, 4, 'วิธีทำให้-XAMPP-ทำงานได้พร้อมกับ-Appserv.docx', 'upload/วิธีทำให้-XAMPP-ทำงานได้พร้อมกับ-Appserv-41.docx', 'f_file', '2023-03-08'),
(9, 0, 4, 'การเปิดใช้งาน-mod_rewrite-ของ-Appserv-9.docx', 'upload/การเปิดใช้งาน-mod_rewrite-ของ-Appserv-9-40.docx', 'f_file', '2023-03-08'),
(10, 0, 1, 'การเปิดใช้งาน-mod_rewrite-ของ-Appserv-9.docx', 'upload/การเปิดใช้งาน-mod_rewrite-ของ-Appserv-9-10.docx', 'f_file', '2023-03-08'),
(11, 0, 1, 'สอนการติดตั้งโปรเจ็คเว็บไซต์ด้วยโปรแกรม-Appserv-8.docx', 'upload/สอนการติดตั้งโปรเจ็คเว็บไซต์ด้วยโปรแกรม-Appserv-8-10.docx', 'f_file', '2023-03-08'),
(12, 0, 1, 'วิธีทำให้-XAMPP-ทำงานได้พร้อมกับ-Appserv.docx', 'upload/วิธีทำให้-XAMPP-ทำงานได้พร้อมกับ-Appserv-11.docx', 'f_file', '2023-03-08'),
(14, 2, 0, 'การติดตั้ง-Appserv-8.docx', 'upload/การติดตั้ง-Appserv-8-20.docx', 'f_file', '2023-03-08'),
(15, 2, 0, 'การเปิดใช้งาน-mod_rewrite-ของ-Appserv-9.docx', 'upload/การเปิดใช้งาน-mod_rewrite-ของ-Appserv-9-21.docx', 'f_file', '2023-03-08'),
(16, 2, 0, 'สอนการใช้งาน-phpMyAdmin-เพื่อจัดการฐานข้อมูล.docx', 'upload/สอนการใช้งาน-phpMyAdmin-เพื่อจัดการฐานข้อมูล-22.docx', 'f_file', '2023-03-08'),
(17, 0, 5, 'การติดตั้ง-Appserv-8.docx', 'upload/การติดตั้ง-Appserv-8-50.docx', 'f_file', '2023-03-08'),
(18, 0, 5, 'สอนการติดตั้งโปรเจ็คเว็บไซต์ด้วยโปรแกรม-Appserv-8.docx', 'upload/สอนการติดตั้งโปรเจ็คเว็บไซต์ด้วยโปรแกรม-Appserv-8-50.docx', 'f_file', '2023-03-08'),
(19, 3, 0, 'การติดตั้ง-Appserv-8.docx', 'upload/การติดตั้ง-Appserv-8-30.docx', 'f_file', '2023-03-09'),
(20, 3, 0, 'สอนการใช้งาน-phpMyAdmin-เพื่อจัดการฐานข้อมูล.docx', 'upload/สอนการใช้งาน-phpMyAdmin-เพื่อจัดการฐานข้อมูล-31.docx', 'f_file', '2023-03-09'),
(21, 0, 6, 'สอนการใช้งาน-phpMyAdmin-เพื่อจัดการฐานข้อมูล.docx', 'upload/สอนการใช้งาน-phpMyAdmin-เพื่อจัดการฐานข้อมูล-60.docx', 'f_file', '2023-03-09'),
(22, 4, 0, 'การติดตั้ง-Appserv-8.docx', 'upload/การติดตั้ง-Appserv-8-40.docx', 'f_file', '2023-03-09'),
(23, 4, 0, 'วิธีทำให้-XAMPP-ทำงานได้พร้อมกับ-Appserv.docx', 'upload/วิธีทำให้-XAMPP-ทำงานได้พร้อมกับ-Appserv-41.docx', 'f_file', '2023-03-09'),
(24, 5, 0, 'สอนการใช้งาน-phpMyAdmin-เพื่อจัดการฐานข้อมูล.docx', 'upload/สอนการใช้งาน-phpMyAdmin-เพื่อจัดการฐานข้อมูล-50.docx', 'f_file', '2023-03-09'),
(25, 5, 0, 'วิธีทำให้-XAMPP-ทำงานได้พร้อมกับ-Appserv.docx', 'upload/วิธีทำให้-XAMPP-ทำงานได้พร้อมกับ-Appserv-51.docx', 'f_file', '2023-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL COMMENT 'รหัสตาราง(pk)',
  `user` varchar(50) NOT NULL COMMENT 'ชื่อ login',
  `pass` varchar(150) NOT NULL COMMENT 'รหัสผ่าน',
  `type` varchar(20) NOT NULL COMMENT 'ประเภทผู้ใช้',
  `count` int(11) NOT NULL COMMENT 'จำนวนเข้าใช้ระบบ',
  `status` varchar(20) NOT NULL COMMENT 'สถานะ',
  `date` datetime NOT NULL COMMENT 'วันที่เข้าใช้ล่าสุด'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ตาราง login เข้าใช้ระบบ';

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `user`, `pass`, `type`, `count`, `status`, `date`) VALUES
(1, 'admin', '1234', 'admin', 21, 'on', '2023-03-11 02:02:11'),
(6, 'std001', '1234', 'student', 3, 'on', '2023-03-11 02:10:19'),
(3, 't002', '1234', 'teacher', 3, 'on', '2023-03-11 02:00:12'),
(7, 'std002', '1234', 'student', 2, 'on', '2023-03-09 17:54:39'),
(8, 'std003', '1234', 'student', 7, 'on', '2023-03-11 02:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `open_project`
--

CREATE TABLE `open_project` (
  `id_open_project` int(11) NOT NULL COMMENT 'รหัสตาราง',
  `admin_id` int(11) NOT NULL COMMENT 'รหัสอาจารย์',
  `name` varchar(255) NOT NULL COMMENT 'ชื่ออาจารย์',
  `number` int(3) NOT NULL COMMENT 'จำนวนที่เปิดรับ',
  `year` varchar(4) NOT NULL COMMENT 'ปีการศึกษา',
  `detail` text NOT NULL COMMENT 'รายละเอียด',
  `dates` date NOT NULL COMMENT 'วันที่ทำรายการ',
  `status` varchar(50) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางเปิดรับโครงงาน';

--
-- Dumping data for table `open_project`
--

INSERT INTO `open_project` (`id_open_project`, `admin_id`, `name`, `number`, `year`, `detail`, `dates`, `status`) VALUES
(2, 1, 'aaa', 10, '2566', '<p>-<span style=\"background-color:rgb(255, 255, 255); color:rgb(121, 85, 72); font-size:18px\">รายละเอียดfdsfsfdsfs</span></p>\r\n', '2023-03-06', 'on'),
(3, 1, 'aaa', 10, '2566', '<p>-dedd</p>\r\n', '2023-03-06', 'off'),
(15, 3, 'ชื่อ-นามสกุล    dsadsada', 5, '2566', '<p>-เพิ่มข้อมูลเปิดรับโครงงานนักศึกษา</p>\r\n', '2023-03-11', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `register_project`
--

CREATE TABLE `register_project` (
  `id_register_project` int(11) NOT NULL COMMENT 'รหัสตาราง',
  `open_project_id` int(11) NOT NULL COMMENT 'รหัสเปิดรับโครงงาน',
  `admin_id` int(11) NOT NULL COMMENT 'รหัสอาจารย์',
  `name` varchar(255) NOT NULL COMMENT 'ชื่อโครงงาน',
  `detail` text NOT NULL COMMENT 'รายละเอียด',
  `dates` date NOT NULL COMMENT 'วันที่',
  `status` varchar(20) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางลงทะเบียนโครงงาน';

--
-- Dumping data for table `register_project`
--

INSERT INTO `register_project` (`id_register_project`, `open_project_id`, `admin_id`, `name`, `detail`, `dates`, `status`) VALUES
(2, 2, 1, 'TEST โครงงาน1', '<p><span style=\"background-color:rgb(255, 255, 255); color:rgb(121, 85, 72); font-size:18px\">รายละเอียด&nbsp;</span>TEST โครงงาน1</p>\r\n', '2023-03-07', 'no_success'),
(3, 2, 1, 'สนามฟุตบอล1a', '<p>sdasdasd</p>\r\n', '2023-03-07', 'on'),
(4, 15, 3, 'โปรเจคร้านค้าออนไลน์', '<p>โปรเจคร้านค้าออนไลน์</p>\r\n', '2023-03-09', 'on'),
(5, 15, 3, 'sdfsdfdsf', '<p>sdfsdfdsf</p>\r\n', '2023-03-11', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `register_project_detail`
--

CREATE TABLE `register_project_detail` (
  `id_register_project_detail` int(11) NOT NULL COMMENT 'รหัสตาราง',
  `register_project_id` int(11) NOT NULL COMMENT 'รหัสทะเบียนโครงงาน',
  `user_id` int(11) NOT NULL COMMENT 'รหัสนักศึกษา',
  `name` varchar(255) NOT NULL COMMENT 'ชื่อนักศึกษา',
  `status` varchar(50) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางรายละเอียดโครงงาน';

--
-- Dumping data for table `register_project_detail`
--

INSERT INTO `register_project_detail` (`id_register_project_detail`, `register_project_id`, `user_id`, `name`, `status`) VALUES
(1, 2, 1, 'aaa', '1'),
(2, 2, 6, 'ชื่อ-นามสกุลstd1', '2'),
(3, 3, 1, 'aaa', '1'),
(4, 3, 7, 'ชื่อ-นามสกุล2', '1'),
(5, 4, 8, 'ชื่อ-นามสกุลstd3', '1'),
(6, 5, 6, 'ชื่อ-นามสกุลstd1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` int(11) NOT NULL COMMENT 'รหัสตาราง',
  `admin_id` int(11) NOT NULL COMMENT 'รหัสอาจารย์',
  `register_project_id` int(11) NOT NULL COMMENT 'รหัสโครงงาน',
  `sd_rgt_name` varchar(255) NOT NULL COMMENT 'ชื่อโครงงาน',
  `sd_title` varchar(255) NOT NULL COMMENT 'ชื่อเรื่อง',
  `sd_detail` text NOT NULL COMMENT 'รายละเอียด',
  `sd_dates1` date NOT NULL COMMENT 'วันที่นัดสอบ',
  `sd_dates` date NOT NULL COMMENT 'วันที่ประกาศ',
  `sd_status` varchar(50) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางนัดสอบโครงงาน';

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `admin_id`, `register_project_id`, `sd_rgt_name`, `sd_title`, `sd_detail`, `sd_dates1`, `sd_dates`, `sd_status`) VALUES
(2, 1, 2, 'TEST โครงงาน1', 'นัดสอบโครงงาน TEST โครงงาน1dd', '<p>fsdfdsf&nbsp;นัดสอบโครงงาน TEST โครงงาน1ddffff</p>\r\n', '2023-03-11', '2023-03-09', '3'),
(4, 1, 2, 'TEST โครงงาน1', 'นัดสอบโครงงาน TEST โครงงาน12', '<p>ffdsfsf</p>\r\n', '2023-03-17', '2023-03-09', '4'),
(5, 1, 3, 'สนามฟุตบอล1a', 'นัดสอบโครงงาน TEST โครงงาน1555', '<p>หฟกฟหกหฟกฟ</p>\r\n', '2023-03-18', '2023-03-09', '3');

-- --------------------------------------------------------

--
-- Table structure for table `submit_project`
--

CREATE TABLE `submit_project` (
  `id_submit_project` int(11) NOT NULL COMMENT 'รหัสตาราง',
  `register_project_id` int(11) NOT NULL COMMENT 'รหัสโครงงาน',
  `user_id` int(11) NOT NULL COMMENT 'รหัสนักศึกษา',
  `sp_name` varchar(255) NOT NULL COMMENT 'ชื่อนักศึกษา',
  `sp_title` varchar(255) NOT NULL COMMENT 'ชื่อหัวข้อ',
  `sp_detail` text NOT NULL COMMENT 'รายละเอียดส่งงาน',
  `sp_dates` date NOT NULL COMMENT 'วันที่ทำรายการ',
  `sp_status` varchar(50) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางส่งงานความคืบหน้าของงาน';

--
-- Dumping data for table `submit_project`
--

INSERT INTO `submit_project` (`id_submit_project`, `register_project_id`, `user_id`, `sp_name`, `sp_title`, `sp_detail`, `sp_dates`, `sp_status`) VALUES
(1, 2, 1, 'aaa', 'fdsfsdf', '<p>-sdfsdfsdf</p>\r\n', '2023-03-08', '3'),
(2, 2, 1, 'aaa', 'ชื่อหัวข้อ2', '<p>-fsdfsdf&nbsp;ชื่อหัวข้อ2</p>\r\n', '2023-03-08', '3'),
(3, 3, 1, 'aaa', 'ชื่อหัวข้อ111', '<p>-ชื่อหัวข้อ111&nbsp;สนามฟุตบอล1a</p>\r\n', '2023-03-09', '3'),
(4, 0, 8, 'ชื่อ-นามสกุลstd3', 'dfsfdsdf', '<p>-fdsfsdfsdf</p>\r\n', '2023-03-09', '1'),
(5, 4, 8, 'ชื่อ-นามสกุลstd3', 'sdfsdfdsf', '<p>-sdfsdfdsfsd</p>\r\n', '2023-03-09', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL COMMENT 'รหัส login(fk)',
  `user_code` varchar(15) NOT NULL COMMENT 'รหัสผู้ใช้ระบบ',
  `user_name` varchar(150) NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `user_address` varchar(255) NOT NULL COMMENT 'ที่อยู่',
  `user_tel` varchar(10) NOT NULL COMMENT 'เบอร์โทร',
  `user_email` varchar(150) NOT NULL COMMENT 'อีเมล์',
  `user_note` text NOT NULL COMMENT 'รายละเอียด',
  `user_photo` varchar(150) NOT NULL COMMENT 'รูปภาพ',
  `user_status` varchar(20) NOT NULL COMMENT 'สถานะ',
  `user_date` date NOT NULL COMMENT 'วันที่ลงทะเบียน'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ตารางผู้ดูแลระบบ';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user_code`, `user_name`, `user_address`, `user_tel`, `user_email`, `user_note`, `user_photo`, `user_status`, `user_date`) VALUES
(1, 'adm0001', 'aaa', 'ที่อยู่admin', '0815464654', 'admin@gmail.com', '<p>- admin</p>\r\n', '1678054504.png', '1', '0000-00-00'),
(7, 'std002', 'ชื่อ-นามสกุล2', 'ที่อยู่', '0545457456', 'std002@gmail.com', '<p>-sdfsdfsdfs</p>\r\n', '1677990785.png', '2', '2023-03-05'),
(3, 'id002', 'ชื่อ-นามสกุล    dsadsada', 'ที่อยู่sss', '0545457456', 't002@gmail.com', '<p>asdsadasdasdsadad</p>\r\n\r\n<p>sdfdfsfs</p>\r\n\r\n<p>sdfdsfsdf</p>\r\n', '1677988649.png', '1', '2023-03-04'),
(6, 'std001', 'ชื่อ-นามสกุลstd1', 'ที่อยู่1', '0454545454', 'std001@gmail.com', '<p>-sssss</p>\r\n', '1677989424.jpg', '2', '2023-03-05'),
(8, 'std003', 'ชื่อ-นามสกุลstd3', 'ที่อยู่3', '0454545454', 'std3@gmail.com', '<p>-sdfsfsfsd</p>\r\n', '1677991118.png', '2', '2023-03-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `fileupload`
--
ALTER TABLE `fileupload`
  ADD PRIMARY KEY (`id_fileupload`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `open_project`
--
ALTER TABLE `open_project`
  ADD PRIMARY KEY (`id_open_project`);

--
-- Indexes for table `register_project`
--
ALTER TABLE `register_project`
  ADD PRIMARY KEY (`id_register_project`);

--
-- Indexes for table `register_project_detail`
--
ALTER TABLE `register_project_detail`
  ADD PRIMARY KEY (`id_register_project_detail`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`);

--
-- Indexes for table `submit_project`
--
ALTER TABLE `submit_project`
  ADD PRIMARY KEY (`id_submit_project`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตาราง', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `id_fileupload` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตาราง', AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตาราง(pk)', AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `open_project`
--
ALTER TABLE `open_project`
  MODIFY `id_open_project` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตาราง', AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `register_project`
--
ALTER TABLE `register_project`
  MODIFY `id_register_project` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตาราง', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `register_project_detail`
--
ALTER TABLE `register_project_detail`
  MODIFY `id_register_project_detail` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตาราง', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตาราง', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `submit_project`
--
ALTER TABLE `submit_project`
  MODIFY `id_submit_project` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตาราง', AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
