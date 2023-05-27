-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 05:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `np`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `text` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user`, `title`, `text`, `date`) VALUES
(9, 'test', 'lS2CxVx5dqBdNkX2EGUImg9azE/1WSIrXCqLL6gQXbiRxOxNn4EXEZsrDQwTj7t6pw6lIOnD2oV4bO9vAxnKAhymByqo548YlEhKhgMz9uk=', 'q0rqmuTkp2HLNuZxGS1w1sUa/kqqxZ0e2G6GFNeACYCbs1kh8q3gK89pi38NJ3VpFj9AOrL+VvnQOqvGxieATC4kADlwZrTHS/zLTZuiSeHoGysHh4FEv4wYu7Wj8YrcmiiH8P/RLeqN/+GdHj9WE8GGttmbuFevzSARPOuoeGKVq9e4hzJMRc0xaPiDYFzXqrgEgMsrjeJP/DEmnyLgBbvN7ABqYtDgxTCcnWhRoH+gvHP9MN3V4nfgI3Pmk8wG5i03vfHNtt6h39Cc4FynNK4JW47k+HQkjo9f3ifxdmvjmHlb34/RNILbPt3DL43QooM5d9wvfCSfs2MnpNHdX/q5GHENoF9dHMatR18E78PVd+JCo6hSKLco1yfYZXuo', '2023-03-09 15:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Niagahoster Tutorial', 'nhtutorial@gmail.com', '0139a3c5cf42394be982e766c93f5ed0'),
(2, 'test', 'test@localhost', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
