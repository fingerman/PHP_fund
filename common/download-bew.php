<?php require_once('protect.php'); ?>
session_start();


<?php

if(!(session_id())){echo "no access";}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Protector</title>
</head>
<body>
 <a href="/PHP1/common/bew.pdf">Herunterladen</a>
<br>
<br>
<a href="http://www.github.com/fingerman">Github Profil</a>

</body>
</html>


