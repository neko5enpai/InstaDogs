<?php

require ('php/connexion.php');

$moomoo = new Connexion(); // Moomoo est un objet qui détient les fonctions de requêtes

$dogs = $moomoo->getDog(); // Stocke le retour de la requête SQL dans une variable

foreach($dogs as $dog) {
    echo $dog->getDogName();
}

?>