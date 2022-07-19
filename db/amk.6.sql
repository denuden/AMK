-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 06:11 PM
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
(28, 11, '', '', '', '', '2022-07-17 20:35:42'),
(29, 11, 'Bato', 'Sapok', '092222', 'dgd', '2022-07-17 20:35:56'),
(31, 11, 'Bato', 'Sapok', '092222', 'dgd', '2022-07-17 21:45:26'),
(32, 11, 'Bato', 'Sapok', '092222', 'dgd', '2022-07-17 22:04:52'),
(33, 14, '', '', '', '', '2022-07-17 22:07:01'),
(34, 14, 'Jerome ', 'Pangan', '092222', 'gumamela', '2022-07-17 22:07:16'),
(35, 14, 'Jerome ', 'Pangan', '092222', 'gumamela', '2022-07-17 22:09:50'),
(36, 14, 'Jerome ', 'Pangan', '092222', 'gumamela', '2022-07-18 12:36:05'),
(37, 11, 'Bato', 'Sapok', '092222', 'dgd', '2022-07-18 15:40:05'),
(38, 14, 'Jerome ', 'Pangan', '092222', 'gumamela', '2022-07-18 15:42:11'),
(39, 11, 'Bato', 'Sapok', '092222', 'dgd', '2022-07-18 15:45:17'),
(40, 14, 'Jerome ', 'Pangan', '092222', 'gumamela', '2022-07-18 15:46:59');

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
(16, 'Trainee', '4000', '500');

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
(34, 14, 'Absent', '2022-07-18', '2022-07-18', 'fafaf', '1000', 'Approved', '2022-07-18 15:44:29'),
(35, 14, 'Cash Advance', '2022-07-18', '2022-07-18', 'asf', '1000', 'Approved', '2022-07-18 15:44:41'),
(36, 11, 'Cash Advance', '2022-07-18', '2022-07-18', '22', '500', 'Approved', '2022-07-18 15:45:33'),
(37, 11, 'Leave', '2022-07-29', '2022-07-22', 'gds', '500', 'Approved', '2022-07-18 15:45:44');

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
(11, 'Bato', 'Sapok', '092222', 45, 'Male', 'dgd', 'Supervisor', '10000', '1500', 'Bato123!', '$2y$10$N3FDrJeAQcYS.HURCiPsauVsCX74LrVyKCttHIrnpUe0uBsFFsoJG', '01162d4729e6376', 1),
(14, 'Jerome ', 'Pangan', '092222', 22, 'Male', 'gumamela', 'Manager', '15000', '2000', 'J!rome12', '$2y$10$MxT4maRUK/r2ZQ3bsypBi.H64cq93DKQHv66C8he4cCtk3uHb6VQi', '01462d488055653', 1);

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
(9, 14, 'Jerome  Pangan', 'Manager', 15000, 2000, '[{\"id\":\"19\",\"employee_id\":\"14\",\"mode\":\"Cash Advance\",\"start\":\"2022-07-03\",\"until\":\"2022-07-05\",\"reason\":\"Wala na makain\",\"deduction\":\"1000\",\"status\":\"Approved\",\"date_requested\":\"2022-07-18 23:17:49\"},{\"id\":\"21\",\"employee_id\":\"14\",\"mode\":\"Cash Advance\",\"start\":\"2022-07-18\",\"until\":\"2022-07-15\",\"reason\":\"saf\",\"deduction\":\"1000\",\"status\":\"Approved\",\"date_requested\":\"2022-07-18 23:27:14\"},{\"id\":\"22\",\"employee_id\":\"14\",\"mode\":\"Leave\",\"start\":\"2022-07-18\",\"until\":\"2022-07-18\",\"reason\":\"safsaf\",\"deduction\":\"1000\",\"status\":\"Approved\",\"date_requested\":\"2022-07-18 23:27:25\"},{\"id\":\"23\",\"employee_id\":\"14\",\"mode\":\"Absent\",\"start\":\"2022-07-02\",\"until\":\"2022-07-02\",\"reason\":\"safs\",\"deduction\":\"1000\",\"status\":\"Approved\",\"date_requested\":\"2022-07-18 23:27:34\"}]', 4000, 11000, '2022-07-15', '2022-07-15', '2022-07-18 15:28:39'),
(10, 14, 'Jerome  Pangan', 'Manager', 15000, 2000, '[{\"id\":\"19\",\"employee_id\":\"14\",\"mode\":\"Cash Advance\",\"start\":\"2022-07-03\",\"until\":\"2022-07-05\",\"reason\":\"Wala na makain\",\"deduction\":\"10000\",\"status\":\"Approved\",\"date_requested\":\"2022-07-18 23:17:49\"},{\"id\":\"24\",\"employee_id\":\"14\",\"mode\":\"Cash Advance\",\"start\":\"2022-07-14\",\"until\":\"2022-07-30\",\"reason\":\"wra\",\"deduction\":\"10000\",\"status\":\"Approved\",\"date_requested\":\"2022-07-18 23:30:31\"},{\"id\":\"25\",\"employee_id\":\"14\",\"mode\":\"Cash Advance\",\"start\":\"2022-07-23\",\"until\":\"2022-07-09\",\"reason\":\"asfsaf\",\"deduction\":\"10000\",\"status\":\"Approved\",\"date_requested\":\"2022-07-18 23:30:40\"},{\"id\":\"26\",\"employee_id\":\"14\",\"mode\":\"Dayoff\",\"start\":\"2022-07-18\",\"until\":\"2022-07-30\",\"reason\":\"gdsg\",\"deduction\":\"10000\",\"status\":\"Approved\",\"date_requested\":\"2022-07-18 23:35:17\"},{\"id\":\"27\",\"employee_id\":\"14\",\"mode\":\"Leave\",\"start\":\"2022-08-06\",\"until\":\"2022-07-18\",\"reason\":\"ffdg\",\"deduction\":\"10000\",\"status\":\"Approved\",\"date_requested\":\"2022-07-18 23:35:29\"},{\"id\":\"28\",\"employee_id\":\"14\",\"mode\":\"Absent\",\"start\":\"2022-07-02\",\"until\":\"2022-07-30\",\"reason\":\"fdgd\",\"deduction\":\"10000\",\"status\":\"Approved\",\"date_requested\":\"2022-07-18 23:35:46\"}]', 60000, 0, '2022-07-18', '2022-07-18', '2022-07-18 15:36:55'),
(11, 11, 'Bato Sapok', 'Supervisor', 10000, 1500, '[{\"id\":\"36\",\"employee_id\":\"11\",\"mode\":\"Cash Advance\",\"start\":\"2022-07-18\",\"until\":\"2022-07-18\",\"reason\":\"22\",\"deduction\":\"500\",\"status\":\"Approved\",\"date_requested\":\"2022-07-18 23:45:33\"},{\"id\":\"37\",\"employee_id\":\"11\",\"mode\":\"Leave\",\"start\":\"2022-07-29\",\"until\":\"2022-07-22\",\"reason\":\"gds\",\"deduction\":\"500\",\"status\":\"Approved\",\"date_requested\":\"2022-07-18 23:45:44\"}]', 1000, 9000, '2022-07-29', '2022-07-30', '2022-07-18 15:46:36');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `allowance_tbl`
--
ALTER TABLE `allowance_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `deduction_tbl`
--
ALTER TABLE `deduction_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payroll_tbl`
--
ALTER TABLE `payroll_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
