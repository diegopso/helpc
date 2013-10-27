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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
