-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2019 at 01:49 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectejg`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `release_year` int(11) NOT NULL,
  `synopsis` varchar(9999) DEFAULT NULL,
  `poster` varchar(200) DEFAULT NULL,
  `category` varchar(99) DEFAULT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `release_year`, `synopsis`, `poster`, `category`) VALUES
(1, 'Marie Antoinette', 1990, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula lacus leo, eu vestibulum tortor convallis sit amet. Donec libero augue, laoreet at euismod ac, tempus eget diam. Phasellus semper finibus ex, nec pulvinar mi tincidunt vel.', 'marie.jpg', 'Drama'),
(2, 'Pan\'s Labyrinth', 2006, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula lacus leo, eu vestibulum tortor convallis sit amet. Donec libero augue, laoreet at euismod ac, tempus eget diam. Phasellus semper finibus ex, nec pulvinar mi tincidunt vel.', 'pans.jpg', 'Fantasy'),
(3, 'A.I. Artificial Intelligence', 2001, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula lacus leo, eu vestibulum tortor convallis sit amet. Donec libero augue, laoreet at euismod ac, tempus eget diam. Phasellus semper finibus ex, nec pulvinar mi tincidunt vel.', 'ai.jpg', 'Science Fiction'),
(4, 'Inglourious Basterds', 2009, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula lacus leo, eu vestibulum tortor convallis sit amet. Donec libero augue, laoreet at euismod ac, tempus eget diam. Phasellus semper finibus ex, nec pulvinar mi tincidunt vel.', 'inglorious.jpg', 'Action'),
(5, 'Harry Potter', 2019, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula lacus leo, eu vestibulum tortor convallis sit amet. Donec libero augue, laoreet at euismod ac, tempus eget diam. Phasellus semper finibus ex, nec pulvinar mi tincidunt vel.', 'harry.jpg', 'Fantasy'),
(6, 'I spit on your grave', 2019, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula lacus leo, eu vestibulum tortor convallis sit amet. Donec libero augue, laoreet at euismod ac, tempus eget diam. Phasellus semper finibus ex, nec pulvinar mi tincidunt vel.', 'spit.jpg', 'Thriller'),
(7, 'Titanic', 2019, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula lacus leo, eu vestibulum tortor convallis sit amet. Donec libero augue, laoreet at euismod ac, tempus eget diam. Phasellus semper finibus ex, nec pulvinar mi tincidunt vel.', 'titanic.jpg', 'Drama'),
(8, 'Kung Fu Hustle', 2004, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula lacus leo, eu vestibulum tortor convallis sit amet. Donec libero augue, laoreet at euismod ac, tempus eget diam. Phasellus semper finibus ex, nec pulvinar mi tincidunt vel.', 'kung.jpg', 'Comedy'),
(9, 'Inception', 2004, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula lacus leo, eu vestibulum tortor convallis sit amet. Donec libero augue, laoreet at euismod ac, tempus eget diam. Phasellus semper finibus ex, nec pulvinar mi tincidunt vel.', 'inception.jpg', 'Action'),
(10, 'Hangover', 1998, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula lacus leo, eu vestibulum tortor convallis sit amet. Donec libero augue, laoreet at euismod ac, tempus eget diam. Phasellus semper finibus ex, nec pulvinar mi tincidunt vel.', 'hangover.jpg', 'Comedy'),
(11, 'Star Trek', 1987, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula lacus leo, eu vestibulum tortor convallis sit amet. Donec libero augue, laoreet at euismod ac, tempus eget diam. Phasellus semper finibus ex, nec pulvinar mi tincidunt vel.', 'star.jpg', 'Science Fiction'),
(12, 'Cabin in the woods', 1997, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula lacus leo, eu vestibulum tortor convallis sit amet. Donec libero augue, laoreet at euismod ac, tempus eget diam. Phasellus semper finibus ex, nec pulvinar mi tincidunt vel.', 'cabin.jpg', 'Thriller');

-- --------------------------------------------------------

--
-- Table structure for table `movies_playlist`
--

DROP TABLE IF EXISTS `movies_playlist`;
CREATE TABLE IF NOT EXISTS `movies_playlist` (
  `playlist_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  PRIMARY KEY (`playlist_id`,`movie_id`),
  KEY `movie_id` (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

DROP TABLE IF EXISTS `playlists`;
CREATE TABLE IF NOT EXISTS `playlists` (
  `playlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name_of_playlist` varchar(99) NOT NULL,
  `date_of_creation` date NOT NULL,
  PRIMARY KEY (`playlist_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `nickname` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_email` (`mail`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `nickname`, `mail`, `password`, `picture`) VALUES
(3, 'gilles_gilles', 'deh_deh_', 'myNick', 'dehautgilles@hotmail.com', '$2y$10$6sJ1q.uUrKyoIReKJfxXu.2x.foGc3gOEOZ0kS3VeOZIfx/OVBNvC', NULL),
(7, 'firstname', 'lastname', 'dehautgilles2@hotmail.com', 'dehautgilles2@hotmail.com', '$2y$10$8LccTw16p2bd2r8aFZpj1euLVduujf4PrMmSKbT0DaL8TTducZSO6', '0a03de5b45021ca0738db1a558d3894fb2c20291.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies_playlist`
--
ALTER TABLE `movies_playlist`
  ADD CONSTRAINT `movies_playlist_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`),
  ADD CONSTRAINT `movies_playlist_ibfk_2` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`playlist_id`);

--
-- Constraints for table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
