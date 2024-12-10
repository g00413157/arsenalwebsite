-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2024 at 01:51 PM
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password` (`password`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(3, 'ellenhiggins', 'g00413157@atu.ie', '23456', '0000-00-00 00:00:00'),
(4, 'ellenhiggins3', 'el.higgins.6@gmail.com', '33', '0000-00-00 00:00:00'),
(2, 'leahw6', 'leahw6@gmail.com', '12344567890-', '0000-00-00 00:00:00'),
(5, 'g1234567', '1234556@gmail.com', 'qwerty', '0000-00-00 00:00:00'),
(6, 'avathompson', 'ava.thompson22@gmail.com', 'avat22', '0000-00-00 00:00:00'),
(7, 'ethanp23', 'ethan.parker23@yahoo.com', 'ep23', '0000-00-00 00:00:00'),
(8, 'johnsonmia', 'mia.johnson19@outlook.com', 'jm19', '2024-12-08 13:50:15'),
(9, 'liamdavis', 'liamdavis21@hotmail.com', 'ld21', '0000-00-00 00:00:00'),
(10, 'noahg20', 'noah.garcia24@icloud.com', 'ng24', '0000-00-00 00:00:00'),
(11, 'oliviamartinez ', 'olivia.martinez20@gmail.com', 'om20', '2024-12-08 13:48:42'),
(12, 'lucaswhite', 'lucas.white22@gmail.com', 'lw20', '2024-12-08 13:50:36'),
(13, 'izzyl', 'isabella.lee18@gmail.com', 'il20', '2024-12-08 13:51:04'),
(14, 'jacksonC', 'jackson.clark19@outlook.com', 'jc19', '0000-00-00 00:00:00'),
(15, 'sophia.harris21', 'sophia.harris21@yahoo.com', 'sh21', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
