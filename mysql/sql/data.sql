-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Dec 15, 2022 at 02:12 AM
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
  `size` char(20) DEFAULT NULL,
  `vote` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id`, `appName`, `srcDownload`, `srcImage`, `decsription`, `download`, `userName`, `DATEUP`, `TYPE`, `isConfirmed`, `size`, `vote`) VALUES
(27, 'Lazada', 'https://d.apkpure.com/b/APK/com.lazada.android?version=latest', '/appContainer/images/ms/lazada.png', 'Tải app Lazada - Trải nghiệm mua sắm online tiện lợi & nhiều ưu đãi.', 0, 'giaosu', '2022-11-17 11:09:36', 'ms', 1, '82.2Mb', 0),
(28, 'Đấu trường chân lý', 'https://d.apkpure.com/b/APK/com.riotgames.league.teamfighttactics?version=latest', '/appContainer/images/gms/tft.jpg', 'Trò chơi chiến thuật được phát triển bởi RiotGames', 50, 'giaosu', '2022-11-17 11:10:41', 'gms', 1, '67.5Mb', 0),
(29, 'Gojeck', 'https://d.apkpure.com/b/APK/com.gojek.app?version=latest', '/appContainer/images/dv/gojeck.png', 'Giấy tờ đơn giản, đăng ký dễ dàng. Thưởng nóng cho Đối tác Tài xế mới. Thu nhập tới 40 triệu/tháng, thời gian làm việc linh hoạt, chủ động. đăng ký làm tài xế gojek.', 0, 'haiquan', '2022-11-17 11:12:01', 'dv', 1, '95.4Mb', 0),
(30, 'Tiktok', 'https://d.apkpure.com/b/APK/com.ss.android.ugc.trill?version=latest', '/appContainer/images/mxh/tiktok.png', 'TikTok, được biết đến ở Trung Quốc với tên Douyin, là một dịch vụ lưu trữ video dạng ngắn thuộc sở hữu của công ty Trung Quốc ByteDance. Nó lưu trữ nhiều video do người dùng gửi, từ nội dung như trò đùa, pha nguy hiểm, thủ thuật, trò đùa và khiêu vũ, với thời lượng từ 15 giây đến mười phút.', 101, 'quivo01', '2022-11-17 11:20:00', 'mxh', 1, '180Mb', 0),
(31, 'PUBG MOBILE', 'https://d.apkpure.com/b/APK/com.tencent.ig?version=latest', '/appContainer/images/gms/pubg.png', 'PUBG MOBILE là một tựa game bắn súng battle royale MIỄN PHÍ được hơn 1 tỷ người chơi trên toàn thế giới lựa chọn. Những trận chiến khốc liệt trong các trận đấu kéo dài 10 phút, chơi mọi lúc, mọi nơi!', 0, 'haiquan', '2022-11-17 14:03:37', 'gms', 1, '541.6Mb', 0),
(32, 'Twitter', 'https://d.apkpure.com/b/APK/com.twitter.android?version=latest', '/appContainer/images/mxh/twitter.png', ' Twitter cho phép bạn tìm kiếm nhưng người thú vị hoặc xây dựng một lượng theo dõi những người quan tâm đến bạn. Ngoài trò chuyện với bạn bè, Twitter cho phép những người có ảnh hưởng xây dựng kết nối cá nhân với người hâm mộ của họ. Nói chuyện trực tiếp với những người có ảnh hưởng đến bạn. Bạn sẽ ngạc nhiên khi nhận được rất nhiều phản hồi lại.', 0, 'giaosu', '2022-11-24 07:51:25', 'mxh', 1, '104.2Mb', 0),
(33, 'Facebook', 'https://d.apkpure.com/b/APK/com.facebook.katana?version=latest', 'appContainer/images/mxh/facebook.png', 'Ứng dụng mạng xã hội', 102, 'giaosu', '2022-11-24 07:54:04', 'mxh', 1, '49.2Mb', 0),
(34, 'Amazon Shopping', 'https://d.apkpure.com/b/APK/com.amazon.mShop.android.shopping?version=latest', '/appContainer/images/ms/amazon.png', 'Amazon.com, Inc. là một công ty công nghệ đa quốc gia của Mỹ tập trung vào thương mại điện tử, điện toán đám mây, quảng cáo trực tuyến, phát trực tuyến kỹ thuật số và trí tuệ nhân tạo', 99, 'giaosu', '2022-11-24 07:54:28', 'sm', 1, '73.1Mb', 0),
(36, 'Stumble Guys', 'https://d.apkpure.com/b/APK/com.kitkagames.fallbuddies?version=latest', 'appContainer/images/gms/stumble.png', 'Nhảy, né tránh, chạy và vượt qua vạch đích ở vị trí số 1 trong Stumble Guys!\r\n\r\nStumble Guys là một battle royale thú vị để chơi! Tùy chỉnh vai trò của bạn trong trò chơi, tiếp tục lao tới và cầm chân tất cả những kẻ thách thức để trở thành người đứng cuối cùng. Nhưng hãy cẩn thận để không bị đá bởi những người chơi khác! Bạn còn chờ gì nữa? Hãy đến để tải xuống Stumble Guys trên điện thoại của bạn và bắt đầu cuộc chạy bất tận ly kỳ của bạn ngay bây giờ!', 100, 'haiquan', '2022-11-24 07:55:33', 'gms', 1, '118.1Mb', 0),
(37, 'FIFA Mobile ', 'https://d.apkpure.com/b/APK/com.ea.gp.fifamobile?version=latest', 'appContainer/images/gms/fo4.jpg', 'Chơi FIFA Soccer trong 30 giải đấu và 650 đội với những người chơi trên khắp thế giới!\r\n\r\nFIFA Soccer (FIFA Mobile 22) là phiên bản cập nhật của FIFA cổ điển với nhiều chế độ chơi. Bạn có thể thưởng thức lối chơi bóng đá một mình hoặc cùng với những người chơi khác trên khắp thế giới. Tận hưởng một cách chơi bóng đá thú vị mới trên điện thoại di động của bạn với FIFA Soccer!', 0, 'giaosu', '2022-11-24 09:23:24', 'gms', 1, '172.8Mb', 0),
(40, 'Nike Shoes', 'https://d.apkpure.com/b/APK/com.nike.omega?version=latest', 'appContainer/images/ms/nike.jpg', 'Mua tất cả những món quà hoàn hảo cho thể thao và phong cách trong mùa lễ này của Nike. Các sản phẩm Dành riêng cho Thành viên Nike, ưu đãi cuối năm, v.v. - mua sắm và tiết kiệm với tư cách là Thành viên Nike với những xu hướng và cải tiến mới nhất, dành riêng cho bạn.', 0, 'giaosu', '2022-11-29 06:19:40', 'ms', 1, '90.0Mb', 0),
(41, 'Grab Driver', 'https://d.apkpure.com/b/APK/com.grabtaxi.driver2?version=latest', 'appContainer/images/dv/grap.png', 'Grab là siêu ứng dụng hàng đầu Đông Nam Á. Chúng tôi cung cấp các dịch vụ thiết yếu hàng ngày cho hơn 670 triệu người trên khắp Singapore, Indonesia, Malaysia, Thái Lan, Philippines, Việt Nam, Campuchia và Myanmar. Sứ mệnh của chúng tôi là thúc đẩy Đông Nam Á tiến lên bằng cách tạo ra sức mạnh kinh tế cho bạn và mọi người trong khu vực.', 0, 'haitran05', '2022-11-29 11:20:38', 'dv', 1, '115.2Mb', 0),
(42, ' BusMap Navigation & Timing', 'https://d.apkpure.com/b/XAPK/com.t7.busmap?version=latest', 'appContainer/images/dv/busmap.png', 'BusMap là ứng dụng hỗ trợ người dùng xe buýt đã được áp dụng tại 4 tỉnh/thành phố của Việt Nam (Hồ Chí Minh, Hà Nội, Đà Nẵng, Bình Dương) và 2 thành phố lớn của Thái Lan (Bangkok, Chiangmai', 0, 'giaosu', '2022-11-29 11:23:07', 'dv', 1, '40.8Mb', 0),
(43, 'Shopee', 'https://m.apkpure.com/shopee-shop-this-11-11-12-12/com.shopee.ph/download?channel_id=1008&from=brand_search-m', 'appContainer\\images\\ms\\shopee.png', 'Shopee là một công ty công nghệ đa quốc gia của Singapore chuyên về thương mại điện tử. Công ty được thành lập tại Singapore vào năm 2015, trước khi mở rộng ra nước ngoài. Tính đến năm 2021, Shopee được coi là nền tảng thương mại điện tử lớn nhất Đông Nam Á với 343 triệu người truy cập hàng tháng', 0, 'haiquan', '2022-11-29 11:27:27', 'ms', 1, '78.8Mb', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `userName` varchar(100) NOT NULL,
  `appId` int NOT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `timeComment` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `vote` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`userName`, `appId`, `content`, `timeComment`, `vote`) VALUES
('giaosu', 28, 'good game', '2022-12-03 05:37:47', 4),
('giaosu', 33, 'Ung dung hay', '2022-11-29 06:59:34', 5),
('giaosu', 34, 'Ứng dụng tốt', '2022-12-05 00:22:56', 4),
('giaosu', 36, 'Q1 tốt, Q2 rìa, Q3 ác quá', '2022-11-26 14:35:28', 3),
('giaosu', 37, 'ádjan', '2022-12-05 01:09:05', 4),
('haitran05', 36, 'Trò chơi hay', '2022-12-05 01:43:50', 4),
('quivo01', 36, 'Đây là tiếng nói giáo sư, phát ra từ Phước Kiển Nhà Bè', '2022-11-26 16:01:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `userName` varchar(100) NOT NULL,
  `appId` int NOT NULL,
  `isLiked` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`userName`, `appId`, `isLiked`) VALUES
('giaosu', 27, 1),
('giaosu', 28, 1),
('giaosu', 33, 1),
('giaosu', 34, 1),
('giaosu', 36, 1),
('haitran05', 27, 1),
('haitran05', 43, 1),
('quivo01', 28, 1);

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
('dv', 'Ứng dụng dịch vụ'),
('gms', 'Trò chơi'),
('ms', 'Ứng dụng mua sắm'),
('mxh', 'Mạng xã hội');

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
  `userImage` varchar(200) DEFAULT NULL,
  `fullName` char(50) DEFAULT NULL,
  `dateCreate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userName`, `userPass`, `userImage`, `fullName`, `dateCreate`) VALUES
('admin', '123', NULL, 'Admin', '2022-11-10 00:00:00'),
('giaosu', '1323', './image/h2.jpg', 'Quang Nguyễn', '2022-11-10 00:00:00'),
('haiquan', '088', './image/h3.jpg', 'Quân Nguyễn', '2022-11-11 00:00:00'),
('haitran05', '123', './dbas/dsad', 'Văn Hải', '2022-11-12 00:00:00'),
('longnguyen', '123', './images/defaultAvatar.png', 'Long Nguyễn', '2022-11-12 00:00:00'),
('quivo01', '123', './image/h1.jpg', 'Phú Quí', '2022-11-10 00:00:00');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
