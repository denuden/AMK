-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 01:50 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amk`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_history_tbl`
--

CREATE TABLE `access_history_tbl` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `date_accessed` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_history_tbl`
--

INSERT INTO `access_history_tbl` (`id`, `employee_id`, `firstname`, `lastname`, `phone`, `address`, `date_accessed`) VALUES
(48, 20, 'Von ', 'Tandoc', '09123456789', 'New Cabalan', '2022-07-26 08:05:51'),
(49, 21, 'Ken', 'Ammay', '09123456789', 'New Cabalan', '2022-07-26 08:06:30'),
(50, 22, 'Royce', 'Ogot', '09123456789', 'New Cabalan', '2022-07-26 08:06:48'),
(53, 22, 'Royce', 'Ogot', '09123456789', 'New Cabalan', '2022-07-26 08:12:11'),
(54, 21, 'Ken', 'Ammay', '09123456789', 'New Cabalan', '2022-07-26 08:13:50'),
(55, 20, 'Von ', 'Tandoc', '09123456789', 'New Cabalan', '2022-07-26 08:16:20'),
(62, 24, 'Juan', 'Dela Cruz', '092222', 'New Cabalan', '2022-07-26 11:15:45'),
(63, 24, 'Juan', 'Dela Cruz', '092222', 'New Cabalan', '2022-07-26 11:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` longtext NOT NULL,
  `unique_key` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `username`, `password`, `unique_key`, `status`) VALUES
