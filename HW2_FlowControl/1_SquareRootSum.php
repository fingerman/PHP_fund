<html>
<body>


<table border="1">
    <tr>
        <th>Number</th>
        <th>Square</th>
    </tr>

<?php
$i = 0;
$x = 0;
$total = 0;

while ($i<=100) { ?>
    <tr>
        <td width="5">
            <?php
            echo $i;
            $i = $i+2;
            ?>

        </td>
        <td width="5">
            <?php
            echo round(sqrt($x), 2);
            $total +=sqrt($x);
            $x = $x+2;
            ?>
        </td>
    </tr>


<?php }?>
    <tr>
        <th>Total:</th>
        <td>
            <?php
            echo round($total, 2);


            ?>
        </td>
    </tr>
</table>
</body>
</html>