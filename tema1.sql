-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 10:52 PM
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
-- Database: `tema1`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `picture`, `age`, `location`, `email`, `admin`) VALUES
(1, 'dana', '$2y$10$vNAraACrNtix41ra0/jmzOa.cJbTb7MgH0aNZT6/Xp9O2/IpfLlku', 'Dana', 'Georgescu', 'uploads/dana2.jpg', 30, 'Los Angeles', 'dana@xmail.org', 0),
(3, 'pavel', '$2y$10$XBpP4EnYD5w5F/GEiXlTIOXHrIPc9ykCvQQUwMNX0ccMQy0afXwcu', 'Pavel', 'Popescu', 'uploads/pavel1.jpg', 25, 'Paris', 'pavel2001@yahoo.co.uk', 0),
(4, 'adrian', '$2y$10$sHfyzGRkJl6ctpe/hrpKreDrBMOCR2tSpS7Xu7EokqyufTvgBRPIy', 'Adrian', 'Adrian', 'uploads/adrian1.jpg', 10, 'Bucuresti', 'adriatalin@gmail.com', 1),
(5, 'maria', '$2y$10$SIhkYHikcfiEXOrCPUs3dubzuzZTdj1K5nC2tOh0ZPFx2oHTMKRpa', 'Maria', 'Nicolescu', 'uploads/maria1.jpg', 11, 'London', 'maria@postmail.com', 0),
(9, 'ion', '$2y$10$UODR5zjglLiS6zM9wtT0ZeLxDpjSCF2dXjHgWCe7ETJ4Nw2MrJ4g6', 'Ion', 'Ionescu', 'uploads/john1.jpg', 15, 'Bucharest', 'ion.ionescu@xmail.net', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
