<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="3_AnnualExpenses.php" method="post">
    <label for="inputYears">Enter number of years</label>
    <input type="number" id="inputYears" min="1" max="48" name="num"/>
    <input type="submit" name="submit" value="Show costs"/>
</form>
<br/>

<?php
    if (isset($_POST['submit']) && !empty($_POST["num"])):
    $years = $_POST['num'];
    $currentYear = date("Y");
?>

<table border = "1">
    <thead>
    <tr>
        <th>Year</th>
        <th>January</th>
        <th>February</th>
        <th>March</th>
        <th>April</th>
        <th>May</th>
        <th>June</th>
        <th>July</th>
        <th>August</th>
        <th>September</th>
        <th>October</th>
        <th>November</th>
        <th>December</th>
        <th>Total:</th>
    </tr>
    <?php
    for ($i = $years; $i > 0; $i--):
        $sum = 0;
        ?>
        <tr>
            <td><?php
                echo $currentYear;
                $currentYear--;
                ?>
            </td>
            <?php for ($j = 0; $j < 12; $j++): ?>
                <td>
                    <?php
                    $num = rand(0, 999);
                    $sum += $num;
                    echo $num;
                    ?>
                </td>
            <?php endfor ?>
            <td><?php echo $sum ?></td>
        </tr>
        <?php
    endfor;
    endif;
    ?>
</body>
</html>
