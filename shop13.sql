-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 12 2024 г., 11:16
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop13`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin-user`
--

CREATE TABLE `admin-user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created-at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin-user`
--

INSERT INTO `admin-user` (`id`, `name`, `email`, `image`, `phone`, `password`, `created-at`) VALUES
(1, 'dia', 'dia@fhks.ru', 'images/admin/0d30c1d0a44a8a26524ec6ba91.jpg', '222111', 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-03-21 23:26:25'),
(2, 'tom', 'tom55@mail.ru', 'images/admin/avatar1f3352a1c16e049f5da3004058452e9a.jpeg', '11111', 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-03-21 23:27:09'),
(3, 'lia', 'lia342@sdja.ad', 'images/admin/CYWk.gif', '123', 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-03-21 23:27:37');

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `creatrd-at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `creatrd-at`) VALUES
(1, 1, 7, 1, '2024-04-04 16:47:27');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `created_at`) VALUES
(1, 'ТОП ТРЕНДОВЫЕ КОЛЛЕКЦИИ', 'ТОП ТРЕНДОВЫЕ КОЛЛЕКЦИИ', 'Gold', 0, 1, '1711698704.jpg', 'Ювелирные украшения 2024.  Пять главных трендов. ', 'Стиль и мода переживает период эволюции. Минимализм и богемность - по прежнему основа, но в новом прочтении. Меняется атмосфера. Стремление к сиянию, блеску и правильной энергии - счастливой. Мы носим украшения с единственной главной целью – чтобы они нас украшали. Образ выглядит незавершенным без украшений. Придайте себе статусности, стиля, легкости и уверенности в себе с помощью правильных аксессуаров, которые будут в тренде в новом сезоне.\r\n', '2024-03-24 17:54:14'),
(3, 'ВСЁ ДЛЯ ЖЕНЩИН', 'ДЛЯ ЖЕНЩИН', '   украшения для красивых женщин', 0, 1, '1711699305.jpg', 'украшения для красивых женщин    ', 'украшения для красивых женщин', '2024-03-24 18:12:17'),
(4, 'ВСЁ ДЛЯ МУЖЧИН', 'ДЛЯ МУЖЧИН', ' ВСЁ ДЛЯ МУЖЧИН', 0, 1, '1711699269.jpg', 'Жесткие   ', 'Коллекция  ДЛЯ МУЖЧИН', '2024-03-24 18:14:51'),
(5, ' ВСЁ ДЛЯ ДЕТЕЙ', 'ДЛЯ ДЕТЕЙ', '    ВСЁ ДЛЯ ДЕТЕЙ', 0, 1, '1711699224.jpg', 'ВСЁ ДЛЯ ДЕТЕЙ ', 'ВСЁ ДЛЯ ДЕТЕЙ', '2024-03-24 18:17:05'),
(6, 'НОВИНКИ', 'НОВИНКИ', '   НОВИНКИ', 0, 1, '1711700104.jpg', 'НОВИНКИ ', 'НОВИНКИ', '2024-03-24 18:19:06'),
(7, 'ВСЕ ДЛЯ СВАДЬБЫ', ' ДЛЯ СВАДЬБЫ', ' ВСЕ ДЛЯ СВАДЬБЫ', 0, 1, '1711700202.jpg', 'ВСЕ ДЛЯ СВАДЬБЫ  ', 'ВСЕ ДЛЯ СВАДЬБЫ', '2024-03-24 18:21:55'),
(8, 'КОЛЬЦА', 'КОЛЬЦА', '    Комбинируемые кольца', 0, 1, '1711700321.jpg', 'Комбинируемые    ', 'С комбинируемыми украшениями — лучше больше да лучше. От броских колец с бриллиантами и обручальных колец до колец из желтого и розового золота 18 карат — количество комбинаций не ограничено.', '2024-03-24 18:25:01'),
(11, 'БРАСЛЕТЫ', 'БРАСЛЕТЫ', 'БРАСЛЕТЫ', 0, 1, '1711700588.jpg', 'БРАСЛЕТЫ ', 'БРАСЛЕТЫ', '2024-03-24 18:38:36'),
(13, 'ЧАСЫ', 'ЧАСЫ', 'ЧАСЫ', 0, 1, '1711700655.jpg', 'ЧАСЫ ', 'ЧАСЫ', '2024-03-24 18:41:47');

-- --------------------------------------------------------

--
-- Структура таблицы `orderItems`
--

CREATE TABLE `orderItems` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cardnumber` tinyint(255) NOT NULL,
  `expmonth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cvv` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `price`, `selling_price`, `image`, `qty`, `status`, `trending`, `created_at`) VALUES
(7, 1, 'Серьги         ', 'ТОП ТРЕНДОВЫЕ КОЛЛЕКЦИИ', 'белое золото 585 пробы', 'Милые сережки из белого золота 585 пробы', 48000, 45999, '1711704357.jpg     ', 4, 0, 1, '2024-03-28 10:27:34'),
(8, 1, 'Кольцо из  золота   ', 'ТОП ТРЕНДОВЫЕ КОЛЛЕКЦИИ ', 'чистота камня 7/9 А (цвет, качество) - 43шт.', 'Примерный вес  - 3,72г', 47000, 45999, '1711704718.jpg  ', 5, 0, 1, '2024-03-28 10:30:18'),
(9, 1, 'Золотое кольцо  ', 'ТОП ТРЕНДОВЫЕ КОЛЛЕКЦИИ', 'чистота камня 2/3А', 'Примерный вес  - для размера 18 - 3,08г', 28000, 26999, '1711704856.jpg  ', 1, 0, 1, '2024-03-28 10:33:56'),
(10, 1, ' обручальные кольца с бриллиантами ', 'ТОП ТРЕНДОВЫЕ КОЛЛЕКЦИИ', ' бриллиант - 10шт. в 17 граней - 0,046К, чистота камня 2/3А', 'Примерный вес  - для размера 18 - 3,08г\r\nПримерный вес  - для размера 18 - 3408г', 88000, 86999, '1711705005.jpg ', 1, 0, 1, '2024-03-28 10:52:11'),
(11, 1, 'комплект для женщин ', 'ТОП ТРЕНДОВЫЕ КОЛЛЕКЦИИ', '3,6 см высотой 6 цветов кристалл  для женщин', '3,6 см высотой 6 цветов кристалл ', 150000, 139999, '1711705182.jpg ', 2, 0, 1, '2024-03-28 11:51:29'),
(12, 3, 'Серьги с подвесками ', 'ДЛЯ ЖЕНЩИН', '3,6 см высотой 6  для женщин', '3,6 см высотой  для женщин', 150000, 139999, '1711705757.jpg ', 2, 0, 1, '2024-03-28 11:54:56'),
(13, 1, 'КОЛЬЦО', 'ТОП ТРЕНДОВЫЕ КОЛЛЕКЦИИ', 'Золото', 'Золотое кольцо с топазом Sky и фианитами с родированием', 45000, 43000, 'top2.jpg', 5, 0, 1, '2024-03-29 09:14:33'),
(14, 3, 'украшение на шею', 'ДЛЯ ЖЕНЩИН', 'украшение на шею', 'украшение на шею', 54000, 53000, 'women2.jpg', 2, 0, 1, '2024-03-29 09:54:23'),
(15, 3, 'СЕРЬГИ', 'ДЛЯ ЖЕНЩИН', 'СЕРЬГИ ДЛЯ ЖЕНЩИН', 'СЕРЬГИ ДЛЯ ЖЕНЩИН', 12000, 9850, 'women3.jpg', 2, 0, 0, '2024-03-29 10:03:10'),
(16, 3, 'Женские наручные часы', 'ДЛЯ ЖЕНЩИН', 'Женские наручные часы', 'Женские наручные часы', 112000, 100000, 'women4.jpg', 5, 0, 1, '2024-03-29 10:07:04'),
(17, 3, 'Цепь из белого золота,', 'ДЛЯ ЖЕНЩИН', 'Цепь из белого золота,', 'Цепь из белого золота,', 120000, 95000, 'women5.jpg', 5, 0, 1, '2024-03-29 10:10:29'),
(18, 3, 'Золотое кольцо с топазом', 'ДЛЯ ЖЕНЩИН', 'Золотое кольцо с топазом', 'Золотое кольцо с топазом', 95000, 48000, 'women6.jpg', 3, 0, 1, '2024-03-29 10:11:40'),
(19, 3, 'Золотое кольцо с топазом', 'ДЛЯ ЖЕНЩИН', 'Золотое кольцо с топазом', 'Золотое кольцо с топазом', 10000, 3500, '48ae8374-4b77-4609-82dd-db99137d8ba4.jpg', 1, 0, 1, '2024-03-29 10:15:28'),
(20, 4, 'Мужские наручные часы', 'ДЛЯ МУЖЧИН', 'Мужские наручные часы', 'Мужские наручные часы', 25000, 20000, 'men1.jpg', 5, 0, 1, '2024-03-29 10:48:32'),
(21, 4, 'Мужские наручные часы', 'ДЛЯ МУЖЧИН', 'Мужские наручные часы', 'Мужские наручные часы', 65000, 52000, 'men5.jpg', 2, 0, 1, '2024-03-29 10:49:16'),
(22, 4, 'золотая цепочка с крестиком', 'ДЛЯ МУЖЧИН', 'золотая цепочка с крестиком', 'золотая цепочка с крестиком', 165000, 120000, 'men2.jpg', 3, 0, 1, '2024-03-29 10:52:12'),
(23, 4, 'кольцо с чёрным бриллиантом', 'ДЛЯ МУЖЧИН', 'кольцо с чёрным бриллиантом', 'кольцо с чёрным бриллиантом', 250000, 199999, 'men3.jpg', 4, 0, 1, '2024-03-29 10:53:38'),
(24, 4, 'золотая кольцо с скорпионом', 'ДЛЯ МУЖЧИН', 'золотая кольцо с скорпионом', 'золотая кольцо с скорпионом', 45000, 35000, 'men4.jpg', 2, 0, 1, '2024-03-29 10:54:46'),
(25, 4, 'браслет белое золото', 'ДЛЯ МУЖЧИН', 'браслет белое золото', 'браслет белое золото', 55000, 49999, 'men6.jpg', 6, 0, 1, '2024-03-29 10:56:01'),
(26, 4, 'золотой цепь с кулоном льва', 'ДЛЯ МУЖЧИН', 'золотой цепь с кулоном льва', 'золотой цепь с кулоном льва', 62000, 57999, 'Hip Hop Lion Head Jewelry Necklace For Men.jpg', 2, 0, 1, '2024-03-29 10:57:13'),
(27, 5, 'колечко бабочка', 'ДЛЯ ДЕТЕЙ', 'колечко бабочка', 'колечко бабочка', 26000, 20000, 'kids111.jpg', 2, 0, 1, '2024-03-29 10:58:18'),
(28, 5, 'браслет бабочка', 'ДЛЯ ДЕТЕЙ', 'браслет бабочка', 'браслет бабочка', 12000, 7500, 'Kids.jpg', 10, 0, 1, '2024-03-29 10:59:27'),
(29, 5, 'колечко', 'ДЛЯ ДЕТЕЙ', 'колечко', 'колечко', 6500, 4800, 'kids8.jpg', 2, 0, 1, '2024-03-29 11:00:30'),
(30, 5, 'серьги кольцо', 'ДЛЯ ДЕТЕЙ', 'серьги кольцо', 'серьги кольцо', 7500, 3200, 'kids222.jpg', 5, 0, 1, '2024-03-29 11:01:34'),
(31, 5, 'Серьги с подвесками', 'ДЛЯ ДЕТЕЙ', 'Серьги с подвесками', 'Серьги с подвесками', 7700, 4500, 'kids444.jpg', 6, 0, 1, '2024-03-29 11:02:35'),
(32, 5, 'Кольца с сердечком', 'ДЛЯ ДЕТЕЙ', 'Кольца с сердечком', 'Кольца с сердечком', 7450, 5300, 'kids555.jpg', 2, 0, 1, '2024-03-29 11:04:01'),
(33, 5, 'колечко с инициалами', 'ДЛЯ ДЕТЕЙ', 'колечко с инициалами', 'колечко с инициалами', 8800, 5200, 'Kind (29).jpg', 2, 0, 1, '2024-03-29 11:06:16'),
(34, 5, 'кулон с цепочкой', 'ДЛЯ ДЕТЕЙ', 'кулон с цепочкой', 'кулон с цепочкой', 9500, 6500, 'Kind (22).jpg', 6, 0, 1, '2024-03-29 11:07:39'),
(35, 6, 'Кольцо из белого золота ', 'НОВИНКИ', 'Кольцо из белого золота ', 'Кольцо из белого золота ', 8550, 3650, 'new1.jpg', 3, 0, 1, '2024-03-29 11:09:35'),
(36, 6, 'украшение для кисти руки', 'НОВИНКИ', 'украшение для кисти руки', 'украшение для кисти руки', 5500, 3700, 'new2.jpg', 5, 0, 1, '2024-03-29 20:25:59'),
(37, 6, 'кулон с цепочкой бабочкой', 'НОВИНКИ', 'кулон с цепочкой бабочкой', 'кулон с цепочкой бабочкой', 8000, 4500, 'new3.jpg', 4, 0, 1, '2024-03-29 20:30:00'),
(38, 7, 'украшение для кисти руки', 'ВСЕ ДЛЯ СВАДЬБЫ', 'украшение для кисти руки', 'украшение для кисти руки', 6500, 3700, 'wedd1.jpg', 7, 0, 1, '2024-03-29 20:31:42'),
(39, 6, ' Диадема ', 'НОВИНКИ', ' Диадема ', ' Диадема ', 24000, 13000, 'wedd2.jpg', 8, 0, 1, '2024-03-29 20:33:40'),
(40, 6, ' Цепь из  золота', 'НОВИНКИ', '\r\nЦепь из  золота', 'Цепь из  золота', 8700, 7999, 'new5.jpg', 4, 0, 1, '2024-03-29 20:50:52'),
(41, 6, 'Кольца с топазами', 'НОВИНКИ', 'Кольца с топазами\r\n', 'Кольца с топазами\r\n', 15000, 11000, 'new6.jpg', 9, 0, 1, '2024-03-29 20:52:25'),
(42, 6, 'Кольцо из  золота с бабочкой ', 'НОВИНКИ', 'Кольцо из  золота с бабочкой ', 'Кольцо из  золота с бабочкой ', 74000, 63000, 'new4.jpg', 7, 0, 1, '2024-03-29 20:55:09'),
(43, 7, 'тиара для свадьбы', 'ВСЕ ДЛЯ СВАДЬБЫ', 'тиара для свадьбы', 'тиара для свадьбы', 45000, 32000, 'wedd5.jpg', 7, 0, 1, '2024-04-02 07:39:55'),
(44, 7, 'Кольца обручальные', 'ВСЕ ДЛЯ СВАДЬБЫ', 'Кольца обручальные', 'Кольца обручальные ', 34555, 29999, 'wedd4.jpg', 4, 0, 1, '2024-04-04 16:05:50');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `created_at`) VALUES
(1, 'lia', 'lia342@sdja.ad', 4444444, 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-02-16 16:59:36'),
(5, 'dia', 'dia@fhks.ru', 2121212, 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-02-16 19:01:43'),
(6, 'lari', 'lari44@mail.ru', 8888888, 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-03-02 16:24:00'),
(7, 'masha', 'masha21@mail.ru', 555555, 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-03-02 16:56:32'),
(8, 'Yura', 'yua23@mail.com', 5555, 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-03-02 16:57:31'),
(9, 'felix', 'fel78@mail.ru', 8484848, 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-03-02 17:02:33'),
(10, 'dora', 'dora12@mail.ru', 555555, 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-03-02 17:18:21'),
(11, 'jhjk', 'fri44@vfdlf.ru', 2222222, 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-02-26 05:30:32'),
(12, 'ffff', 'feded22@fdf.df', 54545454, 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-02-29 17:39:32'),
(13, 'aaaaa', 'aaaaa@mail.ru', 33333, 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-03-23 20:46:17'),
(14, 'aaaaa', 'aaaaa@mail.ru', 33333, 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-03-23 20:48:25'),
(15, 'aaaaa', 'aaaaa@mail.ru', 33333, 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-03-23 20:49:09'),
(16, 'aaaaa', 'aaaaa@mail.ru', 33333, 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-03-23 20:50:20'),
(17, 'lia', 'lia342@sdja.ad', 222111, 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-03-24 07:45:33'),
(18, 'dia', 'dia@fhks.ru', 11111, 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-03-25 11:23:32'),
(19, 'lui', 'lui33#de.ru', 2222, 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-03-25 12:16:28'),
(20, 'Sonya', 'son55@yd.ru', 3333, 'b0baee9d279d34fa1dfd71aadb908c3f', '2024-04-02 17:27:25');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin-user`
--
ALTER TABLE `admin-user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`prod_id`,`prod_qty`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `orderItems`
--
ALTER TABLE `orderItems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`order_id`,`prod_id`,`qty`,`price`,`created_at`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`user_id`,`cvv`,`total_price`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin-user`
--
ALTER TABLE `admin-user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `orderItems`
--
ALTER TABLE `orderItems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
