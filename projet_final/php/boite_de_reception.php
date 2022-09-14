
<?php
session_start();

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

$requete="SELECT*FROM  `m_envoi` WHERE  `m_envoi`.id_receveur=? ";
$prepare=$cnx->prepare($requete);
$execute=$prepare->execute(array($proprietaire));
$affiche=$prepare->FETCH(PDO::FETCH_ASSOC);



?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
<title>boite de reception</title>

<link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../javascript/jquery.min.js"></script>
  <script src="../javascript/popper.min.js"></script>
  <script src="./javascript/bootstrap.min.js"></script>
  
</head>
<body style=" background-color:black;" >




	
<aside class="gestion_groupe" style="padding-bottom:100px;height:500px;overflow:auto;border-bottom:0px;">
		
<div class="container">
  							
		<form method="POST" action="">
				<table border="1" class="table table-dark table-hover" width="500px"  align="center" cellpadding="2px" cellspacing="0px"  >
				
  				<?php do {?>
				<tr>
					<?php $envoyeurl=recherche_unique("locataire","L_num",$affiche['id_envoyeur']);
                    if($envoyeurl==true){
                        $envoyeur=$envoyeurl;
                        var_dump($envoyeurl);
                        echo"<td> <h2>". $envoyeur['L_nom']." ".$envoyeur['L_prenom']."</h2> <br> <h3>".$affiche['contenu']."</h3> </td>";

                    }
                    else{
                        $envoyeurp=recherche_unique("proprietaire","P_num",$affiche['id_envoyeur']) ;
                        if($envoyeurp==true){
                            $envoyeur=$envoyeurp;
                            var_dump($envoyeurp);
                            echo"<td> <h2>". $envoyeur['P_nom']." ".$envoyeur['P_prenom']."</h2> <br> <h3>".$affiche['contenu']."</h3> </td>";

                        }
                         else{
                             
                         }
                    }
                          
                    ?>
					
					
					
					
				</tr>
				<?php }while($affiche=$prepare->FETCH(PDO::FETCH_ASSOC));
				?>
			</table>
				</form>
				  </div>	
	</aside>


</body>
</html>