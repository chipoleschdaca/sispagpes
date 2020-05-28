-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 03/05/2020 às 22:26
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
-- Estrutura para tabela `militares`
--

CREATE TABLE `militares` (
  `id` int NOT NULL,
  `saram` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cpf` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `posto` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nomeguerra` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `senha` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfil` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `militares`
--

INSERT INTO `militares` (`id`, `saram`, `cpf`, `posto`, `nome`, `nomeguerra`, `senha`, `perfil`, `status`, `data`) VALUES
(2, '222.222-2', '222.222.222-22', '13', 'LEONARDO CARUSO CARDOSO', 'CARUSO', '1d0185e4efea01f609610ed385608eef', '5', 'Aprovado', '2019-12-15'),
(3, '449.350-8', '115.620.027-08', '8', 'DANIEL ANGELO CHIPOLESCH DE ALMEIDA', 'CHIPOLESCH', '', '1', 'Aprovado', '2019-12-15'),
(5, '444.444-4', '444.444.444-44', '14', 'MARIA ISABEL RODRIGUES SAMPAIO', 'MARIA ISABEL', '263bce650e68ab4e23f28263760b9fa5', '1', 'Aprovado', '2019-12-17'),
(9, '111.111-1', '111.111.111-11', '14', 'GILCIMAR BATISTA DE ALMEIDA', 'GILCIMAR', '2a097f035264530daaf726381258ffb4', '5', 'Rejeitado', '2020-01-18'),
(11, '555.555-5', '555.555.555-55', '9', 'VICTOR SHIGUEO SUGAHARA', 'SHIGUEO', 'e10adc3949ba59abbe56e057f20f883e', '7', 'Aprovado', '2020-03-16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfis`
--

CREATE TABLE `perfis` (
  `id` int NOT NULL,
  `perfil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `perfis`
--

INSERT INTO `perfis` (`id`, `perfil`) VALUES
(1, 'ADMIN'),
(5, 'EXANT'),
(6, 'PENSAL'),
(7, 'TESOU');

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
(1, '988.653-1', '656.654.546-52', '5', 'R1', 'ANDERSON NEVES PEREIRA', '1956-02-27', 'nevesanp1@fab.mil.br', '2019-12-15'),
(4, '666.666-6', '666.666.666-66', '6', 'AT', 'ISABELA CHIPOLESCH DE ALMEIDA', NULL, 'isa123@gmail.com', '2020-01-18'),
(5, '449.350-8', '115.620.027-08', '8', 'AT', 'DANIEL ANGELO CHIPOLESCH DE ALMEIDA', NULL, 'chipoleschdaca@fab.mil.br', '2020-02-11'),
(25, '565.464-5', '564.564.564-56', '7', 'R1', 'ANDRÉ ANGELO DE ALMEIDA', '1956-10-27', '', '2020-05-02');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `militares`
--
ALTER TABLE `militares`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `perfis`
--
ALTER TABLE `perfis`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `requerentes`
--
ALTER TABLE `requerentes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `militares`
--
ALTER TABLE `militares`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `perfis`
--
ALTER TABLE `perfis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `requerentes`
--
ALTER TABLE `requerentes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
