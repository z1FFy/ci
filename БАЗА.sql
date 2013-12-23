-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 23 2013 г., 12:42
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `chat_friends`
--

CREATE TABLE IF NOT EXISTS `chat_friends` (
  `id_chat_friends` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `adresat` int(11) NOT NULL,
  `messages` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unread` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_chat_friends`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=44 ;

--
-- Дамп данных таблицы `chat_friends`
--

INSERT INTO `chat_friends` (`id_chat_friends`, `user_id`, `adresat`, `messages`, `message_date`, `unread`) VALUES
(1, 3, 1, 'ghfhgh', '1387367517', 'read'),
(2, 3, 1, 'fgh', '1387367522', 'read'),
(3, 1, 3, 'qwer', '1387367582', 'read'),
(4, 1, 3, 'sdf', '1387368164', 'read'),
(5, 1, 3, 'fsdgsdfg', '1387369924', 'read'),
(6, 1, 3, 'sdfgsdfg', '1387369926', 'read'),
(7, 2, 1, 'zxcvzxcv', '1387369942', 'unread'),
(8, 2, 1, 'zxcvzxvcz', '1387369944', 'unread'),
(9, 2, 3, 'afsdfs', '1387369957', 'unread'),
(10, 2, 3, 'dfsdf', '1387369959', 'unread'),
(11, 2, 3, 'sdfsdf', '1387369961', 'unread'),
(12, 3, 1, 'tttt', '1387627294', 'read'),
(13, 30, 5, 'dgfgdf', '1387627322', 'unread'),
(14, 30, 3, 'gdfgdfg', '1387627327', 'read'),
(15, 3, 30, 'gdfgfg', '1387629118', 'read'),
(16, 3, 30, 'gdfgd', '1387629120', 'read'),
(17, 3, 1, 'fdgdf', '1387629124', 'read'),
(18, 30, 3, 'asdasd', '1387629140', 'read'),
(19, 1, 3, 'yui', '1387777481', 'read'),
(20, 1, 3, 'yyy', '1387777536', 'read'),
(21, 1, 3, '456456', '1387777553', 'read'),
(22, 3, 30, 'dasda', '1387777620', 'unread'),
(23, 3, 30, 'asds', '1387777622', 'unread'),
(24, 3, 1, 'asdasd', '1387777636', 'unread'),
(25, 3, 30, 'jkjjn', '1387777840', 'unread'),
(26, 3, 30, 'jioojoji', '1387777860', 'unread'),
(27, 3, 30, 'sdfsd', '1387778331', 'unread'),
(28, 3, 30, 'asd', '1387778342', 'unread'),
(29, 3, 1, 'safsdf', '1387778376', 'unread'),
(30, 3, 1, 'fdsfsd', '1387778506', 'unread'),
(31, 3, 1, 'sdfsdf', '1387778541', 'unread'),
(32, 3, 1, 'dfgdfg', '1387778569', 'unread'),
(33, 3, 1, 'rtyrtyr', '1387778636', 'unread'),
(34, 3, 1, 'rtyrtyr', '1387778820', 'unread'),
(35, 3, 1, 'asd', '1387778827', 'unread'),
(36, 3, 1, 'asd', '1387778837', 'unread'),
(37, 3, 1, 'dasd', '1387778842', 'unread'),
(38, 3, 1, 'qweqwe', '1387778872', 'unread'),
(39, 3, 1, 'qweqwe', '1387778926', 'unread'),
(40, 3, 1, 'tyutyu', '1387778976', 'unread'),
(41, 3, 1, 'tryrty', '1387778999', 'unread'),
(42, 3, 1, 'fdgdfg', '1387779115', 'unread'),
(43, 3, 1, 'rwerw', '1387779123', 'unread');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id_friend` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `subscribe_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_friend`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=127 ;

--
-- Дамп данных таблицы `friends`
--

INSERT INTO `friends` (`id_friend`, `user_id`, `friend_id`, `subscribe_date`) VALUES
(125, 30, 3, '1387636099'),
(126, 3, 1, '1387779115');

-- --------------------------------------------------------

--
-- Структура таблицы `like_photo`
--

CREATE TABLE IF NOT EXISTS `like_photo` (
  `id_like_photos` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  PRIMARY KEY (`id_like_photos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=74 ;

--
-- Дамп данных таблицы `like_photo`
--

INSERT INTO `like_photo` (`id_like_photos`, `user_id`, `photo_id`) VALUES
(26, 1, 1),
(72, 3, 11),
(73, 30, 11);

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
  `min` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photos_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_photos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id_photos`, `id_user`, `url_photo`, `id_albom`, `photos_name`, `like_photos`, `min`, `photos_date`) VALUES
(22, 3, '3ed08de4cbd0cd11fcaabb20c7627873.jpg', 0, '', 0, 'none', '1387636035'),
(23, 3, '1e289eaca0ecbb9bd210142ca4904258.jpg', 0, '', 0, 'min', '1387636042'),
(24, 30, 'a8f891eef8a7537d384d7216700a312c.jpg', 0, '', 0, 'min', '1387636056'),
(25, 30, '04db968c8d627ea80ffc91081947dbec.jpg', 0, '', 0, 'min', '1387636076'),
(26, 3, 'daa7b544df46346da635d92d2a2ff448.jpg', 0, '', 0, 'min', '1387636147'),
(27, 1, '7b47917d6c7928811fbd4cc44be3afac.jpg', 0, '', 0, 'min', '1387780188');

-- --------------------------------------------------------

--
-- Структура таблицы `subscribe`
--

CREATE TABLE IF NOT EXISTS `subscribe` (
  `subscribe_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `second_user` int(11) NOT NULL,
  `subscribe_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`subscribe_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `subscribe`
--

INSERT INTO `subscribe` (`subscribe_id`, `user_id`, `second_user`, `subscribe_date`) VALUES
(7, 3, 1, '1387779867');

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
  `sex` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `education_level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `education_basic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facultet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `education_end` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dop_telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `interests` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastactivity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `login`, `password`, `mail`, `date`, `famil`, `name`, `otchestvo`, `birthday`, `avatar`, `podtvr`, `spec_user`, `sex`, `education_level`, `education_basic`, `facultet`, `education_end`, `language`, `sity`, `telephone`, `dop_telephone`, `skype`, `website`, `interests`, `lastactivity`) VALUES
