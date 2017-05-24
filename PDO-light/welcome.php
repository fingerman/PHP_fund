<?php
require_once 'app.php';
$userService = new \Services\UserService($db);
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}
$id = $_SESSION['id'];
$info = $userService->getInfo($id);
$app->loadTemplate("welcome_frontend", $info);
