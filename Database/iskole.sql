-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2020 at 07:42 AM
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
-- Table structure for table `content_manager`
--

CREATE TABLE `content_manager` (
  `cm_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `ad_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`ad_id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227');

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
(3, 'Shehan', 'Sandeepa', 'shehansandeepa@gmail.com', '7bbc9e44483565cf5c9aae9766bf98d6ff56af58', 1),
(4, 'Shehan', 'Sandeepa', 'shehansandeepa@gmail.com', '7bbc9e44483565cf5c9aae9766bf98d6ff56af58', 1),
(5, 'Shehan', 'Sandeepa', '123@gmail.com', '70179e3e71ef39797eb8be08ab4d220b741c0ad6', 1),
(6, 'Shehan', 'Sandeepa', '123@gmail.com', '70179e3e71ef39797eb8be08ab4d220b741c0ad6', 1),
(7, 'Thusitha', 'Karunathilaka', 'thusiya@gmail.com', 'f990180446dfcd9de1c2a7de18cb059276c7202d', 1),
(8, 'aaa', 'aaa', 'aaa', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 1),
(9, 'Hashan', 'Kumarasinghe', 'hashankumarasinghe@gmail.com', '8578173555a47d4ea49e697badfda270dee0858f', 1),
(10, 'Nethmi', 'Dilshani', 'nethmi@gmail.com', 'c46267fc232054efaa1d03bb7aa39499ea8e715f', 1),
(11, 'tt', 'se', 'seg', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1),
(12, 'tt', 'se', 'seg', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1);

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
(1, 'asd', 'asd', 'asd', 'f10e2821bbbea527ea02200352313bc059445190', 1),
(2, 'Mahen', 'Jecob', 'mahen@gmail.com', '34b6b2ecaa331d171a7a8b1b034c8b58db88b996', 1),
(3, 'Anil', 'Senadira', 'anil@gmail.com', 'a9b2318658f46376b511b0f6262fa38be184c880', 1),
(4, 'Keerthi', 'Dharmasiri', 'keerthi@gmail.com', '86023c3e1097461fd460a64aba6115b2a3ec1035', 1),
(5, 'adithya', 'bandara', 'adithya@gmail.com', '955b021ac257587adcc39e2b91fb05337841371e', 1),
(6, 'chandana', 'jaasinghe', 'chandana@gmail.com', 'ecff3deb1db198fa450173a79bc961332b667dc6', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content_manager`
--
ALTER TABLE `content_manager`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`ad_id`);

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
-- AUTO_INCREMENT for table `content_manager`
--
ALTER TABLE `content_manager`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `moderator`
--
ALTER TABLE `moderator`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
