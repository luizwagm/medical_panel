<?php

session_start();

if (! isset($_SESSION['token']) || empty($_SESSION['token'])) {
    echo '<script>location.href="../login.php?error=token_invalido"</script>';
    exit;
}

require 'environment.php';

$cpf = trim($_POST['cpf']);
$senha = trim($_POST['senha']);
$nome = trim($_POST['nome_paciente']);
$numeroCartao = trim($_POST['numero_cartao']);
$seguradora = trim($_POST['seguradora']);

$id = trim($_POST['id']);
$acao = trim($_POST['acao']);

if (empty($cpf) || empty($senha) || empty($nome) || empty($numeroCartao) || empty($seguradora)) {
    echo '<script>alert("Todos os campos são obrigatórios!");</script>';
    echo '<script>location.href="../credenciais.php"</script>';
} else {
    $ch = curl_init();

    $endPoint = $acao == 'atualizar' ? 'update' : 'store';

    curl_setopt($ch, CURLOPT_URL, URL . '/v1/credentials/' . $endPoint);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(
        [
            'cpf' => $cpf,
            'senha' => $senha,
            'nome' => $nome,
            'numero_cartao' => $numeroCartao,
            'id' => $id,
            'seguradora' => $seguradora
        ]
    ));

    $headers = array();
    $headers[] = 'Accept: application/json';
    $headers[] = 'Authorization: Bearer ' . $_SESSION['token'];
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    curl_close($ch);

    if (json_decode($result)->error) {
        print_r(json_decode($result)->error);
        echo '<br><br><a href="../credenciais.php">voltar</a>';
    } else {
        echo '<script>alert("Sucesso!");</script>';
        echo '<script>location.href="../credenciais.php"</script>';
    }
}