<?php
require ("php/connexion.php");
var_dump($_FILES);
$suffixe = date("YmdHis");
$uploadedFileName = $_FILES["image"]["name"];
$uploadedFile = new SplFileInfo($uploadedFileName);
$fileExtension = $uploadedFile->getExtension();
$destinationFolder = $_SERVER['DOCUMENT_ROOT']."/projets/InstaDogs/";
$destinationName = "img/photo-".$suffixe.".".$fileExtension;

if(move_uploaded_file($_FILES["image"]["tmp_name"], $destinationFolder.$destinationName)){
    echo "<br/> fichier enregistré avec succes";
}

$article=$_POST['article'];
$titre=$_POST['title'];


?>
