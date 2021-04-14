-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2021 at 08:29 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(255) UNSIGNED NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `content` text NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `date`, `content`, `link`) VALUES
(1, '2020-10-12 13:10:28', 'Screening exam for 2020/2021 section is currently scheduled for 25th October 2020. Pick up your form at the school or click this link to apply.', 'https://facebook.com'),
(2, '2020-12-09 18:23:46', 'Hello, a new announcement. This is why we should not be posting shor annoucement', ''),
(3, '2020-12-09 18:25:13', 'Hello, a new announcement. This is why we should not be posting shor annoucement', ''),
(4, '2020-12-09 20:43:17', 'A new announcement that is really long and is still going', ''),
(5, '2020-12-09 23:34:08', 'A new announcement that is really long and is still going on with this', ''),
(6, '2020-12-09 23:38:22', 'A new announcement that is really long and is still going on with this', ''),
(7, '2020-12-10 15:00:06', 'A new announcement that is really long and is still going on with this', ''),
(8, '2020-12-10 15:01:33', 'A new announcement that is really long and is still going on with this', ''),
(9, '2020-12-10 15:01:37', 'A new announcement that is really long and is still going on with this', 'http://twiiter'),
(10, '2020-12-17 15:31:58', 'Academic session for second term 2021/2022 resumes on April 15th. Forms are currently available for enrollment before that day. Schools fees collection would start at the day of resumption.\r\n\r\n', 'https://facebook.com/faithmodelonitsha');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(255) UNSIGNED NOT NULL,
  `title` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `source` varchar(255) NOT NULL DEFAULT 'direct',
  `schedule` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'new',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `title`, `type`, `full_name`, `phone_number`, `source`, `schedule`, `status`, `date`) VALUES
(3, 'Mr', 'worker', 'Justice', '07069988881', 'direct', '', 'new', '2020-10-12 13:32:17'),
(4, '', '', 'Mama P', '08139268221', 'direct', 'two_weeks', 'new', '2020-10-16 17:37:45'),
(5, 'Mr', 'worker', 'Paul Princewill', '07061988188', 'direct', '', 'new', '2020-12-17 12:46:06'),
(6, 'Mr', 'worker', 'Paul Princewill', '07061988188', 'direct', '', 'new', '2020-12-17 12:56:07'),
(7, 'Mr', 'worker', 'Paul Princewill', '07061540102', 'direct', '', 'new', '2020-12-17 13:00:12'),
(8, 'Mr', 'worker', 'Paul Princewill', '07061540102', 'direct', '', 'new', '2020-12-17 13:01:02'),
(10, 'Mrs', 'worker', 'Justice', '07061540101', 'direct', '', 'new', '2021-03-25 15:12:44'),
(11, 'Mr', 'worker', 'Paul Princewill', '07061988188', 'direct', '', 'new', '2021-03-25 15:35:35'),
(12, 'Mr', 'parent', 'Paul', '08140731560', 'direct', '', 'new', '2021-03-25 15:37:51'),
(13, 'Mrs', 'parent', 'SHoe', '07061988182', 'direct', '', 'new', '2021-03-25 15:48:16'),
(14, 'Mr', 'prospect', 'Paul Princewill', '07061988180', 'direct', '', 'new', '2021-03-25 16:22:47'),
(15, 'Mr', 'parent', 'Paul Princewil', '08140731567', 'direct', '', 'new', '2021-03-25 16:25:23'),
(16, 'Mr', 'worker', 'Paul Princewil', '07061988189', 'direct', '', 'new', '2021-03-25 16:25:44'),
(17, 'Mr', 'prospect', 'Paul Oghenemine', '07061540104', '07061988188', '', 'new', '2021-03-25 16:33:26'),
(18, 'Mr', 'prospect', 'Justice', '08140731565', '07061988188', '', 'new', '2021-03-30 08:49:54'),
(19, 'Mr', 'friend', 'Paul Princewil', '07061540103', 'direct', '', 'new', '2021-04-01 13:39:29'),
(20, 'Mr', 'worker', 'Paul Princewil', '070619881889', 'direct', '', 'new', '2021-04-02 06:42:57'),
(21, 'Mr', 'worker', 'Paul Princewill', '0706198818888', 'direct', '', 'new', '2021-04-02 07:53:36'),
(22, 'Mr', 'prospect', 'Paul Princewill', '07061540100', '0706198818888', '', 'new', '2021-04-02 07:55:22'),
(23, 'Mr', 'prospect', 'Paul Princewill', '07061540105', '0706198818888', '', 'new', '2021-04-02 07:55:45'),
(24, 'Mr', 'prospect', 'Paul Princewill', '07061988188889', '0706198818888', '', 'new', '2021-04-02 08:06:23'),
(25, '', '', 'Paul Princewill', '08140731560', 'direct', '', 'new', '2021-04-02 14:21:13'),
(26, '', '', 'Justice', '07069988881', 'direct', '', 'new', '2021-04-02 14:43:53'),
(27, '', '', 'Paul', '0706998856', '07061988188', '', 'new', '2021-04-02 15:24:50'),
(28, '', 'lead', 'Paul Princewill', '07061988152', '07061988188', 'none', 'new', '2021-04-02 19:49:32'),
(29, '', 'lead', 'Paul', '070699882355', '07061988188', 'none', 'new', '2021-04-02 19:51:22'),
(30, '', 'lead', 'Peter', '078213874273', '07061988188', 'next_month', 'new', '2021-04-02 19:54:02'),
(31, '', 'lead', 'Paul', '0706998', '07061988188', 'none', 'new', '2021-04-02 20:15:32'),
(32, '', 'lead', 'Mama P', '08139268222', '07061988188', 'two_weeks', 'new', '2021-04-02 20:17:55'),
(33, '', 'lead', 'Mama P', '08139268227', '07061988188', 'next_week', 'new', '2021-04-02 20:25:02'),
(34, '', 'lead', 'Mark', '07061399188', 'direct', 'none', 'new', '2021-04-03 07:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(255) NOT NULL,
  `title` varchar(200) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `title`, `value`) VALUES
(1, 'admin_password', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
