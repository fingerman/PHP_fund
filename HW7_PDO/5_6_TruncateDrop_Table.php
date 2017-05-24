<?php

$db = new PDO("mysql:host=localhost;dbname=minions", "root", "");
$stmt5 = $db->query(
    "TRUNCATE TABLE minions"
);

$stmt6 = $db->query(
    "DROP TABLE minions, towns"
);