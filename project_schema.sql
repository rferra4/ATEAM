-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 09, 2020 at 10:56 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `Applicants`
--

CREATE TABLE `Applicants` (
  `Applicants_ID` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Last name` varchar(50) NOT NULL,
  `Resume` varchar(50) NOT NULL,
  `StatusOfApplication` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Association`
--

CREATE TABLE `Association` (
  `Association_ID` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `id_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Company`
--

CREATE TABLE `Company` (
  `ID_Number` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Employee_ID` int(50) NOT NULL,
  `JobOpening_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `Employee_ID` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Last name` int(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Job Opening`
--

CREATE TABLE `Job Opening` (
  `Opening_ID` int(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Company ID` int(50) NOT NULL,
  `Applicants_ID` int(50) NOT NULL,
  `SearchCommittee_ID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Search Committee`
--

CREATE TABLE `Search Committee` (
  `SearchCommittee_ID` int(50) NOT NULL,
  `Employee_ID` int(50) NOT NULL,
  `Opening_ID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Applicants`
--
ALTER TABLE `Applicants`
  ADD PRIMARY KEY (`Applicants_ID`);

--
-- Indexes for table `Association`
--
ALTER TABLE `Association`
  ADD PRIMARY KEY (`Association_ID`);

--
-- Indexes for table `Company`
--
ALTER TABLE `Company`
  ADD PRIMARY KEY (`ID_Number`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`Employee_ID`);

--
-- Indexes for table `Job Opening`
--
ALTER TABLE `Job Opening`
  ADD PRIMARY KEY (`Opening_ID`);

--
-- Indexes for table `Search Committee`
--
ALTER TABLE `Search Committee`
  ADD PRIMARY KEY (`SearchCommittee_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
