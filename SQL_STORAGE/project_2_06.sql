-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 05:09 PM
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
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `avartar` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `phone` char(10) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `address` varchar(250) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `roles` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `avartar`, `email`, `user_name`, `phone`, `address`, `password`, `roles`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'https://www.shareicon.net/data/512x512/2016/05/24/770117_people_512x512.png', 'admin@gmail.com', 'admin', '0868338314', '123 dau cak', '$2a$12$wSZmw/.CjmeBqahUb.mSs.mcSvFj2EYNhQiKE7Up/dlDrxR2DzYl2', 1, '2021-09-03 07:19:07', '2021-09-07 00:26:05'),
(2, 'khanh', 'https://icon-library.com/images/avatar-icon-images/avatar-icon-images-4.jpg', 'khanh123@gmail.com', 'khanh', '1234567897', 'hanoi', '$2y$10$OIx8/UP3V3pRvxWgOb03hu27guLkSqvKEUaVgIHSGklCC51U1MApy', 1, '2021-09-03 07:19:07', '2021-09-06 23:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(30) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Dulux', 'storage/1639130385.jpg', NULL, '2021-12-10 09:59:45'),
(2, 'Đại Bàng', 'storage/1639130395.jpg', '2021-12-10 09:59:55', '2021-12-10 09:59:55'),
(3, 'Infor', 'storage/1639130482.jpg', '2021-12-10 10:00:07', '2021-12-10 10:01:22'),
(4, 'Jupiter', 'storage/1639130491.jpg', '2021-12-10 10:01:31', '2021-12-10 10:01:31'),
(5, 'My Kolor', 'storage/1639130503.jpg', '2021-12-10 10:01:43', '2021-12-10 10:01:43'),
(6, 'Nippon', 'storage/1639130520.jpg', '2021-12-10 10:02:00', '2021-12-10 10:02:00'),
(7, 'Kova', 'storage/1639130531.jpg', '2021-12-10 10:02:11', '2021-12-10 10:02:11'),
(8, 'Jotun', 'storage/1639130543.jpg', '2021-12-10 10:02:23', '2021-12-10 10:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `hex` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color`, `created_at`, `updated_at`, `hex`) VALUES
(2, 'yellow', '2021-09-03 07:43:27', '2021-09-03 07:43:27', '#FFFF33'),
(3, 'Black', '2021-09-23 01:02:56', '2021-09-23 01:02:56', '#000000'),
(4, 'MARSHMALLOW TOUCH 14YY 88/041', '2021-12-10 09:34:59', '2021-12-10 09:34:59', '#F5EEE5'),
(5, '30GY 88/014', '2021-12-10 09:36:02', '2021-12-10 09:36:02', '#EEEFEA'),
(6, 'POLAR HEIGHTS 65YY 90/062', '2021-12-10 09:37:11', '2021-12-10 09:37:11', '#F6F2E5'),
(7, 'KING RED 74493', '2021-12-10 09:38:36', '2021-12-10 09:38:36', '#9F1119'),
(8, 'BRAKELIGHT RED 16YR 13/558', '2021-12-10 09:39:03', '2021-12-10 09:39:03', '#B02826'),
(9, 'SOPHIA 30RR 54/145', '2021-12-10 09:40:03', '2021-12-10 09:40:03', '#D8B6C3'),
(10, 'PINK REVELATION 91RR 51/304', '2021-12-10 09:41:59', '2021-12-10 09:41:59', '#F6A4A8'),
(11, 'ORANGERY 70YR 30/651', '2021-12-10 09:42:54', '2021-12-10 09:42:54', '#E2712B'),
(12, 'YY55518', '2021-12-10 09:43:28', '2021-12-10 09:43:28', '#FFAE62'),
(13, '87YY 26/456', '2021-12-10 09:46:47', '2021-12-10 09:46:47', '#888C29'),
(14, 'CRAYON GREEN 94YY 46/629', '2021-12-10 09:47:12', '2021-12-10 09:47:12', '#AEBB39'),
(15, 'GY54334', '2021-12-10 09:48:39', '2021-12-10 09:48:39', '#8BCEA0'),
(16, 'SOUTH SEAS 87GG 51/291', '2021-12-10 09:50:02', '2021-12-10 09:50:02', '#68CAC5'),
(17, 'AQUA SKY 56GG 77/156', '2021-12-10 09:50:36', '2021-12-10 09:50:36', '#BEE9DE'),
(18, 'BLUE SAPPHIRE 98BG 26/393', '2021-12-10 09:51:23', '2021-12-10 09:51:23', '#0095C7'),
(19, 'NIGHT MAGIC 03RB 42/220', '2021-12-10 09:52:10', '2021-12-10 09:52:10', '#74568C'),
(20, 'PURPLE FIRE 42RB 14/320', '2021-12-10 09:53:22', '2021-12-10 09:53:22', '#A9A7CE'),
(21, 'VIOLA 42RB 53/176', '2021-12-10 09:53:43', '2021-12-10 09:53:43', '#C8B7D6'),
(22, 'HORIZON 71754', '2021-12-10 09:54:38', '2021-12-10 09:54:38', '#B7C2C9'),
(23, 'SMOKE 70334', '2021-12-10 09:54:58', '2021-12-10 09:54:58', '#C7CBCB'),
(24, 'CREAMY FOG 71755', '2021-12-10 09:55:21', '2021-12-10 09:55:21', '#CFD5D9');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `id_product` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `image`, `id_product`, `created_at`, `updated_at`) VALUES
(31, 'https://deco.jotun.com/siteassets/product-images/interior/products/sn-lot-majestic/vietnam-majestic-primer-tincan-296x338_tcm352-226478.png', 38, '2021-09-25 03:11:07', '2021-09-25 03:11:07'),
(32, 'https://deco.jotun.com/siteassets/product-images/exterior/products/sn-lot-chng-kim-essence/vietnam-essence-easy-primer-tincan-296x388_tcm352-226467.png', 39, '2021-09-25 03:27:27', '2021-09-25 03:27:27'),
(33, 'storage/1639134545.png', 40, '2021-12-10 11:09:05', '2021-12-10 11:09:05'),
(34, 'storage/1639134772.png', 41, '2021-12-10 11:12:52', '2021-12-10 11:12:52'),
(35, 'storage/1639236886.png', 43, '2021-12-11 15:34:46', '2021-12-11 15:34:46'),
(36, 'storage/1639237355.png', 44, '2021-12-11 15:42:35', '2021-12-11 15:42:35'),
(37, 'storage/1639237534.png', 45, '2021-12-11 15:45:34', '2021-12-11 15:45:34'),
(38, 'storage/1639237815.png', 46, '2021-12-11 15:50:15', '2021-12-11 15:50:15'),
(39, 'storage/1639237924.png', 47, '2021-12-11 15:52:04', '2021-12-11 15:52:04');

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

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`id`, `id_product_detail`, `id_admin`, `id_warehouse`, `date_issue`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 34, 2, 1, '2021-09-26', 1, '2021-09-25 18:43:32', '2021-09-25 18:43:32'),
(2, 34, 2, 1, '2021-09-26', 1, '2021-09-25 18:43:48', '2021-09-25 18:43:48'),
(3, 35, 2, 1, '2021-09-26', 1, '2021-09-25 18:44:30', '2021-09-25 18:44:30'),
(4, 35, 2, 1, '2021-09-28', 1, '2021-09-28 08:41:57', '2021-09-28 08:41:57'),
(5, 35, 2, 1, '2021-09-28', 11, '2021-09-28 09:36:39', '2021-09-28 09:36:39'),
(6, 35, 2, 1, '2021-10-02', 1, '2021-10-02 07:37:54', '2021-10-02 07:37:54'),
(7, 35, 2, 1, '2021-10-05', 1, '2021-10-05 04:20:15', '2021-10-05 04:20:15'),
(8, 41, 2, 1, '2021-12-11', 4, '2021-12-11 15:46:37', '2021-12-11 15:46:37'),
(9, 40, 2, 1, '2021-12-11', 3, '2021-12-11 15:46:48', '2021-12-11 15:46:48'),
(10, 39, 2, 1, '2021-12-11', 3, '2021-12-11 15:47:17', '2021-12-11 15:47:17'),
(11, 39, 2, 1, '2021-12-11', 11, '2021-12-11 15:47:30', '2021-12-11 15:47:30'),
(12, 37, 1, 2, '2021-12-11', 1, '2021-12-11 15:50:32', '2021-12-11 15:50:32'),
(13, 36, 1, 2, '2021-12-10', 12, '2021-12-11 15:50:42', '2021-12-11 15:50:42'),
(14, 44, 1, 2, '2021-12-11', 12, '2021-12-11 15:50:51', '2021-12-11 15:50:51'),
(15, 44, 1, 2, '2021-12-11', 1, '2021-12-11 15:55:56', '2021-12-11 15:55:56');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_type`, `name`, `descrip`, `created_at`, `updated_at`) VALUES
(38, 1, 'Sơn lót chống kiềm Essence', 'Chất lượng sơn phủ đáng tin cậy phù hợp cho tường nội thất và ngoại thất', '2021-09-25 03:11:07', '2021-09-25 03:11:07'),
(39, 1, 'Sơn lót Majestic', 'Giúp màng sơn rực rỡ hơn và tăng cường độ bền màu', '2021-09-25 03:27:27', '2021-09-25 03:27:27'),
(40, 8, 'Essence Che Phủ Tối Đa', 'Che Phủ Tối Đa Chỉ Sau 2 Lớp', '2021-12-10 11:09:05', '2021-12-10 11:09:05'),
(41, 7, 'Essence Che Phủ Tối Đa', 'Che Phủ Tối Đa Chỉ Sau 2 Lớp', '2021-12-10 11:12:52', '2021-12-10 11:12:52'),
(42, 8, 'Essense Siêu Bóng', 'Sơn gỗ và kim loại tối ưu phù hợp cho nội thất và ngoại thất', '2021-12-11 15:34:30', '2021-12-11 15:34:30'),
(43, 8, 'Essense Siêu Bóng', 'Sơn gỗ và kim loại tối ưu phù hợp cho nội thất và ngoại thất', '2021-12-11 15:34:46', '2021-12-11 15:34:46'),
(44, 3, 'SƠN LÓT SIÊU KHÁNG KIỀM', 'SƠN LÓT SIÊU KHÁNG KIỀM NGOẠI THẤT ĐẶC BIỆT', '2021-12-11 15:42:35', '2021-12-11 15:42:35'),
(45, 8, 'Sơn Dulux Easy Clean', 'chống bám bẩn Z966B màng sơn Bóng', '2021-12-11 15:45:34', '2021-12-11 15:45:34'),
(46, 7, 'Dulux Weathershield Colour Protect E015', 'màng sơn Mờ', '2021-12-11 15:50:15', '2021-12-11 15:50:15'),
(47, 2, 'Aquatech Max', 'Chống Thấm Sàn V910', '2021-12-11 15:52:04', '2021-12-11 15:52:04');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`id`, `id_product`, `id_size`, `id_color`, `id_brand`, `id_warehouse`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(34, 38, 1, 2, 8, 1, 8, 2000000, '2021-09-25 03:11:07', '2021-10-02 07:40:53'),
(35, 39, 2, 2, 8, 1, 18, 2500000, '2021-09-25 03:27:27', '2021-10-05 04:20:25'),
(36, 38, 1, 2, 1, 2, 0, 2500000, '2021-09-25 17:39:16', '2021-12-11 15:50:42'),
(37, 39, 2, 2, 1, 2, 13, 2500000, '2021-09-28 08:40:12', '2021-12-11 15:57:40'),
(38, 40, 5, 24, 8, 1, 20, 3000000, '2021-12-10 11:09:05', '2021-12-10 11:09:05'),
(39, 41, 1, 4, 8, 1, 6, 3600000, '2021-12-10 11:12:52', '2021-12-11 15:47:30'),
(40, 42, 2, 20, 8, 1, 7, 1500000, '2021-12-11 15:34:30', '2021-12-11 15:46:48'),
(41, 43, 2, 20, 8, 1, 6, 1500000, '2021-12-11 15:34:46', '2021-12-11 15:46:37'),
(42, 44, 2, 21, 3, 1, 5, 2300000, '2021-12-11 15:42:35', '2021-12-11 15:42:35'),
(43, 45, 2, 18, 4, 1, 10, 175000, '2021-12-11 15:45:34', '2021-12-11 15:45:34'),
(44, 46, 5, 21, 2, 2, 7, 3600000, '2021-12-11 15:50:15', '2021-12-11 15:55:56'),
(45, 47, 3, 9, 5, 2, 20, 2500000, '2021-12-11 15:52:04', '2021-12-11 15:52:04'),
(46, 39, 2, 2, 1, 1, 1, 2500000, '2021-12-11 15:57:40', '2021-12-11 15:57:40');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `id_product_detail`, `id_admin`, `id_warehouse`, `id_supplier`, `created_at`, `updated_at`) VALUES
(30, 34, 1, 1, 3, '2021-09-25 03:11:07', '2021-09-25 03:11:07'),
(31, 35, 1, 1, 3, '2021-09-25 03:27:27', '2021-09-25 03:27:27'),
(32, 38, 1, 1, 6, '2021-12-10 11:09:05', '2021-12-10 11:09:05'),
(33, 39, 1, 1, 6, '2021-12-10 11:12:52', '2021-12-10 11:12:52'),
(34, 41, 2, 1, 4, '2021-12-11 15:34:46', '2021-12-11 15:34:46'),
(35, 42, 2, 1, 4, '2021-12-11 15:42:35', '2021-12-11 15:42:35'),
(36, 43, 2, 1, 5, '2021-12-11 15:45:34', '2021-12-11 15:45:34'),
(37, 44, 1, 2, 3, '2021-12-11 15:50:15', '2021-12-11 15:50:15'),
(38, 45, 1, 2, 3, '2021-12-11 15:52:04', '2021-12-11 15:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_detail`
--

