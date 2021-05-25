-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-05-20 16:25:07
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `biblio`
--
CREATE DATABASE IF NOT EXISTS `biblio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `biblio`;

-- --------------------------------------------------------

--
-- テーブルの構造 `general`
--

CREATE TABLE `general` (
  `iduni` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `numero` int(10) NOT NULL,
  `descripcion` text NOT NULL,
  `link` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `tipo` varchar(15) NOT NULL,
  `imagenback` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla general' ROW_FORMAT=COMPACT;

--
-- テーブルのデータのダンプ `general`
--

INSERT INTO `general` (`iduni`, `nombre`, `numero`, `descripcion`, `link`, `fecha`, `tipo`, `imagenback`) VALUES
(101, 'Boku No Hero', 1, 'Aprende como crear una aplicación web completa con PHP.', './Elements/mang/hero/Image-1.jpg', '2021-05-16 18:07:26', 'manga', './Elements/mang/hero/background/background.png'),
(102, 'Kimetsu No Yaiba', 1, '¡Tanjiro emprende el camino del Demon Slayer para salvar a su hermana y vengar a su familia!\r\nEn el Japón de la era Taisho, Tanjiro Kamado es un niño de buen corazón que se gana la vida vendiendo carbón vegetal. Pero su pacífica vida se hace añicos cuando un demonio mata a toda su familia. Su hermana pequeña Nezuko es la única sobreviviente, pero se ha transformado en un demonio. Tanjiro emprende un peligroso viaje para encontrar una manera de devolver a su hermana a la normalidad y destruir al demonio que arruinó su vida.\r\n\r\nTanjiro y Nezuko se cruzan con dos poderosos demonios que luchan con armas mágicas. Incluso la ayuda de Tamayo y Yushiro puede no ser suficiente para derrotar a estos demonios que dicen pertenecer a los Doce Kizuki que sirven directamente a Kibutsuji, el demonio responsable de todos los males de Tanjiro. Pero si estos demonios pueden ser derrotados, ¿qué secretos pueden revelar sobre Kibutsuji?', './Elements/mang/Kimetsu/Image-1.jpg', '2021-05-16 18:07:26', 'manga', './Elements/mang/Kimetsu/background/background.jpg'),
(103, 'Naruto', 1, 'Aprende como crear una aplicación web completa con PHP.', './Elements/mang/naruto/Image-1.jpg', '2021-05-16 18:07:26', 'manga', './Elements/mang/naruto/background/background.jpg'),
(104, 'Noragami', 1, 'Aprende como crear una aplicación web completa con PHP.', './Elements/mang/noragami/Image-1.jpg', '2021-05-16 18:07:26', 'manga', './Elements/mang/noragami/background/background.jpg'),
(105, 'Yakusoku No Neverland', 1, 'Aprende como crear una aplicación web completa con PHP.', './Elements/mang/yakusoku/Image-1.jpg', '2021-05-16 18:07:26', 'manga', './Elements/mang/yakusoku/background/background.jpg'),
(106, 'Re ZERO', 1, 'Aprende como crear una aplicación web completa con PHP.', './Elements/novelas/rezero/Image-1.jpg', '2021-05-16 18:07:26', 'novela', './Elements/novelas/rezero/background/background.jpg'),
(107, 'Kimetsu No Yaiba', 2, '¡Tanjiro emprende el camino del Demon Slayer para salvar a su hermana y vengar a su familia! En el Japón de la era Taisho, Tanjiro Kamado es un niño de buen corazón que se gana la vida vendiendo carbón vegetal. Pero su pacífica vida se hace añicos cuando un demonio mata a toda su familia. Su hermana pequeña Nezuko es la única sobreviviente, pero se ha transformado en un demonio. Tanjiro emprende un peligroso viaje para encontrar una manera de devolver a su hermana a la normalidad y destruir al demonio que arruinó su vida.  Tanjiro y Nezuko se cruzan con dos poderosos demonios que luchan con armas mágicas. Incluso la ayuda de Tamayo y Yushiro puede no ser suficiente para derrotar a estos demonios que dicen pertenecer a los Doce Kizuki que sirven directamente a Kibutsuji, el demonio responsable de todos los males de Tanjiro. Pero si estos demonios pueden ser derrotados, ¿qué secretos pueden revelar sobre Kibutsuji?', './Elements/mang/kimetsu2/Image-01.jpg', '2021-05-18 18:43:47', 'manga', './Elements/mang/kimetsu2/background/background.jpg'),
(108, 'Kimetsu No Yaiba', 3, '¡Tanjiro emprende el camino del Demon Slayer para salvar a su hermana y vengar a su familia! En el Japón de la era Taisho, Tanjiro Kamado es un niño de buen corazón que se gana la vida vendiendo carbón vegetal. Pero su pacífica vida se hace añicos cuando un demonio mata a toda su familia. Su hermana pequeña Nezuko es la única sobreviviente, pero se ha transformado en un demonio. Tanjiro emprende un peligroso viaje para encontrar una manera de devolver a su hermana a la normalidad y destruir al demonio que arruinó su vida.  Tanjiro y Nezuko se cruzan con dos poderosos demonios que luchan con armas mágicas. Incluso la ayuda de Tamayo y Yushiro puede no ser suficiente para derrotar a estos demonios que dicen pertenecer a los Doce Kizuki que sirven directamente a Kibutsuji, el demonio responsable de todos los males de Tanjiro. Pero si estos demonios pueden ser derrotados, ¿qué secretos pueden revelar sobre Kibutsuji?', './Elements/mang/kimetsu3/Image-01.jpg', '2021-05-18 19:24:56', 'manga', './Elements/mang/kimetsu3/background/background.jpg'),
(109, 'The Lord of the Rings', 1, '', './Elements/novelas/lordrings/Image-1.jpg', '2021-05-20 10:58:14', 'novela', './Elements/novelas/lordrings/background/background.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `mangas`
--

CREATE TABLE `mangas` (
  `idmanga` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `numero` int(10) NOT NULL,
  `descripcion` text NOT NULL,
  `link` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `id_uni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla mangas' ROW_FORMAT=COMPACT;

