<?php
session_start();

require 'erreur.php';

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

$B_nom=$_POST['B_nom'];
$B_ref1=$_POST['B_ref1'];
$B_ref2=$_POST['B_ref2'];
$B_ref3=$_POST['B_ref3'];
$B_ref4=$_POST['B_ref4'];
$B_topologie=$_POST['B_topologie'];
$B_localisation=$_POST['B_localistaion'];
$B_cout=$_POST['B_cout'];
$B_desc=$_POST['B_desc'];
$PROPRIETAIRE_P_num=$_SESSION['P_num'];

$B_num=$B_nom.$B_topologie.$B_localisation;

$req="INSERT INTO `bien` (`B_num`, `B_nom`, `B_ref1`, `B_ref2`, `B_ref3`, `B_ref4`, `B_topologie`, `B_localisation`, `B_cout`, `B_desc`, `PROPRIETAIRE_P_num`)
 VALUES ('$B_num', '$B_nom', '$B_ref1', '$B_ref2', '$B_ref3', '$B_ref4', '$B_topologie', '$B_localisation', '$B_cout', '$B_desc','$PROPRIETAIRE_P_num');";

$pre=$cnx->prepare($req);

$ex=$pre->execute(array());


header("location: ../module_proprietaire/ajouter_bienP.php");
?>