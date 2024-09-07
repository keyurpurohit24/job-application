-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2024 at 06:36 AM
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
-- Database: `job_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `application_id` int(11) NOT NULL,
  `application_of` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `applied_on` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `application_of`, `status`, `applied_on`, `is_deleted`) VALUES
(2, 44, 'Rejected', '2024-05-30 10:27:26', 1),
(3, 44, 'Rejected', '2024-05-30 10:46:01', 1),
(4, 44, 'Rejected', '2024-05-30 10:49:25', 1),
(5, 50, 'Rejected', '2024-05-30 14:20:06', 1),
(6, 50, 'Rejected', '2024-05-30 14:21:47', 1),
(7, 44, 'Rejected', '2024-05-30 16:45:10', 1),
(8, 41, 'Rejected', '2024-05-30 16:59:47', 1),
(9, 41, 'Rejected', '2024-05-30 17:52:41', 1),
(10, 41, 'Rejected', '2024-05-30 17:53:45', 1),
(11, 41, 'Rejected', '2024-05-30 17:54:34', 1),
(12, 41, 'Rejected', '2024-05-30 17:57:00', 1),
(13, 41, 'Rejected', '2024-05-30 17:58:59', 1),
(14, 41, 'Rejected', '2024-05-30 18:00:02', 1),
(15, 44, 'Rejected', '2024-05-30 18:26:44', 1),
(16, 44, 'Rejected', '2024-05-30 18:29:58', 1),
(17, 44, 'Rejected', '2024-05-30 18:30:57', 0),
(18, 44, 'Rejected', '2024-05-30 18:33:21', 0),
(19, 44, 'Pending', '2024-05-30 18:34:23', 1),
(20, 44, 'Pending', '2024-05-30 18:50:06', 1),
(21, 44, 'Rejected', '2024-05-30 19:28:45', 0),
(22, 44, 'Pending', '2024-05-31 09:31:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_master`
--