CREATE TABLE `receipt_detail` (
  `id` int(11) NOT NULL,
  `id_receipt` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_supplier` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt_detail`
--

INSERT INTO `receipt_detail` (`id`, `id_receipt`, `created_at`, `quantity`, `updated_at`, `id_supplier`, `id_admin`) VALUES
(7, 30, '2021-09-25', 23, '2021-09-25 03:11:07', 3, 1),
(8, 31, '2021-09-25', 34, '2021-09-25 03:27:27', 3, 1),
(9, 31, '2021-10-02', 1, '2021-10-02 07:18:57', 3, 2),
(22, 31, '2021-10-02', 1, '2021-10-02 09:16:17', 4, 2),
(23, 31, '2021-10-02', 1, '2021-10-02 09:17:24', 4, 2),
(24, 31, '2021-10-02', 1, '2021-10-02 11:11:00', 4, 2),
(25, 31, '2021-10-05', 1, '2021-10-05 04:20:25', 4, 2),
(26, 32, '2021-12-10', 20, '2021-12-10 11:09:05', 6, 1),
(27, 33, '2021-12-10', 20, '2021-12-10 11:12:52', 6, 1),
(28, 34, '2021-12-11', 10, '2021-12-11 15:34:46', 4, 2),
(29, 35, '2021-12-11', 5, '2021-12-11 15:42:35', 4, 2),
(30, 36, '2021-12-11', 10, '2021-12-11 15:45:34', 5, 2),
(31, 37, '2021-12-11', 20, '2021-12-11 15:50:15', 3, 1),
(32, 38, '2021-12-11', 20, '2021-12-11 15:52:04', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size` char(30) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size`, `created_at`, `updated_at`) VALUES
(1, '18L', NULL, '2021-09-03 15:11:40'),
(2, '10L', '2021-09-23 01:04:48', '2021-12-10 09:08:38'),
(3, '15L', '2021-12-10 09:09:49', '2021-12-10 09:09:49'),
(4, '5L', '2021-12-10 09:11:09', '2021-12-10 09:11:09'),
(5, '20L', '2021-12-10 09:16:33', '2021-12-10 09:16:33'),
(6, '3~7cm', '2021-12-10 09:19:08', '2021-12-10 09:19:08'),
(7, '4~9cm', '2021-12-10 09:19:17', '2021-12-10 09:19:17'),
(8, '1~2cm', '2021-12-10 09:19:57', '2021-12-10 09:19:57'),
(9, '2~4cm', '2021-12-10 09:20:15', '2021-12-10 09:20:15'),
(10, '3~6cm', '2021-12-10 09:20:47', '2021-12-10 09:20:47'),
(11, '6cm', '2021-12-10 09:22:18', '2021-12-10 09:22:18'),
(12, '10cm', '2021-12-10 09:22:26', '2021-12-10 09:22:26'),
(13, 'nhỏ 8cm', '2021-12-10 09:23:46', '2021-12-10 09:23:46'),
(14, 'trung 20.5cm', '2021-12-10 09:23:55', '2021-12-10 09:23:55'),
(15, 'bé 13.7cm', '2021-12-10 09:24:27', '2021-12-10 09:24:27'),
(16, 'to 23cm', '2021-12-10 09:24:31', '2021-12-10 09:24:31'),
(17, '1L', '2021-12-10 09:24:51', '2021-12-10 09:24:51'),
(18, '2L', '2021-12-10 09:25:42', '2021-12-10 09:25:42'),
(19, '500ML', '2021-12-10 09:25:48', '2021-12-10 09:25:48'),
(20, '3L', '2021-12-10 09:25:53', '2021-12-10 09:25:53'),
(21, '4L', '2021-12-10 09:25:57', '2021-12-10 09:25:57'),
(22, '100ML', '2021-12-10 09:27:20', '2021-12-10 09:27:20'),
(23, '200ML', '2021-12-10 09:27:29', '2021-12-10 09:27:29'),
(24, '700ML', '2021-12-10 09:27:36', '2021-12-10 09:27:36'),
(25, '300ML', '2021-12-10 09:27:42', '2021-12-10 09:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `address` varchar(250) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `phone` char(10) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(3, 'Đại lí miền bắc', 'Đường Trần Bình – P. Mai Dịch Q. Cầu Giấy – Hà Nội', '0242262116', NULL, '2021-12-10 10:23:03'),
(4, 'Cty CP CTNHH Phân phối bán lẻ', '68 Nguyễn Cơ Thạch, Mỹ Đình, Từ Liêm, Hà Nội', '0246252566', '2021-10-02', '2021-12-10 10:25:38'),
(5, 'Đại lí miền nam', 'Nguyễn Công Trứ, P.Nguyễn Thái Bình, Q.1, TP HCM', '0283823309', '2021-12-10', '2021-12-10 10:27:44'),
(6, 'Công Ty TNHH Sơn Hoàng Tín', 'P. Bình Hưng Hòa B, Q. Bình Tân, Tp. Hồ Chí Minh', '0949292968', '2021-12-10', '2021-12-10 10:28:49'),
(7, 'Công Ty Cổ Phần Tập Đoàn Sơn KLIPS NANO', 'Đường Hoàng Quốc Việt, P. Nghĩa Tân, Q. Cầu Giấy, Hà Nội', '0242215556', '2021-12-10', '2021-12-10 10:30:32'),
(8, 'Công Ty TNHH ROXO', 'Thôn Yên Thái, Xã Tiền Yên, Huyện Hoài Đức, Hà Nội', '0934619950', '2021-12-10', '2021-12-10 10:31:59'),
(9, 'Công Ty TNHH Sơn Miền Nam', 'P. Thắng Nhất, TP. Vũng Tàu, Bà Rịa-Vũng Tàu', '0908028553', '2021-12-10', '2021-12-10 10:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `type_product`
--

CREATE TABLE `type_product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_product`
--

INSERT INTO `type_product` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sơn lót', NULL, '2021-09-07 01:04:18'),
(2, 'Sơn chống thấm', '2021-12-10 10:07:59', '2021-12-10 10:08:05'),
(3, 'Sơn lót chống kiềm', '2021-12-10 10:08:10', '2021-12-10 10:08:10'),
(4, 'Sơn ngoại thất', '2021-12-10 10:08:15', '2021-12-10 10:08:15'),
(5, 'Sơn nội thất', '2021-12-10 10:08:21', '2021-12-10 10:08:21'),
(6, 'Sơn mịn', '2021-12-10 10:08:29', '2021-12-10 10:08:29'),
(7, 'Sơn mờ', '2021-12-10 10:08:33', '2021-12-10 10:08:33'),
(8, 'Sơn bóng', '2021-12-10 10:08:38', '2021-12-10 10:08:38'),
(9, 'Sơn ngoài trời', '2021-12-10 10:08:57', '2021-12-10 10:08:57'),
(10, 'Sơn dầu', '2021-12-10 10:09:15', '2021-12-10 10:09:15'),
(11, 'Chổi quét sơn', '2021-12-10 10:09:50', '2021-12-10 10:09:50'),
(12, 'con lăn sơn', '2021-12-10 10:09:56', '2021-12-10 10:09:56');

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
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `name`, `address`, `status`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Kho 1', 'Liên Cơ Mỹ Đình, Từ Liêm, Hà Nội, Việt Nam', 1, 'storage/1639131578.jfif', NULL, '2021-12-10 10:19:38'),
(2, 'kho 2 nội thành', 'Bắc Hồng, Đông Anh, Hà Nội CHI NHÁNH PHÍA NAM', 1, 'storage/1639131432.jpg', '2021-09-11 01:19:07', '2021-12-10 10:17:12');

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
-- Dumping data for table `warehouse_transfer`
--

INSERT INTO `warehouse_transfer` (`id`, `id_product_detail`, `id_admin`, `id_warehouse`, `id_warehouse_old`, `date_transfer`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 34, 2, 2, 1, '2021-09-26', 1, '2021-09-25 17:39:16', '2021-09-25 17:39:16'),
(2, 34, 2, 2, 1, '2021-09-26', 1, '2021-09-25 17:47:00', '2021-09-25 17:47:00'),
(3, 34, 2, 2, 1, '2021-09-26', 1, '2021-09-25 17:49:23', '2021-09-25 17:49:23'),
(4, 34, 2, 2, 1, '2021-09-26', 1, '2021-09-25 17:50:05', '2021-09-25 17:50:05'),
(5, 34, 2, 2, 1, '2021-09-26', 1, '2021-09-25 17:50:18', '2021-09-25 17:50:18'),
(6, 34, 2, 2, 1, '2021-09-26', 1, '2021-09-25 17:51:34', '2021-09-25 17:51:34'),
(7, 34, 2, 2, 1, '2021-09-26', 1, '2021-09-25 17:56:51', '2021-09-25 17:56:51'),
(8, 34, 2, 2, 1, '2021-09-26', 1, '2021-09-25 17:57:07', '2021-09-25 17:57:07'),
(9, 34, 2, 2, 1, '2021-09-26', 1, '2021-09-25 18:01:08', '2021-09-25 18:01:08'),
(10, 34, 2, 2, 1, '2021-09-26', 1, '2021-09-25 18:01:53', '2021-09-25 18:01:53'),
(11, 34, 2, 2, 1, '2021-09-26', 1, '2021-09-25 18:02:36', '2021-09-25 18:02:36'),
(12, 34, 2, 2, 1, '2021-09-26', 1, '2021-09-25 18:03:29', '2021-09-25 18:03:29'),
(13, 35, 2, 2, 1, '2021-09-28', 1, '2021-09-28 08:40:12', '2021-09-28 08:40:12'),
(14, 35, 2, 2, 1, '2021-09-28', 1, '2021-09-28 08:41:45', '2021-09-28 08:41:45'),
(15, 35, 2, 2, 1, '2021-09-28', 1, '2021-09-28 08:43:11', '2021-09-28 08:43:11'),
(16, 35, 2, 2, 1, '2021-09-28', 11, '2021-09-28 09:36:27', '2021-09-28 09:36:27'),
(17, 35, 2, 2, 1, '2021-10-05', 1, '2021-10-05 04:19:55', '2021-10-05 04:19:55'),
(18, 37, 1, 1, 2, '2021-12-11', 1, '2021-12-11 15:57:40', '2021-12-11 15:57:40');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `receipt_detail`
--
ALTER TABLE `receipt_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warehouse_transfer`
--
ALTER TABLE `warehouse_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
