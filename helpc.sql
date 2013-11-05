-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `helpc`
--
CREATE DATABASE `helpc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `helpc`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta`
--

CREATE TABLE IF NOT EXISTS `pergunta` (
  `Texto` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `pergunta`
--

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta`
--

CREATE TABLE IF NOT EXISTS `resposta` (
  `Id` int(11) NOT NULL,
  `IdResultado` int(11) DEFAULT NULL,
  `IdPergunta` int(11) DEFAULT NULL,
  `Resposta` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

INSERT INTO `resposta` (`Id`, `IdResultado`, `IdPergunta`, `Resposta`) VALUES
(1, 2, 1, 'NÃ£o'),
(2, 2, 2, 'Sim'),
(3, 2, 3, 'NÃ£o'),
(4, 2, 4, 'NÃ£o'),
(5, 2, 5, 'NÃ£o'),
(6, 2, 6, 'NÃ£o'),
(7, 2, 7, 'NÃ£o'),
(8, 2, 8, 'NÃ£o'),
(9, 2, 9, 'NÃ£o'),
(10, 2, 10, 'NÃ£o'),
(11, 2, 11, 'NÃ£o'),
(12, 2, 12, 'NÃ£o'),
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

--
-- Estrutura da tabela `resultado`
--

CREATE TABLE IF NOT EXISTS `resultado` (
  `Id` int(11) NOT NULL,
  `Solucao` varchar(1024) CHARACTER SET latin1 DEFAULT NULL,
  `Problema` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

INSERT INTO `resultado` (`Id`, `Solucao`, `Problema`) VALUES
(2, 'Verifique se o cabo de força do gabinete está conectado.', 'Cabo de força desconectado'),
(3, 'Tente extrair o pente de memória e passar uma borracha nele.', 'Memória RAM não reconhecida');

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `Id` int(11) NOT NULL,
  `Login` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `Senha` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `Nome` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_resultados` AS select `rd`.`Id` AS `Id`,`rd`.`Solucao` AS `Solucao`,`rd`.`Problema` AS `Problema`,group_concat(`r`.`Id` separator '-$-') AS `IdsRespostas`,group_concat(`r`.`Resposta` separator '-$-') AS `Respostas`,group_concat(`p`.`Id` separator '-$-') AS `IdsPerguntas`,group_concat(`p`.`Texto` separator '-$-') AS `Perguntas` from ((`pergunta` `p` join `resposta` `r` on((`p`.`Id` = `r`.`IdPergunta`))) join `resultado` `rd` on((`rd`.`Id` = `r`.`IdResultado`))) group by `rd`.`Id`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
