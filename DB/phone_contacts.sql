-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: dec. 08, 2020 la 02:32 AM
-- Versiune server: 10.4.10-MariaDB
-- Versiune PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `phone_contacts`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id_contact` int(250) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `name_contact` varchar(250) NOT NULL,
  `number_contact` varchar(250) NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `contacts`
--

INSERT INTO `contacts` (`id_contact`, `id_user`, `name_contact`, `number_contact`) VALUES
(2, 1, 'casassdrsdfsf', '123124'),
(3, 1, 'sdasda', '12312312'),
(4, 1, 'dasdasd', '1231251'),
(5, 1, 'asdasdas', '3242423'),
(6, 1, 'asdasd', '2342342'),
(7, 1, 'dasgdfd', '234235'),
(8, 3, 'acasa', '1231241241'),
(9, 3, 'sataweasa', '34252453'),
(10, 3, 'sadasdas', '342524234'),
(11, 1, 'buna', '213214125'),
(12, 1, 'sadasdsa', '4112312313'),
(13, 1, 'asdsads', '2321123'),
(14, 4, 'hitads', '12321312'),
(15, 4, 'sadada', '213213123'),
(16, 4, 'asdasdas', '213r324234123'),
(17, 4, 'asdasda', '213432314'),
(18, 1, 'Marian', '074324235');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) DEFAULT NULL,
  `user_password` varchar(250) NOT NULL,
  `admin` int(123) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `user_email`, `user_password`, `admin`) VALUES
(1, 'raulpop', '', '12', 0),
(2, 'admin', '', '12', 1),
(3, 'rara', 'pop.raul62@yahoo.com', '123', 0),
(4, 'hi', 'hi@gmail.com', '12', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
