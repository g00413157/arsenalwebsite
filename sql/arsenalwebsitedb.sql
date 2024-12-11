-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2024 at 09:30 AM
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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `item_id` int NOT NULL,
  `added_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`, `added_at`) VALUES
(2, 5, 1, '2024-12-09 17:53:13'),
(3, 5, 1, '2024-12-09 18:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

DROP TABLE IF EXISTS `matches`;
CREATE TABLE IF NOT EXISTS `matches` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `badge_url` varchar(20) NOT NULL,
  `opponent` varchar(100) NOT NULL,
  `stadium` varchar(100) NOT NULL,
  `home_away` enum('Home','Away','Neutral') NOT NULL,
  `score` varchar(20) NOT NULL,
  `arsenalb_url` varchar(20) NOT NULL,
  `arsenal` varchar(20) NOT NULL,
  `comp_url` varchar(20) NOT NULL,
  `competition` varchar(100) NOT NULL,
  `season` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `date`, `badge_url`, `opponent`, `stadium`, `home_away`, `score`, `arsenalb_url`, `arsenal`, `comp_url`, `competition`, `season`) VALUES
(1, '2022-09-10', 'teams/chelsea.png', 'Chelsea Women', 'Kingsmeadow', 'Away', '1-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(2, '2022-09-18', 'teams/reading.png', 'Reading Women', 'Meadow Park', 'Home', '3-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(3, '2022-09-25', 'teams/spurs.png', 'Tottenham Hotspur Women', 'Tottenham Hotspur Stadium', 'Away', '2-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(4, '2022-10-02', 'teams/mancity.png', 'Manchester City Women', 'Academy Stadium', 'Away', '1-3', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(5, '2022-10-09', 'teams/astonvilla.png', 'Aston Villa Women', 'Villa Park', 'Away', '0-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(6, '2022-10-16', 'teams/liverpool.png', 'Liverpool Women', 'Emirates Stadium', 'Home', '2-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(7, '2022-10-23', 'teams/brighton.png', 'Brighton Women', 'Amex Stadium', 'Away', '4-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(8, '2022-11-01', 'teams/barca.png', 'Barcelona Women', 'Camp Nou', 'Away', '1-3', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2022/23'),
(9, '2022-11-07', 'teams/bayern.png', 'Bayern Munich Women', 'Emirates Stadium', 'Home', '1-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2022/23'),
(10, '2022-11-13', 'teams/bristol.png', 'Bristol City Women', 'Ashton Gate', 'Away', '2-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(11, '2022-11-20', 'teams/lcity.png', 'Leicester City Women', 'Meadow Park', 'Home', '5-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(12, '2022-11-27', 'teams/psg.png', 'Paris Saint-Germain Women', 'Parc des Princes', 'Away', '1-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2022/23'),
(13, '2022-12-04', 'teams/chelsea.png', 'Chelsea Women', 'Emirates Stadium', 'Home', '0-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(14, '2022-12-11', 'teams/everton.png', 'Everton Women', 'Walton Hall Park', 'Away', '2-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(15, '2022-12-18', 'teams/westham.png', 'West Ham Women', 'Meadow Park', 'Home', '3-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(16, '2024-01-10', 'teams/chelsea.png', 'Chelsea Women', 'Emirates Stadium', 'Home', '2-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(17, '2024-01-17', 'teams/mancity.png', 'Manchester City Women', 'Academy Stadium', 'Away', '1-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(18, '2024-01-24', 'teams/spurs.png', 'Tottenham Hotspur Women', 'Tottenham Hotspur Stadium', 'Away', '3-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(19, '2024-02-03', 'teams/brighton.png', 'Brighton Women', 'Meadow Park', 'Home', '4-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(20, '2024-02-10', 'teams/manutd.png', 'Manchester United Women', 'Leigh Sports Village', 'Away', '0-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(21, '2024-02-17', 'teams/astonvilla.png', 'Aston Villa Women', 'Villa Park', 'Away', '1-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(22, '2024-02-24', 'teams/westham.png', 'West Ham Women', 'Meadow Park', 'Home', '5-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(23, '2024-03-02', 'teams/liverpool.png', 'Liverpool Women', 'Prenton Park', 'Away', '3-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(24, '2024-03-09', 'teams/lcity.png', 'Leicester City Women', 'Meadow Park', 'Home', '4-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(25, '2024-03-16', 'teams/reading.png', 'Reading Women', 'Select Car Leasing Stadium', 'Away', '0-3', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(26, '2024-03-23', 'teams/bristol.png', 'Bristol City Women', 'Meadow Park', 'Home', '6-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(27, '2024-04-01', 'teams/chelsea.png', 'Chelsea Women', 'Kingsmeadow', 'Away', '1-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/facup.png', 'FA Womens Cup', '2023/24'),
(28, '2024-04-08', 'teams/everton.png', 'Everton Women', 'Meadow Park', 'Home', '2-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(29, '2024-04-15', 'teams/bayern.png', 'Bayern Munich Women', 'Allianz Arena', 'Away', '0-3', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2023/24'),
(30, '2024-04-22', 'teams/barca.png', 'Barcelona Women', 'Emirates Stadium', 'Home', '1-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2023/24'),
(31, '2024-05-01', 'teams/psg.png', 'Paris Saint-Germain Women', 'Parc des Princes', 'Away', '2-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2023/24'),
(32, '2024-05-08', 'teams/chelsea.png', 'Chelsea Women', 'Wembley Stadium', 'Neutral', '1-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/facup.png', 'FA Womens Cup', '2023/24'),
(33, '2024-09-14', 'teams/mancity.png', 'Manchester City Women', 'Academy Stadium', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
(34, '2024-09-21', 'teams/spurs.png', 'Tottenham Hotspur Women', 'Emirates Stadium', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
(35, '2024-09-28', 'teams/liverpool.png', 'Liverpool Women', 'Prenton Park', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
(36, '2024-10-05', 'teams/reading.png', 'Reading Women', 'Meadow Park', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
(37, '2024-10-12', 'teams/chelsea.png', 'Chelsea Women', 'Kingsmeadow', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
(38, '2024-10-19', 'teams/brighton.png', 'Brighton Women', 'Amex Stadium', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
(39, '2024-10-26', 'teams/westham.png', 'West Ham Women', 'Meadow Park', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
(40, '2024-11-02', 'teams/psg.png', 'Paris Saint-Germain Women', 'Parc des Princes', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
(41, '2024-11-09', 'teams/astonvilla.png', 'Aston Villa Women', 'Emirates Stadium', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
(42, '2024-11-16', 'teams/bayern.png', 'Bayern Munich Women', 'Allianz Arena', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
(43, '2024-11-23', 'teams/barca.png', 'Barcelona Women', 'Emirates Stadium', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
(45, '2024-12-08', 'teams/bristol.png', 'Bristol City Women', 'Ashton Gate', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
(46, '2024-12-15', 'teams/chelsea.png', 'Chelsea Women', 'Wembley Stadium', 'Neutral', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/facup.png', 'FA Womens Cup', '2024/25'),
(47, '2024-12-22', 'teams/mancity.png', 'Manchester City Women', 'Emirates Stadium', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/facup.png', 'FA Womens Cup', '2024/25'),
(48, '2025-01-06', 'teams/bayern.png', 'Bayern Munich Women', 'Allianz Arena', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
(49, '2025-01-13', 'teams/barca.png', 'Barcelona Women', 'Camp Nou', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
(50, '2025-01-20', 'teams/lyon.png', 'Lyon Women', 'Groupama Stadium', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
(51, '2025-01-27', 'teams/rmadrid.png', 'Real Madrid Women', 'Emirates Stadium', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
(52, '2025-02-03', 'teams/wolfsburg.png', 'Wolfsburg Women', 'Volkswagen Arena', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
(53, '2025-02-10', 'teams/juventus.png', 'Juventus Women', 'Emirates Stadium', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
(54, '2025-02-17', 'teams/olympiacos.png', 'Olympiacos', 'Phillips Stadion', 'Neutral', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
(55, '2025-02-24', 'teams/psg.png', 'Paris Saint-Germain Women', 'Emirates Stadium', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25');

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

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `item_id` int NOT NULL,
  `total_amount` int NOT NULL,
  `added_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `item_id`, `total_amount`, `added_at`) VALUES
(1, 0, 0, 185, '2024-12-10 21:30:06'),
(2, 0, 0, 275, '2024-12-10 21:33:11'),
(3, 0, 0, 305, '2024-12-10 21:34:42'),
(4, 0, 0, 90, '2024-12-10 21:38:03'),
(5, 0, 0, 90, '2024-12-10 21:38:41'),
(6, 0, 0, 30, '2024-12-10 21:40:36'),
(7, 0, 0, 132, '2024-12-10 22:07:51');

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

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `id` int NOT NULL AUTO_INCREMENT,
  `profile_image` varchar(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `number` int NOT NULL,
  `position` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `flag_image` varchar(20) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `date_joined` date NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `profile_image`, `name`, `number`, `position`, `nationality`, `flag_image`, `date_of_birth`, `date_joined`, `description`) VALUES
(1, 'players/mz.png', 'Manuela Zinsberger', 1, 'Goalkeeper', 'Austrian', 'flags/aus.png', '1995-10-19', '2019-07-01', 'A commanding goalkeeper known for her shot-stopping and composure.'),
(2, 'players/dvd.png', 'Daphne Van Domselaar', 14, 'Goalkeeper', 'Dutch', 'flags/ned.png', '2000-03-06', '2024-07-31', 'A talented Dutch goalkeeper renowned for her quick reflexes, commanding presence, and impressive performances on the international stage.'),
(3, 'players/lw3.png', 'Laura Wienroither', 26, 'Defender', 'Austrian', 'flags/aus.png', '1999-01-13', '2022-01-20', 'A talented full-back who provides defensive stability and attacking runs.'),
(4, 'players/lwm.png', 'Lotte Wubben-Moy', 3, 'Defender', 'English', 'flags/eng.png', '1999-01-11', '2020-09-09', 'A homegrown talent known for her strong defending and ball-playing ability.'),
(5, 'players/ef.png', 'Emily Fox', 2, 'Defender', 'American', 'flags/usa.png', '1998-07-05', '2024-01-11', 'A dynamic American defender known for her pace, defensive versatility, and ability to contribute effectively in attack and defense.'),
(6, 'players/lc.png', 'Laia Codina', 5, 'Defender', 'Spanish', 'flags/spa.png', '2000-01-22', '2023-08-29', 'A versatile Spanish defender known for her composure, precise passing, and ability to build play from the back.'),
(7, 'players/lw1.png', 'Leah Williamson', 6, 'Defender', 'English', 'flags/eng.png', '1997-03-29', '2014-03-30', 'A highly skilled English footballer and the captain of the England national team, known for her leadership.'),
(8, 'players/sc.png', 'Steph Catley', 7, 'Defender', 'Australian', 'flags/oz.png', '1994-01-26', '2020-07-01', 'A versatile left-back with excellent crossing and defensive awareness.'),
(9, 'players/mc.png', 'Mariona Caldentey', 8, 'Midfielder', 'Spanish', 'flags/spa.png', '1996-03-19', '2024-07-02', 'A versatile Spanish midfielder known for her composure, precise passing, and ability to build play from the back.'),
(10, 'players/kmc.png', 'Katie McCabe', 11, 'Midfielder/Defender', 'Irish', 'flags/ire.png', '1995-09-21', '2015-12-01', 'An energetic and versatile player with a lethal left foot.'),
(11, 'players/kl.png', 'Kim Little', 10, 'Midfielder', 'Scottish', 'flags/sco.png', '1990-06-29', '2017-01-01', 'Arsenal captain and a world-class playmaker with a history of success.'),
(12, 'players/fm.png', 'Frida Maanum', 12, 'Midfielder', 'Norwegian', 'flags/nor.png', '1999-07-16', '2021-07-01', 'A dynamic midfielder who contributes to both attack and defense.'),
(13, 'players/lw2.png', 'Lia Wälti', 13, 'Midfielder', 'Swiss', 'flags/swi.png', '1993-04-19', '2018-07-01', 'A defensive midfielder known for her vision, tactical intelligence, and calmness.'),
(14, 'players/rk.png', 'Rosa Kafaji', 16, 'Forward', 'Swedish', 'flags/swe.png', '2003-07-05', '2024-08-01', 'A skillful Swedish forward known for her aerial ability, versatility, and knack for scoring crucial goals in big moments.'),
(15, 'players/vp.png', 'Victoria Pelova', 20, 'Midfielder', 'Dutch', 'flags/ned.png', '1999-06-03', '2023-01-01', 'An agile and creative midfielder who excels at dribbling and passing.'),
(16, 'players/kk.png', 'Kathrine Kuhl', 22, 'Midfielder', 'Danish', 'flags/den.png', '2002-02-15', '2023-01-07', 'A talented Danish midfielder known for her vision, technical ability, and composure in controlling the tempo of the game.'),
(17, 'players/kcc.png', 'Kyra Cooney-Cross', 32, 'Midfielder', 'Australian', 'flags/oz.png', '2003-07-05', '2023-09-15', 'A dynamic Australian midfielder recognized for her playmaking skills, athleticism, and ability to dictate the flow of the game.'),
(18, 'players/bm.png', 'Beth Mead', 9, 'Forward', 'English', 'flags/eng.png', '1995-05-09', '2017-01-01', 'A prolific winger with a knack for scoring and creating key chances.'),
(19, 'players/ar.png', 'Alessia Russo', 23, 'Forward', 'English', 'flags/eng.png', '1999-02-08', '2023-07-01', 'A rising star and versatile forward with excellent technical skills.'),
(20, 'players/cf.png', 'Caitlin Foord', 19, 'Forward', 'Australian', 'flags/oz.png', '1994-11-11', '2020-01-24', 'A dynamic winger/forward with exceptional dribbling and goal-scoring ability.');

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
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password` (`password`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(15, 'sophia.harris21', 'sophia.harris21@yahoo.com', 'sh21', '0000-00-00 00:00:00'),
(18, 'ellenhiggins6', 'qwerty@asdfg.com', 'wsdfghj', '0000-00-00 00:00:00'),
(17, 'monsterm', 'monsterm@gmail.com', '345674', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
