-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 21-07-20 03:25
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
-- 테이블 구조 `zay_like_unlike`
--

CREATE TABLE `zay_like_unlike` (
  `ZAY_like_unlike_idx` int(11) NOT NULL COMMENT '좋아요 고유번호',
  `ZAY_like_unlike_userid` int(11) NOT NULL COMMENT '좋아요 작성자',
  `ZAY_like_unlike_postid` int(11) NOT NULL COMMENT '좋아요 상품번호',
  `ZAY_like_unlike_type` int(11) NOT NULL COMMENT '좋아요 타입'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `zay_like_unlike`
--
ALTER TABLE `zay_like_unlike`
  ADD PRIMARY KEY (`ZAY_like_unlike_idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `zay_like_unlike`
--
ALTER TABLE `zay_like_unlike`
  MODIFY `ZAY_like_unlike_idx` int(11) NOT NULL AUTO_INCREMENT COMMENT '좋아요 고유번호';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
