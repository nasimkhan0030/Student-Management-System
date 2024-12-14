-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 08:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `admision_id` int(5) NOT NULL,
  `class` int(5) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_roll` int(10) DEFAULT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`admision_id`, `class`, `student_name`, `student_roll`, `user_id`) VALUES
(23, 2, 'Nasim Khan', 1, 1),
(41, 16, 'Rakibul Hasan', 1, 32),
(42, 16, 'Siam Hasan', 2, 33),
(43, 2, 'A B', 2, 36),
(44, 3, 'C D', 1, 37),
(45, 3, 'S A', 2, 38),
(46, 5, 'Mafi Khan', 1, 40),
(48, 5, 'W Q', 3, 41);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`) VALUES
(2, 'Two'),
(3, 'Three'),
(5, 'Four'),
(6, 'Five'),
(16, 'One');

-- --------------------------------------------------------

--
-- Table structure for table `partial_registration`
--

CREATE TABLE `partial_registration` (
  `rg_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partial_registration`
--

INSERT INTO `partial_registration` (`rg_id`, `name`, `email`, `phone`, `dob`, `gender`, `address`) VALUES
(8, 'Nasim', 'admin@gmail.com', '45543665788', '2024-12-07', 'male', 'magura');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(5) NOT NULL,
  `class` int(5) NOT NULL,
  `student_roll` int(5) NOT NULL,
  `subject` int(5) NOT NULL,
  `midterm` int(2) NOT NULL,
  `final` int(2) NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `inserted_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `class`, `student_roll`, `subject`, `midterm`, `final`, `updated_by`, `inserted_by`) VALUES
(27, 16, 1, 21, 40, 60, NULL, 'admin@gmail.com'),
(28, 16, 1, 22, 40, 60, NULL, 'admin@gmail.com'),
(29, 16, 1, 23, 30, 50, NULL, 'admin@gmail.com'),
(30, 2, 1, 21, 40, 60, NULL, 'admin@gmail.com'),
(31, 2, 1, 22, 40, 60, NULL, 'admin@gmail.com'),
(32, 2, 1, 23, 36, 56, NULL, 'admin@gmail.com'),
(33, 16, 2, 21, 40, 60, NULL, 'admin@gmail.com'),
(34, 16, 2, 22, 38, 44, NULL, 'admin@gmail.com'),
(35, 16, 2, 23, 40, 60, NULL, 'admin@gmail.com'),
(36, 2, 2, 21, 40, 60, NULL, 'admin@gmail.com'),
(37, 2, 2, 22, 35, 55, NULL, 'admin@gmail.com'),
(38, 2, 2, 23, 40, 56, NULL, 'admin@gmail.com'),
(39, 3, 1, 21, 34, 55, NULL, 'admin@gmail.com'),
(40, 3, 1, 22, 33, 54, NULL, 'admin@gmail.com'),
(41, 3, 1, 35, 40, 55, NULL, 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section_category` int(5) NOT NULL,
  `section_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_category`, `section_name`) VALUES
(1, 1, 'A'),
(2, 2, 'A'),
(3, 3, 'A'),
(4, 5, 'A'),
(5, 1, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(5) NOT NULL,
  `subject_category` varchar(20) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_category`, `subject_name`, `subject_code`) VALUES
(21, '2', 'Bangla', '101'),
(22, '2', 'English', '107'),
(23, '2', 'Math', '109'),
(24, '3', 'Bangla', '101'),
(25, '3', 'English', '107'),
(26, '3', 'Math', '109'),
(27, '5', 'Bangla', '101'),
(28, '5', 'English', '107'),
(29, '5', 'Math', '109'),
(30, '6', 'Bangla', '101'),
(31, '6', 'English', '107'),
(32, '6', 'Math', '109'),
(33, '16', 'Bangla', '101'),
(34, '16', 'English', '107'),
(35, '16', 'Math', '109');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `user_first_name` varchar(20) NOT NULL,
  `user_last_name` varchar(20) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `mother_name` varchar(50) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT 'student',
  `imagename` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `dob`, `father_name`, `mother_name`, `gender`, `email`, `password`, `user_type`, `imagename`) VALUES
(1, 'Nasim', 'Khan', '2002-02-25', NULL, NULL, 'male', 'user1@gmail.com', '1234', 'student', NULL),
(2, 'Nasim', 'Khan', '2024-11-20', NULL, NULL, 'male', 'teacher@gmail.com', '1234', 'teacher', NULL),
(3, 'admin', 'admin', '', NULL, NULL, '', 'admin@gmail.com', '1234', 'admin', NULL),
(32, 'Rakibul', 'Hasan', '2024-12-14', NULL, NULL, 'male', 'user2@gmail.com', '1234', 'student', NULL),
(33, 'Siam', 'Hasan', '2024-12-05', NULL, NULL, 'female', 'user3@gmail.com', '1234', 'student', NULL),
(36, 'A', 'B', '2024-12-16', NULL, NULL, 'male', 'user4@gmail.com', '1234', 'student', NULL),
(37, 'C', 'D', '2024-12-14', NULL, NULL, 'male', 'user5@gmail.com', '1234', 'student', NULL),
(39, 'S', 'A', '2024-12-02', NULL, NULL, 'male', 'user6@gmail.com', '1234', 'student', NULL),
(40, 'Mafi', 'Khan', '2024-12-01', NULL, NULL, 'female', 'user7@gmail.com', '1234', 'student', NULL),
(41, 'W', 'Q', '2024-12-04', NULL, NULL, 'male', 'user8@gmail.com', '1234', 'student', NULL),
(44, 'T', 'T', '2024-12-14', NULL, NULL, 'male', 'teacher2@gmail.com', '1234', 'teacher', NULL),
(45, 'D', 'D', '2024-12-07', NULL, NULL, 'male', 'teacher3@gmail.com', '1234', 'teacher', NULL),
(46, 'E', 'E', '2024-12-14', NULL, NULL, 'male', 'teacher4@gmail.com', '1234', 'teacher', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`admision_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `partial_registration`
--
ALTER TABLE `partial_registration`
  ADD PRIMARY KEY (`rg_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `admision_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `partial_registration`
--
ALTER TABLE `partial_registration`
  MODIFY `rg_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
