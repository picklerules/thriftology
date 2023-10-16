<?php
require_once('classe/CRUD.php');

$crud = new CRUD;
$delete = $crud->delete('utilisateur', $_POST['id']);

header('Location: index.php');
?>
