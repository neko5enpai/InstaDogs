<?php 

require ('connexion.php');

$app = new Connexion();

$userName = $_POST['username'];
$userPassword = $_POST['password'];
$confirmPassword = $_POST['confirmpassword'];

echo "$userName </br> $userPassword </br> $confirmPassword";

$newId = $app->insertUser($userName, $userPassword, "2019-02-05");

header("Location: /InstaDogs/profil.php?id=$newId", true, 303);

exit;

?>