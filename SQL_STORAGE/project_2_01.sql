-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2021 at 09:25 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `avartar` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `roles` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `avartar`, `email`, `user_name`, `phone`, `address`, `password`, `roles`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', 'admin@gmail.com', 'admin', '0868338314', '123 dau cak', '$2a$12$wSZmw/.CjmeBqahUb.mSs.mcSvFj2EYNhQiKE7Up/dlDrxR2DzYl2', 1, '2021-09-03 07:19:07', '2021-09-03 07:19:07'),
(2, 'khanh', NULL, NULL, 'khanh', NULL, NULL, '$2a$12$wSZmw/.CjmeBqahUb.mSs.mcSvFj2EYNhQiKE7Up/dlDrxR2DzYl2', NULL, '2021-09-03 07:19:07', '2021-09-03 07:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `id_product` char(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `id` int(11) NOT NULL,
  `id_product_detail` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_warehouse` int(11) DEFAULT NULL,
  `date_issue` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` char(6) NOT NULL,
  `id_type` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `descrip` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(11) NOT NULL,
  `id_product` char(6) NOT NULL,
  `id_size` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_warehouse` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `id_product_detail` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_warehouse` int(11) DEFAULT NULL,
  `id_supplier` int(11) NOT NULL,
  `date_receipt` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `size` char(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `id_product_detail` int(11) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type_product`
--

CREATE TABLE `type_product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `address` varchar(250) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `name`, `address`, `status`, `avatar`, `created_at`, `updated_at`) VALUES
(60, '1.4', 'asdf', 1, 'storage/1630336320.gif', '2021-08-30 08:12:00', '2021-08-30 23:47:20'),
(68, '1.1', '1', 1, 'storage/1630341758.gif', '2021-08-30 09:42:38', '2021-08-31 00:41:09'),
(81, '3', '2222222', 1, 'storage/1630375745.gif', '2021-08-30 19:09:05', '2021-08-30 22:34:22'),
(83, '3', '2', 1, 'storage/1630380626.gif', '2021-08-30 20:30:26', '2021-08-30 22:33:14'),
(84, '2', '1', 1, 'storage/1630390786.gif', '2021-08-30 20:31:53', '2021-08-30 23:19:46'),
(92, '1.2', '2', 2, 'storage/1630391160.gif', '2021-08-30 23:26:00', '2021-08-31 02:56:19'),
(93, '1.21', '2', 1, 'storage/1630391203.gif', '2021-08-30 23:26:43', '2021-08-31 00:53:13'),
(94, '1.31', '1', 1, 'storage/1630391283.gif', '2021-08-30 23:28:03', '2021-08-31 03:01:58'),
(104, '1', '1', 2, 'storage/1630404439.gif', '2021-08-31 02:56:41', '2021-08-31 03:07:19'),
(105, '1', '1', 1, 'storage/1630487072.jpg', '2021-09-01 02:04:32', '2021-09-01 02:04:32'),
(106, '1', '2', 1, 'storage/1630487173.webp', '2021-09-01 02:05:16', '2021-09-01 02:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_transfer`
--

CREATE TABLE `warehouse_transfer` (
  `id` int(11) NOT NULL,
  `id_product_detail` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_warehouse` int(11) DEFAULT NULL,
  `id_warehouse_old` int(11) DEFAULT NULL,
  `date_transfer` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`,`id_product`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id`,`id_product_detail`),
  ADD KEY `id_product_detail` (`id_product_detail`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_warehouse` (`id_warehouse`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_type` (`id_type`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`,`id_product`,`id_size`,`id_color`,`id_brand`,`id_warehouse`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_size` (`id_size`),
  ADD KEY `id_brand` (`id_brand`),
  ADD KEY `id_warehouse` (`id_warehouse`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`,`id_product_detail`,`id_supplier`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_product_detail` (`id_product_detail`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_warehouse` (`id_warehouse`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`,`id_product_detail`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `id_product_detail` (`id_product_detail`);

--
-- Indexes for table `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_transfer`
--
ALTER TABLE `warehouse_transfer`
  ADD PRIMARY KEY (`id`,`id_product_detail`),
  ADD KEY `id_product_detail` (`id_product_detail`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_warehouse` (`id_warehouse`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `warehouse_transfer`
--
ALTER TABLE `warehouse_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`id_product_detail`) REFERENCES `product_detail` (`id`),
  ADD CONSTRAINT `issue_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `issue_ibfk_3` FOREIGN KEY (`id_warehouse`) REFERENCES `warehouse` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type_product` (`id`);

--
-- Constraints for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `product_detail_ibfk_2` FOREIGN KEY (`id_color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `product_detail_ibfk_3` FOREIGN KEY (`id_size`) REFERENCES `size` (`id_size`),
  ADD CONSTRAINT `product_detail_ibfk_4` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `product_detail_ibfk_5` FOREIGN KEY (`id_warehouse`) REFERENCES `warehouse` (`id`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`),
  ADD CONSTRAINT `receipt_ibfk_2` FOREIGN KEY (`id_product_detail`) REFERENCES `product_detail` (`id`),
  ADD CONSTRAINT `receipt_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `receipt_ibfk_4` FOREIGN KEY (`id_warehouse`) REFERENCES `warehouse` (`id`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`id_product_detail`) REFERENCES `product_detail` (`id`);

--
-- Constraints for table `warehouse_transfer`
--
ALTER TABLE `warehouse_transfer`
  ADD CONSTRAINT `warehouse_transfer_ibfk_1` FOREIGN KEY (`id_product_detail`) REFERENCES `product_detail` (`id`),
  ADD CONSTRAINT `warehouse_transfer_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `warehouse_transfer_ibfk_3` FOREIGN KEY (`id_warehouse`) REFERENCES `warehouse` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
