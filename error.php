<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Error!</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="shortcut icon" href="assets/img/senati.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>
    <?php require 'partials/header.php'; ?>
    <div class="container">
        <div class="warning">
            <h2>
                <span class="material-symbols-outlined">warning</span>
                ¡Error!
            </h2>
            <p>Al parecer, usted no tiene una cuenta registrada en este sistema.</p>
            <div class="enlaces">
                <p>Por favor, <a class="link" href="signup.php">crea una cuenta</a></p>
                <p>¿Ya tienes una cuenta? <a class="link" href="index.php">Inicia sesión</a></p>
            </div>
    </div>
</body>

</html>