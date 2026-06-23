-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2026 at 06:29 PM
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
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `jobRef` varchar(10) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `street` varchar(40) NOT NULL,
  `suburb` varchar(40) NOT NULL,
  `state` varchar(3) NOT NULL,
  `postcode` int(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `field` varchar(50) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `skills` text NOT NULL,
  `otherskills` text DEFAULT NULL,
  `status` enum('New','Current','Final') DEFAULT 'New',
  `date_applied` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `jobRef`, `fname`, `lname`, `street`, `suburb`, `state`, `postcode`, `email`, `phone`, `gender`, `dob`, `skills`, `otherskills`, `status`, `date_applied`) VALUES
(1, 'EE101', 'John', 'Doe', '123 Swanston St', 'Melbourne', 'VIC', 3000, 'john@email.com', '0412345678', 'Male', '1995-05-12', 'HTML, CSS', NULL, 'New', '2026-06-20 16:02:37'),
(2, 'EE101', 'Jane', 'Smith', '456 George St', 'Sydney', 'NSW', 2000, 'jane@email.com', '0423456789', 'Female', '1998-08-22', 'HTML, CSS, JS', NULL, 'Current', '2026-06-20 16:02:37'),
(3, 'EE102', 'Alex', 'Jones', '789 Queen St', 'Brisbane', 'QLD', 4000, 'alex@email.com', '0434567890', 'Other', '1993-11-02', 'Figma, UX', NULL, 'Final', '2026-06-20 16:02:37');

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

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `username`, `password`) VALUES
(1, 'Admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

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
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_reference`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

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
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member_contributions`
--
ALTER TABLE `member_contributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
