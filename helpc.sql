SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS `helpc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `helpc`;

CREATE TABLE IF NOT EXISTS `pergunta` (
  `Texto` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

INSERT INTO `pergunta` (`Texto`, `Id`) VALUES
('O LED do gabinete estÃ¡ aceso?', 1),
(' O LED do monitor estÃ¡ aceso? ', 2),
('O ventilador da fonte estÃ¡ funcionando? ', 3),
('Aparece alguma mensagem de erro na tela?', 4),
('O monitor estÃ¡ fazendo sons repetitivos?', 5),
('HÃ¡ algum cheiro de queimado no monitor?', 7),
('O PC estÃ¡ reiniciando sem parar; ou sempre que vocÃª entra ou sai do Windows?', 8),
('O PC estÃ¡ se desligando sem parar; ou apÃ³s algum tempo em funcionamento?', 9),
('A data e horÃ¡rio do PC estÃ£o errados?', 10),
('As configuraÃ§Ãµes duram apenas alguns dias ou semanas?', 11),
('A imagem no monitor pisca, treme ou diminui de repente?', 12);

CREATE TABLE IF NOT EXISTS `resposta` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdResultado` int(11) DEFAULT NULL,
  `IdPergunta` int(11) DEFAULT NULL,
  `Resposta` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

INSERT INTO `resposta` (`Id`, `IdResultado`, `IdPergunta`, `Resposta`) VALUES
(13, 6, 1, '0'),
(14, 6, 2, '1'),
(15, 6, 3, '0'),
(16, 6, 4, '0'),
(17, 6, 5, '0'),
(18, 6, 7, '0'),
(19, 6, 8, '0'),
(20, 6, 9, '0'),
(21, 6, 10, '0'),
(22, 6, 11, '0'),
(23, 6, 12, '0');

CREATE TABLE IF NOT EXISTS `resultado` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Solucao` varchar(1024) CHARACTER SET latin1 DEFAULT NULL,
  `Problema` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `resultado` (`Id`, `Solucao`, `Problema`) VALUES
(6, 'Verifique seu cabo de forÃ§a.', 'Cabo de forÃ§a desconectado.');

CREATE TABLE IF NOT EXISTS `usuario` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `Senha` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `Nome` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `usuario` (`Id`, `Login`, `Senha`, `Nome`) VALUES
(1, 'djonathas', '123', 'Djonathas Cardoso');
CREATE TABLE IF NOT EXISTS `view_resultados` (
`Id` int(11)
,`Solucao` varchar(1024)
,`Problema` varchar(256)
,`IdsRespostas` text
,`Respostas` text
,`IdsPerguntas` text
,`Perguntas` text
);DROP TABLE IF EXISTS `view_resultados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_resultados` AS select `rd`.`Id` AS `Id`,`rd`.`Solucao` AS `Solucao`,`rd`.`Problema` AS `Problema`,group_concat(`r`.`Id` separator '-$-') AS `IdsRespostas`,group_concat(`r`.`Resposta` separator '-$-') AS `Respostas`,group_concat(`p`.`Id` separator '-$-') AS `IdsPerguntas`,group_concat(`p`.`Texto` separator '-$-') AS `Perguntas` from ((`pergunta` `p` join `resposta` `r` on((`p`.`Id` = `r`.`IdPergunta`))) join `resultado` `rd` on((`rd`.`Id` = `r`.`IdResultado`))) group by `rd`.`Id`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
