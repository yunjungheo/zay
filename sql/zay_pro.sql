-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 21-07-28 07:04
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
-- 테이블 구조 `zay_pro`
--

CREATE TABLE `zay_pro` (
  `ZAY_pro_idx` int(11) NOT NULL COMMENT '상품 고유번호',
  `ZAY_pro_like` int(11) NOT NULL COMMENT '좋아요 갯수',
  `ZAY_pro_cate` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '상품 분류',
  `ZAY_pro_name` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '상품 이름',
  `ZAY_pro_pri` int(11) NOT NULL COMMENT '상품 가격',
  `ZAY_pro_bran` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '상품 브랜드명',
  `ZAY_pro_desc` text CHARACTER SET utf8 NOT NULL COMMENT '상품 설명',
  `ZAY_pro_color` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '상품 색상',
  `ZAY_pro_img_01` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '상품 사진1',
  `ZAY_pro_img_02` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '상품 사진2',
  `ZAY_pro_reg` varchar(30) NOT NULL COMMENT '상품 등록일'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `zay_pro`
--

INSERT INTO `zay_pro` (`ZAY_pro_idx`, `ZAY_pro_like`, `ZAY_pro_cate`, `ZAY_pro_name`, `ZAY_pro_pri`, `ZAY_pro_bran`, `ZAY_pro_desc`, `ZAY_pro_color`, `ZAY_pro_img_01`, `ZAY_pro_img_02`, `ZAY_pro_reg`) VALUES
(14, 0, 'accessories', '에션셜  V목걸이', 590000, '루이비통', '데일리 룩에 꾸미지 않은 듯 매력적인 포인트가 되어줄 에센셜 V 목걸이. 우아한 감각을 더해 새롭게 선보이는 아이코닉한 V 모티프가 디자인의 중심을 이루는 액세서리. 길이 조절이 가능한 뒤쪽 체인. 특별한 분위기를 선사하는 섬세한 각인 디테일 및 LV 서클 참이 특징.', '로즈골드', '악세사리2.JPG', '', '2021-07-15'),
(15, 0, 'accessories', '락 잇 귀걸이', 780000, '루이비통', '2021 가을-겨울 컬렉션을 맞아 새롭게 선보이는 락 잇 귀걸이. 하우스의 아이코닉한 요소가 돋보이는 디자인. 세트로 착용하거나 하나씩 스타일링하여 한층 세련된 룩을 완성할 수 있는 패드락 모양의 아이템. LV 서클과 루이 비통 시그니처를 새긴 앞쪽의 열쇠 및 뒷쪽의 자물쇠가 특징.', '골드', '악세사리3.JPG', '', '2021-07-15'),
(16, 0, 'accessories', '나노그램 택 팔찌', 540000, '루이비통', '하우스의 유서 깊은 트렁크를 연상시키는 택 참이 시선을 사로잡는 나노그램 택 팔찌. 새로운 모노그램 그라디언트 컬렉션에서 선보이는 여성스러운 액세서리. 조화를 이루는 다채로운 색상이 부드럽게 섞이는 디자인이 특징. 체인 잠금장치 끝부분의 LV 서클, 올오버 모노그램 패턴 등의 다양한 하우스 시그니처.', '로즈골드', '악세사리1.jpg', '', '2021-07-15'),
(17, 0, 'accessories', '물병자리 스카프', 300000, '루이비통', '통통 튀는 밝은 색상으로 이번 시즌의 점성학 테마를 과감하게 구현한 BB 방도 아스트로 아쿠아리우스. 아이코닉한 모노그램 모티프와 물병자리 심볼이 조화를 이루는 디자인. 경쾌하고 세련된 감각을 선사하는 액세서리. 퓨어 실크 소재의 활용도 높은 아이템.', '', '악세사리4.JPG', '', '2021-07-15'),
(19, 0, 'watches', 'TAMBOUR STREET DIVER', 7290000, '루이비통', '활용도 높은 땅부르 스트리트 다이버 라인에 한층 여성스러운 분위기를 더해줄 퍼시픽 화이트 모델. 전통적인 다이빙 워치의 특징과 독창적이고 전통적이지 않은 다채로운 디자인의 조화로 루이 비통 고유의 감성을 온전히 담아낸 워치. 밝은 색감, 대조적인 마감 및 형광 인덱스를 구성하여 어떠한 룩에도 모던한 포인트가 되어줄 아이템.\r\n제품 세부 정보', '', '시계1.jpg', '', '2021-07-15'),
(20, 0, 'watches', 'TAMBOUR MOON STAR 28', 5020000, '루이비통', 'The Tambour Moon collection pays tribute to the original Tambour collection. The case represents a variation of the iconic Tambour shape with a unique inward curve, giving the watch a crescent-shaped profile. The concave edge creates a clever play on light and reflections that spreads to the case’s every curve. The watch is worn with an interchangeable strap equipped with Louis Vuitton patented system', '', '시계3.JPG', '', '2021-07-15'),
(21, 0, 'shoes', 'D-Doll 펌프스', 1530000, '디올', '마리아 그라치아 치우리가 클래식한 메리 제인 슈즈를 새롭게 해석한 D-Doll 펌프스입니다. 블랙 유광 송아지 가죽으로 제작되었으며, 살짝 각진 스퀘어 형태의 토와 골드 톤 CD 시그니처가 새겨진 블랙 에나멜 버튼 장식의 3-스트랩이 특징입니다. 4cm 블록힐이 우아한 슈즈를 완성합니다.', '블랙', '구두2.JPG', '', '2021-07-15'),
(22, 0, 'shoes', '리바이벌 뮬', 1070000, '루이비통', '패딩 처리한 부드러운 램 가죽 소재의 앞면 스트랩이 돋보이는 리바이벌 뮬. 섬세하게 양각 처리한 루이 비통의 상징적인 모노그램 패턴이 특징. 스퀘어 토와 키튼 힐이 돋보이는 여성스러운 아이템. 색을 입힌 가죽 소재의 겉창. 패딩 처리되어 편안한 착화감을 선사하는 안창.', '블랙', '구두3.JPG', '', '2021-07-15'),
(23, 0, 'shoes', 'Choc 샌들', 1020000, '에르메스', '아이코닉한 Medor 스터드 장식에서 영감을 얻은 힐이 장식된 스웨이드 고트스킨 소재의 샌들\r\n아이코닉한 Medor 스터드 장식을 대담하고 모던한 그래픽적인 스타일로 재해석하여 세련된 여성미가 돋보이는 룩을 완성합니다.', '죤 씨트롱', '구두.JPG', '', '2021-07-15');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `zay_pro`
--
ALTER TABLE `zay_pro`
  ADD PRIMARY KEY (`ZAY_pro_idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `zay_pro`
--
ALTER TABLE `zay_pro`
  MODIFY `ZAY_pro_idx` int(11) NOT NULL AUTO_INCREMENT COMMENT '상품 고유번호', AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
