-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 03:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `com_logo` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `com_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `com_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `com_phone` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `com_address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `cur_format` varchar(10) COLLATE utf8_bin NOT NULL,
  `admin_role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `username`, `password`, `com_logo`, `com_name`, `com_email`, `com_phone`, `com_address`, `cur_format`, `admin_role`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 'Inventory', 'inventory@gmail.com', NULL, NULL, '$', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` mediumtext COLLATE utf8_bin NOT NULL,
  `brand_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `brand_cat`) VALUES
(10, 'Samsung', 9),
(11, 'LG', 9),
(12, 'Lenovo', 9),
(13, 'Realme', 9);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` mediumtext COLLATE utf8_bin NOT NULL,
  `products` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `products`) VALUES
(13, 'Đồ ăn', 0),
(14, 'Phụ kiện', 0);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `s_no` int(11) NOT NULL,
  `site_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `site_title` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `site_logo` varchar(100) COLLATE utf8_bin NOT NULL,
  `site_desc` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `footer_text` varchar(100) COLLATE utf8_bin NOT NULL,
  `currency_format` varchar(20) COLLATE utf8_bin NOT NULL,
  `contact_phone` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `contact_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `contact_address` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`s_no`, `site_name`, `site_title`, `site_logo`, `site_desc`, `footer_text`, `currency_format`, `contact_phone`, `contact_email`, `contact_address`) VALUES
(1, 'Shop thú cưng', 'Mua sắm đồ dùng thú cưng trực tuyến', '1607348871shopping-logo (3).png', 'Mua sắm đồ dùng thú cưng trực tuyến', 'Copyright 2022', '₫', '9876541230', 'email@email1.com', '#123, Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_id` int(11) NOT NULL,
  `product_id` varchar(100) COLLATE utf8_bin NOT NULL,
  `product_qty` varchar(100) COLLATE utf8_bin NOT NULL,
  `total_amount` int(20) NOT NULL,
  `product_user` int(11) NOT NULL,
  `order_date` varchar(11) COLLATE utf8_bin NOT NULL,
  `address` varchar(40) COLLATE utf8_bin NOT NULL,
  `note` text COLLATE utf8_bin NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_id`, `product_id`, `product_qty`, `total_amount`, `product_user`, `order_date`, `address`, `note`, `phone_number`) VALUES
(54, '25', '2', 440000, 2, '18/06/2022', 'hx2', 'qư', '01293123'),
(55, '19,36', '3,1', 636000, 2, '18/06/2022', 'Caauf dien', 'blabla', '035424524');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `item_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `item_number`, `txn_id`, `payment_gross`, `currency_code`, `payment_status`) VALUES
(5, '11', 'd388939cdaca4087acca75574a34b035', 759.00, '', 'credit'),
(6, '12', '4e2738d7eade4f57b5fd32434239d35f', 299.00, '', 'credit'),
(7, '12', 'd7a5b179cd07480782fc2d21edec7031', 299.00, '', 'credit'),
(8, '12', 'a0f61b1acd6b444ba5856cc4387e7710', 299.00, '', 'pending'),
(9, '12', '0e2fdf1541994d338c676201097d2481', 598.00, '', 'credit'),
(10, '12', '8b0791e3eb764e45b497b0f0c401d9d6', 299.00, '', 'credit'),
(11, '12', '92c9c474ae864d01b81f7e2f4d3a098e', 299.00, '', 'credit'),
(20, '11', '6863fbdf68be45d5a77aa01774a80885', 759.00, '', 'credit'),
(21, '11', 'ee7d6cea937c4f06b6e5e1fffe47b778', 759.00, '', 'credit'),
(22, '12', 'f7ce91d5964c462fa3972f6cb5373d4a', 299.00, '', 'credit'),
(23, '11', '939d866425ef479c84e276e664ce5a31', 1518.00, '', 'credit'),
(29, '10,11,12,', 'df952fa6bacd4f389de80b1080ed3871', 1342.00, '', 'credit'),
(30, '4,12,', 'd19818d2ba3543ffa03a79a7eb64901b', 94279.00, '', 'credit'),
(31, '11,12,', '2c648ec714914c18b447309d691b7eef', 1058.00, '', 'credit'),
(32, '11,12,', '700bf310ca4a4697b59184f61309275a', 1058.00, '', 'credit'),
(33, '11,12,', '639ccfba60cd41eeba02ba5ff1849249', 1058.00, '', 'credit'),
(34, '11,12,', '792c6616026948e48a2fcc07eb35c158', 1058.00, '', 'credit'),
(35, '11,12,', '153427404661463f83a5e8bd080a95e9', 1058.00, '', 'credit'),
(36, '11,12,', '37473185580340ab8c54d102204c7bf9', 1058.00, '', 'credit'),
(37, '11,12,', '2bb8d2ccf3544d0089d211abf4d55e36', 1058.00, '', 'credit'),
(38, '12,13,', '63148f0e7b7043f5a5e470a9ac1d3dde', 1532.00, '', 'credit'),
(39, '12,', '3c209af45445486c8aefb6cfb55dcbb7', 299.00, '', 'credit'),
(40, '4,11,', 'de12961908164fa7b99bb0c8aa531234', 47749.00, '', 'credit'),
(41, '11,', '858602f7e8d24b3293811624d8cff51b', 759.00, '', 'credit'),
(42, '11,', '7ff92291b7804c208e76eb3d841ed754', 759.00, '', 'credit');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_code` varchar(100) COLLATE utf8_bin NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_sub_cat` int(11) NOT NULL,
  `product_brand` int(100) DEFAULT NULL,
  `product_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `product_price` varchar(100) COLLATE utf8_bin NOT NULL,
  `product_desc` mediumtext COLLATE utf8_bin NOT NULL,
  `featured_image` mediumtext COLLATE utf8_bin NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `product_keywords` mediumtext COLLATE utf8_bin DEFAULT NULL,
  `product_views` int(11) DEFAULT 0,
  `product_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_cat`, `product_sub_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `featured_image`, `qty`, `product_keywords`, `product_views`, `product_status`) VALUES
