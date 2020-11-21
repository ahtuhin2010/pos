-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2020 at 09:56 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 1, 1, NULL, '2020-11-03 19:41:45', '2020-11-03 19:41:45'),
(2, 'Bata', 1, 1, 1, '2020-11-03 19:41:55', '2020-11-03 19:42:08'),
(4, 'Apex', 1, 1, NULL, '2020-11-04 10:29:07', '2020-11-04 10:29:07'),
(5, 'Loto', 1, 1, NULL, '2020-11-04 20:01:54', '2020-11-04 20:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Rubel', '01761336093', 'rubel@gmail.com', 'Belkuchi, Sirajgonj', 1, 1, 1, '2020-11-03 17:58:49', '2020-11-03 18:02:25'),
(3, 'Faisal Ahmed', '01761336095', 'xfaisal.mi@gmail.com', 'Belkuchi, Sirajgonj', 1, 1, NULL, '2020-11-05 13:01:00', '2020-11-05 13:01:00'),
(4, 'Kabir', '01923552139', 'kabir@gmail.com', 'Dattapara, Savar, Dhaka-1216', 1, NULL, NULL, '2020-11-05 20:22:24', '2020-11-05 20:22:24'),
(5, 'Khan', '01923552130', 'khan@gmail.com', 'Belkuchi', 1, NULL, NULL, '2020-11-16 13:05:56', '2020-11-16 13:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending,1=Approve',
  `created_by` int(11) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `date`, `description`, `status`, `created_by`, `approved_by`, `created_at`, `updated_at`) VALUES
