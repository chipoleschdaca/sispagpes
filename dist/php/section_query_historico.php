<section class="content">
    <div class="container-fluid">
        <br>
        <div class="row">
        <section class="col-md-12 connectedSortable">
            <form class="form-inline">
            <div class="card col-md-12">
                <div class="card-body" style="padding-left: 5px">
                <div class="input-group input-group-sm" id="tabcharts">
                    <label for="txtpesquisar">Filtrar:
                    </label>
                    <div style="width: 22%;">
                    <select class="form-control select2" name="txtposto" style="border-radius:3px; margin-right:20px; width: 100%;">
                        <option value="" selected>POSTO/GRAD.</option>
                        <?php
                        $query_posto = "SELECT r.posto as id_posto, p.posto as nome_posto FROM exercicioanterior as e LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN tb_posto as p ON p.id = r.posto WHERE e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY r.posto";
                        $result_posto = mysqli_query($conexao, $query_posto);
                        while ($res_p = mysqli_fetch_array($result_posto)) {
                            $id = $res_p['id_posto'];
                            $posto = $res_p['nome_posto'];
                        ?>
                            <option value="<?php echo $id ?>"><?php echo $posto ?></option>
                        <?php }
                        ?>
                    </select>
                    </div>
                    <div style="width: 22%;">
                    <select class="form-control select2" id="txtdireitopleiteado" name="txtdireitopleiteado" placeholder="DIREITO PLEITEADO" style="border-radius:3px; margin-right:20px; width: 100%;">
                        <option value="">DIREITO PLEITEADO</option>
                        <?php
                        $query_direito = "SELECT d.id AS id_direito, d.direito AS direito_pleiteado, COUNT(e.direito_pleiteado) FROM exercicioanterior AS e LEFT JOIN tb_direitopleiteado_exant AS d ON d.id = e.direito_pleiteado WHERE e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY e.direito_pleiteado";
                        $result_direito = mysqli_query($conexao, $query_direito);
                        while ($res_dir = mysqli_fetch_array($result_direito)) {
                        $id = $res_dir['id_direito'];
                        $direito = $res_dir['direito_pleiteado'];
                        $count_direito = $res_dir['COUNT(e.direito_pleiteado)'];
                        ?>
                        <option value="<?= $id ?>"><?= $direito . " | " . $count_direito ?></option>
                        <?php }
                        ?>
                    </select>
                    </div>
                    <div style="width: 22%;">
                    <select class="form-control select2" id="txtestado" name="txtestado" style="border-radius:3px; margin-right:20px; width: 100%;">
                        <option value="" selected>ESTADO DO PROCESSO</option>
                        <?php
                        $query_est = "SELECT est.id AS id_estado, est.estado AS estado_processo, COUNT(e.estado) FROM exercicioanterior AS e LEFT JOIN tb_estado_exant AS est ON est.id = e.estado WHERE e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY e.estado";
                        $result_est = mysqli_query($conexao, $query_est);
                        while ($res_est = mysqli_fetch_array($result_est)) {
                        $id_est_2 = $res_est['id_estado'];
                        $estado_est = $res_est['estado_processo'];
                        $count_estado = $res_est['COUNT(e.estado)'];
                        ?>
                        <option value="<?= $id_est_2 ?>"><?= $estado_est . " | " . $count_estado ?></option>
                        <?php }
                        ?>
                    </select>
                    </div>
                    <div style="width: 22%;">
                    <select class="form-control select2" id="txtsecao" name="txtsecao" style="border-radius:3px; margin-left:10px; width: 100%;">
                        <option value="" selected>SEÇÃO ATUAL</option>
                        <?php
                        $query_sec = "SELECT s.id AS id_secao, s.secao AS secao_atual, COUNT(e.secao_atual) FROM exercicioanterior AS e LEFT JOIN tb_secoes_exant AS s ON s.id = e.secao_atual WHERE e.id NOT IN (SELECT id_exant FROM tb_historico_exant_estado_secao AS hist LEFT JOIN tb_estado_exant AS estado ON hist.estado_novo = estado.id WHERE estado.estado = 'ARQUIVADO') GROUP BY e.secao_atual";
                        $result_sec = mysqli_query($conexao, $query_sec);
                        while ($res_sec = mysqli_fetch_array($result_sec)) {
                        $id_sec_2 = $res_sec['id_secao'];
                        $secao_sec = $res_sec['secao_atual'];
                        $count_secao = $res_sec['COUNT(e.secao_atual)'];
                        ?>
                        <option value="<?= $id_sec_2 ?>"><?= $secao_sec . " | " . $count_secao ?></option>
                        <?php }
                        ?>
                    </select>
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit" id="filter" name="buttonPesquisar" style="width: 36px; height: 36px;">
                    <i class="fas fa-search"></i>
                    </button>
                </div>
                </div>
            </div>
            </form>
        </section>
        </div>
        <div class="row">
        <section class="col-md-6 connectedSortable">
            <div class="card">
            <div class="card-body">
                <canvas id="pieChart" style="height:150px; width: 400px;"></canvas>
            </div>
            </div>
        </section>
        <section class="col-md-6 connectedSortable">
            <div class="card">
            <div class="card-body">
                <canvas id="donutChart" style="height:150px; width: 400px;"></canvas>
            </div>
            </div>
        </section>
        </div>
        <div class="row">
        <section class="col-md-6 connectedSortable">
            <div class="card">
            <div class="card-body">
                <canvas id="myChart2" style="height:150px; width: 400px;"></canvas>
            </div>
            </div>
        </section>
        <section class="col-md-6 connectedSortable">
            <div class="card">
            <div class="card-body">
                <canvas id="myChart" style="height:150px; width: 400px;"></canvas>
            </div>
            </div>
        </section>
        </div>
    </div>
    </section>