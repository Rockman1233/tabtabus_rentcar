-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Ноя 20 2017 г., 12:46
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
(13, 10005, 'white', 7, 11, 8, 'citroenC3.png', 'Citroen', 'C3', 8484, '837', 2010),
(14, 10001, 'grey', 15, 20, 18, 'W204_C63_grau_vorne_seite4.jpg', 'Mercedes', 'C class', 83777, 'carisson', 2009),
(15, 10001, 'grey', 14, 14, 10, '300px-BMW_E46_front_20080822.jpg', 'BMW', 'e46', 109999, 'euK889', 2006),
(16, 10001, 'black', 16, 13, 9, '', 'BMW', 'e39', 228484, 'jdd229', 1999);

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
(50, 11, 3, 0, '2017-11-20', '2017-11-22', 28),
(51, 13, 3, 2, '2017-11-29', '2017-11-30', 11),
(52, 12, 3, 2, '2017-11-28', '2017-11-30', 20),
(53, 13, 13, 1, '2017-11-20', '2017-11-27', 77);

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
(1, 'Иван', 'Ургант', 'zxc', '$2y$10$pSehOAE6YLeq9Pqq8q/dbevkEaGKobCU5g.i3MrId9XtIA5eNi6fC', 300334, 'urgant@djdjd.ru', 10, 555152, 89103348889, 'РФ, Москва'),
(3, 'Криштиану', 'Рональдо', 'qwe', '$2y$10$pSehOAE6YLeq9Pqq8q/dbevkEaGKobCU5g.i3MrId9XtIA5eNi6fC', 487575, 'ronaldo@port.dd', 3, 28484, 8393303, 'Португалия'),
(4, 'Юрий', 'Куклачев', 'xcv', '$2y$10$pSehOAE6YLeq9Pqq8q/dbevkEaGKobCU5g.i3MrId9XtIA5eNi6fC', 32525, 'kukla@kot.ru', 6, 2334445, 8930475756, 'Москва'),
(5, 'Иван', 'Дуров', 'Rock', 'v8v8', 383737, 'durov@sss.ss', 9, 38383838, 837377, 'Иваново'),
(6, 'Иван', 'Дуров', 'Rock', 'v8v8', 383737, 'durov@sss.ss', 9, 38383838, 837377, 'Иваново'),
(7, 'Иван', 'Дуров', 'Rock', 'v8v8', 383737, 'durov@sss.ss', 9, 38383838, 837377, 'Иваново'),
(8, 'Иван', 'Дуров', 'Rock', '2b6b88559f2fcc19c8129d5bd1e7cc28', 383737, 'durov@sss.ss', 9, 38383838, 837377, 'Иваново'),
(9, 'Иван', 'Дуров', 'Rock', '$2y$10$0bikzKSOOlUnrCggM8zomeKpEXOFZhVNIlF/rEiFGiFmSe2knYWlm', 383737, 'durov@sss.ss', 9, 38383838, 837377, 'Иваново'),
(11, 'Bond', 'James', 'lkj', '$2y$10$j7wX1LAnjsjP9HC7JPHwxuzq8tv9obNiW7aqV/GnFSq6IS4s1uBZy', 77778, 'bond@007.ocm', 19, 777777, 777, 'UK'),
(12, 'Robert', 'Winston', 'Pop', '$2y$10$JsFpJb9kc6dzoRnXhaFgM.cQX8/z5FgXb0XTxpUAl5x/zUE5rw53K', 38383, 'winston@sigareta.com', 9, 939399, 8383, 'Bronx'),
(13, 'Сергей', 'Брин', 'bnm', '$2y$10$gcLRC9RrXrkPAqCxGvqVAO6VYzpAcS5ABNrxWwj.kuSeK9Tesbhhy', 888484, 'google@sergey.com', 5, 83838, 7772728, 'SF');

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
(10000, 'asdd', '$2y$10$D7m5YEt4NtD5Z1tEPa4V9.V.qA0F2wsKNYnOU7EfrLaQlot27oWky', 'Стив', 'Джобс', 2244, 'jobs@sss.com', 446632, 'Сан-Франциско'),
(10001, 'iop', '$2y$10$D7m5YEt4NtD5Z1tEPa4V9.V.qA0F2wsKNYnOU7EfrLaQlot27oWky', 'Михаэль', 'Шумахер', 8283, 'mish@gonka.com', 9844444, 'Germany'),
(10002, 'Rock', '$2y$10$cljJGacQoBhLZlPOLGl.ye1MjgDgTjOyc14kDYAqCfYnel3WWYqd2', 'Chester', 'Benington', 823933, 'linkin@park.com', 6429911, 'LA'),
(10003, 'qqwwee', '$2y$10$pSehOAE6YLeq9Pqq8q/dbevkEaGKobCU5g.i3MrId9XtIA5eNi6fC', 'qqq', 'qqq', 888, '888', 888, 'dhh'),
(10004, 'aaa', '$2y$10$D7m5YEt4NtD5Z1tEPa4V9.V.qA0F2wsKNYnOU7EfrLaQlot27oWky', 'qqq', 'qqq', 0, 'kkk', 0, 'kk'),
(10005, 'qqwe', '$2y$10$k3VIv/VVcvUKUWMSvfdHdeD2Jm6FjTR3b0.iP0xXqLzVAVG3SJP6O', 'Юрий', 'Дудь', 747474, ' dud@ura.ru', 3933, 'Москва');

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
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `Contract`
--
ALTER TABLE `Contract`
  MODIFY `contract_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT для таблицы `Driver`
--
ALTER TABLE `Driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `interval_availability`
--
ALTER TABLE `interval_availability`
  MODIFY `interval_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `Owner`
--
ALTER TABLE `Owner`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10006;
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
