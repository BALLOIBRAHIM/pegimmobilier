<?php

if(isset($_POST['calcul'])){
    if(isset($_POST['nbr1']) and isset($_POST['nbr2']) and isset($_POST['operateur'])){

        if(isset($_POST['operateur'])=="/" and $_POST['operateur']=="0" )
        {

            echo"erreur de calcule";

        }
        else{
            $resultat= $_POST['nbr1'].$_POST['operateur'].$_POST['nbr2'];
            echo"le resultat est ".$resultat;
        }

}
else{
    echo"veillez renseigner tous les champs";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
</body>
</html>