CREATE DATABASE IF NOT EXISTS bookflow;
USE bookflow;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 04 2026 г., 14:28
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bookflow`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `year`, `status`) VALUES
(1, 'Гарри Поттер', 'Джоан Роулинг', NULL, 'available'),
(2, 'Война и Мир', 'Лев Толстой', NULL, 'available'),
(3, '1984', 'Оруэлл', NULL, 'available'),
(4, 'Мастер и Маргарита ', 'Александр Булгаков', NULL, 'available'),
(5, '1984', 'George Orwell', 1949, 'available');

-- --------------------------------------------------------

--
-- Структура таблицы `book_items`
--

CREATE TABLE `book_items` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `book_items`
--

INSERT INTO `book_items` (`id`, `book_id`, `status`) VALUES
(1, 1, 'available'),
(2, 2, 'issued'),
(3, 1, 'available'),
(4, 2, 'issued');

-- --------------------------------------------------------

--
-- Структура таблицы `issues`
--

CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `book_item_id` int(11) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `issues`
--

INSERT INTO `issues` (`id`, `order_id`, `book_item_id`, `issue_date`, `return_date`) VALUES
(1, 2, 3, '2026-01-02', '2026-06-01'),
(2, 1, NULL, '2026-05-05', '2026-06-05');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `created_at`, `book_id`) VALUES
(1, 1, 'pending', '2026-01-01 10:00:00', 1),
(2, 2, 'approved', '2026-01-02 12:00:00', NULL),
(3, 1, 'pending', '2026-01-01 10:00:00', NULL),
(4, 2, 'approved', '2026-01-02 12:00:00', NULL),
(5, 1, 'pending', '2026-05-05 17:41:30', NULL),
(6, 5, 'new', '2026-05-19 18:34:54', 5),
(7, 5, 'new', '2026-05-19 18:34:56', 1),
(8, 5, 'new', '2026-05-19 18:34:59', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$10$pIowWujf9bpAatP.QXC16ul3/nx8rH8/r2wUZ86Et9dCY9UjN7lXS', 'admin'),
(2, 'admin', 'admin@mail.com', '$2y$10$4s0mixPbxUWWuCwzg4/.FuXY82gIdYlaKqc2d.sV/VnAQiJtDUSNe', 'admin'),
(3, 'Admin', 'admin@mail.com', '123', 'admin'),
(4, 'Admin', 'admin@mail.com', '123', 'admin'),
(5, 'User', 'user@mail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(6, 'user', 'user@mail.ru', '123', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `book_items`
--
ALTER TABLE `book_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `book_items`
--
ALTER TABLE `book_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
