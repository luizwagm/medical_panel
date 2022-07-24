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

$cadastrosCredenciais = 0;
$errosCredenciais = 0;
foreach(json_decode($result) as $key => $value) {
    if (! empty($value->delete)) {
        $errosCredenciais++;
    }
    
    $cadastrosCredenciais++;
}

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
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="./actions/storeCredentials.php" method="post">
                                                    <div class="form-group">
                                                        <label for="basicInput">CPF/E-mail</label>
                                                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Insira o CPF">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basicInput">Senha</label>
                                                        <input type="text" class="form-control" id="senha" name="senha" placeholder="Insira a senha">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basicInput">Nome do paciente</label>
                                                        <input type="text" class="form-control" id="nome_paciente" name="nome_paciente" placeholder="Insira o nome do paciente">
                                                        <small><strong>ATENÇÃO: insira o nome igual se encontra no cartão Bradesco Seguros!</strong></small>
                                                        <small><strong>Se existir acento colocar, se não, não colocar.</strong></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-primary">Salvar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 col-lg-6 col-md-6">
                                                <div class="card">
                                                    <div class="card-body px-3 py-4-5">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="stats-icon purple">
                                                                    <i class="iconly-boldShow"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h6 class="text-muted font-semibold">Credenciais cadastradas</h6>
                                                                <h6 class="font-extrabold mb-0"><?php echo $cadastrosCredenciais; ?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-6 col-md-6">
                                                <div class="card">
                                                    <div class="card-body px-3 py-4-5">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="stats-icon red">
                                                                    <i class="iconly-boldBookmark"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h6 class="text-muted font-semibold">Credenciais com erro</h6>
                                                                <h6 class="font-extrabold mb-0"><?php echo $errosCredenciais; ?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-8">
                                        <section class="section">
                                            <div class="row" id="table-head">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="table-responsive" style="overflow: auto; height: 500px;">
                                                                <table class="table mb-0" style="font-size: 13px; text-transform: uppercase;">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th></th>
                                                                            <th>CPF/E-mail</th>
                                                                            <th>Senha</th>
                                                                            <th>Nome do paciente</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                            foreach(json_decode($result) as $key => $value) {
                                                                                $validDel = ! empty($value->delete);
                                                                        ?>
                                                                        <tr <?php echo $validDel ? 'style="background-color: #FCC0C0; color:#000 !important; transparent: 0.5"' : ''; ?>>
                                                                            <td><?php echo $validDel ? '<span class="badge" style="background-color: #ae0001; font-size: 10px">Não conecta no sistema!</span>' : ''; ?></td>
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