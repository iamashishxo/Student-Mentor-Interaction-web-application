
-- --------------------------------------------------------

--
-- Table structure for table `student_loginnn`
--

DROP TABLE IF EXISTS `student_loginnn`;
CREATE TABLE IF NOT EXISTS `student_loginnn` (
  `student_usn` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `sendto_usn` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `student_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_loginnn`
--

INSERT INTO `student_loginnn` (`student_usn`, `sendto_usn`, `student_name`) VALUES
('bhbiublh', 'm,', ','),
('asdfghjk', 'asdfghjkl;', 'asdfghjkl');
