-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 10:16 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sno` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `vaccine` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `aadhaar` int(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sno`, `username`, `password`, `contact`, `address`, `vaccine`, `dob`, `gender`, `aadhaar`, `email`, `pan`) VALUES
(3, 'vishal', '$2y$10$iB.GljgPmMIq7jCQExCKLurJpBoGhNXCsz3k2AuVe4L9y0Coc3fQy', 2147483647, 'pune', 'second', '2017-06-07', 'male', 2147483647, 'aa@email.com', 'k0k00i0uhh');

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `sno` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `regdate` datetime NOT NULL DEFAULT current_timestamp(),
  `contact` bigint(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `area` varchar(50) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`sno`, `username`, `password`, `name`, `regdate`, `contact`, `email`, `pincode`, `area`, `landmark`, `state`, `city`) VALUES
(8, 'warje', '$2y$10$v/va7.pEQtH0laB7VymPfOrYFoOHxWZm0ZDllhspFRMlIGASgVNRy', 'Warje Sports Complex', '2022-03-10 22:59:03', 2147483647, 'sportscomplex@email.com', 411058, 'Runwal Meadows', 'Ketan Hotel', 'Maharashtra', ' Pune  '),
(9, 'mai', '$2y$10$HqokOhtmvjlF7AfIzdMgcOY/onlYDp5Pdz0v3HeC7QxM8kfhGjQXW', 'Mai Mangeshkar Hospital', '2022-03-12 16:03:41', 876567890, 'vishal.gxm@gmail.com', 411058, 'Warje', 'Hanuman Mandir', 'Maharashtra', ' Pune '),
(12, 'immunization', '$2y$10$Tj.yy25vlyZQsWcI.Y/MJ.Arl/d33n.zn3zpEpt3RbD2GaeVg6naW', 'Immunization Centre ', '2022-03-14 21:27:12', 9689931102, 'immunization@email.com', 411030, 'Lokhande Talim Rd', 'Late Kalawatibai Malwe Dispensary', 'Maharashtra', ' Pune '),
(13, 'civil', '$2y$10$uxqFpc.WjDISlrZKDsrTM.KfQ0RuN/un5yBTYz5z48G52Bz3NwZx6', 'Civil Hospital', '2022-03-18 23:03:49', 27285432, 'https://pune.gov.in/public-utility/aundh-government-hospital/', 411007, 'Vidyapeeth Rd', 'Pune University', 'Maharashtra', ' Pune '),
(15, 'prabhadevi', '$2y$10$txfJbzyqd415/4l1VrGbmuOHxgTOf4bYvW9nw8WYdQpcjML3ikQ4i', 'Prabhadevi Maternity Home', '2022-03-20 13:42:27', 24224646, 'prabhadevi@email.com', 400025, 'S.V.S Road', 'Siddhivinayak Temple', 'Maharashtra', ' Mumbai '),
(18, 'demo', '$2y$10$7yDasEv8ccpn1nxQnuBgPOP7lxfyXwj6zX2yksMabZagGj0T5T1M6', 'Demo_center', '2022-03-27 12:40:00', 9998765456, 'vishal.gxm@gmail.com', 411058, 'Warje', 'Hanuman Mandir', 'Madhya Pradesh', ' Nagod ');

-- --------------------------------------------------------

--
-- Table structure for table `center_supplier`
--

