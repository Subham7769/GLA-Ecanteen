-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2017 at 08:17 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gla_canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `Bill no` varchar(10) NOT NULL,
  `Payment_mode` varchar(5) NOT NULL,
  `Quantity` int(3) NOT NULL,
  `Date/Time` datetime NOT NULL,
  `Customer_id` varchar(10) NOT NULL,
  `Product_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_Id` int(10) UNSIGNED NOT NULL,
  `Category_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_Id`, `Category_Name`) VALUES
(1, 'Drinks'),
(2, 'Snacks'),
(3, 'Fast-Food'),
(4, 'Food'),
(5, 'Cake'),
(6, 'Sweets');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Order_id` int(10) UNSIGNED NOT NULL,
  `Order_Timing` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Customer_id` int(11) NOT NULL,
  `Status` varchar(45) NOT NULL DEFAULT 'Pending',
  `paymode` varchar(45) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Order_id`, `Order_Timing`, `Customer_id`, `Status`, `paymode`, `Address`) VALUES
(110018, '2017-05-04 07:53:58', 144200126, 'Delivered', 'COD', 'B Block'),
(110019, '2017-05-04 08:46:44', 144200126, 'Delivered', 'CC', 'A Block'),
(110020, '2017-05-04 08:49:03', 144200126, 'Canceled', 'CC', 'DayScholar'),
(110021, '2017-05-08 06:56:02', 144200126, 'Canceled', 'COD', 'D Block'),
(110022, '2017-05-08 07:49:33', 144200126, 'Canceled', 'COD', 'A Block'),
(110023, '2017-05-08 11:38:42', 144200123, 'Canceled', 'COD', 'A Block'),
(110024, '2017-05-08 11:40:31', 144200123, 'Canceled', 'COD', 'B Block'),
(110025, '2017-05-08 18:31:11', 144200125, 'Canceled', 'COD', 'A Block'),
(110026, '2017-05-08 19:36:02', 144200125, 'Canceled', 'COD', 'B Block'),
(110027, '2017-05-08 19:39:45', 144200125, 'Canceled', 'COD', 'B Block'),
(110028, '2017-05-08 20:15:50', 144200125, 'Canceled', 'COD', 'C Block'),
(110029, '2017-05-09 04:34:39', 144200125, 'Delivered', 'COD', 'B Block'),
(110030, '2017-05-09 04:39:38', 144200125, 'Delivered', 'COD', 'E Block'),
(110031, '2017-05-09 08:40:06', 144200125, 'Canceled', 'COD', 'D Block'),
(110032, '2017-05-09 08:53:43', 144200125, 'Canceled', 'CC', 'H Block'),
(110033, '2017-05-11 15:09:14', 144200126, 'Pending', 'COD', 'A Block'),
(110034, '2017-05-11 15:30:28', 144200125, 'Pending', 'COD', 'B Block'),
(110035, '2017-05-11 15:37:41', 144200125, 'Canceled', 'CC', 'E Block'),
(110036, '2017-05-11 15:45:00', 144200125, 'Canceled', 'COD', 'C Block'),
(110037, '2017-05-11 16:53:25', 144200125, 'Pending', 'COD', 'A Block'),
(110038, '2017-05-11 17:01:07', 144200125, 'Pending', 'COD', 'C Block'),
(110039, '2017-05-12 05:50:57', 144200125, 'Pending', 'COD', 'B Block'),
(110040, '2017-05-15 05:20:46', 144200126, 'Canceled', 'COD', 'B Block'),
(110041, '2017-05-15 08:57:35', 144200129, 'Canceled', 'CC', 'A Block'),
(110042, '2017-05-15 09:10:19', 144200129, 'Pending', 'COD', 'A Block'),
(110043, '2017-05-15 15:25:55', 144200129, 'Pending', 'CC', 'C Block'),
(110044, '2017-05-16 18:18:06', 144200126, 'Pending', 'COD', 'A Block');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `sno` int(10) UNSIGNED NOT NULL,
  `oid` varchar(45) NOT NULL,
  `Product_Name` varchar(100) NOT NULL,
  `Variant` varchar(100) NOT NULL,
  `Price` int(10) UNSIGNED NOT NULL,
  `Qty` int(10) UNSIGNED NOT NULL,
  `Ship_Chrg` int(10) UNSIGNED NOT NULL,
  `Total` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`sno`, `oid`, `Product_Name`, `Variant`, `Price`, `Qty`, `Ship_Chrg`, `Total`) VALUES
(18, '110018', 'Kinley Water', '1Ltr', 20, 1, 5, 25),
(19, '110019', 'Limca', '300ml', 20, 1, 5, 25),
(20, '110019', 'Fanta', '300ml', 20, 1, 5, 25),
(21, '110020', 'Thums-up', 'Can', 30, 1, 5, 35),
(22, '110021', 'Lassi/Chhach', 'Lassi', 20, 1, 5, 25),
(23, '110021', 'Paras Milk', 'Elaichi', 25, 1, 5, 30),
(24, '110022', 'Limca', '300ml', 20, 1, 5, 25),
(25, '110023', 'Lassi/Chhach', 'Lassi', 20, 1, 5, 25),
(26, '110024', 'Fanta', '300ml', 20, 1, 5, 25),
(27, '110025', 'Kurkure', 'Chilli Chatka', 10, 1, 2, 12),
(28, '110025', 'Thums-up', '300ml', 20, 1, 5, 25),
(29, '110025', 'Lassi/Chhach', 'Lassi', 20, 1, 5, 25),
(30, '110026', 'Hersheys Milk', 'Strawberry', 35, 1, 5, 40),
(31, '110027', 'Lassi/Chhach', 'Lassi', 20, 1, 5, 25),
(32, '110028', 'Kinley Water', '1Ltr', 20, 1, 5, 25),
(33, '110029', 'Lassi/Chhach', 'Lassi', 20, 1, 5, 25),
(34, '110030', 'Fanta', '300ml', 20, 1, 5, 25),
(35, '110031', 'Limca', '600ml', 35, 2, 5, 75),
(36, '110031', 'Paras Milk', 'Elaichi', 25, 1, 5, 30),
(37, '110031', 'Gulab Jamun', 'Gulab Jamun', 20, 1, 3, 23),
(38, '110032', 'Kinley Water', '1Ltr', 20, 1, 5, 25),
(39, '110032', 'Cadbury', '', 10, 1, 2, 12),
(40, '110033', 'Sunfeast Bescuit', 'Sunfeast Glucose', 5, 1, 2, 7),
(41, '110034', 'Oyes', 'Cocktail', 10, 1, 2, 12),
(42, '110035', 'Britannia', 'Britannia 50-50', 5, 1, 2, 7),
(43, '110036', 'Hersheys Milk', 'Strawberry', 35, 1, 5, 40),
(44, '110037', 'Fanta', '300ml', 20, 1, 5, 25),
(45, '110038', 'Uncle Chipps', 'Spicy Treat', 20, 1, 2, 22),
(46, '110039', 'Fanta', '300ml', 20, 1, 5, 25),
(47, '110040', 'Fanta', '300ml', 20, 1, 5, 25),
(48, '110041', 'Hersheys Milk', 'Strawberry', 35, 1, 5, 40),
(49, '110042', 'Maaza', '300ml', 20, 1, 5, 25),
(50, '110043', 'Fanta', '300ml', 20, 1, 5, 25),
(51, '110043', 'Gulab Jamun', 'Gulab Jamun', 20, 1, 3, 23),
(52, '110044', 'Fanta', '300ml', 20, 1, 5, 25),
(53, '110044', 'Utpam', 'Paneer Utpam', 50, 1, 10, 60);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_id` varchar(10) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `nov` int(2) NOT NULL DEFAULT '1',
  `Variant1` varchar(20) NOT NULL,
  `Price1` varchar(5) NOT NULL,
  `Variant2` varchar(20) DEFAULT NULL,
  `Price2` varchar(5) DEFAULT NULL,
  `Variant3` varchar(20) DEFAULT NULL,
  `Price3` varchar(5) DEFAULT NULL,
  `Variant4` varchar(20) DEFAULT NULL,
  `Price4` varchar(5) DEFAULT NULL,
  `Variant5` varchar(20) DEFAULT NULL,
  `Price5` varchar(5) DEFAULT NULL,
  `Variant6` varchar(20) DEFAULT NULL,
  `Price6` varchar(5) DEFAULT NULL,
  `Variant7` varchar(20) DEFAULT NULL,
  `Price7` varchar(5) DEFAULT NULL,
  `Variant8` varchar(20) DEFAULT NULL,
  `Price8` varchar(5) DEFAULT NULL,
  `Shipping_charge` int(5) NOT NULL,
  `Category_id` varchar(10) NOT NULL,
  `Product_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_id`, `Name`, `nov`, `Variant1`, `Price1`, `Variant2`, `Price2`, `Variant3`, `Price3`, `Variant4`, `Price4`, `Variant5`, `Price5`, `Variant6`, `Price6`, `Variant7`, `Price7`, `Variant8`, `Price8`, `Shipping_charge`, `Category_id`, `Product_image`) VALUES
