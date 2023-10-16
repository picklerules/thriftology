<?php
require_once('classe/CRUD.php');

$crud = new CRUD;
$insert = $crud->insert('vetement', $_POST);

header("location:vetement-show.php?id=$insert");

?>