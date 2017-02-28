
<html>
<head>
</head>
<body>

<form method="get">Enter cars
    <input type="text" name="car">
    <input type="submit" value="Show result">
</form>
<table c>
    <tr><th width = "50">Car</th><td width="50">Colour</td><td width="50">Count</td></tr>
    <?php
    if( isset( $_GET['car'])) :

        $colours=array("white","black","red","grey","yellow","brown","blue", "green", "orange");
        $carArray=explode(',',$_GET['car']);

        for($i=0; $i < count($carArray); $i++):?>
            <tr><td>
                    <?=$carArray[$i]?> </td> <td> <?=$colours[rand(0, 8)] ?> </td><td> <?=rand(1, 5) ?> </td></tr>
        <?php endfor; ?>
    <?php endif;?>
</table>
</body>
</html>