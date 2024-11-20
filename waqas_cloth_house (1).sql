-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 05:34 AM
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
-- Database: `waqas_cloth_house`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_customer`
--

CREATE TABLE `add_customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `serving_employee` varchar(50) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `order_customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_customer`
--

INSERT INTO `add_customer` (`customer_id`, `first_name`, `last_name`, `address`, `city`, `phone`, `email`, `serving_employee`, `bank`, `transaction_id`, `order_customer_id`) VALUES
(1, 'ALi', '', '', '', '', '', 'Riaz Ahmad', '', '', 0),
(2, 'Haider', '', '', '', '', '', 'Riaz Ahmad', '', '', 0),
(3, 'Qasim', '', '', '', '', '', 'Riaz Ahmad', '', '', 0),
(4, 'Waqas', '', '', '', '03214292315', '', 'Riaz Ahmad', '', '', 0),
(5, 'shafique', '', '', '', '03234822323', '', 'Riaz Ahmad', '', '', 0),
(6, 'tahir', '', '', '', '03004211802', '', 'Riaz Ahmad', '', '', 0),
(7, 'fahad', '', '', '', '03364068901', '', 'Riaz Ahmad', '', '', 0),
(8, 'Sahid', '', '', '', '03014685211', '', 'Riaz Ahmad', '', '', 0),
(9, 'Shazad', '', '', '', '03004742747', '', 'Riaz Ahmad', '', '', 0),
(10, 'Ali', '', '', '', '03364245931', '', 'Riaz Ahmad', '', '', 0),
(11, 'Ali', '', '', '', '', '', 'Riaz Ahmad', '', '', 0),
(12, 'Zaffir', '', '', '', '03074619801', '', 'Riaz Ahmad', '', '', 0),
(13, 'Wajid ', '', '', '', '', '', 'Riaz Ahmad', '', '', 0),
(14, 'Usama', '', '', '', '03017140056', '', 'Noman', '', '', 0),
(15, 'Zeshan', '', '', '', '03414788596', '', 'Noman', '', '', 0),
(16, 'Naveed', '', '', '', '03004154613', '', 'Noman', '', '', 0),
(17, 'Rafeeq', '', '', '', '03204560544', '', 'Noman', '', '', 0),
(18, 'Ahsan', '', '', '', '03268831638', '', 'Noman', '', '', 0),
(19, 'mishaq', '', '', '', '03004822786', '', 'Noman', '', '', 0),
(20, 'mishaq', '', '', '', '03004822786', '', 'Riaz Ahmad', '', '', 0),
(21, 'Qaiser', '', '', '', '03024310572', '', 'Noman', '', '', 0),
(22, 'Awais', '', '', '', '03214835092', '', 'Noman', '', '', 0),
(23, 'ali', '', '', '', '', '', 'Noman', '', '', 0),
(24, 'Ali', '', '', '', '', '', 'Noman', '', '', 0),
(25, 'Qasim', '', '', '', '', '', 'Noman', '', '', 0),
(26, 'Amir', '', '', '', '03378600075', '', 'Noman', '', '', 0),
(27, 'Amir', '', '', '', '', '', 'Noman', '', '', 0),
(28, 'ishaq', '', '', '', '03004822786', '', 'Noman', '', '', 0),
(29, 'ishaq', '', '', '', '03004822786', '', 'Noman', '', '', 0),
(30, 'ishaq', '', '', '', '03004822786', '', 'Noman', '', '', 0),
(31, 'Haris', '', '', '', '03174250468', '', 'Noman', '', '', 0),
(32, 'Amir', '', '', '', '', '', 'Noman', '', '', 0),
(33, 'Faizan', '', '', '', '03097333071', '', 'Noman', '', '', 0),
(34, 'Ashfaq', '', '', '', '03434452476', '', 'Noman', '', '', 0),
(35, 'Amir', '', '', '', '', '', 'Noman', '', '', 0),
(36, 'Amir', '', '', '', '', '', 'Noman', '', '', 0),
(37, 'Amir', '', '', '', '', '', 'Noman', '', '', 0),
(38, 'Faisal', '', '', '', '03226780610', '', 'Noman', '', '', 0),
(39, 'Amir', '', '', '', '', '', 'Noman', '', '', 0),
(40, '1', '', '', '', '', '', 'Noman', '', '', 0),
(41, 'A', '', '', '', '', '', 'Noman', '', '', 0),
(42, 'B', '', '', '', '', '', 'Noman', '', '', 0),
(43, 'C', '', '', '', '', '', 'Noman', '', '', 0),
(44, 'Baber', '', '', '', '03087040935', '', 'Noman', '', '', 0),
(45, 'A', '', '', '', '', '', 'Noman', '', '', 0),
(46, 'D', '', '', '', '', '', 'Noman', '', '', 0),
(47, 'E', '', '', '', '', '', 'Noman', '', '', 0),
(48, 'F', '', '', '', '', '', 'Noman', '', '', 0),
(49, 'E', '', '', '', '', '', 'Noman', '', '', 0),
(50, 'Bhai', '', '', '', '', '', 'Noman', '', '', 0),
(51, 'Irfan', '', '', '', '03026767478', '', 'Noman', '', '', 0),
(52, 'S', '', '', '', '', '', 'Noman', '', '', 0),
(53, 'Nadeem', '', '', '', '03006001074', '', 'Noman', '', '', 0),
(54, 'Mujahid', '', '', '', '03009428807', '', 'Noman', '', '', 0),
(55, 'Mohsin', '', '', '', '03224622388', '', 'Noman', '', '', 0),
(56, 'Ali', '', '', '', '', '', 'Noman', '', '', 0),
(57, 'husnain', '', '', '', '03444996335', '', 'Noman', '', '', 0),
(58, 'KAMRAN', '', '', '', '03227714771', '', 'Noman', '', '', 0),
(59, 'Umer', '', '', '', '0323787151', '', 'Noman', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `add_customers`
--

CREATE TABLE `add_customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `serving_employee` varchar(50) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `Item_of_customer_order` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Purchase_date` date NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `current_total` decimal(10,2) GENERATED ALWAYS AS (`Quantity` * `Price`) STORED,
  `total_bill` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_customers`
--

INSERT INTO `add_customers` (`customer_id`, `first_name`, `last_name`, `address`, `city`, `phone`, `email`, `serving_employee`, `bank`, `transaction_id`, `Item_of_customer_order`, `Quantity`, `Purchase_date`, `Price`, `total_bill`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00', 0.00, NULL),
(2, '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00', 0.00, NULL),
(3, 'umer', 'sajjad', 'green town', 'lahore', '03025067045', 'nar54200@zbock.com', 'ali', '', '', '', 0, '0000-00-00', 0.00, NULL),
(4, 'umer', 'sajjad', 'green town', 'lahore', '03025067045', 'nar54200@zbock.com', 'ali', '', '', '', 0, '0000-00-00', 0.00, NULL),
(5, 'umer', 'sajjad', 'green town', 'lahore', '03025067045', 'nar54200@zbock.com', 'ali', '', '', '', 0, '0000-00-00', 0.00, NULL),
(6, 'umer', 'sajjad', 'green town', 'lahore', '03025067045', 'nar54200@zbock.com', 'ali', '', '', '', 0, '0000-00-00', 0.00, NULL),
(7, 'umer', 'sajjad', 'green town', 'lahore', '03025067045', 'nar54200@zbock.com', 'ali', '', '', '', 0, '0000-00-00', 0.00, NULL),
(8, 'umer', 'sajjad', 'green town', 'lahore', '03025067045', 'nar54200@zbock.com', 'ali', '', '', '', 0, '0000-00-00', 0.00, NULL),
(9, 'umer', 'sajjad', 'green town', 'lahore', '03025067045', 'nar54200@zbock.com', 'ali', '', '', '', 0, '0000-00-00', 0.00, NULL),
(10, 'umer', 'sajjad', 'green town', 'lahore', '03025067045', 'nar54200@zbock.com', 'ali', '', '', '', 0, '0000-00-00', 0.00, NULL),
(11, 'umer', 'sajjad', 'green town', 'lahore', '03025067045', 'nar54200@zbock.com', 'ali', '', '', '', 0, '0000-00-00', 0.00, NULL),
(12, 'umer', 'sajjad', 'green town', 'lahore', '03025067045', 'nar54200@zbock.com', 'ali', '', '', '', 0, '0000-00-00', 0.00, NULL),
(13, 'umer', 'sajjad', 'green town', 'lahore', '03025067045', 'nar54200@zbock.com', 'ali', '', '', '', 0, '0000-00-00', 0.00, NULL),
(14, 'umer', 'sajjad', 'green town', 'lahore', '03025067045', 'nar54200@zbock.com', 'ali', '', '', '', 0, '0000-00-00', 0.00, NULL),
(15, 'umer', 'sajjad', 'green town', 'lahore', '03025067045', 'nar54200@zbock.com', 'ali', '', '', '', 0, '0000-00-00', 0.00, NULL),
(16, 'umer', 'sajjad', 'green town', 'lahore', '03025067045', 'nar54200@zbock.com', 'ali', '', '', '', 0, '0000-00-00', 0.00, NULL),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '0000-00-00', 0.00, 0.00),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '0000-00-00', 0.00, 0.00),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '0000-00-00', 0.00, 0.00),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '0000-00-00', 0.00, 0.00),
(21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '0000-00-00', 0.00, 0.00),
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '0000-00-00', 0.00, 0.00),
(23, 'Imran', 'Idrees', 'E-10 ali park habib homes kot lakhpat lahore', 'Lahore', '03026045026', 'imranidrees053@gmail.com', 'noman', 'mezan bank', '2356', '', 0, '0000-00-00', 0.00, NULL),
(24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Washing_ware', 0, '0000-00-00', 2500.00, NULL),
(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Washing_ware', 2, '0000-00-00', 2500.00, NULL),
(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Washing_ware', 2, '0000-00-00', 2500.00, NULL),
(27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Washing_ware', 3, '0000-00-00', 2500.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `add_employee`
--

CREATE TABLE `add_employee` (
  `employee_id` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Phone_Number` varchar(15) DEFAULT NULL,
  `Emergency_Phone_no` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Status` enum('Manager','Saleman','Security Guard','Delivery Boy','Helper') DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Date_of_Birth` date DEFAULT NULL,
  `CNIC_no` varchar(20) DEFAULT NULL,
  `Date_of_joining` date DEFAULT NULL,
  `Terminating_Date` date DEFAULT NULL,
  `Upload_Picture` varchar(255) DEFAULT NULL,
  `Upload_CNIC_Picture_Front` varchar(255) DEFAULT NULL,
  `Upload_CNIC_Picture_Back` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `add_purchases`
--

CREATE TABLE `add_purchases` (
  `Purchases_id` int(11) NOT NULL,
  `Party_Name` varchar(255) NOT NULL,
  `Purchase_Date` date NOT NULL,
  `Receiving_Date` date NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `Total_Bill` decimal(10,2) NOT NULL,
  `Paid_Bill` decimal(10,2) NOT NULL,
  `Pending_Dues` decimal(10,2) NOT NULL,
  `Previous_Total_Bill` decimal(10,2) NOT NULL,
  `Total_Remaining_Bill` decimal(10,2) NOT NULL,
  `Payment` varchar(255) NOT NULL,
  `Bill_no` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `add_sale`
--

CREATE TABLE `add_sale` (
  `sale_id` int(11) NOT NULL,
  `Sale_Date` date DEFAULT NULL,
  `net_profit` int(30) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `add_stock`
--

CREATE TABLE `add_stock` (
  `stock_id` int(11) NOT NULL,
  `Product_Name_Male` varchar(255) DEFAULT NULL,
  `Box` varchar(10) DEFAULT NULL,
  `Meter` double(10,2) DEFAULT NULL,
  `Retail_Price` float DEFAULT NULL,
  `Purchase_Price` float DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `Warehouse_ID` varchar(11) DEFAULT NULL,
  `Place` varchar(255) DEFAULT NULL,
  `Season` varchar(50) DEFAULT NULL,
  `Brand` varchar(255) DEFAULT NULL,
  `Out_of_stock` tinyint(1) DEFAULT NULL,
  `Size` varchar(50) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `Damage_Piece` int(11) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_stock`
--

INSERT INTO `add_stock` (`stock_id`, `Product_Name_Male`, `Box`, `Meter`, `Retail_Price`, `Purchase_Price`, `Quantity`, `Gender`, `Warehouse_ID`, `Place`, `Season`, `Brand`, `Out_of_stock`, `Size`, `Category`, `Damage_Piece`, `Description`, `supplier_id`) VALUES
(1, 'Classic Cotton print', '', 1031.50, 450, 300, 0, 'Female', 'A', 'Shop', 'Winter', 'Cotton Classic ', 0, '', 'Amanat cloth', 0, '', NULL),
(2, 'Kather Print 2 Piece', '', 452.00, 450, 340, 0, 'Female', 'B', 'Shop', 'Winter', 'Miraj Kather print 2 Piece', 0, '0', 'Amanat cloth', 0, '0', NULL),
(3, 'Linen 2 Piece', '', 711.50, 400, 300, 0, 'Female', 'B', 'Shop', 'Winter', 'Habib ', 0, '', 'Ravi Cloth', 0, '', NULL),
(4, '5 star Linen laroz ', '', 0.00, 2600, 1875, 170, 'Female', 'C', 'Shop', 'Winter', '5 Start', 0, '', 'Ravi Cloth', 0, '', NULL),
(5, 'Marina 2 Piece', '', 350.75, 300, 220, 0, 'Female', 'E', 'Shop', 'Winter', 'Meraj ', 0, '', 'Amanat Cloth', 0, '', NULL),
(6, 'Classic Linen 3 Piece', '', 0.00, 2000, 1850, 46, 'Female', 'C', 'Shop', 'Winter', 'Classic', 0, '0', 'Umer Khalid', 2, '0', NULL),
(7, 'Habib Linen', '', 0.00, 2600, 1875, 30, 'Female', 'D', 'Shop', 'Winter', 'Habib Classic', 0, '', 'Ravi Cloth', 0, '', NULL),
(8, 'Mahnoor Classic Linen Full Suit', '', 0.00, 2600, 2000, 23, 'Female', 'D', 'Shop', 'Winter', 'Mahnoor Classic', 0, '', 'Umer Khalid', 0, '', NULL),
(9, 'Palkee Classic Linen Full Suit', '', 0.00, 2600, 2000, 14, 'Female', 'D', 'Shop', 'Winter', 'Palkee Classic', 0, '', 'Umer Khalid', 0, '', NULL),
(10, 'CC Meraj Linen', '', 0.00, 3200, 2560, 69, 'Female', 'E', 'Shop', 'Winter', 'Meraj', 0, '', 'Amanat Cloth', 0, '', NULL),
(11, 'Guljan Linen', '', 0.00, 3200, 2080, 64, 'Female', 'E', 'Shop', 'Winter', 'Guljan Alhamra', 0, '', 'Ravi Cloth', 0, '', NULL),
(12, 'Colorita Mother Collection linen', '', 0.00, 3200, 2160, 10, 'Female', 'E', 'Shop', 'Winter', 'Colorita', 0, '', 'Ravi Cloth', 0, '', NULL),
(13, 'Colorita Banodoria linen', '', 0.00, 3800, 2800, 26, 'Female', 'F', 'Shop', 'Winter', 'Colorita', 0, '', 'Ravi Cloth', 0, '', NULL),
(14, 'Meraj Korian Linen', '', 0.00, 3800, 3040, 19, 'Female', 'F', 'Shop', 'Winter', 'Meraj', 0, '', 'Amanat Cloth', 0, '', NULL),
(15, 'Meraj Lexury Fancey Linen', '', 0.00, 3800, 3040, 20, 'Female', 'F', 'Shop', 'Winter', 'Meraj', 0, '', 'Amanat Cloth', 0, '', NULL),
(16, 'Marina Print 3 piece', '', 0.00, 3600, 2880, 120, 'Female', 'G', 'Shop', 'Winter', 'Marina', 0, '', 'Amanat Cloth', 0, '', NULL),
(17, 'Vichar Marina', '', 0.00, 4600, 3760, 42, 'Female', 'H', 'Shop', 'Winter', 'Marina', 0, '', 'Amanat Cloth', 0, '', NULL),
(18, 'Kather print 3 piece', '', 0.00, 3200, 2450, 53, 'Female', 'I', 'Shop', 'Winter', 'Mahnoor', 0, '0', 'Umer Khalid and Amanat Cloth and Shani', 0, '0', NULL),
(19, 'kadi Marina 3 piece', '', 0.00, 2800, 2000, 45, 'Female', 'J', 'Shop', 'Winter', 'Marina', 0, '', 'Faislabad', 0, '', NULL),
(20, 'Slab Linen', '', 0.00, 3600, 2400, 40, 'Female', '', 'Shop', 'Winter', 'Slab Linen', 0, '', 'Amanat Cloth', 0, '', NULL),
(21, 'Karandi Print', '', 0.00, 3400, 2400, 29, 'Female', '', 'Shop', 'Winter', 'Meraj', 0, '', 'Amanat Cloth', 0, '', NULL),
(22, 'Viscos Print', '', 0.00, 3400, 2400, 19, 'Female', '', 'Shop', 'Winter', 'Viscos Print', 0, '', 'Shani', 0, '', NULL),
(23, 'Dhanak Digital', '', 0.00, 3600, 2400, 22, 'Female', '', 'Shop', 'Winter', 'Khaddi', 0, '', 'Ravi Cloth', 0, 'Dhanak Digital Full Suit', NULL),
(24, 'WoolShal Marina', '', 0.00, 3600, 2600, 14, 'Female', '', 'Shop', 'Winter', 'Rasheed Marina', 0, '', 'Amanat Cloth', 0, '', NULL),
(25, 'plane linen', '', 10.00, 400, 280, 0, 'Female', '', 'Shop', 'Winter', 'CC', 0, '', 'Amanat Cloth', 0, '', NULL),
(26, 'plane Kather', '', 10.00, 400, 270, 0, 'Female', '', 'Shop', 'Winter', 'CC', 0, '', 'Amanat Cloth', 0, '', NULL),
(27, 'Fancey Marina', '', 0.00, 4800, 2200, 20, 'Female', '', 'Shop', 'Winter', '', 0, '', 'Faislabad', 0, '', NULL),
(28, 'Fancey Khadder', '', 0.00, 4600, 2000, 8, '', '', 'Shop', '', '', 0, '', 'Raplica', 0, '', NULL),
(29, 'Fancey Linen', '', 0.00, 4800, 2000, 8, 'Female', '', 'Shop', 'Winter', '', 0, '', '', 0, '', NULL),
(30, 'Fancey Raplica', '', 0.00, 4200, 2000, 6, 'Female', '', 'Shop', 'Winter', '', 0, '', '', 0, '', NULL),
(31, 'Fancey Bareza Linen', '', 0.00, 4400, 2000, 5, 'Female', '', 'Shop', 'Winter', '', 0, '', '', 0, '', NULL),
(32, 'Fancey Linen Raplica', '', 0.00, 2600, 2000, 22, 'Female', '', 'Shop', 'Winter', '', 0, '', '', 0, '', NULL),
(33, 'Boutique Linen L/S', '', 0.00, 2800, 1900, 17, 'Female', '', 'Shop', 'Winter', '', 0, '', '', 1, '', NULL),
(34, 'Boutique Linen', '', 0.00, 3100, 2100, 5, 'Female', '', 'Shop', 'Winter', 'K.Antique', 0, '', 'K. Kashif', 0, '', NULL),
(35, 'Boutique Linen S/D', '', 0.00, 3800, 2600, 2, 'Female', '', 'Shop', 'Winter', 'Alag Asma', 0, '', '', 0, '', NULL),
(36, 'Amina B Linen V.419', '', 0.00, 4900, 3300, 3, 'Female', '', 'Shop', 'Winter', 'Amina B', 0, '', '', 0, '', NULL),
(37, 'Amina B Linen V.207', '', 0.00, 3900, 2600, 1, 'Female', '', 'Shop', 'Winter', 'Amina B', 0, '', '', 0, '', NULL),
(38, 'Aysha B Linen V.2', '', 0.00, 3300, 2200, 1, 'Female', '', 'Shop', 'Winter', 'Aysha B', 0, '', '', 0, '', NULL),
(39, 'Sanoor Linen', '', 0.00, 4400, 3000, 1, 'Female', '', 'Shop', 'Winter', 'Sanoor', 0, '', '', 0, '', NULL),
(40, 'Boutique Viscos', '', 0.00, 3750, 2500, 14, 'Female', '', 'Shop', 'Winter', 'hoorain , Victoria , AM fashion , K.Antique', 0, '', '', 0, '', NULL),
(41, 'Boutique Viscos V.124', '', 0.00, 2900, 1950, 4, 'Female', '', 'Shop', 'Winter', 'Sherawallah', 0, '', '', 0, '', NULL),
(42, 'Boutique Viscos V.026', '', 0.00, 4950, 3300, 2, 'Female', '', 'Shop', 'Winter', 'Hoorain', 0, '', '', 0, '', NULL),
(43, 'Boutique Viscos V.126', '', 0.00, 4950, 3300, 2, 'Female', '', '', 'Winter', 'Amina B', 0, '', '', 0, '', NULL),
(44, 'Amina B Linen Shirt', '', 0.00, 1250, 700, 17, 'Female', '', 'Shop', 'Winter', 'Amina B', 0, '', '', 0, '', NULL),
(45, 'Boutique Linen Fancey', '', 0.00, 3400, 2200, 6, 'Female', '', 'Shop', 'Winter', '', 0, '', '', 0, '', NULL),
(46, 'Dhanak Raplica', '', 0.00, 2900, 1950, 12, 'Female', '', 'Shop', 'Winter', '', 0, '', '', 0, '', NULL),
(47, 'Dhanak V.6013', '', 0.00, 4200, 2800, 9, 'Female', '', 'Shop', 'Winter', 'SK Gold', 0, '', '', 0, '', NULL),
(48, 'Dhanak Boutique', '', 0.00, 3600, 2400, 3, 'Female', '', '', 'Winter', '', 0, '', '', 0, '', NULL),
(49, 'Boutique Marina', '', 0.00, 3500, 2000, 5, 'Female', '', 'Shop', 'Winter', 'K.Antique', 0, '', '', 0, '', NULL),
(50, 'Boutique Shamray', '', 0.00, 4200, 3000, 3, 'Female', '', '', 'Winter', 'Gul Ahmad', 0, '', '', 0, '87 G UK centre', NULL),
(51, 'Boutique Cotail', '', 0.00, 3600, 2400, 4, 'Female', '', 'Shop', 'Winter', 'Baroque', 0, '', '', 0, '', NULL),
(52, 'Digital Kaddar', '', 0.00, 4200, 2400, 2, 'Female', '', 'Shop', 'Winter', 'A.k Collection', 0, '', '', 0, '', NULL),
(53, 'Amina B V.363', '', 0.00, 5500, 3800, 1, 'Female', '', '', 'Winter', 'Amina B', 0, '', '', 0, '', NULL),
(54, 'Boutique Kaddar', '', 0.00, 3200, 2200, 7, 'Female', '', 'Shop', 'Winter', 'Eshaal Zahra', 0, '', '', 0, 'Baber sabir', NULL),
(55, 'Boutique Cotrai', '', 0.00, 3900, 2600, 7, 'Female', '', 'Shop', 'Winter', 'Eshaal Zahra', 0, '', 'Baber Saber', 0, '', NULL),
(56, 'Karandi V.6012', '', 0.00, 3900, 2400, 9, 'Female', '', 'Shop', 'Winter', 'Eshaal Zahra', 0, '', 'Baber Saber', 0, '', NULL),
(57, 'Karandi V.955', '', 0.00, 3600, 2400, 6, 'Female', '', 'Shop', 'Winter', 'Fatima Collection', 0, '', '', 0, '87 G UK centre', NULL),
(58, 'Karandi V.27', '', 0.00, 3300, 2200, 3, 'Female', '', 'Shop', 'Winter', 'Dgital karenty ', 0, '', '', 0, '', NULL),
(59, 'Karandi V.9', '', 0.00, 3500, 2400, 3, 'Female', '', 'Shop', 'Winter', 'Modern Digital Karenty', 0, '', '', 0, '', NULL),
(60, 'Karandi V.107', '', 0.00, 3800, 2600, 1, 'Female', '', 'Shop', 'Winter', 'K.Antique', 0, '', '', 0, '', NULL),
(61, 'Karandi V.8634', '', 0.00, 3400, 2300, 2, 'Female', '', 'Shop', 'Winter', 'Farasha', 0, '', '', 0, '', NULL),
(62, 'Boutique V.28', '', 0.00, 7500, 5000, 5, 'Female', '', 'Shop', 'Winter', 'Labas-e-antaz', 0, '', 'Baber Saber', 0, '', NULL),
(63, 'Boutique V.12', '', 0.00, 7500, 5000, 6, 'Female', '', 'Shop', 'Winter', 'Labas-e-antaz', 0, '', 'Baber Saber', 0, '', NULL),
(64, 'Boutique V.8', '', 0.00, 5900, 4000, 3, 'Female', '', 'Shop', 'Winter', 'Labas-e-andaz', 0, '', 'Baber Saber', 0, '', NULL),
(65, 'Boutique V.11', '', 0.00, 5900, 4000, 4, 'Female', '', 'Shop', 'Winter', 'Labas-e-andaz', 0, '', 'Baber Saber', 0, '', NULL),
(66, 'Boutique V.4', '', 0.00, 5900, 4000, 5, 'Female', '', 'Shop', 'Winter', 'Labas-e-andaz', 0, '', 'Baber Saber', 0, '', NULL),
(67, 'Boutique V.5', '', 0.00, 5900, 4000, 4, 'Female', '', 'Shop', 'Winter', 'Labas-e-andaz', 0, '', 'Baber Saber', 0, '', NULL),
(68, 'Boutique V.23', '', 0.00, 6700, 4500, 6, 'Female', '', 'Shop', 'Winter', 'Labas-e-andaz', 0, '', 'Baber Saber', 0, '', NULL),
(69, 'Boutique V.17', '', 0.00, 5400, 3600, 5, 'Female', '', 'Shop', 'Winter', 'Labas-e-Labdaaz', 0, '', 'Baber Saber', 0, '', NULL),
(70, 'Boutique Almas V.2', '', 0.00, 6800, 4533, 4, 'Female', '', 'Shop', 'Winter', 'Fabrica Exclusive', 0, '', 'Ali Azam Cloth', 0, '', NULL),
(71, 'Boutique Almas V.3', '', 0.00, 6800, 4600, 4, 'Female', '', 'Shop', 'Winter', 'Fabrica Exclusive', 0, '', 'Ali Azam Cloth', 0, '', NULL),
(72, 'Boutique Nashmeen V.2', '', 0.00, 6800, 4600, 3, 'Female', '', 'Shop', 'Winter', 'Fabrica Exclusive', 0, '', 'Ali Azam Cloth', 0, '', NULL),
(73, 'Boutique Rang Raza V.2', '', 0.00, 6500, 4300, 4, 'Female', '', 'Shop', 'Winter', 'Fabrica Exclusive', 0, '', 'Ali Azam Cloth', 0, '', NULL),
(74, 'Boutique Rang Raza V.3', '', 1.00, 6500, 4400, 5, 'Female', '', 'shop', 'Winter', 'Fabrica Exclusive', 0, '', 'Ali Azam Cloth', 0, '', NULL),
(75, 'Boutique Chickan kari', '', 0.00, 4200, 2800, 16, 'Female', '', 'shop', 'Winter', 'yasir marina', 0, '', 'Umer Khalid', 0, '', NULL),
(76, 'Boutique Chickan kari V.27', '', 0.00, 4500, 3000, 6, 'Female', '', 'Shop', 'Winter', 'Hooran ', 0, '', 'Baber Saber', 0, '', NULL),
(77, 'Karandi V.66', '', 0.00, 3200, 2100, 6, 'Female', '', 'Shop', 'Winter', 'Dusty rose', 0, '', 'Baber Saber', 0, '', NULL),
(78, 'Boutique zirwa', '', 0.00, 2800, 1900, 3, 'Female', '', 'Shop', 'Winter', 'zirwa ', 0, '', 'sharawala', 0, '', NULL),
(79, 'Boutique Marina Chickan kari', '', 0.00, 4700, 3150, 5, 'Female', '', 'Shop', 'Winter', '', 0, '', 'sharawala', 0, '', NULL),
(80, 'Marina karhi', '', 0.00, 4200, 1800, 4, 'Female', '', 'Shop', 'Winter', 'Bareeza', 0, '', 'Baber Saber', 0, '', NULL),
(81, 'Meena kari V.2', 'yes', 0.00, 8900, 6000, 4, 'Female', '', '', 'Winter', 'Meena kari', 0, '', 'UK centre', 0, '', NULL),
(82, 'Marina Palachi', 'yes', 0.00, 7500, 5000, 2, 'Female', '', 'shop', 'Winter', 'Bareeza', 0, '', 'Baber Saber', 0, '', NULL),
(83, 'Linen Palachi', '', 0.00, 5700, 3800, 1, 'Female', '', 'Shop', 'Winter', 'Aqa Noor', 0, '', '', 0, '', NULL),
(84, 'Mask V.11', 'yes', 0.00, 7500, 5000, 3, 'Female', '', 'Shop', 'Winter', 'Mask', 0, '', 'UK centre', 0, '', NULL),
(85, 'Mask V.9', 'yes', 0.00, 7900, 5300, 4, 'Female', '', 'Shop', 'Winter', 'Mask', 0, '', 'UK centre', 0, '', NULL),
(86, 'Boutique Merjan', '', 0.00, 5500, 3700, 1, 'Female', '', 'Shop', 'Winter', 'merjan', 0, '', 'Merjan', 0, '', NULL),
(87, 'Boutique Karandi V.15', 'yes', 0.00, 7500, 5000, 0, 'Female', '', 'Shop', 'Winter', 'ABC', 0, '', '', 0, '', NULL),
(88, 'Hajra Waseem V.23', 'yes', 0.00, 6900, 4600, 2, 'Female', '', 'shop', 'Winter', 'Amina B', 0, '', 'Faislabad', 0, '', NULL),
(89, 'Hajra Waseem Viscos V.18', 'Yes', 0.00, 7400, 5000, 0, 'Female', '', 'Shop', 'Winter', 'Amina B', 0, '', 'Faislabad', 0, '', NULL),
(90, 'Amina B Linen V.414', 'yes', 0.00, 5800, 3900, 7, 'Female', '', '', 'Winter', 'Amina B', 0, '', 'SHEIKH YAWIR', 0, '', NULL),
(91, 'Amina B Linen V.422', 'yes', 0.00, 5800, 3900, 2, 'Female', '', '', 'Winter', 'Amina B', 0, '', 'SHEIKH YAWAR', 0, '', NULL),
(92, 'Amina B Linen V.417', 'Yes', 0.00, 6400, 4300, 2, 'Female', '', '', 'Winter', 'Amina B', 0, '', 'SHEIKH YAWAR', 0, '', NULL),
(93, 'Jay Namaz V.11', '', 0.00, 1000, 800, 6, '', '', 'shop', '', '', 0, '0', 'Savati Sawal', 0, '0', NULL),
(94, 'Jay Namaz V.13', '', 0.00, 1300, 900, 1, '', '', 'shop', '', '', 0, '', 'Savati Sawal', 0, '', NULL),
(95, 'Jay Namaz V.14', '', 0.00, 1400, 1000, 4, '', '', 'shop', '', '', 0, '', 'Savati Sawal', 0, '', NULL),
(96, 'Jay Namaz V.16', '', 0.00, 1600, 1100, 7, '', '', 'shop', '', '', 0, '', 'Savati Sawal', 0, '', NULL),
(97, 'Jay Namaz V.6', '', 0.00, 600, 400, 4, '', '', 'shop', '', '', 0, '', 'Savati Sawal', 0, '', NULL),
(98, 'Jay Namaz V.8', '', 0.00, 800, 550, 4, '', '', 'shop', '', '', 0, '', 'Savati Sawal', 0, '', NULL),
(99, 'Jay Namaz V.4.5', '', 0.00, 450, 300, 3, '', '', 'shop', '', '', 0, '', 'Savati Sawal', 0, '', NULL),
(100, 'Jay Namaz V.12', '', 0.00, 1200, 800, 1, '', '', 'shop', '', '', 0, '', 'Savati Sawal', 0, '', NULL),
(101, 'Amina B Kids 2 Piece', '', 0.00, 1800, 1200, 7, 'Female', '', 'Shop', 'Winter', 'Amina B', 0, '', 'Faislabad', 0, '', NULL),
(102, 'Ahram S/0 khadi V.12', '', 0.00, 1200, 800, 2, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(103, 'Ahram S/1 khadi V.13.5', '', 0.00, 1350, 900, 6, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(104, 'Ahram S/2 khadi V.15', '', 0.00, 1500, 1000, 1, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(105, 'Ahram S/M V.18', '', 0.00, 1800, 1250, 2, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(106, 'Ahram S/L khadi V.18', '', 0.00, 1800, 1250, 0, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(107, 'Ahram S/L khadi V.26', '', 0.00, 2600, 1800, 14, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '0', 'Sharif Shawl', 0, '0', NULL),
(108, 'Ahram S/L khadi V.27', '', 0.00, 2700, 1800, 0, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(109, 'Ahram S/L khadi V.29', '', 0.00, 2900, 2000, 9, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '0', 'Sharif Shawl', 0, '0', NULL),
(110, 'Ahram S/L Cotton V.29', '', 0.00, 2900, 2000, 3, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(111, 'Ahram S/L Cotton V.18', '', 0.00, 1800, 1250, 6, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '0', 'Sharif Shawl', 0, '0', NULL),
(112, 'Ahram S/L Tawel V.18', '', 0.00, 1800, 1250, 2, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(113, 'Ahram S/L Tawel V.22', '', 0.00, 2200, 1600, 4, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(114, 'Ahram S/L Tawel V.24', '', 0.00, 2400, 1600, 4, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(115, 'Ahram S/L Tawel V.32', '', 0.00, 3200, 2200, 6, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '0', 'Sharif Shawl', 0, '0', NULL),
(116, 'Shahzadi Jarjet', '', 0.00, 650, 440, 5, 'Female', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(117, '2 Dil Jarjet', '', 0.00, 850, 570, 9, 'Female', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(118, 'Nayab Grip', '', 0.00, 750, 500, 8, 'Female', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(119, 'Anam Shafoon', '', 0.00, 1050, 700, 24, 'Female', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(120, 'Lacha', '', 0.00, 1200, 800, 9, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(121, 'Lungi', '', 0.00, 1200, 800, 11, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '0', 'Sharif Shawl', 0, '0', NULL),
(122, 'Lungi V.1', '', 0.00, 1050, 700, 1, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(123, 'Lungi V.7.5', '', 0.00, 800, 500, 7, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '0', 'Sharif Shawl', 1, '0', NULL),
(124, 'Romal1/5', '', 0.00, 150, 100, 4, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(125, 'Romal2/5', '', 0.00, 250, 170, 15, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(126, 'Romal3/5', '', 0.00, 350, 240, 12, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(127, 'Romal4', '', 0.00, 400, 270, 6, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(128, 'Romal5', '', 0.00, 500, 340, 6, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(129, 'Romal5/5', '', 0.00, 550, 370, 6, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(130, 'Romal6', '', 0.00, 600, 400, 6, '', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(131, 'Romal1', '', 0.00, 1000, 750, 3, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(132, 'Lachay 5y', '', 0.00, 400, 270, 3, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(133, 'Lachay 10y', '', 0.00, 500, 340, 3, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(134, 'Shafoon Dupata ', '', 0.00, 1500, 1000, 3, 'Female', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(135, 'Shafoon Dupata Imbroidary', '', 0.00, 1800, 1200, 1, 'Female', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(136, 'Ajrak Shal ', '', 0.00, 800, 600, 16, 'Female', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(137, 'Burkha', '', 0.00, 1800, 1200, 4, 'Female', '', 'Shop', '', '', 0, '', 'sharawala', 0, '', NULL),
(138, 'Shal1', '', 0.00, 800, 550, 3, 'Male', '', 'shop', '', '', 0, '', 'Anwar Shal', 0, '', NULL),
(139, 'Shal2', '', 0.00, 1200, 800, 4, 'Male', '', 'shop', '', '', 0, '', 'Anwar Shal', 0, '', NULL),
(140, 'Shal3', '', 0.00, 1500, 1000, 5, '', '', 'shop', '', '', 0, '', 'Anwar Shal', 0, '', NULL),
(141, 'Shal4', '', 0.00, 1700, 1150, 1, 'Male', '', 'shop', '', '', 0, '', 'Anwar Shal', 0, '', NULL),
(142, 'Shal5', '', 0.00, 1800, 1200, 4, 'Male', '', 'shop', '', '', 0, '', 'Anwar Shal', 0, '', NULL),
(143, 'Shal6', '', 0.00, 2300, 1600, 4, 'Male', '', 'shop', '', '', 0, '', 'Anwar Shal', 0, '', NULL),
(144, 'Shal7', '', 0.00, 3200, 2200, 4, 'Male', '', 'shop', '', '', 0, '', 'Anwar Shal', 0, '', NULL),
(145, 'Shal8', '', 0.00, 4000, 2700, 2, 'Male', '', 'shop', '', '', 0, '', 'Anwar Shal', 0, '', NULL),
(146, 'Shal9', '', 0.00, 4500, 3000, 4, 'Male', '', 'shop', '', '', 0, '', 'Anwar Shal', 0, '', NULL),
(147, 'Shal10', '', 0.00, 4900, 3300, 4, '', '', 'shop', '', '', 0, '', 'Anwar Shal', 0, '', NULL),
(148, 'Shal11', '', 0.00, 6000, 4000, 0, 'Male', '', 'shop', '', '', 0, '', 'Anwar Shal', 0, '', NULL),
(149, 'Shal12', '', 0.00, 8000, 5400, 4, 'Male', '', 'shop', '', '', 0, '', 'Anwar Shal', 0, '', NULL),
(150, 'Shal13', '', 0.00, 9900, 6600, 1, 'Male', '', 'shop', '', '', 0, '', 'Anwar Shal', 0, '', NULL),
(151, 'karanthi Safa1', '', 0.00, 350, 300, 23, 'Male', '', 'shop', '', 'Shayam Kirti ', 0, '', 'Sharif Shawl', 0, '', NULL),
(152, 'Indian Pagh', '', 0.00, 600, 400, 3, 'Male', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(153, 'Indian Pagh1', '', 0.00, 1100, 800, 3, 'Male', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(154, 'Indian Dupata', '', 0.00, 600, 400, 16, 'Male', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(155, 'Ladies Shal1', '', 0.00, 1800, 1200, 1, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(156, 'Ladies Shal2', '', 0.00, 1900, 1250, 1, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(157, 'Ladies Shal3', '', 0.00, 2100, 1400, 1, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(158, 'Ladies Shal4', '', 0.00, 2500, 1650, 5, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(159, 'Ladies Shal5', '', 0.00, 3000, 2000, 2, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(160, 'Ladies Shal6', '', 0.00, 3500, 2400, 5, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(161, 'Ladies Shal7', '', 0.00, 5000, 3400, 5, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(162, 'Ladies Namaz Shal8 without sleeves', '', 0.00, 1200, 800, 3, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(163, 'Ladies Namaz Shal9 with sleeves', '', 0.00, 1500, 1000, 3, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(164, 'Ladies Shal10', '', 0.00, 1300, 850, 4, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(165, 'Welwet Shal11', '', 0.00, 3200, 2200, 2, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(166, 'Welwet Shal12', '', 0.00, 3300, 2200, 2, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(167, 'Welwet Shal13', '', 0.00, 4000, 2700, 0, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(168, 'Welwet Shal14', '', 0.00, 2600, 1800, 1, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(169, 'Ladies Ahram V.7', '', 0.00, 700, 450, 1, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(170, 'Ladies Ahram V.12', '', 0.00, 1200, 800, 9, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(171, 'Haji Chatai', '', 0.00, 950, 650, 3, '', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(172, 'Haji Pillow', '', 0.00, 600, 400, 12, '', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(173, 'Haji Leather Belt/1', '', 0.00, 600, 400, 6, '', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(174, 'Haji Leather Belt/2', '', 0.00, 750, 500, 1, '', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(175, 'Haji Leather Belt/3', '', 0.00, 900, 600, 2, 'Male', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(176, 'Haji Leather Belt/4', '', 0.00, 1000, 670, 0, 'Male', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(177, 'Haji bag', '', 0.00, 250, 170, 5, 'Male', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(178, 'Haji Leather Belt/5', '', 0.00, 250, 170, 11, 'Male', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(179, 'Haji Leather Belt/6', '', 0.00, 600, 400, 8, 'Male', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(180, 'Ladies lawn Chadar/1', '', 0.00, 2400, 1600, 10, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(181, 'Ladies lawn Chadar/2', '', 0.00, 2000, 1300, 6, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(182, 'Ladies lawn Chadar/3', '', 0.00, 2700, 1800, 8, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(183, 'Ladies lawn Dupatta/1', '', 0.00, 800, 600, 4, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(184, 'Ladies lawn Dupatta/2', '', 0.00, 1000, 650, 3, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(185, 'Ladies Linen Dupatta/3', '', 0.00, 1100, 750, 2, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(186, 'Ladies lawn Chadar/4', '', 0.00, 1200, 800, 2, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(187, 'Ladies Swiss Chadar/1', '', 0.00, 1300, 850, 1, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(188, 'Ladies Swiss Chadar/2', '', 0.00, 1800, 1200, 1, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(189, 'Ladies Swiss Chadar/3', '', 0.00, 2000, 1350, 3, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(190, 'Rashmi Shalwar', '', 0.00, 1100, 800, 1, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(191, 'Indian Pagh2', '', 0.00, 550, 400, 2, 'Male', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(192, 'Indian Dupata1', '', 0.00, 700, 450, 4, 'Male', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(193, 'Rashmi Pinthi Dupata', '', 0.00, 1200, 800, 6, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(194, 'Stallers Lawn', '', 0.00, 550, 380, 4, 'Female', '', 'shop', '', '', 0, '', 'Sharif Shawl', 0, '', NULL),
(195, 'Zaby Wool', '', 0.00, 3300, 2200, 20, 'Male', '', 'shop', 'Winter', 'Zouk', 0, '', 'Beqash', 0, '', NULL),
(196, 'Karandi Wool', '', 0.00, 2700, 1800, 3, 'Male', '', 'shop', '', 'Karandi Wool', 0, '', 'Beqash', 0, '', NULL),
(197, 'Vigo Wool', '', 0.00, 3900, 2600, 39, 'Male', '', 'shop', '', 'Sir', 0, '', 'Abdulla', 0, '', NULL),
(198, 'Zuriq Wool', '', 0.00, 3900, 2600, 35, 'Male', '', 'shop', '', 'IV', 0, '', 'Abdulla', 0, '', NULL),
(199, 'Patangeer Wool', '', 0.00, 3500, 2300, 15, 'Male', '', 'shop', 'Winter', 'Sir', 0, '', 'Abdulla', 0, '', NULL),
(200, 'Renault Wool', '', 0.00, 3500, 2500, 7, 'Male', '', 'shop', 'Winter', 'Sir', 0, '', 'Abdulla', 0, '', NULL),
(201, 'Ventage Wool', '', 0.00, 2800, 1800, 6, 'Male', '', 'shop', 'Winter', 'Sir', 0, '', 'Abdulla', 0, '', NULL),
(202, 'Panama Wool', '', 0.00, 3400, 2300, 6, 'Male', '', 'shop', 'Winter', 'Sir', 0, '', 'Abdulla', 0, '', NULL),
(203, 'Ahram S/L khadi V.23', '', 0.00, 2300, 1500, 4, 'Female', '', '', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(204, 'Ahram S/L Tawel V.27', '', 0.00, 2700, 1800, 5, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(205, 'Ahram S/2 khadi V.17', '', 0.00, 1700, 1100, 3, 'Male', '', 'Shop', '', 'Sharif Shawl', 0, '', 'Sharif Shawl', 0, '', NULL),
(206, 'Thanak Suiting', '', 0.00, 2800, 1830, 14, 'Male', '', 'Shop', 'Winter', '', 0, '', 'Rehman Corporation', 0, '', NULL),
(207, 'pashmina Wool', '', 0.00, 3400, 2230, 31, 'Male', '', '', 'Winter', '', 0, '', 'Baqsh', 0, '', NULL),
(208, 'Chap Wool', '', 0.00, 3200, 2150, 24, 'Male', '', '', 'Winter', 'Magic', 0, '', 'Abdulla', 0, '', NULL),
(209, 'Pepsico Wool', '', 0.00, 2800, 1830, 19, 'Male', '', '', 'Winter', '', 0, '', 'Baqsh', 0, '', NULL),
(210, 'Magic Wool', '', 0.00, 3400, 2230, 23, 'Male', '', '', 'Winter', 'Sir', 0, '', 'Abdulla', 0, '', NULL),
(211, 'Great Suiting', '', 0.00, 3900, 2600, 32, 'Male', '', '', 'Winter', '', 0, '', 'Rehman Corporation', 0, '', NULL),
(212, 'German Wool', '', 0.00, 2800, 1830, 38, 'Male', '', '', 'Winter', '', 0, '', 'Baqsh', 0, '', NULL),
(213, 'Best Vicona', '', 0.00, 2400, 1600, 41, 'Male', '', '', 'Winter', '', 0, '', 'Baqsh', 0, '', NULL),
(214, '5 Star', '', 0.00, 2800, 1750, 47, 'Male', '', '', 'Winter', '', 0, '', 'Baqsh', 0, '', NULL),
(215, 'Mashter Wool', '', 0.00, 3300, 2200, 39, 'Male', '', '', 'Winter', '', 0, '', 'Baqsh', 0, '', NULL),
(216, 'Chand Thara Wool', '', 0.00, 2400, 1600, 36, 'Male', '', '', 'Winter', '', 0, '', 'Baqsh', 0, '', NULL),
(217, 'Business Cloth', '', 0.00, 4200, 0, 1, '', '', '', '', '', 0, '', 'Amanat Cloth', 0, '', NULL),
(218, 'Black Grapes', '', 0.00, 2500, 0, 1, 'Male', '', '', 'Winter', '', 0, '', 'Baqsh', 0, '', NULL),
(219, 'Cambridge Swiss', '', 0.00, 2500, 0, 1, 'Male', '', '', 'Winter', '', 0, '', 'Baqsh', 0, '', NULL),
(220, 'Italian', '', 0.00, 2800, 0, 1, 'Male', '', '', 'Winter', '', 0, '', 'Baqsh', 0, '', NULL),
(221, 'Zamzama', '', 0.00, 2400, 0, 1, 'Male', '', '', 'Winter', '', 0, '', 'Baqsh', 0, '', NULL),
(222, 'Boski Boring Gala', 'yes', 0.00, 8500, 6375, 9, 'Male', '', '', 'Winter', 'Ghazi', 0, '', 'Multan', 0, '', NULL),
(223, 'Royal Spun Ban Pati', 'yes', 0.00, 4990, 3750, 21, 'Male', '', '', 'Winter', 'Ghazi', 0, '', 'Multan', 0, '', NULL),
(224, 'Royal Spun Ban Gala', 'yes', 0.00, 4790, 3600, 11, 'Male', '', '', 'Winter', 'Ghazi', 0, '', 'Multan', 0, '', NULL),
(225, 'Skab Boski Hand Made', 'yes', 0.00, 3990, 3000, 9, 'Male', '', '', 'Winter', 'Ghazi', 0, '', 'Multan', 0, '', NULL),
(226, 'Skab Boski Imbroidary', 'yes', 0.00, 3690, 2800, 9, 'Male', '', '', 'Winter', 'Ghazi', 0, '', 'Multan', 0, '', NULL),
(227, 'Candy Kather', 'yes', 0.00, 3190, 2400, 4, 'Male', '', '', 'Winter', 'Ghazi', 0, '', 'Multan', 0, '', NULL),
(228, 'Royal Spun Suiting', 'yes', 0.00, 4290, 3220, 8, 'Male', '', '', 'Winter', 'Ghazi', 0, '', 'Multan', 0, '', NULL),
(229, 'Design V.402', 'yes', 0.00, 3090, 2320, 1, 'Male', '', '', 'Winter', 'Ghazi', 0, '', 'Multan', 0, '', NULL),
(230, 'Washingware V.4001', 'yes', 0.00, 2690, 2020, 1, 'Male', '', '', 'Winter', 'Ghazi', 0, '', 'Multan', 0, '', NULL),
(231, 'White strom', 'yes', 0.00, 4490, 3380, 12, 'Male', '', '', 'Winter', 'Ghazi', 0, '', 'Multan', 0, '', NULL),
(232, 'Narkins Cranprry', 'yes', 0.00, 4125, 3100, 3, 'Male', '', '', 'Winter', 'Ghazi', 0, '', 'Multan', 0, '', NULL),
(233, 'Narkins habibi', 'yes', 0.00, 3275, 2460, 3, 'Male', '', '', 'Winter', 'Ghazi', 0, '', 'Multan', 0, '', NULL),
(234, 'Rajahs Submit', 'yes', 0.00, 3830, 2900, 2, 'Male', '', '', 'Winter', 'Ghazi', 0, '', 'Multan', 0, '', NULL),
(235, 'Dynasty SuperActive', 'Yes', 0.00, 4300, 3230, 1, 'Male', '', '', 'Winter', 'Ghazi', 0, '', 'Multan', 0, '', NULL),
(236, 'Pasha', 'Yes', 0.00, 4200, 3150, 2, 'Male', '', '', 'Winter', 'Ghazi', 0, '', 'Multan', 0, '', NULL),
(237, 'Pasha Moon Stone', 'Yes', 0.00, 4450, 3340, 1, 'Male', '', '', 'Winter', 'Ghazi', 0, '', 'Multan', 0, '', NULL),
(238, 'MF High Class Gum pati', 'Yes', 0.00, 2950, 2220, 1, 'Male', '', '', 'Winter', 'Ghazi', 0, '', 'Multan', 0, '', NULL),
(239, 'MS Gala Khadi', 'Yes', 0.00, 2400, 1800, 1, 'Male', '', '', 'Winter', 'Ghazi', 0, '', 'Multan', 0, '', NULL),
(240, 'Orient Ghadi', 'Yes', 0.00, 3600, 2700, 2, 'Male', '', '', 'Winter', 'Orient', 0, '', 'sharawala', 0, '', NULL),
(241, 'Orient Ghadi V.48', 'Yes', 0.00, 4800, 3600, 1, 'Male', '', '', 'Winter', 'Orient', 0, '', 'sharawala', 0, '', NULL),
(242, 'Orient Ghadi V.55', 'Yes', 0.00, 5500, 4130, 1, 'Male', '', '', 'Winter', 'Orient', 0, '', 'sharawala', 0, '', NULL),
(243, 'MS Khadi', 'Yes', 0.00, 2800, 2100, 1, 'Male', '', '', 'Winter', 'Orient', 0, '', 'sharawala', 0, '', NULL),
(244, 'Chawla Gala Khadi', 'Yes', 0.00, 3800, 2850, 1, 'Male', '', '', 'Winter', 'Orient', 0, '', 'sharawala', 0, '', NULL),
(245, 'Grace khadi', 'Yes', 0.00, 4200, 3150, 1, 'Male', '', '', 'Winter', 'Orient', 0, '', 'sharawala', 0, '', NULL),
(246, 'JNG Chicken kari', 'Yes', 0.00, 4200, 3150, 1, 'Male', '', '', 'Winter', 'JNG', 0, '', '', 0, '', NULL),
(247, 'JNG Chicken kari V.48', 'Yes', 0.00, 4800, 3600, 3, 'Male', '', '', 'Winter', 'JNG', 0, '', '', 0, '', NULL),
(248, 'sharawala', 'Yes', 0.00, 3950, 3000, 0, 'Male', '', '', 'Winter', 'Orient', 0, '', '', 0, '', NULL),
(249, 'Important Wool', '', 1.00, 1200, 800, 0, 'Male', '', 'Shop', 'Winter', '', 0, '', 'Shadman', 0, '', NULL),
(250, 'Toyobo', '', 1.00, 1200, 800, 0, 'Male', '', 'Shop', 'Winter', 'Ramzan Lal Khan', 0, '', 'Shadman', 0, '', NULL),
(251, 'Narkins Italian V.0006', '', 1.00, 2400, 1600, 0, 'Male', '', 'Shop', 'Winter', 'Ravi', 0, '', '', 0, '', NULL),
(252, 'Narkins Italian V.0005', '', 1.00, 2600, 1700, 0, 'Male', '', 'Shop', 'Winter', 'Ravi', 0, '', '', 0, '', NULL),
(253, 'Narkins Italian V.42913', '', 1.00, 2600, 1600, 0, 'Male', '', 'Shop', 'Winter', 'Ravi', 0, '', '', 0, '', NULL),
(254, 'Narkins Italian V.30010', '', 1.00, 2600, 1670, 0, 'Male', '', 'Shop', 'Winter', 'Ravi', 0, '', '', 0, '', NULL),
(255, 'Glamur Zeqon', '', 1.00, 2400, 1600, 0, 'Male', '', 'Shop', 'Winter', 'Rehman', 0, '', '', 0, '', NULL),
(256, 'Boski karhi Latha Shalwar', 'Yes', 0.00, 6000, 4000, 1, 'Male', '', 'Shop', 'Winter', '', 0, '', 'sharawala', 0, '', NULL),
(257, 'karandi karhi', 'yes', 0.00, 3950, 2600, 1, 'Male', '', 'Shop', 'Winter', '', 0, '', 'sharawala', 0, '', NULL),
(258, 'Washingware karhi', 'Yes', 0.00, 3600, 2400, 2, 'Male', '', 'Shop', 'Winter', '', 0, '', 'sharawala', 0, '', NULL),
(259, 'Washingware karhi V.38', 'Yes', 0.00, 3800, 2500, 6, 'Male', '', 'Shop', 'Winter', '', 0, '', 'sharawala', 0, '', NULL),
(260, 'Washingware karhi V.42', 'Yes', 0.00, 4200, 2400, 2, 'Male', '', 'Shop', 'Winter', 'Ghazi', 0, '', '', 0, '', NULL),
(261, 'Washingware karhi V.44', 'Yes', 0.00, 4400, 2450, 17, 'Male', '', 'Shop', 'Winter', 'Ghazi', 0, '', '', 0, '', NULL),
(262, 'Washingware karhi V.28', 'Yes', 0.00, 2800, 1850, 3, 'Male', '', 'Shop', 'Winter', '', 0, '', 'sharawala', 0, '', NULL),
(263, 'Washingware karhi V.36', 'Yes', 0.00, 3600, 3200, 2, 'Male', '', 'Shop', 'Winter', '', 0, '', 'sharawala', 0, '', NULL),
(264, 'Washingware karhi V.32', 'Yes', 0.00, 3200, 2050, 1, 'Male', '', 'Shop', 'Winter', '', 0, '', 'sharawala', 0, '', NULL),
(265, 'Washingware karhi V.24', 'Yes', 0.00, 2400, 1600, 1, 'Male', '', 'Shop', 'Winter', '', 0, '', 'sharawala', 0, '', NULL),
(266, 'Washingware karhi V.45', 'Yes', 0.00, 4500, 3000, 1, 'Male', '', 'Shop', 'Winter', '', 0, '', 'sharawala', 0, '', NULL),
(267, 'Washingware karhi V.55', 'Yes', 0.00, 5500, 3700, 1, 'Male', '', 'Shop', 'Winter', '', 0, '', 'sharawala', 0, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `add_supplier`
--

CREATE TABLE `add_supplier` (
  `supplier_id` int(11) NOT NULL,
  `Delivery_Boy_Name` varchar(255) NOT NULL,
  `Customer_Address` varchar(255) NOT NULL,
  `Bill_ID` varchar(255) NOT NULL,
  `Ship_ID` varchar(255) NOT NULL,
  `Shipping_Cost` varchar(255) NOT NULL,
  `Date_of_Shipment` date NOT NULL,
  `Mode_of_Travel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `fathername` varchar(60) NOT NULL,
  `CNIC` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `emailpassword` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ROLE` varchar(30) NOT NULL,
  `Is_Ban` tinyint(10) NOT NULL DEFAULT 0 COMMENT '0=unban, 1=ban',
  `Created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `name`, `fathername`, `CNIC`, `email`, `emailpassword`, `username`, `password`, `ROLE`, `Is_Ban`, `Created_at`) VALUES
(1, 'muhammad ishaq', 'alimdin', '352011249425', 'ishaq053@gmail.com', '12345678', 'admin', 'admin321', 'Admin', 0, NULL),
(3, 'noman', 'muhammad noman', '3520112494253', 'imranidrees053@gmail.com', '12345678', 'staff', 'staff321', 'staff', 0, '2024-09-13'),
(4, 'ishaq', 'muhammad Idrees', '3520112494', 'imranidrees053@gmail.com', '12345678', 'manager', 'manager321', 'manager', 0, '2024-09-13'),
(15, 'imran', 'muhammad Idrees', '352011249', 'imranidrees053@gmail.com', '12345678', 'imran', '$2y$10$FBSKmmPsLhH1cujCuVdwFua07MkJL3A32Uq2MLQJ77W', 'staff', 0, '2024-09-17');

-- --------------------------------------------------------

--
-- Table structure for table `admin_access_pages`
--

CREATE TABLE `admin_access_pages` (
  `id` int(10) NOT NULL,
  `page_name` varchar(50) NOT NULL,
  `display_page` varchar(50) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_access_pages`
--

INSERT INTO `admin_access_pages` (`id`, `page_name`, `display_page`, `Status`) VALUES
(1, 'Add_Customer.html', 'Add_Customer', 'add'),
(2, 'Print_bill.php', 'Print_bill', 'add'),
(3, 'Add_Stock.html', 'Add_Stock', 'add'),
(4, 'Add_Supplier.html', 'Add_Supplier', 'add'),
(5, 'Add_Documents.html', 'Add_Documents', 'add'),
(6, 'Add_Purchases.html', 'Add_Purchases', 'add'),
(7, 'Return_Product.html', 'Return Product', 'add'),
(8, 'view_Customer.html ', 'view_Customer', 'View'),
(9, 'view_Employee.html', 'view_Employee', 'view'),
(10, 'view_Stock.html', 'view_Stock', 'view'),
(11, 'view_Supplier.html', 'view_Supplier', 'view'),
(12, 'view_Documents.html', 'view_Documents', 'view'),
(13, 'view_Purchases.html', 'view_Purchases', 'view'),
(14, 'V_sale.php', 'V_sale', 'view'),
(15, 'update_cust.php', 'update_cust', 'update'),
(16, 'update_empl.php', 'update_empl', 'update'),
(17, 'update_stocks.php', 'update_stocks', 'update'),
(18, 'update_colours.php', 'update_colours', 'update'),
(19, 'update_suppliers.php', 'update_suppliers', 'update'),
(20, 'update_purchases.php', 'update_purchases', 'update'),
(21, 'update_sale.php', 'update_sale', 'update'),
(22, 'Add_Employee.html', 'Add_Employee', 'add');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_history`
--

CREATE TABLE `employee_salary_history` (
  `id` int(11) NOT NULL,
  `Employee_Name` varchar(255) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `Salary` decimal(10,2) NOT NULL,
  `Advanced_Salary` decimal(10,2) NOT NULL,
  `Advanced_Salary_Date` date NOT NULL,
  `Ramaining_Salary` decimal(10,2) NOT NULL,
  `Ramaining_Salary_Date` date NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `installment_payments_purchases`
--

CREATE TABLE `installment_payments_purchases` (
  `installment_purchases_id` int(11) NOT NULL,
  `In_Party_Name` varchar(255) NOT NULL,
  `Bill_no` varchar(255) NOT NULL,
  `Payment_Date` date NOT NULL,
  `Receiving_Person` varchar(255) NOT NULL,
  `Payment` enum('Cash','Bank') NOT NULL,
  `Bank_Name` varchar(255) DEFAULT NULL,
  `Check_no` varchar(255) DEFAULT NULL,
  `Check_Date` date DEFAULT NULL,
  `pay_party_payment` int(11) NOT NULL,
  `Raining_Payment` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manager_access_pages`
--

CREATE TABLE `manager_access_pages` (
  `id` int(10) NOT NULL,
  `page_name` varchar(30) NOT NULL,
  `display_page` varchar(30) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager_access_pages`
--

INSERT INTO `manager_access_pages` (`id`, `page_name`, `display_page`, `Status`) VALUES
(1, 'Add_Customer.html', 'Add_Customer', 'add'),
(2, 'Add_Employee.html', 'Add_Employee', 'add'),
(3, 'Add_Stock.html', 'Add_Stock', 'add'),
(4, 'Add_Supplier.html', 'Add_Supplier', 'add'),
(5, 'Add_Documents.html', 'Add_Documents', 'add'),
(6, 'Add_Purchases.html', 'Add_Purchases', 'add'),
(7, 'Return_Product.html', 'Return_Product', 'add'),
(8, 'view_Customer.html', 'view_Customer', 'view'),
(9, 'view_Employee.html', 'view_Employee', 'view'),
(10, 'view_Supplier.html', 'view_Supplier', 'view'),
(11, 'view_Documents.html', 'view_Documents', 'view'),
(12, 'view_Purchases.html', 'view_Purchases', 'view'),
(13, 'V_sale.php', 'V_sale', 'view'),
(14, 'Add_Customer.html', 'Add_Customer', 'add'),
(15, 'Add_Supplier.html', 'Add_Supplier', 'add');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `customer_id` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `Item_of_customer_order` varchar(255) NOT NULL,
  `Quantity` varchar(255) DEFAULT NULL,
  `Purchase_date` date NOT NULL DEFAULT current_timestamp(),
  `Price` int(10) NOT NULL,
  `current_total` int(10) GENERATED ALWAYS AS (`Quantity` * `Price`) STORED,
  `total_bill` int(10) DEFAULT NULL,
  `gross_profit` int(100) NOT NULL,
  `profit_per_customer` int(100) NOT NULL,
  `discount` int(11) NOT NULL,
  `total_dicount_per_customer` int(100) NOT NULL,
  `product_colour_name` varchar(50) NOT NULL,
  `product_colour_quantity` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`customer_id`, `order_id`, `Item_of_customer_order`, `Quantity`, `Purchase_date`, `Price`, `total_bill`, `gross_profit`, `profit_per_customer`, `discount`, `total_dicount_per_customer`, `product_colour_name`, `product_colour_quantity`) VALUES
(1, 1, 'Kather Print 2 Piece', '5 (M)', '2024-11-01', 450, NULL, 550, 0, 0, 0, 'All colours', 0),
(1, 2, 'Colorita Mother Collection linen', '1', '2024-11-01', 3200, 5450, 1040, 1590, 0, 0, 'All Colours Colorita Mother Collection linen', 0),
(2, 3, '5 star Linen laroz', '1', '2024-11-01', 2600, 2500, 725, 625, 100, 100, 'All 5 Star linen laroz colour', 0),
(3, 4, 'Marina Print 3 piece', '1', '2024-11-01', 3600, 3600, 720, 720, 0, 0, 'All Clours Marina Print 3 piece', 0),
(4, 5, 'CC Meraj Linen', '1', '2024-11-01', 3200, 3000, 640, 440, 200, 200, 'All Colours CC Meraj Linen', 0),
(5, 6, 'Boutique Almas V.2', '1', '2024-11-02', 6800, NULL, 6800, 0, 700, 0, 'Mahroon', 0),
(5, 7, 'Boutique Cotrai', '1', '2024-11-02', 3900, 9000, 3900, 1867, 1000, 1700, 'black', 0),
(6, 8, 'Marina Print 3 piece', '1', '2024-11-02', 3600, NULL, 720, 0, 0, 0, 'All Clours Marina Print 3 piece', 0),
(6, 9, 'Colorita Mother Collection linen', '1', '2024-11-02', 3200, 6800, 1040, 1760, 0, 0, 'All Colours Colorita Mother Collection linen', 0),
(7, 10, 'Meraj Lexury Fancey Linen', '1', '2024-11-02', 3800, NULL, 760, 0, 0, 0, 'All Colours Meraj Lexury Fancey Linen', 0),
(7, 11, 'Classic Linen 3 Piece', '1', '2024-11-02', 2000, 5800, 150, 910, 0, 0, 'All colours Classic linen 3 piece', 0),
(8, 12, 'Classic Cotton print', '3.5 (M)', '2024-11-02', 450, NULL, 525, 0, 175, 0, 'multi colour', 0),
(8, 13, 'Kather Print 2 Piece', '14 (M)', '2024-11-02', 450, 7000, 1540, 1190, 700, 875, 'All colours', 0),
(9, 14, 'Boutique Kaddar', '1', '2024-11-02', 0, NULL, -2200, 0, 0, 0, 'Orange', 0),
(9, 15, 'Boutique Kaddar', '1', '2024-11-02', 3200, 3200, 1000, -1200, 0, 0, 'Orange', 0),
(10, 16, 'Classic Linen 3 Piece', '3', '2024-11-02', 2000, 6000, 450, 450, 0, 0, 'All colours Classic linen 3 piece', 0),
(11, 17, 'Classic Linen 3 Piece', '1', '2024-11-02', 2000, 2000, 150, 150, 0, 0, 'All colours Classic linen 3 piece', 0),
(12, 18, 'Classic Linen 3 Piece', '1', '2024-11-02', 2000, NULL, 150, 0, 0, 0, 'All colours Classic linen 3 piece', 0),
(12, 19, 'Boutique Linen L/S', '1', '2024-11-02', 2800, NULL, 900, 0, 0, 0, 'Dark Brown', 0),
(12, 20, 'Fancey Linen Raplica', '1', '2024-11-02', 2600, NULL, 600, 0, 0, 0, 'Pink Salmon', 0),
(12, 21, 'Boutique Cotrai', '1', '2024-11-02', 3900, 11300, 1300, 2950, 0, 0, 'Frozy', 0),
(13, 22, 'Boutique Linen L/S', '1', '2024-11-04', 2800, NULL, 900, 0, 0, 0, 'Brown', 0),
(13, 23, 'Jay Namaz V.6', '1', '2024-11-04', 600, NULL, 200, 0, 0, 0, 'All Colurs Jay Namaz V.6', 0),
(13, 24, 'Marina Print 3 piece', '1', '2024-11-04', 3600, NULL, 720, 0, 0, 0, 'All Clours Marina Print 3 piece', 0),
(13, 25, 'Marina Print 3 piece', '1', '2024-11-04', 4500, NULL, 720, 0, 0, 0, 'All Clours Marina Print 3 piece', 0),
(13, 26, 'Dhanak V.6013', '1', '2024-11-04', 4200, NULL, 1400, 0, 400, 0, 'Skin Brown', 0),
(13, 27, 'Boutique Cotrai', '1', '2024-11-04', 3900, NULL, 1300, 0, 400, 0, 'Brown', 0),
(13, 28, 'Classic Cotton print', '10 (M)', '2024-11-04', 450, 22800, 1500, 5440, 500, 1300, 'multi colour', 0),
(14, 29, 'Kather Print 2 Piece', '10 (M)', '2024-11-04', 450, 4400, 1100, 1000, 100, 100, 'All colours', 0),
(15, 30, 'Marina Print 3 piece', '4', '2024-11-04', 3600, 14400, 2880, 2880, 0, 0, 'All Clours Marina Print 3 piece', 0),
(16, 31, 'Jay Namaz V.14', '2', '2024-11-04', 1400, 2800, 800, 800, 0, 0, 'All Colurs Jay Namaz V.14', 0),
(17, 32, 'Classic Linen 3 Piece', '1', '2024-11-04', 2000, 2000, 150, 150, 0, 0, 'All colours Classic linen 3 piece', 0),
(18, 33, 'Marina Print 3 piece', '1', '2024-11-04', 3600, 3300, 720, 420, 300, 300, 'All Clours Marina Print 3 piece', 0),
(21, 34, 'Marina Print 3 piece', '1', '2024-11-04', 3600, NULL, 720, 0, 0, 0, 'All Clours Marina Print 3 piece', 0),
(21, 37, 'Boutique Rang Raza V.3', '1', '2024-11-04', 6500, 10000, 2100, 2720, 100, 100, 'Navi Blue', 0),
(22, 38, 'Kather print 3 piece', '1', '2024-11-04', 3200, NULL, 750, 0, 0, 0, 'All Colours Gather print 3 piece', 0),
(22, 39, 'Kather Print 2 Piece', '10 (M)', '2024-11-04', 450, 7400, 1100, 1550, 300, 300, 'All colours', 0),
(23, 40, '5 star Linen laroz', '1', '2024-11-05', 2600, NULL, 725, 0, 0, 0, 'All 5 Star linen laroz colour', 0),
(23, 41, 'Kather Print 2 Piece', '3.5 (M)', '2024-11-05', 450, NULL, 385, 0, 175, 0, 'All colours', 0),
(23, 42, '5 star Linen laroz', '1', '2024-11-05', 2600, NULL, 725, 0, 100, 0, 'All 5 Star linen laroz colour', 0),
(23, 43, 'Shal4', '1', '2024-11-05', 1700, 8200, 550, 2110, 0, 275, 'All colours Shal4', 0),
(24, 44, 'Vichar Marina', '2', '2024-11-05', 4600, NULL, 1680, 0, 0, 0, 'All Colours Vichar Marina', 0),
(24, 45, '5 star Linen laroz', '2', '2024-11-05', 2600, NULL, 1450, 0, 0, 0, 'All 5 Star linen laroz colour', 0),
(24, 46, 'Colorita Banodoria linen', '1', '2024-11-05', 3800, 18000, 1000, 3930, 200, 200, 'All Colours Colorita Banodoria linen', 0),
(25, 48, 'Boutique V.12', '1', '2024-11-06', 7500, NULL, 2500, 0, 1000, 0, 'Golden', 0),
(25, 49, 'Fancey Marina', '1', '2024-11-06', 4800, NULL, 2600, 0, 2400, 0, 'Brown', 0),
(25, 50, 'Kather print 3 piece', '1', '2024-11-06', 3200, NULL, 750, 0, 0, 0, 'All Colours Gather print 3 piece', 0),
(25, 51, 'Karandi V.6012', '1', '2024-11-06', 3900, NULL, 1500, 0, 100, 0, 'Pista Green', 0),
(25, 52, 'Meraj Lexury Fancey Linen', '1', '2024-11-06', 3800, NULL, 760, 0, 0, 0, 'All Colours Meraj Lexury Fancey Linen', 0),
(25, 53, 'Marina Print 3 piece', '1', '2024-11-06', 3600, NULL, 720, 0, 0, 0, 'All Clours Marina Print 3 piece', 0),
(25, 54, 'karanthi Safa1', '2', '2024-11-06', 350, 24000, 100, 5430, 0, 3500, 'White', 0),
(26, 55, '5 star Linen laroz', '1', '2024-11-07', 2600, 2500, 725, 625, 100, 100, 'All 5 Star linen laroz colour', 0),
(27, 56, 'Boutique Karandi V.15', '1', '2024-11-07', 7500, 6000, 2500, 1000, 1500, 1500, 'Pink', 0),
(31, 58, 'Marina Print 3 piece', '1', '2024-11-08', 3600, 3500, 720, 620, 100, 100, 'All Clours Marina Print 3 piece', 0),
(32, 59, '5 star Linen laroz', '2', '2024-11-08', 2600, NULL, 1450, 0, 200, 0, 'All 5 Star linen laroz colour', 0),
(32, 60, 'Classic Linen 3 Piece', '2', '2024-11-08', 2000, 9000, 300, 1550, 0, 200, 'All colours Classic linen 3 piece', 0),
(33, 61, 'Lacha', '2', '2024-11-08', 1200, 2200, 400, 200, 200, 200, 'All Colours', 0),
(34, 62, 'Colorita Banodoria linen', '1', '2024-11-08', 3800, NULL, 1000, 0, 0, 0, 'All Colours Colorita Banodoria linen', 0),
(34, 63, 'Marina Print 3 piece', '1', '2024-11-08', 3600, NULL, 720, 0, 0, 0, 'All Clours Marina Print 3 piece', 0),
(34, 64, 'Shal12', '1', '2024-11-08', 8000, 14900, 2600, 3820, 500, 500, 'All colours Shal12', 0),
(35, 68, 'Linen 2 Piece', '10 (M)', '2024-11-11', 400, NULL, 1000, 0, 0, 0, 'Mix colours', 0),
(35, 69, 'Lacha', '1', '2024-11-11', 1200, NULL, 400, 0, 0, 0, 'All Colours', 0),
(35, 71, 'Boutique V.4', '1', '2024-11-11', 5900, NULL, 1900, 0, 900, 0, 'Pista Green', 0),
(35, 72, 'Boutique V.4', '1', '2024-11-11', 5900, NULL, 1900, 0, 900, 0, 'Frozy', 0),
(35, 73, 'Boutique V.5', '1', '2024-11-11', 5900, NULL, 1900, 0, 900, 0, 'Peach Cream', 0),
(35, 74, 'Boutique V.5', '1', '2024-11-11', 5900, NULL, 1900, 0, 900, 0, 'Gray', 0),
(35, 75, 'Shal2', '1', '2024-11-11', 1200, NULL, 400, 0, 0, 0, 'All colours Shal2', 0),
(35, 76, 'Ahram S/L khadi V.18', '1', '2024-11-11', 1800, NULL, 550, 0, 0, 0, 'white', 0),
(35, 77, 'Haji Leather Belt/1', '1', '2024-11-11', 600, NULL, 200, 0, 0, 0, 'black', 0),
(35, 78, 'Ahram S/L Cotton V.18', '1', '2024-11-11', 1800, NULL, 550, 0, 0, 0, 'white', 0),
(35, 79, 'Haji Leather Belt/1', '1', '2024-11-11', 600, 31200, 200, 7300, 0, 3600, 'black', 0),
(36, 80, 'Ahram S/L Cotton V.29', '1', '2024-11-10', 2900, NULL, 900, 0, 0, 0, 'white', 0),
(36, 81, 'Haji Leather Belt/4', '1', '2024-11-10', 1000, NULL, 330, 0, 0, 0, 'black', 0),
(36, 82, 'Haji bag', '2', '2024-11-12', 250, NULL, 160, 0, 0, 0, 'White', 0),
(36, 83, 'Jay Namaz V.13', '11', '2024-11-10', 1300, NULL, 4400, 0, 1100, 0, 'All Colurs Jay Namaz V.13', 0),
(36, 85, 'Stallers Lawn', '1', '2024-11-10', 550, NULL, 170, 0, 50, 0, 'All Colours ', 0),
(36, 86, 'Classic Linen 3 Piece', '1', '2024-11-10', 2000, NULL, 150, 0, 0, 0, 'All colours Classic linen 3 piece', 0),
(36, 87, 'Linen 2 Piece', '5 (M)', '2024-11-10', 400, NULL, 500, 0, 0, 0, 'Mix colours', 0),
(36, 88, 'Jay Namaz V.14', '3', '2024-11-10', 1400, NULL, 1200, 0, 0, 0, 'All Colurs Jay Namaz V.14', 0),
(36, 89, 'Jay Namaz V.13', '6', '2024-11-10', 1300, NULL, 2400, 0, 0, 0, 'All Colurs Jay Namaz V.13', 0),
(36, 90, 'Jay Namaz V.11', '5', '2024-11-10', 1100, NULL, 1500, 0, 500, 0, 'All Colour Jay Namaz V.11', 0),
(36, 91, 'Jay Namaz V.11', '1', '2024-11-10', 1100, NULL, 300, 0, 0, 0, 'All Colour Jay Namaz V.11', 0),
(36, 92, 'Marina Print 3 piece', '2', '2024-11-10', 3600, NULL, 1440, 0, 0, 0, 'All Clours Marina Print 3 piece', 0),
(36, 93, '5 star Linen laroz', '3', '2024-11-10', 2600, NULL, 2175, 0, 0, 0, 'All 5 Star linen laroz colour', 0),
(36, 94, 'Marina Print 3 piece', '3', '2024-11-10', 3600, NULL, 2160, 0, 300, 0, 'All Clours Marina Print 3 piece', 0),
(36, 95, 'Marina Print 3 piece', '1', '2024-11-10', 3600, NULL, 720, 0, 0, 0, 'All Clours Marina Print 3 piece', 0),
(36, 96, 'Marina 2 Piece', '10 (M)', '2024-11-10', 360, NULL, 1400, 0, 0, 0, 'All marina colours', 0),
(36, 97, 'Linen 2 Piece', '5 (M)', '2024-11-10', 400, NULL, 500, 0, 0, 0, 'Mix colours', 0),
(36, 98, 'Classic Linen 3 Piece', '1', '2024-11-10', 2000, NULL, 150, 0, 0, 0, 'All colours Classic linen 3 piece', 0),
(36, 99, 'Lacha', '1', '2024-11-10', 1200, 78000, 400, 18905, 100, 2050, 'All Colours', 0),
(37, 100, 'Ladies Shal5', '1', '2024-11-09', 3000, NULL, 1000, 0, 0, 0, 'All colours Ladies Shal5', 0),
(37, 101, 'Karandi V.8634', '1', '2024-11-09', 3400, NULL, 1100, 0, 0, 0, 'Frozy', 0),
(37, 102, 'Boutique Kaddar', '1', '2024-11-09', 3200, NULL, 1000, 0, 0, 0, 'yellow', 0),
(37, 103, 'Boutique V.23', '1', '2024-11-09', 6700, NULL, 2200, 0, 0, 0, 'Pink', 0),
(37, 104, 'Boutique Nashmeen V.2', '1', '2024-11-09', 6800, NULL, 2200, 0, 0, 0, 'Milan', 0),
(37, 105, 'Haji Leather Belt/4', '2', '2024-11-09', 1000, NULL, 660, 0, 0, 0, 'black', 0),
(37, 106, 'Haji Leather Belt/2', '1', '2024-11-09', 750, NULL, 250, 0, 0, 0, 'black', 0),
(37, 107, 'Ladies Ahram V.7', '4', '2024-11-09', 700, NULL, 1000, 0, 0, 0, 'white', 0),
(37, 108, 'Ahram S/M V.18', '2', '2024-11-09', 1800, NULL, 1100, 0, 0, 0, 'white', 0),
(37, 109, 'Ahram S/L khadi V.29', '2', '2024-11-09', 2900, NULL, 1800, 0, 0, 0, 'white', 0),
(37, 110, 'Ahram S/L khadi V.26', '2', '2024-11-09', 2600, NULL, 1600, 0, 0, 0, 'white', 0),
(37, 111, 'Haji bag', '2', '2024-11-09', 250, NULL, 160, 0, 0, 0, 'White', 0),
(37, 112, '5 star Linen laroz', '1', '2024-11-09', 2600, NULL, 725, 0, 100, 0, 'All 5 Star linen laroz colour', 0),
(37, 114, 'Marina 2 Piece', '15 (M)', '2024-11-09', 333, NULL, 1700, 0, 0, 0, 'All marina colours', 0),
(37, 116, 'CC Meraj Linen', '2', '2024-11-09', 3200, NULL, 1280, 0, 900, 0, 'All Colours CC Meraj Linen', 0),
(37, 117, '5 star Linen laroz', '2', '2024-11-09', 2600, NULL, 1450, 0, 600, 0, 'All 5 Star linen laroz colour', 0),
(37, 120, '5 star Linen laroz', '2', '2024-11-09', 2600, NULL, 1450, 0, 200, 0, 'All 5 Star linen laroz colour', 0),
(37, 121, 'Linen 2 Piece', '15 (M)', '2024-11-09', 450, NULL, 2250, 0, 0, 0, 'Mix colours', 0),
(37, 122, 'Marina 2 Piece', '10 (M)', '2024-11-09', 300, NULL, 800, 0, 0, 0, 'All marina colours', 0),
(37, 123, 'Boutique Linen L/S', '1', '2024-11-09', 2800, NULL, 900, 0, 0, 0, 'Green', 0),
(37, 124, 'Ahram S/L khadi V.27', '1', '2024-11-09', 2700, NULL, 900, 0, 0, 0, 'white', 0),
(37, 125, 'Haji Leather Belt/4', '1', '2024-11-09', 1000, NULL, 330, 0, 0, 0, 'black', 0),
(37, 127, 'Vichar Marina', '1', '2024-11-09', 4600, NULL, 840, 0, 500, 0, 'All Colours Vichar Marina', 0),
(37, 128, '5 star Linen laroz', '1', '2024-11-09', 2600, NULL, 725, 0, 300, 0, 'All 5 Star linen laroz colour', 0),
(37, 129, 'Marina Print 3 piece', '1', '2024-11-09', 3600, NULL, 720, 0, 0, 0, 'All Clours Marina Print 3 piece', 0),
(37, 130, 'Colorita Banodoria linen', '1', '2024-11-09', 3800, NULL, 1000, 0, 0, 0, 'All Colours Colorita Banodoria linen', 0),
(37, 131, 'Shal12', '1', '2024-11-09', 8000, NULL, 2600, 0, 500, 0, 'All colours Shal12', 0),
(37, 132, '5 star Linen laroz', '8', '2024-11-09', 2600, NULL, 5800, 0, 2400, 0, 'All 5 Star linen laroz colour', 0),
(37, 133, 'Colorita Banodoria linen', '3', '2024-11-09', 3800, NULL, 3000, 0, 1200, 0, 'All Colours Colorita Banodoria linen', 0),
(37, 134, 'Palkee Classic Linen Full Suit', '2', '2024-11-09', 2600, NULL, 1200, 0, 200, 0, 'All Colours Palkee Classic Linen Full Suit', 0),
(37, 135, 'Classic Linen 3 Piece', '1', '2024-11-09', 2000, 139495, 150, 34990, 0, 6900, 'All colours Classic linen 3 piece', 0),
(38, 136, 'Boutique Linen L/S', '1', '2024-11-12', 2800, NULL, 900, 0, 200, 0, 'Zink Pista', 0),
(38, 137, 'Boutique Linen L/S', '1', '2024-11-12', 2800, NULL, 900, 0, 200, 0, 'Gray', 0),
(38, 138, 'Boutique Linen L/S', '1', '2024-11-12', 2800, NULL, 900, 0, 200, 0, 'Navi Blue', 0),
(38, 139, 'Boutique Linen L/S', '1', '2024-11-12', 2800, NULL, 900, 0, 200, 0, 'Green', 0),
(38, 140, 'Boutique Linen L/S', '1', '2024-11-12', 2800, 13000, 900, 3500, 200, 1000, 'Mahroon', 0),
(39, 141, 'Marina Print 3 piece', '2', '2024-11-12', 3600, NULL, 1440, 0, 200, 0, 'All Clours Marina Print 3 piece', 0),
(39, 142, 'Vichar Marina', '2', '2024-11-12', 4600, NULL, 1680, 0, 400, 0, 'All Colours Vichar Marina', 0),
(39, 143, 'Boutique Almas V.2', '1', '2024-11-12', 6800, NULL, 2267, 0, 0, 0, 'Green', 0),
(39, 144, 'Boutique V.23', '1', '2024-11-12', 6700, NULL, 2200, 0, 0, 0, 'Mahndi', 0),
(39, 145, 'Linen 2 Piece', '5 (M)', '2024-11-12', 400, NULL, 500, 0, 0, 0, 'Mix colours', 0),
(39, 146, 'Classic Linen 3 Piece', '1', '2024-11-12', 2000, NULL, 150, 0, 0, 0, 'All colours Classic linen 3 piece', 0),
(39, 147, 'Classic Linen 3 Piece', '2', '2024-11-12', 2000, 37300, 300, 7937, 0, 600, 'All colours Classic linen 3 piece', 0),
(40, 148, 'Kather print 3 piece', '1', '2024-11-13', 3200, 3200, 750, 750, 0, 0, 'All Colours Gather print 3 piece', 0),
(41, 149, 'Boutique V.8', '1', '2024-11-14', 5900, NULL, 1900, 0, 100, 0, 'Peach', 0),
(41, 150, 'Boutique Nashmeen V.2', '1', '2024-11-14', 6800, 12500, 2200, 3900, 100, 200, 'Mint Green', 0),
(42, 151, 'Shal12', '1', '2024-11-13', 8000, NULL, 2600, 0, 500, 0, 'All colours Shal12', 0),
(42, 152, 'Shal11', '1', '2024-11-13', 6000, NULL, 2000, 0, 500, 0, 'All colours Shal11', 0),
(42, 153, 'Classic Linen 3 Piece', '3', '2024-11-13', 2000, NULL, 450, 0, 0, 0, 'All colours Classic linen 3 piece', 0),
(42, 154, 'Colorita Banodoria linen', '1', '2024-11-13', 3800, NULL, 1000, 0, 0, 0, 'All Colours Colorita Banodoria linen', 0),
(42, 155, 'karanthi Safa1', '1', '2024-11-13', 350, NULL, 50, 0, 0, 0, 'White', 0),
(42, 156, 'Ahram S/2 khadi V.15', '1', '2024-11-13', 1500, NULL, 500, 0, 0, 0, 'white', 0),
(42, 157, 'Shahzadi Jarjet', '1', '2024-11-13', 650, NULL, 210, 0, 0, 0, 'white', 0),
(42, 158, 'Kather print 3 piece', '1', '2024-11-13', 3200, NULL, 750, 0, 0, 0, 'All Colours Gather print 3 piece', 0),
(42, 159, 'Kather Print 2 Piece', '10 (M)', '2024-11-13', 450, NULL, 1100, 0, 0, 0, 'All colours', 0),
(42, 160, 'Boutique Rang Raza V.2', '1', '2024-11-13', 6500, NULL, 2200, 0, 500, 0, 'yellow', 0),
(42, 161, 'Boutique V.11', '1', '2024-11-13', 5900, 44500, 1900, 10860, 400, 1900, 'Red', 0),
(43, 162, 'Kather Print 2 Piece', '5 (M)', '2024-11-14', 450, NULL, 550, 0, 0, 0, 'All colours', 0),
(43, 163, 'Classic Cotton print', '5 (M)', '2024-11-14', 450, NULL, 750, 0, 0, 0, 'multi colour', 0),
(43, 164, 'Classic Linen 3 Piece', '1', '2024-11-14', 2000, 6500, 150, 1450, 0, 0, 'All colours Classic linen 3 piece', 0),
(44, 165, 'Fancey Marina', '1', '2024-11-14', 4800, 2400, 2600, 200, 2400, 2400, 'Purple', 0),
(45, 166, 'Kather print 3 piece', '1', '2024-11-15', 3200, 2500, 750, 50, 700, 700, 'All Colours Gather print 3 piece', 0),
(46, 167, '5 star Linen laroz', '2', '2024-11-16', 2600, NULL, 1450, 0, 0, 0, 'All 5 Star linen laroz colour', 0),
(46, 168, 'CC Meraj Linen', '2', '2024-11-16', 3200, NULL, 1280, 0, 0, 0, 'All Colours CC Meraj Linen', 0),
(46, 169, 'Colorita Mother Collection linen', '1', '2024-11-16', 3200, NULL, 1040, 0, 0, 0, 'All Colours Colorita Mother Collection linen', 0),
(46, 170, 'Marina 2 Piece', '15 (M)', '2024-11-16', 300, NULL, 1200, 0, 0, 0, 'All marina colours', 0),
(46, 171, '5 star Linen laroz', '5', '2024-11-16', 2600, NULL, 3625, 0, 0, 0, 'All 5 Star linen laroz colour', 0),
(46, 172, 'Boutique Nashmeen V.2', '1', '2024-11-16', 6800, NULL, 2200, 0, 300, 0, 'Peach', 0),
(46, 173, 'Boutique V.11', '1', '2024-11-16', 5900, NULL, 1900, 0, 400, 0, 'Gray', 0),
(46, 174, 'Kather Print 2 Piece', '5 (M)', '2024-11-16', 450, NULL, 550, 0, 0, 0, 'All colours', 0),
(46, 175, 'Marina Print 3 piece', '2', '2024-11-16', 3600, NULL, 1440, 0, 200, 0, 'All Clours Marina Print 3 piece', 0),
(46, 176, 'Boutique V.28', '1', '2024-11-16', 7500, NULL, 2500, 0, 0, 0, 'Pink', 0),
(46, 177, 'Boutique V.8', '1', '2024-11-16', 5900, NULL, 1900, 0, 0, 0, 'Mahroon', 0),
(46, 178, 'Colorita Mother Collection linen', '1', '2024-11-16', 3200, NULL, 1040, 0, 0, 0, 'All Colours Colorita Mother Collection linen', 0),
(46, 179, 'Meraj Lexury Fancey Linen', '1', '2024-11-16', 3800, NULL, 760, 0, 0, 0, 'All Colours Meraj Lexury Fancey Linen', 0),
(46, 180, 'Meraj Lexury Fancey Linen', '3', '2024-11-16', 3800, NULL, 2280, 0, 0, 0, 'All Colours Meraj Lexury Fancey Linen', 0),
(46, 181, 'Lungi', '1', '2024-11-16', 1200, NULL, 400, 0, 0, 0, 'All Colours Lungi', 0),
(46, 182, 'Ahram S/L khadi V.23', '2', '2024-11-16', 2300, NULL, 1600, 0, 0, 0, 'white', 0),
(46, 183, 'Ahram S/L Tawel V.32', '1', '2024-11-16', 3200, 93950, 1000, 24865, 400, 1300, 'white', 0),
(47, 184, 'Kather Print 2 Piece', '17.5 (M)', '2024-11-17', 450, NULL, 1925, 0, 0, 0, 'All colours', 0),
(47, 185, 'Classic Cotton print', '6 (M)', '2024-11-17', 450, NULL, 900, 0, 0, 0, 'multi colour', 0),
(47, 186, 'Marina 2 Piece', '3 (M)', '2024-11-17', 450, NULL, 690, 0, 0, 0, 'All marina colours', 0),
(47, 187, 'kadi Marina 3 piece', '2', '2024-11-17', 2800, NULL, 1600, 0, 200, 0, 'All Colours kadi Marina 3 piece', 0),
(47, 188, 'Meraj Korian Linen', '2', '2024-11-17', 3800, NULL, 1520, 0, 0, 0, 'All Colours Meraj Korian Linen', 0),
(47, 189, 'Boutique Linen L/S', '1', '2024-11-17', 2800, NULL, 900, 0, 0, 0, 'black', 0),
(47, 190, 'Guljan Linen', '1', '2024-11-17', 3200, NULL, 1120, 0, 0, 0, 'All Colours Guljan Linen', 0),
(47, 191, 'Mahnoor Classic Linen Full Suit', '1', '2024-11-17', 2600, NULL, 600, 0, 0, 0, 'All Colours Mahnoor Classic Linen Full Suit', 0),
(47, 192, 'Boutique V.28', '1', '2024-11-17', 7500, NULL, 2500, 0, 500, 0, 'black', 0),
(47, 193, 'Hajra Waseem V.23', '1', '2024-11-17', 6900, NULL, 2300, 0, 400, 0, 'brown', 0),
(47, 194, 'Hajra Waseem Viscos V.18', '1', '2024-11-17', 7400, 53925, 2400, 14855, 500, 1600, 'Camel Brown', 0),
(48, 195, 'Linen 2 Piece', '10 (M)', '2024-11-18', 400, 4000, 1000, 1000, 0, 0, 'Mix colours', 0),
(49, 196, 'Kather Print 2 Piece', '9 (M)', '2024-11-17', 450, NULL, 990, 0, 0, 0, 'All colours', 0),
(49, 197, 'Marina Print 3 piece', '2', '2024-11-17', 3600, NULL, 1440, 0, 0, 0, 'All Clours Marina Print 3 piece', 0),
(49, 203, 'kadi Marina 3 piece', '2', '2024-11-17', 2800, NULL, 1600, 0, 0, 0, 'All Colours kadi Marina 3 piece', 0),
(49, 204, 'CC Meraj Linen', '1', '2024-11-17', 3200, NULL, 640, 0, 0, 0, 'All Colours CC Meraj Linen', 0),
(49, 206, '5 star Linen laroz', '1', '2024-11-17', 2600, NULL, 725, 0, 0, 0, 'All 5 Star linen laroz colour', 0),
(49, 207, '5 star Linen laroz', '1', '2024-11-17', 2600, NULL, 725, 0, 0, 0, 'All 5 Star linen laroz colour', 0),
(49, 208, 'Kather print 3 piece', '1', '2024-11-17', 3200, NULL, 750, 0, 0, 0, 'All Colours Gather print 3 piece', 0),
(49, 209, 'Marina Print 3 piece', '1', '2024-11-17', 3600, NULL, 720, 0, 0, 0, 'All Clours Marina Print 3 piece', 0),
(49, 210, 'Marina Print 3 piece', '1', '2024-11-17', 3600, NULL, 720, 0, 0, 0, 'All Clours Marina Print 3 piece', 0),
(49, 211, '5 star Linen laroz', '1', '2024-11-17', 2600, NULL, 725, 0, 0, 0, 'All 5 Star linen laroz colour', 0),
(49, 212, 'Marina 2 Piece', '5 (M)', '2024-11-17', 400, NULL, 900, 0, 0, 0, 'All marina colours', 0),
(49, 213, 'Vichar Marina', '2', '2024-11-17', 4600, NULL, 1680, 0, 0, 0, 'All Colours Vichar Marina', 0),
(49, 214, 'Marina Print 3 piece', '2', '2024-11-17', 3600, NULL, 1440, 0, 0, 0, 'All Clours Marina Print 3 piece', 0),
(49, 215, '5 star Linen laroz', '1', '2024-11-17', 2600, 59250, 725, 13780, 0, 0, 'All 5 Star linen laroz colour', 0),
(50, 216, '5 star Linen laroz', '1', '2024-11-18', 2600, 2600, 725, 725, 0, 0, 'All 5 Star linen laroz colour', 0),
(51, 217, 'Great Suiting', '1', '2024-11-18', 3900, 3800, 1300, 1200, 100, 100, 'Multi Colour', 0),
(52, 219, 'Thanak Suiting', '1', '2024-11-18', 2800, 2800, 970, 970, 0, 0, 'Multicolour', 0),
(53, 220, 'Kather Print 2 Piece', '10 (M)', '2024-11-18', 450, 4500, 1100, 1100, 0, 0, 'All colours', 0),
(54, 221, 'German Wool', '1', '2024-11-18', 2800, NULL, 970, 0, 0, 0, 'multi colour', 0),
(54, 222, 'Chap Wool', '1', '2024-11-18', 3200, 6000, 1050, 2020, 0, 0, 'multi colour', 0),
(55, 223, 'Ahram S/L Tawel V.27', '1', '2024-11-18', 2700, 2700, 900, 900, 0, 0, 'white', 0),
(56, 224, 'Boutique Linen L/S', '1', '2024-11-18', 2800, 2800, 900, 900, 0, 0, 'Zink Pista', 0),
(57, 225, 'Kather print 3 piece', '1', '2024-11-18', 3200, 3200, 750, 750, 0, 0, 'All Colours Gather print 3 piece', 0),
(58, 226, 'Shal7', '1', '2024-11-18', 3200, NULL, 1000, 0, 0, 0, 'All colours Shal7', 0),
(58, 227, 'Welwet Shal13', '1', '2024-11-18', 4000, 7200, 1300, 2300, 0, 0, 'All colours Welwet Shal13', 0),
(59, 228, 'Haji Leather Belt/5', '1', '2024-11-18', 250, 250, 80, 80, 0, 0, 'White', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_colour`
--

CREATE TABLE `product_colour` (
  `colour_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `colour_name` varchar(50) NOT NULL,
  `colour_quantity` int(11) NOT NULL,
  `colour_in_meter` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_colour`
--

INSERT INTO `product_colour` (`colour_id`, `product_name`, `colour_name`, `colour_quantity`, `colour_in_meter`) VALUES
(1, 'Classic Cotton print', 'multi colour', 0, 1031.50),
(2, 'Kather Print 2 Piece', 'All colours', 0, 452.00),
(3, 'Linen 2 Piece', 'Mix colours', 0, 711.50),
(4, 'Marina 2 Piece', 'All marina colours', 0, 342.00),
(5, '5 star Linen laroz ', 'All 5 Star linen laroz colour', 170, 0.00),
(6, 'Classic Linen 3 Piece', 'All colours Classic linen 3 piece', 46, 0.00),
(7, 'Habib Linen', 'All Colours Habib Linen', 30, 0.00),
(8, 'Mahnoor Classic Linen Full Suit', 'All Colours Mahnoor Classic Linen Full Suit', 23, 0.00),
(9, 'Palkee Classic Linen Full Suit', 'All Colours Palkee Classic Linen Full Suit', 14, 0.00),
(10, 'CC Meraj Linen', 'All Colours CC Meraj Linen', 57, 0.00),
(11, 'Guljan Linen', 'All Colours Guljan Linen', 64, 0.00),
(12, 'Colorita Mother Collection linen', 'All Colours Colorita Mother Collection linen', 10, 0.00),
(13, 'Colorita Banodoria linen', 'All Colours Colorita Banodoria linen', 26, 0.00),
(14, 'Meraj Korian Linen', 'All Colours Meraj Korian Linen', 19, 0.00),
(15, 'Meraj Lexury Fancey Linen', 'All Colours Meraj Lexury Fancey Linen', 20, 0.00),
(16, 'Marina Print 3 piece', 'All Clours Marina Print 3 piece', 120, 0.00),
(17, 'Vichar Marina', 'All Colours Vichar Marina', 42, 0.00),
(18, 'Kather print 3 piece', 'All Colours Gather print 3 piece', 53, 0.00),
(19, 'kadi Marina 3 piece', 'All Colours kadi Marina 3 piece', 45, 0.00),
(20, 'Slab Linen', 'All Colours Slab Linen', 40, 0.00),
(21, 'Karandi Print', 'All Colours Karandi Print', 21, 0.00),
(22, 'Viscos Print', 'All Colours Viscos Print', 19, 0.00),
(23, 'Dhanak Digital', 'All Clours Dhanak Digital', 9, 0.00),
(24, 'WoolShal Marina', 'All Colours WoolShal Marina', 9, 0.00),
(25, 'plane linen', 'All Clours plane linen', 0, 10.00),
(26, 'plane Kather', 'All Colours plane Kather', 0, 10.00),
(27, 'Fancey Marina', 'Red', 2, 0.00),
(28, 'Fancey Marina', 'Purple', 3, 0.00),
(29, 'Fancey Marina', 'Blue', 1, 0.00),
(30, 'Fancey Marina', 'Purple Blue', 1, 0.00),
(31, 'Fancey Marina', 'Frozy', 1, 0.00),
(32, 'Fancey Marina', 'Brown', 4, 0.00),
(33, 'Fancey Marina', 'Green', 2, 0.00),
(34, 'Fancey Marina', 'Dark Green', 1, 0.00),
(35, 'Fancey Marina', 'Light Green', 1, 0.00),
(36, 'Fancey Marina', 'Lemon Colour', 1, 0.00),
(37, 'Fancey Marina', 'Black', 2, 0.00),
(38, 'Fancey Marina', 'Mint Green', 1, 0.00),
(39, 'Fancey Khadder', 'Gray', 1, 0.00),
(40, 'Fancey Khadder', 'Golden Black', 1, 0.00),
(41, 'Fancey Khadder', 'Dark Brown', 1, 0.00),
(42, 'Fancey Khadder', 'Creem ', 1, 0.00),
(43, 'Fancey Khadder', 'Purple', 1, 0.00),
(44, 'Fancey Khadder', 'Green', 1, 0.00),
(45, 'Fancey Khadder', 'Red', 1, 0.00),
(46, 'Fancey Khadder', 'Blue', 1, 0.00),
(47, 'Fancey Linen', 'Green', 2, 0.00),
(48, 'Fancey Linen', 'Brown', 2, 0.00),
(49, 'Fancey Linen', 'Pink', 2, 0.00),
(50, 'Fancey Linen', 'Skin', 1, 0.00),
(51, 'Fancey Raplica', 'Brown', 2, 0.00),
(52, 'Fancey Raplica', 'Blue', 2, 0.00),
(53, 'Fancey Raplica', 'Frozy', 1, 0.00),
(54, 'Fancey Raplica', 'Green', 1, 0.00),
(55, 'Fancey Bareza Linen', 'Pink', 2, 0.00),
(56, 'Fancey Bareza Linen', 'Orange', 2, 0.00),
(57, 'Fancey Bareza Linen', 'Brown', 1, 0.00),
(58, 'Fancey Linen Raplica', 'black', 2, 0.00),
(59, 'Fancey Linen Raplica', 'blue', 3, 0.00),
(60, 'Fancey Linen Raplica', 'Pink', 2, 0.00),
(61, 'Fancey Linen Raplica', 'Creem', 2, 0.00),
(62, 'Fancey Linen Raplica', 'Golden', 2, 0.00),
(63, 'Fancey Linen Raplica', 'yellow', 2, 0.00),
(64, 'Fancey Linen Raplica', 'Brown', 1, 0.00),
(65, 'Fancey Linen Raplica', 'Jamney Purple', 1, 0.00),
(66, 'Fancey Linen Raplica', 'Gray', 1, 0.00),
(67, 'Fancey Linen Raplica', 'Off White', 1, 0.00),
(68, 'Fancey Linen Raplica', 'Pink Salmon', 0, 0.00),
(69, 'Fancey Linen Raplica', 'Re', 1, 0.00),
(70, 'Fancey Linen Raplica', 'C Green', 1, 0.00),
(71, 'Fancey Linen Raplica', 'Cotton Candy', 1, 0.00),
(72, 'Fancey Linen Raplica', 'Snowy Mint', 1, 0.00),
(73, 'Boutique Linen L/S', 'black', 3, 0.00),
(74, 'Boutique Linen L/S', 'Green', 1, 0.00),
(75, 'Boutique Linen L/S', 'Mahroon', 1, 0.00),
(76, 'Boutique Linen L/S', 'Zink Pista', 0, 0.00),
(77, 'Boutique Linen L/S', 'Dark Brown', 0, 0.00),
(78, 'Boutique Linen L/S', 'Green', 1, 0.00),
(79, 'Boutique Linen L/S', 'Brown', 0, 0.00),
(80, 'Boutique Linen L/S', 'Skin Brown', 1, 0.00),
(81, 'Boutique Linen L/S', 'yellow', 2, 0.00),
(82, 'Boutique Linen L/S', 'Frozy', 1, 0.00),
(83, 'Boutique Linen L/S', 'Cotton Candy', 1, 0.00),
(84, 'Boutique Linen L/S', 'Navi Blue', 0, 0.00),
(85, 'Boutique Linen L/S', 'Gray', 0, 0.00),
(86, 'Boutique Linen L/S', 'Pink', 1, 0.00),
(87, 'Boutique Linen L/S', 'Pista', 1, 0.00),
(88, 'Boutique Linen L/S', 'Purple', 1, 0.00),
(89, 'Boutique Linen L/S', 'Blue', 1, 0.00),
(90, 'Boutique Linen L/S', 'Peach', 1, 0.00),
(91, 'Boutique Linen L/S', 'Red Frozy', 1, 0.00),
(92, 'Boutique Linen', 'Creem ', 2, 0.00),
(93, 'Boutique Linen', 'Zink ', 1, 0.00),
(94, 'Boutique Linen', 'Pink', 1, 0.00),
(95, 'Boutique Linen', 'Gray', 1, 0.00),
(96, 'Boutique Linen S/D', 'Purple', 1, 0.00),
(97, 'Boutique Linen S/D', 'Skin', 1, 0.00),
(98, 'Amina B Linen V.419', 'Skin', 1, 0.00),
(99, 'Amina B Linen V.419', 'Gray', 1, 0.00),
(100, 'Amina B Linen V.419', 'Golden', 1, 0.00),
(101, 'Amina B Linen V.207', 'Green', 1, 0.00),
(102, 'Aysha B Linen V.2', 'Peach', 1, 0.00),
(103, 'Sanoor Linen', 'Golden', 1, 0.00),
(104, 'Boutique Viscos', 'Beach', 2, 0.00),
(105, 'Boutique Viscos', 'Pista', 2, 0.00),
(106, 'Boutique Viscos', 'Gray', 3, 0.00),
(107, 'Boutique Viscos', 'Mahroon', 1, 0.00),
(108, 'Boutique Viscos', 'black', 1, 0.00),
(109, 'Boutique Viscos', 'Frozy', 1, 0.00),
(110, 'Boutique Viscos', 'Skin', 1, 0.00),
(111, 'Boutique Viscos', 'Green', 1, 0.00),
(112, 'Boutique Viscos', 'Light Green', 1, 0.00),
(113, 'Boutique Viscos', 'Mahndi', 1, 0.00),
(114, 'Boutique Viscos V.124', 'yellow', 1, 0.00),
(115, 'Boutique Viscos V.124', 'Brown', 1, 0.00),
(116, 'Boutique Viscos V.124', 'Gray', 1, 0.00),
(117, 'Boutique Viscos V.124', 'Peach', 1, 0.00),
(118, 'Boutique Viscos V.026', 'Skin', 1, 0.00),
(119, 'Boutique Viscos V.026', 'Purple', 1, 0.00),
(120, 'Boutique Viscos V.126', 'Purple', 1, 0.00),
(121, 'Boutique Viscos V.126', 'Golden', 1, 0.00),
(122, 'Amina B Linen Shirt', 'All Colours Amina B Linen Shirt', 17, 0.00),
(123, 'Boutique Linen Fancey', 'Frozy', 2, 0.00),
(124, 'Boutique Linen Fancey', 'Red', 3, 0.00),
(125, 'Boutique Linen Fancey', 'Jamney Purple', 1, 0.00),
(126, 'Boutique Linen Fancey', 'Black', 0, 0.00),
(127, 'Dhanak Raplica', 'Creem ', 1, 0.00),
(128, 'Dhanak Raplica', 'Golden Brown', 2, 0.00),
(129, 'Dhanak Raplica', 'Pink', 1, 0.00),
(130, 'Dhanak Raplica', 'red', 1, 0.00),
(131, 'Dhanak Raplica', 'Frozy', 1, 0.00),
(132, 'Dhanak Raplica', 'Skin', 1, 0.00),
(133, 'Dhanak Raplica', 'Brown', 1, 0.00),
(134, 'Dhanak Raplica', 'Gray', 1, 0.00),
(135, 'Dhanak Raplica', 'Orange', 1, 0.00),
(136, 'Dhanak V.6013', 'Mahndi', 1, 0.00),
(137, 'Dhanak V.6013', 'Pink', 1, 0.00),
(138, 'Dhanak V.6013', 'Green', 1, 0.00),
(139, 'Dhanak V.6013', 'Jamney Purple', 1, 0.00),
(140, 'Dhanak V.6013', 'Brown', 1, 0.00),
(141, 'Dhanak V.6013', 'Golden', 1, 0.00),
(142, 'Dhanak V.6013', 'Orange Brown', 1, 0.00),
(143, 'Dhanak V.6013', 'Blue', 1, 0.00),
(144, 'Dhanak V.6013', 'Gray', 1, 0.00),
(145, 'Dhanak V.6013', 'Skin Brown', 0, 0.00),
(146, 'Dhanak Boutique', 'Pink', 1, 0.00),
(147, 'Dhanak Boutique', 'Purple', 1, 0.00),
(148, 'Dhanak Boutique', 'red', 1, 0.00),
(149, 'Boutique Marina', 'Gray', 2, 0.00),
(150, 'Boutique Marina', 'Frozy', 1, 0.00),
(151, 'Boutique Marina', 'Skin', 1, 0.00),
(152, 'Boutique Marina', 'Pink', 1, 0.00),
(153, 'Boutique Shamray', 'Frozy', 1, 0.00),
(154, 'Boutique Shamray', 'Brown', 1, 0.00),
(155, 'Boutique Shamray', 'Mahndi', 1, 0.00),
(156, 'Fancey Linen Raplica', 'Parrat Green', 1, 0.00),
(157, 'Boutique Cotail', 'Lamon ', 2, 0.00),
(158, 'Boutique Cotail', 'Gray', 1, 0.00),
(159, 'Boutique Cotail', 'Pista', 1, 0.00),
(160, 'Digital Kaddar', 'Green', 1, 0.00),
(161, 'Digital Kaddar', 'Blue', 1, 0.00),
(162, 'Dhanak Raplica', 'Red', 1, 0.00),
(163, 'Dhanak Raplica', 'Frozy', 1, 0.00),
(164, 'Amina B V.363', 'Mahroon', 1, 0.00),
(165, 'Boutique Kaddar', 'Brown', 1, 0.00),
(166, 'Boutique Kaddar', 'Jamney Purple', 1, 0.00),
(167, 'Boutique Kaddar', 'Peach', 1, 0.00),
(168, 'Boutique Kaddar', 'Pink', 1, 0.00),
(169, 'Boutique Kaddar', 'Orange', 0, 0.00),
(170, 'Boutique Kaddar', 'yellow', 0, 0.00),
(171, 'Boutique Kaddar', 'black', 1, 0.00),
(172, 'Boutique Kaddar', 'Green', 1, 0.00),
(173, 'Boutique Cotrai', 'Mahndi', 1, 0.00),
(174, 'Boutique Cotrai', 'black', 0, 0.00),
(175, 'Boutique Cotrai', 'Pink', 1, 0.00),
(176, 'Boutique Cotrai', 'Orange', 1, 0.00),
(177, 'Boutique Cotrai', 'blue', 1, 0.00),
(178, 'Boutique Cotrai', 'Frozy', 0, 0.00),
(179, 'Boutique Cotrai', 'Green', 1, 0.00),
(180, 'Boutique Cotrai', 'Skin', 1, 0.00),
(181, 'Boutique Cotrai', 'Purple', 1, 0.00),
(182, 'Boutique Cotrai', 'Brown', 0, 0.00),
(183, 'Karandi V.6012', 'Orange', 1, 0.00),
(184, 'Karandi V.6012', 'Green', 1, 0.00),
(185, 'Karandi V.6012', 'Brown', 1, 0.00),
(186, 'Karandi V.6012', 'Blue', 1, 0.00),
(187, 'Karandi V.6012', 'Skin', 1, 0.00),
(188, 'Karandi V.6012', 'Peach', 1, 0.00),
(189, 'Karandi V.6012', 'Purple', 1, 0.00),
(190, 'Karandi V.6012', 'Pista Green', 0, 0.00),
(191, 'Karandi V.6012', 'Mahndi', 1, 0.00),
(192, 'Karandi V.6012', 'Golden', 1, 0.00),
(193, 'Karandi V.955', 'Pista', 1, 0.00),
(194, 'Karandi V.955', 'Skin', 1, 0.00),
(195, 'Karandi V.955', 'Cream Brulee', 1, 0.00),
(196, 'Karandi V.955', 'Sky Blue', 1, 0.00),
(197, 'Karandi V.955', 'Pink', 1, 0.00),
(198, 'Karandi V.955', 'Golden', 1, 0.00),
(199, 'Karandi V.27', 'Gray', 1, 0.00),
(200, 'Karandi V.27', 'Mahroon', 1, 0.00),
(201, 'Karandi V.27', 'Pista Green', 1, 0.00),
(202, 'Karandi V.9', 'Purple', 1, 0.00),
(203, 'Karandi V.9', 'Brown', 1, 0.00),
(204, 'Karandi V.9', 'Gray', 1, 0.00),
(205, 'Karandi V.107', 'Creem ', 1, 0.00),
(206, 'Karandi V.8634', 'Orange', 1, 0.00),
(207, 'Karandi V.8634', 'Frozy', 0, 0.00),
(208, 'Karandi V.8634', 'Magenta', 1, 0.00),
(209, 'Boutique V.28', 'Brown', 1, 0.00),
(210, 'Boutique V.28', 'Red', 1, 0.00),
(211, 'Boutique V.28', 'black', 0, 0.00),
(212, 'Boutique V.28', 'Blue', 1, 0.00),
(213, 'Boutique V.28', 'Pink', 0, 0.00),
(214, 'Boutique V.28', 'Green', 1, 0.00),
(215, 'Boutique V.28', 'C Green', 1, 0.00),
(216, 'Boutique V.12', 'Mahroon', 2, 0.00),
(217, 'Boutique V.12', 'Zink ', 1, 0.00),
(218, 'Boutique V.12', 'Golden', 0, 0.00),
(219, 'Boutique V.12', 'Green', 0, 0.00),
(220, 'Boutique V.12', 'Brown', 1, 0.00),
(221, 'Boutique V.12', 'Blue', 1, 0.00),
(222, 'Boutique V.12', 'Gray', 1, 0.00),
(223, 'Boutique V.8', 'Gray', 1, 0.00),
(224, 'Boutique V.8', 'Mahndi', 1, 0.00),
(225, 'Boutique V.8', 'Peach', 0, 0.00),
(226, 'Boutique V.8', 'black', 1, 0.00),
(227, 'Boutique V.8', 'Mahroon', 0, 0.00),
(228, 'Boutique V.11', 'Gray', 1, 0.00),
(229, 'Boutique V.11', 'Blue', 1, 0.00),
(230, 'Boutique V.11', 'Red', 0, 0.00),
(231, 'Boutique V.11', 'Brown', 1, 0.00),
(232, 'Boutique V.11', 'Golden', 1, 0.00),
(233, 'Boutique V.4', 'off white', 1, 0.00),
(234, 'Boutique V.4', 'Frozy', 0, 0.00),
(235, 'Boutique V.4', 'Pista Green', 0, 0.00),
(236, 'Boutique V.4', 'Cammel Brown', 1, 0.00),
(237, 'Boutique V.4', 'Gray', 1, 0.00),
(238, 'Boutique V.4', 'Skin', 1, 0.00),
(239, 'Boutique V.4', 'Peach Cream', 1, 0.00),
(240, 'Boutique V.5', 'Peach Cream', 0, 0.00),
(241, 'Boutique V.5', 'Skin', 1, 0.00),
(242, 'Boutique V.5', 'tea Pink', 1, 0.00),
(243, 'Boutique V.5', 'Gray', 0, 0.00),
(244, 'Boutique V.23', 'Brown', 1, 0.00),
(245, 'Boutique V.23', 'Jamney Purple', 1, 0.00),
(246, 'Boutique V.23', 'black', 1, 0.00),
(247, 'Boutique V.23', 'Mahroon', 1, 0.00),
(248, 'Boutique V.23', 'Zink ', 1, 0.00),
(249, 'Boutique V.23', 'Mahndi', 0, 0.00),
(250, 'Boutique V.23', 'Frangipani', 1, 0.00),
(251, 'Boutique V.23', 'Pink', 0, 0.00),
(252, 'Boutique V.17', 'Mahndi', 2, 0.00),
(253, 'Boutique V.17', 'blue', 2, 0.00),
(254, 'Boutique V.17', 'Brown', 1, 0.00),
(255, 'Boutique Almas V.2', 'Green', 0, 0.00),
(256, 'Boutique Almas V.2', 'Blue', 1, 0.00),
(257, 'Boutique Almas V.2', 'black', 1, 0.00),
(258, 'Boutique Almas V.2', 'Brown', 1, 0.00),
(259, 'Boutique Almas V.2', 'Mahroon', 0, 0.00),
(260, 'Boutique Almas V.2', 'Zink ', 1, 0.00),
(261, 'Boutique Almas V.3', 'Zink', 1, 0.00),
(262, 'Boutique Almas V.3', 'Brown', 1, 0.00),
(263, 'Boutique Almas V.3', 'Mahroon', 1, 0.00),
(264, 'Boutique Almas V.3', 'Blue', 1, 0.00),
(265, 'Boutique Nashmeen V.2', 'Mint Green', 0, 0.00),
(266, 'Boutique Nashmeen V.2', 'Milan', 0, 0.00),
(267, 'Boutique Nashmeen V.2', 'Gray', 1, 0.00),
(268, 'Boutique Nashmeen V.2', 'Skin', 1, 0.00),
(269, 'Boutique Nashmeen V.2', 'Peach', 0, 0.00),
(270, 'Boutique Nashmeen V.2', 'Peach Cream', 1, 0.00),
(271, 'Boutique Rang Raza V.2', 'blue green', 1, 0.00),
(272, 'Boutique Rang Raza V.2', 'black', 1, 0.00),
(273, 'Boutique Rang Raza V.2', 'Mahroon', 1, 0.00),
(274, 'Boutique Rang Raza V.2', 'yellow', 0, 0.00),
(275, 'Boutique Rang Raza V.2', 'Blue', 1, 0.00),
(276, 'Boutique Rang Raza V.3', 'Navi Blue', 1, 0.00),
(277, 'Boutique Rang Raza V.3', 'black', 1, 0.00),
(278, 'Boutique Rang Raza V.3', 'Mahroon', 1, 0.00),
(279, 'Boutique Rang Raza V.3', 'yellow', 1, 0.00),
(280, 'Boutique Rang Raza V.3', 'Pink', 0, 1.00),
(281, 'Boutique Rang Raza V.3', 'blue green', 1, 0.00),
(282, 'Boutique Chickan kari', 'Lemon Colour', 2, 0.00),
(283, 'Boutique Chickan kari', 'Mahndi green', 2, 0.00),
(284, 'Boutique Chickan kari', 'Camel Brown', 2, 0.00),
(285, 'Boutique Chickan kari', 'C Green', 2, 0.00),
(286, 'Boutique Chickan kari', 'skin', 1, 0.00),
(287, 'Boutique Chickan kari', 'Peach', 1, 0.00),
(288, 'Boutique Chickan kari', 'Frozy green', 1, 0.00),
(289, 'Boutique Chickan kari', 'Dark Brown', 1, 0.00),
(290, 'Boutique Chickan kari', 'Laser Lemon', 1, 0.00),
(291, 'Boutique Chickan kari', 'Red', 1, 0.00),
(292, 'Boutique Chickan kari', 'Purple', 1, 0.00),
(293, 'Boutique Chickan kari V.27', 'Brown', 1, 0.00),
(294, 'Boutique Chickan kari V.27', 'Mahndi', 1, 0.00),
(295, 'Boutique Chickan kari V.27', 'Gray', 1, 0.00),
(296, 'Boutique Chickan kari V.27', 'Rose', 1, 0.00),
(297, 'Boutique Chickan kari V.27', 'light Brown', 1, 0.00),
(298, 'Boutique Chickan kari V.27', 'Skin Red', 1, 0.00),
(299, 'Boutique Chickan kari', 'Peach Orange', 1, 0.00),
(300, 'Karandi V.66', 'Aqua', 1, 0.00),
(301, 'Karandi V.66', 'Green', 1, 0.00),
(302, 'Karandi V.66', 'peach', 1, 0.00),
(303, 'Karandi V.66', 'Creem ', 1, 0.00),
(304, 'Boutique zirwa', 'Gray', 1, 0.00),
(305, 'Boutique zirwa', 'peach', 2, 0.00),
(306, 'Boutique Marina Chickan kari', 'green', 2, 0.00),
(307, 'Boutique Marina Chickan kari', 'black', 2, 0.00),
(308, 'Boutique Marina Chickan kari', 'Purple', 1, 0.00),
(309, 'Marina karhi', 'Brown', 1, 0.00),
(310, 'Marina karhi', 'Green', 1, 0.00),
(311, 'Meena kari V.2', 'Peach', 1, 0.00),
(312, 'Meena kari V.2', 'Blue', 1, 0.00),
(313, 'Meena kari V.2', 'Pink', 1, 0.00),
(314, 'Meena kari V.2', 'Lemon Colour', 1, 0.00),
(315, 'Marina Palachi', 'Pink', 1, 0.00),
(316, 'Marina Palachi', 'Brown', 1, 0.00),
(317, 'Linen Palachi', 'Blue', 1, 0.00),
(318, 'Marina karhi', 'C Green', 2, 0.00),
(319, 'Mask V.11', 'Red', 1, 0.00),
(320, 'Mask V.11', 'Green', 1, 0.00),
(321, 'Mask V.11', 'Gray', 1, 0.00),
(322, 'Mask V.9', 'Skin', 1, 0.00),
(323, 'Mask V.9', 'Mahndi', 1, 0.00),
(324, 'Mask V.9', 'Mahroon', 1, 0.00),
(325, 'Mask V.9', 'Brown', 1, 0.00),
(326, 'Boutique Merjan', 'Gray', 1, 0.00),
(327, 'Boutique Karandi V.15', 'Pink', 0, 0.00),
(328, 'Boutique V.5', 'Brown', 1, 0.00),
(329, 'Boutique V.5', 'Golden', 1, 0.00),
(330, 'Hajra Waseem V.23', 'brown', 0, 0.00),
(331, 'Hajra Waseem V.23', 'Red', 1, 0.00),
(332, 'Hajra Waseem V.23', 'Blue', 1, 0.00),
(333, 'Hajra Waseem Viscos V.18', 'Camel Brown', 0, 0.00),
(334, 'Amina B Linen V.414', 'Golden', 1, 0.00),
(335, 'Amina B Linen V.414', 'Brown', 1, 0.00),
(336, 'Amina B Linen V.414', 'Blue', 1, 0.00),
(337, 'Amina B Linen V.414', 'Mahndi', 1, 0.00),
(338, 'Amina B Linen V.414', 'Mona Lisa', 1, 0.00),
(339, 'Amina B Linen V.414', 'Jamney Purple', 1, 0.00),
(340, 'Amina B Linen V.414', 'Green', 1, 0.00),
(341, 'Amina B Linen V.422', 'Golden', 1, 0.00),
(342, 'Amina B Linen V.422', 'Sky Blue', 1, 0.00),
(343, 'Amina B Linen V.417', 'Skin', 1, 0.00),
(344, 'Amina B Linen V.417', 'Red', 1, 0.00),
(345, 'Jay Namaz V.11', 'All Colour Jay Namaz V.11', 6, 0.00),
(346, 'Jay Namaz V.13', 'All Colurs Jay Namaz V.13', 1, 0.00),
(347, 'Jay Namaz V.14', 'All Colurs Jay Namaz V.14', 4, 0.00),
(348, 'Jay Namaz V.16', 'All Colurs Jay Namaz V.16', 7, 0.00),
(349, 'Jay Namaz V.6', 'All Colurs Jay Namaz V.6', 4, 0.00),
(350, 'Jay Namaz V.8', 'All Colurs Jay Namaz V.8', 4, 0.00),
(351, 'Jay Namaz V.4.5', 'All Colurs Jay Namaz V.4.5', 3, 0.00),
(352, 'Jay Namaz V.12', 'All Colurs Jay Namaz V.12', 1, 0.00),
(353, 'Amina B Kids 2 Piece', 'yellow', 3, 0.00),
(354, 'Amina B Kids 2 Piece', 'Frozy', 2, 0.00),
(355, 'Amina B Kids 2 Piece', 'Blue', 1, 0.00),
(356, 'Amina B Kids 2 Piece', 'Pink', 1, 0.00),
(357, 'Ahram S/0 khadi V.12', 'white', 2, 0.00),
(358, 'Ahram S/1 khadi V.13.5', 'white', 6, 0.00),
(359, 'Ahram S/2 khadi V.15', 'white', 1, 0.00),
(360, 'Ahram S/M V.18', 'white', 2, 0.00),
(361, 'Ahram S/L khadi V.18', 'white', 0, 0.00),
(362, 'Ahram S/L khadi V.26', 'white', 14, 0.00),
(363, 'Ahram S/L khadi V.27', 'white', 0, 0.00),
(364, 'Ahram S/L khadi V.29', 'white', 9, 0.00),
(365, 'Ahram S/L Cotton V.29', 'white', 3, 0.00),
(366, 'Ahram S/L Cotton V.18', 'white', 6, 0.00),
(367, 'Ahram S/L Tawel V.18', 'white', 2, 0.00),
(368, 'Ahram S/L Tawel V.22', 'white', 4, 0.00),
(369, 'Ahram S/L Tawel V.24', 'white', 4, 0.00),
(370, 'Ahram S/L Tawel V.32', 'white', 6, 0.00),
(371, 'Shahzadi Jarjet', 'white', 5, 0.00),
(372, '2 Dil Jarjet', 'White', 9, 0.00),
(373, 'Nayab Grip', 'white', 8, 0.00),
(374, 'Anam Shafoon', 'white', 24, 0.00),
(375, 'Lacha', 'All Colours', 10, 0.00),
(376, 'Lungi', 'All Colours Lungi', 11, 0.00),
(377, 'Lungi V.1', 'All Colours Lungi V.1', 1, 0.00),
(378, 'Lungi V.7.5', 'All Colours Lungi V.7.5', 7, 0.00),
(379, 'Romal1/5', 'All Colours Romal1/5', 4, 0.00),
(380, 'Romal2/5', 'All Colours Romal2/5', 15, 0.00),
(381, 'Romal3/5', 'All Colours Romal3/5', 12, 0.00),
(382, 'Romal4', 'Off White', 6, 0.00),
(383, 'Romal5', 'white', 6, 0.00),
(384, 'Romal5/5', 'All colours Romal5/5', 6, 0.00),
(385, 'Romal6', 'white and red', 6, 0.00),
(386, 'Romal1', 'white and red', 3, 0.00),
(387, 'Lachay 5y', 'red', 3, 0.00),
(388, 'Lachay 10y', 'red and brown', 3, 0.00),
(389, 'Shafoon Dupata ', 'black', 2, 0.00),
(390, 'Shafoon Dupata ', 'white', 1, 0.00),
(391, 'Shafoon Dupata Imbroidary', 'black', 1, 0.00),
(392, 'Ajrak Shal ', 'All Colours Ajrak Shal ', 16, 0.00),
(393, 'Burkha', 'black', 4, 0.00),
(394, 'Shal1', 'All colours Shal1', 3, 0.00),
(395, 'Shal2', 'All colours Shal2', 4, 0.00),
(396, 'Shal3', 'All colours Shal3', 5, 0.00),
(397, 'Shal4', 'All colours Shal4', 1, 0.00),
(398, 'Shal5', 'All colours Shal5', 4, 0.00),
(399, 'Shal6', 'All colours Shal6', 4, 0.00),
(400, 'Shal7', 'All colours Shal7', 4, 0.00),
(401, 'Shal8', 'All colours Shal8', 2, 0.00),
(402, 'Shal9', 'All colours Shal9', 4, 0.00),
(403, 'Shal10', 'All colours Shal10', 4, 0.00),
(404, 'Shal11', 'All colours Shal11', 0, 0.00),
(405, 'Shal12', 'All colours Shal12', 4, 0.00),
(406, 'Shal13', 'All colours Shal13', 1, 0.00),
(407, 'karanthi Safa1', 'White', 23, 0.00),
(408, 'Indian Pagh', 'White', 3, 0.00),
(409, 'Indian Pagh1', 'White', 3, 0.00),
(410, 'Indian Dupata', 'White', 16, 0.00),
(411, 'Ladies Shal1', 'black', 1, 0.00),
(412, 'Ladies Shal2', 'Mahroon', 1, 0.00),
(413, 'Ladies Shal3', 'black', 1, 0.00),
(414, 'Ladies Shal4', 'All colours Ladies Shal4', 5, 0.00),
(415, 'Ladies Shal5', 'All colours Ladies Shal5', 2, 0.00),
(416, 'Ladies Shal6', 'All colours Ladies Shal6', 5, 0.00),
(417, 'Ladies Shal7', 'All colours Ladies Shal7', 5, 0.00),
(418, 'Ladies Namaz Shal8 without sleeves', 'All colours Ladies Namaz Shal8 without sleeves', 3, 0.00),
(419, 'Ladies Namaz Shal9 with sleeves', 'All colours Ladies Namaz Shal9 with sleeves', 3, 0.00),
(420, 'Ladies Shal10', 'All colours Ladies Shal10', 4, 0.00),
(421, 'Welwet Shal11', 'All colours Ladies Shal11', 2, 0.00),
(422, 'Welwet Shal12', 'All colours Welwet Shal12', 2, 0.00),
(423, 'Welwet Shal13', 'All colours Welwet Shal13', 0, 0.00),
(424, 'Welwet Shal14', 'All colours Welwet Shal14', 1, 0.00),
(425, 'Ladies Ahram V.7', 'white', 1, 0.00),
(426, 'Ladies Ahram V.12', 'white', 9, 0.00),
(427, 'Haji Chatai', 'Blue', 2, 0.00),
(428, 'Haji Chatai', 'Green', 1, 0.00),
(429, 'Haji Pillow', 'Blue', 12, 0.00),
(430, 'Haji Leather Belt/1', 'black', 6, 0.00),
(431, 'Haji Leather Belt/2', 'black', 1, 0.00),
(432, 'Haji Leather Belt/3', 'black', 2, 0.00),
(433, 'Haji Leather Belt/4', 'black', 0, 0.00),
(434, 'Haji bag', 'White', 5, 0.00),
(435, 'Haji Leather Belt/5', 'White', 11, 0.00),
(436, 'Haji Leather Belt/6', 'White', 8, 0.00),
(437, 'Ladies lawn Chadar/1', 'All colours Ladies lawn Chadar/1', 10, 0.00),
(438, 'Ladies lawn Chadar/2', 'All colours Ladies lawn Chadar/2', 6, 0.00),
(439, 'Ladies lawn Chadar/3', 'All colours Ladies lawn Chadar/3', 8, 0.00),
(440, 'Ladies lawn Dupatta/1', 'All colours Ladies lawn Dupatta/1', 4, 0.00),
(441, 'Ladies lawn Dupatta/2', 'All colours Ladies lawn Dupatta/2', 3, 0.00),
(442, 'Ladies Linen Dupatta/3', 'All colours Ladies Linen Dupatta/3', 2, 0.00),
(443, 'Ladies lawn Chadar/4', 'All colours Ladies lawn Chadar/4', 2, 0.00),
(444, 'Ladies Swiss Chadar/1', 'Mahroon', 1, 0.00),
(445, 'Ladies Swiss Chadar/2', 'Skin', 1, 0.00),
(446, 'Ladies Swiss Chadar/3', 'All Colours Ladies Swiss Chadar/3', 3, 0.00),
(447, 'Rashmi Shalwar', 'white', 1, 0.00),
(448, 'Indian Pagh2', 'white', 2, 0.00),
(449, 'Indian Dupata1', 'white', 4, 0.00),
(450, 'Rashmi Pinthi Dupata', 'white', 6, 0.00),
(451, 'Fancey Linen', 'black', 1, 0.00),
(452, 'Stallers Lawn', 'All Colours ', 4, 0.00),
(453, 'Zaby Wool', 'All Colour', 20, 0.00),
(454, 'Karandi Wool', 'All Colour', 3, 0.00),
(455, 'Vigo Wool', 'All Colour', 39, 0.00),
(456, 'Zuriq Wool', 'All Colour', 35, 0.00),
(457, 'Patangeer Wool', 'All Colour', 15, 0.00),
(458, 'Renault Wool', 'All Colour', 7, 0.00),
(459, 'Ventage Wool', 'All Colour', 6, 0.00),
(460, 'Panama Wool', 'All Colour', 6, 0.00),
(461, 'Thanak Suiting', 'Multicolour', 14, 0.00),
(462, 'Great Suiting', 'Multi Colour', 32, 0.00),
(463, 'Ahram S/L khadi V.23', 'white', 4, 0.00),
(464, 'Ahram S/L Tawel V.27', 'white', 5, 0.00),
(465, 'Ahram S/2 khadi V.17', 'white', 3, 0.00),
(466, 'pashmina Wool', 'multi colour', 31, 0.00),
(467, 'Chap Wool', 'multi colour', 24, 0.00),
(468, 'Pepsico Wool', 'multi colour', 19, 0.00),
(469, 'Magic Wool', 'multi colour', 23, 0.00),
(470, 'German Wool', 'multi colour', 38, 0.00),
(471, 'Best Vicona', 'multi colour', 41, 0.00),
(472, '5 Star', 'multi colour', 47, 0.00),
(473, 'Mashter Wool', 'multi colour', 39, 0.00),
(474, 'Chand Thara Wool', 'multi colour', 36, 0.00),
(475, 'Business Cloth', 'multi colour', 1, 0.00),
(476, 'Black Grapes', 'multi colour', 1, 0.00),
(477, 'Cambridge Swiss', 'multi colour', 1, 0.00),
(478, 'Italian', 'multi colour', 1, 0.00),
(479, 'Zamzama', 'multi colour', 1, 0.00),
(480, 'Boski Boring Gala', 'multi colour', 9, 0.00),
(481, 'Royal Spun Ban Pati', 'multi colour', 21, 0.00),
(482, 'Royal Spun Ban Gala', 'multi colour', 11, 0.00),
(483, 'Skab Boski Hand Made', 'multi colour', 9, 0.00),
(484, 'Skab Boski Imbroidary', 'multi colour', 9, 0.00),
(485, 'Candy Kather', 'multi colour', 4, 0.00),
(486, 'Royal Spun Suiting', 'multi colour', 8, 0.00),
(487, 'Design V.402', 'multi colour', 1, 0.00),
(488, 'Washingware V.4001', 'multi colour', 1, 0.00),
(489, 'White strom', 'multi colour', 12, 0.00),
(490, 'Narkins Cranprry', 'multi colour', 3, 0.00),
(491, 'Narkins habibi', 'multi colour', 3, 0.00),
(492, 'Rajahs Submit', 'multi colour', 2, 0.00),
(493, 'Dynasty SuperActive', 'multi colour', 1, 0.00),
(494, 'Pasha', 'multi colour', 2, 0.00),
(495, 'Pasha Moon Stone', 'multi colour', 1, 0.00),
(496, 'MF High Class Gum pati', 'multi colour', 1, 0.00),
(497, 'MS Gala Khadi', 'multi colour', 1, 0.00),
(498, 'Orient Ghadi', 'multi colour', 2, 0.00),
(499, 'Orient Ghadi V.48', 'multi colour', 1, 0.00),
(500, 'Orient Ghadi V.55', 'multi colour', 1, 0.00),
(501, 'MS Khadi', 'multi colour', 1, 0.00),
(502, 'Chawla Gala Khadi', 'multi colour', 1, 0.00),
(503, 'Grace khadi', 'multi colour', 1, 0.00),
(504, 'JNG Chicken kari', 'multi colour', 1, 0.00),
(505, 'JNG Chicken kari V.48', 'multi colour', 3, 0.00),
(506, 'Orient karhi V.44', 'multi colour', 0, 0.00),
(507, 'Important Wool', 'multi colour', 0, 1.00),
(508, 'Toyobo', 'multi colour', 0, 1.00),
(509, 'Narkins Italian V.0006', 'multi colour', 0, 1.00),
(510, 'Narkins Italian V.0005', 'multi colour', 0, 1.00),
(511, 'Narkins Italian V.42913', 'multi colour', 0, 1.00),
(512, 'Narkins Italian V.30010', 'multi colour', 0, 1.00),
(513, 'Glamur Zeqon', 'multi colour', 0, 1.00),
(514, 'Boski karhi Latha Shalwar', 'multicolour', 1, 0.00),
(515, 'karandi karhi', 'multicolour', 1, 0.00),
(516, 'Washingware karhi', 'multicolour', 2, 0.00),
(517, 'Washingware karhi V.38', 'multicolour', 6, 0.00),
(518, 'Washingware karhi V.42', 'multicolour', 2, 0.00),
(519, 'Washingware karhi V.44', 'multicolour', 17, 0.00),
(520, 'Washingware karhi V.28', 'multicolour', 3, 0.00),
(521, 'Washingware karhi V.36', 'multicolour', 2, 0.00),
(522, 'Washingware karhi V.32', 'multicolour', 1, 0.00),
(523, 'Washingware karhi V.24', 'multicolour', 1, 0.00),
(524, 'Washingware karhi V.45', 'multicolour', 1, 0.00),
(525, 'Washingware karhi V.55', 'multicolour', 1, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `return_product`
--

CREATE TABLE `return_product` (
  `return_id` int(11) NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `colour_name_of_product` varchar(100) NOT NULL,
  `Return_Reason` varchar(255) NOT NULL,
  `Bill_ID` varchar(255) NOT NULL,
  `Return_Date` date NOT NULL DEFAULT current_timestamp(),
  `Meter` int(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Customer_Name` varchar(255) NOT NULL,
  `Refund_Amount` decimal(10,2) NOT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `return_product`
--

INSERT INTO `return_product` (`return_id`, `Product_Name`, `colour_name_of_product`, `Return_Reason`, `Bill_ID`, `Return_Date`, `Meter`, `Quantity`, `Customer_Name`, `Refund_Amount`, `sale_id`, `stock_id`) VALUES
(1, 'Vichar Marina', 'All Colours Vichar Marina', 'Change', '24', '2024-11-06', 0, 2, 'Ali', 9200.00, NULL, NULL),
(4, 'Classic Linen 3 Piece', 'All colours Classic linen 3 piece', 'No Like', '34', '2024-11-09', 0, 2, 'Amir', 4000.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_access_pages`
--

CREATE TABLE `staff_access_pages` (
  `id` int(10) NOT NULL,
  `page_name` varchar(50) NOT NULL,
  `display_page` varchar(40) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_access_pages`
--

INSERT INTO `staff_access_pages` (`id`, `page_name`, `display_page`, `Status`) VALUES
(1, 'Add_Customer.html', 'Add Customer', 'add'),
(2, 'Print_bill.php', 'Print_bill', 'add');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_customer`
--
ALTER TABLE `add_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `add_customers`
--
ALTER TABLE `add_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `add_employee`
--
ALTER TABLE `add_employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `add_purchases`
--
ALTER TABLE `add_purchases`
  ADD PRIMARY KEY (`Purchases_id`);

--
-- Indexes for table `add_sale`
--
ALTER TABLE `add_sale`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `add_stock`
--
ALTER TABLE `add_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `add_supplier`
--
ALTER TABLE `add_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_access_pages`
--
ALTER TABLE `admin_access_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_history`
--
ALTER TABLE `employee_salary_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installment_payments_purchases`
--
ALTER TABLE `installment_payments_purchases`
  ADD PRIMARY KEY (`installment_purchases_id`);

--
-- Indexes for table `manager_access_pages`
--
ALTER TABLE `manager_access_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `product_colour`
--
ALTER TABLE `product_colour`
  ADD PRIMARY KEY (`colour_id`);

--
-- Indexes for table `return_product`
--
ALTER TABLE `return_product`
  ADD PRIMARY KEY (`return_id`),
  ADD KEY `sale_id` (`sale_id`),
  ADD KEY `stock_id` (`stock_id`);

--
-- Indexes for table `staff_access_pages`
--
ALTER TABLE `staff_access_pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_customer`
--
ALTER TABLE `add_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `add_customers`
--
ALTER TABLE `add_customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `add_employee`
--
ALTER TABLE `add_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_purchases`
--
ALTER TABLE `add_purchases`
  MODIFY `Purchases_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_sale`
--
ALTER TABLE `add_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_stock`
--
ALTER TABLE `add_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `add_supplier`
--
ALTER TABLE `add_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admin_access_pages`
--
ALTER TABLE `admin_access_pages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employee_salary_history`
--
ALTER TABLE `employee_salary_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `installment_payments_purchases`
--
ALTER TABLE `installment_payments_purchases`
  MODIFY `installment_purchases_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager_access_pages`
--
ALTER TABLE `manager_access_pages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `product_colour`
--
ALTER TABLE `product_colour`
  MODIFY `colour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=526;

--
-- AUTO_INCREMENT for table `return_product`
--
ALTER TABLE `return_product`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff_access_pages`
--
ALTER TABLE `staff_access_pages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_sale`
--
ALTER TABLE `add_sale`
  ADD CONSTRAINT `add_sale_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `add_customers` (`customer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `add_sale_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `add_employee` (`employee_id`) ON DELETE CASCADE;

--
-- Constraints for table `add_stock`
--
ALTER TABLE `add_stock`
  ADD CONSTRAINT `add_stock_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `add_supplier` (`supplier_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `add_customer` (`customer_id`);

--
-- Constraints for table `return_product`
--
ALTER TABLE `return_product`
  ADD CONSTRAINT `return_product_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `add_sale` (`sale_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `return_product_ibfk_2` FOREIGN KEY (`stock_id`) REFERENCES `add_stock` (`stock_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
