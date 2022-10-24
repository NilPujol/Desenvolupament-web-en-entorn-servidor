<?php
session_start();
if (!isset($_SESSION['date']) || (time() - $_SESSION['date']) > 60) {
    header('Location: index.php?error=timeout', true, 303);
}
$users = "users.json";
$jsonUsers = json_decode(file_get_contents($users), true);
$connections = "connexions.json";
$jsonCon = json_decode(file_get_contents($connections), true);

?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <title>Benvingut</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">

</head>

<body>
    <div class="container noheight" id="container">
        <div class="welcome-container">
            <h1>Benvingut!</h1>
            <div>Hola <?= $jsonUsers[$_SESSION['email']]['name']; ?>, les teves darreres connexions són:</div>
            <?php
            foreach ($jsonCon as $conexio) {
                if ($conexio['user'] == $_SESSION['email'] && $conexio['status'] == "signin_success") {
                    echo "Connexió des de " . $conexio['ip'] . " amb data " . $conexio['time'] . "<br>";
                }
            }
            ?>
            <form action="process.php" method="post">
                <input type="hidden" name="method" value="logoff" />
                <input type="hidden" name="email" value=<?= $_SESSION['email']; ?> />
                <button>Tanca la sessió</button>
            </form>
        </div>
    </div>
</body>

</html>