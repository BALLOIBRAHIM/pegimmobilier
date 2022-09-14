

<?php
   session_start();
   require 'erreur.php';
    if(isset($_SESSION) and isset($_GET['x']))
    {
        $B_num=$_GET['x'];
      
        $req="SELECT * FROM `bien` WHERE B_num=?";
        $pre=$cnx->prepare($req);
        $ex=$pre->execute(array($B_num));
        $bien=$pre->FETCH(PDO:: FETCH_ASSOC);
      

        
if(isset($_POST['valider']))
        {



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




            $requp="UPDATE `bien` SET `B_nom` = '$B_nom', `B_ref1` = '$B_ref1', `B_ref2` = '$B_ref2', `B_ref3` = '$B_ref3', `B_ref4` = ' $B_ref4', `B_topologie` = '$B_topologie', `B_localisation` = '$B_localisation',`B_cout`='$B_cout', `B_desc` = '$B_desc' WHERE `bien`.`B_num` = '$B_num';";
            $preup=$cnx->prepare($requp);
            $ex=$preup->execute(array());
            
            header("Location: liste_bien.php");
        }


    }

?>


<!Doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>modifier bien</title>
        
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
             <td><input type="text" name="B_nom" placeholder="nom"  value="<?php echo $bien['B_nom']?>"/></td>
             <td><input type="text" name="B_ref1" placeholder="reférence n°1 du bien" value="<?php echo $bien['B_ref1']?>"/></td>
         </tr>
         <tr>
            <td><input type="text" name="B_ref2" placeholder="reférence n°2 du bien" value="<?php echo $bien['B_ref2']?>"/></td>
            <td><input type="text" name="B_ref3" placeholder="reférence n°3 du bien" value="<?php echo $bien['B_ref3']?>" /></td>
        </tr>
        <tr>
            <td><input type="text" name="B_ref4" placeholder="reférence n°4 du bien" value="<?php echo $bien['B_ref4']?>"/></td>
            <td><input type="text"  name="B_localistaion" placeholder="localisation" value="<?php echo $bien['B_localisation']?>"/> </td>
        </tr>
       
        <tr>
            <td>
                <input type="text" name="B_topologie" placeholder="topologie" value="<?php echo $bien['B_topologie']?>"/>
            </td>
            <td>
                <input type="number" any name="B_cout" placeholder="estimation de coût" value="<?php echo $bien['B_cout']?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2"><textarea name="B_desc" rows="4" cols="53" placeholder="information facultative"  ><?php echo $bien['B_desc']?></textarea></td>
        </tr>
        <tr>
            <td align="center"><input type="submit" name="valider" value="metter à jour " style="width: 100px; height: 40px;"/></td>
            <td ><input type="reset"  name="annuler" value="annuler" style="width: 100px; height: 40px;"/> </td>
        </tr>
     </table>
</form>
</body>

</html>