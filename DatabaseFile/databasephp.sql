-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 18, 2023 lúc 12:15 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `databasephp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `Category_id` int NOT NULL AUTO_INCREMENT,
  `Name_category` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  PRIMARY KEY (`Category_id`),
  KEY `Category_id` (`Category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`Category_id`, `Name_category`) VALUES
(19, 'romance'),
(20, 'hanhdong'),
(21, 'manga'),
(22, 'lighnovel'),
(23, 'tuduy'),
(24, 'giaoduc'),
(106, 'temp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `Order_Details_id` int NOT NULL AUTO_INCREMENT,
  `Product_id` varchar(10) COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `Product_Qty` int NOT NULL,
  `Product_Price` varchar(50) COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `Order_id` varchar(10) COLLATE utf8mb3_vietnamese_ci NOT NULL,
  PRIMARY KEY (`Order_Details_id`),
  KEY `Order_Details_id` (`Order_Details_id`,`Product_id`,`Order_id`),
  KEY `Product_id` (`Product_id`),
  KEY `Order_id` (`Order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`Order_Details_id`, `Product_id`, `Product_Qty`, `Product_Price`, `Order_id`) VALUES
(11, 'manga11701', 1, '34000', '1716124556'),
(12, 'manga21701', 1, '34000', '1716124556'),
(13, 'Manga31701', 2, '125000', '1716124556'),
(14, 'LN21701869', 4, '110000', '1716124556'),
(15, 'manga11701', 1, '34000', '8316124950'),
(16, 'manga21701', 1, '34000', '8316124950'),
(17, 'Manga31701', 2, '125000', '8316124950'),
(18, 'LN21701869', 4, '110000', '8316124950'),
(19, 'manga41701', 1, '52000', '1716125706'),
(20, 'Manga51701', 1, '28000', '1716125706'),
(21, 'manga21701', 1, '34000', '1716125706'),
(22, 'manga41701', 1, '52000', '5616125850'),
(23, 'Manga51701', 1, '28000', '5616125850'),
(24, 'manga11701', 1, '34000', '5616125850'),
(25, 'manga21701', 1, '34000', '5616125850'),
(26, 'LN21701869', 4, '110000', '3316010239'),
(27, 'LN17018694', 2, '134000', '3316010239'),
(28, 'manga21701', 1, '34000', '8316012558'),
(29, 'Manga31701', 1, '125000', '8316012558');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_tbl`
--

DROP TABLE IF EXISTS `order_tbl`;
CREATE TABLE IF NOT EXISTS `order_tbl` (
  `Order_Id` varchar(10) COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `Oder_Date` varchar(50) COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `Order_Total` varchar(50) COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `User_id` int NOT NULL,
  `Adress` varchar(100) COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `Phone` varchar(10) COLLATE utf8mb3_vietnamese_ci NOT NULL,
  PRIMARY KEY (`Order_Id`),
  KEY `User_id` (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order_tbl`
--

INSERT INTO `order_tbl` (`Order_Id`, `Oder_Date`, `Order_Total`, `User_id`, `Adress`, `Phone`) VALUES
('1716124556', '2023/12/16', '758000', 31, 'quan 8', '1234567891'),
('1716125706', '2023/12/16', '114000', 31, 'TPHCM', '4564564'),
('3316010239', '2023/12/16', '708000', 31, 'QUAN7 TPHCM', '5645645'),
('5616125850', '2023/12/16', '148000', 31, 'sfsfsd', '4564564'),
('8316012558', '2023/12/16', '159000', 31, 'test', '143235'),
('8316124950', '2023/12/16', '758000', 31, 'quan 8', '56756575');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `Product_id` varchar(10) COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `Name_book` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `Date` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `Img` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `Price` double NOT NULL,
  `Category_id` int NOT NULL,
  `Description` varchar(100) COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `Publishing` varchar(50) COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `Author` varchar(50) COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `SoldOut` int NOT NULL,
  PRIMARY KEY (`Product_id`),
  KEY `Category_id` (`Category_id`),
  KEY `Product_id` (`Product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`Product_id`, `Name_book`, `Date`, `Img`, `Price`, `Category_id`, `Description`, `Publishing`, `Author`, `SoldOut`) VALUES
('book117013', 'Thao Túng Tâm Lý - Nhận Diện, Thức Tỉnh Và Chữa Là', '1701354522', 'book11701354522@Thao@1701354522.jpeg', 70000, 23, 'Thao Túng Tâm Lý - Nhận Diện, Thức Tỉnh Và Chữa Lành Những Tổn Thương Tiềm Ẩn\r\n\r\nTrong cuốn “Thao tú', '1980 Books', 'NXB Dân Trí', 0),
('book170131', 'Adrift A True Story of Love, Loss, and Survival at', '1701314467', 'book1701314467@Adrift@1701314467.jpeg', 123, 19, 'dfgdgd', 'ter', 'ert', 0),
('book170135', 'Chữa Lành Những Sang Chấn Tuổi Thơ', '1701354185', 'book1701354185@Chữa@1701354185.jpeg', 50000, 19, 'Giá sản phẩm trên Fahasa.com đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm', 'Saigon Books', 'Thế Giới', 0),
('books17013', 'Trầm Cảm Ẩn', '1701354436', 'books1701354436@Trầm@1701354436.jpeg', 60000, 23, 'Trầm Cảm Ẩn - Cách Thoát Khỏi Chủ Nghĩa Hoàn Hảo Đang Che Đậy Căn Bệnh Trầm Cảm Của Bạn\r\n\r\n“Brittany', 'Minh Long', 'Thanh Niên', 0),
('GD17017917', 'Mind Map English Vocabulary - Từ Vựng Tiếng Anh Qu', '1701791701', 'GD1701791701@Mind@1701791701.jpeg', 118000, 24, 'Bạn đang gặp khó khăn với việc học từ vựng Tiếng Anh khi thường xuyên học trước quên sau.\r\n\r\nBạn đan', 'MCBooks', 'Hoàng Ngân, Linh Chi', 0),
('GD17018691', 'Luyện Nói Tiếng Trung Quốc Cấp Tốc Cho Người Bắt Đ', '1701869266', 'GD17018691@Luyện@1701869266.jpeg', 141000, 24, 'Luyện nói tiếng Trung Quốc cấp tốc là bộ giáo trình được biên soạn dành riêng cho sinh viên nước ngo', 'NXB Tổng Hợp TPHCM', 'NXB Tổng Hợp TPHCM', 0),
('GD31701916', 'Bí Quyết Chinh Phục Điểm Cao Kì Thi THPT Quốc Gia ', '1701916696', 'GD31701916696@Bí@1701916696.jpeg', 142000, 24, 'Nằm trong bộ “Bí quyết chinh phục điểm cao kì thi THPT Quốc gia Vật lí” do ThS. Võ Thanh Được & ThS.', 'NXB Đại Học Quốc Gia Hà Nội', 'Nhiều Tác Giả', 0),
('GD41701916', 'Giáo Dục An Toàn Giao Thông Lớp 4 (2020)', '1701916990', 'GD41701916@Giáo@1701916990.jpeg', 95000, 24, 'Bộ sách Giáo Dục An Toàn Giao Thông được biên soạn nhằm góp phần nâng cao ý thức, học tập về an toàn', 'Đỗ Thành Trung', 'Đỗ Thành Trung', 0),
('GD51701917', 'Tiếng Anh 4 Family And Friends (National Edition) ', '1701917205', 'GD51701917205@Tiếng@1701917205.jpeg', 99000, 24, 'Sách giáo khoa Tiếng anh lớp 4 Family and Friends Chân trời sáng tạo gồm 12 bài:', 'Cty Phương Nam', 'Trần Cao Bội Ngọc', 0),
('LN11701869', 'Có Hai Con Mèo Ngồi Bên Cửa Sổ (Tái Bản 2023)', '1701869609', 'LN11701869609@Có@1701869609.jpeg', 100000, 22, 'Ó HAI CON MÈO NGỒI BÊN CỬA SỔ là tác phẩm đầu tiên của nhà văn Nguyễn Nhật Ánh viết theo thể loại đồ', 'NXB Trẻ', 'Nguyễn Nhật Ánh', 0),
('LN17017911', 'Neko wa Kyo mo Yuutsu Official Comic Guide Cho Yuk', '1701791181', 'LN1701791181@Neko@1701791181.jpeg', 385000, 22, 'デキる猫は今日も憂鬱 公式コミックガイド 超☆諭吉LOVE - Dekiru Neko wa Kyo mo Yuutsu Official Comic Guide Cho Yukichi Love\r\n', 'Kinokuniya Book Stores', '山田 ヒツジ, 講談社', 0),
('LN17018694', 'Người Bà Tài Giỏi Vùng Saga', '1701869410', 'LN1701869410@Người@1701869410.jpeg', 134000, 22, 'Giá sản phẩm trên Fahasa.com đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm', 'NXB Tổng Hợp TPHCM', 'Yoshichi Shimada', 0),
('LN21701869', 'Dược Sư Tự Sự (Light-novel) - Tập 1', '1701869824', 'LN21701869824@Dược@1701869824.jpeg', 110000, 22, 'Miêu Miêu là một cô gái làm công việc hầu hạ trong cung đình thời phong kiến.\r\n\r\nCâu chuyện của chún', 'Nhà Xuất Bản Kim Đồng', 'Natsu Hyuuga, Touko Shino', 0),
('LN31701869', 'Đường Hầm Tới Mùa Hạ - Lối Thoát Của Biệt Ly ', '1701869956', 'LN31701869956@Đường@1701869956.jpeg', 150000, 22, '“Cậu biết đường hầm Urashima chứ? Nghe bảo bước vào bên trong thì mọi mong ước sẽ biến thành hiện th', 'Thái Hà', 'Mei Hachimoku, Kukka', 0),
('manga11701', 'Hinata Cô Bé Mang Linh Hồn Bà Lão - Tập 1', '1701354636', 'manga11701354636@Hinata@1701354636.jpeg', 34000, 21, 'Hinata Cô bé mang linh hồn bà lão 1 - Khi bà cụ 88 tuổi đầu thai thành một đứa trẻ 6 tuổi!\r\n\r\nVới ph', 'Skybooks', 'Asa Kuwayoshi', 0),
('Manga17018', 'Mùa Hè Hikaru Chết - Tập 2', '1701852442', 'Manga1701852442@Mùa@1701852442.jpeg', 58000, 19, 'Ở một ngôi làng nọ, có hai thiếu niên Yoshiki và Hikaru bằng tuổi, bên nhau từ tấm bé.\r\n\r\nNhưng rồi ', 'IPM', 'Mokumokuren', 0),
('manga21701', 'Kaguya-Sama Cuộc Chiến Tỏ Tình - Tập 18', '1701355579', 'manga21701355579@Kaguya-Sama@1701355579.jpeg', 34000, 21, 'Kaguya-Sama: Cuộc Chiến Tỏ Tình - Tập 18\r\n\r\nHội trưởng Shirogane Miyuki và hội phó Shinomiya Kaguya ', '1980 Books', 'Aka Akasaka', 0),
('Manga31701', 'Spy X Family - Tập 9 - Limited Edition', '1701870167', 'Manga31701870167@Spy@1701870167.jpeg', 125000, 21, 'Trận giao tranh giữa Yor và đám sát thủ đã đi đến hồi kết…!! Cùng lúc đó, bom trên chiếc du thuyền h', 'Nhà Xuất Bản Kim Đồng', 'Tatsuya Endo', 0),
('manga41701', 'Oshi No Ko - Dưới Ánh Hào Quang - Tập 4', '1701852902', 'manga41701852902@Oshi@1701852902.jpeg', 52000, 21, 'Sau khi chương trình hẹn hò thực tế kết thúc, Aqua và Kurokawa Akane chính thức hẹn hò! Quan hệ của ', 'IPM', 'Aka Akasaka, Mengo Yokoyari', 0),
('Manga51701', 'Cậu Ma Nhà Xí Hanako - Tập 15', '1701870798', 'Manga51701@Cậu@1701870798.jpeg', 28000, 21, 'Bạn thân của Nene là Aoi đã bị giam cầm tại cõi âm. Nhưng điều đó lại là tin mừng với Hanako - người', 'AidaIro', 'AidaIro', 0),
('TD17019161', 'Damn Right! - Vén Màn Bí Ẩn Về Tỷ Phú Charlie Mung', '1701916119', 'TD1701916119@Damn@1701916119.jpeg', 299000, 23, 'Damn Right! – Vén màn bí ẩn về tỷ phú Charlie Munger cánh tay phải của Warren Buffett là cuốn sổ tay', 'NXB Thế Giới', 'Janet Lowe', 0),
('TT11701916', 'Thuật Thao Túng - Góc Tối Ẩn Sau Mỗi Câu Nói', '1701916421', 'TT11701916@Thuật@1701916421.jpeg', 70000, 23, 'Bạn có muốn giành phần thắng cuối cùng trong các cuộc tranh luận?\r\n\r\nBạn có muốn dẹp đi bộ mặt kiêu ', 'Wladislaw Jachtchenko', 'Wladislaw Jachtchenko', 0),
('TT21701916', 'Thấu Hiểu Hành Vi Giải Mã Tâm Lý', '1701916500', 'TT21701916500@Thấu@1701916500.jpeg', 145000, 23, 'Việc bị mắc kẹt trong xung đột có thể khiến bạn khó tập trung vào những việc đang làm, cũng như tác ', '1980 Books', 'TS Jennifer Goldman Wetzler', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `User_id` int NOT NULL AUTO_INCREMENT,
  `Name_user` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `NumberPhone` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `Date` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `Password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  PRIMARY KEY (`User_id`,`Email`),
  KEY `User_id` (`User_id`,`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`User_id`, `Name_user`, `NumberPhone`, `Email`, `Date`, `Password`) VALUES
(31, '1', '1234', '1@gmail.com', '2023/11/27', '$2y$10$Q6P0KRHDR2Eam6eHSc/87u.doZvFtg912HRhbL78y4nnWrmSeaYGy'),
(33, 'hung', '1234', 'hung@gmail.com', '2023/11/29', '$2y$10$OZhGyjXct2aphs0xllg9YOFx.FzA4i9uNprHCKDrZoy3vX21KAyXW'),
(34, '2', '567565', '2@gmail.com', '2023/12/05', '$2y$10$RL4Y3TuNzOzRl/XeFV1Cqe8.ctq6JvE6a/Ok6RfSH/dPueA5JFO7C'),
(35, '4', '1234', '4@gmail.com', '2023/12/06', '$2y$10$4FfsO91DSczdAaryh1AVauWnudhRoRqDW1xCpdFBpsZmGKbNp0OBm');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`Order_id`) REFERENCES `order_tbl` (`Order_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD CONSTRAINT `order_tbl_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `category` (`Category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
