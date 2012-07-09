CREATE TABLE IF NOT EXISTS `inschattingen` (
  `TODO_list_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `estimate` float DEFAULT NULL,
  `actual` float DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `project_manager` text,
  PRIMARY KEY (`TODO_list_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inschattingen`
--

INSERT INTO `inschattingen` (`TODO_list_id`, `user_id`, `project_id`, `estimate`, `actual`, `date`, `project_manager`) VALUES
(20176859, NULL, 9700484, NULL, NULL, '2012-06-15 15:30:15', NULL),
(20120862, NULL, 9700484, NULL, NULL, '2012-06-15 15:30:15', NULL),
(20102386, NULL, 9700484, NULL, NULL, '2012-06-15 15:30:42', NULL),
(20119428, NULL, 9700484, NULL, NULL, '2012-06-15 15:30:42', NULL),
(20084640, NULL, 9700484, NULL, NULL, '2012-06-15 15:30:15', NULL),
(20135107, NULL, 9700484, NULL, NULL, '2012-06-15 15:30:42', NULL),
(20345103, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(20065255, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18715460, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18802536, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18715518, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18715538, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18715430, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18715469, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18716052, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18715443, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18716078, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18715809, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18715559, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18716467, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18716387, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18715487, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18716454, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18716402, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18716480, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18716461, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18716500, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18716487, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(18716510, NULL, 9125578, NULL, NULL, '2012-06-15 17:16:09', NULL),
(19380943, NULL, 9409845, NULL, NULL, '2012-06-18 14:17:35', NULL),
(19381249, NULL, 9409845, NULL, NULL, '2012-06-18 14:17:35', NULL);