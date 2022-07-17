<?php

session_start();

require 'environment.php';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, URL . '/v1/auth/logout');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Authorization: Bearer ' . $_SESSION['token'];
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
curl_close($ch);

unset($_SESSION['token']);
session_destroy();

echo '<script>alert("Sucesso!");</script>';
echo '<script>location.href="../login.php"</script>';