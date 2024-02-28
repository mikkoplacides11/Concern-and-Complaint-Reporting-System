DROP TABLE IF EXISTS blotter;

CREATE TABLE `blotter` (
  `blotter_Id` int(11) NOT NULL AUTO_INCREMENT,
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
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`blotter_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS complaint;

CREATE TABLE `complaint` (
  `complaint_ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`complaint_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO complaint VALUES("6","90","SI EDWIN NANGAAWAY NG BATA BINATO NG TISNELAS","CALIT PANGASINAN","2024-02-14","10:30","RAMEL","basta yon","barangay2.jpg","ipakulong ","1","0000-00-00 00:00:00","2024-02-13 21:29:13");



DROP TABLE IF EXISTS log_history;

CREATE TABLE `log_history` (
  `log_Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_Id` int(11) NOT NULL,
  `login_datetime` datetime NOT NULL,
  `logout_datetime` datetime NOT NULL,
  `logout_remarks` int(11) NOT NULL DEFAULT 0 COMMENT '0=Logged out successfully, 1=Unable to logout last login',
  PRIMARY KEY (`log_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO log_history VALUES("131","90","2024-02-13 21:26:13","2024-02-13 21:30:50","0");
INSERT INTO log_history VALUES("132","66","2024-02-13 21:31:06","0000-00-00 00:00:00","0");



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `user_Id` int(11) NOT NULL AUTO_INCREMENT,
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
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users VALUES("66","Admin","","Admin","Admin","1995-03-02","28","admin@gmail.com","9359428963","Female","Male","Single","Admin","Iglesia Ni Cristo","Dsas","Admin","Admin","Dsa","Admin","Admin","","Admins","2.jpg","0192023a7bbd73250516f069df18b500","Admin","0","2022-11-24 08:00:00");
INSERT INTO users VALUES("90","Resident","Resident","Resident","Resident","1990-01-29","34","resident@gmail.com","9359428963","Resident","Male","Single","Resident","Judaism","Resident","ResidentResident","Resident","Resident","Resident","Resident","Dsa","Resident","pexels-photo-769772.jpeg","0192023a7bbd73250516f069df18b500","User","","2024-02-10 10:50:35");



