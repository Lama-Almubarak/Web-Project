-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 08:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_form`
--

CREATE TABLE `admin_form` (
  `name` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `date` date NOT NULL,
  `email` varchar(150) NOT NULL,
  `orderNo` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`date`, `email`, `orderNo`, `totalPrice`) VALUES
('2021-09-07', 'lama.almobarak@gmail.com', 23, 92),
('2023-02-07', 'lama.almobarak@gmail.com', 24, 34),
('2021-12-15', 'lama.almobarak@gmail.com', 25, 29);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `orderNo` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`orderNo`, `productId`, `quantity`) VALUES
(23, 1, 1),
(23, 3, 2),
(24, 1, 1),
(25, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`id`, `name`, `photo`, `price`, `description`, `quantity`) VALUES
(1, 'A Better Tomorrow, By: Abdulla', 'jbb6030na151.jpg', 34, 'Author 1:Abdullah Al Maghlouth Format:Paperback ISBN-13:9786144299067 Language:Arabic', 4),
(2, 'Stay Strong 365 Days a Year', '61gvxguHljL.jpg', 75, 'Arabic Book Paperback Novel Stay strong 365 days a year Demi Lovato.', 0),
(3, 'Don’t Be Sad – Dr. A’id Al-Qarni', 'H9ypmagtU45XLCtTy9P3xcK5FmSxNPrmofBtWbvW.jpeg', 29, 'The author of Don’t Be Sad illustrates through the Qur’an and the Sunnah how every modern spiritual', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `name` varchar(30) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`name`, `email`, `password`) VALUES
('Lama', 'lama.almobarak@gmail.com', '25873e159d36d8c7218c74bbfd3d7e02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_form`
--
ALTER TABLE `admin_form`
  ADD PRIMARY KEY (`password`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`orderNo`),
  ADD KEY `email` (`email`) USING BTREE;

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD KEY `orderNo` (`orderNo`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `orderNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_table`
--
ALTER TABLE `order_table`
  ADD CONSTRAINT `order_table_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user_form` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product_table` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_order_ibfk_2` FOREIGN KEY (`orderNo`) REFERENCES `order_table` (`orderNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
