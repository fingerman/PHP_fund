<form>
    <input type="text" name="first_name" />
    <input type="submit" value="Търси!" name="search"/>
</form>

<?php

if (isset($_GET['search'])) {
    $firstName = $_GET['first_name'];
    $db = new PDO("mysql:host=localhost;dbname=sex;charset=utf8", "root", "");
    $stmt = $db->prepare("SELECT * FROM people WHERE first_name = ?");
    $argumentsToDatabase = [$firstName];
    $stmt->execute($argumentsToDatabase);
    $person = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($person);
}



