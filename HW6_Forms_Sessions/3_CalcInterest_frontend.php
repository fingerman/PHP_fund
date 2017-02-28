
/*render the amount of money you will have after the period you have chosen, (rounded to 2 decimal places) */

<?php if(isset($sign, $calculatedMoney)): ?>
    <h1><?= $sign; ?> <?= $calculatedMoney; ?></h1>
<?php endif; ?>
<form>
    <div>
        <label for="money">
            Enter Amount:
        </label>
        <input id="money" type="number" name="money" min="0" value="<?=$money;?>"/>
    </div>
    <div>
        <?php foreach ($validCurrencies as $currencyKey => $currencySign): ?>
            <input id="<?=$currencyKey;?>" type="radio" name="currency" <?= $currency == $currencyKey ? 'checked' : '';?> value="<?=$currencyKey;?>"/>
            <label for="usd">
                <?= $currencyKey; ?>
            </label>
        <?php endforeach; ?>
    </div>
    <div>
        <label for="interest">
            Compound Interest Amount:
        </label>
        <input id="interest" type="number" min="0" value="<?=$interest;?>" name="interest"/>
    </div>
    <div>
        <select name="period">
            <?php foreach ($validPeriods as $validPeriod => $userValue): ?>
                <option value="<?= $validPeriod; ?>" <?= $period == $validPeriod ? 'selected' : '';?>>
                    <?= $userValue; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="Calculate" value="Calculate"/>
    </div>
</form>
