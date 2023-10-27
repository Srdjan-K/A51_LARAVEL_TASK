-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 27, 2023 at 09:36 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a51_laravel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `task_lists`
--

DROP TABLE IF EXISTS `task_lists`;
CREATE TABLE IF NOT EXISTS `task_lists` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_tasks` int NOT NULL DEFAULT '0',
  `completed_tasks` int NOT NULL DEFAULT '0',
  `position` int NOT NULL DEFAULT '0',
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `is_trashed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_lists`
--

INSERT INTO `task_lists` (`id`, `name`, `open_tasks`, `completed_tasks`, `position`, `is_completed`, `is_trashed`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'To Do', 7, 0, 0, 0, 0, NULL, NULL, NULL),
(2, 'In Progress', 3, 0, 1, 0, 0, NULL, NULL, NULL),
(3, 'Blocked', 0, 0, 2, 0, 1, NULL, NULL, NULL),
(4, 'Ready for review', 3, 1, 3, 0, 0, NULL, NULL, NULL),
(5, 'Testing', 1, 1, 4, 0, 0, NULL, NULL, NULL),
(12, 'Canceled', 2, 5, 0, 0, 0, '2023-10-25 09:21:24', '2023-10-27 07:31:38', NULL),
(13, 'DEFAULT NAME of Task List', 0, 0, 0, 0, 0, '2023-10-27 05:41:48', '2023-10-27 07:32:03', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