('C01', 'Black Forest', 4, '1/2Kg', '150', '1Kg', '250', '1.5Kg', '350', '2Kg', '600', '', '', '', '', '', '', '', '', 20, '05', 'BlackForest.png'),
('C02', 'Vanila Cake', 4, '1/2 Kg', '150', '1 Kg', '250', '1.5 Kg', '350', '2 Kg', '600', '', '', '', '', '', '', '', '', 20, '05', 'Vanila.png'),
('C03', 'Chocolate Cake', 4, '1/2 Kg', '150', '1 Kg', '250', '1.5 Kg', '350', '2 Kg', '600', '', '', '', '', '', '', '', '', 20, '05', 'Chocolate.png'),
('C04', 'Ice Cake', 4, '1/2 Kg', '150', ' 1 Kg', '250', '1.5 Kg', '350', '2 Kg', '600', '', '', '', '', '', '', '', '', 20, '05', 'Ice.png'),
('C05', 'ButterScotch Cake', 4, '1/2 Kg', '150', '1 Kg', '250', '1.5 Kg', '350', '2 Kg', '600', '', '', '', '', '', '', '', '', 20, '05', 'Butterscotch.png'),
('D01', 'Coca-Cola', 4, '300ml', '20', '600ml', '35', '2Ltr', '85', 'Can', '30', '', '', '', '', '', '', '', '', 5, '01', 'Coke.png'),
('D02', 'Thums-up', 4, '300ml', '20', '600ml', '35', '2Ltr', '85', 'Can', '30', '', '', '', '', '', '', '', '', 5, '01', 'thums.png'),
('D03', 'Fanta', 4, '300ml', '20', '600ml', '35', '2Ltr', '85', 'Can', '30', '', '', '', '', '', '', '', '', 5, '01', 'Fanta.png'),
('D04', 'Limca', 4, '300ml', '20', '600ml', '35', '2Ltr', '85', 'Can', '30', '', '', '', '', '', '', '', '', 5, '01', 'Limca.png'),
('D05', 'Sprite', 4, '300ml', '20', '600ml', '35', '2Ltr', '85', 'Can', '30', '', '', '', '', '', '', '', '', 5, '01', 'Sprite.png'),
('D06', 'Frooti', 1, '200ml', '15', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '01', 'Frooti.png'),
('D07', 'Red-Bull', 1, '250ml', '110', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '01', 'Red-Bull.png'),
('D08', 'Maaza', 2, '300ml', '20', '600ml', '35', '', '', '', '', '', '', '', '', '', '', '', '', 5, '01', 'Maaza.png'),
('D09', 'Kinley Water', 1, '1Ltr', '20', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '01', 'KinleyWater.png'),
('D10', 'Lassi/Chhach', 2, 'Lassi', '20', 'Chhach', '12', '', '', '', '', '', '', '', '', '', '', '', '', 5, '01', 'MotherDairy.png'),
('D11', 'Paras Milk', 5, 'Elaichi', '25', 'Kesar', '25', 'Butterscotch', '25', 'Coffee', '25', 'Strawberry', '25', '', '', '', '', '', '', 5, '01', 'ParasMilk.png'),
('D12', 'Nescafe Milk', 3, 'Intense Cafe', '30', 'Hezelnut', '30', 'Chilled Lette', '30', '', '', '', '', '', '', '', '', '', '', 5, '01', 'Nescafe.png'),
('D13', 'Tropicana Juice', 8, 'Litchi', '20', 'Guava', '20', 'Mango', '20', 'Mosambi', '20', 'Pomegranate', '20', 'Pinapple', '20', 'Apple', '20', 'Mix', '20', 5, '01', 'Tropicana.png'),
('D14', 'Dell Monte Juice', 4, 'Mix', '35', 'Mango', '35', 'Pinapple', '35', 'Green Apple', '35', '', '', '', '', '', '', '', '', 5, '01', 'DellMonte.png'),
('D15', 'Hersheys Milk', 3, 'Strawberry', '35', 'Chocolate', '35', 'Cookies n Cream', '35', '', '', '', '', '', '', '', '', '', '', 5, '01', 'Hersheys.png'),
('F01', 'Chole-Kulche', 1, 'Simple', '35', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '04', 'CholeKulche.png'),
('F02', 'Chole-Bhature', 1, 'Simple', '40', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '04', 'CholeBhature.png'),
('F03', 'Chole-Nan', 1, 'Simple', '35', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '04', 'CholeNan.png'),
('F04', 'Eggkari-Nan', 1, 'Simple', '45', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '04', 'EggkariNan.png'),
('F05', 'Paratha', 2, 'Aaloo Pyaj', '30', 'Paneer', '40', '', '', '', '', '', '', '', '', '', '', '', '', 5, '04', 'Paratha.png'),
('F06', 'Rice', 3, 'Fried', '40', 'Egg Fried', '50', 'Veg Biryani', '60', '', '', '', '', '', '', '', '', '', '', 5, '04', 'Rice.png'),
('FF01', 'Patties', 4, 'Aaloo', '12', 'Cheese', '20', 'Ragda', '20', 'Paneer', '20', '', '', '', '', '', '', '', '', 2, '03', 'Patties.png'),
('FF02', 'Burger', 1, 'Cheese', '30', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '03', 'Burger.png'),
('FF03', 'Dosa', 2, 'Simple', '45', 'Special', '60', '', '', '', '', '', '', '', '', '', '', '', '', 10, '03', 'Dosa.png'),
('FF04', 'Utpam', 2, 'Simple', '40', 'Paneer Utpam', '50', '', '', '', '', '', '', '', '', '', '', '', '', 10, '03', 'Utpam.png'),
('FF05', 'Idli', 1, 'Simple', '35', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 10, '03', 'Idli.png'),
('FF06', 'Omlet', 2, 'Simple', '30', 'Bread Omlet', '35', '', '', '', '', '', '', '', '', '', '', '', '', 10, '03', 'Omlet.png'),
('FF07', 'Hot Dog', 1, 'Hot Dog', '40', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '03', 'HotDog.png'),
('FF08', 'Roll', 2, 'Veg Roll', '30', 'Egg Roll', '35', '', '', '', '', '', '', '', '', '', '', '', '', 5, '03', 'Roll.png'),
('FF09', 'Paw Bhaji', 1, 'PawBhaji', '40', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '03', 'PawBhaji.png'),
('FF10', 'Chawmean', 3, 'Chawmean', '30', 'Egg Chawmean', '40', 'Hakka Nudle', '50', '', '', '', '', '', '', '', '', '', '', 5, '03', 'Chawmean.png'),
('FF11', 'Chilli Potato', 2, 'Simple', '35', 'Mumbaiya', '50', '', '', '', '', '', '', '', '', '', '', '', '', 5, '03', 'ChilliPotato.png'),
('FF12', 'Pizza', 2, 'Slice', '50', 'Pane Pizza', '100', '', '', '', '', '', '', '', '', '', '', '', '', 5, '03', 'Pizza.png'),
('S01', 'Lays', 6, 'Asco', '20', 'Spanish Tomato', '20', 'Salted', '20', 'Magic Masala', '20', 'Chilli Lemon', '20', 'Crispy', '20', '', '', '', '', 3, '02', 'Lays.png'),
('S02', 'Maxx Lays', 2, 'Macho Chilli', '', 'Sizzling Barbie', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '02', 'LaysMAXX.png'),
('S03', 'Kurkure', 6, 'Masala Munch S', '10', 'Masala Munch L', '20', 'Chilli Chatka', '10', 'Solid Masti', '10', 'Puffcorn', '10', 'Green Chatney', '20', '', '', '', '', 2, '02', 'Kurkure.png'),
('S04', 'Uncle Chipps', 2, 'Spicy Treat', '20', 'Salted', '20', '', '', '', '', '', '', '', '', '', '', '', '', 2, '02', 'UncleChips.png'),
('S05', 'Bingo', 4, 'Tomato Madness', '20', 'Chaat Masti', '20', 'Achari Masti', '20', 'Masala Madness', '20', '', '', '', '', '', '', '', '', 2, '02', 'Bingo.png'),
('S06', 'Sunfeast Bescuit', 8, 'Sunfeast Glucose', '5', 'Bounce Cream', '5', 'snacky', '10', 'Little Hearts', '10', 'Nutri Choice', '20', 'Dream Cream s', '20', 'Dream Cream L', '20', 'Bourbon', '20', 2, '02', 'Sunfeast.png'),
('S07', 'Hello Panda Biscuit', 6, 'Chocolate S', '35', 'Chocolate L', '70', 'Strawberry S', '35', 'Strawberry L', '70', 'Milk', '70', 'Chocolate fill', '70', '', '', '', '', 2, '02', 'HelloPanda.png'),
('S08', 'Bikaji Namkeens', 8, 'Tasty', '10', 'Peanuts', '10', 'Shahi Mix', '10', 'Aalo Bhujia', '10', 'Moong Daal', '10', 'Kaju Mixture', '10', 'Matar Masala', '10', 'Bikaneri Bhujia', '10', 3, '02', 'BikajiNamkeen.png'),
('S09', 'Britannia', 8, 'Britannia 50-50', '05', 'Bounce Cream', '05', 'Good Day S', '10', 'Good Day L', '10', 'Tiger Crunch', '10', 'Snacky', '10', 'Little Hearts', '10', 'Nutri Choice', '20', 2, '02', 'Britenia.png'),
('S10', 'Oyes', 3, 'Cocktail', '10', 'Khatta Meetha', '10', 'Tangy Pudeena', '10', '', '', '', '', '', '', '', '', '', '', 2, '02', 'Oyes.png'),
('Sw01', 'Nestle', 3, 'Kitkat S', '10', 'Kitkat M', '25', 'Kitkat L', '65', '', '', '', '', '', '', '', '', '', '', 2, '06', 'Nestle.png'),
('Sw02', 'Cadbury', 8, 'Dairy Milk S', '10', 'Dairy Milk M', '20', 'Dairy Milk L', '40', 'Dairy Milk F&N', '42', 'Dairy Milk Cracker', '40', 'Bournvill S', '45', 'Bournvill L', '99', 'Dairy Milk Silk s', '65', 2, '06', 'Cadbury.png'),
('Sw03', 'Gulab Jamun', 1, 'Gulab Jamun', '20', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, '06', 'GulabJamun.png');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `uid` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `ctype` varchar(45) NOT NULL,
  `cid` int(15) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'profile/image.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`uid`, `name`, `password`, `email`, `mobile`, `ctype`, `cid`, `gender`, `address`, `image`) VALUES
