-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2021 at 06:18 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE `book_details` (
  `book_id` varchar(20) NOT NULL,
  `book_name` varchar(20) NOT NULL,
  `book_author` varchar(20) NOT NULL,
  `book_edition` varchar(20) NOT NULL,
  `book_publisher` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`book_id`, `book_name`, `book_author`, `book_edition`, `book_publisher`) VALUES
('1', '0', '0', '1', '0'),
('1', 'Chirakodinja kinavuk', 'jobin', '1', 'anganennum illa');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`name`, `email`, `mobile`, `user`) VALUES
('hacker', 'hacker@gmail.com', '1234567890', 'hacker');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_passid` varchar(20) NOT NULL,
  `user_athorization` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `user_password`, `user_passid`, `user_athorization`) VALUES
('admin', 'admin', 'admin', '0110'),
('hacker', 'hacker', 'hacker', '1001'),
('jobin', 'jobin', 'jobin', '1001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
