-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 01 2013 г., 22:37
-- Версия сервера: 5.6.11
-- Версия PHP: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `ci_base`
--
CREATE DATABASE IF NOT EXISTS `ci_base` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `ci_base`;

-- --------------------------------------------------------

--
-- Структура таблицы `albom`
--

CREATE TABLE IF NOT EXISTS `albom` (
  `id_albom` int(11) NOT NULL AUTO_INCREMENT,
  `albom_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_albom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `albom`
--

INSERT INTO `albom` (`id_albom`, `albom_name`, `user_id`) VALUES
(10, 'albom001', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `chat_friends`
--

CREATE TABLE IF NOT EXISTS `chat_friends` (
  `id_chat_friends` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `adresat` int(11) NOT NULL,
  `messages` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_chat_friends`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `chat_friends`
--

INSERT INTO `chat_friends` (`id_chat_friends`, `user_id`, `adresat`, `messages`, `avatar`, `message_date`) VALUES
(1, 0, 0, '1', 'ce7cc3c55aa5eea50ef216ecf45c0cb2.jpg', '12.01.13'),
(2, 1, 0, 'sdfgsd', 'ce7cc3c55aa5eea50ef216ecf45c0cb2.jpg', '12.01.13'),
(3, 1, 0, 'hgvg', 'ce7cc3c55aa5eea50ef216ecf45c0cb2.jpg', '12.01.13'),
(4, 0, 0, 'dfsgfg', 'ce7cc3c55aa5eea50ef216ecf45c0cb2.jpg', '12.01.13'),
(5, 1, 2, 'dfghdfgh', 'ce7cc3c55aa5eea50ef216ecf45c0cb2.jpg', '12.01.13'),
(6, 1, 2, 'fgjg', 'ce7cc3c55aa5eea50ef216ecf45c0cb2.jpg', '12.01.13'),
(7, 1, 2, 'выап', 'ce7cc3c55aa5eea50ef216ecf45c0cb2.jpg', '12.01.13'),
(8, 1, 2, 'ывап', 'ce7cc3c55aa5eea50ef216ecf45c0cb2.jpg', '12.01.13'),
(9, 2, 0, 'sdfsdf', '8425addd420bb7fd5dde8a31ae9ca7b2.jpg', '12.01.13'),
(10, 2, 1, 'sdfgd', '8425addd420bb7fd5dde8a31ae9ca7b2.jpg', '12.01.13'),
(11, 2, 1, 'sdfgdf', '8425addd420bb7fd5dde8a31ae9ca7b2.jpg', '12.01.13'),
(12, 1, 2, 'asdasd', 'ce7cc3c55aa5eea50ef216ecf45c0cb2.jpg', '12.01.13');

-- --------------------------------------------------------

--
-- Структура таблицы `chat_photos`
--

CREATE TABLE IF NOT EXISTS `chat_photos` (
  `id_chat` int(11) NOT NULL AUTO_INCREMENT,
  `photos_id` int(11) NOT NULL,
  `messages` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_chat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=72 ;

--
-- Дамп данных таблицы `chat_photos`
--

INSERT INTO `chat_photos` (`id_chat`, `photos_id`, `messages`, `user_id`, `message_date`) VALUES
(69, 34, 'гыгыг', 1, '11.28.13'),
(70, 41, 'gdhgh', 1, '12.01.13'),
(71, 41, 'dfghdfgd', 1, '12.01.13');

-- --------------------------------------------------------

--
-- Структура таблицы `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id_friend` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  PRIMARY KEY (`id_friend`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Дамп данных таблицы `friends`
--

INSERT INTO `friends` (`id_friend`, `user_id`, `friend_id`) VALUES
(23, 1, 2),
(24, 1, 88),
(25, 1, 88),
(26, 1, 2),
(27, 1, 86),
(28, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `like_photo`
--

CREATE TABLE IF NOT EXISTS `like_photo` (
  `id_like_photos` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  PRIMARY KEY (`id_like_photos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;

--
-- Дамп данных таблицы `like_photo`
--

INSERT INTO `like_photo` (`id_like_photos`, `user_id`, `photo_id`) VALUES
(23, 1, 32),
(27, 2, 32),
(28, 2, 32),
(34, 1, 35),
(38, 1, 38),
(39, 1, 40),
(40, 1, 41);

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id_photos` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `url_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_albom` int(11) NOT NULL,
  `photos_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `like_photos` int(11) NOT NULL,
  PRIMARY KEY (`id_photos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=42 ;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id_photos`, `id_user`, `url_photo`, `id_albom`, `photos_name`, `like_photos`) VALUES
(41, 1, '194dd11477e526ab7d4cdbd8b8fe91f9.jpg', 0, '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `support`
--

CREATE TABLE IF NOT EXISTS `support` (
  `id_support` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `support_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `support_message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_support`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `famil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `otchestvo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `podtvr` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `spec_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=89 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `login`, `password`, `mail`, `date`, `famil`, `name`, `otchestvo`, `birthday`, `avatar`, `podtvr`, `spec_user`) VALUES
(1, 'admin', 'admin', 'tailz440@mail.ru', '10.10.10.dgdgdr', 'batulkin', 'pavel', 'mixailovich', '01.01.1800', 'ce7cc3c55aa5eea50ef216ecf45c0cb2.jpg', '', 'Программирование'),
(2, 'user', 'user', '', '', 'Ололоев', 'Ололош', 'Ололоевич', '01.01.1800', '8425addd420bb7fd5dde8a31ae9ca7b2.jpg', '', 'Разработка сайтов'),
(79, 'mmm', 'mmm', 'mmm', '11.14.13', 'mmm', 'mmm', 'mmm', 'mmm', 'mmm', '', ''),
(80, 'hhhh', 'hhhh', 'hhhh', '11.14.13', 'hhh', 'hhh', 'hhhh', 'hhh', 'hhh', '', ''),
(81, 'jjjjj', 'nnnn', 'nnnn', '11.14.13', 'nnn', 'nnn', 'nnnn', 'nnn', 'nnn', '', ''),
(82, 'lllll', 'lll', 'lllll', '11.14.13', 'lllLL', 'llll', 'lll', 'llll', 'lllll', '', ''),
(83, 'kkkkkk', 'nnn', 'kkkkkkkk', '11.14.13', 'jhjhjh', 'jjjhjhj', 'nnn', 'jhjhjh', 'jhjhjh', '', 'Композитор Долбаеб '),
(84, 'jjjj', 'jjjj', 'jjjj', '11.18.13', '', '', 'jjjj', '', '', '', 'Разработка сайтов'),
(85, 'lol', 'lol', 'lol', '11.21.13', 'lols', 'lol', 'lolovi4', '01.01.1800', '', '', 'Разработка сайтов'),
(86, 'kkk', 'kkkk', 'kaka@kkk.com', '11.25.13', '', '', '', '', '', '', 'Мобильные приложения'),
(87, 'ccc', 'ccc', 'ccc', '12.01.13', 'ccc', 'ccc', '', '', '', '', 'Арт'),
(88, 'xxx', 'xxx', 'xxx', '12.01.13', '', '', '', '', '', '', 'xxx');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
