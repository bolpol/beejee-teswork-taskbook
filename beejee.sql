-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 06 2019 г., 02:23
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `beejee`
--

-- --------------------------------------------------------

--
-- Структура таблицы `task_book`
--

CREATE TABLE `task_book` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `task` varchar(1000) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task_book`
--

INSERT INTO `task_book` (`id`, `name`, `email`, `task`, `status`) VALUES
(1, 'Alex', 'test@dron.ton', '3efef', 1),
(2, 'test', 'test@dron.ton', 'fefefefef', 0),
(3, 'test5', 'test@dron.ton', 'f145454fef', 0),
(4, 'test', 'test@bbbbbb.ton', 'fefefefef', 0),
(5, 'test', 'test@dron.ton', 'fefefefef', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `auth_token` varchar(128) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `auth_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'admin@test.com', '4ecdc3bd1faecdcda8e4935d7e7f593ddc56ec77a0fffe743afea4a243f486f0b2095fec5f8f201854616036922e8c100342d40d7a5d14e903b377a27563f81c', 1, '2019-03-03 16:44:04', '2019-03-03 16:44:06'),
(2, '12', '212121', NULL, NULL, 0, '2019-03-04 18:37:19', '2019-03-04 18:37:20'),
(3, '122', '2527257', NULL, NULL, 0, '2019-03-04 18:37:30', '2019-03-04 18:37:31'),
(4, '7575', '58585', NULL, NULL, 0, '2019-03-04 18:37:42', '2019-03-04 18:37:42'),
(5, '8585', '8585', NULL, NULL, 0, '2019-03-04 18:37:51', '2019-03-04 18:37:51'),
(6, '854778', '58599696', NULL, NULL, 0, '2019-03-04 18:38:11', '2019-03-04 18:38:11');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `task_book`
--
ALTER TABLE `task_book`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `task_book`
--
ALTER TABLE `task_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
