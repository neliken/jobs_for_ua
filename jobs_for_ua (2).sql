-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2022 at 08:10 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs_for_ua`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id_job` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `link_site` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id_job`, `name`, `description`, `photo`, `company`, `link_site`, `id_user`) VALUES
(4, 'Quality Assurance', 'Have university degree in Informatirience -> Knowledge of tools, concepts and methodologies of QA -> Experience with both white box and black box testing', 'QA.jpg', 'Allied Testing', 'https://internship.alliedtesting.com/moldova/', 16),
(9, 'Software Developer', 'Good knowledge of OOP, or object-oriented programming -> Good algorithmic skills -> Understanding of data structures Basic knowledge of SQL (advantageous)', 'backend (2).png', 'Amdaris', 'https://amdaris.com/job-type/intern/', 17),
(10, 'Office Manager', 'Experience in planning and budgeting Knowledge of business process and functions -> Strong analytical ability -> Excellent communication skills', 'manager.png', 'iHUB Chișinău', 'https://www.ihub.md', 17),
(21, 'SEO Specialist', 'Optimizing copy and landing pages for search engine optimization -> Performing ongoing keyword research including discovery and expansion of keyword opportunities -> Researching and implementing content recommendations for organic SEO success', 'output-onlinepngtools (2).png', 'Google', 'https://www.rabota.md/ro/locuri-de-munca/seo-specialist/85155', 16),
(22, 'Brad Pitt', 's', 'manager.png', 'm', '', 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_password`) VALUES
(16, 'neliken', 'nelicacechina@gmail.com', '$2y$10$KgTPnptl/F0tmyEKBV70veZW1dq.TnctQ9FkAFN1uaEGkjU4zL2p2'),
(17, 'Tudor Ursachi', 'ixobit@gmail.com', '$2y$10$MeL4b8fOEfg2YcSHxU1/qO7gcI5Z4wPG7xldWzqc/tiAeDQa.rDgS'),
(19, 'ioncechina', 'ion@gmail.com', '$2y$10$pUP1HbH23SJ.ajEYHSrH/uhRbBFMEzJH1Al72PMFwDOK63bbnrjMe'),
(25, 'admin', 'neleacechina@gmail.com', '$2y$10$TIPlCB9rHZ3OzmB/RzWWwOHlACz/DJBgd5HHUzbwKBKlSktnlbFgK'),
(30, 'nelikeeen', 'HBXHJX@HHDF.DDD', '$2y$10$r5DbLRTBkrVwdhajpLakuu8CpPUAxUt59XyJMv.ZcjHMi9RsRaxFe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id_job`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
