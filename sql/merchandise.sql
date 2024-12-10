-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2024 at 11:36 PM
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
-- Table structure for table `merchandise`
--

DROP TABLE IF EXISTS `merchandise`;
CREATE TABLE IF NOT EXISTS `merchandise` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `merch_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int NOT NULL,
  `status` varchar(100) NOT NULL,
  `image_url` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `merchandise`
--

INSERT INTO `merchandise` (`item_id`, `merch_name`, `description`, `price`, `stock`, `status`, `image_url`, `created_at`) VALUES
(1, 'Arsenal Women Home Jersey 2024/25', 'Official Arsenal Women home jersey for the 2024/25 season. Features the club crest and Adidas logo.', 89.99, 120, 'Available', 'merch/home.jpg', '2024-12-09 19:10:35'),
(2, 'Arsenal Women Away Jersey 2024/25', 'Official Arsenal Women away jersey for the 2024/25 season. Lightweight and breathable design.', 89.99, 80, 'Available', 'merch/away.jpg', '2024-12-09 19:10:35'),
(3, 'Arsenal Women Scarf', 'Red and white Arsenal Women supporters scarf. Perfect for matchdays.', 19.99, 200, 'Available', 'merch/scarf.jpg', '2024-12-09 19:10:35'),
(4, 'Katie McCabe Signed Poster', 'Limited edition poster signed by Katie McCabe. Great for collectors.', 29.99, 50, 'Limited Stock', 'merch/kmsigned.jpg', '2024-12-09 19:10:35'),
(5, 'Leah Williamson Captain Armband', 'Replica captain armband as worn by Leah Williamson in matches.', 14.99, 150, 'Available', 'merch/capband.jpg', '2024-12-09 19:10:35'),
(6, 'Arsenal Women Beanie', 'Warm beanie featuring the Arsenal Womens logo. Ideal for winter matches.', 24.99, 100, 'Available', 'merch/hat.jpg', '2024-12-09 19:10:35'),
(7, 'Matchday Program - Arsenal vs Chelsea', 'Commemorative matchday program for the Arsenal vs Chelsea fixture. Includes player profiles and exclusive interviews.', 9.99, 30, 'Limited Stock', 'merch/chelseapro.jpg', '2024-12-09 19:10:35'),
(8, 'Arsenal Women Backpack', 'Stylish and durable backpack featuring the Arsenal Women logo.', 49.99, 75, 'Available', 'merch/backpack.jpg', '2024-12-09 19:10:35'),
(9, 'Leah Williamson Action Figure', 'Mini collectible action figure of Leah Williamson in Arsenal kit.', 19.99, 50, 'Available', 'merch/lwfigure.jpg', '2024-12-09 19:10:35'),
(10, 'Arsenal Women Water Bottle', 'Eco-friendly water bottle with Arsenal Women logo. Perfect for training.', 12.99, 200, 'Available', 'merch/bottle.jpg', '2024-12-09 19:10:35'),
(11, 'Arsenal Women Training Kit', 'Complete training kit set including shirt, shorts, and socks.', 69.99, 60, 'Available', 'merch/training.jpg', '2024-12-09 19:10:35'),
(12, 'Leah Williamson Biography', 'Autobiography of Leah Williamson detailing her football journey.', 24.99, 40, 'Available', 'merch/leahwbook.jpg', '2024-12-09 19:10:35'),
(13, 'Arsenal Women Third Jersey 2024/25', 'Official Arsenal Women third jersey for the 2024/25 season. Designed for performance and style.', 89.99, 90, 'Available', 'merch/third.jpg', '2024-12-09 19:10:35'),
(14, 'Arsenal Women Socks Pack', 'Pack of 3 Arsenal Women branded socks in club colors.', 14.99, 120, 'Available', 'merch/socks.jpg', '2024-12-09 19:10:35'),
(15, 'Leah Williamson Signed Poster', 'Official Poster signed by England captain Leah Williamson.', 119.99, 20, 'Limited Stock', 'merch/lwsigned.jpg', '2024-12-09 19:10:35'),
(16, 'Arsenal Women Keychain', 'Metal keychain with the Arsenal Womens logo.', 7.99, 300, 'Available', 'merch/keyring.jpg', '2024-12-09 19:10:35'),
(17, 'Stina Blackstenius Poster', 'Exclusive poster of Stina Blackstenius.', 19.99, 80, 'Available', 'merch/sbposter.jpg', '2024-12-09 19:10:35'),
(18, 'Arsenal Women Training Jacket', 'Lightweight training jacket with Arsenal Women branding.', 59.99, 50, 'Available', 'merch/jacket.jpg', '2024-12-09 19:10:35'),
(19, 'Katie McCabe Autographed Jersey', 'Limited edition home jersey signed by Katie McCabe.', 149.99, 10, 'Limited Stock', 'merch/kmjersey.jpg', '2024-12-09 19:10:35'),
(20, 'Matchday Poster - Arsenal vs Man City', 'High-quality print commemorating Arsenal Womens match against Man City.', 14.99, 30, 'Limited Stock', 'merch/mancitypro.jpg', '2024-12-09 19:10:35'),
(21, 'Arsenal Women Tote Bag', 'Eco-friendly tote bag with Arsenal Women graphics.', 16.99, 100, 'Available', 'merch/totebag.jpg', '2024-12-09 19:10:35'),
(22, 'Beth Mead Poster', 'Poster with a graphic print of Beth Mead.', 24.99, 60, 'Available', 'merch/bmposter.jpg', '2024-12-09 19:10:35'),
(23, 'Arsenal Women Annual', 'Countdown to the holidays with this Arsenal Women-themed annual.', 29.99, 25, 'Limited Stock', 'merch/annual.jpg', '2024-12-09 19:10:35'),
(24, 'Arsenal Womens Notebook', 'Hardcover notebook with Arsenal Women graphics. Great for school or work.', 14.99, 80, 'Available', 'merch/notebook.jpg', '2024-12-09 19:10:35'),
(25, 'Arsenal Womens Stadium Tour Voucher', 'Voucher for an exclusive guided tour of Emirates Stadium with Arsenal Women highlights.', 37.00, 100, 'Available', 'merch/emirates.jpg', '2024-12-09 19:10:35'),
(26, 'Arsenal Women Pen Set', 'Set of 3 pens with Arsenal Women branding.', 9.99, 150, 'Available', 'merch/pen.jpg', '2024-12-09 19:10:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
