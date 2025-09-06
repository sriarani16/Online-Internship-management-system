-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2015 at 08:58 AM
-- Server version: 5.5.28
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `web` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `logo` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `acc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `web`, `description`, `email`, `phone`, `logo`, `acc`) VALUES
(1, 'IFS', 'http://www.ifsworld.com/', 'IFS is a global enterprise software vendor providing business software through a single solution that help companies get better return on investment.', 'pubudu.liyanage@ifsworld.com', 112364400, 'logo/IFS_Manufacturing_168909.jpg', NULL),
(2, 'HTN', 'http://www.htnsys.com/?page_id=12', 'furnish versatile IT solutions to any industry, which would cater every aspect of  Organization as per the well-defined customer specifications and requirements.', 'info@htnsys.com', 114862520, 'logo/Capture20.PNG', NULL),
(3, 'Virtusa', 'http://www.virtusa.com/', 'Virtusa Corporation (NASDAQ: VRTU) is a global information technology (IT) services company providing IT consulting, technology and outsourcing services.\r\n\r\nUsing our enhanced global delivery model, innovative software platforming approach and industry expertise, we provide high-value IT services that enable our clients to enhance business performance, accelerate time-to-market, increase productivity and improve customer service.', 'virtusa', 114605500, 'logo/Capture21.PNG', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companyinterviewer`
--

