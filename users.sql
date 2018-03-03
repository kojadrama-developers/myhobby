-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2018 at 06:59 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(2, 'bbb', 'bbb@gmail.com', '08f8e0260c64418510cefb2b06eee5cd'),
(3, 'bbb1', 'bbb1@gmail.com', '08f8e0260c64418510cefb2b06eee5cd'),
(4, 'bbb2', 'bbb2@gmail.com', '08f8e0260c64418510cefb2b06eee5cd'),
(5, 'aaa', 'aaa@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808'),
(7, 'ccc', 'ccc@gmail.com', '9df62e693988eb4e1e1444ece0578579'),
(8, 'ccc', 'ccc@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808'),
(9, 'ccc', 'ccc@gmail.com', '21ad0bd836b90d08f4cf640b4c298e7c'),
(10, 'eee', 'eee@gmail.com', 'd2f2297d6e829cd3493aa7de4416a18f'),
(11, 'aaa', 'aaa@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
