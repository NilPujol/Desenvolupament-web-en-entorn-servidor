<?php
session_start();
function GetGossos(): array
{
    try {
        $hostname = "localhost";
        $dbname = "dwes-npujol-gossos";
        $username = "dwes-user";
        $pw = "dwes-passw";
        $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", "$username", "$pw");
    } catch (PDOException $e) {
        echo "Failed to get DB handle: " . $e->getMessage() . "\n";
        exit;
    }

    $query = $pdo->prepare("select idgossos, nom, img, amo, raça FROM gossos");
    $query->execute();
    $gossos = $query->fetchAll(PDO::FETCH_OBJ);
    return $gossos;
}
?>
<!DOCTYPE html>
<html lang="ca">
<style>
    input[type="submit"] {
        display: none;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votació popular Concurs Internacional de Gossos d'Atura 2023</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/js.js"></script>
</head>

<body>
    <div class="wrapper">
        <header>Votació popular del Concurs Internacional de Gossos d'Atura 2023- FASE <span> 1 </span></header>
        <p class="info"> Podeu votar fins el dia 01/02/2023</p>

        <p class="warning" hidden="true"> Ja has votat al gos MUSCLO. Es modificarà la teva resposta</p>
        <div class="poll-area">
            <form action="vote.php" method="post">
                <?php
                $gossos = GetGossos();
                for ($i = 0; $i < sizeof($gossos); $i++) {
                ?>
                    <label for="opt-<?php echo $i + 1 ?>" class="opt">
                        <input type="submit" name="opt" id="opt-<?php echo $i + 1 ?>" value="<?php echo $i + 1 ?>" />
                        <div class="row">
                            <div class="column">
                                <div class="right">
                                    <span class="circle"></span>
                                    <span class="text"><?php echo $gossos[$i]->nom ?></span>
                                </div>
                                <img class="dog" src="<?php echo $gossos[$i]->img ?>">
                            </div>
                        </div>
                    </label>
                <?php
                }
                ?>
            </form>
        </div>

        <p> Mostra els <a href="resultats.php">resultats</a> de les fases anteriors.</p>
    </div>

</body>

</html>