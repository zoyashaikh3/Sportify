-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 12:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportify_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `playground_id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `sports` varchar(255) NOT NULL,
  `entry_fee` decimal(10,2) NOT NULL,
  `min_members` int(11) NOT NULL,
  `winning_prize` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_applications`
--

CREATE TABLE `event_applications` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `applied_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playgoundlist`
--

CREATE TABLE `playgoundlist` (
  `playgoundlist` varchar(44) DEFAULT NULL,
  `sector` int(2) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `playgoundlist`
--

INSERT INTO `playgoundlist` (`playgoundlist`, `sector`, `id`) VALUES
('Vashi - Dribble Haware Fantasia', 8, 1),
('Vashi - Goalbox Sainath Turf', 28, 2),
('Vashi - Fr. Agnel Astroturf', 12, 3),
('Vashi - Meckavo Sports?', 3, 4),
('Vashi - Gallant Sports Infra', 28, 5),
('Vashi - Nmsa Ground', 12, 6),
('Vashi - Rajiv Gandhi College Vashi Sports', 42, 7),
('Vashi - Cosmos Ground', 30, 8),
('Sanpada - Vpro Cricket Indoor Turf', 10, 9),
('Nerul - Ultra Instinct Sports Academy Turf', 9, 10),
('Nerul - Terna Turf Ground Sector', 30, 11),
('Nerul - Xavier\'S', 3, 12),
('Nerul - Trickshot India', 1, 13),
('Nerul - Urban Sports- Nr Bhagat', 1, 14),
('Seawoods - Don Bosco Football Turf', 1, 15),
('Belapur - Sports Ground', 13, 16),
('Kharghar - Skygoal - The Multisports Turf', 5, 17),
('Kharghar - Empyrean Turf', 35, 18),
('Kharghar - Kpc Turf', 16, 19),
('Kharghar - Radcliffe Turf, Super Sports Park', 8, 20),
('Panvel - Turfit', 16, 21),
('Panvel - Ground Zero Turf', 8, 22),
('Panvel - Karnala Sports Academy', 16, 23),
('Panvel - Soccer City Panvel', 10, 24),
('Panvel - Sportsbox', 45, 25),
('Panvel - Skygoal', 6, 26);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'adil', 'adilfaridi07@gmail.com', '$2y$10$T0n5AUTZDZvsmoUPGaqzPuGN.lXrXLjdg5xYCM2UNrUocv5JGFl0y', '2024-08-27 17:37:17'),
(9, 'aliya', 'aliya@gmail.com', '$2y$10$XQnwi0Hy0uMX1LrJR502yemWaWZEuLzId1.XkaMC2njMqKfXSdw7i', '2024-08-27 20:07:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playground_id` (`playground_id`);

--
-- Indexes for table `event_applications`
--
ALTER TABLE `event_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_applications_ibfk_1` (`event_id`);

--
-- Indexes for table `playgoundlist`
--
ALTER TABLE `playgoundlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_applications`
--
ALTER TABLE `event_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `playgoundlist`
--
ALTER TABLE `playgoundlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`playground_id`) REFERENCES `playgoundlist` (`id`);

--
-- Constraints for table `event_applications`
--
ALTER TABLE `event_applications`
  ADD CONSTRAINT `event_applications_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
