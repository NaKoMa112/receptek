-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Már 11. 11:24
-- Kiszolgáló verziója: 10.4.6-MariaDB
-- PHP verzió: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `receptek`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `keresztnev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `vezeteknev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(256) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `keresztnev`, `vezeteknev`, `email`, `jelszo`) VALUES
(1, 'a', 'b', 'asd', 'aaa'),
(4, 'v', 'k', 'asdasd', '$2y$10$vKmYl57sU/BcQzD9FW6mQOa/A6xT0TJ2U0UlEMUgXTMBASHfaYfBK');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hozzavalok`
--

CREATE TABLE `hozzavalok` (
  `id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `mennyiseg` int(4) NOT NULL,
  `mertekegyseg` varchar(20) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `hozzavalok`
--

INSERT INTO `hozzavalok` (`id`, `termek_id`, `nev`, `mennyiseg`, `mertekegyseg`) VALUES
(1, 1, 'teljse kiörlésű sima tönkölyliszt', 3, 'evőkanál'),
(2, 1, 'sima tönkölyliszt', 2, 'evőkanál'),
(3, 1, 'vaníliás tejsavó fehérje', 50, 'g'),
(4, 1, 'xillit', 3, 'kanál'),
(5, 1, 'szütőpor', 1, 'tasak'),
(6, 1, 'tojásfehérje', 1, ''),
(7, 1, 'citrom/narancs', 0, ''),
(8, 1, 'csökentett zsírtartalmú túró', 500, 'g'),
(9, 1, 'flavor drops – vaníliás ízű', 0, 'pár csepp'),
(10, 1, '52%-os zsírtartalmú étcsokoládé', 100, 'g'),
(11, 1, 'kókuszolaj', 1, 'kávéskanál'),
(12, 2, 'vaj', 80, 'g'),
(13, 2, 'zabpehely', 140, 'g'),
(14, 2, 'banán', 1, ''),
(15, 2, 'édesítőszer', 20, 'g'),
(16, 2, 'csökkentett zsírtartalmú túró', 500, 'g'),
(17, 2, 'étcsokoládé', 100, 'g'),
(18, 2, 'folyékony 12%-os tejszín', 100, 'ml'),
(19, 2, 'min. 50%-os zsírtartalmú étcsokoládé', 100, 'g'),
(20, 2, 'vaj', 1, 'kávéskanál'),
(21, 2, 'vaniliás flavor drops', 0, 'pár csepp'),
(22, 3, 'M nagyságú tojás', 4, ''),
(23, 3, 'xillit nyírfacukor', 3, 'evőkanál'),
(24, 3, 'sima tönkölyliszt', 1, 'púpozott evőkanál'),
(25, 3, 'teljes kiőrlésű sima list(ismét lehet tönköly)', 1, 'púpozott evőkanál'),
(26, 3, 'vanilia ízű fehérje por', 1, 'púpozott evőkanál'),
(27, 3, 'sütőpor', 1, 'kávéskanál'),
(28, 3, 'csökkentett zsírtartalú túró', 500, 'g'),
(29, 3, 'legalább 52%-os étcsokoládé', 100, 'g'),
(30, 3, 'vaniliás flavor drops', 0, 'pár csepp'),
(31, 4, 'teljse kiőrlésű gabonapehely vagy(zabpehely)', 90, 'g'),
(32, 4, 'Agávé szirup', 1, 'kávéskanál'),
(33, 4, 'kókuszolaj', 1, 'evőkanál'),
(34, 4, 'tojás', 3, ''),
(35, 4, 'csökkentet zsírtartalmú túró', 750, 'g'),
(36, 4, 'vaníliás tejsavó fehérje', 100, 'g'),
(37, 4, 'sima tönkölyliszt', 2, 'púpozott evőkanál'),
(38, 4, 'xillit', 3, 'evőkanál'),
(39, 4, 'kókuszolaj', 2, 'evőkanál'),
(40, 4, 'vaníliás Flavor Drops', 0, 'pár csepp'),
(41, 4, 'fahéj', 1, 'kávéskanál'),
(42, 4, 'erdei gyümölcs(lehet fagyasztott is)', 1, 'csésze'),
(43, 4, 'joghurt', 3, 'evőkanál'),
(44, 4, 'keményítő (vagy cukormentes vaníliapuding)', 30, 'g'),
(45, 4, 'édesítőszer (BIO Agávé szirupot)', 0, 'ízlés szerint'),
(46, 5, 'lenmag (vagy kesudió)', 50, 'g'),
(47, 5, 'instant pehely (vagy hajdina instant kása még száraz állapotában)', 30, 'g'),
(48, 5, 'szárított gyümőlcs', 50, 'g'),
(49, 5, 'víz', 2, 'csésze'),
(50, 5, 'rost - psylium', 30, 'g'),
(51, 5, 'csökkentett zsírtartalú túró', 500, 'g'),
(52, 5, 'fehérjoghurt (kb. 3,7% zsírtartalommal)', 250, 'g'),
(53, 5, 'xillit', 30, 'g'),
(54, 5, 'krémekbe használható zselatin fixáló', 1, 'csomag'),
(55, 5, 'kalóriamentes eperszirup', 0, '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kedvencek`
--

CREATE TABLE `kedvencek` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `termek_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kedvencek`
--

INSERT INTO `kedvencek` (`id`, `email`, `termek_id`) VALUES
(1, 'asdasd', 2),
(2, 'asdasd', 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE `termekek` (
  `id` int(11) NOT NULL,
  `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `leiras` varchar(5000) COLLATE utf8_hungarian_ci NOT NULL,
  `kep` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`id`, `nev`, `leiras`, `kep`) VALUES
(1, 'Fehérjével teli mini tekercsek', 'A sütőt 160 °C-ra hevítjük, felverjük a tojásfehérjét és fokozatosan hozzáadjuk a xillitet. Enyhén hozzákeverjük az átszitált lisztet, sütőport, a fehérjét és a citrom héját. A masszát kenjük szét a sütőpapíron, és addig sütjük, míg a piskóta el nem készül. A piskótát ezután kivesszük a tepsiből, és egy konyhai törlő segítségével még a forró tésztából tekercset formázunk úgy, hogy a rövidebb oldalakat egymás felé tekerjük, hogy majd az elvágás után körülbelül 6 tekercs keletkezzen. Amíg a tészta kihűl, elkészítjük a krémet.\r\nA tölteléket a túró és a vaníliás joghurt összekeverésével készíthetjük el, vagy a túrót ízesíthetjük akár a kalóriamentes flavor drops cseppekkel is (én a vanília ízesítést használtam). *Ha szeretnétek biztosra menni, hogy a krém szépen fog állni, hozzáadhattok egy kis zselatint is, melyet a csomagolás szerint készíthettek el, de ez a lépés akár ki is hagyható A mini tekercseket végül olvasztott csokoládéval öntjük le, melyet kókuszolajjal olvasztunk fel, ezután pedig hűvös helyen dermedni hagyjuk.', 'Mini-rolady-plne-proteinu.webp'),
(2, 'Egyszerű csokoládétorta sütés nélkül', 'A zabpehelyből, vajból, banánból és az édesítőszerből egy nagyon egyszerű tésztát készítünk el. A kemény vajat egy hagyományos reszelő segítségével a nagyobb lyukakon lereszeljük, ezután hozzáadjuk a banánpürét az erithritollal és a zabpehellyel. Sűrű masszát alakítunk ki és egy kisebb kerek formába helyezzük, melyet előtte sütőpapírral bélelünk ki.\r\nA csokoládét gőz fölött felolvasztjuk, várunk egy kicsit, és amíg híg állagú hozzáadjuk a túróhoz. Ezután a tölteléket rákenjük a tésztára. A felső öntetet úgy készítjük el, hogy a legkisebb gázon egy lábasban felolvasztjuk a csokoládét a vajjal, hozzáadjuk a tejszínt és addig keverjük, míg nem alakul ki a megfelelő textúra. Vaníliás Flavor drops  cseppekkel ízesítjük. A csokoládét a tortára öntjük és hűvös helyen dermedni hagyjuk. Díszíthetjük gyümölccsel.', 'Jednoducha-nepecena-cokoladova-torta.webp'),
(3, 'Habos csokoládékrémes muffinok', 'A sütőt előmelegítjük 160 °C-ra. A tojásfehérjékből lassan habot készítünk, melyhez fokozatosan hozzáadjuk a cukrot és a tojássárgáját. A lisztet, fehérjét és a sütőport együtt átszitáljuk. Kanalanként kézzel lassan hozzáadjuk az átszitált keveréket a felvert habhoz. A tésztát szétosztjuk a formákba (a jobb manipuláció miatt ideális a szilikon forma) és megsütjük.\r\nA csokoládét gőz fölött felolvasztjuk és hozzáadjuk a túrót. Ha szeretnéd, hogy a krém még édesebb legyen, adhatsz hozzá pár csepp Flavor Drops-ot. Ha kihűltek a muffinok feldíszítjük őket és hűvös helyen tároljuk.', 'Penove-muffiny-s-cokoladovym-kremom.webp'),
(4, 'Túrós cheesecake erdei gyümölcsökkel', 'A nagy kerek formát sütőpapírral béleljük ki. A kukoricapelyhet, vagy a zabpelyhet ledaráljuk és összekeverjük a felolvasztott kókuszolajjal és az agávé sziruppal. Lenyomkodjuk a forma aljára és 160 °C-on 2 percig sütjük.\r\nA fehérjékből habot készítünk. A sárgájához fokozatosan hozzáadjuk a xillitet, túrót, az átszitált lisztet a fehérjével együtt, valamint az összes további hozzávalót is. Végül kézzel lágyan hozzáadjuk a fehérjékből készült habot. A keveréket a formába öntjük, majd 160 °C-on körülbelül 40 percig sütjük, amíg a cheesecake nem lesz készen (de ne legyen száraz!). Végül pihentetni hagyjuk a kikapcsolt sütőben, melynek ajtaját enyhén kinyitjuk.\r\nA keményítőt, vagy a vaníliás pudingot egy kevés vízben elkeverjük (kb. 1,5 – 2,5 dl), hozzáadjuk a gyümölcsöt és az édesítőt, majd állandó keverés mellett ugyanúgy készítjük el, mint a pudingot. Ha a krém sűrű, hagyjuk egy kicsit kihűlni. Hozzáadjuk a joghurtot és rákenjük a süteményre. Kész!', 'cheesecake1.webp'),
(5, 'Sajttorta a robotgépből', 'Előkészítjük a formát, melynek alját sütőpapírral bélelünk ki. Először leőröljük a lenmagokat, majd hozzáadjuk a víz egy részét és a mazsolát, majd összekeverjük, míg nem lesz megfelelő a textúrája (a tészta ragadós alapja). Hozzáadjuk a psylliumot és a keveréket kézzel összedolgozzuk. Ha szükséges, adunk még hozzá vizet. Hozzáadjuk az instant pelyhet és átkeverjük – egy sűrű, de még mindig kenhető állagú masszát kellene kapnunk. Szükség szerint hozzáadjuk a maradék vizet. Ha a tészta textúrája a megfelelő sűrűségű, elkezdjük elkenni a forma alján és egy részével a cheesecake oldalait kenjük ki.\r\nA túrót, a joghurttal és a xillittel  együtt kikeverjük, majd a csomagolás szerint hozzáadjuk a zselatin fixálót. A keveréket kiöntjük a formába és egy kicsit horizontálisan mozgatjuk, hogy a krém egyenletesen legyen eloszlatva. Ezután azonnal feldíszítjük. A tésztára a Zero Sziruppal pontokat rajzolunk, majd hurkapálcával végigmegyünk minden pont közepén (mintha ketté szeretnénk őket választani), amivel mini szívek alakulnak ki a sütemény tetején.\r\nA tortát legalább 2 órát a hűtőben hagyjuk dermedni, de legjobb, ha az egész éjszaka ott marad. Tálalás előtt elsőként egy lapát/ spatula segítségével elválasztjuk a tészta oldalait, majd aztán nyitjuk ki a formát. A sütemény nemcsak gluténmentes, de főként tele van fehérjékkel, ideális a forró nyári napokon. Kiegészíthetitek friss gyümölccsel, vagy mentával.', 'LRM_EXPORT_20180502_170130.webp');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A tábla indexei `hozzavalok`
--
ALTER TABLE `hozzavalok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `termek_id` (`termek_id`);

--
-- A tábla indexei `kedvencek`
--
ALTER TABLE `kedvencek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `termek_id` (`termek_id`),
  ADD KEY `email` (`email`);

--
-- A tábla indexei `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `hozzavalok`
--
ALTER TABLE `hozzavalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT a táblához `kedvencek`
--
ALTER TABLE `kedvencek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `hozzavalok`
--
ALTER TABLE `hozzavalok`
  ADD CONSTRAINT `hozzavalok_ibfk_1` FOREIGN KEY (`termek_id`) REFERENCES `termekek` (`id`);

--
-- Megkötések a táblához `kedvencek`
--
ALTER TABLE `kedvencek`
  ADD CONSTRAINT `kedvencek_ibfk_1` FOREIGN KEY (`termek_id`) REFERENCES `termekek` (`id`),
  ADD CONSTRAINT `kedvencek_ibfk_2` FOREIGN KEY (`email`) REFERENCES `felhasznalok` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
