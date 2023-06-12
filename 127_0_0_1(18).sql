-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 05. čen 2023, 20:41
-- Verze serveru: 10.4.27-MariaDB
-- Verze PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `tomichovacsf0399`
--
CREATE DATABASE IF NOT EXISTS `tomichovacsf0399` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tomichovacsf0399`;

-- --------------------------------------------------------

--
-- Struktura tabulky `film`
--

CREATE TABLE `film` (
  `id_f` int(11) NOT NULL,
  `nazev` varchar(50) NOT NULL,
  `delka` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `poster` varchar(50) NOT NULL,
  `popis` text NOT NULL,
  `rok_vydani` int(11) NOT NULL,
  `zanry` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`zanry`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `film`
--

INSERT INTO `film` (`id_f`, `nazev`, `delka`, `slug`, `poster`, `popis`, `rok_vydani`, `zanry`) VALUES
(13, 'fsdfssd', 9562, '9562145-fsdfssd', '647cdded28e60.png', 'qqe', 145, '[\"Akcni\"]'),
(14, 'fsdfssd', 9562, '9562145-fsdfssd', '647ce11a73c9a.png', 'qqe', 145, '[\"Akcni\"]'),
(15, 'fsdfssd', 9562, '9562145-fsdfssd', '647ce170f1cfe.png', 'qqe', 145, '[\"Akcni\"]'),
(16, 'fsdfssd', 9562, '9562145-fsdfssd', '647ce17bdaf58.png', 'qqe', 145, '[\"Akcni\"]'),
(17, 'fsdfssd', 9562, '9562145-fsdfssd', '647ce1ad5c77e.png', 'qqe', 145, '[\"Akcni\"]'),
(18, 'sadas', 512, '512543-sadas', '647ce1f880317.jpg', 'sadf', 543, '[\"das\"]'),
(19, 'sadas', 512, '512543-sadas', '647ce24083ce8.jpg', 'sadf', 543, '[\"das\"]'),
(21, 'King Kong ', 101, '1011933-king-kong-', '647cf5706c2db.jpg', 'Měl to být osmý div světa. Ale utrhl se z řetězů. Slavné filmové monstrum, obří opičí samec King Kong, vzbuzuje úžas filmových diváků už od roku 1933. Právě první verze jeho příběhu se stala nezapomenutelnou legendou, a to navzdory dvěma velkorozpočtovým remakům z let 1976 a 2005. Film vypráví příběh režiséra Carla Denhama, který se najatou lodí vydá na tajuplný ostrov, aby tam s nic netušící herečkou Ann Darrowovou natočil dobrodružný příběh na motivy pohádky Kráska a zvíře. V ostrovní džungli se totiž nacházejí desítky prehistorických tvorů. Mezi nimi i obří gorila, zvaná Kong. Domorodci, kteří drží zvířata za obrovskou starobylou zdí, herečku unesou a obětují ji Kongovi. Štáb ji však z opičákových spárů po dlouhém boji zachrání. Podaří se mu dokonce Konga omámit a převézt do New Yorku. Tam však začíná druhá část strhujícího dramatu: Denhamova nová atrakce se totiž utrhne z řetězů a rozpoutá v ulicích peklo', 1933, '[\"Dobrodružný\",\"Fantasy\",\"Horor\"]'),
(22, 'King Kong ', 102, '1021933-king-kong-', '647cf5cde8398.jpg', 'Měl to být osmý div světa. Ale utrhl se z řetězů. Slavné filmové monstrum, obří opičí samec King Kong, vzbuzuje úžas filmových diváků už od roku 1933. Právě první verze jeho příběhu se stala nezapomenutelnou legendou, a to navzdory dvěma velkorozpočtovým remakům z let 1976 a 2005. Film vypráví příběh režiséra Carla Denhama, který se najatou lodí vydá na tajuplný ostrov, aby tam s nic netušící herečkou Ann Darrowovou natočil dobrodružný příběh na motivy pohádky Kráska a zvíře. V ostrovní džungli se totiž nacházejí desítky prehistorických tvorů. Mezi nimi i obří gorila, zvaná Kong. Domorodci, kteří drží zvířata za obrovskou starobylou zdí, herečku unesou a obětují ji Kongovi. Štáb ji však z opičákových spárů po dlouhém boji zachrání. Podaří se mu dokonce Konga omámit a převézt do New Yorku. Tam však začíná druhá část strhujícího dramatu: Denhamova nová atrakce se totiž utrhne z řetězů a rozpoutá v ulicích peklo.', 1933, '[\"Dobrodružný\",\"Fantasy\",\"Horor\"]'),
(23, '1', 1, '11-1', '647e07ca39a8c.jpg', '1', 1, '[\"1\"]'),
(24, '1', 2, '21-1', '647e08462dc63.jpg', '1', 1, '[\"1\"]'),
(25, '1', 3, '31-1', '647e086f7c3b0.jpg', '1', 1, '[\"1\"]'),
(26, '1', 4, '41-1', '647e08a601e6b.jpg', '1', 1, '[\"1\"]'),
(27, '1', 1, '51-1', '647e090a338d4.jpg', '1', 1, '[\"1\"]');

-- --------------------------------------------------------

--
-- Struktura tabulky `recenze`
--

CREATE TABLE `recenze` (
  `id_r` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `id_f` int(11) NOT NULL,
  `hodnoceni` int(11) NOT NULL,
  `datum` text NOT NULL ,
  `obsah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `recenze`
