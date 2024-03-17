-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 01:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_items`
--

CREATE TABLE `add_items` (
  `item_id` int(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `totalPrice` int(255) NOT NULL,
  `date` varchar(200) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_items`
--

INSERT INTO `add_items` (`item_id`, `item_name`, `quantity`, `price`, `totalPrice`, `date`) VALUES
(94, 'Maize', 1500, 400, 600000, '2024-03-17 06:29:13'),
(95, 'Beans', 1200, 10, 720000, '2024-03-17 06:30:44'),
(96, 'Vegetables', 4000, 200, 800000, '2024-03-17 07:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `stockout`
--

CREATE TABLE `stockout` (
  `out_id` int(255) NOT NULL,
  `out_name` varchar(255) NOT NULL,
  `out_quantity` varchar(255) NOT NULL,
  `out_totalPrice` int(255) NOT NULL,
  `date` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stockout`
--

INSERT INTO `stockout` (`out_id`, `out_name`, `out_quantity`, `out_totalPrice`, `date`) VALUES
(1, 'Maize', '500', 0, '2024-03-17 13:25:42'),
(2, 'Maize', '1000', 0, '2024-03-17 13:27:04'),
(3, 'Vegetables', '1000', 0, '2024-03-17 13:34:30'),
(4, 'Maize', '100', 0, '2024-03-17 13:37:21'),
(5, 'Maize', '1000', 0, '2024-03-17 13:39:36'),
(6, 'Maize', '100', 0, '2024-03-17 13:41:37'),
(7, 'Maize', '200', 600000, '2024-03-17 13:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `name`, `username`, `profile`, `pass`, `status`) VALUES
(1, 'josue', 'njosue', 'josue.jpg', '12345', 'admin'),
(2, 'hope', 'hopevan', '', '123', 'user'),
(6, 'IRADUKUNDA John', 'john', 'josue.jpg', '123', 'admin'),
(7, 'muryerye', 'mury', 'josue.jpg', '1234', 'user'),
(8, 'mama', 'ma', 'pic-4.png', '123', 'user'),
(9, 'Tuyizere Chemea', 'mejo', 'pic-3.png', '1234', 'user'),
(10, 'deo iratuzi', 'deo', 's-2.png', 'abcd', 'user'),
(11, 'deo iranzi', 'iranzi', 'pic-1.png', '12345', 'user'),
(12, 'Mary', 'mary', 's-3.png', '12345', 'user'),
(13, 'hora', 'Horana', 'download.jfif', '1234', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_items`
--
ALTER TABLE `add_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `stockout`
--
ALTER TABLE `stockout`
  ADD PRIMARY KEY (`out_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_items`
--
ALTER TABLE `add_items`
  MODIFY `item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `stockout`
--
ALTER TABLE `stockout`
  MODIFY `out_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
