-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Cze 2018, 03:55
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wideo`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `baza_filmy`
--

CREATE TABLE `baza_filmy` (
  `ID` int(11) NOT NULL,
  `Nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `Cena42` int(11) NOT NULL,
  `Opis` text COLLATE utf8_polish_ci NOT NULL,
  `Data_premiery` date NOT NULL,
  `Data_dodania` date NOT NULL,
  `Kategoria` int(11) NOT NULL,
  `Reżyser` text COLLATE utf8_polish_ci NOT NULL,
  `Aktorzy` text COLLATE utf8_polish_ci NOT NULL,
  `Restrykcja_wiekowa` int(10) NOT NULL,
  `Ilosc_kaset` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `baza_filmy`
--

INSERT INTO `baza_filmy` (`ID`, `Nazwa`, `Cena42`, `Opis`, `Data_premiery`, `Data_dodania`, `Kategoria`, `Reżyser`, `Aktorzy`, `Restrykcja_wiekowa`, `Ilosc_kaset`) VALUES
(1, 'Strażnicy Galaktyki', 30, 'Zuchwały awanturnik Peter Quill kradnie tajemniczy artefakt stanowiący obiekt pożądania złego i potężnego Ronana, którego ambicje zagrażają całemu wszechświatowi. Chcąc uniknąć gniewu Ronana, Quill zmuszony jest zawrzeć niewygodny sojusz z czterema niemającymi nic do stracenia outsiderami: Rocketem – uzbrojonym szopem, Grootem – drzewokształtnym humanoidem, śmiertelnie niebezpieczną.', '2014-07-21', '2018-06-12', 1, 'James Gunn', 'Chris Pratt, Zoe Saldana, Dave Bautista, Vin Diesel, Bradley Cooper, Lee Pace, Michael Rooker, Karen Gillan', 13, 20),
(2, 'Captain America', 35, 'Kapitan Ameryka (właściwie Steve Rogers) to pierwsza postać stworzona przez Marvel Comics. Steve przed wojną był studentem sztuki, który w 1940 roku postanowił zaciągnąć się do wojska. Nie został przyjęty z powodu słabego zdrowia, ale dostał propozycję uczestniczenia w tajnym eksperymencie. Został poddany terapii, która zwiększyła jego inteligencję i siłę.', '2011-07-19', '2018-06-12', 1, 'Joe Johnston', 'Chris Evans, Tommy Lee Jones, Hugo Weaving, Hayley Atwell, Sebastian Stan, , Toby Jones, Stanley Tucci', 13, 30),
(3, 'Iron Man', 40, '\"Iron Man\" to historia miliardera, przemysłowca i genialnego wynalazcy Tony’ego Starka (Robert Downey Jr.), szefa Stark Industries, głównego dostawcy broni dla rządu USA. Beztroski styl życia Tony’ego zmienia się na zawsze, kiedy po testach przeprowadzanych z nową bronią jego konwój zostaje zaatakowany, a on sam porwany przez rebeliantów. Ranny od pocisku, który utkwił w pobliżu serca.', '2008-04-14', '2018-06-12', 1, 'Jon Favreau', 'Robert Downey Jr., Terrence Howard, Jeff Bridges, Gwyneth Paltrow, Leslie Bibb, Shaun Toub, Faran Tahir, Sayed Badreya', 13, 35),
(4, 'Kapitan Ameryka', 45, 'Marvel Studios, wytwórnia stojąca za sukcesem takich hitów jak \"Avengers\" i \"Iron Man 3\", przedstawia film \"Kapitan Ameryka: Zimowy żołnierz\". Kapitan Ameryka zostaje wplątany w sieć zagrażającej całemu światu intrygi. By ujawnić spisek, superbohater łączy siły z Czarną Wdową (Scarlett Johansson). Kiedy już wreszcie kryzys wydaje się być zażegnany, niespodziewanie pojawia się nowy.', '2014-03-13', '2018-06-12', 1, 'Anthony Russo, Joe Russo', 'Chris Evans, Samuel L. Jackson, Scarlett Johansson, Robert Redford, Sebastian Stan, Anthony Mackie, Cobie Smulders, Frank Grillo', 13, 20),
(5, 'Spider-Man', 40, 'Przeciętny nastolatek, Peter Parker (Tobey Maguire) przeistacza się w superbohatera pod wpływem ukąszenia przez radioaktywnego pająka. Kiedy jego ukochany wuj zostaje brutalnie zamordowany przez włamywaczy, Peter przysięga sobie, że użyje swoich niezwykłych sił, aby pomścić jego śmierć. Znany odtąd jako \"Spider-Man\", Peter rozpoczyna walkę ze zbrodnią, co prowadzi do nieuchronnego konfliktu.', '2002-04-30', '2018-06-12', 1, 'Sam Raimi', 'Tobey Maguire, Willem Dafoe, Kirsten Dunst, James Franco, J.K. Simmons, 	Rosemary Harris, Cliff Robertson, Joe Manganiello', 13, 28),
(6, 'Incredible Hulk', 35, '\"Incredible Hulk\" to rewelacyjna ekranizacja kultowej opowieści o jednym z najpopularniejszych superbohaterów. Od czasu przypadkowego napromieniowania naukowiec Bruce Banner (Edward Norton) szuka lekarstwa, które pozwoli mu uwolnić się od niezwykłego stanu, w jaki wpada pod wpływem silnego stresu. W takich chwilach Banner zmienia się bowiem w olbrzymiego zielonego mutanta - Hulka.', '2008-06-06', '2018-06-12', 1, 'Louis Leterrier', 'Edward Norton, Liv Tyler, Tim Roth, William Hurt, Tim Blake Nelson, Ty Burrell, Christina Cabot, Peter Mensah', 13, 40),
(7, 'X-Men: Pierwsza klasa', 30, 'Widowiskowy film akcji, ukazujący początki epickiej sagi X-Men. Zanim Charles Xavier (James McAvoy) i Erik Lensherr (Michael Fassbender) przybrali imiona Profesor X i Magneto, byli młodymi ludźmi, którzy odkryli w sobie niezwykłe moce. Nim zostali zaciętymi wrogami, byli bliskimi przyjaciółmi, którzy połączyli swe siły z innymi Mutantami, aby zapobiec największemu zagrożeniu.', '2011-05-25', '2018-06-12', 1, 'Matthew Vaughn', 'James McAvoy, Michael Fassbender, Rose Byrne, Jennifer Lawrence, Kevin Bacon, January Jones, Nicholas Hoult, Oliver Platt', 13, 40),
(8, 'Niesamowity Spider-Man', 25, 'Nowa obsada, nowy reżyser, nowa historia. Czy zupełnie nowe podejście do najbardziej kasowego komiksu wszech czasów się powiedzie? Jak widać na przykładzie serii o Bondzie, odświeżenie tematu może okazać się wielkim sukcesem. Peter Parker tym razem uczy się jeszcze w liceum. Musi pogodzić się z tym, kim się stał, i wybaczyć sobie śmierć wuja, którego – tak mu się wydaje – mógł uratować.', '2012-06-13', '2018-06-12', 1, 'Marc Webb', 'Andrew Garfield, Emma Stone, Rhys Ifans, Denis Leary, Martin Sheen, Sally Field, Irrfan Khan, Campbell Scott', 13, 50),
(9, 'Wolverine', 20, 'Hugh Jackman ponownie w roli tajemniczego, obdarzonego niezwykłą mocą Wolverine’a, który wyrusza do współczesnej Japonii. Stawia tam czoła nie tylko obcej kulturze, lecz także śmiertelnie groźnym wrogom, którzy gotowi są na wszystko, by go zniszczyć.  Wolverine odkryje swoje słabości, zyskując przy tym siłę, o której dotąd mógł tylko marzyć, a jego los zmieni się na zawsze…', '2013-07-16', '2018-06-12', 1, 'James Mangold', 'Hugh Jackman, Tao Okamoto, Rila Fukushima, Hiroyuki Sanada, 	Swietłana Chodczenkowa, Brian Tee, Hal Yamanouchi, Will Yun Lee', 13, 25),
(10, 'Strażnicy Galaktyki', 35, 'Zuchwały awanturnik Peter Quill kradnie tajemniczy artefakt stanowiący obiekt pożądania złego i potężnego Ronana, którego ambicje zagrażają całemu wszechświatowi. Chcąc uniknąć gniewu Ronana, Quill zmuszony jest zawrzeć niewygodny sojusz z czterema niemającymi nic do stracenia outsiderami: Rocketem – uzbrojonym szopem, Grootem – drzewokształtnym humanoidem, śmiertelnie niebezpieczną.', '2014-07-21', '2018-06-12', 2, 'James Gunn', 'Chris Pratt, Zoe Saldana, Dave Bautista, Vin Diesel, Bradley Cooper, Lee Pace, Michael Rooker, Karen Gillan', 13, 20),
(11, 'Captain America', 25, 'Kapitan Ameryka (właściwie Steve Rogers) to pierwsza postać stworzona przez Marvel Comics. Steve przed wojną był studentem sztuki, który w 1940 roku postanowił zaciągnąć się do wojska. Nie został przyjęty z powodu słabego zdrowia, ale dostał propozycję uczestniczenia w tajnym eksperymencie. Został poddany terapii, która zwiększyła jego inteligencję i siłę.', '2011-07-19', '2018-06-12', 2, 'Joe Johnston', 'Chris Evans, Tommy Lee Jones, Hugo Weaving, Hayley Atwell, Sebastian Stan, , Toby Jones, Stanley Tucci', 13, 30),
(12, 'Iron Man', 61, '\"Iron Man\" to historia miliardera, przemysłowca i genialnego wynalazcy Tony’ego Starka (Robert Downey Jr.), szefa Stark Industries, głównego dostawcy broni dla rządu USA. Beztroski styl życia Tony’ego zmienia się na zawsze, kiedy po testach przeprowadzanych z nową bronią jego konwój zostaje zaatakowany, a on sam porwany przez rebeliantów. Ranny od pocisku, który utkwił w pobliżu serca.', '2008-04-14', '2018-06-12', 2, 'Jon Favreau', 'Robert Downey Jr., Terrence Howard, Jeff Bridges, Gwyneth Paltrow, Leslie Bibb, Shaun Toub, Faran Tahir, Sayed Badreya', 13, 35),
(13, 'Kapitan Ameryka', 12, 'Marvel Studios, wytwórnia stojąca za sukcesem takich hitów jak \"Avengers\" i \"Iron Man 3\", przedstawia film \"Kapitan Ameryka: Zimowy żołnierz\". Kapitan Ameryka zostaje wplątany w sieć zagrażającej całemu światu intrygi. By ujawnić spisek, superbohater łączy siły z Czarną Wdową (Scarlett Johansson). Kiedy już wreszcie kryzys wydaje się być zażegnany, niespodziewanie pojawia się nowy.', '2014-03-13', '2018-06-12', 2, 'Anthony Russo, Joe Russo', 'Chris Evans, Samuel L. Jackson, Scarlett Johansson, Robert Redford, Sebastian Stan, Anthony Mackie, Cobie Smulders, Frank Grillo', 13, 20),
(14, 'Spider-Man', 62, 'Przeciętny nastolatek, Peter Parker (Tobey Maguire) przeistacza się w superbohatera pod wpływem ukąszenia przez radioaktywnego pająka. Kiedy jego ukochany wuj zostaje brutalnie zamordowany przez włamywaczy, Peter przysięga sobie, że użyje swoich niezwykłych sił, aby pomścić jego śmierć. Znany odtąd jako \"Spider-Man\", Peter rozpoczyna walkę ze zbrodnią, co prowadzi do nieuchronnego konfliktu.', '2002-04-30', '2018-06-12', 2, 'Sam Raimi', 'Tobey Maguire, Willem Dafoe, Kirsten Dunst, James Franco, J.K. Simmons, 	Rosemary Harris, Cliff Robertson, Joe Manganiello', 13, 28),
(15, 'Incredible Hulk', 21, '\"Incredible Hulk\" to rewelacyjna ekranizacja kultowej opowieści o jednym z najpopularniejszych superbohaterów. Od czasu przypadkowego napromieniowania naukowiec Bruce Banner (Edward Norton) szuka lekarstwa, które pozwoli mu uwolnić się od niezwykłego stanu, w jaki wpada pod wpływem silnego stresu. W takich chwilach Banner zmienia się bowiem w olbrzymiego zielonego mutanta - Hulka.', '2008-06-06', '2018-06-12', 2, 'Louis Leterrier', 'Edward Norton, Liv Tyler, Tim Roth, William Hurt, Tim Blake Nelson, Ty Burrell, Christina Cabot, Peter Mensah', 13, 40),
(16, 'X-Men: Pierwsza klasa', 12, 'Widowiskowy film akcji, ukazujący początki epickiej sagi X-Men. Zanim Charles Xavier (James McAvoy) i Erik Lensherr (Michael Fassbender) przybrali imiona Profesor X i Magneto, byli młodymi ludźmi, którzy odkryli w sobie niezwykłe moce. Nim zostali zaciętymi wrogami, byli bliskimi przyjaciółmi, którzy połączyli swe siły z innymi Mutantami, aby zapobiec największemu zagrożeniu.', '2011-05-25', '2018-06-12', 2, 'Matthew Vaughn', 'James McAvoy, Michael Fassbender, Rose Byrne, Jennifer Lawrence, Kevin Bacon, January Jones, Nicholas Hoult, Oliver Platt', 13, 40),
(17, 'Niesamowity Spider-Man', 52, 'Nowa obsada, nowy reżyser, nowa historia. Czy zupełnie nowe podejście do najbardziej kasowego komiksu wszech czasów się powiedzie? Jak widać na przykładzie serii o Bondzie, odświeżenie tematu może okazać się wielkim sukcesem. Peter Parker tym razem uczy się jeszcze w liceum. Musi pogodzić się z tym, kim się stał, i wybaczyć sobie śmierć wuja, którego – tak mu się wydaje – mógł uratować.', '2012-06-13', '2018-06-12', 2, 'Marc Webb', 'Andrew Garfield, Emma Stone, Rhys Ifans, Denis Leary, Martin Sheen, Sally Field, Irrfan Khan, Campbell Scott', 13, 50),
(18, 'Wolverine', 12, 'Hugh Jackman ponownie w roli tajemniczego, obdarzonego niezwykłą mocą Wolverine’a, który wyrusza do współczesnej Japonii. Stawia tam czoła nie tylko obcej kulturze, lecz także śmiertelnie groźnym wrogom, którzy gotowi są na wszystko, by go zniszczyć.  Wolverine odkryje swoje słabości, zyskując przy tym siłę, o której dotąd mógł tylko marzyć, a jego los zmieni się na zawsze…', '2013-07-16', '2018-06-12', 2, 'James Mangold', 'Hugh Jackman, Tao Okamoto, Rila Fukushima, Hiroyuki Sanada, 	Swietłana Chodczenkowa, Brian Tee, Hal Yamanouchi, Will Yun Lee', 13, 25),
(19, 'Strażnicy Galaktyki', 61, 'Zuchwały awanturnik Peter Quill kradnie tajemniczy artefakt stanowiący obiekt pożądania złego i potężnego Ronana, którego ambicje zagrażają całemu wszechświatowi. Chcąc uniknąć gniewu Ronana, Quill zmuszony jest zawrzeć niewygodny sojusz z czterema niemającymi nic do stracenia outsiderami: Rocketem – uzbrojonym szopem, Grootem – drzewokształtnym humanoidem, śmiertelnie niebezpieczną.', '2014-07-21', '2018-06-12', 3, 'James Gunn', 'Chris Pratt, Zoe Saldana, Dave Bautista, Vin Diesel, Bradley Cooper, Lee Pace, Michael Rooker, Karen Gillan', 13, 20),
(20, 'Captain America', 11, 'Kapitan Ameryka (właściwie Steve Rogers) to pierwsza postać stworzona przez Marvel Comics. Steve przed wojną był studentem sztuki, który w 1940 roku postanowił zaciągnąć się do wojska. Nie został przyjęty z powodu słabego zdrowia, ale dostał propozycję uczestniczenia w tajnym eksperymencie. Został poddany terapii, która zwiększyła jego inteligencję i siłę.', '2011-07-19', '2018-06-12', 3, 'Joe Johnston', 'Chris Evans, Tommy Lee Jones, Hugo Weaving, Hayley Atwell, Sebastian Stan, , Toby Jones, Stanley Tucci', 13, 30),
(21, 'Iron Man', 12, '\"Iron Man\" to historia miliardera, przemysłowca i genialnego wynalazcy Tony’ego Starka (Robert Downey Jr.), szefa Stark Industries, głównego dostawcy broni dla rządu USA. Beztroski styl życia Tony’ego zmienia się na zawsze, kiedy po testach przeprowadzanych z nową bronią jego konwój zostaje zaatakowany, a on sam porwany przez rebeliantów. Ranny od pocisku, który utkwił w pobliżu serca.', '2008-04-14', '2018-06-12', 3, 'Jon Favreau', 'Robert Downey Jr., Terrence Howard, Jeff Bridges, Gwyneth Paltrow, Leslie Bibb, Shaun Toub, Faran Tahir, Sayed Badreya', 13, 35),
(22, 'Kapitan Ameryka', 13, 'Marvel Studios, wytwórnia stojąca za sukcesem takich hitów jak \"Avengers\" i \"Iron Man 3\", przedstawia film \"Kapitan Ameryka: Zimowy żołnierz\". Kapitan Ameryka zostaje wplątany w sieć zagrażającej całemu światu intrygi. By ujawnić spisek, superbohater łączy siły z Czarną Wdową (Scarlett Johansson). Kiedy już wreszcie kryzys wydaje się być zażegnany, niespodziewanie pojawia się nowy.', '2014-03-13', '2018-06-12', 3, 'Anthony Russo, Joe Russo', 'Chris Evans, Samuel L. Jackson, Scarlett Johansson, Robert Redford, Sebastian Stan, Anthony Mackie, Cobie Smulders, Frank Grillo', 13, 20),
(23, 'Spider-Man', 14, 'Przeciętny nastolatek, Peter Parker (Tobey Maguire) przeistacza się w superbohatera pod wpływem ukąszenia przez radioaktywnego pająka. Kiedy jego ukochany wuj zostaje brutalnie zamordowany przez włamywaczy, Peter przysięga sobie, że użyje swoich niezwykłych sił, aby pomścić jego śmierć. Znany odtąd jako \"Spider-Man\", Peter rozpoczyna walkę ze zbrodnią, co prowadzi do nieuchronnego konfliktu.', '2002-04-30', '2018-06-12', 3, 'Sam Raimi', 'Tobey Maguire, Willem Dafoe, Kirsten Dunst, James Franco, J.K. Simmons, 	Rosemary Harris, Cliff Robertson, Joe Manganiello', 13, 28),
(24, 'Incredible Hulk', 16, '\"Incredible Hulk\" to rewelacyjna ekranizacja kultowej opowieści o jednym z najpopularniejszych superbohaterów. Od czasu przypadkowego napromieniowania naukowiec Bruce Banner (Edward Norton) szuka lekarstwa, które pozwoli mu uwolnić się od niezwykłego stanu, w jaki wpada pod wpływem silnego stresu. W takich chwilach Banner zmienia się bowiem w olbrzymiego zielonego mutanta - Hulka.', '2008-06-06', '2018-06-12', 3, 'Louis Leterrier', 'Edward Norton, Liv Tyler, Tim Roth, William Hurt, Tim Blake Nelson, Ty Burrell, Christina Cabot, Peter Mensah', 13, 40),
(25, 'X-Men: Pierwsza klasa', 16, 'Widowiskowy film akcji, ukazujący początki epickiej sagi X-Men. Zanim Charles Xavier (James McAvoy) i Erik Lensherr (Michael Fassbender) przybrali imiona Profesor X i Magneto, byli młodymi ludźmi, którzy odkryli w sobie niezwykłe moce. Nim zostali zaciętymi wrogami, byli bliskimi przyjaciółmi, którzy połączyli swe siły z innymi Mutantami, aby zapobiec największemu zagrożeniu.', '2011-05-25', '2018-06-12', 3, 'Matthew Vaughn', 'James McAvoy, Michael Fassbender, Rose Byrne, Jennifer Lawrence, Kevin Bacon, January Jones, Nicholas Hoult, Oliver Platt', 13, 40),
(26, 'Niesamowity Spider-Man', 17, 'Nowa obsada, nowy reżyser, nowa historia. Czy zupełnie nowe podejście do najbardziej kasowego komiksu wszech czasów się powiedzie? Jak widać na przykładzie serii o Bondzie, odświeżenie tematu może okazać się wielkim sukcesem. Peter Parker tym razem uczy się jeszcze w liceum. Musi pogodzić się z tym, kim się stał, i wybaczyć sobie śmierć wuja, którego – tak mu się wydaje – mógł uratować.', '2012-06-13', '2018-06-12', 3, 'Marc Webb', 'Andrew Garfield, Emma Stone, Rhys Ifans, Denis Leary, Martin Sheen, Sally Field, Irrfan Khan, Campbell Scott', 13, 50),
(27, 'Wolverine', 23, 'Hugh Jackman ponownie w roli tajemniczego, obdarzonego niezwykłą mocą Wolverine’a, który wyrusza do współczesnej Japonii. Stawia tam czoła nie tylko obcej kulturze, lecz także śmiertelnie groźnym wrogom, którzy gotowi są na wszystko, by go zniszczyć.  Wolverine odkryje swoje słabości, zyskując przy tym siłę, o której dotąd mógł tylko marzyć, a jego los zmieni się na zawsze…', '2013-07-16', '2018-06-12', 3, 'James Mangold', 'Hugh Jackman, Tao Okamoto, Rila Fukushima, Hiroyuki Sanada, 	Swietłana Chodczenkowa, Brian Tee, Hal Yamanouchi, Will Yun Lee', 13, 25);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `baza_kategorie`
--

