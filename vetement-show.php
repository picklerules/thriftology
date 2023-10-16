<?php
if(isset($_GET['id']) && $_GET['id']!=null ){
    $id= $_GET['id'];
    require_once('classe/CRUD.php');
    $crud = new CRUD;
    $vetement = $crud->selectId('vetement', $id);

    extract($vetement);
}else{
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vetements</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>    
        <img src="assets/img/banner.png" alt="Thriftology banner" class="banner">
    </header>
    <h1>Vetements</h1>
    <p><strong>Nom: </strong><?= $nom; ?></p>
    <p><strong>Description: </strong><?= $description; ?></p>
    <p><strong>Prix: </strong><?= $prix; ?> $</p>
    <form action="vetement-edit.php?id=<?= $id; ?>" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <br>
        <input type="submit" value="Modifier">
    </form>
    <form action="vetement-delete.php" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <br>
        <input type="submit" value="Delete">
    </form>
    <a href="index.php?>">Retourner à la page d'accueil</a>
</body>
</html>
