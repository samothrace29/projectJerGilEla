-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2019 at 11:38 AM
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