CREATE TABLE `baza_kategorie` (
  `ID` int(11) NOT NULL,
  `Nazwa` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `baza_kategorie`
--

INSERT INTO `baza_kategorie` (`ID`, `Nazwa`) VALUES
(1, 'Akcja'),
(2, 'Sci-Fi'),
(3, 'Familijne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `baza_newsletter`
--

CREATE TABLE `baza_newsletter` (
  `ID` int(11) NOT NULL,
  `Email` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `baza_newsletter`
--

INSERT INTO `baza_newsletter` (`ID`, `Email`) VALUES
(1, 'email@email.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `baza_uzytkownicy`
--

CREATE TABLE `baza_uzytkownicy` (
  `ID` int(11) NOT NULL,
  `Imie` text COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `Email` text COLLATE utf8_polish_ci NOT NULL,
  `Haslo` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `baza_uzytkownicy`
--

INSERT INTO `baza_uzytkownicy` (`ID`, `Imie`, `Nazwisko`, `Email`, `Haslo`) VALUES
(1, 'Michał', 'Mendel', 'admin@admin.pl', 'e05cf25ad42283b3df675c61f42c6bdb'),

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `baza_wypozyczenia`
--

CREATE TABLE `baza_wypozyczenia` (
  `ID` int(11) NOT NULL,
  `ID_filmy` int(11) NOT NULL,
  `ID_uzytkownicy` int(11) NOT NULL,
  `CzasWypozyczenia` int(11) NOT NULL,
  `DataWypozyczenia` date NOT NULL,
  `Cena` float NOT NULL,
  `Status` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `baza_wypozyczenia`
--

INSERT INTO `baza_wypozyczenia` (`ID`, `ID_filmy`, `ID_uzytkownicy`, `CzasWypozyczenia`, `DataWypozyczenia`, `Cena`, `Status`) VALUES
(1, 27, 1, 42, '2018-06-27', 0, 'Dodano'),
(2, 2, 1, 42, '2018-06-27', 35, 'Dodano'),
(3, 27, 1, 42, '2018-06-27', 23, 'Dodano'),
(4, 27, 1, 42, '2018-06-27', 23, 'Dodano'),
(5, 27, 1, 42, '2018-06-27', 23, 'Dodano'),
(6, 14, 1, 42, '2018-06-27', 36, 'Trwa'),
(7, 5, 1, 42, '2018-06-27', 31, 'Zakończono');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `baza_filmy`
--
ALTER TABLE `baza_filmy`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `baza_kategorie`
--
ALTER TABLE `baza_kategorie`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `baza_newsletter`
--
ALTER TABLE `baza_newsletter`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `baza_uzytkownicy`
--
ALTER TABLE `baza_uzytkownicy`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `baza_wypozyczenia`
--
ALTER TABLE `baza_wypozyczenia`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `baza_filmy`
--
ALTER TABLE `baza_filmy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT dla tabeli `baza_kategorie`
--
ALTER TABLE `baza_kategorie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `baza_newsletter`
--
ALTER TABLE `baza_newsletter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `baza_uzytkownicy`
--
ALTER TABLE `baza_uzytkownicy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `baza_wypozyczenia`
--
ALTER TABLE `baza_wypozyczenia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
