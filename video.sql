-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 06, 2021 lúc 12:04 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `video`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `public_flag` tinyint(4) NOT NULL,
  `delete_flag` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `test`
--

INSERT INTO `test` (`id`, `name`, `public_flag`, `delete_flag`) VALUES
(1, 'test 1', 1, 0),
(2, 'test 2', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `category_id` varchar(150) NOT NULL,
  `link` varchar(500) NOT NULL,
  `thumb` varchar(300) NOT NULL,
  `time` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `comment` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `video`
--

INSERT INTO `video` (`id`, `title`, `category_id`, `link`, `thumb`, `time`, `description`, `type`, `comment`) VALUES
(1, '1 Remove backgroud in 30 sec', 'Photoshop', 'https://www.youtube.com/watch?v=Pus4v-oT7Qw', '1_1633154239.jpg', '09:19', 'Hướng dẫn tách nền', 'Tips', 0),
(2, '2 Remove backgroud in 30 sec', 'Photoshop', 'https://www.youtube.com/watch?v=Pus4v-oT7Qw', '2_1633154282.jpg', '09:19', 'Hãy để lại thông tin, chung tôi sẽ hỗ trợ bạn sớm nhất', 'Tips', 0),
(3, 'Test move img 3', 'After Effects', 'https://www.youtube.com/watch?v=Pus4v-oT7Qw', '3_1633230952.jpg', '100', 'test hướng dẫn', 'Tricks', 1),
(4, 'Test move img 4', 'Premiere Pro', 'https://www.youtube.com/watch?v=Pus4v-oT7Qw', '4_1633154301.jpg', '100', 'test hướng dẫn', 'Tricks', 1),
(5, '5 Test move img ', 'Life-style', 'https://www.youtube.com/watch?v=Pus4v-oT7Qw', '5_1633151367.jpg', '09:19', 'test hướng dẫn', 'Tutorials', 1),
(6, 'test cate_id', '3', 'https://www.youtube.com/watch?v=Pus4v-oT7Qw', '6_1633447748.jpg', '09:19', 'test category_id', 'Tutorials', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `video_categories`
--

CREATE TABLE `video_categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_thumb` varchar(150) NOT NULL,
  `public_flag` int(11) NOT NULL DEFAULT 0,
  `delete_flag` int(11) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `video_categories`
--

INSERT INTO `video_categories` (`id`, `cat_name`, `cat_thumb`, `public_flag`, `delete_flag`, `create_date`, `update_date`) VALUES
(1, 'Photoshop test ngày, hình ko upload', '1_1633447229.jpg', 0, 1, '2021-10-05', '2021-10-06'),
(2, 'Premiere Pro', '2_1633447234.png', 0, 0, '2021-05-10', '0000-00-00'),
(3, 'Life-style', '3_1633513456.jpg', 0, 0, '2021-10-05', '2021-10-06'),
(4, 'Macro photography', '4_1633446819.jpg', 0, 0, '2021-10-05', '0000-00-00'),
(5, 'Affter Effects', '5_1633446861.png', 0, 0, '2021-06-10', '0000-00-00'),
(6, 'TimeLapse', '6_1633505695.jpg', 0, 0, '2021-10-06', '0000-00-00'),
(7, 'Test update ngày create_date', '7_1633506293.jpg', 0, 1, '2021-10-06', '2021-10-06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `video_categories`
--
ALTER TABLE `video_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `video_categories`
--
ALTER TABLE `video_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
