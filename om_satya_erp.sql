-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2024 at 02:15 PM
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
-- Database: `om_satya_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'West-Central', NULL, NULL),
(2, 'North', NULL, NULL),
(3, 'South', NULL, NULL),
(4, 'East', NULL, NULL),
(5, 'West', NULL, NULL),
(6, 'Central', NULL, NULL),
(7, 'North-East', NULL, NULL),
(8, 'North-West', NULL, NULL),
(9, 'South-East', NULL, NULL),
(10, 'South-West', NULL, NULL),
(11, 'North-Central', NULL, NULL),
(12, 'South-Central', NULL, NULL),
(13, 'East-Central', NULL, NULL),
(14, 'West-Central_pole', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mumbai', NULL, NULL),
(2, 'Delhi', NULL, NULL),
(3, 'Bangalore', NULL, NULL),
(4, 'Hyderabad', NULL, NULL),
(5, 'Ahmedabad', NULL, NULL),
(6, 'Chennai', NULL, NULL),
(7, 'Kolkata', NULL, NULL),
(8, 'Surat', NULL, NULL),
(9, 'Pune', NULL, NULL),
(10, 'Jaipur', NULL, NULL),
(11, 'Lucknow', NULL, NULL),
(12, 'Kanpur', NULL, NULL),
(13, 'Nagpur', NULL, NULL),
(14, 'Indore', NULL, NULL),
(15, 'Thane', NULL, NULL),
(16, 'Bhopal', NULL, NULL),
(17, 'Visakhapatnam', NULL, NULL),
(18, 'Pimpri-Chinchwad', NULL, NULL),
(19, 'Patna', NULL, NULL),
(20, 'Vadodara', NULL, NULL),
(21, 'Ghaziabad', NULL, NULL),
(22, 'Ludhiana', NULL, NULL),
(23, 'Agra', NULL, NULL),
(24, 'Nashik', NULL, NULL),
(25, 'Faridabad', NULL, NULL),
(26, 'Meerut', NULL, NULL),
(27, 'Rajkot', NULL, NULL),
(28, 'Kalyan-Dombivli', NULL, NULL),
(29, 'Vasai-Virar', NULL, NULL),
(30, 'Varanasi', NULL, NULL),
(31, 'Srinagar', NULL, NULL),
(32, 'Aurangabad', NULL, NULL),
(33, 'Dhanbad', NULL, NULL),
(34, 'Amritsar', NULL, NULL),
(35, 'Navi Mumbai', NULL, NULL),
(36, 'Allahabad', NULL, NULL),
(37, 'Ranchi', NULL, NULL),
(38, 'Howrah', NULL, NULL),
(39, 'Coimbatore', NULL, NULL),
(40, 'Jabalpur', NULL, NULL),
(41, 'Gwalior', NULL, NULL),
(42, 'Vijayawada', NULL, NULL),
(43, 'Jodhpur', NULL, NULL),
(44, 'Madurai', NULL, NULL),
(45, 'Raipur', NULL, NULL),
(46, 'Kota', NULL, NULL),
(47, 'Guwahati', NULL, NULL),
(48, 'Chandigarh', NULL, NULL),
(49, 'Solapur', NULL, NULL),
(50, 'Hubballi-Dharwad', NULL, NULL),
(51, 'Tiruchirappalli', NULL, NULL),
(52, 'Bareilly', NULL, NULL),
(53, 'Mysore', NULL, NULL),
(54, 'Tiruppur', NULL, NULL),
(55, 'Gurgaon', NULL, NULL),
(56, 'Aligarh', NULL, NULL),
(57, 'Jalandhar', NULL, NULL),
(58, 'Bhubaneswar', NULL, NULL),
(59, 'Salem', NULL, NULL),
(60, 'Mira-Bhayandar', NULL, NULL),
(61, 'Warangal', NULL, NULL),
(62, 'Thiruvananthapuram', NULL, NULL),
(63, 'Guntur', NULL, NULL),
(64, 'Bhiwandi', NULL, NULL),
(65, 'Saharanpur', NULL, NULL),
(66, 'Gorakhpur', NULL, NULL),
(67, 'Bikaner', NULL, NULL),
(68, 'Amravati', NULL, NULL),
(69, 'Noida', NULL, NULL),
(70, 'Jamshedpur', NULL, NULL),
(71, 'Bhilai', NULL, NULL),
(72, 'Cuttack', NULL, NULL),
(73, 'Firozabad', NULL, NULL),
(74, 'Kochi', NULL, NULL),
(75, 'Bhavnagar', NULL, NULL),
(76, 'Dehradun', NULL, NULL),
(77, 'Durgapur', NULL, NULL),
(78, 'Asansol', NULL, NULL),
(79, 'Nanded', NULL, NULL),
(80, 'Kolhapur', NULL, NULL),
(81, 'Ajmer', NULL, NULL),
(82, 'Gulbarga', NULL, NULL),
(83, 'Jamnagar', NULL, NULL),
(84, 'Ujjain', NULL, NULL),
(85, 'Loni', NULL, NULL),
(86, 'Siliguri', NULL, NULL),
(87, 'Jhansi', NULL, NULL),
(88, 'Ulhasnagar', NULL, NULL),
(89, 'Jammu', NULL, NULL),
(90, 'Sangli-Miraj & Kupwad', NULL, NULL),
(91, 'Mangalore', NULL, NULL),
(92, 'Erode', NULL, NULL),
(93, 'Belgaum', NULL, NULL),
(94, 'Ambattur', NULL, NULL),
(95, 'Tirunelveli', NULL, NULL),
(96, 'Malegaon', NULL, NULL),
(97, 'Gaya', NULL, NULL),
(98, 'Udaipur', NULL, NULL),
(99, 'Maheshtala', NULL, NULL),
(100, 'Davanagere', NULL, NULL),
(101, 'Kozhikode', NULL, NULL),
(102, 'Akola', NULL, NULL),
(103, 'Kurnool', NULL, NULL),
(104, 'Rajpur Sonarpur', NULL, NULL),
(105, 'Bokaro Steel City', NULL, NULL),
(106, 'South Dumdum', NULL, NULL),
(107, 'Bellary', NULL, NULL),
(108, 'Patiala', NULL, NULL),
(109, 'Gopalpur', NULL, NULL),
(110, 'Agartala', NULL, NULL),
(111, 'Bhagalpur', NULL, NULL),
(112, 'Muzaffarnagar', NULL, NULL),
(113, 'Bhatpara', NULL, NULL),
(114, 'Panihati', NULL, NULL),
(115, 'Latur', NULL, NULL),
(116, 'Dhule', NULL, NULL),
(117, 'Rohtak', NULL, NULL),
(118, 'Korba', NULL, NULL),
(119, 'Bhilwara', NULL, NULL),
(120, 'Brahmapur', NULL, NULL),
(121, 'Muzaffarpur', NULL, NULL),
(122, 'Ahmednagar', NULL, NULL),
(123, 'Mathura', NULL, NULL),
(124, 'Kollam', NULL, NULL),
(125, 'Avadi', NULL, NULL),
(126, 'Kadapa', NULL, NULL),
(127, 'Kamarhati', NULL, NULL),
(128, 'Bilaspur', NULL, NULL),
(129, 'Shahjahanpur', NULL, NULL),
(130, 'Satara', NULL, NULL),
(131, 'Bijapur', NULL, NULL),
(132, 'Rampur', NULL, NULL),
(133, 'Shimoga', NULL, NULL),
(134, 'Chandrapur', NULL, NULL),
(135, 'Junagadh', NULL, NULL),
(136, 'Thrissur', NULL, NULL),
(137, 'Alwar', NULL, NULL),
(138, 'Bardhaman', NULL, NULL),
(139, 'Kulti', NULL, NULL),
(140, 'Kakinada', NULL, NULL),
(141, 'Nizamabad', NULL, NULL),
(142, 'Parbhani', NULL, NULL),
(143, 'Tumkur', NULL, NULL),
(144, 'Hisar', NULL, NULL),
(145, 'Ozhukarai', NULL, NULL),
(146, 'Bihar Sharif', NULL, NULL),
(147, 'Panipat', NULL, NULL),
(148, 'Darbhanga', NULL, NULL),
(149, 'Bally', NULL, NULL),
(150, 'Aizawl', NULL, NULL),
(151, 'Dewas', NULL, NULL),
(152, 'Ichalkaranji', NULL, NULL),
(153, 'Tirupati', NULL, NULL),
(154, 'Karnal', NULL, NULL),
(155, 'Bathinda', NULL, NULL),
(156, 'Jalna', NULL, NULL),
(157, 'Eluru', NULL, NULL),
(158, 'Barasat', NULL, NULL),
(159, 'Purnia', NULL, NULL),
(160, 'Satna', NULL, NULL),
(161, 'Mau', NULL, NULL),
(162, 'Sonipat', NULL, NULL),
(163, 'Farrukhabad', NULL, NULL),
(164, 'Sagar', NULL, NULL),
(165, 'Rourkela', NULL, NULL),
(166, 'Durg', NULL, NULL),
(167, 'Imphal', NULL, NULL),
(168, 'Ratlam', NULL, NULL),
(169, 'Hapur', NULL, NULL),
(170, 'Arrah', NULL, NULL),
(171, 'Karimnagar', NULL, NULL),
(172, 'Anantapur', NULL, NULL),
(173, 'Etawah', NULL, NULL),
(174, 'Ambernath', NULL, NULL),
(175, 'North Dumdum', NULL, NULL),
(176, 'Bharatpur', NULL, NULL),
(177, 'Begusarai', NULL, NULL),
(178, 'New Delhi', NULL, NULL),
(179, 'Chhapra', NULL, NULL),
(180, 'Kadapa', NULL, NULL),
(181, 'Ramagundam', NULL, NULL),
(182, 'Puducherry', NULL, NULL),
(183, 'Hardoi', NULL, NULL),
(184, 'Shivamogga', NULL, NULL),
(185, 'Nagaon', NULL, NULL),
(186, 'Bilaspur', NULL, NULL),
(187, 'Hapur', NULL, NULL),
(188, 'Ranipet', NULL, NULL),
(189, 'Daman', NULL, NULL),
(190, 'Aizawl', NULL, NULL),
(191, 'Kohima', NULL, NULL),
(192, 'Silchar', NULL, NULL),
(193, 'Shillong', NULL, NULL),
(194, 'Gangtok', NULL, NULL),
(195, 'Agartala', NULL, NULL),
(196, 'Port Blair', NULL, NULL),
(197, 'Panaji', NULL, NULL),
(198, 'Itanagar', NULL, NULL),
(199, 'Imphal', NULL, NULL),
(200, 'Dispur', NULL, NULL),
(201, 'Kavaratti', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `firm_id` bigint(20) UNSIGNED NOT NULL,
  `party_id` bigint(20) NOT NULL,
  `year_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `complaint_type_id` bigint(20) UNSIGNED NOT NULL,
  `sales_entry_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `engineer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `engineer_assign_date` date DEFAULT NULL,
  `engineer_assign_time` time DEFAULT NULL,
  `engineer_complaint_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jointengg` varchar(15) DEFAULT NULL,
  `service_type_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `complaint_no` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `engineer_in_time` time DEFAULT NULL,
  `engineer_out_time` time DEFAULT NULL,
  `engineer_in_date` date DEFAULT NULL,
  `engineer_out_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `firm_id`, `party_id`, `year_id`, `date`, `time`, `complaint_type_id`, `sales_entry_id`, `product_id`, `remarks`, `image`, `engineer_id`, `engineer_assign_date`, `engineer_assign_time`, `engineer_complaint_id`, `jointengg`, `service_type_id`, `status_id`, `complaint_no`, `created_at`, `updated_at`, `engineer_in_time`, `engineer_out_time`, `engineer_in_date`, `engineer_out_date`) VALUES
