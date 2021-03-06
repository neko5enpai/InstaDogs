<?php

require ('chien.php');
require ('user.php');
require('article.php');

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

    public function getDogById($id){
        $rp=$this->connexion->prepare("SELECT * FROM Dog WHERE Id=:id");
        $rp->execute(array('id'=>$id));
        $dog = $rp->fetchObject("Dog");
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

    public function getUserByUserName($userName){
        $rp = $this->connexion->prepare("SELECT * FROM User WHERE userName=:userName");
        $rp->execute(array('userName'=>"$userName"));
        $user=$rp->fetchObject("User");
        return $user;
    }
    public function insertLastConnexionByUserName($userName,$lastLogin){
        $rp = $this->connexion->prepare("UPDATE User SET latestLogin = :lastLogin WHERE userName =:userName");
        $rp->execute(array('lastLogin'=>"$lastLogin",'userName'=>"$userName"));
    }

    public function insertDog($userId,$age,$dogName,$nickname,$gender,$breed,$crossed,$photoURL){
        $rp=$this->connexion->prepare("INSERT INTO Dog (userId, age, dogName, nickname, gender, breed,crossBreeding,photoURL) VALUES (:userId,:age,:dogName,:nickname,:gender,:breed,:crossBreeding,:photoURL)");
        $rp->execute(array("userId"=>$userId,"age"=>$age,"dogName"=>$dogName,"nickname"=>$nickname,"gender"=>$gender,"breed"=>$breed,"crossBreeding"=>$crossed,"photoURL"=>$photoURL));
    }

    public function getDogByUserId($userId){
        $rp=$this->connexion->prepare("SELECT * FROM Dog WHERE userId=:userId");
        $rp->execute(array('userId'=>$userId));
        $dogs=$rp->fetchAll(PDO::FETCH_CLASS, "Dog");
        return $dogs;
    }

    public function insertComment($userId, $articleId, $commentaryText, $commentaryDate) {
        $rp = $this->connexion->prepare("INSERT INTO Commentary (userId, articleId, commentaryText, commentaryDate) VALUES (:userId, :articleId, :commentaryText, :commentaryDate)");
        $rp->execute(array("userId"=>$userId, "articleId"=>$articleId, "commentaryText"=>$commentaryText, "commentaryDate"=>$commentaryDate));
    }

    public function getCommentByArticle($articleId) {
        $rp=$this->connexion->prepare("SELECT * FROM Commentary WHERE articleId=:articleId");
        $rp->execute(array("articleId"=>$articleId));
        $comment=$rp->fetchAll(PDO::FETCH_CLASS, "Commentary");
        return $comment;
    }

    public function insertArticleByDogId($dogId,$articleId,$articleDate,$articleImage,$articleText) {
        $rp=$this->connexion->prepare("INSERT INTO Article (dogId, articleDate, articleImage, articleText) VALUES (:dogId, :articleDate, :articleImage, :articleText)");
        $rp->execute(array("dogId"=>$dogId, "articleId"=>$articleId, "articleDate"=>$articleDate, "articleImage"=>$articleImage, "articleText"=>$articleText));
    }

    public function selectArticlesByDogId($dogId){
        $rp=$this->connexion->prepare("SELECT * FROM Article WHERE  dogId =:dogId");
        $rp->execute(array("dogId"=>$dogId));
        $articles=$rp->fetchAll(PDO::FETCH_CLASS,"Article");
        return $articles;
    }

    public function modifDog($dogId,$userId,$age,$dogName,$nickname,$gender,$breed,$crossed,$destinationName){
        $rp=$this->connexion->prepare(
            "UPDATE Dog 
            SET age=:age, dogName=:dogName, nickname=:nickname,gender=:gender,breed=:breed,crossBreeding=:crossBreeding,photoURL=:photoURL
            WHERE id=:dogId");
        $rp->execute(array("dogId"=>$dogId, "age"=>$age,"dogName"=>$dogName,"nickname"=>$nickname, "gender"=>$gender,"breed"=>$breed,"crossBreeding"=>$crossed,"photoURL"=>$destinationName));
    }

    public function deleteDogById($dogId){
        $rp=$this->connexion->prepare("DELETE FROM Dog WHERE id =:dogId");
        $rp->execute(array("dogId"=>$dogId));
    }

}


?>