(1, '1', '2020-11-06', 'test', 1, 1, 1, '2020-11-05 20:22:24', '2020-11-10 14:33:26'),
(3, '2', '2020-11-10', 'hi', 1, 1, 1, '2020-11-10 09:45:17', '2020-11-10 12:31:17'),
(4, '3', '2020-11-15', 'hlw', 1, 1, 1, '2020-11-15 13:23:19', '2020-11-15 13:23:45'),
(5, '4', '2020-11-15', NULL, 1, 1, 1, '2020-11-16 13:05:56', '2020-11-16 13:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `invoice_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `selling_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `date`, `invoice_id`, `category_id`, `product_id`, `selling_qty`, `unit_price`, `selling_price`, `status`, `created_at`, `updated_at`) VALUES
(1, '2020-11-06', 1, 1, 1, 1, 20500, 20500, 1, '2020-11-05 20:22:24', '2020-11-05 20:22:24'),
(3, '2020-11-10', 3, 1, 1, 1, 5000, 5000, 1, '2020-11-10 09:45:17', '2020-11-10 09:45:17'),
(4, '2020-11-10', 3, 1, 3, 1, 10000, 10000, 1, '2020-11-10 09:45:17', '2020-11-10 09:45:17'),
(5, '2020-11-15', 4, 1, 3, 1, 14500, 14500, 1, '2020-11-15 13:23:19', '2020-11-15 13:23:45'),
(6, '2020-11-15', 5, 4, 6, 1, 750, 750, 1, '2020-11-16 13:05:56', '2020-11-16 13:06:11');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_03_214710_create_supppliers_table', 2),
(5, '2020_11_03_234326_create_customers_table', 3),
(6, '2020_11_04_004808_create_units_table', 4),
(8, '2020_11_04_012422_create_categories_table', 5),
(9, '2020_11_04_014801_create_products_table', 6),
(11, '2020_11_04_031706_create_purchases_table', 7),
(12, '2020_11_05_152941_create_invoices_table', 8),
(13, '2020_11_05_153242_create_invoice_details_table', 8),
(14, '2020_11_05_153328_create_payments_table', 8),
(15, '2020_11_05_153408_create_payment_details_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `paid_status` varchar(51) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `invoice_id`, `customer_id`, `paid_status`, `paid_amount`, `due_amount`, `total_amount`, `discount_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'full_paid', 20000, 0, 20000, 500, '2020-11-05 20:22:24', '2020-11-16 12:11:19'),
(3, 3, 3, 'partial_paid', 7000, 8000, 15000, 0, '2020-11-10 09:45:17', '2020-11-16 12:20:27'),
(4, 4, 1, 'full_paid', 14300, 0, 14300, 200, '2020-11-15 13:23:19', '2020-11-15 13:23:19'),
(5, 5, 5, 'partial_paid', 300, 400, 700, 50, '2020-11-16 13:05:56', '2020-11-16 13:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `current_paid_amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `invoice_id`, `current_paid_amount`, `date`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 15000, '2020-11-06', NULL, '2020-11-05 20:22:24', '2020-11-05 20:22:24'),
(3, 3, 5000, '2020-11-10', NULL, '2020-11-10 09:45:17', '2020-11-10 09:45:17'),
(4, 4, 14300, '2020-11-15', NULL, '2020-11-15 13:23:19', '2020-11-15 13:23:19'),
(5, 1, 5000, '2020-11-16', NULL, '2020-11-16 12:12:07', '2020-11-16 12:12:07'),
(8, 3, 2000, '2020-11-16', NULL, '2020-11-16 12:20:27', '2020-11-16 12:20:27'),
(9, 5, 200, '2020-11-15', NULL, '2020-11-16 13:05:56', '2020-11-16 13:05:56'),
(10, 5, 100, '2020-11-16', NULL, '2020-11-16 13:07:44', '2020-11-16 13:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `supplier_id`, `unit_id`, `category_id`, `name`, `quantity`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Walton Mobile 445', 13, 1, 1, 1, '2020-11-03 20:31:43', '2020-11-14 16:47:40'),
(3, 1, 1, 1, 'Walton Mobile 444', 33, 1, 1, NULL, '2020-11-04 10:29:44', '2020-11-15 13:23:45'),
(4, 3, 1, 2, 'Bata B23', 15, 1, 1, NULL, '2020-11-04 10:30:07', '2020-11-04 19:21:27'),
(5, 3, 1, 2, 'Bata B234', 0, 1, 1, NULL, '2020-11-04 10:30:30', '2020-11-04 10:30:30'),
(6, 4, 1, 4, 'Apex A54', 39, 1, 1, NULL, '2020-11-04 10:30:59', '2020-11-16 13:06:11'),
(7, 4, 1, 4, 'Apex A540', 45, 1, 1, NULL, '2020-11-04 10:31:20', '2020-11-04 19:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `buying_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending,1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `category_id`, `product_id`, `purchase_no`, `date`, `description`, `buying_qty`, `unit_price`, `buying_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'kk-5675', '2020-11-04', 'Walton Phone', 2, 10000, 20000, 1, 1, NULL, '2020-11-04 17:30:16', '2020-11-04 17:30:16'),
(3, 3, 2, 4, 'ak-4543', '2020-11-06', 'Bata Shoes', 15, 890, 13350, 1, 1, NULL, '2020-11-04 18:29:13', '2020-11-04 18:29:13'),
(4, 4, 4, 7, 'sd-56756', '2020-11-06', 'Apex Shoes', 45, 4500, 202500, 1, 1, NULL, '2020-11-04 19:26:36', '2020-11-04 19:26:36'),
(5, 1, 1, 3, 'p-444', '2020-11-10', 'Walton Phone', 10, 1500, 15000, 1, 1, NULL, '2020-11-10 12:16:57', '2020-11-10 12:16:57'),
(6, 1, 1, 3, 'p-4544', '2020-11-10', 'Walton Phone', 5, 12000, 60000, 1, 1, NULL, '2020-11-10 12:17:53', '2020-11-10 12:17:53'),
(7, 1, 1, 3, 'p-45654', '2020-11-10', NULL, 10, 15000, 150000, 1, 1, NULL, '2020-11-10 12:23:12', '2020-11-10 12:23:12'),
(8, 1, 1, 3, 'p-44454', '2020-11-10', NULL, 10, 10000, 100000, 1, 1, NULL, '2020-11-10 12:28:42', '2020-11-10 12:28:42'),
(9, 1, 1, 1, 'w-5654', '2020-11-13', 'Walton Phone', 10, 12000, 120000, 1, 1, NULL, '2020-11-14 16:46:10', '2020-11-14 16:46:10'),
(10, 1, 1, 1, 'w-654', '2020-11-14', 'Walton Phone', 3, 11500, 34500, 1, 1, NULL, '2020-11-14 16:47:23', '2020-11-14 16:47:23'),
(11, 4, 4, 6, 'ap-343', '2020-11-10', 'Apex Company', 40, 500, 20000, 1, 1, NULL, '2020-11-16 13:04:27', '2020-11-16 13:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `supppliers`
--

CREATE TABLE `supppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supppliers`
--

INSERT INTO `supppliers` (`id`, `name`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Walton Company', '01923552130', 'walton@gmail.com', 'Savar, Dhaka', 1, 1, NULL, '2020-11-03 17:08:32', '2020-11-03 17:08:32'),
(3, 'Bata Company', '01923552132', 'bata@gmail.com', 'Sector 10 - Uttara, Dhaka', 1, 1, NULL, '2020-11-03 17:26:38', '2020-11-03 17:26:38'),
(4, 'Apex Company', '01761336091', 'apex@gmail.com', 'Belkuchi, Sirajgonj', 1, 1, 1, '2020-11-04 10:28:46', '2020-11-04 11:18:01'),
(5, 'Tuhin Shop', '01923552130', 'tuhin@gmail.com', 'Sector 8 - Uttara, Dhaka', 1, 1, 1, '2020-11-04 19:55:22', '2020-11-04 19:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'PCS', 1, 1, NULL, '2020-11-03 19:12:40', '2020-11-03 19:12:40'),
(2, 'Kilo', 1, 1, 1, '2020-11-03 19:16:23', '2020-11-03 19:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Anisul Haque', 'xpfun420@gmail.com', NULL, '$2y$10$xKx07JAvTlcRX.s.B7OUHe97WJK9MN26dWq9/Va32kM3Z5wr0CUxG', '01923552130', 'Dattapara, Savar, Dhaka-1216', 'Male', '202011031338bg1.png', 1, '4FEKBAb9UskOT7fAdc4tNy1GrBAvo5LAgayoE8GnMd93KsQ8PNYuVy2zVlxN', '2020-10-28 03:11:07', '2020-11-03 07:51:22'),
(4, 'User', 'Tuhin', 'ahtuhin2010@gmail.com', NULL, '$2y$10$W3sgG06qEQ4Rl7atlxAvw.9J9WQ2nlfOtKnhLb8SEwzFOsuUfEfKW', NULL, NULL, NULL, NULL, 1, NULL, '2020-11-03 07:30:33', '2020-11-03 07:30:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supppliers`
--
ALTER TABLE `supppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supppliers`
--
ALTER TABLE `supppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
