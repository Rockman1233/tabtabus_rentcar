-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Ноя 15 2017 г., 22:26
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
(1, 10000, 'белый', 8, 12, 8, 'Fiat-Punto-2012-1.jpg', 'Fiat', 'Punto', 30111, '383', 2001),
(4, 10000, 'bue', 8, 15, 11, 'ford_focus.jpg', 'Ford', 'Focus', 98222, '374', 2010),
(5, 10000, 'black', 17, 21, 18, '', 'BMW', '750', 74888, '777', 2007),
(6, 10001, 'black', 25, 39, 29, '', 'Porsche', 'Panamera', 30299, '476', 2013),
(11, 10000, 'blue', 9, 14, 10, '4bd58bad6ea61.jpg', 'Renault', 'Megane', 109333, '546', 2010);

-- --------------------------------------------------------

--
-- Структура таблицы `Contract`
--

CREATE TABLE `Contract` (
  `contract_id` int(11) NOT NULL,
  `car` int(11) NOT NULL,
  `driver` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Contract`
--

INSERT INTO `Contract` (`contract_id`, `car`, `driver`, `status`, `start_date`, `finish_date`, `cost`) VALUES
(16, 1, 1, 1, '2017-12-21', '2017-12-31', 0),
(31, 1, 1, 0, '2017-11-21', '2017-11-25', 0),
(35, 1, 1, 0, '2017-11-15', '2017-11-16', 0),
(37, 4, 3, 0, '2017-11-27', '2017-11-30', 0),
(39, 1, 3, 0, '2018-05-01', '2018-05-09', 0),
(40, 5, 3, 0, '2017-12-28', '2017-12-31', 0),
(42, 6, 1, 2, '2017-11-15', '2017-11-17', 0),
(43, 6, 1, 2, '2018-01-01', '2018-02-07', 0),
(44, 6, 1, 2, '2017-11-20', '2017-11-21', 39),
(45, 6, 1, 2, '2018-04-01', '2018-04-03', 78),
(46, 6, 1, 1, '2017-12-14', '2017-12-17', 117),
(47, 5, 1, 0, '2018-05-09', '2018-05-19', 210),
(48, 5, 1, 0, '2017-11-14', '2017-11-16', 42),
(49, 6, 1, 1, '2017-11-29', '2017-11-30', 39),
(50, 11, 3, 0, '2017-11-20', '2017-11-22', 28);

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
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Driver`
--

INSERT INTO `Driver` (`driver_id`, `first_name`, `last_name`, `login`, `pass`, `drive_license`, `email`, `experience`, `passport_num`, `telephone`, `address`) VALUES
(1, 'Иван', 'Ургант', 'zxc', '123', 300334, 'urgant@djdjd.ru', 10, 555152, 89103348889, 'РФ, Москва'),
(3, 'Криштиану', 'Рональдо', 'qwe', '123', 487575, 'ronaldo@port.dd', 3, 28484, 8393303, 'Португалия'),
(4, 'Юрий', 'Куклачев', 'xcv', '123', 32525, 'kukla@kot.ru', 6, 2334445, 8930475756, 'Москва');

-- --------------------------------------------------------

--
-- Структура таблицы `interval_availability`
--

CREATE TABLE `interval_availability` (
  `interval_id` int(255) NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `interval_availability`
--

INSERT INTO `interval_availability` (`interval_id`, `start_date`, `finish_date`) VALUES
(1, '2017-01-01', '2017-01-22');

-- --------------------------------------------------------

--
-- Структура таблицы `Owner`
--

CREATE TABLE `Owner` (
  `owner_id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passport_num` int(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Owner`
--

INSERT INTO `Owner` (`owner_id`, `login`, `pass`, `first_name`, `last_name`, `telephone`, `email`, `passport_num`, `address`) VALUES
(10000, 'asdd', '123', 'Стив', 'Джобс', 2244, 'jobs@sss.com', 446633, 'Сан-Франциско'),
(10001, 'iop', '123', 'Михаэль', 'Шумахер', 8474755, 'mish@gonka.com', 9844444, 'Germany');

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
-- Индексы таблицы `Contract`
--
ALTER TABLE `Contract`
  ADD PRIMARY KEY (`contract_id`),
  ADD KEY `car` (`car`),
  ADD KEY `driver` (`driver`);

--
-- Индексы таблицы `Driver`
--
ALTER TABLE `Driver`
  ADD PRIMARY KEY (`driver_id`);

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
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Car`
--
ALTER TABLE `Car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `Contract`
--
ALTER TABLE `Contract`
  MODIFY `contract_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT для таблицы `Driver`
--
ALTER TABLE `Driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `interval_availability`
--
ALTER TABLE `interval_availability`
  MODIFY `interval_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `Owner`
--
ALTER TABLE `Owner`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Car`
--
ALTER TABLE `Car`
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`car_owner`) REFERENCES `Owner` (`owner_id`);

--
-- Ограничения внешнего ключа таблицы `Contract`
--
ALTER TABLE `Contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`car`) REFERENCES `Car` (`car_id`),
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`driver`) REFERENCES `Driver` (`driver_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
