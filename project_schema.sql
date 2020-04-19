-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 19, 2020 at 10:55 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `project_schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `Applicants`
--

CREATE TABLE `Applicants` (
  `Applicants_ID` int(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jobID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Applicants`
--

INSERT INTO `Applicants` (`Applicants_ID`, `first_name`, `last_name`, `email`, `jobID`) VALUES
(1, 'Rachel', 'Ferrara', '', 0),
(2, 'sally', 'smith', '', 0),
(3, 'john', 'smith ', '', 0),
(4, '', '', '', 0),
(5, '', '', '', 0),
(6, 'j', 'j', 'j@gmail.com', 0),
(7, 'j', 'j', 'j@gmail.com', 0),
(8, 'k', 'k', 'k', 0),
(9, 'r', 'r', 'r', 0),
(10, 'o', 'o', 'o', 0),
(11, 'p', 'p', 'p', 0),
(12, 'q', 'q', 'q', 0),
(13, 't', 't', 't', 0),
(14, 'q', 'q', 'q', 0),
(15, 'n', 'n', 'n', 0),
(16, 'd', 'd', 'd', 12),
(17, 't', 't', 't', 12),
(18, 'uu', 'u', 'u', 2),
(19, 'c', 'c', 'c', 12),
(20, 'test', 'test', 'test@gmail.com', 11),
(21, 't', 't', 't', 12),
(22, 'hi', 'hi', 'hi@gmail.com', 24),
(23, 'i', 'i', 'i@gmail.com', 23),
(24, 'jo', 'jo', 'jo@gmail.com', 26),
(25, 'ABC', 'abc', 'abc@gmail.com', 12),
(26, 'kl', 'kl', 'kl@gmail.com', 16),
(27, 'abc', 'abc', 'abc@gmail.com', 19);

-- --------------------------------------------------------

--
-- Table structure for table `Association`
--

