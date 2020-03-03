<?php
session_start();
/* en tete */
include ("../include/head.php");
?>
<title></title>
<?php
include ("../include/navbar.php");
?>
<!--corps de la page -->
<div class="bd container-fluid">
    <?php
    //^colone de gauche
    include ("../include/columnLeft.php");
    ?>
    <!-- colonne central-->
    <div id="columnCenter" class=" col-lg-8 px-0">
        <?php
         $auth = array(4, 6);
           if (isset($_SESSION['access']) && in_array($_SESSION['access'], $auth)) {
            ?>
            <div class="titleGreen">
                <h1>Bienvenue <?= $_SESSION['pseudo'] ?></h1>
            </div>
            <div class="titleGreen">
                <h2>partie gestion des points noirs </h2>
            </div>
            <p>Pour ajouter, supprimer, modifier un <a href="../view/managementCathegoryDanger.php">danger </a></p>
            <p>Pour ajouter, modifier, supprimer <a href="../view/managementPositionDanger.php">une position</a>

            <div class="titleGreen">
                <h2>Gestion des utilisateurs </h2>
            </div>
            <p>Pour modifier l'accés et supprimer un <a  href="../view/permissionManagement.php" > utilisateur</a></p>
            <div class="titleGreen">
                <h2>Gestion statut des points noirs </h2>
            </div>
            <p>Pour modifier l'accés et supprimer un <a  href="../view/treatment.php" > Statut</a></p>
            <div class="titleGreen">
                <h2> Liste des points noir  </h2>
            </div>
            <p>Liste des points noirs avec modification <a  href="../view/listeBlackDotAdm.php" >des points noirs   </a></p>
            <p> Liste des points noirs <a href="../view/blackDotArchive.php">archivés</a></p>
            <div class="titleGreen">
                <h2>Gestion des évenements</h2>
            </div>
            <p>Création <a href="../view/events.php">d'évenement</a></p>
            
                <div class="titleGreen">
                <h2>Gestion des articles</h2>
            </div>
            <p>Gestion des <a href="../view/article.php">articles</a></p>
                <?php
        } else {
            require '../include/restrictedZone.php';
        }
        ?>
    </div>
    <?php
    //colonne de droite
    include ("../include/columnRight.php");
    ?>
</div>
<!--Fin corp de pages-->
<?php
include ("../include/footer.php");
?>