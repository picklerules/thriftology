<?php
require_once('classe/CRUD.php');
$crud = new CRUD;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Créer un utilisateur</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <img src="assets/img/banner.png" alt="Thriftology banner" class="banner">
    </header>
    <h1>Créer un utilisateur</h1>
    <form action="utilisateur-store.php" method="post">
        <label>Nom: <input type="text" name="nom"></label>
        <label>Email: <input type="email" name="email"></label>
        <label>Mot de passe: <input type="password" name="motdepasse"></label>
        <input type="submit" value="Créer">
    </form>
</body>
</html>
