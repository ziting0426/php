-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-05-31 10:23:41
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `gowithme`
--

-- --------------------------------------------------------

--
-- 資料表結構 `attraction`
--

CREATE TABLE `attraction` (
  `attractionId` int(5) NOT NULL,
  `CityName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `attractionName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `attraction`
--

INSERT INTO `attraction` (`attractionId`, `CityName`, `attractionName`, `description`) VALUES
(1, 'Taipei', '台北101', '台北101曾是世界上最高的摩天大樓，其設計靈感來自於竹子，象徵著力量和生長。大樓內有多層的購物中心、辦公樓層，以及觀景台，從觀景台可以俯瞰整個台北市的美麗景色。'),
(2, 'Taipei', '故宮博物院', '故宮博物院是世界四大博物館之一，收藏了中國歷代豐富的文化遺產。館內珍藏了許多國寶級的文物，如翠玉白菜、毛公鼎等，展示了中國數千年的歷史和文化。'),
(3, 'Taipei', '士林夜市', '士林夜市是台北最大的夜市之一，這裡有琳瑯滿目的台灣小吃、服飾和雜貨攤位。著名的小吃包括豪大大雞排、大腸包小腸、蚵仔煎等，是體驗台灣地道飲食文化的絕佳去處。'),
(4, 'Taipei', '龍山寺', '龍山寺建於1738年，是台北最古老、最著名的佛教寺廟之一。寺內供奉著觀世音菩薩，每年吸引大量信眾和遊客前來參拜。寺廟建築富麗堂皇，融合了中國傳統建築藝術和宗教文化。'),
(5, 'Taipei', '陽明山國家公園', '陽明山國家公園以其壯麗的自然景觀和多樣的生態系統而聞名。這裡有美麗的花海、溫泉和登山步道，是遠足和休閒的理想場所。春天的櫻花季和秋天的楓葉景色尤其迷人，吸引了大量的遊客前來觀賞。'),
(6, 'Taichung', '彩虹眷村', '彩虹眷村是台中市南屯區的一個特殊村落，這裡的牆壁和道路上畫滿了五顏六色的圖案和插畫，創作者是老兵黃永阜（彩虹爺爺）。這些獨特的藝術作品使這個小村莊成為拍照打卡的熱門景點。'),
(7, 'Taichung', '高美濕地', '高美濕地位於台中市清水區，是一個擁有豐富生態系統的濕地保護區。這裡是觀賞夕陽和鳥類生態的絕佳場所，木棧道讓遊客可以近距離觀察濕地的自然景觀。'),
(8, 'Taichung', '國家歌劇院', '台中國家歌劇院是由日本建築師伊東豐雄設計的現代建築，其獨特的「曲牆」設計和創新的建築風格使其成為台中的地標性建築。這裡經常舉辦各種音樂會、歌劇和舞台劇。'),
(9, 'Taichung', '東海大學路思義教堂', '路思義教堂位於東海大學校園內，是由貝聿銘設計的一座現代化教堂。教堂外觀為高聳的三角形，充滿了簡約而莊嚴的美感，是台中市的建築名勝之一。'),
(10, 'Taichung', '逢甲夜市', '逢甲夜市是台灣最大的夜市之一，位於逢甲大學附近。這裡匯聚了各種美食攤位、服裝店和遊戲攤，是享受台灣小吃和夜生活的理想地點。人氣小吃包括大腸包小腸、雞排、珍珠奶茶等。'),
(11, 'Kaohsiung', '蓮池潭', '蓮池潭位於高雄市左營區，是一個以風景優美和豐富的文化古蹟著稱的人工湖。湖畔有多座寺廟和塔樓，如龍虎塔、春秋閣等，遊客可以在此欣賞美麗的湖光山色和體驗道教文化。'),
(12, 'Kaohsiung', '美麗島捷運站', '美麗島捷運站因其壯觀的「光之穹頂」而聞名，被譽為世界最美的捷運站之一。穹頂由義大利藝術家 Narcissus Quagliata 設計，玻璃彩繪的藝術作品呈現出鮮豔奪目的色彩和壯麗的視覺效果，是遊客必訪的拍照地點。'),
(13, 'Kaohsiung', '駁二藝術特區', '駁二藝術特區是高雄市鹽埕區的一個文化藝術園區，前身為港口的倉庫區。這裡現已轉變為展示當代藝術作品和舉辦各種文化活動的空間，有著濃厚的創意氛圍和豐富的展覽、演出和手作市集。'),
(14, 'Kaohsiung', '旗津', '旗津是一個位於高雄市西南方的長條形島嶼，乘坐渡輪即可到達。這裡有美麗的沙灘、旗津燈塔、旗津風車公園等景點。遊客可以騎自行車環島，品嚐當地的海鮮美食，並欣賞壯觀的海景。'),
(15, 'Kaohsiung', '六合夜市', '六合夜市是高雄市最著名的夜市之一，位於新興區六合二路。這裡有各式各樣的台灣小吃和特色美食，如烤魷魚、木瓜牛奶、鼎邊銼等，吸引了大量本地人和遊客前來品嚐和逛街。');

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--

CREATE TABLE `cart` (
  `cartId` int(5) NOT NULL,
  `attractionName` varchar(100) NOT NULL,
  `memberId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `cart`
--

INSERT INTO `cart` (`cartId`, `attractionName`, `memberId`) VALUES
(12, '士林夜市', 10),
(13, '六合夜市', 10);

-- --------------------------------------------------------

--
-- 資料表結構 `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `memberId` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `comments`
--

INSERT INTO `comments` (`commentId`, `postId`, `memberId`, `comment`, `created_at`) VALUES
(1, 4, 9, '123', '2024-05-31 08:06:24'),
(2, 4, 9, '456', '2024-05-31 08:06:34'),
(3, 4, 11, '789', '2024-05-31 08:07:49'),
(4, 8, 11, '太好玩啦!!!+111111', '2024-05-31 08:08:09');

-- --------------------------------------------------------

--
-- 資料表結構 `forum`
--

CREATE TABLE `forum` (
  `postId` int(11) NOT NULL,
  `memberId` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `forum`
--

INSERT INTO `forum` (`postId`, `memberId`, `content`, `created_at`) VALUES
(4, 9, '<h3>會員 9 的行程:</h3><br>國家歌劇院<br><br>蓮池潭<br><br>', '2024-05-31 07:53:06'),
(5, 9, '<h3>會員 9 的行程:</h3><br>駁二藝術特區<br><br>', '2024-05-31 07:56:44'),
(6, 9, '<h3>會員 9 的行程:</h3><br>彩虹眷村<br><br>', '2024-05-31 07:57:27'),
(7, 9, '<h3>會員 9 的行程:</h3><br>彩虹眷村<br><br>', '2024-05-31 08:03:44'),
(8, 9, '<h3>會員 9 的行程:</h3><br>蓮池潭<br><br>', '2024-05-31 08:04:51'),
(9, 11, '<h3>會員 11 的行程:</h3><br>故宮博物院<br><br>高美濕地<br><br>美麗島捷運站<br><br>旗津<br><br>', '2024-05-31 08:07:37');

-- --------------------------------------------------------

--
-- 資料表結構 `history`
--

CREATE TABLE `history` (
  `historyId` int(11) NOT NULL,
  `memberId` int(100) NOT NULL,
  `attractionName` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `history`
--

INSERT INTO `history` (`historyId`, `memberId`, `attractionName`, `created_at`) VALUES
(1, 9, '故宮博物院', '2024-05-31 07:31:16'),
(2, 9, '駁二藝術特區', '2024-05-31 07:31:16'),
(3, 9, '故宮博物院', '2024-05-31 07:36:09'),
(4, 9, '駁二藝術特區', '2024-05-31 07:36:09'),
(5, 9, '故宮博物院', '2024-05-31 07:37:53'),
(6, 9, '駁二藝術特區', '2024-05-31 07:37:53'),
(7, 9, '故宮博物院', '2024-05-31 07:42:12'),
(8, 9, '駁二藝術特區', '2024-05-31 07:42:12'),
(9, 9, '故宮博物院', '2024-05-31 07:43:33'),
(10, 9, '駁二藝術特區', '2024-05-31 07:43:33');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `No` int(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`No`, `Email`, `Password`, `gender`) VALUES
(1, 'root', 'nukim17', 'female'),
(2, '8859249jessica@gmail.com', 'KxkTRpj0', 'female'),
(9, 'a1113319@mail.nuk.edu.tw', '33193319', 'Female'),
(10, '88@gmail.com', '123456456', 'Female'),
(11, 'a1113306@mail.nuk.edu.tw', 'Oo930426', 'Female');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `attraction`
--
ALTER TABLE `attraction`
  ADD PRIMARY KEY (`attractionId`);

--
-- 資料表索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- 資料表索引 `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `postId` (`postId`),
  ADD KEY `memberId` (`memberId`);

--
-- 資料表索引 `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`postId`);

--
-- 資料表索引 `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`historyId`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`No`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `attraction`
--
ALTER TABLE `attraction`
  MODIFY `attractionId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `forum`
--
ALTER TABLE `forum`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `history`
--
ALTER TABLE `history`
  MODIFY `historyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `forum` (`postId`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`memberId`) REFERENCES `member` (`No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
