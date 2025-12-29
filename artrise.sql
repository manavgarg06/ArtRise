-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 05:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artrise`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `content_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `seller` varchar(25) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `art_type` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`content_id`, `seller_id`, `content`, `seller`, `file_type`, `description`, `art_type`, `cost`, `buyer_id`) VALUES
(23, 11, '6452b45a4d4f0.mp4', 'Ritesh', 'video/mp4', 'My holy earth', 'art', 100000, 11);

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

CREATE TABLE `chatroom` (
  `room_id` int(11) NOT NULL,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `last_msg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatroom`
--

INSERT INTO `chatroom` (`room_id`, `user1`, `user2`, `last_msg`) VALUES
(1, 8, 9, 'Say Hello'),
(2, 8, 10, 'Say Hello'),
(3, 9, 10, 'Say Hello'),
(4, 8, 11, '180'),
(5, 9, 11, 'hi'),
(6, 10, 11, 'Yo'),
(7, 8, 8, 'Say Hello'),
(8, 9, 9, 'Say Hello'),
(9, 10, 10, 'Say Hello'),
(10, 11, 11, 'hi'),
(17, 8, 28, 'Say Hello'),
(18, 9, 28, 'Say Hello'),
(19, 10, 28, 'Say Hello'),
(20, 11, 28, 'Say Hello'),
(21, 28, 28, 'Say Hello'),
(22, 8, 29, 'Say Hello'),
(23, 9, 29, 'Say Hello'),
(24, 10, 29, 'Say Hello'),
(25, 11, 29, 'Say Hello'),
(26, 28, 29, 'Say Hello'),
(27, 29, 29, 'Say Hello'),
(28, 8, 30, 'Say Hello'),
(29, 9, 30, 'Say Hello'),
(30, 10, 30, 'Say Hello'),
(31, 11, 30, 'Say Hello'),
(32, 28, 30, 'Say Hello'),
(33, 29, 30, 'Say Hello'),
(34, 30, 30, 'Say Hello'),
(35, 8, 31, 'hello'),
(36, 9, 31, 'hi'),
(37, 10, 31, 'Hello party'),
(38, 11, 31, 'say hello'),
(39, 31, 31, 'say hello');

-- --------------------------------------------------------

--
-- Table structure for table `critics`
--

CREATE TABLE `critics` (
  `critics_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `profile_pic` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `critic_type` varchar(20) DEFAULT NULL,
  `qualification` varchar(25) NOT NULL,
  `password` varchar(300) NOT NULL,
  `about` varchar(1000) DEFAULT 'User has not added this field'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `critics`
--

INSERT INTO `critics` (`critics_id`, `name`, `profile_pic`, `email`, `critic_type`, `qualification`, `password`, `about`) VALUES
(4, 'parth', '6459533619894.jpg', 'parth@gmail.com', 'art', 'B-tech', '$2y$10$1/.tbEpFg15LSTXj9Se.xunKixXApHEwZOkeCnU3yy.fnZO5FOLxm', 'i am a disco dancer'),
(5, 'Dhairya', 'noimage.png', 'dhairya@gmail.com', 'art', 'B-Tech', '$2y$10$1/.tbEpFg15LSTXj9Se.xunKixXApHEwZOkeCnU3yy.fnZO5FOLxm', 'User has not added this field'),
(6, 'Jinam Jain', 'noimage.png', 'jinam@gmail.com', 'art', 'B-Tech', '$2y$10$1/.tbEpFg15LSTXj9Se.xunKixXApHEwZOkeCnU3yy.fnZO5FOLxm', 'User has not added this field'),
(7, 'pankti@gmail.com', 'noimage.png', 'pankti@gmail.com', 'writing', 'B-Tech', '$2y$10$1/.tbEpFg15LSTXj9Se.xunKixXApHEwZOkeCnU3yy.fnZO5FOLxm', 'User has not added this field'),
(8, 'Ritesh', 'noimage.png', 'ritesh@gmail.com', 'writing', 'PhD', '$2y$10$1/.tbEpFg15LSTXj9Se.xunKixXApHEwZOkeCnU3yy.fnZO5FOLxm', 'User has not added this field'),
(9, 'Kuber Jain', 'noimage.png', 'kuber@gmail.com', 'writing', 'God Level Developer', '$2y$10$1/.tbEpFg15LSTXj9Se.xunKixXApHEwZOkeCnU3yy.fnZO5FOLxm', 'User has not added this field'),
(10, 'Sonu Kumar', 'noimage.png', 'iit2021135@iiita.ac.in', 'visarts', 'B. Tech', '$2y$10$1/.tbEpFg15LSTXj9Se.xunKixXApHEwZOkeCnU3yy.fnZO5FOLxm', 'User has not added this field'),
(11, 'Dhairya Bhadani', 'noimage.png', 'dhairyabh96@gmail.com', 'music', 'B-Tech', '$2y$10$QSD4RQDybtGdUnKx50l2c.OioSfnFtzMXssI0Q8d9FEsKcOyDy6z2', 'User has not added this field'),
(12, 'parthGarg', '645b55faa4337.jpg', 'parthgarg497@gmail.com', 'visarts', 'B-tech', '$2y$10$1/.tbEpFg15LSTXj9Se.xunKixXApHEwZOkeCnU3yy.fnZO5FOLxm', 'User has not added this field'),
(13, 'Tushar Kumar', '645cfe1dbe6fc.jpg', 'tushar@gmail.com', 'music', 'B-Tech', '$2y$10$1/.tbEpFg15LSTXj9Se.xunKixXApHEwZOkeCnU3yy.fnZO5FOLxm', 'User has not added this field');

-- --------------------------------------------------------

--
-- Table structure for table `critics_content`
--

CREATE TABLE `critics_content` (
  `content_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `critics_rated` int(11) NOT NULL DEFAULT 0,
  `file_type` varchar(50) NOT NULL,
  `art_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `critics_content`
--

INSERT INTO `critics_content` (`content_id`, `content`, `user_id`, `name`, `description`, `rating`, `critics_rated`, `file_type`, `art_type`) VALUES
(6, '643f86a56e453.jpg', 8, '', 'drawing girl', 0, 0, 'image/jpeg', 'writing'),
(15, '644f9699895b1.jpeg', 9, '', 'an ER diagram of dbms project.', 4, 1, 'image/jpeg', 'art'),
(16, '644f96cf48b5c.jpeg', 10, '', 'Airline management system er diagram', 0, 0, 'image/jpeg', 'art'),
(17, '644fa5b89f0b5.jpg', 9, '', 'Sample artwork for test', 12, 3, 'image/jpeg', 'art'),
(18, '644fa5cce1778.jpg', 9, '', 'Sample artwork for test', 11, 3, 'image/jpeg', 'art'),
(19, '64520654b5c1b.jpg', 9, '', 'A test artwork ', 4, 1, 'image/jpeg', 'art'),
(20, '6452b407abf5e.jpg', 9, '', 'Please upvote', 0, 0, 'image/jpeg', 'visarts'),
(21, '6452b41f09cb8.jpg', 9, '', 'Please upvote', 0, 0, 'image/jpeg', 'visarts'),
(22, '6452b43ac2cf0.png', 9, '', 'Come to this show', 0, 0, 'image/png', 'writing'),
(23, '6452b45a4d4f0.mp4', 9, '', 'My holy earth', 0, 0, 'video/mp4', 'art'),
(24, '6452b4763129f.jpg', 9, '', 'Drawing girl pic', 0, 0, 'image/jpeg', 'art'),
(25, '6452b4902888d.jpg', 9, '', 'Event poster', 0, 0, 'image/jpeg', 'visarts'),
(26, '645390008a861.jpg', 11, '', 'Avatar 3', 0, 0, 'image/jpeg', 'visarts'),
(27, '645390871dca0.png', 11, '', 'Power', 0, 0, 'image/png', 'writing'),
(28, '645590c703d6e.jpg', 11, '', 'Rohee pics', 0, 0, 'image/jpeg', 'art'),
(29, '6456a15503e8f.jpg', 11, '', 'Legend warrior', 0, 0, 'image/jpeg', 'music'),
(30, '645badf1dc26f.jpg', 28, '', 'roheee', 0, 0, 'image/jpeg', 'writing'),
(31, '645cfdd39d5cd.mp4', 31, '', 'Holy earth', 0, 0, 'video/mp4', 'music'),
(32, '645cfe8e44274.mp4', 31, '', 'Fifa song by me', 4, 1, 'video/mp4', 'music');

-- --------------------------------------------------------

--
-- Table structure for table `critics_request`
--

CREATE TABLE `critics_request` (
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `critic_type` varchar(20) NOT NULL,
  `qualification` varchar(25) NOT NULL,
  `password` varchar(300) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verified` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `critics_request`
--

INSERT INTO `critics_request` (`name`, `email`, `critic_type`, `qualification`, `password`, `verification_code`, `is_verified`) VALUES
('Gaurav Singh', 'gaurav@gmail.com', 'visarts', 'B-Tech', '$2y$10$1/.tbEpFg15LSTXj9Se.xunKixXApHEwZOkeCnU3yy.fnZO5FOLxm', '', 1),
('Parth Maheshwari', 'maheshwari@gmail.com', 'music', 'B-Tech', '$2y$10$1/.tbEpFg15LSTXj9Se.xunKixXApHEwZOkeCnU3yy.fnZO5FOLxm', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`user_id`, `content_id`) VALUES
(9, 18),
(11, 18),
(11, 17),
(11, 18),
(10, 17),
(28, 18),
(28, 17),
(31, 18);

-- --------------------------------------------------------

--
-- Table structure for table `judges`
--

CREATE TABLE `judges` (
  `critics_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `judges`
--

INSERT INTO `judges` (`critics_id`, `content_id`, `rating`, `review`) VALUES
(4, 15, 0, 'Nice ER diagram'),
(4, 17, 0, 'Nice ER diagram'),
(4, 19, 0, 'Nice'),
(4, 18, 0, 'Cute ullu'),
(5, 17, 0, 'All hail Gandalf the grey'),
(5, 18, 0, 'Send him back to hogwarts'),
(6, 18, 0, 'Where is my letter?'),
(6, 17, 0, 'Nice scene of khazad-dum'),
(13, 32, 0, 'Best stadium experience');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`user_id`, `content_id`) VALUES
(11, 17),
(10, 17),
(28, 18),
(28, 17),
(31, 18),
(31, 17);

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE `market` (
  `content_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `seller` varchar(25) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `art_type` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`content_id`, `seller_id`, `content`, `seller`, `file_type`, `description`, `art_type`, `cost`) VALUES
(27, 11, '645390871dca0.png', 'Ritesh K G', 'image/png', 'Power', 'writing', 50),
(28, 11, '645590c703d6e.jpg', 'Ritesh K G', 'image/jpeg', 'Rohee pics', 'art', 50000),
(29, 11, '6456a15503e8f.jpg', 'Ritesh K G', 'image/jpeg', 'Legend warrior', 'music', 1000),
(30, 28, '645badf1dc26f.jpg', 'Ritesh Kumar', 'image/jpeg', 'roheee', 'writing', 10000),
(31, 31, '645cfdd39d5cd.mp4', 'Gaurav Singh', 'video/mp4', 'Holy earth', 'music', 100),
(32, 31, '645cfe8e44274.mp4', 'Gaurav Singh', 'video/mp4', 'Fifa song by me', 'music', 200);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `room_id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`room_id`, `msg_id`, `msg`, `sender`, `receiver`) VALUES
(10, 1, 'Hi, It is me Ritesh and I am going to implement chat functionality here', 11, 11),
(4, 4, 'Hello Jinmiran', 11, 8),
(4, 5, 'hello', 11, 8),
(4, 6, 'Hi', 11, 8),
(5, 7, 'Messaging to my duplicate', 11, 9),
(6, 8, 'Yo Garg', 11, 10),
(10, 9, 'hello', 11, 11),
(10, 10, 'thats me original ', 11, 11),
(10, 11, 'u', 11, 11),
(10, 12, 'hi', 11, 11),
(4, 13, 'Hello Jinmiran', 11, 8),
(5, 14, 'hello', 11, 9),
(6, 15, 'hello', 11, 10),
(5, 16, 'Chat implemented', 11, 9),
(5, 76, 'hi', 11, 9),
(5, 77, 'hi', 11, 9),
(6, 78, 'Yo', 11, 10),
(4, 79, '180', 11, 8),
(35, 80, 'hello', 31, 8),
(36, 81, 'hi', 31, 9),
(37, 82, 'Hello party', 31, 10);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `msg`) VALUES
(5, 11, 'Your Content with id = 24 has been sold.'),
(6, 11, 'Your Content with id = 23 has been sold.');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `content_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`user_id`, `name`, `content_id`, `comment`) VALUES
(11, 'Ritesh K G', 18, 'nice');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`content_id`, `user_id`) VALUES
(19, 9),
(20, 9),
(21, 9),
(22, 9),
(23, 9),
(24, 9),
(25, 9),
(26, 11),
(27, 11),
(28, 11),
(29, 11),
(30, 28),
(31, 31),
(32, 31);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `profile_pic` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `password` varchar(300) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verified` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `profile_pic`, `email`, `contact`, `age`, `password`, `verification_code`, `is_verified`) VALUES
(8, 'jinam', 'noimage.png', 'jinam@gmail.com', '1234457887', 69, '$2y$10$PRiyTjF3yR9VQawU/nzkn.ShMqqTI2xHPPhAqsbFdyhKNG8iel/ge', '', 1),
(9, 'Pankti', 'noimage.png', 'pankti@gmail.com', '123', 10, '$2y$10$PRiyTjF3yR9VQawU/nzkn.ShMqqTI2xHPPhAqsbFdyhKNG8iel/ge', '', 1),
(10, 'parth', 'noimage.png', 'parth@gmail.com', '123445321', 19, '$2y$10$PRiyTjF3yR9VQawU/nzkn.ShMqqTI2xHPPhAqsbFdyhKNG8iel/ge', '', 1),
(11, 'Ritesh K G', '645952b05fbfd.jpg', 'ritesh.kumargupta.7549@gmail.com', '7903653934', 20, '$2y$10$PRiyTjF3yR9VQawU/nzkn.ShMqqTI2xHPPhAqsbFdyhKNG8iel/ge', 'e8b0d244ae3527c19f3e5d6dd48fdf25', 1),
(28, 'Ritesh Kumar', 'noimage.png', 'iit2021135@iiita.ac.in', '7903653934', 21, '$2y$10$Oujg8TcNLHy8T3XjfT1gR.3.3MSQXpkUPsboPwdCf0T/WNUMFqVN2', '35e5a541c519712d26bd53066d56754a', 1),
(29, 'Dhairya Bhadani', 'noimage.png', 'dhairyabh96@gmail.com', '9549953685', 19, '$2y$10$oyq7aQL/z7Ok2VoBIy/7GuIyUbB7U8IU7wWHx/9PZNOHXR9uVfDz6', '91423c596556fdd843c975e9e9722bb2', 1),
(30, 'parthGarg', 'noimage.png', 'iit2021116@iiita.ac.in', '7879231828', 20, '$2y$10$PRiyTjF3yR9VQawU/nzkn.ShMqqTI2xHPPhAqsbFdyhKNG8iel/ge', '4ea665a39e43a21d7657423640952b28', 1),
(31, 'Gaurav Singh', '645cf96563752.jpg', 'gaurav@gmail.com', '6544789546', 20, '$2y$10$PRiyTjF3yR9VQawU/nzkn.ShMqqTI2xHPPhAqsbFdyhKNG8iel/ge', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_content`
--

