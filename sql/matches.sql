-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2024 at 11:34 PM
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
  `arsenal`ENUM('Arsenal Women','Arsenal Men'),
  `comp_url` varchar(20) NOT NULL,
  `competition` varchar(100) NOT NULL,
  `season` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `date`, `badge_url`, `opponent`, `stadium`, `home_away`, `score`, `arsenalb_url`, `arsenal`, `comp_url`, `competition`, `season`) VALUES
(1, '2022-09-10', 'teams/chelsea.png', 'Chelsea', 'Kingsmeadow', 'Away', '1-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png','Womens Super League', '2022/23'),
(2, '2022-09-18', 'teams/reading.png', 'Reading', 'Meadow Park', 'Home', '3-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(3, '2022-09-25', 'teams/spurs.png', 'Tottenham Hotspur', 'Tottenham Hotspur Stadium', 'Away', '2-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(4, '2022-10-02', 'teams/mancity.png', 'Manchester City', 'Academy Stadium', 'Away', '1-3', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(5, '2022-10-09', 'teams/astonvilla.png', 'Aston Villa', 'Villa Park', 'Away', '0-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(6, '2022-10-16', 'teams/liverpool.png', 'Liverpool', 'Emirates Stadium', 'Home', '2-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(7, '2022-10-23', 'teams/brighton.png', 'Brighton', 'Amex Stadium', 'Away', '4-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(8, '2022-11-01', 'teams/barca.png', 'Barcelona', 'Camp Nou', 'Away', '1-3', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2022/23'),
(9, '2022-11-07', 'teams/bayern.png', 'Bayern Munich', 'Emirates Stadium', 'Home', '1-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2022/23'),
(10, '2022-11-13', 'teams/bristol.png', 'Bristol City', 'Ashton Gate', 'Away', '2-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(11, '2022-11-20', 'teams/lcity.png', 'Leicester City', 'Meadow Park', 'Home', '5-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(12, '2022-11-27', 'teams/psg.png', 'Paris Saint-Germain Women', 'Parc des Princes', 'Away', '1-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2022/23'),
(13, '2022-12-04', 'teams/chelsea.png', 'Chelsea', 'Emirates Stadium', 'Home', '0-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(14, '2022-12-11', 'teams/everton.png', 'Everton', 'Walton Hall Park', 'Away', '2-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(15, '2022-12-18', 'teams/westham.png', 'West Ham', 'Meadow Park', 'Home', '3-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
(16, '2024-01-10', 'teams/chelsea.png', 'Chelsea', 'Emirates Stadium', 'Home', '2-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(17, '2024-01-17', 'teams/mancity.png', 'Manchester City', 'Academy Stadium', 'Away', '1-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(18, '2024-01-24', 'teams/spurs.png', 'Tottenham Hotspur', 'Tottenham Hotspur Stadium', 'Away', '3-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(19, '2024-02-03', 'teams/brighton.png', 'Brighton', 'Meadow Park', 'Home', '4-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(20, '2024-02-10', 'teams/manutd.png', 'Manchester United', 'Leigh Sports Village', 'Away', '0-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(21, '2024-02-17', 'teams/astonvilla.png', 'Aston Villa ', 'Villa Park', 'Away', '1-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(22, '2024-02-24', 'teams/westham.png', 'West Ham', 'Meadow Park', 'Home', '5-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(23, '2024-03-02', 'teams/liverpool.png', 'Liverpool', 'Prenton Park', 'Away', '3-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(24, '2024-03-09', 'teams/lcity.png', 'Leicester City ', 'Meadow Park', 'Home', '4-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(25, '2024-03-16', 'teams/reading.png', 'Reading ', 'Select Car Leasing Stadium', 'Away', '0-3', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(26, '2024-03-23', 'teams/bristol.png', 'Bristol City ', 'Meadow Park', 'Home', '6-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(27, '2024-04-01', 'teams/chelsea.png', 'Chelsea ', 'Kingsmeadow', 'Away', '1-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/facup.png', 'FA Womens Cup', '2023/24'),
(28, '2024-04-08', 'teams/everton.png', 'Everton ', 'Meadow Park', 'Home', '2-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
(29, '2024-04-15', 'teams/bayern.png', 'Bayern Munich ', 'Allianz Arena', 'Away', '0-3', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2023/24'),
(30, '2024-04-22', 'teams/barca.png', 'Barcelona ', 'Emirates Stadium', 'Home', '1-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2023/24'),
(31, '2024-05-01', 'teams/psg.png', 'Paris Saint-Germain ', 'Parc des Princes', 'Away', '2-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2023/24'),
(32, '2024-05-08', 'teams/chelsea.png', 'Chelsea', 'Wembley Stadium', 'Neutral', '1-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/facup.png', 'FA Womens Cup', '2023/24'),
(33, '2024-09-14', 'teams/mancity.png', 'Manchester City ', 'Academy Stadium', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
(34, '2024-09-21', 'teams/spurs.png', 'Tottenham Hotspur ', 'Emirates Stadium', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
(35, '2024-09-28', 'teams/liverpool.png', 'Liverpool ', 'Prenton Park', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
(36, '2024-10-05', 'teams/reading.png', 'Reading ', 'Meadow Park', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
(37, '2024-10-12', 'teams/chelsea.png', 'Chelsea ', 'Kingsmeadow', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
(38, '2024-10-19', 'teams/brighton.png', 'Brighton ', 'Amex Stadium', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
(39, '2024-10-26', 'teams/westham.png', 'West Ham ', 'Meadow Park', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
(40, '2024-11-02', 'teams/psg.png', 'Paris Saint-Germain ', 'Parc des Princes', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
(41, '2024-11-09', 'teams/astonvilla.png', 'Aston Villa ', 'Emirates Stadium', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
(42, '2024-11-16', 'teams/bayern.png', 'Bayern Munich ', 'Allianz Arena', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
(43, '2024-11-23', 'teams/barca.png', 'Barcelona ', 'Emirates Stadium', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
(45, '2024-12-08', 'teams/bristol.png', 'Bristol City ', 'Ashton Gate', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
(46, '2024-12-15', 'teams/chelsea.png', 'Chelsea ', 'Wembley Stadium', 'Neutral', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/facup.png', 'FA Womens Cup', '2024/25'),
(47, '2024-12-22', 'teams/mancity.png', 'Manchester City ', 'Emirates Stadium', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/facup.png', 'FA Womens Cup', '2024/25'),
(48, '2025-01-06', 'teams/bayern.png', 'Bayern Munich ', 'Allianz Arena', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
(49, '2025-01-13', 'teams/barca.png', 'Barcelona ', 'Camp Nou', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
(50, '2025-01-20', 'teams/lyon.png', 'Lyon ', 'Groupama Stadium', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png',  'Womens Champions League', '2024/25'),
(51, '2025-01-27', 'teams/rmadrid.png', 'Real Madrid ', 'Emirates Stadium', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png',  'Womens Champions League', '2024/25'),
(52, '2025-02-03', 'teams/wolfsburg.png', 'Wolfsburg ', 'Volkswagen Arena', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
(53, '2025-02-10', 'teams/juventus.png', 'Juventus ', 'Emirates Stadium', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png',  'Womens Champions League', '2024/25'),
(54, '2025-02-17', 'teams/olympiacos.png', 'Olympiacos', 'Phillips Stadion', 'Neutral', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png',  'Womens Champions League', '2024/25'),
(55, '2025-02-24', 'teams/psg.png', 'Paris Saint-Germain ', 'Emirates Stadium', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png',  'Womens Champions League', '2024/25'),
(56, '2022-08-05', 'teams/crystalpalace.png', 'Crystal Palace', 'Selhurst Park', 'Away', '2-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2022/23'),
(57, '2022-08-13', 'teams/lcity.png', 'Leicester City', 'Emirates Stadium', 'Home', '4-2', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2022/23'),
(58, '2022-08-20', 'teams/boumouth.png', 'Bournemouth', 'Vitality Stadium', 'Away', '3-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2022/23'),
(59, '2022-08-27', 'teams/fulham.png', 'Fulham', 'Emirates Stadium', 'Home', '2-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2022/23'),
(60, '2022-09-04', 'teams/manutd.png', 'Manchester United', 'Old Trafford', 'Away', '1-3', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2022/23'),
(61, '2022-09-18', 'teams/brentford.png', 'Brentford', 'Gtech Community Stadium', 'Away', '3-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2022/23'),
(62, '2022-10-01', 'teams/spurs.png', 'Tottenham Hotspur', 'Emirates Stadium', 'Home', '3-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2022/23'),
(63, '2022-10-09', 'teams/liverpool.png', 'Liverpool', 'Emirates Stadium', 'Home', '3-2', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2022/23'),
(64, '2022-10-16', 'teams/leeds.png', 'Leeds United', 'Elland Road', 'Away', '1-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2022/23'),
(65, '2022-10-30', 'teams/forest.png', 'Nottingham Forest', 'Emirates Stadium', 'Home', '5-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2022/23'),
(66, '2023-08-12', 'teams/forest.png', 'Nottingham Forest', 'Emirates Stadium', 'Home', '2-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2023/24'),
(67, '2023-08-21', 'teams/crystalpalace.png', 'Crystal Palace', 'Selhurst Park', 'Away', '1-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2023/24'),
(68, '2023-08-26', 'teams/fulham.png', 'Fulham', 'Emirates Stadium', 'Home', '2-2', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2023/24'),
(69, '2023-09-03', 'teams/manutd.png', 'Manchester United', 'Emirates Stadium', 'Home', '3-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2023/24'),
(70, '2023-09-17', 'teams/everton.png', 'Everton', 'Goodison Park', 'Away', '1-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2023/24'),
(71, '2023-09-24', 'teams/spurs.png', 'Tottenham Hotspur', 'Emirates Stadium', 'Home', '2-2', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2023/24'),
(72, '2023-09-30', 'teams/boumouth.png', 'Bournemouth', 'Vitality Stadium', 'Away', '4-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2023/24'),
(73, '2023-10-08', 'teams/mancity.png', 'Manchester City', 'Emirates Stadium', 'Home', '1-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2023/24'),
(74, '2023-10-21', 'teams/chelsea.png', 'Chelsea', 'Stamford Bridge', 'Away', '2-2', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2023/24'),
(75, '2023-10-28', 'teams/sheff.png', 'Sheffield United', 'Emirates Stadium', 'Home', '5-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2023/24'),
(76, '2024-08-10', 'teams/westham.png', 'West Ham United', 'London Stadium', 'Away', '2-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2024/25'),
(77, '2024-08-17', 'teams/brighton.png', 'Brighton & Hove Albion', 'Emirates Stadium', 'Home', '3-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2024/25'),
(78, '2025-08-09', 'teams/astonvilla.png', 'Aston Villa', 'Villa Park', 'Away', '1-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2025/26'),
(79, '2025-08-16', 'teams/newcastle.png', 'Newcastle United', 'Emirates Stadium', 'Home', '2-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2025/26'),
(80, '2024-09-17', 'teams/psg.png', 'Paris Saint-Germain', 'Parc des Princes', 'Away', '2-2', 'teams/arsenal.png', 'Arsenal Men', 'comp/ucl.png', 'Champions League', '2024/25'),
(81, '2024-10-02', 'teams/juventus.png', 'Juventus', 'Emirates Stadium', 'Home', '3-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/ucl.png', 'Champions League', '2024/25'),
(82, '2024-10-23', 'teams/ajax.png', 'Ajax', 'Johan Cruyff Arena', 'Away', '1-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/ucl.png', 'Champions League', '2024/25'),
(83, '2024-11-06', 'teams/ajax.png', 'Ajax', 'Emirates Stadium', 'Home', '2-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/ucl.png', 'Champions League', '2024/25'),
(84, '2024-11-27', 'teams/psg.png', 'Paris Saint-Germain', 'Emirates Stadium', 'Home', '1-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/ucl.png', 'Champions League', '2024/25'),
(85, '2024-12-11', 'teams/juventus.png', 'Juventus', 'Allianz Stadium', 'Away', '2-3', 'teams/arsenal.png', 'Arsenal Men', 'comp/ucl.png', 'Champions League', '2024/25'),
(86, '2025-02-18', 'teams/rmadrid.png', 'Real Madrid', 'Emirates Stadium', 'Home', '2-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/ucl.png', 'Champions League', '2024/25'),
(87, '2025-03-05', 'teams/rmadrid.png', 'Real Madrid', 'Santiago Bernabéu', 'Away', '0-2', 'teams/arsenal.png', 'Arsenal Men', 'comp/ucl.png', 'Champions League', '2024/25'),
(88, '2025-01-06', 'teams/sunderland.png', 'Sunderland', 'Emirates Stadium', 'Home', '4-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/mfacup.png', 'FA Cup', '2024/25'),
(89, '2025-01-27', 'teams/forest.png', 'Nottingham Forest', 'City Ground', 'Away', '2-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/mfacup.png', 'FA Cup', '2024/25'),
(90, '2025-02-17', 'teams/chelsea.png', 'Chelsea', 'Stamford Bridge', 'Away', '1-1 (4-3 pens)', 'teams/arsenal.png', 'Arsenal Men', 'comp/mfacup.png', 'FA Cup', '2024/25'),
(91, '2025-03-10', 'teams/manutd.png', 'Manchester United', 'Old Trafford', 'Away', '2-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/mfacup.png', 'FA Cup', '2024/25'),
(92, '2025-04-07', 'teams/liverpool.png', 'Liverpool', 'Emirates Stadium', 'Home', '2-2 (5-4 pens)', 'teams/arsenal.png', 'Arsenal Men', 'comp/mfacup.png', 'FA Cup', '2024/25'),
(93, '2025-04-27', 'teams/spurs.png', 'Tottenham Hotspur', 'Wembley Stadium', 'Neutral', '1-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/mfacup.png', 'FA Cup', '2024/25'),
(94, '2025-05-25', 'teams/mancity.png', 'Manchester City', 'Wembley Stadium', 'Neutral', '0-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/mfacup.png', 'FA Cup', '2024/25'),
(95, '2025-09-18', 'teams/barca.png', 'Barcelona', 'Camp Nou', 'Away', '1-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/ucl.png', 'Champions League', '2025/26'),
(96, '2025-10-01', 'teams/dortmund.png', 'Borussia Dortmund', 'Emirates Stadium', 'Home', '2-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/ucl.png', 'Champions League', '2025/26'),
(97, '2025-10-23', 'teams/porto.png', 'FC Porto', 'Estádio do Dragão', 'Away', '3-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/ucl.png', 'Champions League', '2025/26'),
(98, '2025-11-06', 'teams/porto.png', 'FC Porto', 'Emirates Stadium', 'Home', '1-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/ucl.png', 'Champions League', '2025/26'),
(99, '2025-11-26', 'teams/barca.png', 'Barcelona', 'Emirates Stadium', 'Home', '2-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/ucl.png', 'Champions League', '2025/26'),
(100, '2025-12-10', 'teams/dortmund.png', 'Borussia Dortmund', 'Signal Iduna Park', 'Away', '0-2', 'teams/arsenal.png', 'Arsenal Men', 'comp/ucl.png', 'Champions League', '2025/26'),
(101, '2026-02-18', 'teams/bayern.png', 'Bayern Munich', 'Allianz Arena', 'Away', '2-2', 'teams/arsenal.png', 'Arsenal Men', 'comp/ucl.png', 'Champions League', '2025/26'),
(102, '2026-03-05', 'teams/bayern.png', 'Bayern Munich', 'Emirates Stadium', 'Home', '1-3', 'teams/arsenal.png', 'Arsenal Men', 'comp/ucl.png', 'Champions League', '2025/26'),
(103, '2026-01-04', 'teams/blackburn.png', 'Blackburn Rovers', 'Emirates Stadium', 'Home', '3-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/mfacup.png', 'FA Cup', '2025/26'),
(104, '2026-01-26', 'teams/astonvilla.png', 'Aston Villa', 'Villa Park', 'Away', '1-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/mfacup.png', 'FA Cup', '2025/26'),
(105, '2026-02-17', 'teams/westham.png', 'West Ham United', 'Emirates Stadium', 'Home', '2-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/mfacup.png', 'FA Cup', '2025/26'),
(106, '2026-03-08', 'teams/brighton.png', 'Brighton & Hove Albion', 'Amex Stadium', 'Away', '2-2 (5-3 pens)', 'teams/arsenal.png', 'Arsenal Men', 'comp/mfacup.png', 'FA Cup', '2025/26'),
(107, '2026-04-06', 'teams/spurs.png', 'Tottenham Hotspur', 'Emirates Stadium', 'Home', '3-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/mfacup.png', 'FA Cup', '2025/26'),
(108, '2026-04-25', 'teams/mancity.png', 'Manchester City', 'Wembley Stadium', 'Neutral', '1-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/mfacup.png', 'FA Cup', '2025/26'),
(109, '2026-05-23', 'teams/chelsea.png', 'Chelsea', 'Wembley Stadium', 'Neutral', '2-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/mfacup.png', 'FA Cup', '2025/26'),
(110, '2024-08-11', 'teams/fulham.png', 'Fulham', 'Craven Cottage', 'away', '2-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2024/25'),
(111, '2024-08-18', 'teams/astonvilla.png', 'Aston Villa', 'Villa Park', 'away', '1-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2024/25'),
(112, '2024-08-25', 'teams/manutd.png', 'Manchester United', 'Old Trafford', 'away', '3-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png',  'Premier League', '2024/25'),
(113, '2024-09-01', 'teams/forest.png', 'Nottingham Forest', 'Emirates Stadium', 'home', '4-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png',  'Premier League', '2024/25'),
(114, '2024-09-15', 'teams/chelsea.png', 'Chelsea', 'Stamford Bridge', 'away', '2-2', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png',  'Premier League', '2024/25'),
(115, '2024-09-23', 'teams/mancity.png', 'Manchester City', 'Emirates Stadium', 'home', '1-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png',  'Premier League', '2024/25'),
(116, '2024-10-07', 'teams/brighton.png', 'Brighton & Hove Albion', 'Amex Stadium', 'away', '1-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2024/25'),
(117, '2024-10-14', 'teams/wolves.png', 'Wolverhampton Wanderers', 'Molineux Stadium', 'away', '3-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2024/25'),
(118, '2024-10-21', 'teams/sampton.png', 'Southampton', 'Emirates Stadium', 'home', '2-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png',  'Premier League', '2024/25'),
(119, '2024-10-28', 'teams/lcity.png', 'Leicester City', 'King Power Stadium', 'away', '4-2', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2024/25'),
(120, '2024-11-04', 'teams/newcastle.png', 'Newcastle United', 'St James Park', 'away', '1-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2024/25'),
(121, '2024-11-11', 'teams/spurs.png', 'Tottenham Hotspur', 'Emirates Stadium', 'home', '2-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png',  'Premier League', '2024/25'),
(122, '2024-12-02', 'teams/crystalpalace.png', 'Crystal Palace', 'Selhurst Park', 'away', '3-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png',  'Premier League', '2024/25'),
(123, '2024-12-09', 'teams/everton.png', 'Everton', 'Goodison Park', 'away', '2-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png',  'Premier League', '2024/25'),
(124, '2024-12-16', 'teams/boumouth.png', 'Bournemouth', 'Emirates Stadium', 'home', '5-0', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png',  'Premier League', '2024/25'),
(125, '2024-12-23', 'teams/brentford.png', 'Brentford', 'Gtech Community Stadium', 'away', '3-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png', 'Premier League', '2024/25'),
(126, '2025-01-13', 'teams/westham.png', 'West Ham United', 'London Stadium', 'away', '2-1', 'teams/arsenal.png', 'Arsenal Men', 'comp/epl.png',  'Premier League', '2024/25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
