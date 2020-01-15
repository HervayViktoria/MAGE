-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Jan 15. 19:57
-- Kiszolgáló verziója: 10.3.15-MariaDB
-- PHP verzió: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `mydatabase`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `allverbs`
--

CREATE TABLE `allverbs` (
  `verb_id` int(11) NOT NULL,
  `infinitive` varchar(256) NOT NULL,
  `ich` varchar(256) NOT NULL,
  `du` varchar(256) NOT NULL,
  `ese` varchar(256) NOT NULL,
  `wir` varchar(256) NOT NULL,
  `ihr` varchar(256) NOT NULL,
  `sie` varchar(256) NOT NULL,
  `prateritum` varchar(256) NOT NULL,
  `auxiliary` varchar(256) NOT NULL,
  `perfekt` varchar(256) NOT NULL,
  `hun` varchar(256) NOT NULL,
  `modalverb` tinyint(1) DEFAULT NULL,
  `reflexive` tinyint(1) DEFAULT NULL,
  `simple` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `allverbs`
--

INSERT INTO `allverbs` (`verb_id`, `infinitive`, `ich`, `du`, `ese`, `wir`, `ihr`, `sie`, `prateritum`, `auxiliary`, `perfekt`, `hun`, `modalverb`, `reflexive`, `simple`) VALUES
(1, 'lesen', 'lese', 'liest', 'liest', 'lesen', 'lest', 'lesen', 'las', 'hat', 'gelesen', 'olvas', 0, 0, 1),
(2, 'müssen', 'muss', 'musst', 'muss', 'müssen', 'müsst', 'müssen', 'musste', 'hat', 'gemusst', 'muszáj', 1, 0, 0),
(3, 'schreiben', 'schreibe', 'schreibst', 'schreibt', 'schreiben', 'schreibt', 'schreiben', 'schrieb', 'hat', 'geschrieben', 'ír', 0, 0, 1),
(4, 'lügen', 'lüge', 'lügst', 'lügt', 'lügen', 'lügt', 'lügen', 'log', 'hat', 'gelogen', 'hazudik', 0, 0, 1),
(5, 'sich interessieren', 'interessiere mich', 'interessierst dich', 'interessiert sich', 'interessieren uns', 'interessiert euch', 'interessieren sich', 'interessierte sich', 'hat', 'interessiert sich', 'érdeklődik', 0, 1, 0),
(6, 'schlafen', 'schlafe', 'schläfst', 'schläft', 'schlafen', 'schlaft', 'schlafen', 'schlief', 'hat', 'geschlafen', 'alszik', 0, 0, 1),
(7, 'sich anziehen', 'ziehe mich an', 'ziehst dich an', 'zieht sich an', 'ziehen uns an', 'zieht euch an', 'ziehen sich an', 'zog sich an', 'ist', 'sich angezogen', 'felöltözik', 0, 1, 0),
(8, 'sich kämmen', 'kämme mich', 'kämmst dich', 'kämmt sich', 'kämmen uns', 'kämmt euch', 'kämmen sich', 'kämmte sich', 'hat', 'sich gekämmt', 'fésülködik', 0, 1, 0),
(9, 'mögen', 'mag', 'magst', 'mag', 'mögen', 'mögt', 'mögen', 'mochte', 'hat', 'gemocht', 'szeretne', 1, 0, 0),
(10, 'sein', 'bin', 'bist', 'ist', 'sind', 'seid', 'sind', 'war', 'ist', 'gewesen', 'létige', 0, 0, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `test_answers`
--

CREATE TABLE `test_answers` (
  `user_id` int(11) NOT NULL,
  `answer_infinitive` varchar(256) NOT NULL,
  `answer_meaning` varchar(256) NOT NULL,
  `answer_ich` varchar(256) NOT NULL,
  `answer_du` varchar(256) NOT NULL,
  `answer_ese` varchar(256) NOT NULL,
  `answer_wir` varchar(256) NOT NULL,
  `answer_ihr` varchar(256) NOT NULL,
  `answer_sie` varchar(256) NOT NULL,
  `answer_prat` varchar(256) NOT NULL,
  `answer_aux` varchar(256) NOT NULL,
  `answer_perfekt` varchar(256) NOT NULL,
  `answer_time` datetime NOT NULL,
  `result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `test_answers`
--

INSERT INTO `test_answers` (`user_id`, `answer_infinitive`, `answer_meaning`, `answer_ich`, `answer_du`, `answer_ese`, `answer_wir`, `answer_ihr`, `answer_sie`, `answer_prat`, `answer_aux`, `answer_perfekt`, `answer_time`, `result`) VALUES
(1, 'sich anziehen', 'felöltözik', '', '', '', '', '', '', '', '', '', '2019-12-19 11:50:05', 10),
(1, 'sich interessieren', 'érdeklődik', '', '', '', '', '', '', '', '', '', '2019-12-19 11:50:05', 10);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(256) NOT NULL,
  `user_lastname` varchar(256) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_pass` varchar(256) NOT NULL,
  `user_lasttime` datetime NOT NULL DEFAULT current_timestamp(),
  `user_regtime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_name`, `user_email`, `user_pass`, `user_lasttime`, `user_regtime`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '$2y$10$eTTX4dOKMtHaOyeqzMJ0h.GOn2V1F/poQwwrR/BqmBf4NL0Av3Xfe', '2019-12-20 10:25:16', '0000-00-00'),
(23, 'Admin1', 'Admin1', 'admin1', 'admin@gmail.com', '$2y$10$HsBd1QEv4cGcGVZ0cL5U0O9tlqT6rBOzI58U7Go/zySwJMsfyQP5a', '2020-01-15 19:49:25', '2020-01-15'),
(24, 'Proba', 'Proba', 'proba', 'proga@proba.hu', '$2y$10$UgPJbyyz5u8hl3EGy6kSfeh2oSdMn1j0aCMisi4pq6ymGuvVjhSkW', '2020-01-15 00:00:00', '2020-01-15');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user_input`
--

CREATE TABLE `user_input` (
  `user_id` int(11) NOT NULL,
  `user_input_id` int(11) NOT NULL,
  `user_infinitive` varchar(256) NOT NULL,
  `user_meaning` varchar(256) NOT NULL,
  `user_ich` varchar(256) NOT NULL,
  `user_du` varchar(256) NOT NULL,
  `user_ese` varchar(256) NOT NULL,
  `user_wir` varchar(256) NOT NULL,
  `user_ihr` varchar(256) NOT NULL,
  `user_sie` varchar(256) NOT NULL,
  `user_prat` varchar(256) NOT NULL,
  `user_aux` varchar(256) NOT NULL,
  `user_perfekt` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `allverbs`
--
ALTER TABLE `allverbs`
  ADD PRIMARY KEY (`verb_id`);

--
-- A tábla indexei `test_answers`
--
ALTER TABLE `test_answers`
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- A tábla indexei `user_input`
--
ALTER TABLE `user_input`
  ADD PRIMARY KEY (`user_input_id`),
  ADD KEY `user_id` (`user_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `allverbs`
--
ALTER TABLE `allverbs`
  MODIFY `verb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT a táblához `user_input`
--
ALTER TABLE `user_input`
  MODIFY `user_input_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `test_answers`
--
ALTER TABLE `test_answers`
  ADD CONSTRAINT `test_answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Megkötések a táblához `user_input`
--
ALTER TABLE `user_input`
  ADD CONSTRAINT `user_input_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
