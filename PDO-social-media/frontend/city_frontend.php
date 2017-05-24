<?php /** @var $data \Data\Cities\AllCitiesViewData */ ?>

<?php $i = 0; ?>
<?php foreach ($data->getCities() as $city): ?>
    <?php var_dump($i++); ?>
   <h1><?= $city->getName(); ?></h1>
<?php endforeach; ?>