--

INSERT INTO `recenze` (`id_r`, `id_u`, `id_f`, `hodnoceni`, `datum`, `obsah`) VALUES
(1, 1, 22, 2, '2023-06-04', 'Na ten rok vzniku je spracovanie filmu v niektorých oblastiach na vyššej úrovni, než to čo nám ponúkajú filmári pri dnešných možnostiach v tomto priemysle v poslednej dobe. Možno príbeho je to klasická miestamy až jednoduchá osnova, čo poznáme hlavne vďaka remaku z 1976, čo beriem ako vrchol v spracovaní legendárneho Konga ale ak opomeniem tie dialógy tak tento Kong je podívaná na úrovni, kde nie je hlavne núdza o nápadité triky aj keď jednoduché ale tam je potom vidieť aj tá skutočná zručnosť tvorcov. ║Rozpočet $670,000║Tržby USA $1,700,000║Tržby Celosvetovo $-║ '),
(2, 2, 22, 3, '2023-06-04', 'Ani více než sedm dekád nedokázalo jedinečnému testamentu starého Hollywoodu, v němž vládlo tajemno, fantazie, křehké krásky, neohrožení hrdinové a děsivá monstra, ubrat na síle. Zejména vizuální stránka je šokujícím způsobem nadčasová a určitý punc naivity už se stal pevnou sučástí poetiky filmu. Nejen z efektů však King Kong živ jest – jsou to i výborné scény na lodi, které rozdmýchávají horečnaté očekávání událostí mistrovským způsobem, a to za světla dne (především kamerové zkoušky Ann Darrow). Samotný Kong působí oproti předchozím verzím mnohem brutálnějším a animálnějším dojmem, přičemž kráska v nesnázích samosebou nepojme nejmenší dávku sentimentu k jeho osudu. Její neustálý hysterický křiky, provázený řevem monstra, je až nesnesitelně afektovaný, ale k téhle verzi prostě patří. Sympatie k obří opici jsou především druhotným produktem diváků, kteří si chlupatého obra zamilovali a dali mu více lidského než jeho stvořitelé. Ochutnávka filmového řemesla starého střihu ve své nejsolidnější podobě, to je King Kong. Film plný skvělé atmosféry a pastva pro oko, které nachází zalíbení v černobílé estetice 30. let. '),
(3, 3, 22, 1, '2023-06-04', 'Pravděpodobně ten největší monster-movie, jaký kdy byl natočen. Klasika, která patří do dnes již zapomenutého LOST WORLD žánru, který byl v době světové ekonomické krize nesmírně oblíbený a který byl popularizován filmovými přepisy románu A.C.Doyla, E.R. Burroughse, J.Vernea atd. Tyhle filmy měly jedno společné - pevně ohraničené území s prehistorickými zvířaty, nebo téměř zaniklými civilizacemi. Ve 20.a 30.letech se tyhle filmy točily jak na běžícím pásu, byly plné trikových sekvencí a King Kong byl jejich král. Ve své době to byl vskutku technický zázrak, jehož některé trikové scény dodnes vypadají skvěle. První dvě třetiny jde vpodstatě o takový Jurský park na malém ostrově uprostřed Pacifiku, s mnoha pravěkými ještěry, mezi které se jakoby nedopatřením přimotal přerostlý lidoop z dob mnohem pozdějších. Když pominu takové lapsusy dané dobou, jakože z neškodného býložravce brontosaura udělali tvůrci filmu krvežíznivou bestii, nemohu nevzpomenout takové lahůdky, jako byl třeba souboj King Konga s tyranosaurem, dokonalá to ukázka stop-motion animace té doby. A na posledních 15 minut - řádícího King Konga v New Yorku - je radost se dívat i dnes, což potom v roce 1933, to musela být naprostá bomba! Dokonce se odvážím říct, že mnohé triky v King Kongovi vypadají lépe, než u monster-filmů v 50. a 60. letech. Škoda, že se dnes již takovéto lahůdky vůbec nevysílají.... '),
(6, 0, 22, 0, '2023-06-05', '1'),
(7, 0, 22, 0, '2023-06-05', '1'),
(8, 0, 22, 1, '2023-06-05', 'a'),
(9, 0, 22, 1, '2023-06-05', 'aadasdasdawdasdafgsdfgdsfgfsdgdfsgdfsgdfsgdfsgdfgdfsgdfgfdgfdgdfgdfsgdfsgdfsgdfsgdfsgdfsgfsdgdfsgdf'),
(10, 1, 22, 2, '2023-06-05', 'dasdasdasdasd'),
(11, 10, 13, 1, '2023-06-05', 'dasdasd'),
(14, 10, 13, 1, '2023-06-05', 'dadadasd');

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatel`
--

CREATE TABLE `uzivatel` (
  `id_u` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `prezdivka` varchar(30) NOT NULL,
  `heslo` varchar(100) NOT NULL,
  `role` set('uzivatel','admin') NOT NULL DEFAULT 'uzivatel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `uzivatel`
--

INSERT INTO `uzivatel` (`id_u`, `email`, `prezdivka`, `heslo`, `role`) VALUES
(0, 'Anonyme', 'Anonyme', 'Anonyme', 'uzivatel'),
(1, 'heslo@heslo.cz', 'heslo', '$2y$10$lmmlGpyGRUxCwWoqSZ5nBuQLXAt3CK6m/glvlrTwU1MTNeTSZzL.u', 'uzivatel'),
(2, 'as', '152', 'das', 'uzivatel'),
(3, 'aa', 'lima', 'a', 'uzivatel'),
(9, 'a@a.cz', 'a', '$2y$10$MG25WR1fm4CyHv/Tf7pJt.gjkNWxcFWsf9vZ3mz5QZBCJ2.nbfUfa', 'uzivatel'),
(10, 'admin@admin.cz', 'admin', '$2y$10$WJpko0zllTExdX2egT9tVuMl3jFC8EakDb1/ILk7zubR5ncNEy/.e', 'admin');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_f`);

--
-- Indexy pro tabulku `recenze`
--
ALTER TABLE `recenze`
  ADD PRIMARY KEY (`id_r`),
  ADD KEY `recenze_film_id_f_fk` (`id_f`),
  ADD KEY `recenze_uzivatel_id_u_fk` (`id_u`);

--
-- Indexy pro tabulku `uzivatel`
--
ALTER TABLE `uzivatel`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `film`
--
ALTER TABLE `film`
  MODIFY `id_f` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pro tabulku `recenze`
--
ALTER TABLE `recenze`
  MODIFY `id_r` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pro tabulku `uzivatel`
--
ALTER TABLE `uzivatel`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `recenze`
--
ALTER TABLE `recenze`
  ADD CONSTRAINT `recenze_film_id_f_fk` FOREIGN KEY (`id_f`) REFERENCES `film` (`id_f`) ON DELETE CASCADE,
  ADD CONSTRAINT `recenze_uzivatel_id_u_fk` FOREIGN KEY (`id_u`) REFERENCES `uzivatel` (`id_u`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
