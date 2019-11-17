-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 17, 2019 at 04:01 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `sa_project01`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`, `name`, `status`) VALUES
(10, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Thanawat Gulati', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `catagories_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catagories_name`) VALUES
(2, 'คอมพิวเตอร์'),
(3, 'หูฟัง'),
(4, 'กล้องถ่ายรูป'),
(8, 'พัดลม'),
(9, 'โทรศัพท์');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `catagories` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `catagories`) VALUES
(1, 'Samsung-note-10', 'โทรศัพท์'),
(29, 'Iphone-11-Pro-Max', 'โทรศัพท์'),
(30, 'Sony-walkman', 'หูฟัง');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `iden` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `serialnumber` varchar(100) NOT NULL,
  `categories` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `date_regis` varchar(100) NOT NULL,
  `date_end` varchar(100) NOT NULL,
  `myaddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `fname`, `lname`, `iden`, `phone`, `email`, `serialnumber`, `categories`, `product_name`, `date_regis`, `date_end`, `myaddress`) VALUES
(7, 'ธนวัฒน์', 'กุลาตี', '1102003199061', '0902525906', 's6104062630301@email.kmutnb.ac.th', 'ABP662', 'หูฟัง', 'Sony-walkman', '2019-11-17', '2020-11-17', '20/70 หมู่บ้านอิ่มอัมพร 2 ซอยวัดกำแพง ถนนจรัญฯ 13 แขวงบางเชือกหนัง เขตตลิ่งชัน กทม. 10170'),
(8, 'สมชาย', 'สายชล', '1111111111111', '0922222222', 'thanawatgulatijames@gmail.com', 'SSIN9999', 'โทรศัพท์', 'Samsung-note-10', '2019-11-17', '2020-11-17', 'Bangkok , Thailand');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `uniqe_id` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `iden` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `serialnumber` varchar(100) NOT NULL,
  `categories` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `date_regis` varchar(100) NOT NULL,
  `date_end` varchar(100) NOT NULL,
  `myaddress` text NOT NULL,
  `status` int(11) NOT NULL,
  `note` text NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_note` text,
  `admin_date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `uniqe_id`, `fname`, `lname`, `iden`, `phone`, `email`, `serialnumber`, `categories`, `product_name`, `date_regis`, `date_end`, `myaddress`, `status`, `note`, `timestamp`, `admin_note`, `admin_date`) VALUES
(12, 'ABP6625dd02ece3cec6', 'ธนวัฒน์', 'กุลาตี', '1102003199061', '0902525906', 's6104062630301@email.kmutnb.ac.th', 'ABP662', 'หูฟัง', 'Sony-walkman', '2019-11-17', '2020-11-17', '20/70 หมู่บ้านอิ่มอัมพร 2 ซอยวัดกำแพง ถนนจรัญฯ 13 แขวงบางเชือกหนัง เขตตลิ่งชัน กทม. 10170', 0, 'เครื่องไม่สามารถเล่นได้', '2019-11-16 17:15:58', '', '17-11-2019 12:13:53'),
(13, 'SSIN99995dd0d9e0a8c74', 'สมชาย', 'สายชล', '1111111111111', '0922222222', 'thanawatgulatijames@gmail.com', 'SSIN9999', 'โทรศัพท์', 'Samsung-note-10', '2019-11-17', '2020-11-17', 'Bangkok , Thailand', 3, 'หน้าจอแตก', '2019-11-17 05:25:52', 'แก้ไขปัญหาหน้าจอและตรวจสอบระบบภายในเพิ่มเติม', '17-11-2019 12:27:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
