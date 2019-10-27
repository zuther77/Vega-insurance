-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 06:45 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vega`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(100) NOT NULL,
  `workfrom` varchar(20) NOT NULL,
  `phoneno` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`firstname`, `middlename`, `lastname`, `dob`, `sex`, `workfrom`, `phoneno`, `email`, `address`, `city`, `password`, `agent_id`) VALUES
('agent', '', 'testanov', '2019-10-04', 'Gender', 'Work From?', '', 'testanov@gmail.com', '', 'Mumbai', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 9),
('tushar', 'sairam', 'madalla', '1998-12-06', 'Male', 'Office', '78954681236', 'sairam@gmail.com', 'chembur', 'Mumbai', '8748f85c85a8d3ab8af64f388aba3745b32310f2', 11),
('romik', 'devraj', 'amipara', '2000-05-01', 'Female', 'Office', '5952631648', 'romik@gmail.com', 'belapur', 'Delhi', 'fdfc61041cfe19f951e28b99e42076f0082e6cf5', 12),
('nixon', 'jeffin', 'paulson', '1998-03-15', 'Male', 'Home', '4566230184', 'nixon@gmail.com', 'kalwa', 'Kolkata', '394d21de210704ce90ac62d12a14821c268637af', 13),
('anshal', 'something', 'antony', '1999-10-02', 'Male', 'Home', '6466323232', 'anshal@gmail.com', 'belapur', 'Chennai', '1cd3c70e7ebc1d50140a1a0b8ac64adb06390ce0', 14),
('sri', 'BARC', 'inampudi', '1962-05-04', 'Male', 'Office', '795631356', 'sri@gmail.com', 'mankhurd', 'Hyderabad', '532f110e089ab7f9606f1ba1fe4648a4a4d5dcc2', 15);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(100) NOT NULL,
  `City` varchar(25) NOT NULL,
  `phoneno` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `agent_assigned` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`firstname`, `middlename`, `lastname`, `dob`, `sex`, `City`, `phoneno`, `email`, `password`, `cust_id`, `agent_assigned`) VALUES
('ELson', '', 'Pinto', '2019-10-18', 'Male', 'Mumbai', '09137348402', 'pintoelson48@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 70, 9),
('khwaab', '', 'zia', '2019-10-10', 'Male', 'Delhi', '', 'rooh@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 72, 12),
('shalu', '', 'kumar', '2019-10-15', 'Female', 'Kolkata', '', 'shalu@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 85, 13),
('arushi', '', 'sinha', '2019-10-28', 'Male', 'Chennai', '', 'arushi@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 86, 14),
('jen', '', 'fern', '2019-10-09', 'Female', 'Hyderabad', '', 'jen@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 87, 15),
('Mrunal', 'Ashok', 'bhaleroa', '1998-05-25', 'Female', 'Mumbai', '56487956263', 'mrunal@gmail.com', '97c25b088010000db66b15087ff5e27bf23e97c4', 88, 11),
('adwait', 'R', 'Googte', '1999-07-18', 'Male', 'Delhi', '8945123266', 'adwait@gmail.com', 'cb858d7237b13f65e2c7f070ad97f7ec0bed0212', 89, 12),
('Rutvik', 'VILAS', 'kokate', '1998-10-26', 'Male', 'Hyderabad', '3248651579', 'rutvik@gmail.com', '7d9b9ae735c6faeef066a62efd874af5c7a792b8', 90, 15),
('Sebi', 'samuel', '', '1999-09-04', 'Male', 'Kolkata', '9845210348', 'sebi@gmail.com', '33ad8899a8ab3f4dc8ef4db73260a4933a503bd8', 91, 13),
('prince', 'm', 'John', '1999-02-07', 'Male', 'Chennai', '9796943001', 'prince@gmail.com', 'a47b5cc8f06168f0ec3832a99894834e1d27f744', 92, 14),
('AAAA', '', 'Pinto', '2019-10-23', 'Male', 'Mumbai', '09137348402', 'pintoelson48@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 97, 11);

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `cust_agent` AFTER INSERT ON `customer` FOR EACH ROW INSERT into cust_log 
	SELECT cust_id , agent_assigned 
    		from customer
            	where cust_id = (SELECT MAX(cust_id)
                      		from customer)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cust_log`
--

CREATE TABLE `cust_log` (
  `agent_assigned` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_log`
--

INSERT INTO `cust_log` (`agent_assigned`, `customer_id`) VALUES
(97, 11);

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `pid` int(11) NOT NULL,
  `agent_pid` int(11) NOT NULL,
  `customer_pid` int(11) NOT NULL,
  `insurance_type` varchar(10) NOT NULL,
  `term` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `licenseno` varchar(50) NOT NULL,
  `cost_car` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`pid`, `agent_pid`, `customer_pid`, `insurance_type`, `term`, `amount`, `model`, `licenseno`, `cost_car`, `start`, `end`) VALUES
(28, 9, 70, 'life', 5, 10, '', '', 0, '2019-10-17', '2024-10-17'),
(29, 15, 87, 'life', 5, 15, '', '', 0, '2019-10-17', '2024-10-17'),
(30, 12, 72, 'home', 5, 10, '', '', 0, '2019-10-17', '2024-10-17'),
(31, 11, 88, 'home', 10, 15, '', '', 0, '2019-10-17', '2029-10-17'),
(32, 13, 85, 'car', 10, 10, '11', 'vsd', 789, '2019-10-17', '2029-10-17'),
(33, 14, 86, 'home', 10, 15, '', '', 0, '2019-10-17', '2029-10-17'),
(34, 15, 90, 'car', 5, 5, 'Alto', 'MH-32-AM-1028', 500000, '2019-10-17', '2024-10-17'),
(35, 12, 89, 'life', 5, 10, '', '', 0, '2019-10-17', '2024-10-17'),
(36, 9, 70, 'home', 5, 10, '', '', 0, '2019-10-22', '2024-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `policy_id` int(11) NOT NULL,
  `agent_pid` int(11) NOT NULL,
  `cust_pid` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view1`
-- (See below for the actual view)
--
CREATE TABLE `view1` (
`insurance_type` varchar(10)
,`term` int(11)
,`amount` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `view1`
--
DROP TABLE IF EXISTS `view1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view1`  AS  select `insurance`.`insurance_type` AS `insurance_type`,`insurance`.`term` AS `term`,`insurance`.`amount` AS `amount` from `insurance` where `insurance`.`customer_pid` in (select `customer`.`cust_id` from `customer`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`policy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `policy_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
