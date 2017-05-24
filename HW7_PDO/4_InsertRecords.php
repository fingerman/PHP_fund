<?php
$db = new PDO("mysql:host=localhost;dbname=minions", "root", "");

$stmt2 = $db->query(
    "INSERT INTO towns (id,  name )
VALUES
	( '1', 'Sofia' ),
	( '2', 'Plovdiv'	),
	( '3', 'Varna')"
);


$stmt3 = $db->query(
    "INSERT INTO minions (id, name, age, town_id )
VALUES
( '1', 'Kevin', '22', '1' ),
	( '2', 'Bob', 	'15', '3'	),
	( '3', 'Steward', NULL, '2')"
);


