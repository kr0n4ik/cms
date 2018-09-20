-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 20 2018 г., 21:54
-- Версия сервера: 10.1.32-MariaDB
-- Версия PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `web`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cms_users`
--

CREATE TABLE `cms_users` (
  `id` int(11) NOT NULL,
  `avatar` varchar(36) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nameone` varchar(255) NOT NULL,
  `nametwo` varchar(255) NOT NULL,
  `namethree` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `session` varchar(64) NOT NULL,
  `timereg` int(11) NOT NULL,
  `prefix` varchar(32) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `code` varchar(32) NOT NULL,
  `parent` int(11) NOT NULL,
  `rights` enum('user','partner','moderator','admin') NOT NULL DEFAULT 'user',
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cms_users`
--

INSERT INTO `cms_users` (`id`, `avatar`, `email`, `nameone`, `nametwo`, `namethree`, `password`, `session`, `timereg`, `prefix`, `phone`, `code`, `parent`, `rights`, `balance`) VALUES
(1, '45ywri9574q2346i578o7.png', 'kr0n4ik@gmail.com', 'Иван', 'Иванов', 'Юрьевич', '0d9fafec7db8649a6661a2465aaa847d', 'none', 1536084209, '', '79779370472', '', 0, 'moderator', 0),
(2, '45ywri9574q2346i578o7.png', 'moderator@mail.ru', 'Сергей', 'Админ', 'Юрьевич', '67831191c325a42c729adb3809801a63', 'b23dc437dd64ffd37a7b4003eab1c867', 0, '', '79779370473', '67831191c325a42c729adb3809801a63', 0, 'partner', 7),
(3, '45ywri9574q2346i578o7.png', 'test@mail.ru', 'Сергей', '', '', '67831191c325a42c729adb3809801a63', 'none', 0, '', '', '', 0, 'user', 0),
(4, '', 'test1@mail.ru', '', '', '', '67831191c325a42c729adb3809801a63', 'none', 0, '', '', '', 2, 'user', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
