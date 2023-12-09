<!-- app/Views/auth/login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    
    <!-- Muestra el mensaje de error si existe -->
    <?php if (isset($error)) : ?>
        <p><?= $error ?></p>
    <?php endif; ?>

    <!-- Formulario de inicio de sesión -->
    <form action="<?= site_url('login') ?>" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
