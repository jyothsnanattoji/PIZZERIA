-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 05:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzeria`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `MngDetails` (IN `id` VARCHAR(255))  select * from employee where employee.Emp_ID=id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cust_ID` int(11) NOT NULL,
  `Cust_first_name` char(20) NOT NULL,
  `Cust_last_name` char(20) NOT NULL,
  `Ph_no` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cust_ID`, `Cust_first_name`, `Cust_last_name`, `Ph_no`) VALUES
(1, 'Levi', 'Ackerman', 9876543210),
(2, 'Mahendra', 'Bahubali', 91234567890),
(3, 'Amarendra', 'Bahubali', 7896543210),
(4, 'Harshad', 'Mehta', 8976543210),
(5, 'Kattappa', 'Singh', 9812367910),
(6, 'Devasena', 'Kapoor', 7896543219),
(7, 'Joe', 'Goldberg', 98712340980),
(8, 'Jnana', 'Aithal', 9731521417),
(9, 'Eren', 'Yeager', 7600090909),
(10, 'Jyothsna', 'Nattoji', 9482302945),
(15, 'savi', 'kunder', 9964477914);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detailedorder`
-- (See below for the actual view)
--
CREATE TABLE `detailedorder` (
`Place_ID` int(11)
,`Order_no` int(11)
,`Date` date
,`Emp_fname` char(20)
,`Cust_first_name` char(20)
,`Pizza_name` char(20)
,`Quantity` int(11)
,`Crust` char(15)
,`Payment_details` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_ID` varchar(10) NOT NULL,
  `Emp_fname` char(20) NOT NULL,
  `Emp_lname` char(20) NOT NULL,
  `Gender` char(10) NOT NULL,
  `DOB` date NOT NULL,
  `Role` char(15) DEFAULT NULL,
  `Place_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_ID`, `Emp_fname`, `Emp_lname`, `Gender`, `DOB`, `Role`, `Place_ID`) VALUES
('EMP11', 'Nina', 'Dina', 'Female', '1990-08-01', 'Manager', 1),
('EMP12', 'Apoorva', 'Ale', 'Male', '1992-07-07', 'Chef', 1),
('EMP13', 'Ninad', 'Nikita', 'Male', '1997-01-01', 'Waiter', 1),
('EMP14', 'Kalpana', 'Arun', 'Female', '1998-05-05', 'Cashier', 1),
('EMP21', 'Nirupama', 'Balasubrama', 'Female', '1992-09-09', 'Manager', 2),
('EMP22', 'Mohini', 'Iyer', 'Female', '1998-12-11', 'Chef', 2),
('EMP23', 'Nilofer', 'Singh', 'Male', '1967-03-03', 'Waiter', 2),
('EMP24', 'Kuldeep', 'arab', 'Male', '1999-01-01', 'Cashier', 2),
('EMP31', 'Dayaram', 'Banerjee', 'Male', '1996-03-04', 'Manager', 3),
('EMP32', 'Jai', 'Srinivasan', 'Male', '1999-01-01', 'Chef', 3),
('EMP33', 'Prabhat', 'Ranjit', 'Male', '1995-09-09', 'Waiter', 3),
('EMP34', 'Anupama', 'Gobind', 'Female', '1994-09-08', 'Cashier', 3),
('EMP41', 'Kalyan', 'Bose', 'Male', '1989-12-12', 'Manager', 4),
('EMP42', 'Sudhir', 'Lalla', 'Male', '1996-06-06', 'Chef', 4),
('EMP43', 'Nischal', 'Raj', 'Male', '1986-04-05', 'Waiter', 4),
('EMP51', 'Abhishek', 'Chawla', 'Male', '1995-04-04', 'Manager', 5),
('EMP52', 'Malati', 'Purohit', 'Female', '1993-07-08', 'Chef', 5),
('EMP61', 'Tanvi', 'Dubey', 'Female', '1996-08-08', 'Manager', 6);

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `deletelog` BEFORE DELETE ON `employee` FOR EACH ROW insert into logs values(null, OLD.Emp_ID,"Deleted",NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertlog` AFTER INSERT ON `employee` FOR EACH ROW insert into logs values(null,new.Emp_ID,'Inserted',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatelog` AFTER UPDATE ON `employee` FOR EACH ROW insert into logs values(null, NEW.Emp_ID,"Updated",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `ID` int(11) NOT NULL,
  `Emp_ID` varchar(11) NOT NULL,
  `Action` varchar(20) NOT NULL,
  `Cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`ID`, `Emp_ID`, `Action`, `Cdate`) VALUES
(2, 'EMP13', 'Inserted', '2021-12-16 16:38:12'),
(3, 'EMP14', 'Updated', '2021-12-16 16:44:07'),
(4, 'EMP13', 'Deleted', '2021-12-16 16:47:03'),
(5, 'EMP13', 'Inserted', '2021-12-16 16:51:42'),
(6, 'EMP14', 'Inserted', '2021-12-16 16:52:13'),
(7, 'EMP23', 'Inserted', '2021-12-16 16:53:08'),
(8, 'EMP24', 'Inserted', '2021-12-16 16:53:54'),
(9, 'EMP33', 'Inserted', '2021-12-16 16:54:40'),
(10, 'EMP34', 'Inserted', '2021-12-16 16:55:18'),
(11, 'EMP11', 'Updated', '2021-12-16 22:39:39'),
(12, 'EMP43', 'Inserted', '2021-12-17 22:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Order_no` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Payment_details` int(11) NOT NULL,
  `Cust_ID` int(11) NOT NULL,
  `Emp_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Order_no`, `Date`, `Payment_details`, `Cust_ID`, `Emp_ID`) VALUES
(1, '2011-09-09', 1855, 1, 'EMP13'),
(2, '2020-07-07', 1000, 2, 'EMP33'),
(3, '2020-07-05', 950, 15, 'EMP34'),
(4, '2014-12-18', 2000, 4, 'EMP32'),
(5, '2021-12-09', 3000, 9, 'EMP42'),
(6, '2020-09-09', 950, 5, 'EMP23'),
(7, '2017-09-11', 800, 6, 'EMP14'),
(8, '2018-07-17', 1000, 4, 'EMP42'),
(9, '2021-12-09', 1500, 9, 'EMP24'),
(10, '2018-12-12', 1000, 7, 'EMP61');

-- --------------------------------------------------------

--
-- Table structure for table `order_contains`
--

CREATE TABLE `order_contains` (
  `Order_no` int(11) NOT NULL,
  `Pizza_no` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Crust` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_contains`
--

INSERT INTO `order_contains` (`Order_no`, `Pizza_no`, `Quantity`, `Crust`) VALUES
(1, 2, 2, 'Cheeseburst'),
(1, 3, 1, 'Thin'),
(2, 4, 3, 'Glutenfree'),
(3, 4, 2, 'Cheeseburst'),
(3, 6, 1, 'Thincrust'),
(4, 1, 3, 'Stuffed'),
(5, 3, 1, 'Cheeseburst'),
(5, 4, 1, 'Cracker'),
(5, 5, 1, 'Basic'),
(6, 5, 3, 'Cheeseburst'),
(7, 6, 2, 'Stuffed'),
(8, 2, 1, 'Stuffed'),
(9, 3, 2, 'Regular'),
(10, 6, 2, 'Cheeseburst');

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `Pizza_no` int(11) NOT NULL,
  `Pizza_name` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`Pizza_no`, `Pizza_name`) VALUES
(5, 'California Pizza'),
(1, 'Chicago Pizza'),
(3, 'Greek Pizza'),
(2, 'New York-Style'),
(4, 'Sicilian Pizza'),
(6, 'St. Louis Pizza');

-- --------------------------------------------------------

--
-- Table structure for table `pizza_topping`
--

CREATE TABLE `pizza_topping` (
  `Order_no` int(11) NOT NULL,
  `Pizza_no` int(11) NOT NULL,
  `Topping` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pizza_topping`
--

INSERT INTO `pizza_topping` (`Order_no`, `Pizza_no`, `Topping`) VALUES
(1, 2, 'Mushrooms'),
(1, 2, 'Pepperoni'),
(1, 3, ''),
(2, 4, 'Olives'),
(3, 4, 'Olives'),
(3, 6, 'Periperi'),
(4, 1, 'Mushrooms'),
(4, 1, 'Olives'),
(5, 3, 'Olives'),
(5, 4, ''),
(5, 5, 'Paneer'),
(6, 5, 'Pepperoni'),
(7, 6, 'Chicken'),
(8, 2, 'Sausage'),
(9, 3, 'Bacon'),
(10, 6, 'ExtraCheese');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `P_ID` int(11) NOT NULL,
  `Place_name` char(15) NOT NULL,
  `Landline_number` int(11) NOT NULL,
  `Zip_code` varchar(10) NOT NULL,
  `Manager_ID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`P_ID`, `Place_name`, `Landline_number`, `Zip_code`, `Manager_ID`) VALUES
(1, 'Mangalore', 2244567, '575007', 'EMP11'),
(2, 'Bangalore', 2950145, '530068', 'EMP21'),
(3, 'Mysore', 2345678, '570001', 'EMP31'),
(4, 'Manipal', 2987654, '576104', 'EMP41'),
(5, 'Mumbai', 2567852, '230532', 'EMP51'),
(6, 'Hyderabad', 2233445, '5000001', 'EMP61');

-- --------------------------------------------------------

--
-- Structure for view `detailedorder`
--
DROP TABLE IF EXISTS `detailedorder`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detailedorder`  AS SELECT `e`.`Place_ID` AS `Place_ID`, `o`.`Order_no` AS `Order_no`, `o`.`Date` AS `Date`, `e`.`Emp_fname` AS `Emp_fname`, `c`.`Cust_first_name` AS `Cust_first_name`, `p`.`Pizza_name` AS `Pizza_name`, `oc`.`Quantity` AS `Quantity`, `oc`.`Crust` AS `Crust`, `o`.`Payment_details` AS `Payment_details` FROM ((((`order` `o` join `employee` `e`) join `customer` `c`) join `order_contains` `oc`) join `pizza` `p`) WHERE `o`.`Order_no` = `oc`.`Order_no` AND `o`.`Cust_ID` = `c`.`Cust_ID` AND `o`.`Emp_ID` = `e`.`Emp_ID` AND `oc`.`Pizza_no` = `p`.`Pizza_no` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cust_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_ID`),
  ADD KEY `Place_ID` (`Place_ID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Order_no`),
  ADD KEY `Cust_ID` (`Cust_ID`),
  ADD KEY `Emp_ID` (`Emp_ID`);

