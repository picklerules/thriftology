<?php
if(isset($_GET['id']) && $_GET['id']!=null ){
    $id= $_GET['id'];
    require_once('classe/CRUD.php');
    $crud = new CRUD;
    $utilisateur = $crud->selectId('utilisateur', $id);
    extract($utilisateur);
}else{
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <img src="assets/img/banner.png" alt="Thriftology banner" class="banner">
    </header>
    <h1>Modifier Utilisateur</h1>
    <form action="utilisateur-update.php" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <label>Nom
            <input type="text" name="nom" value="<?= $nom; ?>">
        </label>
        <label>Email
            <input type="email" name="email" value="<?= $email; ?>">
        </label>
        <input type="submit" value="Enregistrer">
    </form>
</body>
</html>
