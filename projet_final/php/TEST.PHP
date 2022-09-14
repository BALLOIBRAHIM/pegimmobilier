<?php

if(isset($_POST['calcul'])){
    if(isset($_POST['nbr1']) and isset($_POST['nbr2']) and isset($_POST['operateur'])){

        if(isset($_POST['operateur'])=="/" and $_POST['operateur']=="0" )
        {

            echo"erreur de calcule";

        }
        else{
            
            switch ($_POST['operateur']) {
                case "+":
                    $resultat= $_POST['nbr1'] + $_POST['nbr2'];
                    echo "le resultat est: $resultat";
                    break;
                case "-":
                    $resultat= $_POST['nbr1'] - $_POST['nbr2'];
                    echo "le resultat est: $resultat";
                    break;
                case "*":
                        $resultat= $_POST['nbr1'] * $_POST['nbr2'];
                        echo "le resultat est: $resultat";
                        break;
                case "/":
                    $resultat= $_POST['nbr1'] / $_POST['nbr2'];
                    echo "le resultat est: $resultat";
                   
                    break;
            }
            
        }

}
else{
    echo"veillez renseigner tous les champs";
}
}
?>


<!Doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>CALCULATRICE</title>
  
    </head>

 <body>
  
    
    <form  method="POST" action="">
    
        <input   name="nbr1" type="number" any  placeholder="nombre 1">

        <input   name="nbr2" type="number" any  placeholder="nombre 2">     
      
      <select  align="center" name="operateur">
        <option value="">choix operateur</option>
        <option  value="+"> + </option> 
        <option  value="-"> - </option> 
        <option  value="*"> * </option> 
        <option  value="/"> / </option> 
      </select> 
      
        <input type="submit" value="calcul" name="calcul">
      
            
    </form>  
</body>
</html>