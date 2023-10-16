<?php
require_once('classe/CRUD.php');

$crud = new CRUD;
$delete = $crud->delete('vetement', $_POST['id']);

header('Location: index.php');
?>
