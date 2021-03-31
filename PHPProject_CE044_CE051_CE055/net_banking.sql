-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 06:57 AM
-- Server version: 8.0.19
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `net_banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `client_id` int DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `account_no` varchar(11) DEFAULT NULL,
  `bank_name` varchar(15) DEFAULT NULL,
  `bank_branch` varchar(15) DEFAULT NULL,
  `bank_ifsc_code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`client_id`, `name`, `account_no`, `bank_name`, `bank_branch`, `bank_ifsc_code`) VALUES
(2, 'Krish Goti', '12345678910', 'SBI Bank', 'Surat', 'SBIN1361555'),
(1, 'Nirav', '12345612345', 'SBI Bank', 'Botad', 'SBIN1361555');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `age` int NOT NULL,
  `gender` varchar(6) NOT NULL,
  `account_no` varchar(11) NOT NULL,
  `aadhaar_no` varchar(12) NOT NULL,
  `pan_no` varchar(10) NOT NULL,
  `account_type` varchar(10) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `account_balance` int NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `first_name`, `last_name`, `age`, `gender`, `account_no`, `aadhaar_no`, `pan_no`, `account_type`, `mobile_no`, `account_balance`, `username`, `password`) VALUES
(1, 'Krish', 'Goti', 20, 'Male', '12345678910', '123456123456', 'fddgg12356', 'Saving', '9998889999', 675000, 'krish123', 'krish123'),
(2, 'Nirav', 'Jivani', 20, 'Male', '12345612345', '123123456456', 'vjhvu56216', 'Saving', '9988889958', 650000, 'nirav123', 'nirav123');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`firstname`, `lastname`, `username`, `password`, `id`) VALUES
('yash', 'kundalia', 'yash123', 'yash123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `name` varchar(25) DEFAULT NULL,
  `account_no` varchar(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `operation` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `client_id` int DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`name`, `account_no`, `amount`, `operation`, `client_id`, `date`) VALUES
('Nirav', '12345612345', 25000, 'Debited', 1, '2021-03-27'),
('Krish Goti', '12345678910', 25000, 'credited', 2, '2021-03-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD KEY `client_id` (`client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD CONSTRAINT `beneficiary_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
