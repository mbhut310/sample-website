-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 06:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nisha`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `Product_name` varchar(10) NOT NULL,
  `Product_detail` varchar(20) NOT NULL,
  `Product_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `Product_name`, `Product_detail`, `Product_price`) VALUES
(2, 'shirt', 'green color shirt', 500),
(3, 'shirt', 'red color shirt', 500),
(4, 'shirt', 'red color shirt', 500),
(5, 'mobile', 'iphone', 100000),
(6, 'mobile', 'iphone11', 40000),
(7, 'mobile', 'iphone11', 40000),
(11, 'watch', 'digital watch', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Email` varchar(15) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `profile_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `Username`, `Email`, `Password`, `profile_photo`) VALUES
(9, 'rku', 'rku@mail.com', 'rku123', ''),
(10, 'sds', 'sds@rku.ac.in', '$2y$10$LR9Ngc3PyO6RZ7hkfaTE/u8UTIQOy/BcJkFryyC4a0RgQHPSa17T6', ''),
(12, 'sds2', 'sds2@mail.com', '$2y$10$bp7NwrystUo1WMW2xcTJ9.MUCnwJay.rLR.8BZIK3KP7BHT9k1ZUG', ''),
(13, 'demo', 'demo@mail.com', '$2y$10$QQ2BBQEuBb8csGJ4cB5Wm.prbdZedSZMsz7wjFPamRFgWVG2m0D8i', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
