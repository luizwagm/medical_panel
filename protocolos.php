<?php define('MENU', 'protocolos'); ?>
<?php require "includes/header.php"; ?>
<?php

require 'actions/environment.php';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, URL . '/v1/protocol');
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
                    <h3>Protocolos por agência</h3>
                </div>
                <div class="page-content">
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <form action="./actions/storeProtocols.php" method="post">
                                            <div class="form-group">
                                                <label for="basicInput">Protocolo</label>
                                                <input type="text" class="form-control" id="protocolo" name="protocolo" placeholder="Insira o protocolo">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-8">
                                        <section class="section">
                                            <div class="row" id="table-head">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="table-responsive" style="overflow: auto; height: 500px;">
                                                                <table class="table mb-0 tableDataJqueryOther stripe" style="font-size: 13px; text-transform: uppercase;">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th>Protocolo</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                            foreach(json_decode($result) as $value) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $value->protocolo; ?></td>
                                                                            <td><a href="./actions/deletarProtocolo.php?id=<?php echo $value->id; ?>" class="btn btn-danger">Remover</a></td>
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