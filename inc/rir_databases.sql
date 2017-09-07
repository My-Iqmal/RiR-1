-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2017 at 06:50 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rir_databases`
--

-- --------------------------------------------------------

--
-- Table structure for table `rir_user`
--

CREATE TABLE `rir_user` (
  `User_IC_Number` varchar(14) COLLATE latin1_general_ci NOT NULL,
  `User_Fullname` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `User_Name` text COLLATE latin1_general_ci NOT NULL,
  `User_Password` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `User_Birthdate` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `User_Email` varchar(200) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `rir_user`
--

INSERT INTO `rir_user` (`User_IC_Number`, `User_Fullname`, `User_Name`, `User_Password`, `User_Birthdate`, `User_Email`) VALUES
('970118-43-5323', 'Muhammad Amir Iqmal Bin Ahmad Sukri', 'MyIqmal', 'd9c0d764648f2004964e11b5d58058a0', '18/01/1997', 'mypainzs@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rir_user`
--
ALTER TABLE `rir_user`
  ADD PRIMARY KEY (`User_IC_Number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
