-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 06:06 PM
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
-- Database: `cweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `phno`, `password`, `img`) VALUES
(3, 'sunil', 'sunilad@gmail.com', '777', '$2y$10$4y4QOonPx.89oQtUOLnz3ut6dkFL9cQQ1r0TdCmiVFHGticOZ4Fby', 'pexels-rahul-695644.jpg'),
(4, 'sunil231', 'abbc@gmail.com', '7878', '$2y$10$FLyeTDcJLZhSK.GSOnNMJOs308w44S3xTgT/1TmYwfoA5dXBhv8Ka', ''),
(5, 'sunil231', 'abbc@gmail.com', '7878', '$2y$10$0.kEh.Uc9i1v/WFdSpXZwOcB1/gkuU6PaVupIEZHylOr1mdlBW8bq', ''),
(6, 'ss', 'sunil11@gmail.com', '9889', '$2y$10$3w/kcD0SRSbVVf9o.ltsWeuiJttNUaxnUo/iyu0aAEZ4MlMHkVDyW', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_no` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(5, 'Programming'),
(6, 'Frontend'),
(7, 'Backend');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_desc` varchar(255) NOT NULL,
  `c_price` varchar(255) NOT NULL,
  `c_image` varchar(255) NOT NULL,
  `c_date` date NOT NULL,
  `c_cat` int(11) NOT NULL,
  `c_instructor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`, `c_desc`, `c_price`, `c_image`, `c_date`, `c_cat`, `c_instructor`) VALUES
(2, 'JavaScript Beginners Course', 'Modern JavaScript form the beginning of the way-up to js Expert level the must have JavaScript                         resource in 2021', '400', 'thumb-3.png', '2023-09-10', 5, 'Ema '),
(3, 'HTML & CSS Begginer Course', 'HTML and CSS for Beginners course will give your all the knowledge you need to master HTML and CSS easily and quickly.', '350', 'c2.jpg', '2023-08-19', 6, 'jason'),
(5, 'Python Beginners Course', 'learn A-Z everything about Python, from the basics, to advanced topics like Python GUI, Python Data Analysis, and more!', '400', 'python.png', '2023-08-19', 5, 'Maalik'),
(8, 'PHP for Beginners', 'Learn how to create a dynamic website using the most popular website programming language', '250', 'thumb-7.png', '2023-08-19', 7, 'Chris'),
(9, 'Node.js Developer Course', 'Learn Node.js by building real-world applications with Node JS, Express, MongoDB, Jest, and more!', '600', 'nodejs.jpg', '2023-08-19', 7, 'Lia'),
(10, 'C++ Programming', 'Learn C++ from the basics to the advanced concepts.', '450', 'cpp.png', '2023-08-19', 5, 'Josua'),
(16, 'Bootstrap 5 Course ', 'Learn to customize and build modern websites from scratch using Bootstrap 5', '350', 'thumb-4.png', '2023-09-12', 6, 'Brad Traversy'),
(17, 'Learn JAVA Programming', 'Deep Dive in Core Java programming -Standard Edition. A Practical approach to learn Java. Become a Java Expert', '499', 'java.jpg', '2023-09-12', 5, 'Mark E.'),
(18, 'Ultimate Rust Crash Course', 'Rust Programming Course: From Beginner to Expert', '530', 'rust.jpg', '2023-09-12', 5, 'Tarek D.'),
(19, 'Vue JS Essentials', 'Learn Vue JS 3 & Firebase by creating & deploying dynamic web apps (including Authentication)', '449', 'c7.jpeg', '2023-09-12', 6, 'Jean-Jacques'),
(21, 'Learn Angular From Scratch', 'Master Angular Frontend Framework and Learn to build a Complete Modern World App From Scratch using Bootstrap, Firestore', '480', 'c6.jpg', '2023-09-12', 6, 'Bernault'),
(22, 'Learn to Code with Ruby', 'A comprehensive introduction to coding with the Ruby programming language. Complete beginners welcome!', '399', 'ruby.jpg', '2023-09-12', 5, 'Boris j.'),
(25, ' CSS', 'Learn CSS for the first time or brush up your CSS skills and dive in even deeper. EVERY web developer has to know CSS.', '300', 'thumb-2.png', '2023-09-12', 6, 'Lorenz');

-- --------------------------------------------------------

--
-- Table structure for table `course_bought`
--

CREATE TABLE `course_bought` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_bought`
--

