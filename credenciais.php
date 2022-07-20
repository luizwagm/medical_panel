<?php define('MENU', 'credenciais'); ?>
<?php require "includes/header.php"; ?>
<?php

require 'actions/environment.php';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, URL . '/v1/credentials');
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
                    <h3>Credenciais de pacientes</h3>
                </div>
                <div class="page-content">
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <form action="./actions/storeCredentials.php" method="post">
                                            <div class="form-group">
                                                <label for="basicInput">CPF</label>
                                                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Insira o CPF">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Senha</label>
                                                <input type="text" class="form-control" id="senha" name="senha" placeholder="Insira a senha">
                                            </div>
                                            <div class="form-group">
                                                <label for="basicInput">Nome do paciente</label>
                                                <input type="text" class="form-control" id="nome_paciente" name="nome_paciente" placeholder="Insira o nome do paciente">
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
                                                            <div class="table-responsive">
                                                                <table class="table mb-0">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th><a href="./actions/importar.php" class="btn btn-info">Importar</a></th>
                                                                            <th>Ordem</th>
                                                                            <th>CPF</th>
                                                                            <th>Senha</th>
                                                                            <th>Nome do paciente</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                            foreach(json_decode($result) as $value) {
                                                                                $validDel = ! empty($value->delete);
                                                                        ?>
                                                                        <tr <?php echo $validDel ? 'style="background-color: #FCC0C0; color:#000 !important; transparent: 0.5"' : ''; ?>>
                                                                            <td><?php echo $validDel ? '<span class="badge" style="background-color: #ae0001; font-size: 10px">Não conecta no sistema!</span>' : ''; ?></td>
                                                                            <td><?php echo $value->ordem; ?></td>
                                                                            <td><?php echo $value->cpf; ?></td>
                                                                            <td><?php echo $value->senha; ?></td>
                                                                            <td><?php echo $value->nome; ?></td>
                                                                            <td><a href="./actions/deletar.php?id=<?php echo $value->id; ?>" class="btn btn-danger">Remover</a></td>
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