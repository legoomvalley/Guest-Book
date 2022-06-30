-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2022 at 02:26 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_quest_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` varchar(6) NOT NULL,
  `User_Pass` varchar(6) NOT NULL,
  `User_Type` varchar(5) NOT NULL,
  `User_FullName` varchar(30) DEFAULT NULL,
  `User_NickName` varchar(10) DEFAULT NULL,
  `User_Gender` varchar(6) NOT NULL,
  `User_HpNo` varchar(12) DEFAULT NULL,
  `User_SocialAcc` varchar(20) DEFAULT NULL,
  `User_Picture` varchar(50) NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Pass`, `User_Type`, `User_FullName`, `User_NickName`, `User_Gender`, `User_HpNo`, `User_SocialAcc`, `User_Picture`) VALUES
('Admin', 'Admin', 'Admin', NULL, NULL, '', NULL, NULL, ''),
('hakim', '123', 'user', 'hakim', 'hakim', 'Male', '22222', 'hakim', 'uploads/anime_chibi.jpg'),
('adin', '123', 'user', 'Aizuddin ', 'adin', 'Male', '11111111', 'adin', 'uploads/d35d875fca07dd1079d3002d489f39b3.jpg'),
('saliza', '123', 'user', 'saliza', 'saliza', 'Female', '999', 'saliza', 'uploads/hitler.png');

-- --------------------------------------------------------

--
-- Table structure for table `wish_book`
--

DROP TABLE IF EXISTS `wish_book`;
CREATE TABLE IF NOT EXISTS `wish_book` (
  `Wish_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Wish_User` varchar(255) NOT NULL,
  `Wish_Date` datetime DEFAULT NULL,
  `User_ID` varchar(6) DEFAULT NULL,
  `User_NickName` varchar(10) DEFAULT NULL,
  `Wish_Photo` varchar(50) NOT NULL,
  PRIMARY KEY (`Wish_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wish_book`
--

INSERT INTO `wish_book` (`Wish_ID`, `Wish_User`, `Wish_Date`, `User_ID`, `User_NickName`, `Wish_Photo`) VALUES
(83, 'king', '2020-04-22 02:56:02', 'hakim', 'hakim', 'uploads/download (3).jpg'),
(84, 'baju', '2020-04-22 03:09:48', 'adin', 'adin', 'uploads/_9ouOIut_400x400.jpg'),
(85, 'matriye', '2020-04-22 03:11:41', 'adin', 'adin', 'uploads/download (1).jpg'),
(86, 'moon', '2020-04-22 03:13:29', 'saliza', 'saliza', 'uploads/FullMoon2010.jpg'),
(88, 'esrtdfgc', '2020-04-22 03:18:12', 'Admin', 'Admin', 'uploads/57a4d8a6fe272f8fdcc8e43511b7838a.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
