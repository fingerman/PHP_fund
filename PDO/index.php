<?php





$db = new PDO("mysql:host=localhost; dbname=blog", "root", "");
$stmt = $db->query("SELECT * FROM users");
$person = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($person);

/*
public function getEmail(string $username) : string
{

    $statement = $this->db->prepare("SELECT email FROM users WHERE username = ?");
    $statement->execute(
        [
            $username
        ]
    );
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    return $result['email'];

}

echo $username.getEmail("Mike");

*/