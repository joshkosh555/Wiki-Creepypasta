-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 02:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `members_cawaling`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `psword` char(255) DEFAULT NULL,
  `registration_date` datetime DEFAULT NULL,
  `user_level` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `psword`, `registration_date`, `user_level`) VALUES
(1, 'admin', 'josh', 'admin@com', '$2y$10$7RonepUV8wVMPFyhcm209.XXC7bFkdXduhm5iJCmLAuYfppk1tggy', '2024-12-05 11:25:13', 1),
(2, 'Walter', 'Whites', 'juniorwhite@gmail.com', '$2y$10$aNfCS3psOVjpIsssDqUCmeXKS444Jaq7K', '2024-10-02 19:17:25', 0),
(4, 'Spongebob', 'Squarepants', 'ilovegary505@bikinibottom.com', '$2y$10$sXFPmTwnW5H0gWTjY2hQceut1HTdQVprP', '2024-11-09 10:25:02', 0),
(5, 'Lebron', 'Jahames', 'basketballislife123@gmail.com', '$2y$10$bnPCdq8YJuY7T5HeSQ//ue/XdSeQfn.Do', '2024-11-12 19:21:11', 0),
(6, 'Taylor', 'Swift', '123321@yahoo.com', '$2y$10$8oLNBkXEpTIjQTPLTREob.w9rcYVY0c.H', '2024-11-12 19:23:12', 0),
(7, 'Wag', 'Po Del Ete', 'wagpohahaha@gmail.com', '$2y$10$qpZAfPuvuTTkYtHXRGJ4Fu05eLvpz32nY', '2024-11-12 19:25:25', 0),
(8, 'Josh', 'cawaling', 'josh@josh', '$2y$10$Tg.gA5VqNWSwlAEL.GsPUOTN.LiE15h0C', '2024-10-02 14:47:44', 0),
(17, 'nice', 'nice', 'wala@y.com', '$2y$10$XFSngvqhEm060QbYIS7bbOsz0o3iSpY4.QHwKVy6VH67S3CBRx9oW', '2024-11-14 10:45:47', 0),
(19, 'member1', 'member1last', 'member@com', '$2y$10$iIbQ34L0tNNRqSEV1rEGKOP3LvMrK03.WvLHnUhPP7We5SLk5mJZy', '2024-12-05 12:35:11', 0),
(21, 'testingulit1', 'testing', 'member3@com', '$2y$10$J0fisDGm4mzd41I2qrc9ueYOU1/eZ4ehSUFFPF4GtDOaD7vaqWfoi', '2024-12-11 21:34:09', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
