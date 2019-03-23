-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Nov 16, 2017 at 09:14 AM
-- Server version: 5.6.36
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kingoftasty`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `bill_id` mediumint(8) UNSIGNED NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bill_infor`
--

CREATE TABLE `bill_infor` (
  `BId` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill_infor`
--

INSERT INTO `bill_infor` (`BId`, `name`, `address`, `phone`, `email`, `city`) VALUES
(1, 'ddd', 'colombo13', 113456543, 've24@gmail.com', 'colombo'),
(2, 'vethu', 'colombo13', 112345678, 'vethu24@gmail.com', 'colombo'),
(3, 'thusshan', 'colombo13', 112345678, 'vivek18@gmail.com', 'colombo'),
(4, 'abc', 'colombo13', 112345678, 'vivek18@gmail.com', 'colombo');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_details`
--

CREATE TABLE `delivery_details` (
  `deliveryId` int(100) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `dphone` int(10) NOT NULL,
  `deladdress` varchar(255) NOT NULL,
  `deldate` date NOT NULL,
  `pickup` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery_details`
--

INSERT INTO `delivery_details` (`deliveryId`, `dname`, `dphone`, `deladdress`, `deldate`, `pickup`) VALUES
(1, 'nnn', 114785236, 'colombo', '2017-12-11', ''),
(2, 'vethu', 112389923, 'colombo', '2017-12-12', ''),
(3, 'kkkkkkkkkkk', 112389924, 'colombo', '2017-12-11', ''),
(4, 'abc', 112344551, 'colombo', '2017-12-12', '');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `description`, `type`, `image`, `price`) VALUES
(1, 'Tandoori Chicken Burger', 'with Charcoal grilled Tandoori chicken breast with cheese, onion, tomato and lettuce with a mix of raita and mint chutney.', 'BURGER1', 'Image/FOODS/BURGER/Tandoori-Chicken-Burger-1.jpg', 480),
(2, 'Texas Chicken Burger', 'with Crumbed, deep fried strips of chicken breast with cheese, onion, tomato, lettuce and mayonnaise.', 'BURGER2', 'Image/FOODS/BURGER/Beef-Stake-Burger-1.jpg', 550),
(3, 'Beef Steak Burger', 'with Slices of Charcoal Grilled lean beef steak with cheese, onion, tomato, gherkin and lettuce with our creamy mustard sauce.', 'BURGER3', 'Image/FOODS/BURGER/Beef-Burger-with-Cheese.jpg', 600),
(4, 'Beef Burger with Cheese', 'with Served with tomato, onion, lettuce and creamy mustard sauce.', 'BURGER4', 'Image/FOODS/BURGER/Beef-Burger-with-Cheese.jpg', 450),
(5, 'Fish Burger', 'with Pattie made from fresh Thalapath (Sword fish), with our own seasoning, cheese, onion, tomato, lettuce and mayonnaise.', 'BURGER7', 'Image/FOODS/BURGER/Fish-Burger-1.jpg', 400),
(6, ' CHICKEN BURGER', 'Even though berry season is only a few short weeks out of the year, frozen berries smoothie allow to enjoy the sweet taste of summer year round.', 'BURGER6', 'Image/FOODS/BURGER/Chicken Burger.jpg', 600),
(7, 'APPLE JUICE.', 'Apple juice is a fruit juice made by the maceration and pressing of apples. The resulting expelled juice may be further treated by enzymatic and centrifugal clarification to remove the starch and pectin.', 'BEVERAGES1', 'Image/FOODS/BEVERAGES/APPLE JUICE.jpeg', 250),
(8, 'Raspberry Fresh Juice', 'Great drink for a hot summer day. Refrigerate the sparkling mineral water (or Sprite) before you make the drink so that you can drink it right away!', 'BEVERAGES2', 'Image/FOODS/BEVERAGES/raspberryjuice.jpg', 250),
(9, 'POMEGRANATE JUICE', 'Small studies seem to suggest that drinking pomegranate juice might lower cholesterol. It\'s also thought that pomegranate juice may block or slow the buildup of cholesterol in the arteries of people who are at higher risk of heart disease.', 'BEVERAGES3', 'Image/FOODS/BEVERAGES/pomegranate-juice.jpg', 250),
(10, 'MANDARIN JUICE', 'Mandarin juice is sweet, high in Vitamin C and very easy to prepare. Kick-start your day with this invigorating blend of mandarin.', 'BEVERAGES4', 'Image/FOODS/BEVERAGES/mandarin juice.jpg', 260),
(11, 'CARROT CREAM SMOOTHY', 'Keep frozen mixed berries in your freezer and you will be able to whip up this smoothie in no time.', 'BEVERAGES5', 'Image/FOODS/BEVERAGES/CARROT CREAM SMOOTHIE.jpg', 380),
(12, 'BFROSTY BERRY SMOOTHIE', 'Even though berry season is only a few short weeks out of the year, frozen berries smoothie allow to enjoy the sweet taste of summer year round.', 'BEVERAGES6', 'Image/FOODS/BEVERAGES/FROSTY BERRY SMOOTHIE.jpg', 280),
(13, 'Iced Lemon Tea', 'Very simple, healthy and refreshing beverage made with lemon and tea powder on ice and it can help control your blood sugar levels.', 'BEVERAGES7', 'Image/FOODS/BEVERAGES/ICED TEA.jpg', 220),
(14, '', 'cccccccccc', 'Beverage', 'Berry-Smoothie.jpeg', 450);

-- --------------------------------------------------------

--
-- Table structure for table `foodss`
--

CREATE TABLE `foodss` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foodss`
--

INSERT INTO `foodss` (`id`, `name`, `description`, `type`, `image`, `price`) VALUES
(1, '', 'aaa', 'Beverage', 'b.jpg', 200),
(2, '', 'aaa', 'Juice', 'APPLE JUICE.jpeg', 122),
(3, 'aass', 'eeeaaa', 'Beverage', 'ICED TEA.jpg', 400),
(4, 'vethu', 'qqq', 'Juice', 'mandarin juice.jpg', 122),
(5, 'aavv', 'ssaa', 'Juice', 'raspberryjuice.jpg', 400);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` int(2) NOT NULL,
  `birthmonth` varchar(10) NOT NULL,
  `birthyear` int(4) NOT NULL,
  `password` varchar(25) NOT NULL,
  `location` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `user_level` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `gender`, `birthdate`, `birthmonth`, `birthyear`, `password`, `location`, `email`, `user_level`) VALUES
(1, 'Negomi', 'Female', 1, 'November', 1997, '0778708783', 'Mannar', 'annenegomi@gmail.com', 'user'),
(2, 'Meera', 'Female', 14, 'April', 1996, 'meera@123', 'Eastern-Batticaloa', 'meeraanand87@gmail.com', 'user ');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` int(100) NOT NULL,
  `paymentmethod` varchar(100) NOT NULL,
  `cardnum` int(100) NOT NULL,
  `securecode` int(100) NOT NULL,
  `expdate` date NOT NULL,
  `amount` double NOT NULL,
  `bank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentId`, `paymentmethod`, `cardnum`, `securecode`, `expdate`, `amount`, `bank`) VALUES
(1, 'visa', 2147483647, 4563, '2019-12-10', 1750, 'boc'),
(2, 'visa', 2147483647, 1234, '2019-12-12', 1750, 'boc'),
(3, 'mastercard', 2147483647, 1234, '2019-12-13', 2350, 'vsgdss'),
(4, 'visa', 2147483647, 1234, '0000-00-00', 550, 'boc');

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `ProID` int(100) NOT NULL,
  `Productname` varchar(100) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Price` double NOT NULL,
  `Image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`ProID`, `Productname`, `Description`, `Category`, `Price`, `Image`) VALUES
