<?php

session_start();
include('bd/connexionDB.php');

if(!isset($_SESSION['id'])){
header('Location: index.php');
exit;
}

$afficher_profil = $DB->query("SELECT * FROM utilisateur WHERE id = ?", array ($_SESSION['id']));
$afficher_profil = $afficher_profil->fetch();

 ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Mon profil"</title>
  </head>
  <body>
    <div class="p-3 mb-2 bg-secondary text-dark">
    <h1 class="text-light text-center"><a href="index.php" class="text-reset">SIFORUM</a></h1>
    </div>
    <?php require_once('menu.php') ?>
    <h2 class="text-center mt-5" >Voici le profil de <?php echo $afficher_profil['prenom'] . " " . $afficher_profil['nom']; ?></h2>
    <div style="margin: 20px 0">
      <?php
      if(file_exists("public/avatar/". $_SESSION['id'] . "/" . $_SESSION['avatar']) && isset($_SESSION['avatar'])){
        ?>
        <img src="<?php "public/avatar/". $_SESSION['id'] . "/" . $_SESSION['avatar']; ?>" width="120" class="sz-image"/>
        <?php
      }else{
         ?>
         <img src="public\avatar\default\kisspng-avatar-silhouette-computer-icons-female-id-5ac460f18e5e81.1273438915228193135832.png" alt="" width="120" class="sz-image">
         <?php
          }
          ?>
    </div>
    <h4 class="ml-5">Quelques informations sur vous : </h4>
    <ul class="ml-5">
      <li>Votre identifiant : <?php echo $afficher_profil['id'] ?></li>
      <li>Votre adresse mail de connexion : <?php echo $afficher_profil['mail'] ?></li>
      <li>Votre compte a été crée le : <?php echo $afficher_profil['date_creation_compte'] ?></li>
        <br>
      <a href="index.php" class="btn btn-primary" >Accueil</a>
      <a href="modifier-profil.php"  class="btn btn-danger d-inline">Modifier votre profil</a>
      <a href="avatar.php">Ajouter un avatar</a>

    </ul>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
  </body>
</html>
