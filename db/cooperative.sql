-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Nov 22, 2018 alle 12:58
-- Versione del server: 5.6.36-cll-lve
-- Versione PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ks2lrdkn_ale`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ente`
--

CREATE TABLE `ente` (
  `id_ente` int(11) NOT NULL,
  `telefono` text NOT NULL,
  `nomeEnte` text NOT NULL,
  `codfis` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `rapplegale` varchar(255) NOT NULL,
  `cod` varchar(255) NOT NULL,
  `web` text NOT NULL,
  `email` text NOT NULL,
  `pec` text NOT NULL,
  `fax` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `ente`
--

INSERT INTO `ente` (`id_ente`, `telefono`, `nomeEnte`, `codfis`, `tipo`, `rapplegale`, `cod`, `web`, `email`, `pec`, `fax`) VALUES
(2, '231', 'comune vigonza', '', 'istituzione', 'franco', '', 'www.ilmiositoweb.it', 'acchebbello@timando.it', 'acchebbello@timando.it', '32423523523'),
(3, '324324', 'proloco padova', 'dslkfjdfjkjlkjlk', '', 'Marco Andrea', '234', 'www.totboobobo.it', 'ciao@gmail.com', 'ciao@gmail.com', '234324');

-- --------------------------------------------------------

--
-- Struttura della tabella `enteprogetto`
--

CREATE TABLE `enteprogetto` (
  `id_enteprogetto` int(255) NOT NULL,
  `id_ente` int(255) NOT NULL,
  `id_progetto` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `id_progetto` int(11) NOT NULL,
  `nomecognome` text NOT NULL,
  `cf` text NOT NULL,
  `numpermessi` text NOT NULL,
  `numpermessiusu` text NOT NULL,
  `perdonazsang` text NOT NULL,
  `perdonazsangusu` text NOT NULL,
  `perstudio` text NOT NULL,
  `perstudiousu` text NOT NULL,
  `giornimalatt` text NOT NULL,
  `giornimalattusu` text NOT NULL,
  `malattnonretrib` text NOT NULL,
  `malattnonretribusu` text NOT NULL,
  `assenzaperservizio` text NOT NULL,
  `assenzaperserviziousu` text NOT NULL,
  `numgiornilutto` text NOT NULL,
  `numgiorniluttousu` text NOT NULL,
  `maternita` date NOT NULL,
  `infortunio` text NOT NULL,
  `IBAN` text NOT NULL,
  `compensomensile` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `presenza`
--

INSERT INTO `presenza` (`id_presenza`, `dataOraInizio`, `dataOraFine`, `isApprovata`, `id_volontario`, `id_progetto`, `nomecognome`, `cf`, `numpermessi`, `numpermessiusu`, `perdonazsang`, `perdonazsangusu`, `perstudio`, `perstudiousu`, `giornimalatt`, `giornimalattusu`, `malattnonretrib`, `malattnonretribusu`, `assenzaperservizio`, `assenzaperserviziousu`, `numgiornilutto`, `numgiorniluttousu`, `maternita`, `infortunio`, `IBAN`, `compensomensile`) VALUES
(1, '2018-01-01 00:00:00', '2018-01-01 00:00:00', 0, 1, 2, 'Marco Rossi', 'sfaaf', '1', '1', '', '', '', '', '', '', '1', '1', '', '', '', '', '2018-01-01', '', '', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `progetto`
--

CREATE TABLE `progetto` (
  `id_progetto` int(11) NOT NULL,
  `titolo` text NOT NULL,
  `id_ente` text NOT NULL,
  `annobando` text NOT NULL,
  `settoreprevalente` text NOT NULL,
  `altrosettore` text NOT NULL,
  `sedidiattuazione` text NOT NULL,
  `numerovolontari` text NOT NULL,
  `numgiornidiservizio` text NOT NULL,
  `nhorestettiman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `progetto`
--

INSERT INTO `progetto` (`id_progetto`, `titolo`, `id_ente`, `annobando`, `settoreprevalente`, `altrosettore`, `sedidiattuazione`, `numerovolontari`, `numgiornidiservizio`, `nhorestettiman`) VALUES
(2, 'Progetto10', '2', '2018', 'Assistenza e servizio sociale', '', '1', '0', '0', '0');

-- --------------------------------------------------------

--
-- Struttura della tabella `sede`
--

CREATE TABLE `sede` (
  `id_sede` int(11) NOT NULL,
  `id_ente` int(11) NOT NULL,
  `indirizzo` text NOT NULL,
  `denominazione` text NOT NULL,
  `numvolontari` int(99) NOT NULL,
  `provincia` text NOT NULL,
  `comune` text NOT NULL,
  `numcivico` text NOT NULL,
  `capsede` text NOT NULL,
  `telefono` text NOT NULL,
  `fax` text NOT NULL,
  `titologiuridico` text NOT NULL,
  `sitoweb` text NOT NULL,
  `emailordinaria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `sede`
--

INSERT INTO `sede` (`id_sede`, `id_ente`, `indirizzo`, `denominazione`, `numvolontari`, `provincia`, `comune`, `numcivico`, `capsede`, `telefono`, `fax`, `titologiuridico`, `sitoweb`, `emailordinaria`) VALUES
(1, 2, 'via 1 sede', 'Sede 1', 3, 'padova', 'padoca', '12', '30179', '', 'Atto di affido', 'Atto di affido', '', 'a@bello.it'),
(2, 2, '', 'SEDE222', 2, 'venezia', 'venezia', '22', '', '', 'Atto di affido', 'Atto di affido', '', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `sedeente`
--

CREATE TABLE `sedeente` (
  `id_sedeioprogetto` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `id_progetto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `sediprogetti`
--

CREATE TABLE `sediprogetti` (
  `id_sedeprogetto` int(255) NOT NULL,
  `id_sede` int(255) NOT NULL,
  `id_progetto` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id_utente` int(11) NOT NULL,
  `user` text NOT NULL,
  `password` text NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id_utente`, `user`, `password`, `isAdmin`) VALUES
(3, 'regione', '123', 1),
(4, 'enteprova', '123', 0),
(5, 'comunevigonza', '123', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `volontario`
--

CREATE TABLE `volontario` (
  `id_volontario` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cognome` text NOT NULL,
  `codFiscale` text NOT NULL,
  `sesso` text NOT NULL,
  `titolodistudio` text NOT NULL,
  `stato` text NOT NULL,
  `giornidiservizio` text NOT NULL,
  `nomeolp` text NOT NULL,
  `cognomeolp` text NOT NULL,
  `codiceiban` text NOT NULL,
  `provincianazionenascita` text NOT NULL,
  `esteronasc` tinyint(1) NOT NULL,
  `comuneesteronascita` text NOT NULL,
  `provincianazioneresidenza` text NOT NULL,
  `esterores` tinyint(1) NOT NULL,
  `comuneesteroresidenta` text NOT NULL,
  `indirizzoresidenza` text NOT NULL,
  `numcivicoresidenza` text NOT NULL,
  `capresidenza` text NOT NULL,
  `provinciadomicilio` text NOT NULL,
  `comunedomicilio` text NOT NULL,
  `indirizzodomicilio` text NOT NULL,
  `id_sedeprogetto` int(255) NOT NULL,
  `numcivicodomic` text NOT NULL,
  `capdomic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `volontario`
--

INSERT INTO `volontario` (`id_volontario`, `nome`, `cognome`, `codFiscale`, `sesso`, `titolodistudio`, `stato`, `giornidiservizio`, `nomeolp`, `cognomeolp`, `codiceiban`, `provincianazionenascita`, `esteronasc`, `comuneesteronascita`, `provincianazioneresidenza`, `esterores`, `comuneesteroresidenta`, `indirizzoresidenza`, `numcivicoresidenza`, `capresidenza`, `provinciadomicilio`, `comunedomicilio`, `indirizzodomicilio`, `id_sedeprogetto`, `numcivicodomic`, `capdomic`) VALUES
(1, 'Marco', 'Rossi', 'sfaaf', 'M', '', '', '0', '', '', '', '', -1, '', '', -1, '', '', '', '', '-', '', '', -1, '', '');

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
-- Indici per le tabelle `enteprogetto`
--
ALTER TABLE `enteprogetto`
  ADD PRIMARY KEY (`id_enteprogetto`),
  ADD KEY `id_ente` (`id_ente`),
  ADD KEY `id_progetto` (`id_progetto`);

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
-- Indici per le tabelle `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id_sede`);

--
-- Indici per le tabelle `sedeente`
--
ALTER TABLE `sedeente`
  ADD PRIMARY KEY (`id_sedeioprogetto`),
  ADD KEY `id_sede` (`id_sede`);

--
-- Indici per le tabelle `sediprogetti`
--
ALTER TABLE `sediprogetti`
  ADD PRIMARY KEY (`id_sedeprogetto`),
  ADD KEY `id_sede` (`id_sede`),
  ADD KEY `id_progetto` (`id_progetto`);

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
  MODIFY `id_ente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `presenza`
--
ALTER TABLE `presenza`
  MODIFY `id_presenza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `progetto`
--
ALTER TABLE `progetto`
  MODIFY `id_progetto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `sede`
--
ALTER TABLE `sede`
  MODIFY `id_sede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `volontario`
--
ALTER TABLE `volontario`
  MODIFY `id_volontario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `volontarioprogetto`
--
ALTER TABLE `volontarioprogetto`
  MODIFY `id_volontarioprogetto` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT per la tabella `sediprogetti`
--
ALTER TABLE `sediprogetti`
  MODIFY `id_sedeprogetto` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;
  
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `sedeente`
--
ALTER TABLE `sedeente`
  ADD CONSTRAINT `sedeente_ibfk_1` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id_sede`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
