DROP TABLE IF EXISTS exercicioanterior;

CREATE TABLE `exercicioanterior` (
  `id` int NOT NULL AUTO_INCREMENT,
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
  `secao_atual` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

INSERT INTO exercicioanterior VALUES("4","1","1","1","2","79879.654654/3212-22","NÃO","2018-06-12","7","2","<ol style=\"color: rgb(33, 37, 41); background-color: rgba(0, 0, 0, 0.05);\"><li><span style=\"color: rgb(0, 0, 128); font-family: Verdana; font-size: medium; text-align: justify;\">Quando você numera manualmente os itens de uma lista, o Word converte os números digitados em numeração automática.<br></span></li><li>Para criar automaticamente uma lista numerada à medida que digitar, siga estes passos:</li><li>Digite “1 ponto”, “1 traço”, “a traço” ou “a sinal de fecha parênteses”, seguido de um espaço e do texto desejado. Quando você pressionar ENTER para adicionar o item seguinte da lista, o Word inserirá automaticamente o número ou a letra, portanto você só precisa digitar o texto.</li><li>Para concluir a lista, pressione ENTER duas vezes. Você também pode concluir a lista pressionando Backspace para excluir o último número da lista.</li></ol>","2020-01-24","9","6");
INSERT INTO exercicioanterior VALUES("5","1","1","1","2","89645.679787/2017-98","SIM","2018-02-06","8","4",NULL,NULL,"11","1");
INSERT INTO exercicioanterior VALUES("21","3","3","3","2","22222.222222/2222-22","NÃO","2018-06-06","2","2",NULL,"2018-10-16","10","3");
INSERT INTO exercicioanterior VALUES("22","4","4","4","2","88888.888888/8888-88","NÃO","2020-01-01","6","2",NULL,NULL,"14","2");
INSERT INTO exercicioanterior VALUES("23","5","5","5","2","55555.555555/5555-66","NÃO","2018-02-06","15","2",NULL,NULL,"14","2");
INSERT INTO exercicioanterior VALUES("24","2","2","2","2","99999.999999/9999-99","NÃO","2018-12-17","15","4",NULL,NULL,"14","4");
INSERT INTO exercicioanterior VALUES("25","6","6","6","2","76532.000738/2018-65","NÃO","2018-06-13","6","2","Processo criado e enviado para confecção de planilha.","2020-02-11","8","3");


DROP TABLE IF EXISTS militares;

CREATE TABLE `militares` (
  `id` int NOT NULL AUTO_INCREMENT,
  `saram` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cpf` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `posto` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nomeguerra` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfil` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` varchar(20) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO militares VALUES("2","222.222-2","222.222.222-22","2S","LEONARDO CARUSO CARDOSO","CARUSO","EXANT","Aprovado","2019-12-15");
INSERT INTO militares VALUES("3","449.350-8","115.620.027-08","1T","DANIEL ANGELO CHIPOLESCH DE ALMEIDA","CHIPOLESCH","Administrador","Aprovado","2019-12-15");
INSERT INTO militares VALUES("5","444.444-4","444.444.444-44","3S","MARIA ISABEL FERNANDES MACIEL","MARIA ISABEL","Administrador","Aprovado","2019-12-17");
INSERT INTO militares VALUES("9","111.111-1","111.111.111-11","3S","GILCIMAR BATISTA DE ALMEIDA","GILCIMAR","Funcionário","Aprovado","2020-01-18");
INSERT INTO militares VALUES("10","333.333-3","333.333.333-33","2T","CARMEN LUCIA CHIPOLESCH DE ALMEIDA","LUCIA","Tesoureiro","Aprovado","2020-01-18");


DROP TABLE IF EXISTS orcamentos;

CREATE TABLE `orcamentos` (
  `id` int NOT NULL AUTO_INCREMENT,
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
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO orcamentos VALUES("4","656.654.546-54","5","Galaxy S10","464","TELA RACHADA","Não há","Não há","4000.00","tela original samsung","1000.00","5000.00","10.00","4990.00","Cartão","2019-12-15","2019-12-15","2020-01-24","Aprovado");
INSERT INTO orcamentos VALUES("5","656.654.546-54","9","IPHO58","566988","TELA RACHADA","Não há.","Não há","4000.00","Botão liga e desliga","8000.00","12000.00","1500.00","10500.00","Cartão","2019-12-16","2019-12-16","2020-01-10","Aprovado");
INSERT INTO orcamentos VALUES("6","656.654.546-54","5","IPHONE X","33333","TELA RACHADA","Não há","Não há","1230.00","Botão liga e desliga","243.00","1473.00","0.00","1473.00",NULL,"2019-12-16","2020-01-19",NULL,"Cancelado");
INSERT INTO orcamentos VALUES("7","986.566.324-54","9","Galaxy S10","566988","TELA RACHADA","Trocar tudão.","Não há","4000.00","Tela original apple","8000.00","12000.00","1000.00","11000.00","Cartão","2019-12-17","2019-12-17","2019-12-17","Aprovado");
INSERT INTO orcamentos VALUES("8","656.654.546-54","5","IPHONE X","4875784","TELA RACHADA","Não há","Não há","4000.00","Botão liga e desliga","700.00","4700.00","0.00","4700.00",NULL,"2019-12-31","2020-01-10",NULL,"Cancelado");
INSERT INTO orcamentos VALUES("9","888.888.888-88","5","Ipad Air 2","33333","Botão liga/desliga",NULL,"Não há",NULL,NULL,NULL,NULL,NULL,"0.00",NULL,"2020-01-10",NULL,NULL,"Aberto");
INSERT INTO orcamentos VALUES("10","666.666.666-66","9","IPHO58","666666666666666","Bateria","Trocar telefone","Não há","4000.00","Não há","700.00","4700.00","500.00","4200.00","Cartão","2020-01-18","2020-01-18","2020-01-18","Aprovado");


DROP TABLE IF EXISTS os;

CREATE TABLE `os` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_orc` int NOT NULL,
  `requerente` varchar(50) NOT NULL,
  `produto` varchar(25) NOT NULL,
  `tecnico` varchar(50) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `data_abertura` date NOT NULL,
  `data_fechamento` date DEFAULT NULL,
  `garantia` varchar(20) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO os VALUES("1","4","656.654.546-54","Galaxy S10","5","3500.00","2019-12-15","2019-12-17","Não há","Aprovada");
INSERT INTO os VALUES("2","7","986.566.324-54","Galaxy S10","5","11000.00","2019-12-17","2020-01-12","90 dias","Aprovada");
INSERT INTO os VALUES("3","5","656.654.546-54","IPHO58","9","10500.00","2020-01-10",NULL,NULL,"Aberta");
INSERT INTO os VALUES("4","10","666.666.666-66","IPHO58","9","4200.00","2020-01-18","2020-01-18","45 dias","Aprovada");
INSERT INTO os VALUES("5","4","656.654.546-54","Galaxy S10","5","4990.00","2020-01-24",NULL,NULL,"Aberta");


DROP TABLE IF EXISTS perfis;

CREATE TABLE `perfis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `perfil` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO perfis VALUES("1","Administrador");
INSERT INTO perfis VALUES("2","Gerente");
INSERT INTO perfis VALUES("3","Tesoureiro");
INSERT INTO perfis VALUES("4","Funcionário");
INSERT INTO perfis VALUES("5","EXANT");
INSERT INTO perfis VALUES("6","PENSAL");


DROP TABLE IF EXISTS requerentes;

CREATE TABLE `requerentes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `saram` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `posto` varchar(10) NOT NULL,
  `situacao` varchar(10) NOT NULL,
  `nome` varchar(65) NOT NULL,
  `email` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO requerentes VALUES("1","988.653-1","656.654.546-52","5","R1","ANDERSON NEVES PEREIRA","nevesanp1@fab.mil.br","2019-12-15");
INSERT INTO requerentes VALUES("2","987.654-3","986.566.324-54","6","R1","CARMEN LUCIA CHIPOLESCH DE ALMEIDA","c_luciia@gmail.com","2019-12-15");
INSERT INTO requerentes VALUES("3","888.888-8","888.888.888-88","8","AT","LORENA CAROLINE VIEIRA BARBOSA","lorelove@fab.mil.br","2020-01-10");
INSERT INTO requerentes VALUES("4","666.666-6","666.666.666-66","6","AT","ISABELA CHIPOLESCH DE ALMEIDA","isa123@gmail.com","2020-01-18");
INSERT INTO requerentes VALUES("5","449.350-8","115.620.027-08","8","AT","DANIEL ANGELO CHIPOLESCH DE ALMEIDA","chipoleschdaca@fab.mil.br","2020-02-11");
INSERT INTO requerentes VALUES("6","123.456-7","321.654.987-78","7","AT","JOÃO FERNANDES","j.fernandes@fab.mil.br","2020-02-12");


DROP TABLE IF EXISTS tb_direitoPleiteado_exant;

CREATE TABLE `tb_direitoPleiteado_exant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `direito` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

INSERT INTO tb_direitoPleiteado_exant VALUES("1","ADICIONAL DE COMPENSAÇÃO ORGÂNICA","Aprovado");
INSERT INTO tb_direitoPleiteado_exant VALUES("2","ADICIONAL DE HABILITAÇÃO","Aprovado");
INSERT INTO tb_direitoPleiteado_exant VALUES("3","ADICIONAL DE TEMPO DE SERVIÇO","Aprovado");
INSERT INTO tb_direitoPleiteado_exant VALUES("4","AUXÍLIO FUNERAL","Aprovado");
INSERT INTO tb_direitoPleiteado_exant VALUES("5","SOLDO","Aprovado");
INSERT INTO tb_direitoPleiteado_exant VALUES("6","AUXÍLIO FARDAMENTO","Aprovado");
INSERT INTO tb_direitoPleiteado_exant VALUES("7","ADICIONAL NATALINO","Aprovado");
INSERT INTO tb_direitoPleiteado_exant VALUES("8","AJUDA DE CUSTO","Aprovado");
INSERT INTO tb_direitoPleiteado_exant VALUES("9","AUXÍLIO INVALIDEZ","Aprovado");
INSERT INTO tb_direitoPleiteado_exant VALUES("10","AUXÍLIO NATALIDADE","Aprovado");
INSERT INTO tb_direitoPleiteado_exant VALUES("11","AUXÍLIO PRÉ-ESCOLAR","Aprovado");
INSERT INTO tb_direitoPleiteado_exant VALUES("12","COTA-PARTE","Aprovado");
INSERT INTO tb_direitoPleiteado_exant VALUES("13","ADICIONAL DE PERMANÊNCIA","Aprovado");
INSERT INTO tb_direitoPleiteado_exant VALUES("14","ADICIONAL DE DISPONIBILIDADE MILITAR","Aprovado");
INSERT INTO tb_direitoPleiteado_exant VALUES("15","ADICIONAL MILITAR","Aprovado");
INSERT INTO tb_direitoPleiteado_exant VALUES("16","PENSÃO MILITAR","Aprovado");
INSERT INTO tb_direitoPleiteado_exant VALUES("17","PROVENTOS","Aprovado");
INSERT INTO tb_direitoPleiteado_exant VALUES("18","REMUNERAÇÃO","Aprovado");
INSERT INTO tb_direitoPleiteado_exant VALUES("19","REPARAÇÃO ECONÔMICA","Aprovado");


DROP TABLE IF EXISTS tb_estado_exant;

CREATE TABLE `tb_estado_exant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `estado` varchar(35) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO tb_estado_exant VALUES("1","AGUARDANDO PUBLICAÇÃO","Aprovado");
INSERT INTO tb_estado_exant VALUES("2","ASSINATURA GESTOR","Aprovado");
INSERT INTO tb_estado_exant VALUES("3","AGUARDANDO ARQUIVAMENTO","Aprovado");
INSERT INTO tb_estado_exant VALUES("4","APROVADO","Aprovado");
INSERT INTO tb_estado_exant VALUES("5","CORRIGINDO PROCESSO","Aprovado");
INSERT INTO tb_estado_exant VALUES("6","ALTERANDO PUBLICAÇÃO","Aprovado");
INSERT INTO tb_estado_exant VALUES("7","AGUARDANDO MENSAGEM SIAFI","Aprovado");
INSERT INTO tb_estado_exant VALUES("8","CONFECCIONANDO PLANILHA","Aprovado");
INSERT INTO tb_estado_exant VALUES("9","CONFERÊNCIA SISEX","Aprovado");
INSERT INTO tb_estado_exant VALUES("10","CORRIGINDO PLANILHA","Aprovado");
INSERT INTO tb_estado_exant VALUES("11","CONFERÊNCIA ACI","Aprovado");
INSERT INTO tb_estado_exant VALUES("13","PARA LANÇAMENTO NO SISEX","Aprovado");
INSERT INTO tb_estado_exant VALUES("14","CRIADO","Aprovado");


DROP TABLE IF EXISTS tb_historico_exant_estado_secao;

CREATE TABLE `tb_historico_exant_estado_secao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` datetime DEFAULT NULL,
  `id_exant` int DEFAULT NULL,
  `estado_anterior` varchar(35) DEFAULT NULL,
  `estado_novo` varchar(35) DEFAULT NULL,
  `secao_anterior` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `secao_novo` varchar(10) DEFAULT NULL,
  `obs_exant` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

INSERT INTO tb_historico_exant_estado_secao VALUES("3","2020-01-23 19:00:03","9","2","8","8","3",NULL);
INSERT INTO tb_historico_exant_estado_secao VALUES("4","2020-01-25 19:06:43","5","14","11","2","1",NULL);
INSERT INTO tb_historico_exant_estado_secao VALUES("6","2020-01-25 20:35:32","4","2","6","1","4",NULL);
INSERT INTO tb_historico_exant_estado_secao VALUES("7","2020-01-25 20:35:38","4","6","3","4","5",NULL);
INSERT INTO tb_historico_exant_estado_secao VALUES("8","2020-01-25 20:35:45","4","3","11","5","1",NULL);
INSERT INTO tb_historico_exant_estado_secao VALUES("9","2020-01-25 23:58:48","4","11","3","1","3",NULL);
INSERT INTO tb_historico_exant_estado_secao VALUES("10","2020-01-02 00:00:00","4","3","4","3","3",NULL);
INSERT INTO tb_historico_exant_estado_secao VALUES("12","2018-06-06 00:00:00","21",NULL,"14",NULL,"2",NULL);
INSERT INTO tb_historico_exant_estado_secao VALUES("13","2018-08-01 00:00:00","21","14","8","2","3",NULL);
INSERT INTO tb_historico_exant_estado_secao VALUES("14","2018-09-12 00:00:00","21","8","11","3","1",NULL);
INSERT INTO tb_historico_exant_estado_secao VALUES("15","2018-10-16 00:00:00","21","11","10","1","3",NULL);
INSERT INTO tb_historico_exant_estado_secao VALUES("16","2020-01-17 00:00:00","4","4","2","3","3",NULL);
INSERT INTO tb_historico_exant_estado_secao VALUES("17","2020-01-15 00:00:00","4","2","11","3","1","<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 12px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>");
INSERT INTO tb_historico_exant_estado_secao VALUES("18","2020-01-01 00:00:00","22",NULL,"14",NULL,"2",NULL);
INSERT INTO tb_historico_exant_estado_secao VALUES("19","2020-01-16 00:00:00","4","11","13","1","3","<p style=\"text-align: justify; \"><span style=\"font-family: Arial;\">﻿</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span><br></p>");
INSERT INTO tb_historico_exant_estado_secao VALUES("20","2020-01-18 00:00:00","4","13","9","3","6","At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum\n                        fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut \nofficiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic\n tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.");
INSERT INTO tb_historico_exant_estado_secao VALUES("21","2020-01-19 00:00:00","4","9","10","6","3","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");
INSERT INTO tb_historico_exant_estado_secao VALUES("22","2020-01-20 00:00:00","4","10","9","3","6","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");
INSERT INTO tb_historico_exant_estado_secao VALUES("23","2020-01-21 00:00:00","4","9","10","6","3","Quando você numera manualmente os itens de uma lista, o Word converte os números digitados em numeração automática.\n\nPara criar automaticamente uma lista numerada à medida que digitar, siga estes passos:\n\nDigite “1 ponto”, “1 traço”, “a traço” ou “a sinal de fecha parênteses”, seguido de um espaço e do texto desejado. Quando você pressionar ENTER para adicionar o item seguinte da lista, o Word inserirá automaticamente o número ou a letra, portanto você só precisa digitar o texto.\n\nPara concluir a lista, pressione ENTER duas vezes. Você também pode concluir a lista pressionando Backspace para excluir o último número da lista.");
INSERT INTO tb_historico_exant_estado_secao VALUES("24","2020-01-22 00:00:00","4","10","11","3","1","<ol><li><span style=\"color: rgb(0, 0, 128); font-family: Verdana; font-size: medium; text-align: justify;\">Quando você numera manualmente os itens de uma lista, o Word converte os números digitados em numeração automática.<br></span></li><li>Para criar automaticamente uma lista numerada à medida que digitar, siga estes passos:</li><li>Digite “1 ponto”, “1 traço”, “a traço” ou “a sinal de fecha parênteses”, seguido de um espaço e do texto desejado. Quando você pressionar ENTER para adicionar o item seguinte da lista, o Word inserirá automaticamente o número ou a letra, portanto você só precisa digitar o texto.</li><li>Para concluir a lista, pressione ENTER duas vezes. Você também pode concluir a lista pressionando Backspace para excluir o último número da lista.<br></li></ol>");
INSERT INTO tb_historico_exant_estado_secao VALUES("25","2020-01-23 00:00:00","4","11","13","1","3","<ol style=\"color: rgb(33, 37, 41); background-color: rgba(0, 0, 0, 0.05);\"><li><span style=\"color: rgb(0, 0, 128); font-family: Verdana; font-size: medium; text-align: justify;\">Quando você numera manualmente os itens de uma lista, o Word converte os números digitados em numeração automática.<br></span></li><li>Para criar automaticamente uma lista numerada à medida que digitar, siga estes passos:</li><li>Digite “1 ponto”, “1 traço”, “a traço” ou “a sinal de fecha parênteses”, seguido de um espaço e do texto desejado. Quando você pressionar ENTER para adicionar o item seguinte da lista, o Word inserirá automaticamente o número ou a letra, portanto você só precisa digitar o texto.</li><li>Para concluir a lista, pressione ENTER duas vezes. Você também pode concluir a lista pressionando Backspace para excluir o último número da lista.</li></ol>");
INSERT INTO tb_historico_exant_estado_secao VALUES("26","2020-01-24 00:00:00","4","13","9","3","6","<ol style=\"color: rgb(33, 37, 41); background-color: rgba(0, 0, 0, 0.05);\"><li><span style=\"color: rgb(0, 0, 128); font-family: Verdana; font-size: medium; text-align: justify;\">Quando você numera manualmente os itens de uma lista, o Word converte os números digitados em numeração automática.<br></span></li><li>Para criar automaticamente uma lista numerada à medida que digitar, siga estes passos:</li><li>Digite “1 ponto”, “1 traço”, “a traço” ou “a sinal de fecha parênteses”, seguido de um espaço e do texto desejado. Quando você pressionar ENTER para adicionar o item seguinte da lista, o Word inserirá automaticamente o número ou a letra, portanto você só precisa digitar o texto.</li><li>Para concluir a lista, pressione ENTER duas vezes. Você também pode concluir a lista pressionando Backspace para excluir o último número da lista.</li></ol>");
INSERT INTO tb_historico_exant_estado_secao VALUES("27","2018-02-06 00:00:00","23",NULL,"14",NULL,"2",NULL);
INSERT INTO tb_historico_exant_estado_secao VALUES("28","2018-12-17 00:00:00","24",NULL,"14",NULL,"4",NULL);
INSERT INTO tb_historico_exant_estado_secao VALUES("29","2018-06-13 00:00:00","25",NULL,"14",NULL,"2",NULL);
INSERT INTO tb_historico_exant_estado_secao VALUES("30","2020-02-11 00:00:00","25","14","8","2","3","Processo criado e enviado para confecção de planilha.");


DROP TABLE IF EXISTS tb_posto;

CREATE TABLE `tb_posto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `posto` varchar(10) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

INSERT INTO tb_posto VALUES("1","TB","Aprovado");
INSERT INTO tb_posto VALUES("2","MB","Aprovado");
INSERT INTO tb_posto VALUES("3","BR","Aprovado");
INSERT INTO tb_posto VALUES("4","CL","Aprovado");
INSERT INTO tb_posto VALUES("5","TC","Aprovado");
INSERT INTO tb_posto VALUES("6","MJ","Aprovado");
INSERT INTO tb_posto VALUES("7","CP","Aprovado");
INSERT INTO tb_posto VALUES("8","1T","Aprovado");
INSERT INTO tb_posto VALUES("9","2T","Aprovado");
INSERT INTO tb_posto VALUES("10","AP","Aprovado");
INSERT INTO tb_posto VALUES("11","SO","Aprovado");
INSERT INTO tb_posto VALUES("12","1S","Aprovado");
INSERT INTO tb_posto VALUES("13","2S","Aprovado");
INSERT INTO tb_posto VALUES("14","3S","Aprovado");
INSERT INTO tb_posto VALUES("15","CB","Aprovado");
INSERT INTO tb_posto VALUES("16","TM","Aprovado");
INSERT INTO tb_posto VALUES("17","S1","Aprovado");
INSERT INTO tb_posto VALUES("18","T1","Aprovado");
INSERT INTO tb_posto VALUES("19","S2","Aprovado");
INSERT INTO tb_posto VALUES("20","T2","Aprovado");
INSERT INTO tb_posto VALUES("21","SD","Aprovado");


DROP TABLE IF EXISTS tb_secoes_exant;

CREATE TABLE `tb_secoes_exant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `secao` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO tb_secoes_exant VALUES("1","ACI-1","Aprovado");
INSERT INTO tb_secoes_exant VALUES("2","DP-1","Aprovado");
INSERT INTO tb_secoes_exant VALUES("3","DP-3","Aprovado");
INSERT INTO tb_secoes_exant VALUES("4","DP-4","Aprovado");
INSERT INTO tb_secoes_exant VALUES("5","ES-LS","Aprovado");
INSERT INTO tb_secoes_exant VALUES("6","SDPP","Aprovado");


DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `senha` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfil` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_militar` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO usuarios VALUES("3","LEONARDO CARUSO CARDOSO","caruso","1d0185e4efea01f609610ed385608eef","EXANT","2");
INSERT INTO usuarios VALUES("5","MARIA ISABEL FERNANDES MACIEL","maria","263bce650e68ab4e23f28263760b9fa5","Administrador","5");
INSERT INTO usuarios VALUES("6","GILCIMAR BATISTA DE ALMEIDA","gilcimar","2a097f035264530daaf726381258ffb4","Funcionário","9");


