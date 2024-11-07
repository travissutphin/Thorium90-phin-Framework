-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2023 at 06:43 PM
-- Server version: 10.3.38-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbnamehere`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `alias` varchar(200) DEFAULT NULL,
  `content_full` text DEFAULT NULL,
  `content_intro` varchar(150) DEFAULT NULL,
  `meta_title` varchar(50) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `image_primary` varchar(255) DEFAULT NULL,
  `video_primary` varchar(255) DEFAULT NULL,
  `search_criteria` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `alias`, `content_full`, `content_intro`, `meta_title`, `meta_description`, `image_primary`, `video_primary`, `search_criteria`, `created_by`, `created_at`, `deleted_at`) VALUES
(1, 'What is Seint?', 'what-is-seint', 'Seint has been referred to as the Home Edit of makeup, which is a great explanation.  Instead of using a makeup bag full of products, Seint condenses your products into one easy palette.  Seint was created with the purpose of enhancing our beauty rather than covering it up. The line includes a range of products designed to help women achieve a natural, flawless look.\r\n\r\n<h2>Color Match</h2>\r\n<p>Color match is a big deal!  We want you to love your new makeup as much as we do.  Getting color matched is quick, easy, and Free!  Simply send me a makeup-free selfie you\'re on your way to an easier makeup routine.</p>\r\n\r\n<p>These look best with the following skin tones\r\n<ul class=\"list-bullets mb-1\">\r\n<li><b>Light skin:</b> Ash, Aspen, Henna, Oliva, Stone, Walnut</li>\r\n<li><b>Medium skin:</b> Astoria, Henna, Indifo, Olive</li>\r\n<li><b>Dark skin:</b> Cola, Indigo</li>\r\n</ul>\r\n</p>\r\n<p>Contours to match.\r\n<ul class=\"list-bullets mb-1\">\r\n<li><b>Nuetral colors:</b> Astoria, Indigo</li>\r\n<li><b>Cool colors:</b> Ash, Aspen, Henna</li>\r\n<li><b>Warm colors:</b> Olive, Stone, Walnut</li>\r\n</ul>\r\n</p>\r\n\r\n<h2>Pallettes</h2>\r\n<p>A typical 4 palette can contain any combination of highlight colors, contours colors, and lip and cheek colors.  Seint also offers eyeshadows, illuminators, bronzers and an entire skincare line</p>\r\n\r\n<h2>Seints Mission</h2>\r\n<p>Beauty connects us.\r\nIt transcends time and knows no boundaries.\r\nSeeking, experiencing, and cultivating beauty in ourselves and the world around us is a sacred work.\r\nAnd that work - our work - is beautiful.\r\nWe see beauty in every face.\r\nOur mission is to preserve and nurture it.\r\nEverything we do and everything we create is based on what we believe in:\r\nThat beauty matters.\r\nThat helping others look beautiful is nice,\r\nBut helping them believe they are beautiful is life changing.\r\nBeauty is not our creation;\r\nBeauty is our passion.</p>\r\n\r\n<p><a href=\"https://cathysutphin.seintofficial.com/en\">Show with me</a></p>', 'Seint is a makeup designed to simplify your beauty routine requiring only one layer of makeup and in one simple compact.', NULL, NULL, 'seint.jpg', NULL, '#seint, #makeup', 1, '2022-05-02 10:14:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `category` varchar(25) NOT NULL,
  `alias` varchar(25) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `featured` int(11) NOT NULL COMMENT '1=yes 0=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category`, `alias`, `photo`, `featured`) VALUES
(1, 'Beauty', 'beauty', 'makeup-001.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

CREATE TABLE `blog_images` (
  `id` int(11) NOT NULL,
  `blog_fk` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `alt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blog_images`
--

INSERT INTO `blog_images` (`id`, `blog_fk`, `image`, `alt`) VALUES
(1, 6, 'sprint_training_2022-01.jpg', 'Ballpark Food at Lecom Park');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` int(11) NOT NULL,
  `tag` varchar(25) DEFAULT NULL,
  `alias` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `tag`, `alias`) VALUES
(1, 'How-To', '-how-to');

-- --------------------------------------------------------

--
-- Table structure for table `blog_views`
--

CREATE TABLE `blog_views` (
  `id` int(11) NOT NULL,
  `blog_fk` int(11) NOT NULL,
  `ip_address` int(10) UNSIGNED NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_x_categories`
--

CREATE TABLE `blog_x_categories` (
  `id` int(11) NOT NULL,
  `blog_fk` int(11) NOT NULL,
  `blog_category_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blog_x_categories`
--

INSERT INTO `blog_x_categories` (`id`, `blog_fk`, `blog_category_fk`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_x_tags`
--

CREATE TABLE `blog_x_tags` (
  `id` int(11) NOT NULL,
  `blog_fk` int(11) DEFAULT NULL,
  `blog_tag_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blog_x_tags`
--

INSERT INTO `blog_x_tags` (`id`, `blog_fk`, `blog_tag_fk`) VALUES
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `quote` varchar(255) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `quote`, `author`) VALUES
(1, 'Be yourself; everyone else is already taken.', 'Oscar Wilde');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_views`
--
ALTER TABLE `blog_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_x_categories`
--
ALTER TABLE `blog_x_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_x_tags`
--
ALTER TABLE `blog_x_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blog_images`
--
ALTER TABLE `blog_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blog_views`
--
ALTER TABLE `blog_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_x_categories`
--
ALTER TABLE `blog_x_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `blog_x_tags`
--
ALTER TABLE `blog_x_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
