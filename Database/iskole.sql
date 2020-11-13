-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2020 at 02:14 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iskole`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `username`, `email`, `status`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 0, 'f865b53623b121fd34ee5426c792e5c33af8c227');

-- --------------------------------------------------------

--
-- Table structure for table `content_manager`
--

CREATE TABLE `content_manager` (
  `cm_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_manager`
--

INSERT INTO `content_manager` (`cm_id`, `username`, `email`, `status`, `password`) VALUES
(1, 'content-manager', 'content-manager@gmail.com', 1, '71d60c2ae2e120e7e3b2060c29abde8a14bb2c2f');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `last_name`, `email`, `password`, `status`) VALUES
(1, 'Hashan', 'Kumarasinghe', 'hashankumarasinghe@gmail.com', 'f2ee2988d136dd484ad7e1c1b324e95ae67e1a59', 1),
(2, 'Shehan', 'Sandeepa', 'shehansandeepa@gmail.com', '7bbc9e44483565cf5c9aae9766bf98d6ff56af58', 1),
(16, 'Darshana', 'Bandara', 'Darshana@gmail.com', '6cfd0a90a2aef938ccbd64f4a3ce5cfcc22b2572', 1),
(17, 'Thusitha', 'Karunathilake', 'thusitha@gmail.com', 'f990180446dfcd9de1c2a7de18cb059276c7202d', 0),
(18, 'Adithya', 'Bandara', 'adithya@gmail.com', '955b021ac257587adcc39e2b91fb05337841371e', 1),
(19, 'Amaya', 'Kinivita', 'amaya@gmail.com', 'ca771caf60ab211d827f17a043e13668c225f5b6', 0),
(20, 'Shyamali', 'Pathirana', 'shyamali@gmail.com', '8ab65f5118e7b5e25f7396e8384000f8c0b26f36', 1),
(21, 'Nirushi', 'Pabasara', 'nirushi@gmail.com', 'c2a56b65b09f859ac15e0fbc595207cb4f74d36e', 1),
(22, 'Bhagya', 'Gunathilake', 'bhagya@gmail.com', 'c4fb139a80b0e554edabba1222e596cee2889e48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `first_name`, `last_name`, `email`, `password`, `status`) VALUES
(2, 'Mahen', 'Jecob', 'mahen@gmail.com', '34b6b2ecaa331d171a7a8b1b034c8b58db88b996', 1),
(3, 'Anil', 'Senadira', 'anil@gmail.com', 'a9b2318658f46376b511b0f6262fa38be184c880', 0),
(4, 'Keerthi', 'Dharmasiri', 'keerthi@gmail.com', '86023c3e1097461fd460a64aba6115b2a3ec1035', 1),
(6, 'chandana', 'jaasinghe', 'chandana@gmail.com', 'ecff3deb1db198fa450173a79bc961332b667dc6', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `content_manager`
--
ALTER TABLE `content_manager`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `content_manager`
--
ALTER TABLE `content_manager`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
