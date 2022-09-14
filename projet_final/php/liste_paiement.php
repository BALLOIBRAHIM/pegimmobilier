
<?php

require 'erreur.php';
require 'function.php';
/*
if(isset($_GET['mat_ad'])){

	$person=recherche_unique("administrateur","mat_ad",$_GET['mat_ad']);
  
	$_SESSION['mat_ad']=$person['mat_ad'];
	$_SESSION['nom_ad']=$person['nom_ad'];
	$_SESSION['prenom_ad']=$person['prenom_ad'];
  }
$requete_ad="SELECT*FROM administrateur";
$prepare_ad=$cd->prepare($requete_ad);
$execute_ad=$prepare_ad->execute();
$affiche_ad=$prepare_ad->FETCH(PDO::FETCH_ASSOC);

*/
$proprietaire=$_SESSION['P_num'];

$requete="SELECT*FROM bien WHERE bien.PROPRIETAIRE_P_num=? ";
$prepare=$cnx->prepare($requete);
$execute=$prepare->execute(array($proprietaire));
$affiche=$prepare->FETCH(PDO::FETCH_ASSOC);

$reqc="SELECT*FROM paiement WHERE paiement.PROPRIETAIRE_P_num=?";
$prepare=$cnx->prepare($reqc);
$execute=$prepare->execute(array($proprietaire));
$paiement=$prepare->FETCH(PDO::FETCH_ASSOC);




?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
<title>Liste des paiement</title>

<link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../javascript/jquery.min.js"></script>
  <script src="../javascript/popper.min.js"></script>
  <script src="./javascript/bootstrap.min.js"></script>
  <style>
  
  ul li a:hover{

	text-decoration: none;
}
.menu{
		background-color:rgb(166, 167, 164);
		margin-top:100px;
		width: 700px;
		margin-right: 280px;
	}
</style>
</head>
<body style=" background-color:rgb(166, 167, 164);" >




	<h2 style="margin-left:330px;margin-top :30px;margin-bottom:30px; color:#ffffff;font-size:4rem;">Liste des contrats</h2>
<aside class="gestion_groupe" style="padding-bottom:100px;overflow:scroll;">
		
<div class="container">
  							
		<form method="POST" action="">
				<table border="1" class="table table-dark table-hover" width="500px" height="500px" align="center" cellpadding="2px" cellspacing="0px"  >
				<tr>
					
					<th width="200px" height="10px" align="center" style="font-size: 18p;" >
						lacataire
					</th>
					<th width="300px" height="10px" align=" center" style="font-size: 18p;" >
						bien
					</th>
					<th width="300px" height="10px" align=" center" style="font-size: 18p;" >
						anneé
					</th>
					<th width="300px" height="10px" align=" center" style="font-size: 18p;" >
						mois
					</th>
					<th width="200px" height="10px" align="center" style="font-size: 18px;" >
						actions
					</th>
				</tr>
  				<?php do {?>
				<tr>
					<?php $locataire=recherche_unique("locataire","L_num",$paiement['LOCATAIRE_L_num']);
                    $bien=recherche_unique("bien","B_num",$paiement['BEIN_B_num']);
                    ?>
					<td width="300px" height="90px">
					<?php echo $locataire['L_nom']." ".$locataire['L_nom']."|".$locataire['L_datenais'];?>
					</td>
					<td width="300px" height="90px">
					<?php echo $bien['B_nom']." ".$bien['B_ref1']." | ".$bien['B_localisation'];?>
					</td>
					<td width="300px" height="90px">
					<?php echo $paiement['Pai_annee'];?>
					</td>
					<td width="300px" height="90px">
					<?php echo $paiement['Pai_mois'];?>
					</td>
					
					<td width="200px" height="40px" >
					<table border="1" width="100px" cellspacing="0" cellpadding="0"><tr><td>
						<a href="supprimer_paiement.php?  x=<?php echo $paiement['Pai_num']?>" >
							<input type="button" name="supprimer" value="Supprimer" style="background-color:red ;height:40px" class="btn_suprimmer grpesupp btn_gpr btn btn-primary" />
						 </a>
				  </td><td>
						 <a href="modifier_paiement.php?  x=<?php echo $paiement['Pai_num'];?>" >
						<input type="button"  name="modifier" value="Modifier" style="background-color:green ;height:40px"  class="btn_modifier grpemod btn_gpr btn btn-primary" />
						</a>
					</td>
					</tr>
								</table>
				</tr>
				<?php }while($paiement=$prepare->FETCH(PDO::FETCH_ASSOC));
				?>
			</table>
				</form>
				  </div>	
	</aside>


</body>
</html>