(1, 'Beef burger', 'beef', 'Burger', 400, ''),
(2, 'SADHGAFSD', 'FFTDSFDA', 'Burger', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `UserID` int(100) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Phone` int(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`UserID`, `FullName`, `Address`, `DOB`, `Gender`, `Phone`, `Email`, `Username`, `Password`) VALUES
(3, 'Ramcharan', '', '0000-00-00', '', 0, 'ramcharan@gmail.com', 'Ramcharan', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, '', '', '0000-00-00', '', 0, 'kabali@yahoo.com', 'Kabali', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(5, '', '', '0000-00-00', '', 0, 'asas@gmail.com', 'ASAS', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'Ram', 'colombo', '2017-10-17', 'male', 777021546, 'ram@yahoo.com', 'ram', '827ccb0eea8a706c4c34a16891f84e7b'),
(7, '', '', '0000-00-00', '', 0, 'vethu24@gmail.com', 'vethusshan', 'd457aac61e7bc82a0f36100eacef7ca9'),
(8, '', '', '0000-00-00', '', 0, 'athi@yahoo.com', 'Athi', '827ccb0eea8a706c4c34a16891f84e7b'),
(9, 'Ramm', 'colombo', '2017-02-13', 'male', 770723452, 'ramman@yahoo.com', 'ramman', 'd8578edf8458ce06fbc5bb76a58c5ca4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `bill_infor`
--
ALTER TABLE `bill_infor`
  ADD PRIMARY KEY (`BId`);

--
-- Indexes for table `delivery_details`
--
ALTER TABLE `delivery_details`
  ADD PRIMARY KEY (`deliveryId`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`type`);

--
-- Indexes for table `foodss`
--
ALTER TABLE `foodss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`ProID`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bill_infor`
--
ALTER TABLE `bill_infor`
  MODIFY `BId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `delivery_details`
--
ALTER TABLE `delivery_details`
  MODIFY `deliveryId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `foodss`
--
ALTER TABLE `foodss`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `ProID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `UserID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
