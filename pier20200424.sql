-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 08:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

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
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Information about downloaded videos creators';

--
-- Dumping data for table `creators_dlvideos`
--

INSERT INTO `creators_dlvideos` (`ID`, `siteID`, `name`, `thumbnailURI`, `thumbType`, `dateCreated`, `channel_URL`, `description`) VALUES
(1, 'UCUKmuMzgmPuwlz7ojhGLwYA', 'Thomas H', NULL, 'jpg', '2020-04-21 11:57:56', 'http://www.youtube.com/channel/UCUKmuMzgmPuwlz7ojhGLwYA', NULL),
(2, 'YACINAML', 'All Sounds', NULL, 'jpg', '2020-04-21 12:15:14', 'http://www.youtube.com/channel/UCFnmEGz7dcAwYflQYfhQccA', NULL),
(3, 'daftpunkalive', 'Daft Punk', NULL, 'jpg', '2020-04-21 12:16:22', 'http://www.youtube.com/channel/UC_kRDKYrUlrbtrSiyu5Tflg', NULL),
(4, 'UCgZ5CxNfW1a_Z6LtUocwSoQ', 'StarterUP', NULL, 'jpg', '2020-04-21 12:33:12', 'http://www.youtube.com/channel/UCgZ5CxNfW1a_Z6LtUocwSoQ', NULL),
(5, 'Liquicity', 'Liquicity', NULL, 'jpg', '2020-04-21 14:24:32', 'http://www.youtube.com/channel/UCSXm6c-n6lsjtyjvdD0bFVw', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dl_videos`
--

CREATE TABLE `dl_videos` (
  `ID` int(11) NOT NULL,
  `name` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creatorID` int(11) DEFAULT NULL,
  `URI` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `videoType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'mp4',
  `thumbType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'jpg',
  `originalURL` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `webpage_url` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length` int(11) DEFAULT 0,
  `thumbnailURI` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateUploaded` datetime DEFAULT current_timestamp(),
  `category` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siteID` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateAdded` datetime DEFAULT current_timestamp(),
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dl_videos`
--

INSERT INTO `dl_videos` (`ID`, `name`, `description`, `creatorID`, `URI`, `videoType`, `thumbType`, `originalURL`, `webpage_url`, `length`, `thumbnailURI`, `dateUploaded`, `category`, `siteID`, `dateAdded`, `tags`) VALUES
(1, 'Mix #1 (Bedouin, Hraach, Dole & Kom, Daron Nalbandian, Tale Of Us, Adriatique)', 'EXPAND FOR SETLIST\n\nTrainvideo by die Zentralbahn: https://www.youtube.com/watch?v=Gt5jPQGFpIw\n\n00:00 Amor - Nu\n04:09 Emocion - Shai T\n09:09 Aldebaran - Armen Miran\n14:30 Certeza - LUM\n20:33 Flight of Birds - Bedouin\n26:47 Hajer - Daron Nalbandian\n31:13 Man O To - Nu\n38:14 Spiral Eyes - Bedouin\n45:35 Concor - Tale of Us  Vaal\n51:50 Space Knights - Adriatique\n57:48 Deep In The Tree - Thyladomid & Adriatique', 1, 'D:\\xampp\\htdocs\\Pier\\stored\\downloads\\youtubedl_video\\Mix_1_Bedouin_Hraach_Dole_Kom_Daron_Nalbandian_Tale_Of_Us_Adriatique_n716gG6oK-0_1280x720_30.mp4', 'mp4', 'jpg', 'https://www.youtube.com/watch?v=n716gG6oK-0', 'https://www.youtube.com/watch?v=n716gG6oK-0', 3701, 'img/thumbnail/dl_videos/n716gG6oK-0.thumb.jpg', '2017-03-10 00:00:00', 'People & Blogs', 'n716gG6oK-0', '2020-04-21 21:57:56', '[\"Bedouin\",\"Hraach\",\"Daron\",\"Nalbandian\",\"Tale of Us\",\"Adriatique\",\"Mix\",\"Set\",\"Electro\",\"Techno\",\"electronic\",\"Train\",\"Dole & Kom\"]'),
(2, 'DUN DUN DUUUN!!! sound effect dramatic', 'Free Download : https://goo.gl/t8nvRA\n\nsubscribe to the channel for new and more sounds effects.\n\nour channel = all sounds of the world', 2, 'D:\\xampp\\htdocs\\Pier\\stored\\downloads\\youtubedl_video\\DUN_DUN_DUUUN_sound_effect_dramatic_6fq_DRVlUHg_320x240_30.mp4', 'mp4', 'jpg', 'https://www.youtube.com/watch?v=6fq_DRVlUHg', 'https://www.youtube.com/watch?v=6fq_DRVlUHg', 4, 'img/thumbnail/dl_videos/6fq_DRVlUHg.thumb.jpg', '2014-11-27 00:00:00', 'Education', '6fq_DRVlUHg', '2020-04-21 22:15:14', '[\"Sound (Literature Subject)\",\"Sound Effect (Industry)\",\"Music Education (Field Of Study)\",\"Drama (TV Genre)\",\"dramatic\",\"SFX (Magazine)\",\"sfx\",\"free\",\"download\"]'),
(3, 'Daft Punk - Around the world (Official Audio)', 'Daft Punk - Homework :\n℗ 1997 Daft Life under exclusive license to Parlophone Records Ltd./Parlophone Music, a division of Parlophone Music France\n\nYoutube Playlist :\nDaft Punk - Homework (Official album) : http://bit.ly/1TborpU\nDaft Punk - Discovery (Official album) : http://bit.ly/1JKbKOn\nDaft Punk - Human After All (Official album) : http://bit.ly/1IvrjI1\nDaft Punk - Alive 1997 (Official album) : http://bit.ly/1e39O88\nDaft Punk - Alive 2007 (Official album) : http://bit.ly/1F8qTTj\n\nOfficial audios list :\nDaft Punk - Daftendirekt (Official audio)\nDaft Punk - Wdpk 83.7 FM (Official audio)\nDaft Punk - Revolution 909 (Official audio)\nDaft Punk - Da Funk (Official audio)\nDaft Punk - Phœnix (Official Audio)\nDaft Punk - Fresh (Official Audio)\nDaft Punk - Around the world (Official Audio)\nDaft Punk - Rollin\' and Scratchin\' (Official Audio)\nDaft Punk - Teachers (Official Audio)\nDaft Punk - High fidelity (Official Audio)\nDaft Punk - Rock\'n Roll (Official Audio)\nDaft Punk - Oh Yeah (Official Audio)\nDaft Punk - Burnin\' (Official Audio)\nDaft Punk - Indo Silver Club (Official Audio)\nDaft Punk - Alive (Official Audio)\nDaft Punk - Funk Ad (Official Audio)', 3, 'D:\\xampp\\htdocs\\Pier\\stored\\downloads\\youtubedl_video\\Daft_Punk_-_Around_the_world_Official_Audio_dwDns8x3Jb4_1920x1080_25.mp4', 'mp4', 'jpg', 'https://www.youtube.com/watch?v=dwDns8x3Jb4', 'https://www.youtube.com/watch?v=dwDns8x3Jb4', 430, 'img/thumbnail/dl_videos/dwDns8x3Jb4.thumb.jpg', '2015-06-11 00:00:00', 'Music', 'dwDns8x3Jb4', '2020-04-21 22:16:22', '[\"daft punk lucky\",\"get lucky\",\"daft punk lyrics\",\"youtube daft punk\",\"daft punk download\",\"daft punk album\",\"daft punk mp3\",\"random access memories\",\"daft punk 2013\",\"stronger daft punk\",\"harder better faster stronger\",\"daft punk harder better faster stronger\",\"daft hands\",\"unknown\",\"daft punk technologic\",\"technologic daft punk\",\"work it harder make it better do it faster makes us stronger\",\"faster stronger daft punk\",\"daft hands harder better faster stronger official\",\"daft punk live\"]'),
(4, 'DUN DUN DUUUN (Sound Effect)', 'Hope you guys enjoyed the video, if you did make sure to hit that like button below and if you are new to my channel make sure to subscribe.', 4, 'stored\\downloads\\youtubedl_video\\DUN_DUN_DUUUN_Sound_Effect_OYIjHeM7PPA_854x480_30.mp4', 'mp4', 'jpg', 'https://www.youtube.com/watch?v=OYIjHeM7PPA', 'https://www.youtube.com/watch?v=OYIjHeM7PPA', 4, 'img/thumbnail/dl_videos/OYIjHeM7PPA.thumb.jpg', '2017-03-28 00:00:00', 'Entertainment', 'OYIjHeM7PPA', '2020-04-21 22:33:12', '[\"dun dun dun\",\"sound\",\"sound effects\",\"effects\",\"explosion\",\"explosion sound effect\",\"car sound effect\",\"gun sound effect\",\"scream sound effect\",\"siren sound effect\",\"siren\",\"dj sound effect\",\"horn sound effect\"]'),
(7, 'Andromedik - Your Eyes', 'OUT NOW on Galaxy of Dreams 3! Limited GOD3 bundles in the official store including special flag, cap, t-shirt, wristband and stickers. Order here: http://smarturl.it/GalaxyofDreams3\n\nAndromedik\nhttps://soundcloud.com/andromedik\nhttps://twitter.com/AndromedikMusic\nhttps://www.instagram.com/andromedik.official\n\n► Liquicity Store:\nhttps://store.liquicity.com\n\n► Send in demo\'s for Liquicity Records\nhttp://liquicity.com/demo\n\n► Liquicity NEW channel with full live-sets!\nhttps://youtube.com/c/LiquicityEvents\n\n► Follow Liquicity\nFacebook: http://www.facebook.com/Liquicity\nEvents: http://www.facebook.com/LiquicityEvents\nSpotify: https://open.spotify.com/user/liquicityrecords\nInstagram: https://instagram.com/liquicity/\nTwitter: http://www.twitter.com/liquicity\nSoundcloud: http://soundcloud.com/liquicityrecords\nBeatport: http://beatport.com/label/liquicity-records/25942\nGoogle+: https://plus.google.com/+Liquicity', 5, 'stored\\downloads\\youtubedl_video\\Andromedik_-_Your_Eyes_hm2d9j40qn8_1920x1080_30.mp4', 'mp4', 'jpg', 'https://www.youtube.com/watch?v=hm2d9j40qn8', 'https://www.youtube.com/watch?v=hm2d9j40qn8', 260, 'img/thumbnail/dl_videos/hm2d9j40qn8.thumb.jpg', '2018-06-06 00:00:00', 'Entertainment', 'hm2d9j40qn8', '2020-04-22 00:32:18', '[\"Liquicity\",\"Liquicity Records\",\"Liquid\",\"Liquid Funk\",\"Liquid Dnb\",\"dnb\",\"D&B\",\"Drum and Bass\",\"Drum & Bass\",\"Drum And Bass (Musical Genre)\",\"Andromedik\",\"Your Eyes\",\"GOD\",\"Galaxy of Dreams 3\",\"GOD3\",\"God 3\"]');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `ID` int(11) NOT NULL,
  `name` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `URI` varchar(767) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movieType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'mp4',
  `production` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posterType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'jpg',
  `subtitle` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateAdded` datetime DEFAULT current_timestamp(),
  `dateReleased` datetime DEFAULT NULL,
  `length` int(11) DEFAULT 0,
  `genre` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trailerURI` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trailerType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'mp4',
  `country` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posterURI` varchar(767) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`ID`, `name`, `URI`, `movieType`, `production`, `director`, `posterType`, `subtitle`, `dateAdded`, `dateReleased`, `length`, `genre`, `trailerURI`, `trailerType`, `country`, `language`, `posterURI`, `description`) VALUES
(1, 'The Avengers', 'exampleURI', 'mp4', 'Marvel Studios', 'Joss Whedon', 'jpg', '', '2020-04-24 15:00:45', '2012-04-11 00:00:00', 8580, 'Superhero', NULL, 'mp4', 'United States', 'English', 'img/thumbnail/movies/marvel_avengers_poster_2012.jpg', 'Earth\'s mightiest heroes must come together and learn to fight as a team if they are going to stop the mischievous Loki and his alien army from enslaving humanity.'),
(2, 'Hacksaw Ridge', 'exampleURI2', 'mp4', 'Icon Productions', 'Mel Gibson', 'jpg', '', '2020-04-24 15:45:27', '2016-09-04 00:00:00', 8340, 'Drama', NULL, 'mp4', 'United States', 'English', 'img/thumbnail/movies/icon_hacksaw_poster_2016.jpg', 'World War II American Army Medic Desmond T. Doss, who served during the Battle of Okinawa, refuses to kill people, and becomes the first man in American history to receive the Medal of Honor without firing a shot.');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dl_videos`
--
ALTER TABLE `dl_videos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
