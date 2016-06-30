-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 30. Jun 2016 um 15:27
-- Server-Version: 5.5.49-0ubuntu0.14.04.1
-- PHP-Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `haushaltsbuch`
--
CREATE DATABASE IF NOT EXISTS `haushaltsbuch` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `haushaltsbuch`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hhb_category`
--

CREATE TABLE `hhb_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `must_explain` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `hhb_category`
--

INSERT INTO `hhb_category` (`id`, `name`, `must_explain`) VALUES
(1, 'Treifstoff', 0),
(2, 'Anschaffung / Kauf', 0),
(3, 'Wartung', 0),
(4, 'Werkstatt', 0),
(5, 'Steuer', 1),
(6, 'Sonstiges', 1),
(7, 'Hausrat', 0),
(8, 'Unfall', 0),
(9, 'Leben', 1),
(10, 'Rente', 0),
(11, 'Kfz', 1),
(12, 'Einrichtung', 0),
(13, 'Reparatur', 1),
(14, 'Kleidung', 0),
(15, 'Schuhe', 0),
(16, 'Tasche', 0),
(17, 'Hardware', 0),
(18, 'Software', 0),
(19, 'Anschluss', 0),
(20, 'Versicherung', 1),
(21, 'Wohnung / Haus', 1),
(22, 'Grundstück', 0),
(23, 'Textil', 0),
(24, 'Elektronik', 0),
(25, 'Telefon', 0),
(26, 'Miete', 1),
(27, 'Gebühren', 0),
(28, 'Verein', 0),
(29, 'Krankenkasse', 0),
(30, 'Einkommen', 1),
(31, 'Gehalt', 0),
(32, 'GEZ', 0),
(33, 'Getränke', 0),
(34, 'Lebensmittel', 0),
(35, 'Urlaub', 1),
(36, 'Heizung', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hhb_cost`
--

CREATE TABLE `hhb_cost` (
  `id` bigint(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `period` int(11) NOT NULL,
  `month` tinyint(4) NOT NULL,
  `year` smallint(6) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_fix` tinyint(4) NOT NULL DEFAULT '0',
  `next_payday` timestamp NULL DEFAULT NULL,
  `type` varchar(45) NOT NULL DEFAULT 'cost'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `hhb_cost`
--

INSERT INTO `hhb_cost` (`id`, `price`, `period`, `month`, `year`, `description`, `is_fix`, `next_payday`, `type`) VALUES
(1, 22332.00, 5, 6, 2016, 'asdfasdfvxcvyxcvyxcvyxc', 0, '0000-00-00 00:00:00', 'cost'),
(2, 22332.00, 5, 6, 2016, 'asdfasdfvxcvyxcvyxcvyxc', 0, '0000-00-00 00:00:00', 'cost'),
(3, 22332.00, 5, 6, 2016, 'asdfasdfvxcvyxcvyxcvyxc', 0, '0000-00-00 00:00:00', 'cost'),
(4, 22332.00, 5, 6, 2016, 'asdfasdfvxcvyxcvyxcvyxc', 0, '0000-00-00 00:00:00', 'cost'),
(5, 22332.00, 5, 6, 2016, 'asdfasdfvxcvyxcvyxcvyxc', 0, '0000-00-00 00:00:00', 'cost'),
(6, 22332.00, 5, 6, 2016, 'asdfasdfvxcvyxcvyxcvyxc', 0, '0000-00-00 00:00:00', 'cost'),
(7, 1111.00, 5, 6, 2016, '', 0, '0000-00-00 00:00:00', 'cost'),
(8, 25.00, 5, 6, 2016, '', 0, '0000-00-00 00:00:00', 'cost'),
(9, 0.01, 5, 6, 2016, '', 0, '0000-00-00 00:00:00', 'cost'),
(10, 12.00, 5, 6, 2016, '', 0, '0000-00-00 00:00:00', 'cost'),
(11, 12.00, 5, 6, 2016, '', 0, '0000-00-00 00:00:00', 'cost'),
(12, 25.00, 5, 6, 2016, '', 0, '0000-00-00 00:00:00', 'cost'),
(13, 123.00, 5, 6, 2016, '', 0, '0000-00-00 00:00:00', 'cost'),
(14, 12.00, 5, 6, 2016, '', 0, '0000-00-00 00:00:00', 'cost'),
(15, 22332.00, 5, 6, 2016, '', 0, '0000-00-00 00:00:00', 'cost'),
(16, 43443.00, 5, 6, 2016, '', 0, '0000-00-00 00:00:00', 'cost'),
(17, 2332.00, 5, 6, 2016, '', 0, '0000-00-00 00:00:00', 'cost'),
(18, 1111.00, 5, 6, 2016, '', 0, '0000-00-00 00:00:00', 'cost');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hhb_cost_category`
--

CREATE TABLE `hhb_cost_category` (
  `cost_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `hhb_cost_category`
--

INSERT INTO `hhb_cost_category` (`cost_id`, `category_id`) VALUES
(1, 17),
(1, 4),
(2, 17),
(2, 4),
(3, 17),
(3, 4),
(4, 17),
(4, 4),
(6, 17),
(6, 4),
(7, 17),
(7, 35),
(7, 20),
(8, 24),
(9, 25),
(9, 1),
(10, 9),
(10, 25),
(11, 9),
(11, 25),
(12, 24),
(12, 17),
(13, 9),
(13, 26),
(14, 35),
(14, 4),
(15, 4),
(16, 26),
(16, 13),
(17, 36),
(17, 14),
(18, 36);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hhb_cost_period`
--

CREATE TABLE `hhb_cost_period` (
  `id` smallint(6) NOT NULL,
  `name` varchar(145) NOT NULL,
  `unit` varchar(145) NOT NULL DEFAULT 'month',
  `period_range` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `hhb_cost_period`
--

INSERT INTO `hhb_cost_period` (`id`, `name`, `unit`, `period_range`) VALUES
(1, 'jährlich', 'month', 12),
(2, '1/2 jährlich', 'month', 6),
(3, '1/4 jährlich', 'month', 3),
(4, 'monatlich', 'month', 1),
(5, 'einmalig', 'month', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `hhb_category`
--
ALTER TABLE `hhb_category`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `hhb_cost`
--
ALTER TABLE `hhb_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `hhb_cost_period`
--
ALTER TABLE `hhb_cost_period`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `hhb_category`
--
ALTER TABLE `hhb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT für Tabelle `hhb_cost`
--
ALTER TABLE `hhb_cost`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT für Tabelle `hhb_cost_period`
--
ALTER TABLE `hhb_cost_period`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
