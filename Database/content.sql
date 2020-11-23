-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 10:08 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

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
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `Grade` int(2) NOT NULL,
  `Subject` varchar(20) NOT NULL,
  `Topic_no` int(11) NOT NULL,
  `Topic` varchar(100) NOT NULL,
  `Further_Reading` varchar(800) NOT NULL,
  `Presentation` varchar(1000) NOT NULL,
  `Areas` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`Grade`, `Subject`, `Topic_no`, `Topic`, `Further_Reading`, `Presentation`, `Areas`) VALUES
(6, 'science', 1, 'Animal Cell', 'https://biologydictionary.net/animal-cell/\r\nhttps://byjus.com/biology/animal-cell/\r\nhttps://micro.magnet.fsu.edu/cells/animalcell.html\r\nhttps://microbenotes.com/animal-cell-definition-structure-parts-functions-and-diagram/\r\nhttps://www.enchantedlearning.com/subjects/animals/cell/index.shtml', '\"https://docs.google.com/presentation/d/e/2PACX-1vRBec-dJrExWsdRpbPjtlqodwSIeIK8zGyFPgGcTttjeM06o7mCoslTcAFW7poS_U8VNq2LjiCKX9x_/embed?start=false&loop=false&delayms=3000\" frameborder=\"0\" width=\"100%\" height=\"600\" allowfullscreen=\"true\" mozallowfullscreen=\"true\" webkitallowfullscreen=\"true\"', 'Definition of animal cell\r\nAnimal cell size and shape\r\nAnimal cell structure\r\nFigure: Diagram of Animal Cell, created with biorender.com\r\nAnimal cell organelles\r\nPlasma membrane (Cell membrane) – Definition, Structure, and Functions with Diagram\r\nDefinition of Plasma membrane (Cell membrane)\r\nFigure: Diagram of Plasma membrane (Cell membrane), created with biorender.com\r\nStructure of Plasma membrane (Cell membrane)\r\nFunctions of Plasma membrane (Cell membrane)\r\nNucleus – Definition, Structure, and Functions with Diagram\r\nDefinition of Nucleus\r\nFigure: Diagram of Nucleus, created with biorender.com\r\nStructure of Nucleus\r\nFunctions of Nucleus'),
(6, 'science', 2, 'Plant Cell', 'https://biologydictionary.net/plant-cell/\r\nhttp://www.plantcell.org/\r\nhttps://byjus.com/biology/plant-cell/\r\nhttps://www.britannica.com/science/plant-cellhttps://biologydictionary.net/plant-cell/\r\nhttp://www.plantcell.org/\r\nhttps://en.wikipedia.org/wiki/Plant_cell\r\nhttps://byjus.com/biology/plant-cell/\r\nhttps://microbenotes.com/plant-cell/\r\n', '\"https://docs.google.com/presentation/d/e/2PACX-1vRTDE_qOeM-hWckFLQ8r_KF3FPjXJUqYrO0eNLhAYmBltyGDyjFTM0LiUb1PZFTl4ZBakUL9bMxEyMh/embed?start=false&loop=false&delayms=3000\" frameborder=\"0\" width=\"100%\" height=\"600\" allowfullscreen=\"true\" mozallowfullscreen=\"true\" webkitallowfullscreen=\"true\"', 'Structure of Plant cell\r\nFigure: Labeled diagram of plant cell, created with biorender.com\r\nPlant cell organelles\r\nPlant Cell Wall\r\nFigure: Diagram of Plant cell wall. Source: Wikipedia\r\nDefinition of plant cell wall\r\nStructure of plant cell wall\r\nThe function of the plant cell wall\r\nPlant cytoskeleton\r\nDefinition of the plant cytoskeleton\r\nStructure of the plant cytoskeleton\r\nFunctions of the plant cytoskeleton\r\nMicrofilaments\r\nIntermediate Filaments\r\nMicrotubules');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`Topic_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
