<?php
require_once('classe/CRUD.php');

$crud = new CRUD;
$update = $crud->update('vetement', $_POST);

header('Location: index.php');
?>
