-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql309.infinityfree.com
-- Generation Time: Jul 01, 2026 at 11:47 AM
-- Server version: 11.4.12-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_41838796_shram`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(5) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_userid` varchar(100) NOT NULL,
  `a_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_userid`, `a_password`) VALUES
(1, 'Vasudev_Shram', 'Vasudev_Admin', 'Shram1006');

-- --------------------------------------------------------

--
-- Table structure for table `build_cart`
--

CREATE TABLE `build_cart` (
  `cart_id` int(5) NOT NULL,
  `item_id` int(5) NOT NULL,
  `b_id` int(5) NOT NULL,
  `cart_name` varchar(100) NOT NULL,
  `cart_amount` int(50) NOT NULL,
  `cart_photo` varchar(500) NOT NULL,
  `cart_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `build_cart`
--

INSERT INTO `build_cart` (`cart_id`, `item_id`, `b_id`, `cart_name`, `cart_amount`, `cart_photo`, `cart_type`) VALUES
(30, 55, 13, 'A Small Paint Pail', 30, 'A Small Paint Pail.jpg', 'Painter'),
(31, 4, 13, 'Welding Gloves', 20, 'Welding Gloves.jpg', 'Welder'),
(32, 65, 13, 'The Chisel', 10, 'download (2).jpeg', 'Carpentor'),
(33, 34, 13, 'Adjustable Wrench', 20, 'Adjustable wrench.jpg', 'Plumber'),
(34, 127, 13, 'Pick Axe', 20, 'Pick Axe.jpg', 'mason');

-- --------------------------------------------------------

--
-- Table structure for table `build_cust_book`
--

CREATE TABLE `build_cust_book` (
  `build_book_id` int(5) NOT NULL,
  `cust_id` int(5) NOT NULL,
  `b_id` int(5) NOT NULL,
  `build_book_date` date NOT NULL,
  `build_book_note` varchar(500) NOT NULL,
  `build_book_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `build_cust_book`
--

INSERT INTO `build_cust_book` (`build_book_id`, `cust_id`, `b_id`, `build_book_date`, `build_book_note`, `build_book_status`) VALUES
(1, 2, 17, '2023-02-28', 'For House Renovation ', 0),
(2, 2, 13, '2023-02-27', 'For Builder New Room ', 1),
(6, 3, 13, '2023-03-28', 'for building room', 1),
(11, 6, 30, '2026-05-22', 'Hi this is my first booking', 0),
(12, 6, 21, '2026-05-27', 'Hii this is my second booking ', 0),
(13, 7, 24, '2026-06-04', 'Hii this is my first booking :)', 0),
(14, 6, 25, '2026-05-20', 'This is second booking ', 0),
(15, 7, 21, '2026-05-20', 'This is second booking vasudev2001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `build_details`
--

CREATE TABLE `build_details` (
  `b_id` int(5) NOT NULL,
  `b_name` varchar(500) NOT NULL,
  `b_email` varchar(500) NOT NULL,
  `b_number` bigint(13) NOT NULL,
  `b_experience` int(5) NOT NULL,
  `b_state` varchar(50) NOT NULL,
  `b_city` varchar(50) NOT NULL,
  `b_landmark` varchar(200) NOT NULL,
  `b_password` varchar(200) NOT NULL,
  `b_photo` varchar(500) NOT NULL,
  `b_rating` int(5) NOT NULL,
  `b_token` varchar(500) NOT NULL,
  `b_status` int(11) NOT NULL,
  `b_emailverify` int(20) NOT NULL,
  `b_approval` int(5) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `build_details`
--

INSERT INTO `build_details` (`b_id`, `b_name`, `b_email`, `b_number`, `b_experience`, `b_state`, `b_city`, `b_landmark`, `b_password`, `b_photo`, `b_rating`, `b_token`, `b_status`, `b_emailverify`, `b_approval`) VALUES
(13, 'Sailesh', 'parmarvasudev2001@gmail.com', 918980629334, 11, 'Gujarat', 'Ahmadabad City', 'prahad nagar', '$2y$10$CG2xrpJHCpR7iJlWKdZKOOyE5OKfgvfjN4hZQdB6Olfy.cC9NIKGO', '300FC976359.jpg', 0, '93bb065808b4541c916f94d035614056', 0, 1, 1),
(14, 'Amit', 'Amit@gmail.com', 917845857485, 13, 'Gujarat', 'Vadodara', 'Gorwa', '$2y$10$ppP.beivk2JyxKlILdvLeuK9yQaxTLQWuskLIfiToY6P34bWRnIT2', '1ZM1044843.jpg', 0, '8d9286b411cc2d63f95fa5c20b04a6e1', 0, 1, 1),
(15, 'Shreya', 'Shreya@gmail.com', 917992366460, 11, 'Gujarat', 'Vadodara', 'gorwa', '$2y$10$oyVKTNRGypnBD6xTS3Fc9.tC3onlN6v.zc49ULrNyr0bTKqGviMR2', '120SM617538.jpg', 0, '696c2d3041c95b7bed003e74a8acd68a', 0, 1, 1),
(17, 'Payal', 'Payal@gmail.com', 918974589654, 15, 'Gujarat', 'Vadodara', 'Gorwa', '$2y$10$Dokhurxr7TeZf15nkWSZVuY85zk/NrJOCkNo9Q4PaGbSsjR7yhNnC', '399SM1121333.jpg', 0, '92610f3fa049fd8957a035706d6e30de', 0, 1, 1),
(18, 'Ashish', 'Ashish@gmail.com', 917485966574, 12, 'Gujarat', 'Vadodara', 'Gorwa', '$2y$10$ca6aLSg/HA54zf1pcCImo.GdB4bk15KqhR/0O/GfFY/0PucB0eRx.', '399SM1114851.jpg', 0, 'ec8e9151aee0e1df11628de8dce827d1', 0, 1, 1),
(19, 'Avni', 'Avni@gmail.com', 917584758496, 10, 'Gujarat', 'Vadodara', 'gorwa', '$2y$10$RvcNyD60NsXIbl1LLDQ6DOkgSvv7J.p6BdTsryFWTrADiTj7mdmHe', '120SM673049.jpg', 0, '6c80eda9f3d57bf6ec0191773bb722a5', 0, 1, 1),
(20, 'Anushka ', 'Anushka@gmail.com', 916964748596, 15, 'Gujarat', 'Vadodara', 'Gorwa', '$2y$10$.s9FVKyHFQTq0bdwhwRv9utsj7jNDzmc2c.j8bR/Pyu64ZxfHr7XG', '399SM1121932.jpg', 0, 'c5cf180a36f168795b734c159475fdee', 0, 1, 1),
(21, 'Anandi', 'parmarvasudev00@gmail.com', 917896547485, 12, 'Gujarat', 'Vadodara', 'gorwa', '$2y$10$R7/uavj08Yfq6dqmGSf9le.Y13dKkf4AvW6VZDAPXIu1QjcHADjA.', '21_1778663577.jpg', 0, '635adf9c6791823f198f0e034eba4e43', 0, 1, 1),
(22, 'Shivansh', 'Shivansh@gmail.com', 917654748596, 15, 'Gujarat', 'Vadodara', 'gorwa', '$2y$10$AyACLom4CltfK.0.tGszs.N6XRlOflTy57Psopyw3w7ibnh4cd3Ju', '120SM1117231.jpg', 0, '94b8115eed75a0c6966cd7cee25df9bb', 0, 1, 1),
(24, 'Rishabh', 'Rishabh@gmail.com', 916324587485, 17, 'Gujarat', 'Vadodara', 'Gorwa', '$2y$10$IhHn8Vdirig4Pdw6eMUrx.zGcUZUTc04ZNjMMeniT57UtmzlSbSjO', '399SM1117310.jpg', 0, 'eea1f537b57c82ab8c25feea69b528ae', 0, 1, 1),
(25, 'Gautam', 'Gautam@gmail.com', 918745964785, 20, 'Gujarat', 'Vadodara', 'Wadhodiya', '$2y$10$VX6W.wjqyZlR8R0Uspsh6O.Hv.xWCad3DILw6tDD1ZzGjzP5QHJIm', '120SM644056.jpg', 0, '41d720b3f02a455afd0d0414c062926a', 0, 1, 1),
(26, 'Avantika', 'Avantika@gmail.com', 917487569657, 13, 'Gujarat', 'Vadodara', 'gorwa', '$2y$10$FPgoSqlRWA6E7qneSRHQne1avGV.jHM59vo/RKrgQzNN1PJrhTO.2', '220SM895810.jpg', 0, '4b2b329cd6be89a3680c7d970c6d9b01', 1, 1, 1),
(27, 'Aman', 'Aman@gmail.com', 917896547534, 14, 'Gujarat', 'Vadodara', 'Gorwa', '$2y$10$Io.rAVw4UbCtdQ8nhdW5ZOfva4Nctsop9L6u3hKrZHpOekkdtEQzi', '4SM293630.jpg', 0, 'eebd0d75779fd42cb71065bf24f85626', 1, 1, 1),
(28, 'Gaytri', 'Gaytri@gmail.com', 917482147474, 13, 'Gujarat', 'Vadodara', 'Gorwa', '$2y$10$snNXwmJNPOpTPGwM8aiJd.VbmEzsUHvf0kGB2DJi5QkFHpK6dcxoW', '1SM596475.jpg', 0, 'e5abd3b5592e7f0022207e4d4b540414', 1, 1, 1),
(29, 'Mahesh', 'Mahesh@gmail.com', 916374586112, 18, 'Gujarat', 'Vadodara', 'Gorwa', '$2y$10$fD37eTH8HD8HClDAO5AtQuX/zVg8NIJpAsX9pSWn0LMu.vp.qXXtO', '18SM734272.jpg', 0, 'a637cdca199787256e325adf7a65fd5e', 1, 1, 1),
(30, 'Kartik', 'parmarvasudev200@gmail.com', 917685742145, 10, 'Gujarat', 'Vadodara', 'gorwa', '$2y$10$Y9j4yCO0A2vNgWdMCIH/Uu/j9rNY8bUzBveCzEicaPW/TTIlqiXpi', '300ZM1043062.jpg', 0, '6062731c37b460dbfdce914ab407570a', 1, 1, 1),
(31, 'Bhumi', 'Bhumi@gmail.com', 919654785412, 12, 'Gujarat', 'Vadodara', 'gorwa', '$2y$10$Vm5NN9yp76dXuBLAbAXaneo4pd/u/pCgJrXt2hvmD25OX98xPIfIK', '220SM723191.jpg', 0, 'c72838672ba00e33716b9c998bbaf3d4', 1, 1, 1),
(33, 'Vikas', 'Vikas@gmail.com', 918401332436, 15, 'Gujarat', 'Vadodara', 'Gorwa', '$2y$10$WuIWQuH5.DFyrMmucHQ6E.Ii0nSlQCNsKPqamQ9DRa/Ggb/7RnPjW', '20SM258955.jpg', 0, 'e93799c626c75adb09b0d34b1d11a885', 1, 1, 1),
(34, 'Vasudev', 'parmarvasudev63@gmail.com', 918980629376, 6, 'Gujarat', 'Vadodara', 'Gorwa', '$2y$10$cbvnpm7pRDraAkOxhfKC/OL.ieUfNwjffYAlTLB8mPSJUc21ayjDq', 'builder_1778828835.jpg', 0, 'd6f7a7603bfb4319a37142c74e9a7ff6651c3d702238b1b9b278ee0e3ebb314d', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `build_fev_item`
--

CREATE TABLE `build_fev_item` (
  `fev_id` int(5) NOT NULL,
  `item_id` int(5) NOT NULL,
  `b_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `build_fev_item`
--

INSERT INTO `build_fev_item` (`fev_id`, `item_id`, `b_id`) VALUES
(6, 100, 13),
(7, 34, 13),
(8, 65, 13),
(9, 51, 13),
(10, 63, 0),
(11, 99, 0);

-- --------------------------------------------------------

--
-- Table structure for table `build_item_history`
--

CREATE TABLE `build_item_history` (
  `id` int(5) NOT NULL,
  `payment_id` varchar(20) NOT NULL,
  `b_id` int(5) NOT NULL,
  `payment_amount` int(10) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `payment_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `build_item_history`
--

INSERT INTO `build_item_history` (`id`, `payment_id`, `b_id`, `payment_amount`, `payment_mode`, `payment_status`) VALUES
(1, 'MOJO3301F05A31488236', 13, 70, 'CARD', 'Completed'),
(3, 'MOJO3301805A31488237', 13, 100, 'CARD', 'Completed'),
(4, 'MOJO3301V05A31488241', 13, 150, 'CARD', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `build_labour_book`
--

CREATE TABLE `build_labour_book` (
  `build_labour_book_id` int(5) NOT NULL,
  `b_id` int(5) NOT NULL,
  `l_id` int(5) NOT NULL,
  `build_labour_book_date` date NOT NULL,
  `build_labour_book_note` varchar(500) NOT NULL,
  `build_labour_book_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `build_labour_book`
--

INSERT INTO `build_labour_book` (`build_labour_book_id`, `b_id`, `l_id`, `build_labour_book_date`, `build_labour_book_note`, `build_labour_book_status`) VALUES
(3, 13, 3, '2023-02-28', 'I need you For My Project ', 2),
(4, 13, 2, '2023-02-28', 'For Constructing Slab for home', 1),
(5, 13, 12, '2023-03-09', ' Pipeline  For my new Home Project ', 0),
(6, 13, 8, '2023-03-13', 'Wiring For my New Home Project', 2),
(7, 13, 3, '2023-03-30', 'i need you for My project', 1),
(8, 21, 15, '2026-05-21', 'i need painter for my project \r\n', 0),
(10, 21, 7, '2026-05-20', 'Hiii I need your service ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cust_cart`
--

CREATE TABLE `cust_cart` (
  `cart_id` int(5) NOT NULL,
  `item_id` int(5) NOT NULL,
  `cust_id` int(5) NOT NULL,
  `cart_name` varchar(100) NOT NULL,
  `cart_amount` int(50) NOT NULL,
  `cart_photo` varchar(500) NOT NULL,
  `cart_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cust_cart`
--

INSERT INTO `cust_cart` (`cart_id`, `item_id`, `cust_id`, `cart_name`, `cart_amount`, `cart_photo`, `cart_type`) VALUES
(19, 98, 2, 'Non-contact voltage tester', 20, 'Non-contact voltage tester.jpg', 'Electrician'),
(25, 132, 2, 'Crow Bar', 20, 'Crow Bar.jpg', 'mason'),
(26, 142, 2, 'Tooth Chisel', 30, 'Tooth Chisel.jpg', 'mason'),
(28, 105, 2, 'Cable dispenser', 20, 'Cable dispenser.jpg', 'Electrician'),
(29, 25, 3, 'Welding Boots', 10, 'Welding Boots.jpg', 'Welder'),
(30, 54, 3, 'Brush And Roller Spinner', 10, 'Brush And Roller Spinner.jpg', 'Painter');

-- --------------------------------------------------------

--
-- Table structure for table `cust_details`
--

CREATE TABLE `cust_details` (
  `cust_id` int(10) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_number` bigint(13) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_state` varchar(50) NOT NULL,
  `cust_city` varchar(50) NOT NULL,
  `cust_address` varchar(500) NOT NULL,
  `cust_landmark` varchar(100) NOT NULL,
  `cust_password` varchar(500) NOT NULL,
  `cust_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cust_details`
--

INSERT INTO `cust_details` (`cust_id`, `cust_name`, `cust_number`, `cust_email`, `cust_state`, `cust_city`, `cust_address`, `cust_landmark`, `cust_password`, `cust_status`) VALUES
(6, 'Vasudev', 918980629376, 'parmarvasudev63@gmail.com', 'Gujarat', 'Surat', 'E15 Pramukh Park ', 'Gorwa', '$2y$10$QjLaIkEhgBH9hBtom62GresQgLywUbNQAegZLYqJllp1LH22Jewpm', 1),
(7, 'Vasudev', 919428123146, 'parmarvasudev2001@gmail.com', 'Gujarat', 'Vadodara', 'E15 Pramukh Park 1', 'Gorwa', '$2y$10$KwMCelNcRm8S4ImE/J4A4ekbec2rEcobAwaFSjql4by9SXdG.yOhm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cust_feedback`
--

CREATE TABLE `cust_feedback` (
  `f_id` int(5) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `f_email` varchar(500) NOT NULL,
  `f_phone` bigint(12) NOT NULL,
  `f_message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cust_feedback`
--

INSERT INTO `cust_feedback` (`f_id`, `f_name`, `f_email`, `f_phone`, `f_message`) VALUES
(4, 'Vijay', 'Vijay@gmail.com', 7854626395, 'This website is veru user friendly and so usefull , \r\nthank you so much Shram'),
(5, 'Ajay', 'Ajay@yahoo.com', 918475485785, 'This is best Website i ever seen , this website give me best builder for my project'),
(6, 'Krishna Parmar', 'krishna@gmail.com', 7016454658, 'website is so good'),
(7, 'Anisha Singh', 'anshusingh79923@gmail.com', 7992366460, 'Good One'),
(8, 'Vasu', 'parmarvasudev63@gmail.com', 8980629376, 'ITs great website for construction work');

-- --------------------------------------------------------

--
-- Table structure for table `cust_fev_item`
--

CREATE TABLE `cust_fev_item` (
  `fev_id` int(5) NOT NULL,
  `item_id` int(5) NOT NULL,
  `cust_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cust_fev_item`
--

INSERT INTO `cust_fev_item` (`fev_id`, `item_id`, `cust_id`) VALUES
(3, 132, 2),
(8, 34, 2),
(9, 65, 2),
(12, 126, 3),
(13, 3, 3),
(34, 63, 7),
(36, 34, 6);

-- --------------------------------------------------------

--
-- Table structure for table `cust_item_history`
--

CREATE TABLE `cust_item_history` (
  `id` int(5) NOT NULL,
  `payment_id` varchar(20) NOT NULL,
  `cust_id` int(5) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `payment_amount` int(10) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cust_item_history`
--

INSERT INTO `cust_item_history` (`id`, `payment_id`, `cust_id`, `item_id`, `payment_amount`, `payment_mode`, `payment_status`, `address`, `city`, `state`, `order_date`, `order_time`) VALUES
(18, 'pay_Sncpk2QSjGFssc', 6, 61, 80, 'Razorpay', 'Completed', 'E15 Pramukh Park 1', 'Vadodara', 'Gujarat', '2026-05-10', '06:17:41'),
(19, 'pay_Sncpk2QSjGFssc', 6, 34, 80, 'Razorpay', 'Completed', 'E15 Pramukh Park 1', 'Vadodara', 'Gujarat', '2026-05-10', '06:17:41'),
(20, 'pay_SnfYNd0voF1NOr', 6, 64, 80, 'Razorpay', 'Completed', 'E15 Pramukh Park 1', 'Vadodara', 'Gujarat', '2026-05-10', '08:57:21'),
(21, 'pay_SnfYNd0voF1NOr', 6, 54, 80, 'Razorpay', 'Completed', 'E15 Pramukh Park 1', 'Vadodara', 'Gujarat', '2026-05-10', '08:57:21'),
(22, 'pay_SngZa6BTSoU0Xb', 6, 126, 60, 'Razorpay', 'Completed', 'E15 Pramukh Park 1', 'Vadodara', 'Gujarat', '2026-05-10', '09:57:12'),
(23, 'pay_SnggKzAssNmuCp', 6, 107, 80, 'Razorpay', 'Completed', 'E15 Pramukh Park 1', 'Vadodara', 'Gujarat', '2026-05-10', '10:03:40'),
(24, 'pay_SnggKzAssNmuCp', 6, 75, 80, 'Razorpay', 'Completed', 'E15 Pramukh Park 1', 'Vadodara', 'Gujarat', '2026-05-10', '10:03:40'),
(25, 'pay_SnggKzAssNmuCp', 6, 126, 80, 'Razorpay', 'Completed', 'E15 Pramukh Park 1', 'Vadodara', 'Gujarat', '2026-05-10', '10:03:40'),
(26, 'pay_T5lhzMUKnAPzj2', 6, 34, 70, 'Razorpay', 'Completed', 'E15 Pramukh Park 1', 'Surat', 'Gujarat', '2026-06-25', '02:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `i_id` int(5) NOT NULL,
  `i_name` varchar(100) NOT NULL,
  `i_type` varchar(100) NOT NULL,
  `i_amount` int(100) NOT NULL,
  `i_note` varchar(1000) NOT NULL,
  `i_status` int(5) NOT NULL,
  `i_photo` varchar(500) NOT NULL,
  `i_rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`i_id`, `i_name`, `i_type`, `i_amount`, `i_note`, `i_status`, `i_photo`, `i_rating`) VALUES
(3, 'Welding Helmet', 'Welder', 10, 'The most basic and most recognizable piece of welding equipment you can get, the welding helmet is a staple of the craft and a safety necessity.  The primary purpose of any type of welding helmet is to prevent sparks and flames from scarring your face while you work and prevent damage to the skin and eyes from the heat.  Auto-darkening helmets have the added feature of protecting your eyes from the harsh lights emitted from other welding tools and from the heated metal itself.  The glass covering the eyes is shaded to only allow a certain amount of light through at a time, allowing you to see without damaging your eyes.', 0, 'welding helmet.jpg', 1),
(4, 'Welding Gloves', 'Welder', 20, 'Gloves are pretty self-explanatory. Welding gloves consist of layers of robust fabrics and insulation, preventing injuries from heat and stray sparks. Welding gloves are easy to find anywhere you buy gloves, but they are essential to any form of welding you might do.', 0, 'Welding Gloves.jpg', 1),
(6, 'MIG Welding Pliers', 'Welder', 30, 'MIG pliers are widely available in most hardware stores as well as online. They are far from a specialty item and are pretty cheap for how much you can do with them.', 0, 'eastwood-mig-pliers-300x300.jpg', 1),
(8, 'Welding Magnets', 'Welder', 10, 'Welding magnets are one of the most versatile tools you will have in your kit. That is what makes them so useful while welding.   With a welding magnet, you can hold pieces of metal in place without the use of clamps and manipulate them easily.  They also allow you to mount pieces of metal and weld them at an angle to one another.  In short, they allow for pieces of sheet metal to be welded in ways that clamps would not allow. The longer you use these, the more uses you will find for them.', 0, 'welding-magnet-300x300.jpeg', 1),
(10, 'Chipping Hammer', 'Welder', 10, 'One facet of MIG welding or stick welding is the condensation of slag as the metal melts and forms into the weld.  This slag needs to be chipped away at times. This is what the chipping hammer is for.  Chipping hammers have a flat side and a pointed side, optimized for different kinds of slag.  You may not use these overly often, but they make the process of welding much cleaner and more manageable.', 0, 'chipping-hammer-300x300.jpeg', 1),
(12, 'Speed Square', 'Welder', 20, 'A speed square may be the tool you use the most out of any of the things listed here. You can measure any piece either perpendicular to another for a 90-degree cut or at any other angle with your speed square.  A speed square is an angular measuring device shaped like a right triangle, allowing for multiple forms of measuring at different angles. Of all the welding tools at your disposal, this is the one you will find yourself reaching for the most. You can’t do much if you can’t measure.', 0, 'Speed Square.jpg', 1),
(13, 'Welding Framing Jig', 'Welder', 30, 'A welding framing jig is not on the same level of necessity as many of the other items on this list, but it is still a nice piece of equipment to have.  What a welding framing jig does is provide an apparatus for welding at 90-degree angles. While you could use a welding magnet for this, a framing jig allows for a much greater degree of support while welding and allows for heavier metal pieces to be used.   Unlike magnets, it also allows for multiple layers or multiple components to be tack welded together at the same time, all at a perfect 90-degree angle. ', 0, 'welding-framing-jig-300x300.jpeg', 1),
(14, 'Metal Brush', 'Welder', 10, 'Like a chipping hammer, a metal brush is something that you don’t think about often but constantly use while welding.  A metal brush removes slag and charring from the top of cooled welds and leaves the whole thing looking nice and clean.  Not every welding process creates slag, but the ones that do require both chipping hammers and metal brushes to do the work properly. ', 0, 'Metal Brush.jpg', 1),
(15, 'Angle Grinder', 'Welder', 10, 'If you welding regularly, then an angle grinder can be a very useful tool to have in your toolbox.  Firstly, it can cut metal. You will always find yourself needs to cut down some metal stock. With a cut wheel, you can easily cut anything from sheet metal to bar stock with surprising ease.   Angle grinders are also useful for preparing metal before you weld. To avoid defects like porosity and cracking, you will want to clean the base metal. While this can be done with a wire brush, an angle grinder can save you a lot of time.', 0, 'Angle Grinder.jpg', 1),
(17, 'Sheet Metal Gauge', 'Welder', 20, 'To weld effectively, you will need to know how thick the metal you are working with is.  A steel metal gauge is a wheel with teeth spaced different widths apart corresponding to sheet metal’s various standard widths. As a tool, the sheet metal gauge is indispensable for welders of any skill level.', 0, 'sheet-metal-gauge-300x300.jpeg', 1),
(19, 'Soapstone', 'Welder', 10, 'The soapstone is not made of soap, but its marking implement is a similar consistency.  You use soapstone as a marking implement that is easily removed after you are done. Think of it as a piece of chalk made specifically for writing on metal.   Soapstone is superior to something like graphite because it can withstand the high heat and assault of flames from torches and other welding tools.', 0, 'soapstone-300x300.jpeg', 1),
(21, 'Metal File', 'Welder', 10, 'Similar to the angular grinder, the metal file’s primary use is to remove rough edges and burrs from the metal that you cut.   Metal files are also commonly used for all kinds of other metalworking projects; you have probably used them before at some point.  While angular grinders are good at the rougher removal process, files are for finishing and making a project look nice.', 0, 'metal-file-300x300.jpeg', 1),
(23, 'C Clamp', 'Welder', 30, 'C clamps are clamps that look like the letter C.  They can apply pressure from above and below at the same time and are very common for a wide variety of hardware projects, not just welding.  C clamps also allow for a greater amount of pressure than pinch clamps or even some welding clamps, allowing for a much more solid hold on whatever you need to clamp.', 0, 'welding-c-clamp-300x300.jpeg', 1),
(25, 'Welding Boots', 'Welder', 10, 'Foot injuries are one of the most common and least discussed work-related accidents. An estimated 25 percent of all disability applications are the result of foot injuries on the job.', 0, 'Welding Boots.jpg', 1),
(26, 'Welding Cart', 'Welder', 10, 'The welding cart is less of a tool and more a means of moving other tools around.  Air tanks are heavy. Fans are heavy. Gas tanks are heavy.  A welding cart allows you to move all of these things and more easily and efficiently. Some welding carts also have tool boxes attached to them, giving you a nice spot for everything else on this list. ', 0, 'Welding Cart.jpg', 1),
(29, 'Safety Glasses', 'Welder', 20, 'You can’t always have your welding helmet on, and sometimes it is a bit overkill.  For times like these, a reliable pair of safety glasses are perfect.  Safety glasses are made from durable plastic and stop sparks off of something like an angle grinder from flying into your eyes.', 0, 'Safety Glasses.jpg', 1),
(31, 'Hacksaw', 'Plumber', 10, 'Plumbers typically carry hacksaws so that they can cut through a variety of items, including nuts, bolts, pipes, and screws. Make sure you keep spare blades around too!', 0, 'Hacksaw.jpg', 1),
(33, 'Basin wrench', 'Plumber', 30, '10', 0, 'Basin wrench.jpg', 1),
(34, 'Adjustable Wrench', 'Plumber', 20, 'The adjustable wrench tightens and loosens hexagonal nuts and fittings on pipes. These wrenches come in various sizes, but plumbers most often have the 6- and 10-inch versions on hand.', 0, 'Adjustable wrench.jpg', 1),
(35, 'Faucet Key', 'Plumber', 20, 'Not a traditional wrench per se, but a critical part of any plumbing tools list. Faucet keys are small, X-shaped tools designed to open and close spigots and sillcocks. There are versatile models on the market for dealing with different stem fittings—1/4\", 9/32\", 5/16\", and so on', 0, 'Faucet key.jpg', 1),
(36, 'Thread Sealing Tape', 'Plumber', 20, 'plumbers use this tape to patch or prevent possible leaks at threaded joint connections in piping. Quality thread sealing tape is resistant to high and low temperatures. It also stretches for better, form-fitting coverage and never dries out.', 0, 'Thread sealing tape.jpg', 1),
(37, 'Torch', 'Plumber', 20, 'Many plumbers seal copper piping by soldering it. You need heat to solder.  torches are small, handheld tools that allow plumbers to apply intense heat in precise areas, soldering and sealing new piping for installs and replacements. They’re a must-have for any plumbing tools list.  8. Thread Sealing ', 0, 'Plumber’s torch.jpg', 1),
(38, 'Pliers', 'Plumber', 10, 'Like wrenches plumbers use pliers every day. These smaller tools are among the best tools for plumbers because they allow professionals to loosen and tighten nuts and bolts too small for a wrench to grip. They also fit easily in a  hand to squeeze into tight spaces where a wrench will not  fit.', 0, 'Pliers.jpg', 1),
(40, 'Plungers', 'Plumber', 20, 'Most homeowners own toilet plungers and sink plungers, but plumbers should come equipped with them, too. Trade professionals should be ready with heavy-duty flange and cup plungers of different sizes, which produce significantly more suction than the average consumer plunger.', 0, 'Plungers.jpg', 1),
(41, 'Hand Auger', 'Plumber', 10, 'A hand auger is a circular, handheld device that allows plumbers to drive a cable deep down a drain in order to break apart and clear clogs (via a hand crank). Hand-auger technology has come a long way over the years and there are various models and capabilities on the market for plumbing professionals to consider as part of their plumbing tools list. For smaller drains (hand basins or kitchen sinks), a drain snake or drain auger should be enough for the job.', 0, 'Hand Auger.jpg', 1),
(42, 'Snake Machine', 'Plumber', 20, 'A snake machine is essentially a larger, motorized version of the hand auger. When clogs are especially deep or difficult to displace, snake machines usually have the muscle to remedy the situation.', 0, 'Snake Machine.jpg', 1),
(43, 'Inspection Camera (Borescope)', 'Plumber', 30, 'Plumbers used to view inspection cameras (also called borescopes) as top-of-the-line technology in the plumbing trade, but now most plumbers carry them. These small cameras tethered by a long, flexible cable are inserted far down into drains and sewer lines to give professionals a better look at the condition of the piping and whatever may be obstructing it. Smaller plumbing businesses can now use prosumer models that connect directly to a smartphone for fast, convenient application.', 0, 'Inspection camera.jpg', 1),
(46, 'Heat Shields', 'Plumber', 30, 'If soldering is a regular part of your day-to-day, then it critical to use the proper safety equipment to protect yourself and the homeowner. Complete your plumbing tools list with reliable heat shields and pads. They help to protect plumbers and the surrounding environment from heat damage or fire when soldering is necessary.', 0, 'Heat shields pads.jpg', 1),
(47, 'PEX Pipe Expander', 'Plumber', 30, 'PEX piping is one of plumbing latest innovations. It’s resilient, flexible plastic piping offering unprecedented convenience and reliability. A PEX expander is a drill-like tool that widens the mouth of the pipe so you can insert a metal fitting. Because PEX piping retains its original shape, the mouth closes in on the fitting, creating a perfect seal for water to pass through. ', 0, 'PEX pipe expander &amp; fittings.jpg', 1),
(51, 'Extension Pole', 'Painter', 20, 'It is a light aluminum based , an extendable pole used for reaching high location and area where paint is to be applied, easy to adjust as per requirement. Its is available in different length.', 0, 'Extension Pole.jpg', 1),
(54, 'Brush And Roller Spinner', 'Painter', 10, 'Brush and roller spinner helps extend the life of your brushes and roller covers by removing excess coatings and moisture from the brush filaments and roller cover fabrics', 0, 'Brush And Roller Spinner.jpg', 1),
(55, 'A Small Paint Pail', 'Painter', 30, 'Paint pails are used for mixing and measuring paints and coatings. Pails fit inside buckets to help eliminate mess. Paint cups measure and hold paint for small touch-up jobs.', 0, 'A Small Paint Pail.jpg', 1),
(57, 'Stak Rack', 'Painter', 20, 'Stak Rack is a revolutionary tool that allows you to paint and stack doors and trim with ease.', 0, 'Stak Rack.jpg', 1),
(61, 'The Claw Hammer', 'Carpentor', 10, 'The claw on one side of the head should be well counterbalanced by the finished head, which should be somewhat rounded.  The other kind of head is the waffle head. Most commonly used in construction, it leaves a distinctive waffle mark on the wood when you drive the nail.', 0, 'The Claw Hammer.jpg', 1),
(63, ' The Utility Knife', 'Carpentor', 10, 'utility knife is another asset for the woodworker. There are many different kinds, but the kind that uses disposable blades is the most common. The blade retracts into the grip for safety. The woodworker will use the utility knife when cleaning out mortise joints or scribing wood, as well as many other uses.', 0, 'The Utility Knife.jpg', 1),
(64, 'The Moisture Meter', 'Carpentor', 20, 'A quality wood moisture meter is vital to the long-term success of any woodworking project you put together. Lumber mills try to dry their batches of lumber according to the intended end product destination. That is, if the wood is harvested in the wet Northeast but shipped to the arid Southwest, it will be dried more than wood kept in the Northeast for use by woodworkers.', 0, 'The Moisture Meter.jpg', 1),
(65, 'The Chisel', 'Carpentor', 10, 'An assortment of chisels should be part of every workbench. Chisels are not just for woodcarvers. Any woodworker will need chisels to clean out joints and saw cuts. Look for chisels made of high-alloy carbon steel or chromium-vanadium alloyed steel.', 0, 'download (2).jpeg', 1),
(68, 'The Nail Set', 'Carpentor', 20, 'The next hand tool every woodworker should have is a nail set. In fact, you should have several sizes. They look like awls, and you use them to drive nail heads into the wood so they are flush or right below the surface. This allows you to fill the holes and prepare for staining or painting.', 0, 'The Nail Set.jpg', 1),
(69, 'The Sliding Bevel', 'Carpentor', 20, 'If you’re going to be measuring a bunch of angles, a sliding bevel, or T-Bevel, will be a handy tool. This is adjustable, and you can lock it at the angle you want to mark, making it much more time-savvy to mark multiple angles.', 0, 'The Sliding Bevel.jpg', 1),
(70, 'The Layout Square', 'Carpentor', 20, 'A layout square, or combination square, comes in 6” and 12” sizes. Most woodworkers use the 6” model simply because it’s easiest to carry around. Also, most of the stock you’ll use will be no bigger than 6” wide, so 12” is overkill.  The layout square is a triangle you can use to mark square cuts on stock. Once you measure the length of the cut, you line up the layout square with the edge of the board. The short side will give you a straight, square cut across the end grain.  You can also measure off angles with the layout square. This helps when measuring for a bevel on a table saw or marking a cut for a miter saw. You can even use your layout square to determine an existing angle.', 0, 'The Layout Square.jpg', 1),
(72, 'The Clamp', 'Carpentor', 20, 'Clamps are vital to the success of any woodworking project. Most woodworkers agree that you can’t have too many clamps. While they can get expensive, you don’t want to skimp in this area. You’ll need clamps for 45 and 90-degree joints, and pipe clamps to reach for long stretches. You usually purchase the pipe clamp fixtures and insert your own pipe into the fixtures to make a really strong clamp to the size you need. C-clamps and F clamps are standard, but now you can get K camps, too. The great thing about these is that they can reach a long way into your work area and clamp things in the middle of your workspace. Deep-throated bar clamps and C clamps will help with this.', 0, 'The Clamp.jpg', 1),
(75, 'The Jig', 'Carpentor', 10, 'You don’t have to measure every single cut and joint if you have jigs. Most woodworkers make their own jigs. You usually use a jig with a power tool, to guide the piece through the saw. You can make a jig that you can use to cut a perfect circle. Maybe you need to make furniture with tapered legs. A jig will accomplish this, without the hassle of re-marking the angles on each leg. A dovetail jig does just that – it guides your wood as you make dovetail joints.', 0, 'The Jig.jpg', 1),
(76, 'The Feather Board', 'Carpentor', 30, 'Feather boards are important for achieving smooth, quality cuts. You’ll use a feather board with all kinds of saws and other cutting surfaces to push the material past the cutting edge. You can make your own feather boards, or purchase them instead. Most woodworkers find it easier to just make them so that they suit their own needs.', 0, 'The Feather Board.jpg', 1),
(77, 'The Metal Detector', 'Carpentor', 20, 'No, you’re not looking for buried treasure with your metal detector. You’re looking for something that could ruin your treasures – namely, your woodworking tools. It is of vital importance to keep metal out of your cutting surfaces, or you’ll ruin blades, bits, and knives on your tools. A quick scan with a metal detector will let you know if there is a piece of screw or nail still lodged in your stock. You’ll find out anyway, it’s just nice to find out before you ruin your tools.', 0, 'The Metal Detector.jpg', 1),
(81, 'The Bench Grinder', 'Carpentor', 20, 'Get a good bench grinder. It doesn’t have to be in the way – you can make a stand for it and keep it in the corner. But you’ll be amazed at how much you’ll use a bench grinder. You’ve got to keep all of your chisels sharp and keep the burrs off of your screwdrivers, too. A grinder doesn’t cost that much, and the time and expense it saves you when you have dull tools will pay for itself in no time.', 0, 'download (3).jpeg', 1),
(82, 'The Circular Saw', 'Carpentor', 20, 'A good circular saw is one of the most versatile tools you can own. Most people consider the circular saw to be a carpentry tool but combined with proper clamping of your materials, they are just as accurate as any table saw. Plus, you can use a circular saw for tasks that you could never attempt with a table saw. It makes a lot more sense to set up a couple of saw horses and get out the circular saw to cut a sheet of plywood or MDF than to try to maneuver around in your shop to cut them on a table saw. A high-quality circular saw should be the first power tool in your shop.', 0, 'he Circular Saw.jpg', 1),
(83, 'The Power Drill', 'Carpentor', 30, 'The next power tool you should purchase is a power drill. Now, many people swear by cordless drills, but they’re more expensive, and they can’t do everything that an electric drill can do – that’s where the term “power” comes in. Power drills are not as expensive, and they’re more powerful than cordless drills, which do have their place in your shop. The steady power that comes with a corded drill makes it a better tool for extended use, especially when using large bits such as paddle bits.', 0, 'The Power Drill.jpg', 1),
(84, 'The Sabre Saw', 'Carpentor', 10, 'Every woodworker should have a saber saw. Often called a jigsaw, it will allow you to cut curves and patterns in your stock materials. You’ll probably need an electric one, rather than a battery-operated, although the battery-powered saber saws work fine on thin material and for limited use. You need to find one that fits your hand. Too small, and you can’t grip it; too large, and you can’t control it. For thicker materials, you’ll need a band saw, which we’ll cover later.', 0, 'download (4).jpeg', 1),
(85, 'The Palm Sander', 'Carpentor', 20, 'A good palm sander is vital to any woodworker’s power tool collection. The palm sander will use ¼ of a sheet of sanding paper and is small enough to get into tight places. However, you should be careful not to sand patterns into your finished work with the palm sander. They usually move in a circular pattern, or back and forth. Either way, they can leave swirls and streaks in your wood that show up once it is stained, so be sure to keep it moving across the surface you are sanding so that you don’t sand grooves into your wood.', 0, 'The Palm Sander.jpg', 1),
(86, 'The Random Orbital Sander', 'Carpentor', 20, 'A random orbital sander is actually a step up from the “little brother” version – the palm sander. The random orbital sander uses hook and loop (Velcro) to fasten the sanding disks to the sanding pad. The random movement of the disk helps to avoid sanding patterns into your wood. Your main precaution with this tool is to make sure that your hardware supply store has discs in stock in every grit. Otherwise, you’ll have a sander that you can’t use because you can’t find sanding pads for it.', 0, 'The Radial Arm Saw.jpg', 1),
(88, 'The Rip Fence', 'Carpentor', 20, 'Your table saw should have a rip fence. You’ll want one with a fine-tuning adjustment that runs parallel to the blade. Some rip fences have an adjustment knob on each end of the fence, others on just one end. The main thing to look for is torque. When you move the fence, do both ends move evenly, or does the far end hand up? This can be a real problem, and you’ll save yourself a lot of frustration and stock lumber if you have a rip fence that stays parallel to the cutting blade.', 0, '51bP0go5EML._AC_SX425_.jpg', 1),
(93, 'The Radial Arm Saw', 'Carpentor', 10, 'The radial arm saw is expensive, bulky, and heavy. And, it’s absolutely indispensable to those who own one. If you choose to get one, just plan to have a permanent home for it, because it’s probably not going to travel to worksites with you.', 0, 'The Radial Arm Saw.jpg', 1),
(94, 'The Drill Press', 'Carpentor', 10, 'While most holes can be drilled with your power drill, there will be applications in your woodworking where a drill press will be invaluable. The drill press provides you with the ability to do precision drilling and deliver especially accurate large-diameter holes.', 0, 'The Drill Press.jpg', 1),
(95, 'The Surface Planer', 'Carpentor', 20, 'The surface planer is high-tech’s solution for the dedicated woodworkers through the generations who have patiently and skillfully planed their stock by hand to get it the right thickness. The time-saving surface planer makes your world much simpler. The planer has a table onto which you feed your stock. This table is between 10” and 14”, so that’s the maximum width of stock you can send through. A set of blades rotates, cutting the wood as it is fed through.', 0, 'The Surface Planer.jpg', 1),
(98, 'Non-contact voltage tester', 'Electrician', 20, 'This Klein non-contact voltage tester can automatically detect voltage and indicate both low and standard voltage in cables, circuit breakers, cords, wires, lighting fixtures and outlets.', 0, 'Non-contact voltage tester.jpg', 1),
(99, 'Demagnetizer / Magnetizer', 'Electrician', 20, 'Magnetize and demagnetizer your screwdriver bits or any other tools you have in one swipe withthis Klein tools MAG2 magnetizer and demagnetizer.', 0, 'Demagnetizer  Magnetizer.jpg', 1),
(100, 'Magnetic wristband', 'Electrician', 10, '10 strong magnets are embedded in this wristband to hold nuts, screws, nails, drill bits, bolts,washers and any other small metallic part required for your electrical project. It’s a perfect little tool accessory not only for electricians but for craftsmen in other trades.', 0, 'Magnetic wristband.jpg', 1),
(103, 'Automatic motorized wire stripping machine', 'Electrician', 10, 'Strip all types of wire from 0.06 inch (1.5mm) up to 0.98 inch or 25mm wires with this CO-Zautomatic motorized wire stripping machine. This is the ideal wire stripping machine you need if you have lots of scrap wires to strip and recycle.You can also use it if you work with different types of wires everyday on the jobsite and you need aneasy way of getting these wires stripped. Made of aluminum allow, it’s well-constructed and will serve for a long time', 0, 'Automatic motorized wire stripping machine.jpg', 1),
(104, 'Wire twisting tool', 'Electrician', 20, 'It can twist and strip wires simultaneously so that you accomplish two tasks at once. It’s a highlyeffective tool every electrician should have in his toolbox.', 0, 'Wire twisting tool.jpg', 1),
(105, 'Cable dispenser', 'Electrician', 20, 'Nothing beats a good cable dispenser when you need one on the jobsite. You can mount thisMadison cable dispenser on the fl oor or against the wall, and with it you can smoothly dispensecoils of armored cable or even NM-B cables, preventing them from tangling while carrying out yourprojects', 0, 'Cable dispenser.jpg', 1),
(106, 'Electrical maintenance tool carrier', 'Electrician', 30, 'Electricians makes use of many hand tools and accessories like screwdrivers, pliers, hammers,wire strippers, levels, and even multimeters. Carrying all these tools by hand is not only impossible but less than ideal. With an electricalmaintenance tool carrier like this one from Leathercraft, you can manage and organize all yourelectrical hand tools easily.', 0, 'Electrical maintenance tool carrier.jpg', 1),
(107, 'Auto-ranging clamp digital multimeter ', 'Electrician', 10, 'A multimeter is a must-have tool for electricians, whether professional or not. However, this auto-ranging clamp digital multimeter by Etekcity makes measuring AC/DC voltage and AC current aseasy as possible.', 0, 'Auto-ranging clamp digital multimeter.jpg', 1),
(108, 'Wire crimping tool set', 'Electrician', 20, 'Wire crimping is a pretty common tasks when carrying out electrical projects. This wire crimpingtool takes the work out of crimping wires. It’s one electrical tool you’ll fi nd indispensable onceyou’ve made use of it.', 0, 'Wire crimping tool set.jpg', 1),
(109, 'Set of Insulated Screwdrivers', 'Electrician', 20, 'One of the most common tool you’ll fi nd in any electrician’s tool belt is a screwdriver. Obviously,they’re used for turning screws in electrical components, fi xtures and fi ttings like sockets, lamps,junction boxes and distribution board. If you’re getting a screw driver for your electrical projects, it’s advisable to get the set that containsall the sizes you need. So that you can tackle any project that requires its use.', 0, 'Set of Insulated Screwdrivers.jpg', 1),
(110, 'Micro Precision Screw Driver Set', 'Electrician', 10, 'These are not necessarily very useful for carrying out wiring projects in a building. But if you fi ndyourself handling electronics components quite often, then you’ll surely fi nd a micro precisionscrewdriver set indispensable.', 0, 'Micro Precision Screw Driver Set.jpg', 1),
(112, 'Tape Measure', 'Electrician', 30, 'As an electrician, there’ll always be the need to take measurements such as the length of wires,length of conduits, length of walls and so on. That’s why having a tape measure is very important,allowing you to make accurate measurements and get the right quantity of materials for your job.', 0, 'Tape Measure.jpg', 1),
(116, 'Headlamp', 'Electrician', 10, 'Headlamp', 0, 'Headlamp.jpg', 1),
(118, 'Ratchet Action Cable Cutter', 'Electrician', 30, 'Ratchet Action Cable Cutter', 0, 'Ratchet Action Cable Cutter.jpg', 1),
(126, 'Bricklaying Trowel', 'mason', 10, 'is a point-nosed trowel for spreading mortar on bricks or concrete blocks with a technique called \"buttering\". The shape of the blade allows for very precise control of mortar placement.', 0, 'Bricklaying Trowel.jpg', 1),
(127, 'Pick Axe', 'mason', 20, 'A steel tool with one square shaped end and at the opposite end a sharp pointed tip, fitted into a long wooden handle, which mainly serves to work stone. It is similar to the bricklayer mattock.', 0, 'Pick Axe.jpg', 1),
(129, 'Drafting Chisel', 'mason', 10, 'This chisel, known as a drafting chisel or quirk, was used for cutting out slices of stone. It has a blade 0.5\" wide.', 0, 'Drafting Chisel.jpg', 1),
(131, 'Boning rods', 'mason', 30, 'Boning rods are wooden rod shaped like a large T- square, used for establishing level surfaces, horizontal. lines or lines with a constant slope. They are also used for setting out canal excavation. works, roads and dyke construction', 0, 'Boning rods.jpg', 1),
(132, 'Crow Bar', 'mason', 20, 'Crowbars are commonly used to open nailed wooden crates or pry apart boards.', 0, 'Crow Bar.jpg', 1),
(133, 'Brickwork Gauge Rod', 'mason', 10, 'A gauge rod comprises of a planed piece of timber equal in height to the height of a single storey wall, e.g. 2.7m, onto which marks of equal spacing are brought on. The dimensions between the marks represent the average thickness of a brick, plus the thickness of a mortar joint.', 0, 'Brickwork Gauge Rod.jpg', 1),
(135, 'Spades', 'mason', 20, 'A spade is a tool primarily for digging consisting of a long handle and blade, typically with the blade narrower and flatter than the common shovel.', 0, 'Spades.jpg', 1),
(136, 'Pitching Tool', 'mason', 20, 'The Footprint Masons Pitcher, or Pitching Chisel, is a typical stone masons tool used to remove unwanted stone from the face or sides of a masonry block that is being worked on. You “pitch” the surface to dress the stone as required', 0, 'Pitching Tool.jpg', 1),
(137, 'Water Level', 'mason', 30, 'The water level is often used to determine the level spot on 2 items that are at a distance from each other, such as posts or stakes in the ground. Make sure the items are in the ground or set up on a clamp attached to a work table so they are stable and firm.', 0, 'Water Level.jpg', 1),
(139, 'Wedge and Feathers', 'mason', 20, 'Plug and feather, also known as plugs and wedges, feather and wedges, wedges and shims, pins and feathers and feather and tare, refers to a technique and a three-piece tool set used to split stone.', 0, 'Wedge and Feathers.jpg', 1),
(142, 'Tooth Chisel', 'mason', 30, 'a stonecutter chisel having a toothed edge.', 0, 'Tooth Chisel.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `labour_cart`
--

CREATE TABLE `labour_cart` (
  `cart_id` int(5) NOT NULL,
  `item_id` int(5) NOT NULL,
  `l_id` int(5) NOT NULL,
  `cart_name` varchar(100) NOT NULL,
  `cart_amount` int(50) NOT NULL,
  `cart_photo` varchar(500) NOT NULL,
  `cart_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `labour_cart`
--

INSERT INTO `labour_cart` (`cart_id`, `item_id`, `l_id`, `cart_name`, `cart_amount`, `cart_photo`, `cart_type`) VALUES
(6, 51, 3, 'Extension Pole', 20, 'Extension Pole.jpg', 'Painter'),
(7, 106, 3, 'Electrical maintenance tool carrier', 30, 'Electrical maintenance tool carrier.jpg', 'Electrician'),
(8, 57, 3, 'Stak Rack', 20, 'Stak Rack.jpg', 'Painter');

-- --------------------------------------------------------

--
-- Table structure for table `labour_cust_book`
--

CREATE TABLE `labour_cust_book` (
  `lc_id` int(5) NOT NULL,
  `cust_id` int(5) NOT NULL,
  `l_id` int(5) NOT NULL,
  `lc_date` date NOT NULL,
  `lc_note` varchar(500) NOT NULL,
  `lc_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `labour_cust_book`
--

INSERT INTO `labour_cust_book` (`lc_id`, `cust_id`, `l_id`, `lc_date`, `lc_note`, `lc_status`) VALUES
(1, 2, 9, '2023-02-22', 'HIII', 0),
(2, 2, 10, '2023-02-18', 'Home Wiring ', 0),
(3, 2, 2, '2023-02-25', 'For Building wall', 1),
(4, 2, 5, '2023-02-27', 'Making Door and Windows\r\n', 1),
(5, 2, 13, '2023-02-25', 'PipeLine For Washroom', 0),
(6, 2, 3, '2023-02-26', 'For Balcony Construction', 2),
(7, 2, 4, '2023-02-28', 'For wall Building ', 2),
(8, 3, 13, '2023-03-16', 'Need builder for home construction', 0),
(9, 3, 2, '2023-03-22', 'need labour', 2),
(10, 3, 3, '2023-03-24', 'for building wall', 1),
(20, 6, 13, '2026-05-22', 'First Plumber Booking !!!', 0),
(21, 6, 6, '2026-07-15', 'Hyee i want to build Door and windows', 0),
(22, 6, 10, '2026-05-30', 'this is second booking', 0),
(23, 7, 2, '2026-05-21', 'hii kalpesh ', 1),
(24, 7, 7, '2026-05-21', 'Hii Amit this is vasudev2001 i want booking', 0),
(25, 7, 5, '2026-05-27', 'hii nayan this vasudev2001 , i want booking ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `labour_details`
--

CREATE TABLE `labour_details` (
  `l_id` int(5) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `l_number` bigint(12) NOT NULL,
  `l_lang` varchar(50) NOT NULL,
  `l_state` varchar(50) NOT NULL,
  `l_city` varchar(50) NOT NULL,
  `l_wage` int(5) NOT NULL,
  `l_type` varchar(50) NOT NULL,
  `l_exp` int(5) NOT NULL,
  `l_education` varchar(50) NOT NULL,
  `l_rating` int(5) NOT NULL,
  `l_photo` varchar(100) NOT NULL,
  `l_email` varchar(100) NOT NULL,
  `l_status` int(5) NOT NULL,
  `l_password` varchar(200) DEFAULT NULL,
  `l_emailverify` int(5) DEFAULT 0,
  `l_approval` int(5) DEFAULT 0,
  `l_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `labour_details`
--

INSERT INTO `labour_details` (`l_id`, `l_name`, `l_number`, `l_lang`, `l_state`, `l_city`, `l_wage`, `l_type`, `l_exp`, `l_education`, `l_rating`, `l_photo`, `l_email`, `l_status`, `l_password`, `l_emailverify`, `l_approval`, `l_token`) VALUES
(2, 'Kalpesh', 919755580434, 'gujarati', 'Gujarat', 'Vadodara', 400, 'mason', 15, 'illiterate', 0, '12-SM925889.jpg', '', 1, NULL, 1, 1, NULL),
(3, 'Suresh', 918980629387, 'gujarati', 'Gujarat', 'Vadodara', 800, 'mason', 3, 'literate', 0, '120-SM617571.jpg', 'suresh852@gmail.com', 1, NULL, 1, 1, NULL),
(4, 'Mahesh', 917992366460, 'hindi', 'Gujarat', 'Vadodara', 600, 'mason', 10, 'literate', 0, '20-SM617566.jpg', 'mahesh675@gmail.com', 1, NULL, 1, 1, NULL),
(5, 'Nayan', 918974885965, 'gujarati', 'Gujarat', 'Vadodara', 1200, 'Carpentor', 10, 'illiterate', 0, '16-SM828446.jpg', '', 1, NULL, 1, 1, NULL),
(6, 'Prakash', 91745658974, 'hindi', 'Gujarat', 'Vadodara', 1400, 'Carpentor', 14, 'literate', 0, '20-SM828379.jpg', 'prakash722@gmail.com', 1, NULL, 1, 1, NULL),
(7, 'Narendra', 917359704736, 'gujarati', 'Gujarat', 'Vadodara', 1600, 'Carpentor', 12, 'literate', 0, '19-SM827809.jpg', 'parmarvasudev2001@gmail.com', 1, NULL, 1, 1, NULL),
(8, 'aman', 917896541245, 'hindi', 'Gujarat', 'Vadodara', 1500, 'Electrician', 14, 'illiterate', 0, '220-SM636652.jpg', '', 1, NULL, 1, 1, NULL),
(9, 'aavesh', 919658741245, 'gujarati', 'Gujarat', 'Vadodara', 1700, 'Electrician', 13, 'literate', 0, '19-SM691493.jpg', 'aavesh658@gmail.com', 1, NULL, 1, 1, NULL),
(10, 'Pranav', 917254789654, 'hindi', 'Gujarat', 'Vadodara', 1900, 'Electrician', 10, 'literate', 0, '1-SM315331.jpg', 'pranav538@gmail.com', 1, NULL, 1, 1, NULL),
(11, 'Dhruv', 916358749612, 'gujarati', 'Gujarat', 'Vadodara', 1200, 'Plumber', 18, 'illiterate', 0, '1-SM691479.jpg', '', 1, NULL, 1, 1, NULL),
(12, 'Piyush', 916987451247, 'hindi', 'Gujarat', 'Vadodara', 1400, 'Plumber', 12, 'literate', 0, '18-SM315364.jpg', 'piyush616@gmail.com', 1, NULL, 1, 1, NULL),
(13, 'Karan', 917425854741, 'gujarati', 'Gujarat', 'Vadodara', 1500, 'Plumber', 14, 'literate', 0, '8-SM966463.jpg', 'karan466@gmail.com', 1, NULL, 1, 1, NULL),
(14, 'Pavan', 917452147425, 'hindi', 'Gujarat', 'Vadodara', 1600, 'Painter', 25, 'illiterate', 0, '300-SM970236.jpg', '', 1, NULL, 1, 1, NULL),
(15, 'Aditya', 918574962574, 'gujarati', 'Gujarat', 'Vadodara', 1800, 'Painter', 10, 'literate', 0, '18-SM691548.jpg', 'aditya383@gmail.com', 1, NULL, 1, 1, NULL),
(16, 'Vihaan', 919645321547, 'hindi', 'Gujarat', 'Vadodara', 1400, 'Painter', 12, 'literate', 0, '220-SM315343.jpg', 'vihaan419@gmail.com', 1, NULL, 1, 1, NULL),
(18, 'Siddharth ', 917869214536, 'gujarati', 'Gujarat', 'Vadodara', 1700, 'Welder', 15, 'illiterate', 0, '1-SM724945.jpg', '', 1, NULL, 1, 1, NULL),
(19, 'Rudra ', 917895632145, 'hindi', 'Gujarat', 'Vadodara', 1400, 'Welder', 11, 'literate', 0, '1-SM958969.jpg', 'rudra843@gmail.com', 1, NULL, 1, 1, NULL),
(22, 'Ivaan ', 917485974512, 'hindi', 'Gujarat', 'Vadodara', 500, 'Helper', 5, 'illiterate', 0, '19-GH929430.jpg', '', 1, NULL, 1, 1, NULL),
(23, 'umang', 916385749214, 'gujarati', 'Gujarat', 'Vadodara', 700, 'Helper', 9, 'literate', 0, '17-FG680401.jpg', 'umang880@gmail.com', 1, NULL, 1, 1, NULL),
(24, 'prince', 917845859678, 'hindi', 'Gujarat', 'Vadodara', 300, 'Helper', 10, 'literate', 0, '19-SM617569.jpg', 'prince213@gmail.com', 1, NULL, 1, 1, NULL),
(27, 'Vasudev', 918980629376, 'marathi English Hindi', 'Gujarat', 'Vadodara', 2000, 'Welder', 20, 'illiterate', 5, '1-FN740113.jpg', '', 1, '', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `labour_fev_item`
--

CREATE TABLE `labour_fev_item` (
  `fev_id` int(5) NOT NULL,
  `item_id` int(5) NOT NULL,
  `l_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `labour_fev_item`
--

INSERT INTO `labour_fev_item` (`fev_id`, `item_id`, `l_id`) VALUES
(10, 127, 3),
(12, 64, 3),
(14, 129, 3),
(15, 38, 3);

-- --------------------------------------------------------

--
-- Table structure for table `labour_item_history`
--

CREATE TABLE `labour_item_history` (
  `id` int(5) NOT NULL,
  `payment_id` varchar(20) NOT NULL,
  `l_id` int(5) NOT NULL,
  `payment_amount` int(10) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `payment_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `labour_item_history`
--

INSERT INTO `labour_item_history` (`id`, `payment_id`, `l_id`, `payment_amount`, `payment_mode`, `payment_status`) VALUES
(5, 'MOJO3301P05A31488281', 3, 130, 'CARD', 'Completed'),
(6, 'MOJO3301R05A31488282', 3, 120, 'CARD', 'Completed'),
(7, 'MOJO3301V05A31488283', 3, 50, 'CARD', 'Completed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `build_cart`
--
ALTER TABLE `build_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `build_cust_book`
--
ALTER TABLE `build_cust_book`
  ADD PRIMARY KEY (`build_book_id`);

--
-- Indexes for table `build_details`
--
ALTER TABLE `build_details`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `build_fev_item`
--
ALTER TABLE `build_fev_item`
  ADD PRIMARY KEY (`fev_id`);

--
-- Indexes for table `build_item_history`
--
ALTER TABLE `build_item_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `build_labour_book`
--
ALTER TABLE `build_labour_book`
  ADD PRIMARY KEY (`build_labour_book_id`);

--
-- Indexes for table `cust_cart`
--
ALTER TABLE `cust_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cust_details`
--
ALTER TABLE `cust_details`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `cust_feedback`
--
ALTER TABLE `cust_feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `cust_fev_item`
--
ALTER TABLE `cust_fev_item`
  ADD PRIMARY KEY (`fev_id`);

--
-- Indexes for table `cust_item_history`
--
ALTER TABLE `cust_item_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `labour_cart`
--
ALTER TABLE `labour_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `labour_cust_book`
--
ALTER TABLE `labour_cust_book`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `labour_details`
--
ALTER TABLE `labour_details`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `labour_fev_item`
--
ALTER TABLE `labour_fev_item`
  ADD PRIMARY KEY (`fev_id`);

--
-- Indexes for table `labour_item_history`
--
ALTER TABLE `labour_item_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `build_cart`
--
ALTER TABLE `build_cart`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `build_cust_book`
--
ALTER TABLE `build_cust_book`
  MODIFY `build_book_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `build_details`
--
ALTER TABLE `build_details`
  MODIFY `b_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `build_fev_item`
--
ALTER TABLE `build_fev_item`
  MODIFY `fev_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `build_item_history`
--
ALTER TABLE `build_item_history`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `build_labour_book`
--
ALTER TABLE `build_labour_book`
  MODIFY `build_labour_book_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cust_cart`
--
ALTER TABLE `cust_cart`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `cust_details`
--
ALTER TABLE `cust_details`
  MODIFY `cust_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cust_feedback`
--
ALTER TABLE `cust_feedback`
  MODIFY `f_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cust_fev_item`
--
ALTER TABLE `cust_fev_item`
  MODIFY `fev_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `cust_item_history`
--
ALTER TABLE `cust_item_history`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `i_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `labour_cart`
--
ALTER TABLE `labour_cart`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `labour_cust_book`
--
ALTER TABLE `labour_cust_book`
  MODIFY `lc_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `labour_details`
--
ALTER TABLE `labour_details`
  MODIFY `l_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `labour_fev_item`
--
ALTER TABLE `labour_fev_item`
  MODIFY `fev_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `labour_item_history`
--
ALTER TABLE `labour_item_history`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
