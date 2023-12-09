-- --------------------------------------------------------
--
-- Table structure for table `students_query`
--

DROP TABLE IF EXISTS `students_query`;
CREATE TABLE IF NOT EXISTS `students_query` (
  `q_id` int NOT NULL AUTO_INCREMENT,
  `student_usn` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `student_query` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `student_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `send_to` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE = MyISAM AUTO_INCREMENT = 55 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Dumping data for table `students_query`
--

INSERT INTO `students_query` (
    `q_id`,
    `student_usn`,
    `student_query`,
    `student_name`,
    `send_to`
  )
VALUES (
    1,
    '2SD20CS027',
    'Are you free after 10.30 today?',
    ' Ashish Manhas',
    'CSEME001'
  ),
  (
    44,
    '2SD20CS099',
    'hello maam im mary',
    ' mary',
    'CSEME005'
  ),
  (45, '2SD20CS000', 'im max', ' MAX', 'CSEME006'),
  (
    3,
    '2SD20CS042',
    'we are free after 12.30 will you enage the class?',
    ' hussnian',
    'CSEME007'
  ),
  (
    36,
    '2SD20CS042',
    'when will be freshers day for the juniors',
    ' Hussnain sadarbhai',
    'CSEME001'
  ),
  (
    33,
    '2SD20CS042',
    'is it possible to take test online',
    ' Hussnain sadarbhai',
    'CSEME003'
  );