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
    <title>Modifier un vetement</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <img src="assets/img/banner.png" alt="Thriftology banner" class="banner">
    </header>
    <h1>Modifier le vêtement</h1>
    <form action="vetement-update.php" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <label>Nom
            <input type="text" name="nom" value="<?= $nom; ?>">
        </label>
        <label>Description
            <input type="text" name="description" value="<?= $description; ?>">
        </label>
        <label>Prix
            <input type="text" name="prix" value="<?= $prix; ?>">
        </label>
        <input type="submit" value="Enregistrer">
    </form>
</body>
</html>
