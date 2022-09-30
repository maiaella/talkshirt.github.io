-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 02:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talkshirt`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `ID` int(10) NOT NULL,
  `TITLE` varchar(300) NOT NULL,
  `CONTENT` text NOT NULL,
  `TIMESTAMP` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `talkshirt_colors`
--

CREATE TABLE `talkshirt_colors` (
  `PROID` varchar(100) NOT NULL,
  `MATERIAL_ID` varchar(100) NOT NULL,
  `URLPIC` varchar(100) NOT NULL,
  `STOCKS` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `talkshirt_colors`
--

INSERT INTO `talkshirt_colors` (`PROID`, `MATERIAL_ID`, `URLPIC`, `STOCKS`) VALUES
('TOYO-1', 'CTTN-TOYO', 'TOYO.jpg', 20),
('GUKO-1', 'CTTN-GUKO', 'Guko.jpg', 20),
('ONEPIECE-1', 'CTTN-OP', 'onepiece.jpg', 30),
('ANIME-1', 'CTTN-ANIME', 'sample2.jpg', 15);

-- --------------------------------------------------------

--
-- Table structure for table `talkshirt_fabrics`
--

CREATE TABLE `talkshirt_fabrics` (
  `MATERIAL_ID` varchar(100) NOT NULL,
  `PROID` varchar(100) NOT NULL,
  `COLOR` varchar(30) NOT NULL,
  `URLPIC` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `talkshirt_fabrics`
--

INSERT INTO `talkshirt_fabrics` (`MATERIAL_ID`, `PROID`, `COLOR`, `URLPIC`) VALUES
('CTTN-TOYO', 'TOYO-1', 'White', 'TOYO.jpg'),
('CTTN-GUKO', 'GUKO-1', 'White', 'Guko.jpg'),
('CTTN-OP', 'ONEPIECE-1', 'Black', 'onepiece.jpg'),
('CTTN-ANIME', 'ANIME-1', 'White', 'sample2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `talkshirt_logs`
--

CREATE TABLE `talkshirt_logs` (
  `ID` int(10) NOT NULL,
  `UNAME` varchar(50) NOT NULL,
  `Time_In` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `USER_TYPE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `talkshirt_logs`
--

