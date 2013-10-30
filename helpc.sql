SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `pergunta` (
  `Texto` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

INSERT INTO `pergunta` (`Texto`, `Id`) VALUES
('O LED do gabinete estÃ¡ aceso?', 1),
(' O LED do monitor estÃ¡ aceso? ', 2),
('O ventilador da fonte estÃ¡ funcionando? ', 3),
('Aparece alguma mensagem de erro na tela?', 4),
('O monitor estÃ¡ fazendo sons repetitivos?', 5),
('Os LEDs piscam?', 6),
('HÃ¡ algum cheiro de queimado no monitor?', 7),
('O PC estÃ¡ reiniciando sem parar; ou sempre que vocÃª entra ou sai do Windows?', 8),
('O PC estÃ¡ se desligando sem parar; ou apÃ³s algum tempo em funcionamento?', 9),
('A data e horÃ¡rio do PC estÃ£o errados?', 10),
('As configuraÃ§Ãµes duram apenas alguns dias ou semanas?', 11),
('A imagem no monitor pisca, treme ou diminui de repente?', 12);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
