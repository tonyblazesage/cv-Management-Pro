-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2021 at 07:46 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16564570_cv_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `education_detail`
--

CREATE TABLE `education_detail` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `degree_name` varchar(50) DEFAULT NULL,
  `field` varchar(100) DEFAULT NULL,
  `institution_name` varchar(100) DEFAULT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `gcse` int(11) DEFAULT NULL,
  `languages` varchar(100) DEFAULT NULL,
  `language_level` varchar(20) DEFAULT NULL,
  `postdate` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `education_detail`
--

INSERT INTO `education_detail` (`id`, `user_email`, `degree_name`, `field`, `institution_name`, `state`, `country`, `start_date`, `end_date`, `gcse`, `languages`, `language_level`, `postdate`) VALUES
(1, 'osubor63@gmail.com', 'PhD', 'Software Engineering', 'kingston university', 'Benin', 'United Kingdom', '2021-05-01', '2021-05-01', 5, '', '', 1620061254),
(2, 'steph@gmail.com', 'PhD', 'Software Engineering', 'Night school', 'Benin', 'Nigeria', '2021-05-01', '2021-05-13', 12, '', '', 1620061430),
(3, 'anthony_eneremadu@yahoo.com', 'Masters', 'software', 'kingston university', 'london', 'uk', '2021-05-21', '2021-05-30', 8, '', '', 1620061772);

-- --------------------------------------------------------

--
-- Table structure for table `experience_detail`
--

CREATE TABLE `experience_detail` (
  `id` int(11) NOT NULL,
  `reg_email` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `acquired_date` date DEFAULT NULL,
  `job_title` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `description` text NOT NULL,
  `skills` varchar(255) NOT NULL,
  `years_of_practice` varchar(20) NOT NULL,
  `additional` longtext DEFAULT NULL,
  `postdate` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `experience_detail`
--

INSERT INTO `experience_detail` (`id`, `reg_email`, `profession`, `qualification`, `acquired_date`, `job_title`, `company_name`, `location`, `start`, `end`, `description`, `skills`, `years_of_practice`, `additional`, `postdate`) VALUES
(1, 'osubor63@gmail.com', 'Software Developer', 'None', '2021-05-01', 'Intern', 'NEANIAS Space', 'Abuja, Nigeria', '2021-05-01', '2021-05-01', 'Internship', 'adobe photoshop', '< 1 year', 'sing', 1620061308),
(2, 'steph@gmail.com', 'Engineer', 'Nigerian Society of Engineers (NSE)', '2021-05-01', 'Web Designer', 'NEANIAS Space', 'London, United Kingdom', '2021-05-15', '2021-05-01', 'designer', '', '1-2 years', 'dancing', 1620061488),
(3, 'anthony_eneremadu@yahoo.com', 'developer', 'acca', '2021-05-06', 'developer', 'freelance', 'nigeira', '2021-05-02', '2021-05-09', 'hthth', 'c#', '2-3 years', 'hdhdhdhd', 1620061876);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact_number` varchar(12) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `city` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `postcode` varchar(100) NOT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `registration_date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `firstname`, `lastname`, `email`, `password`, `contact_number`, `date_of_birth`, `gender`, `city`, `country`, `postcode`, `linkedin`, `website`, `registration_date`) VALUES
(4, 'John', 'Doe', 'k1234567@kingston.ac.uk', 'ef1a87d6fc7d9be2b651634de76ebcc46a74a8b8', '12345678910', '1996-01-12', 'male', 'London', 'United Kingdom', 'KT5 8DF', '', '', 1620062531),
(3, 'Nnadozie', 'Eneremadu', 'anthony_eneremadu@yahoo.com', '198eea23e90bf1dccbbb4c9c443a53ece62d177e', '07438099629', '2021-05-08', 'male', 'BELVEDERE, Kent', 'United Kingdom', 'DA17 5HH', 'the', 'thhhe', 1620061720),
(2, 'Stephan', 'Osubor', 'steph@gmail.com', '4c608b3904ce190a07db2e660571aa9173270f25', '07734913411', '2021-05-01', 'male', 'London', 'United Kingdom', 'KT5 8DF', '', '', 1620061403),
(1, 'Michelle', 'Osubor', 'osubor63@gmail.com', '4c608b3904ce190a07db2e660571aa9173270f25', '07734913411', '2021-05-01', 'female', 'London', 'United Kingdom', 'KT5 8DF', '', '', 1620061226);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `education_detail`
--
ALTER TABLE `education_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience_detail`
--
ALTER TABLE `experience_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
