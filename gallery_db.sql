-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 11:28 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `filename` varchar(256) NOT NULL,
  `alternate_text` varchar(255) NOT NULL,
  `type` varchar(256) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `caption`, `description`, `filename`, `alternate_text`, `type`, `size`) VALUES
(9, 'Red car', '', '', 'images-26.jpg', '', 'image/jpeg', 21802),
(10, 'Blue car', '', '', 'images-41.jpg', '', 'image/jpeg', 16296),
(12, 'Bambol Bee', 'Bambol Bee', 'A transformer', '_large_image_4.jpg', 'Image Bee', 'image/jpeg', 554659),
(14, 'Art work', 'New Caption', 'List1', 'images-18.jpg', 'New Image_L', 'image/jpeg', 27595),
(15, 'Gouls', 'New Caption', '<p>New Description For learge Blod card</p>', '_large_image_2.jpg', 'Image Beed', 'image/jpeg', 309568),
(17, 'winds', 'Somed', 'New Description For learge Blod carddd', 'images-22.jpg', 'd', 'image/jpeg', 21133),
(18, '', '', '', 'images-25.jpg', '', 'image/jpeg', 19363),
(19, '', '', '', 'images-39.jpg', '', 'image/jpeg', 24969),
(20, '', '', '', 'images-50.jpg', '', 'image/jpeg', 21652),
(21, '', '', '', 'images-7.jpg', '', 'image/jpeg', 24140),
(22, '', '', '', 'images-20.jpg', '', 'image/jpeg', 22942),
(23, '', '', '', 'images-21.jpg', '', 'image/jpeg', 19957),
(24, '', '', '', 'images-24.jpg', '', 'image/jpeg', 29850);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `user_image`) VALUES
(2, 'ayato', '1234', 'ayato', 'higashi', 'images-5.jpg'),
(14, 'None', '1234', 'Ayato', 'Higashi', 'images-22.jpg'),
(22, 'AnimeMan', '1234', 'nnn', 'nnn', 'images.jfif'),
(23, 'Car with woman', 'nnn', 'nnn', 'nnn', 'images-14.jpg'),
(24, 'Classic', 'aaa', 'nnn', 'nnn', 'images-23.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
