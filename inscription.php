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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="Bootstrap/bootstrap-select-master/sass/bootstrap-select.scss">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <title>InstaDogs - Accueil</title>
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
        <li class="nav-item active">
          <a class="nav-link" href="inscription.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="preview.php">Preview</a>
        </li>
        <?php if(isset($_SESSION['id'])){
                echo '<li class="nav-item">
                    <a class="nav-link" href="profil.php">Profil</a>
                    </li>';
        }?>
      </ul>
    </div>
  </nav>

  <!-- INSCRIPTION FORM -->
  <div class="container mt-3">
    <form action="php/registration.php" method="POST" oninput='confirmpassword.setCustomValidity(confirmpassword.value != password.value ? "Passwords do not match.":"")'>
      <div class="form-group">
        <div class="form-group">
          <label for="inputUsername2">Nom d'utilisateur</label>
          <input type="text" class="form-control" id="inputUsername2" name="username" placeholder="Nom d'utilisateur">
        </div>
        <div class="form-group">
          <label for="inputPassword1">Mot de passe</label>
          <input type="password" class="form-control" id="inputPassword1" name="password" placeholder="Mot de passe">
        </div>
      </div>
      <div class="form-group">
        <label for="inputConfirmPassword1">Confirmer le mot de passe</label>
        <input type="password" class="form-control" id="inputConfirmPassword1" name="confirmpassword"
          placeholder="Mot de passe">
      </div>
      <button type="submit" class="btn btn-primary">Créer compte</button>
    </form>
  </div>
  <!-- INSCRIPTION FORM END-->

  <!-- BOOTSTRAP -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>

  <!-- COUNTRY PICKER -->
  <script src="Bootstrap/bootstrap-select-master/js/bootstrap-select.js"></script>
  <script src="Bootstrap/Bootstrap-Country-Picker-jQuery/js/countrypicker.js"></script>



  <!-- CREDITS -->
  <!-- <div>Icons made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div> -->
</body>

</html>