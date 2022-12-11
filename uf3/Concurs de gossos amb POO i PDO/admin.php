<?php
session_start();
//if (!isset($_SESSION['date']) || (time() - $_SESSION['date']) > 60) {
//    header('Location: login.php?error=timeout', true, 303);
//}

function createUser($email, $passwd)
{
    $hostname = "localhost";
    $dbname = "dwes-npujol-gossos";
    $username = "dwes-user";
    $pw = "dwes-passw";
    try {
        $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", "$username", "$pw");
        $query = $pdo->prepare("insert into users values ('$email', '$passwd')");
        $query->execute();
    } catch (PDOException $e) {
        echo "Failed to get DB handle: " . $e->getMessage() . "\n";
        exit;
    }
}

function createDogo($nom, $img, $amo, $raça)
{
    $hostname = "localhost";
    $dbname = "dwes-npujol-gossos";
    $username = "dwes-user";
    $pw = "dwes-passw";
    try {
        $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", "$username", "$pw");
        $query = $pdo->prepare("INSERT into gossos values ('$nom', '$img', '$amo', '$raça')");
        $query->execute();
    } catch (PDOException $e) {
        echo "Failed to get DB handle: " . $e->getMessage() . "\n";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN - Concurs Internacional de Gossos d'Atura</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="wrapper medium">
        <header>ADMINISTRADOR - Concurs Internacional de Gossos d'Atura</header>
        <div class="admin">
            <div class="admin-row">
                <h1> Resultat parcial: Fase 1 </h1>
                <div class="gossos">
                    <img class="dog" alt="Musclo" title="Musclo 15%" src="img/g1.png">
                    <img class="dog" alt="Jingo" title="Jingo 45%" src="img/g2.png">
                    <img class="dog" alt="Xuia" title="Xuia 4%" src="img/g3.png">
                    <img class="dog" alt="Bruc" title="Bruc 3%" src="img/g4.png">
                    <img class="dog" alt="Mango" title="Mango 13%" src="img/g5.png">
                    <img class="dog" alt="Fluski" title="Fluski 12 %" src="img/g6.png">
                    <img class="dog" alt="Fonoll" title="Fonoll 5%" src="img/g7.png">
                    <img class="dog" alt="Swing" title="Swing 2%" src="img/g8.png">
                    <img class="dog eliminat" alt="Coloma" title="Coloma 1%" src="img/g9.png">
                </div>
            </div>
            <div class="admin-row">
                <h1> Nou usuari: </h1>
                <form method="post">
                    <input type="text" placeholder="Email">
                    <input type="password" placeholder="Contrassenya">
                    <input type="submit" value="Crea usuari" id="crearUsusari" value="RUN">
                </form>
                <?php

                if (array_key_exists('crearUsusari', $_POST)) {
                    createUser($_POST['text'], $_POST['password']);
                }

                ?>
            </div>
            <div class="admin-row">
                <h1> Fases: </h1>
                <form class="fase-row">
                    Fase <input type="text" value="1" disabled style="width: 3em">
                    del <input type="date" placeholder="Inici">
                    al <input type="date" placeholder="Fi">
                    <input type="button" value="Modifica">
                </form>

                <form class="fase-row">
                    Fase <input type="text" value="2" disabled style="width: 3em">
                    del <input type="date" placeholder="Inici">
                    al <input type="date" placeholder="Fi">
                    <input type="button" value="Modifica">
                </form>

                <form class="fase-row">
                    Fase <input type="text" value="3" disabled style="width: 3em">
                    del <input type="date" placeholder="Inici">
                    al <input type="date" placeholder="Fi">
                    <input type="button" value="Modifica">
                </form>

                <form class="fase-row">
                    Fase <input type="text" value="4" disabled style="width: 3em">
                    del <input type="date" placeholder="Inici">
                    al <input type="date" placeholder="Fi">
                    <input type="button" value="Modifica">
                </form>

                <form class="fase-row">
                    Fase <input type="text" value="5" disabled style="width: 3em">
                    del <input type="date" placeholder="Inici">
                    al <input type="date" placeholder="Fi">
                    <input type="button" value="Modifica">
                </form>

                <form class="fase-row">
                    Fase <input type="text" value="6" disabled style="width: 3em">
                    del <input type="date" placeholder="Inici">
                    al <input type="date" placeholder="Fi">
                    <input type="button" value="Modifica">
                </form>

                <form class="fase-row">
                    Fase <input type="text" value="7" disabled style="width: 3em">
                    del <input type="date" placeholder="Inici">
                    al <input type="date" placeholder="Fi">
                    <input type="button" value="Modifica">
                </form>

                <form class="fase-row">
                    Fase <input type="text" value="8" disabled style="width: 3em">
                    del <input type="date" placeholder="Inici">
                    al <input type="date" placeholder="Fi">
                    <input type="button" value="Modifica">
                </form>

            </div>

            <div class="admin-row">
                <h1> Concursants: </h1>
                <form>
                    <input type="text" placeholder="Nom" value="Musclo">
                    <input type="text" placeholder="Imatge" value="img/g1.png">
                    <input type="text" placeholder="Amo" value="Joan Pere Arnau">
                    <input type="text" placeholder="Raça" value="Husky Siberià">
                    <input type="button" value="Modifica">
                </form>

                <form method="post">
                    <input type="text" placeholder="Nom" name="Nom">
                    <input type="text" placeholder="Imatge" name="Imatge">
                    <input type="text" placeholder="Amo" name="Amo">
                    <input type="text" placeholder="Raça" name="Raça">
                    <input type="submit" value="Afegeix" id="crearGos" value="RUN">
                </form>
                <?php
                if (array_key_exists('crearGos', $_POST)) {
                    createDogo($_POST['Nom'], $_POST['Imatge'], $_POST['Amo'], $_POST['Raça']);
                }
                ?>
            </div>

            <div class="admin-row">
                <h1> Altres operacions: </h1>
                <form>
                    Esborra els vots de la fase
                    <input type="number" placeholder="Fase" value="">
                    <input type="button" value="Esborra">
                </form>
                <form>
                    Esborra tots els vots
                    <input type="button" value="Esborra">
                </form>
            </div>
        </div>
    </div>

</body>

</html>