
<?php
session_start();
require 'erreur.php';
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
$requete="SELECT*FROM proprietaire";
$prepare=$cnx->prepare($requete);
$execute=$prepare->execute();
$affiche=$prepare->FETCH(PDO::FETCH_ASSOC);



?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
<title>Liste des propriètaires</title>
<
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




	<h2 style="margin-left:490px">Liste des propriètaires</h2>
<aside class="gestion_groupe" style="padding-bottom:100px;width:1100px;background-color:rgb(166, 167, 164);margin-left:70px;overflow:scroll;">
		
<div class="container">
  							
		<form method="POST" action="">
				<table border="1" class="table table-dark table-hover" width="700px" height="500px" align="center" cellpadding="2px" cellspacing="0px"  >
				<tr>
					<th width="300px" height="10px" align=" center" style="font-size: 18p;" >
						P_num
					</th>
					<th width="200px" height="10px" align="center" style="font-size: 18p;" >
						nom
					</th>
					<th width="300px" height="10px" align=" center" style="font-size: 18p;" >
						prenom
					</th>
					<th width="300px" height="10px" align=" center" style="font-size: 18p;" >
						email
					</th>
					<th width="300px" height="10px" align=" center" style="font-size: 18p;" >
						telephone
					</th>
					<th width="200px" height="10px" align="center" style="font-size: 18px;" >
						actions
					</th>
				</tr>
  				<?php do {?>
				<tr>
					<td width="200px" height="40px">
					<?php echo $affiche['P_num'];?>
					</td>
					<td width="300px" height="90px">
					<?php echo $affiche['P_nom'];?>
					</td>
					<td width="300px" height="90px">
					<?php echo $affiche['P_prenom'];?>
					</td>
					<td width="300px" height="90px">
					<?php echo $affiche['P_email'];?>
					</td>
					<td width="300px" height="90px">
					<?php echo $affiche['P_contact'];?>
					</td>
					
					<td width="200px" height="40px" >
					<table border="1" width="100px" cellspacing="0" cellpadding="0"><tr><td>
						<a href="supprimer_proprietaire.php?  x=<?php echo $affiche['P_num']?>" >
							<input type="button" name="supprimer" value="Supprimer" style="background-color:red ;height:40px" class="btn_suprimmer grpesupp btn_gpr btn btn-primary" />
						 </a>
				  </td><td>
						 <a href="../html/modifier_proprietaire.php?  x=<?php echo $affiche['P_num'];?>" >
						<input type="button"  name="modifier" value="Modifier" style="background-color:green ;height:40px"  class="btn_modifier grpemod btn_gpr btn btn-primary" />
						</a>
					</td>
					</tr>
								</table>
				</tr>
				<?php }while($affiche=$prepare->FETCH(PDO::FETCH_ASSOC));
				?>
			</table>
				</form>
				  </div>	
	</aside>


</body>
</html>