-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2017 at 07:33 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(9, 'Dell'),
(10, 'Mufti'),
(11, 'Pepe'),
(12, 'Lenovo'),
(13, 'HP'),
(15, 'Asus'),
(16, 'MI'),
(17, 'Allen Solly'),
(18, 'Books'),
(19, 'Nike'),
(20, 'LG'),
(21, 'Puma');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  `p_title` varchar(500) NOT NULL,
  `p_img` varchar(500) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `p_id`, `price`, `p_title`, `p_img`, `qty`) VALUES
(1, 0, 1, '1099/-', 'Mufti Shirt1', 'shirt1.jpg', 1),
(7, 2, 6, '11999/-', 'Redmi Note 4 (Dark Grey, 64 GB)  (With 4 GB RAM)', 'electronic5.jpg', 2),
(8, 1, 3, '30999/-', 'Dell Laptops', 'electronic2.jpg', 1),
(9, 1, 2, '1699/-', 'Pepe Jeans Shirt', 'shirt3.jpg', 1),
(10, 1, 3, '30999/-', 'Dell Laptops', 'electronic2.jpg', 1),
(11, 1, 3, '30999/-', 'Dell Laptops', 'electronic2.jpg', 1),
(12, 1, 3, '30999/-', 'Dell Laptops', 'electronic2.jpg', 1),
(13, 1, 6, '11999/-', 'Redmi Note 4 (Dark Grey, 64 GB)  (With 4 GB RAM)', 'electronic5.jpg', 1),
(14, 1, 1, '1099/-', 'Mufti Shirt1', 'shirt1.jpg', 1),
(15, 1, 1, '1099/-', 'Mufti Shirt1', 'shirt1.jpg', 1),
(16, 1, 2, '1699/-', 'Pepe Jeans Shirt', 'shirt3.jpg', 1),
(17, 2, 1, '1099/-', 'Mufti Shirt1', 'shirt1.jpg', 2),
(18, 2, 3, '30999/-', 'Dell Laptops', 'electronic2.jpg', 2),
(19, 2, 17, '9499/-', 'Lenovo PHAB', 'tab2.jpeg', 2),
(20, 1, 17, '9499/-', 'Lenovo PHAB', 'tab2.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cats_id` int(11) NOT NULL,
  `cats_name` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cats_id`, `cats_name`, `parent`) VALUES
(1, 'Electronics', 0),
(2, 'Appliances', 0),
(3, 'Men', 0),
(4, 'Women', 0),
(6, 'Books', 0),
(7, 'Mobiles', 1),
(8, 'Laptops', 1),
(10, 'Refrigerator', 1),
(12, 'Washing Machine', 2),
(13, 'Air Conditioner', 2),
(15, 'Coffee Makers', 2),
(16, 'Hand Blenders', 2),
(17, 'Shirts', 3),
(18, 'Pants', 3),
(21, 'Watches', 3),
(23, 'Jeans', 4),
(25, 'Salwar', 4),
(26, 'HTML', 6),
(28, 'SQL', 6),
(29, 'PHP', 6),
(30, 'Shirts', 5),
(31, 'Pants', 5),
(39, 'Geysers', 2),
(42, 'CSS', 6),
(43, 'Shoes', 3),
(45, 'Tablets', 1),
(46, 'Tops', 4),
(47, 'Accessories', 3),
(48, 'Tv', 1),
(49, 'Kids', 0),
(50, 'Shirts', 49),
(51, 'Pants', 49),
(52, 'Shoes', 49),
(53, 'Leggings', 4),
(54, 'Objective Books', 6);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `cats_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_title` text NOT NULL,
  `list_price` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `product_size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cats_id`, `brand_id`, `product_title`, `list_price`, `price`, `product_desc`, `product_img`, `product_size`) VALUES
(1, 17, 10, 'Mufti Shirt1', '1499/-', '1099/-', 'Fabric: Cotton\r\nSlim Fit, Roll-up Sleeve\r\nCollar Type: Point Collar\r\nPattern: Solid\r\nSet of 1', 'shirt1.jpg', 'XS,S,M,L,XL'),
(2, 17, 11, 'Pepe Jeans Shirt', '1899/-', '1699/-', 'RODID Stylish combination of Deep Blue and Navy Blue slim fit shirt is perfect for the casual outing. Featured with trendy contrast Navy Blue Sleeves. The cotton fabric keeps you comfortable throughout the day', 'shirt3.jpg', 'XS,S,M,L,XL'),
(3, 8, 9, 'Dell Laptops', '34999/-', '30999/-', 'This is an Awesome Laptop', 'electronic2.jpg', ''),
(6, 7, 15, 'Redmi Note 4 (Dark Grey, 64 GB)', '12999/-', '11999/-', '<p>Upgrade to the Redmi Note 4 and experience power like never before. The Redmi Note 4 offers high-speed performance along with a long battery life.</p>\r\n', 'electronic5.jpg', ''),
(7, 23, 17, 'Allen Solly Skinny Women''s Black Jeans', '1899/-', '1199/-', 'This is a very comfortable jeans', 'ladies1.jpg', ''),
(9, 18, 7, 'Puma Skinny Mens Black Jeans', '1899/-', '1199/-', '<p>awesome jeans</p>\r\n', 'men1.jpeg', ''),
(10, 54, 18, 'Objective General English', '285/-', '199/-', '<p>The book prepares a candidate with his skills in English which is a very important part in all competitive examination.</p>\r\n', 'books1.jpeg', ''),
(11, 43, 19, 'Nike CAPRI III L Sneakers', '4999/-', '4299/-', '<p>Weight of the product may vary depending on size.</p>\r\n', 'shoe1.jpeg', ''),
(12, 7, 16, 'Redmi Note 4 (Gold, 64 GB)', '12999/-', '12499/-', '<p>Upgrade to the Redmi Note 4 and experience power like never before. The Redmi Note 4 offers high-speed performance along with a long battery life.</p>\r\n', 'mobile1.jpeg', ''),
(13, 10, 20, 'Double Door Refrigerator ', '19999/-', '18999/-', '<p>Power outages can be a real mood dampener, especially when you have guests over. Helping you ensure that you always have fresh food to treat your guests to is this Haier refrigerator. It comes with a big cool pad which retains cool air within the fridge for up to 10 hours after a power cut. Once the power lines are restored, the fridge&rsquo;s 1 hour Icing technology works to restore the fridge&rsquo;s cold air in half the time.</p>\r\n', 'fridge1.jpeg', ''),
(14, 45, 15, 'Asus Tab', '8999/-', '7499/-', '<p>&nbsp;</p>\r\n\r\n<p>A tablet while commuting to work or travelling can be a good thing. Asus brings to you this ZenPad 7.0, an ideal investment, that you can enjoy working on, playing games or watching movies.</p>\r\n', 'tab1.jpeg', ''),
(15, 48, 20, 'LG LED TV (32) HD', '19999/-', '19499/-', '<p>Ensure family movie nights are fun and exciting by bringing home this LG HD Ready LED TV. The 80 cm LED display is a treat for your entire family as you relax and enjoy the theater-like experience the TV delivers.</p>\r\n', 'tv1.jpeg', ''),
(16, 8, 13, 'HP Core i5 7th Gen', '59999/-', '54999/-', '<p>&nbsp; Notebook, AC Power Adaptor, Battery, User Manual and Warranty Documents</p>\r\n', 'lappy1.jpeg', ''),
(17, 45, 12, 'Lenovo PHAB', '9999/-', '9499/-', '<p>Lenovo brings to you this Phablet which is studded with brilliant features in a beautiful body. Thanks to its sleek and lightweight tablet, you can now stay connected all the time no matter where you are. While its powerful battery and stunning cameras ensure you stay up to date in fashion and technology.</p>\r\n', 'tab2.jpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Subham Agarwal', 'sasubhamagarwal10@gmail.com', '9401003301'),
(2, 'Babu', 'subham654001@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cats_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cats_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
