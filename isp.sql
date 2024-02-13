-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 04:55 PM
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
-- Database: `isp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `admin`
--
DELIMITER $$
CREATE TRIGGER `hash_password_before_insert` BEFORE INSERT ON `admin` FOR EACH ROW BEGIN
    SET NEW.password = SHA1(NEW.password);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_title` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `book_author` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `book_image` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `book_descr` text CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `book_price` decimal(6,2) NOT NULL,
  `book_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_title`, `book_author`, `book_image`, `book_descr`, `book_price`, `book_quantity`) VALUES
(84, 'The Great Gatsby', 'F. Scott Fitzgerald', 'gatsby.jpg', 'A classic novel depicting the Roaring Twenties.', 15.99, 5),
(85, 'To Kill a Mockingbird', 'Harper Lee', '1200px-To_Kill_a_Mockingbird_(first_edit', 'A timeless story of racial injustice and moral growth.', 12.50, 3),
(86, '1984', 'George Orwell', '1984.png', 'A dystopian novel exploring the dangers of totalitarianism.', 9.99, 8),
(87, 'Pride and Prejudice', 'Jane Austen', 'Prideandprejudiceposter.jpg', 'A romantic novel highlighting social issues in the 19th century.', 14.75, 6),
(88, 'The Hobbit', 'J.R.R. Tolkien', 'hobiti.jpg', 'An adventurous tale of Bilbo Baggins and his journey.', 18.50, 4),
(89, 'The Catcher in the Rye', 'J.D. Salinger', 'one hundred.jpg', 'A coming-of-age novel exploring teenage angst.', 11.25, 7),
(90, 'Moby-Dick', 'Herman Melville', 'moby_dick.jpg', 'A tale of Captain Ahab\'s quest for revenge against Moby Dick.', 17.25, 2),
(91, 'One Hundred Years of Solitude', 'Gabriel Garcia Marquez', 'solitude.jpg', 'A magical realist novel depicting the Buendía family.', 20.00, 3),
(92, 'Brave New World', 'Aldous Huxley', 'brave_new_world.jpg', 'A futuristic novel exploring a society controlled by technology.', 16.50, 5),
(93, 'The Lord of the Rings', 'J.R.R. Tolkien', 'lotr.jpg', 'An epic fantasy trilogy set in the world of Middle-earth.', 25.99, 4),
(94, 'The Odyssey', 'Homer', 'odyssey.jpg', 'An ancient Greek epic poem attributed to Homer.', 13.75, 6),
(95, 'Frankenstein', 'Mary Shelley', 'frankenstein.jpg', 'A gothic novel exploring the consequences of scientific experiments.', 14.99, 3),
(96, 'Jane Eyre', 'Charlotte Brontë', 'jane_eyre.jpg', 'A coming-of-age novel featuring the orphaned Jane Eyre.', 12.25, 7),
(97, 'The Brothers Karamazov', 'Fyodor Dostoevsky', 'karamazov.jpg', 'A philosophical novel exploring the moral struggles of three brothers.', 19.25, 2),
(98, 'The Count of Monte Cristo', 'Alexandre Dumas', 'monte_cristo.jpg', 'A tale of betrayal, revenge, and redemption.', 22.50, 4),
(99, 'Wuthering Heights', 'Emily Brontë', 'wuthering_heights.jpg', 'A dark and passionate tale of love and revenge.', 15.75, 5),
(100, 'The Picture of Dorian Gray', 'Oscar Wilde', 'dorian_gray.jpg', 'A novel exploring the consequences of a hedonistic lifestyle.', 18.75, 3),
(101, 'Anna Karenina', 'Leo Tolstoy', 'anna_karenina.jpg', 'A tragic love story set against the backdrop of Russian society.', 21.99, 2),
(102, 'Crime and Punishment', 'Fyodor Dostoevsky', 'crime_punishment.jpg', 'A psychological novel delving into the mind of a young murderer.', 17.99, 4),
(103, 'The Scarlet Letter', 'Nathaniel Hawthorne', 'scarlet_letter.jpg', 'A story of sin, guilt, and redemption in Puritan Massachusetts.', 13.50, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`name`,`password`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
