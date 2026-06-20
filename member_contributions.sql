-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2026 at 09:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Newbie_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `member_contributions`
--

CREATE TABLE `member_contributions` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `project_1_tasks` text DEFAULT NULL,
  `project_2_tasks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_contributions`
--

INSERT INTO `member_contributions` (`id`, `student_id`, `member_name`, `project_1_tasks`, `project_2_tasks`) VALUES
(1, 'j24041246', 'Ong Lun Hang', 'Taking part of HTML and CSS building and creating about page', 'Creating basics setting of database and taking about table'),
(2, 'j25044579', 'Raima Mehreen Muskan', 'Taking part of Form application and design', 'Making application.html to php and make a better validation and security and process_eoi.php'),
(3, 'j26046174', 'Nahian Arshad', 'Home page development and Navigation Part', 'Improve and fix homepage and creating manage.php for HR management'),
(4, 'j25045535', 'Md Yeasin Tanvir', 'Designer Assistance and main taking part of Job Description', 'Creating job table in database and giving help to other group member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member_contributions`
--
ALTER TABLE `member_contributions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member_contributions`
--
ALTER TABLE `member_contributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
