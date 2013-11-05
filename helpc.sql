-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 05/11/2013 às 21:52
-- Versão do servidor: 5.6.11
-- Versão do PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `helpc`
--
CREATE DATABASE IF NOT EXISTS `helpc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `helpc`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pergunta`
--

CREATE TABLE IF NOT EXISTS `pergunta` (
  `Texto` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Fazendo dump de dados para tabela `pergunta`
--

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `resposta`
--

CREATE TABLE IF NOT EXISTS `resposta` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdResultado` int(11) DEFAULT NULL,
  `IdPergunta` int(11) DEFAULT NULL,
  `Resposta` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Fazendo dump de dados para tabela `resposta`
--

INSERT INTO `resposta` (`Id`, `IdResultado`, `IdPergunta`, `Resposta`) VALUES
(2, 1, 5, '0'),
(3, 2, 5, '1'),
(4, 3, 5, '0'),
(5, 4, 5, '0'),
(6, 5, 5, '0'),
(7, 7, 5, '0'),
(8, 8, 5, '0'),
(9, 9, 5, '0'),
(10, 10, 5, '0'),
(11, 11, 5, '0'),
(12, 12, 5, '0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `resultado`
--

CREATE TABLE IF NOT EXISTS `resultado` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Solucao` varchar(1024) CHARACTER SET latin1 DEFAULT NULL,
  `Problema` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Fazendo dump de dados para tabela `resultado`
--

INSERT INTO `resultado` (`Id`, `Solucao`, `Problema`) VALUES
(5, 'Verifique se seu cabo de forÃ§a estÃ¡ conectado.', 'Cabo de forÃ§a desconectado.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `Senha` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `Nome` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`Id`, `Login`, `Senha`, `Nome`) VALUES
(1, 'djonathas', '123', 'Djonathas Cardoso');

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `view_resultados`
--
CREATE TABLE IF NOT EXISTS `view_resultados` (
`Id` int(11)
,`Solucao` varchar(1024)
,`Problema` varchar(256)
,`IdsRespostas` text
,`Respostas` text
,`IdsPerguntas` text
,`Perguntas` text
);
-- --------------------------------------------------------

--
-- Estrutura para view `view_resultados`
--
DROP TABLE IF EXISTS `view_resultados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_resultados` AS select `rd`.`Id` AS `Id`,`rd`.`Solucao` AS `Solucao`,`rd`.`Problema` AS `Problema`,group_concat(`r`.`Id` separator '-$-') AS `IdsRespostas`,group_concat(`r`.`Resposta` separator '-$-') AS `Respostas`,group_concat(`p`.`Id` separator '-$-') AS `IdsPerguntas`,group_concat(`p`.`Texto` separator '-$-') AS `Perguntas` from ((`pergunta` `p` join `resposta` `r` on((`p`.`Id` = `r`.`IdPergunta`))) join `resultado` `rd` on((`rd`.`Id` = `r`.`IdResultado`))) group by `rd`.`Id`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
