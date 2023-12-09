
-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

DROP TABLE IF EXISTS `student_login`;
CREATE TABLE IF NOT EXISTS `student_login` (
  `user` varchar(22) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(22) COLLATE utf8mb4_general_ci NOT NULL,
  `student_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`user`, `pass`, `student_name`) VALUES
('2SD20CS042', 'a', 'Hussnain sadarbhai'),
('2SD20CS027', 'a', 'Ashish Manhas'),
('2SD20CS000', 'a', 'MAX'),
('2SD20CS050', 'taj', 'Sehraan Taj'),
('2SD20CS099', 'may', 'mary');
