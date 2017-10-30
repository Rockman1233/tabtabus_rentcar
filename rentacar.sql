-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Окт 30 2017 г., 17:31
-- Версия сервера: 5.6.35
-- Версия PHP: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rentacar`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Car`
--

CREATE TABLE `Car` (
  `car_id` int(11) NOT NULL,
  `mark` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `state_num` varchar(255) NOT NULL,
  `mileage` int(11) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `consumption` int(11) NOT NULL COMMENT 'liters for 100 km',
  `int_of_availability` int(11) NOT NULL COMMENT 'dates of avilability',
  `cost_less_30_inc` int(11) NOT NULL COMMENT 'per 1 day',
  `cost_more_31` int(11) NOT NULL COMMENT 'per 1 day',
  `car_owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Car`
--
ALTER TABLE `Car`
  ADD PRIMARY KEY (`car_id`) USING BTREE,
  ADD UNIQUE KEY `car_id` (`car_id`),
  ADD KEY `car_ibfk_1` (`int_of_availability`),
  ADD KEY `car's_owner` (`car_owner`),
  ADD KEY `mark` (`mark`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Car`
--
ALTER TABLE `Car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Car`
--
ALTER TABLE `Car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`int_of_availability`) REFERENCES `interval_availability` (`interval_id`),
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`car_owner`) REFERENCES `Owner` (`owner_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