(0, 'Aditi', 'Aditi142@', 'aditi@gmail.com', '6879879444', 'Staff', 144265498, 'Female', 'A Block', 'profile/144265498.png'),
(0, 'Gauri Bansal', 'Gauri1234@', 'Gauri.Bansal_bca14@gla.ac.in', '7654649432', 'Faculty', 144656897, 'Female', 'DayScholar', 'profile/144656897.gif'),
(0, 'Himanshu Gupta', 'Him123@', 'himanshu.gupta_bca14@gla.ac.in', '9875465468', 'Staff', 0, 'Male', 'DayScholar', 'profile/gla-123.jpg'),
(0, 'Preeti Gupta', 'Preeti123@', 'Preeti.gupta_bca14@gla.ac.in', '7897465434', 'Student', 144200086, 'Female', 'Godavari', 'profile/144200086.png'),
(0, 'Shubham Jain', 'Shubh14@', 'Shubham.rapariya1@gmail.com', '8439182527', 'Student', 144200126, 'Male', 'DayScholar', 'profile/144200126.jpg'),
(0, 'Shubham Jain', 'Shubh1390597@', 'Shubham.rapariya2@gmail.com', '8439182527', 'Admin', 144211126, 'Male', 'A Block', 'profile/144200126.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`Bill no`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Order_id`) USING BTREE;

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110045;
--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `sno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
