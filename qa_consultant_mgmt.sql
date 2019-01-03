-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2019 at 02:19 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qa_consultant_mgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_infos`
--

CREATE TABLE `audit_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `auditor_id` int(10) UNSIGNED NOT NULL,
  `last_audit_date` date DEFAULT NULL,
  `last_audit_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_audit_date` date DEFAULT NULL,
  `next_audit_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_infos`
--

INSERT INTO `audit_infos` (`id`, `customer_id`, `auditor_id`, `last_audit_date`, `last_audit_type`, `next_audit_date`, `next_audit_type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 2, '2019-01-03', 'Certification', '2020-01-02', NULL, 'audit_pending', '2019-01-01 04:56:44', '2019-01-02 07:42:35', NULL),
(2, 7, 3, '2019-01-02', 'Certification', '2020-01-02', NULL, 'audit_pending', '2019-01-01 05:16:37', '2019-01-02 07:48:07', NULL),
(3, 3, 4, '2019-01-02', 'Certification', NULL, NULL, 'audit_pending', '2019-01-01 05:17:56', '2019-01-02 06:44:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `audit_managements`
--

CREATE TABLE `audit_managements` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `iso_service_id` int(10) UNSIGNED NOT NULL,
  `certification_body_id` int(10) UNSIGNED NOT NULL,
  `auditor_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `audit_date` date NOT NULL,
  `audit_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `audit_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certification_date` timestamp NULL DEFAULT NULL,
  `certification_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certification_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_managements`
--

INSERT INTO `audit_managements` (`id`, `customer_id`, `iso_service_id`, `certification_body_id`, `auditor_name`, `audit_date`, `audit_type`, `audit_status`, `certification_date`, `certification_price`, `certification_status`, `created_at`, `updated_at`) VALUES
(1, 5, 2, 1, 'dd', '2019-01-30', 'Certification', 'audit_done', '2019-01-02 18:30:00', NULL, 'certification_done', '2019-01-01 04:55:48', '2019-01-02 07:42:35'),
(2, 5, 2, 1, 'dd', '2019-01-30', 'Certification', 'audit_done', '2019-01-01 18:30:00', '45000', 'certification_done', '2019-01-01 04:56:44', '2019-01-02 07:48:07'),
(3, 7, 3, 1, 'ss', '2019-01-30', 'Certification', 'audit_done', '2019-01-01 18:30:00', NULL, 'certification_done', '2019-01-01 05:16:37', '2019-01-02 06:44:17'),
(4, 3, 2, 1, 'dd', '2019-02-01', 'Certification', 'audit_pending', NULL, NULL, 'certification_pending', '2019-01-01 05:17:56', '2019-01-01 05:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `iso_service_id` int(10) UNSIGNED NOT NULL,
  `certification_body_id` int(10) UNSIGNED NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certification_bodies`
--

CREATE TABLE `certification_bodies` (
  `id` int(10) UNSIGNED NOT NULL,
  `iso_service_id` int(10) UNSIGNED NOT NULL,
  `accreditation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certification_body_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certification_bodies`
--

INSERT INTO `certification_bodies` (`id`, `iso_service_id`, `accreditation`, `certification_body_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'DJAC', 'Mumbai', '2019-01-01 03:39:40', '2019-01-01 06:17:19', NULL),
(2, 2, 'DJAC', 'Delhi', '2019-01-01 03:42:21', '2019-01-01 03:42:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `cust_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `cust_name`, `cust_email`, `cust_phone_number`, `contact_person_name`, `contact_person_number`, `street_name`, `city`, `state`, `pincode`, `country`, `created_at`, `updated_at`) VALUES
(3, 'Pratik', 'pr@gmail.com', '78945575', 'sk', '0816724340', 'Belgharia', 'Kolkata', 'WB', '700056', 'India', '2018-12-27 02:59:52', '2019-01-01 03:32:31'),
(5, 'Shilpi Chaki', 'shlpchaki76@gmail.com', '9851813376', 'Shilpi Chaki', '+919851813376', '18/16 Rabindranagar, P.O.- Midnapore, Dist.- Paschim Medinipur', 'Midnapore', 'West Bengal', '721101', 'India', '2018-12-28 04:15:58', '2018-12-28 04:15:58'),
(6, 'Sandeep', 'sandeep@mail.com', '9876543210', 'sk', '8167243400', 'Belgharia', 'Kolkata', 'WB', '700056', 'India', '2018-12-29 04:46:46', '2018-12-29 04:46:46'),
(7, 'Shilpi Chaki', 'shlpchaki76@gmail.com', '+919851813376', 'sk', '+919851813376', '18/16 Rabindranagar, P.O.- Midnapore, Dist.- Paschim Medinipur', 'Midnapore', 'West Bengal', '721101', 'India', '2019-01-01 03:32:01', '2019-01-01 03:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_27_064532_create_customers_table', 1),
(4, '2018_12_27_065132_create_products_table', 2),
(8, '2018_12_27_110934_create_certifications_table', 6),
(13, '2019_01_01_074825_create_certification_bodies_table', 7),
(14, '2019_01_01_075237_create_audit_managements_table', 7),
(15, '2019_01_01_080459_create_certifications_table', 7),
(16, '2019_01_01_080823_create_audit_infos_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `detail`, `created_at`, `updated_at`) VALUES
(2, 'ISO 9001(QMS)', NULL, '2018-12-27 03:02:53', '2018-12-27 03:02:53'),
(3, 'ISO 13485 (QMSFMD)', NULL, '2018-12-27 03:16:34', '2018-12-27 03:16:34'),
(4, 'ISO 14001(EMS)', NULL, '2018-12-27 03:16:45', '2018-12-27 03:16:45'),
(5, 'ISO 17020(QMSFIB)', NULL, '2018-12-27 03:16:57', '2018-12-27 03:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '123456', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_infos`
--
ALTER TABLE `audit_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audit_infos_customer_id_foreign` (`customer_id`),
  ADD KEY `audit_infos_auditor_id_foreign` (`auditor_id`);

--
-- Indexes for table `audit_managements`
--
ALTER TABLE `audit_managements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audit_managements_customer_id_foreign` (`customer_id`),
  ADD KEY `audit_managements_iso_service_id_foreign` (`iso_service_id`),
  ADD KEY `audit_managements_certification_body_id_foreign` (`certification_body_id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certifications_customer_id_foreign` (`customer_id`),
  ADD KEY `certifications_iso_service_id_foreign` (`iso_service_id`),
  ADD KEY `certifications_certification_body_id_foreign` (`certification_body_id`);

--
-- Indexes for table `certification_bodies`
--
ALTER TABLE `certification_bodies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certification_bodies_iso_service_id_foreign` (`iso_service_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `audit_infos`
--
ALTER TABLE `audit_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `audit_managements`
--
ALTER TABLE `audit_managements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certification_bodies`
--
ALTER TABLE `certification_bodies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_infos`
--
ALTER TABLE `audit_infos`
  ADD CONSTRAINT `audit_infos_auditor_id_foreign` FOREIGN KEY (`auditor_id`) REFERENCES `audit_managements` (`id`),
  ADD CONSTRAINT `audit_infos_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `audit_managements`
--
ALTER TABLE `audit_managements`
  ADD CONSTRAINT `audit_managements_certification_body_id_foreign` FOREIGN KEY (`certification_body_id`) REFERENCES `certification_bodies` (`id`),
  ADD CONSTRAINT `audit_managements_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `audit_managements_iso_service_id_foreign` FOREIGN KEY (`iso_service_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `certifications`
--
ALTER TABLE `certifications`
  ADD CONSTRAINT `certifications_certification_body_id_foreign` FOREIGN KEY (`certification_body_id`) REFERENCES `certification_bodies` (`id`),
  ADD CONSTRAINT `certifications_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `certifications_iso_service_id_foreign` FOREIGN KEY (`iso_service_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `certification_bodies`
--
ALTER TABLE `certification_bodies`
  ADD CONSTRAINT `certification_bodies_iso_service_id_foreign` FOREIGN KEY (`iso_service_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
