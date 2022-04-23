-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 25, 2021 at 05:14 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

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
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `avartar` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `phone` char(10) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `address` varchar(250) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `roles` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `avartar`, `email`, `user_name`, `phone`, `address`, `password`, `roles`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png', 'admin@gmail.com', 'admin', '0868338314', '123 dau cak', '$2a$12$wSZmw/.CjmeBqahUb.mSs.mcSvFj2EYNhQiKE7Up/dlDrxR2DzYl2', 1, '2021-09-03 07:19:07', '2021-09-07 00:26:05'),
(2, 'khanh', 'https://icon-library.com/images/avatar-icon-images/avatar-icon-images-4.jpg', 'khanh123@gmail.com', 'khanh', '1234567897', 'hanoi', '$2y$10$OIx8/UP3V3pRvxWgOb03hu27guLkSqvKEUaVgIHSGklCC51U1MApy', 1, '2021-09-03 07:19:07', '2021-09-06 23:54:44'),
(24, 'khanh', 'storage/1630948544.png', 'khanh@gmail.com', 'khanh', '1234567895', 'nha', '$2y$10$5NNiTecUVUbJwXGNKq3dcuELZ34U.ROLw7lOa2gIvtcAOsbTi.JW.', 0, '2021-09-06 02:56:03', '2021-09-06 10:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(30) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Dulux', 'https://sonbaymau.com/uploads/images/2020/01/1578490384-single_news1-banggiadulux.jpg', NULL, '2021-09-03 15:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color` varchar(30) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hex` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color`, `created_at`, `updated_at`, `hex`) VALUES
(2, 'yellow', '2021-09-03 07:43:27', '2021-09-03 07:43:27', '#FFFF33'),
(3, 'Black', '2021-09-23 01:02:56', '2021-09-23 01:02:56', '#000000');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `id_product` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `image`, `id_product`, `created_at`, `updated_at`) VALUES
(31, 'storage/1632564667.png', 38, '2021-09-25 03:11:07', '2021-09-25 03:11:07'),
(32, 'storage/1632565647.png', 39, '2021-09-25 03:27:27', '2021-09-25 03:27:27');

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_type` int(11) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `descrip` varchar(250) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_type`, `name`, `descrip`, `created_at`, `updated_at`) VALUES
(38, 1, 'TEST1ss', '123123', '2021-09-25 03:11:07', '2021-09-25 03:11:07'),
(39, 1, '2', '3jafi vai', '2021-09-25 03:27:27', '2021-09-25 03:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_warehouse` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`id`, `id_product`, `id_size`, `id_color`, `id_brand`, `id_warehouse`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(34, 38, 1, 2, 1, 1, 23, 12, '2021-09-25 03:11:07', '2021-09-25 03:11:07'),
(35, 39, 2, 2, 1, 1, 34, 23, '2021-09-25 03:27:27', '2021-09-25 03:27:27');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `id_product_detail`, `id_admin`, `id_warehouse`, `id_supplier`, `created_at`, `updated_at`) VALUES
(30, 34, 1, 1, 3, '2021-09-25 03:11:07', '2021-09-25 03:11:07'),
(31, 35, 1, 1, 3, '2021-09-25 03:27:27', '2021-09-25 03:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_detail`
--

CREATE TABLE `receipt_detail` (
  `id` int(11) NOT NULL,
  `id_receipt` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_supplier` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt_detail`
--

INSERT INTO `receipt_detail` (`id`, `id_receipt`, `created_at`, `quantity`, `updated_at`, `id_supplier`, `id_admin`) VALUES
(7, 30, '2021-09-25', 23, '2021-09-25 03:11:07', 3, 1),
(8, 31, '2021-09-25', 34, '2021-09-25 03:27:27', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size` char(5) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size`, `created_at`, `updated_at`) VALUES
(1, '18L', NULL, '2021-09-03 15:11:40'),
(2, '11', '2021-09-23 01:04:48', '2021-09-23 01:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `address` varchar(250) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `phone` char(10) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`, `phone`, `updated_at`) VALUES
(3, '[value-2]', '[value-3]', '[value-4]', '2021-09-21 08:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `type_product`
--

CREATE TABLE `type_product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_product`
--

INSERT INTO `type_product` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sơn lót', NULL, '2021-09-07 01:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `address` varchar(250) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `name`, `address`, `status`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'cc', 'aaaa', 1, '', NULL, '2021-09-03 14:38:48'),
(2, 'kho2', 'hanoi', 1, 'storage/1631348346.jpg', '2021-09-11 01:19:07', '2021-09-11 01:19:07');

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  ADD PRIMARY KEY (`id`),
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
-- Indexes for table `receipt_detail`
--
ALTER TABLE `receipt_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_receipt` (`id_receipt`),
  ADD KEY `FK_id_supplier` (`id_supplier`),
  ADD KEY `FK_id_admin` (`id_admin`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `phone` (`phone`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `receipt_detail`
--
ALTER TABLE `receipt_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

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
  ADD CONSTRAINT `product_detail_ibfk_2` FOREIGN KEY (`id_color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `product_detail_ibfk_3` FOREIGN KEY (`id_size`) REFERENCES `size` (`id`),
  ADD CONSTRAINT `product_detail_ibfk_4` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `product_detail_ibfk_5` FOREIGN KEY (`id_warehouse`) REFERENCES `warehouse` (`id`),
  ADD CONSTRAINT `product_detail_ibfk_6` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`),
  ADD CONSTRAINT `receipt_ibfk_2` FOREIGN KEY (`id_product_detail`) REFERENCES `product_detail` (`id`),
  ADD CONSTRAINT `receipt_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `receipt_ibfk_4` FOREIGN KEY (`id_warehouse`) REFERENCES `warehouse` (`id`);

--
-- Constraints for table `receipt_detail`
--
ALTER TABLE `receipt_detail`
  ADD CONSTRAINT `FK_id_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `FK_id_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`),
  ADD CONSTRAINT `receipt_detail_ibfk_1` FOREIGN KEY (`id_receipt`) REFERENCES `receipt` (`id`);

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
