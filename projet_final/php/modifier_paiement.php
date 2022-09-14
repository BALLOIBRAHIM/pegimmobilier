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
    $Pai_num=$_GET['x'];
 
    $req="SELECT * FROM `paiement` WHERE Pai_num=?";
    $pre=$cnx->prepare($req);
    $ex=$pre->execute(array($Pai_num));
    $paiement=$pre->FETCH(PDO:: FETCH_ASSOC);

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
$anne=$_POST['panne'];
$mois=$_POST['pmois'];
$dateregle=$_POST['pdate'];
$montant=$_POST['pmontant'];
$desc=$_POST['pdesc'];
$bien=$_POST['pbien'];
$LOCATAIRE_L_num=$_POST['plocataire'];

$p_num=$C_datesignature.$LOCATAIRE_L_num.$bien;


 $req="UPDATE `paiement` SET  `Pai_annee` = '$anne', `Pai_mois` = '$mois', `Pai_dateregle` = '$dateregle', `Pai_montant` = '$montant', `Pai_desc` = '$desc', `LOCATAIRE_L_num` = '$LOCATAIRE_L_num', `PROPRIETAIRE_P_num` = '$proprietaire', `BEIN_B_num` = '$bien', `Pai_datederniermod` = '$C_datesignature' WHERE `paiement`.`Pai_num` = '$Pai_num';";
// $req="UPDATE `paiement` SET `Pai_annee` = '2021', `Pai_mois` = '7', `Pai_dateregle` = '2021-04-07', `Pai_montant` = '70900', `Pai_desc` = 'le mentant est franc cfa OK ok', `BEIN_B_num` = 'deux pieces200m²abidjan', `Pai_datederniermod` = '17-07-2021 | 10:31:49' WHERE `paiement`.`Pai_num` = '17-07-2021 | 11:31:47GOITOUgoirefemmeparis'";
$pre=$cnx->prepare($req);

$ex=$pre->execute(array());
echo"<script> alert('enregistrement reussi');</script";
header("Location: liste_paiement.php");
}}
// header("location: ../module_proprietaire/");
?>

<!Doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>modification paiement</title>
        <head>
  <link rel="stylesheet" href="../css/css-contrat.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../module_proprietaire/css/font-awesome.min.css">
  
    </head>

 <body>
  <div class="main">
    <p class="sign" align="center">paiement
      <img src="../module_proprietaire/images/PNG/paiement (1).png" width="40%" style="margin-left:30px;margin-top:10px;margin-bottom:-80px">
    </p>
    <form class="form1" method="POST" action="">
    
    <input class="un "  name="panne" type="number" any min="1960" max="2100" placeholder="anneé" value="<?php echo$paiement['Pai_annee'];?>">
    <input class="un "  name="pmois" type="number" any min="1" max="12" placeholder="mois" value="<?php echo$paiement['Pai_mois'];?>">
      <p align="center" ><label for="pdate">date de paiement: <?php echo$paiement['Pai_dateregle'];?></label></p>
      <input class="un " name="pdate" id="pdate" type="date"  >
  
      <input class="un "  name="pmontant" type="number" any min="0" placeholder="montant paié" value="<?php echo$paiement['Pai_montant'];?>">
     
     
      <select class="un " align="center" name="pbien">
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
      
      <select class="un " align="center" name="plocataire">
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
      <textarea row="3" class="un " name="pdesc" placeholder="infomation facultatives" ><?php echo$paiement['Pai_desc'];?></textarea>
     <input type="submit" value="mettre à jour" name="ajouter" class="submit"/>
      <p class="forgot" align="center"></p>
            
      </form>       
    </div>

  </body>

</html>