(1, 'admin', '$2y$10$03Zs12RboGlYF.wu.B4y/eTqRIxflGU4wAH6hQtBp1PlbdIU1G5wq', '0162cfbd93299f4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `allowance_tbl`
--

CREATE TABLE `allowance_tbl` (
  `id` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `salary` text NOT NULL,
  `allowance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allowance_tbl`
--

INSERT INTO `allowance_tbl` (`id`, `position`, `salary`, `allowance`) VALUES
(10, 'Supervisor', '10000', '1500'),
(14, 'Associate', '6500', '1000'),
(15, 'Regular', '5000', '500'),
(16, 'Trainee', '4000', '250');

-- --------------------------------------------------------

--
-- Table structure for table `captcha_tbl`
--

CREATE TABLE `captcha_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` double NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `captcha_tbl`
--

INSERT INTO `captcha_tbl` (`id`, `name`, `code`, `image`) VALUES
(1, '1', 416579, 'captcha (1).jpg'),
(2, '2', 489612, 'captcha (2).jpg'),
(3, '3', 893019, 'captcha (3).jpg'),
(4, '4', 539049, 'captcha (4).jpg'),
(5, '5', 964247, 'captcha (5).jpg'),
(6, '6', 169023, 'captcha (6).jpg'),
(7, '7', 125724, 'captcha (7).jpg'),
(8, '8', 916265, 'captcha (8).jpg'),
(9, '9', 534718, 'captcha (9).jpg'),
(10, '10', 705138, 'captcha (10).jpg'),
(11, '11', 726025, 'captcha (11).jpg'),
(12, '12', 332735, 'captcha (12).jpg'),
(13, '13', 78318, 'captcha (13).jpg'),
(14, '14', 342569, 'captcha (14).jpg'),
(15, '15', 129941, 'captcha (15).jpg'),
(16, '16', 645315, 'captcha (16).jpg'),
(17, '17', 51342, 'captcha (17).jpg'),
(18, '18', 142879, 'captcha (18).jpg'),
(19, '19', 987527, 'captcha (19).jpg'),
(20, '20', 971262, 'captcha (20).jpg'),
(21, '21', 465867, 'captcha (21).jpg'),
(22, '22', 495830, 'captcha (22).jpg'),
(23, '23', 140693, 'captcha (23).jpg'),
(24, '24', 82516, 'captcha (24).jpg'),
(25, '25', 362611, 'captcha (25).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `deduction_tbl`
--

CREATE TABLE `deduction_tbl` (
  `id` int(100) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `mode` varchar(50) NOT NULL,
  `start` varchar(50) NOT NULL,
  `until` varchar(50) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `deduction` varchar(100) NOT NULL DEFAULT 'Unspecified',
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deduction_tbl`
--

INSERT INTO `deduction_tbl` (`id`, `employee_id`, `mode`, `start`, `until`, `reason`, `deduction`, `status`, `date_requested`) VALUES
(52, 23, 'Absent', '2022-07-29', '2022-07-29', 'Fever', '250', 'Approved', '2022-07-26 08:09:38'),
(53, 23, 'Leave', '2022-08-01', '2022-08-06', 'Vacation', '0', 'Declined', '2022-07-26 08:10:12'),
(54, 22, 'Cash Advance', '2022-07-30', '2022-07-30', 'Budget', '500', 'Approved', '2022-07-26 08:13:13'),
(55, 21, 'Cash Advance', '2022-07-28', '2022-07-30', 'Bills', '1000', 'Approved', '2022-07-26 08:15:19'),
(56, 20, 'Leave', '2022-08-01', '2022-08-20', 'Vacation', '0', 'Declined', '2022-07-26 08:17:04'),
(57, 23, 'Absent', '2022-07-30', '2022-07-30', 'Fever', '500', 'Approved', '2022-07-26 11:09:02'),
(58, 23, 'Leave', '2022-07-26', '2022-07-26', 'Vacation', '0', 'Declined', '2022-07-26 11:09:16'),
(59, 24, 'Absent', '2022-07-30', '2022-07-26', 'fever', '500', 'Approved', '2022-07-26 11:19:16'),
(60, 24, 'Leave', '2022-07-26', '2022-07-26', 'vacation', '0', 'Declined', '2022-07-26 11:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbl`
--

CREATE TABLE `employee_tbl` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `position` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `allowance` varchar(50) NOT NULL,
  `emp_username` varchar(25) NOT NULL,
  `emp_password` longtext NOT NULL,
  `unique_key` varchar(15) NOT NULL DEFAULT '00',
  `first_time_login` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_tbl`
--

INSERT INTO `employee_tbl` (`id`, `firstname`, `lastname`, `phone`, `age`, `gender`, `address`, `position`, `salary`, `allowance`, `emp_username`, `emp_password`, `unique_key`, `first_time_login`) VALUES
(20, 'Von ', 'Tandoc', '09123456789', 21, 'Male', 'New Cabalan', 'Supervisor', '10000', '1500', 'Vontadoc!23', '$2y$10$SShE7WOf0K3w7hq9F8/e5eb9Uuv8EdIcdSG4qL2aVaeOMJ6ttntjG', '02062dfa05f554f', 1),
(21, 'Ken', 'Ammay', '09123456789', 21, 'Male', 'New Cabalan', 'Associate', '6500', '1000', 'Kenammay!2', '$2y$10$LqksmrMwy3wn1gDOjWY08uZV7L8t0V6FVPIQZvS/RrOKyNc2dyHry', '02162dfa086e2f1', 1),
(22, 'Royce', 'Ogot', '09123456789', 21, 'Male', 'New Cabalan', 'Regular', '5000', '500', 'Royceogot!23', '$2y$10$1FVbaLohmWcygjW2raSsmOqK0NLUugJ3ltf8Hx1qz7s7ZWpzt7sfy', '02262dfa098b31e', 1),
(24, 'Juan', 'Dela Cruz', '092222', 21, 'Male', 'New Cabalan', 'Trainee', '4000', '250', 'Juan1234!', '$2y$10$sImHm901ovkcQzUpO7hbo.zsm5hyIHj5ToaNkGOQilFFZ.Mv2fXyW', '02462dfcce1537a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payroll_history_tbl`
--

CREATE TABLE `payroll_history_tbl` (
  `id` int(11) NOT NULL,
  `employee_id` int(50) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `salary` double NOT NULL,
  `allowance_amount` double NOT NULL,
  `deductions` text NOT NULL,
  `total_deduction_amount` double NOT NULL,
  `total_salary` double NOT NULL,
  `start` varchar(255) NOT NULL,
  `until` varchar(255) NOT NULL,
  `date_released` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll_history_tbl`
--

INSERT INTO `payroll_history_tbl` (`id`, `employee_id`, `fullname`, `position`, `salary`, `allowance_amount`, `deductions`, `total_deduction_amount`, `total_salary`, `start`, `until`, `date_released`) VALUES
(20, 20, 'Von  Tandoc', 'Supervisor', 10000, 1500, '[]', 0, 10000, '2022-07-01', '2022-07-15', '2022-07-26 08:20:37'),
(21, 21, 'Ken Ammay', 'Associate', 6500, 1000, '[{\"id\":\"55\",\"employee_id\":\"21\",\"mode\":\"Cash Advance\",\"start\":\"2022-07-28\",\"until\":\"2022-07-30\",\"reason\":\"Bills\",\"deduction\":\"1000\",\"status\":\"Approved\",\"date_requested\":\"2022-07-26 16:15:19\"}]', 1000, 5500, '2022-07-01', '2022-07-15', '2022-07-26 08:20:59'),
(22, 22, 'Royce Ogot', 'Regular', 5000, 500, '[{\"id\":\"54\",\"employee_id\":\"22\",\"mode\":\"Cash Advance\",\"start\":\"2022-07-30\",\"until\":\"2022-07-30\",\"reason\":\"Budget\",\"deduction\":\"500\",\"status\":\"Approved\",\"date_requested\":\"2022-07-26 16:13:13\"}]', 500, 4500, '2022-07-01', '2022-07-15', '2022-07-26 08:21:12'),
(23, 23, 'John Lloyd Mariano', 'Regular', 5000, 500, '[{\"id\":\"52\",\"employee_id\":\"23\",\"mode\":\"Absent\",\"start\":\"2022-07-29\",\"until\":\"2022-07-29\",\"reason\":\"Fever\",\"deduction\":\"250\",\"status\":\"Approved\",\"date_requested\":\"2022-07-26 16:09:38\"}]', 250, 4750, '2022-07-01', '2022-07-15', '2022-07-26 08:21:23'),
(24, 20, 'Von  Tandoc', 'Supervisor', 10000, 1500, '[]', 0, 10000, '2022-07-16', '2022-07-31', '2022-07-26 08:21:57'),
(25, 21, 'Ken Ammay', 'Associate', 6500, 1000, '[{\"id\":\"55\",\"employee_id\":\"21\",\"mode\":\"Cash Advance\",\"start\":\"2022-07-28\",\"until\":\"2022-07-30\",\"reason\":\"Bills\",\"deduction\":\"1000\",\"status\":\"Approved\",\"date_requested\":\"2022-07-26 16:15:19\"}]', 1000, 5500, '2022-07-16', '2022-07-31', '2022-07-26 08:22:07'),
(26, 22, 'Royce Ogot', 'Regular', 5000, 500, '[{\"id\":\"54\",\"employee_id\":\"22\",\"mode\":\"Cash Advance\",\"start\":\"2022-07-30\",\"until\":\"2022-07-30\",\"reason\":\"Budget\",\"deduction\":\"500\",\"status\":\"Approved\",\"date_requested\":\"2022-07-26 16:13:13\"}]', 500, 4500, '2022-07-16', '2022-07-31', '2022-07-26 08:22:18'),
(27, 23, 'John Lloyd Mariano', 'Regular', 5000, 500, '[{\"id\":\"52\",\"employee_id\":\"23\",\"mode\":\"Absent\",\"start\":\"2022-07-29\",\"until\":\"2022-07-29\",\"reason\":\"Fever\",\"deduction\":\"250\",\"status\":\"Approved\",\"date_requested\":\"2022-07-26 16:09:38\"}]', 250, 4750, '2022-07-16', '2022-07-31', '2022-07-26 08:22:28'),
(28, 20, 'Von  Tandoc', 'Supervisor', 10000, 1500, '[]', 0, 10000, '2022-07-01', '2022-07-15', '2022-07-26 09:14:40'),
(29, 23, 'John Lloyd Mariano', 'Regular', 5000, 500, '[{\"id\":\"52\",\"employee_id\":\"23\",\"mode\":\"Absent\",\"start\":\"2022-07-29\",\"until\":\"2022-07-29\",\"reason\":\"Fever\",\"deduction\":\"250\",\"status\":\"Approved\",\"date_requested\":\"2022-07-26 16:09:38\"}]', 250, 4750, '2022-07-01', '2022-07-15', '2022-07-26 09:26:54'),
(30, 24, 'Juan Dela Cruz', 'Trainee', 4000, 250, '[{\"id\":\"59\",\"employee_id\":\"24\",\"mode\":\"Absent\",\"start\":\"2022-07-30\",\"until\":\"2022-07-26\",\"reason\":\"fever\",\"deduction\":\"500\",\"status\":\"Approved\",\"date_requested\":\"2022-07-26 19:19:16\"}]', 500, 3500, '2022-07-01', '2022-07-15', '2022-07-26 11:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_tbl`
--

CREATE TABLE `payroll_tbl` (
  `id` int(11) NOT NULL,
  `employee_id` int(50) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `salary` double NOT NULL,
  `allowance_amount` double NOT NULL,
  `deductions` text NOT NULL,
  `total_deduction_amount` double NOT NULL,
  `total_salary` double NOT NULL,
  `start` varchar(255) NOT NULL,
  `until` varchar(255) NOT NULL,
  `date_released` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll_tbl`
--

INSERT INTO `payroll_tbl` (`id`, `employee_id`, `fullname`, `position`, `salary`, `allowance_amount`, `deductions`, `total_deduction_amount`, `total_salary`, `start`, `until`, `date_released`) VALUES
(29, 21, 'Ken Ammay', 'Associate', 6500, 1000, '[{\"id\":\"55\",\"employee_id\":\"21\",\"mode\":\"Cash Advance\",\"start\":\"2022-07-28\",\"until\":\"2022-07-30\",\"reason\":\"Bills\",\"deduction\":\"1000\",\"status\":\"Approved\",\"date_requested\":\"2022-07-26 16:15:19\"}]', 1000, 5500, '2022-07-16', '2022-07-31', '2022-07-26 08:22:07'),
(30, 22, 'Royce Ogot', 'Regular', 5000, 500, '[{\"id\":\"54\",\"employee_id\":\"22\",\"mode\":\"Cash Advance\",\"start\":\"2022-07-30\",\"until\":\"2022-07-30\",\"reason\":\"Budget\",\"deduction\":\"500\",\"status\":\"Approved\",\"date_requested\":\"2022-07-26 16:13:13\"}]', 500, 4500, '2022-07-16', '2022-07-31', '2022-07-26 08:22:18'),
(31, 23, 'John Lloyd Mariano', 'Regular', 5000, 500, '[{\"id\":\"52\",\"employee_id\":\"23\",\"mode\":\"Absent\",\"start\":\"2022-07-29\",\"until\":\"2022-07-29\",\"reason\":\"Fever\",\"deduction\":\"250\",\"status\":\"Approved\",\"date_requested\":\"2022-07-26 16:09:38\"}]', 250, 4750, '2022-07-16', '2022-07-31', '2022-07-26 08:22:28'),
(33, 23, 'John Lloyd Mariano', 'Regular', 5000, 500, '[{\"id\":\"52\",\"employee_id\":\"23\",\"mode\":\"Absent\",\"start\":\"2022-07-29\",\"until\":\"2022-07-29\",\"reason\":\"Fever\",\"deduction\":\"250\",\"status\":\"Approved\",\"date_requested\":\"2022-07-26 16:09:38\"}]', 250, 4750, '2022-07-01', '2022-07-15', '2022-07-26 09:26:53'),
(34, 24, 'Juan Dela Cruz', 'Trainee', 4000, 250, '[{\"id\":\"59\",\"employee_id\":\"24\",\"mode\":\"Absent\",\"start\":\"2022-07-30\",\"until\":\"2022-07-26\",\"reason\":\"fever\",\"deduction\":\"500\",\"status\":\"Approved\",\"date_requested\":\"2022-07-26 19:19:16\"}]', 500, 3500, '2022-07-01', '2022-07-15', '2022-07-26 11:23:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_history_tbl`
--
ALTER TABLE `access_history_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `OnDeleteEmployee` (`employee_id`);

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allowance_tbl`
--
ALTER TABLE `allowance_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `captcha_tbl`
--
ALTER TABLE `captcha_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deduction_tbl`
--
ALTER TABLE `deduction_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_history_tbl`
--
ALTER TABLE `payroll_history_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_tbl`
--
ALTER TABLE `payroll_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_history_tbl`
--
ALTER TABLE `access_history_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `allowance_tbl`
--
ALTER TABLE `allowance_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `captcha_tbl`
--
ALTER TABLE `captcha_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `deduction_tbl`
--
ALTER TABLE `deduction_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payroll_history_tbl`
--
ALTER TABLE `payroll_history_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payroll_tbl`
--
ALTER TABLE `payroll_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_history_tbl`
--
ALTER TABLE `access_history_tbl`
  ADD CONSTRAINT `OnDeleteEmployee` FOREIGN KEY (`employee_id`) REFERENCES `employee_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
