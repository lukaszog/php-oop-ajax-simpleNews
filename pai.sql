-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Lut 2016, 18:51
-- Server version: 5.6.17-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pai`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `news_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id`, `create_time`, `user`, `comment`, `news_id`, `user_id`) VALUES
(1, '2016-02-13 08:24:20', 'ja@com.pl', 'Pierwszy komentarz', 0, 0),
(2, '2016-02-13 08:24:20', 'ty@com.pl', 'Drugi komentarz', 0, 0),
(3, '2016-02-13 11:15:36', '', '', 0, 0),
(4, '2016-02-13 11:18:14', 'elo', 'komentarz', 0, 0),
(5, '2016-02-13 11:18:52', 'lukasz', 'test', 0, 0),
(6, '2016-02-13 11:21:43', '', '', 0, 0),
(7, '2016-02-13 11:21:46', '', '', 0, 0),
(8, '2016-02-13 11:21:50', 'luksdx', 'sdf', 0, 0),
(9, '2016-02-13 11:24:21', '', '', 0, 0),
(10, '2016-02-13 11:24:52', '', '', 0, 0),
(11, '2016-02-13 11:25:06', '', '', 0, 0),
(12, '2016-02-13 11:31:28', 'rtry', 'try', 1, 0),
(13, '2016-02-13 11:51:54', 'asd', 'asd', 1, 0),
(14, '2016-02-13 12:11:00', 'nowy', 'elo', 1, 0),
(15, '2016-02-13 15:55:54', 'asd', 'asdsad', 1, 0),
(16, '2016-02-13 16:15:45', 'lukassz', 'asd66', 1, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` datetime NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `user` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `news`
--

INSERT INTO `news` (`id`, `create_date`, `title`, `text`, `user`) VALUES
(1, '2016-02-11 00:00:00', 'Tytul newsa', 'tresc', '1'),
(2, '2016-02-16 00:00:00', 'News 2', 'tresc 2', '2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `joining_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_password`, `joining_date`) VALUES
(3, 'lukassz', 'lukasz.ogan@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '2016-02-13 15:54:43');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
