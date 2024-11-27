-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 04:26 PM
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
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`, `category`) VALUES
(84, 3, 'combtail', 100, 1, 'cmbbetta.PNG', 'Betta'),
(85, 3, 'pdert', 250, 1, 'pdertguppy.png', ''),
(100, 4, 'pdert', 250, 1, 'pdertguppy.png', 'Guppy'),
(145, 3, 'Platinum Dumbo Ear Mosaic', 500, 1, 'pdertguppy.png', 'Guppy'),
(146, 3, 'Lionhead', 2000, 1, 'lionhead.jpg', ''),
(148, 8, 'Platinum Dumbo Ear Mosaic', 500, 1, 'pdertguppy.png', 'Guppy'),
(165, 1, 'Platinum Dumbo Ear Mosaic', 500, 1, 'pdertguppy.png', 'Guppy');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL,
  `admin_reply` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`, `admin_reply`) VALUES
(30, 1, 'gemry', 'gemrydelle@gmail.com', '', 'hoy\r\n', 'unsa man'),
(31, 1, 'gemry', 'gemrydelle@gmail.com', '', 'wala ra', 'okay'),
(32, 1, 'gemry', 'gemrydelle@gmail.com', '', 'palit kog isda', 'unsa ganahan nimo'),
(33, 8, 'Rodney', 'rodney@gmail.com', '', 'dali ra maabot?', 'dali raman dong'),
(34, 1, 'gemry', 'gemrydelle@gmail.com', '', 'bro', 'yes?\r\n'),
(35, 1, 'gemry', 'gemrydelle@gmail.com', '', 'ha', 'wal ra'),
(36, 1, 'gemry', 'gemrydelle@gmail.com', '', 'ff', 'ss'),
(37, 1, 'gemry', 'gemrydelle@gmail.com', '', 'palit ko', 'og unsa man'),
(38, 1, 'gemry', 'gemrydelle@gmail.com', '', 'yes sir', 'what'),
(39, 1, 'gemry', 'gemrydelle@gmail.com', '', 'yo', 'saman'),
(40, 1, 'gemry', 'gemrydelle@gmail.com', '', 'hello\r\n', 'hi'),
(41, 1, 'gemry', 'gemrydelle@gmail.com', '', 'asa ta pwede kapalit og lawg', 'naa rami available \r\n'),
(42, 8, 'Rodney', 'rodney@gmail.com', '', 'bossing', 'saman boss'),
(43, 8, 'Rodney', 'rodney@gmail.com', '', 'wala ra', 'okayss');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(13, 1, 'Gemry Delle', '09956114224', 'gemrydelle@gmail.com', 'gcash', 'Region: 7, Province: Cebu, City: Asturias, Barangay: Tubigagmanok', ', pdert (2) , plakat (1) , shusui (1) ', 1650, '09-May-2024', 'completed'),
(14, 1, 'Gemry Delle Taparan', '999237313', 'gemrydelle@gmail.com', 'cash on delivery', 'Region: 7, Province: wewew, City: Asturias, Barangay: wewe', ', red koi tuxedo (1) , pdert (1) ', 550, '22-May-2024', 'pending'),
(20, 7, 'Marvic Pajaganas', '09556114224', 'marvs@gmail.com', 'gcash', 'Region: 7, Province: Cebu, City: Tuburan, Barangay: Apalan', 'Pearscale (3) , plakat (1) , Metal Black Snake Skin (1) ', 4200, '25-May-2024', 'pending'),
(21, 7, 'Marvic Pajaganas', '09556114224', 'marvs@gmail.com', 'cash on delivery', 'Region: 7, Province: Cebu, City: Tuburan, Barangay: Apalan', 'Calico (1) ', 1600, '25-May-2024', 'pending'),
(24, 8, 'Rodney', '09556114224', 'rodney@gmail.com', 'gcash', 'Region: 7, Province: Cebu, City: Tuburan, Barangay: Apalan', 'combtail (3) ', 1150, '29-May-2024', 'pending'),
(26, 1, 'Gemry Delle B. Taparan', '09703810903', 'gemrydelle@gmail.com', 'gcash', 'Region: 7, Province: Cebu, City: Asturias, Barangay: Tubigagmanok', 'combtail (1) , Pearscale (1) , Platinum Dumbo Ear Mosaic (1) , Showa (1) ', 4650, '12-Jun-2024', 'pending'),
(27, 1, 'Gemry Delle B. Taparan', '09703810903', 'gemrydelle@gmail.com', 'cash on delivery', 'Region: 7, Province: Cebu, City: Asturias, Barangay: Tubigagmanok', 'combtail (1) ', 450, '12-Jun-2024', 'pending'),
(28, 1, 'Gemry Delle B. Taparan', '09703810903', 'gemrydelle@gmail.com', 'cash on delivery', 'Region: 7, Province: Cebu, City: Asturias, Barangay: Tubigagmanok', 'Platinum Dumbo Ear Mosaic (1) ', 600, '12-Jun-2024', 'pending'),
(29, 1, 'Gemry Delle B. Taparan', '09703810903', 'gemrydelle@gmail.com', 'cash on delivery', 'Region: 7, Province: Cebu, City: Asturias, Barangay: Tubigagmanok', 'combtail (1) , Pearscale (1) , Platinum Dumbo Ear Mosaic (1) , Showa (1) ', 4650, '12-Jun-2024', 'pending'),
(30, 1, 'Gemry Delle B. Taparan', '09703810903', 'gemrydelle@gmail.com', 'gcash', 'Region: 7, Province: Cebu, City: Asturias, Barangay: Tubigagmanok', 'Showa (1) ', 2800, '12-Jun-2024', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `category`, `description`, `stock`) VALUES
(13, 'combtail', 350, 'cmbbetta.PNG', 'Betta', 'Imported: Thailand', 14),
(14, 'Pearscale', 1000, 'pearlscale.jpg', 'Goldfish', 'Imported: China', 32),
(15, 'Black Moore', 1200, 'blackmoore.PNG', 'Goldfish', 'Imported: China', 0),
(16, 'Platinum Dumbo Ear Mosaic', 500, 'pdertguppy.png', 'Guppy', 'Imported: Malaysia', 38),
(17, 'Red Lace', 500, 'rdssguppy.jpg', 'Guppy', 'Imported: Malaysia', 0),
(18, 'Showa', 2700, 'showa.jpg', 'Koi', 'Imported: Japan', 27),
(19, 'tancho', 3000, 'tancho.jpg', 'Koi', 'Imported: Japan', 0),
(21, 'Dragon Scale', 300, 'drgsclbetta.jpg', 'Betta', 'Imported: Thailand', 0),
(22, 'plakat', 500, 'plktbett.jpg', 'Betta', 'Imported: Thailand', 0),
(23, 'shusui', 3000, 'shusui.jpg', 'Koi', 'Imported: Japan', 0),
(24, 'Calico', 1500, 'calico.jpg', 'Goldfish', 'Imported: China', 0),
(25, 'chagoi', 3000, 'chagoi.jpg', 'Koi', 'Imported: Japan', 0),
(27, 'yamabuki ogon', 2700, 'yamabukiogon.jpg', 'Koi', 'Imported: Japan', 0),
(31, 'Red Koi Tuxedo', 500, 'rktguppy.jpg', 'Guppy', 'Imported: Malaysia', 0),
(32, 'Metal Black Snake Skin', 700, 'mbssguppy.jpg', 'Guppy', 'Imported: Malaysia', 0),
(33, 'half moon', 400, 'halfmbetta.jpg', 'Betta', 'Imported: Thailand', 0),
(34, 'Albino Yellow King Cobra', 550, 'aycguppy.jpg', 'Guppy', 'Imported: Malaysia', 0),
(35, 'bubble eye', 1200, 'bubbleeye.jpg', 'Goldfish', 'Imported: China', 0),
(36, 'Albino Blue Topaz', 500, 'abtguppy.jpg', 'Guppy', 'Imported: Malaysia', 0),
(37, 'Blue Grass', 600, 'bgguppy.jpg', 'Guppy', 'Imported: Malaysia', 0),
(38, 'Albino Koi', 500, 'akguppy.jpg', 'Guppy', 'Imported: Malaysia', 0),
(39, 'Feather Tail', 500, 'fthbetta.jpg', 'Betta', 'Imported: Thailand', 0),
(40, 'Rose Tail', 500, 'rsbetta.jpg', 'Betta', 'Imported: Thailand', 0),
(41, 'Spade Tail', 350, 'spdbetta.PNG', 'Betta', 'Imported: Thailand', 0),
(42, 'Crown Tail', 400, 'ctbetta.jpg', 'Betta', 'Imported: Thailand', 0),
(43, 'Pandamoor', 1500, 'pandamoor.PNG', 'Goldfish', 'Imported: China', 0),
(44, 'Lionhead', 2000, 'lionhead.jpg', 'Goldfish', 'Imported: China', 0),
(45, 'Ranchu', 2000, 'ranchu.jpg', 'Goldfish', 'Imported: China', 0),
(46, 'Ryukin', 1800, 'ryukin.jpg', 'Goldfish', 'Imported: China', 0),
(47, 'Kohaku', 2800, 'kohaku.jpg', 'Koi', 'Imported: Japan', 0),
(48, 'Goshiki', 2500, 'goshiki.jpg', 'Koi', 'Imported: Japan', 0),
(49, 'Asagi', 3000, 'asagi.jpg', 'Koi', 'Imported: Japan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `review_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `rating` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `review_text`, `created_at`, `rating`) VALUES
(56, 13, 3, 'Legit seller, healthy yung isda pagdating', '2024-05-08 14:35:43', 0),
(57, 13, 1, 'Nice Quality from thailand, Legit<3', '2024-05-08 14:37:06', 0),
(58, 13, 1, 'Affordable ang price, thank you Fish Daddies!!', '2024-05-08 14:38:02', 0),
(60, 17, 1, 'bati galagot kay namatay', '2024-05-09 15:13:34', 0),
(61, 17, 1, 'goods ra', '2024-05-09 17:54:51', 0),
(64, 13, 1, 'boss rods gwapo', '2024-05-10 12:04:20', 0),
(65, 16, 1, 'shesh!\r\n', '2024-05-21 17:56:50', 0),
(66, 22, 1, 'nindot', '2024-05-23 06:29:41', 0),
(67, 16, 3, 'what a beuatifuful life ', '2024-05-29 11:29:04', 0),
(68, 13, 8, 'nice fish', '2024-05-29 12:41:22', 0),
(69, 13, 8, 'new comment', '2024-05-29 12:43:06', 0),
(70, 13, 1, '3 star ka sakin. hehe', '2024-06-05 15:30:25', 3),
(72, 13, 1, 'Haysss Salamat', '2024-06-05 15:55:33', 1),
(73, 13, 1, 'nindot', '2024-06-05 16:20:44', 5),
(74, 21, 1, 'Nice', '2024-06-05 16:21:30', 5),
(75, 21, 1, 'umay ga luya ang isda', '2024-06-05 16:21:57', 3),
(76, 16, 1, 'good shesh!', '2024-06-06 02:12:47', 4),
(77, 16, 1, 'wew', '2024-06-06 02:13:11', 5),
(78, 14, 1, 'Legit!!', '2024-06-06 02:20:05', 5),
(79, 18, 1, 'Fav fish <3', '2024-06-06 02:28:02', 5),
(80, 13, 1, 'okayy', '2024-06-06 02:48:48', 2),
(81, 16, 1, 'pls lang ', '2024-06-06 03:09:10', 5),
(82, 31, 1, 'nice', '2024-06-06 03:13:15', 5),
(83, 24, 1, 'goods', '2024-06-06 03:14:22', 3),
(84, 22, 1, '5 star', '2024-06-06 03:20:43', 5),
(85, 17, 1, 'ey', '2024-06-06 03:21:31', 2),
(86, 21, 1, 'fav', '2024-06-06 03:27:19', 4),
(87, 17, 1, 'Salamat gyud tawn', '2024-06-06 03:27:39', 5),
(88, 22, 1, 'ahhhh', '2024-06-06 03:28:53', 2),
(89, 13, 1, 'yes', '2024-06-06 03:29:55', 5),
(90, 15, 1, 'kkk', '2024-06-06 03:37:10', 4),
(91, 35, 1, 'last', '2024-06-06 03:41:24', 5),
(92, 25, 1, 'df', '2024-06-06 03:41:33', 3),
(93, 19, 1, 'kkk', '2024-06-06 03:49:18', 3),
(94, 18, 1, 'xd', '2024-06-06 03:49:44', 4),
(95, 16, 1, '1 star', '2024-06-06 03:51:51', 1),
(96, 16, 3, 'the weeknd', '2024-06-06 03:53:31', 4),
(97, 13, 3, 'paspas ang delivery', '2024-06-06 03:55:10', 5),
(98, 48, 1, 'my idolss', '2024-06-06 03:58:18', 5),
(99, 14, 1, 'Nice quality', '2024-06-06 11:37:40', 4),
(100, 35, 1, 'naysu', '2024-09-27 03:08:56', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'gemry', 'gemrydelle@gmail.com', 'fb43110fe09415da1b159fd13cf5ee28', 'user'),
(3, 'Jerome', 'jerome@gmail.com', '2bb010060d682fee5ad19d973a9a4d2a', 'user'),
(5, 'Ant Marvs', 'marvic@gmail.com', '3e1ff45e91f95b29c51cd6719f33a4d1', 'user'),
(7, 'Samy Paras', 'samyparas@gmail.com', 'da9414575226afc5410f794f728b50d9', 'user'),
(8, 'Rodney', 'rodney@gmail.com', 'a53e89ae4509b5c206ddedb1913a6f75', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `fk_reviews_user_id` (`user_id`);

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_reviews_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
