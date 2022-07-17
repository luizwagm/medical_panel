<?php

session_start();

if (! isset($_SESSION['token']) || empty($_SESSION['token'])) {
    echo '<script>location.href="../login.php?error=token_invalido"</script>';
    exit;
}

require 'environment.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$params = ['email' => $email, 'password' => $senha];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, URL . '/v1/configs/store');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));

$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Authorization: Bearer ' . $_SESSION['token'];
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
curl_close($ch);

echo '<script>alert("Sucesso!");</script>';
echo '<script>location.href="../configuracoes.php"</script>';