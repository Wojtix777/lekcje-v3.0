-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2026 at 03:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `steamworks`
--

-- --------------------------------------------------------

--
-- Table structure for table `gatunki`
--

CREATE TABLE `gatunki` (
  `id_gatunku` int(11) NOT NULL,
  `nazwa_gatunku` varchar(32) NOT NULL,
  `opis_gatunku` varchar(64) NOT NULL,
  `preferowana_publiczność` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gatunki`
--

INSERT INTO `gatunki` (`id_gatunku`, `nazwa_gatunku`, `opis_gatunku`, `preferowana_publiczność`) VALUES
(1, 'Horror', 'Gatunek miejący na celu przestraszyć gracza', 'Dorośli'),
(2, 'Shooter', 'Gatunek polegający na rozstrzelaniu wszystkich wrogów', 'Dorośli i nastolatkowie'),
(3, 'Factory', 'Gatunek polegający na budowaniu fabryk', 'Wszyscy');

-- --------------------------------------------------------

--
-- Table structure for table `gry`
--

CREATE TABLE `gry` (
  `id_gry` int(11) NOT NULL,
  `nazwa` varchar(32) NOT NULL,
  `id_producenta` int(11) NOT NULL,
  `id_wydawcy` int(11) NOT NULL,
  `data_wydania` date NOT NULL,
  `cena` float NOT NULL,
  `gatunek_gry` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `producenci`
--

CREATE TABLE `producenci` (
  `id_producenta` int(11) NOT NULL,
  `nazwa` varchar(32) NOT NULL,
  `typ_producenta` varchar(32) NOT NULL,
  `opis_producenta` varchar(64) NOT NULL,
  `opinia_publiczna` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producenci`
--

INSERT INTO `producenci` (`id_producenta`, `nazwa`, `typ_producenta`, `opis_producenta`, `opinia_publiczna`) VALUES
(1, 'Valve', 'AAA', 'Relatywnie małe studio AAA znane z długich przerw między grami', '10'),
(2, 'Team Cherry', 'Indie', 'Studio złożone z trzech osób tworzących gry', '10');

-- --------------------------------------------------------

--
-- Table structure for table `przeceny`
--

CREATE TABLE `przeceny` (
  `id_przeceny` int(11) NOT NULL,
  `nazwa` varchar(32) NOT NULL,
  `id_gry` int(11) NOT NULL,
  `przecena` int(11) NOT NULL,
  `data_rozp` date NOT NULL,
  `data_konca` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wydawcy`
--

CREATE TABLE `wydawcy` (
  `id_wydawcy` int(11) NOT NULL,
  `nazwa` varchar(32) NOT NULL,
  `opis_wydawcy` varchar(64) DEFAULT NULL,
  `opinia_publiczna` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wydawcy`
--

INSERT INTO `wydawcy` (`id_wydawcy`, `nazwa`, `opis_wydawcy`, `opinia_publiczna`) VALUES
(1, 'New Blood Interactive', 'Studio bazowane na grach PvE', '9'),
(2, 'Activision Studios', 'Studio AAA którego nikt nie lubi', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gatunki`
--
ALTER TABLE `gatunki`
  ADD PRIMARY KEY (`id_gatunku`);

--
-- Indexes for table `gry`
--
ALTER TABLE `gry`
  ADD PRIMARY KEY (`id_gry`),
  ADD UNIQUE KEY `nazwa` (`nazwa`),
  ADD KEY `id_producenta` (`id_producenta`),
  ADD KEY `id_wydawcy` (`id_wydawcy`),
  ADD KEY `gatunek_gry` (`gatunek_gry`);

--
-- Indexes for table `producenci`
--
ALTER TABLE `producenci`
  ADD PRIMARY KEY (`id_producenta`),
  ADD UNIQUE KEY `nazwa` (`nazwa`);

--
-- Indexes for table `przeceny`
--
ALTER TABLE `przeceny`
  ADD PRIMARY KEY (`id_przeceny`),
  ADD UNIQUE KEY `nazwa` (`nazwa`),
  ADD KEY `id_gry` (`id_gry`);

--
-- Indexes for table `wydawcy`
--
ALTER TABLE `wydawcy`
  ADD PRIMARY KEY (`id_wydawcy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gatunki`
--
ALTER TABLE `gatunki`
  MODIFY `id_gatunku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gry`
--
ALTER TABLE `gry`
  MODIFY `id_gry` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producenci`
--
ALTER TABLE `producenci`
  MODIFY `id_producenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `przeceny`
--
ALTER TABLE `przeceny`
  MODIFY `id_przeceny` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wydawcy`
--
ALTER TABLE `wydawcy`
  MODIFY `id_wydawcy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gry`
--
ALTER TABLE `gry`
  ADD CONSTRAINT `gry_ibfk_1` FOREIGN KEY (`id_producenta`) REFERENCES `producenci` (`id_producenta`),
  ADD CONSTRAINT `gry_ibfk_2` FOREIGN KEY (`id_wydawcy`) REFERENCES `wydawcy` (`id_wydawcy`),
  ADD CONSTRAINT `gry_ibfk_3` FOREIGN KEY (`gatunek_gry`) REFERENCES `gatunki` (`id_gatunku`);

--
-- Constraints for table `przeceny`
--
ALTER TABLE `przeceny`
  ADD CONSTRAINT `przeceny_ibfk_1` FOREIGN KEY (`id_gry`) REFERENCES `gry` (`id_gry`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
