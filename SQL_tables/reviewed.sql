-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 03:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reviewed`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `permission` int(11) NOT NULL,
  `become_reviewer` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `permission`, `become_reviewer`) VALUES
(1, 'test', '$2y$10$ChQIKddrl92AQkkAMOjPOejz2IZ2Sx6Rs1h3bqXfX.Jhe5qkRsUke', 'test@gmail.com', 1, 0),
(2, 'test2', '$2y$10$xBRsFgvLPWUQIaMMn3vvcemH19dagTlgRgN.3I9iKTBSbvAbUQSS6', 'test2@gmail.com', 0, 0),
(4, 'admin', '$2y$10$bp9pKq0mxN6zmHJoeQ7DIuJOmdghG0uaH1i4kzqeQws6tnM3YwlXi', 'admin@gmail.com', 1, 0),
(5, 'rares', '$2y$10$aO7qLcA3pw642j1ufRztq.GSgSi8DudFLxBo2pHLpTd0BqGT/TpzO', 'raresstefea9@gmail.com', 1, 0),
(6, 'test3', '$2y$10$lFPDX/In4uFUHRDVEheBZOU85SAAArZzFVgTBS5sTnt8QIhqIEKe.', 'test3@gmail.com', 0, 0),
(7, 'test4', '$2y$10$DfCnAhcyXMLCrSY9aDtDhef9cvfRx1Jd9I5XFgZPU9tf8WGXD8Q7C', 'test4@gmail.com', 0, 0),
(8, 'test5', '$2y$10$yhLgb.9OKm0.qD7QEwErZOSIeJlGuX.yN6j3wylbFrqVnj3VjZaya', 'test5@gmail.com', 0, 0),
(9, 'test10', '$2y$10$.kMS/9xyhMJ4FKOfL6vNXetiKo4nO.JLClymI0wx6Hlms5Mv6Oklq', 'test10@gmail.com', 0, 0),
(10, 't', '$2y$10$s9mVFNht5akj67mBY6tehurbfltmTVahS1i237qhCrkibtl/MLQUq', '1@gmail.com', 1, 0),
(11, 'prezentare', '$2y$10$RRmOOcHj0371s6GVNmeU3uVU9C05ymczyF11F08qA7KMsZEE/sIz6', 'raresstefea@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `wrong_answer1` varchar(255) NOT NULL,
  `wrong_answer2` varchar(255) NOT NULL,
  `wrong_answer3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `Question`, `correct_answer`, `wrong_answer1`, `wrong_answer2`, `wrong_answer3`) VALUES
(1, 'When was Abbey Road released?', 'September 26, 1969', 'November 17, 1985', 'July 5, 1990', 'July 5, 1991');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `permission` int(5) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `reviewer_name` varchar(255) NOT NULL,
  `reviewed_song_title` varchar(250) NOT NULL,
  `grade` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `reviewer_name`, `reviewed_song_title`, `grade`) VALUES
(4, 't', 'Come Together', 3),
(5, 't', 'Riders on the Storm', 3),
(6, 'test', 'Riders on the Storm', 1),
(7, 'prezentare', 'You Really Got Me', 5);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `song_name` varchar(250) NOT NULL,
  `author` varchar(250) NOT NULL,
  `album` varchar(250) NOT NULL,
  `summary` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `release` date NOT NULL,
  `song_cover` varchar(250) NOT NULL,
  `song_link` varchar(250) NOT NULL,
  `username` varchar(50) NOT NULL,
  `rating` float NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `song_name`, `author`, `album`, `summary`, `description`, `release`, `song_cover`, `song_link`, `username`, `rating`) VALUES
(14, 'Come Together', 'The Beatles', 'Abbey Road', 'It is a song by the English rock band the Beatles, written by John Lennon and credited to Lennon–McCartney.', 'In early 1969, John Lennon and his wife, Yoko Ono, held nonviolent protests against the Vietnam War, dubbed the Bed-ins for Peace. In May, during the Montreal portion of the bed-in, counterculture figures from across North America visited Lennon, inc', '1969-11-29', '../uploads/Come_Together-Something.jpg', 'https://www.youtube.com/watch?v=45cYwDMibGo&ab_channel=TheBeatlesVEVO', 'admin', 3),
(15, 'Riders on the Storm', 'The Doors', 'L.A. Woman', '\"Riders on the Storm\" is a song by American rock band the Doors, released in June 1971 by Elektra Records as the second single from the band\'s sixth studio album, L.A. Woman.', 'It is popularly believed that \"Riders on the Storm\" is the song that longtime Doors producer Paul A. Rothchild disparaged as \"cocktail music\", precipitating his departure from the L.A. Woman sessions, which was corroborated by guitarist Robby Kri', '1970-10-05', '../uploads/The_Doors_-_L.A._Woman.jpg', 'https://www.youtube.com/watch?v=iv8GW1GaoIc&ab_channel=215Days', 'rares', 2),
(16, 'You Really Got Me', 'The Kinks', 'The Kinks', 'The Kinks\' \"You Really Got Me\" is known as a classic rock song, but it didn\'t start off that way.', '“You Really Got Me” was written by Kinks singer and guitarist, Ray Davies, who was also the group’s chief songwriter. Two versions were recorded, the final being the one fans know and love today, a result of the band following their intuition.', '1967-08-12', '../uploads/The_Kinks_You_Really_Got_Me_LP.jpg', 'https://www.youtube.com/watch?v=fTTsY-oz6Go&ab_channel=TheKinks', 'adelin02', 5),
(17, 'War Is My Shepherd', 'Exodus', 'Tempo of The Damned', 'This album is an undoubted classic, but I still personally prefer Blood In Blood Out. The bridge riff of the title track is an ungodly juggernaut!', ' Here you can write your detailed song description.', '2004-10-08', '../uploads/ab67616d0000b273378c4ee63d4511e43d0398b8.jpeg', 'https://www.youtube.com/watch?v=0hI9b4f9cJA&ab_channel=Exodus', 'rares', 5),
(20, 'Battery', 'John Newman', 'Master of Puppets', ' Here you can write your short song description.', ' Here you can write your detailed song description.', '2023-12-22', '../uploads/rolling_stones.jpeg', 'Link', 'ionelpopescu01', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_username` (`username`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviewer_name` (`reviewer_name`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `song_name` (`song_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`reviewer_name`) REFERENCES `accounts` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
