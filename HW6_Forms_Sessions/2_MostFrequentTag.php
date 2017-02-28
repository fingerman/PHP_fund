<?php
    session_start();
    if (!isset($_SESSION['tagsCount'])) {
        $_SESSION['tagsCount'] = [];
    }

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Print Tags</title>
</head>
<body>
<form method="GET" >Enter tags: <br><br>
    <input type="text" name="input" />
    <input type="submit" name="submit" value="Submit" />
    <a href="2_MostFrequentTag.php?clear=true"><button type="button">Clear</button></a>
</form>
<br>
<?php

if (isset($_GET['input'])) {
    $input = $_GET['input'];
    $input = explode(', ', $input);

    foreach ($input as $tag) {
        if (array_key_exists($tag, $_SESSION['tagsCount'])) {
            $_SESSION['tagsCount'][$tag]++;
        } else {
            $_SESSION['tagsCount'][$tag] = 1;
        }
    }
    arsort($_SESSION['tagsCount']);

    echo "<ul>";
    foreach ($_SESSION['tagsCount'] as $key => $value) {
        echo "<li>$key: $value times</li>";
    }
    echo "</ul></br>";
    echo "Most frequent tag is: " . array_search(max($_SESSION['tagsCount']), $_SESSION['tagsCount']);
    }
    else {
        $_SESSION['tagsCount'] = [];
}
?>
</body>
</html>



