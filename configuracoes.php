<?php define('MENU', 'configuracoes'); ?>
<?php require "includes/header.php"; ?>
<?php

require 'actions/environment.php';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, URL . '/v1/configs/');
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
                    <h3>Configurações</h3>
                </div>
                <div class="page-content">
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <form action="./actions/storeConfigs.php" method="post">
                                            <div class="form-group">
                                                <label for="basicInput">E-mail</label>
                                                <input type="text" class="form-control" id="email" name="email" value="<?php echo json_decode($result)->email; ?>" placeholder="Insira o CPF">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Senha</label>
                                                <input type="password" class="form-control" id="senha" name="senha" value="<?php echo json_decode($result)->password; ?>" placeholder="Insira a senha">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary">Salvar</button>
                                            </div>
                                        </form>
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