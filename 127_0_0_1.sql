-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2018 at 09:16 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testassignmentlaravel`
--
CREATE DATABASE IF NOT EXISTS `testassignmentlaravel` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `testassignmentlaravel`;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` bigint(20) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `description` text,
  `realease_date` datetime DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `ticket_price` float DEFAULT NULL,
  `country` varchar(80) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `slug`, `name`, `description`, `realease_date`, `rating`, `ticket_price`, `country`, `status`, `created_at`, `updated_at`) VALUES
(1, 'alpha', 'Alpha', 'Demo Movie', '1970-01-01 12:00:00', 1, 100, 'USA', 1, '2018-09-23 18:21:37', NULL),
(2, 'alpha', 'Alpha', 'Demo Movie', '2018-09-23 12:00:00', 1, 100, 'USA', 1, '2018-09-23 18:22:24', NULL),
(3, 'alphas', 'Saikat', 'Demo', '2018-09-23 12:00:00', 2, 111, 'India', 1, '2018-09-23 18:25:21', NULL),
(4, 'alphas', 'Saikat', 'Demo', '2018-09-23 00:00:00', 2, 111, 'India', 1, '2018-09-23 18:26:44', '2018-09-23 19:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `flim_genres`
--

CREATE TABLE `flim_genres` (
  `id` bigint(20) NOT NULL,
  `flim_id` bigint(20) DEFAULT NULL,
  `genre` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flim_genres`
--

INSERT INTO `flim_genres` (`id`, `flim_id`, `genre`) VALUES
(1, 1, 'Drama'),
(2, 1, ' Horror'),
(3, 4, 'Erotic'),
(4, 4, ' Romance');

-- --------------------------------------------------------

--
-- Table structure for table `flim_media`
--

CREATE TABLE `flim_media` (
  `id` bigint(20) NOT NULL,
  `film_id` bigint(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `flim_reviews`
--

CREATE TABLE `flim_reviews` (
  `id` bigint(20) NOT NULL,
  `film_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `roles_id` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL COMMENT '0: Inactive, 1:Active',
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `roles_id`, `username`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'saikat.das', '$2y$10$a7j6Z2mlyJGNFbh4laaFr.t4jvLobldGd633GFoiJwrNBH7GIzZgC', 1, 'wN3hq5nKbmGCN5fX94x26RJToKsjCVsaKV1cKp6Oesp0iI6bf8mR8XxDknq2', '2018-09-20 01:05:10', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flim_genres`
--
ALTER TABLE `flim_genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flim_media`
--
ALTER TABLE `flim_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film_id` (`film_id`);

--
-- Indexes for table `flim_reviews`
--
ALTER TABLE `flim_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film_id` (`film_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_id` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `flim_genres`
--
ALTER TABLE `flim_genres`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `flim_media`
--
ALTER TABLE `flim_media`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flim_reviews`
--
ALTER TABLE `flim_reviews`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
