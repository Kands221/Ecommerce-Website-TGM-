-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 07:20 PM
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
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(14, 9, 11, 2),
(15, 9, 13, 5),
(16, 9, 3, 2),
(17, 9, 1, 3),
(18, 10, 13, 3),
(19, 10, 2, 4),
(20, 10, 19, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int(2) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'Pandan', 'milk', 'Ready for a fun twist? Try our Pandan Good Milk. This mix of creamy milk with the distinct flavor of Pandan is not just a treat to your taste buds but it’s also a gentle reminder that just like how the Pandan leaves bloom, you too have your own special wa', 'pandan product.png', 'Locally Produced.png', 'Fresh Quality.png', 'Organic.png', 99.00, 0, ''),
(2, 'Original Fresh Milk', 'milk', 'Our Fresh Milk is the OG one. Its like a hug in a glass bottle. It brings the sweet and smooth taste of vanilla, reminding you of yummy treats from childhood. This OG flavor is not overwhelming but gently lingers, making every moment of your day a bit swe', 'Fresh Milk Product.png', 'Locally Produced.png', 'Fresh Quality.png', 'Organic.png', 99.00, 0, ''),
(3, 'Strawberry', 'milk', 'Imagine a day that\'s vibrant and full of flair. That\'s the vibe of our Strawberry Good Milk. Every sip offers a rush of strawberries, capturing their fresh and sweet essence perfectly.  Stored in our sterilized 250ml glass bottles, the metal lid ensures t', 'Strawberry Product.png', 'Locally Produced.png', 'Fresh Quality.png', 'Organic.png', 99.00, 0, ''),
(4, 'Chocolate', 'milk', 'Our Chocolate Good Milk is a real treat! Every glass is full of yummy cocoa flavor, making your day feel special. It’s smooth and chocolaty, like a loud chocolate adventure in every sip.  Stored in our sterilized 250ml glass bottles, the metal lid ensures', 'Chocolate Product.png', 'Locally Produced.png', 'Fresh Quality.png', 'Organic.png', 99.00, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`) VALUES
(9, 9, 'PAY-1RT494832H294925RLLZ7TZA', '2018-05-10'),
(10, 9, 'PAY-21700797GV667562HLLZ7ZVY', '2018-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `created_on`) VALUES
(15, 'andeskyle22@gmail.com', '$2y$10$1o1Pnky8LwEPTosGBMTzQOIWi7.IL5eZNFErJQA9weRu/qp9fWsgG', 0, 'Kyle Joseph', 'Andes', '', '', '', '2024-01-14'),
(16, 'kyleandes13@gmail.com', '$2y$10$7S6uF5DRCRhCuU3rjoTrvesV72.9w4TlvO96Hi64ZEVcxp6v0G39u', 0, 'Kyle Joseph', 'Andes', '', '', '', '2024-01-14'),
(17, 'hotdog@gmail.com', '$2y$10$DEskXHtOtTH6PxpgmE.IPeFyr8aEPk5v03xg6WVpCkwfJcOLyJ0By', 0, 'Kyle Joseph', 'Andes', '', '', '', '2024-01-14'),
(18, 'hotdog1@gmail.com', '$2y$10$npK10qUbiyYbYjxROZwAwuGe/ICt7hkPkzLFDlMbw.khD9wbtzbQe', 0, 'Kyle Joseph', 'Andes', '', '', '', '2024-01-14'),
(19, 'hotdog12@gmail.com', '$2y$10$CgIavLfvjuybw8e65epTBuuT863oo70x1YvFqJJnluy6SbZYUHkxm', 0, 'Kyle Joseph', 'Andes', '', '', '', '2024-01-14'),
(20, 'hotdog122@gmail.com', '$2y$10$rc2So2bHkCgY0pj.J5hTTecsEEyWdGIsbF7VgVgHrFLWzktt2J1SG', 0, 'Kyle Joseph', 'Andes', '', '', '', '2024-01-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
