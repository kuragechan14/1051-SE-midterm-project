-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-11-06 07:36:52
-- 伺服器版本: 10.1.10-MariaDB
-- PHP 版本： 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `mid`
--

-- --------------------------------------------------------

--
-- 資料表結構 `assess`
--

CREATE TABLE `assess` (
  `aID` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `eID` int(11) NOT NULL,
  `pn` tinyint(1) NOT NULL,
  `asmsg` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `assess`
--

INSERT INTO `assess` (`aID`, `uID`, `eID`, `pn`, `asmsg`) VALUES
(3, 26, 2, 0, '333'),
(4, 1, 2, 1, 'aaa'),
(5, 25, 2, 0, '11'),
(6, 27, 2, 1, '27'),
(7, 25, 2, 0, '25'),
(8, 1, 2, 0, '11'),
(9, 17, 2, 0, '7'),
(10, 25, 28, 0, 'gd'),
(11, 27, 28, 0, 'GGGG');

-- --------------------------------------------------------

--
-- 資料表結構 `employ`
--

CREATE TABLE `employ` (
  `ID` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `eID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `employ`
--

INSERT INTO `employ` (`ID`, `uID`, `eID`) VALUES
(9, 19, 7),
(12, 22, 10);

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `mID` int(11) NOT NULL,
  `eID` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `question` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `message`
--

INSERT INTO `message` (`mID`, `eID`, `uID`, `title`, `question`, `answer`, `status`) VALUES
(1, 2, 1, 'test_msg', 'Hello!', '11', 1),
(2, 8, 1, 'hi', 'hii					', 'foo\r\n', 1),
(3, 8, 1, '21', '21\r\n22					', 'UU', 1),
(4, 8, 1, 'b', '					', 'b', 1),
(5, 2, 1, 'rr', '			rr		', 'hello', 1),
(6, 2, 17, 'YO', 'YO', '030', 1),
(7, 2, 17, '安安', '你好', '0.<', 1),
(8, 7, 19, 'GF', 'GF+++', '++++', 1),
(9, 10, 1, 'dd', 'dd', '-', 1),
(10, 10, 1, 'dd', 'dd', '-', 1),
(11, 10, 1, 'dd', 'dd', 'ww', 1),
(12, 10, 1, 'dd', 'dd', 'O3<', 1),
(13, 2, 25, '000', 'jjjj', '', 0),
(14, 2, 17, '1', '1', '22', 1),
(15, 7, 17, 'hello', 'hello', '444', 1),
(16, 2, 25, 's', 's', '', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `resume`
--

CREATE TABLE `resume` (
  `rID` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `skill` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `salary` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `resume`
--

INSERT INTO `resume` (`rID`, `uID`, `skill`, `salary`, `status`, `birth`) VALUES
(1, 1, 'C++,SQL,JAVA', '28000', 1, '1994-10-14'),
(2, 17, '444', '25000', 1, '0000-00-00'),
(3, 19, 'mm', '28000', 1, '1994-10-14'),
(4, 20, '', '', 0, '0000-00-00'),
(5, 21, '', '', 0, '0000-00-00'),
(6, 22, 'Python,MFC,SQL', '28000', 1, '0000-00-00'),
(7, 23, '', '', 0, '0000-00-00'),
(8, 24, '', '', 0, '0000-00-00'),
(9, 25, 'yo', '35000', 1, '0000-00-00'),
(10, 26, '333', '333', 0, '0000-00-00'),
(11, 27, 'Python,C++,MFC,SQL,Java,HTML,CSS', '35000', 1, '1994-10-14'),
(12, 28, '', '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `ac` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `identity` tinyint(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`ID`, `ac`, `pwd`, `name`, `identity`, `status`) VALUES
(1, 'test', '123', 'WL', 1, 1),
(2, 'ttt', '123', 'DN', 0, 0),
(4, '11', '11', '11', 0, 0),
(5, '12', '12', '12', 0, 0),
(6, '12', '12', '12', 0, 0),
(7, 'yo', 'yo', 'GF', 0, 0),
(8, '22', '22', '22', 0, 0),
(9, 'e', 'e', 'e', 0, 0),
(10, '3', '3', '3', 0, 0),
(11, '2', '2', '測試2', 1, 0),
(12, 'r', 'r', 'r', 1, 0),
(13, 'r', 'r', 'r', 1, 0),
(14, 'r', 'r', 'r', 1, 0),
(15, 'r', 'r', 'r', 1, 0),
(16, 'r', 'r', 'r', 1, 0),
(17, '7', '7', '7', 1, 2),
(18, '7', '7', '7', 1, 0),
(19, 'm', 'm', 'ming', 1, 1),
(20, 'hi', 'hi', 'hi', 1, 0),
(21, '777', '777', '777', 1, 0),
(22, 'mmm', 'mmm', 'mmm', 1, 0),
(23, 'mmm', 'mmm', 'mmm', 1, 0),
(24, 'mmm', 'mmm', 'mmm', 1, 0),
(25, 'ff', 'ff', 'wherever', 1, 0),
(26, '333', '333', '333', 1, 0),
(27, 'demos', 'aaa', 'demos', 1, 0),
(28, 'democ', 'aaa', 'demoC', 0, 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `assess`
--
ALTER TABLE `assess`
  ADD PRIMARY KEY (`aID`);

--
-- 資料表索引 `employ`
--
ALTER TABLE `employ`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mID`);

--
-- 資料表索引 `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`rID`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `assess`
--
ALTER TABLE `assess`
  MODIFY `aID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用資料表 AUTO_INCREMENT `employ`
--
ALTER TABLE `employ`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用資料表 AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `mID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- 使用資料表 AUTO_INCREMENT `resume`
--
ALTER TABLE `resume`
  MODIFY `rID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
