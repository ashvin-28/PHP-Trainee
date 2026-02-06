-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2026 at 01:29 PM
-- Server version: 8.0.45-0ubuntu0.22.04.1
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
-- Table structure for table `ajaxCrud`
--

CREATE TABLE `ajaxCrud` (
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
-- Dumping data for table `ajaxCrud`
--

INSERT INTO `ajaxCrud` (`emp_id`, `firstName`, `lastName`, `email`, `password`, `confirmPassword`, `address`, `phonenumber`, `gender`, `hobbies`, `country`, `image`) VALUES
(1, '', '', '', '$2y$10$8/q21QAgs49Fv/oQFM7nx.jvJlIaRjjwSAk2eTXqEnbw./ibRqq6S', '$2y$10$Kxopj2PdpK4wtemLETPsKeBRGsfgD4lWT64aGkJfByRsDr9CFz0.i', '', '', '', '', '', 0x75706c6f61642f),
(2, 'Test', 'User', 'testCompany@gmail.com', '$2y$10$xL5G7JxxMN4Gi8F5wuiE5.aWZ2UDugwjLvZTCFrx/X8UKo/sjvjBO', '$2y$10$vIlfuQX9UUqwBL0JxwbjIOICM2tJVPdKVMHutL7fRpPsxQVEFjVqS', '20,', '1112223334', 'Male', 'Reading', 'India', 0x75706c6f6164732f646f776e6c6f6164202832292e6a706567),
(6, 'Test', 'User', 'testCompany2@gmail.com', '$2y$10$LY8S/ogRuhpNF2mobfKCwOOfSOdgFq7BK2aFREHbVRnLDHCNmskwq', '$2y$10$ZSPLuGQWLsQ8igNoEKJ8t.RyrIMGTNAHRmw3cWG/dNOClBt9KQHHW', '20,', '1112223334', 'Male', 'Reading', 'India', 0x75706c6f6164732f646f776e6c6f6164202832292e6a706567),
(8, 'Test', 'User', 'testCompany3@gmail.com', '$2y$10$l4IQ6nsl6h5qwZ8Hea5.EenZ0mciY6j.EAmN9V2CsEwOLSowNEVGm', '$2y$10$hXF9EvadTb6YGyrJ21Sx1uommwjDitxkjARs7b6E8uX/5aAjG9ZcS', '20,', '1112223334', 'Male', 'Reading', 'India', 0x75706c6f6164732f646f776e6c6f6164202832292e6a706567),
(11, 'Test', 'User', 'testCompany5@gmail.com', '$2y$10$42uQXJUSHjg0ju1zd5eGu.qMBjdorWQETGHfShn4W1np2kNH6NJpW', '$2y$10$0iliOi0WDMuEP2V8t3VPUeb1tiOGSPpYledhsu46tU3jQKNXztpHy', '20,', '1112223334', 'Male', 'Playing', 'India', 0x75706c6f6164732f696d616765732e6a706567),
(13, 'Test', 'User', 'test@gmail.com', '$2y$10$EqUZ9CCViPKPb.FSvOh7iecVR8bA4bsbZ6y0MwulwufzTC6akJ7MW', '$2y$10$wTBgRTvjsvidiFqT1pOnquWPbPfLaXsFc/LP8IgAgDT9scjnVIzam', '20,', '1112223334', 'Male', 'Playing', 'India', 0x75706c6f6164732f646f776e6c6f6164202836292e6a706567),
(14, 'Test', 'User', 'test2@gmail.com', '$2y$10$tAvQExWXOuTJklXdmJKZouSmTcxf21AJ0tIGWNDXCQP2.w0Tfot/6', '$2y$10$ejnv5DkxhWZ4WOJxGbgQJeSXa/89A8u8GnAXCYT0FsfjuLpvzDhuu', '20,', '1112223334', 'Male', 'Playing', 'India', 0x75706c6f6164732f646f776e6c6f6164202836292e6a706567);

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
(127, 'Test2', 'User', 'testCompany@gmail.com', '$2y$10$07aiLhRrPE140C5UpuQHn.gUYFOl/orLaFdC1zjKFnFAkJxG5Eqpy', '$2y$10$07aiLhRrPE140C5UpuQHn.gUYFOl/orLaFdC1zjKFnFAkJxG5Eqpy', 'Thiersteinerallee 17', '1112223334', 'Male', 'Playing', 'USA', 0x75706c6f61642f646f776e6c6f61642e6a706567),
(138, 'Test', 'User', 'test2@gmail.com', '$2y$10$zhL4G2MQVHM1C3SBEpu5S.HI6IfYLX8OR/lM5ThK2xX/2yF1tp/nG', '$2y$10$zhL4G2MQVHM1C3SBEpu5S.HI6IfYLX8OR/lM5ThK2xX/2yF1tp/nG', 'Thiersteinerallee 17', '1112223334', 'Male', 'Playing', 'India', 0x75706c6f61642f646f776e6c6f6164202834292e6a706567),
(141, 'Test', 'User', 'test4@gmail.com', '$2y$10$81bz0IcGWV0cVyl7WZGgUu6/d8CeCdLG3US1sIhJoylEv5n7ZSnMG', '$2y$10$81bz0IcGWV0cVyl7WZGgUu6/d8CeCdLG3US1sIhJoylEv5n7ZSnMG', '20,', '1112223334', 'Male', 'Playing', 'India', 0x75706c6f61642f646f776e6c6f6164202833292e6a706567),
(146, 'Conan', 'Brittany', 'testdev@gmail.com', '$2y$10$fXRrBjmkVWw3Fe/UqQQWDekRLGCKYgfe.cKlsj5FICsStE62leC2a', '$2y$10$fXRrBjmkVWw3Fe/UqQQWDekRLGCKYgfe.cKlsj5FICsStE62leC2a', '20,', '1112223334', 'Male', 'Reading', 'India', 0x75706c6f61642f646f776e6c6f6164202834292e6a706567),
(150, 'Test', 'User', 'admin@gmail.com', '$2y$10$Wg/O.BeG/BnYhzX1dY60xO5jEhHBmcOU7piTIDsWERKXEKRtosc7i', '$2y$10$Wg/O.BeG/BnYhzX1dY60xO5jEhHBmcOU7piTIDsWERKXEKRtosc7i', '20,', '1112223334', 'Male', 'Playing', 'India', 0x75706c6f61642f646f776e6c6f61642e6a706567),
(151, 'Yvette', 'Lani', 'dev@gmail.com', '$2y$10$r9dSZ0vSBi7s1rsVQ2WUwOuAnorIynnuAk2CYqVarL.6m1USqjWw.', '$2y$10$DVJrF3N21FXt0jLxqS2lRuXoNv.r.Y9xpBt41A7.oPFF5vS9UTtT2', NULL, NULL, NULL, NULL, NULL, NULL),
(152, 'Ashvin', 'Parnar', 'ashvin@gmail.com', '$2y$10$41YUui4u0AB3zQjGk9S/MOe/QfH/fZBKiwLS/fLByurI6Y/KlFDVu', '$2y$10$41YUui4u0AB3zQjGk9S/MOe/QfH/fZBKiwLS/fLByurI6Y/KlFDVu', '20,', '1112223334', 'Male', 'Playing', 'India', 0x75706c6f61642f696d616765732e6a706567),
(154, 'Test', 'User', 'ashvin2@gmail.com', '$2y$10$0Xuhx8D6wRMGDNyZoeP1WutLK8iqH/5m8dDvJHqo.IjlX2THAuK9O', '$2y$10$Gne8pLi3/9cIvemDw1oDFea.sJGCuwfC3Th3Gu55zYIaOzYlIY8hu', '20,', '1112223334', 'Male', 'Playing', 'India', 0x75706c6f61642f67696c6c4361707461696e2e6a706567);

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
-- Indexes for table `ajaxCrud`
--
ALTER TABLE `ajaxCrud`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `email` (`email`);

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
-- AUTO_INCREMENT for table `ajaxCrud`
--
ALTER TABLE `ajaxCrud`
  MODIFY `emp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `employee_2`
--
ALTER TABLE `employee_2`
  MODIFY `emp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
