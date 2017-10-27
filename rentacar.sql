-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Окт 27 2017 г., 11:10
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

-- --------------------------------------------------------

--
-- Структура таблицы `Contract`
--

CREATE TABLE `Contract` (
  `contract_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `car` int(255) NOT NULL,
  `passport_number_owner` int(11) NOT NULL,
  `passport_number_driver` int(11) NOT NULL,
  `first_name_owner` varchar(255) NOT NULL,
  `last_name_owner` varchar(255) NOT NULL,
  `first_name_driver` varchar(255) NOT NULL,
  `last_name_driver` varchar(255) NOT NULL,
  `telephone_owner` int(11) NOT NULL,
  `address_owner` varchar(255) NOT NULL,
  `email_owner` varchar(255) NOT NULL,
  `telephone_driver` int(11) NOT NULL,
  `address_driver` varchar(255) NOT NULL,
  `email_driver` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Driver`
--

CREATE TABLE `Driver` (
  `driver_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `passport_num_d` int(11) NOT NULL,
  `experience` int(11) NOT NULL COMMENT 'years',
  `drive_license` int(11) NOT NULL,
  `desired_dates` int(11) NOT NULL COMMENT '"int" because driver must choose offered dates',
  `desired_car` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `interval_availability`
--

CREATE TABLE `interval_availability` (
  `interval_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Owner`
--

CREATE TABLE `Owner` (
  `owner_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cars` int(255) NOT NULL,
  `passport_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The table of car''s owner';

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Car`
--
ALTER TABLE `Car`
  ADD PRIMARY KEY (`car_id`) USING BTREE,
  ADD KEY `car_ibfk_1` (`int_of_availability`),
  ADD KEY `car's_owner` (`car_owner`),
  ADD KEY `mark` (`mark`);

--
-- Индексы таблицы `Contract`
--
ALTER TABLE `Contract`
  ADD PRIMARY KEY (`contract_id`),
  ADD KEY `passport_number_owner` (`passport_number_owner`),
  ADD KEY `first_name_owner` (`first_name_owner`),
  ADD KEY `last_name_owner` (`last_name_owner`),
  ADD KEY `telephone_owner` (`telephone_owner`),
  ADD KEY `address_owner` (`address_owner`),
  ADD KEY `email_owner` (`email_owner`),
  ADD KEY `passport_number_driver` (`passport_number_driver`),
  ADD KEY `first_name_driver` (`first_name_driver`),
  ADD KEY `last_name_driver` (`last_name_driver`),
  ADD KEY `telephone_driver` (`telephone_driver`),
  ADD KEY `address_driver` (`address_driver`),
  ADD KEY `email_driver` (`email_driver`),
  ADD KEY `car` (`car`);

--
-- Индексы таблицы `Driver`
--
ALTER TABLE `Driver`
  ADD PRIMARY KEY (`driver_id`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `telephone` (`telephone`),
  ADD KEY `email` (`email`),
  ADD KEY `address` (`address`),
  ADD KEY `passport_num_d` (`passport_num_d`),
  ADD KEY `desired_dates` (`desired_dates`),
  ADD KEY `desired_car` (`desired_car`);

--
-- Индексы таблицы `interval_availability`
--
ALTER TABLE `interval_availability`
  ADD PRIMARY KEY (`interval_id`);

--
-- Индексы таблицы `Owner`
--
ALTER TABLE `Owner`
  ADD PRIMARY KEY (`owner_id`),
  ADD KEY `cars` (`cars`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `telephone` (`telephone`),
  ADD KEY `email` (`email`),
  ADD KEY `address` (`address`),
  ADD KEY `passport_num` (`passport_num`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Car`
--
ALTER TABLE `Car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`int_of_availability`) REFERENCES `interval_availability` (`interval_id`),
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`car_owner`) REFERENCES `Owner` (`owner_id`);

--
-- Ограничения внешнего ключа таблицы `Contract`
--
ALTER TABLE `Contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`passport_number_owner`) REFERENCES `Owner` (`passport_num`),
  ADD CONSTRAINT `contract_ibfk_10` FOREIGN KEY (`telephone_driver`) REFERENCES `Driver` (`telephone`),
  ADD CONSTRAINT `contract_ibfk_11` FOREIGN KEY (`address_driver`) REFERENCES `Driver` (`address`),
  ADD CONSTRAINT `contract_ibfk_12` FOREIGN KEY (`email_driver`) REFERENCES `Driver` (`email`),
  ADD CONSTRAINT `contract_ibfk_13` FOREIGN KEY (`car`) REFERENCES `Car` (`car_id`),
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`first_name_owner`) REFERENCES `Owner` (`first_name`),
  ADD CONSTRAINT `contract_ibfk_3` FOREIGN KEY (`last_name_owner`) REFERENCES `Owner` (`last_name`),
  ADD CONSTRAINT `contract_ibfk_4` FOREIGN KEY (`telephone_owner`) REFERENCES `Owner` (`telephone`),
  ADD CONSTRAINT `contract_ibfk_5` FOREIGN KEY (`address_owner`) REFERENCES `Owner` (`address`),
  ADD CONSTRAINT `contract_ibfk_6` FOREIGN KEY (`email_owner`) REFERENCES `Owner` (`email`),
  ADD CONSTRAINT `contract_ibfk_7` FOREIGN KEY (`passport_number_driver`) REFERENCES `Driver` (`passport_num_d`),
  ADD CONSTRAINT `contract_ibfk_8` FOREIGN KEY (`first_name_driver`) REFERENCES `Driver` (`first_name`),
  ADD CONSTRAINT `contract_ibfk_9` FOREIGN KEY (`last_name_driver`) REFERENCES `Driver` (`last_name`);

--
-- Ограничения внешнего ключа таблицы `Driver`
--
ALTER TABLE `Driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`desired_car`) REFERENCES `Car` (`mark`),
  ADD CONSTRAINT `driver_ibfk_2` FOREIGN KEY (`desired_dates`) REFERENCES `interval_availability` (`interval_id`);

--
-- Ограничения внешнего ключа таблицы `Owner`
--
ALTER TABLE `Owner`
  ADD CONSTRAINT `owner_ibfk_1` FOREIGN KEY (`cars`) REFERENCES `Car` (`car_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
