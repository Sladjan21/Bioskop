-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 06:07 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filmovi`
--

CREATE TABLE `filmovi` (
  `IDFilma` int(20) NOT NULL,
  `NazivFilma` varchar(256) NOT NULL,
  `Premijera` tinyint(1) NOT NULL,
  `Cena` float NOT NULL,
  `BrojKarta` int(11) NOT NULL,
  `Slika` varchar(255) NOT NULL,
  `Trajanje` int(11) NOT NULL,
  `Zanr` varchar(255) NOT NULL,
  `Opis` varchar(255) NOT NULL,
  `Glumci` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filmovi`
--

INSERT INTO `filmovi` (`IDFilma`, `NazivFilma`, `Premijera`, `Cena`, `BrojKarta`, `Slika`, `Trajanje`, `Zanr`, `Opis`, `Glumci`) VALUES
(5, 'Notting Hill', 0, 550, 9, 'img/nottingHill.jpg', 130, 'Romantika', 'Ovo je opis za film notting hill', 'Hue Grant, Julia Roberts'),
(7, 'Nacionalno blago', 1, 500, 2, 'img/nationalTreasure.jpg', 120, 'Akcija', 'Ovo je opis za film Nacionalno blago', 'Nicholas Cage, Sean Bean'),
(8, 'Avengers', 1, 440, 16, 'img/avengers.jpg', 140, 'Akcija', 'Ovo je opis za film Avengers', 'Robert Downey Jr., Chris Hemsworth'),
(9, 'Pinokio', 0, 550, 25, 'img/pinokio.jpeg', 100, 'Deciji', 'Ovo je opis za film pinokio', 'Tom Hanks, Benjamin Evan'),
(30, 'Mala Sirena 2', 0, 300, 4, 'img/1692262577.jpg', 100, '  Avantura', 'Animirani crtani Mala Sirena', 'Selena Gomez'),
(31, 'Mala Sirena 3', 0, 350, 11, 'img/1692869486.jpg', 100, '  Avantura', 'Mala sirena u crtanom filmu', 'Selena Gomez');

-- --------------------------------------------------------

--
-- Table structure for table `filmoviusers`
--

