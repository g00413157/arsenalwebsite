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
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `profile_image` VARCHAR(255) NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `number` INT NOT NULL,
    `position` ENUM('Goalkeeper', 'Defender', 'Midfielder', 'Forward') NOT NULL,
    `nationality` VARCHAR(50) NOT NULL,
    `flag_image` VARCHAR(255) NOT NULL,
    `date_of_birth` DATE NOT NULL,
    `date_joined` DATE NOT NULL,
    `gender` ENUM('Men', 'Women') NOT NULL,
    `description` TEXT NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `profile_image`, `name`, `number`, `position`, `nationality`, `flag_image`, `date_of_birth`, `date_joined`, `gender`, `description`) VALUES
-- Arsenal Women Players
(1, 'players/mz.png', 'Manuela Zinsberger', 1, 'Goalkeeper', 'Austrian', 'flags/aus.png', '1995-10-19', '2019-07-01', 'Women', 'A commanding goalkeeper known for her shot-stopping and composure.'),
(2, 'players/dvd.png', 'Daphne Van Domselaar', 14, 'Goalkeeper', 'Dutch', 'flags/ned.png', '2000-03-06', '2024-07-31', 'Women', 'A talented Dutch goalkeeper renowned for her quick reflexes, commanding presence, and impressive performances on the international stage.'),
(3, 'players/lw3.png', 'Laura Wienroither', 26, 'Defender', 'Austrian', 'flags/aus.png', '1999-01-13', '2022-01-20', 'Women', 'A talented full-back who provides defensive stability and attacking runs.'),
(4, 'players/lwm.png', 'Lotte Wubben-Moy', 3, 'Defender', 'English', 'flags/eng.png', '1999-01-11', '2020-09-09', 'Women', 'A homegrown talent known for her strong defending and ball-playing ability.'),
(5, 'players/ef.png', 'Emily Fox', 2, 'Defender', 'American', 'flags/usa.png', '1998-07-05', '2024-01-11', 'Women', 'A dynamic American defender known for her pace, defensive versatility, and ability to contribute effectively in attack and defense.'),
(6, 'players/lc.png', 'Laia Codina', 5, 'Defender', 'Spanish', 'flags/spa.png', '2000-01-22', '2023-08-29', 'Women', 'A versatile Spanish defender known for her composure, precise passing, and ability to build play from the back.'),
(7, 'players/lw1.png', 'Leah Williamson', 6, 'Defender', 'English', 'flags/eng.png', '1997-03-29', '2014-03-30', 'Women', 'A highly skilled English footballer and the captain of the England national team, known for her leadership.'),
(8, 'players/sc.png', 'Steph Catley', 7, 'Defender', 'Australian', 'flags/oz.png', '1994-01-26', '2020-07-01', 'Women', 'A versatile left-back with excellent crossing and defensive awareness.'),
(9, 'players/kmc.png', 'Katie McCabe', 11, 'Midfielder', 'Irish', 'flags/ire.png', '1995-09-21', '2015-12-01', 'Women', 'An energetic and versatile player with a lethal left foot.'),
(10, 'players/kl.png', 'Kim Little', 10, 'Midfielder', 'Scottish', 'flags/sco.png', '1990-06-29', '2017-01-01', 'Women', 'Arsenal captain and a world-class playmaker with a history of success.'),
(11, 'players/fm.png', 'Frida Maanum', 12, 'Midfielder', 'Norwegian', 'flags/nor.png', '1999-07-16', '2021-07-01', 'Women', 'A dynamic midfielder who contributes to both attack and defense.'),
(12, 'players/lw2.png', 'Lia Wälti', 13, 'Midfielder', 'Swiss', 'flags/swi.png', '1993-04-19', '2018-07-01', 'Women', 'A defensive midfielder known for her vision, tactical intelligence, and calmness.'),
(13, 'players/vp.png', 'Victoria Pelova', 20, 'Midfielder', 'Dutch', 'flags/ned.png', '1999-06-03', '2023-01-01', 'Women', 'An agile and creative midfielder who excels at dribbling and passing.'),
(14, 'players/kk.png', 'Kathrine Kuhl', 22, 'Midfielder', 'Danish', 'flags/den.png', '2002-02-15', '2023-01-07', 'Women', 'A talented Danish midfielder known for her vision, technical ability, and composure in controlling the tempo of the game.'),
(15, 'players/rk.png', 'Rosa Kafaji', 16, 'Forward', 'Swedish', 'flags/swe.png', '2003-07-05', '2024-08-01', 'Women', 'A skillful Swedish forward known for her aerial ability, versatility, and knack for scoring crucial goals in big moments.'),
(16, 'players/bm.png', 'Beth Mead', 9, 'Forward', 'English', 'flags/eng.png', '1995-05-09', '2017-01-01', 'Women', 'A prolific winger with a knack for scoring and creating key chances.'),
(17, 'players/ar.png', 'Alessia Russo', 23, 'Forward', 'English', 'flags/eng.png', '1999-02-08', '2023-07-01', 'Women', 'A rising star and versatile forward with excellent technical skills.'),
(18, 'players/cf.png', 'Caitlin Foord', 19, 'Forward', 'Australian', 'flags/oz.png', '1994-11-11', '2020-01-24', 'Women', 'A dynamic winger/forward with exceptional dribbling and goal-scoring ability.');
(19, 'players/kmc.png', 'Katie McCabe', 11, 'Defender', 'Irish', 'flags/ire.png', '1995-09-21', '2015-12-01', 'Women', 'An energetic and versatile player with a lethal left foot.'),
-- Arsenal Men Players
(21, 'players/ram.png', 'Aaron Ramsdale', 1, 'Goalkeeper', 'English', 'flags/eng.png', '1998-05-14', '2021-08-20', 'Men', 'A talented goalkeeper known for his reflex saves and distribution.'),
(22, 'players/bs.png', 'Bukayo Saka', 7, 'Forward', 'English', 'flags/eng.png', '2001-09-05', '2018-11-29', 'Men', 'A versatile winger with incredible skill, speed, and composure in front of goal.'),
(23, 'players/mg.png', 'Gabriel Magalhães', 6, 'Defender', 'Brazilian', 'flags/bra.png', '1997-12-19', '2020-09-01', 'Men', 'A strong and composed center-back known for his aerial ability and leadership at the back.'),
(24, 'players/mo.png', 'Martin Ødegaard', 8, 'Midfielder', 'Norwegian', 'flags/nor.png', '1998-12-17', '2021-01-27', 'Men', 'The creative playmaker and captain of Arsenal Men’s team, known for his vision and passing.'),
(25, 'players/tp.png', 'Thomas Partey', 5, 'Midfielder', 'Ghanaian', 'flags/gha.png', '1993-06-13', '2020-10-05', 'Men', 'A powerful midfielder who excels in defensive and transitional play.'),
(26, 'players/jw.png', 'Jurrien Timber', 12, 'Defender', 'Dutch', 'flags/ned.png', '2001-06-17', '2023-07-01', 'Men', 'A versatile defender with excellent tactical awareness and technical skills.'),
(27, 'players/gj.png', 'Gabriel Jesus', 9, 'Forward', 'Brazilian', 'flags/bra.png', '1997-04-03', '2022-07-01', 'Men', 'A clinical striker with exceptional movement and finishing ability.'),
(28, 'players/ew.png', 'Emile Smith Rowe', 10, 'Midfielder', 'English', 'flags/eng.png', '2000-07-28', '2018-07-01', 'Men', 'A creative and dynamic attacking midfielder.'),
(29, 'players/zt.png', 'Zinchenko Oleksandr', 35, 'Defender', 'Ukrainian', 'flags/ukr.png', '1996-12-15', '2022-07-04', 'Men', 'A versatile left-back who can also play in midfield.'),
(30, 'players/rl.png', 'Reiss Nelson', 24, 'Forward', 'English', 'flags/eng.png', '1999-12-10', '2017-01-01', 'Men', 'A winger with flair and the ability to score spectacular goals.'),
(31, 'players/ts.png', 'Takehiro Tomiyasu', 18, 'Defender', 'Japanese', 'flags/jpn.png', '1998-11-05', '2021-08-31', 'Men', 'A hardworking defender known for his tactical awareness.'),
(32, 'players/bw.png', 'Ben White', 4, 'Defender', 'English', 'flags/eng.png', '1997-10-08', '2021-07-30', 'Men', 'A composed ball-playing center-back/right-back.'),
(33, 'players/fv.png', 'Fabio Vieira', 21, 'Midfielder', 'Portuguese', 'flags/por.png', '2000-05-30', '2022-07-01', 'Men', 'A technical midfielder with excellent passing and creativity.'),
(34, 'players/tw.png', 'Trossard Leandro', 19, 'Forward', 'Belgian', 'flags/bel.png', '1994-12-04', '2023-01-20', 'Men', 'A versatile winger/forward known for his dribbling and composure.'),
(35, 'players/ds.png', 'Declan Rice', 41, 'Midfielder', 'English', 'flags/eng.png', '1999-01-14', '2023-07-15', 'Men', 'An elite defensive midfielder.'),
(36, 'players/km.png', 'Kai Havertz', 29, 'Midfielder', 'German', 'flags/ger.png', '1999-06-11', '2023-07-01', 'Men', 'A technically gifted midfielder with versatility and composure.');

COMMIT;
