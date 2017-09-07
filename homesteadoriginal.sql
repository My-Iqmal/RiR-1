-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2017 at 01:52 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homesteadoriginal`
--

-- --------------------------------------------------------

--
-- Table structure for table `rir_expenses`
--

CREATE TABLE `rir_expenses` (
  `id` int(255) UNSIGNED NOT NULL,
  `Day` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Item` varchar(255) NOT NULL,
  `Quantity` int(255) DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `user_id` int(255) UNSIGNED NOT NULL,
  `Transaction_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rir_expenses`
--

INSERT INTO `rir_expenses` (`id`, `Day`, `Category`, `Item`, `Quantity`, `Price`, `user_id`, `Transaction_Date`) VALUES
(22, 'Wednesday, 2017/09/06 15:41', 'Alat Tulis', 'pen', 1, '2.00', 3, '2017-09-06 15:41:41'),
(23, 'Friday, 2017/09/08 15:41', 'Sedekah', 'jariah', 1, '50.00', 3, '2017-09-06 15:46:52'),
(24, 'Friday, 2017/08/25 15:48', 'Petrol', 'bas', 1, '50.00', 3, '2017-09-06 15:48:56'),
(25, 'Thursday, 2017/09/14 16:25', 'Petrol', 'bas', 2, '512.00', 3, '2017-09-06 16:25:32'),
(26, 'Monday, 2017/06/05 15:00', 'Simkad dan Telefon', 'nokia', 1, '124.00', 3, '2017-09-06 16:27:53'),
(27, 'Saturday, 2017/09/09', 'Yuran', 'sekolah', 1, '100.00', 3, '2017-09-06 16:29:24'),
(28, 'Friday, 2017/09/08 00:00', 'Alat Tulis', 'pensil', 1, '12.00', 3, '2017-09-06 16:30:17'),
(29, 'Thursday, 2017/09/07', 'Buku Rujukan', 'Buku geografi s', 1, '1.00', 3, '2017-09-06 16:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `rir_user`
--

CREATE TABLE `rir_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `User_IC_Number` varchar(14) NOT NULL,
  `User_Fullname` varchar(255) NOT NULL,
  `User_Name` varchar(64) NOT NULL,
  `User_Password` varchar(200) DEFAULT NULL,
  `User_Birthdate` varchar(10) DEFAULT NULL,
  `User_Email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rir_user`
--

INSERT INTO `rir_user` (`id`, `User_IC_Number`, `User_Fullname`, `User_Name`, `User_Password`, `User_Birthdate`, `User_Email`) VALUES
(1, '970118-43-5323', 'Muhammad Amir Iqmal Bin Ahmad Sukri', 'MyIqmal', '5f4dcc3b5aa765d61d8327deb882cf99', '18/01/1997', 'mypainzs@gmail.com'),
(2, '800828-02-5351', 'Khairil Anuar', 'khairil', '76a2173be6393254e72ffa4d6df1030a', '', 'khairil@gmail.com'),
(3, '12345', 'Alex Locus', 'Alexile', '5a105e8b9d40e1329780d62ea2265d8a', '2009-07-15', 'alex_locus@gmail.com'),
(4, '', 'Alex Locus', 'Alexile', 'd41d8cd98f00b204e9800998ecf8427e', '2009-07-15', 'alex_locus@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rir_expenses`
--
ALTER TABLE `rir_expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rir_expenses_fk1` (`user_id`) USING BTREE;

--
-- Indexes for table `rir_user`
--
ALTER TABLE `rir_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rir_expenses`
--
ALTER TABLE `rir_expenses`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `rir_user`
--
ALTER TABLE `rir_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rir_expenses`
--
ALTER TABLE `rir_expenses`
  ADD CONSTRAINT `rir_expenses_fk1` FOREIGN KEY (`user_id`) REFERENCES `rir_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
