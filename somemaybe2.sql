-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 04 2023 г., 00:18
-- Версия сервера: 8.0.29
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `somemaybe2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ilmoitukset`
--

CREATE TABLE `ilmoitukset` (
  `ilmoitus_id` int NOT NULL,
  `ilmoitus_laji` int NOT NULL,
  `ilmoitus_nimi` text NOT NULL,
  `ilmoitus_kuvaus` text NOT NULL,
  `ilmoitus_paivays` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `myyja_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `ilmoitukset`
--

INSERT INTO `ilmoitukset` (`ilmoitus_id`, `ilmoitus_laji`, `ilmoitus_nimi`, `ilmoitus_kuvaus`, `ilmoitus_paivays`, `myyja_id`) VALUES
(23, 2, 'aasdd', 'aasd123', '2022-11-24 21:44:55', 9),
(24, 1, 'test', 'test $100\r\n123', '2023-03-04 21:42:46', 10),
(25, 2, 'Polkupyörä', 'Polkupyörä - $50\r\nmail: nimi.sukunimi@gmail.com', '2023-04-03 08:31:54', 9),
(26, 2, 'Vuokraan asunnon', 'Vuokraan asunnon. Hinta on neuvoteltavissa\r\npuh. +358 41 1234567', '2023-04-03 08:32:47', 9),
(27, 2, 'Myydään koiran', 'Myydään koiran\r\nMyydään koiran', '2023-04-03 10:12:10', 11),
(28, 1, 'Ostetaan koira', 'Ostetaan koira', '2023-04-03 10:14:02', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `kayttajat`
--

CREATE TABLE `kayttajat` (
  `kayttaja_id` int NOT NULL,
  `kayttaja_taso` varchar(5) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'user',
  `kayttaja_tunnus` varchar(20) NOT NULL,
  `kayttaja_salasana` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `kayttaja_sahkoposti` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `kayttajat`
--

INSERT INTO `kayttajat` (`kayttaja_id`, `kayttaja_taso`, `kayttaja_tunnus`, `kayttaja_salasana`, `kayttaja_sahkoposti`) VALUES
(9, 'user', '123123', '4297f44b13955235245b2497399d7a93', 'forjbi@mail.com'),
(10, 'user', 'roman', '4297f44b13955235245b2497399d7a93', 'forjbi@mail.com'),
(11, 'user', 'test123', 'cc03e747a6afbbcbf8be7668acfebee5', 'test@gmail.com'),
(12, 'user', '321', 'caf1a3dfb505ffed0d024130f58c5cfa', '321@mail.ru'),
(13, 'user', 'fghfg', 'b5889ce7d53f4379b87ba64cc40aedc9', 'sdfsdf@mail.ru'),
(14, 'user', 'dada', 'b01abf84324066bdb4eed4d5bf20f887', 'sdfsdfs@mail.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ilmoitukset`
--
ALTER TABLE `ilmoitukset`
  ADD PRIMARY KEY (`ilmoitus_id`);

--
-- Индексы таблицы `kayttajat`
--
ALTER TABLE `kayttajat`
  ADD PRIMARY KEY (`kayttaja_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ilmoitukset`
--
ALTER TABLE `ilmoitukset`
  MODIFY `ilmoitus_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `kayttajat`
--
ALTER TABLE `kayttajat`
  MODIFY `kayttaja_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
