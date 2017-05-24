<?php
/*  Problem 1 Create DB  */
// CREATE DATABASE minions CHARACTER SET utf8 COLLATE utf8_general_ci;
// USE `minions`;



/*  Problem 2: Create Table */
$db = new PDO("mysql:host=localhost;dbname=minions", "root", "");

$stmt = $db->query(
    "CREATE TABLE minions
(
    id int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    age int NOT NULL,
    PRIMARY KEY (id)
)");


$stmt1 = $db->query(
    "CREATE TABLE towns
(
    id int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    PRIMARY KEY (id)
)");


/* Problem 3.	Alter Minions Table - add Foreign Key*/

//  ALTER TABLE `minions` ADD COLUMN `town_id` INT(11) NOT NULL AFTER `age`;
//  ALTER TABLE `minions`
//  ADD CONSTRAINT `FK_minions_towns` FOREIGN KEY (`town_id`) REFERENCES `towns` (`id`);