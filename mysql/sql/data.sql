-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Nov 29, 2022 at 02:39 AM
-- Server version: 8.0.27
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apps-management`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`%` PROCEDURE `addApp` (IN `TYPE` CHAR(10), IN `NAME` CHAR(100), IN `SRCDOW` CHAR(200), IN `SRCIMG` CHAR(200), IN `DES` CHAR(250), IN `USERNAME` CHAR(100), IN `CURDATE` DATE)   BEGIN
    DECLARE newid CHAR(10);
    SET NEWID = CREATE_APPID(TYPE); 
    INSERT INTO APPS VALUES(NEWID, NAME, SRCDOW, SRCIMG, DES, 0, USERNAME, CURDATE, TYPE, FALSE);
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`%` FUNCTION `CREATE_APPID` (`appType` CHAR(10)) RETURNS CHAR(10) CHARSET utf8mb4 DETERMINISTIC BEGIN
    DECLARE num INT;
	SELECT COUNT(*) INTO NUM from apps WHERE TYPE = appType;
    SET NUM = NUM +1;
    IF NUM>1000 THEN
    	RETURN CONCAT(appType, CAST(NUM AS CHAR(4)));
    END IF;
    IF NUM>100 THEN
    	RETURN CONCAT(appType, '0', CAST(NUM AS CHAR(3)));
    END IF;
    IF NUM>10 THEN
    	RETURN CONCAT(appType, '00', CAST(NUM AS CHAR(2)));
    END IF;
    RETURN CONCAT(appType, '000', CAST(NUM AS CHAR(1)));
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `id` int NOT NULL,
  `appName` varchar(100) DEFAULT NULL,
  `srcDownload` varchar(200) DEFAULT NULL,
  `srcImage` varchar(200) DEFAULT NULL,
  `decsription` varchar(3000) DEFAULT NULL,
  `download` int DEFAULT '0',
  `userName` varchar(100) DEFAULT NULL,
  `DATEUP` datetime DEFAULT CURRENT_TIMESTAMP,
  `TYPE` char(101) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `isConfirmed` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id`, `appName`, `srcDownload`, `srcImage`, `decsription`, `download`, `userName`, `DATEUP`, `TYPE`, `isConfirmed`) VALUES
(27, 'Lazada', '/apps/ms/sa.a', '/image/ms/sa.jpg', 'App mua sam', 0, 'giaosu', '2022-11-17 11:09:36', 'ms', 0),
(28, 'TFT', '/apps/gms/tft.a', '/image/ms/tft.jpg', 'Tro choi chien thuat', 50, 'giaosu', '2022-11-17 11:10:41', 'gms', 0),
(29, 'Gojeck', '/apps/ud/gj.a', '/image/ud/gj.jpg', 'App dat xe', 0, 'haiquan', '2022-11-17 11:12:01', 'dv', 0),
(30, 'Facebook', '/apps/mxh/fb.x', '/images/mxh/fb.jpg', 'Máº¡ng xĂ£ há»™i phá»• biáº¿n', 101, 'quivo01', '2022-11-17 11:20:00', 'mxh', 0),
(31, 'PUBG', './apps/gms/pubg.js', './imgs/gms/pubg.jpg', 'Tá»±a game báº¯n sĂºng sinh tá»“n', 0, 'haiquan', '2022-11-17 14:03:37', 'gms', 0),
(32, 'New app', '/apps/games/sm/sa.a', '/image/games/sm/sa.jpg', 'mo phong cuoc', 0, 'giaosu', '2022-11-24 07:51:25', 'ms', 0),
(33, 'New app 2', '/apps/games/sm/sa.a', '/image/games/sm/sa.jpg', 'Tro choi chien thuat', 0, 'giaosu', '2022-11-24 07:54:04', 'gms', 0),
(34, 'Amazone', '/apps/games/sm/sa.a', '/image/games/sm/sa.jpg', 'mo phong cuoc', 99, 'giaosu', '2022-11-24 07:54:28', 'sm', 0),
(35, 'Amazone', '/apps/games/sm/sa.a', '/image/games/sm/sa.jpg', 'mo phong cuoc', 0, 'haiquan', '2022-11-24 07:54:53', 'ms', 0),
(36, 'League of legend', '/apps/games/sm/sa.a', '/image/games/sm/sa.jpg', 'TrĂ² chÆ¡i chiáº¿n thuáº­t', 100, 'haiquan', '2022-11-24 07:55:33', 'gms', 0),
(37, 'FIFA ONLINE$', '/apps/games/sm/sa.a', '/image/games/sm/sa.jpg', 'Tro choi chien thuat', 0, 'giaosu', '2022-11-24 09:23:24', 'gms', 0),
(38, 'Tiki', '/apps/games/sm/sa.a', '/image/games/sm/sa.jpg', 'app mua sam', 0, 'giaosu', '2022-11-24 09:23:45', 'ms', 0),
(39, 'Vo', '/apps/ms/sa.a', '/image/ms/sa.jpg', 'mo phong cuoc', 0, 'giaosu', '2022-11-26 14:22:59', 'gms', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `userName` varchar(100) NOT NULL,
  `appId` int NOT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `timeComment` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`userName`, `appId`, `content`, `timeComment`) VALUES
