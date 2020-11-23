-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 07:46 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `que` text NOT NULL,
  `option 1` varchar(222) NOT NULL,
  `option 2` varchar(222) NOT NULL,
  `option 3` varchar(222) NOT NULL,
  `option 4` varchar(222) NOT NULL,
  `ans` varchar(222) NOT NULL,
  `userans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `que`, `option 1`, `option 2`, `option 3`, `option 4`, `ans`, `userans`) VALUES
(1, 'break down (digest) worn out cell parts, mostly in animal cells', 'cytoplasm', 'lysosomes', 'mitochondria', 'vacuoles', 'lysosomes', 'mitochondria'),
(2, 'What is the function of the vacuole?', 'Sac that stores water, nutrients, and waste products', 'Sac filled with digestive chemicals', 'Jelly-like substance within the plasma membrane', 'Stack of membranes that packages chemicals', 'Sac that stores water, nutrients, and waste products', 'Sac filled with digestive chemicals'),
(3, 'The two kinds of cells are Prokaryotes and Eukaryotes. How are they different?', 'Prokaryotes have a nucleus.', 'Eukaryotes have a nucleus.', 'Prokaryotes are plant cells.', 'There is no difference.', 'Eukaryotes have a nucleus.', 'Prokaryotes are plant cells.'),
(4, 'Amino acids link together to form proteins. In which organelle would this process occur?', 'Lysosome', 'Ribosome', 'Centriole', 'Mitochondria', 'Ribosome', 'Lysosome'),
(5, 'I make proteins for the cell. What am I?', 'ribosome', 'mitochondria', 'chloroplast', 'lysosome', 'ribosome', 'chloroplast');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
