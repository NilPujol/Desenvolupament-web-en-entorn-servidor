<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$hostname = "localhost";
$dbname = "dwes-npujol-gossos";
$username = "dwes-user";
$pw = "dwes-passw";
try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", "$username", "$pw");
} catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
}
$email = $_POST['email'];
$query = $pdo->prepare("SELECT * FROM users where email = '$email'");
$query->execute();
$usuari = $query->fetch();
if ($_POST['method'] == "signin") {

    if ($usuari == false) {
        header('Location: login.php?error=signin_email_error', true, 303);
    } else if ($usuari['passwd'] != $_POST['passwd']) {
        header('Location: login.php?error=signin_password_error', true, 303);
    } else {
        login();
    }
} else if ($_POST['method'] == "logoff") {
    $_SESSION['date'] = null;
    $_SESSION['email'] = null;
    header('Location: login.php', true, 302);
}
function login()
{
    $_SESSION['date'] = time();
    $_SESSION['email'] = $_POST['email'];
    header('Location: admin.php', true, 302);
}
