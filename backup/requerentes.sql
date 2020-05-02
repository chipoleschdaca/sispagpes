-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 02/05/2020 às 02:43
-- Versão do servidor: 8.0.20-cluster
-- Versão do PHP: 7.2.30-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sispagpes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `requerentes`
--

CREATE TABLE `requerentes` (
  `id` int NOT NULL,
  `saram` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `posto` varchar(10) NOT NULL,
  `situacao` varchar(10) NOT NULL,
  `nome` varchar(65) NOT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `email` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `requerentes`
--

INSERT INTO `requerentes` (`id`, `saram`, `cpf`, `posto`, `situacao`, `nome`, `dt_nascimento`, `email`, `data`) VALUES
(1, '988.653-1', '656.654.546-52', '5', 'R1', 'ANDERSON NEVES PEREIRA', NULL, 'nevesanp1@fab.mil.br', '2019-12-15'),
(4, '666.666-6', '666.666.666-66', '6', 'AT', 'ISABELA CHIPOLESCH DE ALMEIDA', NULL, 'isa123@gmail.com', '2020-01-18'),
(5, '449.350-8', '115.620.027-08', '8', 'AT', 'DANIEL ANGELO CHIPOLESCH DE ALMEIDA', NULL, 'chipoleschdaca@fab.mil.br', '2020-02-11'),
(25, '565.464-5', '564.564.564-56', '11', 'R1', 'ANDRé ANGELO DE ALMEIDA', '1956-10-27', '', '2020-05-02');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `requerentes`
--
ALTER TABLE `requerentes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `requerentes`
--
ALTER TABLE `requerentes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
