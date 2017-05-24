<?php
require_once 'app.php';

if (isset($_GET['id'])) {
    $bookService->deleteId(intval($_GET['id']));
    header("Location: books.php");
}