--
-- テーブルのデータのダンプ `mangas`
--

INSERT INTO `mangas` (`idmanga`, `nombre`, `numero`, `descripcion`, `link`, `fecha`, `id_uni`) VALUES
(101, 'Boku No Hero', 1, 'Aprende como crear una aplicación web completa con PHP.', './Elements/mang/hero/Image-1.jpg', '2021-05-16 18:17:52', 0),
(102, 'Kimetsu No Yaiba', 1, 'Aprende como crear una aplicación web completa con PHP.', './Elements/mang/Kimetsu/Image-1.jpg', '2021-05-16 18:17:52', 0),
(103, 'Naruto', 1, 'Aprende como crear una aplicación web completa con PHP.', './Elements/mang/naruto/Image-1.jpg', '2021-05-16 18:17:52', 0),
(104, 'Noragami', 1, 'Aprende como crear una aplicación web completa con PHP.', './Elements/mang/noragami/Image-1.jpg', '2021-05-16 18:17:52', 0),
(105, 'Yakusoku No Neverland', 1, 'Aprende como crear una aplicación web completa con PHP.', './Elements/mang/yakusoku/Image-1.jpg', '2021-05-16 18:17:52', 0),
(107, 'Kimetsu No Yaiba', 2, '', './Elements/mang/kimetsu2/Image-01.jpg', '2021-05-18 18:44:32', 0),
(108, 'Kimetsu No Yaiba', 3, '', './Elements/mang/kimetsu3/Image-01.jpg', '2021-05-18 19:25:25', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `novelas`
--

CREATE TABLE `novelas` (
  `idnov` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `numero` int(10) NOT NULL,
  `descripcion` text NOT NULL,
  `link` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla novelas' ROW_FORMAT=COMPACT;

--
-- テーブルのデータのダンプ `novelas`
--

INSERT INTO `novelas` (`idnov`, `nombre`, `numero`, `descripcion`, `link`, `fecha`) VALUES
(106, 'Re ZERO', 1, '', './Elements/novelas/rezero/Image-1.jpg', '2021-05-16 18:16:12'),
(109, 'The Lord of the Rings', 1, '', './Elements/novelas/lordrings/Image-1.jpg', '2021-05-20 10:59:03');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`iduni`);
ALTER TABLE `general` ADD FULLTEXT KEY `Buscar` (`nombre`,`descripcion`);

--
-- テーブルのインデックス `mangas`
--
ALTER TABLE `mangas`
  ADD PRIMARY KEY (`idmanga`);
ALTER TABLE `mangas` ADD FULLTEXT KEY `Buscar` (`nombre`,`descripcion`);

--
-- テーブルのインデックス `novelas`
--
ALTER TABLE `novelas`
  ADD PRIMARY KEY (`idnov`);
ALTER TABLE `novelas` ADD FULLTEXT KEY `Buscar` (`nombre`,`descripcion`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `general`
--
ALTER TABLE `general`
  MODIFY `iduni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- テーブルの AUTO_INCREMENT `mangas`
--
ALTER TABLE `mangas`
  MODIFY `idmanga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- テーブルの AUTO_INCREMENT `novelas`
--
ALTER TABLE `novelas`
  MODIFY `idnov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `mangas`
--
ALTER TABLE `mangas`
  ADD CONSTRAINT `idbusq2` FOREIGN KEY (`idmanga`) REFERENCES `general` (`iduni`);

--
-- テーブルの制約 `novelas`
--
ALTER TABLE `novelas`
  ADD CONSTRAINT `idbusq` FOREIGN KEY (`idnov`) REFERENCES `general` (`iduni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
