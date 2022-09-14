<?php
session_start();

require 'erreur.php';
require 'classe.php';
require 'function.php';
/*
$valide=0;
$mgrpe="";
$mg="";
$memail="";
$mtel="";
$mpseudo="";
$css_class="";
$requete="SELECT*FROM groupe";
$prepare=$cd->prepare($requete);
$execute=$prepare->execute();
$affiche=$prepare->FETCH(PDO::FETCH_ASSOC);

if(isset($_POST['ajout_pers'])){
	$photo="";
//insertion des element dans base donne
if(isset($_POST['profil'])){
$photo=$_POST['profil'];
}
else{
	$photo="aucune image choisie";
}



$mat=$_POST['mat_pers'];


$nom=$_POST['nom_pers'];
$prenom=$_POST['prenom_pers'];
$tel=$_POST['tel_pers'];
$email=$_POST['email_pers'];
$sexe=$_POST['sexe'];
$groupe_pers=$_POST['groupe_pers'];

$pwd=$_POST['pwd'];

$regexnum='/^([0-9]{10})$/';
$regexmail='/^[a-zA-Z0-9]+@+[a-zA-Z0-9]+\.+[a-zA-Z]{2,3}$/';
if(isset($mat)){
	$pseudo=recherche_unique("personne","mat_pers",$mat);
	if($pseudo){

		$mpseudo="desolé ce pseudo est déjâ utilisé!!";
		$css_class="erreur";


	}
	else{
		$valide+=1;
		
	}

}

if(isset($groupe_pers)){
	
	$valide+=1;
}
else{
	$mgrpe="choisiez un groupe!!";
		$css_class="erreur";

}

if($_POST['pwd']==$_POST['pwdv']){
	$valide+=1;
}
else{
	$mg="les deux mots de passe ne sont pas correcte!!";
		$css_class="erreur";	
}
if(preg_match($regexmail,$email)){
	$valide+=1;
	

}
else{

	$memail="email non valide!!";
		$css_class="erreur";	
}
if(preg_match($regexnum,$tel)){
	$valide+=1;
	

}
else{

	$mtel="le numero doit avoir 10 chiffres !!";
		$css_class="erreur";	
}


if($valide==5){
$req="INSERT INTO `personne` (`mat_pers`, `nom_pers`, `prenom_pers`, `email_pers`, `tel_pers`, `sexe_pers`, `photo_pers`, `GROUPE_code_grp`, `pwd`) VALUES ('$mat', '$nom', '$prenom', '$email', '$tel', '$sexe', '$photo', '$groupe_pers', '$pwd');  ";

$pre=$cd->prepare($req);

$ex=$pre->execute(array());

header("location:liste_personne.php");

}


}*/
$proprietaire=$_SESSION['P_num'];
$reqL="SELECT * FROM locataire WHERE PROPRIETAIRE_P_num=?";
$preL=$cnx->prepare($reqL);
$excL=$preL->execute(array($proprietaire));
$locataire= $preL->FETCH(PDO::FETCH_ASSOC);


if(isset($_POST['ajouter'])){

$C_datesignature=date("d-m-Y | h:i:s");
$M_objet=$_POST['objet'];
$M_contenu=$_POST['M_contenu'];
$LOCATAIRE_L_num=$_POST['M_L_num'];


$msg2= new message("aucun",$proprietaire,$LOCATAIRE_L_num,$M_objet,$M_contenu,$C_datesignature,"envoi");
$msg1= new message("aucun",$proprietaire,$LOCATAIRE_L_num,$M_objet,$M_contenu,$C_datesignature,"non lu");

$msg2->insert_message();
$msg1->envoi_message();


}
// header("location: ../module_proprietaire/");
?>

<!Doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>envoyer un message</title>
        <head>
  <link rel="stylesheet" href="../css/css-contrat.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../module_proprietaire/css/font-awesome.min.css">

    </head>

 <body>
  <div class="main">
    <p class="sign" align="center">message 
    </p>
    <form class="form1" method="POST" action="">
      
      
      <select class="un " align="center" name="M_L_num">
      <option value="">choix un locataire</option>
      <option value="tous le monde">tous les  locataires</option>
      <?php do{?>

       <option  value="<?php echo$locataire['L_num']?>">
       <p> <?php echo $locataire['L_nom'];?></P>
       <p> <?php echo $locataire['L_prenom'];?></P>
       <p> <?php echo $locataire['L_datenais'];?></P>
       <p> <?php echo $locataire['L_lieunais'];?></P>
    </option> 
        <?php }while($locataire=$preL->FETCH(PDO::FETCH_ASSOC));?>
      </select>
      <input name="objet" type="text" class="un" placeholder="objet " >
      <textarea style="height:150px"  class="un" name="M_contenu" placeholder="ecrire le message ici" ></textarea>
     <input type="submit" value="envoyer" name="ajouter" class="submit"/>
      <p class="forgot" align="center"></p>
            
      </form>       
    </div>

  </body>

</html>