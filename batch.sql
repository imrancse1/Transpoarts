-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2020 at 05:50 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batch`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `full_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `full_name`, `email`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'admin@gmail.com', '$2y$10$a8cWkFhyAzY68ZrTwu64W.rdPB0oK7H13pw5/R3fVLs1eraCcDX1a', 'Wapvby2JtwtVhundCx2DClymhkTgU68otmwuYQYG64OxQZX1fzcX3vJaQS7k', 1, '2016-08-22 05:59:58', '2019-07-10 04:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `bank_id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_licence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bank_id`, `bank_name`, `bank_licence`, `bank_address`, `created_at`, `updated_at`) VALUES
(0, 'Null', '', '', NULL, NULL),
(2, 'Jonota Bank', '455445', 'Mirpur -2', '2020-02-24 12:53:51', '2020-02-24 12:53:51'),
(4, 'Rupali', '236975', 'Rajbari', '2020-02-25 09:01:49', '2020-02-25 09:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `batch_id` int(10) UNSIGNED NOT NULL,
  `batch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_product_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `male_product_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `female_product_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`batch_id`, `batch_name`, `product_name`, `gender`, `total_product_number`, `male_product_number`, `female_product_number`, `created_at`, `updated_at`) VALUES
(1, 'Batch-1', 'Hens', 'Male', '20', '15', '5', '2020-02-20 00:16:58', '2020-02-20 01:02:04'),
(2, 'Batch-2', 'Hen', 'Both', '20', '10', '10', '2020-02-20 00:20:29', '2020-02-20 01:02:25'),
(4, 'Batch-1', 'Hens', 'Female', '20', '10', '5', '2020-02-20 01:02:51', '2020-02-20 01:02:51'),
(5, 'Dhaka', 'HP', 'Both', '20', '10', '10', '2020-02-20 09:02:08', '2020-02-20 09:02:08'),
(6, 'Dhaka', 'BMW bike', 'Male', 'NaN', '10', '', '2020-02-20 09:08:31', '2020-02-20 09:08:31'),
(7, 'Batch-1', 'BMW', 'Both', '20', '10', '10', '2020-02-20 09:09:16', '2020-02-20 09:09:16'),
(8, 'Batch-1', 'BMW bike', 'Female', 'NaN', '', '10', '2020-02-20 09:09:45', '2020-02-20 09:09:45'),
(9, 'Batch-4', 'BMW bike', 'Female', '16', '0', '16', '2020-02-22 09:54:55', '2020-02-22 09:55:24'),
(10, 'Batch-1', 'BMW', 'Female', '40', '0', '40', '2020-02-22 10:03:30', '2020-02-22 10:03:30'),
(11, 'Dhaka', 'BMW bike', 'Male', '10', '10', '0', '2020-02-22 10:04:07', '2020-02-22 10:04:07'),
(12, 'Batch-4', 'BMW bike', 'Both', '10', '05', '05', '2020-02-22 10:04:40', '2020-02-22 10:04:40'),
(13, 'Batch-4', 'BMW bike', 'Male', '5', '05', '0', '2020-02-22 10:06:53', '2020-02-22 10:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `inventory_id` int(10) UNSIGNED NOT NULL,
  `wirehouse_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_in` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recevie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `less_purchases`
--

CREATE TABLE `less_purchases` (
  `less_purchase_id` int(10) UNSIGNED NOT NULL,
  `raw_supplier_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `wirehouse_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `order_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_chalan_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receive_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remain_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deduction_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transport_vehicle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transport_fare` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_payable_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `less_purchases`
--

INSERT INTO `less_purchases` (`less_purchase_id`, `raw_supplier_id`, `product_id`, `wirehouse_id`, `date`, `order_quantity`, `supplier_chalan_qty`, `receive_quantity`, `remain_quantity`, `deduction_quantity`, `bill_quantity`, `purchase_rate`, `transport_vehicle`, `transport_fare`, `total_payable_amount`, `created_at`, `updated_at`) VALUES
(9, 3, 4, 3, '2020-03-03', '100', '90', '80', '10', '10', '70', '2', 'car', '5', '135', '2020-03-02 14:05:28', '2020-03-02 14:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_12_052050_create_categories_table', 1),
(4, '2020_02_12_065807_create_input_vehicles_table', 2),
(5, '2020_02_12_083657_create_trip_infos_table', 3),
(6, '2020_02_12_095542_create_receptions_table', 4),
(7, '2020_02_12_124723_create_drives_table', 5),
(8, '2020_02_12_130619_create_products_table', 6),
(9, '2020_02_12_142741_create_trip_costings_table', 7),
(10, '2020_02_12_153916_create_fuel_expenses_table', 8),
(11, '2020_02_13_031749_create_select_vehicles_table', 9),
(12, '2020_02_13_045110_create_price_trips_table', 10),
(13, '2020_02_13_052812_create_trip_cash_receives_table', 11),
(14, '2020_02_20_045841_create_batches_table', 12),
(15, '2020_02_20_152719_create_raw_suppliers_table', 13),
(16, '2020_02_23_162009_create_products_table', 14),
(17, '2020_02_23_171954_create_wirehouses_table', 15),
(18, '2020_02_23_180913_create_banks_table', 16),
(19, '2020_02_24_032459_create_transports_table', 17),
(20, '2020_02_24_041800_create_purchases_table', 18),
(21, '2020_02_24_171356_create_supplier_bills_table', 19),
(22, '2020_02_29_163611_create_inventories_table', 20),
(23, '2020_03_01_184128_create_less_purchases_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `wirehouse_id` int(255) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `wirehouse_id`, `product_name`, `created_at`, `updated_at`) VALUES
(6, 5, 'maize', '2020-03-08 17:22:44', '2020-03-08 17:22:44'),
(7, 6, 'HP', '2020-03-09 09:51:50', '2020-03-09 09:51:50'),
(9, 7, 'BMW bike', '2020-03-13 21:53:36', '2020-03-13 21:53:36'),
(10, 8, 'BMW', '2020-03-13 22:11:32', '2020-03-13 22:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `raw_supplier_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `wirehouse_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `order_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_chalan_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receive_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inventory_receive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remain_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sack_purchase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moisture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deduction_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transport_vehicle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transport_fare` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_payable_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `raw_supplier_id`, `product_id`, `wirehouse_id`, `date`, `order_quantity`, `supplier_chalan_qty`, `receive_quantity`, `weight_quantity`, `inventory_receive`, `remain_quantity`, `sack_purchase`, `moisture`, `deduction_quantity`, `bill_quantity`, `purchase_rate`, `transport_vehicle`, `transport_fare`, `total_payable_amount`, `created_at`, `updated_at`) VALUES
(61, 5, 6, 5, '2020-03-11', '2000', '1000', '1000', '10', '1980', '1000', '20', '3', '50', '950', '2', 'Bus', '2', '1898', NULL, '2020-03-09 12:12:49'),
(64, 6, 7, 6, '2020-03-10', '100', '40', '30', '10', '20', '60', '20', '3', '20.9', '10', '2', 'Bus', '1', '19', NULL, NULL),
(65, 7, 6, 5, '2020-03-12', '2000', '400', '400', '10', '390', '1600', '20', '3', '32', '368', '2', 'Bus', '1', '735', NULL, NULL),
(66, 7, 7, 6, '2020-03-20', '2000', '400', '90', '10', '80', '1600', '20', '3', '22.7', '378', '2', 'Bus', '1', '755', NULL, NULL),
(67, 7, 9, 7, '2020-03-14', '3000', '2500', '2500', '100', '2400', '500', '50', '3', '125', '2375', '10.50', 'Bus', '2', '23748', NULL, NULL),
(68, 6, 9, 7, '2020-03-21', '800', '600', '600', '100', '500', '200', '20', '3', '38', '562', '21.37', 'Bus', '1', '11801', NULL, NULL),
(69, 5, 10, 8, '2020-03-19', '2000', '400', '90', '100', '-10', '1600', '50', '3', '52.7', '348', '21.37', 'car', '2', '7306', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `raw_suppliers`
--

CREATE TABLE `raw_suppliers` (
  `raw_supplier_id` int(10) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raw_suppliers`
--

INSERT INTO `raw_suppliers` (`raw_supplier_id`, `supplier_name`, `supplier_phone`, `supplier_address`, `supplier_company`, `created_at`, `updated_at`) VALUES
(5, 'Abbas Traders (Purchase)', '1712902604', 'MD.Abul Kalam', 'n', '2020-03-08 09:33:12', '2020-03-08 09:33:12'),
(6, 'Abdullah Traders', '1740548434', 'ISHWARDI', 'NA', '2020-03-08 09:49:16', '2020-03-08 09:49:16'),
(7, 'Abdur Rashid', '0', 'ISHWARDI', 'NA', '2020-03-08 09:49:50', '2020-03-08 09:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_bills`
--

CREATE TABLE `supplier_bills` (
  `supplierBill_id` int(10) UNSIGNED NOT NULL,
  `purchase_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `raw_supplier_id` int(11) NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` int(11) DEFAULT NULL,
  `pay_amount` int(11) NOT NULL,
  `description_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_bills`
--

INSERT INTO `supplier_bills` (`supplierBill_id`, `purchase_id`, `date`, `raw_supplier_id`, `payment_mode`, `bank_id`, `account_name`, `account_number`, `pay_amount`, `description_note`, `created_at`, `updated_at`) VALUES
(7, 6, '2020-02-14', 3, 'Bank', 2, 'Imran', 1557, 2000, 'Test', '2020-02-25 02:32:35', '2020-02-25 07:50:59'),
(9, 7, '2020-02-08', 1, 'Bank', 4, 'prince', 1557, 10000, 'Test', '2020-02-25 08:40:47', '2020-02-25 12:32:31'),
(12, 7, '2020-02-21', 3, 'Cash', 0, NULL, NULL, 5000, NULL, '2020-02-25 12:43:42', '2020-02-25 12:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `transport_id` int(10) UNSIGNED NOT NULL,
  `vehicle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `up_trip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `down_trip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transports`
--

INSERT INTO `transports` (`transport_id`, `vehicle_name`, `up_trip`, `down_trip`, `created_at`, `updated_at`) VALUES
(1, 'Trick', 'Dhaka', 'Rajbari', '2020-02-23 22:10:42', '2020-02-23 22:10:42'),
(3, 'Pickup', 'Baliakandhi', 'Faridpur', '2020-02-25 09:03:35', '2020-02-25 09:03:35'),
(4, 'Car up', 'Rajbari', 'ggfgagtry', '2020-02-29 13:13:30', '2020-02-29 13:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wirehouses`
--

CREATE TABLE `wirehouses` (
  `wirehouse_id` int(10) UNSIGNED NOT NULL,
  `wirehouse_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wirehouse_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wirehouses`
--

INSERT INTO `wirehouses` (`wirehouse_id`, `wirehouse_name`, `wirehouse_address`, `created_at`, `updated_at`) VALUES
(5, 'ISHWARDI', 'ARKANDI.', '2020-03-08 17:22:18', '2020-03-08 17:22:18'),
(6, 'Apple', 'usa', '2020-03-08 22:27:04', '2020-03-09 00:04:07'),
(7, 'ALI BABA', 'Chaina', '2020-03-09 10:05:32', '2020-03-09 10:05:32'),
(8, 'ScanIT', 'Dhaka', '2020-03-13 22:11:13', '2020-03-13 22:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `work_orders`
--

CREATE TABLE `work_orders` (
  `id` int(255) NOT NULL,
  `raw_supplier_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `purchase_id` varchar(255) NOT NULL,
  `word_remain_quantity` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_orders`
--

INSERT INTO `work_orders` (`id`, `raw_supplier_id`, `product_id`, `purchase_id`, `word_remain_quantity`, `created_at`, `updated_at`) VALUES
(1, '3', 'Cow', '5000', '4000', '2020-03-03 23:05:44.000000', '2020-03-03 23:05:44.000000'),
(2, '1', 'Hens', '700000', '686360', '2020-03-03 23:06:17.000000', '2020-03-03 23:06:17.000000'),
(3, '3', 'Cow', '5000', '4000', '2020-03-03 23:13:47.000000', '2020-03-03 23:13:47.000000'),
(4, '3', 'Cow', '5000', '4000', '2020-03-03 23:20:26.000000', '2020-03-03 23:20:26.000000'),
(5, '4', 'Laptop', '30000', '15000', '2020-03-03 23:41:59.000000', '2020-03-03 23:41:59.000000'),
(6, '1', 'Hens', '2000', '1000', '2020-03-07 08:59:15.000000', '2020-03-07 08:59:15.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `less_purchases`
--
ALTER TABLE `less_purchases`
  ADD PRIMARY KEY (`less_purchase_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `raw_suppliers`
--
ALTER TABLE `raw_suppliers`
  ADD PRIMARY KEY (`raw_supplier_id`);

--
-- Indexes for table `supplier_bills`
--
ALTER TABLE `supplier_bills`
  ADD PRIMARY KEY (`supplierBill_id`);

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`transport_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wirehouses`
--
ALTER TABLE `wirehouses`
  ADD PRIMARY KEY (`wirehouse_id`);

--
-- Indexes for table `work_orders`
--
ALTER TABLE `work_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `bank_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `batch_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `inventory_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `less_purchases`
--
ALTER TABLE `less_purchases`
  MODIFY `less_purchase_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `raw_suppliers`
--
ALTER TABLE `raw_suppliers`
  MODIFY `raw_supplier_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier_bills`
--
ALTER TABLE `supplier_bills`
  MODIFY `supplierBill_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `transport_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wirehouses`
--
ALTER TABLE `wirehouses`
  MODIFY `wirehouse_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `work_orders`
--
ALTER TABLE `work_orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