INSERT INTO `talkshirt_logs` (`ID`, `UNAME`, `Time_In`, `USER_TYPE`) VALUES
(166, 'admin', '2022-04-03 16:33:27', 'ADMIN'),
(167, 'maia', '2022-04-06 11:47:15', 'CUSTOMER'),
(168, 'maia', '2022-04-06 11:48:19', 'CUSTOMER'),
(169, 'admin', '2022-04-06 11:57:02', 'ADMIN'),
(170, 'admin', '2022-04-06 12:08:59', 'ADMIN'),
(171, 'admin', '2022-04-06 12:11:04', 'ADMIN'),
(172, 'admin', '2022-04-06 12:20:53', 'ADMIN'),
(173, 'admin', '2022-04-06 12:32:34', 'ADMIN'),
(174, 'admin', '2022-04-06 12:32:43', 'ADMIN'),
(175, 'admin', '2022-04-06 12:32:52', 'ADMIN'),
(176, 'admin', '2022-04-06 12:32:59', 'ADMIN'),
(177, 'admin', '2022-04-06 12:34:59', 'ADMIN'),
(178, 'admin', '2022-04-07 10:31:27', 'ADMIN'),
(179, 'admin', '2022-04-11 11:06:47', 'ADMIN'),
(180, 'frank', '2022-04-11 11:09:11', 'CUSTOMER'),
(181, 'admin', '2022-04-11 14:34:34', 'ADMIN'),
(182, 'admin', '2022-04-12 11:44:11', 'ADMIN'),
(183, 'maia', '2022-04-12 12:26:19', 'CUSTOMER'),
(184, 'admin', '2022-04-12 13:49:59', 'ADMIN'),
(185, 'maia', '2022-04-13 14:38:20', 'CUSTOMER'),
(186, 'admin', '2022-04-13 14:39:34', 'ADMIN'),
(187, 'admin', '2022-04-13 15:18:00', 'ADMIN'),
(188, 'maia', '2022-04-13 16:05:44', 'CUSTOMER'),
(189, 'admin', '2022-04-13 17:48:50', 'ADMIN'),
(190, 'admin', '2022-04-13 17:50:03', 'ADMIN'),
(191, 'admin', '2022-04-13 17:51:44', 'ADMIN'),
(192, 'admin', '2022-04-13 17:55:22', 'ADMIN'),
(193, 'admin', '2022-04-15 09:37:33', 'ADMIN'),
(194, 'maia', '2022-04-15 09:49:39', 'CUSTOMER'),
(195, 'admin', '2022-04-15 09:54:05', 'ADMIN'),
(196, 'maia', '2022-04-15 09:54:33', 'CUSTOMER'),
(197, 'admin', '2022-04-15 10:04:20', 'ADMIN'),
(198, 'maia', '2022-04-15 10:05:38', 'CUSTOMER'),
(199, 'maia', '2022-04-15 10:12:09', 'CUSTOMER'),
(200, 'admin', '2022-04-15 10:32:47', 'ADMIN'),
(201, 'admin', '2022-04-15 15:00:36', 'ADMIN'),
(202, 'frank', '2022-04-15 15:02:36', 'CUSTOMER'),
(203, 'admin', '2022-04-15 15:22:39', 'ADMIN'),
(204, 'admin', '2022-05-17 06:25:46', 'ADMIN'),
(205, 'Ivan_Employee', '2022-05-17 06:33:38', 'EMPLOYEE'),
(206, 'admin', '2022-05-17 06:44:12', 'ADMIN'),
(207, 'maia', '2022-05-17 07:02:35', 'CUSTOMER'),
(208, 'admin', '2022-05-17 07:03:26', 'ADMIN'),
(209, 'admin', '2022-05-17 07:09:38', 'ADMIN'),
(210, 'maia', '2022-05-17 07:10:12', 'CUSTOMER'),
(211, 'admin', '2022-05-17 07:10:48', 'ADMIN'),
(212, 'admin', '2022-05-17 07:13:23', 'ADMIN'),
(213, 'admin', '2022-05-17 07:19:52', 'ADMIN'),
(214, 'rhey123', '2022-05-17 07:24:04', 'CUSTOMER'),
(215, 'admin', '2022-05-17 07:35:00', 'ADMIN'),
(216, 'admin', '2022-05-24 01:43:59', 'ADMIN'),
(217, 'emp1', '2022-05-24 01:49:12', 'EMPLOYEE'),
(218, 'admin', '2022-05-24 01:55:23', 'ADMIN'),
(219, 'maia', '2022-05-24 05:31:45', 'CUSTOMER'),
(220, 'admin', '2022-05-24 05:34:27', 'ADMIN'),
(221, 'maia', '2022-05-24 05:36:33', 'CUSTOMER'),
(222, 'admin', '2022-05-24 05:39:10', 'ADMIN'),
(223, 'maia', '2022-05-24 05:43:10', 'CUSTOMER'),
(224, 'admin', '2022-05-24 05:43:51', 'ADMIN'),
(225, 'maia', '2022-05-24 05:45:29', 'CUSTOMER'),
(226, 'admin', '2022-05-24 05:46:41', 'ADMIN'),
(227, 'maia', '2022-05-24 05:47:19', 'CUSTOMER'),
(228, 'admin', '2022-05-31 02:54:07', 'ADMIN'),
(229, 'maia', '2022-05-31 03:00:55', 'CUSTOMER'),
(230, 'admin', '2022-05-31 03:05:00', 'ADMIN'),
(231, 'maia', '2022-05-31 03:34:46', 'CUSTOMER'),
(232, 'admin', '2022-05-31 03:36:28', 'ADMIN'),
(233, 'maia', '2022-05-31 03:52:59', 'CUSTOMER'),
(234, 'admin', '2022-05-31 03:58:56', 'ADMIN'),
(235, 'maia', '2022-05-31 04:03:15', 'CUSTOMER'),
(236, 'admin', '2022-05-31 04:15:58', 'ADMIN'),
(237, 'maia', '2022-05-31 04:19:20', 'CUSTOMER'),
(238, 'admin', '2022-05-31 04:20:01', 'ADMIN'),
(239, 'maia', '2022-05-31 04:21:34', 'CUSTOMER'),
(240, 'admin', '2022-05-31 04:21:57', 'ADMIN'),
(241, 'maia', '2022-05-31 04:24:49', 'CUSTOMER'),
(242, 'admin', '2022-05-31 04:25:35', 'ADMIN'),
(243, 'maia', '2022-05-31 04:28:06', 'CUSTOMER'),
(244, 'admin', '2022-05-31 04:28:29', 'ADMIN'),
(245, 'maia', '2022-05-31 04:37:47', 'CUSTOMER'),
(246, 'admin', '2022-05-31 04:38:15', 'ADMIN'),
(247, 'maia', '2022-05-31 04:40:33', 'CUSTOMER'),
(248, 'admin', '2022-05-31 04:45:27', 'ADMIN'),
(249, 'maia', '2022-05-31 06:12:19', 'CUSTOMER'),
(250, 'maia', '2022-05-31 06:22:57', 'CUSTOMER'),
(251, 'maia', '2022-05-31 06:23:25', 'CUSTOMER'),
(252, 'admin', '2022-05-31 06:28:12', 'ADMIN'),
(253, 'maia', '2022-05-31 08:54:41', 'CUSTOMER'),
(254, 'maia', '2022-06-02 08:44:59', 'CUSTOMER'),
(255, 'maia', '2022-06-02 09:06:17', 'CUSTOMER'),
(256, 'maia', '2022-06-02 09:18:02', 'CUSTOMER'),
(257, 'admin', '2022-06-02 09:53:50', 'ADMIN'),
(258, 'admin', '2022-06-02 09:58:32', 'ADMIN'),
(259, 'admin', '2022-06-02 10:14:22', 'ADMIN'),
(260, 'maia', '2022-06-02 10:21:59', 'CUSTOMER'),
(261, 'admin', '2022-06-02 10:27:03', 'ADMIN'),
(262, 'maia', '2022-06-02 11:08:33', 'CUSTOMER'),
(263, 'admin', '2022-06-02 11:09:40', 'ADMIN'),
(264, 'maia', '2022-06-02 11:29:05', 'CUSTOMER'),
(265, 'admin', '2022-06-02 11:48:50', 'ADMIN'),
(266, 'maia', '2022-06-02 11:49:12', 'CUSTOMER'),
(267, 'admin', '2022-06-02 12:02:16', 'ADMIN'),
(268, 'maia', '2022-06-03 02:18:40', 'CUSTOMER'),
(269, 'admin', '2022-06-03 02:20:24', 'ADMIN'),
(270, 'admin', '2022-06-03 02:33:59', 'ADMIN'),
(271, 'maia', '2022-06-03 14:38:33', 'CUSTOMER'),
(272, 'admin', '2022-06-03 14:42:48', 'ADMIN'),
(273, 'maia', '2022-06-03 14:59:56', 'CUSTOMER'),
(274, 'admin', '2022-06-03 15:00:21', 'ADMIN'),
(275, 'maia', '2022-06-03 15:21:52', 'CUSTOMER'),
(276, 'maia', '2022-06-03 15:22:35', 'CUSTOMER'),
(277, 'admin', '2022-06-03 15:25:40', 'ADMIN'),
(278, 'admin', '2022-06-04 07:59:25', 'ADMIN'),
(279, 'admin', '2022-06-04 08:03:00', 'ADMIN'),
(280, 'admin', '2022-06-04 13:17:11', 'ADMIN'),
(281, 'maia', '2022-06-04 13:20:03', 'CUSTOMER'),
(282, 'admin', '2022-06-04 13:21:19', 'ADMIN'),
(283, 'admin', '2022-06-04 13:55:55', 'ADMIN'),
(284, 'maia', '2022-06-04 13:59:29', 'CUSTOMER'),
(285, 'admin', '2022-06-04 14:00:13', 'ADMIN'),
(286, 'admin', '2022-06-05 05:30:26', 'ADMIN'),
(287, 'maia', '2022-06-05 05:41:53', 'CUSTOMER'),
(288, 'admin', '2022-06-05 05:44:30', 'ADMIN'),
(289, 'admin', '2022-06-05 05:54:04', 'ADMIN'),
(290, 'maia', '2022-06-05 10:17:15', 'CUSTOMER'),
(291, 'admin', '2022-06-05 10:18:24', 'ADMIN'),
(292, 'maia', '2022-06-05 11:20:28', 'CUSTOMER'),
(293, 'admin', '2022-06-05 14:08:48', 'ADMIN'),
(294, 'maia', '2022-06-05 14:12:52', 'CUSTOMER'),
(295, 'maia', '2022-06-06 13:53:20', 'CUSTOMER'),
(296, 'admin', '2022-06-06 14:50:35', 'ADMIN'),
(297, 'maia', '2022-06-06 15:11:17', 'CUSTOMER'),
(298, 'admin', '2022-06-06 15:12:08', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `talkshirt_orders`
--

CREATE TABLE `talkshirt_orders` (
  `TRANSID` varchar(100) NOT NULL,
  `CUSNAME` varchar(100) NOT NULL,
  `UNAME` varchar(100) NOT NULL,
  `ADDRESS` text NOT NULL,
  `PRONAME` varchar(100) NOT NULL,
  `PROID` varchar(100) NOT NULL,
  `MATERIAL_ID` varchar(100) NOT NULL,
  `COLOR` varchar(100) NOT NULL,
  `QUANTITY` double NOT NULL,
  `TOTAL` double NOT NULL,
  `DOWN` double NOT NULL,
  `DPAID` double NOT NULL,
  `SHIPPING` varchar(100) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `TIME` varchar(100) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `IMAGE` varchar(100) NOT NULL,
  `PROOF` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `talkshirt_orders`
--

INSERT INTO `talkshirt_orders` (`TRANSID`, `CUSNAME`, `UNAME`, `ADDRESS`, `PRONAME`, `PROID`, `MATERIAL_ID`, `COLOR`, `QUANTITY`, `TOTAL`, `DOWN`, `DPAID`, `SHIPPING`, `DATE`, `TIME`, `STATUS`, `IMAGE`, `PROOF`) VALUES
('20220415080458l1D', 'Maia Monticalvo', 'maia', 'General Santos', 'TOYO', 'TOYO-1', '', 'BLACK', 2, 398, 199, 199, 'Pick Up', '04/15/2022', '08:04:58 PM', 'Received', 'TOYO.jpg', ''),
('20220415094910oyM', 'Maia Monticalvo', 'maia', 'General Santos City', 'TOYO', 'TOYO-1', '', 'BLACK', 2, 398, 199, 199, 'Pick Up', '04/15/2022', '09:49:10 PM', 'Received', 'TOYO.jpg', ''),
('20220415095249rYe', 'Maia Monticalvo', 'maia', 'Genesan', 'TOYO', 'TOYO-1', '', 'BLACK', 2, 398, 199, 199, 'Pick Up', '04/15/2022', '09:52:49 PM', 'Received', 'TOYO.jpg', ''),
('20220415095930er6', 'Maia Monticalvo', 'maia', 'Antipolo City', 'TOYO', 'TOYO-1', '', 'BLACK', 5, 995, 497.5, 497.5, 'Pick Up', '04/15/2022', '09:59:30 PM', 'Received', 'TOYO.jpg', ''),
('202204151001298XF', 'Maia Monticalvo', 'maia', 'gensan', 'TOYO', 'TOYO-1', '', 'BLACK', 1, 199, 99.5, 99.5, 'Pick Up', '04/15/2022', '10:01:29 PM', 'Received', 'TOYO.jpg', ''),
('20220415102515Ql5', 'Maia Monticalvo', 'maia', 'gegege', 'TOYO', 'TOYO-1', '', 'BLACK', 2, 0, 199, 199, 'Pick Up', '04/15/2022', '10:25:15 PM', 'Received', 'TOYO.jpg', ''),
('20220415103015KLY', 'Maia Monticalvo', 'maia', 'gensan', 'TOYO', 'TOYO-1', '', 'BLACK', 2, 398, 199, 199, 'Pick Up', '04/15/2022', '10:30:15 PM', 'Received', 'TOYO.jpg', ''),
('20220415105106gTz', 'Maia Monticalvo', 'maia', 'gegege', 'TOYO', 'TOYO-1', '', 'BLACK', 2, 398, 199, 199, 'Pick Up', '04/15/2022', '10:51:06 PM', 'Received', 'TOYO.jpg', ''),
('20220415110306lpW', 'Frank Quinampay', 'frank', 'General Santos', 'TOYO', 'TOYO-1', '', 'Black', 2, 398, 199, 199, 'Pick Up', '04/15/2022', '11:03:06 PM', 'Received', 'TOYO.jpg', ''),
('20220415111227VFW', 'Frank Quinampay', 'frank', 'MAnila', 'TOYO', 'TOYO-1', '', 'Black', 5, 995, 497.5, 497.5, 'Pick Up', '04/15/2022', '11:12:27 PM', 'Received', 'TOYO.jpg', ''),
('20220415112114Srt', 'Frank Quinampay', 'frank', 'Antipolo', 'TOYO', 'TOYO-1', '', 'Black', 5, 995, 497.5, 497.5, 'Pick Up', '04/15/2022', '11:21:14 PM', 'Received', 'TOYO.jpg', ''),
('202204151122145bg', 'Frank Quinampay', 'frank', 'South Cotabato', 'TOYO', 'TOYO-1', 'BLKTY', 'Black', 10, 1990, 995, 995, 'Pick Up', '04/15/2022', '11:22:14 PM', 'Delivered', 'TOYO.jpg', ''),
('20220517031033B14', 'Maia Monticalvo', 'maia', 'Gensan', 'TOYO', 'TOYO-1', 'BLKTY', 'Black', 1, 199, 99.5, 0, 'Delivery', '05/17/2022', '03:10:33 PM', 'Cancelled', 'TOYO.jpg', ''),
('20220524013700qgP', 'Maia Monticalvo', 'maia', 'General Santos City', 'TOYO', 'TOYO-1', 'BLKTY', 'Black', 2, 398, 199, 199, 'Delivery', '05/24/2022', '01:37:00 PM', 'Delivered', 'TOYO.jpg', ''),
('20220531045524Y47', 'Maia Monticalvo', 'maia', 'General Santos City', 'sample', 'sample', 'sample', 'White', 2, 200, 100, 100, 'Delivery', '05/31/2022', '04:55:24 PM', 'Received', 'Guko.jpg', ''),
('20220531050941AMM', 'Maia Monticalvo', 'maia', 'General Santos City', 'sample', 'sample', 'sample', 'White', 2, 200, 100, 0, 'Delivery', '05/31/2022', '05:09:41 PM', 'Cancelled', 'Guko.jpg', ''),
('20220531094449gjJ', 'Maia Monticalvo', 'maia', 'gensan', 'sample', 'sample', 'sample', 'White', 2, 200, 100, 0, 'Pick Up', '05/31/2022', '09:44:49 PM', 'Cancelled', 'Guko.jpg', ''),
('20220531110111jme', 'Maia Monticalvo', 'maia', 'gensan', 'TOYO', 'TOYO-1', 'BLKTY', 'Black', 2, 398, 199, 199, 'Pick Up', '05/31/2022', '11:01:11 AM', 'Delivered', 'TOYO.jpg', ''),
('20220531115315HkJ', 'Maia Monticalvo', 'maia', 'Manila', 'sample', 'sample', 'sample', 'White', 5, 1000, 500, 500, 'Pick Up', '05/31/2022', '11:53:15 AM', 'Received', 'sample2.jpg', ''),
('20220531120328w9v', 'Maia Monticalvo', 'maia', 'gensan', 'GUKO', 'GUKO-1', 'WHITE-GUKO', 'White', 5, 995, 497.5, 0, 'Pick Up', '05/31/2022', '12:03:28 PM', 'Cancelled', 'Guko.jpg', ''),
('20220531120509GJj', 'Maia Monticalvo', 'maia', 'gensan', 'GUKO', 'GUKO-1', 'WHITE-GUKO', 'White', 1, 199, 99.5, 0, 'Pick Up', '05/31/2022', '12:05:09 PM', 'Cancelled', 'Guko.jpg', ''),
('20220531121932Wus', 'Maia Monticalvo', 'maia', 'gensan', 'sample', 'sample', 'sample', 'White', 20, 4000, 2000, 2000, 'Pick Up', '05/31/2022', '12:19:32 PM', 'Delivered', 'sample2.jpg', ''),
('20220531122147rtT', 'Maia Monticalvo', 'maia', 'gensan\r\n', 'sample1', 'sample1', 'sample1', 'White', 20, 4000, 2000, 2000, 'Pick Up', '05/31/2022', '12:21:47 PM', 'Delivered', 'onepiece.jpg', ''),
('20220531122505s2u', 'Maia Monticalvo', 'maia', 'manila', 'sample', 'sample', 'sample', 'White', 2, 200, 100, 100, 'Pick Up', '05/31/2022', '12:25:05 PM', 'Cancelled', 'Guko.jpg', ''),
('20220531122818YYC', 'Maia Monticalvo', 'maia', 'manila', 'sample', 'sample', 'sample', 'White', 2, 200, 100, 0, 'Pick Up', '05/31/2022', '12:28:18 PM', 'Cancelled', 'Guko.jpg', ''),
('20220531123804jCh', 'Maia Monticalvo', 'maia', 'gensan', 'sample', 'sample', 'sample', 'White', 2, 200, 100, 0, 'Pick Up', '05/31/2022', '12:38:04 PM', 'Cancelled', 'Guko.jpg', ''),
('20220602052428nrp', 'Maia Monticalvo', 'maia', '', 'sample', 'sample', 'sample', 'White', 2, 200, 100, 100, 'Pick Up', '06/02/2022', '05:24:28 PM', 'Delivered', 'Guko.jpg', ''),
('20220602055101xwG', 'Maia Monticalvo', 'maia', '', 'sample', 'sample', 'sample', 'White', 2, 200, 100, 100, 'Pick Up', '06/02/2022', '05:51:01 PM', 'Delivered', 'Guko.jpg', ''),
('20220603110009vAC', 'Maia Monticalvo', 'maia', 'Antipolo City', 'TOYO', 'TOYO-1', 'CTTN-TOYO', 'White', 3, 597, 298.5, 298.5, 'Pick Up', '06/03/2022', '11:00:09 PM', 'Delivered', 'TOYO.jpg', ''),
('202206031125153c2', 'Maia Monticalvo', 'maia', 'General Santos', 'TOYO', 'TOYO-1', 'CTTN-TOYO', 'White', 2, 400, 200, 200, 'Pick Up', '06/03/2022', '11:25:15 PM', 'Delivered', 'TOYO.jpg', ''),
('20220604092052v9x', 'Maia Monticalvo', 'maia', 'antipolo city', 'TOYO', 'TOYO-1', 'CTTN-TOYO', 'White', 3, 600, 300, 300, 'Pick Up', '06/04/2022', '09:20:52 PM', 'Delivered', 'TOYO.jpg', ''),
('202206040959405QB', 'Maia Monticalvo', 'maia', 'gensan', 'TOYO', 'TOYO-1', 'CTTN-TOYO', 'White', 2, 400, 200, 200, 'Pick Up', '06/04/2022', '09:59:40 PM', 'Received', 'TOYO.jpg', ''),
('20220605014239krc', 'Maia Monticalvo', 'maia', 'Antipolo City', 'TOYO', 'TOYO-1', 'CTTN-TOYO', 'White', 2, 400, 200, 0, 'Pick Up', '06/05/2022', '01:42:39 PM', 'Cancelled', 'TOYO.jpg', ''),
('20220605014340rvL', 'Maia Monticalvo', 'maia', 'gensan', 'TOYO', 'TOYO-1', 'CTTN-TOYO', 'White', 2, 400, 200, 0, 'Pick Up', '06/05/2022', '01:43:40 PM', 'Cancelled', 'TOYO.jpg', ''),
('20220605075620KPL', 'Maia Monticalvo', 'maia', 'General Santos City', 'Anime', 'ANIME-1', 'CTTN-ANIME', 'White', 2, 400, 200, 0, 'Delivery', '06/05/2022', '07:56:20 PM', 'Cancelled', 'sample2.jpg', ''),
('20220605075656NFJ', 'Maia Monticalvo', 'maia', 'General Santos City', 'Anime', 'ANIME-1', 'CTTN-ANIME', 'White', 2, 400, 200, 0, 'Delivery', '06/05/2022', '07:56:56 PM', 'Cancelled', 'sample2.jpg', ''),
('20220605075757IpB', 'Maia Monticalvo', 'maia', 'General Santos City', 'Anime', 'ANIME-1', 'CTTN-ANIME', 'White', 2, 400, 200, 0, 'Delivery', '06/05/2022', '07:57:57 PM', 'Cancelled', 'sample2.jpg', ''),
('20220605075823bhj', 'Maia Monticalvo', 'maia', 'General Santos City', 'Anime', 'ANIME-1', 'CTTN-ANIME', 'White', 2, 400, 200, 0, 'Delivery', '06/05/2022', '07:58:23 PM', 'Cancelled', 'sample2.jpg', ''),
('202206050810152zy', 'Maia Monticalvo', 'maia', 'gensan', 'Anime', 'ANIME-1', 'CTTN-ANIME', 'White', 3, 600, 300, 0, 'Pick Up', '06/05/2022', '08:10:15 PM', 'Cancelled', 'sample2.jpg', ''),
('20220605094340gbL', 'Maia Monticalvo', 'maia', 'gensan', 'Anime', 'ANIME-1', 'CTTN-ANIME', 'White', 1, 200, 100, 0, 'Pick Up', '06/05/2022', '09:43:40 PM', 'Cancelled', 'sample2.jpg', ''),
('20220605094512XgT', 'Maia Monticalvo', 'maia', 'gensan', 'Anime', 'ANIME-1', 'CTTN-ANIME', 'White', 1, 200, 100, 0, 'Pick Up', '06/05/2022', '09:45:12 PM', 'Cancelled', 'sample2.jpg', ''),
('202206050945336Mb', 'Maia Monticalvo', 'maia', 'gensan', 'Anime', 'ANIME-1', 'CTTN-ANIME', 'White', 1, 200, 100, 0, 'Pick Up', '06/05/2022', '09:45:33 PM', 'Cancelled', 'sample2.jpg', ''),
('20220605094747lmH', 'Maia Monticalvo', 'maia', 'gensan', 'Anime', 'ANIME-1', 'CTTN-ANIME', 'White', 1, 200, 100, 100, 'Pick Up', '06/05/2022', '09:47:47 PM', 'On Process', 'sample2.jpg', ''),
('20220605094906sBG', 'Maia Monticalvo', 'maia', 'g', 'Anime', 'ANIME-1', 'CTTN-ANIME', 'White', 2, 400, 200, 0, 'Pick Up', '06/05/2022', '09:49:06 PM', 'Cancelled', 'sample2.jpg', ''),
('20220605095014MC9', 'Maia Monticalvo', 'maia', 'gensan', 'Anime', 'ANIME-1', 'CTTN-ANIME', 'White', 2, 400, 200, 0, 'Pick Up', '06/05/2022', '09:50:14 PM', 'Cancelled', 'sample2.jpg', ''),
('20220605095349rZ9', 'Maia Monticalvo', 'maia', 'gensan', 'Anime', 'ANIME-1', 'CTTN-ANIME', 'White', 1, 200, 100, 0, 'Pick Up', '06/05/2022', '09:53:49 PM', 'Cancelled', 'sample2.jpg', ''),
('20220606103419JmD', 'Maia Monticalvo', 'maia', 'gensan', 'One-Piece', 'ONEPIECE-1', 'CTTN-OP', 'Black', 2, 300, 150, 0, 'Pick Up', '06/06/2022', '10:34:19 PM', 'Cancelled', 'onepiece.jpg', ''),
('20220606103641GWd', 'Maia Monticalvo', 'maia', 'gensan', 'One-Piece', 'ONEPIECE-1', 'CTTN-OP', 'Black', 2, 300, 150, 0, 'Pick Up', '06/06/2022', '10:36:41 PM', 'Cancelled', 'onepiece.jpg', ''),
('20220606111134gB6', 'Maia Monticalvo', 'maia', 'Antipolo City', 'One-Piece', 'ONEPIECE-1', 'CTTN-OP', 'Black', 2, 300, 150, 150, 'Delivery', '06/06/2022', '11:11:34 PM', 'Received', 'onepiece.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `talkshirt_stocks`
--

CREATE TABLE `talkshirt_stocks` (
  `PROID` varchar(100) NOT NULL,
  `MATID` varchar(100) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `DESCR` varchar(50) NOT NULL,
  `PRICE` varchar(1000) NOT NULL,
  `STOCKS` varchar(1000) NOT NULL,
  `TYPE` varchar(30) NOT NULL,
  `URLPIC` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `talkshirt_stocks`
--

INSERT INTO `talkshirt_stocks` (`PROID`, `MATID`, `NAME`, `DESCR`, `PRICE`, `STOCKS`, `TYPE`, `URLPIC`) VALUES
('GUKO-1', 'CTTN-GUKO', 'GUKO', 'Guko Printed Tshirt 100% Cotton', '299', '10', 'image/jpeg', 'Guko.jpg'),
('ONEPIECE-1', 'CTTN-OP', 'One-Piece', 'One Piece Printed Tshirt 100% Cotton', '150', '28', 'Black', 'onepiece.jpg'),
('TOYO-1', 'CTTN-TOYO', 'TOYO', 'Toyo Printed T-shirt 100% Cotton', '200', '10', 'Black', 'TOYO.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `talkshirt_trail`
--

CREATE TABLE `talkshirt_trail` (
  `ID` int(11) NOT NULL,
  `UNAME` varchar(100) NOT NULL,
  `ACTIVITY` text NOT NULL,
  `CATEGORY` varchar(100) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `TIME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `talkshirt_trail`
--

INSERT INTO `talkshirt_trail` (`ID`, `UNAME`, `ACTIVITY`, `CATEGORY`, `DATE`, `TIME`) VALUES
(156, 'admin', 'admin Logged In', 'Log In', '04/04/2022', '12:33:27 AM'),
(157, 'maia', 'maia Blocked', 'Block', '04/06/2022', '07:42:00 PM'),
(158, 'maia', 'maia Logged In', 'Log In', '04/06/2022', '07:47:15 PM'),
(159, 'maia', 'maia Logged In', 'Log In', '04/06/2022', '07:48:19 PM'),
(160, 'admin', 'admin Logged In', 'Log In', '04/06/2022', '07:57:02 PM'),
(161, 'admin', 'admin Logged In', 'Log In', '04/06/2022', '08:08:59 PM'),
(162, 'admin', 'admin Logged In', 'Log In', '04/06/2022', '08:11:04 PM'),
(163, 'admin', 'admin Logged In', 'Log In', '04/06/2022', '08:20:53 PM'),
(164, 'admin', 'admin Logged In', 'Log In', '04/06/2022', '08:32:59 PM'),
(165, 'admin', 'admin Logged In', 'Log In', '04/06/2022', '08:34:59 PM'),
(166, 'admin', 'admin Logged In', 'Log In', '04/07/2022', '06:31:27 PM'),
(167, 'admin', 'admin Logged In', 'Log In', '04/11/2022', '07:06:47 PM'),
(168, 'frank', 'frank Logged In', 'Log In', '04/11/2022', '07:09:11 PM'),
(169, 'frank', 'frank Ordered 4 pc(s) of Combilicious', 'Order', '04/11/2022', '08:23:23 PM'),
(170, 'frank', 'frank Ordered 4 pc(s) of Combilicious', 'Order', '04/11/2022', '08:23:59 PM'),
(171, 'frank', 'frank Ordered 4 pc(s) of Combilicious', 'Order', '04/11/2022', '08:24:52 PM'),
(172, 'frank', 'frank Ordered 4 pc(s) of Combilicious', 'Order', '04/11/2022', '08:27:07 PM'),
(173, 'frank', 'frank Ordered 4 pc(s) of Combilicious', 'Order', '04/11/2022', '08:27:48 PM'),
(174, 'frank', 'frank Ordered 4 pc(s) of Combilicious', 'Order', '04/11/2022', '08:28:10 PM'),
(175, 'frank', 'frank Ordered 4 pc(s) of Combilicious', 'Order', '04/11/2022', '08:28:37 PM'),
(176, 'frank', 'frank Ordered 4 pc(s) of Combilicious', 'Order', '04/11/2022', '08:29:36 PM'),
(177, 'frank', 'frank Ordered 4 pc(s) of Combilicious', 'Order', '04/11/2022', '08:30:01 PM'),
(178, 'admin', 'admin Logged In', 'Log In', '04/11/2022', '10:34:33 PM'),
(179, 'admin', 'admin Logged In', 'Log In', '04/12/2022', '07:44:11 PM'),
(180, 'maia', 'maia Logged In', 'Log In', '04/12/2022', '08:26:19 PM'),
(181, 'admin', 'admin Logged In', 'Log In', '04/12/2022', '09:49:59 PM'),
(182, 'maia', 'maia Logged In', 'Log In', '04/13/2022', '10:38:20 PM'),
(183, 'admin', 'admin Logged In', 'Log In', '04/13/2022', '10:39:34 PM'),
(184, 'admin', 'admin Logged In', 'Log In', '04/13/2022', '11:18:00 PM'),
(185, 'maia', 'maia Logged In', 'Log In', '04/14/2022', '12:05:44 AM'),
(186, 'maia', 'maia Ordered 2 pc(s) of Toyo ', 'Order', '04/14/2022', '12:49:52 AM'),
(187, 'maia', 'maia Ordered 2 pc(s) of Toyo ', 'Order', '04/14/2022', '12:51:03 AM'),
(188, 'maia', 'maia Ordered 2 pc(s) of Toyo ', 'Order', '04/14/2022', '12:51:41 AM'),
(189, 'maia', 'maia Ordered 2 pc(s) of Toyo ', 'Order', '04/14/2022', '12:52:05 AM'),
(190, 'maia', 'maia Ordered 2 pc(s) of Toyo ', 'Order', '04/14/2022', '12:52:26 AM'),
(191, 'maia', 'maia Ordered 2 pc(s) of Toyo ', 'Order', '04/14/2022', '12:53:10 AM'),
(192, 'maia', 'maia Ordered 2 pc(s) of Toyo ', 'Order', '04/14/2022', '12:53:21 AM'),
(193, 'admin', 'admin Logged In', 'Log In', '04/14/2022', '01:48:50 AM'),
(194, 'admin', 'admin Logged In', 'Log In', '04/14/2022', '01:50:03 AM'),
(195, 'admin', 'admin Logged In', 'Log In', '04/14/2022', '01:51:44 AM'),
(196, 'admin', 'admin Logged In', 'Log In', '04/14/2022', '01:55:22 AM'),
(197, 'admin', 'admin Blocked', 'Block', '04/15/2022', '05:34:10 PM'),
(198, 'admin', 'admin Logged In', 'Log In', '04/15/2022', '05:37:33 PM'),
(199, 'maia', 'maia Logged In', 'Log In', '04/15/2022', '05:49:39 PM'),
(200, 'maia', 'maia Ordered 2 pc(s) of Toyo ', 'Order', '04/15/2022', '05:50:15 PM'),
(201, 'maia', 'maia Ordered 2 pc(s) of Toyo ', 'Order', '04/15/2022', '05:50:58 PM'),
(202, 'maia', 'maia Ordered 2 pc(s) of Toyo ', 'Order', '04/15/2022', '05:52:21 PM'),
(203, 'maia', 'maia Ordered 2 pc(s) of Toyo ', 'Order', '04/15/2022', '05:52:55 PM'),
(204, 'admin', 'admin Logged In', 'Log In', '04/15/2022', '05:54:05 PM'),
(205, 'maia', 'maia Logged In', 'Log In', '04/15/2022', '05:54:33 PM'),
(206, 'admin', 'admin Logged In', 'Log In', '04/15/2022', '06:04:20 PM'),
(207, 'maia', 'maia Logged In', 'Log In', '04/15/2022', '06:05:38 PM'),
(208, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '06:06:02 PM'),
(209, 'maia', 'maia Logged In', 'Log In', '04/15/2022', '06:12:09 PM'),
(210, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '06:15:35 PM'),
(211, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '06:22:10 PM'),
(212, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '06:28:24 PM'),
(213, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '06:28:50 PM'),
(214, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '06:29:02 PM'),
(215, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '06:29:30 PM'),
(216, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '06:30:11 PM'),
(217, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '06:30:33 PM'),
(218, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '06:30:40 PM'),
(219, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '06:31:15 PM'),
(220, 'admin', 'admin Logged In', 'Log In', '04/15/2022', '06:32:47 PM'),
(221, 'frank', 'frank Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '08:03:21 PM'),
(222, 'frank', 'frank Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '08:03:21 PM'),
(223, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '08:05:05 PM'),
(224, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '09:37:51 PM'),
(225, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '09:47:15 PM'),
(226, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '09:48:28 PM'),
(227, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '09:48:39 PM'),
(228, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '09:48:45 PM'),
(229, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '09:49:15 PM'),
(230, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '09:52:55 PM'),
(231, 'maia', 'maia Ordered 5 pc(s) of TOYO', 'Order', '04/15/2022', '09:59:32 PM'),
(232, 'maia', 'maia Ordered 5 pc(s) of TOYO', 'Order', '04/15/2022', '10:01:06 PM'),
(233, 'maia', 'maia Ordered 1 pc(s) of TOYO', 'Order', '04/15/2022', '10:01:31 PM'),
(234, 'maia', 'maia Ordered 1 pc(s) of TOYO', 'Order', '04/15/2022', '10:05:09 PM'),
(235, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '10:25:22 PM'),
(236, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '10:27:30 PM'),
(237, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '10:28:15 PM'),
(238, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '10:30:16 PM'),
(239, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '10:30:38 PM'),
(240, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '10:34:15 PM'),
(241, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '10:51:08 PM'),
(242, 'admin', 'admin Logged In', 'Log In', '04/15/2022', '11:00:36 PM'),
(243, 'frank', 'frank Logged In', 'Log In', '04/15/2022', '11:02:36 PM'),
(244, 'frank', 'frank Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '11:03:08 PM'),
(245, 'frank', 'frank Ordered 2 pc(s) of TOYO', 'Order', '04/15/2022', '11:06:44 PM'),
(246, 'frank', 'frank Ordered 5 pc(s) of TOYO', 'Order', '04/15/2022', '11:12:42 PM'),
(247, 'frank', 'frank Ordered 5 pc(s) of TOYO', 'Order', '04/15/2022', '11:13:06 PM'),
(248, 'frank', 'frank Ordered 5 pc(s) of TOYO', 'Order', '04/15/2022', '11:21:16 PM'),
(249, 'frank', 'frank Ordered 5 pc(s) of TOYO', 'Order', '04/15/2022', '11:21:45 PM'),
(250, 'frank', 'frank Ordered 10 pc(s) of TOYO', 'Order', '04/15/2022', '11:22:16 PM'),
(251, 'admin', 'admin Logged In', 'Log In', '04/15/2022', '11:22:39 PM'),
(252, 'admin', 'admin Logged In', 'Log In', '05/17/2022', '02:25:46 PM'),
(253, 'Ivan_Employee', 'Ivan_Employee Logged In', 'Log In', '05/17/2022', '02:33:38 PM'),
(254, 'admin', 'admin Logged In', 'Log In', '05/17/2022', '02:44:12 PM'),
(255, 'maia', 'maia Logged In', 'Log In', '05/17/2022', '03:02:35 PM'),
(256, 'admin', 'admin Logged In', 'Log In', '05/17/2022', '03:03:26 PM'),
(257, 'admin', 'admin Logged In', 'Log In', '05/17/2022', '03:09:38 PM'),
(258, 'maia', 'maia Logged In', 'Log In', '05/17/2022', '03:10:12 PM'),
(259, 'maia', 'maia Ordered 1 pc(s) of TOYO', 'Order', '05/17/2022', '03:10:34 PM'),
(260, 'admin', 'admin Logged In', 'Log In', '05/17/2022', '03:10:48 PM'),
(261, 'admin', 'admin Logged In', 'Log In', '05/17/2022', '03:13:23 PM'),
(262, 'admin', 'admin Logged In', 'Log In', '05/17/2022', '03:19:52 PM'),
(263, 'rhey123', 'rhey123 Logged In', 'Log In', '05/17/2022', '03:24:04 PM'),
(264, 'admin', 'admin Logged In', 'Log In', '05/17/2022', '03:35:00 PM'),
(265, 'admin', 'admin Logged In', 'Log In', '05/24/2022', '09:43:59 AM'),
(266, 'emp1', 'emp1 Logged In', 'Log In', '05/24/2022', '09:49:12 AM'),
(267, 'admin', 'admin Logged In', 'Log In', '05/24/2022', '09:55:23 AM'),
(268, 'maia', 'maia Logged In', 'Log In', '05/24/2022', '01:31:45 PM'),
(269, 'admin', 'admin Logged In', 'Log In', '05/24/2022', '01:34:27 PM'),
(270, 'maia', 'maia Logged In', 'Log In', '05/24/2022', '01:36:33 PM'),
(271, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '05/24/2022', '01:37:57 PM'),
(272, 'admin', 'admin Logged In', 'Log In', '05/24/2022', '01:39:10 PM'),
(273, 'maia', 'maia Logged In', 'Log In', '05/24/2022', '01:43:10 PM'),
(274, 'admin', 'admin Logged In', 'Log In', '05/24/2022', '01:43:51 PM'),
(275, 'maia', 'maia Logged In', 'Log In', '05/24/2022', '01:45:29 PM'),
(276, 'admin', 'admin Logged In', 'Log In', '05/24/2022', '01:46:41 PM'),
(277, 'maia', 'maia Logged In', 'Log In', '05/24/2022', '01:47:19 PM'),
(278, 'admin', 'admin Logged In', 'Log In', '05/31/2022', '10:54:07 AM'),
(279, 'maia', 'maia Logged In', 'Log In', '05/31/2022', '11:00:55 AM'),
(280, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '05/31/2022', '11:01:14 AM'),
(281, 'admin', 'admin Logged In', 'Log In', '05/31/2022', '11:05:00 AM'),
(282, 'maia', 'maia Logged In', 'Log In', '05/31/2022', '11:34:46 AM'),
(283, 'admin', 'admin Logged In', 'Log In', '05/31/2022', '11:36:28 AM'),
(284, 'maia', 'maia Logged In', 'Log In', '05/31/2022', '11:52:59 AM'),
(285, 'maia', 'maia Ordered 5 pc(s) of sample', 'Order', '05/31/2022', '11:53:16 AM'),
(286, 'admin', 'admin Logged In', 'Log In', '05/31/2022', '11:58:56 AM'),
(287, 'maia', 'maia Logged In', 'Log In', '05/31/2022', '12:03:15 PM'),
(288, 'maia', 'maia Ordered 5 pc(s) of GUKO', 'Order', '05/31/2022', '12:03:30 PM'),
(289, 'maia', 'maia Ordered 5 pc(s) of GUKO', 'Order', '05/31/2022', '12:04:12 PM'),
(290, 'maia', 'maia Ordered 5 pc(s) of GUKO', 'Order', '05/31/2022', '12:04:49 PM'),
(291, 'maia', 'maia Ordered 1 pc(s) of GUKO', 'Order', '05/31/2022', '12:05:10 PM'),
(292, 'maia', 'maia Ordered 1 pc(s) of GUKO', 'Order', '05/31/2022', '12:07:59 PM'),
(293, 'maia', 'maia Ordered 1 pc(s) of GUKO', 'Order', '05/31/2022', '12:10:45 PM'),
(294, 'maia', 'maia Ordered 1 pc(s) of GUKO', 'Order', '05/31/2022', '12:11:47 PM'),
(295, 'admin', 'admin Logged In', 'Log In', '05/31/2022', '12:15:58 PM'),
(296, 'maia', 'maia Logged In', 'Log In', '05/31/2022', '12:19:20 PM'),
(297, 'maia', 'maia Ordered 20 pc(s) of sample', 'Order', '05/31/2022', '12:19:33 PM'),
(298, 'maia', 'maia Ordered 20 pc(s) of sample', 'Order', '05/31/2022', '12:19:52 PM'),
(299, 'admin', 'admin Logged In', 'Log In', '05/31/2022', '12:20:01 PM'),
(300, 'maia', 'maia Logged In', 'Log In', '05/31/2022', '12:21:34 PM'),
(301, 'maia', 'maia Ordered 20 pc(s) of sample1', 'Order', '05/31/2022', '12:21:48 PM'),
(302, 'admin', 'admin Logged In', 'Log In', '05/31/2022', '12:21:57 PM'),
(303, 'maia', 'maia Logged In', 'Log In', '05/31/2022', '12:24:49 PM'),
(304, 'maia', 'maia Ordered 2 pc(s) of sample', 'Order', '05/31/2022', '12:25:07 PM'),
(305, 'admin', 'admin Logged In', 'Log In', '05/31/2022', '12:25:35 PM'),
(306, 'maia', 'maia Logged In', 'Log In', '05/31/2022', '12:28:06 PM'),
(307, 'maia', 'maia Ordered 2 pc(s) of sample', 'Order', '05/31/2022', '12:28:20 PM'),
(308, 'admin', 'admin Logged In', 'Log In', '05/31/2022', '12:28:29 PM'),
(309, 'maia', 'maia Logged In', 'Log In', '05/31/2022', '12:37:47 PM'),
(310, 'maia', 'maia Ordered 2 pc(s) of sample', 'Order', '05/31/2022', '12:38:05 PM'),
(311, 'admin', 'admin Logged In', 'Log In', '05/31/2022', '12:38:15 PM'),
(312, 'maia', 'maia Logged In', 'Log In', '05/31/2022', '12:40:33 PM'),
(313, 'admin', 'admin Logged In', 'Log In', '05/31/2022', '12:45:27 PM'),
(314, 'maia', 'maia Logged In', 'Log In', '05/31/2022', '02:12:19 PM'),
(315, 'maia', 'maia Logged In', 'Log In', '05/31/2022', '02:22:57 PM'),
(316, 'maia', 'maia Logged In', 'Log In', '05/31/2022', '02:23:25 PM'),
(317, 'admin', 'admin Logged In', 'Log In', '05/31/2022', '02:28:12 PM'),
(318, 'maia', 'maia Logged In', 'Log In', '05/31/2022', '04:54:41 PM'),
(319, 'maia', 'maia Ordered 2 pc(s) of sample', 'Order', '05/31/2022', '04:55:39 PM'),
(320, 'maia', 'maia Ordered 2 pc(s) of sample', 'Order', '05/31/2022', '05:09:42 PM'),
(321, 'maia', 'maia Ordered 2 pc(s) of sample', 'Order', '05/31/2022', '09:44:57 PM'),
(322, 'maia', 'maia Logged In', 'Log In', '06/02/2022', '04:44:59 PM'),
(323, 'maia', 'maia Logged In', 'Log In', '06/02/2022', '05:06:17 PM'),
(324, 'maia', 'maia Logged In', 'Log In', '06/02/2022', '05:18:02 PM'),
(325, 'maia', 'maia Ordered 2 pc(s) of sample', 'Order', '06/02/2022', '05:24:29 PM'),
(326, 'maia', 'maia Ordered 2 pc(s) of sample', 'Order', '06/02/2022', '05:51:16 PM'),
(327, 'admin', 'admin Logged In', 'Log In', '06/02/2022', '05:53:50 PM'),
(328, 'admin', 'admin Logged In', 'Log In', '06/02/2022', '05:58:32 PM'),
(329, 'admin', 'admin Logged In', 'Log In', '06/02/2022', '06:14:22 PM'),
(330, 'maia', 'maia Logged In', 'Log In', '06/02/2022', '06:21:59 PM'),
(331, 'admin', 'admin Logged In', 'Log In', '06/02/2022', '06:27:03 PM'),
(332, 'maia', 'maia Logged In', 'Log In', '06/02/2022', '07:08:33 PM'),
(333, 'admin', 'admin Logged In', 'Log In', '06/02/2022', '07:09:40 PM'),
(334, 'maia', 'maia Logged In', 'Log In', '06/02/2022', '07:29:05 PM'),
(335, 'admin', 'admin Logged In', 'Log In', '06/02/2022', '07:48:50 PM'),
(336, 'maia', 'maia Logged In', 'Log In', '06/02/2022', '07:49:12 PM'),
(337, 'admin', 'admin Logged In', 'Log In', '06/02/2022', '08:02:16 PM'),
(338, 'maia', 'maia Logged In', 'Log In', '06/03/2022', '10:18:40 AM'),
(339, 'admin', 'admin Logged In', 'Log In', '06/03/2022', '10:20:24 AM'),
(340, 'admin', 'admin Logged In', 'Log In', '06/03/2022', '10:33:59 AM'),
(341, 'maia', 'maia Logged In', 'Log In', '06/03/2022', '10:38:33 PM'),
(342, 'admin', 'admin Logged In', 'Log In', '06/03/2022', '10:42:48 PM'),
(343, 'maia', 'maia Logged In', 'Log In', '06/03/2022', '10:59:56 PM'),
(344, 'maia', 'maia Ordered 3 pc(s) of TOYO', 'Order', '06/03/2022', '11:00:11 PM'),
(345, 'admin', 'admin Logged In', 'Log In', '06/03/2022', '11:00:21 PM'),
(346, 'maia', 'maia Logged In', 'Log In', '06/03/2022', '11:21:52 PM'),
(347, 'maia', 'maia Logged In', 'Log In', '06/03/2022', '11:22:35 PM'),
(348, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '06/03/2022', '11:25:17 PM'),
(349, 'admin', 'admin Logged In', 'Log In', '06/03/2022', '11:25:40 PM'),
(350, 'admin', 'admin Logged In', 'Log In', '06/04/2022', '03:59:25 PM'),
(351, 'admin', 'admin Logged In', 'Log In', '06/04/2022', '04:03:00 PM'),
(352, 'admin', 'admin Logged In', 'Log In', '06/04/2022', '09:17:11 PM'),
(353, 'maia', 'maia Logged In', 'Log In', '06/04/2022', '09:20:03 PM'),
(354, 'maia', 'maia Ordered 3 pc(s) of TOYO', 'Order', '06/04/2022', '09:20:54 PM'),
(355, 'admin', 'admin Logged In', 'Log In', '06/04/2022', '09:21:19 PM'),
(356, 'admin', 'admin Logged In', 'Log In', '06/04/2022', '09:55:55 PM'),
(357, 'maia', 'maia Logged In', 'Log In', '06/04/2022', '09:59:29 PM'),
(358, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '06/04/2022', '09:59:41 PM'),
(359, 'admin', 'admin Logged In', 'Log In', '06/04/2022', '10:00:13 PM'),
(360, 'admin', 'admin Logged In', 'Log In', '06/05/2022', '01:30:26 PM'),
(361, 'maia', 'maia Logged In', 'Log In', '06/05/2022', '01:41:53 PM'),
(362, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '06/05/2022', '01:42:49 PM'),
(363, 'maia', 'maia Ordered 2 pc(s) of TOYO', 'Order', '06/05/2022', '01:44:21 PM'),
(364, 'admin', 'admin Logged In', 'Log In', '06/05/2022', '01:44:30 PM'),
(365, 'admin', 'admin Logged In', 'Log In', '06/05/2022', '01:54:04 PM'),
(366, 'maia', 'maia Logged In', 'Log In', '06/05/2022', '06:17:15 PM'),
(367, 'admin', 'admin Logged In', 'Log In', '06/05/2022', '06:18:24 PM'),
(368, 'maia', 'maia Logged In', 'Log In', '06/05/2022', '07:20:28 PM'),
(369, 'maia', 'maia Ordered 2 pc(s) of Anime', 'Order', '06/05/2022', '07:56:33 PM'),
(370, 'maia', 'maia Ordered 2 pc(s) of Anime', 'Order', '06/05/2022', '07:57:21 PM'),
(371, 'maia', 'maia Ordered 2 pc(s) of Anime', 'Order', '06/05/2022', '07:58:02 PM'),
(372, 'maia', 'maia Ordered 2 pc(s) of Anime', 'Order', '06/05/2022', '07:58:25 PM'),
(373, 'maia', 'maia Ordered 3 pc(s) of Anime', 'Order', '06/05/2022', '08:10:24 PM'),
(374, 'maia', 'maia Ordered 3 pc(s) of Anime', 'Order', '06/05/2022', '08:11:38 PM'),
(375, 'maia', 'maia Ordered 3 pc(s) of Anime', 'Order', '06/05/2022', '08:14:59 PM'),
(376, 'maia', 'maia Ordered 3 pc(s) of Anime', 'Order', '06/05/2022', '08:15:00 PM'),
(377, 'maia', 'maia Ordered 3 pc(s) of Anime', 'Order', '06/05/2022', '08:15:01 PM'),
(378, 'maia', 'maia Ordered 3 pc(s) of Anime', 'Order', '06/05/2022', '08:15:01 PM'),
(379, 'maia', 'maia Ordered 3 pc(s) of Anime', 'Order', '06/05/2022', '08:15:01 PM'),
(380, 'maia', 'maia Ordered 3 pc(s) of Anime', 'Order', '06/05/2022', '08:15:01 PM'),
(381, 'maia', 'maia Ordered 3 pc(s) of Anime', 'Order', '06/05/2022', '08:15:02 PM'),
(382, 'maia', 'maia Ordered 3 pc(s) of Anime', 'Order', '06/05/2022', '08:15:04 PM'),
(383, 'maia', 'maia Ordered 1 pc(s) of Anime', 'Order', '06/05/2022', '09:44:32 PM'),
(384, 'maia', 'maia Ordered 1 pc(s) of Anime', 'Order', '06/05/2022', '09:45:05 PM'),
(385, 'maia', 'maia Ordered 1 pc(s) of Anime', 'Order', '06/05/2022', '09:45:13 PM'),
(386, 'maia', 'maia Ordered 1 pc(s) of Anime', 'Order', '06/05/2022', '09:45:29 PM'),
(387, 'maia', 'maia Ordered 1 pc(s) of Anime', 'Order', '06/05/2022', '09:45:35 PM'),
(388, 'maia', 'maia Ordered 1 pc(s) of Anime', 'Order', '06/05/2022', '09:47:42 PM'),
(389, 'maia', 'maia Ordered 1 pc(s) of Anime', 'Order', '06/05/2022', '09:47:48 PM'),
(390, 'maia', 'maia Ordered 2 pc(s) of Anime', 'Order', '06/05/2022', '09:49:11 PM'),
(391, 'maia', 'maia Ordered 2 pc(s) of Anime', 'Order', '06/05/2022', '09:50:17 PM'),
(392, 'maia', 'maia Ordered 1 pc(s) of Anime', 'Order', '06/05/2022', '09:53:50 PM'),
(393, 'admin', 'admin Logged In', 'Log In', '06/05/2022', '10:08:48 PM'),
(394, 'maia', 'maia Logged In', 'Log In', '06/05/2022', '10:12:52 PM'),
(395, 'maia', 'maia Logged In', 'Log In', '06/06/2022', '09:53:20 PM'),
(396, 'maia', 'maia Ordered 2 pc(s) of One-Piece', 'Order', '06/06/2022', '10:34:37 PM'),
(397, 'maia', 'maia Ordered 2 pc(s) of One-Piece', 'Order', '06/06/2022', '10:36:34 PM'),
(398, 'maia', 'maia Ordered 2 pc(s) of One-Piece', 'Order', '06/06/2022', '10:37:19 PM'),
(399, 'maia', 'maia Ordered 2 pc(s) of One-Piece', 'Order', '06/06/2022', '10:44:35 PM'),
(400, 'maia', 'maia Ordered 2 pc(s) of One-Piece', 'Order', '06/06/2022', '10:44:52 PM'),
(401, 'admin', 'admin Logged In', 'Log In', '06/06/2022', '10:50:35 PM'),
(402, 'maia', 'maia Logged In', 'Log In', '06/06/2022', '11:11:17 PM'),
(403, 'maia', 'maia Ordered 2 pc(s) of One-Piece', 'Order', '06/06/2022', '11:11:43 PM'),
(404, 'admin', 'admin Logged In', 'Log In', '06/06/2022', '11:12:08 PM');

-- --------------------------------------------------------

--
-- Table structure for table `talkshirt_users`
--

CREATE TABLE `talkshirt_users` (
  `ID` int(20) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `FIRST_NAME` varchar(50) NOT NULL,
  `MIDDLE_NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `TELNUM` varchar(50) NOT NULL,
  `UNAME` varchar(50) NOT NULL,
  `PWORD` varchar(30) NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `BDAY` varchar(50) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `JOB_ID` varchar(50) DEFAULT NULL,
  `USER_TYPE` varchar(50) NOT NULL,
  `BLOCK` tinyint(1) NOT NULL,
  `SECURITY_CODE` varchar(100) NOT NULL,
  `NOTIFICATIONS` int(11) NOT NULL,
  `URLPIC` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='USERS OF EHD';

--
-- Dumping data for table `talkshirt_users`
--

INSERT INTO `talkshirt_users` (`ID`, `LAST_NAME`, `FIRST_NAME`, `MIDDLE_NAME`, `EMAIL`, `TELNUM`, `UNAME`, `PWORD`, `GENDER`, `BDAY`, `ADDRESS`, `JOB_ID`, `USER_TYPE`, `BLOCK`, `SECURITY_CODE`, `NOTIFICATIONS`, `URLPIC`) VALUES
(102, 'Admin', 'Admin #1', '0', 'talkshirt@gmail.com', '9112772', 'admin', '1234', 'Male', 'August 4 1998', 'Antipolo', 'ADMIN', 'ADMIN', 0, 'UYyVi', 0, ''),
(113, 'Monticalvo', 'Maia', 'Ella', 'maia.medusa21@gmail.com', '639661377664', 'maia', 'jden', 'Female', 'March 12 2022', 'Gensan', NULL, 'CUSTOMER', 2, '', 0, 'person.png'),
(114, 'Quinampay', 'Frank', 'Cesar', 'fquinampay@gmail.com', '6396613776786', 'frank', '1234', 'Male', 'July 6 1998', 'General Santos City', NULL, 'CUSTOMER', 2, '', 0, 'person.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `talkshirt_logs`
--
ALTER TABLE `talkshirt_logs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `talkshirt_orders`
--
ALTER TABLE `talkshirt_orders`
  ADD PRIMARY KEY (`TRANSID`);

--
-- Indexes for table `talkshirt_stocks`
--
ALTER TABLE `talkshirt_stocks`
  ADD PRIMARY KEY (`PROID`);

--
-- Indexes for table `talkshirt_trail`
--
ALTER TABLE `talkshirt_trail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `talkshirt_users`
--
ALTER TABLE `talkshirt_users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `talkshirt_logs`
--
ALTER TABLE `talkshirt_logs`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `talkshirt_trail`
--
ALTER TABLE `talkshirt_trail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT for table `talkshirt_users`
--
ALTER TABLE `talkshirt_users`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
