-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2018 at 12:59 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webmob`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(255) NOT NULL,
  `blog_text` text NOT NULL,
  `blog_posted_at` datetime NOT NULL,
  `blog_posted_by` int(10) NOT NULL,
  `blog_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blog_updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_title`, `blog_text`, `blog_posted_at`, `blog_posted_by`, `blog_created_at`, `blog_updated_at`) VALUES
(1, 'Man must explore, and this is exploration at its greatest', 'Problems look mighty small from 150 miles up', '2018-06-20 00:00:00', 1, '2018-06-21 18:08:22', NULL),
(2, 'I believe every human has a finite number', 'I believe every human has a finite number of heartbeats. I don\'t intend to waste any of mine.', '2018-06-21 00:00:00', 1, '2018-06-21 18:08:22', NULL),
(3, 'Science has not yet mastered prophecy', 'We predict too much for the next year and yet far too little for the next ten.', '2018-06-20 00:00:00', 2, '2018-06-21 18:08:22', NULL),
(4, 'Failure is not an option', 'Many say exploration is part of our destiny, but it’s actually our duty to future generations.', '2018-06-21 00:00:00', 2, '2018-06-21 18:08:22', NULL),
(5, 'Ut omnis culpa nihil quis non porro dignissimos', '<p>Quod occaecat explicabo. Cumque repudiandae officia dolor corrupti, proident, veritatis dolorum fugiat sit, omnis saepe veniam, est, in natus id, lorem quisquam nostrum laboriosam, iusto soluta nobis elit, qui in nihil doloremque pariatur. Dicta quidem voluptas et qui vitae eum quia sequi reprehenderit, dolor accusamus et repellendus. Sunt est, iure pariatur. Officia veritatis qui ipsum, eos deserunt doloremque consequatur aut eligendi et sit, molestiae pariatur. Ut sed dolores doloribus quia eiusmod fugiat iusto explicabo. Necessitatibus odit sunt ut sit, quos sint excepturi ut corporis ratione non quia culpa consequatur, nostrum sed id.</p>', '2018-06-22 05:13:36', 1, '2018-06-21 23:43:36', '2018-06-21 23:43:36'),
(6, 'Ut omnis culpa nihil quis non porro dignissimos', '<p>Quod occaecat explicabo. Cumque repudiandae officia dolor corrupti, proident, veritatis dolorum fugiat sit, omnis saepe veniam, est, in natus id, lorem quisquam nostrum laboriosam, iusto soluta nobis elit, qui in nihil doloremque pariatur. Dicta quidem voluptas et qui vitae eum quia sequi reprehenderit, dolor accusamus et repellendus. Sunt est, iure pariatur. Officia veritatis qui ipsum, eos deserunt doloremque consequatur aut eligendi et sit, molestiae pariatur. Ut sed dolores doloribus quia eiusmod fugiat iusto explicabo. Necessitatibus odit sunt ut sit, quos sint excepturi ut corporis ratione non quia culpa consequatur, nostrum sed id.</p>', '2018-06-22 05:14:12', 1, '2018-06-21 23:44:12', '2018-06-21 23:44:12'),
(7, 'Voluptatibus perferendis officia veniam assumenda sit enim ex perferendis enim est ullamco ea commodo', '<p>Sint in in natus voluptas recusandae. Enim rem qui duis ab sed inventore voluptatem ullam rem sunt hic veniam, ullam eaque sed expedita in obcaecati enim sint, quasi in consequat. Eligendi qui cum et quaerat ullam nisi aut eius aut velit quis incididunt dolor nulla neque et qui et eos eligendi mollitia necessitatibus officia possimus, nostrud maiores quibusdam id, voluptates voluptatem, dolorem velit reprehenderit enim beatae possimus, eu dolorem labore nulla cillum unde exercitation sed tenetur cupiditate quo ab deserunt elit, sit id incidunt, magni id, ut laboris est distinctio. Exercitation aliqua. Suscipit libero.</p>', '2018-06-22 05:18:36', 1, '2018-06-21 23:48:36', '2018-06-21 23:48:36'),
(8, 'Duis qui rem ratione ipsum blanditiis molestiae voluptate assumenda laboriosam qui', '<p>Obcaecati consequuntur quibusdam accusantium velit tempore, minus atque nihil ea deleniti delectus, reprehenderit illum, aut in nesciunt, nihil ullamco anim ut cum sed quo in sint voluptates unde qui nostrum fugiat est provident, esse occaecat quibusdam quis nobis temporibus fugit, repudiandae reprehenderit cum delectus, magnam atque aut iure dolores aspernatur officia id corrupti, enim veniam, corrupti, est est inventore aute aut est velit veniam, magnam voluptatum dolor quisquam mollit beatae ea assumenda nostrud laboriosam.</p>', '2018-06-22 05:25:29', 1, '2018-06-21 23:55:29', '2018-06-21 23:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE IF NOT EXISTS `blog_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL,
  `blog_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `category_id`, `blog_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 2, 2),
(5, 2, 6),
(6, 1, 7),
(7, 3, 7),
(8, 1, 8),
(9, 3, 8),
(10, 1, 3),
(11, 2, 4),
(12, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Sci-Fi'),
(2, 'Technologies'),
(3, 'Laravel');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Chirag Chhuchha', 'chirag@gmail.com', '$2y$10$ZCAGKTKeQPHZEzt.QKMM/Oy./eiBP5o0yNeB3HtzUrHzHG4ayrBdK', 'X1PbXi5HJMv9XSnkpfyNMmogJy7fWPNhXNY1mkUhnpcNJj8Q1FFEDyPah039', '2018-06-21 11:14:07', '2018-06-21 11:14:07'),
(2, 'Nikunj Bhalara', 'nikunj@gmail.com', '$2y$10$0eYqoZst.9omV8GN9Zt6kehggLMjtekjd75fYWEPo8Y..ivH1bofu', '6fvCRo96wnVL8LANEFODZ2sdNxLyA89EOrxxc7mxiSJDJl4Aoasz7JnafKqq', '2018-06-21 12:38:47', '2018-06-21 12:38:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
