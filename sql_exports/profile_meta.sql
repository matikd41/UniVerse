-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 20, 2025 at 12:10 AM
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
  `ID` int(11) NOT NULL,
  `email` text NOT NULL,
  `first_name` tinytext NOT NULL,
  `last_name` tinytext NOT NULL,
  `school` text NOT NULL,
  `dob` date NOT NULL,
  `dob_show` tinyint(1) NOT NULL,
  `grad_year` int(4) NOT NULL,
  `grad_year_show` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `profile_meta`
--

INSERT INTO `profile_meta` (`ID`, `email`, `first_name`, `last_name`, `school`, `dob`, `dob_show`, `grad_year`, `grad_year_show`) VALUES
(2, 'johndoe@oakland.edu', 'John', 'Doe', 'Oakland University', '2000-01-01', 1, 2025, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile_meta`
--
ALTER TABLE `profile_meta`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_3` (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `ID_2` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile_meta`
--
ALTER TABLE `profile_meta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
