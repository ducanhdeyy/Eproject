-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 06, 2022 lúc 03:38 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fanofan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(7, 'Quạt trần'),
(8, 'Quạt bàn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `date_created` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `sub_total` decimal(10,0) NOT NULL,
  `tax` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `content`, `image`, `category_id`) VALUES
(31, 'Quạt trần ROYAL SOLID', '1699', 'Quạt gỗ 5 cánh cao cấp.\r\n                              ', '/uploads/10-2022/1664893438ceiling-fans-1.jpg', 7),
(32, 'Quạt ROYAL Samara LED WH', '1400', 'Thiết kế trần chuyên dụng cho trần thấp                  ', '/uploads/10-2022/1664893474ceiling-fans-2.jpg', 7),
(43, 'Quạt trần Royal Classic AB 3L', '1200', '3 c&aacute;nh gỗ chất lượng cao. Lưỡi dao vaned gỗ\r\n                            ', '/uploads/10-2022/1664893600ceiling-fans-3.jpg', 7),
(44, 'Quạt trần Royal Aura F007', '1899', 'lắp đặt kh&ocirc;ng gian ph&ograve;ng nhỏ, quạt tr&ocirc;ng giống như một chiếc đ&egrave;n trang tr&iacute; cao cấp\r\n\r\n\r\n                            ', '/uploads/10-2022/1664893630ceiling-fans-4.jpg', 7),
(45, 'Quạt trần Royal NAIROBI', '1099', 'Phong c&aacute;ch cổ điển, th&iacute;ch hợp cho ph&ograve;ng kh&aacute;ch, biệt thự, nh&agrave; h&agrave;ng cao cấp\r\n                            ', '/uploads/10-2022/1664893650ceiling-fans-5.jpg', 7),
(46, 'Quạt trần ROYAL IDOL AB', '1569', 'Được thiết kế cho kh&ocirc;ng gian nhỏ, l&yacute; tưởng cho ban c&ocirc;ng, ph&ograve;ng tắm v&agrave; nh&agrave; bếp\r\n                            ', '/uploads/10-2022/1664893671ceiling-fans-6.jpg', 7),
(47, 'Quạt trần ROYAL SOLID', '1699', 'Quạt gỗ 5 cánh cao cấp.\r\n                              ', '/uploads/10-2022/1664893438ceiling-fans-1.jpg', 7),
(48, 'Quạt ROYAL Samara LED WH', '1400', 'Thiết kế trần chuyên dụng cho trần thấp                  ', '/uploads/10-2022/1664893474ceiling-fans-2.jpg', 7),
(49, 'Quạt trần Royal Classic AB 3L', '1200', '3 cánh gỗ chất lượng cao. Lưỡi dao vaned gỗ\r\n                            ', '/uploads/10-2022/1664893600ceiling-fans-3.jpg', 7),
(50, 'Quạt trần Royal Aura F007', '1899', 'lắp đặt không gian phòng nhỏ, quạt trông giống như một chiếc đèn trang trí cao cấp\r\n\r\n\r\n                            ', '/uploads/10-2022/1664893630ceiling-fans-4.jpg', 7),
(51, 'Quạt trần Royal NAIROBI', '1099', 'Phong cách cổ điển, thích hợp cho phòng khách, biệt thự, nhà hàng cao cấp\r\n                            ', '/uploads/10-2022/1664893650ceiling-fans-5.jpg', 7),
(52, 'Quạt trần ROYAL IDOL AB', '1569', 'Được thiết kế cho không gian nhỏ, lý tưởng cho ban công, phòng tắm và nhà bếp\r\n                            ', '/uploads/10-2022/1664893671ceiling-fans-6.jpg', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `author`, `email`, `password`, `phone`) VALUES
(18, 'Nguyen Duc Anh', 'lanhnhubang2k2@gmail.com', '1234', '+84368353135'),
(23, 'Nguyễn Đức Anh', 'lanhnhubang2k3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '336065900');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
