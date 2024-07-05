-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: studentdb-maria.gl.umbc.edu
-- Generation Time: Apr 26, 2023 at 02:41 PM
-- Server version: 10.6.12-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rc34731`
--

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `location_id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `ratings` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `transit_access` tinyint(1) NOT NULL,
  `student_discount` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`location_id`, `location`, `ratings`, `cost`, `transit_access`, `student_discount`) VALUES
(1, 'Old Ellicott City, MD', 2, 2, 1, 0),
(2, 'Trolly Stop', 2, 3, 1, 1),
(3, 'Bo-Railroad Museum', 3, 2, 1, 0),
(4, 'Crazy Mason', 5, 3, 1, 1),
(5, 'Fort McHenry', 4, 3, 0, 1),
(6, 'Historic Ships in Baltimore', 2, 2, 0, 0),
(7, 'National Aquarium', 5, 2, 0, 1),
(8, 'Maryland Science Center', 5, 2, 0, 1),
(9, 'Sorrento', 3, 1, 1, 1),
(10, 'OCA Mocha', 4, 1, 1, 1),
(11, 'Wonderfly Arena', 5, 2, 0, 0),
(12, 'RC Hollywood Cinema', 4, 2, 1, 1),
(13, 'Miss Shirley\'s Cafe', 5, 3, 0, 0),
(14, 'Sandy Point State Park', 4, 1, 0, 0),
(15, 'Historic Annapolis', 4, 3, 0, 0),
(16, 'Chick & Ruth\'s Delly', 5, 3, 0, 0),
(17, 'Trolly Trail', 3, 1, 1, 0),
(18, 'Pottery Cove', 4, 1, 1, 0),
(19, 'Benjamin Banneker Historical Park', 4, 3, 0, 0),
(20, 'Lurman Woodland Theatre', 5, 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
