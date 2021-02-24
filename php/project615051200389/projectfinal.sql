-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2020 at 07:02 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `inservice`
--

CREATE TABLE `inservice` (
  `cusID` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสใช้บริการ',
  `cusDate` date NOT NULL COMMENT 'วันที่เข้าใช้',
  `idCus` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสลูกค้า',
  `serID` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'บริการ',
  `nameCus` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อลูกค้า',
  `proID` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ผลิตภัณฑ์',
  `cusPrice` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ราคาการเข้าใช้'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inservice`
--

INSERT INTO `inservice` (`cusID`, `cusDate`, `idCus`, `serID`, `nameCus`, `proID`, `cusPrice`) VALUES
('C1', '2020-03-21', '001', 'ดูดฝุ่น 300 บาท', 'ประพฤติ ดีจังเลย', 'น้ำยาทำความสะอาดภายใน 200 บาท', '500 บาท'),
('C2', '2020-03-18', '002', 'ถ่ายน้ำมันเครื่อง 600 บาท', 'กิตติพงศ์ รุ่งสว่าง', 'น้ำมันเครื่อง 200 บาท', '800 บาท'),
('C3', '2020-03-26', '003', 'ล้างรถ 200 บาท', 'กนกพร รักดี', 'น้ำยาล้างรถ 100 บาท', '300 บาท'),
('C4', '2020-03-22', '004', 'เคลือบสี 400 บาท', 'ปารีนา หงษ์ทอง', 'น้ำยาเคลือบสี 100 บาท', '500 บาท');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `UserID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`UserID`, `Username`, `Password`, `Status`) VALUES
('L001', 'admin', 'admin', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `proID` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสผลิตภัณฑ์',
  `proName` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อผลิตภัณฑ์',
  `probrand` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ยี่ห้อผลิตภัณฑ์',
  `proImage` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ภาพผลิตภัณฑ์',
  `proDetail` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'รายละเอียดผลิตภัณฑ์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`proID`, `proName`, `probrand`, `proImage`, `proDetail`) VALUES
('P1', 'น้ำยาเคลือบสี 100 บาท', 'DIFF', 'product_เคลือบสี.jpg', 'ฟื้นฟูสภาพสี คืนความเงางาม ปราศจากรอยขีดข่วน หรือขนแมว'),
('P2', 'น้ำมันเครื่อง 200 บาท', 'PTT', 'product_น้ำมันเครื่อง.jpg', 'เต็มสมรรถนะ ในการทำความสะอาด และปกป้องเครื่องยนต์'),
('P3', 'น้ำยาล้างรถ 100 บาท', '3M', 'product_ล้างรถ.jpg', 'ช่วยขจัดคราบสกปรก คราบฝุ่นละออง คราบน้ำมัน โดยไม่ทำลายพื้นผิวรถยนต์ '),
('P4', 'น้ำยาเคลือบเงา 200 บาท', '3M', 'product_เคลือบเงา.jpg', 'สามารถทำความสะอาดคราบสกปรก คราบน้ำมัน ฝุ่นละออง ที่เกาะบนผิวรถยนต์ โดยไม่ทำลายสีรถ มีส่วนผสมของแว็กซ์เพิ่มความเงางามให้กับสีรถ'),
('P5', 'น้ำยาทำความสะอาดภายใน 200 บาท', '3M', 'product_ทำความสะอาดภายใน.jpg', 'มอบความชุ่มชื่นด้วยกลิ่นหอมอ่อนโยน ไม่ฉุนแสบจมูก ให้ความเพลิดเพลิน');

-- --------------------------------------------------------

--
-- Table structure for table `service1`
--

CREATE TABLE `service1` (
  `serID` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสบริการ',
  `serName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อบริการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service1`
--

INSERT INTO `service1` (`serID`, `serName`) VALUES
('T1', 'ล้างรถ 200 บาท'),
('T2', 'ดูดฝุ่น 300 บาท'),
('T3', 'เคลือบสี 400 บาท'),
('T4', 'ทำความสะอาดภายใน 500 บาท'),
('T5', 'ถ่ายน้ำมันเครื่อง 600 บาท');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสพนักงาน',
  `staffName` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อพนักงาน',
  `staffAddress` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ที่อยู่พนักงาน',
  `staffTal` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'เบอร์โทรพนักงาน',
  `staffposition` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ตำแหน่ง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `staffName`, `staffAddress`, `staffTal`, `staffposition`) VALUES
('001', 'mew', '35/1 หมู่4 ตำบลบ้านยาง อำเภอเมือง จังหวัดนครปฐม รหัสไปรณีย์73000', '0964688561', 'พนักงานล้างรถ'),
('002', 'bew', '34 ซอยวุฒากาศ 13 เขตธนบรี จังหวัดกรุงเทพมหานคร รหัสไปรษณีย์ 10600', '0644899543', 'พนักงานดูดฝุ่น'),
('003', 'nu', '35 อำเภอปากพนัง จังหวัดนครศรีธรรมราช รหัสไปรณีย์ 10220', '0895653326', 'พนักงานเคลือบสี');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inservice`
--
ALTER TABLE `inservice`
  ADD PRIMARY KEY (`cusID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proID`);

--
-- Indexes for table `service1`
--
ALTER TABLE `service1`
  ADD PRIMARY KEY (`serID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
