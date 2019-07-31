-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2019 at 10:21 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypain`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `cell` varchar(50) NOT NULL,
  `dateAndTime` varchar(50) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`cell`, `dateAndTime`, `reason`, `id`) VALUES
('0792883338', 'Wednesday 31st July 2019 12:30', 'Pap smear (Selected Clinics)', 1),
('0792883338', 'Thursday 1st August 2019 15:30', 'Pregnancy and mother wellness', 4),
('0792883338', 'Wednesday 31st July 2019 15:00', 'Specimen collection for laboratory tests', 444),
('0846895523', 'Wednesday 7th August 2019 12:00', 'Basic health screening (BP, BMI, lifestyle report)', 445),
('0846895523', 'Saturday 10th August 2019 13:30', 'Adult vaccination or injections (comprehensive)', 446),
('0792887410', 'Wednesday 14th August 2019 15:30', 'Weight loss management', 447),
('0792887410', 'Saturday 10th August 2019 14:00', 'Glucose or Cholesterol screening test', 448);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `cell` int(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`fname`, `lname`, `cell`, `password`) VALUES
('Phatu', 'Makushu', 792883338, 'PHAmak752=[;'),
('Alice', 'Brown', 792887410, 'ALIbro123,./'),
('Carol', 'Darwin', 846895523, 'CARdar973;.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`cell`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=449;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
