-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 26 2016 г., 15:40
-- Версия сервера: 5.6.28-76.1-beget-log
-- Версия PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `spoilichek_6para`
--

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--
-- Создание: Июн 24 2016 г., 19:39
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(30) NOT NULL,
  `is_schedule` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `Name`, `Surname`, `Phone`, `date`, `time`, `is_schedule`) VALUES
(2, 'Иван', 'Иванов', '9-888-888-888', '24-06-16', '13.00 - 14.00', 1),
(3, 'Федор', 'Федоров', '8-7777-77-77', '26-06-16', '12.00 - 13.00', 1),
(22, '', '', '', '27-06-16', '17.00 - 18.00', 1),
(23, '', '', '', '25-06-16', '13.00 - 14.00', 1),
(33, '', '', '', '24-06-16', '11.00 - 12.00', 1),
(36, '', '', '', '30-06-16', '10.00 - 11.00', 1),
(37, '', '', '', '24-06-16', '10.00 - 11.00', 1),
(45, '', '', '', '28-06-16', '13.00 - 14.00', 1),
(46, '', '', '', '26-06-16', '11.00 - 12.00', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
