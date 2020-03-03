<!--début de la navbar-->
<?php
//
//include_once 'model/dataBase.php';
//include_once 'model/usermodel.php';
//include_once 'controleur/navbarCtrl.php';
?>
<header class="header">
    <nav class="navbar navbar-expand-lg   ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-chevron-down"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-white" id="coulortext" href="../../index">Page d'accueil<span class="sr-only">(current)</span></a>
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
                        <a class="dropdown-item" href="../../index">Accueil</a>
                        <a class="dropdown-item" href="../../edito" >Edito</a> 
                        <a class="dropdown-item" href="../../ourActions" >Nos action nos luttes</a>
                        <a class="dropdown-item" href="../../inThePress" >La Presse parle de nous.</a> 
                        <a class="dropdown-item" href="../../listeBlackDot" >Liste des points noirs</a>
                        <a class="dropdown-item" href="../../presentation"> Présentation de la ffmc02 </a>
                        <a class="dropdown-item" href="../../membership" >Comment nous rejoindre</a>
                        <a class="dropdown-item" href="../../northNdrAntenna" >Les antennes du CDR Nord</a>
                        <a class="dropdown-item" href="../../historyOfTheFfmc" >Histoire de la FFMC </a>
                        <a class="dropdown-item" href="../../connectionUser" >Accueil connection</a>
                        <?php
                        $auth = array(4, 6, 7);
                        if (isset($_SESSION['access']) && in_array($_SESSION['access'], $auth)) {
                            ?>
                            <a class="dropdown-item" href="../../blackdot" >Nous faire remonter les points noirs</a>
                            <a class="dropdown-item" href="../../profilUser" >Vérifier, Modifier, supprimer mon profil</a>
                            <a class="dropdown-item " href="../../connectionUser">pages d'accueil connection</a>
                        <?php } else { ?>
                            <a class="dropdown-item" href="../../registration" >nous faire remonter les points noirs</a>          
                            <a class="dropdown-item" href="../../contactus" >contactez nous </a>
                            <?php
                        }
                        $auth = array(4, 6);
                        if (isset($_SESSION['access']) && in_array($_SESSION['access'], $auth)) {
                            ?>

                            <p class="text-white">Reservé aux modérateurs et administrateurs du site</p>

                            <a class="dropdown-item text-primary" href="../view/permissionManagement.php" >Liste des utilisateurs</a>
                            <a class="dropdown-item text-primary" href="../view/managementCathegoryDanger.php" >Gestion des dangers</a>
                            <a class="dropdown-item text-primary" href="../view/managementPositionDanger.php">Gestion de la postition du danger </a>
                            <a class="dropdown-item text-primary" href="../view/treatment.php" >Gestion des statuts</a>
                            <a class="dropdown-item text-primary" href="../view/listeBlackDotAdm.php" >Liste des points noirs</a>
                            <a class="dropdown-item text-primary" href="../view/blackDotArchive.php">Points noir achivé</a>
                            <a class="dropdown-item text-primary" href="../view/events.php">Gestion des événements</a>
                            <a class="dropdown-item text-primary" href="../view/article.php">Gestion des articles</a>
                            <a class="dropdown-item text-primary" href="../view/editoAdmin.php"> publication d'un édito</a>
                            <a class="dropdown-item text-primary" href="../view/partner.php"> Gestion des partenaires</a>
                            <a class="dropdown-item text-primary" href="../view/administratorPage.php" >Panneau d'administration.</a>
                        <?php }
                        ?>
                    </div>
                </li>
                <?php
                $auth = array(4, 6, 7);
                if (isset($_SESSION['access']) && in_array($_SESSION['access'], $auth)) {
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link text-white" id="coulortext" href="../../disconnection">Déconnexion<span class="sr-only">(current)</span></a>
                    </li>
                <?php } else {
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link text-white" id="coulortext" href="../../registration">Connexion<span class="sr-only">(current)</span></a>
                    </li>  
                <?php } ?>

            </ul>
        </div>
    </nav>
</header>
<!--fin de la navbar-->

