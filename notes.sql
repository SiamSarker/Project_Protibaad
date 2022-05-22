-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 01:31 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `file_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL DEFAULT 'not approved yet'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`file_id`, `title`, `description`, `image`, `status`) VALUES
(5, 'Elon Musk and the $43 billion bid: all of the updates', 'First, we learned that Elon Musk had purchased enough shares of Twitter to become its largest individual shareholder. The company announced Musk would take a seat on its board of directors, but within the space of a week, that plan unraveled, and Musk informed the board he will not accept the position.\r\n\r\nAfter a tumultuous week, Twitter CEO Parag Agrawal announced that Musk declined the board seat, which released the world’s richest human from his commitment to not acquire more than 14.9 percent of the company’s shares. In a letter to Twitter employees, Agrawal said, “There will be distractions ahead, but our goals and priorities remain unchanged.” He also asked employees to “tune out the noise.”', '941310.png', 'approved'),
(6, 'Google Scholarship 2022 – Dates, Eligibility and Application', 'Google scholarship is an initiative of Google Inc. that aims at providing financial support to students who aspire to pursue a career in technology. It is a broad term that comprises a number of scholarships and contests that are available for students worldwide. Every year, Google offers opportunities for school students, women in technology, developers and individuals to create their mark in the technological world. A Google scholarship not only provides the students with financial support but also provides them with an opportunity to learn through workshops and training.', '711824.jpg', 'approved'),
(7, 'UIU Mars Rover selected for the University Rover Challenge', 'The UIU Mars Rover team from United International University (UIU) has been selected in the University Rover Challenge 2022 (URC 2022) organised by The Mars Society. \r\n\r\nAmong 99 Universities from all over the world, UIU scored an outstanding 90.92 out of 100 and were selected in the World Final. The team will fight in the World Final competing with the finest teams at the Mars Desert Research Station (MDRS), Utah, USA from June 1 to June 4. The team was supervised by CSE department lecturer Akib Zaman. Akib was the team leader of MIST Mongol Barota in URC 2021 and secured the top position in the Virtual Final of URC 2021.', '738104.jpg', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(4) NOT NULL,
  `cat_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(1, 'mysql'),
