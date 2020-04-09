-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 08-Abr-2020 às 23:29
-- Versão do servidor: 8.0.19-cluster
-- versão do PHP: 7.2.29-1+ubuntu18.04.1+deb.sury.org+1

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
-- Estrutura da tabela `exercicioanterior`
--

CREATE TABLE `exercicioanterior` (
  `id` int NOT NULL,
  `saram` varchar(10) DEFAULT NULL,
  `cpf` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `requerente` varchar(75) DEFAULT NULL,
  `sacador` varchar(75) DEFAULT NULL,
  `nup` varchar(21) DEFAULT NULL,
  `prioridade` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `data_criacao` date DEFAULT NULL,
  `direito_pleiteado` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `secao_origem` varchar(10) DEFAULT NULL,
  `obs` text,
  `data_saida` date DEFAULT NULL,
  `estado` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `secao_atual` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `exercicioanterior`
--

INSERT INTO `exercicioanterior` (`id`, `saram`, `cpf`, `requerente`, `sacador`, `nup`, `prioridade`, `data_criacao`, `direito_pleiteado`, `secao_origem`, `obs`, `data_saida`, `estado`, `secao_atual`) VALUES
(28, '5', '5', '5', '2', '65465.465465/2020-54', 'NÃO', '2020-01-09', '2', '2', 'Para lançamento no SISEX.', '2020-04-02', '13', '3'),
(31, '1', '1', '1', '2', '22222.222222/2222-22', 'NÃO', '2020-01-22', '13', '4', '', '2020-02-12', '11', '1'),
(33, '4', '4', '4', '', '33333.333333/3333-33', 'NÃO', '2020-01-22', '6', '2', '', '2020-02-11', '8', '3');

--
-- Acionadores `exercicioanterior`
--
DELIMITER $$
CREATE TRIGGER `historico_estado_secao_insert` AFTER INSERT ON `exercicioanterior` FOR EACH ROW BEGIN	
	INSERT INTO tb_historico_exant_estado_secao (data_anterior, data_novo, id_exant, estado_novo, secao_novo) VALUES (NEW.data_criacao, NEW.data_criacao, NEW.id, NEW.estado, NEW.secao_atual);	
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `historico_estado_secao_update` AFTER UPDATE ON `exercicioanterior` FOR EACH ROW BEGIN
	IF NEW.estado <> OLD.estado THEN
	INSERT INTO tb_historico_exant_estado_secao VALUES (NULL, OLD.data_saida, NEW.data_saida, NEW.id, OLD.estado, NEW.estado, OLD.secao_atual, NEW.secao_atual, NEW.obs);
	END IF;
END
$$
DELIMITER ;

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
  `senha` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfil` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `militares`
--

INSERT INTO `militares` (`id`, `saram`, `cpf`, `posto`, `nome`, `nomeguerra`, `senha`, `perfil`, `status`, `data`) VALUES
(2, '222.222-2', '222.222.222-22', '2S', 'LEONARDO CARUSO CARDOSO', 'CARUSO', '1d0185e4efea01f609610ed385608eef', 'EXANT', 'Aprovado', '2019-12-15'),
(3, '449.350-8', '115.620.027-08', '1T', 'DANIEL ANGELO CHIPOLESCH DE ALMEIDA', 'CHIPOLESCH', '', 'ADMIN', 'Aprovado', '2019-12-15'),
(5, '444.444-4', '444.444.444-44', '3S', 'MARIA ISABEL RODRIGUES SAMPAIO', 'MARIA ISABEL', '263bce650e68ab4e23f28263760b9fa5', 'ADMIN', 'Aprovado', '2019-12-17'),
(9, '111.111-1', '111.111.111-11', '3S', 'GILCIMAR BATISTA DE ALMEIDA', 'GILCIMAR', '2a097f035264530daaf726381258ffb4', 'Funcionário', 'Rejeitado', '2020-01-18'),
(10, '333.333-3', '333.333.333-33', '2T', 'CARMEN LUCIA CHIPOLESCH DE ALMEIDA', 'LUCIA', '', 'Tesoureiro', 'Aprovado', '2020-01-18'),
(11, '555.555-5', '555.555.555-55', '2T', 'VICTOR SHIGUEO SUGAHARA', 'SHIGUEO', 'e10adc3949ba59abbe56e057f20f883e', 'PENSAL', 'Aprovado', '2020-03-16'),
(12, '666.666-6', '666.666.666-66', 'SO', 'NELSON ASSUMPçãO DE MORAIS', 'NELSON', 'a4e360681676c770121e891f8c407572', 'EXANT', 'Aprovado', '2020-03-29');

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
(1, 'ADMIN'),
(5, 'EXANT'),
(6, 'PENSAL'),
(7, 'TESOU');

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
(1, '988.653-1', '656.654.546-52', '5', 'R1', 'ANDERSON NEVES PEREIRA', 'nevesanp1@fab.mil.br', '2019-12-15'),
(2, '987.654-3', '986.566.324-54', '6', 'R1', 'CARMEN LUCIA CHIPOLESCH DE ALMEIDA', 'c_luciia@gmail.com', '2019-12-15'),
(3, '888.888-8', '888.888.888-88', '8', 'AT', 'LORENA CAROLINE VIEIRA BARBOSA', 'lorelove@fab.mil.br', '2020-01-10'),
(4, '666.666-6', '666.666.666-66', '6', 'AT', 'ISABELA CHIPOLESCH DE ALMEIDA', 'isa123@gmail.com', '2020-01-18'),
(5, '449.350-8', '115.620.027-08', '8', 'AT', 'DANIEL ANGELO CHIPOLESCH DE ALMEIDA', 'chipoleschdaca@fab.mil.br', '2020-02-11'),
(6, '123.456-7', '321.654.987-78', '7', 'AT', 'JOÃO FERNANDES', 'j.fernandes@fab.mil.br', '2020-02-12'),
(8, '777.777-7', '777.777.777-78', '7', 'R1', 'ANDRÉ ANGELO DE ALMEIDA', 'aalmei56@gmail.com', '2020-03-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_direitoPleiteado_exant`
--

CREATE TABLE `tb_direitoPleiteado_exant` (
  `id` int NOT NULL,
  `direito` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_direitoPleiteado_exant`
--

INSERT INTO `tb_direitoPleiteado_exant` (`id`, `direito`, `status`) VALUES
(1, 'ADICIONAL DE COMPENSAÇÃO ORGÂNICA', 'Aprovado'),
(2, 'ADICIONAL DE HABILITAÇÃO', 'Aprovado'),
(3, 'ADICIONAL DE TEMPO DE SERVIÇO', 'Aprovado'),
(4, 'AUXÍLIO FUNERAL', 'Aprovado'),
(5, 'SOLDO', 'Aprovado'),
(6, 'AUXÍLIO FARDAMENTO', 'Aprovado'),
(7, 'ADICIONAL NATALINO', 'Aprovado'),
(8, 'AJUDA DE CUSTO', 'Aprovado'),
(9, 'AUXÍLIO INVALIDEZ', 'Aprovado'),
(10, 'AUXÍLIO NATALIDADE', 'Aprovado'),
(11, 'AUXÍLIO PRÉ-ESCOLAR', 'Aprovado'),
(12, 'COTA-PARTE', 'Aprovado'),
(13, 'ADICIONAL DE PERMANÊNCIA', 'Aprovado'),
(14, 'ADICIONAL DE DISPONIBILIDADE MILITAR', 'Aprovado'),
(15, 'ADICIONAL MILITAR', 'Aprovado'),
(16, 'PENSÃO MILITAR', 'Aprovado'),
(17, 'PROVENTOS', 'Aprovado'),
(18, 'REMUNERAÇÃO', 'Aprovado'),
(19, 'REPARAÇÃO ECONÔMICA', 'Aprovado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_estado_exant`
--

CREATE TABLE `tb_estado_exant` (
  `id` int NOT NULL,
  `estado` varchar(35) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_estado_exant`
--

INSERT INTO `tb_estado_exant` (`id`, `estado`, `status`) VALUES
(1, 'AGUARDANDO PUBLICAÇÃO', 'Aprovado'),
(2, 'ASSINATURA GESTOR', 'Aprovado'),
(3, 'AGUARDANDO ARQUIVAMENTO', 'Aprovado'),
(4, 'APROVADO', 'Aprovado'),
(5, 'CORRIGINDO PROCESSO', 'Aprovado'),
(6, 'ALTERANDO PUBLICAÇÃO', 'Aprovado'),
(7, 'AGUARDANDO MENSAGEM SIAFI', 'Aprovado'),
(8, 'CONFECCIONANDO PLANILHA', 'Aprovado'),
(9, 'CONFERÊNCIA SISEX', 'Aprovado'),
(10, 'CORRIGINDO PLANILHA', 'Aprovado'),
(11, 'CONFERÊNCIA ACI', 'Aprovado'),
(13, 'PARA LANÇAMENTO NO SISEX', 'Aprovado'),
(14, 'CRIADO', 'Aprovado'),
(15, 'ASSINATURA DO ORDENADOR', 'Aprovado'),
(16, 'ARQUIVADO', 'Aprovado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_historico_exant_estado_secao`
--

CREATE TABLE `tb_historico_exant_estado_secao` (
  `id` int NOT NULL,
  `data_anterior` datetime DEFAULT NULL,
  `data_novo` datetime DEFAULT NULL,
  `id_exant` int DEFAULT NULL,
  `estado_anterior` varchar(35) DEFAULT NULL,
  `estado_novo` varchar(35) DEFAULT NULL,
  `secao_anterior` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `secao_novo` varchar(10) DEFAULT NULL,
  `obs_exant` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_historico_exant_estado_secao`
--

INSERT INTO `tb_historico_exant_estado_secao` (`id`, `data_anterior`, `data_novo`, `id_exant`, `estado_anterior`, `estado_novo`, `secao_anterior`, `secao_novo`, `obs_exant`) VALUES
(3, NULL, '2020-01-23 19:00:03', 9, '2', '8', '8', '3', NULL),
(4, NULL, '2020-01-25 19:06:43', 5, '14', '11', '2', '1', NULL),
(6, '2020-01-25 20:35:32', '2020-01-25 20:35:32', 4, '2', '6', '1', '4', NULL),
(7, '2020-01-25 20:35:32', '2020-01-25 20:35:38', 4, '6', '3', '4', '5', NULL),
(8, '2020-01-25 20:35:32', '2020-01-25 20:35:45', 4, '3', '11', '5', '1', NULL),
(9, '2020-01-25 20:35:32', '2020-01-25 23:58:48', 4, '11', '3', '1', '3', NULL),
(10, '2020-01-25 20:35:32', '2020-01-02 00:00:00', 4, '3', '4', '3', '3', NULL),
(12, NULL, '2018-06-06 00:00:00', 21, NULL, '14', NULL, '2', NULL),
(13, NULL, '2018-08-01 00:00:00', 21, '14', '8', '2', '3', NULL),
(14, NULL, '2018-09-12 00:00:00', 21, '8', '11', '3', '1', ''),
(15, NULL, '2018-10-16 00:00:00', 21, '11', '10', '1', '3', ''),
(16, '2020-01-02 00:00:00', '2020-01-17 00:00:00', 4, '4', '2', '3', '3', ''),
(17, '2020-01-17 00:00:00', '2020-01-15 00:00:00', 4, '2', '11', '3', '1', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 12px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>'),
(18, NULL, '2020-01-01 00:00:00', 22, NULL, '14', NULL, '2', NULL),
(19, NULL, '2020-01-16 00:00:00', 4, '11', '13', '1', '3', '<p style=\"text-align: justify; \"><span style=\"font-family: Arial;\">﻿</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span><br></p>'),
(20, NULL, '2020-01-18 00:00:00', 4, '13', '9', '3', '6', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum\r\n                        fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut \r\nofficiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic\r\n tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(21, NULL, '2020-01-19 00:00:00', 4, '9', '10', '6', '3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(22, NULL, '2020-01-20 00:00:00', 4, '10', '9', '3', '6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(23, NULL, '2020-01-21 00:00:00', 4, '9', '10', '6', '3', 'Quando você numera manualmente os itens de uma lista, o Word converte os números digitados em numeração automática.\r\n\r\nPara criar automaticamente uma lista numerada à medida que digitar, siga estes passos:\r\n\r\nDigite “1 ponto”, “1 traço”, “a traço” ou “a sinal de fecha parênteses”, seguido de um espaço e do texto desejado. Quando você pressionar ENTER para adicionar o item seguinte da lista, o Word inserirá automaticamente o número ou a letra, portanto você só precisa digitar o texto.\r\n\r\nPara concluir a lista, pressione ENTER duas vezes. Você também pode concluir a lista pressionando Backspace para excluir o último número da lista.'),
(24, NULL, '2020-01-22 00:00:00', 4, '10', '11', '3', '1', '<ol><li><span style=\"color: rgb(0, 0, 128); font-family: Verdana; font-size: medium; text-align: justify;\">Quando você numera manualmente os itens de uma lista, o Word converte os números digitados em numeração automática.<br></span></li><li>Para criar automaticamente uma lista numerada à medida que digitar, siga estes passos:</li><li>Digite “1 ponto”, “1 traço”, “a traço” ou “a sinal de fecha parênteses”, seguido de um espaço e do texto desejado. Quando você pressionar ENTER para adicionar o item seguinte da lista, o Word inserirá automaticamente o número ou a letra, portanto você só precisa digitar o texto.</li><li>Para concluir a lista, pressione ENTER duas vezes. Você também pode concluir a lista pressionando Backspace para excluir o último número da lista.<br></li></ol>'),
(25, NULL, '2020-01-23 00:00:00', 4, '11', '13', '1', '3', '<ol style=\"color: rgb(33, 37, 41); background-color: rgba(0, 0, 0, 0.05);\"><li><span style=\"color: rgb(0, 0, 128); font-family: Verdana; font-size: medium; text-align: justify;\">Quando você numera manualmente os itens de uma lista, o Word converte os números digitados em numeração automática.<br></span></li><li>Para criar automaticamente uma lista numerada à medida que digitar, siga estes passos:</li><li>Digite “1 ponto”, “1 traço”, “a traço” ou “a sinal de fecha parênteses”, seguido de um espaço e do texto desejado. Quando você pressionar ENTER para adicionar o item seguinte da lista, o Word inserirá automaticamente o número ou a letra, portanto você só precisa digitar o texto.</li><li>Para concluir a lista, pressione ENTER duas vezes. Você também pode concluir a lista pressionando Backspace para excluir o último número da lista.</li></ol>'),
(26, NULL, '2020-01-24 00:00:00', 4, '13', '9', '3', '6', '<ol style=\"color: rgb(33, 37, 41); background-color: rgba(0, 0, 0, 0.05);\"><li><span style=\"color: rgb(0, 0, 128); font-family: Verdana; font-size: medium; text-align: justify;\">Quando você numera manualmente os itens de uma lista, o Word converte os números digitados em numeração automática.<br></span></li><li>Para criar automaticamente uma lista numerada à medida que digitar, siga estes passos:</li><li>Digite “1 ponto”, “1 traço”, “a traço” ou “a sinal de fecha parênteses”, seguido de um espaço e do texto desejado. Quando você pressionar ENTER para adicionar o item seguinte da lista, o Word inserirá automaticamente o número ou a letra, portanto você só precisa digitar o texto.</li><li>Para concluir a lista, pressione ENTER duas vezes. Você também pode concluir a lista pressionando Backspace para excluir o último número da lista.</li></ol>'),
(27, NULL, '2018-02-06 00:00:00', 23, NULL, '14', NULL, '2', NULL),
(28, NULL, '2018-12-17 00:00:00', 24, NULL, '14', NULL, '4', NULL),
(29, NULL, '2018-06-13 00:00:00', 25, NULL, '14', NULL, '2', NULL),
(30, NULL, '2020-02-11 00:00:00', 25, '14', '8', '2', '3', 'Processo criado e enviado para confecção de planilha.'),
(31, NULL, '2018-09-02 00:00:00', 26, NULL, '14', NULL, '4', NULL),
(32, NULL, '2020-03-20 00:00:00', 27, NULL, '14', NULL, '4', NULL),
(33, NULL, '2020-02-10 00:00:00', 22, '14', '8', '2', '3', 'Demorou muito por causa do carnaval e do  COVID-19.'),
(34, '2020-01-09 00:00:00', '2020-01-09 00:00:00', 28, NULL, '14', NULL, '2', NULL),
(35, '2020-01-09 00:00:00', '2020-01-13 00:00:00', 28, '14', '8', '2', '3', ''),
(36, '2020-01-24 00:00:00', '2020-03-03 00:00:00', 4, '9', '10', '6', '3', 'Processo não foi aceito.'),
(37, '2020-03-03 00:00:00', '2020-03-10 00:00:00', 4, '10', '11', '3', '1', 'Processo corrigido conforme solicitação do SISEX.'),
(38, '2020-01-13 00:00:00', '2020-01-15 00:00:00', 28, '8', '11', '3', '1', 'Restituo após correção da planilha.'),
(39, '2020-01-15 00:00:00', '2020-02-10 00:00:00', 28, '11', '15', '1', '3', ''),
(40, '2020-02-10 00:00:00', '2020-02-19 00:00:00', 28, '15', '1', '3', '2', ''),
(41, '2020-01-09 00:00:00', NULL, 29, NULL, '14', NULL, '2', NULL),
(42, NULL, '2020-01-22 00:00:00', 30, NULL, '14', NULL, '4', NULL),
(43, '2020-01-22 00:00:00', '2020-01-22 00:00:00', 31, NULL, '14', NULL, '4', NULL),
(44, '2020-01-22 00:00:00', '2020-02-06 00:00:00', 31, '14', '8', '4', '3', ''),
(45, '2020-02-06 00:00:00', '2020-02-12 00:00:00', 31, '8', '11', '3', '1', ''),
(46, '2020-01-08 00:00:00', '2020-01-08 00:00:00', 32, NULL, '14', NULL, '2', NULL),
(47, '2020-01-08 00:00:00', '2020-02-11 00:00:00', 32, '14', '8', '2', '3', ''),
(48, '2020-01-22 00:00:00', '2020-01-22 00:00:00', 33, NULL, '14', NULL, '2', NULL),
(49, '2020-01-22 00:00:00', '2020-02-11 00:00:00', 33, '14', '8', '2', '3', ''),
(50, '2020-02-19 00:00:00', '2020-04-02 00:00:00', 28, '1', '13', '2', '3', 'Para lançamento no SISEX.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_posto`
--

CREATE TABLE `tb_posto` (
  `id` int NOT NULL,
  `posto` varchar(10) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_posto`
--

INSERT INTO `tb_posto` (`id`, `posto`, `status`) VALUES
(1, 'TB', 'Aprovado'),
(2, 'MB', 'Aprovado'),
(3, 'BR', 'Aprovado'),
(4, 'CL', 'Aprovado'),
(5, 'TC', 'Aprovado'),
(6, 'MJ', 'Aprovado'),
(7, 'CP', 'Aprovado'),
(8, '1T', 'Aprovado'),
(9, '2T', 'Aprovado'),
(10, 'AP', 'Aprovado'),
(11, 'SO', 'Aprovado'),
(12, '1S', 'Aprovado'),
(13, '2S', 'Aprovado'),
(14, '3S', 'Aprovado'),
(15, 'CB', 'Aprovado'),
(16, 'TM', 'Aprovado'),
(17, 'S1', 'Aprovado'),
(18, 'T1', 'Aprovado'),
(19, 'S2', 'Aprovado'),
(20, 'T2', 'Aprovado'),
(21, 'SD', 'Aprovado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_secoes_exant`
--

CREATE TABLE `tb_secoes_exant` (
  `id` int NOT NULL,
  `secao` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_secoes_exant`
--

INSERT INTO `tb_secoes_exant` (`id`, `secao`, `status`) VALUES
(1, 'ACI-1', 'Aprovado'),
(2, 'DP-1', 'Aprovado'),
(3, 'DP-3', 'Aprovado'),
(4, 'DP-4', 'Aprovado'),
(5, 'ES-LS', 'Aprovado'),
(6, 'SDPP', 'Aprovado');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `exercicioanterior`
--
ALTER TABLE `exercicioanterior`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `militares`
--
ALTER TABLE `militares`
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
-- Índices para tabela `tb_direitoPleiteado_exant`
--
ALTER TABLE `tb_direitoPleiteado_exant`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_estado_exant`
--
ALTER TABLE `tb_estado_exant`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_historico_exant_estado_secao`
--
ALTER TABLE `tb_historico_exant_estado_secao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_posto`
--
ALTER TABLE `tb_posto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_secoes_exant`
--
ALTER TABLE `tb_secoes_exant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `exercicioanterior`
--
ALTER TABLE `exercicioanterior`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `militares`
--
ALTER TABLE `militares`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `perfis`
--
ALTER TABLE `perfis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `requerentes`
--
ALTER TABLE `requerentes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tb_direitoPleiteado_exant`
--
ALTER TABLE `tb_direitoPleiteado_exant`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tb_estado_exant`
--
ALTER TABLE `tb_estado_exant`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tb_historico_exant_estado_secao`
--
ALTER TABLE `tb_historico_exant_estado_secao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `tb_posto`
--
ALTER TABLE `tb_posto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tb_secoes_exant`
--
ALTER TABLE `tb_secoes_exant`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
