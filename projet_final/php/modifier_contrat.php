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
if(isset($_SESSION) and isset($_GET['x']))
{
    $C_num=$_GET['x'];
 
    $req="SELECT * FROM `contrat` WHERE C_num=?";
    $pre=$cnx->prepare($req);
    $ex=$pre->execute(array($C_num));
    $contrat=$pre->FETCH(PDO:: FETCH_ASSOC);
  


$proprietaire=$_SESSION['P_num'];
$reqL="SELECT * FROM locataire WHERE PROPRIETAIRE_P_num=?";
$preL=$cnx->prepare($reqL);
$excL=$preL->execute(array($proprietaire));
$locataire= $preL->FETCH(PDO::FETCH_ASSOC);


$reqB="SELECT * FROM bien WHERE PROPRIETAIRE_P_num=?";
$preB=$cnx->prepare($reqB);
$excB=$preB->execute(array($proprietaire));
$bien= $preB->FETCH(PDO::FETCH_ASSOC);



if(isset($_POST['ajouter'])){
$C_datesignature=date("d-m-Y | h:i:s");
$C_datedebut=$_POST['C_datedebut'];
$C_datefin=$_POST['C_datefin'];
$C_montantloyer=$_POST['C_montantloyer'];
$C_caution=$_POST['C_montantcaution'];

 $C_desc=$_POST['C_desc'];
$C_bien=$_POST['C_bien'];
$LOCATAIRE_L_num=$_POST['C_L_num'];



$req="UPDATE `contrat` SET `C_datedebut` = '$C_datedebut', `C_datefin` = '$C_datefin', `C_montantloyer` = '$C_montantloyer', `C_caution` = '$C_caution', `C_desc` = '$C_desc', `BIEN_B_num` = '$C_bien', `LOCATAIRE_L_num` = '$LOCATAIRE_L_num', `PROPRIETAIRE_P_num` = '$proprietaire', `C_datedenieremodification` = '$C_datesignature' WHERE `contrat`.`C_num` = '$C_num';";
var_dump($req);
$pre=$cnx->prepare($req);

$ex=$pre->execute(array());

// header("location: ../php/liste_contrat.php");

}

}

?>

<!Doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>modifier contrat</title>
        <head>
  <link rel="stylesheet" href="../css/css-contrat.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../module_proprietaire/css/font-awesome.min.css">
  
    </head>

 <body>
  <div class="main">
    <p class="sign" align="center">contrat
      <img src="../module_proprietaire/images/PNG/contracter (3).png" width="25%" style="margin-left:50px;">
    </p>
    <form class="form1" method="POST" action="">
        <p align="center">commence: <?php echo $contrat['C_datedebut'];?></p>
      <input class="un "  name="C_datedebut" type="date">
      <p align="center"> termine: <?php echo $contrat['C_datefin'];?></p>
      <input class="un " name="C_datefin" type="date" >
  
      <input class="un "  name="C_montantloyer" type="number" any min="0" value="<?php echo $contrat['C_montantloyer'];?>" placeholder="montant loyer">
      <input class="un " name="C_montantcaution" type="number" any min="0" value="<?php echo $contrat['C_caution'];?>" placeholder="caution">
     
      <select class="un " align="center" name="C_bien">
          <option value="">choix un bien</option>
      <?php do{?>
        <option  value="<?php echo$bien['B_num']?>">
       <p> <?php echo $bien['B_nom'];?></P>
       <p> <?php echo $bien['B_ref1'];?></P>
       <p> <?php echo $bien['B_ref2'];?></P>
       <p> <?php echo $bien['B_ref3'];?></P>
     </option> 
        <?php }while($bien=$preB->FETCH(PDO::FETCH_ASSOC));?>
      </select> 
      
      <select class="un " align="center" name="C_L_num">
      <option value="">choix un locataire</option>
      <?php do{?>
        <option  value="<?php echo$locataire['L_num']?>">
       <p> <?php echo $locataire['L_nom'];?></P>
       <p> <?php echo $locataire['L_prenom'];?></P>
       <p> <?php echo $locataire['L_datenais'];?></P>
       <p> <?php echo $locataire['L_lieunais'];?></P>
    </option> 
        <?php }while($locataire=$preL->FETCH(PDO::FETCH_ASSOC));?>
      </select>
      <textarea row="3" class="un " name="C_desc" placeholder="infomation facultatives" ><?php echo $contrat['C_desc'];?></textarea>
     <input type="submit" value="mettre à jour" name="ajouter" class="submit"/>
      <p class="forgot" align="center"></p>
            
      </form>       
    </div>

  </body>

</html>