--
-- Indexes for table `order_contains`
--
ALTER TABLE `order_contains`
  ADD PRIMARY KEY (`Order_no`,`Pizza_no`),
  ADD KEY `Pizza_no` (`Pizza_no`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`Pizza_no`),
  ADD UNIQUE KEY `uniq` (`Pizza_name`);

--
-- Indexes for table `pizza_topping`
--
ALTER TABLE `pizza_topping`
  ADD PRIMARY KEY (`Order_no`,`Pizza_no`,`Topping`),
  ADD KEY `Pizza_no` (`Pizza_no`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`P_ID`),
  ADD UNIQUE KEY `UNIQ` (`Manager_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Cust_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Order_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `Pizza_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Place_ID`) REFERENCES `place` (`P_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`Cust_ID`) REFERENCES `customer` (`Cust_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`Emp_ID`) REFERENCES `employee` (`Emp_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_contains`
--
ALTER TABLE `order_contains`
  ADD CONSTRAINT `order_contains_ibfk_1` FOREIGN KEY (`Order_no`) REFERENCES `order` (`Order_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_contains_ibfk_2` FOREIGN KEY (`Pizza_no`) REFERENCES `pizza` (`Pizza_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pizza_topping`
--
ALTER TABLE `pizza_topping`
  ADD CONSTRAINT `pizza_topping_ibfk_1` FOREIGN KEY (`Order_no`) REFERENCES `order` (`Order_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pizza_topping_ibfk_2` FOREIGN KEY (`Pizza_no`) REFERENCES `pizza` (`Pizza_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`Manager_ID`) REFERENCES `employee` (`Emp_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
