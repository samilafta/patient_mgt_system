-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2018 at 02:20 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patient_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `aid` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `diagnosis` int(11) DEFAULT NULL,
  `vitals` int(11) DEFAULT NULL,
  `lab` int(11) DEFAULT NULL,
  `pharmacy` int(11) DEFAULT NULL,
  `appointmentDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`aid`, `patient_id`, `diagnosis`, `vitals`, `lab`, `pharmacy`, `appointmentDate`) VALUES
(9, 15, NULL, NULL, NULL, 0, '2018-04-18 17:18:23'),
(11, 16, NULL, NULL, NULL, NULL, '2018-04-19 20:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `diagnosisID` int(11) NOT NULL,
  `aid` int(11) DEFAULT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `diagnosis` varchar(3000) DEFAULT NULL,
  `date_taken` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`diagnosisID`, `aid`, `doc_id`, `diagnosis`, `date_taken`) VALUES
(4, 9, 7, 'sick in the head, moth and everywhere. go for lab den things man. okay okay okay look sharp. hcgkhdbnlasiyhdgw ,cmhkiuygsjbsakxgsa cjgctfvwek,ahxugasfv,bcd hdbchkcigdyhcw hgewybkjckigsydcvwhclkjs hcwdgkcmjhcgvds,cb hcwdgkcgbwiuncbwkybcw,nc cjkckd', '2018-04-20 00:50:31'),
(5, 11, 7, 'jbcisdfbviudfhius cjhiuveriufhbew ihsigebf erfygyrfhkbhbskfube vygerkebjhvr\r\nvdfnbvdvjhbshbkfdv\r\nfbdvuhfvfdjnvkdljfhv,vbsvskhsdbcc\r\nvncbdhsbjsjs', '2018-04-20 04:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `labID` int(11) NOT NULL,
  `aid` int(11) DEFAULT NULL,
  `patient_uid` int(11) DEFAULT NULL,
  `requested_by` varchar(50) DEFAULT NULL,
  `lab_type` varchar(100) DEFAULT NULL,
  `collection_date` varchar(20) DEFAULT NULL,
  `lab_report` varchar(255) DEFAULT NULL,
  `report_date` varchar(20) DEFAULT NULL,
  `signed_by` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`labID`, `aid`, `patient_uid`, `requested_by`, `lab_type`, `collection_date`, `lab_report`, `report_date`, `signed_by`, `status`) VALUES
(1, 9, 15, 'Dr. Asare Marfo', 'blood test', '2018-04-20', 'Blood Type: A \r\nGood Blood flow\r\nScan shows scars', '2018-04-20 04:17:12', 'Felix Kwakye', 'sent');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientID` int(11) NOT NULL,
  `patientUniqueID` varchar(10) NOT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `tel_num` varchar(15) DEFAULT NULL,
  `home_address` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `marital_status` varchar(10) DEFAULT NULL,
  `insurance` varchar(50) DEFAULT NULL,
  `nhis_number` int(10) DEFAULT NULL,
  `next_of_kin` varchar(255) DEFAULT NULL,
  `date_registered` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `patientUniqueID`, `surname`, `firstname`, `dob`, `age`, `sex`, `tel_num`, `home_address`, `occupation`, `marital_status`, `insurance`, `nhis_number`, `next_of_kin`, `date_registered`) VALUES
(15, 'EVC36863', 'Owusu', 'Samuel', '22/10/1994', 23, 'male', '054 757-6916', 'Bortianor', '', 'single', 'no insurance', 0, 'Dorcas', '2018-04-18 15:12:38'),
(16, 'EVC61250', 'Nimo', 'Stephen', '02/11/1993', 24, 'male', '027 789-6541', 'Madina social welfare', 'student', 'single', 'no insurance', 0, 'edem', '2018-04-19 20:34:21');

-- --------------------------------------------------------

--
-- Table structure for table `pharmarcy`
--

