<?php
    session_start();

    require 'connection.php';

    if (isset($_SESSION['user_id'])) {
        $records = $conn->prepare('SELECT id, nombre, dni, email, password FROM usuarios WHERE id = :id');
        $records->bindParam('id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        if (count($results) > 0) {
            $user = $results;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="shortcut icon" href="assets/img/senati.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>
    <header>
        <a href="/TrabajoFinal"><img src="assets/img/logo-senati.svg" alt="SENATI"></a>
        <?php if (!empty($user)): ?>
            <p>Bienvenido, <?= $user['nombre'] ?></p>
        <?php endif; ?>
        <a class="logout-btn" href="logout.php">
            <span class="material-symbols-outlined">logout</span>
            Salir
        </a>
    </header>
    <div class="container-main">
        <div class="box">
            <a href="https://www.outlook.com/senati.pe" class="box-image" style="background-image: url(assets/img/correo-senati.png);" target="_blank">
                <p>Correo institucional @senati.pe para estudiantes e instructores</p>
            </a>
            <a href="https://www.outlook.com/senati.pe" class="info" target="_blank">CORREO INSTITUCIONAL</a>
            <p>Acceda a su correo institucional</p>
        </div>
        <div class="box">
            <a href="https://senati.blackboard.com" class="box-image" style="background-image: url(assets/img/bb-senati.png);" target="_blank">
                <p>BLACKBOARD LMS</p>
            </a>
            <a href="https://senati.blackboard.com" class="info" target="_blank">BLACKBOARD</a>
            <p>Plataforma de aprendizaje en línea</p>
        </div>
        <div class="box">
            <a href="https://senatipe.sharepoint.com/sites/software_academico" class="box-image" style="background-image: url(assets/img/sw-senati.png);" target="_blank">
                <p>Software para el uso del alumno de SENATI</p>
            </a>
            <a href="https://senatipe.sharepoint.com/sites/software_academico" class="info" target="_blank">SOFTWARE ACADÉMICO</a>
            <p>Software para la familia ocupacional</p>
        </div>
    </div>
</body>

</html>

