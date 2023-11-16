<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: /TrabajoFinal/principal.php');
}

require 'connection.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (empty($results)) {
        header('Location: /TrabajoFinal/error.php');
    } elseif (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header('Location: /TrabajoFinal');
    } else {
        echo "<script>alert('Disculpe. Las credenciales no coinciden.');</script>"; 
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesión</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="shortcut icon" href="assets/img/senati.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>
    <?php require 'partials/header.php'; ?>
    <div class="container">
        <div class="frm">
            <h1>Bienvenido</h1>
            <form action="index.php" method="post">
                <div class="input-content">
                    <span class="material-symbols-outlined">mail</span>
                    <input type="email" name="email" placeholder="Correo" required>
                </div>
                <div class="input-content">
                    <span class="material-symbols-outlined">key</span>
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <input type="submit" class="btn" value="Iniciar sesión">
                <p class="consult">¿No tienes una cuenta? <a class="account" href="signup.php">Crea una cuenta</a></p>
            </form>
        </div>
    </div>
</body>

</html>
