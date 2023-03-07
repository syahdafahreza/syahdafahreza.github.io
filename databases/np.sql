-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 10:40 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

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
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user`, `title`, `text`, `date`) VALUES
(1, 'test', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pellentesque eu tincidunt tortor aliquam nulla facilisi cras fermentum odio. Quis risus sed vulputate odio ut enim blandit volutpat maecenas. Purus viverra accumsan in nisl. Commodo quis imperdiet massa tincidunt nunc pulvinar. Faucibus et molestie ac feugiat sed lectus vestibulum mattis ullamcorper. Sit amet nisl purus in mollis nunc. Pharetra magna ac placerat vestibulum lectus mauris ultrices eros. Maecenas volutpat blandit aliquam etiam. Ac auctor augue mauris augue neque gravida in. Mollis nunc sed id semper risus in hendrerit. Commodo quis imperdiet massa tincidunt nunc pulvinar sapien et. Non consectetur a erat nam at lectus urna duis. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet risus. Gravida neque convallis a cras semper. Justo eget magna fermentum iaculis eu non diam. Eget velit aliquet sagittis id consectetur purus. Egestas integer eget aliquet nibh praesent tristique magna.', '2023-03-06 05:31:02'),
(2, 'test', 'Dolor sit amet', 'Nisl vel pretium lectus quam id leo in vitae turpis. Venenatis lectus magna fringilla urna porttitor. Sed blandit libero volutpat sed cras ornare arcu. Lectus magna fringilla urna porttitor rhoncus dolor purus. Blandit aliquam etiam erat velit. Diam quis enim lobortis scelerisque fermentum dui faucibus. Tortor dignissim convallis aenean et. Eu nisl nunc mi ipsum faucibus vitae aliquet nec. Consequat ac felis donec et odio pellentesque diam volutpat. At urna condimentum mattis pellentesque id. Amet consectetur adipiscing elit pellentesque habitant morbi. At imperdiet dui accumsan sit amet nulla facilisi. Eu augue ut lectus arcu bibendum at varius. Magna sit amet purus gravida quis. Interdum posuere lorem ipsum dolor.', '2023-03-07 10:10:24'),
(3, 'test', 'Commodo Odio', 'Commodo odio aenean sed adipiscing diam donec adipiscing. Semper risus in hendrerit gravida rutrum quisque. Commodo quis imperdiet massa tincidunt. Sem et tortor consequat id porta nibh venenatis cras sed. Morbi tincidunt ornare massa eget egestas purus viverra accumsan in. Dolor magna eget est lorem. Nulla aliquet enim tortor at auctor urna nunc. Pretium quam vulputate dignissim suspendisse. Dui accumsan sit amet nulla. Natoque penatibus et magnis dis. Enim nunc faucibus a pellentesque sit amet porttitor eget. Eget nullam non nisi est sit amet facilisis. Nulla at volutpat diam ut venenatis tellus in metus. Mi proin sed libero enim sed faucibus turpis in. Mauris pharetra et ultrices neque. In arcu cursus euismod quis viverra nibh cras. Auctor elit sed vulputate mi sit amet mauris commodo quis.', '2023-03-07 10:12:21'),
(4, 'test', 'Commodo Viverra', 'Commodo viverra maecenas accumsan lacus. Massa enim nec dui nunc mattis enim ut tellus elementum. Ultrices in iaculis nunc sed augue. Pulvinar etiam non quam lacus. At risus viverra adipiscing at in tellus integer. Aliquet risus feugiat in ante metus. Faucibus in ornare quam viverra. Risus pretium quam vulputate dignissim suspendisse. Purus ut faucibus pulvinar elementum integer enim. Sed lectus vestibulum mattis ullamcorper velit. A pellentesque sit amet porttitor eget dolor morbi non arcu. Proin sagittis nisl rhoncus mattis rhoncus urna neque. Neque convallis a cras semper auctor neque. Lacus vel facilisis volutpat est. Ac tincidunt vitae semper quis lectus nulla. Elit at imperdiet dui accumsan sit. Pretium lectus quam id leo. Amet mauris commodo quis imperdiet massa tincidunt.', '2023-03-07 10:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
