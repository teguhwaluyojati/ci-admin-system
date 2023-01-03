-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2023 at 10:47 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket-ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(19, 'Yulian Ahmad', 'profbrigjenteguh@yahoo.com', 'default.png', '$2y$10$utKYpKxrffWvJXEBBELggOEJRywaMDIiB4yqng2VzvrQOU5w9nzjK', 2, 1, 1672039662),
(30, 'Andri Jayus', 'andrijayus@email.com', 'teguhwaluyojati1.jpg', '$2y$10$KroB2UfLSELomCb/PSzZVudOEWbIvSLJ23jArPvZBnerpguAuFH5a', 2, 1, 1672103991),
(31, 'Giordina Aprillia', 'giordina@email.com', 'default.png', '$2y$10$hM5liCwMUzSkURQkAZJyLepGnj7dmOrdDOYFMesTXnZ.be/2vgTOC', 2, 1, 1672104143),
(34, 'Teguh Waluyojati', 'teguhwaluyojati14@gmail.com', 'teguhwaluyojati2.jpg', '$2y$10$sIguppfMHvS/allAyv4OSOya5MoTootx8Ee/MU3IHi2JUHOBwNzwG', 1, 1, 1672117271),
(52, 'Admin', 'admin@ticket.com', 'android-chrome-512x512.png', '$2y$10$J0dCF69EtGvtRomhlYOJOOpyk0pwqGmnrxGRVzqdxcMiSAqyp7tTS', 1, 1, 1672039135),
(53, 'Ahmad IDE', 'idesolusiintegrasi@email.com', 'default.png', '$2y$10$cuI42B9N./C/oLrJoNccyuozXfrLHxvsNty3vhwn7bbQfD5NgXr/W', 2, 0, 1672644136);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 1, 7),
(6, 2, 7),
(7, 3, 2),
(8, 3, 7),
(9, 1, 9),
(10, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(9, 'Moderator');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-pen', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 4, 'Video', '/galery/video', 'fas fa-fw fa-user', 1),
(11, 7, 'Video & Foto', 'galery/video-foto', 'fas fa-fw fa-user', 1),
(12, 9, 'Testing', 'tes/testing', 'fas fa-fw fa-folder', 1),
(13, 11, 'Foto', 'gallery/foto', 'fas fa-fw fa-camera', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `token` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `token`, `email`, `created_at`) VALUES
(41, 'K9ms3hY7cl1z51cP0sk7Xg4xxEp+0B4ubB2k2AyuheE=', 'oktaviafitri@gmail.com', 1672117182),
(42, 'f1iDuCpjnBAlpA2wHhh+adqBp63ADGz5xTh5Y8HuCD4=', 'testing1@email.com', 1672505810),
(43, 'l9fcw0Mw+PMjUsZWBAnzs8ws8QuA/l1ySCmrwfxWBDA=', 'testing2@email.com', 1672505829),
(44, '62ixUYa4RMW7iwqueOMc9uY9c4uUfWZIN4wBKWATUCs=', 'testing3@email.com', 1672505845),
(45, 'SNsSGWuoOVXR2grqYwkLNOkosdWfnr/PIMWKdLKQ1Gc=', 'testin43@email.com', 1672505859),
(46, 'L+8L29ce3RQiT99fJC5wRW1nlYddqJ3khM9tGVPM2b8=', 'testing21@email.com', 1672552722),
(47, 'xvlVXOmsfJJsUne6qTLvPIOb/f4TxICU/D6Kse++XA8=', 'testin2g21@email.com', 1672552733),
(48, 'iAjewG+tT85mDHagmuAfPFKa8GYDDGJLESGL1GPdclc=', 'test2g21@email.com', 1672552744),
(49, 'mRPftUdzMksH8HVBL3oGn/PRWMKAARJXDOi2l8Y313s=', 'test2g1121@email.com', 1672552753),
(50, 'svIQDdAvssA9HURyOFmaPVrsa5jD3KKYeKIyqEWO/pk=', 'nactive@email.com', 1672599362),
(51, 'h6wE3rKQH83JKoenjnHFlH1J8mEHIjfSoObyB7vc48M=', 'sfdsjj@email.com', 1672630422);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
