-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Ноя 09 2017 г., 17:31
-- Версия сервера: 5.6.35
-- Версия PHP: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rentacar2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Driver`
--

CREATE TABLE `Driver` (
  `driver_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `login` varchar(255) CHARACTER SET utf32 NOT NULL,
  `pass` varchar(255) NOT NULL,
  `drive_license` bigint(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `experience` int(11) NOT NULL,
  `passport_num` bigint(11) NOT NULL,
  `telephone` bigint(11) NOT NULL,
  `desired_car` int(11) DEFAULT NULL,
  `desired_dates` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Driver`
--

INSERT INTO `Driver` (`driver_id`, `first_name`, `last_name`, `login`, `pass`, `drive_license`, `email`, `experience`, `passport_num`, `telephone`, `desired_car`, `desired_dates`, `address`) VALUES
(1, 'Иван', 'Ургант', 'zxc', '123', 300334, 'urgant@djdjd.ru', 10, 555152, 89103348889, 0, 0, 'РФ, Москва'),
(2, '', '', '', '', 0, '', 0, 0, 0, 0, 0, ''),
(3, 'Криштиану', 'Рональдо', 'qwe', '123', 487575, 'ronaldo@port.dd', 3, 28484, 8393303, 0, 0, 'Португалия');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Driver`
--
ALTER TABLE `Driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Driver`
--
ALTER TABLE `Driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