CREATE TABLE `filmoviusers` (
  `ID` int(11) NOT NULL,
  `IDFilma` int(11) NOT NULL,
  `IDUsera` bigint(20) UNSIGNED NOT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `Poruka` varchar(255) DEFAULT NULL,
  `vreme` varchar(255) NOT NULL,
  `EmailOdgovornog` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filmoviusers`
--

INSERT INTO `filmoviusers` (`ID`, `IDFilma`, `IDUsera`, `Status`, `Poruka`, `vreme`, `EmailOdgovornog`) VALUES
(71, 7, 9, 1, NULL, '36', 'proba@gmail.com'),
(73, 7, 15, 0, 'Ne moze', '30', NULL),
(74, 5, 9, 1, NULL, '5', 'proba@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `karta`
--

CREATE TABLE `karta` (
  `IDKarte` int(11) NOT NULL,
  `ImeFilma` varchar(255) NOT NULL,
  `BrojKarta` int(11) NOT NULL,
  `Vreme` time NOT NULL,
  `Cena` float NOT NULL,
  `IDfilmusers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karta`
--

INSERT INTO `karta` (`IDKarte`, `ImeFilma`, `BrojKarta`, `Vreme`, `Cena`, `IDfilmusers`) VALUES
(23, 'Nacionalno blago', 2, '22:32:00', 500, 71),
(25, 'Nacionalno blago', 1, '14:50:00', 500, 73),
(26, 'Notting Hill', 2, '18:00:00', 550, 74);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `IDfilm` int(11) NOT NULL,
  `Naslov` varchar(255) NOT NULL,
  `Komentar` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`IDfilm`, `Naslov`, `Komentar`, `updated_at`, `created_at`) VALUES
(7, 'Strahinja', 'Ovo je komentar', '2023-08-29 14:43:23', '2023-08-29 14:43:23'),
(5, 'Mina', 'Ovo je bas lep film', '2023-08-31 19:17:44', '2023-08-31 19:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `komentars`
--

CREATE TABLE `komentars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Naslov` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Komentar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentars`
--

INSERT INTO `komentars` (`id`, `Naslov`, `Komentar`, `created_at`, `updated_at`) VALUES
(1, 'Lep tekst', 'Ovo je jedan lep tekst', '2023-08-22 17:12:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_22_151311_create_komentars_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sla@yes.com', '$2y$10$0JdliPQUdgeWOuJiULiaQu0Ldgia0vHwR1VQprsEb91gwFbAuxN6m', '2022-12-21 14:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT 0,
  `Rola` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'korisnik'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `Admin`, `Rola`) VALUES
(8, 'Sladjan', 'proba@gmail.com', NULL, '$2y$10$Sh04c6V.ofZFLyPB7XGKuevFLWI/H3oNA3KUcHusMfI407MPsG/w.', NULL, '2023-07-16 13:32:02', '2023-07-16 13:32:02', 1, 'admin'),
(9, 'Mina', 'mina@gmail.com', NULL, '$2y$10$fy0.K2WvRVEzes98AoSG8eZRgJJ.tgOyvxVhspYeaKhsdciyyC3Sm', NULL, '2023-07-16 14:03:45', '2023-07-16 14:03:45', 0, 'korisnik'),
(10, 'Moderator', 'moderator@gmail.com', NULL, '$2y$10$tCrCaUJKJYp0CbUaZPBRYep2f5Hej3A.BPNcrQ/K/RL6u2oxRtXaq', NULL, '2023-08-01 04:57:10', '2023-08-01 04:57:10', 0, 'moderator'),
(11, 'Boris', 'boris@gmail.com', NULL, '$2y$10$eAQtlobQzla7162ZmQ8abeFG2SDV36LfEAmvAkLEJvQ1AJuoyp1fS', NULL, '2023-08-13 09:10:14', '2023-08-13 09:10:14', 0, 'korisnik'),
(12, 'Branko', 'branko@gmail.com', NULL, '$2y$10$jX9YjLI2JSHgbU0Vsmcjaue3mtA4rJIFpJ9zEOLI9dQvtPEzopA1y', NULL, '2023-08-23 10:25:41', '2023-08-23 10:25:41', 0, 'korisnik'),
(15, 'Strahinja', 'strahinja@gmail.com', NULL, '$2y$10$kMMVVlSjY2TeSX.D7tnZOOe6635gtXO.1GwfVL1J5KecIVZZcHt1K', NULL, '2023-08-26 15:02:26', '2023-08-26 15:02:26', 0, 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `vremeprikaza`
--

CREATE TABLE `vremeprikaza` (
  `IDFilma` int(20) NOT NULL,
  `Vreme` time NOT NULL,
  `IDVreme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vremeprikaza`
--

INSERT INTO `vremeprikaza` (`IDFilma`, `Vreme`, `IDVreme`) VALUES
(5, '18:00:00', 5),
(30, '21:00:00', 28),
(7, '14:50:00', 30),
(7, '13:50:00', 31),
(31, '23:30:00', 35),
(7, '22:32:00', 36);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `filmovi`
--
ALTER TABLE `filmovi`
  ADD PRIMARY KEY (`IDFilma`);

--
-- Indexes for table `filmoviusers`
--
ALTER TABLE `filmoviusers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDFilma` (`IDFilma`),
  ADD KEY `IDUsera` (`IDUsera`);

--
-- Indexes for table `karta`
--
ALTER TABLE `karta`
  ADD PRIMARY KEY (`IDKarte`),
  ADD KEY `IDfilmusers` (`IDfilmusers`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD KEY `IDfilm` (`IDfilm`);

--
-- Indexes for table `komentars`
--
ALTER TABLE `komentars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vremeprikaza`
--
ALTER TABLE `vremeprikaza`
  ADD PRIMARY KEY (`IDVreme`),
  ADD KEY `IDFilma` (`IDFilma`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filmovi`
--
ALTER TABLE `filmovi`
  MODIFY `IDFilma` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `filmoviusers`
--
ALTER TABLE `filmoviusers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `karta`
--
ALTER TABLE `karta`
  MODIFY `IDKarte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `komentars`
--
ALTER TABLE `komentars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vremeprikaza`
--
ALTER TABLE `vremeprikaza`
  MODIFY `IDVreme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `filmoviusers`
--
ALTER TABLE `filmoviusers`
  ADD CONSTRAINT `filmoviusers_ibfk_1` FOREIGN KEY (`IDFilma`) REFERENCES `filmovi` (`IDFilma`),
  ADD CONSTRAINT `filmoviusers_ibfk_2` FOREIGN KEY (`IDUsera`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `karta`
--
ALTER TABLE `karta`
  ADD CONSTRAINT `karta_ibfk_1` FOREIGN KEY (`IDfilmusers`) REFERENCES `filmoviusers` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`IDfilm`) REFERENCES `filmovi` (`IDFilma`) ON DELETE CASCADE;

--
-- Constraints for table `vremeprikaza`
--
ALTER TABLE `vremeprikaza`
  ADD CONSTRAINT `vremeprikaza_ibfk_1` FOREIGN KEY (`IDFilma`) REFERENCES `filmovi` (`IDFilma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
