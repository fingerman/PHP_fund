<?php
/** @var $data \Data\IndexViewData */
/** @var $book \Data\EditBookViewData*/

?>

<form method="post" enctype="multipart/form-data">
    Book ID*: <input value="<?= $book->getIsbn(); ?>" type="text" name="isbn" readonly/> <br/>
    Author*: <input value="<?= $book->getAuthor(); ?>" type="text" name="author"/> <br/>
    Title*: <input value="<?= $book->getTitle(); ?>" type="text" name="title"/> <br/>
    Language*: <input value="<?= $book->getLanguage(); ?>" type="text" name="language"/> <br/>
    Year of release*: <input value="<?= $book->getReleasedOn(); ?>" type="text" name="released_on" readonly/> <br/>
    Genre*:
    <select name="genre_id">
        <?php foreach ($data->getGenres() as $genre): ?>
            <option <?= $book->getGenre() == $genre->getId()
                ? 'selected'
                : '';?> value="<?=$genre->getId();?>">
                <?=$genre->getName(); ?>
            </option>
        <?php endforeach; ?>
    </select><br/>

    Comment

    <textarea name="comment"><?= $book->getComment(); ?></textarea><br/>

    Image: <input type="file" name="image"/>
    <br/>
    <input type="submit" name="edit" value="Submit Book"/>
</form>

<?php if($data->getError()): ?>
   <h2><?= $data->getError(); ?></h2>
<?php endif; ?>

<form action="books.php">
    <input type="submit" value="Show Books"/>
</form>