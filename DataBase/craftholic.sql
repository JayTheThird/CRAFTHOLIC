-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 06:18 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `craftholic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin-login`
--

CREATE TABLE `admin-login` (
  `Admin_ID` int(3) NOT NULL,
  `Admin_Name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Admin_Password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin-login`
--

INSERT INTO `admin-login` (`Admin_ID`, `Admin_Name`, `Admin_Password`) VALUES
(1, 'Jay', 'AdminJay001'),
(2, 'Harpal', 'AdminHarpal002'),
(3, 'Darshil', 'AdminDarshil003');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `P_ID` bigint(4) NOT NULL,
  `P_names` varchar(25) NOT NULL,
  `Category_Name` varchar(20) NOT NULL,
  `P_price` varchar(10) NOT NULL,
  `P_Image1` varchar(255) NOT NULL,
  `P_description` varchar(255) NOT NULL,
  `P_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`P_ID`, `P_names`, `Category_Name`, `P_price`, `P_Image1`, `P_description`, `P_Date`) VALUES
(1, 'Abstract Bliss Ganesha', 'HomeDecor', '1000', '1675943328-image_1.1.jpg', 'this is Abstract Bliss Ganesha Idol', '2023-02-09'),
(2, 'India Map With Backlit', 'WallDecor', '4999', '1675944855-image1_1.jpg', 'this is India Map With Backlit', '2023-02-09'),
(3, 'Watch With Ruby & CZ Ston', 'Gifting', '1500', '1676705593-image4_4.jpg', 'this is Designer Watch With Ruby & CZ Stone', '2023-02-18'),
(4, 'Radhe Krishna Five Panel ', 'HomeDecor', '2999', '1677206796-image2_2.jpg', 'Radhe Krishna Five Panel Painting(Sea Grean)', '2023-02-24'),
(5, 'illuminated Mosque ', 'WallDecor', '4999', '1677206954-image2_2.jpg', 'Size: L19\" X W722\"\r\nMaterial: Made of imported high quality Engineered wood for sturdiness and unique wood texture\r\nFinish: Asian Paints Melamine wood polish matte finish for long life and superior finish\r\nBrilliant design, allowing light to fall on back ', '2023-02-24'),
(6, 'Ganesh Riddhi Siddhi', 'Gifting', '10150', '1677207280-image8_8.jpg', 'These Ganesh Riddhi Siddhi silver products come with a guarantee of 92. 5% silver purity. ', '2023-02-24'),
(7, 'Nilkamal Jumping Horse', 'HomeDecor', '2799', '1677207481-image6_6.jpg', 'This is Nilkamal Jumping Horse (Black And Gold)', '2023-02-24'),
(8, 'Shubh Labh With Backlit', 'WallDecor', '1799', '1677207609-image4_4.jpg', 'This is Shubh Labh With Backlit White Light', '2023-02-24'),
(10, 'Lamp ', 'Gifting', '1000', '1679916750-image12_12.jpg', 'this is regular test 27-3-23', '2023-03-27'),
(11, 'Blue Vinyl Radhe Krishna', 'HomeDecor', '1000', '1680059537-image4_4.jpg', 'Radhe Krishna Photo , Color :: Blue, Dimensions :: 25.40 * 1.19 * 48\r\n.26 (in Centimeter)', '2023-03-29'),
(12, 'Mandala Art Metel Wall Ar', 'WallDecor', '4599', '1680059802-image3_3.jpg', 'Concentration is somewhere the key to enjoy peace and calmness. This Mandala art work being designed by its experts let you enjoy peace in a serene environment with the enchanting LED lights', '2023-03-29'),
(13, ' Oxidised Anklet', 'Gifting', '999', '1680060013-image2_2.jpg', 'Dreamcatchers are said to ward off bad dreams. They are beautiful, trending and here to stay! This oxidised anklet is inspired by the same.', '2023-03-29'),
(14, 'Brick Floor Vase(Brown)', 'HomeDecor', '7699', '1680060314-image3_3.jpg', 'Width :: 7 inch\r\nDepth :: 7 inch\r\nHeight :: 32 inch\r\nPrimary Material :: Mango Wood ', '2023-03-29'),
(15, 'Window Frame WoodenMirror', 'WallDecor', '6499', '1680060515-image5_5.jpg', 'Uncompromising in style, aesthetic and quality, this exquisite designer arch wall mirror will make a classy and stunning component in any contemporary living space. The genuine magnificence of this mirror lies in its artfully crafted wooden frame', '2023-03-29'),
(16, 'Clock Potpourri ', 'Gifting', '9980', '1680061096-image5_5.jpg', 'Potpourri Clock is Totally Made With Silver with 92.5% purity', '2023-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `Category_ID` int(3) NOT NULL,
  `Category_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`Category_ID`, `Category_Name`) VALUES
(101, 'HomeDecor'),
(102, 'WallDecor'),
(103, 'Gifting');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `C_ID` bigint(20) NOT NULL,
  `F_NAME` varchar(10) NOT NULL,
  `L_NAME` varchar(10) NOT NULL,
  `CONTECT_NUMBER` varchar(10) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PWD` varchar(70) NOT NULL,
  `R_date` date NOT NULL,
  `Token` varchar(255) DEFAULT NULL,
  `TokenExpire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`C_ID`, `F_NAME`, `L_NAME`, `CONTECT_NUMBER`, `EMAIL`, `PWD`, `R_date`, `Token`, `TokenExpire`) VALUES
