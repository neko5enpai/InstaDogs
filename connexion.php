<?php

class Connexion{
    private $connexion;

    public function __construct(){
        $HOST = 'localhost';
        $DBNAME = 'InstaDog';
        $USER = 'adminInstaDog';
        $PASSWORD = 'Inst@D0g';

        try{
            $this->connexion = new PDO('mysql:host='.$HOST.';dbname='.$DBNAME,$USER,$PASSWORD);
        }catch(Exception $e){
            echo 'Erreur : '.$e->getMessage().'<br>';
            echo 'N° : '.$e->getCode();
        }
    }


    public function insertBreed($breed){
        $rp=$this->connexion->prepare("INSERT INTO Breed (breedType) VALUES (:breed)");
        $rp->execute(array('breed'=>"$breed"));
    }
}


?>