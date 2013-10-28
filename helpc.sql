SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS `helpc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `helpc`;

CREATE TABLE IF NOT EXISTS `pergunta` (
  `Texto` varchar(256) DEFAULT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

INSERT INTO `pergunta` (`Texto`, `Id`) VALUES
('O LED "Power" acende quando você liga o PC?', 1),
(' O LED do monitor está aceso? ', 2),
('O ventilador da fonte está funcionando? ', 3),
('Aparece alguma mensagem de erro na tela?', 4),
('O monitor está fazendo sons repetitivos?', 5),
('Os LEDs piscam?', 6),
('Há algum cheiro de queimado no monitor?', 7),
('O PC está reiniciando sem parar; ou sempre que você entra ou sai do Windows?', 8),
('O PC está se desligando sem parar; ou após algum tempo em funcionamento?', 9),
('A data e horário do PC estão errados?', 10),
('As configurações duram apenas alguns dias ou semanas?', 11),
('A imagem no monitor pisca, treme ou diminui de repente?', 12),
('Ol&aacute; mundo?', 13),
('O LED &quot;Power&quot; acende quando voc&ecirc; liga o PC?', 14);

CREATE TABLE IF NOT EXISTS `resposta` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdResultado` int(11) DEFAULT NULL,
  `IdPergunta` int(11) DEFAULT NULL,
  `Resposta` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

INSERT INTO `resposta` (`Id`, `IdResultado`, `IdPergunta`, `Resposta`) VALUES
(1, 2, 1, 'Não'),
(2, 2, 2, 'Sim'),
(3, 2, 3, 'Não'),
(4, 2, 4, 'Não'),
(5, 2, 5, 'Não'),
(6, 2, 6, 'Não'),
(7, 2, 7, 'Não'),
(8, 2, 8, 'Não'),
(9, 2, 9, 'Não'),
(10, 2, 10, 'Não'),
(11, 2, 11, 'Não'),
(12, 2, 12, 'Não'),
(13, 3, 1, 'Sim'),
(14, 3, 2, 'Sim'),
(15, 3, 3, 'Sim'),
(16, 3, 4, 'Sim'),
(17, 3, 5, 'Sim'),
(18, 3, 6, 'Não'),
(19, 3, 7, 'Não'),
(20, 3, 8, 'Não'),
(21, 3, 9, 'Sim'),
(22, 3, 10, 'Não'),
(23, 3, 11, 'Não'),
(24, 3, 12, 'Não');

CREATE TABLE IF NOT EXISTS `resultado` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Solucao` varchar(1024) DEFAULT NULL,
  `Problema` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `resultado` (`Id`, `Solucao`, `Problema`) VALUES
(2, 'Verifique se o cabo de força do gabinete está conectado.', 'Cabo de força desconectado'),
(3, 'Tente extrair o pente de memória e passar uma borracha nele.', 'Memória RAM não reconhecida');

CREATE TABLE IF NOT EXISTS `usuario` (
  `Id` int(11) NOT NULL,
  `Login` varchar(32) DEFAULT NULL,
  `Senha` varchar(32) DEFAULT NULL,
  `Nome` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
