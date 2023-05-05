-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql306.byetcluster.com
-- Generation Time: May 05, 2023 at 12:10 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_33317858_np`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user`, `title`, `text`, `date`) VALUES
(10, '', 'SvzTstSpEVn0wxZObf0QhvQQGpfln5pmSNtn0Mqvxvx2K3G3HCxhT+L0FZ0oll7JDB7aPfjKgDGEAwMcwGyZqA==', 'gaTVS+A2Y8qs1LjmsW9zBpQZ6IyVml6stQOLbfGFGX6gggLAk8Ug0jkrYAGpaCRVGVcjSXNqCeiEg6iZhefU9w==', '2023-03-11 15:27:49'),
(12, 'Umarkov', 'AFve02GIBFRPrW+ADdRG7Uh8U5ULZJw3hH58k3GwLweBhYCJtmkBSv2MwGEmVIZKn+GzaAUtXxmUg6xH9+x4Tg==', 'gMv2s7vMopTCWK3waOu1ZPYvnq9T6gHtKsQSXgLCbDu0ctZnCYGpogr243GbPogYB9EbiXhFWixDxd1EB0VIEw==', '2023-03-13 07:39:08'),
(13, 'test', '9Ngiu6Jyaq1tIGIsfOVdHCv13jE74eNjQqef7SBoV4OaBrwTrJefk2SLc/n/yheQ7WRjFdP0/l4Bvl19EYUSy46LNf+eNz1ed/CI+W6icmM=', 'b74Nn5SzUEs+BgAB9a1tqTLCnhSIYOE9rd7yh3X21aU4IfFRYRbak3r/9j55zYOw8W8qmlIFJEKQhRSRSlaooZGjXRf4zSQqzRBWjNK72ETZcpqMM2egehWpIngomlZg2MklgJb0i39Sx4GsFmeSDLOzey5UnT57AR0m8w4xT2ZinJRatOwtKcAQGuTmJ0JniKwnXcERGUvXQTs2jd+0dFQiVJ0Wkpio6bytTSXtUHG9K1jhJLZV8ih9hUyMAsCgNgib3mcutS9O9Gf62/7mSGKJb+haK4fWoFlabgqmAZMcs7YdF7WvW3urAlXV/6SlST12OeQd4/7mDtqzleSVMNXSbu0AeagyptE0IoKaSeqISVN4JbdgLmfdSyaZfqMyaHsTLOMBovTtlhp7ZABXBAZ/IaED7mWeFAJYU59ooLLLBTTgYK3Acxh0EnoOL6a/c9ATyGoWiPc8EYJXECOBkky2ym7IcNjlPs4swOGeNSJBp+ucpGojwjx+TixjeSPn0kbMjiK4FvGxxnOUCPHGsDB9CNwrhySMnnLGoNAtteAYtSAig9M8CfMD4RVahx6i0uRy3DJs4fMHUKc17GQS1jiIfXsoLOs4IGUQ/ocqeFk=', '2023-03-13 08:11:50'),
(14, 'test', 'rIJsB7uTe1QLNhjTTnNpyO8ahJtPppxJduS8kL03+AaquFZrA/+AyBUI9okg/Vyojy6tpiIh4vSotfpGeptlBA==', '+XUHfBHdNLXv4vr+7EAZ9Hz9x6eBoTEf0sPbfMIJ0VYfrOBmj77nJL9Selhyh4Biz9bLxNEuDbWL1YDyw0HabUSeuoRfhSxGLISq5tTl6Yh+6ldbd5RJoyiO69ezDIKN', '2023-03-13 08:12:08');

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
(2, 'test', 'test@localhost', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Umarkov', '2bkn8b9y6@mozmail.com', 'f872924a63d3cad3aef9fba24483fad6'),
(4, 'Lorem Ipsum', 'loremipsum@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
