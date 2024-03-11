-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 11, 2024 at 08:51 AM
-- Server version: 10.6.17-MariaDB-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` longtext DEFAULT NULL,
  `about_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `desc`, `about_img`, `created_at`, `updated_at`) VALUES
(2, 'The Heart And Science Of Medicine Service', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc itation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'abt-4.png', '2024-01-02 06:54:26', '0000-00-00 00:00:00');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `allexpenses`
--

INSERT INTO `allexpenses` (`id`, `expense_type`, `price`, `created_at`, `updated_at`) VALUES
(1, 'SDA', '123', '2024-01-19 09:54:40', '2024-01-19 09:54:40'),
(2, 'In dolor cum iste ev', '148', '2024-01-24 11:18:49', '2024-01-24 11:18:49'),
(3, 'khugv', '.', '2024-02-20 12:38:09', '2024-02-20 12:38:09'),
(4, 'Laboris dolor hic se', '447', '2024-02-28 12:48:33', '2024-02-28 12:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `branchs`
--

CREATE TABLE `branchs` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `phone_no` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `branchs`
--

INSERT INTO `branchs` (`id`, `branch_name`, `phone_no`, `address`, `created_at`, `updated_at`) VALUES
(3, '7777', 'rajhimasnhu111222@gmail.com', '07248702312', '2024-01-19 07:53:13', '2024-01-19 07:53:13'),
(4, 'Camilla Parker', 'binofihe@mailinator.com', '+1 (276) 646-2616', '2024-01-19 08:50:36', '2024-01-19 08:50:36'),
(5, 'Ivertis Hospital', '9825674023 1234', 'Akshya Nagar 1st Block 1st , Rammurthy nagar, Bangalore-560016   1', '2024-01-19 09:03:23', '2024-01-19 09:03:23'),
(6, '23rt', '1234r', '234wtr', '2024-01-19 09:15:02', '2024-01-19 09:15:02'),
(7, '2134', '1234', '1', '2024-01-19 09:17:57', '2024-01-19 09:17:57'),
(9, 'Aaron Ball', '+1 (751) 593-7343', 'Consequatur et commo', '2024-01-24 10:37:07', '2024-01-24 10:37:07'),
(10, 'kjhgcnjukjn', '985986584596', NULL, '2024-02-20 12:38:39', '2024-02-20 12:38:39'),
(11, 'hjbgf', '8954215688', NULL, '2024-02-23 10:17:45', '2024-02-23 10:17:45');

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
  `role_id` bigint(255) UNSIGNED DEFAULT NULL,
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
  `gendar` enum('male','female','other') DEFAULT NULL,
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
  `document_type` varchar(100) DEFAULT NULL,
  `patient_id` varchar(255) DEFAULT NULL,
  `gp` varchar(255) DEFAULT NULL,
  `kin` varchar(255) DEFAULT NULL,
  `policy_no` varchar(255) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `lab_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doctor_id`, `title`, `name`, `email`, `password`, `user_type`, `role_id`, `is_verified`, `patient_profile_img`, `LicenseUpload`, `AcademicDocumentUpload`, `role`, `email_verified_at`, `remember_token`, `post_code`, `mobile_no`, `sirname`, `birth_date`, `gendar`, `street`, `town`, `country`, `landline`, `specialty`, `qualifications`, `college_name`, `NursingSchool`, `graduation_year`, `soft_skill`, `communication_skill`, `experience`, `Degree`, `working_hours`, `languages_spoken`, `lincense_no`, `document_type`, `patient_id`, `gp`, `kin`, `policy_no`, `additional_info`, `tags`, `lab_name`, `created_at`, `updated_at`) VALUES
