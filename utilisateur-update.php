<?php
require_once('classe/CRUD.php');

$crud = new CRUD;
$update = $crud->update('utilisateur', $_POST);

header('Location: index.php');
?>
