-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 12, 2026 at 01:38 PM
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
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderManagement`
--

CREATE TABLE `orderManagement` (
  `id` int NOT NULL,
  `OrderNumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `CustomerName` varchar(255) NOT NULL,
  `CustomerEmail` varchar(255) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `OrderAmount` varchar(255) NOT NULL,
  `PaymentMethod` varchar(255) NOT NULL,
  `OrderStatus` varchar(255) NOT NULL,
  `DeliveryOptions` varchar(255) NOT NULL,
  `OrderDate` date NOT NULL,
  `DeliveryAddress` varchar(255) NOT NULL,
  `InvoiceFile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orderManagement`
--

INSERT INTO `orderManagement` (`id`, `OrderNumber`, `CustomerName`, `CustomerEmail`, `ProductName`, `OrderAmount`, `PaymentMethod`, `OrderStatus`, `DeliveryOptions`, `OrderDate`, `DeliveryAddress`, `InvoiceFile`) VALUES
(23, '122', 'Kasper Francis', 'vajymugas@mailinator.com', 'Emerson Roberson', '68', 'PayPal', 'Processing', 'Gift Wrap,Insurance', '2013-06-12', 'Quos quae voluptatem', '1770897221_download (3).jpeg'),
(25, '184', 'Vincent Osborne', 'mejyborija@mailinator.com', 'Sheila Wise', '77', 'Bank Transfer', 'Processing', 'Express,Contactless', '1973-02-06', 'Ut sequi exercitatio', '1770899686_download (3).jpeg'),
(27, '938', 'Phillip Payne', 'zype@mailinator.com', 'Leo Woods', '20', 'Credit Card', 'Completed', 'Insurance', '1999-05-16', 'Esse est quas necess', '1770899731_download (2).jpeg'),
(28, '579', 'Basil Pope', 'senecybytu@mailinator.com', 'Basil Nolan', '48', 'Credit Card', 'Processing', 'Express,Gift Wrap,Insurance,Contactless', '1972-06-30', 'Tempor proident eos', '1770899850_msdhoni.jpeg'),
(29, '929', 'Marsden Ray', 'bizisaxa@mailinator.com', 'Jolene Olson', '45', 'COD', 'Completed', 'Contactless', '1991-11-01', 'In adipisci beatae a', '1770899983_download (2).jpeg'),
(32, '94', 'dere', 'japosicad@mailinator.com', 'Jolie Crawford', '24', 'Bank Transfer', 'Processing', 'Express,Contactless', '1976-07-29', 'Aliqua Et sunt qui', '1770901417_download (4).jpeg'),
(35, '332', 'Tanner Donaldson', 'xyca@mailinator.com', 'Daria Manning', '305655', 'Credit Card', 'Cancelled', 'Contactless', '1989-12-02', 'gddgdg', '1770903422_sample.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderManagement`
--
ALTER TABLE `orderManagement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderManagement`
--
ALTER TABLE `orderManagement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
