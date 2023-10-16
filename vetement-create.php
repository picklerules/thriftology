<?php
require_once('classe/CRUD.php');
$crud = new CRUD;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un vêtement</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <img src="assets/img/banner.png" alt="Thriftology banner" class="banner">
    </header>
    <h1>Ajouter un vêtement</h1>
    <form action="vetement-store.php" method="post">
        <label>Nom: <input type="text" name="nom"></label>
        <label>Description: <input type="text" name="description"></label>
        <label>Prix: <input type="text" name="prix"></label>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