CREATE TABLE `Association` (
  `Association_ID` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `ID_Number` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Association`
--

INSERT INTO `Association` (`Association_ID`, `Name`, `Description`, `Address`, `ID_Number`) VALUES
(1, 'ROCA.sa', 'engineering association company', '7556 Nicholson Dr, Baton Rouge LA 70803.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Company`
--

CREATE TABLE `Company` (
  `ID_Number` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `Employee_ID` int(50) NOT NULL,
  `JobOpening_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Company`
--

INSERT INTO `Company` (`ID_Number`, `Name`, `Address`, `Description`, `Employee_ID`, `JobOpening_ID`) VALUES
(1, 'PDVSA', '7834 Brightside Rd, LA 9890. ', 'PDVSA is a US$14.3 billion technology, engineering, construction and manufacturing and financial services conglomerate. It addresses critical needs in key sectors including infrastructure, construction, hydrocarbon, power, defense and aerospace. A strong, customer-focused approach, conformance to global HSE standards and the constant quest for top-class quality have enabled the Company to sustain leadership in its major lines of business for over 75 years. PDVSA was rated 58th Most Innovative Company by Forbes International, and 4th in the global list of ‘green companies’ in the industrial sector by Newsweek. A survey by a leading HR consultancy affirmed its reputation as a people-focused company, leading to the award for the ‘Most Attractive Employer’ in the industrial sector. \r\n', 1, '1'),
(2, 'Petrobras', '2123 Highland Rd, LA 1237', 'Petrobras have been in operation since 2011, covering all aspects of work in the area of Mechanical installations including Plumbing services, Air conditioning, Ventilation and BMS systems. During this time Petrobras services have become specialists in planned preventative maintenance as well as installations. Our success is based on the continuous commitment that Alpha Mechanical services give to all our clients by continuously updating and developing our services, and importantly, in this time of rising costs – competitive pricing structure. Our consistency of work quality, experienced mechanical & electrical engineers, fast reliable 24 hour call out service, and preventative maintenance have also contributed towards the success to date of our company. We are committed to Health & Safety and all engineers are completely trained in this area. We also use an external company to monitor and audit our Health and safety practices. \r\n', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `Employee_ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `create_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`Employee_ID`, `username`, `password`, `First_Name`, `Last_Name`, `email`, `create_datetime`) VALUES
(1, '', '', 'John ', 'Doe', 'john@gmail.com', NULL),
(2, '', '', 'Dani', 'Rodriguez', 'dani@hotmail.com', NULL),
(3, '', '', 'Jose', 'Rodriguez', 'JD@yahoo.com', NULL),
(4, 'rach', '098f6bcd4621d373cade4e832627b4f6', 'rach', 'rach', 'rach@gmail.com', '2020-04-07 01:00:51'),
(5, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', 'test@gmail.com', '2020-04-07 01:22:28'),
(6, 'tester', 'f5d1278e8109edd94e1e4197e04873b9', 'tester', 'tester', 'tester@gmail.com', '2020-04-07 01:23:30'),
(7, '', '', 'Sim', 'Thapa', 'ST@gmail.com', NULL),
(8, '', '', 'Santi', 'Salas', 'st@hotmail.com', NULL),
(9, 'phil', 'd14ffd41334ec4b4b3f2c0d55c38be6f', 'phil', 'phil', 'p@gmail.com', '2020-04-08 22:42:18'),
(11, 'one', 'f97c5d29941bfb1b2fdab0874906ab82', 'one', 'one', 'one@gmail.com', '2020-04-09 01:00:47'),
(12, 'r', '4b43b0aee35624cd95b910189b3dc231', 'r', 'r', 'r', '2020-04-09 01:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `Job_Opening`
--

CREATE TABLE `Job_Opening` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Job_Opening`
--

INSERT INTO `Job_Opening` (`id`, `name`, `address`, `company`, `salary`) VALUES
(12, 'software engineer', '7834 Brightside Rd, LA 9890', 'PDVSA', 'n/a'),
(13, 'Senior Developer', 'Brightside Rd, LA 9890', 'PDVSA', 'n/a'),
(15, 'Civil Engineer', '2123 Highland Rd, LA 1237', 'Petrobas', 'n/a'),
(16, 'Director Engineering', '2123 Highland Rd, LA 1237.', 'Petrobas', 'n/a'),
(17, 'Civil Engineer', '2342 Nicholson Dr, LA 70830', 'Ecopetrol', 'n/a'),
(18, 'Mechanical Engineering intern', '2342 Nicholson Dr, LA 70830', 'Ecopetrol', 'n/a'),
(19, 'Data engineer', 'BR, LA', 'PDVSA', 'n/a');

-- --------------------------------------------------------

--
-- Table structure for table `masterlogin`
--

CREATE TABLE `masterlogin` (
  `id` int(11) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `masterlogin`
--

INSERT INTO `masterlogin` (`id`, `First_Name`, `Last_Name`, `username`, `email`, `password`, `role`) VALUES
(11, '', '', 'ateam', 'ateam@gmail.com', '123456', 'recruiter'),
(12, '', '', 'rachel', 'rachel@gmail.com', '1234567', 'employee'),
(13, '', '', 'hello', 'hello@gmail.com', 'hello123', 'user'),
(14, '', '', 'tester', 'tester@gmail.com', 'tester123', 'employee'),
(15, '', '', 'test1', 'test1@gmail.com', 'test12345', 'user'),
(16, '', '', 'user1', 'user@gmail.com', 'user123', 'user'),
(17, '', '', 'testt', 'testt@gmail.com', '123456', 'user'),
(18, '', '', 'testtt', 'testtt@gmail.com', '123456', 'user'),
(19, '', '', 'hi', 'hi@gmail.com', '123456', 'user'),
(20, '', '', 'test2', 'test2@gmail.com', '123456', 'employee'),
(21, '', '', 'username', 'username@gmail.com', '123456', 'user'),
(22, '', '', 'h', 'h@gmail.com', '123456', 'employee'),
(23, '', '', 'j', 'j@gmail.com', '123456', 'recruiter'),
(24, '', '', 'k', 'k@gmail.com', '123456', 'recruiter'),
(25, '', '', 'user2', 'user2@gmail.com', '123456', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `username` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `age` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `areas_of_interest` varchar(1000) NOT NULL,
  `last_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Search_Committee`
--

CREATE TABLE `Search_Committee` (
  `SearchCommittee_ID` int(50) NOT NULL,
  `Employee_ID` int(50) NOT NULL,
  `Opening_ID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Search_Committee`
--

INSERT INTO `Search_Committee` (`SearchCommittee_ID`, `Employee_ID`, `Opening_ID`) VALUES
(1, 1, 1);

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
-- Indexes for table `Job_Opening`
--
ALTER TABLE `Job_Opening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masterlogin`
--
ALTER TABLE `masterlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `Search_Committee`
--
ALTER TABLE `Search_Committee`
  ADD PRIMARY KEY (`SearchCommittee_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Applicants`
--
ALTER TABLE `Applicants`
  MODIFY `Applicants_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `Association`
--
ALTER TABLE `Association`
  MODIFY `Association_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Company`
--
ALTER TABLE `Company`
  MODIFY `ID_Number` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `Employee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Job_Opening`
--
ALTER TABLE `Job_Opening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `masterlogin`
--
ALTER TABLE `masterlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `Search_Committee`
--
ALTER TABLE `Search_Committee`
  MODIFY `SearchCommittee_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
