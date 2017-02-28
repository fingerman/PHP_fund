
<?php
$colors = (object)[];
$colors->red = "#F00";
$colors->slateblue = "#6A5ACD";
$colors->orange = "#FFA500";

foreach ($colors as $key => $value) : ?>
    <p style="background-color:<?= $value ?>">
        <?= $key ?> -> <?= $value ?>
    </p>
<?php endforeach; ?>