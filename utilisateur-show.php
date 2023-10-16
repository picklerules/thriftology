<?php
if(isset($_GET['id']) && $_GET['id']!=null ){
    $id= $_GET['id'];
    require_once('classe/CRUD.php');
    $crud = new CRUD;
    $utilisateur = $crud->selectId('utilisateur', $id);
    // var_dump($utilisateur);
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
    <title>Utilisateur</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>    
        <img src="assets/img/banner.png" alt="Thriftology banner" class="banner">
    </header>
    <h1>Utilisateur</h1>
    <p><strong>Nom: </strong><?= $nom; ?></p>
    <p><strong>Email: </strong><?= $email; ?></p>
    <form action="utilisateur-edit.php?id=<?= $id; ?>" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <br>
        <input type="submit" value="Modifier">
    </form>
    <form action="utilisateur-delete.php" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <br>
        <input type="submit" value="Delete">
    </form>
    <a href="index.php?>">Retourner à la page d'accueil</a>
</body>
</html>
