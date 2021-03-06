<?php
session_start();

if (! isset($_SESSION['token']) || empty($_SESSION['token'])) {
    echo '<script>location.href="./login.php?error=token_invalido"</script>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Auth Medical</title>
    <link rel="stylesheet" href="./dist/assets/css/main/app.css">
    <link rel="stylesheet" href="./dist/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="./dist/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="./dist/assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="./dist/assets/css/shared/iconly.css">
</head>