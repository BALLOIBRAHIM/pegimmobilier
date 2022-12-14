<?php

session_start();
require '../php/function.php';
if(empty($_SESSION['P_num'])){
    header("HTTP/1.0 404 Not Found");
    exit();
    }
    $proprietaires=$_SESSION['P_num'];
?>

<!doctype html>
<!--[if IE 9]> <html class="no-js ie9 fixed-layout" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js " lang="en"> <!--<![endif]-->
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- Site Meta -->
    <title> liste des locataires </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

	<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet"> 

	<!-- Custom & Default Styles -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="style.css">

	<!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
	<![endif]-->

</head>
<body class="left-menu">  
    
<div class="menu-wrapper">
        <div class="mobile-menu">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#" style="font-size:3.5rem">PEGIMMOBILIERE</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li>

                                <a href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Dashbaord </a>
                     
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">G??rer les locataires  </a>
                                <ul class="dropdown-menu">
                                <li><a href="ajouter_locataireP.php">Ajouter un locataire</a></li>
                                    <li><a href="liste_locataireP.php">Liste des locataires</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">G??rer les biens  </a>
                                <ul class="dropdown-menu">
                                <li><a href="ajouter_bienP.php">Ajouter un bien</a></li>
                                    <li><a href="liste_bienP.php">voir mes biens</a></li>
                                    
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">G??rer les contrats  </a>
                                <ul class="dropdown-menu">
                                <li><a href="ajouter_contratP.php">Ajouter un contrat</a> 
                                        
                                        </li>
                                        <li><a href="liste_contratP.php">consulter mes contrats</a> 
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">G??rer recouvrements </a>
                                <ul class="dropdown-menu">
                                <li><a href="ajouter_paiementP.php">Ajouter un paiment</a> 
                                        
                                        </li>
                                        <li><a href="liste_paiementP.php">consulter les recouvrements</a> 
                                            
                                        </li>
                                </ul>
                            </li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">G??rer les r??servations  </a>
                                <ul class="dropdown-menu">
                                <li><a href="ajouter_r??servationP.php">Ajouter une r??servation</a> 
                                        
                                        </li>
                                        <li><a href="liste_r??servationP.php">consulter les r??servations</a> 
                                            
                                        </li>
                                </ul>
                            </li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">G??rer les d??penses  </a>
                                <ul class="dropdown-menu">
                                <li><a href="ajouter_depenseP.php">ajouter une d??pense</a></li>
                                    <li><a href="liste_depenseP.php">consulter mes d??penses</a></li>
                                </ul>
                            </li>


                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">G??rer les messages  </a>
                                <ul class="dropdown-menu">
                                <li><a href="ajouter_messageP.php">envoyer un message</a></li>
                                    <li><a href="recevoir_messageP.php">boite de r??cepetion</a></li>
                                    <li><a href="envoi_messageP.php">boite d'envoi</a></li>
                                    <li><a href="corbeilleP.php">corbeille</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">G??rer mon profil  </a>
                                <ul class="dropdown-menu">
                                <li><a href="profil.php">consulter mon profil</a></li>
                                    <li><a href="modifier_profil? x=<?php echo$_SESSION['P_num']?>">modifier mon profil</a></li>
                                </ul>
                            </li>
                            <li >
                                <a href="../php/deconnexion.php"  role="button" aria-haspopup="true" aria-expanded="false">se d??connecter </a>
                                
                            </li>

                        </ul>
                        
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>
        </div><!-- end mobile-menu -->

        <header class="vertical-header">
            <div class="vertical-header-wrapper">
                <nav class="nav-menu">
                    <div class="logo">
                        <img src="images/PNG/contacts-google.png" alt="" width="150" height="150px">
                        <p style="color:white;">proprietaire</p>
                        <p style="font-size:16px;color:white;"><?php  
                        
                        if(isset($_SESSION['P_num'])){
                            $pro=recherche_unique("proprietaire","P_num",$proprietaires);

                            echo $pro['P_nom_complet'];
                        }
                       ?></p>
                    </div><!-- end logo -->



                    <ul class="primary-menu">
                    <li class="child-menu"><a href="index.php">Dashbaord</a>
                        <li class="child-menu"><a href="#">G??rer les locataires<i class="fa fa-angle-right"></i></a>
                            <div class="sub-menu-wrapper">
                                <ul class="sub-menu center-content">
                                    <li><a href="ajouter_locataireP.php">Ajouter un locataire</a></li>
                                    <li><a href="liste_locataireP.php">Liste des locataires</a></li>
                                    
                                </ul>
                            </div>
                        </li>
                        <li class="child-menu"><a href="#">G??rer les biens<i class="fa fa-angle-right"></i></a>
                            <div class="sub-menu-wrapper">
                                <ul class="sub-menu center-content">
                                <li><a href="ajouter_bienP.php">Ajouter un bien</a></li>
                                    <li><a href="liste_bienP.php">voir mes biens</a></li>
                                    
                                </ul>
                            </div>
                        </li>
                        <li class="child-menu"><a href="#">G??rer les contrats <i class="fa fa-angle-right"></i></a>
                            <div class="sub-menu-wrapper">
                                <ul class="sub-menu center-content">
                                <li><a href="ajouter_contratP.php">Ajouter un contrat</a> 
                                        
                                        </li>
                                        <li><a href="liste_contratP.php">consulter mes contrats</a> 
                                </ul>
                            </div>
                        </li>
                        <li class="child-menu"><a href="#">G??rer recouvrements<i class="fa fa-angle-right"></i></a>
                            <div class="sub-menu-wrapper">
                                <ul class="sub-menu center-content">
                                <li><a href="ajouter_paiementP.php">Ajouter un paiment</a> 
                                        
                                        </li>
                                        <li><a href="liste_paiementP.php">consulter les recouvrements</a> 
                                            
                                        </li>
                            
                                </ul>
                            </div>
                        </li>
                        <li class="child-menu"><a href="#">G??rer les r??servations  <i class="fa fa-angle-right"></i></a>
                            <div class="sub-menu-wrapper">
                                <ul class="sub-menu center-content">
                                <li><a href="ajouter_r??servationP.php">Ajouter une r??servation</a> 
                                        
                                        </li>
                                        <li><a href="liste_r??servationP.php">consulter les r??servations</a> 
                                            
                                        </li>
                                </ul>
                            </div>
                        </li>

                        <li class="child-menu"><a href="#">G??rer les d??penses<i class="fa fa-angle-right"></i></a>
                            <div class="sub-menu-wrapper">
                                <ul class="sub-menu center-content">
                                <li><a href="ajouter_depenseP.php">ajouter une d??pense</a></li>
                                    <li><a href="liste_depenseP.php">consulter mes d??penses</a></li>
                                    
                                </ul>
                            </div>
                        </li>

                        <li class="child-menu"><a href="#">G??rer les messages<i class="fa fa-angle-right"></i></a>
                            <div class="sub-menu-wrapper">
                                <ul class="sub-menu center-content">
                                    <li><a href="#">envoyer un message</a></li>
                                    <li><a href="#">boite de r??cepetion</a></li>
                                    <li><a href="#">boite d'envoi</a></li>
                                    <li><a href="#">corbeille</a></li>
                                    
                                </ul>
                            </div>
                        </li>

                        <li class="child-menu"><a href="#">G??rer mon profil<i class="fa fa-angle-right"></i></a>
                            <div class="sub-menu-wrapper">
                                <ul class="sub-menu center-content">
                                    <li><a href="#">consulter mon profil</a></li>
                                    <li><a href="#">modifier mon profil</a></li>
                                </ul>
                            </div>
                        </li>
                        
                        <li><a href="#">Contact</a></li>
                        <li><a href="../php/deconnexion.php">Se deconnecter</a></li>
                    </ul>
                    
                    <div class="margin-block"></div>

                    <div class="menu-search">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="taper ici pour faire une recherche">
                                <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div><!-- end menu-search -->

                    <div class="margin-block"></div>

                    <div class="menu-social">
                        
                    </div><!-- end menu -->
                </nav><!-- end nav-menu -->
            </div><!-- end vertical-header-wrapper -->
        </header><!-- end header -->
    </div><!-- end menu-wrapper -->

    <div id="wrapper">

        
        <div class="section bgcolor noover">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message">
                            <h3>Liste des locataires <mark class="rotate">Facile,Simple,propre </mark> </h3>
                            <div class="menu-search">
                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Rechercher">
                                        <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section -->

       
