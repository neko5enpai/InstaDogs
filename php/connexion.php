<?php

require ('chien.php');
require ('user.php');

class Connexion {
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

    public function getDog() {
        $rp = $this->connexion->prepare(
            "SELECT * FROM Dog");

        // J'execute la requête en passant la valeur
        $rp->execute();

        // Je récupère le résultat de la requête
        $dog = $rp->fetchAll(PDO::FETCH_CLASS, "Dog");

        // Je retourne/renvoie la liste de hobby
        return $dog;
    }

    public function getUserById($id) {
        $rp = $this->connexion->prepare("SELECT * FROM User WHERE Id=:id");
        $rp->execute(array('id'=>"$id"));

        $user = $rp->fetchObject("User");

        return $user;
    }

    public function insertUser($userName, $password, $latestLogin) {
        $rp = $this->connexion->prepare("INSERT INTO User (userName, userPassword, latestLogin) VALUES (:userName, :userPassword, :latestLogin)");
        $rp->execute(
            array ( 'userName' => $userName, 'userPassword' => $password, 'latestLogin' => $latestLogin)
        );
        $id = $this->connexion->lastInsertId();

			return $id;
    }

    public function isLoginExists($login) {
        $rp = $this->connexion->prepare("SELECT * FROM User WHERE userName=:userName");
        $rp->execute(array('userName'=>$userName));

        $row = $rp->rowCount();

        if($row > 0) {
            return TRUE;
        }
        return FALSE;
    }

    

}


?>