-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2019 at 11:52 PM
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
(5, 'นอนเลยค่ะ', '2019-05-03 01:32:28', 2, 2),
(6, 'สวดมนต์ เข้าวัด ทำบุญ 9 วัดไปเลยค่า', '2019-05-03 09:11:31', 3, 1),
(7, 'โซฟีคิดว่าไข่ค่ะ ไม่งั้นไก่จะเกิดได้ไงละค่ะ ต้องออกมาจากไข่ก่อนค่ะ คริคริ', '2019-05-03 09:42:36', 6, 4),
(8, 'เรื่องนี้แอดจะไม่กุ้ง เอ้ยยุ่ง!!', '2019-05-04 03:14:47', 5, 3),
(9, 'ไก่เกิดก่อนครับ โดยทีมวิจัยจากมหาวิทยาลัย Sheffield และ Warwick ในประเทศอังกฤษ ได้ค้นพบโปรตีน Ovocledidin-17 (OC-17) ซึ่งจำเป็นในการเริ่มต้นและเร่งกระบวนการตกผลึกของเปลือกไข่ให้แข็ง ทำให้ไก่สามารถออกไข่ได้ภายใน 24 ชั่วโมง (เป็นเหตุผลว่าทำไมแม่ไก่ถึงสามารถออกไข่ฟองใหญ่ ๆ ให้เรากินได้ทุกวัน) ซึ่งเป็นโปรตีนที่มีเฉพาะในรังไข่ของไก่เท่านั้น จึงสรุปได้ว่าไก่เกิดก่อนไข่ เพราะไก่ต้องมีโปรตีนตัวนี้ก่อนถึงจะออกไข่ได้', '2019-05-04 04:36:10', 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
