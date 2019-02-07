<?php 

require ('connexion.php');

$app = new Connexion();

$userName = $_POST['username'];
$userPassword = $_POST['password'];
$confirmPassword = $_POST['confirmpassword'];

echo "$userName </br> $userPassword </br> $confirmPassword";

$latestLogin = date("Y-m-d");

$newId = $app->insertUser($userName, $userPassword, $latestLogin);

header("Location: /InstaDogs/profil.php?id=$newId", true, 303);

exit;

?>