<?php 
session_start();
require ("php/connexion.php");
$app=new Connexion();

    $dogId=$_GET['id'];
    $dog=$app->getDogById($dogId);
    $userId=$_SESSION['id'];
    $age=$_POST["birthDate"];
    $dogName = $_POST["dogName"];
    $nickname=$_POST["nickname"];
    $gender=$_POST["optradio"];
    $breed=$_POST["race"];
    $crossed=$_POST["croisement"];
    var_dump($_FILES["dogProfilePic"]);
    if(is_uploaded_file($_FILES["dogProfilePic"]["tmp_name"])){
        $suffixe = date("YmdHis");
        $uploadedFileName = $_FILES["dogProfilePic"]["name"];
        $uploadedFile = new SplFileInfo($uploadedFileName);
        $fileExtension = $uploadedFile->getExtension();
        $destinationFolder = $_SERVER['DOCUMENT_ROOT']."/projets/InstaDogs/";
        $destinationName = "img/photo-".$suffixe.".".$fileExtension;
        
        if(move_uploaded_file($_FILES["dogProfilePic"]["tmp_name"], $destinationFolder.$destinationName)){
            echo "<br/> fichier enregistré avec succes";
        }
        
    }else{
        $destinationName = $dog->getPhotoURL(); 
    }
    $app->modifDog($dogId,$userId,$age,$dogName,$nickname,$gender,$breed,$crossed,$destinationName);

    header("Location:profil.php");
?>