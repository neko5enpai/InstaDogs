<?php
require ('connexion.php');


$app = new Connexion();

/* $app->insertBreed("Corgi"); */

$dog=$app->getDog();

/* echo $dog->getDog(); */
echo $dog[0]->getDogName();
echo $dog[1]->getDogName();

$user=$app->getUserById(1);

echo $user->getUserName();



/* var_dump($dog); */

?>