CREATE TABLE `center_supplier` (
  `sno` int(11) NOT NULL,
  `center` varchar(50) NOT NULL,
  `slots` int(11) NOT NULL,
  `Covishield` int(11) NOT NULL,
  `Pfizer International` int(11) NOT NULL,
  `Bio Med Private Limited` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center_supplier`
--

INSERT INTO `center_supplier` (`sno`, `center`, `slots`, `Covishield`, `Pfizer International`, `Bio Med Private Limited`) VALUES
(1, 'Demo_center', 20, 10, 0, 0),
(3, 'Warje Sports Complex', 672, 226, 341, 105),
(4, 'Mai Mangeshkar Hospital', 499, 199, 200, 100),
(5, 'Immunization Centre ', 200, 0, 0, 200),
(6, 'Civil Hospital', 170, 70, 0, 100),
(7, 'Prabhadevi Maternity Home', 389, -1, 0, 390);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `sno` int(11) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`sno`, `contact`, `password`) VALUES
(1, 2727272727, '$2y$10$nwyWYnsNvLuwzfAgv94DFelYEJ6YBRDUQ9gFcKxF5uxb92PrDOEZi'),
(2, 9890987654, '$2y$10$iLc7cjPGd7zbRiJmcl/FnOserayqEJgzWuFE6.QI6y4WsuLHftBQy'),
(3, 2147483647, '$2y$10$Q9QRJSfVvm/m8s6VpHnhJ.xePZdWCbTa4zRQYzuLwSPzn29iCrgpu'),
(7, 1234321232, '$2y$10$MgcBtYDRcCXgxfpl727gvuQMjuEcVww25/72V8iirgSPgpvJC8dXK'),
(9, 1111111111, '$2y$10$S4WukMtndFes/F2EX/3ou.BJGF9yLmUFwE8Qz3wgN.GseTQhS5sci'),
(10, 0, '$2y$10$t33qLPvI355O04/FBqciEeo6aopv2OfaChhQU2v1EWTd7R1k97p12');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `sno` int(11) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `aadhaar` bigint(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `pan` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `regdate` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(40) NOT NULL,
  `dose` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`sno`, `contact`, `aadhaar`, `name`, `pan`, `email`, `dob`, `gender`, `regdate`, `status`, `dose`) VALUES
(1, 2147483647, 985643279857, 'Ranjit Sule', '', 'ranjit@email.com', '2022-02-08', 'male', '2022-02-24 00:16:43', 'partial', 1),
(2, 2147483647, 771166229955, 'Prasad Kulkarni', 'K09H09U090', 'prasad@email.com', '2022-02-15', 'male', '2022-02-24 00:27:21', 'partial', 2),
(4, 2727272727, 715266373737, 'Kunal Dhanorkar', 'K10A09U909', 'kunal@email.com', '2022-03-03', 'male', '2022-02-27 12:24:39', 'complele', 2),
(19, 2727272727, 192713748591, 'Rohit Bhosale', 'HK098H788Y', 'rohit@gmail.com', '2022-03-15', 'male', '2022-03-03 00:24:12', 'complele', 2),
(21, 1234321232, 104712945798, 'Aniket Sahani', 'KJFG12H69Y', 'aniket@email.com', '2017-05-08', 'male', '2022-03-19 21:30:18', '', 0),
(22, 1111111111, 90000000056, 'demo member', 'KIXPK3056X', 'demo3@email.com', '2022-03-18', 'male', '2022-03-28 10:32:23', 'partial', 1),
(23, 9890987654, 2111111111, 'Jon Doe', 'XIP82989PH', 'jon@email.com', '2022-05-16', 'male', '2022-05-26 22:26:46', 'partial', 1),
(24, 9890987654, 9999999999, 'Trial', '', 'trial@email.com', '2022-05-20', 'female', '2022-05-27 07:39:10', '', 0),
(25, 0, 7392174212, 'Jon Doe', '', 'jon@email.com', '2022-05-02', 'female', '2022-05-27 22:19:53', 'partial', 1),
(26, 2727272727, 8787878789, 'Vishal Dinesh', 'KHI9898SGH', 'vishal.gxm@gmail.com', '2022-05-13', 'male', '2022-05-28 10:47:36', 'partial', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sno` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `website` varchar(40) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `vaccinetype` varchar(40) NOT NULL,
  `vaccine` varchar(40) NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `area` varchar(90) NOT NULL,
  `landmark` varchar(90) NOT NULL,
  `price` bigint(20) NOT NULL,
  `state` varchar(90) NOT NULL,
  `city` varchar(90) NOT NULL,
  `regdate` datetime NOT NULL DEFAULT current_timestamp(),
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sno`, `username`, `password`, `name`, `website`, `contact`, `email`, `vaccinetype`, `vaccine`, `pincode`, `area`, `landmark`, `price`, `state`, `city`, `regdate`, `quantity`) VALUES
(2, 'covishield', '$2y$10$XB5ue2xrmfWerN0vruO1H.lI.zoUNeGRN7fGOzFU9EEWxiL0TDDla', 'Covishield', 'https://www.seruminstitute.com/', 199298298, 'contact@seruminstitute.com', 'Covid', 'ChAdOx1 nCoV- 19', 0, '', '', 30, '', '', '2022-02-27 14:34:58', 486),
(8, 'pfizer', '$2y$10$rxk757OLpwZ79RHyc1kP0u8c21x.VkQRCZzhPlgEh/gXXvdyeIr36', 'Pfizer International', 'https://www.pfizermedicalinformation.in/', 9090909901, 'pfizer@email.com', 'Covid', 'pfizer-bio', 400051, 'Bandra East', 'Bandra Kurla Complex', 50, 'Maharashtra', ' Mumbai ', '2022-03-20 18:59:25', 198),
(11, 'bio-med', '$2y$10$jijw679V/wS.63yUy7GZnOTRcDlTVLJyMQlW30GzBWQM/OWslf4Uy', 'Bio Med Private Limited', 'http://www.biomed.co.in/rabies-vaccine/', 8048250474, 'saryugarg@yahoo.com', 'polio', 'Bivalent/b-OPV', 201009, 'Bulandshahr Road', 'Industrial Area', 10, 'Uttar Pradesh', ' Ghaziabad ', '2022-03-20 19:29:16', 740),
(16, 'demo', '$2y$10$Q4YLoN0xZO2pdyusnjl9r.kbmpdxZEx03rwgh288HJeyGQ2DILRzq', 'Demo', 'https://www.demo.com', 2234321111, 'demo@gmail.com', 'demo_type', 'demo_vcaccine', 232332, 'demo_area', 'demo_landmark', 10, 'Karnataka', ' K.R. Nagar ', '2022-03-27 13:04:44', 9988);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `sno` int(11) NOT NULL,
  `from_` varchar(50) NOT NULL,
  `to_` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `tstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`sno`, `from_`, `to_`, `price`, `quantity`, `type`, `tstamp`) VALUES
