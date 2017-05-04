-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2017 at 07:42 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `meal`
--

-- --------------------------------------------------------

--
-- Table structure for table `bazar`
--

CREATE TABLE IF NOT EXISTS `bazar` (
`ID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bazartk` double NOT NULL,
  `meal` double NOT NULL,
  `date` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `bazar`
--

INSERT INTO `bazar` (`ID`, `name`, `bazartk`, `meal`, `date`, `user_id`) VALUES
(6, 'alamin', 0, 8, '2017-03-31', 3),
(7, 'mahfuz', 0, 28, '2017-03-31', 3),
(8, 'asad', 1410, 20, '2017-03-31', 3),
(9, 'shuvo', 0, 6, '2017-03-31', 3),
(10, 'mohon', 1925, 34, '2017-03-31', 3),
(11, 'ronzu', 1195, 59, '2017-03-31', 3),
(12, 'muzammel', 1945, 42, '2017-03-31', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_finalcalculation`
--

CREATE TABLE IF NOT EXISTS `tmp_finalcalculation` (
  `name` varchar(255) NOT NULL,
  `bazartk` float DEFAULT NULL,
  `eaten_tk` float DEFAULT NULL,
  `will_give` float DEFAULT NULL,
  `will_get` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tmp_finalcalculation`
--

INSERT INTO `tmp_finalcalculation` (`name`, `bazartk`, `eaten_tk`, `will_give`, `will_get`) VALUES
('alamin', 0, 262.944, -262.944, NULL),
('mahfuz', 0, 920.305, -920.305, NULL),
('asad', 1410, 657.36, NULL, 752.64),
('shuvo', 0, 197.208, -197.208, NULL),
('mohon', 1925, 1117.51, NULL, 807.487),
('ronzu', 1195, 1939.21, -744.213, NULL),
('muzammel', 1945, 1380.46, NULL, 564.543);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`ID` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `designation` varchar(80) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(2) NOT NULL,
  `user_status` varchar(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `fullName`, `userName`, `email`, `phone`, `address`, `designation`, `password`, `role`, `user_status`) VALUES
(1, 'Muzammel Haque', 'muzammel', 'muzammel@mail.com', '123', NULL, NULL, 'c4ca4238a0b923820dcc509a6f75849b', '1', '1'),
(2, 'Ronzu', 'ronzu', 'ronzu@mail.com', '4446566644', 'Dhaka', 'Teacher', 'c4ca4238a0b923820dcc509a6f75849b', '2', '1'),
(3, 'Mahamudul Nobi Mohon', 'mohon', 'mn.mohon@gmail.com', '9999', 'Dhaka', 'Admin', 'c4ca4238a0b923820dcc509a6f75849b', '2', '1'),
(4, 'Hakimul Islam', 'shuvo', 'shuvo@mail.com', '6663', 'Dhaka', 'Admin', 'c4ca4238a0b923820dcc509a6f75849b', '2', '1'),
(5, 'Asad', 'asad', 'asad@mail.com', '666993', 'Dhaka', 'Admin', 'c4ca4238a0b923820dcc509a6f75849b', '2', '1'),
(6, 'Mahfuzur Rahman', 'mahfuz', 'mahfuz@mail.com', '665463', 'Dhaka', 'Admin', 'c4ca4238a0b923820dcc509a6f75849b', '2', '1'),
(7, 'Alamin', 'alamin', 'alamin@mail.com', '666433', 'Dhaka', 'Admin', 'c4ca4238a0b923820dcc509a6f75849b', '2', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bazar`
--
ALTER TABLE `bazar`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `email_2` (`email`), ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bazar`
--
ALTER TABLE `bazar`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
