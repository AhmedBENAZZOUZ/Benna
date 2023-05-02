-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 02, 2023 at 09:01 AM
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
-- Database: `benna`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `deleteduser`
--

DROP TABLE IF EXISTS `deleteduser`;
CREATE TABLE IF NOT EXISTS `deleteduser` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `deltime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleteduser`
--

INSERT INTO `deleteduser` (`id`, `email`, `deltime`) VALUES
(21, 'ahmed@gmail.com', '2023-04-30 09:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender` varchar(50) NOT NULL,
  `reciver` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `feedbackdata` varchar(500) NOT NULL,
  `attachment` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`id`, `name`, `image`, `description`, `created_at`) VALUES
(1, 'batata', '', 'batata safra', '2023-04-30 23:50:28'),
(2, 'batata', '', 'batata safra', '2023-04-30 23:50:28');

--
-- Triggers `ingredient`
--
DROP TRIGGER IF EXISTS `name_ing_maj`;
DELIMITER $$
CREATE TRIGGER `name_ing_maj` BEFORE INSERT ON `ingredient` FOR EACH ROW SET NEW.name = UPPER(NEW.name)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `notiuser` varchar(50) NOT NULL,
  `notireciver` varchar(50) NOT NULL,
  `notitype` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `prep_time` varchar(20) NOT NULL,
  `nb_people` varchar(20) NOT NULL,
  `difficulty` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `instructions` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Triggers `recette`
--
DROP TRIGGER IF EXISTS `name_recette_maj`;
DELIMITER $$
CREATE TRIGGER `name_recette_maj` BEFORE INSERT ON `recette` FOR EACH ROW SET NEW.name = UPPER(NEW.name)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `recette_images`
--

DROP TABLE IF EXISTS `recette_images`;
CREATE TABLE IF NOT EXISTS `recette_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `recette_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `recette_id` (`recette_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `recette_ingredient`
--

DROP TABLE IF EXISTS `recette_ingredient`;
CREATE TABLE IF NOT EXISTS `recette_ingredient` (
  `recette_id` int NOT NULL,
  `ingredient_id` int NOT NULL,
  PRIMARY KEY (`recette_id`,`ingredient_id`),
  KEY `FK_ingredient_id` (`ingredient_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone` varchar(8) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `phone`, `adress`, `password`, `image`, `created_at`) VALUES
(3, 'keskidou', 'Aziz benmaaouia', 'azizbenmaaouia@gmail.com', '54896356', 'laaouina', 'cc8c0a97c2dfcd73caff160b65aa39e2', 'friend-avatar9.jpg', '2023-04-30 23:47:02'),
(4, 'Langoust', 'AHMED BEN AZZOUZ', 'abenazzouz16@gmail.com', '53269808', 'Ennasr', 'cc8c0a97c2dfcd73caff160b65aa39e2', 'red_g30.jpg', '2023-05-02 08:16:02'),
(5, 'elbah', 'MOHAMED AMINE ELBAH', 'elbah@gmail.com', '95863265', 'mornag', 'cc8c0a97c2dfcd73caff160b65aa39e2', 'Car-wash.205-A5.jpg', '2023-05-02 08:19:31');

--
-- Triggers `users`
--
DROP TRIGGER IF EXISTS `name_user_maj`;
DELIMITER $$
CREATE TRIGGER `name_user_maj` BEFORE INSERT ON `users` FOR EACH ROW SET NEW.name = UPPER(NEW.name)
$$
DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
