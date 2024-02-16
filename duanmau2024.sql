-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 11, 2024 lúc 07:46 AM
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
-- Cơ sở dữ liệu: `duanmau2024`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `ngaybinhluan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `idpro`, `iduser`, `noidung`, `ngaybinhluan`) VALUES
(1, 2, 1, 'test binh luan', '2024-01-05'),
(2, 4, 2, 'sản phẩm tốt', '2024-01-11'),
(3, 5, 2, 'dùng rất bền ', '2024-01-11'),
(4, 8, 2, 'nghe rất thích nha', '2024-01-11'),
(5, 7, 2, 'sản phẩm rẻ và tốt', '2024-01-11'),
(6, 4, 1, 'dùng rất thích ạ', '2024-01-11'),
(7, 6, 1, 'code rất tốt cho sinh viên', '2024-01-11'),
(8, 3, 1, 'iphone rất đẹp cho chị em', '2024-01-11'),
(9, 6, 1, 'code sinh động', '2024-01-11'),
(10, 6, 3, 'sản phẩm tốt', '2024-01-11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(5, 'Điện thoại'),
(6, 'Laptop'),
(7, 'Phụ kiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `img` varchar(255) NOT NULL,
  `mota` text NOT NULL,
  `luotxem` int(11) NOT NULL,
  `iddm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `img`, `mota`, `luotxem`, `iddm`) VALUES
(3, 'Iphone 13 ', 15900000.00, 'iphone13.jpg', 'Điện thoại iPhone 13 128GB VN/A Pink thu hút với kiểu thiết kế ngôn ngữ phẳng hiện đại, nguyên khối vuông vức, tinh tế đến từng chi tiết. Điện thoại trang bị khung nhôm, mặt sau và trước bằng kính cường lực cao cấp toát lên vẻ ngoài sang chảnh, thời thượng và đảm bảo độ bền bỉ cao. Mặt trước của iPhone 13 được phủ lớp kính Ceramic Shield cứng cáp, sáng bóng, thanh lịch, bền đẹp, hạn chế xước vỡ. Phía ngoài màn hình còn được phủ lớp oleophobic hạn chế tình trạng bám bụi bẩn và mồ hôi giữ màn hình luôn sạch sẽ', 0, 5),
(4, 'Oppo A18', 3500000.00, 'oppo.jpg', 'Điện thoại OPPO A18 4GB/128GB Xanh sở hữu thiết kế với độ mỏng chỉ 8,16mm vô cùng gọn nhẹ tạo cảm giác thoải mái khi cầm trên tay. Các góc cạnh được bo cong mềm mại, hai bên vát cong nhẹ nhàng việc cầm nắm sẽ trở nên dễ dàng, chắc chắn hơn.', 0, 5),
(5, 'Laptop HP', 8000000.00, 'laptop_HP.jpg', 'HP 15 da0048TU là chiếc laptop Pentium thuộc phân khúc tầm trung của HP được trang bị cấu hình khá với Chíp vi xử lý Intel Pentium N5000, 4 GB RAM, ổ cứng HDD 500 GB và Card đồ họa tích hợp Intel HD Graphics. Sản phẩm đáp ứng tốt hầu hết các tác vụ đơn giản của người dùng hằng ngày như làm việc văn phòng, giải trí cơ bản, chơi game nhẹ nhàng hay người cần một chiếc laptop để học tập.', 0, 6),
(6, 'Laptop Acer', 10000000.00, 'laptop_acer.jpg', 'Laptop Acer As A315 có thiết kế khá bắt mắt với mặt lưng giả kim loại được phủ 1 lớp phay xước giúp máy trông cá tính và hạn chế bụi bẩn hơn. Mặc dù có kích thước lớn nhưng bốn góc của máy được bo cong giúp cho việc cầm nắm thoải mái, tạo cảm giác chắc chắn hơn.', 0, 6),
(7, 'Tai nghe blutooth', 200000.00, 'tai_nghe.jpg', 'Tai nghe Bluetooth WIWU Airbuds SE Chuẩn kết nối: Bluetooth 5.1 Là tai nghe kiểu earbuds có đuôi thuôn dài hỗ trợ micro để đàm thoại một cách tốt hơn Thời lượng pin có thể nghe liên tục trong vòng 5 tiếng với âm lượng phù hợp.', 0, 7),
(8, 'Loa di động', 1500000.00, 'loa_didong.jpg', 'Thiết kế di động đẹp mắt, dễ dàng mang theo. Hỗ trợ Bluetooth 5.3 cho tốc độ kết nối nhanh hơn, phạm vi kết nối xa hơn và tiết kiệm Pin hơn. Pin dùng 12h với tính năng sạc ngược tiện lợi Hiệu ứng đèn Led nhiều màu sắc phát sáng nhấp nháy chuyển nhịp theo tiếng nhạc.', 0, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `address`, `tel`, `role`) VALUES
(1, 'user', '12345', 'user123@gmail.com', 'Lien Chau', '12345678', 0),
(2, 'admin', 'admin', '', '', '', 1),
(3, 'hihi', '12345', 'trungnt173@gmail.com', '', '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_danhmuc_sanpham` (`iddm`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_danhmuc_sanpham` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
