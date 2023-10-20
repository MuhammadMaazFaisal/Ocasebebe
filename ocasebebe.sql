-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2023 at 09:49 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ocasebebe`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `attribute_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `attribute_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Color', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint UNSIGNED NOT NULL,
  `attribute_id` bigint UNSIGNED NOT NULL,
  `attribute_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attribute_id`, `attribute_value`, `color_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Black', '#000000', 1, '2023-10-13 20:25:31', '2023-10-13 20:25:31'),
(2, 1, 'Green', '#1ec231', 1, '2023-10-13 20:25:41', '2023-10-13 20:25:41'),
(3, 1, 'Red', '#e90c0c', 1, '2023-10-13 20:25:50', '2023-10-13 20:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `attribute_id` bigint UNSIGNED DEFAULT NULL,
  `length_id` bigint UNSIGNED DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `product_id`, `user_id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Question 1', 'admin@bodymindspirit.com', '2023-10-17 15:40:19', '2023-10-17 15:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `length`
--

CREATE TABLE `length` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `length`
--

INSERT INTO `length` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'S', 1, '2023-10-13 20:45:43', '2023-10-13 20:45:43'),
(2, 'M', 1, '2023-10-13 20:45:50', '2023-10-13 20:45:50'),
(3, 'L', 1, '2023-10-13 20:45:57', '2023-10-13 20:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(38, '2014_10_12_000000_create_users_table', 2),
(39, '2014_10_12_100000_create_password_resets_table', 2),
(40, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(41, '2022_11_08_214745_create_products_table', 2),
(42, '2022_11_15_195941_create_orders_table', 2),
(43, '2023_10_10_194403_create_order_details_table', 2),
(44, '2023_10_11_183231_create_parent_categories_table', 2),
(45, '2023_10_11_183259_create_attributes_table', 2),
(46, '2023_10_11_183322_create_attribute_values_table', 2),
(47, '2023_10_11_183358_create_variants_table', 2),
(48, '2023_10_11_183419_create_length_table', 2),
(49, '2023_10_11_185949_create_product_attributes_table', 2),
(51, '2023_10_13_201751_create_cart_table', 2),
(52, '2023_10_13_202422_create_wishlists_table', 2),
(53, '2023_10_12_171525_create_reviews_table', 3),
(54, '2023_10_17_201657_create_leads_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `customer_name`, `customer_email`, `customer_address`, `quantity`, `total_price`, `payment_method`, `created_at`, `updated_at`) VALUES
(4, '5', 'Question 1', 'm.maazfaisal0301@gmail.com', '123', '1', '20', 'Cash on Delivery', '2023-10-18 17:20:43', '2023-10-18 17:20:43'),
(5, '4', 'Question 1', 'fredaston491@gmail.com', '123', '1', '200', 'Cash on Delivery', '2023-10-20 16:31:52', '2023-10-20 16:31:52'),
(6, '4', 'Question 1', 'fredaston491@gmail.com', '123', '1', '200', 'Cash on Delivery', '2023-10-20 16:32:20', '2023-10-20 16:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_discount_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_discount_price`, `product_quantity`, `product_image`, `product_description`, `product_category`, `created_at`, `updated_at`) VALUES
(3, 4, 1, 'Dummy Product', '25.00', '20.00', '1', '1697249478.png', 'This is the main description', '4', '2023-10-18 17:20:43', '2023-10-18 17:20:43'),
(4, 6, 2, 'Product 12', '100.00', NULL, '2', '1697835793.jpg', 'fadsf', '14', '2023-10-20 16:32:20', '2023-10-20 16:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `parent_categories`
--

CREATE TABLE `parent_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_categories`
--

INSERT INTO `parent_categories` (`id`, `parent_category_name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Balancelles', '1697285219.png', 1, NULL, '2023-10-14 07:06:59'),
(2, 'Berceau', '1697285227.png', 1, NULL, '2023-10-14 07:07:07'),
(3, 'Siège auto & Poussette', '1697285234.png', 1, NULL, '2023-10-14 07:07:14'),
(4, 'Transats', '1697285244.png', 1, NULL, '2023-10-14 07:07:24'),
(5, 'Tous nos articles', '1697285256.png', 1, NULL, '2023-10-14 07:07:36'),
(6, 'Vêtement fille', '1697285266.png', 1, NULL, '2023-10-14 07:07:46'),
(7, 'Vêtement garçon', '1697285275.png', 1, NULL, '2023-10-14 07:07:55'),
(8, 'Bonnet chaussette', '1697285284.png', 1, NULL, '2023-10-14 07:08:04'),
(9, 'Chaussure fille', '1697285303.png', 1, NULL, '2023-10-14 07:08:23'),
(10, 'Chaussure garçon', '1697285314.png', 1, NULL, '2023-10-14 07:08:34'),
(11, 'Bavoirs', '1697285326.png', 1, NULL, '2023-10-14 07:08:46'),
(12, 'Biberons et accessoires', '1697285352.png', 1, NULL, '2023-10-14 07:09:12'),
(13, 'Chaises Hautes', '1697285367.png', 1, NULL, '2023-10-14 07:09:27'),
(14, 'Sucettes', '1697285382.png', 1, NULL, '2023-10-14 07:09:42'),
(15, 'Stérilisateurs', '1697285442.png', 1, NULL, '2023-10-14 07:10:43'),
(16, 'Couches', '1697285458.png', 1, NULL, '2023-10-14 07:10:58'),
(17, 'Lingettes', '1697285473.png', 1, NULL, '2023-10-14 07:11:13'),
(18, 'Matelas et Table à Langer', '1697285488.png', 1, NULL, '2023-10-14 07:11:28'),
(19, 'Sacs à langer', '1697285500.png', 1, NULL, '2023-10-14 07:11:40'),
(20, 'Soins de la peau', '1697285515.png', 1, NULL, '2023-10-14 07:11:55'),
(21, 'Baignoires', '', 1, NULL, NULL),
(22, 'Pots et Réducteurs', '1697285539.png', 1, NULL, '2023-10-14 07:12:19'),
(23, 'Cadeaux de naissance', '1697285556.png', 1, NULL, '2023-10-14 07:12:36'),
(24, 'Doudous et Peluches', '1697285569.png', 1, NULL, '2023-10-14 07:12:49'),
(25, 'Tapis d’éveil', '1697285586.png', 1, NULL, '2023-10-14 07:13:06'),
(26, 'Youpalas', '1697285599.png', 1, NULL, '2023-10-14 07:13:19'),
(27, 'Accessoires bébés', '1697285609.png', 1, NULL, '2023-10-14 07:13:29'),
(28, 'Portes Bébé', '1697285624.png', 1, NULL, '2023-10-14 07:13:44'),
(29, 'Slip jetable', '1697285634.png', 1, NULL, '2023-10-14 07:13:54'),
(30, 'Serviette maternité', '1697285647.png', 1, NULL, '2023-10-14 07:14:07'),
(31, 'Tire-lait', '1697285669.png', 1, NULL, '2023-10-14 07:14:29'),
(32, 'Plus', '1697285681.png', 1, NULL, '2023-10-14 07:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('123@gmail.com', 'oTIqHA', '2023-10-18 15:57:23'),
('123@gmail.com', 'zcOJfZ', '2023-10-18 15:58:08'),
('admin@bodymindspirit.com', 'GDOB59', '2023-10-18 15:58:27'),
('123@gmail.com', 'G92hth', '2023-10-18 15:59:45'),
('fredaston491@gmail.com', '6kSy5V', '2023-10-18 16:01:33'),
('123@gmail.com', 'IqiaEy', '2023-10-18 16:03:43'),
('123@gmail.com', '92qfYK', '2023-10-18 16:04:07'),
('123@gmail.com', 'kfOhyf', '2023-10-18 16:04:14'),
('123@gmail.com', 'D9PWWf', '2023-10-18 16:04:29'),
('m.maazfaisal0301@gmail.com', 'mXcGMtjx96', '2023-10-18 17:15:13'),
('m.maazfaisal0301@gmail.com', 'QcWWpOc4lo', '2023-10-18 17:16:29'),
('m.maazfaisal0301@gmail.com', 'r5qxp9JLFq', '2023-10-18 17:18:02'),
('m.maazfaisal0301@gmail.com', 'Fo42dXUAgd', '2023-10-18 17:19:05'),
('m.maazfaisal0301@gmail.com', 'ylptPVOFVR', '2023-10-19 11:36:06'),
('m.maazfaisal0301@gmail.com', 'p3ktYTr6iw', '2023-10-19 11:38:32'),
('m.maazfaisal0301@gmail.com', 'TBonGgYtPM', '2023-10-19 11:41:03'),
('m.maazfaisal0301@gmail.com', 'V73nNxDOHo', '2023-10-19 11:44:50'),
('m.maazfaisal0301@gmail.com', '8fIcYrnugP', '2023-10-19 11:46:23'),
('m.maazfaisal0301@gmail.com', 'Z9PIyMwKPG', '2023-10-19 11:46:26'),
('m.maazfaisal0301@gmail.com', 'uY6dkBDzP9', '2023-10-19 11:48:13'),
('m.maazfaisal0301@gmail.com', 'H4H8dpgOwQ', '2023-10-19 11:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `length_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_category_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `multiple_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `length_id`, `parent_category_id`, `product_name`, `price`, `discount_price`, `image`, `multiple_image`, `short_description`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '[\"1\",\"2\"]', '4', 'Dummy Product', '25.00', '20.00', '1697249478.png', '[\"169724947926.jpg\"]', 'This is short description', 'This is the main description', 1, '2023-10-13 21:11:19', '2023-10-14 07:35:00'),
(2, NULL, '14', 'Product 12', '100.00', NULL, '1697838498.jpg', NULL, 'sad', 'fadsf', 1, '2023-10-20 16:03:13', '2023-10-20 16:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `product_attribute_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_value_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `product_attribute_id`, `attribute_value_id`, `attribute_value`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '[1,3]', '[\"Black\",\"Red\"]', '2023-10-13 21:11:19', '2023-10-13 22:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `review_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL DEFAULT '3' COMMENT '1:admin,,2:user',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 1, '$2y$10$2C.JE9RoInrYBpjqeA4NhOeZlLi7LgkJdWJ8CRKrfnhG4CkuzSeEm', NULL, '2023-10-13 19:07:22', '2023-10-13 19:07:22'),
(4, NULL, '123@gmail.com', 2, '$2y$10$M/H2gsmkoEHVkY0XYP/Sne7qOceKSK5iTG/5BcIPJUwfIaIjA8Y3C', NULL, '2023-10-17 13:08:41', '2023-10-17 13:08:41'),
(5, NULL, 'm.maazfaisal0301@gmail.com', 2, '$2y$10$Ge7cfDx9MVsfUSvdjyLNOOxOsbglsIh5SMJLvDCFa137kz6Q4PfC6', NULL, '2023-10-18 16:33:28', '2023-10-18 16:45:42'),
(6, NULL, 'm.maazfaisal0302@gmail.com', 2, '$2y$10$P2rJaK6c8fdzpJiaC5sRCOGFW7Tln7bgebwhKqLc4gqcpJV7SwVVy', NULL, '2023-10-19 12:45:57', '2023-10-19 12:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` bigint UNSIGNED NOT NULL,
  `variant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_attribute_id_foreign` (`attribute_id`),
  ADD KEY `carts_length_id_foreign` (`length_id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leads_product_id_foreign` (`product_id`),
  ADD KEY `leads_user_id_foreign` (`user_id`);

--
-- Indexes for table `length`
--
ALTER TABLE `length`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_categories`
--
ALTER TABLE `parent_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attributes_product_id_foreign` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `length`
--
ALTER TABLE `length`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parent_categories`
--
ALTER TABLE `parent_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attribute_values` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_length_id_foreign` FOREIGN KEY (`length_id`) REFERENCES `length` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `leads_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
