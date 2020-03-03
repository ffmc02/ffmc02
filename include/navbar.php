<!--début de la navbar-->
<?php
//
//include_once 'model/dataBase.php';
//include_once 'model/usermodel.php';
//include_once 'controleur/navbarCtrl.php';
?>
<header class="header">
    <nav class="navbar navbar-expand-lg   ">
        <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-chevron-down"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-white" id="coulortext" href="index">Retour accueil</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li id="titrenavbar" class="nav-item active nav-link text-center font-weight-bold ">
                    Fédération Française des Motards en Colère de l'Aisne
                </li>
            </ul> 
            <ul class="navbar-nav">
                <li class="nav-item dropdown text-center ">
                    <button class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        MENU
                    </button>
                    <div class="dropdown-menu dropdown-menu-right text-white" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index">Accueil</a>
                        <a class="dropdown-item" href="edito" >edito</a>
                        <a class="dropdown-item" href="ourActions" >Nos actions, nos luttes</a>
                        <a class="dropdown-item" href="presentation"> Présentation de la FFMC02 </a>
                        <a class="dropdown-item" href="historyOfTheFfmc" >Histoire de la FFMC </a>
                        <a class="dropdown-item" href="northNdrAntenna" >Les antennes du CDR Nord</a> 
                        <a class="dropdown-item" href="membership" >Comment nous rejoindre</a>
                        <a class="dropdown-item" href="inThePress" >La Presse parle de nous</a>                       
                        <a class="dropdown-item" href="listeBlackDot" >Liste des points noirs</a> 
                        <?php $auth = array(4, 6, 7);
                        if (isset($_SESSION['access']) && in_array($_SESSION['access'], $auth)) {
                            ?>
                            <a class="dropdown-item" href="blackdot" >Nous faire remonter les points noirs</a>
                            <a class="dropdown-item" href="profilUser" >Vérifier, modifier, supprimer mon profil</a>
                            <a class="dropdown-item" href="connectionUser" >Accueil connection</a>
                        <?php } else { ?>
                            <a class="dropdown-item" href="registration" >Nous faire remonter les points noirs</a>          
                            <?php
                        }
                        if (isset($_SESSION['access']) && ($_SESSION['access'] == 4 || $_SESSION['access'] == 6)) {
                            ?>
                            <p>Accéder a la partie réservée </p>
                            <a class="dropdown-item" href="../doria/view/administratorPage.php" >Panneau d'administration.</a>
                        <?php }
                        ?>
                        <a class="dropdown-item" href="contactus" >Contactez-nous </a>

                    </div>
                </li>
<?php if (isset($_SESSION['access'])) { ?>
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
<!--fin de la navbar-->