(2, 'DI1231', 'Dr', 'Manish', 'doctor@gmail.com', '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', 'doctor', 1, '0', NULL, NULL, NULL, 'user', NULL, NULL, '431343', '987654321', NULL, '01/31/2024', 'male', '431343', 'noida', 'CX', '11', '123', '123', NULL, NULL, NULL, NULL, NULL, '123', NULL, '123', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 17:47:56', '2024-01-24 12:28:27'),
(7, 'DI1231', 'Dr', 'Lab', 'lab@gmail.com', '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', 'lab', 1, '0', NULL, NULL, NULL, 'user', NULL, NULL, '431343', NULL, NULL, '01/31/2024', 'male', '431343', 'noida', 'India', '11', '123', '123', NULL, NULL, NULL, NULL, NULL, '123', NULL, '123', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 17:47:56', '2024-01-16 16:25:32'),
(12, 'MA145155', 'Mr', 'Ramesh updated', 'adminwwqq@gmail.com', '$2y$12$rcP4mH9rJRNKJq7q4Fz5suj.IP7mBpQuhof9mtpC30654zht7Sc9u', 'doctor', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '12', '9087654321', NULL, '01/09/2024', 'female', '12', 'noida', 'CX', '9395', '123', '12', NULL, NULL, NULL, NULL, NULL, '123', NULL, '123', '213', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-23 14:18:26', '2024-01-24 12:29:15'),
(13, 'MA100662', 'Dr', 'Sigourney Scott', 'naholakiw@mailinator.com', '$2y$12$LPKjNTzh1VJHMgkRGRjQ3u9HRXi6nzuyzc0DVPDMUq44SfURLaTY2', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '0987', '967654321', NULL, '24-Aug-1978', 'male', 'Ut modi rem qui dolo', 'Quia ex sunt dolore', 'CX', '55', 'In molestias dolores', 'Ullam qui aliquip qu', NULL, NULL, NULL, NULL, NULL, 'Proident molestiae', NULL, 'Alias quibusdam ea v', 'Dolore aliqua Ut ob', '11111111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-23 20:12:51', '2024-01-24 13:29:36'),
(14, 'MA323653', 'Dr', 'Desiree Montgomery', 'tucuvelyf@mailinator.com', '$2y$12$e9dI2YA2fU1V0ytFrq2HWe4PtdQRBIcBJp2ZyooaiqFBw0hxIHNR2', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Earum ipsum esse e', NULL, NULL, '27-Oct-1970', 'other', 'Nostrum id magni vol', 'Dolor est quo amet', 'SE', '24', 'Voluptate esse aspe', 'Occaecat id quis adi', NULL, NULL, NULL, NULL, NULL, 'Explicabo Provident', NULL, 'Molestiae ad laboris', 'Et ipsum exercitati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-23 20:13:10', '2024-01-23 20:13:10'),
(15, 'MA930609', 'Capt', 'Emma Flores', 'cidexog@mailinator.com', '$2y$12$y1eBR9XUncAqfbnHwIulBu7GBmF1//fmCTp9M6w/H.YPZvnJg11EC', 'doctor', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '123', '890123456', NULL, '10 Jul, 1987', 'other', 'Id amet quis eiusm', 'Porro consequuntur i', 'AD', '66', 'Vel excepturi ut qui', 'Irure et aut do moll', NULL, NULL, NULL, NULL, NULL, 'Cum aut ipsam explic', NULL, 'Accusantium nihil in', 'Molestiae ducimus s', '222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-23 20:17:35', '2024-01-30 19:29:29'),
(19, 'MA416924', 'Lady', 'Reece Pate', 'mofy@mailinator.com', '$2y$12$bNJm6OKNJLsTqUqVI6QoH.hsNUGjrGUh0bs4dADoHnMvQCiDo/UBa', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Aperiam commodo aut', NULL, NULL, '16-Jan-1977', 'female', 'Qui voluptates quia', 'Laborum aut fugiat', 'FM', '21', 'Et autem perspiciati', 'Excepturi quia ut ma', NULL, NULL, NULL, NULL, NULL, 'Accusantium sit et', NULL, 'Est voluptate non ex', 'Sit ut et nostrum r', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-23 20:34:19', '2024-01-23 20:34:19'),
(25, 'MA311713', 'Professor', 'Zorita Landry', 'wiwufako@mailinator.com', '$2y$12$jFRBO98j4cWgsxEwK/qfCebcRGGZwCgQIp4Z3LgguhGDpWwP8F/GS', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '222', '9234567890', NULL, '11-Feb-2002', 'male', 'Quas quo aut cupidat', 'Anim ut dolore possi', 'CX', '48', 'Excepteur commodi qu', 'Mollit exercitation', NULL, NULL, NULL, NULL, NULL, 'Molestias ut cum adi', NULL, 'Qui fugiat ipsum at', 'Mollit voluptatem r', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-24 13:19:30', '2024-01-24 13:34:30'),
(26, 'MA772223', 'Dr', 'Dieter Smith', 'gyxyle@mailinator.com', '$2y$12$pZR2sv6CwB2.5f92LUVPbO4ZjL6RcIiDyG.eoCBC9u/LTTp0fxZBi', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '0990', NULL, NULL, '02-Jul-2004', 'female', 'Nostrum proident re', 'Quod qui et amet et', 'India', '25', 'Odio consequat Porr', 'Doloribus sunt omni', NULL, NULL, NULL, NULL, NULL, 'Id minim incididunt', NULL, 'Architecto quisquam', 'Deserunt voluptas pe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-24 13:24:05', '2024-01-24 13:24:05'),
(27, 'MA989817', 'Mrs', 'Odysseus Malone', 'zixi@mailinator.com', '$2y$12$lJ0aj421Vkdc70FAe1t3NeeYDT1dAVRLv7QGtFM0ujnrtgH96VvQm', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '333', NULL, NULL, '13-Jan-1972', 'other', 'Non esse maxime fac', 'Ut aliquip officiis', 'ES', '99', 'Quasi praesentium ob', 'Culpa non ipsum il', NULL, NULL, NULL, NULL, NULL, 'Odio cupidatat iusto', NULL, 'Possimus doloremque', 'Dicta in porro ut vo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-24 13:30:42', '2024-01-24 13:30:42'),
(28, 'MA302026', 'Sir', 'Aspen House', 'jeluwe@mailinator.com', '$2y$12$b2SixwGEDycEZ51GRpQUleSwcSRhDZ72.FopJxOv1jOEF5KiLDWTu', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '22', NULL, NULL, '07-Apr-1977', 'female', 'Facilis sint et ips', 'Cupidatat ipsa et s', 'MC', '88', 'Sapiente voluptas do', 'Laborum Ullam accus', NULL, NULL, NULL, NULL, NULL, 'Esse et ipsam ea sit', NULL, 'Duis at molestiae qu', 'Doloremque dolore id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-24 13:35:02', '2024-01-24 13:35:02'),
(30, 'MA998691', 'Professor', 'Clementine Rivas', 'maqihaku@mailinator.com', '$2y$12$rZU5SEwH3lhgWWYy5mfaFuKqg4k5Yy2jkw/6wBdYkoA69rKBQW4xm', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '000', NULL, NULL, '02-Aug-2001', 'female', 'Et accusamus volupta', 'Enim aliquid eum off', 'BT', '54', 'Accusantium quibusda', 'In mollitia commodi', NULL, NULL, NULL, NULL, NULL, 'Vero eveniet dignis', NULL, 'Minim in qui eius co', 'Ut expedita sunt eaq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-24 13:40:47', '2024-01-24 13:40:47'),
(31, 'MA559964', 'Dr', 'Scott Wilkins', 'bomiwyqoq@mailinator.com', '$2y$12$bF3Qthqfgq4ihw413xGo1.A20bXreV5D6AH/D.1OcWDhsaspi0kNm', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '111', NULL, NULL, '19-Aug-2017', 'male', 'Aut ad vitae laborum', 'Consequuntur enim si', 'LY', '13', 'Libero accusamus vit', 'Recusandae Enim est', NULL, NULL, NULL, NULL, NULL, 'Cupidatat nulla even', NULL, 'Voluptatem obcaecat', 'Sequi ut in consequa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-24 13:41:21', '2024-01-24 13:41:21'),
(36, 'TC611534', 'Sir', 'Sophia Rosario', 'peva@mailinator.com', '$2y$12$/yhfKJKs8Q/1HsXXkkZpoebaIJfWTvBVPLci5fYw5yd.OjndLDGdO', 'telecaller', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '0990', NULL, NULL, '23-Jan-1980', 'other', 'Nesciunt omnis ut f', 'Architecto est et au', 'India', 'Nam expedita sit id', NULL, 'Molestiae sit ab lab', NULL, NULL, NULL, NULL, NULL, 'Deserunt doloribus q', NULL, NULL, 'Dolore est sint dign', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-24 16:02:48', '2024-01-24 16:02:48'),
(37, 'TC627587', 'Ms', 'Alice Mendez', 'kefu@mailinator.com', '$2y$12$vdDbH7S/eyXKTMreISiMfO8JcNWNMsdDWBioFmGYseXPC2fdhmTIW', 'telecaller', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '123', NULL, NULL, '05-Apr-2005', 'female', 'Elit sit possimus', 'Sit expedita fugiat', 'India', 'Enim hic voluptate e', NULL, 'Quos ut in beatae no', NULL, NULL, NULL, NULL, NULL, 'Nulla non tenetur ma', NULL, NULL, 'Quidem duis eum magn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-24 16:07:35', '2024-01-24 16:07:35'),
(38, 'TC577020', 'Mr', 'Zachery Bailey', 'wolyfujata@mailinator.com', '$2y$12$fKQoP7YmWcttl9THy8JCMuDmjUTuQGiD5u4HM3kXT1ibYZVZBqZbG', 'telecaller', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '1231', NULL, NULL, '09-Nov-1981', 'other', 'Suscipit hic eveniet', 'Laboris perspiciatis', 'BD', 'Tempora deserunt rer', NULL, 'In pariatur Ut inci', NULL, NULL, NULL, NULL, NULL, 'Dicta distinctio Co', NULL, NULL, 'Do quo iste iusto il', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-24 16:12:24', '2024-01-24 16:12:24'),
(39, 'TC92346', 'Mr', 'Dora Vaughan', 'cagu@mailinator.com', '$2y$12$mcitm6qyfM8FB4jC/OqLee8QpjgSWvK1SQj4.VmzpOV6bkpwY4ik6', 'telecaller', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '098', NULL, NULL, '14-Dec-2017', 'male', 'Fugiat adipisci aut', 'Laboriosam dolor nu', 'PF', 'Aliquip libero rerum', NULL, 'Quis totam duis reru', NULL, NULL, NULL, NULL, NULL, 'Aute ut et dolorem a', NULL, NULL, 'Laboriosam eu facer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-24 16:13:11', '2024-01-24 16:13:11'),
(55, NULL, NULL, NULL, 'avichauhan0404@gmail.com', NULL, 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '5657454', '1234567898', NULL, NULL, NULL, '452', '52', 'India', '58565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DEMO TEST LAB', '2024-02-19 09:49:20', '2024-02-19 09:49:20'),
(59, NULL, NULL, NULL, 'testing00@yopmail', '$2y$12$WuiVafjLCHMuR0sT5pI5.e52ERW/LQVKqIeieqxcPBx6fRVhDyM9y', 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '2316458', '7418529630000', NULL, NULL, NULL, 'zzzzzzzzzzzzzz', 'yyyyyyyyyyyyyyy', 'india', '65896554561216254', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'don\'t know', '2024-02-20 10:58:33', '2024-02-20 10:58:33'),
(63, 'QC453873', 'Capt', 'Ray Lopez', 'xefo@mailinator.com', '$2y$12$PeZfsuqSWWpS/v1xAVombO08/TZ5NB0G6SrRa2quEkRyh2MWLBzh.', 'doctor', 2, '0', '', NULL, NULL, 'user', NULL, NULL, NULL, '7098765432', NULL, '29 Dec, 2016', 'other', 'Ducimus error et om', 'Illo et aliqua Eaqu', 'ZA', NULL, 'Aliquam deserunt eli', 'Ad error ut quis ut', NULL, NULL, NULL, NULL, NULL, 'Quo aliquid unde aut', NULL, 'Proident incidunt', 'Ut qui autem quod et', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 19:39:22', '2024-02-22 19:39:22'),
(64, 'QC459941', 'Lady', 'Ross Cross', 'jidekas@mailinator.com', '$2y$12$.yoDoVa1oyIi9vh7fhov4OwXwLANQglsJDDVmRU/nBK64Lvs8yqO6', 'doctor', 2, '0', '120ef868b771ad12b6a456a4f367336a.png', NULL, NULL, 'user', NULL, NULL, NULL, '5098765432', NULL, '11 Feb, 1992', 'other', 'Qui itaque id aperi', 'Deserunt cillum temp', 'TO', NULL, 'Deserunt magna sequi', 'Et laborum Duis qui', NULL, NULL, NULL, NULL, NULL, 'Et aliqua Porro odi', NULL, 'Odit ad itaque offic', 'Sapiente ullamco err', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 19:40:49', '2024-02-22 19:40:49'),
(83, 'NA141097', 'Mr', 'Chadwick Hammond', 'sygakobe@mailinator.com', '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', 'nurse', 2, '0', '564aa326ec83f5b1d6eafed00baebabb.png', NULL, NULL, 'user', NULL, NULL, 'Et volu', '60987654345', NULL, '12 Feb, 2024', 'other', 'Assumenda odit conse', 'Soluta aliqua Exerc', 'India', NULL, 'Exercitationem et qu', 'Et accusantium non d', NULL, NULL, NULL, NULL, NULL, 'Animi dicta saepe v', NULL, 'Consequuntur Nam aut', 'Nulla voluptas totam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 23:03:11', '2024-02-28 14:22:25'),
(84, 'NA309180', 'Miss', 'Ciara Best', 'nedo@mailinator.com', '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', 'nurse', 2, '0', '1c82eac131c63519ecba36969cb8e100.png', NULL, NULL, 'user', NULL, NULL, 'Minus', '9098765432', NULL, '13 Feb, 2024', 'male', 'Aut reiciendis error', 'Sit soluta debitis', 'CY', NULL, 'Excepturi in asperna', 'Expedita quidem ut f', NULL, NULL, NULL, NULL, NULL, 'Et quae ex exercitat', NULL, 'Consequatur et exerc', 'Est est iste obcaeca', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 23:04:11', '2024-02-22 23:05:10'),
(89, 'TC609882', 'Mrs', 'Hiroko Lang', 'sehiz@mailinator.com', '$2y$12$QYCLerUWWBBkavlM83p9RukmTJf81SDMoyhErZlnDbza/vj.Vz6k6', 'telecaller', NULL, '0', 'Screenshot 2023-12-09 223849.png', NULL, NULL, 'user', NULL, NULL, 'Ad re', '7098765433', NULL, '13 Feb, 2024', 'other', 'Sed sint totam pari', 'Veniam tempore at', 'India', NULL, NULL, 'Labore assumenda qui', 'Wyatt Cardenas', NULL, 1987, 'Fugiat pariatur Ve', 'Excellent', 'Sed voluptas eligend', NULL, NULL, 'Consectetur dolores', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 00:08:30', '2024-02-23 00:08:30'),
(90, 'TC749000', 'Mrs', 'Lacota Garza', 'kecigi@mailinator.com', '$2y$12$Wbv/wqN78dMAU/YTICVPLu5HRe9POBYCcf34JwjcRlofam4eb00GK', 'telecaller', NULL, '0', '/tmp/phpHeQM1K', NULL, NULL, 'user', NULL, NULL, 'Repud', '8098765432', NULL, '14 Feb, 2024', 'female', 'Excepturi quo nihil', 'Eius eligendi corpor', 'India', NULL, NULL, 'Quis totam iste Nam', 'Wendy Gibson', NULL, 1983, 'Id ipsum voluptates', 'Very Good', 'Sed duis provident', NULL, NULL, 'Labore nihil ex est', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 00:11:46', '2024-02-23 00:11:46'),
(92, 'TC163847', 'Sir', 'Alec Bright', 'micifucyva@mailinator.com', NULL, 'telecaller', NULL, '0', '9afa6ee37af506a93c8d1816f43388a6.png', NULL, NULL, 'user', NULL, NULL, 'Quae', '98987654355', NULL, '21 Dec, 2000', 'female', 'Facere reprehenderit', 'Corporis tenetur vol', 'India', NULL, NULL, 'Neque commodi aliqua', 'Fritz Nieves', NULL, 2019, 'Necessitatibus ducim', 'Good', 'Ipsa omnis nobis mo', NULL, NULL, 'Ex eum qui sed recus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 00:19:40', '2024-02-28 14:23:13'),
(93, NULL, NULL, NULL, 'maqyhuke@mailinator.com', NULL, 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Quam', '9987654321', NULL, NULL, NULL, 'Debitis minim aute a', 'Voluptate non aliqui', 'India', '9987654321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Seth Hodges', '2024-02-22 18:32:27', '2024-02-22 18:32:27'),
(94, NULL, NULL, NULL, 'qytybedyhe@mailinator.com', '$2y$12$1YxUtwbDo7gg7xfUGcd4Rum3hRAmuLGO0MEGXhVjudpGaJDCbYggi', 'radiology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'qwer', '4567890329', NULL, NULL, NULL, 'Dicta id incidunt', 'Ipsa voluptatibus n', 'canada', '4567890329', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Felix Melton', '2024-02-22 18:43:30', '2024-02-22 18:43:30'),
(95, 'NA460398', 'Mr', 'hareram', 'kkkk@gmail.com', '$2y$12$KD3tXORPm9rAM3sM78wPqucOER3zkWqT.sp7znahxFQT.RuFKf0w2', 'nurse', 2, '0', NULL, NULL, NULL, 'user', NULL, NULL, '1234', '0987654321', NULL, '05 Feb, 2024', 'female', NULL, NULL, 'India', '34567898700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 16:33:58', '2024-02-28 13:19:57'),
(96, 'NA665883', 'Miss', 'Lamar Whitley', 'ryzybe@mailinator.com', '$2y$12$Wykt0xZximXpnDwTQVNf6OHwX2yNoSZYMCoHsMsVpAEE4RDj.WAN2', 'nurse', 2, '0', NULL, NULL, NULL, 'user', NULL, NULL, '654987', '96385274100', NULL, '14-02-2024', 'female', 'Praesentium tempor a', 'Molestiae nobis cons', 'India', '7894512306', 'Velit minima magni q', 'In ratione aliquip f', NULL, NULL, NULL, NULL, NULL, 'Soluta praesentium e', NULL, 'Maxime dolor eos ul', 'Omnis quia omnis pro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 16:35:41', '2024-02-23 16:35:41'),
(97, 'AC331135', 'Mr', 'kkkkkk', 'joihgffd@liikjh.com', '$2y$12$LZ1bSjSm0EGOvIgcCyLY0.NrEgBknwSzlacqGmeu/ju/3SDUkgOfa', 'accountant', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '85274', '321852741963', NULL, '05 Feb, 2024', 'female', NULL, NULL, 'India', '25845698713', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 16:40:53', '2024-02-23 16:40:53'),
(98, 'TC543647', 'Mr', 'Freya King', 'lovahuf@mailinator.com', '$2y$12$mTW/UH3U9hYEmjNgjirVFuUjHNqnyI12m6o.lOCd9vWPRpNgMqQTK', 'telecaller', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '0987', '951752956965', NULL, '01 Feb, 2024', 'other', 'Eos laboriosam tem', 'Qui dolor at ut itaq', 'India', '9865431635', NULL, 'Nam ducimus eaque s', 'Kristen Owen', NULL, 1986, 'A sapiente ut offici', 'Good', 'Et voluptates enim i', NULL, NULL, 'Duis enim quos sequi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-23 16:43:56', '2024-02-23 16:43:56'),
(99, 'QC99845', 'Lady', 'Raymond Stafford', 'qalipu@mailinator.com', '$2y$12$l.GvW/QA3e/LlrkL2J0exeeA2kLUhBOjfuC040.BU4eoyXB0RPcNq', 'doctor', NULL, '0', NULL, '', '', 'user', NULL, NULL, 'Est 2', '5098765430', NULL, '29 Dec, 2004', 'female', 'Sit tempor sit do a', 'Magni adipisicing fu', 'India', NULL, 'Nostrum ut adipisici', 'Eos commodi est des', NULL, NULL, NULL, NULL, NULL, 'Occaecat sed velit e', NULL, 'Dignissimos adipisic', 'Mollitia maxime ulla', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 15:59:53', '2024-02-27 15:59:53'),
(100, 'QC129178', 'Professor', 'Anthony Santana', 'wifog@mailinator.com', NULL, 'doctor', 1, '0', NULL, '', '', 'user', NULL, NULL, 'Ea i', '7098765438', NULL, '19 Sep, 2015', 'male', 'Est soluta doloremqu', 'Possimus in maiores', 'CY', NULL, 'Eligendi ut nobis cu', 'Est nostrud ullam eu', NULL, NULL, NULL, NULL, NULL, 'Eu porro ut velit re', NULL, 'Consequuntur non ips', 'Quia iusto enim aute', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 16:03:42', '2024-02-27 17:36:13'),
(101, 'QC976625', 'Mrs', 'Aiko Crane', 'jezexy@mailinator.com', '$2y$12$Ah0FKwZ5NqmvjtYkzashdOm9AE.8HWIOOOqOhrfqajNwURYEGg1yy', 'doctor', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Magna', '8098765439', NULL, '30 Sep, 2021', 'other', 'Placeat veniam in', 'Mollitia adipisicing', 'FI', NULL, 'Sapiente blanditiis', 'Fugiat reiciendis v', NULL, NULL, NULL, NULL, NULL, 'Consequatur anim sed', NULL, 'Sint consequat Non', 'Nostrud culpa ipsam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 16:16:40', '2024-02-27 16:16:40'),
(102, 'QC242569', 'Mrs', 'Xena Bentley', 'laba@mailinator.com', NULL, 'doctor', 2, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Molest', '8098765499', NULL, '02 May, 1978', 'male', 'Excepturi dolorum qu', 'Cupidatat dolorem an', 'CY', NULL, 'Est odio molestiae a', 'Qui labore eveniet', NULL, NULL, NULL, NULL, NULL, 'Dignissimos amet in', NULL, 'Rerum dolores volupt', 'Deserunt id minima e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 16:59:28', '2024-02-27 17:32:07'),
(103, 'NA82126', 'Mrs', 'Zane Holcomb', 'tedyfijuv@mailinator.com', '$2y$12$qWVQTWwAnoWay8wHioAEwuKKcXjQgBN3kyD8d3vjnSV6XOOfeSfrm', 'nurse', 2, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Enim', '8098765431', NULL, '02-Feb-1984', 'other', 'Exercitation volupta', 'Dolor necessitatibus', 'India', NULL, NULL, NULL, NULL, 'Ut proident laudant', NULL, NULL, NULL, 'Excepturi commodi se', 'Esse ea reprehenderi', 'Eum sint dolore qua', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 19:00:23', '2024-02-27 19:00:23'),
(104, 'NA568096', 'Dr', 'Vernon Snider', 'huqefyluc@mailinator.com', '$2y$12$rIsTwpc/l41UsCgAdQ3.GeeitikiD7ZzA3JFTlx5sWvPHoPN4UhyS', 'nurse', 2, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Dolor', '7890654322', NULL, '28 Mar, 2020', 'other', 'Sint mollit sunt qu', 'Quo quia nulla omnis', 'MO', NULL, NULL, NULL, NULL, 'Similique reiciendis', NULL, NULL, NULL, 'In qui accusantium s', 'Accusamus exercitati', 'In nisi eius accusam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 19:07:39', '2024-02-27 19:07:39'),
(105, 'NA293464', 'Lord', 'Curran Hopkins', 'jykenupuby@mailinator.com', '$2y$12$Jwehc.dMZWjSGMAR3.cydO7.hw/qwPku35oZjhoNivlNw6lAYUqQK', 'nurse', 2, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Odio', '8098765434', NULL, '13 Apr, 1992', 'other', 'Voluptate perferendi', 'Et officia voluptati', 'India', NULL, NULL, NULL, NULL, 'Quod autem blanditii', 1984, NULL, NULL, 'Tenetur ut cum excep', 'Est sequi sunt Nam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 19:15:12', '2024-02-27 19:15:12'),
(106, 'NA78117', 'Sir', 'Nasim Gutierrez', 'wirogi@mailinator.com', NULL, 'nurse', 2, '0', '370632208f0d34bcae3dc63efbf76bc7.png', NULL, NULL, 'user', NULL, NULL, 'Eos1', '89087654321', NULL, '18 Jul, 1973', 'female', 'Excepteur odio quia', 'Ut eveniet dolor do', 'SD', NULL, NULL, NULL, NULL, 'Sunt mollitia dolore', 1993, NULL, NULL, 'Quo eveniet animi', 'Repudiandae dicta vo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 19:22:03', '2024-02-27 20:21:41'),
(107, 'NA234496', 'Mrs', 'Diana Macias', 'zuzu@mailinator.com', NULL, 'nurse', 2, '0', 'd58119954b36efee65f087f54e219ce4.png', NULL, NULL, 'user', NULL, NULL, 'Sint', '8907654327', NULL, '25 Feb, 1970', 'male', 'Vel iure laudantium', 'Labore illo velit id', 'SR', NULL, NULL, NULL, NULL, 'Sit ipsum sed obcae', 1993, NULL, NULL, 'Nihil fuga Quibusda', 'Numquam et aliquip r', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 20:22:52', '2024-02-27 20:23:47'),
(108, 'AC34430', 'Miss', 'Donovan Mcclure', 'fytowyn@mailinator.com', NULL, 'accountant', NULL, '0', '14f9a7e0d2eaffd2dab13e2b38c898e9.png', NULL, NULL, 'user', NULL, NULL, 'Velit', '8079876543', NULL, '23 Mar, 1974', 'male', 'Nisi Nam molestiae a', 'Consequat Inventore', 'GS', NULL, NULL, NULL, 'Jenna Velez', NULL, 1977, 'Omnis id ex qui magn', NULL, 'Nulla in eius delect', 'Cumque reiciendis ut', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 20:48:17', '2024-02-27 21:08:50'),
(109, 'TC200316', 'Professor', 'Shay Forbes', 'lelu@mailinator.com', '$2y$12$s39a6jFhmlXYn.6KtZ4G/.9PW.NWzDqeDzUsOmCwJl4NmzVkgOkcG', 'telecaller', NULL, '0', '44d7df802900ca368262c2e6a461b610.png', NULL, NULL, 'user', NULL, NULL, 'Quos', '9876543219', NULL, '14 Oct, 1986', 'female', 'Quasi voluptatem La', 'Cillum impedit perf', 'NI', NULL, NULL, NULL, 'Cora Hogan', NULL, 2004, 'Sit est dolore fugit', 'Excellent', 'Pariatur Ut mollit', 'Laudantium temporib', NULL, 'Dolores enim fuga V', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 22:50:09', '2024-02-27 22:50:09'),
(110, 'QC836059', 'Mrs', 'huihiu', 'JBjhhhHJ@YOPMAIL.COM', NULL, 'doctor', 1, '0', NULL, '0d1b6bf4bf64806b1c57190a7355d37f.pdf', '72eb8c861f80aee7895747d018c1d059.pdf', 'user', NULL, NULL, '852964', '1234569510', NULL, '08 Feb, 2024', 'female', 'Facilis dolorem faci', 'Sequi numquam aliqui', 'CY', '986598659865', 'Nam facilis sed faci', 'Velit amet est tem', NULL, NULL, NULL, NULL, NULL, 'Omnis dolorum dolore', NULL, '5', 'english', '852', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 12:06:44', '2024-02-28 12:10:18'),
(111, 'NA756482', 'Miss', 'jasss', 'jas98765@yopmail.com', '$2y$12$iQ2KtQ1hS9ZCElh3hbP71ei1HyxeGrQ8qumc3YqoavpChZH4ceLiW', 'nurse', 2, '0', '6be60f27f18f39f559f7998ae8fa5b55.jpg', NULL, NULL, 'user', NULL, NULL, '741852', '5678904321', NULL, '04 Dec, 2007', 'female', 'zzzzzzzzzzzzzz', 'yyyyyyyyyyyyyyy', 'India', '9876512340', NULL, NULL, NULL, 'mnbvcxdfg', 1986, NULL, NULL, '12', 'ikujgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 12:15:39', '2024-02-28 12:15:39'),
(112, 'AC444626', 'Mr', 'raju', 'rajuii@yopmail.com', NULL, 'accountant', NULL, '0', '328d2003599e254a58d3057a7922955b.jpg', NULL, NULL, 'user', NULL, NULL, '09876', '98745632112', NULL, '01 Apr, 1952', 'female', 'In dolor sint debiti', 'Sequi numquam aliqui', 'India', '852321654099', NULL, NULL, 'Kristen Owen', NULL, 1986, 'A sapiente ut offici', NULL, '12', 'ikujgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 12:18:40', '2024-02-28 14:22:47'),
(113, 'QC475953', 'Sir', 'Harper Ramirez', 'lajuhoh@mailinator.com', '$2y$12$Ph.hzxEx.b8xPwpUe.sXEuDkWkRHn0O2UQEFN5yWUDRhT.6K7IbM6', 'doctor', 8, '0', NULL, NULL, NULL, 'user', NULL, NULL, '98641346', '741852963852', NULL, '03 Feb, 1997', 'male', 'Perferendis quaerat', 'Cum ullamco ea ipsum', 'India', '9561563542', 'Ut dolorum facere mo', 'Asperiores laborum', NULL, NULL, NULL, NULL, NULL, 'Atque vel cupiditate', NULL, 'Non earum officia co', 'Vitae iste minus adi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 12:47:11', '2024-02-28 12:47:11'),
(114, 'QC231857', 'Lady', 'manishka', 'manishkaaaaaaaaaaaaaa@yopmail.com', NULL, 'doctor', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '963852', '96365438888', NULL, '01 Feb, 2024', 'female', NULL, NULL, 'CY', '8524569873', 'jjjjkkklll', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 13:39:26', '2024-02-28 14:22:00'),
(115, 'PA254633', NULL, NULL, 'gewilaxysy@mailinator.com', NULL, 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Aliquid', '1234567890', NULL, NULL, NULL, 'Enim quo omnis qui s', 'Officia eligendi fug', 'India', '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Darrel Hernandez', '2024-02-28 06:55:50', '2024-02-28 06:55:50'),
(116, 'NA303370', 'Miss', 'JHBGUkjfhd', 'kiugyjug@rdfghj.com', '$2y$12$0YY5VkWSPWo27d7TfSrypeBX0RdSCbYucElYbG1czLQ/RqJIxDRRK', 'nurse', 2, '0', NULL, NULL, NULL, 'user', NULL, NULL, '8426153', '9877416325', NULL, '05 Feb, 2020', 'male', NULL, NULL, 'India', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 14:09:13', '2024-02-28 14:09:13'),
(117, 'PA667368', NULL, NULL, 'sisefidisy@mailinator.com', NULL, 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Velit do', '5555555555', NULL, NULL, NULL, 'In Nam Nam natus cul', 'Possimus quae ut do', 'India', '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mark Stevenson', '2024-02-28 07:36:08', '2024-02-28 07:36:08'),
(118, 'PA296045', NULL, NULL, 'labw@yopmail.com', NULL, 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '1234', '12365347890', NULL, NULL, NULL, 'xyz', NULL, 'India', '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lab 1', '2024-02-28 07:38:13', '2024-02-28 07:38:13'),
(119, 'PA250143', NULL, NULL, 'lab1@gmail.com', NULL, 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '85263', '3216549870', NULL, NULL, NULL, 'kjhgfd', 'hjgfds', 'India', '9637452396521', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lab2', '2024-02-28 09:11:03', '2024-02-28 09:11:03'),
(120, 'QC236348', 'Mr', 'navneet Kumar', 'navneet@gmail.com', NULL, 'doctor', 1, '0', NULL, NULL, NULL, 'user', NULL, NULL, NULL, '1134567899', NULL, '05 Feb, 2024', 'male', NULL, NULL, 'CY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 16:22:52', '2024-02-28 16:23:26'),
(121, 'PA416500', NULL, NULL, 'hokyrekek@mailinator.com', '$2y$12$rVmJfs8WT4ttswmbsKLtCu9zF92nAQJ8GhnTCKCLSGRSbIgKTCuHC', 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Repellen', '9087654322', NULL, NULL, NULL, 'Iusto quasi laborum', 'Rerum mollitia est o', 'India', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cleo Preston', '2024-02-28 09:27:17', '2024-02-28 09:27:17'),
(122, NULL, NULL, NULL, 'khjgf@dfgh.com', '$2y$12$7a6.4NXsELZcszEsnknOw.eWUQBS/rTLSTlJzeV8TEreHUYxoQP96', 'radiology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '741526', '3456709800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jhgfv', '2024-02-28 12:53:59', '2024-02-28 12:53:59'),
(123, 'QC8815', 'Professor', 'Preston Sandoval', 'xaxydivy@mailinator.com', '$2y$12$oK8sjwsAOgu72T4pYzxdE.nPhj8QrE68uwc3C16cDiQ8bZqrCiw.C', 'doctor', 1, '0', NULL, NULL, NULL, 'user', NULL, NULL, '7410852', '09876543267', NULL, '13 Feb, 1999', 'male', 'Velit et dolore et', 'Omnis lorem labore s', 'CF', '8765434567890', 'Quae aute quod qui p', 'Esse magna ipsum mo', NULL, NULL, NULL, NULL, NULL, 'Dolor excepteur corr', NULL, 'Asperiores fugiat h', 'Earum ut repudiandae', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 20:15:04', '2024-02-28 20:15:04'),
(124, 'PA33199', NULL, NULL, 'iuyg@rtyu.com', '$2y$12$OyBOB5bWGGrCU62Ho/bS1.iBSIYyc4PYBua/YuF3lXskP.mBlHOtq', 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, NULL, '765432345678', NULL, NULL, NULL, NULL, NULL, 'India', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'huyfdx', '2024-02-28 13:19:14', '2024-02-28 13:19:14'),
(125, 'PA970491', NULL, NULL, 'jbhgfW@retyu.com', '$2y$12$j6AyZbCzF9/nKjJPsmVLnO9sI1BrdQy62A3ld2InjBR4h2ZtClfbi', 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, '43567890', '4567876544567', NULL, NULL, NULL, 'jkuiytresrtgyu', 'kiugydterdtf', 'USA', '897654568987', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jbhgftdszfg', '2024-02-28 13:19:53', '2024-02-28 13:19:53'),
(126, 'PA728463', NULL, NULL, 'JBHJ@YOPMAIL.COM', '$2y$12$WVg6VqMfTf34JT4mMuD2zu9FPh6tcc1yJ8v8PBiQnM7mCOLJDmq1K', 'pathology', NULL, '0', NULL, NULL, NULL, 'user', NULL, NULL, NULL, '89652578421475', NULL, NULL, NULL, NULL, NULL, 'India', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'don\'t know', '2024-02-28 13:35:41', '2024-02-28 13:35:41'),
(127, 'NA873280', 'Mr', 'hareram patient', 'nurse@gmail.com', '$2y$12$DPSOzdT4vnWUKdmHjqXc2.meFI5xlULw7xE3XZIErvUqL0hCTs1tK', 'nurse', 2, '0', NULL, NULL, NULL, 'user', NULL, NULL, '1234', '12345676543', NULL, '01 Mar, 2024', 'male', 'noida', 'noida', 'DZ', '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-01 12:05:41', '2024-03-01 12:05:41'),
(128, 'QC298596', 'Miss', 'Walter Blackwell', 'gonat@mailinator.com', '$2y$12$CeA0LX4nMGcW7kEp09fAmuXMyIW8hJkSb1YhH6rkdhRpE8ea3Qgb6', 'doctor', 1, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Non proi', '896584658450', NULL, '31 Jul, 1981', 'female', 'Voluptatem incididu', 'Nihil aut tempore d', 'India', NULL, 'Esse ex est non non', 'Quis sunt laboriosam', NULL, NULL, NULL, NULL, NULL, 'Corporis officia ess', NULL, 'Sunt qui vero deseru', 'Earum libero dolor d', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-01 20:00:35', '2024-03-01 20:00:35'),
(129, 'QC972493', 'Sir', 'Yardley Willis', 'ravakepy@mailinator.com', NULL, 'doctor', 1, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Eos occa', '8989890000', NULL, '06 Mar, 2008', 'male', 'Id omnis perferendi', 'In aut consequatur', 'CY', NULL, 'Voluptas sunt sit vo', 'Est ad quas do corp', NULL, NULL, NULL, NULL, NULL, 'Vero magni voluptate', NULL, 'Ullamco do vero labo', 'Rerum quaerat ab quo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-01 20:03:23', '2024-03-01 20:06:09'),
(130, 'NA858515', 'Sir', 'Karen Turner', 'Karen@gmail.com', '$2y$12$egDHq/QIxJj3Kpay1Sg98.nL.NVCHu98fjazTOYEwjSP8ksMJEEB6', 'nurse', 9, '0', NULL, NULL, NULL, 'user', NULL, NULL, 'Et est d', '12345678986', NULL, '24 Feb, 2008', 'male', 'Fuga Qui laudantium', 'Dolores ut totam mol', 'India', '1234567543212', NULL, NULL, NULL, 'Qui occaecat velit', 2011, NULL, NULL, 'Soluta Nam cupiditat', 'Consectetur quidem a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-04 13:33:19', '2024-03-04 13:33:19');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `status` enum('0','1','','') DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctor_nurse`
--

INSERT INTO `doctor_nurse` (`id`, `doctor_id`, `nurse_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 2, 83, '0', '2024-02-27 10:32:07', '2024-02-27 10:32:07'),
(12, 2, 84, '0', '2024-02-27 10:32:07', '2024-02-27 10:32:07'),
(13, 102, 95, '0', '2024-02-27 10:32:07', '2024-02-27 10:32:07'),
(14, 102, 96, '0', '2024-02-27 10:32:07', '2024-02-27 10:32:07'),
(18, 110, 83, '0', '2024-02-28 05:10:18', '2024-02-28 05:10:18'),
(19, 113, 83, '0', '2024-02-28 05:47:11', '2024-02-28 05:47:11'),
(20, 113, 84, '0', '2024-02-28 05:47:11', '2024-02-28 05:47:11'),
(24, 114, 96, '0', '2024-02-28 07:22:00', '2024-02-28 07:22:00'),
(26, 120, 105, '0', '2024-02-28 09:23:26', '2024-02-28 09:23:26'),
(27, 123, 83, '0', '2024-02-28 13:15:04', '2024-02-28 13:15:04'),
(28, 123, 95, '0', '2024-02-28 13:15:04', '2024-02-28 13:15:04'),
(29, 123, 96, '0', '2024-02-28 13:15:04', '2024-02-28 13:15:04'),
(30, 123, 104, '0', '2024-02-28 13:15:04', '2024-02-28 13:15:04'),
(31, 123, 106, '0', '2024-02-28 13:15:04', '2024-02-28 13:15:04'),
(32, 128, 83, '0', '2024-03-01 13:00:35', '2024-03-01 13:00:35'),
(33, 128, 84, '0', '2024-03-01 13:00:35', '2024-03-01 13:00:35'),
(34, 128, 95, '0', '2024-03-01 13:00:35', '2024-03-01 13:00:35'),
(35, 128, 96, '0', '2024-03-01 13:00:35', '2024-03-01 13:00:35'),
(52, 129, 83, '0', '2024-03-01 13:06:09', '2024-03-01 13:06:09'),
(53, 129, 84, '0', '2024-03-01 13:06:09', '2024-03-01 13:06:09'),
(54, 129, 95, '0', '2024-03-01 13:06:09', '2024-03-01 13:06:09'),
(55, 129, 96, '0', '2024-03-01 13:06:09', '2024-03-01 13:06:09'),
(56, 129, 105, '0', '2024-03-01 13:06:09', '2024-03-01 13:06:09'),
(57, 129, 106, '0', '2024-03-01 13:06:09', '2024-03-01 13:06:09'),
(58, 129, 107, '0', '2024-03-01 13:06:09', '2024-03-01 13:06:09'),
(59, 129, 127, '0', '2024-03-01 13:06:09', '2024-03-01 13:06:09');

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
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` longtext DEFAULT NULL,
  `footer_content` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `custom_date` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `facebook_link` text DEFAULT NULL,
  `twitter_link` text DEFAULT NULL,
  `instagram_link` text DEFAULT NULL,
  `linkedin_link` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `title`, `desc`, `footer_content`, `address`, `email`, `phone`, `custom_date`, `img`, `img2`, `facebook_link`, `twitter_link`, `instagram_link`, `linkedin_link`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore inventoresapiente corporis voluptates at rerum.', ' All Right Reserved by Qastarat & Dawali Clinics - Developed by TechMave Software .', 'Sandal Pugnies,Wakefield (UK).', 'example@gmail.com', 8902392345, '2023-24', 'qastrat-logo2.png', 'qastrat-logo2.png', '#', '#', '#', '#', '2024-01-02 09:48:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` longtext DEFAULT NULL,
  `icon_img` varchar(255) DEFAULT NULL,
  `slider_img` varchar(255) DEFAULT NULL,
  `doctors` bigint(20) DEFAULT NULL,
  `happy_patient` bigint(20) DEFAULT NULL,
  `years_experience` bigint(20) DEFAULT NULL,
  `satisfaction` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `title`, `desc`, `icon_img`, `slider_img`, `doctors`, `happy_patient`, `years_experience`, `satisfaction`, `created_at`, `updated_at`) VALUES
(1, 'Hello Welcome to QASTARAT & DAWALI CLINICS', 'We Care Patient And Their Families', 'hi.png', 'bnr123.png', 200, 3200, 30, 100, '2024-01-02 06:48:40', '2024-01-02 18:31:28');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nurse_doctor`
--

INSERT INTO `nurse_doctor` (`id`, `nurse_id`, `doctor_id`, `status`, `created_at`, `updated_at`) VALUES
(9, 106, 12, '0', '2024-02-27 13:21:41', '2024-02-27 13:21:41'),
(15, 107, 2, '0', '2024-02-27 13:23:47', '2024-02-27 13:23:47'),
(16, 111, 2, '0', '2024-02-28 05:15:39', '2024-02-28 05:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `nurse_tasks`
--

CREATE TABLE `nurse_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) DEFAULT NULL,
  `doctor_id` bigint(100) UNSIGNED DEFAULT NULL,
  `nurse_id` bigint(255) UNSIGNED DEFAULT NULL,
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

INSERT INTO `nurse_tasks` (`id`, `patient_id`, `doctor_id`, `nurse_id`, `pathology_price_list_id`, `status`, `form_type`, `test_type`, `created_at`, `updated_at`) VALUES
(1, '100', 2, 83, '[\"62\",\"61\",\"60\"]', 'pending', 'general_form', 'radiology', '2024-03-01 12:07:21', '2024-03-01 12:07:21'),
(2, '100', 2, 84, '[\"62\",\"61\",\"60\"]', 'pending', 'general_form', 'radiology', '2024-03-01 12:07:21', '2024-03-01 12:07:21'),
(3, '100', 2, 83, '[\"57\",\"56\",\"55\"]', 'pending', 'general_form', 'pathology', '2024-03-01 12:08:39', '2024-03-01 12:08:39'),
(4, '100', 2, 84, '[\"57\",\"56\",\"55\"]', 'pending', 'general_form', 'pathology', '2024-03-01 12:08:39', '2024-03-01 12:08:39'),
(5, '100', 2, 83, '[\"59\",\"15\"]', 'pending', 'general_form', 'radiology', '2024-03-01 12:11:23', '2024-03-01 12:11:23'),
(6, '100', 2, 84, '[\"59\",\"15\"]', 'pending', 'general_form', 'radiology', '2024-03-01 12:11:23', '2024-03-01 12:11:23'),
(7, '91', 2, 83, '[\"13\",\"11\",\"8\"]', 'pending', 'ShoulderPain', 'pathology', '2024-03-08 05:43:21', '2024-03-08 05:43:21'),
(8, '91', 2, 84, '[\"13\",\"11\",\"8\"]', 'pending', 'ShoulderPain', 'pathology', '2024-03-08 05:43:21', '2024-03-08 05:43:21');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `facebook_link` text DEFAULT NULL,
  `twitter_link` text DEFAULT NULL,
  `instagram_link` text DEFAULT NULL,
  `linkedin_link` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `price_type` enum('0','1','','') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pathology_price_list`
--

INSERT INTO `pathology_price_list` (`id`, `test_name`, `test_code`, `included_tests`, `turnaround`, `note`, `price`, `price_type`, `created_at`, `updated_at`) VALUES
(1, '17 Hydroxyprogesterone', '1 week', '17 Hydroxyprogesterone', '1 week	', 'Aliquot from 24hr urine (on acid). State total volume collected on request form.', '12', NULL, '2024-01-22 06:19:28', '2024-01-22 13:19:28'),
(2, '17 Hydroxyprogesterone 1', '3', '17 Hydroxyprogesterone 5', '12', 'Aliquot from 24hr urine (on acid). State total volume collected on request form.  6', '20 4', NULL, '2024-01-22 06:25:42', '2024-01-22 13:19:16'),
(3, 'A', 'B', '123', 'C', '123', '23', NULL, '2024-01-22 07:00:25', '2024-01-22 07:00:25'),
(4, '123', '123', 'ER', '12', 'ER', '12', NULL, '2024-01-22 07:00:25', '2024-01-22 07:00:25'),
(5, '21', '21', '21', '21', '21', '21', NULL, '2024-01-22 07:01:56', '2024-01-22 07:01:56'),
(6, '12', '23', NULL, '23', NULL, NULL, '1', '2024-01-22 07:23:28', '2024-01-22 07:23:28'),
(7, 'A', NULL, '12', 'C', 'ER', '3', '0', '2024-02-20 11:54:06', '2024-01-22 07:33:25'),
(8, 'Adria Hamilton', 'Soluta non fugiat as', 'Sunt perferendis rer', NULL, 'Porro deleniti expli', '697', '0', '2024-02-20 11:53:17', '2024-01-24 10:41:16'),
(9, 'Laith Mooney', 'Omnis nulla quam qua', 'Reprehenderit consec', 'Laudantium corporis', 'Dolore ut assumenda', '924', '0', '2024-01-24 10:41:16', '2024-01-24 10:41:16'),
(10, 'Wyoming Merritt', 'Eius in ut est eu oc', 'Minim eaque voluptat', 'Omnis minim quos in', 'Commodi cillum moles', '830', '1', '2024-01-24 10:41:56', '2024-01-24 10:41:56'),
(11, 'Hashim Dickerson', 'Ut a fugiat et eum', 'Deserunt laborum ad', 'Eu facere consectetu', 'Voluptatibus error e', '947', '1', '2024-01-24 10:41:56', '2024-01-24 10:41:56'),
(12, 'Nevada Ortega', 'Labore doloribus nos', NULL, 'Officia sed libero a', 'Autem minima et haru', '365', '0', '2024-02-20 11:53:02', '2024-02-20 11:28:58'),
(13, 'Talon Bolton', 'Duis sapiente dolor', 'Non labore dolor eni', 'Id iusto est nostrum', 'Nemo sit cillum ven', NULL, '0', '2024-02-20 11:52:49', '2024-02-20 11:28:58'),
(14, 'Nasim Alford', 'Praesentium asperiorrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 'Molestias ut sit alibbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 'Error aut elit sunttttttttttttttttttttttt', '36.25+', '261', '0', '2024-02-20 11:54:18', '2024-02-20 11:35:38'),
(15, 'Elmo Melendez', 'Maxime pariatur Sun', 'Optio voluptatem L', 'Assumenda odit quis', 'Dolore sit sunt opti', '848', '1', '2024-02-28 12:40:36', '2024-02-20 12:19:25'),
(16, 'ihgjhk', NULL, NULL, NULL, NULL, NULL, '0', '2024-02-23 09:55:06', '2024-02-23 09:55:06'),
(17, 'Mufutau House', 'Illum molestiae sin', 'Molestiae placeat v', 'Distinctio Consecte', 'Qui non quod excepte', '910', '0', '2024-02-28 10:43:54', '2024-02-28 10:43:54'),
(18, 'Caldwell Byrd', 'Rerum consequatur no', 'Quis repellendus Ev', 'Expedita labore quib', 'Officiis rerum provi', '29', '0', '2024-02-28 10:44:30', '2024-02-28 10:44:30'),
(19, 'Neve Vinson', 'Ratione sunt dolori', 'Sunt est sunt evenie', 'Qui et neque excepte', 'Non anim eveniet ip', '430', '0', '2024-02-28 10:44:48', '2024-02-28 10:44:48'),
(20, 'Demetria Hunter', 'Pariatur Maiores in', 'Aute qui est laboris', 'Vel anim ullam rerum', 'Consectetur et bland', '771', '0', '2024-02-28 10:48:23', '2024-02-28 10:48:23'),
(21, 'Iris Little', 'A', 'N', 'N', 'A', '3', '0', '2024-02-28 10:59:07', '2024-02-28 10:59:07'),
(22, 'Julie Weiss', 'D', 'E', 'V', 'L', '1', '0', '2024-02-28 11:00:39', '2024-02-28 11:00:39'),
(23, 'Amal Simpson', 'Dolor architecto vit', 'Sunt ea quam nemo pa', 'Voluptas in incididu', 'D', '919', '0', '2024-02-28 11:01:10', '2024-02-28 11:01:10'),
(24, 'Barbara Fleming', 'Perspiciatis nobis', 'Nulla modi error ven', 'Quas illo similique', 'I', '562', '0', '2024-02-28 11:01:35', '2024-02-28 11:01:35'),
(25, 'Test Name', 'Test Name Test Code', 'Included Tests', 'Turnaround', 'N', '100', '0', '2024-02-28 11:02:28', '2024-02-28 11:02:28'),
(26, 'Neve Mcguire', 'Eos qui non est acc', 'Atque ipsum aliquid', 'Eum voluptatibus dol', 'Inventore odio a ut', '872', '0', '2024-02-28 11:03:13', '2024-02-28 11:03:13'),
(27, 'Kylan Fleming', NULL, NULL, NULL, NULL, '861', '0', '2024-02-28 11:03:47', '2024-02-28 11:03:47'),
(28, 'Angelica Perez', 'Voluptatem iusto non', 'Similique reprehende', 'Atque provident atq', 'Iure praesentium rec', '951', '0', '2024-02-28 11:10:15', '2024-02-28 11:10:15'),
(29, 'Andrew Castro', 'Omnis consectetur ex', 'Aut perferendis exer', 'Mollit dolore debiti', 'Ut sequi ut nobis ad', '303', '0', '2024-02-28 11:19:13', '2024-02-28 11:19:13'),
(30, 'Molly Watts', 'Fugiat voluptas ut', 'Sint natus voluptati', 'Voluptates eius assu', 'Iusto perspiciatis', '845', '0', '2024-02-28 11:19:13', '2024-02-28 11:19:13'),
(31, 'Clio Price', 'Temporibus repudiand', 'Repudiandae voluptat', 'Non pariatur Anim c', 'Neque ipsam fugiat n', '516', '0', '2024-02-28 11:19:29', '2024-02-28 11:19:29'),
(32, 'Jemima Wilkerson', 'Consectetur sed lab', 'Sapiente rem laudant', 'Veritatis non delect', 'Aut sint necessitat', '604', '0', '2024-02-28 11:19:29', '2024-02-28 11:19:29'),
(33, 'Macey Morse', 'Saepe veniam aut vo', 'Aut amet tempore a', 'A est esse et accus', 'Ad praesentium velit', '555', '0', '2024-02-28 11:30:32', '2024-02-28 11:30:32'),
(34, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2024-02-28 11:31:06', '2024-02-28 11:31:06'),
(35, 'Dillon Boyle', 'Ut et sit id sed iur', 'Atque excepturi dolo', 'Tempor amet dolores', 'Iure laboris impedit', '252', NULL, '2024-02-28 11:39:45', '2024-02-28 11:39:45'),
(36, 'Nelle Smith', 'Dolor enim numquam q', 'Commodi rem enim seq', 'Ea ea eiusmod volupt', 'In sed suscipit quas', '550', NULL, '2024-02-28 11:40:05', '2024-02-28 11:40:05'),
(37, 'Sonia Copeland', 'Ut sit repudiandae a', 'Eius et voluptatum e', 'Dolorem sit est saep', 'Nobis sed corporis e', '702', NULL, '2024-02-28 11:40:19', '2024-02-28 11:40:19'),
(38, 'Jenette Key', 'Mollit irure fugiat', 'Quis ad aut accusant', 'Cupidatat quasi ut e', 'In enim deleniti tem', '49', NULL, '2024-02-28 11:42:24', '2024-02-28 11:42:24'),
(39, 'Luke Hampton', 'Velit magna volupta', 'Dolor nesciunt in e', 'Do quia harum veniam', 'Asperiores ut in dol', '917', NULL, '2024-02-28 11:57:18', '2024-02-28 11:57:18'),
(40, 'Philip Harmon', 'Aperiam velit at dol', 'Reprehenderit inven', 'Ipsa magni facilis', 'Est veniam archite', '153', NULL, '2024-02-28 11:57:18', '2024-02-28 11:57:18'),
(41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 11:58:10', '2024-02-28 11:58:10'),
(42, '', '', '', '', '', '', '', '2024-02-28 12:23:34', '2024-02-28 12:23:34'),
(43, 'Ori Rodriquez', 'Ut quis dolore quas', 'Libero voluptatum al', 'Eaque dolores exerci', 'Consectetur aliquip', '357', '0', '2024-02-28 12:23:34', '2024-02-28 12:23:34'),
(44, 'Stella Beck', 'Officia aut commodo', 'Enim voluptas sint m', 'Deserunt nisi quam a', 'Aspernatur qui in ea', '643', '0', '2024-02-28 12:23:34', '2024-02-28 12:23:34'),
(45, '', '', '', '', '', '', '', '2024-02-28 12:23:45', '2024-02-28 12:23:45'),
(46, '', '', '', '', '', '', '', '2024-02-28 12:23:51', '2024-02-28 12:23:51'),
(47, '', '', '', '', '', '', '', '2024-02-28 12:23:58', '2024-02-28 12:23:58'),
(48, NULL, 'Dolor architecto vit', NULL, NULL, NULL, '45', NULL, '2024-02-28 12:25:17', '2024-02-28 12:25:17'),
(49, 'Griffin Burton', 'Sit dolore magni no', 'Qui labore consequat', 'Omnis do nobis conse', 'Adipisicing incidunt', '628', '0', '2024-02-28 12:25:39', '2024-02-28 12:25:39'),
(50, 'Cade Medina', 'Consequuntur consequ', 'In incididunt autem', 'Voluptatem sunt con', 'Consequuntur do vel', '285', '0', '2024-02-28 12:26:12', '2024-02-28 12:26:12'),
(51, 'Rae Cohen', 'Quos quis ea fugit', 'Laborum Incididunt', 'Velit porro mollitia', 'Repellendus Provide', '126', '0', '2024-02-28 12:26:12', '2024-02-28 12:26:12'),
(52, 'Rae Frye', 'Totam voluptatem Au', 'Illo eum voluptate l', 'Quis officiis minima', 'Autem reprehenderit', '699', '0', '2024-02-28 12:26:12', '2024-02-28 12:26:12'),
(53, 'Olympia Bond', 'Amet pariatur Quo', 'Ea sequi commodo sin', 'Beatae eos do volup', 'Cillum non asperiore', '899', '0', '2024-02-28 12:26:12', '2024-02-28 12:26:12'),
(54, 'Alika Fox', 'Culpa duis eum rem c', 'Ullamco qui at volup', 'Placeat reiciendis', 'Aute qui neque offic', '773', '0', '2024-02-28 12:26:12', '2024-02-28 12:26:12'),
(55, 'Cathleen Wilder', 'Aliquam facilis cons', 'Ut est cupiditate m', 'Proident tempore l', 'Praesentium deserunt', '600', '0', '2024-02-28 12:27:15', '2024-02-28 12:27:01'),
(56, 'Kendall Lucas', 'Id assumenda consect', 'Totam maiores ipsum', 'Exercitationem aliqu', 'Distinctio Suscipit', '634', '0', '2024-02-28 12:27:45', '2024-02-28 12:27:45'),
(57, 'testinggg', NULL, NULL, NULL, NULL, NULL, '0', '2024-02-28 12:34:39', '2024-02-28 12:34:39'),
(58, 'testingg', '123', 'evcfe', 'idji', 'fcerf', '43', '0', '2024-02-28 12:35:14', '2024-02-28 12:34:59'),
(59, 'Jessica Pickett', 'Est ducimus officia', 'Quasi sed nesciunt', 'Dicta vel eos culpa', 'Quod ex qui dolores', '591', '1', '2024-02-28 12:41:05', '2024-02-28 12:41:05'),
(60, 'Nevada Wiggins', 'Est deserunt aperiam', 'Optio aliquip unde', 'Iste ab ut modi labo', 'Ex eum rerum illum', '823', '1', '2024-02-28 12:43:45', '2024-02-28 12:43:45'),
(61, 'Kaseem Pratt', 'In aliquam culpa qu', 'Ipsa ad exercitatio', 'Obcaecati do modi ir', 'Repudiandae sint vo', '909', '1', '2024-02-28 12:43:45', '2024-02-28 12:43:45'),
(62, 'kdmq', 'wkjene12', 'kjjnedmok', 'kjemednk', 'keirjr', '99', '1', '2024-02-28 12:59:50', '2024-02-28 12:59:50'),
(63, 'kwendk', NULL, NULL, NULL, NULL, NULL, '1', '2024-02-28 13:00:04', '2024-02-28 13:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
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
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `title`, `name`, `email`, `is_verified`, `patient_profile_img`, `role`, `email_verified_at`, `password`, `remember_token`, `post_code`, `mobile_no`, `sirname`, `birth_date`, `gendar`, `street`, `town`, `country`, `landline`, `document_type`, `patient_id`, `gp`, `kin`, `policy_no`, `additional_info`, `tags`, `created_at`, `updated_at`) VALUES
(2, NULL, NULL, 'userS', 'patient@gmail.com', '0', 'team-3.jpg', 'user', NULL, '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', 'kktAEaWn1EJ1Kgc73UVcJabC1KPLUR', 1234, 1234567890, 'Mrs', '04 Dec, 2000', 'male', 'noida', 'noida', 'Algeria', '987654321', 'Address proof', 'QD001', '98765432100', NULL, 'sunny po', 'okkk', '<div class=\"category\">ssss<i class=\"remove-category fas fa-times\"></i></div>', '2023-12-19 20:57:59', '2024-01-08 20:30:43'),
(4, NULL, NULL, 'hareram 2', 'patient12@gmail.com', '0', 'team-2.jpg', 'user', NULL, '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', NULL, 90909, 990900909, 'dr', '06 Dec, 1998', 'male', 'noida', 'noida 1', 'Albania', '909090909', 'Address proof', 'pat12345', NULL, NULL, NULL, NULL, NULL, '2023-12-20 01:14:53', '2023-12-20 01:14:53'),
(33, NULL, NULL, 'lalit', 'lalit1233@gmail.com', '0', 'team-5.jpg', 'user', NULL, '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', NULL, 91008, 8987365432, 'Mrs', '10 Dec, 2000', 'female', 'noida 3', 'noida 4', 'American Samoa', '998765439', 'Passport', 'lait00124560', '92765432100', 'kin test', '123456780', 'ok...... testing', '<div class=\"category\">ok<i class=\"remove-category fas fa-times\"></i></div><div class=\"category\">TR<i class=\"remove-category fas fa-times\"></i></div><div class=\"category\">DE<i class=\"remove-category fas fa-times\"></i></div>', '2023-12-21 12:40:45', '2024-01-09 11:50:36'),
(34, NULL, NULL, 'Martha Leach', 'fovaq@mailinator.com', '0', '1181933958.png', 'user', NULL, '$2y$12$O5brMtCBdvy.zizxpOlJguZwEayIB80WSnOR1QZetOcPan7SgFwJK', NULL, 123456789, 909098888, 'Professor', '09 Mar, 1997', 'male', 'Aliquip accusantium', 'Placeat nulla eaque', 'Armenia', '1234567890', 'Address proof', 'MA836196', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, NULL, NULL, 'Clarke Macdonald', 'lesihyzun@mailinator.com', '0', '1582233871.png', 'user', NULL, '$2y$12$1V8oAMsCw1OHg9e8rbna4uJCi7bLDxVMVLZ142scZogd1EOqmHqzS', NULL, 1234, 8888788787, 'Lady', '15 Sep, 1972', 'female', 'Sunt elit ut culpa', 'Consectetur ratione', 'Aruba', '12345678', 'Address proof', 'MA509999', NULL, NULL, NULL, NULL, NULL, '2024-01-09 05:56:22', '2024-01-09 05:56:22'),
(36, NULL, NULL, 'Nyssa Mcdonald', 'bawijakit@mailinator.com', '0', '849163702.png', 'user', NULL, '$2y$12$FJi/5cnVLj1CEB48hqkElOg5CPsYTAy/.uMoavCf.SLpEY/1ujUrS', NULL, 123456, 909000000, 'Sir', '03 Mar, 2003', 'female', 'Accusantium sapiente', 'Sapiente non repelle', 'Albania', '1234567', 'Address proof', 'MA261804', NULL, NULL, NULL, NULL, NULL, '2024-01-09 06:44:00', '2024-01-09 06:44:00'),
(37, NULL, NULL, 'hareram kumar', 'doctor2iii@gmail.com', '0', '1692048410.png', 'user', NULL, '$2y$12$ESsmd3pzlDWVm1l5jrARlevUfWkNw2.Tq3NlIDDUZK4lAQu8alUJ6', NULL, 1234, 39087654320, 'mr', '01 Jan, 2024', 'male', 'noida', 'noida', 'Åland Islands', '12534567890', 'Passport', 'MA210964', NULL, NULL, NULL, NULL, NULL, '2024-01-09 06:45:49', '2024-01-09 06:45:49'),
(39, NULL, NULL, 'Raya Guerra updated', 'foqe@mailinator.com', '0', '829699114.png', 'user', NULL, '$2y$12$elSqCTETELwvy2zQ/HW8M.E4/pB/RMuxZQGKpFjY3ZeasorNnixI.', NULL, 876543, 79234567890, 'Mrs', '07 Jan, 1991', 'female', 'Quis obcaecati omnis', 'Id iste veniam ab q', 'Albania', '987654321', 'Passport', 'MA812405', NULL, NULL, NULL, 'ok', NULL, '2024-01-09 09:22:39', '2024-01-09 17:33:41'),
(40, NULL, NULL, 'Saurabh KR', 'kr@gmail.com', '0', '1295613480.png', 'user', NULL, '$2y$12$MXJ3kADVrnENLkCSWb2QjOEB3wwwyYntBsKP0aX01LcLGqrPInjSe', NULL, 123456, 123456, 'mr', '03 Mar, 2010', 'male', 'Demo address', 'demo', 'Antigua and Barbuda', '1564856', 'Address proof', 'MA571746', NULL, NULL, NULL, NULL, NULL, '2024-01-15 04:07:10', '2024-01-15 04:07:10'),
(59, 'MA883664', NULL, 'Dakota Freeman', 'kucerepu@mailinator.com', '0', NULL, 'user', NULL, NULL, NULL, 789, 987654321, NULL, '03-Jun-2001', 'female', 'Numquam sapiente des', 'Sed praesentium amet', 'PT', '26', 'Address Proof', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-16 11:31:46', '2024-01-16 11:31:46'),
(61, NULL, 'Mr', 'User', 'user@gmail.com', '0', NULL, 'user', NULL, '$2y$12$LPKjNTzh1VJHMgkRGRjQ3u9HRXi6nzuyzc0DVPDMUq44SfURLaTY2', NULL, 989898, 4898765430, NULL, 'User', NULL, NULL, NULL, 'CX', '0987654321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-17 07:33:02', '2024-01-23 20:03:15'),
(64, NULL, NULL, 'manish', 'manish@gmail.com', '1', '2001477828.png', 'user', NULL, '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', NULL, 251201, 7248702312, 'mr', '12 Jan, 2024', 'male', 'muzaffarnagar', 'noida', 'Albania', '1232', 'Address proof', 'MA241402', NULL, NULL, NULL, 'ggg', NULL, '2024-01-17 07:41:36', '2024-01-23 17:09:52'),
(65, NULL, 'Dr', 'Eden Watkins edit', 'wazig@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$MTuwfMHJF6aGHDlvK6PgoOKrDyhStUdUyRcb44IF5jbs5AUp2/fE2', NULL, 999, 917654321, NULL, 'Eden Watkins', 'male', 'Officiis culpa inci', 'Facilis rem enim acc', 'CX', '6209090990', 'Passport', 'MA95613', NULL, NULL, NULL, NULL, NULL, '2024-01-23 19:08:24', '2024-01-24 12:07:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(21, 91, 'kjhgbjk', '2024-03-08 12:48:54', '2024-03-08 12:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `patient_appointments`
--

CREATE TABLE `patient_appointments` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `appointment_type` longtext CHARACTER SET utf16le COLLATE utf16le_bin DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patient_appointments`
--

INSERT INTO `patient_appointments` (`id`, `patient_id`, `date`, `appointment_type`, `location`, `start_date`, `start_time`, `end_date`, `end_time`, `cost`, `code`, `clinic_type`, `confirmation_immediately`, `created_at`, `updated_at`) VALUES
(9, 2, '09 Jan, 2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', '2024-01-08 19:25:28', '2024-01-08 19:25:28'),
(10, 33, '12 Jan, 2024', 'Image guided MSK / pain injection - HA حقن إالتهاب/ألم المفاصل بتوجية الأشعة-حقن زيتية', 'DUBAI', '07 Jan, 2024', '12:01 AM', '07 Jan, 2024', NULL, '12', NULL, NULL, 'no', '2024-01-09 11:52:19', '2024-01-09 11:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `patient_bericoceleEmbo_diagnosis`
--

CREATE TABLE `patient_bericoceleEmbo_diagnosis` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_name` varchar(255) DEFAULT NULL,
  `data_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_clinical_exams`
--

CREATE TABLE `patient_clinical_exams` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `write_text` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(25, 98, 'ojiloilkk', '6633', '4745', 'yes', '12 Feb, 2024', '6363', '01 Feb, 2024', '2024-02-27 16:04:49', '2024-02-27 16:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `patient_diagnosis`
--

CREATE TABLE `patient_diagnosis` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_name` varchar(255) DEFAULT NULL,
  `data_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_future_plans`
--

CREATE TABLE `patient_future_plans` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `plan_text` text DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patient_future_plans`
--

INSERT INTO `patient_future_plans` (`id`, `patient_id`, `plan_text`, `date`, `created_at`, `updated_at`) VALUES
(7, 98, 'jkbkjjbj', '01 Feb, 2024', '2024-02-27 16:06:41', '2024-02-27 16:06:41'),
(8, 98, 'okkkkkkkkkkk', '20 Feb, 2024', '2024-02-27 18:32:24', '2024-02-27 18:32:24'),
(9, 91, 'kjh', '26 Apr, 2019', '2024-03-08 12:48:33', '2024-03-08 12:48:33');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(25, 2, 'my khan SDVV', '452316565SDF', 'active', '2024-01-08 19:23:38', '2024-02-27 14:36:03'),
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
(37, 91, 'jas', '95623541', 'active', '2024-03-08 12:50:30', '2024-03-08 12:50:30');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `summery` text DEFAULT NULL,
  `status` enum('pending','complete') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `procedure_name` varchar(255) DEFAULT NULL,
  `entry` longtext DEFAULT NULL,
  `summary` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patient_order_procedures`
--

INSERT INTO `patient_order_procedures` (`id`, `patient_id`, `procedure_name`, `entry`, `summary`, `created_at`, `updated_at`) VALUES
(10, 9, 'Pre-Procedure Order', 'test', 'test', '2023-12-29 12:32:48', '2023-12-29 12:32:48'),
(12, 6, 'Pre-Procedure Order', 'Procedure Entry', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras gravida lectus in magna accumsan porta. Vivamus id quam aliquam, pharetra est a, commodo ipsum. Praesent at erat vitae elit tempus convallis. Vivamus accumsan ligula sed enim ultrices ullamcorper. Donec ipsum erat, bibendum a eros vel, vehicula auctor ante. Donec porta, nibh at tincidunt feugiat, sapien urna rutrum sem, nec posuere ex orci nec urna. Donec aliquet porta justo, ut venenatis arcu. Duis euismod augue dui, sit amet vehicula nulla pellentesque et. Curabitur lobortis diam sed libero vestibulum mollis. Donec egestas justo interdum, porttitor ligula a, scelerisque tellus. Ut interdum leo nunc, vitae auctor lorem laoreet ut.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu sem mattis, commodo nibh in, lacinia nisl. Suspendisse sit amet nulla maximus, tempor dui et, gravida leo. Mauris vel turpis facilisis, fermentum nisi non, suscipit enim. Phasellus scelerisque quam lobortis ex porta scelerisque. Phasellus in elit tincidunt, porta est vitae, euismod mauris. Aenean eleifend turpis felis, molestie lacinia urna sagittis eget. Vivamus at orci tincidunt, consequat lorem id, hendrerit enim. Cras tristique tellus a pellentesque varius. Nulla hendrerit, ligula eget euismod aliquet, elit lectus posuere nulla, eget cursus tortor urna eget quam. Vestibulum lacinia libero posuere nunc egestas, a porta lacus cursus. Morbi sed eros quis elit tincidunt pretium sed non urna. Donec suscipit ultricies lectus vel sodales. Ut luctus risus at mi lobortis, vel convallis est semper. Curabitur facilisis urna ac tellus scelerisque, ac commodo nibh placerat.\r\n\r\nCurabitur tristique hendrerit odio, ac rhoncus quam sodales vel. Sed erat elit, sagittis vitae eleifend et, gravida vel mi. Vestibulum nec vulputate dolor. Integer odio dolor, lacinia ut cursus ac, pulvinar eget ligula. Quisque tristique risus feugiat, dignissim orci eleifend, suscipit felis. Sed at dui neque. Vestibulum accumsan sem arcu, non gravida arcu pretium sit amet. Nullam dignissim porttitor nisi, quis pharetra justo maximus ut. Vestibulum bibendum mattis nisl, ac suscipit nunc tempor quis. Nunc condimentum non ligula sit amet molestie. Pellentesque luctus massa sed fermentum facilisis.\r\n\r\nUt eget tellus condimentum, tempus erat vel, posuere lectus. Vivamus ut justo turpis. Pellentesque sed placerat velit. Nam a sagittis enim, ut commodo massa. Pellentesque sagittis laoreet porttitor. Suspendisse facilisis pharetra ex, placerat lobortis urna pulvinar vitae. Mauris porta leo vel purus ullamcorper tincidunt. Aenean in ullamcorper lectus, quis sollicitudin nisl. Curabitur rutrum dictum gravida. Sed pulvinar lectus non augue efficitur tincidunt. Fusce auctor tristique elit, ac sollicitudin mauris porta id.\r\n\r\nPellentesque tellus metus, pharetra ut nunc quis, imperdiet dapibus neque. Morbi ut tempus massa. Quisque congue auctor pretium. Duis eu ipsum justo. Donec fermentum facilisis turpis et aliquam. Maecenas finibus congue libero sit amet malesuada. Fusce pharetra mauris a luctus tincidunt. Donec mattis libero efficitur, ultrices ex sed, rutrum ligula. Donec elementum lorem sit amet mi finibus aliquam. Aenean mauris metus, vulputate sit amet posuere non, eleifend eget ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque consectetur mi, ut rutrum erat vestibulum sit amet. Donec id dignissim nulla. Nullam sed sapien pulvinar, consequat erat vel, egestas lorem. Aliquam vel enim a quam ultricies fringilla id sed mi.', '2024-01-02 18:18:22', '2024-01-02 18:18:22'),
(13, 39, 'Pre-Procedure Order', 'Debitis impedit con', 'Blanditiis soluta se', '2024-01-09 17:07:08', '2024-01-09 17:07:08'),
(14, 37, 'Procedure Record', 'Magni illum necessi', 'Et exercitationem ad', '2024-01-09 18:39:48', '2024-01-09 18:39:48'),
(15, 39, 'Procedure Record', 'Perspiciatis qui to', 'Vitae ut et molestia', '2024-01-09 20:20:55', '2024-01-09 20:20:55'),
(16, 40, 'Pre-Procedure Order', 'demo', 'demo', '2024-01-15 11:12:57', '2024-01-15 11:12:57'),
(17, 40, 'Discharge Order', 'Patient is discharge', 'DEMO DISCHARGE', '2024-01-15 11:13:32', '2024-01-15 11:13:32'),
(18, 68, 'Procedure Record', 'SWAEFRDGT', 'WEFGTRFHY', '2024-02-14 17:09:49', '2024-02-14 17:09:49'),
(19, 98, 'Procedure Record', 'ojibhk,', 'ytugihbjn', '2024-02-27 16:05:32', '2024-02-27 16:05:32'),
(20, 98, 'Pre-Procedure Order', ',nk', 'oiijolk', '2024-02-27 18:30:29', '2024-02-27 18:30:29'),
(21, 91, 'Procedure Record', 'gfhjk', 'kjhgfgh', '2024-03-08 12:46:33', '2024-03-08 12:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `patient_past_medical_histories`
--

CREATE TABLE `patient_past_medical_histories` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `diseases_name` varchar(255) DEFAULT NULL,
  `describe` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(30, 98, 'jnnknlkjjbjkjn', '864605342', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_past_surgical_histories`
--

CREATE TABLE `patient_past_surgical_histories` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `diseases_name` varchar(255) DEFAULT NULL,
  `describe` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(37, 98, 'lknkl', 'poihjop9uiyhj', '2024-02-27 16:04:06', '2024-02-27 16:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `patient_pelvicCongEmbo_diagnosis`
--

CREATE TABLE `patient_pelvicCongEmbo_diagnosis` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_name` varchar(255) DEFAULT NULL,
  `data_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(8, 91, 'yguhjkl*2', '2024-03-08 12:47:03', '2024-03-08 12:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `patient_progress_notes`
--

CREATE TABLE `patient_progress_notes` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `progress_note_canned_text_id` bigint(20) UNSIGNED DEFAULT NULL,
  `progress_note_contents_id` bigint(20) UNSIGNED DEFAULT NULL,
  `voice_recognition` text DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `appointment_type` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `details` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile_no` bigint(20) DEFAULT NULL,
  `recall_reminder` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `invoice_item` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patient_progress_notes`
--

INSERT INTO `patient_progress_notes` (`id`, `patient_id`, `progress_note_canned_text_id`, `progress_note_contents_id`, `voice_recognition`, `day`, `appointment_type`, `date`, `details`, `email`, `mobile_no`, `recall_reminder`, `invoice_item`, `created_at`, `updated_at`) VALUES
(5, 2, 2, 1, 'QSDFG', 'SADF', NULL, 'Years', NULL, 'SDF', NULL, 'inactive', 'inactive', NULL, NULL),
(6, 91, 4, 3, 'uytrewrty', 'tryu', 'CT / Fluro Guided joint / facet RFA (Radio-Frequency) ablation', 'Days', 'iuytres', 'iuhygtf@ertyuj', 98658965875, 'active', 'active', NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patient_progress_note_details`
--

INSERT INTO `patient_progress_note_details` (`id`, `patient_id`, `progress_note_canned_text_id`, `progress_note_contents_id`, `describe`, `created_at`, `updated_at`) VALUES
(5, 6, 3, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras gravida lectus in magna accumsan porta. Vivamus id quam aliquam, pharetra est a, commodo ipsum. Praesent at erat vitae elit tempus convallis. Vivamus accumsan ligula sed enim ultrices ullamcorper. Donec ipsum erat, bibendum a eros vel, vehicula auctor ante. Donec porta, nibh at tincidunt feugiat, sapien urna rutrum sem, nec posuere ex orci nec urna. Donec aliquet porta justo, ut venenatis arcu. Duis euismod augue dui, sit amet vehicula nulla pellentesque et. Curabitur lobortis diam sed libero vestibulum mollis. Donec egestas justo interdum, porttitor ligula a, scelerisque tellus. Ut interdum leo nunc, vitae auctor lorem laoreet ut.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu sem mattis, commodo nibh in, lacinia nisl. Suspendisse sit amet nulla maximus, tempor dui et, gravida leo. Mauris vel turpis facilisis, fermentum nisi non, suscipit enim. Phasellus scelerisque quam lobortis ex porta scelerisque. Phasellus in elit tincidunt, porta est vitae, euismod mauris. Aenean eleifend turpis felis, molestie lacinia urna sagittis eget. Vivamus at orci tincidunt, consequat lorem id, hendrerit enim. Cras tristique tellus a pellentesque varius. Nulla hendrerit, ligula eget euismod aliquet, elit lectus posuere nulla, eget cursus tortor urna eget quam. Vestibulum lacinia libero posuere nunc egestas, a porta lacus cursus. Morbi sed eros quis elit tincidunt pretium sed non urna. Donec suscipit ultricies lectus vel sodales. Ut luctus risus at mi lobortis, vel convallis est semper. Curabitur facilisis urna ac tellus scelerisque, ac commodo nibh placerat.\r\n\r\nCurabitur tristique hendrerit odio, ac rhoncus quam sodales vel. Sed erat elit, sagittis vitae eleifend et, gravida vel mi. Vestibulum nec vulputate dolor. Integer odio dolor, lacinia ut cursus ac, pulvinar eget ligula. Quisque tristique risus feugiat, dignissim orci eleifend, suscipit felis. Sed at dui neque. Vestibulum accumsan sem arcu, non gravida arcu pretium sit amet. Nullam dignissim porttitor nisi, quis pharetra justo maximus ut. Vestibulum bibendum mattis nisl, ac suscipit nunc tempor quis. Nunc condimentum non ligula sit amet molestie. Pellentesque luctus massa sed fermentum facilisis.\r\n\r\nUt eget tellus condimentum, tempus erat vel, posuere lectus. Vivamus ut justo turpis. Pellentesque sed placerat velit. Nam a sagittis enim, ut commodo massa. Pellentesque sagittis laoreet porttitor. Suspendisse facilisis pharetra ex, placerat lobortis urna pulvinar vitae. Mauris porta leo vel purus ullamcorper tincidunt. Aenean in ullamcorper lectus, quis sollicitudin nisl. Curabitur rutrum dictum gravida. Sed pulvinar lectus non augue efficitur tincidunt. Fusce auctor tristique elit, ac sollicitudin mauris porta id.\r\n\r\nPellentesque tellus metus, pharetra ut nunc quis, imperdiet dapibus neque. Morbi ut tempus massa. Quisque congue auctor pretium. Duis eu ipsum justo. Donec fermentum facilisis turpis et aliquam. Maecenas finibus congue libero sit amet malesuada. Fusce pharetra mauris a luctus tincidunt. Donec mattis libero efficitur, ultrices ex sed, rutrum ligula. Donec elementum lorem sit amet mi finibus aliquam. Aenean mauris metus, vulputate sit amet posuere non, eleifend eget ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec scelerisque consectetur mi, ut rutrum erat vestibulum sit amet. Donec id dignissim nulla. Nullam sed sapien pulvinar, consequat erat vel, egestas lorem. Aliquam vel enim a quam ultricies fringilla id sed mi.', NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_special_notes`
--

CREATE TABLE `patient_special_notes` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `note_text` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patient_special_notes`
--

INSERT INTO `patient_special_notes` (`id`, `patient_id`, `note_text`, `created_at`, `updated_at`) VALUES
(1, 6, 'hw', '2023-12-23 02:40:55', '2023-12-23 02:40:55');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `text` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `data_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `form_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(645, 100, 2, 'ClinicalExam', '{\"RegionalExam\":[\"Normal\"],\"SystemicExam\":[\"Normal\"]}', 'HeadachePain', '2024-03-08 12:47:45', '2024-03-08 12:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `patient_uterineEmbo_diagnosis`
--

CREATE TABLE `patient_uterineEmbo_diagnosis` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_name` varchar(255) DEFAULT NULL,
  `data_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_varicoceleEmbo_diagnosis`
--

CREATE TABLE `patient_varicoceleEmbo_diagnosis` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_name` varchar(255) DEFAULT NULL,
  `data_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_varicose_ablation_diagnosis`
--

CREATE TABLE `patient_varicose_ablation_diagnosis` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_name` varchar(255) DEFAULT NULL,
  `data_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `meeting_url` text DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(2, 'View Medical Report', '', 1, 'web', '2023-10-19 12:17:25', '2024-01-18 06:43:51'),
(3, 'View Patient Invoice', '', 1, 'web', '2023-10-19 12:17:25', '2024-01-18 06:44:15'),
(4, 'Show Patient ', '', 1, 'web', '2023-10-19 12:17:25', '2024-01-18 07:12:15'),
(5, 'View Patient Allergies', 'In detail page left side ', 2, 'web', '2023-10-19 12:19:57', '2024-01-18 06:47:31'),
(6, 'Add Allergies Symptoms\n', 'Popup form ', 2, 'web', '2023-10-19 12:19:57', '2024-01-18 06:49:15'),
(7, 'Past Medical History', 'Left Side', 3, 'web', '2023-10-19 12:19:57', '2024-01-18 06:50:32'),
(8, 'Add Past Medical History', 'Popup Form', 3, 'web', '2023-10-19 12:23:55', '2024-01-18 06:50:07'),
(9, 'Add Past Surgical History	\n', 'PopUp form', 4, 'web', '2023-10-19 12:26:15', '2024-01-18 06:51:30'),
(10, 'View Past Surgical History', 'View Past Surgical History', 4, 'web', '2023-10-19 12:26:15', '2024-01-18 06:51:34'),
(11, 'Delete Past Surgical History', '', 4, 'web', '2023-10-19 12:26:15', '2024-01-18 06:51:46'),
(12, 'Edit Past Surgical History', '', 4, 'web', '2023-10-19 12:26:15', '2024-01-18 06:51:50'),
(13, 'View Old / Current meds', '', 5, 'web', '2023-10-19 12:27:47', '2024-01-18 06:52:25'),
(14, 'Add Old / Current meds', '', 5, 'web', '2023-10-19 12:27:47', '2024-01-18 06:52:28'),
(15, 'List of procedures', '', 6, 'web', '2023-10-19 12:27:47', '2024-01-18 06:52:53'),
(16, 'Add List of procedures', '', 6, 'web', '2023-10-19 12:27:47', '2024-01-18 06:53:09'),
(17, 'List of Visit', '', 7, 'web', '2023-10-19 12:27:47', '2024-01-18 06:53:36'),
(18, 'Add List of Visit ', '', 7, 'web', '2023-10-19 12:27:47', '2024-01-18 06:53:51'),
(19, 'Referrals', '', 8, 'web', '2023-10-19 12:27:47', '2024-01-18 06:54:17'),
(20, 'Add Referrals', '', 8, 'web', '2023-10-19 12:27:47', '2024-01-18 06:54:20'),
(21, 'List of prescribed medication', '', 9, 'web', '2023-10-19 12:27:47', '2024-01-18 06:54:51'),
(22, 'Add List of prescribed medication', '', 9, 'web', '2023-10-19 12:27:47', '2024-01-18 06:54:53'),
(76, 'Add Order Procedure', '', 10, 'web', '2024-01-18 17:57:43', '2024-01-18 17:59:43'),
(77, 'View Order Procedure', '', 10, 'web', '2024-01-18 17:57:43', '2024-01-18 17:57:43'),
(78, 'Add Order Special Invistigation\r\n', '', 11, 'web', '2024-01-18 17:58:28', '2024-01-18 17:58:28'),
(79, 'View Order Special Invistigation\r\n', '', 11, 'web', '2024-01-18 17:58:28', '2024-01-18 17:58:28'),
(80, 'Add Future Plans', '', 12, 'web', '2024-01-18 18:01:46', '2024-01-18 18:01:46'),
(81, 'View Future Plans\r\n', '', 12, 'web', '2024-01-18 18:01:46', '2024-01-18 18:01:46'),
(82, 'Add Progress Note ', '', 13, 'web', '2024-01-18 18:02:58', '2024-01-18 18:02:58'),
(83, 'View Progress Note ', '', 13, 'web', '2024-01-18 18:02:58', '2024-01-18 18:02:58'),
(84, 'View Nurse Task', 'Nurse Web menu', 14, 'web', '2024-01-23 05:19:57', '2024-01-23 05:20:06'),
(85, 'Add Book Appointment', 'Nurse Web menu', 14, 'web', '2024-01-23 05:19:57', '2024-01-23 05:20:08'),
(86, 'Updated Reports From Lab ', 'nurse-task IN menu ', 14, 'web', '2024-01-23 05:19:57', '2024-01-23 05:20:10'),
(87, 'View Today Appointment', 'View Today Appointment [Side bar section]', 14, 'web', '2024-01-23 05:52:30', '2024-01-23 05:52:37'),
(88, 'View lab task', 'View lab task in lab login ', 15, 'web', '2024-01-23 05:19:57', '2024-01-23 05:58:41'),
(89, 'Add Update report', 'Add Update report in toogle side', 15, 'web', '2024-01-23 05:19:57', '2024-01-23 05:58:44');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `progress_note_canned_text`
--

INSERT INTO `progress_note_canned_text` (`id`, `canned_name`, `created_at`, `updated_at`) VALUES
(1, 'IR-PROCEDURE', NULL, NULL),
(2, 'NOTES', NULL, NULL),
(3, 'NURSE NOTES', NULL, NULL),
(4, 'Follow-Up', NULL, NULL),
(5, 'Discharge Instruction', NULL, NULL),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `radiologys`
--

INSERT INTO `radiologys` (`id`, `lab_name`, `email_address`, `mobile_phone`, `landline`, `post_code`, `street`, `town`, `country`, `created_at`, `updated_at`) VALUES
(3, 'updated', 'rajhimasnhu111222@gmail.com', '07248702312', '213', '251201', 'muzaffarnagar 1234', 'noida  1234', 'india', '2024-01-19 07:53:13', '2024-01-19 07:53:13'),
(4, 'qw3erty', '2345', NULL, 'qw345y', NULL, NULL, NULL, NULL, '2024-01-19 08:50:36', '2024-01-19 08:50:36'),
(7, 'Darryl Frye', 'myhetamib@mailinator.com', '+1 (792) 446-2965', 'Quod perferendis nis', 'Unde esse rerum sed', 'In quidem amet reru', 'Expedita velit moll', 'canada', '2024-01-24 10:31:47', '2024-01-24 10:31:47');

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
(2, '#ED232', 'Nurse', 'doctor', NULL, '0', NULL, '2024-01-18 05:07:20', '2024-01-18 07:32:20'),
(3, '#ED231', 'Patient', 'doctor', NULL, '0', NULL, '2024-01-18 05:08:05', '2024-01-18 05:09:49'),
(4, '#TD232', 'Labtest', 'doctor', NULL, '0', NULL, '2024-01-18 05:09:38', '2024-01-18 05:09:56'),
(5, '#CP127', 'Accountant', 'admin', 'accountant', '0', '23,January,2024', '2024-01-23 11:22:25', '2024-01-23 11:22:25'),
(6, '#NK723', 'Telecaller', 'admin', 'telecaller', '0', '23,January,2024', '2024-01-23 11:23:23', '2024-01-23 11:23:23'),
(7, '#US78', 'Doctor 1', 'admin', NULL, '0', '29,January,2024', '2024-01-29 09:44:47', '2024-01-29 09:44:47'),
(8, '#UQ995', 'surgeon', 'admin', 'ytyfyuufvu', '0', '20,February,2024', '2024-02-20 05:42:24', '2024-02-20 05:42:24'),
(9, '#VI78', 'm nkn', 'admin', NULL, '0', '20,February,2024', '2024-02-20 06:14:49', '2024-02-20 06:14:49');

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
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 4),
(6, 1),
(6, 4),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(8, 4),
(9, 1),
(10, 1),
(10, 4),
(11, 1),
(11, 4),
(12, 1),
(12, 4),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(16, 4),
(17, 1),
(17, 4),
(18, 1),
(18, 4),
(19, 1),
(20, 1),
(20, 4),
(21, 1),
(21, 4),
(22, 1),
(84, 2),
(85, 2),
(86, 2),
(87, 2);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
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
  `patient_id` varchar(255) DEFAULT NULL,
  `gp` varchar(255) DEFAULT NULL,
  `kin` varchar(255) DEFAULT NULL,
  `policy_no` varchar(255) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `title`, `name`, `email`, `is_verified`, `patient_profile_img`, `role`, `email_verified_at`, `password`, `remember_token`, `post_code`, `mobile_no`, `sirname`, `birth_date`, `gendar`, `street`, `town`, `country`, `landline`, `document_type`, `patient_id`, `gp`, `kin`, `policy_no`, `additional_info`, `tags`, `created_at`, `updated_at`) VALUES
(2, NULL, NULL, 'userS', 'patient@gmail.com', '0', '323744055.png', 'user', NULL, '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', '41n5L4NWBRCGVZkPwUAPFXgclWAaOsYtgOzki0MKbr9GFQlnmRAeIRwFuPmM', '1234', 1234567890, 'Mrs', '04 Dec, 2000', 'male', 'noida', 'noida', 'Algeria', '987654321', 'Address proof', 'MA941402', '98765432100', 'kin test', 'sunny po', 'okkk', '<div class=\"category\">ssss<i class=\"remove-category fas fa-times\"></i></div>', '2023-12-19 20:57:59', '2024-01-30 16:18:20'),
(4, NULL, NULL, 'hareram 2', 'patient12@gmail.com', '0', 'team-2.jpg', 'user', NULL, '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', NULL, '90909', 990900909, 'dr', '06 Dec, 1998', 'male', 'noida', 'noida 1', 'Albania', '909090909', 'Address proof', 'pat12345', NULL, NULL, NULL, NULL, NULL, '2023-12-20 01:14:53', '2023-12-20 01:14:53'),
(33, NULL, NULL, 'lalit', 'lalit1233@gmail.com', '0', 'team-5.jpg', 'user', NULL, '$2y$10$NmesL51KRbpR20wRqUbnNuwcMLFzNhh2UenT7vWw69iy/sUJQukMC', NULL, '91008', 8987365432, 'Mrs', '10 Dec, 2000', 'female', 'noida 3', 'noida 4', 'American Samoa', '998765439', 'Passport', 'lait00124560', '92765432100', 'kin test', '123456780', 'ok...... testing', '<div class=\"category\">ok<i class=\"remove-category fas fa-times\"></i></div><div class=\"category\">TR<i class=\"remove-category fas fa-times\"></i></div><div class=\"category\">DE<i class=\"remove-category fas fa-times\"></i></div>', '2023-12-21 12:40:45', '2024-01-09 11:50:36'),
(34, NULL, NULL, 'Martha Leach', 'fovaq@mailinator.com', '0', '1181933958.png', 'user', NULL, '$2y$12$O5brMtCBdvy.zizxpOlJguZwEayIB80WSnOR1QZetOcPan7SgFwJK', NULL, '123456789', 909098888, 'Professor', '09 Mar, 1997', 'male', 'Aliquip accusantium', 'Placeat nulla eaque', 'Armenia', '1234567890', 'Address proof', 'MA836196', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, NULL, NULL, 'Clarke Macdonald', 'lesihyzun@mailinator.com', '0', '1582233871.png', 'user', NULL, '$2y$12$1V8oAMsCw1OHg9e8rbna4uJCi7bLDxVMVLZ142scZogd1EOqmHqzS', NULL, '1234', 8888788787, 'Lady', '15 Sep, 1972', 'female', 'Sunt elit ut culpa', 'Consectetur ratione', 'Aruba', '12345678', 'Address proof', 'MA509999', NULL, NULL, NULL, NULL, NULL, '2024-01-09 05:56:22', '2024-01-09 05:56:22'),
(36, NULL, NULL, 'Nyssa Mcdonald', 'bawijakit@mailinator.com', '0', '849163702.png', 'user', NULL, '$2y$12$FJi/5cnVLj1CEB48hqkElOg5CPsYTAy/.uMoavCf.SLpEY/1ujUrS', NULL, '123456', 909000000, 'Sir', '03 Mar, 2003', 'female', 'Accusantium sapiente', 'Sapiente non repelle', 'Albania', '1234567', 'Address proof', 'MA261804', NULL, NULL, NULL, NULL, NULL, '2024-01-09 06:44:00', '2024-01-09 06:44:00'),
(37, NULL, NULL, 'hareram kumar', 'doctor2iii@gmail.com', '0', '1692048410.png', 'user', NULL, '$2y$12$ESsmd3pzlDWVm1l5jrARlevUfWkNw2.Tq3NlIDDUZK4lAQu8alUJ6', NULL, '1234', 39087654320, 'mr', '01 Jan, 2024', 'male', 'noida', 'noida', 'Åland Islands', '12534567890', 'Passport', 'MA210964', NULL, NULL, NULL, NULL, NULL, '2024-01-09 06:45:49', '2024-01-09 06:45:49'),
(61, NULL, 'Mr', 'User', 'user@gmail.com', '0', NULL, 'user', NULL, '$2y$12$LPKjNTzh1VJHMgkRGRjQ3u9HRXi6nzuyzc0DVPDMUq44SfURLaTY2', NULL, '989898', 4898765430, NULL, '12 Jan, 1999', NULL, NULL, NULL, 'CX', '0987654321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-17 07:33:02', '2024-01-23 20:03:15'),
(65, NULL, 'Dr', 'Eden Watkins edit', 'wazig@mailinator.com', '0', '1461166421.png', 'user', NULL, '$2y$12$MTuwfMHJF6aGHDlvK6PgoOKrDyhStUdUyRcb44IF5jbs5AUp2/fE2', NULL, '999', 917654321, 'mr', '12 Jan, 2020', 'male', 'Officiis culpa inci', 'Facilis rem enim acc', 'Algeria', '6209090990', 'Passport', 'MA95613', 'Tempor dolore praese', 'kin test', 'sunny po', 'ok', '<div class=\"category\">Fugit at doloribus <i class=\"remove-category fas fa-times\"></i></div><div class=\"category\">ok<i class=\"remove-category fas fa-times\"></i></div>', '2024-01-23 19:08:24', '2024-01-30 16:41:35'),
(66, NULL, 'Mr', 'Caesar Carrillo', 'cebogewosu@mailinator.com', '0', NULL, 'user', NULL, '$2y$12$E7YMyFJ.jzwPlM3troMqluBE6reAnd3B2cHY9DHx3MQSEb1DeyQCa', NULL, '12345', 89098765432, NULL, '12 Jan, 2020', 'female', 'Duis reprehenderit c', 'Dolores nulla eaque', 'AD', '76', 'Passport', 'MA888669', NULL, NULL, NULL, NULL, NULL, '2024-01-30 16:48:55', '2024-01-30 17:08:02'),
(67, NULL, 'Mr', 'Stella Nolan', 'ludaxazeru@mailinator.com', '0', '8b1cb839a0bdfc28ffb10ffc23a4d10f.png', 'user', NULL, '$2y$12$myuExsu3bRKqHZTq0KZtxOAvevsepzIaz4NIhJhpS5hsr9A.1/aoa', NULL, '908', 9087654321, NULL, '01 Feb, 2000', 'female', 'Molestias iure quos', 'Quisquam in labore v', 'CY', '91', NULL, 'MA623726', NULL, NULL, NULL, NULL, NULL, '2024-01-30 18:40:47', '2024-02-22 18:17:04'),
(75, NULL, NULL, 'Sonia Morrison', 'tuhodibyp@mailinator.com', '0', 'f0676fb9158ae67b9cc7dcb663ddf732.png', 'user', NULL, '$2y$12$W8BwJdl9QAJ3V9F0Vg2s3.M8HFFt.IMBXh64jhb4O5zDYjDPsfKym', NULL, 'Quas', 8123456781, NULL, NULL, 'female', 'Et tempora magnam vo', 'Corporis assumenda m', 'India', NULL, 'Address Proof', 'MA457132', NULL, NULL, NULL, NULL, NULL, '2024-02-23 02:04:45', '2024-02-23 02:04:45'),
(76, NULL, NULL, 'Lars Riddle', 'tyzadezyle@mailinator.com', '0', 'e5ecb62c45e790269a9792f54552c11d.png', 'user', NULL, '$2y$12$9wxHBZ3NVHP79OwOwIjvvO8SeRbweHwYehu5mbv46W9siO09Yrswy', NULL, 'Dignis', 9087654329, NULL, NULL, 'female', 'Sed magni sint null', 'Dolorum nemo quam un', 'BH', NULL, 'Passport', 'MA588595', NULL, NULL, NULL, NULL, NULL, '2024-02-23 02:05:41', '2024-02-23 02:05:41'),
(77, NULL, NULL, 'Azalia Reid', 'cyqeko@mailinator.com', '0', '', 'user', NULL, '$2y$12$rr83uMJWwrBH/t9HsyJiwOjA7NATWelxyRS1ERCye316jR4rOEblG', NULL, '12345', 9098765433, NULL, NULL, 'other', 'Culpa pariatur Cons', 'Nobis labore volupta', 'India', NULL, 'Address Proof', 'MA146024', NULL, NULL, NULL, NULL, NULL, '2024-02-23 02:16:19', '2024-02-23 02:16:19'),
(78, NULL, NULL, 'Julie Fleming', 'votutetet@mailinator.com', '0', '04ff327a1d4917d8e228cc9d4cfc40c7.png', 'user', NULL, '$2y$12$q1HXOg72dlAFgpKbcMS3m.3sd6saJx8SbbouGfZRtH0Tmd3M52ksa', NULL, 'Aut in', 6098765430, NULL, NULL, 'other', 'Exercitation rem har', 'Ut commodi accusanti', 'ER', NULL, 'Address Proof', 'MA24098', NULL, NULL, NULL, NULL, NULL, '2024-02-23 02:18:09', '2024-02-23 02:18:09'),
(79, NULL, NULL, 'Bryar Waller', 'qizisini@mailinator.com', '0', '672ea064b0ca472020672d93682fcaf6.png', 'user', NULL, '$2y$12$c.WwRVmV7cBabJ6BTeWq3OXEcH2MIrKvBwPl/leTK.rG5.RiMMjnu', NULL, 'Velit', 8098765431, NULL, '21 Feb, 2024', 'male', 'Fugiat non voluptate', 'Et officiis ut eveni', 'NO', NULL, 'Passport', 'MA147897', NULL, NULL, NULL, NULL, NULL, '2024-02-23 02:21:04', '2024-02-23 02:21:04'),
(80, NULL, NULL, 'Bruno Landry', 'dakagaxy@mailinator.com', '0', 'e9c4b86cf7ead4685ee36d5af963bf3e.png', 'user', NULL, '$2y$12$.fxInyRRMeQpbaDoXMhrx.FWHW/4PJ7RY2H0qILF..BB3nVZdXqYS', NULL, 'Quae', 8123456788, NULL, '21 Feb, 2024', 'male', 'Voluptas esse lauda', 'Pariatur Velit temp', 'India', NULL, 'Address Proof', 'MA509543', NULL, NULL, NULL, NULL, NULL, '2024-02-23 02:27:52', '2024-02-23 02:27:52'),
(81, NULL, NULL, 'jiug', 'iuytfd@khgf.in', '0', '', 'user', NULL, '$2y$12$LT6v57W67UIzBFJYdQdMrefuoDVzYX3wopwFZxTJ2hxLhZVNTMG26', NULL, NULL, 8465985845, NULL, '04 Feb, 2024', 'female', NULL, NULL, 'India', NULL, NULL, 'MA269238', NULL, NULL, NULL, NULL, NULL, '2024-02-23 14:46:04', '2024-02-23 14:46:04'),
(82, NULL, NULL, 'kjhgf', 'iuytfd@khgf.com', '0', '', 'user', NULL, '$2y$12$OCRLrz902spGbaFffRdDF.95V4.ZkhOZ07LM4/0K3VljheRmrKNBi', NULL, 'poiuygf', 8465998652, NULL, '05 Feb, 2024', 'male', 'oikhgf', 'ijuygf', 'India', '986598659865', 'Passport', 'MA726290', NULL, NULL, NULL, NULL, NULL, '2024-02-23 14:50:11', '2024-02-23 14:50:11'),
(83, NULL, NULL, 'Audrey David', 'kyxuxozido@mailinator.com', '0', '', 'user', NULL, '$2y$12$53ZBMtZQXK7PXxpv9I8eiec6ON.HBzJa5ovmlIIC0I0obpb9ez0z2', NULL, '00000', 79865000874, NULL, '17 Nov, 1993', 'male', 'Repudiandae accusant', 'Sed esse ullam labo', 'India', '000000000000', 'Address Proof', 'MA707451', NULL, NULL, NULL, NULL, NULL, '2024-02-23 14:52:18', '2024-02-23 14:52:18'),
(84, NULL, NULL, 'Gretchen Bush', 'tasakinyg@mailinator.com', '0', '', 'user', NULL, '$2y$12$kWAODh/HasOxlYUdNpf8K.r0vvRyfitN6vKjJ96Ee97Efp8Ax.1BK', NULL, '1223225', 0, NULL, '15 Feb, 2024', 'other', 'Sed facere qui ut ha', 'Blanditiis ut volupt', 'India', '00000000946', 'Passport', 'MA239297', NULL, NULL, NULL, NULL, NULL, '2024-02-23 14:53:17', '2024-02-23 14:53:17'),
(86, NULL, NULL, 'kiuygf', 'kljhgf@lkjhg.com', '0', '', 'user', NULL, '$2y$12$uVeLlfOP5CD4C5zr0SNWVuUsLgHHRag2dd1KlFN62wWMN5jv.dF.K', NULL, NULL, 846549865486, NULL, '06 Feb, 2024', 'female', NULL, NULL, 'India', NULL, NULL, 'MA544562', NULL, NULL, NULL, NULL, NULL, '2024-02-23 14:59:30', '2024-02-23 14:59:30'),
(87, NULL, 'Mr', 'Nayda Mason', 'nykilop@mailinator.com', '0', '', 'user', NULL, '$2y$12$zUD9fKwJn7CHfw86VqZeVOwHNonG3bR.KH5UQGz4x/HvgAXg2wc7u', NULL, '54321', 48598652559, NULL, '17 Jul, 2001', 'female', 'Quis nihil corrupti', 'Assumenda sit minus', 'CY', '456496565685', NULL, 'MA177003', NULL, NULL, NULL, NULL, NULL, '2024-02-23 15:02:43', '2024-02-23 15:51:08'),
(88, NULL, NULL, 'Illana William', 'gihy@mailinator.com', '0', 'c8f04735a32a1737de5ae9770128ac2e.png', 'user', NULL, '$2y$12$9oUzmJG57aR1YBw.WKzup.FI1yzYKkae9Yr2URjY3PttQoMZfSMXO', NULL, 'Volupt', 8098765409, NULL, '14 Jun, 2004', 'female', 'Delectus repudianda', 'Velit qui id vero is', 'India', NULL, 'Passport', 'MA297781', NULL, NULL, NULL, NULL, NULL, '2024-02-27 13:02:00', '2024-02-27 13:02:00'),
(89, NULL, NULL, 'Kenyon Cohen', 'titilon@mailinator.com', '0', '6e57e3b265b64c2acc1b035d3f5d9144.png', 'user', NULL, '$2y$12$p3kun1y/2ue/tmGH5QtPXe90vUhzsbSmRBtvEAjbr7DO5xleza35m', NULL, 'Quae3', 9087654323, NULL, '18 Sep, 1977', 'male', 'Mollitia qui tempor', 'Sit alias voluptate', 'BB', NULL, 'Passport', 'MA269482', NULL, NULL, NULL, NULL, NULL, '2024-02-27 13:03:10', '2024-02-27 13:03:10'),
(90, NULL, 'Mrs', 'Casey Bradley', 'symebaloda@mailinator.com', '0', '13259117d0065146e675329f4528a7fa.png', 'user', NULL, '$2y$12$SKXHmhDItGe.U2N5jwAGyu177f0icbutbJr4CpHUKfPXP2bXq4RDC', NULL, 'Cillum', 6098765439, NULL, '23 Jul, 2018', 'male', 'Temporibus mollit la', 'Aut aut praesentium', 'CW', NULL, 'Address proof', 'MA103741', NULL, NULL, NULL, NULL, NULL, '2024-02-27 13:03:51', '2024-02-27 13:32:56'),
(91, NULL, NULL, 'jasss', 'kkkk@gmail.com', '0', '', 'user', NULL, '$2y$12$WuD6bstQD6sObSHnDICi7.1Y0qeLWQTv01AnU46qu4vlTM/FBEiwK', NULL, '8523', 9638527419, NULL, '23 Feb, 2000', 'male', NULL, NULL, 'India', NULL, NULL, 'MA863864', NULL, NULL, NULL, NULL, NULL, '2024-02-27 13:05:04', '2024-02-27 13:05:04'),
(92, NULL, 'Mr', 'jhjvukyb', 'JBHJ@YOPMAIL.COM', '0', '7fe3ed4bb20853e1fe9c165b1b729943.png', 'user', NULL, '$2y$12$N4oW4xAppLMioy7B7cNo5.t1mdU6k7KPfjHyb82ccciQUpL4L0q7i', NULL, NULL, 8624895135, NULL, '31 Jan, 2024', 'male', NULL, NULL, 'CY', NULL, NULL, 'MA471341', NULL, NULL, NULL, NULL, NULL, '2024-02-27 13:07:28', '2024-02-27 13:35:51'),
(95, NULL, 'Mr', 'JHBGU', 'ikjhg@yopmail.com', '0', '', 'user', NULL, '$2y$12$nDBRvY1JGzTX8wox3mqd8.iUMT52XqwJFlVBS9jgsCANSOP3dqfAG', NULL, NULL, 741852963023322, NULL, '06 Feb, 2024', 'male', NULL, NULL, 'CY', NULL, NULL, 'MA26284', NULL, NULL, NULL, NULL, NULL, '2024-02-27 13:19:04', '2024-02-27 14:02:50'),
(96, NULL, NULL, 'jhjvukyb', '741kjh@gmail.com', '0', '', 'user', NULL, '$2y$12$0pkqIJKf.tPTboLzV386OeQQFc80iZPNx7o3a96oG42KzBcdAPCSy', NULL, '8520', 74185285296, NULL, '27 Feb, 2024', 'female', 'kjhgfc', 'iuhygtgfdc', 'India', '9638527418754', 'Passport', 'MA899765', NULL, NULL, NULL, NULL, NULL, '2024-02-27 13:23:12', '2024-02-27 13:23:12'),
(97, NULL, 'Mr', 'jhjvukyb', 'kkkjhgkk@gmail.com', '0', 'd457842fffbe180c90ef6c2e34d98690.png', 'user', NULL, '$2y$12$Sj3IlkIzrYanl65/xTe.1ukON/jaw/3I9H2feXcF29KfAeIqkAkn.', NULL, '123654', 741852963023, NULL, '06 Feb, 2024', 'female', NULL, NULL, 'CY', NULL, NULL, 'MA176244', NULL, NULL, NULL, NULL, NULL, '2024-02-27 13:39:12', '2024-02-27 14:13:04'),
(98, NULL, 'Mr', 'jaspreet', 'ainupdate@gmail.com', '0', '94821696.jpg', 'user', NULL, NULL, NULL, '8529631', 8965846584564, 'Dr', '28 Feb, 2024', 'female', 'Facilis dolorem faci', 'Doloremque itaque et', 'CY', '8521236540', 'Address proof', 'MA098864', NULL, NULL, NULL, NULL, NULL, '2024-02-27 07:28:35', '2024-02-28 17:08:14'),
(100, NULL, 'Dr', 'basant', 'tukyzujol@mailinator.com', '0', '', 'user', NULL, NULL, NULL, 'Explicab', 7896325410, NULL, '19 Sep, 1984', 'other', 'Quis voluptate rerum', 'Enim a qui amet in', 'CY', '87654345678', 'Passport', 'MA159166', NULL, NULL, NULL, NULL, NULL, '2024-02-28 17:19:04', '2024-02-28 20:06:26'),
(101, NULL, NULL, 'martin', 'martin@yopmail.com', '0', '1982320251.jpg', 'user', NULL, '$2y$12$pLFtxQVGat8iflyMwicqaucbo0HCVPevVE7p.Q1J.YMM1cyjH43jC', NULL, '83654', 9648746546534, 'mr', '11 Oct, 1991', 'male', 'down town st. no. 1 near cafe', 'WT', 'American Samoa', '96543163549865', 'Address proof', 'MA459858', NULL, NULL, NULL, NULL, NULL, '2024-03-08 06:27:38', '2024-03-08 06:27:38');

-- --------------------------------------------------------

--
-- Table structure for table `vital_measurements`
--

CREATE TABLE `vital_measurements` (
  `id` int(11) NOT NULL,
  `measurement_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `what_we_do`
--

INSERT INTO `what_we_do` (`id`, `title`, `desc`, `img`, `created_at`, `updated_at`) VALUES
(1, 'changing the way of your testing and research', 'Qastarat & Dawali Clinics is a healthcare platform that provides virtual medical consultations and manages health records. Testing ensures seamless user experience and data security.', 'lab-4-min.jpg', '2024-01-02 08:51:52', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
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
-- Indexes for table `branchs`
--
ALTER TABLE `branchs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

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
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `nurse_id` (`nurse_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
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
-- Indexes for table `patient_bericoceleEmbo_diagnosis`
--
ALTER TABLE `patient_bericoceleEmbo_diagnosis`
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
-- Indexes for table `patient_pelvicCongEmbo_diagnosis`
--
ALTER TABLE `patient_pelvicCongEmbo_diagnosis`
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
-- Indexes for table `patient_uterineEmbo_diagnosis`
--
ALTER TABLE `patient_uterineEmbo_diagnosis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_varicoceleEmbo_diagnosis`
--
ALTER TABLE `patient_varicoceleEmbo_diagnosis`
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
-- Indexes for table `telecallers`
--
ALTER TABLE `telecallers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

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
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branchs`
--
ALTER TABLE `branchs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `doctor_labs`
--
ALTER TABLE `doctor_labs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor_nurse`
--
ALTER TABLE `doctor_nurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nurse_doctor`
--
ALTER TABLE `nurse_doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nurse_tasks`
--
ALTER TABLE `nurse_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `patient_allergies`
--
ALTER TABLE `patient_allergies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `patient_appointments`
--
ALTER TABLE `patient_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient_bericoceleEmbo_diagnosis`
--
ALTER TABLE `patient_bericoceleEmbo_diagnosis`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `patient_past_medical_histories`
--
ALTER TABLE `patient_past_medical_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `patient_past_surgical_histories`
--
ALTER TABLE `patient_past_surgical_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `patient_pelvicCongEmbo_diagnosis`
--
ALTER TABLE `patient_pelvicCongEmbo_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_prescriptions`
--
ALTER TABLE `patient_prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient_progress_notes`
--
ALTER TABLE `patient_progress_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient_progress_note_details`
--
ALTER TABLE `patient_progress_note_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=646;

--
-- AUTO_INCREMENT for table `patient_uterineEmbo_diagnosis`
--
ALTER TABLE `patient_uterineEmbo_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_varicoceleEmbo_diagnosis`
--
ALTER TABLE `patient_varicoceleEmbo_diagnosis`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

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
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `telecallers`
--
ALTER TABLE `telecallers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

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
-- Constraints for table `otps`
--
ALTER TABLE `otps`
  ADD CONSTRAINT `otps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users__` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_allergies`
--
ALTER TABLE `patient_allergies`
  ADD CONSTRAINT `patient_allergies_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_appointments`
--
ALTER TABLE `patient_appointments`
  ADD CONSTRAINT `patient_appointments_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_diagnosis`
--
ALTER TABLE `patient_diagnosis`
  ADD CONSTRAINT `patient_diagnosis_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_future_plans`
--
ALTER TABLE `patient_future_plans`
  ADD CONSTRAINT `patient_future_plans_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_invoice_items`
--
ALTER TABLE `patient_invoice_items`
  ADD CONSTRAINT `patient_invoice_items_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_order_imaginary_exams`
--
ALTER TABLE `patient_order_imaginary_exams`
  ADD CONSTRAINT `patient_order_imaginary_exams_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_order_imaginary_exams_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `patient_order_labs`
--
ALTER TABLE `patient_order_labs`
  ADD CONSTRAINT `patient_order_labs_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_order_labs_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `patient_past_medical_histories`
--
ALTER TABLE `patient_past_medical_histories`
  ADD CONSTRAINT `patient_past_medical_histories_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_past_surgical_histories`
--
ALTER TABLE `patient_past_surgical_histories`
  ADD CONSTRAINT `patient_past_surgical_histories_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_progress_notes`
--
ALTER TABLE `patient_progress_notes`
  ADD CONSTRAINT `patient_progress_notes_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_thyroid_diagnosis`
--
ALTER TABLE `patient_thyroid_diagnosis`
  ADD CONSTRAINT `patient_thyroid_diagnosis_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_thyroid_diagnosis_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_vitals`
--
ALTER TABLE `patient_vitals`
  ADD CONSTRAINT `patient_vitals_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
