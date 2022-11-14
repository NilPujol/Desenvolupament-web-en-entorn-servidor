<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$hostname = "localhost";
$dbname = "dwes-nilpujol-autpdo";
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
        logNewConnectionDB("signin_email_error");
        header('Location: index.php?error=signin_email_error', true, 303);
    } else if ($usuari['passwd'] != $_POST['passwd']) {
        logNewConnectionDB("signin_password_error");
        header('Location: index.php?error=signin_password_error', true, 303);
    } else {
        logNewConnectionDB("signin_success");
        login();
    }
} else if ($_POST['method'] == "logoff") {
    $_SESSION['date'] = null;
    $_SESSION['email'] = null;
    logNewConnectionDB("logoff");
    header('Location: index.php', true, 302);
} else {
    if (!isset($_POST['email'])) {
        logNewConnectionDB("signin_email_error");
        header('Location: index.php?error=signin_email_error', true, 303);
    } else if ($usuari != false) {
        logNewConnectionDB("signup_exist_error");
        header('Location: index.php?error=signup_exist_error', true, 303);
    } else if (!isset($_POST['passwd'])) {
        logNewConnectionDB("signin_password_error");
        header('Location: index.php?error=signin_password_error', true, 303);
    } else {
        createUser();
        logNewConnectionDB("signin_success");
        login();
    }
}
function login()
{
    $_SESSION['date'] = time();
    $_SESSION['email'] = $_POST['email'];
    header('Location: hola.php', true, 302);
}
function logNewConnectionDB($status)
{
    $hostname = "localhost";
    $dbname = "dwes-nilpujol-autpdo";
    $username = "dwes-user";
    $pw = "dwes-passw";
    $ip = $_SERVER['REMOTE_ADDR'];
    $user = $_POST['email'];
    try {
        $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", "$username", "$pw");
        $query = $pdo->prepare("insert into connexions (ip, user, time, status) values ('$ip', '$user', '" . date("Y-m-d H:i:s") . "', '$status')");
        $query->execute();
    } catch (PDOException $e) {
        echo "Failed to get DB handle: " . $e->getMessage() . "\n";
        exit;
    }
}
function createUser()
{
    $hostname = "localhost";
    $dbname = "dwes-nilpujol-autpdo";
    $username = "dwes-user";
    $pw = "dwes-passw";
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    $nom = $_POST['nom'];
    try {
        $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", "$username", "$pw");
        $query = $pdo->prepare("insert into users values ('$email', '$passwd', '$nom')");
        $query->execute();
    } catch (PDOException $e) {
        echo "Failed to get DB handle: " . $e->getMessage() . "\n";
        exit;
    }
}