(1, 'tailz440', 'tailz440', 'tailz440@mail.ru', '12.04.13', 'Батулкин', 'Павел', 'Михайлович', '01.01.1800', '9a0d0c928aaefcc58e3718201d3bd925.jpg', '', 'Разработка сайтов', 'не выбран', 'Высшее', 'МПТ', 'Программное обеспечение вычислтельной техники и автоматизированных систем', '1900', 'Русский, Английский(технический)', '', '', '', '', '', '', '1387780188'),
(2, 'ziffy', 'ziffy', 'ziffy@hhh', '12.04.13', 'Кущенко', 'Денис', '', '', '58f9b88f7ba7c32e45c8e0f83059f552.jpg', '', 'Лошара от бога', '', '', '', '', '', '', '', '', '', '', '', '', '1387369934'),
(3, 'admin', 'admin', '`skype`', '12.06.13', 'eee', 'eeee', ''' ', '', 'e2ed1ee89ee362e03058dd826a4abbc0.jpeg', '8', 'Разработка сайтов', 'Мужской', 'Доктор наук', 'sdfg', 'sdfgsdfg', '1904', 'sdfg', 'Москва', 'sdfg', 'sdfg', 'sdfgsdfg', 'http://mail.ru', '                  sadfsadf asdfsdf asdfasdf\r\nasdfasdf asdfasdf asdfasdf                 ', '1387796460'),
(4, 'qqq', 'qqq', 'qqq', '12.08.13 06:12:10', 'qqq', 'qqq', '', '', '', 's', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'dfgdfg', 'ggg', 'dgdfgd', '12.08.13 06:15:44', 'fffdg', 'gfghf', '', '', '', '7', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'iuhiuhiuhhui', 'hhh', 'hiuhiuh', '12.08.13 06:17:07', 'huhiuhiuhu', 'hiuhiuh', '', '', '', 'V', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'fghdfgh', 'hhh', 'hfdghdfgh', '12.08.13 06:26:53', 'fgdhfg', 'gfhfg', '', '', '', 'K', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'etyerty', '444', 'ertry', '12.08.13 07:19:53', 'tet', 'ryertyr', '', '', '', 'F', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'ertwert', 'ttt', 'ewtert', '12.08.13 07:33:33', 'erert', 'wertwert', '', '', '', 'M', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'fgjhfg', 'jjj', 'jhfgjhfg', '12.08.13 07:34:01', 'fghjf', 'ghjfgjh', '', '', '', 'M', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'ghdfgh', 'hhh', 'dfghdfgh', '12.08.13 07:34:20', 'dgfhdfgh', 'dfghdf', '', '', '', 'l', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'fasdf', 'ddd', 'asfsdf', '12.08.13 09:15:24', 'saf', 'sadfasd', '', '', '', 'P', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'sdafsdf', 'vvv', 'dsafsdf', '12.08.13 09:15:52', 'sdf', 'sdf', '', '', '', '2', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'gdfgdfg', 'bbb', 'bbb', '12.08.13 09:16:08', 'dfgdf', 'gdfgdf', '', '', '', '1', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 'dsa', 'dsa', 'dsa', '12.08.13 04:04:56', 'asdasd', 'asdasd', '', '', '', 'k', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'zxc', 'zxc', 'zxc', '12.08.13 04:05:09', 'asdasd', 'asdasd', '', '', '', 'S', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'ggg', 'zxc', 'ggg', '12.08.13 04:05:16', 'asdasd', 'asdasd', '', '', '', 'T', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'qwer', 'qwe', 'qwer', '12.08.13 04:05:38', 'asdasd', 'asdasd', '', '', '', 'O', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'ccc', 'ccc', 'tailz440@mail.ru', '09.12.13 06:22:49', 'asds', 'dsadasd', '', '', '', 'E', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 'dfasdf', 'ddd', 'tailz440@mail.ru', '09.12.13 06:36:48', 'asdf', 'sadfas', '', '', '', 'B', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 'dfasdfgfhf', 'bbb', 'bvnvbn', '09.12.13 06:38:12', 'asdf', 'sadfas', '', '', '', 'C', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(22, 'dasdas', 'ggg', 'dasdasd', '09.12.13 06:39:48', 'dasd', 'asdas', '', '', '', 'I', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, 'vvv', 'vvv', 'vvv', '09.12.13 06:51:35', 'asdf', 'asdf', '', '', '', 'U', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, 'vvvv', 'vvv', 'vvv', '09.12.13 06:52:16', 'asdf', 'asdf', '', '', '', 'A', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, 'asdasd', 'sss', 'asdasd', '09.12.13 06:57:11', 'asda', 'sdasd', '', '', '', 'h', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, 'asdasdasd', 'sss', 'asdasda', '09.12.13 06:59:56', 'asdas', 'dasd', '', '', '', 'P', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, 'aaa', 'aaa', 'aaa', '10.12.13 01:25:28', 'павел', 'ввв', '', '01.01.1800', '4136c1e9b83bbbe6438deb6efac2ba09.jpeg', 'C', 'Разработка сайтов', 'не выбран', '', '', '', '1900', '', '', '', '', '', '', '  ', ''),
(28, 'www', 'www', 'www', '12.12.13 11:14:43', 'www', 'www', '', '', 'cff576d6b3b5587fbfb577be57aff688.jpeg', 'V', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(29, 'ttt', 'ttt', 'ttt', '14.12.2013 21:32:36', 'ttt', 'ttt', '', '', 'f04d67ae61e74e96a1e25f226c4379a7.jpeg', '6', 'Разработка сайтов', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(30, 'user', 'user', 'user', '1387471182', 'lolka', 'kokoko', '', '', 'e5a1ee463f496a67f79dfafa7ba38433.jpeg', 'r', 'admin всея Руси', 'Мужской', 'Доктор наук', '', '', '1945', 'с++, delphi, javascript, php', '', '', '', '', '', '  ', '1387786246');

-- --------------------------------------------------------

--
-- Структура таблицы `visit`
--

CREATE TABLE IF NOT EXISTS `visit` (
  `visit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visit_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`visit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Дамп данных таблицы `visit`
--

INSERT INTO `visit` (`visit_id`, `user_id`, `guest_id`, `session_id`, `visit_date`) VALUES
(27, 1, 0, '243327cccdf63f5b2319ebcf3d74eea0', '1387796304'),
(28, 3, 0, 'd4891a584a74fbaf04481a460557b09d', '1387796399'),
(29, 3, 0, '3cb2c7eb16d70214eb8e5359b5f56980', '1387796437');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
