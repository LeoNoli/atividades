-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 01-Dez-2020 às 20:27
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `instrumentosmusicais`
--
CREATE DATABASE IF NOT EXISTS `instrumentosmusicais` DEFAULT CHARACTER SET ucs2 COLLATE ucs2_bin;
USE `instrumentosmusicais`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cor`
--

CREATE TABLE IF NOT EXISTS `cor` (
  `id_cor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE ucs2_bin NOT NULL,
  PRIMARY KEY (`id_cor`)
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 COLLATE=ucs2_bin AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `cor`
--

INSERT INTO `cor` (`id_cor`, `nome`) VALUES
(10, 'rosa'),
(11, 'azul'),
(12, 'azul');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrumento`
--

CREATE TABLE IF NOT EXISTS `instrumento` (
  `id_instrumento` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cor` int(11) NOT NULL,
  `nome` varchar(100) COLLATE ucs2_bin NOT NULL,
  `cod_modelo` int(11) NOT NULL,
  PRIMARY KEY (`id_instrumento`),
  KEY `cod_cor` (`cod_cor`),
  KEY `cod_modelo` (`cod_modelo`)
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 COLLATE=ucs2_bin AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `instrumento`
--

INSERT INTO `instrumento` (`id_instrumento`, `cod_cor`, `nome`, `cod_modelo`) VALUES
(1, 11, 'tri2', 8),
(5, 11, 'flauta', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE IF NOT EXISTS `modelo` (
  `id_modelo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE ucs2_bin NOT NULL,
  PRIMARY KEY (`id_modelo`)
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 COLLATE=ucs2_bin AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `nome`) VALUES
(8, 'Teste'),
(9, 'Yamaha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE ucs2_bin NOT NULL,
  `senha` char(32) COLLATE ucs2_bin NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 COLLATE=ucs2_bin AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `senha`) VALUES
(1, 'admin@sistema.com', '12345');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `instrumento`
--
ALTER TABLE `instrumento`
  ADD CONSTRAINT `instrumento_ibfk_1` FOREIGN KEY (`cod_cor`) REFERENCES `cor` (`id_cor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `instrumento_ibfk_2` FOREIGN KEY (`cod_modelo`) REFERENCES `modelo` (`id_modelo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
