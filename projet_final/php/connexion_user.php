<?php

session_start();
require 'erreur.php';

require 'function.php';
 
echo" je suis la";




    $pseudo=$_POST['pseudo'];
    $pwd=$_POST['pwd'];

    
    $user=recherche_multi("proprietaire","P_num","P_pwd",$pseudo,$pwd);
    

        if($user){
            $_SESSION['P_num']=$user['P_num'];
            $_SESSION['P_nom_complet']=$user['P_nom_complet'];
           
            header("location: ../module_proprietaire/");
        }
        else{
            echo"echec";
            $mg="pseudo ou mot de passe incorrect";
            
        }
  

?>