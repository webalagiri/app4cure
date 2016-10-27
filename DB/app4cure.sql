-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2016 at 10:32 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `app4cure`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
`id` int(10) unsigned NOT NULL,
  `area_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area_pincode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` int(10) unsigned NOT NULL,
  `state` int(10) unsigned NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `city_status` tinyint(4) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `modified_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
`id` int(10) unsigned NOT NULL,
  `city_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` int(10) unsigned NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `city_status` tinyint(4) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `modified_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
`id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonecode` int(11) NOT NULL,
  `country_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `area` int(10) unsigned NOT NULL,
  `city` int(10) unsigned NOT NULL,
  `state` int(10) unsigned NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `pincode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
`id` int(10) unsigned NOT NULL,
  `doctor_id` int(10) unsigned NOT NULL,
  `doctor_specialty_id` int(10) unsigned NOT NULL,
  `doctor_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doctor_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doctor_qualification` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doctor_experience` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `area` int(10) unsigned NOT NULL,
  `city` int(10) unsigned NOT NULL,
  `state` int(10) unsigned NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `pincode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hospital_logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doctor_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_specialty`
--

CREATE TABLE IF NOT EXISTS `doctor_specialty` (
`id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE IF NOT EXISTS `hospital` (
`id` int(10) unsigned NOT NULL,
  `hospital_id` int(10) unsigned NOT NULL,
  `hospital_type_id` int(10) unsigned NOT NULL,
  `hospital_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hospital_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `area` int(10) unsigned NOT NULL,
  `city` int(10) unsigned NOT NULL,
  `state` int(10) unsigned NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `pincode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hospital_logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hospital_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hospital_contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hospital_contact_mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_type`
--

CREATE TABLE IF NOT EXISTS `hospital_type` (
`id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE IF NOT EXISTS `laboratory` (
`id` int(10) unsigned NOT NULL,
  `laboratory_id` int(10) unsigned NOT NULL,
  `laboratory_type_id` int(10) unsigned NOT NULL,
  `laboratory_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `laboratory_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `area` int(10) unsigned NOT NULL,
  `city` int(10) unsigned NOT NULL,
  `state` int(10) unsigned NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `pincode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `laboratory_logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `laboratory_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `laboratory_contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `laboratory_contact_mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_tests`
--

CREATE TABLE IF NOT EXISTS `laboratory_tests` (
`id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_tests_link`
--

CREATE TABLE IF NOT EXISTS `laboratory_tests_link` (
`id` int(10) unsigned NOT NULL,
  `laboratory_id` int(10) unsigned NOT NULL,
  `laboratory_tests_id` int(10) unsigned NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_type`
--

CREATE TABLE IF NOT EXISTS `laboratory_type` (
`id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_10_21_092118_entrust_setup_tables', 2),
('2016_10_21_110000_countries', 3),
('2016_10_21_110011_states', 3),
('2016_10_21_110022_cities', 3),
('2016_10_21_110033_areas', 3),
('2016_10_27_060348_customer', 3),
('2016_10_27_061532_hospital_type', 3),
('2016_10_27_061709_hospital', 3),
('2016_10_27_062122_doctor_specialty', 3),
('2016_10_27_062230_doctor', 3),
('2016_10_27_070313_laboratory_type', 3),
('2016_10_27_070438_laboratory_tests', 3),
('2016_10_27_070541_laboratory', 3),
('2016_10_27_071512_laboratory_tests_link', 3),
('2016_10_27_071654_pharmacy_type', 3),
('2016_10_27_071827_pharmacy', 3),
('2016_10_27_071906_pharmacy_medicine_type', 3),
('2016_10_27_072002_pharmacy_medicine', 3),
('2016_10_27_073542_pharmacy_product', 3),
('2016_10_27_082130_vendor_product_brand', 4),
('2016_10_27_082252_vendor_product_category', 4),
('2016_10_27_082513_vendor_product_master', 4),
('2016_10_27_082750_vendor', 4),
('2016_10_27_082922_vendor_product_sale', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE IF NOT EXISTS `pharmacy` (
`id` int(10) unsigned NOT NULL,
  `pharmacy_id` int(10) unsigned NOT NULL,
  `pharmacy_type_id` int(10) unsigned NOT NULL,
  `pharmacy_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pharmacy_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `area` int(10) unsigned NOT NULL,
  `city` int(10) unsigned NOT NULL,
  `state` int(10) unsigned NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `pincode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pharmacy_logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pharmacy_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pharmacy_contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pharmacy_contact_mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_medicine`
--

CREATE TABLE IF NOT EXISTS `pharmacy_medicine` (
`id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pharmacy_medicine_type_id` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_medicine_type`
--

CREATE TABLE IF NOT EXISTS `pharmacy_medicine_type` (
`id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_product`
--

CREATE TABLE IF NOT EXISTS `pharmacy_product` (
`id` int(10) unsigned NOT NULL,
  `pharmacy_medicine_id` int(10) unsigned NOT NULL,
  `pharmacy_id` int(10) unsigned NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mrp_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `offer_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `availability` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `min_order` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_order` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_type`
--

CREATE TABLE IF NOT EXISTS `pharmacy_type` (
`id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', NULL, NULL),
(2, 'hotel', 'Hotel', 'Hotel', NULL, NULL),
(3, 'customer', 'Customer', 'Customer', NULL, NULL),
(4, 'support', 'Support', 'Support', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `states_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@hotelportal.com', 'admin', NULL, NULL, NULL),
(2, 'kfc', 'kfc@hotelportal.com', 'kfc', NULL, NULL, NULL),
(3, 'subway', 'subway@hotelportal.com', 'subway', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
`id` int(10) unsigned NOT NULL,
  `vendor_id` int(10) unsigned NOT NULL,
  `vendor_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vendor_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `area` int(10) unsigned NOT NULL,
  `city` int(10) unsigned NOT NULL,
  `state` int(10) unsigned NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `pincode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vendor_logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendor_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendor_contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vendor_contact_mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_product_brand`
--

CREATE TABLE IF NOT EXISTS `vendor_product_brand` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_product_category`
--

CREATE TABLE IF NOT EXISTS `vendor_product_category` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_product_master`
--

CREATE TABLE IF NOT EXISTS `vendor_product_master` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_product_sale`
--

CREATE TABLE IF NOT EXISTS `vendor_product_sale` (
`id` int(10) unsigned NOT NULL,
  `vendor_product_id` int(10) unsigned NOT NULL,
  `vendor_id` int(10) unsigned NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mrp_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `offer_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `availability` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `min_order` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_order` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
 ADD PRIMARY KEY (`id`), ADD KEY `areas_country_foreign` (`country`), ADD KEY `areas_state_foreign` (`state`), ADD KEY `areas_city_foreign` (`city`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
 ADD PRIMARY KEY (`id`), ADD KEY `cities_country_foreign` (`country`), ADD KEY `cities_state_foreign` (`state`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id`), ADD KEY `customer_customer_id_foreign` (`customer_id`), ADD KEY `customer_area_foreign` (`area`), ADD KEY `customer_city_foreign` (`city`), ADD KEY `customer_state_foreign` (`state`), ADD KEY `customer_country_foreign` (`country`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
 ADD PRIMARY KEY (`id`), ADD KEY `doctor_doctor_id_foreign` (`doctor_id`), ADD KEY `doctor_doctor_specialty_id_foreign` (`doctor_specialty_id`), ADD KEY `doctor_area_foreign` (`area`), ADD KEY `doctor_city_foreign` (`city`), ADD KEY `doctor_state_foreign` (`state`), ADD KEY `doctor_country_foreign` (`country`);

--
-- Indexes for table `doctor_specialty`
--
ALTER TABLE `doctor_specialty`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
 ADD PRIMARY KEY (`id`), ADD KEY `hospital_hospital_id_foreign` (`hospital_id`), ADD KEY `hospital_hospital_type_id_foreign` (`hospital_type_id`), ADD KEY `hospital_area_foreign` (`area`), ADD KEY `hospital_city_foreign` (`city`), ADD KEY `hospital_state_foreign` (`state`), ADD KEY `hospital_country_foreign` (`country`);

--
-- Indexes for table `hospital_type`
--
ALTER TABLE `hospital_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
 ADD PRIMARY KEY (`id`), ADD KEY `laboratory_laboratory_id_foreign` (`laboratory_id`), ADD KEY `laboratory_laboratory_type_id_foreign` (`laboratory_type_id`), ADD KEY `laboratory_area_foreign` (`area`), ADD KEY `laboratory_city_foreign` (`city`), ADD KEY `laboratory_state_foreign` (`state`), ADD KEY `laboratory_country_foreign` (`country`);

--
-- Indexes for table `laboratory_tests`
--
ALTER TABLE `laboratory_tests`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratory_tests_link`
--
ALTER TABLE `laboratory_tests_link`
 ADD PRIMARY KEY (`id`), ADD KEY `laboratory_tests_link_laboratory_id_foreign` (`laboratory_id`), ADD KEY `laboratory_tests_link_laboratory_tests_id_foreign` (`laboratory_tests_id`);

--
-- Indexes for table `laboratory_type`
--
ALTER TABLE `laboratory_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
 ADD PRIMARY KEY (`permission_id`,`role_id`), ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
 ADD PRIMARY KEY (`id`), ADD KEY `pharmacy_pharmacy_id_foreign` (`pharmacy_id`), ADD KEY `pharmacy_pharmacy_type_id_foreign` (`pharmacy_type_id`), ADD KEY `pharmacy_area_foreign` (`area`), ADD KEY `pharmacy_city_foreign` (`city`), ADD KEY `pharmacy_state_foreign` (`state`), ADD KEY `pharmacy_country_foreign` (`country`);

--
-- Indexes for table `pharmacy_medicine`
--
ALTER TABLE `pharmacy_medicine`
 ADD PRIMARY KEY (`id`), ADD KEY `pharmacy_medicine_pharmacy_medicine_type_id_foreign` (`pharmacy_medicine_type_id`);

--
-- Indexes for table `pharmacy_medicine_type`
--
ALTER TABLE `pharmacy_medicine_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_product`
--
ALTER TABLE `pharmacy_product`
 ADD PRIMARY KEY (`id`), ADD KEY `pharmacy_product_pharmacy_medicine_id_foreign` (`pharmacy_medicine_id`), ADD KEY `pharmacy_product_pharmacy_id_foreign` (`pharmacy_id`);

--
-- Indexes for table `pharmacy_type`
--
ALTER TABLE `pharmacy_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
 ADD PRIMARY KEY (`user_id`,`role_id`), ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
 ADD PRIMARY KEY (`id`), ADD KEY `states_country_foreign` (`country`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
 ADD PRIMARY KEY (`id`), ADD KEY `vendor_vendor_id_foreign` (`vendor_id`), ADD KEY `vendor_area_foreign` (`area`), ADD KEY `vendor_city_foreign` (`city`), ADD KEY `vendor_state_foreign` (`state`), ADD KEY `vendor_country_foreign` (`country`);

--
-- Indexes for table `vendor_product_brand`
--
ALTER TABLE `vendor_product_brand`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_product_category`
--
ALTER TABLE `vendor_product_category`
 ADD PRIMARY KEY (`id`), ADD KEY `vendor_product_category_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `vendor_product_master`
--
ALTER TABLE `vendor_product_master`
 ADD PRIMARY KEY (`id`), ADD KEY `vendor_product_master_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `vendor_product_sale`
--
ALTER TABLE `vendor_product_sale`
 ADD PRIMARY KEY (`id`), ADD KEY `vendor_product_sale_vendor_product_id_foreign` (`vendor_product_id`), ADD KEY `vendor_product_sale_vendor_id_foreign` (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doctor_specialty`
--
ALTER TABLE `doctor_specialty`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hospital_type`
--
ALTER TABLE `hospital_type`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `laboratory`
--
ALTER TABLE `laboratory`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `laboratory_tests`
--
ALTER TABLE `laboratory_tests`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `laboratory_tests_link`
--
ALTER TABLE `laboratory_tests_link`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `laboratory_type`
--
ALTER TABLE `laboratory_type`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pharmacy_medicine`
--
ALTER TABLE `pharmacy_medicine`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pharmacy_medicine_type`
--
ALTER TABLE `pharmacy_medicine_type`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pharmacy_product`
--
ALTER TABLE `pharmacy_product`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pharmacy_type`
--
ALTER TABLE `pharmacy_type`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vendor_product_brand`
--
ALTER TABLE `vendor_product_brand`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vendor_product_category`
--
ALTER TABLE `vendor_product_category`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vendor_product_master`
--
ALTER TABLE `vendor_product_master`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vendor_product_sale`
--
ALTER TABLE `vendor_product_sale`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
ADD CONSTRAINT `areas_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `areas_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `areas_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
ADD CONSTRAINT `cities_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `cities_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
ADD CONSTRAINT `customer_area_foreign` FOREIGN KEY (`area`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `customer_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `customer_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `customer_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `customer_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
ADD CONSTRAINT `doctor_area_foreign` FOREIGN KEY (`area`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `doctor_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `doctor_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `doctor_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `doctor_doctor_specialty_id_foreign` FOREIGN KEY (`doctor_specialty_id`) REFERENCES `doctor_specialty` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `doctor_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hospital`
--
ALTER TABLE `hospital`
ADD CONSTRAINT `hospital_area_foreign` FOREIGN KEY (`area`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `hospital_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `hospital_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `hospital_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `hospital_hospital_type_id_foreign` FOREIGN KEY (`hospital_type_id`) REFERENCES `hospital_type` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `hospital_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `laboratory`
--
ALTER TABLE `laboratory`
ADD CONSTRAINT `laboratory_area_foreign` FOREIGN KEY (`area`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `laboratory_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `laboratory_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `laboratory_laboratory_id_foreign` FOREIGN KEY (`laboratory_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `laboratory_laboratory_type_id_foreign` FOREIGN KEY (`laboratory_type_id`) REFERENCES `laboratory_type` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `laboratory_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `laboratory_tests_link`
--
ALTER TABLE `laboratory_tests_link`
ADD CONSTRAINT `laboratory_tests_link_laboratory_id_foreign` FOREIGN KEY (`laboratory_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `laboratory_tests_link_laboratory_tests_id_foreign` FOREIGN KEY (`laboratory_tests_id`) REFERENCES `laboratory_tests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pharmacy`
--
ALTER TABLE `pharmacy`
ADD CONSTRAINT `pharmacy_area_foreign` FOREIGN KEY (`area`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `pharmacy_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `pharmacy_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `pharmacy_pharmacy_id_foreign` FOREIGN KEY (`pharmacy_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `pharmacy_pharmacy_type_id_foreign` FOREIGN KEY (`pharmacy_type_id`) REFERENCES `pharmacy_type` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `pharmacy_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pharmacy_medicine`
--
ALTER TABLE `pharmacy_medicine`
ADD CONSTRAINT `pharmacy_medicine_pharmacy_medicine_type_id_foreign` FOREIGN KEY (`pharmacy_medicine_type_id`) REFERENCES `pharmacy_medicine_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pharmacy_product`
--
ALTER TABLE `pharmacy_product`
ADD CONSTRAINT `pharmacy_product_pharmacy_id_foreign` FOREIGN KEY (`pharmacy_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `pharmacy_product_pharmacy_medicine_id_foreign` FOREIGN KEY (`pharmacy_medicine_id`) REFERENCES `pharmacy_medicine` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
ADD CONSTRAINT `states_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor`
--
ALTER TABLE `vendor`
ADD CONSTRAINT `vendor_area_foreign` FOREIGN KEY (`area`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `vendor_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `vendor_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `vendor_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `vendor_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_product_category`
--
ALTER TABLE `vendor_product_category`
ADD CONSTRAINT `vendor_product_category_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `vendor_product_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_product_master`
--
ALTER TABLE `vendor_product_master`
ADD CONSTRAINT `vendor_product_master_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `vendor_product_brand` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_product_sale`
--
ALTER TABLE `vendor_product_sale`
ADD CONSTRAINT `vendor_product_sale_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `vendor_product_sale_vendor_product_id_foreign` FOREIGN KEY (`vendor_product_id`) REFERENCES `vendor_product_master` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
