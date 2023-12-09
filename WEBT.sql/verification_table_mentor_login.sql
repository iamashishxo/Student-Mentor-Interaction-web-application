
-- --------------------------------------------------------

--
-- Table structure for table `mentor_login`
--

DROP TABLE IF EXISTS `mentor_login`;
CREATE TABLE IF NOT EXISTS `mentor_login` (
  `user_id` varchar(22) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(22) COLLATE utf8mb4_general_ci NOT NULL,
  `mentor_name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `mentor_email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `HOD` int NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentor_login`
--

INSERT INTO `mentor_login` (`user_id`, `pass`, `mentor_name`, `mentor_email`, `HOD`) VALUES
('CSEME001', 'a', 'Prof.Shrihari Joshi', 'hussnainsadarbhai@gmail.com', 1),
('CSEME004', 'a', 'Prof.Prathab M K', 'defg01@gmail.com', 0),
('CSEME002', 'a', 'Dr.U.P kulkarni', 'upk@gmail.com', 0),
('CSEME003', 'a', 'Dr.Jayadevi karur', 'jaya@gmail.com', 0),
('CSEME005', 'a', 'Prof.Rani Shetty', 'rani@gmail.com', 0),
('CSEME006', 'a', 'Dr.Raghavendra G S', 'raghavendra@gmail.com', 0),
('CSEME007', 'a', 'Prof.Indira Umarji', 'indira@gmail.com', 0),
('CSEME008', 'a', 'Prof.Rashmi Patil', 'rashmi@gmail.com', 0),
('CSEME009', 'a', 'Prof.Yashodha Sambra', 'yashodha@gmail.com', 0);
('CSEME010',  'a', 'prof.shardha HN','sharda@gmail.com',0);
