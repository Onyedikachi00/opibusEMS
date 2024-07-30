-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 01:11 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opibusdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `ID` int(11) NOT NULL,
  `Name` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `UserName` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `MobileNumber` varchar(20) DEFAULT NULL,
  `Email` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `Password` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `UserType` varchar(20) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `Position` varchar(225) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `MaritalS` varchar(20) DEFAULT NULL,
  `DoB` date DEFAULT NULL,
  `NoK` text DEFAULT NULL,
  `NoKphone` text DEFAULT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`ID`, `Name`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `UserType`, `department`, `Position`, `Address`, `Gender`, `MaritalS`, `DoB`, `NoK`, `NoKphone`, `filename`) VALUES
(5, 'Mr. Cypo', 'admin2', '2147483647', 'cipi00@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-06-16 16:43:46', 'Super Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(13, 'Emmanuel Cyprian', 'admin1', '08039415623', 'onyedikachic00@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-07-04 13:10:41', 'Super Admin', '', '', 'Plot 216 Army estate, Kurudu, Abuja, Nigeria.', 'Male', 'Married', '2002-09-05', 'Alex de First', '0905500', ''),
(15, 'Alex de First', 'HR1', '0800000', 'durbtee@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-07-26 19:31:14', 'HR Officer', '', '', 'Cloud9', 'Male', 'Married', '2004-10-19', 'Nma', '0900000', '');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `deptName` varchar(255) DEFAULT NULL,
  `hodName` varchar(255) DEFAULT NULL,
  `deptDescription` longtext DEFAULT NULL,
  `deptCourses` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `deptName`, `hodName`, `deptDescription`, `deptCourses`) VALUES
