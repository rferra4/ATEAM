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
  `Last_Name` varchar(50) NOT NULL,
  `Resume` varchar(255) NOT NULL,
  `StatusOfApplication` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `Company`
--

CREATE TABLE `Company` (
  `ID_Number` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Employee_ID` int(50) NOT NULL,
  `JobOpening_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Company`
--

INSERT INTO `Company` (`ID_Number`, `Name`, `Address`, `Description`, `Employee_ID`, `JobOpening_ID`) VALUES
(1, 'LSU ', 'BR, LA', 'University in Baton Rouge', 1, '1'),
(2, 'IBM', 'BR,LA', 'Entry Level Programmer', 2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `Employee_ID` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Last_Name` int(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Job_Opening`
--

CREATE TABLE `Job_Opening` (
  `Opening_ID` int(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Company_ID` int(50) NOT NULL,
  `Applicants_ID` int(50) NOT NULL,
  `SearchCommittee_ID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Job_Opening`
--

INSERT INTO `Job_Opening` (`Opening_ID`, `Description`, `Date`, `Status`, `Company_ID`, `Applicants_ID`, `SearchCommittee_ID`) VALUES
(1, 'Teaching assistant position', '2020-04-05', 'open', 2, 2, 2),
(2, 'Design Websites', '2020-04-05', 'open', 1, 1, 1);

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
  ADD PRIMARY KEY (`Opening_ID`);

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
  MODIFY `Applicants_ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Association`
--
ALTER TABLE `Association`
  MODIFY `Association_ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Company`
--
ALTER TABLE `Company`
  MODIFY `ID_Number` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `Employee_ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Job_Opening`
--
ALTER TABLE `Job_Opening`
  MODIFY `Opening_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `Search_Committee`
--
ALTER TABLE `Search_Committee`
  MODIFY `SearchCommittee_ID` int(50) NOT NULL AUTO_INCREMENT;