(2, 'php'),
(3, 'c programming'),
(4, 'Java'),
(5, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` varchar(1000) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(7, 'hello\r\n', 112, 32, '2022-04-19 00:28:15'),
(11, 'hy\r\n', 113, 13, '2022-04-24 13:26:16'),
(12, 'Hello', 113, 13, '2022-05-15 19:40:57'),
(13, 'Hello', 113, 13, '2022-05-15 19:41:36'),
(14, 'Hello', 113, 13, '2022-05-15 19:42:02'),
(15, 'Hello', 113, 13, '2022-05-15 19:46:17'),
(16, 'Hello', 113, 13, '2022-05-15 19:47:11'),
(17, 'Hi', 117, 13, '2022-05-15 19:50:38'),
(18, 'Hi', 121, 13, '2022-05-17 22:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `image` varchar(500) NOT NULL,
  `cat` varchar(400) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `description`, `image`, `cat`, `date`) VALUES
(3, 'This week I had the opportunity to participate in a session of the High-Level Political Forum on Sustainable Development—the United Nation’s central point of discussion of the 2030 Agenda and the Sustainable Development Goals (SDGs). This was a timely opportunity to discuss paths towards a sustainable recovery from the COVID-19 pandemic. We need the Internet in this endeavor.\n\nIt’s difficult to imagine living through the pandemic without the Internet. Researchers would have faced even greater challenges both in working to prevent the spread of COVID-19 and collaborating on the development of vaccines. It also had a profound impact on the lives of people who had access, giving many the option to work from home and continue their education.\n\nBut the first year of the pandemic has left lessons that cannot be ignored. Nearly half of the world’s population lacks Internet access. This exacerbating digital divide is caused by various reasons that range from lack of infrastructure to lack of affordable services or the necessary digital skills to take advantage of the opportunities the Internet offers.\n\nThe Internet is a critical enabler for sustainable development. It unlocks human capabilities and provides the platform upon which an emerging digital economy can thrive. As the Internet and digital technologies become more essential, it also becomes more urgent to connect the people who are being left behind. The SDGs take that into account, having called for universal and affordable access in the least developed countries by 2020—a goal that we are still far from reaching. If we don’t take action now, we face the risk of the current digital divide deepening several other divides, such as economic and gender inequalities.', 'n-1.jpeg', 'We Can’t Achieve the Sustainable Development Goals without the Internet', '2021-09-18'),
(4, 'videos with a depth of field effect.\n\nThe new cinematic mode \"anticipates when someone is about to enter the frame\" and shifts focus to them, Apple said - something known as \"pull focus\".\n\nIt is the only smartphone that lets users edit this effect after shooting, Apple boss Tim Cook said.\n\nHowever, most other features on the new model were incremental updates over previous versions.\n\nThe event was also overshadowed by news of a new security flaw in Apple devices which could expose users\' messages.\n\nApple released a security patch on Monday for the previously-unknown flaw, which could let attackers access its iMessage service without the user clicking on a malicious link or file.\n\nNew features\nThe new iPhone includes a faster A15 chip, a brighter display, and a battery life of up to 2.5 hours longer, and comes in new colours including pink, blue, midnight, starlight and red.\n\nvideos with a depth of field effect.\n\nThe new cinematic mode \"anticipates when someone is about to enter the frame\" and shifts focus to them, Apple said - something known as \"pull focus\".\n\nIt is the only smartphone that lets users edit this effect after shooting, Apple boss Tim Cook said.\n\nHowever, most other features on the new model were incremental updates over previous versions.\n\nThe event was also overshadowed by news of a new security flaw in Apple devices which could expose users\' messages.\n\nApple released a security patch on Monday for the previously-unknown flaw, which could let attackers access its iMessage service without the user clicking on a malicious link or file.\n\nNew features\nThe new iPhone includes a faster A15 chip, a brighter display, and a battery life of up to 2.5 hours longer, and comes in new colours including pink, blue, midnight, starlight and red.\n\nApple has announced its new iPhone 13, which can film \"portrait mode\" videos with a depth of field effect.\n\nThe new cinematic mode \"anticipates when someone is about to enter the frame\" and shifts focus to them, Apple said - something known as \"pull focus\".\n\nIt is the only smartphone that lets users edit this effect after shooting, Apple boss Tim Cook said.\n\nHowever, most other features on the new model were incremental updates over previous versions.\n\nThe event was also overshadowed by news of a new security flaw in Apple devices which could expose users\' messages.The new iPhone includes a faster A15 chip, a brighter display, and a battery life of up to 2.5 hours longer, and comes in new colours including pink, blue, midnight, starlight and red.The new iPhone will also have up to 500GB of storage with its lowest available storage rising to 128GB from previous models\' 64GB.\n\nApple was also keen to stress its green credentials, saying the phone used many recycled materials - including antenna lines made from plastic water bottles, it said.\n\nThe launch comes as buyers are keeping their phones for longer before upgrading. Investment firm Wedbush Securities estimates that around 250 million iPhone users have not upgraded their phones in 3.5 years.\n\nPaolo Pescatore, an analyst at PP Foresight, said many have yet to experience modern features.\n\n\"While many will see some upgrades as incremental, there are millions of users who have yet to upgrade to 5G. Therefore, this so called \'supercycle\' moment is still relevant,\" he said.', 'n-3.jpg', 'Apple iPhone 13 brings portrait mode for video', '2021-09-18'),
(5, 'Dr. Sam Mazin is a computer engineer and the inventor of game-changing technology which fights cancer. RefleXion Medical, his company, has developed a revolutionary machine which can see and treat cancer. Previously, this was done using different technologies.\r\n\r\nSam shares his journey, from a kid who was crazy about math and science to pursuing computer engineering at a Canadian university which offers a special program which alternates between 4-month study and work placements. He also talks about completing advanced degrees at Stanford University where he was encouraged to combine biology and computing. As they say, the rest is history.\r\n\r\n‍', 'n-5.jpg', 'Inventing Tech Which Uses One Machine To See & Treat Cancer', '2021-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `title`, `description`) VALUES
(6, 'Who are responsible behind Dhaka College students clash with New Market traders', '');

-- --------------------------------------------------------

--
-- Table structure for table `poll_answers`
--

CREATE TABLE `poll_answers` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `votes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poll_answers`
--

INSERT INTO `poll_answers` (`id`, `poll_id`, `title`, `votes`) VALUES
(19, 6, 'Dhaka College student', 2),
(20, 6, 'New Market traders', 5),
(21, 6, 'Others', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `ans1` varchar(50) NOT NULL,
  `ans2` varchar(50) NOT NULL,
  `ans3` varchar(50) NOT NULL,
  `ans4` varchar(50) NOT NULL,
  `ans` int(4) NOT NULL,
  `cat_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `ans`, `cat_id`) VALUES
