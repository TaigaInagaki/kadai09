-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 6 月 18 日 13:46
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_kadai_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_kadai_table_1`
--

CREATE TABLE `gs_kadai_table_1` (
  `id` int(12) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `place` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_kadai_table_1`
--

INSERT INTO `gs_kadai_table_1` (`id`, `name`, `place`, `email`) VALUES
(3, 'ウォルト ディズニー', 'アメリカ合衆国', 'disney@test.com'),
(5, 'イナガキタイガ', '日本', 'tinagaki1034@gmail.com'),
(6, 'おおおかみ', 'たべた', 'aaaaaa@sample.om');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_kadai_user_table_1`
--

CREATE TABLE `gs_kadai_user_table_1` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(11) NOT NULL,
  `life_flg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_kadai_user_table_1`
--

INSERT INTO `gs_kadai_user_table_1` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, '稲垣大雅', 'taiga', 'inagaki', 1, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_kadai_table_1`
--
ALTER TABLE `gs_kadai_table_1`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_kadai_user_table_1`
--
ALTER TABLE `gs_kadai_user_table_1`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_kadai_table_1`
--
ALTER TABLE `gs_kadai_table_1`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
