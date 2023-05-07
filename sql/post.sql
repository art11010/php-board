-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 23-05-07 19:06
-- 서버 버전: 10.4.27-MariaDB
-- PHP 버전: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `board`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `post`
--

CREATE TABLE `post` (
  `idx` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `author` varchar(30) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `post`
--

INSERT INTO `post` (`idx`, `title`, `content`, `author`, `created_at`, `password`) VALUES
(1, '11제목1224ㅍㅎㅍ', 'eee내용122dsdfsfewㅎㅍㅎㅍ', '4aaㅇㅌㅇㅊㅎㅍㅎ', '2023-05-01', ''),
(2, '제목2', '내용2', '저자2', '2023-05-01', ''),
(3, '제목3', '내용3', '저자3', '2023-05-01', ''),
(4, '제목4', '내용4', '저자4', '2023-05-01', ''),
(5, '제목5', '내용5', '저자5', '2023-05-01', ''),
(6, '제목6', '내용6', '저자6', '2023-05-01', ''),
(9, '제목입니당', '제발 잘 반영 plz~~~', '이예지입니당', '2023-05-01', ''),
(12, 'prepare 테스트 입니다', '접니다', '저예요', '2023-05-01', ''),
(13, 'prepare 테스트 입니다222', '접니다', '저예요', '2023-05-02', ''),
(14, '마지막 글입니다', '지금 한시', '지금 한시', '2023-05-02', ''),
(20, 'enqjsWO', '안녕하세요?', '이예지입니다', '2023-05-03', ''),
(22, 'mvc,,3', 'mvc,,3', '3mvc,,', '2023-05-07', ''),
(23, '4mvc,,', 'mvc,,4', 'mvc,,4', '2023-05-07', ''),
(24, 'mvc,,1', 'mvc,,1', 'mvc,,1', '2023-05-07', ''),
(25, 'mvc,,2', 'mvc,,2', 'mvc,,2', '2023-05-07', ''),
(28, '비밀번호 : 1234', '테스트1', '테스트1', '2023-05-07', '$2y$10$aNyUOc0Yjq2.n3xeTduW0OmGb.3MbscUituUlW.U75/RuRxECHWTy'),
(29, '1234', '1234', '1234', '2023-05-07', '$2y$10$nkSIh1ZAK7euITlMdohkO.U02PHt3hKId7z2WvUecWTI.83zAWLgq'),
(36, '12', '12', '12', '2023-05-08', '$2y$10$jGgWaqQuq/iXFa4EDF4t1O00y5TpBesRR92/hYppHMnQFH3mbUWZ6'),
(37, 'qwer', 'qwer', 'qwer', '2023-05-08', '$2y$10$yRhxk4qodKc8p8.LcT1reuyluRoVYPKquOznwUuh.lVZ8Dr0EgJHO'),
(38, '1233', '1233', '1233', '2023-05-08', '$2y$10$O1tNrYa/T1/mkPx0.rnxFOR/wmrkK0CpD1NK/TlDhZE1n/Rghcese'),
(39, 'asdf', 'asdf', 'asdf', '2023-05-08', '$2y$10$RaPTQzrEhmu4ahjbeIzGuuBmLMH6cjVLFKdDsdQqQ3sjH6Rygp08u');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `post`
--
ALTER TABLE `post`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
