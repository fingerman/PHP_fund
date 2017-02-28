<html>
<head>
</head>
    <body>

<?php $matrix = []; ?>
<table border="1">
    <?php for ($row = 0; $row < count($matrix); $row++) : ?>
        <tr>
            <?php for ($col = 0; $col < count($matrix[$row]); $col++) : ?>
                <td><?= htmlspecialchars($matrix[$row][$col]) ?></td>
            <?php endfor ?>
        </tr>
    <?php endfor ?>
</table>
<?php print_r($matrix) ?>
    </body>

</html>
