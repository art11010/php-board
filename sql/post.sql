-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 23-05-02 18:51
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
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `post`
--

INSERT INTO `post` (`idx`, `title`, `content`, `author`, `created_at`, `updated_at`) VALUES
(1, '제목1224ㅍㅎㅍ', 'eee내용122dsdfsfewㅎㅍㅎㅍ', '4aaㅇㅌㅇㅊㅎㅍㅎ', '2023-05-01', NULL),
(2, '제목2', '내용2', '저자2', '2023-05-01', NULL),
(3, '제목3', '내용3', '저자3', '2023-05-01', NULL),
(4, '제목4', '내용4', '저자4', '2023-05-01', NULL),
(5, '제목5', '내용5', '저자5', '2023-05-01', NULL),
(6, '제목6', '내용6', '저자6', '2023-05-01', NULL),
(7, '제목7', '내용7', '저자7', '2023-05-01', NULL),
(8, '제목8', '내용8', '저자8', '2023-05-01', NULL),
(9, '제목입니당', '제발 잘 반영 plz~~~', '이예지입니당', '2023-05-01', NULL),
(10, '테스트임돠', '엔터 안됩니다', '마피아 ㅋㅋ', '2023-05-01', NULL),
(11, '제목이고요', '내용입니다', '작성자입니다', '2023-05-01', NULL),
(12, 'prepare 테스트 입니다', '접니다', '저예요', '2023-05-01', NULL),
(13, 'prepare 테스트 입니다222', '접니다', '저예요', '2023-05-02', NULL),
(14, '마지막 글입니다', '지금 한시', '지금 한시', '2023-05-02', NULL),
(15, 'ㄴㄴㅌㅋ', 'ㅌㅌㅌ', 'ㄱㄷ', '2023-05-02', NULL);

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
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
