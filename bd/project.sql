-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 03:45 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `CourierID` int(11) NOT NULL,
  `CourierName` varchar(255) DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL,
  `CourierStatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `OrderNumber` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `CourierID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductName` varchar(255) DEFAULT NULL,
  `Price` decimal(9,2) DEFAULT NULL,
  `ImagePath` varchar(255) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `ProductID` int(11) NOT NULL,
  `RestaurantsID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductName`, `Price`, `ImagePath`, `Category`, `ProductID`, `RestaurantsID`) VALUES
('Sonic Cheesburger', '5.99', 'https://i.pinimg.com/originals/80/b9/78/80b97819c6d6e542a7fc6709e80e2b68.jpg', 'Burgers', 22, 27),
('Turkey Sandwich', '13.00', 'https://fastfoodnutrition.org/item-photos/400x400/249_s.jpg', 'Sandwiches', 24, 3),
('Sonic Taste', '7.99', 'https://www.mcdonalds.com.mt/wp-content/uploads/2018/05/bigtasty-original-mobile_02.jpg', 'Burgers', 25, 27),
('So Good Bucket', '40.00', 'https://s3-eu-west-1.amazonaws.com/straus/media/products2/442839b6a0df4c499c041153883cd963.png', 'Buckets', 26, 26);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `RestaurantsName` varchar(255) DEFAULT NULL,
  `DeliveryPrice` decimal(9,2) DEFAULT NULL,
  `RestaurantImage` varchar(255) DEFAULT NULL,
  `RestaurantsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`RestaurantsName`, `DeliveryPrice`, `RestaurantImage`, `RestaurantsID`) VALUES
('Subway', '4.99', 'https://vistapointe.net/images/subway-wallpaper-2.jpg', 3),
('Burger King', '2.99', 'https://headquartergeb.com/wp-content/uploads/2018/01/Burger-King-in-Pakistan-400x400.jpg', 4),
('KFC', '3.99', 'https://logoeps.com/wp-content/uploads/2011/06/kfc-new-vector.jpg', 26),
('Sonic', '5.99', 'https://pbs.twimg.com/profile_images/1224345133229006849/0kVe4BPb_400x400.png', 27);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `role` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `LastName`, `FirstName`, `password`, `username`, `email`, `role`) VALUES
(5, 'Tatar', 'Cristian', '202cb962ac59075b964b07152d234b70', 'username', 'trevor.tm21@gmail.com', 'admin'),
(6, 'Tatar', 'Cristi', '81dc9bdb52d04dc20036dbd8313ed055', 'Cristi', 'lala@mail.go', 'user'),
(7, 'Test', 'Test', '827ccb0eea8a706c4c34a16891f84e7b', 'test1', 'test@mail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`CourierID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CourierID` (`CourierID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `RestaurantsID` (`RestaurantsID`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`RestaurantsID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `CourierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `RestaurantsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`CourierID`) REFERENCES `couriers` (`CourierID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`RestaurantsID`) REFERENCES `restaurants` (`RestaurantsID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
