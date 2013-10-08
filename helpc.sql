SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS `helpc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `helpc`;

CREATE TABLE IF NOT EXISTS `pergunta` (
  `Id` int(11) NOT NULL,
  `Texto` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `resposta` (
  `Id` int(11) NOT NULL,
  `IdResultado` int(11) DEFAULT NULL,
  `IdPergunta` int(11) DEFAULT NULL,
  `Resposta` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `resultado` (
  `Id` int(11) NOT NULL,
  `Solucao` varchar(1024) CHARACTER SET latin1 DEFAULT NULL,
  `Problema` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `usuario` (
  `Id` int(11) NOT NULL,
  `Login` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `Senha` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `Nome` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
