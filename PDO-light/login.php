<?php
require_once 'app.php';
if (isset($_POST['login'])) {
    $name = $_POST['username'];
    $pass = $_POST['password'];
    $userService = new \Services\UserService($db);

    $id = $userService->login($name, $pass);
    $_SESSION['id'] = $id;
    header("Location: welcome.php");
    exit;
}
$app->loadTemplate("login_frontend");