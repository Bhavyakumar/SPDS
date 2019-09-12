-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2019 at 12:32 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spds`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `a_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `activity_name` varchar(50) NOT NULL,
  `submission_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`a_id`, `sem_id`, `activity_name`, `submission_date`) VALUES
(7, 4, 'Title Submission', '2019-07-11'),
(8, 4, 'Synopsis Submission', '2019-07-25'),
(9, 4, 'Project Presentation', '2019-12-10'),
(141, 3, 'Title Submission', '2019-07-09'),
(142, 3, 'Synopsis Submission', '2019-07-24'),
(143, 3, 'Report Submission', '2019-11-27'),
(144, 3, 'Project Presentation', '2019-12-06'),
(145, 4, 'Report Submission', '2019-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `department`) VALUES
(18, 'Department of Agricultural Information Technology'),
(19, 'Department of Agricultural Science'),
(27, 'Bidi Tobacco Research Station, Anand'),
(28, 'Main Forage Research Station, Anand'),
(29, 'Reproductive Biology Research Unit, Anand'),
(30, 'Main Vegetable Research Station, Anand'),
(31, 'Medicinal and Aromatic Plants Research Station, AAU'),
(32, 'Bio Control Research Laboratory, Anand'),
(33, 'Weed control Project, Anand'),
(34, 'Micro Nutrient Project, Anand'),
(35, 'Livestock Research Station'),
(36, 'AINP on Pesticide Residues, ICAR, Unit-9'),
(37, 'Department of Agricultural Biotechnology, Anand'),
(38, 'Poultry Complex'),
(39, 'AINP on Agricultural Ornithology, Anand'),
(40, 'Animal Nutrition Research Station, Anand'),
(41, 'Sardar Smruti Kendra, Anand'),
(42, 'Sardar Patel Agricultural Educational Museum, Anand'),
(43, 'Agriculture Technology Information Center, Anand'),
(44, 'Training & Visit Scheme'),
(45, 'Extension Education Institute, Anand'),
(46, 'Poultry Training Centre, Anand'),
(47, 'Mali Training Centre , AAU');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `f_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `f_status` int(2) NOT NULL DEFAULT 0,
  `type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `d_id`, `fname`, `email`, `phone_no`, `password`, `f_status`, `type`) VALUES
(21, 18, 'Dr. D. K. Parmar', 'dkparmar@aau.in', '8978456958', 'dkparmar@aau.in', 1, 'Major'),
(22, 18, 'Dr. D. R. Kathiriya', 'deanait@aau.in', '9898785620', 'deanait@aau.in', 0, NULL),
(23, 18, 'Dr. R. S. Parmar', 'rsparmar@aau.in', '8898564785', 'rsparmar@aau.in', 0, NULL),
(24, 18, 'Dr. Mayur Raj', 'mpraj@aau.in', '9874562130', 'mpraj@aau.in', 0, NULL),
(25, 19, 'Dr. J. V. Suthar', 'jvsuthar@aau.in', '7898959652', 'jvsuthar@aau.in', 0, NULL),
(26, 19, 'Dr. G. B. Chaudhari', 'gbchaudhari@aau.in', '9898982581', 'gbchaudhari@aau.in', 0, NULL),
(28, 18, 'Er. Vishal Mehra', 'vishal@aau.in', '9898987845', 'vishal@aau.in', 0, NULL),
(29, 19, 'Prof. N. M. Vegad', 'nileshvegad@aau.in', '9878787845', 'nileshvegad@aau.in', 0, NULL),
(30, 19, 'Dr. V. B. Darji ', 'vbdarji@aau.in', '8787956488', 'vbdarji@aau.in', 0, NULL),
(31, 18, 'Prof. K. P. Patel', 'kpatel@aau.in', '7878789865', 'kpatel@aau.in', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `major_guide`
--

CREATE TABLE `major_guide` (
  `maj_id` int(11) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `f_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `minor_guide`
--

