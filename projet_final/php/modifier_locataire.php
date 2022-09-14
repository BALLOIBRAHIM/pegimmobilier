
<?php
   session_start();
   require 'erreur.php';
    if(isset($_SESSION) and isset($_GET['x']))
    {
        $L_num=$_GET['x'];
      
        $req="SELECT * FROM `locataire` WHERE L_num=?";
        $pre=$cnx->prepare($req);
        $ex=$pre->execute(array($L_num));
        $locataire=$pre->FETCH(PDO:: FETCH_ASSOC);
      

        
if(isset($_POST['valider']))
        {



$L_nom=$_POST['L_nom'];
$L_prenom=$_POST['L_premon'];
$L_datenais=$_POST['L_datenais'];
$L_lieunais=$_POST['L_lieunais'];
$L_perenomcomplet=$_POST['L_Pnomcomplet'];
$L_merenomcomplet=$_POST['L_Mmomcomplet'];
$L_situationmatri=$_POST['L_sm'];
$L_nbenfant=0;
$L_email=$_POST['L_email'];
$L_tel=$_POST['L_tel'];
$L_desc=$_POST['L_desc'];
$PROPRIETAIRE_P_num=$_SESSION['P_num'];
$L_sexe=$_POST['L_sexe'];




            $requp="UPDATE `locataire` SET `L_nom`='$L_nom', `L_prenom`='$L_prenom', `L_datenais`='$L_datenais', `L_lieunais`='$L_lieunais', `L_pèrenomcomplet`='$L_perenomcomplet', `L_mèrenomcomplet`='$L_merenomcomplet', `L_situationMatri`='$L_situationmatri', `L_NbEnfant`='$L_nbenfant', `L_email`='$L_email', `L_telephone`='$L_tel', `L_desc`='$L_desc', `PROPRIETAIRE_P_num`='$PROPRIETAIRE_P_num', `L_sexe`='$L_sexe' WHERE `locataire`.`L_num` = '$L_num'";
            $preup=$cnx->prepare($requp);
            $ex=$preup->execute(array());
            header("Location: liste_locataire.php");
        }


    }

?>

<!Doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>modifier locataire</title>
        
        <link rel="stylesheet" href="../css/css-modifier.css"/>
        <script src="../javascript/javascript-connexion.js"></script>
    </head>
<body>
<!--

    <div class="login-container">
        <section class="login" id="login">
          <header>
            <h2 style="font-size: medium;">PEGIMMOBILIERE</h2>
            <h4>S'inscrire</h4><img src="../images/ajouter-un-utilisateur.png" width="110px" height="125px" style="clear: both;float: right;margin-top:-120px;"/>
          </header>
          <form class="login-form" action="../php/inscrire_p.php" method="post">
            <input type="text" class="login-input" placeholder="e-mail" name="email" required autofocus/>
            <input type="text" class="login-input" placeholder="nom complet" name="nom_complet" required/>
            <input type="password" class="login-input" placeholder="mot de passe" name="pwd" required/>
            <input type="password" class="login-input" placeholder="confirmer mot de passe" name="pwdconf" required/>
            <div class="submit-container">
                <button type="submit" class="login-button" name="valider">valider</button>
              <button type="reset" class="login-button" style="clear: both; float: left;">annuler</button>
              <button type="submit" class="login-button"  style="clear: both; float: left;"><a href="../module_accueil/index.html">se retourner à l'accueil</a> </button>
            </div>
          </form>
        </section>
        <p class="m-0 small">Copyright &copy; PEGIMMOBILIERE 2021</p>

      </div>
     -->
     <form method="POST" action="">
     <table border="0" cellspacing="20px" width="500px">
         <tr>
             <td><input type="text" name="L_nom" placeholder="nom" value="<?php echo$locataire['L_nom'] ;?>" /></td>
             <td><input type="text" name="L_premon" placeholder="prenom" value="<?php echo$locataire['L_prenom'] ;?>" /></td>
         </tr>
         <tr>
            <td><input type="date" name="L_datenais" placeholder="date de naissance" value="<?php echo$locataire['L_datenais'] ;?>"  /></td>
            <td><input type="text" name="L_lieunais" placeholder="lieu de naissance"  value="<?php echo$locataire['L_lieunais'] ;?>" /></td>
        </tr>
        <tr>
            <td><input type="email" name="L_email" placeholder="email" value="<?php echo$locataire['L_email'] ;?>"  /></td>
            <td><input type="number" any name="L_tel" placeholder="contact" value="<?php echo$locataire['L_telephone'] ;?>" /> </td>
        </tr>
        <tr>
            <td><input type="text" name="L_Pnomcomplet" placeholder="nom complet de la mère"  value="<?php echo$locataire['L_pèrenomcomplet'] ;?>"/></td>
            <td><input type="text"  name="L_Mmomcomplet" placeholder="nom complet de la père" value="<?php echo$locataire['L_mèrenomcomplet'] ;?>" /></td>
        </tr>
        <tr>
            <td><input type="radio" name="L_sm" id="P_m" value="marié"/><label for="P_m"> marié</label>
                <input type="radio" name="L_sm" id="P_c" value="célibataire"/><label for="P_c"> célibataire</label></td>
            <td>
                <input type="radio" name="L_sexe" id="P_sexeh" value="homme"/><label for="P_sexeh"> Homme</label>
                <input type="radio" name="L_sexe" id="P_sexef" value="femme"/><label for="P_sexef"> Femme</label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><textarea name="L_desc" rows="4" cols="53" placeholder="information facultative" value="<?php echo$locataire['L_desc'] ;?>"   ></textarea></td>
        </tr>
        <tr>
            <td align="center"><input type="submit" name="valider" value="mettre à jour" style="width: 100px; height: 40px;"/></td>
            <td ><input type="reset"  name="annuler" value="annuler" style="width: 100px; height: 40px;"/> </td>
        </tr>
     </table>
</form>
</body>

</html>