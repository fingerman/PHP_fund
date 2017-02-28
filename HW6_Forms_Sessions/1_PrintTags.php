
<html>
<head>
    <style>
        ol {
            counter-reset: item -1;
        }
        li {
            display: block;
        }
        li:before {
            content: counter(item) ': ';
            counter-increment: item;
        }
    </style>
</head>
<body>

<form method="get">Enter tags:<br/><br/>
    <input type="text" name="tag">
    <input type="submit" value="Submit">
</form>
    <ol start="0">
    <?php
    if( isset( $_GET['tag'])) :
        $tagArray=explode(', ',$_GET['tag']);
        for($i=0; $i < count($tagArray); $i++):?>
            <li>
                    <?=$tagArray[$i]?>

            </li>    <?php endfor; ?>
    <?php endif;?>
        </ol>
</body>
</html>