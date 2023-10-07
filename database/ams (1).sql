-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2021 at 02:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(100) NOT NULL,
  `productId` int(100) NOT NULL,
  `productType` varchar(50) NOT NULL,
  `buyerPhoneNumber` bigint(10) NOT NULL,
  `sellerPhoneNumber` bigint(10) NOT NULL,
  `orderQuantity` int(100) NOT NULL,
  `orderPrice` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `houseName` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pinCode` int(30) NOT NULL,
  `phoneNumber` bigint(10) NOT NULL,
  `orderStatus` varchar(300) NOT NULL DEFAULT 'waiting for order confirmation',
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `productId`, `productType`, `buyerPhoneNumber`, `sellerPhoneNumber`, `orderQuantity`, `orderPrice`, `name`, `houseName`, `city`, `state`, `pinCode`, `phoneNumber`, `orderStatus`, `dateTime`) VALUES
(1, 4, 'machinery', 9495471373, 7412589630, 11, 3300, 'Vijin', 'Akasalayil', 'Ranni', 'Kerala', 689675, 9747052235, 'Order Delivered', '2021-03-13 13:46:43'),
(2, 8, 'fertilizer', 9495471373, 7412589630, 10, 500, 'Vijin V J', 'Akasalayil', 'Ranni', 'Kerala', 689675, 9747052235, 'Order Shipped', '2021-03-13 13:49:12'),
(3, 2, 'crop', 9495471373, 9747052235, 15, 2985, 'Vijin V J', 'Akaslayil', 'Ranni', 'Kerala', 689675, 9747052235, 'Order Recieved', '2021-03-13 13:12:18'),
(4, 5, 'machinery', 9747052235, 7412589630, 10, 2500, 'Varun Benny', 'Thadathilal', 'Mavelikara', 'Kerala', 692001, 9526174577, 'waiting for order confirmation', '2021-03-13 10:28:00'),
(5, 8, 'fertilizer', 9747052235, 7412589630, 15, 750, 'Varun Benny', 'Thadathilal', 'Mavelikara', 'Kerala', 690102, 9526174577, 'waiting for order confirmation', '2021-03-13 10:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(100) NOT NULL,
  `productType` varchar(50) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productDescription` varchar(1000) NOT NULL,
  `productImage` varchar(1000) NOT NULL,
  `productPrice` int(100) NOT NULL,
  `productQuantity` int(100) NOT NULL,
  `phoneNumber` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productType`, `productName`, `productDescription`, `productImage`, `productPrice`, `productQuantity`, `phoneNumber`) VALUES
(1, 'crop', 'Tapioca', 'Kerala Tapioca', '../cropImages/tapioca.jpg', 50, 50, 9747052235),
(2, 'crop', 'Coffee bean', 'Fresh coffee bean', '../cropImages/coffee.jpg', 199, 85, 9747052235),
(3, 'crop', 'Green Chilly', 'Large green chilly', '../cropImages/chilli.jpg', 20, 20, 9747052235),
(4, 'machinery', 'Ground Triller', 'Manual Ground Triller', '../machineryImages/gardenTriller.jpg', 300, 189, 7412589630),
(5, 'machinery', 'Manual Weeder', 'High quality Manual Weeder', '../machineryImages/manualWeeder.jpg', 250, 290, 7412589630),
(6, 'machinery', 'Shear Cutter', 'Metal Shear Cutter', '../machineryImages/shearCutter.jpg', 400, 200, 7412589630),
(7, 'machinery', 'Gardening Tool', 'Pack of 5 gardening tools', '../machineryImages/gardeningtools.jpg', 1000, 300, 7412589630),
(8, 'fertilizer', 'Neem Cake Powder', 'Natural Neem Powder', '../fertilizerImages/neemCakePowder.jpg', 50, 275, 7412589630);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `phoneNumber` bigint(10) NOT NULL,
  `emailId` varchar(50) NOT NULL,
  `password1` varchar(50) NOT NULL,
  `acStatus` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`firstName`, `lastName`, `userType`, `phoneNumber`, `emailId`, `password1`, `acStatus`) VALUES
('Arjun', 'Chandran', 'seller', 7412589630, 'arjun@gmail.com', '123456', 'approved'),
('Dulquer', 'Salman', 'user', 8597461233, 'dqsalmaan@gmail.com', 'dqSalmaan', 'pending'),
('Fahad ', 'Fazil', 'user', 9495471373, 'fafa@gmail.com', 'fafa@123', 'approved'),
('Vijin', 'V J', 'admin', 9526174577, 'vijinvj123@gmail.com', '123456', 'approved'),
('Ryan', 'Philip', 'seller', 9631478520, 'ryan@philip.com', 'ryan123', 'approved'),
('Salman', 'Khan', 'farmer', 9632587410, 'salmankhan@gmail.com', 'salmanKhan', 'disapproved'),
('Midhun', 'Mohan', 'farmer', 9747052235, 'vijinvj77@gmail.com', '123456', 'approved'),
('Varun', 'Benny', 'user', 9874563210, 'varun@gmail.com', '123456', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`phoneNumber`),
  ADD UNIQUE KEY `emaild` (`emailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
