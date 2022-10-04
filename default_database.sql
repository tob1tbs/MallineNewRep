-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 04, 2022 at 10:21 PM
-- Server version: 8.0.30-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mallline_customer_17a09062_nikaragua`
--

-- --------------------------------------------------------

--
-- Table structure for table `new_customers`
--

CREATE TABLE `new_customers` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `personal_number` varchar(20) DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `type` int DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `google_id` varchar(255) DEFAULT NULL,
  `is_admin` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_customers`
--

INSERT INTO `new_customers` (`id`, `name`, `lastname`, `personal_number`, `bdate`, `phone`, `email`, `type`, `password`, `remember_token`, `last_login`, `active`, `google_id`, `is_admin`, `created_at`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(19, 'Admin', 'Admin', '123123123', '2022-10-04', '555111222', 'admin@example.com', 1, '$2y$10$kx.4R5SJV3UmYnfNAOyZ3e17e6dpmj48H63TGBC6s5IxtXyvDJ4mK', NULL, NULL, 1, NULL, 1, '2022-10-04 17:34:03', '2022-10-04 13:37:23', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `new_customers`
--
ALTER TABLE `new_customers`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `personal_number` (`personal_number`,`phone`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `new_customers`
--
ALTER TABLE `new_customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
