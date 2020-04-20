-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 20, 2020 at 12:49 AM
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
  `description` varchar(10000) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Job_Opening`
--

INSERT INTO `Job_Opening` (`id`, `name`, `address`, `company`, `description`, `salary`, `Date`) VALUES
(12, 'software engineer', '7834 Brightside Rd, LA 9890', 'PDVSA', 'Basic Qualifications\r\n• Master\'s Degree in Computer Science or related field \r\n• Expert knowledge of one of the following programming languages: Java, C and C++ \r\n• 5+ years of hands on experience in software development, including design, implementation, debugging, and support, building scalable system software and/or Services \r\n• Experience working with REST and RPC service patterns and other client/server interaction models \r\nPreferred Qualifications\r\n• Master Degree or PhD in Computer Science, Computer Engineering or related field. \r\n• Experience with BigData technology e.g. Hadoop, and Spark \r\n• iOS and Android SDK experience \r\n• Track record of building and delivering mission critical, 24x7 production software systems \r\n• Deep understanding of distributed systems and web services technology \r\n• Strong at applying data structures, algorithms, and object-oriented design, to solve challenging problems\r\n', 'n/a', '2020-04-20 00:42:25'),
(13, 'Senior Developer', 'Brightside Rd, LA 9890', 'PDVSA', 'Basic Qualifications\r\n• Master’s or Ph.D in Computer Science \r\n• Development, Maintenance, and Troubleshooting in Google Ad Manager (formerly DFP)\r\n• Development and Maintenance of Tools for enhanced trafficking, automation, and Creative previews \r\n• Develop, Debug next level Ad Products that serve on our any of our platforms, on- and off property \r\n• Collaborate with and execute major cross-platform executions as a team, or independently when needed \r\n• Document knowledge and processes specific as it correlates to your work. \r\n• Utilize strong interpersonal skills in working with numerous internal teams and expand personal and team knowledge of new and upcoming products. \r\nPreferred Qualifications\r\n• Ph.D degree preferred, or relevant experience \r\n• A portfolio or links to previous work \r\n• 7 years of experience working in a technical service environment preferably supporting mobile or web-based products \r\n• Demonstrated creative problem-solving and strong analytical skills required \r\n• Demonstrated mastery of Object-Oriented JavaScript, CSS and HTML5 is required \r\n• Experience with Web-based languages, including React.JS and Angular \r\n• Experience with Mobile App-based languages: MRAID is a requirement, Swift and Java are a plus \r\n• Creative experience with Adobe Creative Cloud is a plus \r\n• Working knowledge of Machine Learning & AI is a plus \r\n• Working knowledge of Node.js, Grunt, Gulp, Git, WordPress, and Drupal is a plus \r\n• Strong working knowledge with one or more Internet ad management or targeted marketing applications (e.g., GAM/DFP, 24/7 Real Media, OAS, FreeWheel) \r\n• Demonstrated knowledge of the Programmatic Advertising landscape (Adform, AppNexus, Beeswax, and other DSPs) \r\n• Rich Media Vendor technology experience (e.g., Sizmek, Celtra, Pointroll) \r\n• A passion for creative technology and new media capabilities for advertising \r\n• Ability to absorb complex technical concepts and communicate them to a non-technical audience \r\n• Strong creative, collaboration and communication skills\r\n', 'n/a', '2020-04-20 00:42:25'),
(15, 'Civil Engineer', '2123 Highland Rd, LA 1237', 'Petrobas', 'Basic Qualifications\r\n• BS degree in civil engineering. \r\n• 7+ years of structural engineering experience, preferably in a heavy industrial or similar field. Master’s degree and PhD in civil engineering or related field can each be substituted for 1 year of experience. \r\n• Working knowledge of structural analysis software, preferably RISA 3D Primary \r\nPreferred Qualifications\r\n• Intimate knowledge of all design codes related to design and construction of steel and concrete, including but not limited to ASCE 7, AISC Steel Construction Manual, AISC 360, ACI 318, IBC, NFPA Life Safety Code, and applicable OSHA laws & regulations. \r\n• Ability to produce accurate engineering estimates, material takeoff estimates, and schedules. \r\n• Ability to navigate and utilize 3D modeling and point cloud laser scan software. \r\n• Ability to effectively lead and manage projects of various sizes and scope, ensuring that accurate, high quality deliverables are produced on schedule and on budget. \r\n• Demonstrate effective communication and interpersonal skills, with the ability to lead a team, delegate tasks, coordinate with other disciplines, and relate with clients. \r\n• Ability to effectively and efficiently mentor less experienced engineers and designers.\r\n', 'n/a', '2020-04-20 00:42:25'),
(16, 'Director Engineering', '2123 Highland Rd, LA 1237.', 'Petrobas', 'Basic Qualifications\r\n• Bachelor\'s degree in Computer Science or related field or equivalent work experience \r\n• Minimum of 12 years of overall engineering experience including a minimum of 8 years of management and leadership experience \r\nPreferred Qualifications\r\n• Master\'s degree in Computer Science or related field.\r\n• Expertise in software development using Agile/SCRUM, scaled agile or similar methodologies. \r\n• Strong leadership, project management, time management, and problem-solving skills. \r\n• Experience in creating and running bigdata and ML solutions. \r\n• Expert level technical knowledge: OOP, systems architecture, Java and related frameworks, modern JScript frameworks, microservices, relational and noSQL databases, CI/CD (tools and processes). \r\n• Hands on experience architecting and supporting highly scalable cloud-based solutions. \r\n• Good knowledge of software algorithms and design patterns. \r\n• Ability to communicate with non-engineering members of the management team, translating business requirements into engineering projects with specific requirements & scope, resources and project timing. \r\n• Strong team leadership skills, including the ability to mentor, motivate, and influence others. \r\n• Track record of hiring, developing and retaining strong teams. \r\n• Occasional travel up to 30% \r\n• Successful completion of a background screening process including, but not limited to, employment verifications, criminal search, OFAC, SS Verification, as well as credit and drug screening, where applicable and in accordance with federal and local regulations \r\n• The ability to obtain the necessary credit line required to travel\r\n', 'n/a', '2020-04-20 00:42:25'),
(17, 'Civil Engineer', '2342 Nicholson Dr, LA 70830', 'Ecopetrol', 'Basic Qualifications \r\n• BS in Civil Engineering.\r\n• 3-5 years experience in design of structural steel and foundations for supporting equipment & pipe, 1+ years project management experience, ability to coordinate with consulting engineering and construction contractors. \r\nPreferred Qualifications \r\n• Project Management experience\r\n', 'n/a', '2020-04-20 00:42:25'),
(18, 'Mechanical Engineering intern', '2342 Nicholson Dr, LA 70830', 'Ecopetrol', 'Basic Qualifications \r\n• BS in Mechanical Engineering.\r\n• 3-5 years of experience.\r\nPreferred Qualifications \r\n• Position Summary Reporting directly to an assigned lead Engineer or Project Manager in an office or on a project construction work site, this is a temporary position providing on the job training. Duties provide meaningful work experience and business knowledge to college students in their chosen field. \r\n• Performs routine aspects of assigned projects under close supervision, following established procedures \r\n• Coordinate with Project Management professionals to make modifications and corrections to project specific documents \r\n• Prepare and process client requested data or documents that are compliant with contract terms and client specific needs \r\n• May use computer-assisted engineering software and equipment to perform engineering tasks \r\n• Collects and prepares data for evaluation \r\n• Examine Project documents for completeness and accuracy \r\n• Currently enrolled in a Mechanical Engineering curriculum is required \r\n• Experience with MS Word, MS Excel, and MS PowerPoint is required \r\n• Excellent communication and interpersonal skills is required \r\n• Attention to detail and the ability to exercise good professional judgment is required \r\n• Ability to effectively interact and collaborate with all levels of management regarding project activity is required\r\n ', 'n/a', '2020-04-20 00:42:25'),
(19, 'Data engineer', 'BR, LA', 'PDVSA', '', 'n/a', '2020-04-20 00:42:25');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
