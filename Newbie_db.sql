-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 19, 2026 at 11:56 PM
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_reference` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `meta` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `responsibilities` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_reference`, `title`, `meta`, `description`, `responsibilities`, `skills`, `deadline`) VALUES
('EE101', 'Frontend Developer', 'Remote • Full-time • Entry', 'Build scalable and responsive user interfaces.', 'Develop responsive UI|Collaborate with team|Improve performance', 'HTML|CSS|JavaScript', '2026-05-30'),
('EE102', 'UI/UX Designer', 'Remote • Full-time', 'Design user-centered interfaces and experiences.', 'Create wireframes|Design in Figma|User research', 'Figma|UX|Research', '2026-05-30'),
('EE103', 'Backend Developer', 'Remote • Full-time', 'Build APIs and server-side logic.', 'Develop APIs|Database design|Security implementation', 'Node.js|MongoDB|API', '2026-05-30'),
('EE104', 'Product Designer', 'Hybrid • Full-time', 'Design product experiences with user-first approach.', 'Create prototypes|UX design|Team collaboration', 'UI|Prototyping|Design Thinking', '2026-05-30'),
('EE105', 'Support Engineer', 'Remote • Entry Level', 'Provide technical support and troubleshooting.', 'Handle issues|Assist users|Documentation', 'Support|Debugging|Communication', '2026-05-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_reference`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
