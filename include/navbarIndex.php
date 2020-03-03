<!-- début de navbar-->
<?php
//
//include_once 'model/dataBase.php';
//include_once 'model/usermodel.php';
//include_once 'controleur/navbarCtrl.php';
?>
</head>
<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg   ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="fa fa-chevron-down"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="index">Page d'accueil <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li id="titrenavbar" class="nav-item active nav-link text-center">
                        Fédération Française des Motards en Colère de l'Aisne 
                    </li>
                </ul> 
                <ul class="navbar-nav">
                    <li class="nav-item dropdown text-center ">
                        <button class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            MENU
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index">Accueil</a>
                            <a class="dropdown-item" href="presentation"> Présentation de la ffmc02 </a>
                            <a class="dropdown-item" href="membership" >Comment nous rejoindre</a> 
                            <a class="dropdown-item" href="northNdrAntenna" >Les antennes du CDR Nord</a> 
                            <a class="dropdown-item" href="ourActions" >Nos actions nos luttes</a>
                            <a class="dropdown-item" href="listeBlackDot" >Liste des points noirs</a>
                           <?php if (isset($_SESSION['access']) && $_SESSION['access'] == 4 || isset($_SESSION['access']) && $_SESSION['access'] == 6 || isset($_SESSION['access']) && $_SESSION['access'] == 7) { ?>
                            <a class="dropdown-item" href="blackdot" >Nous faire remonter les points noirs</a>
                            <a class="dropdown-item" href="profilUser" >Vérifier, Modifier, supprimer mon profil</a>
                        <?php } else { ?>
                            <a class="dropdown-item" href="registration" >Nous faire remonter les points noirs</a>          

                            <?php
                        }
                          if (isset($_SESSION['access']) && ($_SESSION['access'] == 4 || $_SESSION['access'] == 6)) {
                            ?>
                            <a class="dropdown-item" href="historyOfTheFfmc" >Histoire de la FFMC (en construction)</a>
                            <a class="dropdown-item text-white" href="doria/view/administratorPage.php" >Panneau d'administration</a>
                        <?php }
                        ?>
                            <a class="dropdown-item" href="contactus" >Contactez nous </a>
                        </div>
                    </li>
                       <?php if (isset($_SESSION['access']) && ($_SESSION['access'] == 4 || $_SESSION['access'] == 6 || $_SESSION['access'] == 7)) { ?>
                    <li class="nav-item active text-white">
                        <a class="nav-link text-white" id="coulortext" href="disconnection">Déconnexion<span class="sr-only">(current)</span></a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item active text-white">
                        <a class="nav-link text-white" id="coulortext" href="registration">Connexion<span class="sr-only">(current)</span></a>
                    </li>  
                <?php } ?>
                </ul>
            </div>
        </nav>
    </header>
    <!--fin de la navbar
