<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>InstaDog - Login</title>
</head>

<body>
    <!-- Barre de Navigation Bootstrap -->
    <nav class="navbar navbar-expand-md navbar-light shadow-sm p-3 bg-white">
        <a class="navbar-brand" href="preview.php">InstaDog<img class="logo" src="img/paw.png" alt="Logo InstaDog"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php
                if(isset($_SESSION['id'])){
                    echo  '<li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                    </li>';
                }
                if(!isset($_SESSION['id']))
                    echo '<li class="nav-item">
                    <a class="nav-link" href="inscription.php">Inscription</a>
                    </li>';
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="preview.php">Preview</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="profil.php">Profil</a>
                </li>
            </ul>
        </div>
    </nav>

<?php
require ('php/connexion.php');
$app = new Connexion();
$user = $app->getUserById($_SESSION['id']);
$userName = $user->getUserName();
echo '<h1 class="user-name mt-3 text-center">'.$userName.'</h1>';
$dogs = $app->getDogByUserId($_SESSION['id']);
echo '<div class="d-flex flex-wrap justify-content-center">';
foreach($dogs as $dog){ ?>
        <div class="dogs">
            <a href="dog-profile.php?id=<?php echo $dog->getDogId()?>">
                <img width="200px" height="200px" class="img-thumbnail" src="<?php echo $dog->getPhotoURL()?>" alt="...">
                <h3><?php echo $dog->getDogName()?></h3>
            </a>
            <form style="float:left;" action="dog-delete.php" method="POST">
                <input type="hidden" name="dog-delete" value="<?php echo $dog->getDogId()?>">
                <button type="submit" class="btn btn-light delete_dog"><i class="fas fa-trash-alt"></i></button>
            </form>
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal<?php echo $dog->getDogId()?>"><i
                    class="fas fa-edit"></i></button>
            </div>  
        <!-- Modal -->
        <div id="myModal<?php echo $dog->getDogId()?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <!-- Formulaire nouveau chien -->
                        <!-- <p>Some text in the modal.</p> -->
                        <form class="registration" action="modif-dog.php?id=<?php echo $dog->getDogId()?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleFormControlInput<?php echo $dog->getDogId()?>">Nom du chien</label>
                                <input id="exampleFormControlInput<?php echo $dog->getDogId()?>" class="form-control" name="dogName" type="text"
                                    value="<?php echo $dog->getDogName()?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput<?php echo $dog->getDogId()+1?>">Surnom</label>
                                <input id="exampleFormControlInput<?php echo $dog->getDogId()+1?>" class="form-control" name="nickname" type="text"
                                    placeholder="Insérez le nom de votre chien" value="<?php echo $dog->getNickname()?>">
                            </div>
                            <div class="">
                                <label class="" for="profilPicInputt<?php echo $dog->getDogId()?>">Inserer photo de profile</label>
                                <input id="profilPicInputt<?php echo $dog->getDogId()?>" class="" name="dogProfilePic" type="file">
                            </div>
                            <div class="form-group">
                                <label class="mt-2">Date de naissance</label>
                                <input type="date" class="form-control" name="birthDate" value="<?php echo $dog->getAge()?>">
                            </div>
                            <div class="form-group">
                                <label class="radio-inline mr-2">
                                    <input type="radio" name="optradio" value="Mâle" <?php echo ($dog->getGender()==="Mâle"?"checked":"");?>> Mâle
                                </label>
                                <label class="radio-inline mr-2">
                                    <input type="radio" name="optradio" value="Femelle" <?php echo ($dog->getGender()==="Femelle"?"checked":"");?>> Femelle
                                </label>
                                <label class="radio-inline mr-2">
                                    <input type="radio" name="optradio" value="Non spécifié" <?php echo ($dog->getGender()==="Non spécifié"?"checked":"");?>> Non spécifié
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput<?php echo $dog->getDogId()+2?>">Race du chien</label>
                                <input class="form-control mt-2 mb-2" type="text" placeholder="Race du chien" name="race" value="<?php echo $dog->getBreed()?>">
                                <label for="exampleFormControlInput<?php echo $dog->getDogId()+3?>">Croisé</label>
                                <input  class="form-control mt-2" type="text" placeholder="Croisement" name="croisement" value="<?php echo $dog->getCrossBreeding()?>">
                            </div>
                            <a href="profil.php">
                                <input type="submit" id="insert" class="btn btn-success">
                            </a>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php }?>
    
    
    
</div>

<!-- Trigger the modal with a button -->
<div class="container mt-3">
    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Add new dog</button>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- <h4 class="modal-title">Nouveau chien</h4> -->
                </div>
                <div class="modal-body">
                    <!-- Formulaire nouveau chien -->
                    <!-- <p>Some text in the modal.</p> -->
                    <form class="registration" action="insert-dog.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nom du chien</label>
                            <input id="exampleFormControlInput1" class="form-control" name="dogName" type="text"
                                placeholder="Insérez le nom de votre chien">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Surnom</label>
                            <input id="exampleFormControlInput2" class="form-control" name="nickname" type="text"
                                placeholder="Insérez le nom de votre chien">
                        </div>
                        <div class="">
                            <label class="" for="profilPicInput">Inserer photo de profile</label>
                            <input id="profilPicInput" class="" name="dogProfilePic" type="file">
                        </div>
                        <div class="form-group">
                            <label>Date de naissance</label>
                            <input type="date" class="form-control" id="exampleInputDOB1" name="birthDate">
                        </div>
                        <div class="form-group">
                            <label class="radio-inline mr-2">
                                <input type="radio" name="optradio" value="Mâle" checked> Mâle
                            </label>
                            <label class="radio-inline mr-2">
                                <input type="radio" name="optradio" value="Femelle"> Femelle
                            </label>
                            <label class="radio-inline mr-2">
                                <input type="radio" name="optradio" value="Non spécifié"> Non spécifié
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Race du chien</label>
                            <input class="form-control" type="text" placeholder="Race du chien" name="race">
                            <label for="exampleFormControlInput1">Croisé</label>
                            <input class="form-control" type="text" placeholder="Croisement" name="croisement">
                        </div>
                        <a href="profil.php">
                        <input type="submit" id="insert" class="btn btn-success">
                        </a>
                    </form>
                            <div class="modal-footer">
                                <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
   <script>
    <!-- CREDITS -->
    <!-- <div>
            Icons made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div> -->
    <!-- <div>Icons made by <a href="https://www.flaticon.com/authors/those-icons" title="Those Icons">Those Icons</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div> -->
</body>
</html>