INSERT INTO `course_bought` (`id`, `c_id`, `user_id`) VALUES
(1, 16, 3),
(2, 9, 3),
(3, 18, 5),
(4, 17, 7),
(5, 22, 7),
(6, 25, 7),
(7, 5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `course_count` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `p_status` varchar(255) NOT NULL,
  `p_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `amount`, `course_count`, `payment_id`, `p_status`, `p_time`) VALUES
(1, 14, 350, 2, '', 'Pending', '2023-09-11 18:31:07.000000'),
(2, 14, 350, 2, 'pay_Mb81OfVJfxuprC', 'Complete', '2023-09-11 18:32:28.000000'),
(13, 14, 350, 1, '', 'Pending', '2023-09-11 18:49:49.000000'),
(14, 16, 450, 1, '', 'Pending', '2023-09-12 11:21:59.000000'),
(15, 16, 450, 1, 'pay_MbPEIgF1b12phz', 'Complete', '2023-09-12 11:22:30.000000'),
(16, 16, 400, 1, '', 'Pending', '2023-09-12 11:23:44.000000'),
(17, 16, 400, 1, 'pay_MbPFyq3x6LXFFI', 'Complete', '2023-09-12 11:24:05.000000'),
(32, 17, 3527, 8, 'pay_MbkyHvFliksuVI', 'Complete', '2023-09-12 18:06:34.000000'),
(67, 18, 1098, 3, '', 'Pending', '2023-09-12 20:01:55.000000'),
(68, 18, 1098, 3, '', 'Pending', '2023-09-12 20:01:58.000000'),
(77, 18, 848, 2, 'pay_MbmzOdnnWi3pwm', 'Complete', '2023-09-12 20:04:55.000000'),
(78, 18, 848, 2, 'pay_Mbn0XyBoSEG2ha', 'Complete', '2023-09-12 20:06:04.000000'),
(79, 18, 848, 2, 'pay_Mbn1cC8y2bSa2x', 'Complete', '2023-09-12 20:07:01.000000'),
(80, 18, 848, 2, 'pay_Mbn2xFhhXu5BtL', 'Complete', '2023-09-12 20:08:19.000000'),
(81, 18, 848, 2, 'pay_Mbn48OIJMP2Q89', 'Complete', '2023-09-12 20:09:26.000000'),
(82, 18, 848, 2, 'pay_Mbn4f1luBsO9H3', 'Complete', '2023-09-12 20:09:57.000000'),
(83, 18, 848, 2, 'pay_Mbn6PFs41mkr2J', 'Complete', '2023-09-12 20:11:52.000000'),
(84, 18, 848, 2, 'pay_Mbn7YcfkeuZxUc', 'Complete', '2023-09-12 20:12:40.000000'),
(85, 18, 880, 2, '', 'Pending', '2023-09-12 20:13:51.000000'),
(86, 18, 880, 2, 'pay_Mbn99mmEdL47Tn', 'Complete', '2023-09-12 20:14:09.000000'),
(101, 21, 399, 1, 'pay_McHzPqzLvD5W71', 'Complete', '2023-09-14 16:56:34.000000'),
(102, 25, 1280, 3, '', 'Pending', '2023-09-15 13:59:41.000000'),
(103, 25, 1280, 3, 'pay_McdWokKIXLGxhn', 'Complete', '2023-09-15 14:00:45.000000'),
(104, 3, 950, 2, '', 'Pending', '2023-11-11 11:11:11.000000'),
(105, 3, 950, 2, 'pay_Mz97G2Ie1VqQxN', 'Complete', '2023-11-11 11:12:46.000000'),
(106, 5, 530, 1, '', 'Pending', '2023-11-24 15:12:20.000000'),
(107, 5, 530, 1, 'pay_N4M9KKqXzoczUg', 'Complete', '2023-11-24 15:12:43.000000'),
(108, 7, 499, 1, '', 'Pending', '2023-11-24 16:18:48.000000'),
(109, 7, 499, 1, 'pay_N4NJdt6ScSCd7v', 'Complete', '2023-11-24 16:21:11.000000'),
(110, 7, 699, 2, '', 'Pending', '2023-11-24 16:21:47.000000'),
(111, 7, 699, 2, 'pay_N4NL7U5zDw85Pk', 'Complete', '2023-11-24 16:22:41.000000'),
(112, 9, 400, 1, '', 'Pending', '2023-11-24 16:38:57.000000'),
(113, 9, 400, 1, 'pay_N4Nd9aYYkavtin', 'Complete', '2023-11-24 16:39:41.000000');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(10) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phno` varchar(13) NOT NULL,
  `password` varchar(255) NOT NULL,
  `course_bought` int(11) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `fullname`, `addr`, `email`, `phno`, `password`, `course_bought`, `user_image`) VALUES
(3, 'sunil', '', 's@gmail.com', '77', '$2y$10$mlAkiUrGHoh3UEYyAPBUnesNSb6B1qDsuqZyM664TAwlAkGh.Zh/a', 2, ''),
(4, 'sunil', '', 'abc@gmail.com', '9890137658', '$2y$10$9GSEzV1FhK13BuKSRPWQEOsy2cQyBy2m/C/4RWmNF7mSX7qtiK7fi', 0, ''),
(5, 'sunil', '', 'abcd@gmail.com', '9890137658', '$2y$10$X1CNMDF8ZEC./SOtCXqbXOP0OTRvzahaEn.uAcUEXodmujnEssGDO', 1, ''),
(6, 's', '', 'ghg@gmail.com', '788', '$2y$10$1z0GKe/LF2BBYusbGIrLL.u2qunc0hBDRdixsR/23bXdeP5OU5q/.', 0, ''),
(7, 'sunil', '', 'aaaa@gmail.com', '44', '$2y$10$2Ur3AIdJiFaKwIs7mIAPJe8XyW6eg9QNb0RdyR0PCAGu3CszpuBlO', 3, ''),
(8, 'sunil', '', 'abca@gmail.com', '91', '$2y$10$dOv7ZsByFRAwuO/djqfD7ueh4/NAlgLBUdXCPtbi8Eh.u.Q5JSFmK', 0, ''),
(9, 'Sunil', '', 'aabb@gmail.com', '91', '$2y$10$nxtg/lOwMHuFy4au/xhG1ukaaUWw4SWIyksOc68.wRpkPCwvOTOCm', 1, ''),
(10, 'sunil', '', 'sunil1234@gmail.com', '91', '$2y$10$NVqAJwR9GjY9cKbyIFC2/O48cf71z4KPATg03qo4Hb8ZFoiivEbGe', 0, 'pic-4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_no`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `course_bought`
--
ALTER TABLE `course_bought`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `course_bought`
--
ALTER TABLE `course_bought`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
