-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2017 at 12:37 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hospital_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_role` tinyint(4) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `admin_name`, `admin_role`) VALUES
(1, 'admin', 'admin', 'admin', 1),
(2, 'user', 'user', 'manager', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bank_transaction`
--

CREATE TABLE IF NOT EXISTS `bank_transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(100) NOT NULL,
  `transaction_type` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `bank_transaction`
--

INSERT INTO `bank_transaction` (`transaction_id`, `bank_name`, `transaction_type`, `amount`, `date`) VALUES
(6, 'Sonali Bank', 'In', 5600, '22-04-2017'),
(7, 'Rupaly Bank ', 'Out', 400000, '22-04-2017'),
(8, 'Rupaly Bank', 'Out', 9800, '22-04-2017'),
(9, 'Select Bank', 'In', 1234, '22-04-2017'),
(10, 'Sonali Bank', 'In', 50000, '2017-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `depertment` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `blood_group` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `visit_salary` double NOT NULL,
  `oncall_salary` double NOT NULL,
  `operation_salary` double NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_name`, `phone`, `designation`, `depertment`, `gender`, `blood_group`, `address`, `photo`, `visit_salary`, `oncall_salary`, `operation_salary`, `category`) VALUES
(1, 'Hozrot', '01718088758', 'Proffesor', 'Arthopedic', 'male', 'O+', 'Rangpur', '', 1000, 1500, 5000, 'Sergon'),
(7, 'Nadim Rahman', '+8801934789521', 'Intern', 'Arthopedic', 'male', 'B+', ' Keranipara, Rangpur', 'miller.jpg', 500, 800, 3000, ''),
(8, 'Habib', '+8801789566895', 'Intern', 'Arthopedic', 'male', 'A+', ' Rangpur', 'game flow.PNG', 0, 0, 0, ''),
(9, 'Mokles', '+880178456370', 'Lecturer', 'Skin', '', 'AB+', ' kamal kachna,rangpur', '', 500, 1000, 100000, ''),
(10, 'mojid', '+8801532343387', 'Intern', 'Gainocology', 'male', 'B-', ' lalbag,rangpur', '30f8c2ee213151e23a252c82d1f4d687.773.500.0.0.0.85.jpg', 0, 0, 0, ''),
(11, 'jahanggir ', '+8801675512344', 'Proffesor', 'Arthopedic', 'male', 'A-', ' gajipur,dhaka', '', 0, 0, 0, ''),
(12, 'happy', '+880179867433', 'Intern', 'Gainocology', 'female', 'B+', 'alamnager,rangpur', '', 0, 0, 0, ''),
(13, 'robiul alam', '+8801921249902', 'Proffesor', 'Eye', 'male', 'A-', ' elephant road,28/10,rajshahi', '', 0, 0, 0, ''),
(14, 'hozrot baddri', '+8801532378865', 'Associate Proffesor', 'Skin', 'male', 'B-', ' satmatha,bogra', '', 0, 0, 0, ''),
(15, 'habib ul basar', '+8801654334487', 'Lecturer', 'Gainocology', 'male', 'A+', ' bpdb,khulna.', '', 0, 0, 0, ''),
(16, 'zahanur', '+8801709156774', 'Associate Proffesor', 'Arthopedic', 'male', 'O-', ' college road, monshigonjh', '', 0, 0, 0, ''),
(17, 'tamim', '+8801896183442', 'Intern', 'Arthopedic', 'male', 'AB+', ' khulnana para, rajshahi', '', 0, 0, 0, ''),
(18, 'labib', '+8801678512400', 'Intern', 'Gainocology', 'male', 'B+', ' kotkipara,billot road,magura', '', 0, 0, 0, ''),
(19, 'khokon mia', '+880178913422', 'Lecturer', 'Arthopedic', 'male', 'B-', ' solonbill,rajshahi', '', 0, 0, 0, ''),
(20, 'souda binte mostofa', '+8801518088768', 'Intern', 'Gainocology', 'female', 'AB+', ' sonar para,nouga', '', 0, 0, 0, ''),
(21, 'kakuli', '+8801509154662', 'Associate Proffesor', 'Gainocology', 'female', 'A-', ' bismegaout,kotki,para,khulna', '', 0, 0, 0, ''),
(22, 'surma', '+8801778365449', 'Intern', 'Arthopedic', 'female', 'B-', ' cokbazer,nettrokona', '', 0, 0, 0, ''),
(23, 'raha', '+880179867433', 'Intern', 'Eye', 'female', 'B+', ' lalbag,rangpur', '', 0, 0, 0, ''),
(24, 'tamim', '+8801978456149', 'Proffesor', 'Arthopedic', 'male', 'A+', ' guptapara,Rangpur', '', 0, 0, 0, ''),
(25, 'taohid', '+8801854347797', 'Proffesor', 'Arthopedic', 'male', 'O+', ' Sahbag,Dhaka.', '', 0, 0, 0, ''),
(26, 'ruhi', '+8801934121564                                    ', 'Intern', 'Eye', 'female', 'AB+', ' parker mor,rangpur.', '', 0, 0, 0, ''),
(27, 'sweety', '+8801789456132', 'Proffesor', 'Arthopedic', 'female', 'A-', ' lalbag,Rangpur.', '', 0, 0, 0, ''),
(28, 'bithi', '+8801789564238', 'Associate Proffesor', 'Arthopedic', '', 'B+', ' kumilla', '', 0, 0, 0, ''),
(29, 'bonny', '+8801965412369', 'Intern', 'Eye', 'female', 'B+', ' Guptapara,Rangpur.', '', 0, 0, 0, ''),
(30, 'Semonty ', '+8801934121564', 'Intern', 'Eye', 'female', 'AB+', ' Guptapara, Rangpur', '', 0, 0, 0, ''),
(31, 'Mitu ', '+8801934584858', 'Lecturer', 'Arthopedic', 'female', 'A+', ' Darsona, rangpur.', '', 0, 0, 0, ''),
(32, 'Sumiya', '+880178913422', 'Intern', 'Gainocology', 'female', 'B+', ' Cegaratecompamy,rangpur', '', 0, 0, 0, ''),
(33, 'Risa', '+8801934789521', 'Proffesor', 'Arthopedic', 'female', 'A+', ' guptapara,rangpur', '', 0, 0, 0, ''),
(34, 'Roma', '+8801987595754', 'Proffesor', 'Arthopedic', 'female', 'B+', ' adarso para,Rangpur', '', 0, 0, 0, ''),
(35, 'Siat', '+8801858741963', 'Proffesor', 'Arthopedic', 'female', 'A+', 'gup;tapara ,ranrpur. ', '', 0, 0, 0, ''),
(36, 'Dighe', '+8801735796416', 'Proffesor', 'Arthopedic', 'female', 'A+', ' dhaka', '', 0, 0, 0, ''),
(37, 'Sangida', '+8801784988745', 'Proffesor', 'Arthopedic', 'female', 'B+', ' bicrompur, rangpur.', '', 0, 0, 0, ''),
(38, 'sinthya', '+8801789564123', 'Intern', 'Eye', 'female', 'A+', ' habibgang, dhaka', '', 0, 0, 0, ''),
(39, 'ragini', '+8801894567126', 'Proffesor', 'Arthopedic', 'female', 'AB-', ' dhaka', '', 0, 0, 0, ''),
(40, 'faran', '+8801894756123', 'Proffesor', 'Arthopedic', 'male', 'AB-', ' danmpndi,dhaka', '', 0, 0, 0, ''),
(41, 'sayam', '+8801934789521', 'Proffesor', 'Arthopedic', 'male', 'A-', ' dhaka', '', 0, 0, 0, ''),
(42, 'suhani', '+8801987456321', 'Associate Proffesor', 'Arthopedic', 'female', 'AB+', ' barisal', '', 0, 0, 0, ''),
(43, 'habibul', '+8801784988745', 'Intern', 'Arthopedic', 'male', 'B+', ' dhaka', '', 0, 0, 0, ''),
(44, 'samsur', '+8801759864835', 'Proffesor', 'Arthopedic', 'male', 'B-', ' Rajsahi', '', 0, 0, 0, ''),
(45, 'najmul', '+8801798456132', 'Intern', 'Eye', 'male', 'A+', ' vola', '', 0, 0, 0, ''),
(46, 'chumki', '+8801987456123', 'Intern', 'Gainocology', 'female', 'O+', ' Bonani Dhaka', '', 0, 0, 0, ''),
(47, 'Lal', '+8801987456123', 'Proffesor', 'Arthopedic', 'male', 'O+', ' Gulsan,Dhaka', '', 0, 0, 0, ''),
(48, 'mokbul', '+8801879456125', 'Intern', 'Skin', 'male', 'B-', ' bonani,Dhaka', '', 0, 0, 0, ''),
(49, 'poran', '+8801879549761', 'Proffesor', 'Gainocology', 'male', 'O-', ' dhaka', '', 0, 0, 0, ''),
(50, 'dihan', '+8801758946895', 'Proffesor', 'Arthopedic', 'male', 'AB+', ' jamalpur,dhaka.', '', 0, 0, 0, ''),
(51, 'raha', '+8801987456125', 'Proffesor', 'Eye', 'female', 'O+', ' comilla', '', 0, 0, 0, ''),
(52, 'tonmoy', '+8801795846128', 'Proffesor', 'Gainocology', 'male', 'B-', ' bonani', '', 0, 0, 0, ''),
(53, 'kasim', '+8801858741963', 'Intern', 'Skin', 'male', 'B+', ' Faridpur,Rangpur.', '', 0, 0, 0, ''),
(54, 'Rasmin', '+8801999998453', 'Intern', 'Arthopedic', 'female', 'O+', ' rajsahi', '', 0, 0, 0, ''),
(55, 'golam ajom', '+8801987456814', 'Associate Proffesor', 'Gainocology', 'male', 'B-', 'lotifpur', '', 0, 0, 0, ''),
(56, 'rusa', '+8801879456879', 'Intern', 'Eye', 'female', 'B-', ' Rassia', '', 0, 0, 0, ''),
(57, 'tremon', '+8801894756148', 'Intern', 'Gainocology', 'male', 'B+', ' saturia', '', 0, 0, 0, ''),
(58, 'gapoil', '+8801987456185', 'Intern', 'Arthopedic', 'male', 'O+', ' Rangpur', '', 0, 0, 0, ''),
(59, 'rahat', '+8801789546875', 'Proffesor', 'Gainocology', 'male', 'B-', ' dhaka', '', 0, 0, 0, ''),
(60, 'NuRul Huda', '+8801986547412', 'Proffesor', 'Arthopedic', 'male', 'A+', ' Dhaka', '30f8c2ee213151e23a252c82d1f4d687.773.500.0.0.0.85.jpg', 0, 0, 0, ''),
(61, 'Rashedul Maoula', '+8801718966587', 'Proffesor', 'Eye', 'male', 'A+', 'Rangpur', 'basic-crystallography-63-638.jpg', 0, 0, 0, ''),
(62, 'Minhajul Abedin', '+88014453445', 'Proffesor', 'Arthopedic', 'male', 'A+', 'sdfgdfgbsdfgf', '1000', 2500, 10000, 480120, 'Sergon'),
(63, 'zzzzzzzzz', '+880135353', 'Proffesor', 'Arthopedic', 'male', 'O-', ' dfgdfvdfd', '1000', 1500, 80000, 0, 'Sergon'),
(64, 'hu ha ha', '+8801', 'Select from below', 'Select from below', '', 'Select from below', ' ', '11', 1, 11, 0, 'Select from below'),
(65, 'huhu hu ', '+8801', 'Select from below', 'Select from below', '', 'Select from below', ' ', 'a', 0, 0, 0, 'Select from below'),
(66, 'robiul alam', '+8801921249902', 'Proffesor', 'Eye', '', 'A-', ' elephant road,28/10,rajshahi', '10000', 50000, 25000, 0, ''),
(67, 'robiul alam', '+8801921249902', 'Proffesor', 'Eye', '', 'A-', ' elephant road,28/10,rajshahi', '100', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_salary`
--

CREATE TABLE IF NOT EXISTS `doctor_salary` (
  `salary_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `payment_date` date NOT NULL,
  `salary_category` tinyint(4) NOT NULL,
  PRIMARY KEY (`salary_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `doctor_salary`
--

INSERT INTO `doctor_salary` (`salary_id`, `doctor_id`, `amount`, `payment_date`, `salary_category`) VALUES
(14, 1, 500000, '2017-04-22', 4),
(15, 15, 1500, '2017-04-22', 4),
(16, 1, 1800, '0000-00-00', 4),
(17, 13, 5000, '0000-00-00', 4),
(18, 1, 8500, '2017-05-01', 4);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_for` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `expense_reason` varchar(200) NOT NULL,
  `day` date NOT NULL,
  `month` varchar(20) NOT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `expense_for`, `category`, `amount`, `expense_reason`, `day`, `month`) VALUES
(16, 'eXTRA CHARGE', 'Others', 50, '04/11/2017', '2017-03-10', ' For buying chips'),
(17, 'Auto bill', 'Bill', 80, '04/11/2017', '2017-04-07', 'Communication Cost'),
(18, 'Blood Bag', 'Equipment', 130, 'blood bag', '2017-04-21', 'April');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_bill`
--

CREATE TABLE IF NOT EXISTS `hospital_bill` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `total_bill` double NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hospital_bill`
--

INSERT INTO `hospital_bill` (`bill_id`, `patient_id`, `date`, `total_bill`) VALUES
(1, 9, '2017-04-26', 1000),
(2, 11, '2017-04-27', 2500),
(3, 15, '2017-05-02', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `issued_medicine`
--

CREATE TABLE IF NOT EXISTS `issued_medicine` (
  `medicine_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issued_medicine`
--

INSERT INTO `issued_medicine` (`medicine_id`, `patient_id`, `quantity`) VALUES
(2, 9, 10),
(3, 9, 1),
(4, 9, 2),
(6, 9, 1),
(2, 9, 5),
(2, 11, 6),
(3, 11, 2),
(4, 11, 3),
(5, 11, 8),
(2, 11, 3),
(3, 11, 5),
(5, 11, 4),
(2, 12, 3),
(3, 12, 5),
(4, 12, 4),
(6, 12, 4),
(2, 12, 5),
(4, 12, 7),
(5, 12, 7),
(2, 12, 5),
(2, 15, 45),
(4, 15, 4),
(5, 15, 5),
(6, 15, 23);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
  `medicine_id` int(11) NOT NULL AUTO_INCREMENT,
  `medicine_name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `medicine_price` varchar(50) NOT NULL,
  `category` varchar(200) NOT NULL,
  PRIMARY KEY (`medicine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `company`, `description`, `medicine_price`, `category`) VALUES
(2, 'Napa Extra', 'Squre', 'Peracitamol', '4', ''),
(3, 'Calbo D', 'pagla', ' dfbn', '10', ''),
(4, 'Fluxicol', 'pagla', ' dfgjnshfg', '14', ''),
(5, 'Ace+', 'Squre', ' gvsdfbfgsdzfb', '4', ''),
(6, 'Disprine', 'Squre', 'Hadeace', '6', ''),
(7, 'Metrinozil', 'vua2', 'Disation ', '8', '');

-- --------------------------------------------------------

--
-- Table structure for table `office_staff`
--

CREATE TABLE IF NOT EXISTS `office_staff` (
  `office_staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `blood_group` varchar(20) NOT NULL,
  `salary` double NOT NULL,
  PRIMARY KEY (`office_staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `office_staff`
--

INSERT INTO `office_staff` (`office_staff_id`, `staff_name`, `address`, `phone`, `designation`, `image`, `sex`, `blood_group`, `salary`) VALUES
(1, 'ali', 'sdfgdg', '4120410', 'asdfsdf', 'ali.jpg', 'male', 'B+', 0),
(2, 'sdfgbdf', 'sdhdfgsg', '01718088758', 'aaaa', '480120-bigthumbnail.jpg', 'male', 'B+', 0),
(3, 'ali', 'eeerrr', 'sdfgb', '', '', 'male', 'B+', 0),
(4, 'asdf', 'sdhdfgsg', '122', 'Sister', 'activity.PNG', 'female', 'B+', 0),
(5, 'Hanif ali', ' rakjhlljk', '+8801784654', 'Accountant', '14993302_1792411960998792_296323260958377024_n.jpg', 'male', 'B+', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE IF NOT EXISTS `operation` (
  `operation_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `patiant_name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`operation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(100) NOT NULL,
  `doctor_name` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `admission_date` date NOT NULL,
  `room_no` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `reference` varchar(200) NOT NULL,
  `patient_type` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `blood_group` varchar(20) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_name`, `doctor_name`, `phone`, `age`, `admission_date`, `room_no`, `occupation`, `reference`, `patient_type`, `address`, `gender`, `status`, `blood_group`) VALUES
(9, 'sakib', '', '+8801srtghser', 20, '2017-03-23', '6D', 'Housewife', '', 'Active', ' hnsghtgh', 'male', 'Released', 'B+'),
(10, 'sakib', '', '+8801djh', 20, '2017-03-24', '2A', 'Housewife', 'Ali', 'Active', ' dfj', 'male', 'Released', 'O+'),
(11, 'Hasan Khan', 'Nadim Rahman', '+88011956784589', 28, '2017-03-27', '6D', 'Housewife', 'Ali', 'Active', 'Lalmatia Dhaka', 'male', 'Released', 'B-'),
(12, 'Milon Sarkar', '', '+8801985124785', 28, '2017-04-20', '2A', 'Student', 'Dr. hayder', 'Active', 'Rangpur  ', 'male', 'Released', 'O+'),
(13, 'Asir Mosaddek', '', '+8801745214523', 23, '0000-00-00', '1A', 'Sericeholder', 'Ali', '', ' Rangpur ', 'male', 'Released', 'B+'),
(14, 'Rashedul Islam ', 'Hozrot', '+8801xxx', 23, '2017-05-01', '8A', 'Sericeholder', 'Ali', '', 'Rangpur', 'female', 'Released', 'AB+'),
(15, 'gnfgvnh', '', '+8801gvnf', 34, '2017-05-02', '3C', 'Sericeholder', 'sdfdf', '', ' gvfxdhndn', 'female', 'Admitted', 'AB+');

-- --------------------------------------------------------

--
-- Table structure for table `patient_medicine`
--

CREATE TABLE IF NOT EXISTS `patient_medicine` (
  `entry_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `office_staff_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `medicine_bill` double NOT NULL,
  PRIMARY KEY (`entry_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `patient_medicine`
--

INSERT INTO `patient_medicine` (`entry_id`, `patient_id`, `office_staff_id`, `issue_date`, `medicine_bill`) VALUES
(14, 9, 1, '2017-04-21', 436),
(15, 15, 0, '2017-05-02', 258),
(16, 15, 0, '2017-05-02', 394);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_no` varchar(20) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_no`, `category`, `description`, `price`, `status`) VALUES
(1, '2A', 'Normal', 'single room with bath', '500', 'Available'),
(2, '6D', 'Ac', 'two room with bath', '1000', 'Booked'),
(3, '3C', 'Ac Room', ' hgfvjhfvjkh', '1500', 'Booked'),
(4, '5A', 'Vip', ' dfshdfgsd', '2000', 'Available'),
(5, '8A', 'Normal', ' wegeg', '1000', 'Booked'),
(6, '1A', 'Normal', ' vsdfs', '1000', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(200) NOT NULL,
  `service_cost` double NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_cost`, `description`) VALUES
(1, 'Blood Test', 500, 'Blood '),
(2, 'Food ', 150, ' Every day'),
(3, 'Urine test', 630, ' ghkhkl'),
(4, 'Ultrasonogram', 550, ' ssss'),
(5, 'ECG', 280, ' jghjkgkj'),
(6, 'Digital X-ray', 350, 'xxxxx'),
(7, 'Room care ', 200, 'aaaaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `staff_salary`
--

CREATE TABLE IF NOT EXISTS `staff_salary` (
  `salary_id` int(11) NOT NULL AUTO_INCREMENT,
  `office_staff_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `payment_date` date NOT NULL,
  `salary_category` tinyint(4) NOT NULL,
  PRIMARY KEY (`salary_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `staff_salary`
--

INSERT INTO `staff_salary` (`salary_id`, `office_staff_id`, `amount`, `payment_date`, `salary_category`) VALUES
(1, 5, 3000, '2017-04-16', 2),
(2, 2, 4000, '2017-04-20', 4),
(3, 5, 5000, '2017-04-22', 1),
(4, 5, 3000, '2017-04-22', 4),
(5, 5, 1700, '2017-04-22', 3),
(6, 5, 5000, '2017-04-22', 1),
(7, 1, 500, '2017-03-24', 4);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(200) NOT NULL,
  `test_price` double NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `test_name`, `test_price`, `description`) VALUES
(1, 'Blood', 50, 'blood'),
(2, 'Urin', 100, 'urin\r\n'),
(3, 'ECG', 550, ' rtjhdgh'),
(4, 'A', 12, ' aaaaa'),
(5, 'S', 23, ' ssss'),
(6, 'R', 45, ' ghfghfg'),
(7, 'E', 234, ' hfgh'),
(8, 'DED', 123, ' dfdgd'),
(9, 'AWE', 1123, ' sdfgvbsdvd'),
(10, 'BBBb', 200, ' tgdfyjhg'),
(11, 'ERW', 412, ' gdfnghndgg');

-- --------------------------------------------------------

--
-- Table structure for table `test_bill`
--

CREATE TABLE IF NOT EXISTS `test_bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_bill` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `test_bill`
--

INSERT INTO `test_bill` (`id`, `patient_id`, `date`, `total_bill`) VALUES
(1, 9, '2017-04-27', 0),
(2, 11, '2017-04-27', 545),
(3, 12, '2017-04-29', 50);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
