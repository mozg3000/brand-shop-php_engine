-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 01 2019 г., 18:47
-- Версия сервера: 5.7.25
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `enginodb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_session` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id_cart`, `id_product`, `quantity`, `id_session`) VALUES
(71, 5, 2, 'svi46u8iifr4a0v5vki6hapsl637qjom'),
(72, 7, 2, 'svi46u8iifr4a0v5vki6hapsl637qjom');

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `description` text,
  `price` float NOT NULL,
  `img` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `product_name`, `description`, `price`, `img`) VALUES
(1, 'Товар1', 'Описание товара1', 100, '01.jpg'),
(2, 'Товар2', 'Описание товара2', 200, '02.jpg'),
(3, 'Товар3', 'Описание товара3', 300, '03.jpg'),
(4, 'Товар4', 'Описание товара4', 400, '04.jpg'),
(5, 'Товар5', 'Описание товара5', 500, '05.jpg'),
(6, 'Товар6', 'Описание товара6', 400, '06.jpg'),
(7, 'Товар7', 'Описание товара7', 300, '07.jpg'),
(8, 'Товар8', 'Описание товара8', 100, '08.jpg'),
(9, 'Товар9', 'Описание товара9', 1000, '09.jpg'),
(10, 'Товар10', 'Описание товара10', 1500, '10.jpg'),
(11, 'Товар11', '        Описание товара11 \r\nизменёное   ', 1205, '11.jpg'),
(12, 'Товар12', 'Описание товара12', 1600, '12.jpg'),
(13, 'Товар13', 'Описание товара13', 1800, '13.jpg'),
(14, 'Товар14', 'Описание товара14', 900, '14.jpg'),
(15, 'Товар15', 'Описание товара15', 800, '15.jpg'),
(25, 'Товар16', 'Описание товара16', 999, '43445_900.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `sender` text NOT NULL,
  `message` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `sender`, `message`, `product_id`) VALUES
(1, 'vasya', 'jkelasrhgkljherwkjs', 1),
(2, 'ghfhgf', '    fdxfdxfdxdf', 10),
(3, 'ghfhgf', '    gvhvhgvh', 10),
(4, 'Pup', 'My feedback!    ', 10),
(5, 'Pup', 'My feedback!    ', 10),
(6, 'Igupup', 'jnzfdvkjfndlkszlkjd    ', 10),
(7, 'igipup', 'jasnvkjrd    ', 10),
(8, 'igipup', 'jasnvkjrd    ', 10),
(9, 'igipup', 'jasnvkjrd    ', 10),
(10, 'gop', '    stop', 10),
(11, 'gjkd', '    tyfyhghg', 10),
(12, 'cfgcg', '    cgfcgfc', 10),
(13, 'cfgcg', '    cgfcgfc', 10),
(14, 'vasya', 'moy objectivnyi otsyiv    ', 10),
(15, 'vasya', 'moy objectivnyi otsyiv    ', 10),
(16, 'vasya', 'moy objectivnyi otsyiv    ', 10),
(17, 'vasya', 'moy objectivnyi otsyiv    ', 10),
(18, 'bob', '    wtf', 10),
(19, 'vhgvgh', '    vhgvhgvhgvhg', 10),
(20, 'vhgvgh', '    vhgvhgvhgvhg', 10),
(21, 'bjhjhbjh', '    bjhbjhbjhbjhb', 0),
(22, 'bjhjhbjh', '    bjhbjhbjhbjhb', 0),
(42, 'hgjhgjhgj', '    gjhgjhgjgjhgjhgjh', 2),
(164, 'vhgvhg', '    vvhgvhgvhg', 2),
(165, 'hkjhk', '    jhkhkjhk', 2),
(185, 'jkjbkj', '    bkjbkjbkj', 2),
(186, 'llllllllllllllllllllllll', '    llllkkkkkkkkkkkkkkkkkkkkk', 2),
(187, 'ghfhgf', '    jhkjhkjhkjhkj', 2),
(188, 'hhhhhhhhhhhhhhh', '    hhhhhhhhhhhhhhhhhhhhhhhhhh', 2),
(189, 'oracle', 'on my opinion ', 7),
(190, 'oracle', '    hjjhbjhbjhbj', 2),
(191, 'oracle', '    45465454', 3),
(192, 'oracle', '    654654654', 7),
(193, 'oracle', '   454646 ', 7),
(194, 'oracle', '   454646 ', 7),
(195, 'oracle', '    jjjjjjjjjjjjjjjjjjjjjj', 7),
(196, 'oracle', '    ttttttttttttttttt', 15),
(197, 'oracle', '    kokokokokoko', 0),
(198, 'oracle', '    555555555555555555555', 0),
(199, 'oracle', '    5555555555555555555', 15),
(200, '1', '    11111111111111111', 15),
(201, '1', '    1111111111111', 15),
(202, 'oracle', '    uuuuuuuuuuuuuuuuuuuuu', 15),
(203, 'oracle', '    000000000000000000', 15);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_session` varchar(32) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `id_session`, `telefon`, `status`) VALUES
(8, 'svi46u8iifr4a0v5vki6hapsl637qjom', '9251234567', '');

-- --------------------------------------------------------

--
-- Структура таблицы `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `show_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `name`, `show_number`) VALUES
(91, '01.jpg', 0),
(92, '02.jpg', 0),
(93, '03.jpg', 1),
(94, '04.jpg', 0),
(95, '05.jpg', 0),
(96, '06.jpg', 0),
(97, '07.jpg', 0),
(98, '08.jpg', 0),
(99, '09.jpg', 3),
(100, '10.jpg', 2),
(101, '11.jpg', 0),
(102, '12.jpg', 3),
(103, '13.jpg', 0),
(104, '14.jpg', 0),
(105, '15.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `picture_type`
--

CREATE TABLE `picture_type` (
  `id` int(11) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `picture_type`
--

INSERT INTO `picture_type` (`id`, `size`) VALUES
(1, 'small'),
(2, 'big');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$10$GAh95KWqFf1Fw4YyH/BCnuODYbJ1Mln78vDuOIwj7WQvChhR8QcX.', '9453319475cc17b0c4ec214.41105699');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Индексы таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `picture_type`
--
ALTER TABLE `picture_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT для таблицы `picture_type`
--
ALTER TABLE `picture_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