<div class="ajouter_locataire" style="background-color:black;">
          <!-- liste locataire -->
<?php include '../php/liste_locataire.php';?>
<!--  fin liste locataire-->
</div>

        

        <section class="section parallax" data-stellar-background-ratio="0.6" style="background-color:black;">
            <div class="container">
                <div class="section-title light-color text-center" >
                    <h3>??tat des lieux</h3>
                    <p>voici  l'??tat des lieux de vos biens et de diff??rentes charge.</p>
                </div><!-- end title -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="process-box">
                            <div class="process-front text-center">
                                <i class="flaticon-lightbulb-idea"></i>
                                <h3>locataires ?? jour</h3>
                            </div><!-- end front -->

                            <div class="process-end text-center" >
                                <h3>bilan</h3>
                                <p>50 locataires</p>
                            </div><!-- end end -->
                        </div><!-- end process -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-6">
                        <div class="process-box">
                            <div class="process-front text-center">
                                <i class="flaticon-computer"></i>
                                <h3>locataires non ?? jour</h3>
                            </div><!-- end front -->

                            <div class="process-end text-center">
                                <h3>bilan</h3>
                                <p>20 locataires</p>
                            </div><!-- end end -->
                        </div><!-- end process -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-6">
                        <div class="process-box">
                            <div class="process-front text-center">
                                <i class="flaticon-people"></i>
                                <h3>d??penses ??ffectu??es</h3>
                            </div><!-- end front -->

                            <div class="process-end text-center">
                                <h3>total </h3>
                                <p>ce mois vous avez d??pens?? 1 000 000 FCFA.</p>
                            </div><!-- end end -->
                        </div><!-- end process -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-6">
                        <div class="process-box">
                            <div class="process-front text-center">
                                <i class="flaticon-smiley"></i>
                                <h3>economie r??alis??e</h3>
                            </div><!-- end front -->

                            <div class="process-end text-center">
                                <h3>total </h3>
                                <p>ce mois vous avez r??alis?? 10 000 000 FCFA.</p>
                            </div><!-- end end -->
                        </div><!-- end process -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

       

        

        <footer class="section footer" >
          
        </footer><!-- end footer -->

        <div class="section copyrights">
            <div class="container">
                
                <div class="row">
                    
                    <div class="col-lg-9 col-md-9 text-right peid" >
                        <div class="cop-links" >
                            <ul class="list-inline">
                                <li>Copyright &copy; PEGIMMOBILIERE 2021</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end wrapper -->

    <!-- jQuery Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/carousel.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/rotate.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/masonry.js"></script>
    <script src="js/masonry-4-col.js"></script>
    <!-- VIDEO BG PLUGINS -->
     
  
</body>
</html>