-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Бер 17 2018 р., 15:56
-- Версія сервера: 10.0.32-MariaDB-0+deb8u1
-- Версія PHP: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `zennarchi`
--

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`id`, `title`, `group`, `created_at`, `updated_at`) VALUES
(1, 'Web розробка', 1, '2018-03-13 11:37:48', '2018-03-13 11:37:48'),
(2, 'Mobile', 1, '2018-03-13 11:37:55', '2018-03-13 11:37:55'),
(3, 'Game Development', 1, '2018-03-13 11:38:05', '2018-03-13 11:38:05'),
(4, 'Англійська мова', 2, '2018-03-13 11:38:15', '2018-03-13 11:38:15'),
(5, 'Німецька мова', 2, '2018-03-13 11:38:21', '2018-03-13 11:38:21'),
(6, 'Французька мова', 2, '2018-03-13 11:38:28', '2018-03-13 11:38:28'),
(7, 'Маркетинг', 3, '2018-03-13 11:38:36', '2018-03-13 11:38:36'),
(9, 'Бізнес-аналітика', 3, '2018-03-13 11:38:54', '2018-03-13 11:38:54'),
(10, 'Інше', 3, '2018-03-13 11:39:07', '2018-03-13 11:39:07');

-- --------------------------------------------------------

--
-- Структура таблиці `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `comments`
--

INSERT INTO `comments` (`id`, `text`, `user_id`, `course_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'норм !', 1, 1, 0, '2018-03-13 11:51:34', '2018-03-13 11:51:34'),
(2, 'Нормальний курс', 1, 1, 0, '2018-03-14 04:36:10', '2018-03-14 04:36:10'),
(3, '123', 1, 1, 0, '2018-03-16 19:38:03', '2018-03-16 19:38:03'),
(4, '123', 1, 1, 0, '2018-03-16 19:38:20', '2018-03-16 19:38:20'),
(5, '123', 1, 1, 0, '2018-03-16 23:44:04', '2018-03-16 23:44:04'),
(6, '123', 1, 1, 0, '2018-03-16 23:46:03', '2018-03-16 23:46:03'),
(7, '123', 1, 1, 0, '2018-03-16 23:46:03', '2018-03-16 23:46:03');

-- --------------------------------------------------------

--
-- Структура таблиці `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `students` int(11) NOT NULL DEFAULT '0',
  `structure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `demo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci,
  `requirements` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `short_description`, `image`, `category_id`, `user_id`, `students`, `structure`, `demo`, `skills`, `requirements`, `status`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Вивчення англійської мови', 'Вивчіть англійську мову за місяць онлайн !!! Вивчіть англійську мову за місяць онлайн !!! Вивчіть англійську мову за місяць онлайн !!! Вивчіть англійську мову за місяць онлайн !!! Вивчіть англійську мову за місяць онлайн !!! Вивчіть англійську мову за місяць онлайн !!! Вивчіть англійську мову за місяць онлайн !!! Вивчіть англійську мову за місяць онлайн !!! Вивчіть англійську мову за місяць онлайн !!! Вивчіть англійську мову за місяць онлайн !!!', 'Вивчіть англійську мову за місяць онлайн !!!', 'SS9aVlJ5Kp.jpeg', 4, 1, 0, '[\"eRZIDtNhJv.mp4\",\"LR4nHr9t3C.mp4\"]', 'wIhUUEuCVS.mp4', 'Рівень Upper в англійській мові', '- Бажання вчитися\r\n- 3 години вільного часу на тиждень\r\n- Знання на базовому рівні', 1, 10, '2018-03-13 11:43:43', '2018-03-13 11:50:51');

-- --------------------------------------------------------

--
-- Структура таблиці `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(97, '2014_10_12_000000_create_users_table', 1),
(98, '2014_10_12_100000_create_password_resets_table', 1),
(99, '2018_02_22_191603_create_categories_table', 1),
(100, '2018_02_22_192201_create_comments_table', 1),
(101, '2018_02_22_192218_create_courses_table', 1),
(102, '2018_03_08_145257_create_words_table', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'test',
  `status` int(11) NOT NULL DEFAULT '0',
  `is_admin` int(11) NOT NULL DEFAULT '0',
  `money` int(11) NOT NULL DEFAULT '0',
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `courses_count` int(11) NOT NULL DEFAULT '0',
  `students` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `is_admin`, `money`, `short_description`, `description`, `courses_count`, `students`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'archi', '1@1.ua', '$2y$10$dUtXPX2v9PvCFg1uJBn5J.Jlhr99eX.pyASE4ngC4wWpGi8L6c7pe', 1, 1, 0, NULL, NULL, 0, 0, 'JGx4GZg6HeZuotK3D4mj9habxyiyWYtQ8jNKkRtq3rACiJevExHbrEcU9XC8', '2018-03-13 11:34:39', '2018-03-13 11:34:39');

-- --------------------------------------------------------

--
-- Структура таблиці `words`
--

CREATE TABLE `words` (
  `id` int(10) UNSIGNED NOT NULL,
  `word` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(250));

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблиці `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблиці `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `words`
--
ALTER TABLE `words`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
