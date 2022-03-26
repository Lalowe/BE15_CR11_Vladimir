-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: localhost
-- Čas generovania: So 26.Mar 2022, 15:35
-- Verzia serveru: 10.4.21-MariaDB
-- Verzia PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `BE15_CR11_petadoption_Vladimir`
--
CREATE DATABASE IF NOT EXISTS `BE15_CR11_petadoption_Vladimir` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `BE15_CR11_petadoption_Vladimir`;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `animals`
--

CREATE TABLE `animals` (
  `id_a` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `age` int(20) NOT NULL,
  `live_at` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `animals`
--

INSERT INTO `animals` (`id_a`, `name`, `description`, `breed`, `hobbies`, `size`, `age`, `live_at`, `picture`) VALUES
(3, 'Liony', 'Very angry', 'nice cat', 'lying', 'big', 5, 'Wien', '623da80ca0b1a.jpeg'),
(4, 'Pajdo', 'Very calm', 'Labrador', 'Sleep', 'medium', 10, 'Wien', 'pic1.webp'),
(5, 'Srajdo', 'very nice', 'labrador', 'sleeping', 'medium', 9, 'Wien', 'pic2.webp'),
(6, 'Kulajda', 'very good', 'labrador', 'aporting', 'medium', 9, 'Wien', 'pic3.webp'),
(7, 'Kokajdo', 'very good', 'labrador', 'eating', 'medium', 12, 'Wien', 'pic4.webp'),
(8, 'Lejno', 'cuddling', 'labrador', 'sport', 'medium', 1, 'Wien', 'pic.webp'),
(9, 'Ostiepok', 'love to play', 'labrador', 'sleep', 'medium', 1, 'Wien', 'pic7.jpeg'),
(10, 'Zincico', 'good dog', 'labrador', 'jogging', 'medium', 2, 'Wien', 'pic8.webp'),
(11, 'Bryndza', 'very good', 'labrador', 'sleep', 'medium', 4, 'Wien', 'pic9.webp'),
(12, 'Slivovica', 'friendly', 'labrador', 'eating', 'medium', 6, 'Wien', 'pic10.jpeg');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `pet_adoption`
--

CREATE TABLE `pet_adoption` (
  `id` int(11) NOT NULL,
  `fk_user_id` int(11) DEFAULT NULL,
  `fk_animal_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone_number`, `adress`, `password`, `status`, `email`, `picture`) VALUES
(1, 'Uname', 'Lname', 324234234, 'adress', '', 'user', 'dsad@sasa.co', NULL),
(2, 'Puch', 'Mich', 32423432, 'Jetotam 1 Bratislava 01211 Slovakia', '4bc2ef0648cdf275032c83bb1e87dd554d47f4be293670042212c8a01cc2ccbe', 'adm', 'heas@sa.at', 'avatar.png'),
(3, 'Marek', 'Potocnya', 123413423, '', '4bc2ef0648cdf275032c83bb1e87dd554d47f4be293670042212c8a01cc2ccbe', 'user', 'sukale@barole.com', 'avatar.png');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id_a`);

--
-- Indexy pre tabuľku `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_user_id` (`fk_user_id`),
  ADD UNIQUE KEY `fk_animal_id` (`fk_animal_id`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `animals`
--
ALTER TABLE `animals`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pre tabuľku `pet_adoption`
--
ALTER TABLE `pet_adoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
