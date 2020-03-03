<?php
include_once '../config.php';
include_once'../controleur/connectionCtrl.php';
/* en tete */
include ("../include/head.php");
?>
<title>connexion</title>
<?php
include ("../include/navbar.php");
$message = "";
?>
<!--corps de la page -->
<div class="bdPresentation container-fluid">
    <?php
    //^colone de gauche
    include ("../include/columnLeft.php");
    ?>

    <!-- colonne central-->
    <div id="columnCenter" class=" col-lg-8 px-0">
        <?php
        //conditionn de restriction d'accès
        $auth = array(4, 6, 7);
        if (isset($_SESSION['access']) && in_array($_SESSION['access'], $auth)) {
            ?>
            <div class="titleGreen">  

                <h1>Bienvenue <?= $_SESSION['pseudo'] ?> </h1>
            </div>
            <div align="center">
                <p class="titleGreens ">Vous êtes connecté et vous pouvez accédez : </p>
                <a href="blackdot" class="btn btn-primary">Au formulaire point noir</a>
                <a href="profilUser" class="btn btn-primary">A votre profil </a>
                <a href="listeBlackDot" class="btn btn-primary">A la liste des points noirs </a>
                <a href="ourActions" class="btn btn-primary">A nos actions </a>
                <a href="contactus" class="btn btn-primary">Pour nous contacter</a>
                <?php
                //conditionn de restriction d'accès
                $auth = array(4, 6);
                if (isset($_SESSION['access']) && in_array($_SESSION['access'], $auth)) {
                    ?>
                    <div class="titleGreen">  

                        <h2>Reservé aux administrateurs et Modérateurs du site </h2>
                    </div>
                    <a href="../doria/view/listeBlackDotAdm.php" type="button" class="btn btn-success">Liste point noirs </a>
                    <a href="../doria/view/events.php" class="btn btn-success">Evénements</a>
                    <a href="../doria/view/article.php" class="btn btn-success">Articles</a>    
                    <a href="../doria/view/permissionManagement.php" class="btn btn-success">Utilisateurs</a> 
                    <a href="../doria/view/editoAdmin.php" class="btn btn-success"> publication d'un édito</a> 
                    <a href="../doria/view/partner.php" class="btn btn-success"> gestion des nos partenaires</a><br>
                    <a href="../doria/view/inThePressAdmin.php" class="btn btn-success"> la presse en parle partie admin</a> 
                    
                    <?php
                }
            } else {
                ?>
                <p>Pour avoir accées a cette page merci de vous connectez ou vous inscrire <a href="registration">ici</a></p>
            <?php }
            ?>
        </div>
    </div>
    <?php
    //^colone de droite
    include ("../include/columnRight.php");
    ?>
</div>
<!--Fin corp de pages-->
<?php
include ("../include/footer.php");
?>
