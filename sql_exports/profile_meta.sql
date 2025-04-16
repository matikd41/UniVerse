-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2025 at 12:42 AM
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
-- Table structure for table `profile_meta`
--

CREATE TABLE `profile_meta` (
  `first_name` tinytext NOT NULL,
  `last_name` tinytext NOT NULL,
  `school` text NOT NULL,
  `dob` date NOT NULL,
  `dob_show` tinyint(1) NOT NULL,
  `grad_year` year(4) NOT NULL,
  `grad_year_show` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `profile_meta`
--

INSERT INTO `profile_meta` (`first_name`, `last_name`, `school`, `dob`, `dob_show`, `grad_year`, `grad_year_show`) VALUES
('John', 'Doe', 'Oakland University', '2000-01-01', 0, '2027', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
