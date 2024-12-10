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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
