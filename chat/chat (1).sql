-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2025 at 02:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` varchar(50) NOT NULL,
  `from_user` varchar(50) NOT NULL,
  `message` mediumtext NOT NULL,
  `date_time` datetime NOT NULL,
  `to_user` varchar(50) NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `from_user`, `message`, `date_time`, `to_user`, `is_read`) VALUES
('00a5f1e76abb9218f65438da7dd17cc6', '1621000', 'sds', '2025-06-12 17:44:27', '2397000', 0),
('0bd70951a9740f61c27848590174a50d', '1621000', 'zxzx', '2025-06-12 17:34:01', '1776000', 0),
('185ba5c1a81c2a3b60b3e1e10b42362e', '1621000', 'sdsd', '2025-06-12 17:44:03', '2397000', 0),
('1f06e4a7e468169d039d54556ae29909', '1621000', 'sdds', '2025-06-12 17:44:05', '2397000', 0),
('24a4aaca25f4be818cbd70cca124f4e4', '1621000', 'assa', '2025-06-12 17:35:18', '1916000', 0),
('295c0d4352fcab7f9fccd2cff3eeaf3d', '2277000', 'wqwqqw', '2025-06-12 18:03:08', '1916000', 0),
('2ab16dc95275f25c94e26d17cf4420e0', '2277000', 'qwqw', '2025-06-12 18:03:11', '1916000', 0),
('32ade57816a01a7d81796490181bff5c', '1916000', 'assa', '2025-06-12 18:06:57', '2277000', 0),
('32edb56eaae564cee5f8b5b978f56055', '2277000', 'a', '2025-06-12 17:57:06', '1916000', 0),
('330abd6dd79c4e4aa18ebf09f690a36f', '2277000', 'asas', '2025-06-12 18:06:45', '1916000', 0),
('36722fca2e92d457263b0e4b42dfc15c', '1916000', 'Mayank', '2025-06-12 17:58:37', '2277000', 0),
('425e28fb381b6c697c98560535aea6dc', '1621000', 'sddssd', '2025-06-12 17:44:02', '2397000', 0),
('4d92b8adcedf00234833eb9b80da0dd1', '1621000', 'sdsd', '2025-06-12 17:44:30', '2397000', 0),
('4f30c503080ccc2f2fcc637cccf1d01a', '1621000', 'assa', '2025-06-12 17:43:34', '2397000', 0),
('55b023350140ddfad8ae69f9bad5b590', '2277000', 'wq', '2025-06-12 18:03:16', '1916000', 0),
('5867c6915bb40278a1b8fece0188f003', '1621000', 'sdds', '2025-06-12 17:44:00', '2397000', 0),
('59d199081c992746dd0361900872bec2', '1916000', 'as', '2025-06-12 18:07:00', '2277000', 0),
('6504a8bce883da1ac3b7e5cd357852fa', '1621000', 'sdds', '2025-06-12 17:37:34', '1916000', 0),
('668c11332a610dd080865c5a080d46f6', '1916000', 'a', '2025-06-12 18:06:39', '2277000', 0),
('67c04dafb6fe6fe398223b365e361720', '2277000', 'anikta', '2025-06-12 17:58:39', '1916000', 0),
('702da73bfeda9f13b2f6ec4abe4761ae', '2277000', 'asassa', '2025-06-12 18:06:44', '1916000', 0),
('703a7d64470103447f87eee2be33c4a5', '1621000', 'asa', '2025-06-12 17:43:28', '2397000', 0),
('8166c004db01fb2eac30369c6999014b', '1621000', 'assa', '2025-06-12 17:43:17', '2397000', 0),
('8582d2f43f446f9c21f03f62d9a3ff6f', '1916000', 'a', '2025-06-12 18:06:38', '2277000', 0),
('8a5788d7df5e6e2033ba007a8029b10e', '1621000', 'as', '2025-06-12 17:33:16', '1776000', 0),
('8c7c6612164b54e2672dbf2e902ae887', '1621000', 'ssddssd', '2025-06-12 17:37:28', '1916000', 0),
('8fbb982d99edb440eaf27d8bc3a59ea6', '2277000', 'qwqw', '2025-06-12 18:03:10', '1916000', 0),
('914376a88a1889203610dc2f0bc63029', '1916000', 's', '2025-06-12 18:06:33', '2277000', 0),
('98d593429d639dd4d4577bf33e2e8e76', '1621000', 'sdds', '2025-06-12 17:37:36', '1916000', 0),
('9949bd1f8aa8cb52cf89a425e6888cfe', '1621000', 'sds', '2025-06-12 17:37:29', '1916000', 0),
('a1265fef63218cacebebeafe69a75585', '1916000', 'a', '2025-06-12 18:06:36', '2277000', 0),
('a293f97bcda038415d28f6ca603f09ff', '1621000', 'sdsd', '2025-06-12 17:44:06', '2397000', 0),
('a6ff5995c4224e708c5a2fb4f9dd0dd2', '1621000', 'dsds', '2025-06-12 17:37:32', '1916000', 0),
('a8242da5436a721633c778d73e7f3196', '1916000', 'as', '2025-06-12 18:06:58', '2277000', 0),
('aa0791fde6b8e3d48a2ebcafcd0a7030', '1621000', 'sd', '2025-06-12 17:37:30', '1916000', 0),
('ae6449f8468114b47cfe22d41c35ce37', '1916000', 'as', '2025-06-12 18:07:01', '2277000', 0),
('af0970bb8714d9940b32149c6bf4607b', '1621000', 'sdds', '2025-06-12 17:44:25', '2397000', 0),
('b8a48dc573528df85a812327426c9fd9', '1916000', 'Hello', '2025-06-12 17:53:09', '2277000', 0),
('bdc23fb3064a79f1c626c65a805b2ee1', '2277000', 'www', '2025-06-12 18:02:57', '1916000', 0),
('be250e7403a5e48a51c83e5fba55e079', '1621000', 'asas', '2025-06-12 17:43:30', '2397000', 0),
('bed66549a275723b96ff0ebd39f4df78', '1621000', 'xxere', '2025-06-12 17:43:57', '2397000', 0),
('bf56b68bd099b7ea2bdd6a5ff773232b', '1621000', 'asasa', '2025-06-12 17:38:49', '2277000', 0),
('c2482a2aa489b3156584669bff37a414', '2277000', 'sdds', '2025-06-12 18:01:39', '1916000', 0),
('c81671ea5674dd32bb5bc5f8b51a522c', '2277000', 'hello', '2025-06-12 17:56:35', '1916000', 0),
('ccdd66149cbc2b3ff491b9abfd384573', '2277000', 'ass', '2025-06-12 18:06:47', '1916000', 0),
('dceb6761a2e0f2579f3061ff7d95eb13', '1621000', 'asas', '2025-06-12 17:43:32', '2397000', 0),
('e49a20b54006061828a9652c4a619a2c', '1916000', 'Hi', '2025-06-12 18:01:54', '2277000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '0',
  `account_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `status`, `account_date`) VALUES
('1059000', 'Harsh', '03cf3b091c7b1c4cb8c517e6ba781dda', '1', '2025-06-12 14:05:08'),
('1621000', 'USER1', '23225c47ba5ee4b7a48f10245a5c3fd1', '1', '2025-06-12 12:12:40'),
('1776000', 'Acy', '0cc175b9c0f1b6a831c399e269772661', '0', '2025-06-12 12:25:30'),
('1916000', 'MAYANK', '8b2bc3be03a9b85edd2105d210ea40bb', '1', '2025-06-12 12:13:20'),
('2277000', 'ANKITA', '78269f66d168e022cb1f9e14c6339a29', '1', '2025-06-12 12:13:50'),
('2397000', 'SAKETH', 'bc19ad455140d19c95b46ad4316627c9', '0', '2025-06-12 12:13:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
