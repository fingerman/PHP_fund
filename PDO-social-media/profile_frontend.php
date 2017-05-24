<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link  rel="stylesheet" type="text/css"  href="bootstrap.css"/>
    <title>Welcome to your profile</title>
</head>
<body>
<div class="container">
    <h1>Welcome <?= $currentUser['first_name']; ?>  <?= $currentUser['last_name']; ?> with nickname <?= $currentUser['nickname']; ?></h1>
    <img src="<?=$currentUser['picture'];?>"/>
</div>
</body>