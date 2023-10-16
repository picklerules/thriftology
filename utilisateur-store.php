<?php
require_once('classe/CRUD.php');

$crud = new CRUD;
$insert = $crud->insert('utilisateur', $_POST);

header("location:utilisateur-show.php?id=$insert");

?>