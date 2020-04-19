-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 19, 2020 at 01:08 AM
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
(16, 'd', 'd', 'd', 12),
(17, 't', 't', 't', 12),
(19, 'c', 'c', 'c', 12),
(20, 'test', 'test', 'test@gmail.com', 11);

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
  `Opening_ID` int(50) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `Date` date NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Company_ID` int(50) NOT NULL,
  `Applicants_ID` int(50) NOT NULL,
  `SearchCommittee_ID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Job_Opening`
--

INSERT INTO `Job_Opening` (`Opening_ID`, `Title`, `Description`, `Date`, `Status`, `Company_ID`, `Applicants_ID`, `SearchCommittee_ID`) VALUES
(11, 'Software Engineer', 'Basic Qualifications\r\n• Master\'s Degree in Computer Science or related field \r\n• Expert knowledge of one of the following programming languages: Java, C and C++ \r\n• 5+ years of hands on experience in software development, including design, implementation, debugging, and support, building scalable system software and/or Services \r\n• Experience working with REST and RPC service patterns and other client/server interaction models \r\nPreferred Qualifications\r\n• Master Degree or PhD in Computer Science, Computer Engineering or related field. \r\n• Experience with BigData technology e.g. Hadoop, and Spark \r\n• iOS and Android SDK experience \r\n• Track record of building and delivering mission critical, 24x7 production software systems \r\n• Deep understanding of distributed systems and web services technology \r\n• Strong at applying data structures, algorithms, and object-oriented design, to solve challenging problems\r\n', '2020-01-10', 'open to applicants', 1, 1, 1),
(12, 'Senior Developer', 'Basic Qualifications\r\n• Master’s or Ph.D in Computer Science \r\n• Development, Maintenance, and Troubleshooting in Google Ad Manager (formerly DFP)\r\n• Development and Maintenance of Tools for enhanced trafficking, automation, and Creative previews \r\n• Develop, Debug next level Ad Products that serve on our any of our platforms, on- and off property \r\n• Collaborate with and execute major cross-platform executions as a team, or independently when needed \r\n• Document knowledge and processes specific as it correlates to your work. \r\n• Utilize strong interpersonal skills in working with numerous internal teams and expand personal and team knowledge of new and upcoming products. \r\nPreferred Qualifications\r\n• Ph.D degree preferred, or relevant experience \r\n• A portfolio or links to previous work \r\n• 7 years of experience working in a technical service environment preferably supporting mobile or web-based products \r\n• Demonstrated creative problem-solving and strong analytical skills required \r\n• Demonstrated mastery of Object-Oriented JavaScript, CSS and HTML5 is required \r\n• Experience with Web-based languages, including React.JS and Angular \r\n• Experience with Mobile App-based languages: MRAID is a requirement, Swift and Java are a plus \r\n• Creative experience with Adobe Creative Cloud is a plus \r\n• Working knowledge of Machine Learning & AI is a plus \r\n• Working knowledge of Node.js, Grunt, Gulp, Git, WordPress, and Drupal is a plus \r\n• Strong working knowledge with one or more Internet ad management or targeted marketing applications (e.g., GAM/DFP, 24/7 Real Media, OAS, FreeWheel) \r\n• Demonstrated knowledge of the Programmatic Advertising landscape (Adform, AppNexus, Beeswax, and other DSPs) \r\n• Rich Media Vendor technology experience (e.g., Sizmek, Celtra, Pointroll) \r\n• A passion for creative technology and new media capabilities for advertising \r\n• Ability to absorb complex technical concepts and communicate them to a non-technical audience \r\n• Strong creative, collaboration and communication skills\r\n', '2020-03-10', 'open to applicants', 1, 1, 1),
(21, 'Civil engineer', 'Basic Qualifications\r\n• BS degree in civil engineering. \r\n• 7+ years of structural engineering experience, preferably in a heavy industrial or similar field. Master’s degree and PhD in civil engineering or related field can each be substituted for 1 year of experience. \r\n• Working knowledge of structural analysis software, preferably RISA 3D Primary \r\nPreferred Qualifications\r\n• Intimate knowledge of all design codes related to design and construction of steel and concrete, including but not limited to ASCE 7, AISC Steel Construction Manual, AISC 360, ACI 318, IBC, NFPA Life Safety Code, and applicable OSHA laws & regulations. \r\n• Ability to produce accurate engineering estimates, material takeoff estimates, and schedules. \r\n• Ability to navigate and utilize 3D modeling and point cloud laser scan software. \r\n• Ability to effectively lead and manage projects of various sizes and scope, ensuring that accurate, high quality deliverables are produced on schedule and on budget. \r\n• Demonstrate effective communication and interpersonal skills, with the ability to lead a team, delegate tasks, coordinate with other disciplines, and relate with clients. \r\n• Ability to effectively and efficiently mentor less experienced engineers and designers.\r\n', '2020-01-10', 'open to applicants ', 2, 1, 1),
(22, 'Project Engineer', 'Job Requirements Our client needs an Engineer with project management and experience in all project phases; Definition, Design, Procurement, Construction, and Start-up/Commissioning. In project execution this Project Manager will manage and lead 6-7 projects per year ranging from $200K to $2MM in scope. \r\nBasic Qualifications\r\n• Degree in engineering is required. \r\n• Strong knowledge of process equipment and their functions. \r\n• Knowledge of the different engineering discipline roles. \r\n• Proficient in project management processes. \r\n• Broad technical experience. \r\n• Experience with problem solving / troubleshooting and data analysis. \r\n• Ability to read P&ID’s and instrument loops sheets. \r\n• Experienced in commissioning of new projects within a chemical process. \r\n• Experienced in troubleshooting process and control issues in a fast paced environment. \r\n• Proficiency in Microsoft applications, such as Word and Excel. \r\n• Strong written and verbal communication skills. \r\n• Strong skill set in organization and prioritizing projects and work load. \r\n• Must be a self-starter, who is highly motivated, able to take the initiative on projects, and able to work without supervision. \r\n• Ability to follow processes and procedures, as well as develop and implement them. \r\n• The position requires strong attention to detail, as well as the ability to sit in front of a computer. \r\n• This position requires an employee to be in an office environment as well as exposed to some outside elements; process and warehouse environment. \r\nKey Words: process engineer, chemical design engineer, chemical engineer, development engineer, controls engineer, instrumentation engineer, chemical engineering, process engineer, process control engineer, process development engineer, process controls engineer, instrumentation engineer, chemical engineering, process engineer, process control engineer, ChE, petrochemical, refinery, oil and gas, pharmaceutical, process plant, operations, maintenance\r\n', '2020-01-24', 'open to applicants ', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `masterlogin`
--

CREATE TABLE `masterlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `masterlogin`
--

