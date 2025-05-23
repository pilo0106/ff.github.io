-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-05-23 06:12:53
-- 伺服器版本： 10.4.25-MariaDB
-- PHP 版本： 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `friend_fiduciary`
--

-- --------------------------------------------------------

--
-- 資料表結構 `callboard`
--

CREATE TABLE `callboard` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `callboard`
--

INSERT INTO `callboard` (`id`, `content`, `created_at`) VALUES
(1, '紀錄功能已完成', '2022-12-29 15:44:59'),
(2, '通知功能已完成，通知將保留10天就會進行刪除', '2022-12-29 16:17:59'),
(3, '密碼郵件修改功能已完成', '2022-12-29 16:32:28');

-- --------------------------------------------------------

--
-- 資料表結構 `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `nickname` varchar(12) NOT NULL,
  `object` varchar(12) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `contacts`
--

INSERT INTO `contacts` (`id`, `username`, `nickname`, `object`, `created_at`) VALUES
(5, 'pilo', 'test:)', 'test', '2022-12-27 18:22:05'),
(7, 'Edica_811', 'pilo', 'pilo', '2022-12-27 20:29:55'),
(19, 'obbomax', 'pilo', 'pilo', '2022-12-27 21:05:44'),
(20, 'obbomax', 'edica_811', 'edica_811', '2022-12-27 21:06:15'),
(21, 'obbomax', 'test', 'test', '2022-12-27 21:07:20'),
(22, 'pilo', 'obbomax', 'obbomax', '2022-12-28 00:59:43'),
(23, 'pilo', 'edica_811', 'edica_811', '2022-12-28 00:59:54'),
(28, 'ann0131', 'pilo', 'pilo', '2022-12-29 19:14:59'),
(29, 'pilo', 'ann0131', 'ann0131', '2022-12-29 19:54:38'),
(30, 'pilo', 'ning', 'ning', '2022-12-29 20:03:42'),
(31, 'ning', 'pilo', 'pilo', '2022-12-29 20:38:11'),
(32, 'edica_811', 'obbomax', 'obbomax', '2022-12-29 20:56:57'),
(34, 'yung2h3n', 'pilo', 'pilo', '2022-12-29 21:14:59'),
(35, 'blueguy', 'pilo', 'pilo', '2022-12-29 23:35:43'),
(36, 'pilo', 'blueguy', 'blueguy', '2023-01-03 15:26:09'),
(42, 'night22', 'pilo', 'pilo', '2023-01-13 14:21:28'),
(44, 'pilo', 'night22', 'night22', '2023-01-13 14:33:59'),
(48, 'night22', 'ning', 'ning', '2023-01-14 09:11:04'),
(49, 'ryankert', 'pilo', 'pilo', '2023-01-14 11:56:36'),
(50, 'pilo', 'ryankert', 'ryankert', '2023-01-14 11:57:21'),
(51, 'vincent727 ', 'pilo', 'pilo', '2023-01-14 23:55:52'),
(52, 'pilo', 'vincent727', 'vincent727', '2023-01-16 00:13:26');

-- --------------------------------------------------------

--
-- 資料表結構 `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `creater` varchar(12) NOT NULL,
  `to_user` varchar(12) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `notice`
--

INSERT INTO `notice` (`id`, `creater`, `to_user`, `created_at`) VALUES
(5, 'pilo', 'ann0131', '2022-12-29 19:54:51'),
(7, 'pilo', 'edica_811', '2022-12-29 20:22:35'),
(8, 'ning', 'pilo', '2022-12-29 20:38:36'),
(9, 'pilo', 'ning', '2022-12-29 20:45:47'),
(10, 'obbomax', 'edica_811', '2022-12-29 20:57:30'),
(11, 'obbomax', 'edica_811', '2022-12-29 20:59:48'),
(15, 'blueguy', 'pilo', '2022-12-29 23:36:04'),
(28, 'ryankert', 'pilo', '2023-01-14 11:57:05'),
(29, 'vincent727 ', 'pilo', '2023-01-14 23:56:08');

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `debtor` varchar(12) NOT NULL,
  `creditor` varchar(12) NOT NULL,
  `money` int(10) UNSIGNED NOT NULL,
  `notes` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `dt_state` varchar(5) NOT NULL,
  `ct_state` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `record`
--

INSERT INTO `record` (`id`, `debtor`, `creditor`, `money`, `notes`, `created_at`, `dt_state`, `ct_state`) VALUES
(39, 'pilo', 'ann0131', 75, '飲料', '2022-12-29 19:54:51', '已完成', '已完成'),
(41, 'pilo', 'edica_811', 70, '火鍋', '2022-12-29 20:22:35', '未還', '未還'),
(42, 'ning', 'pilo', 0, '0', '2022-12-29 20:38:36', '已完成', '已完成'),
(43, 'ning', 'pilo', 50, '', '2022-12-29 20:45:47', '已完成', '已完成'),
(44, 'obbomax', 'edica_811', 590, 'Red dead 2', '2022-12-29 20:57:30', '已完成', '未還'),
(45, 'edica_811', 'obbomax', 300000, 'Tax fraud', '2022-12-29 20:59:48', '待確認', '已確認'),
(49, 'pilo', 'blueguy', 8787, '太帥', '2022-12-29 23:36:04', '已完成', '已完成'),
(62, 'pilo', 'ryankert', 1, 'P', '2023-01-14 11:57:05', '已完成', '已完成'),
(63, 'vincent727 ', 'pilo', 25, '舒跑', '2023-01-14 23:56:08', '未還', '未還');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `account` varchar(12) NOT NULL,
  `password` varchar(15) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `mail`, `created_at`) VALUES
(1, 'pilo', 'kiki7147', 'kikisu0106@gmail.com', '2022-12-27 14:00:29'),
(2, 'test', '13579', '12345@gmail.com', '2022-12-27 18:16:35'),
(3, 'obbomax', 'Iammax95', 'editobbomax@gmail.com', '2022-12-27 20:12:26'),
(4, 'Edica_811', '123456789', 'abirafzal2001811@gmail.com', '2022-12-27 20:16:21'),
(20, 'ning', '20221229', 'yenningchan1104@gmail.com', '2022-12-29 17:20:16'),
(21, 'archi7777', 'Qazqaz1234', 'wpc517@gmail.com', '2022-12-29 18:21:04'),
(22, 'ann0131', 'ann900131', 'ann33happy@gmail.com', '2022-12-29 19:14:20'),
(23, 'zijunwei', 'zijun2004', 'zijun1152@gmail.com', '2022-12-29 19:23:51'),
(27, 'yung2h3n', '67890123', 'YungHeng66754168@gmail.com', '2022-12-29 21:14:35'),
(28, 'blueguy', 'sohandsome', 'blueguy@gmail.com', '2022-12-29 23:22:14'),
(32, 'vincent727', 'vk4201142', 'vk45360771@gmail.com', '2023-01-12 21:36:41'),
(35, 'night22', 'qwert98765', 'michael3130922@gmail.com', '2023-01-13 14:20:22'),
(37, 'ryankert', 'ryan0000', 'ryan@ryankert.cc', '2023-01-14 11:55:16'),
(38, 'suzychuang', 'suzy0911', 'suzychuang171@gmail.com', '2023-01-15 18:51:42');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `callboard`
--
ALTER TABLE `callboard`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 資料表索引 `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `callboard`
--
ALTER TABLE `callboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
