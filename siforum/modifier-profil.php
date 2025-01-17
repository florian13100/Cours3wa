<?php
session_start();
include('bd/connexionDB.php');

if (!isset($_SESSION['id'])){
header('Location: index.php');
exit;
}


$afficher_profil = $DB->query("SELECT * FROM utilisateur WHERE id = ?", array($_SESSION['id']));
$afficher_profil = $afficher_profil->fetch();

if(!empty($_POST)){
  extract($_POST);
  $valid = true;

  if(isset($_POST['modification'])){
    $nom = htmlentities(trim($nom));
    $prenom = htmlentities(trim($prenom));
    $mail = htmlentities(strtolower(trim($mail)));

    if(empty($nom)){
      $valid = false;
      $er_nom = "Il faut mettre un nom";
    }

    if(empty($prenom)){
      $valid = false;
      $er_prenom = "Il faut mettre un prenom";
    }

    if(empty($mail)){
      $valid = false;
      $er_mail = "Il faut mettre un mail";

    }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)){
      $valid = false;
      $er_mail = "le mail n'est pas valide";

    }else{
      $req_mail = $DB->query("SELECT mail FROM utilisateur WHERE mail = ?", array($mail));
      $req_mail = $req_mail->fetch();

      if($req_mail['mail'] <> "" && $_SESSION['mail'] != $req_mail['mail']){
        $valid = false;
        $er_mail = "ce mail existe déja";
      }
    }

    if ($valid){
      $DB->insert("UPDATE utilisateur SET PRENOM = ?, nom = ?, mail = ? WHERE id = ?", array($prenom, $nom, $mail, $_SESSION['id']));

      $_SESSION['nom'] = $nom;
      $_SESSION['prenom'] = $prenom;
      $_SESSION['mail'] = $mail;

      header('Location: profil.php');
      exit;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier votre profil</title>
  </head>

<body>
<div class="">Modification</div>
<form method="post">

  <?php
  if(isset($er_nom)){
    ?>
<div class=""> <?php $er_nom ?></div>
  <?php
    }
    ?>

    <input type="text" placeholder="Votre nom" name="nom" value="<?php if(isset($nom)){ echo $nom; }else{ echo $afficher_profil['nom'];}?>" required>
    <?php
    if(isset($er_prenom)){
      ?>
  <div class=""> <?php $er_prenom ?></div>
    <?php
      }
      ?>
      <input type="text" placeholder="Votre prénom" name="prenom" value="<?php if(isset($prenom)){ echo $prenom; }else{ echo $afficher_profil['prenom'];}?>" required>

      <?php
      if(isset($er_mail)){
        ?>
    <div class=""> <?php $er_mail ?></div>
      <?php
        }
        ?>
        <input type="email" placeholder="Votre adresse mail" name="mail" value="<?php if(isset($mail)){ echo $mail; }else{ echo $afficher_profil['mail'];}?>" required>
        <button type="submit" name="modification">Modifier</button>
      </form>
</body>
</html>
