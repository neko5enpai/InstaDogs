
<?php 
if (!empty(($_POST['username']) AND ($_POST['password']) AND ($_POST['confirmpassword']))) {
    require ('connexion.php');
    $app = new Connexion();
    
    $userName = $_POST['username'];
    $userPassword = $_POST['password'];
    $userPassword = password_hash($userPassword,PASSWORD_BCRYPT,['cost'=>9]);
    $newId = $app->insertUser($userName, $userPassword, "2019-02-05");
    header("Location: /projets/InstaDogs/profil.php?id=$newId", true, 303);
    exit;
}else{
    header("Location: /projets/InstaDogs/inscription.html");
}
?>