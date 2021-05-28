-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 04:14 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `follow`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `description`, `user_id`) VALUES
(18, 'testando funciona', 4),
(21, 'teste', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `gender` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `gender`) VALUES
(1, 'wilson', '123', 'Wilson Neto', 'willnettolobo@gmail.com', 'Male'),
(2, 'lucas', '123', 'Lucas ', 'lucas@gmail.com', 'Male'),
(3, 'ronaldo', '123', 'Ronaldinho', 'R10@gmail.com', 'Male'),
(4, 'teste', 'teste', 'Laercio Marques', 'laercio@gmail.com', 'Male'),
(6, 'laercio', '123', 'Laercio Marques', 'laercio@gmail.com', 'Male'),
(8, 'colmeia', 'coleia', 'teste1', 'teste@gmail.com', 'Male'),
(9, 'lala123', 'lala123', 'Laercio Marques', 'laercio@gmail.com', 'Male'),
(10, 'Gabriel', '123', 'Luigi Gabriel', 'luigiaquino@gmail.com', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `usersocial`
--

CREATE TABLE `usersocial` (
  `id` int(11) NOT NULL,
  `seguidor` int(11) NOT NULL,
  `seguindo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersocial`
--

INSERT INTO `usersocial` (`id`, `seguidor`, `seguindo`) VALUES
(1, 3, 1),
(2, 6, 1),
(3, 6, 2),
(4, 1, 2),
(5, 8, 9),
(6, 9, 8),
(7, 1, 6),
(8, 6, 1),
(9, 6, 9),
(10, 4, 3),
(11, 4, 1),
(12, 10, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersocial`
--
ALTER TABLE `usersocial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seguidor` (`seguidor`),
  ADD KEY `seguindo` (`seguindo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usersocial`
--
ALTER TABLE `usersocial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `usersocial`
--
ALTER TABLE `usersocial`
  ADD CONSTRAINT `usersocial_ibfk_1` FOREIGN KEY (`seguidor`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `usersocial_ibfk_2` FOREIGN KEY (`seguindo`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