('giaosu', 36, 'Q1 tá»‘t, Q2 rĂ¬a, Q3 Ă¡c quĂ¡', '2022-11-26 14:35:28'),
('haiquan', 36, 'adma;sd', '2022-11-26 15:52:59'),
('haitran05', 36, 'Toi cmt thá»­', '2022-11-26 15:50:19'),
('quivo01', 36, 'ÄĂ¢y lĂ  tiáº¿ng nĂ³i giĂ¡o sÆ°, phĂ¡t ra tá»« PhÆ°á»›c Kiá»ƒn NhĂ  BĂ¨', '2022-11-26 16:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `userName` varchar(100) NOT NULL,
  `appId` int NOT NULL,
  `isLiked` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imageId` int NOT NULL,
  `appId` int DEFAULT NULL,
  `imageSrc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `TYPES`
--

CREATE TABLE `TYPES` (
  `TYPEID` char(10) NOT NULL,
  `TYPENAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `TYPES`
--

INSERT INTO `TYPES` (`TYPEID`, `TYPENAME`) VALUES
('dv', 'á»¨ng dá»¥ng dá»‹ch vá»¥'),
('gms', 'TrĂ² chÆ¡i'),
('ms', 'á»¨ng dá»¥ng mua sáº¯m'),
('mxh', 'Máº¡ng xĂ£ há»™i');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `userName` varchar(100) NOT NULL,
  `appId` int NOT NULL,
  `isAccepted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userName` varchar(100) NOT NULL,
  `userPass` varchar(100) DEFAULT NULL,
  `userImage` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userName`, `userPass`, `userImage`) VALUES
('giaosu', '1323', './image/h2.jpg'),
('haiquan', '088', './image/h3.jpg'),
('haitran05', '123', './dbas/dsad'),
('quivo01', '123', './image/h1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `FK_apps_userName` (`userName`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`userName`,`appId`),
  ADD KEY `FK_comments_appId` (`appId`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`userName`,`appId`),
  ADD KEY `FK_favorite_appId` (`appId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageId`),
  ADD KEY `FK_images_appId` (`appId`);

--
-- Indexes for table `TYPES`
--
ALTER TABLE `TYPES`
  ADD PRIMARY KEY (`TYPEID`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`userName`,`appId`),
  ADD KEY `FK_upload_appId` (`appId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_comments_userName` FOREIGN KEY (`userName`) REFERENCES `users` (`userName`);

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `FK_favorite_userName` FOREIGN KEY (`userName`) REFERENCES `users` (`userName`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_images_appId` FOREIGN KEY (`appId`) REFERENCES `apps` (`id`);

--
-- Constraints for table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `FK_upload_userName` FOREIGN KEY (`userName`) REFERENCES `users` (`userName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