CREATE TABLE `pharmarcy` (
  `pharmacyID` int(11) NOT NULL,
  `aid` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor` varchar(50) DEFAULT NULL,
  `prescription` varchar(1000) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `served_by` varchar(50) DEFAULT NULL,
  `date_served` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmarcy`
--

INSERT INTO `pharmarcy` (`pharmacyID`, `aid`, `patient_id`, `doctor`, `prescription`, `notes`, `status`, `served_by`, `date_served`) VALUES
(2, 9, 15, 'Dr. Asare Marfo', '1. para\r\n2. tramadol\r\n3. vitamin c', '', 'served', 'Mabel Serwaa', '2018-04-20 05:16:07'),
(3, 11, 16, 'Dr. Asare Marfo', '1.lkheriuhfeiru\r\n2.fjerybjfkkje\r\n3.vhkivuheijvbe\r\n4.vjbvuherki\r\n5.vhefvbukerbkjfe\r\n6. jhvgrueikuhvlre', '', 'not served yet', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fname`, `uname`, `pwd`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(4, 'Dr. Samuel Tetteh', 'stetteh', 'MA1234', 'doctor'),
(5, 'Dr. Oppong Weah', 'oweah', 'MA1234', 'doctor'),
(7, 'Dr. Asare Marfo', 'amarfo', 'doc123', 'doctor'),
(8, 'Daniel Amoah', 'damoah', 'admin123', 'admin'),
(13, 'Lovelace Adams', 'ladams', '123456', 'opd'),
(14, 'Felix Kwakye', 'felix', 'qwerty', 'lab'),
(15, 'Mabel Serwaa', 'mabel', 'lololo', 'pharmacy');

-- --------------------------------------------------------

--
-- Table structure for table `vitals`
--

CREATE TABLE `vitals` (
  `vitalsID` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `arrival_means` varchar(50) DEFAULT NULL,
  `complaints` varchar(255) DEFAULT NULL,
  `respiratory_rate` varchar(20) DEFAULT NULL,
  `pulse_rate` varchar(20) DEFAULT NULL,
  `blood_pressure` varchar(20) DEFAULT NULL,
  `temperature` varchar(20) DEFAULT NULL,
  `vitals_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vitals`
--

INSERT INTO `vitals` (`vitalsID`, `appointment_id`, `opd_id`, `arrival_means`, `complaints`, `respiratory_rate`, `pulse_rate`, `blood_pressure`, `temperature`, `vitals_date`) VALUES
(1, 9, 13, 'Taxi', 'running stomach', '9', '6', '35', '20', '2018-04-18 18:24:16'),
(2, 11, 13, 'Own Transport', 'red urine, headache, dizziness', '15', '87', '128/100', '36.2', '2018-04-20 02:13:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `appointments_patient_patientID_fk` (`patient_id`),
  ADD KEY `vitals` (`vitals`),
  ADD KEY `lab` (`lab`),
  ADD KEY `diagnosis` (`diagnosis`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`diagnosisID`),
  ADD KEY `aid` (`aid`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`labID`),
  ADD KEY `aid` (`aid`),
  ADD KEY `patient_uid` (`patient_uid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientID`);

--
-- Indexes for table `pharmarcy`
--
ALTER TABLE `pharmarcy`
  ADD PRIMARY KEY (`pharmacyID`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `vitals`
--
ALTER TABLE `vitals`
  ADD PRIMARY KEY (`vitalsID`),
  ADD KEY `opd_id` (`opd_id`),
  ADD KEY `vitals_ibfk_1` (`appointment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `diagnosisID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `labID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pharmarcy`
--
ALTER TABLE `pharmarcy`
  MODIFY `pharmacyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `vitals`
--
ALTER TABLE `vitals`
  MODIFY `vitalsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`vitals`) REFERENCES `vitals` (`vitalsID`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`lab`) REFERENCES `lab` (`labID`),
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`diagnosis`) REFERENCES `diagnosis` (`diagnosisID`),
  ADD CONSTRAINT `appointments_patient_patientID_fk` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patientID`);

--
-- Constraints for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD CONSTRAINT `diagnosis_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `appointments` (`aid`),
  ADD CONSTRAINT `diagnosis_ibfk_2` FOREIGN KEY (`doc_id`) REFERENCES `user` (`userID`);

--
-- Constraints for table `lab`
--
ALTER TABLE `lab`
  ADD CONSTRAINT `lab_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `appointments` (`aid`),
  ADD CONSTRAINT `lab_ibfk_2` FOREIGN KEY (`patient_uid`) REFERENCES `patient` (`patientID`);

--
-- Constraints for table `pharmarcy`
--
ALTER TABLE `pharmarcy`
  ADD CONSTRAINT `pharmarcy_ibfk_3` FOREIGN KEY (`aid`) REFERENCES `appointments` (`aid`);

--
-- Constraints for table `vitals`
--
ALTER TABLE `vitals`
  ADD CONSTRAINT `vitals_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`aid`),
  ADD CONSTRAINT `vitals_ibfk_2` FOREIGN KEY (`opd_id`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
