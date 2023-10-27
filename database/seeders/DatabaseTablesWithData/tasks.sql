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
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `task_list_id` bigint UNSIGNED NOT NULL,
  `position` int NOT NULL DEFAULT '0',
  `start_on` datetime DEFAULT NULL,
  `due_on` datetime DEFAULT NULL,
  `labels` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_subtasks` int NOT NULL DEFAULT '0',
  `comments_count` int NOT NULL DEFAULT '0',
  `assignee` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_important` tinyint(1) NOT NULL DEFAULT '0',
  `completed_on` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_task_list_id_foreign` (`task_list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `is_completed`, `task_list_id`, `position`, `start_on`, `due_on`, `labels`, `open_subtasks`, `comments_count`, `assignee`, `is_important`, `completed_on`, `created_at`, `updated_at`) VALUES
(1, 'Designing and implementing UI components 1', 0, 1, 0, NULL, '2023-01-03 00:00:00', '[]', 0, 0, '[]', 0, NULL, NULL, '2023-10-24 12:54:10'),
(3, 'Creating and implementing design system components', 0, 1, 1, '2023-05-08 00:00:00', '2023-09-10 00:00:00', '[]', 2, 7, '[1]', 0, NULL, NULL, NULL),
(4, 'Implementing UI animations and transitions', 0, 1, 2, NULL, NULL, '[]', 0, 0, '[]', 0, NULL, NULL, NULL),
(5, 'Developing and integrating UI libraries and frameworks', 0, 1, 3, '2023-05-08 00:00:00', '2023-09-10 00:00:00', '[1, 2, 3, 4, 5, 6, 7, 8]', 2, 7, '[1]', 0, NULL, NULL, NULL),
(6, 'Designing and integrating user flow and interactions', 0, 1, 4, '2023-05-08 00:00:00', '2023-09-10 00:00:00', '[1, 2, 3, 4, 5, 6, 7, 8]', 2, 7, '[1]', 0, NULL, NULL, NULL),
(8, 'Make api calls', 0, 1, 5, NULL, NULL, '[1, 2, 3]', 2, 7, '[]', 0, NULL, NULL, NULL),
(9, 'Create mobile app', 1, 1, 6, NULL, NULL, '[]', 1, 0, '[3]', 0, '2019-05-08 00:00:00', NULL, NULL),
(10, 'Building and integrating UI kits, Implementing responsive design', 0, 2, 0, '2019-05-08 00:00:00', '2019-09-10 00:00:00', '[1,2]', 2, 0, '[3,2,1]', 0, NULL, NULL, NULL),
(11, 'Implementing UI localization and internationalization, Implementing redesign of translation', 0, 2, 1, NULL, NULL, '[4,3]', 2, 0, '[4]', 0, NULL, NULL, NULL),
(12, 'Ensuring UI consistency across different platforms and devices', 0, 4, 0, NULL, NULL, '[4,3]', 2, 0, '[4]', 0, NULL, NULL, NULL),
(13, 'Creating and implementing UI guidelines and best practices', 0, 4, 1, NULL, '2023-05-08 00:00:00', '[]', 0, 0, '[]', 0, NULL, NULL, NULL),
(14, 'Developing and integrating UI icons and images', 0, 4, 2, NULL, NULL, '[]', 0, 0, '[]', 0, NULL, NULL, NULL),
(15, 'Developing and integrating UI forms and validation', 1, 4, 4, '2023-05-08 00:00:00', '2023-09-10 00:00:00', '[]', 2, 0, '[]', 0, '2023-09-10 00:00:00', NULL, NULL),
(16, 'Creating and implementing UI tests', 0, 5, 0, '2023-05-08 00:00:00', '2023-09-10 00:00:00', '[1, 2, 3, 4, 5, 6, 7, 8]', 2, 7, '[1]', 0, NULL, NULL, NULL),
(17, 'Creating and implementing UI patterns for the page', 1, 5, 1, NULL, NULL, '[]', 0, 0, '[]', 0, '2023-09-10 00:00:00', NULL, NULL),
(21, 'Srdjan Test Task 01', 0, 1, 1, '2023-05-08 00:00:00', '2023-05-10 00:00:00', '[]', 0, 0, '[1,2,3]', 0, NULL, '2023-10-24 14:27:33', '2023-10-24 14:29:14'),
(22, 'Srdjan Test Task 02', 0, 3, 1, '2023-05-08 00:00:00', '2023-05-10 00:00:00', '[]', 0, 0, '[1]', 0, NULL, '2023-10-24 14:28:04', '2023-10-24 14:28:57'),
(23, 'Srdjan Test Task 03', 1, 4, 1, '2023-05-08 00:00:00', '2023-05-10 00:00:00', '[1,2,3]', 0, 0, '[1]', 0, '2023-05-12 00:00:00', '2023-10-24 14:28:39', '2023-10-24 14:28:39'),
(26, 'Srdjan Test Task 04', 0, 12, 0, NULL, NULL, '[]', 0, 0, '[]', 0, NULL, '2023-10-26 12:43:34', '2023-10-26 12:43:34'),
(27, 'Srdjan Test Task 05', 0, 4, 0, NULL, NULL, '[]', 0, 0, '[]', 0, NULL, '2023-10-26 12:57:22', '2023-10-26 16:46:20');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_task_list_id_foreign` FOREIGN KEY (`task_list_id`) REFERENCES `task_lists` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
