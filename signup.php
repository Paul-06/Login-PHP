<?php
    require 'connection.php';
    $message = '';

    if (!empty($_POST['name']) && !empty($_POST['dni'])
    && !empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO usuarios (nombre, dni, email, password) VALUES (:name, :dni, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':dni', $_POST['dni']);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            echo "<script>alert('Su cuenta ha sido creada satisfactoriamente.');</script>";
        } else {
            echo "<script>alert('Disculpe. Hubo un problema al momento de crear su cuenta.');</script>";
        }

    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístrate</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="shortcut icon" href="assets/img/senati.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
    <?php require 'partials/header.php'; ?>
    <div class="container">
        <div class="frm">
            <h1>Crea una cuenta</h1>
            <form action="signup.php" method="post">
                <div class="input-content">
                    <span class="material-symbols-outlined">person</span>
                    <input type="text" name="name" placeholder="Nombre" required>
                </div>
                <div class="input-content">
                    <span class="material-symbols-outlined">badge</span>
                    <input type="text" name="dni" placeholder="DNI" required>
                </div>
                <div class="input-content">
                    <span class="material-symbols-outlined">mail</span>
                    <input type="email" name="email" placeholder="Correo" required>
                </div>
                <div class="input-content">
                    <span class="material-symbols-outlined">key</span>
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <input type="submit" class="btn" value="Registrarte">
                <p class="consult">¿Ya tienes una cuenta? <a class="account" href="index.php">Inicia sesión</a></p>
            </form>
        </div>
    </div>
</body>
</html>
