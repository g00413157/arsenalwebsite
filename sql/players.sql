-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2024 at 11:38 PM
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
