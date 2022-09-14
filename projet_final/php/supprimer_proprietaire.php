<?php

    require 'erreur.php';
    $va=$_GET['x'];
    
  
   
    $delete=$cnx->prepare("DELETE FROM `proprietaire` WHERE `proprietaire`.`P_num` = '$va'");
    $delete->execute();

  header("Location: liste_proprietaire.php");


?>