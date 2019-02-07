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
    <title>InstaDog - Login</title>
</head>

<body>

    <!-- Barre de Navigation Bootstrap -->
    <nav class="navbar navbar-expand-md navbar-light shadow-sm p-3 bg-white">
            <a class="navbar-brand" href="preview.html">InstaDog<img class="logo" src="img/paw.png" alt="Logo InstaDog"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.html">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inscription.html">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="preview.html">Preview</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="profil.html">Profil</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </nav>

    <?php

    require ('php/connexion.php');

    $app = new Connexion();
    $user = $app->getUserById($_GET["id"]);
    $userName = $user->getUserName();
    echo '<h1 class="user-name mt-3 text-center">'.$userName.'</h1>'

    ?>
        <div class="d-flex flex-wrap justify-content-center">
            <div class="dogs">
                <a href="dog-profile.html">
                    <img class="img-thumbnail" src="img/hd-cute-puppy-backgrounds-fraiche-dog-wallpapers-amp-backgrounds-hd-home-screen-maker-with-of-hd-cute-puppy-backgrounds.jpg"
                        alt="...">
                    <h3>Bobby</h3>
                </a>
                <button type="button" class="btn btn-light delete_dog"><i class="fas fa-trash-alt"></i></button>
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal"><i class="fas fa-edit"></i></button>
            </div>
            <div class="dogs">
                <a href="dog-profile.html">
                    <img class="img-thumbnail" src="img/8CrIyqya.jpeg" alt="...">
                    <h3>Colonel le Corgi</h3>
                </a>
                <button type="button" class="btn btn-light delete_dog"><i class="fas fa-trash-alt"></i></button>
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal"><i class="fas fa-edit"></i></button>
            </div>
            <div class="dogs">
                    <a href="dog-profile.html">
                        <img class="img-thumbnail" src="img/8CrIyqya.jpeg" alt="...">
                        <h3>Colonel le Corgi</h3>
                    </a>
                    <button type="button" class="btn btn-light delete_dog"><i class="fas fa-trash-alt"></i></button>
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal"><i class="fas fa-edit"></i></button>
                </div>
                <div class="dogs">
                        <a href="dog-profile.html">
                            <img class="img-thumbnail" src="img/8CrIyqya.jpeg" alt="...">
                            <h3>Colonel le Corgi</h3>
                        </a>
                        <button type="button" class="btn btn-light delete_dog"><i class="fas fa-trash-alt"></i></button>
                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal"><i class="fas fa-edit"></i></button>
                </div>
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
        <div class="modal-body"> <!-- Formulaire nouveau chien -->
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
    <!-- CREDITS -->
    <!-- <div>
            Icons made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div> -->
    <!-- <div>Icons made by <a href="https://www.flaticon.com/authors/those-icons" title="Those Icons">Those Icons</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div> -->
</body>

</html>