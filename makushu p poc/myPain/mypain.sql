-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2021 at 11:29 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `diagnosis` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`cell`, `dateAndTime`, `reason`, `id`, `name`, `diagnosis`) VALUES
('792883338', 'Friday 4th June 2021 10:30', 'Baby Immunisation consultation', 459, 'Phatu Makushu', 'blood pressure : 120/80 mmHg'),
('792887410', 'Saturday 5th June 2021 10:30', 'HIV Screening Test', 578, 'Alice Brown', 'Results : negative'),
('792883338', 'Sunday 6th June 2021 14:30', 'Basic health screening (BP, BMI, lifestyle report)', 579, 'Phatu Makushu', 'weight : 70kg'),
('0698754128', 'Tuesday 8th June 2021 15:00', 'Comprehensive Health Assessment', 580, 'Chumani Donga', 'temperature : 35'),
('0698754128', 'Saturday 12th June 2021 11:30', 'Pap smear (Selected Clinics)', 581, 'Chumani Donga', 'blood pressure : 120/80 mmHg'),
('792887410', 'Monday 14th June 2021 09:30', 'Family Planning Service', 582, 'Alice Brown', 'blood pressure : 120/80 mmHg'),
('792883338', 'Friday 18th June 2021 10:30', 'Basic health screening (BP, BMI, lifestyle report)', 584, 'Phatu Makushu', ''),
('792887410', 'Sunday 20th June 2021 09:00', 'Pregnancy test', 585, 'Alice Brown', ''),
('0695845222', 'Sunday 20th June 2021 13:30', 'Basic health screening (BP, BMI, lifestyle report)', 588, 'Lock Down', ''),
('0688541235', 'Monday 21st June 2021 11:00', 'Basic health screening (BP, BMI, lifestyle report)', 590, 'Lufuno Madi', ''),
('0841239654', 'Wednesday 23rd June 2021 15:30', 'Basic health screening (BP, BMI, lifestyle report)', 591, 'Wednesday Morning', 'temperature : 36');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `number` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`number`, `password`) VALUES
(1, '1');

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
('Tuesday', 'Noon', 632587410, 'DGHD3646fS/.'),
('Lock', 'Down', 695845222, 'DFJDHJRdfhfh4543643/..'),
('Chumani', 'Donga', 698754128, 'JHDHGdghreh56544/,.,'),
('June', 'Month', 718529630, 'dgDFHGF3445./.'),
('Phatu', 'Makushu', 792883338, 'PHAmak752=[;'),
('Alice', 'Brown', 792887410, 'ALIbro123,./'),
('Wednesday', 'Morning', 841239654, '2334gjdjDJGJDF,/./.'),
('Carol', 'Darwin', 846895523, 'CARdar973;.'),
('twenty', 'twentyone', 868754574, '4534bgjhfhFHJDGHD,./');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=593;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
