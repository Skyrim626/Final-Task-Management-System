-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 05:29 PM
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
-- Database: `task_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `Task_ID` int(10) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Priority` varchar(50) NOT NULL DEFAULT 'Low',
  `Due_date` datetime DEFAULT NULL,
  `Date_Created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`Task_ID`, `Title`, `Description`, `Priority`, `Due_date`, `Date_Created`) VALUES
(1, 'Read a Book (The Snowman and the Snowflake)', 'I want to read a book titled Snowman and the Snowflake', 'low', '2024-02-28 15:01:13', '2024-02-27 07:02:25'),
(20, 'Email Newsletter Design', 'Design an engaging email newsletter template for the upcoming marketing campaign. Incorporate brand colors and compelling visuals to increase user engagement.', 'medium', '2024-03-08 15:25:00', '2024-02-27 16:22:46'),
(21, 'Client Meeting Preparation', 'Prepare materials and agenda for an upcoming client meeting scheduled for next week. Coordinate with the sales team to ensure all client requirements are addressed.', 'high', '2024-02-29 03:28:00', '2024-02-27 16:23:10'),
(22, 'Website Bug Fixing', 'Investigate and fix reported bugs on the company website. Test for cross-browser compatibility and ensure smooth user experience across different devices.', 'high', '2024-03-04 04:23:00', '2024-02-27 16:23:42'),
(23, 'Employee Onboarding Documentation', 'Create comprehensive documentation for the employee onboarding process. Include details on HR forms, company policies, and departmental procedures.', 'medium', '2024-03-03 16:23:00', '2024-02-27 16:24:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`Task_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `Task_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
