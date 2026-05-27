-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 27, 2026 lúc 04:13 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlykhachsan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'nhom2', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking_change_requests`
--

CREATE TABLE `booking_change_requests` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_type` varchar(30) NOT NULL,
  `new_checkin` date NOT NULL,
  `new_checkout` date NOT NULL,
  `new_total` int(11) NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `admin_note` varchar(255) DEFAULT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking_details`
--

CREATE TABLE `booking_details` (
  `sr_no` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `total_pay` int(11) NOT NULL,
  `room_no` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking_item_charges`
--

CREATE TABLE `booking_item_charges` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_name` varchar(120) NOT NULL,
  `damage_type` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `unit_charge` int(11) NOT NULL DEFAULT 0,
  `total_charge` int(11) NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'unpaid',
  `paid_at` datetime DEFAULT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking_order`
--

CREATE TABLE `booking_order` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `arrival` int(11) NOT NULL DEFAULT 0,
  `refund` int(11) DEFAULT NULL,
  `refund_status` varchar(20) DEFAULT 'pending',
  `refund_note` text DEFAULT NULL,
  `booking_status` varchar(100) NOT NULL DEFAULT 'pending',
  `order_id` varchar(150) NOT NULL,
  `trans_id` varchar(200) DEFAULT NULL,
  `trans_amt` int(11) DEFAULT NULL,
  `trans_status` varchar(100) NOT NULL DEFAULT 'pending',
  `trans_resp_msg` varchar(200) DEFAULT NULL,
  `rate_review` int(11) DEFAULT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) DEFAULT 'unpaid',
  `deposit` decimal(10,2) DEFAULT 0.00,
  `refund_amount` int(11) DEFAULT NULL COMMENT 'Số tiền thực tế được hoàn theo chính sách hủy phòng',
  `deposit_proof` varchar(200) DEFAULT NULL,
  `deposit_proof_status` varchar(20) NOT NULL DEFAULT 'pending' COMMENT 'pending=chờ duyệt,approved=đã duyệt,rejected=từ chối',
  `redeemed_points` int(11) NOT NULL DEFAULT 0 COMMENT 'Số điểm đã dùng để giảm giá cho đơn này',
  `points_discount` int(11) NOT NULL DEFAULT 0 COMMENT 'Số tiền giảm từ điểm (VNĐ)',
  `refund_bank_name` varchar(100) DEFAULT NULL COMMENT 'Tên ngân hàng',
  `refund_bank_account` varchar(50) DEFAULT NULL COMMENT 'Số tài khoản',
  `refund_qr_image` varchar(200) DEFAULT NULL COMMENT 'Ảnh QR chuyển khoản',
  `cancelled_at` datetime DEFAULT NULL COMMENT 'Thời điểm khách hủy đặt phòng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carousel`
--

