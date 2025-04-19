-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2025 at 12:40 AM
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
-- Database: `universe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `professorreviews`
--

CREATE TABLE `professorreviews` (
  `Course_Number` varchar(50) NOT NULL,
  `Online_Class` tinyint(1) NOT NULL,
  `Rating` text NOT NULL,
  `Difficulty` text NOT NULL,
  `Would_Take_Again` varchar(20) NOT NULL,
  `Textbooks_Required` varchar(20) NOT NULL,
  `Attendance_Required` varchar(20) NOT NULL,
  `Grade_Received` text NOT NULL,
  `Review` text NOT NULL,
  `professor_id` int(11) NOT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professorreviews`
--

INSERT INTO `professorreviews` (`Course_Number`, `Online_Class`, `Rating`, `Difficulty`, `Would_Take_Again`, `Textbooks_Required`, `Attendance_Required`, `Grade_Received`, `Review`, `professor_id`, `date`) VALUES
('MTH1234', 0, '5 - Excellent', '1 - Very Easy', 'Yes', 'No', 'No', 'A', 'test', 1, '2025-04-19'),
('EGR2124', 0, '5  - Excellent', '5 - Extremely Difficult', 'Yes', 'No', 'Yes', 'Rather not say', 'AAAAAAAAAAAAAAAAAAAAAAAAAA', 2, '2025-04-19'),
('EGR1234', 0, '1 - Awful', '5 - Extremely Difficult', 'No', 'Yes', 'Yes', 'Audit/No Grade', 'fkjgdflkgjflgjslfjk', 5, '2025-04-19'),
('BIO1000', 0, '3 - Good', '3 - Average', 'Yes', 'Yes', 'Yes', 'B', 'xcvxcm,vnxcmxcn,', 1, '2025-04-19'),
('EGR5000', 0, '5  - Excellent', '1 - Very Easy', 'Yes', 'Yes', 'Yes', 'A', 'xcvxc', 5, '2025-04-19'),
('ENG1234', 0, '1 - Awful', '5 - Extremely Difficult', 'No', 'Yes', 'Yes', 'A', 'no comment', 9, '2025-04-19'),
('CSI4567', 0, '5  - Excellent', '1 - Very Easy', 'Yes', 'Yes', 'Yes', 'A', 'good guy', 6, '2025-04-19'),
('MTH4321', 0, '5  - Excellent', '1 - Very Easy', 'Yes', 'Yes', 'Yes', 'A', 'date test', 9, '2025-04-19'),
('MTH4321', 0, '5  - Excellent', '1 - Very Easy', 'Yes', 'Yes', 'Yes', 'A', 'date test', 9, '2025-04-19'),
('MTH4321', 0, '5  - Excellent', '1 - Very Easy', 'Yes', 'Yes', 'Yes', 'A', 'tiem test 2', 9, '2025-04-19'),
('MTH4321', 0, '5  - Excellent', '1 - Very Easy', 'Yes', 'Yes', 'Yes', 'A', 'test 3', 9, '2025-04-19'),
('te', 0, '5  - Excellent', '1 - Very Easy', 'Yes', 'Yes', 'Yes', 'A', 'a', 9, '2025-04-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `professorreviews`
--
ALTER TABLE `professorreviews`
  ADD KEY `professor_foreignkey` (`professor_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `professorreviews`
--
ALTER TABLE `professorreviews`
  ADD CONSTRAINT `professor_foreignkey` FOREIGN KEY (`professor_id`) REFERENCES `professors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