CREATE TABLE IF NOT EXISTS `companyinterviewer` (
  `cmpId` int(11) NOT NULL,
  `Inter_Name` varchar(20) NOT NULL,
  `Inter_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(30) NOT NULL,
  PRIMARY KEY (`Inter_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `companyinterviewer`
--

INSERT INTO `companyinterviewer` (`cmpId`, `Inter_Name`, `Inter_ID`, `IP`) VALUES
(1, 'Uthayakumar', 1, '22.231.113.64'),
(1, 'Livashini', 2, '194.66.82.11'),
(2, 'Danasinga', 3, '194.56.82.13'),
(2, 'Kumarsangakara', 4, '144.56.82.45');

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE IF NOT EXISTS `interview` (
  `company` int(11) NOT NULL,
  `im_no` varchar(20) CHARACTER SET latin1 NOT NULL,
  `intdate` date DEFAULT NULL,
  `inttime` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `selection` int(11) DEFAULT NULL,
  `conform` int(11) DEFAULT NULL,
  PRIMARY KEY (`company`,`im_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interview`
--

INSERT INTO `interview` (`company`, `im_no`, `intdate`, `inttime`, `active`, `date`, `selection`, `conform`) VALUES
(1, 'iit/11/0018', '2015-08-05', '10:00 AM', 1, '2015-06-29', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `count` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `post` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`count`,`email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`count`, `email`, `password`, `post`, `active`) VALUES
(100, 'admin', 'e99a18c428cb38d5f260853678922e03', 1, 1),
(111, 'cst/11/0012', '202cb962ac59075b964b07152d234b70', 2, 1),
(112, 'cst/11/0013', '202cb962ac59075b964b07152d234b70', 2, 1),
(113, 'cst/11/0023', '202cb962ac59075b964b07152d234b70', 2, 1),
(114, 'cst/11/0047', '202cb962ac59075b964b07152d234b70', 2, 1),
(115, 'cst/11/0019', '202cb962ac59075b964b07152d234b70', 2, 1),
(116, 'pubudu.liyanage@ifsworld.com', '250cf8b51c773f3f8dc8b4be867a9a02', 5, 1),
(118, 'cst/11/0016', '202cb962ac59075b964b07152d234b70', 2, 1),
(120, 'info@htnsys.com', '250cf8b51c773f3f8dc8b4be867a9a02', 5, 1),
(121, 'virtusa', '250cf8b51c773f3f8dc8b4be867a9a02', 5, 1),
(123, 'iit/11/0002', '202cb962ac59075b964b07152d234b70', 2, 1),
(124, 'iit/11/0018', '202cb962ac59075b964b07152d234b70', 2, 1),
(125, 'cst/11/0043', '202cb962ac59075b964b07152d234b70', 2, 1),
(126, 'cst/11/0046', '202cb962ac59075b964b07152d234b70', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `marking`
--

CREATE TABLE IF NOT EXISTS `marking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `category` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `catmark` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `marking`
--

INSERT INTO `marking` (`id`, `company`, `category`, `catmark`) VALUES
(1, 'virtusa', '               Technical Skill                ', 40),
(2, 'virtusa', '                               Confident level', 20),
(3, 'virtusa', '                               Communication skill', 20),
(5, 'virtusa', '                      Dressing         ', 20),
(6, 'info@htnsys.com', '           Technical Skills                    ', 40),
(7, 'info@htnsys.com', '                               Eye contact', 20),
(8, 'info@htnsys.com', '                               Attitude', 10),
(9, 'info@htnsys.com', '                               Languageskill', 20),
(10, 'info@htnsys.com', '                               Dressing', 10),
(11, 'pubudu.liyanage@ifsworld.com', '                          Technical skill     ', 30),
(12, 'pubudu.liyanage@ifsworld.com', '                               Communication skill', 20),
(13, 'pubudu.liyanage@ifsworld.com', '                               other qualification', 50);

-- --------------------------------------------------------

--
-- Table structure for table `selection`
--

CREATE TABLE IF NOT EXISTS `selection` (
  `company` varchar(30) CHARACTER SET latin1 NOT NULL,
  `im_no` varchar(20) CHARACTER SET latin1 NOT NULL,
  `mark` int(11) NOT NULL,
  `remark` varchar(500) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`company`,`im_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `im_no` varchar(15) CHARACTER SET latin1 NOT NULL,
  `fname` varchar(25) CHARACTER SET latin1 NOT NULL,
  `lname` varchar(25) CHARACTER SET latin1 NOT NULL,
  `gender` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `phone` int(11) NOT NULL,
  `dateofbirth` date DEFAULT NULL,
  `gpa` double DEFAULT NULL,
  `preference` int(11) DEFAULT NULL,
  `cv` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `nic` varchar(12) CHARACTER SET latin1 DEFAULT NULL,
  `image` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `interview` int(11) DEFAULT '0',
  `selection` int(11) DEFAULT '0',
  PRIMARY KEY (`im_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`im_no`, `fname`, `lname`, `gender`, `email`, `phone`, `dateofbirth`, `gpa`, `preference`, `cv`, `nic`, `image`, `interview`, `selection`) VALUES
('cst/11/0016', 'Premnath', 'Kathirkamanathan', 1, 'rexprem1991@gmail.com', 777728630, '1991-03-05', 2.98, 1, NULL, '910586541v', 'profileimage/IMG_0339.JPG', 0, 0),
('cst/11/0019', 'Sathiyan', 'Senathirajah', 1, 'uwusathiyancst@gmail.com', 772522133, '1990-08-17', 3.2, 1, 'CV/CST110019 (1).pdf', '902302565v', 'profileimage/DSC_1330.JPG', 0, 0),
('cst/11/0043', 'Nirosh', 'Nanthakumar', 1, 'nanthakumarniros@gmail.com', 777030848, '1990-03-07', 2.992, 1, 'CV/cst110043.pdf', '900673280V', 'profileimage/Capture12.PNG', 0, 0),
('cst/11/0046', 'Madushiika', 'Gamage', 2, 'madushika0089@gmail.com', 715412589, '1989-11-10', 2.95, 4, 'CV/G.R.M.D.Gamage.pdf', ' 898153266 V', 'profileimage/madhushi.PNG', 0, 0),
('cst/11/0047', 'Sriarani', 'Sivarajah', 2, 'sriaranisivarajah@yahoo.com', 771748383, '1991-10-16', 2.95, 3, 'CV/cst110047.pdf', '917900647v', 'profileimage/18268.jpg', 0, 0),
('iit/11/0002', 'Danoja', 'Thanthirige', 2, 'tdanoja@gmail.com', 773456105, '1991-12-04', 3.2, 3, NULL, '918390502v', 'profileimage/Capturedanoja.PNG', 0, 0),
('iit/11/0018', 'Ishanka', 'Deerasinghe', 2, 'ishankadeerasingha@gmail.com', 714607122, '1989-10-15', 2.6, 2, 'CV/CV.pdf', '897892979V', 'profileimage/Captureishanka.PNG', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
