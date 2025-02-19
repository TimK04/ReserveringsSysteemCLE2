-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2025 at 12:29 PM
-- Server version: 8.4.2
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cle2`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `text` text COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `first_name`, `last_name`, `email`, `time`, `date`, `text`, `user_id`) VALUES
(1, 'iemand', 'test', 'ikwildittesten@gmail.com', '00:00:00', '1970-10-20', 'Eten heel veel eten', NULL),
(10, 'iemand', 'test', 'test@test.com', '00:00:00', '1970-01-01', 'test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test ', 3),
(11, 'iemand', 'test', 'test@test.com', '00:00:00', '1970-01-01', 'iets', 3),
(12, 'test', 'test', 'iets.test@gmail.com', '09:45:00', '2025-01-24', 'test', 15),
(13, 'test', 'test', 'iets.test@gmail.com', '09:45:00', '2025-01-16', 'test    border-radius: 7px;   border-radius: 7px;   border-radius: 7px;   border-radius: 7px;   border-radius: 7px;', 15);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `admin_id`) VALUES
(2, 'Thomas', 'van Bockel', 'tvbockel@student.lentiz.nl', '$2y$10$zgqgNYwEUmYXQh1XP1cM7.94Abp2L1pEViftyLkIsv0i9.znZi72i', 0),
(3, 'iemand', 'test', 'test@test.com', '$2y$10$093GaY6oqd9revZgXvDpRe5Hc.wSi1MU6Z9.B92iFZHOohjSzGUIS', 1),
(6, 'Thomas', 'van Bockel', 'test@mail.com', '$2y$10$C0xi8I6KwZSXtE56YZi76eJSammK8XPxF8KZFoogDHpyzIHWK5Pi6', 0),
(7, 'Thomas', 'van Bockel', '2@mail.com', '$2y$10$LcxVFs9aDk0U/zN510ztvOc3DWx8KROsjxEAox94M8Aw3xxHYN/tW', 0),
(8, 'Thomas', 'van Bockel', 'mail@iets.nl', '$2y$10$cpIQQVZTtOwrafTZYtdZK.9KndY67AGH7GQf33cI9uRJWZJMioobq', 1),
(9, 'Thomas', 'van Bockel', 'dit@email.com', '$2y$10$HNlqlyz05/btSyFDEExvJ.3jEjWfWInza63FxOHxbB0nbX3v.RjEm', 0),
(10, 'tell', 'me', 'why@someone.like', '$2y$10$PUQRD3iK3NitgteEERzUV.dVKPabXU6F.Jjk2hn0/Y4UKwkAzDKsS', 0),
(11, 'Test', 'Test', 'iets@google.com', '$2y$10$LcnjkhajPzIhXXVMjgCMBOks1L/bOvUks2O85Am0ru8OSUAHxmdoC', 0),
(12, 'Test', '01234567890123456789012345678901234567890123456789', 'test@testtest.com', '$2y$10$0uCQa6iyKzGdUL3sf9eWkOLSW1kekxkFOO6dzS/.SwTZiCJtSx2o2', 0),
(13, 'test', 'test', 'test@testtest.nl', '$2y$10$JmitdZuKkWPHlX0TPriHme5Ro/BVchPZY37mfyDtaKeO7RGCPY.S6', 0),
(14, 'Test', 'Test', 'ditistest@test.com', '$2y$10$gqAIcFh0E/s78bQoK00QY.VPiefqfSl/FCl2hiSn5Ti9D4QpdMOQu', 0),
(15, 'test', 'test', 'iets.test@gmail.com', '$2y$10$tmxsOG2TBf7Bx/1cl0bsBemZb7vnymPncHozZBkH5nSG9qKp315.O', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
