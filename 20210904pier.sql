-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2021 at 05:45 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pier`
--

-- --------------------------------------------------------

--
-- Table structure for table `creators_dlvideos`
--

CREATE TABLE `creators_dlvideos` (
  `ID` int(11) NOT NULL,
  `siteID` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnailURI` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'jpg',
  `dateCreated` timestamp NULL DEFAULT current_timestamp(),
  `channel_URL` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Information about downloaded videos creators';

--
-- Table structure for table `dl_videos`
--

CREATE TABLE `dl_videos` (
  `ID` int(11) NOT NULL,
  `title` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length` int(11) DEFAULT 0,
  `category` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateUploaded` datetime DEFAULT current_timestamp(),
  `dateAdded` datetime DEFAULT current_timestamp(),
  `URI` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `videoType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'mp4',
  `thumbnailURI` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'jpg',
  `creatorID` int(11) DEFAULT NULL,
  `siteID` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `originalURL` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `webpage_url` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `ID` int(11) NOT NULL,
  `title` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length` int(11) DEFAULT 0,
  `country` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `production` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateReleased` datetime DEFAULT NULL,
  `URI` varchar(767) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movieType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'mp4',
  `posterURI` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posterType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'jpg',
  `trailerURI` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trailerType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'mp4',
  `dateAdded` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creators_dlvideos`
--
ALTER TABLE `creators_dlvideos`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dl_videos`
--
ALTER TABLE `dl_videos`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `creators_dlvideos`
--
ALTER TABLE `creators_dlvideos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dl_videos`
--
ALTER TABLE `dl_videos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
