-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Mrz 2022 um 11:56
-- Server-Version: 10.4.22-MariaDB
-- PHP-Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `be15_cr10_peter_biglibrary`
--
CREATE DATABASE IF NOT EXISTS `be15_cr10_peter_biglibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be15_cr10_peter_biglibrary`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `data`
--

CREATE TABLE `data` (
  `ISBN-13` varchar(14) NOT NULL,
  `type` varchar(4) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author_first_name` varchar(25) NOT NULL,
  `author_last_name` varchar(30) NOT NULL,
  `publisher_name` varchar(30) NOT NULL,
  `publisher_address` varchar(40) NOT NULL,
  `publish_date` date NOT NULL,
  `short_description` varchar(500) NOT NULL,
  `image` varchar(40) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `data`
--

INSERT INTO `data` (`ISBN-13`, `type`, `title`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `short_description`, `image`, `available`) VALUES
('9783038820000', 'DVD', 'Cube', 'Natali', 'Vincenzo', 'WVG Medien GmbH', 'Neumühlen 17ö D-22763 Hamburg', '2020-01-31', 'Eine Gruppe von Fremden, darunter der impulsive Ex-Cop Quentin, der depressive Intellektuelle Worth, eine zu hysterischen Ausbrüchen neigende Ärztin, eine junge Mathematikerin und ein scheinbar hilfloser Autist, erwachen nach kurzer Bewusstlosigkeit in einem würfelförmigen Raum. Keiner von ihnen hat eine Ahnung, wie er dort hingekommen ist.Auf ihrer panischen Suche nach einem Ausgang stoßen dieAhnungslosen auf ein Labyrinth weiterer quadratischer Räume, alle verbunden durch unzählige Gänge, die ', '623503a19517f.jpg', 1),
('9783038820079', 'book', 'Die Schule der Diktatoren: Eine Komödie in neun Bi', 'Erich', 'Kästner', 'Atrium Verlag AG', 'Franklinstrasse 23 8050; Zürich', '2017-03-10', 'Anonyme Drahtzieher etablieren eine Zwangsherrschaft und betreiben eine Schule der Diktatoren, um so den jeweils amtierenden Staatschef nach einem Attentat jederzeit ersetzen zu können – und das Volk merkt nichts. »Dieses Buch ist ein Theaterstück und hat ein Anliegen. Das Anliegen ist älter und das Thema, leider, nicht veraltet. Es gibt chronische Aktualitäten.« (Erich Kästner)', '6234fe3267b4f.jpg', 0),
('9783038820086', 'book', 'Fabian: Die Geschichte eines Moralisten', 'Erich', 'Kästner', 'Atrium Verlag AG', 'Franklinstrasse 23 8050; Zürich', '2017-05-05', 'Dr. Jakob Fabian, Germanist und Reklametexter, lässt sich durch das Berlin der »Goldenen Zwanziger« treiben. Er wirft sich in erotische Abenteuer, trinkt mit Journalisten um die Wette und versucht, im Labyrinth der Großstadt seine Integrität und seine Ideale zu behaupten. Doch die Stadt windet sich wie in einem Fiebertraum; die junge Demokratie der Weimarer Republik wird mehr und mehr in ihren Grundfesten erschüttert. Dann lernt Fabian im Atelier einer Bildhauerin, wo sich leichte Mädchen und To', '6234fd0111908.jpg', 1),
('9783551518385', 'book', 'Wenn ich wütend bin: Zum Mitmachen und Wutabbauen', 'Nanna', 'Neßhöver', 'CARLSEN Verlag GmbH', 'Völckersstraße 14 - 20; 22765 Hamburg', '2019-06-27', 'Äffchen Wim hat einen ziemlich miesen Tag, schon morgens geht einfach alles schief. Kein Wunder, dass Wim wütend wird – und zwar so richtig. Das fühlt sich gar nicht gut an. Geht die blöde Wut denn gar nicht wieder weg? Zum Glück wohnen viele andere Tiere im Dschungel, die dieses gewaltige Gefühl sehr genau kennen und Rat wissen. ', '6234fc0f4153b.jpg', 1),
('9783551557414', 'book', 'Harry Potter und der Stein der Weisen (Bd.1)', 'J.K.', 'Rowling', 'CARLSEN Verlag GmbH', 'Völckersstraße 14 - 20; 22765 Hamburg', '2020-11-11', 'Bis zu seinem elften Geburtstag glaubt Harry, er sei ein ganz normaler Junge. Doch dann erfährt er, dass er sich an der Schule für Hexerei und Zauberei einfinden soll – denn er ist ein Zauberer! In Hogwarts stürzt Harry von einem Abenteuer ins nächste und muss gegen Bestien, Mitschüler und Fabelwesen kämpfen. Da ist es gut, dass er schon Freunde gefunden hat, die ihm im Kampf gegen die dunklen Mächte zur Seite stehen.', '6235842e0996a.jpg', 1),
('9783785746042', 'CD', 'Shining: Lesung. Ungekürzte Ausgabe', 'Stephen', 'King', 'Lübbe Audio', 'Schanzenstraße 6 – 20; 51063 Köln', '2012-05-18', 'Ein Hotel in den Bergen von Colorado. Jack Torrance, ein verkrachter Intellektueller mit Psycho-Problemen, bekommt den Job als Hausmeister, um den er sich beworben hat. Zusammen mit seiner Frau Wendy und seinem Sohn Danny reist er in den letzten Tagen des Herbstes an. Das Hotel \"Overlook\" ist ein verrufener Ort. Wer sich ihm ausliefert, verfällt ihm, wird zum ausführenden Organ aller bösen Träume und Wünsche, die sich in ihm manifestieren.\r\n', '623504aec2890.jpg', 0),
('9783855354122', 'CD', 'Interview mit dem Weihnachtsmann', 'Erich', 'Kästner', 'Atrium Verlag AG', 'Franklinstrasse 23 8050; Zürich', '2015-10-19', 'Weihnachtsgeschichten und -gedichte von Erich Kästner: ein herzerwärmendes Hörbuch rund um rauschebärtige Langfinger, geschenklose Ehemänner, das Problem der Bescherungsgerechtigkeit und die wiederkehrende Erfahrung, dass am Ende des Jahres zuverlässig eine schöne Bescherung droht. Es hatte schon wieder geklingelt. Das neunte Mal im Verlauf der letzten Stunde! Heute hatten, schien es, die Liebhaber von Klingelknöpfen Ausgang. Mürrisch trollte ich mich türwärts und öffnete. Wer, glauben Sie, stan', '6235063f46c7c.jpg', 1),
('9783855356010', 'CD', 'Pu der Bär - Hörbuch: Lesung', 'Alan Alexander', 'Milne', 'Atrium Verlag AG', 'Franklinstrasse 23 8050; Zürich', '2018-03-09', '90 Jahre ist es her, dass Pu der Bär und Christopher Robin ihre ersten Abenteuer im sagenumwobenen Hundertsechzig-Morgen-Wald erlebten. Seitdem eroberten sie die Herzen von Kindern und Erwachsenen auf der ganzen Welt. Jetzt hat Katharina Thalbach die preisgekrönte Übersetzung von Harry Rowohlt neu eingelesen: ein umwerfendes Hörerlebnis für die ganze Familie.', '62350772662bc.jpg', 0),
('9783862312627', 'CD', 'Die große Franz-Eberhofer-Box (12 CDs)', 'Rita', 'Falk', 'Der Audio Verlag', 'Hardenbergstraße 9aö 10623 Berlin', '2013-04-01', 'Es is wirklich a Mordsgaudi: Kommissar Franz Eberhofer ist verdammt komisch, ziemlich bayerisch und wahnsinnig erfolgreich. Der kauzige Franzl aus Niederkaltenkirchen ist bisher noch jedem Verbrecher auf die Schliche gekommen und hat mit seiner charmanten Brummigkeit die Herzen Tausender Fans erobert. Und mit ihm die Oma, die ihrem geliebten Franz täglich die köstlichsten Knödel und Haxn kredenzt.\r\nDie ersten drei SPIEGEL-Bestseller von Rita Falk - \"Winterkartoffelknödel\", \"Dampfnufdelblues\" und', '62350249052c9.jpg', 1),
('9783868206326', 'book', 'Die Göttliche Komödie: mit über 100 Illustrationen', 'Dante', 'Alighieri', 'Nikol Verlag', 'Barkhausenweg 11; 22339 Hamburg', '2021-08-05', 'Die Göttliche Komödie ist das Hauptwerk des italienischen Dichters Dante Alighieri. Sie entstand zwischen 1307 und 1321 und gilt als die bedeutendste Dichtung der italienischen Literatur. Die Commedia schildert die Reise Dantes durch die drei Reiche des Jenseits. Zunächst führt ihn die Reise in die die Hölle, dann zum Läuterungsberg und schließlich ins Paradies.', '6235007e19c65.jpg', 1),
('9783868206333', 'book', 'Faust I und II: Leinen mit Goldprägung', 'Johann Wolfgang', 'von Goethe', 'Nikol Verlag', 'Barkhausenweg 11; 22339 Hamburg', '2021-08-05', 'Heinrich Faust, ein angesehener Forscher und Lehrer zu Beginn der Neuzeit, zieht die Bilanz seines Lebens und kommt zu einem doppelt niederschmetternden Fazit: Als Wissenschaftler fehle es ihm an tiefer Einsicht und brauchbaren Ergebnissen, und als Mensch sei er unfähig, das Leben in seiner Fülle zu genießen. In dieser verzweifelten Lage verspricht er dem Teufel seine Seele, wenn es diesem gelingen sollte, Faust aus seiner Unzufriedenheit und Ruhelosigkeit zu befreien. Der schließt mit Faust ein', '6234ffdabfcbf.jpg', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`ISBN-13`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
