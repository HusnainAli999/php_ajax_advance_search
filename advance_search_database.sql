-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 09:15 AM
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
-- Database: `advance_search_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `products_table`
--

CREATE TABLE `products_table` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `colors` text NOT NULL,
  `country` text NOT NULL,
  `gender` text NOT NULL,
  `version` text NOT NULL,
  `price` text NOT NULL,
  `ratings` text NOT NULL,
  `category` text NOT NULL,
  `warranty` int(11) NOT NULL,
  `cod` int(11) NOT NULL,
  `verified` int(11) NOT NULL,
  `add_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_table`
--

INSERT INTO `products_table` (`id`, `title`, `colors`, `country`, `gender`, `version`, `price`, `ratings`, `category`, `warranty`, `cod`, `verified`, `add_at`) VALUES
(1, 'Car With Black Colors with heavy weight and new model', 'black, white, green', 'Pakistan', 'both', '1.1', '1200000', '5', 'Cars', 1, 0, 1, '2023-12-14 08:33:36'),
(2, 'Shoes With Red and white colors available with soft inner layer', 'black, red, white', 'Palestine', 'male', '2.4', '7000', '2.6', 'Shoes', 1, 1, 0, '2023-12-18 08:33:36'),
(3, 'Beyond Boundaries: Exploring the World of Cutting-Edge Laptops', 'black, white', 'Pakistan', 'female', '1.1', '35000', '5', 'Electronics', 1, 0, 1, '2023-12-28 08:33:38'),
(4, 'Shoes With Red and white colors available with soft inner layerIn the Lap of Innovation: Choosing the Right Laptop for You of Lenovo', 'black', 'Bhutan', 'female', '2.4', '25000', '3.5', 'Electronics', 1, 1, 1, '2023-12-28 08:33:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products_table`
--
ALTER TABLE `products_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products_table`
--
ALTER TABLE `products_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
