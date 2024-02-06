-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 06:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farma`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'Vivek', '1419'),
(2, 'Chaitanya', '1419');

-- --------------------------------------------------------

--
-- Table structure for table `c_signup`
--

CREATE TABLE `c_signup` (
  `Customer_id` int(11) NOT NULL,
  `Account_status` varchar(255) NOT NULL,
  `Full_name` varchar(70) NOT NULL,
  `City_village` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `District` varchar(30) NOT NULL,
  `Pin` varchar(30) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Email` varchar(75) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Repassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `c_signup`
--

INSERT INTO `c_signup` (`Customer_id`, `Account_status`, `Full_name`, `City_village`, `State`, `District`, `Pin`, `Mobile`, `Email`, `Password`, `Repassword`) VALUES
(1, 'Active', 'Vivek Kamble', 'Sangli', 'Maharashtra', 'Sangli', '123456', '9876543210', 'vivekkamble@gmail.com', '123', '123'),
(2, 'Active', 'Jayesh Patel', 'Kolhapur', 'Maharashtra', 'Kolhapur', '654321', '1234567890', 'jayeshpatel@gmail.com', '123', '123'),
(3, 'Active', 'Ananya Gupta', 'Satara', 'Maharashtra', 'Satara', '987654', '4567890123', 'ananyagupta@gmail.com', '123', '123'),
(4, 'Active', 'Mohit Deshmukh', 'Tasgaon', 'Maharashtra', 'Solapur', '456789', '7890123456', 'mohitdeshmukh@gmail.com', '123', '123'),
(5, 'Active', 'Divya Joshi', 'Bendri', 'Maharashtra', 'Sangli', '234567', '8901234567', 'divyajoshi@gmail.com', '123', '123'),
(6, 'Active', 'Siddharth Kumar', 'Vita', 'Maharashtra', 'Kolhapur', '567890', '9012345678', 'siddharthkumar@gmail.com', '123', '123'),
(7, 'Active', 'Priya Singh', 'Jadarbublad Kavthe Ekand', 'Maharashtra', 'Satara', '345678', '0123456789', 'priyasingh@gmail.com', '123', '123'),
(8, 'Active', 'Aryan Sharma', 'Nandre', 'Maharashtra', 'Solapur', '678901', '1234567890', 'aryansharma@gmail.com', '123', '123'),
(9, 'Active', 'Anushka Shah', 'Miraj', 'Maharashtra', 'Sangli', '456789', '2345678901', 'anushkashah@gmail.com', '123', '123'),
(10, 'Active', 'Rohan Verma', 'Sangli', 'Maharashtra', 'Kolhapur', '789012', '3456789012', 'rohanverma@gmail.com', '123', '123'),
(11, 'Active', 'Neha Mishra', 'Tasgaon', 'Maharashtra', 'Sangli', '123456', '9876543210', 'nehamishra@gmail.com', '123', '123'),
(12, 'Active', 'Kirti Singh', 'Kolhapur', 'Maharashtra', 'Satara', '654321', '1234567890', 'kirtisingh@gmail.com', '123', '123'),
(13, 'Active', 'Shivam Yadav', 'Satara', 'Maharashtra', 'Solapur', '987654', '4567890123', 'shivamyadav@gmail.com', '123', '123'),
(14, 'Active', 'Priyanka Sharma', 'Bendri', 'Maharashtra', 'Kolhapur', '456789', '7890123456', 'priyankasharma@gmail.com', '123', '123'),
(15, 'Active', 'Aniket Tiwari', 'Vita', 'Maharashtra', 'Satara', '234567', '8901234567', 'anikettiwari@gmail.com', '123', '123'),
(16, 'Active', 'Shreya Patel', 'Jadarbublad Kavthe Ekand', 'Maharashtra', 'Sangli', '567890', '9012345678', 'shreyapatel@gmail.com', '123', '123'),
(17, 'Active', 'Aarav Gupta', 'Nandre', 'Maharashtra', 'Kolhapur', '345678', '0123456789', 'aaravgupta@gmail.com', '123', '123'),
(18, 'Active', 'Ishaan Singh', 'Miraj', 'Maharashtra', 'Satara', '678901', '1234567890', 'ishaansingh@gmail.com', '123', '123'),
(19, 'Active', 'Radhika Kumar', 'Sangli', 'Maharashtra', 'Solapur', '456789', '2345678901', 'radhikakumar@gmail.com', '123', '123'),
(20, 'Active', 'Pranav Joshi', 'Tasgaon', 'Maharashtra', 'Sangli', '789012', '3456789012', 'pranavjoshi@gmail.com', '123', '123'),
(21, 'Active', 'Sakshi Sharma', 'Kolhapur', 'Maharashtra', 'Kolhapur', '890123', '4567890123', 'sakshisharma@gmail.com', '123', '123'),
(22, 'Active', 'Arnav Verma', 'Satara', 'Maharashtra', 'Satara', '567890', '9876543210', 'arnavverma@gmail.com', '123', '123'),
(23, 'Active', 'Sneha Patel', 'Bendri', 'Maharashtra', 'Solapur', '234567', '1234567890', 'snehapatel@gmail.com', '123', '123'),
(24, 'Active', 'Yashvi Kumar', 'Vita', 'Maharashtra', 'Kolhapur', '789012', '4567890123', 'yashvikumar@gmail.com', '123', '123'),
(25, 'Active', 'Parth Gupta', 'Jadarbublad Kavthe Ekand', 'Maharashtra', 'Satara', '012345', '7890123456', 'parthgupta@gmail.com', '123', '123'),
(26, 'Active', 'Neha Yadav', 'Nandre', 'Maharashtra', 'Sangli', '234567', '8901234567', 'nehayadav@gmail.com', '123', '123'),
(27, 'Active', 'Rohit Singh', 'Miraj', 'Maharashtra', 'Solapur', '890123', '9012345678', 'rohitsingh@gmail.com', '123', '123'),
(28, 'Active', 'Aisha Gupta', 'Sangli', 'Maharashtra', 'Sangli', '567890', '0123456789', 'aishagupta@gmail.com', '123', '123'),
(29, 'Active', 'Rohan Kumar', 'Tasgaon', 'Maharashtra', 'Kolhapur', '123456', '2345678901', 'rohankumar@gmail.com', '123', '123'),
(30, 'Active', 'Ananya Sharma', 'Kolhapur', 'Maharashtra', 'Satara', '654321', '3456789012', 'ananyasharma@gmail.com', '123', '123'),
(31, 'Active', 'Sarthak Singh', 'Satara', 'Maharashtra', 'Solapur', '987654', '4567890123', 'sarthaksingh@gmail.com', '123', '123'),
(32, 'Active', 'Tanvi Tiwari', 'Bendri', 'Maharashtra', 'Kolhapur', '456789', '5678901234', 'tanvitiwari@gmail.com', '123', '123'),
(33, 'Active', 'Rishi Patel', 'Vita', 'Maharashtra', 'Satara', '234567', '6789012345', 'rishipatel@gmail.com', '123', '123'),
(34, 'Active', 'Pari Deshmukh', 'Jadarbublad Kavthe Ekand', 'Maharashtra', 'Sangli', '678901', '7890123456', 'parideshmukh@gmail.com', '123', '123'),
(35, 'Active', 'Krishna Sharma', 'Nandre', 'Maharashtra', 'Kolhapur', '345678', '8901234567', 'krishnasharma@gmail.com', '123', '123'),
(36, 'Active', 'Kavya Verma', 'Miraj', 'Maharashtra', 'Satara', '012345', '9012345678', 'kavyaverma@gmail.com', '123', '123'),
(37, 'Active', 'Pranay Singh', 'Sangli', 'Maharashtra', 'Solapur', '234567', '0123456789', 'pranaysingh@gmail.com', '123', '123'),
(38, 'Active', 'Anika Kumar', 'Tasgaon', 'Maharashtra', 'Sangli', '789012', '1234567890', 'anikakumar@gmail.com', '123', '123'),
(39, 'Active', 'Harshita Singh', 'Kolhapur', 'Maharashtra', 'Kolhapur', '123456', '2345678901', 'harshitasingh@gmail.com', '123', '123'),
(40, 'Active', 'Kabir Gupta', 'Satara', 'Maharashtra', 'Satara', '654321', '3456789012', 'kabirgupta@gmail.com', '123', '123'),
(41, 'Active', 'Aradhya Tiwari', 'Bendri', 'Maharashtra', 'Solapur', '987654', '4567890123', 'aradhyatiwari@gmail.com', '123', '123'),
(42, 'Active', 'Shivansh Patel', 'Vita', 'Maharashtra', 'Kolhapur', '456789', '5678901234', 'shivanshpatel@gmail.com', '123', '123'),
(43, 'Active', 'Ishita Sharma', 'Jadarbublad Kavthe Ekand', 'Maharashtra', 'Satara', '234567', '6789012345', 'ishitasharma@gmail.com', '123', '123'),
(44, 'Active', 'Kartik Gupta', 'Nandre', 'Maharashtra', 'Sangli', '678901', '7890123456', 'kartikgupta@gmail.com', '123', '123'),
(45, 'Active', 'Advika Singh', 'Miraj', 'Maharashtra', 'Kolhapur', '345678', '8901234567', 'advikasingh@gmail.com', '123', '123'),
(46, 'Active', 'Prisha Patel', 'Sangli', 'Maharashtra', 'Sangli', '012345', '9012345678', 'prishapatel@gmail.com', '123', '123'),
(47, 'Active', 'Kabir Verma', 'Tasgaon', 'Maharashtra', 'Solapur', '789012', '0123456789', 'kabirverma@gmail.com', '123', '123'),
(48, 'Active', 'Anaya Sharma', 'Kolhapur', 'Maharashtra', 'Kolhapur', '123456', '1234567890', 'anayasharma@gmail.com', '123', '123'),
(49, 'Active', 'Vanya Singh', 'Satara', 'Maharashtra', 'Satara', '654321', '2345678901', 'vanyasingh@gmail.com', '123', '123'),
(50, 'Active', 'Rudra Tiwari', 'Bendri', 'Maharashtra', 'Solapur', '987654', '3456789012', 'rudratiwari@gmail.com', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Name` varchar(50) NOT NULL,
  `Email` varchar(75) NOT NULL,
  `Message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Name`, `Email`, `Message`) VALUES
('shubham', 'shubham@gmail.com', 'testing\r\n'),
('Avantika', 'avya@gmail.com', 'Testing\r\n'),
('Alice Johnson', 'alice.johnson@example.com', 'Fast shipping and excellent customer support.'),
('Michael Wilson', 'michael.wilson@example.com', 'Top-notch quality and quick delivery.'),
('Sophia Miller', 'sophia.miller@example.com', 'Impressed with the variety of products.'),
('Ethan Anderson', 'ethan.anderson@example.com', 'Easy navigation and user-friendly website.'),
('Olivia Brown', 'olivia.brown@example.com', 'Received my order in perfect condition.'),
('Liam Garcia', 'liam.garcia@example.com', 'Excellent communication throughout the process.'),
('Ava Martinez', 'ava.martinez@example.com', 'Great value for money. Will shop again.'),
('Noah Robinson', 'noah.robinson@example.com', 'Responsive customer service.'),
('Isabella Taylor', 'isabella.taylor@example.com', 'Impressive product selection.'),
('Mason White', 'mason.white@example.com', 'Smooth and secure online transaction.'),
('Sophie Turner', 'sophie.turner@example.com', 'Timely delivery and well-packaged items.'),
('Henry Adams', 'henry.adams@example.com', 'User-friendly website and easy checkout process.'),
('Amelia Clark', 'amelia.clark@example.com', 'Satisfied with the quality of the products.'),
('Owen Hill', 'owen.hill@example.com', 'Quick response to inquiries.'),
('Aria Moore', 'aria.moore@example.com', 'Great experience shopping here.'),
('Elijah Mitchell', 'elijah.mitchell@example.com', 'Highly recommend this online store.'),
('Scarlett Walker', 'scarlett.walker@example.com', 'Impressed with the customer service.'),
('Lucas Reed', 'lucas.reed@example.com', 'Found exactly what I was looking for.'),
('Avery Nelson', 'avery.nelson@example.com', 'The website is easy to navigate.'),
('Jackson Green', 'jackson.green@example.com', 'Fast and reliable shipping services.'),
('Ella Baker', 'ella.baker@example.com', 'Responsive and helpful customer support.'),
('Levi Cooper', 'levi.cooper@example.com', 'Happy with my purchase experience.'),
('Mia Fisher', 'mia.fisher@example.com', 'Great selection of products and competitive prices.'),
('Sebastian Young', 'sebastian.young@example.com', 'Smooth transaction from start to finish.'),
('Lily Bennett', 'lily.bennett@example.com', 'Impressed with the product quality.'),
('Grayson Parker', 'grayson.parker@example.com', 'Efficient order processing and delivery.'),
('Evelyn Collins', 'evelyn.collins@example.com', 'Received my order earlier than expected.'),
('James Ward', 'james.ward@example.com', 'The website is user-friendly and intuitive.'),
('Luna Turner', 'luna.turner@example.com', 'Highly satisfied with the service and products.'),
('Oscar Rogers', 'oscar.rogers@example.com', 'Quality products and great customer experience.'),
('Chloe Bryant', 'chloe.bryant@example.com', 'The ordering process was straightforward.'),
('Carter Murphy', 'carter.murphy@example.com', 'Excellent value for the money spent.'),
('Penelope Evans', 'penelope.evans@example.com', 'Quick response to inquiries and concerns.'),
('Eli Reed', 'eli.reed@example.com', 'Happy with the overall shopping experience.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Product_name` varchar(50) NOT NULL,
  `Seller_id` int(50) NOT NULL,
  `Location` varchar(200) NOT NULL,
  `order_for` varchar(200) NOT NULL,
  `order_quantity` int(50) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `Customer_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `rent` int(100) NOT NULL,
  `total_payable` int(50) NOT NULL,
  `order_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sell_product`
--

CREATE TABLE `sell_product` (
  `product_id` int(11) NOT NULL,
  `Seller_id` int(11) DEFAULT NULL,
  `Product_Image` varchar(255) NOT NULL,
  `Product_status` varchar(255) NOT NULL,
  `Product_name` varchar(50) NOT NULL,
  `available_qantity` varchar(50) NOT NULL,
  `rent` int(50) NOT NULL,
  `product_quality` varchar(50) NOT NULL,
  `product_discription` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `s_signup`
--

CREATE TABLE `s_signup` (
  `Seller_id` int(11) NOT NULL,
  `Account_status` varchar(255) NOT NULL,
  `Full_name` varchar(75) NOT NULL,
  `City_village` varchar(75) NOT NULL,
  `State` varchar(50) NOT NULL,
  `District` varchar(50) NOT NULL,
  `Pin` varchar(20) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Repassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `s_signup`
--

INSERT INTO `s_signup` (`Seller_id`, `Account_status`, `Full_name`, `City_village`, `State`, `District`, `Pin`, `Mobile`, `Email`, `Password`, `Repassword`) VALUES
(1, 'Active', 'Vivek Kamble', 'Sangli', 'Maharashtra', 'Sangli', '123456', '9876543210', 'vivekkamble@gmail.com', '123', '123'),
(2, 'Active', 'Jayesh Patel', 'Kolhapur', 'Maharashtra', 'Kolhapur', '654321', '1234567890', 'jayeshpatel@gmail.com', '123', '123'),
(3, 'Active', 'Ananya Gupta', 'Satara', 'Maharashtra', 'Satara', '987654', '4567890123', 'ananyagupta@gmail.com', '123', '123'),
(4, 'Active', 'Mohit Deshmukh', 'Tasgaon', 'Maharashtra', 'Solapur', '456789', '7890123456', 'mohitdeshmukh@gmail.com', '123', '123'),
(5, 'Active', 'Divya Joshi', 'Bendri', 'Maharashtra', 'Sangli', '234567', '8901234567', 'divyajoshi@gmail.com', '123', '123'),
(6, 'Active', 'Siddharth Kumar', 'Vita', 'Maharashtra', 'Kolhapur', '567890', '9012345678', 'siddharthkumar@gmail.com', '123', '123'),
(7, 'Active', 'Priya Singh', 'Jadarbublad Kavthe Ekand', 'Maharashtra', 'Satara', '345678', '0123456789', 'priyasingh@gmail.com', '123', '123'),
(8, 'Active', 'Aryan Sharma', 'Nandre', 'Maharashtra', 'Solapur', '678901', '1234567890', 'aryansharma@gmail.com', '123', '123'),
(9, 'Active', 'Anushka Shah', 'Miraj', 'Maharashtra', 'Sangli', '456789', '2345678901', 'anushkashah@gmail.com', '123', '123'),
(10, 'Active', 'Rohan Verma', 'Sangli', 'Maharashtra', 'Kolhapur', '789012', '3456789012', 'rohanverma@gmail.com', '123', '123'),
(11, 'Active', 'Neha Mishra', 'Tasgaon', 'Maharashtra', 'Sangli', '123456', '9876543210', 'nehamishra@gmail.com', '123', '123'),
(12, 'Active', 'Kirti Singh', 'Kolhapur', 'Maharashtra', 'Satara', '654321', '1234567890', 'kirtisingh@gmail.com', '123', '123'),
(13, 'Active', 'Shivam Yadav', 'Satara', 'Maharashtra', 'Solapur', '987654', '4567890123', 'shivamyadav@gmail.com', '123', '123'),
(14, 'Active', 'Priyanka Sharma', 'Bendri', 'Maharashtra', 'Kolhapur', '456789', '7890123456', 'priyankasharma@gmail.com', '123', '123'),
(15, 'Active', 'Aniket Tiwari', 'Vita', 'Maharashtra', 'Satara', '234567', '8901234567', 'anikettiwari@gmail.com', '123', '123'),
(16, 'Active', 'Shreya Patel', 'Jadarbublad Kavthe Ekand', 'Maharashtra', 'Sangli', '567890', '9012345678', 'shreyapatel@gmail.com', '123', '123'),
(17, 'Active', 'Aarav Gupta', 'Nandre', 'Maharashtra', 'Kolhapur', '345678', '0123456789', 'aaravgupta@gmail.com', '123', '123'),
(18, 'Active', 'Ishaan Singh', 'Miraj', 'Maharashtra', 'Satara', '678901', '1234567890', 'ishaansingh@gmail.com', '123', '123'),
(19, 'Active', 'Radhika Kumar', 'Sangli', 'Maharashtra', 'Solapur', '456789', '2345678901', 'radhikakumar@gmail.com', '123', '123'),
(20, 'Active', 'Pranav Joshi', 'Tasgaon', 'Maharashtra', 'Sangli', '789012', '3456789012', 'pranavjoshi@gmail.com', '123', '123'),
(21, 'Active', 'Sakshi Sharma', 'Kolhapur', 'Maharashtra', 'Kolhapur', '890123', '4567890123', 'sakshisharma@gmail.com', '123', '123'),
(22, 'Active', 'Arnav Verma', 'Satara', 'Maharashtra', 'Satara', '567890', '9876543210', 'arnavverma@gmail.com', '123', '123'),
(23, 'Active', 'Sneha Patel', 'Bendri', 'Maharashtra', 'Solapur', '234567', '1234567890', 'snehapatel@gmail.com', '123', '123'),
(24, 'Active', 'Yashvi Kumar', 'Vita', 'Maharashtra', 'Kolhapur', '789012', '4567890123', 'yashvikumar@gmail.com', '123', '123'),
(25, 'Active', 'Parth Gupta', 'Jadarbublad Kavthe Ekand', 'Maharashtra', 'Satara', '012345', '7890123456', 'parthgupta@gmail.com', '123', '123'),
(26, 'Active', 'Neha Yadav', 'Nandre', 'Maharashtra', 'Sangli', '234567', '8901234567', 'nehayadav@gmail.com', '123', '123'),
(27, 'Active', 'Rohit Singh', 'Miraj', 'Maharashtra', 'Solapur', '890123', '9012345678', 'rohitsingh@gmail.com', '123', '123'),
(28, 'Active', 'Aisha Gupta', 'Sangli', 'Maharashtra', 'Sangli', '567890', '0123456789', 'aishagupta@gmail.com', '123', '123'),
(29, 'Active', 'Rohan Kumar', 'Tasgaon', 'Maharashtra', 'Kolhapur', '123456', '2345678901', 'rohankumar@gmail.com', '123', '123'),
(30, 'Active', 'Ananya Sharma', 'Kolhapur', 'Maharashtra', 'Satara', '654321', '3456789012', 'ananyasharma@gmail.com', '123', '123'),
(31, 'Active', 'Sarthak Singh', 'Satara', 'Maharashtra', 'Solapur', '987654', '4567890123', 'sarthaksingh@gmail.com', '123', '123'),
(32, 'Active', 'Tanvi Tiwari', 'Bendri', 'Maharashtra', 'Kolhapur', '456789', '5678901234', 'tanvitiwari@gmail.com', '123', '123'),
(33, 'Active', 'Rishi Patel', 'Vita', 'Maharashtra', 'Satara', '234567', '6789012345', 'rishipatel@gmail.com', '123', '123'),
(34, 'Active', 'Pari Deshmukh', 'Jadarbublad Kavthe Ekand', 'Maharashtra', 'Sangli', '678901', '7890123456', 'parideshmukh@gmail.com', '123', '123'),
(35, 'Active', 'Krishna Sharma', 'Nandre', 'Maharashtra', 'Kolhapur', '345678', '8901234567', 'krishnasharma@gmail.com', '123', '123'),
(36, 'Active', 'Kavya Verma', 'Miraj', 'Maharashtra', 'Satara', '012345', '9012345678', 'kavyaverma@gmail.com', '123', '123'),
(37, 'Active', 'Pranay Singh', 'Sangli', 'Maharashtra', 'Solapur', '234567', '0123456789', 'pranaysingh@gmail.com', '123', '123'),
(38, 'Active', 'Anika Kumar', 'Tasgaon', 'Maharashtra', 'Sangli', '789012', '1234567890', 'anikakumar@gmail.com', '123', '123'),
(39, 'Active', 'Harshita Singh', 'Kolhapur', 'Maharashtra', 'Kolhapur', '123456', '2345678901', 'harshitasingh@gmail.com', '123', '123'),
(40, 'Active', 'Kabir Gupta', 'Satara', 'Maharashtra', 'Satara', '654321', '3456789012', 'kabirgupta@gmail.com', '123', '123'),
(41, 'Active', 'Aradhya Tiwari', 'Bendri', 'Maharashtra', 'Solapur', '987654', '4567890123', 'aradhyatiwari@gmail.com', '123', '123'),
(42, 'Active', 'Shivansh Patel', 'Vita', 'Maharashtra', 'Kolhapur', '456789', '5678901234', 'shivanshpatel@gmail.com', '123', '123'),
(43, 'Active', 'Ishita Sharma', 'Jadarbublad Kavthe Ekand', 'Maharashtra', 'Satara', '234567', '6789012345', 'ishitasharma@gmail.com', '123', '123'),
(44, 'Active', 'Kartik Gupta', 'Nandre', 'Maharashtra', 'Sangli', '678901', '7890123456', 'kartikgupta@gmail.com', '123', '123'),
(45, 'Active', 'Advika Singh', 'Miraj', 'Maharashtra', 'Kolhapur', '345678', '8901234567', 'advikasingh@gmail.com', '123', '123'),
(46, 'Active', 'Prisha Patel', 'Sangli', 'Maharashtra', 'Sangli', '012345', '9012345678', 'prishapatel@gmail.com', '123', '123'),
(47, 'Active', 'Kabir Verma', 'Tasgaon', 'Maharashtra', 'Solapur', '789012', '0123456789', 'kabirverma@gmail.com', '123', '123'),
(48, 'Active', 'Anaya Sharma', 'Kolhapur', 'Maharashtra', 'Kolhapur', '123456', '1234567890', 'anayasharma@gmail.com', '123', '123'),
(49, 'Active', 'Vanya Singh', 'Satara', 'Maharashtra', 'Satara', '654321', '2345678901', 'vanyasingh@gmail.com', '123', '123'),
(50, 'Active', 'Rudra Tiwari', 'Bendri', 'Maharashtra', 'Solapur', '987654', '3456789012', 'rudratiwari@gmail.com', '123', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_signup`
--
ALTER TABLE `c_signup`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_product`
--
ALTER TABLE `sell_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `Seller_id` (`Seller_id`);

--
-- Indexes for table `s_signup`
--
ALTER TABLE `s_signup`
  ADD PRIMARY KEY (`Seller_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `c_signup`
--
ALTER TABLE `c_signup`
  MODIFY `Customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `sell_product`
--
ALTER TABLE `sell_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `s_signup`
--
ALTER TABLE `s_signup`
  MODIFY `Seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sell_product`
--
ALTER TABLE `sell_product`
  ADD CONSTRAINT `sell_product_ibfk_1` FOREIGN KEY (`Seller_id`) REFERENCES `s_signup` (`Seller_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
