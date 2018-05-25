-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 25, 2018 alle 22:12
-- Versione del server: 10.1.30-MariaDB
-- Versione PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblio`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `biblio_prestito`
--

CREATE TABLE `biblio_prestito` (
  `PRESTCount` int(11) DEFAULT NULL,
  `COPIACont` int(11) DEFAULT NULL,
  `UTE_BIBLIO` varchar(40) DEFAULT NULL,
  `PRESTData` datetime DEFAULT NULL,
  `PRESTDataRestIpo` datetime DEFAULT NULL,
  `PRESTDataRestEff` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `biblio_prestito`
--

INSERT INTO `biblio_prestito` (`PRESTCount`, `COPIACont`, `UTE_BIBLIO`, `PRESTData`, `PRESTDataRestIpo`, `PRESTDataRestEff`) VALUES
(1, 5047, 'Alessandro Rossi                        ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1219, 'Sarte                                   ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 12952, 'MICHELE                                 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 6939, 'Diego                                   ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 7579, 'Gianni                                  ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 7070, 'Diego Test                              ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `biblio_rappr`
--

CREATE TABLE `biblio_rappr` (
  `RAPPRCont` int(11) NOT NULL,
  `RAPPRCognome` varchar(30) NOT NULL,
  `RAPPRNome` varchar(20) DEFAULT NULL,
  `RAPPRTelUff` varchar(30) DEFAULT NULL,
  `RAPPRTelAbitazione` varchar(30) DEFAULT NULL,
  `RAPPRFax` varchar(30) DEFAULT NULL,
  `RAPPREmail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `biblio_rappr`
--

INSERT INTO `biblio_rappr` (`RAPPRCont`, `RAPPRCognome`, `RAPPRNome`, `RAPPRTelUff`, `RAPPRTelAbitazione`, `RAPPRFax`, `RAPPREmail`) VALUES
(1, 'ENNEDIE S.r.l.                ', '', '045-6702070                   ', '', '045-6702070                   ', ''),
(4, 'Amadio                        ', 'Roberto             ', '045-8100833                   ', '', '045-8100833                   ', ''),
(5, 'Floridia                      ', 'Gaspare             ', '045-591118                    ', '', '045-591118                    ', ''),
(6, 'LADISA LIBRI S.r.l.           ', '', '049-8713174                   ', '', '049-8722755                   ', ''),
(7, 'Tenca                         ', 'Giancarlo           ', '045-567733                    ', '', '045-567733                    ', ''),
(8, 'AGENZIA LIBRARIA LA.BO. S.n.c.', '', '045-577044                    ', '', '045-8100862                   ', ''),
(10, 'Beghelli                      ', 'Andrea              ', '045-533000                    ', '', '045-533000                    ', ''),
(20, 'Pinto                         ', 'Giovanni            ', '045-572101                    ', '', '045-572101                    ', ''),
(21, 'Leiter                        ', 'Umberto             ', '045-916939                    ', '', '045-916939                    ', ''),
(22, 'TREGNAGHI S.a.s.              ', '', '045-75136                     ', '', '045-7513622                   ', ''),
(26, 'EMMEDUE S.n.c.                ', '', '045-81033                     ', '', '045-8198997                   ', ''),
(27, 'Moneta                        ', 'Rinaldo             ', '049-691234                    ', '', '049-691234                    ', ''),
(28, 'AGENZIA EDITORIALE ATENA      ', '', '045-7514740                   ', '', '045-7514694                   ', ''),
(29, 'PROMOLIBRI S.n.c.             ', '', '045-8201834                   ', '', '045-8203346                   ', ''),
(30, 'BONOMO LIBRI                  ', '', '045-7513800                   ', '', '045-7514390                   ', ''),
(32, 'LIBRI & LIBRI S.r.l.          ', '', '045-8201834                   ', '', '045-8203346                   ', ''),
(35, 'G. & T. SCUOLA                ', '', '045-581890                    ', '', '045-581866                    ', ''),
(37, 'A. BEOZZO & C. S.a.s.         ', '', '', '', '045-942525                    ', ''),
(38, 'NALESSO S.n.c.                ', '', '045-8342661                   ', '', '045-8342661                   ', ''),
(41, 'Cristiani                     ', 'Luciano             ', '045-8207329                   ', '', '', ''),
(43, 'Tacconi                       ', 'Luciano             ', '045-575184                    ', '', '045-575184                    ', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `biblio_tipomat`
--

CREATE TABLE `biblio_tipomat` (
  `TIPOMATCont` int(11) NOT NULL,
  `TIPOMATDescrizione` varchar(50) NOT NULL,
  `msrepl_tran_version` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `biblio_tipomat`
--

INSERT INTO `biblio_tipomat` (`TIPOMATCont`, `TIPOMATDescrizione`, `msrepl_tran_version`) VALUES
(1, 'Libro                                             ', '{185B977F-A2B2-4A7A-835D-0CFC9E3E515F}'),
(2, 'Fotocopie                                         ', '{DFF93100-3862-4792-B071-7717B3B30D4A}'),
(3, 'Dizionario                                        ', '{1B8AE0A5-F8F9-42E4-85BF-B473F6C4D797}'),
(4, 'Rivista                                           ', '{CD9A47A2-8EDB-458C-9609-7748AB75AD4A}'),
(5, 'CD-ROM                                            ', '{F05A5043-5BCB-44A4-93E3-EFB31EDB4F45}'),
(6, 'Dispensa                                          ', '{153D2EC8-F692-4EDA-8C29-2CFC28433D9D}'),
(7, 'Altro                                             ', '{B6F0C3F6-3A0B-4559-87A5-242D32AA4924}'),
(8, 'DVD                                               ', '{B6F0C3F6-3A0B-4559-87A5-242D32AA4924}');

-- --------------------------------------------------------

--
-- Struttura della tabella `biblio_ute_biblio`
--

CREATE TABLE `biblio_ute_biblio` (
  `UTE_BIBLIOCodice` varchar(10) NOT NULL,
  `UTE_BIBLIONome` varchar(50) NOT NULL,
  `UTE_BIBLIOTipo` varchar(1) NOT NULL,
  `UTE_BIBLIOAltro` varchar(10) NOT NULL,
  `msrepl_tran_version` decimal(50,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `biblio_rappr`
--
ALTER TABLE `biblio_rappr`
  ADD PRIMARY KEY (`RAPPRCont`);

--
-- Indici per le tabelle `biblio_tipomat`
--
ALTER TABLE `biblio_tipomat`
  ADD PRIMARY KEY (`TIPOMATCont`);

--
-- Indici per le tabelle `biblio_ute_biblio`
--
ALTER TABLE `biblio_ute_biblio`
  ADD PRIMARY KEY (`UTE_BIBLIOCodice`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `biblio_rappr`
--
ALTER TABLE `biblio_rappr`
  MODIFY `RAPPRCont` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
