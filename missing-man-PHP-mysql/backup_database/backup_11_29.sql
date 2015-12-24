-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2015 at 05:16 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `missing_man_php_mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `author_name` varchar(30) DEFAULT NULL,
  `author_last_name` varchar(40) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `page_count` int(11) DEFAULT NULL,
  `genre` varchar(30) DEFAULT NULL,
  `edition` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `mime_type` varchar(50) NOT NULL,
  `file_size` int(11) NOT NULL,
  `image_data` mediumblob NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `filename`, `mime_type`, `file_size`, `image_data`) VALUES
(1, '1E9B1FECBC555D25A5D6F7967F9F77431E4DB590F747EEF342pimgpsh_fullsize_distr.jpg', '', 0, 0x323234383636),
(2, '???????-126.jpg', '', 0, 0x333331303736);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `facebook_url` varchar(100) DEFAULT NULL,
  `twitter_handle` varchar(20) DEFAULT NULL,
  `hobby` varchar(30) DEFAULT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `user_pic_path` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `facebook_url`, `twitter_handle`, `hobby`, `bio`, `user_pic_path`) VALUES
(1, 'artre', 'access', 'Mike', 'Greenfield', 'mike@greenfieldguitars.com', 'http://www.facebook.com/profile.php?id-2057203572', '@greenfieldguitars', NULL, NULL, NULL),
(2, 'artre', 'access', 'Artem', 'Kovalyk', 'alakartte@gmail.com', 'https://www.facebook.com/akovalyk', '@artemkovalyk', 'soccer', NULL, NULL),
(3, 'artre', 'access', 'Alina', 'Kovalyk', 'jovavarkdesign@gmail.com', 'https://www.facebook.com/jonavarkdesign', '@jonavark', 'painting', NULL, NULL),
(4, 'artre', 'access', 'Jaime', 'Brandon', 'brandon@gmail.com', 'https://www.facebook.com/jbrandon', '@jbrandon', 'script writing', NULL, NULL),
(5, 'artre', 'access', 'Roman', 'Peleh', 'romanpeleh@gmail.com', 'http://www.facebook.com/rpeleh', 'http://www.twitter.c', 'fishing', NULL, NULL),
(6, 'artre', 'access', 'Chad', 'Harris', 'chad.harris@outdoorsg.com', 'http://www.facebook.com/charris', 'http://www.twitter.c', 'graphic design', NULL, NULL),
(7, 'artre', 'access', 'Chad', 'Harris', 'chad.harris@outdoorsg.com', 'http://www.facebook.com/charris', 'http://www.twitter.c', 'graphic design', NULL, NULL),
(9, 'artre', 'access', 'Sasha', 'Byrdennyi', 'sashaburdennyi@gmail.com', 'http://www.facebook.com/sburd', 'http://www.twitter.c', 'working out', 'Good guy', NULL),
(10, 'artre', 'access', 'Anya', 'Vytrykush', 'avytrykush@gmail.com', 'http://www.facebook.com/avytrykush', 'http://www.twitter.c', 'knitting', 'She is my sisters doter', '/Volumes/Macintosh HD/Applications/MAMP/htdocs/study/missing-man-PHP-mysql/uploads/profile_pics/1447293113-ceikpu678 copy.jpg'),
(13, 'artre', 'access', 'Dima', 'Manbeach', 'dimamanbeach@yahoo.com', '', '@dimamanbeach', 'cycling', 'We met in mafia. Dima is a good guy', NULL),
(15, 'artre', 'access', 'Enrike', 'Eglesias', 'eglesias@dumb.com', '', '@eglesias', 'singing', 'I like singing', NULL),
(17, '', '', 'Aa', 'aa', 'aa', 'http://www.facebook.com/aa', 'http://www.twitter.c', 'aa', 'aaa', '/Volumes/Macintosh HD/Applications/MAMP/htdocs/study/missing-man-PHP-mysql/uploads/profile_pics/1448504340-12196260_10154273130020898_3487794500218592810_n.jpg'),
(18, 'tetianka', 'tetianka888', 'Tanya', 'Garnicka', 'aaa', '', 'Tanya', 'Tanya', 'I''m tiosh4a :)', '/Volumes/Macintosh HD/Applications/MAMP/htdocs/study/missing-man-PHP-mysql/uploads/profile_pics/1448648222-github_logo.png'),
(19, 'dag', 'access123', 'Dgs', 'sdhbsdh', 'faerg', '', 'rtwhwt', 'wh', 'htwsheh', '/Volumes/Macintosh HD/Applications/MAMP/htdocs/study/missing-man-PHP-mysql/uploads/profile_pics/1448650994-github_logo.png'),
(20, 'vkovalyk', '$1$cJmgR4J0$SbeD', 'Vira', 'Kovalyk', 'vkovalyk', '', 'vkovalyk', 'vkovalyk', 'vkovalyk', '/Volumes/Macintosh HD/Applications/MAMP/htdocs/study/missing-man-PHP-mysql/uploads/profile_pics/1448652853-karma.png'),
(21, 'akovalyk', '$1$KqLVU/b/$a4qgnN7pxSZovF8Jvd6kU1', 'Alexander', 'Kovalyk', 'akovalyk', '', 'akovalyk', 'akovalyk', 'akovalyk', '/Volumes/Macintosh HD/Applications/MAMP/htdocs/study/missing-man-PHP-mysql/uploads/profile_pics/1448653484-typekit-twitter-green.png'),
(22, 'dimon', 'diGlWqbi9hmXk', 'Dima', 'Maschenko', 'faerg', '', 'rtwhwt', 'wh', 'htwsheh', '/Volumes/Macintosh HD/Applications/MAMP/htdocs/study/missing-man-PHP-mysql/uploads/profile_pics/1448754676-github_logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;