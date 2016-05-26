-- phpMyAdmin SQL Dump
-- version 4.4.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016 年 5 月 21 日 13:24
-- サーバのバージョン： 5.5.42
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ae114ndv36_sample`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE IF NOT EXISTS `gs_an_table` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL,
  `age` int(11) NOT NULL,
  `comment` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `sex` int(1) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pref` int(2) NOT NULL,
  `tel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mySkill` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acSkill` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `email`, `naiyou`, `indate`, `age`, `comment`, `password`, `sex`, `address`, `pref`, `tel`, `mySkill`, `acSkill`, `notes`) VALUES
(1, 'ジーズ太郎', 'test1@test.test', 'テスト１', '2015-11-01 01:00:10', 20, 'コメントA', '', 0, '', 0, '', '', '', ''),
(2, 'ジーズ次郎', 'test2@test.test', 'テスト２', '2015-11-01 02:01:20', 30, 'コメントB', '', 0, '', 0, '', '', '', ''),
(3, 'ジーズ三郎', 'test3@test.test', 'テスト３', '2015-11-01 09:02:30', 40, 'コメントC', '', 0, '', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `login_table`
--

CREATE TABLE IF NOT EXISTS `login_table` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `login_table`
--

INSERT INTO `login_table` (`id`, `password`) VALUES
('user1', 'pass1'),
('user2', 'pass2'),
('user3', 'pass3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
