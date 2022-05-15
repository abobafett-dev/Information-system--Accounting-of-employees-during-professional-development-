-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Май 25 2021 г., 12:03
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phplablaravel_is`
--

-- --------------------------------------------------------

--
-- Структура таблицы `department`
--

CREATE TABLE `department` (
  `id` smallint(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `department`
--

INSERT INTO `department` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Внедрение', '2021-05-24 08:29:30', NULL),
(3, 'Разработка', '2021-05-24 08:29:44', '2021-04-29 16:31:45');

-- --------------------------------------------------------

--
-- Структура таблицы `position`
--

CREATE TABLE `position` (
  `id` smallint(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `position`
--

INSERT INTO `position` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Программист I', '2021-05-24 08:29:10', NULL),
(3, 'Программист II', '2021-05-24 08:29:20', '2021-04-28 16:22:45');

-- --------------------------------------------------------

--
-- Структура таблицы `qualification`
--

CREATE TABLE `qualification` (
  `id` smallint(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `qualification`
--

INSERT INTO `qualification` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, '1С:Специалист', '2021-05-24 08:30:25', NULL),
(3, '1С:Бухгалтерия 8', '2021-05-24 08:30:50', '2021-04-29 16:46:36');

-- --------------------------------------------------------

--
-- Структура таблицы `staff`
--

CREATE TABLE `staff` (
  `id` smallint(6) NOT NULL,
  `fk_position` smallint(6) NOT NULL,
  `fk_department` smallint(6) NOT NULL,
  `passport` varchar(10) NOT NULL,
  `fio` varchar(200) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `staff`
--

INSERT INTO `staff` (`id`, `fk_position`, `fk_department`, `passport`, `fio`, `updated_at`, `created_at`) VALUES
(1, 1, 1, '7115584937', 'Харитонов Валерий Александрович', '2021-05-24 08:34:49', NULL),
(5, 3, 3, '7114382947', 'Алексий Алексей Алексеевич', '2021-05-24 08:35:14', '2021-04-29 19:04:52'),
(9, 1, 1, '7114130010', 'Нестеров Григорий Алексеевич', '2021-05-25 07:20:34', '2021-05-25 07:20:34');

-- --------------------------------------------------------

--
-- Структура таблицы `staff-training`
--

CREATE TABLE `staff-training` (
  `fk_training` smallint(6) NOT NULL,
  `fk_staff` smallint(6) NOT NULL,
  `certificate` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `staff-training`
--

INSERT INTO `staff-training` (`fk_training`, `fk_staff`, `certificate`, `updated_at`, `created_at`) VALUES
(1, 5, '1_5.pdf', '2021-05-10 12:20:09', '2021-05-10 12:20:09'),
(1, 9, NULL, '2021-05-25 09:03:02', '2021-05-25 09:03:02'),
(26, 1, NULL, '2021-05-25 08:11:30', '2021-05-25 08:11:30');

-- --------------------------------------------------------

--
-- Структура таблицы `training`
--

CREATE TABLE `training` (
  `id` smallint(6) NOT NULL,
  `fk_type` smallint(6) NOT NULL,
  `fk_qualification` smallint(6) NOT NULL,
  `fk_training_organization` smallint(6) NOT NULL,
  `date_start` date NOT NULL,
  `date_expiration` date NOT NULL,
  `price_per_hour` mediumint(9) DEFAULT NULL,
  `duration_in_hours` mediumint(9) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `training`
--

INSERT INTO `training` (`id`, `fk_type`, `fk_qualification`, `fk_training_organization`, `date_start`, `date_expiration`, `price_per_hour`, `duration_in_hours`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1, '2021-04-25', '2021-04-26', 1500, 4, NULL, NULL),
(26, 1, 3, 1, '2021-05-11', '2021-05-14', 2500, 72, '2021-05-25 07:21:08', '2021-05-25 07:21:08');

-- --------------------------------------------------------

--
-- Структура таблицы `training_organization`
--

CREATE TABLE `training_organization` (
  `id` smallint(6) NOT NULL,
  `inn` varchar(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `training_organization`
--

INSERT INTO `training_organization` (`id`, `inn`, `name`, `updated_at`, `created_at`) VALUES
(1, '7202063430', 'Учебный центр \"Дельфа\"', '2021-05-24 08:32:30', NULL),
(2, '5029137695', 'ЧУ ДПО \"Учебный центр \"Специалист\"', '2021-05-24 08:33:53', '2021-04-29 17:04:58');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `id` smallint(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Длительное', '2021-05-24 08:31:06', NULL),
(4, 'Семинар', '2021-05-24 08:31:19', '2021-05-24 08:31:19');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_department` (`fk_department`),
  ADD KEY `fk_position` (`fk_position`);

--
-- Индексы таблицы `staff-training`
--
ALTER TABLE `staff-training`
  ADD PRIMARY KEY (`fk_training`,`fk_staff`),
  ADD KEY `fk_staff` (`fk_staff`);

--
-- Индексы таблицы `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_type` (`fk_type`),
  ADD KEY `fk_qualification` (`fk_qualification`),
  ADD KEY `fk_training_organization` (`fk_training_organization`);

--
-- Индексы таблицы `training_organization`
--
ALTER TABLE `training_organization`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `department`
--
ALTER TABLE `department`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `position`
--
ALTER TABLE `position`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `staff`
--
ALTER TABLE `staff`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `training`
--
ALTER TABLE `training`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `training_organization`
--
ALTER TABLE `training_organization`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`fk_department`) REFERENCES `department` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`fk_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `staff-training`
--
ALTER TABLE `staff-training`
  ADD CONSTRAINT `staff-training_ibfk_1` FOREIGN KEY (`fk_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `staff-training_ibfk_2` FOREIGN KEY (`fk_training`) REFERENCES `training` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `training_ibfk_1` FOREIGN KEY (`fk_type`) REFERENCES `type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `training_ibfk_2` FOREIGN KEY (`fk_qualification`) REFERENCES `qualification` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `training_ibfk_3` FOREIGN KEY (`fk_training_organization`) REFERENCES `training_organization` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
