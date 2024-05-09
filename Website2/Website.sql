-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2024 at 02:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Website`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cars`
--

CREATE TABLE `Cars` (
  `CarID` int(10) NOT NULL,
  `Name` varchar(1000) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Cars`
--

INSERT INTO `Cars` (`CarID`, `Name`, `Description`, `pic`) VALUES
(1, 'Toyota Supra', 'The Toyota Supra (Japanese: トヨタ・スープラ, Hepburn: Toyota Sūpura) is a sports car and grand tourer manufactured by the Toyota Motor Corporation beginning in 1978. The name ', '/Website2/Assets/Images/sssup.jpeg'),
(2, 'Nissan Skyline GT-R', 'The Nissan Skyline GT-R (Japanese: 日産・スカイラインGT-R, Hepburn: Nissan Sukairain GT-R) is a Japanese sports car based on the Nissan Skyline range. The first cars named \"Skyline GT-R\" were produced between 1969 and 1972 under the model code KPGC10, and were successful in Japanese touring car racing events. This model was followed by a brief production run of second-generation cars, under model code KPGC110, in 1973.', '/Website2/Assets/Images/Speedhunters_R34roller-3.jpg'),
(3, 'Nissan Silvia S15', 'The Nissan Silvia (Japanese: 日産・シルビア, Hepburn: Nissan Shirubia) is the series of small sports cars produced by Nissan. Versions of the Silvia have been marketed as the 200SX or 240SX for export, with some export versions being sold under the Datsun brand. The S15 Silvia included aggressive styling inside and out, updating the previous Silvia styling in-line with modern car design trends. The body dimensions were reduced from the previous generation so that it would comply with Japanese Government compact class, which had an effect on sales of the previous model.', '/Website2/Assets/Images/silvia.jpeg'),
(4, 'Toyota Chaser', 'The Toyota Chaser is a mid-size car produced by Toyota in Japan. Most Chasers are four-door sedans and hardtop sedans; a two-door hardtop coupé was available on the first generation only. It was introduced on the 1976 Toyota Corona Mark II platform, and was sold new by Toyota at Toyota Vista Store dealerships only in Japan, together with the Toyota Cresta.', '/Website2/Assets/Images/chaser.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `Coaches`
--

CREATE TABLE `Coaches` (
  `CoachID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Coaches`
--

INSERT INTO `Coaches` (`CoachID`, `Name`, `Description`, `pic`) VALUES
(1, 'Keiichi Tsuchiya', 'Keiichi Tsuchiya is a Japanese professional race car driver. He is known as the Drift King (ドリキン, Dorikin) for his nontraditional use of drifting in non-drifting racing events and his role in popularizing drifting as a motorsport. In professional racing, he is a two-time 24 Hours of Le Mans class winner and the 2001 All Japan GT Championship runner-up. He is also known for touge driving.', '/Website2/Assets/Images/tsu.jpeg'),
(2, 'Georgy Chivchyan', 'Professional drift car racer that competes in the Russian Drift Series GP. He is a three-time Russian national champ and a four-time Russian Drift Series GP champ. He also won a Japanese D1GP champion and FIA ​​Intercontinental Drifting Cup champion.', '/Website2/Assets/Images/gocha.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `Customers`
--

CREATE TABLE `Customers` (
  `CustomerID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNum` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserID` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserID`, `login`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cars`
--
ALTER TABLE `Cars`
  ADD UNIQUE KEY `CarID` (`CarID`);

--
-- Indexes for table `Coaches`
--
ALTER TABLE `Coaches`
  ADD UNIQUE KEY `CoachID` (`CoachID`);

--
-- Indexes for table `Customers`
--
ALTER TABLE `Customers`
  ADD UNIQUE KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cars`
--
ALTER TABLE `Cars`
  MODIFY `CarID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Coaches`
--
ALTER TABLE `Coaches`
  MODIFY `CoachID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Customers`
--
ALTER TABLE `Customers`
  MODIFY `CustomerID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `UserID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
