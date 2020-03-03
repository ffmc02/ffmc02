<?php
include_once '../config.php';
include_once '../controleur/passwordForgetCtrl.php';
/* en tete */
include ("../include/head.php");
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
            <h1>Renouveler votre mot de passe</h1>
      </div>
        <p>Pour récupérer votre mot de passe, veuillez remplir le formulaire suivant:<br>
        Un mail vous sera envoyé avec un lien qui vous permettra de créer un nouveau mot de passe.</p>
        <div class="titleGreen">
            <h2></h2>
      </div>
        <p class="errorMessage"><?= isset($messageNotExiste) ? $messageNotExiste :'' ?></p>
        <p class="errorMessage"><?= isset($messageError) ? $messageError :'' ?></p>
        <p class="suceessMessage"><?= isset($messagesucces) ? $messagesucces :'' ?></p>
        <form method="post" >
            <label>Mon email</label>
            <input type="email" name="email" />
            <label>Votre pseudo</label>
            <input type="text" name="pseudo" />
            <input type="submit" name="passwordForget" value="Renouveler mon mot de passe." />
        </form>
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

