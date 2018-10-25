-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Ott 25, 2018 alle 08:27
-- Versione del server: 5.7.23
-- Versione PHP: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cooperative`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ente`
--

CREATE TABLE `ente` (
  `id_ente` int(11) NOT NULL,
  `telefono` text NOT NULL,
  `nomeEnte` text NOT NULL,
  `id_regione` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `presenza`
--

CREATE TABLE `presenza` (
  `id_presenza` int(11) NOT NULL,
  `dataOraInizio` datetime NOT NULL,
  `dataOraFine` datetime NOT NULL,
  `isApprovata` tinyint(1) NOT NULL,
  `id_volontario` int(11) NOT NULL,
  `id_progetto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `progetto`
--

CREATE TABLE `progetto` (
  `id_progetto` int(11) NOT NULL,
  `titolo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `regione`
--

CREATE TABLE `regione` (
  `id_regione` int(11) NOT NULL,
  `ragioneSociale` text NOT NULL,
  `piva` text NOT NULL,
  `tel` text NOT NULL,
  `id_utente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `regioneprogetto`
--

CREATE TABLE `regioneprogetto` (
  `id_regioneprogetto` int(11) NOT NULL,
  `id_regione` int(11) NOT NULL,
  `id_progetto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `sede`
--

CREATE TABLE `sede` (
  `id_sede` int(11) NOT NULL,
  `id_ente` int(11) NOT NULL,
  `indirizzo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id_utente` int(11) NOT NULL,
  `user` text NOT NULL,
  `password` text NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `id_regione` int(11) NOT NULL DEFAULT '-1',
  `id_ente` int(11) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `volontario`
--

CREATE TABLE `volontario` (
  `id_volontario` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cognome` text NOT NULL,
  `dataNascita` date NOT NULL,
  `codFiscale` text NOT NULL,
  `id_ente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `volontarioprogetto`
--

CREATE TABLE `volontarioprogetto` (
  `id_volontarioprogetto` int(11) NOT NULL,
  `id_volontario` int(11) NOT NULL,
  `id_progetto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ente`
--
ALTER TABLE `ente`
  ADD PRIMARY KEY (`id_ente`);

--
-- Indici per le tabelle `presenza`
--
ALTER TABLE `presenza`
  ADD PRIMARY KEY (`id_presenza`);

--
-- Indici per le tabelle `progetto`
--
ALTER TABLE `progetto`
  ADD PRIMARY KEY (`id_progetto`);

--
-- Indici per le tabelle `regione`
--
ALTER TABLE `regione`
  ADD PRIMARY KEY (`id_regione`);

--
-- Indici per le tabelle `regioneprogetto`
--
ALTER TABLE `regioneprogetto`
  ADD PRIMARY KEY (`id_regioneprogetto`);

--
-- Indici per le tabelle `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id_sede`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id_utente`);

--
-- Indici per le tabelle `volontario`
--
ALTER TABLE `volontario`
  ADD PRIMARY KEY (`id_volontario`);

--
-- Indici per le tabelle `volontarioprogetto`
--
ALTER TABLE `volontarioprogetto`
  ADD PRIMARY KEY (`id_volontarioprogetto`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `ente`
--
ALTER TABLE `ente`
  MODIFY `id_ente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `presenza`
--
ALTER TABLE `presenza`
  MODIFY `id_presenza` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `progetto`
--
ALTER TABLE `progetto`
  MODIFY `id_progetto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `regione`
--
ALTER TABLE `regione`
  MODIFY `id_regione` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `regioneprogetto`
--
ALTER TABLE `regioneprogetto`
  MODIFY `id_regioneprogetto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `sede`
--
ALTER TABLE `sede`
  MODIFY `id_sede` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `volontario`
--
ALTER TABLE `volontario`
  MODIFY `id_volontario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `volontarioprogetto`
--
ALTER TABLE `volontarioprogetto`
  MODIFY `id_volontarioprogetto` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
