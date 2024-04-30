-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2024 at 03:06 AM
-- Server version: 10.6.16-MariaDB-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devWebclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutUs`
--

CREATE TABLE `aboutUs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subTitle` longtext DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `videoFile` varchar(200) DEFAULT NULL,
  `imageUpload` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aboutUs`
--

INSERT INTO `aboutUs` (`id`, `title`, `subTitle`, `video_url`, `videoFile`, `imageUpload`, `created_at`, `updated_at`) VALUES
(1, 'Qastarat Clinics', 'A leading network of integrated Interventional Radiology (IR) clinics, highly\r\n                            specialized in image-guided minimally to completely non-invasive therapies. Over 8,500\r\n                            consultations, and an average of 11,000 diagnostic and interventional procedures are conducted\r\n                            annually. All treatments offered to our patients are evidence based, patient centered, and\r\n                            service oriented being delivered according to best practice guidelines and standards using\r\n                            cutting edge technologies', 'https://www.youtube.com/embed/iuLKi84W4F0?si=fDkcliYZEo87X6dR', '666016757.mp4', '1133840979.png', '2024-04-04 10:57:41', '2024-01-02 18:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `accountants`
--

CREATE TABLE `accountants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nurses_id` varchar(100) DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_verified` enum('1','0') DEFAULT '0',
  `patient_profile_img` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `post_code` bigint(20) DEFAULT NULL,
  `mobile_no` bigint(20) DEFAULT NULL,
  `sirname` varchar(12) DEFAULT NULL,
  `birth_date` varchar(255) DEFAULT NULL,
  `gendar` enum('male','female','other') DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `landline` varchar(50) DEFAULT NULL,
  `specialty` varchar(150) DEFAULT NULL,
  `qualifications` longtext DEFAULT NULL,
  `experience` varchar(150) DEFAULT NULL,
  `working_hours` varchar(150) DEFAULT NULL,
  `languages_spoken` varchar(150) DEFAULT NULL,
  `lincense_no` varchar(150) DEFAULT NULL,
  `document_type` varchar(100) DEFAULT NULL,
  `patient_id` varchar(255) DEFAULT NULL,
  `gp` varchar(255) DEFAULT NULL,
  `kin` varchar(255) DEFAULT NULL,
  `policy_no` varchar(255) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accountants`
--

INSERT INTO `accountants` (`id`, `nurses_id`, `title`, `name`, `email`, `is_verified`, `patient_profile_img`, `role`, `email_verified_at`, `remember_token`, `post_code`, `mobile_no`, `sirname`, `birth_date`, `gendar`, `street`, `town`, `country`, `landline`, `specialty`, `qualifications`, `experience`, `working_hours`, `languages_spoken`, `lincense_no`, `document_type`, `patient_id`, `gp`, `kin`, `policy_no`, `additional_info`, `tags`, `password`, `created_at`, `updated_at`) VALUES
(1, 'AI42122', 'Ms', '1234', '1234@gmail.com', '0', NULL, 'user', NULL, NULL, 1234, 7245454567, NULL, NULL, NULL, '1234', '1234', 'TF', '1234', '1234', '1234', '1234', '1234', '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 17:37:17', '2024-01-15 17:37:17'),
(2, 'AI41342', 'Dr', 'Manish 123', 'admin@gmail.com', '0', NULL, 'user', NULL, NULL, 431343, 9898987656, NULL, '01/31/2024', 'male', '431343', 'noida', 'India', '11', '123', '123', '123', '123', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 17:47:56', '2024-01-16 17:34:41'),
(4, 'AI67535', 'Mr', 'manish d', 'admin22@gmail.com', '0', NULL, 'user', NULL, NULL, 251201, NULL, NULL, '01/31/2024', 'male', 'muzaffarnagar', 'noida', 'India', '123456432', '12345432', '124', '1', '123', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-16 17:10:48', '2024-01-16 17:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
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
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2023-12-20 23:12:22', '$2y$12$LPKjNTzh1VJHMgkRGRjQ3u9HRXi6nzuyzc0DVPDMUq44SfURLaTY2', NULL, '2023-12-20 23:12:22', '2023-12-20 23:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `allexpenses`
--

CREATE TABLE `allexpenses` (
  `id` int(11) NOT NULL,
  `expense_type` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `allexpenses`
--

INSERT INTO `allexpenses` (`id`, `expense_type`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'T3, T4 Test Machine', '599.00', 'active', '2024-01-19 09:54:40', '2024-01-19 09:54:40'),
(2, 'TSH Test Machine', '1599.00', 'active', '2024-01-24 11:18:49', '2024-01-24 11:18:49'),
(3, 'Bottles jar', '1299.00', 'active', '2024-02-20 12:38:09', '2024-02-20 12:38:09'),
(4, 'Health Checkup Machine', '699.00', 'active', '2024-02-28 12:48:33', '2024-02-28 12:48:33'),
(5, 'Eye Machine', '2099.00', 'active', '2024-04-04 11:34:04', '2024-04-04 11:34:04'),
(6, 'Radiology Machine', '4099.00', 'active', '2024-04-04 11:34:27', '2024-04-04 11:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `book_appointments`
--

CREATE TABLE `book_appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(255) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(255) DEFAULT NULL,
  `clinician_id` bigint(20) UNSIGNED DEFAULT NULL,
  `confirmation` enum('yes','no') NOT NULL DEFAULT 'no',
  `start_date` varchar(255) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `appointment_type` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` enum('0','1','','') DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_appointments`
--

INSERT INTO `book_appointments` (`id`, `patient_id`, `doctor_id`, `clinician_id`, `confirmation`, `start_date`, `start_time`, `end_date`, `priority`, `cost`, `code`, `end_time`, `appointment_type`, `location`, `status`, `created_at`, `updated_at`) VALUES
(7, 109, NULL, NULL, 'yes', '2024-03-01', NULL, '2024-04-02', 'bg-danger', '12', NULL, NULL, 'Back pain', NULL, '0', '2024-03-30 19:56:46', '2024-04-02 20:22:11'),
(8, 109, NULL, NULL, 'no', '2024-03-12', '12:00 AM', NULL, 'bg-danger', '12', NULL, '12:03 AM', 'Eyes problem', 'QASTARAT & DAWALI CLINICS', '0', '2024-03-30 19:57:30', '2024-04-02 20:20:31'),
(9, 109, NULL, 144, 'yes', '2024-03-07', NULL, NULL, 'bg-success', '12', '22121', NULL, 'Est aute consequatur', NULL, '1', '2024-03-30 19:58:11', '2024-03-30 20:17:39'),
(10, 2, NULL, NULL, 'yes', '2024-03-08', '12:06 AM', '2024-03-16', 'bg-success', '1', NULL, '12:01 AM', 'Est aute consequatur', 'DUBAI', '0', '2024-03-30 20:19:34', '2024-03-30 20:19:34'),
(11, 143, NULL, 144, 'yes', '2024-03-25', '12:02 AM', '2024-03-25', 'bg-success', '12', '12', '12:09 AM', 'Blanditiis et ex arc', 'CLINIC', '0', '2024-03-30 20:21:31', '2024-03-30 20:21:31'),
(12, 107, NULL, 142, 'yes', '2024-03-05', NULL, NULL, 'bg-danger', '12', '23', NULL, 'Eyes problem', 'DUBAI', '0', '2024-03-30 20:35:01', '2024-04-02 20:19:53'),
(13, 76, 2, 113, 'yes', NULL, 'Eveniet ut aut corp', '11-May-1992', 'bg-danger', 'Aliqua Commodo volu', 'Ut nemo repudiandae', 'Id quia aute nostrum', 'Distinctio Non natu', 'QASTARAT & DAWALI CLINICS', '0', '2024-03-30 20:49:17', '2024-03-30 20:49:17'),
(16, 61, NULL, 12, 'no', '22-May-2022', 'Dolore omnis adipisc', '18-Feb-2004', 'bg-danger', 'Do lorem aliquid ali', 'Quas sed quam ipsam', 'Ut temporibus est ea', 'Officia quod soluta', 'DUBAI', '0', '2024-04-01 16:10:20', '2024-04-01 16:10:20'),
(17, 61, NULL, 12, 'no', '22-May-2022', 'Dolore omnis adipisc', '18-Feb-2004', 'bg-danger', 'Do lorem aliquid ali', 'Quas sed quam ipsam', 'Ut temporibus est ea', 'Officia quod soluta', 'DUBAI', '0', '2024-04-01 16:10:20', '2024-04-01 16:10:20'),
(18, 109, NULL, NULL, 'no', '2024-04-16', NULL, '2024-04-16', 'bg-success', NULL, NULL, '12:02 AM', 'Eyes problem', 'DUBAI', '0', '2024-04-01 16:10:36', '2024-04-01 16:10:36'),
(19, 109, NULL, NULL, 'no', '2024-04-12', NULL, '2024-04-12', 'bg-danger', NULL, NULL, NULL, 'Blanditiis et ex arc', 'DUBAI', '0', '2024-04-01 16:12:27', '2024-04-01 16:12:27'),
(20, 109, NULL, NULL, 'no', '2024-04-12', NULL, '2024-04-12', 'bg-danger', NULL, NULL, NULL, 'Blanditiis et ex arc', 'DUBAI', '0', '2024-04-01 16:12:28', '2024-04-01 16:12:28'),
(21, 110, NULL, 145, 'yes', '2024-04-28', '12:01 PM', '2024-04-28', 'bg-primary', '21', '12', '11:59 AM', 'Est aute consequatur', 'CLINIC', '0', '2024-04-01 20:33:26', '2024-04-01 20:33:26'),
(22, 110, NULL, 147, 'no', '2024-04-02', NULL, '2024-04-04', 'bg-danger', '12', '12', NULL, 'Eyes problem updated', 'QASTARAT & DAWALI CLINICS', '0', '2024-04-03 15:58:00', '2024-04-08 19:30:44'),
(23, 110, NULL, 146, 'no', '2024-04-06', NULL, NULL, 'bg-success', '1', '12', NULL, 'ASed', 'DUBAI', '0', '2024-04-03 16:01:24', '2024-04-03 16:02:52'),
(24, 110, NULL, 146, 'yes', '2024-04-08', '12:01 PM', '2024-04-08', 'bg-success', '12', '12', '12:02 PM', '2', 'CLINIC', '0', '2024-04-03 16:03:46', '2024-04-03 16:03:46'),
(28, NULL, NULL, 147, 'yes', '2024-04-15', '12:02 PM', '2024-04-15', 'bg-primary', '12', '12', '12:00 AM', 'Blanditiis et ex arc', 'DUBAI', '0', '2024-04-03 16:32:07', '2024-04-03 16:32:07'),
(29, 108, NULL, 146, 'yes', '2024-04-25', '12:01 AM', '2024-04-25', 'bg-danger', '12', 'Voluptatibus nisi et', '12:02 AM', 'Eyes problem', 'CLINIC', '0', '2024-04-03 16:37:16', '2024-04-03 16:37:16'),
(30, 108, NULL, 147, 'no', '2024-04-16', '12:00 AM', '2024-04-16', 'bg-success', '21', '23', '12:03 AM', 'Eyes problem', 'CLINIC', '0', '2024-04-03 16:37:48', '2024-04-03 16:37:48'),
(31, 112, NULL, 146, 'yes', '2024-04-04', '12:00 AM', '2024-04-05', 'bg-danger', '100', '9852', '12:30 AM', 'Blod Test', 'DUBAI', '0', '2024-04-03 18:56:54', '2024-04-03 18:56:54'),
(32, NULL, NULL, NULL, 'yes', '2024-04-04', '07:00 AM', '2024-04-05', 'bg-danger', '150', '6555', '12:00 AM', 'Blood Type', 'QASTARAT & DAWALI CLINICS', '0', '2024-04-03 19:27:36', '2024-04-03 19:27:36'),
(33, NULL, NULL, NULL, 'yes', '2024-04-05', '12:00 AM', NULL, 'bg-danger', '12', '98523', NULL, 'Blood Type', 'CLINIC', '0', '2024-04-03 19:35:19', '2024-04-03 19:35:19'),
(34, 112, NULL, 142, 'yes', '2024-04-05', '07:30 AM', '2024-04-06', 'bg-danger', '15', '8956', '12:01 AM', 'Blood Type', 'CLINIC', '0', '2024-04-03 19:36:35', '2024-04-03 19:36:35'),
(35, 111, NULL, NULL, 'no', '2024-04-27', '12:01 PM', '2024-04-27', 'bg-success', NULL, NULL, '12:02 PM', '12', 'DUBAI', '0', '2024-04-04 11:46:40', '2024-04-04 11:46:40'),
(36, 108, NULL, 146, 'no', '2024-04-06', '12:00 AM', '2024-04-07', 'bg-success', '12', '13', '12:01 AM', NULL, NULL, '0', '2024-04-04 11:48:40', '2024-04-04 11:48:40'),
(37, 108, NULL, 63, 'no', '2024-04-01', '12:02 AM', '2024-04-01', 'bg-success', '10', '11', '12:03 AM', 'Back pain', 'DUBAI', '0', '2024-04-04 11:50:06', '2024-04-04 11:50:06'),
(38, NULL, NULL, NULL, 'yes', '2024-04-05', NULL, '2024-04-07', 'bg-success', '12', '12', NULL, 'Back pain', 'CLINIC', '0', '2024-04-04 13:43:30', '2024-04-04 13:43:30'),
(39, NULL, NULL, NULL, 'yes', '2024-04-05', '12:00 AM', '2024-04-18', 'bg-success', '12', '21', '12:00 AM', 'Eyes problem', 'CLINIC', '0', '2024-04-04 14:32:27', '2024-04-04 14:32:27'),
(40, 86, NULL, 139, 'yes', '22-Dec-1995', 'Doloribus quasi temp', '13-Oct-2006', 'bg-primary', 'Fugiat qui consequa', 'Autem nesciunt blan', '12:02 AM', 'Consequatur quia ut', 'CLINIC', '0', '2024-04-08 12:51:59', '2024-04-08 12:51:59'),
(41, 103, NULL, 63, 'yes', '2024-04-08', 'Qui in odio ea aliqu', '2024-04-09', 'bg-danger', 'Qui deserunt et porr', 'Quas voluptatem Et', '12:03 AM', 'Aperiam velit corrup', 'QASTARAT & DAWALI CLINICS', '0', '2024-04-08 12:52:32', '2024-04-08 12:52:32'),
(42, 115, NULL, 147, 'yes', '2024-04-08', NULL, '2024-04-08', 'bg-danger', '200', 'co123', NULL, 'yadav', 'CLINIC', '0', '2024-04-08 13:10:37', '2024-04-08 13:10:37'),
(43, NULL, NULL, NULL, 'no', '2024-04-08', NULL, '2024-04-08', 'bg-success', NULL, NULL, NULL, 'yadav', 'DUBAI', '0', '2024-04-08 14:34:16', '2024-04-08 14:34:16'),
(44, 113, NULL, 147, 'yes', '08 Apr, 2024', '12:00 AM', '09 Apr, 2024', 'bg-success', 'Voluptates voluptatu', 'Eiusmod quisquam nih', '12:00 AM', 'Libero excepteur adi', NULL, '0', '2024-04-08 19:03:38', '2024-04-08 19:03:38'),
(45, 131, NULL, 146, 'yes', '08 Apr, 2024', '12:00 AM', '09 Apr, 2024', 'bg-danger', '200', 'co123', '12:00 AM', 'yadav', 'CLINIC', '0', '2024-04-08 19:16:37', '2024-04-08 19:16:37'),
(46, 4, NULL, 102, 'no', '19-Nov-2016', '12:00 AM', '12-Oct-1978', 'bg-danger', 'Excepturi odio aut e', 'Possimus nulla hic', '12:00 AM', 'Labore suscipit et o', 'QASTARAT & DAWALI CLINICS', '0', '2024-04-08 19:19:02', '2024-04-08 19:19:02'),
(47, 129, NULL, 149, 'yes', '2024-04-02', '12:00 AM', '2024-04-02', 'bg-primary', '200', 'co123', '12:00 AM', 'yadav', 'CLINIC', '0', '2024-04-08 19:21:35', '2024-04-08 19:21:35'),
(48, 131, NULL, 149, 'yes', '2024-04-08', '12:00 AM', '2024-04-08', 'bg-success', '200', 'co123', '12:00 AM', 'testing', 'CLINIC', '0', '2024-04-08 19:26:35', '2024-04-08 19:26:35'),
(49, 132, NULL, 149, 'yes', '2024-04-11', NULL, '2024-04-11', 'bg-danger', '200', 'co123', NULL, 'yadav', 'CLINIC', '0', '2024-04-09 12:09:16', '2024-04-09 12:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subTitle` longtext DEFAULT NULL,
  `imageUpload` varchar(200) DEFAULT NULL,
  `title1` varchar(255) DEFAULT NULL,
  `title1phonenumber` varchar(255) DEFAULT NULL,
  `title1tollfreenumber` varchar(255) DEFAULT NULL,
  `title2` varchar(255) DEFAULT NULL,
  `title2phonenumber` varchar(255) DEFAULT NULL,
  `title3` varchar(255) DEFAULT NULL,
  `title3email` varchar(255) DEFAULT NULL,
  `title4` varchar(255) DEFAULT NULL,
  `title4email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `title`, `subTitle`, `imageUpload`, `title1`, `title1phonenumber`, `title1tollfreenumber`, `title2`, `title2phonenumber`, `title3`, `title3email`, `title4`, `title4email`, `created_at`, `updated_at`) VALUES
(1, 'Our Branches', 'We are presence here...', '2046222869.png', 'Main Branch Muscat - OMAN', '96892000230', '96892000230', 'Worldwide Patients , Please contact us directly at', '971581114000', 'our nurse coordinator can be contacted at:', 'nurse@qastaratclinics.com', 'our clinic admin coordinator can be contacted at:', 'admin@qastaratclinics.com', '2024-04-04 12:51:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `branchs`
--

CREATE TABLE `branchs` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `phone_no` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `status` enum('0','1','','') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branchs`
--

INSERT INTO `branchs` (`id`, `branch_name`, `phone_no`, `address`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Miami', '585498659', 'USA', '1', '2024-01-19 07:53:13', '2024-01-19 07:53:13'),
(4, 'Camilla Parker UK', '4548123555', 'UK', '1', '2024-01-19 08:50:36', '2024-01-19 08:50:36'),
(5, 'Ivertis Hospital  Bangalore', '651515156151', 'Akshya Nagar 1st Block 1st , Rammurthy nagar, Bangalore-560016   1', '1', '2024-01-19 09:03:23', '2024-01-19 09:03:23'),
(6, 'California', '5487548565', 'USA', '1', '2024-01-19 09:15:02', '2024-01-19 09:15:02'),
(7, 'Delhi Clinic', '5454487545', 'Delhi', '1', '2024-01-19 09:17:57', '2024-01-19 09:17:57'),
(9, 'Germany', '54544125', 'UK', '1', '2024-01-24 10:37:07', '2024-01-24 10:37:07'),
(10, 'Kerla Clinic', '985986584596', 'INDIA', '1', '2024-02-20 12:38:39', '2024-02-20 12:38:39'),
(11, 'Singapore', '8954215688', 'USA', '1', '2024-02-23 10:17:45', '2024-02-23 10:17:45'),
(12, 'Noida', '8754748484', 'kojhg jihg', '1', '2024-04-03 11:19:47', '2024-04-03 11:19:47'),
(13, 'Noida TechMave', '999999999999', 'Noida NCR', '1', '2024-04-04 11:55:55', '2024-04-04 11:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `contactUs`
--

CREATE TABLE `contactUs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subTitle` longtext DEFAULT NULL,
  `imageUpload` varchar(200) DEFAULT NULL,
  `content1` longtext DEFAULT NULL,
  `content2` longtext DEFAULT NULL,
  `content3` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactUs`
--

INSERT INTO `contactUs` (`id`, `title`, `subTitle`, `imageUpload`, `content1`, `content2`, `content3`, `created_at`, `updated_at`) VALUES
(1, 'Contact Us', 'All our consultations are by pre-booked and confirmed appointments!', '1826499362.png', 'Walk-in appointments may be accepted upon availability and on VERY exceptional\r\n                            bases only', 'Our working hours Every day: 8AM–8PM (Closed Friday in All Branches)', 'In case of Emergency outside working hours , you must\r\n                            proceed to nearest Accident & Emergency Department if your condition cannot wait till our next\r\n                            working hours', '2024-04-05 04:31:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` varchar(100) DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `role_id` int(18) UNSIGNED DEFAULT NULL,
  `is_verified` enum('1','0') DEFAULT '0',
  `patient_profile_img` varchar(255) DEFAULT NULL,
  `LicenseUpload` varchar(255) DEFAULT NULL,
  `AcademicDocumentUpload` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `post_code` varchar(200) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `sirname` varchar(12) DEFAULT NULL,
  `birth_date` varchar(255) DEFAULT NULL,
  `gendar` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `landline` varchar(50) DEFAULT NULL,
  `specialty` varchar(150) DEFAULT NULL,
  `qualifications` longtext DEFAULT NULL,
  `college_name` varchar(255) DEFAULT NULL,
  `NursingSchool` varchar(255) DEFAULT NULL,
  `graduation_year` bigint(10) DEFAULT NULL,
  `soft_skill` varchar(255) DEFAULT NULL,
  `communication_skill` varchar(255) DEFAULT NULL,
  `experience` varchar(150) DEFAULT NULL,
  `Degree` varchar(255) DEFAULT NULL,
  `working_hours` varchar(150) DEFAULT NULL,
  `languages_spoken` varchar(150) DEFAULT NULL,
  `lincense_no` varchar(150) DEFAULT NULL,
  `profileImage` varchar(200) DEFAULT NULL,
  `document_type` varchar(100) DEFAULT NULL,
  `patient_id` varchar(255) DEFAULT NULL,
  `gp` varchar(255) DEFAULT NULL,
  `kin` varchar(255) DEFAULT NULL,
  `policy_no` varchar(255) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `lab_name` varchar(255) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doctor_id`, `title`, `name`, `email`, `password`, `user_type`, `role_id`, `is_verified`, `patient_profile_img`, `LicenseUpload`, `AcademicDocumentUpload`, `role`, `email_verified_at`, `remember_token`, `post_code`, `mobile_no`, `sirname`, `birth_date`, `gendar`, `street`, `town`, `country`, `landline`, `specialty`, `qualifications`, `college_name`, `NursingSchool`, `graduation_year`, `soft_skill`, `communication_skill`, `experience`, `Degree`, `working_hours`, `languages_spoken`, `lincense_no`, `profileImage`, `document_type`, `patient_id`, `gp`, `kin`, `policy_no`, `additional_info`, `tags`, `lab_name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'DI1231', 'Dr', 'Manish_', 'doctor@gmail.com', '$2y$12$oiLNtTiFxYJmEF7W/pbvrOgwmk3J4O/4SKUjaUMMq.Con7WHp/TEO', 'doctor', 1, '0', '446718094.png', NULL, NULL, 'user', NULL, 'o0OZS8vJmnhqRTcFbqOPF5xZNj62v59F1xLJchm13kgQ6FFasc8FcjQmXAiL', '431343', '987654321', NULL, '01/31/2024', 'male', '431343', 'noida', 'CX', '11', '123', '123', NULL, NULL, NULL, NULL, NULL, '123', NULL, '123', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-01-15 17:47:56', '2024-04-02 16:18:45'),
(7, 'DI1231', 'Dr', 'Lab', 'lab@gmail.com', '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', 'lab', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '431343', NULL, NULL, '01/31/2024', 'male', '431343', 'noida', 'India', '11', '123', '123', NULL, NULL, NULL, NULL, NULL, '123', NULL, '123', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-01-15 17:47:56', '2024-01-16 16:25:32'),
(12, 'MA145155', 'Mr', 'Ramesh updated', 'adminwwqq@gmail.com', '$2y$12$uY/cj55RuTbjZpGgXBhGqOZfOqR45umlZp1vKAadPCrms0n7PYCDa', 'doctor', NULL, '0', '1567372209.png', NULL, NULL, 'user', NULL, NULL, '12', '9087654321', NULL, '01/09/2024', 'female', '12', 'noida', 'CX', '9395', '123', '12', NULL, NULL, NULL, NULL, NULL, '123', NULL, '123', '213', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-01-23 14:18:26', '2024-04-02 18:43:33'),
(13, 'MA100662', 'Dr', 'Sigourney Scott', 'naholakiw@mailinator.com', '$2y$12$LPKjNTzh1VJHMgkRGRjQ3u9HRXi6nzuyzc0DVPDMUq44SfURLaTY2', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '0987', '967654321', NULL, '24-Aug-1978', 'male', 'Ut modi rem qui dolo', 'Quia ex sunt dolore', 'CX', '55', 'In molestias dolores', 'Ullam qui aliquip qu', NULL, NULL, NULL, NULL, NULL, 'Proident molestiae', NULL, 'Alias quibusdam ea v', 'Dolore aliqua Ut ob', '11111111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-01-23 20:12:51', '2024-01-24 13:29:36'),
(14, 'MA323653', 'Dr', 'Desiree Montgomery', 'tucuvelyf@mailinator.com', '$2y$12$e9dI2YA2fU1V0ytFrq2HWe4PtdQRBIcBJp2ZyooaiqFBw0hxIHNR2', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Earum ipsum esse e', NULL, NULL, '27-Oct-1970', 'other', 'Nostrum id magni vol', 'Dolor est quo amet', 'SE', '24', 'Voluptate esse aspe', 'Occaecat id quis adi', NULL, NULL, NULL, NULL, NULL, 'Explicabo Provident', NULL, 'Molestiae ad laboris', 'Et ipsum exercitati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-01-23 20:13:10', '2024-01-23 20:13:10'),
(15, 'MA930609', 'Capt', 'Emma Flores', 'cidexog@mailinator.com', '$2y$12$y1eBR9XUncAqfbnHwIulBu7GBmF1//fmCTp9M6w/H.YPZvnJg11EC', 'doctor', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '123', '890123456', NULL, '10 Jul, 1987', 'other', 'Id amet quis eiusm', 'Porro consequuntur i', 'AD', '66', 'Vel excepturi ut qui', 'Irure et aut do moll', NULL, NULL, NULL, NULL, NULL, 'Cum aut ipsam explic', NULL, 'Accusantium nihil in', 'Molestiae ducimus s', '222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-01-23 20:17:35', '2024-01-30 19:29:29'),
(19, 'MA416924', 'Lady', 'Reece Pate', 'mofy@mailinator.com', '$2y$12$bNJm6OKNJLsTqUqVI6QoH.hsNUGjrGUh0bs4dADoHnMvQCiDo/UBa', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Aperiam commodo aut', NULL, NULL, '16-Jan-1977', 'female', 'Qui voluptates quia', 'Laborum aut fugiat', 'FM', '21', 'Et autem perspiciati', 'Excepturi quia ut ma', NULL, NULL, NULL, NULL, NULL, 'Accusantium sit et', NULL, 'Est voluptate non ex', 'Sit ut et nostrum r', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-01-23 20:34:19', '2024-01-23 20:34:19'),
(25, 'MA311713', 'Professor', 'Zorita Landry', 'wiwufako@mailinator.com', '$2y$12$jFRBO98j4cWgsxEwK/qfCebcRGGZwCgQIp4Z3LgguhGDpWwP8F/GS', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '222', '9234567890', NULL, '11-Feb-2002', 'male', 'Quas quo aut cupidat', 'Anim ut dolore possi', 'CX', '48', 'Excepteur commodi qu', 'Mollit exercitation', NULL, NULL, NULL, NULL, NULL, 'Molestias ut cum adi', NULL, 'Qui fugiat ipsum at', 'Mollit voluptatem r', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-01-24 13:19:30', '2024-01-24 13:34:30'),
(26, 'MA772223', 'Dr', 'Dieter Smith', 'gyxyle@mailinator.com', '$2y$12$pZR2sv6CwB2.5f92LUVPbO4ZjL6RcIiDyG.eoCBC9u/LTTp0fxZBi', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '0990', NULL, NULL, '02-Jul-2004', 'female', 'Nostrum proident re', 'Quod qui et amet et', 'India', '25', 'Odio consequat Porr', 'Doloribus sunt omni', NULL, NULL, NULL, NULL, NULL, 'Id minim incididunt', NULL, 'Architecto quisquam', 'Deserunt voluptas pe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-01-24 13:24:05', '2024-01-24 13:24:05'),
(27, 'MA989817', 'Mrs', 'Odysseus Malone', 'zixi@mailinator.com', '$2y$12$lJ0aj421Vkdc70FAe1t3NeeYDT1dAVRLv7QGtFM0ujnrtgH96VvQm', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '333', NULL, NULL, '13-Jan-1972', 'other', 'Non esse maxime fac', 'Ut aliquip officiis', 'ES', '99', 'Quasi praesentium ob', 'Culpa non ipsum il', NULL, NULL, NULL, NULL, NULL, 'Odio cupidatat iusto', NULL, 'Possimus doloremque', 'Dicta in porro ut vo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-01-24 13:30:42', '2024-01-24 13:30:42'),
(28, 'MA302026', 'Sir', 'Aspen House', 'jeluwe@mailinator.com', '$2y$12$b2SixwGEDycEZ51GRpQUleSwcSRhDZ72.FopJxOv1jOEF5KiLDWTu', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '22', NULL, NULL, '07-Apr-1977', 'female', 'Facilis sint et ips', 'Cupidatat ipsa et s', 'MC', '88', 'Sapiente voluptas do', 'Laborum Ullam accus', NULL, NULL, NULL, NULL, NULL, 'Esse et ipsam ea sit', NULL, 'Duis at molestiae qu', 'Doloremque dolore id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-01-24 13:35:02', '2024-01-24 13:35:02'),
(30, 'MA998691', 'Professor', 'Clementine Rivas', 'maqihaku@mailinator.com', '$2y$12$rZU5SEwH3lhgWWYy5mfaFuKqg4k5Yy2jkw/6wBdYkoA69rKBQW4xm', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '000', NULL, NULL, '02-Aug-2001', 'female', 'Et accusamus volupta', 'Enim aliquid eum off', 'BT', '54', 'Accusantium quibusda', 'In mollitia commodi', NULL, NULL, NULL, NULL, NULL, 'Vero eveniet dignis', NULL, 'Minim in qui eius co', 'Ut expedita sunt eaq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-01-24 13:40:47', '2024-01-24 13:40:47'),
(31, 'MA559964', 'Dr', 'Scott Wilkins', 'bomiwyqoq@mailinator.com', '$2y$12$bF3Qthqfgq4ihw413xGo1.A20bXreV5D6AH/D.1OcWDhsaspi0kNm', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '111', NULL, NULL, '19-Aug-2017', 'male', 'Aut ad vitae laborum', 'Consequuntur enim si', 'LY', '13', 'Libero accusamus vit', 'Recusandae Enim est', NULL, NULL, NULL, NULL, NULL, 'Cupidatat nulla even', NULL, 'Voluptatem obcaecat', 'Sequi ut in consequa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-01-24 13:41:21', '2024-01-24 13:41:21'),
(36, 'TC611534', 'Sir', 'Sophia Rosario', 'peva@mailinator.com', '$2y$12$/yhfKJKs8Q/1HsXXkkZpoebaIJfWTvBVPLci5fYw5yd.OjndLDGdO', 'telecaller', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '0990', NULL, NULL, '23-Jan-1980', 'other', 'Nesciunt omnis ut f', 'Architecto est et au', 'India', 'Nam expedita sit id', NULL, 'Molestiae sit ab lab', NULL, NULL, NULL, NULL, NULL, 'Deserunt doloribus q', NULL, NULL, 'Dolore est sint dign', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-01-24 16:02:48', '2024-01-24 16:02:48'),
(37, 'TC627587', 'Ms', 'Alice Mendez', 'kefu@mailinator.com', '$2y$12$vdDbH7S/eyXKTMreISiMfO8JcNWNMsdDWBioFmGYseXPC2fdhmTIW', 'telecaller', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '123', NULL, NULL, '05-Apr-2005', 'female', 'Elit sit possimus', 'Sit expedita fugiat', 'India', 'Enim hic voluptate e', NULL, 'Quos ut in beatae no', NULL, NULL, NULL, NULL, NULL, 'Nulla non tenetur ma', NULL, NULL, 'Quidem duis eum magn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-01-24 16:07:35', '2024-01-24 16:07:35'),
(38, 'TC577020', 'Mr', 'Zachery Bailey', 'wolyfujata@mailinator.com', '$2y$12$fKQoP7YmWcttl9THy8JCMuDmjUTuQGiD5u4HM3kXT1ibYZVZBqZbG', 'telecaller', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '1231', NULL, NULL, '09-Nov-1981', 'other', 'Suscipit hic eveniet', 'Laboris perspiciatis', 'BD', 'Tempora deserunt rer', NULL, 'In pariatur Ut inci', NULL, NULL, NULL, NULL, NULL, 'Dicta distinctio Co', NULL, NULL, 'Do quo iste iusto il', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-01-24 16:12:24', '2024-01-24 16:12:24'),
(39, 'TC92346', 'Mr', 'Dora Vaughan', 'cagu@mailinator.com', '$2y$12$mcitm6qyfM8FB4jC/OqLee8QpjgSWvK1SQj4.VmzpOV6bkpwY4ik6', 'telecaller', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '098', NULL, NULL, '14-Dec-2017', 'male', 'Fugiat adipisci aut', 'Laboriosam dolor nu', 'PF', 'Aliquip libero rerum', NULL, 'Quis totam duis reru', NULL, NULL, NULL, NULL, NULL, 'Aute ut et dolorem a', NULL, NULL, 'Laboriosam eu facer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-01-24 16:13:11', '2024-01-24 16:13:11'),
(55, NULL, NULL, 'avichauhan0404', 'avichauhan0404@gmail.com', '$2y$12$SsRlhBS5Bk9Vlwj9Qm7SVuvYmGjwH2/PaQhKv61.e2HFNLm8/hAdm', 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '5657454', '1234567898', NULL, NULL, NULL, '452', '52', 'India', '58565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DEMO TEST LAB', 'active', '2024-02-19 09:49:20', '2024-02-19 09:49:20'),
(59, NULL, NULL, 'testing00', 'testing00@yopmail', '$2y$12$WuiVafjLCHMuR0sT5pI5.e52ERW/LQVKqIeieqxcPBx6fRVhDyM9y', 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '2316458', '7418529630000', NULL, NULL, NULL, 'zzzzzzzzzzzzzz', 'yyyyyyyyyyyyyyy', 'india', '65896554561216254', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'don\'t know', 'active', '2024-02-20 10:58:33', '2024-02-20 10:58:33'),
(63, 'DR453873', 'Capt', 'Ray Lopez', 'xefo@mailinator.com', '$2y$12$PeZfsuqSWWpS/v1xAVombO08/TZ5NB0G6SrRa2quEkRyh2MWLBzh.', 'doctor', 2, '0', NULL, NULL, NULL, 'user', NULL, NULL, NULL, '7098765432', NULL, '29 Dec, 2016', 'other', 'Ducimus error et om', 'Illo et aliqua Eaqu', 'ZA', NULL, 'Aliquam deserunt eli', 'Ad error ut quis ut', NULL, NULL, NULL, NULL, NULL, 'Quo aliquid unde aut', NULL, 'Proident incidunt', 'Ut qui autem quod et', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-22 19:39:22', '2024-02-22 19:39:22'),
(64, 'DR459941', 'Lady', 'Ross Cross', 'jidekas@mailinator.com', '$2y$12$.yoDoVa1oyIi9vh7fhov4OwXwLANQglsJDDVmRU/nBK64Lvs8yqO6', 'doctor', 2, '0', '120ef868b771ad12b6a456a4f367336a.png', NULL, NULL, 'user', NULL, NULL, NULL, '5098765432', NULL, '11 Feb, 1992', 'other', 'Qui itaque id aperi', 'Deserunt cillum temp', 'TO', NULL, 'Deserunt magna sequi', 'Et laborum Duis qui', NULL, NULL, NULL, NULL, NULL, 'Et aliqua Porro odi', NULL, 'Odit ad itaque offic', 'Sapiente ullamco err', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-22 19:40:49', '2024-02-22 19:40:49'),
(83, 'NA141097', 'Mr', 'Chadwick Hammond', 'sygakobe@mailinator.com', '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', 'Nurse', 2, '0', '564aa326ec83f5b1d6eafed00baebabb.png', NULL, NULL, 'user', NULL, NULL, 'Et volu', '60987654345', NULL, '12 Feb, 2024', 'other', 'Assumenda odit conse', 'Soluta aliqua Exerc', 'India', NULL, 'Exercitationem et qu', 'Et accusantium non d', NULL, NULL, NULL, NULL, NULL, 'Animi dicta saepe v', NULL, 'Consequuntur Nam aut', 'Nulla voluptas totam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-22 23:03:11', '2024-02-28 14:22:25'),
(84, 'NA309180', 'Miss', 'Ciara Best', 'nedo@mailinator.com', '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', 'Nurse', 2, '0', '1c82eac131c63519ecba36969cb8e100.png', NULL, NULL, 'user', NULL, NULL, 'Minus', '9098765432', NULL, '13 Feb, 2024', 'male', 'Aut reiciendis error', 'Sit soluta debitis', 'CY', NULL, 'Excepturi in asperna', 'Expedita quidem ut f', NULL, NULL, NULL, NULL, NULL, 'Et quae ex exercitat', NULL, 'Consequatur et exerc', 'Est est iste obcaeca', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-22 23:04:11', '2024-02-22 23:05:10'),
(89, 'TC609882', 'Mrs', 'Hiroko Lang', 'sehiz@mailinator.com', '$2y$12$QYCLerUWWBBkavlM83p9RukmTJf81SDMoyhErZlnDbza/vj.Vz6k6', 'telecaller', NULL, '0', 'Screenshot 2023-12-09 223849.png', NULL, NULL, 'user', NULL, NULL, 'Ad re', '7098765433', NULL, '13 Feb, 2024', 'other', 'Sed sint totam pari', 'Veniam tempore at', 'India', NULL, NULL, 'Labore assumenda qui', 'Wyatt Cardenas', NULL, 1987, 'Fugiat pariatur Ve', 'Excellent', 'Sed voluptas eligend', NULL, NULL, 'Consectetur dolores', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-23 00:08:30', '2024-02-23 00:08:30'),
(90, 'TC749000', 'Mrs', 'Lacota Garza', 'kecigi@mailinator.com', '$2y$12$Wbv/wqN78dMAU/YTICVPLu5HRe9POBYCcf34JwjcRlofam4eb00GK', 'telecaller', NULL, '0', '/tmp/phpHeQM1K', NULL, NULL, 'user', NULL, NULL, 'Repud', '8098765432', NULL, '14 Feb, 2024', 'female', 'Excepturi quo nihil', 'Eius eligendi corpor', 'India', NULL, NULL, 'Quis totam iste Nam', 'Wendy Gibson', NULL, 1983, 'Id ipsum voluptates', 'Very Good', 'Sed duis provident', NULL, NULL, 'Labore nihil ex est', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-23 00:11:46', '2024-02-23 00:11:46'),
(92, 'TC163847', 'Sir', 'Alec Bright', 'micifucyva@mailinator.com', NULL, 'telecaller', NULL, '0', '9afa6ee37af506a93c8d1816f43388a6.png', NULL, NULL, 'user', NULL, NULL, 'Quae', '98987654355', NULL, '21 Dec, 2000', 'female', 'Facere reprehenderit', 'Corporis tenetur vol', 'India', NULL, NULL, 'Neque commodi aliqua', 'Fritz Nieves', NULL, 2019, 'Necessitatibus ducim', 'Good', 'Ipsa omnis nobis mo', NULL, NULL, 'Ex eum qui sed recus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-23 00:19:40', '2024-02-28 14:23:13'),
(93, NULL, NULL, 'maqyhuke', 'maqyhuke@mailinator.com', '$2y$12$SsRlhBS5Bk9Vlwj9Qm7SVuvYmGjwH2/PaQhKv61.e2HFNLm8/hAdm', 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Quam', '9987654321', NULL, NULL, NULL, 'Debitis minim aute a', 'Voluptate non aliqui', 'India', '9987654321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Seth Hodges', 'active', '2024-02-22 18:32:27', '2024-02-22 18:32:27'),
(94, NULL, NULL, NULL, 'qytybedyhe@mailinator.com', '$2y$12$1YxUtwbDo7gg7xfUGcd4Rum3hRAmuLGO0MEGXhVjudpGaJDCbYggi', 'radiology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'qwer', '4567890329', NULL, NULL, NULL, 'Dicta id incidunt', 'Ipsa voluptatibus n', 'canada', '4567890329', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Felix Melton', 'active', '2024-02-22 18:43:30', '2024-02-22 18:43:30'),
(95, 'NA460398', 'Mr', 'hareram', 'kkkk@gmail.com', '$2y$12$KD3tXORPm9rAM3sM78wPqucOER3zkWqT.sp7znahxFQT.RuFKf0w2', 'Nurse', 2, '0', NULL, NULL, NULL, 'user', NULL, NULL, '1234', '0987654321', NULL, '05 Feb, 2024', 'female', NULL, NULL, 'India', '34567898700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-23 16:33:58', '2024-02-28 13:19:57'),
(96, 'NA665883', 'Miss', 'Lamar Whitley', 'ryzybe@mailinator.com', '$2y$12$Wykt0xZximXpnDwTQVNf6OHwX2yNoSZYMCoHsMsVpAEE4RDj.WAN2', 'Nurse', 2, '0', NULL, NULL, NULL, 'user', NULL, NULL, '654987', '96385274100', NULL, '14-02-2024', 'female', 'Praesentium tempor a', 'Molestiae nobis cons', 'India', '7894512306', 'Velit minima magni q', 'In ratione aliquip f', NULL, NULL, NULL, NULL, NULL, 'Soluta praesentium e', NULL, 'Maxime dolor eos ul', 'Omnis quia omnis pro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-23 16:35:41', '2024-02-23 16:35:41'),
(97, 'AC331135', 'Mr', 'kkkkkk', 'joihgffd@liikjh.com', '$2y$12$LZ1bSjSm0EGOvIgcCyLY0.NrEgBknwSzlacqGmeu/ju/3SDUkgOfa', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '85274', '321852741963', NULL, '05 Feb, 2024', 'female', NULL, NULL, 'India', '25845698713', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-23 16:40:53', '2024-02-23 16:40:53'),
(98, 'TC543647', 'Mr', 'Freya King', 'lovahuf@mailinator.com', '$2y$12$mTW/UH3U9hYEmjNgjirVFuUjHNqnyI12m6o.lOCd9vWPRpNgMqQTK', 'telecaller', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '0987', '951752956965', NULL, '01 Feb, 2024', 'other', 'Eos laboriosam tem', 'Qui dolor at ut itaq', 'India', '9865431635', NULL, 'Nam ducimus eaque s', 'Kristen Owen', NULL, 1986, 'A sapiente ut offici', 'Good', 'Et voluptates enim i', NULL, NULL, 'Duis enim quos sequi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-23 16:43:56', '2024-02-23 16:43:56'),
(99, 'DR99845', 'Lady', 'Raymond Stafford', 'qalipu@mailinator.com', '$2y$12$l.GvW/QA3e/LlrkL2J0exeeA2kLUhBOjfuC040.BU4eoyXB0RPcNq', 'doctor', NULL, '0', NULL, '', '', 'user', NULL, NULL, 'Est 2', '5098765430', NULL, '29 Dec, 2004', 'female', 'Sit tempor sit do a', 'Magni adipisicing fu', 'India', NULL, 'Nostrum ut adipisici', 'Eos commodi est des', NULL, NULL, NULL, NULL, NULL, 'Occaecat sed velit e', NULL, 'Dignissimos adipisic', 'Mollitia maxime ulla', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-27 15:59:53', '2024-02-27 15:59:53'),
(100, 'DR129178', 'Professor', 'Anthony Santana', 'wifog@mailinator.com', NULL, 'doctor', 1, '0', NULL, '', '', 'user', NULL, NULL, 'Ea i', '7098765438', NULL, '19 Sep, 2015', 'male', 'Est soluta doloremqu', 'Possimus in maiores', 'CY', NULL, 'Eligendi ut nobis cu', 'Est nostrud ullam eu', NULL, NULL, NULL, NULL, NULL, 'Eu porro ut velit re', NULL, 'Consequuntur non ips', 'Quia iusto enim aute', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-27 16:03:42', '2024-02-27 17:36:13'),
(101, 'DR976625', 'Mrs', 'Aiko Crane', 'jezexy@mailinator.com', '$2y$12$Ah0FKwZ5NqmvjtYkzashdOm9AE.8HWIOOOqOhrfqajNwURYEGg1yy', 'doctor', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Magna', '8098765439', NULL, '30 Sep, 2021', 'other', 'Placeat veniam in', 'Mollitia adipisicing', 'FI', NULL, 'Sapiente blanditiis', 'Fugiat reiciendis v', NULL, NULL, NULL, NULL, NULL, 'Consequatur anim sed', NULL, 'Sint consequat Non', 'Nostrud culpa ipsam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-27 16:16:40', '2024-02-27 16:16:40'),
(102, 'DR242569', 'Mrs', 'Xena Bentley', 'laba@mailinator.com', NULL, 'doctor', 2, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Molest', '8098765499', NULL, '02 May, 1978', 'male', 'Excepturi dolorum qu', 'Cupidatat dolorem an', 'CY', NULL, 'Est odio molestiae a', 'Qui labore eveniet', NULL, NULL, NULL, NULL, NULL, 'Dignissimos amet in', NULL, 'Rerum dolores volupt', 'Deserunt id minima e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-27 16:59:28', '2024-02-27 17:32:07'),
(103, 'NA82126', 'Mrs', 'Zane Holcomb', 'tedyfijuv@mailinator.com', '$2y$12$qWVQTWwAnoWay8wHioAEwuKKcXjQgBN3kyD8d3vjnSV6XOOfeSfrm', 'Nurse', 2, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Enim', '8098765431', NULL, '02-Feb-1984', 'other', 'Exercitation volupta', 'Dolor necessitatibus', 'India', NULL, NULL, NULL, NULL, 'Ut proident laudant', NULL, NULL, NULL, 'Excepturi commodi se', 'Esse ea reprehenderi', 'Eum sint dolore qua', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-27 19:00:23', '2024-02-27 19:00:23'),
(104, 'NA568096', 'Dr', 'Vernon Snider', 'huqefyluc@mailinator.com', '$2y$12$rIsTwpc/l41UsCgAdQ3.GeeitikiD7ZzA3JFTlx5sWvPHoPN4UhyS', 'Nurse', 2, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Dolor', '7890654322', NULL, '28 Mar, 2020', 'other', 'Sint mollit sunt qu', 'Quo quia nulla omnis', 'MO', NULL, NULL, NULL, NULL, 'Similique reiciendis', NULL, NULL, NULL, 'In qui accusantium s', 'Accusamus exercitati', 'In nisi eius accusam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-27 19:07:39', '2024-02-27 19:07:39'),
(105, 'NA293464', 'Lord', 'Curran Hopkins', 'jykenupuby@mailinator.com', '$2y$12$Jwehc.dMZWjSGMAR3.cydO7.hw/qwPku35oZjhoNivlNw6lAYUqQK', 'Nurse', 2, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Odio', '8098765434', NULL, '13 Apr, 1992', 'other', 'Voluptate perferendi', 'Et officia voluptati', 'India', NULL, NULL, NULL, NULL, 'Quod autem blanditii', 1984, NULL, NULL, 'Tenetur ut cum excep', 'Est sequi sunt Nam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-27 19:15:12', '2024-02-27 19:15:12'),
(106, 'NA78117', 'Sir', 'Nasim Gutierrez', 'wirogi@mailinator.com', NULL, 'Nurse', 2, '0', '370632208f0d34bcae3dc63efbf76bc7.png', NULL, NULL, 'user', NULL, NULL, 'Eos1', '89087654321', NULL, '18 Jul, 1973', 'female', 'Excepteur odio quia', 'Ut eveniet dolor do', 'SD', NULL, NULL, NULL, NULL, 'Sunt mollitia dolore', 1993, NULL, NULL, 'Quo eveniet animi', 'Repudiandae dicta vo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-27 19:22:03', '2024-02-27 20:21:41'),
(107, 'NA234496', 'Mrs', 'Diana Macias', 'zuzu@mailinator.com', NULL, 'Nurse', 2, '0', 'd58119954b36efee65f087f54e219ce4.png', NULL, NULL, 'user', NULL, NULL, 'Sint', '8907654327', NULL, '25 Feb, 1970', 'male', 'Vel iure laudantium', 'Labore illo velit id', 'SR', NULL, NULL, NULL, NULL, 'Sit ipsum sed obcae', 1993, NULL, NULL, 'Nihil fuga Quibusda', 'Numquam et aliquip r', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-27 20:22:52', '2024-02-27 20:23:47'),
(108, 'AC34430', 'Miss', 'Donovan Mcclure', 'fytowyn@mailinator.com', NULL, 'accountant', NULL, '0', '14f9a7e0d2eaffd2dab13e2b38c898e9.png', NULL, NULL, 'user', NULL, NULL, 'Velit', '8079876543', NULL, '23 Mar, 1974', 'male', 'Nisi Nam molestiae a', 'Consequat Inventore', 'GS', NULL, NULL, NULL, 'Jenna Velez', NULL, 1977, 'Omnis id ex qui magn', NULL, 'Nulla in eius delect', 'Cumque reiciendis ut', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-27 20:48:17', '2024-02-27 21:08:50'),
(109, 'TC200316', 'Professor', 'Shay Forbes', 'lelu@mailinator.com', '$2y$12$s39a6jFhmlXYn.6KtZ4G/.9PW.NWzDqeDzUsOmCwJl4NmzVkgOkcG', 'telecaller', NULL, '0', '44d7df802900ca368262c2e6a461b610.png', NULL, NULL, 'user', NULL, NULL, 'Quos', '9876543219', NULL, '14 Oct, 1986', 'female', 'Quasi voluptatem La', 'Cillum impedit perf', 'NI', NULL, NULL, NULL, 'Cora Hogan', NULL, 2004, 'Sit est dolore fugit', 'Excellent', 'Pariatur Ut mollit', 'Laudantium temporib', NULL, 'Dolores enim fuga V', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-27 22:50:09', '2024-02-27 22:50:09'),
(110, 'DR836059', 'Mrs', 'huihiu', 'JBjhhhHJ@YOPMAIL.COM', NULL, 'doctor', 1, '0', NULL, '0d1b6bf4bf64806b1c57190a7355d37f.pdf', '72eb8c861f80aee7895747d018c1d059.pdf', 'user', NULL, NULL, '852964', '1234569510', NULL, '08 Feb, 2024', 'female', 'Facilis dolorem faci', 'Sequi numquam aliqui', 'CY', '986598659865', 'Nam facilis sed faci', 'Velit amet est tem', NULL, NULL, NULL, NULL, NULL, 'Omnis dolorum dolore', NULL, '5', 'english', '852', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-28 12:06:44', '2024-02-28 12:10:18'),
(111, 'NA756482', 'Miss', 'jasss', 'jas98765@yopmail.com', '$2y$12$iQ2KtQ1hS9ZCElh3hbP71ei1HyxeGrQ8qumc3YqoavpChZH4ceLiW', 'Nurse', 2, '0', '6be60f27f18f39f559f7998ae8fa5b55.jpg', NULL, NULL, 'user', NULL, NULL, '741852', '5678904321', NULL, '04 Dec, 2007', 'female', 'zzzzzzzzzzzzzz', 'yyyyyyyyyyyyyyy', 'India', '9876512340', NULL, NULL, NULL, 'mnbvcxdfg', 1986, NULL, NULL, '12', 'ikujgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-28 12:15:39', '2024-02-28 12:15:39'),
(113, 'DR475953', 'Sir', 'Harper Ramirez', 'lajuhoh@mailinator.com', '$2y$12$Ph.hzxEx.b8xPwpUe.sXEuDkWkRHn0O2UQEFN5yWUDRhT.6K7IbM6', 'doctor', 8, '0', NULL, NULL, NULL, 'user', NULL, NULL, '98641346', '741852963852', NULL, '03 Feb, 1997', 'male', 'Perferendis quaerat', 'Cum ullamco ea ipsum', 'India', '9561563542', 'Ut dolorum facere mo', 'Asperiores laborum', NULL, NULL, NULL, NULL, NULL, 'Atque vel cupiditate', NULL, 'Non earum officia co', 'Vitae iste minus adi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-28 12:47:11', '2024-02-28 12:47:11'),
(114, 'DR231857', 'Lady', 'manishka', 'manishkaaaaaaaaaaaaaa@yopmail.com', NULL, 'doctor', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '963852', '96365438888', NULL, '01 Feb, 2024', 'female', NULL, NULL, 'CY', '8524569873', 'jjjjkkklll', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-28 13:39:26', '2024-02-28 14:22:00'),
(115, 'PA254633', NULL, 'gewilaxysy', 'gewilaxysy@mailinator.com', '$2y$12$SsRlhBS5Bk9Vlwj9Qm7SVuvYmGjwH2/PaQhKv61.e2HFNLm8/hAdm', 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Aliquid', '1234567890', NULL, NULL, NULL, 'Enim quo omnis qui s', 'Officia eligendi fug', 'India', '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Darrel Hernandez', 'active', '2024-02-28 06:55:50', '2024-02-28 06:55:50'),
(117, 'PA667368', NULL, 'sisefidisy', 'sisefidisy@mailinator.com', '$2y$12$SsRlhBS5Bk9Vlwj9Qm7SVuvYmGjwH2/PaQhKv61.e2HFNLm8/hAdm', 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Velit do', '5555555555', NULL, NULL, NULL, 'In Nam Nam natus cul', 'Possimus quae ut do', 'India', '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mark Stevenson', 'active', '2024-02-28 07:36:08', '2024-02-28 07:36:08'),
(118, 'PA296045RE236345', 'Mr', 'Ravi', 'ravi@mail.com', '$2y$12$SsRlhBS5Bk9Vlwj9Qm7SVuvYmGjwH2/PaQhKv61.e2HFNLm8/hAdm', 'Receptionist', 11, '0', NULL, NULL, NULL, 'user', NULL, NULL, '1234', '12365347890', NULL, NULL, NULL, 'xyz', NULL, 'India', '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lab 1', 'active', '2024-02-28 07:38:13', '2024-02-28 07:38:13'),
(119, 'RE236342', 'Mr', 'Avi', 'avi@gmail.com', '$2y$12$SsRlhBS5Bk9Vlwj9Qm7SVuvYmGjwH2/PaQhKv61.e2HFNLm8/hAdm', 'Receptionist', 11, '0', NULL, NULL, NULL, 'user', NULL, NULL, '85263', '3216549870', NULL, NULL, NULL, 'kjhgfd', 'hjgfds', 'India', '9637452396521', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lab2', 'active', '2024-02-28 09:11:03', '2024-02-28 09:11:03'),
(121, 'PA416500', NULL, 'hokyrekek', 'hokyrekek@mailinator.com', '$2y$12$rVmJfs8WT4ttswmbsKLtCu9zF92nAQJ8GhnTCKCLSGRSbIgKTCuHC', 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Repellen', '9087654322', NULL, NULL, NULL, 'Iusto quasi laborum', 'Rerum mollitia est o', 'India', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cleo Preston', 'active', '2024-02-28 09:27:17', '2024-02-28 09:27:17'),
(122, NULL, NULL, NULL, 'khjgf@dfgh.com', '$2y$12$7a6.4NXsELZcszEsnknOw.eWUQBS/rTLSTlJzeV8TEreHUYxoQP96', 'radiology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '741526', '3456709800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jhgfv', 'active', '2024-02-28 12:53:59', '2024-02-28 12:53:59'),
(123, 'DR8815', 'Professor', 'Preston Sandoval', 'xaxydivy@mailinator.com', '$2y$12$oK8sjwsAOgu72T4pYzxdE.nPhj8QrE68uwc3C16cDiQ8bZqrCiw.C', 'doctor', 1, '0', NULL, NULL, NULL, 'user', NULL, NULL, '7410852', '09876543267', NULL, '13 Feb, 1999', 'male', 'Velit et dolore et', 'Omnis lorem labore s', 'CF', '8765434567890', 'Quae aute quod qui p', 'Esse magna ipsum mo', NULL, NULL, NULL, NULL, NULL, 'Dolor excepteur corr', NULL, 'Asperiores fugiat h', 'Earum ut repudiandae', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-02-28 20:15:04', '2024-02-28 20:15:04'),
(124, 'PA33199', NULL, 'iuyg', 'iuyg@rtyu.com', '$2y$12$OyBOB5bWGGrCU62Ho/bS1.iBSIYyc4PYBua/YuF3lXskP.mBlHOtq', 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, NULL, '765432345678', NULL, NULL, NULL, NULL, NULL, 'India', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'huyfdx', 'active', '2024-02-28 13:19:14', '2024-02-28 13:19:14'),
(125, 'PA970491', NULL, 'jbhgfW', 'jbhgfW@retyu.com', '123456', 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '43567890', '4567876544567', NULL, NULL, NULL, 'jkuiytresrtgyu', 'kiugydterdtf', 'India', '897654568987', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jbhgftdszfg', 'active', '2024-02-28 13:19:53', '2024-02-28 13:19:53'),
(126, 'PA728463', NULL, 'JBHJ', 'JBHJ@YOPMAIL.COM', '$2y$12$WVg6VqMfTf34JT4mMuD2zu9FPh6tcc1yJ8v8PBiQnM7mCOLJDmq1K', 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, NULL, '89652578421475', NULL, NULL, NULL, NULL, NULL, 'India', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'don\'t know', 'active', '2024-02-28 13:35:41', '2024-02-28 13:35:41'),
(127, 'NA873280', 'Miss', 'Nurse', 'nurse@gmail.com', '$2y$12$B1aOeytl0m.mJs0sYeCGYuN2dwhs4fQxPb94ARjGf69oKxY3wodO.', 'Nurse', 2, '0', '9c0b0274b8477be3b2c7f679a32a5f52.png', NULL, NULL, 'user', NULL, NULL, '1234', '12345676543', NULL, '01 Mar, 2024', 'female', 'noida', 'noida', 'DZ', '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-03-01 12:05:41', '2024-04-09 16:09:47'),
(128, 'DR298596', 'Miss', 'Walter Blackwell', 'gonat@mailinator.com', '$2y$12$CeA0LX4nMGcW7kEp09fAmuXMyIW8hJkSb1YhH6rkdhRpE8ea3Qgb6', 'doctor', 1, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Non proi', '896584658450', NULL, '31 Jul, 1981', 'female', 'Voluptatem incididu', 'Nihil aut tempore d', 'India', NULL, 'Esse ex est non non', 'Quis sunt laboriosam', NULL, NULL, NULL, NULL, NULL, 'Corporis officia ess', NULL, 'Sunt qui vero deseru', 'Earum libero dolor d', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-03-01 20:00:35', '2024-03-01 20:00:35'),
(129, 'DR972493', 'Sir', 'Yardley Willis', 'ravakepy@mailinator.com', NULL, 'doctor', 1, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Eos occa', '8989890000', NULL, '06 Mar, 2008', 'male', 'Id omnis perferendi', 'In aut consequatur', 'CY', NULL, 'Voluptas sunt sit vo', 'Est ad quas do corp', NULL, NULL, NULL, NULL, NULL, 'Vero magni voluptate', NULL, 'Ullamco do vero labo', 'Rerum quaerat ab quo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-03-01 20:03:23', '2024-03-01 20:06:09'),
(131, 'CO29183', 'Mr', 'hareram', 'hareram@gmail.com', '$2y$12$hqRU4gvFI1SXk0JsBffQjeoDv1XnKxFjDwv2CNEGfwCqAQlChRUey', 'Coordinator', 11, '0', '8989cfa6bdd83fcb535e46cdf9979091.png', NULL, NULL, 'user', NULL, NULL, '1234', '4567890323', NULL, '12 Mar, 2024', 'male', 'noida', 'noida', 'DZ', '4567890323', NULL, NULL, NULL, 'hareram patient', 2002, NULL, NULL, 'Adipisicing est com', 'Repudiandae dicta vo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-03-12 16:26:49', '2024-03-12 16:26:49'),
(132, 'DR347462', 'Dr', 'manish', 'drmanish@gmail.com', '$2y$12$SsRlhBS5Bk9Vlwj9Qm7SVuvYmGjwH2/PaQhKv61.e2HFNLm8/hAdm', 'doctor', 1, '0', NULL, NULL, NULL, 'user', NULL, NULL, '1234', '8134567890', NULL, '06 Jan, 2020', 'male', 'noida', 'noida', 'India', '9234567890', 'Sunt aut magni quis', 'Omnis aut odit id es', NULL, NULL, NULL, NULL, NULL, 'Adipisicing est com', NULL, 'Sit enim quis volup', 'Consectetur dolores', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-03-12 17:00:37', '2024-03-12 17:00:37'),
(133, 'DR9819', 'Mr', 'Doctors', 'doctors@gmail.com', NULL, 'doctor', 1, '0', NULL, '5b925b14015e89346f26ea82d21ec94c.pdf', '7cca28f107d0844aadbf79cdf534d6e5.png', 'user', NULL, NULL, '1234', '8885454565', NULL, '01 Jan, 2009', 'male', 'noida', 'noida', 'CY', '1234567890', 'Heart Specialist', 'MD - Heart Specialist', NULL, NULL, NULL, NULL, NULL, '05', NULL, '05', 'English & Hindi', '874552455565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-03-13 14:15:18', '2024-04-09 13:52:07'),
(134, 'CO656046', 'Mr', 'Cordinator', 'cord@gmail.com', '$2y$12$3vrgVNowa7IVV4HASiPVQuxK0UztNfTcDzpcj3x35TJwvCD7JD1Ju', 'Coordinator', 11, '0', '4f8d2154059a3c2f40ec5bd8dfee7bea.png', NULL, NULL, 'user', NULL, NULL, '1541526', '855454545445', NULL, '03 Sep, 2019', 'male', 'bygvhhhj', 'test', 'India', '5559865944', NULL, NULL, NULL, 'Test', 2018, NULL, NULL, '6', 'Test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-03-13 19:45:04', '2024-04-04 20:32:42'),
(135, 'RA746824', NULL, NULL, 'mri@gmail.com', '$2y$12$jMTu2FBJe6PXrxAha3nTZeKu6pCP0s8fu6/wKM8Sn1/qN0SfWPWX2', 'radiology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '955465', '123656965234', NULL, NULL, NULL, 'kjhgvc', ',lkjhgv', 'India', '8959516556', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MRI-NMC', 'active', '2024-03-14 08:10:56', '2024-03-14 08:10:56'),
(136, 'DR761076', 'Lord', 'Suki Gray', 'vojihirega@mailinator.com', '$2y$12$RK10EAZGbYeyN7d32YEqsO1EFdyfoOvFeu.gU2/d2Jxs2fAZQ8xM.', 'doctor', 12, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Dolores', '1234565432', NULL, '27 Jul, 1997', 'other', 'Atque molestiae numq', 'Dolor amet exercita', 'India', '123456765432', 'Ut deserunt odio ips', 'Numquam ea aute vel', NULL, NULL, NULL, NULL, NULL, 'Perspiciatis qui qu', NULL, 'Anim est voluptates', 'Ut esse amet aut is', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-03-20 17:32:24', '2024-03-20 17:32:24'),
(137, 'DR106688', 'Capt', 'Emmanuel Hodges', 'julawam@mailinator.com', '$2y$12$JQ/0ruVJHcTRPV4nuttJl.tr.9kYaw5QYyO71MtMjzT9Cs5JX8KL.', 'doctor', 12, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Voluptat', '324234134312413', NULL, '28 Mar, 2021', 'other', 'Aliquid voluptas off', 'Qui nesciunt invent', 'India', '2345676543234', 'Dolore ratione enim', 'Vitae cumque velit', NULL, NULL, NULL, NULL, NULL, 'Mollitia officia nob', NULL, 'A fuga Placeat qui', 'Rerum consequatur i', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-03-20 17:40:28', '2024-03-20 17:40:28'),
(138, 'DR69152', 'Ms', 'Britanney Mcmillan', 'sytynini@mailinator.com', '$2y$12$jkBIXy5OoG9CRimud4MuH.OAqJaf47Ml8RRIfgBSdq3AMnoWHG0fu', 'doctor', 12, '0', NULL, 'b1850b16e3bda66bf14a5e19f0019b51.jpg', 'b77c82d378783bf2ef93237ff425d8b9.jpg', 'user', NULL, NULL, 'Earum re', '12345678765', NULL, '17 Jul, 1993', 'female', 'Possimus consequatu', 'Dolore quam nihil il', 'AS', '12345678987654', 'In sed similique ven', 'Id libero sed esse', NULL, NULL, NULL, NULL, NULL, 'Vitae temporibus num', NULL, 'Ut et autem exceptur', 'Voluptatem ducimus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-03-20 17:41:31', '2024-03-20 17:41:31'),
(139, 'DR657988', 'Lady', 'Zelda Mclean', 'pukabax@mailinator.com', '$2y$12$935u8Z2CBUWm4NFZObV0E.gdcW6jazq41f07dOnKA.rhTJwKhD0Va', 'doctor', 1, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Magni ob', '123456654321233', NULL, '07 Jan, 1987', 'other', 'Culpa hic quam sunt', 'Et doloremque sit n', 'JO', '12321241234134', 'Labore excepturi id', 'Iusto in nesciunt e', NULL, NULL, NULL, NULL, NULL, 'Itaque exercitatione', NULL, 'Iste commodi autem m', 'In hic neque iure of', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-03-20 17:42:37', '2024-03-20 17:42:37'),
(140, 'DR536482', 'Dr', 'Hiram Osborne', 'cuzoz2w@mailinator.com', '$2y$12$fxrazrIiJSJcSA1iRkoC.OGCzv1tjaUMD9s5QLbfZ7BqStFVK9X7C', 'doctor', 12, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Qui lore', '234567432123245', NULL, '13 Jun, 1977', 'other', 'Aliquip doloribus qu', 'Vero nostrum ex id a', 'BM', '123452143543223', 'Provident error pla', 'Excepturi eos ut du', NULL, NULL, NULL, NULL, NULL, 'Ad delectus sed aut', NULL, 'Ut rerum et quae rep', 'Facilis consequatur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-03-20 17:44:55', '2024-03-20 17:44:55'),
(141, 'DR244131', 'Lord', 'Noah Mclaughlin', 'zyhajukefi@mailinator.com', '$2y$12$OF0oLbgTlWthxFz7RFhyp.Xro0wtZfPIqh4nNYW7iBVmYeNt5LMZW', 'doctor', 10, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Incidunt', '12345654321', NULL, '16 Dec, 1981', 'female', 'Nihil placeat delec', 'Consequatur dolores', 'YT', '123453245453324', 'Laborum Optio fugi', 'Totam animi ratione', NULL, NULL, NULL, NULL, NULL, 'Labore ut dignissimo', NULL, 'Repellendus In sunt', 'Reiciendis facilis q', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-03-20 17:48:17', '2024-03-20 17:48:17'),
(142, 'DR929979', 'Capt', 'Len Pate', 'mylaqy@mailinator.com', '$2y$12$AAgYs43z/kzX4SE2q2vetexqc///NmU4npI44LfSSaVpkrk5UYAju', 'doctor', 2, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Error no', '123456754321', NULL, '06 May, 2019', 'male', 'Quo aut qui exercita', 'Sapiente consequatur', 'BT', '123453213245', 'Autem magnam praesen', 'Rerum est nostrum no', NULL, NULL, NULL, NULL, NULL, 'Est molestiae ut num', NULL, 'Mollit nostrum magni', 'Maxime incidunt par', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-03-20 17:50:17', '2024-03-20 17:50:17'),
(143, 'DR43596', 'Sir', 'Ima Gardner', 'sekes@mailinator.com', '$2y$12$DY7DL66SE8E89OlWCqLedeZX5WwBdxDfu71zkCAhf20H/9jSKXQea', 'doctor', 10, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Est dol', '123455432123', NULL, '25 Feb, 2003', 'female', 'Dolores aliquid veli', 'Minim aut aliqua Si', 'AF', '1234543212345', 'Aliquam sed veniam', 'Praesentium cumque n', NULL, NULL, NULL, NULL, NULL, 'Voluptatibus ut aute', NULL, 'Quo nisi amet quas', 'Sit ullam provident', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-03-20 17:52:42', '2024-03-20 17:52:42'),
(144, 'DR395360', 'Mrs', 'Eric Reilly', 'vugiviqyf@mailinator.com', '$2y$12$wUT4OMDNbL/nlrZiQgtFROjJQOQNA808sCsS8Y5o6it2ROigKDeXu', 'doctor', 10, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Quis dol', '1234567765432', NULL, '20 Apr, 2014', 'male', 'Amet excepturi magn', 'Et ipsum asperiores', 'SE', '123456765432', 'Esse tempor suscipit', 'Eos perspiciatis et', NULL, NULL, NULL, NULL, NULL, 'Laboris officiis ips', NULL, 'Dolorum voluptatem q', 'Laborum aut molestia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-03-20 17:53:13', '2024-03-20 17:53:13'),
(145, 'DR188962', 'Mrs', 'Briar Campos', 'rucukor@mailinator.com', '$2y$12$5uHl0gJ7ay6Rf0lvIAPh1.UTfbs4sZqq2xy3J/RR646DZ8SHO0Pf.', 'doctor', 1, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Voluptas', '123456543211', NULL, '11 Nov, 2020', 'female', 'Libero nisi aut cumq', 'Ipsum quis sed quia', 'JM', '1234567654324', 'Nobis nulla exceptur', 'Quae id qui quisquam', NULL, NULL, NULL, NULL, NULL, 'Nihil ad nobis volup', NULL, 'Esse aliquam numqua', 'Voluptas tempor proi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-03-20 17:53:38', '2024-03-20 17:53:38'),
(146, 'DR990108', 'Professor', 'Adam Mccall', 'bacusajuz@mailinator.com', NULL, 'doctor', 5, '0', NULL, NULL, NULL, 'user', NULL, NULL, '1234', '9981177893', NULL, '22 Sep, 2011', 'female', 'noida', 'noida', 'CY', '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-04-02 12:41:17', '2024-04-04 19:31:43'),
(147, 'DR192959', 'Mr', 'Gray Howard', 'nofoq@mailinator.com', NULL, 'doctor', 1, '0', NULL, NULL, NULL, 'user', NULL, NULL, '1234', '8888626954', NULL, '06 Aug, 2012', 'other', 'noida', 'noida', 'CY', '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-04-02 12:46:18', '2024-04-09 14:41:52'),
(148, NULL, 'Miss', 'Pratibha', 'pratibha@yopmail.com', '$2y$12$kdF5lW3/V9mw.N6KNIRQOegs0xLAwcVZhejxTqfTqjdqzBJaSLbd2', NULL, 12, '0', 'ebe288e10983b1342a35e2941a3ab2ad.jpeg', NULL, NULL, 'user', NULL, NULL, '201005', '9856985685', NULL, '04 Apr, 2023', 'female', 'Test', 'Test', 'India', '8555587745', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-04-03 14:52:09', '2024-04-03 14:52:09'),
(149, 'DR491860', 'Mr', 'Doctor04/04', 'dooctor@yopmail.com', '$2y$12$NwVCSS8YdnA7dFexdpZCUO6K30IoaZxQekyrUNIgqxkxM3TG1NPEG', 'doctor', 1, '0', '8653884f73beb7b3ed3c1cb6230c9735.jpg', 'a966aadd330594dffe5d83d23011f250.png', '0b7ed70b8b1eb125f097e899316a4100.png', 'user', NULL, NULL, '98494', '99999999999', NULL, '04 Oct, 2022', 'male', 'Noida NCR', 'Test', 'CY', '99999999999', 'Heart Specialist', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/tmp/phpn1nsr5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-04-04 13:43:34', '2024-04-09 18:23:54'),
(150, 'PA974312', NULL, 'pathlab', 'pathlab@gmail.com', 'admin@#16', 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '95125', '999999999988', NULL, NULL, NULL, 'Noida NCR', 'Delhi', 'India', '9999999988', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PathLab04/04', 'active', '2024-04-04 07:45:33', '2024-04-04 07:45:33'),
(151, 'RA282278', NULL, NULL, 'radiolab@gmail.com', '$2y$12$fVcHuwiMJnJ3faE88.q1wuS2zaNCtRU1VAKy6mNRCOo6qq.mcIdCG', 'radiology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '856556', '888888888888', NULL, NULL, NULL, 'Noida NCR', 'Delhi', 'India', '888888888888', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Radiolab04/04', 'active', '2024-04-04 07:50:43', '2024-04-04 07:50:43'),
(152, 'CO3291', 'Mr', 'Cordinator04/04', 'cord@yopmail.com', '$2y$12$i74TeM5PH8DtrqzZO4VFGO3coasbvlHnvZ75VLqnf4thgZPxZfGNe', 'Coordinator', 11, '0', '7b4e2771828b40d6595c2d29c5e78ffa.png', NULL, NULL, 'user', NULL, NULL, '548987', '9999989888', NULL, '19 Jul, 2023', 'female', 'Noida NCR', 'Delhi', 'CY', '988898989900', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2024-04-04 19:27:54', '2024-04-09 16:10:43'),
(153, 'REC551834', 'Mrs', 'Receptionist04/04.', 'Receptionist@gmail.com', NULL, 'Testing_', 13, '0', '578249838d0542d39c2c1e7a74ad2946.png', NULL, NULL, 'user', NULL, NULL, '45458548', '996965851325', NULL, '05 Dec, 2023', 'male', NULL, NULL, 'India', '565855546550', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'inactive', '2024-04-04 19:41:41', '2024-04-09 20:17:12'),
(154, 'RA728516', NULL, NULL, 'alex@yopmail.com', '$2y$12$zTIMgvWBltoL9CYUC1GHcOO0l3hy/T4T/Z37kK98wpm0LKbXWoYei', 'radiology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '1222', '07248702312', NULL, NULL, NULL, 'muzaffarnagar', 'noida', 'India', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'wwadsf', 'active', '2024-04-08 09:12:23', '2024-04-08 09:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_coordinator`
--

CREATE TABLE `doctor_coordinator` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `nurse_id` int(18) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_coordinator`
--

INSERT INTO `doctor_coordinator` (`id`, `doctor_id`, `nurse_id`, `created_at`, `updated_at`) VALUES
(1, 132, 131, '2024-03-30 05:54:31', '2024-03-30 05:54:31'),
(2, 132, 134, '2024-03-30 05:54:31', '2024-03-30 05:54:31'),
(3, 132, 111, '2024-03-30 05:54:31', '2024-03-30 05:54:31'),
(4, 132, 127, '2024-03-30 05:54:31', '2024-03-30 05:54:31'),
(5, 147, 134, '2024-04-02 06:08:02', '2024-04-02 06:08:02'),
(6, 147, 131, '2024-04-02 06:11:08', '2024-04-02 06:11:08'),
(7, 147, 131, '2024-04-02 06:11:54', '2024-04-02 06:11:54'),
(8, 147, 131, '2024-04-02 06:12:16', '2024-04-02 06:12:16'),
(9, 147, 131, '2024-04-02 06:12:33', '2024-04-02 06:12:33'),
(10, 147, 134, '2024-04-02 06:12:33', '2024-04-02 06:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_labs`
--

CREATE TABLE `doctor_labs` (
  `id` int(11) NOT NULL,
  `doctor_id` int(18) DEFAULT NULL,
  `lab_id` int(18) DEFAULT NULL,
  `status` enum('0','1','','') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_labs`
--

INSERT INTO `doctor_labs` (`id`, `doctor_id`, `lab_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 12, 12, NULL, '2024-01-23 07:18:26', '2024-01-23 07:18:26'),
(2, 15, 15, NULL, '2024-01-23 13:17:35', '2024-01-23 13:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_nurse`
--

CREATE TABLE `doctor_nurse` (
  `id` int(11) NOT NULL,
  `doctor_id` bigint(18) UNSIGNED DEFAULT NULL,
  `nurse_id` bigint(18) UNSIGNED DEFAULT NULL,
  `type` int(18) DEFAULT 0 COMMENT '0 is coordinator\r\n1 is nurse',
  `status` enum('0','1','','') DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_nurse`
--

INSERT INTO `doctor_nurse` (`id`, `doctor_id`, `nurse_id`, `type`, `status`, `created_at`, `updated_at`) VALUES
(9, 142, 134, 0, '0', '2024-03-20 10:50:17', '2024-03-20 10:50:17'),
(10, 145, 131, 0, '0', '2024-03-20 10:53:38', '2024-03-20 10:53:38'),
(11, 145, 95, 1, '0', '2024-03-20 10:53:38', '2024-03-20 10:53:38'),
(12, 145, 106, 1, '0', '2024-03-20 10:53:38', '2024-03-20 10:53:38'),
(13, 145, 111, 1, '0', '2024-03-20 10:53:38', '2024-03-20 10:53:38'),
(74, 146, 131, 0, '0', '2024-04-04 12:31:43', '2024-04-04 12:31:43'),
(97, 133, 134, 0, '0', '2024-04-09 06:52:07', '2024-04-09 06:52:07'),
(98, 133, 127, 0, '0', '2024-04-09 06:52:07', '2024-04-09 06:52:07'),
(107, 147, 131, 0, '0', '2024-04-09 07:41:52', '2024-04-09 07:41:52'),
(108, 147, 134, 0, '0', '2024-04-09 07:41:52', '2024-04-09 07:41:52'),
(109, 147, 84, 0, '0', '2024-04-09 07:41:52', '2024-04-09 07:41:52'),
(110, 147, 96, 0, '0', '2024-04-09 07:41:52', '2024-04-09 07:41:52'),
(113, 149, 134, 0, '0', '2024-04-09 11:23:54', '2024-04-09 11:23:54');

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
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subTitle` longtext DEFAULT NULL,
  `imageUpload` varchar(200) DEFAULT NULL,
  `list1` text DEFAULT NULL,
  `list1subtitle` longtext DEFAULT NULL,
  `list2` text DEFAULT NULL,
  `list2subtitle` longtext DEFAULT NULL,
  `list3` text DEFAULT NULL,
  `list3subtitle` longtext DEFAULT NULL,
  `list4` text DEFAULT NULL,
  `list4subtitle` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `subTitle`, `imageUpload`, `list1`, `list1subtitle`, `list2`, `list2subtitle`, `list3`, `list3subtitle`, `list4`, `list4subtitle`, `created_at`, `updated_at`) VALUES
(1, 'FAQ', 'Frequently Asked Questions', '407010604.jpeg', 'Why Interventional Radiology treatments are more expensive  compared to Surgery?', 'This is attributed to high cost of image guiding technologies, increasing\r\n                                                cost of high tech and complex consumables and pharmaceuticals used to\r\n                                                perform interventional Radiology procedures, as well as to the uniquely high\r\n                                                cost IR professional care ««« LEARN MORE about our high level care', 'I’ve insurance coverage, can I benefit from my plan to get  treated at Qastarat & Dawali Clinics?', 'No .. Our treatment services are primarily based on direct pay. However, some\r\n                                                insurer do offer reimbursement to their client, especially those with higher\r\n                                                insurance categories. Our nurse coordinator can help those patients with\r\n                                                coordinate processing all reports and documents needed to support their\r\n                                                claims should they need such help. Kindly note, a minimum of 5 working days\r\n                                                are required to provide needed documents ««« contact our nursing coordinator', 'Do you offer best price Guarantee protection? and if so how I   can  benefit from is this unique service?', 'YES, for sure! .. if you are offered cheaper price for the exact same IR\r\n                                                treatment at exact same consultant experience level at other place, then you\r\n                                                might be eligible for our best price match guarantee with additional 5%\r\n                                                discount. If you feel you are eligible to this service, then please feel\r\n                                                free to contact us here any time««« contact CALL CENTER', 'Does Qastarat & Dawali Clinics offer any special offers or  discounts to their patients?', 'Yes, for sure!.. In order to help our patients access needed treatments,\r\n                                                variable special discounts are being offered to specific community\r\n                                                individuals / groups, as well as to patients with limited socio-economics.\r\n                                                Unfortunately, we are restricted by the exceptionally high cost of delicate\r\n                                                items, tools, consumable, equipment\'s, technologies, as well as the highly\r\n                                                specialized IR professional care needed to deliver such unique treatments to\r\n                                                our patients at top most safety and efficacy. If you feel eligible to any\r\n                                                discount benefit, then do not hesitate to ««« contact CALL CENTER', '2024-04-05 04:39:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` int(11) NOT NULL,
  `websitelogo` varchar(255) DEFAULT NULL,
  `HeadquarterLocation` varchar(255) DEFAULT NULL,
  `Mailingaddress` varchar(255) DEFAULT NULL,
  `CallCenter` varchar(255) DEFAULT NULL,
  `logo1` varchar(255) DEFAULT NULL,
  `logo1whatsapp` varchar(255) DEFAULT NULL,
  `logo1phone` varchar(255) DEFAULT NULL,
  `logo2` varchar(255) DEFAULT NULL,
  `logo2whatsapp` varchar(255) DEFAULT NULL,
  `logo2phone` varchar(255) DEFAULT NULL,
  `logo3` varchar(255) DEFAULT NULL,
  `logo3whatsapp` varchar(255) DEFAULT NULL,
  `logo3phone` varchar(255) DEFAULT NULL,
  `logo4` varchar(255) DEFAULT NULL,
  `logo4whatsapp` varchar(255) DEFAULT NULL,
  `logo4phone` varchar(255) DEFAULT NULL,
  `text1` text DEFAULT NULL,
  `facebook_link` mediumtext DEFAULT NULL,
  `twitter_link` mediumtext DEFAULT NULL,
  `instagram_link` mediumtext DEFAULT NULL,
  `linkedin_link` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `websitelogo`, `HeadquarterLocation`, `Mailingaddress`, `CallCenter`, `logo1`, `logo1whatsapp`, `logo1phone`, `logo2`, `logo2whatsapp`, `logo2phone`, `logo3`, `logo3whatsapp`, `logo3phone`, `logo4`, `logo4whatsapp`, `logo4phone`, `text1`, `facebook_link`, `twitter_link`, `instagram_link`, `linkedin_link`, `created_at`, `updated_at`) VALUES
(1, '657131764.png', '18 November Street-North Azaiba Muscat- Oman', 'PO Box 64 Azaiba, Postal code: 130 Muscat, Oman', '971581114000', '1550277030.png', '968 9200 0230', '968 9200 0230', '2145939692.png', '971 5 81114000', '971 5 81114000', '1443446468.png', '966 56060 0614', '966 56060 0614', '140570538.png', '973 3 360 0620', '973 3 360 0620', 'Send your suggestions and complaints here', '#', '#', '#', '#', '2024-04-05 05:00:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subTitle` longtext DEFAULT NULL,
  `reasonalClinics` bigint(20) DEFAULT NULL,
  `gccCountries` bigint(20) DEFAULT NULL,
  `satellietesCenters` bigint(20) DEFAULT NULL,
  `populationServed` bigint(20) DEFAULT NULL,
  `yearsExperience` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `title`, `subTitle`, `reasonalClinics`, `gccCountries`, `satellietesCenters`, `populationServed`, `yearsExperience`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to Qastarat clinics platform', 'Amazing therapies of Future delivered today!', 4, 4, 18, 46, 33, '2024-04-04 10:12:25', '2024-01-02 18:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `lab_has_tasks`
--

CREATE TABLE `lab_has_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nurse_task_id` bigint(255) UNSIGNED DEFAULT NULL,
  `lab_id` bigint(255) DEFAULT NULL,
  `status` enum('lab_report_uploaded','pending','approved') NOT NULL DEFAULT 'pending',
  `appoinment_date` varchar(255) DEFAULT NULL,
  `appoinment_time` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lab_has_tasks`
--

INSERT INTO `lab_has_tasks` (`id`, `nurse_task_id`, `lab_id`, `status`, `appoinment_date`, `appoinment_time`, `document`, `created_at`, `updated_at`) VALUES
(1, 1, 117, 'pending', NULL, NULL, NULL, '2024-03-15 05:01:06', '2024-03-15 05:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `geographicLocation` text DEFAULT NULL,
  `appointmentType` text DEFAULT NULL,
  `postalAddress` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `geographicLocation`, `appointmentType`, `postalAddress`, `created_at`, `updated_at`) VALUES
(1, 'Slade Floyd update', 'Illo ducimus autem', '0', 'Error et quo odio ac', '2024-04-09 09:38:55', '2024-04-09 09:38:55'),
(2, 'Slade Floyd', 'Illo ducimus autem', '0', 'Error et quo odio ac', '2024-04-09 09:46:45', '2024-04-09 09:46:45'),
(3, 'Kelsey Rice', 'Illo ducimus autem', '0', 'Error et quo odio ac', '2024-04-09 09:46:58', '2024-04-09 09:46:58'),
(4, 'Slade', 'Illo ducimus autem', '2', 'Error et quo odio ac', '2024-04-09 10:54:02', '2024-04-09 10:54:02'),
(5, 'update test', 'Illo ducimus autem', '0', 'testing', '2024-04-09 12:04:46', '2024-04-09 12:04:46'),
(6, 'Slade Floyd update', 'Illo ducimus autem', '1', 'dddd', '2024-04-09 12:10:14', '2024-04-09 12:10:14');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2023_12_18_075859_create_otps_table', 2),
(9, '2023_12_19_051257_create_admins_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nurse_doctor`
--

CREATE TABLE `nurse_doctor` (
  `id` int(11) NOT NULL,
  `nurse_id` bigint(18) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(18) UNSIGNED DEFAULT NULL,
  `status` enum('0','1','','') DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nurse_doctor`
--

INSERT INTO `nurse_doctor` (`id`, `nurse_id`, `doctor_id`, `status`, `created_at`, `updated_at`) VALUES
(9, 106, 12, '0', '2024-02-27 13:21:41', '2024-02-27 13:21:41'),
(15, 107, 2, '0', '2024-02-27 13:23:47', '2024-02-27 13:23:47'),
(16, 111, 2, '0', '2024-02-28 05:15:39', '2024-02-28 05:15:39'),
(17, 131, 12, '0', '2024-03-12 09:26:49', '2024-03-12 09:26:49'),
(22, 134, 2, '0', '2024-04-03 07:56:13', '2024-04-03 07:56:13'),
(23, 134, 133, '0', '2024-04-03 07:56:13', '2024-04-03 07:56:13'),
(34, 127, 133, '0', '2024-04-09 09:09:47', '2024-04-09 09:09:47');

-- --------------------------------------------------------

--
-- Table structure for table `nurse_has_tasks`
--

CREATE TABLE `nurse_has_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nurse_task_id` bigint(255) UNSIGNED DEFAULT NULL,
  `nurse_id` bigint(255) DEFAULT NULL,
  `status` enum('assigned_to_lab','pending','approved') NOT NULL DEFAULT 'pending',
  `appoinment_date` varchar(255) DEFAULT NULL,
  `appoinment_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nurse_has_tasks`
--

INSERT INTO `nurse_has_tasks` (`id`, `nurse_task_id`, `nurse_id`, `status`, `appoinment_date`, `appoinment_time`, `created_at`, `updated_at`) VALUES
(1, 1, 127, 'assigned_to_lab', '03 Mar, 2024', '12:03 AM', '2024-03-14 13:37:57', '2024-03-14 13:37:57'),
(2, 4, 127, 'pending', '18 Mar, 2024', '12:04 AM', '2024-03-14 13:38:12', '2024-03-14 13:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `nurse_tasks`
--

CREATE TABLE `nurse_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) DEFAULT NULL,
  `doctor_id` bigint(100) UNSIGNED DEFAULT NULL,
  `nurse_id` bigint(255) UNSIGNED DEFAULT NULL,
  `assigned_id` bigint(100) DEFAULT NULL,
  `pathology_price_list_id` longtext DEFAULT NULL,
  `status` enum('pending','approved') DEFAULT 'pending',
  `form_type` varchar(255) DEFAULT NULL,
  `test_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nurse_tasks`
--

INSERT INTO `nurse_tasks` (`id`, `patient_id`, `doctor_id`, `nurse_id`, `assigned_id`, `pathology_price_list_id`, `status`, `form_type`, `test_type`, `created_at`, `updated_at`) VALUES
(1, '100', 132, 131, NULL, '[\"56\",\"55\"]', 'pending', 'general_form', 'pathology', '2024-03-12 13:08:22', '2024-03-12 13:08:22'),
(2, '100', 132, 131, NULL, '[\"52\",\"51\",\"43\"]', 'pending', 'general_form', 'pathology', '2024-03-12 13:09:00', '2024-03-12 13:09:00'),
(3, '102', 133, 134, NULL, '[\"15\",\"11\"]', 'pending', 'general_form', 'radiology', '2024-03-13 12:50:22', '2024-03-13 12:50:22'),
(4, '102', 133, 134, NULL, '[\"58\",\"53\"]', 'pending', 'general_form', 'pathology', '2024-03-14 07:14:30', '2024-03-14 07:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `order_imaginary_exam_tests`
--

CREATE TABLE `order_imaginary_exam_tests` (
  `id` int(255) UNSIGNED NOT NULL,
  `test_name` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_imaginary_exam_tests`
--

INSERT INTO `order_imaginary_exam_tests` (`id`, `test_name`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'X ray', '2 week', '2024-02-12 22:51:37', '2024-02-12 22:51:37'),
(2, 'Ultrasound', '1 day', '2024-02-12 22:51:55', '2024-02-12 07:00:00'),
(3, 'endoscopy', '1 month', NULL, NULL),
(4, 'CT Scan', '1 year', NULL, NULL),
(5, 'MRI', '2 month', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_lab_tests`
--

CREATE TABLE `order_lab_tests` (
  `id` int(11) NOT NULL,
  `test_name` varchar(255) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_lab_tests`
--

INSERT INTO `order_lab_tests` (`id`, `test_name`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'Hydroxyprogesterone', '1 month', NULL, NULL),
(2, '24 Hour Urinary Calcium', '1 month', NULL, NULL),
(3, '5 HIAA', '1 month', NULL, NULL),
(4, '6-TGN', '1 month', NULL, NULL),
(5, 'Acetone', '1 month', NULL, NULL),
(6, 'Acetyl Choline Receptor Abs', '1 month', NULL, NULL),
(7, 'Acid phosphatase (prostatic)', '1 month', NULL, NULL),
(8, 'Activated Protein C Resistance', '1 month', NULL, NULL),
(9, 'Active B12', '1 month', NULL, NULL),
(10, 'Adalimumab Level', '1 month', NULL, NULL),
(11, 'Adenovirus PCR', '1 month', NULL, NULL),
(12, 'Adiponectin', '1 month', NULL, NULL),
(13, 'Adrenal Antibodies', '1 month', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `user_id`, `otp`, `status`, `number`, `created_at`, `updated_at`) VALUES
(1, 3, 123456, 'active', NULL, '2023-12-18 06:49:31', '2023-12-18 06:49:39'),
(2, 3, 123456, 'active', NULL, '2023-12-18 06:49:53', '2023-12-18 06:50:21'),
(3, 1, 685617, 'active', NULL, '2023-12-19 16:34:20', '2023-12-25 04:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `our_doctors`
--

CREATE TABLE `our_doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` longtext DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `facebook_link` mediumtext DEFAULT NULL,
  `twitter_link` mediumtext DEFAULT NULL,
  `instagram_link` mediumtext DEFAULT NULL,
  `linkedin_link` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_doctors`
--

INSERT INTO `our_doctors` (`id`, `name`, `desc`, `img`, `facebook_link`, `twitter_link`, `instagram_link`, `linkedin_link`, `created_at`, `updated_at`) VALUES
(2, 'Dr. Perry barkley', 'Family physician', 'doctors-6.jpg', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://www.instagram.com/', 'https://www.linkedin.com/signup', '2024-01-02 09:05:51', '0000-00-00 00:00:00'),
(3, 'Dr. Gail parrish', 'General surgeon', 'doctors-8.jpg', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://www.instagram.com/', 'https://www.linkedin.com/signup', '2024-01-02 09:05:51', '0000-00-00 00:00:00'),
(6, 'Dr. Helen scheffler', 'Oncologist', 'doctors-7.jpg', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://www.instagram.com/', 'https://www.linkedin.com/signup', '2024-01-02 09:10:41', '0000-00-00 00:00:00'),
(7, 'Dr. Perry barkley', 'Family physician', 'doctors-5.jpg', 'https://www.facebook.com', 'https://twitter.com/?lang=en', 'https://www.instagram.com/', 'https://www.linkedin.com/signup', '2024-01-02 09:10:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `our_services`
--

CREATE TABLE `our_services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` longtext DEFAULT NULL,
  `service_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_services`
--

INSERT INTO `our_services` (`id`, `title`, `desc`, `service_img`, `created_at`, `updated_at`) VALUES
(1, 'Cardiac Surgery', 'there are many variations of Lorem Ipsum available, but the majority have suffered alteration in some form', 'Cardiac-Surgery.jpg', '2024-01-02 07:07:14', '0000-00-00 00:00:00'),
(2, 'Bipolar Disorder', 'there are many variations of Lorem Ipsum available, but the majority have suffered alteration in some form', 'Bipolar-Disorder.jpg', '2024-01-02 07:09:06', '0000-00-00 00:00:00'),
(3, 'Depression', 'there are many variations of Lorem Ipsum available, but the majority have suffered alteration in some form', 'Depression.jpg', '2024-01-02 07:09:06', '0000-00-00 00:00:00'),
(4, 'diagnosis   ', 'there are many variations of Lorem Ipsum available, but the majority have suffered alteration in some form', 'Diagonsis.jpg', '2024-01-02 07:10:53', '0000-00-00 00:00:00'),
(5, 'coronary heart', 'there are many variations of Lorem Ipsum available, but the majority have suffered alteration in some form', 'Cardiac-Surgery.jpg', '2024-01-02 07:23:38', '0000-00-00 00:00:00'),
(6, 'Cardiac Rehabilitation', 'there are many variations of Lorem Ipsum available, but the majority have suffered alteration in some form', 'Cardiac-Rehabilitation.jpg', '2024-01-02 07:11:51', '0000-00-00 00:00:00');

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
-- Table structure for table `pathologys`
--

CREATE TABLE `pathologys` (
  `id` int(11) NOT NULL,
  `lab_name` varchar(100) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile_phone` varchar(100) DEFAULT NULL,
  `landline` varchar(100) DEFAULT NULL,
  `post_code` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pathologys`
--

INSERT INTO `pathologys` (`id`, `lab_name`, `email_address`, `password`, `mobile_phone`, `landline`, `post_code`, `street`, `town`, `country`, `created_at`, `updated_at`) VALUES
(3, '12345y', 'rajhimasnhu111222@gmail.com', NULL, '07248702312', '213', '251201', 'muzaffarnagar 1234', 'noida  1234', 'india', '2024-01-19 07:53:13', '2024-01-19 07:53:13'),
(5, 'Regina Perry', 'fedygodode@mailinator.com', NULL, '+1 (429) 752-1778', '1234567890', 'Quo hic corrupti in', 'Et qui mollitia vero', 'Eligendi repudiandae', 'canada', '2024-01-24 09:44:34', '2024-01-24 09:44:34'),
(6, 'Hop Booth up', 'mikauu@mailinator.com', NULL, '+1 (466) 199-7074', 'Proident dolorem di', 'Quidem laboris ad do', 'Id dignissimos eaque', 'Reiciendis placeat', 'india', '2024-01-24 09:58:07', '2024-01-24 09:58:07'),
(7, 'demo lab', 'lab@gmail.com', NULL, '123', '1564856', '\\836858', '5537', '585755', 'india', '2024-01-29 09:48:23', '2024-01-29 09:48:23'),
(8, 'Hop Booth', 'doctor2@gmail.com', '$2y$12$t1IYztBqZlunSufzgCLdD.5jN2EbXxrIvXekZ3yhORRglAjyOfr8G', '+1 (466) 199-7074', '0987654321', '1234', 'noida', 'noida', 'india', '2024-01-31 05:59:06', '2024-01-31 05:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `pathology_price_list`
--

CREATE TABLE `pathology_price_list` (
  `id` int(11) NOT NULL,
  `test_name` varchar(150) DEFAULT NULL,
  `test_code` varchar(150) DEFAULT NULL,
  `included_tests` varchar(150) DEFAULT NULL,
  `turnaround` varchar(150) DEFAULT NULL,
  `note` varchar(150) DEFAULT NULL,
  `price` longtext DEFAULT NULL,
  `price_type` int(10) DEFAULT NULL,
  `colour_type` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pathology_price_list`
--

INSERT INTO `pathology_price_list` (`id`, `test_name`, `test_code`, `included_tests`, `turnaround`, `note`, `price`, `price_type`, `colour_type`, `created_at`, `updated_at`) VALUES
(1, '17 Hydroxyprogesterone', '1 week', '17 Hydroxyprogesterone', '1 week	', 'Aliquot from 24hr urine (on acid). State total volume collected on request form.', '12', NULL, NULL, '2024-01-22 06:19:28', '2024-01-22 13:19:28'),
(2, '17 Hydroxyprogesterone 1', '3', '17 Hydroxyprogesterone 5', '12', 'Aliquot from 24hr urine (on acid). State total volume collected on request form.  6', '20 4', NULL, NULL, '2024-01-22 06:25:42', '2024-01-22 13:19:16'),
(3, 'A', 'B', '123', 'C', '123', '23', NULL, NULL, '2024-01-22 07:00:25', '2024-01-22 07:00:25'),
(4, '123', '123', 'ER', '12', 'ER', '12', NULL, NULL, '2024-01-22 07:00:25', '2024-01-22 07:00:25'),
(5, '21', '21', '21', '21', '21', '21', NULL, NULL, '2024-01-22 07:01:56', '2024-01-22 07:01:56'),
(6, 'Bone scan', '237841', NULL, 'Bone scan', NULL, '230.55', 2, NULL, '2024-04-04 11:39:45', '2024-01-22 07:23:28'),
(7, 'A', NULL, '12', 'C', 'ER', '3', 1, NULL, '2024-02-20 11:54:06', '2024-01-22 07:33:25'),
(8, 'Adria Hamilton', 'Soluta non fugiat as', 'Sunt perferendis rer', NULL, 'Porro deleniti expli', '697', 1, NULL, '2024-02-20 11:53:17', '2024-01-24 10:41:16'),
(9, 'Laith Mooney', 'Omnis nulla quam qua', 'Reprehenderit consec', 'Laudantium corporis', 'Dolore ut assumenda', '924', 1, NULL, '2024-01-24 10:41:16', '2024-01-24 10:41:16'),
(10, 'Nuclear Medicine Scans', '87458', 'Minim eaque voluptat', 'Omnis minim quos in', 'Commodi cillum moles', '221.25', 2, NULL, '2024-04-04 11:39:35', '2024-01-24 10:41:56'),
(11, 'Fluoroscopy', '8745158', 'Deserunt laborum ad', 'Eu facere consectetu', 'Voluptatibus error e', '450.00', 2, NULL, '2024-04-04 11:38:57', '2024-01-24 10:41:56'),
(12, 'Nevada Ortega', 'Labore doloribus nos', NULL, 'Officia sed libero a', 'Autem minima et haru', '365', 1, NULL, '2024-02-20 11:53:02', '2024-02-20 11:28:58'),
(13, 'Talon Bolton', 'Duis sapiente dolor', 'Non labore dolor eni', 'Id iusto est nostrum', 'Nemo sit cillum ven', NULL, 1, NULL, '2024-02-20 11:52:49', '2024-02-20 11:28:58'),
(14, 'Nasim Alford', 'Praesentium asperiorrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 'Molestias ut sit alibbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 'Error aut elit sunttttttttttttttttttttttt', '36.25+', '261', 1, NULL, '2024-02-20 11:54:18', '2024-02-20 11:35:38'),
(15, 'Thyroid ultrasound', '8745454', 'Optio voluptatem L', 'Assumenda odit quis', 'Dolore sit sunt opti', '148.58', 2, NULL, '2024-04-04 11:39:11', '2024-02-20 12:19:25'),
(16, 'ihgjhk', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-02-23 09:55:06', '2024-02-23 09:55:06'),
(17, 'Mufutau House', 'Illum molestiae sin', 'Molestiae placeat v', 'Distinctio Consecte', 'Qui non quod excepte', '910', 1, NULL, '2024-02-28 10:43:54', '2024-02-28 10:43:54'),
(18, 'Caldwell Byrd', 'Rerum consequatur no', 'Quis repellendus Ev', 'Expedita labore quib', 'Officiis rerum provi', '29', 1, NULL, '2024-02-28 10:44:30', '2024-02-28 10:44:30'),
(19, 'Neve Vinson', 'Ratione sunt dolori', 'Sunt est sunt evenie', 'Qui et neque excepte', 'Non anim eveniet ip', '430', 1, NULL, '2024-02-28 10:44:48', '2024-02-28 10:44:48'),
(20, 'Demetria Hunter', 'Pariatur Maiores in', 'Aute qui est laboris', 'Vel anim ullam rerum', 'Consectetur et bland', '771', 1, NULL, '2024-02-28 10:48:23', '2024-02-28 10:48:23'),
(21, 'Iris Little', 'A', 'N', 'N', 'A', '3', 1, NULL, '2024-02-28 10:59:07', '2024-02-28 10:59:07'),
(22, 'Julie Weiss', 'D', 'E', 'V', 'L', '1', 1, NULL, '2024-02-28 11:00:39', '2024-02-28 11:00:39'),
(23, 'Amal Simpson', 'Dolor architecto vit', 'Sunt ea quam nemo pa', 'Voluptas in incididu', 'D', '919', 1, NULL, '2024-02-28 11:01:10', '2024-02-28 11:01:10'),
(24, 'Barbara Fleming', 'Perspiciatis nobis', 'Nulla modi error ven', 'Quas illo similique', 'I', '562', 1, NULL, '2024-02-28 11:01:35', '2024-02-28 11:01:35'),
(25, 'Test Name', 'Test Name Test Code', 'Included Tests', 'Turnaround', 'N', '100', 1, NULL, '2024-02-28 11:02:28', '2024-02-28 11:02:28'),
(26, 'Neve Mcguire', 'Eos qui non est acc', 'Atque ipsum aliquid', 'Eum voluptatibus dol', 'Inventore odio a ut', '872', 1, NULL, '2024-02-28 11:03:13', '2024-02-28 11:03:13'),
(27, 'HBC1', '85252', 'mkjhgc', 'jhgf', 'kohgf', '861', 1, NULL, '2024-04-04 11:08:15', '2024-02-28 11:03:47'),
(28, 'Total Bilirubin', '98555985', 'Similique reprehende', 'Atque provident atq', 'Iure praesentium rec', '99', 1, NULL, '2024-04-04 11:07:43', '2024-02-28 11:10:15'),
(29, 'GGTP', '545454', 'Aut perferendis exer', 'Mollit dolore debiti', 'Ut sequi ut nobis ad', '158', 1, NULL, '2024-04-04 11:06:39', '2024-02-28 11:19:13'),
(30, 'Thyroid T1', '5665', 'Sint natus voluptati', 'Voluptates eius assu', 'Iusto perspiciatis', '129', 1, NULL, '2024-04-04 11:06:17', '2024-02-28 11:19:13'),
(31, 'RBC', '526525', 'Repudiandae voluptat', 'Non pariatur Anim c', 'Neque ipsam fugiat n', '99', 1, NULL, '2024-04-04 11:05:43', '2024-02-28 11:19:29'),
(32, 'TB TSH', '45656', 'Sapiente rem laudant', 'Veritatis non delect', 'Aut sint necessitat', '69', 1, NULL, '2024-04-04 11:05:14', '2024-02-28 11:19:29'),
(33, 'Liver Test', '7', 'Aut amet tempore a', 'A est esse et accus', 'Ad praesentium velit', '55', 1, NULL, '2024-04-04 11:04:47', '2024-02-28 11:30:32'),
(34, 'Blood Test', '451265', 'njhhhhhhjhhh  hghgh', 'knjhgf', 'kjhg bhggui njb', '76', 1, NULL, '2024-04-03 11:05:56', '2024-02-28 11:31:06'),
(35, 'Dillon Boyle', 'Ut et sit id sed iur', 'Atque excepturi dolo', 'Tempor amet dolores', 'Iure laboris impedit', '252', NULL, NULL, '2024-02-28 11:39:45', '2024-02-28 11:39:45'),
(36, 'Nelle Smith', 'Dolor enim numquam q', 'Commodi rem enim seq', 'Ea ea eiusmod volupt', 'In sed suscipit quas', '550', NULL, NULL, '2024-02-28 11:40:05', '2024-02-28 11:40:05'),
(37, 'Sonia Copeland', 'Ut sit repudiandae a', 'Eius et voluptatum e', 'Dolorem sit est saep', 'Nobis sed corporis e', '702', NULL, NULL, '2024-02-28 11:40:19', '2024-02-28 11:40:19'),
(38, 'Jenette Key', 'Mollit irure fugiat', 'Quis ad aut accusant', 'Cupidatat quasi ut e', 'In enim deleniti tem', '49', NULL, NULL, '2024-02-28 11:42:24', '2024-02-28 11:42:24'),
(39, 'Luke Hampton', 'Velit magna volupta', 'Dolor nesciunt in e', 'Do quia harum veniam', 'Asperiores ut in dol', '917', NULL, NULL, '2024-02-28 11:57:18', '2024-02-28 11:57:18'),
(40, 'Philip Harmon', 'Aperiam velit at dol', 'Reprehenderit inven', 'Ipsa magni facilis', 'Est veniam archite', '153', NULL, NULL, '2024-02-28 11:57:18', '2024-02-28 11:57:18'),
(41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 11:58:10', '2024-02-28 11:58:10'),
(42, '', '', '', '', '', '', 4, NULL, '2024-02-28 12:23:34', '2024-02-28 12:23:34'),
(43, 'Kidney Function Test', '4874512', 'Libero voluptatum al', 'Eaque dolores exerci', 'Consectetur aliquip', '49', 1, NULL, '2024-04-04 11:04:27', '2024-02-28 12:23:34'),
(44, 'Platelets counts', '44441', 'Enim voluptas sint m', 'Deserunt nisi quam a', 'Aspernatur qui in ea', '120', 1, NULL, '2024-04-04 10:46:14', '2024-02-28 12:23:34'),
(45, '', '', '', '', '', '', 4, NULL, '2024-02-28 12:23:45', '2024-02-28 12:23:45'),
(46, '', '', '', '', '', '', 4, NULL, '2024-02-28 12:23:51', '2024-02-28 12:23:51'),
(47, '', '', '', '', '', '', 4, NULL, '2024-02-28 12:23:58', '2024-02-28 12:23:58'),
(48, NULL, 'Dolor architecto vit', NULL, NULL, NULL, '45', NULL, NULL, '2024-02-28 12:25:17', '2024-02-28 12:25:17'),
(49, 'CCW', '55845158', 'Qui labore consequat', 'Omnis do nobis conse', 'Adipisicing incidunt', '59', 1, NULL, '2024-04-04 10:43:57', '2024-02-28 12:25:39'),
(50, 'BBC', '55454', 'In incididunt autem', 'Voluptatem sunt con', 'Consequuntur do vel', '85.00', 1, NULL, '2024-04-04 11:41:36', '2024-02-28 12:26:12'),
(51, 'PCV', '74', 'Laborum Incididunt', 'Velit porro mollitia', 'Repellendus Provide', '79.00', 1, NULL, '2024-04-04 11:41:28', '2024-02-28 12:26:12'),
(52, 'TLC', '44848', 'Illo eum voluptate l', 'Quis officiis minima', 'Autem reprehenderit', '89.00', 1, NULL, '2024-04-04 11:41:19', '2024-02-28 12:26:12'),
(53, 'Urine Analysis', '1522', 'Ea sequi commodo sin', 'Beatae eos do volup', 'Cillum non asperiore', '99.20', 1, NULL, '2024-04-04 11:41:10', '2024-02-28 12:26:12'),
(54, 'Hb', '24554', 'Ullamco qui at volup', 'Placeat reiciendis', 'Aute qui neque offic', '68.00', 1, NULL, '2024-04-04 11:40:59', '2024-02-28 12:26:12'),
(55, 'Dairia', 'Aliquam facilis cons', 'Ut est cupiditate m', 'Proident tempore l', 'Praesentium deserunt', '50.20', 1, NULL, '2024-04-04 11:40:50', '2024-02-28 12:27:01'),
(56, 'Viral Test', 'Test', 'Totam maiores ipsum', 'Exercitationem aliqu', 'Distinctio Suscipit', '200.20', 1, NULL, '2024-04-04 11:40:41', '2024-02-28 12:27:45'),
(57, 'Typhoid', 'U1234', 'Test', 'test', 'test', '100.52', 1, NULL, '2024-04-04 11:40:31', '2024-02-28 12:34:39'),
(58, 'Urine Test', 'U123', 'Testing', 'Test', 'Testing', '120.00', 1, NULL, '2024-04-04 11:40:22', '2024-02-28 12:34:59'),
(59, 'Magnetic Resonance Imaging (MRI)', '854128754', 'Quasi sed nesciunt', 'Dicta vel eos culpa', 'Quod ex qui dolores', '591.25', 2, NULL, '2024-04-04 11:38:37', '2024-02-28 12:41:05'),
(60, 'Computed Tomography (CT)', '875421', 'Optio aliquip unde', 'Iste ab ut modi labo', 'Ex eum rerum illum', '223.68', 2, NULL, '2024-04-04 11:39:23', '2024-02-28 12:43:45'),
(61, 'Ulterasound1', '45154', 'Ipsa ad exercitatio', 'Obcaecati do modi ir', 'Repudiandae sint vo', '499.00', 2, NULL, '2024-04-04 11:38:21', '2024-02-28 12:43:45'),
(62, 'MRI', '9856210', 'kjjnedmok', 'kjemednk', 'keirjr', '99.58', 2, NULL, '2024-04-04 11:38:13', '2024-02-28 12:59:50'),
(63, 'X-Ray', '956356', NULL, NULL, NULL, '129.00', 2, NULL, '2024-04-04 11:38:03', '2024-02-28 13:00:04'),
(64, 'T3,T4', 'T85484', 'Urine TestUrine TestUrine', 'T3,T4', 'Urine TestUrine TestUrine TestUrine TestUrine TestUrine TestUrine TestUrine.', '25.88', 1, NULL, '2024-04-04 11:40:13', '2024-04-04 10:30:43'),
(65, 'Ultrasound', 'QC1001', 'mild ultrasound', '2 days', 'demo', '200', 1, NULL, '2024-04-05 09:35:38', '2024-04-05 09:35:38'),
(66, NULL, NULL, NULL, NULL, 'sd  df  df df  fd df fd df df df df fd fd df fd', NULL, NULL, NULL, '2024-04-05 11:54:25', '2024-04-05 11:54:25'),
(81, 'Amela Sanchez', 'Fuga A possimus re', 'Natus ut velit atqu', 'Sint natus asperiore', 'Ipsum impedit voluptatibus in quam totam nisi vol', '593', 1, NULL, '2024-04-08 11:46:26', '2024-04-08 11:46:26'),
(82, 'Palmer Boyd', 'Laboris irure modi p', 'Sint voluptas in no', 'Quibusdam ipsum numq', 'Aut natus aliquam amet et commodo quod eveniet q', '22', 0, '5194e7', '2024-04-08 11:49:52', '2024-04-08 11:46:26'),
(83, 'Darryl Coffey', 'Voluptatem Corporis', 'Ratione laborum beat', 'Voluptatem numquam', 'Quis quo libero sit consequuntur inventore molesti', '350', 1, '#5194e7', '2024-04-08 11:50:01', '2024-04-08 11:50:01'),
(84, 'Davis Ortiz', 'Veritatis id et laud', 'Vel fugiat animi o', 'Tempora ut eos id s', 'Qui repellendus Aliquip odio autem lorem quae in', '683', 1, '#b0e368', '2024-04-08 11:50:01', '2024-04-08 11:50:01'),
(85, 'Philip Meyer', 'Doloribus cillum sim', 'Exercitationem beata', 'Maiores eveniet tem', 'Porro sit quia sapiente voluptatibus qui recusanda', '74', 2, '#e2a106', '2024-04-08 12:00:05', '2024-04-08 12:00:05'),
(86, 'Clementine Solomon', 'Quos voluptate animi', 'Et ut eos voluptatem', 'Et proident laborio', 'Voluptate irure maiores at dignissimos ea odit vel', '309', 1, '#fe38cc', '2024-04-09 06:02:14', '2024-04-09 06:02:14'),
(87, 'test', '123', 'testing', 'Lorem fugiat maxime', 'tested by hareram', '200', 0, '#000000', '2024-04-09 06:30:15', '2024-04-09 06:30:15'),
(88, 'Anika Park', 'Porro maxime quia se', 'Sed alias adipisicin', 'Tempor necessitatibu', 'Amet quo asperiores cum asperiores ipsa tempora', '809', 1, '#d9974b', '2024-04-09 06:32:58', '2024-04-09 06:32:58'),
(89, 'Pandora Gates', 'Minus provident con', 'Provident asperiore', 'Dolor qui exercitati', 'Pariatur Voluptate est reprehenderit reiciendis', '625', 1, '#ee32ef', '2024-04-09 06:33:18', '2024-04-09 06:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `doctor_id` int(18) DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_verified` enum('1','0') DEFAULT '0',
  `patient_profile_img` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `post_code` bigint(20) DEFAULT NULL,
  `mobile_no` bigint(20) DEFAULT NULL,
  `sirname` varchar(12) DEFAULT NULL,
  `birth_date` varchar(255) DEFAULT NULL,
  `gendar` enum('male','female','other') DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `landline` varchar(50) DEFAULT NULL,
  `document_type` varchar(100) DEFAULT NULL,
  `patient_id` varchar(255) DEFAULT NULL,
  `gp` varchar(255) DEFAULT NULL,
  `kin` varchar(255) DEFAULT NULL,
  `policy_no` varchar(255) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `id_proof` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `doctor_id`, `title`, `name`, `email`, `is_verified`, `patient_profile_img`, `role`, `email_verified_at`, `password`, `remember_token`, `post_code`, `mobile_no`, `sirname`, `birth_date`, `gendar`, `street`, `town`, `country`, `landline`, `document_type`, `patient_id`, `gp`, `kin`, `policy_no`, `additional_info`, `tags`, `id_proof`, `created_at`, `updated_at`) VALUES
(2, NULL, NULL, NULL, 'userS', 'patient@gmail.com', '0', 'team-3.jpg', 'user', NULL, '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', 'kktAEaWn1EJ1Kgc73UVcJabC1KPLUR', 1234, 1234567890, 'Mrs', '04 Dec, 2000', 'male', 'noida', 'noida', 'Algeria', '987654321', 'Address proof', 'QD001', '98765432100', NULL, 'sunny po', 'okkk', '<div class=\"category\">ssss<i class=\"remove-category fas fa-times\"></i></div>', NULL, '2023-12-19 20:57:59', '2024-01-08 20:30:43'),
(4, NULL, NULL, NULL, 'hareram 2', 'patient12@gmail.com', '0', 'team-2.jpg', 'user', NULL, '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', NULL, 90909, 990900909, 'dr', '06 Dec, 1998', 'male', 'noida', 'noida 1', 'Albania', '909090909', 'Address proof', 'pat12345', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-20 01:14:53', '2023-12-20 01:14:53'),
(33, NULL, NULL, NULL, 'lalit', 'lalit1233@gmail.com', '0', 'team-5.jpg', 'user', NULL, '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', NULL, 91008, 8987365432, 'Mrs', '10 Dec, 2000', 'female', 'noida 3', 'noida 4', 'American Samoa', '998765439', 'Passport', 'lait00124560', '92765432100', 'kin test', '123456780', 'ok...... testing', '<div class=\"category\">ok<i class=\"remove-category fas fa-times\"></i></div><div class=\"category\">TR<i class=\"remove-category fas fa-times\"></i></div><div class=\"category\">DE<i class=\"remove-category fas fa-times\"></i></div>', NULL, '2023-12-21 12:40:45', '2024-01-09 11:50:36'),
(34, NULL, NULL, NULL, 'Martha Leach', 'fovaq@mailinator.com', '0', '1181933958.png', 'user', NULL, '$2y$12$O5brMtCBdvy.zizxpOlJguZwEayIB80WSnOR1QZetOcPan7SgFwJK', NULL, 123456789, 909098888, 'Professor', '09 Mar, 1997', 'male', 'Aliquip accusantium', 'Placeat nulla eaque', 'Armenia', '1234567890', 'Address proof', 'MA836196', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, NULL, NULL, NULL, 'Clarke Macdonald', 'lesihyzun@mailinator.com', '0', '1582233871.png', 'user', NULL, '$2y$12$1V8oAMsCw1OHg9e8rbna4uJCi7bLDxVMVLZ142scZogd1EOqmHqzS', NULL, 1234, 8888788787, 'Lady', '15 Sep, 1972', 'female', 'Sunt elit ut culpa', 'Consectetur ratione', 'Aruba', '12345678', 'Address proof', 'MA509999', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-09 05:56:22', '2024-01-09 05:56:22'),
(36, NULL, NULL, NULL, 'Nyssa Mcdonald', 'bawijakit@mailinator.com', '0', '849163702.png', 'user', NULL, '$2y$12$FJi/5cnVLj1CEB48hqkElOg5CPsYTAy/.uMoavCf.SLpEY/1ujUrS', NULL, 123456, 909000000, 'Sir', '03 Mar, 2003', 'female', 'Accusantium sapiente', 'Sapiente non repelle', 'Albania', '1234567', 'Address proof', 'MA261804', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-09 06:44:00', '2024-01-09 06:44:00'),
(37, NULL, NULL, NULL, 'hareram kumar', 'doctor2iii@gmail.com', '0', '1692048410.png', 'user', NULL, '$2y$12$ESsmd3pzlDWVm1l5jrARlevUfWkNw2.Tq3NlIDDUZK4lAQu8alUJ6', NULL, 1234, 39087654320, 'mr', '01 Jan, 2024', 'male', 'noida', 'noida', 'Åland Islands', '12534567890', 'Passport', 'MA210964', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-09 06:45:49', '2024-01-09 06:45:49'),
(39, NULL, NULL, NULL, 'Raya Guerra updated', 'foqe@mailinator.com', '0', '829699114.png', 'user', NULL, '$2y$12$elSqCTETELwvy2zQ/HW8M.E4/pB/RMuxZQGKpFjY3ZeasorNnixI.', NULL, 876543, 79234567890, 'Mrs', '07 Jan, 1991', 'female', 'Quis obcaecati omnis', 'Id iste veniam ab q', 'Albania', '987654321', 'Passport', 'MA812405', NULL, NULL, NULL, 'ok', NULL, NULL, '2024-01-09 09:22:39', '2024-01-09 17:33:41'),
(40, NULL, NULL, NULL, 'Saurabh KR', 'kr@gmail.com', '0', '1295613480.png', 'user', NULL, '$2y$12$MXJ3kADVrnENLkCSWb2QjOEB3wwwyYntBsKP0aX01LcLGqrPInjSe', NULL, 123456, 123456, 'mr', '03 Mar, 2010', 'male', 'Demo address', 'demo', 'Antigua and Barbuda', '1564856', 'Address proof', 'MA571746', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 04:07:10', '2024-01-15 04:07:10'),
(59, 'MA883664', NULL, NULL, 'Dakota Freeman', 'kucerepu@mailinator.com', '0', NULL, 'user', NULL, NULL, NULL, 789, 987654321, NULL, '03-Jun-2001', 'female', 'Numquam sapiente des', 'Sed praesentium amet', 'PT', '26', 'Address Proof', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-16 11:31:46', '2024-01-16 11:31:46'),
(61, NULL, NULL, 'Mr', 'User', 'user@gmail.com', '0', NULL, 'user', NULL, '$2y$12$LPKjNTzh1VJHMgkRGRjQ3u9HRXi6nzuyzc0DVPDMUq44SfURLaTY2', NULL, 989898, 4898765430, NULL, 'User', NULL, NULL, NULL, 'CX', '0987654321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-17 07:33:02', '2024-01-23 20:03:15'),
(64, NULL, NULL, NULL, 'manish', 'manish@gmail.com', '1', '2001477828.png', 'user', NULL, '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', NULL, 251201, 7248702312, 'mr', '12 Jan, 2024', 'male', 'muzaffarnagar', 'noida', 'Albania', '1232', 'Address proof', 'MA241402', NULL, NULL, NULL, 'ggg', NULL, NULL, '2024-01-17 07:41:36', '2024-01-23 17:09:52'),
(65, NULL, NULL, 'Dr', 'Eden Watkins edit', 'wazig@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$MTuwfMHJF6aGHDlvK6PgoOKrDyhStUdUyRcb44IF5jbs5AUp2/fE2', NULL, 999, 917654321, NULL, 'Eden Watkins', 'male', 'Officiis culpa inci', 'Facilis rem enim acc', 'CX', '6209090990', 'Passport', 'MA95613', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-23 19:08:24', '2024-01-24 12:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient_allergies`
--

CREATE TABLE `patient_allergies` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `allergy_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_allergies`
--

INSERT INTO `patient_allergies` (`id`, `patient_id`, `allergy_name`, `created_at`, `updated_at`) VALUES
(3, 2, 'ASDF', '2024-01-08 19:22:17', '2024-01-08 19:22:17'),
(4, 2, 'SDF', '2024-01-08 19:22:23', '2024-01-08 19:22:23'),
(10, 37, 'REFF', '2024-01-10 12:00:13', '2024-01-10 12:00:13'),
(11, 37, 'REF', '2024-01-10 12:00:24', '2024-01-10 12:00:24'),
(12, 37, 'AER', '2024-01-10 12:00:33', '2024-01-10 12:00:33'),
(20, 98, 'klnkl', '2024-02-27 16:03:10', '2024-02-27 16:03:10'),
(21, 91, 'kjhgbjk', '2024-03-08 12:48:54', '2024-03-08 12:48:54'),
(22, 100, 'Rose Flower', '2024-03-12 18:21:27', '2024-03-12 18:21:27'),
(23, 100, 'Dairy Products', '2024-03-12 18:21:46', '2024-03-12 18:21:46'),
(24, 107, 'test allergy', '2024-03-28 00:32:00', '2024-03-28 00:32:00'),
(25, 112, 'Milk Product', '2024-04-03 18:36:58', '2024-04-03 18:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `patient_appointments`
--

CREATE TABLE `patient_appointments` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `appointment_type` longtext DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `clinic_type` varchar(255) DEFAULT NULL,
  `confirmation_immediately` enum('no','yes') DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_appointments`
--

INSERT INTO `patient_appointments` (`id`, `patient_id`, `date`, `appointment_type`, `location`, `start_date`, `start_time`, `end_date`, `end_time`, `cost`, `code`, `clinic_type`, `confirmation_immediately`, `created_at`, `updated_at`) VALUES
(9, 2, '09 Jan, 2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', '2024-01-08 19:25:28', '2024-01-08 19:25:28'),
(10, 33, '12 Jan, 2024', 'Image guided MSK / pain injection - HA حقن إالتهاب/ألم المفاصل بتوجية الأشعة-حقن زيتية', 'DUBAI', '07 Jan, 2024', '12:01 AM', '07 Jan, 2024', NULL, '12', NULL, NULL, 'no', '2024-01-09 11:52:19', '2024-01-09 11:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `patient_bericoceleembo_diagnosis`
--

CREATE TABLE `patient_bericoceleembo_diagnosis` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_name` varchar(255) DEFAULT NULL,
  `data_value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_clinical_exams`
--

CREATE TABLE `patient_clinical_exams` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `write_text` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_clinical_exams`
--

INSERT INTO `patient_clinical_exams` (`id`, `patient_id`, `write_text`, `created_at`, `updated_at`) VALUES
(2, 6, 'hww', '2023-12-23 01:58:43', '2023-12-23 01:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `patient_current_meds`
--

CREATE TABLE `patient_current_meds` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `drug_name` varchar(255) DEFAULT NULL,
  `frequency` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `stopped` enum('yes','no') NOT NULL DEFAULT 'no',
  `stopped_date` varchar(255) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `today_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_current_meds`
--

INSERT INTO `patient_current_meds` (`id`, `patient_id`, `drug_name`, `frequency`, `duration`, `stopped`, `stopped_date`, `code`, `today_date`, `created_at`, `updated_at`) VALUES
(3, 7, 'Elit,', 'Porro', 'Quia', 'yes', '09-Feb-2010', 'Qui', '13', '2023-12-26 13:04:11', '2023-12-26 13:04:11'),
(4, 7, 'Cupiditate', 'Harum', 'Aut', 'no', '25-Feb-2005', 'Odio', '5', '2023-12-26 13:04:30', '2023-12-26 13:04:30'),
(9, 2, '1', '12', '12', 'yes', '17 Jan, 2024', 'Co123', '19 Jan, 2024', '2024-01-02 11:50:26', '2024-01-02 11:50:26'),
(13, 6, 'my drugrrr', '09', '123', 'no', '21 Jan, 2024', 'Co123555', '14 Dec, 2023', '2024-01-02 18:15:30', '2024-01-02 18:15:30'),
(14, 6, 'test drug', '12', '1234', 'yes', '28 Jan, 2024', 'Co1235550000', '13 Dec, 2023', '2024-01-02 18:16:22', '2024-01-02 18:16:22'),
(15, 2, 'demo', '2', '3', 'no', '09 Jan, 2024', 'wed', '04 Oct, 2022', '2024-01-08 19:15:07', '2024-01-08 19:15:07'),
(16, 2, 'demo', '2', '3', 'no', '09 Jan, 2024', 'ascv', '08 Jan, 2024', '2024-01-08 19:15:57', '2024-01-08 19:15:57'),
(17, 33, '23', '23', '23', 'yes', '03 Jan, 2024', '12', '03 Jan, 2024', '2024-01-09 11:44:45', '2024-01-09 11:44:45'),
(18, 33, '12', '12', '23', 'no', '04 Jan, 2024', '12', '10 Jan, 2024', '2024-01-09 11:45:16', '2024-01-09 11:45:16'),
(20, 39, 'Delectus,', 'Autem', 'Non', 'yes', '27-Apr-2011', 'Aspernatur', '12', '2024-01-09 16:55:38', '2024-01-09 16:55:38'),
(21, 40, 'Drug 123', '2', '3', 'yes', '31 Jan, 2024', '123', '15 Jan, 2024', '2024-01-15 11:08:58', '2024-01-15 11:08:58'),
(23, 68, 'sdfvgb', 'sdfg', '3', 'yes', '09 Jan, 2024', '123', '04 Oct, 2022', '2024-02-14 17:06:30', '2024-02-14 17:06:30'),
(24, 70, 'WQE3', 'QWE', '4', 'no', '100101', 'IOP', '040404', '2024-02-19 17:49:32', '2024-02-19 17:49:32'),
(25, 98, 'ojiloilkk', '6633', '4745', 'yes', '12 Feb, 2024', '6363', '01 Feb, 2024', '2024-02-27 16:04:49', '2024-02-27 16:04:49'),
(27, 100, 'Heddjwhijsj', '2', '60 Min', 'yes', '01 Mar, 2024', 'nhbbb  bhbhnjhnbjcdnhf', '12 Mar, 2024', '2024-03-12 18:55:22', '2024-03-12 18:55:22'),
(29, 115, 'Labore', 'Omnis', 'Omnis', 'yes', '06 Apr, 2024', NULL, '05 Apr, 2024', '2024-04-05 19:51:13', '2024-04-05 19:51:13'),
(30, 114, 'Dolo', '2', '5', 'no', '14 Apr, 2024', '854141', '09 Apr, 2024', '2024-04-09 18:49:50', '2024-04-09 18:49:50'),
(31, 114, 'Aciloc', '3 times a day', '3', 'no', '12 Apr, 2024', '854141', '09 Apr, 2024', '2024-04-09 18:51:06', '2024-04-09 18:51:06');

-- --------------------------------------------------------

--
-- Table structure for table `patient_diagnosis`
--

CREATE TABLE `patient_diagnosis` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_name` varchar(255) DEFAULT NULL,
  `data_value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_diagnosis`
--

INSERT INTO `patient_diagnosis` (`id`, `patient_id`, `doctor_id`, `title_name`, `data_value`, `created_at`, `updated_at`) VALUES
(1, 64, 2, 'diagnosis_general', '{\"BPH\": [\"BPH\"], \"Prostaitis\": [\"Prostaitis\"], \"PostateCarcinoma\": [\"Postate Carcinoma\"]}', '2024-01-23 06:10:34', '2024-01-23 06:10:34'),
(2, 64, 2, 'diagnosis_cid', '{\"C61\": [\"C61 Malignant neoplasm of prostate\"], \"N41\": [\"N41 Inflammatory diseases of prostate\"], \"N42\": [\"N42 Other disorders of prostate\"], \"Q55\": [\"Q55.4 Other congenital malformations of vas deferens, epididymis, seminal vesicles and prostate\"], \"D075\": [\"D07.5 Carcinoma in situ: Prostate\"], \"D291\": [\"D29.1 Benign neoplasm: Prostate\"], \"N320\": [\"N32.0 Bladder-neck obstruction\"], \"N410\": [\"N41.0 Acute prostatitis\"], \"N411\": [\"N41.1 Chronic prostatitis\"], \"N412\": [\"N41.2 Abscess of prostate\"], \"N413\": [\"N41.3 Prostatocystitis\"], \"N419\": [\"N41.9 Inflammatory disease of prostate, unspecified\"], \"N422\": [\"N42.2 Atrophy of prostate\"], \"N423\": [\"N42.3 Dysplasia of prostate\"]}', '2024-01-23 06:10:34', '2024-01-23 06:10:34'),
(3, 64, 2, 'symptoms_score', '{\"Urgency\": [\"0\"], \"Nocturia\": [\"5\"], \"Frequency\": [\"1\"], \"Straining\": [\"3\"], \"WeakStream\": [\"0\"], \"Intermittency\": [\"1\"], \"IncompleteEmptying\": [\"10\"]}', '2024-01-23 06:10:34', '2024-01-23 07:29:15'),
(4, 64, 2, 'referral', '{\"HCREFFERAL\": [\"ENT / Head and Neck surgery\"], \"HCREFFERALNOTE\": {\"1\": \"In sunt necessitatib\"}}', '2024-01-23 06:10:34', '2024-01-23 06:10:34'),
(5, 64, 2, 'supportive', '{\"SupportivePROZ290\": [\"PROZ290\"], \"SupportiveLABPREIVBASIC52\": [\"LABPREIVBASIC52\"]}', '2024-01-23 06:10:34', '2024-01-23 06:10:34'),
(6, 64, 2, 'intervention_procedure', '{\"InterventionProcedureLABPREANGIO48\": [\"LABPREANGIO48\"]}', '2024-01-23 06:10:34', '2024-01-23 06:10:34'),
(7, 64, 2, 'elegibility_status', '{\"ElegibilitySTATUS\": [\"Other options\"], \"ElegibilitySTATUSNOTE\": {\"3\": \"Sed molestias esse\"}}', '2024-01-23 06:10:34', '2024-01-23 06:10:34'),
(8, 64, 2, 'mdt', '{\"MDTDecision\": [\"Other options\"], \"MDTDecisionNOTE\": {\"3\": \"Quaerat ex laudantiu\"}}', '2024-01-23 06:10:34', '2024-01-23 06:10:34'),
(9, 64, 2, 'lab', '{\"PSA\": [\"PSA 4 gm/dl    OR    PSA 4 ng/ml\"], \"PVR\": [\"> 200cc (BOO) (PAE FAVERABLE)\"], \"QMax\": [\"10ml/s (PAE unfaverable)\"], \"LABRFT12\": [\"Abnormal Renal profile (PAE contraindicated)\"], \"Urinalysis\": [\"Abnormal Urinanalysis (PAE unfaverable)\"], \"LABRFT12NOTE\": [\"Nulla sapiente verit\"], \"UrinalysisNOTE\": [\"Nemo laboriosam ame\"], \"LABUROFLOINVASIVE752\": [\"Normal results (PAE unfaverable)\"], \"LABUROFLOINVASIVE752NOTE\": []}', '2024-01-23 06:10:34', '2024-01-23 06:10:34'),
(10, 64, 2, 'Imaging', '{\"note\": [], \"3rdlobe\": [\"YES (PAE unfaverable)\"], \"BPHType\": [\"NON-AdBPH\"], \"ProstateAbscess\": [\"NO\"], \"ProstateHyperplasia\": [\"NO\"], \"ProstateAdenoCarcinoma\": [\"NO\"], \"Mrcir48CalculatePiRards\": [\"PI-RADS I-III\"], \"Mrcir48CalculatePiRardsPz\": [\"Pi-RADS PZ PI-RADS IV-V (PAE contraindicated)\"], \"Usgeneral70ProstateParametersTpv\": [\"TPV > 40 cc (PAE FAVERABLE)\"], \"Usgeneral70ProstateParameterstotalProstateVolume\": [\"Total Prostate Volume (TPV) TPV < 40 cc (PAE unfaverable)\"], \"Ctcir48ProstaticArteryAngiographyProtocolLefttypeV\": [\"Type V (28%)\", \"Type V (14%)\", \"Type V (18%)\"], \"Ctcir48ProstaticArteryAngiographyProtocolRighttypeI\": [\"Type I  (28%)\"], \"Ctcir48ProstaticArteryAngiographyProtocolRighttypeV\": [\"Type V (5%)\"], \"Ctcir48ProstaticArteryAngiographyProtocolRighttypeIV\": [\"Type IV (31%)\"]}', '2024-01-23 06:10:34', '2024-01-23 06:10:34'),
(11, 64, 2, 'ClinicalIndicator', '{\"LUTSMeds\": [\"Mono-therapy\"], \"DetrusorFailure\": [\"YES (PAE FAVERABLE)\"], \"ErectileDysfunction\": [\"no\"]}', '2024-01-23 06:10:34', '2024-01-23 06:10:34'),
(12, 64, 2, 'Symptoms', '\"symptom\"', '2024-01-23 13:57:47', '2024-01-23 07:01:19'),
(13, 68, 2, 'Symptoms', '\"ddd\"', '2024-02-02 14:21:40', '2024-02-02 14:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `patient_diagnosis_generals`
--

CREATE TABLE `patient_diagnosis_generals` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `diagnosis_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_future_plans`
--

CREATE TABLE `patient_future_plans` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `plan_text` mediumtext DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_future_plans`
--

INSERT INTO `patient_future_plans` (`id`, `patient_id`, `doctor_id`, `plan_text`, `date`, `created_at`, `updated_at`) VALUES
(1, 107, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan vehicula purus, vitae faucibus neque ornare ut. Pellentesque aliquam elementum rutrum. Aenean hendrerit commodo justo. Mauris sed dolor eget ipsum maximus malesuada. Proin ultricies lorem at nibh fermentum venenatis. Mauris congue odio ut augue fringilla malesuada. Ut et lobortis dolor. Integer malesuada tincidunt faucibus. Donec ipsum quam, efficitur in odio ut, consectetur feugiat lorem. Integer at accumsan dolor, sed auctor metus.', '2024-03-28', '2024-03-28 05:42:20', '2024-03-28 05:42:20'),
(2, 107, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan vehicula purus, vitae faucibus neque ornare ut. Pellentesque aliquam elementum rutrum. Aenean hendrerit commodo justo. Mauris sed dolor eget ipsum maximus malesuada. Proin ultricies lorem at nibh fermentum venenatis. Mauris congue odio ut augue fringilla malesuada. Ut et lobortis dolor. Integer malesuada tincidunt faucibus. Donec ipsum quam, efficitur in odio ut, consectetur feugiat lorem. Integer at accumsan dolor, sed auctor metus.', '2024-03-30', '2024-03-28 06:36:15', '2024-03-28 06:36:15'),
(3, 107, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id quam a arcu aliquam venenatis. Quisque nec purus urna. Praesent vulputate erat lectus, ut efficitur nibh eleifend quis. Pellentesque eros mauris, blandit sed mauris eu, vehicula facilisis neque. Fusce varius vehicula lacinia. Ut consequat viverra purus, sit amet malesuada nibh. Sed id massa vel sapien cursus facilisis dignissim eget nibh.', '2024-03-29', '2024-03-29 04:22:24', '2024-03-29 04:22:24'),
(4, 102, 2, 'rrr', '2024-03-29', '2024-03-29 07:57:20', '2024-03-29 07:57:20'),
(5, 102, 2, 'ttt', '2024-03-29', '2024-03-29 07:57:40', '2024-03-29 07:57:40'),
(6, 100, 2, 'rrr', '2024-03-30', '2024-03-30 00:48:26', '2024-03-30 00:48:26'),
(7, 109, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at elementum mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit', '2024-03-30', '2024-03-30 00:57:59', '2024-03-30 00:57:59'),
(8, 109, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at elementum mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis luctus ultrices massa, sit amet tincidunt risus scelerisque vitae. Sed maximus neque eget lacus tristique tempus. Duis hendrerit nisi mattis, vehicula elit ut, maximus purus. Suspendisse consequat dapibus libero ac eleifend. Duis molestie ut eros quis suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada sed arcu et pretium. Etiam porttitor, enim id luctus mattis, orci lorem rutrum odio, eu suscipit libero ipsum quis diam. Cras a ultrices odio, sit amet convallis massa. Etiam porttitor nunc non nunc imperdiet auctor. Sed sit amet dolor ut lacus placerat eleifend. Etiam ut lorem at elit dapibus congue elementum id magna. Nulla venenatis magna tortor, id efficitur mi faucibus vitae. Nam eleifend pulvinar quam eu semper.', '2024-04-01', '2024-03-30 01:26:58', '2024-03-30 01:26:58'),
(9, 109, 2, 'Future Plans', '2024-04-06', '2024-03-30 02:00:11', '2024-03-30 02:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `patient_insurers`
--

CREATE TABLE `patient_insurers` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `insurer_name` varchar(255) DEFAULT NULL,
  `insurance_number` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_insurers`
--

INSERT INTO `patient_insurers` (`id`, `patient_id`, `insurer_name`, `insurance_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'mrs lalit', '0000000', 'inactive', '2023-12-23 19:47:00', '2024-01-03 19:37:25'),
(2, 6, ' lalit', '999999999', 'inactive', '2023-12-23 19:49:00', '2024-01-03 19:37:25'),
(3, 6, 'kumar', '999999999', 'inactive', '2023-12-25 12:54:00', '2024-01-03 19:37:25'),
(4, 7, 'test', 'raj', 'inactive', '2023-12-26 17:22:31', '2023-12-26 17:22:31'),
(5, 7, 'raj', '09090909', 'inactive', '2023-12-26 17:22:48', '2023-12-26 17:22:48'),
(6, 6, 'hareram kumar', '999999999', 'inactive', '2023-12-28 14:42:00', '2024-01-03 19:37:25'),
(7, 9, 'manish', '9009909009', 'inactive', '2023-12-29 13:07:10', '2023-12-29 13:07:10'),
(8, 6, 'test4', '98989898', 'inactive', '2023-12-29 17:45:01', '2024-01-03 19:37:25'),
(9, 6, 'test5', '98989898', 'inactive', '2024-01-02 14:55:56', '2024-01-03 19:37:25'),
(10, 6, 'test6', '98989898', 'inactive', '2024-01-02 18:22:08', '2024-01-03 19:37:25'),
(16, 6, 'test10', '8888888888', 'active', '2024-01-03 19:37:25', '2024-01-03 19:37:25'),
(17, 2, 'ali', '452316565', 'inactive', '2024-01-03 19:41:31', '2024-01-08 19:23:38'),
(18, 2, 'my khan', '452316565', 'inactive', '2024-01-03 19:43:16', '2024-01-08 19:23:38'),
(19, 5, 'manish kumar', '1111111111111', 'active', '2024-01-03 20:00:59', '2024-01-03 20:00:59'),
(20, 2, 'my khan SDVV', '452316565', 'inactive', '2024-01-08 19:23:20', '2024-01-08 19:23:38'),
(21, 2, 'my khan SDVV', '452316565', 'inactive', '2024-01-08 19:23:25', '2024-01-08 19:23:38'),
(22, 2, 'my khan SDVV', '452316565', 'inactive', '2024-01-08 19:23:28', '2024-01-08 19:23:38'),
(23, 2, 'my khan SDVV', '452316565', 'inactive', '2024-01-08 19:23:31', '2024-01-08 19:23:38'),
(24, 2, 'my khan SDVV', '452316565', 'inactive', '2024-01-08 19:23:34', '2024-01-08 19:23:38'),
(25, 2, 'my khan SDVV', '452316565SDF', 'active', '2024-01-08 19:23:38', '2024-03-13 12:53:41'),
(26, 23, 'test', '8888888888', 'active', '2024-01-08 20:28:12', '2024-01-08 20:28:41'),
(27, 33, 'RDE', 'red12984524', 'inactive', '2024-01-09 11:43:00', '2024-01-09 11:43:31'),
(28, 33, 'RDEQ', 'red12984524', 'active', '2024-01-09 11:43:31', '2024-01-09 11:50:36'),
(29, 39, 'my insurar', '0987654321', 'active', '2024-01-09 16:23:52', '2024-01-09 18:12:18'),
(30, 40, 'my khan SDVV', '1234567', 'active', '2024-01-15 11:07:41', '2024-01-15 11:07:41'),
(31, 64, 'Gay Reilly', '884', 'active', '2024-01-23 11:59:45', '2024-01-30 20:48:38'),
(32, 65, 'Demetrius Moreno', '376', 'active', '2024-01-30 16:37:26', '2024-01-30 16:41:35'),
(33, 68, 'Zenia Mcdaniel', '668', 'inactive', '2024-02-02 12:20:28', '2024-02-10 12:45:11'),
(34, 68, 'Zenia Mcdaniel', '668', 'active', '2024-02-10 12:45:11', '2024-02-10 12:45:11'),
(35, 70, 'sadfg', 'qwewfr', 'active', '2024-02-19 17:04:14', '2024-02-19 17:04:14'),
(36, 98, 'jas', '9638520745', 'active', '2024-02-27 16:43:21', '2024-02-27 16:43:21'),
(37, 91, 'jas', '95623541', 'active', '2024-03-08 12:50:30', '2024-03-08 12:50:30'),
(38, 100, 'B1', '5555454545454', 'inactive', '2024-03-12 13:21:27', '2024-03-12 14:26:33'),
(39, 100, 'B1', '5555454545454', 'inactive', '2024-03-12 13:21:38', '2024-03-12 14:26:33'),
(40, 100, 'Insurer1', '5555454545454', 'active', '2024-03-12 14:26:33', '2024-03-12 14:26:33'),
(41, 102, 'Scarlet Huff', '745', 'active', '2024-03-20 14:02:02', '2024-03-20 14:02:02'),
(42, 107, 'Donna Durham', '294', 'active', '2024-03-28 00:09:34', '2024-03-28 00:09:34'),
(43, 115, 'Arden Roach', '269', 'inactive', '2024-04-05 14:46:55', '2024-04-05 15:04:33'),
(44, 115, 'Arden Roach', '300', 'inactive', '2024-04-05 14:51:20', '2024-04-05 15:04:33'),
(45, 115, 'Arden Roach', '400', 'inactive', '2024-04-05 14:51:31', '2024-04-05 15:04:33'),
(46, 115, 'Arden Roach', '500', 'inactive', '2024-04-05 14:52:51', '2024-04-05 15:04:33'),
(47, 115, 'Arden Roach', '55', 'inactive', '2024-04-05 14:55:15', '2024-04-05 15:04:33'),
(48, 115, 'Arden Roach', '558', 'inactive', '2024-04-05 14:59:31', '2024-04-05 15:04:33'),
(49, 115, 'Arden Roach', '558', 'inactive', '2024-04-05 14:59:39', '2024-04-05 15:04:33'),
(50, 115, 'Arden Roach', '558', 'inactive', '2024-04-05 15:00:23', '2024-04-05 15:04:33'),
(51, 115, 'Arden Roach', '558', 'inactive', '2024-04-05 15:00:30', '2024-04-05 15:04:33'),
(52, 115, 'Arden Roach', '558', 'inactive', '2024-04-05 15:00:36', '2024-04-05 15:04:33'),
(53, 115, 'Arden Roach', '558', 'inactive', '2024-04-05 15:00:40', '2024-04-05 15:04:33'),
(54, 115, 'Arden Roach', '444', 'inactive', '2024-04-05 15:02:39', '2024-04-05 15:04:33'),
(55, 115, 'Arden Roach', '445', 'active', '2024-04-05 15:04:33', '2024-04-05 15:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `patient_invistigations`
--

CREATE TABLE `patient_invistigations` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invistigation` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_invistigations`
--

INSERT INTO `patient_invistigations` (`id`, `patient_id`, `invistigation`, `created_at`, `updated_at`) VALUES
(5, 6, 'test..............', '2023-12-23 01:16:19', '2023-12-23 01:16:19'),
(6, 6, 'Write Special Invistigation', '2023-12-27 16:31:16', '2023-12-27 16:31:16'),
(7, 6, 'resr', '2023-12-28 14:34:38', '2023-12-28 14:34:38'),
(8, 39, 'Ipsum atque quisquam', '2024-01-09 17:07:33', '2024-01-09 17:07:33'),
(9, 39, 'Rerum quidem adipisc', '2024-01-09 17:09:54', '2024-01-09 17:09:54'),
(10, 39, 'Iure dicta dolor vol', '2024-01-09 17:10:02', '2024-01-09 17:10:02'),
(11, 39, 'Esse fuga Aut offic', '2024-01-09 17:53:40', '2024-01-09 17:53:40'),
(12, 37, 'WEA', '2024-01-10 12:01:27', '2024-01-10 12:01:27'),
(13, 40, 'Invistigation report done', '2024-01-15 11:14:22', '2024-01-15 11:14:22'),
(14, 40, 'awertyjkl', '2024-01-15 11:36:43', '2024-01-15 11:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `patient_invoice_items`
--

CREATE TABLE `patient_invoice_items` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `cost` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_order_imaginary_exams`
--

CREATE TABLE `patient_order_imaginary_exams` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(255) UNSIGNED DEFAULT NULL,
  `test_id` bigint(255) UNSIGNED DEFAULT NULL,
  `form_type` varchar(100) DEFAULT NULL,
  `summery` mediumtext DEFAULT NULL,
  `status` enum('pending','complete') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_order_imaginary_exams`
--

INSERT INTO `patient_order_imaginary_exams` (`id`, `patient_id`, `doctor_id`, `test_id`, `form_type`, `summery`, `status`, `created_at`, `updated_at`) VALUES
(1, 98, 2, 4, 'thyroid_form', 'bnv cfvgjhbm', 'pending', '2024-02-27 12:15:03', '2024-02-27 12:15:03'),
(2, 98, 2, 3, 'thyroid_form', 'bnv cfvgjhbm', 'pending', '2024-02-27 12:15:03', '2024-02-27 12:15:03'),
(3, 98, 2, 1, 'thyroid_form', 'bnv cfvgjhbm', 'pending', '2024-02-27 12:15:03', '2024-02-27 12:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `patient_order_labs`
--

CREATE TABLE `patient_order_labs` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `form_type` varchar(100) DEFAULT NULL,
  `order_lab_tests_id` bigint(20) DEFAULT NULL,
  `status` enum('pending','complete') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_order_labs`
--

INSERT INTO `patient_order_labs` (`id`, `patient_id`, `doctor_id`, `form_type`, `order_lab_tests_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 98, 2, 'thyroid_form', 11, 'pending', '2024-02-27 12:17:58', '2024-02-27 12:17:58'),
(2, 98, 2, 'thyroid_form', 7, 'pending', '2024-02-27 12:17:58', '2024-02-27 12:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `patient_order_procedures`
--

CREATE TABLE `patient_order_procedures` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `procedure_name` varchar(255) DEFAULT NULL,
  `entry` longtext DEFAULT NULL,
  `summary` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_order_procedures`
--

INSERT INTO `patient_order_procedures` (`id`, `patient_id`, `doctor_id`, `procedure_name`, `entry`, `summary`, `created_at`, `updated_at`) VALUES
(1, 107, 2, 'Procedure Record', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan vehicula purus, vitae faucibus neque ornare ut. Pellentesque aliquam elementum rutrum. Aenean hendrerit commodo justo. Mauris sed dolor eget ipsum maximus malesuada. Proin ultricies lorem at nibh fermentum venenatis. Mauris congue odio ut augue fringilla malesuada. Ut et lobortis dolor. Integer malesuada tincidunt faucibus. Donec ipsum quam, efficitur in odio ut, consectetur feugiat lorem. Integer at accumsan dolor, sed auctor metus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan vehicula purus, vitae faucibus neque ornare ut. Pellentesque aliquam elementum rutrum. Aenean hendrerit commodo justo. Mauris sed dolor eget ipsum maximus malesuada. Proin ultricies lorem at nibh fermentum venenatis. Mauris congue odio ut augue fringilla malesuada. Ut et lobortis dolor. Integer malesuada tincidunt faucibus. Donec ipsum quam, efficitur in odio ut, consectetur feugiat lorem. Integer at accumsan dolor, sed auctor metus.', '2024-03-28 01:56:47', '2024-03-28 01:56:47'),
(2, 107, 2, 'Consent Form', 'Quia aperiam volupta', 'Mollitia adipisicing', '2024-03-28 02:26:35', '2024-03-28 02:26:35'),
(3, 107, 2, 'Procedure Record', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan vehicula purus, vitae faucibus neque ornare ut. Pellentesque aliquam elementum rutrum. Aenean hendrerit commodo justo. Mauris sed dolor eget ipsum maximus malesuada. Proin ultricies lorem at nibh fermentum venenatis. Mauris congue odio ut augue fringilla malesuada. Ut et lobortis dolor. Integer malesuada tincidunt faucibus. Donec ipsum quam, efficitur in odio ut, consectetur feugiat lorem. Integer at accumsan dolor, sed auctor metus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan vehicula purus, vitae faucibus neque ornare ut. Pellentesque aliquam elementum rutrum. Aenean hendrerit commodo justo. Mauris sed dolor eget ipsum maximus malesuada. Proin ultricies lorem at nibh fermentum venenatis. Mauris congue odio ut augue fringilla malesuada. Ut et lobortis dolor. Integer malesuada tincidunt faucibus. Donec ipsum quam, efficitur in odio ut, consectetur feugiat lorem. Integer at accumsan dolor, sed auctor metus.', '2024-03-28 07:11:16', '2024-03-28 07:11:16'),
(4, 102, 2, 'Procedure Record', 'Obcaecati nostrum cu', 'Facilis distinctio', '2024-03-29 07:59:19', '2024-03-29 07:59:19'),
(5, 100, 2, 'Consent Form', 'Dolore eum at sunt d', 'Iusto laboriosam nu', '2024-03-30 00:47:49', '2024-03-30 00:47:49'),
(6, 109, 2, 'Pre-Procedure Order', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at elementum mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at elementum mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit', '2024-03-30 00:56:56', '2024-03-30 00:56:56'),
(7, 109, 2, 'Discharge Order', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at elementum mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis luctus ultrices massa, sit amet tincidunt risus scelerisque vitae. Sed maximus neque eget lacus tristique tempus. Duis hendrerit nisi mattis, vehicula elit ut, maximus purus. Suspendisse consequat dapibus libero ac eleifend. Duis molestie ut eros quis suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada sed arcu et pretium. Etiam porttitor, enim id luctus mattis, orci lorem rutrum odio, eu suscipit libero ipsum quis diam. Cras a ultrices odio, sit amet convallis massa. Etiam porttitor nunc non nunc imperdiet auctor. Sed sit amet dolor ut lacus placerat eleifend. Etiam ut lorem at elit dapibus congue elementum id magna. Nulla venenatis magna tortor, id efficitur mi faucibus vitae. Nam eleifend pulvinar quam eu semper.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at elementum mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis luctus ultrices massa, sit amet tincidunt risus scelerisque vitae. Sed maximus neque eget lacus tristique tempus. Duis hendrerit nisi mattis, vehicula elit ut, maximus purus. Suspendisse consequat dapibus libero ac eleifend. Duis molestie ut eros quis suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada sed arcu et pretium. Etiam porttitor, enim id luctus mattis, orci lorem rutrum odio, eu suscipit libero ipsum quis diam. Cras a ultrices odio, sit amet convallis massa. Etiam porttitor nunc non nunc imperdiet auctor. Sed sit amet dolor ut lacus placerat eleifend. Etiam ut lorem at elit dapibus congue elementum id magna. Nulla venenatis magna tortor, id efficitur mi faucibus vitae. Nam eleifend pulvinar quam eu semper.', '2024-03-30 01:21:52', '2024-03-30 01:21:52'),
(8, 109, 2, 'Consent Form', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at elementum mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis luctus ultrices massa, sit amet tincidunt risus scelerisque vitae. Sed maximus neque eget lacus tristique tempus. Duis hendrerit nisi mattis, vehicula elit ut, maximus purus. Suspendisse consequat dapibus libero ac eleifend. Duis molestie ut eros quis suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada sed arcu et pretium. Etiam porttitor, enim id luctus mattis, orci lorem rutrum odio, eu suscipit libero ipsum quis diam. Cras a ultrices odio, sit amet convallis massa. Etiam porttitor nunc non nunc imperdiet auctor. Sed sit amet dolor ut lacus placerat eleifend. Etiam ut lorem at elit dapibus congue elementum id magna. Nulla venenatis magna tortor, id efficitur mi faucibus vitae. Nam eleifend pulvinar quam eu semper.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at elementum mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis luctus ultrices massa, sit amet tincidunt risus scelerisque vitae. Sed maximus neque eget lacus tristique tempus. Duis hendrerit nisi mattis, vehicula elit ut, maximus purus. Suspendisse consequat dapibus libero ac eleifend. Duis molestie ut eros quis suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada sed arcu et pretium. Etiam porttitor, enim id luctus mattis, orci lorem rutrum odio, eu suscipit libero ipsum quis diam. Cras a ultrices odio, sit amet convallis massa. Etiam porttitor nunc non nunc imperdiet auctor. Sed sit amet dolor ut lacus placerat eleifend. Etiam ut lorem at elit dapibus congue elementum id magna. Nulla venenatis magna tortor, id efficitur mi faucibus vitae. Nam eleifend pulvinar quam eu semper.', '2024-03-30 01:57:29', '2024-03-30 01:57:29'),
(9, 109, 2, 'Consent Form', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at elementum mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis luctus ultrices massa, sit amet tincidunt risus scelerisque vitae. Sed maximus neque eget lacus tristique tempus. Duis hendrerit nisi mattis, vehicula elit ut, maximus purus. Suspendisse consequat dapibus libero ac eleifend. Duis molestie ut eros quis suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada sed arcu et pretium. Etiam porttitor, enim id luctus mattis, orci lorem rutrum odio, eu suscipit libero ipsum quis diam. Cras a ultrices odio, sit amet convallis massa. Etiam porttitor nunc non nunc imperdiet auctor. Sed sit amet dolor ut lacus placerat eleifend. Etiam ut lorem at elit dapibus congue elementum id magna. Nulla venenatis magna tortor, id efficitur mi faucibus vitae. Nam eleifend pulvinar quam eu semper.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at elementum mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis luctus ultrices massa, sit amet tincidunt risus scelerisque vitae. Sed maximus neque eget lacus tristique tempus. Duis hendrerit nisi mattis, vehicula elit ut, maximus purus. Suspendisse consequat dapibus libero ac eleifend. Duis molestie ut eros quis suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada sed arcu et pretium. Etiam porttitor, enim id luctus mattis, orci lorem rutrum odio, eu suscipit libero ipsum quis diam. Cras a ultrices odio, sit amet convallis massa. Etiam porttitor nunc non nunc imperdiet auctor. Sed sit amet dolor ut lacus placerat eleifend. Etiam ut lorem at elit dapibus congue elementum id magna. Nulla venenatis magna tortor, id efficitur mi faucibus vitae. Nam eleifend pulvinar quam eu semper.', '2024-03-30 01:57:29', '2024-03-30 01:57:29'),
(10, 114, 149, 'Procedure Record', 'bhcbh bcbhcdh hbfbhhf  bhdhhufbhhf bhhfbjhfdnj bhbhhfchbhfd bhfbhfdnfh hhbdhhbdfh bhsdbhdbh bhhsbdhbcdsbhds bhhdbhdsbhds hbdsb hdshbdsnb bhnjjhbdshubfhfc bhbhhnbdhbdsh bhdb sdhbsdhb dsbh bbbhjhhhhhbh bhbhjhbh hbhhhjh bhhbhnbhjj hbhbhjn bhsbhass bhhdsh bbhhbh.', 'hgvgygs gbhgbhhghbgs hgbhhgbbhghb hvvbhghggbvgvgghvvbv  ghbyghjahhasbhsahsabhsa ghsadbvhgdsbhsabvsaddg agsadggdsahhsad vdsvbgdshdshhbds.', '2024-04-09 18:53:24', '2024-04-09 18:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `patient_past_medical_histories`
--

CREATE TABLE `patient_past_medical_histories` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `diseases_name` varchar(255) DEFAULT NULL,
  `describe` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_past_medical_histories`
--

INSERT INTO `patient_past_medical_histories` (`id`, `patient_id`, `diseases_name`, `describe`, `created_at`, `updated_at`) VALUES
(8, 2, 'Demo', 'demooo', NULL, NULL),
(9, 2, 'Demo`123456', '1\r\n2\r\n3\r\n4\r\n5\r\n6\r\n7\r\n8\r\n0', NULL, NULL),
(10, 2, 'BP', 'at june bp was\r\nat july the bp was low', NULL, NULL),
(16, 37, 'OK', 'OKOK', NULL, NULL),
(17, 37, 'YY', 'TED', NULL, NULL),
(20, 61, 'Kimberly Carter', 'Commodi pariatur Sa', NULL, NULL),
(21, 61, 'Ivana Garner', 'Ea non molestiae eli', NULL, NULL),
(30, 98, 'jnnknlkjjbjkjn', '864605342', NULL, NULL),
(31, 100, 'Test11111', 'Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >', NULL, NULL),
(32, 100, 'Test222222', 'Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >', NULL, NULL),
(33, 100, 'Test11111', 'Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >', NULL, NULL),
(34, 100, 'Test222222', 'Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >', NULL, NULL),
(35, 102, 'Demo`123456', 'ASD', NULL, NULL),
(36, 102, 'Demo', 'ASDF', NULL, NULL),
(37, 115, 'Maryam Simpson', 'Est libero fuga In', NULL, NULL),
(38, 115, 'Elaine Reeves', 'Autem eu laborum Au', NULL, NULL),
(39, 114, 'Tesrdtcg njh', 'bhhhw bhb  bbanmahn snb hnbjjuwhb hbhsuknn bhhhj', NULL, NULL),
(40, 114, 'hhwjbhj', 'bndcjc djh jd jhdn j nn jdmnkjnbshjsdn njdsbhdjb', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_past_surgical_histories`
--

CREATE TABLE `patient_past_surgical_histories` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `diseases_name` varchar(255) DEFAULT NULL,
  `describe` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_past_surgical_histories`
--

INSERT INTO `patient_past_surgical_histories` (`id`, `patient_id`, `diseases_name`, `describe`, `created_at`, `updated_at`) VALUES
(5, 2, 'dasafdg', 'easfdf', '2024-01-02 11:49:37', '2024-01-02 11:49:37'),
(6, 2, 'sadfdgfa', 'dgafgfada', '2024-01-02 11:49:37', '2024-01-02 11:49:37'),
(7, 2, 'DSAGDF', 'DSA', '2024-01-02 11:49:37', '2024-01-02 11:49:37'),
(8, 2, 'weAAEA', 'AG', '2024-01-02 11:49:37', '2024-01-02 11:49:37'),
(13, 2, '123', '1\r\n2\r\n3\r\n4\r\n5\r\n6\r\n7\r\n8\r\n9', '2024-01-08 19:12:29', '2024-01-08 19:12:29'),
(14, 2, '123456', 'wsdfgtredcfvghtrdcvb', '2024-01-08 19:12:29', '2024-01-08 19:12:29'),
(15, 2, '123', 'sdfgthyjfsdfg', '2024-01-08 19:13:56', '2024-01-08 19:13:56'),
(37, 98, 'lknkl', 'poihjop9uiyhj', '2024-02-27 16:04:06', '2024-02-27 16:04:06'),
(38, 100, 'Test - Surgery', 'Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >', '2024-03-12 18:03:41', '2024-03-12 18:03:41'),
(39, 100, 'Test - Surgery 2', 'Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >Top Middle >', '2024-03-12 18:03:41', '2024-03-12 18:03:41'),
(40, 115, 'Baker Burt', 'Quidem quas rem solu', '2024-04-05 19:48:41', '2024-04-05 19:48:41'),
(41, 115, 'Deborah Hale', 'Enim assumenda esse', '2024-04-05 19:48:51', '2024-04-05 19:48:51'),
(42, 114, 'RRR', 'njsdjbdh dbhdbdh dhb dhbd hd hcd jhb dch cbhdcb dhdb chdc dhcb d', '2024-04-09 20:27:26', '2024-04-09 20:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `patient_pelviccongembo_diagnosis`
--

CREATE TABLE `patient_pelviccongembo_diagnosis` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_name` varchar(255) DEFAULT NULL,
  `data_value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_prescriptions`
--

CREATE TABLE `patient_prescriptions` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prescription` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_prescriptions`
--

INSERT INTO `patient_prescriptions` (`id`, `patient_id`, `prescription`, `created_at`, `updated_at`) VALUES
(1, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras gravida lectus in magna accumsan porta. Vivamus id quam aliquam, pharetra est a, commodo ipsum. Praesent at erat vitae elit tempus convallis. Vivamus accumsan ligula sed enim ultrices ullamcorper. Donec ipsum erat, bibendum a eros vel, vehicula auctor ante. Donec porta, nibh at tincidunt feugiat, sapien urna rutrum sem, nec posuere ex orci nec urna. Donec aliquet porta justo, ut venenatis arcu. Duis euismod augue dui, sit amet vehicula nulla pellentesque et. Curabitur lobortis diam sed libero vestibulum mollis. Donec egestas justo interdum, porttitor ligula a, scelerisque tellus. Ut interdum leo nunc, vitae auctor lorem laoreet ut.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu sem mattis, commodo nibh in, lacinia nisl. Suspendisse sit amet nulla maximus, tempor dui et, gravida leo. Mauris vel turpis facilisis, fermentum nisi non, suscipit enim. Phasellus scelerisque quam lobortis ex porta scelerisque. Phasellus in elit tincidunt, porta est vitae, euismod mauris. Aenean eleifend turpis felis, molestie lacinia urna sagittis eget. Vivamus at orci tincidunt, consequat lorem id, hendrerit enim. Cras tristique tellus a pellentesque varius. Nulla hendrerit, ligula eget euismod aliquet, elit lectus posuere nulla, eget cursus tortor urna eget quam. Vestibulum lacinia libero posuere nunc egestas, a porta lacus cursus. Morbi sed eros quis elit tincidunt pretium sed non urna. Donec suscipit ultricies lectus vel sodales. Ut luctus risus at mi lobortis, vel convallis est semper. Curabitur facilisis urna ac tellus scelerisque, ac commodo nibh placerat.\r\n\r\nCurabitur tristique hendrerit odio, ac rhoncus quam sodales vel. Sed erat elit, sagittis vitae eleifend et, gravida vel mi. Vestibulum nec vulputate dolor. Integer odio dolor, lacinia ut cursus ac, pulvinar eget ligula. Quisque tristique risus feugiat, dignissim orci eleifend, suscipit felis. Sed at dui neque. Vestibulum accumsan sem arcu, non gravida arcu pretium sit amet. Nullam dignissim porttitor nisi, quis pharetra justo maximus ut. Vestibulum bibendum mattis nisl, ac suscipit nunc tempor quis. Nunc condimentum non ligula sit amet molestie. Pellentesque luctus massa sed fermentum facilisis.\r\n\r\nUt eget tellus condimentum, tempus erat vel, posuere lectus. Vivamus ut justo turpis. Pellentesque sed placerat velit. Nam a sagittis enim, ut commodo massa. Pellentesque sagittis laoreet porttitor. Suspendisse facilisis pharetra ex, placerat lobortis urna pulvinar vitae. Mauris porta leo vel purus ullamcorper tincidunt. Aenean in ullamcorper lectus, quis sollicitudin nisl. Curabitur rutrum dictum gravida. Sed pulvinar lectus non augue efficitur tincidunt. Fusce auctor tristique elit, ac sollicitudin mauris porta id.\r\n\r\nPellentesque tellus metus, pharetra ut nunc quis, imperdiet dapibus neque. Morbi ut tempus massa. Quisque congue auctor pretium. Duis eu ipsum justo. Donec fermentum facilisis turpis et aliquam. Maecenas finibus congue libero sit amet malesuada. Fusce pharetra mauris a luctus tincidunt. Donec mattis libero efficitur, ultrices ex sed, rutrum ligula. Donec elementum lorem sit amet mi finibus aliquam. Aenean mauris metus, vulputate sit amet posuere non, eleifend eget ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque consectetur mi, ut rutrum erat vestibulum sit amet. Donec id dignissim nulla. Nullam sed sapien pulvinar, consequat erat vel, egestas lorem. Aliquam vel enim a quam ultricies fringilla id sed mi.', '2024-01-02 18:20:40', '2024-01-02 18:20:40'),
(2, 2, 'QASDFVB', '2024-01-08 19:20:17', '2024-01-08 19:20:17'),
(3, 39, 'Quasi quod consequat', '2024-01-09 17:10:11', '2024-01-09 17:10:11'),
(4, 39, 'Mollitia sit dolori', '2024-01-09 17:53:47', '2024-01-09 17:53:47'),
(5, 37, 'OK', '2024-01-10 12:02:22', '2024-01-10 12:02:22'),
(6, 98, 'kjbhklnb j', '2024-02-27 16:06:08', '2024-02-27 16:06:08'),
(7, 98, 'ljkbhilkn l', '2024-02-27 18:32:02', '2024-02-27 18:32:02'),
(8, 91, 'yguhjkl*2', '2024-03-08 12:47:03', '2024-03-08 12:47:03'),
(9, 100, 'DRUG DRUG DRUG DRUG DRUG', '2024-03-12 17:36:43', '2024-03-12 17:36:43'),
(10, 107, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan vehicula purus, vitae faucibus neque ornare ut. Pellentesque aliquam elementum rutrum. Aenean hendrerit commodo justo. Mauris sed dolor eget ipsum maximus malesuada. Proin ultricies lorem at nibh fermentum venenatis. Mauris congue odio ut augue fringilla malesuada. Ut et lobortis dolor. Integer malesuada tincidunt faucibus. Donec ipsum quam, efficitur in odio ut, consectetur feugiat lorem. Integer at accumsan dolor, sed auctor metus.', '2024-03-28 00:04:17', '2024-03-28 00:04:17'),
(11, 102, 'Temporibus occaecat', '2024-03-29 07:59:50', '2024-03-29 07:59:50'),
(12, 109, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at elementum mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit', '2024-03-30 00:58:20', '2024-03-30 00:58:20'),
(13, 109, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at elementum mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis luctus ultrices massa, sit amet tincidunt risus scelerisque vitae. Sed maximus neque eget lacus tristique tempus. Duis hendrerit nisi mattis, vehicula elit ut, maximus purus. Suspendisse consequat dapibus libero ac eleifend. Duis molestie ut eros quis suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada sed arcu et pretium. Etiam porttitor, enim id luctus mattis, orci lorem rutrum odio, eu suscipit libero ipsum quis diam. Cras a ultrices odio, sit amet convallis massa. Etiam porttitor nunc non nunc imperdiet auctor. Sed sit amet dolor ut lacus placerat eleifend. Etiam ut lorem at elit dapibus congue elementum id magna. Nulla venenatis magna tortor, id efficitur mi faucibus vitae. Nam eleifend pulvinar quam eu semper.', '2024-03-30 01:25:32', '2024-03-30 01:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `patient_progress_notes`
--

CREATE TABLE `patient_progress_notes` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `progress_note_canned_text_id` bigint(20) UNSIGNED DEFAULT NULL,
  `progress_note_contents_id` bigint(20) UNSIGNED DEFAULT NULL,
  `voice_recognition` mediumtext DEFAULT NULL,
  `summery` longtext DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `appointment_type` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `details` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile_no` bigint(20) DEFAULT NULL,
  `recall_reminder` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `invoice_item` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_progress_notes`
--

INSERT INTO `patient_progress_notes` (`id`, `patient_id`, `doctor_id`, `progress_note_canned_text_id`, `progress_note_contents_id`, `voice_recognition`, `summery`, `day`, `appointment_type`, `date`, `details`, `email`, `mobile_no`, `recall_reminder`, `invoice_item`, `created_at`, `updated_at`) VALUES
(1, 107, 2, 3, NULL, '<p>Medical Sick leave</p>\r\n\r\n<p>Leave start date: 00-00-0000<br />\r\nLeave finish date: 00-00-0000</p>\r\n\r\n<p>Number of days given: 00</p>\r\n\r\n<p>Procedure: 0000<br />\r\nProcedure date: 0000<br />\r\nReason for leave: to assess post-procedure recovery</p>\r\n\r\n<p>Leave issued via MOH e-Portal and attached to this note (YES / NO)</p>', 'summery', '3', 'CT / Fluro Guided joint / facet RFA (Radio-Frequency) ablation', 'Months', 'Sequi dolor ut ut co', 'doctor2@gmail.com', 987654321, 'active', 'active', '2024-03-29 09:18:18', '2024-03-29 09:18:18'),
(2, 107, 2, 2, NULL, '<p>Amount of cash received: 0000 OMR<br />\r\nPaid by: &nbsp;(Patient / Relative)</p>\r\n\r\n<p>If relative paid for service indicate the name here 0000</p>\r\n\r\n<p>Amount received, cash invoiced issued and sent to patient electronically. Copy of receipt invoice being attached to this note (YES / NO)</p>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id quam a arcu aliquam venenatis. Quisque nec purus urna. Praesent vulputate erat lectus, ut efficitur nibh eleifend quis. Pellentesque eros mauris, blandit sed mauris eu, vehicula facilisis neque. Fusce varius vehicula lacinia. Ut consequat viverra purus, sit amet malesuada nibh. Sed id massa vel sapien cursus facilisis dignissim eget nibh.', NULL, NULL, 'Days', NULL, NULL, NULL, 'inactive', 'inactive', '2024-03-29 09:50:59', '2024-03-29 09:50:59'),
(3, 107, 2, 6, NULL, 'Lorem ipsum dolor sit amet, consectetur massa vel sapien cursus facilisis dignissim eget nibh.</p>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id quam a arcu aliquam venenatis. Quisque nec purus urna. Praesent vulputate erat lectus, ut efficitur nibh eleifend quis. Pellentesque eros mauris, blandit sed mauris eu, vehicula facilisis neque. Fusce varius vehicula lacinia. Ut consequat viverra purus, sit amet malesuada nibh. Sed id massa vel sapien cursus facilisis dignissim eget nibh.', NULL, NULL, 'Days', NULL, NULL, NULL, 'inactive', 'inactive', '2024-03-29 10:10:59', '2024-03-29 10:10:59'),
(4, 100, 2, 3, NULL, '<p>Medical Sick leave</p>\r\n\r\n<p>Leave start date: 00-00-0000<br />\r\nLeave finish date: 00-00-0000</p>\r\n\r\n<p>Number of days given: 00</p>\r\n\r\n<p>Procedure: 0000<br />\r\nProcedure date: 0000<br />\r\nReason for leave: to assess post-procedure recovery</p>\r\n\r\n<p>Leave issued via MOH e-Portal and attached to this note (YES / NO)</p>', 'summery', NULL, NULL, 'Days', NULL, NULL, NULL, 'inactive', 'inactive', '2024-03-30 06:18:51', '2024-03-30 06:18:51'),
(5, 100, 2, 6, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at elementum mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis luctus ultrices massa, sit amet tincidunt risus scelerisque vitae. Sed maximus neque eget lacus tristique tempus. Duis hendrerit nisi mattis, vehicula elit ut, maximus purus. Suspendisse&nbsp;</p>', 'Veniam sed deserunt', '25', 'CT / Fluro Guided joint / facet RFA (Radio-Frequency) ablation', 'Months', 'Suscipit ratione dis', 'dopuzij@mailinator.com', NULL, 'active', 'active', '2024-03-30 06:20:31', '2024-03-30 06:20:31'),
(6, 109, 2, 3, NULL, '<p>Medical Sick leave</p>\r\n\r\n<p>Leave start date: 00-00-0000<br />\r\nLeave finish date: 00-00-0000</p>\r\n\r\n<p>Number of days given: 00</p>\r\n\r\n<p>Procedure: 0000<br />\r\nProcedure date: 0000<br />\r\nReason for leave: to assess post-procedure recovery</p>\r\n\r\n<p>Leave issued via MOH e-Portal and attached to this note (YES / NO)</p>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at elementum mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit', NULL, NULL, 'Days', NULL, NULL, NULL, 'inactive', 'inactive', '2024-03-30 06:25:49', '2024-03-30 06:25:49'),
(7, 109, 2, 6, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at elementum mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>', NULL, NULL, NULL, 'Days', NULL, NULL, NULL, 'inactive', 'inactive', '2024-03-30 06:26:14', '2024-03-30 06:26:14'),
(8, 109, 2, 3, NULL, '<p>Medical Sick leave</p>\r\n\r\n<p>Leave start date: 00-00-0000<br />\r\nLeave finish date: 00-00-0000</p>\r\n\r\n<p>Number of days given: 00</p>\r\n\r\n<p>Procedure: 0000<br />\r\nProcedure date: 0000<br />\r\nReason for leave: to assess post-procedure recovery</p>\r\n\r\n<p>Leave issued via MOH e-Portal and attached to this note (YES / NO)</p>', 'summery testing', NULL, NULL, 'Days', NULL, NULL, NULL, 'inactive', 'inactive', '2024-03-30 06:48:28', '2024-03-30 06:48:28'),
(9, 109, 2, 6, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at elementum mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis luctus ultrices massa, sit amet tincidunt risus scelerisque vitae. Sed maximus neque eget lacus tristique tempus. Duis hendrerit nisi mattis, vehicula elit ut, maximus purus. Suspendisse consequat dapibus libero ac eleifend. Duis molestie ut eros quis suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean malesuada sed arcu et pretium. Etiam porttitor, enim id luctus mattis, orci lorem rutrum odio, eu suscipit libero ipsum quis diam. Cras a ultrices odio, sit amet convallis massa. Etiam porttitor nunc non nunc imperdiet auctor. Sed sit amet dolor ut lacus placerat eleifend. Etiam ut lorem at elit dapibus congue elementum id magna. Nulla venenatis magna tortor, id efficitur mi faucibus vitae. Nam eleifend pulvinar quam eu semper.</p>', NULL, NULL, NULL, 'Days', NULL, NULL, NULL, 'inactive', 'inactive', '2024-03-30 06:49:36', '2024-03-30 06:49:36'),
(10, 112, 133, 3, NULL, '<p>Exceptional Discount granted: 00%</p>\r\n\r\n<p>Discount granted for: (Consultation / Procedure)</p>\r\n\r\n<p>Copy of discount approval form is being attached to this note (YES / NO)</p>', 'ggygbbhn b hbujhhujjhij b njmnjhhnjn', '5', NULL, 'Days', 'ex - 454nbhbh', 'doctors@gmail.com', 8547845456, 'active', 'active', '2024-04-03 11:23:30', '2024-04-03 11:23:30'),
(11, 112, 133, 1, NULL, '<p>Attendant name: 0000<br />\r\nAttendance date: &nbsp;00-00-0000</p>\r\n\r\n<p>Attendance certificate was issued, signed, stamped and attached to this note (YES / NO)</p>', NULL, NULL, NULL, 'Days', NULL, NULL, NULL, 'inactive', 'inactive', '2024-04-03 11:26:00', '2024-04-03 11:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient_progress_note_details`
--

CREATE TABLE `patient_progress_note_details` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `progress_note_canned_text_id` bigint(20) UNSIGNED DEFAULT NULL,
  `progress_note_contents_id` bigint(20) UNSIGNED DEFAULT NULL,
  `describe` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_progress_note_details`
--

INSERT INTO `patient_progress_note_details` (`id`, `patient_id`, `progress_note_canned_text_id`, `progress_note_contents_id`, `describe`, `created_at`, `updated_at`) VALUES
(5, 6, 3, 3, 'Medical Sick leave.\r\nLeave start date: 00-00-0000Leave finish date: 00-00-0000\r\nNumber of days given: 00\r\nProcedure: 0000Procedure date: 0000Reason for leave: to assess post-procedure recovery\r\nLeave issued via MOH e-Portal and attached to this note (YES / NO)\"\"\"\"\"', NULL, NULL),
(6, 6, 1, 3, '<p>Attendant name: 0000<br>Attendance date: &nbsp;00-00-0000</p>\r\n<p>Attendance certificate was issued, signed, stamped and attached to this note (YES / NO)</p>', NULL, NULL),
(7, 6, 2, 3, '<p>Amount of cash received: 0000 OMR<br>Paid by: &nbsp;(Patient / Relative)</p>\r\n<p>If relative paid for service indicate the name here 0000</p>\r\n<p>Amount received, cash invoiced issued and sent to patient electronically. Copy of receipt invoice being attached to this note (YES / NO)</p>', NULL, NULL),
(8, 6, 4, 3, 'Exceptional Discount granted: 00%.\r\nDiscount granted for: (Consultation / Procedure)\r\nCopy of discount approval form is being attached to this note (YES / NO)\"', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_refers`
--

CREATE TABLE `patient_refers` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) DEFAULT NULL,
  `refer_doctor_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_special_notes`
--

CREATE TABLE `patient_special_notes` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `note_text` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_special_notes`
--

INSERT INTO `patient_special_notes` (`id`, `patient_id`, `note_text`, `created_at`, `updated_at`) VALUES
(1, 6, 'hw', '2023-12-23 02:40:55', '2023-12-23 02:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `patient_supportive_treatments`
--

CREATE TABLE `patient_supportive_treatments` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` longtext DEFAULT NULL,
  `treatment` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_supportive_treatments`
--

INSERT INTO `patient_supportive_treatments` (`id`, `patient_id`, `doctor_id`, `title`, `sub_title`, `treatment`, `created_at`, `updated_at`) VALUES
(1, 107, 2, 'Libero veniam eiusm', 'At architecto labore', 'Libero enim beatae d', '2024-03-28 04:05:51', '2024-03-28 04:05:51'),
(2, 107, 2, 'Suscipit vel volupta', 'Quia aliqua Tenetur', 'Sit dolor dignissimo', '2024-03-28 04:12:49', '2024-03-28 04:12:49'),
(3, 102, 2, 'Velit rem commodi q', 'Et laborum non alias', 'Accusamus soluta lab', '2024-03-29 07:58:59', '2024-03-29 07:58:59'),
(4, 100, 2, 'Voluptatem minima co', 'Nisi totam earum eni', 'Obcaecati qui laudan', '2024-03-30 00:48:01', '2024-03-30 00:48:01'),
(5, 109, 2, 'Tempora quia minima', 'Nesciunt rerum aut', 'Minim dolore vel cum', '2024-03-30 00:57:44', '2024-03-30 00:57:44'),
(6, 109, 2, 'Repudiandae eaque si', 'Est id adipisci dic', 'Ut dolorem voluptatu', '2024-03-30 01:23:23', '2024-03-30 01:23:23'),
(7, 109, 2, 'In nihil aliquam ea', 'Anim nulla deserunt', 'Est sunt corrupti q', '2024-03-30 01:23:41', '2024-03-30 01:23:41'),
(8, 109, 2, 'Natus cupidatat eos', 'Nihil velit aperiam', 'Adipisicing est esse', '2024-03-30 01:59:14', '2024-03-30 01:59:14'),
(9, 109, 2, 'Lorem aperiam beatae', 'Asperiores qui nulla', 'Exercitationem volup', '2024-03-30 01:59:36', '2024-03-30 01:59:36'),
(10, 109, 2, 'Proident et quibusd', 'Omnis provident sin', 'Voluptates aut repre', '2024-03-30 17:38:11', '2024-03-30 17:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `patient_symptoms`
--

CREATE TABLE `patient_symptoms` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `symptom_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_symptoms`
--

INSERT INTO `patient_symptoms` (`id`, `patient_id`, `symptom_name`, `created_at`, `updated_at`) VALUES
(1, 6, 'symptom', '2023-12-23 01:32:49', '2023-12-23 01:32:49'),
(2, 6, 'symptom 2', '2023-12-23 01:34:49', '2023-12-23 01:34:49'),
(3, 64, 'ss', '2024-01-19 19:13:31', '2024-01-19 19:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `patient_tasks`
--

CREATE TABLE `patient_tasks` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `task` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `text` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_tasks`
--

INSERT INTO `patient_tasks` (`id`, `patient_id`, `task`, `name`, `date`, `text`, `created_at`, `updated_at`) VALUES
(1, 6, 'my task', 'SAIF xyz', '28 Nov, 2023', '123456789', '2023-12-22 14:35:10', '2023-12-22 14:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `patient_thyroid_diagnosis`
--

CREATE TABLE `patient_thyroid_diagnosis` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(100) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_name` varchar(255) DEFAULT NULL,
  `data_value` longtext DEFAULT NULL,
  `form_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_thyroid_diagnosis`
--

INSERT INTO `patient_thyroid_diagnosis` (`id`, `patient_id`, `doctor_id`, `title_name`, `data_value`, `form_type`, `created_at`, `updated_at`) VALUES
(1, 100, 2, 'diagnosis_general', '{\"LowerGIBleed\":[\"Lower GI Bleed\"],\"Chronicconstipation\":[\"Chronic constipation\"],\"Proctitis\":[\"Proctitis\"],\"Harum_dolor_ex_digni\":[\"Harum dolor ex digni\"]}', 'HaemorrhoidsEmbo', '2024-02-29 13:27:25', '2024-02-29 13:27:25'),
(2, 100, 2, 'diagnosis_cid', '{\"D129\":[\"D12.9 Benign neoplasm: Anus and anal canal\"],\"K64\":[\"K64 Haemorrhoids and perianal venous thrombosis\"],\"K640\":[\"K64.0 First degree haemorrhoids\"],\"K641\":[\"K64.1 Second degree haemorrhoids\"],\"K642\":[\"K64.2 Third degree haemorrhoids\"],\"K643\":[\"K64.3 Fourth degree haemorrhoids\"],\"a022\":[\"022 Venous complications and hemorrhoids in pregnancy\"]}', 'HaemorrhoidsEmbo', '2024-02-29 13:27:25', '2024-02-29 13:27:25'),
(3, 100, 2, 'symptoms', '[{\"SymptomType\":\"Anal bulge (self-retract)\",\"SymptomDurationValue\":\"2\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Incididunt non asper\"},{\"SymptomType\":\"Anal bulge (persistent \\/ assisted retraction)\",\"SymptomDurationValue\":\"20\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Explicabo Laborum\"},{\"SymptomType\":\"Anal bleed\",\"SymptomDurationValue\":\"5\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Aut cumque id et et\"},{\"SymptomType\":\"Anal pain\",\"SymptomDurationValue\":\"21\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Error voluptas quia\"},{\"SymptomType\":\"Anal itching\",\"SymptomDurationValue\":\"19\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Laboris exercitation\"},{\"SymptomType\":\"Constipation\",\"SymptomDurationValue\":\"26\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Nulla quo sint conse\"},{\"SymptomType\":\"Other\",\"SymptomDurationValue\":\"9\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Et vero culpa ea se\"}]', 'HaemorrhoidsEmbo', '2024-02-29 13:27:25', '2024-02-29 13:27:25'),
(4, 100, 2, 'symptoms_score', '{\"Analbulge\":[\"5\"],\"retraction\":[\"5\"],\"Analbleed\":[\"3\"],\"Analpain\":[\"3\"],\"Analitching\":[\"0\"],\"Constipation\":[\"0\"]}', 'HaemorrhoidsEmbo', '2024-02-29 13:27:25', '2024-02-29 13:27:25'),
(5, 100, 2, 'Referral', '{\"Lipidemacareprogram\":[\"Lipidema care program\"],\"LipidemacareprogramNote\":[\"Voluptas cupiditate\"],\"PhysioTherapy\":[\"Post EVLT - Rehab\\/PhysioTherapy\"],\"PhysioTherapyNote\":[\"Enim vel voluptatibu\"],\"Others\":[\"Others\"],\"OthersNote\":[\"Consequat In occaec\"]}', 'HaemorrhoidsEmbo', '2024-02-29 13:27:25', '2024-02-29 13:27:25'),
(6, 100, 2, 'Supportive', '{\"IVVITATHYROID175\":[\"IVVITATHYROID175\"],\"PROZ290\":[\"PROZ290\"]}', 'HaemorrhoidsEmbo', '2024-02-29 13:27:25', '2024-02-29 13:27:25'),
(7, 100, 2, 'SpecialInvestigation', '{\"endoscopy\":[\"Normal\"]}', 'HaemorrhoidsEmbo', '2024-02-29 13:27:25', '2024-02-29 13:27:25'),
(8, 100, 2, 'ElegibilitySTATUS', '{\"HEMARRHOIDSEMBOLIZATION\":[\"HEMARRHOIDS EMBOLIZATION (HE)\"],\"HEMARRHOIDSEMBOLIZATIONNote\":[\"Ut Nam aut voluptate\"],\"Others\":[\"Others\"],\"OthersNote\":[\"Totam qui lorem nisi\"]}', 'HaemorrhoidsEmbo', '2024-02-29 13:27:25', '2024-02-29 13:27:25'),
(9, 100, 2, 'Intervention', '{\"ANGIOHE2910\":[\"ANGIOHE2910\"],\"LABPREANGIO48\":[\"LABPREANGIO48\"],\"LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\"],\"USHSCLERO490\":[\"USHSCLERO490\"],\"LABPREIRBASIC32\":[\"LABPREIRBASIC32\"]}', 'HaemorrhoidsEmbo', '2024-02-29 13:27:25', '2024-02-29 13:27:25'),
(10, 100, 2, 'MDT', '{\"HE\":[\"HE\"],\"HENote\":[\"Aliquid ex culpa com\"],\"Medical\":[\"Medical\"],\"MedicalNote\":[\"In totam adipisicing\"],\"Surgical\":[\"Surgical\"],\"SurgicalNote\":[\"Hic distinctio Arch\"],\"options\":[\"options\"],\"optionsNote\":[\"Harum soluta consequ\"]}', 'HaemorrhoidsEmbo', '2024-02-29 13:27:25', '2024-02-29 13:27:25'),
(11, 100, 2, 'Lab', '{\"ESR\":[\"low\"],\"CRP\":[\"normal\"],\"Externalhemorrhoids\":[\"YES\"],\"Internalhemorrhoids\":[\"No\"],\"Thrombosedhemorrhoids\":[\"YES\"],\"BnignPolyp\":[\"No\"],\"Polp\":[\"No\"],\"tumor\":[\"No\"],\"Ulcer\":[\"No\"],\"Analfissure\":[\"No\"],\"Fistula\":[\"YES\"]}', 'HaemorrhoidsEmbo', '2024-02-29 13:27:25', '2024-02-29 13:27:25'),
(12, 100, 2, 'Imaging', '{\"ExternalHemarrhoids\":[\"No\"],\"InternalHemarrhoids\":[\"YES\"],\"SuspiciousAnalMass\":[\"No\"],\"ProminentSRAarteries\":[\"YES\"],\"Dilatedanalveins\":[\"YES\"],\"thrombosedhemorrhoids\":[\"No\"],\"Congestedpelvicveins\":[\"YES\"],\"Suspicious\":[\"YES\"],\"SuperiorHemorrhoidalarteries\":[\"Prominent\"],\"MiddleHemorrhoidalarteries\":[\"NonProminent\"],\"InferiorHemorrhoidalarteries\":[\"NonProminent\"]}', 'HaemorrhoidsEmbo', '2024-02-29 13:27:25', '2024-02-29 13:27:25'),
(13, 100, 2, 'ClinicalIndicator', '{\"AnalFissure\":[\"YES\"],\"AnalDischarge\":[\"No\"],\"Fistulainano\":[\"YES\"],\"Hemarrhoidectomy\":[\"No\"],\"Laser\":[\"No\"]}', 'HaemorrhoidsEmbo', '2024-02-29 13:27:25', '2024-02-29 13:27:25'),
(14, 100, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Abnormal\"],\"RegionalExamNote\":[\"Officia labore nostr\"],\"SystemicExam\":[\"Abnormal\"],\"SystemicExamNote\":[\"Obcaecati et ea dolo\"]}', 'HaemorrhoidsEmbo', '2024-02-29 13:27:25', '2024-02-29 13:27:25'),
(15, 100, 2, 'ElegibilitySTATUS', '{\"Itaque in esse non\":{\"asd\":\"Velit mollitia ex ex\"},\"Numquam officiis ut\":{\"asd\":\"Elit occaecat et ma\"},\"Ducimus repellendus\":{\"asd\":\"Sequi et id non ex\"}}', 'HaemorrhoidsEmbo', '2024-02-29 13:27:43', '2024-02-29 13:27:43'),
(16, 100, 2, 'diagnosis_general', '{\"GEN1\":[\"ddf\"]}', 'HaemorrhoidsEmbo', '2024-02-29 13:47:03', '2024-02-29 13:47:03'),
(17, 100, 2, 'symptoms', '[{\"SymptomType\":\"Nihil placeat magni\",\"SymptomDurationValue\":\"27\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Ea autem assumenda n\"},{\"SymptomType\":\"Voluptatem dicta cor\",\"SymptomDurationValue\":\"25\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Fugiat molestiae ci\"},{\"SymptomType\":\"Magnam nisi sed assu\",\"SymptomDurationValue\":\"27\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Laudantium dolorem\"},{\"SymptomType\":\"Alias minima exercit\",\"SymptomDurationValue\":\"27\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Nam quisquam dolorum\"}]', 'HaemorrhoidsEmbo', '2024-03-01 04:48:04', '2024-03-01 04:48:04'),
(40, 100, 2, 'diagnosis_general', '{\"KneeGradeI\":[\"Grade I-II OA Knee\"],\"KneeGrade2\":[\"Grade III-V OA knee\"],\"HyalineCartilageDisease\":[\"Hyaline Cartilage Disease\"],\"Degeneration\":[\"Menisceal injury \\/ Degeneration\"],\"ligamentous\":[\"ligamentous injury \\/ Degeneration\"],\"JointEffusion\":[\"Joint Effusion\"],\"Tendenopathy\":[\"Tendenopathy\"],\"NonsepticArthritis\":[\"Non-septic Arthritis\"],\"SepticArthritis\":[\"Septic Arthritis\"],\"Bursitis\":[\"Bursitis\"],\"hemoarthrosis\":[\"hemoarthrosis\"],\"OCD\":[\"Osteochondral Disease (OCD)\"],\"PatellaChondromalacia\":[\"Patella Chondromalacia\"],\"PatellaSubluxation\":[\"Patella Subluxation\"],\"kneeDeformity\":[\"knee Deformity\"],\"Veniam_in_incidunt\":[\"Veniam in incidunt\"],\"GEN1\":[\"gen1\"]}', 'KneePain', '2024-03-05 09:48:03', '2024-03-05 09:48:03'),
(41, 100, 2, 'diagnosis_cid', '{\"D480\":[\"D48.0 Neoplasm of uncertain or unknown behaviour: Bone and articular cartilage Neoplasm, neoplastic|meniscus, knee joint (lateral) (medial) <>\\/Uncertain or unknown behaviour\"],\"M230\":[\"M23.0 Cystic meniscus\"],\"M231\":[\"M23.1 Discoid meniscus (congenital)\"],\"M232\":[\"M23.2 Derangement of meniscus due to old tear or injury\"],\"M233\":[\"M23.3 Other meniscus derangements\"],\"M234\":[\"M23.4 Loose body in knee\"],\"M236\":[\"M23.6 Other spontaneous disruption of ligaments of knee\"],\"M239\":[\"M23.9 Internal derangement of knee, unspecified\"],\"S820\":[\"S82.0 Fracture of patella\"],\"S830\":[\"S83.0 Dislocation of patella\"],\"S831\":[\"S83.1 Dislocation of knee\"],\"S832\":[\"S83.2 Tear of meniscus, current\",\"S83.2 Tear of meniscus, current\"],\"S833\":[\"S83.3 Tear of articular cartilage of knee, current\"],\"S8371\":[\"S83.7 Injury to multiple structures of knee\"],\"S899\":[\"S89.9 Unspecified injury of lower leg\"],\"Q682\":[\"Q68.2 Congenital deformity of knee\"],\"Q741\":[\"Q74.1 Congenital malformation of knee Hypertrophy, hypertrophic|meniscus, knee, congenital\"],\"M768\":[\"M76.8 Other enthesopathies of lower limb, excluding foot\"],\"M794\":[\"M79.4 Hypertrophy of (infrapatellar) fat pad\"],\"M210\":[\"M21.0 Valgus deformity, not elsewhere classified. Knock knee (acquired)\"],\"M2441\":[\"M24.4 Recurrent dislocation and subluxation of joint\"],\"L031\":[\"L03.1 Cellulitis of other parts of limb\"],\"M243\":[\"M24.3 Pathological dislocation and subluxation of joint, not elsewhere classified\"],\"M219\":[\"M21.9 Acquired deformity of limb, unspecified, Deformity knee (acquired) NEC\"],\"M652\":[\"M65.2 Calcific tendinitis Calcification|tendon (sheath)|with bursitis, synovitis or tenosynovitis\"],\"M932\":[\"M93.2 Osteochondritis dissecans Osteochondrosis dissecans (knee) (shoulder)\"],\"Z895\":[\"Z89.5 Acquired absence of leg at or below knee\"],\"Magna_ad_aut_laborum\":[\"Magna ad aut laborum\"],\"ICD1\":[\"icd10\"]}', 'KneePain', '2024-03-05 09:48:03', '2024-03-05 09:48:03'),
(42, 100, 2, 'symptoms', '[{\"SymptomType\":\"Medial knee pain\",\"SymptomDurationValue\":\"23\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Soluta ut doloremque\"},{\"SymptomType\":\"Anterior Knee Pain\",\"SymptomDurationValue\":\"7\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Aute natus deserunt\"},{\"SymptomType\":\"Audiable knee sound\",\"SymptomDurationValue\":\"8\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Beatae ad reprehende\"},{\"SymptomType\":\"Knee swellimg\",\"SymptomDurationValue\":\"25\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Numquam ut tempore\"},{\"SymptomType\":\"Restricted knee flextion\",\"SymptomDurationValue\":\"20\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Laudantium in liber\"},{\"SymptomType\":\"Restricted Walking \\/ running\",\"SymptomDurationValue\":\"5\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Quia at similique cu\"},{\"SymptomType\":\"Restricted knee extensiom\",\"SymptomDurationValue\":\"20\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Similique non perspi\"},{\"SymptomType\":\"Unstable knee \\/ locking knee\",\"SymptomDurationValue\":\"30\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Vitae vitae harum ei\"},{\"SymptomType\":\"Deformed Valgus \\/Varus or Valgus knee\",\"SymptomDurationValue\":\"11\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Adipisicing eligendi\"},{\"SymptomType\":\"Warm knee\",\"SymptomDurationValue\":\"30\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Commodi culpa praes\"},{\"SymptomType\":\"Lethargy\",\"SymptomDurationValue\":\"18\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Quaerat quis asperna\"},{\"SymptomType\":\"Fatigue\",\"SymptomDurationValue\":\"30\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Quos tempora repudia\"},{\"SymptomType\":\"Other\",\"SymptomDurationValue\":\"3\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Incididunt officia e\"},{\"SymptomType\":\"Et incididunt amet\",\"SymptomDurationValue\":\"9\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Consequatur In ipsu\"}]', 'KneePain', '2024-03-05 09:48:03', '2024-03-05 09:48:03'),
(43, 100, 2, 'symptoms_score', '{\"Medialkneepain\":[\"1\"],\"AnteriorKneePain\":[\"1\"],\"Audiablekneesound\":[\"5\"],\"Kneeswellimg\":[\"3\"],\"Restrictedkneeflextion\":[\"0\"],\"Restrictedkneeextensiom\":[\"5\"],\"RestrictedWalking\":[\"3\"],\"Unstableknee\":[\"1\"],\"DeformedValgus\":[\"5\"],\"Warmknee\":[\"3\"]}', 'KneePain', '2024-03-05 09:48:03', '2024-03-05 09:48:03'),
(44, 100, 2, 'Referral', '{\"Rheumatology\":[\"Rheumatology\"],\"RheumatologyNote\":[\"Nihil animi quos in\"],\"OrthopedicsSurgery\":[\"Orthopedics Surgery\"],\"OrthopedicsSurgeryNote\":[\"Expedita cupiditate\"],\"Orthotics\":[\"Orthotics\"],\"OrthoticsNote\":[\"Sint non consequatur\"],\"Others\":[\"Others\"],\"OthersNote\":[\"Aperiam quidem ipsam\"]}', 'KneePain', '2024-03-05 09:48:03', '2024-03-05 09:48:03'),
(45, 100, 2, 'Supportive', '{\"IVVITAPAIN175\":[\"IVVITAPAIN175\"],\"IMCOLLAGEN110\":[\"IMCOLLAGEN110\"],\"IAOZ290\":[\"IAOZ290\"],\"LABPREIVBASIC52\":[\"LABPREIVBASIC52\"],\"LABPREIRBASIC32\":[\"LABPREIRBASIC32\"],\"Adipisci_qui_incidun\":[\"Adipisci qui incidun\"]}', 'KneePain', '2024-03-05 09:48:03', '2024-03-05 09:48:03'),
(46, 100, 2, 'Prescription', '{\"Glucasamine\":[\"Glucasamine Chondroitin Tab -1 tab PO BID x 2 months\"],\"Collagen\":[\"Collagen Suppliment (powder \\/ liquid) - 1 scoop \\/ 1 saschet PO OD x 3 months\"],\"Diclofenac\":[\"Diclofenac Gel 1 Ampule -Topical TID x 2 weeks\"],\"Riparil\":[\"Riparil Gel 1 Ampule - Topical TID x 2 weeks\"],\"Sporidex\":[\"Sporidex (Cephalexin) Tab - 500 mg PO BID x 5 days\"]}', 'KneePain', '2024-03-05 09:48:03', '2024-03-05 09:48:03'),
(47, 100, 2, 'SpecialInvestigation', '{\"Peripheral\":[\"Abnormal\"],\"PeripheralNote\":[\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\"]}', 'KneePain', '2024-03-05 09:48:03', '2024-03-05 09:48:03'),
(48, 100, 2, 'ElegibilitySTATUS', '{\"HistopathMSKBiopsy\":[\"Eligibile\"],\"HistopathMSKBiopsyNote\":[\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\"],\"TopicalAnalgesics\":[\"Eligibile\"],\"TopicalAnalgesicsNote\":[\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\"],\"POAnalgesics\":[\"Non-Eligibile\"],\"Chondroitin\":[\"Non-Eligibile\"],\"POCollagen\":[\"Eligibile\"],\"POCollagenNote\":[\"Quia voluptas perspi\"],\"conservativeVitamines\":[\"Eligibile\"],\"conservativeVitaminesNote\":[\"Nam sed sed perferen\"],\"conservativeIMNurobion\":[\"Eligibile\"],\"conservativeIMNurobionNote\":[\"Dolor ut id corpori\"],\"conservativeIMCollagen\":[\"Non-Eligibile\"],\"conservativekneeBrace\":[\"Non-Eligibile\"],\"Steroidsinjection\":[\"Eligibile\"],\"SteroidsinjectionNote\":[\"Exercitation sint q\"],\"HAinjection\":[\"Non-Eligibile\"],\"PRPinjection\":[\"Eligibile\"],\"PRPinjectionNote\":[\"Ut ex est magna dolo\"],\"OzoneIAinjection\":[\"Eligibile\"],\"OzoneIAinjectionNote\":[\"Facere consequat Ne\"],\"NeurolysisBlock\":[\"Non-Eligibile\"],\"NerveRFAblation\":[\"Non-Eligibile\"],\"NerveCooledRF\":[\"Eligibile\"],\"NerveCooledRFNote\":[\"Dolor est nihil ut e\"],\"NerveCryotherapy\":[\"Eligibile\"],\"Others\":[\"Non-Eligibile\"]}', 'KneePain', '2024-03-05 09:48:03', '2024-03-05 09:48:03'),
(49, 100, 2, 'Intervention', '{\"USHAINJECTION310LABPREIRBASIC32\":[\"LABPREIRBASIC32\"],\"USIAOOZINJECTION340LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\"],\"USNEUROLYSISBLOCK430LABPREIRBASIC32\":[\"LABPREIRBASIC32\"],\"USNEUROLYSISBLOCK430LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\"],\"USRFABLATION490LABPREIRBASIC32\":[\"LABPREIRBASIC32\"],\"USRFABLATION490LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\"],\"USCRYOABLATION610LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\"],\"ANGIOGAE2310LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\"]}', 'KneePain', '2024-03-05 09:48:03', '2024-03-05 09:48:03'),
(50, 100, 2, 'MDT', '{\"IRprocedure\":[\"IR procedure\"],\"IRprocedureNote\":[\"Iste hic quia nostru\"],\"Medical\":[\"Medical\"],\"MedicalNote\":[\"A deleniti sit modi\"],\"Surgical\":[\"Surgical\"],\"SurgicalNote\":[\"Officia delectus do\"],\"options\":[\"options\"],\"optionsNote\":[\"Animi accusamus vol\"]}', 'KneePain', '2024-03-05 09:48:03', '2024-03-05 09:48:03'),
(51, 100, 2, 'Lab', '{\"CBC\":[\"high\"],\"CRP\":[\"high\"],\"ESR\":[\"low\"],\"CKMP\":[\"low\"],\"UricAcid\":[\"high\"],\"RF\":[\"high\"],\"WBC\":[\"high\"],\"Proteins\":[\"normal\"],\"Glucose\":[\"low\"],\"Crystals\":[\"normal\"],\"Lactate\":[\"low\"],\"USSTBIOPSYMSK452\":[\"Abnormal\"],\"USSTBIOPSYMSK452Note\":[\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\"]}', 'KneePain', '2024-03-05 09:48:03', '2024-03-05 09:48:03'),
(52, 100, 2, 'Imaging', '{\"Softtissue\":[\"Abnormal\"],\"SofttissueNote\":[\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\"],\"SuperiorMedialGN\":[\"Visible\"],\"InferiorMedialGN\":[\"Non-Visible\"],\"SuperiorLateralGN\":[\"Visible\"],\"Kneeeffusion\":[\"Visible\"],\"Osteoarthreticfeatures\":[\"Non-Visible\"],\"MRCIR48\":[\"Abnormal\"],\"MRCIR48Note\":[\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\"],\"CTCIR48\":[\"Abnormal\"],\"CTCIR48Note\":[\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\"]}', 'KneePain', '2024-03-05 09:48:03', '2024-03-05 09:48:03'),
(53, 100, 2, 'ClinicalIndicator', '{\"SepticKnee\":[\"No\"],\"KneeProsthesis\":[\"YES\"]}', 'KneePain', '2024-03-05 09:48:03', '2024-03-05 09:48:03'),
(54, 100, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Abnormal\"],\"RegionalExamNote\":[\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\"],\"SystemicExam\":[\"Abnormal\"],\"SystemicExamNote\":[\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,\"]}', 'KneePain', '2024-03-05 09:48:03', '2024-03-05 09:48:03'),
(70, 100, 2, 'diagnosis_general', '{\"GEN1\":[\"gen1\"]}', 'KneePain', '2024-03-05 12:39:08', '2024-03-05 12:39:08'),
(71, 100, 2, 'diagnosis_cid', '{\"ICD1\":[\"icd10\"]}', 'KneePain', '2024-03-05 12:39:08', '2024-03-05 12:39:08'),
(72, 100, 2, 'diagnosis_general', '{\"GEN1\":[\"test\"]}', 'KneePain', '2024-03-05 12:40:31', '2024-03-05 12:40:31'),
(168, 98, 2, 'diagnosis_general', '{\"GEN1\":[\"abcd\"]}', 'general_form', '2024-03-07 09:53:30', '2024-03-07 09:53:30'),
(205, 98, 2, 'diagnosis_general', '{\"UterineFibroid\":[\"Uterine Fibroid\"]}', 'uterine_embo', '2024-03-07 10:14:08', '2024-03-07 10:14:08'),
(206, 98, 2, 'diagnosis_cid', '{\"D250\":[\"D25.0 Submucous leiomyoma of uterus\"]}', 'uterine_embo', '2024-03-07 10:14:08', '2024-03-07 10:14:08'),
(207, 98, 2, 'symptoms', '[{\"SymptomType\":\"Heavy Period\",\"SymptomDurationValue\":\"2\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"mmmmmmmmmmmm\"}]', 'uterine_embo', '2024-03-07 10:14:08', '2024-03-07 10:14:08'),
(208, 98, 2, 'symptoms_score', '{\"HeavyPeriod\":[\"3\"]}', 'uterine_embo', '2024-03-07 10:14:08', '2024-03-07 10:14:08'),
(209, 98, 2, 'Referral', '{\"Gynae\":[\"Gynae\"],\"GynaeNote\":[\"oiuhygf\"]}', 'uterine_embo', '2024-03-07 10:14:08', '2024-03-07 10:14:08'),
(210, 98, 2, 'Supportive', '{\"IVVITATHYROID175\":[\"IVVITATHYROID175\"]}', 'uterine_embo', '2024-03-07 10:14:08', '2024-03-07 10:14:08'),
(211, 98, 2, 'SpecialInvestigation', '{\"PAPSmear\":[\"Normal\"]}', 'uterine_embo', '2024-03-07 10:14:08', '2024-03-07 10:14:08'),
(212, 98, 2, 'ElegibilitySTATUS', '{\"UFE\":[\"UFE\"],\"UFENote\":[\"iuhjk\"]}', 'uterine_embo', '2024-03-07 10:14:08', '2024-03-07 10:14:08'),
(213, 98, 2, 'Intervention', '{\"ANGIOPAE2910\":[\"ANGIOPAE2910\"]}', 'uterine_embo', '2024-03-07 10:14:08', '2024-03-07 10:14:08'),
(214, 98, 2, 'MDT', '{\"UFE\":[\"UFE\"],\"UFENote\":[\"fhgjk\"]}', 'uterine_embo', '2024-03-07 10:14:08', '2024-03-07 10:14:08'),
(215, 98, 2, 'Lab', '{\"FSH\":[\"Normal\"],\"RenalFunctiontest\":[\"Abnormal Renal profile (PAE contraindicated)\"],\"RenalFunctiontestNote\":[\"kjjgh\"],\"UrinalysisResults\":[\"Abnormal Urinanalysis (UAE unfaverable)\"],\"UrinalysisResultsNote\":[\"dfgh\"]}', 'uterine_embo', '2024-03-07 10:14:08', '2024-03-07 10:14:08'),
(216, 98, 2, 'Imaging', '{\"USGENERAL70Fibroids\":[\"Single\"],\"MRCIR48Fibroids\":[\"Single\"]}', 'uterine_embo', '2024-03-07 10:14:08', '2024-03-07 10:14:08'),
(217, 98, 2, 'ClinicalIndicator', '{\"Vaginal\":[\"YES\"]}', 'uterine_embo', '2024-03-07 10:14:08', '2024-03-07 10:14:08'),
(218, 98, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"]}', 'uterine_embo', '2024-03-07 10:14:08', '2024-03-07 10:14:08'),
(233, 98, 2, 'diagnosis_general', '{\"VaricoseVeins\":[\"Varicose Veins\"]}', 'VaricoseAblation', '2024-03-07 10:50:07', '2024-03-07 10:50:07'),
(234, 98, 2, 'diagnosis_cid', '{\"a0220\":[\"022.0 Varicose veins of lower extremity in pregnancy\"]}', 'VaricoseAblation', '2024-03-07 10:50:07', '2024-03-07 10:50:07'),
(235, 98, 2, 'symptoms', '[{\"SymptomType\":\"Dilated leg veins\",\"SymptomDurationValue\":\"2\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"jkn\"}]', 'VaricoseAblation', '2024-03-07 10:50:07', '2024-03-07 10:50:07'),
(236, 98, 2, 'symptoms_score', '{\"Dilatedlegveins\":[\"1\"]}', 'VaricoseAblation', '2024-03-07 10:50:07', '2024-03-07 10:50:07'),
(237, 98, 2, 'Referral', '{\"PhysioTherapy\":[\"Post EVLT - Rehab\\/PhysioTherapy\"],\"PhysioTherapyNote\":[\"tgrfed\"]}', 'VaricoseAblation', '2024-03-07 10:50:07', '2024-03-07 10:50:07'),
(238, 98, 2, 'Supportive', '{\"LABPREIVADVANCED230\":[\"LABPREIVADVANCED230\"]}', 'VaricoseAblation', '2024-03-07 10:50:07', '2024-03-07 10:50:07'),
(239, 98, 2, 'SpecialInvestigation', '{\"Peripheral\":[\"Normal\"]}', 'VaricoseAblation', '2024-03-07 10:50:07', '2024-03-07 10:50:07'),
(240, 98, 2, 'ElegibilitySTATUS', '{\"VVNTNTAblation\":[\"VV NTNT Ablation\"],\"VVNTNTAblationNote\":[\"bvcxz\"]}', 'VaricoseAblation', '2024-03-07 10:50:07', '2024-03-07 10:50:07'),
(241, 98, 2, 'Intervention', '{\"LABPREIRBASIC32\":[\"LABPREIRBASIC32\"]}', 'VaricoseAblation', '2024-03-07 10:50:07', '2024-03-07 10:50:07'),
(242, 98, 2, 'MDT', '{\"Ablation\":[\"NTNT VVA Ablation\"],\"AblationNote\":[\"bnvv\"]}', 'VaricoseAblation', '2024-03-07 10:50:07', '2024-03-07 10:50:07'),
(243, 98, 2, 'Lab', '{\"ESR\":[\"low\"]}', 'VaricoseAblation', '2024-03-07 10:50:07', '2024-03-07 10:50:07'),
(244, 98, 2, 'Imaging', '{\"USVENOUSDOPPLER70DilatedGSVLEFT\":[\"No\"],\"USVENOUSDOPPLER70DilatedSSVLEFT\":[\"YES\"],\"USVENOUSDOPPLER70DilatedGSVRIGHT\":[\"YES\"],\"USVENOUSDOPPLER70DilatedSSVRIGHT\":[\"YES\"],\"MRCIR48\":[\"Normal\"],\"CTCIR48\":[\"Normal\"]}', 'VaricoseAblation', '2024-03-07 10:50:07', '2024-03-07 10:50:07'),
(245, 98, 2, 'ClinicalIndicator', '{\"lowerextremityPhlepitis\":[\"YES\"]}', 'VaricoseAblation', '2024-03-07 10:50:07', '2024-03-07 10:50:07'),
(246, 98, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"]}', 'VaricoseAblation', '2024-03-07 10:50:07', '2024-03-07 10:50:07'),
(247, 98, 2, 'diagnosis_general', '{\"Haemorrhoids\":[\"Haemorrhoids\"]}', 'HaemorrhoidsEmbo', '2024-03-07 11:01:59', '2024-03-07 11:01:59'),
(248, 98, 2, 'diagnosis_cid', '{\"D129\":[\"D12.9 Benign neoplasm: Anus and anal canal\"]}', 'HaemorrhoidsEmbo', '2024-03-07 11:01:59', '2024-03-07 11:01:59'),
(249, 98, 2, 'symptoms', '[{\"SymptomType\":\"Anal bulge (self-retract)\",\"SymptomDurationValue\":\"2\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"km\"}]', 'HaemorrhoidsEmbo', '2024-03-07 11:01:59', '2024-03-07 11:01:59'),
(250, 98, 2, 'symptoms_score', '{\"Analbulge\":[\"3\"]}', 'HaemorrhoidsEmbo', '2024-03-07 11:01:59', '2024-03-07 11:01:59'),
(251, 98, 2, 'Referral', '{\"PhysioTherapy\":[\"Post EVLT - Rehab\\/PhysioTherapy\"],\"PhysioTherapyNote\":[\"fghj\"]}', 'HaemorrhoidsEmbo', '2024-03-07 11:01:59', '2024-03-07 11:01:59'),
(252, 98, 2, 'Supportive', '{\"LABPREIVBASIC52\":[\"LABPREIVBASIC52\"]}', 'HaemorrhoidsEmbo', '2024-03-07 11:01:59', '2024-03-07 11:01:59'),
(253, 98, 2, 'SpecialInvestigation', '{\"endoscopy\":[\"Normal\"]}', 'HaemorrhoidsEmbo', '2024-03-07 11:01:59', '2024-03-07 11:01:59'),
(254, 98, 2, 'ElegibilitySTATUS', '{\"HEMARRHOIDSEMBOLIZATION\":[\"HEMARRHOIDS EMBOLIZATION (HE)\"],\"HEMARRHOIDSEMBOLIZATIONNote\":[\"fghjk\"]}', 'HaemorrhoidsEmbo', '2024-03-07 11:01:59', '2024-03-07 11:01:59'),
(255, 98, 2, 'Intervention', '{\"LABPREANGIO48\":[\"LABPREANGIO48\"]}', 'HaemorrhoidsEmbo', '2024-03-07 11:01:59', '2024-03-07 11:01:59'),
(256, 98, 2, 'MDT', '{\"Medical\":[\"Medical\"],\"MedicalNote\":[\"kijuy\"]}', 'HaemorrhoidsEmbo', '2024-03-07 11:01:59', '2024-03-07 11:01:59'),
(257, 98, 2, 'Lab', '{\"ESR\":[\"low\"],\"Externalhemorrhoids\":[\"YES\"]}', 'HaemorrhoidsEmbo', '2024-03-07 11:01:59', '2024-03-07 11:01:59'),
(258, 98, 2, 'Imaging', '{\"ExternalHemarrhoids\":[\"YES\"],\"ProminentSRAarteries\":[\"YES\"],\"SuperiorHemorrhoidalarteries\":[\"Prominent\"]}', 'HaemorrhoidsEmbo', '2024-03-07 11:01:59', '2024-03-07 11:01:59'),
(259, 98, 2, 'ClinicalIndicator', '{\"AnalFissure\":[\"YES\"]}', 'HaemorrhoidsEmbo', '2024-03-07 11:01:59', '2024-03-07 11:01:59'),
(260, 98, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"]}', 'HaemorrhoidsEmbo', '2024-03-07 11:01:59', '2024-03-07 11:01:59'),
(276, 98, 2, 'diagnosis_general', '{\"KneeGrade2\":[\"Grade III-V OA knee\"]}', 'KneePain', '2024-03-07 11:07:13', '2024-03-07 11:07:13'),
(277, 98, 2, 'diagnosis_cid', '{\"D480\":[\"D48.0 Neoplasm of uncertain or unknown behaviour: Bone and articular cartilage Neoplasm, neoplastic|meniscus, knee joint (lateral) (medial) <>\\/Uncertain or unknown behaviour\"]}', 'KneePain', '2024-03-07 11:07:13', '2024-03-07 11:07:13'),
(278, 98, 2, 'symptoms', '[{\"SymptomType\":\"Medial knee pain\",\"SymptomDurationValue\":\"4\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"gfhjk\"}]', 'KneePain', '2024-03-07 11:07:13', '2024-03-07 11:07:13'),
(279, 98, 2, 'symptoms_score', '{\"Medialkneepain\":[\"3\"]}', 'KneePain', '2024-03-07 11:07:13', '2024-03-07 11:07:13'),
(280, 98, 2, 'Referral', '{\"OrthopedicsSurgery\":[\"Orthopedics Surgery\"],\"OrthopedicsSurgeryNote\":[\"drtfyghjk\"]}', 'KneePain', '2024-03-07 11:07:13', '2024-03-07 11:07:13'),
(281, 98, 2, 'Supportive', '{\"IMNEUROBION19\":[\"IMNEUROBION19\"]}', 'KneePain', '2024-03-07 11:07:13', '2024-03-07 11:07:13'),
(282, 98, 2, 'Prescription', '{\"Collagen\":[\"Collagen Suppliment (powder \\/ liquid) - 1 scoop \\/ 1 saschet PO OD x 3 months\"]}', 'KneePain', '2024-03-07 11:07:13', '2024-03-07 11:07:13'),
(283, 98, 2, 'SpecialInvestigation', '{\"Peripheral\":[\"Normal\"]}', 'KneePain', '2024-03-07 11:07:13', '2024-03-07 11:07:13'),
(284, 98, 2, 'ElegibilitySTATUS', '{\"HistopathMSKBiopsy\":[\"Non-Eligibile\"]}', 'KneePain', '2024-03-07 11:07:13', '2024-03-07 11:07:13'),
(285, 98, 2, 'Intervention', '{\"USSINJECTION190LABPREIRBASIC32\":[\"LABPREIRBASIC32\"]}', 'KneePain', '2024-03-07 11:07:13', '2024-03-07 11:07:13'),
(286, 98, 2, 'MDT', '{\"IRprocedure\":[\"IR procedure\"],\"IRprocedureNote\":[\"gtyhujk\"]}', 'KneePain', '2024-03-07 11:07:13', '2024-03-07 11:07:13'),
(287, 98, 2, 'Lab', '{\"CBC\":[\"low\"],\"WBC\":[\"high\"],\"USSTBIOPSYMSK452\":[\"Normal\"]}', 'KneePain', '2024-03-07 11:07:13', '2024-03-07 11:07:13'),
(288, 98, 2, 'Imaging', '{\"Softtissue\":[\"Normal\"],\"SuperiorMedialGN\":[\"Visible\"],\"MRCIR48\":[\"Normal\"],\"CTCIR48\":[\"Normal\"]}', 'KneePain', '2024-03-07 11:07:13', '2024-03-07 11:07:13'),
(289, 98, 2, 'ClinicalIndicator', '{\"SepticKnee\":[\"YES\"]}', 'KneePain', '2024-03-07 11:07:13', '2024-03-07 11:07:13'),
(290, 98, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"]}', 'KneePain', '2024-03-07 11:07:13', '2024-03-07 11:07:13'),
(326, 98, 2, 'symptoms', '[{\"SymptomType\":\"lkjh\",\"SymptomDurationValue\":\"2\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"mnbhgf\"}]', 'uterine_embo', '2024-03-07 11:31:39', '2024-03-07 11:31:39'),
(327, 98, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"],\"SystemicExam\":[\"Abnormal\"],\"SystemicExamNote\":[\"bhvcx\"]}', 'uterine_embo', '2024-03-07 11:31:58', '2024-03-07 11:31:58'),
(331, 91, 2, 'diagnosis_general', '{\"GEN1\":[\"123\"]}', 'general_form', '2024-03-08 04:46:21', '2024-03-08 04:46:21'),
(354, 91, 2, 'diagnosis_general', '{\"Thyroidnodule\":[\"Thyroid nodule\"],\"ThyroidCarcinoma\":[\"Thyroid Carcinoma\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(355, 91, 2, 'diagnosis_cid', '{\"C73\":[\"C73 Malignant neoplasm of thyroid gland\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(356, 91, 2, 'symptoms', '[{\"SymptomType\":\"Disfiguring Neck mass\",\"SymptomDurationValue\":\"3\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"123\"}]', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(357, 91, 2, 'symptoms_score', '{\"Disfiguring\":[\"3\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(358, 91, 2, 'Referral', '{\"NeckSurgery\":[\"ENT \\/ Head and Neck surgery\"],\"NeckSurgeryNote\":[\"fdg8\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(359, 91, 2, 'Supportive', '{\"LABPREIVADVANCED230\":[\"LABPREIVADVANCED230\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(360, 91, 2, 'SpecialInvestigation', '{\"evaluation\":[\"Normal\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(361, 91, 2, 'ElegibilitySTATUS', '{\"PTTA\":[\"PARATHYROID THERMAL ABLATION PTTA\"],\"PTTANote\":[\"oiuyt\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(362, 91, 2, 'Intervention', '{\"LABPREIRBASIC32\":[\"LABPREIRBASIC32\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(363, 91, 2, 'MDT', '{\"TE\":[\"TE\"],\"TENote\":[\"963\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(364, 91, 2, 'Lab', '{\"TSH\":[\"low\"],\"Ca\":[\"high\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(365, 91, 2, 'AntithyroidAntibodiesTests', '{\"GravesDiseaseTSAb\":[\"normal\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(366, 91, 2, 'ClinicalIndicator', '{\"Palpitations\":[\"YES\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(367, 91, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Abnormal\"],\"RegionalExamNote\":[\"not good\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(368, 91, 2, 'rightLobeScore', '{\"Composition\":[\"0\"],\"Echogenisity\":[\"1\"],\"Shape\":[\"0\"],\"Margin\":[\"0\"],\"Calcification\":[\"1\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(369, 91, 2, 'leftLobeScore', '{\"Composition\":[\"0\"],\"Echogenisity\":[\"2\"],\"Shape\":[\"3\"],\"Margin\":[\"2\"],\"Calcification\":[\"1\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(370, 91, 2, 'Retrosternalextension', '{\"extension\":[\"YES\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(371, 91, 2, 'MRCIR48', '{\"MRI\":[\"Abnormal\"],\"NOTE\":[\"11\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(372, 91, 2, 'CTCIR48', '{\"CT\":[\"Normal\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(373, 91, 2, 'NmParaThyroidScan', '{\"RightUpper\":[\"YES\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(374, 91, 2, 'HistopathRightThyroidFNA', '{\"Bathesda\":[\"Bathesda grade II\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(375, 91, 2, 'HistopathLeftThyroidFNA', '{\"Bathesda\":[\"Bathesda grade II\"]}', 'thyroid_form', '2024-03-08 04:51:27', '2024-03-08 04:51:27'),
(390, 91, 2, 'diagnosis_general', '{\"BPH\":[\"BPH\"]}', 'prostate_form', '2024-03-08 05:05:10', '2024-03-08 05:05:10'),
(391, 91, 2, 'diagnosis_cid', '{\"D075\":[\"D07.5 Carcinoma in situ: Prostate\"],\"N413\":[\"N41.3 Prostatocystitis\"]}', 'prostate_form', '2024-03-08 05:05:10', '2024-03-08 05:05:10'),
(392, 91, 2, 'symptoms', '[{\"SymptomType\":\"Urinary Frequency\",\"SymptomDurationValue\":\"4\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"kjh\"}]', 'prostate_form', '2024-03-08 05:05:10', '2024-03-08 05:05:10'),
(393, 91, 2, 'symptoms_score', '{\"Frequency\":[\"5\"],\"Nocturia\":[\"1\"]}', 'prostate_form', '2024-03-08 05:05:10', '2024-03-08 05:05:10'),
(394, 91, 2, 'Referral', '{\"NeckSurgery\":[\"ENT \\/ Head and Neck surgery\"],\"NeckSurgeryNote\":[\"kjhg567\"]}', 'prostate_form', '2024-03-08 05:05:10', '2024-03-08 05:05:10'),
(395, 91, 2, 'Supportive', '{\"IVVITATHYROID175\":[\"IVVITATHYROID175\"]}', 'prostate_form', '2024-03-08 05:05:10', '2024-03-08 05:05:10'),
(396, 91, 2, 'SpecialInvestigation', '{\"REQUROFLOI5\":[\"Normal\"],\"REQUROFLOI5NOTE\":[\"fdghj\"]}', 'prostate_form', '2024-03-08 05:05:10', '2024-03-08 05:05:10'),
(397, 91, 2, 'ElegibilitySTATUS', '{\"PAE\":[\"PAE\"],\"PAENote\":[\"d345g\"]}', 'prostate_form', '2024-03-08 05:05:10', '2024-03-08 05:05:10'),
(398, 91, 2, 'Intervention', '{\"ANGIOPAE2910\":[\"ANGIOPAE2910\"]}', 'prostate_form', '2024-03-08 05:05:10', '2024-03-08 05:05:10'),
(399, 91, 2, 'MDT', '{\"PAE\":[\"PAE\"],\"PAENote\":[\"dxfghj\"]}', 'prostate_form', '2024-03-08 05:05:10', '2024-03-08 05:05:10'),
(400, 91, 2, 'Lab', '{\"LABRFT12\":[\"Normal Renal profile\"],\"LABUA29\":[\"Normal Urinanalysis\"],\"QMax\":[\">10ml\\/s (PAE unfaverable)\"],\"LABUROFLOINVASIVE752\":[\"Normal results (PAE unfaverable)\"]}', 'prostate_form', '2024-03-08 05:05:10', '2024-03-08 05:05:10'),
(401, 91, 2, 'Imaging', '{\"USGENERAL702\":[\"PSA:TPV Ratio (PSA density)>0.15 ng\\/ml\\/cc (PAE unfaverable)\"],\"MRCIR482\":[\"PI-RADS I-III\"],\"BPHtype\":[\"NON-AdBPH\"],\"lobe\":[\"NO\"],\"Abscess\":[\"NO\"],\"CTARIGHT4\":[\"Type IV (31%)\"],\"CTALEFT2\":[\"Type II (14%)\"],\"ProstateHyperplasia\":[\"YES\"]}', 'prostate_form', '2024-03-08 05:05:10', '2024-03-08 05:05:10'),
(402, 91, 2, 'ClinicalIndicator', '{\"Erectile\":[\"YES\"]}', 'prostate_form', '2024-03-08 05:05:10', '2024-03-08 05:05:10'),
(403, 91, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"]}', 'prostate_form', '2024-03-08 05:05:10', '2024-03-08 05:05:10'),
(404, 91, 2, 'diagnosis_general', '{\"Abdominalmass\":[\"Abdominal mass\"]}', 'uterine_embo', '2024-03-08 05:05:59', '2024-03-08 05:05:59'),
(405, 91, 2, 'diagnosis_cid', '{\"N853\":[\"N85.3 Subinvolution of uterus\"]}', 'uterine_embo', '2024-03-08 05:05:59', '2024-03-08 05:05:59'),
(406, 91, 2, 'symptoms', '[{\"SymptomDurationValue\":\"1\",\"SymptomDurationType\":\"Weeks\"}]', 'uterine_embo', '2024-03-08 05:05:59', '2024-03-08 05:05:59'),
(407, 91, 2, 'symptoms_score', '{\"CompressivesymptomsUrinary\":[\"3\"]}', 'uterine_embo', '2024-03-08 05:05:59', '2024-03-08 05:05:59'),
(408, 91, 2, 'SpecialInvestigation', '{\"PAPSmear\":[\"Abnormal\"]}', 'uterine_embo', '2024-03-08 05:05:59', '2024-03-08 05:05:59'),
(409, 91, 2, 'Lab', '{\"FSH\":[\"Abnormal\"],\"UrinalysisResults\":[\"Normal Urinanalysis\"],\"PAPSMEARResults\":[\"Malignant PAP\"]}', 'uterine_embo', '2024-03-08 05:05:59', '2024-03-08 05:05:59'),
(410, 91, 2, 'Imaging', '{\"USGENERAL70Fibroids\":[\"Multiple\"],\"MRCIR48OPID\":[\"NO\"]}', 'uterine_embo', '2024-03-08 05:05:59', '2024-03-08 05:05:59'),
(411, 91, 2, 'ClinicalIndicator', '{\"Uterine\":[\"No\"]}', 'uterine_embo', '2024-03-08 05:05:59', '2024-03-08 05:05:59'),
(420, 91, 2, 'diagnosis_general', '{\"Thrombophlebitis\":[\"Thrombophlebitis\"]}', 'VaricoseAblation', '2024-03-08 05:09:46', '2024-03-08 05:09:46'),
(421, 91, 2, 'diagnosis_cid', '{\"a1832\":[\"183.2 Varicose veins of lower extremities with both ulcer and inflammation\"]}', 'VaricoseAblation', '2024-03-08 05:09:46', '2024-03-08 05:09:46'),
(422, 91, 2, 'symptoms', '{\"2\":{\"SymptomDurationValue\":\"3\",\"SymptomDurationType\":\"Days\"}}', 'VaricoseAblation', '2024-03-08 05:09:46', '2024-03-08 05:09:46'),
(423, 91, 2, 'symptoms_score', '{\"Warmlegs\":[\"1\"]}', 'VaricoseAblation', '2024-03-08 05:09:46', '2024-03-08 05:09:46'),
(424, 91, 2, 'SpecialInvestigation', '{\"Peripheral\":[\"Abnormal\"]}', 'VaricoseAblation', '2024-03-08 05:09:46', '2024-03-08 05:09:46'),
(425, 91, 2, 'Imaging', '{\"USVENOUSDOPPLER70Reflux2GSVLEFT\":[\"YES\"],\"USVENOUSDOPPLER70Reflux2SSVLEFT\":[\"YES\"],\"USVENOUSDOPPLER70OcclusiveGSVRIGH\":[\"YES\"],\"USVENOUSDOPPLER70Reflux3SSVRIGHT\":[\"YES\"],\"MRCIR48\":[\"Abnormal\"],\"CTCIR48\":[\"Abnormal\"]}', 'VaricoseAblation', '2024-03-08 05:09:46', '2024-03-08 05:09:46'),
(426, 91, 2, 'ClinicalIndicator', '{\"lowerextremityDVT\":[\"No\"]}', 'VaricoseAblation', '2024-03-08 05:09:46', '2024-03-08 05:09:46'),
(427, 91, 2, 'ClinicalExam', '{\"SystemicExam\":[\"Abnormal\"],\"SystemicExamNote\":[\"uytf\"]}', 'VaricoseAblation', '2024-03-08 05:09:46', '2024-03-08 05:09:46'),
(428, 91, 2, 'diagnosis_general', '{\"Analpain\":[\"Anal pain\"]}', 'HaemorrhoidsEmbo', '2024-03-08 05:12:02', '2024-03-08 05:12:02'),
(429, 91, 2, 'diagnosis_cid', '{\"K648\":[\"K64.8 Other specified haemorrhoids\"]}', 'HaemorrhoidsEmbo', '2024-03-08 05:12:02', '2024-03-08 05:12:02'),
(430, 91, 2, 'symptoms', '[{\"SymptomType\":\"Anal bulge (self-retract)\",\"SymptomDurationValue\":\"2\",\"SymptomDurationType\":\"Weeks\"}]', 'HaemorrhoidsEmbo', '2024-03-08 05:12:02', '2024-03-08 05:12:02'),
(431, 91, 2, 'symptoms_score', '{\"Analbulge\":[\"3\"]}', 'HaemorrhoidsEmbo', '2024-03-08 05:12:02', '2024-03-08 05:12:02'),
(432, 91, 2, 'ClinicalIndicator', '{\"AnalFissure\":[\"No\"]}', 'HaemorrhoidsEmbo', '2024-03-08 05:12:02', '2024-03-08 05:12:02'),
(433, 91, 2, 'diagnosis_general', '{\"KneeGrade2\":[\"Grade III-V OA knee\"]}', 'KneePain', '2024-03-08 05:12:43', '2024-03-08 05:12:43'),
(434, 91, 2, 'diagnosis_cid', '{\"D480\":[\"D48.0 Neoplasm of uncertain or unknown behaviour: Bone and articular cartilage Neoplasm, neoplastic|meniscus, knee joint (lateral) (medial) <>\\/Uncertain or unknown behaviour\"]}', 'KneePain', '2024-03-08 05:12:43', '2024-03-08 05:12:43'),
(435, 91, 2, 'symptoms', '[{\"SymptomDurationValue\":\"3\",\"SymptomDurationType\":\"Days\"}]', 'KneePain', '2024-03-08 05:12:43', '2024-03-08 05:12:43'),
(436, 91, 2, 'symptoms_score', '{\"Restrictedkneeflextion\":[\"1\"]}', 'KneePain', '2024-03-08 05:12:43', '2024-03-08 05:12:43'),
(437, 91, 2, 'ClinicalIndicator', '{\"KneeProsthesis\":[\"YES\"]}', 'KneePain', '2024-03-08 05:12:43', '2024-03-08 05:12:43'),
(443, 91, 2, 'diagnosis_general', '{\"CervicalCordinjury\":[\"Cervical - Cord injury\"]}', 'SpinePain', '2024-03-08 05:14:55', '2024-03-08 05:14:55'),
(444, 91, 2, 'diagnosis_cid', '{\"G541\":[\"G54.1 Lumbosacral plexus disorders, Neuropathy, neuropathic lumbar plexus\"],\"M51\":[\"M51 Other intervertebral disc disorders, thoracic, thoracolumbar and lumbosacral disc disorders\"]}', 'SpinePain', '2024-03-08 05:14:55', '2024-03-08 05:14:55'),
(445, 91, 2, 'symptoms', '{\"1\":{\"SymptomType\":\"Low back pain - Bilateral\",\"SymptomDurationValue\":\"4\",\"SymptomDurationType\":\"Weeks\"}}', 'SpinePain', '2024-03-08 05:14:55', '2024-03-08 05:14:55'),
(446, 91, 2, 'symptoms_score', '{\"Distallegnumbess\":[\"1\"]}', 'SpinePain', '2024-03-08 05:14:55', '2024-03-08 05:14:55'),
(447, 91, 2, 'Referral', '{\"Orthotics\":[\"Orthotics\"]}', 'SpinePain', '2024-03-08 05:14:55', '2024-03-08 05:14:55'),
(448, 91, 2, 'Supportive', '{\"IMNEUROBION19\":[\"IMNEUROBION19\"]}', 'SpinePain', '2024-03-08 05:14:55', '2024-03-08 05:14:55'),
(449, 91, 2, 'Prescription', '{\"Diclofenac\":[\"Diclofenac Gel 1 Ampule -Topical TID x 2 weeks\"]}', 'SpinePain', '2024-03-08 05:14:55', '2024-03-08 05:14:55'),
(450, 91, 2, 'SpecialInvestigation', '{\"Peripheral\":[\"Normal\"]}', 'SpinePain', '2024-03-08 05:14:55', '2024-03-08 05:14:55'),
(451, 91, 2, 'ElegibilitySTATUS', '{\"TopicalRiparil\":[\"Non-Eligibile\"]}', 'SpinePain', '2024-03-08 05:14:55', '2024-03-08 05:14:55'),
(452, 91, 2, 'Intervention', '{\"ANGIOIDOZINJECTION440LABPREANGIO48\":[\"LABPREANGIO48\"]}', 'SpinePain', '2024-03-08 05:14:55', '2024-03-08 05:14:55'),
(453, 91, 2, 'MDT', '{\"IRprocedure\":[\"IR procedure\"]}', 'SpinePain', '2024-03-08 05:14:55', '2024-03-08 05:14:55'),
(454, 91, 2, 'Lab', '{\"CBC\":[\"low\"]}', 'SpinePain', '2024-03-08 05:14:55', '2024-03-08 05:14:55'),
(455, 91, 2, 'Imaging', '{\"Softtissue\":[\"Normal\"],\"CervicalNerveRoots\":[\"Visible\"],\"MRCIR48\":[\"Normal\"],\"CTCIR48\":[\"Abnormal\"]}', 'SpinePain', '2024-03-08 05:14:55', '2024-03-08 05:14:55'),
(456, 91, 2, 'ClinicalIndicator', '{\"footdrop\":[\"No\"]}', 'SpinePain', '2024-03-08 05:14:55', '2024-03-08 05:14:55'),
(457, 91, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"]}', 'SpinePain', '2024-03-08 05:14:55', '2024-03-08 05:14:55'),
(463, 91, 2, 'diagnosis_general', '{\"Capsulitis\":[\"Capsulitis\"]}', 'MSKPain', '2024-03-08 05:20:31', '2024-03-08 05:20:31'),
(464, 91, 2, 'diagnosis_cid', '{\"M653\":[\"M65.3 Trigger finger Nodular tendinous disease\"],\"M708\":[\"M70.8 Other soft tissue disorders related to use, overuse and pressure Tendinitis, tendonitis|due to use, overuse, pressure|specified NEC\"]}', 'MSKPain', '2024-03-08 05:20:31', '2024-03-08 05:20:31'),
(465, 91, 2, 'symptoms', '[{\"SymptomType\":\"Focal soft tissue pain\",\"SymptomDurationValue\":\"4\",\"SymptomDurationType\":\"Days\"}]', 'MSKPain', '2024-03-08 05:20:31', '2024-03-08 05:20:31'),
(466, 91, 2, 'symptoms_score', '{\"Sleepdisturbance\":[\"1\"]}', 'MSKPain', '2024-03-08 05:20:31', '2024-03-08 05:20:31'),
(467, 91, 2, 'Referral', '{\"OrthopedicsSurgery\":[\"Orthopedics Surgery\"]}', 'MSKPain', '2024-03-08 05:20:31', '2024-03-08 05:20:31'),
(468, 91, 2, 'Supportive', '{\"IMNEUROBION19\":[\"IMNEUROBION19\"]}', 'MSKPain', '2024-03-08 05:20:31', '2024-03-08 05:20:31'),
(469, 91, 2, 'Prescription', '{\"Collagen\":[\"Collagen Suppliment (powder \\/ liquid) - 1 scoop \\/ 1 saschet PO OD x 3 months\"]}', 'MSKPain', '2024-03-08 05:20:31', '2024-03-08 05:20:31'),
(470, 91, 2, 'SpecialInvestigation', '{\"Peripheral\":[\"Normal\"]}', 'MSKPain', '2024-03-08 05:20:31', '2024-03-08 05:20:31'),
(471, 91, 2, 'ElegibilitySTATUS', '{\"TopicalAnalgesics\":[\"Non-Eligibile\"]}', 'MSKPain', '2024-03-08 05:20:31', '2024-03-08 05:20:31'),
(472, 91, 2, 'Intervention', '{\"USNBINJECTION240LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\"]}', 'MSKPain', '2024-03-08 05:20:31', '2024-03-08 05:20:31'),
(473, 91, 2, 'MDT', '{\"IRprocedure\":[\"IR procedure\"]}', 'MSKPain', '2024-03-08 05:20:31', '2024-03-08 05:20:31'),
(474, 91, 2, 'Lab', '{\"ESR\":[\"low\"],\"LABJFA15\":[\"Normal\"],\"USSTBIOPSYMSK452\":[\"Abnormal\"]}', 'MSKPain', '2024-03-08 05:20:31', '2024-03-08 05:20:31'),
(475, 91, 2, 'Imaging', '{\"Softtissue\":[\"Abnormal\"],\"Affectednerve\":[\"Non-Visible\"],\"MRCIR48\":[\"Abnormal\"],\"CTCIR48\":[\"Normal\"]}', 'MSKPain', '2024-03-08 05:20:31', '2024-03-08 05:20:31'),
(476, 91, 2, 'ClinicalIndicator', '{\"Softtissue\":[\"YES\"]}', 'MSKPain', '2024-03-08 05:20:31', '2024-03-08 05:20:31'),
(477, 91, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Abnormal\"]}', 'MSKPain', '2024-03-08 05:20:31', '2024-03-08 05:20:31'),
(569, 98, 2, 'diagnosis_general', '{\"PelvicVarices\":[\"Pelvic Varices\"]}', 'PelvicCongEmbo', '2024-03-08 07:12:00', '2024-03-08 07:12:00'),
(570, 98, 2, 'diagnosis_cid', '{\"a183\":[\"183 Varicose veins of lower extremities\"]}', 'PelvicCongEmbo', '2024-03-08 07:12:00', '2024-03-08 07:12:00'),
(571, 98, 2, 'symptoms', '[{\"SymptomType\":\"Pelvic pain (standing)\",\"SymptomDurationValue\":\"2\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"knkj\"}]', 'PelvicCongEmbo', '2024-03-08 07:12:00', '2024-03-08 07:12:00'),
(572, 98, 2, 'symptoms_score', '{\"Pelvicpain\":[\"3\"]}', 'PelvicCongEmbo', '2024-03-08 07:12:00', '2024-03-08 07:12:00'),
(573, 98, 2, 'Referral', '{\"Others\":[\"Others\"],\"OthersNote\":[\"nm\"]}', 'PelvicCongEmbo', '2024-03-08 07:12:00', '2024-03-08 07:12:00'),
(574, 98, 2, 'Supportive', '{\"IVVITATHYROID175\":[\"IVVITATHYROID175\"]}', 'PelvicCongEmbo', '2024-03-08 07:12:00', '2024-03-08 07:12:00'),
(575, 98, 2, 'SpecialInvestigation', '{\"PAPSmear\":[\"Normal\"]}', 'PelvicCongEmbo', '2024-03-08 07:12:00', '2024-03-08 07:12:00'),
(576, 98, 2, 'ElegibilitySTATUS', '{\"Pelvic\":[\"Pelvic\"],\"PelvicNote\":[\"jhb\"]}', 'PelvicCongEmbo', '2024-03-08 07:12:00', '2024-03-08 07:12:00'),
(577, 98, 2, 'Intervention', '{\"ANGIOVE1780\":[\"ANGIOVE1780\"]}', 'PelvicCongEmbo', '2024-03-08 07:12:00', '2024-03-08 07:12:00'),
(578, 98, 2, 'MDT', '{\"PVVE\":[\"PVVE\"],\"PVVENote\":[\"lknjklnk\"]}', 'PelvicCongEmbo', '2024-03-08 07:12:00', '2024-03-08 07:12:00'),
(579, 98, 2, 'Lab', '{\"URINANALYSISResults\":[\"Negative \\/ no growth\"],\"HistopathResults\":[\"Negative\"]}', 'PelvicCongEmbo', '2024-03-08 07:12:00', '2024-03-08 07:12:00'),
(580, 98, 2, 'Imaging', '{\"USGENERAL70Dilatedpelvicvarices\":[\"YES\"],\"MRCIR48Dilatedpelvicvarices\":[\"YES\"],\"CTCIR48Dilatedpelvicvarices\":[\"YES\"]}', 'PelvicCongEmbo', '2024-03-08 07:12:00', '2024-03-08 07:12:00'),
(581, 98, 2, 'ClinicalIndicator', '{\"Heamarrhoids\":[\"YES\"]}', 'PelvicCongEmbo', '2024-03-08 07:12:00', '2024-03-08 07:12:00'),
(582, 98, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"]}', 'PelvicCongEmbo', '2024-03-08 07:12:00', '2024-03-08 07:12:00'),
(631, 100, 2, 'diagnosis_general', '{\"FRONTALHEADACHE\":[\"FRONTAL HEADACHE\"],\"OCCIPITALHEADACHE\":[\"OCCIPITAL HEADACHE\"],\"TENSIONHEADACHE\":[\"TENSION HEADACHE\"],\"GRAEATOCCIPITALNEURALGIA\":[\"GRAEAT OCCIPITAL NEURALGIA\"],\"Muscletear\":[\"Muscle tear\"],\"LESSEROCCIPITALNEURALGIA\":[\"LESSER OCCIPITAL NEURALGIA\"],\"Delectus_quibusdam_\":[\"Delectus quibusdam\"]}', 'HeadachePain', '2024-03-08 12:47:45', '2024-03-08 12:47:45'),
(632, 100, 2, 'diagnosis_cid', '{\"G431\":[\"G43.1 Migraine with aura (classical migraine)\"],\"G439\":[\"G43.9 Migraine, unspecified Headache migraine (type)\"],\"G44\":[\"G44 Other headache syndromes\"],\"G440\":[\"G44.0 Cluster headache syndrome\"],\"G441\":[\"G44.1 Vascular headache, not elsewhere classified\"],\"G442\":[\"G44.2 Tension-type headache\"],\"G448\":[\"G44.8 Other specified headache syndromes\"],\"M294\":[\"029.4 Spinal and epidural anaesthesia-induced headache during pregnancy\"],\"R51\":[\"R51 Headache\"]}', 'HeadachePain', '2024-03-08 12:47:45', '2024-03-08 12:47:45'),
(633, 100, 2, 'symptoms', '[{\"SymptomType\":\"focal headache\",\"SymptomDurationValue\":\"28\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Possimus quam labor\"},{\"SymptomType\":\"numbness\\/ pain to neck or shoulder or arm\",\"SymptomDurationValue\":\"3\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Labore tempor quisqu\"},{\"SymptomType\":\"associated with nausea or vomiting\",\"SymptomDurationValue\":\"22\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Libero esse quia nul\"},{\"SymptomType\":\"associated with vertigo or drawziness\",\"SymptomDurationValue\":\"29\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Distinctio Iste acc\"},{\"SymptomType\":\"associated with blurring \\/ visual disturbances\",\"SymptomDurationValue\":\"27\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"In ut illum aut eu\"},{\"SymptomType\":\"Sleep disturbance\",\"SymptomDurationValue\":\"27\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Quod amet labore au\"},{\"SymptomType\":\"Lethargy\",\"SymptomDurationValue\":\"2\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Et est illum fugiat\"},{\"SymptomType\":\"Fatigue\",\"SymptomDurationValue\":\"9\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Ut molestias ipsa m\"},{\"SymptomType\":\"Other\",\"SymptomDurationValue\":\"5\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Consequatur dolor l\"}]', 'HeadachePain', '2024-03-08 12:47:45', '2024-03-08 12:47:45'),
(634, 100, 2, 'symptoms_score', '{\"focalheadache\":[\"1\"],\"numbness\":[\"0\"],\"vomiting\":[\"3\"],\"drawziness\":[\"5\"],\"disturbances\":[\"5\"],\"Fatigue\":[\"5\"],\"Other\":[\"1\"]}', 'HeadachePain', '2024-03-08 12:47:45', '2024-03-08 12:47:45'),
(635, 100, 2, 'Referral', '{\"Neurology\":[\"Neurology\"],\"NeurologyNote\":[\"Cumque aute et deser\"],\"ENTSurgery\":[\"ENT Surgery\"],\"ENTSurgeryNote\":[\"Culpa magna nemo eo\"],\"Psychiatry\":[\"Psychiatry\"],\"PsychiatryNote\":[\"Commodo et voluptate\"],\"Others\":[\"Others\"],\"OthersNote\":[\"Beatae aliqua Dolor\"]}', 'HeadachePain', '2024-03-08 12:47:45', '2024-03-08 12:47:45'),
(636, 100, 2, 'Supportive', '{\"IMNEUROBION19\":[\"IMNEUROBION19\"]}', 'HeadachePain', '2024-03-08 12:47:45', '2024-03-08 12:47:45'),
(637, 100, 2, 'Prescription', '{\"Glucasamine\":[\"Glucasamine Chondroitin Tab -1 tab PO BID x 2 months\"],\"Collagen\":[\"Collagen Suppliment (powder \\/ liquid) - 1 scoop \\/ 1 saschet PO OD x 3 months\"],\"Riparil\":[\"Riparil Gel 1 Ampule - Topical TID x 2 weeks\"],\"Sporidex\":[\"Sporidex (Cephalexin) Tab - 500 mg PO BID x 5 days\"]}', 'HeadachePain', '2024-03-08 12:47:45', '2024-03-08 12:47:45'),
(638, 100, 2, 'SpecialInvestigation', '{\"Peripheral\":[\"Normal\"]}', 'HeadachePain', '2024-03-08 12:47:45', '2024-03-08 12:47:45'),
(639, 100, 2, 'ElegibilitySTATUS', '{\"TopicalRiparil\":[\"Eligibile\"],\"TopicalRiparilNote\":[\"Et deserunt fugiat v\"],\"TopicalAnalgesics\":[\"Eligibile\"],\"TopicalAnalgesicsNote\":[\"Qui adipisicing est\"],\"POAnalgesics\":[\"Eligibile\"],\"POAnalgesicsNote\":[\"Duis perspiciatis l\"],\"Chondroitin\":[\"Eligibile\"],\"ChondroitinNote\":[\"Voluptates quia quis\"],\"POCollagen\":[\"Non-Eligibile\"],\"conservativeVitamines\":[\"Non-Eligibile\"],\"conservativeIMNurobion\":[\"Eligibile\"],\"conservativeIMNurobionNote\":[\"Adipisci consequatur\"],\"conservativeIMCollagen\":[\"Eligibile\"],\"conservativeIMCollagenNote\":[\"Voluptate laborum E\"],\"Triggerpointinjection\":[\"Eligibile\"],\"TriggerpointinjectionNote\":[\"In sapiente aut nisi\"],\"PRPinjection\":[\"Non-Eligibile\"],\"NerveBlockinjection\":[\"Non-Eligibile\"],\"NerveRFTherapy\":[\"Eligibile\"],\"NerveRFTherapyNote\":[\"Magni fuga Quia dui\"],\"Others\":[\"Eligibile\"],\"OthersNote\":[\"Dignissimos totam do\"]}', 'HeadachePain', '2024-03-08 12:47:45', '2024-03-08 12:47:45');
INSERT INTO `patient_thyroid_diagnosis` (`id`, `patient_id`, `doctor_id`, `title_name`, `data_value`, `form_type`, `created_at`, `updated_at`) VALUES
(640, 100, 2, 'Intervention', '{\"USNBINJECTION240LABPREIRBASIC32\":[\"LABPREIRBASIC32\",\"LABPREIRBASIC32\"],\"USNBINJECTION240LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\",\"LABPREIRSAFETY17\"],\"USPRPINJECTION280LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\"],\"USRFTHERAPY490LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\"]}', 'HeadachePain', '2024-03-08 12:47:45', '2024-03-08 12:47:45'),
(641, 100, 2, 'MDT', '{\"IRprocedure\":[\"IR procedure\"],\"IRprocedureNote\":[\"Error ut ea non cupi\"],\"Medical\":[\"Medical\"],\"MedicalNote\":[\"Est aute et est plac\"],\"Surgical\":[\"Surgical\"],\"SurgicalNote\":[\"Fugiat quisquam ut d\"],\"options\":[\"options\"],\"optionsNote\":[\"Placeat rerum ullam\"]}', 'HeadachePain', '2024-03-08 12:47:45', '2024-03-08 12:47:45'),
(642, 100, 2, 'Lab', '{\"CBC\":[\"low\"],\"CRP\":[\"normal\"],\"ESR\":[\"normal\"],\"CKMP\":[\"low\"],\"UricAcid\":[\"normal\"],\"RF\":[\"high\"]}', 'HeadachePain', '2024-03-08 12:47:45', '2024-03-08 12:47:45'),
(643, 100, 2, 'Imaging', '{\"Softtissue\":[\"Abnormal\"],\"SofttissueNote\":[\"Dolorum reprehenderi\"],\"Affectednerve\":[\"Non-Visible\"],\"AffectednerveNote\":[\"Consequat Est et i\"],\"MRCIR48\":[\"Normal\"],\"CTCIR48\":[\"Normal\"]}', 'HeadachePain', '2024-03-08 12:47:45', '2024-03-08 12:47:45'),
(644, 100, 2, 'ClinicalIndicator', '{\"Softtissue\":[\"No\"]}', 'HeadachePain', '2024-03-08 12:47:45', '2024-03-08 12:47:45'),
(645, 100, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"],\"SystemicExam\":[\"Normal\"]}', 'HeadachePain', '2024-03-08 12:47:45', '2024-03-08 12:47:45'),
(711, 100, 2, 'diagnosis_general', '{\"UterineFibroid\":[\"Uterine Fibroid\"],\"MultiFibroidUterus\":[\"Multi-Fibroid Uterus\"],\"Adenomyosis\":[\"Adenomyosis\"]}', 'uterine_embo', '2024-03-11 10:11:13', '2024-03-11 10:11:13'),
(732, 100, 2, 'diagnosis_general', '{\"VaricoseVeins\":[\"Varicose Veins\"],\"Thrombophlebitis\":[\"Thrombophlebitis\"],\"Venousinsufficiency\":[\"Venous insufficiency\"],\"Deep\":[\"Deep Vein Thrombosis\"]}', 'VaricoseAblation', '2024-03-12 05:44:02', '2024-03-12 05:44:02'),
(733, 100, 2, 'diagnosis_cid', '{\"a0220\":[\"022.0 Varicose veins of lower extremity in pregnancy\"],\"a183\":[\"183 Varicose veins of lower extremities\"],\"a1830\":[\"183.0 Varicose veins of lower extremities with ulcer\"]}', 'VaricoseAblation', '2024-03-12 05:44:02', '2024-03-12 05:44:02'),
(734, 100, 2, 'symptoms', '[{\"SymptomDurationType\":\"Months\"}]', 'VaricoseAblation', '2024-03-12 05:44:02', '2024-03-12 05:44:02'),
(735, 100, 2, 'diagnosis_general', '{\"GEN1\":[\"t\"],\"GEN2\":[\"tt\"]}', 'general_form', '2024-03-12 07:12:01', '2024-03-12 07:12:01'),
(736, 100, 2, 'diagnosis_general', '{\"GEN1\":[\"Test\"],\"GEN2\":[\"Testing\"]}', 'general_form', '2024-03-12 07:28:24', '2024-03-12 07:28:24'),
(737, 100, 2, 'diagnosis_cid', '{\"ICD1\":[\"Testing ICD\"]}', 'general_form', '2024-03-12 07:28:24', '2024-03-12 07:28:24'),
(738, 100, 2, 'symptoms', '[{\"SymptomType\":\"Fever\",\"SymptomDurationValue\":\"5\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"I have fever\"},{\"SymptomType\":\"Cough\",\"SymptomDurationNote\":\"An occasional cough is normal and healthy. A cough that persists for several weeks or one that brings up discolored or bloody mucus may indicate a condition that needs medical attention. At times, coughing can be very forceful. Prolonged, vigorous coughing can irritate the lungs and cause even more coughing.\"}]', 'general_form', '2024-03-12 07:33:29', '2024-03-12 07:33:29'),
(739, 100, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Abnormal\"],\"RegionalExamNote\":[\"At times, coughing can be very forceful. Prolonged, vigorous coughing can irritate the lungs and cause even more coughing.\"],\"SystemicExam\":[\"Abnormal\"],\"SystemicExamNote\":[\"At times, coughing can be very forceful. Prolonged, vigorous coughing can irritate the lungs and cause even more coughing.\"]}', 'general_form', '2024-03-12 07:45:46', '2024-03-12 07:45:46'),
(740, 100, 2, 'SpecialInvestigation', '{\"title\":\"Testing Lab\",\"subtile\":\"Order special Investigation Test\",\"invistigation\":\"At times, coughing can be very forceful. Prolonged, vigorous coughing can irritate the lungs and cause even more coughing.\"}', 'general_form', '2024-03-12 08:01:20', '2024-03-12 08:01:20'),
(741, 100, 2, 'MDT', '{\"Test Yes\":{\"asd\":\"At times, coughing can be very forceful. Prolonged, vigorous coughing can irritate the lungs and cause even more coughing.\"},\"Test Yes1\":{\"asd\":\"At times, coughing can be very forceful. Prolonged, vigorous coughing can irritate the lungs and cause even more coughing.\"}}', 'general_form', '2024-03-12 08:04:03', '2024-03-12 08:04:03'),
(742, 100, 2, 'ElegibilitySTATUS', '{\"Test Moderate\":{\"asd\":\"At times, coughing can be very forceful. Prolonged, vigorous coughing can irritate the lungs and cause even more coughing.\"},\"Test High\":{\"asd\":\"At times, coughing can be very forceful. Prolonged, vigorous coughing can irritate the lungs and cause even more coughing.\"}}', 'general_form', '2024-03-12 08:05:35', '2024-03-12 08:05:35'),
(743, 100, 2, 'SpecialInvestigation', '{\"title\":\"Test\",\"subtile\":\"Test1\",\"invistigation\":\"jnfhhfd bhfnnhv fbhfnvf\"}', 'general_form', '2024-03-12 09:30:29', '2024-03-12 09:30:29'),
(744, 100, 2, 'SpecialInvestigation', '{\"title\":\"Testtttt\",\"subtile\":\"kjhgfdcv bnm\",\"invistigation\":\"kjhbgvnmb kjhgjh\"}', 'general_form', '2024-03-12 09:31:09', '2024-03-12 09:31:09'),
(745, 100, 2, 'SpecialInvestigation', '{\"title\":\"TTT\",\"subtile\":\"TTTTTTTTTTTTTTTTT\",\"invistigation\":\"TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT TTTTTTTTT\"}', 'general_form', '2024-03-12 09:35:30', '2024-03-12 09:35:30'),
(746, 102, 133, 'diagnosis_general', '{\"GEN1\":[\"hbhfdhbfhj bhbfdhgbn bhfdhfhf fbhbfh\"],\"GEN2\":[\"jihudbj jdjkbdhj\"],\"GEN3\":[\"bhbfvhfbhhfhj\"]}', 'general_form', '2024-03-14 07:11:31', '2024-03-14 07:11:31'),
(747, 102, 133, 'diagnosis_cid', '{\"ICD1\":[\"hyvyhfu gyfyfhu gdbhdubdhdf\"],\"ICD2\":[\"hcbhcbhf bhnbhchc bhbhnbjh\"]}', 'general_form', '2024-03-14 07:11:31', '2024-03-14 07:11:31'),
(748, 102, 133, 'symptoms', '[{\"SymptomType\":\"hhhhhhh\",\"SymptomDurationValue\":\"2\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"bhhhuf ghfbhhf bhbhufbh\"},{\"SymptomType\":\"YYYYYYY\",\"SymptomDurationValue\":\"4\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"bhfdhhuf hvfhufv hbhfh bhhhudf\"}]', 'general_form', '2024-03-14 07:12:58', '2024-03-14 07:12:58'),
(749, 102, 133, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"],\"SystemicExam\":[\"Abnormal\"],\"SystemicExamNote\":[\"bgh gvghy bbhhfd hufbvfd bvhfdhbndf hfdh\"]}', 'general_form', '2024-03-14 07:13:44', '2024-03-14 07:13:44'),
(750, 102, 133, 'SpecialInvestigation', '{\"title\":\"Treatment Theory\",\"subtile\":\"Treatment Theory\",\"invistigation\":\"jjhjhfv bhfvbhhfv fbhhbfjhf bhfbhhfvjhfjn fbhfvhjhvfjf bhfejkkoerjnierklofe jfjnfdefkfb bhfbhfij jhfudioerr hjdriri.\"}', 'general_form', '2024-03-14 07:53:39', '2024-03-14 07:53:39'),
(751, 102, 133, 'SpecialInvestigation', '{\"title\":\"Investigation Of Surgery\",\"subtile\":\"Investigation Of Surgery\",\"invistigation\":\"bhjhb fbnbfhj hbnfjjfv njfvnjhfvjjf jfjdfjdfjfdjkkj njjnjkood jfjjidjidi jfjkdkdk njdfkdfkdfkkf njfvjjdkjkekodkfnnjjfdjdf njfdjfdjkjfdkjfdkjkfdjnfdjkdffdjfdjkfjjfijijfdoki.\"}', 'general_form', '2024-03-14 08:01:05', '2024-03-14 08:01:05'),
(752, 102, 133, 'MDT', '{\"Test Test\":{\"asd\":\"nhjv jnvfjjkfvjk jjjf n*****\"},\"Testing\":{\"asd\":\"bhhjjf njnvjfdfd njvnjvnv ****\"}}', 'general_form', '2024-03-14 08:01:55', '2024-03-14 08:01:55'),
(753, 102, 133, 'ElegibilitySTATUS', '{\"Title Of Eligibility - Test\":{\"asd\":\"bhhhfd hfduhfdn bhjhjif jnhjjjhjj bhnjjnbjhj\"},\"hhhfhfh bfhnfjh\":{\"asd\":\"hhjudfjb fdhunbdfjfdjkifd hdfndfjjfdfd jhfdnjfdjkjdf hjdfnjfdj\"}}', 'general_form', '2024-03-14 08:02:56', '2024-03-14 08:02:56'),
(770, 102, 132, 'diagnosis_general', '{\"GEN1\":[\"ZSDFGBN\"]}', 'general_form', '2024-03-15 07:50:44', '2024-03-15 07:50:44'),
(785, 107, 2, 'SpecialInvestigation', '{\"title\":\"Et qui cumque sunt\",\"subtile\":\"Corrupti voluptatem\",\"invistigation\":\"Aut Nam qui dolores\"}', 'general_form', '2024-03-28 05:33:44', '2024-03-28 05:33:44'),
(786, 107, 2, 'diagnosis_general', '{\"GEN1\":[\"gen1\"]}', 'general_form', '2024-03-28 06:19:48', '2024-03-28 06:19:48'),
(787, 107, 2, 'symptoms', '[{\"SymptomType\":\"Repellendus Expedit\",\"SymptomDurationValue\":\"6\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Voluptas consequatur\"},{\"SymptomType\":\"Eligendi iste dolore\",\"SymptomDurationValue\":\"10\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Fugiat quis id non\"}]', 'general_form', '2024-03-28 06:26:22', '2024-03-28 06:26:22'),
(788, 107, 2, 'diagnosis_general', '{\"Thyroidnodule\":[\"Thyroid nodule\"]}', 'thyroid_form', '2024-03-28 07:32:02', '2024-03-28 07:32:02'),
(789, 109, 2, 'diagnosis_general', '{\"Thyroidnodule\":[\"Thyroid nodule\"]}', 'thyroid_form', '2024-03-30 06:39:37', '2024-03-30 06:39:37'),
(790, 109, 2, 'diagnosis_general', '{\"BPH\":[\"BPH\"]}', 'prostate_form', '2024-03-30 10:38:44', '2024-03-30 10:38:44'),
(791, 109, 2, 'diagnosis_general', '{\"UterineFibroid\":[\"Uterine Fibroid\"]}', 'uterine_embo', '2024-03-30 11:05:20', '2024-03-30 11:05:20'),
(792, 109, 2, 'diagnosis_general', '{\"Varicocele\":[\"Varicocele\"]}', 'VaricoceleEmboForm', '2024-03-30 11:06:59', '2024-03-30 11:06:59'),
(793, 109, 2, 'diagnosis_general', '{\"PelvicVarices\":[\"Pelvic Varices\"]}', 'PelvicCongEmbo', '2024-03-30 11:25:07', '2024-03-30 11:25:07'),
(794, 109, 2, 'diagnosis_general', '{\"VaricoseVeins\":[\"Varicose Veins\"]}', 'VaricoseAblation', '2024-03-30 11:39:06', '2024-03-30 11:39:06'),
(795, 109, 2, 'diagnosis_general', '{\"Haemorrhoids\":[\"Haemorrhoids\"]}', 'HaemorrhoidsEmbo', '2024-03-30 11:51:55', '2024-03-30 11:51:55'),
(796, 109, 2, 'diagnosis_general', '{\"KneeGradeI\":[\"Grade I-II OA Knee\"]}', 'KneePain', '2024-03-30 12:02:32', '2024-03-30 12:02:32'),
(797, 109, 2, 'diagnosis_general', '{\"CervicalRadiculopathy\":[\"Cervical - Radiculopathy\"]}', 'SpinePain', '2024-03-30 12:11:50', '2024-03-30 12:11:50'),
(798, 109, 2, 'diagnosis_general', '{\"TriggerPoint\":[\"Trigger Point\"]}', 'MSKPain', '2024-03-30 12:30:46', '2024-03-30 12:30:46'),
(799, 109, 2, 'diagnosis_general', '{\"GradeI\":[\"Grade I-II OA Shoulder\"]}', 'ShoulderPain', '2024-03-30 12:41:07', '2024-03-30 12:41:07'),
(800, 109, 2, 'diagnosis_general', '{\"FRONTALHEADACHE\":[\"FRONTAL HEADACHE\"]}', 'HeadachePain', '2024-03-30 13:09:31', '2024-03-30 13:09:31'),
(802, 108, 2, 'diagnosis_general', '{\"Thyroidnodule\":[\"Thyroid nodule\"],\"MultiNodularGoitre\":[\"Multi-Nodular Goitre\"]}', 'thyroid_form', '2024-04-02 13:25:14', '2024-04-02 13:25:14'),
(803, 112, 133, 'diagnosis_general', '{\"GEN1\":[\"Blood Test\"]}', 'general_form', '2024-04-03 10:51:44', '2024-04-03 10:51:44'),
(804, 112, 133, 'diagnosis_cid', '{\"ICD1\":[\"Blood Test\"]}', 'general_form', '2024-04-03 10:51:44', '2024-04-03 10:51:44'),
(805, 112, 133, 'symptoms', '[{\"SymptomType\":\"Fever\",\"SymptomDurationValue\":\"5\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"ttrdvgbhnbjhjbbbbh bbbhb vchjv v bhbjjbhccfjh bhbnjnjnbb\"}]', 'general_form', '2024-04-03 10:53:24', '2024-04-03 10:53:24'),
(806, 112, 133, 'symptoms', '[{\"SymptomType\":\"Caugh\",\"SymptomDurationValue\":\"7\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"bhygff hgbdvygdh gdhbuhj hghbdhujd hnjsnjsdhs dshgdbsndhusjdhs dns dsbhdnbsd.\"}]', 'general_form', '2024-04-03 10:54:48', '2024-04-03 10:54:48'),
(807, 112, 133, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"]}', 'general_form', '2024-04-03 10:55:07', '2024-04-03 10:55:07'),
(808, 112, 133, 'SpecialInvestigation', '{\"title\":\"Caugh\",\"subtile\":\"bfgbfcb  bbhh\",\"invistigation\":\"buhh bhfbhudhdh bghbhdhud hghbhdh hghduh hdhhduh hsd bhdhvh bhbhhd bvhdhbhdb bhhhhgvhb.\"}', 'general_form', '2024-04-03 10:57:24', '2024-04-03 10:57:24'),
(809, 112, 133, 'SpecialInvestigation', '{\"title\":\"Testttt\",\"subtile\":\"STTTTTT\",\"invistigation\":\"bhdgc gydvgddgh vvggydhdsuhd\"}', 'general_form', '2024-04-03 10:58:02', '2024-04-03 10:58:02'),
(810, 112, 133, 'MDT', '{\"vgfgvdtvdggsv fgsgvdgsgvggf\":{\"asd\":\"ghgydvg*****\"},\"hggdydgh gdhgijsj\":{\"asd\":\"9***********bhbd\"}}', 'general_form', '2024-04-03 10:58:44', '2024-04-03 10:58:44'),
(811, 112, 133, 'ElegibilitySTATUS', '{\"Title Of Eligibility - Test\":{\"asd\":\"gdgbcdcv  hddbnh ghdbhgdbdhb dhc bdcghd bchd\"},\"Title Of Eligibility - Test 2\":{\"asd\":\"bgcgdyhb bhdbffhbc bhcdb chhdbnchd vhcbdhbndjddb\"}}', 'general_form', '2024-04-03 10:59:22', '2024-04-03 10:59:22'),
(812, 114, 149, 'diagnosis_general', '{\"GEN1\":[\"Ultrasound\"]}', 'general_form', '2024-04-04 13:32:22', '2024-04-04 13:32:22'),
(813, 114, 149, 'diagnosis_cid', '{\"ICD1\":[\"Urine Test\"]}', 'general_form', '2024-04-04 13:32:22', '2024-04-04 13:32:22'),
(814, 115, 2, 'symptoms', '[{\"SymptomType\":\"Voluptate est omnis\",\"SymptomDurationValue\":\"11\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Nulla quia libero ex\"}]', 'general_form', '2024-04-05 09:19:54', '2024-04-05 09:19:54'),
(839, 115, 2, 'diagnosis_general', '{\"MultiNodularGoitre\":[\"Multi-Nodular Goitre\"],\"Euothyroid\":[\"Euothyroid\"],\"GraveDisease\":[\"Grave\\u2019s Disease\"],\"ThyroidCarcinoma\":[\"Thyroid Carcinoma\"],\"Vel_quasi_laborum_L\":[\"Vel quasi laborum L\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(840, 115, 2, 'symptoms', '[{\"SymptomType\":\"Disfiguring Neck mass\",\"SymptomDurationValue\":\"19\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Aliqua Laudantium\"},{\"SymptomType\":\"Dyspnea \\/ SOB\",\"SymptomDurationValue\":\"8\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Dolor similique labo\"},{\"SymptomType\":\"Dysphagia\",\"SymptomDurationValue\":\"21\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Sed inventore conseq\"},{\"SymptomType\":\"Hoarse altered voice\",\"SymptomDurationValue\":\"4\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Doloremque qui quis\"},{\"SymptomType\":\"Head \\/ Neck pain\",\"SymptomDurationValue\":\"24\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Cum in nisi quas lab\"},{\"SymptomType\":\"Sleep disturbance\",\"SymptomDurationValue\":\"10\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"In delectus nulla m\"},{\"SymptomType\":\"Exophthalmos\",\"SymptomDurationValue\":\"16\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Ex dolor adipisicing\"},{\"SymptomType\":\"Palpitations\",\"SymptomDurationValue\":\"12\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Aperiam commodi volu\"},{\"SymptomType\":\"Sweating\",\"SymptomDurationValue\":\"16\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Enim alias consequun\"},{\"SymptomType\":\"Anxiety\",\"SymptomDurationValue\":\"20\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Sed ipsum eveniet\"},{\"SymptomType\":\"Tremor\",\"SymptomDurationValue\":\"17\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Quo rerum voluptatem\"},{\"SymptomType\":\"Hair loss\",\"SymptomDurationValue\":\"8\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Adipisci tenetur lib\"},{\"SymptomType\":\"Lethargy\",\"SymptomDurationValue\":\"2\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Aute enim sint molli\"},{\"SymptomType\":\"Fatigue\",\"SymptomDurationValue\":\"5\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Occaecat qui et do r\"},{\"SymptomType\":\"Cold intolerance\",\"SymptomDurationValue\":\"11\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Possimus sed esse\"},{\"SymptomType\":\"Weight gain\",\"SymptomDurationValue\":\"16\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Est doloremque iste\"},{\"SymptomType\":\"Altered mood\",\"SymptomDurationValue\":\"12\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Aut officia ea imped\"},{\"SymptomType\":\"Other\",\"SymptomDurationValue\":\"23\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Voluptatum est ea an\"}]', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(841, 115, 2, 'symptoms_score', '{\"Disfiguring\":[\"5\"],\"Dyspnea\":[\"0\"],\"Dysphagia\":[\"1\"],\"Hoarsealteredvoice\":[\"0\"],\"Neckpain\":[\"3\"],\"Sleepdisturbance\":[\"0\"],\"Exophthalmos\":[\"0\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(842, 115, 2, 'Referral', '{\"Endocrinology\":[\"Endocrinology\"],\"EndocrinologyNote\":[\"Dignissimos consecte\"],\"NeckSurgery\":[\"ENT \\/ Head and Neck surgery\"],\"NeckSurgeryNote\":[\"Libero repudiandae d\"],\"IodineAblation\":[\"NM Radio-Active iodine Ablation\"],\"IodineAblationNote\":[\"Aut autem blanditiis\"],\"PhysioTherapy\":[\"Head & Neck Rehab\\/PhysioTherapy\"],\"PhysioTherapyNote\":[\"Eligendi dolor fugit\"],\"Others\":[\"Others\"],\"OthersNote\":[\"Quia necessitatibus\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(843, 115, 2, 'Supportive', '{\"IVVITATHYROID175\":[\"IVVITATHYROID175\"],\"LABPREIVBASIC52\":[\"LABPREIVBASIC52\"],\"Sit_obcaecati_quod_n\":[\"Sit obcaecati quod n\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(844, 115, 2, 'SpecialInvestigation', '{\"evaluation\":[\"Abnormal\"],\"evaluationNOTE\":[\"Nisi aliquam cupidit\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(845, 115, 2, 'ElegibilitySTATUS', '{\"TTA\":[\"THYROID THERMAL ABLATION (TTA)\"],\"TTANote\":[\"Esse aliquip sit f\"],\"PTTA\":[\"PARATHYROID THERMAL ABLATION PTTA\"],\"PTTANote\":[\"Irure rem libero vol\"],\"TE\":[\"THYROID EMBOLIZATION TE\"],\"TENote\":[\"Asperiores eveniet\"],\"OTHERS\":[\"OTHERS\"],\"OTHERSNote\":[\"Harum rem fugiat ex\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(846, 115, 2, 'Intervention', '{\"LABPREIRBASIC32\":[\"LABPREIRBASIC32\"],\"ANGIOTE2910\":[\"ANGIOTE2910\"],\"IVSEDATION270\":[\"IVSEDATION270\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(847, 115, 2, 'MDT', '{\"TTA\":[\"TTA\"],\"TTANote\":[\"Ea adipisicing aut o\"],\"TE\":[\"TE\"],\"TENote\":[\"Cupidatat non ea ut\"],\"Surgical\":[\"Surgical\"],\"SurgicalNote\":[\"Ea repellendus Veni\"],\"OtherOptions\":[\"Other options\"],\"OtherOptionsNote\":[\"Eum consequatur at m\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(848, 115, 2, 'Lab', '{\"TSH\":[\"normal\"],\"T4\":[\"normal\"],\"PTH\":[\"high\"],\"Ca\":[\"normal\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(849, 115, 2, 'AntithyroidAntibodiesTests', '{\"HashimotosThyroditisTPOAb\":[\"high\"],\"GravesDiseaseTPOAb\":[\"normal\"],\"GravesDiseaseTBAb\":[\"low\"],\"AtrophicThyroditisTBAb\":[\"high\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(850, 115, 2, 'ClinicalIndicator', '{\"Carbimazole\":[\"YES\"],\"Thyroxine\":[\"NO\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(851, 115, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"],\"SystemicExam\":[\"Abnormal\"],\"SystemicExamNote\":[\"Ullamco ut culpa qu\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(852, 115, 2, 'rightLobeScore', '{\"Composition\":[\"2\"],\"Echogenisity\":[\"2\"],\"Shape\":[\"0\"],\"Margin\":[\"0\"],\"Calcification\":[\"1\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(853, 115, 2, 'leftLobeScore', '{\"Composition\":[\"2\"],\"Echogenisity\":[\"2\"],\"Shape\":[\"0\"],\"Margin\":[\"0\"],\"Calcification\":[\"2\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(854, 115, 2, 'EnlargedLymphnodes', '{\"nodes\":[\"NO\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(855, 115, 2, 'MRCIR48', '{\"MRI\":[\"Abnormal\"],\"NOTE\":[\"Quis ut unde molesti\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(856, 115, 2, 'CTCIR48', '{\"CT\":[\"Normal\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(857, 115, 2, 'NmParaThyroidScan', '{\"RightUpper\":[\"NO\"],\"RightLower\":[\"YES\"],\"LeftUpper\":[\"NO\"],\"LeftLower\":[\"NO\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(858, 115, 2, 'HistopathRightThyroidFNA', '{\"Bathesda\":[\"Bathesda grade II\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(859, 115, 2, 'HistopathLeftThyroidFNA', '{\"Bathesda\":[\"Bathesda grade I\"]}', 'thyroid_form', '2024-04-05 11:32:36', '2024-04-05 11:32:36'),
(886, 115, 2, 'diagnosis_general', '{\"BOO\":[\"BOO\"],\"AcuteUrinaryRetention\":[\"Acute Urinary Retention\"],\"Aliqua_Cillum_illo_\":[\"Aliqua Cillum illo\"]}', 'prostate_form', '2024-04-05 11:48:38', '2024-04-05 11:48:38'),
(887, 115, 2, 'diagnosis_cid', '{\"D400\":[\"D40.0 Neoplasm of uncertain or unknown behaviour: Prostate\"],\"N40\":[\"N40 Hyperplasia of prostate\"],\"N41\":[\"N41 Inflammatory diseases of prostate\"],\"N411\":[\"N41.1 Chronic prostatitis\"],\"N412\":[\"N41.2 Abscess of prostate\"],\"N413\":[\"N41.3 Prostatocystitis\"],\"N422\":[\"N42.2 Atrophy of prostate\"],\"Q554\":[\"Q55.4 Other congenital malformations of vas deferens, epididymis, seminal vesicles and prostate\"],\"Voluptate_amet_occa\":[\"Voluptate amet occa\"]}', 'prostate_form', '2024-04-05 11:48:38', '2024-04-05 11:48:38'),
(888, 115, 2, 'symptoms', '[{\"SymptomType\":\"Urinary Frequency\",\"SymptomDurationValue\":\"25\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Quae exercitationem\"},{\"SymptomType\":\"Urgency\",\"SymptomDurationValue\":\"15\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Sit qui ad dolor es\"},{\"SymptomType\":\"Intermittency\",\"SymptomDurationValue\":\"17\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Omnis ullamco nihil\"},{\"SymptomType\":\"Straining\",\"SymptomDurationValue\":\"10\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Possimus incidunt\"},{\"SymptomType\":\"Weak Stream\",\"SymptomDurationValue\":\"25\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Blanditiis officia o\"},{\"SymptomType\":\"Incomplete emptying\",\"SymptomDurationValue\":\"25\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Laborum harum ipsam\"},{\"SymptomType\":\"Nocturia\",\"SymptomDurationValue\":\"30\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Quam et minus saepe\"},{\"SymptomType\":\"Erectile Dysfunction\",\"SymptomDurationValue\":\"27\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Dolores culpa conse\"},{\"SymptomType\":\"Recurrent Urinary infections\",\"SymptomDurationValue\":\"25\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Voluptate hic exerci\"},{\"SymptomType\":\"Other\",\"SymptomDurationValue\":\"17\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Nihil nobis deserunt\"}]', 'prostate_form', '2024-04-05 11:48:38', '2024-04-05 11:48:38'),
(889, 115, 2, 'symptoms_score', '{\"Frequency\":[\"1\"],\"Intermittency\":[\"3\"],\"Straining\":[\"5\"],\"WeakStream\":[\"1\"],\"Incompleteemptying\":[\"0\"],\"Nocturia\":[\"3\"]}', 'prostate_form', '2024-04-05 11:48:38', '2024-04-05 11:48:38'),
(890, 115, 2, 'Referral', '{\"Endocrinology\":[\"Endocrinology\"],\"EndocrinologyNote\":[\"Rem ut ad ut nihil v\"],\"NeckSurgery\":[\"ENT \\/ Head and Neck surgery\"],\"NeckSurgeryNote\":[\"Reprehenderit ut la\"],\"IodineAblation\":[\"NM Radio-Active iodine Ablation\"],\"IodineAblationNote\":[\"A quia dicta itaque\"],\"PhysioTherapy\":[\"Head & Neck Rehab\\/PhysioTherapy\"],\"PhysioTherapyNote\":[\"In sint aute dolor u\"],\"Others\":[\"Others\"],\"OthersNote\":[\"Voluptas eos nisi vo\"]}', 'prostate_form', '2024-04-05 11:48:38', '2024-04-05 11:48:38'),
(891, 115, 2, 'Supportive', '{\"IVVITATHYROID175\":[\"IVVITATHYROID175\"],\"LABPREIVBASIC52\":[\"LABPREIVBASIC52\"],\"Aliquid_sint_itaque\":[\"Aliquid sint itaque\"]}', 'prostate_form', '2024-04-05 11:48:38', '2024-04-05 11:48:38'),
(892, 115, 2, 'SpecialInvestigation', '{\"REQUROFLONONI5\":[\"Abnormal\"],\"REQUROFLONONI5NOTE\":[\"eeeeee\"],\"REQUROFLOI5\":[\"Abnormal\"],\"REQUROFLOI5NOTE\":[\"ssssssss\"]}', 'prostate_form', '2024-04-05 11:48:38', '2024-04-05 11:48:38'),
(893, 115, 2, 'ElegibilitySTATUS', '{\"PAE\":[\"PAE\"],\"PAENote\":[\"Numquam dolore exped\"],\"Medical\":[\"Medical\"],\"MedicalNote\":[\"Asperiores adipisci\"],\"Surgical\":[\"Surgical\"],\"SurgicalNote\":[\"Qui voluptas elit q\"],\"OTHERS\":[\"OTHERS\"],\"OTHERSNote\":[\"Beatae quaerat in ni\"]}', 'prostate_form', '2024-04-05 11:48:38', '2024-04-05 11:48:38'),
(894, 115, 2, 'MDT', '{\"PAE\":[\"PAE\"],\"PAENote\":[\"Ut consectetur eiusm\"],\"Medical\":[\"Medical\"],\"MedicalNote\":[\"Debitis in et exerci\"],\"Surgical\":[\"Surgical\"],\"SurgicalNote\":[\"Voluptatem reprehend\"],\"OtherOptions\":[\"Other options\"],\"OtherOptionsNote\":[\"Impedit deleniti im\"]}', 'prostate_form', '2024-04-05 11:48:38', '2024-04-05 11:48:38'),
(895, 115, 2, 'Lab', '{\"LABRFT12\":[\"Normal Renal profile\"],\"LABUA29\":[\"Normal Urinanalysis\"],\"QMax\":[\">10ml\\/s (PAE unfaverable)\"],\"PVR\":[\"> 200cc (BOO) (PAE FAVERABLE)\"],\"LABUROFLOINVASIVE752\":[\"Abnormal results\"],\"LABUROFLOINVASIVE752NOTE\":[\"Aliquip illo perspic\"]}', 'prostate_form', '2024-04-05 11:48:38', '2024-04-05 11:48:38'),
(896, 115, 2, 'Imaging', '{\"USGENERAL704\":[\"0.15 ng\\/ml\\/cc\"],\"MRCIR481\":[\"Pi-RADS PZ PI-RADS IV-V (PAE contraindicated)\"],\"MRCIR482\":[\"PI-RADS I-III\"],\"MRCIR483\":[\"Pi-RADS TZ PI-RADS IV-V (PAE contraindicated)\"],\"MRCIR486\":[\"TPV > 40 cc (PAE FAVERABLE)\"],\"MRCIR487\":[\"PSA:TPV Ratio (PSA density)>0.15 ng\\/ml\\/cc (PAE unfaverable)\"],\"BPHtype\":[\"NON-AdBPH\"],\"lobe\":[\"YES\"],\"Abscess\":[\"NO\"],\"CTARIGHT1\":[\"Type I  (28%)\"],\"CTARIGHT3\":[\"Type III (18%)\"],\"CTARIGHT4\":[\"Type IV (31%)\"],\"CTALEFT2\":[\"Type II (14%)\"],\"CTALEFT3\":[\"Type III (18%)\"],\"CTALEFT4\":[\"Type IV (31%)\"],\"ProstateHyperplasia\":[\"NO\"],\"ProstateAdenoCarcinoma\":[\"No\"]}', 'prostate_form', '2024-04-05 11:48:38', '2024-04-05 11:48:38'),
(897, 115, 2, 'ClinicalIndicator', '{\"LUTSMeds\":[\"Combo-therapy\"]}', 'prostate_form', '2024-04-05 11:48:38', '2024-04-05 11:48:38'),
(898, 115, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"],\"SystemicExam\":[\"Abnormal\"],\"SystemicExamNote\":[\"Enim illum et solut\"]}', 'prostate_form', '2024-04-05 11:48:38', '2024-04-05 11:48:38'),
(913, 115, 2, 'diagnosis_general', '{\"UterineVarices\":[\"Uterine Varices\"],\"PerinealVarices\":[\"Perineal Varices\"],\"PelvicPain\":[\"Pelvic Pain\"],\"Do_veritatis_velit_q\":[\"Do veritatis velit q\"]}', 'PelvicCongEmbo', '2024-04-05 12:15:51', '2024-04-05 12:15:51'),
(914, 115, 2, 'diagnosis_cid', '{\"a183\":[\"183 Varicose veins of lower extremities\"],\"a1863\":[\"186.3 Vulval varices\"],\"R102\":[\"R10.2 Pelvic and perineal pain\"],\"Temporibus_nihil_con\":[\"Temporibus nihil con\"]}', 'PelvicCongEmbo', '2024-04-05 12:15:51', '2024-04-05 12:15:51'),
(915, 115, 2, 'symptoms', '[{\"SymptomType\":\"Pelvic pain (standing)\",\"SymptomDurationValue\":\"17\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Qui ut tempora elige\"},{\"SymptomType\":\"Pelvic heaviness\",\"SymptomDurationValue\":\"9\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Itaque elit anim co\"},{\"SymptomType\":\"Pelvic heat\",\"SymptomDurationValue\":\"13\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Id eu sit laboriosa\"},{\"SymptomType\":\"Pain with period\",\"SymptomDurationValue\":\"20\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Sed perspiciatis do\"},{\"SymptomType\":\"Perineal varicosities\",\"SymptomDurationValue\":\"1\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Animi reprehenderit\"},{\"SymptomType\":\"Anal varicosities\",\"SymptomDurationValue\":\"2\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Pariatur Labore ali\"},{\"SymptomType\":\"Vaginal bleed on\\/off\",\"SymptomDurationValue\":\"6\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Numquam aute enim vo\"},{\"SymptomType\":\"Urinary symptoms\",\"SymptomDurationValue\":\"8\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Perspiciatis impedi\"},{\"SymptomType\":\"Recurrent miscarriage\",\"SymptomDurationValue\":\"7\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Itaque delectus des\"},{\"SymptomType\":\"Low back pain\",\"SymptomDurationValue\":\"21\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Obcaecati mollitia v\"},{\"SymptomType\":\"Other\",\"SymptomDurationValue\":\"22\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Nemo rerum ut offici\"}]', 'PelvicCongEmbo', '2024-04-05 12:15:51', '2024-04-05 12:15:51'),
(916, 115, 2, 'symptoms_score', '{\"Pelvicpain\":[\"0\"],\"Pelvicheaviness\":[\"0\"],\"Pelvicheat\":[\"3\"],\"Painwithperiod\":[\"1\"],\"Perinealvaricosities\":[\"3\"],\"Analvaricosities\":[\"1\"],\"Vaginalbleed\":[\"3\"],\"Urinarysymptoms\":[\"0\"],\"Recurrentmiscarriage\":[\"5\"],\"Lowbackpain\":[\"5\"]}', 'PelvicCongEmbo', '2024-04-05 12:15:51', '2024-04-05 12:15:51'),
(917, 115, 2, 'Referral', '{\"Gynae\":[\"Gynae\"],\"GynaeNote\":[\"Omnis modi corporis\"],\"Pevic\":[\"EPevic Floor Rehab\\/PhysioTherapy\"],\"PevicNote\":[\"Consectetur ut volu\"],\"Others\":[\"Others\"],\"OthersNote\":[\"Autem hic quod susci\"]}', 'PelvicCongEmbo', '2024-04-05 12:15:51', '2024-04-05 12:15:51'),
(918, 115, 2, 'Supportive', '{\"Nisi_explicabo_Aliq\":[\"Nisi explicabo Aliq\"]}', 'PelvicCongEmbo', '2024-04-05 12:15:51', '2024-04-05 12:15:51'),
(919, 115, 2, 'SpecialInvestigation', '{\"PAPSmear\":[\"Normal\"]}', 'PelvicCongEmbo', '2024-04-05 12:15:51', '2024-04-05 12:15:51'),
(920, 115, 2, 'ElegibilitySTATUS', '{\"Pelvic\":[\"Pelvic\"],\"PelvicNote\":[\"Ipsa debitis repreh\"],\"OTHERS\":[\"OTHERS\"],\"OTHERSNote\":[\"Eaque beatae volupta\"]}', 'PelvicCongEmbo', '2024-04-05 12:15:51', '2024-04-05 12:15:51'),
(921, 115, 2, 'Intervention', '{\"LABPREANGIO48\":[\"LABPREANGIO48\"],\"LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\"],\"IVSEDATION270\":[\"IVSEDATION270\"]}', 'PelvicCongEmbo', '2024-04-05 12:15:51', '2024-04-05 12:15:51'),
(922, 115, 2, 'MDT', '{\"PVVE\":[\"PVVE\"],\"PVVENote\":[\"Fuga Odio expedita\"],\"Medical\":[\"Medical\"],\"OtherOptions\":[\"Other options\"],\"OtherOptionsNote\":[\"Quia dolore dolores\"]}', 'PelvicCongEmbo', '2024-04-05 12:15:51', '2024-04-05 12:15:51'),
(923, 115, 2, 'Lab', '{\"URINANALYSISResults\":[\"Negative \\/ no growth\"],\"HistopathResults\":[\"Positive  (PCE Unfaverable)\"],\"HistopathResultsNote\":[\"Pariatur Veniam ve\"]}', 'PelvicCongEmbo', '2024-04-05 12:15:51', '2024-04-05 12:15:51'),
(924, 115, 2, 'Imaging', '{\"USGENERAL70Dilatedpelvicvarices\":[\"No\"],\"USGENERAL70VenousReflux\":[\"YES\"],\"USGENERAL70FreeFluid\":[\"YES\"],\"USGENERAL70SuapiciousPelvicmass\":[\"YES\"],\"MRCIR48Dilatedpelvicvarices\":[\"NO\"],\"MRCIR48VenousReflux\":[\"YES\"],\"MRCIR48FreeFluid\":[\"NO\"],\"MRCIR48SuapiciousPelvicmass\":[\"NO\"],\"MRCIR48NetcruckerFeatures\":[\"YES\"],\"CTCIR48Dilatedpelvicvarices\":[\"NO\"],\"CTCIR48VenousReflux\":[\"NO\"],\"CTCIR48FreeFluid\":[\"NO\"],\"CTCIR48SuapiciousPelvicmass\":[\"NO\"],\"CTCIR48NetcruckerFeatures\":[\"YES\"]}', 'PelvicCongEmbo', '2024-04-05 12:15:51', '2024-04-05 12:15:51'),
(925, 115, 2, 'ClinicalIndicator', '{\"Heamarrhoids\":[\"No\"],\"VulvarVarices\":[\"YES\"]}', 'PelvicCongEmbo', '2024-04-05 12:15:51', '2024-04-05 12:15:51'),
(926, 115, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"],\"SystemicExam\":[\"Normal\"]}', 'PelvicCongEmbo', '2024-04-05 12:15:51', '2024-04-05 12:15:51'),
(941, 115, 2, 'diagnosis_general', '{\"UterineFibroid\":[\"Uterine Fibroid\"],\"MultiFibroidUterus\":[\"MultiFibroidUterus\"],\"Adenomyosis\":[\"Adenomyosis\"],\"EndomertialCA\":[\"Endomertial CA\"],\"PelvicPain\":[\"Pelvic Pain\"],\"Praesentium_aut_minu\":[\"Praesentium aut minu\"]}', 'uterine_embo', '2024-04-05 12:25:57', '2024-04-05 12:25:57'),
(942, 115, 2, 'diagnosis_cid', '{\"D250\":[\"D25.0 Submucous leiomyoma of uterus\"],\"D252\":[\"D25.2 Subserosal leiomyoma of uterus\"],\"N710\":[\"N71.0 Acute inflammatory disease of uterus\"],\"N840\":[\"N84.0 Polyp of corpus uteri\"],\"N855\":[\"N85.5 Inversion of uterus\"],\"N856\":[\"N85.6 Intrauterine synechiae\"],\"N858\":[\"N85.8 Other specified noninflammatory disorders of uterus\"],\"N859\":[\"N85.9 Noninflammatory disorder of uterus, unspecified\"],\"N87\":[\"N87 Dysplasia of cervix uteri\"],\"Q513\":[\"Q51.3 Bicornate uterus\"],\"Q518\":[\"Q51.8 Other congenital malformations of uterus and cervix\"],\"Nostrum_earum_delect\":[\"Nostrum earum delect\"]}', 'uterine_embo', '2024-04-05 12:25:57', '2024-04-05 12:25:57'),
(943, 115, 2, 'symptoms', '[{\"SymptomType\":\"Heavy Period\",\"SymptomDurationValue\":\"15\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Consequuntur volupta\"},{\"SymptomType\":\"Dysmenorrhea\",\"SymptomDurationValue\":\"21\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Ullamco dolores temp\"},{\"SymptomType\":\"Compressive symptoms - Urinary (frequency \\/ urgency \\/ drippling)\",\"SymptomDurationValue\":\"24\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Blanditiis corrupti\"},{\"SymptomType\":\"Compressive symptoms - Constipation\",\"SymptomDurationValue\":\"28\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Atque minima ducimus\"},{\"SymptomType\":\"Compressive symptoms - Low back pain\",\"SymptomDurationValue\":\"28\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Velit et eos distin\"},{\"SymptomType\":\"Symptomatic anemia\",\"SymptomDurationValue\":\"27\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"In aliqua Aut labor\"},{\"SymptomType\":\"Abdominal mass\",\"SymptomDurationValue\":\"21\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Ea aliquid sit autem\"},{\"SymptomType\":\"Recurrent Urinary infections\",\"SymptomDurationValue\":\"10\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Nobis voluptatem Id\"},{\"SymptomType\":\"Other\",\"SymptomDurationValue\":\"6\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Amet exercitationem\"}]', 'uterine_embo', '2024-04-05 12:25:57', '2024-04-05 12:25:57'),
(944, 115, 2, 'symptoms_score', '{\"HeavyPeriod\":[\"1\"],\"Dysmenorrhea\":[\"5\"],\"CompressivesymptomsUrinary\":[\"5\"],\"CompressivesymptomsConstipation\":[\"0\"],\"CompressivesymptomsLowbackpain\":[\"5\"],\"Symptomaticanemia\":[\"1\"],\"Abdominalmass\":[\"0\"]}', 'uterine_embo', '2024-04-05 12:25:57', '2024-04-05 12:25:57'),
(945, 115, 2, 'Referral', '{\"Gynae\":[\"Gynae\"],\"GynaeNote\":[\"Corrupti vero fugit\"],\"Pevic\":[\"EPevic Floor Rehab\\/PhysioTherapy\"],\"PevicNote\":[\"Et obcaecati volupta\"],\"Others\":[\"Others\"],\"OthersNote\":[\"Quisquam ea recusand\"]}', 'uterine_embo', '2024-04-05 12:25:57', '2024-04-05 12:25:57'),
(946, 115, 2, 'Supportive', '{\"IVVITATHYROID175\":[\"IVVITATHYROID175\"],\"LABPREIVADVANCED230\":[\"LABPREIVADVANCED230\"]}', 'uterine_embo', '2024-04-05 12:25:57', '2024-04-05 12:25:57'),
(947, 115, 2, 'SpecialInvestigation', '{\"PAPSmear\":[\"Abnormal\"],\"PAPSmearNote\":[\"Doloremque sunt sed\"]}', 'uterine_embo', '2024-04-05 12:25:57', '2024-04-05 12:25:57'),
(948, 115, 2, 'ElegibilitySTATUS', '{\"UFE\":[\"UFE\"],\"UFENote\":[\"Molestiae non vel si\"],\"Medical\":[\"Medical\"],\"MedicalNote\":[\"Quis ipsum cumque mo\"],\"Surgical\":[\"Surgical\"],\"SurgicalNote\":[\"Nulla saepe autem sa\"],\"OTHERS\":[\"OTHERS\"],\"OTHERSNote\":[\"Inventore sint ducim\"]}', 'uterine_embo', '2024-04-05 12:25:57', '2024-04-05 12:25:57'),
(949, 115, 2, 'Intervention', '{\"ANGIOPAE2910\":[\"ANGIOPAE2910\"],\"LABPREANGIO48\":[\"LABPREANGIO48\"]}', 'uterine_embo', '2024-04-05 12:25:57', '2024-04-05 12:25:57'),
(950, 115, 2, 'MDT', '{\"UFE\":[\"UFE\"],\"UFENote\":[\"Occaecat quis ea vel\"],\"Medical\":[\"Medical\"],\"MedicalNote\":[\"Est unde ipsa quas\"],\"Surgical\":[\"Surgical\"],\"SurgicalNote\":[\"In voluptas proident\"],\"OtherOptions\":[\"Other options\"],\"OtherOptionsNote\":[\"Commodo molestiae pl\"]}', 'uterine_embo', '2024-04-05 12:25:57', '2024-04-05 12:25:57'),
(951, 115, 2, 'Lab', '{\"FSH\":[\"Abnormal\"],\"LH\":[\"Abnormal\"],\"AMH\":[\"Normal\"],\"RenalFunctiontest\":[\"Abnormal Renal profile (PAE contraindicated)\"],\"RenalFunctiontestNote\":[\"Consequatur omnis c\"],\"UrinalysisResults\":[\"Normal Urinanalysis\"],\"PAPSMEARResults\":[\"Malignant PAP\"],\"PAPSMEARResultsNote\":[\"Omnis eum magni ut v\"]}', 'uterine_embo', '2024-04-05 12:25:57', '2024-04-05 12:25:57'),
(952, 115, 2, 'Imaging', '{\"USGENERAL70Fibroids\":[\"Single\"],\"USGENERAL70Endometrium\":[\"Normal\"],\"USGENERAL70Ovaries\":[\"Abnormal\"],\"USGENERAL70PID\":[\"YES\"],\"MRCIR48Fibroids\":[\"Multiple\"],\"MRCIR48Ovaries\":[\"NO\"],\"MRCIR48OAdnexalMass\":[\"YES\"],\"MRCIR48OFreeFluid\":[\"NO\"],\"MRCIR48OPID\":[\"NO\"]}', 'uterine_embo', '2024-04-05 12:25:57', '2024-04-05 12:25:57'),
(953, 115, 2, 'ClinicalIndicator', '{\"Vaginal\":[\"YES\"],\"Uterine\":[\"No\"],\"Painfulintercorse\":[\"Yes\"],\"Recurrentabortion\":[\"No\"],\"injections\":[\"Yes\"]}', 'uterine_embo', '2024-04-05 12:25:57', '2024-04-05 12:25:57'),
(954, 115, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Abnormal\"],\"RegionalExamNote\":[\"Dolore quam omnis du\"],\"SystemicExam\":[\"Abnormal\"],\"SystemicExamNote\":[\"Dolore voluptas et i\"]}', 'uterine_embo', '2024-04-05 12:25:57', '2024-04-05 12:25:57'),
(968, 115, 2, 'diagnosis_general', '{\"Venousinsufficiency\":[\"Venous insufficiency\"],\"Reticular\":[\"Reticular\\/ spider veins\"],\"Pedaledema\":[\"Pedal edema\"],\"Venousuicer\":[\"Venous uicer\"],\"Deep\":[\"Deep Vein Thrombosis\"]}', 'VaricoseAblation', '2024-04-05 12:44:03', '2024-04-05 12:44:03'),
(969, 115, 2, 'diagnosis_cid', '{\"a0220\":[\"022.0 Varicose veins of lower extremity in pregnancy\"],\"a183\":[\"183 Varicose veins of lower extremities\"],\"a1830\":[\"183.0 Varicose veins of lower extremities with ulcer\"],\"a1831\":[\"183.1 Varicose veins of lower extremities with inflammation\"],\"a1839\":[\"183.9 Varicose veins of lower extremities without ulcer or inflammation\"],\"a186\":[\"186 Varicose veins of other sites\"],\"a1862\":[\"186.2 Pelvic varices\"],\"a1863\":[\"186.3 Vulval varices\"],\"a1872\":[\"187.2 Venous insufficiency (Chronic) (Peripheral)\"],\"a18721\":[\"R10.2 Pelvic and perineal pain\"]}', 'VaricoseAblation', '2024-04-05 12:44:03', '2024-04-05 12:44:03'),
(970, 115, 2, 'symptoms', '[{\"SymptomType\":\"Dilated leg veins\",\"SymptomDurationValue\":\"19\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Praesentium aut est\"},{\"SymptomType\":\"Leg edema \\/ swelling\",\"SymptomDurationValue\":\"21\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Doloribus deserunt u\"},{\"SymptomType\":\"Warm legs \\/ feet\",\"SymptomDurationValue\":\"7\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Cupiditate laudantiu\"},{\"SymptomType\":\"Leg heaviness\",\"SymptomDurationValue\":\"14\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Recusandae Temporib\"},{\"SymptomType\":\"Perineal varicosities\",\"SymptomDurationValue\":\"7\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Incididunt autem acc\"},{\"SymptomType\":\"Leg Pain \\/ burning\",\"SymptomDurationValue\":\"4\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Ullamco aut libero c\"},{\"SymptomType\":\"Leg pins & needles\",\"SymptomDurationValue\":\"22\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Doloremque ut accusa\"},{\"SymptomType\":\"Leg itching\",\"SymptomDurationValue\":\"2\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Dolore corporis saep\"},{\"SymptomType\":\"Night cramps\",\"SymptomDurationValue\":\"12\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Aut sequi sit fuga\"},{\"SymptomType\":\"Skin pigmentation\",\"SymptomDurationValue\":\"16\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Rerum optio beatae\"},{\"SymptomType\":\"General malise\",\"SymptomDurationValue\":\"17\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Ut ratione voluptate\"},{\"SymptomType\":\"Leg Ulcers\",\"SymptomDurationValue\":\"5\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Ea similique rerum e\"},{\"SymptomType\":\"Other\",\"SymptomDurationValue\":\"17\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Vel aut nesciunt te\"}]', 'VaricoseAblation', '2024-04-05 12:44:03', '2024-04-05 12:44:03'),
(971, 115, 2, 'symptoms_score', '{\"Dilatedlegveins\":[\"3\"],\"swelling\":[\"3\"],\"Warmlegs\":[\"1\"],\"Legheaviness\":[\"1\"],\"burning\":[\"1\"],\"needles\":[\"3\"],\"Legitching\":[\"3\"],\"Nightcramps\":[\"5\"],\"Skinpigmentation\":[\"3\"],\"Generalmalise\":[\"5\"],\"LegUlcers\":[\"1\"]}', 'VaricoseAblation', '2024-04-05 12:44:03', '2024-04-05 12:44:03'),
(972, 115, 2, 'Referral', '{\"Lipidemacareprogram\":[\"Lipidema care program\"],\"LipidemacareprogramNote\":[\"Ad impedit sint qua\"],\"PhysioTherapy\":[\"Post EVLT - Rehab\\/PhysioTherapy\"],\"PhysioTherapyNote\":[\"Tempor voluptate qui\"],\"Others\":[\"Others\"],\"OthersNote\":[\"Exercitationem odio\"]}', 'VaricoseAblation', '2024-04-05 12:44:03', '2024-04-05 12:44:03'),
(973, 115, 2, 'Supportive', '{\"IVVITATHYROID175\":[\"IVVITATHYROID175\"],\"LABPREIVBASIC52\":[\"LABPREIVBASIC52\"],\"LABPREIVADVANCED230\":[\"LABPREIVADVANCED230\"]}', 'VaricoseAblation', '2024-04-05 12:44:03', '2024-04-05 12:44:03'),
(974, 115, 2, 'SpecialInvestigation', '{\"Peripheral\":[\"Abnormal\"],\"PeripheralNote\":[\"Lorem Ipsum is simply dummy text of the printing and typesetting industry.\"]}', 'VaricoseAblation', '2024-04-05 12:44:03', '2024-04-05 12:44:03'),
(975, 115, 2, 'ElegibilitySTATUS', '{\"VVThermalAblation\":[\"VV Thermal Ablation\"],\"VVThermalAblationNote\":[\"Architecto tempore\"],\"VVNTNTAblation\":[\"VV NTNT Ablation\"],\"VVNTNTAblationNote\":[\"Est tempor odit aut\"],\"FoamSclerotherapy\":[\"Foam Sclerotherapy\"],\"FoamSclerotherapyNote\":[\"Sed consequat Repre\"],\"Others\":[\"Others\"],\"OthersNote\":[\"Exercitationem qui i\"]}', 'VaricoseAblation', '2024-04-05 12:44:03', '2024-04-05 12:44:03'),
(976, 115, 2, 'Intervention', '{\"USVVTABL1870\":[\"USVVTABL1870\"],\"LABPREIRBASIC32\":[\"LABPREIRBASIC32\",\"LABPREIRBASIC32\"],\"LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\",\"LABPREIRSAFETY17\"],\"PRESSURESTOCKINGS34\":[\"PRESSURESTOCKINGS34\",\"PRESSURESTOCKINGS34\",\"PRESSURESTOCKINGS34\"],\"PRESSURESTOCKINGSFITDEVICE9\":[\"PRESSURESTOCKINGSFITDEVICE9\",\"PRESSURESTOCKINGSFITDEVICE9\",\"PRESSURESTOCKINGSFITDEVICE9\"],\"USVVNTNTAUL1490\":[\"USVVNTNTAUL1490\"]}', 'VaricoseAblation', '2024-04-05 12:44:03', '2024-04-05 12:44:03'),
(977, 115, 2, 'MDT', '{\"VVA\":[\"Thermal VVA\"],\"VVANote\":[\"Corporis veniam pra\"],\"Ablation\":[\"NTNT VVA Ablation\"],\"AblationNote\":[\"Labore ab consequatu\"],\"Surgical\":[\"Surgical\"],\"SurgicalNote\":[\"Non eu explicabo Vo\"],\"options\":[\"options\"],\"optionsNote\":[\"Temporibus perspicia\"]}', 'VaricoseAblation', '2024-04-05 12:44:03', '2024-04-05 12:44:03'),
(978, 115, 2, 'Lab', '{\"ESR\":[\"normal\"],\"CRP\":[\"high\"]}', 'VaricoseAblation', '2024-04-05 12:44:03', '2024-04-05 12:44:03'),
(979, 115, 2, 'Imaging', '{\"USVENOUSDOPPLER70DilatedGSVLEFT\":[\"YES\"],\"USVENOUSDOPPLER70RefluxGSVLEFT\":[\"YES\"],\"USVENOUSDOPPLER70Reflux2GSVLEFT\":[\"No\"],\"USVENOUSDOPPLER70Reflux3GSVLEFT\":[\"NO\"],\"USVENOUSDOPPLER70OcclusiveGSVLEFT\":[\"YES\"],\"USVENOUSDOPPLER70DilatedSSVLEFT\":[\"YES\"],\"USVENOUSDOPPLER70RefluxSSVLEFT\":[\"YES\"],\"USVENOUSDOPPLER70Reflux2SSVLEFT\":[\"No\"],\"USVENOUSDOPPLER70Reflux3SSVLEFT\":[\"YES\"],\"USVENOUSDOPPLER70OcclusiveSSVLEFTSSVLEFT\":[\"NO\"],\"USVENOUSDOPPLER70DilatedGSVRIGHT\":[\"No\"],\"USVENOUSDOPPLER70RefluxGSVRIGHT\":[\"YES\"],\"USVENOUSDOPPLER70Reflux2GSVRIGHT\":[\"YES\"],\"USVENOUSDOPPLER70Reflux3GSVRIGHT\":[\"YES\"],\"USVENOUSDOPPLER70OcclusiveGSVRIGH\":[\"NO\"],\"USVENOUSDOPPLER70DilatedSSVRIGHT\":[\"YES\"],\"USVENOUSDOPPLER70RefluxSSVRIGHT\":[\"No\"],\"USVENOUSDOPPLER70Reflux2SSVRIGHT\":[\"No\"],\"USVENOUSDOPPLER70Reflux3SSVRIGHT\":[\"YES\"],\"USVENOUSDOPPLER70OcclusiveSSVRIGHT\":[\"YES\"],\"MRCIR48\":[\"Abnormal\"],\"MRCIR48Note\":[\"Ut est dolores cons\"],\"CTCIR48\":[\"Normal\"]}', 'VaricoseAblation', '2024-04-05 12:44:03', '2024-04-05 12:44:03'),
(980, 115, 2, 'ClinicalIndicator', '{\"lowerextremityPhlepitis\":[\"No\"],\"lowerextremityDVT\":[\"YES\"],\"lowerextremityDVTCHRONIC\":[\"YES\"]}', 'VaricoseAblation', '2024-04-05 12:44:03', '2024-04-05 12:44:03'),
(981, 115, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"],\"SystemicExam\":[\"Abnormal\"],\"SystemicExamNote\":[\"Porro et natus et ea\"]}', 'VaricoseAblation', '2024-04-05 12:44:03', '2024-04-05 12:44:03'),
(997, 115, 2, 'diagnosis_general', '{\"KneeGradeI\":[\"Grade I-II OA Knee\"],\"KneeGrade2\":[\"Grade III-V OA knee\"],\"HyalineCartilageDisease\":[\"Hyaline Cartilage Disease\"],\"Degeneration\":[\"Menisceal injury \\/ Degeneration\"],\"ligamentous\":[\"ligamentous injury \\/ Degeneration\"],\"JointEffusion\":[\"Joint Effusion\"],\"kneeDeformity\":[\"knee Deformity\"],\"Ducimus_cum_sint_ev\":[\"Ducimus cum sint ev\"]}', 'KneePain', '2024-04-05 13:01:38', '2024-04-05 13:01:38'),
(998, 115, 2, 'diagnosis_cid', '{\"D480\":[\"D48.0 Neoplasm of uncertain or unknown behaviour: Bone and articular cartilage Neoplasm, neoplastic|meniscus, knee joint (lateral) (medial) <>\\/Uncertain or unknown behaviour\"],\"M230\":[\"M23.0 Cystic meniscus\"],\"M232\":[\"M23.2 Derangement of meniscus due to old tear or injury\"],\"M233\":[\"M23.3 Other meniscus derangements\"],\"M238\":[\"M23.8 Other internal derangements of knee\"],\"M239\":[\"M23.9 Internal derangement of knee, unspecified\"],\"M244\":[\"M24.4 Recurrent dislocation and subluxation of joint Derangement|cartilage (articular) NEC|knee, meniscus|recurrent\"],\"S810\":[\"S81.0 Open wound of knee\"],\"S820\":[\"S82.0 Fracture of patella\"],\"S830\":[\"S83.0 Dislocation of patella\"],\"S831\":[\"S83.1 Dislocation of knee\"],\"S832\":[\"S83.2 Tear of meniscus, current\",\"S83.2 Tear of meniscus, current\"],\"S833\":[\"S83.3 Tear of articular cartilage of knee, current\"],\"S837\":[\"S83.7 Injury to multiple structures of knee\",\"S83.7 Injury to multiple structures of knee Injury to (lateral)(medial) meniscus in combination with (collateral) (cruciate) ligaments\"],\"S8361\":[\"S83.6 Sprain and strain of other and unspecified parts of knee\"],\"Q682\":[\"Q68.2 Congenital deformity of knee\"],\"M705\":[\"M70.5 Other bursitis of knee\"],\"M17\":[\"M17 Gonarthrosis [arthrosis of knee]\"],\"M794\":[\"M79.4 Hypertrophy of (infrapatellar) fat pad\"],\"L031\":[\"L03.1 Cellulitis of other parts of limb\"],\"M243\":[\"M24.3 Pathological dislocation and subluxation of joint, not elsewhere classified\"],\"M219\":[\"M21.9 Acquired deformity of limb, unspecified, Deformity knee (acquired) NEC\"],\"M062\":[\"M06.2 Rheumatoid bursitis\"],\"S836\":[\"S83.6 Sprain and strain of other and unspecified parts of knee Injury|knee meniscus (lateral) (medial)\"],\"Z895\":[\"Z89.5 Acquired absence of leg at or below knee\"],\"Quas_hic_molestias_e\":[\"Quas hic molestias e\"]}', 'KneePain', '2024-04-05 13:01:38', '2024-04-05 13:01:38'),
(999, 115, 2, 'symptoms', '[{\"SymptomType\":\"Medial knee pain\",\"SymptomDurationValue\":\"23\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Nam corporis porro o\"},{\"SymptomType\":\"Anterior Knee Pain\",\"SymptomDurationValue\":\"16\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Asperiores exercitat\"},{\"SymptomType\":\"Audiable knee sound\",\"SymptomDurationValue\":\"23\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Accusamus mollitia v\"},{\"SymptomType\":\"Knee swellimg\",\"SymptomDurationValue\":\"13\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Recusandae Repellen\"},{\"SymptomType\":\"Restricted knee flextion\",\"SymptomDurationValue\":\"18\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"In sequi autem molli\"},{\"SymptomType\":\"Restricted Walking \\/ running\",\"SymptomDurationValue\":\"7\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Aut in aliquid delen\"},{\"SymptomType\":\"Restricted knee extensiom\",\"SymptomDurationValue\":\"18\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Officia mollit neque\"},{\"SymptomType\":\"Unstable knee \\/ locking knee\",\"SymptomDurationValue\":\"19\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Earum possimus anim\"},{\"SymptomType\":\"Deformed Valgus \\/Varus or Valgus knee\",\"SymptomDurationValue\":\"29\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Beatae nobis quo qui\"},{\"SymptomType\":\"Warm knee\",\"SymptomDurationValue\":\"14\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Id est voluptate ips\"},{\"SymptomType\":\"Lethargy\",\"SymptomDurationValue\":\"29\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Et ut dolores invent\"},{\"SymptomType\":\"Fatigue\",\"SymptomDurationValue\":\"23\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Eligendi et non aut\"},{\"SymptomType\":\"Other\",\"SymptomDurationValue\":\"22\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Et eum sint qui elig\"}]', 'KneePain', '2024-04-05 13:01:38', '2024-04-05 13:01:38'),
(1000, 115, 2, 'symptoms_score', '{\"Medialkneepain\":[\"5\"],\"AnteriorKneePain\":[\"3\"],\"Audiablekneesound\":[\"1\"],\"Kneeswellimg\":[\"1\"],\"Restrictedkneeflextion\":[\"0\"],\"Restrictedkneeextensiom\":[\"1\"],\"RestrictedWalking\":[\"5\"],\"Unstableknee\":[\"3\"],\"DeformedValgus\":[\"3\"],\"Warmknee\":[\"1\"]}', 'KneePain', '2024-04-05 13:01:38', '2024-04-05 13:01:38');
INSERT INTO `patient_thyroid_diagnosis` (`id`, `patient_id`, `doctor_id`, `title_name`, `data_value`, `form_type`, `created_at`, `updated_at`) VALUES
(1001, 115, 2, 'Referral', '{\"Rheumatology\":[\"Rheumatology\"],\"RheumatologyNote\":[\"Placeat sed quos ex\"],\"OrthopedicsSurgery\":[\"Orthopedics Surgery\"],\"OrthopedicsSurgeryNote\":[\"Et velit ea omnis q\"],\"Orthotics\":[\"Orthotics\"],\"OrthoticsNote\":[\"Labore temporibus di\"],\"Others\":[\"Others\"],\"OthersNote\":[\"Ullamco do cumque qu\"]}', 'KneePain', '2024-04-05 13:01:38', '2024-04-05 13:01:38'),
(1002, 115, 2, 'Supportive', '{\"IMNEUROBION19\":[\"IMNEUROBION19\"],\"Itaque_sunt_et_sint_\":[\"Itaque sunt et sint\"]}', 'KneePain', '2024-04-05 13:01:38', '2024-04-05 13:01:38'),
(1003, 115, 2, 'Prescription', '{\"Glucasamine\":[\"Glucasamine Chondroitin Tab -1 tab PO BID x 2 months\"],\"Collagen\":[\"Collagen Suppliment (powder \\/ liquid) - 1 scoop \\/ 1 saschet PO OD x 3 months\"],\"Diclofenac\":[\"Diclofenac Gel 1 Ampule -Topical TID x 2 weeks\"],\"Lidocaine\":[\"Lidocaine Patch - 1 Patch Topical OD X 2 weeks\"],\"Sporidex\":[\"Sporidex (Cephalexin) Tab - 500 mg PO BID x 5 days\"]}', 'KneePain', '2024-04-05 13:01:38', '2024-04-05 13:01:38'),
(1004, 115, 2, 'SpecialInvestigation', '{\"Peripheral\":[\"Abnormal\"],\"PeripheralNote\":[\"Consequatur quae el\"]}', 'KneePain', '2024-04-05 13:01:38', '2024-04-05 13:01:38'),
(1005, 115, 2, 'ElegibilitySTATUS', '{\"HistopathMSKBiopsy\":[\"Non-Eligibile\"],\"TopicalAnalgesics\":[\"Eligibile\"],\"TopicalAnalgesicsNote\":[\"Facilis blanditiis v\"],\"POAnalgesics\":[\"Non-Eligibile\"],\"Chondroitin\":[\"Non-Eligibile\"],\"POCollagen\":[\"Eligibile\"],\"POCollagenNote\":[\"Ipsam quia facilis l\"],\"conservativeVitamines\":[\"Non-Eligibile\"],\"conservativeIMNurobion\":[\"Eligibile\"],\"conservativeIMNurobionNote\":[\"Do est aut corporis\"],\"conservativeIMCollagen\":[\"Eligibile\"],\"conservativeIMCollagenNote\":[\"Proident eligendi s\"],\"conservativekneeBrace\":[\"Eligibile\"],\"conservativekneeBraceNote\":[\"Nobis blanditiis qua\"],\"Steroidsinjection\":[\"Non-Eligibile\"],\"HAinjection\":[\"Eligibile\"],\"HAinjectionNote\":[\"Nesciunt eiusmod se\"],\"PRPinjection\":[\"Non-Eligibile\"],\"OzoneIAinjection\":[\"Eligibile\"],\"OzoneIAinjectionNote\":[\"Aut est deserunt nis\"],\"NeurolysisBlock\":[\"Eligibile\"],\"NeurolysisBlockNote\":[\"Aut rem ut amet qui\"],\"NerveRFAblation\":[\"Eligibile\"],\"NerveRFAblationNote\":[\"Eu a eu aute similiq\"],\"NerveCooledRF\":[\"Eligibile\"],\"NerveCooledRFNote\":[\"Voluptates quia ex l\"],\"NerveCryotherapy\":[\"Eligibile\"],\"NerveCryotherapyNote\":[\"Magna et velit labo\"],\"Others\":[\"Eligibile\"],\"OthersNote\":[\"Iure ut est lorem ut\"]}', 'KneePain', '2024-04-05 13:01:38', '2024-04-05 13:01:38'),
(1006, 115, 2, 'Intervention', '{\"USPRPINJECTION280LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\"],\"USHAINJECTION310LABPREIRBASIC32\":[\"LABPREIRBASIC32\"],\"USIAOOZINJECTION340LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\"],\"USNEUROLYSISBLOCK430LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\"],\"USRFABLATION490LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\"],\"USCOOLEDRF560LABPREIRBASIC32\":[\"LABPREIRBASIC32\"],\"USCOOLEDRF560LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\"],\"ANGIOGAE2310LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\"]}', 'KneePain', '2024-04-05 13:01:38', '2024-04-05 13:01:38'),
(1007, 115, 2, 'MDT', '{\"IRprocedure\":[\"IR procedure\"],\"IRprocedureNote\":[\"Nulla consequat Inc\"],\"Medical\":[\"Medical\"],\"MedicalNote\":[\"Quia facilis asperio\"],\"Surgical\":[\"Surgical\"],\"SurgicalNote\":[\"Eu accusantium solut\"],\"options\":[\"options\"],\"optionsNote\":[\"Cum voluptatem lorem\"]}', 'KneePain', '2024-04-05 13:01:38', '2024-04-05 13:01:38'),
(1008, 115, 2, 'Lab', '{\"CBC\":[\"low\"],\"CRP\":[\"high\"],\"ESR\":[\"normal\"],\"CKMP\":[\"normal\"],\"UricAcid\":[\"low\"],\"RF\":[\"low\"],\"WBC\":[\"normal\"],\"Proteins\":[\"normal\"],\"Glucose\":[\"high\"],\"Crystals\":[\"high\"],\"Lactate\":[\"high\"],\"USSTBIOPSYMSK452\":[\"Normal\"]}', 'KneePain', '2024-04-05 13:01:38', '2024-04-05 13:01:38'),
(1009, 115, 2, 'Imaging', '{\"Softtissue\":[\"Normal\"],\"SuperiorMedialGN\":[\"Non-Visible\"],\"InferiorMedialGN\":[\"Visible\"],\"SuperiorLateralGN\":[\"Non-Visible\"],\"Kneeeffusion\":[\"Visible\"],\"Osteoarthreticfeatures\":[\"Visible\"],\"MRCIR48\":[\"Abnormal\"],\"MRCIR48Note\":[\"Error qui in volupta\"],\"CTCIR48\":[\"Abnormal\"],\"CTCIR48Note\":[\"Dolore et nihil sunt\"]}', 'KneePain', '2024-04-05 13:01:38', '2024-04-05 13:01:38'),
(1010, 115, 2, 'ClinicalIndicator', '{\"SepticKnee\":[\"YES\"],\"KneeProsthesis\":[\"YES\"]}', 'KneePain', '2024-04-05 13:01:38', '2024-04-05 13:01:38'),
(1011, 115, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Abnormal\"],\"RegionalExamNote\":[\"Nihil dolor obcaecat\"],\"SystemicExam\":[\"Normal\"]}', 'KneePain', '2024-04-05 13:01:38', '2024-04-05 13:01:38'),
(1026, 115, 2, 'diagnosis_general', '{\"Analpain\":[\"Anal pain\"],\"LowerGIBleed\":[\"Lower GI Bleed\"],\"Perinealvaricosities\":[\"Perineal varicosities\"],\"Chronicconstipation\":[\"Chronic constipation\"],\"Analfissure\":[\"Anal fissure\"],\"Proctitis\":[\"Proctitis\"]}', 'HaemorrhoidsEmbo', '2024-04-05 13:09:14', '2024-04-05 13:09:14'),
(1027, 115, 2, 'diagnosis_cid', '{\"D129\":[\"D12.9 Benign neoplasm: Anus and anal canal\"],\"K642\":[\"K64.2 Third degree haemorrhoids\"],\"K644\":[\"K64.4 Residual haemorrhoidal skin tags\"],\"a087\":[\"087 Venous complications and hemorrhoids in the puerperium\"],\"Similique_quisquam_a\":[\"Similique quisquam a\"]}', 'HaemorrhoidsEmbo', '2024-04-05 13:09:14', '2024-04-05 13:09:14'),
(1028, 115, 2, 'symptoms', '[{\"SymptomType\":\"Anal bulge (self-retract)\",\"SymptomDurationValue\":\"30\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Magni inventore eum\"},{\"SymptomType\":\"Anal bulge (persistent \\/ assisted retraction)\",\"SymptomDurationValue\":\"30\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Nisi expedita iste l\"},{\"SymptomType\":\"Anal bleed\",\"SymptomDurationValue\":\"9\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Optio officia volup\"},{\"SymptomType\":\"Anal pain\",\"SymptomDurationValue\":\"13\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"Enim quis quod solut\"},{\"SymptomType\":\"Anal itching\",\"SymptomDurationValue\":\"25\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"Officia labore eos\"},{\"SymptomType\":\"Constipation\",\"SymptomDurationValue\":\"10\",\"SymptomDurationType\":\"Months\",\"SymptomDurationNote\":\"Aut laborum Volupta\"},{\"SymptomType\":\"Other\",\"SymptomDurationValue\":\"3\",\"SymptomDurationType\":\"Years\",\"SymptomDurationNote\":\"Quia eu velit sed pe\"}]', 'HaemorrhoidsEmbo', '2024-04-05 13:09:14', '2024-04-05 13:09:14'),
(1029, 115, 2, 'symptoms_score', '{\"Analbulge\":[\"0\"],\"retraction\":[\"0\"],\"Analbleed\":[\"1\"],\"Analpain\":[\"0\"],\"Analitching\":[\"1\"],\"Constipation\":[\"5\"]}', 'HaemorrhoidsEmbo', '2024-04-05 13:09:14', '2024-04-05 13:09:14'),
(1030, 115, 2, 'Referral', '{\"Lipidemacareprogram\":[\"Lipidema care program\"],\"LipidemacareprogramNote\":[\"Nulla animi quis nu\"],\"PhysioTherapy\":[\"Post EVLT - Rehab\\/PhysioTherapy\"],\"PhysioTherapyNote\":[\"Cupidatat totam ut n\"],\"Others\":[\"Others\"],\"OthersNote\":[\"Odit labore saepe as\"]}', 'HaemorrhoidsEmbo', '2024-04-05 13:09:14', '2024-04-05 13:09:14'),
(1031, 115, 2, 'Supportive', '{\"IVVITATHYROID175\":[\"IVVITATHYROID175\"],\"LABPREIVADVANCED230\":[\"LABPREIVADVANCED230\"],\"Corporis_elit_sed_a\":[\"Corporis elit sed a\"]}', 'HaemorrhoidsEmbo', '2024-04-05 13:09:14', '2024-04-05 13:09:14'),
(1032, 115, 2, 'SpecialInvestigation', '{\"endoscopy\":[\"Normal\"]}', 'HaemorrhoidsEmbo', '2024-04-05 13:09:14', '2024-04-05 13:09:14'),
(1033, 115, 2, 'ElegibilitySTATUS', '{\"HEMARRHOIDSEMBOLIZATION\":[\"HEMARRHOIDS EMBOLIZATION (HE)\"],\"HEMARRHOIDSEMBOLIZATIONNote\":[\"Ea nemo officiis mol\"],\"Others\":[\"Others\"],\"OthersNote\":[\"Atque incididunt lab\"]}', 'HaemorrhoidsEmbo', '2024-04-05 13:09:14', '2024-04-05 13:09:14'),
(1034, 115, 2, 'Intervention', '{\"LABPREANGIO48\":[\"LABPREANGIO48\"],\"LABPREIRSAFETY17\":[\"LABPREIRSAFETY17\",\"LABPREIRSAFETY17\",\"LABPREIRSAFETY17\"],\"IVSEDATION270\":[\"IVSEDATION270\"],\"USHSCLERO490\":[\"USHSCLERO490\"],\"LABPREIRBASIC32\":[\"LABPREIRBASIC32\",\"LABPREIRBASIC32\"]}', 'HaemorrhoidsEmbo', '2024-04-05 13:09:14', '2024-04-05 13:09:14'),
(1035, 115, 2, 'MDT', '{\"HE\":[\"HE\"],\"HENote\":[\"Quia sed aliquid exp\"],\"Medical\":[\"Medical\"],\"MedicalNote\":[\"Eaque omnis pariatur\"],\"Surgical\":[\"Surgical\"],\"SurgicalNote\":[\"Aspernatur necessita\"],\"options\":[\"options\"],\"optionsNote\":[\"Libero ullamco persp\"]}', 'HaemorrhoidsEmbo', '2024-04-05 13:09:14', '2024-04-05 13:09:14'),
(1036, 115, 2, 'Lab', '{\"ESR\":[\"normal\"],\"CRP\":[\"high\"],\"Externalhemorrhoids\":[\"YES\"],\"Internalhemorrhoids\":[\"No\"],\"Thrombosedhemorrhoids\":[\"No\"],\"BnignPolyp\":[\"YES\"],\"Polp\":[\"YES\"],\"tumor\":[\"No\"],\"Ulcer\":[\"YES\"],\"Analfissure\":[\"YES\"],\"Fistula\":[\"YES\"]}', 'HaemorrhoidsEmbo', '2024-04-05 13:09:14', '2024-04-05 13:09:14'),
(1037, 115, 2, 'Imaging', '{\"ExternalHemarrhoids\":[\"No\"],\"InternalHemarrhoids\":[\"No\"],\"SuspiciousAnalMass\":[\"No\"],\"ProminentSRAarteries\":[\"No\"],\"Dilatedanalveins\":[\"No\"],\"thrombosedhemorrhoids\":[\"YES\"],\"Congestedpelvicveins\":[\"YES\"],\"Suspicious\":[\"NO\"],\"SuperiorHemorrhoidalarteries\":[\"Prominent\"],\"MiddleHemorrhoidalarteries\":[\"Prominent\"],\"InferiorHemorrhoidalarteries\":[\"Prominent\"]}', 'HaemorrhoidsEmbo', '2024-04-05 13:09:14', '2024-04-05 13:09:14'),
(1038, 115, 2, 'ClinicalIndicator', '{\"AnalFissure\":[\"YES\"],\"AnalDischarge\":[\"No\"],\"Fistulainano\":[\"No\"],\"Hemarrhoidectomy\":[\"YES\"],\"Laser\":[\"YES\"]}', 'HaemorrhoidsEmbo', '2024-04-05 13:09:14', '2024-04-05 13:09:14'),
(1039, 115, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"],\"SystemicExam\":[\"Normal\"]}', 'HaemorrhoidsEmbo', '2024-04-05 13:09:14', '2024-04-05 13:09:14'),
(1040, 114, 127, 'diagnosis_general', '{\"GEN1\":[\"dmummy\"]}', 'general_form', '2024-04-06 10:05:37', '2024-04-06 10:05:37'),
(1041, 114, 127, 'symptoms', '[{\"SymptomType\":\"dummy\",\"SymptomDurationValue\":\"1\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"1234\"}]', 'general_form', '2024-04-06 10:09:28', '2024-04-06 10:09:28'),
(1042, 114, 127, 'diagnosis_general', '{\"Thyroidnodule\":[\"Thyroid nodule\"],\"Euothyroid\":[\"Euothyroid\"]}', 'thyroid_form', '2024-04-06 10:15:13', '2024-04-06 10:15:13'),
(1043, 114, 127, 'diagnosis_general', '{\"Degeneration\":[\"Menisceal injury \\/ Degeneration\"],\"Tendenopathy\":[\"Tendenopathy\"],\"Bursitis\":[\"Bursitis\"]}', 'KneePain', '2024-04-06 10:15:43', '2024-04-06 10:15:43'),
(1044, 114, 127, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"],\"SystemicExam\":[\"Normal\"]}', 'general_form', '2024-04-06 10:18:41', '2024-04-06 10:18:41'),
(1045, 114, 127, 'MDT', '{\"AWERT\":{\"asd\":\"SDFGH\"}}', 'general_form', '2024-04-06 10:29:22', '2024-04-06 10:29:22'),
(1046, 96, 127, 'diagnosis_general', '{\"Tendonitis\":[\"Tendonitis\"],\"Enthesopathy\":[\"Enthesopathy\"]}', 'ShoulderPain', '2024-04-06 10:34:56', '2024-04-06 10:34:56'),
(1047, 96, 127, 'diagnosis_general', '{\"Sacroilitis\":[\"Sacroilitis\"],\"ThoracicFacetArthropathy\":[\"Thoracic - Facet Arthropathy\"]}', 'SpinePain', '2024-04-06 10:37:50', '2024-04-06 10:37:50'),
(1048, 96, 127, 'diagnosis_cid', '{\"G551\":[\"G55.1 Nerve root and plexus compressions in intervertebral disc disorders, Neuritis|due to herniation, nucleus pulposus |lumbar, lumbosacral\"],\"M478cervical\":[\"M47.8 Other spondylosis , Spondylosis cervical\"]}', 'SpinePain', '2024-04-06 10:37:50', '2024-04-06 10:37:50'),
(1049, 103, 127, 'MDT', '{\"\\u0627\\u0644\\u0645\\u0648\\u062c\\u0627\\u062a \\u0641\\u0648\\u0642 \\u0627\\u0644\\u0635\\u0648\\u062a\\u064a\\u0629\":{\"asd\":\"\\u0627\\u0644\\u0645\\u0648\\u062c\\u0627\\u062a \\u0641\\u0648\\u0642 \\u0627\\u0644\\u0635\\u0648\\u062a\\u064a\\u0629\"}}', 'general_form', '2024-04-06 10:50:32', '2024-04-06 10:50:32'),
(1050, 115, 2, 'diagnosis_general', '{\"GEN1\":[\"gen1\"]}', 'general_form', '2024-04-08 05:59:09', '2024-04-08 05:59:09'),
(1051, 95, 127, 'diagnosis_general', '{\"GEN1\":[\"qwert\"]}', 'general_form', '2024-04-08 07:47:32', '2024-04-08 07:47:32'),
(1052, 95, 127, 'diagnosis_general', '{\"GEN1\":[\"qawsedrftg\"]}', 'general_form', '2024-04-08 07:47:56', '2024-04-08 07:47:56'),
(1053, 106, 127, 'diagnosis_general', '{\"GEN1\":[\"asdf\"]}', 'general_form', '2024-04-08 08:51:31', '2024-04-08 08:51:31'),
(1054, 106, 127, 'diagnosis_general', '{\"GEN1\":[\"asdfg\"]}', 'general_form', '2024-04-08 08:51:39', '2024-04-08 08:51:39'),
(1055, 106, 127, 'diagnosis_general', '{\"GEN1\":[\"asdfghjk\"]}', 'general_form', '2024-04-08 08:51:52', '2024-04-08 08:51:52'),
(1056, 65, 127, 'diagnosis_general', '{\"GEN1\":[\"ASDFGHJ\"]}', 'general_form', '2024-04-08 08:58:14', '2024-04-08 08:58:14'),
(1057, 106, 127, 'diagnosis_general', '{\"GEN1\":[\"ASEDRT\"]}', 'general_form', '2024-04-08 09:00:48', '2024-04-08 09:00:48'),
(1058, 106, 127, 'diagnosis_general', '{\"GEN1\":[\"asdfghjkl;\"]}', 'general_form', '2024-04-08 09:01:28', '2024-04-08 09:01:28'),
(1059, 102, 133, 'diagnosis_general', '{\"UterineFibroid\":[\"Uterine Fibroid\"],\"UterineBleed\":[\"Uterine Bleed\"]}', 'uterine_embo', '2024-04-08 13:32:48', '2024-04-08 13:32:48'),
(1060, 102, 133, 'diagnosis_cid', '{\"D250\":[\"D25.0 Submucous leiomyoma of uterus\"],\"P209\":[\"P20.9 Intrauterine hypoxia, unspecified\"]}', 'uterine_embo', '2024-04-08 13:32:48', '2024-04-08 13:32:48'),
(1091, 102, 133, 'diagnosis_general', '{\"Thyroidnodule\":[\"Thyroid nodule\"],\"Hypothyroidism\":[\"Hypothyroidism\"],\"ThyroidCarcinoma\":[\"Thyroid Carcinoma\"]}', 'thyroid_form', '2024-04-09 05:45:15', '2024-04-09 05:45:15'),
(1092, 102, 133, 'diagnosis_cid', '{\"D34\":[\"D34 Benign neoplasm of thyroid gland\"],\"E039\":[\"E03.9 Hypothyroidism, unspecified\"],\"E05\":[\"E05 Thyrotoxicosis [hyperthyroidism]\"],\"E055\":[\"E05.5 Thyroid crisis or storm\"],\"E06\":[\"E06 Thyroiditis\"]}', 'thyroid_form', '2024-04-09 05:45:15', '2024-04-09 05:45:15'),
(1093, 102, 133, 'symptoms', '[{\"SymptomType\":\"Disfiguring Neck mass\",\"SymptomDurationValue\":\"1\",\"SymptomDurationType\":\"Weeks\",\"SymptomDurationNote\":\"ijhygtfdx\"},{\"SymptomType\":\"Dyspnea \\/ SOB\",\"SymptomDurationValue\":\"2\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"jnhgfcx\"}]', 'thyroid_form', '2024-04-09 05:45:15', '2024-04-09 05:45:15'),
(1094, 102, 133, 'symptoms_score', '{\"Disfiguring\":[\"3\"],\"Dyspnea\":[\"5\"],\"Dysphagia\":[\"5\"],\"Hoarsealteredvoice\":[\"5\"],\"Neckpain\":[\"5\"],\"Sleepdisturbance\":[\"3\"],\"Exophthalmos\":[\"3\"]}', 'thyroid_form', '2024-04-09 05:45:15', '2024-04-09 05:45:15'),
(1095, 102, 133, 'Lab', '{\"TSH\":[\"normal\"],\"T4\":[\"low\"],\"PTH\":[\"low\"]}', 'thyroid_form', '2024-04-09 05:45:15', '2024-04-09 05:45:15'),
(1096, 102, 133, 'ClinicalIndicator', '{\"Carbimazole\":[\"YES\"]}', 'thyroid_form', '2024-04-09 05:45:15', '2024-04-09 05:45:15'),
(1097, 102, 133, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"]}', 'thyroid_form', '2024-04-09 05:45:15', '2024-04-09 05:45:15'),
(1098, 102, 133, 'rightLobeScore', '{\"Composition\":[\"1\"],\"Shape\":[\"3\"],\"Margin\":[\"2\"],\"Calcification\":[\"1\"]}', 'thyroid_form', '2024-04-09 05:45:15', '2024-04-09 05:45:15'),
(1099, 102, 133, 'leftLobeScore', '{\"Composition\":[\"1\"],\"Shape\":[\"0\"],\"Margin\":[\"2\"],\"Calcification\":[\"1\"]}', 'thyroid_form', '2024-04-09 05:45:15', '2024-04-09 05:45:15'),
(1100, 102, 133, 'EnlargedLymphnodes', '{\"nodes\":[\"YES\"]}', 'thyroid_form', '2024-04-09 05:45:15', '2024-04-09 05:45:15'),
(1101, 102, 133, 'MRCIR48', '{\"MRI\":[\"Normal\"]}', 'thyroid_form', '2024-04-09 05:45:15', '2024-04-09 05:45:15'),
(1102, 102, 133, 'CTCIR48', '{\"CT\":[\"Abnormal\"],\"NOTE\":[\"bhshgs bhdhhd\"]}', 'thyroid_form', '2024-04-09 05:45:15', '2024-04-09 05:45:15'),
(1103, 102, 133, 'NmParaThyroidScan', '{\"RightUpper\":[\"YES\"],\"RightLower\":[\"NO\"],\"LeftUpper\":[\"NO\"],\"LeftLower\":[\"NO\"]}', 'thyroid_form', '2024-04-09 05:45:15', '2024-04-09 05:45:15'),
(1104, 102, 133, 'HistopathRightThyroidFNA', '{\"Bathesda\":[\"Bathesda grade II\"]}', 'thyroid_form', '2024-04-09 05:45:15', '2024-04-09 05:45:15'),
(1105, 102, 133, 'HistopathLeftThyroidFNA', '{\"Bathesda\":[\"Bathesda grade II\"]}', 'thyroid_form', '2024-04-09 05:45:15', '2024-04-09 05:45:15'),
(1106, 114, 149, 'symptoms', '[{\"SymptomType\":\"jhgf\",\"SymptomDurationValue\":\"2\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"jnhgfd\"},{\"SymptomType\":\"mkjhgfd\",\"SymptomDurationValue\":\"3\",\"SymptomDurationType\":\"Days\"}]', 'general_form', '2024-04-09 11:25:09', '2024-04-09 11:25:09'),
(1107, 114, 149, 'symptoms', '[{\"SymptomType\":\"Fever\",\"SymptomDurationValue\":\"2\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"jnhgf jkhgf hjhhhhhhhjuhhjujhuhuuhjh hhbgggyuh vghjhhjhhjh bhhhhhjjhjhjhjhjhjhjh bhbnbhhbnh\"}]', 'MSKPain', '2024-04-09 12:00:29', '2024-04-09 12:00:29'),
(1108, 114, 149, 'MDT', '{\"vgfgvdtvdggsv fgsgvdgsgvggf\":{\"asd\":\"*******\"},\"Test Test\":{\"asd\":\"******\"}}', 'thyroid_form', '2024-04-09 12:05:56', '2024-04-09 12:05:56'),
(1109, 114, 149, 'diagnosis_general', '{\"BPH\":[\"BPH\"],\"Cystitis\":[\"Cystitis\"]}', 'prostate_form', '2024-04-09 12:11:09', '2024-04-09 12:11:09'),
(1110, 114, 149, 'diagnosis_cid', '{\"N423\":[\"N42.3 Dysplasia of prostate\"]}', 'prostate_form', '2024-04-09 12:11:09', '2024-04-09 12:11:09'),
(1111, 114, 149, 'symptoms', '{\"4\":{\"SymptomType\":\"Weak Stream\"},\"5\":{\"SymptomType\":\"Incomplete emptying\"},\"6\":{\"SymptomType\":\"Nocturia\"}}', 'prostate_form', '2024-04-09 12:11:09', '2024-04-09 12:11:09'),
(1112, 114, 149, 'diagnosis_general', '{\"PelvicVarices\":[\"Pelvic Varices\"],\"PelvicPain\":[\"Pelvic Pain\"]}', 'PelvicCongEmbo', '2024-04-09 12:23:29', '2024-04-09 12:23:29'),
(1113, 114, 149, 'diagnosis_cid', '{\"a186\":[\"186 Varicose veins of other sites\"],\"R10\":[\"R10 Abdominal and pelvic pain\"],\"mnbhgvcfxd\":[\"mnbhgvcfxd\"],\"kjhgfds\":[\"kjhgfds\"]}', 'PelvicCongEmbo', '2024-04-09 12:23:29', '2024-04-09 12:23:29'),
(1114, 114, 149, 'symptoms', '[{\"SymptomType\":\"Pelvic pain (standing)\",\"SymptomDurationValue\":\"2\",\"SymptomDurationType\":\"Days\",\"SymptomDurationNote\":\"nbhgf jkhgfdse gvgvggvggvvhvvvvvvb vvxghvhxghxbxbhhbxbbhx bxhxbgv vg gxvgxvxgxvvxgbxhxbhgxhhgx vxvgxhgxbhgxbgxhxbhh.\"}]', 'PelvicCongEmbo', '2024-04-09 12:23:29', '2024-04-09 12:23:29'),
(1115, 114, 149, 'symptoms_score', '{\"Pelvicheaviness\":[\"1\"],\"Pelvicheat\":[\"1\"],\"Painwithperiod\":[\"0\"],\"Perinealvaricosities\":[\"1\"],\"Vaginalbleed\":[\"5\"],\"Urinarysymptoms\":[\"3\"],\"Recurrentmiscarriage\":[\"3\"],\"Lowbackpain\":[\"5\"]}', 'PelvicCongEmbo', '2024-04-09 12:23:29', '2024-04-09 12:23:29'),
(1116, 114, 149, 'Referral', '{\"Pevic\":[\"EPevic Floor Rehab\\/PhysioTherapy\"]}', 'PelvicCongEmbo', '2024-04-09 12:23:29', '2024-04-09 12:23:29'),
(1117, 114, 149, 'Supportive', '{\"LABPREIVBASIC52\":[\"LABPREIVBASIC52\"],\"IMBVITAMINES37\":[\"IMBVITAMINES37\"]}', 'PelvicCongEmbo', '2024-04-09 12:23:29', '2024-04-09 12:23:29'),
(1118, 114, 149, 'SpecialInvestigation', '{\"PAPSmear\":[\"Abnormal\"]}', 'PelvicCongEmbo', '2024-04-09 12:23:29', '2024-04-09 12:23:29'),
(1119, 114, 149, 'Intervention', '{\"LABPREANGIO48\":[\"LABPREANGIO48\"]}', 'PelvicCongEmbo', '2024-04-09 12:23:29', '2024-04-09 12:23:29'),
(1120, 114, 149, 'MDT', '{\"PVVE\":[\"PVVE\"],\"PVVENote\":[\"vfgvcfv gvbghv vgb v\"]}', 'PelvicCongEmbo', '2024-04-09 12:23:29', '2024-04-09 12:23:29'),
(1121, 114, 149, 'Lab', '{\"URINANALYSISResults\":[\"Negative \\/ no growth\"],\"HistopathResults\":[\"Negative\"]}', 'PelvicCongEmbo', '2024-04-09 12:23:29', '2024-04-09 12:23:29'),
(1122, 114, 149, 'Imaging', '{\"USGENERAL70Dilatedpelvicvarices\":[\"No\"],\"USGENERAL70VenousReflux\":[\"YES\"],\"USGENERAL70FreeFluid\":[\"YES\"],\"USGENERAL70SuapiciousPelvicmass\":[\"YES\"],\"MRCIR48Dilatedpelvicvarices\":[\"YES\"],\"MRCIR48VenousReflux\":[\"YES\"],\"MRCIR48FreeFluid\":[\"YES\"],\"MRCIR48SuapiciousPelvicmass\":[\"YES\"],\"MRCIR48NetcruckerFeatures\":[\"NO\"],\"CTCIR48Dilatedpelvicvarices\":[\"NO\"],\"CTCIR48VenousReflux\":[\"NO\"],\"CTCIR48FreeFluid\":[\"NO\"],\"CTCIR48SuapiciousPelvicmass\":[\"NO\"],\"CTCIR48NetcruckerFeatures\":[\"NO\"]}', 'PelvicCongEmbo', '2024-04-09 12:23:29', '2024-04-09 12:23:29'),
(1123, 114, 149, 'ClinicalIndicator', '{\"Heamarrhoids\":[\"YES\"],\"VulvarVarices\":[\"YES\"]}', 'PelvicCongEmbo', '2024-04-09 12:23:29', '2024-04-09 12:23:29'),
(1124, 114, 149, 'ClinicalExam', '{\"RegionalExam\":[\"Abnormal\"],\"SystemicExam\":[\"Normal\"]}', 'PelvicCongEmbo', '2024-04-09 12:23:29', '2024-04-09 12:23:29'),
(1125, 114, 149, 'symptoms_score', '{\"HeavyPeriod\":[\"1\"],\"Dysmenorrhea\":[\"1\"],\"CompressivesymptomsUrinary\":[\"1\"],\"CompressivesymptomsConstipation\":[\"3\"],\"CompressivesymptomsLowbackpain\":[\"3\"],\"Symptomaticanemia\":[\"3\"],\"Abdominalmass\":[\"3\"]}', 'uterine_embo', '2024-04-09 12:34:12', '2024-04-09 12:34:12'),
(1126, 114, 149, 'ClinicalIndicator', '{\"Vaginal\":[\"No\"],\"Uterine\":[\"No\"],\"Painfulintercorse\":[\"No\"],\"Recurrentabortion\":[\"No\"],\"injections\":[\"No\"]}', 'uterine_embo', '2024-04-09 12:34:12', '2024-04-09 12:34:12'),
(1127, 114, 149, 'ClinicalExam', '{\"RegionalExam\":[\"Abnormal\"],\"SystemicExam\":[\"Abnormal\"]}', 'uterine_embo', '2024-04-09 12:34:12', '2024-04-09 12:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `patient_uterineembo_diagnosis`
--

CREATE TABLE `patient_uterineembo_diagnosis` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_name` varchar(255) DEFAULT NULL,
  `data_value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_varicoceleembo_diagnosis`
--

CREATE TABLE `patient_varicoceleembo_diagnosis` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_name` varchar(255) DEFAULT NULL,
  `data_value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_varicose_ablation_diagnosis`
--

CREATE TABLE `patient_varicose_ablation_diagnosis` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_name` varchar(255) DEFAULT NULL,
  `data_value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_varicose_ablation_diagnosis`
--

INSERT INTO `patient_varicose_ablation_diagnosis` (`id`, `patient_id`, `title_name`, `data_value`, `created_at`, `updated_at`) VALUES
(1, 33, 'diagnosis_general', '{\"Reticular\": [\"Reticular/ spider veins\"], \"Pedaledema\": [\"Pedal edema\"], \"Venousuicer\": [\"Venous uicer\"], \"VaricoseVeins\": [\"Varicose Veins\"], \"DeepVeinThrombosis\": [\"Deep Vein Thrombosis\"], \"Venousinsufficiency\": [\"Venous insufficiency\"]}', NULL, NULL),
(2, 33, 'diagnosis_cid', '{\"186\": [\"186 Varicose veins of other sites\"], \"1831\": [\"183.1 Varicose veins of lower extremities with inflammation\"], \"1839\": [\"183.9 Varicose veins of lower extremities without ulcer or inflammation\"], \"1872\": [\"187.2 Venous insufficiency (Chronic) (Peripheral)\"], \"1879\": [\"187.9 Disorder of vein, unspecified\"]}', NULL, NULL),
(3, 33, 'symptoms_score', '{\"LegUlcers\": [\"0\"], \"Legitching\": [\"3\"], \"Nightcramps\": [\"5\"], \"Legheaviness\": [\"0\"], \"Warmlegsfeet\": [\"5\"], \"Generalmalise\": [\"0\"], \"LegPainburning\": [\"1\"], \"Legpinsneedles\": [\"1\"], \"Dilatedlegveins\": [\"0\"], \"Legedemaswelling\": [\"0\"], \"Skinpigmentation\": [\"1\"]}', NULL, NULL),
(4, 33, 'Imaging', '{\"CT\": [\"on\"], \"MRI\": [\"Normal\"], \"CTNOTE\": [\"Ipsam unde voluptatu\"], \"MRINOTE\": [null], \"GSVLEFTReflux\": [\"No\"], \"GSVLEFTDilated\": [\"YES (VVA Faverable)\"], \"GSVLEFTReflux2\": [\"No\"], \"GSVLEFTReflux3\": [\"YES (VVA Faverable)\"], \"SSVLEFTDilated\": [\"YES (VVA Faverable)\"], \"GSVRIGHTDilated\": [\"YES (VVA Faverable)\"], \"GSVRIGHTReflux1\": [\"YES (VVA Faverable)\"], \"GSVRIGHTReflux2\": [\"No\"], \"GSVRIGHTReflux3\": [\"No\"], \"SSVLEFTDilated1\": [\"YES (VVA Faverable)\"], \"SSVLEFTDilated2\": [\"No\"], \"SSVLEFTDilated3\": [\"YES (VVA Faverable)\"], \"SSVRIGHTDilated\": [\"No\"], \"SSVRIGHTReflux1\": [\"No\"], \"SSVRIGHTReflux2\": [\"YES (VVA Faverable)\"], \"SSVRIGHTReflux3\": [\"No\"], \"GSVLEFTOcclusive\": [\"YES (VVA contraindicated)\"], \"SSVLEFTOcclusive\": [\"No\"], \"GSVRIGHTOcclusive\": [\"YES (VVA Faverable)\"], \"SSVRIGHTOcclusive\": [\"No\"]}', NULL, NULL),
(5, 33, 'ClinicalIndicator', '{\"lowerextremityDVTActive\": [\"YES  (VVA unfaverable)\"], \"lowerextremityPhlepitis\": [\"No\"], \"lowerextremityDVTCHRONIC\": [\"No\"]}', NULL, NULL),
(6, 33, 'lab', '{\"CRP\": [\"low\"], \"ESR\": [\"Normal\"]}', NULL, NULL),
(7, 33, 'mdt', '{\"NOTE\": [\"Voluptates dolores e\", null, null, null], \"decisionOption\": [\"Thermal VVA\"]}', NULL, NULL),
(8, 33, 'referral', '{\"NOTE\": [null, null, \"Sint ad architecto r\"], \"HCREFFERAL\": [\"Other\"]}', NULL, NULL),
(9, 33, 'supportive', '{\"LABPREIVBASIC52\": [\"LABPREIVBASIC52\"]}', NULL, NULL),
(10, 33, 'intervention_procedure', '{\"LABPREIRBASIC32\": [\"LABPREIRBASIC32\"], \"USVVFST1DOSE220\": [\"USVVFST1DOSE220\"], \"USVVNTNTABL2200\": [\"USVVNTNTABL2200\"], \"LABPREIRSAFETY17\": [\"LABPREIRSAFETY17\"], \"PRESSURESTOCKINGS34\": [\"PRESSURESTOCKINGS34\"], \"PRESSURESTOCKINGSFITDEVICE9\": [\"PRESSURESTOCKINGSFITDEVICE9\", \"PRESSURESTOCKINGSFITDEVICE9\"]}', NULL, NULL),
(11, 33, 'elegibility_status', '{\"NOTE\": [null, null, null, \"Amet quidem dolorem\"], \"treatmentoption\": [\"Others\"]}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_video_calls`
--

CREATE TABLE `patient_video_calls` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meeting_url` mediumtext DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_video_calls`
--

INSERT INTO `patient_video_calls` (`id`, `patient_id`, `meeting_url`, `date`, `created_at`, `updated_at`) VALUES
(1, 6, 'https://techmavesoftwaredev.com/webclinic/admin/patient-medical-detail/6?_token=m7ovl8LOUf6FMK1orjjMeJo7p5yCM3x2yyAwwfNv&appointment_date=21+Dec%2C+2023&appointment_type=&location=&start_date=&start_time=&end_date=&end_time=&app_cost=&app_code=&clinician=#', '12 Dec, 2023', '2023-12-22 17:17:21', '2023-12-22 17:17:21'),
(2, 6, 'https://techmavesoftwaredev.com/webclinic/admin/patient-medical-detail/6?_token=m7ovl8LOUf6FMK1orjjMeJo7p5yCM3x2yyAwwfNv&appointment_date=21+Dec%2C+2023&appointment_type=&location=&start_date=&start_time=&end_date=&end_time=&app_cost=&app_code=&clinician=#', '11 Dec, 2023', '2023-12-22 21:02:03', '2023-12-22 21:02:03'),
(3, 39, 'Modi cupidatat ut ra', '29-Nov-2004', '2024-01-09 17:51:56', '2024-01-09 17:51:56'),
(4, 39, 'Dolore cum fugit et', '13-Dec-1981', '2024-01-09 17:53:20', '2024-01-09 17:53:20'),
(5, 68, 'https://techmavesoftwaredev.com/webclinic/admin/patient-medical-detail/6?_token=m7ovl8LOUf6FMK1orjjMeJo7p5yCM3x2yyAwwfNv&appointment_date=21+Dec%2C+2023&appointment_type=&location=&start_date=&start_time=&end_date=&end_time=&app_cost=&app_code=&clinician=#', '04 Feb, 2024', '2024-02-10 14:52:36', '2024-02-10 14:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `patient_vitals`
--

CREATE TABLE `patient_vitals` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `measurement` varchar(100) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment_by_me` longtext NOT NULL,
  `verify_status` int(200) DEFAULT NULL,
  `guard_name` varchar(255) DEFAULT 'web',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `comment_by_me`, `verify_status`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Add Patient Form\n', '', 1, 'web', '2023-10-19 12:16:40', '2024-01-18 06:42:43'),
(2, 'View Medical Record', '', 1, 'web', '2023-10-19 12:17:25', '2024-03-20 08:57:38'),
(3, 'View Patient Invoice', '', 1, 'web', '2023-10-19 12:17:25', '2024-01-18 06:44:15'),
(4, 'Show Patient ', '', 1, 'web', '2023-10-19 12:17:25', '2024-01-18 07:12:15'),
(5, 'Edit Patient', '', 1, 'web', '2024-03-20 08:52:31', '2024-03-20 08:52:31'),
(7, 'Invoices ', '', 2, 'web', '2024-03-20 09:04:03', '2024-03-20 09:04:03'),
(9, 'Edit Invoice', '', 2, 'web', '2024-03-20 09:04:03', '2024-03-20 09:04:11'),
(11, 'Task View', '', 3, 'web', '2024-03-20 09:05:37', '2024-03-20 09:05:37'),
(12, 'Assign Task', '', 3, 'web', '2024-03-20 09:05:37', '2024-03-20 09:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progress_note_canned_text`
--

CREATE TABLE `progress_note_canned_text` (
  `id` int(11) NOT NULL,
  `canned_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `progress_note_canned_text`
--

INSERT INTO `progress_note_canned_text` (`id`, `canned_name`, `created_at`, `updated_at`) VALUES
(1, 'Certificate of clinic Attendance ', NULL, NULL),
(2, 'Cash Receipt Confirmation', NULL, NULL),
(3, 'Reception Note\r\n', NULL, NULL),
(4, 'Exceptional Discount Confirmation', NULL, NULL),
(6, 'List of Visit', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `progress_note_contents`
--

CREATE TABLE `progress_note_contents` (
  `id` int(11) NOT NULL,
  `note_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `progress_note_contents`
--

INSERT INTO `progress_note_contents` (`id`, `note_name`, `created_at`, `updated_at`) VALUES
(1, 'Use canned text', NULL, NULL),
(2, 'EVLT-GSV', NULL, NULL),
(3, 'IR-THYROID ABLATION', NULL, NULL),
(4, 'PRP KNEE INJECTION', NULL, NULL),
(5, 'ULTRASOUND REPORT', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `radiologys`
--

CREATE TABLE `radiologys` (
  `id` int(11) NOT NULL,
  `lab_name` varchar(100) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `mobile_phone` varchar(100) DEFAULT NULL,
  `landline` varchar(100) DEFAULT NULL,
  `post_code` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `radiologys`
--

INSERT INTO `radiologys` (`id`, `lab_name`, `email_address`, `mobile_phone`, `landline`, `post_code`, `street`, `town`, `country`, `created_at`, `updated_at`) VALUES
(3, 'updated', 'rajhimasnhu111222@gmail.com', '07248702312', '213', '251201', 'muzaffarnagar 1234', 'noida  1234', 'india', '2024-01-19 07:53:13', '2024-01-19 07:53:13'),
(4, 'qw3erty', '2345', NULL, 'qw345y', NULL, NULL, NULL, NULL, '2024-01-19 08:50:36', '2024-01-19 08:50:36'),
(7, 'Darryl Frye', 'myhetamib@mailinator.com', '+1 (792) 446-2965', 'Quod perferendis nis', 'Unde esse rerum sed', 'In quidem amet reru', 'Expedita velit moll', 'canada', '2024-01-24 10:31:47', '2024-01-24 10:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist_tasks`
--

CREATE TABLE `receptionist_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nurse_task_id` bigint(255) UNSIGNED DEFAULT NULL,
  `receptionist_id` bigint(255) DEFAULT NULL,
  `status` enum('test_ordered','billing_completed','assigned_to_nurse','approved') NOT NULL DEFAULT 'test_ordered',
  `appoinment_date` varchar(255) DEFAULT NULL,
  `appoinment_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receptionist_tasks`
--

INSERT INTO `receptionist_tasks` (`id`, `nurse_task_id`, `receptionist_id`, `status`, `appoinment_date`, `appoinment_time`, `created_at`, `updated_at`) VALUES
(1, 1, 118, 'assigned_to_nurse', '03 Mar, 2024', '12:03 AM', '2024-03-12 13:08:22', '2024-03-12 13:08:22'),
(2, 1, 119, 'assigned_to_nurse', '03 Mar, 2024', '12:03 AM', '2024-03-12 13:08:22', '2024-03-12 13:08:22'),
(3, 1, 120, 'assigned_to_nurse', '03 Mar, 2024', '12:03 AM', '2024-03-12 13:08:22', '2024-03-12 13:08:22'),
(4, 2, 118, 'assigned_to_nurse', '20 Apr, 2024', '12:00 AM', '2024-03-12 13:09:00', '2024-03-12 13:09:00'),
(5, 2, 119, 'assigned_to_nurse', '20 Apr, 2024', '12:00 AM', '2024-03-12 13:09:00', '2024-03-12 13:09:00'),
(6, 2, 120, 'assigned_to_nurse', '20 Apr, 2024', '12:00 AM', '2024-03-12 13:09:00', '2024-03-12 13:09:00'),
(7, 4, 118, 'assigned_to_nurse', '18 Mar, 2024', '12:04 AM', '2024-03-14 07:14:30', '2024-03-14 07:14:30'),
(8, 4, 119, 'assigned_to_nurse', '18 Mar, 2024', '12:04 AM', '2024-03-14 07:14:30', '2024-03-14 07:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `referal_patients`
--

CREATE TABLE `referal_patients` (
  `id` int(11) NOT NULL,
  `patient_id` int(18) DEFAULT NULL,
  `doctor_id` int(18) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referal_patients`
--

INSERT INTO `referal_patients` (`id`, `patient_id`, `doctor_id`, `created_at`, `updated_at`) VALUES
(1, 105, 2, '2024-03-30 06:27:10', '2024-03-30 06:37:30'),
(2, 105, 7, '2024-03-30 06:27:10', '2024-03-30 06:37:32'),
(3, 105, 12, '2024-03-30 06:27:10', '2024-03-30 06:37:34'),
(4, 105, 2, '2024-03-30 06:28:27', '2024-03-30 06:28:27'),
(5, 105, 7, '2024-03-30 06:28:27', '2024-03-30 06:28:27'),
(6, 105, 2, '2024-03-30 06:33:20', '2024-03-30 06:33:20'),
(7, 105, 2, '2024-03-30 06:33:56', '2024-03-30 06:33:56'),
(8, 105, 99, '2024-03-30 06:45:07', '2024-03-30 06:45:07'),
(16, 109, 2, '2024-03-30 11:00:41', '2024-03-30 11:00:41'),
(17, 109, 7, '2024-03-30 11:01:08', '2024-03-30 11:01:08'),
(18, 109, 2, '2024-03-30 11:03:02', '2024-03-30 11:03:02'),
(19, 103, 2, '2024-04-06 10:51:38', '2024-04-06 10:51:38'),
(20, 103, 145, '2024-04-06 10:52:13', '2024-04-06 10:52:13'),
(21, 95, 110, '2024-04-08 07:49:45', '2024-04-08 07:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_id` varchar(50) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(100) DEFAULT 'admin',
  `description` varchar(200) DEFAULT NULL,
  `status` enum('0','1','','') NOT NULL DEFAULT '0',
  `added_date` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_id`, `name`, `guard_name`, `description`, `status`, `added_date`, `created_at`, `updated_at`) VALUES
(1, '#XZ797', 'Doctor', 'doctor', NULL, '1', '19,December,2023', '2023-12-19 20:56:54', '2024-01-18 07:32:15'),
(2, '#ED232', 'Nurse', 'doctor', NULL, '1', NULL, '2024-01-18 05:07:20', '2024-04-09 13:46:37'),
(5, '#CP127', 'Accountant', 'admin', 'accountant', '1', '23,January,2024', '2024-01-23 11:22:25', '2024-04-09 13:23:11'),
(6, '#NK723', 'Telecaller', 'admin', 'telecaller', '0', '23,January,2024', '2024-01-23 11:23:23', '2024-01-23 11:23:23'),
(10, '#PX452', 'Receptionist', 'admin', 'hospital reception for whole hospital', '0', '12,March,2024', '2024-03-12 07:55:50', '2024-03-12 09:12:08'),
(11, '#DU271', 'Coordinator', 'admin', 'doctor assistant', '0', '12,March,2024', '2024-03-12 08:56:45', '2024-03-12 09:12:22'),
(12, '#LI322', 'Personal Secretary', 'admin', NULL, '1', '20,March,2024', '2024-03-20 09:32:10', '2024-04-03 14:29:32'),
(13, '#UV343', 'Testing_', 'admin', NULL, '0', '5,April,2024', '2024-04-05 06:55:24', '2024-04-05 14:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 5),
(1, 11),
(1, 15),
(1, 16),
(1, 17),
(2, 1),
(2, 2),
(2, 5),
(2, 11),
(2, 13),
(3, 1),
(3, 2),
(3, 11),
(3, 12),
(4, 1),
(4, 2),
(4, 11),
(4, 12),
(5, 1),
(5, 11),
(5, 12),
(6, 1),
(6, 11),
(7, 1),
(7, 11),
(8, 1),
(8, 11),
(9, 1),
(9, 2),
(9, 11),
(9, 13),
(10, 1),
(10, 11),
(10, 12),
(11, 1),
(11, 2),
(11, 11),
(11, 12),
(12, 1),
(12, 11);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subTitle` longtext DEFAULT NULL,
  `image1` varchar(200) DEFAULT NULL,
  `image1title` varchar(255) DEFAULT NULL,
  `image1subtitle` longtext DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image2title` varchar(255) DEFAULT NULL,
  `image2subtitle` longtext DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image3title` varchar(255) DEFAULT NULL,
  `image3subtitle` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `subTitle`, `image1`, `image1title`, `image1subtitle`, `image2`, `image2title`, `image2subtitle`, `image3`, `image3title`, `image3subtitle`, `created_at`, `updated_at`) VALUES
(1, 'Our Services', 'Unique online services designed to improve delivery at your fingertips', '2072865903.png', 'Fast Track Your Online Consultation', 'Online Consultation is designed to Fast Track your Access\r\n                                                to our services if you don’t want to wait', '1864482916.png', 'Get copy of Your Medical Report Online', 'For pre-registered patients, You can now print your\r\n                                                update report on-line via your portal log-in', '1788804040.png', 'Book in-clinic Consultation', 'In clinic Consultation booked here are eligible for\r\n                                                special discount', '2024-04-04 12:24:45', '2024-01-02 18:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `snippets`
--

CREATE TABLE `snippets` (
  `id` int(11) NOT NULL,
  `content_title` varchar(100) DEFAULT NULL,
  `snippent_title` varchar(100) DEFAULT NULL,
  `snippent_content` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `snippets`
--

INSERT INTO `snippets` (`id`, `content_title`, `snippent_title`, `snippent_content`, `created_at`, `updated_at`) VALUES
(1, 'Reception Notes', 'EVLT-GSV', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum accusamus voluptates ab at consectetur suscipit in impedit excepturi cupiditate similique?	\r\n', '2024-04-02 07:42:38', '2024-04-02 07:42:38'),
(5, 'Reception Notes', 'EVLT-GSV', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum accusamus voluptates ab at consectetur suscipit in impedit excepturi cupiditate similique?	\r\n', '2024-04-02 07:42:38', '2024-04-02 07:42:38'),
(6, 'Reception Notes', 'EVLT-GSV', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum accusamus voluptates ab at consectetur suscipit in impedit excepturi cupiditate similique?	\r\n', '2024-04-02 07:42:38', '2024-04-02 07:42:38'),
(7, 'Reception Notes', 'EVLT-GSV', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum accusamus voluptates ab at consectetur suscipit in impedit excepturi cupiditate similique?	\r\n', '2024-04-02 07:42:38', '2024-04-02 07:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `softwares`
--

CREATE TABLE `softwares` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subTitle` longtext DEFAULT NULL,
  `imageUpload` varchar(200) DEFAULT NULL,
  `list1` varchar(255) DEFAULT NULL,
  `list2` varchar(255) DEFAULT NULL,
  `list3` varchar(255) DEFAULT NULL,
  `list4` varchar(255) DEFAULT NULL,
  `list5` varchar(255) DEFAULT NULL,
  `list6` varchar(255) DEFAULT NULL,
  `list7` varchar(255) DEFAULT NULL,
  `list8` varchar(255) DEFAULT NULL,
  `list9` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `softwares`
--

INSERT INTO `softwares` (`id`, `title`, `subTitle`, `imageUpload`, `list1`, `list2`, `list3`, `list4`, `list5`, `list6`, `list7`, `list8`, `list9`, `created_at`, `updated_at`) VALUES
(1, 'Our Unique Software', 'Changing the way of medical record management. Qastarat & Dawali Clinics medical record is a unique platform. This cloud based software has well developed features with seamless user experience and data security', '1434702467.jpg', 'Private IR staff login with resi time KPIs', 'Private patient login portal that support online booking & personal medical record review', 'Standardized eligibility assessment per patient per treatment', 'HIPPA Compliant flatform', 'API enhanced inter-professionals interactions', 'ICD diagnostics enhanced', 'Rapid auto generate medical reports', 'Enhanced workflow processing', 'Improved patient safety and care quality', '2024-04-04 12:39:31', '2024-01-02 18:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `status` enum('0','1','','') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `type`, `status`, `created_at`, `updated`) VALUES
(1, 'Not assign', '0', '2024-03-27 07:55:22', '2024-03-27 07:55:22'),
(2, 'Paid', '0', '2024-03-27 07:55:22', '2024-03-27 07:55:22'),
(3, 'Unpaid', '0', '2024-03-27 07:55:22', '2024-03-27 07:55:22'),
(4, 'Assigned to nurse', '0', '2024-03-27 07:55:22', '2024-03-27 07:55:22'),
(5, 'Assigned to Lab', '0', '2024-03-27 07:55:22', '2024-03-27 07:55:22'),
(6, 'Sample Collected', '0', '2024-03-27 07:55:22', '2024-03-27 07:55:22'),
(7, 'Report Uploaded', '0', '2024-03-27 07:55:22', '2024-03-27 07:55:22'),
(8, 'Report Approved by nurse', '0', '2024-03-27 07:55:22', '2024-03-27 07:55:22'),
(9, 'assign', '0', '2024-03-27 08:53:28', '2024-03-27 08:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `invoiceNumber` varchar(200) DEFAULT NULL,
  `patient_id` varchar(255) DEFAULT NULL,
  `doctor_id` bigint(100) UNSIGNED DEFAULT NULL,
  `task` longtext DEFAULT NULL,
  `payAmount` varchar(50) DEFAULT NULL,
  `order_summary` longtext DEFAULT NULL,
  `status` enum('pending','approved') DEFAULT 'pending',
  `form_type` varchar(255) DEFAULT NULL,
  `test_type` varchar(255) DEFAULT NULL,
  `assigned` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL DEFAULT '1' COMMENT '9. not assign\r\n1. paid\r\n2. unpaid\r\n3. unpaid\r\n4. assigned to nurse\r\n5. assigned to lab\r\n6. sample collected\r\n7. report uploaded\r\n8. report \r\n9. Approved by nurse\r\n10. Schedule appointment',
  `assignTo` varchar(100) DEFAULT NULL COMMENT 'Assign To Nurse',
  `assignToLabPerson` int(18) DEFAULT NULL,
  `assignToLab` enum('1','2','','') DEFAULT NULL,
  `assignDate` varchar(200) DEFAULT NULL COMMENT 'assign Date to nurse',
  `appoinment_date` varchar(200) DEFAULT NULL,
  `labDocument` varchar(255) DEFAULT NULL,
  `approveDocumentSts` enum('0','1','','') DEFAULT NULL COMMENT '1 is approved \r\n0 is reject',
  `paidStatus` enum('0','1','','') NOT NULL DEFAULT '0',
  `amountPaid` int(18) DEFAULT NULL,
  `datePaid` varchar(50) DEFAULT NULL,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `vatDiscount` varchar(50) DEFAULT NULL,
  `discountAmount` int(18) DEFAULT NULL,
  `toInvoiceStatus` int(18) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `invoiceNumber`, `patient_id`, `doctor_id`, `task`, `payAmount`, `order_summary`, `status`, `form_type`, `test_type`, `assigned`, `assignTo`, `assignToLabPerson`, `assignToLab`, `assignDate`, `appoinment_date`, `labDocument`, `approveDocumentSts`, `paidStatus`, `amountPaid`, `datePaid`, `paymentMethod`, `discount`, `vatDiscount`, `discountAmount`, `toInvoiceStatus`, `created_at`, `updated_at`) VALUES
(1, '883737', '104', 2, '56', NULL, NULL, 'pending', 'general_form', 'pathology', '7', '127', NULL, '1', '2024-04-03 06:42:55', '2024-04-03 06:44:44', '175738505.pdf', '1', '1', NULL, NULL, 'BACS', NULL, NULL, NULL, 1, '2024-03-30 05:16:42', '2024-03-30 05:16:42'),
(19, '5480821', '109', 2, '34', NULL, NULL, 'pending', 'general_form', 'pathology', '5', '127', 55, '1', '2024-04-04 09:31:42', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-04-04 09:30:13', '2024-04-04 09:30:13'),
(20, '52452219', '109', 2, '9', NULL, NULL, 'pending', 'general_form', 'pathology', '5', '127', NULL, '1', '2024-04-04 09:31:27', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-04-04 09:31:00', '2024-04-04 09:31:00'),
(21, '27032920', '109', 2, '57', NULL, NULL, 'pending', 'general_form', 'pathology', '5', '127', 55, '1', '2024-04-04 10:17:01', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-04-04 10:14:04', '2024-04-04 10:14:04'),
(22, '32297121', '109', 2, '60', NULL, 'dfgthjn', 'pending', 'general_form', 'radiology', '5', '127', 55, '1', '2024-04-04 10:17:30', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-04-04 10:14:54', '2024-04-04 10:14:54'),
(23, '75733322', '98', 2, '57', NULL, NULL, 'pending', 'general_form', 'pathology', '5', '127', 93, '1', '2024-04-04 10:22:33', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-04-04 10:22:26', '2024-04-04 10:22:26'),
(24, '58612923', '98', 2, '60', NULL, NULL, 'pending', 'general_form', 'radiology', '7', '127', NULL, NULL, '2024-04-04 10:23:04', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-04-04 10:22:58', '2024-04-04 10:22:58'),
(25, '43292924', '98', 2, '58', NULL, NULL, 'pending', 'general_form', 'pathology', '4', '127', NULL, NULL, '2024-04-04 10:51:01', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-04-04 10:28:22', '2024-04-04 10:28:22'),
(26, '72776425', '91', 2, '56', NULL, NULL, 'pending', 'general_form', 'pathology', '7', '127', NULL, NULL, '2024-04-04 10:37:51', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-04-04 10:37:38', '2024-04-04 10:37:38'),
(27, '32922026', '91', 2, '55', 'full payment', NULL, 'pending', 'general_form', 'pathology', '4', '127', NULL, NULL, '2024-04-04 11:03:14', NULL, NULL, NULL, '1', NULL, 'Apr 09, 2024', 'BACS', '5', '0', 2, 1, '2024-04-04 11:03:09', '2024-04-04 11:03:09'),
(28, '52245826', '91', 2, '53', NULL, NULL, 'pending', 'general_form', 'pathology', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, '12', '12', 34, 1, '2024-04-04 11:03:09', '2024-04-04 11:03:09'),
(29, '76212028', '114', 149, '58', '100', NULL, 'pending', 'general_form', 'pathology', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, 'BACS', NULL, '50', NULL, 1, '2024-04-04 13:16:54', '2024-04-04 13:16:54'),
(30, '88830528', '114', 149, '57', NULL, NULL, 'pending', 'general_form', 'pathology', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '20', NULL, 1, '2024-04-04 13:16:54', '2024-04-04 13:16:54'),
(31, '04249328', '114', 149, '56', NULL, NULL, 'pending', 'general_form', 'pathology', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '10', NULL, 1, '2024-04-04 13:16:54', '2024-04-04 13:16:54'),
(32, '41486129', '114', 149, '63', NULL, 'nbgfehuf bhfdhfdhjfr hfbdfhfhufd bhfbfduhfbhd hdsfbfdfdfsdbjfdfjfd hjfghhbfdjh njhfjhjdfh.', 'pending', 'general_form', 'radiology', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, '12', '21', NULL, 1, '2024-04-04 13:17:21', '2024-04-04 13:17:21'),
(33, '43785129', '114', 149, '62', NULL, 'nbgfehuf bhfdhfdhjfr hfbdfhfhufd bhfbfduhfbhd hdsfbfdfdfsdbjfdfjfd hjfghhbfdjh njhfjhjdfh.', 'pending', 'general_form', 'radiology', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, '10', '12', NULL, 1, '2024-04-04 13:17:21', '2024-04-04 13:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `TeamMembers`
--

CREATE TABLE `TeamMembers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `social_fb` varchar(255) DEFAULT NULL,
  `social_twitter` varchar(255) DEFAULT NULL,
  `social_instagram` varchar(255) DEFAULT NULL,
  `social_linkedin` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `TeamMembers`
--

INSERT INTO `TeamMembers` (`id`, `name`, `title`, `image_url`, `social_fb`, `social_twitter`, `social_instagram`, `social_linkedin`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Saif Alzaabi MD, FRCPC, DABR', 'CEO Chief Executive Officer', '709874490.png', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://www.instagram.com/', 'https://www.linkedin.com/signup', '2024-04-04 13:33:58', '2024-04-04 13:33:58'),
(2, 'Amjad Al Maroqui', 'Public Relation Officer', '1255915907.png', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://www.instagram.com/', 'https://www.linkedin.com/signup', '2024-04-04 13:33:58', '2024-04-04 13:33:58'),
(3, 'Alaa Alkhawaga', 'Registered Nurse', '451540029.png', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://www.instagram.com/', 'https://www.linkedin.com/signup', '2024-04-04 13:33:58', '2024-04-04 13:33:58'),
(4, 'Reem Alzaabi', 'Call center/ Receptionist', '1053697655.png', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://twitter.com/?lang=en', 'https://www.linkedin.com/signup', '2024-04-04 13:33:58', '2024-04-04 13:33:58'),
(5, 'Mohammed Almahrezi', 'Public relation officer', '962001572.png', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://twitter.com/?lang=en', 'https://www.linkedin.com/signup', '2024-04-04 13:33:58', '2024-04-04 13:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `telecallers`
--

CREATE TABLE `telecallers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nurses_id` varchar(100) DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_verified` enum('1','0') DEFAULT '0',
  `patient_profile_img` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `post_code` bigint(20) DEFAULT NULL,
  `mobile_no` bigint(20) DEFAULT NULL,
  `sirname` varchar(12) DEFAULT NULL,
  `birth_date` varchar(255) DEFAULT NULL,
  `gendar` enum('male','female','other') DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `landline` varchar(50) DEFAULT NULL,
  `specialty` varchar(150) DEFAULT NULL,
  `qualifications` longtext DEFAULT NULL,
  `experience` varchar(150) DEFAULT NULL,
  `working_hours` varchar(150) DEFAULT NULL,
  `languages_spoken` varchar(150) DEFAULT NULL,
  `lincense_no` varchar(150) DEFAULT NULL,
  `document_type` varchar(100) DEFAULT NULL,
  `patient_id` varchar(255) DEFAULT NULL,
  `gp` varchar(255) DEFAULT NULL,
  `kin` varchar(255) DEFAULT NULL,
  `policy_no` varchar(255) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `telecallers`
--

INSERT INTO `telecallers` (`id`, `nurses_id`, `title`, `name`, `email`, `is_verified`, `patient_profile_img`, `role`, `email_verified_at`, `remember_token`, `post_code`, `mobile_no`, `sirname`, `birth_date`, `gendar`, `street`, `town`, `country`, `landline`, `specialty`, `qualifications`, `experience`, `working_hours`, `languages_spoken`, `lincense_no`, `document_type`, `patient_id`, `gp`, `kin`, `policy_no`, `additional_info`, `tags`, `password`, `created_at`, `updated_at`) VALUES
(1, 'AI42122', 'Ms', '1234', '1234@gmail.com', '0', NULL, 'user', NULL, NULL, 1234, 7245454567, NULL, NULL, NULL, '1234', '1234', 'TF', '1234', '1234', '1234', '1234', '1234', '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 17:37:17', '2024-01-15 17:37:17'),
(2, 'AI41342', 'Dr', 'Manish 123', 'admin@gmail.com', '0', NULL, 'user', NULL, NULL, 431343, 9898987656, NULL, '01/31/2024', 'male', '431343', 'noida', 'India', '11', '123', '123', '123', '123', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 17:47:56', '2024-01-16 17:34:41'),
(4, 'AI67535', 'Mr', 'manish d', 'admin22@gmail.com', '0', NULL, 'user', NULL, NULL, 251201, NULL, NULL, '01/31/2024', 'male', 'muzaffarnagar', 'noida', 'India', '123456432', '12345432', '124', '1', '123', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-16 17:10:48', '2024-01-16 17:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subTitle` longtext DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `videoFile` varchar(200) DEFAULT NULL,
  `imageUpload` varchar(200) DEFAULT NULL,
  `Womenhealbetter` varchar(255) DEFAULT NULL,
  `Womenhealbettercontent1` varchar(255) DEFAULT NULL,
  `Womenhealbettercontent2` varchar(255) DEFAULT NULL,
  `Womenhealbettercontent3` varchar(255) DEFAULT NULL,
  `Womenhealbettercontent4` varchar(255) DEFAULT NULL,
  `Womenhealbettercontent5` varchar(255) DEFAULT NULL,
  `Womenhealbettercontent6` varchar(255) DEFAULT NULL,
  `Menhealbetter` varchar(255) DEFAULT NULL,
  `Menhealbettercontent1` varchar(255) DEFAULT NULL,
  `Menhealbettercontent2` varchar(255) DEFAULT NULL,
  `Menhealbettercontent3` varchar(255) DEFAULT NULL,
  `Menhealbettercontent4` varchar(255) DEFAULT NULL,
  `Menhealbettercontent5` varchar(255) DEFAULT NULL,
  `Menhealbettercontent6` varchar(255) DEFAULT NULL,
  `Menwomenhealbetter` varchar(255) NOT NULL,
  `Menwomenhealbettercontent1` varchar(255) DEFAULT NULL,
  `Menwomenhealbettercontent2` varchar(255) DEFAULT NULL,
  `Menwomenhealbettercontent3` varchar(255) DEFAULT NULL,
  `Menwomenhealbettercontent4` varchar(255) DEFAULT NULL,
  `Menwomenhealbettercontent5` varchar(255) DEFAULT NULL,
  `Menwomenhealbettercontent6` varchar(255) DEFAULT NULL,
  `regenerativetherapies` varchar(255) DEFAULT NULL,
  `regenerativetherapiescontent1` varchar(255) DEFAULT NULL,
  `regenerativetherapiescontent2` varchar(255) DEFAULT NULL,
  `regenerativetherapiescontent3` varchar(255) DEFAULT NULL,
  `regenerativetherapiescontent4` varchar(255) DEFAULT NULL,
  `regenerativetherapiescontent5` varchar(255) DEFAULT NULL,
  `regenerativetherapiescontent6` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`id`, `title`, `subTitle`, `video_url`, `videoFile`, `imageUpload`, `Womenhealbetter`, `Womenhealbettercontent1`, `Womenhealbettercontent2`, `Womenhealbettercontent3`, `Womenhealbettercontent4`, `Womenhealbettercontent5`, `Womenhealbettercontent6`, `Menhealbetter`, `Menhealbettercontent1`, `Menhealbettercontent2`, `Menhealbettercontent3`, `Menhealbettercontent4`, `Menhealbettercontent5`, `Menhealbettercontent6`, `Menwomenhealbetter`, `Menwomenhealbettercontent1`, `Menwomenhealbettercontent2`, `Menwomenhealbettercontent3`, `Menwomenhealbettercontent4`, `Menwomenhealbettercontent5`, `Menwomenhealbettercontent6`, `regenerativetherapies`, `regenerativetherapiescontent1`, `regenerativetherapiescontent2`, `regenerativetherapiescontent3`, `regenerativetherapiescontent4`, `regenerativetherapiescontent5`, `regenerativetherapiescontent6`, `created_at`, `updated_at`) VALUES
(1, 'Our Unique Treatments', 'Unique treatments of tomorrow delivered to you today by top rated well\r\n                            recognized professionals, thriving to help you heal better\r\nWe have developed standardized protocols to assess your eligibility to each and\r\n                            every treatment option, in order to deliver best customized care fit to you', 'https://www.youtube.com/embed/iuLKi84W4F0?si=fDkcliYZEo87X6dR', '1294820716.mp4', '91493534.png', 'Women heal better', 'Pelvic Congestion Embolization', 'Brest tumors Ablation', 'Uterine Fibroid Ablation', 'Uterine Fibroids Embolization', 'Adenomyosis Embolization', 'Pelvic Congestion Embolization', 'Men heal better', '0', 'Erectile Dysfunction', 'Coming soon', 'Prostate Embolization', '0', 'Varicocele Embolization', 'Illum qui tempore', 'Quas et consectetur', 'Non voluptas reprehe', 'Ducimus eum iusto n', 'Quae dolorem et adip', 'Exercitationem quia', 'Ex incidunt minim m', 'Regenerative Therapies', 'Intra-venous Vitamins', 'ozone therapies', 'Autologous stem cells therapies', 'Coming Soon', 'Autologous stem cells therapies', 'Intra-venous supplements', '2024-04-04 12:15:25', '2024-01-02 18:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `doctor_id` int(18) DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_verified` enum('1','0') DEFAULT '0',
  `patient_profile_img` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `post_code` varchar(20) DEFAULT NULL,
  `mobile_no` bigint(20) DEFAULT NULL,
  `sirname` varchar(12) DEFAULT NULL,
  `birth_date` varchar(255) DEFAULT NULL,
  `gendar` enum('male','female','other') DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `landline` varchar(50) DEFAULT NULL,
  `document_type` varchar(100) DEFAULT NULL,
  `customFile` varchar(255) DEFAULT NULL,
  `patient_id` varchar(255) DEFAULT NULL,
  `gp` varchar(255) DEFAULT NULL,
  `kin` varchar(255) DEFAULT NULL,
  `policy_no` varchar(255) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `id_proof` varchar(255) DEFAULT NULL,
  `status` enum('0','1','','') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `doctor_id`, `title`, `name`, `email`, `is_verified`, `patient_profile_img`, `role`, `email_verified_at`, `password`, `remember_token`, `post_code`, `mobile_no`, `sirname`, `birth_date`, `gendar`, `street`, `town`, `country`, `landline`, `document_type`, `customFile`, `patient_id`, `gp`, `kin`, `policy_no`, `additional_info`, `tags`, `id_proof`, `status`, `created_at`, `updated_at`) VALUES
(2, NULL, 2, 'Dr', 'hareram', 'patient@gmail.com', '0', '528594963.png', 'user', NULL, '$2y$12$BCgAP2bEfmN.A9qio7/aAOuGX9wANQkOYdBJeiX1iZ314EM5tP3x2', 'hb2TwEiD0DAGBDhl4ZeFb0X80I69m1wc30K2ZNtocsYFml8GGH2RviMWL4s3', '1234', 1234567890, 'mr', '04 Dec, 2000', 'male', 'noida', 'noida', 'Algeria', '987654321', 'Address proof', NULL, 'MA941402', '98765432100', 'kin test', 'sunny po', 'okkk', '<div class=\"category\">ssss<i class=\"remove-category fas fa-times\"></i></div>', NULL, '1', '2023-12-19 20:57:59', '2024-04-02 18:23:56'),
(4, NULL, 2, NULL, 'hareram 2', 'patient12@gmail.com', '0', NULL, 'user', NULL, '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', NULL, '90909', 990900909, 'dr', '06 Dec, 1998', 'male', 'noida', 'noida 1', 'Albania', '909090909', 'Address proof', NULL, 'pat12345', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-12-20 01:14:53', '2023-12-20 01:14:53'),
(33, NULL, 2, NULL, 'lalit', 'lalit1233@gmail.com', '0', NULL, 'user', NULL, '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', NULL, '91008', 8987365432, 'Mrs', '10 Dec, 2000', 'female', 'noida 3', 'noida 4', 'American Samoa', '998765439', 'Passport', NULL, 'lait00124560', '92765432100', 'kin test', '123456780', 'ok...... testing', '<div class=\"category\">ok<i class=\"remove-category fas fa-times\"></i></div><div class=\"category\">TR<i class=\"remove-category fas fa-times\"></i></div><div class=\"category\">DE<i class=\"remove-category fas fa-times\"></i></div>', NULL, '1', '2023-12-21 12:40:45', '2024-01-09 11:50:36'),
(34, NULL, 2, NULL, 'Martha Leach', 'fovaq@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$O5brMtCBdvy.zizxpOlJguZwEayIB80WSnOR1QZetOcPan7SgFwJK', NULL, '123456789', 909098888, 'Professor', '09 Mar, 1997', 'male', 'Aliquip accusantium', 'Placeat nulla eaque', 'Armenia', '1234567890', 'Address proof', NULL, 'MA836196', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
(35, NULL, 2, NULL, 'Clarke Macdonald', 'lesihyzun@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$1V8oAMsCw1OHg9e8rbna4uJCi7bLDxVMVLZ142scZogd1EOqmHqzS', NULL, '1234', 8888788787, 'Lady', '15 Sep, 1972', 'female', 'Sunt elit ut culpa', 'Consectetur ratione', 'Aruba', '12345678', 'Address proof', NULL, 'MA509999', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-01-09 05:56:22', '2024-01-09 05:56:22'),
(36, NULL, 2, NULL, 'Nyssa Mcdonald', 'bawijakit@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$FJi/5cnVLj1CEB48hqkElOg5CPsYTAy/.uMoavCf.SLpEY/1ujUrS', NULL, '123456', 909000000, 'Sir', '03 Mar, 2003', 'female', 'Accusantium sapiente', 'Sapiente non repelle', 'Albania', '1234567', 'Address proof', NULL, 'MA261804', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-01-09 06:44:00', '2024-01-09 06:44:00'),
(37, NULL, 2, NULL, 'hareram kumar', 'doctor2iii@gmail.com', '0', NULL, 'user', NULL, '$2y$12$ESsmd3pzlDWVm1l5jrARlevUfWkNw2.Tq3NlIDDUZK4lAQu8alUJ6', NULL, '1234', 39087654320, 'mr', '01 Jan, 2024', 'male', 'noida', 'noida', 'Åland Islands', '12534567890', 'Passport', NULL, 'MA210964', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-01-09 06:45:49', '2024-01-09 06:45:49'),
(61, NULL, 2, 'Mr', 'User', 'user@gmail.com', '0', NULL, 'user', NULL, '$2y$12$LPKjNTzh1VJHMgkRGRjQ3u9HRXi6nzuyzc0DVPDMUq44SfURLaTY2', NULL, '989898', 4898765430, NULL, '12 Jan, 1999', NULL, NULL, NULL, 'CX', '0987654321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-01-17 07:33:02', '2024-01-23 20:03:15'),
(65, NULL, 2, 'Dr', 'Eden Watkins edit', 'wazig@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$MTuwfMHJF6aGHDlvK6PgoOKrDyhStUdUyRcb44IF5jbs5AUp2/fE2', NULL, '999', 917654321, 'mr', '12 Jan, 2020', 'male', 'Officiis culpa inci', 'Facilis rem enim acc', 'Algeria', '6209090990', 'Passport', NULL, 'MA95613', 'Tempor dolore praese', 'kin test', 'sunny po', 'ok', '<div class=\"category\">Fugit at doloribus <i class=\"remove-category fas fa-times\"></i></div><div class=\"category\">ok<i class=\"remove-category fas fa-times\"></i></div>', NULL, '1', '2024-01-23 19:08:24', '2024-01-30 16:41:35'),
(66, NULL, 2, 'Mr', 'Caesar Carrillo', 'cebogewosu@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$E7YMyFJ.jzwPlM3troMqluBE6reAnd3B2cHY9DHx3MQSEb1DeyQCa', NULL, '12345', 89098765432, NULL, '12 Jan, 2020', 'female', 'Duis reprehenderit c', 'Dolores nulla eaque', 'AD', '76', 'Passport', NULL, 'MA888669', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-01-30 16:48:55', '2024-01-30 17:08:02'),
(67, NULL, 2, 'Mr', 'Stella Nolan', 'ludaxazeru@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$myuExsu3bRKqHZTq0KZtxOAvevsepzIaz4NIhJhpS5hsr9A.1/aoa', NULL, '908', 9087654321, NULL, '01 Feb, 2000', 'female', 'Molestias iure quos', 'Quisquam in labore v', 'CY', '91', NULL, NULL, 'MA623726', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-01-30 18:40:47', '2024-02-22 18:17:04'),
(75, NULL, 2, NULL, 'Sonia Morrison', 'tuhodibyp@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$W8BwJdl9QAJ3V9F0Vg2s3.M8HFFt.IMBXh64jhb4O5zDYjDPsfKym', NULL, 'Quas', 8123456781, NULL, NULL, 'female', 'Et tempora magnam vo', 'Corporis assumenda m', 'India', NULL, 'Address Proof', NULL, 'MA457132', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-23 02:04:45', '2024-02-23 02:04:45'),
(76, NULL, 2, NULL, 'Lars Riddle', 'tyzadezyle@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$9wxHBZ3NVHP79OwOwIjvvO8SeRbweHwYehu5mbv46W9siO09Yrswy', NULL, 'Dignis', 9087654329, NULL, NULL, 'female', 'Sed magni sint null', 'Dolorum nemo quam un', 'BH', NULL, 'Passport', NULL, 'MA588595', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-23 02:05:41', '2024-02-23 02:05:41'),
(77, NULL, 2, NULL, 'Azalia Reid', 'cyqeko@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$rr83uMJWwrBH/t9HsyJiwOjA7NATWelxyRS1ERCye316jR4rOEblG', NULL, '12345', 9098765433, NULL, NULL, 'other', 'Culpa pariatur Cons', 'Nobis labore volupta', 'India', NULL, 'Address Proof', NULL, 'MA146024', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-23 02:16:19', '2024-02-23 02:16:19'),
(78, NULL, 2, NULL, 'Julie Fleming', 'votutetet@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$q1HXOg72dlAFgpKbcMS3m.3sd6saJx8SbbouGfZRtH0Tmd3M52ksa', NULL, 'Aut in', 6098765430, NULL, NULL, 'other', 'Exercitation rem har', 'Ut commodi accusanti', 'ER', NULL, 'Address Proof', NULL, 'MA24098', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-23 02:18:09', '2024-02-23 02:18:09'),
(79, NULL, 2, NULL, 'Bryar Waller', 'qizisini@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$c.WwRVmV7cBabJ6BTeWq3OXEcH2MIrKvBwPl/leTK.rG5.RiMMjnu', NULL, 'Velit', 8098765431, NULL, '21 Feb, 2024', 'male', 'Fugiat non voluptate', 'Et officiis ut eveni', 'NO', NULL, 'Passport', NULL, 'MA147897', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-23 02:21:04', '2024-02-23 02:21:04'),
(80, NULL, 2, NULL, 'Bruno Landry', 'dakagaxy@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$.fxInyRRMeQpbaDoXMhrx.FWHW/4PJ7RY2H0qILF..BB3nVZdXqYS', NULL, 'Quae', 8123456788, NULL, '21 Feb, 2024', 'male', 'Voluptas esse lauda', 'Pariatur Velit temp', 'India', NULL, 'Address Proof', NULL, 'MA509543', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-23 02:27:52', '2024-02-23 02:27:52'),
(81, NULL, 2, NULL, 'jiug', 'iuytfd@khgf.in', '0', NULL, 'user', NULL, '$2y$12$LT6v57W67UIzBFJYdQdMrefuoDVzYX3wopwFZxTJ2hxLhZVNTMG26', NULL, NULL, 8465985845, NULL, '04 Feb, 2024', 'female', NULL, NULL, 'India', NULL, NULL, NULL, 'MA269238', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-23 14:46:04', '2024-02-23 14:46:04'),
(82, NULL, 2, NULL, 'kjhgf', 'iuytfd@khgf.com', '0', NULL, 'user', NULL, '$2y$12$OCRLrz902spGbaFffRdDF.95V4.ZkhOZ07LM4/0K3VljheRmrKNBi', NULL, 'poiuygf', 8465998652, NULL, '05 Feb, 2024', 'male', 'oikhgf', 'ijuygf', 'India', '986598659865', 'Passport', NULL, 'MA726290', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-23 14:50:11', '2024-02-23 14:50:11'),
(83, NULL, 2, NULL, 'Audrey David', 'kyxuxozido@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$53ZBMtZQXK7PXxpv9I8eiec6ON.HBzJa5ovmlIIC0I0obpb9ez0z2', NULL, '00000', 79865000874, NULL, '17 Nov, 1993', 'male', 'Repudiandae accusant', 'Sed esse ullam labo', 'India', '000000000000', 'Address Proof', NULL, 'MA707451', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-23 14:52:18', '2024-02-23 14:52:18'),
(84, NULL, 2, NULL, 'Gretchen Bush', 'tasakinyg@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$kWAODh/HasOxlYUdNpf8K.r0vvRyfitN6vKjJ96Ee97Efp8Ax.1BK', NULL, '1223225', 0, NULL, '15 Feb, 2024', 'other', 'Sed facere qui ut ha', 'Blanditiis ut volupt', 'India', '00000000946', 'Passport', NULL, 'MA239297', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-23 14:53:17', '2024-02-23 14:53:17'),
(86, NULL, 2, NULL, 'kiuygf', 'kljhgf@lkjhg.com', '0', NULL, 'user', NULL, '$2y$12$uVeLlfOP5CD4C5zr0SNWVuUsLgHHRag2dd1KlFN62wWMN5jv.dF.K', NULL, NULL, 846549865486, NULL, '06 Feb, 2024', 'female', NULL, NULL, 'India', NULL, NULL, NULL, 'MA544562', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-23 14:59:30', '2024-02-23 14:59:30'),
(87, NULL, 2, 'Mr', 'Nayda Mason', 'nykilop@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$zUD9fKwJn7CHfw86VqZeVOwHNonG3bR.KH5UQGz4x/HvgAXg2wc7u', NULL, '54321', 48598652559, NULL, '17 Jul, 2001', 'female', 'Quis nihil corrupti', 'Assumenda sit minus', 'CY', '456496565685', NULL, NULL, 'MA177003', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-23 15:02:43', '2024-02-23 15:51:08'),
(88, NULL, 2, NULL, 'Illana William', 'gihy@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$9oUzmJG57aR1YBw.WKzup.FI1yzYKkae9Yr2URjY3PttQoMZfSMXO', NULL, 'Volupt', 8098765409, NULL, '14 Jun, 2004', 'female', 'Delectus repudianda', 'Velit qui id vero is', 'India', NULL, 'Passport', NULL, 'MA297781', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-27 13:02:00', '2024-02-27 13:02:00'),
(89, NULL, 2, NULL, 'Kenyon Cohen', 'titilon@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$p3kun1y/2ue/tmGH5QtPXe90vUhzsbSmRBtvEAjbr7DO5xleza35m', NULL, 'Quae3', 9087654323, NULL, '18 Sep, 1977', 'male', 'Mollitia qui tempor', 'Sit alias voluptate', 'BB', NULL, 'Passport', NULL, 'MA269482', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-27 13:03:10', '2024-02-27 13:03:10'),
(90, NULL, 2, 'Mrs', 'Casey Bradley', 'symebaloda@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$SKXHmhDItGe.U2N5jwAGyu177f0icbutbJr4CpHUKfPXP2bXq4RDC', NULL, 'Cillum', 6098765439, NULL, '23 Jul, 2018', 'male', 'Temporibus mollit la', 'Aut aut praesentium', 'CW', NULL, 'Address proof', NULL, 'MA103741', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-27 13:03:51', '2024-02-27 13:32:56'),
(91, NULL, 2, NULL, 'jasss', 'kkkk@gmail.com', '0', NULL, 'user', NULL, '$2y$12$WuD6bstQD6sObSHnDICi7.1Y0qeLWQTv01AnU46qu4vlTM/FBEiwK', NULL, '8523', 9638527419, NULL, '23 Feb, 2000', 'male', NULL, NULL, 'India', NULL, NULL, NULL, 'MA863864', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-27 13:05:04', '2024-02-27 13:05:04'),
(92, NULL, 2, 'Mr', 'jhjvukyb', 'JBHJ@YOPMAIL.COM', '0', NULL, 'user', NULL, '$2y$12$N4oW4xAppLMioy7B7cNo5.t1mdU6k7KPfjHyb82ccciQUpL4L0q7i', NULL, NULL, 8624895135, NULL, '31 Jan, 2024', 'male', NULL, NULL, 'CY', NULL, NULL, NULL, 'MA471341', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-27 13:07:28', '2024-02-27 13:35:51'),
(95, NULL, 2, 'Mr', 'JHBGU', 'ikjhg@yopmail.com', '0', NULL, 'user', NULL, '$2y$12$nDBRvY1JGzTX8wox3mqd8.iUMT52XqwJFlVBS9jgsCANSOP3dqfAG', NULL, NULL, 741852963023322, NULL, '06 Feb, 2024', 'male', NULL, NULL, 'CY', NULL, NULL, NULL, 'MA26284', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-27 13:19:04', '2024-02-27 14:02:50'),
(96, NULL, 2, NULL, 'jhjvukyb', '741kjh@gmail.com', '0', NULL, 'user', NULL, '$2y$12$0pkqIJKf.tPTboLzV386OeQQFc80iZPNx7o3a96oG42KzBcdAPCSy', NULL, '8520', 74185285296, NULL, '27 Feb, 2024', 'female', 'kjhgfc', 'iuhygtgfdc', 'India', '9638527418754', 'Passport', NULL, 'MA899765', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-27 13:23:12', '2024-02-27 13:23:12'),
(97, NULL, 2, 'Mr', 'jhjvukyb', 'kkkjhgkk@gmail.com', '0', NULL, 'user', NULL, '$2y$12$Sj3IlkIzrYanl65/xTe.1ukON/jaw/3I9H2feXcF29KfAeIqkAkn.', NULL, '123654', 741852963023, NULL, '06 Feb, 2024', 'female', NULL, NULL, 'CY', NULL, NULL, NULL, 'MA176244', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-27 13:39:12', '2024-02-27 14:13:04'),
(98, NULL, 2, 'Mr', 'jaspreet', 'ainupdate@gmail.com', '0', NULL, 'user', NULL, NULL, NULL, '8529631', 8965846584564, 'Dr', '28 Feb, 2024', 'female', 'Facilis dolorem faci', 'Doloremque itaque et', 'CY', '8521236540', 'Address proof', NULL, 'MA098864', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-27 07:28:35', '2024-02-28 17:08:14'),
(100, NULL, 2, 'Dr', 'basant', 'tukyzujol@mailinator.com', '0', NULL, 'user', NULL, NULL, NULL, 'Explicab', 7896325410, NULL, '19 Sep, 1984', 'other', 'Quis voluptate rerum', 'Enim a qui amet in', 'CY', '87654345678', 'Passport', NULL, 'MA159166', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-02-28 17:19:04', '2024-02-28 20:06:26'),
(101, NULL, 2, NULL, 'martin', 'martin@yopmail.com', '0', NULL, 'user', NULL, '$2y$12$pLFtxQVGat8iflyMwicqaucbo0HCVPevVE7p.Q1J.YMM1cyjH43jC', NULL, '83654', 9648746546534, 'mr', '11 Oct, 1991', 'male', 'down town st. no. 1 near cafe', 'WT', 'American Samoa', '96543163549865', 'Address proof', NULL, 'MA459858', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-03-08 06:27:38', '2024-03-08 06:27:38'),
(102, NULL, 133, 'Mr', 'Abhi-patient', 'abhi@yopmail.com', '0', '44c48f7f40e17478bee0a91e7176e7ec.png', 'user', NULL, NULL, NULL, '6565', 788889865555, NULL, '01 Jan, 2019', 'male', 'Noida Delhi', 'Delhi', 'India', '6565656565656', 'Passport', NULL, 'MA911697', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-03-13 18:58:36', '2024-04-03 19:34:10'),
(103, NULL, 2, 'Mrs', 'Manish', 'rajn@gmail.com', '0', NULL, 'user', NULL, '$2y$12$B8FDlXUUYlgRsij38JzLC.EL0jYoxp/tPP/RVj7nbCucbLggfcq9i', NULL, '12345432', 8587878969, NULL, '14 Mar, 2024', 'female', '23456543', '123456643', 'India', '123454321234', 'Passport', NULL, 'MA698122', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-03-20 17:03:22', '2024-03-20 17:03:22'),
(104, NULL, 2, 'Dr', 'Alan Jimenez', 'tykiqesa@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$RlNGSIppgr44HXA3orgM3uyl4kabcd1FiHXqdsWgCkaE87P8Ox/8S', NULL, 'Rerum eu', 123453211234, NULL, '12 Jan, 1975', 'other', 'In ea excepturi dolo', 'Possimus quasi occa', 'India', '12341234323232', 'Passport', NULL, 'MA855679', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-03-20 17:07:07', '2024-03-20 17:07:07'),
(105, NULL, 2, 'Sir', 'Duncan William', 'pugiki@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$LQPetghiarrGsDKQFqOH0.JKsX2FzFMa306VaSp/bSYzzSwfpBMNO', NULL, 'Est irur', 12345678987, NULL, '02 Oct, 1996', 'male', 'Rerum voluptatem ni', 'Et modi ipsum aliqui', 'TW', '1234567876543', 'Passport', NULL, 'MA497060', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-03-20 17:11:32', '2024-03-20 17:11:32'),
(106, NULL, 13, 'Dr', 'Andrew Chapman', 'madyn@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$ObC4/8ZvEv.TEY7vUt1kBO7oeGZ3SxFKrMMYRDu2N3LU5ygrH7JWq', NULL, 'Nobis se', 123456787632, NULL, '25 Jan, 1972', 'male', 'Dolor voluptate prae', 'Ipsam sed ipsa dele', 'India', '1234567654323', 'Address Proof', NULL, 'MA900617', NULL, NULL, NULL, NULL, NULL, '', '1', '2024-03-20 17:15:16', '2024-03-20 17:15:16'),
(107, NULL, 26, 'Miss', 'Blaze Walters updated', 'sokygumi@mailinator.com', '0', NULL, 'user', NULL, NULL, NULL, 'Non ut e', 123456789876, NULL, '09 May, 1991', 'other', 'Corporis provident', 'In incididunt pariat', 'CY', '12345676543', NULL, NULL, 'MA65319', NULL, NULL, NULL, NULL, NULL, '1f7045733d642767c821d86eba38bf42.gif', '1', '2024-03-20 17:19:21', '2024-03-20 18:19:19'),
(108, NULL, 2, NULL, 'Sarah Tran', 'macu@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$8N/D7BjgnATsoOaxjpTWw.jY7pV4E.NvXC/Jl60aa6lUDqaHHLxQK', NULL, '2345', 40987654321, 'Sir', '02 Oct, 1978', 'female', 'Consequatur Eius ni', 'Est fugiat tempora', 'Aruba', 'Harum in et ipsam mo', 'Address proof', NULL, 'MA821123', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-03-29 10:02:15', '2024-03-29 10:02:15'),
(109, NULL, 2, NULL, 'Ori Farmer', 'gonirufup@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$I6U3m/3JLyjz2NKrSW0FG.zgLszS02cgMOBkodZnt5j/38Hoje3hG', NULL, '12323', 12345678998, '31', '29 Oct, 2012', 'female', 'Officia ratione aute', 'Aperiam repellendus', 'American Samoa', 'Maiores fugit est', 'Passport', NULL, 'MA016311', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-03-29 12:22:18', '2024-03-29 12:22:18'),
(110, NULL, 7, NULL, 'Lydia Hutchinson', 'xocabosyx@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$KyXo9dNkqpcS31Rni8zBWeMOL/O4Zpy0Cw641W.PxWuesP4gBqbwu', NULL, '111', 3333333333333, 'Miss', '03 Jun, 2006', 'male', 'Autem laudantium fu', 'Ut et necessitatibus', 'Algeria', 'Est aut a ut quo vo', 'Address proof', NULL, 'MA254321', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-03-29 12:25:54', '2024-03-29 12:25:54'),
(111, NULL, 136, 'Lady', 'Pamela Carrillo', 'nydesi@mailinator.com', '0', NULL, 'user', NULL, NULL, NULL, 'Laborum', 3839086737, NULL, '29 May, 2019', 'male', 'Dolores et nisi iust', 'Rem praesentium expl', 'India', '3926047676', NULL, NULL, 'MA568401', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-04-02 12:23:06', '2024-04-03 17:49:13'),
(112, NULL, 133, 'Mr', 'Alex', 'alex@yopmail.com', '0', 'f923482d95a193498182ae69b00e165f.png', 'user', NULL, NULL, NULL, '96523', 7412548758, NULL, '04 Jan, 2022', 'male', 'kmjhgf', 'njhbb', 'India', '78451259623', 'Passport', NULL, 'MA475907', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-04-03 16:52:35', '2024-04-03 19:33:30'),
(113, NULL, 133, 'Mr', 'Patient04/04', 'patient@yopmail.com', '0', '', 'user', NULL, '$2y$12$GOMBcjurPopz0bgNDlg.EeIUJKA761ZEcsgWJcaeNE2NhRb6vyOuO', NULL, '7458966', 999999999999, NULL, '01 Dec, 2022', 'male', 'Noida NCR', 'TEST Town', 'India', '999999999999', NULL, NULL, 'MA936037', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-04-04 13:00:58', '2024-04-04 13:00:58'),
(114, NULL, 149, 'Mr', 'Dary', 'dary@gmail.com', '0', '1132553391.jpg', 'user', NULL, NULL, NULL, '5454784', 98989898585, 'Miss', '25 Apr, 2024', 'female', 'UK', 'california', NULL, '9999999999999', 'Passport', NULL, 'MA818581', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-04-04 12:53:14', '2024-04-04 20:00:40'),
(115, NULL, 2, 'Mr', 'hareram upload', 'hareramdoc1@gmail.com', '0', '1433911186.png', 'user', NULL, NULL, NULL, '1234', 9987654888, 'mr', '09 Nov, 2000', 'male', 'noida', 'noida', NULL, '0998765432', 'Passport', '851169877.jpeg', 'MA220739', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-04-05 07:44:58', '2024-04-08 16:34:30'),
(124, NULL, NULL, NULL, 'Robert Wilkins', 'kuxibebugi@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$dbmDBoUGqeO/ABXbzSm6v.a6gzlHeYyObbea1GnrjC5CA0QfaXVIi', NULL, 'Praesentium veritati', 409876543213, 'Mr', '27 Nov, 1988', 'male', 'Reiciendis maxime re', 'Pariatur Et volupta', 'American Samoa', '34', NULL, NULL, 'MA778456', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-04-08 10:58:46', '2024-04-08 10:58:46'),
(125, NULL, NULL, NULL, 'Keith Sanders', 'ribov@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$PGt6tyT80nUKfTQP67mfR.qPSYERUvIE8azc28NT.NThQf1Y.zQxG', NULL, 'Atque numquam esse s', 82, 'Mrs', '31 Oct, 1989', 'female', 'Est cupidatat dolor', 'Suscipit dolorem qua', 'Afghanistan', '45', NULL, NULL, 'MA202067', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-04-08 11:03:33', '2024-04-08 11:03:33'),
(126, NULL, NULL, NULL, 'Shelley Medina', 'pexivisog@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$lKqQeTSXuk5hH1hSVguC8ulqbYCiBmcE.rGiJfd2GQ2mvy6UwaOyK', NULL, 'Esse amet voluptas', 88, 'Lord', '11 Aug, 2005', 'male', 'Excepturi eum dolor', 'Magnam pariatur Off', 'Argentina', '90', NULL, NULL, 'MA341875', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-04-08 11:04:54', '2024-04-08 11:04:54'),
(127, NULL, NULL, NULL, 'Lillith Benson', 'caxexyn@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$b8trL7WXf6RqhEVyuin6uuIz0W.5KvxCAHh/cEPPZ/n1w4YhdpA9i', NULL, 'Quia dolores sint nu', 65, 'Capt', '19 Oct, 2005', 'female', 'Unde aliquam alias e', 'Sapiente eos deserun', 'Afghanistan', '78', NULL, NULL, 'MA727941', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-04-08 11:06:05', '2024-04-08 11:06:05'),
(128, NULL, NULL, NULL, 'Noah Tate', 'wakabypu@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$gxFrHQPBBn/sQn5ee1KfE.fyfG4GUqMR0omov8NBYCAO5yQqsWnBC', NULL, 'Neque esse vel asper', 6, 'Professor', '03 Dec, 2007', 'male', 'Molestiae labore vit', 'Rem voluptatum dolor', 'Afghanistan', '33', NULL, NULL, 'MA090955', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-04-08 11:24:24', '2024-04-08 11:24:24'),
(129, NULL, NULL, NULL, 'Madaline Burnett', 'lyxutyc@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$0o0XB5qzau3OHE3lLXooAeEDtQdfTzBeYmninZ7f8bLknvo8Go2Wq', NULL, 'Labore est facere a', 91, 'Dr', '27 Nov, 2015', 'male', 'Dolore qui ut conseq', 'Dolor sunt itaque el', 'Argentina', '12', NULL, NULL, 'MA823253', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-04-08 11:26:12', '2024-04-08 11:26:12'),
(130, NULL, NULL, NULL, 'Michelle Warren', 'ceba@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$dq2rcjXOophPASMfaa1cTOUbC52ZsmMWidquBcKN2S/X6GxyyPEzW', NULL, 'Est cupiditate Nam', 10, 'Capt', '06 Sep, 1992', 'female', 'Consequatur Incidid', 'Sit quidem laudantiu', 'American Samoa', '48', NULL, NULL, 'MA775492', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-04-08 11:27:20', '2024-04-08 11:27:20'),
(131, NULL, NULL, NULL, 'Rudyard Stewart', 'jofisonoca@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$ARY6ho31o25H5eTlp7hVc.efAkRZ1MFgmPuPhyyUs4UfNw7gCzsaK', NULL, 'Ut aut sit sit asp', 92, 'Mr', '17 Jul, 1996', 'female', 'Iusto unde consequat', 'Sit expedita quia v', 'Anguilla', '21', NULL, NULL, 'MA852771', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-04-08 12:02:30', '2024-04-08 12:02:30'),
(132, NULL, 2, 'Mr', 'Autumn Harrington', 'dumitu@mailinator.com', '0', NULL, 'user', NULL, NULL, NULL, 'Magna enim quo maior', 5899999999, 'Sir', '28 Sep, 1988', 'male', 'Fugiat veniam sapie', 'Reprehenderit vel p', NULL, '97', NULL, NULL, 'MA868789', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2024-04-09 05:08:55', '2024-04-09 14:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `vital_measurements`
--

CREATE TABLE `vital_measurements` (
  `id` int(11) NOT NULL,
  `measurement_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `what_we_do`
--

CREATE TABLE `what_we_do` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` longtext DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `what_we_do`
--

INSERT INTO `what_we_do` (`id`, `title`, `desc`, `img`, `created_at`, `updated_at`) VALUES
(1, 'changing the way of your testing and research', 'Qastarat & Dawali Clinics is a healthcare platform that provides virtual medical consultations and manages health records. Testing ensures seamless user experience and data security.', 'lab-4-min.jpg', '2024-01-02 08:51:52', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutUs`
--
ALTER TABLE `aboutUs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accountants`
--
ALTER TABLE `accountants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `allexpenses`
--
ALTER TABLE `allexpenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_appointments`
--
ALTER TABLE `book_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branchs`
--
ALTER TABLE `branchs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactUs`
--
ALTER TABLE `contactUs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `doctor_coordinator`
--
ALTER TABLE `doctor_coordinator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_labs`
--
ALTER TABLE `doctor_labs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_nurse`
--
ALTER TABLE `doctor_nurse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`,`nurse_id`),
  ADD KEY `doctor_nurse_ibfk_2` (`nurse_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_has_tasks`
--
ALTER TABLE `lab_has_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse_doctor`
--
ALTER TABLE `nurse_doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `nurse_id` (`nurse_id`);

--
-- Indexes for table `nurse_has_tasks`
--
ALTER TABLE `nurse_has_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse_tasks`
--
ALTER TABLE `nurse_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_imaginary_exam_tests`
--
ALTER TABLE `order_imaginary_exam_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_lab_tests`
--
ALTER TABLE `order_lab_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otps_user_id_foreign` (`user_id`);

--
-- Indexes for table `our_doctors`
--
ALTER TABLE `our_doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_services`
--
ALTER TABLE `our_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pathologys`
--
ALTER TABLE `pathologys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pathology_price_list`
--
ALTER TABLE `pathology_price_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `patient_allergies`
--
ALTER TABLE `patient_allergies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_appointments`
--
ALTER TABLE `patient_appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_bericoceleembo_diagnosis`
--
ALTER TABLE `patient_bericoceleembo_diagnosis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_clinical_exams`
--
ALTER TABLE `patient_clinical_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_current_meds`
--
ALTER TABLE `patient_current_meds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_diagnosis`
--
ALTER TABLE `patient_diagnosis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `patient_diagnosis_generals`
--
ALTER TABLE `patient_diagnosis_generals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_future_plans`
--
ALTER TABLE `patient_future_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_insurers`
--
ALTER TABLE `patient_insurers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_invistigations`
--
ALTER TABLE `patient_invistigations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_invoice_items`
--
ALTER TABLE `patient_invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_order_imaginary_exams`
--
ALTER TABLE `patient_order_imaginary_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `patient_order_labs`
--
ALTER TABLE `patient_order_labs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `patient_order_procedures`
--
ALTER TABLE `patient_order_procedures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_past_medical_histories`
--
ALTER TABLE `patient_past_medical_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_past_surgical_histories`
--
ALTER TABLE `patient_past_surgical_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_pelviccongembo_diagnosis`
--
ALTER TABLE `patient_pelviccongembo_diagnosis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_prescriptions`
--
ALTER TABLE `patient_prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_progress_notes`
--
ALTER TABLE `patient_progress_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_progress_note_details`
--
ALTER TABLE `patient_progress_note_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_refers`
--
ALTER TABLE `patient_refers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_special_notes`
--
ALTER TABLE `patient_special_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_supportive_treatments`
--
ALTER TABLE `patient_supportive_treatments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_symptoms`
--
ALTER TABLE `patient_symptoms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_tasks`
--
ALTER TABLE `patient_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_thyroid_diagnosis`
--
ALTER TABLE `patient_thyroid_diagnosis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `patient_uterineembo_diagnosis`
--
ALTER TABLE `patient_uterineembo_diagnosis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_varicoceleembo_diagnosis`
--
ALTER TABLE `patient_varicoceleembo_diagnosis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_varicose_ablation_diagnosis`
--
ALTER TABLE `patient_varicose_ablation_diagnosis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_video_calls`
--
ALTER TABLE `patient_video_calls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_vitals`
--
ALTER TABLE `patient_vitals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `progress_note_canned_text`
--
ALTER TABLE `progress_note_canned_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress_note_contents`
--
ALTER TABLE `progress_note_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radiologys`
--
ALTER TABLE `radiologys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptionist_tasks`
--
ALTER TABLE `receptionist_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referal_patients`
--
ALTER TABLE `referal_patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `snippets`
--
ALTER TABLE `snippets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `softwares`
--
ALTER TABLE `softwares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TeamMembers`
--
ALTER TABLE `TeamMembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telecallers`
--
ALTER TABLE `telecallers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `vital_measurements`
--
ALTER TABLE `vital_measurements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `what_we_do`
--
ALTER TABLE `what_we_do`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutUs`
--
ALTER TABLE `aboutUs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accountants`
--
ALTER TABLE `accountants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `allexpenses`
--
ALTER TABLE `allexpenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `book_appointments`
--
ALTER TABLE `book_appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branchs`
--
ALTER TABLE `branchs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contactUs`
--
ALTER TABLE `contactUs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `doctor_coordinator`
--
ALTER TABLE `doctor_coordinator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctor_labs`
--
ALTER TABLE `doctor_labs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor_nurse`
--
ALTER TABLE `doctor_nurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lab_has_tasks`
--
ALTER TABLE `lab_has_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nurse_doctor`
--
ALTER TABLE `nurse_doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `nurse_has_tasks`
--
ALTER TABLE `nurse_has_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nurse_tasks`
--
ALTER TABLE `nurse_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_imaginary_exam_tests`
--
ALTER TABLE `order_imaginary_exam_tests`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_lab_tests`
--
ALTER TABLE `order_lab_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `our_doctors`
--
ALTER TABLE `our_doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `our_services`
--
ALTER TABLE `our_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pathologys`
--
ALTER TABLE `pathologys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pathology_price_list`
--
ALTER TABLE `pathology_price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `patient_allergies`
--
ALTER TABLE `patient_allergies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `patient_appointments`
--
ALTER TABLE `patient_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient_bericoceleembo_diagnosis`
--
ALTER TABLE `patient_bericoceleembo_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_clinical_exams`
--
ALTER TABLE `patient_clinical_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_current_meds`
--
ALTER TABLE `patient_current_meds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `patient_diagnosis`
--
ALTER TABLE `patient_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `patient_diagnosis_generals`
--
ALTER TABLE `patient_diagnosis_generals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_future_plans`
--
ALTER TABLE `patient_future_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient_insurers`
--
ALTER TABLE `patient_insurers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `patient_invistigations`
--
ALTER TABLE `patient_invistigations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `patient_invoice_items`
--
ALTER TABLE `patient_invoice_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_order_imaginary_exams`
--
ALTER TABLE `patient_order_imaginary_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_order_labs`
--
ALTER TABLE `patient_order_labs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient_order_procedures`
--
ALTER TABLE `patient_order_procedures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient_past_medical_histories`
--
ALTER TABLE `patient_past_medical_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `patient_past_surgical_histories`
--
ALTER TABLE `patient_past_surgical_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `patient_pelviccongembo_diagnosis`
--
ALTER TABLE `patient_pelviccongembo_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_prescriptions`
--
ALTER TABLE `patient_prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `patient_progress_notes`
--
ALTER TABLE `patient_progress_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient_progress_note_details`
--
ALTER TABLE `patient_progress_note_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient_refers`
--
ALTER TABLE `patient_refers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_special_notes`
--
ALTER TABLE `patient_special_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_supportive_treatments`
--
ALTER TABLE `patient_supportive_treatments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient_symptoms`
--
ALTER TABLE `patient_symptoms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_tasks`
--
ALTER TABLE `patient_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_thyroid_diagnosis`
--
ALTER TABLE `patient_thyroid_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1128;

--
-- AUTO_INCREMENT for table `patient_uterineembo_diagnosis`
--
ALTER TABLE `patient_uterineembo_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_varicoceleembo_diagnosis`
--
ALTER TABLE `patient_varicoceleembo_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_varicose_ablation_diagnosis`
--
ALTER TABLE `patient_varicose_ablation_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient_video_calls`
--
ALTER TABLE `patient_video_calls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient_vitals`
--
ALTER TABLE `patient_vitals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `progress_note_canned_text`
--
ALTER TABLE `progress_note_canned_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `progress_note_contents`
--
ALTER TABLE `progress_note_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `radiologys`
--
ALTER TABLE `radiologys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `receptionist_tasks`
--
ALTER TABLE `receptionist_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `referal_patients`
--
ALTER TABLE `referal_patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `snippets`
--
ALTER TABLE `snippets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `softwares`
--
ALTER TABLE `softwares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `TeamMembers`
--
ALTER TABLE `TeamMembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `telecallers`
--
ALTER TABLE `telecallers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `vital_measurements`
--
ALTER TABLE `vital_measurements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `what_we_do`
--
ALTER TABLE `what_we_do`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_nurse`
--
ALTER TABLE `doctor_nurse`
  ADD CONSTRAINT `doctor_nurse_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_nurse_ibfk_2` FOREIGN KEY (`nurse_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_allergies`
--
ALTER TABLE `patient_allergies`
  ADD CONSTRAINT `patient_allergies_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
