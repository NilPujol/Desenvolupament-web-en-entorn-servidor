<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$hostname = "localhost";
$dbname = "dwes-nilpujol-gossos";
$username = "dwes-user";
$pw = "dwes-passw";
try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", "$username", "$pw");
} catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
}


$fase = getCurrentFase();
$id = session_id();
$opt = $_POST['opt'];

$query = $pdo->prepare("select * from vots where id='$id' and fase='$fase'");
$query->execute();
$vots = $query->fetch();
if ($vots != null) {
    $query = $pdo->prepare("UPDATE vots SET opt = '$opt' where id='$id' and fase='$fase'");
    $query->execute();
} else {
    $query = $pdo->prepare("insert into vots values ('$fase', '$id','$opt')");
    $query->execute();
}


function getCurrentFase()
{
    return 1;
}
