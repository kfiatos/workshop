-- phpMyAdmin SQL Dump
-- version 4.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Czas generowania: 20 Lip 2015, 22:15
-- Wersja serwera: 5.5.42
-- Wersja PHP: 5.5.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `workshop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Tweets`
--

CREATE TABLE `Tweets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(140) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Tweets`
--

INSERT INTO `Tweets` (`id`, `user_id`, `text`, `creation_date`) VALUES
(1, 1, ' to jest moj pierwszy tweet 2 dziaÅ‚a juÅ¼ edit posta', '2015-07-20 20:00:30'),
(2, 2, 'nowy tekst tweet 2', '2015-07-18 18:10:32'),
(3, 2, 'najnowszy po zrobieniu update tweet', '2015-07-19 06:30:53'),
(4, 2, 'to jest tweet kfiatosa', '2015-07-18 15:12:24'),
(5, 2, 'to jest tweet kfiatosa', '2015-07-18 15:12:39'),
(6, 2, '            ustawione session i post', '2015-07-18 15:13:51'),
(7, 2, 'TO 10 tweet\r\n', '2015-07-18 15:19:02'),
(8, 2, 'halo', '2015-07-18 15:57:31'),
(9, 2, 'gsdgsd', '2015-07-18 15:57:50'),
(10, 2, 'dasdasdsdaasdaswd12', '2015-07-18 16:09:10'),
(11, 2, 'kolejny tweet nie jest juz pusty', '2015-07-19 10:37:51'),
(12, 2, 'ten tweet nie jest juz pusty', '2015-07-19 10:37:31'),
(13, 2, '312312', '2015-07-18 19:16:43'),
(14, 1, 'michal: drugi tweet', '2015-07-19 11:23:36');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `hashed_password` varchar(60) NOT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Users`
--

INSERT INTO `Users` (`id`, `nick`, `hashed_password`, `description`) VALUES
(1, 'michal', '$2y$11$9k3klmEOWCOU87I4ZU5h4OlxPl8PhuvKZYAoldCxZgH4uwljpJt5.', 'michal to ja. Pierwszy user'),
(2, 'kfiatos', '$2y$11$TVXXqsXWqNdfnBZPiXM7O.Vyef8yubPutrFyVqd5jzSzV.avJqPHq', '1234');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `Tweets`
--
ALTER TABLE `Tweets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Tweets`
--
ALTER TABLE `Tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT dla tabeli `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Tweets`
--
ALTER TABLE `Tweets`
  ADD CONSTRAINT `tweets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
