-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 14 jun 2018 kl 22:35
-- Serverversion: 10.1.32-MariaDB
-- PHP-version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `mittsnittbetyg`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `grades`
--

CREATE TABLE `grades` (
  `g_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `g_course_name` varchar(256) NOT NULL,
  `g_course_grade` varchar(256) NOT NULL,
  `g_course_value` int(11) NOT NULL,
  `g_course_unique_id` int(11) NOT NULL,
  `g_course_delete_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(256) NOT NULL,
  `user_lastname` varchar(256) NOT NULL,
  `user_mail` varchar(256) NOT NULL,
  `user_username` varchar(256) NOT NULL,
  `user_password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_mail`, `user_username`, `user_password`) VALUES
(1, 'Felix', 'HÃ¶rnfeldt', 'felix.hornfeldt@outlook.com', 'HorNen', '$2y$10$tIP1s1zdyr4QtyYxMKwz.uo5QcoTvoJPBjtZ7XJpxgozrkQf.NAjW');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`g_id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `grades`
--
ALTER TABLE `grades`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
