-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018 年 2 月 08 日 08:51
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_kadai`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `09kadai_user_table`
--

CREATE TABLE IF NOT EXISTS `09kadai_user_table` (
`id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `09kadai_user_table`
--

INSERT INTO `09kadai_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, '管理者', 'admin', 'admin', 1, 0),
(2, '一般', 'hashimoto', 'hashimoto', 0, 0),
(3, '一般', 'ee', 'ee', 0, 0),
(4, '一般', 'test', 'test', 0, 0),
(5, '一般', 'aa', 'aa', 0, 0),
(6, '一般', 'my', 'my', 0, 0),
(7, '一般', 'testes', 'testes', 0, 0),
(8, '一般', 'e', 'e', 0, 0),
(9, '一般', 'gg', 'gg', 0, 0),
(10, '一般', 'test test test', 'test', 0, 1),
(12, '一般', 'ggg', 'www', 0, 0),
(13, '一般', 'a', 'a', 0, 0),
(14, '一般', 'b', 'b', 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE IF NOT EXISTS `gs_an_table` (
`id` int(12) NOT NULL,
  `lid` varchar(32) NOT NULL,
  `bookname` varchar(64) NOT NULL,
  `bookurl` text NOT NULL,
  `detail` text NOT NULL,
  `puttime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `lid`, `bookname`, `bookurl`, `detail`, `puttime`) VALUES
(3, 'test', 'fffff', 'https://www.youtube.com/watch?v=avBZXNYwuqc', 'aaaaa', '2018-01-23 22:27:29'),
(5, 'a', 'text', '', '', '2018-01-24 15:16:35'),
(6, 'a', 'gggggggggggggggggggggggggggggggg', '', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2018-01-24 16:23:10'),
(7, 'b', 'haaha', 'https://calil.jp/doc/api.html', 'asdafsdfasdfasdfasdfasdf', '2018-01-24 18:21:14'),
(9, 'b', 'gggga', '', 'sdddddg', '2018-01-25 15:28:03'),
(10, 'b', 'gggasdasdasdad', '', 'd', '2018-01-25 15:28:10'),
(11, 'b', 'gasa', '', 'asda', '2018-01-25 15:28:39'),
(12, 'b', 'awwawaaw', '', 'awa', '2018-01-25 15:28:44'),
(13, 'b', 'wweeeeet', '', 'tet', '2018-01-25 15:28:49'),
(14, 'b', 'fa', 'http://fontawesome.io/icon/external-link/', 'fa', '2018-01-25 15:46:01'),
(15, 'b', 'hahaha', '', '', '2018-01-25 22:47:25'),
(16, 'b', 'gjgjg', '', 'kakaka', '2018-01-27 13:51:37'),
(23, 'a', 'aa', 'a', 'a', '2018-02-08 16:49:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `09kadai_user_table`
--
ALTER TABLE `09kadai_user_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `09kadai_user_table`
--
ALTER TABLE `09kadai_user_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
