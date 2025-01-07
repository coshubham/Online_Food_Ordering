-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 01:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodhut`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(25) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `password`) VALUES
(2, 'Prachi', '335f2346bf21afea0d75445f55842f57'),
(4, 'Shubham', 'ca780ae305a8d47f583484d3f83a2188');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `message`) VALUES
(42, 'shubham12@gmail.com', 'vgjhkhg vgkj bjkkl'),
(43, 'prachikhedia@gmail.com', 'jhjhkjkj njjkk  jm jkh '),
(44, 'shubhamky1612@gmail.com', 'vgjhkhg vgkj bjkkl');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(10) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_image` varchar(255) NOT NULL,
  `About_food` varchar(255) NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `food_name`, `food_image`, `About_food`, `restaurant_name`, `location`, `price`) VALUES
(9, 'Thali', 'goodies.png', 'Veg Thali 5 roti, Dal, Paneer, Rice, Pickle, Dahi.', 'Thaal Vaadi', 'Shop No. 310/311, The Great India Place Mall, 3rd Floor, Sector 38A, Noida', 180),
(11, 'Aloo paretha', 'aloo-para.png', '4 aloo paratha with green chutney, tomato sauce and Raitha', 'Hotel kings', 'Shop No. 310/311, The Great India Place Mall, 3rd Floor, Sector 38A,Noida', 100),
(20, 'Fruit Salad ', 'fruit-salad.png', '3/4 cup: 131 calories, 6g fat (3g saturated fat), 17mg cholesterol, 35mg sodium, (18g sugars, 1g fiber).', 'Salad Company', 'Gahlot Farms, Sector 47, Sohna Road, Greater Noida ', 210),
(22, 'Full Combo Indian Thali', 'indian_thali2.png', 'Veg Thali 6 roti, Fried Dal, Paneer, Allu Matar,  jira Rice, Mix Pickle, Dahi, Papad.', 'Veg and Non-veg Food Hub', '419 Veg Dhaba, kacheri Road, Noida, Uttar Pradesh, India', 259),
(24, 'Malai Paneer', 'pexels-anilsharma65-10905933-removebg-preview.png', '800gm Paneer', 'Veg and Non-veg Food Hub', '419 Sadar Bazar, kacheri Road, Noida, Uttar Pradesh, India', 199),
(26, 'Aloo paretha	', 'pikaso_embed.png', 'Veg Thali 5 roti, Dal, Paneer, Rice, Pickle, Dahi.', 'Thaal Vaadi', 'Shop No. 310/311, The Great India Place Mall, 3rd Floor, Sector 38A, Noida ', 120),
(27, 'Crispy Veg Double Patty', 'burger.png', 'Double up our best selling crispy veg burger 531.4 kcal', 'Burger King', ' No FC9, 2nd Floor, Food Court, Surajpur Kasna Road, Greater Noida, Uttar Pradesh 201310', 95),
(28, 'Devil Veg Club Burger', 'buc.png', 'Our signature burger with 12 layers with toasted caramlized Bun crunchy nachos, crispy mix veg patty crunchy onion ring loads ', 'Burger Club', 'Vanish mall Greater Noida ', 169),
(29, 'Pasta', 'your_order.png', '200g pasta,1 cup, chopped tomatoes ,1/2 cup green peas', 'Pasta Club', 'Vanish mall Greater Noida uttar Pradesh', 89);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_Id` int(100) NOT NULL,
  `full_name` text NOT NULL,
  `phone_no` bigint(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pay_mode` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_Id`, `full_name`, `phone_no`, `address`, `pay_mode`, `email`) VALUES
(65, 'Shubham kumar yadav', 8383015195, 'Thapkhera Greater Noida uttar pradesh', 'COD', 'shubhamky1612@gmail.com'),
(66, 'Shubham kumar yadav', 8383015195, '.lpkjim pjunpjiopjip', 'COD', 'shubhiouoiuoamky1612@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `delivery_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `Email`, `phone_number`, `Password`, `delivery_address`) VALUES
(23, 'Prachi', 'Khedia', 'prachikhedia@gmail.com', '8595839790', 'c802338a9c3de257d4c2f88722a7a1dd', 'Thapkhera Greater Noida uttar pradesh'),
(24, 'shubham kumar', 'yadav', 'shubhamky1612@gmail.com', '08303954723', 'ca780ae305a8d47f583484d3f83a2188', 'GBU GREATER NOIDA UTTAR PRADESH '),
(25, 'shubham', 'yadav', 'shubham12@gmail.com', '08383015195', 'ca780ae305a8d47f583484d3f83a2188', 'Ekal bazar near chandra hospital, Ekla bazar NH29 shiv mandir\r\nEkal bazar near chandra hospital, Ekla bazar NH29 shiv mandir'),
(26, 'shubham', 'yadav', 'ghyutgutg2@gmail.com', '08383015195', '81dc9bdb52d04dc20036dbd8313ed055', 'Thapkhera Greater Noida uttar pradesh'),
(28, 'jgrfrg', 'gg', 'kk@gmail.com', '234353234343', '827ccb0eea8a706c4c34a16891f84e7b', 'hykjgh');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `Order_Id` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Price` int(100) NOT NULL,
  `Quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`Order_Id`, `Name`, `Price`, `Quantity`) VALUES
(57, 'Aloo paretha', 100, 5),
(57, 'Thali', 180, 4),
(60, 'Thali', 180, 2),
(60, 'Aloo paretha', 100, 2),
(61, 'Aloo paretha', 100, 2),
(62, 'Aloo paretha', 100, 3),
(62, 'tfghh', 210, 2),
(63, 'Aloo paretha', 100, 1),
(64, 'Thali', 180, 4),
(64, 'tfghh', 210, 2),
(64, 'pkjj', 210, 4),
(64, 'jgdhdj', 210, 5),
(65, 'tfghh', 210, 2),
(65, 'Thali', 180, 4),
(65, 'Aloo paretha', 100, 6),
(66, 'Thali', 180, 1),
(66, 'Aloo paretha', 100, 1),
(66, 'Aloo paretha	', 120, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
