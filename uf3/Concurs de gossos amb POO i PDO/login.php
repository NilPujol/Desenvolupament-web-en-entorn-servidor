<?php
session_start();
if ((isset($_SESSION['date']) && (time() - $_SESSION['date']) <= 60)) {
    header('Location: admin.php', true, 302);
}
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <title>Accés</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/login.css" rel="stylesheet">

</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="process.php" method="post">
                <h1>Inicia la sessió</h1>
                <span>introdueix les teves credencials</span>
                <input type="hidden" name="method" value="signin" />
                <input type="text" placeholder="Correu electronic" name="email" />
                <input type="password" placeholder="Contrasenya" name="passwd" />
                <button>Inicia la sessió</button>
            </form>
        </div>
    </div>
</body>

</html>