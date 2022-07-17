<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Auth Medical</title>
    <link rel="stylesheet" href="./dist/assets/css/main/app.css">
    <link rel="stylesheet" href="./dist/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="./dist/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="./dist/assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="index.html"><h1>Auth Medical</h1></a>
            </div>
            <h1 class="auth-title">Acesso</h1>

<?php $string = 'senhaacessoauthmedical@2022poremtalvezseja!segura-ser@' . date('Y-m-d'); ?>

            <form action="./actions/logar.php" method="post">
                <input type="hidden" name="token_" value="<?php echo password_hash($string, PASSWORD_DEFAULT); ?>">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" name="email" placeholder="e-mail">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" name="senha" placeholder="senha">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Entrar</button>
            </form>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>

</html>
