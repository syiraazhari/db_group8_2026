-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2026 at 04:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spa_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Username`, `Password`) VALUES
(1, 'admin', 'admin123'),
(2, 'admin 2', 'admin2123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `AppointmentID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `TreatmentID` int(11) DEFAULT NULL,
  `AppointmentDate` date DEFAULT NULL,
  `AppointmentTime` time DEFAULT NULL,
  `Remarks` text DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`AppointmentID`, `CustomerID`, `TreatmentID`, `AppointmentDate`, `AppointmentTime`, `Remarks`, `Status`) VALUES
(5, 8, 1, '2026-06-08', '10:00:00', '-\r\n', 'Completed'),
(6, 9, 1, '2026-06-08', '02:00:00', 'prefer female therapist', 'Completed'),
(7, 10, 2, '2026-06-08', '11:00:00', 'sensitive skin', 'Completed'),
(8, 11, 3, '2026-06-15', '03:00:00', '-', 'Confirmed'),
(9, 12, 2, '2026-07-01', '03:00:00', 'gentle products only', 'Cancelled'),
(14, 9, 3, '2026-06-13', '10:00:00', 'sensitive skin', 'Upcoming'),
(15, 16, 1, '2026-06-23', '11:00:00', 'prefer female therapist', 'Completed'),
(16, 11, 2, '2026-06-13', '03:00:00', '', 'Upcoming');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `FullName`, `PhoneNumber`, `Email`, `Address`, `Username`, `Password`) VALUES
(8, 'Hello Kitty', '0131111111', 'hellokitty@gmail.com', 'Tokyo', 'kitty', 'kitty123'),
(9, 'My Melody', '0131111112', 'melody@gmail.com', 'Kuala Lumpur', 'melody', 'melody123'),
(10, 'Kuromi', '0131111113', 'kuromi@gmail.com', 'Shah Alam', 'kuromi', 'kuromi123'),
(11, 'Cinnamoroll', '0131111114', 'cinnamoroll@gmail.com', 'Johor Bahru', 'cinna', 'cinna123'),
(12, 'Pochacco', '0131111115', 'pochacco@gmail.com', 'Damansara', 'pocha', 'pocha123'),
(13, 'Pompompurin', '0131111116', 'purin@gmail.com', 'New York City', 'purin', 'purin123'),
(14, 'Keroppi', '0131111117', 'keroppi@gmail.com', 'Washington', 'keroppi', 'keroppi123'),
(15, 'Badtz-Maru', '0131111118', 'badtz@gmail.com', 'New Jersey', 'badtz', 'badtz123'),
(16, 'Elsa', '0131111119', 'elsa@gmail.com', 'London', 'elsa', 'elsa123'),
(17, 'Anna', '0131111120', 'anna@gmail.com', 'England', 'anna', 'anna123');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `StaffName` varchar(100) NOT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `StaffName`, `PhoneNumber`, `Position`, `Username`, `Password`) VALUES
(5, 'Mickey Mouse', '0121234560', 'Therapist', 'mickey', 'mickey123'),
(6, 'Minnie Mouse', '0121234561', 'Therapist', 'minnie', 'minnie123'),
(7, 'Donald Duck', '0121234562', 'Therapist', 'donald', 'donald123'),
(8, 'Daisy Duck', '0121234563', 'Therapist', 'daisy', 'daisy123'),
(9, 'Goofy', '0121234564', 'Receptionist', 'goofy', 'goofy123'),
(10, 'Pluto', '0121234565', 'Receptionist', 'pluto', 'pluto123');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `TreatmentID` int(11) NOT NULL,
  `TreatmentName` varchar(100) DEFAULT NULL,
  `Duration` varchar(50) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`TreatmentID`, `TreatmentName`, `Duration`, `Price`, `Description`) VALUES
(1, 'Aromatherapy Massage', '60 Minutes', 130.00, 'Relaxing massage using essential oils'),
(2, 'Facial Treatment', '45 Minutes', 150.00, 'Skin cleansing and rejuvenation'),
(3, 'Hot Stone Therapy', '90 Minutes', 180.00, 'Therapy using heated stones');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `TreatmentID` (`TreatmentID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`TreatmentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `TreatmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`TreatmentID`) REFERENCES `treatment` (`TreatmentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
