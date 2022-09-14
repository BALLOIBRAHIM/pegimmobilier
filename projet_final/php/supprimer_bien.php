<?php

    require 'erreur.php';
    $va=$_GET['x'];
    
  
   
    $delete=$cnx->prepare("DELETE FROM `bien` WHERE `bien`.`B_num` = '$va'");
    $delete->execute();

  header("Location: liste_bien.php");


?>