-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 25 jan 2016 om 10:56
-- Serverversie: 5.5.46-0ubuntu0.14.04.2
-- PHP-versie: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codefarm`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `assessment`
--

CREATE TABLE `assessment` (
  `assessment_id` int(11) NOT NULL,
  `categorie_naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `assessmentresultaat`
--

CREATE TABLE `assessmentresultaat` (
  `id` int(11) NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `resultaat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `beheerder`
--

CREATE TABLE `beheerder` (
  `beheerder_id` int(11) NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL,
  `accesslevel` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `beheerder`
--

INSERT INTO `beheerder` (`beheerder_id`, `gebruikersnaam`, `accesslevel`) VALUES
(2, 'riekelt_fp', 999),
(4, 'rkuypers_fp', 0),
(6, 'klaas_fp', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `beheerderskoppeling`
--

CREATE TABLE `beheerderskoppeling` (
  `klas_naam` varchar(255) NOT NULL,
  `beheerder_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorie`
--

CREATE TABLE `categorie` (
  `naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categoriekoppeling`
--

CREATE TABLE `categoriekoppeling` (
  `categorie_naam` varchar(255) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `deelnemer`
--

CREATE TABLE `deelnemer` (
  `gebruikersnaam` varchar(255) NOT NULL,
  `deelnemer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `deelnemer`
--

INSERT INTO `deelnemer` (`gebruikersnaam`, `deelnemer_id`) VALUES
('199386_edufp', 1),
('200069_edufp', 9),
('198716_edufp', 10),
('199439_edufp', 11);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gast`
--

CREATE TABLE `gast` (
  `gast_id` int(11) NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gastkoppeling`
--

CREATE TABLE `gastkoppeling` (
  `gast_id` int(11) NOT NULL,
  `groep_naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `gebruikersnaam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `overmij` blob NOT NULL,
  `datum_aangemeld` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datum_laatsgezien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`gebruikersnaam`, `wachtwoord`, `email`, `voornaam`, `achternaam`, `overmij`, `datum_aangemeld`, `datum_laatsgezien`) VALUES
('198716_edufp', 'aa067e3946586fab1f9e8e691c6e8ad6896f8922a92c051c44acbd42a2b52a55', '198716@edu.rocfriesepoort.nl', 'Amando', 'Vledder', '', '2016-01-22 08:55:47', '2016-01-22 09:56:48'),
('199386_edufp', 'e17c19b7100eaf0694dbf2b246b0b264ff0bbcf31af6083ab8d78eade41027a4', '199386@edu.rocfriesepoort.nl', 'Riekelt', 'Brands', 0x527573746967206a7567656e64653c696d67207372633d22687474703a2f2f7777772e67726170706967706c6161746a652e6e6c2f77702d636f6e74656e742f75706c6f6164732f323031332f30392f477261707069672d506c6161746a652d6265686565726465722d7465616d2d61616e2d6865742d7765726b2e6a70672220636c6173733d226972635f6d6922207374796c653d226d617267696e2d746f703a2031353570783b22206865696768743d22333230222077696474683d22343634223e, '1983-01-16 15:28:21', '2016-01-19 13:43:14'),
('199439_edufp', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '199439@edu.rocfriesepoort.nl', 'Klaas', 'Hakvoort', '', '2016-01-22 12:20:22', '2016-01-22 13:21:21'),
('200069_edufp', '89f2ff9113459a7f0c040d368733d1107192c2278a2fcbf7d1f74be5470c59fa', '200069@edu.rocfriesepoort.nl', 'Douwe', 'Pausma', '', '2016-01-21 09:36:07', ''),
('klaas_fp', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '199439@edu.rocfriesepoort.nl', 'Klaas', 'Hakvoort', '', '2016-01-22 12:22:19', '2016-01-22 13:32:23'),
('riekelt_fp', 'e17c19b7100eaf0694dbf2b246b0b264ff0bbcf31af6083ab8d78eade41027a4', 'riekelturk@yahoo.nl', 'Riekelt', 'Brands', 0x4469742069732065656e20746573742062656865657264657273206163636f756e742e3c62723e, '2016-01-14 14:08:31', '2016-01-25 10:27:56'),
('rkuypers_fp', '670551a100f46ac051152d3ee73998346f07ac977ca3e58bb034985fdb945019', 'rkuypers@rocfriesepoort.nl', 'Roger', 'Kuypers', '', '2016-01-21 09:44:14', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `groep`
--

CREATE TABLE `groep` (
  `groep_id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `volgorde` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `groepkoppeling`
--

CREATE TABLE `groepkoppeling` (
  `klas_id` int(11) NOT NULL,
  `groep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klas`
--

CREATE TABLE `klas` (
  `klas_id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klas`
--

INSERT INTO `klas` (`klas_id`, `naam`) VALUES
(10, 'ICTOM1A');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klaskoppeling`
--

CREATE TABLE `klaskoppeling` (
  `deelnemer` varchar(255) NOT NULL,
  `klas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klaskoppeling`
--

INSERT INTO `klaskoppeling` (`deelnemer`, `klas_id`) VALUES
('198716_edufp', 10),
('199386_edufp', 10),
('199439_edufp', 10),
('200069_edufp', 10);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `module`
--

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `beschrijving` blob NOT NULL,
  `volgorde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `modulekoppeling`
--

CREATE TABLE `modulekoppeling` (
  `traject_naam` varchar(255) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `moduletheorie`
--

CREATE TABLE `moduletheorie` (
  `module_id` int(11) NOT NULL,
  `theorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `moduletheoriekoppeling`
--

CREATE TABLE `moduletheoriekoppeling` (
  `moduletheorie_id` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `modulevoortgang`
--

CREATE TABLE `modulevoortgang` (
  `id` int(11) NOT NULL,
  `module` int(11) NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL,
  `voortgang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `multiplechoice`
--

CREATE TABLE `multiplechoice` (
  `multiplechoice_id` int(11) NOT NULL,
  `vraag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `openvraag`
--

CREATE TABLE `openvraag` (
  `openvraag_id` int(11) NOT NULL,
  `vraag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `praktijkvraag`
--

CREATE TABLE `praktijkvraag` (
  `praktijkvraag_id` int(11) NOT NULL,
  `vraag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `project`
--

CREATE TABLE `project` (
  `project_naam` varchar(255) NOT NULL,
  `volgorde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projectkoppeling`
--

CREATE TABLE `projectkoppeling` (
  `gebruikersnaam` varchar(255) NOT NULL,
  `project_naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projecttheorie`
--

CREATE TABLE `projecttheorie` (
  `project_naam` varchar(255) NOT NULL,
  `theorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projecttheoriekoppeling`
--

CREATE TABLE `projecttheoriekoppeling` (
  `project_naam` varchar(255) NOT NULL,
  `projecttheorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `resultaat`
--

CREATE TABLE `resultaat` (
  `resultaat_id` int(11) NOT NULL,
  `maximaal` int(11) NOT NULL,
  `behaald` int(11) NOT NULL,
  `datumstart` varchar(255) NOT NULL,
  `datumafsluiting` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `theorie`
--

CREATE TABLE `theorie` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `content` blob NOT NULL,
  `volgorde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `toets`
--

CREATE TABLE `toets` (
  `toets_id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `volgorde` int(11) NOT NULL,
  `categorie_naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `toetsresultaat`
--

CREATE TABLE `toetsresultaat` (
  `id` int(11) NOT NULL,
  `toets_id` int(11) NOT NULL,
  `resultaat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `toetsvraag`
--

CREATE TABLE `toetsvraag` (
  `id` int(11) NOT NULL,
  `vraag` blob NOT NULL,
  `antwoord` blob NOT NULL,
  `punten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `traject`
--

CREATE TABLE `traject` (
  `traject_naam` varchar(255) NOT NULL,
  `beschrijving` blob NOT NULL,
  `volgorde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `trajectkoppeling`
--

CREATE TABLE `trajectkoppeling` (
  `groep_naam` varchar(255) NOT NULL,
  `traject_naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `trajectvoortgang`
--

CREATE TABLE `trajectvoortgang` (
  `id` int(11) NOT NULL,
  `traject` varchar(255) NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL,
  `voortgang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `voortgang`
--

CREATE TABLE `voortgang` (
  `id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vragenbank`
--

CREATE TABLE `vragenbank` (
  `vraag_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `vraag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`assessment_id`);

--
-- Indexen voor tabel `assessmentresultaat`
--
ALTER TABLE `assessmentresultaat`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `beheerder`
--
ALTER TABLE `beheerder`
  ADD PRIMARY KEY (`beheerder_id`);

--
-- Indexen voor tabel `beheerderskoppeling`
--
ALTER TABLE `beheerderskoppeling`
  ADD PRIMARY KEY (`klas_naam`);

--
-- Indexen voor tabel `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`naam`);

--
-- Indexen voor tabel `categoriekoppeling`
--
ALTER TABLE `categoriekoppeling`
  ADD PRIMARY KEY (`categorie_naam`);

--
-- Indexen voor tabel `deelnemer`
--
ALTER TABLE `deelnemer`
  ADD PRIMARY KEY (`deelnemer_id`);

--
-- Indexen voor tabel `gast`
--
ALTER TABLE `gast`
  ADD PRIMARY KEY (`gast_id`);

--
-- Indexen voor tabel `gastkoppeling`
--
ALTER TABLE `gastkoppeling`
  ADD PRIMARY KEY (`gast_id`);

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`gebruikersnaam`);

--
-- Indexen voor tabel `groep`
--
ALTER TABLE `groep`
  ADD PRIMARY KEY (`groep_id`);

--
-- Indexen voor tabel `groepkoppeling`
--
ALTER TABLE `groepkoppeling`
  ADD PRIMARY KEY (`klas_id`);

--
-- Indexen voor tabel `klas`
--
ALTER TABLE `klas`
  ADD PRIMARY KEY (`klas_id`);

--
-- Indexen voor tabel `klaskoppeling`
--
ALTER TABLE `klaskoppeling`
  ADD PRIMARY KEY (`deelnemer`);

--
-- Indexen voor tabel `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexen voor tabel `modulekoppeling`
--
ALTER TABLE `modulekoppeling`
  ADD PRIMARY KEY (`traject_naam`);

--
-- Indexen voor tabel `moduletheorie`
--
ALTER TABLE `moduletheorie`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexen voor tabel `moduletheoriekoppeling`
--
ALTER TABLE `moduletheoriekoppeling`
  ADD PRIMARY KEY (`moduletheorie_id`);

--
-- Indexen voor tabel `modulevoortgang`
--
ALTER TABLE `modulevoortgang`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `multiplechoice`
--
ALTER TABLE `multiplechoice`
  ADD PRIMARY KEY (`multiplechoice_id`);

--
-- Indexen voor tabel `openvraag`
--
ALTER TABLE `openvraag`
  ADD PRIMARY KEY (`openvraag_id`);

--
-- Indexen voor tabel `praktijkvraag`
--
ALTER TABLE `praktijkvraag`
  ADD PRIMARY KEY (`praktijkvraag_id`);

--
-- Indexen voor tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_naam`);

--
-- Indexen voor tabel `projectkoppeling`
--
ALTER TABLE `projectkoppeling`
  ADD PRIMARY KEY (`gebruikersnaam`);

--
-- Indexen voor tabel `projecttheorie`
--
ALTER TABLE `projecttheorie`
  ADD PRIMARY KEY (`project_naam`);

--
-- Indexen voor tabel `projecttheoriekoppeling`
--
ALTER TABLE `projecttheoriekoppeling`
  ADD PRIMARY KEY (`project_naam`);

--
-- Indexen voor tabel `resultaat`
--
ALTER TABLE `resultaat`
  ADD PRIMARY KEY (`resultaat_id`);

--
-- Indexen voor tabel `theorie`
--
ALTER TABLE `theorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `toets`
--
ALTER TABLE `toets`
  ADD PRIMARY KEY (`toets_id`);

--
-- Indexen voor tabel `toetsresultaat`
--
ALTER TABLE `toetsresultaat`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `toetsvraag`
--
ALTER TABLE `toetsvraag`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `traject`
--
ALTER TABLE `traject`
  ADD PRIMARY KEY (`traject_naam`);

--
-- Indexen voor tabel `trajectkoppeling`
--
ALTER TABLE `trajectkoppeling`
  ADD PRIMARY KEY (`groep_naam`);

--
-- Indexen voor tabel `trajectvoortgang`
--
ALTER TABLE `trajectvoortgang`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `voortgang`
--
ALTER TABLE `voortgang`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `vragenbank`
--
ALTER TABLE `vragenbank`
  ADD PRIMARY KEY (`vraag_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `assessment`
--
ALTER TABLE `assessment`
  MODIFY `assessment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `assessmentresultaat`
--
ALTER TABLE `assessmentresultaat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `beheerder`
--
ALTER TABLE `beheerder`
  MODIFY `beheerder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `deelnemer`
--
ALTER TABLE `deelnemer`
  MODIFY `deelnemer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT voor een tabel `gast`
--
ALTER TABLE `gast`
  MODIFY `gast_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `groep`
--
ALTER TABLE `groep`
  MODIFY `groep_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `klas`
--
ALTER TABLE `klas`
  MODIFY `klas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT voor een tabel `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `modulevoortgang`
--
ALTER TABLE `modulevoortgang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `multiplechoice`
--
ALTER TABLE `multiplechoice`
  MODIFY `multiplechoice_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `openvraag`
--
ALTER TABLE `openvraag`
  MODIFY `openvraag_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `praktijkvraag`
--
ALTER TABLE `praktijkvraag`
  MODIFY `praktijkvraag_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `resultaat`
--
ALTER TABLE `resultaat`
  MODIFY `resultaat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `theorie`
--
ALTER TABLE `theorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `toets`
--
ALTER TABLE `toets`
  MODIFY `toets_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `toetsresultaat`
--
ALTER TABLE `toetsresultaat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `toetsvraag`
--
ALTER TABLE `toetsvraag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `trajectvoortgang`
--
ALTER TABLE `trajectvoortgang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `voortgang`
--
ALTER TABLE `voortgang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `vragenbank`
--
ALTER TABLE `vragenbank`
  MODIFY `vraag_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
