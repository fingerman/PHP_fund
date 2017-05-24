<?php
require_once 'app.php';
$cityService = new \Service\CityService($db);

$data = $cityService->getAll();

$app->loadTemplate("city_frontend", $data);