(21, 'Demo', 'Demo', 100, 10, 'Credit', '2022-03-27 13:41:50'),
(22, 'Demo', 'Covishield', 300, 10, 'Debit', '2022-03-27 13:50:15'),
(23, 'Demo', 'Demo', 10, 1, 'Debit', '2022-03-27 13:57:23'),
(24, 'Demo', 'Demo', 10, 1, 'Credit', '2022-03-27 14:00:47'),
(25, 'Kunal Dhanorkar', 'Demo_center', 0, 1, 'Credit', '2022-03-27 18:33:21'),
(26, 'Rohit Bhosale', 'Demo_center', 10, 1, 'Debit', '2022-03-27 18:36:35'),
(27, 'Warje Sports Complex', 'Pfizer International', 500, 10, 'Debit', '2022-03-27 19:55:40'),
(28, 'demo member', 'Warje Sports Complex', 50, 1, 'Credit', '2022-03-28 10:34:47'),
(29, 'Warje Sports Complex', 'Pfizer International', 1500, 30, 'Debit', '2022-03-28 10:35:46'),
(30, 'Civil Hospital', 'Covishield', 600, 20, 'Credit', '2022-05-26 14:21:28'),
(31, 'Civil Hospital', 'Covishield', 300, 10, 'Debit', '2022-05-26 14:25:31'),
(32, 'Civil Hospital', 'Covishield', 300, 10, 'Debit', '2022-05-26 14:38:38'),
(33, 'Civil Hospital', 'Covishield', 300, 10, 'Credit', '2022-05-26 15:31:03'),
(34, 'Civil Hospital', 'Covishield', 300, 10, 'Credit', '2022-05-26 15:32:16'),
(35, 'Civil Hospital', 'Covishield', 300, 10, 'Credit', '2022-05-26 15:34:26'),
(36, 'Warje Sports Complex', 'Demo', 100, 10, 'Debit', '2022-05-26 22:13:48'),
(37, 'Warje Sports Complex', 'Covishield', 30, 1, 'Debit', '2022-05-26 22:14:23'),
(38, 'Warje Sports Complex', 'Covishield', 30, 1, 'Debit', '2022-05-26 22:14:44'),
(39, 'Warje Sports Complex', 'Covishield', 30, 1, 'Debit', '2022-05-26 22:15:28'),
(40, 'Warje Sports Complex', 'Covishield', 30, 1, 'Debit', '2022-05-26 22:15:59'),
(41, 'Warje Sports Complex', 'Pfizer International', 50, 1, 'Credit', '2022-05-26 22:18:04'),
(42, 'Warje Sports Complex', 'Pfizer International', 50, 1, 'Credit', '2022-05-26 22:22:26'),
(43, 'Jon Doe', 'Warje Sports Complex', 30, 1, 'Credit', '2022-05-26 22:31:44'),
(44, 'Jon Doe', 'Warje Sports Complex', 30, 1, 'Credit', '2022-05-26 22:32:05'),
(45, 'Jon Doe', 'Warje Sports Complex', 30, 1, 'Credit', '2022-05-26 22:33:46'),
(46, 'Jon Doe', 'Warje Sports Complex', 30, 1, 'Credit', '2022-05-26 22:34:23'),
(47, 'Jon Doe', 'Warje Sports Complex', 30, 1, 'Credit', '2022-05-26 22:34:42'),
(48, 'Jon Doe', 'Warje Sports Complex', 30, 1, 'Credit', '2022-05-26 22:35:11'),
(49, 'Warje Sports Complex', 'Bio Med Private Limited', 50, 5, 'Debit', '2022-05-26 23:55:25'),
(50, 'Jon Doe', 'Prabhadevi Maternity Home', 30, 1, 'Debit', '2022-05-27 07:40:04'),
(51, 'Warje Sports Complex', 'Bio Med Private Limited', 100, 10, 'Credit', '2022-05-27 07:41:25'),
(52, 'Jon Doe', 'Warje Sports Complex', 30, 1, 'Credit', '2022-05-27 22:24:55'),
(53, 'Jon Doe', 'Warje Sports Complex', 30, 1, 'Debit', '2022-05-27 22:28:00'),
(54, 'Warje Sports Complex', 'Covishield', 600, 20, 'Credit', '2022-05-28 10:44:54'),
(55, 'Vishal Dinesh', 'Mai Mangeshkar Hospital', 30, 1, 'Debit', '2022-05-28 10:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `vaccinator`
--

CREATE TABLE `vaccinator` (
  `sno` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `vaccine` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `aadhaar` int(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `center` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccinator`
--

INSERT INTO `vaccinator` (`sno`, `username`, `name`, `contact`, `address`, `vaccine`, `dob`, `gender`, `aadhaar`, `email`, `center`) VALUES
(5, 'akass', 'Akshay Pillai', 2147483647, 'pune', 'first', '2022-02-10', 'male', 2147483647, 'admin@email.com', 'Warje Sports Complex'),
(6, 'kunal', 'Kunal Dhanorkar', 2147483647, 'yavatmal', 'second', '2017-06-21', 'male', 2147483647, 'kunal@email.com', 'Mai Mangeshkar Hospital');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `username_3` (`username`);

--
-- Indexes for table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `center_supplier`
--
ALTER TABLE `center_supplier`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `vaccinator`
--
ALTER TABLE `vaccinator`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `center`
--
ALTER TABLE `center`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `center_supplier`
--
ALTER TABLE `center_supplier`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `vaccinator`
--
ALTER TABLE `vaccinator`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
