-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 03:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `concern_complaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `blotter`
--

CREATE TABLE `blotter` (
  `blotter_Id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `c_firstname` varchar(50) DEFAULT NULL,
  `c_middlename` varchar(50) DEFAULT NULL,
  `c_lastname` varchar(50) DEFAULT NULL,
  `c_suffix` varchar(10) DEFAULT NULL,
  `c_contact` varchar(15) DEFAULT NULL,
  `c_address` varchar(255) DEFAULT NULL,
  `incidentDate` date DEFAULT NULL,
  `incidentTime` time DEFAULT NULL,
  `incidentNature` varchar(100) DEFAULT NULL,
  `incidentAddress` varchar(255) DEFAULT NULL,
  `acc_firstname` varchar(50) DEFAULT NULL,
  `acc_middlename` varchar(50) DEFAULT NULL,
  `acc_lastname` varchar(50) DEFAULT NULL,
  `acc_suffix` varchar(10) DEFAULT NULL,
  `acc_contact` varchar(15) DEFAULT NULL,
  `acc_address` varchar(255) DEFAULT NULL,
  `witnesses` text DEFAULT NULL,
  `witnessesContact` text DEFAULT NULL,
  `incidentDescription` text DEFAULT NULL,
  `actionTaken` text DEFAULT NULL,
  `attachments` varchar(255) DEFAULT NULL,
  `blotter_status` int(11) NOT NULL DEFAULT 0 COMMENT '0=Open, 1=Closed, 2=Under Investigation',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_ID` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `complaint_nature` varchar(255) NOT NULL,
  `incident_location` varchar(255) NOT NULL,
  `date_happened` date NOT NULL,
  `time_happened` varchar(50) NOT NULL,
  `witness` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `attachments` varchar(255) NOT NULL,
  `preferred_solution` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=Pending, 1=Verified, 2=Rejected, 3=Solved',
  `date_confirmed` datetime NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_history`
--

CREATE TABLE `log_history` (
  `log_Id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `login_datetime` datetime NOT NULL,
  `logout_datetime` datetime NOT NULL,
  `logout_remarks` int(11) NOT NULL DEFAULT 0 COMMENT '0=Logged out successfully, 1=Unable to logout last login'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_Id` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `suffix` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `birthplace` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `civilstatus` varchar(20) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `house_no` varchar(50) DEFAULT NULL,
  `street_name` varchar(100) DEFAULT NULL,
  `purok` varchar(50) DEFAULT NULL,
  `zone` varchar(50) DEFAULT NULL,
  `barangay` varchar(50) DEFAULT NULL,
  `municipality` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT 'User',
  `verification_code` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `firstname`, `middlename`, `lastname`, `suffix`, `dob`, `age`, `email`, `contact`, `birthplace`, `gender`, `civilstatus`, `occupation`, `religion`, `house_no`, `street_name`, `purok`, `zone`, `barangay`, `municipality`, `province`, `region`, `image`, `password`, `user_type`, `verification_code`, `created_at`) VALUES
(66, 'Admin', '', 'Admin', 'Admin', '1995-03-02', 28, 'admin@gmail.com', '9359428963', 'Female', 'Male', 'Single', 'Admin', 'Iglesia Ni Cristo', 'Dsas', 'Admin', 'Admin', 'Dsa', 'Admin', 'Admin', '', 'Admins', '2.jpg', '0192023a7bbd73250516f069df18b500', 'Admin', 0, '2022-11-24 16:00:00'),
(90, 'Resident', 'Resident', 'Resident', 'Resident', '1990-01-29', 34, 'resident@gmail.com', '9359428963', 'Resident', 'Male', 'Single', 'Resident', 'Judaism', 'Resident', 'ResidentResident', 'Resident', 'Resident', 'Resident', 'Resident', 'Dsa', 'Resident', 'pexels-photo-769772.jpeg', '0192023a7bbd73250516f069df18b500', 'User', NULL, '2024-02-10 18:50:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blotter`
--
ALTER TABLE `blotter`
  ADD PRIMARY KEY (`blotter_Id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_ID`);

--
-- Indexes for table `log_history`
--
ALTER TABLE `log_history`
  ADD PRIMARY KEY (`log_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blotter`
--
ALTER TABLE `blotter`
  MODIFY `blotter_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_history`
--
ALTER TABLE `log_history`
  MODIFY `log_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
