-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 29, 2021 at 08:52 AM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coupondeck`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
);

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `image`) VALUES
(1, 'Books', 'Books.jpeg'),
(2, 'Business', 'Business.jpg'),
(3, 'Developer Tools', 'Developertools.jpg'),
(4, 'Education', 'Education.jpg'),
(5, 'Entertainment', 'Entertainment.jpg'),
(6, 'Finance', 'Finance.jpg'),
(7, 'Food & Drink', 'fooddrink.png'),
(8, 'Gaming', 'Games.jpg'),
(9, 'Graphics & Design', 'Graphic&design.jpg'),
(10, 'Health & Fitness', 'Health&fitness,jpg'),
(11, 'Lifestyle', 'Lifestyle.jpg'),
(12, 'Kids', 'Kids.jpg'),
(13, 'Magazines & Newspapers', 'Magazines&newspaper,jpg'),
(14, 'Medical', 'Medical.png'),
(15, 'Music', 'music-general-piano.png'),
(16, 'Navigation', 'Navigation.jpg'),
(17, 'News', 'News_1.jpg'),
(18, 'Photo & Video', 'Photo&video.jpg'),
(19, 'Productivity', 'Productivity.png'),
(20, 'Reference', 'reference.jpg'),
(21, 'Shopping', 'Shopping.jpg'),
(22, 'Social Networking', 'social_media_1.jpg'),
(23, 'Sports', 'Sports.jpg'),
(24, 'Travel', 'travel-world.jpg'),
(25, 'Utilities', 'utility.jpg'),
(26, 'Weather', 'Weather.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
