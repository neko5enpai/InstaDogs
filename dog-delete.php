<?php
require ("php/connexion.php");

$app=new Connexion();
$dogId= $_POST["dog-delete"];


$app->deleteDogById($dogId);

header("Location:profil.php");
?>