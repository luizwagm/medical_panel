<?php define('MENU', 'lista'); ?>
<?php require "includes/header.php"; ?>

<?php

require 'actions/environment.php';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, URL . '/v1/get-lista');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Authorization: Bearer ' . $_SESSION['token'];
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
curl_close($ch);

?>

    <body>
        <div id="app">
            <?php require "includes/sidebar.php"; ?>
            <div id="main">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>
                
                <div class="page-heading">
                    <h3>Lista solicitações de reembolso</h3>
                </div>
                <div class="page-content">
                    <section class="section">
                        <div class="row" id="table-head">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="table-responsive" style="overflow: auto; height: 500px;">
                                            <table class="table mb-0" style="font-size: 13px; text-transform: uppercase;">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Paciente</th>
                                                        <th>CPF/E-mail</th>
                                                        <th>Protocolo</th>
                                                        <th>Data de solicitação</th>
                                                        <th>Valor Solicitado</th>
                                                        <th>Tipo de Atendimento</th>
                                                        <th>Status da Solicitação</th>
                                                        <th>Data de atualização</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach(json_decode($result) as $value) {
                                                            $roleValid = (strtotime($value->updated_at) > strtotime($value->created_at));
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $value->nome; ?></td>
                                                            <td><?php echo $value->cpf; ?></td>
                                                            <td><?php echo $value->protocolo; ?></td>
                                                            <td><?php echo $value->data_solicitacao; ?></td>
                                                            <td><?php echo $value->valor_solicitado; ?></td>
                                                            <td><?php echo $value->tipo_atendimento; ?></td>
                                                            <td <?php if ($roleValid) { echo "style='color: #428F0B; font-weight:bold'"; } ?>><?php echo $value->status_solicitacao; ?></td>
                                                            <td><?php echo date('d/m/Y', strtotime($value->updated_at)); ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <?php require "includes/footer.php"; ?>
            </div>
        </div>
        <script src="./dist/assets/js/app.js"></script>
        <script src="./dist/assets/js/pages/dashboard.js"></script>
    </body>
</html>