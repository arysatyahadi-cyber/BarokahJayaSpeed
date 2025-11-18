-- SQL dump for Barokah Jaya Speed (bookings table)
CREATE DATABASE IF NOT EXISTS `barokah_jaya_speed` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `barokah_jaya_speed`;

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `motor` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'DI terima',
  `notes` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `bookings` (`customer_name`, `motor`, `status`, `notes`) VALUES
('Andi','Suzuki Drag 150','DI terima','Tune up + ganti oli'),
('Budi','Yamaha RD','On proses','Service karburator'),
('Citra','Honda CB','Finish','Ganti busi & setel');