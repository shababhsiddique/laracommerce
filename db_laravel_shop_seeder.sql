-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2018 at 08:06 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laravel_shop`
--

-- --------------------------------------------------------

--
-- Dumping data for table `brands`
--

TRUNCATE `brands`;

INSERT INTO `brands` (`brand_title`, `brand_description`, `publication_status`, `deletion_status`, `created_at`, `updated_at`) VALUES
('Samsung', 'Samsung International', 1, 0, '2018-02-27 22:49:02', NULL),
('Walton', '<p>Walton Bangladesh Limited</p>', 1, 0, '2018-02-27 22:49:02', '2018-02-27 23:19:12'),
('Dholai Khal', 'Dholai Khal maney Quality Ponno', 1, 1, '2018-02-27 22:49:02', NULL),
('Xiaomi', '<p>you me xiaomi</p>', 1, 0, '2018-02-27 23:04:24', '2018-02-27 23:04:24'),
('Razer', '<p>Gaming Items Manufacturer</p>', 1, 0, '2018-02-27 23:04:33', '2018-02-27 23:04:33');

-- --------------------------------------------------------

--
-- Dumping data for table `categories`
--

TRUNCATE `categories`;

INSERT INTO `categories` (`category_title`, `category_description`, `publication_status`, `deletion_status`, `created_at`, `updated_at`) VALUES
('Home Appliances', 'Electronics for the home', 1, 0, '2018-02-27 22:49:02', NULL),
('Computer Accessories', 'Computer Peripherals and accessories', 1, 0, '2018-02-27 22:49:02', NULL),
('Mobile Devices', 'Mobile and Tablet Devices', 1, 0, '2018-02-27 22:49:02', NULL),
('Healthcare', 'Healthcare Items', 1, 0, '2018-02-27 22:49:02', NULL),
('Gaming', 'Gaming Items', 1, 0, '2018-02-27 22:49:02', NULL),
('Test', 'setasdfa', 1, 1, '2018-02-27 23:01:50', '2018-02-27 23:02:14');

-- --------------------------------------------------------

--
-- Dumping data for table `products`
--

TRUNCATE `products`;

INSERT INTO `products` (`product_title`, `product_image`, `product_slug`, `product_teaser`, `product_description`, `category_id`, `brand_id`, `product_model`, `product_options`, `product_quantity`, `product_price`, `product_minimum_order`, `product_reorder_level`, `popular_status`, `featured_status`, `publication_status`, `deletion_status`, `created_at`, `updated_at`) VALUES
('Walton Grill', 'public/images/products/pimg_5a9634c5c43d8_walton_grill.jpeg', 'walton-grill', 'Mini Grill', '<p>Grill for use with stove, brought to you by walton. Enjoy BarbQ at your home</p>', 1, 2, 'WG-557', NULL, '5', '2000', '1', '1', 0, 0, 1, 0, '2018-02-27 22:49:09', '2018-02-27 22:49:09'),
('Xiaomi Mi A1 ROM 32GB RAM 4GB', 'public/images/products/pimg_5a96356ea1f68_xiaomi_mi_a1_rom_32gb_ram_4gb.jpeg', 'xiaomi-mi-a1-rom-32gb-ram-4gb', 'Made by xiaomi, powered by google', '<p><strong>Xiaomi Mi A1 Mobile Phone</strong></p>\r\n\r\n<ul>\r\n	<li>OS: Android 7.1.2 (Nougat), planned upgrade to Android 8.0 (Oreo)</li>\r\n	<li>SIM: Hybrid Dual SIM (Nano-SIM, dual stand-by)</li>\r\n	<li>Processor: Octa-core 2.0 GHz Cortex-A53</li>\r\n	<li>Chipset: Qualcomm MSM8953 Snapdragon 625</li>\r\n	<li>GPU: Adreno 506</li>\r\n	<li>Display: 5.5 inch (diagonal) LTPS FHD display</li>\r\n	<li>Resolution: 1080 x 1920 pixels (~403 PPI pixel density)</li>\r\n	<li>Memory: ROM 32GB, RAM 4GB</li>\r\n	<li>Rear Camera: Dual 12 MP (26mm, f/2.2; 50mm, f/2.6), phase detection autofocus, 2x optical zoom, dual-LED (dual tone) flash</li>\r\n	<li>Front Camera: 5 MP, 1080p</li>\r\n	<li>Video: 4K / 1080p / 720p video, 30 fps; 720p slow-mo video, 120 fps</li>\r\n	<li>Sensors: Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass</li>\r\n	<li>GPS Navigation: GPS; AGPS; GLONASS; BEIDOU</li>\r\n	<li>Connectivity &amp; Wireless: 3-choose-2; Nano SIM/MicroSD; Supports 802.11a/b/g/n/ac protocols; Supports 2.4/5G WiFi / WIFI Direct / WiFi Display; Supports Bluetooth 4.2/HID</li>\r\n	<li>4G: Supports VoLTE/4G/3G/2G on compatible networks</li>\r\n	<li>Battery: Non-removable Li-Ion 3080 mAh battery</li>\r\n</ul>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>WARRANTY:</strong></p>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p><strong>Item</strong></p>\r\n			</td>\r\n			<td>\r\n			<p><strong>Warranty Period</strong></p>\r\n			</td>\r\n			<td>\r\n			<p><strong>Scope of Warranty</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Handset Hardware</p>\r\n			</td>\r\n			<td>\r\n			<p>1 year</p>\r\n			</td>\r\n			<td>\r\n			<p>Labor and parts</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Xiaomi original battery, adapter&nbsp;and&nbsp;other accessories packaged</p>\r\n			</td>\r\n			<td>\r\n			<p>6 month</p>\r\n			</td>\r\n			<td>\r\n			<p>Labor and parts</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Service Warranty</p>\r\n			</td>\r\n			<td>\r\n			<p>2 Years</p>\r\n			</td>\r\n			<td>\r\n			<p>Labor and Software</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 3, 4, 'Mi A1 32GB', 'Black, White', '10', '21000', '1', '2', 0, 1, 1, 0, '2018-02-27 22:51:58', '2018-02-27 23:04:49'),
('Razer Black Widow Chroma', 'public/images/products/pimg_5a96384d75878_razer_black_widow.png', 'razer-black-widow', 'best gaming keyboard', '<p>best gaming keyboard.&nbsp;best gaming keyboard.&nbsp;best gaming keyboard.&nbsp;best gaming keyboard.&nbsp;</p>', 5, 5, 'BWChromaV2', 'Red, Blue LED', '5', '7000', '1', '1', 0, 0, 1, 0, '2018-02-27 23:04:13', '2018-02-27 23:29:12'),
('adsfasdf', 'public/images/products/pimg_5a963e8d9b2d0_adsfasdf.jpeg', 'adfa-afd', 'asdf', '<p>asdfasdfasdf</p>', 1, 1, 'asdf', 'asdf', '1', '123', '1', '1', 0, 0, 0, 1, '2018-02-27 23:30:53', '2018-02-28 00:31:46'),
('Blood Glucose Meter', 'public/images/products/pimg_5a96405fd8d89_blood_glucose_meter.jpeg', 'blood-glucose-meter', 'Used to measure blood glucose.Used to measure bloo', '<p>Every Diabetes patient should own a meter to avoid accidents</p>', 4, 4, 'na', 'na', '5', '1000', '1', '1', 0, 1, 1, 0, '2018-02-27 23:38:39', '2018-02-27 23:54:02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
