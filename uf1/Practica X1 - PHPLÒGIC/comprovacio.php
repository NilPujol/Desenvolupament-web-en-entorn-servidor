<?php
session_start();

if (in_array($_POST['paraula'], $_SESSION['paraules'])) {
    $_SESSION['correctes'][] = $_POST['paraula'];
    unset($_SESSION['paraules'][array_search($_POST['paraula'], $_SESSION['paraules'])]);
    header('Location: index.php', true, 302);
    //code if true
} else if (in_array($_POST['paraula'], $_SESSION['correctes'])) {
    header('Location: index.php?error=Repetida', true, 303);
} else {
    header('Location: index.php?error=Incorrecte', true, 303);
}
