-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Ноя 20 2017 г., 12:37
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

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Contract`
--
ALTER TABLE `Contract`
  ADD PRIMARY KEY (`contract_id`),
  ADD KEY `car` (`car`),
  ADD KEY `driver` (`driver`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Contract`
--
ALTER TABLE `Contract`
  MODIFY `contract_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Contract`
--
ALTER TABLE `Contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`car`) REFERENCES `Car` (`car_id`),
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`driver`) REFERENCES `Driver` (`driver_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
