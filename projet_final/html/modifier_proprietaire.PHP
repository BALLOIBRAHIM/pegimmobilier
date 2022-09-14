
<?php
   session_start();
   require '../php/erreur.php';
    if(isset($_SESSION) and isset($_GET['x']))
    {
        $p_num=$_GET['x'];
        var_dump($_GET['x']);
        $req="SELECT * FROM `proprietaire` WHERE P_num=?";
        $pre=$cnx->prepare($req);
        $ex=$pre->execute(array($p_num));
        $proprietaire=$pre->FETCH(PDO:: FETCH_ASSOC);
        var_dump($proprietaire);

if(isset($_POST['valider']))
        {
            $requp="UPDATE `proprietaire` SET `P_nom`=?,`P_prenom`=?,`P_datenais`=?,`P_lieunais`=?,`P_email`=?,`P_contact`=?,`P_desc`=?,`P_pwd`=?,`P_nom_complet`=?,`P_sexe`=? WHERE `P_num`=`$p_num`, ";
            $preup=$cnx->prepare($requp);
            $ex=$preup->execute(array($_POST['P_nom'],$_POST['P_premon'],$_POST['P_datenais'],$_POST['P_lieunais'],$_POST['P_email'],$_POST['P_contact'],$_POST['P_desc'],$_POST['P_pwd'],$_POST['P_nom_complet'],$_POST['P_sexe']));
            
        }


    }

?>


<!Doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>modifier mon profil</title>
        
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
     <form method="POST" action="#">
     <table border="0" cellspacing="20px" width="500px">
         <tr>
             <td><input type="text" name="P_nom" placeholder="nom"  value="<?php echo $proprietaire['P_nom'];?>"/></td>
             <td><input type="text" name="P_premon" placeholder="prenom" value="<?php echo $proprietaire['P_prenom'];?>" /></td>
         </tr>
         <tr>
            <td><input type="date" name="P_datenais" placeholder="date de naissance" value="<?php echo $proprietaire['P_datenais'];?>"/></td>
            <td><input type="text" name="P_lieunais" placeholder="lieu de naissance"  value="<?php echo $proprietaire['P_lieunais'];?>" /></td>
        </tr>
        <tr>
            <td><input type="email" name="P_email" placeholder="email"  value="<?php echo $proprietaire['P_email'];?>"/></td>
            <td><input type="number" any name="P_contact" placeholder="contact"  value="<?php echo $proprietaire['P_contact'];?>"/> </td>
        </tr>
        <tr>
            <td><input type="password" name="P_pwd" placeholder="mote de passe"  value="<?php echo $proprietaire['P_pwd'];?>"/></td>
            <td><input type="password"  name="P_pwdconf" placeholder="confirmer le mot de passe" value="<?php echo $proprietaire['P_pwd'];?>"/> </td>
        </tr>
        <tr>
            <td><input type="text" name="P_nom_complet" placeholder="nom complet"   value="<?php echo $proprietaire['P_nom_complet'];?>"/></td>
            <td>
                <input type="radio" name="P_sexe" id="P_sexeh" value="homme"/><label for="P_sexeh"> Homme</label>
                <input type="radio" name="P_sexe" id="P_sexef" value="femme"/><label for="P_sexef"> Femme</label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><textarea name="P_desc" rows="4" cols="53" placeholder="information facultative"  value="<?php echo $proprietaire['P_desc'];?>"></textarea></td>
        </tr>
        <tr>
            <td align="center"><input type="submit" name="valider" value="mettre à jour" style="width: 100px; height: 40px;"/></td>
            <td ><input type="submit"  name="annuler" value="annuler" style="width: 100px; height: 40px;"/> </td>
        </tr>
     </table>
</form>
</body>

</html>