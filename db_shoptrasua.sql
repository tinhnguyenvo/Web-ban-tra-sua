-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 12, 2021 lúc 05:52 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_shoptrasua`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_hd` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `soluong` int(11) NOT NULL COMMENT 'số lượng',
  `gia` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`id`, `id_hd`, `id_sp`, `soluong`, `gia`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 1, 20000, '2021-03-25 00:39:03', '2021-03-25 00:39:03'),
(2, 2, 9, 1, 20000, '2021-04-06 11:22:54', '2021-04-06 11:22:54'),
(3, 2, 13, 1, 20000, '2021-04-06 11:22:54', '2021-04-06 11:22:54'),
(4, 2, 14, 1, 15000, '2021-04-06 11:22:54', '2021-04-06 11:22:54'),
(5, 3, 3, 3, 22000, '2021-04-06 11:23:29', '2021-04-06 11:23:29'),
(6, 4, 4, 1, 24000, '2021-04-06 11:23:57', '2021-04-06 11:23:57'),
(7, 5, 9, 1, 22000, '2021-05-20 01:20:59', '2021-05-20 01:20:59'),
(8, 6, 9, 1, 22000, '2021-05-28 07:19:06', '2021-05-28 07:19:06'),
(9, 7, 9, 1, 22000, '2021-05-28 14:09:53', '2021-05-28 14:09:53'),
(10, 7, 14, 2, 15000, '2021-05-28 14:09:53', '2021-05-28 14:09:53'),
(11, 7, 3, 1, 22000, '2021-05-28 14:09:53', '2021-05-28 14:09:53'),
(12, 7, 13, 1, 20000, '2021-05-28 14:09:53', '2021-05-28 14:09:53'),
(13, 8, 9, 1, 22000, '2021-05-28 14:13:03', '2021-05-28 14:13:03'),
(14, 9, 3, 1, 22000, '2021-05-28 14:20:38', '2021-05-28 14:20:38'),
(15, 9, 2, 1, 19800, '2021-05-28 14:20:38', '2021-05-28 14:20:38'),
(16, 10, 1, 1, 18000, '2021-05-28 14:30:13', '2021-05-28 14:30:13'),
(17, 11, 9, 1, 22000, '2021-05-28 14:33:26', '2021-05-28 14:33:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctkhuyenmai`
--

CREATE TABLE `ctkhuyenmai` (
  `id` int(11) NOT NULL,
  `id_km` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `giaskm` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ctkhuyenmai`
--

INSERT INTO `ctkhuyenmai` (`id`, `id_km`, `id_sp`, `giaskm`) VALUES
(20, 1, 1, 18000),
(21, 1, 2, 19800);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kh` int(11) DEFAULT NULL,
  `ngaydat` date DEFAULT NULL,
  `tongtien` float DEFAULT NULL COMMENT 'tổng tiền',
  `httt` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `ghichu` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(50) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `id_kh`, `ngaydat`, `tongtien`, `httt`, `ghichu`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 14, '2021-03-25', 20000, 'COD', NULL, 'Giao hàng thành công', '2021-04-06 11:24:48', '2021-04-06 11:24:48'),
(2, 15, '2021-04-06', 55000, 'COD', 'test', 'Giao hàng thành công', '2021-05-28 12:47:37', '2021-05-28 12:47:37'),
(3, 15, '2021-04-08', 66000, 'COD', NULL, 'Giao hàng thành công', '2021-05-28 14:32:01', '2021-05-28 12:47:42'),
(4, 15, '2021-04-10', 24000, 'COD', NULL, 'Giao hàng thành công', '2021-05-28 14:04:49', '2021-05-28 12:47:47'),
(9, 18, '2021-05-19', 41800, 'COD', NULL, 'Giao hàng thành công', '2021-05-28 14:31:05', '2021-05-28 14:22:50'),
(6, 17, '2021-05-20', 22000, 'COD', 'Giao nhanh', 'Giao hàng thành công', '2021-05-28 14:15:49', '2021-05-28 12:48:13'),
(7, 16, '2021-05-24', 94000, 'COD', 'Giao gắp', 'Giao hàng thành công', '2021-05-28 14:17:24', '2021-05-28 14:11:13'),
(8, 17, '2021-05-19', 22000, 'COD', NULL, 'Giao hàng thành công', '2021-05-28 14:34:49', '2021-05-28 14:16:16'),
(10, 14, '2021-05-25', 18000, 'COD', NULL, 'Đang vận chuyển', '2021-05-28 14:34:44', '2021-05-28 14:32:42'),
(11, 14, '2021-05-27', 22000, 'COD', 'Khách hủy đơn hàng', 'Đã hủy', '2021-05-28 14:34:35', '2021-05-28 14:33:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `hoten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `hoten`, `gioitinh`, `email`, `diachi`, `sdt`, `ghichu`, `created_at`, `updated_at`) VALUES
(20, 'Nguyen Van B', 'Nam', 'nvb@gmail.com', 'Co Do', '8888888888', NULL, '2021-05-28 14:19:42', '2021-05-28 14:19:42'),
(19, 'Nguyễn Văn A', 'Nam', 'abc@gmail.com', 'Đồng Tháp', '2548784754', NULL, '2021-05-28 14:12:34', '2021-05-28 14:12:34'),
(18, 'Nguyễn Chương Hoàng Vỹ', 'Nam', 'nchv@gmail.com', '233 Cần Thơ', '2547854412', NULL, '2021-05-28 14:09:03', '2021-05-28 14:09:03'),
(17, 'Nguyen Van A', 'nam', 'nva@gmail.com', 'o dau do trong can tho', '0214578454', NULL, '2021-05-28 07:19:06', '2021-05-28 07:19:06'),
(16, 'NG QUANG THAI TAI', 'nam', 'godofwarkratop123@gmail.com', 'Duong Dinh Hoa', '1234567890', NULL, '2021-05-20 01:20:59', '2021-05-20 01:20:59'),
(15, 'Test Van Ten', 'Nam', 'nvtinhyyy@gmail.com', 'An Giang', '1234567891', NULL, '2021-04-06 11:21:58', '2021-04-06 11:21:58'),
(14, 'Nguyễn Võ Tính', 'Nam', 'nvtinh@gmail.com', 'Nguyễn Văn Cừ - Cần thơ', '0917254513', NULL, '2021-03-21 15:04:40', '2021-03-21 15:04:40'),
(13, 'admin', 'Nam', 'taikhoanadmin@gmail.com', 'admin', '0915478454', NULL, '2021-03-21 14:43:11', '2021-03-21 14:43:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(11) NOT NULL,
  `tenkm` varchar(50) DEFAULT NULL,
  `ngaybd` datetime DEFAULT NULL,
  `ngaykt` datetime DEFAULT NULL,
  `giam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`id`, `tenkm`, `ngaybd`, `ngaykt`, `giam`) VALUES
(1, 'Test', '2021-05-20 18:23:00', '2021-05-21 18:24:00', 10),
(2, 'Khuyen mai moi', '2021-05-18 20:30:00', '2021-05-20 21:30:00', 15),
(4, 'Mua he', '2021-05-19 17:00:00', '2021-05-20 17:00:00', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`id`, `ten`, `mota`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Milk Tea', '', '', NULL, NULL),
(2, 'Macchiato', '', '', NULL, NULL),
(3, 'Latte', '', '', NULL, '2020-06-21 18:45:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_loai` int(10) UNSIGNED DEFAULT NULL,
  `mota` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` float DEFAULT NULL,
  `giakm` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ngaybd` datetime DEFAULT NULL,
  `ngaykt` datetime DEFAULT NULL,
  `sale` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten`, `id_loai`, `mota`, `gia`, `giakm`, `image`, `unit`, `new`, `created_at`, `updated_at`, `ngaybd`, `ngaykt`, `sale`) VALUES
(1, 'Trà sữa trân châu đường đen', 1, 'Trà sữa trân châu đường đen là một trong những topping được nhiều người yêu thích, kết hợp với sữa tươi hoặc trà sữa đều được. Đặc biệt, trà sữa trân châu đường đen khi syrup đường đen ngấm vào trân châu, tạo vị ngọt, độ bóng nhiều hơn các loại trân châu khác, mang lại khẩu vị mới mẻ.', 20000, 18000, 'tra-sua-tran-chau-duong-den.jpg', 'Ly', 0, NULL, '2021-05-20 01:19:14', NULL, NULL, 1),
(2, 'Trà sữa caramel', 1, 'Giữa mùa hè nắng nóng như thế này, thưởng thức một ly trà sữa caramen thơm ngon với sự béo ngậy của caramen quyện với vị trà thanh mát thì còn gì bằng', 22000, 19800, 'tra-sua-caramel.png', 'Ly', 0, NULL, '2021-05-20 01:19:23', '2020-12-22 19:45:00', '2020-12-27 19:45:00', 1),
(3, 'Trà sữa Cake Cream', 1, 'Nếu bạn đã trót mê mẩn người anh em Socola Cake Cream mà lại chưa thử Trà sữa Cake Cream thì quả thật là một thiếu sót cực kỳ lớn đó ạ. So với Socola thì vị trà sữa ngọt dịu hơn, hương thơm trà nồng nàn nhẹ nhàng phảng phất tạo cảm giác vô cùng thư giãn. Lớp Cake Cream vàng óng ả từ lâu đã là \"đặc sản\" của Heekcaa thì khỏi phải bàn: đặc, béo, thơm ngon, đọng lại đến tận cuối, nhiều bạn còn tiếc nuối là không lấy được hết Cake Cream để ăn cho bõ cơ', 22000, 0, 'tra-sua-cake-cream.png', 'Ly', 0, NULL, '2021-05-19 11:19:39', NULL, NULL, 0),
(4, 'Coffee Latte Jelly', 1, 'Thức uống cà phê sữa đá kết hợp topping dẻo thơm cho thức uống. Thử ngay thức uống này để cảm nhận hương vị đặc biệt của cà phê sữa đá thạch jelly.', 24000, 0, 'coffee-lette-jelly.png', 'Ly', 0, NULL, '2021-05-19 11:19:38', NULL, NULL, 0),
(5, 'Trà sữa hoa quả', 1, 'Bên cạnh trân châu dẻo giòn, các loại thạch đa dạng hương vị và sắc màu hấp dẫn thì topping trái cây tươi với hương vị thơm mát tự nhiên sẽ làm cho món trà sữa thêm phần cuốn hút. Nếu bạn là tín đồ trà sữa, đừng bỏ qua trà sữa trái cây', 22000, 0, 'hinh-anh-tra-sua-hoa-qua.png', 'Ly', 0, NULL, '2020-12-18 13:31:21', '2020-12-16 20:31:00', '2020-12-17 20:31:00', 0),
(6, 'Hồng trà Macchiato', 2, 'Sự kết hợp giữa hồng trà và lớp kem macchiato tạo nên hương vị rất riêng, thanh mát, đậm đà thêm chút beo béo của sữa, chan chát của trà. Bạn có muốn thử cách làm hồng trà macchiato thơm ngon béo mịn này tại nhà? Hồng trà machiato còn gọi là hồng trà milk foam, hồng trà kem muối, là thức uống thơm ngon, hấp dẫn bao người với nước hồng trà phía dưới và lớp bọt sữa trắng dày mịn phủ phía trên thành 2 tầng rõ rệt. Lớp kem béo ngậy mằn mặn được uống cùng nước trà thật sảng khoái.', 20000, 0, 'hong-tra-machiato.png', 'Ly', 0, NULL, '2021-05-19 11:19:38', NULL, NULL, 0),
(7, 'Matcha latte', 3, 'Thức uống có vị thơm đặc trưng từ bột trà xanh (thường là của Nhật Bản và Đài Loan), hòa quyện với vị sữa béo. Trong đó có một phần sữa nóng được đánh bọt dùng để vẽ nên những hình ảnh sinh động, đẹp mắt trên bề mặt ly thức uống. Latte thường được phục vụ trong các quán cà phê với cả hai hình thức nóng và lạnh đều rất ngon, nhưng mỗi loại sẽ cho bạn một trải nghiệm khác nhau.', 22000, 0, 'matcha-latte.png', 'Ly', 0, NULL, NULL, NULL, NULL, 0),
(8, 'Trà đào macchiato', 2, 'Trà đào Macchiato khiến mọi người say mê bởi vị ngọt thanh, hương thơm hấp dẫn của đào cùng với lớp Macchiato beo béo.', 20000, 0, 'tra-dao-macchiato.png', 'Ly', 1, NULL, '2021-05-19 11:19:36', NULL, NULL, 0),
(9, 'Trà sữa đậu biếc', 1, 'Trà sữa hoa đậu biếc là thức uống mới nổi, thu hút người thưởng thức bằng vị béo ngậy, chan chát của trà sữa, hương thơm thoang thoảng và đặc biệt là màu tím đặc trưng từ hoa đậu biếc khô. Món thức uống đặc biệt này không chỉ giúp bạn có thêm chọn lựa khi vào các quán trà sữa mà còn bổ dưỡng, tốt cho sức khỏe nhờ những tác dụng mà hoa đậu biếc mang lại.', 22000, 0, 'tra-dau-biec.png', 'Ly', 1, NULL, '2020-12-23 12:45:17', '2020-12-22 19:45:00', '2020-12-26 19:45:00', 0),
(10, 'Trà olong macchiato', 2, 'Trà Ô long là sự kết hợp đặc biệt ở hương trà thanh, vị trà đậm và ngọt hậu lại kết hợp thêm lớp macchiato beo béo bồng bềnh đánh sâu vào thị giác và thính giác của người thưởng thức.', 22000, 0, 'tra-olong-macchiato.png', 'Ly', 0, NULL, NULL, NULL, NULL, 0),
(11, 'Trà sữa đài loan', 1, 'Trà sữa Đài Loan khác hoàn toàn với trà sữa Thái Lan, Ấn Độ hay Hồng Kông. Điều thú vị và có lẽ khác biệt của nó chính là ở sự đa dạng và sự cầu kỳ trong cách pha chế. Đây là bí quyết tạo nên sự thành công và hấp dẫn của không chỉ trà sữa mà còn là trong lĩnh vực ẩm thực của xứ này.', 20000, 0, 'tra-sua-dai-loan.png', 'Ly', 0, NULL, NULL, NULL, NULL, 0),
(12, 'Trà sữa matcha', 1, 'Trà sữa matcha với hương vị thơm ngon được kết hợp hoàn hảo giữa bột trà xanh Nhật Bản và sữa béo thơm được nhiều người yêu thích.', 20000, 0, 'tra-sua-matcha.png', 'Ly', 0, NULL, NULL, NULL, NULL, 0),
(13, 'Trà sữa dâu', 1, 'Không những có mùi thơm đặc trưng, sự kết hợp hài hòa giữa vị chua thanh và ngọt dịu khiến loại trái cây này có một hương vị thật độc đáo khó quên. Ngày hôm nay Kinhdoanhcafe xin giới thiệu tới các bạn cách làm trà sữa trân châu vị dâu tây – Một trong những lựa chọn tuyệt vời dành cho bạn, trong khoảng thời gian nóng bức này của thời tiết mùa hè.', 20000, 0, 'tra-sua-dau.png', 'Ly', 1, NULL, NULL, NULL, NULL, 0),
(14, 'Trà sữa dâu tây', 1, 'Sự ngọt ngào thơm ngon đi kèm màu hồng bắt mắt của trà sữa dâu chắc chắn sẽ mê hoặc mọi cô nàng mê trà sữa đấy. Học ngay 3 cách làm trà sữa dâu dưới đây cùng Jarvis bạn sẽ có ngay một thức uống đẹp từ hình thức, mùi vị đến cả công dụng tuyệt vời cho sức khỏe đấy.', 15000, 0, 'tra-sua-dau-tay.png', 'Ly', 1, NULL, NULL, NULL, NULL, 0),
(15, 'Trà trái cây nhiệt đới', 2, 'Trà trái cây là một loại đồ uống ngon đang hot ngày nay, đặc biệt là ngày hè nóng bức. Cách làm trà trái cây với sự kết hợp giữa vị đắng nhẹ, thơm lừng mùi trà và đủ vị chua chua, ngọt ngọt của các loại trái cây nhiệt đới sẽ giúp bạn không chỉ có món trà trái cây giải nhiệt mùa hè mà còn cung cấp rất nhiều vitamin làm đẹp da.', 25000, 0, 'tra-trai-cay-nhiet-doi.png', 'Ly', 1, NULL, NULL, NULL, NULL, 0),
(16, 'Trà trái cây young tea', 2, 'Trà trái cây là một loại đồ uống ngon đang hot ngày nay, đặc biệt là ngày hè nóng bức. Cách làm trà trái cây với sự kết hợp giữa vị đắng nhẹ, thơm lừng mùi trà và đủ vị chua chua, ngọt ngọt của các loại trái cây nhiệt đới sẽ giúp bạn không chỉ có món trà trái cây giải nhiệt mùa hè mà còn cung cấp rất nhiều vitamin làm đẹp da.', 10000, 0, 'tra-trai-cay-young-tea.png', 'Ly', 1, NULL, NULL, NULL, NULL, 0),
(17, 'Trà dưa hấu', 2, 'Trà làm từ dưa hấu xoay.Tọa nên hương vị nguyên chất.', 23000, 0, 'tra-dua-hau.png', 'Ly', 1, NULL, NULL, NULL, NULL, 0),
(18, 'Trà tắc xí muội', 2, 'Vị chua chua ngọt ngọt, mát lạnh sảng khoái và thơm mát của trà tắc xí muội sẽ khiến mùa hè của bạn trở nên thú vị và mát mẻ hơn.', 20000, 0, 'tra-tac-xi-muoi.png', 'Ly', 1, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `hovaten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `hovaten`, `email`, `password`, `sdt`, `diachi`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@admin.com', '123456', '123456', NULL, NULL, NULL, NULL),
(13, 'admin', 'taikhoanadmin@gmail.com', '$2y$10$l/mjvwHR7L4oleARExTsAOmJnhoI4hj065ojy.olfdGd3o2ZlG88a', '0915478454', 'admin', NULL, '2021-03-21 14:43:11', '2021-03-21 14:43:11'),
(14, 'Nguyễn Võ Tính', 'nvtinh@gmail.com', '$2y$10$ATplj/oQUeIExVH8pljXT.JJrGdxBRLsT7WruzArxOWcmzrRLEGfe', '0917254513', 'Nguyễn Văn Cừ - Cần thơ', NULL, '2021-03-21 15:04:40', '2021-03-21 15:04:40'),
(15, 'Test Van Ten', 'nvtinhyyy@gmail.com', '$2y$10$YjvOK/vreFZBO2WbPbfvUO0HATEPces/SV6oSDtV/hHV8jDlfmzx2', '1234567891', 'An Giang', NULL, '2021-04-06 11:21:58', '2021-04-06 11:21:58'),
(16, 'Nguyễn Chương Hoàng Vỹ', 'nchv@gmail.com', '$2y$10$sh3ts9qBgEHyb0MtAsjo5OI6zqDfJq6f2p07uBPAVqGzQm46qcQOC', '2547854412', '233 Cần Thơ', NULL, '2021-05-28 14:09:03', '2021-05-28 14:09:03'),
(17, 'Nguyễn Văn A', 'abc@gmail.com', '$2y$10$04RZBwnasXhc/YfIy/KNreyhhs40uVR4wjzKvxzh6pnDa8IFeveFq', '2548784754', 'Đồng Tháp', NULL, '2021-05-28 14:12:34', '2021-05-28 14:12:34'),
(18, 'Nguyen Van B', 'nvb@gmail.com', '$2y$10$rtoHvcvskMoYnx5ZxFSOnO9Wt7ZcUjoZVeOAQmHaK3xUZfc58jR5G', '8888888888', 'Co Do', NULL, '2021-05-28 14:19:42', '2021-05-28 14:19:42');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_sp`);

--
-- Chỉ mục cho bảng `ctkhuyenmai`
--
ALTER TABLE `ctkhuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_kh`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_loai`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `ctkhuyenmai`
--
ALTER TABLE `ctkhuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_loai`) REFERENCES `loaisp` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
