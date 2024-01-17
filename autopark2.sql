-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost:3306
-- Vytvořeno: Ned 14. led 2024, 18:10
-- Verze serveru: 5.7.24
-- Verze PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `autopark2`
--
CREATE DATABASE IF NOT EXISTS `autopark2` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci;
USE `autopark2`;

-- --------------------------------------------------------

--
-- Struktura tabulky `autopark`
--

CREATE TABLE `autopark` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `typ` varchar(15) COLLATE utf8_czech_ci NOT NULL,
  `spz` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  `barva` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `dostupne` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `autopark`
--

INSERT INTO `autopark` (`id`, `typ`, `spz`, `barva`, `dostupne`) VALUES
(1, 'Škoda Fábia', '3A34578', 'černá', '2024-01-05'),
(2, 'Škoda Rapid', '3A8745', 'bílá', '2024-01-12'),
(3, 'VW Touran', '4A72365', 'hnědá', '2024-01-11'),
(4, 'VW Tiguan', '7L72875', 'modrá', '2024-01-10'),
(5, 'KIA Sportage', '1L72875', 'Zlatá', '2024-01-28');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `autopark`
--
ALTER TABLE `autopark`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `autopark`
--
ALTER TABLE `autopark`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
