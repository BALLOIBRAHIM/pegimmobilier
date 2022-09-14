<?php

    require 'erreur.php';
    $va=$_GET['x'];
    
  
   
    $delete=$cnx->prepare("DELETE FROM `depense` WHERE `depense`.`D_num` = '$va'");
    $delete->execute();

  header("Location: liste_depense.php");


?>