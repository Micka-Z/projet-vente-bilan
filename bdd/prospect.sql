-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2023 at 01:44 PM
-- Server version: 10.3.27-MariaDB-0+deb10u1
-- PHP Version: 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eleves_mzimmermann_exos`
--

-- --------------------------------------------------------

--
-- Table structure for table `prospect`
--

CREATE TABLE `prospect` (
  `id` int(11) NOT NULL,
  `raison_sociale` varchar(100) DEFAULT NULL,
  `siret` varchar(14) DEFAULT NULL,
  `email_contact` varchar(100) DEFAULT NULL,
  `nom_contact` varchar(100) DEFAULT NULL,
  `date_action` date DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prospect`
--

INSERT INTO `prospect` (`id`, `raison_sociale`, `siret`, `email_contact`, `nom_contact`, `date_action`, `statut`) VALUES
(1, 'KS TOOLS', '41127601700042', 'jean.leroy@kstools.fr', 'Jean LEROY', '2023-03-12', 'à suivre'),
(2, 'FACOM', '32863064500021', 'jean.dupont@facom.fr', 'Jean Dupont', '2023-03-08', 'à qualifier'),
(3, 'SAM Outillage', '33800223100060', 'lisa.richard@sam-outillage.fr', 'Richard Lisa', '2023-04-08', 'à qualifier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prospect`
--
ALTER TABLE `prospect`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prospect`
--
ALTER TABLE `prospect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