(14, '62aadef96ec51', 13, 29, 0, 'Thức ăn cho chó Beneful', '190000', '&lt;h1&gt;&lt;span style=&quot;font-size:24px;color: rgb(20, 20, 20); font-family: -apple-system, BlinkMacSystemFont, &amp;quot;Segoe UI&amp;quot;, Roboto, &amp;quot;Helvetica Neue&amp;quot;, Arial, sans-serif, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;; letter-spacing: 0.25px;&quot;&gt;Beneful là loại thức ăn khô được thiết kế thành hình dạng phù hợp với nhiều loài chó và còn đáp ứng hoàn hảo nhu cầu về protein để cung cấp đủ và kịp năng lượng cho chúng.&lt;/span&gt;&lt;/h1&gt;', '1655365369beneful.jpeg', 10, NULL, 59, 1),
(15, '62abee0b41a07', 13, 29, 0, 'Thức ăn chó SmartHeart', '415000', '&lt;h1 style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 13px;&quot;&gt;&lt;span style=&quot;font-size:24px;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif;&quot;&gt;- Chế độ ăn uống lành mạnh được bào chế đặc biệt cho các giống chó&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;&lt;h1 style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- Giup chó con phát triển lành mạnh, đúng với size, tăng tuổi thọ cho chó trưởng thành&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;&lt;h1 style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- Dinh dưỡng đầy đủ cho 1 bữa ăn&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- Rất đáng dồng tiền khi khách chọn sản phẩm này cho con ăn&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- Thương hiệu thức ăn thú cưng cao cấp thuộc tập đoàn dinh dưỡng Nestle&lt;/h1&gt;&lt;/h1&gt;&lt;/span&gt;&lt;/h1&gt;', '1655434763SH-Adult-beefCho-truong-thanh.jpg', 8, NULL, 64, 1),
(17, '62abef6e5410a', 13, 29, 0, 'Thức ăn chó Pedigree', '750000', '&lt;h1 style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 13px;&quot;&gt;&lt;span style=&quot;font-size:24px;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif;&quot;&gt;- Chế độ ăn uống lành mạnh được bào chế đặc biệt cho các giống chó&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- Giup chó con phát triển lành mạnh, đúng với size&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- Dinh dưỡng đầy đủ cho 1 bữa ăn&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- Rất đáng dồng tiền khi khách chọn sản phẩm này cho con ăn&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- Thương hiệu thức ăn thú cưng cao cấp thuộc tập đoàn dinh dưỡng Nestle&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- 100% sane xuất tại Uc với công nghệ hiện đại&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- Thức ăn cho chó con duy nhất có chứa sữa non giúp tăng cường miễn dịch&lt;/span&gt;&lt;/h1&gt;', '1655435118thuc-an-cho-cho-pedigree-255768.jpg', 4, NULL, 91, 1),
(18, '62abf047def3c', 13, 29, 0, 'Thức ăn chó Royal Cannin - dành riêng cho chó bug', '400000', '&lt;h1 style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 13px;&quot;&gt;&lt;span style=&quot;font-size:24px;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif;&quot;&gt;- Chế độ ăn uống lành mạnh được bào chế đặc biệt cho các giống chó&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- Giup chó con phát triển lành mạnh, đúng với size&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- Dinh dưỡng đầy đủ cho 1 bữa ăn&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- Rất đáng dồng tiền khi khách chọn sản phẩm này cho con ăn&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- Thương hiệu thức ăn thú cưng cao cấp thuộc tập đoàn dinh dưỡng Nestle&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- 100% sane xuất tại Uc với công nghệ hiện đại&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- Thức ăn cho chó con duy nhất có chứa sữa non giúp tăng cường miễn dịch&lt;/span&gt;&lt;/h1&gt;', '1655435335thuc-an-kho-cho-cho-2-1.jpg', 14, NULL, 50, 1),
(19, '62abf11c36d8d', 13, 30, 0, 'Thức ăn mèo Royal Cannin', '132000', '&lt;h1 style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 13px;&quot;&gt;&lt;span style=&quot;font-size:24px;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif;&quot;&gt;- Thức ăn khô cho mèo siêu cao cấp với công thức cân bằng và hoàn chỉnh dành cho giống mèo trưởng thành.&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- Dành cho tất cả giống mèo trên 12 tháng tuổi. Thể trọng từ 2kg – 10kg.&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;-&amp;nbsp;Công thức đặc biệt cao cấp dành cho các giống mèo trưởng thành&amp;nbsp;&lt;b style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;(đặc biệt trị bệnh tiết niệu ở mèo).&lt;/b&gt;&lt;br style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;&lt;b style=&quot;margin-bottom: 9px; padding: 0px; outline: 0px; color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- Trọng lượng:&lt;/b&gt;&amp;nbsp;1,5kg / gói&lt;/span&gt;&lt;/h1&gt;', '1655435548roy.jpg', 7, NULL, 9, 1),
(20, '62abf18aaa564', 13, 30, 0, 'Thức ăn cho mèo con  Reflex 1.5kg', '90000', '&lt;h1&gt;&lt;span style=&quot;font-size:24px;color: rgb(0, 0, 0); font-family: Arimo, sans-serif;&quot;&gt;- Sự kết hợp của các thành phần chất lượng cao đảm bảo dinh dưỡng cân bằng và đầy đủ, giúp mèo phát triển khỏe mạnh trong giai đoạn trưởng thành. Công thức sản phẩm chuyên biệt dựa trên hệ thống các lợi ích dinh dưỡng Vital 5, tập trung vào sự chăm sóc năm cơ quan quan trọng của mèo.&lt;/span&gt;&lt;/h1&gt;', '1655435658thuc-an-cho-meo-con-reflex-15kg-1.jpg', 5, NULL, 8, 1),
(21, '62abf1fd9b3d1', 13, 30, 0, 'Thức ăn cho mèo lớn Whiskas vi cá biển', '354000', '&lt;h1&gt;&lt;span style=&quot;font-size:24px;color: rgb(0, 0, 0); font-family: Arimo, sans-serif;&quot;&gt;- Sự kết hợp của các thành phần chất lượng cao đảm bảo dinh dưỡng cân bằng và đầy đủ, giúp mèo phát triển khỏe mạnh trong giai đoạn trưởng thành. Công thức sản phẩm chuyên biệt dựa trên hệ thống các lợi ích dinh dưỡng Vital 5, tập trung vào sự chăm sóc năm cơ quan quan trọng của mèo.&lt;/span&gt;&lt;/h1&gt;&lt;p&gt;&lt;span style=&quot;font-size:24px;color: rgb(0, 0, 0); font-family: Arimo, sans-serif;&quot;&gt;- Trọng lượng: 3kg/túi&lt;/span&gt;&lt;/p&gt;', '1655435773thuc-an-cho-meo-lon-whiskas-vi-ca-bien-tui-3kg-202105121515410083.jpg', 7, NULL, 1, 1),
(22, '62abf25624c40', 13, 30, 0, 'Thức ăn cho mèo Mimino Yum', '400000', '&lt;h1&gt;&lt;span style=&quot;font-size:24px;color: rgb(0, 0, 0); font-family: Arimo, sans-serif;&quot;&gt;- Sự kết hợp của các thành phần chất lượng cao đảm bảo dinh dưỡng cân bằng và đầy đủ, giúp mèo phát triển khỏe mạnh trong giai đoạn trưởng thành. Công thức sản phẩm chuyên biệt dựa trên hệ thống các lợi ích dinh dưỡng Vital 5, tập trung vào sự chăm sóc năm cơ quan quan trọng của mèo.&lt;/span&gt;&lt;/h1&gt;&lt;p&gt;&lt;span style=&quot;font-size:24px;color: rgb(0, 0, 0); font-family: Arimo, sans-serif;&quot;&gt;- Trọng lượng: 1.5kg&lt;/span&gt;&lt;/p&gt;', '1655435862thuc-an-cho-meo-minino-yum-3-min.jpg', 4, NULL, 0, 1),
(23, '62abf29046e2c', 13, 30, 0, 'Thức ăn cho mèo Apro IQ', '432000', '&lt;h1&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- Sự kết hợp của các thành phần chất lượng cao đảm bảo dinh dưỡng cân bằng và đầy đủ, giúp mèo phát triển khỏe mạnh trong giai đoạn trưởng thành. Công thức sản phẩm chuyên biệt dựa trên hệ thống các lợi ích dinh dưỡng Vital 5, tập trung vào sự chăm sóc năm cơ quan quan trọng của mèo.&lt;/span&gt;&lt;/h1&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arimo, sans-serif; font-size: 24px;&quot;&gt;- Trọng lượng: 2kg&lt;/span&gt;&lt;/p&gt;', '1655435920thuc-an-hat-cho-meo-apro-iq-cho-meo-5f6ad24275f70-23092020114242.jpg', 6, NULL, 0, 1),
(24, '62abf3223a611', 13, 31, 0, 'Ngũ cốc đặc biệt Anh Đức', '30000', '&lt;h1&gt;&lt;span style=&quot;font-size:24px;&quot;&gt;Cung cấp đầy đủ chất dinh dưỡng và vitamin giúp chim khỏe, đẹp, lông mỏ bóng mượt&lt;/span&gt;&lt;/h1&gt;', '16554360661a2ea7f279df080e8f44423d0fba8a08.jpg-600x600Q100.jpg', 4, NULL, 10, 1),
(25, '62abf43f00252', 14, 32, 0, 'Set trang phục cao bồi', '220000', '&lt;h1&gt;&lt;span style=&quot;font-size:24px;&quot;&gt;Trang phục cao bồi cho chó dành cho những bé cún tí hon và cả những bé cún khổng lồ. Trang phục được may chặt chẽ, tỉ mỉ, vái bông mềm mịn giúp các bé vận động thoải mái không bị gò bó&lt;/span&gt;&lt;/h1&gt;', '1655436350cho-cao-boi.jpg', 4, NULL, 2, 1),
(26, '62abf47ca71ca', 14, 32, 0, 'Set trang phục lịch lãm', '300000', '&lt;h1&gt;&lt;span style=&quot;font-size: 24px;&quot;&gt;Trang phục lịch lãm dành cho những bé cún tí hon và cả những bé cún khổng lồ. Trang phục được may chặt chẽ, tỉ mỉ, vái bông mềm mịn giúp các bé vận động thoải mái không bị gò bó&lt;/span&gt;&lt;/h1&gt;', '1655436412cho-lich-lam.jpg', 7, NULL, 14, 1),
(27, '62abf54e813f9', 14, 32, 0, 'Vòng cổ', '120000', '&lt;h1&gt;&lt;h1&gt;&lt;h1&gt;&lt;ul&gt;&lt;span style=&quot;font-size:24px;&quot;&gt;&lt;li style=&quot;font-size: 24px;&quot;&gt;- Vòng cổ cho chó bằng da đính cườm cao cấp với thiết kế nhỏ gọn, chất lượng tốt, chất liệu da mềm mại&lt;/li&gt;&lt;li style=&quot;font-size: 24px;&quot;&gt;- Sản phẩm được đính những hạt kim cương lấp lánh.&lt;/li&gt;&lt;li style=&quot;font-size: 24px;&quot;&gt;- Kiểu dáng thời trang sẽ giúp cho thú cưng nổi bật trong đám đông.&lt;/li&gt;&lt;/span&gt;&lt;/ul&gt;&lt;/h1&gt;&lt;/h1&gt;&lt;/h1&gt;', '1655436622vòng-cổ.jpg', 2, NULL, 6, 1),
(28, '62abf5c6da630', 14, 32, 0, 'Xích chó đáng yêu', '178000', '&lt;p style=&quot;margin-bottom: 1.3em; font-size: 16px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 24px; margin-bottom: 1.3em;&quot;&gt;&lt;span style=&quot;margin-bottom: 1.3em; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 24px;&quot;&gt;- Xích cho chó đai ngực cỡ mini Hand In Hand kèm dây dắt làm bằng nguyên liệu 100% nylon.&lt;br style=&quot;font-size:24px;margin-bottom: 1.3em; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;&quot;&gt;&lt;/span&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-family: Roboto, sans-serif; font-size: 24px;&quot;&gt;&lt;span style=&quot;font-size:24px;margin-bottom: 1.3em; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;&quot;&gt;- Thiết kế đơn giản mang phong cách cổ điển. Sử dụng sản phẩm này cho phép kiểm soát tự nhiên hơn và thoải mái hơn cho chú chó.&lt;br style=&quot;font-size: 24px;&quot;&gt;&lt;/span&gt;&lt;span style=&quot;font-size:24px;margin-bottom: 1.3em; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;&quot;&gt;- Dây dắt và xích có những sọc phản chiều giúp chú chó an toàn vào ban đêm.&lt;br style=&quot;font-size: 24px;&quot;&gt;&lt;/span&gt;&lt;span style=&quot;font-size:24px;margin-bottom: 1.3em; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;&quot;&gt;- Dây xích có khóa nhựa tác động cao.&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;font-size: 24px;&quot;&gt;&lt;span style=&quot;font-size:24px;margin-bottom: 1.3em; color: rgb(0, 0, 0); font-family: Roboto, sans-serif;&quot;&gt;Kích thước:số đo vòng ngực từ 22cm đến 33,50cm. Chiều dài 120cm, chiều rộng 0,8cm.&lt;/span&gt;&lt;/p&gt;&lt;/span&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-family: Roboto, sans-serif;&quot;&gt;&lt;/p&gt;&lt;/p&gt;', '1655436742xich-cho-cute.jpg', 5, NULL, 4, 1),
(29, '62abf64f5cbb3', 14, 33, 0, 'Balo cho mèo', '70000', '&lt;span style=&quot;font-size:24px;color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap;&quot;&gt;Chất liệu: nhựa cao cấp PVCBalo phi hành gia cho chó mèo là sản phẩm linh động cho khách hàng khi mang theo thú cưng của mình đi chơi....Balo phi hành gia có thiết kế thông minh, thông thoáng giúp cho thú cưng của bạn thoải mái và an toàn khi di chuyển. Vòm kính có thể thay thế bằng lưới nhựa và phù hợp với nhu cầu của bạn. Lưới nhựa tặng kèm ngay bên trong Balo phi hành gia mà bạn không cần phải mua thêm.&lt;/span&gt;', '1655436879Balo-phi-hanh-gia-cho-meo.jpg', 9, NULL, 2, 1),
(30, '62abf6aa5b311', 14, 33, 0, 'Set đồ Noel cho mèo', '255000', '&lt;p&gt;&lt;span style=&quot;color: rgb(107, 114, 128); font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, &amp;quot;Segoe UI&amp;quot;, Roboto, &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans&amp;quot;, sans-serif, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;, &amp;quot;Noto Color Emoji&amp;quot;; white-space: pre-wrap; font-size: 20px;&quot;&gt;Áo Quần Noel cho Chó Mèo &lt;br style=&quot;color: rgb(107, 114, 128); font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, &amp;quot;Segoe UI&amp;quot;, Roboto, &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans&amp;quot;, sans-serif, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;, &amp;quot;Noto Color Emoji&amp;quot;; white-space: pre-wrap; font-size: 20px;&quot;&gt;&lt;/span&gt;&lt;span style=&quot;font-size:20px;color: rgb(107, 114, 128); font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, &amp;quot;Segoe UI&amp;quot;, Roboto, &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans&amp;quot;, sans-serif, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;, &amp;quot;Noto Color Emoji&amp;quot;; white-space: pre-wrap;&quot;&gt;- Quần Áo Giáng Sinh Thú Cưng&lt;br style=&quot;font-size: 20px;&quot;&gt;&lt;/span&gt;&lt;span style=&quot;font-size:20px;color: rgb(107, 114, 128); font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, &amp;quot;Segoe UI&amp;quot;, Roboto, &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans&amp;quot;, sans-serif, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;, &amp;quot;Noto Color Emoji&amp;quot;; white-space: pre-wrap;&quot;&gt;-Quần Áo Noel cho các bé mèo (từ 0,5-14kg )&lt;br style=&quot;font-size: 20px;&quot;&gt;&lt;/span&gt;&lt;span style=&quot;font-size:20px;color: rgb(107, 114, 128); font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, &amp;quot;Segoe UI&amp;quot;, Roboto, &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans&amp;quot;, sans-serif, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;, &amp;quot;Noto Color Emoji&amp;quot;; white-space: pre-wrap;&quot;&gt;-Vải Tốt, Hút mồ hôi nhanh, thoáng, đường may sắc sảo, công phu, chắc chắn.&lt;br style=&quot;font-size: 20px;&quot;&gt;&lt;/span&gt;&lt;span style=&quot;font-size:20px;color: rgb(107, 114, 128); font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, &amp;quot;Segoe UI&amp;quot;, Roboto, &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans&amp;quot;, sans-serif, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;, &amp;quot;Noto Color Emoji&amp;quot;; white-space: pre-wrap;&quot;&gt;-Chụp hình ngày Noel cực kỳ đẹp khi phối đồ. &lt;/span&gt;&lt;/p&gt;', '1655436970set-noel.jpg', 11, NULL, 7, 1),
(31, '62abf7664be61', 14, 33, 0, 'Set kimono cho mèo', '132000', '&lt;span style=&quot;font-size:24px;&quot;&gt;Kimono cho mèo bao gồm:&lt;p style=&quot;font-size: 24px;&quot;&gt;- Áo tay dài may bằng vải hoa mềm mại, áo gài nút bấm phía trước&lt;/p&gt;&lt;p style=&quot;font-size: 24px;&quot;&gt;- Nơ may bằng vải phi bóng phía sau&lt;/p&gt;&lt;/span&gt;', '1655437158set-kimono-nhat-ban-cho-cho-meo-0.jpg', 15, NULL, 0, 1),
(32, '62abf80747115', 14, 33, 0, 'Lắc cổ cho mèo', '90000', '&lt;span style=&quot;font-size:24px;&quot;&gt;&lt;span style=&quot;font-size:24px;&quot;&gt;- Thiết kế nút gài phù hợp với mọi loài mèo&lt;/span&gt;&lt;p style=&quot;font-size: 24px;&quot;&gt;&lt;span style=&quot;font-size: 24px;&quot;&gt;- Chất liệu da + nhựa mềm không gây cảm giác khó chịu cho mèo&lt;/span&gt;&lt;/p&gt;&lt;/span&gt;&lt;p&gt;&lt;/p&gt;', '1655437319962e7a3a4b952e3996b783e5ae1f01a8.jpg', 5, NULL, 0, 1),
(33, '62abf878f226c', 14, 33, 0, 'Set khủng long cho mèo', '250000', '&lt;span style=&quot;font-size:24px;color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap;&quot;&gt;&lt;span style=&quot;color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap; font-size: 24px;&quot;&gt;Áo khủng long xanh, đáng iu, siêu cute dành cho thú cưng. Sản phẩm giúp thú cưng nhà bạn có 1 diện mạo hoàn toàn mới.&lt;/span&gt;&lt;p style=&quot;font-size: 24px;&quot;&gt;&lt;span style=&quot;color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap; font-size: 24px;&quot;&gt;- Sản phẩm được thiết kế với hình dáng chú khủng long đáng yêu, nhiều màu sắc bắt mắt giúp thú cưng của bạn thêm đáng yêu, đặc biệt giúp bạn dễ dàng nhận ra thú cưng của mình khi trời mưa hoặc tối trời.- Bên cạnh đó, sử dụng áo khủng long còn giúp giữ ấm, giúp bảo vệ sức khỏe của thú cưng, hỗ trợ làm giảm các vấn đề về sức khỏe do nhiễm lạnh hay do dầm mưa gây nên.&lt;/span&gt;&lt;/p&gt;&lt;/span&gt;&lt;p&gt;&lt;span style=&quot;color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;', '1655437432set-khung-long-cho-meo.jpg', 7, NULL, 18, 1),
(34, '62abf8c3f0fa9', 14, 33, 0, 'Set đồ thời trang cho mèo', '132000', '&lt;span style=&quot;font-size:24px;color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap;&quot;&gt;- Sản phẩm được thiết kế với nhiều màu sắc bắt mắt giúp thú cưng của bạn thêm đáng yêu, đặc biệt giúp bạn dễ dàng nhận ra thú cưng của mình khi trời mưa hoặc tối trời.- Bên cạnh đó, sử dụng set đồ còn giúp giữ ấm, giúp bảo vệ sức khỏe của thú cưng, hỗ trợ làm giảm các vấn đề về sức khỏe do nhiễm lạnh hay do dầm mưa gây nên.&lt;/span&gt;', '1655437507set-quan-ao-cho-meo.jpg', 4, NULL, 0, 1),
(35, '62abf933e137b', 14, 34, 0, 'Lồng chim', '90000', '&lt;span style=&quot;font-size:24px;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, sans-serif;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, sans-serif; font-size: 24px;&quot;&gt;- KÍCH THƯỚC: Dài 100 Cm x Rộng 50 Cm x Cao 47 Cm&lt;/span&gt;&lt;br style=&quot;font-size: 24px;&quot;&gt;- TRỌNG LƯỢNG : 3 Kg – 3,2 Kg&lt;br style=&quot;font-size: 24px;&quot;&gt;- MẪU LỒNG: Nan mau chống chuột&lt;/span&gt;&lt;br&gt;', '1655437619long-chim-inox-cao.jpg', 3, NULL, 0, 1),
(36, '62abf9c5445f4', 14, 34, 0, 'Bể cá mini', '240000', '&lt;span style=&quot;font-size:20px;color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap;&quot;&gt;&lt;span style=&quot;color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap; font-size: 20px;&quot;&gt;- Chất liệu bể nhựa ABS + nắp&lt;/span&gt;&lt;p style=&quot;font-size: 20px;&quot;&gt;&lt;span style=&quot;font-size: 20px; color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap;&quot;&gt;- Máy bơm nước siêu tĩnh 160L/h&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;font-size: 20px;&quot;&gt;&lt;span style=&quot;font-size: 20px; color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap;&quot;&gt;- 1 bể chính + 1 bể lọc phụ phía dưới&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;font-size: 20px;&quot;&gt;&lt;span style=&quot;font-size: 20px; color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap;&quot;&gt;- Kích thước : dài 14.5cm rộng 8cm cao 16cm(kích thước có thể sai lệch 1 chút do đo thủ công)&lt;/span&gt;&lt;/p&gt;&lt;/span&gt;&lt;p&gt;&lt;/p&gt;', '1655437765be-ca-mini-danh-cho-ca-beta-gex-easy-aqua-tank-3.jpg', 4, NULL, 45, 1),
(37, '62abfa19949a2', 14, 34, 0, 'Bể Cá Mini Cung Trăng 16 Cỡ To', '99000', '&lt;span style=&quot;font-size:20px;color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap;&quot;&gt;&lt;span style=&quot;color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap; font-size: 20px;&quot;&gt;Bể Cá Mini Phong Thủy Cung Trăng 16 Cỡ To bao gồm:                                                                                                                                                                                                                                                                                                                                         ➡ Giá treo đơn hình cung trăng cao 28cm&lt;/span&gt;&lt;p style=&quot;font-size: 20px;&quot;&gt;&lt;span style=&quot;color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap; font-size: 20px;&quot;&gt;➡ 01 bình thủy tinh treo hình tròn đường kính 16cm&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;font-size: 20px;&quot;&gt;&lt;span style=&quot;font-size: 20px; color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap;&quot;&gt;&lt;span style=&quot;color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap; font-size: 20px;&quot;&gt;➡ Tặng kèm 1 cây trang trí bằng nhựa ( MÀU SẮC NGẪU NHIÊN), 1 gói sỏi trắng. &lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;font-size: 20px;&quot;&gt;&lt;span style=&quot;color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap; font-size: 20px;&quot;&gt;BỂ CÁ MINI CHERRY LÀ VẬT DỤNG TRANG TRÍ VÔ CÙNG HỮU DỤNG&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;font-size: 20px;&quot;&gt;&lt;span style=&quot;color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap; font-size: 20px;&quot;&gt;➡ Bạn có thể trưng bày trang trí bể cá mini phong thủy tại bàn làm việc của bạn, trang trí bàn phòng khách, phòng ăn, bệ cửa sổ, quầy ba ....&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;font-size: 20px;&quot;&gt;&lt;span style=&quot;color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap; font-size: 20px;&quot;&gt;➡ Bạn có thể ngắm nhìn chú cá để giải tỏa tâm trạng sau mỗi giờ làm việc mệt mỏi.&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;font-size: 20px;&quot;&gt;&lt;/p&gt;&lt;/span&gt;&lt;p&gt;&lt;span style=&quot;color: rgba(0, 0, 0, 0.8); font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, 文泉驛正黑, &amp;quot;WenQuanYi Zen Hei&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;儷黑 Pro&amp;quot;, &amp;quot;LiHei Pro&amp;quot;, &amp;quot;Heiti TC&amp;quot;, 微軟正黑體, &amp;quot;Microsoft JhengHei UI&amp;quot;, &amp;quot;Microsoft JhengHei&amp;quot;, sans-serif; white-space: pre-wrap;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', '165543784932ea0ede1d1dec6a5a69fc6126896ce5.jpg', 2, NULL, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_cart`
--

CREATE TABLE `product_cart` (
  `s_no` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product_cart`
--

INSERT INTO `product_cart` (`s_no`, `p_id`, `user_id`, `qty`) VALUES
(93, 27, 2, 2),
(94, 20, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_cat_id` int(11) NOT NULL,
  `sub_cat_title` varchar(100) COLLATE utf8_bin NOT NULL,
  `cat_parent` int(11) NOT NULL,
  `cat_products` int(11) NOT NULL DEFAULT 0,
  `show_in_header` tinyint(4) NOT NULL DEFAULT 1,
  `show_in_footer` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_cat_id`, `sub_cat_title`, `cat_parent`, `cat_products`, `show_in_header`, `show_in_footer`) VALUES
(18, 'Mobiles', 9, 0, 0, 1),
(19, 'Máy tính', 9, 0, 0, 0),
(20, 'Speakers', 9, 0, 0, 0),
(21, 'Máy ảnh', 9, 0, 0, 0),
(22, 'Kitchen', 12, 0, 0, 0),
(23, 'Tableware', 12, 0, 0, 1),
(24, 'Living Room', 12, 0, 0, 1),
(25, 'Beds', 12, 0, 0, 1),
(26, 'Men\'s T-Shirts', 10, 0, 0, 1),
(27, 'Kurti\'s', 11, 0, 0, 1),
(28, 'Sarees', 11, 0, 0, 1),
(29, 'Đồ ăn cho chó', 13, 4, 1, 0),
(30, 'Đồ ăn cho mèo', 13, 5, 1, 0),
(31, 'Đồ ăn khác', 13, 1, 1, 0),
(32, 'Phụ kiện cho chó', 14, 4, 1, 0),
(33, 'Phụ kiện cho mèo', 14, 6, 1, 0),
(34, 'Phụ kiện khác', 14, 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `f_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `l_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `mobile` varchar(15) COLLATE utf8_bin NOT NULL,
  `address` mediumtext COLLATE utf8_bin NOT NULL,
  `city` mediumtext COLLATE utf8_bin NOT NULL,
  `user_role` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `f_name`, `l_name`, `username`, `email`, `password`, `mobile`, `address`, `city`, `user_role`) VALUES
(2, 'user12', 'user', 'user@gmail.com', '', '24c9e15e52afc47c225b757e7bee1f9d', '9856231042', '#1234', 'delhi', 1),
(3, 'user2', 'user last', 'user2@gmail.com', '', '7e58d63b60197ceb55a1c487989a3720', '9999999999', '#kdjfg s gfd gdfjgkdsf gsdfkgjk', 'Delhi', 1),
(4, 'user3', 'user last', 'user3@gmail.com', '', '92877af70a45fd6a2ed7fe81e1236b78', '9999999999', '#hsd sdfsd fs df asdf', 'dsf asdf a', 1),
(5, 'user testing', 'user last', 'user4@gmail.com', '', '3f02ebe3d7929b091e3d8ccfde2f3bc6', '999999999', '#dsjg sdf sd f', 'dskfs f aslkf', 1),
(6, 'sadsadsa', 'sdsadsa', 'hh@gmail.com', '', '5e36941b3d856737e81516acd45edc50', '999999999', 'dsfsd fs', 'sdf a', 1),
(7, 'dsf sdfsd safasd', 'sdd fsdfsadf', 'user5@gmail.com', '', '0a791842f52a0acfbb3a783378c066b8', '9999999999', 'dsf adfasd', 'dsafsadf', 1),
(10, 'sfnsdfbsd', 'sdfasdfsa', 'useryusdfnds@gmail.com', '', 'ba407c68e2448c005ee7459f89dd3e63', '9999999999', '#d dsfh', 'dsfdsf', 1),
(11, 's ds ad', 'sad sad', 'rti@gmail.com', '', '620dc68bbfc5d7654e44817a8d3b2cdf', '9999999999', '#fg', 'adsad', 1),
(12, 's ds ad', 'sad sad', 'rtis@gmail.com', '', '620dc68bbfc5d7654e44817a8d3b2cdf', '9999999999', '#fg', 'adsad', 1),
(13, 's ds ad', 'sad sad', 'rtisf@gmail.com', '', '620dc68bbfc5d7654e44817a8d3b2cdf', '9999999999', '#fg', 'adsad', 1),
(14, 'final user', 'user last', 'userf@gmail.com', '', 'add5092c13fbcc5cceaf1fdb98411871', '9999999999', 'lcnsd', 'dsfs df', 1),
(15, 'Bùi', 'Huy', 'mua@gmail.com', '', 'fcea920f7412b5da7be0cf42b8c93759', '0123456789', 'Hà Nội', 'Việt Nam', 1),
(16, 'Nguyễn', 'A', 'hu@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', '0123456789', 'Hà Bái', 'Việt Nam', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_cart`
--
ALTER TABLE `product_cart`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_cart`
--
ALTER TABLE `product_cart`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
