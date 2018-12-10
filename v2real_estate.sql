-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2018 at 10:06 AM
-- Server version: 5.6.41
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `v2real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE `accesslevel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'Operator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `logintype`
--

CREATE TABLE `logintype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintype`
--

INSERT INTO `logintype` (`id`, `name`) VALUES
(1, 'Facebook'),
(2, 'Twitter'),
(3, 'Email'),
(4, 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `linktype` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(2, 'Project', '', '', 'site/viewproject', 1, 0, 1, 2, 'icon-dashboard'),
(4, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `menuaccess`
--

CREATE TABLE `menuaccess` (
  `menu` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuaccess`
--

INSERT INTO `menuaccess` (`menu`, `access`) VALUES
(1, 1),
(4, 1),
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 3),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `realestate_contact`
--

CREATE TABLE `realestate_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realestate_contact`
--

INSERT INTO `realestate_contact` (`id`, `name`, `email`, `message`) VALUES
(2, 'demo', 'demo@demo.com2', 'demo123'),
(3, 'chinattn', 'chintan', 'chintan@wohlig.com'),
(4, 'chinattn', 'chintan', 'chintan@wohlig.com'),
(5, 'chinattn', 'chintan', 'chintan@wohlig.com'),
(6, 'chinattn', 'chintan', 'chintan@wohlig.com'),
(7, 'demo@demo.com', 'demo', 'demo123'),
(8, 'ch', 'chintan@wohlig.com', 'chintan'),
(9, '0', '0', '0'),
(10, 'JimmiXzSq', '', 'm8J8l6 http://www.LnAJ7K8QSpkiStk3sLL0hQP6MO2wQ8gO.com'),
(11, '0', '0', '0'),
(12, '0', '0', '0'),
(13, '0', '0', '0'),
(14, '0', '0', '0'),
(15, 'Barnypok', '', 'FXY9kx http://www.LnAJ7K8QSpkiStk3sLL0hQP6MO2wQ8gO.com'),
(16, '0', '0', '0'),
(17, '0', '0', '0'),
(18, 'Barnypok', '', 'OvyDk1 http://www.LnAJ7K8QSpkiStk3sLL0hQP6MO2wQ8gO.com'),
(19, '0', '0', '0'),
(20, '0', '0', '0'),
(21, '0', '0', '0'),
(22, '0', '0', '0'),
(23, '0', '0', '0'),
(24, '0', '0', '0'),
(25, '0', '0', '0'),
(26, '0', '0', '0'),
(27, 'GoldenTabs', '', 'NeBLe2 https://goldentabs.com/'),
(28, '0', '0', '0'),
(29, 'GoldenTabs', '', 'NszdRd https://goldentabs.com/'),
(30, '0', '0', '0'),
(31, 'GoldenTabs', '', 'PEHs69 https://goldentabs.com/'),
(32, '0', '0', '0'),
(33, 'GoldenTabs', '', '9qnVXU https://goldentabs.com/'),
(34, '0', '0', '0'),
(35, '0', '0', '0'),
(36, '0', '0', '0'),
(37, '0', '0', '0'),
(38, '0', '0', '0'),
(39, '0', '0', '0'),
(40, '0', '0', '0'),
(41, '0', '0', '0'),
(42, '0', '0', '0'),
(43, '0', '0', '0'),
(44, '0', '0', '0'),
(45, '0', '0', '0'),
(46, '0', '0', '0'),
(47, '0', '0', '0'),
(48, '0', '0', '0'),
(49, '0', '0', '0'),
(50, '0', '0', '0'),
(51, '0', '0', '0'),
(52, '0', '0', '0'),
(53, '0', '0', '0'),
(54, '0', '0', '0'),
(55, '0', '0', '0'),
(56, '0', '0', '0'),
(57, '0', '0', '0'),
(58, '0', '0', '0'),
(59, '0', '0', '0'),
(60, '0', '0', '0'),
(61, '0', '0', '0'),
(62, '0', '0', '0'),
(63, '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `realestate_detailproject`
--

CREATE TABLE `realestate_detailproject` (
  `id` int(11) NOT NULL,
  `projectimages` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `realestate_project`
--

CREATE TABLE `realestate_project` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `realestate_project`
--

INSERT INTO `realestate_project` (`id`, `order`, `status`, `name`, `desc`, `icon`) VALUES
(1, 1, 1, 'Central Warehousing', '<h5>A COMPLETE SOLUTION FOR ALL WAREHOUSING REQUIREMENTS AND SERVICES</h5>\r\n							<p>At V2 Real Estate Private Limited, we provide Total Warehouse Project Solutions i.e. warehouse advisory, land procurement, architecture, construction, sourcing of warehouse equipment, storage system &amp; lease management.\r\n							</p>\r\n							<p>Our building materials, warehouse equipment and other required systems are sourced from reputed manufacturers so as to deliver a strong and well –constructed real estate to our valued clients.\r\n							</p>\r\n							<p>We take the entire responsibility starting from identifying the right location, project completion and customized installations and thereby reduce the challenges faced by our clients in procuring the right warehouse property.</p>', 'fa-industry'),
(2, 2, 1, 'Tailor Made Office', '<p>These type of Offices are furnished from scratch by the V2 Real Estate Pvt. Ltd. as per the Layouts and Design approved by the Lessee. Companies with specific requirements opt for these type of Offices. The cost of these Offices is a bit higher than the un-furnished office rates. It takes between 90 to 120 days for the premises to be in a ready to move-in condition. </p> 							<p>The advantage in these type of offices is that one can carefully plan the layout and design of the Office as per specific requirements of the Lessee. The choice of colour combinations of the office and furniture and quality of furniture can be decided by the Lessee Company.</p> 							<p>The most important issue here is the Lock-in Period. A Lock-in Period is the time frame within which the Licensee cannot terminate the Agreement. A minimum of 60 months Lock-in has to be given. Therefore the scope of further expansion has to be considered while zeroing in on this type of Office. 							</p>', 'fa-building'),
(3, 3, 1, 'Bare Shell', '<p>V2 Real Estate Pvt. Ltd. is involved in following types of Office leasing: 							</p> 							<p><span class=\"bold\">SHELL: </span>A typical Un-Furnished office means a basic floor plate without any civil works or flooring of any nature. The client is free to design such offices from scratch and plan electrical cabling, flooring, toilet blocks, furniture and Air Handling Unit (AHU) rooms. 							</p> 							<p>  								<span class=\"bold\">  WARM SHELL:</span> Warm Shell Office space is where V2 Real Estate Pvt. Ltd. does the basic civil works of the premises such as Flooring, False Ceiling and Rest Rooms. In some cases Air Conditioning and Light Fittings are also provided. 							</p> 							<p>This is a solution that is reached when a Company can commit to a Lock-in period and needs a furnished premises. This way the Company\'s cost of furnishing is substantially reduced. 							</p>', 'fa-university'),
(4, 4, 1, 'Banking Solutions', '<p>V2 REAL ESTATE PVT. LTD is involved in serving banks to help them in their expansion plans. We provide premises for Bank Branches &amp; ATMs suitable to the needs of the banks. V2 Real Estate Pvt. Ltd. is having a specialty in identifying the best properties at a given location and caters to the needs of the banks. 							</p> 							<p>We offer the best deals to our clients and suffice their requirements. 							</p> 							<p>V2 Real Estate Pvt. Ltd. is an organized real estate provider catering to the demands of MNCs, Banks, and Embassies for quality properties on Rent/Lease. V2 Real Estate Pvt. Ltd. 								<u><b>is not a broker and it only leases out premises which are owned and occupied</b></u> 								by it.</p>', 'fa-usd');

-- --------------------------------------------------------

--
-- Table structure for table `realestate_projectimages`
--

CREATE TABLE `realestate_projectimages` (
  `id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `realestate_projectimages`
--

INSERT INTO `realestate_projectimages` (`id`, `project`, `image`) VALUES
(1, 1, 'central_warehousing_0.jpg'),
(2, 1, 'central_warehousing_1.jpg'),
(3, 1, 'central_warehousing_2.jpg'),
(4, 2, 'tailor_1.jpg'),
(10, 4, 'bank_1.jpg'),
(14, 2, 'tailor_4.jpg'),
(18, 2, 'tailor_7.jpg'),
(19, 2, 'tailor_8.jpg'),
(20, 2, 'tailor_9.jpg'),
(28, 1, 'central_warehousing_5.jpg'),
(31, 1, 'central_warehousing_8.jpg'),
(33, 1, 'central_warehousing_10.jpg'),
(35, 1, 'central_warehousing_4.jpg'),
(37, 4, 'bank_4.jpg'),
(38, 4, 'bank_5.jpg'),
(39, 4, 'bank_6.jpg'),
(43, 3, 'shell_7.jpg'),
(44, 2, 'DOSTI_Thane_1.jpg'),
(45, 2, 'DOSTI_Thane_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Enable'),
(2, 'Disable');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `socialid` varchar(255) NOT NULL,
  `logintype` int(11) NOT NULL,
  `json` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`) VALUES
(1, 'wohlig', 'a63526467438df9566c508027d9cb06b', 'wohlig@wohlig.com', 1, '0000-00-00 00:00:00', 1, NULL, '', '', 0, ''),
(4, 'pratik', '0cb2b62754dfd12b6ed0161d4b447df7', 'pratik@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, 'pratik', '1', 1, ''),
(5, 'wohlig123', 'wohlig123', 'wohlig1@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, '', '', 0, ''),
(6, 'wohlig1', 'a63526467438df9566c508027d9cb06b', 'wohlig2@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, '', '', 0, ''),
(7, 'Avinash', '7b0a80efe0d324e937bbfc7716fb15d3', 'avinash@wohlig.com', 1, '2014-10-17 06:22:29', 1, NULL, '', '', 0, ''),
(9, 'avinash', 'a208e5837519309129fa466b0c68396b', 'a@email.com', 2, '2014-12-03 11:06:19', 3, '', '', '123', 1, 'demojson'),
(13, 'aaa', 'a208e5837519309129fa466b0c68396b', 'aaa3@email.com', 3, '2014-12-04 06:55:42', 3, NULL, '', '1', 2, 'userjson');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `onuser` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `onuser`, `status`, `description`, `timestamp`) VALUES
(1, 1, 1, 'User Address Edited', '2014-05-12 06:50:21'),
(2, 1, 1, 'User Details Edited', '2014-05-12 06:51:43'),
(3, 1, 1, 'User Details Edited', '2014-05-12 06:51:53'),
(4, 4, 1, 'User Created', '2014-05-12 06:52:44'),
(5, 4, 1, 'User Address Edited', '2014-05-12 12:31:48'),
(6, 23, 2, 'User Created', '2014-10-07 06:46:55'),
(7, 24, 2, 'User Created', '2014-10-07 06:48:25'),
(8, 25, 2, 'User Created', '2014-10-07 06:49:04'),
(9, 26, 2, 'User Created', '2014-10-07 06:49:16'),
(10, 27, 2, 'User Created', '2014-10-07 06:52:18'),
(11, 28, 2, 'User Created', '2014-10-07 06:52:45'),
(12, 29, 2, 'User Created', '2014-10-07 06:53:10'),
(13, 30, 2, 'User Created', '2014-10-07 06:53:33'),
(14, 31, 2, 'User Created', '2014-10-07 06:55:03'),
(15, 32, 2, 'User Created', '2014-10-07 06:55:33'),
(16, 33, 2, 'User Created', '2014-10-07 06:59:32'),
(17, 34, 2, 'User Created', '2014-10-07 07:01:18'),
(18, 35, 2, 'User Created', '2014-10-07 07:01:50'),
(19, 34, 2, 'User Details Edited', '2014-10-07 07:04:34'),
(20, 18, 2, 'User Details Edited', '2014-10-07 07:05:11'),
(21, 18, 2, 'User Details Edited', '2014-10-07 07:05:45'),
(22, 18, 2, 'User Details Edited', '2014-10-07 07:06:03'),
(23, 7, 6, 'User Created', '2014-10-17 06:22:29'),
(24, 7, 6, 'User Details Edited', '2014-10-17 06:32:22'),
(25, 7, 6, 'User Details Edited', '2014-10-17 06:32:37'),
(26, 8, 6, 'User Created', '2014-11-15 12:05:52'),
(27, 9, 6, 'User Created', '2014-12-02 10:46:36'),
(28, 9, 6, 'User Details Edited', '2014-12-02 10:47:34'),
(29, 4, 6, 'User Details Edited', '2014-12-03 10:34:49'),
(30, 4, 6, 'User Details Edited', '2014-12-03 10:36:34'),
(31, 4, 6, 'User Details Edited', '2014-12-03 10:36:49'),
(32, 8, 6, 'User Details Edited', '2014-12-03 10:47:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslevel`
--
ALTER TABLE `accesslevel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `logintype`
--
ALTER TABLE `logintype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realestate_contact`
--
ALTER TABLE `realestate_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realestate_detailproject`
--
ALTER TABLE `realestate_detailproject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realestate_project`
--
ALTER TABLE `realestate_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realestate_projectimages`
--
ALTER TABLE `realestate_projectimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslevel`
--
ALTER TABLE `accesslevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logintype`
--
ALTER TABLE `logintype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `realestate_contact`
--
ALTER TABLE `realestate_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `realestate_detailproject`
--
ALTER TABLE `realestate_detailproject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `realestate_project`
--
ALTER TABLE `realestate_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `realestate_projectimages`
--
ALTER TABLE `realestate_projectimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
