-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 18 2013 г., 08:15
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `albom`
--

INSERT INTO `albom` (`id_albom`, `albom_name`, `user_id`) VALUES
(1, 'albom01', 1),
(2, 'albom1', 1),
(3, 'albom2', 1),
(4, 'albom3', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id_photos`, `id_user`, `url_photo`, `id_albom`) VALUES
(9, 1, '0031.jpg', 2),
(10, 1, '001.jpg', 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=84 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `login`, `password`, `mail`, `date`, `famil`, `name`, `otchestvo`, `birthday`, `avatar`, `podtvr`, `spec_user`) VALUES
(1, 'admin', 'admin', '', '', '', '', '', '', '', '', ''),
(2, 'user', 'user', '', '', '', '', '', '', '', '', ''),
(51, 'kjk', 'lll', 'lll', '11.12.13', '', '', '', '', '', '', ''),
(52, 'jkjk', 'lll', 'lll', '11.12.13', '', '', '', '', '', '', ''),
(53, 'klklkl', 'lll', 'lll', '11.12.13', '', '', '', '', '', '', ''),
(54, 'lll', 'lll', 'klmmlm', '11.12.13', '', '', '', '', '', '', ''),
(55, 'lll', 'nnn', 'klmklml', '11.12.13', '', '', '', '', '', '', ''),
(56, 'lll', 'lll', '333', '11.12.13', '', '', '', '', '', '', ''),
(57, 'dfgdfgdfg', 'kkk', 'dtgtrgtgd', '11.12.13', '', '', '', '', '', '', ''),
(58, 'fgd', '777', 'kmlm', '11.12.13', '', '', '', '', '', '', ''),
(59, 'iuhi', 'hhh', 'uhuih', '11.12.13', '', '', '', '', '', '', ''),
(60, 'kklfldk', 'jkj', 'aaa@nnn.com_', '11.12.13', '', '', '', '', '', '', ''),
(61, 'admin____', 'aaa', 'admin', '11.12.13', '', '', '', '', '', '', ''),
(62, 'ddd', 'ddd', 'ddd@', '11.12.13', '', '', '', '', '', '', ''),
(63, 'sss', 'sss', 'sss@', '11.12.13', '', '', '', '', '', '', ''),
(64, 'qqq', 'qqq', 'qqq', '11.12.13', '', '', '', '', '', '', ''),
(65, 'fff', 'fff', 'fff', '11.12.13', '', '', '', '', '', '', ''),
(66, 'aaaaa', 'aaaaa', 'aaaaa', '11.12.13', '', '', '', '', '', '', ''),
(67, 'xxx', 'xxxx', 'xx-xx@xxx', '11.12.13', '', '', '', '', '', '', ''),
(68, 'rrr', 'rrr', 'rrr', '11.12.13', '', '', '', '', '', '', ''),
(69, '22333', '333', '3333', '11.12.13', '', '', '', '', '', '', ''),
(70, 'fffff', 'fff', 'fff@ff.ff', '11.14.13', '', '', '', '', '', '', ''),
(71, 'nnnn', 'nnnn', 'nnn@nn.ru', '11.14.13', '', '', '', '', '', '', ''),
(72, 'zzx', 'zzz', 'zzz', '11.14.13', '', '', '', '', '', '', ''),
(73, 'hhh', 'hhh', 'hhh', '11.14.13', '', '', 'hhh', '', '', '', ''),
(74, 'jjj', 'hhh', 'jjj', '11.14.13', 'hhh', 'hhh', 'hhh', 'hhh', 'jjj', '', ''),
(75, 'bbb', 'bbb', 'bbb', '11.14.13', 'bbb', 'bbb', 'bbb', 'bbb', 'bbb', '', ''),
(76, 'kkkk', 'kkk', 'kkkk', '11.14.13', 'kkk', 'kkk', 'kkk', 'kkk', 'kkk', '', ''),
(77, 'vvv', 'vvv', 'vvv', '11.14.13', 'vvv', 'vvv', 'vvv', 'vvv', 'vvv', '', ''),
(78, 'nnn', 'nnn', 'nnn', '11.14.13', 'nnn', 'nnn', 'nnn', 'nnn', 'nnn', '', ''),
(79, 'mmm', 'mmm', 'mmm', '11.14.13', 'mmm', 'mmm', 'mmm', 'mmm', 'mmm', '', ''),
(80, 'hhhh', 'hhhh', 'hhhh', '11.14.13', 'hhh', 'hhh', 'hhhh', 'hhh', 'hhh', '', ''),
(81, 'jjjjj', 'nnnn', 'nnnn', '11.14.13', 'nnn', 'nnn', 'nnnn', 'nnn', 'nnn', '', ''),
(82, 'lllll', 'lll', 'lllll', '11.14.13', 'lllLL', 'llll', 'lll', 'llll', 'lllll', '', ''),
(83, 'kkkkkk', 'nnn', 'kkkkkkkk', '11.14.13', 'jhjhjh', 'jjjhjhj', 'nnn', 'jhjhjh', 'jhjhjh', '', 'Композитор Долбаеб ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
