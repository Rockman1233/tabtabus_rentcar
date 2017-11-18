-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Ноя 18 2017 г., 20:54
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
-- Структура таблицы `Car`
--

CREATE TABLE `Car` (
  `car_id` int(11) NOT NULL,
  `car_owner` int(255) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `consumption` int(11) NOT NULL,
  `cost_less_30_inc` int(11) NOT NULL,
  `cost_more_31` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `mark` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `mileage` int(11) NOT NULL,
  `state_num` varchar(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Car`
--

INSERT INTO `Car` (`car_id`, `car_owner`, `colour`, `consumption`, `cost_less_30_inc`, `cost_more_31`, `foto`, `mark`, `model`, `mileage`, `state_num`, `year`) VALUES
(1, 10000, 'белый', 8, 12, 9, 'Fiat-Punto-2012-1.jpg', 'Fiat', 'Punto', 30111, '383', 2001),
(4, 10000, 'bue', 9, 15, 11, 'ford_focus.jpg', 'Ford', 'Focus', 101011, '374', 2010),
(5, 10000, 'black', 17, 21, 18, '', 'BMW', '750', 74888, '777', 2007),
(6, 10001, 'black', 25, 39, 29, '', 'Porsche', 'Panamera', 30299, '476', 2013),
(11, 10000, 'blue', 9, 14, 10, '4bd58bad6ea61.jpg', 'Renault', 'Megane', 109333, '546', 2010),
(12, 10000, 'yellow', 8, 10, 8, '30_09_14_Kalina_Sport.jpg', 'Lada', 'Kalina 2', 83339, 'n394ok199', 2014),
(13, 10005, 'white', 7, 11, 8, 'citroenC3.png', 'Citroen', 'C3', 8484, '837', 2010);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Car`
--
ALTER TABLE `Car`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `car_owner` (`car_owner`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Car`
--
ALTER TABLE `Car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Car`
--
ALTER TABLE `Car`
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`car_owner`) REFERENCES `Owner` (`owner_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
