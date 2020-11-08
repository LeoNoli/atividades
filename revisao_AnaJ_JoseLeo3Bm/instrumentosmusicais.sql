-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 05-Nov-2020 às 17:47
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
  `cod_instrumento` int(11) NOT NULL,
  PRIMARY KEY (`id_cor`),
  UNIQUE KEY `cod_instrumento` (`cod_instrumento`)
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 COLLATE=ucs2_bin AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `cor`
--

INSERT INTO `cor` (`id_cor`, `nome`, `cod_instrumento`) VALUES
(9, 'azul', 7),
(10, 'branco', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrumento`
--

CREATE TABLE IF NOT EXISTS `instrumento` (
  `id_instrumento` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE ucs2_bin NOT NULL,
  PRIMARY KEY (`id_instrumento`)
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 COLLATE=ucs2_bin AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `instrumento`
--

INSERT INTO `instrumento` (`id_instrumento`, `nome`) VALUES
(5, 'violÃ£o'),
(6, 'violÃ£o'),
(7, 'guitarra');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE IF NOT EXISTS `modelo` (
  `id_modelo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE ucs2_bin NOT NULL,
  `cod_cor` int(11) NOT NULL,
  PRIMARY KEY (`id_modelo`),
  UNIQUE KEY `cod_cor` (`cod_cor`)
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 COLLATE=ucs2_bin AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `nome`, `cod_cor`) VALUES
(4, 'Yamaha', 9);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cor`
--
ALTER TABLE `cor`
  ADD CONSTRAINT `cor_ibfk_1` FOREIGN KEY (`cod_instrumento`) REFERENCES `instrumento` (`id_instrumento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`cod_cor`) REFERENCES `cor` (`id_cor`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
