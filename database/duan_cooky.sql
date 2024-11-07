-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 13, 2024 at 05:40 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan_cooky`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id_binh_luan` int NOT NULL,
  `id_khach_hang` int NOT NULL,
  `id_san_pham` int NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_binh_luan` date NOT NULL,
  `display_binh_luan` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `binh_luan`
--

INSERT INTO `binh_luan` (`id_binh_luan`, `id_khach_hang`, `id_san_pham`, `noi_dung`, `ngay_binh_luan`, `display_binh_luan`) VALUES
(6, 2, 7, 'món này ngon ạ', '2024-09-11', 1),
(7, 2, 15, 'ngon nha', '2024-09-11', 1),
(8, 2, 13, '10 điểm', '2024-09-11', 1),
(9, 2, 7, 'nhiều gà lắm ạ', '2024-09-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id_chi_tiet_don_hang` int NOT NULL,
  `id_don_hang` int NOT NULL,
  `id_chi_tiet_san_pham` int NOT NULL,
  `so_luong` int NOT NULL,
  `tong_gia_tien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id_chi_tiet_don_hang`, `id_don_hang`, `id_chi_tiet_san_pham`, `so_luong`, `tong_gia_tien`) VALUES
(1, 1, 30, 1, '219000'),
(2, 2, 30, 1, '219000'),
(3, 3, 30, 1, '219000'),
(4, 4, 31, 4, '590000'),
(5, 4, 30, 2, '590000'),
(6, 5, 40, 2, '952000'),
(7, 5, 39, 1, '952000'),
(8, 5, 31, 1, '952000'),
(9, 6, 34, 6, '270000'),
(10, 7, 38, 1, '19975'),
(11, 8, 40, 1, '261800'),
(12, 9, 41, 1, '254150');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_san_pham`
--

CREATE TABLE `chi_tiet_san_pham` (
  `id_chi_tiet_san_pham` int NOT NULL,
  `so_luong` int NOT NULL DEFAULT '1',
  `ngay_nhap` date NOT NULL,
  `display_detail_san_pham` int DEFAULT '1',
  `id_san_pham` int NOT NULL,
  `id_khau_phan` int NOT NULL,
  `id_do_an_them` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chi_tiet_san_pham`
--

