-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 10, 2022 at 02:52 PM
-- Server version: 8.0.30-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mallline_customer_3eac91f3_newsatesto`
--

-- --------------------------------------------------------

--
-- Table structure for table `new_basic_parameters`
--

CREATE TABLE `new_basic_parameters` (
  `id` int NOT NULL,
  `label` varchar(255) NOT NULL,
  `snippet` varchar(255) DEFAULT 'NULL',
  `value` varchar(255) DEFAULT NULL,
  `key` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `disabled` int NOT NULL DEFAULT '0',
  `active` int NOT NULL DEFAULT '1',
  `sortable` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_basic_parameters`
--

INSERT INTO `new_basic_parameters` (`id`, `label`, `snippet`, `value`, `key`, `type`, `disabled`, `active`, `sortable`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(1, 'საიტი მისამართი', 'თქვნეი ვებ გვერდის მისამართი', 'https://kaxeti.mallline.ge', 'site_url', 'input', 1, 1, 1, NULL, NULL, 1),
(2, 'საიტი სტატუსი', 'თქვნეი ვებ გვერდის სტატუსი (ჩართული - გათიშული)', '1', 'site_active', 'checkbox', 1, 0, 1, '2022-01-24 05:31:07', NULL, 1),
(4, 'მისამართი (ქართულად)', 'საიტის მისამართი რომელიც უნდა გამოჩნდეს ვებ გვერზე (ქართულად)', 'თბილისი ვარკეთილი ჯავახეთის  ნომერი 4', 'address_ge', 'input', 0, 1, 1, '2022-04-11 04:29:32', NULL, 1),
(5, 'მისამართი (ინგლისურად)', 'საიტის მისამართი რომელიც უნდა გამოჩნდეს ვებ გვერზე (ქართულად)', 'Tbilisi Varketili Javakheti N4', 'address_en', 'input', 0, 1, 1, '2022-04-11 04:29:32', NULL, 1),
(6, 'კომპანიის საიდენტიფიკაციო კოდი', 'საიდენტიფიკაციო კოდი რომელიც გამოჩნდება საიტზე და ინვოისებში', '01027053589', 'identification_code', 'input', 0, 1, 1, '2022-04-11 04:29:32', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_companies`
--

CREATE TABLE `new_companies` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `customer_id` int NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_companies`
--

INSERT INTO `new_companies` (`id`, `name`, `code`, `address`, `customer_id`, `active`, `created_at`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(2, 'test', 'test', 'test', 4, 1, '2022-01-28 01:59:20', '2022-02-22 09:45:39', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_compare`
--

CREATE TABLE `new_compare` (
  `id` int NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_compare`
--

INSERT INTO `new_compare` (`id`, `session_id`, `product_id`, `created_at`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(1, '1TwaVMCNXQy6s3UB43ARdMnVRFHez1RbDSHtjpfN', 7, '2022-06-30 14:36:56', '2022-06-30 14:36:56', NULL, 1),
(2, '62HdVDPMC0L8mxWvKE1uDxMVicWd9FRA4x2Hwqnj', 6, '2022-07-02 14:17:27', '2022-07-02 14:17:27', NULL, 1),
(3, '62HdVDPMC0L8mxWvKE1uDxMVicWd9FRA4x2Hwqnj', 6, '2022-07-02 14:17:39', '2022-07-02 14:17:39', NULL, 1),
(4, 'NStj1t7ebQBAvjS4Scg4lSl13gD2e6TMr0FaciF8', 7, '2022-07-05 02:53:18', '2022-07-05 02:53:18', NULL, 1),
(5, 'EFIZXKk6eyKIhn5fwdYiIscVecI6IvWjmh5f2Vj0', 6, '2022-07-07 05:06:34', '2022-07-07 05:06:34', NULL, 1),
(6, 'xENiplpwrP14eCjPpcd1sT8Mw04E1K0X6pgovNAz', 6, '2022-07-08 07:16:00', '2022-07-08 07:16:00', NULL, 1),
(7, 'xENiplpwrP14eCjPpcd1sT8Mw04E1K0X6pgovNAz', 7, '2022-07-08 07:16:06', '2022-07-08 07:16:06', NULL, 1),
(8, 'xENiplpwrP14eCjPpcd1sT8Mw04E1K0X6pgovNAz', 7, '2022-07-08 07:16:08', '2022-07-08 07:16:08', NULL, 1),
(9, 'XXQ5YbqBbNEQJjH8EKVxnWSb6aIAntWEKEhgu0kG', 7, '2022-07-08 07:28:36', '2022-07-08 07:28:36', NULL, 1),
(10, 'OfL0RCzp4OUmphoWwn9OIPBANjsBAKBHeUt9Cuuc', 6, '2022-07-10 04:23:43', '2022-07-10 04:23:43', NULL, 1),
(11, 'kuHNujnlX9sBWJhKXZBpNVAqa3ZPIyNfvJA8x7d2', 6, '2022-07-10 09:21:50', '2022-07-10 09:21:50', NULL, 1),
(23, 'z1ZROvDql0lcuMl0z6VI4b3fLRpMWOouIJDuSFma', 11, '2022-08-03 11:10:28', '2022-08-03 11:10:28', NULL, 1),
(21, 'z1ZROvDql0lcuMl0z6VI4b3fLRpMWOouIJDuSFma', 10, '2022-08-03 11:10:23', '2022-08-03 11:10:23', NULL, 1),
(22, 'z1ZROvDql0lcuMl0z6VI4b3fLRpMWOouIJDuSFma', 9, '2022-08-03 11:10:27', '2022-08-03 11:10:27', NULL, 1),
(24, 'z1ZROvDql0lcuMl0z6VI4b3fLRpMWOouIJDuSFma', 12, '2022-08-03 11:10:30', '2022-08-03 11:10:30', NULL, 1),
(25, 'z1ZROvDql0lcuMl0z6VI4b3fLRpMWOouIJDuSFma', 8, '2022-08-03 11:10:32', '2022-08-03 11:10:32', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_customers`
--

CREATE TABLE `new_customers` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `personal_number` varchar(20) DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `type` int DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `google_id` varchar(255) DEFAULT NULL,
  `is_admin` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_customers`
--

INSERT INTO `new_customers` (`id`, `name`, `lastname`, `personal_number`, `bdate`, `phone`, `email`, `type`, `password`, `remember_token`, `last_login`, `active`, `google_id`, `is_admin`, `created_at`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(19, 'Admin', 'Admin', '123123123', '2022-10-04', '555111222', 'admin@example.com', 1, '$2y$10$kx.4R5SJV3UmYnfNAOyZ3e17e6dpmj48H63TGBC6s5IxtXyvDJ4mK', NULL, NULL, 1, NULL, 1, '2022-10-04 17:34:03', '2022-10-04 13:37:23', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_delivery_parameters`
--

CREATE TABLE `new_delivery_parameters` (
  `id` int NOT NULL,
  `label` varchar(255) NOT NULL,
  `snippet` varchar(255) DEFAULT 'NULL',
  `value` varchar(255) DEFAULT NULL,
  `key` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `disabled` int NOT NULL DEFAULT '0',
  `active` int NOT NULL DEFAULT '1',
  `sortable` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_delivery_parameters`
--

INSERT INTO `new_delivery_parameters` (`id`, `label`, `snippet`, `value`, `key`, `type`, `disabled`, `active`, `sortable`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(1, 'მიწოდების სერვისი', 'მიწოდების სერვისის სტატუსი (ჩართული - გათიშული)', '1', 'delivery_active', 'checkbox', 0, 1, 1, '2022-01-24 05:31:07', NULL, 1),
(4, 'უფასო მიწოდება', 'პროდუქციის თანხა, რომლის ზემოთაც იქნება შესაძლებელი უფასო მიწოდებით სარგებლობა', '100', 'free_delivery_price', 'number', 0, 1, 1, '2022-01-21 13:23:13', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_delivery_streets`
--

CREATE TABLE `new_delivery_streets` (
  `id` int NOT NULL,
  `name_ge` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `district_id` int NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_delivery_streets`
--

INSERT INTO `new_delivery_streets` (`id`, `name_ge`, `name_en`, `district_id`, `active`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(1, 'მანგლისის ქუჩა', 'Manglisi Street', 1, 0, '2022-03-17 12:25:15', NULL, 1),
(2, 'რაღაცა ქუჩა', 'Manglisi Street', 1, 0, '2022-03-17 12:25:15', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_info_parameters`
--

CREATE TABLE `new_info_parameters` (
  `id` int NOT NULL,
  `label` varchar(255) NOT NULL,
  `snippet` varchar(255) DEFAULT 'NULL',
  `value` varchar(255) DEFAULT NULL,
  `key` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `disabled` int NOT NULL DEFAULT '0',
  `active` int NOT NULL DEFAULT '1',
  `sortable` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_info_parameters`
--

INSERT INTO `new_info_parameters` (`id`, `label`, `snippet`, `value`, `key`, `type`, `disabled`, `active`, `sortable`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(6, 'ელ-ფოსტა', 'ელ-ფოსტა რომელიც გსურთ გამოჩნდეს ვებ-გვერდზე', 'nikaragua@gmail.com', 'email', 'input', 0, 1, 1, '2022-10-04 14:16:08', NULL, 1),
(15, 'ტელეფონის ნომერი', 'ტელეფონის ნომერი რომელიც გსურთ გამოჩნდეს ვებ-გვერდზე', '585511444', 'phone', 'input', 0, 1, 1, '2022-10-04 14:16:08', NULL, 1),
(16, 'მისამართი', 'მისამართი რომელიც გსურთ გამოჩნდეს ვებ-გვერდზე', 'ჯავახეთის ქუჩა N120 / Javakheti Street N1204444', 'address', 'input', 0, 1, 1, '2022-10-04 14:16:08', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_navigation`
--

CREATE TABLE `new_navigation` (
  `id` int NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` text,
  `sortable` int NOT NULL DEFAULT '0',
  `active` int NOT NULL DEFAULT '1',
  `cretead_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_navigation`
--

INSERT INTO `new_navigation` (`id`, `url`, `title`, `sortable`, `active`, `cretead_at`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(2, 'actionMainAboutUs', '{\"ge\":\"ჩვენ შესახებ\",\"en\":\"About us\"}', 2, 1, '2022-06-03 18:03:28', '2022-09-27 15:41:38', NULL, 1),
(3, 'actionProductsIndex', '{\"ge\":\"პროდუქცია\",\"en\":\"All products\"}', 3, 1, '2022-06-03 18:03:28', '2022-09-27 15:37:36', NULL, 1),
(6, 'actionMainContact', '{\"ge\":\"კონტაქტი\",\"en\":\"Contact\"}', 5, 1, '2022-06-03 18:03:28', '2022-09-27 15:37:36', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_orders`
--

CREATE TABLE `new_orders` (
  `id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `new_order_actions`
--

CREATE TABLE `new_order_actions` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `parameters` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_order_actions`
--

INSERT INTO `new_order_actions` (`id`, `name`, `key`, `active`, `parameters`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(1, 'შიდა გადაზიდვის ზედნადების ატვირთვა', 'inner_transportation_overhead_import', 1, '{}', NULL, NULL, 1),
(2, 'საკურიერო 1 ში გაგზავნა', 'send_to_courier', 1, '{}', NULL, NULL, 1),
(3, 'საკურიერო 2 ში გაგზავნა', 'send_to_courier_2', 1, '{}', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_payments`
--

CREATE TABLE `new_payments` (
  `id` int NOT NULL,
  `name_ge` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `category_id` int DEFAULT NULL,
  `key` varchar(255) NOT NULL,
  `options` text,
  `photo` varchar(255) DEFAULT NULL,
  `description` text,
  `active` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_payments`
--

INSERT INTO `new_payments` (`id`, `name_ge`, `name_en`, `category_id`, `key`, `options`, `photo`, `description`, `active`, `created_at`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(1, 'TBC ბანკის ონლაინ გადახდა', 'TBC Bank online payment', 1, 'tbc_payment', '{\"key\": {\"label\":\"Payment Key\",\"value\":\"tbc_payment\",\"secret\":false,\"disabled\":true},\"api_key\":{\"label\":\"Api key\",\"value\":\"\",\"secret\":true,\"disabled\":false},\"api_secret\":{\"label\":\"Api secret\",\"value\":\"\",\"secret\":true,\"disabled\":false},\"merchant_key\":{\"label\":\"Merchant key\",\"value\":\"\",\"secret\":false,\"disabled\":false}}', NULL, NULL, '0', '2022-01-31 05:31:06', '2022-04-20 07:02:18', NULL, 1),
(2, 'საქართველოს ბანკის ონლაინ გადახდა', 'Bank of Georgia online payment', 1, 'bog_payment', '{\"key\":{\"label\":\"Payment key\",\"value\":\"bog_payment\",\"secret\":false,\"disabled\":true},\"secret_key\":{\"label\":\"Secret key\",\"value\":\"92b4ef4337848df77de9bd7cfa6b7b5f\",\"secret\":true,\"disabled\":false},\"client_id\":{\"label\":\"Client id\",\"value\":\"1206\",\"secret\":false,\"disabled\":false}}', 'https://dashboard.turbopc.ge/storage/files/1/Payments/625fe27ff0e09.png', NULL, '1', '2022-01-31 05:31:06', '2022-03-31 02:19:53', NULL, 1),
(3, 'საქართველოს ბანკის ონლაინ განვადება', 'Bank of Georgia online installment', 2, 'bog_installment', '{\"key\":{\"label\":\"Payment key\",\"value\":\"bog_payment\",\"secret\":false,\"disabled\":true},\"secret_key\":{\"label\":\"Secret key\",\"value\":\"92b4ef4337848df77de9bd7cfa6b7b5f\",\"secret\":true,\"disabled\":false},\"client_id\":{\"label\":\"Client id\",\"value\":\"1206\",\"secret\":false,\"disabled\":false}}', 'https://dashboard.turbopc.ge/storage/files/1/Payments/625fe27ff0e09.png', NULL, '1', '2022-01-31 05:31:06', '2022-03-31 02:19:53', NULL, 1),
(4, 'თიბისი ონლაინ განვადება', 'TBC online installment', 2, 'tbc_installment', '{\"key\":{\"label\":\"Payment key\",\"value\":\"bog_payment\",\"secret\":false,\"disabled\":true},\"secret_key\":{\"label\":\"Secret key\",\"value\":\"92b4ef4337848df77de9bd7cfa6b7b5f\",\"secret\":true,\"disabled\":false},\"client_id\":{\"label\":\"Client id\",\"value\":\"1206\",\"secret\":false,\"disabled\":false}}', NULL, NULL, '0', '2022-01-31 05:31:06', '2022-04-20 07:02:19', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_payment_category`
--

CREATE TABLE `new_payment_category` (
  `id` int NOT NULL,
  `name_ge` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_payment_category`
--

INSERT INTO `new_payment_category` (`id`, `name_ge`, `name_en`, `active`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(1, 'ონლაინ გადახდები', 'Online payments', 1, NULL, NULL, 1),
(2, 'ონლაინ განვადება', 'Online loan', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_permissions`
--

CREATE TABLE `new_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_permissions`
--

INSERT INTO `new_permissions` (`id`, `name`, `title`, `group_id`, `guard_name`, `active`, `created_at`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(24, 'test_permission', 'ragaca upleba', 1, 'web', 1, '2022-02-22 05:35:08', '2022-02-22 05:35:13', '2022-02-22 05:35:13', 0),
(25, 'test', 'test', 1, 'web', 1, '2022-04-12 08:01:36', '2022-04-12 08:01:36', NULL, 1),
(26, 'test2', 'test', 1, 'web', 1, '2022-04-12 08:01:45', '2022-04-12 08:01:45', NULL, 1),
(27, 'test23', 'test', 1, 'web', 1, '2022-04-12 08:01:46', '2022-04-12 08:01:46', NULL, 1),
(28, 'test234', 'test', 1, 'web', 1, '2022-04-12 08:01:47', '2022-04-12 08:01:47', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_plugin_parameters`
--

CREATE TABLE `new_plugin_parameters` (
  `id` int NOT NULL,
  `label` varchar(255) NOT NULL,
  `snippet` varchar(255) DEFAULT 'NULL',
  `value` varchar(255) DEFAULT NULL,
  `key` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `disabled` int NOT NULL DEFAULT '0',
  `active` int NOT NULL DEFAULT '1',
  `sortable` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_plugin_parameters`
--

INSERT INTO `new_plugin_parameters` (`id`, `label`, `snippet`, `value`, `key`, `type`, `disabled`, `active`, `sortable`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(1, 'Google Analytics', 'Google Analytics - ის ID', 'https://www.facebook.com/TurboEl', 'google_analytics', 'input', 0, 1, 1, '2022-04-11 04:29:32', NULL, 1),
(2, 'Facebook Pixel', 'Facebook Pixel - ის ID', '123', 'facebook_pixel', 'input', 0, 1, 1, '2022-04-11 04:29:32', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_products`
--

CREATE TABLE `new_products` (
  `id` int NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `name_ge` varchar(255) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `description` text,
  `vendor_id` int NOT NULL DEFAULT '1',
  `category_id` int NOT NULL,
  `child_category_id` int NOT NULL DEFAULT '0',
  `brand_id` int DEFAULT '0',
  `discount_percent` int DEFAULT NULL,
  `discount_price` int DEFAULT NULL,
  `count` int NOT NULL DEFAULT '0',
  `photo` varchar(255) DEFAULT NULL,
  `stock` int NOT NULL DEFAULT '1',
  `used` int DEFAULT NULL,
  `preorder` int DEFAULT '0',
  `facebook` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `active` int NOT NULL DEFAULT '1',
  `root_id` int NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `new_product_category`
--

CREATE TABLE `new_product_category` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `parent_id` int NOT NULL,
  `meta` text,
  `sortable` int NOT NULL DEFAULT '0',
  `active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_product_category`
--

INSERT INTO `new_product_category` (`id`, `name`, `parent_id`, `meta`, `sortable`, `active`, `created_at`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(1, '{\"ge\":\"მთავარი კატეგორია\",\"en\":\"Main category\"}', 0, '{\"ge\":\"test 123\",\"en\":\"test 123\"}', 0, 1, '2022-02-03 12:10:06', '2022-02-03 12:10:06', NULL, 1),
(2, '{\"ge\":\"ქვეკატეგორიის გარეშე\",\"en\":\"Without child category\"}', 1, '{\"ge\":\"meta\",\"en\":\"meta\"}', 1, 1, '2022-02-23 10:27:44', '2022-02-23 10:37:30', NULL, 1),
(3, '{\"ge\":\"\\u10d7\\u10d0\\u10d5\\u10d8\\u10e1 \\u10db\\u10dd\\u10d5\\u10da\\u10d0\",\"en\":\"Self care\"}', 0, '{\"ge\":\"\\u10d7\\u10d0\\u10d5\\u10d8\\u10e1 \\u10db\\u10dd\\u10d5\\u10da\\u10d0\",\"en\":\"Self care\"}', 0, 1, '2022-06-13 08:09:30', '2022-06-13 08:14:43', NULL, 1),
(4, '{\"ge\":\"\\u10e1\\u10d0\\u10e0\\u10d4\\u10ea\\u10ee\\u10d8 \\u10db\\u10d0\\u10dc\\u10e5\\u10d0\\u10dc\\u10d4\\u10d1\\u10d8\",\"en\":\"Washing machines\"}', 3, '{\"ge\":\"\\u10e1\\u10d0\\u10e0\\u10d4\\u10ea\\u10ee\\u10d8 \\u10db\\u10d0\\u10dc\\u10e5\\u10d0\\u10dc\\u10d4\\u10d1\\u10d8\",\"en\":\"Washing machines\"}', 0, 1, '2022-06-13 08:09:50', '2022-06-13 08:09:50', NULL, 1),
(5, '{\"ge\":\"\\u10ec\\u10d5\\u10e0\\u10d8\\u10da\\u10d8 \\u10e2\\u10d4\\u10e5\\u10dc\\u10d8\\u10d9\\u10d0\",\"en\":\"Small appliances\"}', 0, '{\"ge\":\"\\u10ec\\u10d5\\u10e0\\u10d8\\u10da\\u10d8 \\u10e2\\u10d4\\u10e5\\u10dc\\u10d8\\u10d9\\u10d0\",\"en\":\"Small appliances\"}', 0, 1, '2022-06-13 08:15:12', '2022-06-13 08:15:12', NULL, 1),
(6, '{\"ge\":\"\\u10db\\u10e1\\u10ee\\u10d5\\u10d8\\u10da\\u10d8 \\u10e2\\u10d4\\u10e5\\u10dc\\u10d8\\u10d9\\u10d0\",\"en\":\"\\u10db\\u10e1\\u10ee\\u10d5\\u10d8\\u10da\\u10d8 \\u10e2\\u10d4\\u10e5\\u10dc\\u10d8\\u10d9\\u10d0\"}', 0, '{\"ge\":\"\\u10db\\u10e1\\u10ee\\u10d5\\u10d8\\u10da\\u10d8 \\u10e2\\u10d4\\u10e5\\u10dc\\u10d8\\u10d9\\u10d0\",\"en\":\"\\u10db\\u10e1\\u10ee\\u10d5\\u10d8\\u10da\\u10d8 \\u10e2\\u10d4\\u10e5\\u10dc\\u10d8\\u10d9\\u10d0\"}', 0, 1, '2022-06-27 11:06:38', '2022-06-27 11:06:38', NULL, 1),
(7, '{\"ge\":\"\\u10d9\\u10da\\u10d8\\u10db\\u10d0\\u10e2\\u10e3\\u10e0\\u10d8 \\u10e2\\u10d4\\u10e5\\u10dc\\u10d8\\u10d9\\u10d0\",\"en\":\"Climate technology\"}', 0, '{\"ge\":\"\\u10d9\\u10da\\u10d8\\u10db\\u10d0\\u10e2\\u10e3\\u10e0\\u10d8 \\u10e2\\u10d4\\u10e5\\u10dc\\u10d8\\u10d9\\u10d0\",\"en\":\"Climate technology\"}', 0, 1, '2022-07-15 11:07:13', '2022-07-15 11:07:13', NULL, 1),
(8, '{\"ge\":\"\\u10e1\\u10ee\\u10d5\\u10d0\",\"en\":\"Other\"}', 0, '{\"ge\":\"\\u10e1\\u10ee\\u10d5\\u10d0\",\"en\":\"Other\"}', 0, 1, '2022-07-15 11:07:34', '2022-07-15 11:07:34', NULL, 1),
(9, '{\"ge\":\"\\u10d9\\u10dd\\u10dc\\u10d3\\u10d4\\u10dc\\u10ea\\u10d8\\u10dd\\u10dc\\u10d4\\u10e0\\u10d4\\u10d1\\u10d8\",\"en\":\"Air conditioners\"}', 7, '{\"ge\":\"\\u10d9\\u10dd\\u10dc\\u10d3\\u10d4\\u10dc\\u10ea\\u10d8\\u10dd\\u10dc\\u10d4\\u10e0\\u10d4\\u10d1\\u10d8\",\"en\":\"air conditioners\"}', 0, 1, '2022-07-15 11:11:24', '2022-07-15 11:11:24', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_product_count_log`
--

CREATE TABLE `new_product_count_log` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `method` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_product_count_log`
--

INSERT INTO `new_product_count_log` (`id`, `user_id`, `method`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(2, 1, 'Excel', '2022-02-22 05:52:59', NULL, 1),
(3, 1, 'Excel', '2022-02-22 05:52:59', NULL, 1),
(4, 1, 'Excel', '2022-02-22 05:52:59', NULL, 1),
(5, 1, 'Manual', '2022-03-04 19:55:23', NULL, 1),
(6, 1, 'Manual', '2022-03-04 19:55:35', NULL, 1),
(7, 1, 'Manual', '2022-03-04 20:37:51', NULL, 1),
(8, 1, 'Excel', '2022-03-04 20:53:28', NULL, 1),
(9, 1, 'Manual', '2022-03-04 20:54:02', NULL, 1),
(10, 1, 'Manual', '2022-03-09 20:47:20', NULL, 1),
(11, 1, 'Manual', '2022-03-09 20:47:26', NULL, 1),
(12, 1, 'Manual', '2022-03-09 21:35:50', NULL, 1),
(13, 1, 'Manual', '2022-03-17 12:00:22', NULL, 1),
(14, 1, 'Manual', '2022-03-28 01:43:03', NULL, 1),
(15, 1, 'Manual', '2022-04-15 06:31:07', NULL, 1),
(16, 1, 'Manual', '2022-06-27 06:29:20', NULL, 1),
(17, 1, 'Manual', '2022-06-29 12:19:47', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_product_count_log_item`
--

CREATE TABLE `new_product_count_log_item` (
  `id` int NOT NULL,
  `log_id` int NOT NULL,
  `product_id` int NOT NULL,
  `value_old` text NOT NULL,
  `value_new` text NOT NULL,
  `restored` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_product_count_log_item`
--

INSERT INTO `new_product_count_log_item` (`id`, `log_id`, `product_id`, `value_old`, `value_new`, `restored`, `created_at`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(26, 9, 16, '1500', '150', 0, '2022-03-04 20:54:02', '2022-03-04 20:54:02', NULL, 1),
(27, 10, 16, '150', '150000', 0, '2022-03-09 20:47:20', '2022-03-09 20:47:20', NULL, 1),
(28, 11, 16, '150000', '150', 0, '2022-03-09 20:47:26', '2022-03-09 20:47:26', NULL, 1),
(29, 12, 18, '0', '1500', 0, '2022-03-09 21:35:50', '2022-03-09 21:35:50', NULL, 1),
(30, 13, 23, '150', '0', 1, '2022-03-17 12:00:22', '2022-03-17 12:15:21', NULL, 1),
(31, 14, 22, '0', '123', 0, '2022-03-28 01:43:03', '2022-03-28 01:43:03', NULL, 1),
(32, 15, 34, '10', '2', 0, '2022-04-15 06:31:08', '2022-04-15 06:31:08', NULL, 1),
(33, 16, 2, '0', '44', 0, '2022-06-27 06:29:20', '2022-06-27 06:29:20', NULL, 1),
(34, 17, 7, '0', '10', 0, '2022-06-29 12:19:47', '2022-06-29 12:19:47', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_product_gallery`
--

CREATE TABLE `new_product_gallery` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `path` varchar(255) NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_product_gallery`
--

INSERT INTO `new_product_gallery` (`id`, `product_id`, `path`, `active`, `created_at`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(6, 18, 'http://127.0.0.1:8000/storage/files/623300e40bb4a.jpg', 1, '2022-03-17 11:02:55', '2022-03-17 11:02:55', NULL, 1),
(9, 18, 'http://127.0.0.1:8000/storage/files/623300e4b3c63.jpg', 1, '2022-03-17 11:06:52', '2022-03-17 11:06:52', NULL, 1),
(10, 23, 'http://127.0.0.1:8000/storage/files/623300e40bb4a.jpg', 1, '2022-03-17 12:00:14', '2022-03-17 12:00:14', NULL, 1),
(12, 23, 'http://127.0.0.1:8000/storage/files/621ca624016e5.png', 1, '2022-03-17 12:00:14', '2022-03-17 12:00:14', NULL, 1),
(13, 23, 'http://127.0.0.1:8000/storage/files/623300e46a95f.jpg', 1, '2022-03-17 12:00:14', '2022-03-17 12:00:14', NULL, 1),
(14, 23, 'http://127.0.0.1:8000/storage/files/623300e48f2bd.jpg', 1, '2022-03-17 12:00:14', '2022-03-17 12:00:14', NULL, 1),
(15, 26, 'https://dashboard.turbopc.ge/storage/files/1/6242d03ba23b5.png', 1, '2022-04-10 07:53:16', '2022-04-10 07:53:16', NULL, 1),
(16, 26, 'https://dashboard.turbopc.ge/storage/files/1/6242cd764e99e.jpg', 1, '2022-04-10 07:53:16', '2022-04-10 07:53:16', NULL, 1),
(17, 26, 'https://dashboard.turbopc.ge/storage/files/1/6242d03bbec6f.jpg', 1, '2022-04-10 07:53:16', '2022-04-10 07:53:16', NULL, 1),
(18, 26, 'https://dashboard.turbopc.ge/storage/files/1/6242d03bd03ad.jpg', 1, '2022-04-10 07:53:16', '2022-04-10 07:53:16', NULL, 1),
(19, 28, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/Z series/625404832cee4.png', 1, '2022-04-11 06:37:02', '2022-04-11 06:37:02', NULL, 1),
(20, 28, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/Z series/6254048311956.png', 1, '2022-04-11 06:37:02', '2022-04-11 06:37:02', NULL, 1),
(21, 28, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/Z series/625404832d598.png', 1, '2022-04-11 06:37:02', '2022-04-11 06:37:02', NULL, 1),
(22, 28, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/Z series/625404833250f.png', 1, '2022-04-11 06:37:02', '2022-04-11 06:37:02', NULL, 1),
(23, 29, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/Z series/6254048311956.png', 1, '2022-04-11 06:41:28', '2022-04-11 06:41:28', NULL, 1),
(24, 29, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/Z series/625404832cee4.png', 1, '2022-04-11 06:41:28', '2022-04-11 06:41:28', NULL, 1),
(25, 29, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/Z series/625404833250f.png', 1, '2022-04-11 06:41:28', '2022-04-11 06:41:28', NULL, 1),
(26, 30, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/B450/6257d4e6c8319.png', 1, '2022-04-14 04:03:10', '2022-04-14 04:03:10', NULL, 1),
(27, 30, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/B450/6257d4e6c5b3d.png', 1, '2022-04-14 04:03:10', '2022-04-14 04:03:10', NULL, 1),
(28, 30, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/B450/6257d4e6b4bb8.png', 1, '2022-04-14 04:03:10', '2022-04-14 04:03:10', NULL, 1),
(29, 31, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/B450/6257d4e6c5b3d.png', 1, '2022-04-14 04:09:44', '2022-04-14 04:09:44', NULL, 1),
(30, 31, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/B450/6257d4e6b4bb8.png', 1, '2022-04-14 04:09:44', '2022-04-14 04:09:44', NULL, 1),
(31, 31, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/B450/6257d4e6c8319.png', 1, '2022-04-14 04:09:44', '2022-04-14 04:09:44', NULL, 1),
(32, 32, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/H81/6257d914c8d8f.jpg', 1, '2022-04-14 04:21:22', '2022-04-14 04:21:22', NULL, 1),
(33, 32, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/H81/6257d91435064.jpg', 1, '2022-04-14 04:21:22', '2022-04-14 04:21:22', NULL, 1),
(34, 32, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/H81/6257d91422a8a.jpg', 1, '2022-04-14 04:21:22', '2022-04-14 04:21:22', NULL, 1),
(35, 33, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/H81/6257db73ceb67.png', 1, '2022-04-14 04:30:39', '2022-04-14 04:30:39', NULL, 1),
(36, 33, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/H81/6257db73ab9c2.png', 1, '2022-04-14 04:30:39', '2022-04-14 04:30:39', NULL, 1),
(37, 34, 'https://dashboard.turbopc.ge/storage/files/1/GPU/625810c7bdf0d.png', 1, '2022-04-14 08:20:08', '2022-04-14 08:20:08', NULL, 1),
(38, 34, 'https://dashboard.turbopc.ge/storage/files/1/GPU/625810c7bde37.png', 1, '2022-04-15 06:22:11', '2022-04-15 06:22:11', NULL, 1),
(39, 34, 'https://dashboard.turbopc.ge/storage/files/1/GPU/625948342e7e5.png', 1, '2022-04-15 06:26:38', '2022-04-15 06:26:38', NULL, 1),
(40, 34, 'https://dashboard.turbopc.ge/storage/files/1/GPU/6259472ca6a47.png', 1, '2022-04-15 06:26:38', '2022-04-15 06:26:38', NULL, 1),
(41, 34, 'https://dashboard.turbopc.ge/storage/files/1/GPU/625948342e7e5.png', 1, '2022-04-15 06:27:25', '2022-04-15 06:27:25', NULL, 1),
(42, 34, 'https://dashboard.turbopc.ge/storage/files/1/GPU/6259483442075.png', 1, '2022-04-15 06:27:25', '2022-04-15 06:27:25', NULL, 1),
(43, 34, 'https://dashboard.turbopc.ge/storage/files/1/GPU/625948342e7e5.png', 1, '2022-04-15 06:30:28', '2022-04-15 06:30:28', NULL, 1),
(44, 34, 'https://dashboard.turbopc.ge/storage/files/1/GPU/6259483442075.png', 1, '2022-04-15 06:30:28', '2022-04-15 06:30:28', NULL, 1),
(48, 36, 'https://dashboard.turbopc.ge/storage/files/3/625bdf022c7ea.png', 1, '2022-04-17 05:35:17', '2022-04-17 05:35:17', NULL, 1),
(49, 27, 'https://dashboard.turbopc.ge/storage/files/3/625be5ecd9772.png', 1, '2022-04-17 06:03:43', '2022-04-17 06:03:43', NULL, 1),
(50, 27, 'https://dashboard.turbopc.ge/storage/files/3/625be5eee6019.png', 1, '2022-04-17 06:03:43', '2022-04-17 06:03:43', NULL, 1),
(52, 86, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/a320/625eb9a488fc5.png', 1, '2022-04-19 09:31:31', '2022-04-19 09:31:31', NULL, 1),
(63, 37, 'https://dashboard.turbopc.ge/storage/files/1/Motherboards/Z series/625d57e1af565.png', 1, '2022-04-19 10:00:55', '2022-04-19 10:00:55', NULL, 1),
(67, 88, 'https://dashboard.turbopc.ge/storage/files/3/6267b147d88e6.png', 1, '2022-04-26 04:51:53', '2022-04-26 04:51:53', NULL, 1),
(68, 88, ' https://dashboard.turbopc.ge/storage/files/3/6267b14805377.png', 1, '2022-04-26 04:51:53', '2022-04-26 04:51:53', NULL, 1),
(69, 88, ' https://dashboard.turbopc.ge/storage/files/3/6267b148297b5.png', 1, '2022-04-26 04:51:53', '2022-04-26 04:51:53', NULL, 1),
(72, 91, 'https://dashboard.turbopc.ge/storage/files/3/6267b572dfe69.png', 1, '2022-04-26 05:05:14', '2022-04-26 05:05:14', NULL, 1),
(73, 91, 'https://dashboard.turbopc.ge/storage/files/3/6267b572f0575.png', 1, '2022-04-26 05:05:14', '2022-04-26 05:05:14', NULL, 1),
(74, 92, 'https://dashboard.turbopc.ge/storage/files/3/6267b9d20c37a.png', 1, '2022-04-26 05:22:47', '2022-04-26 05:22:47', NULL, 1),
(75, 93, 'https://dashboard.turbopc.ge/storage/files/3/6267ba64d59f5.png', 1, '2022-04-26 05:25:22', '2022-04-26 05:25:22', NULL, 1),
(76, 93, 'https://dashboard.turbopc.ge/storage/files/3/6267ba64c5501.png', 1, '2022-04-26 05:25:22', '2022-04-26 05:25:22', NULL, 1),
(79, 94, 'https://dashboard.turbopc.ge/storage/files/3/6267bb2c6ba06.png', 1, '2022-04-26 05:28:33', '2022-04-26 05:28:33', NULL, 1),
(80, 94, 'https://dashboard.turbopc.ge/storage/files/3/6267bb2c2e777.png', 1, '2022-04-26 05:28:33', '2022-04-26 05:28:33', NULL, 1),
(81, 90, 'https://dashboard.turbopc.ge/storage/files/1/აქსესუარები/6267bbb661d30.png', 1, '2022-04-26 05:30:34', '2022-04-26 05:30:34', NULL, 1),
(82, 95, 'https://dashboard.turbopc.ge/storage/files/3/6267bc174e7e7.png', 1, '2022-04-26 05:32:32', '2022-04-26 05:32:32', NULL, 1),
(83, 95, 'https://dashboard.turbopc.ge/storage/files/3/6267bc171acc9.png', 1, '2022-04-26 05:32:32', '2022-04-26 05:32:32', NULL, 1),
(84, 96, 'https://dashboard.turbopc.ge/storage/files/3/6267bd13b7695.png', 1, '2022-04-26 05:37:36', '2022-04-26 05:37:36', NULL, 1),
(85, 97, 'https://dashboard.turbopc.ge/storage/files/3/6267be326098b.png', 1, '2022-04-26 05:41:45', '2022-04-26 05:41:45', NULL, 1),
(87, 99, 'https://dashboard.turbopc.ge/storage/files/3/6267c18c27680.png', 1, '2022-04-26 05:56:14', '2022-04-26 05:56:14', NULL, 1),
(88, 100, 'https://dashboard.turbopc.ge/storage/files/3/6267c39b6cc29.png', 1, '2022-04-26 06:04:32', '2022-04-26 06:04:32', NULL, 1),
(91, 101, 'https://dashboard.turbopc.ge/storage/files/3/6267c42915d96.png', 1, '2022-04-26 06:07:09', '2022-04-26 06:07:09', NULL, 1),
(92, 101, ' https://dashboard.turbopc.ge/storage/files/3/6267c428f120b.png', 1, '2022-04-26 06:07:09', '2022-04-26 06:07:09', NULL, 1),
(93, 103, 'https://dashboard.turbopc.ge/storage/files/3/6267c5c9f3912.png', 1, '2022-04-26 06:14:00', '2022-04-26 06:14:00', NULL, 1),
(94, 103, 'https://dashboard.turbopc.ge/storage/files/3/6267c5c9a6371.png', 1, '2022-04-26 06:14:00', '2022-04-26 06:14:00', NULL, 1),
(97, 107, 'https://dashboard.turbopc.ge/storage/files/3/626a5e5d7e93d.png', 1, '2022-04-28 05:34:54', '2022-04-28 05:34:54', NULL, 1),
(98, 107, ' https://dashboard.turbopc.ge/storage/files/3/626a5e5c6dd1d.png', 1, '2022-04-28 05:34:54', '2022-04-28 05:34:54', NULL, 1),
(99, 135, 'https://images.unsplash.com/photo-1566275529824-cca6d008f3da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGhvdG98ZW58MHx8MHx8&w=1000&q=80', 1, '2022-06-03 15:17:43', '2022-06-03 15:17:43', NULL, 1),
(107, 5, 'https://dashboard.mallline.ge/storage/files/1/62bae6c26505f.png', 1, '2022-06-28 13:28:09', '2022-06-28 13:28:09', NULL, 1),
(108, 5, 'https://dashboard.mallline.ge/storage/files/1/62bae8c7b7ee0.png', 1, '2022-06-28 13:28:09', '2022-06-28 13:28:09', NULL, 1),
(109, 7, 'https://dashboard.mallline.ge/storage/files/1/62bae8c7b7ee0.png', 1, '2022-06-29 12:19:25', '2022-06-29 12:19:25', NULL, 1),
(110, 8, 'https://dashboard.mallline.ge/storage/files/1/62d183c1912e9.jpg', 1, '2022-07-15 11:12:40', '2022-07-15 11:12:40', NULL, 1),
(111, 8, 'https://dashboard.mallline.ge/storage/files/1/62d183c1be5ca.jpg', 1, '2022-07-15 11:12:40', '2022-07-15 11:12:40', NULL, 1),
(112, 8, 'https://dashboard.mallline.ge/storage/files/1/62d183c1c2e03.jpg', 1, '2022-07-15 11:12:40', '2022-07-15 11:12:40', NULL, 1),
(113, 9, 'https://dashboard.mallline.ge/storage/files/1/62d183bb075c8.jpg', 1, '2022-07-15 11:14:56', '2022-07-15 11:14:56', NULL, 1),
(114, 9, 'https://dashboard.mallline.ge/storage/files/1/62d183c1912e9.jpg', 1, '2022-07-15 11:14:56', '2022-07-15 11:14:56', NULL, 1),
(115, 9, 'https://dashboard.mallline.ge/storage/files/1/62d183c1a7936.png', 1, '2022-07-15 11:14:56', '2022-07-15 11:14:56', NULL, 1),
(116, 10, 'https://dashboard.mallline.ge/storage/files/1/62d183c1912e9.jpg', 1, '2022-07-15 11:18:22', '2022-07-15 11:18:22', NULL, 1),
(117, 10, 'https://dashboard.mallline.ge/storage/files/1/62d183c28a63c.jpg', 1, '2022-07-15 11:18:22', '2022-07-15 11:18:22', NULL, 1),
(118, 10, 'https://dashboard.mallline.ge/storage/files/1/62d183c1be5ca.jpg', 1, '2022-07-15 11:18:22', '2022-07-15 11:18:22', NULL, 1),
(119, 11, 'https://dashboard.mallline.ge/storage/files/1/62d183c1912e9.jpg', 1, '2022-07-15 11:27:02', '2022-07-15 11:27:02', NULL, 1),
(120, 11, 'https://dashboard.mallline.ge/storage/files/1/62d183c1be5ca.jpg', 1, '2022-07-15 11:27:02', '2022-07-15 11:27:02', NULL, 1),
(121, 11, 'https://dashboard.mallline.ge/storage/files/1/62d183c1c2e03.jpg', 1, '2022-07-15 11:27:02', '2022-07-15 11:27:02', NULL, 1),
(122, 12, 'https://dashboard.mallline.ge/storage/files/1/62d183c1912e9.jpg', 1, '2022-07-15 11:28:58', '2022-07-15 11:28:58', NULL, 1),
(123, 12, 'https://dashboard.mallline.ge/storage/files/1/62d183bb075c8.jpg', 1, '2022-07-15 11:28:58', '2022-07-15 11:28:58', NULL, 1),
(124, 12, 'https://dashboard.mallline.ge/storage/files/1/62d183c1a7936.png', 1, '2022-07-15 11:28:58', '2022-07-15 11:28:58', NULL, 1),
(125, 55, 'https://dashboard.mallline.ge/storage/files/1/62eb8ea65214f.jpg', 1, '2022-09-26 12:20:32', '2022-09-26 12:20:32', NULL, 1),
(126, 55, ' https://dashboard.mallline.ge/storage/files/1/62eb8ea65214f.jpg', 1, '2022-09-26 12:20:32', '2022-09-26 12:20:32', NULL, 1),
(127, 56, 'https://dashboard.mallline.ge/storage/files/1/62eb8ea65214f.jpg', 1, '2022-09-26 12:21:37', '2022-09-26 12:21:37', NULL, 1),
(128, 56, ' https://dashboard.mallline.ge/storage/files/1/62eb8ea65214f.jpg', 1, '2022-09-26 12:21:37', '2022-09-26 12:21:37', NULL, 1),
(129, 57, 'https://dashboard.mallline.ge/storage/files/1/62eb8ea65214f.jpg', 1, '2022-09-26 12:21:57', '2022-09-26 12:21:57', NULL, 1),
(130, 57, ' https://dashboard.mallline.ge/storage/files/1/62eb8ea65214f.jpg', 1, '2022-09-26 12:21:57', '2022-09-26 12:21:57', NULL, 1),
(131, 58, 'https://maverick.mallline.ge/uploads/logotype/5defc100e5bef605fc7f5abd0080498d.png', 1, '2022-09-27 12:36:38', '2022-09-27 12:36:38', NULL, 1),
(132, 59, 'https://maverick.mallline.ge/uploads/logotype/5defc100e5bef605fc7f5abd0080498d.png', 1, '2022-09-27 12:39:30', '2022-09-27 12:39:30', NULL, 1),
(133, 60, 'https://maverick.mallline.ge/uploads/logotype/5defc100e5bef605fc7f5abd0080498d.png', 1, '2022-09-27 12:39:36', '2022-09-27 12:39:36', NULL, 1),
(134, 61, 'https://maverick.mallline.ge/uploads/logotype/5defc100e5bef605fc7f5abd0080498d.png', 1, '2022-09-27 12:42:08', '2022-09-27 12:42:08', NULL, 1),
(135, 62, 'https://maverick.mallline.ge/uploads/logotype/5defc100e5bef605fc7f5abd0080498d.png', 1, '2022-09-27 12:43:06', '2022-09-27 12:43:06', NULL, 1),
(136, 63, 'https://maverick.mallline.ge/uploads/logotype/5defc100e5bef605fc7f5abd0080498d.png', 1, '2022-09-27 12:43:49', '2022-09-27 12:43:49', NULL, 1),
(137, 64, 'https://maverick.mallline.ge/uploads/logotype/5defc100e5bef605fc7f5abd0080498d.png', 1, '2022-09-27 12:44:31', '2022-09-27 12:44:31', NULL, 1),
(138, 65, 'https://maverick.mallline.ge/uploads/logotype/5defc100e5bef605fc7f5abd0080498d.png', 1, '2022-09-27 12:45:09', '2022-09-27 12:45:09', NULL, 1),
(139, 66, 'http://maverick.mallline.ge/storage/files/7/63332b7403c48.png', 1, '2022-09-27 12:59:58', '2022-09-27 12:59:58', NULL, 1),
(140, 67, 'http://maverick.mallline.ge/storage/files/7/63332c26cd017.png', 1, '2022-09-27 13:27:48', '2022-09-27 13:27:48', NULL, 1),
(141, 68, 'http://maverick.mallline.ge/storage/files/7/63332c26cd017.png', 1, '2022-09-27 13:28:47', '2022-09-27 13:28:47', NULL, 1),
(142, 69, 'http://maverick.mallline.ge/storage/files/7/63332c26cd017.png', 1, '2022-09-27 13:29:12', '2022-09-27 13:29:12', NULL, 1),
(143, 70, 'http://maverick.mallline.ge/storage/files/7/63332c26cd017.png', 1, '2022-09-27 13:30:30', '2022-09-27 13:30:30', NULL, 1),
(144, 71, 'http://maverick.mallline.ge/storage/files/7/63332c26cd017.png', 1, '2022-09-27 13:31:52', '2022-09-27 13:31:52', NULL, 1),
(145, 72, 'http://maverick.mallline.ge/storage/files/7/63332c26cd017.png', 1, '2022-09-27 13:33:21', '2022-09-27 13:33:21', NULL, 1),
(146, 73, 'http://maverick.mallline.ge/storage/files/7/63332c26cd017.png', 1, '2022-09-27 13:33:31', '2022-09-27 13:33:31', NULL, 1),
(147, 74, 'http://maverick.mallline.ge/storage/files/7/63332c26cd017.png', 1, '2022-09-27 13:34:25', '2022-09-27 13:34:25', NULL, 1),
(148, 77, 'http://maverick.mallline.ge/storage/files/7/63332c26cd017.png', 1, '2022-09-27 13:35:19', '2022-09-27 13:35:19', NULL, 1),
(149, 78, 'http://maverick.mallline.ge/storage/files/7/63332c26cd017.png', 1, '2022-09-27 13:36:07', '2022-09-27 13:36:07', NULL, 1),
(150, 79, 'http://maverick.mallline.ge/storage/files/7/63332c26cd017.png', 1, '2022-09-27 13:36:29', '2022-09-27 13:36:29', NULL, 1),
(151, 80, 'http://maverick.mallline.ge/storage/files/7/63332c26cd017.png', 1, '2022-09-27 13:36:38', '2022-09-27 13:36:38', NULL, 1),
(152, 81, 'http://maverick.mallline.ge/storage/files/7/63332c26cd017.png', 1, '2022-09-27 13:38:06', '2022-09-27 13:38:06', NULL, 1),
(153, 82, 'http://maverick.mallline.ge/storage/files/7/63332c26cd017.png', 1, '2022-09-27 13:38:17', '2022-09-27 13:38:17', NULL, 1),
(154, 83, 'http://maverick.mallline.ge/storage/files/7/63332c26cd017.png', 1, '2022-09-27 13:38:45', '2022-09-27 13:38:45', NULL, 1),
(155, 84, 'http://maverick.mallline.ge/storage/files/7/63332ceada2e7.png', 1, '2022-09-27 13:41:07', '2022-09-27 13:41:07', NULL, 1),
(156, 123, 'http://maverick.mallline.ge/storage/files/7/63332ceada2e7.png', 1, '2022-09-27 13:42:17', '2022-09-27 13:42:17', NULL, 1),
(157, 124, 'http://maverick.mallline.ge/storage/files/7/63332ceada2e7.png', 1, '2022-09-27 13:43:07', '2022-09-27 13:43:07', NULL, 1),
(158, 125, 'http://maverick.mallline.ge/storage/files/7/63332d27deb95.png', 1, '2022-09-27 13:44:08', '2022-09-27 13:44:08', NULL, 1),
(159, 126, 'http://maverick.mallline.ge/storage/files/7/63332d27deb95.png', 1, '2022-09-27 13:44:32', '2022-09-27 13:44:32', NULL, 1),
(160, 127, 'http://maverick.mallline.ge/storage/files/7/63332d27deb95.png', 1, '2022-09-27 13:44:58', '2022-09-27 13:44:58', NULL, 1),
(161, 128, 'http://maverick.mallline.ge/storage/files/7/63332d27deb95.png', 1, '2022-09-27 13:45:07', '2022-09-27 13:45:07', NULL, 1),
(162, 129, 'http://maverick.mallline.ge/storage/files/7/63332b7403c48.png', 1, '2022-09-27 13:55:16', '2022-09-27 13:55:16', NULL, 1),
(163, 2, 'http://acer.mallline.ge/storage/files/7/633352f9de7b3.png', 1, '2022-09-27 15:56:02', '2022-09-27 15:56:02', NULL, 1),
(164, 2, 'http://acer.mallline.ge/storage/files/7/633352f9dfdac.png', 1, '2022-09-27 15:56:02', '2022-09-27 15:56:02', NULL, 1),
(165, 2, 'http://acer.mallline.ge/storage/files/7/633352fa62ad5.png', 1, '2022-09-27 15:56:02', '2022-09-27 15:56:02', NULL, 1),
(166, 2, 'http://acer.mallline.ge/storage/files/7/633352fa7ce58.png', 1, '2022-09-27 15:56:02', '2022-09-27 15:56:02', NULL, 1),
(167, 3, 'http://acer.mallline.ge/storage/files/7/633352fdd4cd9.jpg', 1, '2022-09-27 15:59:25', '2022-09-27 15:59:25', NULL, 1),
(168, 4, 'https://nikaragua.mallline.ge/storage/files/19/633c6ff566b9e.png', 1, '2022-10-04 13:49:29', '2022-10-04 13:49:29', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_product_meta`
--

CREATE TABLE `new_product_meta` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_product_meta`
--

INSERT INTO `new_product_meta` (`id`, `product_id`, `keywords`, `description`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(1, 6, '{\"ge\":\"ბრენდის გარეშე\",\"en\":\"Without brand\"}', '{\"ge\":\"ბრენდის გარეშე\",\"en\":\"Without brand\"}', '2022-02-22 02:24:25', NULL, 1),
(2, 7, '{\"ge\":\"ბრენდის გარეშე\",\"en\":\"Without brand\"}', '{\"ge\":\"ბრენდის გარეშე\",\"en\":\"Without brand\"}', '2022-02-22 02:24:47', NULL, 1),
(3, 8, '{\"ge\":\"ბრენდის გარეშე\",\"en\":\"Without brand\"}', '{\"ge\":\"ბრენდის გარეშე\",\"en\":\"Without brand\"}', '2022-02-22 02:28:34', NULL, 1),
(4, 10, '{\"ge\":\"test\",\"en\":\"test\"}', '{\"ge\":\"test\",\"en\":\"test\"}', '2022-02-28 19:16:06', NULL, 1),
(5, 11, '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":\"\\u10e2\\u10d4\\u10e1\\u10e2\"}', '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":\"\\u10e2\\u10d4\\u10e1\\u10e2\"}', '2022-02-28 20:01:17', NULL, 1),
(6, 12, '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":\"\\u10e2\\u10d4\\u10e1\\u10e2\"}', '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":\"\\u10e2\\u10d4\\u10e1\\u10e2\"}', '2022-02-28 20:03:17', NULL, 1),
(7, 13, '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":\"\\u10e2\\u10d4\\u10e1\\u10e2\"}', '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":\"\\u10e2\\u10d4\\u10e1\\u10e2\"}', '2022-02-28 20:03:25', NULL, 1),
(8, 14, '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":\"\\u10e2\\u10d4\\u10e1\\u10e2\"}', '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":\"\\u10e2\\u10d4\\u10e1\\u10e2\"}', '2022-02-28 21:55:26', NULL, 1),
(9, 15, '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":\"\\u10e2\\u10d4\\u10e1\\u10e2\"}', '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":\"\\u10e2\\u10d4\\u10e1\\u10e2\"}', '2022-02-28 21:55:51', NULL, 1),
(10, 16, '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":\"\\u10e2\\u10d4\\u10e1\\u10e2\"}', '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":\"\\u10e2\\u10d4\\u10e1\\u10e2\"}', '2022-03-04 17:48:25', NULL, 1),
(11, 17, '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":\"\\u10e2\\u10d4\\u10e1\\u10e2\"}', '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":\"\\u10e2\\u10d4\\u10e1\\u10e2\"}', '2022-03-04 18:43:58', NULL, 1),
(12, 18, '{\"ge\":\"product_photo\",\"en\":\"product_photo\"}', '{\"ge\":\"product_photo\",\"en\":\"product_photo\"}', '2022-03-09 21:35:30', NULL, 1),
(13, 19, '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":null}', '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":null}', '2022-03-17 05:37:44', NULL, 1),
(14, 20, '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":null}', '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":null}', '2022-03-17 05:38:05', NULL, 1),
(15, 21, '{\"ge\":\"test\",\"en\":null}', '{\"ge\":\"test\",\"en\":null}', '2022-03-17 05:40:17', NULL, 1),
(16, 22, '{\"ge\":\"123\",\"en\":null}', '{\"ge\":\"123\",\"en\":null}', '2022-03-17 11:59:31', NULL, 1),
(17, 23, '{\"ge\":\"123\",\"en\":null}', '{\"ge\":\"123\",\"en\":null}', '2022-03-17 12:00:14', NULL, 1),
(18, 24, '{\"ge\":\"test\",\"en\":\"test\"}', '{\"ge\":\"test\",\"en\":\"test\"}', '2022-03-29 05:47:14', NULL, 1),
(19, 25, '{\"ge\":\"test\",\"en\":\"test\"}', '{\"ge\":\"test\",\"en\":\"test\"}', '2022-03-29 05:48:06', NULL, 1),
(20, 26, '{\"ge\":\"test\",\"en\":\"test\"}', '{\"ge\":\"test\",\"en\":\"test\"}', '2022-04-10 07:53:16', NULL, 1),
(21, 27, '{\"ge\":\"\\u10d8\\u10dc\\u10e2\\u10d4\\u10da \\u10d89 9900\",\"en\":\"intel Core i9 9900 & RTX 2060\"}', '{\"ge\":\"\\u10d8\\u10dc\\u10e2\\u10d4\\u10da \\u10d89 9900\",\"en\":\"intel Core i9 9900 & RTX 2060\"}', '2022-04-11 06:20:04', NULL, 1),
(22, 28, '{\"ge\":\"\\u10d3\\u10d4\\u10d3\\u10d0\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"motherboard\"}', '{\"ge\":\"\\u10d3\\u10d4\\u10d3\\u10d0\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"motherboard\"}', '2022-04-11 06:37:02', NULL, 1),
(23, 29, '{\"ge\":\"\\u10d3\\u10d4\\u10d3\\u10d0\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"motherboard\"}', '{\"ge\":\"\\u10d3\\u10d4\\u10d3\\u10d0\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"motherboard\"}', '2022-04-11 06:41:28', NULL, 1),
(24, 30, '{\"ge\":\"B450M S2H\",\"en\":\"B450M S2H\"}', '{\"ge\":\"B450M S2H\",\"en\":\"B450M S2H\"}', '2022-04-14 04:03:10', NULL, 1),
(25, 31, '{\"ge\":\"B450M S2H\",\"en\":\"B450M S2H\"}', '{\"ge\":\"B450M S2H\",\"en\":\"B450M S2H\"}', '2022-04-14 04:09:44', NULL, 1),
(26, 32, '{\"ge\":\"H81 MK\",\"en\":\"H81 MK\"}', '{\"ge\":\"H81 MK\",\"en\":\"H81 MK\"}', '2022-04-14 04:21:22', NULL, 1),
(27, 33, '{\"ge\":\"Asus H81 MK\",\"en\":\"Asus H81 MK\"}', '{\"ge\":\"Asus H81 MK\",\"en\":\"Asus H81 MK\"}', '2022-04-14 04:30:39', NULL, 1),
(28, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-14 08:20:08', NULL, 1),
(29, 26, '{\"ge\":\"test\",\"en\":\"test\"}', '{\"ge\":\"test\",\"en\":\"test\"}', '2022-04-15 04:29:28', NULL, 1),
(30, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:29:46', NULL, 1),
(31, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:33:46', NULL, 1),
(32, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:34:23', NULL, 1),
(33, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:34:35', NULL, 1),
(34, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:36:03', NULL, 1),
(35, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:36:25', NULL, 1),
(36, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:37:47', NULL, 1),
(37, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:39:42', NULL, 1),
(38, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:40:42', NULL, 1),
(39, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:43:10', NULL, 1),
(40, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:43:49', NULL, 1),
(41, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:43:58', NULL, 1),
(42, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:44:03', NULL, 1),
(43, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:44:19', NULL, 1),
(44, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:44:53', NULL, 1),
(45, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:45:24', NULL, 1),
(46, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:52:49', NULL, 1),
(47, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:57:51', NULL, 1),
(48, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 04:58:32', NULL, 1),
(49, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 05:00:36', NULL, 1),
(50, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 05:00:57', NULL, 1),
(51, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 05:03:12', NULL, 1),
(52, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 06:22:11', NULL, 1),
(53, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 06:26:38', NULL, 1),
(54, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 06:27:25', NULL, 1),
(55, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 06:30:28', NULL, 1),
(56, 33, '{\"ge\":\"Asus H81 MK\",\"en\":\"Asus H81 MK\"}', '{\"ge\":\"Asus H81 MK\",\"en\":\"Asus H81 MK\"}', '2022-04-15 06:31:23', NULL, 1),
(57, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 06:31:45', NULL, 1),
(58, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-15 06:37:33', NULL, 1),
(59, 27, '{\"ge\":\"\\u10d8\\u10dc\\u10e2\\u10d4\\u10da \\u10d89 9900\",\"en\":\"intel Core i9 9900 & RTX 2060\"}', '{\"ge\":\"\\u10d8\\u10dc\\u10e2\\u10d4\\u10da \\u10d89 9900\",\"en\":\"intel Core i9 9900 & RTX 2060\"}', '2022-04-15 06:37:57', NULL, 1),
(60, 34, '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Asus Strix turbopc\"}', '{\"ge\":\"Asus Strix turbopc \\u10d5\\u10d8\\u10d3\\u10d4\\u10dd\\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\",\"en\":\"Asus Strix turbopc\"}', '2022-04-17 05:01:09', NULL, 1),
(61, 33, '{\"ge\":\"Asus H81 MK\",\"en\":\"Asus H81 MK\"}', '{\"ge\":\"Asus H81 MK\",\"en\":\"Asus H81 MK\"}', '2022-04-17 05:15:22', NULL, 1),
(62, 33, '{\"ge\":\"Asus H81 MK\",\"en\":\"Asus H81 MK\"}', '{\"ge\":\"Asus H81 MK\",\"en\":\"Asus H81 MK\"}', '2022-04-17 05:17:29', NULL, 1),
(63, 35, '{\"ge\":\"B450 AORUS ELITE\",\"en\":\"B450 AORUS ELITE\"}', '{\"ge\":\"B450 AORUS ELITE\",\"en\":\"B450 AORUS ELITE\"}', '2022-04-17 05:29:30', NULL, 1),
(64, 36, '{\"ge\":\"TUF B450M-PLUS GAMING\",\"en\":\"TUF B450M-PLUS GAMING\"}', '{\"ge\":\"TUF B450M-PLUS GAMING\",\"en\":\"TUF B450M-PLUS GAMING\"}', '2022-04-17 05:34:13', NULL, 1),
(65, 36, '{\"ge\":\"TUF B450M-PLUS GAMING\",\"en\":\"TUF B450M-PLUS GAMING\"}', '{\"ge\":\"TUF B450M-PLUS GAMING\",\"en\":\"TUF B450M-PLUS GAMING\"}', '2022-04-17 05:34:48', NULL, 1),
(66, 36, '{\"ge\":\"TUF B450M-PLUS GAMING\",\"en\":\"TUF B450M-PLUS GAMING\"}', '{\"ge\":\"TUF B450M-PLUS GAMING\",\"en\":\"TUF B450M-PLUS GAMING\"}', '2022-04-17 05:35:17', NULL, 1),
(67, 27, '{\"ge\":\"B550M-HDV\",\"en\":\"B550M-HDV\"}', '{\"ge\":\"B550M-HDV\",\"en\":\"B550M-HDV\"}', '2022-04-17 06:03:43', NULL, 1),
(68, 36, '{\"ge\":\"TUF B450M-PLUS GAMING\",\"en\":\"TUF B450M-PLUS GAMING\"}', '{\"ge\":\"TUF B450M-PLUS GAMING\",\"en\":\"TUF B450M-PLUS GAMING\"}', '2022-04-17 06:04:07', NULL, 1),
(69, 27, '{\"ge\":\"\\u10d8\\u10dc\\u10e2\\u10d4\\u10da \\u10d89 9900\",\"en\":\"intel Core i9 9900 & RTX 2060\"}', '{\"ge\":\"\\u10d8\\u10dc\\u10e2\\u10d4\\u10da \\u10d89 9900\",\"en\":\"intel Core i9 9900 & RTX 2060\"}', '2022-04-18 03:51:45', NULL, 1),
(70, 36, '{\"ge\":\"TUF B450M-PLUS GAMING\",\"en\":\"TUF B450M-PLUS GAMING\"}', '{\"ge\":\"TUF B450M-PLUS GAMING\",\"en\":\"TUF B450M-PLUS GAMING\"}', '2022-04-18 08:18:40', NULL, 1),
(71, 37, '{\"ge\":\"MSI Z390 A Pro\",\"en\":\"MSI Z390 A Pro\"}', '{\"ge\":\"MSI Z390 A Pro\",\"en\":\"MSI Z390 A Pro\"}', '2022-04-18 08:22:10', NULL, 1),
(72, 31, '{\"ge\":\"B450M S2H\",\"en\":\"B450M S2H\"}', '{\"ge\":\"B450M S2H\",\"en\":\"B450M S2H\"}', '2022-04-19 06:24:20', NULL, 1),
(73, 31, '{\"ge\":\"B450M S2H\",\"en\":\"B450M S2H\"}', '{\"ge\":\"B450M S2H\",\"en\":\"B450M S2H\"}', '2022-04-19 06:29:11', NULL, 1),
(74, 27, '{\"ge\":\"\\u10d8\\u10dc\\u10e2\\u10d4\\u10da \\u10d89 9900\",\"en\":\"intel Core i9 9900 & RTX 2060\"}', '{\"ge\":\"\\u10d8\\u10dc\\u10e2\\u10d4\\u10da \\u10d89 9900\",\"en\":\"intel Core i9 9900 & RTX 2060\"}', '2022-04-19 06:32:43', NULL, 1),
(75, 38, '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '2022-04-19 06:38:11', NULL, 1),
(76, 39, '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '2022-04-19 06:38:18', NULL, 1),
(77, 40, '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '2022-04-19 06:38:20', NULL, 1),
(78, 41, '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '2022-04-19 06:38:24', NULL, 1),
(79, 42, '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '2022-04-19 06:38:24', NULL, 1),
(80, 43, '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '2022-04-19 06:38:24', NULL, 1),
(81, 44, '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '2022-04-19 06:38:25', NULL, 1),
(82, 45, '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '2022-04-19 06:38:25', NULL, 1),
(83, 46, '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '2022-04-19 06:38:27', NULL, 1),
(84, 47, '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '2022-04-19 06:38:29', NULL, 1),
(85, 48, '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '2022-04-19 06:38:30', NULL, 1),
(86, 49, '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '2022-04-19 06:38:30', NULL, 1),
(87, 50, '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '2022-04-19 06:38:30', NULL, 1),
(88, 51, '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '2022-04-19 06:39:14', NULL, 1),
(89, 52, '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '2022-04-19 06:39:14', NULL, 1),
(90, 53, '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '2022-04-19 06:39:20', NULL, 1),
(91, 54, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 06:40:25', NULL, 1),
(92, 55, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 06:41:55', NULL, 1),
(93, 37, '{\"ge\":\"MSI Z390 A Pro\",\"en\":\"MSI Z390 A Pro\"}', '{\"ge\":\"MSI Z390 A Pro\",\"en\":\"MSI Z390 A Pro\"}', '2022-04-19 06:42:49', NULL, 1),
(94, 37, '{\"ge\":\"MSI Z390 A Pro\",\"en\":\"MSI Z390 A Pro\"}', '{\"ge\":\"MSI Z390 A Pro\",\"en\":\"MSI Z390 A Pro\"}', '2022-04-19 06:50:08', NULL, 1),
(95, 38, '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '2022-04-19 06:57:34', NULL, 1),
(96, 38, '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '{\"ge\":\"Asus Tuf B450 M Plus Gaming\",\"en\":\"Asus Tuf B450 M Plus Gaming\"}', '2022-04-19 06:57:54', NULL, 1),
(97, 56, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 08:23:10', NULL, 1),
(98, 57, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 08:23:10', NULL, 1),
(99, 58, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 08:23:10', NULL, 1),
(100, 59, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 08:23:10', NULL, 1),
(101, 60, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 08:23:10', NULL, 1),
(102, 61, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 08:23:10', NULL, 1),
(103, 62, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 08:23:10', NULL, 1),
(104, 63, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 08:23:10', NULL, 1),
(105, 64, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 08:23:10', NULL, 1),
(106, 65, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 08:23:11', NULL, 1),
(107, 66, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 08:23:11', NULL, 1),
(108, 67, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 08:23:11', NULL, 1),
(109, 68, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 08:23:11', NULL, 1),
(110, 69, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 08:23:11', NULL, 1),
(111, 70, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 08:23:12', NULL, 1),
(112, 71, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 08:23:12', NULL, 1),
(113, 72, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 09:08:22', NULL, 1),
(114, 73, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 09:16:22', NULL, 1),
(115, 74, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 09:16:23', NULL, 1),
(116, 75, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 09:16:24', NULL, 1),
(117, 76, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 09:16:24', NULL, 1),
(118, 77, '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '{\"ge\":\"AMD B450 mATX\",\"en\":\"AMD B450 mATX\"}', '2022-04-19 09:16:24', NULL, 1),
(119, 78, '{\"ge\":\"test\",\"en\":\"test\"}', '{\"ge\":\"test\",\"en\":\"test\"}', '2022-04-19 09:19:57', NULL, 1),
(120, 79, '{\"ge\":\"test\",\"en\":\"test\"}', '{\"ge\":\"test\",\"en\":\"test\"}', '2022-04-19 09:20:00', NULL, 1),
(121, 80, '{\"ge\":\"test\",\"en\":\"test\"}', '{\"ge\":\"test\",\"en\":\"test\"}', '2022-04-19 09:20:25', NULL, 1),
(122, 85, '{\"ge\":\"test\",\"en\":\"test\"}', '{\"ge\":\"test\",\"en\":\"test\"}', '2022-04-19 09:24:17', NULL, 1),
(123, 86, '{\"ge\":\"PRIME A320M-K\",\"en\":\"PRIME A320M-K\"}', '{\"ge\":\"PRIME A320M-K\",\"en\":\"PRIME A320M-K\"}', '2022-04-19 09:31:31', NULL, 1),
(124, 87, '{\"ge\":\"EVGA GTX 1070 TI\",\"en\":\"EVGA GTX 1070 TI\"}', '{\"ge\":\"EVGA GTX 1070 TI\",\"en\":\"EVGA GTX 1070 TI\"}', '2022-04-26 04:32:13', NULL, 1),
(125, 88, '{\"ge\":\"MSI RX 580 8GB gaming X\",\"en\":\"MSI RX 580 8GB gaming X\"}', '{\"ge\":\"MSI RX 580 8GB gaming X\",\"en\":\"MSI RX 580 8GB gaming X\"}', '2022-04-26 04:47:29', NULL, 1),
(126, 89, '{\"ge\":\"XFX Radeon\\u2122 RX 580\",\"en\":\"XFX Radeon\\u2122 RX 580\"}', '{\"ge\":\"XFX Radeon\\u2122 RX 580\",\"en\":\"XFX Radeon\\u2122 RX 580\"}', '2022-04-26 04:58:48', NULL, 1),
(127, 90, '{\"ge\":\"Razer Kraken 7.1\",\"en\":\"Razer Kraken 7.1\"}', '{\"ge\":\"Razer Kraken 7.1\",\"en\":\"Razer Kraken 7.1\"}', '2022-04-26 05:01:58', NULL, 1),
(128, 91, '{\"ge\":\"EVGA GeForce RTX 2070 SUPER XC ULTRA\",\"en\":\"EVGA GeForce RTX 2070 SUPER XC ULTRA\"}', '{\"ge\":\"EVGA GeForce RTX 2070 SUPER XC ULTRA\",\"en\":\"EVGA GeForce RTX 2070 SUPER XC ULTRA\"}', '2022-04-26 05:05:14', NULL, 1),
(129, 92, '{\"ge\":\"Gigabyte RTX 2060 6GB OC\",\"en\":\"Gigabyte RTX 2060 6GB OC\"}', '{\"ge\":\"Gigabyte RTX 2060 6GB OC\",\"en\":\"Gigabyte RTX 2060 6GB OC\"}', '2022-04-26 05:22:47', NULL, 1),
(130, 93, '{\"ge\":\"DUAL-RTX2060-O6G-EVO\",\"en\":\"DUAL-RTX2060-O6G-EVO\"}', '{\"ge\":\"DUAL-RTX2060-O6G-EVO\",\"en\":\"DUAL-RTX2060-O6G-EVO\"}', '2022-04-26 05:25:22', NULL, 1),
(131, 94, '{\"ge\":\"ROG-STRIX-GTX1070TI-8G-GAMING\",\"en\":\"ROG-STRIX-GTX1070TI-8G-GAMING\"}', '{\"ge\":\"ROG-STRIX-GTX1070TI-8G-GAMING\",\"en\":\"ROG-STRIX-GTX1070TI-8G-GAMING\"}', '2022-04-26 05:28:33', NULL, 1),
(132, 95, '{\"ge\":\"EVGA GeForce RTX 2070 SUPER FTW3 ULTRA\",\"en\":\"EVGA GeForce RTX 2070 SUPER FTW3 ULTRA\"}', '{\"ge\":\"EVGA GeForce RTX 2070 SUPER FTW3 ULTRA\",\"en\":\"EVGA GeForce RTX 2070 SUPER FTW3 ULTRA\"}', '2022-04-26 05:32:32', NULL, 1),
(133, 96, '{\"ge\":\"EVGA GeForce RTX 2070 XC\",\"en\":\"EVGA GeForce RTX 2070 XC\"}', '{\"ge\":\"EVGA GeForce RTX 2070 XC\",\"en\":\"EVGA GeForce RTX 2070 XC\"}', '2022-04-26 05:37:36', NULL, 1),
(134, 97, '{\"ge\":\"PNY GTX 1070 8GB\",\"en\":\"PNY GTX 1070 8GB\"}', '{\"ge\":\"PNY GTX 1070 8GB\",\"en\":\"PNY GTX 1070 8GB\"}', '2022-04-26 05:41:45', NULL, 1),
(135, 98, '{\"ge\":\"HP RTX 2060 Super 8GB GDDR6\",\"en\":\"HP RTX 2060 Super 8GB GDDR6\"}', '{\"ge\":\"HP RTX 2060 Super 8GB GDDR6\",\"en\":\"HP RTX 2060 Super 8GB GDDR6\"}', '2022-04-26 05:49:16', NULL, 1),
(136, 99, '{\"ge\":\"XFX RADEON RX 590\",\"en\":\"XFX RADEON RX 590\"}', '{\"ge\":\"XFX RADEON RX 590\",\"en\":\"XFX RADEON RX 590\"}', '2022-04-26 05:55:49', NULL, 1),
(137, 100, '{\"ge\":\"ZOTAC GeForce\\u00ae GTX 1070 Ti AMP Extreme\",\"en\":\"ZOTAC GeForce\\u00ae GTX 1070 Ti AMP Extreme\"}', '{\"ge\":\"ZOTAC GeForce\\u00ae GTX 1070 Ti AMP Extreme\",\"en\":\"ZOTAC GeForce\\u00ae GTX 1070 Ti AMP Extreme\"}', '2022-04-26 06:04:32', NULL, 1),
(138, 101, '{\"ge\":\"GeForce RTX 2070 SUPER\\u2122 VENTUS OC\",\"en\":\"GeForce RTX 2070 SUPER\\u2122 VENTUS OC\"}', '{\"ge\":\"GeForce RTX 2070 SUPER\\u2122 VENTUS OC\",\"en\":\"GeForce RTX 2070 SUPER\\u2122 VENTUS OC\"}', '2022-04-26 06:07:00', NULL, 1),
(139, 102, '{\"ge\":\"EVGA GeForce GTX 1050 Ti SC GAMING\",\"en\":\"EVGA GeForce GTX 1050 Ti SC GAMING\"}', '{\"ge\":\"EVGA GeForce GTX 1050 Ti SC GAMING\",\"en\":\"EVGA GeForce GTX 1050 Ti SC GAMING\"}', '2022-04-26 06:11:08', NULL, 1),
(140, 103, '{\"ge\":\"Radeon RX 570 ARMOR 4G OC\",\"en\":\"Radeon RX 570 ARMOR 4G OC\"}', '{\"ge\":\"Radeon RX 570 ARMOR 4G OC\",\"en\":\"Radeon RX 570 ARMOR 4G OC\"}', '2022-04-26 06:14:00', NULL, 1),
(141, 104, '{\"ge\":\"EVGA GeForce GTX 760\",\"en\":\"EVGA GeForce GTX 760\"}', '{\"ge\":\"EVGA GeForce GTX 760\",\"en\":\"EVGA GeForce GTX 760\"}', '2022-04-26 06:17:16', NULL, 1),
(142, 105, '{\"ge\":\"i5 3470\",\"en\":\"i5 3470\"}', '{\"ge\":\"i5 3470\",\"en\":\"i5 3470\"}', '2022-04-28 04:57:00', NULL, 1),
(143, 106, '{\"ge\":\"i5 3340 cpu processor \\u10de\\u10e0\\u10dd\\u10ea\\u10d4\\u10e1\\u10dd\\u10e0\\u10d8 1155 \\u10e1\\u10dd\\u10d9\\u10d4\\u10e2\\u10d8\",\"en\":\"i5 3340 cpu processor 1155 socket\"}', '{\"ge\":\"i5 3340 cpu processor \\u10de\\u10e0\\u10dd\\u10ea\\u10d4\\u10e1\\u10dd\\u10e0\\u10d8 1155 \\u10e1\\u10dd\\u10d9\\u10d4\\u10e2\\u10d8\",\"en\":\"i5 3340 cpu processor 1155 socekt\"}', '2022-04-28 05:21:33', NULL, 1),
(144, 107, '{\"ge\":\"intel Core i5 11400 & RTX 2060 6GB\",\"en\":\"intel Core i5 11400 & RTX 2060 6GB\"}', '{\"ge\":\"intel Core i5 11400 & RTX 2060 6GB\",\"en\":\"intel Core i5 11400 & RTX 2060 6GB\"}', '2022-04-28 05:29:18', NULL, 1),
(145, 108, '{\"ge\":\"i7 3770\",\"en\":\"i7 3770\"}', '{\"ge\":\"i7 3770\",\"en\":\"i7 3770\"}', '2022-04-28 05:38:48', NULL, 1),
(146, 109, '{\"ge\":\"Intel\\u00ae Core\\u2122 i7-2600 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i7-2600 Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i7-2600 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i7-2600 Processor\"}', '2022-04-28 05:52:22', NULL, 1),
(147, 110, '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-4570 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-4570 Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-4570 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-4570 Processor\"}', '2022-04-28 05:54:25', NULL, 1),
(148, 111, '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-4460 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-4460 Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-4460 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-4460 Processor\"}', '2022-04-28 05:55:38', NULL, 1),
(149, 112, '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-2500K Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-2500K Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-2500K Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-2500K Processor\"}', '2022-04-28 05:57:46', NULL, 1),
(150, 113, '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-4570T Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-4570T Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-4570T Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-4570T Processor\"}', '2022-04-28 06:00:06', NULL, 1),
(151, 114, '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-4590 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-4590 Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-4590 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-4590 Processor\"}', '2022-04-28 06:01:30', NULL, 1),
(152, 115, '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-4670K Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-4670K Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-4670K Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-4670K Processor\"}', '2022-04-28 06:02:45', NULL, 1),
(153, 116, '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-7500 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-7500 Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-7500 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-7500 Processor\"}', '2022-04-28 06:04:00', NULL, 1),
(154, 117, '{\"ge\":\"Intel\\u00ae Core\\u2122 i7-7700 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i7-7700 Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i7-7700 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i7-7700 Processor\"}', '2022-04-28 06:05:12', NULL, 1),
(155, 118, '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-7400 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-7400 Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-7400 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-7400 Processor\"}', '2022-04-28 06:06:34', NULL, 1),
(156, 119, '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-6400 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-6400 Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-6400 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-6400 Processor\"}', '2022-04-28 06:07:55', NULL, 1),
(157, 120, '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-8400 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-8400 Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-8400 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-8400 Processor\"}', '2022-04-28 06:09:02', NULL, 1),
(158, 121, '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-9400 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-9400 Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-9400 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-9400 Processor\"}', '2022-04-28 06:13:41', NULL, 1),
(159, 122, '{\"ge\":\"Intel\\u00ae Core\\u2122 i7-8700T Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i7-8700T Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i7-8700T Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i7-8700T Processor\"}', '2022-04-28 06:15:12', NULL, 1),
(160, 123, '{\"ge\":\"Intel\\u00ae Core\\u2122 i7-8700 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i7-8700 Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i7-8700 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i7-8700 Processor\"}', '2022-04-28 06:17:16', NULL, 1),
(161, 124, '{\"ge\":\"Intel\\u00ae Core\\u2122 i7-7700K Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i7-7700K Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i7-7700K Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i7-7700K Processor\"}', '2022-04-28 06:21:05', NULL, 1),
(162, 125, '{\"ge\":\"Intel\\u00ae Core\\u2122 i7-8700K Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i7-8700K Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i7-8700K Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i7-8700K Processor\"}', '2022-04-28 06:23:11', NULL, 1),
(163, 126, '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-9600K Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-9600K Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-9600K Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-9600K Processor\"}', '2022-04-28 06:27:14', NULL, 1),
(164, 127, '{\"ge\":\"Intel\\u00ae Core\\u2122 i7-9700F Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i7-9700F Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i7-9700F Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i7-9700F Processor\"}', '2022-04-28 06:35:25', NULL, 1),
(165, 128, '{\"ge\":\"Intel\\u00ae Core\\u2122 i7-9700K Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i7-9700K Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i7-9700K Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i7-9700K Processor\"}', '2022-04-28 06:37:41', NULL, 1),
(166, 129, '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-11400 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-11400 Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i5-11400 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i5-11400 Processor\"}', '2022-04-28 06:39:26', NULL, 1),
(167, 130, '{\"ge\":\"Intel\\u00ae Core\\u2122 i9-9900 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i9-9900 Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i9-9900 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i9-9900 Processor\"}', '2022-04-28 06:52:26', NULL, 1),
(168, 131, '{\"ge\":\"Intel\\u00ae Core\\u2122 i9-9900K Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i9-9900K Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i9-9900K Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i9-9900K Processor\"}', '2022-04-28 06:55:47', NULL, 1),
(169, 132, '{\"ge\":\"Intel\\u00ae Core\\u2122 i3-9100F Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i3-9100F Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i3-9100F Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i3-9100F Processor\"}', '2022-04-28 07:05:00', NULL, 1),
(170, 133, '{\"ge\":\"Intel\\u00ae Core\\u2122 i3-8100 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i3-8100 Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i3-8100 Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i3-8100 Processor\"}', '2022-04-28 07:08:50', NULL, 1),
(171, 134, '{\"ge\":\"Intel\\u00ae Core\\u2122 i3-10100F Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i3-10100F Processor\"}', '{\"ge\":\"Intel\\u00ae Core\\u2122 i3-10100F Processor\",\"en\":\"Intel\\u00ae Core\\u2122 i3-10100F Processor\"}', '2022-04-28 07:12:43', NULL, 1),
(172, 135, '{\"ge\":\"test\",\"en\":\"test\"}', '{\"ge\":\"test\",\"en\":\"test\"}', '2022-06-03 15:17:43', NULL, 1),
(173, 1, '{\"ge\":\"test\",\"en\":\"test\"}', '{\"ge\":\"test\",\"en\":\"test\"}', '2022-06-24 05:17:13', NULL, 1),
(174, 2, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-06-27 06:24:39', NULL, 1),
(175, 3, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-06-27 11:08:56', NULL, 1),
(176, 4, '{\"ge\":\"100 \\u10d9\\u10d2\",\"en\":\"100 \\u10d9\\u10d2\"}', '{\"ge\":\"100 \\u10d9\\u10d2\",\"en\":\"100 \\u10d9\\u10d2\"}', '2022-06-28 12:23:20', NULL, 1),
(177, 5, '{\"ge\":\"test\",\"en\":\"test\"}', '{\"ge\":\"test\",\"en\":\"test\"}', '2022-06-28 13:28:09', NULL, 1),
(178, 6, '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":\"\\u10e2\\u10d4\\u10e1\\u10e2\"}', '{\"ge\":\"\\u10e2\\u10d4\\u10e1\\u10e2\",\"en\":\"\\u10d4\\u10e2\\u10e1\\u10e2\"}', '2022-06-28 14:14:01', NULL, 1),
(179, 7, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-06-29 12:19:25', NULL, 1),
(180, 8, '{\"ge\":\"2049\",\"en\":\"2049\"}', '{\"ge\":\"2049\",\"en\":\"2049\"}', '2022-07-15 11:12:40', NULL, 1),
(181, 9, '{\"ge\":\"BEKO BBFDA 090\\/091\",\"en\":\"BEKO BBFDA 090\\/091\"}', '{\"ge\":\"BEKO BBFDA 090\\/091\",\"en\":\"BEKO BBFDA 090\\/091\"}', '2022-07-15 11:14:56', NULL, 1),
(182, 10, '{\"ge\":\"TCL TAC-24CHSA\\/XA82\",\"en\":\"TCL TAC-24CHSA\\/XA82\"}', '{\"ge\":\"TCL TAC-24CHSA\\/XA82\",\"en\":\"TCL TAC-24CHSA\\/XA82\"}', '2022-07-15 11:18:22', NULL, 1),
(183, 11, '{\"ge\":\"MIDEA FS40-21MW\",\"en\":\"MIDEA FS40-21MW\"}', '{\"ge\":\"MIDEA FS40-21MW\",\"en\":\"MIDEA FS40-21MW\"}', '2022-07-15 11:27:02', NULL, 1),
(184, 12, '{\"ge\":\"VOX VSA7-24BE\",\"en\":\"VOX VSA7-24BE\"}', '{\"ge\":\"VOX VSA7-24BE\",\"en\":\"VOX VSA7-24BE\"}', '2022-07-15 11:28:58', NULL, 1),
(185, 30, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:01:18', NULL, 1),
(186, 31, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:02:28', NULL, 1),
(187, 32, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:02:54', NULL, 1),
(188, 33, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:04:55', NULL, 1),
(189, 34, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:09:24', NULL, 1),
(190, 35, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:09:42', NULL, 1),
(191, 36, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:09:55', NULL, 1),
(192, 37, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:10:06', NULL, 1),
(193, 38, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:10:39', NULL, 1),
(194, 39, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:10:57', NULL, 1),
(195, 40, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:11:38', NULL, 1),
(196, 41, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:11:52', NULL, 1),
(197, 42, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:12:23', NULL, 1),
(198, 43, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:12:43', NULL, 1),
(199, 44, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:12:51', NULL, 1),
(200, 45, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:13:14', NULL, 1),
(201, 46, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:13:34', NULL, 1),
(202, 47, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:13:52', NULL, 1),
(203, 48, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:14:05', NULL, 1),
(204, 49, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:15:11', NULL, 1),
(205, 50, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:15:57', NULL, 1),
(206, 51, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:16:06', NULL, 1),
(207, 52, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:16:58', NULL, 1),
(208, 53, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:18:24', NULL, 1),
(209, 54, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:18:34', NULL, 1),
(210, 55, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:20:32', NULL, 1),
(211, 56, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:21:37', NULL, 1),
(212, 57, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-26 12:21:57', NULL, 1),
(213, 58, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 12:36:38', NULL, 1),
(214, 59, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 12:39:30', NULL, 1),
(215, 60, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 12:39:36', NULL, 1),
(216, 61, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 12:42:08', NULL, 1),
(217, 62, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 12:43:06', NULL, 1),
(218, 63, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 12:43:49', NULL, 1),
(219, 64, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 12:44:31', NULL, 1),
(220, 65, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 12:45:09', NULL, 1),
(221, 66, '{\"ge\":\"\\u10d0\\u10e1\\u10d3\\u10d0\\u10e1\\u10d3\",\"en\":\"\\u10d0\\u10e1\\u10d3\\u10d0\\u10e1\\u10d3\"}', '{\"ge\":\"\\u10d0\\u10e1\\u10d3\\u10d0\\u10e1\\u10d3\",\"en\":\"\\u10d0\\u10e1\\u10d3\\u10d0\\u10e1\\u10d3\"}', '2022-09-27 12:59:58', NULL, 1),
(222, 67, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:27:48', NULL, 1),
(223, 68, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:28:47', NULL, 1),
(224, 69, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:29:12', NULL, 1),
(225, 70, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:30:30', NULL, 1),
(226, 71, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:31:52', NULL, 1),
(227, 72, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:33:21', NULL, 1),
(228, 73, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:33:31', NULL, 1),
(229, 74, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:34:25', NULL, 1),
(230, 77, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:35:19', NULL, 1),
(231, 78, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:36:07', NULL, 1),
(232, 79, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:36:29', NULL, 1),
(233, 80, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:36:38', NULL, 1),
(234, 81, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:38:06', NULL, 1),
(235, 82, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:38:17', NULL, 1),
(236, 83, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:38:45', NULL, 1),
(237, 84, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:41:07', NULL, 1),
(238, 123, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:42:17', NULL, 1),
(239, 124, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:43:07', NULL, 1),
(240, 125, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:44:08', NULL, 1),
(241, 126, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:44:32', NULL, 1),
(242, 127, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:44:58', NULL, 1),
(243, 128, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:45:07', NULL, 1),
(244, 129, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 13:55:16', NULL, 1),
(245, 1, '{\"ge\":\"asdasdasd\",\"en\":\"sdsadasd\"}', '{\"ge\":\"asdsdas\",\"en\":\"asdsadas\"}', '2022-09-27 15:47:23', NULL, 1),
(246, 2, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-09-27 15:56:02', NULL, 1),
(247, 3, '{\"ge\":\"adasd\",\"en\":\"adsasd\"}', '{\"ge\":\"adsasdas\",\"en\":\"adsasd\"}', '2022-09-27 15:59:25', NULL, 1),
(248, 4, '{\"ge\":\"123\",\"en\":\"123\"}', '{\"ge\":\"123\",\"en\":\"123\"}', '2022-10-04 13:49:29', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_product_price`
--

CREATE TABLE `new_product_price` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `price` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_product_price`
--

INSERT INTO `new_product_price` (`id`, `product_id`, `price`, `created_at`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(3, 8, '204900', '2022-07-15 11:12:40', '2022-07-15 11:12:40', NULL, 1),
(4, 9, '109900', '2022-07-15 11:14:56', '2022-07-15 11:14:56', NULL, 1),
(5, 10, '249900', '2022-07-15 11:18:22', '2022-07-15 11:18:22', NULL, 1),
(6, 11, '15000', '2022-07-15 11:27:02', '2022-07-15 11:27:02', NULL, 1),
(7, 12, '219900', '2022-07-15 11:28:58', '2022-07-15 11:28:58', NULL, 1),
(8, 13, '204900', '2022-07-15 11:12:40', '2022-07-15 11:12:40', NULL, 1),
(9, 14, '109900', '2022-07-15 11:14:56', '2022-07-15 11:14:56', NULL, 1),
(10, 16, '249900', '2022-07-15 11:18:22', '2022-07-15 11:18:22', NULL, 1),
(11, 15, '15000', '2022-07-15 11:27:02', '2022-07-15 11:27:02', NULL, 1),
(12, 17, '219900', '2022-07-15 11:28:58', '2022-07-15 11:28:58', NULL, 1),
(13, 18, '204900', '2022-07-15 11:12:40', '2022-07-15 11:12:40', NULL, 1),
(14, 19, '109900', '2022-07-15 11:14:56', '2022-07-15 11:14:56', NULL, 1),
(15, 20, '249900', '2022-07-15 11:18:22', '2022-07-15 11:18:22', NULL, 1),
(16, 21, '15000', '2022-07-15 11:27:02', '2022-07-15 11:27:02', NULL, 1),
(17, 22, '219900', '2022-07-15 11:28:58', '2022-07-15 11:28:58', NULL, 1),
(18, 23, '204900', '2022-07-15 11:12:40', '2022-07-15 11:12:40', NULL, 1),
(19, 24, '109900', '2022-07-15 11:14:56', '2022-07-15 11:14:56', NULL, 1),
(20, 25, '249900', '2022-07-15 11:18:22', '2022-07-15 11:18:22', NULL, 1),
(21, 27, '15000', '2022-07-15 11:27:02', '2022-07-15 11:27:02', NULL, 1),
(22, 26, '219900', '2022-07-15 11:28:58', '2022-07-15 11:28:58', NULL, 1),
(23, 28, '219900', '2022-07-15 11:28:58', '2022-07-15 11:28:58', NULL, 1),
(24, 32, '12300', '2022-09-26 12:02:54', '2022-09-26 12:02:54', NULL, 1),
(25, 33, '12300', '2022-09-26 12:04:55', '2022-09-26 12:04:55', NULL, 1),
(26, 34, '12300', '2022-09-26 12:09:24', '2022-09-26 12:09:24', NULL, 1),
(27, 35, '12300', '2022-09-26 12:09:42', '2022-09-26 12:09:42', NULL, 1),
(28, 36, '12300', '2022-09-26 12:09:55', '2022-09-26 12:09:55', NULL, 1),
(29, 37, '12300', '2022-09-26 12:10:06', '2022-09-26 12:10:06', NULL, 1),
(30, 38, '12300', '2022-09-26 12:10:39', '2022-09-26 12:10:39', NULL, 1),
(31, 39, '12300', '2022-09-26 12:10:57', '2022-09-26 12:10:57', NULL, 1),
(32, 40, '12300', '2022-09-26 12:11:38', '2022-09-26 12:11:38', NULL, 1),
(33, 41, '12300', '2022-09-26 12:11:52', '2022-09-26 12:11:52', NULL, 1),
(34, 42, '12300', '2022-09-26 12:12:23', '2022-09-26 12:12:23', NULL, 1),
(35, 43, '12300', '2022-09-26 12:12:43', '2022-09-26 12:12:43', NULL, 1),
(36, 44, '12300', '2022-09-26 12:12:51', '2022-09-26 12:12:51', NULL, 1),
(37, 45, '12300', '2022-09-26 12:13:14', '2022-09-26 12:13:14', NULL, 1),
(38, 46, '12300', '2022-09-26 12:13:34', '2022-09-26 12:13:34', NULL, 1),
(39, 47, '12300', '2022-09-26 12:13:52', '2022-09-26 12:13:52', NULL, 1),
(40, 48, '12300', '2022-09-26 12:14:05', '2022-09-26 12:14:05', NULL, 1),
(41, 49, '12300', '2022-09-26 12:15:11', '2022-09-26 12:15:11', NULL, 1),
(42, 50, '12300', '2022-09-26 12:15:57', '2022-09-26 12:15:57', NULL, 1),
(43, 51, '12300', '2022-09-26 12:16:06', '2022-09-26 12:16:06', NULL, 1),
(44, 52, '12300', '2022-09-26 12:16:58', '2022-09-26 12:16:58', NULL, 1),
(45, 53, '12300', '2022-09-26 12:18:24', '2022-09-26 12:18:24', NULL, 1),
(46, 54, '12300', '2022-09-26 12:18:34', '2022-09-26 12:18:34', NULL, 1),
(47, 55, '12300', '2022-09-26 12:20:32', '2022-09-26 12:20:32', NULL, 1),
(48, 56, '12300', '2022-09-26 12:21:37', '2022-09-26 12:21:37', NULL, 1),
(49, 57, '12300', '2022-09-26 12:21:57', '2022-09-26 12:21:57', NULL, 1),
(50, 58, '123400', '2022-09-27 12:36:38', '2022-09-27 12:36:38', NULL, 1),
(51, 59, '123400', '2022-09-27 12:39:30', '2022-09-27 12:39:30', NULL, 1),
(52, 60, '123400', '2022-09-27 12:39:36', '2022-09-27 12:39:36', NULL, 1),
(53, 61, '123400', '2022-09-27 12:42:08', '2022-09-27 12:42:08', NULL, 1),
(54, 62, '123400', '2022-09-27 12:43:06', '2022-09-27 12:43:06', NULL, 1),
(55, 63, '123400', '2022-09-27 12:43:49', '2022-09-27 12:43:49', NULL, 1),
(56, 64, '123400', '2022-09-27 12:44:31', '2022-09-27 12:44:31', NULL, 1),
(57, 65, '123400', '2022-09-27 12:45:09', '2022-09-27 12:45:09', NULL, 1),
(58, 66, '12300', '2022-09-27 12:59:58', '2022-09-27 12:59:58', NULL, 1),
(59, 67, '12300', '2022-09-27 13:27:48', '2022-09-27 13:27:48', NULL, 1),
(60, 68, '12300', '2022-09-27 13:28:47', '2022-09-27 13:28:47', NULL, 1),
(61, 69, '12300', '2022-09-27 13:29:12', '2022-09-27 13:29:12', NULL, 1),
(62, 70, '12300', '2022-09-27 13:30:30', '2022-09-27 13:30:30', NULL, 1),
(63, 71, '12300', '2022-09-27 13:31:52', '2022-09-27 13:31:52', NULL, 1),
(64, 72, '12300', '2022-09-27 13:33:21', '2022-09-27 13:33:21', NULL, 1),
(65, 73, '12300', '2022-09-27 13:33:31', '2022-09-27 13:33:31', NULL, 1),
(66, 74, '12300', '2022-09-27 13:34:25', '2022-09-27 13:34:25', NULL, 1),
(67, 77, '12300', '2022-09-27 13:35:19', '2022-09-27 13:35:19', NULL, 1),
(68, 78, '12300', '2022-09-27 13:36:07', '2022-09-27 13:36:07', NULL, 1),
(69, 79, '12300', '2022-09-27 13:36:29', '2022-09-27 13:36:29', NULL, 1),
(70, 80, '12300', '2022-09-27 13:36:38', '2022-09-27 13:36:38', NULL, 1),
(71, 81, '12300', '2022-09-27 13:38:06', '2022-09-27 13:38:06', NULL, 1),
(72, 82, '12300', '2022-09-27 13:38:17', '2022-09-27 13:38:17', NULL, 1),
(73, 83, '12300', '2022-09-27 13:38:45', '2022-09-27 13:38:45', NULL, 1),
(74, 84, '10000', '2022-09-27 13:41:07', '2022-09-27 13:41:07', NULL, 1),
(75, 123, '10000', '2022-09-27 13:42:17', '2022-09-27 13:42:17', NULL, 1),
(76, 124, '10000', '2022-09-27 13:43:07', '2022-09-27 13:43:07', NULL, 1),
(77, 125, '12300', '2022-09-27 13:44:08', '2022-09-27 13:44:08', NULL, 1),
(78, 126, '12300', '2022-09-27 13:44:32', '2022-09-27 13:44:32', NULL, 1),
(79, 127, '12300', '2022-09-27 13:44:58', '2022-09-27 13:44:58', NULL, 1),
(80, 128, '12300', '2022-09-27 13:45:07', '2022-09-27 13:45:07', NULL, 1),
(81, 129, '12300', '2022-09-27 13:55:16', '2022-09-27 13:55:16', NULL, 1),
(82, 1, '4500', '2022-09-27 15:47:23', '2022-09-27 15:47:23', NULL, 1),
(83, 2, '12300', '2022-09-27 15:56:02', '2022-09-27 15:56:02', NULL, 1),
(84, 3, '10000', '2022-09-27 15:59:25', '2022-09-27 15:59:25', NULL, 1),
(85, 4, '12300', '2022-10-04 13:49:29', '2022-10-04 13:49:29', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_product_statuses`
--

CREATE TABLE `new_product_statuses` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_product_statuses`
--

INSERT INTO `new_product_statuses` (`id`, `name`, `active`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(1, 'სტანდარტული', 1, NULL, NULL, 1),
(2, 'ყველაზე გაყიდვადი', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_product_vendors`
--

CREATE TABLE `new_product_vendors` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` int NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_product_vendors`
--

INSERT INTO `new_product_vendors` (`id`, `name`, `code`, `address`, `phone`, `active`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(1, 'ჩემი ონლაინ მაღაზია', 1, '0', '0', 1, '2022-02-24 02:42:58', NULL, 1),
(2, 'dasdasd', 123123123, 'sdasdasdasd', '123123123', 0, '2022-06-13 08:02:43', '2022-06-13 08:02:43', 0),
(3, 'ვიღაც მომწოდებელი111', 123, '123', '123', 0, '2022-06-13 08:02:51', '2022-06-13 08:02:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `new_seo_parameters`
--

CREATE TABLE `new_seo_parameters` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_seo_parameters`
--

INSERT INTO `new_seo_parameters` (`id`, `name`, `value`, `created_at`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(1, 'main', '{\"title_ge\":\"TurboPc - მთავარი გვერდი\",\"title_en\":\"TurboPc - Home Page\",\"keywords_ge\":\"www.turbo.ge, ინტერნეტ მაღაზია, ფასდაკლებები, დაბალი ფასები, განვადება, გარანტია, ადგილზე მიტანა, ინტერნეტ მაღაზია, მიწოდება მთელ საქართველოში, კომპიუტერები, ნოუთბუქები, მონიტორები, gtx1080, პროექტორები, მობილურები, სმარტფონები, მონიტორები და ტელევიზორები, საბეჭდი მოწყობილობები, პერიფერიალებიnoutbuqebi, kompiuterebi, mobilurebi, monitorebi, televizorebi, kompiuteris nawilebi, video baratebi, procesorebi, printerebi, skanerebi, klaviaturebi, yursasmenebi, mausebi, proeqtorebi, dd3, dd4,\",\"keywords_en\":\"www.turbo.ge, ინტერნეტ მაღაზია, ფასდაკლებები, დაბალი ფასები, განვადება, გარანტია, ადგილზე მიტანა, ინტერნეტ მაღაზია, მიწოდება მთელ საქართველოში, კომპიუტერები, ნოუთბუქები, მონიტორები, gtx1080, პროექტორები, მობილურები, სმარტფონები, მონიტორები და ტელევიზორები, საბეჭდი მოწყობილობები, პერიფერიალებიnoutbuqebi, kompiuterebi, mobilurebi, monitorebi, televizorebi, kompiuteris nawilebi, video baratebi, procesorebi, printerebi, skanerebi, klaviaturebi, yursasmenebi, mausebi, proeqtorebi, dd3, dd4,\",\"description_ge\":\"კომპიუტერული ინტერნეტ მაღაზია www.turbopc.ge - TURBO PC კომპიუტერები, სერვერები და კომპონენტები, ნოუთბუქები, მობილურები, პლანშეტები, მონიტორები და ტელევიზორები, საბეჭდი მოწყობილობები, პერიფერიალები და სხვ\",\"description_en\":\"კომპიუტერული ინტერნეტ მაღაზია www.turbopc.ge - TURBO PC კომპიუტერები, სერვერები და კომპონენტები, ნოუთბუქები, მობილურები, პლანშეტები, მონიტორები და ტელევიზორები, საბეჭდი მოწყობილობები, პერიფერიალები და სხვა\"}\n', '2022-03-21 07:34:21', NULL, NULL, 1),
(2, 'products', '{\"title_ge\":\"TurboPc - პროდუქციის ჩამონათვალი\",\"title_en\":\"TurboPc - Product list\",\"keywords_ge\":\"1\",\"keywords_en\":\"1\",\"description_ge\":\"1\",\"description_en\":\"1\"}\r\n', '2022-03-21 07:34:21', NULL, NULL, 1),
(3, 'checkout', '{\"title_ge\":\"1\",\"title_en\":\"1\",\"keywords_ge\":\"1\",\"keywords_en\":\"1\",\"description_ge\":\"1\",\"description_en\":\"1\"}', '2022-03-21 07:34:21', NULL, NULL, 1),
(4, 'cart', '{\"title_ge\":\"1\",\"title_en\":\"1\",\"keywords_ge\":\"1\",\"keywords_en\":\"1\",\"description_ge\":\"1\",\"description_en\":\"1\"}', '2022-03-21 07:34:21', NULL, NULL, 1),
(5, 'registration', '{\"title_ge\":\"1\",\"title_en\":\"1\",\"keywords_ge\":\"1\",\"keywords_en\":\"1\",\"description_ge\":\"1\",\"description_en\":\"1\"}', '2022-03-21 07:34:21', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_slider`
--

CREATE TABLE `new_slider` (
  `id` int NOT NULL,
  `path` varchar(255) NOT NULL,
  `is_banner` int DEFAULT NULL,
  `text` text NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_slider`
--

INSERT INTO `new_slider` (`id`, `path`, `is_banner`, `text`, `url`, `active`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(1, 'https://dashboard.turbopc.ge/storage/files/1/6242d03ba23b5.png', NULL, '{\"small_text_ge\":\"12555555555555553\",\"small_text_en\":\"123\",\"big_text_ge\":\"test\",\"big_text_en\":null}', '123', 1, '2022-04-11 07:41:26', '2022-04-11 07:41:26', 0),
(2, 'http://127.0.0.1:8000/storage/files/1/6242d57c8976b.jpg', NULL, '{\"small_text_ge\":\"123\",\"small_text_en\":\"123\",\"big_text_ge\":\"5555555\",\"big_text_en\":\"55555555\"}', '123', 1, '2022-04-04 06:39:43', '2022-04-04 06:39:43', 0),
(3, 'https://dashboard.turbopc.ge/storage/files/1/62540b3348606.jpg', NULL, '{\"small_text_ge\":\"\\u10d0\\u10e5\\u10ea\\u10d8\\u10d0\",\"small_text_en\":\"Best Prices\",\"big_text_ge\":\"\\u10e1\\u10d0\\u10e3\\u10d9\\u10d4\\u10d7\\u10d4\\u10e1\\u10dd \\u10e4\\u10d0\\u10e1\\u10d4\\u10d1\\u10d8\",\"big_text_en\":null}', 'https://www.facebook.com/TurboEl/photos/a.241996896484640/934690960548560/', 1, '2022-04-11 07:49:16', '2022-04-11 07:49:16', 0),
(4, 'https://dashboard.turbopc.ge/storage/files/1/6254158719831.jpg', NULL, '{\"small_text_ge\":\"\\u10e1\\u10d0\\u10e3\\u10d9\\u10d4\\u10d7\\u10d4\\u10e1\\u10dd \\u10e4\\u10d0\\u10e1\\u10d4\\u10d1\\u10d8\",\"small_text_en\":\"Best Prices\",\"big_text_ge\":\"\\u10d0\\u10e5\\u10ea\\u10d8\\u10d0\",\"big_text_en\":null}', 'https://turbopc.ge/ge', 1, '2022-04-11 08:05:35', '2022-04-11 08:05:35', 0),
(5, 'https://dashboard.turbopc.ge/storage/files/1/Slides/6267a3c6eab83.png', NULL, '{\"small_text_ge\":\"\\u10e1\\u10d0\\u10e3\\u10d9\\u10d4\\u10d7\\u10d4\\u10e1\\u10dd \\u10e4\\u10d0\\u10e1\\u10d4\\u10d1\\u10d8\",\"small_text_en\":\"Best Prices\",\"big_text_ge\":\"3300 \\u10da\\u10d0\\u10e0\\u10d8\",\"big_text_en\":\"3300 GEL\"}', 'https://turbopc.ge/ge', 1, '2022-06-27 05:48:56', '2022-06-27 05:48:56', 0),
(6, 'https://dashboard.turbopc.ge/storage/files/1/Slides/6267a05015c7b.png', NULL, '{\"small_text_ge\":\"\\u10e1\\u10d0\\u10e3\\u10d9\\u10d4\\u10d7\\u10d4\\u10e1\\u10dd \\u10e4\\u10d0\\u10e1\\u10d4\\u10d1\\u10d8\",\"small_text_en\":\"Best Prices\",\"big_text_ge\":\"3500 \\u10da\\u10d0\\u10e0\\u10d8\",\"big_text_en\":\"3500 GEL\"}', 'https://turbopc.ge/ge', 1, '2022-06-27 05:48:59', '2022-06-27 05:48:59', 0),
(7, 'https://dashboard.turbopc.ge/storage/files/1/აქსესუარები/6267bcb0e7f68.jpeg', 1, '{\"small_text_ge\":\"\\u10e1\\u10d0\\u10e3\\u10d9\\u10d4\\u10d7\\u10d4\\u10e1\\u10dd \\u10e4\\u10d0\\u10e1\\u10d4\\u10d1\\u10d8\",\"small_text_en\":\"Best Prices\",\"big_text_ge\":\"\\u10d0\\u10e5\\u10e1\\u10d4\\u10e1\\u10e3\\u10d0\\u10e0\\u10d4\\u10d1\\u10d8\",\"big_text_en\":\"Accessories\"}', 'https://turbopc.ge/ge/products?category_id=22', 1, '2022-06-27 05:49:02', '2022-06-27 05:49:02', 0),
(8, 'https://dashboard.turbopc.ge/storage/files/1/აქსესუარები/6267ddd0e4b6c.png', 1, '{\"small_text_ge\":\"\\u10e1\\u10d0\\u10e3\\u10d9\\u10d4\\u10d7\\u10d4\\u10e1\\u10dd \\u10e4\\u10d0\\u10e1\\u10d4\\u10d1\\u10d8\",\"small_text_en\":\"Best Prices\",\"big_text_ge\":\"\\u10e4\\u10d0\\u10e1\\u10d3\\u10d0\\u10d9\\u10da\\u10d4\\u10d1\\u10e3\\u10da\\u10d8 \\u10de\\u10e0\\u10dd\\u10d3\\u10e3\\u10e5\\u10ea\\u10d8\\u10d0\",\"big_text_en\":\"Products on Sale\"}', 'https://turbopc.ge/ge', 1, '2022-06-27 05:49:04', '2022-06-27 05:49:04', 0),
(15, 'https://dashboard.turbopc.ge/storage/files/1/6242d34ce1e92.jpeg', 1, '{\"small_text_ge\":\"123\",\"small_text_en\":\"123\",\"big_text_ge\":\"123\",\"big_text_en\":\"123\"}', '123', 1, '2022-04-13 09:27:38', '2022-04-13 09:27:38', 0),
(16, 'https://dashboard.turbopc.ge/storage/files/1/Slides/6267a9c161fe1.png', 1, '{\"small_text_ge\":\"\\u10e1\\u10d0\\u10e3\\u10d9\\u10d4\\u10d7\\u10d4\\u10e1\\u10dd \\u10e4\\u10d0\\u10e1\\u10d4\\u10d1\\u10d8\",\"small_text_en\":\"Best Prices\",\"big_text_ge\":\"4130 \\u10da\\u10d0\\u10e0\\u10d8\",\"big_text_en\":\"4130 GEL\"}', 'https://turbopc.ge/ge/products/107', 1, '2022-06-27 05:49:07', '2022-06-27 05:49:07', 0),
(17, 'http://127.0.0.1:8181/storage/files/1/62b97d522f0a9.png', NULL, '{\"small_text_ge\":\"test\",\"small_text_en\":\"test\",\"big_text_ge\":\"test\",\"big_text_en\":\"test\"}', '123', 1, '2022-06-28 07:31:56', '2022-06-28 07:31:56', 0),
(18, 'http://127.0.0.1:8181/storage/files/1/62b97f6518a05.png', NULL, '{\"small_text_ge\":\"test\",\"small_text_en\":\"test\",\"big_text_ge\":\"test\",\"big_text_en\":\"test\"}', 'test', 1, '2022-06-28 07:32:36', '2022-06-28 07:32:36', 0),
(19, 'https://dashboard.mallline.ge/storage/files/1/62bae6c26505f.png', 1, '{\"small_text_ge\":\"\\u10e5\\u10d0\\u10e0\\u10d7\\u10e3\\u10da\\u10d8 \\u10e2\\u10d4\\u10e5\\u10e1\\u10e2\\u10d8\",\"small_text_en\":\"English text 1\",\"big_text_ge\":\"\\u10e5\\u10d0\\u10e0\\u10d7\\u10e3\\u10da\\u10d8 \\u10e2\\u10d4\\u10e5\\u10e1\\u10e2\\u10d8 2\",\"big_text_en\":\"English text 2\"}', '12345', 1, '2022-06-30 02:36:28', NULL, 1),
(20, 'https://dashboard.mallline.ge/storage/files/1/62bae8c7b7ee0.png', NULL, '{\"small_text_ge\":\"\\u10db\\u10d8\\u10ec\\u10dd\\u10d3\\u10d4\\u10d1\\u10d0 \\u10d4\\u10e0\\u10d7\\u10d8 \\u10dd\\u10e0\\u10d8 \\u10e1\\u10d0\\u10db\\u10d8\",\"small_text_en\":\"Delivery\",\"big_text_ge\":\"\\u10db\\u10d8\\u10ec\\u10dd\\u10d3\\u10d4\\u10d1\\u10d0 \\u10e1\\u10d0\\u10db\\u10d8 \\u10dd\\u10e0\\u10d8 \\u10d4\\u10e0\\u10d7\\u10d8\",\"big_text_en\":\"Delivery 2\"}', '123', 1, '2022-06-30 02:37:33', NULL, 1),
(21, 'http://kaxeti.mallline.ge/storage/files/7/631f5b6ee83f5.png', 1, '{\"small_text_ge\":\"123123123\",\"small_text_en\":\"123123123\",\"big_text_ge\":\"123123123\",\"big_text_en\":\"123123123\"}', '123123123', 1, '2022-09-27 12:32:47', '2022-09-27 12:32:47', 0),
(22, 'http://kaxeti.mallline.ge/storage/files/7/631f5d93582c0.png', NULL, '{\"small_text_ge\":\"5555\",\"small_text_en\":\"55555\",\"big_text_ge\":\"55555\",\"big_text_en\":\"5555\"}', '555555', 1, '2022-09-27 12:33:27', '2022-09-27 12:33:27', 0),
(23, 'http://kaxeti.mallline.ge/storage/files/7/631f85169c755.png', NULL, '{\"small_text_ge\":\"123123\",\"small_text_en\":\"123123\",\"big_text_ge\":\"123123\",\"big_text_en\":\"123123\"}', NULL, 1, '2022-09-27 12:32:55', '2022-09-27 12:32:55', 0),
(24, 'http://maverick.mallline.ge/storage/files/7/631f5b6ee83f5.png', 1, '{\"small_text_ge\":\"123\",\"small_text_en\":\"13123\",\"big_text_ge\":\"123123\",\"big_text_en\":\"123123\"}', '123123', 1, '2022-09-27 12:33:18', NULL, 1),
(25, 'https://nikaragua.mallline.ge/storage/files/19/633c6ff267d0b.png', NULL, '{\"small_text_ge\":\"123\",\"small_text_en\":\"123\",\"big_text_ge\":\"123\",\"big_text_en\":\"123\"}', '123', 1, '2022-10-04 13:40:15', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_social_facebook_accounts`
--

CREATE TABLE `new_social_facebook_accounts` (
  `id` int NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `provider_user_id` varchar(255) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_social_facebook_accounts`
--

INSERT INTO `new_social_facebook_accounts` (`id`, `user_id`, `provider_user_id`, `provider`, `created_at`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(4, '7', '2058949100943336', 'facebook', '2022-06-28 05:07:00', '2022-06-28 05:07:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_social_google_accounts`
--

CREATE TABLE `new_social_google_accounts` (
  `id` int NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `provider_user_id` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `new_social_parameters`
--

CREATE TABLE `new_social_parameters` (
  `id` int NOT NULL,
  `label` varchar(255) NOT NULL,
  `snippet` varchar(255) DEFAULT 'NULL',
  `value` varchar(255) DEFAULT NULL,
  `key` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `disabled` int NOT NULL DEFAULT '0',
  `active` int NOT NULL DEFAULT '1',
  `sortable` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_social_parameters`
--

INSERT INTO `new_social_parameters` (`id`, `label`, `snippet`, `value`, `key`, `type`, `disabled`, `active`, `sortable`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(6, 'Facebook', 'Facebook გვერდის ბმული რომელიც გსურთ რომ გამოჩნდეს ვებ-გვერდზე', 'Facebook.com/altage', 'facebook', 'input', 0, 1, 1, '2022-10-04 14:16:08', NULL, 1),
(7, 'Instagram', 'Instagram გვერდის ბმული რომელიც გსურთ რომ გამოჩნდეს ვებ-გვერდზე', '123', 'instagram', 'input', 0, 1, 1, '2022-10-04 14:16:08', NULL, 1),
(8, 'Youtube', 'Youtube გვერდის ბმული რომელიც გსურთ რომ გამოჩნდეს ვებ-გვერდზე', NULL, 'youtube', 'input', 0, 1, 1, '2022-10-04 14:16:08', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_text_pages`
--

CREATE TABLE `new_text_pages` (
  `id` int NOT NULL,
  `name_ge` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `text_ge` mediumtext NOT NULL,
  `text_en` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_text_pages`
--

INSERT INTO `new_text_pages` (`id`, `name_ge`, `name_en`, `text_ge`, `text_en`, `created_at`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(1, 'ჩვენს შესახებ', 'About us', 'Mallline.ge აერთიანებს საქართველოში არსებულ ყველა მაღაზიას ერთ სივრცეში, სადაც მომხმარებლებს შესაძლებლობა აქვთ შეიძინონ სხვადასხვა კატეგორიის ნებისმიერი ნივთი საუკეთესო ფასად, მიიღონ ერთიანი მაღალი ხარისხის მომსახურება და ისარგებლონ სწრაფი მიწოდების მომსახურებით საქართველოს მასშტაბით Mallline.ge-ს გუნდისთვის მთავარი ამოცანა არის ბედნიერი მომხმარებელი. ამისთვის ჩვენ გისმენთ თქვენ, ვითვალისწინებთ თქვენს რეკომენდაციებს და რჩევებს თუ როგორ გავხადოთ ჩვენი ურთიერთობები გამორჩეულად საუკეთესო.\r\n\r\nMallline.ge არის სივრცე, სადაც განთავსებულია ყველა მაღაზიის პროდუქცია, იმისთვის რომ გაგიმარტივოთ და მოგიხსნათ ყველა დაბრკოლება რაც შეიძლება დაკავშირებული იყოს ონლაინ ნივთის შეძენასთან. როდესაც Mallline.ge-ზე აკეთებთ შესყიდვას, ჩვენგან ხდება შესაბამის მაღაზიაში ნივთის დარეზერვება, შემდეგ წამოღება ჩვენს მასორტირებელ ცენტრში, საიდანაც უკვე ერთი ან რამოდენიმე ნივთი თქვენი შეკვეთიდან ერთიანად მოგვაქვს თქვენს მიერ მითითებულ მისამართზე.', 'ENGLISH VERSION Mallline.ge აერთიანებს საქართველოში არსებულ ყველა მაღაზიას ერთ სივრცეში, სადაც მომხმარებლებს შესაძლებლობა აქვთ შეიძინონ სხვადასხვა კატეგორიის ნებისმიერი ნივთი საუკეთესო ფასად, მიიღონ ერთიანი მაღალი ხარისხის მომსახურება და ისარგებლონ სწრაფი მიწოდების მომსახურებით საქართველოს მასშტაბით Mallline.ge-ს გუნდისთვის მთავარი ამოცანა არის ბედნიერი მომხმარებელი. ამისთვის ჩვენ გისმენთ თქვენ, ვითვალისწინებთ თქვენს რეკომენდაციებს და რჩევებს თუ როგორ გავხადოთ ჩვენი ურთიერთობები გამორჩეულად საუკეთესო.\r\n\r\nMallline.ge არის სივრცე, სადაც განთავსებულია ყველა მაღაზიის პროდუქცია, იმისთვის რომ გაგიმარტივოთ და მოგიხსნათ ყველა დაბრკოლება რაც შეიძლება დაკავშირებული იყოს ონლაინ ნივთის შეძენასთან. როდესაც Mallline.ge-ზე აკეთებთ შესყიდვას, ჩვენგან ხდება შესაბამის მაღაზიაში ნივთის დარეზერვება, შემდეგ წამოღება ჩვენს მასორტირებელ ცენტრში, საიდანაც უკვე ერთი ან რამოდენიმე ნივთი თქვენი შეკვეთიდან ერთიანად მოგვაქვს თქვენს მიერ მითითებულ მისამართზე.\r\n\r\n', '2022-07-10 19:00:24', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_translate_parameters`
--

CREATE TABLE `new_translate_parameters` (
  `id` int NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_translate_parameters`
--

INSERT INTO `new_translate_parameters` (`id`, `key`, `value`, `active`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(3, 'about_us', '{\"ge\":\"ჩვენ შესახებ\",\"en\":\"About us\"}', 1, '2022-05-18 06:12:40', NULL, 1),
(104, 'acc_details', '{\"ge\":\"\\u10de\\u10e0\\u10dd\\u10e4\\u10d8\\u10da\\u10d8\\u10e1 \\u10db\\u10dd\\u10dc\\u10d0\\u10ea\\u10d4\\u10db\\u10d4\\u10d1\\u10d8\",\"en\":\"Account details\"}', 1, '2022-07-07 04:53:35', NULL, 1),
(85, 'action', '{\"ge\":\"\\u10db\\u10dd\\u10e5\\u10db\\u10d4\\u10d3\\u10d4\\u10d1\\u10d0\",\"en\":\"Action\"}', 1, '2022-07-07 03:29:56', NULL, 1),
(134, 'additionl_info', '{\"ge\":\"\\u10d3\\u10d0\\u10db\\u10d0\\u10e2\\u10d4\\u10d1\\u10d8\\u10d7\\u10d8 \\u10d8\\u10dc\\u10e4\\u10dd\\u10e0\\u10db\\u10d0\\u10ea\\u10d8\\u10d0\",\"en\":\"Additional information\"}', 1, '2022-07-08 06:42:11', NULL, 1),
(25, 'add_to_cart', '{\"ge\":\"\\u10d3\\u10d0\\u10db\\u10d0\\u10e2\\u10d4\\u10d1\\u10d0\",\"en\":\"Add to cart\"}', 1, '2022-06-27 06:22:49', NULL, 1),
(91, 'add_to_wishlist', '{\"ge\":\"\\u10e1\\u10e3\\u10e0\\u10d5\\u10d8\\u10da\\u10d4\\u10d1\\u10d8\\u10e1 \\u10e1\\u10d8\\u10d0\\u10e8\\u10d8 \\u10d3\\u10d0\\u10db\\u10d0\\u10e2\\u10d4\\u10d1\\u10d0\",\"en\":\"Add to wishlist\"}', 1, '2022-07-07 04:07:53', NULL, 1),
(9, 'all_products', '{\"ge\":\"ყველა პროდუქტი\",\"en\":\"All products\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(72, 'all_right_reserved', '{\"ge\":\"\\u10e7\\u10d5\\u10d4\\u10da\\u10d0 \\u10e3\\u10e4\\u10da\\u10d4\\u10d1\\u10d0 \\u10d3\\u10d0\\u10ea\\u10e3\\u10da\\u10d8\\u10d0\",\"en\":\"All right reserved\"}', 1, '2022-06-30 02:53:10', NULL, 1),
(115, 'amount', '{\"ge\":\"\\u10e6\\u10d8\\u10e0\\u10d4\\u10d1\\u10e3\\u10da\\u10d4\\u10d1\\u10d0\",\"en\":\"Amount\"}', 1, '2022-07-07 04:59:32', NULL, 1),
(58, 'badge_1_body', '{\"ge\":\"\\u20be50 - \\u10d6\\u10d4 \\u10db\\u10d4\\u10e2\\u10d8\",\"en\":\"Up to 50 GEL\"}', 1, '2022-06-30 02:31:42', NULL, 1),
(50, 'badge_1_heading', '{\"ge\":\"\\u10e1\\u10d0\\u10e3\\u10d9\\u10d4\\u10d7\\u10d4\\u10e1\\u10dd \\u10e4\\u10d0\\u10e1\\u10d8\",\"en\":\"Best prices\"}', 1, '2022-06-24 05:02:48', NULL, 1),
(59, 'badge_2_body', '{\"ge\":\"\\u10e3\\u10e4\\u10d0\\u10e1\\u10dd \\u10db\\u10d8\\u10ec\\u10dd\\u10d3\\u10d4\\u10d1\\u10d0\",\"en\":\"Free delivery\"}', 1, '2022-06-30 02:31:55', NULL, 1),
(51, 'badge_2_heading', '{\"ge\":\"24\\/7\",\"en\":\"24\\/7\"}', 1, '2022-06-24 05:02:15', NULL, 1),
(60, 'badge_3_body', '{\"ge\":\"\\u10db\\u10dd\\u10db\\u10ee\\u10db\\u10d0\\u10e0\\u10d4\\u10d1\\u10da\\u10d4\\u10d1\\u10d8\\u10e1\\u10d7\\u10d5\\u10d8\\u10e1\",\"en\":\"For customer\"}', 1, '2022-06-30 02:32:15', NULL, 1),
(52, 'badge_3_heading', '{\"ge\":\"\\u10e1\\u10d0\\u10e3\\u10d9\\u10d4\\u10d7\\u10d4\\u10e1\\u10dd \\u10d3\\u10d8\\u10da\\u10d8\",\"en\":\"Best deal\"}', 1, '2022-06-24 05:02:52', NULL, 1),
(61, 'badge_4_body', '{\"ge\":\"\\u10e4\\u10d0\\u10e1\\u10d3\\u10d0\\u10d9\\u10da\\u10d4\\u10d1\\u10d0\",\"en\":\"Sale\"}', 1, '2022-06-30 02:32:30', NULL, 1),
(53, 'badge_4_heading', '{\"ge\":\"200\\u10d9 + \\u10de\\u10e0\\u10dd\\u10d3\\u10e3\\u10e5\\u10ea\\u10d8\\u10d0\",\"en\":\"200k +products\"}', 1, '2022-06-24 05:04:00', NULL, 1),
(62, 'badge_5_body', '{\"ge\":\"30 \\u10d3\\u10e6\\u10d4\\u10e8\\u10d8\",\"en\":\"30 days\"}', 1, '2022-06-30 02:32:53', NULL, 1),
(54, 'badge_5_heading', '{\"ge\":\"\\u10d3\\u10d0\\u10d1\\u10e0\\u10e3\\u10dc\\u10d4\\u10d1\\u10d0\",\"en\":\"Return\"}', 1, '2022-06-24 05:04:36', NULL, 1),
(149, 'best_selling', '{\"ge\":\"\\u10e7\\u10d5\\u10d4\\u10da\\u10d0\\u10d6\\u10d4 \\u10d2\\u10d0\\u10e7\\u10d8\\u10d3\\u10d5\\u10d0\\u10d3\\u10d8\",\"en\":\"Best selling\"}', 1, '2022-07-18 04:18:59', NULL, 1),
(11, 'box_text_1', '{\"ge\":\"უფასო მიწოდება თბილისის მასშტაბით\",\"en\":\"Free delivery throughout Tbilisi\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(10, 'box_title_1', '{\"ge\":\"უფასო მიწოდება\",\"en\":\"Free Delivery\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(21, 'brands', '{\"ge\":\"ბრენდები\",\"en\":\"Brands\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(44, 'build_shop', '{\"ge\":\"\\u10e8\\u10d4\\u10e5\\u10db\\u10d4\\u10dc\\u10d8 \\u10db\\u10d0\\u10e6\\u10d0\\u10d6\\u10d8\\u10d0\",\"en\":\"Create a store\"}', 1, '2022-06-24 04:38:56', NULL, 1),
(7, 'build_your_pc', '{\"ge\":\"ააწყე შენი კომპიუტერი\",\"en\":\"Build your PC\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(77, 'by_category', '{\"ge\":\"\\u10d9\\u10d0\\u10e2\\u10d4\\u10d2\\u10dd\\u10e0\\u10d8\\u10d8\\u10d7\",\"en\":\"By category\"}', 1, '2022-06-30 03:20:51', NULL, 1),
(76, 'by_price', '{\"ge\":\"\\u10e4\\u10d0\\u10e1\\u10d8\\u10d7\",\"en\":\"By price\"}', 1, '2022-06-30 03:15:40', NULL, 1),
(56, 'cart', '{\"ge\":\"\\u10d9\\u10d0\\u10da\\u10d0\\u10d7\\u10d0\",\"en\":\"Cart\"}', 1, '2022-06-24 05:18:07', NULL, 1),
(119, 'cart_clear', '{\"ge\":\"\\u10d9\\u10d0\\u10da\\u10d0\\u10d7\\u10d8\\u10e1 \\u10d2\\u10d0\\u10e1\\u10e3\\u10e4\\u10d7\\u10d0\\u10d5\\u10d4\\u10d1\\u10d0\",\"en\":\"Clear cart\"}', 1, '2022-07-07 05:26:32', NULL, 1),
(6, 'categories', '{\"ge\":\"კატეგორიები\",\"en\":\"Categories\"}', 1, '2022-01-31 07:55:10', NULL, 1),
(23, 'category', '{\"ge\":\"კატეგორია\",\"en\":\"Category\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(57, 'checkout', '{\"ge\":\"\\u10e9\\u10d4\\u10e5\\u10d0\\u10e3\\u10d7\\u10d8\",\"en\":\"Checkout\"}', 1, '2022-06-24 05:18:28', NULL, 1),
(64, 'company', '{\"ge\":\"\\u10d9\\u10dd\\u10db\\u10de\\u10d0\\u10dc\\u10d8\\u10d0\",\"en\":\"Company\"}', 1, '2022-06-30 02:47:58', NULL, 1),
(71, 'compare', '{\"ge\":\"\\u10e8\\u10d4\\u10d3\\u10d0\\u10e0\\u10d4\\u10d1\\u10d0\",\"en\":\"Compare\"}', 1, '2022-06-30 02:52:33', NULL, 1),
(92, 'compare_list_is_empty', '{\"ge\":\"\\u10e8\\u10d4\\u10d3\\u10d0\\u10e0\\u10d4\\u10d1\\u10d8\\u10e1 \\u10e1\\u10d8\\u10d0 \\u10ea\\u10d0\\u10e0\\u10d8\\u10d4\\u10da\\u10d8\\u10d0\",\"en\":\"Compare list is empty\"}', 1, '2022-07-07 04:08:50', NULL, 1),
(110, 'confirm_password', '{\"ge\":\"\\u10de\\u10d0\\u10e0\\u10dd\\u10da\\u10d8\\u10e1 \\u10d2\\u10d0\\u10dc\\u10db\\u10d4\\u10dd\\u10e0\\u10d4\\u10d1\\u10d0\",\"en\":\"Confirm password\"}', 1, '2022-07-07 04:56:03', NULL, 1),
(2, 'contact', '{\"ge\":\"კონტაქტი\",\"en\":\"Contact\"}', 1, '2022-01-31 08:24:34', NULL, 1),
(143, 'contact_email', '{\"ge\":\"\\u10d4\\u10da-\\u10e4\\u10dd\\u10e1\\u10e2\\u10d0\",\"en\":\"E-mail\"}', 1, '2022-07-08 07:10:06', NULL, 1),
(138, 'contact_info', '{\"ge\":\"\\u10e1\\u10d0\\u10d9\\u10dd\\u10dc\\u10e2\\u10d0\\u10e5\\u10e2\\u10dd \\u10d8\\u10dc\\u10e4\\u10dd\\u10e0\\u10db\\u10d0\\u10ea\\u10d8\\u10d0\",\"en\":\"Contact info\"}', 1, '2022-07-08 07:01:36', NULL, 1),
(145, 'continue', '{\"ge\":\"\\u10d2\\u10d0\\u10d2\\u10e0\\u10eb\\u10d4\\u10da\\u10d4\\u10d1\\u10d0\",\"en\":\"Continue\"}', 1, '2022-07-10 06:15:44', NULL, 1),
(5, 'copyright', '{\"ge\":\"ყველა უფლება დაცულია\",\"en\":\"All right reserved\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(65, 'corporate', '{\"ge\":\"\\u10d9\\u10dd\\u10e0\\u10de\\u10dd\\u10e0\\u10d0\\u10ea\\u10d8\\u10e3\\u10da\\u10d8\",\"en\":\"Corporate\"}', 1, '2022-06-30 02:49:15', NULL, 1),
(123, 'countinue_shoping', '{\"ge\":\"\\u10db\\u10d0\\u10e6\\u10d0\\u10d6\\u10d8\\u10d0\\u10e8\\u10d8 \\u10d3\\u10d0\\u10d1\\u10e0\\u10e3\\u10dc\\u10d4\\u10d1\\u10d0\",\"en\":\"Back to store\"}', 1, '2022-07-07 05:28:20', NULL, 1),
(132, 'current_email_is_busy', '{\"ge\":\"\\u10d0\\u10e6\\u10dc\\u10d8\\u10e8\\u10dc\\u10e3\\u10da\\u10d8 \\u10d4\\u10da-\\u10e4\\u10dd\\u10e1\\u10e2\\u10d0 \\u10d3\\u10d0\\u10d9\\u10d0\\u10d5\\u10d4\\u10d1\\u10e3\\u10da\\u10d8\\u10d0\",\"en\":\"Current email is busy\"}', 1, '2022-07-08 05:30:41', NULL, 1),
(133, 'current_phone_is_busy', '{\"ge\":\"\\u10d0\\u10e6\\u10dc\\u10d8\\u10e8\\u10dc\\u10e3\\u10da\\u10d8 \\u10e2\\u10d4\\u10da\\u10d4\\u10e4\\u10dd\\u10dc\\u10d8 \\u10d3\\u10d0\\u10d9\\u10d0\\u10d5\\u10d4\\u10d1\\u10e3\\u10da\\u10d8\\u10d0\",\"en\":\"Current phone is busy\"}', 1, '2022-07-08 05:33:23', NULL, 1),
(135, 'customer_reviews', '{\"ge\":\"\\u10db\\u10dd\\u10db\\u10ee\\u10db\\u10d0\\u10e0\\u10d4\\u10d1\\u10d4\\u10da\\u10d7\\u10d0 \\u10e8\\u10d4\\u10e4\\u10d0\\u10e1\\u10d4\\u10d1\\u10d0\",\"en\":\"Customer reviews\"}', 1, '2022-07-08 06:42:43', NULL, 1),
(113, 'date', '{\"ge\":\"\\u10d7\\u10d0\\u10e0\\u10d8\\u10e6\\u10d8\",\"en\":\"Date\"}', 1, '2022-07-07 04:58:57', NULL, 1),
(86, 'delete', '{\"ge\":\"\\u10ec\\u10d0\\u10e8\\u10da\\u10d0\",\"en\":\"Delete\"}', 1, '2022-07-07 03:30:17', NULL, 1),
(116, 'details', '{\"ge\":\"\\u10d3\\u10d4\\u10e2\\u10d0\\u10da\\u10d4\\u10d1\\u10d8\",\"en\":\"Details\"}', 1, '2022-07-07 04:59:44', NULL, 1),
(126, 'dont_have_acc', '{\"ge\":\"\\u10d0\\u10e0 \\u10d2\\u10d0\\u10e5\\u10d5\\u10d7 \\u10d7\\u10e5\\u10d5\\u10d4\\u10dc\\u10d8 \\u10de\\u10e0\\u10dd\\u10e4\\u10d8\\u10da\\u10d8\",\"en\":\"Dont have your acc\"}', 1, '2022-07-08 04:22:43', NULL, 1),
(14, 'email', '{\"ge\":\"ჩვენი ელ-ფოსტა\",\"en\":\"Our email\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(16, 'everyday', '{\"ge\":\"ყოველდღე\",\"en\":\"Everyday\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(20, 'filtered', '{\"ge\":\"გაფილტრე\",\"en\":\"Filter\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(19, 'filters', '{\"ge\":\"ფილტრები\",\"en\":\"Filters\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(32, 'forget_password', '{\"ge\":\"\\u10de\\u10d0\\u10e0\\u10dd\\u10da\\u10d8\\u10e1 \\u10d0\\u10e6\\u10d3\\u10d2\\u10d4\\u10dc\\u10d0\",\"en\":\"Forget password\"}', 1, '2022-04-19 10:27:43', NULL, 1),
(146, 'forgot_your_password', '{\"ge\":\"\\u10de\\u10d0\\u10e0\\u10dd\\u10da\\u10d8\\u10e1 \\u10d0\\u10e6\\u10d3\\u10d2\\u10d4\\u10dc\\u10d0\",\"en\":\"Password reset\"}', 1, '2022-07-10 06:16:03', NULL, 1),
(144, 'forgot_your_password_text', '{\"ge\":\"\\u10d0\\u10e0 \\u10d8\\u10dc\\u10d4\\u10e0\\u10d5\\u10d8\\u10e3\\u10da\\u10dd, \\u10e9\\u10d5\\u10d4\\u10dc \\u10db\\u10d8\\u10d5\\u10d8\\u10e6\\u10d4\\u10d7! \\u10db\\u10dd\\u10d3\\u10d8\\u10d7, \\u10db\\u10dd\\u10d2\\u10ea\\u10d4\\u10d7 \\u10d0\\u10ee\\u10d0\\u10da\\u10d8 \\u10de\\u10d0\\u10e0\\u10dd\\u10da\\u10d8. \\u10d2\\u10d7\\u10ee\\u10dd\\u10d5\\u10d7, \\u10e8\\u10d4\\u10d8\\u10e7\\u10d5\\u10d0\\u10dc\\u10dd\\u10d7 \\u10d7\\u10e5\\u10d5\\u10d4\\u10dc\\u10d8 \\u10d4\\u10da\\u10d4\\u10e5\\u10e2\\u10e0\\u10dd\\u10dc\\u10e3\\u10da\\u10d8 \\u10e4\\u10dd\\u10e1\\u10e2\\u10d8\\u10e1 \\u10db\\u10d8\\u10e1\\u10d0\\u10db\\u10d0\\u10e0\\u10d7\\u10d8 \\u10d0\\u10dc \\u10d7\\u10e5\\u10d5\\u10d4\\u10dc\\u10d8 \\u10db\\u10dd\\u10db\\u10ee\\u10db\\u10d0\\u10e0\\u10d4\\u10d1\\u10da\\u10d8\\u10e1 \\u10e1\\u10d0\\u10ee\\u10d4\\u10da\\u10d8.\",\"en\":\"Don\'t worry, we got it! Let\'s give you a new password. Please enter your email address or your username.\"}', 1, '2022-07-10 06:07:47', NULL, 1),
(78, 'from', '{\"ge\":\"\\u10d3\\u10d0\\u10dc\",\"en\":\"From\"}', 1, '2022-06-30 03:23:08', NULL, 1),
(26, 'future_products', '{\"ge\":\"ყველაზე გაყიდვადი\",\"en\":\"Best sallers\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(38, 'heading_text_1', '{\"ge\":\"\\u10e1\\u10e3\\u10e0\\u10d5\\u10d8\\u10da\\u10d4\\u10d1\\u10d8\\u10e1 \\u10e1\\u10d8\\u10d0\",\"en\":\"Wishlist\"}', 1, '2022-06-24 04:32:03', NULL, 1),
(39, 'heading_text_2', '{\"ge\":\"\\u10e0\\u10dd\\u10d2\\u10dd\\u10e0 \\u10e8\\u10d4\\u10d5\\u10d8\\u10eb\\u10d8\\u10dc\\u10dd?\",\"en\":\"How to buy?\"}', 1, '2022-06-24 04:32:08', NULL, 1),
(1, 'home', '{\"ge\":\"მთავარი გვერდი\",\"en\":\"Home Page\"}', 1, '2022-01-31 07:55:10', NULL, 1),
(129, 'incorect_email_or_password', '{\"ge\":\"\\u10d4\\u10da-\\u10e4\\u10dd\\u10e1\\u10e2\\u10d0 \\u10d0\\u10dc \\u10de\\u10d0\\u10e0\\u10dd\\u10da\\u10d8 \\u10d0\\u10e0\\u10d0\\u10e1\\u10ec\\u10dd\\u10e0\\u10d8\\u10d0\",\"en\":\"Incorect Email or Password\"}', 1, '2022-07-08 04:59:57', NULL, 1),
(120, 'item_price', '{\"ge\":\"\\u10d4\\u10e0\\u10d7\\u10d4\\u10e3\\u10da\\u10d8\\u10e1 \\u10e4\\u10d0\\u10e1\\u10d8\",\"en\":\"Item price\"}', 1, '2022-07-07 05:26:59', NULL, 1),
(41, 'lang_en', '{\"ge\":\"English\",\"en\":\"English\"}', 1, '2022-06-24 04:35:12', NULL, 1),
(42, 'lang_ge', '{\"ge\":\"\\u10e5\\u10d0\\u10e0\\u10d7\\u10e3\\u10da\\u10d8\",\"en\":\"\\u10e5\\u10d0\\u10e0\\u10d7\\u10e3\\u10da\\u10d8\"}', 1, '2022-06-24 04:35:32', NULL, 1),
(35, 'lastname', '{\"ge\":\"\\u10d2\\u10d5\\u10d0\\u10e0\\u10d8\",\"en\":\"Lastname\"}', 1, '2022-04-19 10:42:13', NULL, 1),
(34, 'legal', '{\"ge\":\"\\u10d8\\u10e3\\u10e0\\u10d8\\u10d3\\u10d8\\u10e3\\u10da\\u10d8 \\u10de\\u10d8\\u10e0\\u10d8\",\"en\":\"Legal\"}', 1, '2022-04-19 10:39:05', NULL, 1),
(28, 'login', '{\"ge\":\"\\u10d0\\u10d5\\u10e2\\u10dd\\u10e0\\u10d8\\u10d6\\u10d0\\u10ea\\u10d8\\u10d0\",\"en\":\"Login\"}', 1, '2022-04-19 10:20:30', NULL, 1),
(106, 'logout', '{\"ge\":\"\\u10de\\u10e0\\u10dd\\u10e4\\u10d8\\u10da\\u10d8\\u10d3\\u10d0\\u10dc \\u10d2\\u10d0\\u10e1\\u10d5\\u10da\\u10d0\",\"en\":\"Logout\"}', 1, '2022-07-07 04:54:28', NULL, 1),
(141, 'message', '{\"ge\":\"\\u10e8\\u10d4\\u10e2\\u10e7\\u10dd\\u10d1\\u10d8\\u10dc\\u10d4\\u10d1\\u10d0\",\"en\":\"Message\"}', 1, '2022-07-08 07:02:15', NULL, 1),
(18, 'more', '{\"ge\":\"დაწვრილებით\",\"en\":\"More\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(103, 'my_account', '{\"ge\":\"\\u10e9\\u10d4\\u10db\\u10d8 \\u10de\\u10e0\\u10dd\\u10e4\\u10d8\\u10da\\u10d8\",\"en\":\"My account\"}', 1, '2022-07-07 04:53:12', NULL, 1),
(105, 'my_orders', '{\"ge\":\"\\u10e9\\u10d4\\u10db\\u10d8 \\u10e8\\u10d4\\u10d9\\u10d5\\u10d4\\u10d7\\u10d4\\u10d1\\u10d8\",\"en\":\"My orders\"}', 1, '2022-07-07 04:54:07', NULL, 1),
(36, 'name', '{\"ge\":\"\\u10e1\\u10d0\\u10ee\\u10d4\\u10da\\u10d8\",\"en\":\"Name\"}', 1, '2022-04-19 10:42:25', NULL, 1),
(109, 'new_password', '{\"ge\":\"\\u10d0\\u10ee\\u10d0\\u10da\\u10d8 \\u10de\\u10d0\\u10e0\\u10dd\\u10da\\u10d8\",\"en\":\"New password\"}', 1, '2022-07-07 04:55:41', NULL, 1),
(88, 'no_stock', '{\"ge\":\"\\u10d0\\u10e0 \\u10d0\\u10e0\\u10d8\\u10e1 \\u10db\\u10d0\\u10e0\\u10d0\\u10d2\\u10e8\\u10d8\",\"en\":\"Out of stock\"}', 1, '2022-07-07 03:31:50', NULL, 1),
(87, 'on_stock', '{\"ge\":\"\\u10db\\u10d0\\u10e0\\u10d0\\u10d2\\u10e8\\u10d8\\u10d0\",\"en\":\"On stock\"}', 1, '2022-07-07 03:31:13', NULL, 1),
(49, 'or', '{\"ge\":\"\\u10d0\\u10dc\",\"en\":\"Or\"}', 1, '2022-06-24 04:46:50', NULL, 1),
(112, 'order_number', '{\"ge\":\"\\u10e8\\u10d4\\u10d9\\u10d5\\u10d4\\u10d7\\u10d8\\u10e1 \\u10dc\\u10dd\\u10db\\u10d4\\u10e0\\u10d8\",\"en\":\"Order number\"}', 1, '2022-07-07 04:58:43', NULL, 1),
(12, 'our_address', '{\"ge\":\"ჩვენი მისამართი\",\"en\":\"Our address\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(22, 'parameters', '{\"ge\":\"პროდუქტის მახასიათებლები\",\"en\":\"Parameters\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(31, 'password', '{\"ge\":\"\\u10de\\u10d0\\u10e0\\u10dd\\u10da\\u10d8\",\"en\":\"Password\"}', 1, '2022-04-19 10:27:20', NULL, 1),
(140, 'phone', '{\"ge\":\"\\u10e2\\u10d4\\u10da\\u10d4\\u10e4\\u10dd\\u10dc\\u10d8\\u10e1 \\u10dc\\u10dd\\u10db\\u10d4\\u10e0\\u10d8\",\"en\":\"Phone number\"}', 1, '2022-07-08 07:02:01', NULL, 1),
(13, 'phone_number', '{\"ge\":\"ჩვენი ტელეფონი\",\"en\":\"Our phone\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(118, 'photo', '{\"ge\":\"\\u10e1\\u10e3\\u10e0\\u10d0\\u10d7\\u10d8\",\"en\":\"Photo\"}', 1, '2022-07-07 05:24:25', NULL, 1),
(33, 'physical', '{\"ge\":\"\\u10e4\\u10d8\\u10d6\\u10d8\\u10d9\\u10e3\\u10e0\\u10d8 \\u10de\\u10d8\\u10e0\\u10d8\",\"en\":\"Physical\"}', 1, '2022-04-19 10:38:53', NULL, 1),
(131, 'place_enter_all_required_fields', '{\"ge\":\"\\u10d2\\u10d7\\u10ee\\u10dd\\u10d5\\u10d7 \\u10e8\\u10d4\\u10d0\\u10d5\\u10e1\\u10dd\\u10d7 \\u10e7\\u10d5\\u10d4\\u10da\\u10d0 \\u10d0\\u10e3\\u10ea\\u10d8\\u10da\\u10d4\\u10d1\\u10d4\\u10da\\u10d8 \\u10d5\\u10d4\\u10da\\u10d8\",\"en\":\"Place enter all required fields\"}', 1, '2022-07-08 05:30:18', NULL, 1),
(128, 'place_sign_up', '{\"ge\":\"\\u10d2\\u10d0\\u10d8\\u10d0\\u10e0\\u10d4 \\u10e0\\u10d4\\u10d2\\u10d8\\u10e1\\u10e2\\u10e0\\u10d0\\u10ea\\u10d8\\u10d0\",\"en\":\"Get registration\"}', 1, '2022-07-08 04:24:26', NULL, 1),
(37, 'popular_products', '{\"ge\":\"პოპულარული პროდუქცია\",\"en\":\"Popular products\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(83, 'price', '{\"ge\":\"\\u10e4\\u10d0\\u10e1\\u10d8\",\"en\":\"Price\"}', 1, '2022-07-07 03:28:59', NULL, 1),
(8, 'privacy', '{\"ge\":\"უსაფრთხოების პოლიტიკა\",\"en\":\"Privacy Policy\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(82, 'product', '{\"ge\":\"\\u10de\\u10e0\\u10dd\\u10d3\\u10e3\\u10e5\\u10ea\\u10d8\",\"en\":\"Product\"}', 1, '2022-07-07 03:28:49', NULL, 1),
(148, 'product_list_is_empty', '{\"ge\":\"\\u10de\\u10e0\\u10dd\\u10d3\\u10e3\\u10e5\\u10ea\\u10d8\\u10d8\\u10e1 \\u10e9\\u10d0\\u10db\\u10dd\\u10dc\\u10d0\\u10d7\\u10d5\\u10d0\\u10da \\u10ea\\u10d0\\u10e0\\u10d8\\u10d4\\u10da\\u10d8\\u10d0\",\"en\":\"Product list is empty\"}', 1, '2022-07-10 06:34:56', NULL, 1),
(117, 'purchase', '{\"ge\":\"\\u10e8\\u10d4\\u10eb\\u10d4\\u10dc\\u10d0\",\"en\":\"Purchase\"}', 1, '2022-07-07 05:23:12', NULL, 1),
(121, 'quantity', '{\"ge\":\"\\u10e0\\u10d0\\u10dd\\u10d3\\u10d4\\u10dc\\u10dd\\u10d1\\u10d0\",\"en\":\"Quantity\"}', 1, '2022-07-07 05:27:30', NULL, 1),
(69, 'quick_links', '{\"ge\":\"\\u10e1\\u10ec\\u10e0\\u10d0\\u10e4\\u10d8 \\u10d1\\u10db\\u10e3\\u10da\\u10d4\\u10d1\\u10d8\",\"en\":\"Quick Links\"}', 1, '2022-06-30 02:51:09', NULL, 1),
(90, 'quiq_view', '{\"ge\":\"\\u10e1\\u10ec\\u10e0\\u10d0\\u10e4\\u10d8 \\u10dc\\u10d0\\u10ee\\u10d5\\u10d0\",\"en\":\"Quick View\"}', 1, '2022-07-07 04:07:27', NULL, 1),
(29, 'register', '{\"ge\":\"\\u10e0\\u10d4\\u10d2\\u10d8\\u10e1\\u10e2\\u10e0\\u10d0\\u10ea\\u10d8\\u10d0\",\"en\":\"Registration\"}', 1, '2022-04-19 10:22:58', NULL, 1),
(102, 'registraction_google', '{\"ge\":\"Google \\u10e0\\u10d4\\u10d2\\u10d8\\u10e1\\u10e2\\u10e0\\u10d0\\u10ea\\u10d8\\u10d0\",\"en\":\"Continue with Google\"}', 1, '2022-07-07 04:18:40', NULL, 1),
(95, 'registration_facebook', '{\"ge\":\"Facebook \\u10e0\\u10d4\\u10d2\\u10d8\\u10e1\\u10e2\\u10e0\\u10d0\\u10ea\\u10d8\\u10d0\",\"en\":\"Continue with Google\"}', 1, '2022-07-07 04:18:03', NULL, 1),
(24, 'related_products', '{\"ge\":\"მსგავსი პროდუქცია\",\"en\":\"Related products\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(4, 'resently_added', '{\"ge\":\"ბოლოს დამატებული\",\"en\":\"Resently added\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(147, 'restore_phone', '{\"ge\":\"\\u10d7\\u10e5\\u10d5\\u10d4\\u10dc\\u10d8 \\u10e2\\u10d4\\u10da\\u10d4\\u10e4\\u10dd\\u10dc\\u10d8\\u10e1 \\u10dc\\u10dd\\u10db\\u10d4\\u10e0\\u10d8\",\"en\":\"Your phone number\"}', 1, '2022-07-10 06:16:38', NULL, 1),
(107, 'save', '{\"ge\":\"\\u10e8\\u10d4\\u10dc\\u10d0\\u10ee\\u10d5\\u10d0\",\"en\":\"Save\"}', 1, '2022-07-07 04:54:56', NULL, 1),
(43, 'search_query', '{\"ge\":\"\\u10e1\\u10d0\\u10eb\\u10d8\\u10d4\\u10d1\\u10dd \\u10e1\\u10d8\\u10e2\\u10e7\\u10d5\\u10d0\",\"en\":\"Search query\"}', 1, '2022-06-24 04:37:52', NULL, 1),
(142, 'send', '{\"ge\":\"\\u10d2\\u10d0\\u10d2\\u10d6\\u10d0\\u10d5\\u10dc\\u10d0\",\"en\":\"Send\"}', 1, '2022-07-08 07:02:29', NULL, 1),
(17, 'send_us_message', '{\"ge\":\"მოგვწერე\",\"en\":\"Send us a message\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(63, 'shop_now', '{\"ge\":\"\\u10e8\\u10d4\\u10d8\\u10eb\\u10d8\\u10dc\\u10d4 \\u10d4\\u10ee\\u10da\\u10d0\\u10d5\\u10d4\",\"en\":\"Shop now\"}', 1, '2022-06-30 02:34:02', NULL, 1),
(80, 'show', '{\"ge\":\"\\u10e9\\u10d5\\u10d4\\u10dc\\u10d4\\u10d1\\u10d0\",\"en\":\"Show\"}', 1, '2022-06-30 03:24:57', NULL, 1),
(47, 'sign-in', '{\"ge\":\"\\u10d0\\u10d5\\u10e2\\u10dd\\u10e0\\u10d8\\u10d6\\u10d0\\u10ea\\u10d8\\u10d0\",\"en\":\"Sign in\"}', 1, '2022-06-24 04:46:26', NULL, 1),
(48, 'sign-up', '{\"ge\":\"\\u10e0\\u10d4\\u10d2\\u10d8\\u10e1\\u10e2\\u10e0\\u10d0\\u10ea\\u10d8\\u10d0\",\"en\":\"Sign up\"}', 1, '2022-06-24 04:46:42', NULL, 1),
(81, 'sort_by', '{\"ge\":\"\\u10e1\\u10dd\\u10e0\\u10e2\\u10d8\\u10e0\\u10d4\\u10d1\\u10d0\",\"en\":\"Sort by\"}', 1, '2022-06-30 03:25:08', NULL, 1),
(114, 'status', '{\"ge\":\"\\u10e1\\u10e2\\u10d0\\u10e2\\u10e3\\u10e1\\u10d8\",\"en\":\"Status\"}', 1, '2022-07-07 04:59:09', NULL, 1),
(84, 'stock', '{\"ge\":\"\\u10db\\u10d0\\u10e0\\u10d0\\u10d2\\u10d8\",\"en\":\"Stock\"}', 1, '2022-07-07 03:29:14', NULL, 1),
(73, 'subscribe', '{\"ge\":\"\\u10d2\\u10d0\\u10db\\u10dd\\u10d8\\u10ec\\u10d4\\u10e0\\u10d4 \\u10e1\\u10d8\\u10d0\\u10ee\\u10da\\u10d4\\u10d4\\u10d1\\u10d8\",\"en\":\"Subscribe\"}', 1, '2022-06-30 03:13:56', NULL, 1),
(74, 'subscribe_button', '{\"ge\":\"\\u10d2\\u10d0\\u10db\\u10dd\\u10ec\\u10d4\\u10e0\\u10d0\",\"en\":\"Subscribe\"}', 1, '2022-06-30 03:14:16', NULL, 1),
(75, 'subscribe_email', '{\"ge\":\"\\u10d7\\u10e5\\u10d5\\u10d4\\u10dc\\u10d8 \\u10d4\\u10da \\u10e4\\u10dd\\u10e1\\u10e2\\u10d0\",\"en\":\"Your email\"}', 1, '2022-06-30 03:14:48', NULL, 1),
(136, 'subsctibe_required', '{\"ge\":\"\\u10d2\\u10d7\\u10ee\\u10dd\\u10d5\\u10d7 \\u10e8\\u10d4\\u10d8\\u10e7\\u10d5\\u10d0\\u10dc\\u10dd\\u10d7 \\u10d7\\u10e5\\u10d5\\u10d4\\u10dc\\u10d8 \\u10d4\\u10da-\\u10e4\\u10dd\\u10e1\\u10e2\\u10d0\",\"en\":\"Place enter your email\"}', 1, '2022-07-08 06:56:06', NULL, 1),
(137, 'subsctibe_success', '{\"ge\":\"\\u10db\\u10d0\\u10d3\\u10da\\u10dd\\u10d1\\u10d0 \\u10d2\\u10d0\\u10db\\u10dd\\u10ec\\u10d4\\u10e0\\u10d4\\u10e1\\u10d7\\u10d5\\u10d8\\u10e1\",\"en\":\"Thanks for subscribe\"}', 1, '2022-07-08 06:56:31', NULL, 1),
(55, 'sum', '{\"ge\":\"\\u10ef\\u10d0\\u10db\\u10d8\",\"en\":\"Sum\"}', 1, '2022-06-24 05:17:55', NULL, 1),
(66, 'terms', '{\"ge\":\"\\u10ec\\u10d4\\u10e1\\u10d4\\u10d1\\u10d8 \\u10d3\\u10d0 \\u10de\\u10d8\\u10e0\\u10dd\\u10d1\\u10d4\\u10d1\\u10d8\",\"en\":\"Terms and Conditions\"}', 1, '2022-06-30 02:49:48', NULL, 1),
(79, 'to', '{\"ge\":\"\\u10db\\u10d3\\u10d4\",\"en\":\"To\"}', 1, '2022-06-30 03:23:17', NULL, 1),
(122, 'total', '{\"ge\":\"\\u10ef\\u10d0\\u10db\\u10d8\",\"en\":\"Total\"}', 1, '2022-07-07 05:27:41', NULL, 1),
(108, 'update_password', '{\"ge\":\"\\u10de\\u10d0\\u10e0\\u10dd\\u10da\\u10d8\\u10e1 \\u10d2\\u10d0\\u10dc\\u10d0\\u10ee\\u10da\\u10d4\\u10d1\\u10d0\",\"en\":\"Update password\"}', 1, '2022-07-07 04:55:19', NULL, 1),
(27, 'used', '{\"ge\":\"\\u10db\\u10d4\\u10dd\\u10e0\\u10d0\\u10d3\\u10d8\",\"en\":\"Used\"}', 1, '2022-04-14 05:16:45', NULL, 1),
(111, 'user_bday', '{\"ge\":\"\\u10d3\\u10d0\\u10d1\\u10d0\\u10d3\\u10d4\\u10d1\\u10d8\\u10e1 \\u10d7\\u10d0\\u10e0\\u10d8\\u10e6\\u10d8\",\"en\":\"Birthday date\"}', 1, '2022-07-07 04:58:15', NULL, 1),
(30, 'user_email', '{\"ge\":\"\\u10d4\\u10da-\\u10e4\\u10dd\\u10e1\\u10e2\\u10d0\",\"en\":\"Email\"}', 1, '2022-04-19 10:26:07', NULL, 1),
(96, 'user_lastname', '{\"ge\":\"\\u10d2\\u10d5\\u10d0\\u10e0\\u10d8\",\"en\":\"Last name\"}', 1, '2022-07-07 04:23:45', NULL, 1),
(127, 'user_login_button', '{\"ge\":\"\\u10d0\\u10d5\\u10e2\\u10dd\\u10e0\\u10d8\\u10d6\\u10d0\\u10ea\\u10d8\\u10d0\",\"en\":\"Sign in\"}', 1, '2022-07-08 04:23:29', NULL, 1),
(94, 'user_name', '{\"ge\":\"\\u10e1\\u10d0\\u10ee\\u10d4\\u10da\\u10d8\",\"en\":\"Name\"}', 1, '2022-07-07 04:23:42', NULL, 1),
(99, 'user_password', '{\"ge\":\"\\u10de\\u10d0\\u10e0\\u10dd\\u10da\\u10d8\",\"en\":\"Password\"}', 1, '2022-07-07 04:16:01', NULL, 1),
(100, 'user_password_confirm', '{\"ge\":\"\\u10de\\u10d0\\u10e0\\u10dd\\u10da\\u10d8\\u10e1 \\u10d2\\u10d0\\u10dc\\u10db\\u10d4\\u10dd\\u10e0\\u10d4\\u10d1\\u10d0\",\"en\":\"Confirm password\"}', 1, '2022-07-07 04:16:38', NULL, 1),
(46, 'user_password_restore', '{\"ge\":\"\\u10de\\u10d0\\u10e0\\u10dd\\u10da\\u10d8\\u10e1 \\u10d0\\u10e6\\u10d3\\u10d2\\u10d4\\u10dc\\u10d0\",\"en\":\"Password reset\"}', 1, '2022-06-24 04:46:01', NULL, 1),
(97, 'user_personal_id', '{\"ge\":\"\\u10de\\u10d8\\u10e0\\u10d0\\u10d3\\u10d8 \\u10dc\\u10dd\\u10db\\u10d4\\u10e0\\u10d8\",\"en\":\"Personal number\"}', 1, '2022-07-07 04:13:36', NULL, 1),
(98, 'user_phone', '{\"ge\":\"\\u10e2\\u10d4\\u10da\\u10d4\\u10e4\\u10dd\\u10dc\\u10d8\\u10e1 \\u10dc\\u10dd\\u10db\\u10d4\\u10e0\\u10d8\",\"en\":\"User phone\"}', 1, '2022-07-07 04:15:41', NULL, 1),
(93, 'user_register_head', '{\"ge\":\"\\u10d0\\u10dc\\u10d2\\u10d0\\u10e0\\u10d8\\u10e8\\u10d8\\u10e1 \\u10e8\\u10d4\\u10e5\\u10db\\u10dc\\u10d0\",\"en\":\"Create an account\"}', 1, '2022-07-07 04:11:14', NULL, 1),
(130, 'user_registration_button', '{\"ge\":\"\\u10e0\\u10d4\\u10d2\\u10d8\\u10e1\\u10e2\\u10e0\\u10d0\\u10ea\\u10d8\\u10d0\",\"en\":\"Sign up\"}', 1, '2022-07-08 05:17:56', NULL, 1),
(125, 'user_remember_me', '{\"ge\":\"\\u10d3\\u10d0\\u10db\\u10d8\\u10db\\u10d0\\u10ee\\u10e1\\u10dd\\u10d5\\u10e0\\u10d4\",\"en\":\"Remember me\"}', 1, '2022-07-08 04:21:57', NULL, 1),
(101, 'user_terms', '{\"ge\":\"\\u10d5\\u10d4\\u10d7\\u10d0\\u10dc\\u10ee\\u10db\\u10d4\\u10d1\\u10d8 \\u10ec\\u10d4\\u10e1\\u10d4\\u10d1\\u10e1 \\u10d3\\u10d0 \\u10de\\u10d8\\u10e0\\u10dd\\u10d1\\u10d4\\u10d1\\u10e1\",\"en\":\"I agree to the terms and conditions\"}', 1, '2022-07-07 04:17:24', NULL, 1),
(124, 'vendor', '{\"ge\":\"\\u10d5\\u10d4\\u10dc\\u10d3\\u10dd\\u10e0\\u10d8\",\"en\":\"Vendor\"}', 1, '2022-07-07 08:15:53', NULL, 1),
(67, 'vendors', '{\"ge\":\"\\u10d5\\u10d4\\u10dc\\u10d3\\u10dd\\u10e0\\u10d4\\u10d8\",\"en\":\"Vendors\"}', 1, '2022-06-30 02:50:16', NULL, 1),
(68, 'vendors_guide', '{\"ge\":\"\\u10d5\\u10d4\\u10dc\\u10d3\\u10dd\\u10e0\\u10d4\\u10d1\\u10d8\\u10e1 \\u10d2\\u10d8\\u10d3\\u10d8\",\"en\":\"Vendors guide\"}', 1, '2022-06-30 02:50:45', NULL, 1),
(70, 'wishlist', '{\"ge\":\"\\u10e1\\u10e3\\u10e0\\u10d5\\u10d8\\u10da\\u10d4\\u10d1\\u10d8\\u10e1 \\u10e1\\u10d8\\u10d0\",\"en\":\"Wishlist\"}', 1, '2022-06-30 02:52:03', NULL, 1),
(89, 'wishlist_is_empty', '{\"ge\":\"\\u10e1\\u10e3\\u10e0\\u10d5\\u10d8\\u10da\\u10d4\\u10d1\\u10d8\\u10e1 \\u10e1\\u10d8\\u10d0 \\u10ea\\u10d0\\u10e0\\u10d8\\u10d4\\u10da\\u10d8\\u10d0\",\"en\":\"Wishlist is empty\"}', 1, '2022-07-07 03:54:23', NULL, 1),
(15, 'working_hours', '{\"ge\":\"სამუშაო საათები\",\"en\":\"Working hours\"}', 1, '2022-01-31 08:24:45', NULL, 1),
(139, 'write_us', '{\"ge\":\"\\u10db\\u10dd\\u10d2\\u10d5\\u10ec\\u10d4\\u10e0\\u10d4\\u10d7\",\"en\":\"Write us\"}', 1, '2022-07-08 07:02:49', NULL, 1),
(45, 'your_cart_is_empty', '{\"ge\":\"\\u10d7\\u10e5\\u10d5\\u10d4\\u10dc\\u10d8 \\u10d9\\u10d0\\u10da\\u10d0\\u10d7\\u10d0 \\u10ea\\u10d0\\u10e0\\u10d8\\u10d4\\u10da\\u10d8\\u10d0\",\"en\":\"Your cart is empty\"}', 1, '2022-06-24 04:39:34', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_users`
--

CREATE TABLE `new_users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `new_users`
--

INSERT INTO `new_users` (`id`, `name`, `lastname`, `phone`, `email`, `password`, `active`, `remember_token`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(1, 'მიტო', 'ჩიხლაძე', '599002452', 'chikhladze.mt@gmail.com', '$2y$10$yfy9rrmaooYMLVpMfDSss.cY2/KrW2QPL6MhycHX.keXQTznbJ9xe', 1, 'QLrHOdAmK2pvdQXVREeAuAHyO8yipFU7gCOXkJ5lBYo9TcHMKRvhOy5tDZFF', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_webparameters`
--

CREATE TABLE `new_webparameters` (
  `id` int NOT NULL,
  `host` varchar(50) NOT NULL,
  `name_ge` varchar(100) DEFAULT NULL,
  `name_en` varchar(100) DEFAULT NULL,
  `logotype` varchar(255) DEFAULT NULL,
  `google_auth` int DEFAULT NULL,
  `google_auth_key` varchar(255) DEFAULT NULL,
  `fb_auth` int DEFAULT NULL,
  `fb_auth_key` varchar(255) DEFAULT NULL,
  `smsoffice` varchar(100) DEFAULT NULL,
  `vendor_id` int DEFAULT NULL,
  `active` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_webparameters`
--

INSERT INTO `new_webparameters` (`id`, `host`, `name_ge`, `name_en`, `logotype`, `google_auth`, `google_auth_key`, `fb_auth`, `fb_auth_key`, `smsoffice`, `vendor_id`, `active`, `created_at`, `updated_at`, `deleted_at`, `deleted_at_int`) VALUES
(1, 'maverick.mallline.ge', 'Nikaragua123', 'Nikaragua', '4a28aeecc213c997f33c23ca388acbdd.png', 2, '55555', 2, 'asdasdasd', 'b7a41cb33e014860ae0363cd091206fc', NULL, 1, '2022-09-12 12:05:48', '2022-10-04 14:06:44', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_wishlist`
--

CREATE TABLE `new_wishlist` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_at_int` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `new_basic_parameters`
--
ALTER TABLE `new_basic_parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_companies`
--
ALTER TABLE `new_companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `new_compare`
--
ALTER TABLE `new_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_customers`
--
ALTER TABLE `new_customers`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `personal_number` (`personal_number`,`phone`,`email`);

--
-- Indexes for table `new_delivery_parameters`
--
ALTER TABLE `new_delivery_parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_delivery_streets`
--
ALTER TABLE `new_delivery_streets`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `new_info_parameters`
--
ALTER TABLE `new_info_parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_navigation`
--
ALTER TABLE `new_navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_orders`
--
ALTER TABLE `new_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_order_actions`
--
ALTER TABLE `new_order_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_payments`
--
ALTER TABLE `new_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_payment_category`
--
ALTER TABLE `new_payment_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_permissions`
--
ALTER TABLE `new_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `new_plugin_parameters`
--
ALTER TABLE `new_plugin_parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_products`
--
ALTER TABLE `new_products`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `new_product_category`
--
ALTER TABLE `new_product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_product_count_log`
--
ALTER TABLE `new_product_count_log`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `new_product_count_log_item`
--
ALTER TABLE `new_product_count_log_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_product_gallery`
--
ALTER TABLE `new_product_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_product_meta`
--
ALTER TABLE `new_product_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_product_price`
--
ALTER TABLE `new_product_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_product_statuses`
--
ALTER TABLE `new_product_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_product_vendors`
--
ALTER TABLE `new_product_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_seo_parameters`
--
ALTER TABLE `new_seo_parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_slider`
--
ALTER TABLE `new_slider`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `new_social_facebook_accounts`
--
ALTER TABLE `new_social_facebook_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_social_google_accounts`
--
ALTER TABLE `new_social_google_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_social_parameters`
--
ALTER TABLE `new_social_parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_text_pages`
--
ALTER TABLE `new_text_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_translate_parameters`
--
ALTER TABLE `new_translate_parameters`
  ADD UNIQUE KEY `key` (`key`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `new_users`
--
ALTER TABLE `new_users`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `new_webparameters`
--
ALTER TABLE `new_webparameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_wishlist`
--
ALTER TABLE `new_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `new_basic_parameters`
--
ALTER TABLE `new_basic_parameters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `new_companies`
--
ALTER TABLE `new_companies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `new_compare`
--
ALTER TABLE `new_compare`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `new_customers`
--
ALTER TABLE `new_customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `new_delivery_parameters`
--
ALTER TABLE `new_delivery_parameters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `new_delivery_streets`
--
ALTER TABLE `new_delivery_streets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `new_info_parameters`
--
ALTER TABLE `new_info_parameters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `new_navigation`
--
ALTER TABLE `new_navigation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `new_orders`
--
ALTER TABLE `new_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_order_actions`
--
ALTER TABLE `new_order_actions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `new_payments`
--
ALTER TABLE `new_payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `new_payment_category`
--
ALTER TABLE `new_payment_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `new_permissions`
--
ALTER TABLE `new_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `new_plugin_parameters`
--
ALTER TABLE `new_plugin_parameters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `new_products`
--
ALTER TABLE `new_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `new_product_category`
--
ALTER TABLE `new_product_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `new_product_count_log`
--
ALTER TABLE `new_product_count_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `new_product_count_log_item`
--
ALTER TABLE `new_product_count_log_item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `new_product_gallery`
--
ALTER TABLE `new_product_gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `new_product_meta`
--
ALTER TABLE `new_product_meta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `new_product_price`
--
ALTER TABLE `new_product_price`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `new_product_statuses`
--
ALTER TABLE `new_product_statuses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `new_product_vendors`
--
ALTER TABLE `new_product_vendors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `new_seo_parameters`
--
ALTER TABLE `new_seo_parameters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `new_slider`
--
ALTER TABLE `new_slider`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `new_social_facebook_accounts`
--
ALTER TABLE `new_social_facebook_accounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `new_social_google_accounts`
--
ALTER TABLE `new_social_google_accounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_social_parameters`
--
ALTER TABLE `new_social_parameters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `new_text_pages`
--
ALTER TABLE `new_text_pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `new_translate_parameters`
--
ALTER TABLE `new_translate_parameters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `new_users`
--
ALTER TABLE `new_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `new_webparameters`
--
ALTER TABLE `new_webparameters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `new_wishlist`
--
ALTER TABLE `new_wishlist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
