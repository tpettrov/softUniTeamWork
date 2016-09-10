-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2016 at 01:06 PM
-- Server version: 5.5.48-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bikeclou_yii_basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `my_user`
--

CREATE TABLE IF NOT EXISTS `my_user` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `authKey` varchar(15) DEFAULT NULL,
  `fullname` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `my_user`
--

INSERT INTO `my_user` (`id`, `username`, `password`, `authKey`, `fullname`) VALUES
(52, 'Admin', '$2y$13$tEQ9yhriJ0S40Cksa57GQeNdGmlE1fVyybpGvSSA5NwpkIZ37vTnC', NULL, 'Ралица Желязкова'),
(53, 'apetrov', '$2y$13$lLpfVBE8vAoJ7055wVyve.vZxISRO0JGGC1bX9yZ86K7ySO2V3Csm', NULL, 'Антон Петров'),
(54, 'valentin', '$2y$13$qoB6ztCha0yxOiOfKpsm0.posGBT1R4T2YqhfUaUVEOYXgKi6lG16', NULL, 'Валентин Георгиев'),
(55, 'Валентин', '$2y$13$y/2u4RiWasC12sVifEhkreq5dgpxTUk8/c1avkEewvxCuZCpaYs0S', NULL, 'Валентин Георгиев'),
(62, 'sdjadsa', '$2y$13$8IhvFJi/WkcdJr4Tqt4.ZuAwy4mHpt3TseAMSD19URou429nD65PG', NULL, 'sdadsa'),
(63, 'Ivan', '$2y$13$tP02oEihHVv4nw.YeStpMOu1UrdaA6LbeGW3yevS4FMxyoFmCVWAq', NULL, 'Ivan Ivanov'),
(65, 'cvb', '$2y$13$rs4b/THx.aZbtCBRw3eE9ubDJ1Lx/fylnbU5jbJUaGGBXdxKX/OJm', NULL, 'cvb'),
(66, 'jhj', '$2y$13$l8pwv.J2x751bSRZT7kzwui0AxWE5EoFmq8b5u3C5RSyiqZDtARYO', NULL, 'hsdja'),
(67, 'dsa', '$2y$13$cCBUw6GuJ/0YGyVBu6dYqOUrvRgqU3qs9MeAjN45cg/Z18CIbkgUy', NULL, 'dsa'),
(68, 'hj', '$2y$13$7LPSdDNyRIP0KPcqf9V0oepjd1jtOLA2b.sn46zj1O6dw5EOxMIyG', NULL, 'hj'),
(69, 'gfd', '$2y$13$vwsp2c6RevZO58xLFLmsleGWNnfu1k0RY1MBvL7586qjAb0VRB1Na', NULL, 'Admin'),
(70, 'nnn', '$2y$13$iBbMIjhIGAq.3VZrJxEqveARpC8SHVqG0r69YLCoqJPIQwkfR8ov.', NULL, 'nnn'),
(71, '', '$2y$13$8os.AEjYuqh9Qgm0ZS.DR.kffT81s9L7QL3hqw1eOOctONw5ogIdK', NULL, ''''),
(73, 'test123', '$2y$13$WTS8YC7FyA/WRR5gCdvK6.TxrgKh0CjTquHYc3NKYgAnZsdWUg3Na', NULL, 'Тест 123');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` mediumtext NOT NULL,
  `adress` varchar(45) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state` varchar(45) NOT NULL,
  `user` varchar(45) DEFAULT NULL,
  `holder` varchar(45) DEFAULT 'няма',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `user_name_order_idx` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `content`, `adress`, `date`, `state`, `user`, `holder`) VALUES
(19, 'Моливи', 'Сребърна', '2016-08-19 13:54:19', 'Доставена', 'apetrov', 'Иван Иванов'),
(21, 'Моливи от web', 'web', '2016-08-20 16:42:38', 'Доставена', 'Admin', 'няма'),
(22, 'Поръчка 1 "крилица" кавички\r\nнов ред!\r\n/мамааа', 'адрес но''мер', '2016-08-20 16:52:42', 'Склад', 'test123', 'няма'),
(23, 'abv', 'abv', '2016-08-20 18:50:25', 'обработва се', 'apetrov', 'няма');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `user_name_order` FOREIGN KEY (`user`) REFERENCES `my_user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
