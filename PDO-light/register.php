<?php
require_once 'app.php';
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $confirm = $_POST['confirm'];

    $userService = new \Services\UserService($db);
    if (!$userService->isPasswordMatch($pass, $confirm)) {
        throw new Exception("Password mismatch");
    }

    if ($userService->exists($name)) {
        throw new Exception("Name already exists");
    }

    $userService->register($name, $pass);
    header("Location: login.php");
    exit;
}
$app->loadTemplate("register_frontend");