CREATE TABLE `minor_guide` (
  `minor_id` int(11) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `f_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `p_id` int(11) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `t_id` int(11) NOT NULL,
  `sub_date` date NOT NULL,
  `project` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `r_id` int(11) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `f_id` int(11) NOT NULL,
  `sy_remark` varchar(200) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `re_remark` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(11) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `t_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `project_report` int(2) NOT NULL,
  `design_analysis` int(2) NOT NULL,
  `coding_validation` int(2) NOT NULL,
  `presentation` int(2) NOT NULL,
  `UI_design` int(2) NOT NULL,
  `total` int(3) NOT NULL,
  `f_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(11) NOT NULL,
  `semester` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `semester`) VALUES
(3, 4),
(4, 6),
(5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `reg_no` varchar(20) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `roll_no` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`reg_no`, `sem_id`, `name`, `roll_no`, `email`, `phone_no`, `password`) VALUES
('06-0200-2016', 4, 'Nilay Bhatt', 2, 'nilayb56@student.aau.in', '9898784510', 'nilay@12'),
('06-0201-2016', 4, 'Virat Chaudhary', 3, 'virat1998@student.aau.in', '8200004225', 'virat@12'),
('06-0202-2016', 4, 'Bhavyakumar Chaudhary', 4, 'bhavychaudhary5@student.aau.in', '9099672610', 'bhavya@1998'),
('06-0203-2016', 4, 'Darshan Chovatiya', 5, 'darshanpatidar62@student.aau.in', '7878451230', 'darsh@12'),
('06-0208-2016', 4, 'Vinod Gelot', 8, 'vinodgelot4830@student.aau.in', '9898784516', 'vinod@12'),
('06-0209-2016', 4, 'Yashpal Kalaswa', 9, 'yashpal.ckalaswa@student.aau.in', '7900210147', 'yash@12'),
('06-0210-2016', 4, 'Meet Ladani', 10, 'meetladani12@student.aau.in', '8978987452', 'meet@12'),
('06-0212-2016', 4, 'Pankaj Makadiya', 12, 'pankajmakadiya1998@student.aau.in', '9898989841', 'pankaj@12'),
('06-0218-2016', 4, 'Nigam Patel', 18, 'patelnigam4599@student.aau.in', '9624021922', 'nigam@12'),
('06-0231-2016', 4, 'Darshit tank', 28, 'tankdarhit437@student.aau.in', '7878784512', 'darshit@12'),
('06-0248-2017', 3, 'Keyur Markana', 5, 'keyurmarkna@student.aau.in', '9078451230', 'keyur@12');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `sub_id` int(11) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `t_id` int(11) NOT NULL,
  `synopsis` varchar(50) NOT NULL,
  `report` varchar(50) NOT NULL,
  `synopsis_date` date NOT NULL,
  `report_date` date NOT NULL,
  `sy_status` int(1) NOT NULL DEFAULT 0,
  `report_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `t_id` int(11) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `title_decscription` varchar(300) NOT NULL,
  `t_submit_date` date NOT NULL,
  `t_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `v_id` int(11) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `f_id` int(11) NOT NULL,
  `synopsis_visit` int(2) NOT NULL,
  `report_visit` int(2) NOT NULL,
  `project_visit` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `sem_id` (`sem_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `major_guide`
--
ALTER TABLE `major_guide`
  ADD PRIMARY KEY (`maj_id`),
  ADD KEY `reg_no` (`reg_no`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `minor_guide`
--
ALTER TABLE `minor_guide`
  ADD PRIMARY KEY (`minor_id`),
  ADD KEY `reg_no` (`reg_no`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `reg_no` (`reg_no`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `reg_no` (`reg_no`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `reg_no` (`reg_no`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`reg_no`),
  ADD KEY `sem_id` (`sem_id`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `reg_no` (`reg_no`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `reg_no` (`reg_no`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `reg_no` (`reg_no`),
  ADD KEY `f_id` (`f_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `major_guide`
--
ALTER TABLE `major_guide`
  MODIFY `maj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `minor_guide`
--
ALTER TABLE `minor_guide`
  MODIFY `minor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `department` (`d_id`);

--
-- Constraints for table `major_guide`
--
ALTER TABLE `major_guide`
  ADD CONSTRAINT `major_guide_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `student` (`reg_no`),
  ADD CONSTRAINT `major_guide_ibfk_2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);

--
-- Constraints for table `minor_guide`
--
ALTER TABLE `minor_guide`
  ADD CONSTRAINT `minor_guide_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `student` (`reg_no`),
  ADD CONSTRAINT `minor_guide_ibfk_2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`reg_no`) REFERENCES `student` (`reg_no`),
  ADD CONSTRAINT `project_ibfk_3` FOREIGN KEY (`t_id`) REFERENCES `title` (`t_id`);

--
-- Constraints for table `remark`
--
ALTER TABLE `remark`
  ADD CONSTRAINT `remark_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `student` (`reg_no`),
  ADD CONSTRAINT `remark_ibfk_2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `remark_ibfk_3` FOREIGN KEY (`sub_id`) REFERENCES `submission` (`sub_id`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `student` (`reg_no`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `title` (`t_id`),
  ADD CONSTRAINT `result_ibfk_3` FOREIGN KEY (`sub_id`) REFERENCES `submission` (`sub_id`),
  ADD CONSTRAINT `result_ibfk_4` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`);

--
-- Constraints for table `submission`
--
ALTER TABLE `submission`
  ADD CONSTRAINT `submission_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `student` (`reg_no`),
  ADD CONSTRAINT `submission_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `title` (`t_id`);

--
-- Constraints for table `title`
--
ALTER TABLE `title`
  ADD CONSTRAINT `title_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `student` (`reg_no`);

--
-- Constraints for table `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `visit_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `student` (`reg_no`),
  ADD CONSTRAINT `visit_ibfk_2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;