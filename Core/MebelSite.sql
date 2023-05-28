-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 24 2023 г., 19:26
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `MebelSite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Mebel`
--

CREATE TABLE `Mebel` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `img_src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Mebel`
--

INSERT INTO `Mebel` (`id`, `name`, `price`, `color`, `type`, `img_src`) VALUES
(1, 'Пуфик', 2000, 'Белый', 'пуфик', 'tovar/pufik.jpg'),
(2, 'Диван', 20000, 'синий', 'угловой диван', 'tovar/sin_ugl.jpg'),
(3, 'Диван классический', 15000, 'красный', 'классический диван', 'tovar/crasnui_divan.jpg'),
(4, 'Модульный диван', 30000, 'пурпурный', 'модульный диван', 'tovar/purp_mad.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Mebel`
--
ALTER TABLE `Mebel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Mebel`
--
ALTER TABLE `Mebel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
