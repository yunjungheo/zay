-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 21-07-26 05:19
-- 서버 버전: 10.4.20-MariaDB
-- PHP 버전: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `test`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `zay_reply`
--

CREATE TABLE `zay_reply` (
  `ZAY_reply_idx` int(11) NOT NULL COMMENT '답글 고유번호',
  `ZAY_reply_id` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '답을쓴 아이디',
  `ZAY_comm_reply_idx` int(11) NOT NULL COMMENT '답글 대상글번호',
  `ZAY_reply_con` text CHARACTER SET utf8 NOT NULL COMMENT '답글 내용',
  `ZAY_reply_reg` varchar(50) NOT NULL COMMENT '답글쓴날짜'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `zay_reply`
--
ALTER TABLE `zay_reply`
  ADD PRIMARY KEY (`ZAY_reply_idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `zay_reply`
--
ALTER TABLE `zay_reply`
  MODIFY `ZAY_reply_idx` int(11) NOT NULL AUTO_INCREMENT COMMENT '답글 고유번호';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