CREATE TABLE `carousel` (
  `sr_no` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `carousel`
--

INSERT INTO `carousel` (`sr_no`, `image`) VALUES
(4, '1.png'),
(5, '2.png'),
(6, '3.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `sender` enum('guest','staff') NOT NULL,
  `sender_name` varchar(150) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `session_id`, `sender`, `sender_name`, `message`, `created_at`) VALUES
(1, 1, 'staff', 'Hệ thống', '✅ Nhân viên **Lễ Tân** đã tham gia hỗ trợ bạn.', '2026-05-26 13:07:26'),
(2, 1, 'staff', 'Lễ Tân', 'gì cu', '2026-05-26 13:07:37'),
(3, 1, 'guest', 'Kiệt', 'cặc', '2026-05-26 13:08:53'),
(4, 1, 'staff', 'Hệ thống', '👋 Nhân viên đã kết thúc hỗ trợ. Cảm ơn bạn! Trợ lý ảo sẽ tiếp tục hỗ trợ bạn.', '2026-05-26 13:15:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chat_sessions`
--

CREATE TABLE `chat_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `status` enum('waiting','active','closed') NOT NULL DEFAULT 'waiting',
  `bot_history` mediumtext DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chat_sessions`
--

INSERT INTO `chat_sessions` (`id`, `user_id`, `staff_id`, `status`, `bot_history`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 'closed', '[]', '2026-05-26 13:07:19', '2026-05-26 13:15:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cleaning_tasks`
--

CREATE TABLE `cleaning_tasks` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `room_no` varchar(50) NOT NULL,
  `room_name` varchar(150) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `status` enum('pending','in_progress','done') NOT NULL DEFAULT 'pending',
  `note` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `done_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cleaning_tasks`
--

INSERT INTO `cleaning_tasks` (`id`, `booking_id`, `room_no`, `room_name`, `assigned_to`, `status`, `note`, `created_at`, `done_at`) VALUES
(1, NULL, '101', 'Phòng Đơn Tiêu Chuẩn', NULL, 'done', NULL, '2026-05-24 11:40:29', '2026-05-24 11:40:51'),
(2, NULL, '102', 'Phòng Đơn Tiêu Chuẩn', NULL, 'done', NULL, '2026-05-24 11:40:29', '2026-05-24 11:40:52'),
(3, 2, '601', 'Phòng Gia Đình Bốn Người', NULL, 'done', NULL, '2026-05-24 14:30:40', '2026-05-24 16:59:14'),
(4, 1, '601', 'Phòng Gia Đình Bốn Người', NULL, 'done', NULL, '2026-05-24 14:30:41', '2026-05-24 16:59:14'),
(5, 4, '101', 'Phòng Đơn Tiêu Chuẩn', NULL, 'done', NULL, '2026-05-24 14:37:42', '2026-05-24 16:59:14'),
(6, 5, '102', 'Phòng Đơn Tiêu Chuẩn', NULL, 'done', NULL, '2026-05-24 14:44:55', '2026-05-24 16:59:14'),
(7, 6, '103', 'Phòng Đơn Tiêu Chuẩn', NULL, 'done', NULL, '2026-05-24 15:37:19', '2026-05-24 16:59:14'),
(8, 7, '104', 'Phòng Đơn Tiêu Chuẩn', NULL, 'done', NULL, '2026-05-24 16:13:08', '2026-05-24 16:59:14'),
(9, 8, '101', 'Phòng Đơn Tiêu Chuẩn', NULL, 'done', NULL, '2026-05-24 16:47:00', '2026-05-24 16:59:14'),
(10, 9, '101', 'Phòng Đơn Tiêu Chuẩn', NULL, 'done', NULL, '2026-05-24 16:51:07', '2026-05-24 16:59:14'),
(11, 10, '101', 'Phòng Đơn Tiêu Chuẩn', NULL, 'done', NULL, '2026-05-24 16:58:33', '2026-05-24 16:59:14'),
(12, 11, '101', 'Phòng Đơn Tiêu Chuẩn', NULL, 'done', NULL, '2026-05-24 17:03:17', '2026-05-24 17:03:17'),
(13, 13, '102', 'Phòng Đơn Tiêu Chuẩn', NULL, 'done', NULL, '2026-05-26 13:16:42', '2026-05-26 22:57:27'),
(14, 26, '104', 'Phòng Đơn Tiêu Chuẩn', NULL, 'pending', NULL, '2026-05-27 17:56:54', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gmap` varchar(100) NOT NULL,
  `pn1` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `iframe` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `pn1`, `email`, `fb`, `insta`, `tw`, `iframe`) VALUES
(1, '170 An Dương Vương, Quy Nhơn Nam, Gia Lai, VietNam', 'https://maps.app.goo.gl/YYtg24sRkjB3TLNY9', 84569646163, 'dawnchillhotel@gmail.com', 'https://www.facebook.com/share/1CUMs8rA7Q/', 'https://www.instagram.com/dawnchillhotel?igsh=N2xrbHZsbmF2cDFv', '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4808.840428054417!2d109.21528237589514!3d13.758964897125978!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x316f6cebf252c49f%3A0xa83caa291737172f!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBRdXkgTmjGoW4!5e1!3m2!1svi!2s!4v1778394418219!5m2!1svi!2s');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `facilities`
--

INSERT INTO `facilities` (`id`, `icon`, `name`, `description`) VALUES
(13, 'IMG_43553.svg', 'Wi-Fi Tốc Độ Cao', 'Hệ thống Wi-Fi cáp quang tốc độ lên đến 500 Mbps, phủ sóng 100% toàn bộ khách sạn từ sảnh đến phòng nghỉ, đảm bảo kết nối ổn định cho cả công việc lẫn giải trí trực tuyến.'),
(14, 'IMG_49949.svg', 'Điều Hòa Trung Tâm', 'Hệ thống điều hòa không khí inverter tiết kiệm điện, điều chỉnh nhiệt độ thông minh theo từng phòng. Lọc không khí 4 lớp, khử khuẩn và loại bỏ bụi mịn, mang lại bầu không khí trong lành và dễ chịu suốt 24 giờ.'),
(15, 'IMG_41622.svg', 'Smart TV 4K', 'TV màn hình phẳng 4K từ 55 đến 75 inch tùy loại phòng, tích hợp hệ thống giải trí thông minh với hơn 100 kênh trong nước và quốc tế, Netflix, YouTube và Apple TV. Kết nối HDMI và USB để trình chiếu nội dung cá nhân.'),
(17, 'IMG_47816.svg', 'Spa & Chăm Sóc Sức Khỏe', 'Trung tâm spa 5 sao với đội ngũ chuyên viên được đào tạo bài bản, cung cấp hơn 20 liệu trình thư giãn từ massage đá nóng, chăm sóc da mặt đến liệu pháp thảo dược truyền thống Việt Nam. Mở cửa từ 9:00 đến 22:00 hàng ngày.'),
(18, 'IMG_96423.svg', 'Máy Sưởi & Sưởi Nền', 'Hệ thống sưởi ấm hai lớp gồm điều hòa sưởi và sưởi nền, giữ không gian phòng ấm áp đều khắp ngay cả trong những ngày đông lạnh nhất. Điều chỉnh nhiệt độ từ 18-30°C theo ý muốn.'),
(19, 'IMG_27079.svg', 'Vòi Sen Áp Lực Cao', 'Hệ thống nước nóng trung tâm 24/7, vòi sen rainfall và vòi sen tay áp lực cao tạo cảm giác thư giãn tuyệt vời. Nhiệt độ ổn định tức thì, không chờ đợi. Các phòng cao cấp còn có bồn ngâm riêng biệt.'),
(20, 'IMG_11001.svg', 'Hồ Bơi', 'Hồ bơi ngoài trời rộng rãi với làn bơi tiêu chuẩn, khu vực nghỉ ngơi và ghế tắm nắng, mang đến không gian thư giãn lý tưởng cho mọi lứa tuổi.'),
(21, 'IMG_11002.svg', 'Phòng Xông Hơi', 'Phòng xông hơi đa dạng gồm khu xông hơi tập thể sôi động và phòng xông hơi riêng biệt dành cho những ai yêu thích sự yên tĩnh và riêng tư tuyệt đối.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `features`
--

INSERT INTO `features` (`id`, `name`) VALUES
(13, 'Phòng Ngủ'),
(14, 'Ban Công'),
(15, 'Nhà Bếp'),
(17, 'Ghế Sofa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food_items`
--

CREATE TABLE `food_items` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `category` varchar(80) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `datentime` datetime NOT NULL DEFAULT current_timestamp(),
  `order_count` int(11) NOT NULL DEFAULT 0,
  `like_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `food_items`
--

INSERT INTO `food_items` (`id`, `name`, `description`, `price`, `category`, `image`, `status`, `datentime`, `order_count`, `like_count`) VALUES
(1, 'Phở bò', 'Phở bò truyền thống với nước dùng đậm đà', 65000, 'Món chính', 'IMG_53465.jpg', 1, '2026-05-21 09:42:05', 101, 0),
(2, 'Cơm gà xối mỡ', 'Cơm trắng với gà xối mỡ giòn thơm', 75000, 'Món chính', 'IMG_36454.jpg', 1, '2026-05-21 09:42:05', 80, 0),
(3, 'Bánh mì trứng', 'Bánh mì nóng giòn kèm trứng ốp la', 35000, 'Ăn sáng', 'IMG_30819.jpg', 1, '2026-05-21 09:42:05', 60, 0),
(5, 'Sinh tố bơ', 'Sinh tố bơ béo ngậy pha sữa đặc', 45000, 'Đồ uống', 'IMG_90853.jpg', 1, '2026-05-21 09:42:05', 0, 0),
(6, 'Cà phê sữa đá', 'Cà phê phin truyền thống với sữa đặc', 30000, 'Đồ uống', 'IMG_35971.jpg', 1, '2026-05-21 09:42:05', 0, 0),
(7, 'Lẩu thái hải sản', 'Lẩu thái chua cay với hải sản tươi', 220000, 'Đặc biệt', 'IMG_41708.png', 1, '2026-05-21 09:42:05', 0, 0),
(8, 'Chè ba màu', 'Chè ba màu thạch mát lạnh', 30000, 'Tráng miệng', 'IMG_70916.jpg', 1, '2026-05-21 09:42:05', 0, 0),
(9, 'Súp gà nấm bắp non', 'Ức gà luộc chín, xé sợi nấu cùng với bắp non, nấm hương.', 70000, 'Ăn sáng', 'IMG_73629.jpg', 1, '2026-05-23 09:06:59', 0, 0),
(10, 'Gỏi cuốn tôm thịt', 'Một cuốn gỏi cuốn sẽ gồm xà lách, giá, hẹ, rau thơm, dưa leo, thịt ba chỉ và tôm.', 25000, 'Ăn sáng', 'IMG_62157.jpg', 1, '2026-05-23 09:10:22', 2, 0),
(11, 'Nước ép trái cây', 'Vui lòng note loại trái cây tại phần ghi chú', 40000, 'Đồ uống', 'IMG_46391.jpg', 1, '2026-05-23 09:14:03', 0, 0),
(12, 'Lẩu gà lá é', 'Thịt gà ta chắc ngọt, nước dùng cay nồng ớt và mùi thơm độc đáo của lá é.', 200000, 'Đặc biệt', 'IMG_42023.jpg', 1, '2026-05-23 09:18:04', 0, 0),
(13, 'Salad', 'Vị tươi mát của rau củ quả', 55000, 'Khai vị', 'IMG_59093.jpg', 1, '2026-05-23 09:23:34', 0, 0),
(14, 'Bánh mì bò kho', 'Thịt gân bò sần sật, nước sốt đậm đà, dậy mùi thảo mộc', 55000, 'Ăn sáng', 'IMG_21307.jpg', 1, '2026-05-23 09:26:35', 0, 0),
(15, 'Bánh mì', '', 5000, 'Đồ ăn thêm', 'IMG_82773.jpg', 1, '2026-05-23 09:33:21', 5, 0),
(17, 'Mì xào giòn', 'Vắt mì trứng được chiên phồng giòn rụm, phủ sốt cùng thịt, hải sản, rau củ.', 90000, 'Món chính', 'IMG_15961.jpg', 1, '2026-05-23 09:44:37', 0, 0),
(18, 'Gà nướng kiểu Lào', 'Thịt gà được kẹp tre nướng than hoa thơm phức, da giòn rụm bên ngoài, bên trong ẩm mềm và đậm đà', 250000, 'Món chính', 'IMG_58128.jpg', 1, '2026-05-23 10:44:57', 0, 0),
(19, 'Sald Thịt Băm (Larb)', 'Thịt băm (heo, gà hoặc bò) trộn đều với nước cốt chanh, ớt bột, rất nhiều rau thơm và không thể thiếu thính gạo rang vàng rụm, thơm phức.', 215000, 'Món chính', 'IMG_53255.jpg', 1, '2026-05-23 10:47:23', 0, 0),
(20, 'Nộm Đu Đủ (Tam Mak Hoong)', 'Đu đủ bào sợi giòn sần sật giã dập cùng ớt cay xé lưỡi, chanh chua gắt, cà chua và nước mắm pạ đéc.', 85000, 'Khai vị', 'IMG_86726.jpg', 1, '2026-05-23 10:50:32', 0, 0),
(21, 'Xôi Nếp Lào', 'Hạt nếp dẻo ráo, thơm nức mùi đồng nội, được đồ chín trong chõ tre (thip khao)', 80000, 'Món chính', 'IMG_91908.jpg', 1, '2026-05-23 10:52:24', 0, 0),
(22, 'Khao soi', 'Nước dùng cà ri cốt dừa béo ngậy, cay nhẹ, ăn kèm thịt gà hoặc bò mềm tan và sự kết hợp độc đáo giữa sợi mì trứng mềm phía dưới cùng mì chiên giòn rụm bên trên.', 150000, 'Món chính', 'IMG_69195.jpg', 1, '2026-05-23 10:55:43', 0, 0),
(23, 'Trái cây', 'Các loại hoa quả chín mọng được cắt tỉa gọn gàng, vừa cung cấp vitamin thanh nhiệt.', 65000, 'Tráng miệng', 'IMG_47834.jpg', 1, '2026-05-23 10:58:23', 0, 0),
(24, 'Flan', 'Lớp bánh hấp mịn màng, béo ngậy từ trứng sữa, quyện cùng nước sốt caramen vị đắng nhẹ.', 15000, 'Tráng miệng', 'IMG_90244.jpg', 1, '2026-05-23 11:00:39', 1, 0),
(25, 'Panna Cotta', 'Kết cấu mềm mịn, dẻo nhẹ như thạch và tan ngay trong miệng, mang vị béo ngậy của kem sữa hòa quyện cùng các loại sốt trái cây chua ngọt kích thích vị giác.', 20000, 'Tráng miệng', 'IMG_80088.png', 1, '2026-05-23 11:02:53', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food_likes`
--

CREATE TABLE `food_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food_orders`
--

CREATE TABLE `food_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `room_no` varchar(50) DEFAULT NULL,
  `items_json` text NOT NULL,
  `total_amount` int(11) NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'pending',
  `datentime` datetime NOT NULL DEFAULT current_timestamp(),
  `order_code` varchar(60) DEFAULT NULL COMMENT 'Mã đơn đồ ăn FOODORD_...',
  `payment_method` varchar(20) NOT NULL DEFAULT 'pending' COMMENT 'qr|cod|checkout',
  `payment_status` varchar(20) NOT NULL DEFAULT 'unpaid' COMMENT 'unpaid|paid',
  `assigned_to` int(11) DEFAULT NULL COMMENT 'staff.id nhận đơn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hotel_items`
--

CREATE TABLE `hotel_items` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `category` varchar(80) DEFAULT NULL,
  `default_charge` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hotel_items`
--

INSERT INTO `hotel_items` (`id`, `name`, `category`, `default_charge`, `status`, `datentime`) VALUES
(1, 'Khăn tắm', 'Bathroom', 200000, 1, '2026-05-20 08:45:42'),
(2, 'Remote TV', 'Electronics', 500000, 1, '2026-05-20 08:45:42'),
(3, 'Ly thủy tinh', 'Dining', 100000, 1, '2026-05-20 08:45:42'),
(4, 'Ga giường', 'Bedroom', 300000, 1, '2026-05-20 08:45:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loyalty_transactions`
--

CREATE TABLE `loyalty_transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `type` enum('earn','redeem','adjust') NOT NULL DEFAULT 'earn' COMMENT 'earn=tích, redeem=dùng, adjust=admin điều chỉnh',
  `points` int(11) NOT NULL COMMENT 'Số điểm (dương=cộng, âm=trừ)',
  `note` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loyalty_transactions`
--

INSERT INTO `loyalty_transactions` (`id`, `user_id`, `booking_id`, `type`, `points`, `note`, `created_at`) VALUES
(1, 6, NULL, '', 2000, 'Admin điều chỉnh', '2026-05-26 12:12:33'),
(2, 6, 13, '', -183, 'Dùng điểm giảm 183.000đ cho đơn #ORD_67112255', '2026-05-26 12:15:25'),
(3, 6, 14, '', -49, 'Dùng điểm giảm 49.000đ cho đơn #ORD26052026551', '2026-05-26 12:39:29'),
(4, 6, 16, '', -165, 'Dùng điểm giảm 165.000đ cho đơn #ORD_26052026952', '2026-05-26 13:30:45'),
(5, 6, 17, '', -446, 'Dùng điểm giảm 446.000đ cho đơn #ORD_26052026887', '2026-05-26 19:23:40'),
(6, 6, 18, '', -444, 'Dùng điểm giảm 444.000đ cho đơn #ORD_26052026354', '2026-05-26 19:35:14'),
(7, 6, 19, '', -430, 'Dùng điểm giảm 430.000đ cho đơn #ORD_26052026117', '2026-05-26 19:35:37'),
(8, 6, NULL, '', 2147483647, 'Admin điều chỉnh', '2026-05-26 19:47:14'),
(9, 6, 20, '', -433, 'Dùng điểm giảm 433.000đ cho đơn #ORD_26052026303', '2026-05-26 19:47:28'),
(10, 6, 21, '', -422, 'Dùng điểm giảm 422.000đ cho đơn #ORD_26052026584', '2026-05-26 22:51:30'),
(11, 6, 22, '', -1374, 'Dùng điểm giảm 1.374.000đ cho đơn #ORD_26052026635', '2026-05-26 23:00:35'),
(12, 6, 23, '', -417, 'Dùng điểm giảm 417.000đ cho đơn #ORD_27052026284', '2026-05-27 12:18:12'),
(13, 6, 24, '', -430, 'Dùng điểm giảm 430.000đ cho đơn #ORD_27052026321', '2026-05-27 12:21:14'),
(14, 6, 25, '', -442, 'Dùng điểm giảm 442.000đ cho đơn #ORD_27052026362', '2026-05-27 12:32:50'),
(15, 6, 26, '', -430, 'Dùng điểm giảm 430.000đ cho đơn #ORD_27052026227', '2026-05-27 12:33:50'),
(16, 6, 29, '', -435, 'Dùng điểm giảm 435.000đ cho đơn #ORD_27052026124', '2026-05-27 17:16:01'),
(17, 6, 30, '', -729, 'Dùng điểm giảm 729.000đ cho đơn #ORD_27052026365', '2026-05-27 17:23:04'),
(18, 6, 31, '', -435, 'Dùng điểm giảm 435.000đ cho đơn #ORD_27052026596', '2026-05-27 17:54:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `otp_codes`
--

CREATE TABLE `otp_codes` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `type` enum('register','forgot') NOT NULL DEFAULT 'register',
  `used` tinyint(1) NOT NULL DEFAULT 0,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating_review`
--

CREATE TABLE `rating_review` (
  `sr_no` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(200) NOT NULL,
  `seen` int(11) NOT NULL DEFAULT 0,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receptionist_cred`
--

CREATE TABLE `receptionist_cred` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `full_name` varchar(150) NOT NULL DEFAULT 'Lễ tân',
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `receptionist_cred`
--

INSERT INTO `receptionist_cred` (`id`, `username`, `password`, `full_name`, `status`) VALUES
(1, 'leetaan', '123456', 'Nhân viên Lễ Tân', 1),
(2, 'leetaan', '123456', 'Nhân viên Lễ Tân', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `floor` int(11) DEFAULT NULL,
  `description` varchar(350) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `adult`, `children`, `floor`, `description`, `status`, `removed`) VALUES
(1, 'Phòng Đơn Tiêu Chuẩn', 20, 450000, 10, 1, 0, 1, 'Phòng đơn ấm cúng với giường đơn nệm cao cấp, thích hợp cho khách du lịch một mình. Phòng trang bị đầy đủ điều hòa, TV màn hình phẳng, tủ quần áo và bàn làm việc nhỏ gọn. Phòng tắm riêng biệt với vòi sen áp lực cao và bộ đồ vệ sinh miễn phí hàng ngày.', 1, 0),
(2, 'Phòng Đôi Tiêu Chuẩn', 30, 750000, 10, 2, 1, 2, 'Phòng đôi rộng rãi với 2 giường đơn hoặc 1 giường đôi theo yêu cầu, phù hợp cho cặp đôi hoặc bạn bè đi cùng. Nội thất hiện đại, không gian được thiết kế tối ưu ánh sáng tự nhiên. Trang bị minibar, két an toàn và hệ thống cách âm tốt.', 1, 0),
(3, 'Phòng Đôi View Thành Phố', 32, 950000, 10, 2, 1, 3, 'Phòng đôi cao cấp hướng ra toàn cảnh trung tâm thành phố Quy Nhơn lung linh về đêm. Cửa sổ kính lớn từ sàn đến trần, ban công nhỏ với bộ bàn ghế ngoài trời. Thưởng thức bình minh và hoàng hôn tuyệt đẹp ngay tại phòng mà không cần rời khỏi giường.', 1, 0),
(4, 'Phòng Đôi View Biển', 35, 1200000, 10, 2, 1, 4, 'Phòng đôi lãng mạn với tầm nhìn trực diện ra biển Quy Nhơn xanh biếc. Ban công rộng trang bị ghế tắm nắng và bàn trà, lý tưởng cho các cặp đôi muốn tận hưởng tiếng sóng biển. Nội thất tông màu kem và xanh biển hài hòa với khung cảnh thiên nhiên.', 1, 0),
(5, 'Phòng Ba Người', 42, 1400000, 10, 3, 1, 5, 'Phòng thiết kế linh hoạt gồm 1 giường đôi và 1 giường đơn, phù hợp cho nhóm 3 người bạn hoặc gia đình nhỏ. Không gian sinh hoạt chung thoáng đãng với khu vực ngồi riêng, tủ quần áo rộng và 2 phòng tắm độc lập tiết kiệm thời gian vào buổi sáng.', 1, 0),
(6, 'Phòng Gia Đình Bốn Người', 52, 1700000, 10, 4, 2, 6, 'Phòng gia đình rộng rãi với 2 giường đôi bố trí thoáng đãng, lý tưởng cho gia đình 4 người. Khu vực phòng khách nhỏ với sofa và bàn cà phê, TV 55 inch màn hình phẳng. Tiện nghi đầy đủ: minibar, bàn ăn nhỏ, tủ đồ lớn và két an toàn trong phòng.', 1, 0),
(7, 'Phòng Gia Đình Deluxe', 58, 2100000, 10, 4, 2, 7, 'Phòng gia đình hạng sang với nội thất cao cấp, bố cục không gian thông minh giúp mọi thành viên đều có góc riêng tư. Sofa bed có thể kéo dài thêm chỗ ngủ, ban công rộng với ghế thư giãn. Phòng tắm sang trọng với bồn tắm freestanding và vòi sen hoa sen.', 1, 0),
(8, 'Phòng Nhóm Sáu Người', 78, 2800000, 5, 6, 3, 8, 'Phòng suite lớn dành cho nhóm bạn hoặc gia đình đông thành viên. Gồm 3 giường đôi chất lượng cao, khu vực phòng khách riêng biệt với TV và hệ thống âm thanh. Bếp nhỏ tiện lợi với tủ lạnh, lò vi sóng và dụng cụ pha cà phê, phù hợp cho kỳ nghỉ dài ngày.', 1, 0),
(9, 'Phòng Đôi Superior', 38, 1800000, 5, 2, 1, 8, 'Phòng đôi superior với thiết kế sang trọng tông màu trung tính ấm áp. Giường king-size nệm Simmons cao cấp, chăn ga gối đệm 5 sao thay mới hàng ngày. Bàn làm việc rộng với đèn chiếu sáng chuyên dụng, TV 4K 65 inch. Phòng tắm marble với vòi sen rainfall và bồn ngâm.', 1, 0),
(10, 'Phòng Thương Gia', 65, 3500000, 5, 2, 1, 9, 'Phòng dành riêng cho khách công tác, trang bị đầy đủ thiết bị văn phòng hiện đại: màn hình rộng, bàn làm việc ergonomic, ghế văn phòng cao cấp và tủ hồ sơ riêng tư. Giường king-size êm ái giúp nghỉ ngơi sâu giấc. Phòng khách nhỏ để tiếp khách riêng tư. Dịch vụ báo thức và ủi quần áo miễn phí.', 1, 0),
(11, 'Phòng Thương Gia Cao Cấp', 85, 5500000, 5, 3, 1, 9, 'Phòng thương gia hạng sang với diện tích rộng rãi, thiết kế tối giản tinh tế theo phong cách Nhật Bản hiện đại. Phòng ngủ và phòng khách tách biệt hoàn toàn. Bếp nhỏ đầy đủ tiện nghi, ban công view thành phố panorama. Quyền sử dụng phòng chờ VIP tầng cao với cocktail và snack miễn phí.', 1, 0),
(12, 'Phòng Tổng Thống', 155, 15000000, 4, 6, 3, 10, 'Trải nghiệm đẳng cấp 5 sao với phòng tổng thống xa hoa bậc nhất. Phòng ngủ chính với giường king-size premium, 2 phòng ngủ phụ, phòng khách rộng, phòng ăn và bếp đầy đủ tiện nghi. Bể ngâm jacuzzi ngoài trời trên ban công view biển tuyệt đẹp. Dịch vụ butler 24/7, đưa đón sân bay và quyền truy cập spa không giới hạn.', 1, 0),
(13, 'Penthouse Presidential Suite', 320, 45000000, 1, 10, 5, 10, 'Đỉnh cao sang trọng — Penthouse toàn bộ tầng thượng với view 360 độ nhìn bao quát toàn thành phố và biển Quy Nhơn. 4 phòng ngủ suite, phòng khách grand rộng 80m², nhà bếp bếp chef đầy đủ, phòng chiếu phim riêng và hồ bơi infinity ngoài trời. Butler riêng, xe limousine đưa đón, quyền truy cập không giới hạn toàn bộ dịch vụ khách sạn trong suốt thời ', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_facilities`
--

CREATE TABLE `room_facilities` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `room_facilities`
--

INSERT INTO `room_facilities` (`sr_no`, `room_id`, `facilities_id`) VALUES
(1, 1, 13),
(2, 1, 14),
(3, 1, 15),
(4, 1, 19),
(5, 2, 13),
(6, 2, 14),
(7, 2, 15),
(8, 2, 19),
(9, 3, 13),
(10, 3, 14),
(11, 3, 15),
(12, 3, 19),
(13, 3, 18),
(14, 4, 13),
(15, 4, 14),
(16, 4, 15),
(17, 4, 19),
(18, 4, 18),
(19, 4, 20),
(20, 5, 13),
(21, 5, 14),
(22, 5, 15),
(23, 5, 19),
(24, 5, 18),
(25, 6, 13),
(26, 6, 14),
(27, 6, 15),
(28, 6, 19),
(29, 6, 18),
(30, 6, 20),
(31, 7, 13),
(32, 7, 14),
(33, 7, 15),
(34, 7, 19),
(35, 7, 18),
(36, 7, 20),
(37, 7, 21),
(38, 8, 13),
(39, 8, 14),
(40, 8, 15),
(41, 8, 19),
(42, 8, 18),
(43, 8, 20),
(44, 8, 21),
(45, 9, 13),
(46, 9, 14),
(47, 9, 15),
(48, 9, 19),
(49, 9, 18),
(50, 9, 17),
(51, 9, 20),
(52, 10, 13),
(53, 10, 14),
(54, 10, 15),
(55, 10, 19),
(56, 10, 18),
(57, 10, 17),
(58, 10, 20),
(59, 10, 21),
(60, 11, 13),
(61, 11, 14),
(62, 11, 15),
(63, 11, 17),
(64, 11, 18),
(65, 11, 19),
(66, 11, 20),
(67, 11, 21),
(68, 12, 13),
(69, 12, 14),
(70, 12, 15),
(71, 12, 17),
(72, 12, 18),
(73, 12, 19),
(74, 12, 20),
(75, 12, 21),
(76, 13, 13),
(77, 13, 14),
(78, 13, 15),
(79, 13, 17),
(80, 13, 18),
(81, 13, 19),
(82, 13, 20),
(83, 13, 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_features`
--

CREATE TABLE `room_features` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `room_features`
--

INSERT INTO `room_features` (`sr_no`, `room_id`, `features_id`) VALUES
(1, 1, 13),
(2, 2, 13),
(3, 2, 17),
(4, 3, 13),
(5, 3, 14),
(6, 3, 17),
(7, 4, 13),
(8, 4, 14),
(9, 4, 17),
(10, 5, 13),
(11, 5, 14),
(12, 5, 17),
(13, 6, 13),
(14, 6, 14),
(15, 6, 17),
(16, 7, 13),
(17, 7, 14),
(18, 7, 17),
(19, 8, 13),
(20, 8, 15),
(21, 8, 17),
(22, 9, 13),
(23, 9, 14),
(24, 9, 17),
(25, 10, 13),
(26, 10, 14),
(27, 10, 17),
(28, 11, 13),
(29, 11, 14),
(30, 11, 15),
(31, 11, 17),
(32, 12, 13),
(33, 12, 14),
(34, 12, 15),
(35, 12, 17),
(36, 13, 13),
(37, 13, 14),
(38, 13, 15),
(39, 13, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_images`
--

CREATE TABLE `room_images` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `room_images`
--

INSERT INTO `room_images` (`sr_no`, `room_id`, `image`, `thumb`) VALUES
(1, 8, 'IMG_89509.jpg', 0),
(2, 8, 'IMG_17206.jpg', 1),
(3, 6, 'IMG_79043.png', 0),
(4, 6, 'IMG_36187.png', 0),
(5, 6, 'IMG_47410.png', 1),
(6, 6, 'IMG_94291.png', 0),
(7, 3, 'IMG_73169.jpg', 0),
(8, 3, 'IMG_22763.webp', 1),
(9, 9, 'IMG_82319.webp', 0),
(10, 9, 'IMG_14449.webp', 1),
(11, 11, 'IMG_38515.png', 0),
(12, 11, 'IMG_38432.png', 0),
(13, 11, 'IMG_48692.png', 0),
(14, 11, 'IMG_57240.png', 0),
(15, 11, 'IMG_82915.png', 1),
(16, 10, 'IMG_54615.png', 0),
(17, 10, 'IMG_26648.png', 1),
(18, 10, 'IMG_27496.png', 0),
(19, 10, 'IMG_21461.png', 0),
(20, 4, 'IMG_26496.png', 0),
(21, 4, 'IMG_42701.png', 0),
(22, 4, 'IMG_63215.png', 1),
(23, 4, 'IMG_86631.png', 0),
(27, 5, 'IMG_72823.jpg', 1),
(28, 5, 'IMG_86200.jpg', 0),
(29, 5, 'IMG_32899.jpg', 0),
(30, 5, 'IMG_11559.jpg', 0),
(31, 5, 'IMG_55642.jpg', 0),
(32, 5, 'IMG_48204.jpg', 0),
(33, 12, 'IMG_91275.png', 0),
(34, 12, 'IMG_31530.png', 1),
(35, 12, 'IMG_27641.jpg', 0),
(36, 12, 'IMG_21047.jpg', 0),
(37, 12, 'IMG_64342.jpg', 0),
(38, 12, 'IMG_28488.jpg', 0),
(98, 1, 'IMG_26876.jpg', 0),
(99, 1, 'IMG_11646.jpg', 1),
(100, 1, 'IMG_86922.jpg', 0),
(101, 2, 'IMG_95641.png', 0),
(102, 2, 'IMG_55489.png', 1),
(103, 7, 'IMG_70514.jpg', 1),
(104, 7, 'IMG_97580.jpg', 0),
(105, 7, 'IMG_99566.jpg', 0),
(106, 7, 'IMG_48980.jpg', 0),
(108, 13, 'IMG_92496.png', 0),
(109, 13, 'IMG_66242.png', 0),
(110, 13, 'IMG_54827.png', 0),
(111, 13, 'IMG_18674.jpeg', 0),
(112, 13, 'IMG_85724.png', 1),
(113, 13, 'IMG_29665.png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_items`
--

CREATE TABLE `room_items` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_numbers`
--

CREATE TABLE `room_numbers` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_no` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=available,2=cleaning,0=maintenance'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `room_numbers`
--

INSERT INTO `room_numbers` (`id`, `room_id`, `room_no`, `status`) VALUES
(1, 1, '101', 1),
(2, 1, '102', 0),
(3, 1, '103', 0),
(4, 1, '104', 2),
(5, 1, '105', 1),
(6, 1, '106', 0),
(7, 1, '107', 0),
(8, 1, '108', 1),
(9, 1, '109', 0),
(10, 1, '110', 1),
(11, 2, '201', 1),
(12, 2, '202', 0),
(13, 2, '203', 1),
(14, 2, '204', 1),
(15, 2, '205', 1),
(16, 2, '206', 1),
(17, 2, '207', 1),
(18, 2, '208', 1),
(19, 2, '209', 1),
(20, 2, '210', 1),
(21, 3, '301', 1),
(22, 3, '302', 1),
(23, 3, '303', 1),
(24, 3, '304', 1),
(25, 3, '305', 1),
(26, 3, '306', 1),
(27, 3, '307', 1),
(28, 3, '308', 1),
(29, 3, '309', 1),
(30, 3, '310', 1),
(31, 4, '401', 1),
(32, 4, '402', 1),
(33, 4, '403', 1),
(34, 4, '404', 1),
(35, 4, '405', 1),
(36, 4, '406', 1),
(37, 4, '407', 1),
(38, 4, '408', 1),
(39, 4, '409', 1),
(40, 4, '410', 1),
(41, 5, '501', 1),
(42, 5, '502', 1),
(43, 5, '503', 1),
(44, 5, '504', 1),
(45, 5, '505', 1),
(46, 5, '506', 1),
(47, 5, '507', 1),
(48, 5, '508', 1),
(49, 5, '509', 1),
(50, 5, '510', 1),
(51, 6, '601', 2),
(52, 6, '602', 1),
(53, 6, '603', 1),
(54, 6, '604', 1),
(55, 6, '605', 1),
(56, 6, '606', 1),
(57, 6, '607', 1),
(58, 6, '608', 1),
(59, 6, '609', 1),
(60, 6, '610', 1),
(61, 7, '701', 1),
(62, 7, '702', 1),
(63, 7, '703', 1),
(64, 7, '704', 1),
(65, 7, '705', 1),
(66, 7, '706', 1),
(67, 7, '707', 1),
(68, 7, '708', 1),
(69, 7, '709', 1),
(70, 7, '710', 1),
(71, 8, '801', 1),
(72, 8, '802', 1),
(73, 8, '803', 1),
(74, 8, '804', 1),
(75, 8, '805', 1),
(76, 9, '806', 1),
(77, 9, '807', 1),
(78, 9, '808', 1),
(79, 9, '809', 1),
(80, 9, '810', 1),
(81, 10, '901', 1),
(82, 10, '902', 1),
(83, 10, '903', 1),
(84, 10, '904', 1),
(85, 10, '905', 1),
(86, 11, '906', 1),
(87, 11, '907', 1),
(88, 11, '908', 1),
(89, 11, '909', 1),
(90, 11, '910', 1),
(91, 12, '1001', 1),
(92, 12, '1002', 1),
(93, 12, '1003', 1),
(94, 12, '1004', 1),
(95, 13, '1005', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `site_about` varchar(250) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `shutdown` tinyint(1) NOT NULL,
  `deposit_rate` decimal(5,2) NOT NULL DEFAULT 20.00 COMMENT 'Tỷ lệ đặt cọc (%), mặc định 20%'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`, `deposit_rate`) VALUES
(1, 'DawnChill', 'DawnChill Hotel — Khách sạn 5 sao tọa lạc tại trung tâm thành phố Quy Nhơn, nơi lý tưởng để bắt đầu mọi hành trình khám phá. Với hơn 95 phòng nghỉ đa dạng từ phòng đơn tiêu chuẩn đến Penthouse hạng sang, chúng tôi cam kết mang đến trải nghiệm lưu trú', 0, 20.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `role` enum('manager','le_tan','don_phong','bep_truong','bep_phu') NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`id`, `username`, `password`, `full_name`, `role`, `status`, `created_at`) VALUES
(1, 'quanly', '123456', 'Quản Lý', 'manager', 1, '2026-05-24 11:14:04'),
(2, 'letan', '123456', 'Lễ Tân', 'le_tan', 1, '2026-05-24 11:14:04'),
(3, 'donphong', '123456', 'Nhân Viên Dọn Phòng', 'don_phong', 1, '2026-05-24 11:14:04'),
(4, 'beptruong', '123456', 'Bếp Trưởng', 'bep_truong', 1, '2026-05-24 11:14:04'),
(5, 'bepphu', '123456', 'Nhân Viên Bếp', 'bep_phu', 1, '2026-05-24 11:14:04'),
(6, 'letan03', '123456', 'Bùi Thị Ngọc', 'le_tan', 1, '2026-05-27 19:44:35'),
(7, 'letan04', '123456', 'Đinh Văn Long', 'le_tan', 1, '2026-05-27 19:44:35'),
(8, 'letan05', '123456', 'Nguyễn Thị Ánh', 'le_tan', 1, '2026-05-27 19:44:35'),
(9, 'donphong03', '123456', 'Trịnh Thị Loan', 'don_phong', 1, '2026-05-27 19:44:35'),
(10, 'donphong04', '123456', 'Cao Văn Tùng', 'don_phong', 1, '2026-05-27 19:44:35'),
(11, 'donphong05', '123456', 'Phan Thị Thảo', 'don_phong', 1, '2026-05-27 19:44:35'),
(12, 'bepphu03', '123456', 'Lý Văn Nam', 'bep_phu', 1, '2026-05-27 19:44:35'),
(13, 'bepphu04', '123456', 'Dương Thị Hoa', 'bep_phu', 1, '2026-05-27 19:44:35'),
(14, 'bepphu05', '123456', 'Tạ Văn Sơn', 'bep_phu', 1, '2026-05-27 19:44:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff_task_log`
--

CREATE TABLE `staff_task_log` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL COMMENT 'Nhân viên thực hiện',
  `task_type` enum('cleaning','food','checkin','checkout') NOT NULL COMMENT 'Loại task',
  `ref_id` int(11) DEFAULT NULL COMMENT 'ID tham chiếu (cleaning_tasks.id / food_orders.id / booking_id)',
  `detail` varchar(255) DEFAULT NULL COMMENT 'Mô tả ngắn',
  `done_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `team_details`
--

CREATE TABLE `team_details` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `team_details`
--

INSERT INTO `team_details` (`sr_no`, `name`, `picture`) VALUES
(16, 'Nguyễn Anh Kiệt(Trưởng Nhóm)', 'chill-guy1.png'),
(17, 'Trần Gia Bin', 'chill-guy2.png'),
(18, 'Nguyễn Tấn Cường', 'chill-guy3.png'),
(19, 'Thongme Laongam', 'chill-guy4.png'),
(20, 'Hoàng Thân Quốc Thắng', 'chill-guy5.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_cred`
--

CREATE TABLE `user_cred` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(120) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `pincode` int(11) NOT NULL,
  `dob` date NOT NULL,
  `profile` varchar(100) NOT NULL DEFAULT 'chill-guy.png',
  `password` varchar(200) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `token` varchar(200) DEFAULT NULL,
  `t_expire` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `datentime` datetime NOT NULL DEFAULT current_timestamp(),
  `cccd_image` varchar(200) DEFAULT NULL,
  `loyalty_points` int(11) NOT NULL DEFAULT 0 COMMENT 'Tổng điểm tích lũy hiện có',
  `total_points_earned` int(11) NOT NULL DEFAULT 0 COMMENT 'Tổng điểm đã tích lũy từ trước đến nay (không giảm khi dùng)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_cred`
--

INSERT INTO `user_cred` (`id`, `name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `profile`, `password`, `is_verified`, `token`, `t_expire`, `status`, `datentime`, `cccd_image`, `loyalty_points`, `total_points_earned`) VALUES
(2, 'Thắng', 'qthang1610@gmail.com', '73 Nguyễn Đình Thụ, Quy Nhơn Nam, Gia Lai, Việt Nam', '0356054611', 123324, '2006-10-16', 'chill-guy2.png', '12345', 1, NULL, NULL, 1, '2024-11-30 16:05:59', NULL, 0, 0),
(5, 'Bin', 'trgibin2006@gmail.com', '79 Xuân Diệu, Tuy Phước, Gia Lai, Việt Nam', '0977752206', 123, '2006-06-01', 'IMG_72186.png', '12345', 1, '24ffd287a4c2eda5f2b424be2824f997', NULL, 1, '2024-11-30 02:37:19', NULL, 0, 0),
(6, 'Kiệt', 'nkiet8589@gmail.com', '72 Trần Anh Tông, Quy Nhơn Nam, Gia Lai, Việt Nam', '0914762614', 123, '2005-01-19', 'chill-guy6.png', '12345', 1, 'ef6dc7ba39cf4bf844244d3ef927a3e7', NULL, 1, '2024-11-30 02:40:42', NULL, 2147478100, 2147483647),
(7, 'Thongme', 'thongme@gmail.com', 'Kí túc xá C3, Đại học Quy Nhơn, Quy Nhơn Nam, Gia Lai, Việt Nam', '0876292332', 123, '2004-12-01', 'chill-guy1.png', '12345', 0, '5c9f04397ff3e693f7cbfccea1044483', NULL, 1, '2024-11-30 02:42:37', NULL, 0, 0),
(8, 'Cường', 'cuong32rft@gmail.com', '64 Hoàng Văn Thụ, Quy Nhơn Nam, Gia Lai, Việt Nam', '0963790570', 1, '2006-10-21', 'chill-guy5.png', '12345', 0, '250dd45640f7d810313b27e758a267af', NULL, 1, '2024-11-30 02:55:39', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_queries`
--

CREATE TABLE `user_queries` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `seen` int(11) NOT NULL DEFAULT 0,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Chỉ mục cho bảng `booking_order`
--
ALTER TABLE `booking_order`
  ADD PRIMARY KEY (`booking_id`);

--
-- Chỉ mục cho bảng `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `session_id` (`session_id`);

--
-- Chỉ mục cho bảng `chat_sessions`
--
ALTER TABLE `chat_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_status` (`user_id`,`status`);

--
-- Chỉ mục cho bảng `cleaning_tasks`
--
ALTER TABLE `cleaning_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `food_likes`
--
ALTER TABLE `food_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_food` (`user_id`,`food_id`);

--
-- Chỉ mục cho bảng `food_orders`
--
ALTER TABLE `food_orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loyalty_transactions`
--
ALTER TABLE `loyalty_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `staff_task_log`
--
ALTER TABLE `staff_task_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_date` (`staff_id`,`done_at`);

--
-- Chỉ mục cho bảng `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `booking_order`
--
ALTER TABLE `booking_order`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `chat_sessions`
--
ALTER TABLE `chat_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cleaning_tasks`
--
ALTER TABLE `cleaning_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `food_likes`
--
ALTER TABLE `food_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `food_orders`
--
ALTER TABLE `food_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `loyalty_transactions`
--
ALTER TABLE `loyalty_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `staff_task_log`
--
ALTER TABLE `staff_task_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
