-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Dec 18, 2022 at 09:22 AM
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
  `vote` int DEFAULT '0',
  `desImg` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id`, `appName`, `srcDownload`, `srcImage`, `decsription`, `download`, `userName`, `DATEUP`, `TYPE`, `isConfirmed`, `size`, `vote`, `desImg`) VALUES
(27, 'Lazada', '/appContainer/apps/lazada.zip', '/appContainer/images/lazada.png', 'Tải app Lazada - Trải nghiệm mua sắm online tiện lợi & nhiều ưu đãi.', 0, 'giaosu', '2022-11-17 11:09:36', 'ms', 1, '82.2Mb', 0, '/appContainer/images/lazada2.jpg'),
(28, 'Đấu trường chân lý', '/appContainer/apps/tft.zip', '/appContainer/images/tft.jpg', 'Trò chơi chiến thuật được phát triển bởi RiotGames', 50, 'giaosu', '2022-11-17 11:10:41', 'gms', 1, '67.5Mb', 4, '/appContainer/images/tft2.jpg'),
(29, 'Gojeck', '/appContainer/apps/gojeck.zip', '/appContainer/images/gojeck.png', 'Giấy tờ đơn giản, đăng ký dễ dàng. Thưởng nóng cho Đối tác Tài xế mới. Thu nhập tới 40 triệu/tháng, thời gian làm việc linh hoạt, chủ động. đăng ký làm tài xế gojek.', 0, 'haiquan', '2022-11-17 11:12:01', 'dv', 1, '95.4Mb', 0, '/appContainer/images/gojeck2.png'),
(30, 'Tiktok', '/appContainer/apps/tumblr.zip', '/appContainer/images/tiktok.png', 'TikTok, được biết đến ở Trung Quốc với tên Douyin, là một dịch vụ lưu trữ video dạng ngắn thuộc sở hữu của công ty Trung Quốc ByteDance. Nó lưu trữ nhiều video do người dùng gửi, từ nội dung như trò đùa, pha nguy hiểm, thủ thuật, trò đùa và khiêu vũ, với thời lượng từ 15 giây đến mười phút.', 101, 'quivo01', '2022-11-17 11:20:00', 'mxh', 1, '180Mb', 0, '/appContainer/images/tiktok2.jpg'),
(31, 'PUBG MOBILE', '/appContainer/apps/pubg.zip', '/appContainer/images/pubg.png', 'PUBG MOBILE là một tựa game bắn súng battle royale MIỄN PHÍ được hơn 1 tỷ người chơi trên toàn thế giới lựa chọn. Những trận chiến khốc liệt trong các trận đấu kéo dài 10 phút, chơi mọi lúc, mọi nơi!', 0, 'haiquan', '2022-11-17 14:03:37', 'gms', 1, '541.6Mb', 4, '/appContainer/images/pubg2.jpg'),
(32, 'Twitter', '/appContainer/apps/twitter.zip', '/appContainer/images/twitter.png', ' Twitter cho phép bạn tìm kiếm nhưng người thú vị hoặc xây dựng một lượng theo dõi những người quan tâm đến bạn. Ngoài trò chuyện với bạn bè, Twitter cho phép những người có ảnh hưởng xây dựng kết nối cá nhân với người hâm mộ của họ. Nói chuyện trực tiếp với những người có ảnh hưởng đến bạn. Bạn sẽ ngạc nhiên khi nhận được rất nhiều phản hồi lại.', 0, 'giaosu', '2022-11-24 07:51:25', 'mxh', 1, '104.2Mb', 0, '/appContainer/images/twitter2.png'),
(33, 'Facebook', '/appContainer/apps/facebook.zip', '/appContainer/images/facebook.png', 'Ứng dụng mạng xã hội', 102, 'giaosu', '2022-11-24 07:54:04', 'mxh', 1, '49.2Mb', 0, '/appContainer/images/facebook2.jpg'),
(34, 'Amazon Shopping', '/appContainer/apps/amazon.zip', '/appContainer/images/amazon.png', 'Amazon.com, Inc. là một công ty công nghệ đa quốc gia của Mỹ tập trung vào thương mại điện tử, điện toán đám mây, quảng cáo trực tuyến, phát trực tuyến kỹ thuật số và trí tuệ nhân tạo', 99, 'giaosu', '2022-11-24 07:54:28', 'sm', 1, '73.1Mb', 0, '/appContainer/images/amazon2.png'),
(36, 'Stumble Guys', '/appContainer/apps/stumble.zip', '/appContainer/images/stumble.png', 'Nhảy, né tránh, chạy và vượt qua vạch đích ở vị trí số 1 trong Stumble Guys!\r\n\r\nStumble Guys là một battle royale thú vị để chơi! Tùy chỉnh vai trò của bạn trong trò chơi, tiếp tục lao tới và cầm chân tất cả những kẻ thách thức để trở thành người đứng cuối cùng. Nhưng hãy cẩn thận để không bị đá bởi những người chơi khác! Bạn còn chờ gì nữa? Hãy đến để tải xuống Stumble Guys trên điện thoại của bạn và bắt đầu cuộc chạy bất tận ly kỳ của bạn ngay bây giờ!', 100, 'haiquan', '2022-11-24 07:55:33', 'gms', 1, '118.1Mb', 0, '/appContainer/images/stumble2.jpg'),
(37, 'FIFA Mobile ', '/appContainer/apps/fo4.zip', '/appContainer/images/fo4.jpg', 'Chơi FIFA Soccer trong 30 giải đấu và 650 đội với những người chơi trên khắp thế giới!\r\n\r\nFIFA Soccer (FIFA Mobile 22) là phiên bản cập nhật của FIFA cổ điển với nhiều chế độ chơi. Bạn có thể thưởng thức lối chơi bóng đá một mình hoặc cùng với những người chơi khác trên khắp thế giới. Tận hưởng một cách chơi bóng đá thú vị mới trên điện thoại di động của bạn với FIFA Soccer!', 0, 'giaosu', '2022-11-24 09:23:24', 'gms', 1, '172.8Mb', 0, '/appContainer/images/fo42.jpg'),
(40, 'Nike Shoes', '/appContainer/apps/nike.zip', '/appContainer/images/nike.jpg', 'Mua tất cả những món quà hoàn hảo cho thể thao và phong cách trong mùa lễ này của Nike. Các sản phẩm Dành riêng cho Thành viên Nike, ưu đãi cuối năm, v.v. - mua sắm và tiết kiệm với tư cách là Thành viên Nike với những xu hướng và cải tiến mới nhất, dành riêng cho bạn.', 0, 'giaosu', '2022-11-29 06:19:40', 'ms', 1, '90.0Mb', 0, '/appContainer/images/nike2.png'),
(41, 'Grab Driver', 'appContainer/apps/grap.zip', 'appContainer/images/grap.png', 'Grab là siêu ứng dụng hàng đầu Đông Nam Á. Chúng tôi cung cấp các dịch vụ thiết yếu hàng ngày cho hơn 670 triệu người trên khắp Singapore, Indonesia, Malaysia, Thái Lan, Philippines, Việt Nam, Campuchia và Myanmar. Sứ mệnh của chúng tôi là thúc đẩy Đông Nam Á tiến lên bằng cách tạo ra sức mạnh kinh tế cho bạn và mọi người trong khu vực.', 0, 'haitran05', '2022-11-29 11:20:38', 'dv', 1, '115.2Mb', 0, 'appContainer/images/grap2.png'),
(42, ' BusMap Navigation & Timing', '/appContainer/apps/busmap.zip', '/appContainer/images/busmap.png', 'BusMap là ứng dụng hỗ trợ người dùng xe buýt đã được áp dụng tại 4 tỉnh/thành phố của Việt Nam (Hồ Chí Minh, Hà Nội, Đà Nẵng, Bình Dương) và 2 thành phố lớn của Thái Lan (Bangkok, Chiangmai', 0, 'giaosu', '2022-11-29 11:23:07', 'dv', 1, '40.8Mb', 0, '/appContainer/images/busmap2.png'),
(43, 'Shopee', '/appContainer/apps/shopee.zip', '/appContainer/images/shopee.png', 'Shopee là một công ty công nghệ đa quốc gia của Singapore chuyên về thương mại điện tử. Công ty được thành lập tại Singapore vào năm 2015, trước khi mở rộng ra nước ngoài. Tính đến năm 2021, Shopee được coi là nền tảng thương mại điện tử lớn nhất Đông Nam Á với 343 triệu người truy cập hàng tháng', 0, 'haiquan', '2022-11-29 11:27:27', 'ms', 1, '78.8Mb', 0, '/appContainer/images/shopee2.jpg'),
(46, 'Amongus', '/appContainer/apps/amongus.zip', '/appContainer/images/amongus.png', 'Crewmates work together to complete tasks before one or more Impostors can kill everyone aboard.', 0, 'haiquan', '2022-12-18 06:53:50', 'gms', 1, '1000', 0, '/appContainer/images/amongus2.jpg'),
(47, 'Autochess', '/appContainer/apps/autochess.zip', '/appContainer/images/autochess.png', 'Auto Chess is the original auto battler game co-developed by Dragonest Co., Ltd and Drodo Studio, and published by Dragonest Co., Ltd.', 0, 'haitran05', '2022-12-18 06:53:50', 'gms', 1, '1000', 0, '/appContainer/images/autochess2.jpg'),
(48, 'Babel', '/appContainer/apps/babel.zip', '/appContainer/image/babel.jpg', 'Learn more about Babel with our getting started guide or check out some videos on the people and concepts behind it.', 0, 'haiquan', '2022-12-18 06:53:50', 'longnguyen', 1, '1000', 0, '/appContainer/image/babel2.jpg'),
(49, 'Blablacar', '/appContainer/apps/blablacar.zip', '/appContainer/images/blablacar.png', 'Its website and mobile apps connect drivers and passengers willing to travel together between cities and share the cost of the journey.', 0, 'quivo01', '2022-12-18 06:53:50', 'ms', 1, '1000', 0, '/appContainer/images/blablacar2.png'),
(50, 'Bridj', '/appContainer/apps/bridj.zip', '/appContainer/images/bridj.png', 'Bridj is a supercharged booking and fleet management platform that helps you deliver better travel experiences for your passengers', 0, 'giaosu', '2022-12-18 06:53:50', 'dv', 1, '1000', 0, '/appContainer/images/bridj2.png'),
(51, 'Chotot', '/appContainer/apps/chotot.zip', '/appContainer/images/chotot.png', 'Safety starts with understanding how developers collect and share your data. Data privacy and security practices may vary based on your use, region, and age.', 0, 'quivo01', '2022-12-18 06:53:50', 'ms', 1, '1000', 0, '/appContainer/images/chotot2.png'),
(52, 'Craigslist', '/appContainer/apps/craigslist.zip', '/appContainer/images/craigslist.png', 'Gojek is beyond an app for online transportation, food delivery, logistics, payment, and daily services.', 0, 'giaosu', '2022-12-18 06:53:50', 'dv', 1, '1000', 0, '/appContainer/images/craigslist2.png'),
(53, 'Etg', '/appContainer/apps/etg.zip', '/appContainer/image/etg.jpg', 'List of all international craigslist.org online classifieds sites.', 0, 'haiquan', '2022-12-18 06:53:50', 'book', 0, '1000', 0, '/appContainer/image/etg2.jpg'),
(54, 'Ewy', '/appContainer/apps/ewy.zip', '/appContainer/images/ewy.jpg', 'Try the most fun way to learn languages with the help of memes from movies, books and games.', 0, 'haitran05', '2022-12-18 06:53:50', 'book', 1, '1000', 0, '/appContainer/images/ewy2.jpg'),
(55, 'Get', '/appContainer/apps/get.zip', '/appContainer/image/get.jpg', '', 0, 'longnguyen', '2022-12-18 06:53:50', 'book', 0, '1000', 0, '/appContainer/image/get2.jpg'),
(56, 'Gr', '/appContainer/apps/gr.zip', '/appContainer/image/gr.jpg', 'Introducing a faster, easier way to pay for all your City bills in a single, secure app that allows you to decide when and how much to pay.', 0, 'giaosu', '2022-12-18 06:53:50', 'book', 0, '1000', 0, '/appContainer/image/gr2.jpg'),
(57, 'Hns', '/appContainer/apps/hns.zip', '/appContainer/images/hns.jpg', 'The award winning HSN Shop App for Android is everything you know and love about HSN, right on your mobile phone or tablet! Check out the most popular brands that will keep you fabulous from head to toe and everywhere in between.', 0, 'haitran05', '2022-12-18 06:53:50', 'ms', 0, '1000', 0, '/appContainer/images/hns2.jpg'),
(58, 'Il', '/appContainer/apps/il.zip', '/appContainer/images/il.jpg', 'Safely and securely pay unpaid tolls or enroll and manage your I-PASS account or Pay By Plate service directly from your smartphone.', 0, 'longnguyen', '2022-12-18 06:53:50', 'dv', 1, '1000', 0, '/appContainer/images/il2.jpg'),
(59, 'Instagram', '/appContainer/apps/instagram.zip', '/appContainer/images/instagram.png', 'INSTA Reels bring you a new way to create and discover entertaining short videos. You can watch, like, comment, and share Reels videos in a dedicated space in Explore.', 0, 'quivo01', '2022-12-18 06:53:50', 'mxh', 1, '1000', 0, '/appContainer/images/instagram2.png'),
(60, 'Linkedin', '/appContainer/apps/linkedin.zip', '/appContainer/images/linkedin.png', 'Manage your professional identity. Build and engage with your professional network. Access knowledge, insights and opportunities.', 0, 'haiquan', '2022-12-18 06:53:50', 'dv', 1, '1000', 0, '/appContainer/images/linkedin2.png'),
(61, 'Nhà giả kim', '/appContainer/apps/ngk.zip', '/appContainer/images/ngk.jpg', 'Nhà giả kim là tiểu thuyết được xuất bản lần đầu ở Brasil năm 1988, và là cuốn sách nổi tiếng nhất của nhà văn Paulo Coelho. Tác phẩm đã được dịch ra 67 ngôn ngữ và bán ra tới 95 triệu bản, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại.', 0, 'quivo01', '2022-12-18 07:38:32', 'book', 1, '1000', 0, '/appContainer/images/ngk2.jpg'),
(62, 'Sherlock Homes', '/appContainer/apps/shms.zip', '/appContainer/images/shms.jpg', 'Sherlock Holmes is a fictional detective created by British author Arthur Conan Doyle. Referring to himself as a \"consulting detective\" in the stories, Holmes is known for his proficiency with observation', 0, 'haiquan', '2022-12-18 07:39:57', 'book', 1, '1000', 0, '/appContainer/images/shms2.jpg'),
(63, 'Cây người', '/appContainer/apps/cn.zip', '/appContainer/images/cn.jpg', 'Cây Người còn là một áng văn tuyệt mỹ về nước Úc sơ khai trữ tình, về những con người được tôi luyện trong gió và cát, cũng giống như cái cây nơi hoang dã, con người phải sống bằng chính sức lực của mình, phải chống lại mọi bão giông cuộc sống, giống như cái cây “không hề có phút giây yên tĩnh”…', 0, 'haiquan', '2022-12-18 07:41:20', 'book', 1, '1000', 0, '/appContainer/images/cn2.jpg');

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
('giaosu', 30, 1),
('giaosu', 31, 1),
('giaosu', 33, 1),
('giaosu', 34, 1),
('giaosu', 36, 1),
('haitran05', 27, 1),
('haitran05', 43, 1),
('quivo01', 28, 1),
('quivo01', 31, 1);

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
('book', 'Sách'),
('dv', 'Ứng dụng dịch vụ'),
('gms', 'Trò chơi'),
('ms', 'Ứng dụng mua sắm'),
('mxh', 'Mạng xã hội');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userName` varchar(100) NOT NULL,
  `userPass` varchar(100) DEFAULT NULL,
  `userImage` varchar(200) DEFAULT NULL,
  `fullName` char(50) DEFAULT NULL,
  `dateCreate` datetime DEFAULT CURRENT_TIMESTAMP,
  `email` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userName`, `userPass`, `userImage`, `fullName`, `dateCreate`, `email`) VALUES
('admin', '123456', 'null', 'Admin', '2022-11-10 00:00:00', 'null'),
('giaosu', '1323', './image/h2.jpg', 'Quang Nguyễn', '2022-11-10 00:00:00', 'QuangNguyen@gmail.com'),
('haiquan', '123456', './image/h3.jpg', 'Quân Nguyễn', '2022-11-11 00:00:00', 'Quannguyen@gmail.com'),
('haitran05', '123', './dbas/dsad', 'Văn Hải', '2022-11-12 00:00:00', 'haiga@gmail.com'),
('longnguyen', '123456', './images/defaultAvatar.png', 'Long Nguyễn', '2022-11-12 00:00:00', 'thanhlong@mgail.com'),
('quivo01', '123', './image/h1.jpg', 'Phú Quí', '2022-11-10 00:00:00', 'qui@gmail.com');

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
-- Indexes for table `TYPES`
--
ALTER TABLE `TYPES`
  ADD PRIMARY KEY (`TYPEID`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
