
-- --------------------------------------------------------

--
-- Table structure for table `mentor_respond`
--

DROP TABLE IF EXISTS `mentor_respond`;
CREATE TABLE IF NOT EXISTS `mentor_respond` (
  `replyid` int NOT NULL AUTO_INCREMENT,
  `mentor_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `mentor_reply` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `questions` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `sendto` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`replyid`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentor_respond`
--

INSERT INTO `mentor_respond` (`replyid`, `mentor_name`, `mentor_reply`, `questions`, `sendto`) VALUES
(3, 'prof.Shrihari Joshi', 'yes im free', 'are you free after 9.00', '2SD20CS027'),
(4, 'prof.Shrihari Joshi', 'persentation will be on 18th september', 'when will be the persenattion?', '2SD20CS027'),
(21, 'Prof.Indira Umarji', 'yes i will enage the class', 'are you enaging the class?', '2SD20CS042'),
(29, 'prof.Shrihari Joshi', 'hussnain its working ', 'is this working now ?', '2SD20CS042'),
(31, 'Dr.Raghavendra G S', 'it will be enaged in room no 22!!', 'ACOA class will be  at room no?', '2SD20CS000'),
(32, 'Prof.Rani Shetty', 'ok max i will look after it ', 'can you cancel the class on monday as we are having  campus interviews ?', '2SD20CS000'),
(33, 'Dr.Raghavendra G S', '4pm', 'class time?', '2SD20CS050'),
(34, 'Prof.Rani Shetty', 'NO!!', 'do we have class today?', '2SD20CS042'),
(35, 'prof.prathab M K', 'yes i know', 'college is great.', '2SD20CS027'),
(36, 'Dr.U.P kulkarni', 'nice', 'how is freshers going on ', '2SD20CS000'),
(37, 'prof.Shrihari Joshi', 'after 3.30pm', 'at what time should i come?', '2SD20CS027'),
(38, 'Prof.Indira Umarji', 'Thank you !!', 'happy birthday !!!', '2SD20CS000'),
(39, 'prof.prathab M K', '5am', 'class', '2SD20CS050'),
(40, 'Prof.Shrihari Joshi', 'ok. All the best for the future.', 'hello sir. Thanks for supporting ', '2SD20CS042'),
(42, 'Dr.U.P kulkarni', 'yes H', 'testing check ', '2SD20CS042'),
(43, 'Prof.Rani Shetty', 'welll max', 'max max well', '2SD20CS000'),
(44, 'Prof.Shrihari Joshi', 'thank you mary', 'Congo on becoming hod sir', '2SD20CS099'),
(45, 'Prof.Yashodha Sambra', 'cookie tested', 'cookie testing ', '2SD20CS042');
