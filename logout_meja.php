<?php
include "model/_crud.mysqli.oop.php";
$crud =new CRUD("localhost","root","","restoran");

$inimeja = @$_POST['inimeja'];

session_start();
session_destroy();

header('location:index.php');

$crud->delete("meja","tmpmeja='$inimeja'");


?>