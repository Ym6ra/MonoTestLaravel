-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 14 2022 г., 23:07
-- Версия сервера: 8.0.29
-- Версия PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel_test_bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `autos`
--

CREATE TABLE `autos` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `mark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `autos`
--

INSERT INTO `autos` (`id`, `client_id`, `mark`, `model`, `color`, `number`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 'рено', 'седан', '#000000', 'а123фы', 'Присутствует', '2022-11-14 08:57:02', '2022-11-14 14:11:03'),
(4, 2, 'гранта', 'седан', '#000000', 'р342оо', 'Присутствует', '2022-11-14 08:57:21', '2022-11-14 08:57:21'),
(9, 8, 'рено', 'седан', '#d41111', 'а241аа', 'Присутствует', '2022-11-14 14:23:41', '2022-11-14 14:23:41'),
(10, 8, 'тайота', 'седан', '#211ec2', 'а212па', 'Присутствует', '2022-11-14 14:24:09', '2022-11-14 14:24:09'),
(11, 9, 'газель', 'уаз', '#0fb0e6', 'р123рр', 'Присутствует', '2022-11-14 14:31:17', '2022-11-14 14:31:17'),
(12, 8, 'тест', 'тест', '#000000', 'ф123ыф', 'Присутствует', '2022-11-14 15:13:51', '2022-11-14 15:13:51'),
(13, 1, 'пежо', 'крутая', '#a63f3f', 'п370оп', 'Присутствует', '2022-11-14 15:33:27', '2022-11-14 15:33:27'),
(15, 1, 'пежо', 'еще круче', '#a63f3f', 'п371оп', 'Присутствует', '2022-11-14 15:34:49', '2022-11-14 15:34:49'),
(16, 9, 'ваз', 'уаз', '#000000', 'г123аз', 'Присутствует', '2022-11-14 15:36:16', '2022-11-14 15:36:16'),
(18, 9, 'ваз', 'уаз', '#000000', 'г124аз', 'Присутствует', '2022-11-14 15:38:01', '2022-11-14 15:38:01'),
(19, 9, 'лада', 'гранта', '#d41c1c', 'л444ав', 'Присутствует', '2022-11-14 15:38:33', '2022-11-14 15:38:33'),
(20, 1, 'рено', 'логан', '#7c7599', 'р333но', 'Присутствует', '2022-11-14 15:44:27', '2022-11-14 15:44:27'),
(21, 1, 'рено', 'логан', '#7c7599', 'р334но', 'Присутствует', '2022-11-14 15:45:31', '2022-11-14 15:45:31'),
(22, 2, 'тест', 'тест', '#000000', 'тест', 'Присутствует', '2022-11-14 15:52:43', '2022-11-14 15:52:43'),
(23, 13, 'тест', 'тест', '#000000', '1234', 'Присутствует', '2022-11-14 16:01:35', '2022-11-14 16:01:35'),
(25, 13, 'тест', 'тест', '#000000', '1236', 'Присутствует', '2022-11-14 16:03:19', '2022-11-14 16:03:19'),
(28, 13, 'sdfsdf', 'sdfasdf', '#000000', '4233', 'Присутствует', '2022-11-14 16:06:41', '2022-11-14 16:06:41');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cars` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`, `gender`, `phone`, `address`, `cars`, `created_at`, `updated_at`) VALUES
(1, 'Илья', 'муж', '88005553454', 'город', 1, '2022-11-14 08:25:17', '2022-11-14 10:38:41'),
(2, 'наталья', 'иное', '23232548', 'город', 1, '2022-11-14 08:56:20', '2022-11-14 08:56:20'),
(8, 'Макисм', 'муж', '8800555343', 'город', 1, '2022-11-14 14:23:18', '2022-11-14 14:23:18'),
(9, 'Александр', 'муж', '88005553535', 'Проще позвонить, чем у кого-то занимать', 1, '2022-11-14 14:30:45', '2022-11-14 14:30:45'),
(13, 'оксана', 'жен', '12234234235', 'город', 1, '2022-11-14 16:00:19', '2022-11-14 16:00:19');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_11_13_211212_create_clients_table', 1),
(3, '2022_11_13_211226_create_autos_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autos_number_unique` (`number`),
  ADD KEY `autos_client_id_foreign` (`client_id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_phone_unique` (`phone`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `autos`
--
ALTER TABLE `autos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `autos`
--
ALTER TABLE `autos`
  ADD CONSTRAINT `autos_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