(1, 'Computer Science', 'Mary David', '<p>To be clear, I&rsquo;m not saying that these are wonderful outcomes. I&rsquo;m saying that you will go on breathing. I&rsquo;m saying that even if you lose your job, you will not starve to death. If you lose all your money, you will not freeze to death. If you make an ass of yourself, you will not doom yourself to a loveless existence. You will go through an uncomfortable period. You will manage. No matter what the outcome, life will go on. Realizing this gives you license to fail. Which gives you license to try. Which is something most people never do. Most people stick with the comfortable option. Whether it is the job, the relationship, or just staying quiet at a party instead of chatting up a stranger. So when you are trying new things, taking risks, and succeeding or failing without an existential crisis, people notice. You appear unshakeable. You are undaunted by the fear of failure that controls their lives.</p>\r\n', 'Cyber Security, Software Engineering, Machine Learning'),
(3, 'Business Admin', 'Chris Brown', 'Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur est lobortis quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin quis iaculis tellus. Etiam ac vehicula eros, pharetra consectetur dui. Aliquam convallis neque eget tellus efficitur, eget maximus massa imperdiet. Morbi a mattis velit. Donec hendrerit venenatis justo, eget scelerisque tellus pharetra a.', 'Business Management, Accounting, Financial Adviser'),
(4, 'English and Communication', 'Mandy Simpson', 'YouTubeVoidzy See more videos of Random words Generator in English Short videos of random words generator in english How to Generate Random Text in MS Word using formula || Write Random Paragraph in Microsoft Word YouTube @GATEWAY OF How to Generate Random Text in MS Word using formula || Write Random Paragraph in Microsoft Word 😲 Want to expand your vocabulary? DO THIS! Everyday go to Randomwordgenerator.com Click ·”generate random word” Use the Cambridge Learner’s Dictionary to find out what the new word is. Then… Make a sentence with this word. If you want to check that your sentence is correct. Just ask chatgpt “Is this sentence correct …..” If you want to learn more and practice your English daily with me. Write the word “DAILY” below 👇🏼👇🏼👇🏼 #english #englishlearning #ingles #aprenderingles #inglesfacil #ing Facebook @English with Parker 😲 Want to expand your vocabulary? DO THIS! Everyday go to Randomwordgenerator.com Click ·”generate random word” Use the Cambridge Learner’s Dictionary to find out what the new word is. Then… Make a sentence with this word. If you want to check that your sentence is correct. Just ask chatgpt “Is this sentence correct …..” If you want to learn more and practice your English daily with me. Write the word “DAILY” below 👇🏼👇🏼👇🏼 #english #englishlearning #ingles #aprenderingles #inglesfacil #ing 10 | playing wordle with a random word generator YouTube @Voidzy 10 | playing wordle with a random word generator How to Generate Random Text in Ms Word | Write Random Paragraph in Microsoft Word | H4k Strive YouTube @H4K Strive How to Generate Random Text in Ms Word | Write Random Paragraph in Microsoft Word | H4k Strive Lorem Ipsum Alternative: Create Random Text using MS Word YouTube @Chris Amit Lorem Ipsum Alternative: Create Random Text using MS Word Global web icon Random Lists https://www.randomlists.com/random-words Random Word Generator — Get a list of random words - Random … WEBGenerate a list of random words from 2500+ of the most common English words. You can also filter by part of speech\r\nns 100 random words and definitions 3 random words and definitions make words with these letters', 'Mass Communication, English Language');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `appid` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `appid`, `file_name`, `created_at`) VALUES
(91, 78, 'MRP_Debug1-[CY21M03D08-R135.0.BL]-420pm.log', '2024-07-25 10:47:41'),
(92, 79, 'MRP_Debug1-[CY21M03D08-R135.0.BL]-420pm.log', '2024-07-25 10:48:31'),
(93, 80, 'MRP_Debug1-[CY21M03D08-R135.0.BL]-420pm.log', '2024-07-25 10:49:32'),
(94, 80, 'MRP_Project-[CY21M03D08-R135.0.BL]-420pm.log', '2024-07-25 10:49:32'),
(95, 81, 'Screenshot (1).png', '2024-07-27 17:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `hodtable`
--

CREATE TABLE `hodtable` (
  `ID` int(11) NOT NULL,
  `Name` varchar(120) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Position` varchar(225) DEFAULT NULL,
  `MobileNumber` varchar(20) NOT NULL,
  `Email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_estonian_ci NOT NULL,
  `Password` varchar(120) NOT NULL,
  `AdminRegdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserType` varchar(20) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `MaritalS` varchar(20) DEFAULT NULL,
  `DoB` date DEFAULT NULL,
  `NoK` text DEFAULT NULL,
  `NoKphone` varchar(20) DEFAULT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hodtable`
--

INSERT INTO `hodtable` (`ID`, `Name`, `UserName`, `Position`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `UserType`, `department`, `Address`, `Gender`, `MaritalS`, `DoB`, `NoK`, `NoKphone`, `filename`) VALUES
(1, 'Mandy Simpson', 'HOD1', 'Yellow Lady, Blue Lady, Red Lady', '5556543211', 'Homer@yellow.com', 'f925916e2754e5e03f75dd58a5733251', '2024-06-24 17:50:27', 'HOD', 'English and Communication', 'House', 'Female', 'Married', '1987-07-09', 'Bart Simpson', '0134987544', ''),
(2, 'Mary David', 'HOD2', '', '08011111111', 'mary4rmNazareth@mama.love', 'f925916e2754e5e03f75dd58a5733251', '2024-06-27 01:02:43', 'HOD', 'Computer Science', 'Wonder Land ', 'Female', 'Married', '1899-04-05', 'Joseph', '0134987543', ''),
(3, 'Chris Brown', 'HOD3', 'Teaches yam education.', '08119503695', 'Cbrezzy@energy.com', 'f925916e2754e5e03f75dd58a5733251', '2024-07-04 12:36:11', 'HOD', 'Business Admin', 'Pluto', 'Male', 'Single', '1995-02-16', 'Indigo', '60', '');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_text` longtext DEFAULT NULL,
  `reply_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `sender_name` varchar(255) DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `reply_id` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`reply_text`, `reply_date`, `sender_name`, `filename`, `status`, `reply_id`, `ID`) VALUES
('What', '2024-07-17 03:02:27', 'Goat', '', 1, 1, 1),
('Testing  Replies', '2024-07-17 11:30:30', 'Mr. Cypo', '', 1, 9, 1),
('Heyyoo', '2024-07-17 11:33:41', 'Emmanuel Cyprian', 'MSDM-Key.txt', 1, 10, 3),
('Hey Mr. Cypo', '2024-07-17 15:56:47', 'Emmanuel Cyprian', '', 1, 11, 2),
('Sup Nigga\r\n', '2024-07-17 15:58:24', 'Mr. Cypo', '', 1, 12, 2),
('It\'s working bra😂', '2024-07-17 16:00:00', 'Emmanuel Cyprian', '', 1, 13, 1),
('I\'m cool', '2024-07-17 16:01:33', 'Emmanuel Cyprian', '', 1, 14, 2),
('I\'m cool', '2024-07-17 16:02:16', 'Emmanuel Cyprian', '', 1, 15, 2),
('Bro', '2024-07-18 13:26:02', '', '', 1, 21, 11),
('No name still', '2024-07-18 13:27:36', '', '', 1, 22, 11),
('What\r\n', '2024-07-18 13:31:09', 'Eze Maxwell', '', 1, 23, 11),
('Still?', '2024-07-18 13:34:37', 'Emmanuel Cyprian', '', 1, 24, 11),
('Now it\'s good', '2024-07-18 13:35:16', 'Eze Maxwell', '', 1, 25, 11),
('Sup M', '2024-07-19 00:59:27', 'Eze Maxwell', '', 1, 26, 14),
('ni jiao shenme ming zi', '2024-07-19 01:00:42', 'Eze Maxwell', '', 1, 27, 12),
('Fuck', '2024-07-26 14:58:53', 'Emmanuel Cyprian', '', 0, 29, 18),
('What', '2024-07-26 15:41:43', 'Emmanuel Cyprian', '', 0, 30, 17),
('huh\r\n', '2024-07-26 15:56:58', 'Emmanuel Cyprian', '', 0, 31, 18),
('What', '2024-07-26 21:05:39', 'Emmanuel Cyprian', '', 0, 32, 18),
('Bitch', '2024-07-26 21:10:38', 'Emmanuel Cyprian', '', 0, 33, 19),
('No', '2024-07-26 21:10:49', 'Emmanuel Cyprian', '', 0, 34, 20),
('Mail\'s working fine.', '2024-07-27 18:36:16', 'Alex de First', '', 0, 35, 25),
('Mail\'s working fine 2', '2024-07-27 18:37:13', 'Alex de First', '', 0, 36, 25);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(1, 'Test', 'testing calendar', '2024-07-15 23:10:00', '2024-07-27 23:10:00'),
(2, 'Test', 'testing calendar', '2024-07-15 23:10:00', '2024-07-27 23:10:00'),
(3, 'Test', 'testing calendar', '2024-07-15 23:10:00', '2024-07-27 23:10:00'),
(4, 'Test', 'testing calendar', '2024-07-15 23:10:00', '2024-07-27 23:10:00'),
(5, 'Test', 'testing calendar', '2024-07-15 23:10:00', '2024-07-27 23:10:00'),
(6, 'Test', 'Testing still', '2024-07-22 23:18:00', '2024-07-31 23:18:00'),
(7, 'Test', 'hey, the fuck', '2024-07-18 23:26:00', '2024-07-27 23:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `stafftable`
--

CREATE TABLE `stafftable` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `UserName` varchar(20) DEFAULT NULL,
  `Position` varchar(225) DEFAULT NULL,
  `MobileNumber` varchar(20) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `UserType` varchar(20) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `MaritalS` varchar(20) DEFAULT NULL,
  `DoB` date DEFAULT NULL,
  `NoK` text DEFAULT NULL,
  `NoKphone` varchar(20) DEFAULT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stafftable`
--

INSERT INTO `stafftable` (`ID`, `Name`, `UserName`, `Position`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `UserType`, `department`, `Address`, `Gender`, `MaritalS`, `DoB`, `NoK`, `NoKphone`, `filename`) VALUES
(1, 'Mark Henry', 'staff1', 'Year2 Social Science Lecturer', '09023456789', 'marcusH@mail.go', 'dc647eb65e6711e155375218212b3964', '2024-06-24 17:45:20', 'Staff', 'Computer Science', 'Carlifonia', 'Male', 'Single', '1977-02-21', 'Matthew', '0987654321', ''),
(3, 'Eze Maxwell', 'staff2', 'Year 2 English teacher', '0709568789', 'Ezego1@cash.com', 'f925916e2754e5e03f75dd58a5733251', '2024-06-24 17:52:10', 'Staff', 'English and Communication', 'Bikini Bottom', 'Female', 'Divorced', '1990-04-03', 'Mintap', '12877937637', ''),
(4, 'Eunice Matthew', 'staff3', 'Final year Business Ethics Teacher, Yr3 Business Comm Skills Lecturer.', '0709568789', 'Euro2@cup.com', 'f925916e2754e5e03f75dd58a5733251', '2024-06-27 14:54:55', 'Staff', 'Business Admin', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(6, 'Ahmed Idris', 'staff4', 'Assistant HOD computer', '0803547804', 'Aidris00@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-06-28 19:53:49', 'Staff', 'Computer Science', 'Asokoro', 'Male', 'Married', '1989-04-12', 'John', '11223344', ''),
(9, 'Ben Tyson', 'staff5', 't', '0814562676', 'Ben10@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-06-28 19:57:03', 'Staff', 'Business Admin', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(10, 'Emily Tope', 'staff6', 'None', '0709568789', 'stonegirl2@mail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-07-04 13:15:15', 'Staff', 'English and Communication', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(11, 'Dr Dre', 'staff7', 'Beats Maker', '071365483623', 'anu@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-07-20 14:46:12', 'Staff', 'English and Communication', ' Abuja, Nigeria.', 'Male', 'Married', '1991-08-12', 'Snoop', '08064987543', 'MSDM-Key.txt');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(20) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `UserType` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `UserType`) VALUES
(1, 'Emmanuel', 'Onye', 123459000, 'onye@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-04-24 18:30:00', 1),
(2, 'Admin', 'admin', 1234596321, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2023-03-16 18:30:00', 1),
(3, 'Anuj kumar', 'akr305', 1234567891, 'ak@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2023-03-16 18:30:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblapplication`
--

CREATE TABLE `tblapplication` (
  `appid` int(11) NOT NULL,
  `appName` varchar(120) DEFAULT NULL,
  `appJob` varchar(120) DEFAULT NULL,
  `appNum` varchar(15) DEFAULT NULL,
  `appEmail` varchar(150) DEFAULT NULL,
  `appAdress` varchar(150) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `applyStatus` varchar(100) NOT NULL DEFAULT 'Pending',
  `interviewStatus` varchar(255) DEFAULT 'Pending',
  `acceptedDate` date DEFAULT NULL,
  `acceptedTime` time DEFAULT NULL,
  `staffInvolved` mediumtext DEFAULT NULL,
  `officialRemark` mediumtext DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `approvalStatus` varchar(255) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblapplication`
--

INSERT INTO `tblapplication` (`appid`, `appName`, `appJob`, `appNum`, `appEmail`, `appAdress`, `message`, `postingDate`, `applyStatus`, `interviewStatus`, `acceptedDate`, `acceptedTime`, `staffInvolved`, `officialRemark`, `updationDate`, `approvalStatus`) VALUES
(78, 'Ujang Maman', 'HR Manager', '0134987544', 'Mann@mail.com', 'Aso villa', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-07-25 10:47:41', 'Accepted', 'Conducted', '2024-08-10', '17:00:00', 'Ahmed Idris', 'Bad', '2024-07-25 13:25:26', 'Pending'),
(79, 'Mary Ann', 'IT Specialist', '0134987544', 'AliceO@mail.com', 'Home', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-07-25 10:48:31', 'Accepted', 'Conducted', '2024-07-26', '14:00:00', 'Chris Brown', 'Good', '2024-07-25 13:18:09', 'Disapproved'),
(80, 'Ice Cube', 'Rap Gangsta', '10001', 'Icee@mail.cpt', 'Compton', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2024-07-25 10:49:32', 'Accepted', 'Conducted', '2024-07-25', '12:00:00', 'Mandy Simpson', 'Official Remark Test 1', '2024-07-25 13:08:05', 'Approved'),
(81, 'Lila Bennett', 'Data Analyst', '+1 (555) 123-45', 'lila.bennett@example.com', '123 Elm Street, Anytown, USA', 'Photography, Hiking, and Cooking', '2024-07-27 17:45:50', 'Accepted', 'Conducted', '2024-07-10', '20:30:00', 'Mary David', 'Good ', '2024-07-27 18:32:34', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE `tblclasses` (
  `id` int(11) NOT NULL,
  `teacherId` int(10) DEFAULT NULL,
  `className` varchar(255) DEFAULT NULL,
  `ageGroup` varchar(150) DEFAULT NULL,
  `classTiming` varchar(120) DEFAULT NULL,
  `capacity` varchar(10) DEFAULT NULL,
  `feacturePic` varchar(255) DEFAULT NULL,
  `addedBy` varchar(150) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`id`, `teacherId`, `className`, `ageGroup`, `classTiming`, `capacity`, `feacturePic`, `addedBy`, `postingDate`) VALUES
(1, 1, 'Art and Drawing', '3-4 Year', '11-12 PM', '20', '5a202841bcc60530918a7523a5848cd31679164973.jpg', 'admin', '2023-03-18 18:42:53'),
(2, 2, 'Dance', '2-3 Year', '12-1 PM', '25', 'f73fd44701a97d0ca929f3ff41dca5171679165124.jpg', 'admin', '2023-03-18 18:45:24'),
(3, 3, 'Language and Speaking', '4-5 Year', '12-1 PM', '30', 'be498647266a2b65d6f1660ec7fe4ad61679249810.jpg', 'admin', '2023-03-18 18:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbllaterequest`
--

CREATE TABLE `tbllaterequest` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `UserName` varchar(255) NOT NULL,
  `Position` varchar(255) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `PhoneNumber` varchar(120) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `Reason` longtext DEFAULT NULL,
  `Status` varchar(120) NOT NULL DEFAULT 'Pending',
  `UserType` varchar(120) DEFAULT NULL,
  `Department` varchar(120) DEFAULT NULL,
  `Comment` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllaterequest`
--

INSERT INTO `tbllaterequest` (`ID`, `Name`, `UserName`, `Position`, `Email`, `PhoneNumber`, `Date`, `Time`, `Reason`, `Status`, `UserType`, `Department`, `Comment`) VALUES
(1, 'Ben Tyson', '', NULL, 'Ben10@gmail.com', '0814562676', '2024-07-25', 'Probably never🙂', 'Cause I got shit to do', 'Pending', 'Staff', 'Business Admin', NULL),
(2, 'Ahmed Idris', '', NULL, 'Aidris00@gmail.com', '0803547804', '2024-07-11', 'Whenever we done 😉', 'Will be at my b\'s place', 'Approved', 'Staff', 'Computer Science', 'Nicee😉'),
(3, 'Chris Brown', '', NULL, 'Aidris00@gmail.com', '0803547804', '2024-07-03', 'Neverrrr', 'I just feel like it ', 'Pending', 'Staff', 'Computer Science', NULL),
(4, 'Mary David', '', NULL, 'Aidris00@gmail.com', '0803547804', '2024-07-04', '2024-07-04T10:28', 'Gotta poo ', 'Rejected', 'Staff', 'Computer Science', 'Not Okay'),
(5, 'Ahmed Idris', '', NULL, 'Aidris00@gmail.com', '0803547804', '2024-07-11', '2024-07-12T10:22', 'E no concern you', 'Rejected', 'Staff', 'Computer Science', 'Testing Hod\'s update1'),
(6, 'Eunice Matthew', '', NULL, 'Euro2@cup.com', '0709568789', '2024-07-04', '2024-06-27T10:30', 'Cause I\'m happy,still', 'Pending', 'Staff', 'Business Admin', NULL),
(7, 'Ahmed Idris', '', NULL, 'Aidris00@gmail.com', '0803547804', '2024-07-05', '2024-07-05T16:04', 'Testing shits', 'Pending', 'Staff', 'Computer Science', NULL),
(8, 'Ahmed Idris', '', NULL, 'Aidris00@gmail.com', '0803547804', '2024-07-04', '2024-07-05T19:08', 'yeah', 'Rejected', 'Staff', 'Computer Science', 'No yeah'),
(9, 'Mandy Simpson', '', NULL, 'Homer@yellow.com', '5556543210', '2024-07-27', '2024-07-12T11:30', 'Try mee', 'Approved', 'HOD', 'English and Communication', 'Okay'),
(10, 'Eze Maxwell', 'staff2', NULL, 'Ezego1@cash.com', '0709568789', '2024-07-24', '2024-07-26T10:00', 'Testing 1', 'Approved', 'Staff', 'English and Communication', 'Good'),
(11, 'Eze Maxwell', 'staff2', NULL, 'Ezego1@cash.com', '0709568789', '2024-07-23', '2024-07-23T11:03', 'Testing 2', 'Rejected', 'Staff', 'English and Communication', 'GOOD 2'),
(12, 'Mary David', '', NULL, 'mary4rmNazareth@mama.love', '08011111111', '2024-07-24', '2024-07-24T07:34', 'Trial 1', 'Approved', 'HOD', 'Computer Science', 'Yes of course'),
(13, 'Eunice Matthew', 'staff3', NULL, 'Euro2@cup.com', '0709568789', '2024-07-23', '2024-07-23T12:00', 'Bathed Late', 'Pending', 'Staff', 'Business Admin', NULL),
(14, 'Mary David', '', NULL, 'mary4rmNazareth@mama.love', '08011111111', '2024-08-02', '2024-07-06T12:12', 'Testing Alert', 'Pending', 'HOD', 'Computer Science', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblleaverequest`
--

CREATE TABLE `tblleaverequest` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Position` varchar(255) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `PhoneNumber` varchar(120) DEFAULT NULL,
  `Date` date DEFAULT current_timestamp(),
  `StartTime` date DEFAULT NULL,
  `EndTime` date DEFAULT NULL,
  `Reason` longtext DEFAULT NULL,
  `Substitute` varchar(225) DEFAULT NULL,
  `Status` varchar(120) NOT NULL DEFAULT 'Pending',
  `UserType` varchar(120) DEFAULT NULL,
  `Department` varchar(120) DEFAULT NULL,
  `Comment` longtext DEFAULT NULL,
  `filename` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblleaverequest`
--

INSERT INTO `tblleaverequest` (`ID`, `Name`, `Position`, `Email`, `PhoneNumber`, `Date`, `StartTime`, `EndTime`, `Reason`, `Substitute`, `Status`, `UserType`, `Department`, `Comment`, `filename`) VALUES
(12, 'Ahmed Idris', NULL, 'Aidris00@gmail.com', '0803547804', '2024-07-02', '2024-04-04', '2024-05-04', 'Liver', 'Mark Henry', 'Approved', 'Staff', 'Computer Science', 'Pool', 'pexels-mikhail-nilov-7988238.jpg'),
(13, 'Ahmed Idris', NULL, 'Aidris00@gmail.com', '0803547804', '2024-07-03', '2024-07-04', '2024-08-12', 'I finna kill you, if u don\'t let me', 'Mark Henry', 'Approved', 'Staff', 'Computer Science', 'Have a good time', ''),
(14, 'Ahmed Idris', NULL, 'Aidris00@gmail.com', '0803547804', '2024-07-03', '2024-07-04', '2024-07-26', 'egg', 'Mark Henry', 'Rejected', 'Staff', 'Computer Science', 'none', ''),
(15, 'Ahmed Idris', NULL, 'Aidris00@gmail.com', '0803547804', '2024-07-03', '2024-07-04', '2024-07-26', 'egg', 'Mark Henry', 'Rejected', 'Staff', 'Computer Science', 'eg and eggy', ''),
(16, 'Mandy Simpson', NULL, 'Aidris00@gmail.com', '0803547804', '2024-07-03', '2024-07-04', '2024-07-26', 'Hired for murder', NULL, 'Approved', 'HOD', 'Computer Science', 'Good luck ', 'file.jpg'),
(17, 'Chris Brown', NULL, 'Cbrezzy@energy.com', '08119503695', '2024-07-03', '2024-07-04', '2024-07-27', 'Cause I can', '', 'Pending', 'HOD', 'Computer Science', NULL, ''),
(18, 'Eunice Matthew', NULL, 'Euro2@cup.com', '0709568789', '2024-07-03', '2024-07-08', '2024-07-20', 'Liver pool', 'Eunice Matthew', 'Rejected', 'Staff', 'Business Admin', 'Man City', 'carousel1.jpg'),
(19, 'Eunice Matthew', NULL, 'Euro2@cup.com', '0709568789', '2024-07-03', '2024-07-04', '2024-08-11', 'Cause I\'m happy', 'None', 'Pending', 'Staff', 'Business Admin', NULL, ''),
(20, 'Eze Maxwell', NULL, 'Ezego1@cash.com', '0709568789', '2024-07-21', '2024-07-21', '2024-07-25', 'I\'m pressed🙂', 'None', 'Approved', 'Staff', 'English and Communication', 'Oya go', 'index.php'),
(21, 'Eunice Matthew', NULL, 'Euro2@cup.com', '0709568789', '2024-07-23', '2024-07-24', '2024-07-26', 'Trying 1', 'Eunice Matthew', 'Approved', 'Staff', 'Business Admin', 'GOOD', 'd3d_antilag.log'),
(22, 'Mary David', NULL, 'mary4rmNazareth@mama.love', '08011111111', '2024-07-23', '2024-07-24', '2024-12-25', 'Going Home, Bethlehem.', 'Mary David', 'Rejected', 'HOD', 'Computer Science', 'No! We know Santa ain\'t real.😡😖', 'Screenshot_22-7-2024_181328_localhost.jpeg'),
(23, 'Eunice Matthew', NULL, 'Euro2@cup.com', '0709568789', '2024-07-23', '2024-07-24', '2024-07-25', 'Trying Leave', 'Ben Tyson', 'Pending', 'Staff', 'Business Admin', NULL, ''),
(24, 'Ahmed Idris', NULL, 'Aidris00@gmail.com', '0803547804', '2024-07-29', '2024-07-29', '2024-07-30', 'Testing ', 'Chris Brown', 'Pending', 'Staff', 'Computer Science', NULL, ''),
(40, 'Ahmed Idris', NULL, 'Aidris00@gmail.com', '0803547804', '2024-07-29', '2024-07-30', '2024-08-07', 'Test2', 'Chris Brown', 'Pending', 'Staff', 'Computer Science', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblletter`
--

CREATE TABLE `tblletter` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblletter`
--

INSERT INTO `tblletter` (`id`, `name`, `content`) VALUES
(2, 'million dollar baby ', '<blockquote>\r\n<h1><tt><em><strong>I ain\'t never rep a set</strong></em></tt></h1>\r\n</blockquote>\r\n'),
(3, 'mystery lady', '<h1>Trial ✨</h1>\r\n\r\n<p>Read on to better understand the functionalities you can test with this demo.</p>\r\n\r\n<h2>💡 Did you know that…</h2>\r\n\r\n<ul>\r\n	<li>CKEditor is <strong>customizable</strong>. You can fine-tune the set of enabled plugins, available toolbar buttons, and the behavior of features.</li>\r\n	<li>The editor supports <strong>@mentions</strong>. Start typing <code>@An</code> to see available suggestions.</li>\r\n	<li>You can <strong>paste content</strong> from Word or Google Docs, retaining the original document structure and formatting.</li>\r\n	<li>Thanks to Import from Word <img alt=\"Import from Word\" src=\"https://ckeditor.com/assets/images/ckdemo/feature-rich/import_word.png\" style=\"height:20px; width:20px\" />, you can <strong>convert</strong> a DOCX document into HTML and edit it in CKEditor 5.</li>\r\n	<li>You can <strong>export your document</strong> to PDF <img alt=\"Export to PDF\" src=\"https://ckeditor.com/assets/images/ckdemo/feature-rich/export_pdf.png\" style=\"height:20px; width:20px\" /> or Word <img alt=\"Export to Word\" src=\"https://ckeditor.com/assets/images/ckdemo/feature-rich/export_word.png\" style=\"height:20px; width:20px\" /> with a single click.</li>\r\n</ul>\r\n\r\n<h2>🖼️ Inserting Images and Image Editing</h2>\r\n\r\n<p>Inserting and editing images is seamless and efficient, thanks to the powerful capabilities and the intuitive interface of the <a href=\"https://ckeditor.com/docs/ckeditor5/latest/features/file-management/ckbox.html#installation\" target=\"_blank\">CKBox integration</a>. Click the CKBox icon <img alt=\"Browse files\" src=\"https://ckeditor.com/assets/images/ckdemo/feature-rich/browse-files.png\" style=\"height:20px; width:20px\" /> to manage or edit images and other files in this demo.</p>\r\n\r\n<p><strong>Effortless Image Insertion:</strong></p>\r\n\r\n<ul>\r\n	<li>Drag and Drop: Simply drag images from your device or directly from web sources into the editor.</li>\r\n	<li>URL Uploading: Paste image URLs for quick embedding without leaving the editor.</li>\r\n</ul>\r\n\r\n<p><strong>Advanced Image Editing:</strong></p>\r\n\r\n<ul>\r\n	<li>Editing: Resize, crop, and rotate directly from the editor, ensuring perfect placement every time.</li>\r\n	<li>Customizable Styles: Apply various presets to format your image according to social media standards.</li>\r\n</ul>\r\n\r\n<p> </p>\r\n\r\n<h2>🚀 Autoformatting in CKEditor 5</h2>\r\n\r\n<p>Some features of CKEditor 5 might be hard to spot at first glance. Thanks to <strong>autoformatting</strong>, you can use handy shortcuts in the editor to format the text on the fly:</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan=\"7\"><strong>Block formatting</strong></td>\r\n			<td>Bulleted list</td>\r\n			<td>Start a line with <code>*</code> or <code>-</code> followed by a space.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Numbered list</td>\r\n			<td>Start a line with <code>1.</code> or <code>1)</code> followed by a space.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>To-do list</td>\r\n			<td>Start a line with <code>[ ]</code> or <code>[x]</code> followed by a space to insert an unchecked or checked list item.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Headings</td>\r\n			<td>Start a line with <code>#</code>, <code>##</code>, or <code>###</code> followed by a space to create a heading 1, heading 2, or heading 3.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Block quote</td>\r\n			<td>Start a line with <code>></code> followed by a space.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Code block</td>\r\n			<td>Start a line with <code>```</code>.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Horizontal line</td>\r\n			<td>Start a line with <code>---</code>.</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"4\"><strong>Inline formatting</strong></td>\r\n			<td><strong>Bold</strong></td>\r\n			<td>Type <code>**</code> or <code>__</code> around your text.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><em>Italic</em></td>\r\n			<td>Type <code>*</code> or <code>_</code> around your text.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><code>Code</code></td>\r\n			<td>Type <code>`</code> around your text.</td>\r\n		</tr>\r\n		<tr>\r\n			<td><s>Strikethrough</s></td>\r\n			<td>Type <code>~~</code> around your text.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p> </p>\r\n'),
(5, 'wednesday', 'italawa'),
(7, 'King solomon', 'wisdom'),
(9, 'Template1', 'if ur name ain\'t santan u can\'t relate'),
(10, 'Welcom Letter', '<h1><img alt=\"Bilancino Hotel logo\" src=\"https://ckeditor.com/docs/ckeditor4/latest/examples/assets/image/bilancino-logo.png\" style=\"float:right; height:75px; width:75px\" />The Flavorful Tuscany Meetup</h1>\r\n<br/>\r\n<br/>\r\n<h2><strong>Welcome letter</strong></h2>\r\n\r\n<p>Dear Guest,</p>\r\n\r\n<p>We are delighted to welcome you to the annual <em>Flavorful Tuscany Meetup</em> and hope you will enjoy the programme as well as your stay at the <a href=\"https://ckeditor.com\">Bilancino Hotel</a>.</p>\r\n\r\n<p>Please find attached the full schedule of the event.</p>\r\n\r\n<blockquote>\r\n<p>The annual Flavorful Tuscany meetups are always a culinary discovery. You get the best of Tuscan flavors during an intense one-day stay at one of the top hotels of the region. All the sessions are lead by top chefs passionate about their profession. I would certainly recommend to save the date in your calendar for this one!</p>\r\n\r\n<p>Angelina Calvino, food journalist</p>\r\n</blockquote>\r\n\r\n<p>Please arrive at the <a href=\"https://ckeditor.com\">Bilancino Hotel</a> reception desk at least <strong>half an hour earlier</strong> to make sure that the registration process goes as smoothly as possible.</p>\r\n\r\n<p>We look forward to welcoming you to the event.</p>\r\n\r\n<p><img alt=\"Victoria Valc signature\" src=\"https://ckeditor.com/docs/ckeditor4/latest/examples/assets/image/signature.png\" style=\"height:101px; width:180px\" /></p>\r\n\r\n<p><strong>Victoria Valc</strong></p>\r\n\r\n<p><strong>Event Manager</strong><br />\r\nBilancino Hotel</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<h2><strong>The Flavorful Tuscany Meetup Schedule</strong></h2>\r\n\r\n'),
(11, 'letter from Canva', '<p>﻿</p>\r\n\r\n<p><img alt=\"Blue Green Gradient Transparent Illustration\" src=\"https://media-public.canva.com/7joKg/MAEL5F7joKg/1/s2.png\" style=\"height:50px; width:800px\" /></p>\r\n\r\n<p>GiveDirectly</p>\r\n\r\n<pre style=\"text-align:right\">\r\nP.O. Box 3221, New York, NY 10008\r\n\r\n+1 (646) 504-4837\r\n\r\nwww.givedirectly.org</pre>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">﻿</p>\r\n\r\n<p>Iroha</p>\r\n\r\n<p>Formalize your correspondence with those in the business.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>To Whom It May Concern:</p>\r\n\r\n<p>A letterhead refers to the heading at the top of a document. It usually consists of a name, an address or a logo. This often appears in letters created by companies and individuals to communicate messages, whether within the team, with business partners, or with clients.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Letterheads are important branding tools as well, as they are sent out to a wide audience. They can set the tone for messages while showcasing your company&rsquo;s expertise and professionalism. This makes it important for you to create a letterhead that captures your brand&#39;s identity while presenting important details. It helps to create a template that you can use for different occasions, from interoffice memos to customer correspondences.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This is a list:</p>\r\n\r\n<ul>\r\n	<li>List out bullet points</li>\r\n	<li>For finer details</li>\r\n	<li>You may also use checkboxes</li>\r\n	<li>To keep track of things</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">Best regards,</p>\r\n\r\n<p style=\"text-align:right\">Signature</p>\r\n\r\n<p style=\"text-align:right\">Your Name and Role</p>\r\n\r\n<p style=\"text-align:right\">info@givedirectly.org</p>\r\n'),
(21, 'tyty3', 'Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula massa, gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem interdum molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor. Nam malesuada orci non ornare vulputate. Ut ut sollicitudin magna. Vestibulum eget ligula ut ipsum venenatis ultrices. Proin bibendum bibendum augue ut luctus.'),
(23, 'Testing1', ''),
(24, 'tyty', 'cjgjjjjjcgvbsjkcaaaaaaak');

-- --------------------------------------------------------

--
-- Table structure for table `tblmessages`
--

CREATE TABLE `tblmessages` (
  `ID` int(11) NOT NULL,
  `MailType` varchar(255) DEFAULT NULL,
  `Subject` mediumtext DEFAULT NULL,
  `SentBy` varchar(255) DEFAULT NULL,
  `Name` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `UserType` varchar(255) DEFAULT NULL,
  `MailContent` longtext DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `MailDate` datetime DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmessages`
--

INSERT INTO `tblmessages` (`ID`, `MailType`, `Subject`, `SentBy`, `Name`, `UserType`, `MailContent`, `filename`, `MailDate`, `status`) VALUES
(1, 'Others', 'Test', 'Emmanuel Cyprian', 'Mr. Cypo', 'Super Admin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'd3d_antilag.log', '2024-07-17 13:38:49', 0),
(2, 'Training & Development', 'Test2', 'Mr. Cypo', 'Emmanuel Cyprian', 'Super Admin', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', '2024-07-17 14:22:45', 1),
(3, 'Complaints & Enquiries', 'Trial', 'Emmanuel Cyprian', 'Mr. Cypo', 'Super Admin', 'Sup Nigga', '', '2024-07-18 00:03:43', 0),
(4, 'Others', 'Getting Inbox code', 'Emmanuel Cyprian', 'Mr. Cypo', 'Super Admin', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 'MRP_Project-[CY21M03D08-R135.0.BL]-420pm.log, MSDM-Key.txt', '2024-07-18 00:36:55', 0),
(6, 'Complaints & Enquiries', 'Test', 'Ahmed Idris', 'Emmanuel Cyprian', 'Super Admin', 'Testing Admin mail', 'MRP_Project-[CY21M03D08-R135.0.BL]-420pm.log', '2024-07-18 10:47:31', 1),
(8, 'Training & Development', 'W3Schools is optimized', 'Ahmed Idris', 'Mr. Cypo', 'Super Admin', 'For learning and training. Examples might be simplified to improve reading and learning. Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content. While using W3Schools, you agree to have read and accepted our terms of use, cookie and privacy policy.', '', '2024-07-18 12:30:17', 0),
(9, 'Training & Development', 'Hello staff Ahmed', 'Ahmed Idris', 'Ahmed Idris', 'Staff', 'Testin staff communication', '', '2024-07-18 17:33:40', 1),
(10, 'Training & Development', 'Hey mama', 'Emmanuel Cyprian', 'Mary David', 'Super Admin', 'Testing mic 1,2,3', '', '2024-07-18 18:54:35', 1),
(11, 'Others', 'Testing, still.', 'Emmanuel Cyprian', 'Eze Maxwell', 'Super Admin', 'Hey Max', '', '2024-07-19 01:56:40', 0),
(12, 'Others', 'Testing, still.', 'Ahmed Idris', 'Emmanuel Cyprian', 'Super Admin', 'Wo hen hao, ni ne?', '', '2024-07-19 02:01:54', 3),
(13, 'Others', 'Testing, still.', 'Eze Maxwell', 'Emmanuel Cyprian', 'Super Admin', 'jian tian wo hen hao', 'index.php', '2024-07-19 02:05:44', 1),
(14, 'Others', 'Testing, still.', 'Emmanuel Cyprian', 'Eze Maxwell', 'Super Admin', 'Hey Max, again', '', '2024-07-19 02:33:01', 1),
(15, 'Others', 'Testing', 'Eunice Matthew', 'Emmanuel Cyprian', 'Super Admin', 'Good Morning sir', '', '2024-07-24 06:02:23', 1),
(16, 'Training & Development', 'Testing2', 'Eunice Matthew', 'Emmanuel Cyprian', 'Super Admin', 'Just trying dis shit again', '', '2024-07-24 11:44:06', 1),
(17, 'Others', 'Fuck you', 'Eunice Matthew', 'Emmanuel Cyprian', 'Super Admin', 'Mail Test 15', '', '2024-07-24 11:48:45', 2),
(18, 'Others', 'Fuck you again', 'Eunice Matthew', 'Emmanuel Cyprian', 'Super Admin', 'Testing mail 17', '', '2024-07-24 11:50:02', 7),
(19, 'Others', 'Play', 'Emmanuel Cyprian', 'Emmanuel Cyprian', 'Super Admin', 'Play a lot', '', '2024-07-26 22:08:55', 1),
(20, 'Others', 'Play', 'Emmanuel Cyprian', 'Emmanuel Cyprian', 'Super Admin', 'Play a lot', '', '2024-07-26 22:10:16', 1),
(21, 'Training & Development', 'Testing, still.', 'Emmanuel Cyprian', 'Alex de First', 'Super Admin', 'Hey HR', '', '2024-07-26 22:12:25', 1),
(22, 'Others', 'Test', 'Ahmed Idris', 'Alex de First', 'Super Admin', 'When an alert is dismissed, the element is completely removed from the page structure. If a keyboard user dismisses the alert using the close button, their focus will suddenly be lost and, depending on the browser, reset to the start of the page/document. For this reason, we recommend including additional JavaScript that listens for the closed.bs.alert event and programmatically sets focus() to the most appropriate location in the page. If you’re planning to move focus to a non-interactive element that normally does not receive focus, make sure to add tabindex=\"-1\" to the element.', '', '2024-07-27 15:42:48', 0),
(23, 'Training & Development', 'Trial', 'Ahmed Idris', 'Mary David', 'HOD', 'When an alert is dismissed, the element is completely removed from the page structure. If a keyboard user dismisses the alert using the close button, their focus will suddenly be lost and, depending on the browser, reset to the start of the page/document. For this reason, we recommend including additional JavaScript that listens for the closed.bs.alert event and programmatically sets focus() to the most appropriate location in the page. If you’re planning to move focus to a non-interactive element that normally does not receive focus, make sure to add tabindex=\"-1\" to the element.', '', '2024-07-27 15:43:19', 1),
(24, 'Others', 'Getting Inbox code', 'Ahmed Idris', 'Mary David', 'HOD', 'When an alert is dismissed, the element is completely removed from the page structure. If a keyboard user dismisses the alert using the close button, their focus will suddenly be lost and, depending on the browser, reset to the start of the page/document.', '', '2024-07-27 18:01:29', 1),
(25, 'Others', 'Testing Sending Mail to HR Officer', 'Emmanuel Cyprian', 'Alex de First', 'Super Admin', 'When an alert is dismissed, the element is completely removed from the page structure. If a keyboard user dismisses the alert using the close button, their focus will suddenly be lost and, depending on the browser, reset to the start of the page/document. For this reason, we recommend including additional JavaScript that listens for the closed.bs.alert event and programmatically sets focus() to the most appropriate location in the page. If you’re planning to move focus to a non-interactive element that normally does not receive focus, make sure to add tabindex=\"-1\" to the element.', 'Screenshot (2).png', '2024-07-27 19:22:32', 1),
(26, 'Training & Development', 'Test', 'Emmanuel Cyprian', '', 'Super Admin', 'JavaScript that listens for the closed.bs.alert event and programmatically sets focus() to the most appropriate location in the page. If you’re planning to move focus to a non-interactive element that normally does not receive focus, make sure to add tabindex=\"-1\" to the element.', '', '2024-07-29 02:28:01', 0),
(27, 'Others', 'Test', '<br /><b>Notice</b>:  Undefined variable: usename in <b>C:\\xampp\\htdocs\\opibus\\admin\\composemail.php</b> on line <b>294</b><br />', 'Mark Henry', 'Staff', 'Testing multiple user', '', '2024-07-29 03:25:17', 0),
(28, 'Others', 'Test', '<br /><b>Notice</b>:  Undefined variable: usename in <b>C:\\xampp\\htdocs\\opibus\\admin\\composemail.php</b> on line <b>294</b><br />', 'Eze Maxwell', 'Staff', 'Testing multiple user', '', '2024-07-29 03:25:17', 0),
(29, 'Disciplinary Actions', 'Testing, still.', '<br /><b>Notice</b>:  Undefined variable: usename in <b>C:\\xampp\\htdocs\\opibus\\admin\\composemail.php</b> on line <b>294</b><br />', 'Mark Henry', 'Staff', 'Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', '2024-07-29 03:29:01', 0),
(30, 'Disciplinary Actions', 'Testing, still.', '<br /><b>Notice</b>:  Undefined variable: usename in <b>C:\\xampp\\htdocs\\opibus\\admin\\composemail.php</b> on line <b>294</b><br />', 'Eunice Matthew', 'Staff', 'Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', '2024-07-29 03:29:01', 0),
(31, 'Training & Development', 'Getting Inbox code', 'Chris Brown', 'Ahmed Idris', 'Staff', 'Test', '', '2024-07-29 07:14:56', 1),
(32, 'Training & Development', 'Getting Inbox code', 'Chris Brown', 'Ahmed Idris', 'Staff', 'Test', '', '2024-07-29 07:21:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About us', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, NULL, '2024-05-06 21:26:31'),
(2, 'contactus', 'Contact Us', 'Somewhere in Abuja, Nigeria.', 'opibus@gmail.com', 803456780, '2024-05-06 21:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `tblteachers`
--

CREATE TABLE `tblteachers` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `teacherEmail` varchar(255) DEFAULT NULL,
  `teacherMobileNo` bigint(11) DEFAULT NULL,
  `teacherSubject` varchar(255) DEFAULT NULL,
  `teacherPic` varchar(255) DEFAULT NULL,
  `AddedBy` varchar(120) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblteachers`
--

INSERT INTO `tblteachers` (`id`, `fullName`, `teacherEmail`, `teacherMobileNo`, `teacherSubject`, `teacherPic`, `AddedBy`, `regDate`) VALUES
(1, 'Amit Kumar Singh', 'amitk@gmail.com', 1231231231, 'Art Drawing', 'ddc01577479ff46e6d42027edc5fba5c1679016943.jpg', 'admin', '2023-03-17 01:35:43'),
(2, 'Ms. Divya', 'divya@test.com', 1425362514, 'Dance', '06940303f580ef89805d5242166fb8671679017065.jpg', 'admin', '2023-03-17 01:37:45'),
(3, 'Amit Singh', 'amkt12334@test.com', 1232123210, 'Language & Speaking', 'ddc01577479ff46e6d42027edc5fba5c1679277564.jpg', 'admin', '2023-03-17 01:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbltemporaryexit`
--

CREATE TABLE `tbltemporaryexit` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Position` varchar(255) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `PhoneNumber` varchar(120) DEFAULT NULL,
  `Date` date DEFAULT current_timestamp(),
  `StartTime` datetime DEFAULT NULL,
  `EndTime` datetime DEFAULT NULL,
  `Reason` longtext DEFAULT NULL,
  `Substitute` varchar(225) DEFAULT NULL,
  `Status` varchar(120) NOT NULL DEFAULT 'Pending',
  `UserType` varchar(120) DEFAULT NULL,
  `Department` varchar(120) DEFAULT NULL,
  `Comment` longtext DEFAULT NULL,
  `filename` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltemporaryexit`
--

INSERT INTO `tbltemporaryexit` (`ID`, `Name`, `Position`, `Email`, `PhoneNumber`, `Date`, `StartTime`, `EndTime`, `Reason`, `Substitute`, `Status`, `UserType`, `Department`, `Comment`, `filename`) VALUES
(19, 'Ben Tyson', NULL, 'Ben10@gmail.com', '0814562676', '2024-07-02', '2024-07-12 00:00:00', '2024-07-26 00:00:00', 'Trying to exit this bitch', 'Eunice Matthew', 'Pending', 'Staff', 'Business Admin', NULL, 'gallery6 (1).jpg'),
(21, 'Ahmed Idris', NULL, 'Aidris00@gmail.com', '0803547804', '2024-07-03', '2024-07-05 00:00:00', '2024-07-25 00:00:00', 'I quit', 'Mark Henry, Ahmed Idris', 'Approved', 'Staff', 'Computer Science', 'Goodd', '15 Best Books on Productivity.jpg'),
(22, 'Mandy Simpson', NULL, 'Aidris00@gmail.com', '0803547804', '2024-07-03', '2024-07-05 00:00:00', '2024-07-25 00:00:00', 'Fu*k tha police', 'Ahmed Idris', 'Pending', 'Staff', 'Computer Science', NULL, '15 Best Books on Productivity.jpg'),
(23, 'Ahmed Idris', NULL, 'Aidris00@gmail.com', '0803547804', '2024-07-03', '2024-08-01 10:35:00', '2024-07-26 08:35:00', 'None', '', 'Rejected', 'Staff', 'Computer Science', 'Cause I can', ''),
(24, 'Ahmed Idris', NULL, 'Aidris00@gmail.com', '0803547804', '2024-07-03', '2024-08-01 10:35:00', '2024-07-26 08:35:00', 'None', '', 'Rejected', 'Staff', 'Computer Science', 'Aiiit', ''),
(25, 'Ahmed Idris', NULL, 'Aidris00@gmail.com', '0803547804', '2024-07-03', '2024-08-01 10:35:00', '2024-07-26 08:35:00', 'None', '', 'Pending', 'Staff', 'Computer Science', NULL, ''),
(26, 'Chris Brown', NULL, 'Cbrezzy@energy.com', '08119503695', '2024-07-03', '2024-08-01 10:35:00', '2024-07-26 08:35:00', 'None', '', 'Rejected', 'Staff', 'Computer Science', 'Bitch, since u ain\'t got none.', ''),
(27, 'Eunice Matthew', NULL, 'Euro2@cup.com', '0709568789', '2024-07-03', '2024-07-04 10:32:00', '2024-07-18 07:33:00', 'NONE ', 'None', 'Rejected', 'Staff', 'Business Admin', 'Not Permitted ', 'marvin-meyer-SYTO3xs06fU-unsplash.jpg'),
(28, 'Eunice Matthew', NULL, 'Euro2@cup.com', '0709568789', '2024-07-03', '2024-07-03 00:24:00', '2024-07-19 01:30:00', 'None Just Wanna Exit this place', 'Ben Tyson', 'Pending', 'Staff', 'Business Admin', NULL, 'gallery5 (1).jpg, gallery3 (1).jpg'),
(29, 'Mary David', NULL, 'mary4rmNazareth@mama.love', '08011111111', '2024-07-23', '2024-07-17 07:44:00', '2024-08-01 07:44:00', 'Trial 2', 'None', 'Pending', 'HOD', 'Computer Science', NULL, ''),
(30, 'Eunice Matthew', NULL, 'Euro2@cup.com', '0709568789', '2024-07-24', '2024-07-24 12:16:00', '2024-08-02 12:16:00', 'Testing Status', 'Ben Tyson', 'Approved', 'Staff', 'Business Admin', 'Good', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appid` (`appid`);

--
-- Indexes for table `hodtable`
--
ALTER TABLE `hodtable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stafftable`
--
ALTER TABLE `stafftable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblapplication`
--
ALTER TABLE `tblapplication`
  ADD PRIMARY KEY (`appid`);

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbllaterequest`
--
ALTER TABLE `tbllaterequest`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblleaverequest`
--
ALTER TABLE `tblleaverequest`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblletter`
--
ALTER TABLE `tblletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmessages`
--
ALTER TABLE `tblmessages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblteachers`
--
ALTER TABLE `tblteachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltemporaryexit`
--
ALTER TABLE `tbltemporaryexit`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `hodtable`
--
ALTER TABLE `hodtable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stafftable`
--
ALTER TABLE `stafftable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblapplication`
--
ALTER TABLE `tblapplication`
  MODIFY `appid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbllaterequest`
--
ALTER TABLE `tbllaterequest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblleaverequest`
--
ALTER TABLE `tblleaverequest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tblletter`
--
ALTER TABLE `tblletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblmessages`
--
ALTER TABLE `tblmessages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblteachers`
--
ALTER TABLE `tblteachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbltemporaryexit`
--
ALTER TABLE `tbltemporaryexit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`appid`) REFERENCES `tblapplication` (`appid`);

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `ID` FOREIGN KEY (`ID`) REFERENCES `tblmessages` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
