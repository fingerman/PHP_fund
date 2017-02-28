<html>
<body>

<form action="_isset.php" method="get">
    Name: <input type="text" name="name"><br>
    <input type="submit">
</form>

<?php

$username = $_GET['name'] ?? 'not passed';
print($username);


?> <br>


</body>
</html>


<?php

$a = "null";

print $a ?? 'b';
print "\n";

print $a ?: 'b';
print "\n";


