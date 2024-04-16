-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 07, 2024 at 07:48 PM
-- Server version: 11.2.2-MariaDB-1:11.2.2+maria~ubu2204
-- PHP Version: 8.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvcblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(100) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `content`, `created_at`, `deadline`, `category`, `user_id`) VALUES
(24, 'meow', 'nihao', '2024-04-04', '2024-04-06', 'home', 2),
(25, 'get up', 'yes', '2024-04-04', '2024-04-06', 'home', 2),
(30, 'Coffee', 'Buy 10 cold coffee', '2024-04-07', '2024-04-08', 'work', 1),
(31, 'go for walk', 'walkingggg', '2024-04-07', '2024-04-11', 'home', 1),
(32, 'work from home', 'workingg', '2024-04-07', '2024-04-10', 'home', 2),
(33, 'nice', 'really', '2024-04-07', '2024-04-09', 'home', 1);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'Dipika', '$2y$10$320RHsXp6HWpcZhtQHNR6uD3JQxULOdbzl8.zbw25Itxv5NvV/V0C', 'dipika@gmail.com'),
(2, 'Test', '$2y$10$/XvMTHsjBgwao0zFLfA4..u0OxYzI3mABVDXHdJbWls5hAskYqNzS', 'test@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