(1, 'Jay', 'Bhardiya', '9428913811', 'jaypatel161200@gmail.com', '$2y$10$2k6nLEmVUEdFq3QC0J7sbOa//Cu4Sm.5TMjIFN6oY4suw12c6wqJW', '2023-03-03', NULL, NULL),
(2, 'Darshil', 'Malaviya', '1234567890', 'admin@test.com', '$2y$10$an2h18X4OXaMMU8Ykw1wnO.Gc0CpoF9OctAHZ/LBGinbpGosBG4KS', '2023-03-27', NULL, NULL),
(3, 'Harpal', 'Chodvadiya', '9876543210', 'Admintest123@gmail.com', '$2y$10$skxEGRFKONNjD5vjXJirD.5anKSSTE42wllxA5BaL8.wRp0hvtmYy', '2023-03-27', NULL, NULL),
(4, 'Admin', 'Test', '1111111111', 'harpalchodvadiya@Gmail.com', '$2y$10$aLV55bMIunnGb9nY4I8Nxei1KiezIKunonhJHV2XdAEq6UfRmPMEC', '2023-03-27', '571368384f354c3d07832a8f07f2c32f', '2023-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `shippingaddress`
--

CREATE TABLE `shippingaddress` (
  `sa_id` bigint(5) NOT NULL,
  `Date` date NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Number` int(10) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Method` varchar(10) NOT NULL,
  `Flat` varchar(20) NOT NULL,
  `Street` varchar(20) NOT NULL,
  `City` varchar(25) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Country` varchar(10) NOT NULL,
  `Pincode` int(6) NOT NULL,
  `Totalproducts` varchar(255) NOT NULL,
  `TotalPrice` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shippingaddress`
--

INSERT INTO `shippingaddress` (`sa_id`, `Date`, `Status`, `Name`, `Number`, `Email`, `Method`, `Flat`, `Street`, `City`, `State`, `Country`, `Pincode`, `Totalproducts`, `TotalPrice`) VALUES
(10101, '2023-03-02', 'Dispatch', 'jayb', 1111111111, 'jaypatel161200@gmail.com', 'Razorpay', 'c/37', 'jay', 'Ahmedabad ', 'Gujarat', 'India', 111111, 'Abstract Bliss Ganesha(1)', 1000),
(10102, '2023-03-02', 'Delivered', 'jay Bhardiya ', 2147483647, 'mmtbharadiya@gmail.com', 'Razorpay', 'c/37', 'nishant Banglows', 'Ahmedabad ', 'gujarat', 'India', 382350, 'Abstract Bliss Ganesha(1), Radhe Krishna Five Panel (1), Nilkamal Jumping Horse(4)', 15195),
(10103, '2023-03-02', 'Active', 'juhilB', 1111111111, 'jaypatel161200@gmail.com', 'Razorpay', 'c/37', 'Nishant ', 'Ahmedabad ', 'gujarat', 'India', 111111, 'Watch With Ruby & CZ Ston(1)', 1500),
(10104, '2023-03-02', 'Active', 'Darshil', 1212121223, 'jaypatel161200@gmail.com', 'Razorpay', 'c/37', 'Nishant Banglows', 'Ahmedabad ', 'Gujarat', 'India', 282350, 'Abstract Bliss Ganesha(1), illuminated Mosque (2), Watch With Ruby & CZ Ston(1)', 12498),
(10105, '2023-03-11', 'Delivered', 'Jay testing', 2147483647, 'jaypatel161200@gmail.com', 'Razorpay', 'c/37', 'Nishant Banglows', 'Ahmedabad ', 'Gujarat', 'India', 382350, 'Abstract Bliss Ganesha(1)', 1000),
(10106, '2023-03-18', 'Delivered', 'Admin Test', 2147483647, 'jaypatel161200@gmail.com', 'Razorpay', 'c/37', 'Nishant Banglows', 'Ahmedabad', 'Gujarat ', 'India', 382350, 'Abstract Bliss Ganesha(2)', 2000),
(10107, '2023-03-27', 'Delivered', 'Regular test', 2147483647, 'jaypatel161200@gmail.com', 'Razorpay', 'c/37', 'Nishant Banglows ', 'Ahmedabad ', 'Gujarat', 'India', 382350, 'Radhe Krishna Five Panel (2)', 5998),
(10108, '2023-03-27', 'Delivered', 'Admin Test 1', 1111111111, 'jaypatel161200@gmail.com', 'Razorpay', 'c/37', 'Nishant Banglows ', 'Ahmedabad ', 'Gujarat', 'India', 382350, 'Abstract Bliss Ganesha(3)', 3000),
(10109, '2023-03-29', 'Dispatch', 'jay b', 1111111111, 'jaypatel161200@gmail.com', 'Razorpay', 'c/37', 'nishant ', 'Ahmed ', 'gujarat', 'India', 382350, 'Abstract Bliss Ganesha(2)', 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin-login`
--
ALTER TABLE `admin-login`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `shippingaddress`
--
ALTER TABLE `shippingaddress`
  ADD PRIMARY KEY (`sa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin-login`
--
ALTER TABLE `admin-login`
  MODIFY `Admin_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `P_ID` bigint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `Category_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `C_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shippingaddress`
--
ALTER TABLE `shippingaddress`
  MODIFY `sa_id` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
