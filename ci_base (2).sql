-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 25 2013 г., 09:35
-- Версия сервера: 5.5.16
-- Версия PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `ci_base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `albom`
--

CREATE TABLE IF NOT EXISTS `albom` (
  `id_albom` int(11) NOT NULL AUTO_INCREMENT,
  `albom_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_albom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `albom`
--

INSERT INTO `albom` (`id_albom`, `albom_name`, `user_id`) VALUES
(1, 'albom01', 1),
(2, 'albom1', 1),
(3, 'albom2', 1),
(4, 'albom3', 1),
(5, 'albom100', 1),
(6, 'albom', 85);

-- --------------------------------------------------------

--
-- Структура таблицы `chat_photos`
--

CREATE TABLE IF NOT EXISTS `chat_photos` (
  `id_chat` int(11) NOT NULL AUTO_INCREMENT,
  `photos_id` int(11) NOT NULL,
  `messages` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_chat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id_photos` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `url_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_albom` int(11) NOT NULL,
  PRIMARY KEY (`id_photos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=86 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `login`, `password`, `mail`, `date`, `famil`, `name`, `otchestvo`, `birthday`, `avatar`, `podtvr`, `spec_user`) VALUES
(1, 'admin', 'admin', 'tailz440@mail.ru', '10.10.10.dgdgdr', 'batulkin', 'pavel', 'mixailovich', '22.03.1993', 'f718641c6081c1c76edda9eb731e1e01.jpg', '', 'Разработка сайтов'),
(2, 'user', 'user', '', '', 'Ололоев', 'Ололош', 'Ололоевич', '01.01.1800', '8425addd420bb7fd5dde8a31ae9ca7b2.jpg', '', 'Разработка сайтов'),
(79, 'mmm', 'mmm', 'mmm', '11.14.13', 'mmm', 'mmm', 'mmm', 'mmm', 'mmm', '', ''),
(80, 'hhhh', 'hhhh', 'hhhh', '11.14.13', 'hhh', 'hhh', 'hhhh', 'hhh', 'hhh', '', ''),
(81, 'jjjjj', 'nnnn', 'nnnn', '11.14.13', 'nnn', 'nnn', 'nnnn', 'nnn', 'nnn', '', ''),
(82, 'lllll', 'lll', 'lllll', '11.14.13', 'lllLL', 'llll', 'lll', 'llll', 'lllll', '', ''),
(83, 'kkkkkk', 'nnn', 'kkkkkkkk', '11.14.13', 'jhjhjh', 'jjjhjhj', 'nnn', 'jhjhjh', 'jhjhjh', '', 'Композитор Долбаеб '),
(84, 'jjjj', 'jjjj', 'jjjj', '11.18.13', '', '', 'jjjj', '', '', '', 'Разработка сайтов'),
(85, 'lol', 'lol', 'lol', '11.21.13', 'lols', 'lol', 'lolovi4', '01.01.1800', '', '', 'Разработка сайтов');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
