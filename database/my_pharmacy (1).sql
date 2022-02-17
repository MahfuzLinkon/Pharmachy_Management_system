-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 10:35 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicine_list`
--

CREATE TABLE `medicine_list` (
  `medicine_id` int(11) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `medicine_type` varchar(100) NOT NULL,
  `medicine_capacity` varchar(100) NOT NULL,
  `unit_price` double NOT NULL,
  `medicine_quantity` int(100) NOT NULL DEFAULT 0,
  `expired_date` date NOT NULL DEFAULT '1000-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine_list`
--

INSERT INTO `medicine_list` (`medicine_id`, `medicine_name`, `medicine_type`, `medicine_capacity`, `unit_price`, `medicine_quantity`, `expired_date`) VALUES
(3, 'Napa', 'tablet', '500 mg', 0.87, 50, '2028-06-13'),
(4, 'Monas 10', 'tablet', '10mg', 17, 0, '1000-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `pharmachy_stock`
--

CREATE TABLE `pharmachy_stock` (
  `medicine_id` int(11) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `medicine_type` varchar(100) NOT NULL,
  `medicine_capacity` varchar(100) NOT NULL,
  `unit_price` double NOT NULL,
  `medicine_quantity` int(100) NOT NULL DEFAULT 0,
  `expired_date` date NOT NULL DEFAULT '1000-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmachy_stock`
--

INSERT INTO `pharmachy_stock` (`medicine_id`, `medicine_name`, `medicine_type`, `medicine_capacity`, `unit_price`, `medicine_quantity`, `expired_date`) VALUES
(3, 'Napa', 'tablet', '500 mg', 0.87, 40, '2028-06-13'),
(4, 'Monas 10', 'tablet', '10mg', 17, 0, '1000-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `sales_medicine`
--

CREATE TABLE `sales_medicine` (
  `sales_id` int(11) NOT NULL,
  `customer_type` varchar(100) NOT NULL,
  `details` varchar(100) NOT NULL,
  `unit_price` double NOT NULL,
  `medicine_quantity` int(100) NOT NULL,
  `total_price` double NOT NULL,
  `sales_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_medicine`
--

INSERT INTO `sales_medicine` (`sales_id`, `customer_type`, `details`, `unit_price`, `medicine_quantity`, `total_price`, `sales_date`) VALUES
(1, 'new_customer', 'Monas 10 10mg Expire date:2022-02-01', 17, 10, 170, '2022-02-01'),
(2, 'new_customer', 'Napa Extra 500mg Expire date:2022-02-03', 4, 10, 40, '2022-02-03'),
(3, 'returning_customer', 'Napa 500 mg Expire date:2028-06-13', 0.87, 10, 8.7, '2022-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_type`) VALUES
(1, 'Square ', 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', '01620707800', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(4, 'Manager', 'manager@gmail.com', '01620707800', 'e10adc3949ba59abbe56e057f20f883e', 'manager'),
(5, 'Salseman', 'salseman@gmail.com', '01620707800', 'e10adc3949ba59abbe56e057f20f883e', 'salseman'),
(6, 'Tasfia', 'tasfia@gamil.com', '12332211222221', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(7, 'Sadia', 'sadia@gmail.com', '12332211222221', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(8, 'Mahfuzur Rahman  Linkon', 'mahfuz.razz76@gmail.com', '+1 (306) 446-7551', 'e10adc3949ba59abbe56e057f20f883e', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicine_list`
--
ALTER TABLE `medicine_list`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `pharmachy_stock`
--
ALTER TABLE `pharmachy_stock`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `sales_medicine`
--
ALTER TABLE `sales_medicine`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicine_list`
--
ALTER TABLE `medicine_list`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pharmachy_stock`
--
ALTER TABLE `pharmachy_stock`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales_medicine`
--
ALTER TABLE `sales_medicine`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
