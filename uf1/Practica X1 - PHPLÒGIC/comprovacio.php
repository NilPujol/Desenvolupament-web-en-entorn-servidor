<?php
session_start();

if (in_array($_GET['paraula'], $_SESSION['paraules'])) {
    $_SESSION['count'] += 1;
    $_SESSION['correctes'][] = $_GET['paraula'];
    unset($_SESSION['paraules'][array_search($_GET['paraula'], $_SESSION['paraules'])]);
    echo "trobat";
    header('Location: index.php', true, 302);
    //code if true
} else if (in_array($_GET['paraula'], $_SESSION['correctes'])) {
    header('Location: index.php?error=Repetida', true, 303);
} else {
    header('Location: index.php?error=Incorrecte', true, 303);
}