(2, 1, 1, 4, 1, '2024-07-05', '08:00:00', 2, 2, 3, 'dffd', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, NULL, '2024-07-05 02:31:43', '2024-07-05 02:31:43', NULL, NULL, NULL, NULL),
(3, 1, 1, 4, 1, '2024-07-05', '08:02:00', 2, 2, 3, 'dffd', NULL, 2, NULL, NULL, 2, NULL, 2, 2, NULL, '2024-07-05 03:18:42', '2024-07-05 03:26:38', NULL, NULL, NULL, NULL),
(5, 1, 1, 4, 1, '2024-07-05', '08:02:00', 2, 2, 3, 'dffd', NULL, 2, NULL, NULL, 2, NULL, 2, 2, NULL, '2024-07-05 03:23:33', '2024-07-05 03:23:33', NULL, NULL, NULL, NULL),
(15, 1, 1, 4, 1, '2024-07-08', '10:55:00', 3, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, '15112023', '2024-07-08 05:26:46', '2024-07-08 05:50:33', NULL, NULL, NULL, NULL),
(16, 1, 1, 4, 1, '2024-07-08', '11:05:00', 3, 6, 4, 'ghg', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, '16112023', '2024-07-08 05:35:20', '2024-07-08 05:35:20', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaint_service_parts_details`
--

CREATE TABLE `complaint_service_parts_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complaint_id` bigint(20) UNSIGNED NOT NULL,
  `part_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `is_urgent` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_types`
--

CREATE TABLE `complaint_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaint_types`
--

INSERT INTO `complaint_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'auto last + 1', 'Complaint1 desc', NULL, NULL),
(2, 'Firm Complaint', 'Complaint2 desc', NULL, NULL),
(3, 'auto last + 2', 'Complaint3 desc', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_persons`
--

CREATE TABLE `contact_persons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_persons`
--

INSERT INTO `contact_persons` (`id`, `name`, `phone_no`, `created_at`, `updated_at`) VALUES
(2, 'om satya person1', '1234567890', NULL, NULL),
(3, 'om satya person2', '1234567890', NULL, NULL),
(4, 'om satya person3', '1234567890', NULL, NULL),
(5, 'om satya person4', '1234567890', NULL, NULL),
(6, 'om satya person5', '1234567890', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `engineers`
--

CREATE TABLE `engineers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `engineers`
--

INSERT INTO `engineers` (`id`, `name`, `phone_no`, `area_id`, `created_at`, `updated_at`) VALUES
(1, 'Engineer1', '1234567890', 1, NULL, NULL),
(2, 'Engineer2', '1234567890', 2, NULL, NULL),
(3, 'Engineer3', '1234567890', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `firms`
--

CREATE TABLE `firms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sh_code` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `gst_no` varchar(25) NOT NULL,
  `pan_no` varchar(25) NOT NULL,
  `reg_no` varchar(25) NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `bank_account_no` varchar(255) DEFAULT NULL,
  `bank_ifsc_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `firms`
--

INSERT INTO `firms` (`id`, `name`, `sh_code`, `address`, `city_id`, `state_id`, `pincode`, `phone_no`, `gst_no`, `pan_no`, `reg_no`, `bank_name`, `branch_name`, `bank_account_no`, `bank_ifsc_code`, `created_at`, `updated_at`) VALUES
(1, 'om satya enterprise', 'ome', 'G-18 To G-20, A.P.M.C. Market, Krushi Bazar, Sahara Darwaja, Surat', 8, 11, '395002', 2612532507, 'eddfsdtff4w34rsdwe3', 'gfeswtc4s', 'sdrf5sdfsdvf', 'HDFC Bank', 'udhana', '0201457520022', 'WERFW745045', '2024-07-01 05:34:36', '2024-07-01 05:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `item_parts`
--

CREATE TABLE `item_parts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_group_id` bigint(20) UNSIGNED NOT NULL,
  `tag` int(11) NOT NULL DEFAULT 2,
  `hsn_code` varchar(8) NOT NULL,
  `gst` float NOT NULL,
  `rate` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_parts`
--

INSERT INTO `item_parts` (`id`, `name`, `product_group_id`, `tag`, `hsn_code`, `gst`, `rate`, `created_at`, `updated_at`) VALUES
(1, 'Item Part 1', 1, 2, '78', 789456000, 100, NULL, NULL),
(2, 'Item Part 2', 1, 2, '78', 789456000, 100, NULL, NULL),
(3, 'Item Part 3', 1, 2, '78', 789456000, 100, NULL, NULL),
(4, 'Item Part 4', 1, 2, '78', 789456000, 100, NULL, NULL),
(5, 'Item Part 5', 1, 2, '78', 789456000, 100, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `machine_sales_entries`
--

CREATE TABLE `machine_sales_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firm_id` bigint(20) UNSIGNED NOT NULL,
  `year_id` bigint(20) UNSIGNED NOT NULL,
  `bill_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `party_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `serial_no` varchar(25) DEFAULT NULL,
  `mc_no` varchar(25) NOT NULL,
  `install_date` date NOT NULL,
  `service_expiry_date` date NOT NULL,
  `free_service` tinyint(1) NOT NULL DEFAULT 0,
  `order_no` varchar(25) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `service_type_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `map_url` varchar(255) DEFAULT NULL,
  `tag` int(11) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `mic_fitting_engineer_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_engineer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machine_sales_entries`
--

INSERT INTO `machine_sales_entries` (`id`, `firm_id`, `year_id`, `bill_no`, `date`, `party_id`, `product_id`, `serial_no`, `mc_no`, `install_date`, `service_expiry_date`, `free_service`, `order_no`, `remarks`, `service_type_id`, `image`, `lat`, `long`, `map_url`, `tag`, `is_active`, `mic_fitting_engineer_id`, `delivery_engineer_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 78574, '1998-04-20', 3, 1, NULL, 'Sit esse pariatur', '1987-10-28', '1996-05-25', 2, 'Et voluptas commodo', NULL, 3, NULL, NULL, NULL, 'Galvin Christensen', 1, 1, 2, 2, '2024-07-03 03:17:15', '2024-07-03 05:39:42'),
(3, 1, 1, 122, '2024-07-02', 1, 2, NULL, '112', '2024-07-03', '2024-07-19', 1, '2', NULL, 1, '1720421193.png', NULL, NULL, 'https://www.google.com/maps/place/KRIBHCO+AREA+OFFICE+SURAT/@21.1762209,72.722328,15z/data=!4m6!3m5!1s0x3be1b376ddf63885:0xa9da97df6403e8b2!8m2!3d21.1738272!4d72.708836!16s%2Fg%2F11fwsjvvkr?authuser=0&entry=ttu', 1, 1, 2, 3, '2024-07-08 01:16:33', '2024-07-08 01:16:33'),
(4, 1, 1, 121, '2024-07-01', 3, 4, 'w323232324e vr3r343', '21', '2024-07-05', '2025-06-11', 2, '11', 'xdsxcdsx', 1, '1720422219.png', NULL, NULL, 'https://yajrabox.com/docs/laravel-datatables/master/add-column', 1, 1, 1, 1, '2024-07-08 01:33:39', '2024-07-08 01:33:39'),
(5, 1, 1, 2323, '2024-07-01', 4, 2, 'w323232324e vr3r343q23', '232', '2024-07-03', '2025-07-03', 2, '12', 'xdsxcdsx', 1, '1720431137.png', NULL, NULL, 'https://www.google.com/maps/place/KRIBHCO+AREA+OFFICE+SURAT/@21.1762209,72.722328,15z/data=!4m6!3m5!1s0x3be1b376ddf63885:0xa9da97df6403e8b2!8m2!3d21.1738272!4d72.708836!16s%2Fg%2F11fwsjvvkr?authuser=0&entry=ttu', 1, 1, 1, 1, '2024-07-08 04:02:17', '2024-07-08 04:02:17'),
(6, 1, 1, 233, '2024-06-03', 4, 4, '12122', '2121', '2024-07-08', '2025-06-08', 1, '11', 'sdsa', 2, '1720431185.png', NULL, NULL, 'https://www.google.com/maps/place/KRIBHCO+AREA+OFFICE+SURAT/@21.1762209,72.722328,15z/data=!4m6!3m5!1s0x3be1b376ddf63885:0xa9da97df6403e8b2!8m2!3d21.1738272!4d72.708836!16s%2Fg%2F11fwsjvvkr?authuser=0&entry=ttu', 1, 1, 2, 3, '2024-07-08 04:03:05', '2024-07-08 04:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_28_095303_create_states_table', 1),
(5, '2024_06_28_101738_create_cities_table', 1),
(6, '2024_06_28_101811_create_firms_table', 1),
(7, '2024_06_28_102135_create_areas_table', 1),
(8, '2024_06_28_102234_create_owners_table', 1),
(9, '2024_06_28_102342_create_contact_people_table', 1),
(10, '2024_06_28_102545_create_engineers_table', 1),
(11, '2024_06_28_102557_create_years_table', 1),
(13, '2024_06_28_103157_create_product_groups_table', 1),
(14, '2024_06_28_103244_create_products_table', 1),
(15, '2024_06_28_105839_create_item_parts_table', 1),
(16, '2024_06_28_110109_create_complaint_types_table', 1),
(17, '2024_06_28_110153_create_statuses_table', 1),
(18, '2024_06_28_110232_create_service_types_table', 1),
(19, '2024_06_28_110343_create_machine_sales_entries_table', 1),
(20, '2024_06_28_114740_create_complaints_table', 1),
(21, '2024_06_28_115337_create_complaint_service_parts_details_table', 1),
(23, '2024_06_28_102916_create_parties_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `name`, `phone_no`, `created_at`, `updated_at`) VALUES
(1, 'owner1', '1234567890', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

CREATE TABLE `parties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `pan_no` varchar(191) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) NOT NULL,
  `other_phone_no` varchar(500) DEFAULT NULL,
  `gst_no` varchar(255) NOT NULL,
  `contact_person_id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `firm_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `name`, `email`, `pan_no`, `address`, `city_id`, `state_id`, `pincode`, `phone_no`, `other_phone_no`, `gst_no`, `contact_person_id`, `owner_id`, `area_id`, `firm_id`, `created_at`, `updated_at`) VALUES
(1, 'asdas', NULL, NULL, 'sfdesfdsfsd', 5, 5, '232322', '7878787878', NULL, '245541452211ws1', 4, 1, 4, 1, '2024-07-05 06:31:23', '2024-07-05 06:31:23'),
(2, 'iss', 'saxix79599@luravel.com', '324dsd34ww', 'sd,m wasdk, 99430', 19, 18, NULL, '7878787878', NULL, '7845541452211ws', 3, 1, 2, 1, '2024-07-07 23:58:39', '2024-07-07 23:58:39'),
(3, 'party 1', 'part@email.com', '112ws12123', 'sfd  , surat 399099', 3, 2, NULL, '7878787878', '212121212,5344543545', '7845541452211ws', 3, 1, 6, 1, '2024-07-08 00:33:36', '2024-07-08 06:32:02'),
(4, 'add on webtech', 'addonwebtech@gmail.com', 'eee2322222', '206 pal 39005', 2, 3, NULL, '7878787878', NULL, '7845541452211ws', 4, 1, 3, 1, '2024-07-08 04:00:24', '2024-07-08 04:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_group_id` bigint(20) UNSIGNED NOT NULL,
  `tag` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `product_group_id`, `tag`, `created_at`, `updated_at`) VALUES
(1, 'Product 1', 1, 1, NULL, NULL),
(2, 'Product 2', 1, 1, NULL, NULL),
(3, 'Product 3', 2, 1, NULL, NULL),
(4, 'Product 4', 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_groups`
--

CREATE TABLE `product_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_groups`
--

INSERT INTO `product_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Product Group 1', NULL, NULL),
(2, 'Product Group 2', NULL, NULL),
(3, 'Product Group 3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'paid', NULL, NULL),
(2, 'free', NULL, NULL),
(3, 'custom', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('uENhf6E3jZAXpihmHcV8lQQXXqEBHaRf93zvN06G', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo3OntzOjc6ImZpcm1faWQiO2k6MTtzOjY6Il90b2tlbiI7czo0MDoiMlRXVTRkbm1rSXRWOXd6R3hGVjRUOVJnZE1SVUxhTjg4T0tCaVIxOCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL01hY2hpbmVTYWxlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1720440456);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Andaman and Nicobar Islands', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(2, 'Andhra Pradesh', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(3, 'Arunachal Pradesh', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(4, 'Assam', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(5, 'Bihar', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(6, 'Chandigarh', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(7, 'Chhattisgarh', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(8, 'Dadra and Nagar Haveli and Daman and Diu', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(9, 'Delhi', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(10, 'Goa', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(11, 'Gujarat', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(12, 'Haryana', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(13, 'Himachal Pradesh', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(14, 'Jammu and Kashmir', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(15, 'Jharkhand', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(16, 'Karnataka', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(17, 'Kerala', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(18, 'Ladakh', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(19, 'Lakshadweep', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(20, 'Madhya Pradesh', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(21, 'Maharashtra', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(22, 'Manipur', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(23, 'Meghalaya', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(24, 'Mizoram', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(25, 'Nagaland', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(26, 'Odisha', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(27, 'Puducherry', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(28, 'Punjab', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(29, 'Rajasthan', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(31, 'Sikkim', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(32, 'Tamil Nadu', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(33, 'Telangana', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(34, 'Tripura', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(35, 'Uttar Pradesh', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(36, 'Uttarakhand', '2024-07-01 05:17:43', '2024-07-01 05:17:43'),
(37, 'West Bengal', '2024-07-01 05:17:43', '2024-07-01 05:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'pending', NULL, NULL),
(2, 'In Progress', NULL, NULL),
(3, 'Closed', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin 1', 'admin@mail.com', NULL, '$2y$12$QvxsB6zbeOV1J3B8aMNnD.KWgaP1BR6BYVta5uAvqsEGyJ1EErxlK', NULL, '2024-07-01 02:36:53', '2024-07-04 01:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `name`, `from_date`, `to_date`, `created_at`, `updated_at`) VALUES
(1, '2023', '2023-01-01', '2023-12-31', NULL, NULL),
(2, '2022', '2022-01-01', '2022-12-31', NULL, NULL),
(3, '2021', '2021-01-01', '2021-12-31', NULL, NULL),
(4, '2020', '2020-01-01', '2020-12-31', NULL, NULL),
(5, '2019', '2019-01-01', '2019-12-31', NULL, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaints_user_id_foreign` (`user_id`),
  ADD KEY `complaints_firm_id_foreign` (`firm_id`),
  ADD KEY `complaints_year_id_foreign` (`year_id`),
  ADD KEY `complaints_complaint_type_id_foreign` (`complaint_type_id`),
  ADD KEY `complaints_sales_entry_id_foreign` (`sales_entry_id`),
  ADD KEY `complaints_product_id_foreign` (`product_id`),
  ADD KEY `complaints_engineer_id_foreign` (`engineer_id`),
  ADD KEY `complaints_engineer_complaint_id_foreign` (`engineer_complaint_id`),
  ADD KEY `complaints_service_type_id_foreign` (`service_type_id`),
  ADD KEY `complaints_status_id_foreign` (`status_id`);

--
-- Indexes for table `complaint_service_parts_details`
--
ALTER TABLE `complaint_service_parts_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaint_service_parts_details_complaint_id_foreign` (`complaint_id`),
  ADD KEY `complaint_service_parts_details_part_id_foreign` (`part_id`);

--
-- Indexes for table `complaint_types`
--
ALTER TABLE `complaint_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_persons`
--
ALTER TABLE `contact_persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `engineers`
--
ALTER TABLE `engineers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `firms`
--
ALTER TABLE `firms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firms_city_id_foreign` (`city_id`),
  ADD KEY `firms_state_id_foreign` (`state_id`);

--
-- Indexes for table `item_parts`
--
ALTER TABLE `item_parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_parts_product_group_id_foreign` (`product_group_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machine_sales_entries`
--
ALTER TABLE `machine_sales_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `machine_sales_entries_firm_id_foreign` (`firm_id`),
  ADD KEY `machine_sales_entries_year_id_foreign` (`year_id`),
  ADD KEY `machine_sales_entries_product_id_foreign` (`product_id`),
  ADD KEY `machine_sales_entries_service_type_id_foreign` (`service_type_id`),
  ADD KEY `machine_sales_entries_mic_fitting_engineer_id_foreign` (`mic_fitting_engineer_id`),
  ADD KEY `machine_sales_entries_delivery_engineer_id_foreign` (`delivery_engineer_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parties_city_id_foreign` (`city_id`),
  ADD KEY `parties_state_id_foreign` (`state_id`),
  ADD KEY `parties_firm_id_foreign` (`firm_id`),
  ADD KEY `parties_owner_id_foreign` (`owner_id`),
  ADD KEY `parties_area_id_foreign` (`area_id`),
  ADD KEY `parties_contact_person_id_foreign` (`contact_person_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_groups`
--
ALTER TABLE `product_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `complaint_service_parts_details`
--
ALTER TABLE `complaint_service_parts_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint_types`
--
ALTER TABLE `complaint_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_persons`
--
ALTER TABLE `contact_persons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `engineers`
--
ALTER TABLE `engineers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `firms`
--
ALTER TABLE `firms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_parts`
--
ALTER TABLE `item_parts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `machine_sales_entries`
--
ALTER TABLE `machine_sales_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_groups`
--
ALTER TABLE `product_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_complaint_type_id_foreign` FOREIGN KEY (`complaint_type_id`) REFERENCES `complaint_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complaints_engineer_complaint_id_foreign` FOREIGN KEY (`engineer_complaint_id`) REFERENCES `engineers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complaints_engineer_id_foreign` FOREIGN KEY (`engineer_id`) REFERENCES `engineers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `complaints_firm_id_foreign` FOREIGN KEY (`firm_id`) REFERENCES `firms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complaints_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complaints_sales_entry_id_foreign` FOREIGN KEY (`sales_entry_id`) REFERENCES `machine_sales_entries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complaints_service_type_id_foreign` FOREIGN KEY (`service_type_id`) REFERENCES `service_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complaints_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complaints_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `complaints_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `complaint_service_parts_details`
--
ALTER TABLE `complaint_service_parts_details`
  ADD CONSTRAINT `complaint_service_parts_details_complaint_id_foreign` FOREIGN KEY (`complaint_id`) REFERENCES `complaints` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complaint_service_parts_details_part_id_foreign` FOREIGN KEY (`part_id`) REFERENCES `item_parts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `firms`
--
ALTER TABLE `firms`
  ADD CONSTRAINT `firms_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `firms_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `item_parts`
--
ALTER TABLE `item_parts`
  ADD CONSTRAINT `item_parts_product_group_id_foreign` FOREIGN KEY (`product_group_id`) REFERENCES `product_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `machine_sales_entries`
--
ALTER TABLE `machine_sales_entries`
  ADD CONSTRAINT `machine_sales_entries_delivery_engineer_id_foreign` FOREIGN KEY (`delivery_engineer_id`) REFERENCES `engineers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `machine_sales_entries_firm_id_foreign` FOREIGN KEY (`firm_id`) REFERENCES `firms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `machine_sales_entries_mic_fitting_engineer_id_foreign` FOREIGN KEY (`mic_fitting_engineer_id`) REFERENCES `engineers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `machine_sales_entries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `machine_sales_entries_service_type_id_foreign` FOREIGN KEY (`service_type_id`) REFERENCES `service_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `machine_sales_entries_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parties`
--
ALTER TABLE `parties`
  ADD CONSTRAINT `parties_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parties_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parties_contact_person_id_foreign` FOREIGN KEY (`contact_person_id`) REFERENCES `contact_persons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parties_firm_id_foreign` FOREIGN KEY (`firm_id`) REFERENCES `firms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parties_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parties_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
