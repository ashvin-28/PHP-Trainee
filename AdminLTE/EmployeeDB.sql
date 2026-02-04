-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2026 at 04:13 AM
-- Server version: 8.0.44-0ubuntu0.22.04.2
-- PHP Version: 8.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `EmployeeDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int NOT NULL,
  `firstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmPassword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phonenumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `hobbies` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `country` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `image` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `firstName`, `lastName`, `email`, `password`, `confirmPassword`, `address`, `phonenumber`, `gender`, `hobbies`, `country`, `image`) VALUES
(127, 'Ashvin', 'User', 'testCompany@gmail.com', '$2y$10$07aiLhRrPE140C5UpuQHn.gUYFOl/orLaFdC1zjKFnFAkJxG5Eqpy', '$2y$10$WOKERSSs2t3zxvXa.3V3NOm30zU62dShqbSYCsIVoJ79kbmvZsHGe', '20,gdgd', '111222333', 'Male', 'Playing', 'India', 0x75706c6f61642f646f776e6c6f61642e6a706567),
(138, 'Test', 'User', 'test2@gmail.com', '$2y$10$zhL4G2MQVHM1C3SBEpu5S.HI6IfYLX8OR/lM5ThK2xX/2yF1tp/nG', '$2y$10$zhL4G2MQVHM1C3SBEpu5S.HI6IfYLX8OR/lM5ThK2xX/2yF1tp/nG', 'Thiersteinerallee 17', '1112223334', 'Male', 'Playing', 'India', 0x75706c6f61642f646f776e6c6f6164202834292e6a706567),
(141, 'Test', 'User', 'test4@gmail.com', '$2y$10$81bz0IcGWV0cVyl7WZGgUu6/d8CeCdLG3US1sIhJoylEv5n7ZSnMG', '$2y$10$81bz0IcGWV0cVyl7WZGgUu6/d8CeCdLG3US1sIhJoylEv5n7ZSnMG', '20,', '1112223334', 'Male', 'Playing', 'India', 0x75706c6f61642f646f776e6c6f6164202833292e6a706567),
(146, 'Conan', 'Brittany', 'testdev@gmail.com', '$2y$10$fXRrBjmkVWw3Fe/UqQQWDekRLGCKYgfe.cKlsj5FICsStE62leC2a', '$2y$10$fXRrBjmkVWw3Fe/UqQQWDekRLGCKYgfe.cKlsj5FICsStE62leC2a', '20,', '1112223334', 'Male', 'Playing', 'India', 0x75706c6f61642f646f776e6c6f6164202834292e6a706567),
(148, '', '', 'ict.test2024@gmail.com', '$2y$10$lgXU0oVjj9Kr9O6DJBcJq.yOO7fMQQ3ftK6Zen6.RcGSrhzLnmZT.', '$2y$10$Ilzm4BvDCO4r.QcHlWDXJOF08Rrn0PIh9sgdy8HBFtjvX1vOlNRsa', 'dsdcvxzc ', '', '', '', 'Select Country', 0x75706c6f61642f);

-- --------------------------------------------------------

--
-- Table structure for table `employee_2`
--

CREATE TABLE `employee_2` (
  `emp_id` int NOT NULL,
  `firstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmPassword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phonenumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `hobbies` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `country` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `image` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee_2`
--

INSERT INTO `employee_2` (`emp_id`, `firstName`, `lastName`, `email`, `password`, `confirmPassword`, `address`, `phonenumber`, `gender`, `hobbies`, `country`, `image`) VALUES
(59, 'Ashcvin', 'parmar', 'testCompany2@gmail.com', '$2y$10$JgnvGHqF.j6hrO95EG34IuAmAdh7RQpRbKoFD9RyrICFOAAgHS57S', '$2y$10$JgnvGHqF.j6hrO95EG34IuAmAdh7RQpRbKoFD9RyrICFOAAgHS57S', '20,', '1112223335', 'Male', 'Playing', 'USA', 0x75706c6f61642f646f776e6c6f6164202831292e6a706567),
(63, 'Test', 'User', 'testCompany@gmail.com', '$2y$10$CdCH/2d01tkDfL3jSFaucO8u8dc4UJSO3FAUy5fMMUkQGsZXuKtKe', '$2y$10$CdCH/2d01tkDfL3jSFaucO8u8dc4UJSO3FAUy5fMMUkQGsZXuKtKe', '20,', '1112223334', 'Male', 'Reading', 'India', 0x75706c6f61642f646f776e6c6f61642e6a706567);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employee_2`
--
ALTER TABLE `employee_2`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `employee_2`
--
ALTER TABLE `employee_2`
  MODIFY `emp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
