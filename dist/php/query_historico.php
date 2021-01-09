<?php

    $id = "";
    $id_req = "";
    $direito_pleiteado = "";
    $estado = "";
    $secao = "";
    $posto = "";
    $count_direito = "";
    $count_estado = "";
    $count_secao = "";
    $count_posto = "";

    // Filtro para POSTO
    if (isset($_GET['buttonPesquisar']) and $_GET['txtposto'] != '') {

      $nome = $_GET['txtposto'];

      $query_posto = "SELECT r.posto, p.posto AS nome_posto, COUNT(r.posto) FROM exercicioanterior AS e LEFT JOIN requerentes AS r ON e.requerente = r.id LEFT JOIN tb_posto AS p ON p.id = r.posto WHERE r.posto = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY r.posto ORDER BY p.posto";
      $result_posto = mysqli_query($conexao, $query_posto);
      while ($res_posto = mysqli_fetch_array($result_posto)) {

        $posto = $posto . '"' . $res_posto["nome_posto"] . '",';
        $count_posto = $count_posto . '"' . $res_posto["COUNT(r.posto)"] . '",';

        $posto =  trim($posto);
        $count_posto =  trim($count_posto);
      }

      $query_direito = "SELECT e.direito_pleiteado, d.id, d.direito AS nome_direito, r.posto, p.posto, COUNT(e.direito_pleiteado) FROM exercicioanterior AS e LEFT JOIN tb_direitopleiteado_exant AS d ON e.direito_pleiteado = d.id LEFT JOIN requerentes AS r ON e.requerente = r.id LEFT JOIN tb_posto AS p ON p.id = r.posto WHERE r.posto = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY direito_pleiteado ORDER BY d.direito";
      $result_direito = mysqli_query($conexao, $query_direito);
      while ($res_direito = mysqli_fetch_array($result_direito)) {

        $direito_pleiteado = $direito_pleiteado . '"' . $res_direito["nome_direito"] . '",';
        $count_direito = $count_direito . '"' . $res_direito["COUNT(e.direito_pleiteado)"] . '",';

        $direito_pleiteado =  trim($direito_pleiteado);
        $count_direito =  trim($count_direito);
      }

      $query_estado = "SELECT e.estado, est.id, est.estado, r.posto, p.posto, COUNT(e.estado) FROM exercicioanterior AS e LEFT JOIN tb_estado_exant AS est ON e.estado = est.id LEFT JOIN requerentes AS r ON e.requerente = r.id LEFT JOIN tb_posto AS p ON p.id = r.posto WHERE r.posto = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY e.estado ORDER BY est.estado";
      $result_estado = mysqli_query($conexao, $query_estado);
      while ($res_estado = mysqli_fetch_array($result_estado)) {

        $estado = $estado . '"' . $res_estado["estado"] . '",';
        $count_estado = $count_estado . '"' . $res_estado["COUNT(e.estado)"] . '",';

        $estado =  trim($estado);
        $count_estado =  trim($count_estado);
      }

      $query_sec = "SELECT s.secao AS nome_secao, r.posto, p.posto, COUNT(s.secao) FROM exercicioanterior AS e LEFT JOIN tb_secoes_exant AS s ON e.secao_atual = s.id LEFT JOIN requerentes AS r ON e.requerente = r.id LEFT JOIN tb_posto AS p ON p.id = r.posto WHERE r.posto = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY s.secao ORDER BY s.secao";
      $result_sec = mysqli_query($conexao, $query_sec);
      while ($res_sec = mysqli_fetch_array($result_sec)) {

        $secao = $secao . '"' . $res_sec["nome_secao"] . '",';
        $count_secao = $count_secao . '"' . $res_sec["COUNT(s.secao)"] . '",';

        $secao =  trim($secao);
        $count_secao =  trim($count_secao);
      }

      // Filtro para DIREITO PLEITEADO
    } elseif (isset($_GET['buttonPesquisar']) and $_GET['txtdireitopleiteado'] != '') {

      $nome = $_GET['txtdireitopleiteado'];

      $query_posto = "SELECT r.posto, p.posto AS nome_posto, COUNT(r.posto) FROM exercicioanterior AS e LEFT JOIN requerentes AS r ON e.requerente = r.id LEFT JOIN tb_posto AS p ON p.id = r.posto WHERE direito_pleiteado = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY r.posto ORDER BY p.posto";
      $result_posto = mysqli_query($conexao, $query_posto);
      while ($res_posto = mysqli_fetch_array($result_posto)) {

        $posto = $posto . '"' . $res_posto["nome_posto"] . '",';
        $count_posto = $count_posto . '"' . $res_posto["COUNT(r.posto)"] . '",';

        $posto =  trim($posto);
        $count_posto =  trim($count_posto);
      }

      $query_direito = "SELECT e.direito_pleiteado, d.id, d.direito AS nome_direito, COUNT(e.direito_pleiteado) FROM exercicioanterior AS e LEFT JOIN tb_direitopleiteado_exant AS d ON e.direito_pleiteado = d.id WHERE direito_pleiteado = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY direito_pleiteado ORDER BY d.direito";
      $result_direito = mysqli_query($conexao, $query_direito);
      while ($res_direito = mysqli_fetch_array($result_direito)) {

        $direito_pleiteado = $direito_pleiteado . '"' . $res_direito["nome_direito"] . '",';
        $count_direito = $count_direito . '"' . $res_direito["COUNT(e.direito_pleiteado)"] . '",';

        $direito_pleiteado =  trim($direito_pleiteado);
        $count_direito =  trim($count_direito);
      }

      $query_estado = "SELECT e.estado, est.id, est.estado, COUNT(e.estado) FROM exercicioanterior AS e LEFT JOIN tb_estado_exant AS est ON e.estado = est.id WHERE direito_pleiteado = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY e.estado ORDER BY est.estado";
      $result_estado = mysqli_query($conexao, $query_estado);
      while ($res_estado = mysqli_fetch_array($result_estado)) {

        $estado = $estado . '"' . $res_estado["estado"] . '",';
        $count_estado = $count_estado . '"' . $res_estado["COUNT(e.estado)"] . '",';

        $estado =  trim($estado);
        $count_estado =  trim($count_estado);
      }

      $query_sec = "SELECT s.secao AS nome_secao, COUNT(s.secao) FROM exercicioanterior AS e LEFT JOIN tb_secoes_exant AS s ON e.secao_atual = s.id WHERE direito_pleiteado = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY s.secao ORDER BY s.secao";
      $result_sec = mysqli_query($conexao, $query_sec);
      while ($res_sec = mysqli_fetch_array($result_sec)) {

        $secao = $secao . '"' . $res_sec["nome_secao"] . '",';
        $count_secao = $count_secao . '"' . $res_sec["COUNT(s.secao)"] . '",';

        $secao =  trim($secao);
        $count_secao =  trim($count_secao);
      }
      // Filtro para ESTADO
    } elseif (isset($_GET['buttonPesquisar']) and $_GET['txtestado'] != '') {

      $nome = $_GET['txtestado'];

      $query_posto = "SELECT r.posto, p.posto AS nome_posto, COUNT(r.posto) FROM exercicioanterior AS e LEFT JOIN requerentes AS r ON e.requerente = r.id LEFT JOIN tb_posto AS p ON p.id = r.posto WHERE estado = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY r.posto ORDER BY p.posto";
      $result_posto = mysqli_query($conexao, $query_posto);
      while ($res_posto = mysqli_fetch_array($result_posto)) {

        $posto = $posto . '"' . $res_posto["nome_posto"] . '",';
        $count_posto = $count_posto . '"' . $res_posto["COUNT(r.posto)"] . '",';

        $posto =  trim($posto);
        $count_posto =  trim($count_posto);
      }

      $query_direito = "SELECT e.direito_pleiteado, d.id, d.direito AS nome_direito, COUNT(e.direito_pleiteado) FROM exercicioanterior AS e LEFT JOIN tb_direitopleiteado_exant AS d ON e.direito_pleiteado = d.id WHERE estado = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY direito_pleiteado ORDER BY d.direito";
      $result_direito = mysqli_query($conexao, $query_direito);
      while ($res_direito = mysqli_fetch_array($result_direito)) {

        $direito_pleiteado = $direito_pleiteado . '"' . $res_direito["nome_direito"] . '",';
        $count_direito = $count_direito . '"' . $res_direito["COUNT(e.direito_pleiteado)"] . '",';

        $direito_pleiteado =  trim($direito_pleiteado);
        $count_direito =  trim($count_direito);
      }

      $query_estado = "SELECT e.estado, est.id, est.estado, COUNT(e.estado) FROM exercicioanterior AS e LEFT JOIN tb_estado_exant AS est ON e.estado = est.id WHERE e.estado = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY e.estado ORDER BY est.estado";
      $result_estado = mysqli_query($conexao, $query_estado);
      while ($res_estado = mysqli_fetch_array($result_estado)) {

        $estado = $estado . '"' . $res_estado["estado"] . '",';
        $count_estado = $count_estado . '"' . $res_estado["COUNT(e.estado)"] . '",';

        $estado =  trim($estado);
        $count_estado =  trim($count_estado);
      }

      $query_sec = "SELECT s.secao AS nome_secao, COUNT(s.secao) FROM exercicioanterior AS e LEFT JOIN tb_secoes_exant AS s ON e.secao_atual = s.id WHERE estado = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY s.secao ORDER BY s.secao";
      $result_sec = mysqli_query($conexao, $query_sec);
      while ($res_sec = mysqli_fetch_array($result_sec)) {

        $secao = $secao . '"' . $res_sec["nome_secao"] . '",';
        $count_secao = $count_secao . '"' . $res_sec["COUNT(s.secao)"] . '",';

        $secao =  trim($secao);
        $count_secao =  trim($count_secao);
      }

      // Filtro para SEÇÃO ATUAL
    } elseif (isset($_GET['buttonPesquisar']) and $_GET['txtsecao'] != '') {

      $nome = $_GET['txtsecao'];

      $query_posto = "SELECT r.posto, p.posto AS nome_posto, COUNT(r.posto) FROM exercicioanterior AS e LEFT JOIN requerentes AS r ON e.requerente = r.id LEFT JOIN tb_posto AS p ON p.id = r.posto WHERE secao_atual = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY r.posto ORDER BY p.posto";
      $result_posto = mysqli_query($conexao, $query_posto);
      while ($res_posto = mysqli_fetch_array($result_posto)) {

        $posto = $posto . '"' . $res_posto["nome_posto"] . '",';
        $count_posto = $count_posto . '"' . $res_posto["COUNT(r.posto)"] . '",';

        $posto =  trim($posto);
        $count_posto =  trim($count_posto);
      }

      $query_direito = "SELECT e.direito_pleiteado, d.id, d.direito AS nome_direito, COUNT(e.direito_pleiteado) FROM exercicioanterior AS e LEFT JOIN tb_direitopleiteado_exant AS d ON e.direito_pleiteado = d.id WHERE secao_atual = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY direito_pleiteado ORDER BY d.direito";
      $result_direito = mysqli_query($conexao, $query_direito);
      while ($res_direito = mysqli_fetch_array($result_direito)) {

        $direito_pleiteado = $direito_pleiteado . '"' . $res_direito["nome_direito"] . '",';
        $count_direito = $count_direito . '"' . $res_direito["COUNT(e.direito_pleiteado)"] . '",';

        $direito_pleiteado =  trim($direito_pleiteado);
        $count_direito =  trim($count_direito);
      }

      $query_estado = "SELECT e.estado, est.id, est.estado, COUNT(e.estado) FROM exercicioanterior AS e LEFT JOIN tb_estado_exant AS est ON e.estado = est.id WHERE secao_atual = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY e.estado ORDER BY est.estado";
      $result_estado = mysqli_query($conexao, $query_estado);
      while ($res_estado = mysqli_fetch_array($result_estado)) {

        $estado = $estado . '"' . $res_estado["estado"] . '",';
        $count_estado = $count_estado . '"' . $res_estado["COUNT(e.estado)"] . '",';

        $estado =  trim($estado);
        $count_estado =  trim($count_estado);
      }

      $query_sec = "SELECT s.secao AS nome_secao, COUNT(s.secao) FROM exercicioanterior AS e LEFT JOIN tb_secoes_exant AS s ON e.secao_atual = s.id WHERE secao_atual = '$nome' AND e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY s.secao ORDER BY s.secao";
      $result_sec = mysqli_query($conexao, $query_sec);
      while ($res_sec = mysqli_fetch_array($result_sec)) {

        $secao = $secao . '"' . $res_sec["nome_secao"] . '",';
        $count_secao = $count_secao . '"' . $res_sec["COUNT(s.secao)"] . '",';

        $secao =  trim($secao);
        $count_secao =  trim($count_secao);
      }
    } else {
      $query_posto = "SELECT r.posto, p.posto AS nome_posto, COUNT(r.posto) FROM exercicioanterior AS e LEFT JOIN requerentes AS r ON e.requerente = r.id LEFT JOIN tb_posto AS p ON p.id = r.posto WHERE e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY r.posto ORDER BY p.posto";
      $result_posto = mysqli_query($conexao, $query_posto);
      while ($res_posto = mysqli_fetch_array($result_posto)) {

        $posto = $posto . '"' . $res_posto["nome_posto"] . '",';
        $count_posto = $count_posto . '"' . $res_posto["COUNT(r.posto)"] . '",';

        $posto =  trim($posto);
        $count_posto =  trim($count_posto);
      }

      $query_direito = "SELECT e.direito_pleiteado, d.id, d.direito AS nome_direito, COUNT(e.direito_pleiteado) FROM exercicioanterior AS e LEFT JOIN tb_direitopleiteado_exant AS d ON e.direito_pleiteado = d.id WHERE e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY direito_pleiteado ORDER BY d.direito";
      $result_direito = mysqli_query($conexao, $query_direito);
      while ($res_direito = mysqli_fetch_array($result_direito)) {

        $direito_pleiteado = $direito_pleiteado . '"' . $res_direito["nome_direito"] . '",';
        $count_direito = $count_direito . '"' . $res_direito["COUNT(e.direito_pleiteado)"] . '",';

        $direito_pleiteado =  trim($direito_pleiteado);
        $count_direito =  trim($count_direito);
      }

      $query_estado = "SELECT e.estado, est.id, est.estado, COUNT(e.estado) FROM exercicioanterior AS e LEFT JOIN tb_estado_exant AS est ON e.estado = est.id WHERE e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY e.estado ORDER BY est.estado";
      $result_estado = mysqli_query($conexao, $query_estado);
      while ($res_estado = mysqli_fetch_array($result_estado)) {

        $estado = $estado . '"' . $res_estado["estado"] . '",';
        $count_estado = $count_estado . '"' . $res_estado["COUNT(e.estado)"] . '",';

        $estado =  trim($estado);
        $count_estado =  trim($count_estado);
      }

      $query_sec = "SELECT s.secao AS nome_secao, COUNT(s.secao) FROM exercicioanterior AS e LEFT JOIN tb_secoes_exant AS s ON e.secao_atual = s.id WHERE e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY s.secao ORDER BY s.secao";
      $result_sec = mysqli_query($conexao, $query_sec);
      while ($res_sec = mysqli_fetch_array($result_sec)) {

        $secao = $secao . '"' . $res_sec["nome_secao"] . '",';
        $count_secao = $count_secao . '"' . $res_sec["COUNT(s.secao)"] . '",';

        $secao =  trim($secao);
        $count_secao =  trim($count_secao);
      }
    }
    ?>