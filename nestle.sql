-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5277
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table nestle.accounts
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nestle.accounts: ~1 rows (approximately)
DELETE FROM `accounts`;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` (`id`, `name`, `enable`, `created_at`, `updated_at`) VALUES
	(1, 'Nestle Professional', 1, '2018-08-07 21:06:24', '2018-08-07 21:06:24');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;

-- Dumping structure for table nestle.assets
CREATE TABLE IF NOT EXISTS `assets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(10) unsigned DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_type` int(11) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `serial` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bmb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nestle.assets: ~0 rows (approximately)
DELETE FROM `assets`;
/*!40000 ALTER TABLE `assets` DISABLE KEYS */;
/*!40000 ALTER TABLE `assets` ENABLE KEYS */;

-- Dumping structure for table nestle.asset_models
CREATE TABLE IF NOT EXISTS `asset_models` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `rent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frequency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_stock` int(11) DEFAULT NULL,
  `current_stock` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nestle.asset_models: ~0 rows (approximately)
DELETE FROM `asset_models`;
/*!40000 ALTER TABLE `asset_models` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_models` ENABLE KEYS */;

-- Dumping structure for table nestle.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_parent` int(10) unsigned DEFAULT NULL,
  `is_enable` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nestle.companies: ~3 rows (approximately)
DELETE FROM `companies`;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` (`id`, `account_id`, `name`, `website`, `address`, `post_code`, `type`, `phone_number`, `image`, `is_parent`, `is_enable`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Nestle Professional', 'nestle.co.nz', '107 Montogomerie Road', '6011', 'Distributor', '02108535263', NULL, 1, 1, NULL, 1, '2018-08-07 21:06:51', '2018-08-07 21:11:53');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

-- Dumping structure for table nestle.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(10) unsigned DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `asset_id` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `cost_labour` int(11) DEFAULT NULL,
  `material_labour` int(11) DEFAULT NULL,
  `priority_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspection_id` int(11) DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `status_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nestle.jobs: ~0 rows (approximately)
DELETE FROM `jobs`;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

-- Dumping structure for table nestle.job_stats
CREATE TABLE IF NOT EXISTS `job_stats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nestle.job_stats: ~0 rows (approximately)
DELETE FROM `job_stats`;
/*!40000 ALTER TABLE `job_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_stats` ENABLE KEYS */;

-- Dumping structure for table nestle.job_types
CREATE TABLE IF NOT EXISTS `job_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nestle.job_types: ~0 rows (approximately)
DELETE FROM `job_types`;
/*!40000 ALTER TABLE `job_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_types` ENABLE KEYS */;

-- Dumping structure for table nestle.locations
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nestle.locations: ~1 rows (approximately)
DELETE FROM `locations`;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` (`id`, `account_id`, `user_id`, `company_id`, `address`, `post_code`, `phone_number`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 'Auckland CBD', '1041', '02108535263', 1, NULL, '2018-08-07 21:27:37', '2018-08-07 21:27:37');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;

-- Dumping structure for table nestle.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=224 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nestle.migrations: ~15 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(209, '2014_10_12_000000_create_users_table', 1),
	(210, '2018_05_18_081307_create_resturants_table', 1),
	(211, '2018_08_02_132834_create_accounts_table', 1),
	(212, '2018_08_02_211518_create_assets_table', 1),
	(213, '2018_08_02_212400_create_asset_models_table', 1),
	(214, '2018_08_02_213304_create_jobs_table', 1),
	(215, '2018_08_02_213849_create_job_stats_table', 1),
	(216, '2018_08_02_214246_create_job_types_table', 1),
	(217, '2018_08_02_214659_create_model_types_table', 1),
	(218, '2018_08_02_220423_create_priorities_table', 1),
	(219, '2018_08_02_220734_create_role_types_table', 1),
	(220, '2018_08_02_221104_create_spares_table', 1),
	(221, '2018_08_02_221703_create_spare_types_table', 1),
	(222, '2018_08_02_231959_create_locations_table', 1),
	(223, '2018_08_02_233336_create_companies_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table nestle.model_types
CREATE TABLE IF NOT EXISTS `model_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nestle.model_types: ~0 rows (approximately)
DELETE FROM `model_types`;
/*!40000 ALTER TABLE `model_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_types` ENABLE KEYS */;

-- Dumping structure for table nestle.priorities
CREATE TABLE IF NOT EXISTS `priorities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nestle.priorities: ~0 rows (approximately)
DELETE FROM `priorities`;
/*!40000 ALTER TABLE `priorities` DISABLE KEYS */;
/*!40000 ALTER TABLE `priorities` ENABLE KEYS */;

-- Dumping structure for table nestle.resturants
CREATE TABLE IF NOT EXISTS `resturants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nestle.resturants: ~0 rows (approximately)
DELETE FROM `resturants`;
/*!40000 ALTER TABLE `resturants` DISABLE KEYS */;
/*!40000 ALTER TABLE `resturants` ENABLE KEYS */;

-- Dumping structure for table nestle.role_types
CREATE TABLE IF NOT EXISTS `role_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nestle.role_types: ~0 rows (approximately)
DELETE FROM `role_types`;
/*!40000 ALTER TABLE `role_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_types` ENABLE KEYS */;

-- Dumping structure for table nestle.spares
CREATE TABLE IF NOT EXISTS `spares` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(10) unsigned DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `agent_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_id` int(11) DEFAULT NULL,
  `spare_type` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_stock` int(11) DEFAULT NULL,
  `current_stock` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nestle.spares: ~0 rows (approximately)
DELETE FROM `spares`;
/*!40000 ALTER TABLE `spares` DISABLE KEYS */;
/*!40000 ALTER TABLE `spares` ENABLE KEYS */;

-- Dumping structure for table nestle.spare_types
CREATE TABLE IF NOT EXISTS `spare_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nestle.spare_types: ~0 rows (approximately)
DELETE FROM `spare_types`;
/*!40000 ALTER TABLE `spare_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `spare_types` ENABLE KEYS */;

-- Dumping structure for table nestle.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_user` int(11) DEFAULT NULL,
  `key_contact` int(11) NOT NULL DEFAULT '0',
  `contact_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nestle.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `account_id`, `company_id`, `first_name`, `last_name`, `username`, `email`, `password`, `phone_number`, `is_user`, `key_contact`, `contact_type`, `image`, `created_by`, `updated_by`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'samiurz', 'Rahman', 'samiurz', 'samiurz@gmail.com', '$2y$10$4IBvHm51cicDLUNq/H1Vv.CGyBq4n17Gp13VKAS3Ebbv/8uRpQbbS', '02108535263', 1, 1, NULL, NULL, NULL, NULL, NULL, '2018-08-07 21:07:16', '2018-08-07 21:07:16'),
	(2, 1, 1, 'Mazbaul', 'Hasan', NULL, 'mazbaul@gmail.com', '$2y$10$XxxND2xzIzMDhGSpPzcLjOKsPASnTanRYBT42UfxyrPfnfYQK.yEK', '14377795507', 0, 0, 'Manager', NULL, 1, NULL, NULL, '2018-08-07 21:11:45', '2018-08-07 21:11:45');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
