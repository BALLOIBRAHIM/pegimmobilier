<?php 

try {
     $cnx=new PDO('mysql:host=localhost;dbname=pegimmobiliere','root','');
      }
      catch (Exception $e) 
      {        die('Erreur : ' . $e->getMessage()); } 
      ?>
