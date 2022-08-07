<?php define('MENU', 'lista'); ?>
<?php require "includes/header.php"; ?>
<style>
    @media print {
        .noPrint {
            display: none;
        }
        .print {
            position:absolute !important;
            height: auto !important;
            left: -50% !important;
        }
        .print table th, .print table td {
            font-size:10px !important;
        }
        @page {
            size:landscape;
        }
    }

</style>

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

$novoResult = [];
$results = json_decode($result);
foreach($results as $value) {
    $splitT = explode(' ', $value->protocolo);
    $nnProtocolo = str_replace('.', '', $splitT[0]);
    
    $novoResult[substr($nnProtocolo, 0, -2)] = $value;
    
}
?>

    <body>
        <div id="app">
            <?php require "includes/sidebar.php"; ?>
            <div id="main">
                <header class="mb-3 noPrint">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>
                
                <div class="page-heading noPrint">
                    <h3>Lista solicitações de reembolso</h3>
                    <button type="button" class="btn btn-primary" onclick="print();">Imprimir</button>
                </div>
                <div class="page-content">
                    <section class="section">
                        <div class="row" id="table-head">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="table-responsive print" style="overflow: auto; height: 500px;">
                                            <table class="table mb-0 tableDataJqueryLista stripe" style="font-size: 13px; text-transform: uppercase;">
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
                                                        foreach($novoResult as $value) {
                                                            $roleValid = (strtotime($value->updated_at) > strtotime($value->created_at));
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $value->nome; ?></td>
                                                            <td><?php echo $value->cpf; ?></td>
                                                            <td><?php echo $value->protocolo; ?></td>
                                                            <td><?php echo $value->data_solicitacao; ?></td>
                                                            <td><?php echo $value->valor_solicitado; ?></td>
                                                            <td><?php echo $value->tipo_atendimento; ?></td>
                                                            <td style='color: #428F0B; font-weight:bold'><?php echo $value->status_solicitacao; ?></td>
                                                            <td><span style="display:none"><?php echo $value->updated_at; ?></span><?php echo date('d/m/Y H:i', strtotime($value->updated_at)); ?></td>
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