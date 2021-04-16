-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2021 at 07:08 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real-estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `name`, `email`, `password`, `added_on`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '2021-01-25 12:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(50) NOT NULL,
  `h_number` int(11) NOT NULL,
  `b_address` varchar(255) NOT NULL,
  `b_location` varchar(255) NOT NULL,
  `b_price` varchar(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`b_id`, `b_name`, `h_number`, `b_address`, `b_location`, `b_price`, `image`, `status`) VALUES
(24, 'Row Hosue', 56, 'VIP road', 'Vesu', '90', '21616113_slide-2.jpg', 1),
(26, 'test', 123, 'test', 'udhna', '12 Lakhs', '33914830_slide-about-1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `status`, `created_on`) VALUES
(20, 'Row House', 1, '2021-01-26 22:02:12'),
(21, 'Building', 1, '2021-01-26 22:02:18'),
(22, 'Apperement', 1, '2021-01-26 22:02:25'),
(23, 'Bangalow', 1, '2021-01-26 22:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `comment`, `added_on`) VALUES
(3, 'abc', 'abc@gmail.com', 'test', 'testing', '2021-01-25 14:39:31'),
(5, '$name', '$email', '$subject', '$comment', '0000-00-00 00:00:00'),
(7, 'azhar', 'admin@gmail.com', 'testtest', 'werty', '0000-00-00 00:00:00'),
(8, 'azhar', 'admin@gmail.com', 'q', 'dbcnjd', '2021-02-04 11:47:19'),
(9, 'ert', 'sd@gmail.com', 'gh', 'V', '2021-02-06 04:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `enquries`
--

CREATE TABLE `enquries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `properties_id` int(11) NOT NULL,
  `status` enum('Sent','Approved','Rejected') NOT NULL DEFAULT 'Sent',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquries`
--

INSERT INTO `enquries` (`id`, `name`, `email`, `mobile`, `message`, `user_id`, `properties_id`, `status`, `added_on`) VALUES
(56, 'new', 'azhar.coderr@gmail.com', '919313835297', 'new msg', 32, 90, 'Sent', '2021-02-11 02:02:11'),
(57, 'azhar', 'azhar.coderr@gmail.com', '16555425232', 'qwsd', 29, 89, 'Sent', '2021-02-11 02:06:16'),
(58, 'azhar', 'azhar.coderr@gmail.com', '16555425232', 'qwsd', 29, 89, 'Sent', '2021-02-11 02:06:18'),
(59, 'new', 'new@gmail.com', '2545871874', 'check', 32, 90, 'Sent', '2021-02-11 02:07:48'),
(60, 'azhar', 'azhar.coderr@gmail.com', '12345678941', 'new msg', 29, 88, 'Sent', '2021-02-11 02:31:56'),
(62, 'azhar', 'azhar.coderr@gmail.com', '16555425232', 'check msh', 29, 92, 'Approved', '2021-02-11 04:13:54'),
(63, 'u1', 'u1@gmail.com', '2545871874', 'awsddfg', 26, 92, 'Approved', '2021-02-11 04:28:13'),
(64, 'sara', 'an@gmail.com', '16555425232', 'QWERTY', 31, 91, 'Rejected', '2021-02-12 01:46:28'),
(65, 'sara', 'sara@gmail.com', '16555425232', 'i am sara', 31, 101, 'Sent', '2021-02-12 05:20:20'),
(66, 'sara1 ', 'sara@gmail.com', '12345678941', 'qwertyyyy', 31, 99, 'Sent', '2021-02-13 01:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `enquries_status`
--

CREATE TABLE `enquries_status` (
  `e_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `properties_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(11) NOT NULL,
  `detials` text NOT NULL,
  `features` text NOT NULL,
  `area` varchar(50) NOT NULL,
  `rooms` int(11) NOT NULL,
  `bath` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`properties_id`, `cat_id`, `user_id`, `name`, `address`, `location`, `city`, `pincode`, `image`, `price`, `detials`, `features`, `area`, `rooms`, `bath`, `views`, `status`, `added_on`) VALUES
(97, 22, 31, 'S_qwe', 'bn', 'bn', 'bn', '2345', '44710328_property-4.jpg', '23', 'qwe', 'we', '23', 2, 2, 0, 1, '2021-02-12 13:55:32'),
(99, 21, 29, 'Azhar builfnf', 'gbn', 'hn', 'gh', '456', '65999720_property-2.jpg', '8', 'fg', 'vb', '6', 8, 8, 2, 1, '2021-02-12 14:31:30'),
(101, 21, 29, 'abc', 'cvbn', 'b', 'b', '78', '25963182_about-1.jpg', '6', 'dfgdfg', 'fg', '23', 7, 7, 2, 1, '2021-02-12 14:37:36'),
(103, 23, 29, 'cvb', 'fvgb', 'bnm', 'gh', '6789', '21761654_property-10.jpg', '6789', 'cvb', 'vfb', '456', 7, 7, 0, 1, '2021-02-12 14:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `property_image`
--

CREATE TABLE `property_image` (
  `id` int(11) NOT NULL,
  `properties_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_image`
--

INSERT INTO `property_image` (`id`, `properties_id`, `file`) VALUES
(17, 68, 'Admin/media/properties/agent-1.jpg'),
(19, 68, 'Admin/media/properties/agent-3.jpg'),
(28, 92, 'Admin/media/properties/agent-5.jpg'),
(29, 92, 'Admin/media/properties/agent-6.jpg'),
(30, 92, 'Admin/media/properties/agent-7.jpg'),
(31, 92, 'Admin/media/properties/property-5.jpg'),
(33, 97, 'Admin/media/properties/post-1.jpg'),
(34, 97, 'Admin/media/properties/post-2.jpg'),
(36, 97, 'Admin/media/properties/post-4.jpg'),
(37, 97, 'Admin/media/properties/post-5.jpg'),
(41, 101, 'Admin/media/properties/agent-3.jpg'),
(42, 101, 'Admin/media/properties/agent-6.jpg'),
(43, 101, 'Admin/media/properties/agent-7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `mobile`, `password`, `cpassword`, `description`, `user_image`, `status`, `added_on`) VALUES
(26, 'u1', 'u1@gmail.com', '2545871874', '12345', '12345', 'i am user 1', '23613538_agent-6.jpg', 0, '2021-02-06 11:36:10'),
(27, 'u2', 'u2@gmail.com', '919313835297', '123456', '123456', 'i am user 2', '76643906_agent-5.jpg', 0, '2021-02-06 12:09:40'),
(29, 'azhar', 'azhar.coderr@gmail.com', '5465454530', 'azhar123', 'azhar123', 'developer', '82834302_agent-3.jpg', 0, '2021-02-09 13:12:11'),
(30, 'imran', 'imran@gmail.com', '2545871874', 'imran123', 'imran123', 'i am imran', '99257603_author-1.jpg', 0, '2021-02-09 13:33:30'),
(31, 'sara', 'sara@gmail.com', '5465454530', 'sara123', 'sara123', 'i am Sara', '49270476_agent-4.jpg', 0, '2021-02-09 13:41:55'),
(32, 'new', 'new@gmail.com', '919313835297', 'new123', 'new123', 'new user', '50691226_agent-2.jpg', 0, '2021-02-10 15:31:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquries`
--
ALTER TABLE `enquries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquries_status`
--
ALTER TABLE `enquries_status`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`properties_id`);

--
-- Indexes for table `property_image`
--
ALTER TABLE `property_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `enquries`
--
ALTER TABLE `enquries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `enquries_status`
--
ALTER TABLE `enquries_status`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `properties_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `property_image`
--
ALTER TABLE `property_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
