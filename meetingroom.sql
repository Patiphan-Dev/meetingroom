-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 01:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meetingroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bk_user_id` varchar(255) DEFAULT NULL COMMENT 'รหัสผู้จอง',
  `bk_room_id` varchar(2) DEFAULT NULL COMMENT 'รหัสหอประชุม',
  `bk_str_date` date DEFAULT NULL COMMENT 'วันที่เริ่ม',
  `bk_end_date` date DEFAULT NULL COMMENT 'วันที่สิ้นสุด',
  `bk_str_time` time DEFAULT NULL COMMENT 'เวลาจอง',
  `bk_end_time` time DEFAULT NULL COMMENT 'เวลาออก',
  `bk_slip` varchar(255) DEFAULT NULL COMMENT 'สลิปมัดจำ',
  `bk_slip2` varchar(255) DEFAULT NULL COMMENT 'สลิปส่วนที่เหลือ',
  `bk_node` text DEFAULT NULL COMMENT 'หมายเหตุ',
  `bk_status` varchar(255) NOT NULL DEFAULT '1' COMMENT 'สถานะ (0.ไม่อนุมัติ 1.รอชำระ 2.รอตรวจสอบ 3.อนุมัติ) ',
  `bk_music_brand` varchar(255) DEFAULT NULL COMMENT 'วงดนตรีครบชุดมีเพาเวอร์แอมป์ ตู้ลำโพงมาเอง',
  `bk_music_equipment` varchar(255) DEFAULT NULL COMMENT 'มีเฉพาะเครื่องดนตรี',
  `bk_music_details` varchar(255) DEFAULT NULL COMMENT 'กรณีเป็นแบบที่ 2',
  `bk_sound` varchar(255) DEFAULT NULL COMMENT 'ระบบเสียงพร้อมไมค์โครโฟน 2 ตัว',
  `bk_sound_node` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ',
  `bk_screen_big` varchar(255) DEFAULT NULL COMMENT 'จอภาพขนาดใหญ่บนเวที่ 1 จอ',
  `bk_screen_big_note` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ',
  `bk_tv_left` varchar(255) DEFAULT NULL COMMENT 'จอภาพทีวีด้านข้างฝั่งซ้าย 4 จอ',
  `bk_tv_left_note` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ',
  `bk_tv_right` varchar(255) DEFAULT NULL COMMENT 'จอภาพทีวีด้านข้างฝั่งขวา 4 จอ',
  `bk_tv_right_note` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ',
  `bk_table` varchar(255) DEFAULT NULL COMMENT 'โต๊ะปฏิบัติการหน้าขาว 10 ตัว',
  `bk_table_note` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ',
  `bk_confirm` varchar(255) DEFAULT NULL COMMENT 'ยินยอมชดใช้ค่าเสียหาย',
  `bk_location_for` varchar(255) DEFAULT NULL COMMENT 'ความประสงค์ขอใช้สถานที่',
  `bk_people_number` varchar(255) DEFAULT NULL COMMENT 'จำนวนคน',
  `bk_list1` varchar(255) DEFAULT NULL COMMENT 'ระบบเสียงพร้อมไมค์โครโฟน 2 ตัว',
  `bk_list1_note` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ1',
  `bk_list2` varchar(255) DEFAULT NULL COMMENT 'จอภาพขนาดใหญ่บนเวที่ 1 จอ',
  `bk_list2_note` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ2',
  `bk_list3` varchar(255) DEFAULT NULL COMMENT 'จอภาพทีวีด้านข้างฝั่งซ้าย 4 จอ',
  `bk_list3_note` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ3',
  `bk_list4` varchar(255) DEFAULT NULL COMMENT 'จอภาพทีวีด้านข้างฝั่งขวา 4 จอ',
  `bk_list4_note` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ4',
  `bk_list5` varchar(255) DEFAULT NULL COMMENT 'โต๊ะปฏิบัติการหน้าขาว 10 ตัว',
  `bk_list5_note` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ5',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `bk_user_id`, `bk_room_id`, `bk_str_date`, `bk_end_date`, `bk_str_time`, `bk_end_time`, `bk_slip`, `bk_slip2`, `bk_node`, `bk_status`, `bk_music_brand`, `bk_music_equipment`, `bk_music_details`, `bk_sound`, `bk_sound_node`, `bk_screen_big`, `bk_screen_big_note`, `bk_tv_left`, `bk_tv_left_note`, `bk_tv_right`, `bk_tv_right_note`, `bk_table`, `bk_table_note`, `bk_confirm`, `bk_location_for`, `bk_people_number`, `bk_list1`, `bk_list1_note`, `bk_list2`, `bk_list2_note`, `bk_list3`, `bk_list3_note`, `bk_list4`, `bk_list4_note`, `bk_list5`, `bk_list5_note`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '2024-03-15', '2024-03-16', '20:23:03', '20:23:03', 'uploads/slips/2024-03-11-221104-slipe-admin.jpg', NULL, 'fbgvfcdbfcvbcv', '2', '1', '2', '1', '1', 'test1', '2', 'test2', '1', 'test3', '2', 'test4', '1', 'test5', '2', 'test', '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 11:49:47', '2024-03-11 15:11:04'),
(2, '1', '1', '2024-03-18', '2024-03-21', '01:11:00', '01:11:00', 'uploads/slips/2024-03-11-014411-slipe-admin.jpg', NULL, NULL, '3', '1', '2', '1', '1', 'test1', '2', 'test2', '1', 'test3', '1', 'test4', '2', 'test5', '2', 'test2', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-10 18:07:46', '2024-03-11 15:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(20, '2024_01_12_104109_create_rules_table', 1),
(21, '2024_02_29_093015_create_rooms_table', 1),
(23, '2024_01_12_094225_create_bookings_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อหอประชุม',
  `room_details` text DEFAULT NULL COMMENT 'รายละเอียดหอประชุม',
  `room_img_path` text DEFAULT NULL COMMENT 'รูปภาพ',
  `room_diagram_path` text DEFAULT NULL COMMENT 'แผนภาพ',
  `maintenance` double NOT NULL DEFAULT 0 COMMENT 'ค่าบำรุงสถานที่',
  `utilities` double NOT NULL DEFAULT 0 COMMENT 'ค่าสารณูปโภค',
  `officer_compensation` double NOT NULL DEFAULT 0 COMMENT 'ค่าตอบแทนเจ้าหน้าที่',
  `other_expenses` double NOT NULL DEFAULT 0 COMMENT 'ค่าใช้จ่ายอื่นๆ',
  `total` double NOT NULL DEFAULT 0 COMMENT 'ค่าใช้จ่ายรวม',
  `damage_insurance` double NOT NULL DEFAULT 0 COMMENT 'ค่าประกันความเสียหาย',
  `room_status` varchar(255) NOT NULL DEFAULT '1' COMMENT 'สถานะหอประชุม',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `room_details`, `room_img_path`, `room_diagram_path`, `maintenance`, `utilities`, `officer_compensation`, `other_expenses`, `total`, `damage_insurance`, `room_status`, `created_at`, `updated_at`) VALUES
(1, 'อาคารหอประชุมใหญ่', '<div class=\"page-header\" style=\"flex-shrink: 0; width: 1320px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * .5); padding-left: calc(var(--bs-gutter-x) * .5); margin: 0px 0px 20px; padding-bottom: 9px; border-bottom: 1px solid rgb(238, 238, 238); color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\"><h2 itemprop=\"headline\" style=\"margin-top: 20px; margin-bottom: 10px; line-height: 1.1; font-size: 30px; font-family: inherit;\"><span style=\"font-size: 14px; background-color: var(--bs-modal-bg); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">เพื่อความเป็นระเบียนเรียบร้อยในสนามกีฬา ทาง Bowin Arena ขอความร่วมมือจากผู้มาใช้บริการปฏิบัติตามกฏต่างๆ ดังต่อไปนี้</span><br></h2></div><div itemprop=\"articleBody\" style=\"flex-shrink: 0; width: 1320px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * .5); padding-left: calc(var(--bs-gutter-x) * .5); margin-top: var(--bs-gutter-y); color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\"><ul style=\"margin-bottom: 10px; list-style-type: undefined;\"><li>ห้ามใส่รองเท้าสตั๊ดปุ่มเหล็กลงสนามเด็ดขาด</li><li>ห้ามมิให้ผู้มาใช้บริการสูบบุหรี่บริเวณสนามโดยเด็ดขาด สามารถสูบบุหรี่ในที่ที่ได้จัดไว้ให้เท่านั้น</li><li>ห้ามมีการทะเลาะวิวาทในระหว่างการเล่น ในกรณีที่เกิดการทะเลาะวิวาทขั้นรุนแรง ทางสนามขอสงวนสิทธิ์ในการยกเลิกการเล่นนัดนั้นในทันที</li><li>งดดื่มเครื่องดื่มแอลกอฮอล์และงดใช้สารเสพติดทุกชนิด</li><li>ห้ามนำสัตว์เลี้ยงเข้ามาในบริเวณสนาม</li><li>ห้ามมิให้มีการเล่นการพนันกันในสนาม</li><li>Bowin Arena จะไม่รับผิดชอบใดๆ ในกรณีที่เกิดความเสียหายหรือสูญหายในทรัพย์สิน ขอความกรุณาผู้มาใช้บริการทุกท่านโปรดดูแลทรัพย์สินส่วนตัวอย่างระมัดระวัง</li></ul><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">https://bowinarena.com/images/badminton/shoesbat.jpghttps://bowinarena.com/images/badminton/shoesbat.jpg</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; text-align: center;\"><img src=\"https://bowinarena.com/images/badminton/rule.jpg\" alt=\"\" style=\"border: 0px; max-width: 100%; height: auto;\"></p></div>', 'uploads/room/อาคารหอประชุมใหญ่-2024-03-04-img-1.jpg,uploads/room/อาคารหอประชุมใหญ่-2024-03-04-img-2.jpg,uploads/room/อาคารหอประชุมใหญ่-2024-03-04-img-3.jpg,uploads/room/อาคารหอประชุมใหญ่-2024-03-04-img-4.jpg', 'uploads/diagrams/อาคารหอประชุมใหญ่-2024-03-04-diagram-5.jpg', 15000, 21400, 3600, 0, 40000, 10000, '1', '2024-03-01 18:59:40', '2024-03-04 11:20:49'),
(2, 'อาคารหอประชุมใหญ่2', '<div class=\"page-header\" style=\"flex-shrink: 0; width: 1320px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * .5); padding-left: calc(var(--bs-gutter-x) * .5); margin: 0px 0px 20px; padding-bottom: 9px; border-bottom: 1px solid rgb(238, 238, 238); color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\"><h2 itemprop=\"headline\" style=\"margin-top: 20px; margin-bottom: 10px; line-height: 1.1; font-size: 30px; font-family: inherit;\"><span style=\"font-size: 14px; background-color: var(--bs-modal-bg); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">เพื่อความเป็นระเบียนเรียบร้อยในสนามกีฬา ทาง Bowin Arena ขอความร่วมมือจากผู้มาใช้บริการปฏิบัติตามกฏต่างๆ ดังต่อไปนี้</span><br></h2></div><div itemprop=\"articleBody\" style=\"flex-shrink: 0; width: 1320px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * .5); padding-left: calc(var(--bs-gutter-x) * .5); margin-top: var(--bs-gutter-y); color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\"><ul style=\"margin-bottom: 10px; list-style-type: undefined;\"><li>ห้ามใส่รองเท้าสตั๊ดปุ่มเหล็กลงสนามเด็ดขาด</li><li>ห้ามมิให้ผู้มาใช้บริการสูบบุหรี่บริเวณสนามโดยเด็ดขาด สามารถสูบบุหรี่ในที่ที่ได้จัดไว้ให้เท่านั้น</li><li>ห้ามมีการทะเลาะวิวาทในระหว่างการเล่น ในกรณีที่เกิดการทะเลาะวิวาทขั้นรุนแรง ทางสนามขอสงวนสิทธิ์ในการยกเลิกการเล่นนัดนั้นในทันที</li><li>งดดื่มเครื่องดื่มแอลกอฮอล์และงดใช้สารเสพติดทุกชนิด</li><li>ห้ามนำสัตว์เลี้ยงเข้ามาในบริเวณสนาม</li><li>ห้ามมิให้มีการเล่นการพนันกันในสนาม</li><li>Bowin Arena จะไม่รับผิดชอบใดๆ ในกรณีที่เกิดความเสียหายหรือสูญหายในทรัพย์สิน ขอความกรุณาผู้มาใช้บริการทุกท่านโปรดดูแลทรัพย์สินส่วนตัวอย่างระมัดระวัง</li></ul><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">https://bowinarena.com/images/badminton/shoesbat.jpghttps://bowinarena.com/images/badminton/shoesbat.jpg</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; text-align: center;\"><img src=\"https://bowinarena.com/images/badminton/rule.jpg\" alt=\"\" style=\"border: 0px; max-width: 100%; height: auto;\"></p></div>', 'uploads/room/อาคารหอประชุมใหญ่2-2024-03-07-img-1.jpg,uploads/room/อาคารหอประชุมใหญ่2-2024-03-07-img-2.jpg,uploads/room/อาคารหอประชุมใหญ่2-2024-03-07-img-3.jpg,uploads/room/อาคารหอประชุมใหญ่2-2024-03-07-img-4.jpg,uploads/room/อาคารหอประชุมใหญ่2-2024-03-07-img-5.jpeg', 'uploads/diagrams/อาคารหอประชุมใหญ่2-2024-03-07-diagram-6.jpg', 1111, 2222, 3333, 9999, 44440, 5555, '1', '2024-03-07 11:49:01', '2024-03-07 11:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rule_detail` text DEFAULT NULL COMMENT 'กฎกติกา',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `rule_detail`, `created_at`, `updated_at`) VALUES
(1, '<div class=\"page-header\" style=\"flex-shrink: 0; width: 1320px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * .5); padding-left: calc(var(--bs-gutter-x) * .5); margin: 0px 0px 20px; padding-bottom: 9px; border-bottom: 1px solid rgb(238, 238, 238); color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\"><h2 itemprop=\"headline\" style=\"margin-top: 20px; margin-bottom: 10px; line-height: 1.1; font-size: 30px; font-family: inherit;\">กฎการใช้สนาม</h2></div><div itemprop=\"articleBody\" style=\"flex-shrink: 0; width: 1320px; max-width: 100%; padding-right: calc(var(--bs-gutter-x) * .5); padding-left: calc(var(--bs-gutter-x) * .5); margin-top: var(--bs-gutter-y); color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><img src=\"https://bowinarena.com/images/badminton/bad2.jpg\" width=\"200\" height=\"366\" style=\"border: 0px; max-width: 100%; height: auto; float: left; margin-right: 20px; margin-left: 20px;\">เพื่อความเป็นระเบียนเรียบร้อยในสนามกีฬา ทาง Bowin Arena ขอความร่วมมือจากผู้มาใช้บริการปฏิบัติตามกฏต่างๆ ดังต่อไปนี้</p><ul style=\"margin-bottom: 10px; list-style-type: undefined;\"><li>ห้ามใส่รองเท้าสตั๊ดปุ่มเหล็กลงสนามเด็ดขาด</li><li>ห้ามมิให้ผู้มาใช้บริการสูบบุหรี่บริเวณสนามโดยเด็ดขาด สามารถสูบบุหรี่ในที่ที่ได้จัดไว้ให้เท่านั้น</li><li>ห้ามมีการทะเลาะวิวาทในระหว่างการเล่น ในกรณีที่เกิดการทะเลาะวิวาทขั้นรุนแรง ทางสนามขอสงวนสิทธิ์ในการยกเลิกการเล่นนัดนั้นในทันที</li><li>งดดื่มเครื่องดื่มแอลกอฮอล์และงดใช้สารเสพติดทุกชนิด</li><li>ห้ามนำสัตว์เลี้ยงเข้ามาในบริเวณสนาม</li><li>ห้ามมิให้มีการเล่นการพนันกันในสนาม</li><li>Bowin Arena จะไม่รับผิดชอบใดๆ ในกรณีที่เกิดความเสียหายหรือสูญหายในทรัพย์สิน ขอความกรุณาผู้มาใช้บริการทุกท่านโปรดดูแลทรัพย์สินส่วนตัวอย่างระมัดระวัง</li></ul><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><img src=\"https://bowinarena.com/images/badminton/shoesbat.jpg\" alt=\"\" style=\"border: 0px; max-width: 100%; height: auto; float: right;\"></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; text-align: center;\"><img src=\"https://bowinarena.com/images/badminton/rule.jpg\" alt=\"\" style=\"border: 0px; max-width: 100%; height: auto;\"></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\"><span style=\"font-weight: 700;\">เพื่อประโยชน์ของนักกีฬาแบดมินตันทุกท่าน</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">ทางสนามแบดมินตัน Bowin Arena ได้ใช้พื้นยางมาตรฐานระดับโลกสำหรับจัดการแข่งขัน จึงขอความร่วมมือนักกีฬาทุกท่านให้ช่วยกันรักษาสภาพสนามให้พร้อมใช้และสมบูรณ์<br>เราจึงมีข้อห้ามเพิ่มเติมสำหรับรองเท้าที่จะใช้บริการสนามดังนี้</p><ul style=\"margin-bottom: 10px;\"><li>ห้ามรองเท้าที่เปื้อนดินโคลน กรวด ทราย กรุณาทำความสะอาดรองเท้าก่อนเข้ามาในสนาม ทางที่ดีที่สุดคือถือรองเท้าเข้ามาเปลี่ยนที่สนาม</li><li>ห้ามใช้รองเท้ากีฬาประเภทอื่นๆ ที่ไม่ใช่รองเท้าสำหรับกีฬาแบดมินตัน เช่นพื้นรองเท้าสีดำ/สีเขียวที่ไม่ใช่พื้นสียางธรรมชาติ,<br>รองเท้าแตะ, รองเท้าเกี๊ยะ, รองเท้าส้นสูง, รองเท้านักเรียน และรองเท้าสตั๊ดมีปุ่ม</li></ul><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">เนื่องจากพื้นรองเท้าดังกล่าวจะสร้างความเสียหายให้กับพื้นยางสนามแบดมินตันเป็นอย่างมาก จึงขอแนะนำนักกีฬาทุกท่านว่าควรใช้รองเท้ากีฬาแบดมินตันที่เหมาะสมสำหรับการเล่นบนสนามแบดมินตันพื้นยางเท่านั้น</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; text-align: center;\"><span style=\"font-weight: 700;\">ขอความร่วมมือนักกีฬาทุกท่าน และขอขอบคุณที่ให้ความร่วมมือ</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; text-align: center;\"><span style=\"font-weight: 700;\">LOVE Badminton, LOVE Bowin Arena sport club</span></p></div>', '2024-03-01 19:08:06', '2024-03-01 19:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL COMMENT 'ชื่อผู้ใช้งาน',
  `password` varchar(255) DEFAULT NULL COMMENT 'รหัสผ่าน',
  `fullname` varchar(255) DEFAULT NULL COMMENT 'ชื่อ-นามสกุล',
  `phone` varchar(255) DEFAULT NULL COMMENT 'เบอร์โทร',
  `housenumber` varchar(255) DEFAULT NULL COMMENT 'บ้านเลขที่',
  `village` varchar(255) DEFAULT NULL COMMENT 'หมู่ที่',
  `alley` varchar(255) DEFAULT NULL COMMENT 'ตรอก/ซอย',
  `road` varchar(255) DEFAULT NULL COMMENT 'ถนน',
  `subdistrict` varchar(255) DEFAULT NULL COMMENT 'ตำบล/แขวง',
  `district` varchar(255) DEFAULT NULL COMMENT 'อำเภอ/เขต',
  `province` varchar(255) DEFAULT NULL COMMENT 'จังหวัด',
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT 'สถานะ',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `phone`, `housenumber`, `village`, `alley`, `road`, `subdistrict`, `district`, `province`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$12$gKKprchA0FstD7hJNEX4wewvkr02/21rTLhuCxQTjSieEX5UOGJqO', 'ปฏิภาณ นามเวช', '0925728232', '888', '7', 'พูลเจริญ', 'บางนา-ตราด', 'พระพุทธบาทเชียงคาน', 'พระนครศรีอยุธยา', 'สมุทรปราการ', '9', 'ZFfkoYxTSs701baHbZgnEq8XlvTDE6RmKKEejYz8CQgEWf2C3sqGn97Gz7JM', '2024-03-01 12:41:31', '2024-03-01 12:41:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
