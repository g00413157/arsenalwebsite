-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2024 at 11:37 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsenalwebsitedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE IF NOT EXISTS `order_item` (
  `order_id` int NOT NULL,
  `item_id` int NOT NULL,
  `quantity` int NOT NULL,
  `subtotal` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_id`, `item_id`, `quantity`, `subtotal`, `created_at`) VALUES
(3, 26, 1, 10, '2024-12-10 21:34:42'),
(3, 8, 3, 150, '2024-12-10 21:34:42'),
(3, 1, 1, 90, '2024-12-10 21:34:42'),
(3, 6, 1, 25, '2024-12-10 21:34:42'),
(3, 4, 1, 30, '2024-12-10 21:34:42'),
(4, 1, 1, 90, '2024-12-10 21:38:04'),
(5, 6, 1, 25, '2024-12-10 21:38:41'),
(5, 8, 1, 50, '2024-12-10 21:38:41'),
(5, 14, 1, 15, '2024-12-10 21:38:41'),
(6, 4, 1, 30, '2024-12-10 21:40:36'),
(7, 6, 3, 75, '2024-12-10 22:07:51'),
(7, 25, 1, 37, '2024-12-10 22:07:51'),
(7, 26, 2, 20, '2024-12-10 22:07:51');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
