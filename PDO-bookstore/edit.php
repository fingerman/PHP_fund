<?php
require_once 'app.php';

if (isset($_GET['id'])) {
	$id = intval($_GET['id']);
	$book = $bookService->getById($id);
}
$data = $bookService->getIndexViewData();

if (isset($_POST['edit'])) {
    $author = $_POST['author'];
    $title = $_POST['title'];
    $language = $_POST['language'];
    $genre = $_POST['genre_id'];
    $comment = $_POST['comment'];

    $bookService->editBook(intval($_GET['id']), $author, $title, $genre, $language, $comment);
    header("Location: books.php");
}

$app->loadTemplate("edit_frontend", $data, $book);