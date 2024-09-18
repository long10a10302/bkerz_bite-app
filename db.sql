-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for bkerz_bite
CREATE DATABASE IF NOT EXISTS `bkerz_bite` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bkerz_bite`;

-- Dumping structure for table bkerz_bite.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bkerz_bite.cache: ~0 rows (approximately)

-- Dumping structure for table bkerz_bite.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bkerz_bite.cache_locks: ~0 rows (approximately)

-- Dumping structure for table bkerz_bite.carts
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table bkerz_bite.carts: ~0 rows (approximately)

-- Dumping structure for table bkerz_bite.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `img_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bkerz_bite.categories: ~6 rows (approximately)
INSERT IGNORE INTO `categories` (`category_id`, `category_name`, `description`, `img_url`, `created_at`, `updated_at`) VALUES
	(1, 'Cakes', 'A variety of delicious cakes, perfect for every occasion, made with the finest ingredients.delicious', 'https://bakerynouveau.com/images/cakes.jpg', '2024-09-01 05:00:00', '2024-09-05 20:21:46'),
	(2, 'Pastries', 'Freshly baked pastries, including croissants, danishes, and more.', 'https://bakerynouveau.com/images/pastries.jpg', '2024-09-01 05:00:00', '2024-09-01 05:00:00'),
	(3, 'Cookies', 'A selection of handmade cookies with rich flavors and textures.', 'https://bakerynouveau.com/images/cookies.jpg', '2024-09-01 05:00:00', '2024-09-01 05:00:00'),
	(4, 'Pies', 'Classic and seasonal pies, perfect for sharing.', 'https://bakerynouveau.com/images/pies.jpg', '2024-09-01 05:00:00', '2024-09-01 05:00:00'),
	(5, 'Breads', 'Artisan breads baked fresh daily, with a variety of flavors and styles.', 'https://bakerynouveau.com/images/breads.jpg', '2024-09-01 05:00:00', '2024-09-01 05:00:00'),
	(6, 'Chocolates', 'Handcrafted chocolates made with the finest ingredients.', 'https://bakerynouveau.com/images/chocolates.jpg', '2024-09-01 05:00:00', '2024-09-01 05:00:00');

-- Dumping structure for table bkerz_bite.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bkerz_bite.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table bkerz_bite.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bkerz_bite.jobs: ~0 rows (approximately)

-- Dumping structure for table bkerz_bite.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bkerz_bite.job_batches: ~0 rows (approximately)

-- Dumping structure for table bkerz_bite.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bkerz_bite.migrations: ~8 rows (approximately)
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_08_24_094701_create_categories_table', 1),
	(5, '2024_08_24_155838_create_products_table', 1),
	(6, '2024_08_24_160335_create_orders_table', 1),
	(7, '2024_08_24_160422_create_order_details_table', 1),
	(8, '2024_08_24_160436_create_reviews_table', 1);

-- Dumping structure for table bkerz_bite.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Đang xử lý','Đã giao','Đã hủy') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bkerz_bite.orders: ~0 rows (approximately)

-- Dumping structure for table bkerz_bite.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `order_item_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned DEFAULT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_item_id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  KEY `order_details_product_id_foreign` (`product_id`),
  CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE SET NULL,
  CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bkerz_bite.order_details: ~0 rows (approximately)

-- Dumping structure for table bkerz_bite.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bkerz_bite.products: ~6 rows (approximately)
INSERT IGNORE INTO `products` (`product_id`, `name`, `description`, `price`, `category_id`, `image_url`, `created_at`, `updated_at`) VALUES
	(1, 'Opera Cake', 'A classic French cake made with layers of almond sponge, coffee buttercream, and chocolate ganache.delicious', 45.00, 1, 'https://bakerynouveau.com/images/opera_cake.jpg', '2024-09-01 05:00:00', '2024-09-05 20:22:04'),
	(2, 'Croissant', 'A flaky, buttery croissant made fresh every morning.', 3.75, 2, 'https://bakerynouveau.com/images/croissant.jpg', '2024-09-01 05:00:00', '2024-09-01 05:00:00'),
	(3, 'Chocolate Chip Cookie', 'A classic chocolate chip cookie with rich chocolate chunks and a soft, chewy center.', 2.50, 3, 'https://bakerynouveau.com/images/chocolate_chip_cookie.jpg', '2024-09-01 05:00:00', '2024-09-01 05:00:00'),
	(4, 'Apple Pie', 'Traditional apple pie with a golden crust and spiced apple filling.', 25.00, 4, 'https://bakerynouveau.com/images/apple_pie.jpg', '2024-09-01 05:00:00', '2024-09-01 05:00:00'),
	(5, 'French Baguette', 'A classic French baguette with a crisp crust and tender crumb.', 4.00, 5, 'https://bakerynouveau.com/images/french_baguette.jpg', '2024-09-01 05:00:00', '2024-09-01 05:00:00'),
	(6, 'Assorted Chocolates', 'A selection of handcrafted chocolates with a variety of fillings.', 18.00, 6, 'https://bakerynouveau.com/images/assorted_chocolates.jpg', '2024-09-01 05:00:00', '2024-09-01 05:00:00');

-- Dumping structure for table bkerz_bite.reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `rating` tinyint unsigned NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `review_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`review_id`),
  KEY `reviews_product_id_foreign` (`product_id`),
  KEY `reviews_user_id_foreign` (`user_id`),
  CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE SET NULL,
  CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bkerz_bite.reviews: ~0 rows (approximately)

-- Dumping structure for table bkerz_bite.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bkerz_bite.users: ~3 rows (approximately)
INSERT IGNORE INTO `users` (`id`, `full_name`, `email`, `role`, `email_verified_at`, `password`, `phone_number`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 'Nguyễn Đình Hưng', 'hungakb4@gmail.com', 'admin', NULL, '$2y$12$YH2QX4c8n.CGFJMf3Kg1CuDGdIDZlb4vEmVYIzgFUPWvBJbtOtOxO', '0321234567', NULL, '2024-09-09 05:44:56', '2024-09-09 05:44:56'),
	(3, 'Hưng', 'hungakb9@gmail.com', 'admin', NULL, '$2y$12$iD3b9GqsvMQuAz0wH0G6AubXUYVoI5g7vzEea.iMWepnwbZwtE.CK', '0321234567', NULL, '2024-09-12 00:42:33', '2024-09-12 00:42:33'),
	(4, 'sad', 'dothivan19121980@gmail.com', 'user', NULL, '$2y$12$p1aZfs4T.NIhip/P6x4zHe.gv8bhkqJQNeBc560Cg2s5p.fqj8Gs2', '0321234567', NULL, '2024-09-15 03:24:43', '2024-09-15 03:24:43'),
	(5, 'Nguyễn Việt Long', 'long10a10302@gmail.com', 'user', NULL, '$2y$12$AnPO2D//CXzZrKdNnDFY0OxwxuTLRewoSpjZAFheubkTRc4OwNqSC', '0338095474', NULL, '2024-09-18 06:36:36', '2024-09-18 06:36:36');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