CREATE TABLE `course_master` (
  `course_id` smallint(6) NOT NULL,
  `course_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education_details_be`
--

CREATE TABLE `education_details_be` (
  `application_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `university` varchar(60) NOT NULL,
  `course` varchar(50) NOT NULL,
  `cgpa` float NOT NULL,
  `passing_year` year(4) NOT NULL,
  `last_updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education_details_be`
--

INSERT INTO `education_details_be` (`application_id`, `id`, `university`, `course`, `cgpa`, `passing_year`, `last_updated_on`) VALUES
(15, 44, 'GTU', 'IT', 80, '2019', '2024-05-30 18:26:44'),
(22, 44, 'GTU', 'CS', 70, '2010', '2024-05-31 09:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `education_details_hsc`
--

CREATE TABLE `education_details_hsc` (
  `application_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name_of_board` varchar(60) NOT NULL,
  `passing_year` year(4) NOT NULL,
  `percentage` float NOT NULL,
  `last_updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education_details_hsc`
--

INSERT INTO `education_details_hsc` (`application_id`, `id`, `name_of_board`, `passing_year`, `percentage`, `last_updated_on`) VALUES
(15, 44, 'GSEB', '2016', 80, '2024-05-30 18:26:44'),
(22, 44, 'GTU', '2007', 79, '2024-05-31 09:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `education_details_me`
--

CREATE TABLE `education_details_me` (
  `application_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `university` varchar(60) NOT NULL,
  `course` varchar(50) NOT NULL,
  `cgpa` float NOT NULL,
  `passing_year` year(4) NOT NULL,
  `last_updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education_details_ssc`
--

CREATE TABLE `education_details_ssc` (
  `application_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name_of_board` varchar(60) NOT NULL,
  `passing_year` year(4) NOT NULL,
  `percentage` float NOT NULL,
  `last_updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education_details_ssc`
--

INSERT INTO `education_details_ssc` (`application_id`, `id`, `name_of_board`, `passing_year`, `percentage`, `last_updated_on`) VALUES
(15, 44, 'GSEB', '2014', 69, '2024-05-30 18:26:44'),
(16, 44, 'CBSE', '2003', 78, '2024-05-30 18:29:58'),
(17, 44, 'GSEB', '2014', 69, '2024-05-30 18:30:57'),
(18, 44, 'CBSE', '2016', 56, '2024-05-30 18:33:21'),
(19, 44, 'GSEB', '2014', 69, '2024-05-30 18:34:23'),
(20, 44, 'GSEB', '2014', 69, '2024-05-30 18:50:06'),
(21, 44, 'fdsf', '2002', 55, '2024-05-30 19:28:45'),
(22, 44, 'GSEB', '2004', 80, '2024-05-31 09:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `english_lng`
--

CREATE TABLE `english_lng` (
  `application_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `eread` tinyint(4) NOT NULL DEFAULT 0,
  `ewrite` tinyint(4) NOT NULL DEFAULT 0,
  `espeak` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `english_lng`
--

INSERT INTO `english_lng` (`application_id`, `id`, `eread`, `ewrite`, `espeak`) VALUES
(15, 44, 1, 0, 0),
(22, 44, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gujarati_lng`
--

CREATE TABLE `gujarati_lng` (
  `application_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `gread` tinyint(4) NOT NULL DEFAULT 0,
  `gwrite` tinyint(4) NOT NULL DEFAULT 0,
  `gspeak` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gujarati_lng`
--

INSERT INTO `gujarati_lng` (`application_id`, `id`, `gread`, `gwrite`, `gspeak`) VALUES
(15, 44, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hindi_lang`
--

CREATE TABLE `hindi_lang` (
  `application_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `hread` tinyint(4) NOT NULL DEFAULT 0,
  `hwrite` tinyint(4) NOT NULL DEFAULT 0,
  `hspeak` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hindi_lang`
--

INSERT INTO `hindi_lang` (`application_id`, `id`, `hread`, `hwrite`, `hspeak`) VALUES
(15, 44, 1, 1, 1),
(22, 44, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `language_known`
--

CREATE TABLE `language_known` (
  `application_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Hindi` tinyint(4) NOT NULL DEFAULT 0,
  `English` tinyint(4) NOT NULL DEFAULT 0,
  `Gujarati` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language_known`
--

INSERT INTO `language_known` (`application_id`, `id`, `Hindi`, `English`, `Gujarati`) VALUES
(15, 44, 1, 1, 1),
(22, 44, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `laravel_level`
--

CREATE TABLE `laravel_level` (
  `application_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `logged_in` int(11) NOT NULL,
  `logged_in_on` datetime NOT NULL DEFAULT current_timestamp(),
  `logged_in_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mysql_level`
--

CREATE TABLE `mysql_level` (
  `application_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `php_level`
--

CREATE TABLE `php_level` (
  `application_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `application_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `prefered_location` varchar(50) NOT NULL,
  `notice_period` tinyint(4) NOT NULL,
  `expected_ctc` int(11) NOT NULL,
  `current_ctc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refrence_contact_main`
--

CREATE TABLE `refrence_contact_main` (
  `application_id` int(11) NOT NULL,
  `refrence_of` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `relation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_master`
--

CREATE TABLE `role_master` (
  `role_id` tinyint(4) NOT NULL,
  `role` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_master`
--

INSERT INTO `role_master` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'R.user');

-- --------------------------------------------------------

--
-- Table structure for table `technology_known`
--

CREATE TABLE `technology_known` (
  `application_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `php` tinyint(4) NOT NULL DEFAULT 0,
  `mysql` tinyint(4) NOT NULL DEFAULT 0,
  `laravel` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 2,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `gender` char(6) NOT NULL,
  `address` text NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `registered_on` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `first_name`, `last_name`, `email`, `contact`, `gender`, `address`, `profile_photo`, `registered_on`, `is_deleted`) VALUES
(41, 1, 'Admin', '', 'admin@123.com', '0000000000', 'Male', '55,temp address,city,state', '', '2024-05-28 12:11:59', 0),
(42, 2, 'Sumit', 'Shukla', 'sumitshukla@gmail.com', '9898989898', 'Male', '34,down street,kolkata,wes bangal.', '/upload/photo-1596564239694-efb6211dd9ff.jpg', '2024-05-28 12:16:07', 0),
(43, 2, 'Amit', 'Tiwari', 'amitdev@gamil.com', '7878787878', 'Male', '67,near temple,palanpur,gujarat.', '/upload/face_test.jpg', '2024-05-28 12:18:26', 0),
(44, 2, 'Priya', 'Dube', 'priya@gmail.com', '7878787878', 'Female', '11,demo address here,gujarat.', '/upload/inventory_bg.jpg', '2024-05-28 12:31:15', 0),
(45, 2, 'developer', 'testing', 'developertesting@gmail.com', '7878787878', 'Male', 'demo', '/upload/GEC_Bhavnagar_logo.jpeg', '2024-05-28 15:24:54', 0),
(46, 2, '', '', '', '', '', '', '', '2024-05-28 17:20:32', 1),
(49, 2, 'Keyur', 'Purohit', 'kdp@dev.com', '9999999999', 'Male', 'somewhere on earth.', '/upload/awanhoster logo.png', '2024-05-28 18:55:47', 0),
(50, 2, 'Raj', 'Shukla', 'raj@123.com', '7777777777', 'Male', 'uttrakhand', '/upload/profile.png', '2024-05-30 14:18:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_cred`
--

CREATE TABLE `user_cred` (
  `id` int(11) NOT NULL,
  `password` varchar(36) NOT NULL,
  `generated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`id`, `password`, `generated_on`) VALUES
(41, 'a891164c0db8156aae1e36f6c370fca7', '2024-05-28 12:14:03'),
(42, '95935d99ba3f3ec8b0a0678146e32a70', '2024-05-28 12:16:07'),
(43, '96076e794d8cd4f023eeedc5a0af3cab', '2024-05-28 12:18:26'),
(44, 'a7f76b5bb5de72237245b88e5f74e9e8', '2024-05-28 12:31:15'),
(45, '4e91a968748f6c35bcb02cdca377807d', '2024-05-28 15:24:54'),
(46, 'd41d8cd98f00b204e9800998ecf8427e', '2024-05-28 17:20:32'),
(49, '7d2a49aa476ae5384366ed65c99a6d6d', '2024-05-28 18:55:47'),
(50, 'f23c5d1528554770de338b3709bcecbf', '2024-05-30 14:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience_main`
--

CREATE TABLE `work_experience_main` (
  `application_id` int(11) NOT NULL,
  `experience_of` int(11) NOT NULL,
  `company_name` varchar(40) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `application_of` (`application_of`);

--
-- Indexes for table `course_master`
--
ALTER TABLE `course_master`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `education_details_be`
--
ALTER TABLE `education_details_be`
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `education_details_hsc`
--
ALTER TABLE `education_details_hsc`
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `education_details_me`
--
ALTER TABLE `education_details_me`
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `education_details_ssc`
--
ALTER TABLE `education_details_ssc`
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `english_lng`
--
ALTER TABLE `english_lng`
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `gujarati_lng`
--
ALTER TABLE `gujarati_lng`
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `hindi_lang`
--
ALTER TABLE `hindi_lang`
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `language_known`
--
ALTER TABLE `language_known`
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `laravel_level`
--
ALTER TABLE `laravel_level`
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `mysql_level`
--
ALTER TABLE `mysql_level`
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `php_level`
--
ALTER TABLE `php_level`
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `refrence_contact_main`
--
ALTER TABLE `refrence_contact_main`
  ADD KEY `refrence_of` (`refrence_of`),
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `role_master`
--
ALTER TABLE `role_master`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `technology_known`
--
ALTER TABLE `technology_known`
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD KEY `id` (`id`);

--
-- Indexes for table `work_experience_main`
--
ALTER TABLE `work_experience_main`
  ADD KEY `experience_of` (`experience_of`),
  ADD KEY `application_id` (`application_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `course_master`
--
ALTER TABLE `course_master`
  MODIFY `course_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_master`
--
ALTER TABLE `role_master`
  MODIFY `role_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `education_details_be`
--
ALTER TABLE `education_details_be`
  ADD CONSTRAINT `education_details_be_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`application_id`);

--
-- Constraints for table `education_details_hsc`
--
ALTER TABLE `education_details_hsc`
  ADD CONSTRAINT `education_details_hsc_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`application_id`);

--
-- Constraints for table `education_details_me`
--
ALTER TABLE `education_details_me`
  ADD CONSTRAINT `education_details_me_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`application_id`);

--
-- Constraints for table `education_details_ssc`
--
ALTER TABLE `education_details_ssc`
  ADD CONSTRAINT `education_details_ssc_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`application_id`);

--
-- Constraints for table `english_lng`
--
ALTER TABLE `english_lng`
  ADD CONSTRAINT `english_lng_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`application_id`);

--
-- Constraints for table `gujarati_lng`
--
ALTER TABLE `gujarati_lng`
  ADD CONSTRAINT `gujarati_lng_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`application_id`);

--
-- Constraints for table `hindi_lang`
--
ALTER TABLE `hindi_lang`
  ADD CONSTRAINT `hindi_lang_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`application_id`);

--
-- Constraints for table `language_known`
--
ALTER TABLE `language_known`
  ADD CONSTRAINT `language_known_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`application_id`);

--
-- Constraints for table `laravel_level`
--
ALTER TABLE `laravel_level`
  ADD CONSTRAINT `laravel_level_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`application_id`);

--
-- Constraints for table `mysql_level`
--
ALTER TABLE `mysql_level`
  ADD CONSTRAINT `mysql_level_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`application_id`);

--
-- Constraints for table `php_level`
--
ALTER TABLE `php_level`
  ADD CONSTRAINT `php_level_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`application_id`);

--
-- Constraints for table `preferences`
--
ALTER TABLE `preferences`
  ADD CONSTRAINT `preferences_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`application_id`);

--
-- Constraints for table `refrence_contact_main`
--
ALTER TABLE `refrence_contact_main`
  ADD CONSTRAINT `refrence_contact_main_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`application_id`);

--
-- Constraints for table `technology_known`
--
ALTER TABLE `technology_known`
  ADD CONSTRAINT `technology_known_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`application_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role_master` (`role_id`);

--
-- Constraints for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD CONSTRAINT `user_cred_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `work_experience_main`
--
ALTER TABLE `work_experience_main`
  ADD CONSTRAINT `work_experience_main_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`application_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
