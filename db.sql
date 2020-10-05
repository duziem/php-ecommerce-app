CREATE DATABASE IF NOT EXISTS `ecommerce_db`;

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Table structure for table `product`
--
CREATE TABLE IF NOT EXISTS `product` (
  `item_id` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL,
  `item_rating` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--
/*
INSERT INTO `product` (`item_brand`, `item_name`, `item_price`, `item_image`, `item_register`) VALUES
('Samsung', 'Samsung Galaxy 10', 152.00, './assets/images/products/1.png', NOW()), -- NOW()
('Redmi', 'Redmi Note 7', 122.00, './assets/images/products/2.png', NOW()),
('Redmi', 'Redmi Note 6', 122.00, './assets/images/products/3.png', NOW()),
('Redmi', 'Redmi Note 5', 122.00, './assets/images/products/4.png', NOW()),
('Samsung', 'Samsung Galaxy S6', 152.00, './assets/images/products/11.png', NOW()),
('Samsung', 'Samsung Galaxy S7', 152.00, './assets/images/products/12.png', NOW()),
('Apple', 'Apple iPhone 5', 152.00, './assets/images/products/13.png', NOW()),
('Apple', 'Apple iPhone 6', 152.00, './assets/images/products/14.png', NOW());
*/
--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` int(6) NOT NULL,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

/*
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `register_date`) VALUES
(1, 'Daily', 'Tuition', '2020-03-28 13:07:17'),
(2, 'Akshay', 'Kashyap', '2020-03-28 13:07:17');
*/
-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `cart_id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
