-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 03, 2023 at 09:12 PM
-- Server version: 8.0.33
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessType`
--

CREATE TABLE `accessType` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `accessType`
--

INSERT INTO `accessType` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'teacher'),
(3, 'student'),
(4, 'librarian');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int NOT NULL,
  `chapter_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `chapter_name`) VALUES
(1, 'four'),
(2, 'two'),
(3, 'three'),
(4, 'four'),
(5, 'five');

-- --------------------------------------------------------

--
-- Table structure for table `standards`
--

CREATE TABLE `standards` (
  `id` int NOT NULL,
  `std` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `standards`
--

INSERT INTO `standards` (`id`, `std`) VALUES
(1, 'IV'),
(2, 'II'),
(3, 'III'),
(4, 'IV'),
(5, 'V');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `id` int NOT NULL,
  `First_Name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Last_Name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `DOB` date NOT NULL,
  `Roll_no` int NOT NULL,
  `Batch` varchar(32) NOT NULL,
  `Phone` bigint NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`id`, `First_Name`, `Last_Name`, `DOB`, `Roll_no`, `Batch`, `Phone`, `image`) VALUES
(1, 'Aarav', 'Singh', '1998-06-01', 2003, '45678', 9876543210, ''),
(2, 'Priya', 'Patel', '1998-06-01', 2002, 'B', 9876543210, ''),
(3, 'Rajesh', 'Sharma', '1998-06-01', 2003, 'C', 9876543210, ''),
(4, 'Riya', 'Shah', '1998-06-01', 2009, '23', 9876543210, ''),
(5, 'Ram', 'Kapoor', '1998-06-01', 2005, 'E', 9876543210, ''),
(6, 'Aarav', 'Singh', '1998-06-01', 2001, 'A', 9876543210, ''),
(7, 'Priya', 'Patel', '1998-06-01', 2004, '234', 9876543210, ''),
(8, 'Rajesh', 'Sharma', '1998-06-01', 2003, 'C', 9876543210, ''),
(9, 'Riya', 'Shah', '1998-06-01', 2004, 'D', 9876543210, ''),
(10, 'Ram', 'Kapoor', '1998-06-01', 2005, 'E', 9876543210, '');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `name` int NOT NULL,
  `percentage` int NOT NULL,
  `branch` int NOT NULL,
  `passingyear` int NOT NULL,
  `DOB` int NOT NULL,
  `Bloodgroup` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int NOT NULL,
  `subject_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`) VALUES
(1, 'php'),
(2, 'html'),
(3, 'php');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(32) NOT NULL,
  `phone` bigint NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`) VALUES
(2, 'asdf', 1234567, 'asdf', '1234'),
(3, 'isha dadhania', 345678, 'isha', '1234'),
(4, 'sita', 123456, 'sita', '12345'),
(5, 'ram', 12345678, 'ram', '1234'),
(6, 'shyam', 123456, 'shyam', '1234'),
(7, 'zxcvb', 1234567, 'zxcvb', '1234'),
(8, 'qwer', 123456, 'qwer', '1234'),
(9, 'isha dadhania', 752873278, 'abvc@gmail.com', '12345'),
(10, 'lkj', 12345, 'lkj', '1234'),
(11, 'mnb', 1234, 'mnb', '1234'),
(12, 'qwert', 12345, 'qwert', '12345'),
(13, 'isha', 9510455032, 'isha', '1234'),
(14, 'kreya', 123456789, 'kreya', '1234'),
(15, 'riddhi', 987654321, 'riddhi', '1234'),
(16, 'vidhi', 123456789, 'vidhi', '1234'),
(17, 'nidhi', 987456321, 'nidhi', '1234'),
(18, 'heena', 987456321, 'heena', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `userType`
--

CREATE TABLE `userType` (
  `user_id` int NOT NULL,
  `access_type_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userType`
--

INSERT INTO `userType` (`user_id`, `access_type_id`) VALUES
(10, 1),
(11, 1),
(18, 1),
(16, 2),
(17, 2),
(12, 3),
(13, 3),
(14, 3),
(15, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessType`
--
ALTER TABLE `accessType`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standards`
--
ALTER TABLE `standards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userType`
--
ALTER TABLE `userType`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `access_type_id` (`access_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `standards`
--
ALTER TABLE `standards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userType`
--
ALTER TABLE `userType`
  ADD CONSTRAINT `userType_ibfk_1` FOREIGN KEY (`access_type_id`) REFERENCES `accessType` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
