-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 14-Fev-2020 às 19:49
-- Versão do servidor: 8.0.19-cluster
-- versão do PHP: 7.2.27-6+ubuntu18.04.1+deb.sury.org+1

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
-- Estrutura da tabela `militares`
--

CREATE TABLE `militares` (
  `id` int NOT NULL,
  `saram` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cpf` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `posto` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nomeguerra` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfil` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` varchar(20) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `militares`
--

INSERT INTO `militares` (`id`, `saram`, `cpf`, `posto`, `nome`, `nomeguerra`, `perfil`, `status`, `data`) VALUES
(2, '222.222-2', '222.222.222-22', '2S', 'LEONARDO CARUSO CARDOSO', 'CARUSO', 'EXANT', 'Aprovado', '2019-12-15'),
(3, '449.350-8', '115.620.027-08', '1T', 'DANIEL ANGELO CHIPOLESCH DE ALMEIDA', 'CHIPOLESCH', 'Administrador', 'Aprovado', '2019-12-15'),
(5, '444.444-4', '444.444.444-44', '3S', 'MARIA ISABEL FERNANDES MACIEL', 'MARIA ISABEL', 'Administrador', 'Aprovado', '2019-12-17'),
(9, '111.111-1', '111.111.111-11', '3S', 'GILCIMAR BATISTA DE ALMEIDA', 'GILCIMAR', 'Funcionário', 'Aprovado', '2020-01-18'),
(10, '333.333-3', '333.333.333-33', '2T', 'CARMEN LUCIA CHIPOLESCH DE ALMEIDA', 'LUCIA', 'Tesoureiro', 'Aprovado', '2020-01-18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamentos`
--

CREATE TABLE `orcamentos` (
  `id` int NOT NULL,
  `requerente` varchar(50) NOT NULL,
  `tecnico` varchar(50) NOT NULL,
  `produto` varchar(25) NOT NULL,
  `serie` varchar(30) DEFAULT NULL,
  `problema` varchar(255) DEFAULT NULL,
  `laudo` varchar(255) DEFAULT NULL,
  `obs` varchar(255) DEFAULT NULL,
  `valor_servico` decimal(10,2) DEFAULT NULL,
  `pecas` varchar(255) DEFAULT NULL,
  `valor_pecas` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `desconto` decimal(10,2) DEFAULT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL,
  `pgto` varchar(20) DEFAULT NULL,
  `data_abertura` date NOT NULL,
  `data_geracao` date DEFAULT NULL,
  `data_aprovacao` date DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `orcamentos`
--

INSERT INTO `orcamentos` (`id`, `requerente`, `tecnico`, `produto`, `serie`, `problema`, `laudo`, `obs`, `valor_servico`, `pecas`, `valor_pecas`, `total`, `desconto`, `valor_total`, `pgto`, `data_abertura`, `data_geracao`, `data_aprovacao`, `status`) VALUES
(4, '656.654.546-54', '5', 'Galaxy S10', '464', 'TELA RACHADA', 'Não há', 'Não há', '4000.00', 'tela original samsung', '1000.00', '5000.00', '10.00', '4990.00', 'Cartão', '2019-12-15', '2019-12-15', '2020-01-24', 'Aprovado'),
(5, '656.654.546-54', '9', 'IPHO58', '566988', 'TELA RACHADA', 'Não há.', 'Não há', '4000.00', 'Botão liga e desliga', '8000.00', '12000.00', '1500.00', '10500.00', 'Cartão', '2019-12-16', '2019-12-16', '2020-01-10', 'Aprovado'),
(6, '656.654.546-54', '5', 'IPHONE X', '33333', 'TELA RACHADA', 'Não há', 'Não há', '1230.00', 'Botão liga e desliga', '243.00', '1473.00', '0.00', '1473.00', NULL, '2019-12-16', '2020-01-19', NULL, 'Cancelado'),
(7, '986.566.324-54', '9', 'Galaxy S10', '566988', 'TELA RACHADA', 'Trocar tudão.', 'Não há', '4000.00', 'Tela original apple', '8000.00', '12000.00', '1000.00', '11000.00', 'Cartão', '2019-12-17', '2019-12-17', '2019-12-17', 'Aprovado'),
(8, '656.654.546-54', '5', 'IPHONE X', '4875784', 'TELA RACHADA', 'Não há', 'Não há', '4000.00', 'Botão liga e desliga', '700.00', '4700.00', '0.00', '4700.00', NULL, '2019-12-31', '2020-01-10', NULL, 'Cancelado'),
(9, '888.888.888-88', '5', 'Ipad Air 2', '33333', 'Botão liga/desliga', NULL, 'Não há', NULL, NULL, NULL, NULL, NULL, '0.00', NULL, '2020-01-10', NULL, NULL, 'Aberto'),
(10, '666.666.666-66', '9', 'IPHO58', '666666666666666', 'Bateria', 'Trocar telefone', 'Não há', '4000.00', 'Não há', '700.00', '4700.00', '500.00', '4200.00', 'Cartão', '2020-01-18', '2020-01-18', '2020-01-18', 'Aprovado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `os`
--

CREATE TABLE `os` (
  `id` int NOT NULL,
  `id_orc` int NOT NULL,
  `requerente` varchar(50) NOT NULL,
  `produto` varchar(25) NOT NULL,
  `tecnico` varchar(50) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `data_abertura` date NOT NULL,
  `data_fechamento` date DEFAULT NULL,
  `garantia` varchar(20) DEFAULT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `os`
--

INSERT INTO `os` (`id`, `id_orc`, `requerente`, `produto`, `tecnico`, `total`, `data_abertura`, `data_fechamento`, `garantia`, `status`) VALUES
(1, 4, '656.654.546-54', 'Galaxy S10', '5', '3500.00', '2019-12-15', '2019-12-17', 'Não há', 'Aprovada'),
(2, 7, '986.566.324-54', 'Galaxy S10', '5', '11000.00', '2019-12-17', '2020-01-12', '90 dias', 'Aprovada'),
(3, 5, '656.654.546-54', 'IPHO58', '9', '10500.00', '2020-01-10', NULL, NULL, 'Aberta'),
(4, 10, '666.666.666-66', 'IPHO58', '9', '4200.00', '2020-01-18', '2020-01-18', '45 dias', 'Aprovada'),
(5, 4, '656.654.546-54', 'Galaxy S10', '5', '4990.00', '2020-01-24', NULL, NULL, 'Aberta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfis`
--

CREATE TABLE `perfis` (
  `id` int NOT NULL,
  `perfil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfis`
--

INSERT INTO `perfis` (`id`, `perfil`) VALUES
(1, 'Administrador'),
(2, 'Gerente'),
(3, 'Tesoureiro'),
(4, 'Funcionário'),
(5, 'EXANT'),
(6, 'PENSAL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `requerentes`
--

CREATE TABLE `requerentes` (
  `id` int NOT NULL,
  `saram` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `posto` varchar(10) NOT NULL,
  `situacao` varchar(10) NOT NULL,
  `nome` varchar(65) NOT NULL,
  `email` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `requerentes`
--

INSERT INTO `requerentes` (`id`, `saram`, `cpf`, `posto`, `situacao`, `nome`, `email`, `data`) VALUES
(1, '988.653-1', '656.654.546-54', '5', 'AT', 'ANDERSON NEVES PEREIRA', 'nevesanp1@fab.mil.br', '2019-12-15'),
(2, '987.654-3', '986.566.324-54', '6', 'R1', 'CARMEN LUCIA CHIPOLESCH DE ALMEIDA', 'c_luciia@gmail.com', '2019-12-15'),
(3, '888.888-8', '888.888.888-88', '8', 'AT', 'LORENA CAROLINE VIEIRA BARBOSA', 'lorelove@fab.mil.br', '2020-01-10'),
(4, '666.666-6', '666.666.666-66', '6', 'AT', 'ISABELA CHIPOLESCH DE ALMEIDA', 'isa123@gmail.com', '2020-01-18'),
(5, '449.350-8', '115.620.027-08', '8', 'AT', 'DANIEL ANGELO CHIPOLESCH DE ALMEIDA', 'chipoleschdaca@fab.mil.br', '2020-02-11'),
(6, '123.456-7', '321.654.987.78', '7', 'AT', 'JOAO FERNANDES', 'j.fernandes@fab.mil.br', '2020-02-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `senha` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfil` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_militar` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `perfil`, `id_militar`) VALUES
(3, 'LEONARDO CARUSO CARDOSO', 'caruso', '1d0185e4efea01f609610ed385608eef', 'EXANT', 2),
(5, 'MARIA ISABEL FERNANDES MACIEL', 'maria', '263bce650e68ab4e23f28263760b9fa5', 'Administrador', 5),
(6, 'GILCIMAR BATISTA DE ALMEIDA', 'gilcimar', '2a097f035264530daaf726381258ffb4', 'Funcionário', 9);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `militares`
--
ALTER TABLE `militares`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `perfis`
--
ALTER TABLE `perfis`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `requerentes`
--
ALTER TABLE `requerentes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `militares`
--
ALTER TABLE `militares`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `os`
--
ALTER TABLE `os`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `perfis`
--
ALTER TABLE `perfis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `requerentes`
--
ALTER TABLE `requerentes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
