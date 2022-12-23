-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 Ara 2022, 19:40:08
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `eticaretdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_uid` varchar(30) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_uid`, `admin_password`) VALUES
(1, 'Umutcan', '$2y$10$WjZ7UbWvx..4JmeFMG5fXOaFlgKoKVj2lF1iz969u2Xp9ZX6fyvLm');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `contact_tel` varchar(20) NOT NULL,
  `contact_message` varchar(1000) NOT NULL,
  `userUid` varchar(20) NOT NULL,
  `contact_date` date NOT NULL,
  `contact_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_email`, `contact_tel`, `contact_message`, `userUid`, `contact_date`, `contact_answer`) VALUES
(1, 'Umutcan Güncü', 'umutcangs62@gmail.com', '05316148962', 'Çok GÜzel site', 'Admin', '2022-12-01', 'Teşekkürler'),
(2, 'Umutcan Güncü', 'umutcangs62@gmail.com', '05316148962', 'Sitenizden Alışveriş Yapamıyorum', 'Admin', '2022-12-03', 'Lütfen Ayrıntı Veriniz');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(8,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin5 COLLATE=latin5_turkish_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(1, '2274.00', 'Kargoya Verildi', 1, '2147483647', 'Bursa', 'Yenimahalle Devrengeç Caddesi No 9/b Daire 8', '2022-11-29 12:59:17'),
(2, '1599.00', 'Kargoya Verildi', 1, '2147483647', 'Bursa', 'deneme', '2022-11-29 13:04:56'),
(3, '1599.00', 'Kargoya Verildi', 1, '2147483647', 'Bursa', 'dddd', '2022-11-29 13:07:58'),
(5, '2700.00', 'Kargoya Verildi', 1, '2147483647', 'Bursa', 'aliii', '2022-11-29 13:10:34'),
(6, '9999.99', 'Kargoya Verildi', 1, '2147483647', 'Bursa', 'dasdsasad', '2022-11-29 13:12:49'),
(7, '9999.99', 'Kargoya Verildi', 1, '2147483647', 'Bursa', 'kjjkhkjh', '2022-11-29 13:16:54'),
(8, '9999.99', 'Kargoya Verildi', 1, '2147483647', 'Yildirim', 'Atatürk Caddesi', '2022-11-29 13:19:35'),
(9, '4797.00', 'Kargoya Verildi', 2, '2147483647', 'Bursa', 'deneme', '2022-12-01 16:28:05'),
(11, '42518.00', 'Kargoya Verildi', 2, '2147483647', 'Bursa', 'Mehmet Akif Ersoy Mahallesi', '2022-12-01 19:50:04'),
(12, '30795.00', 'Kargoya Verildi', 2, '2147483647', 'Bursa', 'Bursa', '2022-12-05 17:13:29'),
(13, '1499.00', 'Kargoya Verildi', 1, '0', 'Tunceli', 'Yenimahalle', '2022-12-23 19:02:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin5 COLLATE=latin5_turkish_ci;

--
-- Tablo döküm verisi `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 1, '2', 'DESENLİ DERİ MİNİ TOTE ÇANTA', 'images/b2.jpg', '1599.00', 1, 1, '2022-11-29 12:59:17'),
(2, 1, '1', 'Bershka Zincir Askılı Kapitone Çanta', 'images/b1.jpg', '675.00', 1, 1, '2022-11-29 12:59:17'),
(3, 2, '2', 'DESENLİ DERİ MİNİ TOTE ÇANTA', 'images/b2.jpg', '1599.00', 1, 1, '2022-11-29 13:04:56'),
(4, 3, '2', 'DESENLİ DERİ MİNİ TOTE ÇANTA', 'images/b2.jpg', '1599.00', 1, 1, '2022-11-29 13:07:58'),
(5, 4, '2', 'DESENLİ DERİ MİNİ TOTE ÇANTA', 'images/b2.jpg', '1599.00', 2, 1, '2022-11-29 13:08:53'),
(6, 5, '1', 'Bershka Zincir Askılı Kapitone Çanta', 'images/b1.jpg', '675.00', 4, 1, '2022-11-29 13:10:34'),
(7, 6, '1', 'Bershka Zincir Askılı Kapitone Çanta', 'images/b1.jpg', '675.00', 15, 1, '2022-11-29 13:12:49'),
(8, 7, '2', 'DESENLİ DERİ MİNİ TOTE ÇANTA', 'images/b2.jpg', '1599.00', 8, 1, '2022-11-29 13:16:54'),
(9, 8, '2', 'DESENLİ DERİ MİNİ TOTE ÇANTA', 'images/b2.jpg', '1599.00', 10, 1, '2022-11-29 13:19:35'),
(10, 8, '1', 'Bershka Zincir Askılı Kapitone Çanta', 'images/b1.jpg', '675.00', 10, 1, '2022-11-29 13:19:35'),
(11, 9, '2', 'DESENLİ DERİ MİNİ TOTE ÇANTA', 'images/b2.jpg', '1599.00', 3, 2, '2022-12-01 16:28:05'),
(15, 11, '2', 'DESENLİ DERİ MİNİ TOTE ÇANTA', 'images/b2.jpg', '1599.00', 3, 2, '2022-12-01 19:50:04'),
(16, 11, '5', 'Gucci Kadın Siyah Çanta', 'images/gucci1.jpg', '11599.00', 3, 2, '2022-12-01 19:50:04'),
(17, 11, '1', 'Bershka Zincir Askılı Kapitone Çanta', 'images/b1.jpg', '675.00', 3, 2, '2022-12-01 19:50:04'),
(18, 11, '4', 'Puma Turkuaz Çanta', 'images/featured2.jpeg', '899.00', 1, 2, '2022-12-01 19:50:04'),
(19, 12, '9', 'Balenciaga Siyah Sırt Çanta', 'images/g1.jpg', '5999.00', 1, 2, '2022-12-05 17:13:29'),
(20, 12, '6', 'PARLAK TAŞLI CLUTCH ÇANTA', 'images/zara1.jpg', '799.00', 2, 2, '2022-12-05 17:13:29'),
(21, 12, '5', 'Gucci Kadın Siyah Çanta', 'images/gucci1.jpg', '11599.00', 2, 2, '2022-12-05 17:13:29'),
(22, 13, '2', 'DESENLİ DERİ MİNİ TOTE ÇANTA', 'images/b2.jpg', '1499.00', 1, 1, '2022-12-23 19:02:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `product_color` varchar(100) NOT NULL,
  `product_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5 COLLATE=latin5_turkish_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_price`, `product_color`, `product_stock`) VALUES
