-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2019 at 10:12 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'เรื่องทั่วไป'),
(2, 'เรื่องเรียน'),
(3, '--ทั้งหมด--');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(20148) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `post_date`, `user_id`, `post_id`) VALUES
(1, 'พับกบ แฮร่ พบกับ นี่เล้ยยยย นมสูงอัดเม็ด สูงจริง ไม่อิงอร ไม่พอใจยินดีคืนเงิน', '2019-05-03 00:18:09', 2, 3),
(2, 'โหนบาร์ แล้วม้วนหน้าด้วยท่าเฮลิคอปเตอร์ค่าาาา ยืดแน่นอนน', '2019-05-03 00:34:59', 4, 3),
(3, 'กินนมตราหมีแพนด้า สูงจริงค่ะ นี่ขึ้นมา 4 ค่ะ 4 กิโล ผ่ามพามม!!', '2019-05-03 00:49:51', 3, 3),
(4, 'แอดว่าไก่ค่ะเพราะว่า ก ข ค ง ไก่มาก่อนไข่เห็นๆ', '2019-05-03 01:20:19', 5, 4),
(7, 'โซฟีคิดว่าไข่ค่ะ ไม่งั้นไก่จะเกิดได้ไงละค่ะ ต้องออกมาจากไข่ก่อนค่ะ คริคริ', '2019-05-03 09:42:36', 6, 4),
(8, 'เรื่องนี้แอดจะไม่กุ้ง เอ้ยยุ่ง!!', '2019-05-04 03:14:47', 5, 3),
(9, 'ไก่เกิดก่อนครับ โดยทีมวิจัยจากมหาวิทยาลัย Sheffield และ Warwick ในประเทศอังกฤษ ได้ค้นพบโปรตีน Ovocledidin-17 (OC-17) ซึ่งจำเป็นในการเริ่มต้นและเร่งกระบวนการตกผลึกของเปลือกไข่ให้แข็ง ทำให้ไก่สามารถออกไข่ได้ภายใน 24 ชั่วโมง (เป็นเหตุผลว่าทำไมแม่ไก่ถึงสามารถออกไข่ฟองใหญ่ ๆ ให้เรากินได้ทุกวัน) ซึ่งเป็นโปรตีนที่มีเฉพาะในรังไข่ของไก่เท่านั้น จึงสรุปได้ว่าไก่เกิดก่อนไข่ เพราะไก่ต้องมีโปรตีนตัวนี้ก่อนถึงจะออกไข่ได้', '2019-05-04 04:36:10', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(2048) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `post_date`, `cat_id`, `user_id`) VALUES
(3, 'กินนมแล้วทำไมไม่สูงหรอคะ', 'กินนมอัดเม็ดทุกวันแต่ไม่สูงสักทีค่ะ ', '2019-04-30 22:01:34', 1, 1),
(4, 'ไข่กับไก่อะไรเกิดก่อนกันค๊าา', 'สงสัยมานานแล้ว ส่วนตัวคิดว่าไก่ค่ะ เพื่อนๆชาวกากกากคิดว่าไงคะ', '2019-05-03 00:34:06', 1, 4),
(5, 'เวลาเรียนเป็นแบบนี้ไหมคะ...', 'เวลาเรียนคือ จขกท รู้สึกว่า จะง่วงค่ะ ชอบเปนคาบหลังกินช้าวกลางวัน เพื่อนๆ ใครมีปัญหาแบบนี้บ้างไหมคะ แล้วแก้ไขยังไงดี เพราะเรียนแบบง่วงๆ มันม่วง เอ้ย! มันง่วงอะค่ะ ', '2019-05-05 13:25:43', 2, 2),
(6, 'ต้องกินอะไรที่ทำให้สอบได้คะแนนดีๆคะ', 'คนที่สอบได้คะเเนนดีๆนี่เขากินอะไรกันคะ จขกท จะได้ไปหามากินบ้าง อ่านแล้วไม่เข้าหัวเลยค่ะ เห้อ เห้อ เห้อๆๆๆๆๆๆๆๆๆๆๆ', '2019-05-05 14:42:25', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `role` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `name`, `gender`, `email`, `role`) VALUES
(1, 'muffin', '5555', 'ณัฐณพิน ไชยศรี', 'f', 'natnapin_2019@gmail.com', 'm'),
(2, 'joinstick', '040109', 'กัญญาวีร์ ศรีคงแก้ว', 'f', 'joy.kanyawee1997@gmail.com', 'm'),
(3, 'minnie', '3333', 'มินนี่ เฉยเฉย', 'f', 'minnie_s@gmail.com', 'm'),
(4, 'koenkotic', 'kkoen', 'เขื่อน ดนัย', 'm', 'koenotic_za@gmail.com', 'm'),
(5, 'admin', 'ad1234', 'แอดมิน', 'o', 'admin1234@gmail.com', 'a'),
(6, 'Sofy', 'so1234', 'นางฟ้า โซฟี', 'f', 'sofylala@gmail.com', 'm'),
(8, 'pukky', 'thumbal', 'ภูริเดช ทุมบาล', 'm', 'pukky_za@gmail.com', 'm'),
(9, 'member', 'mem1234', 'ไอแอม สมาชิก', 'o', 'member1234@gmail.com', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
