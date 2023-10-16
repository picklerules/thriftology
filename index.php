<?php

require_once('classe/CRUD.php');

$crud = new CRUD;
$utilisateur = $crud->select('utilisateur', 'nom');
$vetement = $crud->select('vetement', 'nom');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <img src="assets/img/banner.png" alt="Thriftology banner" class="banner">
    </header>
    <h1>Accueil</h1>
    <div class="table-container">
        <table>
            <tr>
                <th>Nom de l'utilisateur</th>
                <th>Email</th>
            </tr>

            <?php
            foreach($utilisateur as $row){
            ?>

                <tr>
                    <td><a href="utilisateur-show.php?id=<?= $row['id']?>"><?= $row['nom']?></a></td>
                    <td><?= $row['email']?></td>

                </tr>

            <?php
            }
            ?>
                <td><a href="utilisateur-create.php">Ajouter</a></td>
        </table>
    </div>
    <div class="table-container">
        <table>
            <tr>
                <th>Nom du vetement</th>
                <th>Description</th>
                <th>Prix</th>
            </tr>

            <?php
            foreach($vetement as $row){
            ?>

                <tr>
                    <td><a href="vetement-show.php?id=<?= $row['id']?>"><?= $row['nom']?></a></td>
                    <td><?= $row['description']?></td><td><?= $row['prix']?>$</td>
                </tr>

            <?php
            }
            ?>
                <td><a href="vetement-create.php">Ajouter</a></td>
        </table>
    </div>
</body>
</html>
