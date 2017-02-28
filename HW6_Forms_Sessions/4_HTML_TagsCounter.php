<?php

session_start();
if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
};

$htmlTags = '<!DOCTYPE> <a> <abbr> <address> <area> <article> <aside> <audio> <b> <base>
    <bdi> <bdo> <blockquote> <body> <br> <button> <canvas> <caption> <cite> <code> <col> <colgroup> <command> <datalist>
    <dd> <del> <details> <dfn> <div> <dl> <dt> <em> <embed> <fieldset> <figcaption> <figure> <footer> <form> <h1>
    <h6> <head> <header> <hgroup> <hr> <html> <i> <iframe> <img> <input> <ins> <kbd> <keygen> <label> <legend> <li> <link> <map> <mark>
    <menu> <meta> <meter> <nav> <noscript> <object> <ol> <optgroup> <option> <output> <p> <param> <pre> <progress> <q> <rp> <rt>
    <ruby> <s> <samp> <script>';

$htmlTags = explode(' ', $htmlTags);

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form method="GET">
    <label>Input</label>
        <input type="text" name="input">
    <button type="submit" >Send</button>
</form>

<?php
    if(isset($_GET['input'])){
        $input = $_GET['input'];
        if ($input[0] != '<' && $input[strlen($input) -  1] != '>'){
            $input = '<' . $input;
            $input .= '>';
        }

        if (in_array($input, $htmlTags)){
            echo "<h1>" ." valid HTML Tag !" . "</h1>";
            $_SESSION['score']++;
        }
        else{
            echo "<h1>" . "Invalid HTML Tag" . "</h1>";
        }
        echo "<h2>" . "Score: " . $_SESSION['score'] . "</h2>";

    }
?>

</body>
</html>
