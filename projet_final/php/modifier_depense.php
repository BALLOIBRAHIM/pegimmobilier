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
    $D_num=$_GET['x'];
 
    $req="SELECT * FROM `depense` WHERE D_num=?";
    $pre=$cnx->prepare($req);
    $ex=$pre->execute(array($D_num));
    $depense=$pre->FETCH(PDO:: FETCH_ASSOC);
  


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
$D_datesignature=date("d-m-Y | h:i:s");
$D_date=$_POST['ddate'];
$D_desc=$_POST['d_desc'];
$D_devise=$_POST['ddevise'];
$D_montant=$_POST['dmontant'];
$D_bien=$_POST['d_bien'];



$req="UPDATE `depense` SET  `D_montant`= '$D_montant $D_devise', `D_date` = '$D_date', `D_desc` = '$D_desc', `PROPRIETAIRE_P_num` = '$proprietaire', `BEIN_B_num` = '$D_bien', `D_datedeniermod` =  '$D_datesignature' WHERE `depense`.`D_num` = '$D_num' ;";
var_dump($D_num);

$pre=$cnx->prepare($req);

$ex=$pre->execute(array());
echo"<script> 
alert(modification reussie);

/script>";
header("location: liste_depense.php");
}
// windows.location.href= liste_depense.php;
}

?>

<!Doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>modifier depense</title>
        <head>
  <link rel="stylesheet" href="../css/css-contrat.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../module_proprietaire/css/font-awesome.min.css">
  
    </head>

 <body>
  <div class="main">
    <p class="sign" align="center">depense
      <img src="../module_proprietaire/images/PNG/contracter (3).png" width="25%" style="margin-left:50px;">
    </p>
    <form class="form1" method="POST" action="">
    <p align="center"><label for="ddate">date depense : <?php echo $depense['D_date'];?></p>
      <input class="un "  name="ddate" id="ddate" type="date"  >
      <input class="un "  name="dmontant" type="number" any min="0" placeholder="montant de la dépense" value="<?php echo floatval($depense['D_montant']);?>">

      <input class="un " name="ddevise" type="text" placeholder="devise(mantant en)" value="<?php echo $depense['D_montant'];?>" >
      
      <select class="un " align="center" name="d_bien">
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
      
      <textarea row="3" class="un " name="d_desc" placeholder="infomation facultatives" > <?php echo $depense['D_desc'];?></textarea>
     <input type="submit" value="ajouter" name="ajouter" class="submit"/>
      <p class="forgot" align="center"></p>
            
      </form>       
    </div>

  </body>

</html>