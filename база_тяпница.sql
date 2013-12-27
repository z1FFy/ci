-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 27 2013 г., 04:54
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `albom`
--

INSERT INTO `albom` (`id_albom`, `albom_name`, `user_id`) VALUES
(1, '123', 3),
(2, '123', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `audios`
--

CREATE TABLE IF NOT EXISTS `audios` (
  `id_audios` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `audio_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_audio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `like_audio` int(11) NOT NULL,
  `audio_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_albom` int(11) NOT NULL,
  PRIMARY KEY (`id_audios`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `audios`
--

INSERT INTO `audios` (`id_audios`, `id_user`, `audio_name`, `url_audio`, `like_audio`, `audio_date`, `id_albom`) VALUES
(7, 3, '123', '9f0d26d5d96694e1d23d3588bc5632ff.mp3', 0, '1388109739', 1),
(8, 3, 'rumshtain', '124e0afd65bcd34a554349d196111516.mp3', 0, '1388116318', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `audio_albom`
--

CREATE TABLE IF NOT EXISTS `audio_albom` (
  `id_albom` int(11) NOT NULL AUTO_INCREMENT,
  `albom_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_albom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `audio_albom`
--

INSERT INTO `audio_albom` (`id_albom`, `albom_name`, `user_id`) VALUES
(1, '123', 3),
(2, '321', 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `chat_friends`
--

INSERT INTO `chat_friends` (`id_chat_friends`, `user_id`, `adresat`, `messages`, `message_date`, `unread`) VALUES
(1, 3, 1, 'dgfg', '1388064855', 'unread');

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
-- Структура таблицы `chat_videos`
--

CREATE TABLE IF NOT EXISTS `chat_videos` (
  `id_chat` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NOT NULL,
  `messages` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `friends`
--

INSERT INTO `friends` (`id_friend`, `user_id`, `friend_id`, `subscribe_date`) VALUES
(1, 3, 1, '1388064855');

-- --------------------------------------------------------

--
-- Структура таблицы `like_photo`
--

CREATE TABLE IF NOT EXISTS `like_photo` (
  `id_like_photos` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  PRIMARY KEY (`id_like_photos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `like_photo`
--

INSERT INTO `like_photo` (`id_like_photos`, `user_id`, `photo_id`) VALUES
(2, 3, 30);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id_photos`, `id_user`, `url_photo`, `id_albom`, `photos_name`, `like_photos`, `min`, `photos_date`) VALUES
(28, 3, '95033de7366392ea7ebdb3d206e538bf.jpg', 0, '', 0, 'none', '1387831570'),
(29, 3, '31b3f77d8e1139e30059a2bd6ccc2993.jpg', 1, '', 0, 'none', '1387831584'),
(30, 3, '69e0f6e4eeaa6639ed4389474d86f2d6.jpg', 0, '', 1, 'none', '1387831596'),
(31, 30, '64b74c8061894852461d53ff31a4d8f0.jpg', 0, '', 0, 'min', '1387881463'),
(32, 30, 'fb3a1cfac2a70c6eb97d23a7dd666613.jpg', 0, '', 0, 'none', '1387870442'),
(33, 1, 'bacfce3ca21f8f8d8e4182a2830f9bff.jpg', 0, '', 0, 'none', '1387874121'),
(34, 1, '6aa8b4678de4e5eb4c599edc6ab06378.jpg', 0, '', 0, 'none', '1387874434'),
(35, 30, '69262e0d758a5ae2c76937b3cedebf23.jpg', 0, '', 0, 'min', '1387874798'),
(36, 3, '769d6e09605831bd2f3760dc355be8cb.jpg', 0, '', 0, 'min', '1388072594'),
(37, 3, '041f9978fb971fd1a930c2f2d1b4c19f.jpg', 0, '', 0, 'none', '1388083742'),
(38, 3, '1f6152554e4ab906068a50ebdf8a18f8.jpg', 0, '', 0, 'min', '1388109815');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `subscribe`
--

INSERT INTO `subscribe` (`subscribe_id`, `user_id`, `second_user`, `subscribe_date`) VALUES
(17, 30, 3, '1387833993'),
(20, 3, 1, '1387881388'),
(22, 3, 30, '1387881463');

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
(1, 'tailz440', 'tailz440', 'tailz440@mail.ru', '12.04.13', 'Батулкин', 'Павел', 'Михайлович', '01.01.1800', '9a0d0c928aaefcc58e3718201d3bd925.jpg', '', 'Разработка сайтов', 'не выбран', 'Высшее', 'МПТ', 'Программное обеспечение вычислтельной техники и автоматизированных систем', '1900', 'Русский, Английский(технический)', '', '', '', '', '', '', '1387874434'),
(2, 'ziffy', 'ziffy', 'ziffy@hhh', '12.04.13', 'Кущенко', 'Денис', '', '', '58f9b88f7ba7c32e45c8e0f83059f552.jpg', '', 'Лошара от бога', '', '', '', '', '', '', '', '', '', '', '', '', '1387369934'),
(3, 'admin', 'admin', '`skype`', '12.06.13', 'eee', 'eeee', ''' ', '', 'e2ed1ee89ee362e03058dd826a4abbc0.jpeg', '8', 'Разработка сайтов', 'Мужской', 'Доктор наук', 'sdfg', 'sdfgsdfg', '1904', 'sdfg', 'Москва', 'sdfg', 'sdfg', 'sdfgsdfg', 'http://mail.ru', '                  sadfsadf asdfsdf asdfasdf\r\nasdfasdf asdfasdf asdfasdf                 ', '1388115969'),
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
(30, 'user', 'user', 'user', '1387471182', 'lolka', 'kokoko', '', '', 'e5a1ee463f496a67f79dfafa7ba38433.jpeg', 'r', 'admin всея Руси', 'Мужской', 'Доктор наук', '', '', '1945', 'с++, delphi, javascript, php', '', '', '', '', '', '  ', '1387938673');

-- --------------------------------------------------------

--
-- Структура таблицы `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id_videos` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `video_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kod` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `like_video` int(11) NOT NULL,
  `video_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_videos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `videos`
--

INSERT INTO `videos` (`id_videos`, `id_user`, `video_name`, `kod`, `like_video`, `video_date`) VALUES
(1, 3, '', 'R0Lmxepy6tM', 0, '1387881464'),
(3, 30, '', 'Aiggj8uGY2U', 0, '1387873753'),
(4, 30, '', 'Aiggj8uGY2U', 0, '1387873763'),
(5, 1, '', 'GGm8MrZ_G6A', 0, '1387874133'),
(6, 1, '', 'GGm8MrZ_G6A', 0, '1387874427'),
(7, 30, '', '6zCuXKJsr5E', 0, '1387881467');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=137 ;

--
-- Дамп данных таблицы `visit`
--

INSERT INTO `visit` (`visit_id`, `user_id`, `guest_id`, `session_id`, `visit_date`) VALUES
(31, 3, 30, 'b03bf8dfef2fa3eb7c823042cabecc19', '1387828082'),
(32, 3, 30, 'b03bf8dfef2fa3eb7c823042cabecc19', '1387819442'),
(33, 3, 30, 'b03bf8dfef2fa3eb7c823042cabecc19', '1387214642'),
(34, 3, 30, 'b03bf8dfef2fa3eb7c823042cabecc19', '1385236082'),
(35, 3, 0, 'dd76da79a7a9cbd7ac0cdb7c6c417d62', '1387829098'),
(36, 3, 1, '28fd8bd8bc078ef8e0cfeb8f902a9534', '1387829261'),
(37, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387831618'),
(38, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387832029'),
(39, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387832046'),
(40, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387832668'),
(41, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387832801'),
(42, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387832811'),
(43, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387832816'),
(44, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387832820'),
(45, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387832858'),
(46, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387832865'),
(47, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387832869'),
(48, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387833010'),
(49, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387833056'),
(50, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387833112'),
(51, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387833161'),
(52, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387833213'),
(53, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387833228'),
(54, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387833232'),
(55, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387833284'),
(56, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387833302'),
(57, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387833319'),
(58, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387833412'),
(59, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387833435'),
(60, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387833447'),
(61, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387833467'),
(62, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387833483'),
(63, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387833489'),
(64, 3, 30, '6bc892f4c7c646929d2ad4a65ca4f0c7', '1387833514'),
(65, 3, 30, 'c8741982416285461da3e816d6fe5a86', '1387833701'),
(66, 3, 30, 'c8741982416285461da3e816d6fe5a86', '1387833797'),
(67, 3, 30, 'c8741982416285461da3e816d6fe5a86', '1387833801'),
(68, 3, 30, 'c8741982416285461da3e816d6fe5a86', '1387833818'),
(69, 3, 30, 'c8741982416285461da3e816d6fe5a86', '1387833822'),
(70, 30, 3, '5f5212c9010aaec10ef1254bbb5afd75', '1387833840'),
(71, 30, 3, '5f5212c9010aaec10ef1254bbb5afd75', '1387833848'),
(72, 3, 30, '637abc922920134861870a886425f44d', '1387833925'),
(73, 3, 30, '637abc922920134861870a886425f44d', '1387833932'),
(74, 3, 30, '637abc922920134861870a886425f44d', '1387833936'),
(75, 30, 3, '7c5b246ee1aeb4aa958eabc74ba66d6b', '1387833959'),
(76, 30, 3, '7c5b246ee1aeb4aa958eabc74ba66d6b', '1387833963'),
(77, 3, 30, '03925819a38a794b63aac6cf7c58756c', '1387833979'),
(78, 3, 30, '03925819a38a794b63aac6cf7c58756c', '1387833988'),
(79, 3, 30, '03925819a38a794b63aac6cf7c58756c', '1387833993'),
(80, 3, 30, 'd65ae10d9269e7d4d3188aec69f22ff7', '1387869903'),
(81, 3, 0, '7e6ff1246a1a45fb420f4b89a90cd2a8', '1387870485'),
(82, 30, 3, '7e6ff1246a1a45fb420f4b89a90cd2a8', '1387870962'),
(83, 1, 3, '51e1d94245c1c185f733acadbe978466', '1387874162'),
(84, 1, 3, '51e1d94245c1c185f733acadbe978466', '1387874173'),
(85, 30, 3, '51e1d94245c1c185f733acadbe978466', '1387874198'),
(86, 30, 3, '51e1d94245c1c185f733acadbe978466', '1387874238'),
(87, 30, 3, '51e1d94245c1c185f733acadbe978466', '1387874244'),
(88, 30, 3, '51e1d94245c1c185f733acadbe978466', '1387874249'),
(89, 30, 3, '51e1d94245c1c185f733acadbe978466', '1387874318'),
(90, 1, 3, '51e1d94245c1c185f733acadbe978466', '1387874354'),
(91, 1, 3, '51e1d94245c1c185f733acadbe978466', '1387874361'),
(92, 1, 3, '87fa31b1466a4dcb371f66b0e5c15fda', '1387880558'),
(93, 1, 3, '87fa31b1466a4dcb371f66b0e5c15fda', '1387880623'),
(94, 1, 3, '87fa31b1466a4dcb371f66b0e5c15fda', '1387880675'),
(95, 1, 3, '87fa31b1466a4dcb371f66b0e5c15fda', '1387880692'),
(96, 1, 3, '87fa31b1466a4dcb371f66b0e5c15fda', '1387880748'),
(97, 1, 3, '9dc1bf0bd0d6a1999f8b575dc825b54a', '1387880851'),
(98, 1, 3, '9dc1bf0bd0d6a1999f8b575dc825b54a', '1387880874'),
(99, 1, 3, '9dc1bf0bd0d6a1999f8b575dc825b54a', '1387881002'),
(100, 1, 3, '9dc1bf0bd0d6a1999f8b575dc825b54a', '1387881075'),
(101, 1, 3, '9dc1bf0bd0d6a1999f8b575dc825b54a', '1387881152'),
(102, 1, 3, '9dc1bf0bd0d6a1999f8b575dc825b54a', '1387881182'),
(103, 1, 3, '9dc1bf0bd0d6a1999f8b575dc825b54a', '1387881264'),
(104, 1, 3, '9dc1bf0bd0d6a1999f8b575dc825b54a', '1387881273'),
(105, 1, 3, '9dc1bf0bd0d6a1999f8b575dc825b54a', '1387881286'),
(106, 1, 3, '9dc1bf0bd0d6a1999f8b575dc825b54a', '1387881335'),
(107, 1, 3, '9dc1bf0bd0d6a1999f8b575dc825b54a', '1387881382'),
(108, 1, 3, '9dc1bf0bd0d6a1999f8b575dc825b54a', '1387881387'),
(109, 30, 3, '9dc1bf0bd0d6a1999f8b575dc825b54a', '1387881424'),
(110, 30, 3, '9dc1bf0bd0d6a1999f8b575dc825b54a', '1387881428'),
(111, 30, 3, '9dc1bf0bd0d6a1999f8b575dc825b54a', '1387881451'),
(112, 30, 3, '9dc1bf0bd0d6a1999f8b575dc825b54a', '1387881463'),
(113, 30, 3, '9dc1bf0bd0d6a1999f8b575dc825b54a', '1387881471'),
(114, 30, 3, '9dc1bf0bd0d6a1999f8b575dc825b54a', '1387881477'),
(115, 30, 3, '78dc6c09235fb71a3115d9887adf9f21', '1387881494'),
(116, 1, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387938766'),
(117, 1, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387938774'),
(118, 1, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387938877'),
(119, 1, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387938985'),
(120, 1, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387939018'),
(121, 1, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387939106'),
(122, 1, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387939121'),
(123, 1, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387939145'),
(124, 1, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387939369'),
(125, 1, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387939439'),
(126, 1, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387939445'),
(127, 1, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387939570'),
(128, 1, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387939641'),
(129, 1, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387939706'),
(130, 1, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387939737'),
(131, 1, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387939917'),
(132, 30, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387939939'),
(133, 1, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387940276'),
(134, 30, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387940278'),
(135, 30, 3, '1e749e95709c0e7b34fd5ed12a0e5985', '1387940283'),
(136, 1, 3, '552d2f18a71a8b6ffd3fd4c20b401efe', '1388064850');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
