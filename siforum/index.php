<?php
session_start();
include('bd/connexionDB.php');
?>
<!DOCTYPE html>
<html>
  ﻿<head>
    ﻿<meta charset="utf-8"/>
    ﻿<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  ﻿  <title>Accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
    ﻿<body>
      <div class="p-3 mb-2 bg-secondary text-dark">
      <h1 class="text-light text-center"><a href="index.php" class="text-reset">SIFORUM</a></h1>
      </div>
  <?php require_once('menu.php') ?>
</h1>
   </div>
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
  </body>
</html>
