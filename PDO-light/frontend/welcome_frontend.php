<?php /** @var $data \Models\User */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>WELCOME <?=$data->getId() . ' - ' . $data->getName();?></h1>
</body>
</html>

