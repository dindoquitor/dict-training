-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 11, 2026 at 02:36 PM
-- Server version: 8.4.0
-- PHP Version: 8.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nfa_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis_table`
--

CREATE TABLE `diagnosis_table` (
  `diagnosisID` int NOT NULL,
  `diagnosisCode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosisName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_table`
--

CREATE TABLE `medicine_table` (
  `medicineid` int NOT NULL,
  `medecine_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `generic_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosage` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patientdiagnosis_table`
--

CREATE TABLE `patientdiagnosis_table` (
  `patient_diagnosis_id` int NOT NULL,
  `patientid` int NOT NULL,
  `diagnosisID` int NOT NULL,
  `dateDiagnosed` date NOT NULL,
  `remarks` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patientmedicine_table`
--

CREATE TABLE `patientmedicine_table` (
  `patientmedicineid` int NOT NULL,
  `patientid` int NOT NULL,
  `medicineid` int NOT NULL,
  `datePrescribed` date NOT NULL,
  `remarks` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `patientmedicine_table_view`
-- (See below for the actual view)
--
CREATE TABLE `patientmedicine_table_view` (
`datePrescribed` date
,`medicineid` int
,`MnedicineName` varchar(50)
,`patientid` int
,`patientmedicineid` int
,`PatientName` varchar(100)
,`remarks` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `patient_table`
--

CREATE TABLE `patient_table` (
  `patientid` int NOT NULL,
  `patient_fname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `patient_mname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `patient_lname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_gender` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_patient_diagnosis`
-- (See below for the actual view)
--
CREATE TABLE `view_patient_diagnosis` (
`DateDiagnosed` date
,`Diagnosis` varchar(100)
,`diagnosisID` int
,`patient_diagnosis_id` int
,`patientid` int
,`PatientName` varchar(101)
,`Remarks` varchar(50)
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosis_table`
--
ALTER TABLE `diagnosis_table`
  ADD PRIMARY KEY (`diagnosisID`);

--
-- Indexes for table `medicine_table`
--
ALTER TABLE `medicine_table`
  ADD PRIMARY KEY (`medicineid`);

--
-- Indexes for table `patientdiagnosis_table`
--
ALTER TABLE `patientdiagnosis_table`
  ADD PRIMARY KEY (`patient_diagnosis_id`),
  ADD KEY `patient-id_fk` (`patientid`),
  ADD KEY `diagnosis_id_fk` (`diagnosisID`);

--
-- Indexes for table `patientmedicine_table`
--
ALTER TABLE `patientmedicine_table`
  ADD PRIMARY KEY (`patientmedicineid`),
  ADD KEY `patientid_fk` (`patientid`),
  ADD KEY `medicineid_fk` (`medicineid`);

--
-- Indexes for table `patient_table`
--
ALTER TABLE `patient_table`
  ADD PRIMARY KEY (`patientid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnosis_table`
--
ALTER TABLE `diagnosis_table`
  MODIFY `diagnosisID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine_table`
--
ALTER TABLE `medicine_table`
  MODIFY `medicineid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patientdiagnosis_table`
--
ALTER TABLE `patientdiagnosis_table`
  MODIFY `patient_diagnosis_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patientmedicine_table`
--
ALTER TABLE `patientmedicine_table`
  MODIFY `patientmedicineid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_table`
--
ALTER TABLE `patient_table`
  MODIFY `patientid` int NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------

--
-- Structure for view `patientmedicine_table_view`
--
DROP TABLE IF EXISTS `patientmedicine_table_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `patientmedicine_table_view`  AS SELECT `pm`.`patientmedicineid` AS `patientmedicineid`, `p`.`patientid` AS `patientid`, `m`.`medicineid` AS `medicineid`, concat(`p`.`patient_fname`,`p`.`patient_lname`) AS `PatientName`, `m`.`medecine_name` AS `MnedicineName`, `pm`.`datePrescribed` AS `datePrescribed`, `pm`.`remarks` AS `remarks` FROM ((`patientmedicine_table` `pm` join `patient_table` `p` on((`pm`.`patientid` = `p`.`patientid`))) join `medicine_table` `m` on((`pm`.`medicineid` = `m`.`medicineid`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_patient_diagnosis`
--
DROP TABLE IF EXISTS `view_patient_diagnosis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_patient_diagnosis`  AS SELECT `pd`.`patient_diagnosis_id` AS `patient_diagnosis_id`, `d`.`diagnosisID` AS `diagnosisID`, `p`.`patientid` AS `patientid`, concat(`p`.`patient_fname`,' ',`p`.`patient_lname`) AS `PatientName`, `d`.`diagnosisName` AS `Diagnosis`, `pd`.`dateDiagnosed` AS `DateDiagnosed`, `pd`.`remarks` AS `Remarks` FROM ((`patientdiagnosis_table` `pd` join `patient_table` `p` on((`pd`.`patientid` = `p`.`patientid`))) join `diagnosis_table` `d` on((`pd`.`diagnosisID` = `d`.`diagnosisID`))) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patientdiagnosis_table`
--
ALTER TABLE `patientdiagnosis_table`
  ADD CONSTRAINT `patientdiagnosis_table_ibfk_1` FOREIGN KEY (`patientid`) REFERENCES `patient_table` (`patientid`),
  ADD CONSTRAINT `patientdiagnosis_table_ibfk_2` FOREIGN KEY (`diagnosisID`) REFERENCES `diagnosis_table` (`diagnosisID`);

--
-- Constraints for table `patientmedicine_table`
--
ALTER TABLE `patientmedicine_table`
  ADD CONSTRAINT `patientmedicine_table_ibfk_1` FOREIGN KEY (`medicineid`) REFERENCES `medicine_table` (`medicineid`),
  ADD CONSTRAINT `patientmedicine_table_ibfk_2` FOREIGN KEY (`patientid`) REFERENCES `patient_table` (`patientid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
