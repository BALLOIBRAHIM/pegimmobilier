<?php

    require 'erreur.php';
    $va=$_GET['x'];
    
  
   
    $delete=$cnx->prepare("DELETE FROM `contrat` WHERE `contrat`.`C_num` = '$va'");
    $delete->execute();

  header("Location: liste_contrat.php");


?>