INSERT INTO `chi_tiet_san_pham` (`id_chi_tiet_san_pham`, `so_luong`, `ngay_nhap`, `display_detail_san_pham`, `id_san_pham`, `id_khau_phan`, `id_do_an_them`) VALUES
(30, 103, '2024-09-10', 1, 7, 1, 3),
(31, 3, '2024-09-10', 1, 13, 1, 1),
(32, 5, '2024-09-11', 1, 13, 1, 1),
(33, 206, '2024-09-11', 1, 8, 1, 1),
(34, 65, '2024-09-11', 1, 9, 1, 1),
(35, 243, '2024-09-11', 1, 10, 1, 1),
(36, 232, '2024-09-11', 1, 12, 1, 1),
(37, 232, '2024-09-11', 1, 12, 1, 1),
(38, 231, '2024-09-11', 1, 14, 1, 1),
(39, 98, '2024-09-11', 1, 15, 1, 1),
(40, 97, '2024-09-11', 1, 16, 1, 1),
(41, 998, '2024-09-11', 1, 17, 1, 1),
(42, 999, '2024-09-11', 1, 18, 1, 1),
(43, 999, '2024-09-11', 1, 19, 1, 1),
(44, 76, '2024-09-11', 1, 20, 1, 1),
(45, 99, '2024-09-11', 1, 22, 1, 1),
(46, 32, '2024-09-11', 1, 23, 1, 1),
(47, 23, '2024-09-11', 1, 24, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `danh_gia`
--

CREATE TABLE `danh_gia` (
  `id_danh_gia` int NOT NULL,
  `id_khach_hang` int NOT NULL,
  `id_san_pham` int NOT NULL,
  `danh_gia` int NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci,
  `ngay_danh_gia` date NOT NULL,
  `display_danh_gia` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_gia`
--

INSERT INTO `danh_gia` (`id_danh_gia`, `id_khach_hang`, `id_san_pham`, `danh_gia`, `noi_dung`, `ngay_danh_gia`, `display_danh_gia`) VALUES
(4, 2, 7, 5, 'Shop uy tín ạ', '2024-09-10', 1),
(5, 2, 13, 4, 'Ngon nhưng hơi nhỏ ạ', '2024-09-11', 1),
(6, 2, 15, 5, 'Ngon lắm ạ, Hơi ít gà', '2024-09-11', 1),
(7, 2, 9, 5, '10 điểm', '2024-09-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id_danh_muc` int NOT NULL,
  `ten_danh_muc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh_danh_muc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_danh_muc` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id_danh_muc`, `ten_danh_muc`, `anh_danh_muc`, `display_danh_muc`) VALUES
(1, 'Tất cả', 'groceries.png', 1),
(8, 'Thịt Heo', 'thit_heo.png', 1),
(9, 'Hải Sản', 'hai_san.gif', 1),
(10, 'Thịt Bò', 'thit_bo.png', 1),
(11, 'Rau Củ', 'rau_cu.png', 1),
(12, 'Gà & Vịt', 'ga&vit.png', 1),
(13, 'Trứng & Đậu', 'trung&dau.png', 1),
(14, 'Trái Cây', 'trai_cay.png', 1),
(15, 'Lẩu', 'lau.png', 1),
(16, 'Món Chay', 'mon_chay.png', 1),
(17, 'Đồ Uống', 'do_uong.png', 1),
(18, 'Ăn Vặt', 'anvat.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id_don_hang` int NOT NULL,
  `id_khach_hang` int DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi_giao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_trang_thai_don` int NOT NULL DEFAULT '1',
  `ngay_tao` date NOT NULL,
  `ngay_update` date DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`id_don_hang`, `id_khach_hang`, `phone`, `dia_chi_giao`, `id_trang_thai_don`, `ngay_tao`, `ngay_update`, `payment_method`, `note`) VALUES
(1, 2, '0832658726', 'hưng yên', 5, '2024-09-10', '2024-09-10', '1', 'số nhà 20'),
(2, 2, '0832658726', 'hưng yên', 5, '2024-09-10', NULL, '2', 'hh'),
(3, 2, '0832658726', 'hưng yên', 6, '2024-09-10', NULL, '1', 'số nhà 29'),
(4, 2, '0832658726', 'hưng yên', 5, '2024-09-11', '2024-09-11', '1', 'Số nhà 23, xã lệ xá'),
(5, 2, '0832658726', 'hưng yên', 5, '2024-09-11', '2024-09-11', '2', 'Số nhà 34, hà nội'),
(6, 2, '0832658726', 'hưng yên', 5, '2024-09-11', '2024-09-11', '1', 'số nhà 23,đường lê đức thọ'),
(7, 2, '0832658726', 'hưng yên', 4, '2024-09-11', '2024-09-11', '1', 'số nhà 23'),
(8, 2, '0832658726', 'hưng yên', 4, '2024-09-11', '2024-09-11', '1', 'số nhà 77'),
(9, 2, '0832658726', 'hưng yên', 1, '2024-09-11', NULL, '1', 'số nhà 34 ngõ 5 lê đức thọ');

-- --------------------------------------------------------

--
-- Table structure for table `do_an_them`
--

CREATE TABLE `do_an_them` (
  `id_do_an_them` int NOT NULL,
  `do_an_them` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `do_an_them`
--

INSERT INTO `do_an_them` (`id_do_an_them`, `do_an_them`) VALUES
(1, 'không thêm đồ'),
(2, 'cơm thêm'),
(3, 'rau thêm'),
(4, 'nước coca 390ml');

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id_gio_hang` int NOT NULL,
  `id_khach_hang` int NOT NULL,
  `id_chi_tiet_san_pham` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gio_hang`
--

INSERT INTO `gio_hang` (`id_gio_hang`, `id_khach_hang`, `id_chi_tiet_san_pham`, `so_luong`) VALUES
(48, 2, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `khau_phan`
--

CREATE TABLE `khau_phan` (
  `id_khau_phan` int NOT NULL,
  `khau_phan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoi_phu_hop` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khau_phan`
--

INSERT INTO `khau_phan` (`id_khau_phan`, `khau_phan`, `nguoi_phu_hop`) VALUES
(1, 'Bình thường', 'không thay đổi món ăn'),
(2, 'Cay', 'Người thích ăn cay'),
(3, 'Ăn kiêng', 'Người ăn kiêng'),
(4, 'Trẻ em', 'Khẩu phần nhỏ');

-- --------------------------------------------------------

--
-- Table structure for table `ma_giam_gia`
--

CREATE TABLE `ma_giam_gia` (
  `id_ma_giam_gia` int NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giam_gia` int NOT NULL,
  `so_luong` int NOT NULL,
  `ngay_het_han` date NOT NULL,
  `display_gg` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_giam_gia`
--

INSERT INTO `ma_giam_gia` (`id_ma_giam_gia`, `code`, `giam_gia`, `so_luong`, `ngay_het_han`, `display_gg`) VALUES
(1, 'congmd', 99, 0, '2024-09-21', 0),
(3, 'HHAODYR', 15, 0, '2024-09-13', 0),
(4, 'ph44980', 5, 100, '2024-09-30', 1),
(5, 'PH449HS', 13, 1, '2024-09-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reply_comment`
--

CREATE TABLE `reply_comment` (
  `id_reply_comment` int NOT NULL,
  `id_binh_luan` int NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_khach_hang` int NOT NULL,
  `ngay_reply` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reply_comment`
--

INSERT INTO `reply_comment` (`id_reply_comment`, `id_binh_luan`, `content`, `id_khach_hang`, `ngay_reply`) VALUES
(5, 6, 'dạ shop cảm ơn ạ', 2, '2024-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_roles` int NOT NULL,
  `ten_vai_tro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_roles`, `ten_vai_tro`) VALUES
(1, 'Khách hàng'),
(2, 'Nhân viên'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id_san_pham` int NOT NULL,
  `ten_san_pham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luot_xem` int NOT NULL DEFAULT '0',
  `ngay_nhap` datetime NOT NULL,
  `display_san_pham` int NOT NULL DEFAULT '1',
  `id_danh_muc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id_san_pham`, `ten_san_pham`, `price`, `mo_ta`, `hinh_anh`, `luot_xem`, `ngay_nhap`, `display_san_pham`, `id_danh_muc`) VALUES
(7, 'Gà Nướng Muối Ớt (Gà Nguyên Con)', 219000, 'Gà Nướng Muối Ớt (Gà Nguyên Con) Delichi', '97d8ed97-362c-4f21-a355-b4d47b69a335.jpeg', 31, '2024-09-10 12:55:00', 1, 12),
(8, '[Heo Iberico] Secreto Thịt Thăn Lưng Giữa', 209000, 'Thịt Thăn Lưng Giữa Cắt Khay - Iberian Secreto 300g', '7ee9eb5a-c43e-40f6-ae29-df3db692053b.jpeg', 2, '2024-09-10 12:55:46', 1, 8),
(9, '[Combo] Cơm Gà Ta - Tiêu Đen + 1 Coca', 45000, 'Cơm gà ', '84e22131-bda8-46af-bece-164c75d6202b.png', 3, '2024-09-10 12:57:17', 1, 12),
(10, 'Hành Phi', 15000, 'Hành Phi 50g', '54a4622f-d625-4b85-9f21-ae4f61529321.jpeg', 0, '2024-09-10 12:58:09', 1, 18),
(11, 'Cà Chua Ý Nguyên Trái Ngâm Nước Fiamma', 40000, 'Cà Chua Ý Nguyên Trái Ngâm Nước Fiamma 400g', 'd87645ba-75b2-4211-afb2-6380549a9301.jpeg', 2, '2024-09-10 12:58:56', 1, 11),
(12, 'Măng Chua', 33000, 'Măng Chua 300g', '4012f51c-dc9f-4bfb-af78-2c9e01d58191.jpeg', 1, '2024-09-10 12:59:56', 1, 11),
(13, 'Bánh Bao Chiên (8 Cái)', 38000, 'Bánh Bao Chiên (8 Cái) Delichi', '36a0ae33-a1bc-4500-9529-7285ddc4e0fa.jpeg', 34, '2024-09-10 13:01:33', 1, 18),
(14, 'Cá Trứng (Nguyên Con)', 23500, 'Cá Trứng (Nguyên Con) 200g', '2b2fc6fe-f58a-4bc4-8f0c-4473b49fd0c5.jpeg', 3, '2024-09-10 13:02:20', 1, 9),
(15, 'Lẩu Gà Ta Lá Giang', 298000, 'Nước Lẩu Chicken Resort 2 Lít , Gà Ta Tươi Chicken Resort (Chặt Sẵn) 1Kg, Ớt Chỉ Thiên Đỏ (Ớt Hiểm Đỏ) 10g , Bún Tươi Sợi Nhỏ Ba Khánh 500g , Lá Giang Nhặt Sẵn Rửa Sạch 150g ,Ngò Gai 10', '94ca641d-030b-4f9b-892d-ca079ded1beb.jpeg', 13, '2024-09-10 13:03:52', 1, 15),
(16, 'Lẩu Gà Ta Nấm', 308000, 'Gà Ta Tươi Chicken Resort (Chặt Sẵn) 1Kg ,Nước Lẩu Chicken Resort 2 Lít ,Ớt Chỉ Thiên Đỏ (Ớt Hiểm Đỏ) 10g ,Bún Tươi Sợi Nhỏ Ba Khánh 500g , Combo Nấm Rửa Sạch (Kim Châm, Linh Chi Trắng, Linh Chi Nâu) 400g', 'd4aac821-8259-469a-aa48-f2e74381ee63.jpeg', 6, '2024-09-10 13:05:20', 1, 15),
(17, 'Gà Ta ½ Lá Chanh + ½ Mắm Tỏi + Gỏi', 299000, '1. Gỏi Gà Ta Bồn Bồn CR ,Gà Sốt Lá Chanh 1/2 Con , Sốt Lá Chanh Chicken Resort 40g ,Gà Sốt Mắm Tỏi 1/2 Con ,Sốt Mắm Tỏi Chicken Resort 40g', '77b96559-4e2f-49e6-8d12-9b5ae8d32c04.jpeg', 3, '2024-09-10 13:50:35', 1, 12),
(18, 'Cơm Thêm', 12000, 'Cơm Thêm - 1 Phần', '9ad03620-7054-455e-b3ef-b03fd2caba52.png', 0, '2024-09-10 13:51:32', 1, 1),
(19, 'Dưa Chua Thêm', 10000, ' Dưa Chua Thêm Delichi', 'fdc0e6a5-0e8c-485a-a5a4-115369067fe5.jpeg', 0, '2024-09-10 13:52:24', 1, 11),
(20, 'Hộp Salad', 20000, 'Hộp Salad 250g', '6d4316ff-f246-4705-98d6-9097b9e72d57.jpeg', 0, '2024-09-10 13:52:58', 1, 16),
(21, 'Trà Tắc Thảo Mộc', 20000, 'Trà Tắc Thảo Mộc Delichi', '5700c0ac-61ea-4348-a71a-6326e0ed0407.jpeg', 0, '2024-09-10 13:53:42', 1, 17),
(22, 'Mì Xào Vị Đặc Biệt Indomie', 6500, 'Mì Xào Vị Đặc Biệt Indomie 85g - 1 Gói', '96a5fb3f-7a0e-432c-9ef7-65caf1da5535.jpeg', 0, '2024-09-10 13:54:41', 1, 18),
(23, 'Lẩu Gà Ta Đông Trùng Hạ Thảo', 308000, ' Nước Lẩu Chicken Resort 2 Lít , Gà Ta Tươi Chicken Resort (Chặt Sẵn) 1Kg ,Ớt Chỉ Thiên Đỏ (Ớt Hiểm Đỏ) 10g , Mì Trứng Cao Cấp Meizan 200g , Nấm Đông Trùng Hạ Thảo, Táo Đỏ Khô, Kỷ Tử 100g 6,Cải Bẹ Xanh VietGAP Rửa Sạch 250g', 'de533ab9-81b0-4c61-91b9-8651c0641e83.jpeg', 0, '2024-09-10 13:56:05', 1, 15),
(24, 'Gà Ta Tiêu Đen (Nguyên Con)', 338000, 'Gà Sốt Tiêu Đen Nguyên Con - Sốt Tiêu Đen Chicken Resort 40g', 'fcbb642a-70ce-4123-ac1a-8906ff11ec27.jpeg', 1, '2024-09-10 13:56:59', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don`
--

CREATE TABLE `trang_thai_don` (
  `id_trang_thai_don` int NOT NULL,
  `ten_trang_thai_don` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trang_thai_don`
--

INSERT INTO `trang_thai_don` (`id_trang_thai_don`, `ten_trang_thai_don`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Đang xử lý'),
(4, 'Đang vận chuyển'),
(5, 'Giao thành công'),
(6, 'Đã hủy'),
(7, 'Chờ thanh toán'),
(8, 'Đã thanh toán');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_khach_hang` int NOT NULL,
  `ho_ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_dang_nhap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'no-avatar.jpg',
  `trang_thai` int DEFAULT '1',
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kich_hoat` int DEFAULT '1',
  `display_user` int DEFAULT '1',
  `id_roles` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_khach_hang`, `ho_ten`, `ten_dang_nhap`, `mat_khau`, `email`, `phone`, `hinh_anh`, `trang_thai`, `dia_chi`, `kich_hoat`, `display_user`, `id_roles`) VALUES
(1, 'đức công', 'congmd', 'congmd0504', 'congmd0504@gmail.com', '082986723', 'z4132909339602_e6785d4c7c0f726fd44c26af69789cc2.jpg', 1, 'hưng yên', 1, 1, 2),
(2, 'admin', 'admin', '123456', 'admin@gmail.com', '0832658726', 'logo (2).png', 1, 'hưng yên', 1, 1, 3),
(4, 'mai đức công', 'cong', '123456', 'devcg0504@gmail.com', '0832658726', 'hinh-nen-den-dep-ve-vong-doi-cua-1-con-nguoi.jpg', 1, 'hưng yên', 1, 1, 1),
(5, '2', 'addd', '123456', 'admin2@gmail.com', NULL, 'no-avatar.jpg', 1, NULL, 0, 1, 1),
(8, 'nhanvien', 'nhanvien', '123456', 'nhanvien@gmail.com', NULL, 'no-avatar.jpg', 1, NULL, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id_binh_luan`),
  ADD KEY `fk_bl_khach_hang` (`id_khach_hang`),
  ADD KEY `fk_bl_san_pham` (`id_san_pham`);

--
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id_chi_tiet_don_hang`),
  ADD KEY `fk_ctdh_chi_tiet_san_pham` (`id_chi_tiet_san_pham`),
  ADD KEY `fk_ctdh_don_hang` (`id_don_hang`);

--
-- Indexes for table `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  ADD PRIMARY KEY (`id_chi_tiet_san_pham`),
  ADD KEY `fk_ctsp_do_an_them` (`id_do_an_them`),
  ADD KEY `fk_ctsp_san_pham` (`id_san_pham`),
  ADD KEY `fk_ctsp_khau_phan` (`id_khau_phan`);

--
-- Indexes for table `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id_danh_gia`),
  ADD KEY `fk_dg_khach_hang` (`id_khach_hang`),
  ADD KEY `fk_dg_san_pham` (`id_san_pham`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id_danh_muc`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id_don_hang`),
  ADD KEY `fk_dh_khach_hang` (`id_khach_hang`),
  ADD KEY `fk_dh_trang_thai_don` (`id_trang_thai_don`);

--
-- Indexes for table `do_an_them`
--
ALTER TABLE `do_an_them`
  ADD PRIMARY KEY (`id_do_an_them`);

--
-- Indexes for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id_gio_hang`),
  ADD KEY `fk_gh_khach_hang` (`id_khach_hang`),
  ADD KEY `fk_gh_chi_tiet_san_pham` (`id_chi_tiet_san_pham`);

--
-- Indexes for table `khau_phan`
--
ALTER TABLE `khau_phan`
  ADD PRIMARY KEY (`id_khau_phan`);

--
-- Indexes for table `ma_giam_gia`
--
ALTER TABLE `ma_giam_gia`
  ADD PRIMARY KEY (`id_ma_giam_gia`);

--
-- Indexes for table `reply_comment`
--
ALTER TABLE `reply_comment`
  ADD PRIMARY KEY (`id_reply_comment`),
  ADD KEY `fk_reply_bl_khach_hang` (`id_khach_hang`),
  ADD KEY `fk_reply_bl_binh_luan` (`id_binh_luan`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id_san_pham`),
  ADD KEY `fk_danh_muc` (`id_danh_muc`);

--
-- Indexes for table `trang_thai_don`
--
ALTER TABLE `trang_thai_don`
  ADD PRIMARY KEY (`id_trang_thai_don`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_khach_hang`),
  ADD KEY `fk_roles` (`id_roles`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id_binh_luan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id_chi_tiet_don_hang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  MODIFY `id_chi_tiet_san_pham` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id_danh_gia` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id_danh_muc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id_don_hang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `do_an_them`
--
ALTER TABLE `do_an_them`
  MODIFY `id_do_an_them` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id_gio_hang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `khau_phan`
--
ALTER TABLE `khau_phan`
  MODIFY `id_khau_phan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ma_giam_gia`
--
ALTER TABLE `ma_giam_gia`
  MODIFY `id_ma_giam_gia` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reply_comment`
--
ALTER TABLE `reply_comment`
  MODIFY `id_reply_comment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id_san_pham` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `trang_thai_don`
--
ALTER TABLE `trang_thai_don`
  MODIFY `id_trang_thai_don` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_khach_hang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `fk_bl_khach_hang` FOREIGN KEY (`id_khach_hang`) REFERENCES `user` (`id_khach_hang`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_bl_san_pham` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `fk_ctdh_chi_tiet_san_pham` FOREIGN KEY (`id_chi_tiet_san_pham`) REFERENCES `chi_tiet_san_pham` (`id_chi_tiet_san_pham`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_ctdh_don_hang` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id_don_hang`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  ADD CONSTRAINT `fk_ctsp_do_an_them` FOREIGN KEY (`id_do_an_them`) REFERENCES `do_an_them` (`id_do_an_them`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_ctsp_khau_phan` FOREIGN KEY (`id_khau_phan`) REFERENCES `khau_phan` (`id_khau_phan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_ctsp_san_pham` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `fk_dg_khach_hang` FOREIGN KEY (`id_khach_hang`) REFERENCES `user` (`id_khach_hang`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_dg_san_pham` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `fk_dh_khach_hang` FOREIGN KEY (`id_khach_hang`) REFERENCES `user` (`id_khach_hang`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_dh_trang_thai_don` FOREIGN KEY (`id_trang_thai_don`) REFERENCES `trang_thai_don` (`id_trang_thai_don`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `fk_gh_chi_tiet_san_pham` FOREIGN KEY (`id_chi_tiet_san_pham`) REFERENCES `chi_tiet_san_pham` (`id_chi_tiet_san_pham`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_gh_khach_hang` FOREIGN KEY (`id_khach_hang`) REFERENCES `user` (`id_khach_hang`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `reply_comment`
--
ALTER TABLE `reply_comment`
  ADD CONSTRAINT `fk_reply_bl_binh_luan` FOREIGN KEY (`id_binh_luan`) REFERENCES `binh_luan` (`id_binh_luan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_reply_bl_khach_hang` FOREIGN KEY (`id_khach_hang`) REFERENCES `user` (`id_khach_hang`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `fk_danh_muc` FOREIGN KEY (`id_danh_muc`) REFERENCES `danh_muc` (`id_danh_muc`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_roles` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id_roles`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
