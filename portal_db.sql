-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 03:45 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `portal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminaccount`
--

CREATE TABLE IF NOT EXISTS `tbl_adminaccount` (
`adminaccount_ID` int(25) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email_address` varchar(50) NOT NULL,
  `admin_status` varchar(25) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adminaccount`
--

INSERT INTO `tbl_adminaccount` (`adminaccount_ID`, `admin_name`, `admin_email_address`, `admin_status`, `admin_username`, `admin_password`) VALUES
(1, 'Admin', 'cantos05ge@gmail.com', 'Active', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Ismael Moog', 'itsmegerald05@gmail.com', 'Active', 'ismayl', '818b1d920f322d74552a7510a9277b31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enrolledsubjects`
--

CREATE TABLE IF NOT EXISTS `tbl_enrolledsubjects` (
`es_ID` int(30) NOT NULL,
  `stud_ID` int(30) NOT NULL,
  `stud_lrn` bigint(30) NOT NULL,
  `strands_ID` int(30) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_type` varchar(255) NOT NULL,
  `yearlevel` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `first_grade` varchar(30) NOT NULL,
  `second_grade` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=553 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_enrolledsubjects`
--

INSERT INTO `tbl_enrolledsubjects` (`es_ID`, `stud_ID`, `stud_lrn`, `strands_ID`, `subject_name`, `subject_type`, `yearlevel`, `semester`, `first_grade`, `second_grade`) VALUES
(67, 3, 107918050654, 4, 'Oral Communication', 'Core', 'Grade 11', 'First', '87', '0'),
(68, 3, 107918050654, 4, 'General Mathematics', 'Core', 'Grade 11', 'First', '0', '0'),
(69, 3, 107918050654, 4, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Core', 'Grade 11', 'First', '0', '0'),
(70, 3, 107918050654, 4, 'Earth and Life Science', 'Core', 'Grade 11', 'First', '87', '73'),
(71, 3, 107918050654, 4, 'Understanding Culture, Society, and Politics', 'Core', 'Grade 11', 'First', '0', '0'),
(72, 3, 107918050654, 4, '21st Century Literature from the Philippines and the World', 'Core', 'Grade 11', 'First', '0', '0'),
(73, 3, 107918050654, 4, 'Physical Education and Health', 'Core', 'Grade 11', 'First', '0', '0'),
(74, 3, 107918050654, 4, 'Personal Development', 'Core', 'Grade 11', 'First', '0', '0'),
(75, 3, 107918050654, 4, 'English for Academic and Professional Purposes', 'Applied', 'Grade 11', 'First', '0', '0'),
(76, 3, 107918050654, 4, 'Reading and Writing', 'Core', 'Grade 11', 'Second', '0', '0'),
(77, 3, 107918050654, 4, 'Statistics and Probability', 'Core', 'Grade 11', 'Second', '0', '0'),
(78, 3, 107918050654, 4, 'Pagbasa at Pagsulat sa Ibat-ibang Teksto Tungo sa Pananaliksik', 'Core', 'Grade 11', 'Second', '0', '0'),
(79, 3, 107918050654, 4, 'Physical Science', 'Core', 'Grade 11', 'Second', '0', '0'),
(80, 3, 107918050654, 4, 'Physical Education and Health', 'Core', 'Grade 11', 'Second', '0', '0'),
(81, 3, 107918050654, 4, 'Media and Information Literacy', 'Core', 'Grade 11', 'Second', '0', '0'),
(82, 3, 107918050654, 4, 'Practical Research 1', 'Applied', 'Grade 11', 'Second', '0', '0'),
(83, 3, 107918050654, 4, 'CSS ', 'Specialized', 'Grade 11', 'Second', '0', '0'),
(84, 3, 107918050654, 4, 'Introduction to Philosophy of the Human Person', 'Core', 'Grade 12', 'First', '0', '0'),
(85, 3, 107918050654, 4, 'Contemporary Philippine Arts from the Region', 'Core', 'Grade 12', 'First', '0', '0'),
(86, 3, 107918050654, 4, 'Physical Education and Health', 'Core', 'Grade 12', 'First', '0', '0'),
(87, 3, 107918050654, 4, 'Empowerment Technology', 'Applied', 'Grade 12', 'First', '0', '0'),
(88, 3, 107918050654, 4, 'Practical Research 2', 'Applied', 'Grade 12', 'First', '0', '0'),
(89, 3, 107918050654, 4, 'Entrepreneurship', 'Applied', 'Grade 12', 'First', '0', '0'),
(90, 3, 107918050654, 4, 'CSS', 'Specialized', 'Grade 12', 'First', '0', '0'),
(91, 3, 107918050654, 4, 'Physical Education and Health', 'Core', 'Grade 12', 'Second', '0', '0'),
(92, 3, 107918050654, 4, 'Inquiries, Investigations, and Immersion', 'Applied', 'Grade 12', 'Second', '0', '0'),
(93, 3, 107918050654, 4, 'Filipino sa Piling Larangan', 'Applied', 'Grade 12', 'Second', '0', '0'),
(94, 3, 107918050654, 4, 'CSS ', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(95, 3, 107918050654, 4, 'Work Immersion for CSS', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(96, 4, 107918050780, 4, 'Oral Communication', 'Core', 'Grade 11', 'First', '86', '0'),
(97, 4, 107918050780, 4, 'General Mathematics', 'Core', 'Grade 11', 'First', '0', '0'),
(98, 4, 107918050780, 4, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Core', 'Grade 11', 'First', '0', '0'),
(99, 4, 107918050780, 4, 'Earth and Life Science', 'Core', 'Grade 11', 'First', 'INC', '96'),
(100, 4, 107918050780, 4, 'Understanding Culture, Society, and Politics', 'Core', 'Grade 11', 'First', '0', '0'),
(101, 4, 107918050780, 4, '21st Century Literature from the Philippines and the World', 'Core', 'Grade 11', 'First', '0', '0'),
(102, 4, 107918050780, 4, 'Physical Education and Health', 'Core', 'Grade 11', 'First', '0', '0'),
(103, 4, 107918050780, 4, 'Personal Development', 'Core', 'Grade 11', 'First', '0', '0'),
(104, 4, 107918050780, 4, 'English for Academic and Professional Purposes', 'Applied', 'Grade 11', 'First', '0', '0'),
(105, 4, 107918050780, 4, 'Reading and Writing', 'Core', 'Grade 11', 'Second', '0', '0'),
(106, 4, 107918050780, 4, 'Statistics and Probability', 'Core', 'Grade 11', 'Second', '0', '0'),
(107, 4, 107918050780, 4, 'Pagbasa at Pagsulat sa Ibat-ibang Teksto Tungo sa Pananaliksik', 'Core', 'Grade 11', 'Second', '0', '0'),
(108, 4, 107918050780, 4, 'Physical Science', 'Core', 'Grade 11', 'Second', '0', '0'),
(109, 4, 107918050780, 4, 'Physical Education and Health', 'Core', 'Grade 11', 'Second', '0', '0'),
(110, 4, 107918050780, 4, 'Media and Information Literacy', 'Core', 'Grade 11', 'Second', '0', '0'),
(111, 4, 107918050780, 4, 'Practical Research 1', 'Applied', 'Grade 11', 'Second', '0', '0'),
(112, 4, 107918050780, 4, 'CSS ', 'Specialized', 'Grade 11', 'Second', '0', '0'),
(113, 4, 107918050780, 4, 'Introduction to Philosophy of the Human Person', 'Core', 'Grade 12', 'First', '0', '0'),
(114, 4, 107918050780, 4, 'Contemporary Philippine Arts from the Region', 'Core', 'Grade 12', 'First', '0', '0'),
(115, 4, 107918050780, 4, 'Physical Education and Health', 'Core', 'Grade 12', 'First', '0', '0'),
(116, 4, 107918050780, 4, 'Empowerment Technology', 'Applied', 'Grade 12', 'First', '0', '0'),
(117, 4, 107918050780, 4, 'Practical Research 2', 'Applied', 'Grade 12', 'First', '0', '0'),
(118, 4, 107918050780, 4, 'Entrepreneurship', 'Applied', 'Grade 12', 'First', '0', '0'),
(119, 4, 107918050780, 4, 'CSS', 'Specialized', 'Grade 12', 'First', '0', '0'),
(120, 4, 107918050780, 4, 'Physical Education and Health', 'Core', 'Grade 12', 'Second', '0', '0'),
(121, 4, 107918050780, 4, 'Inquiries, Investigations, and Immersion', 'Applied', 'Grade 12', 'Second', '0', '0'),
(122, 4, 107918050780, 4, 'Filipino sa Piling Larangan', 'Applied', 'Grade 12', 'Second', '0', '0'),
(123, 4, 107918050780, 4, 'CSS ', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(124, 4, 107918050780, 4, 'Work Immersion for CSS', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(125, 5, 107918050123, 4, 'Oral Communication', 'Core', 'Grade 11', 'First', '81', '0'),
(126, 5, 107918050123, 4, 'General Mathematics', 'Core', 'Grade 11', 'First', '0', '0'),
(127, 5, 107918050123, 4, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Core', 'Grade 11', 'First', '0', '0'),
(128, 5, 107918050123, 4, 'Earth and Life Science', 'Core', 'Grade 11', 'First', '95', '90'),
(129, 5, 107918050123, 4, 'Understanding Culture, Society, and Politics', 'Core', 'Grade 11', 'First', '0', '0'),
(130, 5, 107918050123, 4, '21st Century Literature from the Philippines and the World', 'Core', 'Grade 11', 'First', '0', '0'),
(131, 5, 107918050123, 4, 'Physical Education and Health', 'Core', 'Grade 11', 'First', '0', '0'),
(132, 5, 107918050123, 4, 'Personal Development', 'Core', 'Grade 11', 'First', '0', '0'),
(133, 5, 107918050123, 4, 'English for Academic and Professional Purposes', 'Applied', 'Grade 11', 'First', '0', '0'),
(134, 5, 107918050123, 4, 'Reading and Writing', 'Core', 'Grade 11', 'Second', '0', '0'),
(135, 5, 107918050123, 4, 'Statistics and Probability', 'Core', 'Grade 11', 'Second', '0', '0'),
(136, 5, 107918050123, 4, 'Pagbasa at Pagsulat sa Ibat-ibang Teksto Tungo sa Pananaliksik', 'Core', 'Grade 11', 'Second', '0', '0'),
(137, 5, 107918050123, 4, 'Physical Science', 'Core', 'Grade 11', 'Second', '0', '0'),
(138, 5, 107918050123, 4, 'Physical Education and Health', 'Core', 'Grade 11', 'Second', '0', '0'),
(139, 5, 107918050123, 4, 'Media and Information Literacy', 'Core', 'Grade 11', 'Second', '0', '0'),
(140, 5, 107918050123, 4, 'Practical Research 1', 'Applied', 'Grade 11', 'Second', '0', '0'),
(141, 5, 107918050123, 4, 'CSS ', 'Specialized', 'Grade 11', 'Second', '0', '0'),
(142, 5, 107918050123, 4, 'Introduction to Philosophy of the Human Person', 'Core', 'Grade 12', 'First', '0', '0'),
(143, 5, 107918050123, 4, 'Contemporary Philippine Arts from the Region', 'Core', 'Grade 12', 'First', '0', '0'),
(144, 5, 107918050123, 4, 'Physical Education and Health', 'Core', 'Grade 12', 'First', '0', '0'),
(145, 5, 107918050123, 4, 'Empowerment Technology', 'Applied', 'Grade 12', 'First', '0', '0'),
(146, 5, 107918050123, 4, 'Practical Research 2', 'Applied', 'Grade 12', 'First', '0', '0'),
(147, 5, 107918050123, 4, 'Entrepreneurship', 'Applied', 'Grade 12', 'First', '0', '0'),
(148, 5, 107918050123, 4, 'CSS', 'Specialized', 'Grade 12', 'First', '0', '0'),
(149, 5, 107918050123, 4, 'Physical Education and Health', 'Core', 'Grade 12', 'Second', '0', '0'),
(150, 5, 107918050123, 4, 'Inquiries, Investigations, and Immersion', 'Applied', 'Grade 12', 'Second', '0', '0'),
(151, 5, 107918050123, 4, 'Filipino sa Piling Larangan', 'Applied', 'Grade 12', 'Second', '0', '0'),
(152, 5, 107918050123, 4, 'CSS ', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(153, 5, 107918050123, 4, 'Work Immersion for CSS', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(290, 6, 107918050766, 1, 'Oral Communication', 'Core', 'Grade 11', 'First', '91', '0'),
(291, 6, 107918050766, 1, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Core', 'Grade 11', 'First', '0', '0'),
(292, 6, 107918050766, 1, '21st Century Literature from the Philippines and the World', 'Core', 'Grade 11', 'First', '0', '0'),
(293, 6, 107918050766, 1, 'General Mathematics', 'Core', 'Grade 11', 'First', '0', '0'),
(294, 6, 107918050766, 1, 'Earth and Life Science', 'Core', 'Grade 11', 'First', '96', '98'),
(295, 6, 107918050766, 1, 'Personal Development', 'Core', 'Grade 11', 'First', '0', '0'),
(296, 6, 107918050766, 1, 'Understanding Culture, Society, and Politics', 'Core', 'Grade 11', 'First', '0', '0'),
(297, 6, 107918050766, 1, 'Physical Education and Health', 'Core', 'Grade 11', 'First', '0', '0'),
(298, 6, 107918050766, 1, 'English for Academic and Professional Purposes', 'Applied', 'Grade 11', 'First', '0', '0'),
(299, 6, 107918050766, 1, 'Reading and Writing', 'Core', 'Grade 11', 'Second', '0', '0'),
(300, 6, 107918050766, 1, 'Physical Science', 'Core', 'Grade 11', 'Second', '0', '0'),
(301, 6, 107918050766, 1, 'Statistics and Probability', 'Core', 'Grade 11', 'Second', '0', '0'),
(302, 6, 107918050766, 1, 'Media and Information Literacy', 'Core', 'Grade 11', 'Second', '0', '0'),
(303, 6, 107918050766, 1, 'Pagbasa at Pagsulat sa Ibat-ibang Teksto Tungo sa Pananaliksik', 'Core', 'Grade 11', 'Second', '0', '0'),
(304, 6, 107918050766, 1, 'Physical Education and Health', 'Core', 'Grade 11', 'Second', '0', '0'),
(305, 6, 107918050766, 1, 'Practical Research 1', 'Applied', 'Grade 11', 'Second', '0', '0'),
(306, 6, 107918050766, 1, 'Applied Economics', 'Specialized', 'Grade 11', 'Second', '0', '0'),
(307, 6, 107918050766, 1, 'Fundamentals of Accountancy, Business, and Management 1', 'Specialized', 'Grade 11', 'Second', '0', '0'),
(308, 6, 107918050766, 1, 'Contemporary Philippine Arts from the Region', 'Core', 'Grade 12', 'First', '0', '0'),
(309, 6, 107918050766, 1, 'Introduction to the Philosophy of the Human Person', 'Core', 'Grade 12', 'First', '0', '0'),
(310, 6, 107918050766, 1, 'Physical Education and Health', 'Core', 'Grade 12', 'First', '0', '0'),
(311, 6, 107918050766, 1, 'Practical Research 2', 'Applied', 'Grade 12', 'First', '0', '0'),
(312, 6, 107918050766, 1, 'Empowerment Technology', 'Applied', 'Grade 12', 'First', '0', '0'),
(313, 6, 107918050766, 1, 'Entrepreneurship', 'Applied', 'Grade 12', 'First', '0', '0'),
(314, 6, 107918050766, 1, 'Business Math', 'Specialized', 'Grade 12', 'First', '0', '0'),
(315, 6, 107918050766, 1, 'Organization and Management', 'Specialized', 'Grade 12', 'First', '0', '0'),
(316, 6, 107918050766, 1, 'Fundamentals of Accountancy, Business, and Management 2', 'Specialized', 'Grade 12', 'First', '0', '0'),
(317, 6, 107918050766, 1, 'Physical Education and Health', 'Core', 'Grade 12', 'Second', '0', '0'),
(318, 6, 107918050766, 1, 'Research Project', 'Applied', 'Grade 12', 'Second', '0', '0'),
(319, 6, 107918050766, 1, 'Pagsulat sa Filipino sa Piling Larangan', 'Applied', 'Grade 12', 'Second', '0', '0'),
(320, 6, 107918050766, 1, 'Principles of Marketing', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(321, 6, 107918050766, 1, 'Business Ethics and Social Responsibility', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(322, 6, 107918050766, 1, 'Business Finance', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(323, 6, 107918050766, 1, 'Work Immersion for ABM', 'specialized', 'Grade 12', 'Second', '0', '0'),
(324, 7, 107918050098, 1, 'Oral Communication', 'Core', 'Grade 11', 'First', '99', '0'),
(325, 7, 107918050098, 1, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Core', 'Grade 11', 'First', '0', '0'),
(326, 7, 107918050098, 1, '21st Century Literature from the Philippines and the World', 'Core', 'Grade 11', 'First', '0', '0'),
(327, 7, 107918050098, 1, 'General Mathematics', 'Core', 'Grade 11', 'First', '0', '0'),
(328, 7, 107918050098, 1, 'Earth and Life Science', 'Core', 'Grade 11', 'First', '82', '92'),
(329, 7, 107918050098, 1, 'Personal Development', 'Core', 'Grade 11', 'First', '0', '0'),
(330, 7, 107918050098, 1, 'Understanding Culture, Society, and Politics', 'Core', 'Grade 11', 'First', '0', '0'),
(331, 7, 107918050098, 1, 'Physical Education and Health', 'Core', 'Grade 11', 'First', '0', '0'),
(332, 7, 107918050098, 1, 'English for Academic and Professional Purposes', 'Applied', 'Grade 11', 'First', '0', '0'),
(333, 7, 107918050098, 1, 'Reading and Writing', 'Core', 'Grade 11', 'Second', '0', '0'),
(334, 7, 107918050098, 1, 'Physical Science', 'Core', 'Grade 11', 'Second', '0', '0'),
(335, 7, 107918050098, 1, 'Statistics and Probability', 'Core', 'Grade 11', 'Second', '0', '0'),
(336, 7, 107918050098, 1, 'Media and Information Literacy', 'Core', 'Grade 11', 'Second', '0', '0'),
(337, 7, 107918050098, 1, 'Pagbasa at Pagsulat sa Ibat-ibang Teksto Tungo sa Pananaliksik', 'Core', 'Grade 11', 'Second', '0', '0'),
(338, 7, 107918050098, 1, 'Physical Education and Health', 'Core', 'Grade 11', 'Second', '0', '0'),
(339, 7, 107918050098, 1, 'Practical Research 1', 'Applied', 'Grade 11', 'Second', '0', '0'),
(340, 7, 107918050098, 1, 'Applied Economics', 'Specialized', 'Grade 11', 'Second', '0', '0'),
(341, 7, 107918050098, 1, 'Fundamentals of Accountancy, Business, and Management 1', 'Specialized', 'Grade 11', 'Second', '0', '0'),
(342, 7, 107918050098, 1, 'Contemporary Philippine Arts from the Region', 'Core', 'Grade 12', 'First', '0', '0'),
(343, 7, 107918050098, 1, 'Introduction to the Philosophy of the Human Person', 'Core', 'Grade 12', 'First', '0', '0'),
(344, 7, 107918050098, 1, 'Physical Education and Health', 'Core', 'Grade 12', 'First', '0', '0'),
(345, 7, 107918050098, 1, 'Practical Research 2', 'Applied', 'Grade 12', 'First', '0', '0'),
(346, 7, 107918050098, 1, 'Empowerment Technology', 'Applied', 'Grade 12', 'First', '0', '0'),
(347, 7, 107918050098, 1, 'Entrepreneurship', 'Applied', 'Grade 12', 'First', '0', '0'),
(348, 7, 107918050098, 1, 'Business Math', 'Specialized', 'Grade 12', 'First', '0', '0'),
(349, 7, 107918050098, 1, 'Organization and Management', 'Specialized', 'Grade 12', 'First', '0', '0'),
(350, 7, 107918050098, 1, 'Fundamentals of Accountancy, Business, and Management 2', 'Specialized', 'Grade 12', 'First', '0', '0'),
(351, 7, 107918050098, 1, 'Physical Education and Health', 'Core', 'Grade 12', 'Second', '0', '0'),
(352, 7, 107918050098, 1, 'Research Project', 'Applied', 'Grade 12', 'Second', '0', '0'),
(353, 7, 107918050098, 1, 'Pagsulat sa Filipino sa Piling Larangan', 'Applied', 'Grade 12', 'Second', '0', '0'),
(354, 7, 107918050098, 1, 'Principles of Marketing', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(355, 7, 107918050098, 1, 'Business Ethics and Social Responsibility', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(356, 7, 107918050098, 1, 'Business Finance', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(357, 7, 107918050098, 1, 'Work Immersion for ABM', 'specialized', 'Grade 12', 'Second', '0', '0'),
(358, 8, 107918050129, 6, 'Oral Communication', 'Core', 'Grade 11', 'First', 'INC', '0'),
(359, 8, 107918050129, 6, 'General Mathematics', 'Core', 'Grade 11', 'First', '0', '0'),
(360, 8, 107918050129, 6, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Core', 'Grade 11', 'First', '0', '0'),
(361, 8, 107918050129, 6, 'Earth and Life Science', 'Core', 'Grade 11', 'First', '93', '77'),
(362, 8, 107918050129, 6, 'Understanding Culture, Society, and Politics', 'Core ', 'Grade 11', 'First', '0', '0'),
(363, 8, 107918050129, 6, '21st Century Literature from the Philippines and the World', 'Core ', 'Grade 11', 'First', '0', '0'),
(364, 8, 107918050129, 6, 'Physical Education and Health', 'Core', 'Grade 11', 'First', '0', '0'),
(365, 8, 107918050129, 6, 'Personal Development', 'Core', 'Grade 11', 'First', '0', '0'),
(366, 8, 107918050129, 6, 'English for Academic and Professional Purposes', 'Applied', 'Grade 11', 'First', '0', '0'),
(367, 8, 107918050129, 6, 'Reading and Writing', 'Core', 'Grade 11', 'Second', '0', '0'),
(368, 8, 107918050129, 6, 'Statistics and Probability', 'Core', 'Grade 11', 'Second', '0', '0'),
(369, 8, 107918050129, 6, 'Pagbasa at Pagsulat sa Ibat-ibang Teksto Tungo sa Pananaliksik', 'Core', 'Grade 11', 'Second', '0', '0'),
(370, 8, 107918050129, 6, 'Physical Science', 'Core', 'Grade 11', 'Second', '0', '0'),
(371, 8, 107918050129, 6, 'Physical Education and Health', 'Core', 'Grade 11', 'Second', '0', '0'),
(372, 8, 107918050129, 6, 'Media and Information Literacy', 'Core', 'Grade 11', 'Second', '0', '0'),
(373, 8, 107918050129, 6, 'Practical Research 1', 'Applied', 'Grade 11', 'Second', '0', '0'),
(374, 8, 107918050129, 6, 'Tech-Drafting', 'Specialized', 'Grade 11', 'Second', '0', '0'),
(375, 8, 107918050129, 6, 'Illustration', 'Specialized', 'Grade 11', 'Second', '0', '0'),
(376, 8, 107918050129, 6, 'Introduction to Philosophy of the Human Person', 'Core', 'Grade 12', 'First', '0', '0'),
(377, 8, 107918050129, 6, 'Contemporary Philippine Arts from the Region', 'Core', 'Grade 12', 'First', '0', '0'),
(378, 8, 107918050129, 6, 'Physical Education and Health', 'Core', 'Grade 12', 'First', '0', '0'),
(379, 8, 107918050129, 6, 'Empowerment Technology', 'Applied', 'Grade 12', 'First', '0', '0'),
(380, 8, 107918050129, 6, 'Practical Research 2', 'Applied', 'Grade 12', 'First', '0', '0'),
(381, 8, 107918050129, 6, 'Entrepreneurship', 'Applied', 'Grade 12', 'First', '0', '0'),
(382, 8, 107918050129, 6, 'Tech-Drafting', 'Specialized', 'Grade 12', 'First', '0', '0'),
(383, 8, 107918050129, 6, 'Illustration', 'Specialized', 'Grade 12', 'First', '0', '0'),
(384, 8, 107918050129, 6, 'Physical Education and Health', 'Core', 'Grade 12', 'Second', '0', '0'),
(385, 8, 107918050129, 6, 'Inquiries, Investigations, and Immersion', 'Applied', 'Grade 12', 'Second', '0', '0'),
(386, 8, 107918050129, 6, 'Filipino sa Piling Larangan', 'Applied', 'Grade 12', 'Second', '0', '0'),
(387, 8, 107918050129, 6, 'Tech-Drafting', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(388, 8, 107918050129, 6, 'Illustration', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(389, 8, 107918050129, 6, 'Work Immersion for Technical Drafting/Illustration', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(390, 9, 107918123456, 3, 'Oral Communication', 'Core', 'Grade 11', 'First', '92', '0'),
(391, 9, 107918123456, 3, 'General Mathematics', 'Core', 'Grade 11', 'First', '0', '0'),
(392, 9, 107918123456, 3, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Core', 'Grade 11', 'First', '0', '0'),
(393, 9, 107918123456, 3, 'Understanding Culture, Society, and Politics', 'Core', 'Grade 11', 'First', '0', '0'),
(394, 9, 107918123456, 3, 'Personal Development', 'Core', 'Grade 11', 'First', '0', '0'),
(395, 9, 107918123456, 3, 'Earth and Life Science', 'Core', 'Grade 11', 'First', '74', '85'),
(396, 9, 107918123456, 3, '21st Century Literature from the Philippines and the World', 'Core', 'Grade 11', 'First', '0', '0'),
(397, 9, 107918123456, 3, 'Physical Education and Health', 'Core', 'Grade 11', 'First', '0', '0'),
(398, 9, 107918123456, 3, 'English for Academic and Professional Purposes', 'Applied', 'Grade 11', 'First', '0', '0'),
(399, 9, 107918123456, 3, 'Reading and Writing', 'Core', 'Grade 11', 'Second', '0', '0'),
(400, 9, 107918123456, 3, 'Pagbasa at Pagsulat sa Ibat-ibang Teksto Tungo sa Pananaliksik', 'Core', 'Grade 11', 'Second', '0', '0'),
(401, 9, 107918123456, 3, 'Statistics and Probability', 'Core ', 'Grade 11', 'Second', '0', '0'),
(402, 9, 107918123456, 3, 'Physical Education and Health', 'Core', 'Grade 11', 'Second', '0', '0'),
(403, 9, 107918123456, 3, 'Media and Information Literacy', 'Core', 'Grade 11', 'Second', '0', '0'),
(404, 9, 107918123456, 3, 'Physical Science', 'Core', 'Grade 11', 'Second', '0', '0'),
(405, 9, 107918123456, 3, 'Research in Daily Life 1', 'Applied', 'Grade 11', 'Second', '0', '0'),
(406, 9, 107918123456, 3, 'Discipline and Ideas in the Social Sciences', 'Specialized', 'Grade 11', 'Second', '0', '0'),
(407, 9, 107918123456, 3, 'Applied Economics', 'Specialized', 'Grade 11', 'Second', '0', '0'),
(408, 9, 107918123456, 3, 'Physical Education and Health', 'Core', 'Grade 12', 'First', '0', '0'),
(409, 9, 107918123456, 3, 'Contemporary Philippine Arts from the Region', 'Core', 'Grade 12', 'First', '0', '0'),
(410, 9, 107918123456, 3, 'Introduction to the Philosophy of the Human Person', 'Core', 'Grade 12', 'First', '0', '0'),
(411, 9, 107918123456, 3, 'Entrepreneurship', 'Applied', 'Grade 12', 'First', '0', '0'),
(412, 9, 107918123456, 3, 'Research in Daily Life 2', 'Applied', 'Grade 12', 'First', '0', '0'),
(413, 9, 107918123456, 3, 'Empowerment Technology: ICT for Professional Tracks', 'Applied', 'Grade 12', 'First', '0', '0'),
(414, 9, 107918123456, 3, 'Organization and Management', 'Specialized', 'Grade 12', 'First', '0', '0'),
(415, 9, 107918123456, 3, 'Malikhaing Pagsulat (Elective 1)', 'Specialized', 'Grade 12', 'First', '0', '0'),
(416, 9, 107918123456, 3, 'Introduction to World Religions and Belief System', 'Specialized', 'Grade 12', 'First', '0', '0'),
(417, 9, 107918123456, 3, 'Physical Education and Health', 'Core', 'Grade 12', 'Second', '0', '0'),
(418, 9, 107918123456, 3, 'Pagsulat sa Filipino sa Piling Larangan', 'Applied', 'Grade 12', 'Second', '0', '0'),
(419, 9, 107918123456, 3, 'Inquiries, Investigations, and Immersion', 'Applied', 'Grade 12', 'Second', '0', '0'),
(420, 9, 107918123456, 3, 'Trends, Networks, and Critical Thinking in the 21st Century', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(421, 9, 107918123456, 3, 'Disaster and Readiness and Risk Reduction', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(422, 9, 107918123456, 3, 'Principles of Marketing (Elective 2)', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(423, 9, 107918123456, 3, 'Work Immersion for GAS', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(424, 10, 107918050090, 4, 'Oral Communication', 'Core', 'Grade 11', 'First', '88', '0'),
(425, 10, 107918050090, 4, 'General Mathematics', 'Core', 'Grade 11', 'First', '0', '0'),
(426, 10, 107918050090, 4, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Core', 'Grade 11', 'First', '0', '0'),
(427, 10, 107918050090, 4, 'Earth and Life Science', 'Core', 'Grade 11', 'First', '90', '91'),
(428, 10, 107918050090, 4, 'Understanding Culture, Society, and Politics', 'Core', 'Grade 11', 'First', '0', '0'),
(429, 10, 107918050090, 4, '21st Century Literature from the Philippines and the World', 'Core', 'Grade 11', 'First', '0', '0'),
(430, 10, 107918050090, 4, 'Physical Education and Health', 'Core', 'Grade 11', 'First', '0', '0'),
(431, 10, 107918050090, 4, 'Personal Development', 'Core', 'Grade 11', 'First', '0', '0'),
(432, 10, 107918050090, 4, 'English for Academic and Professional Purposes', 'Applied', 'Grade 11', 'First', '0', '0'),
(433, 10, 107918050090, 4, 'Reading and Writing', 'Core', 'Grade 11', 'Second', '0', '0'),
(434, 10, 107918050090, 4, 'Statistics and Probability', 'Core', 'Grade 11', 'Second', '0', '0'),
(435, 10, 107918050090, 4, 'Pagbasa at Pagsulat sa Ibat-ibang Teksto Tungo sa Pananaliksik', 'Core', 'Grade 11', 'Second', '0', '0'),
(436, 10, 107918050090, 4, 'Physical Science', 'Core', 'Grade 11', 'Second', '0', '0'),
(437, 10, 107918050090, 4, 'Physical Education and Health', 'Core', 'Grade 11', 'Second', '0', '0'),
(438, 10, 107918050090, 4, 'Media and Information Literacy', 'Core', 'Grade 11', 'Second', '0', '0'),
(439, 10, 107918050090, 4, 'Practical Research 1', 'Applied', 'Grade 11', 'Second', '0', '0'),
(440, 10, 107918050090, 4, 'CSS ', 'Specialized', 'Grade 11', 'Second', '0', '0'),
(441, 10, 107918050090, 4, 'Introduction to Philosophy of the Human Person', 'Core', 'Grade 12', 'First', '0', '0'),
(442, 10, 107918050090, 4, 'Contemporary Philippine Arts from the Region', 'Core', 'Grade 12', 'First', '0', '0'),
(443, 10, 107918050090, 4, 'Physical Education and Health', 'Core', 'Grade 12', 'First', '0', '0'),
(444, 10, 107918050090, 4, 'Empowerment Technology', 'Applied', 'Grade 12', 'First', '0', '0'),
(445, 10, 107918050090, 4, 'Practical Research 2', 'Applied', 'Grade 12', 'First', '0', '0'),
(446, 10, 107918050090, 4, 'Entrepreneurship', 'Applied', 'Grade 12', 'First', '0', '0'),
(447, 10, 107918050090, 4, 'CSS', 'Specialized', 'Grade 12', 'First', '0', '0'),
(448, 10, 107918050090, 4, 'Physical Education and Health', 'Core', 'Grade 12', 'Second', '0', '0'),
(449, 10, 107918050090, 4, 'Inquiries, Investigations, and Immersion', 'Applied', 'Grade 12', 'Second', '0', '0'),
(450, 10, 107918050090, 4, 'Filipino sa Piling Larangan', 'Applied', 'Grade 12', 'Second', '0', '0'),
(451, 10, 107918050090, 4, 'CSS ', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(452, 10, 107918050090, 4, 'Work Immersion for CSS', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(453, 11, 107918050021, 6, 'Oral Communication', 'Core', 'Grade 11', 'First', '94', '0'),
(454, 11, 107918050021, 6, 'General Mathematics', 'Core', 'Grade 11', 'First', '0', '0'),
(455, 11, 107918050021, 6, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Core', 'Grade 11', 'First', '0', '0'),
(456, 11, 107918050021, 6, 'Earth and Life Science', 'Core', 'Grade 11', 'First', '74', '94'),
(457, 11, 107918050021, 6, 'Understanding Culture, Society, and Politics', 'Core ', 'Grade 11', 'First', '0', '0'),
(458, 11, 107918050021, 6, '21st Century Literature from the Philippines and the World', 'Core ', 'Grade 11', 'First', '0', '0'),
(459, 11, 107918050021, 6, 'Physical Education and Health', 'Core', 'Grade 11', 'First', '0', '0'),
(460, 11, 107918050021, 6, 'Personal Development', 'Core', 'Grade 11', 'First', '0', '0'),
(461, 11, 107918050021, 6, 'English for Academic and Professional Purposes', 'Applied', 'Grade 11', 'First', '0', '0'),
(462, 11, 107918050021, 6, 'Reading and Writing', 'Core', 'Grade 11', 'Second', '0', '0'),
(463, 11, 107918050021, 6, 'Statistics and Probability', 'Core', 'Grade 11', 'Second', '0', '0'),
(464, 11, 107918050021, 6, 'Pagbasa at Pagsulat sa Ibat-ibang Teksto Tungo sa Pananaliksik', 'Core', 'Grade 11', 'Second', '0', '0'),
(465, 11, 107918050021, 6, 'Physical Science', 'Core', 'Grade 11', 'Second', '0', '0'),
(466, 11, 107918050021, 6, 'Physical Education and Health', 'Core', 'Grade 11', 'Second', '0', '0'),
(467, 11, 107918050021, 6, 'Media and Information Literacy', 'Core', 'Grade 11', 'Second', '0', '0'),
(468, 11, 107918050021, 6, 'Practical Research 1', 'Applied', 'Grade 11', 'Second', '0', '0'),
(469, 11, 107918050021, 6, 'Tech-Drafting', 'Specialized', 'Grade 11', 'Second', '0', '0'),
(470, 11, 107918050021, 6, 'Illustration', 'Specialized', 'Grade 11', 'Second', '0', '0'),
(471, 11, 107918050021, 6, 'Introduction to Philosophy of the Human Person', 'Core', 'Grade 12', 'First', '0', '0'),
(472, 11, 107918050021, 6, 'Contemporary Philippine Arts from the Region', 'Core', 'Grade 12', 'First', '0', '0'),
(473, 11, 107918050021, 6, 'Physical Education and Health', 'Core', 'Grade 12', 'First', '0', '0'),
(474, 11, 107918050021, 6, 'Empowerment Technology', 'Applied', 'Grade 12', 'First', '0', '0'),
(475, 11, 107918050021, 6, 'Practical Research 2', 'Applied', 'Grade 12', 'First', '0', '0'),
(476, 11, 107918050021, 6, 'Entrepreneurship', 'Applied', 'Grade 12', 'First', '0', '0'),
(477, 11, 107918050021, 6, 'Tech-Drafting', 'Specialized', 'Grade 12', 'First', '0', '0'),
(478, 11, 107918050021, 6, 'Illustration', 'Specialized', 'Grade 12', 'First', '0', '0'),
(479, 11, 107918050021, 6, 'Physical Education and Health', 'Core', 'Grade 12', 'Second', '0', '0'),
(480, 11, 107918050021, 6, 'Inquiries, Investigations, and Immersion', 'Applied', 'Grade 12', 'Second', '0', '0'),
(481, 11, 107918050021, 6, 'Filipino sa Piling Larangan', 'Applied', 'Grade 12', 'Second', '0', '0'),
(482, 11, 107918050021, 6, 'Tech-Drafting', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(483, 11, 107918050021, 6, 'Illustration', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(484, 11, 107918050021, 6, 'Work Immersion for Technical Drafting/Illustration', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(485, 12, 107918050230, 1, 'Oral Communication', 'Core', 'Grade 11', 'First', '74', '0'),
(486, 12, 107918050230, 1, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Core', 'Grade 11', 'First', '0', '0'),
(487, 12, 107918050230, 1, '21st Century Literature from the Philippines and the World', 'Core', 'Grade 11', 'First', '0', '0'),
(488, 12, 107918050230, 1, 'General Mathematics', 'Core', 'Grade 11', 'First', '0', '0'),
(489, 12, 107918050230, 1, 'Earth and Life Science', 'Core', 'Grade 11', 'First', '90', '71'),
(490, 12, 107918050230, 1, 'Personal Development', 'Core', 'Grade 11', 'First', '0', '0'),
(491, 12, 107918050230, 1, 'Understanding Culture, Society, and Politics', 'Core', 'Grade 11', 'First', '0', '0'),
(492, 12, 107918050230, 1, 'Physical Education and Health', 'Core', 'Grade 11', 'First', '0', '0'),
(493, 12, 107918050230, 1, 'English for Academic and Professional Purposes', 'Applied', 'Grade 11', 'First', '0', '0'),
(494, 12, 107918050230, 1, 'Reading and Writing', 'Core', 'Grade 11', 'Second', '0', '0'),
(495, 12, 107918050230, 1, 'Physical Science', 'Core', 'Grade 11', 'Second', '0', '0'),
(496, 12, 107918050230, 1, 'Statistics and Probability', 'Core', 'Grade 11', 'Second', '0', '0'),
(497, 12, 107918050230, 1, 'Media and Information Literacy', 'Core', 'Grade 11', 'Second', '0', '0'),
(498, 12, 107918050230, 1, 'Pagbasa at Pagsulat sa Ibat-ibang Teksto Tungo sa Pananaliksik', 'Core', 'Grade 11', 'Second', '0', '0'),
(499, 12, 107918050230, 1, 'Physical Education and Health', 'Core', 'Grade 11', 'Second', '0', '0'),
(500, 12, 107918050230, 1, 'Practical Research 1', 'Applied', 'Grade 11', 'Second', '0', '0'),
(501, 12, 107918050230, 1, 'Applied Economics', 'Specialized', 'Grade 11', 'Second', '0', '0'),
(502, 12, 107918050230, 1, 'Fundamentals of Accountancy, Business, and Management 1', 'Specialized', 'Grade 11', 'Second', '0', '0'),
(503, 12, 107918050230, 1, 'Contemporary Philippine Arts from the Region', 'Core', 'Grade 12', 'First', '0', '0'),
(504, 12, 107918050230, 1, 'Introduction to the Philosophy of the Human Person', 'Core', 'Grade 12', 'First', '0', '0'),
(505, 12, 107918050230, 1, 'Physical Education and Health', 'Core', 'Grade 12', 'First', '0', '0'),
(506, 12, 107918050230, 1, 'Practical Research 2', 'Applied', 'Grade 12', 'First', '0', '0'),
(507, 12, 107918050230, 1, 'Empowerment Technology', 'Applied', 'Grade 12', 'First', '0', '0'),
(508, 12, 107918050230, 1, 'Entrepreneurship', 'Applied', 'Grade 12', 'First', '0', '0'),
(509, 12, 107918050230, 1, 'Business Math', 'Specialized', 'Grade 12', 'First', '0', '0'),
(510, 12, 107918050230, 1, 'Organization and Management', 'Specialized', 'Grade 12', 'First', '0', '0'),
(511, 12, 107918050230, 1, 'Fundamentals of Accountancy, Business, and Management 2', 'Specialized', 'Grade 12', 'First', '0', '0'),
(512, 12, 107918050230, 1, 'Physical Education and Health', 'Core', 'Grade 12', 'Second', '0', '0'),
(513, 12, 107918050230, 1, 'Research Project', 'Applied', 'Grade 12', 'Second', '0', '0'),
(514, 12, 107918050230, 1, 'Pagsulat sa Filipino sa Piling Larangan', 'Applied', 'Grade 12', 'Second', '0', '0'),
(515, 12, 107918050230, 1, 'Principles of Marketing', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(516, 12, 107918050230, 1, 'Business Ethics and Social Responsibility', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(517, 12, 107918050230, 1, 'Business Finance', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(518, 12, 107918050230, 1, 'Work Immersion for ABM', 'specialized', 'Grade 12', 'Second', '0', '0'),
(519, 13, 107918050120, 1, 'Oral Communication', 'Core', 'Grade 11', 'First', '95', '0'),
(520, 13, 107918050120, 1, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Core', 'Grade 11', 'First', '0', '0'),
(521, 13, 107918050120, 1, '21st Century Literature from the Philippines and the World', 'Core', 'Grade 11', 'First', '0', '0'),
(522, 13, 107918050120, 1, 'General Mathematics', 'Core', 'Grade 11', 'First', '0', '0'),
(523, 13, 107918050120, 1, 'Earth and Life Science', 'Core', 'Grade 11', 'First', '94', '95'),
(524, 13, 107918050120, 1, 'Personal Development', 'Core', 'Grade 11', 'First', '0', '0'),
(525, 13, 107918050120, 1, 'Understanding Culture, Society, and Politics', 'Core', 'Grade 11', 'First', '0', '0'),
(526, 13, 107918050120, 1, 'Physical Education and Health', 'Core', 'Grade 11', 'First', '0', '0'),
(527, 13, 107918050120, 1, 'English for Academic and Professional Purposes', 'Applied', 'Grade 11', 'First', '0', '0'),
(528, 13, 107918050120, 1, 'Reading and Writing', 'Core', 'Grade 11', 'Second', '0', '0'),
(529, 13, 107918050120, 1, 'Physical Science', 'Core', 'Grade 11', 'Second', '0', '0'),
(530, 13, 107918050120, 1, 'Statistics and Probability', 'Core', 'Grade 11', 'Second', '0', '0'),
(531, 13, 107918050120, 1, 'Media and Information Literacy', 'Core', 'Grade 11', 'Second', '0', '0'),
(532, 13, 107918050120, 1, 'Pagbasa at Pagsulat sa Ibat-ibang Teksto Tungo sa Pananaliksik', 'Core', 'Grade 11', 'Second', '0', '0'),
(533, 13, 107918050120, 1, 'Physical Education and Health', 'Core', 'Grade 11', 'Second', '0', '0'),
(534, 13, 107918050120, 1, 'Practical Research 1', 'Applied', 'Grade 11', 'Second', '0', '0'),
(535, 13, 107918050120, 1, 'Applied Economics', 'Specialized', 'Grade 11', 'Second', '0', '0'),
(536, 13, 107918050120, 1, 'Fundamentals of Accountancy, Business, and Management 1', 'Specialized', 'Grade 11', 'Second', '0', '0'),
(537, 13, 107918050120, 1, 'Contemporary Philippine Arts from the Region', 'Core', 'Grade 12', 'First', '0', '0'),
(538, 13, 107918050120, 1, 'Introduction to the Philosophy of the Human Person', 'Core', 'Grade 12', 'First', '0', '0'),
(539, 13, 107918050120, 1, 'Physical Education and Health', 'Core', 'Grade 12', 'First', '0', '0'),
(540, 13, 107918050120, 1, 'Practical Research 2', 'Applied', 'Grade 12', 'First', '0', '0'),
(541, 13, 107918050120, 1, 'Empowerment Technology', 'Applied', 'Grade 12', 'First', '0', '0'),
(542, 13, 107918050120, 1, 'Entrepreneurship', 'Applied', 'Grade 12', 'First', '0', '0'),
(543, 13, 107918050120, 1, 'Business Math', 'Specialized', 'Grade 12', 'First', '0', '0'),
(544, 13, 107918050120, 1, 'Organization and Management', 'Specialized', 'Grade 12', 'First', '0', '0'),
(545, 13, 107918050120, 1, 'Fundamentals of Accountancy, Business, and Management 2', 'Specialized', 'Grade 12', 'First', '0', '0'),
(546, 13, 107918050120, 1, 'Physical Education and Health', 'Core', 'Grade 12', 'Second', '0', '0'),
(547, 13, 107918050120, 1, 'Research Project', 'Applied', 'Grade 12', 'Second', '0', '0'),
(548, 13, 107918050120, 1, 'Pagsulat sa Filipino sa Piling Larangan', 'Applied', 'Grade 12', 'Second', '0', '0'),
(549, 13, 107918050120, 1, 'Principles of Marketing', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(550, 13, 107918050120, 1, 'Business Ethics and Social Responsibility', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(551, 13, 107918050120, 1, 'Business Finance', 'Specialized', 'Grade 12', 'Second', '0', '0'),
(552, 13, 107918050120, 1, 'Work Immersion for ABM', 'specialized', 'Grade 12', 'Second', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_error`
--

CREATE TABLE IF NOT EXISTS `tbl_error` (
`stud_ID` int(25) NOT NULL,
  `stud_firstname` varchar(255) NOT NULL,
  `stud_middleinitial` varchar(5) NOT NULL,
  `stud_lastname` varchar(255) NOT NULL,
  `stud_lrn` bigint(30) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `bday` date NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `student_guardian` varchar(255) NOT NULL,
  `guardian_contact_number` varchar(255) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `student_status` varchar(25) NOT NULL,
  `track_desc` varchar(255) NOT NULL,
  `strands_name` varchar(255) NOT NULL,
  `yearlevel_name` varchar(255) NOT NULL,
  `schoolyear` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schoolyear`
--

CREATE TABLE IF NOT EXISTS `tbl_schoolyear` (
`schoolyear_id` int(11) NOT NULL,
  `schoolyear_desc` varchar(255) NOT NULL,
  `schoolyear_status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_schoolyear`
--

INSERT INTO `tbl_schoolyear` (`schoolyear_id`, `schoolyear_desc`, `schoolyear_status`) VALUES
(1, '2021-2022', 'Active'),
(2, '2022-2023', 'Inactive'),
(3, '2030-2031', 'Inactive'),
(4, '2100-2101', 'Inactive'),
(5, '3000-3001', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE IF NOT EXISTS `tbl_section` (
`section_ID` int(25) NOT NULL,
  `section_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_section`
--

INSERT INTO `tbl_section` (`section_ID`, `section_name`) VALUES
(0, 'No handled section'),
(1, 'ABM 11 - 1'),
(2, 'ABM 11 - 2'),
(3, 'HUMSS 11 - 3'),
(4, 'HUMSS 11 - 4'),
(5, 'GAS 11 - 5'),
(6, 'CSS 11 - 6'),
(7, 'CCS 11 - 7'),
(8, 'Tech - Drafting 11 - 8'),
(9, 'Tech - Drafting 11 - 9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

CREATE TABLE IF NOT EXISTS `tbl_semester` (
`sem_ID` int(15) NOT NULL,
  `sem_name` varchar(255) NOT NULL,
  `sem_desc` varchar(255) NOT NULL,
  `sem_status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`sem_ID`, `sem_name`, `sem_desc`, `sem_status`) VALUES
(1, 'First', 'First Semester', 'Active'),
(2, 'Second', 'Second Semester', 'Inactive');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_strands`
--

INSERT INTO `tbl_strands` (`strands_ID`, `strands_name`, `strands_desc`, `track_ID`, `track_name`) VALUES
(0, 'No specific strand', 'No specific strand', 0, 'NA'),
(1, 'ABM', 'Accountancy, Business, and Management', 1, 'Academic'),
(2, 'HUMSS', 'Humanities and Social Sciences', 1, 'Academic'),
(3, 'GAS', 'General Academics', 1, 'Academic'),
(4, 'CSS', 'Computer System Servicing', 2, 'TVL'),
(5, 'CCS', 'Contact Center Servicing', 2, 'TVL'),
(6, 'Technical Drafting', 'Technical Drafting', 2, 'TVL'),
(7, 'Farm', 'Farming', 3, 'Agri'),
(8, 'Sample Strand', 'Sample Strand Name', 4, 'Sample Track');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
`stud_ID` int(25) NOT NULL,
  `stud_firstname` varchar(255) NOT NULL,
  `stud_middleinitial` varchar(5) NOT NULL,
  `stud_lastname` varchar(255) NOT NULL,
  `stud_lrn` bigint(30) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `bday` date NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `student_guardian` varchar(255) NOT NULL,
  `guardian_contact_number` varchar(255) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `student_status` varchar(25) NOT NULL,
  `track_desc` varchar(255) NOT NULL,
  `strands_name` varchar(255) NOT NULL,
  `yearlevel_name` varchar(255) NOT NULL,
  `schoolyear` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`stud_ID`, `stud_firstname`, `stud_middleinitial`, `stud_lastname`, `stud_lrn`, `email_address`, `sex`, `bday`, `student_address`, `student_guardian`, `guardian_contact_number`, `section_name`, `student_status`, `track_desc`, `strands_name`, `yearlevel_name`, `schoolyear`) VALUES
(3, 'Jason', 'C', 'Tadeos', 107918050654, 'jason.tadeos@cvsu.edu.ph', 'Male', '1999-12-01', 'Santa Cristina 2, Dasma, Cavite', 'Anesia Tadeos', '09152030784', 'Tech - Drafting 11 - 8', 'Regular', 'Technical-Vocational-Livelihood track', 'CSS', 'Grade 11', '2021-2022'),
(4, 'Gerald', 'C', 'Amosco', 107918050780, 'tadeosjason@gmail.com', 'Male', '1999-11-05', 'Santa Cristina 2, Dasma, Cavite', 'Carol Cantos', '09128865329', 'CSS 11 - 6', 'Regular', 'Technical-Vocational-Livelihood track', 'CSS', 'Grade 11', '2022-2023'),
(5, 'Eugene', 'D', 'Calub', 107918050123, 'tadeosjason@gmail.com', 'Male', '1999-12-12', 'Santa Cristina 2, Dasma, Cavite', 'Mama ni Eugene', '09128865324', 'CSS 11 - 6', 'Regular', 'Technical-Vocational-Livelihood track', 'CSS', 'Grade 11', '2021-2022'),
(6, 'JM', 'C', 'Amosco', 107918050766, 'tadeosjason@gmail.com', 'Male', '1999-03-12', 'Santa Cristina 2, Dasma, Cavite', 'Sample guardian', '09128865327', 'ABM 11 - 1', 'Regular', 'Academic track', 'ABM', 'Grade 11', '2021-2022'),
(7, 'Hanna', 'O', 'Ibarra', 107918050098, 'tadeosjason@gmail.com', 'Female', '2002-03-13', 'Victoria Reyes, Dasma, Cavite', 'Virginia Odjinar', '09472939847', 'ABM 11 - 1', 'Regular', 'Academic track', 'ABM', 'Grade 11', '2021-2022'),
(8, 'Enteng', 'K', 'Kabisote', 107918050129, 'tadeosjason@gmail.com', 'Male', '1999-01-12', 'Santa Cristina 2, Dasma, Cavite', 'Ate Beth', '09452120321', 'Tech - Drafting 11 - 8', 'Regular', 'Technical-Vocational-Livelihood track', 'Technical Drafting', 'Grade 11', '2021-2022'),
(9, 'Migs', '', 'Zubiri', 107918123456, 'jason.tadeos@cvsu.edu.ph', 'Male', '1998-07-13', 'Santa Cristina 2, Dasma, Cavite', 'Mama ni Migs', '09128865324', 'GAS 11 - 5', 'Regular', 'Academic track', 'GAS', 'Grade 11', '2021-2022'),
(10, 'Christian May', 'P', 'Toledo', 107918050090, 'jason.tadeos@cvsu.edu.ph', 'Male', '1999-11-11', 'Victoria Reyes, Dasma, Cavite', 'Maynard Toledo', '09128865321', 'CSS 11 - 6', 'Regular', 'Technical-Vocational-Livelihood track', 'CSS', 'Grade 11', '2021-2022'),
(11, 'Mark Angelo', 'A', 'Julianda', 107918050021, 'jason.tadeos@cvsu.edu.ph', 'Male', '1999-10-26', 'San Andres 2, Dasma. Cavite', 'Marissa Julianda', '09458653241', 'Tech - Drafting 11 - 8', 'Regular', 'Technical-Vocational-Livelihood track', 'Technical Drafting', 'Grade 11', '2021-2022'),
(12, 'Peter ', 'P', 'Pan', 107918050230, 'tadeosjason@gmail.com', 'Male', '1998-12-12', 'Santa Cristina 2, Dasma, Cavite', 'Elicia Pan', '09128865327', 'ABM 11 - 1', 'Regular', 'Academic track', 'ABM', 'Grade 11', '2021-2022'),
(13, 'Steph', 'C', 'Curry', 107918050120, 'tadeosjason@gmail.com', 'Male', '1999-03-12', 'Santa Cristina 2, DasmariÃ±as City, Cavite', 'Elizabeth Currey', '09128865327', 'ABM 11 - 1', 'Regular', 'Academic track', 'ABM', 'Grade 11', '2021-2022');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentaccount`
--

CREATE TABLE IF NOT EXISTS `tbl_studentaccount` (
`studentaccount_ID` int(25) NOT NULL,
  `email_address` text NOT NULL,
  `stud_ID` int(25) NOT NULL,
  `stud_lrn` bigint(25) NOT NULL,
  `stud_password` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_studentaccount`
--

INSERT INTO `tbl_studentaccount` (`studentaccount_ID`, `email_address`, `stud_ID`, `stud_lrn`, `stud_password`, `code`) VALUES
(3, 'jason.tadeos@cvsu.edu.ph', 3, 107918050654, 'cc23cb85517ecef99f6547fa8d73d625', 'TW63412F5U'),
(4, 'tadeosjason@gmail.com', 4, 107918050780, '97939929db91793e9e61f49df7444597', ''),
(5, 'tadeosjason@gmail.com', 5, 107918050123, '9bfb6815899dd3e46131350d3d589f62', ''),
(6, 'tadeosjason@gmail.com', 6, 107918050766, '996430afb4774ee4b088babc18b93061', ''),
(7, 'tadeosjason@gmail.com', 7, 107918050098, 'efed8af4cfaa6ecbd917678752d6d1f3', ''),
(8, 'tadeosjason@gmail.com', 8, 107918050129, '67b9a45039f60c178b7c8855398bc932', ''),
(9, 'jason.tadeos@cvsu.edu.ph', 9, 107918123456, '4cd3cc79864e2828a625f839bbc67f02', ''),
(10, 'jason.tadeos@cvsu.edu.ph', 10, 107918050090, 'e43e9c7f2fc77a4984edd9598e040762', ''),
(11, 'jason.tadeos@cvsu.edu.ph', 11, 107918050021, '294712b534c8649964d4180e390ff312', ''),
(12, 'tadeosjason@gmail.com', 12, 107918050230, '03d9a31c9e0f7281de7b259f3b5ec9ab', ''),
(13, 'tadeosjason@gmail.com', 13, 107918050120, 'da15b3e27a387fe4cdb01e777627e4c8', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE IF NOT EXISTS `tbl_subjects` (
`subject_ID` int(30) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_type` varchar(255) NOT NULL,
  `strands_ID` int(30) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `yearlevel` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=289 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`subject_ID`, `subject_name`, `subject_type`, `strands_ID`, `semester`, `yearlevel`) VALUES
(1, 'Oral Communication', 'Core', 1, 'First', 'Grade 11'),
(2, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Core', 1, 'First', 'Grade 11'),
(3, '21st Century Literature from the Philippines and the World', 'Core', 1, 'First', 'Grade 11'),
(4, 'General Mathematics', 'Core', 1, 'First', 'Grade 11'),
(5, 'Earth and Life Science', 'Core', 1, 'First', 'Grade 11'),
(6, 'Personal Development', 'Core', 1, 'First', 'Grade 11'),
(7, 'Understanding Culture, Society, and Politics', 'Core', 1, 'First', 'Grade 11'),
(8, 'Physical Education and Health', 'Core', 1, 'First', 'Grade 11'),
(9, 'English for Academic and Professional Purposes', 'Applied', 1, 'First', 'Grade 11'),
(10, 'Reading and Writing', 'Core', 1, 'Second', 'Grade 11'),
(11, 'Physical Science', 'Core', 1, 'Second', 'Grade 11'),
(12, 'Statistics and Probability', 'Core', 1, 'Second', 'Grade 11'),
(13, 'Media and Information Literacy', 'Core', 1, 'Second', 'Grade 11'),
(14, 'Pagbasa at Pagsulat sa Ibat-ibang Teksto Tungo sa Pananaliksik', 'Core', 1, 'Second', 'Grade 11'),
(15, 'Physical Education and Health', 'Core', 1, 'Second', 'Grade 11'),
(16, 'Practical Research 1', 'Applied', 1, 'Second', 'Grade 11'),
(17, 'Applied Economics', 'Specialized', 1, 'Second', 'Grade 11'),
(18, 'Fundamentals of Accountancy, Business, and Management 1', 'Specialized', 1, 'Second', 'Grade 11'),
(19, 'Contemporary Philippine Arts from the Region', 'Core', 1, 'First', 'Grade 12'),
(20, 'Introduction to the Philosophy of the Human Person', 'Core', 1, 'First', 'Grade 12'),
(21, 'Physical Education and Health', 'Core', 1, 'First', 'Grade 12'),
(22, 'Practical Research 2', 'Applied', 1, 'First', 'Grade 12'),
(23, 'Empowerment Technology', 'Applied', 1, 'First', 'Grade 12'),
(24, 'Entrepreneurship', 'Applied', 1, 'First', 'Grade 12'),
(25, 'Business Math', 'Specialized', 1, 'First', 'Grade 12'),
(26, 'Organization and Management', 'Specialized', 1, 'First', 'Grade 12'),
(27, 'Fundamentals of Accountancy, Business, and Management 2', 'Specialized', 1, 'First', 'Grade 12'),
(28, 'Physical Education and Health', 'Core', 1, 'Second', 'Grade 12'),
(29, 'Research Project', 'Applied', 1, 'Second', 'Grade 12'),
(30, 'Pagsulat sa Filipino sa Piling Larangan', 'Applied', 1, 'Second', 'Grade 12'),
(31, 'Principles of Marketing', 'Specialized', 1, 'Second', 'Grade 12'),
(32, 'Business Ethics and Social Responsibility', 'Specialized', 1, 'Second', 'Grade 12'),
(33, 'Business Finance', 'Specialized', 1, 'Second', 'Grade 12'),
(34, 'Work Immersion for ABM', 'specialized', 1, 'Second', 'Grade 12'),
(35, 'Oral Communication', 'Core', 2, 'First', 'Grade 11'),
(36, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Core', 2, 'First', 'Grade 11'),
(37, '21st Century Literature from the Philippines and the World', 'Core', 2, 'First', 'Grade 11'),
(38, 'General Mathematics', 'Core', 2, 'First', 'Grade 11'),
(39, 'Earth and Life Science', 'Core', 2, 'First', 'Grade 11'),
(40, 'Personal Development', 'Core', 2, 'First', 'Grade 11'),
(41, 'Understanding the Culture, Society, and Politics', 'Core', 2, 'First', 'Grade 11'),
(42, 'Physical Education and Health', 'Core', 2, 'First', 'Grade 11'),
(43, 'English for Academic and Professional Purposes', 'Applied', 2, 'First', 'Grade 11'),
(44, 'Reading and Writing', 'Core', 2, 'Second', 'Grade 11'),
(45, 'Pagbasa at Pagsulat sa Ibat-ibang Teksto Tungo sa Pananaliksik', 'Core', 2, 'Second', 'Grade 11'),
(46, 'Media and Information Literacy', 'Core', 2, 'Second', 'Grade 11'),
(47, 'Statistics and Probability', 'Core', 2, 'Second', 'Grade 11'),
(48, 'Physical Science', 'Core', 2, 'Second', 'Grade 11'),
(49, 'Physical Education and Health', 'Core', 2, 'Second', 'Grade 11'),
(50, 'Practical Research 1', 'Applied', 2, 'Second', 'Grade 11'),
(51, 'Disciplines and Ideas in Social Sciences', 'Specialized', 2, 'Second', 'Grade 11'),
(52, 'Philippine Politics and Governance', 'Specialized', 2, 'Second', 'Grade 11'),
(53, 'Contemporary Philippine Arts from the Region', 'Core', 2, 'First', 'Grade 12'),
(54, 'Introduction to the Philosophy of the Human Person', 'Core', 2, 'First', 'Grade 12'),
(55, 'Physical Education and Health', 'Core', 2, 'First', 'Grade 12'),
(56, 'Practical Research 2', 'Applied', 2, 'First', 'Grade 12'),
(57, 'Entrepreneurship', 'Applied', 2, 'First', 'Grade 12'),
(58, 'Empowerment Technology', 'Applied', 2, 'First', 'Grade 12'),
(59, 'Creative Writing/Malikhaing Pagsulat', 'Specialized', 2, 'First', 'Grade 12'),
(60, 'Introduction to World Religions and Belief System', 'Specialized', 2, 'First', 'Grade 12'),
(61, 'Disciplines and Ideas in Applied Social Sciences', 'Specialized', 2, 'First', 'Grade 12'),
(62, 'Physical Education and Health', 'Core', 2, 'Second', 'Grade 12'),
(63, 'Filipino sa Piling Larangan', 'Applied', 2, 'Second', 'Grade 12'),
(64, 'Inquiries, Investigations, Immersion', 'Applied', 2, 'Second', 'Grade 12'),
(65, 'Creative Nonfiction: The Literary Essay', 'Specialized', 2, 'Second', 'Grade 12'),
(66, 'Trends, Network, and Critical Thinking in the 21st Century', 'Specialized', 2, 'Second', 'Grade 12'),
(67, 'Community Engagement, Solidarity, and Citizenship', 'Specialized', 2, 'Second', 'Grade 12'),
(68, 'Work Immersion for HUMSS', 'Specialized', 2, 'Second', 'Grade 12'),
(98, 'Oral Communication', 'Core', 3, 'First', 'Grade 11'),
(99, 'General Mathematics', 'Core', 3, 'First', 'Grade 11'),
(100, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Core', 3, 'First', 'Grade 11'),
(101, 'Understanding Culture, Society, and Politics', 'Core', 3, 'First', 'Grade 11'),
(102, 'Personal Development', 'Core', 3, 'First', 'Grade 11'),
(103, 'Earth and Life Science', 'Core', 3, 'First', 'Grade 11'),
(104, '21st Century Literature from the Philippines and the World', 'Core', 3, 'First', 'Grade 11'),
(105, 'Physical Education and Health', 'Core', 3, 'First', 'Grade 11'),
(106, 'English for Academic and Professional Purposes', 'Applied', 3, 'First', 'Grade 11'),
(107, 'Reading and Writing', 'Core', 3, 'Second', 'Grade 11'),
(108, 'Pagbasa at Pagsulat sa Ibat-ibang Teksto Tungo sa Pananaliksik', 'Core', 3, 'Second', 'Grade 11'),
(109, 'Statistics and Probability', 'Core ', 3, 'Second', 'Grade 11'),
(110, 'Physical Education and Health', 'Core', 3, 'Second', 'Grade 11'),
(111, 'Media and Information Literacy', 'Core', 3, 'Second', 'Grade 11'),
(112, 'Physical Science', 'Core', 3, 'Second', 'Grade 11'),
(113, 'Research in Daily Life 1', 'Applied', 3, 'Second', 'Grade 11'),
(114, 'Discipline and Ideas in the Social Sciences', 'Specialized', 3, 'Second', 'Grade 11'),
(115, 'Applied Economics', 'Specialized', 3, 'Second', 'Grade 11'),
(116, 'Physical Education and Health', 'Core', 3, 'First', 'Grade 12'),
(117, 'Contemporary Philippine Arts from the Region', 'Core', 3, 'First', 'Grade 12'),
(118, 'Introduction to the Philosophy of the Human Person', 'Core', 3, 'First', 'Grade 12'),
(119, 'Entrepreneurship', 'Applied', 3, 'First', 'Grade 12'),
(120, 'Research in Daily Life 2', 'Applied', 3, 'First', 'Grade 12'),
(121, 'Empowerment Technology: ICT for Professional Tracks', 'Applied', 3, 'First', 'Grade 12'),
(122, 'Organization and Management', 'Specialized', 3, 'First', 'Grade 12'),
(123, 'Malikhaing Pagsulat (Elective 1)', 'Specialized', 3, 'First', 'Grade 12'),
(124, 'Introduction to World Religions and Belief System', 'Specialized', 3, 'First', 'Grade 12'),
(125, 'Physical Education and Health', 'Core', 3, 'Second', 'Grade 12'),
(126, 'Pagsulat sa Filipino sa Piling Larangan', 'Applied', 3, 'Second', 'Grade 12'),
(127, 'Inquiries, Investigations, and Immersion', 'Applied', 3, 'Second', 'Grade 12'),
(128, 'Trends, Networks, and Critical Thinking in the 21st Century', 'Specialized', 3, 'Second', 'Grade 12'),
(129, 'Disaster and Readiness and Risk Reduction', 'Specialized', 3, 'Second', 'Grade 12'),
(130, 'Principles of Marketing (Elective 2)', 'Specialized', 3, 'Second', 'Grade 12'),
(131, 'Work Immersion for GAS', 'Specialized', 3, 'Second', 'Grade 12'),
(161, 'Oral Communication', 'Core', 4, 'First', 'Grade 11'),
(162, 'General Mathematics', 'Core', 4, 'First', 'Grade 11'),
(163, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Core', 4, 'First', 'Grade 11'),
(164, 'Earth and Life Science', 'Core', 4, 'First', 'Grade 11'),
(165, 'Understanding Culture, Society, and Politics', 'Core', 4, 'First', 'Grade 11'),
(166, '21st Century Literature from the Philippines and the World', 'Core', 4, 'First', 'Grade 11'),
(167, 'Physical Education and Health', 'Core', 4, 'First', 'Grade 11'),
(168, 'Personal Development', 'Core', 4, 'First', 'Grade 11'),
(169, 'English for Academic and Professional Purposes', 'Applied', 4, 'First', 'Grade 11'),
(170, 'Reading and Writing', 'Core', 4, 'Second', 'Grade 11'),
(171, 'Statistics and Probability', 'Core', 4, 'Second', 'Grade 11'),
(172, 'Pagbasa at Pagsulat sa Ibat-ibang Teksto Tungo sa Pananaliksik', 'Core', 4, 'Second', 'Grade 11'),
(173, 'Physical Science', 'Core', 4, 'Second', 'Grade 11'),
(174, 'Physical Education and Health', 'Core', 4, 'Second', 'Grade 11'),
(175, 'Media and Information Literacy', 'Core', 4, 'Second', 'Grade 11'),
(176, 'Practical Research 1', 'Applied', 4, 'Second', 'Grade 11'),
(177, 'CSS ', 'Specialized', 4, 'Second', 'Grade 11'),
(178, 'Introduction to Philosophy of the Human Person', 'Core', 4, 'First', 'Grade 12'),
(179, 'Contemporary Philippine Arts from the Region', 'Core', 4, 'First', 'Grade 12'),
(180, 'Physical Education and Health', 'Core', 4, 'First', 'Grade 12'),
(181, 'Empowerment Technology', 'Applied', 4, 'First', 'Grade 12'),
(182, 'Practical Research 2', 'Applied', 4, 'First', 'Grade 12'),
(183, 'Entrepreneurship', 'Applied', 4, 'First', 'Grade 12'),
(184, 'CSS', 'Specialized', 4, 'First', 'Grade 12'),
(185, 'Physical Education and Health', 'Core', 4, 'Second', 'Grade 12'),
(186, 'Inquiries, Investigations, and Immersion', 'Applied', 4, 'Second', 'Grade 12'),
(187, 'Filipino sa Piling Larangan', 'Applied', 4, 'Second', 'Grade 12'),
(188, 'CSS ', 'Specialized', 4, 'Second', 'Grade 12'),
(189, 'Work Immersion for CSS', 'Specialized', 4, 'Second', 'Grade 12'),
(192, 'Oral Communication', 'Core', 5, 'First', 'Grade 11'),
(193, 'General Mathematics', 'Core', 5, 'First', 'Grade 11'),
(194, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Core', 5, 'First', 'Grade 11'),
(195, 'Earth and Life Science', 'Core', 5, 'First', 'Grade 11'),
(196, 'Understanding Culture, Society, and Politics', 'Core', 5, 'First', 'Grade 11'),
(197, '21st Century Literature from the Philippines and the World', 'Core ', 5, 'First', 'Grade 11'),
(198, 'Physical Education and Health', 'Core', 5, 'First', 'Grade 11'),
(199, 'Personal Development', 'Core', 5, 'First', 'Grade 11'),
(200, 'English for Academic and Professional Purposes', 'Applied', 5, 'First', 'Grade 11'),
(201, 'Reading and Writing', 'Core', 5, 'Second', 'Grade 11'),
(202, 'Statistics and Probability', 'Core', 5, 'Second', 'Grade 11'),
(203, 'Pagbasa at Pagsulat sa Ibat-ibang Teksto Tungo sa Pananaliksik', 'Core', 5, 'Second', 'Grade 11'),
(204, 'Physical Science', 'Core', 5, 'Second', 'Grade 11'),
(205, 'Physical Education and Health', 'Core', 5, 'Second', 'Grade 11'),
(206, 'Media and Information Literacy', 'Core', 5, 'Second', 'Grade 11'),
(207, 'Practical Research 1', 'Applied', 5, 'Second', 'Grade 11'),
(208, 'Tech-Drafting', 'Specialized', 5, 'Second', 'Grade 11'),
(209, 'CCS', 'Specialized', 5, 'Second', 'Grade 11'),
(210, 'Introduction to Philosophy of the Human Person', 'Core', 5, 'First', 'Grade 12'),
(211, 'Contemporary Philippine Arts from the Region', 'Core', 5, 'First', 'Grade 12'),
(212, 'Physical Education and Health', 'Core', 5, 'First', 'Grade 12'),
(213, 'Empowerment Technology', 'Applied', 5, 'First', 'Grade 12'),
(214, 'Practical Research 2', 'Applied', 5, 'First', 'Grade 12'),
(215, 'Entrepreneurship', 'Applied', 5, 'First', 'Grade 12'),
(216, 'Tech-Drafting', 'Specialized', 5, 'First', 'Grade 12'),
(217, 'CCS', 'Specialized', 5, 'First', 'Grade 12'),
(218, 'Physical Education and Health', 'Core', 5, 'Second', 'Grade 12'),
(219, 'Inquiries, Investigations, and Immersion', 'Applied', 5, 'Second', 'Grade 12'),
(220, 'Filipino sa Piling Larangan', 'Applied', 5, 'Second', 'Grade 12'),
(221, 'Tech-Drafting', 'Specialized', 5, 'Second', 'Grade 12'),
(222, 'CCS', 'Specialized', 5, 'Second', 'Grade 12'),
(223, 'Work Immersion for CCS', 'Specialized', 5, 'Second', 'Grade 12'),
(255, 'Oral Communication', 'Core', 6, 'First', 'Grade 11'),
(256, 'General Mathematics', 'Core', 6, 'First', 'Grade 11'),
(257, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Core', 6, 'First', 'Grade 11'),
(258, 'Earth and Life Science', 'Core', 6, 'First', 'Grade 11'),
(259, 'Understanding Culture, Society, and Politics', 'Core ', 6, 'First', 'Grade 11'),
(260, '21st Century Literature from the Philippines and the World', 'Core ', 6, 'First', 'Grade 11'),
(261, 'Physical Education and Health', 'Core', 6, 'First', 'Grade 11'),
(262, 'Personal Development', 'Core', 6, 'First', 'Grade 11'),
(263, 'English for Academic and Professional Purposes', 'Applied', 6, 'First', 'Grade 11'),
(264, 'Reading and Writing', 'Core', 6, 'Second', 'Grade 11'),
(265, 'Statistics and Probability', 'Core', 6, 'Second', 'Grade 11'),
(266, 'Pagbasa at Pagsulat sa Ibat-ibang Teksto Tungo sa Pananaliksik', 'Core', 6, 'Second', 'Grade 11'),
(267, 'Physical Science', 'Core', 6, 'Second', 'Grade 11'),
(268, 'Physical Education and Health', 'Core', 6, 'Second', 'Grade 11'),
(269, 'Media and Information Literacy', 'Core', 6, 'Second', 'Grade 11'),
(270, 'Practical Research 1', 'Applied', 6, 'Second', 'Grade 11'),
(271, 'Tech-Drafting', 'Specialized', 6, 'Second', 'Grade 11'),
(272, 'Illustration', 'Specialized', 6, 'Second', 'Grade 11'),
(273, 'Introduction to Philosophy of the Human Person', 'Core', 6, 'First', 'Grade 12'),
(274, 'Contemporary Philippine Arts from the Region', 'Core', 6, 'First', 'Grade 12'),
(275, 'Physical Education and Health', 'Core', 6, 'First', 'Grade 12'),
(276, 'Empowerment Technology', 'Applied', 6, 'First', 'Grade 12'),
(277, 'Practical Research 2', 'Applied', 6, 'First', 'Grade 12'),
(278, 'Entrepreneurship', 'Applied', 6, 'First', 'Grade 12'),
(279, 'Tech-Drafting', 'Specialized', 6, 'First', 'Grade 12'),
(280, 'Illustration', 'Specialized', 6, 'First', 'Grade 12'),
(281, 'Physical Education and Health', 'Core', 6, 'Second', 'Grade 12'),
(282, 'Inquiries, Investigations, and Immersion', 'Applied', 6, 'Second', 'Grade 12'),
(283, 'Filipino sa Piling Larangan', 'Applied', 6, 'Second', 'Grade 12'),
(284, 'Tech-Drafting', 'Specialized', 6, 'Second', 'Grade 12'),
(285, 'Illustration', 'Specialized', 6, 'Second', 'Grade 12'),
(286, 'Work Immersion for Technical Drafting/Illustration', 'Specialized', 6, 'Second', 'Grade 12'),
(287, 'Subject 1', 'Core', 7, 'First', 'Grade 11'),
(288, 'Subject 2', 'Applied', 7, 'First', 'Grade 11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjectteacher`
--

CREATE TABLE IF NOT EXISTS `tbl_subjectteacher` (
`teacher_ID` int(50) NOT NULL,
  `teacher_lname` varchar(255) NOT NULL,
  `teacher_fname` varchar(255) NOT NULL,
  `teacher_mname` varchar(255) NOT NULL,
  `teacher_email_address` varchar(255) NOT NULL,
  `teacher_sex` varchar(255) NOT NULL,
  `teacher_bday` date NOT NULL,
  `teacher_address` varchar(255) NOT NULL,
  `teacher_contact_number` varchar(12) NOT NULL,
  `strands_name` varchar(255) NOT NULL,
  `subject_teaching` varchar(255) NOT NULL,
  `teacher_status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subjectteacher`
--

INSERT INTO `tbl_subjectteacher` (`teacher_ID`, `teacher_lname`, `teacher_fname`, `teacher_mname`, `teacher_email_address`, `teacher_sex`, `teacher_bday`, `teacher_address`, `teacher_contact_number`, `strands_name`, `subject_teaching`, `teacher_status`) VALUES
(1, 'Ong', 'Allen Joseph', 'Ongbak', 'cantos05ge@gmail.com', 'Male', '1990-06-19', 'Imus, Cavite', '09128865327', 'CSS', 'Personal Development', 'Active'),
(2, 'Cabria', 'Roxanne', 'Bihis', 'cabria.roxanne@gmail.com', 'Female', '1987-10-28', 'Sabang, Dasmarinas City, Cavite', '09111111111', 'ABM', 'English for Academic and Professional Purposes', 'Active'),
(3, 'Agellon', 'Lester', 'Sevello', 'lester.agellon@gmail.com', 'Male', '1989-08-07', 'Bayan, Dasmarinas City, Cavite', '09201232451', 'Technical Drafting', 'Tech-Drafting', 'Active'),
(4, 'Dela Druz', 'Peter', 'Pan', 'tadeosjason@gmail.com', 'Male', '1995-12-12', 'Burol Main, Dasma, Cavite', '09472939448', 'GAS', 'Oral Communication', 'Active'),
(5, 'Tadeos', 'Jason', 'Cantos', 'tadeosjason@gmail.com', 'Male', '1999-01-12', 'San Andres 2, Dasma. Cavite', '09128865329', 'CSS', 'General Mathematics', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subteacheraccount`
--

CREATE TABLE IF NOT EXISTS `tbl_subteacheraccount` (
`subteacheraccount_ID` int(255) NOT NULL,
  `subteacher_ID` int(255) NOT NULL,
  `teacher_email_address` varchar(255) NOT NULL,
  `teacher_username` varchar(255) NOT NULL,
  `teacher_password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subteacheraccount`
--

INSERT INTO `tbl_subteacheraccount` (`subteacheraccount_ID`, `subteacher_ID`, `teacher_email_address`, `teacher_username`, `teacher_password`) VALUES
(1, 1, 'cantos05ge@gmail.com', 'allen', '2fd9bdbf4b54545f463a9b994baeef91'),
(2, 2, 'cabria.roxanne@gmail.com', 'roxanne', 'cbe81b6a78c6b34672b123ac8a3a20d9'),
(3, 3, 'lester.agellon@gmail.com', 'lester', 'a9c38495a65f37ae5da8193b0aef9b18'),
(4, 4, 'tadeosjason@gmail.com', 'peterpan', 'fc5691af804e6b7b70003178b50dd656'),
(5, 5, 'tadeosjason@gmail.com', 'oppajason', '27c59fec9b551292034f355b805d6106');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE IF NOT EXISTS `tbl_teacher` (
`teacher_ID` int(25) NOT NULL,
  `teacher_lname` varchar(255) NOT NULL,
  `teacher_fname` varchar(255) NOT NULL,
  `teacher_mname` varchar(255) NOT NULL,
  `teacher_email_address` varchar(255) NOT NULL,
  `teacher_sex` varchar(25) NOT NULL,
  `teacher_bday` date NOT NULL,
  `teacher_address` varchar(255) NOT NULL,
  `teacher_contact_number` varchar(12) NOT NULL,
  `strands_name` varchar(255) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `subject_teaching` varchar(300) NOT NULL,
  `teacher_status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_ID`, `teacher_lname`, `teacher_fname`, `teacher_mname`, `teacher_email_address`, `teacher_sex`, `teacher_bday`, `teacher_address`, `teacher_contact_number`, `strands_name`, `section_name`, `subject_teaching`, `teacher_status`) VALUES
(1, 'Derla', 'Liwayway', 'Cruz', 'gerald.amosco@cvsu.edu.ph', 'Female', '1995-12-09', 'Pala Pala, Dasma, Cavite', '09128865327', 'ABM', 'CSS 11 - 6', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Active'),
(2, 'Velez', 'Euniza', 'Montemayor', 'tadeosjason@gmail.com', 'Female', '1992-08-12', 'San Andres, Dasma, Cavite', '09472939448', 'ABM', 'ABM 11 - 1', 'Media and Information Literacy', 'Active'),
(3, 'Proceso', 'Bernadette', 'Bei', 'tadeosjason@gmail.com', 'Female', '1980-03-14', 'Pala Pala, Dasma, Cavite', '09472939445', 'GAS', 'GAS 11 - 5', 'Understanding Culture, Society, and Politics', 'Active'),
(4, 'Alfafara', 'Rose', 'Ann', 'tadeosjason@gmail.com', 'Female', '1989-08-15', 'San Rafael, Dasmarinas City, Cavite', '09111111111', 'Technical Drafting', 'Tech - Drafting 11 - 8', 'Earth and Life Science', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacheraccount`
--

CREATE TABLE IF NOT EXISTS `tbl_teacheraccount` (
`teacheraccount_ID` int(25) NOT NULL,
  `teacher_ID` int(25) NOT NULL,
  `teacher_email_address` varchar(50) NOT NULL,
  `teacher_username` varchar(255) NOT NULL,
  `teacher_password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacheraccount`
--

INSERT INTO `tbl_teacheraccount` (`teacheraccount_ID`, `teacher_ID`, `teacher_email_address`, `teacher_username`, `teacher_password`) VALUES
(1, 1, 'gerald.amosco@cvsu.edu.ph', 'liwayy', '0218ff03026d33c94c99839df2a326d4'),
(2, 2, 'tadeosjason@gmail.com', 'euniza', '5d7e78aeb4e98841ccb4476b900b7600'),
(3, 3, 'tadeosjason@gmail.com', 'beibei', '620808abd9a73800d36cb516e57bbd85'),
(4, 4, 'tadeosjason@gmail.com', 'roseann', 'ce07d002ad63c55e5b73483026b77041');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracks`
--

CREATE TABLE IF NOT EXISTS `tbl_tracks` (
`track_ID` int(25) NOT NULL,
  `track_name` varchar(255) NOT NULL,
  `track_desc` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tracks`
--

INSERT INTO `tbl_tracks` (`track_ID`, `track_name`, `track_desc`) VALUES
(0, 'NA', 'None'),
(1, 'Academic', 'Academic track'),
(2, 'TVL', 'Technical-Vocational-Livelihood track'),
(3, 'Agri', 'Agriculture'),
(4, 'Sample Track', 'Sample Track Name');

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
-- Indexes for table `tbl_enrolledsubjects`
--
ALTER TABLE `tbl_enrolledsubjects`
 ADD PRIMARY KEY (`es_ID`);

--
-- Indexes for table `tbl_error`
--
ALTER TABLE `tbl_error`
 ADD PRIMARY KEY (`stud_ID`);

--
-- Indexes for table `tbl_schoolyear`
--
ALTER TABLE `tbl_schoolyear`
 ADD PRIMARY KEY (`schoolyear_id`);

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
-- Indexes for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
 ADD PRIMARY KEY (`subject_ID`);

--
-- Indexes for table `tbl_subjectteacher`
--
ALTER TABLE `tbl_subjectteacher`
 ADD PRIMARY KEY (`teacher_ID`);

--
-- Indexes for table `tbl_subteacheraccount`
--
ALTER TABLE `tbl_subteacheraccount`
 ADD PRIMARY KEY (`subteacheraccount_ID`);

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
MODIFY `adminaccount_ID` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_enrolledsubjects`
--
ALTER TABLE `tbl_enrolledsubjects`
MODIFY `es_ID` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=553;
--
-- AUTO_INCREMENT for table `tbl_error`
--
ALTER TABLE `tbl_error`
MODIFY `stud_ID` int(25) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_schoolyear`
--
ALTER TABLE `tbl_schoolyear`
MODIFY `schoolyear_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
MODIFY `section_ID` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
MODIFY `sem_ID` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_strands`
--
ALTER TABLE `tbl_strands`
MODIFY `strands_ID` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
MODIFY `stud_ID` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_studentaccount`
--
ALTER TABLE `tbl_studentaccount`
MODIFY `studentaccount_ID` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
MODIFY `subject_ID` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=289;
--
-- AUTO_INCREMENT for table `tbl_subjectteacher`
--
ALTER TABLE `tbl_subjectteacher`
MODIFY `teacher_ID` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_subteacheraccount`
--
ALTER TABLE `tbl_subteacheraccount`
MODIFY `subteacheraccount_ID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
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
MODIFY `track_ID` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_yearlevel`
--
ALTER TABLE `tbl_yearlevel`
MODIFY `yearlevel_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
