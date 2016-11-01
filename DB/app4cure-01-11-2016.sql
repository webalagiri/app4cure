/*
SQLyog Ultimate v8.82 
MySQL - 5.6.20 : Database - app4cure
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`app4cure` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `app4cure`;

/*Table structure for table `areas` */

DROP TABLE IF EXISTS `areas`;

CREATE TABLE `areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area_pincode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` int(10) unsigned NOT NULL,
  `state` int(10) unsigned NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `city_status` tinyint(4) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `modified_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `areas_country_foreign` (`country`),
  KEY `areas_state_foreign` (`state`),
  KEY `areas_city_foreign` (`city`),
  CONSTRAINT `areas_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `areas_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `areas_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `areas` */

/*Table structure for table `cities` */

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` int(10) unsigned NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `city_status` tinyint(4) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `modified_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_country_foreign` (`country`),
  KEY `cities_state_foreign` (`state`),
  CONSTRAINT `cities_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cities_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cities` */

/*Table structure for table `countries` */

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonecode` int(11) NOT NULL,
  `country_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `countries` */

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `area` int(10) unsigned DEFAULT NULL,
  `city` int(10) unsigned DEFAULT NULL,
  `state` int(10) unsigned DEFAULT NULL,
  `country` int(10) unsigned DEFAULT NULL,
  `pincode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_customer_id_foreign` (`customer_id`),
  KEY `customer_area_foreign` (`area`),
  KEY `customer_city_foreign` (`city`),
  KEY `customer_state_foreign` (`state`),
  KEY `customer_country_foreign` (`country`),
  CONSTRAINT `customer_area_foreign` FOREIGN KEY (`area`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `customer_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `customer_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `customer_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `customer_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `customer` */

insert  into `customer`(`id`,`customer_id`,`customer_name`,`address`,`area`,`city`,`state`,`country`,`pincode`,`telephone`,`email`,`customer_photo`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (2,30,'VimalAlagiri',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'vimalalagiri@gmail.com',NULL,'100','100','2016-11-01 13:00:50','2016-11-01 13:00:50');

/*Table structure for table `doctor` */

DROP TABLE IF EXISTS `doctor`;

CREATE TABLE `doctor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctor_doctor_id_foreign` (`doctor_id`),
  KEY `doctor_doctor_specialty_id_foreign` (`doctor_specialty_id`),
  KEY `doctor_area_foreign` (`area`),
  KEY `doctor_city_foreign` (`city`),
  KEY `doctor_state_foreign` (`state`),
  KEY `doctor_country_foreign` (`country`),
  CONSTRAINT `doctor_area_foreign` FOREIGN KEY (`area`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `doctor_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `doctor_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `doctor_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `doctor_doctor_specialty_id_foreign` FOREIGN KEY (`doctor_specialty_id`) REFERENCES `doctor_specialty` (`id`) ON DELETE CASCADE,
  CONSTRAINT `doctor_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `doctor` */

/*Table structure for table `doctor_specialty` */

DROP TABLE IF EXISTS `doctor_specialty`;

CREATE TABLE `doctor_specialty` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `doctor_specialty` */

/*Table structure for table `hospital` */

DROP TABLE IF EXISTS `hospital`;

CREATE TABLE `hospital` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hospital_hospital_id_foreign` (`hospital_id`),
  KEY `hospital_hospital_type_id_foreign` (`hospital_type_id`),
  KEY `hospital_area_foreign` (`area`),
  KEY `hospital_city_foreign` (`city`),
  KEY `hospital_state_foreign` (`state`),
  KEY `hospital_country_foreign` (`country`),
  CONSTRAINT `hospital_area_foreign` FOREIGN KEY (`area`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `hospital_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `hospital_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `hospital_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `hospital_hospital_type_id_foreign` FOREIGN KEY (`hospital_type_id`) REFERENCES `hospital_type` (`id`) ON DELETE CASCADE,
  CONSTRAINT `hospital_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `hospital` */

/*Table structure for table `hospital_type` */

DROP TABLE IF EXISTS `hospital_type`;

CREATE TABLE `hospital_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `hospital_type` */

/*Table structure for table `laboratory` */

DROP TABLE IF EXISTS `laboratory`;

CREATE TABLE `laboratory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `laboratory_laboratory_id_foreign` (`laboratory_id`),
  KEY `laboratory_laboratory_type_id_foreign` (`laboratory_type_id`),
  KEY `laboratory_area_foreign` (`area`),
  KEY `laboratory_city_foreign` (`city`),
  KEY `laboratory_state_foreign` (`state`),
  KEY `laboratory_country_foreign` (`country`),
  CONSTRAINT `laboratory_area_foreign` FOREIGN KEY (`area`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laboratory_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laboratory_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laboratory_laboratory_id_foreign` FOREIGN KEY (`laboratory_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laboratory_laboratory_type_id_foreign` FOREIGN KEY (`laboratory_type_id`) REFERENCES `laboratory_type` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laboratory_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `laboratory` */

/*Table structure for table `laboratory_tests` */

DROP TABLE IF EXISTS `laboratory_tests`;

CREATE TABLE `laboratory_tests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `laboratory_tests` */

/*Table structure for table `laboratory_tests_link` */

DROP TABLE IF EXISTS `laboratory_tests_link`;

CREATE TABLE `laboratory_tests_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `laboratory_id` int(10) unsigned NOT NULL,
  `laboratory_tests_id` int(10) unsigned NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `laboratory_tests_link_laboratory_id_foreign` (`laboratory_id`),
  KEY `laboratory_tests_link_laboratory_tests_id_foreign` (`laboratory_tests_id`),
  CONSTRAINT `laboratory_tests_link_laboratory_id_foreign` FOREIGN KEY (`laboratory_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `laboratory_tests_link_laboratory_tests_id_foreign` FOREIGN KEY (`laboratory_tests_id`) REFERENCES `laboratory_tests` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `laboratory_tests_link` */

/*Table structure for table `laboratory_type` */

DROP TABLE IF EXISTS `laboratory_type`;

CREATE TABLE `laboratory_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `laboratory_type` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_10_21_092118_entrust_setup_tables',2),('2016_10_21_110000_countries',3),('2016_10_21_110011_states',3),('2016_10_21_110022_cities',3),('2016_10_21_110033_areas',3),('2016_10_27_060348_customer',3),('2016_10_27_061532_hospital_type',3),('2016_10_27_061709_hospital',3),('2016_10_27_062122_doctor_specialty',3),('2016_10_27_062230_doctor',3),('2016_10_27_070313_laboratory_type',3),('2016_10_27_070438_laboratory_tests',3),('2016_10_27_070541_laboratory',3),('2016_10_27_071512_laboratory_tests_link',3),('2016_10_27_071654_pharmacy_type',3),('2016_10_27_071827_pharmacy',3),('2016_10_27_071906_pharmacy_medicine_type',3),('2016_10_27_072002_pharmacy_medicine',3),('2016_10_27_073542_pharmacy_product',3),('2016_10_27_082130_vendor_product_brand',4),('2016_10_27_082252_vendor_product_category',4),('2016_10_27_082513_vendor_product_master',4),('2016_10_27_082750_vendor',4),('2016_10_27_082922_vendor_product_sale',4);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `permission_role` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `permissions` */

/*Table structure for table `pharmacy` */

DROP TABLE IF EXISTS `pharmacy`;

CREATE TABLE `pharmacy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pharmacy_pharmacy_id_foreign` (`pharmacy_id`),
  KEY `pharmacy_pharmacy_type_id_foreign` (`pharmacy_type_id`),
  KEY `pharmacy_area_foreign` (`area`),
  KEY `pharmacy_city_foreign` (`city`),
  KEY `pharmacy_state_foreign` (`state`),
  KEY `pharmacy_country_foreign` (`country`),
  CONSTRAINT `pharmacy_area_foreign` FOREIGN KEY (`area`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pharmacy_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pharmacy_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pharmacy_pharmacy_id_foreign` FOREIGN KEY (`pharmacy_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pharmacy_pharmacy_type_id_foreign` FOREIGN KEY (`pharmacy_type_id`) REFERENCES `pharmacy_type` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pharmacy_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pharmacy` */

/*Table structure for table `pharmacy_medicine` */

DROP TABLE IF EXISTS `pharmacy_medicine`;

CREATE TABLE `pharmacy_medicine` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pharmacy_medicine_type_id` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pharmacy_medicine_pharmacy_medicine_type_id_foreign` (`pharmacy_medicine_type_id`),
  CONSTRAINT `pharmacy_medicine_pharmacy_medicine_type_id_foreign` FOREIGN KEY (`pharmacy_medicine_type_id`) REFERENCES `pharmacy_medicine_type` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pharmacy_medicine` */

/*Table structure for table `pharmacy_medicine_type` */

DROP TABLE IF EXISTS `pharmacy_medicine_type`;

CREATE TABLE `pharmacy_medicine_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pharmacy_medicine_type` */

/*Table structure for table `pharmacy_product` */

DROP TABLE IF EXISTS `pharmacy_product`;

CREATE TABLE `pharmacy_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pharmacy_product_pharmacy_medicine_id_foreign` (`pharmacy_medicine_id`),
  KEY `pharmacy_product_pharmacy_id_foreign` (`pharmacy_id`),
  CONSTRAINT `pharmacy_product_pharmacy_id_foreign` FOREIGN KEY (`pharmacy_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pharmacy_product_pharmacy_medicine_id_foreign` FOREIGN KEY (`pharmacy_medicine_id`) REFERENCES `pharmacy_medicine` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pharmacy_product` */

/*Table structure for table `pharmacy_type` */

DROP TABLE IF EXISTS `pharmacy_type`;

CREATE TABLE `pharmacy_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pharmacy_type` */

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`user_id`,`role_id`) values (1,1),(21,2),(30,2);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'admin','Admin','Admin',NULL,NULL),(2,'customer','Customer','Customer',NULL,NULL),(3,'hospital','Hospital','Hospital',NULL,NULL),(4,'doctor','Doctor','Doctor',NULL,NULL),(5,'laboratory','Laboratory','Laboratory',NULL,NULL),(6,'pharmacy','Pharmacy','Pharmacy',NULL,NULL),(7,'vendor','Vendor','Vendor',NULL,NULL);

/*Table structure for table `states` */

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `states_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `states_country_foreign` (`country`),
  CONSTRAINT `states_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `states` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'admin','admin@app4cure.co.in','$2y$10$agkPButi.quW016NgCUoU.X10haUlrsCh36XOS3sKbK9Cb6Afx0Mq',NULL,NULL,NULL),(21,'Alagirivimal','alagirivimal@gmail.com','$2y$10$agkPButi.quW016NgCUoU.X10haUlrsCh36XOS3sKbK9Cb6Afx0Mq','K57zIvZ53P8IXcpqp2OsVjlb38oKhuQke7x1YD8pDZTDgwukZJiHvGMifIVM','2016-11-01 12:07:47','2016-11-01 12:48:14'),(30,'VimalAlagiri','vimalalagiri@gmail.com','$2y$10$gz0BdNvZg5ljQsQHGUsCiOK8jd8Ok/hlzzdKt7Ydu9qMj/D18xhBi',NULL,'2016-11-01 13:00:50','2016-11-01 13:00:50');

/*Table structure for table `vendor` */

DROP TABLE IF EXISTS `vendor`;

CREATE TABLE `vendor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vendor_vendor_id_foreign` (`vendor_id`),
  KEY `vendor_area_foreign` (`area`),
  KEY `vendor_city_foreign` (`city`),
  KEY `vendor_state_foreign` (`state`),
  KEY `vendor_country_foreign` (`country`),
  CONSTRAINT `vendor_area_foreign` FOREIGN KEY (`area`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `vendor_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `vendor_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `vendor_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE,
  CONSTRAINT `vendor_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `vendor` */

/*Table structure for table `vendor_product_brand` */

DROP TABLE IF EXISTS `vendor_product_brand`;

CREATE TABLE `vendor_product_brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `vendor_product_brand` */

/*Table structure for table `vendor_product_category` */

DROP TABLE IF EXISTS `vendor_product_category`;

CREATE TABLE `vendor_product_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vendor_product_category_parent_id_foreign` (`parent_id`),
  CONSTRAINT `vendor_product_category_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `vendor_product_category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `vendor_product_category` */

/*Table structure for table `vendor_product_master` */

DROP TABLE IF EXISTS `vendor_product_master`;

CREATE TABLE `vendor_product_master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vendor_product_master_brand_id_foreign` (`brand_id`),
  CONSTRAINT `vendor_product_master_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `vendor_product_brand` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `vendor_product_master` */

/*Table structure for table `vendor_product_sale` */

DROP TABLE IF EXISTS `vendor_product_sale`;

CREATE TABLE `vendor_product_sale` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vendor_product_sale_vendor_product_id_foreign` (`vendor_product_id`),
  KEY `vendor_product_sale_vendor_id_foreign` (`vendor_id`),
  CONSTRAINT `vendor_product_sale_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `vendor_product_sale_vendor_product_id_foreign` FOREIGN KEY (`vendor_product_id`) REFERENCES `vendor_product_master` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `vendor_product_sale` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
