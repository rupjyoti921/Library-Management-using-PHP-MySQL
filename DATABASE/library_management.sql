-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 05:14 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `pass`) VALUES
(1, 'rup', '123');

-- --------------------------------------------------------

--
-- Table structure for table `book_entry`
--

CREATE TABLE `book_entry` (
  `book_id` varchar(15) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `department` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_entry`
--

INSERT INTO `book_entry` (`book_id`, `book_name`, `author_name`, `price`, `department`, `semester`, `subject`, `entry_date`) VALUES
('AB1', 'PHYSICS-I', 'RABITA SING', '300', 'sc', '1st', 'physics1t', '2019-12-10'),
('AB2', 'CRYPTOGRAPHY', 'RATAN CHUDHURY', '300', 'cse', '6th', 'cnst', '2020-01-02'),
('AB3', 'CRYPTOGRAPHY', 'RATAN CHUDHURY', '300', 'cse', '6th', 'cnst', '2020-03-19'),
('AB4', 'CRYPTOGRAPHY', 'RATAN CHUDHURY', '300', 'cse', '6th', 'cnst', '2020-04-08'),
('AB5', 'MOBILE COMPUTING', 'TANASHI DAS', '400', 'cse', '6th', 'mct', '2020-01-08'),
('AB7', 'SOFTWARE ENG', 'ANKIT RAJ', '400', 'cse', '6th', 'se', '2020-03-05'),
('AB8', 'ARITIFICIAL INTELLIGENCE', 'KABUR DAS', '500', 'cse', '6th', 'ai', '2020-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `book_id` varchar(15) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `stu_name` varchar(35) NOT NULL,
  `roll_no` varchar(30) NOT NULL,
  `department` text NOT NULL,
  `semester` varchar(10) NOT NULL,
  `issue_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `library_book`
--

CREATE TABLE `library_book` (
  `book_id` varchar(15) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `department` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `subject` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library_book`
--

INSERT INTO `library_book` (`book_id`, `book_name`, `author_name`, `price`, `department`, `semester`, `subject`) VALUES
('AB1', 'ARTIFICIAL INTELLIGENCE', 'KABUR DAS', '500', 'cse', '6th', 'ai'),
('AB2', 'CRYPTOGRAPHY', 'RATAN CHUDHURY', '300', 'cse', '6th', 'cnst'),
('AB3', 'CRYPTOGRAPHY', 'RATAN CHUDHURY', '300', 'cse', '6th', 'cnst'),
('AB4', 'CRYPTOGRAPHY', 'RATAN CHUDHURY', '300', 'cse', '6th', 'cnst'),
('AB5', 'MOBILE COMPUTING', 'TANASHI DAS', '400', 'cse', '6th', 'mct'),
('AB7', 'SOFTWARE ENG', 'ANKIT RAJ', '400', 'cse', '6th', 'se'),
('AB8', 'ARITIFICIAL INTELLIGENCE', 'KABUR DAS', '500', 'cse', '6th', 'ai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_entry`
--
ALTER TABLE `book_entry`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `library_book`
--
ALTER TABLE `library_book`
  ADD PRIMARY KEY (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
