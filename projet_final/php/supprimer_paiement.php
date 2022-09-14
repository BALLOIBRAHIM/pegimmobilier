<?php

    require 'erreur.php';
    $va=$_GET['x'];
    
  
   
    $delete=$cnx->prepare("DELETE FROM `paiement` WHERE `paiement`.`Pai_num` = '$va'");
    $delete->execute();
echo"<script>
    alert('suppression reussie');
    windows.location:href=liste_paiement.php;
</script>";

  header("Location: liste_contrat.php");


?>