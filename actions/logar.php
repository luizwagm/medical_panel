<?php

session_start();

require_once 'environment.php';

define('STRING_SECRET', 'senhaacessoauthmedical@2022poremtalvezseja!segura-ser@');

$token = $_POST['token_'];

if (! password_verify(STRING_SECRET.date('Y-m-d'), $token)) {
    echo '<script>location.href="../login.php?error=token_invalido"</script>';
    exit;
}

$email = trim($_POST['email']);
$senha = trim($_POST['senha']);

$params = [
    'email' => $email,
    'password' => $senha
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, URL . '/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));

$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

$_SESSION['token'] = json_decode($result)->access_token;
if (! json_decode($result)->access_token) {
    print_r(json_decode($result)->error);
    echo '<br><br>Tente novamente, <a href="../login.php">clicando aqui.</a>';
} else {
    $_SESSION['payload'] = json_decode($result);
    echo '<script>location.href="../index.php"</script>';
}