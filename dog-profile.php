<?php 
include("php/connexion.php");

session_start();
$app=new Connexion();
$dog=$app->getDogById($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <link rel="stylesheet" href="Bootstrap/bootstrap-select-master/sass/bootstrap-select.scss">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css">
    
    <style>
    .parallax {
    background: url(<?php echo $dog->getPhotoURL();?>);
    background-attachment: fixed;
    background-position: center;
    min-height: 500px;
    background-repeat: no-repeat;
    background-size: cover;
    }
    
    </style>
    <title>InstaDogs - Dog's Profile</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inscription.php">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="preview.php">Preview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil.php">Profil</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </nav>

    <div class="parallax">
    </div>

    <div class="container mt-3">

        <h1><?php echo $dog->getDogName() ?></h1>

        <h2 style="font-size: 1.3rem; font-weight: 800;">Âge - Mâle/Femelle - Race du chien - Croisement</h2>

        <h3 style="font-size: 1rem; font-weight: 800;">Description du chien</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc semper ante eu erat dictum tincidunt. Donec id
            felis at justo accumsan mollis. Ut mattis nisl felis, ut iaculis augue dictum a. Maecenas quis luctus
            ligula. Nunc accumsan arcu turpis, ac faucibus odio hendrerit eu. In ornare justo lectus, semper vulputate
            risus mollis vitae. Aenean in pellentesque mi. Curabitur vestibulum feugiat ligula, eu lacinia purus tempus
            in. Cras bibendum a mauris id pretium.</p>

        <!-- Trigger the modal with a button -->
        <div class="mt-3">
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal"><i class="fas fa-edit"></i></button>

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
                            <form>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nom du chien</label>
                                    <input id="exampleFormControlInput1" class="form-control" type="text" placeholder="Insérez le nom de votre chien">
                                </div>
                                <div class="form-group">
                                    <label>Date de naissance</label>
                                    <input type="date" class="form-control" id="exampleInputDOB1">
                                </div>
                                <div class="form-group">
                                    <label class="radio-inline mr-2">
                                        <input type="radio" name="optradio" checked> Mâle
                                    </label>
                                    <label class="radio-inline mr-2">
                                        <input type="radio" name="optradio"> Femelle
                                    </label>
                                    <label class="radio-inline mr-2">
                                        <input type="radio" name="optradio"> Non spécifié
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Race du chien</label>
                                    <input class="form-control" type="text" placeholder="Race du chien">
                                    <label for="exampleFormControlInput1">Croisement</label>
                                    <input class="form-control" type="text" placeholder="Croisement">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" data-dismiss="modal">Ajouter</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="arrow-down">
            <a href="#dog-article">
                <img src="img/thin-arrowheads-pointing-down.png" alt="down arrow" />
            </a>
        </div>

        <div id="dog-article">
            <h2>Articles sur mon toutou</h2>

            <div class="new-dog-article">
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal1">Ajouter
                    un article</button>

                <!-- Modal -->
                <div id="myModal1" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <!-- <h4 class="modal-title">Modal Header</h4> -->
                            </div>
                            <div class="modal-body">
                                <!-- <p>Some text in the modal.</p> -->

                                <!-- Formulaire nouvel article -->
                                <form>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Insérer une image</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea2">Contenu de l'article</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea2" rows="3"></textarea>
                                    </div>

                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Envoyer</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="mt-3 mb-3">
                <img class="img-fluid mx-auto d-block" src="img/8.jpg" alt="corgi trop chou avec des fleurs" />
            </div>


            <div class="mt-3 mb-3">
                <img class="img-fluid mx-auto d-block" src="img/8.jpg" alt="corgi trop chou avec des fleurs" />
            </div>
            <p>
                AAA Donec id felis at justo accumsan mollis. Ut mattis nisl felis, ut iaculis augue dictum a. Maecenas
                quis
                luctus ligula. Nunc accumsan arcu turpis, ac faucibus odio hendrerit eu. In ornare justo lectus, semper
                vulputate risus mollis vitae. Aenean in pellentesque mi. Curabitur vestibulum feugiat ligula, eu
                lacinia purus tempus in. Cras bibendum a mauris id pretium.
            </p>
        </div>

        <h2 class="comment-title"><span class="comment-number ml-1">102</span> Commentaires</h2>
        <a class="btn btn-primary mb-3" data-toggle="collapse" href="#comments" role="button" aria-expanded="false"
            aria-controls="comments">
            Voir les commentaires
        </a>
        <div class="collapse comments-container mt-3" id="comments">
            <?php if(isset($_SESSION["id"])) { ?>
                <div class="input-group mb-3">
                   <span class="loged-person"><img class="comment-img mr-2" src="img/8.jpg" alt=""></span>
                   <input type="text" class="form-control" placeholder="Ajouter un commentiare" aria-label="Recipient's username"
                       aria-describedby="button-addon2">
                   <div class="input-group-append">
                       <button class="btn btn-outline-secondary" type="button" id="button-addon2">Ajouter un commentaire</button>
                   </div>
               </div>
            <?php } ?>

         
            
            <div><img class="comment-img mr-2" src="img/8.jpg" alt=""><span class="comment-autor mr-3">Fluffy</span><span
                    class="comment-date">18.06.2019</span></div>
            <p>
                AAA Donec id felis at justo accumsan mollis. Ut mattis nisl felis, ut iaculis augue dictum a. Maecenas
                quis
                luctus ligula. Nunc accumsan arcu turpis, ac faucibus odio hendrerit eu. In ornare justo lectus, semper
                vulputate risus mollis vitae. Aenean in pellentesque mi. Curabitur vestibulum feugiat ligula, eu
                lacinia purus tempus in. Cras bibendum a mauris id pretium.
            </p>
            <div><img class="comment-img mr-2" src="img/8.jpg" alt=""><span class="comment-autor mr-3">Fluffy</span><span
                    class="comment-date">18.06.2019</span></div>
            <p>
                AAA Donec id felis at justo accumsan mollis. Ut mattis nisl felis, ut iaculis augue dictum a. Maecenas
                quis
                luctus ligula. Nunc accumsan arcu turpis, ac faucibus odio hendrerit eu. In ornare justo lectus, semper
                vulputate risus mollis vitae. Aenean in pellentesque mi. Curabitur vestibulum feugiat ligula, eu
                lacinia purus tempus in. Cras bibendum a mauris id pretium.
            </p>

            <div><img class="comment-img mr-2" src="img/8.jpg" alt=""><span class="comment-autor mr-3">Fluffy</span><span
                    class="comment-date">18.06.2019</span></div>
            <p>
                AAA Donec id felis at justo accumsan mollis. Ut mattis nisl felis, ut iaculis augue dictum a. Maecenas
                quis
                luctus ligula. Nunc accumsan arcu turpis, ac faucibus odio hendrerit eu. In ornare justo lectus, semper
                vulputate risus mollis vitae. Aenean in pellentesque mi. Curabitur vestibulum feugiat ligula, eu
                lacinia purus tempus in. Cras bibendum a mauris id pretium.
            </p>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.min.js"></script>

</body>

</html>