(1, 'Bershka Zincir Askılı Kapitone Çanta', 'Bag', 'Zincir askılı kapitone çanta', 'images/b1.jpg', '675.00', 'Mavi', 7),
(2, 'DESENLİ DERİ MİNİ TOTE ÇANTA', 'Bag', 'Kabartmalı desenli mini deri tote çanta. Omuz askılı. Astarlı. Mıknatıslı klipsli.\r\n', 'images/b2.jpg', '1499.00', 'Brown', 11),
(4, 'Puma Turkuaz Çanta', 'Bag', 'Puma marka turkuaz çanta', 'images/featured2.jpeg', '899.90', 'Turkuaz', 19),
(5, 'Gucci Kadın Siyah Çanta', 'Bag', 'Omuz askılı, %100 pamuk, siyah renkli, 25 x 13 x 07 cm boyutlarında kadın çantası', 'images/gucci1.jpg', '11599.00', 'Siyah', 34),
(6, 'PARLAK TAŞLI CLUTCH ÇANTA', 'Bag', 'Parlak taşlı sert sekizgen clutch çanta. Uzun metal çapraz askılı. Mıknatıslı klipsli.', 'images/zara1.jpg', '799.00', 'Gray', 8),
(9, 'Balenciaga Siyah Sırt Çanta', 'Bag', 'İnek derisinden özel olarak üretilmiş kullanışlı sırt çantası', 'images/g1.jpg', '5999.00', 'Siyah', 29);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `userUid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5 COLLATE=latin5_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `userUid`) VALUES
(1, 'Umutcan Güncü', 'umutcangs62@gmail.com', '$2y$10$BhDs.3ERcRfYiacaXOC79uvaMmWSihnXBcluw27OBg/eXiEN6LF/G', 'canguncu16'),
(2, 'Aydın Güncü', 'umutcanguncu16@gmail.com', '$2y$10$BhDs.3ERcRfYiacaXOC79uvaMmWSihnXBcluw27OBg/eXiEN6LF/G', 'Admin');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Tablo için indeksler `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
