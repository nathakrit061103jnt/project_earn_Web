-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 07:57 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ml_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `a_id` int(11) NOT NULL,
  `a_username` varchar(100) NOT NULL,
  `a_password` text NOT NULL,
  `a_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`a_id`, `a_username`, `a_password`, `a_name`) VALUES
(1, 'admin', 'admin@123', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attractions`
--

CREATE TABLE `tbl_attractions` (
  `at_id` int(11) NOT NULL COMMENT 'ไอดี',
  `at_name` varchar(100) NOT NULL COMMENT 'ชื่อสถานที่',
  `at_profile` text NOT NULL COMMENT 'รูปภาพหลัก',
  `at_detial` text NOT NULL COMMENT 'ราละเอียด',
  `at_img1` text NOT NULL COMMENT 'รูปภาพประกอบ1',
  `at_img2` text NOT NULL COMMENT 'รูปภาพประกอบ2',
  `at_img3` text NOT NULL COMMENT 'รูปภาพประกอบ3',
  `at_location` text NOT NULL COMMENT 'ที่ตั้งสถานที่ท่องเที่ยว\r\n                                                หมู่บ้าน ตำบล อำเภอ',
  `at_p` varchar(100) NOT NULL COMMENT 'พิกัด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางสถานที่ท่องเที่ยว';

--
-- Dumping data for table `tbl_attractions`
--

INSERT INTO `tbl_attractions` (`at_id`, `at_name`, `at_profile`, `at_detial`, `at_img1`, `at_img2`, `at_img3`, `at_location`, `at_p`) VALUES
(1, 'ัสกายวอล์ค เชียงคาน', '6056eb910ca61.png', 'แลนด์มาร์คแห่งใหม่ของเชียงคาน ต้องห้ามพลาด! สกายวอล์ค เชียงคาน หรือสกายวอล์ค ภูคกงิ้ว เป็นที่เที่ยวใหม่เชียงคาน ที่เพิ่งเปิดให้เข้าชมได้ไม่นาน ที่นี่เป็นสกายวอล์คที่สูงเทียบเท่ากับตึก 30 ชั้นเลยทีเดียว และไฮไลท์ก็คือ มีทางเดินที่ทำด้วยกระจกยาวกว่า 100 เมตร เป็นจุดที่น่าหวาดเสียวและตื่นเต้นสุดๆ เป็นจุดชมวิวที่สวยงามมากๆ ทีเดียว', '6056eb910ca7f.png', '6056eb910ca9a.png', '6056eb910cabc.png', 'อุทยานแห่งชาติภูเรือ ตำบลหนองบัว อำเภอภูเรือ จังหวัดเลย', 'https://goo.gl/maps/VAjc1ZLSKRTxBjz86');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bulletin_board`
--

CREATE TABLE `tbl_bulletin_board` (
  `bb_id` int(11) NOT NULL COMMENT 'ไอดี',
  `bb_name` varchar(100) NOT NULL COMMENT 'หัวข้อข่าว',
  `bb_detail` text NOT NULL COMMENT 'รายละเอียดข่าว',
  `bb_date` date NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่ของข่าว',
  `bb_image` text NOT NULL COMMENT 'ภาพข่าว'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางกระดานข่าว';

--
-- Dumping data for table `tbl_bulletin_board`
--

INSERT INTO `tbl_bulletin_board` (`bb_id`, `bb_name`, `bb_detail`, `bb_date`, `bb_image`) VALUES
(2, 'a', 'sss', '2021-04-10', '6056e9008d72a.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotel`
--

CREATE TABLE `tbl_hotel` (
  `h_id` int(11) NOT NULL COMMENT 'ไอดีโรงเเรม',
  `h_name` varchar(100) NOT NULL COMMENT 'ชื่อโรงเเรม',
  `h_profile` text NOT NULL COMMENT 'รูปหลักโรงเเรม',
  `h_detail` text NOT NULL COMMENT 'รายละเอียดโรงเเรม',
  `h_img1` text NOT NULL COMMENT 'รูปภาพเสริม1',
  `h_img2` text NOT NULL COMMENT 'รูปภาพเสริม2',
  `h_img3` text NOT NULL COMMENT 'รูปภาพเสริม3',
  `h_address` text NOT NULL COMMENT 'ที่อยู่โรงเเรม',
  `h_tel` varchar(20) NOT NULL COMMENT 'เบอร์ติดต่อ',
  `h_price` float NOT NULL COMMENT 'ราคาที่พัก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางข้อมูลโรงเเรม';

--
-- Dumping data for table `tbl_hotel`
--

INSERT INTO `tbl_hotel` (`h_id`, `h_name`, `h_profile`, `h_detail`, `h_img1`, `h_img2`, `h_img3`, `h_address`, `h_tel`, `h_price`) VALUES
(1, 'Ban Kaeng Resort', '6056edec27002.png', 'ให้บริการที่พักปรับอากาศในอำเภอเชียงคาน ที่พักนี้ยังมีสิ่งอำนวยความสะดวก เช่น แผนกต้อนรับเปิดตลอด 24 ชม. มีอินเทอร์เน็ตไร้สาย (WiFi) ฟรี ในทุกพื้นที่ของที่พัก รีสอร์ทนี้มีที่จอดรถส่วนตัวฟรีและจักรยานสำหรับใช้งานฟรีสำหรับท่านที่ต้องการเที่ยวชมพื้นที่โดยรอบห้องพักทุกห้องของรีสอร์ทนี้มีโต๊ะทำงานโทรทัศน์ และห้องน้ำส่วนตัวBan Kaeng Resort มีอาหารเช้าแบบอาหารจานเดียวหรือแบบเอเชียให้บริการที่พักมีบริการรถยนต์เช่า สำหรับการเข้าพัก 2 ท่าน', '6056edec27b63.png', '6056edec284b3.png', '6056edec28ffa.png', '', '', 2500),
(2, 'The Pud dee', '6056ee3425033.png', 'The Pud dee ตั้งอยู่ในย่านถนนคนเดินเชียงคานของอำเภอเชียงคาน และให้บริการที่พักพร้อมสวนหย่อม และอินเทอร์เน็ตไร้สาย (WiFi) ฟรี อินน์มีที่จอดรถส่วนตัวฟรี และมีจักรยานสำหรับใช้งานฟรีสำหรับท่านที่ต้องการเที่ยวชมพื้นที่โดยรอบอีกด้วยห้องพักที่อินน์มีโทรทัศน์ และห้องน้ำส่วนตัวพร้อมเครื่องเป่าผมที่พักมีอาหารเช้า สำหรับการเข้าพัก 2 ท่าน', '6056ee3425192.png', '6056ee34251a5.png', '6056ee3425e27.png', 'ss', '0612', 5997);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `u_id` int(11) NOT NULL COMMENT 'auto id  ผู้ใช้งาน',
  `u_email` varchar(100) NOT NULL COMMENT 'อีเมลผู้ใช้งาน',
  `u_password` text NOT NULL COMMENT 'รหัสผ่าน',
  `u_tel` varchar(20) NOT NULL COMMENT 'เบอร์ติดต่อ',
  `u_name` varchar(100) NOT NULL COMMENT 'ชื่อ',
  `u_address` text NOT NULL COMMENT 'ที่อยู่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางผู้ใช้งาน';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `a_username` (`a_username`);

--
-- Indexes for table `tbl_attractions`
--
ALTER TABLE `tbl_attractions`
  ADD PRIMARY KEY (`at_id`);

--
-- Indexes for table `tbl_bulletin_board`
--
ALTER TABLE `tbl_bulletin_board`
  ADD PRIMARY KEY (`bb_id`);

--
-- Indexes for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_attractions`
--
ALTER TABLE `tbl_attractions`
  MODIFY `at_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดี', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bulletin_board`
--
ALTER TABLE `tbl_bulletin_board`
  MODIFY `bb_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดี', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีโรงเเรม', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto id  ผู้ใช้งาน';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
