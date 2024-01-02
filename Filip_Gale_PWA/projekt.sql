-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2021 at 07:25 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanak`
--

CREATE TABLE `clanak` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(64) COLLATE utf8_croatian_ci NOT NULL,
  `sazetak` text COLLATE utf8_croatian_ci NOT NULL,
  `tekst` text COLLATE utf8_croatian_ci NOT NULL,
  `slika` varchar(64) COLLATE utf8_croatian_ci NOT NULL,
  `kategorija` varchar(64) COLLATE utf8_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `clanak`
--

INSERT INTO `clanak` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(20, '2021/05/25', 'Zmaj u Zagrebu?', 'Viđeno je gigantsko stvorenje u Retkovcu, dijelu Dubrave.', 'Novi viralni video ukazuje da bi se ogromni reptil mogao skrivati u Retkovcu (Dubrava, ZG). \"Ako ste u okolici sa svojom djecom ili ljubimcima pripazite da ih ne odnese\", izjavila je lokalna policija.', 'crni igra1.jpg', 'Sport', 1),
(21, '2021/05/25', 'Emuaski rat', 'Lokalni čovjek proglasio rat protiv emua.', 'Lokalni čovjek je saznao da je 1932. Australija izgubila rat protiv dvometarskih ptica ptica. Nakon svoje spoznaje je uzeo stvar u svoje ruke. ', 'emu2.png', 'Sport', 1),
(22, '2021/05/25', 'treći članak', 'treći kratki sažetak', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'splash1.png', 'Kultura', 1),
(23, '2021/05/25', 'četvrti članak', 'četvrti kratki sažetak', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'splash2.png', 'Kultura', 1),
(24, '2021/05/25', 'peti članak', 'peti kratki sažetak', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'splash3.png', 'Kultura', 1),
(25, '2021/05/25', 'šesti članak', 'Upoznajte Terra najvećeg modela za igraća!', 'Htio sam da ima stav poput generala ili kralja.', 'provjera1.png', 'Sport', 1),
(26, '2021/05/25', 'sedmi članak', 'sedmi kratki sažetak', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'EyeGuy1.png', 'Sport', 0),
(27, '2021/05/25', 'osmi članak', 'osmi kratki sažetak', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'provjera1.png', 'Sport', 0),
(28, '2021/05/25', 'deveti članak', 'deveti kratki sažetak', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'provjera1.png', 'Kultura', 0),
(29, '2021/05/25', 'deseti članak', 'deseti kratki sažetak', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'angelica.jpg', 'Kultura', 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'a', 'a', 'a', '$2y$10$.QD/du8Dcz1dAsHGWYzeguf9uAlsiNxwKuVjBIYbIh2spF/DRX8xC', 1),
(2, 'b', 'b', 'b', '$2y$10$j9fqziOj6M8oltohcF2R2e0ULaILa0SY4pyVg2/qSHf/7NwAG2aQS', 0),
(3, 'c', 'c', 'c', '$2y$10$p042eYJ60yYgKEZZGcmP3eYpvRLvFPfdwmW/XkMj6xlgRqZjC9WDu', 0),
(4, 'd', 'd', 'd', '$2y$10$9pooTNXD7j18ETSaEUo9meNl3dED3I.Fb4Aa.Aue0TN6nEHQlAvTi', 0),
(5, 'e', 'e', 'e', '$2y$10$vn3AcsTNSmIRS5VrKF5p0ezj8oG73lG.AmEYmn9qVmYH9pDjUpiyW', 0),
(6, 'f', 'f', 'f', '$2y$10$P6fNV6160XKnkzLsrmF8HOds3uBy8erxdMIV5n9SrswHTVUJ/fcyO', 0),
(8, 'g', 'g', 'g', '$2y$10$6Rj1f.Jl4J/82TSuuyo/nOA.SdltY3cW9x90ljfnRhYZN.uMfagXu', 0),
(9, 'h', 'h', 'h', '$2y$10$3DUgn5IdStOmRf8I3sHwh.M7m.G/8vCj54Lv4siYds9F0bM3UKh32', 0),
(11, 'i', 'i', 'i', '$2y$10$aEA/PibFtOOJfs3g7qfRaOChSrr1xNgw1RVuLzVAUZes6taAIrjNa', 0),
(13, 'admin', 'sifra je admin', 'admin', '$2y$10$GgYfYnlGU07Vcq7o4iiMNuPA5q9VygbA2Gha7aMr1C4AUXP.y59dy', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanak`
--
ALTER TABLE `clanak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanak`
--
ALTER TABLE `clanak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
