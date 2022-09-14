<?php


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


$req="INSERT INTO `paiement` (`Pai_num`, `Pai_annee`, `Pai_mois`, `Pai_dateregle`, `Pai_montant`, `Pai_desc`, `LOCATAIRE_L_num`, `PROPRIETAIRE_P_num`, `BEIN_B_num`, `Pai_enregistrer`) 
VALUES ('$p_num', '$anne', '$mois', '$dateregle', '$montant', '$desc', '$LOCATAIRE_L_num', '$proprietaire', '$bien', '$C_datesignature');";

$pre=$cnx->prepare($req);

$ex=$pre->execute(array());
echo"<script> alert('enregistrement reussi');</script";
}
// header("location: ../module_proprietaire/");
?>

<!Doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>ajouter paiement</title>
        <head>
  <link rel="stylesheet" href="../css/css-contrat.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../module_proprietaire/css/font-awesome.min.css">
  
    </head>

 <body style="background:black">
  <div class="main">
    <p class="sign" align="center">paiement
      <img src="../module_proprietaire/images/PNG/paiement (1).png" width="40%" style="margin-left:30px;margin-top:10px;margin-bottom:-80px">
    </p>
    <form class="form1" method="POST" action="">
    
    <input class="un "  name="panne" type="number" any min="1960" max="2100" placeholder="anneé">
    <input class="un "  name="pmois" type="number" any min="1" max="12" placeholder="mois">
      <p align="center" ><label for="pdate">date de paiement</label></p>
      <input class="un " name="pdate" id="pdate" type="date"  >
  
      <input class="un "  name="pmontant" type="number" any min="0" placeholder="montant paié">
     
     
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
      <textarea row="3" class="un " name="pdesc" placeholder="infomation facultatives" ></textarea>
     <input type="submit" value="ajouter" name="ajouter" class="submit"/>
      <p class="forgot" align="center"></p>
            
      </form>       
    </div>

  </body>

</html>