INSERT INTO `masterlogin` (`id`, `username`, `email`, `password`, `role`) VALUES
(11, 'ateam', 'ateam@gmail.com', '123456', 'recruiter'),
(12, 'rachel', 'rachel@gmail.com', '1234567', 'employee'),
(13, 'hello', 'hello@gmail.com', 'hello123', 'user'),
(14, 'tester', 'tester@gmail.com', 'tester123', 'employee'),
(15, 'test1', 'test1@gmail.com', 'test12345', 'user'),
(16, 'user1', 'user@gmail.com', 'user123', 'user'),
(17, 'testt', 'testt@gmail.com', '123456', 'user'),
(18, 'testtt', 'testtt@gmail.com', '123456', 'user'),
(19, 'hi', 'hi@gmail.com', '123456', 'user'),
(20, 'test2', 'test2@gmail.com', '123456', 'employee'),
(21, 'username', 'username@gmail.com', '123456', 'user'),
(22, 'h', 'h@gmail.com', '123456', 'employee'),
(23, 'j', 'j@gmail.com', '123456', 'recruiter'),
(24, 'k', 'k@gmail.com', '123456', 'recruiter'),
(25, 'user2', 'user2@gmail.com', '123456', 'user');

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
  ADD PRIMARY KEY (`Opening_ID`);

--
-- Indexes for table `masterlogin`
--
ALTER TABLE `masterlogin`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `Applicants_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `Opening_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
