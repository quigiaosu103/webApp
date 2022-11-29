-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Nov 29, 2022 at 11:09 AM
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
  `isConfirmed` tinyint(1) DEFAULT '0',
  `size` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id`, `appName`, `srcDownload`, `srcImage`, `decsription`, `download`, `userName`, `DATEUP`, `TYPE`, `isConfirmed`, `size`) VALUES
(27, 'Lazada', 'https://d.apkpure.com/b/APK/com.lazada.android?version=latest', '/appContainer/images/ms/lazada.png', 'Táº£i app Lazada - Tráº£i nghiá»‡m mua sáº¯m online tiá»‡n lá»£i & nhiá»u Æ°u Ä‘Ă£i.', 0, 'giaosu', '2022-11-17 11:09:36', 'ms', 1, '82.2Mb'),
(28, 'Äáº¥u trÆ°á»ng chĂ¢n lĂ½', 'https://d.apkpure.com/b/APK/com.riotgames.league.teamfighttactics?version=latest', '/appContainer/images/gms/tft.jpg', 'TrĂ² chÆ¡i chiáº¿n thuáº­t Ä‘Æ°á»£c phĂ¡t triá»ƒn bá»Ÿi RiotGames', 50, 'giaosu', '2022-11-17 11:10:41', 'gms', 0, '67.5Mb'),
(29, 'Gojeck', 'https://d.apkpure.com/b/APK/com.gojek.app?version=latest', '/appContainer/images/dv/gojeck.png', 'Giáº¥y tá» Ä‘Æ¡n giáº£n, Ä‘Äƒng kĂ½ dá»… dĂ ng. ThÆ°á»Ÿng nĂ³ng cho Äá»‘i tĂ¡c TĂ i xáº¿ má»›i. Thu nháº­p tá»›i 40 triá»‡u/thĂ¡ng, thá»i gian lĂ m viá»‡c linh hoáº¡t, chá»§ Ä‘á»™ng. Ä‘Äƒng kĂ½ lĂ m tĂ i xáº¿ gojek.', 0, 'haiquan', '2022-11-17 11:12:01', 'dv', 0, '95.4Mb'),
(30, 'Tiktok', 'https://d.apkpure.com/b/APK/com.ss.android.ugc.trill?version=latest', '/appContainer/images/mxh/tiktok.png', 'TikTok, Ä‘Æ°á»£c biáº¿t Ä‘áº¿n á»Ÿ Trung Quá»‘c vá»›i tĂªn Douyin, lĂ  má»™t dá»‹ch vá»¥ lÆ°u trá»¯ video dáº¡ng ngáº¯n thuá»™c sá»Ÿ há»¯u cá»§a cĂ´ng ty Trung Quá»‘c ByteDance. NĂ³ lÆ°u trá»¯ nhiá»u video do ngÆ°á»i dĂ¹ng gá»­i, tá»« ná»™i dung nhÆ° trĂ² Ä‘Ă¹a, pha nguy hiá»ƒm, thá»§ thuáº­t, trĂ² Ä‘Ă¹a vĂ  khiĂªu vÅ©, vá»›i thá»i lÆ°á»£ng tá»« 15 giĂ¢y Ä‘áº¿n mÆ°á»i phĂºt.', 101, 'quivo01', '2022-11-17 11:20:00', 'mxh', 0, '180Mb'),
(31, 'PUBG MOBILE', 'https://d.apkpure.com/b/APK/com.tencent.ig?version=latest', '/appContainer/images/gms/pubg.png', 'PUBG MOBILE lĂ  má»™t tá»±a game báº¯n sĂºng battle royale MIá»„N PHĂ Ä‘Æ°á»£c hÆ¡n 1 tá»· ngÆ°á»i chÆ¡i trĂªn toĂ n tháº¿ giá»›i lá»±a chá»n. Nhá»¯ng tráº­n chiáº¿n khá»‘c liá»‡t trong cĂ¡c tráº­n Ä‘áº¥u kĂ©o dĂ i 10 phĂºt, chÆ¡i má»i lĂºc, má»i nÆ¡i!', 0, 'haiquan', '2022-11-17 14:03:37', 'gms', 0, '541.6Mb'),
(32, 'Twitter', 'https://d.apkpure.com/b/APK/com.twitter.android?version=latest', '/appContainer/images/mxh/twitter.png', ' Twitter cho phĂ©p báº¡n tĂ¬m kiáº¿m nhÆ°ng ngÆ°á»i thĂº vá»‹ hoáº·c xĂ¢y dá»±ng má»™t lÆ°á»£ng theo dĂµi nhá»¯ng ngÆ°á»i quan tĂ¢m Ä‘áº¿n báº¡n. NgoĂ i trĂ² chuyá»‡n vá»›i báº¡n bĂ¨, Twitter cho phĂ©p nhá»¯ng ngÆ°á»i cĂ³ áº£nh hÆ°á»Ÿng xĂ¢y dá»±ng káº¿t ná»‘i cĂ¡ nhĂ¢n vá»›i ngÆ°á»i hĂ¢m má»™ cá»§a há». NĂ³i chuyá»‡n trá»±c tiáº¿p vá»›i nhá»¯ng ngÆ°á»i cĂ³ áº£nh hÆ°á»Ÿng Ä‘áº¿n báº¡n. Báº¡n sáº½ ngáº¡c nhiĂªn khi nháº­n Ä‘Æ°á»£c ráº¥t nhiá»u pháº£n há»“i láº¡i.', 0, 'giaosu', '2022-11-24 07:51:25', 'mxh', 0, '104.2Mb'),
(33, 'Facebook', 'https://d.apkpure.com/b/APK/com.facebook.katana?version=latest', 'appContainer/images/mxh/facebook.png', 'á»¨ng dá»¥ng máº¡ng xĂ£ há»™i', 102, 'giaosu', '2022-11-24 07:54:04', 'mxh', 0, '49.2Mb'),
(34, 'Amazon Shopping', 'https://d.apkpure.com/b/APK/com.amazon.mShop.android.shopping?version=latest', '/appContainer/images/ms/amazon.png', 'Amazon.com, Inc. lĂ  má»™t cĂ´ng ty cĂ´ng nghá»‡ Ä‘a quá»‘c gia cá»§a Má»¹ táº­p trung vĂ o thÆ°Æ¡ng máº¡i Ä‘iá»‡n tá»­, Ä‘iá»‡n toĂ¡n Ä‘Ă¡m mĂ¢y, quáº£ng cĂ¡o trá»±c tuyáº¿n, phĂ¡t trá»±c tuyáº¿n ká»¹ thuáº­t sá»‘ vĂ  trĂ­ tuá»‡ nhĂ¢n táº¡o', 99, 'giaosu', '2022-11-24 07:54:28', 'sm', 0, '73.1Mb'),
(36, 'Stumble Guys', 'https://d.apkpure.com/b/APK/com.kitkagames.fallbuddies?version=latest', 'appContainer/images/gms/stumble.png', 'Nháº£y, nĂ© trĂ¡nh, cháº¡y vĂ  vÆ°á»£t qua váº¡ch Ä‘Ă­ch á»Ÿ vá»‹ trĂ­ sá»‘ 1 trong Stumble Guys!\r\n\r\nStumble Guys lĂ  má»™t battle royale thĂº vá»‹ Ä‘á»ƒ chÆ¡i! TĂ¹y chá»‰nh vai trĂ² cá»§a báº¡n trong trĂ² chÆ¡i, tiáº¿p tá»¥c lao tá»›i vĂ  cáº§m chĂ¢n táº¥t cáº£ nhá»¯ng káº» thĂ¡ch thá»©c Ä‘á»ƒ trá»Ÿ thĂ nh ngÆ°á»i Ä‘á»©ng cuá»‘i cĂ¹ng. NhÆ°ng hĂ£y cáº©n tháº­n Ä‘á»ƒ khĂ´ng bá»‹ Ä‘Ă¡ bá»Ÿi nhá»¯ng ngÆ°á»i chÆ¡i khĂ¡c! Báº¡n cĂ²n chá» gĂ¬ ná»¯a? HĂ£y Ä‘áº¿n Ä‘á»ƒ táº£i xuá»‘ng Stumble Guys trĂªn Ä‘iá»‡n thoáº¡i cá»§a báº¡n vĂ  báº¯t Ä‘áº§u cuá»™c cháº¡y báº¥t táº­n ly ká»³ cá»§a báº¡n ngay bĂ¢y giá»!', 100, 'haiquan', '2022-11-24 07:55:33', 'gms', 1, '118.1Mb'),
(37, 'FIFA Mobile ', 'https://d.apkpure.com/b/APK/com.ea.gp.fifamobile?version=latest', 'appContainer/images/gms/fo4.jpg', 'ChÆ¡i FIFA Soccer trong 30 giáº£i Ä‘áº¥u vĂ  650 Ä‘á»™i vá»›i nhá»¯ng ngÆ°á»i chÆ¡i trĂªn kháº¯p tháº¿ giá»›i!\r\n\r\nFIFA Soccer (FIFA Mobile 22) lĂ  phiĂªn báº£n cáº­p nháº­t cá»§a FIFA cá»• Ä‘iá»ƒn vá»›i nhiá»u cháº¿ Ä‘á»™ chÆ¡i. Báº¡n cĂ³ thá»ƒ thÆ°á»Ÿng thá»©c lá»‘i chÆ¡i bĂ³ng Ä‘Ă¡ má»™t mĂ¬nh hoáº·c cĂ¹ng vá»›i nhá»¯ng ngÆ°á»i chÆ¡i khĂ¡c trĂªn kháº¯p tháº¿ giá»›i. Táº­n hÆ°á»Ÿng má»™t cĂ¡ch chÆ¡i bĂ³ng Ä‘Ă¡ thĂº vá»‹ má»›i trĂªn Ä‘iá»‡n thoáº¡i di Ä‘á»™ng cá»§a báº¡n vá»›i FIFA Soccer!', 0, 'giaosu', '2022-11-24 09:23:24', 'gms', 0, '172.8Mb'),
(40, 'Nike Shoes', 'https://d.apkpure.com/b/APK/com.nike.omega?version=latest', 'appContainer/images/ms/nike.jpg', 'Mua táº¥t cáº£ nhá»¯ng mĂ³n quĂ  hoĂ n háº£o cho thá»ƒ thao vĂ  phong cĂ¡ch trong mĂ¹a lá»… nĂ y cá»§a Nike. CĂ¡c sáº£n pháº©m DĂ nh riĂªng cho ThĂ nh viĂªn Nike, Æ°u Ä‘Ă£i cuá»‘i nÄƒm, v.v. - mua sáº¯m vĂ  tiáº¿t kiá»‡m vá»›i tÆ° cĂ¡ch lĂ  ThĂ nh viĂªn Nike vá»›i nhá»¯ng xu hÆ°á»›ng vĂ  cáº£i tiáº¿n má»›i nháº¥t, dĂ nh riĂªng cho báº¡n.', 0, 'giaosu', '2022-11-29 06:19:40', 'ms', 0, '90.0Mb');

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
('giaosu', 33, 'Ung dung hay', '2022-11-29 06:59:34'),
('giaosu', 36, 'Q1 tá»‘t, Q2 rĂ¬a, Q3 Ă¡c quĂ¡', '2022-11-26 14:35:28'),
('giaosu', 37, 'New season', '2022-11-29 07:05:23'),
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
('longnguyen', '123', './images/defaultAvatar.png'),
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
