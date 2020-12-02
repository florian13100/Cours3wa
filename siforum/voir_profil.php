<?php

session_start();
include('bd/connexionDB.php');

if(!isset($_SESSION['id'])){
header('Location: index.php');
exit;
}

$id = (int) $_GET['id'];

$afficher_profil = $DB->query("SELECT * FROM utilisateur WHERE id = ?",
array($id));
$afficher_profil = $afficher_profil->fetch();

if(!isset($afficher_profil['id'])){
header('Location: index.php');
exit;
}
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

    <h2>Voici le profil de <?php echo $afficher_profil['nom'] . " " . $afficher_profil['prenom']; ?></h2>
    <div class="">Quelques informations sur lui : </div>
    <ul>
      <li>ID :  <?php echo $afficher_profil['id'] ?></li>
      <li>Adresse mail :  <?php echo $afficher_profil['mail'] ?></li>
      <li>Membre du SIFORUM depuis le :  <?php echo $afficher_profil['date_creation_compte'] ?></li>
    </ul>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
  </body>
</html>