CREATE TABLE `users_content` (
  `content_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `ratings` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `art_type` varchar(50) NOT NULL,
  `file_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_content`
--

INSERT INTO `users_content` (`content_id`, `creator_id`, `content`, `description`, `ratings`, `likes`, `art_type`, `file_type`) VALUES
(17, 9, '644fa5b89f0b5.jpg', 'Sample artwork for test', 12, 5, 'art', 'image/jpeg'),
(18, 9, '644fa5cce1778.jpg', 'Sample artwork for test', 11, 2, 'art', 'image/jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `critics`
--
ALTER TABLE `critics`
  ADD PRIMARY KEY (`critics_id`);

--
-- Indexes for table `critics_content`
--
ALTER TABLE `critics_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `critics_request`
--
ALTER TABLE `critics_request`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD KEY `fav_user_id` (`user_id`),
  ADD KEY `fav_content_id` (`content_id`);

--
-- Indexes for table `judges`
--
ALTER TABLE `judges`
  ADD KEY `judges_critics_id` (`critics_id`),
  ADD KEY `judges_content_id` (`content_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD KEY `likes_user` (`user_id`),
  ADD KEY `likes_content` (`content_id`);

--
-- Indexes for table `market`
--
ALTER TABLE `market`
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ntf_usr` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `reviews_user_id` (`user_id`),
  ADD KEY `reviews_content_id` (`content_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD KEY `uploads_user_id` (`user_id`),
  ADD KEY `uploads_content_id` (`content_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_content`
--
ALTER TABLE `users_content`
  ADD PRIMARY KEY (`content_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatroom`
--
ALTER TABLE `chatroom`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `critics`
--
ALTER TABLE `critics`
  MODIFY `critics_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `critics_content`
--
ALTER TABLE `critics_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users_content`
--
ALTER TABLE `users_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `buyer_id` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `fav_content_id` FOREIGN KEY (`content_id`) REFERENCES `users_content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fav_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `judges`
--
ALTER TABLE `judges`
  ADD CONSTRAINT `judges_content_id` FOREIGN KEY (`content_id`) REFERENCES `critics_content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `judges_critics_id` FOREIGN KEY (`critics_id`) REFERENCES `critics` (`critics_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_content` FOREIGN KEY (`content_id`) REFERENCES `users_content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `market`
--
ALTER TABLE `market`
  ADD CONSTRAINT `seller_id` FOREIGN KEY (`seller_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `ntf_usr` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_content_id` FOREIGN KEY (`content_id`) REFERENCES `users_content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_content_id` FOREIGN KEY (`content_id`) REFERENCES `critics_content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uploads_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
