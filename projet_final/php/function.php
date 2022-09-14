<?php
require 'erreur.php';

if(!function_exists('pseudo_crypt')){
      function mot_de_passe($str){

        for($i=1;$i<strlen($str);$i++){
            
            $md5pwd=md5($str.$i)."<br>";
            $md5pwdcryp=crypt($md5pwd,"MD5")."<br>";
            $despwdcryp=crypt($md5pwdcryp,"DES")."<br>";
            $md5pwdcryp1=md5($despwdcryp)."<br>";
            $md5pwdcrypH1=sha1($md5pwdcryp1)."<br>";
        }
        return $md5pwdcrypH1;
        } 
}
  
  if(!function_exists('pseudo_crypt')){
  
            function pseudo_crypt($str){
            
                for($i=1;$i<strlen($str);$i++){
                
                    $md5pwd=md5($i.$str.$i)."<br>";
                    $md5pwdcryp=crypt($md5pwd,"MD5")."<br>";
                    $despwdcryp=crypt($md5pwdcryp,"DES")."<br>";
                    $md5pwdcryp1=md5($despwdcryp)."<br>";
                    $md5pwdcrypH1=sha1($md5pwdcryp1)."<br>";
                }
                return $md5pwdcrypH1;
                }
              }
      if(!function_exists('recherche_unique')){
                  function recherche_unique($db,$col,$val){
                    require 'erreur.php';

                  $requete="SELECT*FROM $db WHERE $col=?";
                  $prepare=$cnx->prepare($requete);
                  $execute=$prepare->execute(array($val));
                  $affiche=$prepare->FETCH(PDO::FETCH_ASSOC);
                  return $affiche;
                  }
}
               
if(!function_exists('recherche_multi')){
                function recherche_multi($db,$col1,$col2,$val1,$val2){
        
                try {
                  $cnx=new PDO('mysql:host=localhost;dbname=pegimmobiliere','root','');
                  }
                  catch (Exception $e) 
                  {        die('Erreur : ' . $e->getMessage()); } 
                  
              $requete="SELECT*FROM $db WHERE $col1=? and $col2=? ";
              $prepare=$cnx->prepare($requete);
              $execute=$prepare->execute(array($val1,$val2));
              $affiche=$prepare->FETCH(PDO::FETCH_ASSOC);
              return $affiche;
                      }
            }
if(!function_exists('delete')){
function delete($db,$col,$val){
     
    $delete=$cd->prepare("DELETE FROM $db WHERE $col = '$val' ");
    $delete->execute();

  header("Location: $db.php");


}
}
if(!function_exists('deconnexion')){
        function deconnexion(){
        session_start();
        $_SESSION=array();
        session_destroy();
        header('Location:index.php');
        }
}


?>