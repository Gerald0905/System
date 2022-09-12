-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 04:48 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sample_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminaccount`
--

CREATE TABLE IF NOT EXISTS `tbl_adminaccount` (
`adminaccount_ID` int(25) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_status` varchar(25) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adminaccount`
--

INSERT INTO `tbl_adminaccount` (`adminaccount_ID`, `admin_name`, `admin_status`, `admin_username`, `admin_password`) VALUES
(1, 'Admin', 'Active', 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72'),
(2, 'Jason Tadeos', 'Active', 'jason', '2b877b4b825b48a9a0950dd5bd1f264d'),
(3, 'Gerald Amosco', 'Active', 'gerald', '380891959a0754c24a7ad3525c2d1e77'),
(4, 'Euniza Velez', 'Inactive', 'euniza', 'fbfff451c6d4d4078b51f313d8794c23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appliedsubjects`
--

CREATE TABLE IF NOT EXISTS `tbl_appliedsubjects` (
`appliedsubject_ID` int(15) NOT NULL,
  `appliedsubject_name` varchar(255) NOT NULL,
  `strands_ID` int(15) NOT NULL,
  `sem_ID` int(15) NOT NULL,
  `yearlevel_ID` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_appliedsubjects`
--

INSERT INTO `tbl_appliedsubjects` (`appliedsubject_ID`, `appliedsubject_name`, `strands_ID`, `sem_ID`, `yearlevel_ID`) VALUES
(1, 'English for Academic and Professional Purposes', 1, 1, 1),
(2, 'Practical Research 1', 1, 2, 1),
(3, 'Practical Research 2', 1, 1, 2),
(4, 'Empowerment Technology', 1, 1, 2),
(5, 'Entrepreneurship', 1, 1, 2),
(6, 'Research Project', 1, 2, 2),
(7, ' Filipino sa Piling Larangan  (Academik)', 1, 2, 2),
(8, 'English for Academic and Professional Purposes', 2, 1, 1),
(9, 'Practical Research 1', 2, 2, 1),
(10, 'Practical Research 2', 2, 1, 2),
(11, 'Entrepreneurship', 2, 1, 2),
(12, 'Empowerment Technology', 2, 1, 2),
(13, ' Filipino sa Piling Larangan  (Academik)', 2, 2, 2),
(14, 'Inquiries, Investigations, Immersion', 2, 2, 2),
(15, 'English for Academic and Professional Purposes', 3, 1, 1),
(16, 'Research in Daily Life 1', 3, 2, 1),
(17, 'Entrepreneurship', 3, 1, 2),
(18, 'Research in Daily Life 2', 3, 1, 2),
(19, 'Empowerment Technologies', 3, 1, 2),
(20, ' Filipino sa Piling Larangan  (Academik)', 3, 2, 2),
(21, 'Inquiries, Investigations and Immersion', 3, 2, 2),
(22, 'English for Academic and Professional Purposes', 4, 1, 1),
(23, 'Practical Research 1', 4, 2, 1),
(24, 'Empowerment Technology', 4, 1, 2),
(25, 'Practical Research 2', 4, 1, 2),
(26, 'Entrepreneurship', 4, 1, 2),
(27, 'Inquiries, Investigations and Immersion', 4, 2, 2),
(28, 'Filipino sa Piling Larangan (TVL)', 4, 2, 2),
(29, 'English for Academic and Professional Purposes', 5, 1, 1),
(30, 'Practical Research 1', 5, 2, 1),
(31, 'Empowerment Technology', 5, 1, 2),
(32, 'Practical Research 2', 5, 1, 2),
(33, 'Entrepreneurship', 5, 1, 2),
(34, 'Inquiries, Investigations and Immersion', 5, 2, 2),
(35, 'Filipino sa Piling Larangan (TVL)', 5, 2, 2),
(36, 'English for Academic and Professional Purposes', 6, 1, 1),
(37, 'Practical Research 1', 6, 2, 1),
(38, 'Empowerment Technology', 6, 1, 2),
(39, 'Practical Research 2', 6, 1, 2),
(40, 'Entrepreneurship', 6, 1, 2),
(41, 'Inquiries, Investigations and Immersion', 6, 2, 2),
(42, 'Filipino sa Piling Larangan (TVL)', 6, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coresubjects`
--

CREATE TABLE IF NOT EXISTS `tbl_coresubjects` (
`coresubject_ID` int(15) NOT NULL,
  `coresubject_name` varchar(255) NOT NULL,
  `sem_ID` int(25) NOT NULL,
  `yearlevel_ID` int(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_coresubjects`
--

INSERT INTO `tbl_coresubjects` (`coresubject_ID`, `coresubject_name`, `sem_ID`, `yearlevel_ID`) VALUES
(1, '21st Century Literature from the Philippines and the World', 1, 1),
(2, 'Earth and Life Science', 1, 1),
(3, 'General Mathematics', 1, 1),
(4, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 1, 1),
(5, 'Oral Communication', 1, 1),
(6, 'Personal Development', 1, 1),
(7, 'Understanding Culture, Society and Politics', 1, 1),
(8, 'Physical Education and Health', 1, 1),
(9, 'Contemporary Philippine Arts from the Region', 1, 2),
(10, 'Introduction to the Philosophy of the Human Person', 1, 2),
(11, 'Physical Education and Health', 1, 2),
(12, 'Media and Information Literacy', 2, 1),
(13, 'Pagbasa at Pagsulat sa Iba''t Ibang Teksto Tungo sa Pananaliksik', 2, 1),
(14, 'Physical Education and Health', 2, 1),
(15, 'Physical Science', 2, 1),
(16, 'Reading and Writing', 2, 1),
(17, 'Statistics and Probability', 2, 1),
(18, 'Physical Education and Health', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grades`
--

CREATE TABLE IF NOT EXISTS `tbl_grades` (
`grades_ID` int(25) NOT NULL,
  `stud_name` varchar(255) NOT NULL,
  `stud_lrn` int(25) NOT NULL,
  `subject_ID` int(25) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `grades` int(25) NOT NULL,
  `stud_average` int(25) NOT NULL,
  `grades_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE IF NOT EXISTS `tbl_section` (
`section_ID` int(25) NOT NULL,
  `section_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_section`
--

INSERT INTO `tbl_section` (`section_ID`, `section_name`) VALUES
(1, 'ABM 11-1'),
(2, 'ABM 11-2'),
(3, 'HUMSS 11-3'),
(4, 'HUMSS 11-4'),
(5, 'GAS 11-5'),
(6, 'CSS 11-6'),
(7, 'Tech-Draft 11-7'),
(8, 'Tech-Draft 11-8');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

CREATE TABLE IF NOT EXISTS `tbl_semester` (
`sem_ID` int(15) NOT NULL,
  `sem_name` varchar(255) NOT NULL,
  `sem_desc` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`sem_ID`, `sem_name`, `sem_desc`) VALUES
(1, 'First', 'First Semester'),
(2, 'Second', 'Second Semester');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_specialsubjects`
--

CREATE TABLE IF NOT EXISTS `tbl_specialsubjects` (
`specialsubject_ID` int(15) NOT NULL,
  `specialsubject_name` varchar(255) NOT NULL,
  `strands_ID` int(15) NOT NULL,
  `sem_ID` int(15) NOT NULL,
  `yearlevel_ID` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_specialsubjects`
--

INSERT INTO `tbl_specialsubjects` (`specialsubject_ID`, `specialsubject_name`, `strands_ID`, `sem_ID`, `yearlevel_ID`) VALUES
(1, 'Applied Economics', 1, 2, 1),
(2, 'Fundamentals of Accountancy, Business, and Management 1', 1, 2, 1),
(3, 'Business Math', 1, 1, 2),
(4, 'Organization and Management', 1, 1, 2),
(5, 'Fundamentals of Accountancy, Business, and Management 2', 1, 1, 2),
(6, 'Principles of Marketing', 1, 2, 2),
(7, 'Business Ethics and Social Responsibility', 1, 2, 2),
(8, 'Business Finance', 1, 2, 2),
(9, 'Work Immersion/ Research/Career Advocacy/Culminating Activity ', 1, 2, 2),
(10, 'Disciplines and Ideas in Social Sciences', 2, 2, 1),
(11, 'Philippine Politics and Governance', 2, 2, 1),
(12, 'Creative Writing/ Malikhaing Pagsulat', 2, 1, 2),
(13, 'Introduction to World Religions and Belief System', 2, 1, 2),
(14, 'Disciplines and Ideas in Applied Social Sciences', 2, 1, 2),
(15, 'Creative Nonfiction: The Literary Essay', 2, 2, 2),
(16, 'Trends, Network and Critical Thinking in the 21st Century', 2, 2, 2),
(17, 'Community Engagement, Solidarity and Citizenship', 2, 2, 2),
(18, 'Work Immersion/Research/Career Advocacy/ Culminating Activity', 2, 2, 2),
(19, 'Discipline and Ideas in the Social Sciences (Social Science 1-HUMSS 7 )', 3, 2, 1),
(20, 'Applied Economics', 3, 2, 1),
(21, 'Organization and Management', 3, 1, 2),
(22, 'Malikhaing Pagsulat (Elective 1)', 3, 1, 2),
(23, 'Introduction to World Religions and Belief Systems (Humanities 1-HUMSS 3)', 3, 1, 2),
(24, 'Trends, Networks and Critical Thinking in the 21st Century (Humanities 2 -HUMSS 4)', 3, 2, 2),
(25, 'Disaster and Readiness and Risk Reduction', 3, 2, 2),
(26, 'Principles of Marketing (Elective 2)', 3, 2, 2),
(27, 'Work Immersion/Research/Career Advocacy/Culminating Activity', 3, 2, 2),
(28, 'CSS', 4, 2, 1),
(29, 'CSS', 4, 1, 2),
(30, 'CSS', 4, 2, 2),
(31, 'Work Immersion / Research / Career Advocacy / Culminating Activity', 4, 2, 2),
(32, 'Technical Drafting', 5, 2, 1),
(33, 'CCS', 5, 2, 1),
(34, 'Technical Drafting', 5, 1, 2),
(35, 'CCS', 5, 1, 2),
(36, 'Technical Drafting', 5, 2, 2),
(37, 'CCS', 5, 2, 2),
(38, 'Work Immersion / Research / Career Advocacy / Culminating Activity', 5, 2, 2),
(39, 'Technical Drafting', 6, 2, 1),
(40, 'Illustration', 6, 2, 1),
(41, 'Technical Drafting', 6, 1, 2),
(42, 'Illustration', 6, 1, 2),
(43, 'Technical Drafting', 6, 2, 2),
(44, 'Illustration', 6, 2, 2),
(45, 'Work Immersion / Research / Career Advocacy / Culminating Activity', 6, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_strands`
--

CREATE TABLE IF NOT EXISTS `tbl_strands` (
`strands_ID` int(25) NOT NULL,
  `strands_name` varchar(255) NOT NULL,
  `strands_desc` varchar(255) NOT NULL,
  `track_ID` int(25) NOT NULL,
  `track_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_strands`
--

INSERT INTO `tbl_strands` (`strands_ID`, `strands_name`, `strands_desc`, `track_ID`, `track_name`) VALUES
(1, 'ABM', 'Accountancy, Business, and Management', 1, 'Academic'),
(2, 'HUMSS', 'Humanities and Social Sciences', 1, 'Academic'),
(3, 'GAS', 'General Academics', 1, 'Academic'),
(4, 'CSS', 'Computer System Servicing', 2, 'TVL'),
(5, 'CCS', 'Contact Center Servicing', 2, 'TVL'),
(6, 'Technical Drafting', 'Technical Drafting', 2, 'TVL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
`stud_ID` int(25) NOT NULL,
  `stud_name` varchar(255) NOT NULL,
  `stud_lrn` bigint(30) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `bday` date NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `student_guardian` varchar(255) NOT NULL,
  `guardian_contact_number` varchar(255) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `student_status` varchar(25) NOT NULL,
  `track_ID` int(25) NOT NULL,
  `strands_ID` int(25) NOT NULL,
  `yearlevel_ID` int(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`stud_ID`, `stud_name`, `stud_lrn`, `email_address`, `sex`, `bday`, `student_address`, `student_guardian`, `guardian_contact_number`, `section_name`, `student_status`, `track_ID`, `strands_ID`, `yearlevel_ID`) VALUES
(1, 'Jason Tadeos', 1001, 'jason@gmail.com', 'Male', '1999-12-01', 'Sta. Cristina 2, Dasma, Cavite', 'Anesia Tadeos', '09152130431', 'CSS 11-6', 'Regular', 2, 2, 1),
(2, 'Gerald Amosco', 1002, 'geraldcantos@gmail.com', 'Male', '2000-11-05', 'Sta. Cristina 2, Dasma, Cavite', 'Carol Cantos', '09152130432', 'CSS 11-6', 'Regular', 2, 2, 1),
(3, 'Mai Odjinar', 1003, 'mai@gmail.com', 'Female', '2000-09-06', 'Victoria Reyes, Dasma, Cavite', 'Virginia Odjinar', '09152130433', 'ABM 11-1', 'Regular', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentaccount`
--

CREATE TABLE IF NOT EXISTS `tbl_studentaccount` (
`studentaccount_ID` int(25) NOT NULL,
  `stud_ID` int(25) NOT NULL,
  `stud_lrn` bigint(25) NOT NULL,
  `stud_password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_studentaccount`
--

INSERT INTO `tbl_studentaccount` (`studentaccount_ID`, `stud_ID`, `stud_lrn`, `stud_password`) VALUES
(1, 1, 1001, '2b877b4b825b48a9a0950dd5bd1f264d'),
(2, 2, 1002, '380891959a0754c24a7ad3525c2d1e77'),
(3, 3, 1003, '2b28587f6d880ea9fc27c6c48fe3f1eb');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE IF NOT EXISTS `tbl_teacher` (
`teacher_ID` int(25) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `teacher_email_address` varchar(255) NOT NULL,
  `teacher_sex` varchar(25) NOT NULL,
  `teacher_bday` date NOT NULL,
  `teacher_address` varchar(255) NOT NULL,
  `teacher_contact_number` varchar(255) NOT NULL,
  `strands_ID` int(25) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `teacher_status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_ID`, `teacher_name`, `teacher_email_address`, `teacher_sex`, `teacher_bday`, `teacher_address`, `teacher_contact_number`, `strands_ID`, `section_name`, `teacher_status`) VALUES
(1, 'Allen Joseph Ong', 'ong@gmail.com', 'Male', '1990-08-15', 'Imus, Cavite', '09152130431', 4, 'CSS 11-6', 'Active'),
(2, 'Proceso Bei', 'bei@gmail.com', 'Female', '1989-02-14', 'General Trias, Cavite', '09152130431', 2, 'HUMSS 11-3', 'Active'),
(3, 'Euniza Velez', 'euniza@gmail.com', 'Female', '1995-09-13', 'San Andres, Dasma, Cavite', '09152130431', 1, 'ABM 11-2', 'Active'),
(4, 'Joy Polo', 'joy@gmail.com', 'Male', '1989-12-15', 'Tierra Verde, Dasma, Cavite', '09128865327', 2, 'ABM 11-1', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacheraccount`
--

CREATE TABLE IF NOT EXISTS `tbl_teacheraccount` (
`teacheraccount_ID` int(25) NOT NULL,
  `teacher_ID` int(25) NOT NULL,
  `teacher_username` varchar(255) NOT NULL,
  `teacher_password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacheraccount`
--

INSERT INTO `tbl_teacheraccount` (`teacheraccount_ID`, `teacher_ID`, `teacher_username`, `teacher_password`) VALUES
(1, 1, 'allen', '072de38f1634641ccbb8cfb25f25b9f5'),
(2, 2, 'bei', '072de38f1634641ccbb8cfb25f25b9f5'),
(3, 3, 'euniza', '072de38f1634641ccbb8cfb25f25b9f5'),
(4, 4, 'joy', '072de38f1634641ccbb8cfb25f25b9f5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracks`
--

CREATE TABLE IF NOT EXISTS `tbl_tracks` (
`track_ID` int(25) NOT NULL,
  `track_name` varchar(255) NOT NULL,
  `track_desc` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tracks`
--

INSERT INTO `tbl_tracks` (`track_ID`, `track_name`, `track_desc`) VALUES
(0, 'N/A', 'Not yet entered'),
(1, 'Academic', 'Academic track'),
(2, 'TVL', 'Technical - Vocational - Livelihood track');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yearlevel`
--

CREATE TABLE IF NOT EXISTS `tbl_yearlevel` (
`yearlevel_ID` int(11) NOT NULL,
  `yearlevel_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_yearlevel`
--

INSERT INTO `tbl_yearlevel` (`yearlevel_ID`, `yearlevel_name`) VALUES
(1, 'Grade 11'),
(2, 'Grade 12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adminaccount`
--
ALTER TABLE `tbl_adminaccount`
 ADD PRIMARY KEY (`adminaccount_ID`);

--
-- Indexes for table `tbl_appliedsubjects`
--
ALTER TABLE `tbl_appliedsubjects`
 ADD PRIMARY KEY (`appliedsubject_ID`);

--
-- Indexes for table `tbl_coresubjects`
--
ALTER TABLE `tbl_coresubjects`
 ADD PRIMARY KEY (`coresubject_ID`);

--
-- Indexes for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
 ADD PRIMARY KEY (`grades_ID`);

--
-- Indexes for table `tbl_section`
--
ALTER TABLE `tbl_section`
 ADD PRIMARY KEY (`section_ID`);

--
-- Indexes for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
 ADD PRIMARY KEY (`sem_ID`);

--
-- Indexes for table `tbl_specialsubjects`
--
ALTER TABLE `tbl_specialsubjects`
 ADD PRIMARY KEY (`specialsubject_ID`);

--
-- Indexes for table `tbl_strands`
--
ALTER TABLE `tbl_strands`
 ADD PRIMARY KEY (`strands_ID`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
 ADD PRIMARY KEY (`stud_ID`);

--
-- Indexes for table `tbl_studentaccount`
--
ALTER TABLE `tbl_studentaccount`
 ADD PRIMARY KEY (`studentaccount_ID`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
 ADD PRIMARY KEY (`teacher_ID`);

--
-- Indexes for table `tbl_teacheraccount`
--
ALTER TABLE `tbl_teacheraccount`
 ADD PRIMARY KEY (`teacheraccount_ID`);

--
-- Indexes for table `tbl_tracks`
--
ALTER TABLE `tbl_tracks`
 ADD PRIMARY KEY (`track_ID`);

--
-- Indexes for table `tbl_yearlevel`
--
ALTER TABLE `tbl_yearlevel`
 ADD PRIMARY KEY (`yearlevel_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adminaccount`
--
ALTER TABLE `tbl_adminaccount`
MODIFY `adminaccount_ID` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_appliedsubjects`
--
ALTER TABLE `tbl_appliedsubjects`
MODIFY `appliedsubject_ID` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tbl_coresubjects`
--
ALTER TABLE `tbl_coresubjects`
MODIFY `coresubject_ID` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
MODIFY `grades_ID` int(25) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
MODIFY `section_ID` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
MODIFY `sem_ID` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_specialsubjects`
--
ALTER TABLE `tbl_specialsubjects`
MODIFY `specialsubject_ID` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tbl_strands`
--
ALTER TABLE `tbl_strands`
MODIFY `strands_ID` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
MODIFY `stud_ID` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_studentaccount`
--
ALTER TABLE `tbl_studentaccount`
MODIFY `studentaccount_ID` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
MODIFY `teacher_ID` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_teacheraccount`
--
ALTER TABLE `tbl_teacheraccount`
MODIFY `teacheraccount_ID` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_tracks`
--
ALTER TABLE `tbl_tracks`
MODIFY `track_ID` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_yearlevel`
--
ALTER TABLE `tbl_yearlevel`
MODIFY `yearlevel_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
