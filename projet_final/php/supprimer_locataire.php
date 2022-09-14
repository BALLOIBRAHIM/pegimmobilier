<?php

    require 'erreur.php';
    $va=$_GET['x'];
    
  
   
    $delete=$cnx->prepare("DELETE FROM `locataire` WHERE `locataire`.`L_num` = '$va'");
    $delete->execute();

  header("Location: liste_locataire.php");


?>