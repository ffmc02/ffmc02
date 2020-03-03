<?php
/* en tete */
include_once '../config.php';
include_once '../controleur/modifyPasswordCtrl.php';
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
        <?php if (isset($_GET['cle'])) { ?>
            <div class="titleGreen">
                <h1>formulaire de création du nouveau mot de passe </h1>
            </div>
            <p>Pour recréer votre mot de passe, merci de remplir le formulaire suivant:</p>
            <div>
                <p class="suceessMessage"><?= isset($messaageSucess) ? $messaageSucess : '' ?></p>
                <p class="errorMessage"><?= isset($formError['password']) ? $formError['password'] : '' ?></p>
                <p class="errorMessage"><?= isset($formError['echec']) ? $formError['echec'] : '' ?></p>
                <form method="post">
                    <label> Votre Email</label>
                    <input type="email" name="email" />
                    <label> Votre nouveau mot de passe</label>
                    <input type="password" name="newPassword" />
                    <label> Confirmez votre nouveau mot de passe </label>
                    <input type="password" name="confirmPassword" /> 
                    <input type="hidden" name="cle" value="<?= $_GET['cle'] ?>" /> 
                    <input type="submit" name="modifyPassword" value="Modifier mon mot de passe" />
                </form>
            </div>
            <?php
        } else {
            require '../include/restrictedZone.php';
        }
        ?>
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