<?php
session_start();
$users = "users.json";
$connections = "connexions.json";
$jsonUsers = json_decode(file_get_contents($users), true);
$jsonCon = json_decode(file_get_contents($connections), true);
if ($_POST['method'] == "signin") {
    if (!isset($jsonUsers[$_POST['email']])) {
        $jsonCon[] = array("ip" => $_SERVER['REMOTE_ADDR'], "user" => $_POST['email'], "time" => date("Y-m-d H:i:s"), "status" => "signin_email_error");
        file_put_contents($connections, json_encode($jsonCon));
        header('Location: index.php?error=signin_email_error', true, 303);
    } else if ($jsonUsers[$_POST['email']]['password'] != $_POST['passwd']) {
        $jsonCon[] = array("ip" => $_SERVER['REMOTE_ADDR'], "user" => $_POST['email'], "time" => date("Y-m-d H:i:s"), "status" => "signin_password_error");
        file_put_contents($connections, json_encode($jsonCon));
        header('Location: index.php?error=signin_password_error', true, 303);
    } else {
        $jsonCon[] = array("ip" => $_SERVER['REMOTE_ADDR'], "user" => $_POST['email'], "time" => date("Y-m-d H:i:s"), "status" => "signin_success");
        file_put_contents($connections, json_encode($jsonCon));
        login();
    }
} else if ($_POST['method'] == "logoff") {
    $_SESSION['date'] = null;
    $_SESSION['email'] = null;
    $jsonCon[] = array("ip" => $_SERVER['REMOTE_ADDR'], "user" => $_POST['email'], "time" => date("Y-m-d H:i:s"), "status" => "logoff");
    file_put_contents($connections, json_encode($jsonCon));
    header('Location: index.php', true, 302);
} else {
    if (!isset($_POST['email'])) {
        $jsonCon[] = array("ip" => $_SERVER['REMOTE_ADDR'], "user" => $_POST['email'], "time" => date("Y-m-d H:i:s"), "status" => "signin_email_error");
        file_put_contents($connections, json_encode($jsonCon));
        header('Location: index.php?error=signin_email_error', true, 303);
    } else if (isset($jsonUsers[$_POST['email']])) {
        $jsonCon[] = array("ip" => $_SERVER['REMOTE_ADDR'], "user" => $_POST['email'], "time" => date("Y-m-d H:i:s"), "status" => "signup_exist_error");
        file_put_contents($connections, json_encode($jsonCon));
        header('Location: index.php?error=signup_exist_error', true, 303);
    } else if (!isset($_POST['passwd'])) {
        $jsonCon[] = array("ip" => $_SERVER['REMOTE_ADDR'], "user" => $_POST['email'], "time" => date("Y-m-d H:i:s"), "status" => "signin_password_error");
        file_put_contents($connections, json_encode($jsonCon));
        header('Location: index.php?error=signin_password_error', true, 303);
    } else {
        $jsonUsers[$_POST['email']] = array("email" => $_POST['email'], "password" => $_POST['passwd'], "name" => $_POST['nom']);
        file_put_contents($users, json_encode($jsonUsers));
        $jsonCon[] = array("ip" => $_SERVER['REMOTE_ADDR'], "user" => $_POST['email'], "time" => date("Y-m-d H:i:s"), "status" => "signin_success");
        file_put_contents($connections, json_encode($jsonCon));
        login();
    }
}
function login()
{
    $_SESSION['date'] = time();
    $_SESSION['email'] = $_POST['email'];
    header('Location: hola.php', true, 302);
}
