<?php
include_once '../model/usermodel.php';
include_once '../controleur/emailValidationctrl.php';
include ("../include/head.php");
?>
<title>validation de l'inscription</title>
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
        <div class="titleGreen">
            <h1>Encor une étapes</h1>
      </div>
        <div class="titleGreen">
            <h2>Mail</h2>
            <p>Vous avez reçu un mail, veuillez clicker sur le lien de ce dernier <br>
            Regardez dans les spam si vous n'avez rien reçu, ou envoyer directement un mail à ffmc02@outlook.fr et en présisant mail non reçu
            </p>
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