(1, 'What does SQL stand for?', 'Structued Query Language', 'Strong Question Language', 'Structued Question Language', 'Strong Query Language', 0, 1),
(2, 'Which SQL statement is used to extract data from a database?', 'EXTRACT', 'SELECT', 'GET', 'OPEN', 1, 1),
(12, 'Which SQL statement is used to delete data from a database?', 'DELETE', 'COLLAPSE', 'REMOVE', 'None of them', 0, 1),
(13, 'What is a correct syntax to output &quot;Hello World&quot; in Java?', 'System.out.println(&quot;Hello World&quot;);', 'printf(&quot;Hello World&quot;)', 'echo(&quot;Hello World);', 'Console.WriteLine(&quot;Hello World);', 0, 4),
(14, 'What is the default value of Object variable?', 'undefined', '0', 'null', 'not defined', 0, 4),
(15, 'What is function overloading?', 'Methods with same name but different parameters.', 'Methods with same name but different return types.', 'Methods with same name, same parameter types but d', '', 0, 4),
(16, 'In a file contains the line &quot;I am a boy\r\n&quot; then on reading this line into the array str us', '&quot;I am a boy\r\n\0&quot;', '&quot;I am a boy\r\0&quot;', '&quot;I am a boy\n\0&quot;', '&quot;I am a boy&quot;', 0, 3),
(17, 'Which of the following statements should be used to obtain a remainder after dividing 3.14 by 2.1 ?', 'rem = 3.14 % 2.1;', 'rem = modf(3.14, 2.1);', 'rem = fmod(3.14, 2.1);', 'Remainder cannot be obtain in floating point divis', 0, 3),
(18, 'In C, if you pass an array as an argument to a function, what actually gets passed?', 'Value of elements in array', 'First element of the array', 'Base address of the array', 'Address of the last element of array', 0, 3),
(19, 'Which of the following is correct about preg_match() function?', 'The preg_match() function searches a string specif', 'The preg_match() function searches throughout a st', 'The preg_match() function searches string for patt', 'None of the above', 0, 2),
(20, 'Which of the following method connect a MySql database using PHP?', 'mysql_connect()', ' mysql_query()', 'mysql_close()', 'None of the above', 0, 2),
(21, 'Which Function Returns Reference To Array Of Row Values?', 'Fetch()', 'Fetchrow_array()', 'Fetchrow_hashref()', 'Fetchrow_arrayref()', 3, 1),
(22, 'PHP stands for -', 'Hypertext Preprocessor', 'Pretext Hypertext Preprocessor', 'Personal Home Processor', 'None of the above', 0, 2),
(23, 'Who is known as the father of PHP?', 'Drek Kolkevi', 'List Barely', 'Rasmus Lerdrof', 'None of the above', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `q_category`
--

CREATE TABLE `q_category` (
  `q_category_id` int(8) NOT NULL,
  `q_category_name` varchar(300) NOT NULL,
  `q_category_des` varchar(400) NOT NULL,
  `q_category_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `q_category`
--

INSERT INTO `q_category` (`q_category_id`, `q_category_name`, `q_category_des`, `q_category_date`) VALUES
(1, 'Educational', 'Educational', '2021-09-17 14:06:34'),
(2, 'Social', 'Social', '2021-09-17 14:07:08'),
(3, 'Civil Rights', 'Civil Rights', '2021-09-17 14:08:13'),
(4, 'Health Care Availability', 'test', '2022-01-23 01:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(300) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_date` datetime NOT NULL DEFAULT current_timestamp(),
  `thread_user_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_date`, `thread_user_id`) VALUES
(113, 'hello', 'help', 1, '2022-04-18 22:49:35', 33),
(117, 'Hello', 'How can I do that?\r\n', 2, '2022-05-15 19:48:04', 13),
(118, 'Hello', 'How can I do that?\r\n', 2, '2022-05-15 19:48:35', 13),
(119, 'Hello', 'How can I do that?\r\n', 2, '2022-05-15 19:49:46', 13),
(120, 'Hello', 'How can I do that?\r\n', 2, '2022-05-15 19:50:07', 13),
(121, 'Help', 'Help me please.', 1, '2022-05-17 22:39:33', 13);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(225) NOT NULL,
  `file_description` text NOT NULL,
  `file_type` varchar(225) NOT NULL,
  `file_uploader` varchar(225) NOT NULL,
  `file_uploaded_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `file_uploaded_to` varchar(225) NOT NULL,
  `file` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL DEFAULT 'not approved yet'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`file_id`, `file_name`, `file_description`, `file_type`, `file_uploader`, `file_uploaded_on`, `file_uploaded_to`, `file`, `status`) VALUES
(57, 'demo previer', 'demo', 'pdf', 'user', '2017-07-19 05:08:23', 'Computer Science', '578090.pdf', 'approved'),
(56, 'teacher3 demo', 'demo', 'txt', 'teacher2', '2017-07-19 05:08:16', 'Mechanical', '565834.txt', 'approved'),
(55, 'teacher title', 'demo desc', 'zip', 'teacher', '2017-07-22 06:02:02', 'Mechanical', '898387.zip', 'approved'),
(58, 'phpp demo', 'ppph demo', 'pdf', 'anirban', '2017-07-20 14:52:41', 'Computer Science', '69321.pdf', 'not approved yet'),
(54, 'user title', 'user desc', 'zip', 'student', '2017-07-19 05:08:28', 'Computer Science', '848114.zip', 'approved'),
(53, 'demo title ..', 'demo desc...', 'zip', 'user2', '2017-07-19 04:54:36', 'Electrical', '305047.zip', 'not approved yet'),
(52, 'demo title', 'demo desc......', 'pdf', 'user1', '2017-07-22 06:02:22', 'Electrical', '845248.pdf', 'approved'),
(51, 'demo 3', 'demo 3 desc....', 'pdf', 'user3', '2017-07-22 06:02:15', 'Computer Science', '437056.pdf', 'approved'),
(50, 'demo2', 'demo desc 2...', 'ppt', 'user3', '2017-07-22 06:02:36', 'Computer Science', '800920.ppt', 'approved'),
(49, 'demo title', 'demo description', 'docx', 'user3', '2017-07-19 05:08:13', 'Computer Science', '502238.docx', 'approved'),
(61, 'testt 2', 'testt 2', 'pdf', 'root', '2022-01-22 16:41:26', 'Computer Science', '541515.pdf', 'approved'),
(60, 'test 2', 'test 2', 'pdf', 'root', '2022-01-22 16:39:53', 'Computer Science', '495602.pdf', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `about` varchar(300) NOT NULL DEFAULT 'N/A',
  `role` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `token` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `course` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL DEFAULT 'profile.jpg',
  `joindate` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `about`, `role`, `email`, `token`, `gender`, `password`, `course`, `image`, `joindate`) VALUES
(12, 'root', 'admin root', 'N/A', 'admin', 'root@gmail.com', '', 'N/A', '$2y$10$UExd.f8vQXogrZELXF8KGulQJKUn32p8x4B5SVQ7V/D6.mrSAkAjW', 'Computer Science', 'profile.jpg', '2000-01-01'),
(20, 'user3', 'user3', 'N/A', 'teacher', 'user3@gmail.com', '', 'Male', '$2y$10$DEKxq9z1r8sWPSzj2XL7LOlT.cUWZv1EbTGZlrXO2VkiBbIuRfoBu', 'Computer Science', 'profile.jpg', 'July 19, 2017'),
(36, 'siamuiu', 'Siam Sarker', 'N/A', 'student', 'siam@gmail.com', '', 'Male', '$2y$10$MUOjzMsRL15VF32OIqoUHOGZpVLk9N9.su7thOdcnv1oIM2euupI2', 'Computer Science', 'profile.jpg', 'April 23, 2022'),
(35, 'jobayerrahman', 'Jobayer', 'N/A', 'student', 'joabyer@gmail.com', '', 'Male', '$2y$10$KWfvjCKhpKqcXxAgxjYsAetq7ZmWSgYoYAz6efOGmDOLNS0Lu9EQu', 'Computer Science', 'profile.jpg', 'April 23, 2022'),
(32, 'hello123', 'hello', 'N/A', 'student', 'hello@gmail.com', '', 'Male', '$2y$10$OzKsXzHnIhqT1yHajNgFc.vo1urWvrxbeT81vtrvkp3Qro0cXpsFa', 'Computer Science', 'profile.jpg', 'January 23, 2022'),
(33, 'jobayer123', 'Jobayer', 'N/A', 'student', 'jobayerrahman888@gmail.com', '', 'Male', '$2y$10$WDZsNoWwTqiDi/u7mIi/reA7n0yqIhHAeiVl1nxY3ewW7gUgIqc9q', 'Computer Science', '237242.jpg', 'April 18, 2022'),
(34, 'Shakil', 'Shakil', 'N/A', 'student', 'hello12345@gmail.com', '', 'Male', '$2y$10$MbIR6DTF0HxPoCnoH92uM.4HFuQ5nYV793TjtOmwLNt1sw.cS52xy', 'Computer Science', 'profile.jpg', 'April 18, 2022');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `file_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` longtext NOT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `file` varchar(225) DEFAULT NULL,
  `file_uploader` varchar(255) DEFAULT NULL,
  `status` varchar(225) NOT NULL DEFAULT 'not approved yet'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`file_id`, `title`, `description`, `file_type`, `file`, `file_uploader`, `status`) VALUES
(5, 'SOCIAL EMOTIONAL LEARNING LESSON WEEK 11: SOCIAL AWARENESS', 'This SEL video lesson covers the theme of social awareness.', 'mp4', '840376.mp4', 'jobayer123', 'approved'),
(4, 'Learn project management STEP by STEP |Bangla Tutorial|', 'Section-01: Project Management Introduction Lecture-01:What is Project', 'mp4', '839818.mp4', 'jobayer123', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll_answers`
--
ALTER TABLE `poll_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `q_category`
--
ALTER TABLE `q_category`
  ADD PRIMARY KEY (`q_category_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`file_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `poll_answers`
--
ALTER TABLE `poll_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `q_category`
--
ALTER TABLE `q_category`
  MODIFY `q_category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
